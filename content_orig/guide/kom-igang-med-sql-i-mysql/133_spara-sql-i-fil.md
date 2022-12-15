---
author: mos
revision:
    "2021-01-14": "(A, mos) Uppdatead från ett större artikel."
...
Spara SQL i fil
==================================

Du har nu sparat SQL-koden från föregående artiklar i filen `setup.sql`. Låt oss gå igenom hur den filen kan se ut.



Filen setup.sql {#fil}
----------------------------------

Det som är bra med att spara all sin SQL kod är att det är enkelt att skapa om hela databasen från början om det blir något fel. Du kan köra en sådan här SQL-fil i godtycklig klient, det går lika bra i Workbench som i terminalen.

Tänk tanken att du skall kunna köra hela denna övningen på en ny dator som du tidigare inte använt. Du behöver skapa databasen och användaren, kanske vill du droppa databasen om den finns, kanske inte, där kan du välja väg. I mitt exempel nedan har jag kommenterat ut den raden som droppar databasen och jag skapar bara databasen om den inte redan finns.

Jag väljer att ta med alla kommandon jag jobbat med. Jag ser det som en möjlighet att göra anteckningar. Jag kommenterar bort de kommandon som inte skall köras.

Så här kan filen se ut. Du kan jämföra min fil med din egen. Dubbelkolla dessutom att du kan köra alla kommandon i filen i en sekvens (på en gång), om och om igen.

```sql
-- Skapa databas
-- CREATE DATABASE skolan;
CREATE DATABASE IF NOT EXISTS skolan;

-- Välj vilken databas du vill använda
USE skolan;

-- -- Radera en databas med allt innehåll
-- DROP DATABASE skolan;
--
-- -- Visa vilka databaser som finns
-- SHOW DATABASES;

-- Visa vilka databaser som finns
-- som heter något i stil med *skolan*
SHOW DATABASES LIKE "%skolan%";

-- Skapa en användare user med lösenordet pass och ge tillgång oavsett
-- hostnamn.
CREATE USER IF NOT EXISTS 'user'@'%'
    IDENTIFIED BY 'pass'
;

-- -- Skapa användaren med en bakåtkompatibel lösenordsalgoritm.
-- CREATE USER IF NOT EXISTS 'user'@'%'
--     IDENTIFIED WITH mysql_native_password
--     BY 'pass'
-- ;

-- -- Ta bort en användare
-- DROP USER 'user'@'%';
-- DROP USER IF EXISTS 'user'@'%';

-- -- Ge användaren alla rättigheter på en specifik databas.
-- GRANT ALL PRIVILEGES
--     ON skolan.*
--     TO 'user'@'%'
-- ;

-- Ge användaren alla rättigheter på samtliga databaser.
GRANT ALL PRIVILEGES
    ON *.*
    TO 'user'@'%'
;

-- -- Skapa användaren "user" med
-- -- lösenordet "pass" och ge
-- -- fulla rättigheter till databasen "skolan"
-- -- när användaren loggar in från maskinen "localhost"
-- GRANT ALL ON skolan.* TO user@localhost IDENTIFIED BY 'pass';

-- Visa vad en användare kan göra mot vilken databas.
SHOW GRANTS FOR 'user'@'%';

-- -- Visa för nuvarande användare
-- SHOW GRANTS FOR CURRENT_USER;
```

Använd kommentarer för att beskriva vad du gör. Rätt använd blir dessa filer en värdefull tillgång efter kursen, eller inför kursens examination.

Nu är trixet att du inte kan återskapa databasen när du är inloggad som användaren "user", den användaren har inte rättigheter att skapa en databas. För att köra hela skriptet på en gång måste du alltså vara inloggad som en användare (root) som har behörighet att skapa en databas.

Pröva nu återigen att återskapa databasen, genom att köra SQL-filen med kommandoradsklienten.

```text
$ mysql --table -uroot -p < setup.sql
```

Kommandot fungerar när inga felmeddelanden visas.

Prova gärna även att köra din fil i Workbench, så har du olika alternativ när du jobbar med databaserna.
