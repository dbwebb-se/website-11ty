---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
En klass för ett histogram
==================================


Så där ja, då har vi kommit igång. Vi fortsätter och bygger till ett histogram [^4] till tärningen, ett stapeldiagram som visar hur många kast som blir etta, tvåa och så vidare.

Klassen `Histogram` och klassen `Dice` skall inte vara beroende av varandra, de känner inte till varandra, det som knyter ihop dem är användandet i test-filen.



###Övning Histogram {#ovning-2}

Gör följande.

1. Skapa en klass `Histogram` som kan skriva ut statistik om tärningsserien.

1. Skapa metoden `setSerie()` som tar en array med värden som argument.

1. Skapa metoden `getSerie()` som returnerar en strängrepresentation av alla värden i kastserien.

1. Skapa en metod `getHistogram()` som returnerar en strängrepresentation av ett histogram. Sortera utskriften på tärningarna i stigande ordning.

1. (EXTRA) Gör en variant av metoden `getHistogram()`, som sorterar histogrammet i stigande eller sjunkande ordning baserat på antalet tärningar. Mest tärningar börjar, eller omvänt.

Så här kan det se ut, utan extrauppgiften.

[FIGURE src=/image/snapvt17/oophp20-6.png?w=w2 caption="Ett histogram över tärningskast."]

Det var ytterligare en klass. Bra, bra. Det flyter på.
