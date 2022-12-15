---
author: efo
category: webbprogrammering
revision:
  "2017-03-13": (A, efo) Första utgåvan i samband med kursen webapp v2.
...
Dashboard
==================================

Du skall bygga ett Dashboard som visar information från github.com och ytterligare ett valfritt api med hjälp av mithril components. Dashboardet skall fungera på enheter i olika storlekar.


<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artiklarna "[Ett enkelt grid för alla våra enheter](kunskap/ett-enkelt-grid-for-alla-vara-enheter)" och "[En kalender med mithril components](kunskap/en-kalender-med-mithril-components)".

Din me-app har en Github-sida så du har redan bekantat dig med [Githubs api](https://developer.github.com/v3/).

Det kan underlätta att titta i [API-katalogen](http://apikatalogen.se/) när ni ska hitta api'er till dashboarden.



Introduktion {#intro}
-----------------------

Börja med att skapa ett cordova projekt i `me/kmom03/dashboard/` och efter det ett mithril projekt i `me/kmom03/dashboard/www/`, precis som vi har gjort i tidigare kursmoment.

```bash
# Ställ dig i rooten av kursrepot
cd me/kmom03
cordova create dashboard se.dbwebb.dashboard Dashboard
cd dashboard
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

För att appen kan hämta data från `api.gihub.com` och ditt valfria api måste du lägga till url'erna i Content-Security-Policy.



Krav {#krav}
-----------------------

1. Din app skall innehålla en vy som innehåller minst nio (9) olika widgets.

1. Dina widgets skall basera sig på minst en egen mithril Component.

1. Dina widgets skall hämta data från Github api't, plus ett valfritt api.

1. Ditt dashboard skall använda sig av ett gridbaserad layout, som visar upp olika många widgets per rad beroende på enhetens storlek. Välj float eller flex varianten på grid. 

1. Ditt grid layout skall visa 5 stycken widgets per rad för enheter med skärmar större än 1200px.

1. Skapa ett utseende, som gör det lätt för användaren att snabbt få en överblick över sina widgets.

1. Din app skall kunna köras med cordova både i browsern och i en android emulator.

1. Lägg till en Splash screen och en ikon i appen.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate dashboard
dbwebb publish dashboard
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter i denna uppgift.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
