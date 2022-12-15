---
author: mos
category:
    - kurs databas
    - kurs oophp
    - kurs ramverk1
    - labbmiljo
    - databas
    - mysql
    - mariadb
    - mysql workbench
revision:
    "2018-03-20": (G, mos) Genomgången inför lp4 vt18, mindre justeringar om hur installationen är gjord.
    "2017-12-27": (F, mos) Stycke om förutsättning och länk till installation.
    "2017-03-02": (E, mos) Logga in med användare root.
    "2017-02-23": (D, mos) Bort med MAMP och WAMP, bara kvar med XAMPP samt genomgång.
    "2015-03-05": (C, mos) Info om CLI på XAMPP och MAC.
    "2014-11-10": (B, mos) La till info om XAMPP MySQL cli och phpmyadmin.
    "2013-08-16": (A, mos) Första utgåvan som en del av kursen [oophp](oophp).
...
Kom igång med databasen MySQL / MariaDB och dess klienter
==================================

[FIGURE src="image/snapvt17/mysql-logo.png" class="right"]

Databasen MySQL är populär i webbsammanhang och det finns ett par olika klienter att välja bland när man jobbar med databasen. Som webbutvecklare behöver man vara bekant med ett par av dem. Beroende på hur webbservern och databasservern är installerad så kan du som webbprogrammerare, till och från, behöva använda olika klienter.

Låt oss därför kika lite på databasen MySQL och dess olika klienter.

<!--more-->



Förutsättning {#pre}
------------------------------

Artiklen förutsätter att du har tillgång till MySQL/MariaDB och har gjort en lokal installation.

I [labbmiljön för dbwebb](labbmiljo/mysql) finns olika sätt att installera MySQL / MariaDB och dess olika klienter. Du kan installera MySQL via dess egna installationsprogram eller som en del av XAMPP.

Denna artikel är främst skriven för den som har installerat XAMPP och har tillgång till terminalklienten via XAMPP och webbklienten PHPMyAdmin via XAMPP. Om du har installerat på annat sätt så kan du säkert anpassa dig och starta klienterna i din egen miljö och använda SQL-koden fån artikeln för att testa klienterna.



Databasen MySQL {#mysql}
------------------------------



###Introduktion {#intro}

Databasen MySQL [^1] [^2] är en mycket vanlig databas i webb-sammanhang. Databasen är öppen källkod och finns att ladda ned och installera till ett flertal operativsystem. 

MySQL ägdes från början av ett svenskt företag som köptes upp och numer ägs den av databasföretaget Oracle. Många entusiaster i opensource-världen är inte riktigt nöjda med att MySQL numer ägs av ett kommersiellt företag såsom Oracle och det har gjort att ett ökat stöd för alternativa databaser har växt fram, bland annat rena kloner av MySQL. MariaDB [^3] [^4] är en sådan klon och kan vara ett alternativ för en rätttroende opensource:are. De klienter som visas i denna artikel fungerar också mot MariaDB som är kompatibelt med MySQL.



###Ladda ned och installera {#installera}

Åter till MySQL. Det går att ladda ned ett installationsprogram från [hemsidan](http://dev.mysql.com/downloads/) och installera, eller så kommer databasen med automatiskt när man installerar LAMP, WAMP, MAMP eller motsvarande som är en samling av Apache, PHP och MySQL.

När man väl har installerat och startat igång databasen så ligger den normalt och lyssnar på porten 3306 och det är dit som en klient kopplar upp sig. Databasen körs som en server och det behövs klientprogram för att koppla upp sig och jobba mot databasen. Databasen har ett behörighetssystem där man måste ange användare och lösenord för att koppla upp sig. Det är något man ställer in när man installerar databasen.

Beroende på hur du har installerat MySQL så kan du behöva kontrollera både vilken port, vilken användare och vilket lösenord som gäller som standard vid installationen. 

I detta dokumentet så förutsätter jag att du har en installation av XAMPP. Har du en alternativ miljö så kan du säkert anpassa dig och hoppa över de rubriker som börjar med XAMPP.



###Referensmanualen, din bästa vän {#refman}

När du börjar kika lite mer på databasen MySQL så är det ofrånkomligt att du måste lära dig att hantera referensmanualen. Gör den till din bästa vän och lär dig sökfunktionen och innehållsförteckningen. Du kan alltid googla och då får säkert en massa svar och något kanske till och med är rätt. Men, när du är i [referensmanualen](http://dev.mysql.com/doc/refman/5.7/en/) så kan du vara säker på att saker och ting stämmer så gott det går. Det finns en referensmanual för varje version av MySQL, ibland behöver du kontrollera att du läser i rätt version, innehållet kan skilja mellan versionerna, även om grunden är rätt stabil.

[INFO]
Referensmanualen -- din bästa vän -- glöm inte det.
[/INFO]

Låt oss kika på de olika klienterna.



MySQL CLU (command line utility) {#clu}
------------------------------

Den första klienten vi bekantar oss med är en textbaserad klient, ett "command line interface (CLI)" eller "command line utility (CLU)".



###XAMPP och MySQL CLU (Windows) {#xamppclu}

Du startar först upp ett shell via menyn, klicka på knappen "Shell".

[FIGURE src=/image/xampp/xampp-shell.png?w=w1 caption="Starta ett shell i XAMPP."]

Skriv sedan kommandot `mysql -uroot` och du blir inloggad som användare `root`, utan att behöva ange lösenord.

[FIGURE src=/image/xampp/xampp-mysql-cli.png?w=w1 caption="Kör MySQL CLI i shellet."]

I nyare versioner av XAMPP kommer du att se MariaDB istället för MySQL. De är likvärdiga.



###XAMPP och MySQL CLU (Mac) {#mampclu}

Du startar via xterm-appen (finns i Applications) och genom att skriva hela sökvägen till kommandot.

```bash
/Applications/XAMPP/bin/mysql -uroot
```

Alternativet `-uroot` säger vilken användare du vill använda när du kopplar dig till databasen.

[FIGURE src=/image/snapshot/mamp-mysql-clu.jpg?w=w1&q=70 caption="MySQL CLU via terminalen."]

Du blir inloggad direkt, utan att behöva ange lösenord. 



###Testa MySQL CLU {#clu-test}

När du är i MySQL CLU kan du skriva `help` för att se vilka hjälpkommandon som finns tillgängliga.

[FIGURE src=/image/snapshot/mamp-mysql-clu-help.jpg?w=w1&q=70 caption="Skapar en databas med innehåll för att testa klienten."]

Vill du skriva SQL så är det bara att skriva på. Här är en lista på ett par SQL kommandon som hjälper dig att komma igång och bekanta dig med klienten.

```sql
SHOW DATABASES;
CREATE DATABASE mos;
USE mos;
CREATE TABLE Test(i INT);
SHOW TABLES;
INSERT INTO Test VALUES(1), (2), (3);
SELECT * FROM Test;
DROP DATABASE mos;
```

Så här kan det se ut om du kör dem.

[FIGURE src=/image/snapshot/mamp-mysql-clu-test.jpg?w=w1&q=70 caption="Skapar en databas med innehåll för att testa klienten."]

Du kan avsluta din session genom att skriva `quit`.



###MySQL CLU kommentar {#clu-komment}

Kommandoradsinterfacet är bra att kunna, ibland är man på samma maskin som databasen, eller har tillgång till en SSH-koppling till maskinen och känner sig bekväm att jobba på kommandoraden. Är man nybörjare och inte så van vid textbaserade interaface, så kan det vara en liten tröskel innan man kommer igång. Men det är en en mycket kraftfull och kompetent klient till MySQL.



PHPMyAdmin {#phpmyadmin}
------------------------------

PHPMyAdmin [^5] [^6] är en webb-baserad klient som låter dig sköta din MySQL databas via ett webbgränssnitt. PHPMyAdmin är utvecklad i PHP. Skaffa dig en snabb överblick av PHPMyAdmin genom att besöka [dess webbplats](http://www.phpmyadmin.net/).


###XAMPP och PHPMyAdmin {#xamppphpmyadmin}

PHPMyAdmin når du via länken http://localhost:8080/phpmyadmin, förutsatt att din webbserver lyssnar på porten 8080. Det är konfigurerat så att du inte behöver ange någon användare eller lösenord.

Du blir normalt inloggad som användaren `root`.

[FIGURE src=/image/xampp/xampp-phpmyadmin.png?w=w1 caption="Så här ser det ut när du kör PHPMyAdmin i XAMPP."]



###Testa PHPMyAdmin {#phpmyadmin-test}

När du jobbar i PHPMyAdmin så finns det ett grafiska gränssnitt för att skapa databaser och tabeller. Men du kan också skriva in SQL-kod direkt. Leta runt och se om du kan hitta motsvarigheten till följande kommandon.

```sql
SHOW DATABASES;
CREATE DATABASE mos;
USE mos;
CREATE TABLE Test(i INT);
SHOW TABLES;
INSERT INTO Test VALUES(1), (2), (3);
SELECT * FROM Test;
DROP DATABASE mos;
```

När du har gjort dem via PHPMyAdmin så vet du att du kan grunderna.



###PHPMyAdmin kommentar {#phpmyadmin-komment}

Gillar man webbaserade verktyg så är PHPMyAdmin valet. När man lägger upp en webbplats hos en extern driftpartner så brukar det vara PHPMyAdmin som är den klient man har tillgång till i första hand. En fördel med PHPMyAdmin är att det är lätt att ta en hel backup av databasen och lika lätt att ladda upp en ny databas, med innehåll, via SQL-satser i en fil. Behärskar du detta så kommer du att känna dig bekväm när du installerar webbplatser hos olika driftspartners.



MySQL Workbench {#workbench}
------------------------------

MySQL Workbench [^7] [^8] [^9] är en fönsterbaserad applikation, ett grafiskt verktyg för utveckling och design av databaser i MySQL. Skaffa dig en snabb överblick av MySQL Workbench genom att besöka [dess webbplats](http://www.mysql.com/products/workbench/).

Du laddar ned programvaran från hemsidan och installera enligt anvisningarna. Ladda endast ned installationsprogrammet för Workbench och inte det som även installerar databasen, för den har du redan. Var uppmärksam på att det kan finnas andra libb som du behöver installera separat, för att Workbench skall fungera.



###Testa MySQL Workbench {#workbench-test}

Det finns mycket du kan göra i MySQL Workbench men även här fungerar de vanliga SQL-konstruktionerna. Även om det finns alternativ till att grafiskt skapa databaser och tabeller så kan du fortfarande använda rena SQL-kommandon. 

Det första du behöver göra är att skapa en ny koppling mot din databas. Det kan se ut så här.

[FIGURE src=/image/snapshot/mysql-workbench-new-connection.jpg?w=w1 caption="Skapa en koppling till databasen."]

Så här kan det se ut när du jobbar i MySQL Workbench.

[FIGURE src=/image/snapshot/mysql-workbench-commands.jpg?w=w1 caption="Testar olika kommandon i MySQL Workbench."]



###Kommentar om MySQL Workbench {#workbench-komment}

MySQL Workbench är ett mycket kompetent verktyg och fungerar mycket väl, det är en blandning av traditionella SQL-satser och meny-val som kan underlätta arbetet med databasen. 

Det är det enkelt att skapa en ssh-tunnel, med Workbench, till en databasserver som ligger skyddad bakom en brandvägg men är nåbar via en ssh-tunnel. Det är något som jag själv ofta använder och finner oerhört smidigt.

I MySQL Workbench kan du också modellera din databas och rita ER-diagram. Om du vill dokumentera din befintliga databas så kan du göra det via “Reverse Engineering”. Här kan du läsa om hur du kan skapa en [grafisk modell av en befintlig databas](coachen/reverse-engineering-av-databasen-mysql-med-workbench).



Avslutningsvis {#avslutning}
------------------------------

Sammanfattningsvis så gäller att du kan behöva använda alla tre klienterna vid olika tillfällen, så det bästa du kan göra är att bekanta dig med alla tre och sedan välja det du gillar bäst för ditt vardagliga arbetet.

Frågor och kommentarer tar vi i forumet där det finns en [specifik tråd för MySQL och dess klienter](t/6263).



Referenser {#referenser}
------------------------

Följande är referenser som använts som fotnötter i texten.

[^1]: [Hemsida för databasens MySQL](http://www.mysql.com/).

[^2]: [Wikipedia om databasens MySQL](http://en.wikipedia.org/wiki/MySQL).

[^3]: [Hemsida för databasens MariaDB](https://mariadb.org/).

[^4]: [Wikipedia om databasens MariaDB](http://en.wikipedia.org/wiki/MariaDB).

[^5]: [Hemsida för PHPMyAdmin](http://www.phpmyadmin.net/).

[^6]: [Wikipedia om PHPMyAdmin](http://en.wikipedia.org/wiki/PhpMyAdmin).

[^7]: [Hemsida för MySQL Workbench](http://www.mysql.com/products/workbench/).

[^8]: [Wikipedia om MySQL WorkBench](http://en.wikipedia.org/wiki/MySQL_Workbench).

[^9]: [MySQL WorkBench Community Blog](http://mysqlworkbench.org/).
