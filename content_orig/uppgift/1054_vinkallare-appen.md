---
author: efo
category: webbprogrammering
revision:
  "2017-03-14": (A, efo) Första utgåvan i samband med kursen webapp v2.
...
Din egna vinkällare app
==================================

Du skall med hjälp av [REM](http://rem-rest-api.herokuapp.com/) api't skapa din egna vinkällare eller liknande app. Din app skall jobba med alla fyra (4) CRUD-functions.



<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artiklarna "[Mithril och CRUD](kunskap/mithril-och-crud)" och [Ett mobilanpassad formulär](kunskap/ett-mobilanpassad-formular).

Du har bekantat dig med [REM](http://rem-rest-api.herokuapp.com/).



Introduktion {#intro}
-----------------------

Din app kan vara en vinkällare, modelltåg, Lego byggsätt samling eller liknande. Välj något du tycker är roligt och som du vill ha koll på hemma.

Börja med att skapa ett cordova projekt i `me/kmom04/winecellar/` och efter det ett mithril projekt i `me/kmom04/winecellar/www/`, precis som vi har gjort i tidigare kursmoment.

```bash
# Ställ dig i rooten av kursrepot
cd me/kmom04
cordova create winecellar se.dbwebb.winecellar WineCellar
cd winecellar
cordova platform add android --save
cordova platform add browser --save
cd www
npm init --yes
npm install mithril --save
npm install webpack --save
```

Lägg även till `npm start` scriptet, som underlätter vid utveckling och testning:

```json
"scripts": {
    "start": "webpack js/index.js bin/app.js -d"
}
```

Under utveckling rekommenderar vi att ni laddar ner och kör REM api't lokalt. [Installationsintruktioner](kunskap/lokalt-rem-api) för att installera och köra REM api't lokalt.

För att appen kan hämta från och skicka data till `rem-rest-api.herokuapp.com` måste du lägga till urlen i Content-Security-Policy.

[INFO]
När du gör dina anrop mot REM api't måste du ha med attributet `withCredentials: true` i din `m.request` funktion. Detta för att REM api't använder cookies för att hålla koll på dig som användare. Detta gör att det bara är du som kommer åt datat du sparar via api't.
[/INFO]



Krav {#krav}
-----------------------

1. Din app skall innehålla en listning av dina objekt.

1. När man klickar på ett objekt skall man komma till en vy, som visar upp objektet.

1. Varje objekt skall ha minst tre (3) attribut. Ex. Vinets namn, druva och årgång.

1. Man skall kunna skapa och redigera objekt, använd samma formulär för både skapa och redigera.

1. Ditt formulär skall vara anpassat för mobilen.

1. Man skall som användare få visuell feedback när man sparar sina objekt.

1. Man skall kunna ta bort objekt.

1. Skapa ett utseende, som passar till dina valda objekt.

1. Din me-app skall kunna köras med cordova både i browsern och i en android emulator.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate winecellar
dbwebb publish winecellar
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Lägg till så man kan ha flera av samma objekt, bara om antalet blir 0 tas objektet bort helt och hållet.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
