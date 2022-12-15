---
author: mos
revision:
    "2019-01-31": "(A, mos) Första utgåvan."
...
Återställ databasen (del 3)
==================================

Vi skall återställa databasen till det läget som gäller efter denna delen av guiden.

Spara din kod i filen `reset_part3.bash`.

Vi vill återställa databasen genom att köra ett kommando, så här.

```text
$ bash reset_part3.bash
```



Var ligger kommandot? {#var}
----------------------------------

Du kan troligen själv klura ut vilka filer som nu behövs i ditt reset-skript.

Förutom de som du redan har i ditt skript, som du gjorde i "[Samla all DDL i en fil](./../samla-all-ddl-i-en-fil)", så är det dessa filer som påverkar innehållet i databasen under del 3.

| Fil               | Vad gör den?         |
|-------------------|----------------------|
| `dml_insert_csv.sql` | Importera Excel till tabell. |
| `dml_join2.sql`      | Skapar vyn v_planering. |

Antingen lägger du till de filerna som de är, eller så tar du och uppdaterar din `ddl_all.sql` och din `insert.sql` så att de innehåller all DDL och alla INSERT. Välj väg.
 


### Extra övning {#extra}

Som extra övning kan du lägga till föjande saker i ditt reset-skript.

* [Skriptet som skapar excel-rapporten](./../exportera-rapport-till-excel)
* [Skriptet som skapar en backup av din databas](./../ta-backup-av-databasen)

Kanske vill du även lägga till någon SELECT som visar databasens innehåll, efter att en reset har gjort, men det väljer du själv.
