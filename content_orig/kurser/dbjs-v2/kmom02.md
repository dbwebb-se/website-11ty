---
author: mos

views:
    block-about: null

revision:
    "2018-01-11": (A, mos) Kursen ersätts med kursen databas.
...
Kmom02: Databas
==================================

I samband med utvecklingen av version 2 av dbjs bestämdes att istället sammanfoga kursen med "[kursen databas](kurser/databas-v1)".

<!--stop-->

[WARNING]
**Kursutveckling pågår inför vt18.**
[/WARNING]

Då dyker vi in i databaser tillsammans med SQL och ER-modellering. Jag har valt att introducera databasen SQLite som är en filbaserad databas. En filbaserad databas förenklar hanteringen eftersom databasen ligger i en enda fil och det finns inga användare eller behörigheter att konfigurera.

Till databasen SQLite behövs klientprogram som kan användas för att prata med databasen. Vi prövar olika klienter, en variant för desktop och en terminalbaserad.

I en databas, en relationsdatabas som SQLite, så pratar vi SQL med databasen. Vi skriver SQL uttryck för att skapa tabeller och för att lägga till, uppdatera, visa och radera data från databasen.

Samtidigt kikar vi på hur man modellerar och tänker när man bygger upp en databas.

Vi fortsätter även att förkovra oss i JavaScript och funktioner.

<!--more-->

[FIGURE src=image/sqlite20/create-table.png?w=w2 caption="En databas har tabeller med kolumner och rader."]

[FIGURE src=image/snapvt15/sqlite3.png?w=w2 caption="En databas via terminalen."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **40 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 10-15 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Databasteknik](kunskap/boken-databasteknik)
    * Kap 1: Databaser och databashanterare
    * Kap 2: ER-modellering
    * Kap 4: Designpocessen
    * Kap 5: Relationsmodellen
    * Kap 6: Översättning från ER-modellen till relationsmodellen
    * Kap 7: Introduktion till frågespråket SQL

    En översikt av kapitel ovan  finns i [bokens webbkurs](http://www.databasteknik.se/webbkursen/), del 1.


1. [Speaking JavaScript](kunskap/boken-speaking-javascript).

    1. [Ch 15: Functions](http://speakingjs.com/es5/ch15.html)
    1. [Ch 16: Variables: Scopes, Environments, and Closures](http://speakingjs.com/es5/ch16.html)



###Artiklar {#artiklar}

Läs igenom följande artiklar.

1. Jobba igenom artikeln "[Kokbok för databasmodellering](kunskap/kokbok-for-databasmodellering)", den ger dig ett exempel på databasmodellering och dess olika faser.



###Video  {#video}

Det finns inga videoförslag.



###Lästips {#lastips}

Kika igenom följande lästips.

1. Bekanta dig med manualsidan till [databasen SQLite](https://sqlite.org/). Det är din referensinformation, så kolla vilken dokumentation som finns att tillgå.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 18-25 studietimmar)*


###Övningar {#ovningar}

Genomför följande övningar.

1. Jobba igenom övningen "[Kom igång med databasen SQLite](kunskap/kom-igang-med-databasen-sqlite)". Spara alla filer från övningen i `me/kmom02/jetty`.

1. Läs igenom artikeln ["En kommandoradsklient för SQLite](kunskap/en-kommandoradsklient-for-sqlite)" och installera kommandoklienten på ditt eget system. Testa den så du känner att du har koll på hur den fungerar.




###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

Följande uppgifter är relaterade till databas och SQL.

1. Gör laborationen "[SQL lab, introduktion till SQL](uppgift/sql-lab-introduktion-till-sql-dbjs)" som låter dig träna på grunderna i SQL kommandon.

1. Gör uppgiften "[Skapa ER-modell av databasen Jetty](uppgift/skapa-er-modell-av-databasen-jetty)" för att träna på ER-modellering.



Följande uppgifter är relaterade till JavaScript på klientsidan.

1. Gör uppgiften "[JavaScript med funktioner](uppgift/javascript-med-funktioner-dbjs)".

2. Gör uppgiften "[Rita flaggor med JavaScript och funktioner](uppgift/gor-svenska-flaggan-med-javascript-html-och-css-dbjs)".



###Extra {#extra}

Lös följande extrauppgifter om du har tid och lust.

1. Läs igenom artikeln ["En webbaserad klient för SQLite, phpliteadmin](kunskap/en-webbaserad-klient-for-sqlite-phpliteadmin)" och installera på ditt eget system.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/dbjs/redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Har du tidigare erfarenheter av databaser, sql, modellering och/eller SQLite?
* Hur känns det att komma igång med databaser, några reflektioner?
* Känns det som du börjat komma igång med JavaScript nu?
* Hur känns det att jämföra JavaScript med andra programmeringsspråk?
