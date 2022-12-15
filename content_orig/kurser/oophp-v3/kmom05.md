---
author:
    - mos
category:
    - kurs oophp-v3
    - kurs oophp
revision:
    "2017-04-21": (A, mos) Släppt i första utgåvan.
...
Kmom05: Programmera i databasen
==================================

Kursmomenten handlar dels om att programmera en databas med transaktioner, lagrade procedurer, triggers och inbyggda funktioner.

Du får implementera en större databasmodell och skriva SQL där du använder programmeringskonstruktioner för att skriva koden i SQL.

Du får även bygga en Anax Lite backend i till en webbshop.

[FIGURE src=image/snapvt17/lagrad-procedur.png caption="Programmera i en databas med lagrade procedurer."]

[FIGURE src=image/snapvt17/triggers.png caption="Programmera i en databas med triggers."]

[FIGURE src=image/snapvt17/udf.png caption="Programmera i en databas med egendefinierade funktioner."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 0-6 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*



###Kurslitteratur  {#kurslitteratur}

Det finns inga specifika läsanvisningar till detta kursmomentet.



###Artiklar {#artiklar}

Det finns inga artiklar.



###Lästips {#lastips}

Kika gärna på följande lästips.

1. [Databasteknik](kunskap/boken-databasteknik)
    * Kap 12. Integritetsvillkor
    * Kap 14: Lagrade procedurer
    * Kap 15: Aktiva databaser och triggers
    * Kap 23: Transaktioner

Vissa av kapitlen finns i [bokens webbkurs](http://www.databasteknik.se/webbkursen/), del 2.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-18 studietimmar)*


###Övningar {#ovningar}

Gör följande övning, den förbereder dig inför uppgifterna.

1. Jobba igenom "[Transaktioner i databas](kunskap/transaktioner-i-databas)" för att lära dig grunderna i hur du använder transaktioner i databaser. Spara dina exempelprogram i `me/kmom05/progsql`.

1. Jobba igenom "[Lagrade procedurer i databas](kunskap/lagrade-procedurer-i-databas)" för att lära dig om lagrade procedurer och vad du kan göra med dem. Spara dina exempelprogram i `me/kmom05/progsql`.

1. Jobba igenom "[Triggers i databas](kunskap/triggers-i-databas)" för att lära dig om vad du kan göra med triggers och hur de fungerar. Spara dina exempelprogram i `me/kmom05/progsql`.

1. Jobba igenom "[Egendefinierade funktioner i databas](kunskap/egen-definierade-funktioner-i-databas)" för att lära dig hur konceptet kan användas i en databas. Spara dina exempelprogram i `me/kmom05/progsql`.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgift "[Skapa backend till en webbshop](uppgift/skapa-backend-till-en-webbshop)". Spara koden i ditt `me/anax-lite`.

1. Gör uppgiften "[Dokumentera PHP med phpdoc och phpDocumentor](uppgift/dokumentera-php-med-phpdoc-och-phpdocumentor)". Spara uppdateringarna du gör i ditt `me/anax-lite`.

1. Gör uppgiften "[Dokumentera din ER-modell med Reverse Engineering](uppgift/dokumentera-din-er-modell-med-reverse-engineering)". Spara resultatet i `me/kmom05/er2`. Det är samma sak som du gjorde i förra kmomentent.

1. Pusha och tagga ditt Anax Lite, allt eftersom och sätt en avslutande tagg (5.0.\*) när du är klar med alla uppgifter i kursmomentet.



###Extra {#extra}

Det finns inga extrauppgifter.

<!--

Gör följande extrauppgifter om du har tid, lust eller ambition.

1. Du kan forstätta träna grunderna i SQL via laborationen "[SQL lab, fortsättning med SQL (sql2)](uppgift/sql-lab-fortsattning-med-sql)". Labben är gjord för SQLite. Spara koden i `me/kmom05/sql2`.

--->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/oophp-v3/redovisa).

Se till att följande frågor besvaras i texten:

* Gick det bra att komma igång med det vi kallar programmering av databas, med transaktioner, lagrade procedurer, triggers, funktioner?
* Hur är din syn på att programmera på detta viset i databasen?
* Några reflektioner kring din kod för backenden till webbshopen?
* Något du vill säga om koden generellt i och kring Anax Lite?
