---
author: mos
category:
    - databas
    - mysql
revision:
    "2022-05-17": "(C, mos) Fixa problem med mysqldump och my.cnf."
    "2022-01-16": "(B, mos) Uppdatera så att Cygwin blir tydlig att den använder Windowsklienten."
    "2021-12-21": "(A, mos) Flyttat till eget dokument."
...
MariaDB klienten och filen .my.cnf
==================================

Vi sätter upp en miljö där vi använder konfigurationsfilen `.my.cnf` för att förenkla och slippa skriva långa kommandon när vi startar terminalklienten för databasen MariaDB.

<!--more-->



Förberedelse {#prep}
--------------------------------------

Du har installerat databasen MariaDB och du kan koppla upp dig mot den med en terminalklient.

Du kan hantera terminalen och navigera i din hemmakatalog.



Läs på om .my.cnf {#mycnf}
--------------------------------------

Du kan läsa om hur det fungerar i artikeln "[Configuring MariaDB with Option Files](https://mariadb.com/kb/en/configuring-mariadb-with-option-files/)".



Ett exempel på filen my.cnf {#exempel}
--------------------------------------

Med tanke på hur vi installerar databasen MariaDB i kursen databas så kan följande exempel fungera som en mall för filen `my.cnf`.

```text
# Template config file for databas-v2

[client]
user=dbadm
password=P@ssw0rd

# host for cygwin och äldre WSL
#host=127.0.0.1

# host for WSL2 bash, change <hostname> to its real value
#host=<hostname>.local

#port=3306
#protocol=tcp

[mysql]
# To allow for using LOAD DATA INFILE
loose-local-infile = 1
```

Du behöver eventuellt anpassa filen till ditt system med till exempel inställningar för hosten ovan. Du kan också ha en sådan här fil i varje terminal (Windows: CMD, Cygwin, WSL) du använder.



Spara filen my.cnf {#spara}
--------------------------------------

Filen heter `my.cnf` och behöver sparas på en plats där din terminalklient kan läsa den.

Exakt var detta är beror på din installation, din terminalklient och din terminal.

Vi kan dock fråga din terminalklient på vilka platser som den läser konfigurationsfilen.



### Windowsklienten mariadb {#win}

I din terminalklient, kör kommandot `mariadb --help`, det kommer en hel del utskrift och sedan skrollar du tillbaka till början av utskriften.

Om du använder en terminalklient som är installerade i Windows kan du hitta följande sökvägar. Detta gäller i terminalen `cmd.exe`. Detta gäller också oftast i Cygwin där du kan använda den terminalklient som installerades i Windows.

```text
$ mariadb --help

Default options are read from the following files in the given order:
C:\WINDOWS\my.ini
C:\WINDOWS\my.cnf
C:\my.ini
C:\my.cnf
C:\Program Files\MariaDB 10.6\my.ini
C:\Program Files\MariaDB 10.6\my.cnf
C:\Program Files\MariaDB 10.6\data\my.ini
C:\Program Files\MariaDB 10.6\data\my.cnf

The following groups are read:
mysql mariadb-client client client-server client-mariadb
```

Här kan du alltså placera filen i till exempel `C:\my.cnf`.



### Unixklienten mariadb {#unix}

Normalt sett kan du placera file `.my.cnf` i din hemmakatalog i den terminal du använder. En punkt framför filnamnet gör filen till en "dold fil", det är så de kallas när man sätter punkten framför.

För att kontrollera vilka filer som terminalklienten läser så kör du kommandot `mariadb --help`, det kommer en hel del utskrift och sedan skrollar du tillbaka till början av utskriften.

```text
Default options are read from the following files in the given order:
/etc/my.cnf /etc/mysql/my.cnf ~/.my.cnf

The following groups are read:
mysql client client-server client-mariadb
```

I alla bash-terminal (Linux, macOS, WSL2 bash) innebär det att du enklast placerar filen i `$HOME/.my.cnf` vilket är samma sak som `~/.my.cnf`.

Du kan kontrollera att du lagt filen på rätt plats så här.

```text
# For all bash terminals
ls -l $HOME/.my.cnf
cat $HOME/.my.cnf
```

Du bör också sätta rättigheterna på filen till 600 vilket innebär att bara du kan läsa filen.

```text
chmod 600 $HOME/.my.cnf
```

Om du får felmeddelande som påpekar att konfigurationsfilens rättigheter är alltför vidlyftiga, så löser du det genom att ändra filens rättigheter.

Felmeddelandet kan säga följande.

> "mysql: [Warning] World-writable config file '/home/mos/.my.cnf' is ignored."



Testa om konfigurationsfilen används {#test}
--------------------------------------

Du kan testa och se exakt vilka detaljer från konfigurationsfilen som används.

Det kan till exempel se ut så här med en konfigurationsfil som enbart anger user och password.

```text
$ mariadb --print-defaults
mariadb would have been started with the following arguments:
--user=dbadm --password=P@ssw0rd!
```

Om du inte får fram önskat resultat så provar du att kontrollera att du verkligen lagt din `my.cnf` på en plats som stöds av just din terminalklient.



Avslutningsvis {#avslut}
--------------------------------------

Nu skall det fungera. Denna konfigurationsfilen är bra att ha och jobbar man mycket med terminalprogrammen så kan det underlätta att spara viss konfigurationsinformation i filen.
