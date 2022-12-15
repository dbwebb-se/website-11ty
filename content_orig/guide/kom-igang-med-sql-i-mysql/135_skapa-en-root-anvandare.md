---
author: mos
revision:
    "2019-01-24": "(B, mos) Bort med överflödigt ;."
    "2019-01-21": "(A, mos) Första versionen."
...
Skapa en root användare
==================================

Vi skall skapa en ny användare i databasen, en användare som har samma behörighet som root användaren.

Spara SQL-koden du gör i en fil och döp den till `create-user-dbwebb.sql`.

Om du redan har skapat en root användare som heter `dbwebb` så är det bra, men se ändå till att utföra nedan instruktioner och spara undan all din kod i skriptet.



Problem med authenticering {#problem}
--------------------------------------

Detta är en lösning på problemet som inträffar när äldre klienter kopplar sig mot nyare databaser (MySQL från och med version 8.0.4). Felmeddelandet som visas är ofta följande.

> "ERROR 2059 (HY000): Authentication plugin 'caching_sha2_password' cannot be loaded: /.../plugin/caching_sha2_password.so: cannot open shared object file: No such file or directory"

Du kan läsa om problematiken på StackOverflow och "[Authentication plugin 'caching_sha2_password'](https://stackoverflow.com/questions/49963383/authentication-plugin-caching-sha2-password)".

Problemet inträffar när man tar en klient (terminal, workbench, javascript, etc) som inte har den allra senaste uppdateringen (MySQL 8.0.4) av den del av programvaran som hanterar hur lösenordet krypteras.

För att undvika det så skapar vi alltså en ny root-användare som är kompatibel med äldre klienter, genom att använda en äldre algoritm för hur lösenordet krypteras.

Som ett alternativ hade vi kunnat uppdatera nuvarande root-användare och bytt lösenordet på den, samt bytt hur lösenordet krypteras. Men den vägen väljer vi ej, vi låter root-användaren vara så inget går fel med den.



Problem med authenticering {#createuser}
--------------------------------------

Vi öppnar en klient, som root, och skriver följande SQL-kod för att skapa en användare. Jag väljer här att döpa användaren till "dbwebb" och tillåta att användaren kan koppla upp sig från alla hostar `%`.

```text
DROP USER IF EXISTS 'dbwebb'@'%';

CREATE USER 'dbwebb'@'%'
IDENTIFIED
WITH mysql_native_password -- Only MySQL > 8.0.4
BY 'password'
;
```

Det är konstruktionen `WITH mysql_native_password` som ger den bakåtkompatibla användaren. Detta gäller alltså enbart på MySQL där versionen är större än 8.0.4.

Kommandot [`CREATE USER` finns beskrivet i manualen](https://dev.mysql.com/doc/refman/8.0/en/create-user.html).

Vi ger nu denna användare fullständiga rättigheter på alla databaser `*.*`, det blir i princip samma rättigheter som root-användaren.

```text
GRANT ALL PRIVILEGES
ON *.*
TO 'dbwebb'@'%'
WITH GRANT OPTION
;
```

Den sista delen med `WITH GRANT OPTION` gör så att användaren kan göra GRANT för andra användare.

Kommandot [`GRANT` finns beskrivet i manualen](https://dev.mysql.com/doc/refman/8.0/en/grant.html).

Bra, då har vi en användare som har samma rättigheter som root-användaren. En anledning till att vi gör detta nu är att det finns olika kryptering på lösenorden och denna användare vi nu skapade är mer kompatibel mellan versioner, mer kompatibel än den root-användare som skapades.



Kontrollera versionen av MySQL {#version}
--------------------------------------

Du kan dubbelkolla vilken version du har av MySQL, med följande SQL-uttryck.

```sql
SHOW VARIABLES LIKE "%version%";
```

Det kan se ut så här.

```text
MySQL [(none)]> SHOW VARIABLES LIKE "%version%";
+-------------------------+------------------------------+
| Variable_name           | Value                        |
+-------------------------+------------------------------+
| innodb_version          | 8.0.13                       |
| protocol_version        | 10                           |
| slave_type_conversions  |                              |
| tls_version             | TLSv1,TLSv1.1,TLSv1.2        |
| version                 | 8.0.13                       |
| version_comment         | MySQL Community Server - GPL |
| version_compile_machine | x86_64                       |
| version_compile_os      | Win64                        |
| version_compile_zlib    | 1.2.11                       |
+-------------------------+------------------------------+
9 rows in set (0.03 sec)
```

Ibland är det bra att ha koll på vilken version man kör.



Kontrollera status på användare {#version}
--------------------------------------

Du kan kontrollera att du nu har de användare som krävs för att jobba vidare i guiden. Kör följande sql-uttryck för att se viss information om dina användare.

```sql
--
-- Check the status for users root, dbwebb and user.
--
SELECT
    User,
    Host,
    Grant_priv,
    plugin
FROM mysql.user
WHERE
    User IN ('root', 'dbwebb', 'user')
ORDER BY User
;
```

Exakt hur utskriften från kommandot ser ut (för root användaren) kan skilja, så här ser det ut för mig.

```text
MySQL [(none)]> SELECT
    ->     User,
    ->     Host,
    ->     Grant_priv,
    ->     plugin
    -> FROM mysql.user
    -> WHERE
    ->     User IN ('root', 'dbwebb', 'user')
    -> ORDER BY User
    -> ;
+--------+-----------+------------+-----------------------+
| User   | Host      | Grant_priv | plugin                |
+--------+-----------+------------+-----------------------+
| dbwebb | %         | Y          | mysql_native_password |
| root   | localhost | Y          | caching_sha2_password |
| user   | %         | N          | mysql_native_password |
+--------+-----------+------------+-----------------------+
3 rows in set (0.00 sec)
```

Det viktiga är att du har tre användare och att hosten är `%` för dbwebb och user-användaren samt att dessa två användare har plugin `mysql_native_password`.

Oavsett vad så skall du nu ha en alternativ root-användare i `dbwebb`, med `Grant_priv -> Y`, som du kan använda för att koppla dig med godtycklig klient, även äldre klienter.



Kontrollera ditt skript {#skript}
--------------------------------------

Se till att du kan köra alla instruktionern ditt skript i en sekvens. Det är viktigt om du senare behöver återställa din databas.



Problem och facit? {#problem}
--------------------------------------

Om du får problem så finns det ett par skript som du kan köra för att skapa rätt användare.

Se till att du kör nedan skript i en klient där du kan logga in med användaren root.

Här är hur du skapar användaren `dbwebb` och användaren `user` samt dubbelkollar status på användarna root, dbwebb och user.

```text
# Stå i rooten av ditt kursrepo
mysql -uroot -p < example/sql/create-user-dbwebb.sql
mysql -uroot -p < example/sql/create-user-user.sql
mysql -t -uroot -p < example/sql/check-users.sql
```

Du kan titta i de skripten och använda informationen för att skapa ditt egna skript.
