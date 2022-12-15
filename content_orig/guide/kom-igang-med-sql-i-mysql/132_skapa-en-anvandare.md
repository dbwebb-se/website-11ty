---
author: mos
revision:
    "2021-01-14": "(A, mos) Uppdelade från en större artikel."
...
Skapa en användare
==================================

Det finns ett behörighetssystem som kan koppla en användare med lösenord till en viss databas, inklusive behörigheter. För vårt syfte skapar vi en ny användare som kan göra allt mot vår nyskapade databas.

Fortsätt spara SQL-koden du gör i en filen `setup.sql`.



Skapa användare till databasen {#user}
----------------------------------

Det finns ett behörighetssystem som kan koppla en användare med lösenord till en viss databas, inklusive behörigheter. För vårt syfte skapar vi en ny användare som kan göra allt mot vår nyskapade databas.

Exakt hur man skapar en användare och hur dess lösenord krypteras kan skilja aningen mellan olika DBMS.

Här är ett vanligt sätt som fungerar de flesta sammanhang.

Du kan ta bort en användare med DROP.

```sql
-- Ta bort en användare
DROP USER 'user'@'%';
DROP USER IF EXISTS 'user'@'%';
```

Konstruktionen nedan skapar användaren "user" med lösenordet "pass" och användaren kan logga in från godtycklig host som representeras av '%'

```sql
-- Skapa en användare user med lösenordet pass och ge tillgång oavsett
-- hostnamn.
CREATE USER IF NOT EXISTS 'user'@'%'
IDENTIFIED
BY 'pass'
;
```

Att lägga till IF EXISTS ger dig en felkontroll så att kommandot enbart körs om användaren finns. Det första kommandot ger felmeddelande om det körs när användaren inte finns.

Om du får problem att koppla dig med godtycklig klient mot databasen MySQL 8.0.4 eller högre så kan det bero på implementationsdetaljer som rör hur lösenordet krypteras. Du kan då behöva skapa användaren på följande sätt.

```sql
-- Skapa användaren med en bakåtkompatibel lösenordsalgoritm.
CREATE USER IF NOT EXISTS 'user'@'%'
IDENTIFIED
WITH mysql_native_password -- MySQL with version > 8.0.4
BY 'pass'
;
```

Det finns en forumtråd, "[Kompabilitet mellan MySQL och MariaDB, CREATE USER](t/8177)", som förklarar detta i mer detalj.

Utgångsläget är att du skapar användaren med `WITH mysql_native_password` när du har en MySQL databas. Har du MariaDB så skippar du den raden.

När du väl har skapat användaren behöver du ge den behörigheter. Vi väljer att ge användaren fulla behörigheter till samtliga databaser.

```sql
-- Ge användaren alla rättigheter på alla databaser.
GRANT ALL PRIVILEGES
    ON *.*
    TO 'user'@'%'
;
```

Du kan se vilken GRANT du givit en användare.

```sql
-- Visa vad en användare kan göra mot vilken databas.
SHOW GRANTS FOR 'user'@'%';

-- Visa för nuvarande användare
SHOW GRANTS FOR CURRENT_USER;
```

Det kan se ut så här (Debian/Linux).

```sql
mysql> SHOW GRANTS FOR 'user'@'%';
+--------------------------------------------------+
| Grants for user@%                                |
+--------------------------------------------------+
| GRANT USAGE ON *.* TO `user`@`%`                 |
| GRANT ALL PRIVILEGES ON *.* TO `user`@`%` |
+--------------------------------------------------+
2 rows in set (0.00 sec)
```

Om du får en annorlunda utskrift i din klient så kan du bara låta det vara.

Du kan nu använda din klient för att logga in med den nya användaren och kontrollera att den kommer åt databasen.

Pröva genom att starta kommandoradsklienten och ange användare, lösenord och databas.

```text
$ mysql -uuser -ppass skolan

... utskrifter från inloggningen

mysql>
```

Det kan se ut så här.

[ASCIINEMA src=220805 caption="Logga in mot en databas med angiven användare och lösenord."]

Om inget felmeddelande visas och prompten för kommandoradsklienten visas så gick det bra att logga in med vald användare och lösenord.



Spara i fil {#fil}
----------------------------------

Glöm nu inte att du skulle spara alla SQL-kommandon du skriver i filen `setup.sql`.

Så här kan du nu återskapa databasen, genom att köra SQL-filen med kommandoradsklienten.

```text
$ mysql --table -uroot -p < setup.sql
```

Kommandot fungerar när inga felmeddelanden visas.

[ASCIINEMA src=220807 caption="Skapa om databasen via SQL-kommandon i filen `setup.sql`."]
