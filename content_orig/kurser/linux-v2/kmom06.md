---
author: mos
revision:
    "2017-02-09": (B, efo) Tog bort labben.
    "2015-09-11": (A, mos) Första utgåvan för kursen.
...
Kmom06: Klient och server
==================================

Nu har vi en Linux-server, en webbserver, vi kan grunderna i att bygga skript i bash, vi kan bygga servrar med Node.js och kan bygga klienter som kommunicerar med webbtjänster via RESTful API:er. Visst låter det som en hel del?

Låt oss nu ta ytterligare ett steg in i klient och serverprogrammering med Node.js. Vi skall koda i Node.js, både på klient och serversidan. Tanken är att vi får en känsla för hur vi kan dela upp koden och en övning i klient och server med RESTful API.



<!--more-->

Du kommer göra ett kommandoradsprogram i Node.js med argument och options samt en mainloop och kommandotolk. Det kan se ut så här.

[ASCIINEMA src=26103]

Sedan skall du jobba med klienter och servrar i form av Gomoku, luffarshack.

[ASCIINEMA src=26240]

När du är klar har du fått en orientering i hur klienter och servrar kan struktureras med JavaScript i Node.js. Dessutom får du nog en hel del kod som du kan återanvända i senare projekt.


<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 0 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Det finns ingen läsanvisning.
<!--
INFÖR VT18
Läs följande.

1. [Exploring ES6](kunskap/boken-exploring-es6) om Promise.
    * Ch 24: Asynchronous programming (background)
    * Ch 25: Promises for asynchronous programming
-->



###Artiklar {#artiklar}

Det finns inga artiklar.



###Video  {#video}

Titta på följande:

1. Till kursen finns en videoserie, "[linux](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_AGc9pBgaXFEQGjyFJe7XJ)", kika på de videor som börjar på 6.

1. I labbarna node1 - node3 skrapar vi ytan på funktionell programmering. Titta gärna på denna [spellista](https://www.youtube.com/playlist?list=PL0zVEGEvSaeEd9hlmCXrk5yUyqUag-n84) av MPJ som är programmerare på Spotify.



###Lästips {#lastips}

1. Följ gärna med i forumtråden [Functional Programming](https://dbwebb.se/forum/viewtopic.php?f=36&t=5980) där funktionell programmering diskuteras i allmänhet.




Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-18 studietimmar)*



###Övningar {#ovningar}

Genomför följande övningar.

1. Läs igenom övningen "[Gör en kommandoradsklient i Node.js](kunskap/gor-en-kommandoradsklient-i-node-js)".

1. Läs igenom övningen "[Spela luffarschack med klient och server i Node.js](kunskap/spela-luffarschack-med-klient-och-server-i-node-js)".



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Skapa klienter och servrar som spelar luffarschack i Node.js](uppgift/skapa-klienter-och-servrar-som-spelar-luffarschack-i-node-js)".

<!-- 1. Gör uppgiften [Lab 5](uppgift/linux-lab5-fortsattning-asynkron-programmering) för att träna ytterligare på asynkron programmering. -->



###Extra {#extra}

1. Förbered din kod för Gomocup.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur väl har du fått ordning på begreppen kring klient och server?
* Hur känns det att utveckla i Node.js och den asynkrona programmeringsmodellen?
* Gick det bra med dina CLI-program i Node.js, några reflektioner kring dem?
* Gjorde du något extra i uppgiften, eller förändrade grundkoden i Gomoku-spelet?
* Känner du dig sugen, och redo, på att skriva en deltagare till Gomocup?
