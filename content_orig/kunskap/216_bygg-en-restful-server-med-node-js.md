---
author: mos
category:
    - javascript
    - nodejs
revision:
    "2017-02-14": (E, mos) Bort med behov av Babel.
    "2017-02-06": (D, mos) Uppdaterad för att stödja både kurserna linux och dbjs, la till stycke om egen modul med routes.
    "2016-01-02": (C, mos) Tog bort ip-adressen från listen().
    "2015-10-13": (B, mos) Nytt stycke om hantera querystring.
    "2015-08-12": (A, mos) Första versionen inför linux-kursen.
...
Bygg en RESTful server med Node.js
==================================

[FIGURE src=/image/snapht15/node-server.png?w=c5&a=0,50,50,0 class="right"]

Kom igång med att skriva JavaScript på servern med Node.js för att bygga ett embryo till en RESTful server som svarar på HTTP anrop och levererar olika typer av svar.

Artikeln går igenom grunderna till en HTTP-server i Node.js och visar hur du kan skriva kod som ger olika typer av svar som texter, filer och JSON-objekt.

<!--more-->

I grunden handlar det om att få en förståelse för vilken typ av kod som behövs för att skapa en enkel server och hur man testar den.



Förutsättning {#pre}
--------------------------------------------------------------------

När du jobbar med artikeln så kan du köra server och klient på en och samma maskin. Men det går också bra att köra klient/server på två skilda maskiner. Grundtanken är att man skall kunna köra servern på en maskin och koppla sig till den via flera klienter som kör på olika maskiner.

Du behöver ha node installerat.

Om du läser artikeln som en del av en kurs (linux, dbjs) så finner du att exempelprogrammen är samlade i ditt kursrepo under `example/nodejs`.



RESTful server {#rest}
--------------------------------------------------------------------

En [RESTful](https://en.wikipedia.org/wiki/Representational_state_transfer) server är en server som svarar på HTTP-anrop. Du kan till exempel hämta information om en användare via länken `GET /people/mos`. Du kan radera samma användare med ett annat anrop likt `DELETE /people/mos`.

Många webbtjänster publicerar sina API:er och tillåter andra att använda dem för att integrera i sina egna tjänster. Ett par exempel, där webbtjänster erbjuder tillgång via REST apier, är [Instagram](https://instagram.com/developer/) och [Twitter](https://dev.twitter.com/).



En server i Node.js {#server}
--------------------------------------------------------------------

Länge fanns ett exempel på hemsidan för Node.js om hur man skapa de en server, en Webbserver, med Node. Det handlade bara om ett par rader kod. Det visar enkelheten i att skapa en server.

Koden ser ut så här.

```javascript
/**
 * Main program to run a simple server that says Hello World.
 *
 */
"use strict";

// Get the module for http and store it in a variable
var http = require("http");

// Use the variable to create a server.
// The server executes the function for each request it receives.
http.createServer(function (req, res) {
    res.writeHead(200, { "Content-Type": "text/plain" });
    res.end("Hello World\n");
}).listen(1337);

console.log("Server running at http://127.0.0.1:1337/");
```

Man sparar koden i en fil, `index.js`, och kör den så här.

```bash
$ node example.js
Server running at http://127.0.0.1:1337/
```

För att nu komma åt servern och skicka ett meddelande till den så kan vi öppna vår webbläsare till länken `http://127.0.0.1:1337/`.

[FIGURE src=/image/snapht15/firefox-nodeserver.png?w=w2 caption="Kom åt servern via webbläsaren, localhost är samma sak som 127.0.0.1."]

Eller så använder vi kommandot `wget` eller `curl` på kommandoraden. Jag väljer `curl` idag.

```bash
$ curl http://127.0.0.1:1337/
Hello World
```

Det kan se ut så här när man kör exemplet på en och samma maskin.

[ASCIINEMA src=24826]

Det går lika bra att lägga servern på en annan maskin.

Du kan läsa om [modulen `http` i manualen för Node.js](https://nodejs.org/api/http.html) (kika bara kort och översiktligt).

Du hittar exempelprogrammet i ditt kursrepo under `example/nodejs/serverHelloWorld`.



En modul för en server  {#modul}
--------------------------------------------------------------------

Låt oss nu kika i ett annat exempel på en server, denna gången är det `simpleServer` och den ser ut så här i `server.js`.

```javascript
/**
 * Simple HTTP server returning Hello World as plain text.
 */
"use strict";

// Require the module
var http = require("http");

// Use the createServer function to create the simple server
var server = http.createServer((req, res) => {

    var ipAddress;

    // Log incoming requests
    ipAddress = req.connection.remoteAddress;
    console.log("Incoming request from ip " + ipAddress);

    // Write header with text/plain as content type and 200 HTTP status code
    res.writeHead(200, { "Content-Type": "text/plain" });

    // Reply with a string
    res.end("Hello World\n");
});

// Export the server as a module.
module.exports = server;
```

Det vi ser framför oss är en modul enligt ES6. Tanken är att fördela sin kod i moduler och varje modul ligger i en egen fil. I slutet på filen ser vi vad modulen exporterar för funktioner. I detta fallet är det variabeln `server` som exporteras.

```javascript
// Export the server as a module.
module.exports = server;
```

Nu har vi all kod för servern samlad i en fil, en modul. För att använda den så behöver vi ett *main-program*, eller en `index.js` som man normalt kallade dess motsvarighet i node-världen.

Här är vår variant av index.js som importerar `server` och sedan startar igång själva servern.

```javascript
/**
 * Main program to run a simple server that says Hello World.
 *
 */
var server = require("./server.js");

// Start the server to listen on a port
server.listen(1337);

console.log("Simple server listen on port 1337.");
```

Det kan se ut så här när man kör exempelprogrammet.

[ASCIINEMA src=24837]

Vad vi nu har är en bra grundstruktur med kod fördelat i olika moduler, filer. Det blir enklare att få en översikt när koden växer.



En server som svarar med JSON  {#json}
--------------------------------------------------------------------

I sammanhanget RESTful så är det vanligt att servrarna ger svar via JSON-objekt.

Ett JSON-objekt kan se ut så här.

```javascript
{
    'text': 'Hello World'
}
```

Låt oss nu kika på ett annat exempelprogram som levererar ovannämnda svar. Du hittar koden till exemplet i kursrepot i `simpleJsonServer`.

Strukturen i exempelprogrammet är i stort sett likadan som förra exempelprogrammet `simpleServer`. Skillnaden är svaret som levereras.

Låt oss börja med att köra exempelprogrammet.

[ASCIINEMA src=24838]

För att testa att servern levererar både rätt header och body så kan man testköra i webbläsaren med Firebug, eller hämta headern med curl.

Så här ser det ut om jag enbart hämtar HTTP headern med curl.

```bash
$ curl -I http://localhost:1337/
HTTP/1.1 200 OK
Content-Type: application/json
Date: Mon, 06 Feb 2017 13:36:30 GMT
Connection: keep-alive
```

Kika mer i videon när jag testar lite mer.

[YOUTUBE src=HchGLzgSV1U width=630 caption="Mikael testkör JSON-servern med curl och webbläsare."]

Så där, nu har vi grunderna i hur vi kan skicka olika typer av svar med servern. Så här långt har vi täckt in vanlig text och JSON.



Server som exekverar extern kommando {#kommando}
--------------------------------------------------------------------

Låt oss titta på en ungefär likadan server, denna gången exekverar servern ett externt kommando och skickar tillbaka svaret i form av en text. Varför text och inte JSON? Ja, säg det. Ta det bara som ett exempel på hur man kan göra.

Exempelprogrammet `serverUptime` finns i kursrepot och har samma uppbyggnad som de andra.

Det som skiljer är främst följande rader i `serverUptime.js`.

```javascript
var child = require("child_process");

// Execute a child process, in this case "uptime".
child.exec("uptime", (error, stdout, stderr) => {
    if (error || stderr) {
        // Do something with the error(s)
        console.log("Something went wrong...", error, stderr);
    }

    // Write the result of standard output as plain text.
    res.writeHead(200, { "Content-Type": "text/plain" });
    res.end(stdout);
});
```

Resultatet är att en process exekveras med kommandot `uptime` och svaret, som finns i `stdout` skickas som svar.

Om man exekverar kommandot `uptime` i en terminal så kan det se ut så här.

```bash
$ uptime
 10:34:22 up 2 days,  2:06,  2 users,  load average: 0.69, 0.80, 0.80
```

Men åter till servern som alltså exekverar ett externt kommando. Du kan läsa i [Node.js API om modulen `child_process`](https://nodejs.org/api/child_process.html). Det är bra att bekanta sig med den typen av API-beskrivningar. Lär dig att tyda dem så blir Node.js enklare att använda.

Så här ser det ut när jag kör exemplet.

[ASCIINEMA src=24876]

Vill du bara kolla HTTP headern så ser det ut så här via curl.

```bash
$ curl -I http://localhost:1337/
HTTP/1.1 200 OK
Content-Type: text/plain
Date: Mon, 06 Feb 2017 13:45:37 GMT
Connection: keep-alive
```

Du har nu ytterligare en variant av server som hämtar sitt svar från en extern process. Det kanske inte är vanligt att man gör så, men det är alltså en möjlighet.



Server som läser från fil {#fil}
--------------------------------------------------------------------

En annan vanlig variant på funktion som en server kan utföra är att läsa information från en fil och leverera ett svar. Låt oss kika på exemplet `serverReadFile` som gör just detta. Exemplet gör det dessutom på två olika sätt. Synkront och Asynkront.

Synkront blockar alla andra händelser och stoppar upp flödet i programmet tills det är klart.

Asynkront läser små bitar av filen i taget, det innebär att servern kan göra andra saker medan filen läses in. Men det behöver vara en stor fil för att du skall märka någon skillnad.

Här kan du läsa om en enkel och kort förklaring till [synkron och asynkron programmeringsmodell](http://stackoverflow.com/questions/8982489/how-does-asynchronous-programming-work-in-a-single-threaded-programming-model).

Du kan läsa om [modulen `fs` i API-dokumentationen](https://nodejs.org/api/fs.html).

Låt oss kika på hur man synkront läser innehållet i en fil.

```javascript
var fs = require("fs");

// Read file1.txt using synchronous method
filename = "file1.txt";
data = fs.readFileSync(filename, "utf8");
res.writeHead(200, { "Content-Type": "text/plain" });
res.end(data);
```

Inget konstigt, ett vanligt funktionsanrop. Men vi kallar det synkront och blockande. Exekveringen av programmet kan inte fortsätta innan filen är inläst.

Samma resultat får vi om vi använder ett asynkront sätt att läsa filens innehåll.

```javascript
// Read file2.txt using synchronous method
filename = "file2.txt";

fs.readFile(filename, "utf8", (err, data) => {
    // If readFile got an error we throw it
    if (err) {
        // Sends to the client that the server failed
        res.writeHead(500, { "Content-Type": "text/plain" });
        res.end("Internal server error");
        console.log("Internal server error");
        throw err;
    }

    res.writeHead(200, { "Content-Type": "text/plain" });
    res.end(data);
});
```

Skillnaden är att vi skickar med en callback-metod som anropas när hela filen har lästs in. Anropet är heller inte blockerande utan exekveringen fortsätter och kan ta emot fler anrop till servern.

Du är troligen van vid JavaScript och deras programmeringsmodell med events och callbacks. Att programmera asynkroniskt innebär att jobba med callbacks istället för blockande funktioner. Det är ett litet annorlunda tankesätt, men kan du JavaScript på klientsidan så bör det inte vara ett helt nytt tankesätt.

Så här ser det ut när man kör exempelprogrammet.

[ASCIINEMA src=24878]

Nu börjar vår server bli allt större. Kan vi månntro finna ett bättre sätt att organisera den?

Om du kikar en gång extra på exempelprogrammet så ser du att det nu klarar av att svara olika beroende på vilken route (länk) som man använder.



Server med routes {#routes}
--------------------------------------------------------------------

I förra exempelprogrammet hade vi en if-sats som utförde olika saker beroende på vilken länk som angavs. Jag kallade detta för vilken `route` som angavs.

```javascript
// To parse the route from the url
var url  = require("url");

// Check what route is requested
route = url.parse(req.url).pathname;
```

För att skala upp detta så kikar vi på ett exempelprogram `serverWithRoutes` som använder en switch-case sats för att hantera flera routes.

Grundkoden ser ut så här, egentligen bara en switch-case som ersätter if-satsen, men koden blir lite snyggare och framförallt - tydligare.

```javascript
// Switch (route) on the path.
switch (route) {
    case "/":
        // Home page route.
        res.writeHead(200, { "Content-Type": "text/plain" });
        res.end("Home page\n");
    break;

    case "/about":
        // About page route.
        res.writeHead(200, { "Content-Type": "text/plain" });
        res.end("About\n");
    break;

    default:
        // Not found route.
        res.writeHead(404, { "Content-Type": "text/plain" });
        res.end("404. No route matching.\n");
    break;
}
```

Det kan se ut så här när man testkör exempelprogrammet.

[ASCIINEMA src=24879]

Nu känns det som vi har grunderna till en enklare server. Det känns som vi har en hyffsat god struktur att bygga vidare på.



En egen modul för routes {#routes-modul}
--------------------------------------------------------------------

Apropå struktur så är det tänkbart att min switch-case sats, för mina routes, kommer att växa allt eftersom min server blir allt större. Kanske vore det en idé att lägga dem i en egen modul.

Låt oss se hur det kan se ut, om inte annat så bara för att testa på att skapa en egen modul. Du ser koden i `serverWithRoutesModule`.

Först bygger vi en modul i `routes.js` för att lägga varje route callback som en egen metod. Jag börjar lägga dit home-routen.

```javascript
var routes = {};

routes.home = (res) => {
    res.writeHead(200, { "Content-Type": "text/plain" });
    res.end("Home page\n");
};

// Export as a module
module.exports = routes;
```

Sen importerar jag modulen i min `server.js` och använder callbacken i switch-case-satsen.

```javascript
// My handlers for each route is now within this module
var routes = require("./routes.js");

    // code is omitted...

// Switch (route) on the path.
switch (route) {
    case "/":
        routes.home(res);
    break;

    // code is omitted...
```

Detta känns lite bättre. Nu delade jag upp koden på ett aningen bättre sätt (och jag tränade på att skapa egna moduler). Jag kommer undvika att server.js blir alltför stor. Det finns säkert ännu bättre strukturer, men detta fungerar bra för mina enklare exempelprogram.



Hantera querysträngen {#query}
--------------------------------------------------------------------

Ibland vill man skicka med argument i requesten via querysträngen. Det är den delen av urlen som börjar med ?-tecknet. Till exempel `?a=b&c`. Det finns ett exempelprogram `serverQueryString` som visar hur det fungerar.

Querysträngen är en del av urlen och kan hämtas ut på följande sätt.

```javascript
var qs = require("querystring");

urlParts = url.parse(req.url, true);
route = urlParts.pathname;
query = urlParts.query;
queryString = qs.stringify(query);

console.log("Incoming route " + route + " from ip " + ipAddress + " with querystring " + queryString);
```

Koden ovan parsar urlen och skapar ett objekt `urlParts` med dess delar. Det andra argumentet är satt till `true` för att jag vill ha ett objekt `query` som innehåller de olika delarna i querysträngen. Det blir enklare att hantera på det viset. För att kunna se hur querysträngen ser ut så använder jag en inbyggd modul `querystring` som parsar objektet till en sträng som jag kan skriva ut för debugging.

Egentligen kan jag bara skriva ut objektet direkt. Nodejs innehåller en utility som låter mig skiva ut innehållet i ett objekt.

```javascript
var util = require("util");

// Inspect the details of the object created for the query string
console.log(util.inspect(query));
```

En annan möjlighet för att jobba med querysträngen är att loopa igenom objektet och se vad det innehåller.

```javascript
// Loop through all query variables
Object.keys(query).forEach( key => {
    console.log(key + " : " + query[key]);
});
```

Så här kan det se ut när man testkör exempelprogrammet `serverQueryString` och skickar in olika querysträngar.

[ASCIINEMA src=27833]

Fint, då har vi koll på den biten också.



Avslutningsvis {#avsluting}
--------------------------------------------------------------------

Detta var en genomgång av hur du på olika sätt kan programmera en server i Node.js och leverera olika svar över HTTP. Du har sett varianter av kod till en RESTful server, inte komplett eller fullständig kanske, men med grunderna som gör att du nu kan sätta ihop en egen server.

Det finns en [forumtråd kopplad till artikeln](t/4363) där du kan ställa frågor eller kommentera artikeln.
