---
author:
    - aar
category:
    - kursen ramverk2
    - test
revision:
    "2018-12-07": (A, aar) Första versionen.
...
Kom igång med en funktionalitetstester i JavaScript med Selenium
==================================

[FIGURE src=image/ramverk2/selenium_code.png?w=c5 class="right"]

Vi har redan kollat på enhetstester i Javascript med Mocha, nu ska vi gå ett steg vidare i testfasen och kolla på funktionalitetstester med Selenium, och även Mocha. 

<!--more-->



Förkunskaper {#forkunskaper}
--------------------------------------------------------------------

Du har gjort övningen [Kom igång med en testmiljö i Javascript](kunskap/kom-igang-med-en-testmiljo-i-javascript).



Funktionstester {#funktionstester}
--------------------------------------------------------------------

Vi börjar med en kort sammanfattning av vad funktionstester är. Funktionalitetstester ska säkerställa att "appen" fungera utifrån användarens perspektiv. Med andra ord ska vi använda webbsidan vi vill testa som en användare. Det jobbiga och gamla sättet att göra detta på är att manuellt sitta och klicka runt på en webbsida och testa logga in eller fylla i formulär. Men som tur är har vi verktyg för att programmera användares handlingar och flöden nu för tiden. Vi ska använda oss av Selenium tillsammans med Mocha. För att få lite bättre koll på vilka olika verktyg som finns där ute kan ni läsa [An Overview of JavaScript Testing in 2018](https://medium.com/welldone-software/an-overview-of-javascript-testing-in-2018-f68950900bc3), ni kan skrolla ner ungefär halvvägs för att komma till "UI Testing Tools", vilket Selenium är.

Funktionstester kan även kallas end-to-end testing, eller e2e. Då det oftast testar hela application, inklusive hårdvaran och hela infrastrukturen. Det brukar även klassas som black-box tester.



### Selenium {#selenium}

Selenium kan sammanfattas lite kort med:
> Selenium is an umbrella project for a range of tools and libraries that enable and support the automation of web browsers.

Selenium finns tillgängligt i ett antal språk, bl.a. Java, Python och JavaScript. Det finns [dokumentation för hela projektet](https://seleniumhq.github.io/docs/index.html) men även bara för [Javascript API:et](https://seleniumhq.github.io/selenium/docs/api/javascript/). Jag tycker att JavaScript dokumentationen fungerade bra för att söka upp funktioner och få en hyfsad uppfattning om hur de fungerar.

När man kodar med Selenium behöver man tänka på att det jobbar asynkront med promises, vilket gör att det blir mycket kod med `.then()` och skapande av anonyma funktioner. Nästan alla funktioner i Selenium returnerar ett promise.

Vi använder Selenium tillsammans med Mocha för att det ger oss en bra struktur för våra tester med Test Suit, Test Case, before och after funktioner bl.a.

**OBS!** för er som använder WSL på Windows, jag fick inte Selenium och Mocha att fungera. Jag var tvungen att gå över till Cygwin. Ni kan testa köra det men om det inte fungerar spendera inte för mycket tid på att försöka fixa det. Om någon får det att fungera dock gör ett foruminlägg och dela med er av hur ni gjorde.

Vi går vidare till att sätta igång med att få igång Selenium men först behöver vi en webbsida att testa.



Kodmoduler att testa {#kodmoduler}
--------------------------------------------------------------------

Vi behöver en kodbas att testa, jag har klippt och klistrat ihop två av exempelprogrammen som finns i kursrepot och skapat [Multipage med en kalkylator](https://github.com/dbwebb-se/ramverk2/tree/master/example/test/functiontest-selenium). Däri kan ni hitta ett fungerande exempel på vad vi kommer gå igenom i denna övningen.



Selenium i JavaScript {#seleniumJs}
--------------------------------------------------------------------

Jag gjorde ett testprogram i `example/test/functiontest-selenium` för att se hur det fungerade.

```text
example/test/functiontest-selenium$ tree .
.
├── package.json
├── src
│   ├── multipage
│   │   ├── index.html
│   │   └── main.js
│   └── style.css
└── test
    └── multipage
        ├── mocha_test.js
        └── simple_test.js
```

Min källkod finns i `src/multipage` och mina selenium tester ligger i `test/multipage`. `simple_test.js` innehåller ett kort exempel för att starta Selenium, hämta en sidas titel och skriva ut den i terminalen. `mocha_test.js` innehåller testerna och använder sig av både Selenium och Mocha.

Om ni kollar i `package.json` ser ni att vi använder paketen mocha, selenium-webdriver och http-server. Mocha och selenium-webdriver är självförklarande, http-server använder vi bara för att köra koden i `src` som om det låg på en server och URL:erna i testerna ser likadana ut för alla. Börja med att installera paketen.

```bash
$ npm install
```

**Notera** versionen på selenium-webdriver, när jag installerade det första gången fick jag en alpha build som inte fungerar så kolla att ni har ex. `3.6.0`. Vi går vidare med att starta upp servern och kollar på hur webbsidan ser ut. Efter kommandot öppna din webbläsare och gå till `localhost:8082`.

```bash
$ npm start
```

[FIGURE src=image/ramverk2/multipage.png class="right" caption="Multipage exempel i Javascript."]

Om du redan kör en annan tjänst på port 8082 kan du ändra vilken port som ska användas i `package.json`.  
Det är en väldigt simpel sida vi ska testa, det enda som är lite avancerat är kalkylatorn. När vi skriver tester nu vill vi testa användarnas upplevelse. T.ex. att knappar och länkar fungerar och saker har rätt färg m.m.



### Selenium kod {#selenium_kod}

Öppna `simple_test.js` i Atom och kolla på koden.

```javascript
var browser = new webdriver.Builder().
    withCapabilities(webdriver.Capabilities.firefox())
    .build();

browser.get("http://localhost:8082/multipage/#!/");
```

Vi börjar med att bygga en driver (`browser`), det är den som sköter vår interaktion med webbsidan. Det finns en mängd inställningar man kan sätta med [Capabilities](https://seleniumhq.github.io/selenium/docs/api/javascript/module/selenium-webdriver/index_exports_Capabilities.html) men jag sätter bara vilken webbläsare som ska användas. De tillgängliga webbläsarna finns i slutet i Capabilities länken. Sist sätter vi vilken URL weblläsaren ska gå till när man startar testet.

Nu kan vi börja jobba mot webbsidan, vi börjar simpelt med att hämta titeln på sidan med `browser.getTitle()` och skriver ut den.

```javascript
// Two different ways to work with promises
// Way 1
let promise = browser.getTitle();

promise.then(function(title) {
    console.log(title);
});

// Way 2
browser.getTitle().then(function( title ) {
    console.log(title);
});
```

`.getTitle()` returner ett promise som bli klart innan vi kan kan skriva ut värdet. Ovanför kan ni se två vanliga sätt som man jobbar med promises och ".then". Välj det sättet ni föredrar och håll er till det, jag kommer använda den nedre av de två.

Nu har vi lite koll på vad som sker i koden, vi testar köra det.

```bash
$ node test/multipage/simple_test.js
Multipage
Multipage
```

Finemang, nu kan vi gå vidare till att bygga ordentliga tester och kör det med Mocha.



### Selenium med Mocha {#selenium_mocha}

`mocha_test.js` innehåller en hel del kod redan så innan ni dyker ner i den kör vi en förklaring av strukturen och börjar lite smått.

Vi börjar överst:

```javascript
const assert = require("assert");
const test = require("selenium-webdriver/testing");
const webdriver = require("selenium-webdriver");
const By = require("selenium-webdriver").By;

let browser;
```

Vi importerar lite fler moduler, `selenium-webdriver/testing` wrappar Mocha vilket gör att vi inte behöver importera Mocha utan behöver bara köra testerna med mocha kommandot i terminalen och `assert` borde ni känna igen. När vi ska navigera på webbsidan via koden och få tag på element fungerar det nästan som när vi kodar vanlig JS och hämtar element med t.ex. `document.getElementById()`, men vi behöver använda Seleniums funktioner. [webdriver.findElement()](https://seleniumhq.github.io/selenium/docs/api/javascript/module/selenium-webdriver/ie_exports_Driver.html#findElement) eller [webdriver.findElements()](https://seleniumhq.github.io/selenium/docs/api/javascript/module/selenium-webdriver/ie_exports_Driver.html#findElements) och [By modulen](https://seleniumhq.github.io/selenium/docs/api/javascript/module/selenium-webdriver/lib/by_exports_By.html).

Vi fortsätter med att bygga den vanliga Mocha strukturen i vår kod för att få Test Suite och Cases.

```javascript
// Test Suite
test.describe("Multipage", function() {

    test.beforeEach(function(done) {
        this.timeout(20000);
        browser = new webdriver.Builder().
            withCapabilities(webdriver.Capabilities.firefox()).build();

        browser.get("http://localhost:8082/multipage/#!/");
        done();
    });

    test.afterEach(function(done) {
        browser.quit();
        done();
    });

    // Test case
    test.it("Test index", function(done) {
        // Check correct title
        browser.getTitle().then(function(title) {
            assert.equal(title, "Multipage");
        });

        // Check correct heading
        browser.findElement(By.css("h1")).then(function(element) {
            element.getText().then(function(text) {
                assert.equal(text, "Home");
            });
        });
        
        // Check correct URL ending
        browser.getCurrentUrl().then(function(url) {
            assert.ok(url.endsWith("multipage/#!/"));
        });

        done();
    });



    test.it("Test go to Home", function(done) {
        // Use nav link to go to home page
        browser.findElement(By.linkText("Home")).then(function(element) {
            element.click();
        });

        // Check correct heading
        browser.findElement(By.css("h1")).then(function(element) {
            element.getText().then(function(text) {
                assert.equal(text, "Home");
            });
        });
        
        // Check correct URL ending
        browser.getCurrentUrl().then(function(url) {
            assert.ok(url.endsWith("multipage/#!/"));
        });

        done();
    });
});
```

Vi börjar med att lägga in en beforeEach, där vi bygger vår Firefox webdriver och går till sidan vi vill testa. Med `this.timeout(20000);` ökar vi mängden tid som drivern väntar på att något ska ske i webbläsaren. Att starta webbläsaren och gåt till URL:en tog för lång tid på min datorn så jag behöver öka timeout längen. I afterEach stänger vi ner webbläsaren, detta är för att vi inte vill att val i ett test ska påverka nästa test. Om vi hade haft en mer avancerad sida med cookies och session hade vi behövt göra ytterligare steg för att rensa dem mellan testerna. I och med att Selenium är asynkront behöver vi använda [done()](https://mochajs.org/#asynchronous-code) för meddela Mocha när en funktion är klar. Gäller bara de Mocha specifika funktionerna som "it", "afterEach" och "beforeEach".

Sen har vi två test cases där vi kollar att startsidan har rätt title, rubrik och url. Nästa test cases har vi lagt till att kolla så länken till startsidan fungerar och att det fortfarande är rätt värden. Vi hittar rätt länk med [By.linktext()](https://seleniumhq.github.io/selenium/docs/api/javascript/module/selenium-webdriver/lib/by_exports_By.html#By.linkText), ett av flera sätt för att hitta element. Vi anropar `.click()` på elementet för att emulera att vi själva hade klickat med musen i webbläsaren, jätte smidigt. Vi ser redan nu att vi har duplikation i koden och vi kommer få mer för de andra undersidorna så därför har jag i exempel koden skapat hjälpfunktioner för de vanliga repeterade handlingarna.

I testfallen för kalkylatorn kan ni se mer exempel på att klicka på element och läsa av CSS värden. För att köra alla tester kan ni använda kommandot `npm test`. Det kör alla "*.js" filer som ligger under mappne "test".

En lyckad körning borde se ut som följer:

```bash
$ npm test

> multipage-test@1.0.0 test .../ramverk2/example/test/functiontest-selenium
> mocha test/**/*.js

Multipage
Multipage
Multipage
    ✓ Test index
    ✓ Test go to Home (320ms)
    ✓ Test go to About (47ms)
    ✓ Test go to Calculator (78ms)
    ✓ Test color on Calculator (77ms)
    ✓ Test an addition calculation (984ms)


  6 passing (22s)

```


Mer Selenium funktionalitet {#mer_selenium}
-------------------------------------------------------------------

Något som inte finns i exempelkoden men som man kan göra är att emulera tangentbordstryck med funktionen  [sendKeys](https://seleniumhq.github.io/selenium/docs/api/javascript/module/selenium-webdriver/lib/webdriver_exports_WebElement.html#sendKeys) och skicka formulär med [submit](https://seleniumhq.github.io/selenium/docs/api/javascript/module/selenium-webdriver/lib/webdriver_exports_WebElement.html#submit).

Ni borde ha testat köra testerna några gånger nu och har märkt att det går snabbt när testerna körs och man hinner inte se allt som sker. För att komma runt detta kan man använda [takeScreenshot()](https://seleniumhq.github.io/selenium/docs/api/javascript/module/selenium-webdriver/lib/webdriver_exports_WebElement.html#takeScreenshot). Om ni googlar lite kan ni även hitta olika program för att spela in en video av testerna.



Kodtäckning med Selenium {#covselenium}
--------------------------------------------------------------------

Det ska gå att få kodtäckning av Selenium tester med hjälp av [Istanbul](https://github.com/gotwarlost/istanbul/issues/132). Det krävs lite eget arbete och vi vet inte om det funkar, om någon är intresserad är det fritt fram att försöka. Gör gärna ett forum inlägg om det lyckas.



Avslutningvis {#avslutning}
--------------------------------------------------------------------

Vi har kommit en bit längre bland testfaserna och lärt oss hur man kan skapa funktionalitetstester och GUI tester med hjälp av Selenium och Mocha.
