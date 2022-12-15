---
author: mos
category:
    - javascript
    - nodejs
    - mysql
    - express
    - er-modellering
    - kursen dbjs
    - kursen databas
revision:
    "2018-01-09": (A, mos) Första utgåvan.
...
Skapa en Eshop med två klienter
==================================

Du har utfört en ER-modellering av en databas för en Eshop och nu skall du implementera den.

Du skall delvis fylla databasen med data som du importerar från Excel via formatet CSV.

Du skall skapa två klienter, en terminalbaserad och en webbaserad. De båda klienterna skall visa information från din databas.

Du kan utföra denna uppgift enskilt, eller i samma grupp som utförde ER-modelleringen. 

<!--more-->

Alla lämnar in en egen lösning i sitt kursrepo, även om man jobbat i grupp.



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Skapa ER-modell för en databas (logisk/fysisk)](uppgift/skapa-er-modell-for-en-databas-logisk-fysisk)" och du har SQL DDL för att skapa databas och tabeller.

Du har löst uppgiften "[Flytta pengar med terminalprogram och med Express](uppgift/flytta-pengar-med-terminal-program-och-med-express)" och du har därmed både terminalklient och webbklient att utgå ifrån.



Introduktion {#intro}
-----------------------

Du skall knyta samman flera av de delar som du hittills lärt dig under kursen. Du skall implementera din databasmodell och bygga två klienter som visar information från databasen. Den datan du laddar i din databas skall komma från ett Excelark som du själv skapar och genererar en CSV-fil från.

Du har gjort liknande saker tidigare i kursen så det handlar mest om att sätta samma delar till en fungerande helhet.

Spara alla filer under samma katalog.

Tänk på att ha en god kodstruktur.



Krav {#krav}
-----------------------

1. Inloggningsdetaljer till databasen skall sparas i `config/db/eshop.json`.

1. SQL-filer lägger du i `sql/eshop`. Du har filen `setup.sql` för att skapa databasen och användaren. Du har `ddl.sql` för att skapa tabellerna.

1. Skapa ett Excelark, förslagsvis Google Sheet, skapa en flik för produktkategorier, en för produkter och en för kunder. Lägg in 7 rader produkter och 3 produktkategorier samt 3 kunder. Exportera flikarna som `product.csv`, `category.csv` samt `customer.csv` och spara i `sql/eshop`. I samma katalog, skapa filen `insert.sql` och skriv SQL-satser som laddar informationen från `*.csv` in till respektive tabell.

1. Ta en backup av databasen med mysqldump och spara i `sql/eshop/backup.sql`.

1. Bygg ett terminalprogram och spara main-funktionen i `cli.js`. Eventuell övrig kod lägger du i moduler under katalogen `src/`. Terminalprogrammet skall startas med `node cli.js`.

1. Ditt terminalprogram skall fungera som en oändlig kommandoloop där man kan skriva in kommandon som programmet utför. Det skall finnas ett kommando `menu` som visar menyn med samtliga kommandon. När man skriver kommandot `exit` skall programmet avslutas.

1. I terminalprogrammet, skapa kommandot `products` som visar en tabell över de produkter som finns.

1. Skapa en webbklient med Express. Servern startas via `index.js`.

1. I webbklienten, skapa routen `/eshop/index` som visar en välkomstssida med header, footer och navigering mellan sidorna. Alla sidor skall ha samma sidlayout och det skall gå att klicka sig fram mellan sidorna, via navigeringen.

1. I webbklienten, skapa en sida `/eshop/products` som visar en tabell över de produkter som finns.

1. Validera din kod.

```bash
# Flytta till kurskatalogen
dbwebb validate eshop1
```

Rätta eventuella fel som dyker upp och publisera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Gör följande om du har tid och ro.

1. Lägg till så att du kan visa information från tabellen för produktkategorierna, i båda klienterna.

1. Jobba på din kodstruktur så att du bli nöjd. Se till att du kan återanvända databaskoden mellan de båda klienterna. Strukturera koden i funktioner och moduler.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
