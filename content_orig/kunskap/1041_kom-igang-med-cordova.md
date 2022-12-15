---
author:
  - aar
  - efo
category:
  - cordova
  - kurs webapp
revision:
    "2017-03-20": (B, efo) Gjort om för webapp-v3.
    "2017-03-08": (A, aar) Första utgåvan inför webapp-v2.
...
Kom igång med Cordova
==================================

[FIGURE src=/image/kunskap/cordova_logo.png?w=500&h=300]

Vi ska använda Apache Cordova och mithril för att skapa en "Hello World"  och testa köra den i en Android Emulator. Cordova är ett [cross-plattform tool](https://en.wikipedia.org/wiki/Cross-platform) som är gratis och open source. Apparna byggs i HTML, CSS och JavaScript och mithril.



<!--more-->



Förutsättning {#pre}
--------------------------------------

Artikeln är en del av kursen webapp och förutsätter att du har gjort motsvarande "[installera Cordova](kunskap/installera-cordova)". Du har även möjlighet för att köra din kod antingen genom en [emulator eller på en fysisk enhet](kurser/webapp-v3/labbmiljo/emulator-och-fysisk-enhet).



Introduktion {#introduktion}
--------------------------------------

Med hjälp av Cordova ska vi skapa en _hybrid app_, alltså en webbsida som exekveras i mobilen som en native app. Detta gör att vi kan utnyttja native funktionaliteter i våran app, t.ex. kamera, GPS och kontakter. Vi kommer åt de här funktionaliteterna med hjälp av ett [JavaScript API som Cordova har utvecklat](https://cordova.apache.org/docs/en/latest/#plugin-apis).

I den här artikeln kommer vi inte testa någon native funktion utan vi fokuserar på att få ihop en "Hello World" app och testa den i en emulator eller fysisk enhet.

[INFO]
Exemplen för Cordova i kursen innehåller bara `www`-mappen. För att testa koden behöver du ha/skapa ett Cordova projekt du kan kopiera in www-mappen i. Du behöver även lägga till plattformarna Android och Browser för att testa koden.
[/INFO]


Hello World {#hello_world}
--------------------------------------

När vi skapar ett nytt Cordova projekt får vi med kod och filstruktur för en fungerande app så vi testar skapa ett nytt projekt i terminalen.

```bash
# Stå i me/kmom05/hello
$ cordova create . se.dbwebb.helloWorld HelloWorld
```

`cordova create` kommandot tar tar emot följande argument:

* **directory**: Vad mappen som vårt prjojekt ska ligga i ska heta som. I detta fallet vill vi skapa katalogstrukturen i den befintliga katalogen `me/kmom05/hello`.

* **identifier**: Identifierare för appen, används bland annat för Android appar. Den är skriven i [reverse domain name notation](https://en.wikipedia.org/wiki/Reverse_domain_name_notation). I detta fallet "se.dbwebb.helloWorld".

* **title**: Projektets title. I vårt fall "HelloWorld".

Vi tar en titt på vad för mappar och filer som har skapats.

```bash
$ tree hello -L 2
hello
├── config.xml
├── package.json
└── www
    ├── css
    ├── img
    ├── index.html
    └── js
```

* **config.xml**: Configurerar appen. I den kan du ändra beteendet av appen och ändra titel, beskrivning och skapare av appen. [Dokumentation](https://cordova.apache.org/docs/en/latest/config_ref/index.html) för de som vill gräva ner sig.

<!-- * **package.json**: Är som tidigare paket filen för npm.

* **hook**: Här kan vi lägga in skript som vi vill ska ingå i Cordovas skripts. T.ex. om vi vill lägga till ett skript till `build` kommandot.

* **platforms**: Här finns källkoden för alla platformar, som vi lägger till i projektet. Vi kommer ha källkod för Android och Browser. Oftast ska/behöver man inte ändra på någon av den koden.

* **plugins**: Plugin vi lägger till i projektet kommer kopieras hit. -->

* **www**: Här vi kommer jobba och ändra saker. Innehåller vår källkod för webb delen, HTML, CSS och JavaScript.



### Inspektera koden {#inspektera}

Öppna `index.html` så kollar vi vad som finns där. Du kan börja med att läsa igenom kommentarerna och granska koden för att få lite förståelse.

Jag har tagit bort kommentarerna.

```html
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *; img-src 'self' data: content:;">
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <title>Hello World</title>
    </head>
    <body>
        <div class="app">
            <h1>Apache Cordova</h1>
            <div id="deviceready" class="blink">
                <p class="event listening">Connecting to Device</p>
                <p class="event received">Device is Ready</p>
            </div>
        </div>
        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>
```

Vi börjar uppifrån och jobbar neråt.

```html
<meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *; img-src 'self' data: content:;">
```
Första meta taggen är [_content security policy_](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP). Den skyddar vår app mot cross-site scripting (XSS) attacker. Om du vill använda dig av t.ex. en CDN för CSS behöver du editera taggen och tillåta appen att hämta kod från domänen du vill hämta från.

```html
<meta name="format-detection" content="telephone=no">
```
`format-detection` taggen konverterar telefonnummer till länkar. Användare kan klicka på länken så startas ett samtal till det numret.

```html
<meta name="msapplication-tap-highlight" content="no">
```
Den här kan vi ta bort då vi inte ska använda vår app på en Windows Phone.

```html
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
```
Sen har vi `viewport` meta tag som ni har introducerats till tidigare. Den ser till så att hela skärmytan på våra mobila enheter används för att visa innehåll.

Ett tips kan vara att lägga till ytterligare en meta-tag för att säkra upp att special tecken visas rätt i alla enheter.

```html
<meta charset="utf-8" />
```

Längst ner i `body` inkluderar vi två JavaScript filer. `index.js` filen kommer vara vår start punkt. `cordova.js` ger oss tillgång till Cordovas API för att komma åt native funktionaliteter.

Vi går vidare och inspekterar `index.js`. Jag har tagit bort kommentarerna.

```js
document.addEventListener('deviceready', onDeviceReady, false);

function onDeviceReady() {
    // Cordova is now initialized. Have fun!

    console.log('Running cordova-' + cordova.platformId + '@' + cordova.version);
    document.getElementById('deviceready').classList.add('ready');
}
```

Vi ser att detta är helt vanlig JavaScript kod. En funktion och en `EventListener`. Funktionen kopplas till `EventListener` och den anropas när eventet `deviceready` skickas av Cordova.

<!-- Vanlig JavaScript kod, ett objekt med tre funktioner. Det intressanta här är event lyssnaren som lyssnar efter `deviceready`. `deviceready` är ett event från Cordova som meddelar när appen är färdig laddad och det går att använda Cordovas plugins. Vi kommer utgå från funktionen `onDeviceReady` som startpunkt för vår kod.
Koden som finns där nu döljer `<p>` taggen med innehållet `Connecting to Device` och gör `<p>` taggen som innehåller `Device is ready` synlig. -->

Cordova har fler events vi kan utnyttja, här kan du läsa om [de olika eventen](https://cordova.apache.org/docs/en/latest/cordova/events/events.html). Det finns bl.a. `pause` som aktiveras när appen läggs i bakgrunden och `resume` som aktiveras när appen plockas fram från bakgrunden.

Då kan det vara dags att kicka på hur appen ser ut. Vi måste lägga till vilka plattformar appen ska fungera på och sen starta appen. Vi börjar med att lägga till browser och köra appen i den inbyggda webbservern.

```bash
$ cordova platform add --save browser
$ cordova run browser
```

Om du öppnar `index.html` filen i webbläsaren istället för att köra `cordova run browser` kommer `cordova.js` att saknas. `cordova.js` läggs till när du exekverar `cordova run browser`. Då flyttas även din kod till `/platforms/browser/www/` och det är här webbservern utgår ifrån.



Köra appen på en mobil enhet {#mobil}
--------------------------------------
Hela anledningen till att vi använder Cordova är att vi vill kunna köra apparna på mobila enheter. Så låt oss titta på hur vi lägger till Android eller iOS som plattform och kör dessa antigen i en emulator eller i en fysisk enhet. Följ instruktionerna nedan för det mobila operativsystem du har installerat.

### Android
För att köra Cordova Hello World exemplet på en Android enhet eller emulator börjar vi med att lägga till Android som en plattform.

```bash
# stå i me/kmom05/hello
cordova platform add --save android
cordova run android
```

Nu byggs appen för Android, kan ta ett tag när den byggas för första gången. Om du har en mobil enhet i utvecklareläge inkopplat, körs appen på den mobila enheten.

[INFO]
Att köra emulatorer använder mycket resurser från datorn. Om du inte lyckas stänga ner emulator processerna helt kan det sluta med att du har flera liggandes i bakgrunden vilket får din dator att prestera sämre. Kolla vilka processer du har igång med `ps` kommandot i samma terminal du har startat emulatorerna. Om det finns gamla processer kan du döda dem med `kill -9 <PID>`.
[/INFO]



### iOS
För att köra Cordova Hello World exemplet på en iOS enhet eller emulator börjar vi med att lägga till iOS som en plattform.

```bash
# stå i me/kmom05/hello
cordova platform add --save ios
cordova build ios
```

Nu byggs appen för iOS, kan ta ett tag att bygga appen. När appen har byggts klar kan du öppna filen `me/kmom05/hello/platforms/ios/HelloWorld.xcworkspace/` i Xcode. Följ instruktionerna från [Cordova appar på iOS](kunskap/cordova-appar-pa-ios) för att köra appen.



Mithril, webpack och Cordova {#mithril}
--------------------------------------
Hello World exemplet som följer med när vi skapar appar med `cordova create` kommandot är skriven i vanilla JavaScript. Vi vill dock ta det ett steg vidare och använda mithril och webpack som en del av Cordova appen. Vi börjar med att installera webpack och mithril som tidigare.

```bash
# Stå i me/kmom05/hello
$ npm install --save mithril
$ npm install --save-dev webpack webpack-cli clean-webpack-plugin
```

Vi vill nu konfigurera webpack så den kompilerar JavaScript filerna och lägger den kompilerade filen i `www/dist/app.js`. Vi använder därför `path` i webpack-konfigurationen för att definiera en annan sökvägen till den kompilerade filen än standard sökvägen. Skapa först filerna `webpack.dev.config.js` och `webpack.prod.config.js` och lägg in följande konfiguration.

```js
// webpack.dev.config.js
const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
    mode: 'development',
    entry: './js/index.js',
    devtool: 'inline-source-map',
    plugins: [
        new CleanWebpackPlugin({ cleanStaleWebpackAssets: false }),
    ],
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'www/dist'),
    }
};
```

Och produktionskonfigurationen blir:

```javascript
// webpack.prod.config.js
const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
    mode: 'production',
    entry: './js/index.js',
    plugins: [
        new CleanWebpackPlugin({ cleanStaleWebpackAssets: false }),
    ],
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'www/dist'),
    }
};
```

Vi lägger även till vanliga npm skripten i `package.json`.

```json
"scripts": {
  "test": "echo \"Error: no test specified\" && exit 1",
  "start": "webpack --watch --config webpack.dev.config.js",
  "build": "webpack --config webpack.prod.config.js"
},
```

Vi vill nu ladda filen `bundle.js` istället för `js/index.js` i `index.html`. Och vi passar samtidigt på att rensa ut `index.html` så det enbart är våra två JavaScript filer som laddas i `body`.

```html
...
<body>
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="dist/bundle.js"></script>
</body>
...
```

I filen `www/js/index.js` som är vår ingångspunkt i appen importerar vi mithril och förenklar genom att ta bort funktionen `receivedEvent`. Vi använder `m.mount` precis som tidigare för att visa upp vyn `js/views/hello.js`, som vi skapar i samma veva som vi rensar ut i `js/index.js`.

```js
// www/js/index.js

import m from "mithril";
import hello from "./views/hello.js";

document.addEventListener('deviceready', onDeviceReady, false);

function onDeviceReady() {
    // Cordova is now initialized. Have fun!

    m.mount(document.body, hello);
}
```

Nedan syns hello vyn.

```js
// www/js/views/hello.js

import m from "mithril";

var hello = {
    view: function() {
        return m("h1", "Hello World");
    }
};

export default hello;
```



Felsöka appar {#felsoka}
--------------------------------------
Det finns olika sätt att felsöka en Cordova app. Vi börjar med det lättaste, felsöka den i webbläsaren och som en vanlig webbsida. Vi gör detta med vanliga utvecklareverktygen i webbläsaren genom att köra kommandot `cordova run browser`. När det fungerar kan du gå vidare och kolla om det fungerar i emulatorn och på din fysiska enhet.



### Android
När vi felsöker i emulatorn är det bra om vi kan se utskrifter vi gör med `console.log()`. För att se `console.log` kan vi starta `adb logcat` i terminalen medans vi kör appen. Jag lägger in en `console.log()` i `onDeviceReady`, startar emulatorn och kör sen kommandot `adb logcat`.

```js
// www/js/index.js

document.addEventListener('deviceready', onDeviceReady, false);

function onDeviceReady() {
    // Cordova is now initialized. Have fun!
    console.log("Ready to take off!")

    m.mount(document.body, hello);
}
```

[FIGURE src=/image/kunskap/cordova/cordova-intro-logcat.png]

Det är även möjligt att felsöka emulatorn via chrome. Starta emulatorn, öppna en chrome webbläsare och gå till `chrome://inspect/#devices`.
[FIGURE src=/image/kunskap/cordova/cordova-intro-chrome-dbg.png?w=500&h=300]
Klicka på inspect så får du upp ett nytt fönster där du kan styra din emulator och felsöka appen som om det vore en webbsida.
[FIGURE src=/image/kunskap/cordova/cordova-intro-inspect.png?w=500&h=300]



### iOS
För att felsöka iOS appar rekommenderas Apples dokument [Debugging](https://developer.apple.com/support/debugging/).



Avslutningsvis {#avslutning}
--------------------------------------

Nu har vi skapat en mobil webbapp i Cordova och testad den i en emulator och/eller i en fysisk enhet och lärt oss felsöka den.

Har du [tips, förslag eller frågor om artikeln](t/6312) så finns det en specifik forumtråd för det.
