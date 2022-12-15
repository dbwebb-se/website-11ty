---
author: efo
revision:
    "2018-10-17": "(A, efo) Första versionen."
...
Specificitet
=======================

Vi tittade i föregående artikel [Hur kan vi använda CSS?](guide/design-med-html5-och-css3/hur-kan-vi-anvanda-css) på 4 olika sätt att designa med hjälp av `style`, `id`, `class` och via elementets typ. Men vilken regel är det då som gäller om flera av dessa regler gäller? Låt oss titta på ett exempel.

```html
<!-- HTML-dokumentet -->
<h1 class="yellow-header" id="blue-header" style="color: red;">
    Jag är en, ja vilken färg är det egentligen, rubrik
</h1>
```

```css
#blue-header {
    color: blue;
}

.yellow-header {
    color: yellow;
}

h1 {
    color: green;
}
```

Rubriken kommer i detta exemplet bli en röd rubrik och detta beror på specificitet. Regeln `style="color: red;"` är den mest specifika regeln för detta elementet och därav följer det att den regeln är den som gäller.

Ordningen för specificitet är som ordningen i artikeln [Hur kan vi använda CSS?](guide/design-med-html5-och-css3/hur-kan-vi-anvanda-css):

1. Styling med hjälp av `style` direkt på elementet.
1. Styling med hjälp av ID.
1. Styling med hjälp av klass.
1. Styling med hjälp av elementet.

Om du vill förkovra dig ytterligare i CSS specificitet är artikeln [CSS Specificity: Things You Should Know](https://www.smashingmagazine.com/2007/07/css-specificity-things-you-should-know/) från Smashing Magazine en bra start.



### Samma specificitet

Har vi två regler med samma specificitet är det regeln längst ner i CSS-filen som kommer gälla då den skriver över den ovanför. I exemplet nedan kommer rubriken bli en blå rubrik då `.blue-header` skriver över `.yellow-header`.

```html
<!-- HTML-dokumentet -->
<h1 class=" blue-header yellow-header">
    Jag är en blå rubrik
</h1>
```

```css
.yellow-header {
    color: yellow;
}

.blue-header {
    color: blue;
}
```
