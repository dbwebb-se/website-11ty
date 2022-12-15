---
title: oophp-v3

author:
    - mos
revision:
    "2017-03-24": "(A, mos) Info om kmom01-04, [äldre versioner finns](kurser/oophp-v2)."
...
Kursen oophp (v3)
==================================

Kursen **Objektorienterade webbteknologier**, a.k.a. *oophp*, fokuserar på objektorienterad programmering med PHP tillsammans med databasen MySQL.

<!--more-->

[WARNING]
**Kursen arkiverad.**

Sista kurstillfället på denna versionen av kursen, oophp-v3, gavs vårterminen 2017.

Kursen är öppen för restexamination fram till och med vårterminen 2019.

Kursen ersätts med en vidarutvecklad version, [oophp-v4](kurser/oophp-v4), från och med vårterminen 2018.
[/WARNING]

Kursen hanterar objektorienterade programmeringstekniker i PHP med fokus mot webbprogrammering och webbutveckling av webbapplikationer och webbplatser.

Grundläggande programmering i PHP gås igenom och därefter fokuseras på de objektorienterade konstruktionerna. Som databas används MySQL och PHP Data Objects används för att koppla PHP mot databasen.

Skriptspråket PHP och databaser med SQL är grundtekniker för att tillsammans med HTML och CSS bygga databasdrivna webbapplikationer.

Kursen är praktiskt upplagd och via övningar byggs webbapplikationer med objektorienterad PHP. Mot slutet genomförs ett projekt där de olika övningarna formar en mer avancerad helhet i form av en webbapplikation. All programmering sker i en webbaserad miljö med en Unix-baserad webbserver (Apache), webbutveckling med HTML5 och CSS3 samt en databasserver (SQL och MySQL).

Vill man utveckla professionella webbapplikationer så krävs en riktigt god förståelse för programmering och databaskopplingar på server-sidan. Denna kurs ger dig en bra start via förståelse för användning av objektorienterad PHP tillsammans med SQL (och HTML och CSS).


[INFO]
**Tidigare version av kursen**

Om du gick kursen tidigare, fram till och med vårterminen 2013, så finns kursmaterialet i [oophp version 1](kurser/oophp-v1).

Om du gick kursen tidigare, fram i och med vårterminen 2016, så finns kursmaterialet i [oophp version 2](kurser/oophp-v2).

Om du påbörjat en äldre version av kursen så skall du också slutföra denna versionen av kursen (eller göra om den nya kursen från start).

[/INFO]



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> Avklarad kurs i “Databaser, HTML, CSS och skriptbaserad PHP-programmering” eller avklarade kurser inom webbutveckling och webbprogrammering motsvarande 15hp.



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* PHP-programmering i webbmiljö, syntax, semantik, koppling mot databaser, funktionsorienterad programmering, datastrukturer, algoritmer och inbyggda funktioner.

* Objektorienterad PHP-programmering med språkkonstruktioner och begrepp. Objektorientering som sätt att strukturera och återanvända kod. Enkla designmönster. 

* SQL och databasen MySQL tillsammans med PHP Data Objects. 

* Webbapplikationer, utveckling av webbapplikationer där tekniker såsom webbserver (Apache), PHP, HTML, CSS, och SQL integreras. 

* Användning av verktyg och tekniker som lämpar sig för utveckling av webbapplikationer, tex UNIX/Linux, installation på extern webbserver, ssh, ftp/sftp, databasklienter såsom PHPMyAdmin, MySQL Workbench och kommandoklienter.



Mål {#mal}
------------------------



###Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* kunna redogöra för utveckling med objektorienterad PHP-programmering och databaser i webbmiljö, genom att skriftligen beskriva och sammanfatta erfarenheter och observationer från övningar och projekt.



###Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* kunna tillämpa de objektorienterade programmeringsparadigmen genom praktiska övningar och projekt.
* självständigt, utefter en specifikation, kunna utveckla och driftsätta en webbapplikation där
objektorienterad PHP-programmering och databaser har en central roll.
* kunna hantera de verktyg och miljöer som används vid utveckling av databasdrivna webbapplikationer.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20 studietimmar studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida som är din webbplats som innehåller allt du gör under kursen.



###Kmom01: Objektorientering i PHP {#kmom01}

Kom igång med klasser i PHP och lär dig samtidigt hur grundstrukturen i ett PHP-ramverk kan se ut. Du bygger en me-sida i ditt egenskapade ramverk och du tränar på att bygga klasser och kod både i och utanför strukturen av ramverket.

Som ett sidoprojekt kommer vi igång med MySQL/MariaDB som databas och lär känna dess klienter och grunderna i SQL.

Läs [instruktionen till kursmoment 01](kurser/oophp-v3/kmom01).



###Kmom02: OO-programmering i PHP {#kmom02}

Vi fortsätter träna på programmering med klasser och objekt, i och utanför ramverket. Det blir en närmare bekantskap med ramverkets delar och hur du kan tänka när du integrerar din egen kod i ramverket. Du bekantar dig med begrepp som interface och traits.

Kursmomentet har fokus på ett par friare programmeringsövningar så du kan träna på objektorienterade konstruktioner och ramverksprogrammering.

Läs [instruktionen till kursmoment 02](kurser/oophp-v3/kmom02).



###Kmom03: PHP PDO och MySQL {#kmom03}

Detta kursmoment fokuserar på PHP PDO och databasen MySQL. Du får en inledande artikel som visar hur det fungerar och därefter får du på egen hand koda motsvarande funktionalitet in i ramverket Anax lite.

Det blir fokus på hur man löser inloggning, konton och administration av dessa. Det blir en hel del formulär, routes och kopplingar mot databasen. Vill man förenkla så handlar det om att lösa CRUD (Create, Read, Update, Read) för en webbapplikation mot en databas.

Läs [instruktionen till kursmoment 03](kurser/oophp-v3/kmom03).



###Kmom04: Lagra innehåll i databasen {#kmom04}

Att lagra innehåll i databasen för att sedan kunna visa upp det i webbplatsen är en kärnfunktionalitet i många webbplatser. Så här långt har vi en fungerande webbplats om använder sig av databas och objektorienterad programmering. Vi fortsätter att använda de teknikerna för att bygga grunden i en databasdriven webbplats där innehåll lagras i databasen och kan redigeras av användaren (CRUD). Vi skall sedan visa upp innehållet som vanliga sidor i webbplatsen samt en blogg.

Läs [instruktionen till kursmoment 04](kurser/oophp-v3/kmom04).


###Kmom05: Programmera i databasen {#kmom05}

Kursmomenten handlar dels om att programmera en databas med transaktioner, lagrade procedurer, triggers och inbyggda funktioner.

Du får implementera en större databasmodell och skriva SQL där du använder programmeringskonstruktioner för att skriva koden i SQL.

Du får även bygga en backend till en webbshop.

Läs [instruktionen till kursmoment 05](kurser/oophp-v3/kmom05).


###Kmom06: Enhetstestning {#kmom06}

Nu börjar vi närma oss slutet och vi finpolerar vårt Anax Lite genom att komplettera med enhetstester och vi förbättrar databasens prestanda med index.

När det gäller enhetstestning så jobbar vi med PHpUnit och vi försöker hitta klasser som är testbara och vi ser hur bra vi lyckas uppnå kodtäckning.

Läs [instruktionen till kursmoment 06](kurser/oophp-v3/kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

Läs [instruktionen till kursmoment 07/10](kurser/oophp-v3/kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?


###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har jag valt följande böcker. Det är en god idé att läsa igenom dessa  under kursen, det finns läsanvisningar till dessa i samband med varje kursmoment.

* **[Beginning PHP and MySQL: From Novice to Professional](kunskap/boken-beginning-php-and-mysql-from-novice-to-professional)** -- Gilmore, W  
  En tjockare bok för den som vill ha en mer komplett vy över PHP och MySQL från början.



###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter. Välj och vraka och ta ett eget beslut om de böcker du vill använda.


* **[Webbutveckling med PHP och MySQL](kunskap/boken-webbutveckling-med-php-och-mysql)** -- Montathar Faraon  
  En svensk bok som ger en god intro för den som är ny i PHP och programmering. Innehåller en del PHP och en del databaser och MySQL. Det är ingen objektorienterad PHP. Boken passar för den som behöver ett stöd i att lära grunderna i PHP eller hellre köper denna boken än boken i Databasteknik.

* **[Databasteknik](kunskap/boken-databasteknik)** -- Radron-McCarthy och Risch  
  Komplett med det man vill veta om databasteknik, både grunder, modellering och SQL. En databasbok helt enkelt. 

* **[HTML och CSS-boken](kunskap/boken-html-och-css-boken)** -- Rolf Staflin  
  En stabil bok för att komma igång med HTML och CSS.



Läsanvisningar {#lasanvisning}
------------------------------

Det finns inga specifika läsanvisningar till kurslitteraturen.

<!--
Här följer en sammanställning av de läsanvisningar som ges i varje kursmoment. Skaffa gärna böckerna i förväg och börja läsa dem innan kursen.

| Kursmoment | Beginning PHP and MySQL   | Webbutveckling med PHP och MySQL | Databasteknik       |
|------------|---------------------------|----------------------------------|---------------------|
| Kmom01     | Ch 1, 2, 3, 4, 5          | Kap 1, 2, 3, 4, 5, 6, 7          | Kap 1               |
| Kmom02     | Ch 6, 7, 8, 12            |                                  |                     |
| Kmom03     | Ch 25, 26, 27             | Kap 8 Databaser                  | Kap 7, 8, 9, 28     |
| Kmom04     | Ch 30, 31                 |                                  | Kap 18              |
| Kmom05     |                           |                                  |                     |
| Kmom06     |                           |                                  |                     |
| Kmom07/10  ||||

-->



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

Läser du kursen inom ramen för programmet Webbprogrammering (campus/distans) så finns det en [rekommenderad studieplan inom programmet](program/webbprogrammering/studieplan/termin2).

Läser du kursen som en del i ett kurspaket så finns det en [studieplan som är kopplad till kurspaketet](webprog#studieplan).

<!--
För dig som studerar kursen som enskild kurs finns det en [rekommenderad studieplan](linux/studieplan) kopplad till de kurstillfällen som erbjuds.
-->

Vissa av kurstillfällena har även en lektionsplan som du får i samband med kursstart. Lektionsplanen visar de tillfällena som är schemalagda träffar.

Finns det en lektionsplan så finns ofta bokningar av salar gjorda i bokningsschemat.

Studieplan, eventuell lektionsplan och eventuellt schema finns tillgängligt via kurstillfället på ITs.

Läs mer om den [rekommenderade studieplanen](kurser/faq/rekommenderad-studieplan) och [lektionsplanen](kurser/faq/lektionsplan-och-schema).



Lärarstöd och handledning {#handledning}
----------------------------------------

Schemalagda labbtillfällen, hangouts samt forum och chatt de viktigaste källorna för handledning. Läs om [handledning och hjälp-till-självhjälp](kurser/faq/lararstod-och-handledning).



Ladok {#ladok}
------------------------

Enligt kursplanen finns ett antal ladokmoment och de är kopplade till kursens kursmoment enligt följande.

| Kursens moment  | Ladok moment enligt kursplan  |
|-----------------|-------------------------------|
| Kmom01 + kmom02 | Inlämningsuppgift 1 á 2.5hp   |
| Kmom03 + kmom04 | Inlämningsuppgift 2 á 2.5hp   |
| Kmom07 - kmom10 | Inlämningsuppgift 3 á 2.5hp   |

Totalt omfattar kursen 10hp.

Läs mer om [rapportering av resultat](kurser/faq/resultatrapportering).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning). 



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [jag jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).




Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Kursen heter numer "Objektorienterade webbteknologier".

Du hittar [kursplanen genom att söka på kurskoden PA1440 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1440).

Tidigare hette kursen "Databaser och objektorienterad programmering i PHP".

Fram till och med höstterminen 2016 hade kursen kurskoden [DV1485](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1485).

Fram till och med vårterminen 2013 hade kursen kurskoden [DV1127](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1127).
