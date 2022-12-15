---
author: mos
category:
    - databas
    - mariadb
    - mysql workbench
revision:
    "2022-01-20": "(B, mos) Förtydligande om fel med lösenord."
    "2021-12-21": "(A, mos) Första utgåvan, sammanslagen från flera andra artiklar."
...
Installera MySQL WorkBench
==================================

[FIGURE src=image/mariadb/2021/macos/workbench-start.png?w=c5 class="right"]

Vi installerar desktopklienten MySQL Workbench och kopplar upp den mot en lokal databasserver i form av MariaDB.

<!--more-->



Förberedelse {#prep}
--------------------------------------

Du har installerat databasservern MariaDB och du kan koppla upp dig mot den via terminalklienten.

Du har skapat en lokal användare i databasservern.



Ladda hem och installera MySQL WorkBench {#download}
--------------------------------------

[MySQL Workbench](https://dev.mysql.com/doc/workbench/en/) är en desktopklient du kan använda för att jobba mot en databasserver i form av MySQL eller MariaDB. En desktopklient är ett bra alternativ och komplement till den terminalbaserade klienten.

Följ instruktionerna på sidan och ladda hem och installera rätt version som matchar ditt system.

Det är relativt smidigt att installera via installationsprogram till Windows och macOS. Det kan vara lite pilligare att installera Linux-varianten, sök hjälp på nätet om det krånglar.

När installationen är klar, starta applikationen MySQL Workbench.

Det kan se ut så här på Windows.

[FIGURE src=image/mariadb/2021/windows/workbench-start.png?w=w3 caption="Så här kan MySQL WorkBench se ut när du kör på Windows."]

Det kan se ut så här på macOS.

[FIGURE src=image/mariadb/2021/macos/workbench-start.png?w=w3 caption="Så här kan MySQL WorkBench se ut när du kör på macOS."]



Skapa koppling till databasservern {#connection}
--------------------------------------

Skapa en ny "MySQL Connection" och använd din användare "dbadm" (som du skapade tidigare) för att logga in till databasservern.

Det kan se ut så här när du konfigurerar din uppkoppling.

[FIGURE src=image/mariadb/2021/macos/workbench-add-connection.png?w=w3 caption="Fyll i detaljer för din uppkoppling."]

Troligen får du bekymmer med krav på SSL uppkoppling men det kan du lösa genom att gå till fliken "Advanced" och i fältet "Others" skriver du in `useSSL=0`.

[FIGURE src=image/mariadb/2021/macos/workbench-add-connection-advanced.png?w=w3 caption="Ta bort kravet på att SSL måste användas för uppkopplingen."]

Pröva med knappen "Test Connection" för att se om uppkopplingen lyckas. Workbench försöker då koppla upp sig mot din databasserver med de detaljer du angett.

Om du får en varning att du kopplar upp dig mot en "osupportad MariaDB" så är det bara att ignorera den. MySQL Workbench är främst en MySQL-produkt men det fungerar bra även mot MariaDB.

Spara uppkopplingen när den fungerar.



Problem att logga in? {#problem}
--------------------------------------

Om du får problem att logga in och användaren eller lösenordet inte stämmer, då kan du dubbelkolla att du verkligen kan logga in med terminalklienten med din användare dbadm.

Öppna en terminal.

```text
mariadb -udbadm -p
```

Du bör kunna köra ovan kommando, skriva in ditt lösenord, och sedan logga in med terminalklienten. När det fungerar så vet du vilket lösenord du kan använda tillsammans med användaren dbadm. Det bör även fungera i Workbench.



Testa MySQL WorkBench {#testa}
--------------------------------------

Använd din koppling till databasen. Prova sedan att köra följande kommandon och se vilken utskrift du får.

```text
SELECT USER();

SELECT VERSION();

SELECT NOW() AS 'The local time is';

SHOW DATABASES;
```

Så här kan det se ut när du kör kommandona i workbench.

[FIGURE src=image/mariadb/2021/macos/workbench-test-commands.png?w=w3 caption="Så här kan det se ut när du kör kommandon i Workbench."]

Nu har du en fungerande desktopklient. Fortsätt kika runt bland menyerna och se vad du kan göra i klienten.
