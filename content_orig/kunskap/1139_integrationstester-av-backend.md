---
author: efo
category:
    - nodejs
    - javascript
    - kursen ramverk2
revision:
    "2019-01-24": "(A, efo) Första utgåvan."
...
Integrationstester av backend
==================================

[FIGURE src=image/ramverk2/chai.jpg?w=c5 class="right"]

Vi har tidigare tittat på en testmiljö i JavaScript där vi fokuserade på enhetstester. I denna artikel ska vi bygga vidare på testmiljön och lägga till funktions/integrationstester. Vi bygger vidare med mocha och lägger till testverktygen `chai` och `chai http`.

Vi börjar dock med att fundera lite på vad det egentligen är vi vill testa och hur vi testar hela flödet istället för bara de små enheter.



<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har jobbat igenom övningen [Kom igång med en testmiljö i JavaScript](kunskap/kom-igang-med-en-testmiljo-i-javascript) och har en testmiljö för ditt me-API.



Introduktion {#intro}
--------------------------------------

I konferens keynoten nedan pratar skaparen av Ruby on Rails David Heinemeier Hansson (dhh) om hur hans syn på testning och programmering har ändrats genom åren. Hela keynoten är sevärd, men klippet nedan börjar när han pratar om TDD.

[YOUTUBE src="9LfmrkyP81M" time="24m12s" caption="David Heinemeier Hansson pratar om enhetstester och TDD"]

I keynoten visar dhh ett citat av Seth Godin.

> Just because you can measure it, doesn't mean it's important.

Vi ändrar det i vår värld till.

> Just because you can **test** it, doesn't mean it's important.

Med det vill jag inte argumentera för att vi inte ska skriva tester, men vi vill skriva tester som testar det som användaren ska använda. Ett sätt att göra det för API:er är att testa routerna precis som de anrops av klienter.



Integrationstester {#integrationtesting}
--------------------------------------

Med integrationstester kan vi få lite mer förtroende i att vårt API fungerar som det är tänkt och på samma sätt som de klienter konsumerar API:t. Jag har gjort nedanstående steg i mitt [me-api](https://github.com/emilfolino/ramverk2-me). Använd exempelkoden där för att skaffa dig en överblick över testmetoden.

Vi använder oss av mocha som vi tittade kort på under förre kursmomentet tillsammans med `chai` och `chai-http`. `chai` är ett 'Assertion Library' och låter oss på ett enkelt och smidigt sätt kolla om JavaScript är lika med det vi vill testa för. `chai-http` låter oss anropa router och kolla om svaren vi får tillbaka matcher det vi förväntar oss. Dokumentationen för dessa två moduler finns på [chai dokumentation](https://www.chaijs.com/) och [chai-http dokumentation](https://www.chaijs.com/plugins/chai-http/).

Vi börjar med att installera de två moduler som ett utvecklings beroende med kommandot.

```bash
npm install chai chai-http --save-dev
```

Vi börjar sedan i vår fil `app.js` som är vårt utgångspunkt för appen. Här vill exportera en server så vi har möjlighet för att anropa den från test filerna. Vi ändrar sista raderna i den filen till nått liknande nedanstående.

```javascript
const server = app.listen(port, () => console.log(`Example app listening on port ${port}!`));

module.exports = server;
```

Vi kan då importera `server` i våra test filer och utföra anrop mot servern. Vi skapar för tydlighetens skull filen `test/reports/report_integration.js` och lägger våra tester i den filen. Vi börjar med att sätta vilket nodejs environment vi vill köra testerna som och sedan importerar vi test modulerna och vår `server`.

```javascript
process.env.NODE_ENV = 'test';

const chai = require('chai');
const chaiHttp = require('chai-http');
const server = require('../app.js');
```

Vi vill sedan kunna använda ett av de `chai` specifika 'assertions' (påstående) kallad `should` för att på ett oerhört koncist sätt skriva testfall. Vi inkluderar även `chai-http` i `chai`.

```javascript
process.env.NODE_ENV = 'test';

const chai = require('chai');
const chaiHttp = require('chai-http');
const server = require('../app.js');

chai.should();

chai.use(chaiHttp);
```

Vi kan nu skriva testfall enligt nedan där vi använder `mocha` och `chai` i kombination för att skriva vår testfall.

```javascript
process.env.NODE_ENV = 'test';

const chai = require('chai');
const chaiHttp = require('chai-http');
const server = require('../app.js');

chai.should();

chai.use(chaiHttp);

describe('Reports', () => {
    describe('GET /reports/kmom01', () => {
        it('200 HAPPY PATH', (done) => {
            chai.request(server)
                .get("/reports/kmom01")
                .end((err, res) => {
                    res.should.have.status(200);
                    res.body.should.be.an("object");
                    res.body.data.should.be.an("array");
                    res.body.data.length.should.be.above(0);

                    done();
                });
        });
    });

    describe('GET /reports/kmom02', () => {
        it('200 HAPPY PATH', (done) => {
            chai.request(server)
                .get("/reports/kmom02")
                .end((err, res) => {
                    res.should.have.status(200);
                    res.body.should.be.an("object");
                    res.body.data.should.be.an("array");
                    res.body.data.length.should.be.above(0);

                    done();
                });
        });
    });
});
```

Vi ser här hur vi använder `should` tillsammans med andra nyckelord, som `be` och `above`. För en lista av alla dessa nyckelord se [BDD Dokumentationen för chai](https://www.chaijs.com/api/bdd/) och hur vi kan sätta ihop de.

Vi kör testarna på samma sätt som tidigare med `npm test` och får på samma sätt som tidigare kodtäckning med Istanbul.



Testdatabas {#testdatabas}
--------------------------------------

Om vi har tester som påverkar databasen vill inte att dessa ska påverka varken utvecklingsdatabasen och definitivt inte produktionsdatabasen. Därför är det starkt rekommenderat att du skapar en testdatabas. Ett enkelt sätt att returnera korrekt databas beroende på `NODE_ENV` är att skapa en fil `db/database.js`, som gör precis detta. Ett exempel syns nedan där rätt databas returneras beroende på `NODE_ENV`.

```javascript
var sqlite3 = require('sqlite3').verbose();

module.exports = (function () {
    if (process.env.NODE_ENV === 'test') {
        return new sqlite3.Database('./db/test.sqlite');
    }

    return new sqlite3.Database('./db/texts.sqlite');
}());
```

Vi kan sedan hämta korrekt databas genom att anropa `database.js`.

```javascript
const db = require("../db/database.js");
```



Exempel {#exempel}
--------------------------------------

I [repot för Lager API:t](https://github.com/emilfolino/order_api/tree/master/test) som användes i kursen webapp finns det integrationstester med `chai` och `chai-http`. Ta en titt på detta för att se hur det kan se ut med fler testfall.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har i denna artikel titta på hur vi kan använda integrationstester för att öka vårt förtroende till att den kod vi skriver gör det den ska.
