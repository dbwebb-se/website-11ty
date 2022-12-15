---
author: mos
revision:
    "2022-01-18": "(D, mos) Förtydliga att < inte fungerar i cmd."
    "2022-01-17": "(C, mos) Städade bort gamla saker och gav mer struktur med rubriker."
    "2022-01-03": "(B, mos) Genomgången inför v2 och MariaDB."
    "2021-01-14": "(A, mos) Uppdatead från ett större artikel."
...
Spara SQL i fil
==================================

Du har nu sparat SQL-koden från föregående artiklar i filer. Låt oss gå igenom hur dessa filer kan se ut och hur vi kan tänka när vi strukturerar dem.



Om att spara SQL-koden i fil {#om}
----------------------------------

Det som är bra med att spara all sin SQL kod är att det är enkelt att skapa om hela databasen från början om det blir något fel. Du kan köra en SQL-fil i godtycklig klient, det går lika bra i Workbench som i terminalklienten.

Tänk tanken att du skall kunna köra hela denna övningen på en ny dator som du tidigare inte använt. Du behöver skapa databasen och användaren, kanske vill du droppa databasen om den finns, kanske inte, där kan du välja väg. Du kan se hur jag gjorde nedan  mitt skript för att skapa databasen, jag valde att alltid droppa och skapa om databasen.

Jag väljer att ta med alla kommandon jag jobbat med. Jag ser det som en möjlighet att göra anteckningar tillsammans med koden. Jag kommenterar bort de kommandon som inte skall köras.



Filens struktur med kommentarer {#kom}
----------------------------------

Så här kan filen för att skapa databasen se ut. Du kan jämföra min fil nedan med din egen men koden behöver inte se likadan ut. Det viktigaste är att dubbelkolla att du alltid kan köra alla kommandon i filen i en sekvens (på en gång), om och om igen. Då fungerar det.

```sql
-- Börja med att radera databasen om den finns
DROP DATABASE IF EXISTS skolan;

-- Skapa databas
CREATE DATABASE skolan;

-- Välj vilken databas du vill använda
USE skolan;

-- Radera en databas med allt innehåll
-- DROP DATABASE skolan;

-- CREATE DATABASE skolan;
-- CREATE DATABASE IF NOT EXISTS skolan;

-- Visa vilka databaser som finns
-- SHOW DATABASES;

-- Visa vilka databaser som finns
-- som heter något i stil med *skolan*
SHOW DATABASES LIKE "%skolan%";
```

Använd kommentarer för att beskriva vad du gör. Kommentarer inleds med dubbla minustecken `-- `.

Rätt använd blir dessa filer en värdefull tillgång efter kursen, eller inför kursens examination.



Köra en SQL fil {#kor}
----------------------------------

Pröva nu återigen att återskapa databasen, genom att köra SQL-filen med kommandoradsklienten.

Kommandot fungerar när inga felmeddelanden visas. Kommandot förutsätter en bash-terminal (Cygwin, WSL2 eller liknande) då operatorn `<` inte fungerar i Windowsterminalen cmd.

```text
mariadb --table < create-database.sql
```

Kommandot ovan säger att "kör terminalklienten mariadb och formattera fina utskrifter via `--table` och exekvera samtliga kommandon som kan läsas in från filen `create-database.sql`". Tecknet `<` är en operator som hämtar allt innehåll från en fil så det kan läsas in i terminalklienten.

Prova gärna även att köra din fil i Workbench, så har du olika alternativ när du jobbar med databaserna. Ibland är det smidigt att jobba i Workbench och ibland är det smidigt att jobba i terminalen.
