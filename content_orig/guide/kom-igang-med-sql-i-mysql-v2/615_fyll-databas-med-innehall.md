---
author: mos
revision:
    "2018-01-20": "(A, mos) Första utgåvan."
...
Fyll databas med innehåll
==================================

Du skall lägga till grunddata i tabellerna.



Lägg till lärare och kurser {#larare}
----------------------------------

Du skall lägga till rader i tabellerna larare2 och kurs2.

Lägg till de lärare och kurser du haft tidigare.

Lägg till dig själv som lärare.



Lägg till program {#program}
----------------------------------

Skapa två program, dvs lägg till två rader i programtabellen program2. Det ena programmet heter "Det snälla trollkarlsprogrammet" med programkoden "SNÄLL" och snape som programanasvarig. Det andra är du programansvarig för och det har programkoden "LURIG" och heter "Det luriga trollkarlsprogrammet".

Så här kan det se ut i tabellen program2 när du är klar, om man bortser från att du troligen inte heter _mos_.

```text
mysql> SELECT * FROM program2;
+--------+----------------------------------+----------+
| kod    | namn                             | ansvarig |
+--------+----------------------------------+----------+
| LURIG  | Det luriga trollkarlsprogrammet  | mos      |
| SNÄLL  | Det snälla trollkarlsprogrammet  | sna      |
+--------+----------------------------------+----------+
2 rows in set (0.00 sec)
```
