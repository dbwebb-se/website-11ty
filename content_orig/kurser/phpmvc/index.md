---
title: phpmvc

author: mos
revision:
  "2015-03-02": (K, mos) Bytte reflitteratur för HTML&CSS.
  "2015-01-09": (J, mos) Ny info om studieplan för kurspaket.
  "2014-05-07": (I, mos) Uppdaterad med kmom06 i phpmvc-kursen version 2.
  "2014-04-25": (H, mos) Uppdaterad med kmom05 i phpmvc-kursen version 2.
  "2014-04-21": (G, mos) Uppdaterad med kmom04 i phpmvc-kursen version 2.
  "2014-04-02": (F, mos) Uppdaterad med kmom02 i phpmvc-kursen version 2.
  "2014-03-24": "(E, mos) Första utkastet till en version 2 av phpmvc-kursen."
  "2013-08-12": (D, mos) Ny kurskod DV1486 ersätter DV1440.
  "2013-03-28": (C, mos) Uppdaterad inför campuskursen vt13.
  "2012-08-31": (B, mos) Överflyttad från forumet till lydia, uppdaterad med mer innehåll.
  "2012-02-01": (A, mos) Första revisionen inför kursstart VT2012.
updated: "2015-03-02 17:00:34"
created: "2013-10-24 15:00:52"
...
Kursen phpmvc version 2
==================================

Kursens syfte är att visa hur avancerad PHP-programmering och ramverkstänkande baserat på Model View Controller (MVC) kan leda till välbyggda webbapplikationer och väl strukturerad kod.

MVC är en ofta använd arkitektur i ramverk för att utveckla webbplatser och databasdrivna webbapplikationer. MVC-baserade ramverk ger en stabilitet, ett vokabulär och möjlighet för ordning och reda i utvecklingsprojekten.

Kursen visar hur du bygger grundstrukturen för ditt egna PHP-baserade MVC-inspirerade ramverk. Du kommer studera befintliga MVC-ramverk, se hur de är uppbyggda och sedan återskapa kodstrukturer i det som kan bli ditt egna ramverk. Genom att delvis skapa egen kod och delvis återanvända färdigutvecklade klasser och komponenter så skapar du ett eget ramverk för att snabbt och säkert kunna bygga databasdrivna webbapplikationer.


Via litteraturstudier, praktiska övningar och ett större avslutningsprojekt ges möjlighet att skapa sig en egen bild av vad MVC kan innebära för ett webbutvecklingsprojekt.

<!--more-->


[INFO]
**Tidigare version av kursen**

Det finns en [version 1 av denna kursen](phpmvc-v1), den var aktiv från vårterminen 2012 och fram till och med vårterminen 2014.

Om du påbörjat den äldre version av kursen så skall du också slutföra denna versionen av kursen innan 2016 (eller göra om den nya kursen från start).
[/INFO]



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> För tillträde till kursen krävs avklarade kurser i "Databaser, HTML, CSS och skriptbaserad PHP-programmering" 7.5hp och "Databaser och Objektorienterad PHP-programmering" 7.5hp eller avklarade kurser inom programmering, databaser, webbutveckling och webbprogrammering motsvarande 30hp.

Denna kurs bygger vidare på det du lärt dig i kurserna [htmlphp](htmlphp) och [oophp](oophp). Här följer läsanvisningar som gör att du kan förbereda dig för kursen och repetera sådant som du skall kunna sedan tidigare.

För att sammanfatta förkunskapskraven så handlar det om HTML, CSS, objektorienterad PHP, SQL med SQLite och MySQL, lokal egen utvecklingsmiljö och BTHs driftsmiljö samt grundläggande kunskaper i Unix.

Du har full koll på HTML och CSS. Du kan innehållet i boken "[HTML & CSS The Complete Reference](kunskap/boken-html-css-the-complete-reference)", utan och innan. I stort sett.

Repetera dina PHP-kunskaper. Kika snabbt igenom guiderna "[Kom i gång med PHP på 20 steg](kunskap/kom-i-gang-med-php-pa-20-steg)" samt "[Kom igång med objektorienterad PHP-programmering på 20 steg](kunskap/kom-i-gang-med-oophp-pa-20-steg)".

Du har koll på MySQL, eller hur? Annars hjälper dig följande artiklar att komma igång. "[Kom igång med databasen MySQL och dess klienter](kunskap/kom-igang-med-databasen-mysql-och-dess-klienter)", "[BTH's labbmiljö för databasen MySQL](kunskap/bth-s-labbmiljo-for-databasen-mysql)" och "[Kom igång med PHP PDO och MySQL](kunskap/kom-igang-med-php-pdo-och-mysql)".

Du kan databasen SQLite, annars finns [guiden som visar hur du kommer igång med SQLite](kunskap/kom-igang-med-databasen-sqlite) samt "[Kom igång med SQLite och PHP PDO](kunskap/kom-igang-med-sqlite-och-php-pdo)".

I kursen används Git och GitHub. Om du inte kan det så jobbar du igenom guiden "[Kom igång med Git och Github](kunskap/kom-igang-med-git-och-github)". 

Anax är en webbmall för att bygga enklare PHP-drivna webbplatser, [läs om dess uppbyggnad](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).

Du har koll på din labbmiljö och BTHs driftserver. Här är [artiklar om labbmiljö och driftsmiljö](labbmiljo).



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* Avancerad objektorienterad PHP-programmering med design mönster.
* Allmänt om tekniker och användning av PHP-baserade och MVC-inspirerade ramverk (Model View Controller).
* Utveckling av ett eget PHP-baserat och MVC-inspirerat ramverk där olika webbaserade tekniker samverkar. Tekniker som berörs är framförallt HTML, CSS, PHP och SQL.
* Utveckling av en databasdriven webbapplikation genom att använda det egna ramverket.
* Webbutveckling i Unix-miljö, versionshanteringsverktyg med git, github tillsammans med andra verktyg för avancerad utveckling i PHP.



Mål {#mal}
------------------------



###Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* kunna redogöra för webbutveckling baserad på ett PHP-baserat MVC-ramverk, genom att i skrift utförligt sammanfatta och generalisera erfarenheter och observationer från övningar och projekt.
* vara väl bevandrad i de tekniker som ligger till grund för webbutveckling med ramverk.



###Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* kunna använda ett MVC-ramverk, arbeta i ramverket via praktiska övningar och kritiskt bearbeta resultaten därav.
* självständigt kunna använda ett ramverk, utöka det via återanvändbara moduler i syfte att färdigställa en avancerad databasdriven webbapplikation.
* vara väl bevandrad i de avancerade verktyg och miljöer som används vid webbutveckling och webbprogrammering.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


###Kmom01: PHP-baserade och MVC-inspirerade ramverk {#kmom01}

*alternativt "Koda en me-sida i ett ramverk"*

Vi bekantar oss med PHP-baserade ramverk och vad begreppet Model, View Controller (MVC) kan innebära i en webbapplikation. Det blir läsande och en orientering i avancerad utveckling med PHP och ramverk.

Vi introducerar Anax, nu i formen som Anax-MVC. Anax har fått en uppgradering till ett PHP-baserat MVC-inspirerat MVC-ramverk. Du sätter ihop din me-sida som följer dig genom kursen.

[Instruktion till kursmoment 01](phpmvc-v2/kmom01).



###Kmom02: Kontroller och Modeller {#kmom02}

Vi skall dyka djupare in i ramverket Anax MVC och dess kod för att se hur det hänger ihop. Det är dags att titta lite mer på kontroller och modeller. Vi skall se hur en hel klass kan agera som en kontroller och hur kontrollern kan använda en enkel modell för att lösa en uppgift.

Dessutom får du börja använda pakethantering i PHP med Packagist och Composer. Två verktyg som erbjuder en bra struktur på pakethantering som också är kopplad till Github.

[Instruktion till kursmoment 02](phpmvc-v2/kmom02).



###Kmom03: Bygg ett eget tema {#kmom03}

*alternativt "LESS-baserade ramverk, gridlayout, typografi och responsivt"*

Bygg ut ditt ramverk med ett eget responsivt tema som baseras på LESS och gridbaserad layout. Du utvecklar både ett horisontellt- och ett vertikalt grid. Du definiera regioner i temat som du fyller med innehåll via vyer och du funderar över termer som som grid-layout, fixed layout, flexibel layout, responsiv layout och mobile first.

Dessutom bekantar du dig med ett par LESS-baserade ramverk/komponenter.

[Instruktion till kursmoment 03](phpmvc-v2/kmom03).



###Kmom04: Databasdrivna modeller {#kmom04}

*alternativt "Bygg kod för att förbereda automatisering av kodskrivandet."*

Att automatiskt generera kod i ramverket har fördelen att det går snabbt att skapa koden, men nackdelen är att den inte blir exakt som man vill och kan behöva modifieras. I detta kursmomentet skall vi titta på de förutsättningar som bör finnas i ramverket för att vi skall kunna automatgenerera kod. Vi tittar på olika databaslager, modeller som är förberedda för CRUD-hantering och effektiv formulärhantering.

Vi försöker belysa frågor om vilka grunder, i form av klasser för formulärhantering, databasfrågor och modeller, som kan hjälpa oss att skriva enkla kodkonstruktioner som leder till snabbare resultat, och bättre kod, i ramverket.

[Instruktion till kursmoment 04](phpmvc-v2/kmom04).



###Kmom05: Bygg ut ramverket {#kmom05}

*alternativt "Dela ut ditt paket och låna någon annans."*

Jag tänkte att du nu skall ta ditt egna ramverk och utveckla det med en ny modul, eller paket. Jag vill att du i detta kursmomentet gör ett eget paket, som du lägger i ett eget GitHub repo och sedan  publicerar som ett paket på Packagist. Det spelar egentligen inget större roll hur stort ditt paket är, bara det är ett vettigt paket som du vill ha i ditt ramverk. Jag kommer att ge dig några exempel på moduler, men du kan välja fritt.

Tanken med detta kursmoment är också att du kan, om du vill, använda andra paket och inkludera dem i ditt egna ramverk. Det kan vara paket du hittar på Packagist, GitHub eller paket som någon av dina med-studenter tillverkar. Dela ut ditt paket och låna någon annans.

[Instruktion till kursmoment 05](phpmvc-v2/kmom05).



###Kmom06: Verktyg och Continuous integration (CI) {#kmom06}

*alternativt "Låt verktygen göra jobbet åt dig."*

Vi har lärt oss grunderna i ramverk, hur det kan byggas upp av egna och lånade moduler och vi har kikat på eko-systemet för modulhantering. Nu fortsätter vi med att titta på fler delar av det eko-system som omger vårt ramverk och dess moduler. Vi skall nämligen införa enhetstestning, eller för att använda rätt termer så heter det *unit testing*, *code coverage*, *continuous integration*, *automated tests* and *code quality*. 

[Instruktion till kursmoment 06](phpmvc-v2/kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](phpmvc-v2/kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?

Det finns en [översikt av kurslitteratur per kurs](kunskap/oversikt-av-kurslitteratur-per-kurs).



###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har jag valt följande bok, tillsammans med ett antal artiklar som finns tillgängliga på nätet. 

Det finns läsanvisningar i samband med varje kursmoment.


* **[PHP Objects, Patterns, Practice](kunskap/boken-php-objects-patterns-and-practice)** -- Matt Zandstra  
  En bok för den som kan sin PHP-programmering och vill mer med designpatterns, ramverk och mer avancerade tekniker som är nödvändiga för den professionella webbprogrammeraren.



###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter.

* **[Pro PHP: Patterns, Frameworks, Testing and More](kunskap/boken-pro-php-patterns-frameworks-testing-and-more)** -- Kevin McArthur  
  Väldigt lik struktur och innehåll som kursboken. Denna var tidigare kursbok men har flyttat ned till referenslistan och kan vara ett alternativ till kursboken.

* **[Code Complete](kunskap/boken-code-complete)** -- Steve McConnell  
  En bok för den som vill förädla sitt kunnande i konsten att programmera, skriva bra kod och göra rätt saker i programutvecklingsprojekt.

* **[HTML och CSS-boken](kunskap/boken-html-och-css-boken)** -- Rolf Staflin  
  En stabil bok för att komma igång med HTML och CSS.

* **[Beginning PHP and MySQL: From Novice to Professional](kunskap/boken-beginning-php-and-mysql-from-novice-to-professional)** -- Gilmore, W  
  En tjockare bok för den som vill ha en mer komplett vy över PHP och MySQL från början. 
  
* **[Databasteknik](kunskap/boken-databasteknik)** -- Radron-McCarthy och Risch  
  Komplett med det man vill veta om databasteknik, både grunder, modellering och SQL.

  


Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment.

| Kursmoment | PHP Objects, Patters and Practice               | 
|------------|-------------------------------------------------|
| Kmom01     | Ch 21, 1, 4, (2, 3)                             |
| Kmom02     | Ch 5, 6, (15)                                   |
| Kmom03     |                                                 | 
| Kmom04     | Ch 7, 9, 13                                     |
| Kmom05     | Ch 14, 15, 17                                   | 
| Kmom06     | ch 18, 19, 20                                   | 
| Kmom10     |                                                 |



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

För dig som studerar på distans finns det en [rekommenderad studieplan](phpmvc/studieplan). Du kan behöva anpassa den rekommenderade planen till dina egna datum och förutsättningar. 

Läser du kursen som en del i ett kurspaket så finns det en [studieplan som är kopplad till kurspaketet](webprog#studieplan).

Går du på campus får du en lektionsplan i samband med kursstart.

Det finns ett särskilt dokument som ger lite [utförligare beskrivning av planeringen av kursen och viktiga hållpunkter](kurser/lektionsplan-och-rekommenderad-studieplan).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning). 



Lärarstöd och handledning {#handledning}
----------------------------------------

I distanskurserna är forum och chat de viktigaste källorna för handledning. Vi har samlat information om handledning och hjälp-till-självhjälp i ett eget dokument.

Läs om hur [handledning och hjälp-till-självhjälp fungerar på dessa kurser](kurser/lararstod-och-handledning).  



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chat eller mail.

Läs om hur [jag jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Du hittar [kursplanen genom att söka på kurskoden DV1486 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1486).

Fram till och med vårterminen 2013 hade kursen kurskoden [DV1440](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1440).
