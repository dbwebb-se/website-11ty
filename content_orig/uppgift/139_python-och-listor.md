---
author: mos
category: python
revision:
  "2015-08-25": (D, mos) Uppdaterade till dbwebb v2.
  "2015-01-14": (C, mos) Fel länk till förkunskaperna.
  "2014-08-27": (B, mos) Genomgången och testad.
  "2014-07-03": (A, mos) Första utgåvan i samband med kursen python.
updated: "2015-08-25 12:52:08"
created: "2014-07-03 06:37:37"
...
Python och listor
==================================

Jobba igenom grunderna i Python med listor.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Installera en labbmiljö till Python](kunskap/installera-en-labbmiljo-till-python)" och du kan grundläggande konstruktioner i Python.



Hämta labben {#hamta}
-----------------------

Labben automatgenereras för dig. Gör så här för att checka ut din personliga labb.

Gå till din kurskatalog i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb create lab3
```

Materialet till labben ligger nu i din kurskatalog i `me/kmom04/lab3` enligt följande.

| Fil                | Innehåll                                                              |
|--------------------|-----------------------------------------------------------------------|
| `instruction.html` | Beskrivning av labben och de uppgifter som skall göras.               |
| `answer.py`        | Här skall du skriva din kod för att lösa respektive uppgift i labben. |
| `Dbwebb.py`        | Används av `answer.py` för att testa din labb.                        |
| `answer.json`      | Används av `Dbwebb.py` för att testa din labb.                        |

Öppna filen `instruction.html` i en webbläsare och läs igenom de uppgifter som labben omfattar.

Öppna filen `answer.py` i din texteditor och koda ihop svaren på uppgifterna.

Du kan testa dina lösningar genom att köra programmet `answer.py` som ett vanligt Python-program.



Krav {#krav}
-----------------------

1. Gör de uppgifter som finns i labben `instruction.html`.

2. Skriv dina lösningar, på rätt plats, i filen `answer.py`.

3. Testkör din labb genom att köra filen `answer.py`.

4. Ladda upp och validera labben genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb validate lab3
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Det finns ingen extra uppgift.



Tips från coachen {#tips}
-----------------------

Debugga och felsök genom att skriva ut variablernas olika innehåll med `print()` eller kör programmet i debuggern.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!




