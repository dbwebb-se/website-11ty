---
title: oophp (v4)
author:
    - mos
revision:
    "2018-09-20": "(D, mos) Justerat syfte, innehåll, mål, förkunskaper inför ny kurskod."
    "2018-06-18": "(C, mos) Uppdatering av grundstruktur inför ht18."
    "2018-06-01": "(B, mos) Genomgången inför oophp v4."
    "2017-03-24": "(A, mos) Info om kmom01-04, [äldre versioner finns](kurser/oophp-v2)."
...
Kursen oophp (v4)
==================================

Kursen **Objektorienterade webbteknologier**, a.k.a. *oophp*, fokuserar på objektorienterade programmeringstekniker i programmeringsspråket PHP. Klassiska objektorienterade konstruktioner hanteras tillsammans med objektorienterad programmering i webbaserat ramverk tillsammans med databaser samt enhetstestning. 

<!--more-->

<!--
Grundläggande programmering i PHP gås igenom och därefter fokuseras på de objektorienterade konstruktionerna. Som databas används MySQL och PHP Data Objects används för att koppla PHP mot databasen.

Skriptspråket PHP och databaser med SQL är grundtekniker för att tillsammans med HTML och CSS bygga databasdrivna webbapplikationer.

Kursen är praktiskt upplagd och via övningar byggs webbapplikationer med objektorienterad PHP. Mot slutet genomförs ett projekt där de olika övningarna formar en mer avancerad helhet i form av en webbapplikation. All programmering sker i en webbaserad miljö med en Unix-baserad webbserver (Apache), webbutveckling med HTML5 och CSS3 samt en databasserver (SQL och MySQL).

Vill man utveckla professionella webbapplikationer så krävs en riktigt god förståelse för programmering och databaskopplingar på server-sidan. Denna kurs ger dig en bra start via förståelse för användning av objektorienterad PHP tillsammans med SQL (och HTML och CSS).
-->



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> Genomgångna kurser motsvarande 15hp programmering och/eller webbteknologier.



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* Programmering i webbmiljö, syntax, semantik, koppling mot databaser, datastrukturer och inbyggda funktioner.

* Objektorienterad programmering i PHP med språkkonstruktioner och begrepp. Objektorientering som sätt att strukturera och återanvända kod. Enkla designmönster. 

* SQL med en databas tillsammans med PHP Data Objects. 

* Utveckling av webbapplikationer i ett ramverk där tekniker såsom webbserver (Apache), PHP, HTML, CSS, och SQL integreras tillsammans med ett webbaserat ramverk. 

* Användning av verktyg och tekniker som lämpar sig för utveckling av webbapplikationer, tex UNIX/Linux, installation på extern webbserver, ssh, ftp/sftp, databasklienter såsom PHPMyAdmin, MySQL Workbench och kommandoklienter.



Mål {#mal}
------------------------

Följande är kursens mål, indelat i undergrupper.



### Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* kunna redogöra för utveckling med objektorienterad programmering och databaser i webbmiljö, genom att skriftligen beskriva och sammanfatta erfarenheter och observationer från övningar och projekt.



### Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* kunna tillämpa de objektorienterade programmeringsparadigmen genom praktiska övningar och projekt.
* självständigt, utefter en specifikation, kunna utveckla och driftsätta en webbapplikation där objektorienterad programmering i ramverk tillsammans med databaser har en central roll.
* kunna hantera de verktyg och miljöer som används vid utveckling av databasdrivna webbapplikationer i ett ramverk för webbutveckling.



### Värderingsförmåga och förhållningssätt {#vardera}

Efter genomförd kurs skall studenten:

* översiktligt förstå, kunna förklara samt argumentera kring objektorienterad programmering i ett webbaserat ramverk.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.

Kursen avslutas med ett större avslutande moment som examinerar kursen.



###Kmom01: Objektorientering i PHP {#kmom01}

Vi startar med grunderna i objektorienterad PHP, det blir objekt och klasser med inkapsling, konstruktorer och destruktorer, setters och getters, egenskapade exceptions och vi ser hur man kan lagra ett objekt i sessionen.

Vi bygger en me-sida med ramverket Anax och vi programmerar spelet "Gissa vilket tal jag tänker på" med klasser och klienter via GET, POST och SESSION.

Läs [instruktionen till kursmoment 01](./kmom01).



###Kmom02: OO-programmering i PHP {#kmom02}

Vi fortsätter träna på programmering med klasser och objekt. Vi jobbar igenom fler grundkonstruktioner i objektorientering och ser hur de implementeras i PHP. Vi tittar på arv och komposition för att se hur klasser kan samverka och bygga på varandra. Vi använder namespace för att strukturera koden och vi använder en autoloader enligt PSR-4. 

Vi ser hur ett klassdiagram kan ritas i UML, för att skissa på relationerna mellan klasserna. Vi ser också hur man kan bygga upp automatisk dokumentation från koden och där ta hjälp av docblock-kommentarer.

Vi börjar koda inuti ramverket och använder oss av routes, vyer och placerar klasserna inuti ramverket med givna namespaces och använder oss av ramverkets autoloader.

Läs [instruktionen till kursmoment 02](./kmom02).



###Kmom03: Enhetstestning {#kmom03}

Vi jobbar vidare med klasser och objekt och denna gången tittar vi på hur klasser kan enhetstestas med verktyget PHPUnit. PHPUnit är ett av de verktyg som vanligen används inom PHP för att utföra enhetstestning av koden.

Vi har tidigare pratat om begreppet inkapsling och att klasserna skall erbjuda ett publikt API, ett gränssnitt för användaren av klassen. Samtidigt vill vi skydda den interna implementationen inuti klassen. Vi vill låta användaren av vår klass ha ett tydligt gränssnitt, men inuti klassen vill vi själva bestämma hur vi implementerar klassens detaljer, utan att påverka det publika gränssnittet.

Samma begrepp använder vi i enhetstestning, vi ser varje klass som en enhet som skall testas och vi testar klassen via dess publika gränssnitt vilket är de metoder vi når som användare av klassen. Vi är medvetna om hur klassen är uppbyggd, vi kallar det _white box testing_ då vi har tillgång till klassens källkod när vi skriver testfallen. Målet är att testa alla varianter av användning mot klassen, även felfall.

Läs [instruktionen till kursmoment 03](./kmom03).



###Kmom04: Trait och Interface {#kmom04}

Vi fortsätter med kodande och testande utanför och inuti ramverket. Fokus är tre saker, trait och interface, mer enhetstestning samt integrera koden ytterligare med ramverket genom att använda ramverkets klasser i störra omfattning.

Trait och interface är två objektorienterade konstruktioner som kan användas för att strukturera sin kod tillsammans med arv och komposition. Det ger oss två nya verktyg för att tänka och implementera koden på ett objektorienterat sätt.

Läs [instruktionen till kursmoment 04](./kmom04).



###Kmom05: PHP PDO och MySQL {#kmom05}

Detta kursmoment fokuserar på PHP PDO och databasen MySQL. Du får en inledande artikel som visar hur det fungerar i ett sammanhang och därefter får du på egen hand koda motsvarande funktionalitet in i din redovisa sida och in i ramverkets struktur.

Du får en utmaning som innebär att tänka igenom koden som serveras i övningen och hur den kan struktureras när den skall in i ramverket. Går det att göra objekt av allt eller har funktioner fortfarande en plats i kodstrukturen? Du väljer väg. Det blir en övning i refactoring.

Vill man förenkla så handlar det om att lösa CRUD (Create, Read, Update, Read) för en webbapplikation mot en databas, närmare specifikt en filmdatabas.

Läs [instruktionen till kursmoment 05](./kmom05).


###Kmom06: Lagra innehåll i databasen {#kmom06}

Att lagra innehåll i databasen för att sedan kunna visa upp det i webbplatsen är en kärnfunktionalitet i många webbplatser. Så här långt har vi en fungerande webbplats om använder sig av databas och objektorienterad programmering. Vi fortsätter att använda de teknikerna för att bygga grunden i en databasdriven webbplats där innehåll lagras i databasen och kan redigeras (CRUD) av användaren. Vi skall sedan visa upp innehållet som vanliga sidor i webbplatsen samt en blogg.

Det vi bygger är egentligen grunden i ett enkelt Content Mangement System (CMS) där användaren kan redigera webbplatsens innehåll via ett webbaserat gränssnitt.

Läs [instruktionen till kursmoment 06](./kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

Läs [instruktionen till kursmoment 07/10](./kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?



###Kurslitteratur {#kurslitteratur}

Det finns ingen speciell kursbok utan det är ersatt med läsanvisningar i varje kursmoment i form av exempelvis artiklar, guider, manualer.

<!--
Som kurslitteratur har jag valt följande böcker. Det är en god idé att läsa igenom dessa  under kursen, det finns läsanvisningar till dessa i samband med varje kursmoment.

* **[Beginning PHP and MySQL: From Novice to Professional](kunskap/boken-beginning-php-and-mysql-from-novice-to-professional)** -- Gilmore, W  
  En tjockare bok för den som vill ha en mer komplett vy över PHP och MySQL från början.
-->



###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter. Välj och vraka och ta ett eget beslut om de böcker du vill använda.


* **[Webbutveckling med PHP och MySQL](kunskap/boken-webbutveckling-med-php-och-mysql)** -- Montathar Faraon  
  En svensk bok som ger en god intro för den som är ny i PHP och programmering. Innehåller en del PHP och en del databaser och MySQL. Det är ingen objektorienterad PHP. Boken passar för den som behöver ett stöd i att lära grunderna i PHP eller hellre köper denna boken än boken i Databasteknik.

* **[Databasteknik](kunskap/boken-databasteknik)** -- Radron-McCarthy och Risch  
  Komplett med det man vill veta om databasteknik, både grunder, modellering och SQL. En databasbok helt enkelt. 

<!--
* **[HTML och CSS-boken](kunskap/boken-html-och-css-boken)** -- Rolf Staflin  
  En stabil bok för att komma igång med HTML och CSS.
-->



###Övrig litteratur {#ovriglitteratur}

I varje kursmoment kan det tillkomma läsanvisningar i till exempel artiklar, manualer och webbmaterial.


<!--
Läsanvisningar {#lasanvisning}
------------------------------

Det finns inga specifika läsanvisningar till kurslitteraturen.


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




Rekommenderad studieplan {#studieplan}
---------------------------------------------

Kursen har en [rekommenderad studieplan](kurser/oophp/studieplan) som visar en översikt över kursens olika moment och när de i tiden bör utföras för att studenten skall ligga i fas med kursens planering.

I studieplanen visas när rättning sker av respektive inlämnat moment samt när det finns möjligheter att göra restinlämningar.

Läs mer om den [rekommenderade studieplanen](kurser/faq/rekommenderad-studieplan).



Lektionsplan {#lektionsplan}
---------------------------------------------

Det finns en [lektionsplan](kurser/oophp/lektionsplan) som visar en detaljplanering för undervisningen i kursen, vecka för vecka.

Läs mer om [lektionsplanen](kurser/faq/lektionsplan).



Handledning {#handledning}
----------------------------------------

Förutom den planerade undervisningen enligt lektionsplanen så kan du få hjälp och stöd i kursens chatt och i forumet. Chatten lämpar sig för korta enkla frågor och forumet för mer utredande och längre frågor och svar. Om du inte får svar i chatten så rekommenderas att du postar i forumet.

Läs om [lärarstöd och handledning](kurser/faq/lararstod-och-handledning).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning). 



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



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [vi jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Kursen heter "Objektorienterade webbteknologier".

Från och med våren 2019 gäller följande.

Du hittar [kursplanen genom att söka på kurskoden DV1608 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1608).

Mellan 2017 och 2018 hade kursen kurskoden [PA1440](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1440).

Tidigare hette kursen "Databaser och objektorienterad programmering i PHP".

Fram till och med höstterminen 2016 hade kursen kurskoden [DV1485](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1485).

Fram till och med vårterminen 2013 hade kursen kurskoden [DV1127](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1127).



Versioner av kursen {#versioner}
-----------------------------------------------------

Om du påbörjat den äldre version av kursen så skall du också slutföra denna versionen av kursen (eller göra om den nya kursen från start). Alternativt rådgör du med den som är kursansvarig.

Från och med vårterminen 2018 finns kursmaterialet i [oophp (v4)](kurser/oophp-v4).

Om du gick kursen under vårterminen 2017, så finns kursmaterialet i [oophp (v3)](kurser/oophp-v3).

Om du gick kursen från hösten 2014 till och med vårterminen 2016, så finns kursmaterialet i [oophp (v2)](kurser/oophp-v2).

Om du gick kursen tidigare, fram till och med vårterminen 2013, så finns kursmaterialet i [oophp (v1)](kurser/oophp-v1).
