---
author: mos
category:
    - databas
    - mysql
    - debian/linux
revision:
    "2021-01-14": "(C, mos) Ändra så att linux användare skapas med %."
    "2019-01-09": "(B, mos) Nu enbart för Debian/Linux."
    "2018-01-12": "(A, mos) Första utgåvan."
...
Installera MySQL Server och MySQL WorkBench på Linux
==================================

[FIGURE src=image/snapvt19/debian-service-mysql-status.png?w=c5 class="right"]

Vi skapar en egen lokal utvecklingsmiljö för databasen MySQL (eller MariaDB) tillsammans med desktopklienten MySQL Workbench på Debian/Linux.

Vi använder också terminalklienten `mysql` för att koppla oss mot databasen.

<!--more-->



Förberedelse {#prep}
--------------------------------------

Du har Debian/Linux installerat och uppdaterat.

Du är bekant med terminalen.

Principen är att installera med pakethanteraren så har du andra Linux-distributioner kan du behöva anpassa installationsstegen till den pakethanterare du använder.



MySQL produkter {#download}
--------------------------------------

Jag går till [nedladdningssidan för MySQLs produkter](https://dev.mysql.com/downloads/) för att kolla läget, innan vi startar med installationen.

De produkter jag vill åt heter "MySQL Community Server" och "MySQL Workbench".

MySQL Community Server innehåller databasservern och terminalbaserade klientprogram.

MySQL Workbench är en desktopklient du kan använda för att jobba mot databasservern, som ett alternativ och komplement till de terminalbaserade klienterna.



Installera MySQL Server {#server}
--------------------------------------

På Debian/Linux installerar jag databasen via pakethanteraren apt-get.

Du kan även välja att installera alternativet MariaDB. Välj mysql-server om du är osäker så väljer pakethanteraren en rekommenderad databas.

```text
sudo apt-get install mysql-server

# Alternativ
sudo apt-get install mariadb-server
```

Även om du väljer mysql-server så kan det hända att du får mariadb-server. Det beror på att paketet som implementerar mysql-server är ersatt av mariadb-server.

När paketet är installerat så behöver du utföra ett extra kommando för att konfigurera isntallationen. Du gör detta genom att köra skriptet `mysql_secure_installation`.

```text
sudo mysql_secure_installation
```

Via det skriptet sätter du lösenordet för databasens root-användare. Resten av frågorna kan du svara default-svaret på.

Databasservern startar automatiskt. Du kan dubbelkolla dess status, och stoppa och starta den, via kommandot `service`.

```text
sudo service mysql status
```

Det ser ut så här.

[FIGURE src=image/snapvt19/debian-service-mysql-status.png?w=w3 caption="Visa status för tjänsten mysql."]



Använd terminalklienten mysql {#terminal}
--------------------------------------

Terminalprogrammen för MySQL hamnar automatiskt i din PATH.

För att testa att databasservern fungerar, så kan du öppna terminalklienten och koppla upp dig mot databasen.

```text
mysql -uroot -p
```

För att logga in med root-användaren behöver man köra kommandot som unix-användaren root, det verkar vara en ny sak för senare versioner av MySQL/MariaDB ([se stack overflow](https://stackoverflow.com/a/35748657)).

Du kan nu utföra kommandot för att visa vilka databaser som finns.

```
SHOW DATABASES;
```

Det kan se ut så här.

[FIGURE src=image/snapvt19/debian-terminal-klient.png?w=w3 caption="MySQL terminalklient startad med root-användaren."]

Om du skriver in ett felaktigt kommando så kan du lägga till ett `;` så avslutas inmatningen av kommandot.

Du kan använda piltangenter tillbaka/fram för att redigera det du skriver in och du kan nå föregående kommando med pil upp/ned.

Du rensar skärmen med `ctrl-l`.

Du kan avsluta genom att skriva `exit`.

Då vet vi att terminalklienten, och databasservern, fungerar som den ska.



Skapa en ny användare i databasen {#createuser}
--------------------------------------

Innan vi går vidare så skapar vi en ny användare i databasen, denna användare kan ha fulla rättigheter till alla databaser och vara ett alternativ till databasens root-användare.

Vi öppnar terminalklienten och skriver följande SQL-kod för att skapa en användare. Jag döper min användare till "mos", du väljer ditt egna användarnamn och ditt egna lösenord.

```text
CREATE USER 'mos'@'%'
IDENTIFIED BY 'password';
```

Kommandot [`CREATE USER` finns beskrivet i manualen](https://dev.mysql.com/doc/refman/8.0/en/create-user.html).

Vi ger nu denna användare fullständiga rättigheter på alla databaser `*.*`, det blir i princip samma rättigheter som root-användaren.

```text
GRANT ALL PRIVILEGES ON *.* TO 'mos'@'%';
```

Kommandot [`GRANT` finns beskrivet i manualen](https://dev.mysql.com/doc/refman/8.0/en/grant.html).

Bra, då har vi en användare som har samma rättigheter som root-användaren.

Nu kan vi använda den nya användaren, istället för databasens root-användare.

[FIGURE src=image/snapvt19/debian-terminal-klient-new-user.png?w=w3 caption="Nu är vi inloggade med vår nya användare och behöver inte sudo."]



Installera MySQL WorkBench {#wb}
--------------------------------------

Du installerar desktopklienten MySQL Workbench med apt-get. Desktopklienten kan koppla upp sig mot både MySQL och mot MariaDB.

```text
sudo apt-get install mysql-workbench
```

När installationen är klar kan du starta desktopklienten från din terminal.

```text
mysql-workbench
```

Det finns en koppling till din lokala databas, men den är för root-användaren. Redigera kopplingen och ändra till det användarnamn du skapade ovan.

[FIGURE src=image/snapvt19/debian-workbench-connections.png?w=w3 caption="Du kan nu koppla dig direkt mot databasen, via Workbench."]

[FIGURE src=image/snapvt19/debian-workbench-change-user.png?w=w3 caption="Byt namn på användaren så att du kan köra applikationen utan sudo."]

Du kan utföra följande kommando för att visa vilka databaser som finns.

```
SHOW DATABASES;
```

[FIGURE src=image/snapvt19/debian-workbench-show-databases.png?w=w3 caption="Nu fungerar både Workbench och MySQL databasserver."]

Vi har nu installerat databasservern tillsammans med MySQL Workbench och kopplingen mellan dem fungerar.



Alternativ till installation {#alternativ}
--------------------------------------

Du kan använda [MariaDB](https://mariadb.org/download/) som ett alternativ till MySQL.

Du kan använda den versionen av MySQL/MariaDB som följer med XAMPP.



Avslutningsvis {#avslutning}
--------------------------------------

Detta var de steg som krävs för att installera databasen MySQL, dess terminalklienter i PATH och desktopklienten MySQL Workbench på Debian/Linux.

Denna artikel har en [egen forumtråd](t/8171) som du kan ställa frågor i, eller ge tips.
