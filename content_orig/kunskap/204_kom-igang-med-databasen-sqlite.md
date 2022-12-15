---
author: mos
category:
    - databas
    - sql
revision:
    "2017-01-09": (B, mos) Stödjer både htmlphp och dbjs.
    "2015-06-05": (A, mos) Första utgåvan för htmlphp version 2 av kursen.
...
Kom igång med databasen SQLite
==================================

[FIGURE src=/image/sqlite20/sqlite-logo.gif class="right"]

En guide för att stegvis komma igång med databasen SQLite och SQL. Guiden hanterar grunderna i SQLite och SQL. Vi skapar en enkel databas i SQLite och använder ett par verktyg för att jobba mot databasen.

<!--more-->

[WARNING]

**Nyare utgåva av artikeln finns.**

Denna artikel bygger på en Firefox plugin SQLite Manager som numer inte är så enkel att integrera i Firefox (2018). Det finns en uppdaterad artikel som använder en annan desktop klient för SQLite, läs gärna den på "[Kom igång med databasen SQLite med DB Browser för SQLite](kunskap/kom-igang-med-databasen-sqlite-med-db-browser-for-sqlite)".

[/WARNING]

Bästa sättet att gå igenom guiden är att genomföra varje övning på egen hand. Gör precis som jag gjort, fast på egen hand. Kopiera eller skriv om kodexemplen, det viktiga är att du återskapar koden i din egna miljö. Läsa är bra men man måste göra själv, "kan själv", för att lära sig.



Förutsättning {#pre}
--------------------------------------

I artikeln refereras till kodexempel som finns med som en del i kursrepot htmlphp eller dbjs. Det förutsätts att du har tillgång till en kursmiljö som motsvarar de kurserna.



Om SQLite {#om}
--------------------------------------

SQLite är ett programvarubibliotek i programspråket C som implementerar en filbaserad SQL-databas. SQLite är opensource. Enligt deras webbplats är SQLite är den mest spridda databasen i världen. Bekanta dig med informationen på [deras hemsida](http://www.sqlite.org/).

SQLite är filbaserad vilket innebär att hela databasen finns lagrad i en enda fil på disk. Vill man flytta databasen så räcker det att flytta filen. Det behövs ingen särskild konfiguration av användare och lösenord. Enkelheten är en av fördelarna med en filbaserad databas.

SQLite stödjer de vanliga SQL-konstruktionerna. Ta en titt på vilka [SQL-konstruktioner som stöds i SQLite](http://www.sqlite.org/lang.html). Om du redan är bekant med SQL-språket så kommer du att känna igen dig, om inte så kommer vi till detta lite längre ned i guiden.

SQL står för "Standard Query Language" och är ett standardiserad sätt att ställa frågor till en relationsdatabas. Läs kort om [SQL på Wikipedia](http://sv.wikipedia.org/wiki/SQL).



SQLite Manager {#sqliteman}
--------------------------------------

SQLite Manager är ett grafiskt användargränssnitt för databaser i SQlite. Med verktyget kan du skapa nya databaser, skapa tabeller, editera data i tabellerna, söka i dem och skriva vanliga SQL-satser. SQLite Manager är en Firefox AddOn.

Se till att du har en uppdaterad version av webbläsaren Firefox. Sedan kan du [ladda ned och installera SQLite Manager som Firefox AddOn](https://addons.mozilla.org/sv-SE/firefox/addon/5817/).

Så här gjorde jag.

[YOUTUBE src=NtzgryfRc5s width=630 caption="Mikael installerar SQLite Manager i Firefox på Windows 8.1."]

När du är klar kan du starta upp SQLite Manager via menyn "Firefox - Tools - SQLite Manager". Börja med att skapa en ny databas och döp den till test.

[FIGURE src=/image/sqlite20/sqliteman-new-db.png?w=w2 caption="Skapa en ny databas, test.sqlite, i SQLite Manager."]

Se dig om i verktyget, bekanta dig med menyerna, menyvalen och olika inställningsmöjligheter under options. Vi skall snart börja använda verktyget för att jobba med vår nya databas.



Tabell, kolumn, rad och nyckel {#oversikt}
--------------------------------------

En databas består av tabeller, varje tabell har ett antal definerade kolumner. Varje kolumn är av en viss datatyp.

Tabellens innehåll består av rader, varje rad innehåller ett inlägg, en rad, i tabellen. Varje rad är uppdelad i kolumner och varje kolumn har ett värde.

Så här skulle innehållet i en tänkt tabell "Kurs", se ut.

Tabellen heter "Kurs" och har kolumnerna `kod TEXT`, `smeknamn TEXT`,  `namn TEXT` och `poang REAL`. Kolumnerna kod, smeknamn och namn är textsträngar medans kolumnen poang är ett flyttal.

[SQLite stöder datatyperna NULL, INTEGER, REAL, TEXT och BLOB](https://www.sqlite.org/datatype3.html).

För att få ett fungerande exempel så lägger jag in fyra rader i tabellen.

**Exempel på tabellen "Kurs" med 4 rader.**

| Kod    | Smeknamn   | Poäng | Namn |
|--------|------------|:-----:|------|
| DV1462 | htmlphp    | 7,5 | Databaser, HTML, CSS och skriptbaserad PHP-programmering |
| DV1485 | oophp      | 7,5 | Databaser och Objektorienterad PHP-programmering |
| DV1486 | phpmvc     | 7,5 | Databasdrivna webbapplikationer med PHP och MVC-ramverk |
| DV1483 | javascript | 7,5 | JavaScript, jQuery och AJAX med HTML5 och PHP |

En tabell består alltså av rader med värden i kolumner. Oftast har varje rad något som gör att raden blir unik. Ett värde eller en kod, i fallet ovan är det kurskoden som gör att varje rad blir unik. Ett annat sätt att göra raden unik är att tillföra ett automatiskt id, en siffra, vars enda syfte är att göra raden unik. Ett tredje sätt är att kombinera flera kolumners värden för att göra raden unik.

Det som gör raden unikt kallas nyckel eller primärnyckel. En primärnyckel definerar den, eller de, kolumner vars kombination gör en rad unik. En primärnyckel kan vara en kolumn eller en kombination av flera kolumner.

Det var lite bakomliggande termer i databasvärlden, tabell, kolumn, rad och nyckel. I sin enkelhet går det att jämföra med ett excelark, eller med matematikens mängdlära. 

Låt se hur denna tabellen skulle se ut i en databas.



Tabell för kurser {#kurs}
--------------------------------------

I kursrepot [en exempeldatabas](https://github.com/mosbth/htmlphp/tree/master/example/sqlite) som innehåller tabellen "Kurs" och innehållet enligt stycket ovan. Databasfilen heter `kurs.sqlite`. Det är alltså en databas med en tabell. En databas kan innehålla många tabeller. De tabeller som hänger ihop, sparar man i en och samma databas.

Du kan [ladda hem databas-filen](https://github.com/mosbth/htmlphp/blob/master/example/sqlite/kurs.sqlite?raw=true) och spara på din egen desktop. Sedan kan du öppna den i SQLite Manager och se vad den innehåller.

Så här ser det ut när jag gör det.

[YOUTUBE src=aOy4ycFd4HM width=630 caption="Mikael testar Kurs-databasen i SQLite Manager."]

Se till att du kan ladda ned databasen `kurs.sqlite` och öppna den i SQLite Manager. Kika runt i verktyget och databasen för kurser, bekanta dig med både verktyg och den lilla databasen.

Nu ska vi göra ett liknande exempel, fast stegvis och lite lugnare.



Skapa en tabell {#create}
--------------------------------------

Låt oss göra en databas till den lokala båtklubben.

*Exempel: Den lokala båtklubben.*

> Skapa en ny databas (boats.sqlite) med en tabell (Jetty) där alla båtar och deras respektive bryggplats lagras. Låt bryggplatsens id vara primärnyckel. Skapa kolumner för att spara båttyp, motor, längd, bredd och ägarens namn.

Så här blev det för mig.

Jag skapar en ny databas och därefter skapar jag en tabell.

[FIGURE src=/image/sqlite20/create-table.png?w=w2 caption="Skapa en ny tabell, Jetty, i databasen boats.sqlite."]

Så här ser det ut när jag tittar på den tomma tabellen.

[FIGURE src=/image/sqlite20/view-table-jetty.png?w=w2 caption="Så här ser en tom tabell ut, ännu finns inga rader av värden i tabellen."]

Som du kanske märkte så använde sig verktyget av SQL-kod för att skapa tabellen. I mitt fall blev det följande kod.

Kod: SQL-kod för att skapa tabellen.

```sql
CREATE TABLE "main"."Jetty" (
    "jettyPosition" INTEGER PRIMARY KEY  NOT NULL  UNIQUE, 
    "boatType" VARCHAR(20) NOT NULL, 
    "boatEngine" VARCHAR(20) NOT NULL, 
    "boatLength" INTEGER, 
    "boatWidth" INTEGER, 
    "ownerName" VARCHAR(20)
)
```

Vill du ta bort tabellen och börja om så använder du menyvalet (högerklicka på tabellens namn) "DROP table". I databasvärlden heter det "DROP" när man raderar en tabell och dess innehåll.

Vi återkommer till SQL lite senare. Låt oss nu lägga till lite rader i tabellen.



Lägg till rader i en tabell {#insert}
--------------------------------------

Lägg till ett par båtar i tabellen. Du kan använda följande båtar, eller definera dina egna.

* Båt: Buster XXL, motor: Yamaha 115hk, längd: 635, bredd: 240, ägare: Adam
* Båt: Buster M, motor: Yamaha 40hk, längd: 460, bredd: 186, ägare: Berit
* Båt: Linder 440, motor: Tohatsu 4hk, längd: 431, bredd: 164, ägare: Ceasar

Klicka på "Add" för att lägga till en ny rad. Du behöver inte ange en siffra för "jettyPosition". Siffran automatgenereras eftersom kolumnen är specificerad som PRIMARY KEY och INTEGER. Detta sker internt i SQLite. Så här ser det ut för mig.

[FIGURE src=/image/sqlite20/add-row.png caption="Lägga till rader i tabellen via knappen 'Add'."]

Så här ser det ut när de tre båtarna finns inlagda i tabellen.

[FIGURE src=/image/sqlite20/rows-added.png?w=w2 caption="Tabellen innehåller 3 rader."]

Som du kanske märkte, så använde sig verktyget återigen av SQL-kod, denna gången för att lägga till raderna. SQL är centralt när man pratar om databaser (relationsdatabaser). SQL-koden för att lägga till dessa 3 rader följer.

*Kod: SQL-kod för att lägga till rader i tabellen.*

```sql
INSERT INTO "Jetty" VALUES(1,'Buster XXL','Yamaha 115hk',635,240,'Adam');
INSERT INTO "Jetty" VALUES(2,'Buster M','Yamaha 40hk',460,186,'Berit');
INSERT INTO "Jetty" VALUES(3,'Linder 440','Tohatsu 4hk',431,164,'Ceasar');
```

Testa att klicka runt på följande knappar "Duplicate", "Edit" och "Delete". Se vad som händer och studera SQL-koden som används.



Visa rader i en tabell med SELECT {#select}
--------------------------------------

SELECT används för att välja ut rader och kolumner från en tabell. Det går att kombinera olika sökvillkor för att visa en delmängd av tabellens innehåll.



###Använd sökverktyget för att ställa frågor till databasen {#search}

Börja med att klicka på knappen "Search", välj att visa *"alla båtar vars längd är större än 4.5m"*.

Gör en ny sökning och välj att visa *"alla båtar som heter 'Buster' i namnet"*.

Gör ytterligare en sökning där du kombinerar ovanstående sökvillkor och lägger till villkoret *"båtens bredd är mindre än 2m"*. Rätt svar på frågan är "Buster M", det finns endast en båt som matchar detta villkor.

[FIGURE src=/image/sqlite20/search.png caption="Sök ut rader i tabellen som matchar vissa sökvillkor."]



###Skriv frågor med SQL-kod {#sqlcode}

Hur ser då en SELECT-fråga ut för att göra samma urval. Ett kort och snabbt svar är följande:

*Kod: SQL-kod för att göra ett urval av rader.*

```sql
SELECT * FROM Jetty
WHERE
    boatType LIKE "%Buster%" AND
    boatLength > 450 AND
    boatWidth < 200;
```

Klicka på fliken "Execute SQL" och testa ovanstående SQL-sats. Får du det förväntade svaret?

[FIGURE src=/image/sqlite20/select.png?w=w2 caption="SELECT-satsen ger samma svar som vid sökningen."]



###Välj vilka kolumner som visas {#speccols}

Vi bryter ned SELECT-satsen i dess beståndsdelar för att bättre förstå vad den gör.

`SELECT * FROM Jetty` säger att *"välj alla kolumner från tabellen Jetty"*. Pröva att byta ut `*` mot namnet på två av kolumnerna, tex `boatType, ownerName` och exekvera frågan igen.

[FIGURE src=/image/sqlite20/select.png?w=w2 caption="Välj vilka kolumner som skall visas i resultatet."]



###Välj kolumneras namn med `AS` {#as}

Om du vill ha bättre namn på kolumn-rubrikerna så kan du ange det med AS-konstruktionen. Testa att ändra din fråga till följande: 

```sql
SELECT boatType AS Typ, ownerName AS Namn FROM Jetty
```

Titta på kolumnrubrikerna i bilden så ser du att de ändrades.

[FIGURE src=/image/sqlite20/select2.png?w=w2 caption="Byt namn på kolumnrubrikerna med AS."]



###WHERE-delen {#where}

I WHERE-delen görs urvalet av raderna. Endast de rader som matchar WHERE-kriteriat kommer att visas i resultatet. 

Utgå från följande SQL-fråga.

```sql
SELECT * FROM Jetty 
```

Testa nu att uppdatera WHERE-delen med följande satser.

| SQL                            | Vad visas                               |
|--------------------------------|-----------------------------------------|
| `WHERE ownerName = "Adam"`     | Visa båtar som Adam äger                |
| `WHERE ownerName LIKE "%a%"`   | Visa båtar som ägs av någon som har ett 'a' i sitt namn |
| `WHERE boatWidth = 164`        | Visa båtar vars bredd är 164cm |
| `WHERE boatWidth >= 164 AND boatWidth <= 186` | Visa båtar vars bredd är större än/lika med 164cm och mindre än/lika med 186cm |
| `WHERE`<br>`(boatWidth >= 164 AND boatWidth <= 186)`<br>`OR boatWidth = 240` | samma som ovan men visar även båtar vars bredd är 240cm|

[FIGURE src=/image/sqlite20/select3.png?w=w2 caption="Ett sätt att visa alla rader i tabellen i form av en lite mer avancerad konstruktion med AND, OR och paranteser."]

Att välja ut värden från tabeller är kärnan i databasbearbetning. Det är bra att ha koll på de möjligheter som finns med SELECT-satser.



Aggregerande funktioner {#agg}
--------------------------------------

En aggregerande funktion beräknar summan, max-värde, min-värde eller medelvärde av alla, eller en delmängd av alla, värden i en kolumn. SQLite har stöd för vanliga aggregerande funktioner.

Kika kort på [manualsida för aggregerande funktioner i SQLite](http://www.sqlite.org/lang_aggfunc.html).

Vanliga aggregerande funktioner är COUNT, MAX, MIN, SUM och AVG. Testa följande SQL satser och se vilket resultat du får.

| SQL                            | Vad visas                               |
|--------------------------------|-----------------------------------------|
| `SELECT COUNT(jettyPosition) FROM Jetty` | Räkna antalet rader i tabellen |
| `SELECT MAX(boatLength) FROM Jetty` | Visa största båtlängden            | 
| `SELECT MIN(boatWidth) FROM Jetty` | Visa den minsta bredden)            |
| `SELECT SUM(boatWidth) FROM Jetty` | Visa summan av samtliga båtars bredd |
| `SELECT AVG(boatLength) FROM Jetty` | Visa medellängden av samtliga båtar |

[FIGURE src=/image/sqlite20/aggregate.png?w=w2 caption="Beräkna medellängden av alla båtar med aggregat-funktionen AVG()."]

Aggregatfunktioner är ett viktigt verktyg för databasprogrammeraren.



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

[FIGURE src=/image/sqlite20/functions.png?w=w2 caption="Omvandla alla namn till stora bokstäver med inbyggda funktionen upper()."]

Inbyggda funktioner är viktiga för att kunna bearbeta och komplettera resultatet från SELECT-satserna.



Export av data {#export}
--------------------------------------

Eftersom en SQLite-databas består av en fil så är det enkelt att flytta och kopiera den. Man kopierar bara filen. Men i vanliga databassammanhang så brukar man exportera databasen till SQL-kommandon. Det är ett annat sätt att ta backup på en databas, eller kopiera den. 

För delen med en sådan export är att databasen är i ren SQL-kod, den är inte beroende av ett visst filformat och den kan till och med läsas in i en annan databashanterare som MySQL. Det är alltså så här man flyttar data mellan olika typer av databaser, när det behövs.

Så här gör du för att exportera databasen till en textfil bestående av SQL-kommandon. 

Välj fliken "Structure" och klicka på knappen "Export" eller välj fliken "Export Wizard". Välj att exportera din tabell som "SQL" och klicka för checkboxen "Include CREATE TABLE statement". Klicka "OK" och spara filen på ditt skrivbord.

[FIGURE src=/image/sqlite20/export.png?w=w2 caption="Exportera databasen som SQL-kommandon."]

Ta och öppna filen i en texteditor och se hur SQL-kommandona ser ut. Notera att denna filen fick filändelsen `.sql` medans vi använder ändelsen `.sqlite` för själva databasen.

Innehållet i min egen fil följer (observera att jag har bytt namn på min tabell från "Jetty" till "Jetty_mos").

*Kod: Databasen exporterad som SQL-kommandon.*

```sql
DROP TABLE IF EXISTS "Jetty_mos";
CREATE TABLE "Jetty_mos" (
"jettyPosition" INTEGER PRIMARY KEY  NOT NULL  UNIQUE , 
"boatType" VARCHAR(20) NOT NULL , "boatEngine" VARCHAR(20) NOT NULL , 
"boatLength" INTEGER, 
"boatWidth" INTEGER, 
"ownerName" VARCHAR(20)
);
INSERT INTO "Jetty_mos" VALUES(1,'Buster XXL','Yamaha 115hk',635,240,'Adam');
INSERT INTO "Jetty_mos" VALUES(2,'Buster M','Yamaha 40hk',460,186,'Berit');
INSERT INTO "Jetty_mos" VALUES(3,'Linder 440','Tohatsu 4hk',431,164,'Ceasar');
```

Du kan också se innehålllet i den exporterade filen i [kursrepots exempel som `Jetty_mos.sql`](https://github.com/mosbth/htmlphp/blob/master/example/sqlite/Jetty_mos.sql).



Import av data {#export}
--------------------------------------

Låtsas nu att du är ägare till en marina och har precis köpt ytterligare en marina och deras databas finns exporterad som SQL. Du behöver alltså importera deras data till din egen databas.

För att testa så kan du använda min export av [`Jetty_mos.sql`](https://github.com/mosbth/htmlphp/blob/master/example/sqlite/Jetty_mos.sql). Ladda hem den filens innehåll och spara på din desktop som filnamn `Jetty_mos.sql`.

Testa nu att importera till din egen databas.

Välj "Import" från toolbaren, eller välj fliken "Import Wizard". Välj "SQL", peka ut filen och klicka "OK".

[FIGURE src=/image/sqlite20/import.png?w=w2 caption="Importera en tabell med värden via SQL-kommandon."]

Sådär, nu har du en egen kopia av min databas, inklusive tabell och värden. Välj min tabell och titta att tabellen innehåller de förväntade raderna.

Denna typen av import och export av värden i en databas är bra att ha koll på. Det visar hur man kan utbyta information (databaser) via SQL i textfiler.

Glöm bara inte bort att SQLite är en filbaserad databas och det räcker att kopiera filen för att ta en backup. Den filbaserade databasen, och en export av databasen, är alltså två skilda saker.



Ta en backup av din databas {#backup}
--------------------------------------

Innan du avslutar övningen så ser du till att spara undan en kopia av din databasfile `boats.sqlite`. Lägg den i ditt kursrepo.

Ta dessutom en backup av din databas, genom att exportera databasen, och spara backupen som `boats.sql`.

Se till att du förstår skillnaden på dessa två filer. Öppna dem i din texteditor för att se på dess innehåll. Filen `boats.sqlite` är en binärfil och innehåller själva databasen. Filen `boats.sql` är en textfil med SQL-kommandon som är en snapshot av innehållet och strukturen i din databas, med hjälp av den kan du återskapa databasen och dess innehåll.



Avslutningsvis {#avslutning}
--------------------------------------

Det var en genomgång av SQLite och SQL. Via verktyget SQLite Manager kan du alltså jobba med dataasben SQLite.

Det finns också en [kommandoradsklient för SQLite](kunskap/en-kommandoradsklient-for-sqlite) som du kan titta på.

Ställ gärna frågor om [SQLite och dess klienter i forumet](t/4308).
