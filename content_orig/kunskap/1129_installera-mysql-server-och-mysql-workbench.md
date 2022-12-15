---
author: mos
category:
    - databas
    - mysql
revision:
    "2019-01-09": "(B, mos) Artikeln är utgången och ersatt med tre nya artiklar."
    "2018-01-12": "(A, mos) Första utgåvan."
...
Installera MySQL Server och MySQL WorkBench
==================================

[FIGURE src=image/snapvt18/mysql-workbench-local.png?w=c5&a=0,0,0,0&cf class="right"]

Vi skapar en egen lokal utvecklingsmiljö för databasen MySQL tillsammans med desktopklienten MySQL Workbench.

Vi använder också terminalklienten mysql samt lägger in sökvägen till terminalprogrammen i vår PATH så att de går att starta direkt i terminalen.

<!--more-->

[INFO]

Det finns uppdaterade artiklar som är nyare och ersätter denna artikel.

* [Installera MySQL Server och MySQL WorkBench på Windows 10](kunskap/installera-mysql-server-och-mysql-workbench-pa-windows-10)
* [Installera MySQL Server och MySQL WorkBench på macOS](kunskap/installera-mysql-server-och-mysql-workbench-pa-macos)
* [Installera MySQL Server och MySQL WorkBench på Linux](kunskap/installera-mysql-server-och-mysql-workbench-pa-linux)

[/INFO]



Introduktion {#intro}
--------------------------------------

Det finns olika sätt att installera MySQL på sin dator. I denna artikeln visar vi hur du installerar (Windows/Mac OS) via de installationsprogram som finns på MySQLs egen webbplats. Vi ser även hur man installerar via pakethanteraren i Linux.

Så här kan det se ut när vi startar desktopklienten MySQL Workbench och kopplar upp oss mot en lokal instans av databasservern MySQL.

[FIGURE src=image/snapvt18/mysql-workbench-start.png?w=w3 caption="Desktopklienten Workbench är redo att koppla upp sig mot en databas."]

Vi klickar på den lokala instansen för localhost och öppnar upp en flik mot den och skriver det administrativa SQL kommandot för att visa vilka databaser som finns.

```sql
SHOW DATABASES;
```

[FIGURE src=image/snapvt18/mysql-workbench-local.png?w=w3 caption="Vi är uppkopplade och kollar vilka databaser som finns tillgängliga på servern."]

Då ser vi vilka steg vi behöver göra för att genomföra installationen.



MySQL nedladdning {#download}
--------------------------------------

Jag går till [nedladdningssidan för MySQLs produkter](https://dev.mysql.com/downloads/) för att kolla läget.

De produkter jag vill åt heter "MySQL Community Server" och "MySQL Workbench". 

MySQL Community Server innehåller databasservern och terminalbaserade klientprogram.

MySQL Workbench är en desktopklient du kan använda för att jobba mot databasservern, som ett alternativ och komplement till de terminalbaserade klienterna.



Windows 10 {#win10}
--------------------------------------

För Windows finns en [speciell nedladdningssida med MySQL produkter](https://dev.mysql.com/downloads/windows/). Jag väljer _MySQL Installer_ som är en paketering av alla produkter för MySQL.

I installationsprogrammet väljer jag en custom installation och där väljer jag att enbart installera "MySQL Community Server" och "MySQL Workbench". Inuti installationsprogrammet får jag även hjälp att installera de extra verktyg som eventuellt behövs.

Jag väljer att starta server och workbench direkt efter installationen. Via workbench kan jag koppla mig mot databasen och testa att det fungerar.



### Terminalkommandon {#winterminal}

Du kan öppna en windows terminal genom att trycka `Windows key + r` och skriva in `cmd`.

Nu kan du starta terminalklienten för MySQL, den bör finnas i katalogen `C:\Program Files\MySQL\MySQL Server 5.7\bin` (eller liknande). Du behöver flytta till katalogen först, eller skriva in hela sökvägen.

Terminalklienten startas med följande kommando.

```text
mysql -uroot -p
```

[FIGURE src=image/snapvt18/win-mysql-terminal.png caption="Startar MySQL terminalklient i Windows CMD-terminal."]

Då vet vi att terminalklienten fungerar som den ska.



### Terminalkommandon till PATH {#winpath}

Du kan lägga till, i din PATH, sökvägen till den katalog där alla MySQL terminalprogram ligger, det är den katalog du såg i stycket ovan. Då blir det enklare att starta programmet, oavsett vilken katalog du står i, du behöver inte ange hela sökvägen.

Så här gör du. Börja med att starta programmet `control system` via `Windows key + r`.

[FIGURE src=image/snapht16/windows-php-path1.png?w=w2 caption="Klicka på Change Settings."]

Du får upp ett fönster för "System Properties", välj fliken "Advanced" och klicka på "Environment Variables".

[FIGURE src=image/snapht16/windows-php-path2.png caption="Öppna fönstret för Environment Variabels."]

Du får upp ett fönster för Environment Variables.

Välj "Path" i listan och klicka "Edit...".

[FIGURE src=image/snapht16/windows-php-path3.png caption="Nu ligger sökvägen på plats."]

Lägg till sökvägen till den katalog som innehåller din installation av terminalprogrammet mysql.

[FIGURE src=image/snapvt18/win-mysql-add-path.png caption="Nu ligger sökvägen på plats."]

Spara allt och avsluta programmet `control system`.

Starta om din terminal `cmd` så att sökvägen och miljövariabeln PATH uppdateras.

Nu bör du kunna starta `mysql` direkt i terminalen via följande kommando.

```text
mysql -uroot -p
```

Du kan även installera MySQL terminalklient i andra vanliga Unix-liknande terminaler på Windows. Låt oss se hur vi gör för terminalerna Bash och Cygwin.



Windows 10 Bash {#win10bash}
--------------------------------------

Om du använder Bash på Windows kan du installera mysql terminalkommandon och använda dem direkt i Bash.

Du kan installera klienten via pakethanteraren. Du kan välja att installera `mysql-client` eller dess motsvarighet `mariadb-client`. Båda fungerar på samma sätt. 

```text
sudo apt-get install mysql-client
```

Sedan kan du starta terminalklienten, som vanligt.

```text
mysql -uroot -p
```

Om du får problem så prövar du att ange vilken host du vill connecta till.

```text
mysql -uroot -p -h127.0.0.1
```

Det kan se ut så här.

[FIGURE src=image/snapvt18/win10-bash-mysql-client.png?w=w3 caption="Startar terminalklienten på Windows 10 och Bash-terminalen."]

Bra, då kan vi använda Bash för att köra terminalklienten, och koppla oss mot databasservern som är installerad i Windows.



Windows 10 Cygwin {#win10cygwin}
--------------------------------------

Om du vill köra terminalklienten i Cygwin så gör du bäst i att installera den direkt i Cygwin. Även om du kan köra den klienten som du installerade i Windows, så fungerar den inte så bra i Cygwin, man kan starta den men inget skrivs ut. Det har att göra med att Windowsinstallationen och Cygwinterminalen inte är riktigt kompatibla.

Du kan istället göra en lokal installation av mysql i Cygwin med pakethanteraren.

```text
apt-cyg install mysql
```

Det kan sedan se ut så här när du testar och startar klienten.

[FIGURE src=image/snapvt18/win10-cygwin-mysql-client.png?w=w3 caption="Startar terminalklienten på Windows 10 i Cygwin-terminalen."]

Även här behövde vi ange hosten till 127.0.0.1 för att det skulle gå att göra uppkopplingen.



Alltid koppla sig till en viss host (my.cnf) {#mycnf}
--------------------------------------

Istället för att alltid skriva in hostens namn så kan du lägga det i en konfigurationsfil. Det är en bra idé om du kör på Windows med Bash eller Cygwin.

Du skapar en konfigurationsfil `.my.cnf` och lägger i din hemmakatalog.

På Bash och Cygwin kan du skapa filen så här.

```text
touch $HOME/.my.cnf
```

Öppna filen i din texteditor och lägg till följande.

```text
[client]
host=127.0.0.1
protocol=tcp
```

Nu kan du testa att starta terminalklienten, utan att ange host.

Terminalklienten klopplar nu alltid upp mot den valda hosten, om inte annat anges.

Jag väljer att även lägga till protokollet eftersom det sägs att vissa installationer av Cygwin kan behöva det för att uppkopplingen skall fungera.

Om du får felmeddelande som påpekar att konfigurationsfilens rättigheter är alltför vidlyftiga, så löser du det genom att ändra filens rättigheter.

Felmeddelandet kan säga följande.
 
> "mysql: [Warning] World-writable config file '/home/mos/.my.cnf' is ignored."

Ändra filens rättigheter så att bara du som är dess ägare kan läsa den.

```text
chmod 600 $HOME/.my.cnf
```

Nu skall det fungera. Denna konfigurationsfilen är bra att ha och jobbar man mycket med terminalprogrammen så kan det underlätta att spara viss konfigurationsinformation i filen.



Mac OS {#macos}
--------------------------------------

Jag hämtar hem "MySQL Community Server" och "MySQL Workbench" via nedladdningssidan och installerar dem via isntallationsprogrammen.

I "System Preferences" skapas en ikon för MySQL, via den kan man starta upp eller stoppa servern.

[FIGURE src=image/snapvt18/macos-system-preferences-mysql-server.png?w=w3 caption="System Preferences innehåller en egen del för MySQL server där den kan stoppas och startas."]

Starta servern och använd workbench för att koppla upp dig mot databasservern. På det sättet kan du se att det fungerar.



### Terminalklienten och PATH {#macosterminal}

Du kan starta terminalklienten `mysql` som ligger i katalogen `/usr/local/mysql/bin/`.

[FIGURE src=image/snapvt18/macos-mysql-terminal-client.png?w=w3 caption="MySQL terminalklient startad i en terminal."]

Du kan uppdatera din startupfil `.profile` så att alla terminalprogram för MySQL finns med i din PATH. Lägg till följande rad i `.profile`.

```text
PATH="/usr/local/mysql/bin:$PATH"
```

Du kan nu _sourca_ startupfilen, kontrollera din PATH och köra terminalprogrammet mysql så här. Se när jag utför dessa kommandon i bilden nedan.

[FIGURE src=image/snapvt18/macos-mysql-in-path.png?w=w3 caption="MySQL terminalklient startad i en terminal."]

Nu kan du köra alla MySQL terminalprogram direkt i din terminal.



Linux {#linux}
--------------------------------------

På Linux (Debian) installerar jag databasen och desktopklienten via pakethanteraren apt-get.



### MySQL Community Server {#linuxserver}

Du kan även välja att installera alternativet MariaDB. Välj mysql-server om du är osäker.

```text
sudo apt-get install mysql-server
sudo apt-get install mariadb-server
```

När du installerat paketet så kommer det fler instruktioner som du behöver följa, vanligtvis är det att köra skriptet `mysql_secure_installation`.

```text
sudo mysql_secure_installation
```

Via det skriptet kan du sätta lösenordet för root användaren.

När du är klar kan du öppna terminalklienten och koppla upp dig mot databasen.

```text
mysql -uroot -p
```

Terminalprogrammen för MySQL hamnar automatiskt i din PATH.



### MySQL Workbench {#linuxworkbench}

Du installerar desktopklienten MySQl Workbench med apt-get. Den kan koppla upp sig mot både MySQL och mot MariaDB.

```text
sudo apt-get install mysql-workbench
```

När installationen är klar kan du starta desktopklienten från din terminal.

```text
mysql-workbench
```

Koppla dig mot din lokala databas för att se att det fungerar.



Avslutningsvis {#avslutning}
--------------------------------------

Detta var de steg som krävs för att installera databasen MySQL, dess terminalklienter i PATH och desktopklienten MySQL Workbench.

Denna artikel har en [egen forumtråd](t/7236) som du kan ställa frågor i, eller ge tips.
