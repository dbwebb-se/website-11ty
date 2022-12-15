---
author:
    - mos
category:
    - mysql
    - javascript
    - npm mysql
    - mysql
    - sql
    - kursen databas
revision:
    "2019-02-15": "(A, mos) Första versionen"
...
Vad returnerar en SQL UPDATE i Node.js och MySQL/MariaDB?
==================================

När man gör en SQL UPDATE, eller INSERT/DELETE så genereras inte ett resultset från en sådan query. Du är troligen van vid att köra dessa queries i terminalklienten eller i Workbench och du får svaret om uppdateringen gick bra eller inte.

Men hur ser det ut när du köra samma kod från ett annat klientprogram, till exempel JavaScript i Node.js via npm-modulen mysql mot en databas som är MySQL/MariaDB?

Vad returneras från en sådan UPDATE-sats?

<!--more-->



Förutsättning {#pre}
-----------------------------------

Du har läst artikeln "[MySQL och Node.js (v2)](kunskap/mysql-och-nodejs-v2)", eller har motsvarande kunskap.



Uppdatera en lärares lön {#update}
-----------------------------------

I kursrepot för databas under [`example/nodejs/mysql/` ligger exempelprogrammet `update.js`](https://github.com/dbwebb-se/databas/blob/master/example/nodejs/mysql/update.js).

SQL-satsen vi kommer leka med är följande och det är en del från [SQL-guidens första del](https://dbwebb.se/guide/kom-igang-med-sql-i-mysql/uppdatera-varden-i-rader).

```sql
UPDATE larare
SET
    lon = 42
WHERE
    akronym = 'dum' -- Dumbeldore
;
```

Så här ser själva JavaScript-koden för UPDATE-satsen ut.

```javascript
/**
 * Uptade the salary of a teacher.
 *
 * @async
 * @param {connection} db      Database connection.
 * @param {string}     acronym Who to update.
 * @param {string}     salary  Value to update with.
 *
 * @returns {void}
 */
async function updateTeacherSalary(db, acronym, salary) {
    let sql;
    let res;

    console.info(`Updating salary to ${salary} for ${acronym}`);

    sql = `
        UPDATE larare
        SET
            lon = ?
        WHERE
            akronym = ?
        ;
    `;
    res = await db.query(sql, [salary, acronym]);
    console.log(res);
}
```

Det jag vill fokusera på är vad som returneras från `db.query()`, det som hamnar i `res`.

Låt oss köra programmet. En körning ser ut så här.

[ASCIINEMA src=227760 caption="Utskrift av res från en SQL UPDATE."]

Om vi fokuserar på den biten som returneras till `res` så är det följande datastruktur.

```javascript
OkPacket {
  fieldCount: 0,
  affectedRows: 1,
  insertId: 0,
  serverStatus: 2,
  warningCount: 0,
  message: '(Rows matched: 1  Changed: 1  Warnings: 0',
  protocol41: true,
  changedRows: 1
}
```

Datat vi ser är samma vi kan få oavsett databasklient. Vi kan egentligen vända oss till MySQL manualen för att se vilken typ av information vi ser. Men, låt oss inte gräva för mycket utan vi tar de viktigaste delarna.

Som en referens så använder vi samma SQL UPDATE från terminalen, där ser utskriften ut så här.

```text
MariaDB [skolan]> UPDATE larare
    -> SET
    ->     lon = 42
    -> WHERE
    ->     akronym = 'dum' -- Dumbeldore
    -> ;
Query OK, 1 row affected (0.00 sec)
Rows matched: 1  Changed: 1  Warnings: 0
```

Du kan se två rader i slutet av texten som visar status från själva operationen.



### `affectedRows` {#aff}

Värdet `res.affectedRows` berättar hur många rader som påverkades av SQL-satsen, i enlighet med WHERE-delen. I vårt fall fanns en lärare och det var en rad som föremål för uppdateringen.

I terminalklienten kan du få fram samma information via "[MySQL Information Functions](https://dev.mysql.com/doc/refman/8.0/en/information-functions.html)", i detta fallet är det `FOUND_ROWS()` som gäller.

```text
MariaDB [skolan]> SELECT FOUND_ROWS();
+-------------+
| ROW_COUNT() |
+-------------+
|           1 |
+-------------+
```



### `changedRows` {#changed}

Värdet `res.changedRows` beskriver hur många rader som verklingen påverkades i samband med frågan. Påverkades, är i detta fallet att raderna uppdaterades på något sätt. Om ingen uppdatering behövdes så anges det inte som en påverkad rad.

Säg att vi har ändrat lönen till 42. Sedan kör vi programmet en gång till och ändrar till lönen 42. Vi kommer få `res.affectedRows = 1` men `res.changedRows = 0` då det inte behövdes göra någon uppdatering av raden, den hade redan rätt värde. MySQl genomför inte en uppdatering om värdet på kolumnen är detsamma som man vill uppdatera till.

I terminalklienten kan vi använda `ROW_COUNT()` för att få fram samma värde. Denna funktion finns beskriven i MySQL manualen för Information Functions.

```text
MariaDB [skolan]> SELECT FOUND_ROWS(), ROW_COUNT();
+--------------+-------------+
| FOUND_ROWS() | ROW_COUNT() |
+--------------+-------------+
|            1 |           1 |
+--------------+-------------+
```

Om vi kör exakt samma UPDATE ytterligare en gång, så kommer `ROW_COUNT()` vara 0.

```text
MariaDB [skolan]> SELECT FOUND_ROWS(), ROW_COUNT();
+--------------+-------------+
| FOUND_ROWS() | ROW_COUNT() |
+--------------+-------------+
|            1 |           0 |
+--------------+-------------+
```

Detta innebär att man egentligen inte på förhand kan bestämma att en viss SQL-sats "borde" innebära att ett antal rader verkligen uppdateras i databasen, det beror helt enkelt på vad databasen innehåller.



### `insertId` {#insert}

Värdet `res.insertId` sätts vid en INSERT där det finns primärnycklar som är `AUTO_INCREMENT` och visar då värdet på den senaste automatgenererade nyckeln. Detta är bra att ha när man gör en insert och vill veta vilken nyckel som skapades.

I vårt fall görs en update sats och då är värdet inte relevant.

I terminalklienten kan vi använda `LAST_INSERT_ID()` för att få fram samma värde. Denna funktion finns beskriven i MySQL manualen för Information Functions.

```sql
MariaDB [skolan]> SELECT LAST_INSERT_ID();
+------------------+
| LAST_INSERT_ID() |
+------------------+
|                0 |
+------------------+
```



Avslutningsvis {#avslutning}
-----------------------------------------

När man skriver applikationer är det bra att veta att dessa attribut, som är sammankopplande med databasfrågan, går att plocka fram och hantera i sin klientapplikation.

Har du frågor eller funderingar, eller vill bidra med tips, så finns en [forumtråd för detta tips](t/8338).
