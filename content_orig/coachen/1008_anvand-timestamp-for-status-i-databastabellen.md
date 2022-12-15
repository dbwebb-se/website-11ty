---
author:
    - mos
category:
    - mysql
    - sql
    - kursen databas
revision:
    "2022-02-17": "(B, mos) Uppdaterad bort med DEFAULT NULL och fungerar både på MySQL och MariaDB."
    "2019-03-20": "(A, mos) Första versionen"
...
Använd TIMESTAMP för status i databastabellen
==================================

Vi tar en databastabell för användare och vi vill veta när användaren skapades, senast uppdaterades, om användaren är aktiv och om användaren är raderad (soft-deleted). Det är vanlig status som kan påverka hur en användare skall hanteras.

Låt oss se hur vi kan hantera detta med tidsstämplar i tabellen.

<!--more-->



Förutsättning {#pre}
-----------------------------------

Vi använder MySQL 8.0.

Artikeln är även testad på MariaDB 10.6.5.



En tabell för user {#ddl}
-----------------------------------

SQL för att skapa tabellen inklusive tidsstämplarna kan se ut så här.

```sql
DROP TABLE IF EXISTS user;
CREATE TABLE user (
    `acronym` CHAR(5) PRIMARY KEY,
    `name` VARCHAR(20),
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    `activated` TIMESTAMP NULL,
    `deleted` TIMESTAMP NULL
);
```

Alla tidsstämplarna är av datatypen TIMESTAMP.

Kolumnen `created` har defaultvärdet av CURRENT_TIMESTAMP som ger nuvarande tid.

Öriga tidsstämplar har (DEFAULT) NULL så de får ett NULL värde som initialt värde.

Kolumnen `updated` har konstruktionen `ON UPDATE CURRENT_TIMESTAMP` som ger ett nytt värde varje gång som något värde i raden uppdateras.

När man testar om en tidsstämpel är satt, eller inte, så kan man använda konstruktionen `IS NULL` och `IS NOT NULL`.



Lägg till nya användare (created) {#insert}
-----------------------------------

Jag lägger till ett par användare så vi har något att leka med.

```sql
INSERT INTO user
    (`acronym`, `name`)
VALUES
    ('doe', 'John/Jane Doe'),
    ('mos', 'MegaMos'),
    ('mum', 'Mumintrollet')
;
```

Så här ser det ut i tabellen när allt är klart.

```text
mysql> SELECT * FROM user;
+---------+---------------+---------------------+---------+-----------+---------+
| acronym | name          | created             | updated | activated | deleted |
+---------+---------------+---------------------+---------+-----------+---------+
| doe     | John/Jane Doe | 2019-03-20 09:49:44 | NULL    | NULL      | NULL    |
| mos     | MegaMos       | 2019-03-20 09:49:44 | NULL    | NULL      | NULL    |
| mum     | Mumintrollet  | 2019-03-20 09:49:44 | NULL    | NULL      | NULL    |
+---------+---------------+---------------------+---------+-----------+---------+
3 rows in set (0.00 sec)
```


Uppdatera rad (updated) {#update}
-----------------------------------

Om vi uppdaterar en rad i tabellen så kommer tidsstämpeln för `updated` att sättas till ett defaultvärde motsvarande tiden för uppdateringen.

```sql
UPDATE `user`
SET
    `name` = 'Mega Mos'
WHERE
    `acronym` = 'mos'
;
```

Så här ser det ut när uppdateringen är gjord.

```text
mysql> SELECT * FROM user;
+---------+---------------+---------------------+---------------------+-----------+---------+
| acronym | name          | created             | updated             | activated | deleted |
+---------+---------------+---------------------+---------------------+-----------+---------+
| doe     | John/Jane Doe | 2019-03-20 09:49:44 | NULL                | NULL      | NULL    |
| mos     | Mega Mos      | 2019-03-20 09:49:44 | 2019-03-20 09:50:08 | NULL      | NULL    |
| mum     | Mumintrollet  | 2019-03-20 09:49:44 | NULL                | NULL      | NULL    |
+---------+---------------+---------------------+---------------------+-----------+---------+
3 rows in set (0.00 sec)
```

När man har dessa tidsstämplar så kan man göra rapporter som visuellt visar status på användarna. Låt oss göra ett exempel som skriver ut om användaren är skapad och om den är uppdaterad.

```sql
SELECT
    CONCAT(`name`, ' (', `acronym`, ')') AS User,
    IF(`created` IS NOT NULL, 'Created', '') AS Created,
    IF(`updated` IS NOT NULL, 'Updated', '') AS Updated
FROM user
;
```

Så här ser rapporten ut.

```text
mysql> SELECT
    ->     CONCAT(name, ' (', acronym, ')') AS User,
    ->     IF(created IS NOT NULL, 'Created', '') AS Created,
    ->     IF(updated IS NOT NULL, 'Updated', '') AS Updated
    -> FROM user
    -> ;
+---------------------+---------+---------+
| User                | Created | Updated |
+---------------------+---------+---------+
| John/Jane Doe (doe) | Created |         |
| Mega Mos (mos)      | Created | Updated |
| Mumintrollet (mum)  | Created |         |
+---------------------+---------+---------+
3 rows in set (0.00 sec)
```


Aktivera användaren (activated) {#activate}
-----------------------------------

Säg att vi har användare som är aktiverade och inte aktiverade. Kanske beror aktiveringen av att användaren skall verifiera att dens epostadress är korrekt eller så är användarna förskapade och de blir inte aktiva förrän första gången som användaren loggar in på systemet. Kanske vill man också ha möjligheten att städa bort användare och göra dem inaktiva om de inte använder systemet under en längre tid, eller kanske missbrukat systemet så de blivit avstängda.

Det finns alltså flera anledningar till varför man vill ha möjligheten att påverka om användaren är aktiverad eller inte.

För att aktivera en användare så sätter man tidsstämpeln till den tidpunkt på användaren är aktiverad.

```sql
UPDATE `user`
SET
    `activated` = CURRENT_TIMESTAMP
WHERE
    `acronym` = 'mos'
;
```

Så här ser det ut nu.

```sql
SELECT
    CONCAT(`name`, ' (', `acronym`, ')') AS User,
    `updated`,
    `activated`,
    `deleted`
FROM user
;
```

```text
mysql> SELECT
    ->     CONCAT(name, ' (', acronym, ')') AS User,
    ->     updated,
    ->     activated,
    ->     deleted
    -> FROM user
    -> ;
+---------------------+---------------------+---------------------+---------+
| User                | updated             | activated           | deleted |
+---------------------+---------------------+---------------------+---------+
| John/Jane Doe (doe) | NULL                | NULL                | NULL    |
| Mega Mos (mos)      | 2019-03-20 09:50:45 | 2019-03-20 09:50:45 | NULL    |
| Mumintrollet (mum)  | NULL                | NULL                | NULL    |
+---------------------+---------------------+---------------------+---------+
3 rows in set (0.00 sec)
```

Vi kan uppdatera vår status rapport på följande sätt.

```sql
SELECT
    CONCAT(`name`, ' (', `acronym`, ')') AS User,
    IF(`created` IS NOT NULL, 'Created', '') AS Created,
    IF(`updated` IS NOT NULL, 'Updated', '') AS Updated,
    IF(`activated` IS NOT NULL, 'Activated', '') AS Activated
FROM `user`
;
```

Resultatet blir nu så här.

```text
mysql> SELECT
    ->     CONCAT(name, ' (', acronym, ')') AS User,
    ->     IF(created IS NOT NULL, 'Created', '') AS Created,
    ->     IF(updated IS NOT NULL, 'Updated', '') AS Updated,
    ->     IF(activated IS NOT NULL, 'Activated', '') AS Activated
    -> FROM user
    -> ;
+---------------------+---------+---------+-----------+
| User                | Created | Updated | Activated |
+---------------------+---------+---------+-----------+
| John/Jane Doe (doe) | Created |         |           |
| Mega Mos (mos)      | Created | Updated | Activated |
| Mumintrollet (mum)  | Created |         |           |
+---------------------+---------+---------+-----------+
3 rows in set (0.00 sec)
```



Radera användaren (deleted) {#deleted}
-----------------------------------

På liknande sätt som vi använder `activated` så kan vi använda `deleted` till att åstadkomma en _soft delete_ av en användare. Vi vill radera användaren, men inte med DELETE, så vi sätter en tidsstämpel som säger att användaren är raderad per aktuell tidsstämpel.

Ibland vill man att databasen skall behålla sin historik. Säg att det är ett forum där användaren har gjort en massa inlägg men vill radera sitt konto. Här ställer man sig frågan om man då verkligen vill radera användaren rent fysiskt från databasen med `DELETE`, eller om man bara vill betrakta användaren som raderad.

Vi kan radera användaren "doe" genom att sätta tidsstämpeln på kolumnen `deleted`.

```sql
UPDATE `user`
SET
    `deleted` = CURRENT_TIMESTAMP
WHERE
    `acronym` = 'doe'
;
```

Så här ser det ut nu i tabellen, med de aktuella kolumnernas värde.

```sql
SELECT
    CONCAT(`name`, ' (', `acronym`, ')') AS User,
    `updated`,
    `activated`,
    `deleted`
FROM `user`
;
```

```text
mysql> SELECT
    ->     CONCAT(name, ' (', acronym, ')') AS User,
    ->     updated,
    ->     activated,
    ->     deleted
    -> FROM user
    -> ;
+---------------------+---------------------+---------------------+---------------------+
| User                | updated             | activated           | deleted             |
+---------------------+---------------------+---------------------+---------------------+
| John/Jane Doe (doe) | 2019-03-20 10:00:54 | NULL                | 2019-03-20 10:00:54 |
| Mega Mos (mos)      | 2019-03-20 10:00:28 | 2019-03-20 10:00:28 | NULL                |
| Mumintrollet (mum)  | NULL                | NULL                | NULL                |
+---------------------+---------------------+---------------------+---------------------+
3 rows in set (0.00 sec)
```

Vi kan uppdatera vår status rapport på följande sätt.

```sql
SELECT
    CONCAT(`name`, ' (', `acronym`, ')') AS User,
    IF(`created` IS NOT NULL, 'Created', '') AS Created,
    IF(`updated` IS NOT NULL, 'Updated', '') AS Updated,
    IF(`activated` IS NOT NULL, 'Activated', '') AS Activated,
    IF(`deleted` IS NOT NULL, 'Deleted', '') AS Deleted
FROM `user`
;
```

Resultatet blir nu så här.

```text
mysql> SELECT
    ->     CONCAT(name, ' (', acronym, ')') AS User,
    ->     IF(created IS NOT NULL, 'Created', '') AS Created,
    ->     IF(updated IS NOT NULL, 'Updated', '') AS Updated,
    ->     IF(activated IS NOT NULL, 'Activated', '') AS Activated,
    ->     IF(deleted IS NOT NULL, 'Deleted', '') AS Deleted
    -> FROM user
    -> ;
+---------------------+---------+---------+-----------+---------+
| User                | Created | Updated | Activated | Deleted |
+---------------------+---------+---------+-----------+---------+
| John/Jane Doe (doe) | Created | Updated |           | Deleted |
| Mega Mos (mos)      | Created | Updated | Activated |         |
| Mumintrollet (mum)  | Created |         |           |         |
+---------------------+---------+---------+-----------+---------+
3 rows in set (0.00 sec)
```

Vi har nu "mum" så är skapad, men inte uppdaterat, vi har "mos" som är aktiverad och vi har "doe" som är raderad. Det är ofta någon av statusarna som är viktigare än de andra, här är troligen `deleted` mest viktig, följt av `activated`.



Avslutningsvis {#avslutning}
-----------------------------------------

Du har fått ett exempel på hur man kan använda tidsstämplar i en databastabell för att införa status på raderna i tabellen. Baserat på tidsstämpeln kan man betrakta raden som att den har olika "status" som påverkar hur raden används i andra sammanhang i applikationerna.

Källkoden till detta exempel ligger i kursrepot databas under [`example/sql/user_timestamp.sql`](https://github.com/dbwebb-se/databas/blob/master/example/sql/user_timestamp.sql).
