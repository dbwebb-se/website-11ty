---
author: efo
category: javascript
revision:
  "2017-04-18": (A, efo) Första utgåvan inför kursen webapp v2.
...
REM api't
==================================
[REM rest api't](http://rem-rest-api.herokuapp.com/) är ett api man kan använda för att testa klienter under utveckling. Leo Horie som har skrivit mithril har även gjort detta api. Api't har MIT licens och kan klonas från [Github](https://github.com/lhorie/rem). I denna guide går vi igenom hur du kan hämta och köra api't lokalt.



<!--more-->



Installation {#installation}
--------------------------------------
Börja med att ställa dig på lämplig plats i terminalen, till exempel i kursrepot, och kör följande kommandon.

```bash
# dbwebb-kurser/webapp
$ git clone git@github.com:lhorie/rem.git
$ cd rem
$ node index
```

Nu har du startat upp REM api't på port 8000 och går du till localhost:8000 i webbläsaren får du upp en dokumentationssida för api't. Om du vill ändra porten kan detta göras på rad 199 i `index.js`. Eller via environment variabeln `PORT`.

```javascript
}).listen(process.env.PORT || 8000)
```

För att underlätta vid utveckling mot api't kan man även göra debug utskrifter av till exempel urlen, querystring eller liknande. Debug utskrifterna kan med fördel placeras innan if-satsen på rad 34 i `index.js`.



Android Emulatorn {#android}
--------------------------------------
För att appen kan hämta från och skicka data till vårt lokala REM api på `localhost:[PORT]` måste du lägga till urlen i Content-Security-Policy. Android emulatorn använder dock ip adressen `10.0.2.2` för att komma åt localhost på din värd dator. Så vi lägger till både `http://localhost:[PORT]` och `http://10.0.2.2:[PORT]` i vår CSP.



Avslutningsvis {#avslutning}
--------------------------------------
När du är klar med utvecklingen av din app rekomenderar vi att du ändrar tillbaka så appen går mot `rem-rest-api.herokuapp.com`. Detta gör att du kan använda appen på studentservern, då studentservern inte kommer åt din ditt lokala REM api.
