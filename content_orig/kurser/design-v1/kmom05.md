---
author: mos
revision:
    "2017-11-27": (C, mos) Genomgången inför ht17.
    "2016-11-28": (B, mos) La till manualen om CImage som läsresurs.
    "2016-11-15": (A, mos) Första utgåvan.
...
Kmom05: Bild
====================================

[FIGURE src="image/dbwebbisar.jpg?w=200&h=150&a=0,20,20,50&cf" class="right"]

Låt oss ägna ett kursmoment åt att testa runt med bilder och publicera dem på en webbplats.

Vi behöver vara medvetna om att bilder kan vara tunga att ladda och det vill vi hitta sätt att hantera. Hur tunga (stora) behöver bilder vara när de skall visas på en webbplats? Behöver de vara lika tunga på en desktop och på en mobil enhet?

Kan man ha olika bilder som visas på olika enheter? Det låter som en vettig idé men fungerar det i dagsläget?

<!--more-->

[FIGURE src="image/dbwebbisar.jpg?w=200&h=150&a=0,20,20,50&cf" class="left"]

Är det skillnad på foton och skärmdumpar? Ja, det är en fråga man skulle vilja ha svar på.

Om man vill beskära bilder, är det vettigt och hur gör man då? Vi har ju alltid fotoredigeringsprogram likt Gimp, men låt oss kika på alternativ som kan passa en webbprogrammerare.

Låt oss testa runt och placera och beskära dessa bilder för att visa att vi bemästrat området. Inklusive responsivitet med bilder via en LESS modul.

Innan du påbörjar kursmomentet så kan du ta en sväng ut i skogen, eller staden, ta med din kamera och fota loss lite. Så får du lite material att lägga upp på din me-sida.

[FIGURE src="image/dbwebbisar.jpg?w=200&h=150&a=0,20,20,50&cf" class="center"]

Vi har många frågeställningar om bilder, men låt se om vi kan bringa klarhet i några av dem.

[FIGURE src="image/dbwebbisar.jpg?w=700"]
[FIGURE src="image/dbwebbisar.jpg?w=500"]
[FIGURE src="image/dbwebbisar.jpg?w=300"]
[FIGURE src="image/dbwebbisar.jpg?w=100"]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. Läs i boken "[The principles of Beautiful Web Design](kunskap/boken-the-principles-of-beautiful-web-design)".

    * Kap 5 Imagery



###Tekniker för att skriva för webben {#skriva}

1. Läs följande kapitel i guiden "[Skriva för webben](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/)".

    * 6. Skriva texter för webben



###Webbdesign och användbarhet {#webbdesign}

1. Läs översiktligt igenom artikeln "[Moz om Page Speed](https://moz.com/learn/seo/page-speed)". Den förbereder dig för en av uppgifterna.

1. Kika snabbt på Googles "[PageSpeed Insights Rules](https://developers.google.com/speed/docs/insights/rules)" för att snabba upp sidor.



###Video  {#video}

Kika på följande video.

1. Moderskeppet är duktiga på foto och video, du kan hämta inspiration från deras fria youtube-kanal. Jag hittade att följande spellistor känns delvis relevanta för detta kursmoment.

    * [Guider om Foto](https://www.youtube.com/playlist?list=PL7jFK1saS1_Aexc_tx2wWClpQOShZkD2_)
    * [Inspiration för fotografer](https://www.youtube.com/playlist?list=PL7jFK1saS1_DGvKLYHOBb9HlCd_6id-vS)
    * [Bilder och upphovsrätt för designers](https://www.youtube.com/playlist?list=PL7jFK1saS1_DYHuwI_r5U7vVeY6RhZlIM)

<!--
Titta på följande:

1. Till kursen finns en videoserie, "[Teknisk webbdesign och användbarhet](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93K_FQtlmz2rcaR_BaKIET)", kika på de videor som börjar på 5.
-->



###Lästips {#lastips}

Kika igenom följande tips.

1. [GIMP](https://www.gimp.org/) är en fri variant till bildbehandlingsprogram. Det kan vara ett bra verktyg att ha installerat, även om man är webbprogrammerare.

1. [Inkscape](https://inkscape.org/en/) är ett fritt program för att rita och hantera bilder i vektorgrafik såsom SVG. Ett typiskt bra verktyg att ha i sin verktygslåda som webbprogrammerare.

1. Snapshot-verktyg vill du integrera i din verktygslåda, du vill ha ett verktyg där du enkelt kan ta en snapshot på hela eller delar av skärmen eller på en specifik applikation. Det är smidigt om det är kopplat ett ritverktyg till ditt snapshot-verktyg, då kan du snabbt och enkelt förtydliga din snapshot. Ett tips är att aldrig skala om bilder som bygger på snapshots, du får bäst kvalitet om du tar en snapshot i den storleken den skall vara och visas. På Linux använder jag ett verktyg som heter Shutter.

1. Verktyg som hjälper dig att analysera bild-filer och göra enkla och mer svåra konverteringar av bildfilerna, eller batcher av bild-filer, är [ImageMagick](imagemagick.org/) med kommandoradsverktygen convert/identify. Dessa går att installera på både Windows, Mac OS och Linux. 



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



###Övningar {#ovningar}

Genomför följande övning för att förbereda inför uppgifterna.

1. Gå översiktligt igenom [manualen för Cimage](https://cimage.se/), för att få en uppfattning om koncepten kring bildhantering. Cimage är ett PHP-skript som kan beskära och hantera bilder för webbruk. Via dess manual kan du få insyn i olika bildformat och hur bilder rent generellt kan hanteras för webbruk. Cimage är redan en del av din installation av Anax Flat.

1. I kursrepot `example/figure` finns två exempel som visar hur man kan jobba med `<figure>` och uppnå responsiva bilder. Studera och undersök exemplet och försök förstå hur det fungerar och hur det är uppbyggt. Där hittar du LESS-kod du kan låna till uppgiften.
    * [Figure and figcaption](repo/design/example/figure/figure.html)
    * [Figure and figcaption med media queries](repo/design/example/figure/figure-responsive.html)

1. Pröva att bygga en enkel blogg i Anax Flat genom att studera exempel på [hur man gör en blogg i Anax Flat](anax/gor-en-blogg) i Anax läs igenom hur du kan använda [shortcodes i Markdown](anax/shortcodes).


<!--
Installera LESS-modulen via npm https://www.npmjs.com/package/@desinax/figure.

Artikel om hjälpverktyg för bildhantering.
    * Var hittar jag fria bilder?
    * Bilder kan man köpa?

Artikel om att spara utrymme i img/-katalogen. (använd bash-skriptet för att testköra och installera några av postprocessingverktygen)

Bildlära, vad tänka på om bilder.

Fotolära, hur ta fotografier.

Image sprites.

jpeg (foton) kontra png (skärmdump)
color space
storlek på bilderna
kvalitet

-->


###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Utvärdera webbplatsers laddningstid och användbarhet](uppgift/utvardera-webbplatsers-laddningstider-och-anvandbarhet)".

1. Integrera din webbplats så den drar nytta av [CImage](anax/cimage-for-bildskalning) och [snygga länkar](anax/snygga-lankar). Du behöver därefter inte ladda onödigt stora bilder i din webbplats. Använd shortcoden för FIGURE så blir din Markdown-kod snyggare och enklare att läsa.

1. Gör uppgiften "[Bygg ut ditt Anax Flat tema med stöd för bilder](uppgift/anax-flat-tema-med-bilder)". Du skall bygga en blogg som är full av bilder och på det sättet visa upp att du behärskar bildhanteringen med Cimage, FIGURE och LESS-modulen som stylar figure-elementet.



###Extra {#extra}

Följande extrauppgifter finns.

1. Läs om begreppet responsive images i följande två artiklar som visar hur man kan använda `picture`, `srcset` och `sizes` för att jobba responsivt med att ladda bilder av olika storlekar till olika skärmstorlekar. Fundera på om det kan vara något för din me-sida.
    * [AlistApart: Responsive Images in Practice (2014)](http://alistapart.com/article/responsive-images-in-practice)
    * [AlistApart: Using Responsive Images (Now) (2015)](http://alistapart.com/article/using-responsive-images-now)



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Berätta kort om erfarenheterna med din undersökning av webbplatsers laddningstid.
* Har du några funderingar kring Cimage och dess nytta och features?
* Lyckades du uppnå ett bra sätt och en LESS-struktur för att jobba med dina bilder i webbplatsen?
* Om du gjorde extrauppgiften med `picture`, `srcset` och `sizes`, fick du någon känsla för för- och nackdelar med konceptet?
