---
views:
    flash:
        region: flash
        template: default/image
        data:
            src: "image/snapvt17/mysql-optimize.png?c=350,100,10,11&w=1100&h=300&cf&f=grayscale"
author: mos
revision:
    "2019-03-20": "(D, mos) Övning om TIMESTAMP."
    "2019-02-25": "(C, mos) Uppdaterat inför vt19."
    "2018-12-19": "(B, mos) Uppdaterat läsanvisning utgåva 2 av kursbok."
    "2018-02-20": "(A, mos) Första utgåvan."
...
Kmom06: Prestanda
====================================

Vi fortsätter med programmering i databasen, denna gången med "funktioner" som har en liknande struktur som lagrade procedurer och triggers.

Vi studerar hur databasen jobbar internt för att optimera SQL-frågor och hur index kan användas för att optimera databasen.

Vi jobbar vidare med terminal- och webbaserade klienter mot databasen och fortsätter att implementera vår eshop.

<!--more-->

[FIGURE src=image/snapvt17/mysql-optimize.png?w=w3&a=0,50,0,0 caption="Optimering av en databas sker på många olika nivåer."]

[FIGURE src=image/snapvt17/udf.png caption="En egendefinierad funktion som kan underlätta när man gör rapporter med SQL." class="center"]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs &amp; Studera  {#lasanvisningar}
---------------------------------

*(ca: 4-10 studietimmar)*



### Föreläsningar {#flas}

Titta på följande inspelade föreläsningar.

1. [Funktioner och programmera i databasen](./../forelasning/funktioner) visar hur du kan programmera egnedefinierade funktioner i databasen och hur du kan använda dem i SELECT-satser. Funktioner kompletterar lagrade procedurer och triggers och har ett litet annat användningsområde.

1. [Index och prestanda i databasen](./../forelasning/index-och-prestanda) ger inledande en allmän diskussion av de delar som påverkar den upplevda prestandan av en databas och därefter fortsätter föreläsningen med index för att se hur de kan användas för att ge databasens frågeoptimerare optimala förutsättningar för att genomföra sitt arbete.

<!--
Föreläsning om dokumentation av databas.

# Reverse engineering

En not om DD i artikeln:
https://dbwebb.se/kunskap/kokbok-for-databasmodellering#dd

* Dokumentera befintlig databas
* Skapa mental bild av databasen
* Testa workbench

# Generera dokumentation

* DD
* Ladok
-->



### Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Databasteknik](kunskap/boken-databasteknik)
    * Kap 9: Sammanfattning av SQL-kommandon
    * Kap 22: Index och prestanda

Vissa av kapitlen finns i [bokens webbkurs](http://www.databasteknik.se/webbkursen/), del 2.

Det finns ytterligare ett kapitel i boken som är relaterat till prestanda, det går utanför kursens ram men läs vid intresse.

1. [Databasteknik](kunskap/boken-databasteknik)
    * Kap 23: Fysiska lagringsstrukturer i databaser


<!--
Saker vi inte hanterat:

* Kap 13: Säkerhet i databaser
* Normalisering
*
-->


### MySQL dokumentation {#mysqldoc}

Bekanta dig med följande:

1. I manualen för MySQL kan du läsa om optimering och i vilka olika nivåer som optimering kan utföras. Kika på nedanstående kapitel för att skaffa dig en översikt om möjligheter för optimering.
    * [Chapter 8 Optimization](https://dev.mysql.com/doc/refman/8.0/en/optimization.html)


1. Du har tidigare läst i MySQL manualen om lagrade procedurer (stored procedures), triggers och compound statements. Komplettera det med att nu läsa (i samma kapitel) om "funktioner" som skapas med CREATE FUNCTION. Läs översiktligt följande i manualen.
    * [24.1 Defining Stored Programs](https://dev.mysql.com/doc/refman/8.0/en/stored-programs-defining.html)
    * [24.2 Using Stored Routines (Procedures and Functions)](https://dev.mysql.com/doc/refman/8.0/en/stored-routines.html)



### Modellering {#model}

Läs följande.

1. Läs igenom foruminlägget om "[Vad välja som primärnyckel till en databastabell](t/6439)?", det ger en snabb orientering i hur man kan tänka när man väljer primärnyckel i en tabell (eventuellt har du redan läst om detta i kmom05).

<!--
Ta bort till 2020, artikeln är flyttad till kmom05.
-->



### Extra  {#extra}

Gör följande som ren överkurs, om du har tid, energi och lust.

1. Kika på foruminlägget "[Exempelkod Node.js, Express, MySQL och login med sessioner](t/7327)" som visar hur du löser login med sessionshantering i Express. Detta är dock inget vi kommer använda i kursen.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



### Övningar {#ovningar}

Genomför följande övning för att förbereda inför uppgifterna.

1. Läs (och jobba) igenom artikeln "[Använd TIMESTAMP för status i databastabellen](coachen/anvand-timestamp-for-status-i-databastabellen)" som visar hur du kan använda tidsstämplar för att ge olika status till rader i en databastabell. Du behöver inte spara de exempelprogram du gör.

1. Jobba igenom "[Egendefinierade funktioner i databas](kunskap/egen-definierade-funktioner-i-databas)" för att lära dig hur konceptet kan användas i en databas. Spara dina exempelprogram i `me/kmom06/func`.

1. Jobba igenom övningen "[Index och prestanda i MySQL](kunskap/index-och-prestanda-i-mysql)" som tränar dig i hur du kan optimera dina databasfrågor med index. Spara dina testprogram i `me/kmom06/index`.

<!--
1. Artikel om hur man skriver bra SQL frågor på ett optimerat sätt.

1. Inloggning, session, express.

1. Usability with messages on what happens.

1. Faktureringsmotor?

1. Exportera data från webben till csv?

1. Visualisering i tabeller via JavaScript libs.
-->



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Bygg databasen till en Eshop (del 2)](uppgift/bygg-databasen-till-en-eshop-del-2)" där du slutför implementationen av din databas. Spara all kod under `me/kmom06/eshop2`.


<!--
1. Jobba igenom följande del i guiden "[Kom igång med SQL i MySQL (Programmera i databasen)](guide/kom-igang-med-sql-i-mysql/programmera-i-databasen)". Fortsätt spara SQL-koden i filer i katalogen `me/skolan`.

1. Lös uppgiften "[Bygg kursbeställningsverktyg till skolan](uppgift/bygg-bestallningsverktyg-till-skolan)". Spara all kod i katalogen `me/kmom06/bestall`.

-->



<!--
1. Lös (minst) en av följande uppgifter (den första är troligen aningen enklare):
    * Lös uppgiften "[Bygg klienter till en Eshop med CRUD mot lagrade procedurer](uppgift/bygg-klienter-till-en-eshop-med-crud-mot-lagrade-procedurer)". Jobba vidare på föregående uppgift i `me/kmom05/eshop2`. Du skapar CRUD för tabellerna kund och produkt.

    * Lös uppgiften "[Bygg orderhantering till en Eshop](uppgift/bygg-orderhantering-till-en-eshop)". Jobba vidare på föregående uppgift i `me/kmom05/eshop2`. Du skapar CRUD för orderhantering.
-->

<!--
från kmom04, borttagen

1. Gör uppgiften "[Skapa en Eshop med två klienter](uppgift/skapa-eshop-med-tva-klienter)" som bygger vidare på din ER-modell och låter dig skapa databasen tillsammans med en terminalklient och en webbklient. Spara all kod under `me/kmom04/eshop1`. (En liknande uppgift kommer i nästa kursmoment).
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Förklara begreppet index i databas för en nybörjare, berätta varför index är viktigt. Skriv ett kort stycke (3-7 rader).
* Berätta vilka extra index du tillförde i din eshop.
* Berätta kort hur du ser på nyttan med funktioner i databasen.
* Kommentera arbetet med din eshop, är du nöjd eller finns förbättringspotential och hur tycker du svårighetsgraden har varit på uppgiften eshop som helhet?
* Berätta om någon extra sak du valde att göra i din eshop, om du gjorde något.
* Vilken är din TIL för detta kmom?
