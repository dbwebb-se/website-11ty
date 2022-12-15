---
author: mos
category: webbprogrammering
updated: "2015-05-25 11:15:31"
created: "2015-05-25 11:15:22"
...
Skapa bilder för din webbplats med SVG-clipart
==================================

Vill du fräscha upp din webbplats med lite snygga bilder? Men du är inte så bra på att rita eller har inte tiden? Letar efter bilder att återanvända?

För min egen del använder jag gärna SVG, Scalable Vector Graphics, för att lösa detta. En snabb guide följer.

<!--more-->

1) Gå till [Open Clipart](http://www.openclipart.org/) och sök efter bilder. 

[FIGURE src=/image/snapvt15/snickare-openclipart.png?w=w2 caption="Sökning på snickare i openclipart."]

Sök bilder och ladda hem dem till din egen dator.


2) Ladda hem och bearbeta bilderna, eller slå ihop flera bilder till ett collage, i ritverktyget [Inkscape](http://inkscape.org/).

[FIGURE src=/image/snapvt15/snickare-inkscape.png?w=w2 caption="Bearbeta bilden i Inkscape."]


3) Exportera bilden till png och använd i din webbapplikation.

SVG-bilderna är skalbara och vektorbaserade, man kan minska och förstora dem utan att de tappar kvalitet och skärpa. Det är enkelt att exportera till andra format, till exempel PNG.

Du kan även använda SVG-bilden direkt i webbläsaren. Här är ett exempel på ett [hängagubben i webbläsaren som bygger på en SVG-bild](kod-exempel/hangman/playhangman.php) och här är ett exempel som visar en [SVG-bild inline och kan påverkas av JavaScript via klasser i CSS](kod-exempel/hangman-svg/hangman-inline-svg.html).

Läs mer om SVG:

* [SVG på Wikipedia](http://en.wikipedia.org/wiki/Scalable_Vector_Graphics)
* [SVG på W3C](http://www.w3.org/Graphics/SVG/)
