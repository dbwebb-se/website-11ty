---
author: mos
revision:
    "2018-01-20": "(A, mos) Första utgåvan."
...
Triggers för att logga
==================================

Du tycker att databasen växer och du vill införa en loggningstabell som visar när kursbeställningar görs och när de godkänns. Du väljer att skapa triggers som loggar till loggtabellen.



Tabell för loggar {#logg}
----------------------------------

Skapa en tabell som samlar loggar med detaljer om när en kursbeställning görs och när den senare godkänns.



Trigger för att logga kursbeställningar {#bestall}
----------------------------------

Skapa en trigger som loggar varje gång en ny beställning sker av ett kurstillfälle.

Skapa en ny trigger som loggar varje gång en kursbeställning godkänns.



Kontrollera trigger mot loggen {#loggkoll}
----------------------------------

Du kan nu kontrollera att triggern fungerar genom att köra all SQL-kod från `program_ddl.sql` följt av `program_insert.sql`.

Du bör se att de kurstillfällen som är beställda och godkända nu även återfinns i loggen.

```text
mysql> SELECT * FROM logg2;
+----+------------------+---------+-----------+-----------+---------------------+
| id | programtillfalle | kurskod | lasperiod | status    | created             |
+----+------------------+---------+-----------+-----------+---------------------+
|  1 | SNÄLL2028        | KVA101  |         1 | Beställd  | 2018-02-19 17:51:24 |
|  2 | SNÄLL2028        | DRY101  |         2 | Beställd  | 2018-02-19 17:51:24 |
|  3 | SNÄLL2028        | SVT101  |         3 | Beställd  | 2018-02-19 17:51:24 |
|  4 | SNÄLL2028        | VAN101  |         4 | Beställd  | 2018-02-19 17:51:24 |
|  5 | SNÄLL2028        | KVA101  |         1 | Godkänd   | 2018-02-19 17:51:25 |
|  6 | SNÄLL2028        | DRY101  |         2 | Godkänd   | 2018-02-19 17:51:25 |
+----+------------------+---------+-----------+-----------+---------------------+
6 rows in set (0.00 sec)
```

Exakt hur din logg ser ut spelar mindre roll, men försäkra dig om att din trigger loggar rätt saker till loggtabellen.
