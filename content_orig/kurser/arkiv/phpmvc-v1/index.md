---
author: mos
revision:
  "2014-08-08": (E, mos) Ändrade länkar från phpmvc till phpmvc-v1.
  "2013-08-12": (D, mos) Ny kurskod DV1486 ersätter DV1440.
  "2013-03-28": (C, mos) Uppdaterad inför campuskursen vt13.
  "2012-08-31": (B, mos) Överflyttad från forumet till lydia, uppdaterad med mer innehåll.
  "2012-02-01": (A, mos) Första revisionen inför kursstart VT2012.
updated: "2014-08-08 09:30:40"
created: "2012-08-30 09:08:06"
...
Kursen phpmvc version 1
==================================

Kursens syfte är att visa hur avancerad PHP-programmering och ramverkstänkande baserat på Model View Controller (MVC) kan leda till välbyggda webbapplikationer.

[INFO]
Kursen är ARKIVERAD.

Sista kurstillfället gick vårterminen 2014 och kursen är nu ersatt av version 2. Det är samma kursmål men helt nytt innehåll.

Du når den nya kursen här:

* <a href='http://dbwebb.se/phpmvc-v2'>http://dbwebb.se/phpmvc-v2</a>

Om du har påbörjat den gamla kursen så kan du antingen avsluta den innan sommaren 2016, eller påbörja den nya kursen från start.
[/INFO]

MVC är en ofta använd arkitektur av ramverk för att utveckla webbplatser och databasdrivna webbapplikationer. MVC-baserade ramverk ger en stabilitet och möjlighet för ordning och reda i utvecklingsprojekten.

Kursen visar hur du bygger grundstrukturen för ditt egna PHP-baserade MVC-inspirerade ramverk.  Du kommer använda befintliga MVC-ramverk och testa dem för att se hur de är uppbyggda. Genom att delvis skapa egen kod och delvis återanvända färdigutvecklade klasser och komponenter så skapar du ett eget ramverk för att snabbt kunna bygga databasdrivna webbapplikationer.


Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


###Kmom01: En Boilerplate {#kmom01}

*alternativt "Se hur någon annan gjort och lär av det"*

Kom igång med kursen, din utvecklingsmiljö och produktionsmiljön. Bekanta dig med begreppet boilerplate. Läs in dig på HTML5Boilerplate och använd det som en mall för att skapa din me-sida. 

[Instruktion till kursmoment 01](phpmvc-v1/kmom01).



###Kmom02: Grunden till ett MVC-ramverk {#kmom02}

*alternativt "De första stapplande stegen mot ett MVC-ramverk"*

Skaffa dig ett hum om tankarna med ramverk baserade på Model View Controller (MVC). Koda loss och skapa grunden till ditt egna PHP-baserade och MVC-inspirerade ramverk.

[Instruktion till kursmoment 02](phpmvc-v1/kmom02).



###Kmom03: En gästbok i ditt MVC-ramverk {#kmom03}

*alternativt "Kan CodeIgniter göra en gästbok så kan jag med"*

Använd ett befintligt MVC-ramverk, CodeIgniter, läs in dig på ramverket och använd det för att bygga en gästbok. Använd därefter dina nyvunna kunskaper och bygg en gästbok baserad på ditt egna MVC-ramverk. Samtidigt fyller du på ditt ramverk med funktionalitet.

[Instruktion till kursmoment 03](phpmvc-v1/kmom03).



###Kmom04: Modeller för login, användare och grupper {#kmom04}

*alternativt "Bygg ut, bygg om, kasta och gör bättre, om igen."*

Bygg ut ditt ramverk med hantering av användare, grupper och behörighet. Du bygger modeller, kontrollers och vyer för att hantera inloggning, skapa nya användare och uppdatera användares profil. Du försöker finna ett effektivt sätt att jobba med formulär.

[Instruktion till kursmoment 04](phpmvc-v1/kmom04).



###Kmom05: Innehåll {#kmom05}

*alternativt "Content is king, eller?"*

Skapa och spara webbplatsens innehåll i databasen. Skapa en editor där du kan ändra och spara innehållet. Lagra innehållet i databasen som olika typer, tex sidor ("page") och poster ("post"). Välj att visa dem, presentera dem för besökaren, beroende på vilken typ de är sparade som. Hantera innehållet på ett säkert sätt och pröva olika varianter att formattera och filtrera innehållet, ren text, html, php-kod och bbcode.

[Instruktion till kursmoment 05](phpmvc-v1/kmom05).



###Kmom06: CSS-ramverk och grid layout {#kmom06}

*alternativt "Lär dig skriva CSS som den borde skrivas."*

Testa ett par CSS ramverk och pröva på objektorienterad CSS med LESS. Skapa ett grundtema till ditt ramverk som baseras på LESS och gridbaserad layout (horisontalt/vertikalt). Skapa också regioner i temat som du fyller med innehåll. Hantera termer som grid-layout, fixed layout, flexible layout, responsive layout och mobile first. 

[Instruktion till kursmoment 06](phpmvc-v1/kmom06).



###Kmom07: Färdigställ och produktifiera MVC-ramverket {#kmom07}

*alternativt "Städa och rensa, snygga till och förbered för projektet"*

Städa upp i din kod, gör klart de sista sakerna som du vill ha med i ramverket. Ladda upp koden på github. Gör en installationsfas. Gör en testinstallation av ditt ramverk, går det att bygga en webbplats med det? Förbered dig för projektet. Tanken är att du implementerar projektet genom att clona din kod från github. Se till att hålla ordning på vad som är ditt ramverk och vad som är din applikation.

[Instruktion till kursmoment 07](phpmvc-v1/kmom07).



###Kmom08/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](phpmvc-v1/kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?


###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har jag valt följande böcker. Det är en god idé att läsa igenom dessa  under kursen, det finns läsanvisningar till dessa i samband med varje kursmoment.

* **[Pro PHP: Patterns, Frameworks, Testing and More](kunskap/boken-pro-php-patterns-frameworks-testing-and-more)** -- Kevin McArthur  
  En för den som kan sin PHP-programmering och vill mer med design patterns, ramverk och mer avancerade tekniker som är nödvändiga för den professionella webbprogrammeraren.
  

[INFO]
**Ändring av kurslitteraturen**

Tanken har varit att använda boken **Pro PHP MVC** av Chris Pitt, men den var inte så bra som jag hade tänkt mig. [Läs recensionen här](kunskap/boken-pro-php-mvc).

Istället ersätts den tills vidare av boken som var planerad som referenslitteratur, dvs: **Pro PHP: Patterns, Frameworks, Testing and More**. Samma bok användes som kurslitteratur under våren och hösten 2012.

Om du har boken av Chris Pitt så kan du använda den, det finns dock inga läsanvisningar kopplade till den.
[/INFO]


###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter.

* **[Beginning PHP and MySQL: From Novice to Professional](kunskap/boken-beginning-php-and-mysql-from-novice-to-professional)** -- Gilmore, W  
  En tjockare bok för den som vill ha en mer komplett vy över PHP och MySQL från början. 
  

* **[HTML & CSS: The Complete Reference](kunskap/boken-html-css-the-complete-reference)** -- T. A. Powell  
  En perfekt tegelsten om HTML och CSS, inklusive nya konstruktioner i HTML5 och CSS3 samt referenslista till element och konstruktioner.
  

* **[Databasteknik](kunskap/boken-databasteknik)** -- Radron-McCarthy och Risch  
  Komplett med det man vill veta om databasteknik, både grunder, modellering och SQL.
  

* **[Beginning Web Programming with HTML, XHTML and CSS](kunskap/boken-beginning-web-programming-with-html-xhtml-and-css)** -- Duchett, Jon  
  En grundbok i HTML och CSS för de som vill lära sig från böcker istället från nätet. Börjar bli gammal men ändå ok. Läsanvisningar finns.
  

* **[Webbutveckling med PHP och MySQL](kunskap/boken-webbutveckling-med-php-och-mysql)** -- Montathar Faraon  
  En svensk bok som ger en god intro för den som är ny i PHP och programmering. Innehåller en del PHP och en del databaser och MySQL.
  


Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment. Skaffa gärna böckerna i förväg och börja läsa dem innan kursen.

| Kursmoment | Pro PHP: Patterns, Frameworks, Testing and more | 
|------------|-------------------------------------------------|
| Kmom01     | Ch 1, 2                                         |
| Kmom02     | Ch 7, 14, 15                                    | 
| Kmom03     | Ch 3, 4                                         | 
| Kmom04     | Ch 6                                            |
| Kmom05     |                                                 | 
| Kmom06     |                                                 | 
| Kmom07     |                                                 | 
| Kmom10     |                                                 |



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

För dig som studerar på distans finns det en rekommenderad studieplan. Du kan behöva anpassa den rekommenderade planen till dina egna datum och förutsättningar. 

Går på campus så får du en lektionsplan i samband med kursstart.

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
