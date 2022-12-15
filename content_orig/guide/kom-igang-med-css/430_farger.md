---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Färger {#farger}
=======================

Färger och komponering av färger. Låt oss titta lite på detta område.



###Grunderna {#grunderna}

Vi använder ofta hexadecimala värden när vi specificerar färger på HTML-elementen. `#FFF` och `#FFFFFF` är vitt och `#000` eller `#000000` är svart.  En färg kan representeras av en eller två hexadecimala siffror. Själva färgkoden är enligt RGB (Red, Green, Blue) och varje siffra anger hur mycket färg av respektive som skall visas. Visar man ingen färg får man svart, visar man fullt av samtliga färger får man vitt. Detta kallas additiv färgblandning.

Läs kort och översiktligt de svenska (eller mer kompletta engelska) Wikipediasidor som hanterar additiv färgblandning och RGB.

[Additiv färgblandning (läs översiktligt efter intresse)](http://sv.wikipedia.org/wiki/Additiv_f%C3%A4rgblandning) eller [på engelska](http://en.wikipedia.org/wiki/Additive_color).  

[Färgskalan RGB (läs översiktligt efter intresse)](http://sv.wikipedia.org/wiki/RGB) eller [på engelska](http://en.wikipedia.org/wiki/RGB).  

Försök att gissa vilken färg respektive kod innebär: `#F00`, `#0F0`, `#00F`, `#999`. Facit finns i exemplet lite längre ned.

CSS innehåller ett antal fördefinerade färgnamn, några av de mer "färgglada" är: `dodgerblue`, `darksalmon`, `mistyrose`, `mediumspringgreen`, `burlywood`. Försök att gissa hur färgerna ser ut.

Hur gör man om man vill ha en ljusröd färg, eller mörkröd, kan man klura ut det genom att bara titta på RGB-koden? Fundera lite.

Här kommer facit. Lek runt med färgerna och se om du kan behärska dem.

[Exempel med färgkoder](https://codepen.io/dbwebb/pen/Nzwmda).

[FIGURE src=/image/htmlphp/kmom04/colorcodes.png?w=w2 caption="Ett exempel med varianter på färger."]

[Studera kort CSS3 modulspecen som hanterar färger](http://www.w3.org/TR/css3-color/).  

[Forumet har en tråd om HTML och färgnamn](t/115).



###Ett färgverktyg, Colorzilla {#colorzilla}

Ibland hittar man en cool färg på en webbplats och tänker, "den färgen skulle jag ha på min webbplats". Då vore det bra att få lite hjälp med att finna färgkoden. Du kan använda Firebug till detta, du kan hitta färgkoden i stylesheeten. Ett annat verktyg som kan hjälpa dig är ColorZilla. ColorZilla är en AddOn till Firefox och integreras i din webbläsare.

[Firefox AddOn Colorzilla](http://www.colorzilla.com/firefox/).



###HSL, HSLA och genomskinliga färger {#hsla}

Ett alternativt sätt att ange färger är via HSL, Hue, Saturation och Light. Det finns även möjlighet att ange graden av genomskinlighet på en färg, det görs med alpha-kanalen. Funktionerna för att göra detta i CSS heter `hsl()` och `hsla()` (a för alpha).

| Vad        | Beskrivning |
|------------|-------------|
| Hue        | 0-360 grader. Färgen representeras av gradtalet där 0 är röd, 120 är grön, 240 är blå. |
| Saturation | 0-100%. Färgmättnad, hur mycket av färgen skall användas. 0 är ingen färg och 100 är maximalt med färg. 100 är normalvärdet. |
| Light      | 0-100%. Hur ljus skall färgen vara. 0 är ljus och 100 är mörk. Normalvärdet är 50. |
| Alpha      | 0-1. Hur genomskinlig är färgen. 0 är fullt genomskinlig och 1 är ej genomskinlig. |

Med ledning av detta kan vi alltså återskapa färgerna röd, grön och blå. Gissningsvis borde det bli `hsl(0, 100%, 50%)`, `hsl(120, 100%, 50%)` samt `hsl(240, 100%, 50%)`. Kan du räkna ut vilken färg som är vilken?

Här är ett exempel på olika [färger angivna med HSL och HSLA](https://codepen.io/dbwebb/pen/zaPXZb).

[FIGURE src=/image/htmlphp/kmom04/colorhsla.png?w=w2 caption="Färgkombinationer med HSL och HSLA."]

För en nybörjare på färger så kan det underlätta att använda HSL/HSLA-sättet för att ange färger. Man kan välja en färg (hue, gradtalet) och därefter justera nyanserna på den genom att ändra saturation eller light. Det kan vara enklare att förstå tillvägagångssättet i HSL än hur man gör motsvarande via RGB-skalan.

Om du är intresserad av [HSL så kan du läsa mer på Wikipedia](http://en.wikipedia.org/wiki/HSL_and_HSV).



###Hjälpmedel för att kombinera färger på en webbplats {#hjalpmedel-farger}

Det finns många tips och trix om hur man kan färglägga en webbplats. Det är en vetenskap i sig. Ett av de verktyg jag fastnat för är en applikation där jag kan [välja färger enligt både hsl och rgb](/repo/htmlphp/example/colors/colorpicker.html). Ett liknande verktyg är bra att ha i en webbprogrammerares verktygslåda.

En artikel om färgschema kan du också hitta på Wikipedia, där namnges flera av de vanliga typerna av färgschema, tex monochromatic, analogous, complementary, triadic, tetradic med flera.  

[Introduktion till färgkunskap på Wikipedia](http://en.wikipedia.org/wiki/Color_scheme).

En fördjupning om att välja färger till en webbplats, och olika tekniker för det, lämnar vi til en framtida kurs med inriktning mot webbdesign.
