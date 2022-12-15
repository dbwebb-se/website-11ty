---
author: mos
category:
    - javascript
    - nodejs
    - mysql
    - express
    - kursen databas
revision:
    "2018-02-20": "(A, mos) Första utgåvan."
...
Bygg kursbeställningsverktyg till skolan
==================================

Bygg en terminaklient och en webbaserad klient som löser delar av ett beställningsverktyg för utbildningsprogram och kurser till skolan.

Klienterna jobbar mot ett API mot databasen, ett API som består av lagrade procedurer och döljer själva implementationen i databasen.

<!--more-->

Uppgiften skall lösas individuellt.



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört följande del i guiden "[Kom igång med SQL i MySQL (Programmera i databasen)](guide/kom-igang-med-sql-i-mysql/programmera-i-databasen)".

Du har sedan tidigare kodbas för att skapa terminaklient och webbklient i Express med Node.js och JavaScript.



Introduktion {#intro}
-----------------------

Du skall utgå från den databas du skapade i "[Kom igång med SQL i MySQL (Programmera i databasen)](guide/kom-igang-med-sql-i-mysql/programmera-i-databasen)" och du skall bygga en terminalklient och en webbklient mot den databasen.

Du har tidigare kod som du kan utgå ifrån. Kopiera den för att komma igång snabbt. Men, i denna uppgiften vill jag att du försöker ha så specifik kod som möjligt, rensa bort allt som du inte behöver i terminalklienten eller i webbklienten. Främst är det ju webbklienten som du kopierat och byggt ut sedan kmom04. Ta nu tillfället i akt och renodla koden så den enbart löser denna uppgiften, ta bort kod som är relaterad till äldre kmoms.

Du har gjort en hel del liknande programmering tidigare. Se denna uppgift delvis som repetition och som en möjlighet att städa i din kod så den ser bra ut. Tänk att du vill återanvända koden inför det stundande projektet, så städa väl, se det som ren förberedelse.



Krav {#krav}
-----------------------

1. Inloggningsdetaljer till databasen skall sparas i `config/db/skolan.json`. Jobba mot databasen skolan med användare:lösen som tidigare, user:pass.

1. De SQL-filer som används för att skapa databasen är de som du skapat i guiden Kom igång med SQL i MySQL (Programmera i databasen). Låt dem ligga där de ligger men försäkra dig om att man kan återskapa din databas via `program_ddl.sql` följt av `program_insert.sql`.

1. Skapa en menydriven terminalklient i `cli.js`. Ditt terminalprogram skall fungera som en oändlig kommandoloop där man kan skriva in kommandon som programmet utför. Det skall finnas ett kommando `menu` som visar menyn med samtliga kommandon. När man skriver kommandot `exit` skall programmet avslutas.

1. I terminalprogrammet, skapa kommandot `pt` som visar en tabell över de programtillfällen som finns.

1. I terminalprogrammet, skapa kommandot `kt <programtillfalle> <kurskod> <lasperiod>` som beställer ett nytt kurstillfälle till ett programtillfälle.

1. I terminalprogrammet, skapa kommandot `log <antal>` som visar _antal_ rader som senast lagts in i loggen.

1. Skapa en webbklient med Express. Servern startas via `node index.js`.

1. I webbklienten, skapa routen `/` som visar en välkomstssida med header, footer och navigering mellan sidorna. Alla sidor skall ha samma sidlayout och det skall gå att klicka sig fram mellan sidorna, via navigeringen.

1. I webbklienten, skapa en sida `/log` som visar innehållet i loggtabellen.

1. I webbklienten, skapa en sida `/kurstillfallen` som visar de kurstillfällen som finns, tillsammans med deras status "Beställd/Godkänd". Rapporten skall innehålla det som beskrivs i [Rapporter med JOIN](guide/kom-igang-med-sql-i-mysql/rapporter-med-joins).

1. Skapa en/flera routes/formulär där "rektorn" kan godkänna en kursbeställning och tilldela en kursansvarig.

1. Validera din kod.

```bash
# Flytta till kurskatalogen
dbwebb validate bestall
```

Rätta eventuella fel som dyker upp och publisera igen. När det ser grönt ut så är du klar.



<!--

Extrauppgift {#extra}
-----------------------


Gör följande om du har tid och ro.

1. Gör så att använderen måste logga in.

1. Ge flash-meddelande när kurstillfället godkänns.
-->


Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
