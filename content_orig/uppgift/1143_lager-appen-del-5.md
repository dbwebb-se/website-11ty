---
author: efo
category: javascript
revision:
  "2018-02-28": (A, efo) Första utgåvan i samband med kursen webapp v3.
...
Lager appen del 5
==================================
[FIGURE src=image/webapp/hardware.jpg?w=c5 class="right"]

I tidigare kursmoment har vi jobbat med vår lager app i webbläsaren. Nu är det dags att skapa en app på 'riktigt', som går att installera på en mobil-enhet och använda sig av både splashscreen och en riktig ikon.



<!--more-->



Förkunskaper {#forkunskaper}
-----------------------
Du har gjort uppgiften [Lager appen del 4](uppgift/lager-appen-del-4).

Du har läst artikeln [GUI ramverk](kunskap/gui-ramverk).

Du har installerat sista delen av labbmiljön för webapp-v3 och jobbat dig igenom övningarna [Kom igång med Cordova](kunskap/kom-igang-med-cordova) och [Lägg till en Splash screen och ändra ikon](kunskap/splash-screen-och-ikon).


Introduktion {#intro}
-----------------------
Skapa ett Cordova projekt i den befintliga katalogen `me/kmom05/lager5` med kommandot:

```bash
# stå i me/kmom05/lager5
cordova create . se.dbwebb.lager Lager
```

Flytta sedan de filer som behövs från `me/kmom04/lager4` till `me/kmom05/lager5` så din app fungerar som tidigare, men nu i ett Cordova skal. JavaScript, CSS och HTML filerna ska hamna i `www` och en rekommendation är att webpack konfigurationen hamnar i `me/kmom05/lager5` och att du ändrar den så den passar den nya katalogstrukturen.



Krav {#krav}
-----------------------
1. Skapa en Cordova app som kan köras i webbläsaren med hjälp av kommandot `cordova run browser`.

1. Din app ska även kunna köras på antigen iOS eller Android.

1. Din app ska ha en egen splashscreen och en egen ikon.

1. Använd dina kunskaper om design av GUI element för att efterlikna plattformen du bygger din app för.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate lager5
dbwebb publish lager5
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
