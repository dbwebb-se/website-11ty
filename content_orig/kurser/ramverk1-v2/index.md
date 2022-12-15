---
title: ramverk1-v2
author: mos
revision:
    "2019-02-04": "(E, mos) Uppdaterad med information från kursplan dv1610."
    "2018-12-10": "(D, mos) Uppdaterad till ramverk1 v2."
    "2017-10-02": "(C, mos) Info om samtliga kmom."
    "2017-08-03": "(B, mos) JavaScript flyttas till ramverk2."
    "2017-06-07": "(A, mos) Första revisionen inför kursstart HT2017, bygger på phpmvc-kursen."
...
Kursen ramverk1 (v2)
==================================

Kursen **Webbaserade ramverk 1**, a.k.a. *ramverk1*, lär ut programmering och objektorienterade kodstrukturer med designmönster och modultänkande kring återanvändbara moduler i webbaserade ramverk samt tekniker för automatiserad testning, byggsystem och flöde för kontinuerlig integration av programvaran.

<!--more-->


<!--
Genom att använda ramverk för webbutveckling tillsammans med tekniker HTML, CSS, PHP och databas tränas studenten i att hantera en större kodmassa som behöver organiseras i god kodstruktur med stöd av ramverk, designmönster och återanvändning av befintliga moduler för att effektivisera utvecklingsprocessen.

Kursens fokus är främst kodstruktur och ramverk på backend men fullstack-perspektivet är viktigt. Kursen introducerar utvecklingsmetoder för testdriven utveckling och continuous integration.

Via litteraturstudier, praktiska övningar och ett större avslutningsprojekt ges möjlighet att skapa sig en egen bild av vad koncepten kan innebära för ett webbutvecklingsprojekt.
-->



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> För tillträde till kursen krävs avklarade kurser eller moment från kurser i programmering och webbteknologier omfattande totalt 22,5 hp. Därutöver krävs genomgången kurs Objektorienterade webbteknologier, 7,5 hp.



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* Webbaserad programmering i ramverk med designmönster implementerade i programmeringsspråket PHP.
* Objektorienterade konstruktioner.
* Utveckling av webbapplikation i ramverk.
* Återanvändbara moduler, paketering och distribution.
* Designmönster för ramverk.
* Testdriven utveckling och tekniker för enhetstestning.
* Automatiserad testning och byggning.
* Relaterade verktyg och tekniker.



Mål {#mal}
------------------------

Följande är kursens mål, indelat i undergrupper.



### Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* ingående redogöra för webbutveckling baserat på de tekniker som omfattas genom att skriftligen beskriva och sammanfatta erfarenheter och observationer från övningar och projekt.
* kunna visa goda kunskaper i att använda valda tekniker genom att tillämpa dessa tekniker i praktiska övningar och projekt.



### Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* självständigt utifrån en specifikation kunna utveckla, dokumentera och presentera ett projekt baserat på ramverksbaserad kodning och återanvändning av moduler.
* ha god praktisk förmåga att hantera de verktyg och utvecklingsmiljöer som används vid utveckling och felsökning vid ramverksprogrammering.



### Värderingsförmåga och förhållningssätt {#vardera}

Efter genomförd kurs skall studenten:

* via redovisningstexter kunna visa god förmåga att reflektera och argumentera över kodstruktur i ramverk med sammanhang i designmönster och återanvändbara moduler.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


### Kmom01: Ramverk {#kmom01}

Vi tar en mjukstart för att komma in i ramverkstänkande och läser på om bra-att-ha kunskaper inom PHP och ramverk. Det handlar om nödvändiga verktyg och att nyttja den infrastruktur som finns kring PHP och att börja anamma ett modultänkande kring PHP och ramverk.

[Instruktion till kursmoment 01](./kmom01).



### Kmom02: MVC {#kmom02}

Vi tittar på designmönstret Model, View, Controller (MVC) och använder det för att strukturera vår kod i ramverket. Vi har tidigare sett både vyer (V) och kontroller (C) så nu är det dags att väva in M:et som står för model, modell-klasser och/eller modell-lagret.

Vi bekantar oss även med begreppet SOLID som är en akronym för en samling designmönster som är aktuella i sammhanget kring ramverk och allmän objektorienterad utveckling.

[Instruktion till kursmoment 02](./kmom02).



### Kmom03: DI {#kmom03}

Vi skall titta på tekniker som kan sammafattas med Dependency Injection (DI). Dessa tekniker används för att skapa en grundläggande struktur i ramverket avseende hur man lägger till "tjänster" i ramverket. Det handlar om `$di`.

Vi skall titta på begreppet Dependency Injection och några begrepp som är närliggande, begrepp såsom service locator, service container och lazy loading. Det handlar om designmönster och vanliga sätt att strukturera sin kod enligt det som kan betraktas som god programmeringssed.

[Instruktion till kursmoment 03](./kmom03).



### Kmom04: Modul {#kmom04}

Du skall skapa en fristående modul av ditt kommentarssystem och placera det i ett eget repo på GitHub. Du skall alltså lyfta bort koden från din me-sida och placera allt som modulen behöver i ett eget repo.

Du skall sedan publicera repot som en PHP modul på Packagist. När det är klart kan du åter installera modulen i din me-sida med hjälp av kommandot composer.

Du börjar införa enhetstestning på din modul.

[Instruktion till kursmoment 04](./kmom04).



### Kmom05: CI {#kmom05}

Tanken är att ge en bild av hur automatiserad testning och continuous integration (CI) kan fungera med en PHP modul som ligger publicerad på GitHub och Packagist.

Vi fortsätter jobba med modulen vi publicerade på GitHub och Packagist i föregående kursmoment. Vi låter externa verktyg checka ut vår kod från GitHub och köra testsuiten via `make install test`. De externa verktygen kan samtidigt analysera koden ur olika kvalitetsaspekter.

Vi bekantar oss med ett antal olika externa verktyg och försöker förstå vad de kan tillföra till en utvecklares vardag.

[Instruktion till kursmoment 05](./kmom05).



### Kmom06: Databasdrivna modeller {#kmom06}

Vi skall titta på klasser i modelllagret och utöka vår ramverksstruktur med formulärhantering via klasser och metoder samt databasdrivna modellklasser där vi använder oss av designmänstret Active Record.

Vi skall använda en extern modul för htmlformulär och vi skall använda en extern modul för databashanteringen.

[Instruktion till kursmoment 06](./kmom06).



### Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](./kmom10).



Kurslitteratur {#litteratur}
----------------------------



### Kurslitteratur {#kurslitteratur}

Kurslitteraturen består av egenskrivna och länkade online-resurser såsom artiklar och guider.

Det finns läsanvisningar i samband med varje kursmoment.



### Referenslitteratur {#referenslitteratur}

Referensdokumentationen är främst olika online-resurser i form av manualer.



### Övrig litteratur {#ovriglitteratur}

Det finns närliggande litteratur som är intressant för den som vill fördjupa sig i ämnet eller den som vill skaffa sig förkunskaper innan kursen.

* **[PHP Objects, Patterns, Practice](kunskap/boken-php-objects-patterns-and-practice)** -- Matt Zandstra  
    En bok för den som kan sin PHP-programmering och vill mer med designpatterns, ramverk och mer avancerade tekniker som är nödvändiga för den professionella webbprogrammeraren.

* **[Pro PHP: Patterns, Frameworks, Testing and More](kunskap/boken-pro-php-patterns-frameworks-testing-and-more)** -- Kevin McArthur  
    En bok för den som kan sin PHP-programmering och vill lära sig mer avancerade tekniker vilka är vardagsmat för den professionella webbprogrammeraren.

* **[Code Complete](kunskap/boken-code-complete)** -- Steve McConnell  
    En bok för den som vill förädla sitt kunnande i konsten att programmera, skriva bra kod och göra rätt saker i programutvecklingsprojekt.



<!--

Kursbok saknas så inga speciella läsanvisningar syns här.

Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment.

| Kursmoment | Eloquent JavaScript: A Modern Introduction to Programming |
|------------|-----------------------------------------------------------|
| Kmom01     | Ch 1, 12                                                  |
| Kmom02     | Ch 2                                                      |
| Kmom03     | Ch 3,                                                     |
| Kmom04     | Ch 4, 6                                                   |
| Kmom05     | Ch 12, 13, 14                                             |
| Kmom06     |                                                           |
| Kmom10     |                                                           |

Dessutom har varje kursmoment läsanvisningar i artiklar och videos.

-->



Planering och studieplaner {#planering}
---------------------------------------------

Eftersom kursen ges kombinerat på campus och distans så är kursens planering fördelad på ett antal olika dokument. Bekanta dig med dem så att du har koll på hur kursens upplägg fungerar och vilket som är en normaltakt för kursen.

<!--
Kursen har en [veckoplan](./veckoplan) där du få en rekommendation till hur du kursens övergripande planering ser ut och hur du skall lägga upp dina studier, vecka för vecka.
-->

Kursen har en [rekommenderad studieplan](ramverk1/studieplan) som visar en översikt, vecka för vecka, vilket kursmoment som är aktuellt att jobba med. Där finns även rättningsfönster som visar när saker rättas. Följer du denna planeringen så är du i fas med kursens normaltakt.

På Canvas finns datum för inlämningsuppgifter. Ett rättningsfönster pågår normalt sett 15 arbetsdagar efter inlämningsdatum på uppgiften. Inlämningsdatumen på Canvas är ett par dagar senare än vad som visas i den rekommenderade studieplanen, det är för att ge dig lite slack/utrymme för att själv planera dina studier.

Kursen har en [lektionsplan](ramverk1/lektionsplan) som visar när det är lärarledda tillfällen för undervisning/handledning på campus/distans.

Kursen har bokade tillfällen i BTHs schemabokningsprogram, "schemat", som säger när en fysisk sal är bokad på campus. Det finns en länk till det aktuella schemar, via lektionsplanen.



Läromaterial och resurser {#laromaterial}
----------------------------------------

Via [läromaterial](./laromaterial) kan du se en översikt av hur kurstillfället har valt att strukturera läromaterialet och vilka resurser och verktyg som används i undervisningen.

Här finner du även länkar till aktuella video streams och spellistor samt chatter och forum för handledning.



Lärarteam och intressenter {#team}
----------------------------------------

Du kan hitta [detaljer om ett kurstillfälle](./team) och se lärarteamet som utför kurstillfället, deras roller och kontaktuppgifter tillsammans med de som "äger" kursen och kurstillfället och vilka studentgrupper som läser kursen samt övriga intressenter till kurstillfället.



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning).



Ladok {#ladok}
------------------------

Enligt kursplanen finns ett antal ladokmoment och de är kopplade till kursens kursmoment enligt följande.

| Kursens moment  | Ladok moment enligt kursplan  | Betyg |
|-----------------|-------------------------------|-------|
| Kmom01 + kmom02 | Inlämningsuppgift 1 á 2.5hp   | G-U   |
| Kmom03 + kmom04 | Inlämningsuppgift 2 á 2.5hp   | G-U   |
| Kmom05 - kmom10 | Inlämningsuppgift 3 á 2.5hp   | A-F   |

Den sista inlämningen bestämmer kursens slutbetyg vilket utfärdas när samtliga moment godkänts.

Läs mer om [rapportering av resultat](kurser/faq/resultatrapportering).



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [vi jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Från och med hösten 2019 är kursens namn "Webbaserade ramverk och designmönster" med kurskod DV1610 ([se kursplanen](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1610)).

Tidigare var kursens namn "Webbaserade ramverk 1" med kurskod PA1441 ([se kursplan](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1441)).

Kursen är en fristående vidarutveckling av kursen DV1486 "Databasdrivna webbapplikationer med PHP och MVC-ramverk", aka phpmvc ([se kursplan](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1486)).



Versioner av kursen {#versioner}
-----------------------------------------------------

Om du påbörjat den äldre version av kursen så skall du också slutföra denna versionen av kursen (eller göra om den nya kursen från start). Alternativt rådgör du med den som är kursansvarig.

För tillfällen från höstterminen 2018 så [finns kursmaterialet till ramverk1 (v2) här](kurser/ramverk1-v2).

För tillfället under höstterminen 2017, så [finns kursmaterialet till den kursen ramverk1 (v1)](kurser/ramverk1-v1).

Tidigare utgåvor av närbesläktade kurser, innan hösten 2017, finns under [kursen phpmvc](kurser/phpmvc).
