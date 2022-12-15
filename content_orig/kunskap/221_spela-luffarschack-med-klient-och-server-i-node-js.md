---
author: mos
category: javascript
revision:
  "2015-09-11": (A, mos) Första utgåvan.
updated: "2015-09-11 14:52:45"
created: "2015-09-08 07:01:55"
...
Spela luffarschack med klient och server i Node.js
==================================

[FIGURE src=/image/snapht15/gomoku-web.png?a=0,60,60,0 class="right"]

Låt oss skapa ett program där man man spela luffarschack över nätet. Det skall finnas en klient och en server. I längden vore det trevligt om man kan spela mot en annan spelare, två klienter mot en server.

Eller varför inte spela en server mot en annan för att se vilken som är bästa spelare? Med lite artificiell intelligens i servern? Nja, det får vara överkurs.

<!--more-->

Hur bör vi strukturera koden för att få moduler som är avgränsade och gör det lätt att integrera i klient och server? Det vore trevligt om flera typer av klienter kan jobba mot samma server. Kanske en kommadoradsklient och en webbklient. Kan det fungera?

Vi bygger koden och strukturen med JavaScript i Node.js enligt ECMA6.



Om luffarschack, Gomoku och Gomocup {#klass}
--------------------------------------

Spelet heter internationellt [Gomoku](https://en.wikipedia.org/wiki/Gomoku) och det finns en webbplats [Gomuku World](http://gomokuworld.com/) som presenterar nyheter, tävlingar och strategi kring spelet.

I Sverige kallar vi spelet för luffarschack, eller fem i rad. För egen del brukar jag spela med rutat block, och kryss eller ringar. Den som först får fem i rad vinner.

Det finns en svensk organisation som heter [Svenska Luffarschackförbundet](http://luffarschack.org/). Där kan du läsa allmänt om spelet och det finns en möjlighet att träffa andra spelare och delta i tävlingar.

Om man söker på nätet så hittar man en del AI-varianter (Artificiell Intelligens), där man programmerar en server som man kan spela emot. Det finns en tävling [Gomocup](http://gomocup.org/) där man låter sådana servrar spela mot varandra.

[Kanske kommer just din server att vara med i nästa Gomocup](http://gomocup.org/detail-information/)?

För denna övningen så väljer jag att köra spelet på en yta om 20x20 rutor med kryss och ringar. På samma sätt som de gör i Gomocup.



En klass för luffarschack {#klass}
--------------------------------------

Vi börjar med en klass för logiken, en klass som innehåller själva spelet luffarschack, eller iallafall spelplanen och funktionerna för att placera ut ett X eller O.

Eftersom detta är en övning i klient och server så får du en så gott som färdig klass att börja leka med. Du kan kika på [GomokuBoard.js](https://github.com/mosbth/linux/blob/master/example/nodejs/gomoku/GomokuBoard.js) som innehåller klassen för själva spelet.

För att visa hur man kan använda klassen så gjorde jag en enkel klient, [index-random.js](https://github.com/mosbth/linux/blob/master/example/nodejs/gomoku/index-random.js), som slumpar ut dragen. Det är mest för att man skall få en känsla av hur spelet fungerar. Som du kommer se så finns det ingen logik för att kontroller om någon spelare har vunnit.

Så här ser det ut när man kör testprogrammet.

[ASCIINEMA src=26190]

Så här långt har vi alltså en klass som implementerar själva spelplanen och en del av logiken som krävs för att spela. Vi har en klient som importerar klassen och skapar ett körbart program som automatspelar luffarschack.



En server för luffarschack {#klass}
--------------------------------------

Låt oss nu tänka tanken att vi skall göra en server av luffarschacket. Ett RESTful API för servern skulle kunna se ut så här.

| Länk                      | Vad skall hända       |
|---------------------------|-----------------------|
| GET `/`                   | Skriv ut en hjälptext om API:et. |
| GET `/start/:size`        | Starta ett nytt spel med en viss storlek. |
| GET `/view`               | Visa detaljer om spelplanen. |
| GET `/view/ascii`         | Visa spelplanen som en skrivbar sträng. |
| GET `/place/:x/:y`        | Placera draget för spelaren som står på tur, till exempel `/place/10/10`. |

Det som behövs är en front som kan agera server och ta emot svar via ovan RESTful API och sedan utföra själva arbetet mot klassen `GomokuBoard.js`. Det skall alltså vara exakt samma klass som tidigare, det är dess *frontend* som bestämmer att den nu skall agera som en server.

Så här kan det se ut när man testkör den färdiga servern och pratar med den via curl.

[ASCIINEMA src=26195]

Kommandot curl är bra att ha tillhanda när man testkör och jobbar mot liknande servrar.



###Server med router {#router}

För att bygga servern så tänker jag använda en router, på samma sätt som gjordes i [maze-servern](https://github.com/mosbth/linux/blob/master/example/nodejs/maze/maze.js). Det blir enklare och en tydligare strukur på koden på det viset. En router kan vi betrakta som en standardmodul i en sådan här server.

Själva kärnan i att använda routern kan sammanfatts i följande kodexempel.

```javascript
// A better router to create a handler for all routes
var Router = require("../router/router");
var router = new Router();

/**
 * Display a helptext about the API.
 *
 * @param Object req The request
 * @param Object res The response
 */
router.get("/", (req, res) => {

    res.writeHead(200, "Content-Type: text/plain");
    res.write("Welcome the GomokuBoard server. This is the API of what can be done.\n\n"
        + " /             Display this helptext.\n"
        + " /start/:size  Start a new game with a board of :size.\n"
        + " /view         View details on the game.\n"
        + " /view/ascii   View the gameboard and whos next in turn.\n"
        + " /place/:x/:y  Place a marker at choosen place.\n"
    );
    res.end();
});

// Import the http server as base
var http = require("http");
var url = require("url");
var server = http.createServer((req, res) => {
    // Let the router take care of all requests
    router.route(req, res);
});
```

I koden ovan ser vi hur modulen för routern importeras. Sedan lägger vi till en hanterare, en callback-funktion, för routen `/`. Vill vi nu stödja en annan route så lägger vi till en ny hanterare för den routen.

Du kan också se att servern använder sig av routern för att hantera alla inkommande requester. Det är den enda kodraden i servern.

All kod för servern kan du se i filen [`GomokuServer.js`](https://github.com/mosbth/linux/blob/master/example/nodejs/gomoku/GomokuServer.js). Där finns alla routerna implementerade och de anropar `GomokuBoard.js` för att implementera spelet.



###Ett CLI för att starta servern {#servercli}

Nu behöver vi ett main-program för att starta servern. Som ni kanske minns så brukar vi köra servern på  porten 1337. Men, om vi nu slår ihop vår kunskap om CLI-skript med hur man startar servern så kan vi kanske skapa ett CLI-skript som startar servern på valfri port?

Det kan vi. Koden för detta ser du i [`index-server.js`](https://github.com/mosbth/linux/blob/master/example/nodejs/gomoku/index-server.js).

Om man studerar koden så ser man att det blir en del CLI-kod, bara för att hantera själva CLI-delen med `-h`, `-v` och `--port`. Men denna typen av kod är liknande oavsett vilket CLI-skript vi skapar. Så, har vi gjort det för ett skript så blir det enklare i nästa, och nästa.

Vinsten är att få sina program anpassningsbara och självförklarande med hjälptexter. Att wrappa in dem i CLI-kod är ett bra sätt att göra detta.

Så här ser det ut när servern startas via CLI-skriptet.

[ASCIINEMA src=26189]

Att wrappa saker i ett CLI ökar användarvänligheten och gör saker enklare att använda. Det kan också förbättra strukturen på koden och göra den enklare att använda, eftersom man använder ett standardkoncept för att paketera sin kod.



###En och samma kodbas för både lokal klient och server {#kodbas}

Om vi tänker efter en stund, och tittar på vad vi har så här långt, så är det alltså en kärna som implementerar spelet Gomoku. Vi har implementerat en kommandoradsklient som automatspelar och vi har implementerat en server med ett REST API. Men i grund och botten har vi kärnan av klassen `GomokuBoard.js` som implementerar själva spelet.

Tänker vi kodstruktur så kan det vara bra att tänka tanken att min kod skall kunna köras från flera olika typer av klienter. Det kan ge tydliga gränssnitt.

Nu ska jag inte säga att jag lyckades implementera klassen `GomokuBoard.js` exakt som den är från början. Först tog jag och gjorde den mot kommandoradsklienten och därefter byggde jag delvis ut den, och delvis kodade om den, för att även kunna stödja en "server-klient". Men för varje ny klient så såg jag till att den var *bakåtkompatibel* och behöll sitt publika gränssnitt.

Rent strukturmässigt, hur man organiserar sin kod, hur man tänker kring olika klienter, servrar och koden som gör jobbet, kan vara en bra övning. Så låt oss fortsätta och bygga ytterligare en klient och se hur det blir.



En klient i Node.js mot servern {#cliclient}
--------------------------------------

Då tar vi ett steg till och gör en klient i Node.js, en kommandoradsklient som vi kan använda för att koppla upp oss mot en GomokuServer. Jag tänker bygga den med en kommandoradsprompt, med modulen `readline`, på samma sätt som jag gjorde i [`index-random.js`](https://github.com/mosbth/linux/blob/master/example/nodejs/gomoku/index-random.js).

Det får bli en enkel klient som kopplar upp sig mot en server och spelar via RESTful API:et. Klienten får själv placera ut både X och O. Jag döper klienten till [`index-client.js`](https://github.com/mosbth/linux/blob/master/example/nodejs/gomoku/index-client.js).

Så här kan det se ut när man kör det.

[ASCIINEMA src=26240]

Det är rätt smidigt att ha en sådan här klient när man jobbar mot en server. Vare sig det är för att testa eller om det är för att göra ett riktigt program/klient.



###Hur strukturera koden? {#struktur}

Jag har alltså all kod om själva kommandoradsklienten med mainloopen som läser in kommandon, parsar dem och utför dem genom att anropa servern och presentera svaret. Grundkoden för detta ligger i [`index-client.js`](https://github.com/mosbth/linux/blob/master/example/nodejs/gomoku/index-client.js).

Jag kände dock att jag ville lyfta ut delar av klientkoden till en egen klass. Annars hade jag blandad in för mycket domänsspecifik kod i kommandoradsklienten. Det som är domänspecifikt lade jag i en klass [`GomokuClient.js`](https://github.com/mosbth/linux/blob/master/example/nodejs/gomoku/GomokuClient.js) och `index-client.js` använder sig av klassen för att anropa servern.

Själva kommandoradsklienten i `index-client.js` är ju rätt generell, den går att använda som bas för andra liknande kommandoradsklienter. Då känns det dumt att bygga den alltför specifik till Gomuku. Därför fösöker jag lyfta ut det som är mer specifikt för Gomoku.

Men, med facit i hand, lyckas jag med min uppdelning? Ja, det tycker jag. Men visst, tittar man på koden i `GomokuClient.js` så kan man tycka att den lätt hade fått plats in i `index-client.js` Det handlar ju egentligen inte om så mycket kod i `GomokuClient.js`. Men tänk ett steg längre, när koden växer, då känns det rätt bra att redan nu ha en shysst uppdelning.



###Vad är ett promise i ECMA6? {#promise}

Det här med asynkron programmering kan spela en ett spratt till och från. Min klient är en synkron historia. Jag skriver in ett kommando, till exempel `start 10`, som skall utföras medan jag väntar. När kommandot är klart så skall resultatet skrivas ut och därefter skall prompten visas.

Det är inte alltid så lätt i en asynkron miljö. Att göra en HTTP-request till en server är en asynkron historia i sig själv. Fundera på följande kod.

```javascript
http.get("http://dbwebb.se/humans.txt", (res) => {
    console.log("Received" + res.statusCode);
});

rl.prompt();
```

I koden ovan så är det troligast att prompten skrivs ut, innan själva resultatet från http-requesten. Requesten i `http.get()` är asynkron, dessutom laddas sidans body ned i små delar. Så hur kan jag veta när den är klar? Så jag kan skriva ut resultatet följt av prompten, i en sekvens?

Ett sätt att lösa det är med *promises* som är en ny konstruktion i ECMA6. Det är ett sätt att göra saker i en sekvens, Först måste något utföras och när det är klart, så sker nästa sak. Jag använde promises i `GomokuClient.js` för att mainloopen skulle kunna veta när resultatet var klart och när prompten kunde skrivas ut.

Till att börja med så är metoderna i klassen `GomokuClient.js` en så kallad *promise-producent*. Den tillverkar promises. Egentligen så wrappar den ett asynkront beteende i en klass `Promise()` och returneras dess instans.

Så här.

```javascript
/**
 * Make a HTTP GET request, wrapped in a Promise.
 *
 * @param  String url to connect to.
 *
 * @return Promise
 *
 */
httpGet(url) {
    return new Promise((resolve, reject) => {
        http.get(url, (res) => {
            var data = "";

            res.on('data', (chunk) => {
                data += chunk;
            }).on('end', () => {
                if (res.statusCode === 200) {
                    resolve(data);
                } else {
                    reject(data);
                }
            }).on('error', (e) => {
                reject("Got error: " + e.message);
            });
        });
    });
}

/**
 * Prepare the game by creating an empty board of the specified size.
 *
 * @param  Integer size Inital size on the gameboard.
 *
 * @return Promise
 *
 */
start(size = 20) {
    return this.httpGet(this.server + "/start/" + size);
}
```

När mitt promise är klart så anropar jag `resolve(value)` med ett argument som innehåller resultatet. Om något går fel så anropar jag istället `reject(value)`. Det är något av dessa två anrop som berättar att mitt promise är klart och på något sätt uppfyllt.

Min mainloop är *konsument av promises*. Den tänker inte skriva ut prompten, innan requesten är klar med sitt svar.

Så här konsumerar mainloopen i `index-client.js` promiset.

```javascript
case "start":
    var size = args[1] || 20;

    gomoku.start(size)
    .then(value => {
        console.log(value);
        rl.prompt();
    })
    .catch(err => {
        console.log("FAILED: Could not start the game.\nDetails: " + err);
        rl.prompt();
    });
    break;
```

Metoden `gomoku.start(size)` anropas och när den är klar så hanterar `.then()` vad som skall hända. Förutsatt att promiset avslutas med `resolve()`. Om promiset avslutas med `reject()` så hamnar vi istället i sekvensen om `.catch(err)` och hanterar det som ett felfall.

I båda fallen kan vi skriva ut prompten när hela sekvensen är avklarad. Vi har gjort en asynkron händelse lite mer synkron, så att saker kan ske i en sekvens, förutsatt att vissa villkor är uppfyllda.

Du kan läsa lite mer om Promises i artikeln "[ECMAScript 6 promises (2/2): the API](http://www.2ality.com/2014/10/es6-promises-api.html)".



En klient via webbläsaren? {#webbklient}
--------------------------------------

Vad händer om vi nu öppnar länken till servern via vår webbläsare? Vad saknas för att skapa en webbläsar-klient? Nu ser det ut så här i terminalen.

```text
Gomoku$ view                                        
   0 1 2 3 4 5 6 7 8 9                              
 0|_|_|_|_|_|_|_|_|_|_|                             
 1|_|_|_|_|_|_|_|_|_|_|                             
 2|_|_|_|_|_|_|_|_|_|_|                             
 3|_|_|_|_|_|_|_|_|_|_|                             
 4|_|_|_|_|O|_|_|_|_|_|                             
 5|_|_|_|_|_|X|_|_|_|_|                             
 6|_|_|_|_|_|_|_|_|_|_|                             
 7|_|_|_|_|_|_|_|_|_|_|                             
 8|_|_|_|_|_|_|_|_|_|_|                             
 9|_|_|_|_|_|_|_|_|_|_|                             

Player in turn is 'Player 1' playing the marker X.  

Gomoku$ url                                         
Click this url to view the game in a browser.       
http://localhost:1337/view/ascii                    
Gomoku$                                             
```

Klickar jag på länken så öppnar sig sidan i en webbläsare.

[FIGURE src=/image/snapht15/gomoku-web.png caption="En webbläsare som klient, klar!"]

Klart, en klient som fungerar i webbläsaren! Eller ja, kanske inte så användarvänlig. Men webbläsaren är likt curl ett bra verktyg för att testa mot liknande webbtjänster med RESTful API:er.

Tänk om vi nu skulle bygga en klassisk HTML-klient för webben. Hur skulle vi då gjort?

Eller om vi istället skulle byggt en klient helt i JavaScript i webbläsaren, en så kallad SPA, single page application, något som blir alltmer populärt.

Två rimliga klienter mot vår fina Gomoku-server. Båda är rimliga och kräver sin egen kod. Det som jag vill visa är att oavsett vilken typ av klienter vi bygger så är det viktigt att strukturera sin kod på ett vettigt sett. Bra struktur ger enklare implementationer oavsett hur många och få klienter man tänker göra.

Att bygga HTML-klienter och SPA-klienter får vi göra i en annan kurs. Låt oss nu gå vidare och avsluta dagens övning i klient och server.



Redo att gå med i Gomocup? {#gomocup}
--------------------------------------

Är du reda att bygga ut din kod för att delta i Gomocup? Det är kanske en större programmeringsövning, men som du ser så har vi baskoden som går att bygga vidare på. Det som behövs är en ny klient som stödjer det [protokollet](http://petr.lastovicka.sweb.cz/protocl2en.htm) som gäller i Gomocup.

Ja, så behövs det lite AI också, så att spelet kan tänka ut bästa draget själv. Eller iallafall nästa drag. Man kan ju hålla det enkelt.

Vill du se hur man kan bygga en hjärna till ett sådan Gomoku-spel så finns det en [fråga på Stackoverflow](http://stackoverflow.com/questions/6952607/ai-strategy-for-gomoku-a-variation-of-tic-tac-toe) som handlar om detta. Där hänvisas också till ett [forskningspapper som visar hur man kan tänka när man skriver sådan typ av kod](https://chalmersgomoku.googlecode.com/files/allis1994.pdf).



Avslutningsvis {#avslutning}
--------------------------------------

En fördel med att göra som vi gjort i denna artikeln, är att vi i varje steg har haft kod som går att testa och köra. Så även om målet var att bygga en klient och en server, så gjorde vi det stegvis och vi hade hela tiden kod som gick att testa. Annars är det lätt att hamna i ett läge där klienten och servern måste vara klara samtidigt för att testa dem. Men om vi bygger koden på en struktur med alternativa klienter så kan vi hela tiden testa vår kod.

Vi såg också att det är bra att separera vår kod för domänen vi löser (Gomoku) och koden som är generell för klienter och för att starta servrar. Om vi separerar koden så blir den enklare att återanvända.

Har du tips, [förslag eller frågor om artikeln](t/4514) så finns det en specifik forumtråd för det.
