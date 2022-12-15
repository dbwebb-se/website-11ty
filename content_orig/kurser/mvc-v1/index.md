---
title: mvc (v1)
author:
    - mos
revision:
    "2021-03-25": "(PA2, mos) Första utgåva vt21, kopierad från oophp-v5."
...
Kursen mvc (v1)
==================================

Kursen **Objektorienterade webbteknologier**, a.k.a. *mvc*, fokuserar på objektorienterade programmeringstekniker i programmeringsspråket PHP. Klassiska objektorienterade konstruktioner hanteras tillsammans med objektorienterad programmering i webbaserat ramverk tillsammans med databaser samt enhetstestning.

<!--more-->

Läs vidare för en översikt för kursens innehåll, struktur och planering.



Kursintro {#pres}
------------------------

Här är en video som "pratar" dig igenom kursens upplägg och delar av innehållet i detta dokumentet.

[YOUTUBE src="jJZ7pQGeaOI" width=700 caption="Kursintroduktion till kursen mvc med Mikael."]



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> För tillträde till kursen krävs genomgången kurs Webbteknologier, 7,5 hp samt genomgången kurs i databaser motsvarande 7,5 hp.



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

Kursen är uppdelad i 10 kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.

Kursen avslutas med ett större avslutande moment som examinerar kursen.



### Kmom01: Objektorientering {#kmom01}

To Be Defined.

<!--
Vi börjar med grunderna i objektorienterad PHP, det blir objekt och klasser med inkapsling, konstruktorer och destruktorer, setters och getters, egenskapade exceptions och vi ser hur man kan lagra ett objekt i sessionen.

Vi jobbar i en guide och bygger små grundläggande testprogram för att testa och se hur objektorienterade konstruktionerna fungerar i PHP.

För att repetera våra PHP-kunskaper och samtidigt komma igång med klasser och objekt så bygger vi en variant av spelet "Gissa vilket nummer jag tänker på".

Vi bygger en me-sida (redovisa-sida) med PHP-ramverket Anax. Det ger oss möjligheten att bekanta oss med en färdig webbplats i eet PHP-ramverk. Senare i kursen kommer vi att flytta in spelet "Gissa mitt nummer" in i ramverkets struktur.
-->

Läs [instruktionen till kursmoment 01](./kmom01).



### Kmom02: Controller {#kmom02}

To Be Defined.

<!--
Vi jobbar vidare med programmering av klasser och objekt. Vi tar fler grundkonstruktioner i objektorientering och PHP. Vi tittar på arv och komposition för att se hur klasser kan samverka och bygga på varandra. Vi använder namespace för att strukturera koden och vi använder en autoloader enligt PSR-4.

Vi ser hur ett klassdiagram kan ritas i UML, för att skissa på relationerna mellan klasserna. Vi ser också hur man kan bygga upp automatisk dokumentation från koden via docblock-kommentarer.

Vi börjar koda inuti ramverket och använder oss av konstruktioner som routes, vyer och placerar klasserna inuti ramverket med givna namespaces och använder oss av ramverkets autoloader. Som övning tar vi och flyttar vårt spel "Gissa mitt nummer" in i ramverket.
-->

Läs [instruktionen till kursmoment 02](./kmom02).



### Kmom03: Enhetstestning {#kmom03}

Vi jobbar vidare med klasser och objekt och denna gången tittar vi på hur klasser kan enhetstestas med verktyget PHPUnit. PHPUnit är ett av de verktyg som vanligen används inom PHP för att utföra enhetstestning av koden.

<!--
Vi har tidigare pratat om begreppet inkapsling och att klasserna skall erbjuda ett publikt API, ett gränssnitt för användaren av klassen. Samtidigt vill vi skydda den interna implementationen inuti klassen. Vi vill låta användaren av vår klass ha ett tydligt gränssnitt, men inuti klassen vill vi själva bestämma hur vi implementerar klassens detaljer, utan att påverka/påverkas av det publika gränssnittet.

Liknande begrepp använder vi i enhetstestning. Vi ser varje klass som en enhet som skall testas och vi testar klassen via dess publika gränssnitt vilket är de metoder vi når som användare av klassen, dess publika metoder. När vi testar så är vi fullt medvetna om hur klassen är uppbyggd. Vi kallar det för _white box testing_, vi har tillgång till klassens källkod när vi skriver testfallen och vi vet exakt den källkod vi skall testa. Målet är att testa alla varianter av användning mot klassen, även felfall.
-->

Läs [instruktionen till kursmoment 03](./kmom03).



### Kmom04: Ramverk {#kmom04}

To Be Defined.

<!--
Med hjälp av ramverkets struktur flyttar vi vårt 100-spel in i en kontroller-klass som bildar ett gränssnitt mellan ramverkets kärna (klienten) och applikationens kod (100-spelet).

Med en kontroller-klass vinner vi en bättre struktur av våra routes och dessutom hamnar de i en klass som är enklare att testa än de routes med callbacks vi haft tidigare.

Vi jobbar mer och mer att integrera oss i de möjligheter som ramverket ger. Vi använder ramverkets klasser för att få tillgång till GET, POST och SESSION. Tanken är att vi inte skall ha tillgång till dessa globala variabler på ett godtyckligt sätt i varje klass, istället knyter vi accessen till dessa globala PHP systemvariabler via ramverkets klasser. En tanke är att göra det enklare att testa koden genom att mocka värden i dessa globala variabler.

Trait och interface är två objektorienterade konstruktioner som kan användas för att strukturera sin kod på ett objektorienterat sätt. Det ger oss två nya verktyg för att tänka när vi implementerar koden. När vi tittar på hur kontroller-klassen är specificerad så ser vi hur ramverket använder sig av dessa konstruktioner.
-->

Läs [instruktionen till kursmoment 04](./kmom04).



### Kmom05: Autentisering {#kmom05}

To Be Defined.

<!--
Detta kursmoment fokuserar på PHP PDO och databasen MySQL. Du får en inledande artikel som visar hur det fungerar i ett sammanhang och därefter får du på egen hand koda motsvarande funktionalitet in i din redovisa sida och in i ramverkets struktur.

Du får en utmaning som innebär att tänka igenom koden som serveras i övningen och hur den kan struktureras när den skall in i ramverket. Går det att göra objekt av allt eller har funktioner fortfarande en plats i kodstrukturen? Du väljer väg. Det blir en övning i refactoring.

Vill man förenkla så handlar det om att lösa CRUD (Create, Read, Update, Read) för en webbapplikation mot en databas, närmare specifikt en filmdatabas.
-->

Läs [instruktionen till kursmoment 05](./kmom05).


### Kmom06: Automatiserad test {#kmom06}

To Be Defined.

<!--
Detta kursmoment har ett liknande upplägg som föregående och vi fortsätter att jobba med databasen där vi nu fokuserar på att hantera "innehåll" i databasen. Innehåll kan till exempel vara texten till de sidor som bygger upp en webbplats eller innehållet i bloggsidor.

Att lagra innehåll i databasen för att sedan kunna visa upp det i webbplatsen är en kärnfunktionalitet i många webbplatser. Så här långt har vi en fungerande webbplats om använder sig av databas och objektorienterad programmering. Vi fortsätter att använda de teknikerna för att bygga grunden i en databasdriven webbplats där innehåll lagras i databasen och kan redigeras (CRUD) av användaren. Vi skall sedan visa upp innehållet som vanliga sidor i webbplatsen samt en blogg.

Det vi bygger är i grunden ett enkelt Content Mangement System (CMS) där användaren kan redigera webbplatsens innehåll och texter via ett webbaserat gränssnitt.
-->

Läs [instruktionen till kursmoment 06](./kmom06).



### Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

Läs [instruktionen till kursmoment 07/10](./kmom10).



Kurslitteratur {#litteratur}
----------------------------



### Kurslitteratur {#kurslitteratur}

Kurslitteraturen består av egenskrivna och länkade online-resurser såsom artiklar och guider.

Det finns läsanvisningar i samband med varje kursmoment.

<!--
Som kurslitteratur har jag valt följande böcker. Det är en god idé att läsa igenom dessa  under kursen, det finns läsanvisningar till dessa i samband med varje kursmoment.

* **[Beginning PHP and MySQL: From Novice to Professional](kunskap/boken-beginning-php-and-mysql-from-novice-to-professional)** -- Gilmore, W  
  En tjockare bok för den som vill ha en mer komplett vy över PHP och MySQL från början.
-->



### Referenslitteratur {#referenslitteratur}

Referensdokumentationen är främst olika online-resurser i form av manualer.



### Övrig litteratur {#ovriglitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter. Välj och vraka och ta ett eget beslut om de böcker du vill använda.


* **[Webbutveckling med PHP och MySQL](kunskap/boken-webbutveckling-med-php-och-mysql)** -- Montathar Faraon  
  En svensk bok som ger en god intro för den som är ny i PHP och programmering. Innehåller en del PHP och en del databaser och MySQL. Det är ingen objektorienterad PHP. Boken passar för den som behöver ett stöd i att lära grunderna i PHP eller hellre köper denna boken än boken i Databasteknik.

* **[Databasteknik](kunskap/boken-databasteknik)** -- Radron-McCarthy och Risch  
  Komplett med det man vill veta om databasteknik, både grunder, modellering och SQL. En databasbok helt enkelt.

<!--
* **[HTML och CSS-boken](kunskap/boken-html-och-css-boken)** -- Rolf Staflin  
  En stabil bok för att komma igång med HTML och CSS.
-->

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



Planering och studieplaner {#planering}
---------------------------------------------

Eftersom kursen ges kombinerat på campus och distans så är kursens planering fördelad på ett antal olika dokument. Bekanta dig med dem så att du har koll på hur kursens upplägg fungerar och vilket som är en normaltakt för kursen.

<!--
Kursen har en [veckoplan](./veckoplan) där du få en rekommendation till hur du kursens övergripande planering ser ut och hur du skall lägga upp dina studier, vecka för vecka.
-->

Kursen har en [rekommenderad studieplan](mvc/studieplan) som visar en översikt, vecka för vecka, vilket kursmoment som är aktuellt att jobba med. Där finns även rättningsfönster som visar när saker rättas. Följer du denna planeringen så är du i fas med kursens normaltakt.

På Canvas finns datum för inlämningsuppgifter. Ett rättningsfönster pågår normalt sett 15 arbetsdagar efter inlämningsdatum på uppgiften. Inlämningsdatumen på Canvas är ett par dagar senare än vad som visas i den rekommenderade studieplanen, det är för att ge dig lite slack/utrymme för att själv planera dina studier.

Kursen har en [lektionsplan](mvc/lektionsplan) som visar när det är lärarledda tillfällen för undervisning/handledning på campus/distans.

Kursen har bokade tillfällen i BTHs schemabokningsprogram, "schemat", som säger när en fysisk sal är bokad på campus. Det finns en länk till det aktuella schemar, via lektionsplanen.



Läromaterial och resurser {#laromaterial}
----------------------------------------

Här kan du se en översikt av hur kurstillfället har valt att strukturera läromaterialet och vilka resurser och verktyg som används i undervisningen.

Här finner du även länkar till aktuella video streams och spellistor samt chatter och forum för handledning.

* [Läromaterial vt21, lp4](./laromaterial-vt21lp4)



Lärarteam och intressenter {#team}
----------------------------------------

Här kan du hitta detaljer om ett kurstillfälle och se lärarteamet som utför kurstillfället, deras roller och kontaktuppgifter tillsammans med de som "äger" kursen och kurstillfället och vilka studentgrupper som läser kursen samt övriga intressenter till kurstillfället.

* [Lärarteam och intressenter vt21, lp4](./team-vt21lp4)



Ladok {#ladok}
------------------------

Enligt kursplanen finns ett antal ladokmoment och de är kopplade till kursens kursmoment enligt följande.

| Kursens moment  | Ladok moment enligt kursplan  | Betygsskala |
|-----------------|-------------------------------|:-----------:|
| Kmom01 + kmom02 | Inlämningsuppgift 1 á 2.5hp   | U-G         |
| Kmom03 + kmom04 | Inlämningsuppgift 2 á 2.5hp   | U-G         |
| Kmom05 - kmom10 | Inlämningsuppgift 3 á 2.5hp   | A-F, Fx     |

Den sista inlämningen bestämmer kursens slutbetyg vilket utfärdas när samtliga moment (kmom01-kmom10) godkänts.

Läs mer om [rapportering av resultat](kurser/faq/resultatrapportering).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [grunderna för bedömning och betygsättning](kurser/faq/bedomning-och-betygsattning-projekt-quiz-rapport-video).



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [vi jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Kursen heter "Objektorienterade webbteknologier".

Från och med våren 2019 hittar du [kursplanen genom att söka på kurskoden DV1608 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1608).

Mellan 2017 och 2018 hade kursen kurskoden [PA1440](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1440).

Tidigare hette kursen "Databaser och objektorienterad programmering i PHP".

Från 2013 och fram till och med höstterminen 2016 hade kursen kurskoden [DV1485](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1485).

Fram till och med vårterminen 2013 hade kursen kurskoden [DV1127](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1127).



Versioner av kursen {#versioner}
-----------------------------------------------------

Om du påbörjat den äldre version av kursen så skall du också slutföra denna versionen av kursen (eller göra om den nya kursen från start). Alternativt rådgör du med den som är kursansvarig.

Från och med vårterminen 2021 finns kursmaterialet i [mvc (v1)](kurser/mvc-v1).

Från vårterminen 2019 -- 2020 finns kursmaterialet i [oophp (v5)](kurser/oophp-v5).

Från vårterminen 2018 finns kursmaterialet i [oophp (v4)](kurser/oophp-v4).

Om du gick kursen under vårterminen 2017, så finns kursmaterialet i [oophp (v3)](kurser/oophp-v3).

Om du gick kursen från hösten 2014 till och med vårterminen 2016, så finns kursmaterialet i [oophp (v2)](kurser/oophp-v2).

Om du gick kursen tidigare, fram till och med vårterminen 2013, så finns kursmaterialet i [oophp (v1)](kurser/oophp-v1).
