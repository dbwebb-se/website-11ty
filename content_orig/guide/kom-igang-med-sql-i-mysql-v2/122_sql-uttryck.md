---
author: mos
revision:
    "2021-01-14": "(C, mos) Uppdaterade länk till MySQL manualen."
    "2019-01-10": "(B, mos) Lade till referensmanual för MariaDB."
    "2017-12-27": "(A, mos) Första versionen, uppdelad av större dokument."
...
SQL uttryck
==================================

Vi tittar kort på varianter av SQL uttryck och hur man jobbar med dem.



SQL statements {#sql}
----------------------------------

Här följer en snabb översikt över de vanligaste SQL-kommandona.

För att välja och presentera data från tabeller:

```sql
SELECT
  FROM
  [WHERE]
  [GROUP BY]
  [ORDER BY]
```

För att skapa, uppdatera och radera data i tabeller:

```sql
INSERT INTO VALUES
UPDATE SET
DELETE
```

Man brukar benämna SELECT, INSERT och UPDATE som SQL Data Manipulation Language (DML), eller SQL DML, då de manipulerar en data i en befintlig databas. Detta kan även se som databasens innehåll.

För att skapa objekt (databaser, tabeller, vyer, etc) i en databas, även kallat "databasens schema":

```sql
CREATE
ALTER
DROP
SHOW
```

Konstruktionerna CREATE, ALTER, DROP, SHOW brukar benämnas SQL Data Definition Language (DDL), eller SQL DDL, då de definierar databasens schema och struktur.

Pröva att finna informationen om dessa SQL-kommandon i refmanualen. Ju bättre du blir på det desto enklare och snabbare kommer du igenom övningen.

Förutom SQL DML och SQL DDL finns det i en databashanterare extra kommandon som är av mer administrativ art. Dessa kan skilja mellan olika databashanterare och är inte nödvändigtvis en del av de SQL standarder som finns.



Spara din SQL kod i fil {#spara}
----------------------------------

Spara din SQL-kod från alla övningar i en textfil som du döper med ändelsen `.sql`. En sådan fil är perfekt att ha som minne och bra att använda när du framöver vill gå tillbaka och se hur du löste en viss uppgift eller problemställning. Ett eget litet facit för framtida SQL-konstruktioner.

Använd SQL-kommentarer (2 minustecken följt av ett mellanslag eller ny rad) för att skriva vilken övning du jobbar med, det gör det enkelt att läsa filen i efterhand och se vad du försöker lösa.

```sql
--
-- This is an comment in SQL.
--
```

Skriv kommentarerna på engelska om din databasmodell har engelska namn. Om din databasmodell har svenska namn så kan du skriva kommentarerna på svenska.

Du skall se till att du kan köra samtliga SQL-kommandon från filen på en gång. Då vet du att du har en god grundstruktur i filen.

De första övningarna är enkla för att sedan bli svårare och svårare. Ju längre du kommer desto bättre kompis måste du bli med referensmanualen.



Referensmanualen {#ref}
----------------------------------

I referensmanualen för MariaDB finns ett stycke som beskriver syntax för de grundläggande SQL-uttrycken, "[SQL Statements](https://mariadb.com/kb/en/sql-statements/)". Det är en riktigt god idé att bekanta sig med den delen av referensmanualen.
