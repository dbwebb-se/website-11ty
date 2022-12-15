---
author: mos
category:
    - php
    - lab
revision:
    "2016-09-08": (B, mos) Går att köra `php answer.php.
    "2015-05-12": (A, mos) Första utgåvan i samband med kursen htmlphp version 2.
...
PHP lab 2, arrayer
==================================

Jobba igenom arrayer i PHP.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har installerat en labbmiljö där du kan köra PHP, motsvarande [labbmiljön för kursen htmlphp](htmlphp/labbmiljo)".

Du har tillgång till kommandot `dbwebb` och du har clonat kursrepot för htmlphp-kursen.



Hämta labben {#hamta}
-----------------------

Labben automatgenereras för dig. Gör så här för att checka ut din personliga labb.

Gå till din kurskatalog i terminalen och kör följande kommando.

```bash
# Flytta till kurskatalogen
dbwebb create lab2
```

Materialet till labben skapas nu och sparas i din kurskatalog `me/kmom03/lab2` enligt följande.

| Fil                | Innehåll                                                              |
|--------------------|-----------------------------------------------------------------------|
| `instruction.html` | Beskrivning av labben och de uppgifter som skall göras.               |
| `answer.php`       | Här skall du skriva din kod för att lösa respektive uppgift i labben. |
| `CDbwebb.php`      | Används av `answer.php` för att testa din labb.                        |
| `answer.json`      | Används av `CDbwebb.php` för att testa din labb.                        |

Öppna filen `instruction.html` i en webbläsare och läs igenom de uppgifter som labben omfattar.

Öppna filen `answer.php` i din texteditor och koda ihop svaren på uppgifterna.

Du kan testa dina lösningar genom att köra programmet `answer.php` i din webbläsare, via din lokala webbserver.

Du kan också köra programmet [direkt i din terminal via `php answer.php`](t/5583).



Krav {#krav}
-----------------------

1. Gör de uppgifter som finns i labben `instruction.html`.

2. Skriv dina lösningar, på rätt plats, i filen `answer.php`.

3. Testkör din labb genom att köra filen `answer.php`.

4. Ladda upp, validera och publicera labben genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb publish lab2
```

Rätta eventuella fel som dyker upp och publisera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Det finns ingen extra uppgift.



Tips från coachen {#tips}
-----------------------

Debugga och felsök genom att skriva ut variablernas olika innehåll med `echo`, `print_r()` eller `var_dump()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
