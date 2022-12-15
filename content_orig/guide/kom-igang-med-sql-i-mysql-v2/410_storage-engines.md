---
author: mos
revision:
    "2022-01-04": "(C, mos) Flyttad till egen artikel i samband med v2."
    "2019-01-28": "(B, mos) Uppdaterad och flyttade reset till nästa artikel."
    "2018-01-02": "(A, mos) Första versionen, uppdelad av större dokument."
...
Storage engines
==================================

Det finns olika lagringssätt för tabeller, så kallade "storage engines". De säger hur tabellerna lagras och styr vilka algoritmer som gäller för sökning i tabellerna. De vanligaste är MyISAM (tidigare) och InnoDB (numer).

MyISAM tar inte hänsyn till den integritetskoll som 'FOREIGN KEY' antyder. Det gör dock InnoDB. Numer är InnoDB standard för tabeller som skapas.

Man anger vilket lagringssätt som skall användas när man skapar tabellen, om man inte anger det så används det som är standard för databasen, eller standard för installationen av databasmotorn. Vilken lagringsmotor som är standard kan skilja mellan installation så ibland vill man ange vilken engine man skall använda för en tabell.

```sql
--
-- Ange vilket sätt som tabeller skall lagras på
--
CREATE TABLE t1 (i INT) ENGINE MYISAM;
CREATE TABLE t2 (i INT) ENGINE INNODB;
```

Vi använder normalt INNODB som är den senaste versionen av storage engines och normalt är den standard vid nyinstallationer.

Vid intresse kan du läsa kort om [Choosing the Right Storage Engine](https://mariadb.com/kb/en/choosing-the-right-storage-engine/).

Du kan också kontrollera vila storage engines som stöds i din installation och vilken av dem som är default, du gör detta med kommandot [SHOW ENGINES](https://mariadb.com/kb/en/show-engines/).

Prova skriva följande kommando så får du en lista och du ser troligen att InnoDB är markerad som DEFAULT.

```text
SHOW ENGINES \G
```

När man lägger till `\G` så får man en utskrift som är bättre anpassad när det är många kolumner eller texter som inte får plats på en rad i en vanlig tabell.



Specificera teckenkodning {#ddlcharset}
----------------------------------

Uppdatera hur du skapar tabellerna och ange explicit charset till `utf8` och collation till `utf8_swedish_ci` för hela tabellerna.

Du kan ange charset och collation i slutet av dina CREATE statement.

```sql
--
-- Ange teckenkodning för en tabell
--
CREATE TABLE t1 (i INT) CHARSET utf8 COLLATE utf8_swedish_ci;
CREATE TABLE t2 (
    i INT
)
ENGINE INNODB
CHARSET utf8
COLLATE utf8_swedish_ci
;
```

Lägg även denna konstruktion överst i filen, så vet vi att kopplingen mella klient och databas sker med UTF-8 som teckenkodning.

```sql
SET NAMES 'utf8';
```



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



Visa SQL-koden för CREATE TABLE {#showcreate}
----------------------------------

Du kan visa hur en tabell är skapad med kommandot SHOW CREATE TABLE. Det ger dig detaljer för tabellen.

Så här ser det nu ut.

```sql
mysql> SHOW CREATE TABLE kurs \G;
*************************** 1. row ***************************
       Table: kurs
Create Table: CREATE TABLE `kurs` (
  `kod` char(6) COLLATE utf8_swedish_ci NOT NULL,
  `namn` varchar(40) COLLATE utf8_swedish_ci DEFAULT NULL,
  `poang` float DEFAULT NULL,
  PRIMARY KEY (`kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci
1 row in set (0.00 sec)
```

Jag använder `\G` för att låta MySQL skriva ut resultatet rad för rad, istället för den vanliga med kolumn för kolumn.

```sql
mysql> SHOW CREATE TABLE kurstillfalle \G;
*************************** 1. row ***************************
       Table: kurstillfalle
Create Table: CREATE TABLE `kurstillfalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kurskod` char(6) COLLATE utf8_swedish_ci NOT NULL,
  `kursansvarig` char(3) COLLATE utf8_swedish_ci NOT NULL,
  `lasperiod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kurskod` (`kurskod`),
  KEY `kursansvarig` (`kursansvarig`),
  CONSTRAINT `kurstillfalle_ibfk_1` FOREIGN KEY (`kurskod`) REFERENCES `kurs` (`kod`),
  CONSTRAINT `kurstillfalle_ibfk_2` FOREIGN KEY (`kursansvarig`) REFERENCES `larare` (`akronym`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci
1 row in set (0.00 sec)
```

Kommandot SHOW TABLE är bra när man inspekterar en databas, när man vill se hur tabellerna är uppbyggda.



Kontrollera filen {#filen}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra samtliga SQL-satser, i en och samma sekvens, i filen du jobbar i.
