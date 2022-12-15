---
author: mos
category:
    - sql
    - databas
revision:
    "2018-01-03": "(Q, mos) Uppgraderade dokumentet till en guide."
    "2017-02-28": "(P, mos) Update on HAVING."
    "2017-02-24": "(O, mos) Genomgång inför dbjs."
    "2013-11-18": "(N, mos) Bytte ut bild om 3-tabellers join, stycke om teckenkodning, stycke om ER-diagram."
    "2013-10-17": "(M, mos) Förtydligade att man inte kan skapa en ny databas på BTH's server."
    "2013-08-16": "(L, mos) Flyttad till dbwebb.se, genomgången och uppdaterad samt testad. Nu som en del av kursen [oophp](oophp)."
    "2011-01-20": "(K) Uppdaterat betygsättning till G/U."
    "2010-09-04": "(J) Genomgången HT2010, ändrade lite i redovisningstexten, lade till stycke om storage engines."
    "2010-03-01": "(I) Förtydligade texten i 11.1-11.3."
    "2010-01-20": "(H) Uppdaterade 12.5-6 och lade till 12.7 med INNER JOIN stycke 14 OUTER JOIN som extrauppgift."
    "2010-01-14": "(G) Genomgånget inför våren 2010. Numrerade om kapitlen. Småjusteringar i övningarna. Förtydligade."
    "2009-09-23": "(F) Förtydligade stycke under INSERT om att ange vilka kolumner som INSERT avser."
    "2009-09-09": "(E) Integrerade smärre ändringar från vårens kursomgång, missade det i förra uppdateringen. Smärre justeringar samt lade till MIN, MAX och HAVING under stycket om aggregerande funktioner. Bytte plats på kapitel 7 och 8. Lade till en Tankenöt på sista uppgiften."
    "2009-09-04": "(D) Genomgång inför hösten 2009."
    "2008-10-08": "(C) Förtydligade att SQL kommandona skall sparas i fil."
    "2008-09-15": "(B) Smärre justeringar i text och formuleringar."
    "2008-08-28": "(A) Första utgåvan."
...
Kom igång med SQL
==================================

Denna övning/laboration handlar om att komma igång med SQL. Den består av en mängd övningar där du får börja skapa tabeller, fylla dem med innehåll och därefter ställa SQL-frågor för att söka ut och bearbeta innehållet. Övningen tar dig igenom de vanliga förekommande konstruktionerna som du behöver känna till -- lär dig dem och du kommer att ha en god grund för att behärska databaser. De första övningarna är enkla och övningarna mot slutet lite mer utmanande.

Om du redan kan SQL så är den här övningen någorlunda enkel. Men då får du ta den som en liten avstämningsövning och repetition på dina SQL-kunskaper. 

<!--more-->

Övningen är utvecklad för MySQL men använder standard SQL så den bör gå bra att köra även i andra databaser. När det finns hänvisningar till referensmanualen så avses [referensmanualen för MySQL](http://dev.mysql.com/doc/refman/5.7/en/). Välj senaste GA versionen av manualen, men även äldre versioner fungerar för övningens omfattning.

Du kan välja att göra övningen i valfri klient. Jag har gjort övningen i MySQL Workbench.

[INFO]
**Nyare utgåva**

Det finns en utgåva av detta dokument som är vidareutvecklat. Du hittar det uppdaterade dokumentet i form av en guide på "[Kom igång med SQL i MySQL](guide/kom-igang-med-sql-i-mysql)".
[/INFO]



Förkunskaper {#forkunskaper}
---------------------------------------------------------------------

Du behöver ha tillgång till en databasserver för MySQL och en klient som WorkBench, PHPMyAdmin eller kommandoradsklient. Behöver du hjälp så finns guiden "[Kom igång med databasen MySQL och dess klienter](kunskap/kom-igang-med-databasen-mysql-och-dess-klienter)".

Om du vill kan du utföra labben genom att jobba mot [BTH's labbmiljö för MySQL](kunskap/bth-s-labbmiljo-for-databasen-mysql).



1. Introduktion {#intro}
---------------------------------------------------------------------



###1.1 SQL statements {#sql}

Här följer en snabb översikt över de vanligaste SQL-kommandona. Vill du veta i detalj hur de fungerar så vet du nu vart du skall vända dig -- referensmanualen, just det.

För att välja och presentera data:

```sql
SELECT
  FROM
  [WHERE]
  [GROUP BY]
  [ORDER BY]
```

För att skapa, uppdatera och radera data:

```sql
INSERT INTO VALUES
UPDATE SET
DELETE
```

För att skapa objekt (databaser, tabeller, vyer, etc) i en databas:

```sql
CREATE
ALTER
DROP
```

Pröva att finna informationen om dessa SQL-kommandon i refmanualen. Ju bättre du blir på det desto enklare och snabbare kommer du igenom övningen.



###1.2 Spara din SQL kod i fil {#spara}

Spara din SQL-kod från alla övningar i en textfil. En sådan fil är perfekt att ha som minne och bra att använda när du framöver vill gå tillbaka och se hur du löste en viss uppgift eller problemställning. Ett eget litet facit för framtida SQL-konstruktioner.

Använd SQL-kommentarer (2 minustecken följt av ett mellanslag eller ny rad) för att skriva vilken övning det gäller.

```sql
--
-- Övning 01: Skapa en databas
-- Av: mosstud, Mikael Roos
--
-- Detta är en kommentar i SQL
--
```

De första övningarna är enkla för att sedan bli svårare och svårare. Ju längre du kommer desto bättre kompis måste du bli med referensmanualen.



2. Skapa en ny databas, Skolan {#create-db}
---------------------------------------------------------------------

[INFO]PS. Om du kör på BTH's server så har du [inte rättigheter att skapa en ny databas](kunskap/bth-s-labbmiljo-for-databasen-mysql#dbserver), då får du hoppa över detta stycket.[/INFO]

Glöm nu inte att spara alla SQL-kommandon du skriver i en text-fil.

Skapa en ny databas, kalla den Skolan, se exempel nedan.
 
```sql
-- Skapa databas
CREATE DATABASE Skolan;

-- Välj vilken databas du vill använda
USE Skolan;
```

För att ta bort och radera en hel databas med hela dess innehåll använder du kommandot, `DROP`.

```sql
-- Radera en databas
DROP DATABASE Skolan;
```

Testa att radera din nyskapade databas och skapa sedan om den. Om allt gick bra så kan det se ut så här hos dig:

[FIGURE src=/image/snapshot/sql-ovning-create.jpg?w=w2&q=70 caption="Databasen Skolan skapad."]


Det som är bra med att spara all sin SQL kod är att det är enkelt att skapa om hela databasen från början om det blir något fel.



3. Skapa tabellen Lärare {#create-table}
---------------------------------------------------------------------


En skola har lärare, skapa en tabell för lärare enligt följande:

**Lärare**

| Namn            | Datatyp  |
|-----------------|----------|
| akronymLarare   | CHAR(3)  |
| avdelningLarare | CHAR(3)  |
| namnLarare      | CHAR(20) |
| lonLarare       | INT      |
| foddLarare      | DATETIME |

Varför lägger jag till tabellens namn efter varje kolumn-namn? Bra fråga, en gång i tiden ansåg jag att det fanns en fördel i att kolumnnamnet var unikt i hela databasen. Det blir det om man lägger till tabellens namn efter. Nackdelen är att namnen blir längre. Det är helt enkelt en kodstandard jag valt att följa, i alla fall i denna övningen. Jag tycker den är bra, men tycker du den verkar jobbig så kan du skippa tabellnamnet efter kolumnnamnet -- välj själv.


Här är SQL-kod som går att använda för att skapa tabellen. Akronym är unik och vi använder den som primärnyckel.

```sql
--
-- Skapa tabell Lärare
--
CREATE TABLE Larare
(
  akronymLarare CHAR(3) PRIMARY KEY,
  avdelningLarare CHAR(3),
  namnLarare CHAR(20),
  lonLarare INT,
  foddLarare DATETIME
);
```

Radera tabellen med `DROP` och skapa om den igen.

Välj allt innehåll i tabellen med `SELECT * FROM Larare`.

När du är klar kan det se ut så som i nedanstående bild.

[FIGURE src=/image/snapshot/sql-ovning-create-table.jpg?w=w2&q=70 caption="En tabell för lärare är skapad."]


Slå upp syntaxen för `CREATE TABLE` i refmanualen, skumma igenom den för att se alla varianter som finns för att skapa en tabell. Gör samma sak för `DROP TABLE`. Använd sökfunktionen för att hitta det du letar efter, bekanta dig också med innehållsförteckningen, det kommer att spara dig mycket tid framöver om du hittar snabbt i manualen.

*Kom ihåg vem som är din bästa vän -- refmanualen alltså...*



4. Lägg in 10 Lärare {#insert}
---------------------------------------------------------------------

Skapa 10 olika lärare och lägg in dem i tabellen med `INSERT`. Använd `SELECT * FROM Larare` för att se  och kontrollera vad tabellen innehåller.

```sql
--
-- Lägg till rader i tabellen Lärare
--
INSERT INTO Larare VALUES ('MOS', 'APS', 'Mikael',   15000, '1968-03-07');
INSERT INTO Larare VALUES ('MOL', 'AIS', 'Mats-Ola', 15000, '1978-12-07');
INSERT INTO Larare VALUES ('BBE', 'APS', 'Betty',    15000, '1968-07-07');
INSERT INTO Larare VALUES ('AJA', 'APS', 'Andreas',  15000, '1988-08-07');
INSERT INTO Larare VALUES ('CJH', 'APS', 'Conny',    15000, '1943-01-07');
INSERT INTO Larare VALUES ('CSA', 'APS', 'Charlie',  15000, '1969-04-07');
INSERT INTO Larare VALUES ('BHR', 'AIS', 'Birgitta', 15000, '1964-02-07');
INSERT INTO Larare VALUES ('MAP', 'APS', 'Marie',    15000, '1972-06-07');
INSERT INTO Larare VALUES ('LRA', 'APS', 'Linda',    15000, '1975-03-07');
INSERT INTO Larare VALUES ('ACA', 'APS', 'Anders',   15000, '1967-09-07');
```

Se till att du har kod för att återskapa samtliga lärare.

Du skall nu ha en tabell med 10 lärare, du kan välja vilka namn och data du vill, men se till att du har med MOS, MOL och BBE. Så här ser det ut för mig.


[FIGURE src=/image/snapshot/sql-ovning-insert.jpg?w=w2&q=70 caption="En tabell med för lärare, nu med 10 stycken lärare."]


Not. 
Ta för vana att ange hela kolumnlistan när du använder INSERT. Ovanstående INSERT-exempel borde i så fall se ut enligt:

```sql
--
-- Lägg till rader i tabellen Lärare
--
INSERT INTO Larare(akronymLarare, avdelningLarare, namnLarare, lonLarare, foddLarare) VALUES ('MOS', 'APS', 'Mikael', 15000, '1968-03-07');
```

På detta sättet kan du ange vilka kolumner du vill göra `INSERT` i. Resterande kolumner får sitt default-värde eller `NULL`. Du behöver ange kolumnlistan senare i övningen när vi använder automatgenererade nycklar. 



5. Radera rader med `DELETE` {#delete}
---------------------------------------------------------------------

Vi använder `DELETE` för att radera rader från en tabell. Slå upp hur `DELETE` fungerar i refmanualen.

```sql
--
-- Radera rader från en tabell
--
DELETE FROM Larare WHERE namnLarare = 'Mikael';
```

Skriv SQL-kod för att utföra följande:

1. Radera Mikael.
1. Radera alla som jobbar på avdelningen AIS.
1. Radera samtliga i tabellen, men begränsa antalet rader som får raderas till 2 (`LIMIT`).
1. Radera samtliga återstående lärare.

Det sista kommandot bör ha raderat 5 lärare (5 rader i tabellen).

[INFO]
**Felmeddelande om safe update mode**

Får du felmeddelandet om safe update mode när du försöker radera Mikael?

> <i>Error Code: 1175. You are using safe update mode and you tried to update a table without a WHERE that uses a KEY column To disable safe mode, toggle the option in Preferences -> SQL Queries and reconnect.</i>

Gör som det står i felmeddelandet, gå in och klicka bort "Safe updates" under "SQL Editor" i Preferences. Reconnecta därefter "Query"->"Reconnect to server". Sedan skall det gå.
[/INFO]

När du raderar rader så kan det vara bra att lägga till en `LIMIT` klausul som säger hur många rader du raderar. Annars finns risken att en liten felskrivning i satsen gör att du raderar hela innehållet i tabellen. Ta för vana att alltid använda `LIMIT`.

[FIGURE src=/image/snapshot/sql-ovning-delete.jpg?w=w2&q=70 caption="Ett antal sätt att radera lärare."]


Återskapa alla lärare igen. Du skall nu ha en tabell med 10 lärare.



6. Ändra i befintlig tabell med `ALTER TABLE` {#alter-table}
---------------------------------------------------------------------

*Oops*, vi glömde ett fält i tabellen Lärare. Vi vill nämligen lagra lärarens kompetens som en siffra mellan 0-10.

Ofta vill man kunna ändra befintlig tabellstruktur och ta bort, modifiera eller lägga till nya kolumner i en tabell. Detta görs med kommandot `ALTER TABLE`.

```sql
-- Ändra befintlig tabell
ALTER TABLE Larare ADD COLUMN kompetensLarare INT;
```

Gör nu följande steg på egen hand, läs refmanualen vid behov.

1. Lägg till kolumnen kompetensLarare (integer) i tabellen Larare med hjälp av kommandot `ALTER TABLE`.
2. Ta bort samma kolumn med kommandot `ALTER TABLE DROP COLUMN`.
3. Lägg till samma kolumn igen, modifiera så att kolumnen defineras med default-värdet 5 (`DEFAULT`) och att den inte kan innehålla `NULL`-värden (`NOT NULL`).

Ledtråd till 3:an är att titta i refman för `ALTER TABLE` och för `CREATE TABLE`. Ge det 5 minuter att leta på egen hand. När du lyckats (eller behöver en livlina) så kan du studera nedanstående bilder.

[FIGURE src=/image/snapshot/sql-ovning-refmanual-alter-table.jpg?w=w2&q=70 caption="Ett exempel på hur refmanualen beskriver syntax för ett SQL-kommando."]

[FIGURE src=/image/snapshot/sql-ovning-refmanual-create-table.jpg?w=w2&q=70 caption="Kolumndefinitionen säger vad som kan specificeras när man skapar en kolumn."]

Ovan bilder visar stycket i refmanualen som visar hur `NOT NULL` och `DEFAULT` kan användas. Exempel finns längre ned i texten.

[FIGURE src=/image/snapshot/sql-ovning-alter-table.jpg?w=w2&q=70 caption="`ALTER TABLE` gör att du kan uppdatera strukturen i en befintlig tabell genom att ta bort eller lägga till kolumner."]

Som du ser i bilden så fick samtliga lärare default-värdet 5 i kolumnen kompetensLarare.



7. Ändra värden med `UPDATE` {#update}
---------------------------------------------------------------------

**Ett exempel på `UPDATE`.**

```sql
--
-- Uppdatera ett värde
--
UPDATE Larare SET namnLarare = 'Charles' WHERE akronymLarare = 'CSA';
```

Det har skett en lönerevision för lärarna, använd `UPDATE` för att genomföra följande ändringar:

1. Mikaels kompetens är nu 7 och lönen har ökat till 21 000.
2. Mats-Olas lön har ökat med 6 000.
3. Bettys kompetens är nu 9 och hennes lön är 21 000.
4. Andreas lön har minskat med 1 200.
5. Alla lärare fick dessutom en extra lönebonus på 10%.


Så här blev det för mig. Försök själv innan du kikar på bilden.

[FIGURE src=/image/snapshot/sql-ovning-update-lon.jpg?w=w2&q=70 caption="Lönerevidering och förändring av kompetenser har justerats lite i tabellen."]

Se till att du har samma värden på lönerna som jag har, det underlättar i kommande övningar om du får samma svar som jag fått.



8. Välj ut och presentera innehållet i tabellen {#valj}
---------------------------------------------------------------------

Följande frågor förutsätter att du har samma datamängd som jag har (lärare, avdelningar, etc). Om du inte har det så får du modifiera frågorna nedan så att de ger förväntat resultat.



###8.1 `WHERE` {#select-where}

Gör följande SELECT-frågor:

1. Visa alla rader i tabellen där avdelningLarare = 'AIS'.
2. Visa de rader som har en akronym som börjar med bokstaven 'M' (ledtråd `LIKE`).
3. Visa de rader vars lärares namn innehåller bokstaven 'o'.
4. Visa de rader där lärarna tjänar 20 000 eller mer.
5. Visa de rader där lärarens kompetens är större än 5 och lönen är 20 000 eller större.
6. Visa rader som innehåller lärarna MOS, MOL, BBE (ledtråd `IN`).

Har du gjort frågorna *och* känner dig bekväm kan du gå vidare, annars försöker du skapa några egna frågor tills du känner att du har kontroll och kan välja ut de raderna du vill ur tabellen.

För min egen del får jag följande svar på ovan frågor, du kan använda det som facit:

1. MOL, BHR
2. MOS, MOL, MAP
3. MOL, CHJ
4. MOS, MOL, BBE
5. MOS, BBE
6. MOS, MOL, BBE


###8.2 `ORDER BY` {#select-orderby}

Gör följande SELECT-frågor:

1. Skriv endast ut namnen på alla lärare och vad de tjänar.
2. Sortera listan på namnet, både i stigande och sjunkande ordning.
3. Sortera listan på lönen, både i stigande och sjunkande ordning. Vem tjänar mest och vem tjänar minst?
4. Välj ut de tre som tjänar mest och visa dem (ledtråd `LIMIT`).

Som du ser så är det tre som tjänar lika mycket och en som tjänar minst. `LIMIT` är bra att använda om man endast vill ha ett visst antal rader i svaret.



###8.3 ALIAS (`AS`) {#as}

Alias är bra att använda när man jobbar med många tabeller och behöver ändra namn på kolumnerna i SELECT-satsen, eller när man vill ge en kolumn ett alternativt namn, eller när man vill korta ned ett långt kolumnnamn så att SELECT-satsen blir enklare att skriva. 

Studera nedanstående exempel och testkör dem.

```sql
--
-- Byt namn på kolumn
--
SELECT
 namnLarare AS 'Lärare',
 lonLarare AS 'Lön'
FROM Larare;
```

Lägg till kolumnen avdelningLarare i rapporten och kalla den "Avdelning".

[FIGURE src=/image/snapshot/sql-ovning-as.jpg?w=w2&q=70 caption="Namnbyte för snyggare kolumnnamn."]

Alias kan även användas för att byta namn på tabellerna. Det är bra när man har långa tabellnamn och när man gör en SELECT-sats från flera tabeller.
 


9. Använd GROUP BY och beräknande funktioner {#groupby}
---------------------------------------------------------------------



###9.1 `MIN()` och `MAX()` {#minmax}

Använd `MIN()` och `MAX()`.

1. Hur mycket är den högsta lönen som en lärare har?
2. Hur mycket är den lägsta lönen som en lärare har?



###9.2 `GROUP BY` och inbyggda aggregerande funktioner {#aggr}

Använd de inbyggda aggregerande funktionerna `SUM()`, `COUNT()`, och `AVG()` tillsammans med `GROUP BY`, för att räkna ut  följande:

1. Hur många lärare jobbar på de olika avdelningarna?
2. Hur mycket betalar respektive avdelning ut i lön varje månad?
3. Hur mycket är medellönen för de olika avdelningarna?

Aggregerande betyder att de räknar samman värden baserat på många rader i tabellen. Dubbelkolla alltid mot din värdemängd, innehållet i tabellerna, om dina svar känns rimliga.

Så här blev det för mig, tjuvkika inte innan du har försökt själv.

[FIGURE src=/image/snapshot/sql-ovning-groupby.jpg?w=w2&q=70 caption="Aggregerande funktioner räknar snabbt ut summa och medelvärde."]



###9.3 `HAVING` {#having}

Vill man bara visa de avdelningar som har högre medellön än 15 000 kan man använda `HAVING`. Det fungerar ungefär som `WHERE`, fast det går att använda med aggregerande funktioner och de kolumner som används i `GROUP BY` raden.

Testa följande exempel för att se hur `HAVING` fungerar.

**Visa endast de avdelningar vars medellön är över 18 000.**

```sql
--
-- SQL för att visa de avdelningar där snittlönen är över 18 000
--
SELECT avdelningLarare, AVG(lonLarare) AS Medellon
FROM Larare
GROUP BY avdelningLarare
HAVING Medellon > 18000
```

**Visa de vanligaste lönerna, men ignorera de löner som endast en lärare har.**

```sql
--
-- SQL för att visa de vanligaste lönerna.
--
SELECT lonLarare, COUNT(lonLarare) AS Antal
FROM Larare
GROUP BY lonLarare
HAVING Antal > 1
```

Du klarar en hel del med `WHERE`, men ibland måste du ta hjälp av `HAVING`, kom i håg det.



10. Inbyggda funktioner {#infunktioner}
---------------------------------------------------------------------

Det finns ett stort antal inbyggda funktioner för att underlätta databearbetning, det är bra att bekanta sig med dem.

[FIGURE src=/image/snapshot/sql-ovning-refmanual-functions.jpg?w=w2&q=70 caption="Databasen har ett stort antal inbyggda funktioner."]

Låt oss pröva några av dem.



###10.1 Strängar {#strangar}

Leta reda på stycket som hanterar [strängfunktioner](http://dev.mysql.com/doc/refman/5.6/en/string-functions.html). 

1. Skriv en SELECT-sats som skriver ut Avdelning / Lärare i samma kolumn. Tex APS/MOS. (Tips: Att slå ihop strängar kallas att konkatenera/concatenate).
2. Gör om det som skrivs ut så att det enbart skrivs ut med små bokstäver.



###10.2 Datum och tid {#datum}

Välj stycket med för [datum och tid](http://dev.mysql.com/doc/refman/5.6/en/date-and-time-functions.html). Vilken funktion kan visa dig dagens datum?

1. Skriv en SELECT-sats som endast visar dagens datum.
2. Gör en SELECT-sats som visar samtliga lärare, deras födelseår samt dagens datum och klockslag.

Så här blev det för mig, tjuvkika om det blir för svårt.

[FIGURE src=/image/snapshot/sql-ovning-functioner.jpg?w=w2&q=70 caption="Smidigt att använda inbyggda funktioner i SQL."]



###10.3 Beräkna ålder {#alder}

Vi vill nu beräkna och visa lärarnas ålder, kan du hitta en inbyggd funktion som hjälper oss med det?

1. Skriv en SELECT-sats som beräknar lärarens ålder, sortera rapporten för att visa vem som är äldst och yngst. 

Om din ålder inte blir exakt korrekt så gör det inget, detta är bara en övning i att använda inbyggda funktioner.

Behöver du hjälp kan du se hur man [beräknar ålder i MySQL och i MS SQL Server](coachen/berakna-alder-i-mysql-och-sql-server).





11. Vyer förenklar {#vyer}
---------------------------------------------------------------------

Vyer är smidiga när SELECT-satserna blir lite väl stora. 



###11.1 Vy med Namn  och Ålder {#vy-alder}

Du kan nu jobba mot din vy på samma sätt som mot en tabell.

1. Ta fram din senaste SELECT-sats med lärarens namn och ålder. Skapa en vy "VLarare" (ledtråd `CREATE VIEW`) baserat på den SELECT-satsen.
2. Gör en SELECT-sats som visar innehållet i vyn.
3. Beräkna medelåldern för samtliga lärare.

Radera vyn med `DROP VIEW`, vill du ändra en befintlig vy kan du använda `ALTER VIEW`.



###11.2 Vy med Larare.* och Ålder {#vy-larare}

1. Skapa en ny vy "VLarare2" som innehåller samtliga kolumner från tabellen Lärare inklusive en ny kolumn med lärarens ålder.

2. Gör en SELECT-sats som beräknar medelåldern på respektive avdelning (ledtråd GROUP BY avdelningLarare). Visa avdelningens namn och medelålder.

3. Uppdatera SELECT-satsen och visa även medellönen per avdelning.

4. Avrunda siffrorna till heltal (ledtråd [numeriska funktioner](http://dev.mysql.com/doc/refman/5.6/en/numeric-functions.html)).



###11.3 Vy baserad på vy {#vy-vy}

Du har nu en SELECT-sats som visar avdelningarnas namn, medellön och medelålder.

1. Skapa en ny vy "VAvdelningsRapport" av denna SELECT-sats. Det blir så att säga en vy som innehåller en vy. Funkar jättebra och är smidigt.
2. Gör `SELECT *` från din sista vy. Det bör se ut som i bilden nedan.

[FIGURE src=/image/snapshot/sql-ovning-vyer.jpg?w=w2&q=70 caption="Resultatet från en vy som visar medellön och medelålder per avdelning."]

Vyer är kraftfullt och gör databasen mer lättanvänd.



12. Att koppla ihop resultat från flera tabeller, `JOIN` {#join}
---------------------------------------------------------------------



###12.1 Skapa fler tabeller {#mer-tabeller}

En skola har kurser som ges vid olika kurstillfällen. På varje kurstillfälle finns det en lärare som är kursansvarig.

Låt oss skapa tabellerna för Kurs och Kurstillfalle.

**Tabell Kurs.**

| Kolumn    | Datatyp                      |
|-----------|------------------------------|
| kodKurs   | CHAR(6) PRIMARY KEY NOT NULL |
| namnKurs  | CHAR(40)                     |
| poangKurs | FLOAT                        |


**Tabell Kurstillfalle.**

| Kolumn                      | Datatyp                                 |
|-----------------------------|-----------------------------------------|
| idKurstillfalle             | INT AUTO_INCREMENT PRIMARY KEY NOT NULL |
| Kurstillfalle_kodKurs       | CHAR(6) NOT NULL                        |
| Kurstillfalle_akronymLarare | CHAR(3) NOT NULL                        |
| lasperiodKurstillfalle      | INT NOT NULL                            |

Skapa ovanstående tabeller med SQL. Leta i refmanualen om något är oklart, till exempel så vill du kanske slå upp `AUTO_INCREMENT`.


###12.2 Ett ER-diagram över tabellerna {#modell}

När man modellerar en databas brukar man använda någon typ av "entity-relationship" diagram (ER-diagram). Skissar man på ett sådant kan det se ut så här för de tre tabellerna.

[FIGURE src=/image/snapshot/sql-er-diagram-tre-tabeller.jpg caption="Ett ER-diagram ritat i MySQL WorkBench."]

En bild kan ofta hjälpa till att visa upp relationerna i en databas, hur tabellerna hänger ihop.

Bilden säger:

> *"En kurs kan ha flera kurstillfällen. Ett kurstillfälle har en ansvarig lärare."*

Att modellera och rita ER-diagram är en egen historia i sig. Vi nöjer oss med att konstatera att det finns denna typen av diagram. 



###12.3 Främmande nycklar {#frammande}

Det är bra att ange främmande nycklar i tabellerna. Det förtydligar att det finns en *constraint*, en begränsning eller integritet, i din databas.

Den SQL-kod som behövs kan se ut ungefär så här:

```sql
--
-- Skapa tabell med constraint foreign key
--
CREATE TABLE Kurstillfalle
(
  ..
  FOREIGN KEY (Kurstillfalle_kodKurs) REFERENCES Kurs(kodKurs),
);
```

Skapa tabellen inklusive skapa constraints för främmande nycklar.



###12.4 Storage engines {#engine}

I MySQL finns det olika lagringssätt för tabeller, så kallade "storage engines". Det säger hur tabellerna lagras och styr vilka algoritmer som gäller för sökning i tabellerna. De vanligaste är MyISAM och InnoDB.

MyISAM tar inte hänsyn till den integritetskoll som 'FOREIGN KEY' antyder. Det gör dock InnoDB.

Man anger vilket lagringssätt som skall användas när man skapar tabellen, om man inte anger det så används det som är standard för databasen eller för installationen av databasmotorn. Vilken lagringsmotor som är standard kan skilja mellan installation så det är alltid bäst att ange den för att vara säker. Läs kort om [MySQL och Storage Engines](http://dev.mysql.com/doc/refman/5.6/en/storage-engines.html).

```sql
--
-- Ange vilket sätt som tabellerna skall lagras på
--
CREATE TABLE t1 (i INT) ENGINE = MYISAM;
CREATE TABLE t2 (i INT) ENGINE = INNODB;
```



###12.5 Teckenkodning {#teckenkod}

En installation av databasen MySQL har en förvald teckenkodning på systemnivå, databasnivå, tabell och kolumnnivå. Den förvalda teckenkodningen kan skilja sig mellan olika miljöer. Det är därför att rekommendera att man skapar sina tabeller och explicit anger vilken teckenkodning som skall användas.

Detta kan göras på tabellnivå för alla kolumner i en tabell.

```sql
--
-- Ange teckenkodning för en tabell
--
CREATE TABLE t1 (i INT) CHARACTER SET utf8;
CREATE TABLE t2 (i INT) ENGINE = INNODB CHARACTER SET utf8;
```

Ovan skapas två tabeller med teckenkodning enligt UTF-8 och den sista tabellen får även lagringsmotorn INNODB.

Teckenkodningen påverkar inte enbart lagringen av information, *även kommunikationen mellan klient och server* är påverkade av teckenkodningen. För att hantera kommunikationen enligt UTF-8 så måste klienten och servern informeras om detta.

```sql
--
-- Bestäm teckenkodning till UTF-8 på kommunikation mellan klient och server
--
SET NAMES 'utf8';
```

Ofta glöms ovan bort och då fungerar teckenkodningen inte alltid som tänkt.

Titta kort i [manualen om teckenkodning](http://dev.mysql.com/doc/refman/5.6/en/charset.html).



###12.6 Lägg till rader i de nya tabellerna {#mer-insert}

När du skapat tabellen så stoppa in följande rader i tabellerna med `INSERT`.

**Rader till tabellen Kurs.**

| kodKurs | namnKurs                   | poangKurs |
|---------|----------------------------|------------|
| DV1106  | Databasteknik och Webbapps | 7.5        |
| DV1219  | Databasteknik              | 7,5        |
| PA1106  | Individuellt Projekt       | 7,5        |

**Rader till tabellen Kurstillfällen**

| Kurstillfalle_kodKurs | Kurstillfalle_akronymLarare | lasperiodKurstillfalle |
|-----------------------|-----------------------------|------------------------|
| DV1106                | MOS                         | 1                      |
| DV1106                | MOS                         | 4                      |
| DV1219                | CJH                         | 2                      |
| DV1219                | MOS                         | 3                      |
| PA1106                | MOL                         | 1                      |
| PA1106                | BBE                         | 2                      |

Kontrollera att allt ser ok ut med `SELECT *`.



###12.7 Joina 2 tabeller {#join2}

Du vill nu se alla kurstillfällen tillsammans med kursens namn. För att lyckas med det så måste du joina informationen från tabellerna Kurs och Kurstillfälle.

Gör en SELECT från både Kurs och Kurstillfalle tabellen. Pröva med följande kommando. Vad blir resultatet?

```sql
--
-- En crossjoin
--
SELECT * FROM Kurs, Kurstillfalle; 
```

Du får väldigt många rader. Lika många rader som du har rader i Kurs (3 stycken) multiplicerat med antalet rader i Kurstillfälle (6 stycken). Totalt blir det 18 rader, kopplade på ett ej logiskt sätt.

Vad är det som länkar ihop dessa två tabeller? Kurskoden. Prova med att lägga till en WHERE-sats för att göra länkningen. Så här:

```sql
--
-- Joina två tabeller, använd alias för att korta ned SQL-satsen
--
SELECT *
FROM Kurs AS K, Kurstillfalle AS Kt
WHERE K.kodKurs = Kt.Kurstillfalle_kodKurs;
```

Testa den. Ser det rimligt ut? Du borde se lika många rader som du har Kurstillfällen.

Gör en vy av föregående SELECT-sats. Vyn skall visa samtliga kurstillfällen inklusive alla detaljer om kursen.

[FIGURE src=/image/snapshot/sql-ovning-join-tva-tabeller.jpg?w=w2&q=70 caption="6 rader visas när Kurs och Kurstillfälle är joinade på rätt sätt."]



###12.8 Joina 3 eller fler tabeller {#join3}

Nu vill du se all information om den kursansvarige i en och samma rapport. Det innebär att du måste länka samma information från samtliga 3 tabeller.

Utöka den SELECT-satsen som du gjorde nyss med att även joina Lärar-tabellen (eller ännu bättre med Lärar-vyn som även innehåller kolumnen ålder).

Skapa en vy av den slutliga SELECT-satsen när du är klar.

Använd vyn och gör en SELECT-sats som visar alla kurstillfällen. Följande information skall visas för varje kurstillfälle: kurskod, kursnamn, läsperiod och kursansvariges namn.

Så här kan resultatet se ut från en sådan vy.

[FIGURE src=/image/snapshot/sql-ovning-join-3.jpg?w=w2&q=70 caption="6 rader med kurstillfällen där information om både kurs och kursansvarig visas."]

Jag valde att joina vyerna, det är lite busigt så, det fungerar men problemet när man lägger lager på lager är att man tappar kontroller och SELECT-frågorna kanske inte blir i optimalaste laget. 

Detta sätt att joina tabeller, att ange flera tabeller och koppla ihop dem med `WHERE` är enkelt och du kan använda det i denna kursen om du vill. Ett mer korrekt sätt att joina visas i följande stycke.



###12.9 INNER JOIN {#inner-join}

Låt oss studera ett exempel på ett "mer korrekt sätt" att joina tabeller. Studera följande SELECT-sats och se hur tabellerna länkas samman med nyckelorden `INNER JOIN ... ON`. `AS` används för att korta ned satsen och gör den mer lättläst, så är tanken i alla fall.

Provkör nedanstående SELECT-sats som skall visa en översikt av kurstillfällen med respektive kursansvarig.

```sql
--
-- Inner join av samtliga tabeller.
--
SELECT
  K.kodKurs AS Kurskod,
  K.namnKurs AS Kursnamn,
  Kt.lasperiodKurstillfalle AS Läsperiod,
  CONCAT(L.namnLarare, ' (', L.akronymLarare, ')') AS Kursansvarig
FROM Kurstillfalle AS Kt
  INNER JOIN Kurs AS K
    ON Kt.Kurstillfalle_kodKurs = K.kodKurs
  INNER JOIN Larare AS L
    ON Kt.Kurstillfalle_akronymLarare = L.akronymLarare
 ORDER BY K.kodKurs;
```

Så här ser det ut hos mig. Lek gärna och ändra den så att du har koll på hur den fungerar.

[FIGURE src=/image/snapshot/sql-ovning-korrekt-join.jpg?w=w2&q=70 caption="En korrekt INNER JOIN av tre tabeller."]

När man jobbar med många tabeller så blir SQL-satserna ofta långa. Därför kan det vara bra att anamma en struktur att skriva dem på, ungefär som i bilden ovan, använd tab för att strukturera koden.



13. Jobba med Joinade tabeller {#join-mer}
---------------------------------------------------------------------

Använd nu den sista vyn som innehöll "all" information. Svara på följande frågor:

1. Vad är medelåldern på kursansvariga på kursen PA1106?
2. Vad är medellönen för de kursansvariga på kurser som ligger inom ämnet Programvaruteknik (kurskoder som startar med 'PA')?



14. En fråga i en fråga, subquery {#subquery}
---------------------------------------------------------------------

Ibland blir frågorna lite kluriga och det finns olika sätt att lösa dem, helt eller delvis. Fundera ett tag på hur du kan lösa följande fråga.

1. Vilken/vilka lärare har flest uppdrag som kursansvarig?

Har du något förslag?

Detta är en fråga som med fördel kan delas in i flera delar, flera del-frågor.

1. Hur många kurstillfällen har varje lärare?
2. Vad är MAX i ovan lista?
2. Visa de lärare som har MAX tillfällen som kursansvarig.

Eller, om man gör det på SQL-vis.

```sql
--
-- Hur många kurstillfällen har lärarna?
--
CREATE VIEW VVAntalKATillfallen
AS
SELECT akronymLarare, COUNT(akronymLarare) AS Antal 
FROM VKursinfo
GROUP BY akronymLarare;

SELECT * FROM VVAntalKATillfallen;
SELECT MAX(Antal) FROM VVAntalKATillfallen;

-- SVAR = 3

SELECT * 
FROM VVAntalKATillfallen
WHERE Antal = 3;
```

Först tar jag reda på hur många tillfällen som är max, eller ja, innan det så förbereder jag min datamängd för att räkna ut hur många tillfällen som varje lärare har. När man löser en uppgift handlar det ofta om att förbereda datamängden så att det blir enkelt att ställa frågor mot den. Det är lika viktigt att ha en bra datamängd, och en förmåga att justera den så att den passar, som det är att ha förmågan att skriva bra SELECT-satser.

Nåväl, kan jag göra detta i en SELECT-sats, istället för att dela upp det i två? Ja, det kan man, här kommer "suq-query" till din hjälp. Studera följande så ser du skillnaden.

**Svaret via två frågor.**

```sql
--
-- Två frågor
--
SELECT MAX(Antal) FROM VVAntalKATillfallen;

-- SVAR = 3

SELECT * 
FROM VVAntalKATillfallen
WHERE Antal = 3;
```

**Svaret via en fråga med en subquery.**

```sql
--
-- En fråga med en subquery
--
SELECT * 
FROM VVAntalKATillfallen
WHERE Antal = (SELECT MAX(Antal) FROM VVAntalKATillfallen);
```

En subquery kan vara de du behöver för att lösa lite klurigare frågor.

**UPPGIFT**

1. Ändra frågan så att den visar de som har minsta antal tillfällen som kursansvarig.



15. Visa rader som inte matchar med OUTER JOIN {#outerjooin}
---------------------------------------------------------------------

`INNER JOIN` visar alla rader som kan länkas samman. Men vad händer om det finns en kurs som inte har ett kurstillfälle? Låt oss göra ett test för att se vad OUTER JOIN gör. Kör först följande SQL-kod för att skapa en ny kurs som inte har något kurstillfälle.

```sql
--
-- Skapa kurs utan kurstillfälle och gör inner join mot tabell för kurstillfällen.
--
INSERT INTO Kurs VALUES ('DV1207', 'Db och Webb2', 7.5);
SELECT * FROM Kurs;

SELECT
  K.kodKurs AS Kurskod,
  K.namnKurs AS Kursnamn,
  Kt.lasperiodKurstillfalle AS Läsperiod
FROM Kurstillfalle AS Kt
  INNER JOIN Kurs AS K
    ON Kt.Kurstillfalle_kodKurs = K.kodKurs
ORDER BY K.kodKurs;
```

Syntes den nya kursen i resultatet där du joinade Kurs och Kurstillfalle? Nej, det gjorde den inte. Det finns inget kurstillfalle att koppla den med och därför utelämnas den ur resultatet från din `INNER JOIN`.

[INFO]
En `INNER JOIN` visar de rader som kan matchas mellan tabellerna. Finns det ingen matchning så visas inte raden.
[/INFO]

Byt nu ut `INNER JOIN` till `RIGHT OUTER JOIN` i SQL-satsen och kör den igen. Nu kom den med va?

Däremot är läsperioden `NULL`, men det stämmer, det fanns ju ingen rad i tabellen Kurstillfalle att länka till, då blir det `NULL`.

[INFO]
`OUTER JOIN` visar resultat för alla rader, även om det inte finns någon rad att matcha mellan tabellerna.
[/INFO]

`RIGHT OUTER JOIN` utgår från den **högra tabellen** i uttrycket (Kurs i detta fallet). Uttrycket kan utläsas enligt följande:

> "För alla rader i den högra tabellen (Kurs), visa alla rader i den joinade tabellen (Kurstillfalle). Visa NULL-värde om koppling saknas i Kurstillfalle."

`LEFT OUTER JOIN` gör samma sak men vänder ordningen på tabellerna. Ändrar vi exemplet ovan till `LEFT` istället för `RIGHT` så blir resultatet:

> "För alla rader i den **vänstra tabellen** (Kurstillfalle), visa alla rader i den joinade tabellen (Kurs). Visa NULL-värde om koppling saknas i Kurs."

Man väljer alltså `RIGHT` eller `LEFT` beroende på hur du ställt upp din fråga, beroende på vilken tabell som finns till vänster respektive höger.

Det kan ta lite tid att lära sig `LEFT/RIGHT OUTER JOIN`. Låt det smälta in och återkom till texten vid ett senare tillfälle när du behöver repetition.



Avslutningsvis {#avslut}
---------------------------------------------------------------------

Bra jobbat.

Se till att spara undan din SQL-fil. Den är bra att titta tillbaka i när du framöver ska lösa SQL-relaterade problem och kanske vill din lärare se hur du löste uppgifterna.

Om du vill dokumentera din övning på ett grafiskt sätt så kan du göra det med WorkBench och "Reverse Engineering". Läs gärna om hur du kan [skapa en grafisk modell av en befintlig databas](coachen/reverse-engineering-av-databasen-mysql-med-workbench) och testa det på din databas som du precis gjort.

Är du intresserad av att läsa om databasmodellering så finns det en [Kokbok för databasmodellering](kunskap/kokbok-for-databasmodellering) som är en bra startpunkt.

Det finns en egen forumtråd till denna artikel, sär kan du [ställa frågor eller ge tips](t/6267) om artikeln.
