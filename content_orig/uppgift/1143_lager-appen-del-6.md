---
author: efo
category: javascript
revision:
  "2018-03-01": (A, efo) Första utgåvan i samband med kursen webapp v3.
...
Lager appen del 6
==================================
[FIGURE src=image/webapp/world-map.jpg?w=c5 class="right"]

I kursmoment 5 skapade vi en native app baserad på vår webapp med hjälp av Cordova. Vi ska i denna uppgiften använda oss av plugins för att komma åt native-funktionalitet i en fysisk enhet. Vi använder en mobil enhets styrka och läggar till funktionalitet för GPS och kartor.



<!--more-->



Förkunskaper {#forkunskaper}
-----------------------
Du har gjort uppgiften [Lager appen del 5](uppgift/lager-appen-del-5). Du har jobbat dig igenom övningarna "[Animationer och övergångar](kunskap/animationer-och-overgangar)" och "[GPS och karta](kunskap/gps-och-karta)".



Introduktion {#intro}
-----------------------
Börja med att kopiera din lager app från kmom05 så har du nått att utgå ifrån.

```bash
# stå i me-katalogen
cp -r kmom05/lager5/* kmom06/lager6/
```

Använd lager [API:t](https://lager.emilfolino.se/v2) dokumentationen och speciellt sektionen om ordrar. Här kan du hämta ut alla ordrar.



Krav {#krav}
-----------------------
1. Använd animationer och övergångar för att efterlikna native applikationer.

1. Skapa en vy i din app med de ordrar som är redo att skickas. Dvs. ordrar med status Packad (200).

1. När man klickar in på ordern får man al information om ordern och en karta där paketet ska levereras.

1. Använd GPS för att visa nuvarande position på kartan.

1. Gör det enkelt att testa din app. Ha minst en order med status Packad, som har en adress som fungerar och visas upp med en Geocoder.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate lager6
dbwebb publish lager6
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------
* Använd ytterligare en Cordova plugin för att till exempel kunna ta bilder, komma åt kontakter eller liknande.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
