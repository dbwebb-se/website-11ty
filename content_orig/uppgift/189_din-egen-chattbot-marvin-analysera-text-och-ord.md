---
author: mos
category: python
revision:
    "2016-09-26": (G, mos) Ändrade länk till inventariemarvin.
    "2015-08-25": (F, mos) Uppgraderade till dbwebb v2.
    "2015-05-04": (E, mos) Rättade filnamn på ordlistorna.
    "2015-03-09": (D, mos) Förtydliga att alla filer ska ligga i katalogen.
    "2015-03-03": (C, mos) Mindre textjustering samt rätt filnamn i krav 5.
    "2015-02-09": (B, mos) Förtydligarde krav 4 och 5.
    "2015-02-05": (A, mos) Första utgåvan i samband med uppdatering av kmom05 i kursen python.
updated: "2015-08-25 14:02:34"
created: "2015-02-03 11:25:31"
...
Din egen chattbot - Marvin - analysera text och ord
==================================

Programmering och problemlösning i Python. Lär Marvin lite mer, denna gången handlar det om att analysera texter som en övning i att använda dictionaries (och kanske tupler).

<!--more-->




Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i Python och listor och du har byggt [tredje delen av Marvin](uppgift/din-egen-chattbot-marvin-steg-3) samt [inventarie-Marvin](uppgift/din-egen-chattbot-marvin-inventarie).



Introduktion {#intro}
-----------------------

I kursrepot finns första kapitlet ur Alice i Underlandet, [`example/marvin/alice-ch1.txt`](https://github.com/mosbth/python/blob/master/example/marvin/alice-ch1.txt). Du skall använda den texten och låta Marvin analysera den.

Vill du lära dig mer om vad textanalys kan innebära "på riktigt" så läser du lite om [text analys och text mining på Wikipedia](https://en.wikipedia.org/wiki/Text_mining).

I övningen kommer du använda en ordlista för vanligt förekommande ord (korta ord som: I, and, or, else). Med hjälp av ordlistan så kan vi separera de orden från texten. Det finns olika listor för vanligt förekommande ord och de finns förklarade i [Wikipedias frequency lists](http://en.wiktionary.org/wiki/Wiktionary:Frequency_lists).

Du kommer göra en övning med ordfrekvens, läs gärna om det på [Wikipedia Letter Frequency](https://en.wikipedia.org/wiki/Letter_frequency) och studera bilden som visar bokstävernas procentuella förekomst i det engelska språket.

För samtliga uppgifter gäller att ett ord består av bokstäverna [a-Z]. Ett tips är att konvertera alla ord till enbart små bokstäver [a-z], det kan göra uppgiften enklare.

Googla "online word counter" eller "online letter counter" så hittar du verktyg som gör precis det du skall göra. Testa att köra in  texten i ett av dem och se hur det ser ut. Då får du en referens och mental bild som kan hjälpa dig att se om du är på rätt väg eller ej.

[INFO]
**Uppdatera ditt kursrepo.**

Om du saknar några av ordlistorna så kan du behöva uppdatera ditt kursrepo så här.

```bash
# Ställ dig i kurskatalogen
dbwebb update
```

Därefter bör du ser filerna `words.txt` samt `common-words.txt` i katalogen `example/marvin/`. Kopiera in dem till din marvin4-katalog.
[/INFO]



Krav {#krav}
-----------------------

Kopiera din Marvin från föregående kursmoment och utgå från den koden.

```bash
# Ställ dig i roten av kurskatalogen
cd me
cp -ri kmom04/marvin3/*.py kmom05/marvin4/
cp -ri kmom04/marvin3/*.txt kmom05/marvin4/
cd kmom05/marvin4
```

Se till att din katalog `kmom05/marvin4/` innehåller kopior av filerna `words.txt`, `common-words.txt` samt `alice-ch1.txt`.

1. Marvin skall fråga efter textfilens namn, om man inte anger ett filnamn skall Alice-filen användas som default.

2. Marvin skall analysera filen och räkna ut hur många ord som finns i filen. Skriv ut totala antalet ord i filen. 

3. Marvin skall räkna ut antalet gånger som varje ord förekommer i texten, ordets frekvens i texten, *word frequency*. Skriv ut de 7 mest förekommande orden i texten, i ordning och med antalet gånger det förekommer.

4. Visa de 7 mest förekommande orden som finns i texten, men sortera bort de ord som är *vanliga ord*. Du hittar en lista av vanliga ord i `common-words.txt`.

5. Visa de 7 mest förekommande orden, sortera bort de vanliga orden, och visa enbart de orden som är rättstavade. I ordlistan `words.txt` hittar du de ord som betraktas som rättstavade.

6. Beräkna frekvensen för varje bokstav, *letter frequency*. Skriv ut de 7 bokstäver som förekommer mest, i ordning och med en procent-siffra som visar hur ofta bokstaven förekommer.

7. Validera Marvin genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb validate marvin4
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar. 




Extrauppgift {#extra}
-----------------------

1. Hantera ord med apostrof när du jämför ord i texten med ord i ordlistan.

2. Hantera rättstavade ord med både stor och liten bokstav.



Tips från coachen {#tips}
-----------------------

Lär dig felsöka med debuggern, använd den när du får problem. Komplettera med utskrifter av `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
