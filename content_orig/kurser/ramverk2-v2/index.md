---
title: ramverk2-v2
author: mos
revision:
    "2018-06-08": "(prel, mos) Nytt dokument inför uppdatering av kursen."
    "2017-12-05": "(B, mos) Uppdaterad med alla kmoms."
    "2017-06-07": "(A, mos) Första revisionen inför kursstart HT2017."
...
Kursen ramverk2 (v2)
==================================

Kursen **Webbaserade ramverk 2**, a.k.a. *ramverk2*, lär ut utveckling, test och driftsättning av applikationer och servrar där flertalet olika ramverk är ingående delar av de applikationer och tjänster som skapar en totallösning.

<!--more-->

[WARNING]

** Kursutveckling pågår till kurs ramverk2 v2 **

Kursstart våren 2019.

[/WARNING]



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

* Ramverksbaserade serverlösning, backend med JavaScript.
* Ramverksbaserad frontend.
* * Virtualisering med Docker för utveckling, test och driftsättning.
* Kopplingar mot databaser av SQL och NoSQL.
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
* via redovisningar och utförda övningar påvisa god kunskap i rollen som devops.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


### Kmom01: Backend {#kmom01}

Först ser vi till att skaffa oss en server där vi under kursens gång ska driftsätta ett antal olika micro-services och klienter. Vi installerar en webbserver och skapar ett första utkast till en service för redovisningstexter.

[Instruktion till kursmoment 01](./kmom01).



### Kmom02: Frontend {#kmom02}

Vi tittar på hur vi kan använda JavaScript ramverk på klientsidan för att skapa en Single Page Applikation (SPA) som pratar med servicen från kmom01.

Vi utvärderar vilka möjligheter vi har vid val av ramverk och väljer det ramverk, som efter noggrant studerande står som vinnare.

[Instruktion till kursmoment 02](./kmom02).



### Kmom03: Docker & test {#kmom03}

Vi installerar Docker och gör det till en integrerad del av vårt repo och testmiljö. Det handlar om att använda virtualisering för att köra flera versioner av ett målsystem och använda för att testa koden i ditt repo.

Vi tittar på hur vi kan använda enhetstestning för att säkerställa att de minsta beståndsdelar i vår kod gör som det är tänkt.

[Instruktion till kursmoment 03](./kmom03).



### Kmom04: Funktions- och systemtest {#kmom04}

Vi orienterar oss kring olika tekniker och termer inom test och samtidigt bygger vi vidare på en testmiljö för JavaScript. Det handlar främst om funktionstestning och hur vi testar fullständiga router i vårt API.

Det blir också en introduktion i hur vi kan använda Selenium för att testa våra klienter på ett automatiserad sätt.

[Instruktion till kursmoment 04](./kmom04).



### Kmom05: Realtid {#kmom05}

Vi skall studera realtidsprogrammering i webbsammanhang med WebSocket. Vi tittar på grunderna i websockets och ser hur klienter och servrar byggs upp med. Vi tittar på en echo-server och en broadcast-server och vi avslutar med att bygge en enkel chatt för att göra vårt eget applikationsprotokoll ovanpå websockets. Chatten integrerar vi i vår redovisa sida.

[Instruktion till kursmoment 05](./kmom05).



### Kmom06: Dokumentorienterad databas {#kmom06}

Vi skall se hur vi kan jobba med databasen MongoDB, en dokumentorienterad databas som klassas i NoSQL-gruppen av databaser. För att koppla oss till databasen använder vi klienter i terminalen och kod i Node.js, med och utan Express.

Vi knyter samman alla delar med hjälp av Docker. Vi installerar MongoDB i en kontainer och vi kör Express i en egen kontainer och låter de båda kontainrarna kommunicera, samtidigt som vi kan kommunicera direkt med varje kontainer från terminalen.

[Instruktion till kursmoment 06](./kmom06).



### Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](./kmom10).



Kurslitteratur {#litteratur}
----------------------------



###Kurslitteratur {#kurslitteratur}

Kurslitteraturen består av egenskrivna och länkade online-resurser såsom artiklar och guider.

Det finns läsanvisningar i samband med varje kursmoment.



###Referenslitteratur {#referenslitteratur}

Referensdokumentationen är främst olika online-resurser i form av manualer.



Rekommenderad studieplan {#schema}
---------------------------------------------

Läser du kursen inom ramen för programmet Webbprogrammering (campus/distans) så finns det en [rekommenderad studieplan inom programmet](program/webbprogrammering/studieplan/termin3).

Studieplanen finns tillgängligt via kurstillfället på Canvas.

Läs mer om den [rekommenderade studieplanen](kurser/faq/rekommenderad-studieplan).

Då kursen enbart går på distans finns inga schemalagda lektioner, men video material samt forum och chatt används som undervisningsmetoder.



Lärarstöd och handledning {#handledning}
----------------------------------------

Video material, forum och chatt är de viktigaste källorna för handledning. Läs om [handledning och hjälp-till-självhjälp](kurser/faq/lararstod-och-handledning).



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



Kursvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursvärderingar och kursutveckling sker. Det är oerhört viktigt att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [vi jobbar med kursvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

<!-- JavaScript-baserade webbramverk, 7,5 hp (ska ersätta PA1442) -->

Kursens namn är "Webbaserade ramverk 2". Du hittar [kursplanen genom att söka på kurskoden PA1442 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1442).
