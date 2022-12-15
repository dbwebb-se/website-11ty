---
author: mos
revision:
    "2022-01-04": "(C, mos) Flyttad till egen artikel i samband med v2."
    "2019-01-28": "(B, mos) Uppdaterad och flyttade reset till nästa artikel."
    "2018-01-02": "(A, mos) Första versionen, uppdelad av större dokument."
...
Specificera teckenkodning
==================================

När du skapar tabeller kan du explicit ange charset och collation till för hela tabellerna.

Du kan ange charset och collation i slutet av dina CREATE statement.

```sql
--
-- Ange teckenkodning för en tabell
--
CREATE TABLE t1 (i INT) CHARSET utf8 COLLATE utf8_swedish_ci;
CREATE TABLE t2 (
    i INT
)
ENGINE INNODB
CHARSET utf8
COLLATE utf8_swedish_ci
;
```

Lägg även denna konstruktion överst i filen, så vet vi att kopplingen mella klient och databas sker med UTF-8 som teckenkodning.

```sql
SET NAMES 'utf8';
```
