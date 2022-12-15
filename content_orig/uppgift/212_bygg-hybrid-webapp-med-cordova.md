---
author: mos
category: webbprogrammering
revision:
  "2017-03-10": (B, aar) Tog bort Firefox OS från krav.
  "2015-12-11": (A, mos) Första utgåvan i samband med kursen webapp.
updated: "2015-12-11 11:08:40"
created: "2015-12-11 11:08:38"
...
Bygg hybrid webapp med Cordova
==================================

Du kommer igång och bygger hybrid webappar med Apache Cordova genom att överföra dina befintliga webappar till Apache Cordova och du testar mot ett antal utvalda plattformar.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har förkunskaper som motsvarar de fem första kursmomenten i kursen webapp.

Du har installerat Apache Cordova på din miljö och du har testat så att det fungerar på plattformarna browser och Android.



Introduktion {#intro}
-----------------------

Spara din kod i katalogen `me/kmom06/cordova`.

När du är klar med uppgiften, avsluta med att skapa en ny version av din meapp genom att kopiera `kmom05/me5` to `kmom06/me6`.



Krav {#krav}
-----------------------

1. Skapa en ny Cordova app `kmom06/cordova/me5` och använd koden från din meapp `kmom05/me5`. Testkör appen på plattformarna browser och Android. Se hur appen fungerar på de olika plattformarna.

1. Skapa en ny Cordova app `kmom06/cordova/mithril` och använd koden från din `kmom04/mithril`. Testkör appen på plattformarna browser och Android. Se hur appen fungerar på de olika plattformarna.

1. Skapa en ny Cordova app `kmom06/cordova/pizza` och använd koden från din `kmom05/pizza`. Testkör appen på plattformarna browser och Android. Se hur appen fungerar på de olika plattformarna.

1. Uppgradera din pizza-app så den använder en egen icon som visas när man kör den via Cordova.

1. Uppgradera din pizza-app så den använder en splash-screen via Cordova plugin cordova-plugin-splashscreen.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate cordova
dbwebb publish cordova
```

1. Skapa din meapp version 6 i `kmom06/me6` genom att kopiera `kmom05/me5` och därefter göra eventuella uppdateringar som du själv bestämmer.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate me6
dbwebb publish me6
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Lägg lite extra tid på att göra följande extrauppgifter, om du känner att du har tiden.

* Installera fler plattformar i Cordova och testkör på dem. Använd till exempel iOS, Windows, eller någon av de andra plattformarna.
* Pröva att använda fler pluginer och integrera med hårdvaran.
* Pröva att koppla dig mot din egen mobil för att testköra din app.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




