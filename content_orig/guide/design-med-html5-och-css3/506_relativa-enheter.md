---
author: efo
revision:
    "2018-11-14": "(A, efo) Första versionen."
...
Relativa enheter
=======================

När vi anpassar text för en liten skärm bryts raderna per automatik när en rad inte längre får plats på skärmen. När vi använder bilder har vi inga mellanslag där vi kan bryta en bild och bilder flyter därför utanför den ramen där den finns. Ett sätt att åtgärda detta problemet är att alltid använda relativa enheter när vi placerar bilden i vår layout.

För att undvika att bilder (och andra medietyper med fasta breddar) hamnar utanför layouten kan man använda följande CSS.

```css
img, embed, object, video {
    max-width: 100%;
}
```

Här ser vi till att alltid sätta den maximala bredden för bland annat bilder (`img`) till 100% av förälder elementet.

I exempel-mappen i katalogen `example/responsiva-bilder` finns exempel på hur man kan använda relativa enheter tillsammans med bilder och på kommande delar i guiden.

<!-- Ytterligare exempel finns i exempel-katalogen under `example/figure` och där främst i filen `example/figure/figure-responsive.html`. -->
