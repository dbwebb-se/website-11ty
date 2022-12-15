---
title: webgl
author:
  - mos
  - efo
revision:
    "2018-10-08": (E, efo) Uppdaterad inför ht18.
    "2016-10-19": (D, mos) Lade till rekommenderad studieplan.
    "2015-11-29": (C, mos) Justerade namnen på kursmomenten.
    "2015-10-11": (B, mos) Uppdateringar om respektive kursmoment.
    "2015-10-07": (A, mos) Första preliminära revision inför kursstart HT2015.
...
Kursen "webgl"
==================================

Kursen **Spelteknik för webben**, a.k.a. *webgl*, introducerar dig till webbteknologier för att jobba med 3D programmering i WebGL. Du får lära dig de grunder i JavaScript, HTML och CSS som krävs för att du skall kunna använda dina befintliga kunskaper i OpenGL och applicera dem i WebGL och 3D-programmering för webben.

<!--more-->

För att implementera ett webbaserat datorspel krävs en process där ett flertal olika tekniker samverkar. Kunskaper om hur, när och varför olika tekniker
kan och bör nyttjas påverkar till hög grad i samtliga utvecklingsstadier. Kursen syftar till att studenten skall förstå hur spelteknik kan appliceras, utan direkta plattformsrestriktioner, inom ramarna för webbutveckling.



Förkunskaper {#forkunskaper}
------------------------

Det formella förkunskapskravet är:

> Avklarat 15 högskolepoäng programmering, 6 högskolepoäng linjär algebra samt 7,5 högskolepoäng 3D-programmering.



Innehåll {#innehall}
------------------------

Kursen omfattar följande områden:

* Samverkan mellan olika webbtekniker lämpade för spelutveckling.
* Analys, design och implementation av speltekniker för webben.



Mål {#mal}
------------------------



###Kunskap och förståelse {#kunskap}

Efter genomförd kurs skall studenten:

* övergripande kunna beskriva metoder och tekniker som är relevanta inom ämnet.
* övergripande kunna redogöra för skillnader och likheter mellan olika webbtekniker.



###Färdighet och förmåga {#fardighet}

Efter genomförd kurs skall studenten:

* ha förmåga att presentera och självständigt kunna förklara hur, när och varför olika webbtekniker kan och bör samverka.
* självständigt, utifrån en problembeskrivning, kunna implementera en enklare 3D-applikation för webben.



###Värderingsförmåga och förhållningssätt {#vardering}

Efter genomförd kurs ska studenten:

* ha förmåga att argumentera kring för- och nackdelar med olika webbtekniker.



Kursmoment {#kursmoment}
------------------------

Kursen är uppdelad i kursmoment där varje kursmoment uppskattas till 20h studerande i form av programmering, undersökning, läsande, övningar, uppgifter, redovisning och eftertanke. Alla kursmoment skall redovisas och du samlar alla redovisningar i din me-sida som blir en webbplats som samlar ditt resultat från kursen.


###Kmom01: JavaScript och WebGL {#kmom01}

Du kommer igång med en labb- och utvecklingsmiljö som stödjer utveckling av HTML, CSS och JavaScript tillsammans med WebGL. Du övar programmering i JavaScript och du skapar ditt första 3D objekt i webbläsaren.

[Instruktion till kursmoment 01](webgl/kmom01).



###Kmom02: Animering och trianglar {#kmom02}

Vi fördjupar oss i programmering med JavaScript genom att läsa på om dess grundstrukturer samt testar dem i en laboration. Därefter ser vi kan förbättra vår sandbox med animeringar och helskärmsläge. Du fortsätter studera WebGL och ritar trianglar som du styr med musen och du skapar enklare animationer.

[Instruktion till kursmoment 02](webgl/kmom02).



###Kmom03: Kuber och texturer {#kmom03}

Du fortsätter att öva på programmering med JavaScript. Denna gången är det fokus på arrayer och objekt. Samtidigt fördjupar du dig i WebGL med texturer, MVP-matrisen och du ritar kuber i en 3D-värld.

[Instruktion till kursmoment 03](webgl/kmom03).



###Kmom04/05: Projekt och examination {#kmom05}

Avslutningsvis gör du ett projekt enligt en specifikation. Projektet är det sista som du gör och tillsammans med alla redovisningar som finns på din me-sida så används detta som underlag för att examinera dig från kursen.

[Instruktion till kursmoment 04](webgl/kmom05).



Kurslitteratur {#litteratur}
----------------------------

[Måste jag skaffa kurslitteraturen](kurser/maste-jag-skaffa-kurslitteraturen)?

Boken är central i kursen och övningarna förutsätter att du har läst de kapitel som avses.



###Kurslitteratur {#kurslitteratur}

Som kurslitteratur har vi valt följande bok, tillsammans med ett antal artiklar som finns tillgängliga på nätet.

Det finns läsanvisningar i samband med varje kursmoment.


* **[WebGL Programming Guide](kunskap/boken-webgl-programming-guide)** -- Kouichi Matsuda, Rodger Lea
  Boken går igenom programmering med WebGL, från de första stapplande stegen till mer avancerade konstruktioner.



###Referenslitteratur {#referenslitteratur}

Följande böcker har jag valt som referenslitteratur. De kan vara bra att ha tillhands och ger lite extra läsmöjligheter. De behövs inte för att klara kursen men vill du bemästra kursens område så är dessa böcker bra startpunkter.

* **[Speaking JavaScript: An In-Depth Guide for Programmers](kunskap/boken-speaking-javascript)** -- Axel Rauschmayer
    En bok om att komma igång med JavaScript som programmeringsspråk. Fungerar för nya programmerare såväl som för de som redan kan ett eller ett par programmeringsspråk.

* **[JavaScript: The definitive Guide](kunskap/boken-javascript-the-definitive-guide)** -- D. Flanagan
  En tegelsten, komplett med allt du vill veta om språket JavaScript med dess Core, DOM och eventhantering, inklusive en referens till olika funktioner. Perfekt för dig som verkligen vill JavaScript.

* **[WebGL: Up and Running](kunskap/boken-webgl-up-and-running)** -- Tony Parisi
    Visar hur du kommer igång med 3D-programmering och WebGL via 3D-bibliotek. För dig som hellre använder 3D bibliotek än skriver din egen kod direkt i WebGL.

<!--
Boken utgått.
* **[HTML och CSS-boken](boken-html-och-css-boken)** -- Rolf Staflin
  En stabil bok för att komma igång med HTML och CSS.
-->



Läsanvisningar {#lasanvisning}
------------------------------

Här följer en sammanställning av de läsanvisningar till kurslitteraturen som ges i varje kursmoment.

| Kursmoment | WebGL Programming Guide  |
|------------|-------------------------------------------------------------|
| Kmom01     | 1, 2                                                        |
| Kmom02     | 3, 4                                                        |
| Kmom03     | 5, (6), 7                                                   |
| Kmom05     |                                                             |

Dessutom kan varje kursmoment ha ytterligare läsanvisningar i form av artiklar och video.



Lektionsplan och rekommenderad studieplan {#schema}
---------------------------------------------

Går du på campus får du en [lektionsplan](webgl/lektionsplan) i samband med kursstart.

Det finns en [rekommenderad studieplan](webgl/studieplan) som är kopplad till varje kurstillfälle.



Lärarstöd och handledning {#handledning}
----------------------------------------

Kursen ges på campus och handledning sker i anslutning till tid i labbsalen.

Det finns även forum och chatt där man kan få hjälp och handledning.



Ladokmoment {#ladokmoment}
------------------------

Enligt kursplanen finns ett antal ladokmoment och de är kopplade till kursens kursmoment enligt följande.

| Kursens moment   | Ladok moment enligt kursplan |
|------------------|------------------------------|
| Kmom01 + kmom02  | Uppgift 1 á 1hp              |
| Kmom03           | Uppgift 2 á 1hp              |
| Kmom05           | Uppgift 3 á 2hp              |



Betygsättning {#betyg}
------------------------

Det finns ett särskilt dokument som beskriver [hur bedömning och betygsättning sker](kurser/faq/bedomning-och-betygsattning-g-u).



Kursutvärdering och kursutveckling {#kursutvardering}
-----------------------------------------------------

Det finns ett särskilt dokument som beskriver hur arbetet med kursutvärderingar och kursutveckling sker. Det är oerhört viktigt för oss att du säger till vad du tycker om kurs och kursmaterial, du kan alltid hojta till i både forum, chatt eller mail.

Läs om hur vi [jobbar med kursutvärdering och kursutveckling](kurser/kursutvardering-och-kursutveckling).



Kursplan {#kursplan}
-----------------------------------------------------

Kursplanen är kursens formella dokument som fastställts av högskolan. När kursen utvärderas görs det mot kursplanen. I kursplanen kan du läsa om kursens klassificering, syfte, innehåll, mål, generella förmågor, lärande och undervisning, bedömning och examination, litteratur, mm.

Du hittar [kursplanen genom att söka på kurskoden DV1506 via BTH's hemsida](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1506).
