---
author: mos
category:
    - javascript
    - nodejs
    - mysql
    - express
    - kursen databas
revision:
    "2022-01-05": "(F, mos) Genomgången inför vt22."
    "2021-01-18": "(E, mos) Specificera tydligare vilken databas som gäller."
    "2020-03-03": "(D, mos) Kommandot move även på terminalklienten."
    "2019-02-12": "(C, mos) Förtydliga hur konfigurationsfilen uppdateras."
    "2019-02-08": "(B, mos) Genomgången fokus mot kursen databas."
    "2018-01-09": "(A, mos) Första utgåvan."
...
Flytta pengar med terminalprogram och med Express
==================================

Du skall bygga två klienter mot en databas, den ena klienten är textbaserad och körs i terminalen med ett menysystem och kommandon. Den andra klienten är webbaserad och använder Express som server.

Databasen innehåller en tabell som simulerar bankkonton och du skall via båda klientern utföra funktionen att flytta pengar mellan kontona.

Flytten av pengar skall utföras inom ramen av en transaktion.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom "[Transaktioner i databas](kunskap/transaktioner-i-databas)" och du har tillgång till databasen från exemplet.

Du har jobba igenom artikeln "[Koppla appservern Express till databasen MySQL](kunskap/koppla-appservern-express-till-databasen-mysql)" och du har en kodbas från artikeln som ger dig en webbklient.

Du har tidigare löst uppgiften "[Node.js terminalprogram mot MySQL med kommandoloop](uppgift/nodejs-terminalprogram-mot-mysql-med-kommandoloop)" och har därmed ett terminalprogram att utgå ifrån.



Introduktion {#intro}
-----------------------

Du har skapat en webbklient där du kan visa innehållet från databasen i en tabell.

Du har sedan tidigare skapat en terminalklient där du kan utföra kommandon via ett menysystem i en kommandoloop.

Du skall nu utföra funktionen att flytta pengar mellan två konton och man skall kunna göra det via terminalklienten och via webbklienten.

I båda klienterna så hårdkodar vi att 1.5 pengar flyttas från ena kontot till det andra. Användaren kan i detta läget inte bestämma hur mycket pengar som flyttas eller från vilket konto och till vilket konto.

Utseendet på webbklienten kan vara så här. Varje gång du laddar om sidan så flyttas mer pengar.

[FIGURE src=image/snapvt18/bank-move-to-adam.png caption="Adam har precis fått 1.5 pengar."]

Utseendet på terminalklienten kan vara så här.

[FIGURE src=image/snapvt18/bank-terminal-move.png caption="Via terminalklienten kan du flytta pengar till Eva, i skydd av en transaktion."]

Tänk på din kodstruktur, här finns kod som går att återanvända och dela mellan klienterna. Ett visst fokus i uppgiften är att finna en struktur där du kan dela kod mellan de båda klienterna. Här är en bra möjlighet att vara [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself) i sin kod genom att använda moduler/funktioner för kod som kan delas mellan webbklienten och terminalklienten.



Flera SQL frågor inuti en {#flera}
-----------------------

I [npm-modulen mysql](https://www.npmjs.com/package/mysql) finns möjligheten att utföra en [multiquery](https://www.npmjs.com/package/mysql#multiple-statement-queries), ett anrop till databasen som består av flera SQL-satser. Det är något som passar bra i denna uppgiften där vi vill använda transaktioner för att säkerställa flytten av pengar.

I länken ovan visas hur du enablar multiquery i modulen, det är avstängt från början. Sätter du inte på det så får du ett felmeddelande på andra SQL-satsen.

Du sätter på funktionen genom att lägga till följande inställning i din konfiguration i `config/db/bank.json`.

```json
{
    "multipleStatements": true
}
```

Din konfigurationsfil kan alltså se ut så här.

```json
{
    "host":     "localhost",
    "user":     "user",
    "password": "pass",
    "database": "dbwebb",
    "multipleStatements": true
}
```



Krav {#krav}
-----------------------

1. Dina klienter kommer att testas mot den databas som finns i exemplet "[Transaktioner i databas](kunskap/transaktioner-i-databas)". Du kan alltså inte göra ändringar i databasens struktur.

1. Flytten av pengar skall alltid utföras inom ramen för en transaktion.

1. Din webbklient skall startas utifrån skriptet `index.js` med `node index.js`.

1. Inloggningsdetaljer till databasen skall sparas i `config/db/bank.json` och delas mellan webbklient och terminalklient.

1. Din webbklient har en sida `bank/index` som hälsar välkommen till banken och visar en meny över de saker man kan göra.

1. Din webbklient har en sida `bank/balance` som visar en kontoöversikt.

1. Bygg vidare på din webbklient och lägg till en sida `bank/move-to-adam`. Varje gång man går in på den sidan skall det flyttas 1.5 pengar från Eva till Adam. Sidan visar bara ett tackmeddelande från Adam som tackar för pengarna.

1. Sidlayouten skall vara gemensam header och footer för samtliga sidor.

1. Det skall finnas en meny i header som ger en navigeringsmöjlighet mellan de sidor som är relaterade till banken.

1. Bygg ett terminalprogram och spara main-funktionen i `cli.js`. Terminalprogrammet skall startas med `node cli.js`.

1. Kod, funktioner, moduler och klasser som delas mellan webbklienten och terminalklienten placerar du i katalogen `src/` och de skall sedan importeras till de mainprogram som använder dem.

1. Ditt terminalprogram skall fungera som en oändlig kommandoloop där man kan skriva in kommandon som programmet utför. Det skall finnas ett kommando `menu` som visar menyn med samtliga kommandon. När man skriver kommandot `exit` skall programmet avslutas.

1. I terminalprogrammet, skapa kommandot `move` som flyttar 1.5 pengar från Adam till Eva (notera att webbklienten flyttar pengar i motsatt riktning). TIPS: se första extrauppgiften nedan, det kan förenkla din implementation.

1. I terminalprogrammet, skapa kommandot `balance` som visar en översikt av de konton som finns och kontobehållningen.

1. Validera din kod.

```text
# Flytta till kurskatalogen
dbwebb validate express-sql

dbwebb test express-sql
```

Rätta eventuella fel som dyker upp och publisera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Gör följande om du har tid och ro.

1. Se till att skriva en funktion som flyttar pengarna och dela den mellan webbklienten och terminalklienten. Funktionen kan ta parametrar för `fromAccount`, `toAccount` och `amount`. Då får du en god kodstruktur.

1. Lägg till kommandot `move <amount>` i din terminalklient, eller gör det ännu mer flexibelt med `move <amount> <from> <to>`.

1. Snygga till din webklient med CSS och se över så att navigeringen är smidig mellan sidorna.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i chatt eller forum om du behöver hjälp!
