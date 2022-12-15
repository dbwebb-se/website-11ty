---
author: efo
category: javascript
revision:
  "2017-03-13": (A, efo) Första utgåvan inför kursen webapp v2.
...
En kalender med mithril components
==================================
Vi har i kursmoment 1 och 2 tittat på modeller och vyer i mithril. Ofta vill man kunna återanvända komponenter för att förenkla
utvecklingen av komplexa vyer. Mithril har ett inbyggd sätt att skapa och återanvända komponenter i `m`-funktionen. Dessa återanvändbara komponenter kallas helt enkelt [Components](http://mithril.js.org/components.html) och i denna övningen skall vi titta närmre på dessa.

<!--more-->



Introduktion {#intro}
--------------------------------------

Vi kommer i denna övning bygga en kalender med hjälp av mithril components och [Svenska Dagar](http://api.dryg.net/) api't. Källkoden för detta exempel finns i `example/calendar` och på [Github](https://github.com/dbwebb-se/webapp/tree/master/example/calendar/www).



En vy för vår kalendar {#skapa}
--------------------------------------
Det första vi gör är att skapa en vy där vår kalender kommer synas. I och med vi bara ska ha en vy för vår kalender använder vi funktionen `m.mount` för att läsa in vyn från `js/index.js`.

```javascript
// js/index.js
"use strict";

var m = require("mithril");
var Calendar = require("./views/calendar");

var app = {
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
    },
    onDeviceReady: function() {
        m.mount(document.body, Calendar);
    }
};

app.initialize();
```

Vi skapar sedan vyn `js/views/calendar.js`, här importerar vi vår model, som kommer sköta kommunikationen med `https://api.dryg.net` och hantering av svaret. Vi använder livscykel metoden `oninit` för att hämta data från vår model. I vår `view` funktion hämtar vi sedan ut de dagar som har hämtats från api't och med hjälp av `map` itererar vi igenom alla dagarna. Från `map` anropar vi mithrils `m`-funktion, men till skillnad från vad vi har gjort tidigare anropar vi det med ett objekt `Day` istället för med en sträng, som talar om vilken virtuell nod vi vill skapa. Det objekt vi anropar är en mithril komponent. Objektet `Day` har en enda funktion `view`, som returnerar de virtuella noder som komponenten består av. Vi skickar med varje element från `Calendar_model.days` array. Vi kommer åt attributen i elementen via `vnode.attrs`, precis som vi sett tidigare i samband med länkar.


```javascript
// js/views/calendar.js
"use strict";
var m = require("mithril");

var CalendarModel = require("../models/calendar");

var Day = {
    view: function (vnode) {
        return m("div.day" + vnode.attrs.red_day, [
            m("p", [m("strong", vnode.attrs.date)]),
            m("i", vnode.attrs.weekday)
        ]);
    }
};

module.exports = {
    oninit: function () {
        CalendarModel.load();
    },
    view: function() {
        return [
            m("h1", "Calendar"),
            m("div", CalendarModel.days.map(function (day) {
                return m(Day, day);
            }))
        ];
    }
};
```

Nedan finns koden för vår `Calendar` model, som hämtar och behandlar data från `api.dryg.net`. Modellen hämtar ut dagarna för nuvarande månad. Jag har vald att lägga databehandlingen i modellen för att hålla vyn så enkel och kort som möjlig.

```javascript
// js/models/calendar.js
"use strict";
var m = require("mithril");

function zero_pad (number) {
    if (number < 10) {
        number = "0" + number;
    }
    return number;
}

var Calendar = {
    days : [],
    load: function () {
        var today = new Date();
        var apiURL = "https://api.dryg.net/dagar/v2.1/" + today.getFullYear() + "/" + zero_pad(parseInt(today.getMonth()) + 1);

        return m.request({
            method: "GET",
            url: apiURL
        }).then(function (result) {
            Calendar.days = result.dagar.map(function (dag) {
                return { date : dag.datum, weekday : dag.veckodag, red_day : dag["röd dag"] === "Ja" ? ".red-day" : "" };
            });
        });
    }
};

module.exports = Calendar;
```

Nedan syns den färdiga kalendern med en enkel styling. Röda dagar är markerade genom att använda `red_day` attributet från våra dags element i arrayen.

[FIGURE src=/image/snapvt17/calendar-android.png caption="Vår kalendar i android emulatorn."]



Avslutningsvis {#avslutning}
--------------------------------------
Detta var ett enkelt exempel på hur man kan återanvända komponenter i mithril för att skapa en bra uppdelat kodstruktur. Genom att dela upp iterationen av dags element och renderingen av dagarna har vi skapat ett enkelt sätt att återanvända och ändra i koden för visningen och iterationen.

Hade du kunnat lägga till namnsdagar i kalendern? Eller lagt till en vy, som visar all information, vid klick på en av dagarna?
