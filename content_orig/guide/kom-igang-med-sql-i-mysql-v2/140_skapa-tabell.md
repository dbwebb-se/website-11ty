---
author: mos
revision:
    "2022-01-03": "(D, mos) Genomgången inför v2 och MariaDB."
    "2019-01-11": "(C, mos) Mer om kodstandard."
    "2018-04-02": "(B, mos) Exempel på hur man kör alla kommandon i filen."
    "2017-12-27": "(A, mos) Första versionen, uppdelad av större dokument."
...
Skapa tabell
==================================

Vi skall skapa ett antal tabeller i databasen.

Lägg SQL-koden i filen `ddl-larare.sql`.



Kommentarer {#comments}
----------------------------------

Inled filen med en header som berättar vad filen gör.

```sql
--
-- Create scheme for database skolan.
--
```

Skall man skriva kommentarer på engelska eller svenska?

I programmeringssammanhang föredrar vi att kommentarer skrivs på engelska. Det är utgångsläget. Men i databassammanhang kan databasens schema, dess tabeller och kolumnnamn även vara på svenska, då kan vi tänka oss att även kommentarerna är på svenska. I detta exempel har vi en svensk databas, med svenska namn på tabeller och kolumner, här kan du välja om du vill skriva kommentarerna på svenska eller engelska.



En tabell {#tabell}
----------------------------------

Då börjar vi.

En skola har lärare och vi skall skapa en tabell för lärare enligt följande:

**Tabell: larare**

| Kolumn          | Datatyp     |
|-----------------|-------------|
| akronym         | CHAR(3)     |
| avdelning       | CHAR(4)     |
| fornamn         | VARCHAR(20) |
| efternamn       | VARCHAR(20) |
| kon             | CHAR(1)     |
| lon             | INT         |
| fodd            | DATE        |

Det kan vara klokt att undvika svenska tecken som åäö tabellens namn och i kolumnernas namn, det blir troligen mindre problem då.

Använd små bokstäver till tabellnamn och kolumnnamn, om ordet består av två ord så använd en `_` underscore för att binda dem samman, om det behövs.

Undvik stora bokstäver då de tolkas olika på olika operativsystem. Operativsystemen macOS och Linux gör skillnad på små och stora bokstäver medan Windows inte gör skillnad på dem. Det blir enklare, rent kompabilitetsmässigt, om vi undviker den risken som stora bokstäver medför.

Här är SQL-kod som går att använda för att skapa tabellen. Kolumnen akronym är unik och vi använder den som primärnyckel.

```sql
--
-- Create table: larare
--
CREATE TABLE larare
(
    akronym CHAR(3),
    avdelning CHAR(4),
    fornamn VARCHAR(20),
    efternamn VARCHAR(20),
    kon CHAR(1),
    lon INT,
    fodd DATE,

    PRIMARY KEY (akronym)
);
```

Radera tabellen med `DROP` och skapa om den igen.

När du sparar CREATE och DROP i en SQL-fil som `ddl.sql` så kan du behöva kombinera dem för att uppnå önskat utfall. I mitt fall så tänker jag alltid börja med en tom databas och jag tänker droppa tabellen om den finns. I min fil ser det ut så här.

```text
--
-- Create table: larare
--
DROP TABLE IF EXISTS larare;
CREATE TABLE larare
(
-- resten av CREATE statementet.
```

Jag kan visa vilka tabeller som finns med `SHOW TABLES`.

```sql
mysql> SHOW TABLES;
+------------------+
| Tables_in_skolan |
+------------------+
| larare           |
+------------------+
1 row in set (0.00 sec)
```

Jag kan se innehållet i tabellen med SELECT via `SELECT * FROM larare`. Än så länge är tabellen tom.

```sql
mysql> SELECT * FROM larare;
Empty set (0.01 sec)
```

Slå upp syntaxen för `CREATE TABLE` i refmanualen, skumma igenom den för att se varianter som finns för att skapa en tabell. Gör samma sak för `DROP TABLE`. Använd sökfunktionen för att hitta det du letar efter eller navigera via innehållsförteckningen, eller googla "mariadb drop table".

> *Kom ihåg vem som är din bästa vän -- referensmanualen.*

Innan du avslutar, dubbelkolla att du kan köra hela filen i en sekvens. Antingen markerar du all kod i Workbench och kör den, eller så kör du hela filen via terminalen.

Så här kan du köra via terminalen.

```text
mariadb --table skolan < ddl-larare.sql
```

Ovan kommando tar alla SQL-kommandon från filen och exekverar dem mot databasen skolan.
