---
author:
  - mos
  - efo
revision:
    "2018-11-28": (F, mos) Läsanvisning om färgteori.
    "2018-11-19": (E, mos) Publicerat för design v2.
    "2018-10-19": (D, efo) Uppdatering med design guide.
    "2018-06-08": (C1, mos) Nytt dokument inför uppdatering av kursen.
    "2017-11-17": (C, mos) Genomläst ingör ht17, förtydliganden.
    "2016-10-26": (B, mos) Bytte plats från kmom03 till kmom04.
    "2016-10-21": (A, mos) Första utgåvan.
...
Kmom04: Färg
====================================

Vi tittar på färger, färghjulet och olika tekniker för att kombinera färger i ett sammanhang, så kallade färgscheman.

Ett akromatiskt färgschema med vitt, svart och nyanser av grått.

<table style="border-spacing: 4px; border-collapse: separate">
<tr>
<td style="height: 50px; width: 50px; background-color: #000">
<td style="height: 50px; width: 50px; background-color: #333">
<td style="height: 50px; width: 50px; background-color: #666">
<td style="height: 50px; width: 50px; background-color: #999">
<td style="height: 50px; width: 50px; background-color: #ccc">
<td style="height: 50px; width: 50px; background-color: #eee">
</tr>
</table>

Ett monokromatiskt färgschema med en basfärg och olika nyanser av den.

<table style="border-spacing: 4px; border-collapse: separate">
<tr>
<td style="height: 50px; width: 50px; background-color: #500">
<td style="height: 50px; width: 50px; background-color: #a44">
<td style="height: 50px; width: 50px; background-color: #d46a6a">
<td style="height: 50px; width: 50px; background-color: #faa">
</tr>
</table>

Ett _complementary_ färgschema med en röd basfärg och två komplementfärger (blå/grön) på motsvarande sida av färghjulet, som kan användas som försiktigt som accentfärger eller för att kraftfullt färglägga webbplatsen.

<table style="border-spacing: 4px; border-collapse: separate">
<tr>
<td style="height: 50px; width: 50px; background-color: #500">
<td style="height: 50px; width: 50px; background-color: #aa3939">
<td style="height: 50px; width: 50px; background-color: #d46a6a">
<td style="height: 50px; width: 50px; background-color: #a44">
<td style="height: 50px; width: 50px; background-color: #246c60">
<td style="height: 50px; width: 50px; background-color: #43877b">
<td style="height: 50px; width: 50px; background-color: #729c34">
<td style="height: 50px; width: 50px; background-color: #9bc362">
</tr>
</table>

Vi jobbar med tekniker kring hur en webbplats kan färgläggas. Men innan det funderar vi igenom om de vanligaste webbplatsern är färgglada eller inte? Det kan vara så att många webbplatser har ett begränsat användande av färger. Om det stämmer, hur kan det komma sig?

Vi skapar en knapp handfull teman för att jobba med färger och typografi och samtidigt träna oss i att organisera LESS-koden så att den blir återanvändbar mellan olika teman. Att använda LESS-variabler (och moduler) gör att vi kan återanvända ett bastema och anpassa det för olika sammanhang.

Vi gör även ett en studie om webbplatsers val av färger och typografi där vi skriver en rapport som vi publicerar i vår redovisa-sida. Rapporten kan man välja att lösa i grupp eller enskilt.



<!--more-->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*


### Kurslitteratur  {#kurslitteratur}

Läs följande:

1. Läs i boken "[The principles of Beautiful Web Design](kunskap/boken-the-principles-of-beautiful-web-design)".

    * Kap 2: Color
    * Kap 4: Typography (repetera)



### Design med HTML5 och CSS3  {#guide}

1. Läs igenom följande sektion i guiden "[Design med HTML5 och CSS3](guide/design-med-html5-och-css3)".
    * [Färg](guide/design-med-html5-och-css3/farg)

I sektionen [Färg](guide/design-med-html5-och-css3/farg) tittar vi på hur vi kan använda färg för att skapa en specifik känsla på en webbplats. Vi börjar med en kort introduktion till färgteori för att gå vidare till hur vi kan välja vilka färgar som fungerar tillsammans.



### Färg {#color}

Lös följande artiklar för att få en bakgrund i allmän layout kopplad till färger och färgscheman.

1. Läs artikeln "[The Characteristics of Minimalism in Web Design](https://www.nngroup.com/articles/characteristics-minimalism/)". Artikeln sammanställer ett antal webbplatsers karaktäristik och diskuterar kring valet av stil och färgval. Fokuset är på minimalism, att "hålla det enkelt".

1. Läs artikeln "[An Introduction to Color Theory for Web Designers](https://webdesign.tutsplus.com/articles/an-introduction-to-color-theory-for-web-designers--webdesign-1437)" som ger insyn i hur man väljer färger och färgshema för en webbplats.

1. Läs [kapitel 13 i boken Web Design - The Complete Reference](http://www.webdesignref.com/chapters/13/ch13-16.htm). Det handlar om "Color and Usability" och "The Hidden Meaning of Colors" och ger en kort introduktion till färger och webbdesign.



### Om färgteori {#farg}

Läs följande artikel "Traditional and Modern colour theory", om du finner den intressant. Det handlar om färgteori, varainter av färghjul och hur färgteori lärs ut kontra dess historik.
    * [Part 1: Modern colour theory](http://www.huevaluechroma.com/001.php)
    * [Part 1: Traditional colour theory strikes back](http://www.huevaluechroma.com/002.php)



### Om responsivitet {#responsivitet}

Läs följande om responsivitet.

1. Kika snabbt igenom artikeln "[A More Modern Scale for Web Typography](http://typecast.com/blog/a-more-modern-scale-for-web-typography)". Poängen med artikeln är att hantera typsnitt på ett responsivt sätt. Fundera igenom om detta konceptet är något för dig.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Utvärdera webbplatsers färgval och känslan de signalerar](uppgift/utvardera-webbplatsers-fargval-och-kanslan-de-signalerar)". Du skall göra en analys av webbplatser och skriva en kort rapport. jobba enskilt eller i grupp. Spara allt i `me/redovisa`. 

1. Utför uppgiften "[Teman med färger och typografi](uppgift/teman-med-farger-och-typografi)". Spara allt i `me/redovisa`.

1. Försäkra dig om att du har gjort `dbwebb publishpure redovisa` och taggat din inlämning med version 4.0.0 (eller högre) samt pushat repot inklusive taggarna till GitHub.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Kommentera kort om skrivuppgiften, någon som är värt att nämna från arbetet med den?
* Berätta kort om din tanke bakom respektive teman, hur tolkade du "minimalistisk", "colorful" och "dark".
* Vilket färgschema valde du till respektive tema och hur valde du att använda färgerna (mer eller mindre eller lika mycket av alla färger)?
* Valde du att jobba med accentfärg och isåfall hur?
* Hur tänkte du kring valet av typografi?
* Berätta om din kodstruktur av teman, jobbade du med bastema och hur löste du anpassningarna till de olika temana?
* Vilken är din TIL för detta kmom?


<!--stop-->

<!--
Titta på följande:

1. Till kursen finns en videoserie, "[Teknisk webbdesign och användbarhet](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)", kika på de videor som börjar på 4.
-->



<!--
### Lästips {#lastips}

Följande tips hjälper dig igenom kursmomentet.

1. Leta reda på en färgväljare (color chooser) som hjälper dig att välja färger och förstå färgscheman som monokromatiskt, kompletterande och triadiskt.

1. Läs på om grunderna om färgteori och om hur man kan blanda dem förutsatt olika färgscheman.

1. Ta reda på vad en färgpalett (color palette) innebär för en webbplats och studera exempel på färgpaletter.
-->


<!--
### Övningar {#ovningar}

Genomför följande övning för att förbereda inför uppgifterna.

1. I uppgiften används en temaväljare som finns i ditt Anax Flat. [Läs om temaväljaren](anax/jobba-med-temavaljaren) och se hur du kan konfigurera den och använda olika LESS-filer som grund till ett tema och din kommande familj av teman.

1. Läs igenom artikeln "[Skapa en familj av teman till Anax Flat](kunskap/skapa-en-familj-av-teman-till-anax-flat)". Artikeln ger dig viss orientering i hur man kan tänka kring familjer av teman och visst underlag i konstruktioner som är bra att ha.
-->




<!--
### Tekniker för att skriva för webben {#skriva}

1. Läs följande kapitel i guiden "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)".

    * 5. Rubriker som ger resultat
-->
