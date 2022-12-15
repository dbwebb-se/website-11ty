---
author: efo
revision:
    "2018-10-17": "(A, efo) Första versionen."
...
Olika bilder för olika enheter
=======================

Mobila enheters framtåg de senaste drygt 10 åren gör att man som utvecklare måste vara uppmärksam på vilken variant av en bild man använder för enheter av olika storlekar. För att ytterligare komplicera denna process är pixeldensiteten för många mobila enheter samt för många bärbara datorer mycket stor.

För att bilder inte ska bli suddiga på enheter med stor pixeldensitet kan vi med hjälp av `srcset` attributet definiera vilken variant av en bild vi vill visa beroende på pixeldensiteten på den enhet som används.

```html
<img src="sheep.jpg" class="max-width" srcset="sheep@2x.jpg 2x" alt="sheep" />
```

I ovanstående kodexempel anger vi att vi vill visa bilden `sheep.jpg`, men för enheter med dubbel pixeldensitet (2x) vill vi visa bilden `sheep@2x.jpg` istället.

I exempel-mappen i katalogen `example/responsiva-bilder` finns exempel på hur man kan använda srcset för att leverera olika bilder beroende på pixeldensitet.
