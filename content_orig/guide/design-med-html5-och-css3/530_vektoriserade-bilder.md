---
author: efo
revision:
    "2018-10-11": "(A, efo) Första versionen."
...
Vektoriserade bilder
=======================

En sista metod för att använda bilder som ser bra ut för alla enheter och i alla storlekar är att använda vektoriserade bilder. En vektoriserad bild är i motsättning till en pixelbild skalbar till i princip det oändliga.

En vektoriserad bild kan läggas in i en webbsida på två olika sätt antigen som en helt vanlig bild.

```html
<img src="CSS3_logo.svg" alt="CSS3 logo svg" class="full-width" />
```

Eller så kan bilden inkluderas med hjälp av en `data-uri` där en base64-teckenkodat sträng läggs direkt i `src`-attributet. I exemplet nedan är strängen förkortad då den ursprungliga bilden innehåller mer än 5000 tecken.

```html
<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiB
BZG9iZSBJbGx1c3RyYXRvciAxNi4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW ...">
```


I exempel-mappen i katalogen `example/responsiva-bilder` finns exempel på hur man kan använda SVG-bilder. Och en jämförelse mellan en PNG och en SVG bild.
