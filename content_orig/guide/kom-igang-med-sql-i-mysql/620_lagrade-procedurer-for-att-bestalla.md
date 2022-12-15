---
author: mos
revision:
    "2018-01-20": "(A, mos) Första utgåvan."
...
Lagrade procedurer för att beställa
==================================

Du skall jobba som programansvarig och beställa nya programtillfällen. För varje programtillfälle skall du beställa kurstillfällen. För att göra detta så skall du utveckla lagrade procedurer som du kan jobba med.



Beställ ny antagning till program {#anta}
----------------------------------

Skapa en lagrad procedur som beställer en ny antagning till programmet.

Döp proceduren till `nyProgramAntagning` och låt den ta två argument, programkoden och årtalet för antagningen.

När du är klar så använder du den lagrade proceduren för att skapa två programtillfällen till dig och två till Snape, enligt följande.

```text
CALL nyProgramAntagning('SNÄLL', "2027");
CALL nyProgramAntagning('SNÄLL', "2028");
CALL nyProgramAntagning('LURIG', "2027");
CALL nyProgramAntagning('LURIG', "2028");
```

När du är klar bör tabellen `programtillfalle2` se ut så här.

```text
mysql> SELECT * FROM programtillfalle2;
+------------+-----------+---------+
| kod        | antagning | program |
+------------+-----------+---------+
| LURIG2027  | 2027      | LURIG   |
| LURIG2028  | 2028      | LURIG   |
| SNÄLL2027  | 2027      | SNÄLL   |
| SNÄLL2028  | 2028      | SNÄLL   |
+------------+-----------+---------+
4 rows in set (0.00 sec)
```

Som du ser så har varje programtillfälle en egen kod som består av programmets kod och året för antagningen, `SNÄLL2028` är koden för det programtillfälle som ges 2028. Detta, varianten på den primära nyckeln, är en konstruktion som passar i sammanhanget. Det finns alternativ om man gräver ned sig i olika möjligheter. Jag valde att göra så här, så kör vidare på min variant. Det blir då enkelt att koppla ett kurstillfälle till ett programtillfälle och det blir enkelt att referera till ett specifikt programtillfälle.



Rapport för programtillfällen {#programinfo}
----------------------------------

Du kan nu skapa en rapport som visar all information om programmen och dess programtillfällen, tillsammans med detaljer om den som är programansvarig.

```text
+----------------------------------+-----------+------------+---------+-----------+
| namn                             | antagning | kod        | fornamn | efternamn |
+----------------------------------+-----------+------------+---------+-----------+
| Det luriga trollkarlsprogrammet  | 2027      | LURIG2027  | Mikael  | Roos      |
| Det luriga trollkarlsprogrammet  | 2028      | LURIG2028  | Mikael  | Roos      |
| Det snälla trollkarlsprogrammet  | 2027      | SNÄLL2027  | Severus | Snape     |
| Det snälla trollkarlsprogrammet  | 2028      | SNÄLL2028  | Severus | Snape     |
+----------------------------------+-----------+------------+---------+-----------+
```

Ditt namn bör visas istället för mitt namn.



Beställ kurstillfälle till programtillfälle {#kt}
----------------------------------

Som programansvarig behöver du beställa kurser till till ditt program. Du skapar en lagrad procedur `nyKurstillfalle` som hjälper dig. Proceduren tar argument för programtillfälle, kurskod och läsperiod.

Din lagrade procedur skall sätta status i kurstillfället till "Beställd" och den kursansvarige kan vara NULL.

Det är Albus, rektorn, som vid ett senare tillfälle, godkänner kurstillfället och tillsätter den som blir kursansvarig.

När du är klar så beställer du kurser till Snape enligt följande. Uppdatera om du jobbar annorlunda med dina argument till den lagrade proceduren.

```text
CALL nyKursbestallning('SNÄLL2028', 'KVA101', 1);
CALL nyKursbestallning('SNÄLL2028', 'DRY101', 2);
CALL nyKursbestallning('SNÄLL2028', 'SVT101', 3);
CALL nyKursbestallning('SNÄLL2028', 'VAN101', 4);
```

När du tittar i tabellen kurstillfalle2 så kan det se ut så här.

```text
mysql> SELECT kurskod, lasperiod, status, created
    -> FROM kurstillfalle2
    -> WHERE programtillfalle = 'SNÄLL2028';
+---------+-----------+-----------+---------------------+
| kurskod | lasperiod | status    | created             |
+---------+-----------+-----------+---------------------+
| KVA101  |         1 | Beställd  | 2018-02-19 17:03:12 |
| DRY101  |         2 | Beställd  | 2018-02-19 17:03:12 |
| SVT101  |         3 | Beställd  | 2018-02-19 17:03:12 |
| VAN101  |         4 | Beställd  | 2018-02-19 17:03:12 |
+---------+-----------+-----------+---------------------+
4 rows in set (0.00 sec)
```

Gör sedan din egen beställning som programansvarig för dina egna programtillfällen. Beställ fyra kurser, en i varje läsperiod, för båda dina programtillfällen.



Godkänd kurstillfälle och ange kursansvarig {#ka}
----------------------------------

Albus vill nu godkänna kursbeställningar och ange vem som blir kursansvarig för respektive kurstillfälle.

Du hjälper honom genom att skapa en lagrad procedur `godkannKurstillfalle` som tar argumenten id (för kurstillfället) och kursansvarig (akronym för läraren).

Använd proceduren för att godkänna alla beställda kurstillfällen som ligger i läsperiod 1 och 2. Avvakta med de andra.

När du är klar kan det se ut så här för Snapes programtillfällen där två kurstillfällen är godkända. Det ser ut som det är mos som är kursansvarig för de båda kurstillfällena på Snapes program.

```text
mysql> SELECT kurskod, kursansvarig, lasperiod, status, created, updated
    -> FROM kurstillfalle2
    ->     WHERE programtillfalle = 'SNÄLL2028';
+---------+--------------+-----------+-----------+---------------------+---------------------+
| kurskod | kursansvarig | lasperiod | status    | created             | updated             |
+---------+--------------+-----------+-----------+---------------------+---------------------+
| KVA101  | mos          |         1 | Godkänd   | 2018-02-19 17:25:35 | 2018-02-19 17:25:35 |
| DRY101  | mos          |         2 | Godkänd   | 2018-02-19 17:25:35 | 2018-02-19 17:25:35 |
| SVT101  | NULL         |         3 | Beställd  | 2018-02-19 17:25:35 | 0000-00-00 00:00:00 |
| VAN101  | NULL         |         4 | Beställd  | 2018-02-19 17:25:35 | 0000-00-00 00:00:00 |
+---------+--------------+-----------+-----------+---------------------+---------------------+
4 rows in set (0.00 sec)
```

Det bör se ut ungefär motsvarande för dina egna programtillfällen och programkurser.
