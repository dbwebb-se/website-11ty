---
author: mos
revision:
  "2015-08-03": (S, mos) Arkiverade kursen till förmån för version 2.
  "2015-01-09": (R, mos) Ny text till studieplanerna.
  "2014-01-07": (Q, mos) Uppdaterade kurslitteratur Duchett till senaste versionen.
  "2013-08-12": (P, mos) Ny kurskod, DV1462 ersätter DV1401.
  "2013-01-08": (O, mos) Not om ny utgåva av referenslitteratur.
  "2012-08-10": (N, mos) Uppdaterad och genomgången inför kursstart ht12.
  "2012-07-02": (M, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-03-23": (L, mos) Uppdaterade texten om kmom06, tog bort kmom07 och gjorde
    projektet till kmom07/10.
  "2011-03-11": (K, mos) Uppdaterade texten om kmom05 som har fått en omstruktireing
    och uppfräschat innehåll.
  "2011-02-16": (J, mos) Uppdaterade texten om kmom04 som bytte inriktning till CSS
    och PHP.
  "2011-02-04": (I, mos) Uppdaterade texten om kmom03 som bytte inriktning till en
    lugnare intro i PHP.
  "2011-01-27": (H, mos) Uppdaterade texten om kmom02.
  "2011-01-18": (G, mos) Uppdaterade texten om kmom01.
  "2010-10-14": (F, mos) Uppdaterade texten om kursmoment 07 CSS och Stylesheets.
  "2010-10-05": (E, mos) Uppdaterade texten om kursmoment 06, PHP och SQLite.
  "2010-09-20": (D, mos) Gjorde en rockad och flyttade fram kmom04 ett steg. Införde
    nytt kmom04.
  "2010-09-13": (C, mos) Bytte rubrik på kmom04.
  "2010-09-10": (B, mos) Mindre uppdateringar för kmom03 o 04.
  "2010-08-26": (A, mos) Första revisionen inför kursstart HT2010.
updated: "2015-08-03 12:05:42"
created: "2012-06-12 10:10:01"
...
Kursen "htmlphp" (version 1)
==================================

[INFO]
**ARKIVERAD KURS**

Detta är version 1 av kursen htmlphp. Den gavs vid BTH på campus och distans från och med höstterminen 2010 till och med vårterminen 2015. Om du påbörjade denna versionen av kursen så skall du också slutföra denna versionen av kursen. Version 2 av kursen är inte bakåtkompatibel med sina kursmoment utan har ett annat innehåll.

Senaste aktuella versionen av kursen oophp hittar du alltid på:

*  <a href='http://dbwebb.se/htmlphp'>http://dbwebb.se/htmlphp</a>

[/INFO]

Kursen "htmlphp" handlar om grunderna i HTML och CSS, hur man bygger dynamiska webbplatser med skriptbaserad PHP och hur man kopplar PHP till databaser. Detta dokument ger en översikt av kursens innehåll och länkar vidare till kursens olika kursmoment.

<!--more-->



Om kursen {#om}
---------------

400-tecken om kursen:

> Grundkurs i HTML, CSS och skriptbaserad PHP-programmering. Konstruktioner i HTML presenteras. Separata stylesheets används och konstruktioner i CSS hanteras. PHP används för att bearbeta formulär, generera tabeller och för att införa dynamik i webbplatsen. PHP används för att spara data i filbaserad databas (SQLite). Genom hela kursen utvecklas en webbplats som byggs ut efter hand.

Kursen lär ut webbutveckling där teknikerna HTML, CSS, PHP och SQL används för att tillsammans bygga en databasdriven webbplats.

HTML och CSS ger grundförutsättningarna för hur en webbapplikation kan byggas. Genom att använda server-side skriptprogrammering med PHP så kan webbapplikationen bli mer dynamisk och lagra information i databaser. Dessutom kan webbapplikationen byggas upp med en programmeringsmässig struktur, en struktur som underlättar utveckling och underhåll av webbplatsen.

Detta är en introduktionskurs för den som vill lära sig teknikerna från grunden. Kursen kräver inga förkunskaper och hanterar helheten kring en webbapplikation. Till att börja med fokuseras på HTML och CSS. Vi använder HTML5 och tittar på vilka möjligheter som CSS3 kommer att erbjuda.

Därefter introduceras PHP som ett skriptspråk och med enkla programmeringskonstruktioner får vi möjlighet att bygga ut vår webbplats på ett strukturerat sätt. Vi fortsätter med att lagra information i en filbaserad databas (SQLite) via PHP's gränssnitt PHP Data Objekt. Vi använder på frågespråket SQL och lär oss de grundläggande konstruktionerna.

Sammantaget blir kursen en grundlig introduktion och orientering i de tekniker som ofta används för att skapa webbplatser. Kursen kan med fördel tas av de som inte har kunskaper i vare sig programmering eller HTML-kunskaper.


Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


###Kmom01: Kom igång med HTML, CSS och PHP {#kmom01}

*alternativt "Börja läsa boken, bekanta dig med labbmiljön och gör en me-sida"*

Kursmomentet visar hur du kommer igång med labbmiljön, dels en installation på din egen dator och dels med driftsservern. Du kommer utveckla lokalt och kopierar därefter över resultatet till en driftsserver.

Vi visar ett par exempel på kodning i HTML, CSS och PHP och använder de kunskaperna för att bygga en me-sida. Me-sidan är en enkel webbplats som innehåller en presentation av dig själv tillsammans med redovisningstexterna för kursmomenten.

Vi bygger webbplatsen steg för steg. Vi försöker bygga en struktur som går att återanvända för att bygga fler webbplatser.

Resultatet av dagens övning laddas upp på skolans driftserver.

* Instruktionen till kursmoment 01:  
  <a href='http://dbwebb.se/htmlphp/kmom01'>http://dbwebb.se/htmlphp/kmom01</a>


###Kmom02: HTML-element och CSS-konstruktioner {#kmom02}

*alternativt "20% av elementen står för 80% av användarfallen"*

Vi fortsätter att bygga ut me-sidan med HTML, CSS och PHP. Framförallt är detta moment en genomgång av grunder i HTML och CSS. Efter kursmomentet så har du en me-sida version 2 som innehåller några av de vanligaste konstruktionerna som återfinns i de flesta webbplatser.

Vi fortsätter använde små PHP-konstruktioner för att dra nytta av PHP och dess fördelar.

* Instruktionen till kursmoment 02:  
  <a href='http://dbwebb.se/htmlphp/kmom02'>http://dbwebb.se/htmlphp/kmom02</a>


###Kmom03: Dynamisk webbplats med PHP {#kmom03}

*alternativt "En multi-sida med PHP för inloggning på webbplatsen"*

Vi har nu en gedigen grund i HTML och CSS. Med hjälp av PHP har vi en god grundstruktur i me-siten. Låt oss nu ägna lite mer tid åt PHP. Vad finns det i PHP som kan underlätta byggandet av webbplatser?

I kursmomentet gås igenom de inbyggda arrayerna i PHP. Vi tittar på `$_GET`, `$_POST`, `$_SERVER` och `$_SESSION` samt hur de kan användas. Med hjälp av dessa arrayer, och lite mer PHP-kunskaper, gör vi ett flertal små testprogram för att klura ut hur saker och ting fungerar.

Till slut knyter vi ihop det genom att bygga funktionalitet för login/logout och integrera detta i me-sidan. Resultatet blir me-sida version 3.0.

* Instruktionen till kursmoment 03:  
  <a href='http://dbwebb.se/htmlphp/kmom03'>http://dbwebb.se/htmlphp/kmom03</a>


###Kmom04: CSS och en style-väljare i PHP  {#kmom04}

*alternativt "Styla sidan med CSS: färg, form och presentation"*

Vi tillägnar detta kursmoment åt att gå igenom viktiga grunder i CSS, grunder såsom box modellen, storlekar, display, float, fonter, färger och bakgrundsbilder. Inom ramen för övningen finns det tillräckligt med tid för att leka och testa olika konstruktioner. Använd tiden väl till att testa och leka. Det är ett bra sätt att lära sig.

Avslutningsvis gör vi en programmeringsövning där vi skapar en stylesheetväljare med PHP. Med den kan vi dynamiskt ändra vilken stylesheet som används till webbplatsen. I samband med det så tittar vi på lite fler PHP-konstruktioner.

* Instruktionen till kursmoment 04:  
  <a href='http://dbwebb.se/htmlphp/kmom04'>http://dbwebb.se/htmlphp/kmom04</a>


###Kmom05: HTML-formulär och PHP {#kmom05}

*alternativt "En webbplats för annonser, med hjälp av PHP och filhantering."*

En övning i att skapa ett HTML-formulär och spara dess innehåll i filer på disk med hjälp av PHP-kod. Nu gäller det att vässa dina PHP-kunskaper.

Vi börjar med att göra ett formulär som låter dig uppdatera stylesheeten via ett formulär. Därefter gör vi en webbplats för annonser, Blokket. Vi ser hur man kan hantera de vanliga sätten att skapa, uppdatera, radera och läsa information.

Detta kursmoment är en fördjupning i formulär och ett exempel i hur informationen kan lagras på disk. I nästa kursmoment gör vi samma sak, fast vi använder en databas istället.

Övningen avslutas med att vi tittar på de olika formulärelement som finns. När du är klar har du en style-editor och en egen kopia av Blokket.

* Instruktionen till kursmoment 05:  
  <a href='http://dbwebb.se/htmlphp/kmom05'>http://dbwebb.se/htmlphp/kmom05</a>


###Kmom06: PHP och SQLite {#kmom06}

*alternativt "Uppdatera din webbplats för annonser med stöd för databas."*

Detta moment handlar om databasen SQLite och hur du kan använda den tillsammans med PHP. Momentet består dels av en guide som hjälper dig att komma igång med SQLite, SQLite Manager och SQL. Guiden visar dig även de vanligaste konstruktionerna i PHP PDO för att skapa tabeller, lägga till värden, uppdatera, ta bort och läsa.

Efter att ha gått igenom guiden så uppdaterar du Blokket till Blokket2, en uppdatering där Blokket2 lagrar alla annonser med databasen SQLite istället för på fil.

* Instruktionen till kursmoment 06:  
  <a href='http://dbwebb.se/htmlphp/kmom06'>http://dbwebb.se/htmlphp/kmom06</a>


###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

* Instruktionen till kursmoment 07/10:  
  <a href='http://dbwebb.se/htmlphp/kmom10'>http://dbwebb.se/htmlphp/kmom10</a>


Kurslitteratur {#litteratur}
----------------------------

###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har jag valt följande böcker. Det är en god idé att läsa igenom dessa  under kursen, det finns läsanvisningar till dessa i samband med varje kursmoment.

* **HTML & CSS: The Complete Reference** -- T. A. Powell  
  En perfekt tegelsten om HTML och CSS, inklusive nya konstruktioner i HTML5 och CSS3 samt referenslista till element och konstruktioner.
  
Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-html-css-the-complete-reference'>http://dbwebb.se/kunskap/boken-html-css-the-complete-reference</a>


###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter.

* **Beginning HTML, XHTML, CSS and JavaScript** -- Duchett, Jon  
  En grundbok i HTML och CSS för de som vill lära sig från böcker istället från nätet.

Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-beginning-html-xhtml-css-and-javascript'>http://dbwebb.se/kunskap/boken-beginning-html-xhtml-css-and-javascript</a>

* **Beginning PHP and MySQL: From Novice to Professional** -- Gilmore, W  
  En tjockare bok för den som vill ha en mer komplett vy över PHP och MySQL från början. Läsanvisningar finns.
  
Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-beginning-php-and-mysql-from-novice-to-professional'>http://dbwebb.se/kunskap/boken-beginning-php-and-mysql-from-novice-to-professional</a>

* **Webbutveckling med PHP och MySQL** -- Montathar Faraon  
  En svensk bok som ger en god intro för den som är ny i PHP och programmering. Innehåller en del PHP och en del databaser och MySQL.
  
Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-webbutveckling-med-php-och-mysql'>http://dbwebb.se/kunskap/boken-webbutveckling-med-php-och-mysql</a>

* **The Principles of Beautiful Web Design** -- Jason Beaird  
  En härlig bok om webdesign och dess komponenter. För den som vill lära sig mer om design av webbplatser.
  
Läs mer om boken här: <a href='http://dbwebb.se/kunskap/boken-the-principles-of-beautiful-web-design'>http://dbwebb.se/kunskap/boken-the-principles-of-beautiful-web-design</a>


Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment. Skaffa gärna böckerna i förväg och börja läsa dem innan kursen.

| Kursmoment | HTML & CSS | Beginning HTML, XHTML...  | Beginning PHP and MySQL |
|------------|------------|---------------------------|-------------------------|
| Kmom01     | Ch 1       | Ch 1, 2                   | Ch 1, 2, 3              |
| Kmom02     | Ch 4       | Ch 3, 4, 7                |                         |
| Kmom03     | Ch 3, 5    | Ch 5                      | Ch 4, 13, 18            |
| Kmom04     |            | Ch 8, 9, 10               | Ch 5                    |
| Kmom05     | Ch 2       |                           | Ch 10                   |
| Kmom06     |            |                           | Ch 31                   |
| Kmom07/10  ||||


Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

För dig som studerar på distans finns det en [rekommenderad studieplan](htmlphp/studieplan). Du kan behöva anpassa den rekommenderade planen till dina egna datum och förutsättningar. 

Läser du kursen som en del i ett kurspaket så finns det en [studieplan som är kopplad till kurspaketet](webprog#studieplan).

Går på campus så får du en lektionsplan i samband med kursstart.

Det finns ett särskilt dokument som ger lite [utförligare beskrivning av planeringen av kursen och viktiga hållpunkter](kurser/lektionsplan-och-rekommenderad-studieplan).



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

Du hittar [kursplanen genom att söka på kurskoden DV1462 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1462).

Fram till och med vårterminen 2013 hade kursen kurskoden [DV1401](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1401).
