---
views:
    flash:
        region: flash
        template: default/image
        data:
            src: "image/snapvt18/bank2-account-actions.png?w=1100&h=300&cf&c=600,270,0,0&f=grayscale&f1=smooth,-8&f2=pixelate,4,1"
title: databas-v1
author: mos
revision:
    "2021-01-14": "(H, mos) Video för kursintroduktion."
    "2020-12-22": "(G, mos) Ny struktur på planering, läromaterial och team."
    "2019-03-05": "(F, mos) Uppdaterat kmom10 för våren 2019."
    "2018-12-19": "(E, mos) Uppdaterat läsanvisning utgåva 2 av kursbok."
    "2018-11-29": "(D, mos) Uppdaterad med nya kurskoder till vt19."
    "2018-09-20": "(C, mos) Förbereder inför ny kurskod till vt19."
    "2018-02-27": "(B, mos) Inkluderad i Webbprogrammering från vt18 lp4."
    "2018-01-11": "(A, mos) Första utgåva inför kursstart VT2018."
...
Kursen databas (v1)
==================================

Kursen **Databasteknologier för webben**, a.k.a. *databas*, och syftet är att studenten ska förstå och lära sig modellera och implementera en databas samt utveckla en webbapplikation som använder databasen. Som applikationsspråk används serverbaserad JavaScript i webbmiljö.

Kursen erbjuds även under namnet "Webbprogrammering och databaser" med en alternativ kurskod.

<!--more-->

Läs vidare för en översikt för kursens innehåll, struktur och planering.



Kursintro {#pres}
------------------------

Här är en video som "pratar" dig igenom kursens upplägg och delar av innehållet i detta dokumentet.

[YOUTUBE src="ia-CE0mxcZI" width=700 caption="Kursintroduktion till kursen databas med Mikael."]



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> Genomgångna kurser motsvarande 15hp programmering och/eller webbteknologier.



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* Databasteknik
* Relationsmodellen och alternativa modeller.
* Databasmodellering
* SQL
* SQL med lagrade procedurer, funktioner och triggers.
* SQL med index.
* Applikationsprogrammering med databaser.
* Applikationsprogrammering i webbmiljö med programmeringsspråket JavaScript på serversidan med Node.js med inslag av HTML och CSS.
* Verktyg och tekniker för utveckling och test.



Mål {#mal}
------------------------

Följande är kursens mål, indelat i undergrupper.



### Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* vara väl bevandrad i relationsdatabaser och ha en övergripande förståelse för dess användning, fördelar och nackdelar.



### Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* ha en grundlig, både teoretisk och praktisk, förmåga att förstå och använda relationsdatabaser
* i detalj förstå och applicera processen att utveckla en databas från en problemställning till färdig klientapplikation i webbmiljö
* strukturerat och i detalj modellera och dokumentera en databas i form av en ER modell
* utifrån en befintlig modell, praktiskt skapa och förändra samt använda en databas med SQL
* designa och implementera en väl fungerande databasapplikation i webbmiljö



### Värderingsförmåga och förhållningssätt {#vardera}

Efter genomförd kurs skall studenten:

* översiktligt förstå, kunna förklara samt allmänt kunna argumentera kring databaser, databashanteringssystem och hur dessa implementeras i en webbaserad miljö.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


### Kmom01: Databas {#kmom01}

Vi introduceras till databasen MySQL och dess olika klienter samt lär oss använda SQL tillsammans med MySQL. Du får jobba igenom en övning i SQL som introducerar dig i grundläggande konstruktioner för att skapa och uppdatera en databas.

Du får pröva att använda tre olika klienter till MySQL, alla tre har sin plats och användningsområde vid olika tillfällen.

[Instruktion till kursmoment 01](./kmom01).



### Kmom02: SQL {#kmom02}

Vi jobbar vidare med SQL och tränar på enklare konstruktionerna och mer utmanande saker som vyer, subqueries, UNION och JOIN.

Du kommer även börja jobba med JavaScript och Node.js för att se hur du kan koppla dig till en MySQL databas via ett applikationsspråk. Detta innebär att du behöver installera en labbmiljö med Node.js och pakethanteraren npm samt att du kommer igång med grunderna i programmeringsspråket JavaScript och specifikt hur JavaScript används tillsammans med Node.js.

[Instruktion till kursmoment 02](./kmom02).



### Kmom03: ER-modellering {#kmom03}

Vi övar i hur man modellerar och bygger upp en databas, det som kallas Entity-Relationship modelling, ER-modellering, eller bara databasmodellering. Vi delar in modelleringen i konceptuell, logisk och fysisk modellering. Vi börjar med att fokusera på den konceptuella delen av modelleringen.

Vi jobbar vidare med SQL och tränar mer på utmanande saker som subqueries, JOIN och LEFT/RIGHT OUTER JOIN.

Vi bygger vidare på våra terminalskript i JavaScript och Node.js och bygger en menydriven klient som kan utföra olika saker mot databasen.

[Instruktion till kursmoment 03](./kmom03).



### Kmom04: Transaktioner {#kmom04}

Kursmomenten hanterar begreppet transaktioner i en databas.

I kursmomentet introduceras också en webbserver för Node.js i form av Express. Du kommer igång med Express och ser hur du kan bygga upp grunderna i en webbtjänst och hur du kan skriva din applikationskod för att komma åt en databas, visa rapporter och uppdatera innehåll.

Vi sluför ER-modellen med fokus på logisk och fysisk modellering. Den resulterande databasen implementeras och vi använder Express för att skapa ett webbaserat gränssnitt. Vi bygger en terminalklient för att skapa ett textbaserat gränssnitt mot databasen.

[Instruktion till kursmoment 04](./kmom04).



### Kmom05: Procedur och trigger {#kmom05}

Det handlar om att programmera en databas med <!--inbyggda integritetsregler, -->lagrade procedurer och triggers. Dessa konstruktioner ger oss ökade möjligheter att formulera vår SQL-kod. Det ger oss också möjligheten till inkapsling av SQL-koden och publicera ett API som kan användas av de klienter som vill åt databasen.

Vi bygger vidare på vår databasdrivna applikationsserver och utvecklar terminalklienten parallellt med webbklienten.

Vi ser hur man bygger upp en CRUD-baserad webbklient med HTML-formulär som ger användaren möjlighet att skapa nya rader i databasen, ta bort dem, redigera dem och visa dem. CRUD står för Create, Read, Update, Delete.

[Instruktion till kursmoment 05](./kmom05).



### Kmom06: Prestanda {#kmom06}

Vi fortsätter med programmering i databasen, denna gången med egendefinierade funktioner som har en liknande struktur som lagrade procedurer och triggers.

Vi studerar hur databasen jobbar internt för att optimera SQL-frågor och hur index kan användas för att optimera databasen.

Vi jobbar vidare med terminal- och webbaserade klienter mot databasen och fortsätter att implementera vår eshop.

[Instruktion till kursmoment 06](./kmom06).



### Kmom07/10: Examination och redovisning {#kmom10}

Avslutningsvis gör du en individuell och sjävständig examination via ett obligatorisk tentamen och ett optionellt projekt tillsammans med en redovisning. Inlämningen är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](./kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?



### Kurslitteratur {#kurslitteratur}

Det finns läsanvisningar i samband med varje kursmoment.

* **[Databasteknik](kunskap/boken-databasteknik)** -- Radron-McCarthy och Risch  
    Komplett med det man vill veta om databasteknik, både grunder, modellering och SQL. En databasbok helt enkelt.

* **[Speaking JavaScript: An In-Depth Guide for Programmers](kunskap/boken-speaking-javascript)** -- Axel Rauschmayer  
    En bok om att komma igång med JavaScript som programmeringsspråk. Fungerar för nya programmerare såväl som för de som redan kan ett eller ett par programmeringsspråk.

* **[Exploring ES6](kunskap/boken-exploring-es6)** -- Axel Rauschmayer  
    En bok om ES6 som bygger vidare på att man kan ES5.


<!--
### Referenslitteratur {#referenslitteratur}

Referensdokumentationen är främst olika online-resurser i form av manualer.
-->


### Övrig litteratur {#ovriglitteratur}

I varje kursmoment kan det tillkomma läsanvisningar i till exempel artiklar, manualer och webbmaterial.



Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment.

| Kursmoment | Databasteknik      | Javascript ES5 | JavaScript ES6 |
|------------|--------------------|----------------|----------------|
| Kmom01     | 1, 7, 29           |                |                |
| Kmom02     | 8, 21 (11)         | 1, 13          | 4              |
| Kmom03     | 2, 4, 5, 6 (3, 12) |                |                |
| Kmom04     | 24 (25)            |                |                |
| Kmom05     | 13, 15, 16         |                |                |
| Kmom06     | 9, 22 (23)         |                |                |
| Kmom10     |                    |                |                |

Varje kursmoment kan ha ytterligare läsanvisningar i artiklar, video och annat studiematerial.



Planering och studieplaner {#planering}
---------------------------------------------

Eftersom kursen ges kombinerat på campus och distans så är kursens planering fördelad på ett antal olika dokument. Bekanta dig med dem så att du har koll på hur kursens upplägg fungerar och vilket som är en normaltakt för kursen.

<!--
Kursen har en [veckoplan](./veckoplan) där du få en rekommendation till hur du kursens övergripande planering ser ut och hur du skall lägga upp dina studier, vecka för vecka.
-->

Kursen har en [rekommenderad studieplan](databas/studieplan) som visar en översikt, vecka för vecka, vilket kursmoment som är aktuellt att jobba med. Där finns även rättningsfönster som visar när saker rättas. Följer du denna planeringen så är du i fas med kursens normaltakt.

På Canvas finns datum för inlämningsuppgifter. Ett rättningsfönster pågår normalt sett 15 arbetsdagar efter inlämningsdatum på uppgiften. Inlämningsdatumen på Canvas är ett par dagar senare än vad som visas i den rekommenderade studieplanen, det är för att ge dig lite slack/utrymme för att själv planera dina studier.

Kursen har en [lektionsplan](databas/lektionsplan) som visar när det är lärarledda tillfällen för undervisning/handledning på campus/distans.

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

Läs om hur betyget sätts i [grunder för bedömning och betygsättning (tentamen + projekt)](kurser/faq/bedomning-och-betygsattning-tentamen-och-projekt).



Ladok {#ladok}
------------------------

Enligt kursplanen finns ett antal ladokmoment och de är kopplade till kursens kursmoment enligt följande.

| Kursens moment  | Ladok moment enligt kursplan      | Betyg |
|-----------------|-----------------------------------|-------|
| Kmom01 + kmom02 | Inlämningsuppgift 1 á 2.5hp (3hp) | G-U   |
| Kmom03 + kmom04 | Inlämningsuppgift 2 á 2.5hp (3hp) | G-U   |
| Kmom05 - kmom10 | Inlämningsuppgift 3 á 2.5hp (4hp) | A-F   |

Den sista inlämningen bestämmer kursens slutbetyg vilket utfärdas när samtliga moment godkänts.

Poängen inom parantes gäller kurskoden DV1605 för SE-programmet som läser kursen som en 10hp kurs då de inte har några förkunskaper i webbområdet.

Läs mer om [rapportering av resultat](kurser/faq/resultatrapportering).



Fusk och plagiering {#fusk}
-----------------------------------------------------

När läraren misstänker att en student har fuskat så anmäls det till Disciplinnämnen.

Läs om "[Fusk, plagiering, medveten vilseledande](kurser/faq/fusk-och-disciplinarende)" så du är medveten om kursens syn på dessa saker.



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [vi jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Kursen ges under olika kurskoder till olika målgrupper.



### Aktuella kursnamn och kurskoder {#kurskod}

Från våren 2019 får kurserna nya kurskoder och uppdaterade kursplaner.

Kurspaket och programmet Webbprogrammering läser kursen under namnet "Databasteknologier för webben" och kurskoden DV1606. Du hittar [kursplanen genom att söka på kurskoden DV1606 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1606).

För programmet Software Engineering heter kursen "Webbprogrammering och databaser" och kurskoden är DV1605. Du hittar [kursplanen genom att söka på kurskoden DV1605 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1605).



### Tidigare utgåvor av kursen {#tidkurskod}

Följande gällde till och med 2018.

Kursens namn är "Databasteknologier för webben" för programmet Webbprogrammering och kurspaketet webprog (från VT18). Du hittar [kursplanen genom att söka på kurskoden PA1451 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1451).

Kursens namn är "Webbprogrammering och databaser" till programmen Software Engineering och International Software Engieering (från VT17). Du hittar [kursplanen genom att söka på kurskoden PA1444 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1444).
