---
author: mos
category:
    - databas
    - mysql
    - debian/linux
revision:
    "2022-01-20": "(E, mos) Förtydligande om att logga in med lösenord."
    "2021-12-21": "(D, mos) Bytte från MySQL till MariaDB och flyttade MySQL Workbench till en egen artikel."
    "2021-01-14": "(C, mos) Ändra så att linux användare skapas med %."
    "2019-01-09": "(B, mos) Nu enbart för Debian/Linux."
    "2018-01-12": "(A, mos) Första utgåvan."
...
Installera MariaDB Server på Linux
==================================

[FIGURE src=image/mariadb/2021/ubuntu/mariadb-status.png?w=c5 class="right"]

Vi skapar en egen lokal utvecklingsmiljö för databasen MariaDB på en Linux maskin.

Vi använder också en terminalklienten för att koppla oss mot databasen och vi provar några kommandon samt skapar en ny användare i databasen.

<!--more-->



Förberedelse {#prep}
--------------------------------------

Du har en distribution av Linux installerat och uppdaterat. Guiden förutsätter att det är Ubuntu eller Debian.

Du är bekant med terminalen.

Principen är att installera med pakethanteraren så har du andra Linux-distributioner kan du behöva anpassa installationsstegen till den pakethanterare du använder.



MariaDB Server {#docs}
--------------------------------------

För att få bakgrunden till MariaDB så läser jag på i [dokumentationen för MariaDB](https://mariadb.org/documentation/).

MariaDB Server innehåller databasservern och terminalbaserade klientprogram.




Installera MariaDB Server {#server}
--------------------------------------

På Linux installerar jag databasen via pakethanteraren apt.

```text
sudo apt install mariadb-server
```

Databasservern startar automatiskt som en daemon. Du kan dubbelkolla dess status, och stoppa och starta den, via kommandot `service`.

```text
sudo service mariadb status
```

[FIGURE src=image/mariadb/2021/ubuntu/mariadb-status.png?w=w3 caption="Nu är databasen igång."]

Nu är du redo att koppla upp dig mot databasservern.



Använd terminalklienten mariadb {#terminal}
--------------------------------------

Starta en terminal. Terminalprogrammet för MariaDB hamnar automatiskt i din sökväg, din PATH, så du kan starta det direkt i terminalen.

För att testa att databasservern fungerar, så kan du öppna terminalklienten och koppla upp dig mot databasen samt dubbelkolla versionen på din databasserver.

```text
# Logga in som root användaren
sudo mariadb
```

Det kan se ut så här när du är uppkopplad mot databasservern.

```text
$ sudo mariadb
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 98
Server version: 10.3.32-MariaDB-0ubuntu0.20.04.1 Ubuntu 20.04

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]>
```

Du kan nu utföra kommandot för att visa information om din egen användare.

```text
SELECT USER();
```

Det kan se ut så här.

```text
MariaDB [(none)]> SELECT USER();
+----------------+
| USER()         |
+----------------+
| root@localhost |
+----------------+
```

Om du skriver in ett felaktigt kommando så kan du lägga till ett `;` så avslutas inmatningen av kommandot.

Du kan använda piltangenter tillbaka/fram för att redigera det du skriver in och du kan nå föregående kommando med pil upp/ned.

Du rensar skärmen med `ctrl-l`.

Du kan avsluta genom att skriva `exit`.

Låt oss prova att skriva in ett par kommandon för att bekanta oss med databasservern.

Du kan se vilken version av databasservern som är installerad genom att skriva in ett SQL kommando.

```text
SELECT VERSION();
```

Det kan se ut så här men troligen skiljer versionssnumret hos dig.

```text
MariaDB [(none)]> SELECT VERSION();
+----------------------------------+
| VERSION()                        |
+----------------------------------+
| 10.3.32-MariaDB-0ubuntu0.20.04.1 |
+----------------------------------+
```

Du kan nu prova att skriva en SQL-sats för att se hur det fungerar.

```text
SELECT NOW() AS 'The local time is';
```

Det kan se ut så här.

```text
MariaDB [(none)]> SELECT NOW() AS 'The local time is';
+---------------------+
| The local time is   |
+---------------------+
| 2021-12-21 12:14:29 |
+---------------------+
```

Du kan se vilka databaser som finns i databasservern.

```text
SHOW DATABASES;
```

Det kan se ut så här men det kan också skilja i din installation.

```text
MariaDB [(none)]> SHOW DATABASES;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| performance_schema |
+--------------------+
```

Då vet vi att terminalklienten, och databasservern, fungerar som de ska.



Skapa en ny användare {#user}
--------------------------------------

Vi skall skapa en ny användare i databasen, en som har fulla behörigheter och vi kallar den "dbadm".

Koppla upp dig med terminalklienten och kör följande SQL-sats för att skapa din användare.

```text
CREATE USER 'dbadm'@'localhost'
IDENTIFIED BY 'P@ssw0rd'
;
```

Kör följande sats för att ge användaren fullständiga rättigheter på alla databaser `*.*`, det blir i princip samma rättigheter som en root-användare som har tillgång till allt.

```text
GRANT ALL PRIVILEGES
ON *.* TO 'dbadm'@'localhost'
WITH GRANT OPTION
;
```

Om något går fel kan du ta bort användaren med kommandot DROP.

```text
DROP USER IF EXISTS 'dbadm'@'localhost';
```

Prova nu om du kan logga in med din nya användare. Avsluta din nuvarande databaskoppling (skriv "exit") och öppna en ny så här.

```text
mariadb -udbadm -pP@ssw0rd
```

Prova även att öppna den så här genom att skriva in lösenordet direkt i terminalen.

```text
mariadb -udbadm -p
```

Du kan kontrollera att du nu är inloggad som din "dbadm" användare.

```text
MariaDB [(none)]> SELECT USER();
+-----------------+
| USER()          |
+-----------------+
| dbadm@localhost |
+-----------------+
```

Tills vidare kan du nu använda din "dbadm" användare istället för root användaren.



Avslutningsvis {#avslutning}
--------------------------------------

Nu har du tillgång till databasen MariaDB och du kan koppla upp dig mot databasservern med en terminalklient och du kan logga in med din egenskapade "dbadm" användare.
