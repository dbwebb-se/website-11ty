---
title: ramverk2-v1
author: mos
revision:
    "2017-12-05": "(B, mos) Uppdaterad med alla kmoms."
    "2017-06-07": "(A, mos) Första revisionen inför kursstart HT2017."
...
Kursen ramverk2 (v1)
==================================

Kursen **Webbaserade ramverk 2**, a.k.a. *ramverk2*, lär ut utveckling, test och driftsättning av applikationer och servrar där flertalet olika ramverk är ingående delar av de applikationer och tjänster som skapar en totallösning.

<!--more-->

Vi bygger en större totallösning där flera klienter kopplas mot en eller flera servrar som bygger på olika tekniker och ramverk. All samverkar för att skapa en total lösning, ett system, enligt en given specifikation.

Vi arbetar med tekniker för virtualisering samt hur test och driftsättning kan ske i molnet i form av mindre tjänster som samverkar en den totala lösningen.

Kursen arbetar med utvecklingsmetoder för testdriven utveckling, automatiserad testning, löpande integrering och driftsättning där rollen som devops beaktas.

Via litteraturstudier, praktiska övningar och ett större avslutningsprojekt ges möjlighet att skapa sig en egen bild av vad koncepten kan innebära för ett webbutvecklingsprojekt.



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> Avklarade kurser inom programmering, databaser och webbprogrammering motsvarande 30hp varav minst 7,5 i programmering med JavaScript.



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* Virtualisering med Docker för utveckling, test och driftsättning.
* Ramverksbaserade serverlösning, backend med JavaScript/PHP.
* Frontendlösningar med web, SPA (single page application) och desktop.
* Kopplingar mot databaser.
* Testdriven utveckling och tekniker för enhetstestning.
* Automatiserad testning och byggning.
* Driftsättning och innebörden av devops.
* Relaterade verktyg och tekniker.



Mål {#mal}
------------------------



###Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* ingående redogöra för webbutveckling baserat på de tekniker som omfattas genom att skriftligen beskriva och sammanfatta erfarenheter och observationer från övningar och projekt.
* kunna visa goda kunskaper i att använda valda tekniker genom att tillämpa dessa tekniker i praktiska övningar och projekt.



###Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* utifrån en specifikation kunna utveckla, dokumentera och presentera ett projekt baserat på flera tjänster och applikationer som samverkar i en större lösning.
* ha god praktisk förmåga att hantera de verktyg och utvecklingsmiljöer som används vid utveckling, test och driftsättningar av molnbaserade lösningar.



###Värderingsförmåga och förhållningssätt {#vardera}

Efter genomförd kurs skall studenten:

* via redovisningstexter kunna visa god förmåga att reflektera över kodstruktur i ramverk och perspektivet fullstack.
* via redovisningar och utförda övningar påvisa god kunskap i rollen som devop.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


###Kmom01: Express {#kmom01}

Vi skall bygga grunden till en applikations/webbplats med hjälp av ramverket Express. Express bygger på Node.js. Webbplatsen får bli vår me-sida och det blir en grund att jobba vidare på i kursen.

Me-sidan får bli ett eget repo på GitHub som vi kopplar ihop med externa tjänster för automatiskt builds och kodkvalitet som blir basen i ett CI-flöde (Continuous integration).

[Instruktion till kursmoment 01](./kmom01).



###Kmom02: Docker {#kmom02}

Vi installerar Docker och gör det till en integrerad del av vårt repo och testmiljö. Det handlar om att använda virtualisering för att köra flera versioner av ett målsystem och använda för att testa koden i ditt repo.

[Instruktion till kursmoment 02](./kmom02).



###Kmom03: Test {#kmom03}

Vi orienterar oss kring olika tekniker och termer inom test och samtidigt bygger vi upp grunden i en testmiljö för JavaScript. Det handlar främst om enhetstestning och kodtäckning samt basen för en CI-kedja (Continuous integration).

Det blir också en introduktion i hur vi kan använda Docker för att köra våra enhetstester mot olika versioner av en målmiljö och vi får möjligheten att skapa våra egna anpassade Docker-images.

[Instruktion till kursmoment 03](./kmom03).



###Kmom04: Realtid {#kmom04}

Vi skall studera realdtisprogrammering i webbsammanhang med webscokets. Vi bygger en enkel chatt för att se hur grunderna fungerar.

Sedan bygger du vidare på din klient/server applikation i JavaScript och integrerar chatten och utvecklar ytterligare realtidsfunktioner.

Avslutningsvis lägger du till stöd för funktionstester som exekveras utifrån en webbläsare.

[Instruktion till kursmoment 04](./kmom04).



###Kmom05: Databas {#kmom05}

Vi skall se hur vi kan jobba med databasen MongoDB, en dokumentorienterad databas som klassas i NoSQL-gruppen av databaser. För att koppla oss till databasen använder vi klienter i terminalen och kod i Node.js, med och utan Express.

Vi knyter samman alla delar med hjälp av Docker. Vi installerar MongoDB i en kontainer och vi kör Express i en egen kontainer och låter de båda kontainrarna kommunicera, samtidigt som vi kan kommunicera direkt med varje kontainer från terminalen.

[Instruktion till kursmoment 05](./kmom05).



###Kmom06: Egen modul {#kmom06}

Som en del i infrastrukturen kring JavaScript finns pakethanteraren npm som erbjuder en hantering av återanvändbara moduler och färdiga program. Från början var npm utvecklat i samband med att Node.js växte fram. Numer ser vi både färdiga program, klient- och server-moduler som distribueras via npm.

Vi dedikerar detta kursmoment till att forma en egen modul som publiceras på npm och som sedan återanvänds i projektet.

[Instruktion till kursmoment 06](./kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](./kmom10).



Kurslitteratur {#litteratur}
----------------------------



###Kurslitteratur {#kurslitteratur}

Kurslitteraturen består av egenskrivna och länkade online-resurser såsom artiklar och guider.

Det finns läsanvisningar i samband med varje kursmoment.



###Referenslitteratur {#referenslitteratur}

Referensdokumentationen är främst olika online-resurser i form av manualer.



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



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

Läser du kursen inom ramen för programmet Webbprogrammering (campus/distans) så finns det en [rekommenderad studieplan inom programmet](program/webbprogrammering/studieplan/termin3) samt en [lektionsplan](program/webbprogrammering/lektionsplan/lasar2/lasperiod2).

Studieplan och lektionsplan finns tillgängligt via kurstillfället på ITs.

Läs mer om den [rekommenderade studieplanen](kurser/faq/rekommenderad-studieplan) och [lektionsplanen](kurser/faq/lektionsplan-och-schema).



Lärarstöd och handledning {#handledning}
----------------------------------------

Schemalagda labbtillfällen, hangouts samt forum och chatt de viktigaste källorna för handledning. Läs om [handledning och hjälp-till-självhjälp](kurser/faq/lararstod-och-handledning).



Ladok {#ladok}
------------------------

Enligt kursplanen finns ett antal ladokmoment och de är kopplade till kursens kursmoment enligt följande.

| Kursens moment  | Ladok moment enligt kursplan  | Betyg |
|-----------------|-------------------------------|-------|
| Kmom01 + kmom02 | Inlämning 1 á 2.5hp           | G-U   |
| Kmom03 + kmom04 | Inlämning 2 á 2.5hp           | G-U   |
| Kmom05 - kmom10 | Inlämning 3 á 2.5hp           | A-F   |

Den sista inlämningen bestämmer kursens slutbetyg vilket utfärdas när samtliga moment godkänts.

Läs mer om [rapportering av resultat](kurser/faq/resultatrapportering).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning). 



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [vi jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Kursens namn är "Webbaserade ramverk 2". Du hittar [kursplanen genom att söka på kurskoden PA1442 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1442).
