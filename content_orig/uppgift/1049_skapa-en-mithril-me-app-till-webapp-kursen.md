---
author: efo
category: webbprogrammering
revision:
  "2017-03-07": (A, efo) Första utgåvan i samband med kursen webapp v2.
...
Skapa en mithril me-app
==================================

Du skall bygga en me-app, som en me-sida, men med fokus på mobila enheter. Du använder javascript ramverket mithril.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artiklarna "[Kom igång med ramverket Mithril](kunskap/kom-igang-med-mithril-och-webpack)" och "[Kom igång med cordova](kunskap/kom-igang-med-cordova)".



Introduktion {#intro}
-----------------------

Om du har gjort enligt övningen i artikeln ovan så har du i stort sett redan klarat av uppgiften.

Utgå från din bas i `me/redovisa`.



Krav {#krav}
-----------------------

1. Bygg en me-app i mithril.

1. Din me-app skall innehålla tre sidor. Me, Report och About.

1. Fyll sidorna med relevant innehåll. Det skall finnas minst en bild på sidorna Me och About.

1. Det skall finnas en meny så använderen kan navigera mellan sidorna, måste fungera på en mobil enhet.

1. Gör din me-app personlig, så man ser att det är din me-app. Skapa en egen style som fungerar på mobila enheter.

1. Din me-app skall kunna köras med cordova både i browsern och i en android emulator.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate redovisa
dbwebb publish redovisa
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Inga extrauppgifter detta kursmomentet.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
