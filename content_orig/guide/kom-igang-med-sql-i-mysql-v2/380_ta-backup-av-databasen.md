---
author: mos
revision:
    "2022-01-04": "(D, mos) Genomgången inför v2 och MariaDB."
    "2019-01-31": "(C, mos) Genomgången, mindre justeringar i text."
    "2018-04-24": "(B, mos) Använd -uroot vid mysqldump."
    "2018-01-09": "(A, mos) Första versionen, uppdelad av större dokument."
...
Ta backup av databasen
==================================

Vi skall ta en backup av databasen med verktyget mysqldump. Resultatet blir en testfil med SQL-kommandon som är både DDL för att skapa databas och tabeller samt DML för att lägga till innehållet i tabellerna.

Spara din backup i filen `skolan.sql`.

Vi får alltså hela vår databas exporterad till SQL-kommandon i en behändig fil som enkelt går att flytta mellan olika system.



Läs mer {#mer}
----------------------------------

Om du vill läsa mer om backup och hantering av databsen så kan du kika igenom artikeln "[Backup and Restore Overview](https://mariadb.com/kb/en/backup-and-restore-overview/)".

Det finns flera alternativa verktyg för att ta backup av databasen och i denna artikel använder vi `mysqldump` eller `mariadb-dump` som egentligen är samma verktyg. Läs mer om [mysqldump](https://mariadb.com/kb/en/mysqldump/).



Var ligger kommandot? {#var}
----------------------------------

På min dator kan jag använda `which mysqldump` för att se var kommandot finns. Du bör finna det på samma plats där kommandot mariadb finns.

```bash
$ which mariadb
/usr/bin/mariadb

$ which mysqldump
/usr/bin/mysqldump
```

På din dator kan de ligga på en annan plats, beroende av hur du installerat MariaDB.

När du hittar programmet kan du dubbelkolla att det går att köra genom att visa dess version.

```text
$ mysqldump --version
mysqldump  Ver 10.19 Distrib 10.5.10-MariaDB, for debian-linux-gnu (x86_64)
```

Du kan ha en helt annan version än den jag har.

Då är vi redo.



Skapa backupfil {#backup}
----------------------------------

Låt oss ta en backup på databasen skolan. Du behöver använda en databasanvändare som har root-behörighet, eller behörighet att läsa alla databaser.

Så här kan du köra kommandot för att ta en databasbackup av databasen "skolan".

```text
mysqldump skolan
```

Du ser en massa SQL kommandon flöda på skärmen. Det blir enklare om du sparar all utskrift i en fil "skolan.sql".

Så här gör du för att ta en backup på databasen "skolan" och spara den i filen "skolan.sql".

```text
mysqldump --result-file=skolan.sql skolan
```

Nu finns alla SQL-kommandon som kan återskapa databasen skolan i filen `skolan.sql`. Öppna filen i din texteditor och dubbelkolla vad den innehåller. Du bör se spår av både DDL för att skapa databasens schema samt de INSERT satser som fyller databasen med dess innehåll.

Spara filen som en backup, såna är alltid bra att ha.



Skapa en kopia av en databas {#kopia}
----------------------------------

Låt säga att du nu vill återskapa databasen skolan, men du vill lägga den i en helt annan databas, som extra backup.

Då skapar du en ny databas, tex skolan1, och sedan kan du läsa in backupen till den databasen.

Det kan se ut så här när du är i terminalklienten.

```text
MariaDB [(none)]> CREATE DATABASE skolan1;
Query OK, 1 row affected (0.004 sec)

MariaDB [(none)]> use skolan1;
Database changed
MariaDB [skolan1]> source skolan.sql
-- många utskrifter när backupskriptet körs
MariaDB [skolan1]> show tables;
+-------------------+
| Tables_in_skolan1 |
+-------------------+
| kurs              |
| kurstillfalle     |
| larare            |
| larare_pre        |
| v_larare          |
| v_lonerevision    |
| v_namn_alder      |
| v_planering       |
+-------------------+
8 rows in set (0.001 sec)
```

Nu har du en kopia av databasen skolan, i skolan1.

Det är mycket bra att enkelt kunna skapa en sådan här kopia av en databas. ibland vill man felsöka och dubbelkolla att backupen fungerar och att databasen kan återställas. Detta är ett sätt att testa det.


<!--

Detta bör inte vara ett problem numer.

Alltid radbrytningar alá Unix {#radbryt}
----------------------------------

När du använder konstruktionen `> skolan.sql` så innebär det att resultatfilen skapas med inflytande av det operativsystem du jobbar på. Konstruktionen kallas _output redirection_ och skapar en fil med innehållet som skrivs ut av kommandot. När du är på Windows kan det innebära att din backupfil skapas med Windows stil radbrytningar och vi vill ha Unix stil radbrytningar.

När du är på Windows kan du istället skapa backup-filen på följande sätt.

```text
# Båda ger samma resultat
mysqldump --result-file=skolan.sql skolan
mysqldump -r skolan.sql skolan
```

Det ger att du får Unix stil NL `\n` som radbrytning och undviker eventuella problem med CRLF Windows stil radbrytning med `\r\n`.

Du kan dubbelkolla vilka radbrytningar filen har med kommandot `file`.

Det ska se ut ungefär så här.

```text
$ file skolan.sql
skolan.sql: UTF-8 Unicode text, with very long lines
```

Så här kan det se ut när du har Windows radbrytningar, det är inte önskvärt i vårt sammanhang.

```text
$ file skolan.sql
skolan.sql: UTF-8 Unicode text, with very long lines, with CRLF line terminators
```
-->
