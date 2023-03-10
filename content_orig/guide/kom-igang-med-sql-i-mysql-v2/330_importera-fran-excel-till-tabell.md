---
author: mos
revision:
    "2022-01-04": "(G, mos) Genomgången inför v2 och MariaDB."
    "2019-02-06": "(F, mos) Strukturerade artikeln för att bättra flödet och minska felkällor."
    "2019-02-12": "(E, mos) Länk till forumet om bugg workbench."
    "2019-02-11": "(D, mos) Bort med full path vid matcha kolumner."
    "2019-02-09": "(C, mos) Förtydligade felsökning av load local infile."
    "2019-01-29": "(B, mos) Uppdaterad med felhantering och hur man fixar det."
    "2018-01-02": "(A, mos) Första versionen, uppdelad av större dokument."
...
Importera från Excel till Tabell
==================================

Ibland sitter man i Excel (eller liknande verktyg) och har en lång lista på saker som man vill föra in i en databastabell. Hur gör man det på ett snabbt och enkelt sätt?

Låt oss fylla tabellerna för kurs och kurstillfalle med innehåll genom att hämta det från CSV formatet, ett format som Excel och liknande verktyg kan exportera.

Spara den SQL-kod du skriver i filen `insert-csv.sql`. När du är helt klar så skall du även uppdatera din `insert.sql` så att den utför motsvarande åtgärder.

Tjuvkika på refmanualen [LOAD DATA INFILE](https://mariadb.com/kb/en/load-data-infile/) så kan du se vad det är vi skall göra.

I denna artikel jobbar vi med terminalklienten, det är enklast med tanke på sökvägar till olika filer.



Excelark för kurs och kurstillfälle {#excel}
----------------------------------

Det finns ett Excel-ark du kan använda för att hämta innehållet till tabellerna kurs och kurstillfälle. Börja med att studera [excel-arket och dess olika flikar](https://goo.gl/x7w9tA). Du kan se innehållet för respektive tabell i varsin flik.

[FIGURE src=image/snapvt18/excel-kurs.png caption="Blivande innehåll i en databastabell, men för tillfället i Excel."]

Första fliken innehåller två länkar via vilka du kan ladda ned respektive fliks innehåll som en CSV-fil. CSV står för Comma Separated Value och är ett vanligt format när man exporterar från och/eller importerar till Excel.

Ladda ned respektive CSV-fil och spara som `kurs.csv` och `kurstillfalle.csv`. Om du har problem med att ladda ned filerna så kan du också finna de båda filerna i ditt kursrepo under `example/skolan`.

Innehållet i filerna är rader som avslutas med `\n` och fält som är komma-separerade och kolumnernas värden omsluts med ett `"` tecken.

Filen `kurs.csv` kan se ut så här om du öppnar den i din texteditor.

```text
"Kod","Namn","Poäng","Nivå"
"AST101","Astronomi","5","G1N"
"SVT101","Försvar mot svartkonster","8","G1N"
"SVT201","Försvar mot svartkonster","6","G1F"
"SVT202","Försvar mot svartkonster","6","G1F"
"SVT401","Försvar mot svartkonster","6","G2F"
"KVA101","Kvastflygning","4","G1N"
"DJU101","Skötsel och vård av magiska djur","4","G1F"
"DRY101","Trolldryckslära","6","G1N"
"DRY102","Trolldryckslära","6","G1F"
"VAN101","Förvandlingskonst","5","G1F"
"MUG101","Mugglarstudier","6","G1F"
```

Den översta raden är bara för information, det är resterande rader som vi vill föra in i databastabellen, rad för rad, kolumn för kolumn.

Öppna gärna din fil i en texteditor och dubbelkolla att den har rätt radbrytningar i form av Unix style radbrytningar med `\n`. Om filen har Windows radbrytningar så kan du ändra det i din texteditor.

Det vi lär oss nu är alltså ett sätt att föra information mellan olika applikationer, i detta första fallet så för vi data från Excel, via CSV, in till databasen. Lyckas vi med detta så kan vi bli effektiva på att hantera data i allmänhet och flexibiliteten ökar i hur vi kan ladda data till databasen.



LOAD DATA INFILE {#into}
----------------------------------

När vi vet formatet på filen så kan vi översätta detta till instruktioner till LOAD DATA INFILE och berätta hur filens innehåll skall tolkas och läsas in till databasen.

Kommandot LOAD DATA INFILE kommer då att läsa rad för rad från filen och göra om det till INSERT satser.

I koden nedan används en relativ sökväg till filen `kurs.csv`, det fungerar om du startar din terminalklient i samma katalog där filen ligger. Ta som vana att alltid göra detta för att undvika problem med absoluta sökvägar.

Låt oss studera koden _innan vi kör den_.

```sql
--
-- Delete tables, in order, depending on
-- foreign key constraints.
--
DELETE FROM kurstillfalle;
DELETE FROM kurs;

--
-- Insert into kurs
--
LOAD DATA LOCAL INFILE 'kurs.csv'
INTO TABLE kurs
CHARSET utf8
FIELDS
	TERMINATED BY ','
    ENCLOSED BY '"'
LINES
	TERMINATED BY '\n'
IGNORE 1 LINES
;

SELECT * FROM kurs;
```

Vi anger sökvägen till filen och berättar att teckenkodningen är UTF-8. Fälten i filen är separerade med `,` och omslutna med `"`. Varje rad separeras med `\n` (Unix style radbrytning) och den första raden som innehåller namnen på kolumnerna väljer vi att ignorera.

Då kan vi köra koden i din terminalklient, troligen får du problem. Fortsätt läsa för att lösa de problemen.

Prova först.

```text
mariadb skolan < insert-csv.sql
```

Dubbelkolla om du får varningar med SHOW WARNINGS efter den satsen som ger varningarna. Det är extra viktigt när du importerar innehåll från externa källor på detta viset. Kanske är strängen längre än den får vara i tabellen eller så kanske formatet inte är som du förväntade dig.



Exekvera LOAD DATA INFILE {#execinto}
----------------------------------

Det kan vara lite klurigt att få LOAD DATA INFILE att fungera. Det är normalt avstängt i både servern och i klienten och din användare behöver rättigheter för att köra kommandot.

Eventuellt får du nu ett felmeddelande, något i stil med följande.

> "ERROR 4166 (HY000) at line 24: The used command is not allowed because the MariaDB server or client has disabled the local infile capability"

> "ERROR 1148 (42000): The used command is not allowed with this MySQL version"

> ERROR 3948 (42000) at line 11: Loading local data is disabled; this must be enabled on both the client and server sides

Detta kan bero inställningar i terminalklienten och/eller i din databasserver. Låt oss lösa dessa potentiella problem.



### Terminalklienten {#fixterminal}

Felet kan bero på att du inte startade klienten mysql med optionen `--local-infile=1`.

```text
$ mariadb --local-infile=1 skolan
```

Du kan också lägga till denna inställning i din `$HOME/.my.cnf` som alltid tillåter dig använda LOAD DATA INFILE.

```text
[client]
loose-local-infile = 1
```

Du kan verifiera att din fil `.my.cnf` ger rätt default inställningar till terminalklienten.

```text
$ mariadb --print-defaults
mariadb would have been started with the following arguments:
--loose-local-infile=1
```

Det är flera inställningar som skrivs ut, de kommer från din `.my.cnf`. Det är specifikt inställningen för `--loose-local-infile=1` som vi vill se.

Enklast är att lägga till denna inställningen i din `my.cnf`, så slipper du fundera på det senare.



### Databasservern {#fixserver}

Felet kan också bero på att LOAD LOCAL INFILE är avstängt på databasservern och vi behöver sätta på det.

Vi använder följande kommando för att kolla om LOCAL INFILE är på eller av.

```sql
SHOW VARIABLES LIKE 'local_infile';
```

Hos mig var den "OFF". Den skall vara "ON"

```text
mysql> SHOW VARIABLES LIKE 'local_infile';
+---------------+-------+
| Variable_name | Value |
+---------------+-------+
| local_infile  | OFF   |
+---------------+-------+
```

Då sätter jag på den.

```sql
SET GLOBAL local_infile = 1;
```

Nu bör den vara "On".

```text
mysql> SHOW VARIABLES LIKE 'local_infile';
+---------------+-------+
| Variable_name | Value |
+---------------+-------+
| local_infile  | ON    |
+---------------+-------+
```

Nu har du gjort inställningar så att både terminalklienten och servern tillåter dig att köra kommandot LOAD DATA LOCAL INFILE.



Kör LOAD DATA LOCAL INFILE {#go}
----------------------------------

Så här långt bör du ha skapat en sql-fil som ser ut ungefär så här.

```sql
--
-- Delete tables, in order, depending on
-- foreign key constraints.
--
DELETE FROM kurstillfalle;
DELETE FROM kurs;

--
-- Enable LOAD DATA LOCAL INFILE on the server.
--
SET GLOBAL local_infile = 1;
SHOW VARIABLES LIKE 'local_infile';

--
-- Insert into kurs.
--
LOAD DATA LOCAL INFILE 'kurs.csv'
INTO TABLE kurs
CHARSET utf8
FIELDS
	TERMINATED BY ','
    ENCLOSED BY '"'
LINES
	TERMINATED BY '\n'
IGNORE 1 LINES
;

SELECT * FROM kurs;

--
-- Insert into kurstillfalle.
--

-- Add SQL to LOAD DATA LOCAL INFILE for the table
-- kurstillfalle

SELECT * FROM kurstillfalle;
```

Nu kan du köra filen i terminalklienten.

```text
mariadb skolan < filens_namn.sql
```

Man får vara uppmärksam på eventuella varningar man kan få när filens innehåll och fält inte kan mappas in i tabellen. Men det bör gå bra för dig. Får du problem så kollar du hur du skapade tabellen kurs och ser om innehållet i CSV-filen mappar mot den strukturen, dubbelkolla till exempel längden på kolumnen och längden på texten i csv-filen.

När det fungerar så kan du gå vidare och göra samma LOAD för tabellen kurstillfalle.


<!--

Detta bör inte hända numer.

### Rättigheter för att sätta globala variabler {#globvar}

Det kan hända att du får problem med rättigheter, det kan vara din user-användare som inte har tillräckligt med rättigheter i databasen.

> "ERROR 1227 (42000) at line 11: Access denied; you need (at least one of) the SUPER or SYSTEM_VARIABLES_ADMIN privilege(s) for this operation"

Om du får problem med rättigheter så kan du antingen använda din root-användare, eller så tilldelar du din användare lite extra behörighet. I kursen kan det vara lite enklare om din user-användare har aningen mer rättigheter.

Låt oss därför ge user-användare lite mer rättigheter.

```sql
GRANT ALL PRIVILEGES
ON *.*
TO 'user'@'%'
;
```

Du kan spara undan koden ovan i din `setup.sql` så att den alltid körs när du skapar om din databas.
-->



Matcha kolumner {#kol}
----------------------------------

När antalet kolumner i CSV-filen inte mappar exakt mot strukturen i tabellen så kan man, likt vid INSERT, ange vilka kolumner som skall mappas.

När du läser in innehållet till tabellen kurstillfälle som märker du att det inte finns något fält som matchar det automatgenererade id:et i tabellen. Du behöver alltså ange vilka kolumner som skall få sina värden från CSV-filen.

Refmanualen visar hur man gör. Du kan göra det i slutet LOAD DATA, så här. Det är sista raden som säger vilka kolumner som skall användas.

```sql
LOAD DATA LOCAL INFILE 'kurstillfalle.csv'
-- resten av uttrycket
IGNORE 1 LINES
(kurskod, kursansvarig, lasperiod)
;
```

Dubbelkolla att du inte får varningar när du läser in datan och kika med SELECT att innehållet i tabellerna motsvarar det som finns i CSV-filerna.

Om du får varningar så kan du visa dem med `SHOW WARNINGS`.



Avslutningsvis {#avslutningsvis}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra samtliga SQL-satser, i en och samma sekvens, i filen du jobbar i.

Din fil skall tömma tabellerna kurs och kurstillfalle och sedan ladda om deras innehåll med LOAD DATA LOCAL INFILE från filerna `{kurs,kurstillfalle}.csv`.

Som en allra sista åtgärd så tar du och uppdaterar din fil `insert.sql` så att den fyller på databasen med rätt innehåll. Annars fungerar inte ditt återställningsskript.



Workbench {#fixworkbench}
----------------------------------

Detta stycket är överkurs.

Vi använder inte Workbench i detta exemplet, men här finns lite information om LOAD DATA LOCAL INFILE i Workbench.

När du gör LOAD DATA LOCAL INFILE i Workbench så får du troligen ett fel som säger att funktionen är disablad.

> "Error Code: 3948. Loading local data is disabled; this must be enabled on both the client and server sides"

Man kan göra LOAD DATA LOCAL INFILE i Workbench, men det verkar finnas någon form av [bugg som gör det aningen svårare i Workbench version 8.0](f/64484), tidigare versioner av Worbench fungerar dock bra.

Om du verkligen vill dyka ner i hur du kan lösa det med Workbench så kan du börja läsa i forumtråden ovan. Men vi klarar oss ypperligt med terminalklienten i detta fallet.

När man använder Workbench behöver man också ange absoluta sökvägar och det gör att dina SQL skript bara fungerar på din egen dator. Det gör det svårare för någon annan att köra dina skript, till exempel den som rättar dina inlämningar eller din kollega.
