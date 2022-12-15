---
author: mos
category: artikel
updated: "2015-04-13 21:28:21"
created: "2012-12-12 09:43:22"
...
Kom igång med HTML5 Websockets och Node.js
==================================


HTML5 Websockets skapar nya möjligheter där webbläsaren kan ha en konstant uppkoppling mot en server där meddelanden både kan skickas och tas emot med minimal overhead. Möjligheten öppnar sig för att bättre bygga webbapplikationer som agerar i realtid. 

För att komma igång med grunderna i HTML5 Websocket så bygger vi en enkel klient i webbläsaren som visar hur man kopplar upp sig mot en server, skickar och tar emot meddelanden, samt avslutar kopplingen. På serversidan använder vi [Node.js](http://nodejs.org/) för att skapa en server skriven i JavaScript. 

<!--more-->

[WARNING]
**Nyare artikel finns**

Det finns en nyare utgåva av denna artikel vars syfte också är att visa hur du kommer igång med WebSockets tillsammans med Node (och Express).

Du hittar artikeln på "[Kom igång med realtidsprogrammering i JavaScript](kunskap/kom-igang-med-realtidsprogrammering-i-javascript)".
[/WARNING]

Till att börja med så installerar vi node.js och för att se hur det fungerar så skapar vi en enkel webbserver som körs i node.js. Därefter sätter vi tänderna i HTML5 Websockets och vi bygger en enkel echo-server i node.js. En echo-server som skickar tillbaka samma meddelande som den tar emot. Sedan bygger vi ut den till en broadcast-server som tar emot ett meddelande och skickar ut samma meddelande till alla klienter som är uppkopplade mot servern. Till slut har vi alltså nästan en chatt-klient och en chatt-server, med HTML5 Websockets och en server i JavaScript som körs med node.js.

[FIGURE src=/image/kunskap/javascript/html5-websocket-client-to-echo-server.jpg?w=w1&q=70 caption="En websocket-klient som kopplar sig till en echo-server."] 

Då kör vi. Låt oss ta det steg för steg.

[INFO]
**Kan du datakom så blir det enklare**

I övningen förekommer det termer som du normalt lär dig i en kurs i datakommunikation. Det är inte jättesvårt men du har en klar fördel om du har gått en kurs i datakom sedan tidigare. Annars är det bara att ta det lugnt och försiktigt och försök förstå de olika delarna. 
[/INFO]



Node.js, JavaScript på servern {#nodejs}
--------------------------------------------------------------------



###Installera Node.js {#installera-nodejs}

Vi börjar med att installera node.js. [Node.js](http://nodejs.org/) ger en möjlighet att skriva JavaScript på servern och har blivit ett populärt verktyg bland JavaScript-programmerare. Det finns [en hel del moduler](https://npmjs.org/) i form av färdiga JavaScript-bibliotek som är enkla att ladda in och använda tillsammans med node.js.

Du kan ladda ned [Node.js från GitHub](http://github.com/joyent/node) men det enklaste sättet är att installera det via installationsprogrammet som du når via [hemsidan för Node.js](http://nodejs.org/).

Jag installerade både på Windows (enkelt) och på FreeBSD (kompilerade från GitHub, lite krångligare) bara för att testa och båda fungerade bra.

Node.js är alltså ett sätt att exekvera sitt JavaScript-program. När du jobbar med node.js så är du i terminalen. Så här kan det se ut.

[FIGURE src=/img/kunskap/javascript/node-js-command-prompt.png caption="Starta kommando-terminalen för node.js"]

[FIGURE src=/img/kunskap/javascript/node-js-command-prompt-2.png caption="Starta node.js genom att skriva `node` och skriv in din javascript-kod så körs den direkt."]



###En webbserver i Node.js {#webbserver-nodejs}

Låt oss nu bygga ett exempel i node.js, det får bli en enkel webbserver. Studera följande kod och spara den sedan i en fil, `webbserver.js`.

**webserver.js**

```javascript
var port = 1337;

// Require the modules we need
var http = require('http');

// Create a http server with a callback handling all requests
var httpServer = http.createServer(function(request, response) {
  console.log((new Date()) + ' Received request for ' + request.url);
  response.writeHead(200, {'Content-type': 'text/plain'});
  response.end('Hello world\n');
});

// Setup the http-server to listen to a port
httpServer.listen(port, function() {
  console.log((new Date()) + ' HTTP server is listening on port ' + port);
});
```

Som du ser så väljer vi att köra webbservern på en annan port, port 1337. Du har säkert redan din vanliga webbserver som kör på porten 80. Vi använder en modul som heter `http`, den finns inbyggd i node.js och är en server som svarar på http-anrop, precis som en vanlig webbserver. Vi skapar alltså en http-server som alltid svarar med texten "Hello World" och vi kopplar upp servern mot porten 1337.

Så här ser [min kod ut för `webbserver.js`](kod-exempel/nodejs/webserver.js).

Du startar webbservern på följande sätt i node.js kommando prompt. Du kan jämföra denna med apache webbserver, den fungerar enligt samma princip, det är en server som ligger och väntar på en fråga och när frågan kommer så ger den ett svar.

```bash
node webserver.js
```

Du kan nu koppla upp en webbläsare mot din webbserver genom att skriva in länken <a href='http://127.0.0.1:1337/'>http://127.0.0.1:1337/</a> om du är på din lokala maskin med både webbläsare och server.

Om du har svårt att få det att fungera så kan du öppna en webbläsare och testa mot min server på <a href='http://dbwebb.se:1337/'>http://dbwebb.se:1337/</a> så ser du hur svaret "Hello World" borde se ut i webbläsaren.

Så här kan det se ut när du provkör, klicka på bilden för att få en större variant av den.

[FIGURE src=/image/kunskap/javascript/node-js-webbserver.jpg?w=w1&q=70 caption="En http-server i node.js som svarar på http-förfrågningar på port 1337."] 

På serversidan ser du att varje förfrågning loggas och skrivs ut, så här kan det se ut.

[FIGURE src=/img/kunskap/javascript/node-js-command-prompt-3.png caption="Http-server startad i node.js och tar emot och förfrågningar över http."]

Bra, då vet vi att node.js fungerar och du har en fungerande http-server. Då går vi vidare och bygger en server för websockets. Tryck CTRL-C när du vill avbryta webbservern i node.js.



Om Websockets {#websockets}
--------------------------------------------------------------------

HTML5 Websockets API [^1][^2] ger möjligheten att ha en öppen koppling mellan webbläsaren och servern. Meddelanden kan både skickas och tas emot via denna koppling som är [full-duplex](http://en.wikipedia.org/wiki/Duplex_%28telecommunications%29). Kopplingen är asynkron, så fort något sker med kopplingen så sker ett event som du kan koppla en eventhanterare till, precis som vanlig eventhantering i JavaScript i webbläsaren.

När du använder websockets så har du alltid en klient och en server. I våra testfall så kör vi klienten i webbläsaren och servern i node.js. Det finns även websocketservrar som är implementerade i andra programmeringsspråk såsom PHP och Python, men jag har alltså valt att bygga servern i JavaScript och att köra den node.js.

Följande exempelkod visar en klient som kopplar upp en websocket mot en server och kopplar eventhanterare till de event som sker när websocketen öppnas (`onopen`), stängs (`onclose`) och när meddelande tas emot (`onmessage`).

**Kod i webbläsaren, `client.html`, för att koppla upp och hantera en websocket:**

```javascript
<!doctype html>
<meta charset=utf-8>
<title>HTML5 websockets</title>
<h1>Test HTML5 websockets</h1>
<p>Open up firebug and see the output in the console.</p>
<input id='url' value='ws://dbwebb.se:1337'/>
<button id='connect'>Connect</button>

<script>
var url = document.getElementById('url'),
    connect = document.getElementById('connect'),
    websocket;
 
// Event handler to create the websocket connection when someone clicks the button #connect
connect.addEventListener('click', function(event) {
  console.log('Connecting to: ' + url.value);
  websocket = new WebSocket(url.value);
 
  // Eventhandler when the websocket is opened.
  websocket.onopen = function() {
    console.log('The websocket is now open.');
    websocket.send('Thanks for letting me connect to you.');
  }
 
  websocket.onmessage = function(event) {
    console.log('Receiving message: ' + event.data);
  }
 
  // Eventhandler when the websocket is closed.
  websocket.onclose = function() {
    console.log('The websocket is now closed.');
  }
} , false);
</script>
```

Ta en kopia av ovanstående kod och spara en en fil `client.html`, lägg filen på din dator så att du kan öppna den via din vanliga webbserver. Öppna därefter filen i din webbläsare, så här kan det se ut.

Så här blev [min kod för `client.html`](kod-exempel/nodejs/client.html).

[FIGURE src=/img/kunskap/javascript/node-js-websocket-connect.png caption="En websocket klient som kopplar upp sig mot en existerande websocket server."]

Där har vi nu en fungerande klient för HTML5 Websockets. Nu kan det vara läsa att läsa på lite om grunderna i websockets och att bekanta sig med manualsidorna. Framförallt kan du bekanta dig med [Mozilla Developers Network och deras en sektion om Websockets](https://developer.mozilla.org/en-US/docs/WebSockets). Vill du veta mer så har [websocket.org](http://www.websocket.org/) information och enklare exempel och demo som ger grunderna i websockets. W3C utvecklar [specifikationen för HTML5 Websockets](http://dev.w3.org/html5/websockets/) och via websocket.org kan du komma åt specifikationen på websocket protokollet, [RFC 6455](http://datatracker.ietf.org/doc/rfc6455/?include_text=1).

Bra, vi har en klient för HTML5 Websocket, då behöver vi bara en server också.



Skapa en server för websockets {#srv-ws}
--------------------------------------------------------------------


###Installera modulen för websocket {#srv-ws-install}

Websockets finns inte med som en standardmodul i Node.js. Vi behöver alltså leta upp en modul som hanterar Websockets och ladda ned den. Det finns flera att välja på och jag väljer följande modul, [en Websocket modul för Node.js](https://github.com/Worlize/WebSocket-Node)

Jag väljer att installera version 1.0.3 av modulen, de senare versionerna har större krav på vad jag har installerat på min dator. Krav vilka jag inte uppfyllde. Däremot fungerar version 1.0.3 bra att installera, både på Windows och FreeBSD. Jag använder pakethanteraren `npm` som finns med som en central del i node.js.

Bekanta dig snabbt med [`npm`](https://npmjs.org/). Installera sedan modulen websocket version 1.0.3 på följande sätt (skriv inte in procenttecknet, det representerar bara prompten).

```bash
%npm install websocket@1.0.3
npm http GET https://registry.npmjs.org/websocket/1.0.3
npm http 304 https://registry.npmjs.org/websocket/1.0.3
websocket@1.0.3 node_modules/websocket
```

När jag installerar modulen så står jag i den katalog där mina filer ligger. Jag vill ha en lokal installation av modulen, jag vill inte ha en global installation där alla användare av node.js, på den servern, behöver använda just min variant av websocket.

På FreeBSD hamnade paketet i samma katalog där jag körde installationen. Själva modulen hamnar i en underkatalog som heter `node_modules`. 

Med kommandot `npm ls` kan du se vilka moduler du har installerat.

```bash
%npm ls
/home/mos/htdocs/javascript/lekplats/chat-with-node-js-and-html5-websockets
└── websocket@1.0.3
```

På Windows hamnade modulen i min hemmakatalog (katalogen ovanför där jag stod när jag körde installationen).

```bash
%pwd
C:\Users\mos\ws
%npm ls
C:\Users\mos
└── websocket@1.0.3
```

I båda fallet går det nu bra att göra `require(websocket)` för att inkludera modulen i din server-kod. Så här kan det se ut.

```javascript
// Require the modules we need
var WebSocketServer = require('websocket').server;
```

Låt nu se hur vi använder modulen för websocket för att skapa en server.



###En websocket echo-server {#srv-ws-enkel}

Det första jag vill göra är att skapa en enkel websocket-server som fungerar som en echo-server. En echo-server är en server som tar emot alla meddelanden och skickar tillbaka samma meddelande. Det är en enkel server som innehåller alla grunderna som krävs för att senare göra svårare saker.

Innan du börjar koda själv så kan du pröva en [existerande echo-server](http://www.websocket.org/echo.html), och tillhörande klient, på websocket.org. Det är bara så att du ser hur det fungerar.

I websocket-modulens README finns [en echo-server](https://github.com/Worlize/WebSocket-Node/blob/master/README.md#server-example4) som jag tänker utgå ifrån. Jag fortsätter att använda webbservern som en del av min server, websocketservern behöver tillgång till en http-server. Ibland är det en fördel att både webbserver och websocketserver i samma process. Till exempel kan webbservern servera JavaScript-filer till webbläsaren. På det viset blir servern både en webbserver och en websocketserver, den kan hantera både http-trafik och websocket-trafik.

Jag modifierar lite i websocket-modulens exempelkod för echo-servern och får ihop min första variant. Glöm inte att lägga till koden för webbservern också, den behövs.

**Del av koden för echo-server.js, variant ett**.

```javascript
// Here should be the code from the example for the webserver, webserver.js,
// you need that also.

// Require the modules we need
var WebSocketServer = require('websocket').server;

// Create an object for the websocket
// <a href='https://github.com/Worlize/WebSocket-Node/wiki/Documentation'>https://github.com/Worlize/WebSocket-Node/wiki/Documentation</a>
wsServer = new WebSocketServer({
  httpServer: httpServer,
  autoAcceptConnections: false
});

// Create a callback to handle each connection request
wsServer.on('request', function(request) {
  var connection = request.accept();
  console.log((new Date()) + ' Connection accepted from ' + request.origin);

  // Callback to handle each message from the client
  connection.on('message', function(message) {
      if (message.type === 'utf8') {
          console.log('Received Message: ' + message.utf8Data);
          connection.sendUTF(message.utf8Data);
      }
      else if (message.type === 'binary') {
          console.log('Received Binary Message of ' + message.binaryData.length + ' bytes');
          connection.sendBytes(message.binaryData);
      }
  });
  
  // Callback when client closes the connection
  connection.on('close', function(reasonCode, description) {
      console.log((new Date()) + ' Peer ' + connection.remoteAddress + ' disconnected.');
  });
});
```

Spara koden i filen `echo-server.js` och sedan kan du kan starta servern i node.js, precis som vanligt.

```bash
node echo-server.js
```

Är du osäker på koden så tar du en titt i den utmärkta [dokumentationen för websocket-modulen](https://github.com/Worlize/WebSocket-Node/wiki/Documentation).

Så här blev koden för [min server](kod-exempel/nodejs/echo-server-1.js).

Nu behöver vi en klient som kan prata med echo-servern.



###En klient till echo-servern {#echo-srv-klient}

För att testa om det fungerar så behöver du en klient som skickar ett meddelande till servern. Jag väljer att vidareutveckla exempelprogrammet `client.html` och lägger till en knapp som kan skicka ett meddelande till servern.

Följande kod löser både knappen och att skicka meddelandet när jag klickar på knappen.

**Först HTML-kod för knappen**.

```html
<button id='send'>Send message "Hello World"</button>
```

**Sedan JavaScript för att skicka meddelande när knappen trycks ned**.

```javascript
// Add eventhandler to send message
send.addEventListener('click', function(event) {
  var message = "Hello World";
  
  if(!websocket || websocket.readyState === 3) {
    console.log('The websocket is not connected to a server.');
  } else {
    console.log("Sending message: " + message);
    websocket.send(message);      
  }
});
```

Så här blev [min klient](kod-exempel/nodejs/client-1.html).

Kan du få ihop din egen klient och din egen server nu? Du har allt du behöver. Testa tills du får det att fungera.



###Att prata olika subprotokoll {#subprotokoll}

I websockets kan du själv definera ett antal olika protokoll som stöds. Varje protokoll bestämmer ett speciellt sätt att prata mellan klient och server. Det som vi gjort hittills kan vi döpa till `echo-protocol`. Ibland är det viktigt att klienten och servern gör en avstämning så att de pratar samma protokoll och kanske även samma version av protokollet. Låt oss nu utöka vår server så att klienten och servern stämmer av vilket protokoll de pratar med.

För det första kan vi utöka klienten att berätta vilket protokoll den vill prata. Det görs i själva uppkopplingen.

```javascript
websocket = new WebSocket(url.value, 'echo-protocol');
```

Nu kopplar klienten upp sig genom att säga att den vill prata protokollet `echo-protocol`.

I servern behöver vi nu uppdatera där den accepterar uppkopplingen och berätta vilket protokoll som accepteras.

```javascript
var connection = request.accept('echo-protocol');
```

Det vi nu använder kallas ett subprotokoll, `echo-protocol`. Detta gör att en server kan prata många olika protokoll samtidigt och beroende på vad klienten vill använda för protokoll så kan servern bestämma om den kan hantera det. I mitt fall handlar det om en echo-server så jag döper protokollet till `echo-protocol`. Namnet är något jag själv kan bestämma.

Om du nu prövar att koppla upp dig med din föregående klient (den som inte väljer protokoll) mot din nya server (som kräver ett protkoll) så kommer du få felmeddelande både på klient-sidan och på server-sidan.



###Välj vem du vill prata med {#accept-origin}

Innan du accepterar uppkopplingen så bör du också kontrollera varifrån förfrågan kommer. Varje förfrågan om uppkoppling har ett "origin", ett ursprung som är samma som den webbplatsen där sidan laddades ifrån. Själva kontrollen om ett ursprung är något som sker på serversidan i själva uppkopplingsfasen. 

För att lösa det så gör jag en funktion som kontrollerar varifrån förfrågan kommer, där väljer jag vilka "origin" som är acceptabla.

**Funktionen för att kontrollera vem som kopplar upp sig, `originIsAllowed()`**.

```javascript
// Always check and explicitly allow the origin
function originIsAllowed(origin) {
  if(origin === 'http://dbwebb.se' || origin === 'http://localhost') {
    return true;    
  }
  return false;
}
```

Min funktion säger att det är okey att koppla upp sig mot servern om förfrågan kommer från `dbwebb.se` eller från `localhost`.

Precis innan själva uppkopplingen sker så använder vi funktionen ovan för att testa att förfrågan om uppkoppling kommer från en av de "origin" som vi tillåter.

```javascript
  if (!originIsAllowed(request.origin)) {
    // Make sure we only accept requests from an allowed origin
    request.reject();
    console.log((new Date()) + ' Connection from origin ' + request.origin + ' rejected.');
    return;
  }

  var connection = request.accept('echo-protocol', request.origin);
  console.log((new Date()) + ' Connection accepted from ' + request.origin);
```

På detta sätt kan du själv bestämma och kontrollera vem som kopplar upp sig mot din server. Det kan vara en god idé att bara tillåta uppkopplingar från kända källor, men det beror ju på vad du utvecklar för något.



###Testa echo-servern från webbläsaren {#testa-echo-srv}

Nu börjar det bli dax att testa servern så jag bygger en lite snyggare klient som gör `connect`, `close` och skickar meddelanden. Så här blev det för mig. Du kan testa att bygga din egna variant om du vill.

Testa [mitt exempelprogram](javascript/lekplats/echo-server-with-node-js-and-html5-websockets/) där en webbläsare kopplar upp sig mot en websocket echo-server.

[FIGURE src=/image/kunskap/javascript/html5-websocket-client-to-echo-server.jpg?w=w1&q=70 caption="En websocket-klient som kopplar sig till en echo-server."] 

[FIGURE src=/image/kunskap/javascript/output-fran-websocket-echo-server.jpg?w=w1&q=70 caption="Utskrifter från echo-servern i Node.js."] 




Broadcast, prata med många {#broadcast-srv}
--------------------------------------------------------------------

Nästa steg, efter en echo-server, vore att skapa en broadcast-server. 

En sådan server skickar ut meddelandena till alla som uppkopplade. Om du tänker på det så är det nästan samma sak som en echo-server. En echo-server svarar med samma meddelande som klienten skickar in. En broadcast-server gör ju likadant fast meddelandet skickas ut till alla som lyssnar. Skillnaden är att en broadcast-server måste underhålla en lista, en array, med alla klienter. När det kommer in ett meddelande från någon av klienterna så loopar servern igenom arrayen med klienter och skickar ut samma meddelande till alla som lyssnar.

Det känns som en bra vidarutveckling av den enklare echo-servern, lite kodande på serversidan hjälper oss att bättre förstå vad websocket handlar om.

Så här blev det för mig. [Testa min broadcast-server](javascript/lekplats/broadcast-server-with-node-js-and-html5-websockets/) genom att öppna upp en eller flera klienter och börja skicka meddelanden.

När jag gjorde min variant så valde jag att skriva ett nytt subprotokoll `broadcast-protocol`. Det innebär att jag kan använda samma server för både `echo-protocol` och för `broadcast-protocol` (och som webbserver). I mitt fall är det nödvändigt eftersom jag vill att en och samma server skall användas för alla exempelprogram. När du nu gör din `broadcast-server` så får du välja väg, att bygga stöd för flera subprotokoll i samma server eller inte.

För detta exemplet så valde jag att använda exakt samma klient, det enda jag behövde ändra var i uppkopplingen där jag anger subprotokollet.



En bättre Websocket modul? {#ws-battre}
--------------------------------------------------------------------

Kika gärna på [modulen socket.io](http://socket.io/) som innehåller en lösning för websockets som stödjer flera (äldre) webbläsare genom "fallback"-lösningar till Flash och Ajax. Det kan vara ett bra alternativ när du vill köra websockets i produktionsmiljöer.



Publish-subscribe designmönster {#pubsub}
--------------------------------------------------------------------

Ett vanligt sätt att strukturera sin kod i ett sådant här sammanhang är med stöd av designmönstret, design pattern, [Publish-subscribe](http://en.wikipedia.org/wiki/Publish%E2%80%93subscribe_pattern). Du kan läsa artikeln ["WebSockets: A Guide"](http://buildnewgames.com/websockets/) för att insyn i hur du kan organisera din kod när den växer. Artikeln ger dig också en bra bakgrund till Websockets i allmänhet.



Summering {#summering}
--------------------------------------------------------------------

Märker du behovet av en kurs i datakommunikation? Det kan stämma, boka in en sådan kurs eller damma av dina gamla kunskaper i datakommunikation. Sedan är du redo att koda websockets.

Bra jobbat. Vill du fråga något så går det bra i forumet. Det finns en [tråd dedikerad till denna artikel](f/4961).



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2013-05-31 (B, mos) En genomgång som resulterade i fler exempelprogram, en förändrad struktur och mer beskrivande text.  
2012-12-13 (A, mos) Första utgåvan i samband med kursen JavaScript.  
</span>


Referenser {#referenser}
------------------------

Följande är referenser som använts som fotnötter i texten.

[^1]: [HTML5 Websockets API på W3C](http://dev.w3.org/html5/websockets/).

[^2]: [Wikipedia om Websockets](http://en.wikipedia.org/wiki/WebSocket).
