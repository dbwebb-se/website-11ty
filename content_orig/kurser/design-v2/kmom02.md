---
author:
  - mos
  - efo
revision:
    "2018-10-30": (F, mos) Nytt dokument inför uppdatering av kursen.
    "2018-10-19": (E, efo) Uppdatering med design guide.
    "2017-10-27": (D, mos) Genomgången inför ht17.
    "2016-10-26": (C, mos) Flyttad från kmom01 till 02 efter feedback.
    "2016-10-15": (B, mos) Testad och genomgången.
    "2016-06-22": (A, mos) Första utgåvan.
...
Kmom02: LESS och responsivitet
====================================

[FIGURE src=image/snapht18/design-kmom02-responsive.png?w=c7  class="right" caption="Hur responsiv kan vår webbplats bli?"]

Vi har nu en bas av en webbplats. Vi vet hur vi lägger till innehåll i webbplatsen och vi kan styla den. Låt oss då gå vidare och skapa en bas för ett (flera) teman till webbplatsen.

Temat, eller stylen, skapar vi med LESS, en preprocessor till CSS. Vi lär oss grunderna i LESS och hur vi bygger CSS-filer från LESS-konstruktioner.

Vi försöker bygga en modulär struktur av LESS-filer som vi delar in i LESS-moduler. Det skapar en grund av style-kod som blir enkla att återanvända i andra sammanhang, eller längre fram när vi gör fler teman och anpassar våra teman.

<!--more-->

Stylen vi skapar gör vi *responsiv* så att den anpassar sig för skärmens storlek. Våra webbplatser behöver fungera lika bra på desktop liksom på läsplatta och mobil så låt oss träna på vad det kan innebära.

Vi testar att överföra vårt tema från kmom01 till LESS. Därefter startar vi på nytt med ett tomt tema och börjar bygga upp stylen igen med LESS och samtidigt fördelar vi koden i LESS moduler.

[FIGURE src=image/snapht18/design-kmom02.png?w=w3 caption="Ett tomt tema, någonstans skall vi börja att bygga vårt tema."]

Vi vet sedan kmom01 att sidan består av flera regioner som vi kan styla. Hur dessa regioner ser ut kan nu vara intressant med tanke på att de skall bli responsiva.

[FIGURE src=image/snapht18/design-kmom02-regioner.png?w=w3 caption="Vår layout har många regioner som kan behöva styling."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Introduktion {#intro}
-----------------------

I videoserien "[Kursen design (v2)](https://www.youtube.com/playlist?list=PLKtP9l5q3ce9mDpkLxSwyWh5sUPfq-Hip)" kan du kika på de videor som börjar på 2*. De ger dig en kort introduktion till detta kmom.

[YOUTUBE src="IW26JHQTc8I" list="PLKtP9l5q3ce9mDpkLxSwyWh5sUPfq-Hip" width=700 caption="Intro till kmom02."]

Missa inte videon som visar hur exempelprogrammet `example/less` fungerar.



Labbmiljön  {#labbmiljo}
---------------------------------

*(ca: 2-4 studietimmar)*

Installera följande.

1. Installera labbmiljön för Node.js och npm via "[Installera nodejs och npm](labbmiljo/node-och-npm)".



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*



### Kurslitteratur  {#kurslitteratur}

Läs följande:

1. Läs i boken "[The principles of Beautiful Web Design](kunskap/boken-the-principles-of-beautiful-web-design)". Det ger dig en bakgrund i tankar och hur man gör layout och komponerar ihop designen i en webbsida.

    * Kap 1: Layout and Composition



### Design med HTML5 och CSS3  {#guide}

1. Läs igenom följande sektion i guiden "[Design med HTML5 och CSS3](guide/design-med-html5-och-css3)".
    * [Responsivitet](guide/design-med-html5-och-css3/responsivitet)

I sektionen [Responsivitet](guide/design-med-html5-och-css3/responsivitet) tittar vi på hur vi med hjälp av media queries kan anpassa en webbplats för både stora och små enheter.



### LESS {#less}

Kom igång med LESS genom att läsa runt och eventuellt skriva något enklare testprogram som du kan spara under `me/kmom02/less`. Det finns ett exempelprogram under `example/less` som du kan kopiera och utgå ifrån.

1. Läs översiktligt Kalles artikel om CSS preprocessors, "[CSS Preprocessors are cool](http://dbwebb.se/article/Kalle_CSS_LESS_SASS.pdf)". Artikeln ger en introduktion till CSS preprocessorer och behandlar skillnader och likheter mellan LESS och SASS som är två olika preprocessorer till CSS.

1. I kursen använder vi LESS så bekanta dig med [LESS](http://lesscss.org/) och se vad det kan göra. LESS är uppbyggd som ett programmeringsspråk, så kika runt bland de manualer som finns men fokusera på "In-Depth Guide" för att lära dig hur du skriver LESS konstruktioner.

1. Det finns en videoserie "[Lär dig LESS](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-kTE6oaXLUNqII3cgTheEi)" som visar hur du kommer igång och jobbar med LESS. Spellistan visar grundkonstruktioner i LESS. Kika på de första 2-3 videorna för att få ett hum om hur LESS fungerar. Kika på fler videor som överkurs.

1. Du kan testa och leka med LESS-konstruktioner på "[Less-To-CSS Playground](http://lesscss.org/less-preview/)". Se det som en del av din utvecklings och testmiljö, för att lära dig hur LESS blir till CSS.



### LESS moduler {#lessmodul}

Följande moduler kommer du att använda när du bygger ditt tema i den kommande uppgiften.

1. Kika på hur du kan nollställa style med [Normalize.css](http://necolas.github.com/normalize.css/) samt läs snabbt om hur [Normalize fungerar](http://nicolasgallagher.com/about-normalize-css/) och vem som använder det.

1. Titta snabbt och översiktligt på [Font Awesome](https://fontawesome.com/) och se vilka ikoner man kan skapa med dess hjälp. Leta reda på webbsidan som visar hur man installerar Font Awesome och se om du kan hitta hur man installerar det som en LESS-modul med hjälp av pakethanteraren npm. Vi kommer att göra detta senare i uppgiften.



### Om responsivitet {#responsivitet}

Läs följande om responsivitet.

1. Läs artikeln "[Responsive Web Design Basics](https://developers.google.com/web/fundamentals/design-and-ux/responsive/)" som ger dig en introduktion i tekniker kring ämnet.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Lös uppgiften "[Bygg ett LESS-tema till kursen design](uppgift/bygg-ett-less-tema-till-kursen-design)".

1. Försäkra dig om att du har gjort `dbwebb publishpure redovisa` och taggat din inlämning med version 2.0.0 (eller högre) samt pushat repot inklusive taggarna till GitHub.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Vad tycker du om LESS och det sättet vi jobbar med LESS-moduler?
* Är du bekant med Makefiler och make sedan tidigare, eller något liknande byggverktyg? Vad anser du om det?
* Hur kändes det att kompilera LESS till CSS, var det något du reflekterade över?
* Kommentera ditt tema, hur kan man beskriva dess design och hade du några planer på "design" när du byggde ditt tema?
* Vilken är din TIL för detta kmom?



<!--
### Tekniker för att skriva för webben {#skriva}

1. Läs följande kapitel i guiden "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)".

    * 3. Hur vi läser på webben
-->


<!--
### Webbdesign och användbarhet {#webbdesign}

Läs följande artiklar.

1. Läs artikeln "[The Fold Manifesto: Why the Page Fold Still Matters](https://www.nngroup.com/articles/page-fold-manifesto/)".

1. Läs artikeln "[Menu Design: Checklist of 15 UX Guidelines to Help Users](https://www.nngroup.com/articles/menu-design/)".
-->
<!-- Eventuellt skriva artikel om usability, kanske i projektet? -->



<!--
### LESS organisation {#lessorg}

Finns läsanvisning som förklarar skillnade med base och layout-styles.

NE, det känns lite överkurs, låt oss nörja smått.

-->


<!--
### Responsiv webbdesign {#responsiv}

Hmmm, i sliden https://dbwebb.se/repo/slides/ht18/023-htmlphp-kmom02-responsivitet.html presenteras begreppen Mobile First (2009), Responsive web design (2010) samt Adaptive web design (2011). Säg något om begreppen?

Visa hur man gör i LESS i me/redovisa?


1. Läs översiktligt artikeln som definierade begreppet "[Responsive Web Design](http://alistapart.com/article/responsive-web-design/)".

1. Bläddra snabbt igenom artikeln "[Multi-Device Layout Patterns](http://www.lukew.com/ff/entry.asp?1514)" som definierar ett antal design mönster inom responsiv design.

1. Kika snabbt på materialet då Google Developers visar hur man kommer igång med [grunderna i responsiv layout](https://developers.google.com/web/fundamentals/design-and-ui/responsive/).
-->


<!--
### Video  {#video}

Titta på följande:

1. Till kursen finns en videoserie, "[Teknisk webbdesign och användbarhet](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)", kika på de videor som börjar på 2. Videorna som börjar på 210* är kopplade till en av de artiklar du skall jobba igenom under övningarna nedan. Titta på dem samtidigt som du jobbar igenom artikeln.
-->




<!--
### Lästips {#lastips}

Kika igenom följande styleguides till CSS för att få en känsla av hur du bör/kan skriva din CSS-kod.

1. Kika snabbt igenom "[Google HTML/CSS Style Guide](https://google.github.io/styleguide/htmlcssguide.xml)".

1. De valideringsregler som gäller för CSS-kod i dbwebb-kurser är samlade i repot [`desinax/css-styleguide`](desinax/css-styleguide). Repot finns även som ett npm-paket [css-styleguide](https://www.npmjs.com/package/css-styleguide). Du kan [diskutera stylen i forumet](https://dbwebb.se/forum/viewtopic.php?f=9&t=6822).
-->
<!-- 1. Kika snabbt igenom [kod-guidelines för GitHubs Primer](http://primercss.io/guidelines/). -->
