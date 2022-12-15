---
author:
  - mos
  - efo
revision:
    "2018-11-12": (G, mos) Publicerat inför ht18 och design v2.
    "2018-10-19": (F, efo) Uppdatering med design guide.
    "2017-11-03": (E, mos) Genomgång inför ht17.
    "2016-12-02": (D, mos) Lade till videoserie om vgrid.
    "2016-10-26": (C, mos) Flyttad från 02 till 03 efter feedback.
    "2016-10-15": (B, mos) Testad och genomgången.
    "2016-06-22": (A, mos) Första utgåvan.
...
Kmom03: Grid, layout, typografi
====================================

[FIGURE src=image/snapht18/hgrid_showgrid.png?crop=250,150,left,top&a=10,0,0,0  class="right" caption="Vad är ett magiskt tal?"]

Låt oss titta på gridbaserad layout, ett grid som bestämmer var vi placerar ut innehållet på webbplatsens sidor.

Vi skall titta på ett **vertikalt grid** som ger oss kolumner tillsammans med mellanrum¸ *gutter*, som skapar ett vitt utrymme, så kallat *white space*. Här kan vi placera våra regioner i rader.

Vi tittar sedan vidare på ett **horisontellt grid** som vi även kan kalla ett *typografiskt grid*, eller ett *baseline grid* där syftet är att alla typografiska element vilar på en rad i ett tänkt horisontellt rutnät för att skapa en *vertical rythm* i de typografiska elementen. Vårt horisontella grid skall inte bara gälla de typografiska elementen utan samtliga element som placeras ut på webbsidan. Du kommer få lära dig innebörden av det magiska talet.

Vi bygger ut vårt tema med LESS-moduler som löser vertikalt och horisontellt grid. Vi jobbar vidare med responsiviteten, nu är utmaningen att göra gridet responsivt. Vi förbereder temat för att bli enkelt att styla med olika typsnitt.

<!--more-->

Ett vertikalt grid ger kolumner med mellanrum där webbsidans regioner skall platsa in.

[FIGURE src=image/snapht18/vgrid_showgrid.png?w=w3 caption="Placera ut webbsidans innehåll som regioner i ett rutnät (grid)."]

Vi jobbar med ett typografiskt grid och försöker få alla typografiska element att luta mot en linje.

[FIGURE src=image/snapht18/hgrid_showgrid.png?w=w3 caption="Skapa en grundtypografi som matchar ett horisontellt grid."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Introduktion {#intro}
-----------------------

I videoserien "[Kursen design (v2)](https://www.youtube.com/playlist?list=PLKtP9l5q3ce9mDpkLxSwyWh5sUPfq-Hip)" kan du kika på de videor som börjar på 3*. De ger dig en kort introduktion till detta kmom.

[YOUTUBE src="Q3GhH4-bVMU" list="PLKtP9l5q3ce9mDpkLxSwyWh5sUPfq-Hip" width=700 caption="Intro till kmom03."]



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*



### Kurslitteratur  {#kurslitteratur}

Läs följande:

1. Läs i boken "[The principles of Beautiful Web Design](kunskap/boken-the-principles-of-beautiful-web-design)".

    * Kap 1: Layout and Composition (repetera)
    * Kap 4: Typography



### Design med HTML5 och CSS3  {#guide}

1. Läs igenom följande sektion i guiden "[Design med HTML5 och CSS3](guide/design-med-html5-och-css3)".
    * [Grid och typografi](guide/design-med-html5-och-css3/grid-och-typografi)

I sektionen [Grid och typografi](guide/design-med-html5-och-css3/grid-och-typografi) tittar vi främst på hur typografi kan skapa lättläst och anpassat typografi på en webbplats. Sektionen avslutas med ett kort exempel på CSS Grid Layout en modern teknik för att skapa grid layouter.



### Grid-baserad layout {#grid}

Läs för att få en introduktion och översikt till gridbaserad layout och bakgrunden för ett vertikalt grid.

1. Läs två artiklar om "[History of the design grid I](https://99designs.com/blog/tips/history-of-the-grid-part-1/)" och "[History of the design grid II](https://blog.99cluster.com/blog/tips/history-of-the-grid-part-2/)" för att få en överblick om vad gridbaserad layout handlar om.

1. Läs översiktligt artikeln "[Technical Web Typography: Guidelines and Techniques](http://coding.smashingmagazine.com/2011/03/14/technical-web-typography-guidelines-and-techniques/)" och ta reda på vad ett typografiskt horisontellt rutnät i webblayout innebär. Denna artikel hanterar samma teknik som tas upp i uppgiften så se det som en bakgrundsartikel.



### Typografisk webb {#type}

Tänk dig en typografisk webbplats där all styling har lagts på de typografiska elementen. Hur kan det se ut? Läs och kika på följande resurser för att få en kort introduktion i ämnet.

1. Det finns en delvis skriven onlinebook "[En praktisk guide till typografi på webben](http://webtypography.net/)" som kan inspirerad dig när det gäller typografiska tekniker på webben. Läs följande kapitel i boken.
    * [Introduction](http://webtypography.net/intro/)
    * [2.2 Vertical Motion](http://webtypography.net/toc#2.2)

1. Det finns många typografiska element som kan vara vackra, men aningen svåra att få med i sin löpande text på webben. Kika i artikeln "[Typografiska element för webben med SmartyPants](coachen/typografiska-element-med-smartypants)" om vilken teknik som används till webbplatsen dbwebb när det handlar om att generera typografiska element.



### LESS moduler för grid {#desinax}

I uppgiften kommer du att integrera ditt tema med ett vertikalt grid och ett typgrafiskt grid. För att göra det kommer du att använda följande LESS-moduler. Börja med att snabbt läsa igenom deras README-filer och titta på exemplen för att bekanta dig med dem.

1. Vertikalt grid med [desinax/vertical-grid](https://github.com/desinax/vertical-grid/).
1. Typgrafiskt grid med [desinax/typografic-grid](https://github.com/desinax/typographic-grid/).



### Om responsivitet {#responsivitet}

Läs följande om responsivitet.

1. Läs artikeln "[Responsive Web Design Patterns](https://developers.google.com/web/fundamentals/design-and-ux/responsive/patterns)" som ger dig en insyn i olika mönster för hur man kan tänka när man stylar olika regioner för att uppnå responsivitet.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Utför uppgiften "[Bygg ut ditt tema med stöd för vertikalt och horisontellt grid](uppgift/bygg-ett-tema-med-vertikalt-och-horisontellt-grid)".

1. Försäkra dig om att du har gjort `dbwebb publishpure redovisa` och taggat din inlämning med version 3.0.0 (eller högre) samt pushat repot inklusive taggarna till GitHub.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur känns det att vara styrd till ett vertikalt grid, hämmande eller stödjande?
* Hur känns det att jobba med ett typografiskt horisontellt/baseline grid, ser du någon poäng med det?
* Berätta om hur du valde typsnitt till din webbplats.
* Har du jobbat med liknande gridbaserade layouttekniker sedan tidigare?
* Hur känns det att jobba med LESS och moduler? Lyckas du återanvända moduler mellan teman för kmom02 och kmom03?
* Hur gick det med din responsivitet för webbplatsen?
* Vilken är din TIL för detta kmom?




<!--
### Tekniker för att skriva för webben {#skriva}

1. Läs följande kapitel i guiden "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)".

    * Kap 4. Målgrupper - vem vill du nå?

1. Läs kort och översiktligt om [PHP Markdown Extra](https://michelf.ca/projects/php-markdown/extra/) som stöds av [klassen `CTextFilter`](https://github.com/mosbth/ctextfilter) som ligger bakom hur Markdown-texten i Anax Flat formatteras till HTML.
-->



<!--
###Webbdesign och användbarhet {#webbdesign}

Det finns inga artiklar.

Läs följande artiklar.

* Nilesen gridlayout
-->


<!--
1. [Primer](http://primercss.io/) är GitHub’s interna CSS ramverk. Deras manual finns på webben. Läs artiklarna där de kort beskriver sin [layout](http://primercss.io/archive/layout/) och [typografi](http://primercss.io/archive/type/). Se det som ett exempel på hur ett ramverk för grid och typografi kan se ut. (_note 2017: Google håller på och uppdaterar sitt ramverk_).
-->

<!--
### Video  {#video}

Titta på följande:

1. Till kursen finns en videoserie, "[Teknisk webbdesign och användbarhet](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)", kika på de videor som börjar på 3.

1. Det finns en videoserie "[Lär dig LESS](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-kTE6oaXLUNqII3cgTheEi)" som visar hur du kommer igång och jobbar med LESS. Spellistan visar grundkonstruktioner i LESS.
-->


<!--
### Lästips {#lastips}

Se följande som extra men relevanta läsövningar. Det är närbesläktade koncept till kursmomentets innehåll.

1. [CSS Flexible Box](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Using_CSS_flexible_boxes) är en layoutmodell som försöker hantera olika skärmstorlekar och erbjuda en fleibel modell för webbutvecklaren att göra layout. I kursmaterialet används huvudsakligen layoutmodellen float, men flexbox nämns och exempel visas.

1. [CSS Grid layout](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Grid_Layout) är en standard (på gång) som kan erbjuda ett gridbaserat system med ren och standardiserad CSS.
-->
