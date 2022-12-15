---
author: mos
category:
    - nodejs
    - javascript
    - express
    - kursen dbjs
    - kursen databas
revision:
    "2018-01-15": (A, mos) Första utgåvan.
...
CRUD i Express/MySQL med sessioner, felhantering och användarvänlighet
==================================

[FIGURE src=image/snapvt18/bank-header-footer.png?w=c5&a=0,30,20,0&cf class="right"]

Vi skall jobba igenom begreppet CRUD, Create, Read, Update, Delete, via ett webbgränssnitt baserat på Express och kopplat mot databasen MySQL.

Vi skall använda oss av lagrade procedurer i databasen för att skapa ett API mot databasen som alla frågor från klienterna går via. Det ger oss ett exempel på hur vi kan kapsla in SQL-koden och förenkla för klienterna.

<!--more-->


ladda tabell/sp från sql/user/ddl.sql

login
middleware

flash & felhantering & usability i egen artikel?

$ npm install express-session

const parseurl = require("parseurl")
const session  = require("express-session")




Förutsättning {#pre}
--------------------------------------

Du har jobbat igenom artikeln "[Koppla appservern Express till databasen MySQL](kunskap/koppla-appservern-express-till-databasen-mysql)" och har tillgång til kod du kan utgå ifrån.

Du har jobbat igenom artikelserien som visar hur du programmerar i en databas via "[Lagrade procedurer i databas](kunskap/lagrade-procedurer-i-databas)", "[Triggers i databas](kunskap/triggers-i-databas)" och "[Egendefinierade funktioner i databas](kunskap/egen-definierade-funktioner-i-databas)". Du har tillgång till den databas som används i artikelserien.

De exempelprogram som används i artikeln finns i ditt kursrepo (dbjs, databas) under `example/express-crud` (det färdiga exemplet) och `example/express-mysql` (koden jag startar med).



Utgå från tidigare exempel {#utga}
--------------------------------------

Du kan kopiera exempelkoden i `example/express-mysql` och utgå från den. Jag använder den för att bygga vidare och lägga dit kod som gör att vi kan koppla oss till databasen.

När du kopierat koden behöver du installera modulerna med `npm install`.

Pröva sedan att starta servern och använda webbläsaren för att koppla dig till servern.

Vi har främst routen `bank/index` och routen `bank/balance` att utgå ifrån.



R i CRUD, Read {#read}
---------------------------------------

Den första delen handlar om att läsa information från databasen och presentera den. Det har vi egentligen redan gjort i routen `bank/balance` som gör en `SELECT *` från tabellen.

Men jag vill använda konceptet _programmera i databasen_ och tänker därför skriva om SELECT-satsen till en lagrad procedur.

Låt vara att jag inte vinner något speciellt på det, mer än själva övningen att se hur jag från klienten anropar en lagrad procedur i sin enklaste form.

Först skapar jag min lagrade procedur som visar balansen för alla konton. Du kan se all SQL-kod i filen `example/express-crud/sql/bank/ddl_procedure.sql`.

```sql
--
-- Create procedure for select * from account
--
DROP PROCEDURE IF EXISTS showBalance;
DELIMITER //
CREATE PROCEDURE showBalance()
BEGIN
    SELECT * FROM account;
END
//
DELIMITER ;
```

Jag kan anropa den via MySQL terminalklienten.

```sql
mysql> CALL showBalance();
+------+------+---------+
| id   | name | balance |
+------+------+---------+
| 1111 | Adam |   10.00 |
| 2222 | Eva  |    7.00 |
+------+------+---------+
2 rows in set (0.00 sec)

Query OK, 0 rows affected (0.00 sec)
```

Nu går jag in i min route och uppdaterar koden så att den lagrade proceduren används. 

Tidigare såg min kod ut så här.

```javascript
/**
 * Show all entries in the account table.
 *
 * @async
 * @returns {RowDataPacket} Resultset from the query.
 */
async function showBalance() {
    return findAllInTable("account");
}
```

Nu envisas jag med att uppdatera den till följande, så att den lagrade proceduren används istället.

```javascript
/**
 * Show all entries in the account table.
 *
 * @async
 * @returns {RowDataPacket} Resultset from the query.
 */
async function showBalance() {
    let sql = `CALL showBalance();`;
    let res;

    res = await db.query(sql);
    console.info(`SQL: ${sql} got ${res.length} rows.`);

    return res[0];
}
```

Det resultset som returneras från en lagrad procedur skiljer sig aningen från tidigare. En lagrad procedur kan nämlingen returnera flera svar, flera resultset. I detta fallet är det bara ett `res[0]` och det är det jag vill skicka vidare till vyn.

Sådär, nu är min kod uppdaterad och fungerar som tänkt tillsammans med en lagrad procedur.

I min vy uppdaterade jag med följande kod som ger mig möjligheter att debugga och se vad ett resultset innehåller.

```html
<pre><%= JSON.stringify(res, null, 4) %></pre>
```

Det ger en JSON representation av datat jag jobbar på. Det kan se ut så här.

[FIGURE src=image/snapvt18/bank2-balance-json.png caption="Utskrift av ett resultset i en formatterad JSON."]

Vill jag inte se utskriften kan jag kommentera bort den, men konstruktionen är bra vid behov.



C i CRUD, Create {#create}
---------------------------------------

Låt oss skapa möjligheten att lägga till en ny kontohavare med konto och kontobehållning (peng på kontot).



### Vy med HTML formulär {#cform}

Jag börjar med att göra ett HTML formulär där användaren kan mata in detaljer om det nya kontot. Routen får bli `bank/create` och vyn `views/bank/create.ejs`.

Att placera ut och styla formulär är en historia för sig. Men jag försöker med enkla medel att lägga ut ett enklare formulär. Lite CSS behövs för att ordna layouten. Men vi fokuserar på HTML-koden för formuläret, den ser ut så här.

```html
<form class="label-left" method="post">
    <fieldset>
        <legend>Create account</legend>

        <label for="id">Id</label>
        <input id="id" type="text" name="id">

        <label for="name">Name</label>
        <input id="name" type="text" name="name">

        <label for="balance">Balance</label>
        <input id="balance" type="number" name="balance">

        <input type="submit" name="doit" value="Create">
    </fieldset>
</form>
```

Om vi renderar den som en del av vyn så kan sidan se ut så här.

[FIGURE src=image/snapvt18/bank2-create-account.png caption="Ett formulär där jag kan mata in detaljer för ett nytt konto."]

Nu kan jag fylla i informationen och klicka på knappen. Men vi behöver en route som hanterar det postade formulärets data.



### Route för att hantera POST {#cpost}

Formuläret postas till servern via HTTP-metoden POST. Då gör vi en route `bank/create` som endast svarar på POST. Man kan ha samma namn på routen men olika HTTP-metoder.

Routen lägger vi tillsammans med övriga bank-routes i `route/bank.js`.

Låt oss först titta på ett utkast till routern, där vi använder post istället för get.

```javascript
router.post("/create", async (req, res) => {
    // Extract the data from the posted form
    // Send data to a stored procedure
    res.redirect("/bank/balance");
});
```

Routen ovan fungerar som den är. Om vi klickar på submit-knappen i formuläret så hamnar vi i denna routen och det enda som händer är att vi redirectas till routen `/bank/balance`.

Det vi nu måste göra är att extrahera datat som kommer i det postade formuläret. Till det använder vi en npm modul [body-parser](https://www.npmjs.com/package/body-parser) vars uppgift är att extrahera den kodade informationen i HTTP-requesten.

Vi installerar modulen.

```text
npm install body-parser --save
```

Vi aktiverar modulen enbart i den fil vi använder den, i samma fil vår post-route ligger.

```javascript
const bodyParser = require("body-parser");
const urlencodedParser = bodyParser.urlencoded({ extended: false });
```

Det vi har i `urlencodedParser` är en middleware som kan läggas till i vår route, så här.

```javascript
router.post("/create", urlencodedParser, async (req, res) => {
    // Extract the data from the posted form
    console.log(JSON.stringify(req.body, null, 4));
    // Send data to a stored procedure
    res.redirect("/bank/balance");
});
```

Vi har nu det postade formuläret i requesten i `req.body`. Vi kan debugga inkommande genom att skriva ut dess innehåll. Det blir enklare och tydligare att läsa innehållet om man formaterar det som JSON-data.

Postar vi ett tomt formulär ser utskriften ut så här.

```json
{
    "id": "",
    "name": "",
    "balance": "",
    "doit": "Create"
}
```

Bra, det ser ut som våra element i formuläret.

Då går vi över till SQL-biten.



### Lagrad procedur för insert {#cinsert}

Jag gör en lagrad procedur för att sköta själva insert-satsen. De kan se ut så här.

```sql
--
-- Create procedure for insert into account
--
DROP PROCEDURE IF EXISTS createAccount;
DELIMITER //
CREATE PROCEDURE createAccount(
	aId CHAR(4),
    aName VARCHAR(8),
    aBalance DECIMAL(4, 2)
)
BEGIN
    INSERT INTO account VALUES (aId, aName, aBalance);
END
//
DELIMITER ;
```

Det är viktigt att datatyperna matchar de som tabellen har.

Jag kan pröva att använda den lagrade proceduren.

```sql
mysql> CALL createAccount("1337", "Mega", 37.0);
Query OK, 1 row affected (0.22 sec)
```

Det blir inget resultset som svar. Men när inget går fel så antar vi alltid att det gick bra, iallfall i sammanhanget databaser.

Nu kan vi använda den lagrade proceduren i Express.



### Lagrad procedur för insert {#cinsert}

Först skapar jag en funktion i databasmodulen `src/bank.js`. Jag döper den till `createAccount`. Så här kan den se ut.

```javascript
/**
 * Create a new account.
 *
 * @async
 * @param {string} id      A id of the account.
 * @param {string} name    The name of the account holder.
 * @param {string} balance Initial amount in the account.
 *
 * @returns {void}
 */
async function createAccount(id, name, balance) {
    let sql = `CALL createAccount(?, ?, ?);`;
    let res;

    res = await db.query(sql, [id, name, balance]);
    console.log(res);
    console.info(`SQL: ${sql} got ${res.length} rows.`);
}
``` 

Jag anropar funktionen från min route och skickar med argumenten som kommer från det postade formuläret.

```javascript
router.post("/create", urlencodedParser, async (req, res) => {
    // console.log(JSON.stringify(req.body, null, 4));
    await bank.createAccount(req.body.id, req.body.name, req.body.balance);
    res.redirect("/bank/balance");
});
```

Nu kan vi testa. Första matar vi in detaljerna i formuläret.

[FIGURE src=image/snapvt18/bank2-create-account-post.png caption="Vi fyller i formuläret med detaljer om kontot."]

När vi klickar på submit-knappen postas formulärdatat till vår post-route som skapar en ny kontohavare och gör en redirect när det är klart. När det postade formuläret hanteras i routen skrivs detaljer och logginformation ut i terminalen. Det kan vi använda för att debugga.

Så här ser sidan ut vi kommer till.

[FIGURE src=image/snapvt18/bank2-account-created.png caption="Det nya kontot är skapat och finns nu med i sammanställningen över kontohavare."]

Det var C:et i CRUD, Create för att skapa nya rader i databasen.



Visa detaljer om enbart ett konto {#visaett}
---------------------------------------

Hur kan vi visa detaljer om ett specifikt konto på en egen sida? Ja, det finns naturligtvis varianter, men säg att vi kunde skapa en dynamisk route som tar en parameter så routen blev `bank/account/:id` där `:id` representerar kontots id.

Då kunde vi hämta detaljerna för just det kontot och visa upp det i en vy.

Routen kan se ut så här.

```javascript
router.get("/account/:id", async (req, res) => {
    let id = req.params.id;
    let data = {
        title: `Account ${id} ${sitename}`,
        account: id
    };

    data.res = await bank.showAccount(id);

    res.render("bank/account-view", data);
});
```

Det som är nytt här är hur routen specificeras och hur `:id` kan hämtas i routen via `req.params.id`. Det är som att skicka en parameter via routen. Resten i routen är saker du känner till, en funktion `bank.showAccount()` som anropar en lagrad procedur som hämtar detaljer om just ett konto. Vyn kan ha liknande struktur som den som visar balansen, det är samma typ av information som skall visas upp.

Resultatet av en sådan route skulle kunna visas upp så här.

[FIGURE src=image/snapvt18/bank2-view-account.png caption="En dynamisk route som tar ett argument och kan visa upp detaljer om specifikt konto."]

Tänk nu, om vi uppdaterar vyn som visar balansen, och för varje konto som visas i tabellen så länkar vi dess id till denna nya routen. Då får vi en översikt med länkar till detaljer om varje konto. Det låter som en bra idé. 



U som i Uppdatera detaljer om ett konto {#uppdatera}
---------------------------------------

U:et i CRUD handlar om att uppdatera befintlig data. Säg att vi vill uppdatera detaljer om ett specifikt konto.

Nu kan vi länka till varje konto, låt oss då skapa ytterligare en länk som leder oss till ett formulär där vi kan uppdatera detaljer om ett konto.



### Klickbara ikoner {#klickikon}

Jag tycker det vore trevligt med ikoner att klicka på och jag väljer att använda [FontAwesome](http://fontawesome.io/) för det syftet.

När jag ändå håller på med ikoner så lägger jag till en ikon för att radera också. Så här blev det.

[FIGURE src=image/snapvt18/bank2-account-actions.png caption="Nu förberedd med ikoner för att göra edit och delete."]

Själva ikonerna, och dess länkar, skapas med följande kod (se hemsidan för FontAwesome).

```html
<a href="/bank/edit/<%= row.id %>">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>
<a href="/bank/delete/<%= row.id %>">
    <i class="fa fa-trash-o" aria-hidden="true"></i>
</a>
```

Man behöver även lägga dit en stylesheet som ger mig tillgång till ikonerna (detaljer, se FontAwesome), i mitt fall blev det följande i min `views/bank/header.ejs`.

```html
<script src="https://use.fontawesome.com/0aee473986.js"></script>
```



### GET route för uppdatera kontodetaljer {#geteditaccount}

För edit-ikonen länkar jag till routen `/bank/edit/:id`. Den routen ser ut ungefär som routen `/bank/account/:id`, det är bara dess path, title och vy som ändras.

```javascript
router.get("/edit/:id", async (req, res) => {
    let id = req.params.id;
    let data = {
        title: `Edit account ${id} ${sitename}`,
        account: id
    };

    data.res = await bank.showAccount(id);

    res.render("bank/account-edit", data);
});
```

I routen hämtar jag detaljer om kontot för det specifika kontot och visar upp det i en vy som ser ut ungefär som formuläret för att skapa konto. Det är ju ungefär samma upplägg för ett edit-formulär, men med fälten ifyllda med dess värde.

```html
<% res = res[0] %>
<form class="label-left" method="post" action="/bank/edit">
    <fieldset>
        <legend>Edit account</legend>

        <label for="id">Id</label>
        <input id="id" type="text" name="id" readonly value="<%= res.id %>">

        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="<%= res.name %>">

        <label for="balance">Balance</label>
        <input id="balance" type="number" name="balance" value="<%= res.balance %>">

        <input type="submit" name="doit" value="Edit">
    </fieldset>
</form>
```

Notera att formulärelementet för "id" är markerat som `readonly`, användaren skall inte kunna ändra det. Rent strikt är detta inget säkert sätt att hindra användaren från att uppdatera fältet. När man pratar om säkerhet måste man alltid validera ett postat formulär på serversidan, det går inte att lita på klienten. Men det får vara en annan historia.

Notera också att första raden i formuläret säger `action="/bank/edit"` vilket innebär att detta formulär postas till just den routen. Om vi utelämnar det fältet så postas formuläret till samma route man är på.

Om jag nu utgår från översikten av kontona och klickar på edit-knappen så hamnar jag på edit-sidan, med formuläret ifyllt.

[FIGURE src=image/snapvt18/bank2-edit-account-details.png caption="Nu kan jag uppdatera detaljer om kontot."]

Då behöver vi en route för det submittade formuläret.



### POST route för uppdatera kontodetaljer {#posteditaccount}

På samma sätt som när vi skapade ett konto, så behöver vi nu en POST route till `/edit`.

```javascript
router.post("/edit", urlencodedParser, async (req, res) => {
    // console.log(JSON.stringify(req.body, null, 4));
    await bank.editAccount(req.body.id, req.body.name, req.body.balance);
    res.redirect(`/bank/edit/${req.body.id}`);
});
```

Jag behöver skapa en funktion som löser databaskoden. Jag väljer att göra redirect till formulärsidan igen. Det kommer se bra ut, varje gång man klickar på edit-knappen så ser användaren att hen kommer till samma sida igen och kan fortsätta göra uppdateringar.

Att välja vilken sida man gör redirect till, är en viktig komponent i webbapplikationens flöde. Det är något som markant påverkar användarens upplevelse och webbapplikationens användarvänlighet.



### Databasfunktion för att editera kontodetaljer {#dbeditaccount}

Vi kan kika på funktionen som uppdaterar kontodetaljerna i databasen.

```javascript
/**
 * Edit details on an account.
 *
 * @async
 * @param {string} id      The id of the account to be updated.
 * @param {string} name    The updated name of the account holder.
 * @param {string} balance The updated amount in the account.
 *
 * @returns {void}
 */
async function editAccount(id, name, balance) {
    let sql = `CALL editAccount(?, ?, ?);`;
    let res;

    res = await db.query(sql, [id, name, balance]);
    console.log(res);
    console.info(`SQL: ${sql} got ${res.length} rows.`);
}
```

Funktionen ser ut som tidigare motsvarigheter, den liknar mycket den funktion som skapade ett konto. Det är samma parametrar som används, men med lite annat syfte i denna funktionen.

Det behövs en lagrad procedur för att utför själva databasoperationen.



### Lagrad procedur för att uppdatera kontodetaljer {#dbeditsp}

Då har vi sista delen i kedjan, den lagrade proceduren som utför själva UPDATE-satsen i databasen.

```sql
--
-- Create procedure for edit account details
--
DROP PROCEDURE IF EXISTS editAccount;
DELIMITER //
CREATE PROCEDURE editAccount(
	aId CHAR(4),
    aName VARCHAR(8),
    aBalance DECIMAL(4, 2)
)
BEGIN
    UPDATE account SET
		`name` = aName,
        `balance` = aBalance
	WHERE
		`id` = aId;
END
//
DELIMITER ;
```

Som vanligt kan vi testköra den lagrade proceduren, för att se att den fungerar som den ska.

```sql
mysql> CALL editAccount("1337", "Mega", 7.0);
Query OK, 1 row affected (0.01 sec)

mysql> CALL showAccount("1337");
+------+------+---------+
| id   | name | balance |
+------+------+---------+
| 1337 | Mega |    7.00 |
+------+------+---------+
1 row in set (0.00 sec)

Query OK, 0 rows affected (0.00 sec)
```

Då kan vi utföra samma sak i webbklienten.



### Testa att flödet fungerar {#dbedittest}

Om vi då startar om vår server så kan vi testa hela flödet. I översikten klickar vi på edit-ikonen som visar `GET /bank/edit/:id`, i formuläret uppdaterar vi ett fält och submittar till `POST /bank/edit` som uppdaterar databastabellen via en funktion som anropar en lagrad procedur. När allt är klart så redirectas användare till ursprungsformuläret som läser in all uppdaterad data från databasen.

Det var U i CRUD, Update, i en webbapplikation med formulär. 



R som i Radera ett konto {#radera}
---------------------------------------

D:et i CRUD handlar om att göra delete på rader. Säg att vi vill radera ett konto.

För delete-ikonen länkar jag till routen `GET /bank/delete/:id` och där tänker jag skriva ut detaljer om kontot och erbjuda en submit-knapp om de verkligen vill radera kontot.

Det känns som jag borde kunna återanvända de strukturer jag redan byggt upp.

Routen blir nästan likadan som `/bank/update/:id`. Jag återanvänder vyn `views/bank/account-update` och sparar som `views/bank/account-delete` och uppdaterar så att alla fälten blir readonly, knappen säger "Delete account" och formulärets action leder till `POST /bank/delete`.

Jag tänker att det är bra att användaren får se kontot innan hen raderar det.

[FIGURE src=image/snapvt18/bank2-delete-account.png caption="Sida som förbereder användaren för att radera ett konto."]

Klickar du på "Delete account" så submittas formuläret till `POST /bank/delete` med id:et som den viktiga ingrediensen. I routen anropas (som vanligt) en funktion (`bank.deleteAccount(id)`) som raderar kontot via en lagrad procedur `deleteAccount(?)`.

Om du tänker efter så har vi i tidigare exempel byggt upp liknande saker så på det här stadiet handlar det mest om att kopiera, modifiera och lägga saker på rätt plats i flödet. Men minns, när man har en god struktur så kan saker bli enkelt, eller enklare. Lägg tid på att underhålla din kodstruktur så den känns behändig för sitt syfte.



Alltid POST för ändringar {#alltidpost}
---------------------------------------

Märk att vi alltid gör en HTTP POST-request när vi uppdaterar databasen. Du ser det i Create, Update och Delete-fallen. Det är så det skall vara. Vi skall aldrig göra en uppdatering av databasen via en GET-request. Hade vi använt GET till uppdateringar så hade det exponerat en säkerhetsrisk. Mer om det är en annan historia som vi väljer att inte fördjupa oss i just nu. Vi nöjer oss med att säga -- _POST för alla uppdateringar_.



Om antal rader som påverkas {#rowsaffected}
---------------------------------------

När man gör en UPDATE/INSERT/DELETE så håller databasen reda på hur många rader som påverkas. Vid en UPDATE så görs uppdateringar på de rader som behövs. Det kan vara fler rader som egentligen är påverkade av en UPDATE via dess WHERE-villkor, men kanske behövde databasen inte göra en uppdatering för raden innehöll redan det önskade värdet. I det fallet visas inte den raden som uppdaterad, eller _rows affected_ som det heter i databasen.

Man ser alltså databasens vy av påverkade rader, det är kanske inte detsamma som din egen vy av antaler rader som borde påverkas.



### Rows affected i SQL {#row_count}

Låt oss se ett exempel. Vi har en rad och gör en UPDATE mot den, med exakt samma värden som raden innehåller.

```sql
mysql> CALL showAccount("1337");
+------+------+---------+
| id   | name | balance |
+------+------+---------+
| 1337 | Mega |   42.00 |
+------+------+---------+
1 row in set (0.00 sec)

Query OK, 0 rows affected (0.00 sec)
```

Vi ser att tabellen innehåller viss data och gör en UPDATE mot samma data.

```sql
mysql> CALL editAccount("1337", "Mega", 42.0);
Query OK, 0 rows affected (0.00 sec)
```

Vi ser i terminalen att `0 rows affected`. Vi kan även ta fram samma siffra genom att köra `SELECT ROW_COUNT()`.

```sql
mysql> SELECT ROW_COUNT();
+-------------+
| ROW_COUNT() |
+-------------+
|           0 |
+-------------+
1 row in set (0.00 sec)
```

Låt oss då se motsvarigheten när en rad verkligen uppdateras.

```sql
mysql> CALL editAccount("1337", "Mega", 4.2);
Query OK, 1 row affected (0.01 sec)

mysql> SELECT ROW_COUNT();
+-------------+
| ROW_COUNT() |
+-------------+
|           1 |
+-------------+
1 row in set (0.00 sec)
```

Nu ser vi att en rad påverkades.



### Rows affected i modulen mysql {#noderow_count}

Hur kan vi se motsvarande värde via modulen mysql? Vi kan naturligtvis hantera det i vår lagrade procedur på något sätt. Men när våra lagrade procedurer enbart består av en INSERT/UPDATE/DELETE sats så kan vi också hämta ut värdet [via gränssnittet till modulen mysql](https://www.npmjs.com/package/mysql#getting-the-number-of-affected-rows).

Om du läser manualen ser du att modulen mysql hanterar både `affected rows` och `changed rows`. Modulen erbjuder ju ett lager ovanpå databasen och kan välja att hantera saker annorlunda.

Källan i hur siffrorna hanteras ser vi i manualen för databasen för [`mysql_affected_rows()`](https://dev.mysql.com/doc/refman/5.7/en/mysql-affected-rows.html). Det är alltid bra att vandra runt i manualerna när man vill förstå detaljer i hur saker hanteras.

Om du gör en utskrift av det resultset du får tillbaka från en databasuppdatering så ser du att det innehåller statusen för själva uppdateringen.

```javascript
{
    fieldCount: 0,
    affectedRows: 1,
    insertId: 0,
    serverStatus: 2,
    warningCount: 1,
    message: '',
    protocol41: true,
    changedRows: 0
}
```

Du kan se affected rows och updated rows. Du kan se om det blev någon warning. Du kan även se det senaste automatgenererade id:et, om det finns.



Om senast automatgenererade id {#lastinsertedid}
---------------------------------------

När man har en tabell med en automatgenererad nyckel så har man ibland behovet av ett se vilket id som den senaste tillagda raden fick.

I SQL, till exempel i en lagrad procedur, kan du få ut detta värdet med `SELECT LAST_INSERT_ID()`. Hur detta fungerar i MySQL förklaras i "[How to Get the Unique ID for the Last Inserted Row](https://dev.mysql.com/doc/refman/5.7/en/getting-unique-id.html)".

I modulen mysql finns det förklarat hur man hämtar [senaste tillagda id](https://www.npmjs.com/package/mysql#getting-the-id-of-an-inserted-row). Det är alltså på samma sätt som vi gjorde i föregående stycke om "affected rows".



Felhantering {#felhantering}
---------------------------------------

Vad händer när något går fel i databasen? Vad händer när användaren skickar in felaktig data som inte kan uppdateras?

Eller uppkopplingen kan inte göras?

[Felhantering i modulen mysql](https://www.npmjs.com/package/mysql#getting-the-id-of-an-inserted-row).

Felhantering inuti en lagrad procedur?




Flytta pengar mellan konton {#move}
---------------------------------------

Gör som uppgift.




Avslutningsvis {#avslutning}
--------------------------------------

Detta var en introduktion för att komma igång Express och MySQL. Vi byggde vidare på en kodstruktur vi fick i föregående artiklar och lade till kod för att koppla upp oss mot databasen och vi såg hur resultsetet kunde presenteras i vyerna.

Du har nu grunderna för att skriva din egen webb/applikationsserver som kopplar sig mot en databas och presenterar innehåll i rapporter.

Denna artikel har en [egen forumtråd](t/7218) som du kan ställa frågor i, eller ge tips.
