---
author:
    - efo
    - aar
category: python
revision:
    "2020-08-19": (D, aar) Bytte cp till rsync, vissa studenter fick inte med .dbwebb mappen med cp.
    "2019-08-13": (C, aar, efo) Uppdaterade enligt enhetstester för analyzer.
    "2018-06-29": (B, aar) Uppdaterade mappstruktur mot kursrepo.
    "2017-06-21": (A, efo) Första utgåvan i samband med uppdatering av kmom05 i kursen python.
...
Analysera text och ord
==================================

[FIGURE src=image/python/old-book.jpg?w=c5 class="right"]

Vi har i Marvin byggt ett program bestående av två moduler och ett antal funktioner som samverkar för att Marvin kan svara på frågor. Vi har även bekantat oss med `dictionary` där vi kan spara nyckel-värde par.  Vi ska i denna uppgift skapa ett Marvin liknande program som tar emot inmatning och kan analysera en text.

<!--more-->




Förkunskaper {#forkunskaper}
-----------------------

Du har en bra förståelse för `dictionary` och har jobbat igenom "[Python med dictionaries och tupler](uppgift/python-med-dictionaries-och-tupler)" och [Att läsa filer som listor i Python](kunskap/att-lasa-filer-i-python-v2).



Introduktion {#intro}
-----------------------

I kursrepot finns en del av "Phil, the Fiddler", [`example/text/phil.txt`](https://github.com/mosbth/python/blob/master/example/text/phil.txt). Du skall använda den texten och låta ditt CLI-program analysera den.

Vill du lära dig mer om vad textanalys kan innebära "på riktigt" så läser du lite om [text analys och text mining på Wikipedia](https://en.wikipedia.org/wiki/Text_mining).

Du kommer göra en övning med ordfrekvens, läs gärna om det på [Wikipedia Letter Frequency](https://en.wikipedia.org/wiki/Letter_frequency) och studera bilden som visar bokstävernas procentuella förekomst i det engelska språket.

För samtliga uppgifter gäller att ett ord består av bokstäverna [A-z]. Ett tips är att konvertera alla ord till enbart små bokstäver [a-z], det kan göra uppgiften enklare.

Googla "online word counter" eller "online letter counter" så hittar du verktyg som gör precis det du skall göra. Testa att köra in texten i ett av dem och se hur det ser ut. Då får du en referens och mental bild som kan hjälpa dig att se om du är på rätt väg eller ej.

Du ska i uppgiften göra ett program som analyserar en text från en fil. Det kan se ut på detta sättet när vi kör programmet:

[ASCIINEMA src=363438]



Krav {#krav}
-----------------------

Börja med att kopiera text-filen `phil.txt`.

[INFO]
Gör `dbwebb update` innan du kopierar.
[/INFO]

```bash
# Ställ dig i kursrepo katalogen
# rsync används för att kopiera filer och mappar
rsync -a example/text/ me/kmom06/analyzer/
cd me/kmom06/analyzer
```

Se till att din katalog `analyzer` innehåller filen `phil.txt`.

1. Ditt program ska bestå av tre moduler: `main.py`, `menu.py` och `analyzer.py`.

1. Du skall skapa funktioner för textanalysering i modulen `analyzer.py`.

1. Modulen `menu.py` skall enbart innehålla kod för att visa menyn.

1. Filen `main.py` skall enbart innehålla kommandoloopen, tänk while-loopen i marvin, och använda sig av modulerna `analyzer` och `menu` för att lösa uppgiften. Koden ska ligga i en funktion som heter `main`.**Glöm inte `if __name__ == "__main__"` i main.py för att starta programmet**.

1. Menyvalet `menu` ska skriva ut menyn och vilka val man kan göra.

1. Analysera antal rader (ej tomma), ord och bokstäver med menyvalen `lines`, `words` och `letters`. Skriv en funktion för varje kommando.

1. Analysera även ord- och bokstavsfrekvensen och skriv ut de sju mest förekommande orden och bokstäverna. Använd menyvalen `word_frequency` och `letter_frequency`. Ange frekvensen i % av totala mängden ord eller bokstäver. Avrunda till en (1) decimal.

1. Ditt program skall klara av menyvalet `all` som kör alla analyserings funktioner i följd och skriver ut resultatet. Tips, låt dina funktioner returnerar ett värde, spara undan resultatet i en dictionary och skriv ut i en egen utskriftsfunktion.

1. Ditt program ska klara av att byta textfil för analys.

1. Det är väldigt viktigt du har **exakt** rätt antal `input()` i din kod. Se asciinema ovan för exempel, en input för att göra ett menyval och en input efter att du har skrivit ut resultatet.

1. **Rätta ditt program med hjälp av `dbwebb inspect`, genom att köra kommandot**:

```bash
dbwebb inspect kmom06
```

När `dbwebb inspect` rättar dina filer körs enhetstester på din kod. Detta är samma sätt som används på den individuella examinationen.

[YOUTUBE src=WeWFQmRNWng caption="Andreas går igenom rättningsprogrammet för Analyzer."]

Följande är korrekt resultat för de olika kommando:

```
lines: 17

words: 199

letters: 907

word_frequency:
    "the": 12 | 6.0%
    "to": 8 | 4.0%
    "and": 7 | 3.5%
    "of": 6 | 3.0%
    "he": 5 | 2.5%
    "him": 5 | 2.5%
    "street": 5 | 2.5%

letter_frequency:
    "e": 108 | 11.9%
    "t": 91 | 10.0%
    "o": 77 | 8.5%
    "h": 67 | 7.4%
    "n": 66 | 7.3%
    "a": 64 | 7.1%
    "i": 64 | 7.1%
```

12. Validera ditt program genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb validate analyzer
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Försök att återanvända dina funktioner, det underlätta i många fall och skapar bra kodstruktur.

Lär dig felsöka med debuggern, använd den när du får problem. Komplettera med utskrifter av `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
