---
author: efo
category: webbprogrammering
revision:
  "2017-03-14": (A, efo) Första utgåvan i samband med kursen webapp v2.
...
Gomoku klient i Mithril
==================================

I linux-kursen skapade vi kommandoradsklienter som skickade frågor till en nodejs Gomoku-server. I detta kursmoment skall vi ta klienten ett steg vidare och bygga den som en SPA applikation i mithril.

[INFO]
Gör `dbwebb update` i kursrepot för att försökra dig om att du har den senaste exempelkoden.
[/INFO]



<!--more-->



Introduktion {#intro}
-----------------------

Börja med att skapa ett cordova projekt i `me/kmom06/gomoku/` och efter det ett mithril projekt i `me/kmom06/gomoku/www/`, precis som vi har gjort i tidigare kursmoment.

```bash
# Ställ dig i rooten av kursrepot
cd me/kmom06
cordova create gomoku se.dbwebb.gomoku Gomoku
cd gomoku
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

För att appen kan hämta från och skicka data till vår Gomoku server på `localhost:1337` måste du lägga till urlen i Content-Security-Policy. Android emulatorn använder dock ip adressen `10.0.2.2` för att komma åt localhost på din värd dator. Så vi lägger till både `http://localhost:1337` och `http://10.0.2.2:1337` i vår CSP.

Vi måste därför veta vilken platform vi kör programmet på för att kunna avgöra vilken url vi skall använda. Vi använder oss av pluginen `cordova-plugin-device` ([Dokumentation](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-device/index.html)) för att bestämma plattform. Pluginen installeras genom följande kommando.

```bash
$ cordova plugin add cordova-plugin-device
```

Vi kan nu i all kod som anropas från vår `onDeviceReady: function() { }` använda kommandot `device.platform` för att hämta information om plattformen.

```javascript
var current_platform = device.platform;
```

Vi användar oss av Gomoku servern som finns i [`example/gomoku`](webapp/repo/example/gomoku) och på [Github](https://github.com/dbwebb-se/webapp/tree/master/example/gomoku). Serverns API är dokumenterat i [Github repot](https://github.com/dbwebb-se/webapp/blob/master/example/gomoku/api.md). Servern har skrivits om så den kan köras enbart med node via följande kommando.

```bash
$ node index-server.js
```



Krav {#krav}
-----------------------

1. Din app skall hämta data från en lokal Gomoku server.

1. Det skall finnas en start sida där man kan starta ett spel.

1. Spelbrädan skall visas upp och man kan klicka på alla fria platser.

1. Det skall synas tydligt vem som är nästa spelare.

1. Skapa ett utseende, som gör att man kan spela Gomoku från en mobil enhet.

1. När en spelare har vunnit, ska en ny vy visas med en text om vinnaren.

1. Din me-app skall kunna köras med cordova både i browsern och i en android emulator.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate gomoku
dbwebb publish gomoku
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
