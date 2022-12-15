---
author:
    - mos
    - efo
revision:
    "2019-01-20": "(B, efo) Uppdaterad för ramverk2 v2."
    "2018-06-08": "(prel, mos) Nytt dokument inför uppdatering av kursen."
    "2017-11-23": "(A, mos) Första utgåvan."
...
Kmom05: Realtid
==================================

[INFO]

Exempelprogrammen har uppdaterats inför detta kursmoment.

Gör därför en `dbwebb update` innan du börjar på kursmomentet.

[/INFO]

Vi skall studera realtidsprogrammering i webbsammanhang med WebSocket. Vi tittar på grunderna i websockets och ser hur klienter och servrar byggs upp med. Vi tittar på en echo-server och en broadcast-server och vi avslutar med att bygge en enkel chatt för att göra vårt eget applikationsprotokoll ovanpå websockets. Chatten integrerar vi i vår redovisa sida.



<!--more-->



[FIGURE src=image/snapht17/websocket-upgrade-firefox.png?w=w2 caption="En uppkoppling av websocket etableras."]

[FIGURE src=image/snapht17/websocket-subprotocols.png?w=w2 caption="En klient där man kan välja subprotokoll."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*



###Material {#material}

Kika igenom följande material.

1. Kika på [websocket modulen ws](https://github.com/websockets/ws) för en websocket server som använder rena (_native_) WebSockets.

1. Titta över [MDN WebSockets API](https://developer.mozilla.org/en-US/docs/Web/API/WebSockets_API) som ger dig material för klientsidan samt bakomliggande information om hur man bygger en server från grunden.

1. Kika på webbplatsen för [socket.io](https://socket.io/) för att få en introduktion till en modul som implementerar websockets (och närliggande tekniker) för realtid i klient och server.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Kom igång med realtidsprogrammering i JavaScript](kunskap/kom-igang-med-realtidsprogrammering-i-javascript)" för att komma igång med konceptet websockets. Spara dina exempelprogram i `me/kmom04/websocket`.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-applikationen.

1. Gör uppgiften "[Bygg en chatt med WebSocket](uppgift/bygg-en-chatt-med-websocket)". Du bygger ut din me-applikation med en chatt. Spara koden i repot.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i detta inledande momentet då redovisningstexten är mer omfattande än du är van vid.

Se till att följande frågor besvaras i texten:

* Är du ny på realtidsprogrammering eller har du gjort liknande tidigare?
* Hur gick det att jobba med konceptet realtidsprogrammering i webben, några reflektioner?
* Berätta om din chatt som du integrerade i me-applikationen.
* Vilka möjligheter ser du för att utnyttja realtidsprogrammering i webben?

Har du frågor eller funderingar så ställer du dem i forumet.
