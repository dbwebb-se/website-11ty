---
author: mos
revision:
    "2022-01-03": "(E, mos) Genomgången inför v2 och MariaDB, bort med bash."
    "2021-01-14": "(E, mos) Bort med databasen när man gör setup."
    "2019-01-31": "(D, mos) Kommentar om unix radslut."
    "2019-01-11": "(C, mos) Stycke om hur man blir av med varningen."
    "2018-03-27": "(B, mos) Lade till dml_update_lonerevision.sql."
    "2018-02-09": "(A, mos) Tillagd för att fokusera på hur man återställer databasen."
...
Återställ databasen (del 1)
==================================

Låt oss slutligen gå igenom det här med återställning av databasen en gång till. Det är en viktig självkontroll som du kan göra. Om du kan köra alla dina skript i sekvens, och få samma resultat som jag, så visar det att du har "rätt" så här långt i övningen. Det blir en självkontroll som visar att man är på rätt väg.

I denna delen skall du skapa skriptet `reset-part-1.sql`.



Vilka filer behövs köras? {#filer}
----------------------------------

Vi förutsätter att du har skapat en användare som har behörigheter till din databas.

Följande är de filer som behöver köras för att återställa databasen från början.

| Fil                     | Vad gör den?         |
|-------------------------|----------------------|
| `create-database.sql`   | Skapa om en tom databas. |
| `ddl-larare.sql`        | Skapa tabellen för lärare. |
| `insert-larare.sql`     | Lägg till rader i tabellen lärare. |
| `ddl-alter.sql`         | Uppdatera tabellen lärare och lägg till kompetensen. |
| `dml-update.sql`        | Förbered lönerevisionen, alla lärare har grundlön. |
| `dml-update-lonerevision.sql`  | Utför lönerevisionen. |

Här är de skript du behöver köra för att återställa databasen. Du kan markera allihop och kopiera till din terminal, de körs automatiskt efter varandra.

```text
mariadb --table < create-database.sql
mariadb --table skolan < ddl-larare.sql
mariadb --table skolan < insert-larare.sql
mariadb --table skolan < ddl-alter.sql
mariadb --table skolan < dml-update.sql
mariadb --table skolan < dml-update-lonerevision.sql
mariadb skolan -e "SELECT SUM(lon) AS 'Lönesumma', SUM(kompetens) AS Kompetens FROM larare;"
```

Det skall se ut så här när alla filer och kommandon är utförda.

```text
+------------+-----------+
| Lönesumma  | Kompetens |
+------------+-----------+
|     330242 |        19 |
+------------+-----------+
```

Som vanligt är det klokt att kontrollera att du inte får några felutskrifter från någon av filerna.



Ett SQL skript för att köra många SQL skript {#source}
----------------------------------

En variant är att skapa ett enda SQL skript `reset-part-1.sql` som kan återställa hela din databas via ett enda skript som exekverar kommandon från andra filer.

Det använder sig av konstruktionen `source` för att läsa kommandon från en annan fil.

I sin helhet kan skriptet se ut så här och du kan kopiera det och modifiera efter behag för att skapa ditt eget återställningsskript.

```text
--
-- Reset part 1
--
source create-database.sql;

use skolan;

source ddl-larare.sql
source insert-larare.sql
source ddl-alter.sql
source dml-update.sql
source dml-update-lonerevision.sql

SELECT
    SUM(lon) AS 'Lönesumma',
    SUM(kompetens) AS Kompetens
FROM larare;
```

Gå igenom vad som händer i skriptet och försök förklara för dig själv hur det fungerar.

När du kör skriptet måste du stå i samma katalog där filerna finns. Det är enklast att göra detta i terminalen, det blir svårare att jobba med sökvägar i Workbench, man behöver då jobba mer med absoluta sökvägar. Rekommendationen är att göra liknande saker i terminalen för att det blir enklare med sökvägarna till skripten.

Det skall vara enkelt att jobba med databaser. Det blir enkelt om man har ordning på sina filer och vet hur man kan jobba med dem.

Vetskapen om hur man återställer sin databas och sin data skapar trygghet och det blir enklare att jobba och testa saker.
