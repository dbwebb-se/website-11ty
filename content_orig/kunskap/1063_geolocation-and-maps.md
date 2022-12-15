---
author: aar
category: webapp
revision:
  "2017-05-16": (A, aar) Första utgåvan inför kursen webapp v2.
...
Geolocation och Google Maps
==================================

Vi ska lära oss hur man kan använda [Cordovas Geolocation plugin](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-geolocation/index.html) för att hämta aktuella longitude och latitude positioner. Sen ska vi titta på hur vi kan använda dem för att visa sin nuvarande position i [Google Maps](https://www.google.se/maps).

Du kan hitta koden för detta exempel på [Github](https://github.com/dbwebb-se/webapp/tree/master/example/splashScreen/www) och i `example/splashScreen`.

<!--more-->



Introduktion {#introduktion}
--------------------------------------

Följ installerings anvisningarna i [Kom igång ramverket Mitrhil](kunskap/kom-igang-med-mithril-och-webpack#install) fast använd mappen "me/kmom03/geolocation" istället för "me/redovisa". Lägg sedan till [Cordovas Geolocation](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-geolocation/index.html) plugin.

```bash
cordova plugin add cordova-plugin-geolocation --save
```



Geolocation {#geolocation}
--------------------------------------

Vi börjar simpelt genom att skriva ut de enhetens koordinater.

I `index.js` lyssnar vi på "deviceready"-eventet och mountar våran vy.

```js
"use strict";
var m = require("mithril");
var Geo = require("./views/geolocation");

var app = {
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
    },
    
    onDeviceReady: function() {
        m.mount(document.body, Geo);
    },

};

app.initialize();
```

I vyn, `views/geolocation.js` importerar vi vår model och skriver ut vår position.

```js
"use strict";
var m = require("mithril");
var Geo = require("./../models/geolocation");

module.exports = {
    oninit: Geo.getCurrentPosition,

    view: function() {
        return m("div.container.center", [
            m("h1.text-center", "Din position!"),
            m("div.positions.center", [
                m("span.lat", ["Latitude: ", m("span.pos", Geo.latitude)]),
                m("span.long", ["Longitude: ", m("span.pos", Geo.longitude)])
            ])
        ]);
    }
};

```

Jag använder "dot notation" för att sätta klasser på html elementen. `div.container.center` sätter klasserna "container" och "center" på en div.

I modelen använder vi plugin:et geolocation för att hämta ut koordinater.

```js
function onError(error) {
    console.log('code: ' + error.code + '\n' +
        'message: ' + error.message + '\n');
}

function onLocationSuccess(position) {
    Geo.latitude = position.coords.latitude;
    Geo.longitude = position.coords.longitude;
    console.log(position);
    m.redraw();
}

var Geo = {
    latitude: 0,
    longitude: 0,
    highAccuracy: true,
    
    getCurrentPosition: function() {
        navigator.geolocation.getCurrentPosition(onLocationSuccess, onError, { enableHighAccuracy: Geo.highAccuracy });
    }
};
module.exports = Geo;
```

Vi använder [navigator.geolocation.getCurrentPosition()](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-geolocation/index.html#navigatorgeolocationgetcurrentposition) för att hämta ut latitud och longitud koordinater. Vi skickar in en "success"-callback, en "error"-callback och ett objekt med [options](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-geolocation/index.html#geolocationoptions) som parametrar till funktionen. 

Det finns en [Android quirk](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-geolocation/index.html#android-quirks) som gör att GPS inte är aktiverat på mobilen. [Options](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-geolocation/index.html#geolocationoptions)


Avslutningsvis {#avslutning}
--------------------------------------

Nu har vi fixat en ikon och en splash screen. I och med att vi bara använder oss av Android kunde vi ha lagt in bilderna direkt i mapparna i `platforms/android/res/` men nu vet vi hur man gör om vi hade haft flera plattformar.

Om du har frågor eller tips så finns det en särskild tråd i forumet om [denna artikeln](t/40777).
