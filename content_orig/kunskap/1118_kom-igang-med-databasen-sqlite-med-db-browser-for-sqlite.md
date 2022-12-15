---
author: mos
category:
    - databas
    - sql
revision:
    "2018-09-24": "(C, mos) Ny utgåva, genomgången och bytte ut Firefox SQLite Manager mot DB Browser for SQLite."
    "2017-01-09": "(B, mos) Stödjer både htmlphp och dbjs."
    "2015-06-05": "(A, mos) Första utgåvan för htmlphp version 2 av kursen."
...
Kom igång med databasen SQLite med DB Browser för SQLite
==================================

[FIGURE src=/image/sqlite20/sqlite-logo.gif class="right"]

En guide för att stegvis komma igång med databasen SQLite och SQL. Guiden hanterar grunderna i SQLite och SQL. Vi skapar en enkel databas i SQLite och använder ett par verktyg för att jobba mot databasen.

<!--more-->

Bästa sättet att gå igenom guiden är att genomföra varje övning på egen hand. Gör precis som jag gjort, fast på egen hand. Kopiera eller skriv om kodexemplen, det viktiga är att du återskapar koden i din egna miljö. Läsa är bra men man måste göra själv, "kan själv", för att lära sig.



Förutsättning {#pre}
--------------------------------------

Det förutsätts att du har tillgång till en kursmiljö som motsvarar kursen htmlphp.

I artikeln refereras till kodexempel som finns med som en del i kursrepot htmlphp. 



Om SQLite {#om}
--------------------------------------

SQLite är ett programvarubibliotek i programspråket C som implementerar en filbaserad SQL-databas. SQLite är opensource. Enligt deras webbplats är SQLite är den mest spridda databasen i världen. Bekanta dig med informationen på [deras hemsida](http://www.sqlite.org/).

SQLite är filbaserad vilket innebär att hela databasen finns lagrad i en enda fil på disk. Vill man flytta databasen så räcker det att flytta filen, eller kopiera filen eller skicka hela filen via ett mail eller spara på ett usb-minne. Det behövs ingen särskild konfiguration av användare och lösenord. Enkelheten är en av fördelarna med en filbaserad databas.

SQLite stödjer de vanliga SQL-konstruktionerna. Ta en titt på vilka [SQL-konstruktioner som stöds i SQLite](http://www.sqlite.org/lang.html). Om du redan är bekant med SQL-språket så kommer du att känna igen dig, om inte så kommer vi till detta lite längre ned i guiden.

SQL står för "Structured Query Language" och är ett standardiserad sätt att ställa frågor till en relationsdatabas. Läs kort om [SQL på Wikipedia](http://sv.wikipedia.org/wiki/SQL).



DB Browser for SQLite {#sqlitebrowser}
--------------------------------------

DB Browser for SQLite är ett desktopbaserat, grafiskt användargränssnitt för databaser i SQlite. I resten av artikeln kommer jag att referera till verktyget som SQLiteBrowser.

Med verktyget kan du skapa nya databaser, skapa tabeller, lägga till och redigera innehållet (rader, kolumner) i tabellerna, söka i dem och skriva vanliga SQL-satser.

DB Browser för SQLite är öppen källkod och du kan se och följa projektet på [GitHub sqlitebrowser/sqlitebrowser](https://github.com/sqlitebrowser/sqlitebrowser).

Du kan läsa om projektet på deras [hemsida sqlitebrowser.org](https://sqlitebrowser.org/). Där kan du även se installationsinstruktioner om hur du laddar ned och installerar verktyget på din egen dator.

När du är klar kan du starta upp SQLiteBrowser.

[FIGURE src=image/snapht18/sqlitebrowser-start.png?w=w3 caption="Verktyget SQLiteBrowser är redo för att jobba med databaser."]

Se dig om i verktyget, bekanta dig med menyerna, menyvalen och olika inställningsmöjligheter under options. Vi skall snart börja använda verktyget för att jobba med en nya databas.



Skapa en ny databas {#createdb}
--------------------------------------

Börja med att skapa en ny databas och döp den till test.

[FIGURE src=image/snapht18/sqlitebrowser-create-db.png?w=w3 caption="Skapa en ny databas som lagras som en fil med filnamn test.sqlite."]

Nästa steg är att skapa en tabell i din databas.



Skapa en ny tabell {#createtable}
--------------------------------------

Innan vi är klara med att skapa databasen så vill verktyget att vi även skapar en tabell. Då gör vi det.

Vi skapar en tabell för kurser. Tabellen döper vi till till "kurs" och vi börjar med att lägga tre kolumner (kod, namn, poang) i tabellen.

Tanken är att vi sparar ett antal kurser och detaljer om kurserna i tabellen.

[FIGURE src=image/snapht18/sqlitebrowser-create-table-kurs.png?w=w3 caption="Vi skapar tabellen kurs med tre kolumner."]

Varje kolumn har en datatyp som säger vilket typ av data som kolumnen lagrar. I databas-sammanhang är det viktigt att ange rätt typ från början. Vår typ av databaser, relationsdatabasen, jobbar med hård typning. I vårt fall bli kolumnerna typade enligt `kod TEXT`, `namn TEXT` och `poang REAL`. Kolumnerna kod och namn är textsträngar medan kolumnen poang är ett flyttal. Datatypen REAL kan du jämföra med float och boolean.

Vill du lära dig mer om datatyperna så kan du läsa hur [SQLite stöder datatyperna NULL, INTEGER, REAL, TEXT och BLOB](https://www.sqlite.org/datatype3.html).

Jag väljer att göra kolumnen "kod" till primärnyckel i tabellen. Det säger att det inte kan ligga flera rader i tabellen där "kursens kod" är densamma. Det får bara ligga en rad med en specifik kurskod i tabellen.

Man kan se den SQL-kod som används för att skapa tabellen. Här är det `CREATE TABLE` som används. Verktyget SQLiteBrowser är egentligen bara en front för att generera SQL-kod till databasen. Kika med ett intresserat öga mot den SQL-kod som visas. Det är den du vill lära dig i längden.



Modifiera en tabell {#alter-table}
--------------------------------------

När vi är klara så kan vi se en översikt av den struktur som finns i vår databas. Denna struktur kallas även databasens "schema". Schemat visar hur vi har tänkt oss att strukturera vår information i databasen. Ännu har vi ju inte lagt in några kurser i tabellen.

Men, innan det, jag glömde att lägga till ett smeknamn (TEXT) på kursen. Vi behöver redigera tabellens struktur.

[FIGURE src=image/snapht18/sqlitebrowser-alter-table.png?w=w3 caption="Se databasens struktur och redigera strukturen för en tabell."]

Du kan redigera en tabells struktur genom att högerklicka på tabellen och välja "Modify Table".

Jag lägger till ytterligare en kolumn för smeknamnet.

[FIGURE src=image/snapht18/sqlitebrowser-alter-table2.png?w=w3 caption="Då utökar vi tabellen med ytterligare en kolumn."]

Se till att klicka på knappen "Write Changes" så är du säker på att verktyget verkligen skriver till databas-filen.

Bra, då har vi en tabell och kan gå vidare.



Tabell, kolumn, rad och nyckel {#oversikt}
--------------------------------------

En databas består av tabeller, varje tabell har en struktur med ett antal definerade kolumner. Varje kolumn är av en viss datatyp.

Tabellens innehåll består av rader vars värden representerar en enhet i tabellen. I vårt fall representerar en rad en kurs och dess egenskaper.

Varje rad innehåller värden för varje kolumn. Vi kan säga att radens värden placeras i celler i respektive kolumn.

Så här kan innehållet i en tabellen "kurs" se ut, fördelat på fyra rader, fyra kurser.

| Kod    | Smeknamn   | Poäng | Namn |
|--------|------------|:-----:|------|
| PA1439 | htmlphp    | 7,5   | Webbteknologier |
| PA1436 | design     | 7,5   | Teknisk webbdesign och användbarhet |
| PA1451 | databas    | 7,5   | Databasteknologier för webben |
| PA1440 | oophp      | 7,5   | Objektorienterade webbteknologier |

Innehållet i en tabell består alltså av rader med värden i kolumner/celler.

Oftast har varje rad något som gör att raden blir unik. Ett värde eller en kod, i fallet ovan är det kurskoden som gör att varje rad blir unik. Ett annat sätt att göra raden unik är att tillföra ett automatiskt id, en siffra, vars enda syfte är att göra raden unik. Ett tredje sätt är att kombinera flera kolumners värden för att göra raden unik. Vi valde tidigare att göra "kod" till primärnyckel i vår tabell.

Detta var några bakomliggande termer i databasvärlden. I sin enkelhet går strukturen att jämföra med ett excelark, eller med matematikens mängdlära. 

Låt se hur denna tabellen skulle se ut i en databas om vi införde ovan innehåll.



Lägg till värden i en tabell {#kurs-insert}
--------------------------------------

Låt oss nu lägga till de fyra kurserna ovan, som rader i tabellen. I SQLiteBrowser gör vi på följande sätt.

[FIGURE src=image/snapht18/sqlitebrowser-insert.png?w=w3 caption="Klicka runt för att lägga till nya rader och fylla raden med värden."]

Först väljer vi "Browse Data" och "New Record", då läggs en ny rad till i tabellen. Sedan får vi klicka på varje värde för sig och lägga in det och klicka på "Apply".

Nere till höger väljer vi fliken "SQL Log" som visar oss den SQL-kod som genereras av varje klick. Vi ser att en ny rad läggs till med `INSERT` och när vi uppdaterar ett värde i raden så blir det en `UPDATE`.

SQLiteBrowser använder sig av en av SQLite inbyggd och automatgenererad primärnyckel för att peka ut vilken rad som skall göras UPDATE på, den heter `_rowid_`. Du kan notera att det händer men du behöver inte fundera mer på det just nu. Men, om du trots detta vill läsa på så finns konceptet beskrivet i [SQLite manualen om rowid](https://www.sqlite.org/rowidtable.html).

Lägg nu till alla rader så det ser ut så här när du är klar.

[FIGURE src=image/snapht18/sqlitebrowser-inserted.png?w=w3 caption="Alla fyra raderna på plats i tabellen."]

Nu kan vi ställa en SQL-fråga mot tabellen.



Välj värden ur en tabell {#select-kurs}
--------------------------------------

Vi prövar att skriva en SQL-sats som väljer ut en eller flera rader ur tabellen. SQL-satsen kan se ut så här.

```sql
-- Show all values from all courses
SELECT * FROM kurs;

-- Show only the course with the specific kod
SELECT * FROM kurs WHERE kod = "PA1439";
```

Så här kan det se ut i verktyget.

[FIGURE src=image/snapht18/sqlitebrowser-select.png?w=w3 caption="Vi hämtar och visar värden från tabellen med SELECT."]

Först väljer vi "Execute SQL" och sedan skriver vi in SQL-koden och klickar på play-knappen eller trycker tangenten `ctrl + enter`.

Resultatet visas med de rader och kolumner som matchas.

Längst ned till höger visas "SQL Log" med de SQL-kommandon som applikationen skickar till databasen för att hämta resultatet. Kika gärna på dem, de kan hjälpa dig att lära dig att förstå applikationen och hur SQL fungerar.



Hämta och öppna en databas {#get-database}
--------------------------------------

I kursrepot för htmlphp ligger en färdig databas i filen `example/sqlite/kurs.sqlite` som innehåller exakt det som vi nyss gjort.

Öppna den i SQLiteBrowser, antingen via ditt kursrepo eller genom att [ladda ned en kopia av den](https://github.com/mosbth/htmlphp/blob/master/example/sqlite/kurs.sqlite?raw=true).

Dubbelkolla att du kan jobba med databasen "kurs.sqlite" och utföra samma SELECT-satser och få fram samma, eller motsvarande, svar.

Fint, då har vi koll på grunderna och kan jobba vidare.

Nu ska vi göra ett annat exempel, steg för steg.



Databas för båtklubben {#yetty}
--------------------------------------

Låt oss göra en databas till den lokala båtklubben.

*Exempel: Den lokala båtklubben.*

> Skapa en ny databas (boatclub.sqlite) med en tabell (jetty som betyder brygga) där alla båtar och deras respektive bryggplats lagras. Låt bryggplatsens id vara primärnyckel. Skapa kolumner för att spara båttyp, motor, längd, bredd och ägarens namn.

Så här blev det för mig.

Jag skapar en ny databas "boatclub.sqlite" och därefter skapar jag en tabell "jetty".

[FIGURE src=image/snapht18/jetty-create-table.png?w=w3 caption="Skapa en ny tabell jetty i databasen boatclub.sqlite."]

Här är den SQL-kod som genereras för att skapa tabellen.

```sql
CREATE TABLE `jetty` (
	`position`	INTEGER,
	`boatType`	TEXT,
	`boatEngine`	TEXT,
	`boatLength`	INTEGER,
	`boatWidth`	INTEGER,
	`ownerName`	TEXT,
	PRIMARY KEY(`position`)
);
```

Tanken är att lagra information om båtarna och deras position vid bryggan och vem som äger respektive båt/bryggplats.

Vill du ta bort tabellen och börja om så använder du menyvalet (högerklicka på tabellens namn) "Delete Table". När man gör detta med SQL så heter det "DROP TABLE" när man raderar en tabell och dess innehåll.

Vi återkommer till SQL lite senare. Låt oss nu lägga till lite rader i tabellen.



Lägg till båtar {#yetty-insert}
--------------------------------------

Lägg till ett par båtar i tabellen. Du kan använda följande båtar, eller definera dina egna.

* Position 1, båt: Buster XXL, motor: Yamaha 115hk, längd: 635, bredd: 240, ägare: Adam
* Position 2, båt: Buster M, motor: Yamaha 40hk, längd: 460, bredd: 186, ägare: Berit
* Position 3, båt: Linder 440, motor: Tohatsu 4hk, längd: 431, bredd: 164, ägare: Ceasar

Lägg till ovan rader till din tabell.

Det kan se ut så här när du är klar.

[FIGURE src=image/snapht18/jetty-insert.png?w=w3 caption="Databasen fylls på med tre båtar vid bryggan."]

Den SQL-kod som egentligen krävs för att lägga till tre rader i tabellen kan sammanfattas med följande.

```sql
INSERT INTO "jetty" VALUES(1,'Buster XXL','Yamaha 115hk',635,240,'Adam');
INSERT INTO "jetty" VALUES(2,'Buster M','Yamaha 40hk',460,186,'Berit');
INSERT INTO "jetty" VALUES(3,'Linder 440','Tohatsu 4hk',431,164,'Ceasar');
```

Pröva gärna att skriva SQL-kod för att lägga till en ny båt, som ett alternativ till att klicka runt i verktyget.

Du kan radera rader med SQL-kommandot `DELETE`, eller genom att göra "Browse Data -> Delete Record" i verktyget.

När man skriver SQL-kod i verktyget så kan man använda små eller stora bokstäver på de inbyggda kommandona som "CREATE/DROP/INSERT/UPDATE/DELETE/SELECT". Både små och stora funkar men det blir tydligare med stora bokstäver.



Visa rader i en tabell med SELECT {#select}
--------------------------------------

SQL-konstruktionen SELECT används för att välja ut och visa rader och kolumner från en tabell. Det går att kombinera olika sökvillkor för att visa en delmängd av tabellens innehåll.



### Använd sökverktyget för att ställa frågor till databasen {#search}

Gå till "Browse Data" och klicka på ett filter som visar _"alla båtar vars längd är större än 4.5m"_.

[FIGURE src=image/snapht18/jetty-select-by-filter.png?w=w3 caption="Alla båtar vars längd är större än 4.5 meter."]

Gör en ny sökning och välj att visa *"alla båtar som heter 'Buster' i namnet"*.

Gör ytterligare en sökning där du kombinerar ovanstående sökvillkor och lägger till villkoret *"båtens bredd är mindre än 2m"*. Rätt svar på frågan är "Buster M", det finns endast en båt som matchar denna kombination av villkor.

[FIGURE src=image/snapht18/jetty-select-by-filter2.png?w=w3 caption="En kombination av sökvillkor, eller filter som verktyget kallar dem."]

Låt se hur vi kan kombinera dessa villkor i en SELECT-sats med SQL.



### Skriv frågor med SQL-kod {#sqlcode}

Hur ser då en SELECT-fråga ut för att göra samma urval. Ett kort och snabbt svar är följande:

```sql
SELECT * FROM Jetty
WHERE
    boatType LIKE "%Buster%" AND
    boatLength > 450 AND
    boatWidth < 200;
```

Klicka på fliken "Execute SQL" och testa ovanstående SQL-sats. Får du det förväntade svaret?

[FIGURE src=image/snapht18/jetty-select-where.png?w=w3 caption="Samma resultat visas, Buster M, men nu med en SQL-konstruktion."]

Pröva gärna att modifiera sökvillkoret för att visa andra resultat.

Låt oss se vad SQL-satsen betyder, del för del.



### Välj vilka kolumner som visas {#speccols}

Vi bryter ned SELECT-satsen i dess beståndsdelar för att bättre förstå vad den gör.

`SELECT * FROM Jetty` säger att *"välj alla kolumner från tabellen Jetty"*. Pröva att byta ut `*` mot namnet på två av kolumnerna, tex `boatType, ownerName` och exekvera frågan igen.

[FIGURE src=image/snapht18/jetty-select-columnname.png?w=w3 caption="Välj vilka kolumner som skall visas i resultatet."]



### Styr rapportens titel med `AS` {#as}

Om du vill ha bättre namn på kolumn-rubrikerna i själva rapporten, så kan du ange det med AS-konstruktionen. Testa att ändra din fråga till följande: 

```sql
SELECT boatType AS Typ, ownerName AS Namn FROM Jetty
```

Titta på kolumnrubrikerna i bilden så ser du att de ändrades.

[FIGURE src=image/snapht18/jetty-select-as.png?w=w3 caption="Byt namn på kolumnrubrikerna med AS."]

Det är alltså kolumnernas namn som kan påverkas med konstruktionen "AS".



### WHERE-delen {#where}

I WHERE-delen görs urvalet av raderna. Endast de rader som matchar WHERE-kriteriet kommer att visas i resultatet. Man väljer alltså ut en delmängd av alla rader som finns i tabellen.

Utgå från följande SQL-fråga som ger dig samtliga rader i tabellen.

```sql
SELECT * FROM jetty 
```

Testa nu att uppdatera din SELECT-fråga med WHERE-delen konstruerad på följande vis.

| SQL                            | Vad visas                               |
|--------------------------------|-----------------------------------------|
| `WHERE ownerName = "Adam"`     | Visa båtar som Adam äger                |
| `WHERE ownerName LIKE "%a%"`   | Visa båtar som ägs av någon som har ett 'a' i sitt namn |
| `WHERE boatWidth = 164`        | Visa båtar vars bredd är 164cm |
| `WHERE boatWidth >= 164 AND boatWidth <= 186` | Visa båtar vars bredd är större än/lika med 164cm och mindre än/lika med 186cm |
| `WHERE`<br>`(boatWidth >= 164 AND boatWidth <= 186)`<br>`OR boatWidth = 240` | samma som ovan men visar även båtar vars bredd är 240cm|

[FIGURE src=image/snapht18/jetty-select-where-andor.png?w=w3 caption="Ett sätt att visa alla rader i tabellen i form av en lite mer avancerad konstruktion med AND, OR och paranteser."]

Med villkoret WHERE kan man styra vilka rader som visas från en tabell.



Aggregerande funktioner {#agg}
--------------------------------------

En aggregerande funktion beräknar summan, max-värde, min-värde eller medelvärde av alla, eller en delmängd av alla, värden i en kolumn. SQLite har stöd för vanliga aggregerande funktioner.

Kika kort på [manualsida för aggregerande funktioner i SQLite](http://www.sqlite.org/lang_aggfunc.html).

Vanliga aggregerande funktioner är COUNT, MAX, MIN, SUM och AVG. Testa följande SQL satser och se vilket resultat du får.

| SQL                            | Vad visas                               |
|--------------------------------|-----------------------------------------|
| `SELECT COUNT(jettyPosition) FROM jetty` | Räkna antalet rader i tabellen |
| `SELECT MAX(boatLength) FROM jetty` | Visa största båtlängden            | 
| `SELECT MIN(boatWidth) FROM jetty` | Visa den minsta bredden)            |
| `SELECT SUM(boatWidth) FROM jetty` | Visa summan av samtliga båtars bredd |
| `SELECT AVG(boatLength) FROM jetty` | Visa medellängden av samtliga båtar |

[FIGURE src=image/snapht18/jetty-select-aggr.png?w=w3 caption="Beräkna medellängden av alla båtar med aggregat-funktionen AVG()."]

Aggregatfunktioner är ett viktigt verktyg för databasprogrammeraren och låter dig jobba på alla rader som ligger i tabellen.



Inbyggda funktioner {#inbyggda}
--------------------------------------

SQLite har inbyggda funktioner som kan hjälpa till vid beräkningar eller för att förbereda resultatet för presentation. Det finns funktioner för att bearbeta strängar, siffror och datum.

Kika kort på [manualsida för inbyggda funktioner i SQLite](http://www.sqlite.org/lang_corefunc.html).

Med dessa funktioner kan du bearbeta datamängden för att få bra rapporter. Ibland är det bättre att bearbeta datamängden via SQL och dess funktioner, istället för att göra bearbetningen i PHP. Försök att använda SQL för att göra så korrekta rapporter som möjligt, det minimerar kodandet i PHP och är ofta ett effektivt sätt att programmera.

Testa följande SQL satser och se vilket resultat du får.

| SQL                            | Vad visas                               |
|--------------------------------|-----------------------------------------|
| `SELECT round(AVG(boatLength), 2) FROM Jetty` | Visa medellängden av samtliga båtar, avrunda till två decimaler |
| `SELECT length(ownerName) FROM Jetty` | Räkna antalet tecken i namnet    |
| `SELECT random()`              | Välj ett slumpvärde |
| `SELECT hex(random())`         | Välj ett slumpvärde och visa som hexadecimalt tal |
| `SELECT upper(ownerName) FROM Jetty` | Omvandla till stora bokstäver |
| `SELECT date("now")`           | Visa dagens datum |

[FIGURE src=image/snapht18/jetty-builtin.png?w=w3 caption="Omvandla alla namn till stora bokstäver med inbyggda funktionen upper()."]

Inbyggda funktioner är viktiga för att kunna bearbeta och komplettera resultatet från SELECT-satserna.



Export av data {#export}
--------------------------------------

Eftersom en SQLite-databas består av en fil så är det enkelt att flytta och kopiera den. Man kopierar bara filen som vilken fil som helst.

När man jobbar med databaser är det också vanligt att importera och exportera databaser i form av SQL-kommandon. Som du har sett under övningen så skapas databasen, dess tabeller och innehållet med SQL-kommandon. Man kan exportera samliga dessa kommandon som behöver för att återskapa databasen i ett visst läge. Dessa filer brukar man ge filändelsen `.sql` då de innehåller rena SQL-kommandon.

Denna typen av SQL-filer kan göra det enklare att flytta data mellan olika typer av databaser. Databaser är inte helt kompatibla på SQL-nivå, men det gör ända saker lite enklare, att använda SQL-kommandon för att flytta data.

I verktyget SQLiteBrowser så använder du menyvalet "File -> Export -> Database to SQL file". Exportera nu din databas till filen `boatclub.sql`.

[FIGURE src=image/snapht18/jetty-export.png?w=w3 caption="Exportera databasen som SQL-kommandon."]

Ta och öppna filen `boatclub.sql` i en texteditor och se hur SQL-kommandona ser ut. Notera att denna filen fick filändelsen `.sql` medan vi använder ändelsen `.sqlite` för själva databasen. Du kan även öppna filen `boatclub.sqlite` i din texteditor, men den innehåller mest konstiga tecken då det är en binär fil som inte är gjord för att visas i en texteditor.

Så här kan innehållet i filen `boatclub.sql` se ut.

```sql
BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS `jetty` (
	`position`	INTEGER,
	`boatType`	TEXT,
	`boatEngine`	TEXT,
	`boatLength`	INTEGER,
	`boatWidth`	INTEGER,
	`ownerName`	TEXT,
	PRIMARY KEY(`position`)
);
INSERT INTO `jetty` VALUES (1,'Buster XXL','Yamaha 115hk',635,240,'Adam');
INSERT INTO `jetty` VALUES (2,'Buster M','Yamaha 40hk',460,186,'Berit');
INSERT INTO `jetty` VALUES (3,'Linder 440','Tohatsu 4hk',431,164,'Ceasar');
COMMIT;
```

Du kan se innehålllet i min motsvarighet som ligger i kursrepot under katalogen `example/sqlite`.



Import av data {#export}
--------------------------------------

När du får en SQL-fil likt `boatclub.sql` så kan du importera den in i din nuvarande databas, eller importera och skapa en ny databas.

Du kan pröva att importera `boatclub.sql` via menyvalet "File -> Import -> Database from SQL file" och välja att skapa en helt ny databas med det innehållet.

Det är bara en övning så att du ser hur import-funktionen fungerar.

Du bör nu kunna skilja på filerna `boatclub.sql` och `boatclub.sqlite` och vad deras syften är.



Ta en backup av din databas {#backup}
--------------------------------------

Innan du avslutar övningen så ser du till att spara undan en kopia av din databasfile `boatclub.sqlite`. Lägg den i ditt kursrepo.

Ta dessutom en backup av din databas, genom att exportera databasen, och spara backupen som `boatclub.sql`.

Se till att du förstår skillnaden på dessa två filer. Öppna dem i din texteditor för att se på dess innehåll. Filen `boatclub.sqlite` är en binärfil och innehåller själva databasen. Filen `boatclub.sql` är en textfil med SQL-kommandon som är en snapshot av innehållet och strukturen i din databas, med hjälp av den kan du återskapa databasen och dess innehåll.



Avslutningsvis {#avslutning}
--------------------------------------

Det var en genomgång av SQLite och SQL. Via verktyget SQLite Manager kan du alltså jobba med dataasben SQLite.

Det finns också en [kommandoradsklient för SQLite](kunskap/en-kommandoradsklient-for-sqlite) som du kan titta på.

Ställ gärna frågor om [SQLite och dess klienter i forumet](t/4308).
