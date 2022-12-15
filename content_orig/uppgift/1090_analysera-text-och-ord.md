---
author: efo
category: python
revision:
    "2017-06-21": (A, efo) Första utgåvan i samband med uppdatering av kmom05 i kursen python.
...
Analysera text och ord
==================================

[FIGURE src=image/python/old-book.jpg?w=c5 class="right"]

Vi har i Marvin byggt ett program bestående av två moduler och ett antal funktioner som samverkar för att Marvin kan svara på frågor. Vi har även bekantat oss med `dictionary` där vi kan spara nyckel-värde par. Vi har även bekantat oss med CLI med hjälp av modulen `argparse`. Vi ska i denna uppgift skapa ett CLI-program som tar emot argument och kan analysera en text.

<!--more-->




Förkunskaper {#forkunskaper}
-----------------------

Du har en bra förståelse för `dictionary` och har jobbat igenom "[Python med dictionaries och tupler](uppgift/python-med-dictionaries-och-tupler)". Du har även jobbat med CLI-program i "[Modulen argparse](kunskap/argparse)".



Introduktion {#intro}
-----------------------

I kursrepot finns en del av "Phil, the Fiddler", [`example/text/phil.txt`](https://github.com/mosbth/python/blob/master/example/text/phil.txt). Du skall använda den texten och låta ditt CLI-program analysera den.

Vill du lära dig mer om vad textanalys kan innebära "på riktigt" så läser du lite om [text analys och text mining på Wikipedia](https://en.wikipedia.org/wiki/Text_mining).

Du kommer göra en övning med ordfrekvens, läs gärna om det på [Wikipedia Letter Frequency](https://en.wikipedia.org/wiki/Letter_frequency) och studera bilden som visar bokstävernas procentuella förekomst i det engelska språket.

För samtliga uppgifter gäller att ett ord består av bokstäverna [a-Z]. Ett tips är att konvertera alla ord till enbart små bokstäver [a-z], det kan göra uppgiften enklare.

Googla "online word counter" eller "online letter counter" så hittar du verktyg som gör precis det du skall göra. Testa att köra in  texten i ett av dem och se hur det ser ut. Då får du en referens och mental bild som kan hjälpa dig att se om du är på rätt väg eller ej.

Du ska i uppgiften göra ett CLI-program som analyserar en text från en fil. Det kan se ut på detta sättet när vi kör programmet:

```bash
# Generell använding av vårt text analys verktyg
$ python3 main.py [options] command [arguments-to-the-command]

# Visa hjälp text
$ python3 main.py --help

# Kör alla analyser för phil.txt
$ python3 main.py all phil.txt

# Visa antal rader i texten phil.txt
$ python3 main.py lines phil.txt

# Visa ordfrekvensen i texten phil.txt
$ python3 main.py word_frequency phil.txt

# Visa bokstavsfrekvensen i texten phil.txt med extra utskrift
$ python3 main.py --verbose letter_frequency phil.txt
```



Krav {#krav}
-----------------------

Börja med att kopiera koden från övningen "[Modulen argparse](kunskap/argparse)".

```bash
# Ställ dig i kursmoment katalogen
cp -ri argparse/*.py analyzer/
cp -ri ../../example/text/phil.txt analyzer/
cd analyzer
```

Se till att din katalog `analyzer` innehåller filen `phil.txt`.

1. Ditt program ska bestå av tre moduler: `main.py`, `cli_parser.py` och `analyzer.py`.

1. Du skall skapa funktioner för textanalysering i modulen `analyzer.py`.

1. Modulen `cli_parser.py` skall enbart innehålla kod för att hantera inkommande argument, kommandon och options.

1. Filen `main.py` skall använda sig av modulerna `analyzer` och `cli_parser` för att lösa uppgiften.

1. Följande options skall fungera.

    * `-h, --help` skall visa en hjälptext som beskriver ditt program och hur det används.
    * `-v, --version` skall visa versionen av programmet.
    * `--verbose` skall innebära att mer text skrivs ut, kanske bra för debugging?
    * `--silent` skall innebära att minimalt med utskrift sker, bra om man bara vill se svaret.

1. Ditt program ska ta emot ett filnamn som argument och analysera texten i den filen enligt olika kommandon.

```bash
python3 main.py <kommando> <filnamn>
python3 main.py lines <filnamn>
python3 main.py words <filnamn>
python3 main.py letters <filnamn>
python3 main.py word_frequency <filnamn>
python3 main.py letter_frequency <filnamn>
python3 main.py all <filnamn>
```

7\. Analysera antal rader (ej tomma), ord och bokstäver med kommandon `lines`, `words` och `letters`. Skriv en funktion för varje kommando.

8\. Analysera även ord- och bokstavsfrekvensen och skriv ut de sju mest förekommande orden och bokstäverna. Använd kommandona `word_frequency` och `letter_frequency`. Ange frekvensen i % av totala mängden ord eller bokstäver.

9\. Ditt program skall klara av kommandot `all` som kör alla analyserings kommandon i följd och skriver ut resultatet. Tips, låt dina funktioner returnerar ett värde, spara undan resultatet i en dictionary och skriv ut i en egen utskriftsfunktion.

10\. Validera ditt program genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb validate analyzer
```

<!-- 
TODO Gör om till --words, --letters, osv.
glöm inte inspect
splitta uppgiften i två delar.
-->

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

1. Lägg till ett option, `--amount=<integer>` till kommandona `word_frequency` och `letter_frequency`. Det ska styra hur många ord eller bokstäver som ska visas. 



Tips från coachen {#tips}
-----------------------

Lär dig felsöka med debuggern, använd den när du får problem. Komplettera med utskrifter av `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
