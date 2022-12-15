---
author: mos
category:
    - javascript
    - kursen javascript1
    - kursen webgl
    - kursen dbjs
revision:
    "2017-10-17": (E, mos) Infogade webgl.
    "2015-08-27": (D, lew) Korrigerade labben.
    "2015-08-27": (C, mos) Uppgraderad till dbwebb-cli version 2.
    "2014-08-18": (B, mos) Genomgången, mindre justering.
    "2014-06-30": (A, mos) Första utgåvan i samband med javascript1.
...
JavaScript och objekt
==================================

Jobba igenom grunderna med objekt i JavaScript.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du kan redan programmera i ett eller flera andra programmeringsspråk och du har satt dig in i grunderna med JavaScript.

Du har labbmiljön som krävs och du har ditt kursrepo.

Du kan finna stöd i videoserien [Lär dig JavaScript](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_YXUQlr5aAzJ406vSsmeMT).



Hämta labben {#hamta}
-----------------------

Labben automatgenereras för dig. Gör så här för att checka ut din personliga labb.

Gå till din kurskatalog i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb create lab5
```

Materialet till labben ligger nu i din kurskatalog, enligt följande.

| Fil                | Innehåll |
|--------------------|----------|
| `instruction.html` | Beskrivning av labben och de uppgifter som skall göras. Öppna filen i din webbläsare. |
| `answer.js`        | Här skall du skriva din kod för att lösa respektive uppgift i labben. Öppna filen i din texteditor. |
| `answer.html`      | Här kan du testa din labb genom att provköra den i webbläsaren. |

Validera ofta, då slipper du bekymmer i slutet.

```bash
dbwebb validate lab5
```

Du kan vid behov skriva ut en hint till varje uppgift.

Om du hamnar i trubbel, till exempel om hela labben inte skrivs ut i webbläsaren, så kan du felsöka med hjälp av devtools, det kan komma felutskrifter i consolen.

Du kan använda `console.log("hej")` för att skriva ut information, till devtools console, och på det sättet debugga och följa flödet i ditt program.



Krav {#krav}
-----------------------

1. Gör de uppgifter som finns i labben `instruction.html`.

1. Skriv dina lösningar, på rätt plats, i filen `answer.js`.

1. Testkör din labb genom att öppna filen `answer.html` i din webbläsare.

1. Ladda upp, validera och publicera labben genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb publish lab5
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Tips från coachen {#tips}
-----------------------

Validera ofta.

Skriv ut till consolen med `console.log()`.

Lär dig den inbyggda debugger, det finns i varje webbläsare.

Lycka till och hojta till i forumet om du behöver hjälp!
