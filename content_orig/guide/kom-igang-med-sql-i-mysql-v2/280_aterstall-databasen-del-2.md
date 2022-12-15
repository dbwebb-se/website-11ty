---
author: mos
revision:
    "2022-01-04": "(E, mos) Genomgången inför v2 och MariaDB, bort med bash."
    "2019-02-12": "(E, mos) Felstavad ddl_copy.sql."
    "2019-01-29": "(D, mos) Rättade valideringsfel i reset_part2.bash."
    "2019-01-15": "(C, mos) Genomgången och uppdaterad med felutskrifter och saknad v_lon."
    "2018-03-27": "(B, mos) Add function to bash reset."
    "2018-02-09": "(A, mos) Tillagd för att fokusera på hur man återställer databasen efter andra delen."
...
Återställ databasen (del 2)
==================================

Vi skall återställa databasen till det läget som gäller efter denna delen av guiden.

Spara din kod i filen `reset-part-2.sql`.



Vilka filer behövs köras? {#filer}
----------------------------------

Vi utgår från [filen som återskapar databasen efter första delen av guiden](./../aterstall-databasen-del-1). Jag tar en kopia av den och modifierar så att den fungerar för både del 1 del och del 2 av guiden.

Det gäller nu att hålla ordning på vilka filer som har DDL i under denna delen. Alla filer med DDL behöver köras för att databasen skall återskapas.

Här är filerna som behövs, och ordningen de körs i. Ordningen är viktig. Man behöver ha koll på sin datamängd och vad som gör vad.

| Fil                     | Vad gör den?         |
|-------------------------|----------------------|
| `create-database.sql`   | Skapa om en tom databas. |
| `ddl-larare.sql`        | Skapa tabellen för lärare. |
| `insert-larare.sql` | Lägg till rader i tabellen lärare. |
| `ddl-alter.sql`         | Uppdatera tabellen lärare och lägg till kompetensen. |
| `dml-update.sql`        | Förbered lönerevisionen, alla lärare har grundlön. |
| `ddl-copy.sql`          | Kopiera till larare_pre innan lönerevisionen. |
| `dml-update-lonerevision.sql`  | Utför lönerevisionen. |
| `dml-view.sql`          | Skapa vyerna v_namn_alder och v_larare. |
| `dml-join.sql`          | Skapa vyn v_lonerevision. |

Därefter kan vi testa datamängden, till exempel genom att dubbelkolla lönesumman och kompetensen i tabellerna larare och larare_pre.

När du har modifierat ditt skript så kan du testköra det.
