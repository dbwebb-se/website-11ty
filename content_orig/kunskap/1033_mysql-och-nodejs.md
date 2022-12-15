---
author: mos
category:
    - nodejs
    - javascript
    - mysql
    - kursen dbjs
revision:
    "2017-12-29": (B, mos) Länk till uppdaterad version.
    "2017-02-24": (A, mos) Första utgåvan i kursen dbjs.
...
MySQL och Node.js 
==================================

[FIGURE src=/image/snapvt17/npm-mysql.png?w=c5 class="right"]

Databasen MySQL är välkänd i webbsammanhang och ser hur vi kan koppla oss från Node.js in i en MySQL databas.


<!--more-->

[INFO]
**Nyare utgåva av artikeln.**

Det finns en uppdaterad version av artikeln i "[MySQL och Node.js (v2)](kunskap/mysql-och-nodejs-v2)".
[/INFO]



Förutsättning {#pre}
--------------------------------------

Du har redan koll på databasen MySQL och du kan grunderna i Node.js och JavaScript på serversidan.

Exempelprogram finns i ditt kursrepo (dbjs) under `example/nodejs/mysql`.



Hitta och installera modulen med npm {#npm}
--------------------------------------

Det finns flera libb som stödjer MySQL och första utmaningen blir att hitta det som vi vill använda. Ibland kan en sådan aktivitet kräva en liten undesökning, men till slut brukar man finna det som passar.

Jag väljer den npm-modul som heter `mysql`. Du kan se den på [GitHub](https://github.com/mysqljs/mysql) eller som paket på [npm's hemsida](https://www.npmjs.com/package/mysql).

Jag går till kursrepot och installerar modulen med npm.

```bash
# Ställ dig i rooten av ditt kursrepo.
$ npm install mysql
```

Klart. Då testar vi om installationen gick bra.



Verifiera att MySQL fungerar {#verifiera}
---------------------------------------



###Skapa en testanvändare {#test}

Jag börjar med att skapa en testanvändare och en testdatabas, lokalt på min egen MySQL installation. Jag använder MySQL CLU för att exekvera kommandona.

```sql
mysql> CREATE DATABASE nodedb;
Query OK, 1 row affected (0.00 sec)

mysql> GRANT ALL ON nodedb.* TO user@localhost IDENTIFIED BY 'pass'; 
Query OK, 0 rows affected (0.01 sec)

```

Nu har jag en databas och en testanvändare. Nu låter vi den användaren koppla upp sig mot databasen via Node.js.



###Exempelprogram i Node.js {#nodejs}

I README-filen finns ett exempelprogram som jag modifierar något och använder för att testa att modulen är installerad och fungerar som tänkt.

```javascript
/**
 * To verify that MySQL is installed and is working.
 * The program creates an connectin to the database and executes
 * a query without actually needing a database.
 */
"use strict";

var mysql      = require("mysql");
var connection = mysql.createConnection({
    host     : "localhost",
    user     : "user",
    password : "pass",
    database : "nodedb"
});

connection.connect();

connection.query("SELECT 1 + 1 AS solution", (err, res/*, fields*/) => {
    if (err) {
        throw err;
    }
    console.log("The solution is: ", res[0].solution);
});

connection.end();
```

Jag tar ovan program och sparar i en fil `index.js`.

Så här ser det ut när jag testkör programmet.

```bash
$ node index.js
The solution is:  2
```

Då vet jag att det fungerar. Exempelprogrammet skapar en koppling mot MySQL med vald användare och exekverar däefter en SQL-sats som resulterar i svaret "2".

Bra. Nu vet vi att modulen för MySQL fungerar som tänkt.

Då kan vi gå vidare och se hur man använder den.



Jobba med databasen {#query}
---------------------------------------------

Låt oss kika på hur man jobbar med MySQL via modulens API, hur man ställer frågor, tar hand om resultatet och uppdaterar databasen. Exemplen kommer från modulens dokumentationen.



###CREATE TABLE {#createtable}

Vi börjar med att skapa en tabell genom att bygga ett nytt exempelprogram `index2.js`.

Följande del skapar tabellen.

```javascript
connection.query("DROP TABLE IF EXISTS Moped;", (err) => {
    if (err) {
        throw err;
    }
    console.log("Dropped table.");
});

sql = `
CREATE TABLE Moped (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(40)
);`;
connection.query(sql, (err/*, res, fields*/) => {
    if (err) {
        throw err;
    }
    console.log("Created a table for mopeds.");
});
```

Den callback som används har följande signatur.

```javascript
function (error, results, fields) {
    // error will be an Error if one occurred during the query 
    // results will contain the results of the query 
    // fields will contain information about the returned results
    // fields (if any) 
}
```



###INSERT INTO {#insert}

Då bygger vi vidare på exemplet och lägger in lite värden i tabellen.

```javascript
sql = `
INSERT INTO Moped (text)
VALUES
    ("Apollo"), ("Husqvarna"), ("Puch"), ("Zündapp")
;`;
connection.query(sql, (err/*, res, fields*/) => {
    if (err) {
        throw err;
    }
    console.log("Inserted values into table Moped.");
});
```

Nu har vi en tabell med värden som vi kan kika på via MySQL CLU.

```bash
desktop:~/git/dbjs/example/nodejs/mysql$ mysql -uuser -ppass nodedb

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show tables;
+------------------+
| Tables_in_nodedb |
+------------------+
| Moped            |
+------------------+
1 row in set (0.00 sec)

mysql> select * from Moped;
+----+-----------+
| id | text      |
+----+-----------+
|  1 | Apollo    |
|  2 | Husqvarna |
|  3 | Puch      |
|  4 | Zündapp   |
+----+-----------+
4 rows in set (0.00 sec)
```

Det ser ut precis som vi tänkt, så långt.



###SELECT FROM {#select}

Då skall vi se hur man ställer en SELECT-fråga och tar hand om resultatet.

```javascript
sql = `
SELECT * FROM Moped
ORDER BY id DESC
;`;
connection.query(sql, (err, res/*, fields*/) => {
    if (err) {
        throw err;
    }
    console.log(res);

    res.forEach((row, count) => {
        console.log(`${count}: ${row.id} - ${row.text}`);
    });
});
```



###Placeholders och parametrar {#placeholder}

Det går att använda placeholders och parametrar för att exekvera en fråga. Det ger även ett visst skydd mot SQL injection genom att escapa argumentet.

```javascript
sql = `
SELECT * FROM Moped
WHERE
    TEXT IN (?, ?)
ORDER BY id DESC
;`;
connection.query(sql, ["Husqvarna", "Puch"], (err, res/*, fields*/) => {
    if (err) {
        throw err;
    }
    console.log(res);

    res.forEach((row, count) => {
        console.log(`${count}: ${row.id} - ${row.text}`);
    });
});
```

Nu kan vi nog anse vårt nya exempel är komplett och vi kör det för att få ut följande utskrift.

```bash
$ node index2.js
Dropped table.
Created a table for mopeds.
Inserted values into table Moped.
[ RowDataPacket { id: 4, text: 'Zündapp' },
  RowDataPacket { id: 3, text: 'Puch' },
  RowDataPacket { id: 2, text: 'Husqvarna' },
  RowDataPacket { id: 1, text: 'Apollo' } ]
0: 4 - Zündapp
1: 3 - Puch
2: 2 - Husqvarna
3: 1 - Apollo
[ RowDataPacket { id: 3, text: 'Puch' },
  RowDataPacket { id: 2, text: 'Husqvarna' } ]
0: 3 - Puch
1: 2 - Husqvarna
```

Det ser ut som vi har en fungerande koppling mellan Node.js och MySQL. Bra, bra.



Avslutningsvis {#avslutning}
--------------------------------------

Du har nu fått en genomgång i hur MySQL kan fungera tillsammans med Node.js. Du är redo att börja skriva ditt egna program.

Denna artikel har en [egen forumtråd](t/6270) som du kan ställa frågor i, eller ge tips.
