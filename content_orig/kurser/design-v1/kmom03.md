---
author: mos
revision:
    "2017-11-03": (E, mos) Genomgång inför ht17.
    "2016-12-02": (D, mos) Lade till videoserie om vgrid.
    "2016-10-26": (C, mos) Flyttad från 02 till 03 efter feedback.
    "2016-10-15": (B, mos) Testad och genomgången.
    "2016-06-22": (A, mos) Första utgåvan.
...
Kmom03: Grid, layout och typografi
====================================

Låt oss titta på gridbaserad layout, ett grid som bestämmer var vi placerar ut innehållet på webbplatsens sidor.

Vi skall titta på ett **vertikalt grid** som ger oss rader och kolumner tillsammans med mellanrum¸ *gutter*, som skapar ett vitt utrymme, så kallat *white space*.

Sedan tittar på på ett **horisontellt grid** som vi även kan kalla ett *typografiskt grid*, eller ett *baseline grid* där syftet är att alla typografiska element vilar på en rad i ett tänkt horisontellt rutnät för att skapa en *vertical rythm* i de typografiska elementen. Vårt horisontella grid skall inte bara gälla de typografiska elementen utan samtliga element som placeras ut på webbsidan.

Vi bygger ut vårt tema med LESS-moduler som löser vertikalt och horisontellt grid. Samtidigt förbereder vi temat för att bli enkelt att styla med olika typsnitt.



<!--more-->

[FIGURE src=/image/snapvt16/grid-displayed.png?w=w2 caption="Placera ut webbsidans innehåll som regioner i ett rutnät (grid)."]

[FIGURE src=/image/snapvt16/typografiskt-grid.png?w=w2 caption="Skapa en grundtypografi som matchar ett horisontellt grid."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. Läs i boken "[The principles of Beautiful Web Design](kunskap/boken-the-principles-of-beautiful-web-design)".

    * Kap 1: Layout and Composition (repetera)
    * Kap 4: Typography



###Tekniker för att skriva för webben {#skriva}

1. Läs följande kapitel i guiden "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)".

    * Kap 4. Målgrupper - vem vill du nå?

1. Läs kort och översiktligt om [PHP Markdown Extra](https://michelf.ca/projects/php-markdown/extra/) som stöds av [klassen `CTextFilter`](https://github.com/mosbth/ctextfilter) som ligger bakom hur Markdown-texten i Anax Flat formatteras till HTML.



<!--
###Webbdesign och användbarhet {#webbdesign}

Det finns inga artiklar.

Läs följande artiklar.

* Nilesen gridlayout
-->


###Vad handlar grid-baserad layout om? {#grid}

1. Läs två artiklar om "[History of the design grid I](https://99designs.com/blog/tips/history-of-the-grid-part-1/)" och "[History of the design grid II](https://blog.99cluster.com/blog/tips/history-of-the-grid-part-2/)" för att få en överblick om vad gridbaserad layout handlar om.

1. Läs artikeln "[Technical Web Typography: Guidelines and Techniques](http://coding.smashingmagazine.com/2011/03/14/technical-web-typography-guidelines-and-techniques/)" och ta reda på vad ett typografiskt horisontellt rutnät i webblayout innebär. Denna artikel hanterar samma teknik som tas upp i övningen och uppgiften så se det som en bakgrundsartikel.

1. [Primer](http://primercss.io/) är GitHub’s interna CSS ramverk. Deras manual finns på webben. Läs artiklarna där de kort beskriver sin [layout](http://primercss.io/archive/layout/) och [typografi](http://primercss.io/archive/type/). Se det som ett exempel på hur ett ramverk för grid och typografi kan se ut. (_note 2017: Google håller på och uppdaterar sitt ramverk_).



###Typografisk webb {#type}

Tänk dig en typografisk webbplats där all styling har lagts på de typografiska elementen. Hur kan det se ut? Kika på följande webbplatser och inhämta inspiration.

1. [En praktisk guide till typografi på webben](http://webtypography.net/), en högst läsbar bok och samtidigt ett stilexempel på hur en typografiskt stilad webbplats kan se ut. Läs Introduktionen och kapitlet 2.2 Vertical Motion. Övrigt kan du se online-boken som en resurs in i typografins värld.

1. Det finns många typografiska element som kan vara vackra, men aningen svåra att få med i sin löpande text på webben. Kika i artikeln "[Typografiska element för webben med SmartyPants](coachen/typografiska-element-med-smartypants)" om vilken teknik som används till webbplatsen dbwebb när det handlar om typografiska element.



###Video  {#video}

Titta på följande:

1. Till kursen finns en videoserie, "[Teknisk webbdesign och användbarhet](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)", kika på de videor som börjar på 3.

1. Det finns en videoserie "[Lär dig LESS](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-kTE6oaXLUNqII3cgTheEi)" som visar hur du kommer igång och jobbar med LESS. Spellistan visar grundkonstruktioner i LESS.



###Lästips {#lastips}

Se följande som extra men relevanta läsövningar. Det är närbesläktade koncept till kursmomentets innehåll.

1. [CSS Flexible Box](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Using_CSS_flexible_boxes) är en layoutmodell som försöker hantera olika skärmstorlekar och erbjuda en fleibel modell för webbutvecklaren att göra layout. I kursmaterialet används huvudsakligen layoutmodellen float, men flexbox nämns och exempel visas.

1. [CSS Grid layout](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Grid_Layout) är en standard (på gång) som kan erbjuda ett gridbaserat system med ren och standardiserad CSS.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



###Övningar {#ovningar}

Genomför följande övning för att förbereda inför uppgifterna.

1. Jobba igenom artikeln "[Använd ett vertikalt grid med Anax Flat](kunskap/anvand-vertikalt-grid-med-anax-flat)" som visar dig grunden i att implementera ett grid i CSS och LESS.

1. Jobba igenom artikeln "[Skapa ett horisontellt grid för typografi](kunskap/skapa-ett-horisontellt-grid-for-typografi)" som visar hur du skapar en vertikal rytm i din webbplats.



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Utför uppgiften "[Bygg ut ditt tema med stöd för vertikalt och horisontellt grid](uppgift/me-sida-med-grid)".



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur känns det att vara styrd till ett vertikalt grid, hämmande eller stödjande?
* Hur känns det att jobba med ett typografiskt horisontellt/baseline grid, ser du någon poäng med det?
* Berätta om hur du valde typsnitt till din webbplats.
* Har du jobbat med liknande layouttekniker sedan tidigare?
* Du börjar se hur man kan jobba med LESS, kommentarer på det?
* Hur uppfattade du nivån på detta kmom? Svårt, lagom, många nya begrepp?
