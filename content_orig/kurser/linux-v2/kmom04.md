---
author: mos
revision:
    "2018-01-18": (H, mos) Bort med Babel.
    "2017-02-06": (G, mos) Tydligare läsanvisning om ES6.
    "2017-02-02": (F, mos) In med lokal installation av node, npm och babel, åter in med debian node artikeln.
    "2017-01-27": (E, efo,mos) Bort installation debian node.
    "2016-12-21": (D, efo) Ändring av länk till ny nodejs lab.
    "2016-12-16": (C, mos) Förberedelse inför linux-v2.
    "2015-10-16": (B, mos) La till artikel om environemnt variabler i Bash och Node.js samt artikel om process id till fil.
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


<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. Bekanta dig med Node.js genom att besöka [dess webbplats](https://nodejs.org/) och kika snabbt på dess [dokumentation](https://nodejs.org/documentation/).

1. Bekanta dig med npm genom att besöka [dess webbplats](https://www.npmjs.com/) och kika snabbt på dess [dokumentation](https://docs.npmjs.com/).

1. [Exploring ES6](kunskap/boken-exploring-es6). Läs inledande kapitlet för att få en grov känsla av ES6 kontra ES5. Använd därefter boken som referens för nya ES6-konstruktioner.
    * Ch 1: About ECMAScript 6 (ES6)
    * Ch 2: FAQ: ECMAScript 6



###Video  {#video}

Titta på följande:

1. Till kursen finns en videoserie, "[linux](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_AGc9pBgaXFEQGjyFJe7XJ)", kika på de videor som börjar på 4.

1. I labbarna node1 - node3 skrapar vi ytan på funktionell programmering. Titta gärna på denna [spellista](https://www.youtube.com/playlist?list=PL0zVEGEvSaeEd9hlmCXrk5yUyqUag-n84) av MPJ som är programmerare på Spotify.



###Lästips {#lastips}

1. Titta översiktligt på de [nya konstruktionerna i JavaScript ECMA6](https://github.com/lukehoban/es6features/blob/master/README.md).

1. Följ gärna med i forumtråden [Functional Programming](t/5980) där funktionell programmering diskuteras i allmänhet.

1. I boken [Exploring ES6](kunskap/boken-exploring-es6) handlar kapitel 15 om klasser och kapitel 16 om moduler, två goda sätt att strukturera sin kod i ES6.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-12 studietimmar)*

###Labbmiljö

Installera labbmiljön för nodejs delen av kursen.

1. [Installera nodejs och npm lokalt](kunskap/installera-node-och-npm)

<!--
1. [Installera babel-node lokalt](labbmiljo/babel-node)

1. [Installera lokal utvecklingsmiljö](labbmiljo/lokal-utvecklingsmiljo) inklusive babel-node.
-->



###Övningar {#ovningar}

Genomför följande övningar.

1. Jobba igenom guiden "[Bygg en RESTful server med Node.js](kunskap/bygg-en-restful-server-med-node-js)".

1. Jobba igenom artikeln "[Skicka environment variabler till Bash och Node.js ](kunskap/skicka-environment-variabler-till-bash-och-node-js)".

1. Jobba igenom artikeln "[Spara serverns processid i en fil](kunskap/spara-serverns-processid-i-en-fil)".

<!--
1. Jobba igenom guiden "[Kom igång med Node.js på Debian](kunskap/kom-igang-med-node-js-pa-debian)".
-->

<!--
1. Jobba igenom guiden "[Kom igång och gör övningar i Nodeschool.io](kunskap/kom-igang-och-gor-ovningar-i-nodeschool-io)".
-->



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften [Lab 3](uppgift/linux-lab3-introduktion-till-nodejs) för att öva på grunderna i nodejs och funktionell programmering.

1. Gör uppgiften "[Skapa en RESTful HTTP-server med Node.js och klient i Bash](uppgift/skapa-en-restful-http-server-med-node-js-och-klient-i-bash)".

<!--
VT18 ÄNDRA TILL GENERELL LAB MED NODE
1. Gör laborationen [Introduktion till nodejs (node1)](uppgift/introduktion-till-nodejs) för att öva på grunderna i nodejs. Spara koden i `me/kmom03/node1`.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Är detta din första bekantskap med JavaScript på servern eller har du testat det tidigare?
* Vad tänker du om ECMA6, dess nya funktioner jämfört med ES5?
* Hur gick det att förstå koncepten kring klient och server?
* Är du bekant med begreppet funktionell programmering och har du några tankar kring det?

<!--
* Vilka fördelar finns med funktionell programmering om man jämför med proceduell programmering?
-->
