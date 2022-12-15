---
author:
    - mos
category:
    - python
    - lab
revision:
    "2018-06-29": (G, aar) Uppdaterade mappstruktur mot kursrepo.
    "2017-08-28": (F, mos) Bort med stycke om extrauppgifter.
    "2015-08-25": (E, efo) Uppdaterade till ny kursstruktur utan funktioner i kmom02.
    "2015-08-25": (D, mos) Uppdaterade till dbwebb v2.
    "2015-01-14": (C, mos) Fel länk till förkunskaperna.
    "2014-08-26": (B, mos) Testad, genomgången och uppdaterad.
    "2014-07-03": (A, mos) Första utgåvan i samband med kursen python.
...
Python med villkor och loopar
==================================

En laboration där du tränar på grunderna i Python med villkor och loopar.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Villkor och loopar](kunskap/villkor-och-loopar)".



Hämta labben {#hamta}
-----------------------

Labben automatgenereras för dig. Gör så här för att checka ut din personliga labb.

Gå till din kurskatalog i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb create lab2
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



Krav {#krav}
-----------------------

1. Gör de uppgifter som finns i labben `instruction.html`.

2. Skriv dina lösningar, på rätt plats, i filen `answer.py`.

3. Testkör din labb genom att köra filen `answer.py`.

4. Ladda upp och validera labben genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb validate lab2
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Tips från coachen {#tips}
-----------------------

Debugga och felsök genom att skriva ut variablernas olika innehåll med `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!



Versioner av labben {#version}
-----------------------

Detta är version 2 av labben.

Det finns en tidigare version v1 av labben som beskrivs i "[Python med variabler, villkor, funktioner och loopar](uppgift/python-med-variabler-villkor-funktioner-och-loopar)".
