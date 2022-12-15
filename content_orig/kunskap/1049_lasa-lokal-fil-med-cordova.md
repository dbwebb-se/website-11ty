---
author: aar
category: javascript
revision:
  "2017-03-16": (A, aar) Första utgåvan inför kursen webapp v2.
...
Läsa en lokal fil med Cordova
==================================

Vi ska i den här övning titta på hur man använder [Cordovas File plugin](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-file/index.html) för att läsa data från lokala filer. För mer utförlig dokumentation av plugin:et kolla på [Phonegap](http://docs.phonegap.com/en/1.3.0/phonegap_file_file.md.html) istället. Dock ska den dokumentationen vara utdaterad men i skrivande stund är den bättre än Cordovas egna.


<!--more-->



Introduktion {#introduktion}
--------------------------------------

Vi utgår ifrån att du har ett projekt eller att du skapar ett nytt. Projektet behöver plattformarna Browser och Android. Skapa mapparna `www/{models,views}` och filerna `www/{models/people.js,views/people.js}`. Skapa ett klassikt projekt för kursen helt enkelt, med npm, mithril och webpack. Jag kommer bara att visa `www/models/people.js` filen, det är här vi läser in datan. Jag utgår ifrån att ni kan lista ut resterande kod, kolla i exempel mappen, "example/readFile", eller på [Github](https://github.com/dbwebb-se/webapp/tree/master/example/readFile).

Vi ska bara använda Cordova plugin:et för att läsa filer när appen används i Android, för att läsa filer i browser:n kommer vi använda [m.request()](https://mithril.js.org/request.html).

Lägg till plugin:et i projektet.

```bash
#utgå från projekt mappen
cordova plugin add cordova-plugin-file --save
```

Vi behöver en fil med JSON data. Jag skapar `www/peopleInfo.json` och fyller den med följande data.

```json
[
  {
    "index": 0,
    "balance": "$1,082.91",
    "age": 24,
    "name": "Shari Castro",
    "address": "331 Grattan Street, Garberville, Connecticut, 7899"
  },
  {
    "index": 1,
    "balance": "$3,414.10",
    "age": 21,
    "name": "Payne Burke",
    "address": "575 Christopher Avenue, Sisquoc, Arkansas, 6638"
  },
  {
    "index": 2,
    "balance": "$1,784.90",
    "age": 26,
    "name": "Obrien Newman",
    "address": "528 Pitkin Avenue, Hendersonville, Louisiana, 2918"
  }
]
```



Läsa från fil i Android {#lasa_android}
--------------------------------------

Tänk på att `deviceready`-eventet behöver avfyras/aktiveras innan plugin:et är redo att användas.

I `www/models/people.js` skapar vi ett "People" objekt, med en load funktion och en funktion för att skriva ut errors. Cordova har en section med "[List of error codes and meanings](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-file/index.html#list-of-error-codes-and-meanings)" för fil plugin:et som kan vara bra att känna till när ni ska felsöka.

```js
"use strict";
var m = require("mithril");

function fail (err) {
    console.log("Error: ", err);
}

var People = {
    data: [],
    
    load: function () {
    }
};

module.exports = People;
```



###Hämta filen {#hamta_fil}

Kika på [Android File System Layout](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-file/index.html#android-file-system-layout), kolla vilka olika mappar vi kan välja att vår path, till filen, ska utåg från och vad de den property:n heter. Filen vi ska läsa kommer ligga i `file:///android_asset/www/` så jag väljer att använda `applicationDirectory` property:n. En sak att tänka på, vi har bara läsrättigheter i den mappen så vi kan inte skriva till filen.

Skapa en ny funktion för att hämta ett [FileEntry](http://docs.phonegap.com/en/1.3.0/phonegap_file_file.md.html#FileEntry) objekt. FileEntry objekt representerar filer på filsystemet, via den kan vi komma åt vår fil och hämta data.

```js
var fileNameAndroid = "www/peopleInfo.json";

function getDataAndroid() {
    window.resolveLocalFileSystemURL(cordova.file.applicationDirectory + fileNameAndroid, readData, fail);
}

var People = {
    ...
    load: function () {
        getDataAndroid();
    }
};
```

Vi använder [window.resolveLocalFileSystemURL()](https://developer.mozilla.org/sv-SE/docs/Web/API/LocalFileSystem#resolveLocalFileSystemURL()) för att hämta FileEntry objektet. Om filen finns och vi lyckas hämta den kallar vi på funktionen `readData` och om vi misslyckas kallar vi på funktionen `fail` och skriver ut felmeddelandet.



###Läsa filen {#lasa_fil}

Vi skapar funktionen `readData` för att läsa upp datan ur filen.

```js
function readData(fileEntry) {
    fileEntry.file(function (file) {
        ...
    }, fail);
}
```

Funktionen tar emot en parameter, vårt FileEntry objekt. Funktionen `file` ger oss tillgång till filen, vi skapar en annonym funktion och skickar som argument. Den annonyma funktionen tar emot ett [File](http://docs.phonegap.com/en/1.3.0/phonegap_file_file.md.html#File) objekt. Vi kan använda ett [FileReader](http://docs.phonegap.com/en/1.3.0/phonegap_file_file.md.html#FileReader) objekt för att läsa innehållet från File objektet.

```js
    ...
    fileEntry.file(function (file) {
        var reader = new FileReader();
        reader.onloadend = function() {
            People.data = JSON.parse(this.result));
            m.redraw();
        }
        
        reader.readAsText(file);
    }, fail);
```
I den annonyma funktionen skapar vi ett FileReader objekt, FileReader objektet har ett antal [properties](http://docs.phonegap.com/en/1.3.0/phonegap_file_file.md.html#FileReader_properties) som vi kan använda för att skapa funktioner som exekveras vid specifika tillfällen under filläsnings processen. Vi väljer `onloadend` property:n och tilldelar den en funktion. Funktionen kommer exekvera när FileReader:n har laddat klart innehållet, alltså när all data är läst.  
I "onloadend" funktionen refererar vi till FileReader objektet med `this`, då kommer vi åt property:n `result`. "result" innehåller vår data som en vanlig sträng och därför använder vi `JSON.parse()` för att skapa ett JSON objekt av datan. Läsning av filen sker asynkront vilket innebär att med stor sannolikhet kommer mithril köra `view` funktionen, som använder `People.data`, före vi har läst klart datan och tilldelat den till "People.data". Detta gör att vi måste lägga till [m.redraw()](https://mithril.js.org/redraw.html) så att mithril kallar på view-funktionen igen när vi har läst datan.  
Efter att vi har skapat onloadend funktionen kallar vi på funktionen som faktist läser innehållet, `readAsText(file)` som i sin tur, när den är klar, kallar på onloadend funktionen.

Nu har vi läst upp data från en fil i Android och kan använda den i en vy. Nästa steg blir att avgöra om en Android enhet används eller en webbläsare och i så fall hämta datan med "m.request".



Läsa från fil i webbläsaren {#lasa_browser}
--------------------------------------

För att avgöra vilken enhet som används installerar vi [Cordovas device plugin](https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-device/index.html).

```bash
cordova plugin add cordova-plugin-device --save
```

Vi lägger till en ny funktion där vi kollar om vi är i Android eller webbläsaren, kalla på den nya funktionen i `People.load()`.

```js
function loadPeopleData() {
    var isAndroid = (device.platform === "Android") ? true : false;
    if (isAndroid) {
        getDataAndroid();
    } else {
        getDataBrowser();
    }
}
var People = {
    data: [],

    load: function () {
        loadPeopleData();
    }
};
```

Om `device.platform` är lika med "Android" kalla på "getDataAndroid" annars "getDataBrowser".

Nu till skapandet av `getDataBrowser` och läsa från fil med [m.request()](http://mithril.js.org/request.html).

```js
var fileNameBrowser = "peopleInfo.json";
...
function getDataBrowser() {
    m.request({
        method: "GET",
        url: fileNameBrowser
    })
    .then(function (items) {
        console.log(items);
        People.data = items;
    });
}
```

Vi gör ett vanligt "GET" request, som vi gjort mot API:er tidigare i kursen, fast med en path, som utgår från `www`-mappen, till filen istället för en URL till ett API. Request:et läser upp datan som JSON av sig själv vilket gör att vi inte behöver parsa den själva. Vi behöver inte heller gör `m.redraw()` då mithril gör det automatiskt.

Då är vi klara med att läsa in data från en fil. Med vår nuvarande kod behöver vi läsa filen varje gång vi vill se innehållet. För att få lite bättre prestanda kan vi cacha datan.



Att cacha JSON {#cacha_json}
--------------------------------------

Vi gör det enkelt genom att kolla om vi redan har hämtat datan. Om variabeln är tom så hämtar vi datan men om variabeln har ett innehåll så används det.

I `People.load()` lägger vi in en if-sats som kollar om längden av array:en `People.data` är 0. Om array:en är tom hämtar vi datan annars gör vi inget då all data redan finns.

```js
...
    load: function () {
        if (People.data.length === 0) {
            loadPeopleData();
        }
    }
...
```

Detta var alltså en enkel cachning av ett JSON-svar. Det minskar belastningen på servern och snabbar upp vår app. För att verifiera att din cachning fungerar så kan du alltid lägga in ett par console.log för att följa flödet. Om vi hade cachat data från t.ex. en databas borde vi också kolla en timestamp, så datan inte är äldre än t.ex. 10 minuter, då databasen kan ha uppdaterats sen vi hämtade datan.



Avslutningsvis {#avslutning}
--------------------------------------

Detta var en genomgång av två olika sätt att läsa upp innehåll från en fil och även hur vi kan cacha datan på ett enkelt sätt.
