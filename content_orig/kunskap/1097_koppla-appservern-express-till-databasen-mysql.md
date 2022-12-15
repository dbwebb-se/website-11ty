---
author: mos
category:
    - nodejs
    - javascript
    - express
    - kursen databas
revision:
    "2020-02-18": "(C, mos) Stavning, omformulering i stycke om route."
    "2019-02-08": "(B, mos) Genomgången fokus mot kursen databas."
    "2018-01-09": "(A, mos) Första utgåvan."
...
Koppla appservern Express till databasen MySQL
==================================

[FIGURE src=image/snapvt18/bank-header-footer.png?w=c5&a=0,30,20,0&cf class="right"]

Vi skall koppla applikationsserven Express i Node.js till databasen MySQL.

Vi ställer ett par frågor och visar upp resultatet i webbsidor som genereras med templatemotorn EJS.

Vi kikar även på hur en gemensam sidlayout kan byggas upp med vyer och EJS.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har jobbat igenom artikeln "[Grunderna i Express med Node.js](kunskap/grunderna-i-express-med-nodejs)".

Du har jobbat igenom "[Transaktioner i databas](kunskap/transaktioner-i-databas)" och du har tillgång till den databas som används i artikeln.

Du har sedan tidigare kopplat samman Node.js, JavaScript med MySQL via terminalprogram.

De exempelprogram som används i artikeln finns i ditt kursrepo databas under `example/express-mysql` och `example/express`.



Utgå från tidigare exempel {#utga}
--------------------------------------

Du kan kopiera exempelkoden i `example/express` och utgå från den. Jag använder den för att bygga vidare och lägga dit kod som gör att vi kan koppla oss till databasen.

När du kopierat koden behöver du installera modulerna med `npm install`.

Pröva sedan att starta servern och använda webbläsaren för att koppla dig till servern.



Egen samling routes {#routes}
---------------------------------------

Vi börjar med en egen samling av routes som är relaterade denna övningen. Vi kan lägga dem i `route/bank.js`.

En grov struktur på koden i filen kan se ut så här.

```javascript
/**
 * Route for bank.
 */
"use strict";

const express = require("express");
const router  = express.Router();
//const bank    = require("../src/bank.js");

router.get("/index", (req, res) => {
    let data = {
        title: "Welcome | The Bank"
    };

    res.render("bank/index", data);
});

router.get("/balance", async (req, res) => {
    let data = {
        title: "Account balance | The Bank"
    };

    //data.res = await bank.showBalance();

    res.render("bank/balance", data);
});

module.exports = router;
```

Jag monterar routerna i `/bank` i `index.js`.

```javascript
const routeBank = require("./route/bank.js");
app.use("/bank", routeBank);
```

Låt då se vad vi har. Vi har förberett en egen samling routes där tanken är att knyta samman Express, via routes, med databasen och de resulterande vyerna.

Det är två rader som är utkommenterade i koden ovan, det är de som skall kapsla in själva databaskoden.

```javascript
const bank = require("../src/bank.js");

data.res = await bank.getAccount();
```

Den första raden skall hämta in modulen och den andra skall anropa en funktion som ligger i modulen och i sin tur gör `SELECT * FROM account` och returnerar ett resultset som kan skrivas ut i vyn.

Den kan vara bra att separera dessa moduler, var sak på sin plats. Det ger oss möjligheten att återanvända modulen om vi till exempel vill skapa ett annat gränssnitt, till exempel ett terminalprogram som använder samma databaskod.

Men, innan vi hanterar databasen så lägger vi till två vyer så att vi har ett fullt fungerande exempel.



Vyer för banken {#vyer}
---------------------------------------

Jag gör en egen katalog till bankens vyer i `views/bank` och lägger till filerna `index.ejs` och `balance.ejs`. Koden för respektive vy följer.

Först koden för `views/bank/index.ejs`.

```html
<h1>Welcome to the bank</h1>

<p>What do you want to do?</p>

<ul>
    <li><a href="balance">View account balance</a></li>
</ul>
```

Sedan koden för `views/bank/balance.ejs`.

```html
<h1>Account balance</h1>

<p>Here is the balance for the accounts.</p>

<p><i>To output the content of the account table.</i></p>

<p>
    <a href="index">Index</a>
</p>
```

Än så länge innehåller de inga taggar för templatemotorn och skriver således inte ut någon speciell information från variabler.

Förutsatt att vi har både vyer och route-filen och har uppdaterat `index.js` så bör vi nu kunna starta upp servern och besöka bankens sidor.

Först `bank/index`.

[FIGURE src=image/snapvt18/bank-index.png caption="Bankens välkomstsida med en meny om vad du kan göra."]

Om vi klickar på länken som visas i sidan så hamnar vi på routen `bank/balance`.

[FIGURE src=image/snapvt18/bank-balance.png caption="Här är tanken att rapporten om alla konton skall visas."]

Vi kan navigera mellan de båda sidorna genom att klicka på länkarna.

Så, vi har en grundstruktur med routes och vyer. Låt oss koppla in databasen.



En modul för databaskoden {#databasmodul}
--------------------------------------

Vi har sedan tidigare använt terminalklient för att koppla oss till en databas, ställa frågor mot databasen och presentera resultatet i en tabell.

Frågan vi vill ställa är enklast möjliga.

```sql
SELECT * FROM account;
```

Vi vill presentera resultatet i en webbsida, i formen av en tabell.

Låt oss ta det stegvis. Vi behöver följande.

1. En modul `src/bank.js` där vi skriver koden.
1. Använd modulen i routes `route/bank.js`.
1. Generera en HTML-tabell i vyn `views/bank/balance.ejs`.

Det vi slutligen vill se är en webbsida i stil med följande.

[FIGURE src=image/snapvt18/bank-header-footer.png?w=w3 caption="En översikt av konton, presenterade i en tabell och diverse kvarlämnade debug utskrifter."]

Låt oss ta det stegvis.



### Databasmodulen src/bank.js {#srcbankjs}

Vi återanvänder de kunskaper vi har från terminalprogrammet och skapar en `config/db/bank.json` med inloggningsdetaljer till databasen.

I modulen lägger jag funktioner som modulen exporterar, dessa funktioner kan användas routen. Jag kan även lägga in funktioner som inte exporteras från modulen, de blir privata och kan bara användas inom modulen.

Den publika delen av modulen `src/bank.js` ser ut så här.

```javascript
/**
 * A module exporting functions to access the bank database.
 */
"use strict";

module.exports = {
    showBalance: showBalance
};

const mysql  = require("promise-mysql");
const config = require("../config/db/bank.json");
let db;

/**
 * Main function.
 * @async
 * @returns void
 */
(async function() {
    db = await mysql.createConnection(config);

    process.on("exit", () => {
        db.end();
    });
})();

/**
 * Show all entries in the account table.
 *
 * @async
 * @returns {RowDataPacket} Resultset from the query.
 */
async function showBalance() {
    return findAllInTable("account");
}
```

Så, koden vi har är en vanlig modul, dess export-del är överst i koden, det är en funktion som exporteras från modulen. Sedan görs require på de moduler som behövs. De ligger på modulnivå så de är tillgängliga i alla funktioner i modulen.

Sedan finns en main-funktion i modulen, anledningen är den asynkrona hanteringen av `await createConnection()` som behöver wrappas i en `async` funktion. Inuti main-funktioner lägger vi till en eventhanterare som kopplar ned databasen när programmet avslutas.

Sedan finns den exporterade funktionen. Den i sin tur anropar en i modulen privat funktion som gör själva databasfrågan. Låt titta även på den funktionen.

Funktionen `findAllInTable(table)` ger ett API för att ställa frågor mot databasen. Man kunde lika gärna haft koden direkt i funktionen `showBalance()`. Men fördelen med att separera koden på detta sättet märks när koden växer. Var sak på sin plats.

```javascript
/**
 * Show all entries in the selected table.
 *
 * @async
 * @param {string} table A valid table name.
 *
 * @returns {RowDataPacket} Resultset from the query.
 */
async function findAllInTable(table) {
    let sql = `SELECT * FROM ??;`;
    let res;

    res = await db.query(sql, [table]);
    console.info(`SQL: ${sql} (${table}) got ${res.length} rows.`);

    return res;
}
```

Det dubbla `??` säger till npm-modulen `mysql` att göra _escape_ på den variabeln för att undvika SQL injections. Dubbla frågetecken används för tabellens namn eller dess kolumnnamn. Enkla frågetecken används för värden.

Nu kan vi avkommentera koden i router-filen och börja använda modulen.



### Använd modulen i routen {#dbinroute}

Låt oss kika på de delar i routen som är viktiga. Det är tre rader kod.

```javascript
const bank = require("../src/bank.js");

router.get("/balance", async (req, res) => {

    data.res = await bank.showBalance();
});
```

Den första raden importerar modulen.

Den andra raden visar att routens hanterare, dess callback, är `async` och man man använda `await` inuti den.

Den sista raden genomför själva anropet till modulens funktion som returnerar ett resultset.

Hur ser det då ut i vyn?



### Vy renderar resultset {#resultsetvy}

Vi har nu ett resultset från databasen som innehåller ett antal rader som skall renderas i en HTML-tabell i vyn. Men först tar vi en enkel väg och loopar igenom resultsetet och skriver ut en textrepresentation av varje rad. Det kan vara bra, om inte annat för att debugga och inspektera vad objekten innehåller.

Det resultset vi får från databasen är en array som består av objekt.

Först en snabb uppdatering för att skriva ut något i vyn, följande del läggs till.

```html
<ul>
<% for (const row of res) { %>
    <li><%= JSON.stringify(row) %></li>
<% }; %>
</ul>
```

Vi har en foor..of loop som loopar över arrayen och för varje rad skrivs radens JSON representation. Alla rader skrivs ut inom en ul/li lista.

Så här kan sidan se ut.

[FIGURE src=image/snapvt18/bank-balance-json.png caption="Balansen skrivs ut i form av ul/li och JSON."]

Nu har vi egentligen koll på allt. Det sista är mer en programmeringsövning för att skapa en HTML-tabell, men för att bli kompletta kan vi även lägga till den delen i vyn.

Så här kan det se ut när man visar upp resultatet i en HTML-tabell.

```html
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Balance</th>
    </tr>
<% for (const row of res) { %>
    <tr>
        <td><%= row.id %></td>
        <td><%= row.name %></td>
        <td class="right"><%= row.balance %></td>
    </tr>
<% }; %>
</table>
```

[FIGURE src=image/snapvt18/bank-balance-table.png caption="Balansen skrivs även ut i en tabell."]

Det vara det, en sökning i databasen och resultatet presenterat i en webbsida.



Snygga till webbsidan {#include}
--------------------------------------

Nu när vi är klara kan vi lägga någon extra minut på att snygga till webbsidan. Vi gör det enkelt och inkluderar en gemensam header och footer till de båda sidorna vi byggt. I EJS finns stöd för `<%- include() %>` som kan inkludera en annan vy.

Först bygger vi en header i `view/bank/header.ejs`.

```html
<!doctype html>
<meta charset="utf-8">
<title><%= title %></title>
<link rel="stylesheet" href="/style/style.css">
<link rel="icon" href="/favicon.ico">

<header>
    <nav>
        <a href="/bank/index">Index</a> |
        <a href="/bank/balance">Balance</a>
    </nav>
</header>
```

Det blir grunden till en HTML-sida med navigering mellan sidorna. Vi länkar in en stylesheet och en favicon. Dessutom skriver vi ut sidans titel med hjälp av en variabel som skickas från routen.

Sedan bygger vi en footer i `view/bank/footer.ejs`.

```html
<footer>
    <p>Copyright &copy; MegaBanken AB</p>
</footer>

<script type="text/javascript" src="/js/main.js"></script>
```

I footern skriver vi ut ett enkelt meddelande och vi inkluderar en JavaScript för klientsidan.

Nu kan vi inkludera headern överst och footern underst i vår respektive sidor och vips har en en gemensam sidlayout för alla sidor.

Så här inkluderar du headern och footern.

```html
<%- include("header", {title: title}); %>

<!-- resten av vyns innehåll -->

<%- include("footer"); %>
```

I första anropet skickar vi med värdet på sidans titel.

Om vi lägger till lite style i stylesheeten så kan sidan nu se ut så här.

[FIGURE src=image/snapvt18/bank-header-footer.png?w=w3 caption="Nu har banken en gemensam sidlayout för alla sidor."]

Så kan det alltså se ut när man skapar en gemensam sidlayout med vyer.



Avslutningsvis {#avslutning}
--------------------------------------

Detta var en introduktion för att komma igång Express och MySQL. Vi byggde vidare på en kodstruktur vi fick i föregående artiklar och lade till kod för att koppla upp oss mot databasen och vi såg hur resultsetet kunde presenteras i vyerna.

Du har nu grunderna för att skriva din egen webb/applikationsserver som kopplar sig mot en databas och presenterar innehåll i rapporter.

<!--
Denna artikel har en [egen forumtråd](t/7218) som du kan ställa frågor i, eller ge tips.
-->
