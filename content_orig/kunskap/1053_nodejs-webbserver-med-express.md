---
author: mos
category:
    - nodejs
    - javascript
    - express
    - kursen dbjs
    - kursen ramverk2
revision:
    "2017-10-16": (C, mos) Uppdatering inför kursen ramverk2, mer om pug.
    "2017-03-22": (B, mos) Flytta npm pug till toppen.
    "2017-03-20": (A, mos) Första utgåvan i kursen dbjs.
...
Node.js webbserver med Express 
==================================

[FIGURE src=image/snapvt17/npm-express.png?w=c5&a=0,30,20,0&cf class="right"]

Vi skall bygga en applikations- och webbserver med hjälp av Node.js och modulen Express.

Servern skall både servera statiska filer som bilder, CSS och JavaScript tillsammans med mer dynamiska routes.

Som template-motor använder vi Pug, den hjälper oss att rendera HTML-sidor med dynamisk information från JavaScript.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du kan grunderna i Node.js och JavaScript på serversidan.

Exempelprogram finns i ditt kursrepo under `example/nodejs/express` (dbjs) eller `example/express` (ramverk2).



Installera modulen med npm {#npm}
--------------------------------------

Modulen [Express finns på npm](https://www.npmjs.com/package/express). Express är en del av [MEAN](http://mean.io/) som är en samling moduler för att bygga webbapplikationer med Node.js. I denna artikeln kommer vi att använda Express (E) och Node.js (N) i MEAN.

Innan vi börjar så skapar vi en `package.json` som kan spara information om de moduler vi nu skall använda.

```bash
# Ställ dig i katalogen du vill jobba
npm init
```

När du ombeds döpa paketet så ange "express-demo" eller något liknande (det spelar ingen roll). Använd bara inte "express" eftersom det paketnamnet redan finns och du får problem i nästa steg. Du kan köra om `npm init` om du vill ändra namn, eller redigera namnet direkt i filen `package.json`.

Nu kan vi installera paketen vi skall använda, `express` och `pug`. Vi väljer att spara dem i vår `package.json`.

```bash
npm install express pug --save
```

Klart. Då testar vi om installationen gick bra.



Verifiera att Express fungerar {#verifiera}
---------------------------------------

Låt oss starta upp en server för att se att installationen gick bra.

Jag börjar med kod som startar upp servern tillsammans med en route för `/` och sparar i `index.js`.

```javascript
#!/usr/bin/env node
"use strict";

// Create the app objekt
var express = require("express");
var app = express();

// Add a route
app.get("/", (req, res) => {
    res.send("Hello World");
});

// Start up server
console.log("Express is ready.");
app.listen(1337);
```

Sedan startar jag servern.

```bash
$ node index.js
Express is ready.
```

Nu kan jag skicka requester till servern via curl.

```bash
$ curl localhost:1337
Hello World
```

Om jag använder en route som inte finns så får jag en 404 tillsammans med ett svar som säger att routen inte finns.

```bash
$ curl -i localhost:1337/asd
HTTP/1.1 404 Not Found                        
X-Powered-By: Express                         
Content-Security-Policy: default-src 'self'   
X-Content-Type-Options: nosniff               
Content-Type: text/html; charset=utf-8        
Content-Length: 134                           
Date: Wed, 15 Mar 2017 08:47:43 GMT           
Connection: keep-alive                        
                                              
<!DOCTYPE html>                               
<html lang="en">                              
<head>                                        
<meta charset="utf-8">                        
<title>Error</title>                          
</head>                                       
<body>                                        
<pre>Cannot GET /asd</pre>                    
</body>                                       
```

Pröva nu samma routes via din webbläsare. Du bör få motsvarande svar även i din webbläsare.

Det verkar som allt gick bra och Express är uppe och snurrar och svarar på tilltal.



###Låt npm köra dina skript {#skript}

I filen `package.json` kan du lägga in skript och köra dem via `npm`. Du kan till exempel lägga till skriptet för att starta servern så här.

```json
{
    "scripts": {
        "start": "node index.js"
    }
}
```

Nu kan du starta servern via `npm start`. Det blir ett sätt att samla enklare skript in i din `package.json`.



Läs på om Express {#laspa}
--------------------------------------

Vi vänder oss nu till dokumentationen för Express för att ytterligare se vad man kan göra med Express. Informationen hittar vi på [webbplatsen för Express](http://expressjs.com/). 

Låt oss komma igång med grunderna i Express och hur man sätter upp en applikationsserver som även kan fungera som en vanlig webbserver.



Statiska resurser {#static}
--------------------------------------

En sak som är vanlig i en webbplats är statiska resurser såsom bilder, stylesheets och JavaScript-filer. Kanske även rena HTML-filer som inte kräver någon extra processing.

I Express kan vi montera en (eller flera) kataloger och använda den som en statisk resurs.

```javascript
const path = require("path");

// Serve static files
var staticFiles = path.join(__dirname, "public");
app.use(express.static(staticFiles));
```

Ovan kod lägger jag i min `index.js`.

Säg att katalogen public nu har följande struktur och innehåll (se exempelprogrammet).

```bash
$ tree public/
public/
├── css
│   └── style.css
├── img
│   └── mos.jpg
├── index.html
└── js
    └── move.js

3 directories, 4 files
```

Filen `public/index.html` innehåller följande kod som i sin tur inkluderar bild, stylesheet och javascript.

```html
<!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Try out Express</title>

<body>
<h1>Trying out Express</h1>
<p>Hover on the image and it should move around.</p>
<img id="image" src="img/mos.jpg">
<script src="js/move.js"></script>
</body>
```

Om man nu startar om Express-servern och accessar routen `localhost:1337/index.html` med webbläsaren, så bör man se följande.

[FIGURE src=image/snapvt17/express-static.png?w=w2 caption="En webbsida med enbart statiska resurser i Express."]

Klicka på bilden, om den flyttar sig så fungerar även JavaScriptet. Tänk på att du kan titta i devtools för att se vilka resurser som sidan laddar.

[FIGURE src=image/snapvt17/express-loaded-resources.png?w=w2 caption="Networks-fliken visar vilka resurser som sidan laddar."]

Det var de statiska resurserna det. Bra, bra.



Routing mot olika request metoder {#routemet}
--------------------------------------

En route sätts upp för att svara mot en speciell request metod såsom GET, POST, PUT, DELETE. Det är på det sättet man bygger upp en RESTful tjänst.

Här är fyra routes som har samma url, men skiftar i requestens metod.

```javascript
// Testing routes with method
app.get("/user", (req, res) => {
    res.send("Got a GET request at " + req.originalUrl);
});

app.post("/user", (req, res) => {
    res.send("Got a POST request at " + req.originalUrl);
});

app.put("/user", (req, res) => {
    res.send("Got a PUT request at " + req.originalUrl);
});

app.delete("/user", (req, res) => {
    res.send("Got a DELETE request at " + req.originalUrl);
});
```

Om du testar med din webbläsare så blir det en GET request.

För att testa de andra metoderna så använder jag en plugin till Firefox som heter RESTClient. Med den kan jag välja om jag skall skicka en GET, POST, PUT, DELETE eller någon annan av de HTTP-metoder som finns. En sådan REST-klient är ett värdefullt utvecklingsverktyg.

Så här ser det ut när jag skickar en request med en annan metod än GET.

[FIGURE src=image/snapvt17/express-rest-client.png?w=w2 caption="En DELETE request skickas tll servern som svarar från rätt route."]

Det var routes och stöd för olika metoder det. Se till att du installerar en klient motsvarande RESTClient och testa din egen server.



Middleware {#middleware}
--------------------------------------

I express finns termen "middleware" som benämning på callbacks som anropas innan själva routens hanterare anropas. En middleware kan också vara en hanterare som alltid anropas för alla routes.

Låt oss skapa en sådan middleware, som alltid anropas, oavsett route. Den skall skriva ut vilken route som accessades och med vilken metod.

Vi lägger till middleware via metoden `app.use()`. Vi kan lägga till dem för en specifik route, eller för alla routes. 

```javascript
// This is middleware called for all routes.
// Middleware takes three parameters.
app.use((req, res, next) => {
    console.log(req.method);
    console.log(req.path);
    next();
});
```

Middleware anropas i den ordningen de är definierade, när de matchar en route. Använd ett anrop till `next()` när du är klar och vill skicka vidare kontrollen till nästa middleware och slutligen till routens hanterare.

Om du vill att denna middleware alltid skall anropas så behöver du lägga den högst upp i din kod.

På serversidan ser du nu delar av innehållet i request-objektet som visar metoden och pathen som anropats, samt eventuellt inkommande parametrar.

Liknande utskrifter är bra att ha för att förstå vilken data som routen jobbar med.



Route med dynamiskt innehåll {#dynamiskt}
--------------------------------------

Vi skapar nya routes för att se hur routern hanterar dynamiskt innehåll i form av parametrar.

```javascript
// Add a saying hello
app.get("/hello", (req, res) => {
    res.send("Hello World");
});

// Route with dynamic content save in a parameter
app.get("/hello/:message", (req, res) => {
    res.send(req.params.message);
});
```

Vi kan nu använda följande routes och se vad som händer.

```text
/hello
/hello/Hello-World
/hello/Hello World
/hello/Jag kan svenska ÅÄÖ
```

Vi ser att parametern hanteras och kan nås i routen via `req.params`. Vi ser också att mellanslag och svenska tecken hanteras och översätts med `encodeURIComponent()`.

I webbsidan ser det ut som det ska.

[FIGURE src=image/snapht17/express-encodeuri.png?w=w2 caption="I webbsidan ser det bra ut, ungefär som man tänkte."]

I terminalen där servern kör ser det ut så här.

```text
GET
/hello/Jag%20kan%20svenska%20%C3%85%C3%84%C3%96
```

Det vi ser är exempel på hur webbläsaren och servern hanterar encodning av udda tecken.

Webbläsaren konverterar länken, urlencodar, så att mellanslagen byts ut mot `%20`. När länken tas emot som en route och översätts till parametrar, så gör Express en urldecode på innehållet. Detta är sättet som används för att hantera udda tecken i en webblänk och det sker automatiskt av webbläsaren och Express.

Det fungerar så här, om man översätter det till ren JavaScript.

```bash
$ node                       
> a = encodeURIComponent("Jag kan svenska åäö")
'Jag%20kan%20svenska%20%C3%A5%C3%A4%C3%B6'     
> b = decodeURIComponent(a)                    
'Jag kan svenska åäö'                          
>                                              
```

Det är bra att veta om att det finns en hantering av udda tecken som sker i bakgrunden.



404 med routes {#routefel}
--------------------------------------

När användaren försöker nå en route som inte finns så blir det ett svar med statuskod 404.

[FIGURE src=image/snapvt17/express-default-404.png?w=w2 caption="Ett standard felmeddelande när routen saknas."]

Man kan lägga till en egen route som blir en "catch all" och agerar kontrollerad hantering av 404.

```javascript
// Add routes for 404 and error handling
// Catch 404 and forward to error handler
// Put this last
app.use((req, res, next) => {
    var err = new Error("Not Found");
    err.status = 404;
    next(err);
});
```

Ovan så använder min hanterare för 404 den inbyggda felhanteraren. Det sker via anropet `next(err)` där `err` är ett objekt av typen `Error`. Min variant är alltså att säga att nu är det felkod 404 och jag överlämnar till den inbyggda felhanteraren att skriva ut felmeddelandet.

[FIGURE src=image/snapvt17/express-default-error-handler.png?w=w2 caption="Den inbyggda felhanteraren ger ett fel och en stacktrace."]

Det finns alltså en inbyggd felhanterare som visar upp information om felet, tillsammans med en stacktrace. Det är användbart när man utvecklar.

När node startar upp Express så är det default i utvecklingsläge. Du kan testa att starta upp i produktionsläge, det ger mindre information i felmeddelandena.

```bash
$ NODE_ENV="production" node index.js
```

Nu försvann stacktracen från klienten, men den syns fortfarande i terminalen där servern körs.

[FIGURE src=image/snapvt17/express-error-handling-production.png?w=w2 caption="I produktion så visas inte stacktrace för klienten."]

När vi utvecklar så blir det enklast att köra development läge (standard). Men när man sätter en server i produktion så får man se till att det också är produktionsläge för felmeddelandena, vilket innebär att visa så lite information som möjligt.



Vyer {#vyer}
--------------------------------------

Låt oss kika på hur vi kan rendera svar som är en kombination av HTML och utskrift av JavaScript variabler.

Vi använder [Pug](https://www.npmjs.com/package/pug) som templatemotor. [Manualen till Pug](https://pugjs.org/api/getting-started.html) finner vi på deras hemsida. Den är bra att ha tillhanda nu när vi skall börja använda Pug för att skapa dynamiska HTML-sidor.



###Pug med Express {#pgexpr}

Vi behöver säga till Express att vi vill använda Pug som template-motor.

```javascript
// Use app as template engine
app.set('view engine', 'pug');
```



###En vy-fil {#viewfile}

Vi behöver även skapa vy-filer, eller template-filer som de också kan kallas. Jag kallar dem vy-filer i denna artikeln.

Express förutsätter att vy-filerna finns i katalogen `views/` och namnges med filändelsen `.pug`.

Vi skapar `views/page.pug` som en exempel-vy.

```bash
$ mkdir views
$ touch views/page.pug
```

Spara följande kod i `views/page.pug`.

```text
doctype html
html
    head
        title= title
        link(rel="stylesheet", href="/css/style.css")
    body
        h1= message
        p This is a plain paragraph with a url. Here comes <a href="/test/page">the actual link</a>.
        p Here is a image <img id="image" src="/img/mos.jpg">.

        script(src="/js/move.js")
```

Med Pug kan man skriva enligt deras egen variant av förenklad HTML och kombinera den med vanlig HTML, samtidigt kan man skriva ut innehållet från de medskickade JavaScript-variablerna inuti HTML-koden.

En templatemotor kopplar samman JavaScript-variabler med statisk HTML-kod och låter oss generera sidor med dynamiskt innehåll, innehåll som vi till exempel kan hämta från en databas eller annan källa.



###En route som renderar en vy {#rendera}

Nu behöver vi en route som kan rendera vyn.

```javascript
app.get("/test/page", (req, res) => {
    res.render("page", {
        title: "Hey",
        message: "Hello there!"
    });
});
```

När allt fungerar ihop så kan vi testa routen och få fram följande sida.

[FIGURE src=image/snapvt17/express-pug-page.png?w=w2 caption="En HTML-sida genererad via en Pug-vy inklusive dynamisk information från JavaScript."]

Om du kan klicka på bilden så att den flyttar sig så fungerar även det inkluderade JavaScriptet och stylesheeten.



###Dubbelkolla vilken HTML som genereras {#pretty}

När Pug genererar HTML-koden så är den minifierad. Det kan vara svårt att utveckla och debugga sina vy-filer med minifierad HTML kod.

När vi är i utvecklingsläge kan det därför vara bättre att generera HTML-koden så den blir snyggt formatterad. Lägg till följande kod så kommer Pug att generera snyggt formatterad HTML-kod.

```javascript
if (app.get('env') === 'development') {
    app.locals.pretty = true;
}
```

Du kan dubbelkolla vilken HTML-kod som genereras genom att högerklicka och visa källkoden i webbläsaren.



###Mer dynamiskt innehåll {#routepara}

Vi kan få innehållet i sidan att ändra sig beroende på hur routen ser ut. Om vi parametriserar routens delar så kan vi skriva så här.

```javascript
app.get("/test/:title/:message", (req, res) => {
    res.render("page", {
        title: req.params.title,
        message: req.params.message
    });
});
```

Det är ett sätt att fånga en route som heter `/test/some-title/some-message` eller routen `/test/My Title/No particular message`.

Delen av routen som anges som `:title` hamnar i `req.params.title` och motsvarande sker för `:message`.

Resultatet kan se ut så här.

[FIGURE src=image/snapvt17/express-route-params.png?w=w2 caption="Innehållet i HTML-sidan kommer från routens innehåll."]

En udda sida måhända, men den får demonstrera hur man kan jobba med dynamisk information och parametriserade routes.



Layout för vyer {#layout}
--------------------------------

Du kan bygga upp en vy-struktur där du skapar en sidlayout som du sedan anpassar, med innehåll, när sidresultatet skall genereras. Detta är ett bra sätt att lägga en gemensam struktur för alla sidor på en webbplats.

Låt oss göra en ny testroute `/test/home` som renderar en sida via vy-filen `views/home.pug` som i sin tur använder layoutfilen `views/layout.pug`.

Först skapar vi routens hanterare.

```javascript
app.get("/test/home", (req, res) => {
    res.render("home", {
        title: "Home"
    });
});
```

Vi skapar så en layoutfil `views/layout.pug` som ger webbplatsen en standardlayout.

```text
doctype html
html
    head
        meta(charset="utf-8")
        title= title
        block style
            link(rel="stylesheet", href="/css/style.css")
    body
        block header
            div(class="site-header") Site header
        block navbar
            div(class="site-navbar") Site navbar
        block main
            main(class="main") Mainblock
        block footer
            div(class="site-footer")
                p Copyright (c) by MegaMic
        block script
            script(src="/js/move.js")
```

Kika igenom koden och se om den kan ge en grundstruktur som en webbpalts vill ha.

Sedan skapar vi vy-filen `views/home.pug` som skall använda sig av `views/layout.pug` för att rendera en sida.

```text
extend layout.pug

block main
    h1 My home page
    p This is a plain paragraph with a url. Here comes <a href="/test/page">the actual link</a>.
    p Here is a image <img id="image" src="/img/mos.jpg">.
```

Vi extendar, utökar, `views/layout.pug` och när vi gör det kan vi skriva om innehållet för de block vi väljer.

Nu har du en struktur där varje sida kan ha sitt specifika innehåll och samtidigt bygga på en och samma (eller flera) sidlayouter.

[FIGURE src=image/snapht17/express-layout.png?w=w2 caption="En sida med en vy-fil som extendar en annan."]




Loopa och skriv ut i vyer {#loop}
--------------------------------------

Vi tar ett exempel på hur vi kan loopa igenom data från routen och skriva ut det i vyn i en loop. Vi simulerar en bloggsida.

Först lägger vi till routen för `/test/blog` som skickar en titel och en array med bloggposter till vyn.

```javascript
app.get("/test/blog", (req, res) => {
    res.render("blog", {
        title: "Blog",
        posts: [
            {
                title: "Blog post 1",
                content: "Content 1."
            },
            {
                title: "Blog post 2",
                content: "Content 2."
            },
            {
                title: "Blog post 3",
                content: "Content 3."
            },
        ]
    });
});
```

Sedan skapar vi vyn `views/blog.pug` som loopar genom arrayen och skriver ut varje bloggpost för sig.

```text
extend layout.pug

block main
    each value, index in posts
        section
            h1= value.title
            p= value.content
            p= index
```

Så här kan det se ut.

[FIGURE src=image/snapht17/express-blog.png?w=w2 caption="En blogg-sida som bygger på en loop-konstruktion."]

Loopkonstruktionen är inbyggd i Pug.



Hantera Markdown i Pug {#markdown}
--------------------------------------

Man kan hantera innehåll i Markdown direkt i en Pug template. Featuren i Pug heter filter och ett av de filter som stöds är `markdown-it`.

Först behöver du installera npm-paketet [`jstransformer-markdown-it`](https://www.npmjs.com/package/jstransformer-markdown-it).

```bash
npm install jstransformer-markdown-it --save
```



###Skriva Markdown direkt i vy-filen {#mdvy}

Vi gör en ny route för att testa hur det fungerar.

```javascript
app.get("/test/markdown", (req, res) => {
    res.render("markdown", {
        title: "Markdown"
    });
});
```

Jag skapar då vy-filen `views/markdown.pug` och lägger in text skriven i Markdown som konverteras till HTML när vyn renderas.

```text
extend layout.pug

block main
    main
        :markdown-it(linkify langPrefix='highlight-')
            # Markdown

            ## Another headline
            
            Markdown document with http://links.com and codeblocks.

            Another paragraph.
```

Så här kan det se ut.

[FIGURE src=image/snapht17/express-markdown.png?w=w2 caption="En sida med Markdown direkt från vy-filen via filter."]



###Inkludera fil skriven i Markdown {#mdinclude}

Du kan också inkludera en extern Markdown-fil och använda filtret `:markdown-it` för att rendera innehållet till HTML.

Låt oss testa med en ny route.

```javascript
app.get("/test/markdown-include", (req, res) => {
    res.render("markdown-include", {
        title: "Markdown include"
    });
});
```

Vår vy-fil `views/markdown-include.pug` inkluderar nu en extern Markdown-fil som passerar filtret `:markdown-it`.

```text
extend layout.pug

block main
    main
        include:markdown-it ../content/article.md
```

Så här kan det se ut.

[FIGURE src=image/snapht17/express-markdown-include.png?w=w2 caption="En sida med Markdown där innehållet inkluderats från en extern fil."]

Det går alltså att separera vy-filer från dess innehåll, vilket är en bra sak.

Ett alternativ till att göra detta i vy-filerna är att låta routens hanterare läsa och kompilera markdown-filen, och hantera cachning. 



En egen hanterare för felutskrift {#errorHandler}
--------------------------------------

Vi kan skapa vår egen felhanterare och rendera innehållet i en vy.

En egen felhanterare i Express kan se ut så här.

```javascript
// Note the error handler takes four arguments
app.use((err, req, res, next) => {
    if (res.headersSent) {
        return next(err);
    }
    err.status = err.status || 500;
    res.status(err.status);
    res.render("error", {
        error: err
    });
});
```

Kom ihåg att en sådan här felhanterare är som all annan middleware och det är viktigt i vilken ordning de ligger. De kan anropas i den ordningen som de definieras.

Vi behöver en vy-fil `error.pug` för att rendera svaret i.

```text
extend layout.pug

block main
    main
        h1= error.message
        h2= error.status
        pre #{error.stack}
```

Om vi nu tar en route som inte finns så kommer svaret att renderas i vår egen vy.

[FIGURE src=image/snapht17/express-view-404.png?w=w2 caption="Vår egen felhanterare som nu renderas i vår egen vy."]



Avslutningsvis {#avslutning}
--------------------------------------

Detta var en introduktion i webb- och applikationsservern Express tillsammans med grundläggande begrepp såsom router, request, response, vyer och templatemotor.

Du har nu grunderna för att skriva din egen webb/applikationsserver.

Denna artikel har en [egen forumtråd](t/6329) som du kan ställa frågor i, eller ge tips.
