---
author: efo
revision:
    "2018-05-25": "(A, efo) Första versionen."
...
Normalisering av CSS
=======================

I denna del av guiden tittar vi på hur vi har möjlighet för att normalisera och nollställa webbläsarnas grund stilar. Vi utgår från grundstrukturen från [En grund i HTML](guide/design-med-html5-och-css3/en-grund-i-html) och tittar nu på hur det kan se ut i olika webbläsare.

[FIGURE src=image/design-guide/grund-firefox-chrome.png caption="Grundstrukturen i webbläsaren Firefox och Chrome."]

Vi ser i ovanstående exempel att de två webbläsare skiljer sig åt. Det är inte mycket men tillräckligt för att det kan ge problem senare i designprocessen. Vi vill därför nollställa, också kallat normalisera, stilen i de olika webbläsarna så vi har en bra utgångspunkt för designprocessen. Vi gör detta med hjälp av ett normaliseringsstylesheet `normalize.css`.

Vi laddar ner stylesheeten med följande kommando:

```bash
wget https://necolas.github.io/normalize.css/8.0.0/normalize.css -O normalize.min.css
```

Vi inkluderar `normalize.min.css` i vår HTML-grundstruktur så vi nollställer grundstilen i alla olika webbläsare som vi vill att våra hemsidor ska visas i.

```html
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Design med HTML5 och CSS3</title>

    <link rel="stylesheet" href="normalize.min.css" />
    <link rel="stylesheet" href="style.min.css" />
</head>
```

Vi har nu en nollställd stil i alla webbläsare och kan påbörja designprocessen utan att det uppstår problem som beror på grundstilen i webbläsaren.
