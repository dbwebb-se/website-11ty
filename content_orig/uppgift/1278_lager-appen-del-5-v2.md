---
author: efo
category: javascript
revision:
  "2022-04-12": (B, efo) Första utgåvan i samband med kursen webapp v4.
  "2018-03-01": (A, efo) Första utgåvan i samband med kursen webapp v3.
...
Lager appen del 5
==================================

[FIGURE src=image/webapp/world-map.jpg?w=c5 class="right"]

Vi använder en mobil enhets styrka och läggar till funktionalitet för GPS och kartor. Allt detta för att vi ska kunna leverera ordrar till våra kunder på ett smidigt sätt.



<!--more-->



Förkunskaper {#forkunskaper}
-----------------------
Du har gjort uppgiften [Lager appen del 4](uppgift/lager-appen-del-4). Du har jobbat dig igenom övningen "[GPS och karta](kunskap/gps-och-karta-v2)".



Introduktion {#intro}
-----------------------

Använd lager [API:t](https://lager.emilfolino.se/v2) dokumentationen och speciellt sektionen om ordrar. Här kan du hämta ut alla ordrar.



Krav {#krav}
-----------------------

1. Skapa en vy i din app med de ordrar som är redo att skickas. Dvs. ordrar med status Packad (200).

1. När man klickar in på ordern får man al information om ordern och en karta där paketet ska levereras.

1. Använd GPS för att visa nuvarande position på kartan.

1. Gör det enkelt att testa din app. Ha minst en order med status Packad, som har en adress som fungerar.
