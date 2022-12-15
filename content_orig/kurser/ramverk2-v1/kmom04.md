---
author:
    - mos
revision:
    "2017-11-13": "(A, mos) Första utgåvan."
...
Kmom04: Realtid
==================================

Vi skall studera realtidsprogrammering i webbsammanhang med WebSocket. Vi tittar på grunderna i websockets och ser hur klienter och servrar byggs upp med. Vi tittar på en echo-server och en broadcast-server och vi avslutar med att bygge en enkel chatt för att göra vårt eget applikationsprotokoll ovanpå websockets. Chatten integrerar vi i vår redovisa sida.

När koncepten om websockets är utredda så har du grunden för att bygga vidare på din klient/server applikation i JavaScript. Syftet är att lägga till den realtidsfunktionalitet som du anser lämpligt i din applikation.

<!-- Avslutningsvis lägger du till stöd för funktionstester som exekveras utifrån en webbläsare. -->

<!--more-->

[FIGURE src=image/snapht17/websocket-upgrade-firefox.png?w=w2 caption="En uppkoppling av websocket etableras."]

[FIGURE src=image/snapht17/websocket-subprotocols.png?w=w2 caption="En klient där man kan välja subprotokoll."]

<!--
Input till kurs Realtidsprogrammering för webben

Fler än en server. Delad information mellan servrar.
Uppstart och nedstart av servrar.
(containers, docker)
(databaser)
Subscripter/publisher patterns
IOT
Desktop klient för övervakning
Servrar med JSON API
Prestanda
Systemtest
wss
Security
Redis
(massive multiplayer game)
(gameloop)
realtime prediction estimation
web workers
performace evaluation/optimization webclient (devtools)
Nätverk av många chattservrar, hur synkronisera att flera servrar samverkar för att klara belastningen av ett chattnätverk.
-->

Även i detta kursmoment kommer du att göra teknikval inför implementationen av din applikation. Tänk dig in i rollen som systemarkitekt på ett företag där du är den som gör teknikvalen till nästa projekt. Du skall göra teknikval som hela ditt utvecklargäng sedan skall använda. Tänk så, det blir en bra attityd inför kursmomentet.



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*



###Material {#material}

Kika igenom följande material.

1. Kika på [websocket modulen ws](https://github.com/websockets/ws) för en websocket server som använder rena (_native_) WebSockets.

1. Titta över [MDN WebSockets API](https://developer.mozilla.org/en-US/docs/Web/API/WebSockets_API) som ger dig material för klientsidan samt bakomliggande information om hur man bygger en server från grunden.

1. Kika på webbplatsen för [socket.io](https://socket.io/) för att få en introduktion till en modul som implementerar websockets (och närliggande tekniker) för realtid i klient och server.

<!--
1. Bekanta dig översiktligt med [Selenium WebDriver](http://www.seleniumhq.org/) på dess webbplats. Det är programvara som ger oss möjlighet att skriva funktionstester och exekvera dem via en webbläsare.
-->



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Kom igång med realtidsprogrammering i JavaScript](kunskap/kom-igang-med-realtidsprogrammering-i-javascript)" för att komma igång med konceptet websockets. Spara dina exempelprogram i `me/kmom04/websocket`.

<!--
1. Jobba igenom artikeln "[Kom igång med funktionstester i JavaScript](kunskap/kom-igang-med-funktionstester-i-javascript)" för att komma igång med konceptet websockets. Spara dina exempelprogram i `me/kmom04/functest`.
-->



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften "[Bygg en chatt med WebSocket](uppgift/bygg-en-chatt-med-websocket)". Du bygger ut din redovisa-sida med en chatt. Spara koden i repot `me/redovisa`.

1. Gör uppgiften "[Bygg en klient/server applikation i JavaScript  (realtid)](uppgift/bygg-en-klient-server-applikation-i-javascript-realtid)". Du skall lägga till realtidsfunktionalitet i din applikation. Du sparar koden under `me/app`.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i detta inledande momentet då redovisningstexten är mer omfattande än du är van vid.

Se till att följande frågor besvaras i texten:

* Är du ny på realtidsprogrammering eller har du gjort liknande tidigare? 
* Hur gick det att jobba med konceptet realtidsprogrammering i webben, några reflektioner?
* Berätta om din chatt som du integrerade i redovisa-sidan.
* Berätta om den realtidsfunktionalitet du väljer att integrera i din klient/server applikation.

Har du frågor eller funderingar så ställer du dem i forumet.
