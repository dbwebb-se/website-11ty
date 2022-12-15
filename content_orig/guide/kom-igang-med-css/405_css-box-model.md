---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
CSS Box Model {#css-boxmodel}
=======================

Vi tittar på exempel av CSS box modell, collapsing margins och outline.


###Modellen {#modellen}

CSS har en "Box Model" som definerar hur margin, border, padding och content förhåller sig till varandra. Nedanstående bild exemplifierar.

[FIGURE src=/image/htmlphp/kmom04/image10.png?w=w2 caption="CSS box modell med margin, border, padding och content".]

Med hjälp av denna modell kan man placera ut sitt innehåll (content) på önskad plats. Se följande exempel som ritar ut en div, stylad med både margin, border och padding.

[Exempel på "box model"](https://codepen.io/dbwebb/pen/RJjqgm)

Lek runt och ändra exemplets värden på margin, border och padding tills du har klart för dig hur det hänger ihop.

CSS box modell är nödvändig att ha koll på. Det är en av grunderna i CSS.


###Collapsing margins {#collapsing}

Vad händer när man placerar två objekt bredvid varandra, där båda har marginaler? Låt oss testa ett exempel.

[Marginaler som kollapsar](https://codepen.io/dbwebb/pen/gKXQXY).

Marginalerna äter upp varandra, endast en blir kvar. Testa att ändra värden för margin och se hur det påverkar.

Det är bra att veta hur marginalerna beteer sig. Det gör det enklare att placera ut elementen på ett önskvärt sätt.


###Outline {#outline}

Outline ger en möjlighet att rita en ram kring ett element, utan att den ramen tar upp något utrymme. Se följande exempel.

[En outline](https://codepen.io/dbwebb/pen/gKXQoO).

Ändra storleken på outlinen och se vad som händer. Testa tills du ser du det hänger ihop.

Det är bra att veta att outline finns, ibland ser man en ram kring en länk man tryckt på, eller en knapp, eller en bild, det kan vara outlinen. För egen del brukar jag ofta sätta `outline:0` för bilder i stylesheeten, på det viset slipper jag dess default-beteende.



###Sammanfattningsvis {#sammanfattning-1}

Facit och bakgrund hittar vi i specifikationerna. Följande dokument är relevanta, klicka upp dem och skrolla snabbt igenom dem. Du behöver inte läsa dem i detalj.

* [Box modell](http://www.w3.org/TR/CSS2/box.html)
* [Outline](http://www.w3.org/TR/CSS2/ui.html#propdef-outline)

Använd Cheatsheet, eller litteraturen, för att slå upp de enskilda konstruktionerna.
