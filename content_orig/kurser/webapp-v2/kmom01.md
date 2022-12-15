---
author: mos
revision:
  "2017-03-09": (C, efo) Gjorde om för webapp v2.
  "2015-12-11": (B, mos) La till video om jQuery Foundation.
  "2015-10-26": (A, mos) Första utgåvan för kursen.
...
Kmom01: En mobil webapp i mithril
==================================

Tanken är att komma igång med utveckling av mobila applikationer. De mobila applikationerna utvecklar vi med tekniker baserade på HTML, CSS och JavaScript och vi kallar dem för mobila webbapplikationer. Som ett första steg så läser vi på om grunderna och vi bygger en me-app med fokus på mindre terminaler.

Eller ja, den blir skalbar så den fungerar även på större plattformar, men vårt fokus är mindre, mobila enheter.

Vi använder javascript ramverket [mithril](http://mithril.js.org/) för att bygga våra webappar enligt MVC och cordova för att skapa hybrid appar för mobila enheter.

<!--more-->

[FIGURE src=/image/snapht15/Strip-dileme-appli-mobile-650-Finalenglish3.jpg caption="Så här kan man ibland känna när man väljer mellan native app och hybrid app." href="http://www.commitstrip.com/en/2014/08/18/the-dilemna-of-mobile-apps-development/"]

Bilden ovan ger en vy av hur man kan känna när man väljer mellan native app och hybrid webapp. Men om man tänker igenom sitt projekt och målgrupp så kommer nog det ena eller andra alternativet framstå som bästa vägen att gå. För vår del gäller hybrid webapp, vi har redan investerat tid och kraft i HTML, CSS och JavaScript och vår webapp är inte speciellt avancerad eller krävande och dessutom är det väldigt lockande att stödja flera plattformar med en kodbas.



Det kan se ut så här när vi är klara.

[YOUTUBE src=x-QTNE1NL4U width=630 caption="Min me-app med fokus på mobilen med hjälp av mithril."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 6-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Mobile HTML5](kunskap/boken-mobile-html5).
    * Introduction
    * Ch 1: Setting the stage



###Artiklar {#artiklar}

Läs följande artiklar för att få bakgrunden till övningarna.

1. Läs om viewport på MDN i artikeln "[Using the viewport meta tag to control layout on mobile browsers](https://developer.mozilla.org/en-US/docs/Mozilla/Mobile/Viewport_meta_tag)".

1. Läs artikeln om "[Mobile: native Apps, Web Apps, and hybrid Apps](http://www.nngroup.com/articles/mobile-native-apps/)".

1. Läs om "[MVC architektur](https://www.tmprod.com/blog/2012/what-is-mvc-architecture-in-a-web-based-application/)".

1. Bekanta dig med dokumentationen för javascript ramverket [mithril](http://mithril.js.org/api.html) och genomgången av en enkel app i deras [tutorial](http://mithril.js.org/simple-application.html).

<!-- 1. Titta i manualen om jQuery Mobile. Du finner den på deras [webbplats under demo](http://demos.jquerymobile.com/). Börja med att läsa artikeln som heter "Introduction" och läs därefter artikeln "Responsive Web Design". Avsluta med att skumma igenom manualen för att se vad där finns och för att bygga en känsla om vad jQuery Mobile innehåller.

1. Titta på olika [varianter av mobila webappar med jQuery Mobile](http://jquerymobile.com/resources/) och få en känsla för vad man kan bygga med jQuery Mobile. -->


###Video  {#video}

1. Det finns en [videoserie](https://www.youtube.com/playlist?list=PLKtP9l5q3ce8uaZ3nj3joyr1H05xQNZ5w) kopplat till kursen, titta på videos som börjar på 0 och 1.

<!-- 1. Video som ger en översikt av jQuery Mobile, "[jQuery Mobile and jQuery UI Keynotes - jQuery Conference Portland 2013](https://www.youtube.com/watch?v=JcHJtBAnGpE)". Video är från 2013 men ger en bra översikt och bakgrund av jQuery Mobile.

1. Video om [Dave Methvin - The State of the jQuery Foundation](https://www.youtube.com/watch?v=vpooxtxaW2U&list=PL-0yjdC10QYpmXI3l-PGK1od4kTWOjm_A). Videon är opening keynote från konferensen jQuery Chicago 2014 och Dave Methvin är president av jQuery Foundation. -->



###Lästips {#lastips}

1. Läs artikeln [Choosing between a native, hybrid or webapp](https://crew.co/how-to-build-an-online-business/native-hybrid-web-app-differences/).



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Labbmiljö {#labbmiljo}

Installera labbmiljön för kursen.

1. [Installera labbmiljön](./../labbmiljo) som behövs för kursen.

1. [Installera kommandot `dbwebb`  samt kursrepot för kursen `webapp`](dbwebb-cli/clone).

Om detta är din första dbwebb-kurs så läser du också igenom hela [manual-sidan för kommandot `dbwebb`](dbwebb-cli).



###Övningar {#ovningar}

Gör följande övningar för att träna inför uppgifterna.

1. Läs igenom tipset om "[Developer tools i webbläsaren för mobila enheter](coachen/developer-tools-i-webblasaren-for-mobila-enheter)".

1. Jobba igenom övningen "[Kom igång med Cordova](kunskap/kom-igang-med-cordova)".

1. Gör övningen "[Kom igång med ramverket Mithril](kunskap/kom-igang-med-mithril-och-webpack)".

1. Läs igenom artikeln "[Virtuella noder](kunskap/virtuella-noder)".

###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Skapa en mithril me-app](uppgift/skapa-en-mithril-me-app-till-webapp-kursen)".



###Extra {#extra}

Det finns ingen extrauppgift.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Är du sedan tidigare bekant med utveckling av mobila appar?
* Är du bekant med mithril?
* Hur känns det att jobba i mithril?
* Var det något som krånglade eller tog extra mycket tid?
