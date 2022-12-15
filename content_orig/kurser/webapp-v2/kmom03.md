---
author: mos
revision:
  "2017-03-13": (A, efo) Första utgåvan för webapp-v2.
  "2015-11-23": (A, mos) Första utgåvan för kursen.
...
Kmom03: Dashboard
==================================

Vi jobbar vidare med mithril och att hämta data från api'er. Nu handlar det om att skapa mithril komponenter, som underlätter för att återanvända kod. Vi ska även titta på hur vi skapar ett grid system för att skapa en SPA-applikation som kan visas upp på enheter i fem olika storlekar.

<!--more-->

Så här kan det se ut när vi är klara.

[YOUTUBE src=CWI3_dK6PiI width=630 caption="Dashboard i kursmoment 3."]

<!-- [FIGURE src=/image/snapht15/ajax-af-lista.png?w=w2 class="left" caption="Sida som visar antalet lediga jobb samt platsannonser."]

[FIGURE src=/image/snapht15/ajax-af-undersida.png?w=w2 class="left" caption="Undersida som visar lediga jobb och antal platsannonser i Blekinge."] -->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 6-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Mobile HTML5](kunskap/boken-mobile-html5).
    * Ch 11: CSS3 features in Responsive Web Design
    * Ch 12: Designing Mobile Applications



###Artiklar {#artiklar}

1. Läs "[What the heck is shadow DOM](https://glazkov.com/2011/01/14/what-the-heck-is-shadow-dom/)".

1. Läs om vilka "[use case som finns för shadow DOM](https://www.w3.org/2008/webapps/wiki/Component_Model_Use_Cases)".

1. Skumma igenom "[Googles artikel shadow DOM-v1](https://developers.google.com/web/fundamentals/getting-started/primers/shadowdom?hl=en)".


###Video  {#video}

1. Det finns en [videoserie](https://www.youtube.com/playlist?list=PLKtP9l5q3ce8uaZ3nj3joyr1H05xQNZ5w) kopplat till kursen, titta på videos som börjar på 3.



###Lästips {#lastips}

* Bekanta dig med [mithril Components](http://mithril.js.org/components.html), som hjälper dig att skapa återanvändbar kod.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar för att träna inför uppgifterna.

1. Läs igenom artikeln "[Ett enkelt grid för alla våra enheter](kunskap/ett-enkelt-grid-for-alla-vara-enheter)".

1. Läs igenom artikeln "[En kalender med mithril components](kunskap/en-kalender-med-mithril-components)".

1. Läs igenom artikeln "[Lägg till en Splash screen och ändra ikon](kunskap/splash-screen-och-ikon)".

<!-- 1. Läs igenom artikeln och gör övningarna i "[Mobil webapp och RESTful server](kunskap/mobil-webapp-och-restful-server)". Spara de övningar du gör i mappen `me/kmom03/ajax`. -->



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Dashboard](uppgift/mithril-dashboard)".

1. Lägg till en Splash screen och en ikon till din meapp.



###Extra {#extra}

Det finns ingen extrauppgift.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur är din generella uppfattning om mithril nu efter tre kursmoment?
* Hur känns det att utveckla för enheter med olika stora skärmar?
* Valde du flex eller float grid? Varför?
* Vilket API valde du förutom Github? Varför?
* Var det något som krånglade eller tog extra mycket tid?
