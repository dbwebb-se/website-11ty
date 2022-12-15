---
title: oophp

author: mos
revision:
    "2016-12-16": (N, mos) Notis om att kursen upphör och ny version utvecklas.
    "2015-03-02": (M, mos) Uppdatering av referenslitteraturen, la till mål och förkunskapskrav.
    "2015-01-09": (L, mos) Länk till studieplan.
    "2013-10-22": (K, mos) Uppdaterad i samband med att php version 2 är klar.
    "2013-10-15": (J, mos) Uppdaterad med kmom06 klart.
    "2013-09-30": (I, mos) Uppdaterad med kmom05 klart.
    "2013-08-14": (H, mos) Släppt med kmom02 klart.
    "2013-08-13": (G, mos) V2. Uppdaterad till version 2 av kursen. Nya kursmoment och större genomarbetning, för-release som innehåller kmom01.
    "2013-08-12": (F, mos) Ny kurskod DV1485 ersätter DV1127.
    "2012-08-29": (E, mos) Uppdaterad och genomgången inför kursstart ht12, flyttad från google doc till lydia.
    "2010-01-11": (D, mos) Lade till 400 tecken, uppdaterad inför våren 2010.
    "2009-10-12": (C, mos) Justering av kursmoment 06.
    "2009-09-28": (B, mos) Mindre justering av kursmoment 05.
    "2009-08-31": (A, mos) Första utgåvan.
...
Kursen oophp (v2)
==================================

Kursen **Databaser och objektorienterad programmering i PHP**, a.k.a. *oophp*, fokuserar på objektorienterad programmering med PHP tillsammans med databasen MySQL.

<!--more-->

[WARNING]
**Kursen arkiverad.**

Sista kurstillfället på denna versionen av kursen, oophp-v2, gavs vårterminen 2016.

Kursen är öppen för restexamination fram till och med vårterminen 2018.

Kursen ersätts med en vidarutvecklad version, [oophp-v3](kurser/oophp-v3), från och med vårterminen 2017.
[/WARNING]

Kursen hanterar objektorienterade programmeringstekniker i PHP med fokus mot webbprogrammering och webbutveckling av webbapplikationer och webbplatser.

Grundläggande programmering i PHP gås igenom och därefter fokuseras på de objektorienterade konstruktionerna. Som databas används MySQL och PHP Data Objects används för att koppla PHP mot databasen.

Skriptspråket PHP och databaser med SQL är grundtekniker för att tillsammans med HTML och CSS bygga databasdrivna webbapplikationer.

Kursen är praktiskt upplagd och via övningar byggs webbapplikationer med objektorienterad PHP. Mot slutet genomförs ett projekt där de olika övningarna formar en mer avancerad helhet i form av en webbapplikation. All programmering sker i en webbaserad miljö med en Unix-baserad webbserver (Apache), webbutveckling med HTML5 och CSS3 samt en databasserver (SQL och MySQL).

Vill man utveckla professionella webbapplikationer så krävs en riktigt god förståelse för programmering och databaskopplingar på server-sidan. Denna kurs ger dig en bra start via förståelse för användning av objektorienterad PHP tillsammans med SQL (och HTML och CSS).


[INFO]
**Tidigare version av kursen**

Om du gick kursen tidigare, fram till och med vårterminen 2013, så finns kursmaterialet till [den kursen här](kurser/oophp-v1). Om du påbörjat den äldre version av kursen så skall du också slutföra denna versionen av kursen (eller göra om den nya kursen från start).

Länken till den tidigare versionen av kursen oophp är alltså:

* oophp-v1/ 

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



###Kmom01: Kom igång med programmering i PHP {#kmom01}

Kom igång med PHP som ett programmeringsspråk och skaffa dig en grund att stå på i form av utvecklingsmiljö, manualer och testmiljö. Du får en introduktion av de viktigaste icke-objektorienterade konstruktionerna i PHP. Du behöver den basen innan vi kan gå vidare med de objektorienterade konstruktionerna. Om du redan kan den så blir det ett ypperligt tillfälle för repetition. 

Du får också en genomgång i hur du kan bygga en strukturerad webbplats med en tanke och en plan bakom katalogstrukturen. Detta är något som är bra att ha med sig. Även om vårt huvudfokus är objektorienterad PHP-programmering och databaser så är vi i en webbmiljö och allt som krävs för att den miljön skall fungera måste ha sin plats. Det handlar om HTML-kod, stylesheets och CSS och det som gör en färdig webbplats. En struktur att hålla sig i gör att vi kan fokusera mer på programmeringen.

Läs [instruktionen till kursmoment 01](kurser/oophp-v2/kmom01).



###Kmom02: Objektorienterad programmering i PHP {#kmom02}

Objektorienterad programmering är en av de mer kända programmeringssätten, det är helt enkelt ett sätt att tänka, modellera och strukturera dina program. I detta kursmoment blir du introducerad till objektorienterad programmering i PHP. Du får se hur man skapar klasser, skyddar synlighet på medlemsvariabler och metoder och hur arv går till. Om du redan kan ett annat objektorienterat programmeringsspråk så kommer du att känna igen samma konstruktioner i PHP. Om du är ny så får du steg för steg gå igenom grunderna i objektorientering och det finns flera övningsprogram som du skall skriva för att komma igång.

Läs [instruktionen till kursmoment 02](kurser/oophp-v2/kmom02).



###Kmom03: SQL och databasen MySQL {#kmom03}

Så, nu har vi koll på PHP och grunderna i objektorienterad PHP, då går vi vidare till databasen MySQL och dess olika klienter samt en introduktion i frågespråket SQL. Du får jobba igenom en övning i SQL som tar dig från de enklare konstruktionerna till svårare saker som subqueries och `RIGHT/LEFT OUTER JOIN`. Innan den övningen så har du bekantat dig med MySQL, både i din egna utvecklingsmiljö och i BTH's labbmiljö.

Läs [instruktionen till kursmoment 03](kurser/oophp-v2/kmom03).



###Kmom04: PHP PDO och MySQL {#kmom04}

Så här långt har du lärt dig om objektorienterad PHP och databasen MySQL. Nu skall du koppla ihop dessa till en databasdriven webbapplikation genom att använda PHP's gränssnitt för databaser PHP PDO. Du får jobba igenom en guide där du bygger upp en filmdatabas med ett webbgränssnitt där du kan redigera information om filmer och söka ut dem. När du jobbar i guiden så kommer du att stöta på och lösa de vanliga problemen som en sådan applikation innebär. När du är klar så har du ett fungerande exempel som du kan använda som bas för kommande webbapplikationer. Om du tittar noga så kan du se likheten mellan till exempel en webbshop och din filmdatabas, rent tekniskt är det samma grunder i båda.

Läs [instruktionen till kursmoment 04](kurser/oophp-v2/kmom04).


###Kmom05: Lagra innehåll i databasen {#kmom05}

Att lagra innehåll i databasen för att sedan kunna visa upp det i webbplatsen är en kärnfunktionalitet i de flesta webbplatser. Nu har vi både en mall för webbplatser och koll på databaser och objektorienterad programmering. låt oss då försöka använda allt detta för att lagra undan innehåll i databasen och sedan visa upp det som webbsidor och bloggposter i webbplatsen.

Läs [instruktionen till kursmoment 05](kurser/oophp-v2/kmom05).


###Kmom06: Bildbearbetning och galleri {#kmom06}

Här handlar det om flexibel hantering av bilder och att låta PHP vara behjälpligt att beskära och processa bilder på serversidan. Du får jobba med det inbyggda grafik-biblioteket PHP GD och med hjälp av det bygger du upp ett skript `img.php` som ger dig en flexibel hantering av bilder.

Därefter tar du hjälp av ditt skript `img.php` och använder det för att skapa ett enkelt galleri som visar bilderna som ligger i en katalogstruktur.

Läs [instruktionen till kursmoment 06](kurser/oophp-v2/kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

Läs [instruktionen till kursmoment 07/10](kurser/oophp-v2/kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?


###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har jag valt följande böcker. Det är en god idé att läsa igenom dessa  under kursen, det finns läsanvisningar till dessa i samband med varje kursmoment.

* **[Beginning PHP and MySQL: From Novice to Professional](kunskap/boken-beginning-php-and-mysql-from-novice-to-professional)** -- Gilmore, W  
  En tjockare bok för den som vill ha en mer komplett vy över PHP och MySQL från början. Läsanvisningar finns.
  


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



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

För dig som studerar på distans finns det en [rekommenderad studieplan](kurser/oophp/studieplan). Du kan behöva anpassa den rekommenderade planen till dina egna datum och förutsättningar. 

Läser du kursen som en del i ett kurspaket så finns det en [studieplan som är kopplad till kurspaketet](webprog#studieplan).

Går på campus så får du en lektionsplan i samband med kursstart.

Det finns ett särskilt dokument som ger lite [utförligare beskrivning av planeringen av kursen och viktiga hållpunkter](kurser/lektionsplan-och-rekommenderad-studieplan).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning). 



Lärarstöd och handledning {#handledning}
----------------------------------------

I distanskurserna är forum och chatt de viktigaste källorna för handledning. Vi har samlat information om handledning och hjälp-till-självhjälp i ett eget dokument.

Läs om hur [handledning och hjälp-till-självhjälp fungerar på dessa kurser](kurser/lararstod-och-handledning).  



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [jag jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).




Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Du hittar [kursplanen genom att söka på kurskoden DV1485 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1485).

Fram till och med vårterminen 2013 hade kursen kurskoden [DV1127](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1127).
