---
...
CImage för bildhantering
==================================

I ditt Anax Flat finns med ett skript för bildhanteringar. Via det skriptet kan du skala och processa bilder på ett flexibelt sätt.



Skapa katalogen `htdocs/cimage` {#skapa}
-----------------------------------

I din Makefile finns kod för att installera Cimage tillsamans med Anx Flat. Den sekvensen körs när du gör `site-build` och `site-update`. Du behöver alltså inte göra något extra för att installera Cimage.

Installationen av Cimage består av katalogen `htdocs/cimage` med följande innehåll.

| Fil      | Beskrivning      |
|----------|------------------|
| `imgd.php`        | Skriptet som skalar om bilden. |
| `imgd_config.php` | Konfigurationsfilen för skriptet som säger var bilder och cache-katalogen finns. |
| `icc/`            | Filer för färgprofiler, används vid konvertering till sRGB |

Det finns en [forumtråd som hanterar hur du konfigurerar Cimage](t/5907).



Skala om bilder {#skala}
-----------------------------------

Du kan testa att skala om en bild via följande länk.

`cimage/imgd.php?src=dbwebbisar.jpg&w=500`

Du bör få en bild som är 500 pixlar bred och ser ut så här.
![500px](cimage/imgd.php?src=dbwebbisar.jpg&w=500)

Om du aktiverar snygga länkar så kan du även nå bilden via följande länk.

`image/dbwebbisar.jpg?w=500&h=200&crop-to-fit`

Du bör få en bild som är 500 pixlar bred och 200 pixlar hög och ser ut så här.
![500x200](image/dbwebbisar.jpg?w=500&h=200&crop-to-fit)



Shortcode för figure {#figure}
-----------------------------------

Det finns en [shortcode för figure-elementet](anax/shortcodes#figure) som du kan kombinera tillsammans med Cimage.



Läs mer {#mer}
-----------------------------------

[Läs mer om Cimage](https://cimage.se/) för att se vilka möjligheter som finns till att beskära och behandla dina bilder.
