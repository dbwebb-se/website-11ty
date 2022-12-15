---
author: mos
category:
    - databas
    - mysql
    - windows
revision:
    "2022-01-20": "(B, mos) Mindre förtydligande om hur man startar klienten."
    "2021-12-21": "(A, mos) Flyttat till eget dokument."
...
MariaDB klient och Windows med cmd terminalen
==================================

Vi sätter upp en miljö där vi kan köra terminalklienten för mariadb i cmd-terminalen i Windows.

<!--more-->



Förberedelse {#prep}
--------------------------------------

Du har installerat databasen MariaDB i Windows 10 och du kan koppla upp dig mot den med en terminalklient.

Du kan hantera Windows inbyggda cmd terminal.



Öppna terminalklienten mariadb i cmd {#go}
--------------------------------------

Öppna en windows terminal genom att trycka `Windows key + r` och skriva in `cmd`.

Du behöver nu veta installationskatalogen för databasen MariaDB. Du angav det vid installationen.

Det kan till exempel vara en sökväg i stil med följande.

```text
C:\Program Files\MariaDB 10.6\bin>
```

Leta reda på din installationskatalog och flytta till den katalogen och dess bin-katalog.

Du kan nu starta terminalklienten "mariadb" som ligger i den katalogen.

Det kan se ut så här.

[FIGURE src=image/mariadb/2021/windows/mariadb-i-katalogen.png?w=w3 caption="Nu kan jag köra mariadb klienten genom att flytta till installationskatalogen."]



Lägg sökvägen i din PATH {#path}
--------------------------------------

Du kan lägga till alla terminalkommandon för MariaDB till din sökväg, din PATH. Då blir det enklare att starta programmet, oavsett vilken katalog du står i.

Så här gör du. Börja med att starta programmet `sysdm.cpl` via `Windows key + r`.

Du får upp ett fönster för "System Properties", välj fliken "Advanced" och klicka på "Environment Variables".

[FIGURE src=image/snapvt19/mysql-path-2.png caption="Öppna fönstret för Environment Variabels."]

Du får upp ett fönster för Environment Variables.

Välj "System variables -> Path" i listan och klicka "Edit...".

[FIGURE src=image/snapvt19/mysql-path-3.png caption="Välj att editera systemvariabeln för Path."]

Lägg till sökvägen till den katalog som innehåller din installation av terminalprogrammet mysql. I mitt fall var sökvägen `C:\Program Files\MariaDB 10.6\bin`.

Klicka på "New" och lägg dit sökvägen på en ny rad i listan. Klicka därefter på "Ok".

[FIGURE src=image/snapvt19/mysql-path-4.png caption="Välj att editera systemvariabeln för Path."]

Spara allt genom att klicka ned programmen du nyss öppnat.

Starta om din terminal `cmd` så att sökvägen och miljövariabeln PATH uppdateras.

Nu bör du kunna starta `mariadb` direkt i terminalen via följande kommando.

```text
mariadb -udbadm -pP@ssw0rd
```

Prova även att köra följande variant där du får mata in lösenordet för hand.

```text
mariadb -udbadm -p
```

Nu har du en fungerande terminalklient `mariadb` som du enkelt kan öppna oavsett vilken katalog du står i.
