---
author: mos
category:
    - kurs-dbjs
    - sql
    - lab
revision:
    "2016-12-20": (PA1, mos) Första utkast.
...
Lab 1, SQL introduktion
==================================

Laboration för att träna grunderna i SQL med databasen SQLite.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har installerat en labbmiljö motsvarande [labbmiljön för kursen dbjs](kurser/dbjs/labbmiljo).

Du har tillgång till kommandot `dbwebb` och du har clonat ett kursrepot för dbjs-kursen.

Du kan köra [kommandot `sqlite3` vid kommandoraden](kunskap/en-kommandoradsklient-for-sqlite) i din terminal.



Videoserie {#video}
-----------------------

Det finns en [videoserie](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-I8RIDMfLjsDsp6mALu2kP) som hjälper dig med denna labben.



Hämta labben {#hamta}
-----------------------

Labben automatgenereras för dig. Gör så här för att checka ut din personliga labb.

Gå till din kurskatalog i terminalen och kör följande kommando.

```bash
# Flytta till kurskatalogen
dbwebb create sql1
```

Materialet till labben skapas nu och sparas i din kurskatalog enligt följande.

| Fil                | Innehåll                                                              |
|--------------------|-----------------------------------------------------------------------|
| `instruction.html` | Beskrivning av labben och de uppgifter som skall göras.               |
| `answer.bash`      | Här skall du skriva din kod för att lösa respektive uppgift i labben. |

Öppna filen `instruction.html` i en webbläsare och läs igenom de uppgifter som labben omfattar.

Öppna filen `answer.bash` i din texteditor och koda ihop svaren på uppgifterna.

Du kan testa dina lösningar genom att köra programmet `answer.bash` i din terminal.

```bash
$ ./answer.bash
```



Krav {#krav}
-----------------------

1. Gör de uppgifter som finns i labben `instruction.html`.

2. Skriv dina lösningar, på rätt plats, i filen `answer.bash`.

3. Testkör din labb genom att köra filen `answer.bash`.

4. Ladda upp, validera och publicera labben genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb validate sql1
```

Rätta eventuella fel som dyker upp och publisera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Det finns ingen extra uppgift.



Tips från coachen {#tips}
-----------------------

Testa dig fram genom att jobba mot databasen även via kommandot `sqlite3`.

```bash
$ sqlite3 -header -column db.sqlite
```

Samma SQL-kod som du skriver i labbverktyget kan du även skriva direkt i kommandot `slite3`. Får du problem så testa SQL kommandona i båda klienterna.

Lycka till och hojta till i forumet om du behöver hjälp!
