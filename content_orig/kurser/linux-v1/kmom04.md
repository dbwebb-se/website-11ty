---
author: mos
revision:
  "2015-10-16": (B, mos) La till artikel om environemnt variabler i Bash och Node.js
    samt artikel om process id till fil.
  "2015-08-13": (A, mos) Första utgåvan för kursen.
...
Kmom04: Server med Node.js
==================================

Nu har vi en Linux-server, en webbserver och vi kan grunderna i att bygga skript i bash. Låt oss nu kika på en annan sak, hur man bygger egna servrar i Linux med Node.js.

Jag har valt att vi jobbar med JavaScript och Node.js. Dels är tekniker med serverprogrammering med JavaScript en växande teknik, men det är också en intressant programmeringmodell med asynkron och eventbaserad hantering och det finns flertalet API när vi vill jobba med operativsystemets delar.

Så, vi  behöver starta med att installera Node.js på servern och komma igång med hur Node.js fungerar. Vi kör på med några övningar och sedan ser vi hur man byggger upp en enkel webbserver, eller webbtjänst, med Node.js. Vi närmar oss ett gränsland där webbservern blir till en webbtjänst. Det blir tydligt i hur vi använder Node.js för att skapa kod som både hanterar webbservern som sådan och lägger till tjänster som utförs av JavaScript-funktioner.

Nåja, det är bättre att vi tittar hur det ser ut.

<!--more-->

[ASCIINEMA src=24691]

[ASCIINEMA src=22554]


<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. Bekanta dig med Node.js genom att besöka [dess webbplats](https://nodejs.org/) och kika snabbt på dess [dokumentation](https://nodejs.org/documentation/).

1. Bekanta dig med npm genom att besöka [dess webbplats](https://www.npmjs.com/) och kika snabbt på dess [dokumentation](https://docs.npmjs.com/).



###Artiklar {#artiklar}

Det finns inga artiklar.



###Video  {#video}

Det finns inga videoförslag.



###Lästips {#lastips}

1. Titta översiktligt på de [nya konstruktionerna i JavaScript ECMA6](https://github.com/lukehoban/es6features/blob/master/README.md).

1. Titta översiktligt på [Babel](https://babeljs.io/) som är en JavaScript till JavaScript kompilator som stödjer ECMA6.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*



###Övningar {#ovningar}

Genomför följande övningar.

1. Jobba igenom guiden "[Kom igång med Node.js på Debian](kunskap/kom-igang-med-node-js-pa-debian)".

1. Jobba igenom guiden "[Kom igång och gör övningar i Nodeschool.io](kunskap/kom-igang-och-gor-ovningar-i-nodeschool-io)".

1. Jobba igenom guiden "[Bygg en RESTful server med Node.js](kunskap/bygg-en-restful-server-med-node-js)".

1. Jobba igenom artikeln "[Skicka environment variabler till Bash och Node.js ](kunskap/skicka-environment-variabler-till-bash-och-node-js)".

1. Jobba igenom artikeln "[Spara serverns processid i en fil](kunskap/spara-serverns-processid-i-en-fil)".



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Utför Nodeschool workshopen javascripting](uppgift/utfor-nodeschool-workshopen-javascripting)".

1. Gör uppgiften "[Skapa en RESTful HTTP-server med Node.js och klient i Bash](uppgift/skapa-en-restful-http-server-med-node-js-och-klient-i-bash)".



###Extra {#extra}

Det finns inga extra uppgifter.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/linux-v1/redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Är detta din första bekantskap med javaScript på servern eller har du testat det tidigare?
* Vad tänker du om ECMA6, dess nya funktioner och sättet att få tillgång till dem via `babel-node`?
* Vad tyckte du om Nodescools variant på övningar och workshops?
* Hur gick det att förstå koncepten kring klient och server?




