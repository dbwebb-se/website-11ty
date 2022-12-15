---
author: mos
revision:
    "2018-01-20": "(A, mos) Första utgåvan."
...
Skapa index för att optimera databasen
==================================

Rektorn vill ha en snabb databas. Han tycker att det går lite långsamt att söka i databasen.

Albus har gett dig ett antal sökningar som han vill att du optimerar (med hjälp av index).

Albus är inte förtjust i table scans.



Startläge {#start}
----------------------------------

Du analyserar startläget vilket ser ut ungefär så här.

```text
mysql> EXPLAIN larare2;
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| akronym   | char(3)     | NO   | PRI |         |       |
| avdelning | char(4)     | YES  |     | NULL    |       |
| fornamn   | varchar(20) | YES  |     | NULL    |       |
| efternamn | varchar(20) | YES  |     | NULL    |       |
| kon       | char(1)     | YES  |     | NULL    |       |
| lon       | int(11)     | YES  |     | NULL    |       |
| fodd      | date        | YES  |     | NULL    |       |
+-----------+-------------+------+-----+---------+-------+
7 rows in set (0.00 sec)
```

Du tittar även vilka index som finns.

```text
mysql> SHOW INDEX FROM larare2;
+---------+------------+-------------+--------------+-------------+-----------+-------------+----------+--------+------+------------+---------+---------------+
| Table   | Non_unique | Key_name    | Seq_in_index | Column_name | Collation | Cardinality | Sub_part | Packed | Null | Index_type | Comment | Index_comment |
+---------+------------+-------------+--------------+-------------+-----------+-------------+----------+--------+------+------------+---------+---------------+
| larare2 |          0 | PRIMARY     |            1 | akronym     | A         |           9 |     NULL | NULL   |      | BTREE      |         |               |
+---------+------------+-------------+--------------+-------------+-----------+-------------+----------+--------+------+------------+---------+---------------+
```

Då jobbar du med de optimeringar som Albus vill se. Kom ihåg, undvik table scans genom att analysera frågorna med `EXPLAIN` och skapa index med `CREATE INDEX` där det behövs.



Sök på lärarens akronym {#akro}
----------------------------------

```sql
SELECT * FROM larare2 WHERE akronym = "dum";
```

Verifera om index behövs eller inte.



Sök på lärarens namn {#namn}
----------------------------------

```sql
SELECT * FROM larare2 WHERE fornamn = "Albus";
SELECT * FROM larare2 WHERE efternamn LIKE "Dum%";
```

Verifera om index behövs eller inte.



Gruppera data per avdelning {#avd}
----------------------------------

```sql
SELECT
    avdelning, COUNT(akronym)
FROM larare2
WHERE avdelning LIKE "D%"
GROUP BY avdelning;
```

Verifera om index behövs eller inte.



Urval baserat på datum {#datum}
----------------------------------

```sql
SELECT * FROM larare2 WHERE fodd = "1970-01-01";
SELECT * FROM larare2 WHERE (fodd BETWEEN "1970-01-01" AND "1990-01-01");
```

Verifera om index behövs eller inte.



Resultatet {#res}
----------------------------------

När jag själv jobbade igenom uppgiften blev mitt slutliga resultat så här.

```text
mysql> EXPLAIN larare2;
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| akronym   | char(3)     | NO   | PRI |         |       |
| avdelning | char(4)     | YES  | MUL | NULL    |       |
| fornamn   | varchar(20) | YES  | MUL | NULL    |       |
| efternamn | varchar(20) | YES  | MUL | NULL    |       |
| kon       | char(1)     | YES  |     | NULL    |       |
| lon       | int(11)     | YES  |     | NULL    |       |
| fodd      | date        | YES  | MUL | NULL    |       |
+-----------+-------------+------+-----+---------+-------+
7 rows in set (0.00 sec)
```

Det blev ett antal index som behövdes för att undvika table scans.

```text
mysql> SHOW INDEX FROM larare2;
+---------+------------+-------------+--------------+-------------+-----------+-------------+----------+--------+------+------------+---------+---------------+
| Table   | Non_unique | Key_name    | Seq_in_index | Column_name | Collation | Cardinality | Sub_part | Packed | Null | Index_type | Comment | Index_comment |
+---------+------------+-------------+--------------+-------------+-----------+-------------+----------+--------+------+------------+---------+---------------+
| larare2 |          0 | PRIMARY     |            1 | akronym     | A         |           9 |     NULL | NULL   |      | BTREE      |         |               |
| larare2 |          1 | i_fornamn   |            1 | fornamn     | A         |           9 |     NULL | NULL   | YES  | BTREE      |         |               |
| larare2 |          1 | i_efternamn |            1 | efternamn   | A         |           9 |     NULL | NULL   | YES  | BTREE      |         |               |
| larare2 |          1 | i_avdelning |            1 | avdelning   | A         |           9 |     NULL | NULL   | YES  | BTREE      |         |               |
| larare2 |          1 | i_fodd      |            1 | fodd        | A         |           9 |     NULL | NULL   | YES  | BTREE      |         |               |
+---------+------------+-------------+--------------+-------------+-----------+-------------+----------+--------+------+------------+---------+---------------+
5 rows in set (0.00 sec)
```

Du kan dubbelkolla din slutliga SQL för att göra CREATE TABLE, och jämföra mot min.

```text
mysql> SHOW CREATE TABLE larare2 \G;
*************************** 1. row ***************************
       Table: larare2
Create Table: CREATE TABLE `larare2` (
    `akronym` char(3) NOT NULL DEFAULT '',
    `avdelning` char(4) DEFAULT NULL,
    `fornamn` varchar(20) DEFAULT NULL,
    `efternamn` varchar(20) DEFAULT NULL,
    `kon` char(1) DEFAULT NULL,
    `lon` int(11) DEFAULT NULL,
    `fodd` date DEFAULT NULL,
    PRIMARY KEY (`akronym`),
    KEY `i_fornamn` (`fornamn`),
    KEY `i_efternamn` (`efternamn`),
    KEY `i_avdelning` (`avdelning`),
    KEY `i_fodd` (`fodd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
1 row in set (0.00 sec)
```

Enklast är att skapa index när man skapar tabellen. Det ger en bra översikt över tabellen och fungerar som en dokumentation.

Sedan är det naturligt att jobba med databasen när den är i drift och lever sitt liv, då kan man se om fler/andra index behövs. Vilka index som behövs beror till stor del på vilka frågor som görs mot databasen, hur den används. Vissa index kan man skapa från början, andra får man ta efterhand som behov uppkommer.
