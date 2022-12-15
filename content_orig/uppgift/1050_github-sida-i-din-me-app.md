---
author: efo
category: webbprogrammering
revision:
  "2017-03-07": (A, efo) Första utgåvan i samband med kursen webapp v2.
...
Bygg vidare på din me-app
==================================

Du skall vidareutveckla din me-app, så den innehåller två nya vyer. En vy med information om dina github repos och en vy där vi detekterar storlek och orientering på vår enhet.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har en mithril me-app från föregående kursmoment, som fungerar i cordova på android.

Du har jobbat igenom artikeln "[Modeller och request i mithril](kunskap/mithril-modeller-och-request)".

<!-- Du har jobbat igenom artikeln "[Att göra en mobilapp av en mobil-anpassad webbplats](kunskap/kunskap/att-gora-en-mobilapp-av-en-mobil-anpassad-webbplats)". -->



Introduktion {#intro}
-----------------------

Gå till din redovisningskatalog och fortsätt jobba vidare med din me-app där.

```bash
# Ställ dig i rooten av kursrepot
cd me/redovisa
```

Nu har du din bas du kan utgå ifrån, spara alla dina filer i katalogen `me/redovisa`.

[Dokumentation](https://developer.github.com/v3/) och exempel för Githubs API underlättar vid utveckling av vår Github vy. När vi hämtar data från API'er är det alltid bra att ha API dokumentationen nära till hands då detta underlättar för att hitta rätt url.

För att appen kan hämta data från `api.github.com` måste vi lägga till urlen i vår Content-Security-Policy enligt nedan.

```html
<meta http-equiv="Content-Security-Policy" content="default-src 'self' https://api.github.com data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *; img-src 'self' data: content:;">
```

Githubs API har en [begränsning](https://developer.github.com/v3/#rate-limiting) på 60 anrop per timme. Det är dock möjligt att [autensiera](https://developer.github.com/v3/#authentication) sig mot API't, detta gör att du får göra 5000 anrop per timme mot API't.



Krav {#krav}
-----------------------

1. Skapa en vy där du presenterar information om dina Github repos, om du inte har egna kan du använda Dbwebbs istället. Som minimum namn och när repot senast var uppdaterat för varje repo. Dbwebbs användarnamn är `dbwebb-se` på Github.

1. Skapa en vy där du detekterar och skriver ut information om användarens enhets orientering och storlek. Tips: använd mithril funktionen `m.redraw()` för att rita vyn på nytt.

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
