---
author: mos
revision:
    "2019-01-31": "(C, mos) Genomgången, mindre justeringar i text."
    "2018-04-24": "(B, mos) Använd -uroot vid mysqldump."
    "2018-01-09": "(A, mos) Första versionen, uppdelad av större dokument."
...
Ta backup av databasen
==================================

Vi skall ta en backup av databasen med verktyget mysqldump. Resultatet blir en testfil med SQL-kommandon som är både DDL för att skapa databas och tabeller samt DML för att lägga till innehållet i tabellerna.

Spara din backup i filen `skolan.sql`.

Vi får alltså hela vår databas exporterad till SQL-kommandon i en behändig fil som enkelt går att flytta mellan olika system.

Du kan läsa om programmet [mysqldump i manualen](https://dev.mysql.com/doc/refman/5.7/en/mysqldump.html).



Var ligger kommandot? {#var}
----------------------------------

På min dator kan jag använda `which mysqldump` för att se var kommandot finns. Du bör finna det på samma plats där kommandot mysql finns.

```bash
$ which mysql
/usr/bin/mysql

$ which mysqldump
/usr/bin/mysqldump
```

På din dator kan de ligga på en annan plats, beroende av hur du installerat MySQL.

När du hittar programmet kan du dubbelkolla att det går att köra genom att visa dess version.

```text
$ mysqldump --version
mysqldump  Ver 10.13 Distrib 5.6.30, for debian-linux-gnu (x86_64)
```

Du kan ha en helt annan version än den jag har.

Då är vi redo.



Skapa backupfil {#backup}
----------------------------------

Låt oss ta en backup på databasen skolan. Använd root-användaren för att ta backupen.

```text
mysqldump -uroot -p skolan > skolan.sql
```

Nu finns alla SQL-kommandon som kan återskapa databasen skolan i filen `skolan.sql`.

Spara filen som en backup, såna är bra att ha.



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



Skapa en kopia av en databas {#kopia}
----------------------------------

Låt säga att du nu vill återskapa databasen skolan, men du vill lägga den i en helt annan databas, som extra backup.

Då skapar du en ny databas, tex skolan1, och eventuellt gör du grant på en user till databasen. Dina användare kan redan ha tillgång till alla databaser, det beror av vilken GRANT du gett dem.

Sedan kör du filen för att återskapa alla tabeller och deras innehåll.

```bash
# Låt säga att du har skapat en ny databas som heter skolan1
$ mysql -uuser -ppass skolan1 < skolan.sql
```

Får du problem med rättigheter så prövar du användare `-uroot` istället.

Nu har du en kopia av databasen skolan, i skolan1.

Pröva att du kan skapa en ny databas skolan1 och dubbelkolla att den innehåller en exakt kopia av alla tabeller.
