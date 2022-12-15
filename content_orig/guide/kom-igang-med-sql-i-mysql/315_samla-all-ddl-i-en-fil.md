---
author: mos
revision:
    "2021-02-25": "(B, mos) Förtydliga om hur man jobbar med ALTER TABLE."
    "2019-01-28": "(A, mos) Första versionen."
...
Samla all DDL i en fil
==================================

Vi börjar få många filer och vår DDL-kod är spridd över flera filer. Det gör att det blir allt svårare att få en samlad översikt av databasens schema. Låt oss därför städa lite i vår kod och skapa en ny fil där vi samlar all DDL-kod, en fil för att skapa databasens schema.

Spara den SQL-kod du skriver i filen `ddl_all.sql`. Du kommer även skapa filerna `insert.sql` och `reset_part3.bash`.



Kontrollera reset av databasen {#setupkontr}
----------------------------------

Låt oss nu kontrollera att det går att återskapa databasen med din senaste variant av bash-skriptet `reset_part2.bash`.

Det är troligt att du råkar på följande fel i filen `ddl.sql`.

> "ERROR 1217 (23000) at line 10: Cannot delete or update a parent row: a foreign key constraint fails"

Det handlar om i vilken ordning som tabellerna droppas. Ditt skript försöker droppa tabellen larare, men den är numer länkad till tabellen kurstillfalle och kan inte droppas så längs som kopplingen finns.

Det går att lösa genom att droppa alla tabeller överst i `ddl.sql`, i rätt ordning, det vore en lösning. Men vi vill nu samla all DDL i en och samma fil istället.



Samla all DDL {#samla}
----------------------------------

Då samlar vi all DDL i filen `ddl_all.sql`. Utgå från filerna `ddl.sql` och `ddl_more_tables.sql` och ta och bygg en snygg struktur för koden till den nya filen.

Inled filen med ett stycke där du utför DROP i rätt ordning.

Skapa sedan tabellerna, i ordning, inklusive detaljer för storage engine och teckenkodning.

Dubbelkolla att din nya fil kan köras för att återskapa samtliga tabeller.

Så här kan det se ut när jag kör min fil inuti terminalklienten.

```text
mysql> source ddl_all.sql
Query OK, 0 rows affected, 1 warning (0.00 sec)

Query OK, 0 rows affected, 1 warning (0.02 sec)

Query OK, 0 rows affected, 1 warning (0.00 sec)

Query OK, 0 rows affected (0.25 sec)

Query OK, 0 rows affected, 2 warnings (0.19 sec)

Query OK, 0 rows affected, 2 warnings (0.10 sec)

Query OK, 0 rows affected, 2 warnings (0.16 sec)
```

Vill du se vilka varningar du fått så får du köra `SHOW WARNINGS` efter respektive kommando. För min del så hade jag inget problem med varningarna och går raskt vidare.



Samla all DDL {#samla}
----------------------------------

Du har tidigare skapat fler tabeller och skapat flera vyer. Låt oss därför samla alla dessa in i denna nya ddl-fil.

Kom ihåg att du inte kan redigera dina befintliga filer, utan att riskera att de förstör något du gjort i för att lösa uppgifterna i guiden del I och del II. Vi behöver alltså göra nya filer, så vi inte förstör något gammalt som fungerar.

Du har ett CREATE TABLE i din fil `ddl_copy.sql`, kopiera in det i din nya fil, tillsammans med en motsvarande DROP TABLE.

Du har ett par `ALTER TABLE` i din fil `ddl_migrate.sql`, integrera effekten av dem in i motsvarande `CREATE TABLE` som ligger i din nya fil. Med andra ord, använd inte ALTER TABLE i din slutliga fil utan redigera istället dina CREATE TABLE så att de motsvarar de ändringar som ALTER TABLE inför. Eventuellt behöver du då även justera dina INSERT satser. Gör så här så blir din slutliga DDL fil "snyggast".

När du är klar, kör den nya filen och se att den fungerar att köra om och om igen.



Skapa vyer tillsammans med DDL {#vyer}
----------------------------------

Du har skapat ett antal vyer, låt oss kopiera dem till vår nya samlade ddl-fil.

Du har vyer för lärare i filen `dml_view.sql`, kopiera över dem.

Du har vy för lönerevisionen i filen `dml_join.sql`, kopiera över den.

När du är klar, kör den nya filen och se att den fungerar att köra om och om igen.

Du har nu samlat all ddl i en fil. Det ger dig en mycket bättre översikt av ditt databas schema och det blir nu enklare av vidareutveckla och underhålla din databas.



Fyll databasen med innehåll {#vyer}
----------------------------------

Det var ju bra att vi samlade all DDL i `ddl_all.sql`. Men hur ska vi nu återfylla databasen med innehåll? Alla INSERT och UPDATE ligger ju utspridda i olika filer?

Ja, det är sant. Det är lika bra att vi samlar allt innehåll i en fil. Det skadar inte med lite repetition och att se över det som vi gjort tidigare i guiden.

Skapa då filen `insert.sql` där vi samlar alla INSERT och UPDATE som krävs för att återställa datat i databasen.

Här är de filerna vi behöver hämta data ifrån.

I filen `dml_insert.sql` skapar vi innehållet i tabellen larare, kopiera de satserna.

I filen `dml_update.sql` ser vi till att alla lärare har en grundlön, kopiera den satsen.

I filen `ddl_copy.sql` kopierar du alla lärares löner till tabellen larare_pre, kopiera över den satsen.

Vi låter filen `dml_update_lonerevision.sql` vara som den är, den innehåller hela lönerevisionen och vi kopierar inte över den.

Dubbelkolla att du kan köra alla kommandon, om och om igen, i filen `insert.sql`. Uppdatera SQL-satserna om något fallerar.



Kontrollera att det blev rätt {#reset}
----------------------------------

Vi har så återställa hela databasen genom att köra följande filer.

| Fil               | Vad gör den?         |
|-------------------|----------------------|
| `setup.sql`       | Kör som root för att skapa om databasen och skapa användaren user:pass. |
| `ddl_all.sql`     | Skapa tabeller och vyer. |
| `insert.sql`      | Fyll databasen med innehåll innan lönerevisionen. |
| `dml_update_lonerevision.sql`  | Utför lönerevisionen. |

Skapa filen `reset_part3.bash` och utför ovan kommandon. Det kan se ut så här när du är klar och kör skriptet i din terminal.

```text
$ bash reset_part3.bash
>>> Reset skolan to beginning of part 3
>>> Initiera database and users (setup.sql)
Enter password:
>>> Create tables and views (ddl_all.sql)
>>> Insert data (insert.sql)
>>> Do lönerevision (dml_update_lonerevision.sql)
>>> Check larare_pre: Lönesumman = 305000, Kompetens = 8.
+------------+-----------+
| Lönesumma  | Kompetens |
+------------+-----------+
|     305000 |         8 |
+------------+-----------+
>>> Check larare: Lönesumman = 330242, Kompetens = 19.
+------------+-----------+
| Lönesumma  | Kompetens |
+------------+-----------+
|     330242 |        19 |
+------------+-----------+
```

Det ser ut som tidigare. Bra, då har vi städat upp lite i vår SQL-kod. Det kan vara bra att göra det ibland.
