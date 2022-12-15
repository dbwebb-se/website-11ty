---
author: mos
category:
    - databas
    - mysql
    - windows
revision:
    "2021-01-16": "(B, mos) Förtydliga att även -h127.0.0.1 är ett alternativ som fungerar."
    "2021-12-21": "(A, mos) Flyttat till eget dokument."
...
MariaDB klient och Windows med WSL2 bash terminal
==================================

[FIGURE src=image/mariadb/2021/windows/wsl2-bash-mariadb-client.png?w=c5 class="right"]

Vi sätter upp en miljö där vi kan köra terminalklienten för mariadb i WSL2 bash terminalen i Windows.

<!--more-->



Förberedelse {#prep}
--------------------------------------

Du har installerat databasen MariaDB i Windows 10 och du kan koppla upp dig mot den med en terminalklient.

Du kan hantera WSL2 bash-terminal.



Installera terminalklienten {#install}
--------------------------------------

Om du använder Debian/Bash på Windows kan du installera mariadb terminalklient och använda den i din bash terminal. Du kan installera mariadb klienten via pakethanteraren.

Starta din bash terminal och installera sedan klienten.

```text
sudo apt update
sudo apt install mariadb-client
```



Skapa ny användare i databasen {#user}
--------------------------------------

När du kör WSL2 och bash och försöker koppla upp dig mot den databasen du installerat så är det som att du kopplar dig från en annan maskin. Den användare "dbadm@localhost" du skapade tidigare hade bara rättigheter att logga in från localhost.

Du behöver därför skapa en ny användare som ger dig tillåtelse att logga in från andra datorer. Här skapas en användare som kan logga in från alla andra datorer via "dbadm@%".

Skapa användaren med följande kod.

```text
-- Create the user
CREATE USER 'dbadm'@'%'
IDENTIFIED BY 'P@ssw0rd'
;

-- Grant it privileges
GRANT ALL PRIVILEGES
ON *.* TO 'dbadm'@'%'
WITH GRANT OPTION
;

-- Flush the settings so it can be used directly
FLUSH PRIVILEGES;
```

Nu har du en användare som du kan använda för att logga in från WSL2 bash.



Starta terminalklienten {#starta}
--------------------------------------

Du kan starta terminalklienten, ungefär som vanligt, och koppla dig mot din databasserver som kör på din Windows.

Pröva följande sätt att koppla upp dig mot databasen och välj det som fungerar. Anledningen att det är två olika beror på hur olika versioner av WSL/WSL2 hanterar kopplingen till Windows localhost.

```text
# Prova denna först
mariadb -udbadm -pP@ssw0rd -h127.0.0.1

# Prova sedan denna om ovan inte fungerar
# (du kan få ett felmeddelande om "host")
mariadb -udbadm -pP@ssw0rd -h$( hostname ).local
```

Konstruktionen med `-h$( hostname ).local` är för att ange namnet på din Windowsserver så att WSL2 bash vet var databasservern ligger.

Det kan se ut så här.

[FIGURE src=image/mariadb/2021/windows/wsl2-bash-mariadb-client.png?w=w3 caption="Startar terminalklienten för mariadb i WSL2 bash."]

Bra, då kan vi använda Debian/Bash för att köra terminalklienten, och koppla oss mot databasservern som är installerad i Windows.
