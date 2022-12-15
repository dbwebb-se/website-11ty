---
author: mos
revision:
    "2019-01-30": "(B, mos) Genomgången och ny uppgift om subqueries."
    "2018-01-03": "(A, mos) Första versionen, uppdelad av större dokument."
...
Subquery, en fråga i fråga
==================================

En subquery är en fråga inuti en annan fråga. En SELECT inuti en SELECT.

Att använda subqueries i en fråga kan vara ett alternativ till att göra JOIN och UNION för att slå samman information. När vi skriver vår SQL finns det ofta alternativa sätt att lösa uppgiften.

Låt oss träna på subqueries och se vad de kan hjälpa oss med.

Spara den SQL-kod du skriver i filen `dml_subquery.sql`.

I manualen kan vi läsa om [konceptet subquery och dess syntax](https://dev.mysql.com/doc/refman/8.0/en/subqueries.html) och vilka möjligheter som erbjuds.



Struktur på subquery {#struktur}
----------------------------------

Grunden är en fråga i en fråga. Paranteser används för att avgränsa en subquery. Så här.

```sql
mysql> SELECT (SELECT 'moped') AS 'Fordon';
+--------+
| Fordon |
+--------+
| moped  |
+--------+
1 row in set (0.00 sec)
```

Låt oss ta ett litet större exempel. Vi har tabellen för kurstillfällen och vi vill se alla kurstillfällen som hålls av en lärare på avdelningen DIDD.

Låt oss ta det stegvis. Först skriver vi satsen som ger oss alla lärare på avdelningen DIDD.

```sql
SELECT
    akronym 
FROM larare
WHERE
    avdelning = 'DIDD'
;
```

Sedan tar vi satsen som ger oss alla kurstillfällen.

```sql
SELECT
    *
FROM kurstillfalle
;
```

Nu slår vi samman dessa satser till en, där den ena blir en subquery som används i WHERE-villkoret.

```sql
SELECT
    *
FROM kurstillfalle
WHERE
    kursansvarig IN (
        SELECT
            akronym 
        FROM larare
        WHERE
            avdelning = 'DIDD'
    )
;
```

Vi har här en fråga som hämtar och använder resultatet från en annan fråga, via en subquery.

Resultatet kan se ut så här.

```text
mysql> SELECT
    ->     *
    -> FROM kurstillfalle
    -> WHERE
    ->     kursansvarig IN (
    ->         SELECT
    ->             akronym 
    ->         FROM larare
    ->         WHERE
    ->             avdelning = 'DIDD'
    ->     )
    -> ;
+----+---------+--------------+-----------+
| id | kurskod | kursansvarig | lasperiod |
+----+---------+--------------+-----------+
|  6 | KVA101  | hoc          |         1 |
| 10 | MUG101  | min          |         4 |
+----+---------+--------------+-----------+
2 rows in set (0.00 sec)
```

I detta fallet går det att skriva om SELECT-satsen till en JOIN, så är det ofta, man kan lösa frågorna med olika tekniker. Välj den teknik som du känner dig bekväm med och inse att det kan vara okey att lösa en sak på olika sätt.



Subqueries med UNION {#union}
----------------------------------

En annan variant där man kan jobba med subqueries är när man vill göra UNION på två olika resultset. Jag kallar resultatet från en SELECT för resultset.

Tänk hur följande fråga kan se ut.

```sql
(
    SELECT akronym, avdelning FROM larare WHERE avdelning = 'DIDD'
)
UNION
(
    SELECT akronym, avdelning FROM larare WHERE avdelning = 'DIPT'
)
;
```

Konstruktionen är två subqueries som görs UNION på.

Du kan säkert se hur frågan ovan borde kunna förenklas till en enda SELECT-sats med ett WHERE direktiv. Men ovan ger alltså samma svar och visar hur subqueries kan användas.

När man kör konstruktionen ovan kan det se ut så här.

```text
mysql> (
    ->     SELECT akronym, avdelning FROM larare WHERE avdelning = 'DIDD'
    -> )
    -> UNION
    -> (
    ->     SELECT akronym, avdelning FROM larare WHERE avdelning = 'DIPT'
    -> )
    -> ;
+---------+-----------+
| akronym | avdelning |
+---------+-----------+
| hoc     | DIDD      |
| min     | DIDD      |
| ala     | DIPT      |
| gyl     | DIPT      |
| sna     | DIPT      |
+---------+-----------+
5 rows in set (0.00 sec)
```

En subquery handlar om att omringa an fråga med paranteser och ta hand om resultatet.



Uppgift subquery {#uppgift}
----------------------------------

För att öva på subqueries så löser du följande uppgift.

* Visa detaljer om den lärare som är äldst. Ta fram max ålder med en subquery och använd dess resultat i WHERE-satsen.

Ditt svar kan se ut ungefär så här.

```text
mysql> SELECT
    ->     akronym,
    ->     fornamn,
    ->     efternamn,
    ->     Ålder
    -> FROM v_larare
    -> WHERE
    ->     Ålder = (... här skriver du din subquery ...)
    -> ;
+---------+---------+------------+--------+
| akronym | fornamn | efternamn  | Ålder  |
+---------+---------+------------+--------+
| dum     | Albus   | Dumbledore |     77 |
+---------+---------+------------+--------+
1 row in set (0.00 sec)
```



Kontrollera filen {#filen}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra samtliga SQL-satser, i en och samma sekvens, i filen du jobbar i.
