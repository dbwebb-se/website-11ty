---
author: mos
category:
    - javascript
    - linux
    - debian
revision:
    "2017-02-02": (D, mos) Version 6 av nodejs och senaste versionen av Babel samt babel presets.
    "2016-01-26": (C, mos) Återgår till version 5 av Babel.
    "2016-01-21": "(B, mos) Babel installeras nu som babel-cli."
    "2015-08-07": "(A, mos) Första utgåvan för linux-kursen."
...
Kom igång med Node.js på Debian
==================================

[FIGURE src=/image/snapht15/nodejs-green.png?w=c5 class="right" caption="Node.js på Debian"]

Detta handlar om JavaScript på servern. Guiden visar hur du kommer igång med Node.js på en Debian-maskin (Linux). Du får installera Node tillsammans med Babel för att klara av JavaScript enligt ECMA6. Därefter visas ett par exempelprogram ur kursrepot för Linux-kursen.

<!--more-->



Förutsättningar {#forut}
--------------------------------------

Denna artikel ingår i kursen [linux](linux) där vi installerar programmen på en Debian Linux-server. Det förutsätts därför att du genomför allt som står här på en Debian-server.

Eftersom det är JavaScript kan du i princip göra samma sak på godtyckligt OS som Mac OS eller Windows. Men det täcks inte av artikeln.



Om Node.js,npm, Babel och ECMA6 {#om}
--------------------------------------

Så, JavaScript på servern. Det vi behöver är en motor som kan köra JavaScript och den mest populära är [Node.js](https://nodejs.org/).

Node.js har ett system för att distribuera paket och moduler, [`npm`](https://www.npmjs.com/). Via kommandot npm kan vi komma åt mängder at färdiga moduler, och hela program, för JavaScript-programmering.

[Babel, eller babeljs](https://babeljs.io/) är ett kommandoradsprogram som kan kompilera kod skriven i JavaScript ECMA6 till äldre JavaScript som gå att köra i Node.js. 

Det som Babel gör är att kompilera källkod till källkod. Ett annat ord för det är [*transpilers*](https://en.wikipedia.org/wiki/Source-to-source_compiler).

[ECMA6 är den senaste versionen (2015) av JavaScript](https://github.com/lukehoban/es6features/blob/master/README.md) och stödet för de programmingskonstruktioner specen innehåller är ännu inte väl utbyggt. Men inom något år kommer det att vara det. Så för att komma igång med ECMA6 redan nu så använder vi Babel.   

Så. låt oss då installera dessa program och se hur de används. 



Installera Node.js, npm och Babel {#install}
--------------------------------------


###Vilken version? {#version}

Node har utvecklats en del under de senaste åren och finns i olika version. När vi installerar paket på Debian så kan det vara en äldre version av Node som man får. För att vara på den säkra sidan så ser vi till att få den senaste staibla versionen av node.

Hur man gör ståre det om på [Nodes installationssida för Debian](https://nodejs.org/en/download/package-manager/). Det vi behöver göra är att köra följande kommando, vilket ger oss en ny plats att hämta hem paketen med den valda releasen av Node.

```text
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
```

Vi har alltså valt version 6 i vårt fall.



###Node.js och npm {#installnode}

Vi börjar med att installera  Node.js som numer innehåller pakethanteraren npm.

```bash
$ sudo apt-get install nodejs
$ which nodejs
$ nodejs --version
$ which npm
$ npm --version
```

Så här kan det se ut.

[ASCIINEMA src=101655]



###Babel och babel-node {#installbabel}

Nu använder vi npm för att installera Babel. Vi ska använda en variant av Babel som heter `babel-node`. Det är en wrapper som dels transpilerar från ECMA6 och dels kör den transpilerade koden i Node.js. Vi behöver alltså bara ett kommando för att köra ett skript i ECMA6.

Vi [installerar babel-node via babel-cli](https://babeljs.io/docs/usage/cli/).

```bash
$ sudo npm install -g babel-cli
$ which babel-node
$ babel-node --version
```

<!--
Du kommer högst troligen få ett felmeddelande på Debian som säger följande.

```bash
$ babel-node --version
/usr/bin/env: node: No such file or directory
```

Babel tror att det exekverbara programmet för Node.js heter `node`, men på Debian finns det ett annat program som heter det så Node.js heter istället `nodejs`.

Ett enkelt sätt att åtgärda detta är att skapa en länk från `node` till `nodejs`.

```bash
$ sudo ln -s /usr/bin/nodejs /usr/bin/node
```

Nu bör det gå bättre.

```bash
$ babel-node --version
```

-->

Så här kan det se ut.

[ASCIINEMA src=101656]

Så, då finns alla program installerade.



Exempelprogram med Node.js {#exempelnode}
--------------------------------------

Du kan starta `nodejs` från kommandoprompten och därefter kan du direkt skriva in JavaScript. Programmet `nodejs` visar att den är redo för inmatning med prompten `>`.

```bash
$ nodejs
> console.log("Hej")
Hej
>
```

Du kan även pröva att starta node via kommandot `node`, det bör fungera också.

Så här kan det se ut.

[ASCIINEMA src=24691]

På detta viset fungerar nodejs precis som Firefox utvecklarverktyg i webbläsaren. Där kan man också skriva in sin JavaScript-kod direkt i utvecklarverktyget. 

Du kan också låta nodejs köra JavaScript-program som finns i filer.

```bash
$ echo "console.log('Hello')" > hello.js
$ nodejs hello.js
Hello
```

Så här kan det se ut.

[ASCIINEMA src=24692]



Exempelprogram med babel-node {#exempelbabel}
--------------------------------------

Programmet `babel-node` fungerar på samma sätt som nodejs, med fördelen att det hanterar ES6.

Här är ett skript enligt ES6 med *arrow* operatorn.

```javascript
var a = [ "mega", "maxi", "multi" ];
var b = a.map( s => s.length )
console.log(b)
```

Det är samma som att skriva följande i ES5.

```javascript
var a = [ "mega", "maxi", "multi" ];
var b = a.map( function(s) { return s.length } )
console.log(b)
```

Arrow-operatorn är alltså ett ES6 sätt att skriva enklare kod för funktioner.

Då kan vi grunderna i hur JavaScript kan köras på serversidan och vi har en miljö installerad.



Babel presets med babel-node {#presets}
--------------------------------------

Babel har ett antal [presets där es2015 (ES6)](https://babeljs.io/docs/plugins/preset-es2015/) är en av dem. Dessa presets bestämmer hur koden transpileras och vilka konstruktioner som stöds.

Man behöver installera de presets man använder.

Låt oss ta ett exempel tillsammans med kursen linux. Där använder vi es2015.

Dels finns i kursrepot en konfigfil `.babelrc` som säger vilka presets vi använder.

```json
{
    "presets": ["es2015"]
}
```

Då behöver vi också installere den babel-modul som stödjer den preseten.

Det gör vi i rooten av kursrepot, i samma katalog där `babelrc` ligger.

```text
# Gå till roten av kursrepot
npm install babel-preset-es2015
```

Bra, nu kan vi köra `babel-node` i alla underkataloger till kursrepot och dra nytta av konfigfilen och dess preset.

Pröva att gå till kursrepot och in till exempelprogrammet `example/nodejs/simpleServer` och starta den med babel-node. Om det går bra så har du en korrekt miljö.



Avslutningsvis {#avslutning}
--------------------------------------

Det var en genomgång av hur du kommer igång med JavaScript på serversidan med Node.js.

Ställ gärna frågor om [Node.js, npm och Babel i forumet](t/4353).

Det finns artiklar om hur du installerar [Node och npm](labbmiljo/node-och-npm) samt [Babel](labbmiljo/babel-node) på din egen lokala utvecklingsmiljö.
