---
author: efo
revision:
    "2018-05-25": "(A, efo) Första versionen."
...
En grund i HTML
=======================

I denne del ska vi titta på den grundläggande strukturen vi använder som utgångspunkt när vi skapar en hemsida. Vi börjar med att deklarera att det är HTML vi vill skriva i dokumentet. Vi har sedan två barnelement `<head>` och `<body>` som finns i rot-elementet `<html>`.

I `<head>` använder vi två meta-taggar som talar om för webbläsaren att vi tänker använda UTF-8 teckenkodning och att webbläsaren får skala om innehållet så det är anpassat för olika enheter. Vi har även inkluderat en titel-tag (`<title>`) som talar om för webbläsaren vilket innehåll som finns på denna sida. Vi importerar även ett stylesheet `style.min.css`, som vi under kursens gång kan fylla med CSS för att designa våra webbplatser.

I `<body>` har vi definierat ett `<main>`-element som innehåller en rubrik och en paragraf.

```html
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Design med HTML5 och CSS3</title>

    <link rel="stylesheet" href="style.min.css" />
</head>
<body>
    <h1>Design med HTML5 och CSS3</h1>
    <p>I denne guide tittar vi på design med HTML5 och CSS3</p>
</body>
</html>
```

Nedan ser vi hur vi ovanstående HTML-kod kan se ut i en webbläsare.

[FIGURE src=image/design-guide/grund.png caption="Grundstrukturen i webbläsaren Firefox."]
