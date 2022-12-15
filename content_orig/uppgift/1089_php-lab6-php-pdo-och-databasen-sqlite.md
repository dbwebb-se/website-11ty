---
author:
    - mos
category:
    - php
    - lab
revision:
    "2017-06-15": (C, mos) Genomgången inför labbar v2, bytte namn från lab5 till lab6.
    "2016-09-08": (B, mos) Går att köra php answer.php.
    "2015-05-12": (A, mos) Första utgåvan i samband med kursen htmlphp version 2.
...
PHP lab 6: PHP PDO och databasen SQLite
==================================

Laboration för att träna PHP PDO och SQL med databasen SQLite.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har installerat labbmiljön och du har tillgång till kursrepot.



Hämta labben {#hamta}
-----------------------

Labben automatgenereras för dig. Gör så här för att checka ut din personliga labb.

Gå till din kurskatalog i terminalen och kör följande kommando.

```bash
# Flytta till kurskatalogen
dbwebb create lab6
```

Materialet till labben skapas nu och sparas i din kurskatalog enligt följande.

| Fil | Innehåll |
|-----|----------|
| `instruction.html` | Beskrivning av labben och de uppgifter som skall göras.               |
| `answer.php`       | Här skall du skriva din kod för att lösa respektive uppgift i labben. |
| `.Dbwebb.php`      | Används av `answer.php` för att testa din labb.                        |
| `.answer.json`      | Används av `.Dbwebb.php` för att testa din labb.                        |

Öppna filen `instruction.html` i en webbläsare och läs igenom de uppgifter som labben omfattar.

Öppna filen `answer.php` i din texteditor och koda ihop svaren på uppgifterna.

Du får svar direkt om du har gjort rätt eller inte. Du kan även få fram en ledtråd som visar dig vilket rätt svar är.

Du kan testa dina lösningar genom att köra programmet `answer.php` i din webbläsare, via din lokala webbserver.

Du kan också köra programmet [direkt i din terminal via `php answer.php`](t/5583) men det kräver att du har [PHP i din sökväg](labbmiljo/php-i-pathen) (se det som överkurs).



Krav {#krav}
-----------------------

1. Gör de uppgifter som finns i labben `instruction.html`.

2. Skriv dina lösningar, på rätt plats, i filen `answer.php`.

3. Testkör din labb genom att köra filen `answer.php`.

4. Ladda upp, validera och publicera labben genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb publish lab6
```

Rätta eventuella fel som dyker upp och publisera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Det finns ingen extra uppgift.



Tips från coachen {#tips}
-----------------------

Debugga och felsök genom att skriva ut variablernas olika innehåll med `echo`, `print_r()` eller `var_dump()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Felsöker du på studnetservern så använder du `dbwebb publish-pure` så att radnumren stämmer.

Lycka till och hojta till i forumet om du behöver hjälp!
