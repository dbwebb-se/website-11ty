---
author:
    - mos
    - efo
category:
    - python
    - lab
revision:
    "2018-06-29": (G, aar) Uppdaterade mappstruktur mot kursrepo.
    "2018-06-28": (F, efo) Ny labb för python-v2.
    "2017-08-28": (E, mos) Bort med stycke om extrauppgifter.
    "2017-06-14": (D, efo) Uppdaterade till ny kursstruktur med funktioner i kmom03.
    "2015-08-25": (C, mos) Uppdaterade till dbwebb v2.
    "2014-08-27": (B, mos) Gneomgången och uppdaterad inför kursstart.
    "2014-07-03": (A, mos) Första utgåvan i samband med kursen python.
...
Python med funktioner och moduler
==================================

Vi ska i denna laboration fortsätta träna på funktioner och moduler.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften "[Python med funktioner](uppgift/python-med-funktioner)" och jobbat igenom artikeln "[Moduler i Python](kunskap/moduler-i-python)".



Hämta labben {#hamta}
-----------------------

Labben automatgenereras för dig. Gör så här för att checka ut din personliga labb.

Gå till din kurskatalog i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb create lab4
```

Materialet skapas nu och läggs i en underkatalog till din katalog `me`.

| Fil                | Innehåll                                                              |
|--------------------|-----------------------------------------------------------------------|
| `instruction.html` | Beskrivning av labben och de uppgifter som skall göras, öppna och läs via en webbläsare.               |
| `answer.py`        | Här skall du skriva din kod för att lösa respektive uppgift i labben. |
| `Dbwebb.py`        | Används av `answer.py` för att testa din labb.                        |
| `.answer.json`      | Används av `Dbwebb.py` för att testa din labb.                        |

Öppna filen `instruction.html` i en webbläsare och läs igenom de uppgifter som labben omfattar.

Öppna filen `answer.py` i din texteditor och koda ihop svaren på uppgifterna.

Du kan testa dina lösningar genom att köra programmet `answer.py` som ett vanligt Python-program. Labben rättar sig själv.

```python
$ python3 answer.py
```

Glöm inte att validera ofta, då slipper du bekymmer i slutet.

Hamnar du i bekymmer så finns det ledtrådar som du kan få. Du aktiverar ledtrådarna för respektive uppgift i filen `answer.py`.

Du behöver göra ett visst antal uppgifter för att bli godkänd på labben. Sedan finns extra uppgifter du kan utföra om du så väljer. [Varför skall jag göra extrauppgiftena](kurser/faq/varfor-gora-extra-uppgifter)?

I uppgift 1.3 skapas en funktion som ska returnera antalet vokaler i en given text sträng. Med vokaler menas svenska vokaler minus 'å ä ö' dvs.: 'a e i o u y'.



Krav {#krav}
-----------------------

1. Gör de uppgifter som finns i labben `instruction.html`.

2. Skriv dina lösningar, på rätt plats, i filen `answer.py`.

3. Testkör din labb genom att köra filen `answer.py`.

4. Ladda upp och validera labben genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb validate lab4
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Tips från coachen {#tips}
-----------------------

Debugga och felsök `pdb` och `breakpoints`.

Testa att köra labben i debuggern och stega igenom hur den validerar dina svar.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
