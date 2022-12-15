---
author: mos
revision:
    "2022-01-03": "(E, mos) Genomgången inför v2 och MariaDB."
    "2021-01-14": "(D, mos) Flytta delen med att skapa användare till en egen artikel."
    "2019-01-21": "(C, mos) Förtydligande om hur användaren skapas med kompabilitet."
    "2019-01-11": "(B, mos) Genomgången MySQL 8.0 och uppdaterade asciinemas."
    "2017-12-27": "(A, mos) Första versionen, uppdelad av större dokument."
...
Skapa en databas
==================================

Vi skapar en databas som vi skall använda i denna guiden.

Spara SQL-koden du gör i en fil och döp den till `create-database.sql`.



Skapa databas {#create-db}
----------------------------------

Öppna din klient med en databasanvändare som har behörighet att skapa en databas. Det kan tex vara den användare du skapade tidigare i guiden.

Skapa nu en ny databas "skolan" och välj att använda den.

```sql
-- Skapa databas
CREATE DATABASE skolan;

-- Välj vilken databas du vill använda
USE skolan;
```

För att ta bort och radera en hel databas med hela dess innehåll använder du kommandot DROP.

```sql
-- Radera en databas med allt innehåll
DROP DATABASE skolan;
```

Testa att radera din nyskapade databas och skapa sedan om den.

Man kan också skriva så att databasen skapas eller droppas, men bara om den inte redan finns. Det är en konstruktion med IF NOT EXISTS.

```sql
-- CREATE DATABASE skolan;
CREATE DATABASE IF NOT EXISTS skolan;

-- DROP DATABASE skolan;
DROP DATABASE IF EXISTS skolan;
```

För att se vilka databaser som finns använder vi kommandot SHOW.

```sql
-- Visa vilka databaser som finns
SHOW DATABASES;

-- Visa vilka databaser som finns
-- som heter något i stil med *skolan*
SHOW DATABASES LIKE "%skolan%";
```

Nu kan du se vilka databaser som finns skapade.




Spara i fil {#fil}
----------------------------------

Glöm nu inte att du skulle spara alla SQL-kommandon du skriver i filen.

Så här kan du nu återskapa databasen, genom att köra SQL-filen med kommandoradsklienten.

```text
mariadb --table < create-database.sql
```

Om det inte fungerar så kan du behöver placera dina kommandon i filen i en sekvens så att det alltid fungerar att köra skriptet, oavsett om det från början finns en databas eller inte.

Kommandot fungerar när inga felmeddelanden visas. Switchen `--table` ger en tydligare utskrift av de rapporter med SELECT du gör.
