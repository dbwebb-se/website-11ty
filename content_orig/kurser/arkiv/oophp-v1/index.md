---
author: mos
revision:
  "2013-08-13": (G, mos) Arkiverade kursen till förmån för ny uppdaterad kurs inför
    ht13, ändrade alla länkar till oophp-v1/.
  "2013-08-12": (F, mos) Ny kurskod DV1485 ersätter DV1127.
  "2012-08-29": (E, mos) Uppdaterad och genomgången inför kursstart ht12, flyttad
    från google doc till lydia.
  "2010-01-11": (D, mos) Lade till 400 tecken, uppdaterad inför våren 2010.
  "2009-10-12": (C, mos) Justering av kursmoment 06.
  "2009-09-28": (B, mos) Mindre justering av kursmoment 05.
  "2009-08-31": (A, mos) Första utgåvan.
published: "2012-08-29"
updated: "2013-08-13 10:42:11"
created: "2012-08-30 08:11:35"
...
Kursen "oophp" (version 1)
==================================

[INFO]
**ARKIVERAD KURS**

Detta är version 1 av kursen oophp. Den gavs vid BTH på campus och distans från och med höstterminen 2009 till och med vårterminen 2013. Om du påbörjade denna versionen av kursen så skall du också slutföra denna versionen av kursen. Version 2 av kursen är inte bakåtkompatibel med sina kursmoment utan har ett annat innehåll.

Senaste aktuella versionen av kursen oophp hittar du alltid på <a href='http://dbwebb.se/oophp'>http://dbwebb.se/oophp</a>.
[/INFO]

Här finns allt material till kursen "oophp", samlat under en sida, säg till om du saknar något.



Om kursen {#om}
---------------

400-tecken om kursen:

> Lär dig objektorienterad PHP-programmering och kom igång med databasen MySQL. En god grund för dig som vill komma igång med webbprogrammering och redan kan lite om HTML. Praktisk kurs med spelbaserade programmeringsövningar såsom Hänga Gubben, Spela tärning, Spela kort och Äventyrsspel. Klar fokus på programmering på ett objektorienterat sätt med stöd av databaser. Avslutas med ett projekt.

Skriptspråket PHP och databaser med SQL är grundtekniker för att tillsammans med HTML och CSS bygga databasdrivna webbapplikationer.

Kursen fokuserar på de objektorienterade delarna av skriptspråket PHP. Grundläggande programmering i PHP gås igenom och därefter är det fokus på de objektorienterade konstruktionerna. Som databas används MySQL och PHP Data Objekts används för att koppla PHP mot databasen.

Kursen är praktiskt upplagd och via övningar byggs enklare webbapplikationer med objektorienterad PHP. Mot slutet genomförs ett projekt där de olika övningarna formar en mer avancerad helhet i form av en webbapplikation. All programmering sker i en webbaserad miljö med en Unix-baserad webbserver (Apache), webbprogrammering med HTML5 och CSS3 samt en databasserver (SQL och MySQL).

Vill man utveckla professionella webbapplikationer så krävs bättre skriptprogrammering, denna kurs ger dig en bra start via förståelse för användning av objektorienterad PHP tillsammans med SQL (och HTML och CSS).


Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


###Kmom01: Intro till PHP i webbmiljö {#kmom01}

*alternativt "Hänga gubben i PHP"*

Först så kommer vi igång med PHP programmering och vi fixar till en labbmiljö och installerar de programvaror som behövs. Vi går några enkla PHP-program för att komma igång.

Vi studerar ett befintligt PHP-program, hänga gubben, och försöker förstå hur det är uppbyggt.

* Instruktionen till kursmoment 01:  
  <a href='http://dbwebb.se/oophp-v1/kmom01'>http://dbwebb.se/oophp-v1/kmom01</a>


###Kmom02/03: PHP programmeringens grunder {#kmom02}

*alternativt "Mitt eget Hangman i PHP"*

Vi bygger på våra PHP kunskaper med några av språkets grundkonstruktioner såsom felhantering, formulär, arrayer och en introduktion till att använda klasser och objekt.

Vi fortsätter med exempel-programmet "Hänga gubben" och försöker själva att återskapar programmet, steg för steg.

* Instruktionen till kursmoment 02:  
  <a href='http://dbwebb.se/oophp-v1/kmom02'>http://dbwebb.se/oophp-v1/kmom02</a>


###Kmom04: Funktioner, klasser och objekt {#kmom04}

*alternativt "Tärningsspel i PHP"*

Vi gräver lite djupare i PHP-programmeringen med funktioner, argument, klasser och objekt. Vi gör lite större programmeringsövningar där vi bla gör en tärning och ett histogram.

Vi kodar ett eget litet webbspel med vår tärning som bas. Tärning funkar både till Yatzy, kasta gris eller en variant på en enarmad bandit (slotmaskin). Låt se vad det blir.

* Instruktionen till kursmoment 04:  
  <a href='http://dbwebb.se/oophp-v1/kmom04'>http://dbwebb.se/oophp-v1/kmom04</a>


###Kmom05: Objektorienterad programmering i PHP {#kmom05}

*alternativt "Spela kort i PHP"*

Momentet är en lite friare programmeringsövning med fokus på användning av egendefinerade  klasser och objekt i PHP.

Övningen går ut på att utveckla ett antal klasser för kortspel, nämligen klasserna spelkort, kortlek och korthand. Därefter tittar vi på hur vi kan lagra PHP-objekt i sessioner. Övningen avslutas med att vi programmerar kortspelet "High card low card" i form av en klass.

* Instruktionen till kursmoment 05:  
  <a href='http://dbwebb.se/oophp-v1/kmom05'>http://dbwebb.se/oophp-v1/kmom05</a>


###Kmom06: Databaser, SQL och PHP {#kmom06}

*alternativt "Min egen kompis-sökmotor"*

En övning där databaser och SQL är tyngdpunkten. Vi använder PHPMyAdmin för att bygga upp en databas med tabeller och fält. Vi använder SQL-satser för att ställa frågor mot databasen och vi joinar information från flera tabeller. Vi testar att göra en backup av databasen och vi prövar att återskapa databasen från denna backup.

* Instruktionen till kursmoment 06:  
  <a href='http://dbwebb.se/oophp-v1/kmom06'>http://dbwebb.se/oophp-v1/kmom06</a>


###Kmom07: Äventyrsspel med PHP och databas {#kmom07}

*alternativt "En strukturerad genomgång av utveckling av ett webbprogram"*

Nu börjar det bli dax att pröva om vingarna bär. Med hjälp av databaser och objektorienterad PHP så försöker vi oss på att utveckla ett vanligt hederligt "Adventure" spel. Vi startar med att lägga grunden för spelet.

* <a href='http://en.wikipedia.org/wiki/Adventure_game'>http://en.wikipedia.org/wiki/Adventure_game</a>

* Instruktionen till kursmoment 07:  
  <a href='http://dbwebb.se/oophp-v1/kmom07'>http://dbwebb.se/oophp-v1/kmom07</a>


###Kmom08/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

* Instruktionen till kursmoment 08/10:  
  <a href='http://dbwebb.se/oophp-v1/kmom10'>http://dbwebb.se/oophp-v1/kmom10</a>



Kurslitteratur {#litteratur}
----------------------------

###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har jag valt följande böcker. Det är en god idé att läsa igenom dessa  under kursen, det finns läsanvisningar till dessa i samband med varje kursmoment.

* **Beginning PHP and MySQL: From Novice to Professional** -- Gilmore, W  
  En tjockare bok för den som vill ha en mer komplett vy över PHP och MySQL från början. Läsanvisningar finns.
  
Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-beginning-php-and-mysql-from-novice-to-professional'>http://dbwebb.se/kunskap/boken-beginning-php-and-mysql-from-novice-to-professional</a>


###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter.

* **Beginning Web Programming with HTML, XHTML and CSS** -- Duchett, Jon  
  En grundbok i HTML och CSS för de som vill lära sig från böcker istället från nätet. Börjar bli gammal men ändå ok. Läsanvisningar finns.
  
Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-beginning-web-programming-with-html-xhtml-and-css'>http://dbwebb.se/kunskap/boken-beginning-web-programming-with-html-xhtml-and-css</a>

* **Databasteknik** -- Radron-McCarthy och Risch  
  Komplett med det man vill veta om databasteknik, både grunder, modellering och SQL.
  
Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-databasteknik'>http://dbwebb.se/kunskap/boken-databasteknik</a>

* **HTML & CSS: The Complete Reference** -- T. A. Powell  
  En perfekt tegelsten om HTML och CSS, inklusive nya konstruktioner i HTML5 och CSS3 samt referenslista till element och konstruktioner.
  
Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-html-css-the-complete-reference'>http://dbwebb.se/kunskap/boken-html-css-the-complete-reference</a>

* **Webbutveckling med PHP och MySQL** -- Montathar Faraon  
  En svensk bok som ger en god intro för den som är ny i PHP och programmering. Innehåller en del PHP och en del databaser och MySQL.
  
Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-webbutveckling-med-php-och-mysql'>http://dbwebb.se/kunskap/boken-webbutveckling-med-php-och-mysql</a>


Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment. Skaffa gärna böckerna i förväg och börja läsa dem innan kursen.

| Kursmoment | Beginning PHP and MySQL   | Beginning Web Programming | Databasteknik   |
|------------|---------------------------|---------------------------|-----------------|
| Kmom01     | Ch 1, 2, 3                | Ch 1, 2, 3                |                 |
| Kmom02/03  | Ch 5, 8, 9, 13            | Ch 5                      |                 |
| Kmom04     | Ch 4, 6                   |                           |                 |
| Kmom05     | Ch 7, 18                  |                           |                 |
| Kmom06     | Ch 25, 27, 28, 30, 34, 35 |                           | Ch 1, 7, 8, 9, 18, 28 |
| Kmom07     |                           | Ch 7                      |                 |
| Kmom08/10  ||||


Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

För dig som studerar på distans finns det en rekommenderad studieplan.

* Rekommenderad studieplan (se flikar fram tom vårterminen 2013):
  <a href='http://dbwebb.se/oophp/studieplan'>http://dbwebb.se/oophp/studieplan</a>

För dig som går på campus så får du en lektionsplan i samband med kursstart.

Det finns ett särskilt dokument som beskriver planeringen av kurserna och viktiga datum.

* Lektionsplan och rekommenderad studieplan:  
  <a href='http://dbwebb.se/kurser/lektionsplan-och-rekommenderad-studieplan'>http://dbwebb.se/kurser/lektionsplan-och-rekommenderad-studieplan</a>


Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver hur bedömning och betygsättning sker. 

* Bedömning och betygsättning:  
  <a href='http://dbwebb.se/kurser/bedomning-och-betygsattning'>http://dbwebb.se/kurser/bedomning-och-betygsattning</a>


Lärarstöd och handledning {#handledning}
----------------------------------------

I distanskurserna är forum och chat de viktigaste källorna för handledning. Vi har samlat information om handledning och hjälp till självhjälp i ett dokument.

* Handledning och självhjälp  
  <a href='http://dbwebb.se/kurser/lararstod-och-handledning'>http://dbwebb.se/kurser/lararstod-och-handledning</a>


Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chat eller mail.

* Kursutvärdering och kursutveckling:  
  <a href='http://dbwebb.se/kurser/kursutvardering-och-kursutveckling'>http://dbwebb.se/kurser/kursutvardering-och-kursutveckling</a>


Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Du hittar [kursplanen genom att söka på kurskoden DV1485 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1485).

Fram till och med vårterminen 2013 hade kursen kurskoden [DV1127](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1127).
