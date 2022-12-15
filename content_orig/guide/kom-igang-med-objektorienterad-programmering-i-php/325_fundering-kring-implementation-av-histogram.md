---
author: mos
revision:
    "2018-04-15": "(A, mos) Första versionen."
...
Fundering kring implementation av histogram som trait
==================================

Låt oss ställa lite kritiska frågor och funderingar till oss själva om den implemementationen vi nyss gjorde.



Mer statistik om tärningsserien {#mer}
----------------------------------

Säg att vi skulle vilja ha mer statistik om slagserien. Vårt trait för histogrammet kan inte skriva ut summan för slagserien, eller snittet eller värden såsom mean och median.

Hur borde vi implementera sådana saker? Genom att utöka vårt trait?

Fundera lite och tänk igenom vilka olika alternativ du har i form av att utöka befintliga klasser och trait eller införa nya klasser, trait och länka dem samman via arv och komposition.

Visst finns det flera alternativ att välja bland?



Utöka histogrammet med fler diagram {#utoka}
----------------------------------

Säg om vi vill utöka histogrammet med fler rapportmöjligheter. Kanske vill vi skriva ut histogrammet och dela in slagen i intervallserier där slagen för 1-2, 3-4, 4-6 visas tillsammans. Eller kanske i intervallen 1-3 och 4-6.

Hur borde vi hantera det? Personligen känner jag att rapportmetoden vi gjorde i `printHistogram(int $min = null, int $max = null)` redan börjar bli lite väl stor och löser flera saker. Jag gillar mindre metoder som inte är så komplexa. De är enklare att hantera, förstå, utveckla, felsöka och testa. Att utöka den metoden med stöd för intervall känns inte rätt, det hade givit metoden en alltför stor komplexitet.

Hur gör vi om vi skulle vilja skriva ut histogrammet i en tabell med siffror istället för `*`?



Vem har koll på slagserien {#maxmin}
----------------------------------

I vår index-fil fick vi skicka in `$min, $max` för att få ut ett histogram där även tomma värden skrevs ut.

```php
<pre><?= $dice->printHistogram() ?></pre>
<pre><?= $dice->printHistogram(1, 6) ?></pre>
```

Men det innebär att main-programmet behöver veta vad minsta och högsta värdet är. Borde inte den informationen finnas inuti klassen, eller traitet istället, på något sätt inkapslad? Annars kan vi får många hårdkodade anrop som innehåller `(1, 6)` i våra index-filer. Det känns inte riktigt rätt eller dynamiskt.



Vilken väg skall man välja {#valj}
----------------------------------

Allt eftersom du får fler verktyg i din verktygslåda för programmering så ökar alternativen när du skall lösa en sak. Du kan använda dina verktyg på olika sätt när du löser en programmeringsutmaning.

Det är svårt att säga att det ena är mer rätt än det andra, iallafall när vi pratar om generella riktlinjer. Ibland är det viktigare att lösa problemet än att lösa det på ett optimalt sätt.

Du har alltid möjligheten att göra refaktoring på din kod vid ett senare tillfälle.

När du inte vet vilken konstrution du skall välja, då väljer du en som du anser funkar och löser problemet. När du är klar kan du fundera filosofiskt på om det fanns ett bättre sätt. Det finns alltid bättre sätt.

Optimera inte din lösning om det inte krävs. När du blir mer erfaren så väljer du generellt allt bättre metoder för att lösa problemen. Men till det behövs erfarenhet. Erfarenhet kommer genom att träna och ifrågasätta.
