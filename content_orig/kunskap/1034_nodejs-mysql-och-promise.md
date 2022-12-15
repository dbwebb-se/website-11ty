---
author: mos
category:
    - nodejs
    - javascript
    - mysql
    - kursen dbjs
revision:
    "2017-02-27": (A, mos) Första utgåvan i kursen dbjs.
...
Node.js, MySQL och Promise 
==================================

[FIGURE src=/image/snapvt17/promise.png?w=c5&a=0,70,0,0&cf class="right"]

När man kommer från en synkron programmeringsvärld så kan det vara lurigt ibland att se hur man skall kunna serialisera ett flöde i den asykrona Node.js världen.

Låt oss ta ett exempel i form av en kommandoradsklient som läser från en MySQL-databas. 

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har jobbat igenom artikeln "[Gör en kommandoradsklient i Node.js](kunskap/gor-en-kommandoradsklient-i-node-js)" samt artikeln "[MySQL och Node.js](kunskap/mysql-och-nodejs)".

Du sitter troligen och utvecklar ett kommandoradsprogram som gör någon form av asynkron händelse som du vill serialisera och skriva ut prompten när händelsen är klar. Kanske jobbar du med uppgiften "[Node.js terminalprogram mot MySQL](uppgift/nodejs-terminalprogram-mot-mysql)".



Problemet {#problem}
--------------------------------------

Mitt problem är att prompten alltid skrivs ut mitt inne i resultatet från databasfrågan, det var inte så jag tänkte. Prompten skall skrivas ut efter att databasfrågan är klar. Men hur kan jag få ett sådant enkelt sekventiellt flöde?

Det ser ut så här, problemet är prompten `Allan$ ` som skrivs ut mitt bland resultatet från databasen.

```text
Displaying products
Allan$ 0: 1 - Husqvarna
1: 3 - Puch Dakota
2: 4 - Vespa
3: 2 - Zündapp
```

Det skall se ut så här.

```text
Displaying products
0: 1 - Husqvarna
1: 3 - Puch Dakota
2: 4 - Vespa
3: 2 - Zündapp
Allan$ 
```

Låt se hur ett Promise kan hjälpa oss med detta.



Den problematiska koden {#koden}
--------------------------------------

Grunden till mitt terminalprogram är från exemplet `guess-my-number-modules` och jag har precis lagt in lite databasfrågor i programmet samt förändrat så att alla databasparametrar kan skickas in i skriptet så att de inte är hårdkodade.

Koden som är central ser ut så här.

I modulen `menu.js` så anropas modulen `allan` vid kommandot "product".

```javascript
    case "product":
        allan.product();
        break;

// lines removed

readlineInterface.prompt();
```

Tanken är att `allan.product()` skall utföra en databasfråga och visa upp alla produkter, därefter skall prompten skrivas ut. Men databasfrågan är asynkron och prompten skrivs ut innan databasfrågan är klar.

Det kan se ut så här.

[ASCIINEMA src=104860]

Prompten skrivs ut på rätt plats för de enklare kommandona, men inte när det sker en databasfråga.

Själva koden som exekverar och tar hand om databasfrågan ser ut så här.

```javascript
allan.product = () => {
    console.log("Displaying products");

    var sql = `
SELECT * FROM a_product
ORDER BY name
;`;

    connection.query(sql, (err, res/*, fields*/) => {
        if (err) {
            throw err;
        }

        res.forEach((row, count) => {
            console.log(`${count}: ${row.id} - ${row.name}`);
        });
    });
}
```

Så, hur kan vi exekvera databasfrågan innan prompten skrivs ut?



Promise för att synkronisera kodsekvenser {#promise}
---------------------------------------

Vi skall använda ett Promise för att omsluta databasfrågan i ett löfte om ett värde som förr eller senare kommer att vara tillgängligt.

Du kan läsa om [Promise på MDN](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Promise).



###Prompt när promise är klart {#then}

Till att börja med kan vi strukturera koden i meny-loopen så att den skriver ut prompten på ett aningen annorlunda sätt, inom ramen för ett Promise.

Jag tar en annan del av koden och uppdaterar den för att jobba mot ett Promise.

```javascript
    case "inventory1":
        allan.inventory1()
        .then((value) => {
            readlineInterface.prompt();
        })
        .catch((err) => {
            throw err;
        });
        break;
```

Det vi ser är att funktionen *chainas*, kedjas, men ett anrop till `.then` när den är klar och `.catch` för fel.

Vi kan nu utföra så att funktionen `allan.inventory1()` utförs i sin helhet och när det är klart så utförs det som ligger i `.then` delen. Om något går fel så hamnar vi i `catch` delen.

Eftersom vi nu kan få ett sekventiellt flöde så kan vi skriva ut prompten efter att databasfrågan är klar med sin utskrift.

Asynkront och parallellt flöde är bra men ibland vill man ha ett sekventiellt kontrollerat flöde av programkoden.



###Kod för att skapa Promise {#kod}

Nu är ju ovan inte hela sanningen. Jag behöver skapa ett Promise i koden bakom också. Den koddelen ser ut så här.

Först kikar vi på `allan.inventory1()`. Den är aningen omskriven, kvar är SQL-koden och callbacken som är tänkt att skriva ut databasresultatet.

```javascript
allan.inventory1 = () => {
    console.log("Displaying inventory1");

    var sql = `
SELECT p.name AS name, i.number AS num
FROM a_product AS p
	INNER JOIN a_inventory AS i
		ON p.id = i.id
ORDER BY num ASC
;`;

    var prettyPrint = (res) => {
        res.forEach((row, count) => {
            console.log(`${count}: ${row.name} ${row.num}`);
        });
    };

    return queryPromise(sql, prettyPrint);
}
```

Låt då se hur koden bakom `queryPromise()` ser ut.

```javascript
function queryPromise(sql, prettyPrint) {
    return new Promise((resolve, reject) => {
        connection.query(sql, (err, res) => {
            if (err) {
                reject(err);
            }

            prettyPrint(res);
            resolve();
        });
    })
}
```

Det vi ser är att funktionen skapar ett Promise som är ansvarigt för att exekvera en databasfråga med den `sql` som skickas in som parameter. Den andra parametern `prettyPrint` är tänkt att exekveras tillsammans med det resultat som databasfrågan ger, så det kan skrivas ut på ett trevligt sätt.

I mitt Promise så använder jag `reject` för att berätta att mitt Promise har fått ett fel och jag använder `resolve` för att berätta när det är klart.

Det jag gjort är att omsluta ett asynkront stycke programmeringskod med ett Promise som kan användas för att få en sekventiellt kodexekvering.

Det kan kännas som ett extra lager av kod och det är precis vad det är.



###Testkör {#test}

Det kan se ut så här när man kör programmet.

[ASCIINEMA src=104863]

Det vi ser är att "product" fortfarande har problemet men "inventory1" fungerar och prompten skrivs ut efter att databasfrågan har visat upp sitt resultat.

Bra alltså, det fungerar som vi vill. Vi har skapat ett fungerande Promise.



Avslutningsvis {#avslutning}
--------------------------------------

Du har nu fått en snabb introduktion i hur konstruktionen Promise kan användas för att skapa sekventiell exekvering av asynkron kod.

Denna artikel har en [egen forumtråd](t/6276) som du kan ställa frågor i, eller ge tips.
