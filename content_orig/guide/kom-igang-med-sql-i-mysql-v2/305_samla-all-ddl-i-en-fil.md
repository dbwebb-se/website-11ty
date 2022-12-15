---
author: mos
revision:
    "2022-01-04": "(C, mos) Genomgången inför v2 och MariaDB."
    "2021-02-25": "(B, mos) Förtydliga om hur man jobbar med ALTER TABLE."
    "2019-01-28": "(A, mos) Första versionen."
...
Samla all DDL i en fil
==================================

Vi börjar få många filer och vår DDL-kod är spridd över flera filer. Det gör att det blir allt svårare att få en samlad översikt av databasens schema. Låt oss därför städa lite i vår kod och skapa en ny fil där vi samlar all DDL-kod, en fil för att skapa databasens schema.

Spara den SQL-kod du skriver i filen `ddl.sql`. Du kommer även skapa filerna `insert.sql` och `reset-part-3.sql`.



Samla i få filer {#samla}
----------------------------------

Om du kikar tillbaka till `reset-part-2.sql` så börjar det bli allt fler filer som innehåller DDL (skapa/modifiera schemat) och filer som lägger till data i tabellerna (insert) och filer som skapar rapporter från databasen.

Det blir lite stökigt när vi blandar DDL och DML på det viset. låt oss därför skapa ett par nya filer där vi samlar all DDL i filen `ddl.sql` och alla insert i filen `insert.sql`.

Vi vill minimera antalet filer som skapar/modifierar strukturen av databasen och de filer som fyller databasen med sitt innehåll. Lyckas vi med detta blir det mycket enklare att återställa databasen och det blir också mycket enklare att utveckla databasen vidare och tillföra tabeller och innehåll.

Vi vill alltså ha följande struktur på filerna som återställer databasen till det läget vi har nu.

| Fil                     | Vad gör den?         |
|-------------------------|----------------------|
| `create-database.sql`   | Skapa om en tom databas. |
| `ddl.sql`               | Skapa databasens schema med tabeller, vyer, mm. |
| `insert.sql`            | Fyll databasen med grundläggande innehåll. |
| `dml_update_lonerevision.sql`  | Utför lönerevisionen. |

Det är bra om du lyckas placera all DDL i filen `ddl.sql` och alla insert-satser i filen `insert.sql`. Men det är naturligtvis tillåtet med varianter, beroende av vilken kod du har att jobba med.



Reset part 3 {#part3}
----------------------------------

Du kan redan nu skapa din `reset-part-3.sql` och den kan/bör se ut ungefär så här. Du kan naturligtvis modifiera den så att den blir som du vill.

```text
--
-- Reset part 3
--
source create-database.sql;

use skolan;

-- source ddl-larare.sql
-- source insert-larare.sql
-- source ddl-alter.sql
-- source dml-update.sql
-- source ddl-copy.sql
-- source dml-update-lonerevision.sql
-- source dml-view.sql
-- source dml-join.sql

source ddl.sql
source insert.sql
source dml-update-lonerevision.sql

SELECT
    SUM(lon) AS 'Lönesumma',
    SUM(kompetens) AS Kompetens
FROM larare_pre;

SELECT
    SUM(lon) AS 'Lönesumma',
    SUM(kompetens) AS Kompetens
FROM larare;
```



Tips om ddl.sql {#ddl_sql}
----------------------------------

Du kan nu börja med att skapa din fil `ddl.sql`. Ett sätt är att ta det stegvis och flytta konstruktion för konstruktion och sedan testköra så att varje del fungerar. Gör små ändringar och testa att det blev rätt.

Inled filen med ett stycke där du utför DROP i rätt ordning. Det är ofta en bra sak att droppa alla tabeller och vyer överst i skriptet då man behöver droppa dem i en viss ordning för att det skall fungera.

Skapa sedan tabellerna och sist vyerna.

De filerna som innehåller DDL är följande.

| Fil                     | Vad gör den?         |
|-------------------------|----------------------|
| `ddl-larare.sql`        | Skapa tabellen för lärare. |
| `ddl-alter.sql`         | Uppdatera tabellen lärare och lägg till kompetensen. |
| `ddl-copy.sql`          | Kopiera till larare_pre innan lönerevisionen. |
| `dml-view.sql`          | Skapa vyerna v_namn_alder och v_larare. |
| `dml-join.sql`          | Skapa vyn v_lonerevision. |

Du bör kunna lyfta ut all DDL till din nya fil, ta del för del, utan att förstöra de filer du har skapat tidigare.

Kom ihåg att du inte kan redigera dina befintliga filer utan att riskera att de förstör något du gjort i för att lösa uppgifterna tidigare i guiden. Vi behöver alltså göra nya filer, så vi inte förstör något gammalt som fungerar.

Du har ett CREATE TABLE i din fil `ddl-copy.sql`, kopiera in det i din nya fil, tillsammans med en motsvarande DROP TABLE.

Du har ett par `ALTER TABLE` i din fil `ddl-alter.sql`, integrera effekten av dem in i motsvarande `CREATE TABLE` som ligger i din nya fil. Med andra ord, använd inte ALTER TABLE i din slutliga fil utan redigera istället dina CREATE TABLE så att de motsvarar de ändringar som ALTER TABLE inför. Eventuellt behöver du då även justera dina INSERT satser. Om du gör på det viset så blir din slutliga DDL fil "snyggast".

Du har vyer för lärare i filen `dml_view.sql`, kopiera över dem.

Du har vy för lönerevisionen i filen `dml_join.sql`, kopiera över den.

Dubbelkolla att din nya fil kan köras för att återskapa samtliga tabeller.

Om du får utskrifter som säger att du får varningar så kan du köra `SHOW WARNINGS` efter respektive kommando. Det kan vara klokt att kika vad varningen säger, om de dyker upp.

Du har nu samlat all ddl i en fil. Det ger dig en mycket bättre översikt av ditt databas schema och det blir nu enklare av vidareutveckla och underhålla din databas.



Fyll databasen med innehåll {#vyer}
----------------------------------

Samla nu alla INSERT och UPDATE till filen `insert.sql` så att du kan återfylla databasen med sitt ursprungliga innehåll.

Här är de filerna vi behöver hämta data ifrån.

| Fil                     | Vad gör den?         |
|-------------------------|----------------------|
| `insert-larare.sql` | Lägg till rader i tabellen lärare. |
| `dml-update.sql`        | Förbered lönerevisionen, alla lärare har grundlön. |
| `ddl-copy.sql`          | Kopiera till larare_pre innan lönerevisionen. |

Vi vill inte ta med de UPDATE-satser som sker för lönerevisionen, de får vi lägga till separat när databasen är återskapad med sitt schema och grundläggande innehåll.

Inled med ett stycke som gör DELETE på allt innehåll i tabellen, innan du börjar med dina INSERT. Då vet du att du alltid tömmer databasen på innehåll innan du lägger till det. Du skall alltså kunna köra filen `insert.sql` både mot en tom databas och mot en databas som redan har ett innehåll och i båda fallen skall utfallet bli detsamma.

I filen `insert-larare.sql` skapar vi innehållet i tabellen larare, kopiera de satserna.

I filen `dml-update.sql` ser vi till att alla lärare har en grundlön, kopiera den satsen.

I filen `ddl-copy.sql` kopierar du alla lärares löner till tabellen larare_pre, kopiera över den satsen.

Vi låter filen `dml-update-lonerevision.sql` vara som den är, den innehåller hela lönerevisionen och vi kopierar inte över den.

Dubbelkolla att du kan köra alla kommandon, om och om igen, i filen `insert.sql`.



Kontrollera att det blev rätt {#reset}
----------------------------------

Prova nu att köra ditt skript `reset-part-3.sql` och pröva även att köra de individuella filerna om och om igen.

Lyckas du med detta så skall du känna en känsla av att ha rätt bra koll på din databas, dess schema och dess innehåll.

Bra jobbat.



<!--
Detta bör numer inte inträffa.

Kontrollera reset av databasen {#setupkontr}
----------------------------------

Låt oss nu kontrollera att det går att återskapa databasen med din senaste variant av bash-skriptet `reset_part2.bash`.

Det är troligt att du råkar på följande fel i filen `ddl.sql`.

> "ERROR 1217 (23000) at line 10: Cannot delete or update a parent row: a foreign key constraint fails"

Det handlar om i vilken ordning som tabellerna droppas. Ditt skript försöker droppa tabellen larare, men den är numer länkad till tabellen kurstillfalle och kan inte droppas så längs som kopplingen finns.

Det går att lösa genom att droppa alla tabeller överst i `ddl.sql`, i rätt ordning, det vore en lösning. Men vi vill nu samla all DDL i en och samma fil istället.
-->
