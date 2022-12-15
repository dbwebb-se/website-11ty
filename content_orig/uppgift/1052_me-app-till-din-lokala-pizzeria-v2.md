---
author: mos
category: webbprogrammering
revision:
  "2017-03-14": (B, aar) Andra utgåva i samband med webapp-v2.
  "2015-12-04": (A, mos) Första utgåvan i samband med kursen webapp.
updated: "2017-03-14 10:39:12"
created: "2015-12-04 10:38:40"
...
Me-app till din lokala pizzeria
==================================

Din lokala pizza-leverantör fick nys om att du kunde det där med webb och mobila appar. De ringde upp dig och frågade om du kunde göra en prototyp till deras mobila webapp. Deras tanke är att kunderna kan se menyn och kanske till och med beställa direkt från appen.

De lockar med fri pizza för dig så länge de använder appen. Fixar du det?

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har förkunskaper som motsvarar de fyra första kursmomenten i kursen webapp.



Introduktion {#intro}
-----------------------

Du ska skapa en pizza-app, där man kan se bild, namn och pris på pizzor och lägga till dem i en varukorg.

Börja med att skapa ett cordova projekt i `me/kmom05/pizza/` och efter det ett mithril projekt i `me/kmom05/pizza/www/`, precis som vi har gjort i tidigare kursmoment.

```bash
# Ställ dig i rooten av kursrepot
cd me/kmom05
cordova create pizza se.dbwebb.pizza Pizza
cd pizza
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

Du kan använda ett annat tema än "pizza", välj vad du vill, sushi kanske? Byt inte namn på mappen om du ändrar temat!

Uppgiften är fri, så när du saknar information så tar du själv ett beslut och dokumenterar det i redovisningstexten.

Prioritera så att du hinner lösa uppgiften inom tidsramarna.

Behöver du inspiration? Bild-googla "pizza appen" så får du en mängd bilder på hur det kan se ut. Eller installera en pizza-app på din mobil, det finns redan ett stort utbud och genom att studera dem kan du skapa en uppfattning om hur du kan lösa uppgiften.



Krav {#krav}
-----------------------

1. Appen ska funka i webbläsaren och i en Android emulator.

1. Pizzor och pris ska läsas upp från en JSON-fil. Om appen används på en Android plattform ska innehållet läsas med hjälp av [Cordovas File plugin](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-file/index.html), om appen används i en webbläsare ska filen läsas med hjälp av [m.request()](http://mithril.js.org/request.html). Använd [Cordovas Device plugin](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-device/index.html) för att kolla vad för plattform som används.

1. Det skall finnas en förstasida med bild och text om din kund.

1. Det skall finnas en sida med kontaktuppgifter och bild på restaurangen.

1. Det skall finnas en meny och varje rätt på menyn skall ha en egen sida med bild, text och pris. Det skall finnas minst 10 rätter på menyn.

1. Det skall finnas en varukorg, beställning. När man tittar på menyn skall man kunna välja att lägga rätten i sin beställning.

1. Det skall finnas en sida som visar nuvarande beställning.

1. Du skall kunna ta bort en rätt från beställningen.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate pizza
dbwebb publish pizza
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Lägg lite extra tid på att göra följande extrauppgifter.

* Lägg till extra funktionalitet som använder ett [Cordova plugin](https://cordova.apache.org/docs/en/latest/#plugin-apis).
* Gör så man kan lägga till extra saker på varje beställning, till exempel extra kött på kebabpizzan vilket kostar 10 SEK.
* Jobba med stylen så att den motsvarar din kunds profil.
* Lägg till extra funktioner som du själv anser passar in i appen.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




