---
author:
    - mos
    - efo
category:
    - labbmiljo
    - kursen ramverk2
    - mongodb
revision:
    "2019-02-06": (C, efo) Uppdaterad med del om driftsättning.
    "2017-12-07": (B, mos) Docker-compose uppgradering MongoDB 3.6.
    "2017-11-21": (A, mos) Första utgåvan.
...
Kom igång med MongoDB i Nodejs
==================================

[FIGURE src=image/snapht17/mongodb-logo.jpg?w=c5 class="right"]

Vi tar databasen MongoDB och ser hur vi kan integrera den i ett Nodejs projekt. Det tar det som en introduktion till databaser som inte kategoriseras som relationsdatabaser och saknar frågespråket SQL. De databastyperna går under samlingsbeteckningen NoSQL.

<!--more-->



Förkunskaper {#forkunskaper}
--------------------------------------------------------------------

Du kan din Node och du kan använda Docker tillsammans med Node.



Om MongoDB {#mongodb}
--------------------------------------------------------------------

På [webbplatsen för MongoDB](https://www.mongodb.com/) får vi en översikt av de produkter som är relaterade till databasen MongoDB.

Vi kan se på MongoDB som en dokumentorienterad databas som sparar informationen i JSON-strukturer. En JSON-struktur går enkelt att översätta in i det programmeringsspråk man jobbar med, det behövs ingen översättning så man kan direkt jobba med datat och sparar det.

Du använder ett API mot databasen som består av metoder för att skapa, söka, redigera och radera informationen.

För att komma igpng behöver du installera en server för MongoDB och en klient (driver) till ditt programmeringsspråk. Det kan också vara behändigt med en terminalklient som du kan koppla upp dig mot databasen med.

Låt oss gå igenom de steg som krävs för att komma igång med MongDB tillsammans med Node.



Installera databasen MongoDB {#installmongodb}
--------------------------------------------------------------------

Vi kan installera databasen på vårt eget system som man normalt gör. Men jag tänkte använda Docker och den [officiella imagen mongo](https://store.docker.com/images/mongo).

Så här blir min `docker-compose.yml` för att starta upp servern. Du hittar den i kursrepot i katalogen `example/db/mongodb`.

```text
version: '3'
services:
    mongodb:
        image: mongo
        environment:
            - MONGO_DATA_DIR=/data/db
        volumes:
            - ./data/db:/data/db
        ports:
            - 27017:27017
        command: mongod --bind_ip_all
```

Lokalt i min katalog har jag `data/db` som kommer att innehålla själva databasen, katalogen skapas om jag inte har den. Porten 27017 är standardporten för MongoDB.

Nu kan du starta kontainern.

```text
docker-compose up mongodb
```

Utskrifterna som kommer från kontainern visar du om allt går bra.

Då behöver vi en klient.



Klient till MongoDB {#klientinstall}
--------------------------------------------------------------------

Klienten heter `mongo` och finns redan installerad i kontainern. Vi kan använda den för att koppla upp oss mot servern. För att göra det så använder vi kontainerns service namn som är `mongodb` enligt `docker-compose.yml`.

Vi kör alltså klienten inuti kontainern och koppar oss till servern som ligger i kontainern som har service namnet `mongodb`. Kommandot blir `mongo mongdb://[service name]`.

```text
$ docker-compose run mongodb mongo mongodb://mongodb/
MongoDB shell version v3.4.10
connecting to: mongodb://mongodb/
Welcome to the MongoDB shell.
>
```

Det blev många _mongo_ på den raden. Se till att du har koll på vad som är applikationen, service namnet och protokolldelen (`mongodb://`).


Om vi har installerat klienten lokalt så kan vi koppla upp oss direkt mot servern då kontainern lyssnar på standardporten som är mappad till vår localhost.

```text
$ mongo
MongoDB shell version: 3.2.17
connecting to: test
>
```

Vi kan alltså installera klienten via vår pakethanterare till vår lokala dator. Det skadar inte att ha en sådan installation tillhanda. Konsultera [manualen](https://docs.mongodb.com/manual/administration/install-community/) för instruktioner om hur du installerar på ditt system.

Använd den inbyggda hjälpen via `mongo --help` eller läs i [referensmanualen för kommandot mongo](https://docs.mongodb.com/manual/reference/program/mongo/).

När du väl har startat en koppling så man du skriva `help` för att se vilka möjligheter som finns.

```text
> help
    db.help()                    help on db methods
    db.mycoll.help()             help on collection methods
    sh.help()                    sharding helpers
    rs.help()                    replica set helpers
    help admin                   administrative help
    help connect                 connecting to a db help
    help keys                    key shortcuts
    help misc                    misc things to know
    help mr                      mapreduce

    show dbs                     show database names
    show collections             show collections in current database
    show users                   show users in current database
    show profile                 show most recent system.profile entries with time >= 1ms
    show logs                    show the accessible logger names
    show log [name]              prints out the last segment of log in memory, 'global' is default
    use <db_name>                set current database
    db.foo.find()                list objects in collection foo
    db.foo.find( { a : 1 } )     list objects in foo where a == 1
    it                           result of the last line evaluated; use to further iterate
    DBQuery.shellBatchSize = x   set default number of items to display on shell
    exit                         quit the mongo shell
```

Du som är van vid liknande klienter till andra databaser kan känna igen dig bland de kommandon som erbjuds.

Det finns en manual som hjälper dig igång med [grunderna och baskommandona](https://docs.mongodb.com/manual/mongo/).



Skapa en databas med innehåll {#createdb}
--------------------------------------------------------------------

Vi prövar att använda klienten för att skapa en databas och lägga in ett dokument i en collection.

Först skapar vi databasen.

```text
> use mumin
> show collections
```

Den är tom och innehåller inga collections ännu. Vi skapar en collection genom att lägga ett dokument i den.

```text
> db.crowd.insertOne( { name: "Mumintrollet" } )
{
        "acknowledged" : true,
        "insertedId" : ObjectId("5a13069000b2ff0b912aeeb6")
}
> show collections
crowd
```

Om jag fyller på ytterligare några dokument så kan det se ut så här när vi frågar efter innehållet i en collection.

```text
> db.crowd.find()
{ "_id" : ObjectId("5a13069000b2ff0b912aeeb6"), "name" : "Mumintrollet" }
{ "_id" : ObjectId("5a13079100b2ff0b912aeeb7"), "name" : "Sniff" }
{ "_id" : ObjectId("5a13079b00b2ff0b912aeeb8"), "name" : "Snusmumriken" }
{ "_id" : ObjectId("5a1307a900b2ff0b912aeeb9"), "name" : "Snorkfröken" }
```

Vi kan uppdatera samtliga dokument/objekt i vår collection.

```text
> db.crowd.updateMany({}, {$set: { bor: "Mumindalen" }})
{ "acknowledged" : true, "matchedCount" : 4, "modifiedCount" : 4 }
> db.crowd.find().pretty()
{
        "_id" : ObjectId("5a13069000b2ff0b912aeeb6"),
        "name" : "Mumintrollet",
        "bor" : "Mumindalen"
}
{
        "_id" : ObjectId("5a13079100b2ff0b912aeeb7"),
        "name" : "Sniff",
        "bor" : "Mumindalen"
}
{
        "_id" : ObjectId("5a13079b00b2ff0b912aeeb8"),
        "name" : "Snusmumriken",
        "bor" : "Mumindalen"
}
{
        "_id" : ObjectId("5a1307a900b2ff0b912aeeb9"),
        "name" : "Snorkfröken",
        "bor" : "Mumindalen"
}
>
```

Det finns alltså ett antal vanliga CRUD-operationer vi kan göra för att jobba med datat i databasen. Du kan läsa mer om dessa [CRUD-operationer i manualen](https://docs.mongodb.com/manual/crud/).

Låt oss gå vidare och skapa ett program som använder vår nyskapade databas.



Node till MongoDB {#node2mongodb}
--------------------------------------------------------------------

Först installerar vi npm-paketet `mongodb` som är en Node driver till databasen MongoDB. Det finns redan i `package.json` så följande kommandon fungerar.

```text
npm install
npm install mongodb --save
```

Vi kan läsa om [MongoBD Node.JS Driver i dokumentationen](https://mongodb.github.io/node-mongodb-native/). Där finner vi också dokumentationen för API:et och dess metoder.



### Setup med grundata {#setup}

I filen `src/setup.js` finns kod som kopplar upp sig mot MongoDB och skapar databasen mumin, rensar den från innehåll och lägger in en del av befolkningen från mumindalen i en collection `crowd` genom att hämta data från filen `src/setup.json`.

Du kan pröva köra programmet och därefter koppla dig med klienten mongo för att se att datan ligger på plats.

```text
$ node src/setup.js
$ docker-compose run mongodb mongo mongodb://mongodb/mumin --eval "db.crowd.find().pretty()"
MongoDB shell version v3.4.10
connecting to: mongodb://mongodb/mumin
MongoDB server version: 3.4.10
{
        "_id" : ObjectId("5a134ec3c28e762f068f48f1"),
        "name" : "Mumintrollet",
        "bor" : "Mumindalen"
}
{
        "_id" : ObjectId("5a134ec3c28e762f068f48f2"),
        "name" : "Sniff",
        "bor" : "Mumindalen"
}
{
        "_id" : ObjectId("5a134ec3c28e762f068f48f3"),
        "name" : "Snusmumriken",
        "bor" : "Mumindalen"
}
{
        "_id" : ObjectId("5a134ec3c28e762f068f48f4"),
        "name" : "Snorkfröken",
        "bor" : "Mumindalen"
}
```



### Söka information från databasen {#search}

I filen `src/search.js` finns kod som kopplar upp sig mot MongoDB och söker i databasen. Kodexemplet visar på ett par alternativa sätt att jobba med MongoDB avseende den asynkrona biten. Det API som erbjuds bygger på att man kan välja callbacks eller Promise för att hantera det asynkrona flödet.

Låt oss titta på koden.

Först har vi en funktion som kopplar sig mot databasen och en colletion samt utför själva find-operationen.

```javascript
/**
 * Find documents in an collection by matching search criteria.
 *
 * @async
 *
 * @param {string} dsn        DSN to connect to database.
 * @param {string} colName    Name of collection.
 * @param {object} criteria   Search criteria.
 * @param {object} projection What to project in results.
 * @param {number} limit      Limit the number of documents to retrieve.
 *
 * @throws Error when database operation fails.
 *
 * @return {Promise<array>} The resultset as an array.
 */
async function findInCollection(dsn, colName, criteria, projection, limit) {
    const client  = await mongo.connect(dsn);
    const db = await client.db();
    const col = await db.collection(colName);
    const res = await col.find(criteria, projection).limit(limit).toArray();

    await client.close();

    return res;
}
```

Funktionen använder konstruktionen async/await för att serialisera flödet mot databasen. Varje metod som jobbar mot databasen, i exemplet ovan, är asynkron och har alternativet att använda callbacks, eller Promise. I koden ovan bygger vi på att ett Promise returneras när respektive metod är avklarad.

En vanlig frågeställning i en async funktion är om await behövs eller inte. För att besvara det behöver man delvis veta om metoden/funktionen returnerar ett Promise eller ej. Här vänder vi oss till API-manualen för respektive metod. Man kommer inte framåt utan att bli bekant med det API man jobbar med. En vanlig fråga är till exempel vad som returneras inom ett Promise, vilka argument man har tillgång till. API manualen ger svaret.

Låt oss titta på hur vi kan använda funktionen ovan. Jag kan visa två alternativ och vi börjar med async/await.

Jag lägger premisserna för sökningen i variabler, för tydlighetens skull.

```javascript
// Find documents where namn starts with string
const criteria2 = {
    namn: /^Sn/
};
const projection2 = {
    _id: 1,
    namn: 1
};
const limit2 = 3;
```

Sedan wrappar jag koden i en _Immediately Invoked Async Arrow Function_ för att kunna använda await inom funktionen.

```javascript
// Do it within an Immediately Invoked Async Arrow Function.
// This is to enable usage of await within the function scope.
(async () => {
    // Find using await
    try {
        let res = await findInCollection(
            dsn, "crowd", criteria2, projection2, limit2
        );
        console.log(res);
    } catch(err) {
        console.log(err);
    }
})();
```

Jag lägger koden inom en traditionell try/catch för att hantera eventuella fel som uppkommer. Jag använder await på `findInCollection()` och lägger svaret i en variabel. På det sättet löser jag serialiseringen.

Vi tittar på en annan variant.

```javascript
(() => {
    // Find using .then()
    findInCollection(dsn, "crowd", criteria1, projection1, limit1)
    .then(res => console.log(res))
    .catch(err => console.log(err));
})();
```

Här finns inget krav på att använda async, ej heller att wrappa koden inom ett funktionsscope. Serialiseringen sköts av `.then()` och felhanteringen i `.catch()`.

Vi hade också kunnat tänka oss en variant av `findInCollection()` som jobbar med callbacks. Funkionen hade isåfall tagit ytterligare ett argument `callback` som hade anropats när funktionen var klar.



### Vilken asynkron programmeringsteknik är bäst? {#bast}

Att koda i Node.js innebär asynkron programmering. Det finns olika alternativ till att serialisera flödet där det behövs, eller att göra det mer öppet för parallell exekvering. Asynkron programmering kan kräva lite tid att anpassa sig till, om man är ovan. Man behöver få en känsla för var som är synkront och vad som är asynkront. Man vill få en känsla för hur man kan debugga flödet i en asynkron applikation.

De konstruktioner vi har tittat på är kopplade till olika delar av standarden för JavaScript, det innebär att det kan finnas restriktioner för vilket stöd de har, beroende på den miljö man jobbar i.

Mitt bästa tips är att ge den asynkrona programmeringsmodellen tid att sätta sig och skriv om din kod tills den blir läsbar och har ett tydligt flöde.



Asynkrona enhetstester {#enhetstest}
--------------------------------------------------------------------

När man tänker asynkrona enhetstester så är det inget större bekymmer. Tittar vi på Mocha så ser vi att [deras asynkrona enhetester](https://mochajs.org/#asynchronous-code) fungerar med både callbacks, Promise och async/await.



Express till MongoDB {#express}
--------------------------------------------------------------------

Hur kan det se ut om vi kopplar in databasen MongoDB mot en instans av Express? Låt oss titta på ett exempel i `src/server.js` som exponerar en route `/list` som visar allt innehåll i en collection i databasen.

Vi kan starta upp server och testa att accessa routen.

```javascript
$ npm start
Server is listening on 1337
```

Via en webbläsare eller curl kan vi nu komma åt routen och med kommadnot jq får vi en renare utskift.

```text
$ curl -s http://localhost:1337/list | jq
[
  {
    "_id": "5a13efb54dbe18550bce601b",
    "namn": "Mumintrollet",
    "bor": "Mumindalen"
  },
  {
    "_id": "5a13efb54dbe18550bce601c",
    "namn": "Sniff",
    "bor": "Mumindalen"
  },
  {
    "_id": "5a13efb54dbe18550bce601d",
    "namn": "Snusmumriken",
    "bor": "Mumindalen"
  },
  {
    "_id": "5a13efb54dbe18550bce601e",
    "namn": "Snorkfröken",
    "bor": "Mumindalen"
  }
]
```

Som vi kunde ana var det inget större bekymmer att flytta in vår kod i en route i express som stödjer async funktioner som callbacks till en route.



Docker till Docker kommunikation {#dockr2dockr}
--------------------------------------------------------------------

Kan vi då köra en kontainer med Express och en kontainer med MongoDB och låta kontainern för Express komma åt databasen i kontainern som kör MongoDB? Vi vill alltså köra hela vår applikation i en svärm av Docker-kontainers.

Vi har sedan tidigare sett hur kontainern för MongoDB ser ut. Nu lägger vi till en kontainer för Express i vår `docker-compose.yml` och låter dem samverka.

Till vår kontainer för Express bygger vi en egen image baserad på en Dockerfile `Dockerfile` som du ser i exempelkatalogen.

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

Vi använder en alpine-image för att spara utrymme på disk. Alla npm-moduler installeras i imagen, inklusive paketen express och mongodb.

I `docker-compose.yml` definierar vi tjänsten för `express`.

```text
version: '3'
services:
    express:
        build:
            context: .
            dockerfile: Dockerfile
        volumes:
            - ./:/app/
            - /app/node_modules/
        ports:
            - 1337:1337
        command: "node src/server.js"
```

Om vi startar upp kontainern enligt ovan så kan vi nå tjänsten med curl.

```text
$ docker-compose up express
```

```text
$ curl http://localhost:1337
Hello World
```

Om vi startar upp kontainern för mongodb så vet vi sedan tidigare att den går att nå utifrån.

```text
$ docker-compose up mongodb
```

```text
docker-compose run mongodb mongo mongodb://mongodb/mumin --eval "db.crowd.find().pretty()"
```

Då har vi två kontainer och båda svarar var för sig. Så långt är allt väl.

Om vi försöker nå routen `/list` så innebär det att express-applikationen försöker koppla sig till databasen med den hårdkodade DSN som vi valt. I exemplet var det `mongodb://localhost:27017/mumin`. Nu lär det inte fungera längre eftersom MongoDB inte snurrar på localhost, utifrån express-kontainerns perspektiv.

Det kan se ut så här.

```javascript
$ curl -s http://localhost:1337/list | jq
{
  "name": "MongoError",
  "message": "failed to connect to server [localhost:27017] on first connect [MongoError: connect ECONNREFUSED 127.0.0.1:27017]"
}
```

Nåväl, vi hade förberett oss och kan använda environmentvariabler för att berätta vilken DSN som skall användas.

```javascript
const dsn =  process.env.DBWEBB_DSN || "mongodb://localhost:27017/mumin";
```

En mindre uppdatering till express-kontainern ger följande.

```text
express:
    environment:
        - DBWEBB_DSN=mongodb://mongodb:27017/mumin
    links:
        - mongodb
```

Märk att `//mongodb` är namnet på den kontainer som kör MongoDB. Docker har ett eget nätverk där tjänsternas namn identifierar dem och gör det enkelt att koppla ihop kommunikationen mellan flera kontainrar.

Den andra delen med `links` är inte nödvändig för att kommunikation skall ske. Men den uttrycker ett beroende mellan kontainrar och bestämmer ordningen för uppstart av kontainera. I detta fallet kommer tjänsten `mongodb` att starta upp innan tjänsten `express`.

Om vi nu försöker nå routen `/list` igen så bör vi få ett lyckat resultat.

```text
$ curl -s http://localhost:1337/list | jq .[0]
{
  "_id": "5a13efb54dbe18550bce601b",
  "namn": "Mumintrollet",
  "bor": "Mumindalen"
}
```

[Kommandot jq](https://stedolan.github.io/jq/manual/) hjälpte oss att bara visa första elementet i arrayen.

Som referens kan vi så se den slutliga filen `docker-compose.yml`.

```text
version: '3'
services:
    express:
        build:
            context: .
            dockerfile: Dockerfile
        environment:
            - DBWEBB_DSN=mongodb://mongodb:27017/mumin
        volumes:
            - ./:/app/
            - /app/node_modules/
        ports:
            - 1337:1337
        links:
            - mongodb
        command: "node src/server.js"

    mongodb:
        image: mongo
        environment:
            - MONGO_DATA_DIR=/data/db
        volumes:
            - ./data/db:/data/db
        ports:
            - 27017:27017
        command: mongod
```

Det får avsluta ett gott dagsverke.

Så här kan det se ut när du kör igenom allt i en terminal.

[FIGURE src=image/snapht17/kmom05-summary.png?w=w3 caption="Databasen MongoDB tillsammans med klient, express och samlad i Docker."]

I följande asciinema kan du se flödet hur man jobbar med Docker i olika kontainerar för Express och MongoDB och hur man på olika sätt kan koppla sig mot dem.

[ASCIINEMA src=149154 caption="Ett flöde hur man kan jobba i terminalen i kmom05."]



Driftsättning på servern {#driftsatta}
--------------------------------------------------------------------

Vi använder Docker främst för att testa och snabbt få möjlighet för att jobba med olika services och databaser. På servern vill vi dock köra MongoDB som en databas på riktigt utanför Docker.

Vi börjar med att installera `dirmngr`, för att kunna ta hand gpg nycklar, med kommandot `sudo apt-get install dirmngr`. Vi följer sedan de rekommenderade [installationsinstruktionerna hos MongoDB](https://docs.mongodb.com/manual/tutorial/install-mongodb-on-debian/#using-deb-packages-recommended).

Vi startar mongodb servicen med kommandot `sudo service mongod start` och kollar sedan i log filen att allt har gått bra, vi använder kommandot nedan.

```bash
sudo cat /var/log/mongodb/mongod.log | grep 27017
```

I utskriften ser vi (förhoppningsvis) längst ner: `I NETWORK  [initandlisten] waiting for connections on port 27017`.

Nu kan vi köra kommandot `mongo` och använda mongodb databasen och mongodb skalet precis som tidigare, när mongodb låg i Docker. Ett fungerande driftsatt exempel finns på följande sida [https://mongodb.jsramverk.me/](https://mongodb.jsramverk.me/).



Avslutningvis {#avslutning}
--------------------------------------------------------------------

Vi har gått igenom grunderna i den dokumentorienterade databasen MongoDB, hur man startar upp en server i Docker, hur man jobbar med terminalklienten och API:et fungerar för MongoDB Node.js driver.

Det blev en orientering i asynkron programmering i Node.js och avslutningsvis såg vi hur Docker-kontainrar kan samverka och kommunicera sinsemellan.

Det finns en [forumtråd kopplad till denna artikeln](t/7074). Där kan du ställa frågor eller bidra med tips och trix.
