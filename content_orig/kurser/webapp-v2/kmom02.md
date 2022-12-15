---
author: mos
revision:
  "2017-03-09": (C, efo) Gjorde om för webapp-v2.
  "2016-02-08": (B, mos) Lade till extrauppgift om detect-swipe-event.
  "2015-10-26": (A, mos) Första utgåvan för kursen.
...
Kmom02: Bygg ut din mobila webapp
==================================

Vi har en me-app, från föregående kursmoment, som är utvecklad mot mobila enheter. Men med mobila terminaler finns det en del som är specifikt och skiljer sig från desktop miljöer. Låt oss bygga vidare på me-appen och testa runt för att se vilka möjligheter och begränsningar som kan finnas. Det blir en blandning av olika tekniker men fokus är att lära oss mer om den mobila utvecklingsmiljön.

Vi kommer även titta på hur vi hämtar data från externa API'er och jobba med verktyg som underlättar när vi jobabr med JSON API'er.

<!--more-->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>

Det kan se ut så här när vi är klara med Nobelappen.

[YOUTUBE src=hbQOZR4R5mo width=630 caption="Nobelappen i kursmoment 2."]



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 6-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Mobile HTML5](kunskap/boken-mobile-html5).
    * Ch 6: Other HTML5 APIs



###Artiklar {#artiklar}

Läs följande artiklar för att få bakgrunden till övningarna.

1. Titta igenom [jsonapi.org](http://jsonapi.org/format/) för att få en uppfattning om vad ett JSON-API är. Speciellt specification, recommendation, examples och FAQ är relevanta.

<!-- 1. Läs kort och översiktligt om [Firefox OS](https://developer.mozilla.org/en-US/docs/Mozilla/Firefox_OS).

1. Läs översiktligt om introduktionen till [webappar på Firefox OS](https://developer.mozilla.org/en-US/Apps/Quickstart). -->


###Video  {#video}

1. Det finns en [videoserie](https://www.youtube.com/playlist?list=PLKtP9l5q3ce8uaZ3nj3joyr1H05xQNZ5w) kopplat till kursen, titta på videos som börjar på 2.

<!-- 1. Se videon om jQuery Mobile "[Alex Schmitz - jQuery Mobile - What’s New in 1.5 and the Road to 2.0](https://www.youtube.com/watch?v=2qF7kW9SdJQ)". -->


* Vilken utvecklingsmiljö sitter du på?
###Lästips {#lastips}

* Kika igenom [webbplatsen om applikationen jq](https://stedolan.github.io/jq/) som hjälper dig söka och visualisera innehållet i en JSON fil.

* Läs om "[Use Cases and Requirements for Installable Web Apps](https://w3c-webmob.github.io/installable-webapps/)".

* Läs översiktligt om introduktionen till [Android Web Apps](http://developer.android.com/guide/webapps/index.html).
* Vilken utvecklingsmiljö sitter du på?


Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar för att träna inför uppgifterna.

1. Läs igenom artikeln och installera "[Utvecklingsverktyg för REST tjänster](kunskap/utvecklingsverktyg-for-restful-tjanster)".

1.  Installera och testa verktyget jq via artikeln "[Installera verktyget jq för att söka i JSON-filer](kunskap/installera-verktyget-jq-for-att-soka-i-json-filer)".

1. Läs igenom artikeln "[Enhetens storlek och orientering](kunskap/enhetens-storlek-och-orientering)".

1. Läs igenom artikeln och gör övningarna i "[Modeller och request i mithril](kunskap/mithril-modeller-och-request)".

<!-- 1. Installera utvecklingsverktygen för [Installera en emulator för Android](kunskap/installera-en-emulator-for-android). -->




###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Sökverktyg för JSON filer](uppgift/sokverktyg-for-json-filer)".

1. Gör uppgiften "[Bygg vidare på din me-app](uppgift/github-sida-i-din-me-app)".

1. Gör uppgiften "[Skapa en Nobel app](uppgift/skapa-en-nobel-app)".



###Extra {#extra}

Det finns inga extra uppgifter.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur känns det att jobba med modeller och hämta data från api'er med `m.request`?
* Hur känns det att jobba i mithril, fördelar och nackdelar?
* Så här långt, känner du att du har koll på koden? Är det något särskilt du funderar på?
* Var det något som krånglade eller tog extra mycket tid?
