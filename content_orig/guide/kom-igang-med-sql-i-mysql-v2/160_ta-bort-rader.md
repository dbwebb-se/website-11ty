---
author: mos
revision:
    "2022-01-03": "(C, mos) Genomgången inför v2 och MariaDB."
    "2018-03-20": "(B, mos) Flyttad varning om safe update tidigare i guiden."
    "2017-12-28": "(A, mos) Första versionen, uppdelad av större dokument."
...
Ta bort rader
==================================

Vi använder `DELETE` för att radera rader från en tabell.

Lägg SQL-koden för detta exemplet i filen `dml-delete.sql` och inled filen med en header.

```sql
--
-- Delete from database skolan.
--
```

Slå upp hur DELETE fungerar i refmanualen och läs på om hur du kan ta bort rader från en tabell.

I princip ser det ut så här.

```sql
--
-- Delete rows from table
--
DELETE FROM larare WHERE fornamn = 'Hagrid';
```

Skriv SQL-kod för att utföra följande:

1. Radera Hagrid (1 rad).
1. Radera alla som jobbar på avdelningen DIPT (3 rader).
1. Radera alla som har en lön, men begränsa antalet rader som får raderas till 2 (`LIMIT`) (2 "slumpmässiga" rader påverkas).
1. Radera samtliga återstående lärare.

Det sista kommandot bör ha raderat 2 lärare (2 rader i tabellen).

När du raderar rader så kan det vara bra att lägga till en `LIMIT` klausul som säger hur många rader du raderar. Annars finns risken att en liten felskrivning i satsen gör att du raderar hela innehållet i tabellen. Ta för vana att alltid använda LIMIT.

När du är klar, återskapa alla lärare genom att köra SQL-kommandon från filen `insert-larare.sql`. Du skall nu återigen ha en tabell med samtliga lärare.
