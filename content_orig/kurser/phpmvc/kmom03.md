---
author: mos
revision:
  "2015-10-21": (C, mos) Ny länk till Semantic.gs och Bootstrap.
  "2014-08-06": (B, mos) Tog bort 42-testet.
  "2014-03-28": (A, mos) Första utgåvan för phpmvc version 2.
updated: "2015-10-21 00:25:08"
created: "2013-10-24 15:05:36"
...
Kmom03: Bygg ett eget tema
==================================

Bygg ut ditt ramverk med ett eget responsivt tema som baseras på LESS och gridbaserad layout. Du utvecklar både ett horisontellt- och ett vertikalt grid. Du definiera regioner i temat som du fyller med innehåll via vyer och du funderar över termer som som gridbaserad layout, fixed layout, flexibel layout, responsiv layout och *mobile first*.

Dessutom bekantar du dig med ett par LESS-baserade ramverk/komponenter.

Så här kan det se ut när du är klar.

[FIGURE src=/image/snap/tema-regioner-visa-grid.png?w=w2 caption="Placera ut webbsidans innehåll som regioner i ett rutnät (grid)."]

[FIGURE src=/image/snap/tema-typografi-grid.png?w=w2 caption="Skapa en grundtypografi som matchar ett horisontellt grid."]


<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*


###Artiklar {#artiklar}

Läs följande:

1. Läs artikeln "[The Semantic Grid System: Page Layout For Tomorrow](http://coding.smashingmagazine.com/2011/08/23/the-semantic-grid-system-page-layout-for-tomorrow/)". Skaffa dig en överblick av LESS och The Semantic Grid.

2. Läs artikeln "[Fixed vs. Fluid vs. Elastic Layout: What’s The Right One For You?](http://coding.smashingmagazine.com/2009/06/02/fixed-vs-fluid-vs-elastic-layout-whats-the-right-one-for-you/)". Vad handlar det om med alla varianter på layout av en webbsida? Skaffa dig en översikt.

3. Läs artikeln "[Technical Web Typography: Guidelines and Techniques](http://coding.smashingmagazine.com/2011/03/14/technical-web-typography-guidelines-and-techniques/)" och ta reda på vad ett typografiskt horisontellt rutnät i webblayout innebär.

4. Studera webbsidorna för LESS, lessphp och Semantic.gs. Du kommer att använda alla tre i övningarna så det är lika bra att du bekantar dig med deras manualsidor.

    * [LESS](http://lesscss.org/), ett bättre sätt att skriva CSS-kod.  

    * [lessphp](http://leafo.net/lessphp/), en *server-side* kompilator för LESS, skriven i PHP.

    * [Semantic.gs](http://tylertate.github.io/semantic.gs/), ett gridbaserat ramverk baserat på LESS.

5. Studera översiktligt innehållet i följande CSS/LESS-ramverk genom att surfa deras webbplatser och översiktligt studera exempel och manualer. Skaffa dig ett hum om deras innehåll och syften.

    * [Bootstrap från Twitter](http://getbootstrap.com/).

    * [Font Awesome](http://fortawesome.github.io/Font-Awesome/).

    * [Normalize.css](http://necolas.github.com/normalize.css/).



###Kurslitteratur  {#kurslitteratur}

Inga läsanvisningar i boken i detta momentet.



###Lektionsmaterial  {#lektionsmaterial}

Föreläsningsmaterial för campus kommer i april 2014.



###Lästips {#lastips}

Här är fler kända CSS-ramverk som är bra att ha koll på, de bygger dock inte på LESS utan fanns tidigare och kan betraktas som äldre tekniker. Ägna lite tid att ögna igenom deras webbplatser och studera hur dessa CSS-ramverk är uppbyggda, det finns många webbplatser uppbyggda med dessa tekniker.

1. [Blueprint, ett CSS ramverk](http://blueprintcss.org/).

2. [960 gs, ett CSS grid ramverk](http://960.gs/).

3. [Erik Meyers reset.css](http://meyerweb.com/eric/tools/css/reset/).



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-14 studietimmar)*



###Övningar {#ovningar}

Genomför övningarna för att träna inför uppgifterna.

1. Installera och kom igång med [stylephp](opensource/stylephp) som hjälper dig att använda lessPHP för att kompilera LESS-kod till CSS på serversidan.

2. Jobba igenom övningen ["Bygg ett tema med LESS till Anax-MVC"](kunskap/bygg-ett-tema-med-less-till-anax-mvc). Bygg ditt eget tema med LESS.



###Uppgifter {#uppgifter}

1. Gör uppgiften ["Skapa ett responsivt tema till din Anax-MVC"](uppgift/bygg-ett-responsivt-tema-till-anax-mvc)



###Extra {#extra}

1. Anta utmaningen att ladda upp ditt tema på GitHub, som ett eget projekt, ett bastema som går att använda för att bygga sin webbplats, oavsett ramverk. Är det möjligt eller måste du koppla det till ett ramverk? Du kan alltid begränsa ditt tema till ett visst ramverk. Fundera vad som krävs, vilken struktur måste du ha, vilka är gränssnitten?



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Vad tycker du om CSS-ramverk i allmänhet och vilka tidigare erfarenheter har du av dem?
  * Vad tycker du om LESS, lessphp och Semantic.gs?
  * Vad tycker du om gridbaserad layout, vertikalt och horisontellt?
  * Har du några kommentarer om Font Awesome, Bootstrap, Normalize?
  * Beskriv ditt tema, hur tänkte du när du gjorde det, gjorde du några utsvävningar?
  * Antog du utmaningen som extra uppgift?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc-v2). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.




