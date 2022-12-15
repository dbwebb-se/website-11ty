---
author: mos
revision:
    "2022-01-04": "(C, mos) Genomgången inför v2 och MariaDB."
    "2019-01-28": "(B, mos) Uppdaterad och flyttade reset till nästa artikel."
    "2018-01-02": "(A, mos) Första versionen, uppdelad av större dokument."
...
Skapa fler tabeller
==================================

Låt oss bygga vidare på vår databas. Följande är önskemålen för vår databas.

> En skola har kurser som ges vid olika kurstillfällen. På varje kurstillfälle finns det en lärare som är kursansvarig.

Låt oss skapa tabellerna för kurs och kurstillfalle.

Spara den SQL-kod du skriver i filen `ddl.sql`.



Tabell för kurs {#kurs}
----------------------------------

Börja med att skapa tabellen för kurs.

> En kurs har en kod som är unik för varje kurs. Kursen har ett namn och poäng som visar hur lång/stor kursen är. Kurser delas in i en nivå som motsvarar dess svårighetsgrad.

| Kolumn    | Datatyp                      |
|-----------|------------------------------|
| kod       | CHAR(6) PRIMARY KEY NOT NULL |
| namn      | VARCHAR(40)                  |
| poang     | FLOAT                        |
| niva      | CHAR(3)                      |

Skriv SQL-koden för att skapa tabellen.



Tabell för kurstillfalle {#kurstillfalle}
----------------------------------

Skapa nu tabellen kurstillfalle.

> Varje kurs ges vid ett kurstillfälle. Ett kurstillfälle har en kursansvarig lärare och kursen ges i en viss läsperiod.

| Kolumn                      | Datatyp                                 |
|-----------------------------|-----------------------------------------|
| id                          | INT AUTO_INCREMENT PRIMARY KEY NOT NULL |
| kurskod                     | CHAR(6) NOT NULL                        |
| kursansvarig                | CHAR(3) NOT NULL                        |
| lasperiod                   | INT NOT NULL                            |

Skriv SQL-koden för att skapa tabellen.

Kör ditt skript och skapa ovanstående tabeller. Lägg till eventuella DROP och IF EXISTS där det behövs.

Leta i refmanualen om något är oklart, till exempel så vill du kanske slå upp `AUTO_INCREMENT` som ger en automatgenererad nyckel.



Primärnyckel {#primar}
----------------------------------

En primärnyckel är den kolumn, eller en kombination av två eller fler kolumner, som gör varje rad unik.

Man börjar med att använda de kolumner som finns i tabellen, ibland räcker de inte och man kan då skapa en surrogatnyckel som man använder till primärnyckel.

I tabellen kurstillfalle finns kolumnen "id", det är en kolumn som egentligen inte behövs enligt beskrivningen som finns för tabellen, men den är bra att ha och kan förenkla hanteringen och låter oss få en enkel primärnyckel till tabellen.



Främmande nycklar {#frammande}
----------------------------------

En främmande nyckel är ett sätt att länka samman tabellerna. I vårt fall är kursansvarig en främmande nyckel i tabellen kurstillfälle som därmed kan länka ett kurstillfälle till detaljerna om den kursansvarige läraren. Det är ju bra att ha den länken om man vill skapa en rapport för alla kurstillfällen och även visa information om den som är kursansvarig.

På samma sätt är kurskod i kurstillfälle, en främmande nyckel som länkar kurstillfället till en specifik kurs.

Det är inte strikt nödvndigt att ange främmande nycklar i tabellerna. Men det förtydligar att det finns en *constraint*, en begränsning eller integritet, i din databas.

Vi anger alltid främmande nycklar när det finns.

Den SQL-kod som behövs för att ange de nycklarna kan se ut ungefär så här:

```sql
--
-- Create table: kurstillfalle
--
DROP TABLE IF EXISTS kurstillfalle;
CREATE TABLE kurstillfalle
(
    -- All columns and their definitions

    PRIMARY KEY (id),
    FOREIGN KEY (kurskod) REFERENCES kurs(kod),
    FOREIGN KEY (kursansvarig) REFERENCES larare(akronym)
);
```

Uppdatera hur du skapar tabellen så att du anger främmande nycklar som en constraint, ett integritetsvillkor. Det gör det tydligt hur du har valt att koppla (länka) dina tabeller med varandra.



Testa villkoret för foreign key {#testfk}
----------------------------------

För att testa hur databasen hanterar integritetsvillkoret så skapar du de båda tabellerna. Sedan försöker du droppa tabellen kurs.

Du får troligen ett sådant här meddelande.

> "Error Code: 1217. Cannot delete or update a parent row: a foreign key constraint fails"

Det säger att du inte kan droppa tabellen kurs eftersom tabellen kurstillfalle är beroende av den, via ett foreign key constraint.

Om du vill droppa samtliga tabeller så behöver du göra det i rätt ordning. Ofta är det bra att lägga dessa DROP i inledningen av den fil som skapar/droppar tabellerna.

Så här droppar du tabellerna i rätt ordning.

```sql
-- Drop tables in order to avoid FK constraint
DROP TABLE IF EXISTS kurstillfalle;
DROP TABLE IF EXISTS kurs;
```

Tänk att tabellerna är länkade tillsammans och du måste börja droppa den som inte har någon annan tabell länkad till sig. Om man visualiserar tabellernas koppling som en trädstruktur så börjar man droppa de tabeller som är löven längst ut.

Uppdatera så att din fil kan köra alla SQL-kommandon i sekvens.



Visa SQL-koden för CREATE TABLE {#showcreate}
----------------------------------

Du kan visa hur en tabell är skapad med kommandot SHOW CREATE TABLE. Det ger dig detaljer för tabellen och visar den SQL CREATE TABLE som användes för att skapa tabellen.

Så här ser det nu ut.

```sql
MariaDB [skolan]> SHOW CREATE TABLE kurs \G
*************************** 1. row ***************************
       Table: kurs
Create Table: CREATE TABLE `kurs` (
  `kod` char(6) NOT NULL,
  `namn` varchar(40) DEFAULT NULL,
  `poang` float DEFAULT NULL,
  `niva` char(3) DEFAULT NULL,
  PRIMARY KEY (`kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
1 row in set (0.001 sec)
```

Jag använder `\G` för att låta MySQL skriva ut resultatet rad för rad, istället för den vanliga med kolumn för kolumn.

```sql
MariaDB [skolan]> SHOW CREATE TABLE kurstillfalle \G
*************************** 1. row ***************************
       Table: kurstillfalle
Create Table: CREATE TABLE `kurstillfalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kurskod` char(6) NOT NULL,
  `kursansvarig` char(3) NOT NULL,
  `lasperiod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kurskod` (`kurskod`),
  KEY `kursansvarig` (`kursansvarig`),
  CONSTRAINT `kurstillfalle_ibfk_1` FOREIGN KEY (`kurskod`) REFERENCES `kurs` (`kod`),
  CONSTRAINT `kurstillfalle_ibfk_2` FOREIGN KEY (`kursansvarig`) REFERENCES `larare` (`akronym`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
1 row in set (0.001 sec)
```

Kommandot SHOW TABLE är bra när man inspekterar en databas, när man vill se hur tabellerna är uppbyggda.

Vissa saker är automatiskt tillagda i CREATE ovan, det kan till exempel vara ENGINE och DEFAULT CHARSET och namngivningarna på CONSTRAINT. Dessa kan alltså skilja mellan min utskrift ovan och din egen utskrift. Liknande saker kommer från databasens defaultinställningar. Det kan alltså vara ett bra verktyg att göra SHOW CREATE TABLE när man felsöker.



Kontrollera filen {#filen}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra samtliga SQL-satser, i en och samma sekvens, i filen du jobbar i.



<!--

Detta bör numer inte hända.

Foreign key mellan tabeller {#fklink}
----------------------------------

Om du nu kör alla kommandona i din fil så får du troligen ett fel som säger att du inte kan skapa en foreign key från tabellen kurstillfälle till tabellen lärare.

Felmeddelandet kan se ut så här när du försöker göra CREATE TABLE kurstillfalle.

> "Error Code: 1215. Cannot add foreign key constraint"

Anledningen är att tabellen larare inte är skapad på samma sätt, mer specifikt så innehåller tabellen inte en definition på charset och collation som stämmer överens med den som finns i kurstillfälle. Av den anledningen går det inte länka tabellerna med ett foreign key constraint.

För att lösa detta så uppdaterar vi tabellen lärare och sätter samma charset och collation på den.

```sql
--
-- Update table larare and larare_pre to use same charset
-- and collation.
--
ALTER TABLE larare CONVERT TO CHARSET utf8 COLLATE utf8_swedish_ci;
ALTER TABLE larare_pre CONVERT TO CHARSET utf8 COLLATE utf8_swedish_ci;
```

Nu går det åter att skapa ett foreign key constraint mellan tabellerna.
-->
