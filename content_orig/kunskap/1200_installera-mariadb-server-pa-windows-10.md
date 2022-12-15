---
author: mos
category:
    - databas
    - mysql
    - windows
revision:
    "2022-01-18": "(I, mos) Förtydliga att MSI Package är rekommenderat."
    "2021-12-21": "(H, mos) Bytte från MySQL till MariaDB och flyttade MySQL Workbench till en egen artikel."
    "2020-01-20": "(G, nik) Förtydligande kring lösenord"
    "2019-01-23": "(F, mos) Alternativ användare heter dbwebb, inte mos."
    "2019-01-22": "(E, mos) Bort med stray ; with grant option."
    "2019-01-21": "(D, mos) Uppdaterad hur extra rootanvändare skapas."
    "2019-01-15": "(C, mos) Förtydliga hur man skapar my.cnf på WSL."
    "2019-01-08": "(B, mos) Nu enbart för Windows."
    "2018-01-12": "(A, mos) Första utgåvan för Windows, macOS och Linux."
...
Installera MariaDB Server på Windows 10
==================================

[FIGURE src=image/mariadb/2021/windows/mariadb-client-connected.png?w=c5 class="right"]

Vi skapar en egen lokal utvecklingsmiljö för databasen MariaDB på Windows 10.

Vi använder också en terminalklienten för att koppla oss mot databasen och vi provar några kommandon samt skapar en ny användare i databasen.

<!--more-->



Förberedelse {#prep}
--------------------------------------

Du har Windows 10 (eller en senare version) installerat och uppdaterat.

Du kan hantera Windows inbyggda cmd terminal.



MariaDB Server {#docs}
--------------------------------------

För att få bakgrunden till MariaDB så läser jag på i [dokumentationen för MariaDB](https://mariadb.org/documentation/).

MariaDB Server innehåller databasservern och terminalbaserade klientprogram.



Installera MariaDB på Windows 10 {#server-wb}
--------------------------------------

Ladda ned installationsprogrammet till din miljö via [MariaDB download](https://mariadb.org/download). Välj den variant som passar ditt system och välj varianten "MSI Package" som är ett isntallationsprogram du kan starta och köra.

Här är ett par bilder från installationsförfarandet. I första bilden kan du se var programvaran installeras, det kan vara bra att veta.

[FIGURE src=image/mariadb/2021/windows/install-choose.png?w=w3 caption="Installera servern och notera i vilken katalog installationen sker."]

När du installerar så behöver du ange lösenordet till din root-användare. Notera det så att du inte glömmer bort det.

[FIGURE src=image/mariadb/2021/windows/install-password.png?w=w3 caption="Ange lösenordet till root användaren, glöm inte bort det."]

När installationen är klar så startar databasservern upp automatiskt.

Du kan kontrollera status på databasservern genom att öppna Windows Services via `Windows key + r` och skriv `services.msc`. Leta sedan reda på namnet på tjänsten, troligen "MariaDB" i listan för alla tjänster. Här kan du även stoppa eller starta databasservern vid behov.

[FIGURE src=image/mariadb/2021/windows/windows-services.png?w=w3 caption="Nu är databasen igång som en Windows service."]

Nu är du redo att koppla upp dig mot databasservern.



Använd terminalklienten mariadb {#terminal}
--------------------------------------

Öppna klienten som heter "MySQL Client...". Du kan söka efter klienten i sökfältet.

[FIGURE src=image/mariadb/2021/windows/mariadb-client-search.png?w=w3 caption="Sök efter MySQL Client..."]

Starta klienten och skriv in lösenordet för din root-användare för att logga in.

Det kan se ut så här när du är uppkopplad mot databasservern.

[FIGURE src=image/mariadb/2021/windows/mariadb-client-connected.png?w=w3 caption="Nu är terminalklienten uppkopplad mot databasservern."]

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
| 10.6.5-MariaDB                   |
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


<!--stop-->



















Vi kan använda terminalklienten för MySQL via Windows terminal `cmd`. Du kan öppna en windows terminal genom att trycka `Windows key + r` och skriva in `cmd`.

Nu kan du starta terminalklienten för MySQL genom att ange dess absoluta sökväg, eller genom att flytta till katalogen där den finns installerad.

Sökvägen till din installation är beroende av den version du nyss installerat. Du kan använda kommandot `dir` tillsammans med `cd` för att leta reda på installationskatalogen. Alternativt använder du filväljaren `explorer` för att hitta installationskatalogen för MySQL. I mitt fall var det 8.0 så sökvägen till min installation - och katalogen bin - blev följande.

```text
C:\Program Files\MySQL\MySQL Server 8.0\bin>
```

Jag flyttar till den katalogen med hjälp av kommandot `cd` och där kan jag nu starta terminalklienten `mysql`.

Terminalklienten startas med följande kommando där jag anger att jag vill vara användaren "root" och jag vill ange dess lösenord.

```text
mysql -uroot -p
```

[FIGURE src=image/snapvt19/win-cmd-mysql.png?w=w3 caption="Startar MySQL terminalklient i Windows cmd-terminal."]

Om du skriver in ett felaktigt kommando så kan du lägga till ett `;` så avslutas inmatningen av kommandot.

Du kan använda piltangenter tillbaka/fram för att redigera det du skriver in och du kan nå föregående kommando med pil upp/ned.

Du rensar skärmen med `ctrl-l`.

Du kan avsluta genom att skriva `exit`.

Då vet vi att terminalklienten fungerar som den ska.



### Terminalklienten till PATH {#path}

Du kan lägga till alla terminalkommandon för MySQL till din PATH. Då blir det enklare att starta programmet, oavsett vilken katalog du står i.

Så här gör du. Börja med att starta programmet `control system` via `Windows key + r`.

Klicka sedan på "Change settings".

[FIGURE src=image/snapvt19/mysql-path-1.png?w=w3 caption="Klicka på Change Settings."]

Du får upp ett fönster för "System Properties", välj fliken "Advanced" och klicka på "Environment Variables".

[FIGURE src=image/snapvt19/mysql-path-2.png caption="Öppna fönstret för Environment Variabels."]

Du får upp ett fönster för Environment Variables.

Välj "System variables -> Path" i listan och klicka "Edit...".

[FIGURE src=image/snapvt19/mysql-path-3.png caption="Välj att editera systemvariabeln för Path."]

Lägg till sökvägen till den katalog som innehåller din installation av terminalprogrammet mysql. I mitt fall var sökvägen `C:\Program Files\MySQL\MySQL Server 8.0\bin`.

Klicka på "New" och lägg dit sökvägen. Klicka därefter på "Ok".

[FIGURE src=image/snapvt19/mysql-path-4.png caption="Välj att editera systemvariabeln för Path."]

Spara allt genom att klicka ned programmen du nyss öppnat.

Starta om din terminal `cmd` så att sökvägen och miljövariabeln PATH uppdateras.

Nu bör du kunna starta `mysql` direkt i terminalen via följande kommando.

```text
mysql -uroot -p
```

Nu har du en fungerande terminalklient `mysql`.










Installera terminalklienten i Debian/Bash {#win10bash}
--------------------------------------

Om du använder Debian/Bash på Windows kan du installera mysql terminalkommandon och använda dem via terminalen.

Du kan installera klienten via pakethanteraren. Du kan välja att installera `mysql-client` eller dess motsvarighet `mariadb-client`. Båda fungerar på samma sätt.

Starta din bash terminal och installera sedan klienten du väljer.

```text
sudo apt-get install mysql-client
```

Du kan sedan starta terminalklienten, som vanligt.

```text
mysql -uroot -p
```

Eventuellt får du problem med följande felmeddelande.

> ERROR 2002 (HY000): Can't connect to local MySQL server through socket '/var/run/mysqld/mysqld.sock' (2 "No such file or directory")

Pröva då att ange vilken host du vill connecta till. Databasservern ligger på samma host så vi anger `-h127.0.0.1`.

```text
mysql -uroot -p -h127.0.0.1
```

Om du får problem med 'caching_sha2_password' så använder du din alternativa användare.

> "ERROR 2059 (HY000): Authentication plugin 'caching_sha2_password' cannot be loaded: /usr/lib/x86_64-linux-gnu/mariadb18/plugin/caching_sha2_password.so: cannot open shared object file: No such file or directory"

Min alternativa användare hette "dbwebb".

```text
mysql -udbwebb -p -h127.0.0.1
```

Det kan se ut så här.

[FIGURE src=image/snapvt19/mysql-debian-bash.png?w=w3 caption="Startar terminalklienten på Debian/Bash i Windows 10."]

Bra, då kan vi använda Debian/Bash för att köra terminalklienten, och koppla oss mot databasservern som är installerad i Windows.

<!--

* Eventuellt ändra ordningen på bash/cygin,
* Tydlig att samma fel händer på både bash och cygwin, skriv om stycken, orgnisaera användningen i ett stycke och installationen i ett stycke.
* Visa att -p och -ppassword kan fungera både två (även i cmd)

* Dubbelkolla hur my.cnf fungerar, eventuellt visa om radbrytning, felsökning av my.cnf, tex --print-defaults
*
-->



Installera terminalklienten i Cygwin {#win10cygwin}
--------------------------------------

Om du vill köra terminalklienten i Cygwin så gör du bäst i att installera den direkt i Cygwin. Även om du kan köra den klienten som du installerade i Windows, så fungerar den inte så bra i Cygwin, man kan starta den men inget skrivs ut. Det har att göra med att Windowsinstallationen och Cygwinterminalen inte är riktigt kompatibla.

Du kan istället göra en lokal installation av `mysql` i Cygwin med pakethanteraren.

```text
apt-cyg install mysql
```

Det kan sedan se ut så här när du testar och startar klienten.

[FIGURE src=image/snapvt19/mysqli-cygwin.png?w=w3 caption="Startar terminalklienten i Cygwin på Windows."]

Även här behövde vi ange hosten till 127.0.0.1 (se installationen av Debian/Bash ovan), samt min optionella användare, för att det skulle gå att göra uppkopplingen från klienten till databasservern.



Alltid koppla sig till en viss host (.my.cnf) {#mycnf}
--------------------------------------

Vi kan undvika att skriva in hostens namn och istället lägga till den i en konfigurationsfil `.my.cnf`. Det är en bra idé om du kör på Windows med Bash eller Cygwin.

Du skapar en konfigurationsfil `.my.cnf` och lägger i din hemmakatalog.

I terminalen kan du skapa filen så här.

```text
touch $HOME/.my.cnf && chmod 600 $HOME/.my.cnf
```

Sedan kan du fylla filen med innehåll, så här. `$HOME` är samma sak som `~`, båda pekar på din användares hemmakatalog.

```text
echo -e "[client]\nhost=127.0.0.1\nprotocol=tcp" >> ~/.my.cnf
```

Du kan nu titta på filen med följande kommandon. Först lista filen för att se dess storlek och rättigheter och sedan göra cat för att visa filens innehåll.

```text
ls -l ~/.my.cnf
cat ~/.my.cnf
```

Filen skall innehålla följande.

```text
[client]
host=127.0.0.1
protocol=tcp
```

Så här kan det se ut när du kör kommandona.

[FIGURE src=image/snapvt19/wsl-create-mycnf-without-editor.png?w=w3 caption="Du har nu skapat en konfigurationsfil som terminalklienten läser in."]

Alternativt kan du använda en texteditor för att skapa och redigera filen, [dock fungerar texteditorn inte så bra med filsystemet på WSL](t/8203).

Nu kan du testa att starta terminalklienten, utan att ange host.

Terminalklienten kopplar nu alltid upp mot den valda hosten, om inte annat anges.

Jag väljer att även lägga till protokollet eftersom det sägs att vissa installationer av Cygwin kan behöva det för att uppkopplingen skall fungera.

Om du får felmeddelande som påpekar att konfigurationsfilens rättigheter är alltför vidlyftiga, så löser du det genom att ändra filens rättigheter.

Felmeddelandet kan säga följande.

> "mysql: [Warning] World-writable config file '/home/mos/.my.cnf' is ignored."

Ändra filens rättigheter så att bara du som är dess ägare kan läsa den.

```text
chmod 600 $HOME/.my.cnf
```

Nu skall det fungera. Denna konfigurationsfilen är bra att ha och jobbar man mycket med terminalprogrammen så kan det underlätta att spara viss konfigurationsinformation i filen.
