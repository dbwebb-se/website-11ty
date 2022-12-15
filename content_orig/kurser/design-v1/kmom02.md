---
author: mos
revision:
    "2017-10-27": (D, mos) Genomgången inför ht17.
    "2016-10-26": (C, mos) Flyttad från kmom01 till 02 efter feedback.
    "2016-10-15": (B, mos) Testad och genomgången.
    "2016-06-22": (A, mos) Första utgåvan.
...
Kmom02: LESS och responsiv design
====================================

Låt oss påbörja skapandet av vårt eget tema till webbplatsen. Vi fyller vår me-sida med style med hjälp av LESS och vi eftersträvar en god och modulariserad kodstruktur.

Stylen skapar vi med LESS, en preprocessor till CSS. Vi skall skapa en modulär struktur av LESS-filer, LESS-moduler, som blir enkla att återanvända. Stylen vi skapar gör vi *responsiv* så att den anpassar sig för skärmens storlek. Våra webbplatser behöver fungera lika bra på desktop liksom på läsplatta och mobil.

Vi behöver alltså lära oss LESS och responsiv design samt hur LESS förhåller sig till CSS.

Vi behöver också fortsätta att bekanta oss generellt med begreppen webbdesign och användbarhet på webben. Det viktigt med förståelse för vissa grundkoncept inom området.

Vi börjar försiktigt för att se hur LESS fungerar tillsammans med Anax Flat och hur vi kan jobba med ett tema via moduler i LESS.

I nästa kmom bygger vi vidare på temat med grid-baserad layout. Så det kommer mera och det gör inget om du tar det lite lugnt med stylen i detta kmom. 



<!--more-->

[FIGURE src=/image/kurs/design/anax-flat-no-theme.png?w=w2 caption="Ett tomt tema, någonstans skall vi börja."]

[FIGURE src=/image/kurs/design/anax-flat-regions.png?w=w2 caption="Vi jobbar med regioner som vi göra responsiva."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. Läs i boken "[The principles of Beautiful Web Design](kunskap/boken-the-principles-of-beautiful-web-design)".

    * Kap 1: Layout and Composition



###Tekniker för att skriva för webben {#skriva}

1. Läs följande kapitel i guiden "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)".

    * 3. Hur vi läser på webben



###Webbdesign och användbarhet {#webbdesign}

Läs följande artiklar.

1. Läs artikeln "[The Fold Manifesto: Why the Page Fold Still Matters](https://www.nngroup.com/articles/page-fold-manifesto/)".

1. Läs artikeln "[Menu Design: Checklist of 15 UX Guidelines to Help Users](https://www.nngroup.com/articles/menu-design/)".



###Kom igång med LESS {#less}

1. Läs översiktligt Kalles artikel om CSS preprocessors, "[CSS Preprocessors are cool](http://dbwebb.se/article/Kalle_CSS_LESS_SASS.pdf)". Artikeln behandlar skillnader och likheter mellan LESS och SASS. Artikeln är också en god introduktion till vad en CSS pre-processor är och gör.

1. Bekanta dig med [LESS](http://lesscss.org/) och se vad det kan göra. Det är uppbyggd som ett programmeringsspråk, så kika på både på "Language reference" och på "Function reference".

1. Kika på hur du kan nollställa style med [Normalize.css](http://necolas.github.com/normalize.css/) samt läs snabbt om hur [Normalize fungerar](http://nicolasgallagher.com/about-normalize-css/) och vem som använder det.



###Responsiv webbdesign {#responsiv}

1. Läs översiktligt artikeln som definierade begreppet "[Responsive Web Design](http://alistapart.com/article/responsive-web-design/)".

1. Bläddra snabbt igenom artikeln "[Multi-Device Layout Patterns](http://www.lukew.com/ff/entry.asp?1514)" som definierar ett antal design mönster inom responsiv design.

1. Kika snabbt på materialet då Google Developers visar hur man kommer igång med [grunderna i responsiv layout](https://developers.google.com/web/fundamentals/design-and-ui/responsive/). 



###Video  {#video}

Titta på följande:

1. Till kursen finns en videoserie, "[Teknisk webbdesign och användbarhet](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)", kika på de videor som börjar på 2. Videorna som börjar på 210* är kopplade till en av de artiklar du skall jobba igenom under övningarna nedan. Titta på dem samtidigt som du jobbar igenom artikeln.

1. Det finns en videoserie "[Lär dig LESS](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-kTE6oaXLUNqII3cgTheEi)" som visar hur du kommer igång och jobbar med LESS. Spellistan visar grundkonstruktioner i LESS.




###Lästips {#lastips}

Kika igenom följande styleguides till CSS för att få en känsla av hur du bör/kan skriva din CSS-kod.

1. Kika snabbt igenom "[Google HTML/CSS Style Guide](https://google.github.io/styleguide/htmlcssguide.xml)".

<!-- 1. Kika snabbt igenom [kod-guidelines för GitHubs Primer](http://primercss.io/guidelines/). -->

1. De valideringsregler som gäller för CSS-kod i dbwebb-kurser är samlade i repot [`desinax/css-styleguide`](desinax/css-styleguide). Repot finns även som ett npm-paket [css-styleguide](https://www.npmjs.com/package/css-styleguide). Du kan [diskutera stylen i forumet](https://dbwebb.se/forum/viewtopic.php?f=9&t=6822).



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



###Övningar {#ovningar}

Genomför följande övning för att förbereda inför uppgifterna.

1. Kom igång med LESS och skapa en struktur av LESS-filer, eller LESS-moduler. Det blir ett modulärt sätt att bygga upp sitt *tema* till webbplatsen. Gör detta genom att jobba igenom artikeln "[Bygg ett tema till Anax Flat](kunskap/bygg-ett-tema-till-anax-flat)".



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Lös uppgiften "[Bygg en ut ditt Anax Flat med eget LESS tema](uppgift/anax-flat-med-eget-tema)".



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Vad tycker du om LESS så här långt, och det sättet vi jobbar med LESS-moduler i vårt tema?
* Hur kändes det att kompilera LESS till CSS, var det något du reflekterade över?
* Har du varit bekant med Makefiler och make sedan tidigare, eller något liknande byggverktyg? Hur uppfattar du make så här långt?
* Fann du nytta i de videor som var kopplade till detta kursmoment?
