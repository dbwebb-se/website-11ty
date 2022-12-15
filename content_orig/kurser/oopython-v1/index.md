---
title: oopython-v1
author:
    - lew
    - mos
revision:
    "2017-11-10": (C, mos) Utkast till v2.
    "2016-11-28": (B, mos) Text till kursplanen.
    "2016-04-12": (A, lew) Första versionen.
...
Kursen oopython (v1)
===================================================

Kursen **Objektorienterad design och programmering med Python**, a.k.a. *oopython*, lär ut objektorienterad analys och design tillsammans med objektorienterad programmering med Python.

Kursen använder sig till stor del av webbaserade teknologier och programmen som skapas publiceras på en webbserver.

<!--more-->



[INFO]
**Nyare version av kursen**

Detta dokument är version 1 av oopython. Denna version av kursen gavs vårterminen 2017.

Från och med vårterminen 2018 är kursen förändrad till [oopython version 2](kurser/oopython-v2).

Om du påbörjat en äldre version av kursen så skall du också slutföra denna versionen av kursen (eller göra om den nya kursen från start).
[/INFO]



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> Programmeringskurs i Python 7.5hp.




Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* Objektorienterade programmeringstekniker i Python.
* Objektorienterad analys och design med UML.
* Objektorienterade programmeringskonstruktioner.
* Webbaserade teknologier för att bygga webbtjänster med Python.
* Utvecklingsmiljö och verktyg för programvaruutveckling med Python samt publicera kod på en driftserver och visa resultat via webbsidor



Mål {#mal}
------------------------



###Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* påvisa grundläggande kunskaper i problemlösning med objektorienterad programmering i Python genom att skriftligen beskriva och sammanfatta erfarenheter och observationer från övningar och projekt.
* påvisa grundläggande kunskaper i att använda objektorienterade tekniker i webbmiljö genom att tillämpa dem i praktiska övningar och projekt.



###Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* självständigt, utifrån en specifikation, kunna utveckla en webbaserad objektorienterad lösning i Python samt dokumentera och via text kunna presentera denna lösning.
* ha god praktisk förmåga att hantera de verktyg och utvecklingsmiljöer som används vid utveckling och felsökningar med Python i webbmiljö.



###Värderingsförmåga och förhållningssätt {#formaga}

* påvisa god förmåga att välja mellan objektorienterad programmering kontra procedurell programmering vid en given problemställning.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida.


###Kmom01: Kom igång med objekt och Flask {#kmom01}

Vi rivstartar med grundstrukturen för objekt, debuggern och hur man kan skapa en webbsida med routes i ramverket Flask.

[Instruktion till kursmoment 01](kurser/oopython-v1/kmom01).



###Kmom02: UML och unittest {#kmom02}

Vi jobbar vidare med vår me-sida i Flask. Till det kikar vi lite på UML diagram och unittest. Några verktyg som är bra att känna till i en produktionsmiljö.

[Instruktion till kursmoment 02](kurser/oopython-v1/kmom02).



###Kmom03: Autogenerering av UML och dokumentation {#kmom03}

I Python finns det verktyg och moduler för att autogenerera UML-diagram och dokumentation. Vi ska titta närmare på dem, samtidigt som vi jobbar vidare med me-sidan i Flask.

[Instruktion till kursmoment 03](kurser/oopython-v1/kmom03).



###Kmom04: Regex och databaser {#kmom04}

[Regex, regexp eller reguljära uttryck](https://sv.wikipedia.org/wiki/Regulj%C3%A4ra_uttryck) används för att hantera strängmatchning på olika sätt. Vi ska även utöka me-sidan med en databas.

[Instruktion till kursmoment 04](kurser/oopython-v1/kmom04).



###Kmom05: Sorteringsalgoritmer och datastrukturer {#kmom05}

Inom programmering finns några grundläggande sorteringsalgoritmer. Vi ska kika på dem samt titta närmare på datastrukturer och rekursion.

[Instruktion till kursmoment 05](kurser/oopython-v1/kmom05).



###Kmom06: Bokningssystem {#kmom06}

Det här är ett praktiskt kursmoment. Vi ska ska öva på att arbeta med flera klasser samtidigt och interagera mellan dem.

[Instruktion till kursmoment 06](kurser/oopython-v1/kmom06).



###Kmom07/10: Projekt och examination {#kmom10}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 10](kurser/oopython-v1/kmom10).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?

Det finns en [översikt av kurslitteratur per kurs](kunskap/oversikt-av-kurslitteratur-per-kurs).



###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har jag valt följande bok, tillsammans med ett antal artiklar som finns tillgängliga på nätet.

Det finns läsanvisningar i samband med varje kursmoment.


* **[Python 3 Object-oriented Programming](kunskap/boken-python3-object-oriented-programming)** -- Dusty Phillips  
  En introduktionsbok med öppen licens som gör att boken finns tillgänglig fritt på bokens webbplats. Boken ger en bra introduktion till nybörjaren i Python. Boken går även in på objektorienterad programmering med klasser, objekt och arv. Det är huvudsakligen de delarna vi ska använda oss utav.



###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha till hands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter.


* **[A Byte of Python](http://python.swaroopch.com)** -- Swaroop C H  
  En intro-bok till Python 3. Den tar upp grunderna i Python men även en del objekt-orienterad programmering. Bra format och bra exempel. Det relevanta i boken hittas i kapitel 13.



Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment.

| Kursmoment | Python 3 Object-oriented Programming |
|------------|--------------------------------------|
| Kmom01     | Ch 1, 2                              |
| Kmom02     | Ch 3, 5, 12                          |
| Kmom03     |                                      |
| Kmom04     | Ch 8 - Regular Expressions           |
| Kmom05     | Ch 7 - Queues                        |
| Kmom06     | Ch 6                                 |
| Kmom10     |                                      |

Dessutom har varje kursmoment läsanvisningar i artiklar och videos.



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

Läser du kursen inom ramen för programmet Webbprogrammering (campus/distans) så finns det en [rekommenderad studieplan inom programmet](program/webbprogrammering/studieplan/termin2).

<!--
Läser du kursen som en del i ett kurspaket så finns det en [studieplan som är kopplad till kurspaketet](webutv#studieplan).

För dig som studerar kursen som enskild kurs finns det en [rekommenderad studieplan](python/studieplan) kopplad till de kurstillfällen som erbjuds.
-->

Vissa av kurstillfällena har även en lektionsplan som du får i samband med kursstart. Lektionsplanen visar de tillfällena som är schemalagda träffar.

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
| Kmom01 + kmom02 | Uppgift 1 á 2.5hp             |
| Kmom03 + kmom04 | Uppgift 2 á 2.5hp             |
| Kmom05 - kmom10 | Projekt á 2.5hp               |

Läs mer om [rapportering av resultat](kurser/faq/resultatrapportering).



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/bedomning-och-betygsattning). 



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för mig att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur [jag jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Du hittar [kursplanen genom att söka på kurskoden PA1437 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=PA1437).
