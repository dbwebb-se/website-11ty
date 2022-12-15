---
author: mos
category:
    - nodejs
    - javascript
    - express
    - kursen databas
revision:
    "2019-02-08": "(C, mos) Genomgången fokus mot kursen databas."
    "2018-02-13": "(B, mos) Uppdaterad routeIndex istället för index."
    "2018-01-08": "(A, mos) Uppdaterad utgåva, omskriven från annan artikel, att användas till dbjs och databas."
...
Grunderna i Express.js med Node.js
==================================

[FIGURE src=image/snapvt17/npm-express.png?w=c5&a=0,30,20,0&cf class="right"]

Vi skall bygga en applikations- och webbserver med hjälp av Node.js och modulen Express.js.

Servern skall servera statiska filer som bilder, CSS och JavaScript (klientsidan) tillsammans med dynamiska routes som hanteras av JavaScript på serversidan tillsammans med Express.js och Node.js.

Som templatemotor använder vi Embedded JavaScript templating (EJS) vilken hjälper oss att rendera HTML-sidor med dynamisk information från JavaScript. Med en templatemotor kan vi generera delar av HTML-koden och skriva ut innehåll från variabler i JavaScript, så att sidornas innehåll blir dynamiskt.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du kan grunderna i Node.js och JavaScript på serversidan.

Det är bra om du har grundläggande kunskap i HTML och CSS (samt JavaScript på klientsidan). Dessa tekniker används i artikeln men gås inte igenom i detalj.

De exempelprogram som används i artikeln finns i ditt kursrepo databas under `example/express`.



Om Express och MEAN {#om}
--------------------------------------

[Express](https://expressjs.com/) är en webb- och applikationsserver för Node.js. Express är en del av konceptet [MEAN](http://mean.io/) som är en samling moduler för att bygga webbapplikationer med Node.js. I denna artikeln kommer vi att använda Express.js (E) och Node.js (N) i MEAN.

M:et står för MongoDB som är en databas och A:et står för Angular som är ett JavaScript-ramverk för att bygga webbplatser. Dessa två delar kommer vi inte att beröra.

När MEAN introducerades växte konceptet inledningsvis som en motsvarighet till LAMP/WAMP/MAMP/XAMPP som används för webbutveckling enligt Linux/Windows/MacOS, Apache, MariaDB/MySQL och PHP. Numer är själva konceptet MEAN inte så starkt, men dess delar är högst relevanta.



Installera modulen med npm {#npm}
--------------------------------------

Gå till en tom katalog där du kan bygga upp din exempelkod.

Först skall vi installera npm-modulerna som behövs och inför det krävs en `package.json` som kan spara information om de moduler vi skall använda.

```bash
# Ställ dig i katalogen du vill jobba
npm init
```

Du kan bara trycka enter efter varje fråga, det är inget vi behöver ändra.

Nu har du en fil `package.json` i din katalog.

Nu kan vi installera paketen vi skall använda. Det är [`express`](https://www.npmjs.com/package/express) och [`ejs`](https://www.npmjs.com/package/ejs).

```bash
npm install express ejs
```

De moduler som installeras sparas i filen `package.json` med en rad om vilken version som installerades. Du kan öppna filen i din texteditor och se vad den innehåller.

Klart. Då testar vi om installationen gick bra genom att bygga en server i Express.



Verifiera att Express fungerar {#verifiera}
---------------------------------------

Låt oss starta upp en server för att se att installationen gick bra.

Jag börjar med kod som startar upp servern tillsammans med en route för `/` och en route för `/about` och sparar i filen `index1.js`.

```javascript
/**
 * A sample Express server.
 */
"use strict";

// Enable server to run on port selected by the user selected
// environment variable DBWEBB_PORT
const port = process.env.DBWEBB_PORT || 1337;

// Set upp Express server
const express = require("express");
const app = express();

// This is middleware called for all routes.
// Middleware takes three parameters.
// Its callback ends with a call to next() to proceed to the next
// middleware, or the actual route.
app.use((req, res, next) => {
    console.info(`Got request on ${req.path} (${req.method}).`);
    next();
});

// Add a route for the path /
app.get("/", (req, res) => {
    res.send("Hello World");
});

// Add a route for the path /about
app.get("/about", (req, res) => {
    res.send("About something");
});

// Start up server and begin listen to requests
app.listen(port, () => {
    console.info(`Server is listening on port ${port}.`);

    // Show which routes are supported
    console.info("Available routes are:");
    app._router.stack.forEach((r) => {
        if (r.route && r.route.path) {
            console.info(r.route.path);
        }
    });
});
```

Koden (som finns i ditt kursrepo under `example/express/index1.js`) förbereder Express-servern i variabeln `app` och lägger till två routes för _patherna_ `/` och `/about`. De kommer ge var sitt svar när vi når dem via deras path i webbläsaren. Vi lägger även till en middleware som anropas oavsett path, den skriver ut detaljer om inkommande request, bra för debugging. I slutet av koden startar vi servern på vald port och skriver ut detaljer i terminalen om servern som startats.

Så här startar jag via Node.js.

```bash
$ node index1.js
Server is listening on port 1337.
Available routes are:
/
/about
```

Nu lyssnar servern på vald port och jag kan öppna en webbläsare mot dess routes.

Först mot index-routen `/`.

[FIGURE src=image/snapvt18/express-hello.png caption="Så här ser routen `/` ut i webbläsaren."]

Sedan mot routen `/about`.

[FIGURE src=image/snapvt18/express-about.png caption="Så här ser routen `/about` ut i webbläsaren."]

Vi kan även försöka nå en route som inte finns, till exempel `/error`. Det bör visa ett felmeddelande.

[FIGURE src=image/snapvt18/express-404.png caption="När en route inte finns så skrivs ett felmeddelande ut."]

På serversidan skrivs varje request ut av den middleware vi skapat.

```text
Got request on / (GET).
Got request on /about (GET).
Got request on /error (GET).
```

Bra, vi har en Express-server uppe och snurrar och svarar på tilltal på ett par routes. En bra start.



Strukturera koden i moduler och funktioner {#struktur}
--------------------------------------

Innan vi går vidare så strukturerar vi om koden. När koden växer så vill vi använda moduler, filer och funktioner för att få en god kodstruktur som är enkel att underhålla och bygga vidare på.

Jag börjar med att ta kopia av `index1.js` och sparar som `index2.js`. Du finner kodexemplet i `example/express/index2.js`.



### Routes i egen fil {#structroute}

Vi vill lyfta ut funktionerna som är callbacks för respektive route, till en egen fil `route/index.js`.

Efterhand som det blir allt fler routes så passar det bra att samla de routes som hör ihop, i egna filer i en underkatalog som vi döper till `route`.

I filen `route/index.js` lägger jag följande kod.

```javascript
/**
 * General routes.
 */
"use strict";

var express = require('express');
var router  = express.Router();

// Add a route for the path /
router.get('/', (req, res) => {
    res.send("Hello World");
});

// Add a route for the path /about
router.get("/about", (req, res) => {
    res.send("About something");
});

module.exports = router;
```

I koden bygger vi upp en Express router med de routes vi vill ha, i slutet av filen exporterar vi `router`.

Nu kan vi uppdatera `index2.js` och göra require på router-modulen. Sedan använder vi `app.use()` för att montera hela routern in i servern, med alla dess routes.

```javascript
const routeIndex = require("./route/index.js");
app.use("/", routeIndex);
```

Vi kan säga att vi monterar routes från modulen `route/index.js` till monteringspunkten `/`.

Om vi startar om servern kan vi se att de båda routerna för `/` och `/about` fungerar som tidigare.

Vi har fått en god struktur för routes, den hjälper oss när allt fler routes vill in i vår server.



### Middleware i egen fil {#structmiddle}

Vi gör motsvarande uppdatering för vår middleware och lägger i en egen fil i `middleware/index.js`. Vem vet, vi kanske vill bygga fler middlewares framöver.

I `middleware/index.js` lägger vi följande kod.

```javascript
/**
 * General middleware.
 */
"use strict";

/**
 * Log incoming requests to console to see who accesses the server
 * on what route.
 *
 * @param {Request}  req  The incoming request.
 * @param {Response} res  The outgoing response.
 * @param {Function} next Next to call in chain of middleware.
 *
 * @returns {void}
 */
function logIncomingToConsole(req, res, next) {
    console.info(`Got request on ${req.path} (${req.method}).`);
    next();
}

module.exports = {
    logIncomingToConsole: logIncomingToConsole
};
```

Vi organiserar vår middleware som en funktion och i slutet av filen väljer vi att exportera funktionen.

Nu kan vi importera modulen och använda den exporterade funktionen i vår server så här.

```javascript
const middleware = require("./middleware/index.js");
app.use(middleware.logIncomingToConsole);
```

Det blir allt mindre kod i `index2.js` och mer överskådligt. Det är bra när kodbasen växer.

Begreppet middleware är vanligt i ett sådant här sammanhang, det är kod som är tänkt att köra innan en eller flera route callbacks anropas. Det kan till exempel innebära loggning eller at tverifiera att en användare är inloggad och har rätt att uföra den callback som anropas.



### Funktioner i index-filen {#structfunc}

Vår kod för att skriva ut vilka routes som finns tillgängliga behöver uppdateras eftersom vi numer använder en Express Router. I samband med det så lägger vi den i en egen funktion i filen `index2.js` tillsammans med resten av koden som startar upp servern.

Den uppdaterade funktionen ser ut så här.

```javascript
/**
 * Log app details to console when starting up.
 *
 * @return {void}
 */
function logStartUpDetailsToConsole() {
    let routes = [];

    // Find what routes are supported
    app._router.stack.forEach((middleware) => {
        if (middleware.route){
            // Routes registered directly on the app
            routes.push(middleware.route);
        } else if(middleware.name === "router") {
            // Routes added as router middleware
            middleware.handle.stack.forEach((handler) => {
                let route;

                route = handler.route;
                route && routes.push(route);
            });
        }
    });

    console.info(`Server is listening on port ${port}.`);
    console.info("Available routes are:");
    console.info(routes);
}
```

Jag skriver ut hela datastrukturen för `routes`, det blir enklare så.

Det kan vara användbart att ha en sådan funktion när man vill skriva ut vad servern innehåller. Det kan hjälpa dig med debugging och utveckling av servern.

Nu kan funktionen användas som callback när `app` startar.

```javascript
app.listen(port, logStartUpDetailsToConsole);
```

Koden som startar upp servern är nu än mer överskådlig.



### Starta upp servern {#index2.js}

Vilken kod är då kvar överst i filen `index2.js`? Jo denna.

```javascript
/**
 * A sample Express server.
 */
"use strict";

const port    = process.env.DBWEBB_PORT || 1337;
const express = require("express");
const app     = express();
const routeIndex = require("./route/index.js");
const middleware = require("./middleware/index.js");

app.use(middleware.logIncomingToConsole);
app.use("/", routeIndex);
app.listen(port, logStartUpDetailsToConsole);

// excluding function logStartUpDetailsToConsole by intention
```

Vi sätter en port, laddar modulen för Express och initierar en `app` som vi lägger till midleware och routes och därefter startar upp.

Vi startar servern och testkör den för att se att allt fungerar som tidigare.

```text
$ node index2.js
Server is listening on port 1337.
Available routes are:
[ Route { path: '/', stack: [ [Object] ], methods: { get: true } },
  Route { path: '/about', stack: [ [Object] ], methods: { get: true } } ]
Got request on / (GET).
Got request on /about (GET).
Got request on /error (GET).
```

Fint, allt ser ut och fungerar ungefär som tidigare, men vi har en mycket bättre grundstruktur som vi kan bygga ut.



Statiska resurser {#static}
--------------------------------------

I en webbplats är det vanligt med statiska resurser såsom bilder, stylesheets och JavaScript-filer för klientsidan. Kanske vill man även ha HTML-filer som inte kräver någon extra hantering.

I Express kan vi montera en (eller flera) kataloger och använda dem för att leverera statiska resurser till webbläsaren.

Jag tar en kopia av `index2.js` och döper till `index3.js` och utför ändringar i den filen.



### Skapa statiska resurser i public {#skapapublic}

För att pröva kan du ta en kopia av samtliga filer i `example/redovisa` och spara dem under en ny katalog `public`. Det är en statisk webbplats med enbart statiska resurser.

Här är ett kommando som hjälper dig att kopiera filerna.

```text
# Du står i din express-katalog och ett par steg upp ligger katalogen redovisa
# Kolla att sökvägen är korrekt till katalogen du vill kopiera
$ ls ../../../example/redovisa/
favicon.ico  img/  js/  me.html  om.html  redovisning.html  style/

# Nu kopierar vi allt innehåll i katalogen
rsync -av ../../../example/redovisa/ public/
```

Om du har installerat kommandot `tree` i din terminal så kan du nu se katalogträdet under `public`.

```text
$ tree public/
public/
├── favicon.ico
├── img
│   └── me.jpg
├── js
│   └── main.js
├── me.html
├── om.html
├── redovisning.html
└── style
    └── style.css

3 directories, 7 files
```

Bra, då ska vi lägga till, i Express, så att vi når dessa resurser via webbläsaren.



### Lägg till public i Express {#publicexppress}

Med följande kodrader i `index3.js` kan vi lägga till en katalog som innehåller statiska resurser.

```javascript
const path = require("path");
app.use(express.static(path.join(__dirname, "public")));
```

Vi använder modulen `path` från Node.js för att skapa sökvägen till katalogen `public`. Sökvägen monteras sedan via [`app.use()`](https://expressjs.com/en/4x/api.html#app.use) med hjälp av [`express.static()`](https://expressjs.com/en/4x/api.html#express.static).

Nu kan jag starta servern och nå sidan `me.html` på sedvanligt sätt.

Jag startar servern.

```text
$ node index3.js
Server is listening on port 1337.
Available routes are:
[ Route { path: '/', stack: [ [Object] ], methods: { get: true } },
  Route { path: '/about', stack: [ [Object] ], methods: { get: true } } ]
```

Jag öppnar webbläsaren mot `/me.html`.

[FIGURE src=image/snapvt18/express-me-html.png?w=w3 caption="En webbsida med enbart statiska resurser serverade av Express."]

Jag öppnade upp devtools i webbläsaren för att se vilka resurser som laddades som en del av sidan. Förutom `me.html` så kom även stylesheeten `style.css`, ett klient-JavaScript `main.js` och en bild `me.jpg`.

Tittar jag i utskriften på serversidan så ser jag att det är dessa fyra resurser som utförs när jag laddar sidan.

```text
Got request on /me.html (GET).
Got request on /style/style.css (GET).
Got request on /js/main.js (GET).
Got request on /img/me.jpg (GET).
```

Bra, vi kan nu hantera statiska resurser i Express. Det blir ungefär som en traditionell webbserver.



### Ordningen spelar roll {#ordning}

Var uppmärksam på att ordningen spelar roll i `index3.js` och hur du lägger till de olika resurserna, statiska, middleware och routes, in i `app`. Om du vill att loggningen skall ske så måste den resursen läggas till innan den statiska resursen.

Om du lägger till den statiska resursen först, och loggningen efteråt, så kommer loggningen aldrig att ske eftersom requesten avslutas med att den statiska resursen levereras till webbläsaren.

I min `index3.js` är ordningen så här.

```javascript
app.use(middleware.logIncomingToConsole);
app.use(express.static(path.join(__dirname, "public")));
app.use("/", routeIndex);
app.listen(port, logStartUpDetailsToConsole);
```

Min middleware-logger ligger först och kommer alltid att användas, oavsett vilker resurs som sedan returnerar svaret till webbläsaren och användaren.



Vyer och templatemotor {#vyer}
--------------------------------------

Låt oss kika på hur vi kan rendera svar som är en kombination av HTML och JavaScript variabler, vi kallar det dynamiska sidor eftersom de ändrar utseende beroende på variablernas innehåll.

Vi använder [EJS](http://ejs.co/) som templatemotor, deras hemsida stöttar oss med dokumentationen. Den är bra att ha tillhanda nu när vi skall börja använda templatemotorn för att skapa dynamiska HTML-sidor.

Jag kopierar `index3.js` och sparar som `index4.js` och gär där mina ändringar.

Låt oss skapa minsta möjliga setup för att ladda en vy-fil som skriver ut dagens datum och klockslag.



### EJS med Express {#ejsexp}

Vi behöver säga till Express att vi vill använda EJS som templatemotor. Express har stöd för många olika templatemotorer.

```javascript
app.set("view engine", "ejs");
```



###En vy-fil {#viewfile}

Vi behöver en vy-fil, eller template-filer som de också kan kallas.

Express förutsätter att vy-filerna finns i katalogen `views/` och namnges med filändelsen `.ejs`.

Jag skapar `views/today.ejs` som en exempel-vy och lägger till följande kod i filen. Det är en blandning av HTML och kod som templatemotorn tolkar som variabler från JavaScript.

```text
<h1>Today is...</h1>

<p>The date and time is: <%= date %></p>
```

En templatemotor kopplar samman variabler från Node.js och JavaScript med statisk HTML-kod och låter oss generera sidor med dynamiskt innehåll, innehåll som vi till exempel kan hämta från en databas eller annan källa.

I koden ovan är det ren HTML-kod och kod för templatemotorn `<%= date %>` som skriver ut värdet på variabeln `date`.

Men var kommer variabeln `date` ifrån?



###En route som renderar en vy {#rendera}

Vi behöver en route som förbereder den data som skall skickas till en vy och som renderar själva vyn med datan som input.

Jag gör en ny modul för denna route i `route/today.js` via följande kod.

```javascript
/**
 * Route for today.
 */
"use strict";

var express = require("express");
var router  = express.Router();

router.get("/", (req, res) => {
    let data = {};

    data.date = new Date();

    res.render("today", data);
});

module.exports = router;
```

Jag förbereder ett data-objekt som innehåller alla variabler jag vill skicka till vyn. I slutet av routens hanterare så ber jag att vyn `"today"`, som motsvarar `"views/today.ejs"`, skall renderas med de variabler som ligger i `data`.

Som du ser så använder jag routen `/` som referens och det är i `index4.js` som jag väljer var denna route skall monteras på servern.

```javascript
const routeToday = require("./route/today.js");
app.use("/today", routeToday);
```

Jag monterar routen på `/today`. Detta sättet ger mig utrymme att skriva samlingar av routes och användaren av dem kan sedan bestämma exakt var de skall monteras på applikationsservern.

När allt fungerar ihop så kan vi testa routen och få fram följande sida.

[FIGURE src=image/snapvt18/express-today.png caption="En HTML-sida genererad via en EJS-vy inklusive dynamisk information från JavaScript."]

Nu kan vi koppla ihop kod och värden i JavaScript i Node.js med de webbsidor vi renderar. Vi får dynamiska webbsidor.



Avslutningsvis {#avslutning}
--------------------------------------

Detta var en introduktion för att komma igång med webb- och applikationsservern Express tillsammans router, middleware och templatemotor.

Du har nu grunderna för att skriva din egen webb/applikationsserver.

<!--
Denna artikel har en [egen forumtråd](t/7216) som du kan ställa frågor i, eller ge tips.
-->
