---
author:
  - mos
  - efo
revision:
  "2018-01-30": (D, efo) Gjorde om för webapp-v3.
  "2017-03-09": (C, efo) Gjorde om för webapp-v2.
  "2016-02-08": (B, mos) Lade till extrauppgift om detect-swipe-event.
  "2015-10-26": (A, mos) Första utgåvan för kursen.
...
Kmom02: Mobila enheters begränsningar
==================================
Vi tar en titt på vilka begränsningar och utmaningar man står inför som användare av en mobil enhet. Vi bryter ut CSS koden från kmom01 till ett GUI komponentbaserad ramverk och lägger till fler GUI komponenter till vårt ramverk.

Vi fortsätter med vår applikation från kmom01 och använder tekniker för att strukturera JavaScript koden på ett bättre sätt.

Innan vi gör detta tittar vi på ett verktyg som hjälper oss att söka och visa information i JSON-filer.

Det kan se ut så här när vi har gjort klart Lager appen del 2.

[YOUTUBE src=PXiMMSsf9NA width=630 caption="Så här kan det se ut när vi är klara med Lager appen del 2."]


<!--more-->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 6-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Mobile HTML5](kunskap/boken-mobile-html5).
    * Ch 11: CSS Features in Responsive Web Design.
    * Ch 12: Designing Mobile Applications.



###Artiklar {#artiklar}

Läs följande artiklar för att få bakgrunden till övningarna.

1. Titta igenom [jsonapi.org](http://jsonapi.org/format/) för att få en uppfattning om vad ett JSON-API är. Speciellt specification, recommendation, examples och FAQ är relevanta.

<!-- 1. Läs kort och översiktligt om [Firefox OS](https://developer.mozilla.org/en-US/docs/Mozilla/Firefox_OS).

1. Läs översiktligt om introduktionen till [webappar på Firefox OS](https://developer.mozilla.org/en-US/Apps/Quickstart). -->



###Video  {#video}

1. Det finns en [videoserie](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-1cVPTFJ_Zw9b7N2Y4_ANI) kopplat till kursen, titta på videos som börjar på 2.

1. Videospellistan [Introduktion till SASS](https://www.youtube.com/playlist?list=PLKtP9l5q3ce8HZ5mbVhoKM_R1DmlX1iH1) ger en kort introduktion till funktioner i SASS.

<!-- 1. Se videon om jQuery Mobile "[Alex Schmitz - jQuery Mobile - What’s New in 1.5 and the Road to 2.0](https://www.youtube.com/watch?v=2qF7kW9SdJQ)". -->



###Lästips {#lastips}

* Kika igenom [webbplatsen om applikationen jq](https://stedolan.github.io/jq/) som hjälper dig söka och visualisera innehållet i en JSON fil.

* Kika igenom [Getting Started](https://webpack.js.org/guides/getting-started/) för att bekanta dig med webpack.

<!-- * Läs om "[Use Cases and Requirements for Installable Web Apps](https://w3c-webmob.github.io/installable-webapps/)".

* Läs översiktligt om introduktionen till [Android Web Apps](http://developer.android.com/guide/webapps/index.html). -->



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar för att träna inför uppgifterna.

<!-- 1. Läs igenom artikeln och installera "[Utvecklingsverktyg för REST tjänster](kunskap/utvecklingsverktyg-for-restful-tjanster)". -->

1.  Installera och testa verktyget jq via artikeln "[Installera verktyget jq för att söka i JSON-filer](kunskap/installera-verktyget-jq-for-att-soka-i-json-filer)".

1. Gör övningen "[Knappar för mobilen](kunskap/knappar-for-mobilen)". Spara eventuella testfiler i `me/kmom02/buttons`.

1. Gör övningen "[Struktur i JavaScript](kunskap/struktur-i-var-javascript)".



<!-- 1. Läs igenom artikeln "[Enhetens storlek och orientering](kunskap/enhetens-storlek-och-orientering)". -->

<!-- 1. Installera utvecklingsverktygen för [Installera en emulator för Android](kunskap/installera-en-emulator-for-android). -->



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Sökverktyg för JSON filer](uppgift/sokverktyg-for-json-filer)". Spara resultatet i `me/kmom02/jq`.

1. Gör uppgiften "[Lager appen del 2](uppgift/lager-appen-del-2)". Spara resultatet i `me/kmom02/lager2`.

<!-- 1. Gör uppgiften "[Bygg vidare på din me-app](uppgift/github-sida-i-din-me-app)".

1. Gör uppgiften "[Skapa en Nobel app](uppgift/skapa-en-nobel-app)". -->



###Extra {#extra}

Det finns inga extra uppgifter.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Vilka fördelar ser du med verktyg som Postman, curl och jq?
* Fick du till en bra struktur i din CSS/SASS kod?
* Vilka fördelar ser du med verktyg som webpack och SASS?
* Valda du flat design eller ej för dina knappar? Varför?
* Vilken är din TIL för detta kmom?
