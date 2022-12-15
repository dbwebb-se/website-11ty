---
author: mos
revision:
    "2022-01-04": "(B, mos) Genomgången inför v2 och MariaDB."
    "2019-01-31": "(A, mos) Första utgåvan."
...
Återställ databasen (del 3)
==================================

Ta nu en sista titt i ditt återställningsskript och dubbelkolla att du kan återskapa databasen.

Det handlar alltså om ditt skript i filen `reset-part-3.sql`.

Du skall kunna återställa databasen genom att köra ett kommando, så här.

```text
mariadb --table < reset-part-3.sql
```

Dubbelkolla att du inte har några varningar eller felmeddelanden och kontrollera gärna att du kan köra din sista fil med DML för subqueries och outer joins.

Tycker du att du får för mycket utskrifter så kan du ta bort några SHOW och SELECT i filerna, så kan det eventuellt bli enklare att få en översikt.

Du kan också avsluta med kommandot `SHOW FULL TABLES` så får du en fin utskrift av alla de tabeller och vyer som du har i din databas. Utskriften från det kommandot kan se ut så här.

```text
+------------------+------------+
| Tables_in_skolan | Table_type |
+------------------+------------+
| kurs             | BASE TABLE |
| kurstillfalle    | BASE TABLE |
| larare           | BASE TABLE |
| larare_pre       | BASE TABLE |
| v_larare         | VIEW       |
| v_lonerevision   | VIEW       |
| v_namn_alder     | VIEW       |
| v_planering      | VIEW       |
+------------------+------------+
```

En sådan utskrift ger ju en tydlig innehållsförteckning av databasens schema.
