---
author: mos
revision:
    "2022-01-04": "(E, mos) Genomgången inför v2 och MariaDB."
    "2020-01-28": "(E, nik) La till notis om 'GROUP BY clause and contains nonaggregated column'"
    "2019-02-07": "(D, mos) Uppdaterade rubriker för sista uppgiften."
    "2019-02-01": "(C, mos) Genomgången efter feedback från studenter."
    "2019-01-15": "(B, mos) Uppdelad i två delar då HAVING fick mer material."
    "2017-12-28": "(A, mos) Första versionen, uppdelad av större dokument."
...
Aggregerande funktioner
==================================

Vi jobbar med inbyggda aggregerande funktioner som kan beräkna värdet över många rader.

Spara dina konstruktioner i filen `dml-agg.sql`.



Om aggregerande funktioner {#om}
----------------------------------

Vi kan se vilken lärare som har högst och  minst lön. För att göra det behöver vi gå igenom alla rader i tabellen och se vilken rad som innehåller det minsta respektive det högsta värdet.

Med aggregerande funktioner kan vi lösa detta. Du har tidigare summerat lönesumman med den aggregerande funktionen `SUM()` som summerar lönesumman för alla rader.

```sql
mysql> SELECT SUM(lon) FROM larare;
+----------+
| SUM(lon) |
+----------+
|   330242 |
+----------+
```

Du kan läsa om [aggregerande funktioner i manualen](https://mariadb.com/kb/en/group-by/).



Uppgifter MIN och MAX {#minmax}
----------------------------------

Använd nu `MIN()` och `MAX()` för att besvara följande.

1. Hur mycket är den högsta lönen som en lärare har?
2. Hur mycket är den lägsta lönen som en lärare har?



Om GROUP BY {#omgroupby}
----------------------------------

När man använder aggregerande funktioner så arbetar de på samtliga rader. Vi kan till exempel räkna ut medelkompetensen på skolan.

```sql
mysql> SELECT AVG(kompetens) FROM larare;
+----------------+
| AVG(kompetens) |
+----------------+
|         2.3750 |
+----------------+
```

Men, om vi vill se kompetensen per avdelning, så behöver vi gruppera den aggregerande funktionen per avdelning. Det gör vi med GROUP BY.

```sql
SELECT
    avdelning,
    AVG(kompetens)
FROM larare
GROUP BY avdelning
;
```

Det kan då se ut så här.

```text
mysql> SELECT
    ->     avdelning,
    ->     AVG(kompetens)
    -> FROM larare
    -> GROUP BY avdelning
    -> ;
+-----------+----------------+
| avdelning | AVG(kompetens) |
+-----------+----------------+
| DIPT      |         1.3333 |
| ADM       |         4.0000 |
| DIDD      |         1.5000 |
+-----------+----------------+
```

Nu ser vi medelkompetensen per avdelning och kan till exempel se vilken avdelning där vi främst behöver höja kompetensen.

Man kan också gruppera per flera kolumner, till exempel per avdelning och per kompetens. Vi kan se hur lönen ser ut om vi grupperar både per avdelning och per kompetens.

```sql
SELECT avdelning, kompetens, SUM(lon) as Summa
FROM larare
GROUP BY avdelning, kompetens
ORDER BY Summa DESC
;
```

Det ser ut så här när vi kör det.

```text
MySQL [skolan]> SELECT avdelning, kompetens, SUM(lon) as Summa
    -> FROM larare
    -> GROUP BY avdelning, kompetens
    -> ORDER BY Summa DESC
    -> ;
+-----------+-----------+-------+
| avdelning | kompetens | Summa |
+-----------+-----------+-------+
| ADM       |         7 | 85000 |
| DIPT      |         1 | 55188 |
| DIDD      |         2 | 49880 |
| DIPT      |         2 | 45000 |
| DIDD      |         1 | 37580 |
| ADM       |         2 | 30000 |
| ADM       |         3 | 27594 |
+-----------+-----------+-------+
7 rows in set (0.00 sec)
```



Uppgifter GROUP BY {#groupby}
----------------------------------

Använd de inbyggda aggregerande funktionerna `SUM()`, `COUNT()`, och `AVG()` tillsammans med `GROUP BY`, för att räkna ut  följande:

1. Hur många lärare jobbar på de respektive avdelning?
2. Hur mycket betalar respektive avdelning ut i lön varje månad?
3. Hur mycket är medellönen för de olika avdelningarna?
3. Hur mycket är medellönen för kvinnor kontra män?

Aggregerande betyder att de räknar samman värden baserat på många rader i tabellen. Dubbelkolla alltid mot din värdemängd, innehållet i tabellerna, om dina svar känns rimliga.

<!--

Troligen MySQL specifikt.

[INFO]

Följande felmeddelande kan uppstå:

> Expression #2 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'skolan.larare.lon' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by

Se följande forumtråd för mer information: [GROUP BY clause and contains nonaggregated column](https://dbwebb.se/forum/viewtopic.php?f=13&t=8909)

[/INFO]
-->

Gör nu följande rapport.

1. Visa snittet på kompetensen för alla avdelningar, sortera på kompetens i sjunkande ordning och visa enbart den avdelning som har högst kompetens.

Ditt svar kan se ut så här.

```sql
+-----------+-----------+
| avdelning | Kompetens |
+-----------+-----------+
| ADM       |    4.0000 |
+-----------+-----------+
```

Gör ytterligare en rapport.

1. Visa den avrundade snittlönen (`ROUND()`) grupperad per avdelning och per kompetens, sortera enligt avdelning och snittlön. Visa även hur många som matchar i respektive gruppering. Ditt svar skall se ut så här.

```sql
+-----------+-----------+----------+----------+
| Avdelning | Kompetens | Snittlon | Antal    |
+-----------+-----------+----------+----------+
| ADM       |         3 |    27594 |        1 |
| ADM       |         2 |    30000 |        1 |
| ADM       |         7 |    85000 |        1 |
| DIDD      |         1 |    37580 |        1 |
| DIDD      |         2 |    49880 |        1 |
| DIPT      |         1 |    27594 |        2 |
| DIPT      |         2 |    45000 |        1 |
+-----------+-----------+----------+----------+
7 rows in set (0.00 sec)
```

Enligt utskriften ovan är det bara raden DIPT kompetens 1 som har fler än en lärare. I alla andra grupperingar finns endast en lärare.



Kontrollera filen {#filen}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra samtliga SQL-satser, i en och samma sekvens, i filen du jobbar i.
