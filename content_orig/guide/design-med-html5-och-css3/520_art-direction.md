---
author: efo
revision:
    "2018-10-11": "(A, efo) Första versionen."
...
Art direction
=======================

Vi har nu möjlighet för att använda olika varianter av samma bild beroende på pixeldensitet, men ofta vill man visa olika beroende på enhetens storlek och orientering. Då en mobil enhet ofta används i stående orientering och en dator liggande orientering vill vi ha en möjlighet för att visa olika delar av samma bild beroende på storleken på användarens enhet.

Detta kan vi göra med hjälp av `picture` som i det följande exemplet.

```html
<picture>
    <source media="(min-width: 668px)" srcset="sheep.jpg, sheep@2x.jpg 2x">
    <source media="(min-width: 376px)" srcset="sheep-small-landscape.jpg">
    <img src="sheep-small-portrait.jpg" class="max-width" alt="sheep">
</picture>
```

I ovanstående exempel visar vi 4 olika bilder beroende på bredden på användarens enhet och pixeldensitet. Som utgångspunkt visar vi bilden `sheep-small-portrait.jpg`. Har enheten en minimumsbredd på 376px använder vi bilden `sheep-small-landscape.jpg`. Har enheten en minimumsbredd på 668px använder vi antigen `sheep.jpg` eller `sheep@2x.jpg` beroende på pixeldensiteten.

I exempel-mappen i katalogen `example/responsiva-bilder` finns exempel på hur man kan använda `picture` för att leverera olika bilder beroende på enhetens storlek.
