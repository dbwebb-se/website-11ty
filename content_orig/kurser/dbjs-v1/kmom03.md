---
author: mos
revision:
    "2017-02-14": (A, mos) Första utgåvan.
...
Kmom03: JavaScript server
==================================

Vi vill nu ha kodning på serversidan och där har vi valt Node.js och JavaScript.  JavaScript på serversidan använder en intressant programmeringmodell med asynkron och eventbaserad hantering. På samma sätt som det fungerar i webbläsaren. Node.js erbjuder också ett flertal API när vi vill jobba med operativsystemets delar som filer och processer.

Så, vi behöver starta med att installera Node.js på servern och komma igång med hur Node.js fungerar. Vi kör på med några övningar och sedan ser vi hur man byggger upp en enkel webbserver, eller webbtjänst, med Node.js. Vi närmar oss ett gränsland där webbservern blir till en webbtjänst. Det blir tydligt i hur vi använder Node.js för att skapa kod som både hanterar webbservern som sådan och lägger till tjänster som utförs av JavaScript-funktioner.

När vi fått ordning på Node.js och en enkel server så börjar vi koppla upp oss mot databasen. Vi fortsätter med SQLite ett tag till.

[ASCIINEMA src=24691]

[ASCIINEMA src=22554]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **40 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Databasteknik](kunskap/boken-databasteknik)
    * Kap 20: SQL inuti ett program

<!--
1. Läsanvisning Javascript. (array/objekt)
-->

1. [Exploring ES6](kunskap/boken-exploring-es6). Läs inledande kapitlet för att få en grov känsla av ES6 kontra ES5.
    * Ch 1: About ECMAScript 6 (ES6)
    * Ch 2: FAQ: ECMAScript 6




###Artiklar {#artiklar}

Det finns inga artiklar.



###Video  {#video}

Det finns inga videoförslag.



###Lästips {#lastips}

Kika på följande lästips om du finner dem intressanta.

1. Titta översiktligt på de [nya konstruktionerna i JavaScript ECMA6](https://github.com/lukehoban/es6features/blob/master/README.md).

<!--
1. Titta översiktligt på [Babel](https://babeljs.io/) som är en JavaScript till JavaScript kompilator som stödjer ECMA6.

1. I boken [Exploring ES6](kunskap/boken-exploring-es6) handlar kapitel 15 om klasser och kapitel 16 om moduler, två goda sätt att strukturera sin kod i ES6.

-->



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 24-30 studietimmar)*



###Labbmiljö

Installera labbmiljön för nodejs delen av kursen.

1. [Installera nodejs och npm](kunskap/installera-node-och-npm)

<!--
1. [Installera babel-node lokalt](labbmiljo/babel-node)
-->



###Övningar {#ovningar}

Genomför följande övningar.

1. Jobba igenom guiden "[Bygg en RESTful server med Node.js](kunskap/bygg-en-restful-server-med-node-js)". Du kan spara dina testprogram i `me/kmom03/nodetest`.

1. Jobba igenom artikeln "[Spara serverns processid i en fil](kunskap/spara-serverns-processid-i-en-fil)".

1. Jobba igenom artikeln "[Skicka environment variabler till Node.js](kunskap/skicka-environment-variabler-till-nodejs)".

1. Jobba igenom artikeln "[SQLite och Node.js](kunskap/sqlite-och-nodejs)". Spara dina exempelprogram i `me/kmom03/sqlite`.



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör laborationen "[Introduktion till nodejs (node1)](uppgift/introduktion-till-nodejs)" för att öva på grunderna i nodejs. Spara koden i `me/kmom03/node1`.

1. Gör uppgiften "[Skapa en RESTful HTTP-server med Node.js (server)](uppgift/skapa-en-restful-http-server-med-node-js)". Spara koden i `me/kmom03/server`.

1. Gör uppgiften "[Bygg en faktureringsmotor för båtklubben (invoice)](uppgift/bygg-en-faktureringsmotor-for-batklubben)". Spara koden i `me/kmom03/invoice`.

1. Gör laborationen "[SQL lab, fortsättning med SQL (sql2)](uppgift/sql-lab-fortsattning-med-sql)" som låter dig fortsätta träna på SQL med SQLite. Spara koden i `me/kmom03/sql2`.



###Extra {#extra}

Gör följande extrauppgifter om du har tid och lust.

1. Jobba igenom guiden "[Kom igång med tmux och terminalen](kunskap/kom-igang-med-tmux-och-terminalen)" för att lära dig hur du jobbar mer effektivt i terminalen med tmux.

<!--
Fortsätt träna på JavaScript i webbläsaren.

1. Gör uppgiften "[JavaScript och arrayer](uppgift/javascript-och-arrayer)".

2. Gör uppgiften "[JavaScript med objekt](uppgift/javascript-och-objekt)".

3. Gör uppgiften "[Rita flaggor med JavaScript och objekt](uppgift/gor-svenska-flaggan-med-javascript-och-objekt)".
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/dbjs/redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Är detta den första bekantskap med JavaScript på serversidan och Node.js?
* Hur känns det att koda JavaScript på serversidan med Node.js?
* Gick det bra att koppla ihop Node med SQLite?
* Fanns det något som var extra utmanande eller någon större svårighet i detta kursmomentet?
