---
author: mos
revision:
  "2012-09-11": (B, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2009-09-12": (A, mos) Första utgåvan
published: "2012-09-11"
updated: "2013-08-13 10:32:32"
created: "2012-08-30 08:17:46"
...
Kmom06: Databaser, SQL och PHP
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




Databaser, SQL och PHP {#inledning}
--------------------------------------------------------------------

*alternativt "Min egen sökmotor för kompisar"* 

Denna övning syftar till att knyta samman PHP och databasen MySQL. För att det skall lyckas så behöver vi förståelse för hur SQL fungerar och hur man bygger upp en databas med tabeller. Vi behöver förstå hur tabellerna byggs upp av fält (kolumner), hur rader med värden hamnar i tabellerna och hur vi kan söka information från en tabell. Vi behöver även förstå hur vi länkar samman information som finns i flera tabeller.

I övningen lär vi oss även hur vi kan ta en backup av databasen och dess innehåll samt hur vi återskapar en databas från en backup med SQL-satser.

Avslutningsvis så implementerar vi en kompis-sök, en liten PHP applikation där vi ställer frågor mot databasen. Vi använder oss av ett fungerande exempel och lånar kod för att snabbt komma igång.

Övningen är mest en snitslad bana för att en nybörjare skall komma igång med databaser, SQL och PHPMyAdmin. Slutövningen där PHP kopplas till SQL kan dock utföras med lite extra engegemang och arbetsinsats för att "showa-off".

Övningens upplägg är enligt följande:

* Läsanvisningar (10h)
* Övningar (10h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.

Glöm inte att läsa litteraturen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Följande kapitel hanteras under detta kursmomentet. Läs dem inför kursmomentet.

* Ch 25: Introducing MySQL (läs översiktligt)
* Ch 27: The Many MySQL Clients
* Ch 28: MySQL Storage Engines and Datatypes (läs översiktligt)
* Ch 30: Using PHP with MySQL
* Ch 34: MySQL Views (för referens)
* Ch 35: Practical Database Queries (för referens)


Sedan tidigare har vi läst följande kapitel, gå gärna tillbaka till det vid behov:

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics
* Ch 4: Functions
* Ch 5: Arrays
* Ch 6: Object-Oriented PHP
* Ch 7: Advanced OOP Features (läs översiktligt)
* Ch 8: Error and Exception Handling (läs endast översiktligt)
* Ch 9: Strings and regular expressions (hoppa över reguljära uttryck)
* Ch 13: Forms
* Ch 18: Session Handlers


###Beginning Web Programming with HTML, XHTML, and CSS {#beginning-web}

*(2nd edition)*

Sedan tidigare har vi hanterat följande kapitel, gå gärna tillbaka till det vid behov:

* Ch 1: Creating Structured Documents
* Ch 2: Links and Navigation
* Ch 3: Images and Objects
* Ch 5: Forms


###Databasteknik {#Databasteknik}

*(Första utgåvan)*

Följande kapitel bör du studera i olika omfattning.

* Kapitel 1: Databaser och databashanterare
* Kapitel 7: Introduktion till frågespråket SQL
* Kapitel 8: Mer om SQL: Aggregatfunktioner, null-värden, yttre join (vid intresse)
* Kapitel 9: Sammanfattning av SQL kommandon (som referens)
* Kapitel 18: Databasbaserade webbplatser (endast översiktligt)
* Kapitel 28: Introduktion till MySQL


###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

Referensmanual för MySQL är en viktig källa till SQL-kunskap.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/'>http://dev.mysql.com/doc/refman/5.1/en/</a>

W3Schools.com är bra att ha tillhanda. Underlättar de första stapplande stegen av SQL. Använd som referens vid behov.

* <a href='http://www.w3schools.com/sql/'>http://www.w3schools.com/sql/</a>

Wikipedia kan ge oss en hel del information för den informationstörstige.

* <a href='http://en.wikipedia.org/wiki/MySQL'>http://en.wikipedia.org/wiki/MySQL</a>
* <a href='http://en.wikipedia.org/wiki/SQL'>http://en.wikipedia.org/wiki/SQL</a>

PHP's referensmanual om mysqli databas extension. Här står det som du behöver veta om PHP's databaskoppling mot MySQL.

* <a href='http://php.net/manual/en/book.mysqli.php'>http://php.net/manual/en/book.mysqli.php</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.

	
1. MySQL {#mysql}
--------------------------------------------------------------------

Vi använder oss av databasen MySQL, en mycket vanlig databas i webb-sammanhang. Databasen är open source och finns att ladda ned och installera till flertalet operativsystem. Bekanta dig lite snabbt med MySQL's webbplats. Kan du se vilka operativsystem som stödjs för MySQL Community Server? Titta även i innehållsförteckningen i MySQL's referensmanual.

* <a href='http://www.mysql.com/'>http://www.mysql.com/</a>
* <a href='http://dev.mysql.com/doc/refman/5.1/en/'>http://dev.mysql.com/doc/refman/5.1/en/</a>

MySQL's reference manual är oumbärlig vid SQL-kodning. Där finns alla SQL-kommandon med deras syntax och varianter. Det kan vara lite klurigt att komma igång och förstå hur SQL-kommandona beskrivs i manualen men det kommer lösa sig efterhand. Börja med att snabbt och översiktligt studera manualsidorna för SQL-kommandona `CREATE TABLE` och `SELECT`.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/create-table.html'>http://dev.mysql.com/doc/refman/5.1/en/create-table.html</a>
* <a href='http://dev.mysql.com/doc/refman/5.1/en/select.html'>http://dev.mysql.com/doc/refman/5.1/en/select.html</a>

I denna och kommande övningar så använder vi dels det som kallas SQL DDL (Data Definition Language) och dels det som kallas SQL DML (Data Manipulation Language). I manualen får vi en snabb överblick över dessa olika kommandon.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-data-definition.html'>http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-data-definition.html</a>
* <a href='http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-data-manipulation.html'>http://dev.mysql.com/doc/refman/5.1/en/sql-syntax-data-manipulation.html</a>

Bekanta dig även med sökfunktionen som finns i referensmanualen. Den kan komma att hjälpa dig en hel del framöver. Sök till exempel på `DROP TABLE` och se vad det SQL-kommandot gör. Du bör finna nedanstående sida.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/drop-table.html'>http://dev.mysql.com/doc/refman/5.1/en/drop-table.html</a>

Fint, då har vi orienterat oss lite i MySQL och några av dess hjälpmedel. Ett annat hjälpmedel som många SQL-nybörjare uppskattar är W3Schools tutorial för SQL. Studera den gärna och se vad den kan erbjuda. Den innehåller många enkla exempel på SQL kommandon.

* <a href='http://www.w3schools.com/sql/'>http://www.w3schools.com/sql/</a>

Glöm dock inte att källan till din SQL-kunskap är referensmanualen, så är det ofta.


2. MySQL CLU (command line utility) {#clu}
--------------------------------------------------------------------

Det finns flera alternativa klienter för att koppla sig till MySQL. Det finns tex ett paket med grafiska applikationer som går att ladda ned från MySQL's hemsida. Det kallas MySQL GUI Tools och en av de applikationerna kallas MySQL Workbench. Detta är dock inget vi kommer använda i denna kursen men studera dem gärna efter eget intresse.

* <a href='http://www.mysql.com/downloads/workbench/'>http://www.mysql.com/downloads/workbench/</a>

En annan vanlig klient är den textbaserad klienten `mysql`. Du kan testa den genom att logga in på ssh.student.bth.se och skriva följande kommando.

```html
mos@seekers: mysql -p -h blu-ray.student.bth.se
```

Så här kan det se ut.

[FIGURE src=/img/oophp/kmom06/image09.png caption="MySQL command-line utility uppkopplad mot databasservern från ssh.student.bth.se."]

Här är några enkla MySQL-kommandon för att komma igång och koppla dig mot en databas.
```sql
mysql> show databases;
mysql> use mos;
mysql> show tables;
```

Så här ser det ut när jag kör dem.

[FIGURE src=/img/oophp/kmom06/image10.png caption="Några enkla kommandon för att komma igång."]

Så mycket om denna applikation. Använd den gärna som ett komplement till PHPMyAdmin som kommer att vara vår huvudklient i denna och kommande övningar.

Vill du läsa mer om MySQL i skolans labbmiljö så läser du följande dokument.

* <a href='http://dbwebb.se/kunskap/bth-s-labmiljo-for-webbprogrammering'>http://dbwebb.se/kunskap/bth-s-labmiljo-for-webbprogrammering</a>

Nu går vi över till den klient vi främst kommer att använda.


3. PHPMyAdmin {#phpmyadmin}
--------------------------------------------------------------------

PHPMyAdmin är en webbaserad klient som låter dig sköta din MySQL databas. PHPMyAdmin är utvecklad i PHP. Skaffa dig en snabb överblick av PHPMyAdmin genom att besöka dess webbplats.

* <a href='http://www.phpmyadmin.net/'>http://www.phpmyadmin.net/</a>
 
Gör enligt följande för att komma igång med PHPMyAdmin.

Öppna en webbläsare med länken:

* <a href='https://www.student.bth.se/phpmyadmin/'>https://www.student.bth.se/phpmyadmin/</a>

Logga in med ditt studentkonto.

Så här ser det ut för mig.

[FIGURE src=/img/oophp/kmom06/image12.jpg caption="Loggar in via PHPMyAdmin."]

Välkomstsidan ser ut som följer, orientera dig lite och se vad du kan göra.

[FIGURE src=/img/oophp/kmom06/image13.jpg caption="Inloggad och första sidan i PHPMyAdmin."]

Välj en databas för att se dess struktur. Klicka på fliken SQL för att kunna skriva SQL-satser.

Här följer några enkla MySQL-kommandon för att komma igång.

```sql
show databases;
show tables;
```

Så här ser det ut när jag kör dem. Som du ser så har jag redan ett par tabeller i min databas.

[FIGURE src=/img/oophp/kmom06/image01.jpg caption="Några enkla SQL-kommandon för att komma igång."]

Leta reda på hjälpfunktionen (frågetecknet uppe till höger) och studera den. Leta reda på FAQ-delen och kolla snabbt igenom vilken typ av frågor som hanteras där.

Bra, då har vi kommit igång med PHPMyAdmin. Då sätter vi igång och skapar tabeller.


4. Skapa tabell {#skapa}
--------------------------------------------------------------------

Låt oss skapa en tabell som innehåller dina kompisar. Tabellen får heta `Kompis` och den får innehålla 3 fält (`namn`, `alder`, `smeknamn`).

Välj din databas och välj fliken "Struktur". Längst ned på sidan finns en ruta där du kan fylla i ditt tabellnamn och ange antalet fält. Gör det.

[INFO]
**Rekommendation**

Använd inte åäö i tabell eller fältnamnen.
[/INFO]

[FIGURE src=/img/oophp/kmom06/image00.jpg caption="På gång att skapa en ny tabell i databasen."]

Vi kommer nu till en ruta där vi väljer inställningar för respektive fält. Så här väljer jag att skapa mina fält.

[FIGURE src=/img/oophp/kmom06/image03.jpg caption="Bestämmer inställningar på respektive fält i tabellen."]

Klicka på knappen "Spara" för att skapa tabellen och dess fält.

I svarsrutan visas även SQL-koden som användes för att skapa tabellen. I mitt fall blev det följande SQL-sats.

```sql
CREATE TABLE `mos`.`Kompis` (
`namn` VARCHAR( 40 ) NOT NULL ,
`alder` INT NOT NULL ,
`smeknamn` CHAR( 8 ) NULL
) ENGINE = MYISAM;
```

Pröva gärna att kopiera koden ovan och köra den direkt i MySQL CLU (den textbaserade mysql-klienten). Det blir ett felmeddelande men det verkar ju stämma förstås.

[FIGURE src=/img/oophp/kmom06/image02.jpg caption="Testar att köra SQL-koden via mysql clu."]

Bra, låt oss gå vidare och pröva att redigera en befintlig tabell.


5. Redigera tabell {#redigera}
--------------------------------------------------------------------

För det första, ålder är inte så smart att spara i en databas, låt oss ändra det fältet till födelsedatum istället. Sen går det ju att räkna fram åldern.

För det andra, vi behöver något som gör varje rad unik. I detta fallet så väljer vi att lägga till ett id-fält som innehåller en siffra som räknas upp för varje ny kompis. Denna typen av id brukar kallas automatiskt inkrementerande nycklar.

Välj tabellen och fliken "Struktur". Börja med att markera kolumnen ålder leta reda på "Åtgärd - Ändra" (finns till vänster på samma rad). Klicka, genomför ändringen och välj "Spara".

[FIGURE src=/img/oophp/kmom06/image04.jpg caption="Ändrar från integer till datum samt byter namn på fältet."]

I svarsformuläret som bekräftar ändringen så kan du se vilken SQL-sats som genomfördes.

```sql
ALTER TABLE `Kompis` CHANGE `alder` `fodd` DATE NOT NULL
```

Om du vill veta mer om `ALTER TABLE` så slår du upp det i MySQL's referensmanual.

Fortsätt nu att lägga till det nya id-fältet. Under tabellen så finns det en funktion för att lägga till nya fält. Välj att lägga till 1 fält i början av tabellen. Definera fältet enligt följande bild. Klicka "Spara" för att skapa fältet.

[FIGURE src=/img/oophp/kmom06/image15.jpg caption="Skapa det nya id-fältet som en auto_increment primärnyckel i tabellen."]

SQL koden som användes följer.

```sql
ALTER TABLE `Kompis` ADD `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST ;
```

Denna typen av ändringar går utmärkt att genomföra så länge det inte finns värden i tabellen. Även när det är värden i tabellen så går den att ändra, men då får man vara lite försiktig så man vet vad man gör. Ta alltid en backup innan du försöker göra ändringar i befintliga tabeller. Vi kommer testa funktioner för att ta backup senare i denna övning.


6. Lägga in/Uppdatera/Radera rader i tabellen {#rader}
--------------------------------------------------------------------

###6.1 Lägga till {#rad-laggatill}

Låt oss lägga in lite rader i tabellen. Välj tabellen och fliken "Lägg till". Lägg till 6 rader i tabellen. Vi behöver inte ange något värde för fältet id eftersom det räknar upp sig själv (`auto_increment`).

[FIGURE src=/img/oophp/kmom06/image16.jpg caption="Lägger till två nya rader i tabellen."]

SQL koden för de två första raderna följer.

```sql
INSERT INTO `mos`.`Kompis` (
  `id` ,
  `namn` ,
  `fodd` ,
  `smeknamn`
)
VALUES (
  NULL , 'Mikael Roos', '1968-03-07', 'mos'
), (
  NULL , 'Börje Hult', '1954-09-12', 'hultarn'
);
```

Ser bra ut va? Lägg till ytterligare fyra rader till i tabellen.


###6.2 Uppdatera {#rad-uppdatera}

Välj tabellen och klicka på fliken "Visa". Där ser du samtliga rader som finns i tabellen. Jag ser nu att jag stavade fel på ett av namnen. Börje Hult heter ju Halt i efternamn och kallas för haltarn. Genomför en liknande ändring för en av dina rader.

[FIGURE src=/img/oophp/kmom06/image17.jpg caption="Uppdatera fälten i en rad."]

SQL koden för uppdateringen följer.

```sql
UPDATE `mos`.`Kompis` 
SET `namn` = 'Börje Halt', `smeknamn` = 'haltarn' 
WHERE `Kompis`.`id` = 2 
LIMIT 1 ;
```

Bra, det funkade det också.


###6.3 Radera {#rad-radera}

Visst ja, jag är ju inte kompis med Uno, han skall bort ur tabellen. Jag väljer att radera honom. Gör du också liknande med en rad i din tabell.

[FIGURE src=/img/oophp/kmom06/image18.jpg caption="Radera en rad."]

SQL koden för raderingen följer.

```sql
DELETE FROM `Kompis` WHERE `Kompis`.`id` = 6 LIMIT 1 ;
```

Bra, nu kan vi det här.

Pröva gärna att köra SQL-satserna MySQL CLU, det är bra att testa och leka runt lite.



7. Ställa frågor mot tabellen {#fraga}
--------------------------------------------------------------------

Välj tabellen och flik "Visa". Själva SQL-koden som används för att välja ett antal rader från tabellen är:

```sql
SELECT * 
FROM `Kompis` 
LIMIT 0 , 30
```

Välj nu fliken "SQL" så skall vi pröva att skriva lite egna frågor mot tabellen. Det är bra om du plockar fram manualsidan för "SELECT". Den kan bli användbar.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/select.html'>http://dev.mysql.com/doc/refman/5.1/en/select.html</a>

Börja med att ställa följande enkla fråga som väljer ut samtliga rader i tabellen. Kör frågan och studera svaret.

```sql
SELECT * FROM Kompis
```

[FIGURE src=/img/oophp/kmom06/image21.jpg caption="Visar resultatet från vald SQL-sats."]

Tydligen lägger applikationen själv till koden `LIMIT 0,30`. Det är för att begränsa antalet rader som svaret kan ge. Det är ju ingen fara i vårt fall men ligger det flera tusen rader i en tabell så kan det vara viktigare.

Klicka på "Ändra" för att ändra SQL-satsen. Kör följande SQL-satser en och en och studera vilket resultat de ger. Använd referensmanualen för att slå upp mer exakt hur de olika varianterna fungerar.

```sql
--
-- Kommentarer i SQL skrivs med --
--
-- Att välja rader från tabellen med kriteria
SELECT * FROM Kompis WHERE id > 2;
SELECT * FROM Kompis WHERE id = 1 OR id = 4;
SELECT * FROM Kompis WHERE id IN (1, 4);
SELECT * FROM Kompis WHERE smeknamn = 'alterego';
SELECT fodd FROM Kompis WHERE namn LIKE '%Mi%';

-- Att sortera resultatet
SELECT * FROM Kompis ORDER BY namn ASC;
SELECT namn, smeknamn FROM Kompis WHERE fodd < NOW() ORDER BY smeknamn DESC;
```

Det verkar fungera bra va? Försök nu själv, kom på egna frågor och testa tills du kan detta.

[FIGURE src=/img/oophp/kmom06/image22.jpg caption="Visar olika rader baserat på SQL-sats."]

Då går vi vidare och försöker räkna ut åldern.


8. Inbyggda funktioner {#funktioner}
--------------------------------------------------------------------

###8.1 Översikt {#funk-oversikt}

SQL är ett kraftfullt språk och det finns mycket att utforska inom det. I förra exemplet såg vi funktionen `NOW()` som returnerar dagens tid och datum. Pröva den genom att skriva följande `SELECT`-sats.

```sql
-- Systemets tid och datum
SELECT NOW();
```

Fortsätt att testa fler inbyggda funktioner genom att testa följande SQL-satser.

```sql
-- Datum och tid
SELECT WEEK(NOW()) AS vecka;

-- Kryptering
SELECT MD5('hemlig') AS krypterad;

-- Strängfunktioner
SELECT CONCAT('Hello', 'World', NOW()) AS strang;
SELECT LENGTH('hej') AS antal;

-- Matematiska funktioner
SELECT PI() + SQRT(2) + TAN(1) AS summan;
```

Kapitel 11 i referensmanualen ger oss en god insyn i vilken typ av inbyggda funktioner som finns. Bekanta dig med dem, de kan spara mycket utvecklingstid.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/functions.html'>http://dev.mysql.com/doc/refman/5.1/en/functions.html</a>


###8.2 Räkna ut åldern {#rakna-alder}

Att räkna ut någons ålder borde vara enkelt, men nehe, det var det inte. Det första man skulle tänka sig att testa är ju att ta diffen mellan dagens datum och födelsedatumet. Pröva det så får vi se.

```sql
-- Försök att räkna ut ålder
SELECT ROUND((DATEDIFF(CURDATE(), '1968-03-07') / 365), 1) AS alder;
```

Nu har ju inte alla år 365 dagar så det blir lite ungefärligt. Vill du se ett mer korrekt och exakt sätt att räkna ut åldern så finner du det referensmanualen.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/date-calculations.html'>http://dev.mysql.com/doc/refman/5.1/en/date-calculations.html</a>

Pröva följande SQL-kod för att visa åldern på alla rader i din tabell.

```sql
-- Visa alla kompisar och deras ålder
SELECT *, (YEAR(CURDATE())-YEAR(fodd))-(RIGHT(CURDATE(),5)<RIGHT(fodd,5)) AS alder
FROM Kompis;
```

Lite krångligt men det funkar som det ska.


9. Att skapa vyer {#vyer}
--------------------------------------------------------------------

När man har lite långa och krångliga SQL-satser, som i föregående exempel, så vill man inte behöva upprepa att skriva dem hela tiden. Då finns det något som heter vyer som kan underlätta.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/create-view.html'>http://dev.mysql.com/doc/refman/5.1/en/create-view.html</a>
* <a href='http://dev.mysql.com/doc/refman/5.1/en/drop-view.html'>http://dev.mysql.com/doc/refman/5.1/en/drop-view.html</a>

Ta till exempel SQL-satsen som visade aldern och skapa en vy `VKompis`. Du gör det med följande SQL-sats.

```sql
-- Skapa en vy som visar alla kompisar och deras ålder
CREATE VIEW VKompis
AS
SELECT *, (YEAR(CURDATE())-YEAR(fodd))-(RIGHT(CURDATE(),5)<RIGHT(fodd,5)) AS alder
FROM Kompis;

-- Visa alla rader i vyn VKompis
SELECT * FROM VKompis;
SELECT * FROM VKompis ORDER BY alder DESC;
SELECT * FROM VKompis WHERE alder > 40 and alder < 65;
```

När du väl skapat vyn så kan du använda den som en vanlig tabell. Nu fick du dessutom `VKompis` som en ny tabell/vy synlig i PHPMyAdmin. Klicka på den och inspektera den. 

Klicka på fliken "Visa" för att se alla rader i vyn/tabellen.

[FIGURE src=/img/oophp/kmom06/image23.jpg caption="Visar alla rader i vyn VKompis."]

Som du ser så hanteras vyer på liknande sätt som en vanlig tabell.


10. Aggregerande funktioner {#aggregerande}
--------------------------------------------------------------------

Aggregerande funktioner kan användas för att göra beräkningar på innehåll i tabeller. Låt oss pröva att beräkna medelåldern för alla kompisar.

```sql
-- Visa snittåldern för alla kompisar
SELECT AVG(alder) AS snittalder
FROM VKompis;
```

Du kan även beräkna `MIN` och `MAX` värden eller beräkna antalet rader i ett resultat. Pröva följande SQL kod så ser du.

```sql
-- Visa högsta åldern bland kompisarna
SELECT MAX(alder) AS hogsta FROM VKompis;

-- Visa lägsta åldern bland kompisarna
SELECT MIN(alder) AS lagsta FROM VKompis;

-- Visa antalet kompisar
SELECT COUNT(id) AS antal FROM VKompis;
```

Du kan läsa mer om aggregerande funktioner i referensmanualen.

* <a href='http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html'>http://dev.mysql.com/doc/refman/5.1/en/group-by-functions.html</a>

Det finns mycket mer att studera om aggregerande funktioner. Men vi nöjer oss med detta i denna kursen.


11. Joina innehåll från flera tabeller {#joina}
--------------------------------------------------------------------

###11.1 Databasmodellen {#modell}

I databaser handlar det ofta om att länka ihop information som finns i olika tabeller. Detta är kärnan i relationsdatabaser. Låt oss göra följande exempel:

> *En kompis har namn, smeknamn och ålder. Varje kompis har viss utrustning. Utrustning kan vara tv-spel, dator, tonårsrum eller pengar.*

För att implementera detta i tabeller så behöver vi tabellen Utrustning och en tabell som kopplar en kompis till en viss utrustning. Låt oss kalla den sista tabellen för en kopplingstabell. Tabellens syfte är att länka samman en kompis med den utrustning som kompisen har. En ritning av detta kan se ut så här.

[FIGURE src=/img/oophp/kmom06/image14.png caption="ER-diagram över relationerna mellan Kompis och Utrustning."]

Dessa ritningar kallas "Entity-Relation diagrams", ER-diagram. Vi kommer inte fördjupa oss i dessa i denna kursen. Men du bör vara medveten om att de finns och att de används för att visualisera hur informationen i databasen hänger ihop.

Själva modellen ovan visar att en viss kompis kan ha flera saker. En viss typ av sak, tex TV-spel, kan innehas av flera kompisar. Det är just en typ av utrustning som vi väljer att hantera i exemplet, inte själva instansen av utrustningen.


###11.2 Skapa tabellerna {#skapa-tab}

Skapa nu tabellerna `Utrustning (id, typ)` och `KompisUtrustning (id, id_Kompis, id_Utrustning)`.

Fälten `id` skall vara av typen `INTEGER`, defineras som primärnyckel och vara `auto_increment`. Fälten `id_Kompis` och `id_Utrustning` skall vara av samma datatyp som motsvarande fält i respektive tabell:

* `Kompis.id - KompisUtrustning.id_Kompis`
* `Utrutsning.id - KompisUtrustning.id_Utrustning`

Det är dessa fält som gör att en kompis kan kopplas till en utrustning.
SQL-koden som används för att skapa mina tabeller följer, jämför med den som används för att skapa dina egna tabeller.

```sql
-- Skapa tabellen Utrustning
CREATE TABLE `mos`.`Utrustning` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`typ` VARCHAR( 40 ) NOT NULL
) ENGINE = MYISAM

-- Skapa tabellen KompisUtrustning
CREATE TABLE `mos`.`KompisUtrustning` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`id_Kompis` INT NOT NULL ,
`id_Utrustning` INT NOT NULL
) ENGINE = MYISAM
```


###11.3 Mata in värden {#mata-varden}

Lägg nu in minst 4 rader i tabellen Utrustning. Lägg in "TV-spel", "Dator", "Tonårsrum" och "Pengar".
Verifiera att alla rader finns på plats i tabellen.

[FIGURE src=/img/oophp/kmom06/image24.jpg caption="Nu finns fyra rader i tabellen Utrustning."]

Lägg nu in rader i tabellen `KompisUtrustning`. Jag väljer att lägga in nedanstående kopplingar som rader i kopplingstabellen. Glöm inte att det är primärnycklarnas värden som du skall lägga in på respektive rad. Du ser värden på mina nycklar inom parantes. Dina värden kan skilja sig från mina.

* mos (1), TV-spel (1)
* mos (1), Dator (2)
* kurre (3), Pengar (4)
* alterego (4), TV-spel (1)
* alterego (4), Dator (2)
* svenne (5), TV-spel (1)
* svenne (5), Dator (2)
* svenne (5), Pengar (4)

Så här ser innehållet i tabellen KompisUtrustning ut hos mig.

[FIGURE src=/img/oophp/kmom06/image19.jpg caption="Innehåll i tabellen KompisUtrustning."]

Bra, då skall vi se om vi kan koppla ihop vilken kompis som har vilken utrustning.


###11.4 Joina och visa värden från flera tabeller {#joina-tabeller}

Kör följande SQL-sats och se vilket svar du får.

```sql
-- Joina tabellerna
SELECT * FROM Kompis, Utrustning, KompisUtrustning;
```

Du borde få en lista med rader med osammanhängande information. Resultatet kallas en cross join eller cartesian product. Det innebär i korthet att varje rad har kopplats till varje rad i de andra tabellerna. Resultatet blir "antalet rader i Kompis" x "antalet rader i Utrustning" x "antalet rader i KompisUtrustning". I mitt fall blev det 160 rader (5 x 4 x 8).

* <a href='http://en.wikipedia.org/wiki/Join_(SQL)'>http://en.wikipedia.org/wiki/Join_(SQL)</a>#Cross_join

För att begränsa svaret så måste vi koppla ihop raderna. Vi vet ju till exempel att "Börje Halt" inte har någon utrustning så han borde ju inte synas i listan. Denna koppling kan vi göra med ett `WHERE`-villkor. Pröva följande SQL-sats.

```sql
-- Joina tabellerna med villkor
SELECT * FROM Kompis, Utrustning, KompisUtrustning
WHERE Kompis.id = KompisUtrustning.id_Kompis;
```

Det blev bättre, jag fick 32 rader. Men jag får fortfarande att alla kompisar har all utrustning och det stämmer ju inte. Vi utvidgar `WHERE`-villkoret. Pröva följande SQL-sats.

```sql
-- Joina tabellerna med villkor
SELECT * FROM Kompis, Utrustning, KompisUtrustning
WHERE
 Kompis.id = KompisUtrustning.id_Kompis
 AND
 Utrustning.id = KompisUtrustning.id_Utrustning    
;
```

Sådärja, nu blev det 8 rader och det ser ut så som jag matat in.

[FIGURE src=/img/oophp/kmom06/image20.jpg caption="En korrekt join av innehållet i tabellerna Kompis, Utrustning och KompisUtrustning."]

Som du ser så återkommer kolumnerna id flera gånger och vi kan inte riktigt veta till vilken tabell de pekar. Detta blir ju lite dumt, det är viktigt hur man namnger kolumnerna i tabellen. För att göra en mer korrekt listning så får vi välja vilka kolumner vi vill visa. Pröva följande SQL-sats där vi väljer kolumner samt använder nyckelordet `AS` för att ge tabeller och kolumner ett "smeknamn".

```sql
--
-- Joina tabellerna med villkor och byt namn på kolumner och tabeller.
--
SELECT
 KU.id AS Id,
 K.namn As Namn,
 K.smeknamn AS Smeknamn,
 K.fodd AS Fodd,
 U.typ AS Utrustning,
 KU.id_Kompis,
 KU.id_Utrustning
FROM
 Kompis AS K,
 Utrustning AS U,
 KompisUtrustning As KU
WHERE
 K.id = KU.id_Kompis
 AND
 U.id = KU.id_Utrustning    
;
```

Det borde ge en snyggare visning av innehållet i tabellerna.


###11.5 Joina och visa värden från flera tabeller {#joina-varden}

Låt oss nu jobba lite med tabellen och köra lite frågor mot den. Pröva med att ställa följande frågor.

* Vilka kompisar har pengar?
* Vilka kompisar har TV-Spel eller Dator?
* Vilken utrustning har "Micke Moped"?

Vi producerar lite SQL-satser för dessa frågor och testkör dem. För att göra saker enklare så skapar vi en vy av SELECT-satsen som joinade de tre tabellerna.

```sql
--
-- Skapa vy VKompisUtrustning av de joinade tabellerna
--
CREATE VIEW VKompisUtrustning
AS
SELECT
 KU.id AS Id,
 K.namn As Namn,
 K.smeknamn AS Smeknamn,
 K.fodd AS Fodd,
 U.typ AS Utrustning,
 KU.id_Kompis,
 KU.id_Utrustning
FROM
 Kompis AS K,
 Utrustning AS U,
 KompisUtrustning As KU
WHERE
 K.id = KU.id_Kompis
 AND
 U.id = KU.id_Utrustning    
;
```

Kör nu följande SQL-satser för att svara på dina frågor.

```sql
-- Visa alla kompisar och deras utrustning.
SELECT *
FROM VKompisUtrustning
ORDER BY Namn
;

-- Vilka kompisar har pengar?
SELECT *
FROM VKompisUtrustning
WHERE Utrustning = 'Pengar'
;

-- Vilka kompisar har TV-Spel eller Dator?
SELECT DISTINCT Namn, Smeknamn
FROM VKompisUtrustning
WHERE id_Utrustning = 1 OR id_Utrustning = 2
;

-- Vilken utrustning har "Micke Moped"?
SELECT *
FROM VKompisUtrustning
WHERE Namn = 'Micke Moped';
;
```

Bra, nu kan vi det här.


12. Ta backup på databasen {#backup}
--------------------------------------------------------------------

###12.1 Spara alltid SQL-satserna {#spara}

En databas och dess innehåll går enkelt att återskapa genom att köra alla SQL-kommandon som skapar tabellerna, vyerna samt matar in raderna i tabellerna. Därför skall man alltid spara de SQL-satser man kör i en separat fil. De går alltid att återanvända. Från och med nu, se alltid till att du sparar de SQL-satser du kör. Skriv även en enkel kommentar om vad satsen gör.


###12.2 Ta backup {#ta-backup}

En databas backup kan resultera i en fil med SQL-kommandon som återskapar databasen och lägger in raderna i tabellerna. Pröva att skapa en backup av din nuvarande databas enligt följande.

Klicka på din din databas, välj fliken "Exportera". Markera alla tabeller och vyer som vi jobbat med i denna övning. Klicka även för valet "Struktur -> Lägg till DROP TABLE / VIEW / PROCEDURE / FUNCTION". Klicka "Kör". Resultatet blir en SQL-fil med satser för att skapa tabellerna och lägga in rader. Gå igenom filen och se om du känner igen dig. Spara filen i en separat textfil, nu har du en backup på det vi gjort så här långt.

[FIGURE src=/img/oophp/kmom06/image11.jpg caption="SQL-kod för att återskapa databasen."]


###12.3 Skapa databas med innehåll från backup-fil {#aterskapa}

Välj din databas och välj fliken "Importera". Här kan du importera en backup och återskapa tabeller och rader. Välj att importera den filen du nyss sparade. SQL-satserna i filen kommer att exekveras och skapa tabellerna samt lägga in nya rader i tabellerna.

Förhoppningsvis går det bra.

Om det inte går bra så riskerar du att tappa all data. Om du skulle göra det så har en min egen backup-fil tillgänglig. Använd den och importera den för att återskapa tabeller och rader. Precis så som jag skapat dem i övningen hittills.

Om problem inträffar så är det viktigt att du försöker att skapa en ny backup-fil för att testa igen. Testa så att det fungerar. Backup är oerhört viktigt. Testa tills det fungerar.


13. Att koppla PHP till MySQL {#koppla-php}
--------------------------------------------------------------------

###13.1 Studera ett exempel {#koppla-ex}

Nu kan vi en del om databaser, PHPMyAdmin och SQL. Låt oss då studera ett exempel på hur man kopplar PHP-kod mot en MySQL-databas.

Exemplet visar hur du kopplar dig från PHP-kod mot en MySQl-databas och ställer frågor. Studera exemplen och studera särskilt exemplet med sökrutan, du skall snart göra en egen sådan. Fast en kompis-sökare. Vi kan nästan anta att de fungerar nästan likadant. Här är exemplet. Studera delen som har med MySQL att göra.

* <a href='http://www.student.bth.se/~mos/php-to-db/'>http://www.student.bth.se/~mos/php-to-db/</a>

[FIGURE src=/img/oophp/kmom06/image06.jpg caption="Exempel på hur PHP kod kan användas mot en MySQL databas."]

Om du studerar källkoden i filen så ser du följande viktiga sekvenser. Först hur kopplingen mot databasen sker.

```php
// ------------------------------------------------------------------------
//
// Connect to the database server
//
// <a href='http://php.net/manual/en/book.mysqli.php'>http://php.net/manual/en/book.mysqli.php</a>
// <a href='http://php.net/manual/en/mysqli.connect-error.php'>http://php.net/manual/en/mysqli.connect-error.php</a>
//
// Host, database, user and password stored in separate file
require_once('config.php');
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_error()) {
  echo "Connect failed: ".mysqli_connect_error()."<br>";
  exit();
}
echo "<p>Connected successfully</p>";
```

I exemplet så har man valt att lagra viss information i filen `config.php`. Mer om den lite längre ned.

Efter att kopplingen skett så förbereds SQL-satsen i en sträng för att sedan exekveras mot databasen i en query.

```php
// ------------------------------------------------------------------------
//
// Prepare and perform a SELECT query
//
// <a href='http://php.net/manual/en/mysqli.query.php'>http://php.net/manual/en/mysqli.query.php</a>
// <a href='http://php.net/manual/en/mysqli.real-escape-string.php'>http://php.net/manual/en/mysqli.real-escape-string.php</a>
// <a href='http://php.net/manual/en/mysqli.error.php'>http://php.net/manual/en/mysqli.error.php</a>
// <a href='http://php.net/manual/en/mysqli-result.num-rows.php'>http://php.net/manual/en/mysqli-result.num-rows.php</a>
//
// Sanitize data
$search = $mysqli->real_escape_string($_GET['search']);
// Prepare query
$query = "SELECT * FROM Cars WHERE nameCars LIKE '%{$search}%' OR modelCars LIKE '%{$search}%';";
if(empty($search)) {
  echo "Nothing to search for. Exiting...";
  exit;
}
// Execute query
$res = $mysqli->query($query) 
  or die("Could not query database, query =<br/><pre>{$query}</pre><br/>{$mysqli->error}");
echo "<p>Query={$query}</p><p>Number of rows in resultset: " . $res->num_rows . "</p>";
```

Därefter hanteras resultatet och skrivs ut, rad för rad. Sedan stängs resultatet med `close()` då det inte behövs mer.


```php
// ------------------------------------------------------------------------
//
// Show the results of the query
//
// <a href='http://php.net/manual/en/mysqli-result.fetch-object.php'>http://php.net/manual/en/mysqli-result.fetch-object.php</a>
// <a href='http://php.net/manual/en/mysqli.close.php'>http://php.net/manual/en/mysqli.close.php</a>
//
$i = 1;
while($row = $res->fetch_object()) {
  echo $i . ": " . $row->idCars . " - " . $row->nameCars . " - " . $row->modelCars . " - " . $row->readyCars . " - " . $row->hoursCars . "<br/>";
  $i++;
}
$res->close();
```

Tills slut stängs även `mysqli`-objektet.

```php
// ------------------------------------------------------------------------
//
// Close the connection to the database
//
// <a href='http://php.net/manual/en/mysqli.close.php'>http://php.net/manual/en/mysqli.close.php</a>
//
$mysqli->close();
```

Detta var i stort sett de viktiga delarna i exemplet. Nu är det snart dags att göra detta på egen hand. Först lite om filen `config.php`.


###13.2 `config.php` {#config}

Innehållet i `config.php` ser ut som följer:

```php
<?php
// ==================================================================
// User Settings -- CHANGE HERE
//
// On ssh.student.bth.se, protect the password in this file by 
// executing the following command (in the same directory as the file)
// 
//  sudo chgrp_www-data
// 
/* EXAMPLE
 
mos@sweet: ls -l config.php 
-rw-r--r-- 1 mos 500 407 2009-09-29 23:06 config.php
mos@sweet: sudo chgrp_www-data
[sudo] password for mos: 
mos@sweet: ls -l config.php 
-rw-r----- 1 mos www-data 407 2009-09-29 23:06 config.php
mos@sweet: 
*/
//
 
// Database
define('DB_USER',     'mos');                    // <-- mysql db user
define('DB_PASSWORD', 'secret password');        // <-- mysql db password
define('DB_DATABASE', 'mos');                    // <-- mysql db name
define('DB_HOST',     'blu-ray.student.bth.se'); // <-- mysql server host
```

Ändra informationen till ditt eget studentkonto och ditt lösenord.

När du visar upp filen i source.php så kommer det att se ut så här (ditt lösenord är skyddat och visas ej):

* <a href='http://www.student.bth.se/~mos/php-to-db/source.php?dir=&file=config.php'>http://www.student.bth.se/~mos/php-to-db/source.php?dir=&file=config.php</a>

I filen används funktionen `define()` för att definera användarid, lösen, databas och hostname som globala variabler. Koden i `source.php` hindrar dock att lösenord och användarid visas när källkoden visas (förutsatt att filen heter `config.php`).

Som en extra säkerhetsåtgärd så skall du skydda filens rättigheter det gör du med ett script som itsupporten har tillverkat. Du måste stå i samma katalog som filen `config.php` ligger i. Du kör scriptet med följande kommando. 

```html
mos@sweet: ls -l config.php 
-rw-r--r-- 1 mos 500 407 2009-09-29 23:06 config.php
mos@sweet: sudo chgrp_www-data
[sudo] password for mos: 
mos@sweet: ls -l config.php 
-rw-r----- 1 mos www-data 407 2009-09-29 23:06 config.php
```

Skriptet ändrar rättigheterna på filen `config.php` som ligger i det biblioteket du står. De nya rättigheterna gör att endast den användare som kör webservern kan läsa filen (och du själv förstås). Så här kan det se ut när jag kör kommandot i PuTTy.

[FIGURE src=/img/oophp/kmom06/image08.jpg caption="Exempel som visar hur filen `config.php` skyddas."]

På detta sättet hindras alla som har ett studentkonto att komma åt ditt lösenord. Använd detta och kontrollera att rättigheterna ändras på din fil.

Nu är det dags att göra detta själv, din egen kompis-hittare med PHP.


14. Sök kompisar {#sok}
--------------------------------------------------------------------

Som dagens sista övning så skall vi skapa en kompis-sökmotor. Du får ett exempel på hur den kan se ut, därefter får du själv implementera den. Studera exempelkoden från ovan och pröva dig fram. Om du råkar i trubbel så finns facit i nedanstående exempels källkod. 

Lycka till.

Så här blev min egen kompis-sökmotor.

* <a href='http://www.student.bth.se/~mos/oophp/mom06/kompis/kompis.php?search=tv'>http://www.student.bth.se/~mos/oophp/mom06/kompis/kompis.php?search=tv</a>

[FIGURE src=/img/oophp/kmom06/image05.jpg caption="Ett exempel av en kompis-sök, inte snyggt men funkar."]


15. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Tankenöt hoppar vi över idag. Lägg istället kraften på att göra din kompis-sök så att den blir lite snyggare, kanske kan du få den att likna Googles sökmotor. "Showaoff" lite, gläns :-).


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.

2. Genomför momentets alla steg.

3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Besvara gärna följande:
  * Vad anser du om SQL, känns det enkelt att förstå och använda? 
  * Beskriv din egen erfarenhet av SQL och databaser (nybörjare/erfaren). 
  * Vad anser du om PHPMyAdmin?
  * Har du använt PHP tillsammans med databaser tidigare?

4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
