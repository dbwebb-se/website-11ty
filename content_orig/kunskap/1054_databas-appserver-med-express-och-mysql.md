---
author: mos
category:
    - nodejs
    - javascript
    - express
    - mysql
    - kursen dbjs
revision:
    "2017-03-22": "(B, mos) Uppdaterad, genomgången och mer formulär och post."
    "2017-03-22": "(A, mos) Första utgåvan i kursen dbjs."
...
Databas appserver med Express och MySQL
==================================

[FIGURE src=image/snapvt17/express-mysql-search-u.png?w=c5&a=10,50,50,0&cf class="right"]

Vi har tidigare sett hur vi kan bygga en applikations- och webbserver med hjälp av Node.js och modulen Express. Nu vill vi se hur vi från en sådan appserver kan jobba mot databasen MySQL.

Servern skall både servera statiska filer som bilder, CSS och JavaScript tillsammans med mer dynamiska routes som jobbar mot databasen.

Som templatemotor använder vi Pug, den hjälper oss att rendera HTML-sidor med dynamisk information från JavaScript och databasen.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har jobbat igenom artiklarna "[Node.js webbserver med Express](kunskap/nodejs-webbserver-med-express)","[MySQL och Node.js](kunskap/mysql-och-nodejs)" och "[Node.js, MySQL och Promise](kunskap/nodejs-mysql-och-promise)".

Exempelprogram finns i ditt kursrepo (dbjs) under `example/nodejs/express-mysql`.



Parsa inkommande POST {#body-parser}
--------------------------------------

Följande modul krävs för att Express skall kunna parsa inkommande POST-requester så som exemplet använder det.

```bash
# Gå till roten av kursrepot
$ npm install body-parser
```

Då kan vi börja.



Grunden till appservern {#grunden}
--------------------------------------

Vi har sedan tidigare grunden i hur man bygger upp en appserver med Express som kan hantera både statiska resurser och dynamiska sidor via en templatemotor.

Det ser ut ungefär så här, om man skapar en god grundstruktur för själva applikationen, delvis genom att återanvända det vi lärt oss tidigare.

```bash
dbjs/example/nodejs/express-mysql$ tree -L 2
.
├── app.js
├── database.js
├── index.js
├── public
│   ├── css
│   ├── img
│   ├── js
│   └── page.html
├── routes
│   ├── database.js
│   └── index.js
├── sql
│   └── setup.sql
└── views
    ├── database.pug
    ├── edit.pug
    ├── error.pug
    ├── incl
    ├── index.pug
    ├── page.pug
    ├── search.pug
    ├── view-all.pug
    └── view.pug

8 directories, 15 files
```

I modulen `app.js` bygger vi upp själva servern och exporterar den.

```javascript
/**
 * App for trying out database access from MySQL
 */
"use strict";

// Essentials
const express = require("express");
const path = require("path");
const bodyParser = require('body-parser');

// Load the routes
const index = require("./routes/index");
const database = require("./routes/database");

const app = express();

// view engine setup without minification of HTML
app.set("views", path.join(__dirname, "views"));
app.set("view engine", "pug");
app.locals.pretty = true;

// Parsing application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: true }));

// Mount static resources
app.use(express.static(path.join(__dirname, "public")));

// Load all routes on their mountpoint
app.use("/", index);
app.use("/db", database);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
    var err = new Error("Not Found");
    err.status = 404;
    next(err);
});

// Export the app object for anyone wanting to use it
module.exports = app;
```

Via `index.js` kan vi nu starta upp appen.

```javascript
#!/usr/bin/env node
"use strict";

// Get the app
const app = require("./app");

// Start up server
console.log("Express is ready.");
app.listen(1337);
```

Det är grunden, låt se om det fungerar.



En databas {#databas}
---------------------------------------

Exempelkoden förutsätter att du kan koppla upp dig mot en MySQL databasserver enligt följande.

```javascript
const connection = mysql.createConnection({
    host     : "localhost",
    user     : "user",
    password : "pass",
    database : "nodedb"
});
```

Om du inte har en sådan databas så kan du skapa den via skriptet `sql/setup.sql` som ligger bland exempelfilerna.

Titta först i filen `sql/setup.sql`, som innehåller SQL-kod.

```sql
CREATE DATABASE IF NOT EXISTS nodedb;
GRANT ALL ON nodedb.* TO user@localhost IDENTIFIED BY 'pass'; 

USE nodedb;

CREATE TABLE IF NOT EXISTS Moped (
    `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
    `text` VARCHAR(40)
);

DELETE FROM Moped;

INSERT INTO Moped (`text`)
VALUES
    ("Apollo"), ("Husqvarna"), ("Puch"), ("Zündapp")
;

SELECT * FROM Moped;
```

Sen kör du SQL-filen via MySQL för att skapa exempeldatabasen. Det kan se ut så här.

```bash
$ mysql < sql.setup.sql
id      text
5       Apollo
6       Husqvarna
7       Puch
8       Zündapp
```

Om allt fungerar så har du nu tabellen som behövs för att köra exempelprogrammet.

Det bör gå bra förutsatt att du kör som en användare som har befogenheter att skapa nya databaser och göra GRANT.



Verifiera att grunden fungerar {#verifiera}
---------------------------------------

Låt oss starta upp en server för att se att installationen gick bra.

```bash
$ node index.js
Express is ready.
```

Sedan öppnar vi en webbläsare mot servern och accessar `page.html` som bör leda till resursen `public/page.html`.

[FIGURE src=image/snapvt17/express-mysql-index.png?w=w2 caption="Index-sidan visas som vi förväntar oss."]

Vi prövar en felaktig route för att se att felhanteraren fungerar.

[FIGURE src=image/snapvt17/express-mysql-404.png?w=w2 caption="Felmeddelande visas som tänkt."]

Nu testar vi en korrekt route, defaultrouten från `route/index.js`, via denna testar vi också att templatemotorn är på plats.

```javascript
/* The default route, home page. */
router.get("/", function(req, res) {
    res.render("index", {
        title: "Index route | Express",
        message: "This is the index route"
    });
});
```

[FIGURE src=image/snapvt17/express-mysql-index-route-1337.png?w=w2 caption="defaultrouten renderar sidan via vyn `views/index.pug`."]

Grunden är på plats och det verkar fungera.



En modul för MySQL Promise {#mysqlpromise}
--------------------------------------

Vi börjar med hanteringen av databasen via en modul `database.js` som samlar databaskoden för kopplingen mot databasen och ett promise för att ställa frågor.

Det ser ut så här.

```javascript
/**
 * An own module for the database.
 */
"use strict";

const mysql = require("mysql");
const connection = mysql.createConnection({
    host     : "localhost",
    user     : "user",
    password : "pass",
    database : "nodedb"
});

const database = {};

connection.connect();

/**
 * Doing a MySQL query within a Promise.
 *
 * @param  string sql   SQL to be queried.
 * @param  Array  param Parameters to match placeholders
 *
 * @return object with result from query.
 */
database.queryPromise = (sql, param) => {
    return new Promise((resolve, reject) => {
        connection.query(sql, param, (err, res) => {
            if (err) {
                reject(err);
            }
            resolve(res);
        });
    });
};

module.exports = database;
```

Modulen kopplar upp sig mot själva databasen samt exporterar en funktion som gör en databasfråga inom ett promise.

Modulen tar vi och importerar i modulen `routes/database.js` där vi bygger de routes som skall använda databasen.

Här ser du hur det fungerar tillsammans med en första route `/test1` som ställer en fråga mot databasen, via `queryPromise()`.

```javascript
/**
 * Database example routes
 */
"use strict";

const express = require("express");
const router = express.Router();
const database = require("../database");


/**
 * Doing a SELECT with 2 + 2.
 */
router.get("/test1", function(req, res) {
    var data = {};

    data.message = "Doing 2 + 2 using SELECT.";
    data.sql = "SELECT 2 + 2 AS solution;";

    database.queryPromise(data.sql)
    .then((result) => {
        data.resultset = result;
        res.render("database", data);
    })
    .catch((err) => {
        throw err;
    });
});
```

Frågan vi ställer mot databasen kräver en koppling men ingen tabell, frågan räknar ut 2 + 2. Vi kan se att metoden `queryPromise()` används och den omsluter databasfrågan i ett promise så vi undviker problem med asynkrona händelser.

De routes som ligger i filen `routes/database.js` är monterade på grundrouten `/db`, så routen till till test1 blir `db/test1`.

Var någonstans en route-fil monteras, styrs i `app.js`. Så här ser det ut.

```javascript
// Load the routes
const index = require("./routes/index");
const database = require("./routes/database");

// Load all routes on their mountpoint
app.use("/", index);
app.use("/db", database);
```

Låt oss testa routen, så här kan det se ut.

[FIGURE src=image/snapvt17/express-mysql-2-2.png?w=w2 caption="En vy visar upp frågan och resultatet från databasen."]

Själva vyn erhåller de variabler som ligger i `data`, i detta fallet `message`, `sql` och en array/objekt `resultset` som innehåller svaret från databasfrågan.

```javascript
res.render("database", data);
```

Vyn får sedan välja hur informationen skall presenteras och i detta fallet ser vyn `views/database` ut så här.

```html
include incl/header-database.pug

p= message

p The SQL was:
pre= sql

p The resultset was:

each row, rownum in resultset
    p= "Row number: " + rownum 
    ul
        each colvalue, colname in row
            li= colname + ": " + colvalue

- console.log(resultset)

include incl/footer.pug
```

Vyn skriver ut informationen från de variabler den har tillgång till och sedan loopar den runt resultsetet och skriver ut det rad för rad.

Templatemotorn innehåller konstruktioner som låter oss loopa genom arrayer och objekt.

I vyn sker även debugging med konstruktionen `- console.log()` som skriver ut på serversidan, det kan vara ett bra sätt att debugga en vy. Ibland kan man bli osäker på vad ett resultset innehåller, men nu ser vi hela dess innehåll utskrivet på servern, det är bra vid utveckling och test.



Att visa upp innehållet i en tabell {#select-table}
--------------------------------------

Jag gör en ny route som visar upp innehållet i en tabell. Nu när jag har grunden på plats så är det bara routen som behövs.

```javascript
/**
 * Selecting all mopeds.
 */
router.get("/test2", function(req, res) {
    var data = {};

    data.message = "Selecting all mopeds.";
    data.sql = `
SELECT * FROM Moped
ORDER BY id DESC
;`;

    database.queryPromise(data.sql)
    .then((result) => {
        data.resultset = result;
        res.render("database", data);
    })
    .catch((err) => {
        throw err;
    });
});
```

Routen har samma struktur som föregående route vi tittade på, men SELECT-frågan är annorlunda och går mot en tabell.

Testar vi routen `db/test2` så ser vi resultatet.

[FIGURE src=image/snapvt17/express-mysql-select-all.png?w=w2 caption="Visa upp allt innehåll i en tabell."]

Nu ser vi bättre resultatet från den delen i vyn som loopar genom resultsetet och skriver ut varje rad för sig och radens innehåll i en lista.



Att söka i databasen {#search-route}
--------------------------------------

Vi prövar en annan vy som plockar en söksträng från routen och söker efter matchande innehåll i tabellen.

```javascript
/**
 * Searching all mopeds.
 */
router.get("/search/:searchstr", function(req, res) {
    var data = {};

    data.message = "Searching throw all mopeds.";
    data.sql = `
SELECT * FROM Moped
WHERE
    text LIKE ?
;`;
    data.param = [req.params.searchstr];

    database.queryPromise(data.sql, data.param)
    .then((result) => {
        data.resultset = result;
        res.render("database", data);
    })
    .catch((err) => {
        throw err;
    });
});
```

I routen hämtas `searchstr` från routens del via `req.params`, sedan används den parametern som placeholder i databasfrågan.

Söker vi efter mopeder som heter Husqvarna så ser routen ut så här `db/search/Husqvarna`. 

Resultatet blir så här.

[FIGURE src=image/snapvt17/express-mysql-search-husqvarna.png?w=w2 caption="Söker efter en specifik moped via namnet."]

Se det som ett exempel som kopplar routens del mot en fråga i databasen.



Ett sökformulär {#search-form}
--------------------------------------

Om vi vill göra ett mer flexibelt sökformulär så behöver vi ett HTML-formulär där vi kan posta en söksträng, och en route som visar upp resultatet.

Här kan vi göra ett enklare _self-submitting_ formulär, en route som både visar formuläret och hanterar postningen av formuläret.

Låt oss kika på routen.

```javascript
/**
 * Searchform for searching among mopeds.
 */
router.get("/search", function(req, res) {
    var data = {};

    data.search = req.query.search;

    if (req.query.doSearch) {
        data.doSearch = true;
        data.sql = `
SELECT * FROM Moped
WHERE
    text LIKE ?
;`;
        data.param = [data.search];

        database.queryPromise(data.sql, data.param)
        .then((result) => {
            data.resultset = result;
            res.render("search", data);
        })
        .catch((err) => {
            throw err;
        });
    } else {
        res.render("search", data);
    }
});
```

Routen har två lägen, antingen är formuläret postat och då utförs en SQL-fråga och resultsetet bifogas till vyn, annars är formuläret inte postat och då visas enbart vyn utan resultset.

Det är lika bra vi samtidigt kikar på det matchande formuläret från vyn.

```html
include incl/header-database.pug

p Searching through mopeds

<form method="get" action="/db/search">
    <input type="search" name="search" value="#{search}">
    <input type="submit" name="doSearch" value="Search">
</form>

- console.log(search)
p= doSearch

if doSearch
    p The resultset was:

    each row, rownum in resultset
        p= "Row number: " + rownum 
        ul
            each colvalue, colname in row
                li= colname + ": " + colvalue

    - console.log(resultset)

include incl/footer.pug
```

Den första delen är själva formuläret. Den andra delen är utskriften av sökresultatet, förutsatt att en sökning gjordes. Koden använder en if, en villkorsfunktion, från templatemotorn.

Låt oss pröva routen `/db/search` och se hur det ser ut.

[FIGURE src=image/snapvt17/express-mysql-search-form.png?w=w2 caption="Ett sökformulär visas och är redo för att söka efter information."]

Nu kan vi fylla i vår söksträng och klicka på knappen. I MySQL står `%` för ett wildcard i en sådan här strängsökning med `LIKE`.

[FIGURE src=image/snapvt17/express-mysql-search-u.png?w=w2 caption="Resultatet från sökningen visas tillsammans med själva formuläret, redo för ny sökning."]

Detta visar grunden i hur du kan skapa formulär och skicka till en route som sedan kan använda sig av informationen för att välja data som skickas till vyn som väljer hur datat skall sammanfogas med HTML-koden.



Att uppdatera databasen {#post-form}
--------------------------------------

Säg att vi vill ha möjligheten att uppdatera information som finns i databasen. Först behöver vi lista vilka rader som finns i tabellen, sedan väljer vi en av raderna och får ut dess innehåll i ett formulär där vi kan editera det och sedan spara. Ungefär så.

Låt oss ta det stegvis.



###Visa info om ett objekt {#visaett}

Vi börjar med en route som visar informationen om ett objekt, en rad. Routen får vara `/db/view/2` där 2 är det id som gäller för objektet.

Så här.

[FIGURE src=image/snapvt17/express-mysql-view-id.png?w=w2 caption="Visa information om ett objekt."]

Vi kikar på routen.

```javascript
/**
 * View a specific moped.
 */
router.get("/view/:id", (req, res) => {
    var data = {};

    data.title = "View | Express";

    data.sql = `
SELECT * FROM Moped
WHERE
    id = ?
;`;
    data.param = [req.params.id];

    database.queryPromise(data.sql, data.param)
    .then((result) => {
        if (result.length) {
            data.object = {
                id:     result[0].id,
                text:   result[0].text,
            };
        }
        res.render("view", data);
    })
    .catch((err) => {
        throw err;
    });
});
```

Routen ställer en SELECT-fråga och lägger in svaret i variabler som bifogas till vyn.

```html
if object
    p This matches the following.

    <table>
    <tr><th>Id</th><th>Text</th></tr>
    tr
        td= object.id
        td= object.text
        <td><a href="/db/edit/#{object.id}">Edit</a></td>
    </table>
else
    p No match.
```

Ovan är den centrala delen av vyn som kollar om det har fått något objekt bifogat och isåfall presenteras det i en tabell, annars blir det "No match".

Nu finns det en "Edit" länk som leder oss vidare. Låt oss ta den.



###Visa objektet i ett formulär {#obj-form}

Nu vill vi förbereda så att det går att editera innehållet i objektet. Vi tar därför ungefär samma route men presenterar informationen i ett formulär.

Så här.

[FIGURE src=image/snapvt17/express-mysql-edit-form.png?w=w2 caption="Visa information om ett objekt i ett formulär."]

Routen ser ungefär liknande ut som tidigare, det handlar främst om hur informationen presenteras i vyn.

```html
if object
    p Edit this entry.

    <form method="post" action="/db/edit">
        <input type="hidden" name="id" value="#{object.id}">
        <p><input type="text" name="text" value="#{object.text}"></p>
        <input type="submit" name="doEdit" value="Save">
        <input type="reset" value="Reset">
    </form>
    <p><a href="/db/view/#{object.id}">View</a></p>
else
    p No match.
```

Ovan ser vi kärnan i vyn, det är ett formulär som postas till routen `/db/edit` med metoden POST.

Nu kan man redigera namnet på objektet, i webbläsaren, och klicka på "Save".

Den route som då hanterar det postade formuläret är `/db/edit`, den ser ut så här.

```javascript
/**
 * Edit a specific moped, from submitted form.
 */
router.post("/edit", (req, res) => {
    var data = {};

    data.sql = `
UPDATE Moped
SET
    text = ?
WHERE
    id = ?
;`;
    console.log(req.body);
    data.param = [req.body.text, req.body.id];

    database.queryPromise(data.sql, data.param)
    .then(() => {
        res.redirect(`/db/edit/${req.body.id}`);
    })
    .catch((err) => {
        throw err;
    });
});
```

Det är en route som endast svarar på POST-metoden och det gör en update mot databasen och hämtar informationen från det postade formuläret vars information är samlad i `req.body`.

Notera att det görs en redirect till en resultatsida. Denna route visar alltså inte själv svaret uten skickar helt enkelt vidare till en annan route vars ansvar är att visa resultatet. Det gör man för att undvika problem som annars inträffar med reload av ett postat formulär.



###Visa vilka rader som finns {#post-show}

Till slut kan vi skapa routen `/db/view` som visar samtliga rader och erbjuder en länk för att enbart visa informationen om ett specifikt objekt.

Så här.

[FIGURE src=image/snapvt17/express-mysql-view-all.png?w=w2 caption="Visa alla rader i tabellen."]

Nu har vi nästan tillräckligt så att användaren kan navigera mellan våra routes och uppdatera informationen i databasen.

Själva vyn för att visa alla kan vara intressant att se då den lägger in alla raderna i en HTML-tabell.

```html
p You have the following.

<table>
<tr><th>Rad</th><th>Id</th><th>Text</th></tr>
each row, rownum in resultset
    tr
        td= rownum
        td= row.id
        <td><a href="/db/view/#{row.id}">#{row.text}</a></td>
</table>
```

Det fick bli en blandning av Pug's syntax och ren HTML.

Detta var en uppsättning routes och vyer med formulär som ger dig möjlighet att skapa grunderna i ett användargränssnitt för användaren och erbjuda sätt att modifiera i databasen.



Avslutningsvis {#avslutning}
--------------------------------------

Detta var ytterligare ett exempel på hur Express kan fungera, nu tillsammans med databasen MySQL och tillsammans med formulär via templatemotorn Pug.

Denna artikel har en [egen forumtråd](t/6333) som du kan ställa frågor i, eller ge tips.
