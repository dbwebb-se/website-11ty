---
title: dbjs-v2

views:
    block-about: null

author:
    - mos
revision:
    "2018-01-11": (A, mos) Kursen ersätts med kursen databas.
...
Kursen dbjs (v2)
==================================

I samband med utvecklingen av version 2 av dbjs bestämdes att istället sammanfoga kursen med "[kursen databas](kurser/databas-v1)".

<!--stop-->
<!--more-->


Kursen **Webbprogrammering och databaser**, a.k.a. *dbjs*, lär ut traditionell databasteknik med databaser, modellering, SQL tillsammans med databasprogrammering i JavaScript via webbklient och Node.js i Linux-miljö.





[WARNING]
**Kursutveckling pågår inför vt18.**
[/WARNING]

[INFO]
**Tidigare version av kursen**

Om du gick kursen under vårterminen 2017, så finns kursmaterialet i [dbjs version 1](kurser/dbjs-v1).

Version 2 går första gången vårterminen 2018.

Om du påbörjat en äldre version av kursen så skall du också slutföra denna versionen av kursen (eller göra om den nya kursen från start).
[/INFO]



Syfte {#syfte}
------------------------

Kursens syfte är att ge studenten kunskaper i databasutveckling med relationsdatabaser och hur det kan appliceras inom området webbutveckling.  Webbutvecklingen sker på både klient och serversidan med fokus på programmeringsspråket JavaScript.

En viktig komponent i dessa applikationer är utvecklingen av själva databasen där aspekter såsom modellering och design, prestanda och svarstider, samt strukturerad programmering och utbyggbarhet är viktiga komponenter.

Studenten får här en grundlig genomgång i ämnet, både teoretisk och praktisk, som syftar till att studenten självständigt skall förstå och lära sig använda processen att modellera och implementera en databasapplikation.



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> För tillträde till kursen krävs att den studerande har avklarat 7,5 högskolepoäng i programmering.



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* Databasteknik allmän orientering
* Relationsmodellen och relationsdatabaser
* Databasmodellering
* ER (Entity Relationship) modellering
* Normalisering
* Relationsalgebra
* SQL (Structured Query Language) (skapa,modifiera och använda databastabeller)
* Stored Procedures och Triggers (aktiva databaser)
* Transaktioner
* Prestanda och index.
* Programmering med JavaScript på klient och serversidan
* Att koppla JavaScript till relationsdatabaser
* Verktyg och tekniker för utveckling och test



Mål {#mal}
------------------------



###Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* vara väl bevandrad i relationsdatabaser och ha en övergripande förståelse för dess användning och dess fördelar och nackdelar



###Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* ha en grundlig, både teoretisk och praktisk,förmåga att använda relationsdatabaser
* i detalj förstå och applicera processen att utveckla en databas från en problemställning till färdig klientapplikation
* strukturerat och i detalj modellera och dokumentera en databas i form av en ER modell
* utifrån en befintlig modell, praktiskt skapa och förändra samt använda en databas med SQL
* designa och implementera en väl fungerande databasapplikation med tillhörande (client/server) klientapplikation



###Värderingsförmåga och förhållingssätt {#vardering}

Efter genomförd kurs skall studenten:

* översiktligt förstå, kunna förklara samt argumentera kring databaser och databashanteringssystem i allmänhet.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


###Kmom01: JavaScript klient {#kmom01}


Det blir inledningsvis en del labbmiljö för att komma igång med kursen, så vi börjar med att få saker på plats, samtidigt som vi bekantar oss med de olika teknologier som kursen hanterar.

Det blir en introduktion till programmeringsspråket JavaScript och hur det används i webbläsaren tillsammans med HTML och CSS. Det blir fokus på JavaScript och minimalt med HTML och CSS.

[Instruktion till kursmoment 01](kurser/dbjs-v2/kmom01).



###Kmom02: Databas {#kmom02}

Då dyker vi in i databaser tillsammans med SQL och ER-modellering. Jag har valt att introducera databasen SQLite som är en filbaserad databas. En filbaserad databas förenklar hanteringen eftersom databasen ligger i en enda fil och det finns inga användare eller behörigheter att konfigurera.

[Instruktion till kursmoment 02](kurser/dbjs-v2/kmom02).



###Kmom03: JavaScript server {#kmom03}

De blir kodning på serversidan och där har vi valt Node.js och JavaScript. Vi behöver starta med att installera Node.js på servern och komma igång med hur Node.js fungerar. Vi ser hur man byggger upp en enkel webbserver, eller webbtjänst, med Node.js.

När vi fått ordning på Node.js och en enkel server så börjar vi koppla upp oss mot databasen. Vi fortsätter med SQLite ett tag till.

[Instruktion till kursmoment 03](kurser/dbjs-v2/kmom03).



###Kmom04: MySQL {#kmom04}

Då går vi vidare till databasen MySQL och dess olika klienter samt prövar att använda SQL tillsammans med MySQL. Du får jobba igenom en övning i SQL som tar dig från de enklare konstruktionerna till mer utmanande saker som subqueries och `RIGHT/LEFT OUTER JOIN`. När övningen är slut så har du både kommit in i MySQL och bekantat dig med ytterligare varianter av SQL.

Du kommer även jobba vidare med JavaScript, Node.js och se hur du kan koppla dig till en MySQL databas.

[Instruktion till kursmoment 04](kurser/dbjs-v2/kmom04).



###Kmom05: Procedur, trigger, funktioner {#kmom05}

Kursmomenten handlar dels om att programmera en databas med transaktioner, lagrade procedurer, triggers och inbyggda funktioner.

I kursmomentet introduceras också en webbserver för Node.js i form av Express. Du kommer igång med Express och ser hur du kan bygga upp en webb/RESTFul server och hur du kan skriva din applikationskod för att till exempel komma åt en databas och visa och uppdatera dess innehåll.

[Instruktion till kursmoment 05](kurser/dbjs-v2/kmom05).



###Kmom06: Index och prestanda {#kmom06}

Detta kursmoment erbjuder en introduktion till hur databasen internt jobbar för att optimera de SQL-frågor du skriver och hur du bör använda index för att optimera din databas.

[Instruktion till kursmoment 06](kurser/dbjs-v2/kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](kurser/dbjs-v2/kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?



###Kurslitteratur {#kurslitteratur}

Det finns läsanvisningar i samband med varje kursmoment.

* **[Databasteknik](kunskap/boken-databasteknik)** -- Radron-McCarthy och Risch  
    Komplett med det man vill veta om databasteknik, både grunder, modellering och SQL. En databasbok helt enkelt. 

* **[Speaking JavaScript: An In-Depth Guide for Programmers](kunskap/boken-speaking-javascript)** -- Axel Rauschmayer  
    En bok om att komma igång med JavaScript som programmeringsspråk. Fungerar för nya programmerare såväl som för de som redan kan ett eller ett par programmeringsspråk.

* **[Exploring ES6](kunskap/boken-exploring-es6)** -- Axel Rauschmayer  
    En bok om ES6 som bygger vidare på att man kan ES5.



###Referenslitteratur {#referenslitteratur}

Referensdokumentationen är främst olika online-resurser i form av manualer.



<!--
Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment.

| Kursmoment | Databasteknik          | Javascript                          |
|------------|------------------------|-------------------------------------|
| Kmom01     |                        |                                     |
| Kmom02     |                        |                                     |
| Kmom03     |                        |                                     | 
| Kmom04     |                        |                                     |
| Kmom05     |                        |                                     | 
| Kmom06     |                        |                                     | 
| Kmom10     |                        |                                     |

Dessutom har varje kursmoment läsanvisningar i artiklar och videos. 

-->



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

<!--
Läser du kursen inom ramen för programmet Webbprogrammering (campus/distans) så finns det en [rekommenderad studieplan inom programmet](program/webbprogrammering/studieplan/termin2).

Läser du kursen som en del i ett kurspaket så finns det en [studieplan som är kopplad till kurspaketet](webutv#studieplan).

För dig som studerar kursen som enskild kurs finns det en [rekommenderad studieplan](linux/studieplan) kopplad till de kurstillfällen som erbjuds.
-->

Det finns en [rekommenderad studieplan](kurser/dbjs-v2/studieplan) kopplad till de kurstillfällen som erbjuds.

Det finns även en lektionsplan som du får i samband med kursstart. Lektionsplanen visar de tillfällena som är schemalagda träffar.

Finns det en lektionsplan så finns ofta bokningar av salar gjorda i bokningsschemat.

Studieplan, eventuell lektionsplan och eventuellt schema finns tillgängligt via kurstillfället på ITs.

Läs mer om den [rekommenderade studieplanen](kurser/faq/rekommenderad-studieplan) och [lektionsplanen](kurser/faq/lektionsplan-och-schema).



Lärarstöd och handledning {#handledning}
----------------------------------------

Schemalagda labbtillfällen, hangouts samt forum och chatt de viktigaste källorna för handledning. Läs om [handledning och hjälp-till-självhjälp](kurser/faq/lararstod-och-handledning).



Ladok {#ladok}
------------------------

Enligt kursplanen finns ett antal ladokmoment och de är kopplade till kursens kursmoment enligt följande.

| Kursens moment  | Ladok moment enligt kursplan  |
|-----------------|-------------------------------|
| Kmom01 + kmom02 | Inlämningsuppgift 1 á 2.5hp   |
| Kmom03 + kmom04 | Inlämningsuppgift 2 á 2.5hp   |
| Kmom05 + kmom06 | Inlämningsuppgift 3 á 2.5hp   |
| Kmom07 - kmom10 | Inlämningsuppgift 4 á 2.5hp   |

Totalt omfattar kursen 10hp.

Läs mer om [rapportering av resultat](kurser/faq/resultatrapportering).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning). 



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [vi jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Du hittar [kursplanen genom att söka på kurskoden PA1444 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1444).
