---
author: efo
category: webbprogrammering
revision:
  "2017-03-07": (A, efo) Första utgåvan i samband med kursen webapp v2.
...
Skapa en Nobel app
==================================

Du skall bygga en app för Nobel festen, där man kan söka information om tidigare pristagare och deras forskning. Appen bygger på [Nobelprisets öppna json api](http://www.nobelprize.org/nobel_organizations/nobelmedia/nobelprize_org/developer/), med ytterligare [dokumentation och exempel](https://nobelprize.readme.io/).

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Modeller och request i mithril](kunskap/mithril-modeller-och-request)".



Introduktion {#intro}
-----------------------

Börja med att skapa ett cordova projekt i `me/kmom02/nobel/` och efter det ett mithril projekt i `me/kmom02/nobel/www/`, precis som vi gjorde för me-appen i kmom01.

```bash
# Ställ dig i rooten av kursrepot
cd me/kmom02
cordova create nobel se.dbwebb.nobel Nobel
cd nobel
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

För att appen kan hämta data från `api.nobelprize.org` måste vi lägga till urlen i vår Content-Security-Policy enligt nedan.

```html
<meta http-equiv="Content-Security-Policy" content="default-src 'self' http://api.nobelprize.org data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *; img-src 'self' data: content:;">
```



Krav {#krav}
-----------------------

1. Din app skall innehålla en lista med årtal, minst 10 år i följd.

1. Varje årtal skall vara en länk till en sida som visar det årets nobelpristagare.

1. Nobelpristagarna skall sorteras per kategori. Om det finns flera pristagare skall alla skrivas ut.

1. Visa motiveringen för priset.

1. Skapa ett representativt utseende för en så viktig organisation som Nobelstiftelsen.

1. Din me-app skall kunna köras med cordova både i browsern och i en android emulator.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate nobel
dbwebb publish nobel
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Skapa länkar för alla pristagare från din års vy, som öppnar en ny vy med information om pristagaren.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
