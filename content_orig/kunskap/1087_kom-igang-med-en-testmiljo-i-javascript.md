---
author:
    - mos
    - efo
category:
    - labbmiljo
    - kursen ramverk2
    - test
revision:
    "2019-01-25": (C, efo) Uppdaterade inför v2.
    "2017-11-20": (B, mos) Uppdaterar docker image för test så node_modules hanteras korrekt.
    "2017-11-03": (A, mos) Första versionen.
...
Kom igång med en testmiljö i JavaScript
==================================

[FIGURE src=image/snapht17/mocha-nyc-codecoverage.png?w=c5 class="right"]

Tanken är att vi förbereder oss för ett större utvecklingsprojekt i JavaScript och vi vill säkerställa att vi har en utvecklingsmiljö där vi kan testa vår programvara.

Vilken typ av tester vill vi göra och vilka verktyg kan hjälpa oss med detta? Låt oss gå igenom läget i JavaScript och använda några testrelaterade verktyg för att sätta en grund.

<!--more-->



Förkunskaper {#forkunskaper}
--------------------------------------------------------------------

Du har en labbmiljö motsvarande kursen ramverk2 och du kan grunderna i enhetstestning.



Testning {#testning}
--------------------------------------------------------------------

Låt oss först prata lite om olika typer av testning.



### Enhetstestning {#unit}

På engelska blir det _unit testing_ ([Wikipedia om Unit Testing](https://en.wikipedia.org/wiki/Unit_testing)) och det handlar om att testa varje enhet av kod för sig själv. Det är _white box testing_ ([Wikipedia om White box testing](https://en.wikipedia.org/wiki/White-box_testing)) eftersom vi har full insyn i koden vi testar. Vi kan se källkoden och vi kan se att våra testfall verkligen exekverar alla delar av koden, förutsatt att vi använder oss av verktyg för kodtäckning, code coverage ([Wikipedia om Code Coverage](https://en.wikipedia.org/wiki/Code_coverage)). Att se kodtäckningen är viktigt i enhetstesterna, annars gör vi det onödigt svårt för oss. Kodtäckning är också ett sätt att visa för utomstående hur mycket av kodbasen som är testad via enhetstester. Att nå 100% i kodtäckning är bra, men man nöjer sig ofta med 70%. Hur mycket kodtäckning man kan få är också beroende av hur testbar koden är. Är koden inte skriven för att vara testbar så kan man ge sig på att det är svårt att skriva testfall i enhetstester och uppnå hög kodtäckning.

Varje testfall i enhetstestet innebär att man anropar en eller flera metoder/funktioner i sitt testobjekt. Testobjektet är den kodmodul man testar. Efter anropet så verifierar man att ett förväntat utfall är uppfyllt. Man har alltså vissa förväntningar på vad som skall hända när koden körs och det skall man verifiera efter att koden körts. Vi kallar detta _assertions_ ([Wikipedia om Assertion](https://en.wikipedia.org/wiki/Assertion_(software_development))) som är villkor som skall vara uppfyllda.

> _"If there is no assertion, it isn't a test."_

När man tänker på test och utveckling av kod i samklang så tenderar man att skriva kod som också är testbar och enkel att testa. Det blir till en erfarenhet som sitter i ryggraden om att koden jag skriver måste gå att testa i enhetstester. Bäst att skriva den testbar med ett tydligt publikt API och resten skyddat. Här funderar jag på vad som kan injectas in i modulen och troligen tänker jag igenom vad som kan mockas och inte ([Wikipedia om Mock object](https://en.wikipedia.org/wiki/Mock_object)), redan när jag utvecklar och skriver koden. När jag ser att jag skriver kod som är svår att testa så kan jag alltid välja att göra refactoring för att koden skall vara enklare att testa.

Det kan vara en klar skillnad mellan att skriva helt ny kod som man vill skall vara testbar, jämfört med att införa enhetstester för existerande kod. Man kan inte räkna med att den existerande koden är testbar ur alla aspekter. Som utvecklare måste man tänka på att skriva kod som är testbar, om man vill uppnå det. All kod som skrivs är inte testbar eller enkel att testa.

Varje testfall skall kunna köras isolerat från alla andra testfall. Man behöver alltså tänka på att varje test man skriver skall kunna köras oberoende av de andra testerna och oberoende av testernas inbördes ordning. Det brukar finnas stöd för att sätta upp en miljö för varje testfall och/eller suite av testfall. En bonus när man lyckas med detta är att alla tester kan köras parallellt. Det är en fördel när alla tester börjar ta längre tid, att köra tester parallellt snabbar upp och effektiviserar utvecklingsitden.

> _"If the tests can not run independently, then they are not unit tests."_



### Testdriven utveckling {#tdd}

TDD är förkortningen av testdriven utveckling ([Wikipedia om Test-driven development](https://en.wikipedia.org/wiki/Test-driven_development)) som är en utvecklingsprocess som säger att man börjar skriva ett eller flera testfall och därefter skriver man koden för att lösa testfallen.

Vi kan förklara utvecklingsmodellen med följande steg.

1. Skriv ett testfall.
2. Exekvera testsuiten och se testfallet misslyckas.
3. Skriv koden.
4. Kör testerna (alla passerar).
5. Refactor, skriv om, organisera om, kodbasen efterhand som den växer.
6. Repetera.

I TDD pratar vi i termer om testfall och utvecklingen, koden vi skriver, drivs fram av de testfall vi lägger till och inte tvärtom. Det är alltså inte koden i sig som driver fram testfallen.

Som en bonus blir all vår kod testbar och troligen skriven för att vara högst testbar.

TDD får oss att skriva koden som löser testfallen, möjligen får det oss att fokusera på det som är viktigt i koden och möjligen ökar fokusen på att hålla kodmodulerna små.



### Behaviour driven utveckling {#bdd}

BDD är en vidareutveckling av TDD och står för Beteende-driven utveckling ([Wikipedia om Behavior-driven development](https://en.wikipedia.org/wiki/Behavior-driven_development))
BDD. En intressant del i BDD är att man diskuterar systemet i features som skrivs ned i ett textdokument. Dessa features dokumenteras på ett sätt så att både programmerare och systemets slutanvändare och ledning kan förstå dem. Det blir ett material där verksamhetens olika roller kan diskutera hur systemet skall fungera. Man får ett egen språk att samtala om systemet.

Dessa features, berättelser om hur systemet skall fungera, kan sedan automatgenerera testfall som kan köras av programmeraren. Dessa kan sedan styra utvecklingen och koden som skrivs för att lösa feature för feature. Jämför med TDD där testfallen driver utvecklingen. Här är det features, och dess testfall, som driver utvecklingen.

Så här kan en feature vara skriven, exemplet är taget från [`mosbth/cimage`](https://github.com/mosbth/cimage/tree/resize/features).

```text
Feature: src
    Display an image by selecting its source.

    Scenario: Source is not a valid image name
        Given Set src "NO_IMAGE"
        When Get headers for image
        Then Returns status code "404"

    Scenario: Get only source image
        Given Set src "test_100x100.png"
        When Get image
        Then Returns status code "200"
        And Compares to image "test_100x100.png"
```

I fallet ovan används programvaran [Behat](http://behat.org/) för att parsa featuren och generera testbar kod och för att exekvera alla testfall. Den som jobbar med testsuiten behöver skriva en del kod för att hanteringen kring `Given`, `When`, `Then` och `And` skall fungera. Du kan se det som att termerna motsvaras av metoder som exekverar själva testfallen.

BDD kan vara en bra utvecklingmetodik som driven utvecklingen via testbar kod och erbjuder ett språk som både programmerare och icke-programmerare kan prata.



### Funktionstester {#functiontest}

Låt oss benämna funktionstester ([Wikipedia om Functional testing](https://en.wikipedia.org/wiki/Functional_testing)) som testar en feature, en systemfunktion. Ta ett exempel att "registrera en ny användare". Ett sådant test innebär att man utför de steg som krävs för att registrera en användare. Det kan vara genom att använda ett grafiskt användargränssnitt (GUI), eller genom ett CLI-interface (Commandline interface) eller via ett API i koden eller ett publikt API via REST.

Funktionstester är i allmänhet _black-box tester_ ([Wikipedia om Black-box testing](https://en.wikipedia.org/wiki/Black-box_testing)) där man inte nödvändigtvis behöver ha koll på den underliggande koden. Man vill testa en systemfunktion och man bryr sig inte om vilka underliggande moduler som används.

Det kan finnas ett gränsområde där enhetstester övergår i funktionstester, gränsen går troligen någonstans där man slutar mocka och istället använder systemets riktiga moduler för att utföra en systemfunktion, med eller utan ett gränssnitt (GUI/CLI/API).

I webbsammanhang behöver man ofta utföra funktionstester i formen av en webbläsare, man vill simulera en webbläsare för att utföra hela åtgärden "registrera en ny användare". I sådana fall finns det programvara som hjälper testaren att simulera knapptryck och analysera webbsidan som kommer tillbaka som svar. Programvaran benämns ofta _headless browser_ ([Wikipedia om Headless browser](https://en.wikipedia.org/wiki/Headless_browser)) och det kan vara ett viktigt verktyg i testning.

Det är alltmer vanligt att en webbtjänst både erbjuder ett (REST) API och ett traditionellt webb-GUI. Det kan göra webbtjänsten enklare att testa då ett (REST) API ger en tydlig bild av vad man kan göra med systemet. Ett traditionellt webb-GUI är inte nödvändigtvis lika tydligt om vad man kan göra och vilket resultat man får tillbaka.



### Övriga tester {#ovriga}

Det finns många fler typer av tester som man kan vilja genomföra och kategorisera som egna typer av tester. Låt oss nämna några.

Integrationstester ([Wikipedia om Integration testing](https://en.wikipedia.org/wiki/Integration_testing)) fokuserar på att testa att flera moduler kan samverka på ett tänkt sätt. Man ser det som ett steg i en CI pipeline (Continuous integration) att alla moduler, eller en delmängd av dem, behöver integreras i något steg och då vill man verifiera med en testsuite att integrationen gick bra. Likt alla testfaser behöver man bestämma kriteria för vad som skall testas, hur det skall testas och vad som bestämmer att testerna går bra.

I systemtestfasen ([Wikipedia om System testing](https://en.wikipedia.org/wiki/System_testing)) utförs en serie av tester mot systemet som helhet. Alla moduler är på plats och systemet snurrar i en miljö som är relevant och motsvarar systemets verkliga driftsmiljö. Man kan utföra säkerhetstester, usabilitytester, prestandatester och stresstester eller tester av dokumentationen. Man tänker på systemet som helhet och testar de aspekter som är viktiga och relevanta. Systemtestet är en plats för att verifiera systemets icke-funktionella krav via icke-funktionella tester ([Wikipedia om Non-functional testing](https://en.wikipedia.org/wiki/Non-functional_testing)).

Ett annat test som kan vara av vikt är acceptanstester ([Wikipedia om Acceptance testing](https://en.wikipedia.org/wiki/Acceptance_testing)). Det är tester som utförs inför, tillsammans med, eller av kunden, när de tar emot leveransen. Där är ett viktigt dokument/fas som du och kunden gemensamt tagit fram som en del av beställningen och där testerna syftar till att verifiera att kunden verkligen fått leverans enligt beställning. Ur beställarens synpunkt kan acceptanstestet vara nästan lika viktigt som kravspecen då ett godkänt acceptanstest innebär att fakturan kan skickas och kunden har accepterat att systemet möter de kriteria som var viktigt.



Testverktyg för JavaScript {#toolsjs}
--------------------------------------------------------------------

Likt de flesta programmeringsspråk erbjuder även ekomiljön kring JavaScript ett större utbud av verktyg som kan användas för att bygga upp en testmiljö.

Om vi börjar "underifrån" med enhetstester så är de mer kända verktygen [Mocha](https://mochajs.org/), [Jasmine](https://jasmine.github.io/) och [Jest](http://facebook.github.io/jest/).

Det är inte en enkel sak att välja testverktyg, men om man börjar välja något så kan man ta det vidare därifrån och efterhand utvärdera vilket verktyg som lämpar sig för den egna organisationen.

På min kravlista finns att kodtäckning skall fungera för mina enhetstester. I JavaScript-världen finns främst [Istanbul](https://istanbul.js.org/) och [Blanket.js](http://blanketjs.org/) som ger oss denna möjlighet. Testverktyget jag väljer behöver alltså ha en känd koppling mot något av dessa verktyg.

När jag går från enhetstester till funktionstester så kan behovet av en headless browser komma upp. Här finns [Selenium](http://www.seleniumhq.org/) som en av de mer kända. Men alternativen är flera.

När jag väl bestämt mig för verktygen behövs en testrunner som kör mina tester och en hantering av testrapporten så den kan visas upp för programmerare och kanske även extern personal.

Allt som allt, någonstans här är namnen på några vanliga testverktyg inom JavaScript och jag tänker välja bland dessa.



Kodmoduler att testa {#kodmoduler}
--------------------------------------------------------------------

Innan jag väljer verktyg så behöver jag en kodbas som jag vill testa. För denna övnings skull så bygger jag en kortlek och ett [kortspel Black Jack](https://sv.wikipedia.org/wiki/Black_Jack). Det bör fungera för att visa hur testerna kan fungera med den testmiljö jag nu skall välja.

Mitt repo som jag delvis använder för att exemplifiera artikeln hittar du under repot [janaxs/blackjack](https://github.com/janaxs/blackjack).

Det finns också exempelprogram i kursrepot [ramverk2 under `example/test`](https://github.com/dbwebb-se/ramverk2/tree/master/example/test) som exemplifierar kommande stycken i artikeln.

Låt oss då titta på de olika tester som körs på systemet och vilka verktyg jag valde.



Enhetstestning i JavaScript {#unitjs}
--------------------------------------------------------------------

Det första testverktyget jag valde är för enhetstester. De verktygen jag valde mellan var främst [Mocha](https://mochajs.org/), [Yasmine](https://jasmine.github.io/) och [Jest](http://facebook.github.io/jest/). Mitt val föll på Mocha och jag gjorde ett testprogram i `example/test/unittest-mocha` för att se hur det fungerade.

```text
example/test/unittest-mocha$ tree .
.
├── package.json
├── src
│   └── card
│       └── card.js
└── test
    └── card
        ├── card.js
        └── cardParameterized.js
```

Min källkod finns i `src/card` och mina enhetstester ligger i `test/card`. De båda filerna under test-katalogen innehåller samma tester, men testfallen är olika implementerade. Börja att kika i filen `card.js` då den är tydligast i hur testfallen kan skrivas. När du tycker att det blir alltför mycket kod i testfallen så tittar du istället i `cardParameterized.js` för att se hur man kan skriva mindre kod för samma testfall.

Koden som testas är en klass `Card` som skall fungera som ett kort i en vanlig kortlek.

Innan vi kan köra testerna så behöver vi installera Mocha. Det går att installera med `npm install mocha --save-dev` eller bara `npm install` eftersom filen `package.json` redan innehåller en referens till Mocha. När installationen är klar kan du köra testfallen med `npm test` eftersom `package.json` redan är konfigurerad för att köra Mocha med enhetstesterna.

```text
npm install
npm test
```

Resultatet du ser är körningen av samtliga enhetstester. Men hur väl lyckas vi med kodtäckningen?



Kodtäckning vid enhetstestning {#covjs}
--------------------------------------------------------------------

När man kör enhetstester är man i princip beroende av ett verktyg som kan visa kodtäckningen för testfallen. Här väljer jag verktygen [Istanbul](https://istanbul.js.org/). I katalogen `example/test/unittest-mocha-istanbul` har jag utökat mitt exempel med att använda Istanbul tillsammans med Mocha.

För att kunna köra testerna med kodtäckning behöver du först installera kommandoradsklienten [`nyc`](https://github.com/istanbuljs/nyc) via `npm install nyc --save-dev` eller bara `npm install`. Sedan kan du köra testerna igen, nu med kodtäckning inkluderat.

```text
npm install
npm test
```

I filen `package.json` körs nu kommandot `nyc --reporter=html --reporter=text mocha 'test/**/*.js'` där `nyc` sköter kodtäckningen för alla testfall som `mocha` exekverar. Vi får en rapport i ren text och i katalogen `cover` genereras en HTML-rapport.

[FIGURE src=image/snapht17/mocha-nyc-codecoverage.png?w=w2 caption="Kodtäckningen är på 100% i vårt exempel."]

Med en HTML-rapport är det enkelt att klicka sig fram och se vilka delar av koden som täcks av testfallen. Kodtäckning är ett viktigt verktyg när man gör enhetstester.

Dessa verktyg skapar en del filer och kataloger, som vi inte är intresserade av att ha versionshanterad. Därför lägger vi till en ny `.gitignore` som gör att vi inte får kataloger genererad av testverktygen. Vi tar den officiella [Node.gitignore
](https://github.com/github/gitignore/blob/master/Node.gitignore) och kopierar in i vår `.gitignore`.



Docker mot olika versioner av Node {#docker}
--------------------------------------------------------------------

Ibland vill man välja vilken version av Node man använder för sina enhetstester. Det kan vara bra att kunna köra testerna mot godtycklig version av Node, eventuellt kombinerad med specifika versioner av andra programvaror. Här kan Docker hjälpa oss.



### Kör enhetstester mot olika versioner {#testversion}

I katalogen `example/test/unittest-docker` har jag förberett ett exempel som kör samma testfall som tidigare men man kan välja att köra dem mot en Docker kontainer som kör en specifik installation av Node.

Du kan köra testerna mot en specifik kontainer på något av följande sätt.

```text
docker-compose run node_alpine npm test
npm run docker-latest
```

Du kan sedan köra testerna mot en äldre version av Node på följande sätt.

```text
# Node version 8
docker-compose run node_8_alpine npm test
npm run docker-8

# Node version 6
docker-compose run node_6_alpine npm test
npm run docker-6
```

Nu har du alltså möjligheten att köra tester med samma kodbas mot flera versioner av Node. Det är kraftfullt och kan spara dig tid när du utvecklar och måste ha koll på att koden fungerar på olika versioner.



### Tjänsterna kontrolleras av docker-compose {#service}

Det är filen `docker-compose.yml` som styr vilka kontainrar som startas upp. I `package.json` ligger de kommandon som körs och `npm run` erbjuder därmed en kortare väg att starta upp testerna mot olika versioner av Node.

Så här ser `docker-compose.yml` ut för ett par av de tjänster som definieras.

```text
version: "3"
services:
    node_alpine:
        build:
            context: .
            dockerfile: docker/Dockerfile-node-alpine
        volumes:
            - ./:/app/
            - /app/node_modules/

    node_8_alpine:
        build:
            context: .
            dockerfile: docker/Dockerfile-node-8-alpine
        volumes:
            - ./:/app/
            - /app/node_modules/
```

Filen `docker-compose.yml` hänvisar till de Docker-filer som används för att bygga respektive image.

När docker-compose använder en image för att starta upp en kontainer så kan den montera volymer och på så sätt länka kontainern till det lokala filsystemet.

Följande rader monterar hela katalogen in i kontainern, men den använder katalogen `app/node_modules/` som finns i imagen, även om det finns en lokal katalog som heter `node_modules`.

```text
volumes:
    - ./:/app/
    - /app/node_modules/
```

På så vis kan du både ha en lokal installation av alla dina node moduler och det kan finnas en specifik installation i respektive image.



### Docker-filer ger images {#dockerfile}

Grunden till varje image är en Dockerfile som i exemplet ligger i katalogen `docker/`. De ger basen för imagens innehåll. När en image byggs, i samband med att den refereras av docker-compose, så byggs den i ett context av katalogen vi står i.

```text
build:
    context: .
    dockerfile: docker/Dockerfile-node-alpine
```

En Dockerfile kan se ut så här, exemplet är från `docker/Dockerfile-node-alpine`.

```text
# Use a base image
FROM node:alpine

# Create a workdir
RUN mkdir -p /app
WORKDIR /app

# Install npm packages
COPY package.json /app
RUN npm install
```

De sista raderna kopierar filen `package.json` från byggets context, in i imagen och därefter körs `npm install` som blir image-specifik och installeras i `/app/node_modules`.

Om du gör ändringar i en image-fil kan det kräva att du bygger om den, till exempel via `docker-compose build node_alpine`.

```text
# Bygg om en image om du gjort ändringar i dess Dockerfile
docker-compose build node_alpine
```



### Inspektera en image {#inspectdocker}

Du kan starta en terminal (bash, sh) mot en kontainer för att inspektera den och se vad den innehåller.

```text
$ docker-compose run node_alpine sh
/app # pwd
/app
/app # ls
coverage            docker              docker-compose.yml
node_modules        package.json        src
test
```

De images som slutar på `alpine` innehåller bara `sh` medans du kan använda `bash` i de andra som bygger på debian.



### Varför alpine versus debian? {#alpine}

Alpine är en minimal [bas-image alpine](https://store.docker.com/images/alpine) vars storlek är väldigt liten jämfört med en image baserad på debian eller ubuntu.

Här kan du se storleken på de images som bygger på alpine och de andra som bygger på debian.

```text
$ docker image ls
REPOSITORY                     TAG         SIZE
unittestdocker_node_latest     latest      690MB
unittestdocker_node_8          latest      695MB
unittestdocker_node_6          latest      682MB
unittestdocker_node_alpine     latest      83.4MB
unittestdocker_node_8_alpine   latest      86.5MB
unittestdocker_node_6_alpine   latest      74.2MB
```

Som du ser så finns det utrymma att spara med hjälp av alpine-images.



### Dubbelkolla vilken version som körs {#nodeversion}

Om du vill dubbelkolla vilken version av Node som körs i en kontainer, bara för att vara säker, så kan du starta upp en interaktiv session och kontrollera versionerna.

```text
$ docker-compose run node_alpine node
> process.version
'v8.8.1'
> process.versions
{ http_parser: '2.7.0',
  node: '8.8.1',
  v8: '6.1.534.42',
  uv: '1.15.0',
  zlib: '1.2.11',
  ares: '1.10.1-DEV',
  modules: '57',
  nghttp2: '1.25.0',
  openssl: '1.0.2l',
  icu: '59.1',
  unicode: '9.0',
  cldr: '31.0.1',
  tz: '2017b' }
```



Valideringsverktyg {#validering}
--------------------------------------------------------------------

Vi är ju inne på tester, men låt oss ta ett litet sidospår och säkerställa att vi även har validering av koden vi skriver, vi vill ha validering av kodstil och en linter. Det finns ett förberett exempel under `example/test/validate`.

Eftersom vi utgår från kodstilen som definieras i [`javascript-style-guide`](https://www.npmjs.com/package/javascript-style-guide) så hämtar vi hem den och använder dess konfigurationsfil.

```text
npm install javascript-style-guide --save-dev
cp node_modules/javascript-style-guide/.eslint* .
```

Vi behöver installera validatorn som löser både kodstil och linter.

```text
npm install eslint eslint-plugin-react --save-dev
```

Verktyget har flera plugins som kan vara relevanta att lägga till, lite beroende på vilken typ av kod (REACT, `.jsx`, `.pug`, etc) du utvecklar. Jag väljer att lägga till en plugin för REACT, även om den inte används i exemplet. Det finns en referens i konfigurationsfilen som vi lånat, som behöver pluginen.

Nu kan vi köra validatorn och eftersom den redan finns definierade i `package.json` så köra via npm.

```text
npm run eslint
```

Vill du köra validatorn som en del av din `npm test` så kan du lägga till följande i din `package.json`.

```json
"scripts": {
    "posttest": "npm run eslint"
}
```

När enhetstester körs så genereras kodtäckningen till katalogen `build/`. Det är för att undvika att skräpa ned i katalogen och samla bygg-relaterade filer i en katalog som är enkel att ta bort vid behov. Du kan se detaljer för hur `nyc` konfigureras i dess konfigfil `.nycrc`.



Continuous integration (CI) {#cichain}
--------------------------------------------------------------------

Nu när vi har en `package.json` på plats kan vi fortsätta och sätta igång en CI-kedja för att automatisera våra tester.

Det som sammanhåller alla tester är nu sekvensen `npm install test` som installerar det som behövs via `package.json` och sen kör testerna.

```text
npm install   # Installerar allt som finns i package.json
npm test      # Exekvera validatorer och testfall
```

Då bygger vi en CI kedja. Det finns exempelkod i kursrepot under `example/test/ci` och jag använder ett repo [janaxs/blackjack](https://github.com/janaxs/blackjack) för att demonstrera hur det ser ut.



### Byggverktyg Travis och CircleCI {#buildtools}

Först tar vi ett byggsystem, eller två. Jag väljer [Travis](https://travis-ci.org/janaxs/blackjack) och [CircleCI](https://circleci.com/gh/janaxs/blackjack). Syftet med byggsystemet är att checka ut din kod och köra dina tester varje gång du checkar in en ny version av din kod.

Jag lägger till mitt repo till Travis och CircleCI.

I katalogen `example/test/ci` ligger en konfigurationsfil `.travis.yml` och en `.circleci/config.yml` som är exempel på konfigurationsfiler för Travis respektive CircleCI (v2). Om du kikar i filerna ser du referenser till `npm install` och `npm test`.



### Kodtäckning med Coveralls och Codecov {#codecov}

Byggsystemen kör testerna och kan sedan rapportera kodtäckningen till två system som är specialiserade på kodtäckning. I detta fallet använder jag [Coveralls](https://coveralls.io/github/janaxs/blackjack) och [Codecov](https://codecov.io/gh/janaxs/blackjack).

Jag lägger till mitt repo till Coveralls och Codecov.

Sedan behöver jag skicka en rapport från byggsystemets senaste tester. Det gör jag med skript i `package.json` på följande sätt.

```json
"scripts": {
  "report-coveralls": "nyc report --reporter=text-lcov | coveralls",
  "report-codecov": "nyc report --reporter=lcov > coverage.lcov && codecov"
},
```

Det som behövs för att detta skall fungera är att paketen `coveralls` och `codecov` installeras. Det är specifika paket som enbart är till för att rapportera kodtäckningen.

```text
npm install coveralls codecov --save-dev
```

Vid nästa bygge kommer ny kodtäckningen skickas upp till respektive system, förutsatt att kommandona körs. Jag har valt att köra dem från Travis och du kan se hur de körs i konfigurationsfilen `.travis.yml`.

```text
after_success:
    - npm run report-coveralls
    - npm run report-codecov
```

Om du vill friska upp minnet om ovan- och nedanstående testverktyg förklarar Mikael hur man integrerar de olika testverktygen med github repot i artikeln [Integrera din packagist modul med verktyg för automatisk test och validering](kunskap/integrera-din-packagist-modul-med-verktyg-for-automatisk-test-och-validering).



### Kodkvalitet med Codeclimate och Codacy {#codequal}

Till slut integrerar jag även med två verktyg som har fokus på kodkvalitet. Det är [Codeclimate](https://codeclimate.com/github/janaxs/blackjack) och [Codacy](https://www.codacy.com/app/mosbth/blackjack/dashboard).

Jag lägger till mitt repo till Codeclimate och Codacy.

De båda verktygen har olika sätt att visualisera hur de upplever min kodkvalitet. Verktygen kan också visa kodtäckning om jag väljer att bifoga en sådan rapport.

Delvis kan alltså dessa båda verktyg ersätta de två verktyg vi såg som enbart hade fokus på kodtäckning. Vilka verktyg man i slutändan använder får bli en sak att utvärdera.

I detta läget behöver jag inte göra mer, de båda verktygen checkar automatiskt ut min kod när den uppdateras.



### Kodkvalitet och kodtäckning med Scrutinizer {#scruti}

Avslutningsvis integrerar jag mitt repo mot [Scrutinizer](https://scrutinizer-ci.com/g/janaxs/blackjack/) som är ett verktyg för kodkvalitet och kodtäckning. Verktyget kan exekvera mina tester, visa kodtäckning och analysera min kod ur olika aspekter.



### CI kedja klar {#ciklar}

Då var vår CI kedja klar med flera alternativ för byggsystem, kodtäckning och kodkvalitet.

Du kan ta en närmare titt på mitt demo repo [janaxs/blackjack](https://github.com/janaxs/blackjack) om du vill se valideringsverktyg, enhetstester och ci-kedjan i ett sammanhang i ett repo med nödvändiga konfigurationsfiler.



Avslutningvis {#avslutning}
--------------------------------------------------------------------

Vi har gått igenom testning och hur man kan bygga upp grunden till en testmiljö med verktyg för enhtstestning, kodtäckning, Docker och valideringsverktyg samt byggt samman alla delar i en CI-kedja med externa verktyg för kodkvalitet.

Det finns en [forumtråd kopplad till denna artikeln](t/7007). Där kan du ställa frågor eller bidra med tips och trix.
