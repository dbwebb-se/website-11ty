---
author: mos
revision:
    "2017-11-17": (C, mos) Genomläst ingör ht17, förtydliganden.
    "2016-10-26": (B, mos) Bytte plats från kmom03 till kmom04.
    "2016-10-21": (A, mos) Första utgåvan.
...
Kmom04: Färg
====================================

Låt oss leka runt lite genom att skapa olika stilar, teman, för vår webbplats. Säg att vi skall skapa ett antal teman, ett ljust tema, ett mörkt, ett färgfullt och ett tema som står ut på grund av sin typografi. Det blir flera teman. Finns det något bra sätt att organisera sin LESS-kod så att man bygger upp en struktur som gör det enkelt att återanvända delar av ett tematemats bas-kod?

Låt oss se hur vi kan strukturera LESS-koden på ett smart sätt och samtidigt lära oss grunderna i vissa designkoncept.

De designkoncept vi först väljer att fokusera på är färglära och typografi. Vi tittar på hur man väljer färger och vi prövar olika typografiska val och vi utvärderar hur dessa val påverkar vår design.



<!--more-->

[FIGURE src=/image/snapht16/theme-base.png?w=w2 caption="Detta är mitt bastema i exemplet."]

[FIGURE src=/image/snapht16/theme-custom.png?w=w2 caption="Detta är mitt anpassade `custom` tema."]

[FIGURE src=/image/snapht16/theme-variables.png?w=w2 caption="Nu har jag ytterligare anpassat genom att ändra värden för variabler."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. Läs i boken "[The principles of Beautiful Web Design](kunskap/boken-the-principles-of-beautiful-web-design)".

    * Kap 2: Color
    * Kap 4: Typography (repetera)



###Tekniker för att skriva för webben {#skriva}

1. Läs följande kapitel i guiden "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)".

    * 5. Rubriker som ger resultat



###Webbdesign och användbarhet {#webbdesign}

Lös följande artiklar.

1. Läs artikeln "[The Characteristics of Minimalism in Web Design](https://www.nngroup.com/articles/characteristics-minimalism/)".

1. Läs artikeln "[An Introduction to Color Theory for Web Designers](https://webdesign.tutsplus.com/articles/an-introduction-to-color-theory-for-web-designers--webdesign-1437)" som ger insyn i hur man väljer färger för en webbplats.

1. Läs [kapitel 13 i boken Web Design - The Complete Reference](http://www.webdesignref.com/chapters/13/ch13-16.htm). Det handlar om "Color and Usability" och "The Hidden Meaning of Colors" och ger en kort introduktion till färger och webbdesign.

1. Kika snabbt igenom artikeln "[A More Modern Scale for Web Typography](http://typecast.com/blog/a-more-modern-scale-for-web-typography)". Poängen med artikeln är att hantera typsnitt på ett responsivt sätt. Fundera igenom om detta konceptet är något för dig.

1. Gå tillbaka till boken [En praktisk guide till typografi på webben](http://webtypography.net/) och se om du hitta något kapitel i den som kan inspirera dig till typografiska mästerverk i dina teman.


<!--
###Video  {#video}

Det finns inga videor.
-->

<!--
Titta på följande:

1. Till kursen finns en videoserie, "[Teknisk webbdesign och användbarhet](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)", kika på de videor som börjar på 4.
-->



###Lästips {#lastips}

Följande tips hjälper dig igenom kursmomentet.

1. Leta reda på en färgväljare (color chooser) som hjälper dig att välja färger och förstå färgscheman som monokromatiskt, kompletterande och triadiskt.

1. Läs på om grunderna om färgteori och om hur man kan blanda dem förutsatt olika färgscheman.

1. Ta reda på vad en färgpalett (color palette) innebär för en webbplats och studera exempel på färgpaletter.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



###Övningar {#ovningar}

Genomför följande övning för att förbereda inför uppgifterna.

1. I uppgiften används en temaväljare som finns i ditt Anax Flat. [Läs om temaväljaren](anax/jobba-med-temavaljaren) och se hur du kan konfigurera den och använda olika LESS-filer som grund till ett tema och din kommande familj av teman.

1. Läs igenom artikeln "[Skapa en familj av teman till Anax Flat](kunskap/skapa-en-familj-av-teman-till-anax-flat)". Artikeln ger dig viss orientering i hur man kan tänka kring familjer av teman och visst underlag i konstruktioner som är bra att ha.




###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Utvärdera webbplatsers färgval och känslan de signalerar](uppgift/utvardera-webbplatsers-fargval-och-kanslan-de-signalerar)".

1. Utför uppgiften "[Bygg en bas och en familj av teman](uppgift/en-bas-och-en-familj-av-teman)".



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur känner du inför färger och webbplatser? Föredrar du något särskilt ljust, mörkt, färgglatt?
* Har du funderat på hur webbplatsers färgskala och färgsättning påverkar besökarens känsla av webbplatsen? Bidrar val av typsnitt till den känslan?
* Hur känns din LESS-struktur så här långt?
* Hur valde du att göra med ditt eget `default` tema?
* Var det något särskilt som du uppfattade som utmanande i detta kmom?
