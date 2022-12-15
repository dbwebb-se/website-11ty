---
author: nik
revision:
    "2020-12-03": "(A, nik) Första versionen."
...
Highlight av bilder utan alt
=======================

Det är lätt att vara lat som webbutvecklare och inte skriva `alt=`-attributet på alla bilder vi lägger till. Men det är viktigt att ha med sett utifrån ett tillgänglighetsperspektiv. Ett enkelt sätt att hitta om man saknar några `alt=` på sin sida är att lägga till följande kod i sin stylesheet.

```css
img:not([alt]) {
    outline: 4px red dashed !important;
}
```

Med denna kod så får alla bilder som saknar en `alt` en röd outline. Nedanför kan ni se ett exempel på hur det kan se ut:

[FIGURE src=image/design-v3/highlight-alt.png caption="Outline på bild utan alt-attributet"]

När man lagt till en `alt` på samtliga bilder så kan man givetvis ta bort CSS-regeln igen, för att inte skicka med onödig data till klienten.
