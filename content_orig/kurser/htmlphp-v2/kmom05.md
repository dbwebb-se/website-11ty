---
author:
    - mos
revision:
    "2017-06-15": (F, mos) Uppdaterad labbserie.
    "2017-02-14": (E, mos) Kommenterade bort sql1 temporärt.
    "2016-09-26": (D, mos) La till extrauppgift sql1.
    "2016-08-31": (C, mos) Lade till rätt videoserie från youtube.
    "2016-02-22": (B, mos) Bort med not om kursutveckling och länk till version 1.
    "2015-08-26": (A, mos) Första utgåvan för htmlphp version 2 av kursen.
...
Kmom05: SQL och SQLite
==================================

Låt oss börja med databaser. Jag har valt att introducera databasen SQLite som är en filbaserad databas. En filbaserad databas förenklar hanteringen eftersom databasen ligger i en enda fil och det finns inga användare eller behörigheter att konfigurera.

Till databasen SQLite behövs klientprogram som kan användas för att prata med databasen. Vi prövar olika klienter, en variant för desktop, en som är webbaserad och en terminalbaserad.

I en databas, en relationsdatabas som SQLite, så pratar vi SQL med databasen. Vi skriver SQL uttryck för att skapa tabeller och för att lägga till, uppdatera, visa och radera data från databasen.

<!--more-->

[FIGURE src=/image/sqlite20/create-table.png?w=w2 caption="En databas har tabeller med kolumner och rader."]

När vi väl bekantat oss med SQLite, dess klienter och SQL så tar vi ett första steg in i att koppla ihop PHP-kod med databasen.

[FIGURE src=/image/snapvt15/pdo-select-table.png?w=w2 caption="En databas har tabeller med kolumner och rader."]

Vi avslutar med en programmeringsövning där du bygger en söksida som jobbar mot en SQLite databas.

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [HTML och CSS-boken](kunskap/boken-html-och-css-boken)
    * Repetera kapitel 9 om formulär.

2. [Webbutveckling med PHP och MySQL](kunskap/boken-webbutveckling-med-php-och-mysql)
    * Kap 8 Databaser. Kapitlet handlar om databasen MySQL men är ändå relevant och ger en god introduktion till databaser och SQL.



###Artiklar {#artiklar}

Läs följande:

Det finns inga artiklar.



###Video  {#video}

Titta på följande:

1. Videoserien [Lär dig PHP](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_U0j3HFq9pTVWvr-YQvy0B) är tätt kopplat till kursmaterialet. Kika på de videor som börjar med 5.



###Lästips {#lastips}

Följande lästips hjälper dig att hitta relevant information.

Det finns inga extra lästips.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*



###Övningar {#ovningar}

Genomför följande övningar.

1. Jobba igenom övningen "[Kom igång med databasen SQLite](kunskap/kom-igang-med-databasen-sqlite)". 

1. Läs igenom artikeln ["En kommandoradsklient för SQLite](kunskap/en-kommandoradsklient-for-sqlite)" och installera kommandoklienten på ditt eget system. Testa den så du känner att du har koll på hur den fungerar.

1. Jobba igenom första delen av artikeln "[Kom igång med SQLite och PHP PDO](kunskap/kom-igang-med-sqlite-och-php-pdo)". Gör till och med stycket "[Gör ett sökformulär med SELECT](kunskap/kom-igang-med-sqlite-och-php-pdo#select-form)".

1. Läs igenom artikeln ["En webbaserad klient för SQLite, phpliteadmin](kunskap/en-webbaserad-klient-for-sqlite-phpliteadmin)" och installera på ditt eget system. Testa den så du känner att du har koll på hur den fungerar.



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[PHP lab 5: utforska inbyggda funktioner](uppgift/php-lab5-utforska-inbyggda-funktioner)". Spara filerna i katalogen `me/kmom05/lab5`.

1. Gör uppgiften "[Gör en multisida för att söka i en databas](uppgift/bygg-en-multisida-for-att-soka-i-en-databas)". Spara filerna under `me/kmom05/jetty`.

1. Gör uppgiften "[Bygg ut din htmlphp me-sida till version 5](uppgift/htmlphp-projekt-5)". Spara filerna i katalogen `me/kmom05/me5`.



###Extra {#extra}

Det finns inga extrauppgifter.

<!--
Genomför följande extrauppgifter om du har tid och lust.

1. Gör laborationen "[SQL lab 1, introduktion till SQL](uppgift/sql-lab-1-introduktion-till-sql)" som låter dig träna på SQL kommandon.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Var detta din första bekantskap med databaser och SQL, eller har du tidigare kunskaper?
* Var det lätt att förstå SQL eller kändes det som en helt ny teknik?
* Hur gick det att utföra övningarna med enbart SQLite, var det något du fastnade på?
* Hur gick det med övningarna i PDO och SQLite, var det något som tog extra mycket tid?
* Gjorde du någon av extrauppgifterna? Berätta om det arbetet i så fall.
