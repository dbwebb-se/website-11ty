---
author: efo
category:
    - javascript
    - nodejs
    - lab
revision:
    "2017-02-27": (C, mos) Kopierad till dbjs och generaliserad.
    "2017-02-01": (B, efo) Gjorde om labben från asynkronprogrammering till nodejs api.
    "2016-12-21": (A, efo) Första utgåvan av lab4 i kursen linux.
...
Node.js och inbyggda moduler (node2)
==================================

En laboration i nodejs där vi bekantar oss med [nodejs api](https://nodejs.org/api/). Vi använder api:t för att lösa uppgifter med `fs`, `querystring` och `crypto`.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har installerat `nodejs`, `npm` och en lokal utvecklingsmiljö för kursrepot på din dator.



Videoserie {#video}
-----------------------

Det finns en [videoserie](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_AGc9pBgaXFEQGjyFJe7XJ) som hjälper dig med denna labben titta på videor som börjar på 5.



Hämta labben {#hamta}
-----------------------

Labben automatgenereras för dig. Gör så här för att checka ut din personliga labb.

Gå till din kurskatalog i terminalen och kör följande kommando.

```bash
# Flytta till kurskatalogen
dbwebb create node2
```

Materialet till labben skapas nu och sparas i din kurskatalog enligt följande.

| Fil                | Innehåll                                                              |
|--------------------|-----------------------------------------------------------------------|
| `instruction.html` | Beskrivning av labben och de uppgifter som skall göras.               |
| `answer.js`      | Här skall du skriva din kod för att lösa respektive uppgift i labben. |

Öppna filen `instruction.html` i en webbläsare och läs igenom de uppgifter som labben omfattar.

Öppna filen `answer.js` i din texteditor och koda ihop svaren på uppgifterna.

Du kan testa dina lösningar genom att köra programmet `answer.js` i din terminal enligt nedan:

```javascript
$ node answer.js
```



Krav {#krav}
-----------------------

1. Gör de uppgifter som finns i labben `instruction.html`.

2. Skriv dina lösningar, på rätt plats, i filen `answer.js`.

3. Testkör din labb genom att köra kommandot `node answer.js`.

4. Ladda upp, validera och publicera labben genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb validate node2
dbwebb publish node2
```

Rätta eventuella fel som dyker upp och publisera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns ingen extra uppgift.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
