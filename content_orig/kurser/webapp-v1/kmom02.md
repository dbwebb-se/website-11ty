---
author: mos
revision:
  "2017-03-10": (C, aar) Tog bort Firefox OS.
  "2016-02-08": (B, mos) Lade till extrauppgift om detect-swipe-event.
  "2015-10-26": (A, mos) Första utgåvan för kursen.
...
Kmom02: Bygg ut din mobila webapp
==================================

Vi har en me-app, från föregående kursmoment, som är utvecklad mot mobila enheter. Men med mobila terminaler finns det en del som är specifikt och skiljer sig från desktop miljöer. Låt oss bygga vidare på me-appen och testa runt för att se vilka möjligheter och begränsningar som kan finnas. Det blir en blandning av olika tekniker men fokus är att lära oss mer om den mobila utvecklingsmiljön.

<!--more-->


Det kan se ut så här när vi är klara.

[YOUTUBE src=s4QkWOlX5h8 width=630 caption="Min listview fungerar med swipeback event för navigering."]



<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 6-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Mobile HTML5](kunskap/boken-mobile-html5).
    * Ch 5: SVG, Canvas, Audio, and Video
    * Ch 6: Other HTML5 APIs



###Artiklar {#artiklar}

Läs följande artiklar för att få bakgrunden till övningarna.

1. Läs om "[Use Cases and Requirements for Installable Web Apps](https://w3c-webmob.github.io/installable-webapps/)".

1. Läs översiktligt introduktionen om webappar i [Safari Developer library - Getting started with webapps](https://developer.apple.com/library/content/documentation/AppleApplications/Reference/SafariWebContent/Introduction/Introduction.html).

1. Läs översiktligt om introduktionen till [Android Web Apps](http://developer.android.com/guide/webapps/index.html).



###Video  {#video}

Titta på följande video.

1. Se videon om jQuery Mobile "[Alex Schmitz - jQuery Mobile - What’s New in 1.5 and the Road to 2.0](https://www.youtube.com/watch?v=2qF7kW9SdJQ)".



###Lästips {#lastips}

Det finns inga extra lästips.




Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar för att träna inför uppgifterna.

1. Läs igenom artikeln och gör övningarna i "[Att göra en mobilapp av en mobil-anpassad webbplats](kunskap/att-gora-en-mobilapp-av-en-mobil-anpassad-webbplats)".

1. Installera utvecklingsverktygen för [Installera en emulator för Android](kunskap/installera-en-emulator-for-android).




###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Bygg ut me-appen med ett potpurri av tester](uppgift/bygg-ut-me-appen-med-ett-potpurri-av-tester)".



###Extra {#extra}

Följande kan du göra om du har tid och ambition.

1. Studera koden bakom JavaScript-funktionen `detectSwipeEvent()` som du finner i GitHub repot [mosbth/detect-swipe-event](https://github.com/mosbth/detect-swipe-event). Du kan dels se hur koden är uppbyggd för att hantera och upptäcka olika swipe-event, och du kan se hur Travis används för automatiserade tester och `Makefile` för att köra testerna och skapa den minifierade varianten.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](webapp-v1/redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur känns det att jobba i jQuery Mobile, fördelar och nackdelar?
* Så här långt, känner du att du har koll på koden? Är det något särskilt du funderar på?
* Hur gick det att installera simulatorn för Android?
* Var det något som krånglade eller tog extra mycket tid?
