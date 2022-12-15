---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Styla formulär {#styla-formular}
=======================

CSS väljer ut delarna som ett formulär ska stylas på lite annorlunda än tidigare (element, id eller klass). Vi använder elementet och dess tillhörande attribut för att nå delarna. Ett exempel för att nå `input` elementet som har attributet `type` satt till `text`:

```css
input[type=text] {

}
```

[FIGURE src=/image/htmlphp/kmom05/formular.png?w=w2 caption="Ett stylat formulär."]

Studera exemplet på [Codepen](https://codepen.io/dbwebb/pen/jKajEb). Testa och lek.
