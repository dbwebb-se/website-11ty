---
author: mos
category:
    - nodejs
    - javascript
    - sqlite
    - kursen dbjs
revision:
    "2017-02-13": (A, mos) Första utgåvan i kursen dbjs.
...
SQLite och Node.js 
==================================

[FIGURE src=/image/snapvt17/sqlite3.png?w=c5 class="right"]

Vi använder den filbaserade databasen SQLite som en databas i flera av våra kurser och vi använder den mot olika programmeringsspråk. Låt oss nu se hur vi kan använda SQLite tillsammans med JavaScript i Node.js.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har redan koll på databasen SQLite och du kan grunderna i Node.js och JavaScript på serversidan.

Exempelprogram finns i ditt kursrepo (dbjs) under `example/nodejs/sqlite3`.



Hitta och installera modulen med npm {#npm}
--------------------------------------

Det finns flera libb som stödjer SQLite och första utmaningen blir att hitta det som vi vill använda. Ibland kan en sådan aktivitet kräva en liten undesökning, men till slut brukar man finna det som passar.

Jag väljer den npm-modul som heter `sqlite3`. Du kan se den på [GitHub](https://github.com/mapbox/node-sqlite3) eller som paket på [npm's hemsida](https://www.npmjs.com/package/sqlite3).

Jag går till kursrepot och installerar modulen med npm.

```bash
# Ställ dig i rooten av ditt kursrepo.
$ npm install sqlite3
```

Klart. Då testar vi om installationen gick bra.



Verifiera att SQLite fungerar {#verifiera}
---------------------------------------

I README-filen finns ett exempelprogram som jag modifierar något och använder för att testa att modulen är installerad och fungerar som tänkt.

```javascript
/**
 * To verify that SQLite is installed and is working.
 * The program creates an in-memory database with one table, inserts
 * some values and does a select on that table.
 */
"use strict";

var sqlite3 = require("sqlite3").verbose();
var db = new sqlite3.Database(":memory:");

db.serialize(() => {
    db.run("CREATE TABLE lorem (info TEXT)");

    var stmt = db.prepare("INSERT INTO lorem VALUES (?)");
    for (var i = 0; i < 10; i++) {
        stmt.run("Ipsum " + i);
    }
    stmt.finalize();

    db.each("SELECT rowid AS id, info FROM lorem", function(err, row) {
        console.log(row.id + ": " + row.info);
    });
});

db.close();
```

Jag tar ovan program och sparar i en fil `index.js`.

Så här ser det ut när jag testkör programmet.

```bash
$ node index.js
1: Ipsum 0
2: Ipsum 1
3: Ipsum 2
4: Ipsum 3
5: Ipsum 4
6: Ipsum 5
7: Ipsum 6
8: Ipsum 7
9: Ipsum 8
10: Ipsum 9
```

Då vet jag att det fungerar. Exempelprogrammet skapar en databas i minnet, den lagras inte på disk. Vill jag att databasen sparas i en fil istället så uppdaterar jag exempelprogrammet.

```javascript
//var db = new sqlite3.Database(":memory:");
var db = new sqlite3.Database("db.sqlite");

db.serialize(() => {
    db.run("DROP TABLE IF EXISTS lorem");
    db.run("CREATE TABLE lorem (info TEXT)");
// and the rest of the code
```

Om jag nu kör exempelprogrammet så sparas databasen i en fil som jag kan inspektera med kommandot `sqlite3` (som vanligt).

```bash
$ ls -l db.sqlite
-rw-r--r-- 1 mos mos 8.0K Feb 13 12:41 db.sqlite
$ sqlite3 db.sqlite
SQLite version 3.13.0 2016-05-18 10:57:30
Enter ".help" for usage hints.
sqlite> .schema
CREATE TABLE lorem (info TEXT);
sqlite> select * from lorem;
Ipsum 0
Ipsum 1
Ipsum 2
Ipsum 3
Ipsum 4
Ipsum 5
Ipsum 6
Ipsum 7
Ipsum 8
Ipsum 9
```

Bra. Nu vet vi att modulen för SQLite fungerar som tänkt.



API för sqlite3 {#api}
---------------------------------------------

Låt oss kika på det API som modulen sqlite3 erbjuder. Exempelprogrammet ger oss helheten, men låt titta lite mer i lugn och ro, på några av delarna, genom att [studera dokumentationen](https://github.com/mapbox/node-sqlite3/wiki).



###Använd verbose för felmeddelanden {#verbose}

När du importerar modulen för sqlite3 kan du initiera den i ett *verbose* mode som ger dig tydliga felmeddelanden.

```javascript
//var sqlite3 = require("sqlite3");
var sqlite3 = require("sqlite3").verbose();
```

Det är helt klart att rekommendera. Du ser direkt vilket SQL-kommando som inte fungerar som tänkt.

Så här kan ett felmeddelande se ut, när man skrivit fel tabellnamn.

```text
$ node index.js
/home/mos/git/dbjs/node_modules/sqlite3/lib/trace.js:27
                    throw err;
                    ^

TypeError: Cannot read property 'id' of undefined
    at db.each (/home/mos/git/dbjs/example/nodejs/sqlite3/index.js:22:24)
    at Statement.errBack (/home/mos/git/dbjs/node_modules/sqlite3/lib/sqlite3.js:16:21)
--> in Database#each('SELECT rowid AS id, info FROM lorNONOem', [Function])
    at Database.<anonymous> (/home/mos/git/dbjs/example/nodejs/sqlite3/index.js:21:8)
```

Utan den verbosa-delen så blir felmeddelandet mer svårtytt.



###Öppna och stäng databasen {#openclose}

Du behöver skapa ett objekt som jobbar mot din databas. Som du sett så kan databasen ligga i minnet eller i en fil. Du kan även bestämma om databasen skall vara skriv och läsbar eller enbart öppnas i läsbart mode.

När du är klar så stänger du databasen. Metoden kommer att invänta så att alla databasfrågor är klara, innan databasen stängs.

```javascript
//var db = new sqlite3.Database(":memory:");
var db = new sqlite3.Database("db.sqlite");

// Play around with the database

db.close();
```



###Kör en databasfråga SQL DDL {#run}

Om vi gör ett helt nytt exempelprogram, så kan vi visa hur man kör en enkel databasfråga via `run()`.

```javascript
var sqlite3 = require("sqlite3").verbose();
var db = new sqlite3.Database("db.sqlite");

db.serialize(() => {
    db.run("UPDATE lorem SET info='Mumintrollet was here' WHERE rowid = 7;");

    db.each("SELECT rowid AS id, info FROM lorem", (err, row) => {
        console.log(row.id + ": " + row.info);
    });
});

db.close();
```

Metoden `run()` returnerar inget resultset, den lämpar sig alltså för SQL DDL såsom INSERT, UPDATE, DELETE, DROP, CREATE och ALTER.



###Serialisera eller parallellt? {#ser}

Om vi tittar på förra frågan så ser vi att alla våra SQL-statements är wrappade i en `db.serialize()`. Det är för att de annars körs parallellt, det är default.

Om vi inte lägger våra SQL-frågor inom en serilalize så blir det alltså parallell exekvering av dem. Det kan vara bra ibland, men om vi verkligen vill att frågorna skall köras i en viss ordning, så är serialize vägen dit.

```javascript
db.serialize(() => {

    // All queries will be serialized here

});
```



###Placeholders och parametrar {#placeholder}

Du såg nyss hur vi uppdaterade en rad via en SQL-fråga.

```javascript
db.run("UPDATE lorem SET info='Mumintrollet was here' WHERE rowid = 7;");
```

Men, låt oss se ett bättre sätt att göra samma sak, genom att använda *placeholders* och skicka parametrar tillsammans med frågan.

```javascript
db.run("UPDATE lorem SET info=? WHERE rowid=?;",
    ["Mumintrollet was here, again", 7]
);
```

Eller via variabler i JavaScript.

```javascript
var mumin = "Mumintrollet was here, and again";
var id = 7;
db.run("UPDATE lorem SET info=? WHERE rowid=?;",
    [mumin, id]
);
```

Det vi ser är placeholder i form av frågetecken `?`. De parametrar vi bifogar i arrayen, kommer att kopplas till respektive placeholder i den ordningen de står. När den kopplingen görs, hanteras *sanitizing* automatiskt och parametrarna städas för att undvika till exempel säkerhetsrelaterade SQL injections.



###Prepared statements {#prepared}

Det vi ser i det första exempelprogrammet, där raderna läggs in med INSERT, är ett *prepared statement*. Man skapar ett statement och förbereder det för att köras många gånger. Vi ser en fråga med en placeholder. Frågan körs sedan 10 gånger med olika värden på parametern.


```javascript
var stmt = db.prepare("INSERT INTO lorem VALUES (?)");
for (var i = 0; i < 10; i++) {
    stmt.run("Ipsum " + i);
}
stmt.finalize();
```

Att göra finalize på ett statement är optionellt, men kan vara ett bra sätt att städa upp, när man inte längre vill använda just det statementet.



###Att ställa frågorna {#select}

Låt oss titta på två sätt att ställa frågor i form av SQL DML med SELECT. Här fungerar inte `run()` eftersom vi vill ha ett resultset som svar tillbaka från frågan. Istället använder vi `each()` och `all()` för att visa två olika sätt att hämta samma sak.

```javascript
db.serialize(function() {
    db.each("SELECT rowid AS id, info FROM lorem", (err, row) => {
        console.log(row.id + ": " + row.info);
    });

    db.all("SELECT rowid AS id, info FROM lorem", (err, rows) => {
        console.log(rows);
    });
});

db.close();
```

Det som är skillnaden mellan `each()` och `all()` är hur resultatet returneras. 

I `each` så anropas callbacken efter varje rad, vilket är bra om man har en stor tabell och man vill bara hämta en rad per gång.

I `all` så hämtas hela resultsetet på en gång i en array som består av rader där varje rad är ett objekt. Detta är effektivt när man har mindre resultsets.



Avslutningsvis {#avslutning}
--------------------------------------

Du har nu fått en genomgång i hur SQLite kan fungera tillsammans med Node.js. Du är redo att börja skriva ditt egna program.

Denna artikel har en [egen forumtråd](t/6222) som du kan ställa frågor i, eller ge tips.
