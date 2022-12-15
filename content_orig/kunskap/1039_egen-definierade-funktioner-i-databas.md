---
author:
    - mos
category:
    - databas
    - sql
    - sql funktioner
    - kurs oophp
revision:
    "2018-02-25": "(D, mos) Genomgång inför våren 2019, uppdaterade exempel enligt kodstandard plus karaktäristik."
    "2018-01-09": "(C, mos) Genomgång inför kursen databas."
    "2017-04-25": "(B, mos) Nu även i kursen oophp."
    "2017-03-06": "(A, mos) Första utgåvan inför kursen dbjs."
...
Egendefinierade funktioner i databas
==================================

[FIGURE src=/image/snapvt17/udf.png?w=c5&a=10,30,60,0 class="right"]

Låt oss kika på vad en egendefinierad funktion är, i en databas. Konceptet kallas även UDF som *User Defined Function* och det kan erbjuda en möjlighet att skriva snyggare och mer kraftfull SQL-kod.

Dagens ämne är alltså egendefinerade funktioner i databasen.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Artikeln bygger på kunskap som du fått i artikeln "[Triggers i databas](kunskap/lagrade-procedurer-i-databas)" och de artiklar som föregick den.

Artikeln visar grunderna i [egendefinierade funktioner](https://dev.mysql.com/doc/refman/8.0/en/create-procedure.html) som kan skrivas med [compund statements](https://dev.mysql.com/doc/refman/8.0/en/sql-syntax-compound-statements.html).

SQLite har inte stöd för egendefinierade funktioner som kan skrivas likt MySQL. Däremot erbjuder [SQLite ett API](http://www.sqlite.org/c3ref/create_function.html) där du kan skriva egna C-funktioner som kan användas i dina SQL uttryck. Det ger dig liknande möjligheter.

[SQL-koden som visas i exemplet](https://github.com/dbwebb-se/databas/blob/master/example/sql/function.sql) finner du på GitHub eller i kursrepot databas under `example/sql/function.sql`.



Exempel {#ex}
--------------------------------------

Låt mig visa dig ett exempel där läraren Sture tänker gradera betyg på en tentamen som hans studenter har gjort. Han har sparat undan all information i en tabell och nu är det enbart betygsättningen kvar.


```sql
DROP TABLE IF EXISTS exam;
CREATE TABLE exam
(
    `acronym` CHAR(4) PRIMARY KEY,
    `score` INTEGER
);

INSERT INTO exam
VALUES
    ('adam', 77),
    ('ubbe', 52),
    ('june', 49),
    ('john', 63),
    ('meta', 97),
    ('siva', 88);

SELECT * FROM exam;
```

Så här ser tabellen ut när vi är klara.

```text
mysql> SELECT * FROM exam;
+---------+-------+
| acronym | score |
+---------+-------+
| adam    |    77 |
| john    |    63 |
| june    |    49 |
| meta    |    97 |
| siva    |    88 |
| ubbe    |    52 |
+---------+-------+
6 rows in set (0.00 sec)
```

Se där, vi är redo för betygsättningen. Då behöver vi en betygskala, följande blir bra.

| A-F | Poäng | Definition |
|:---:|:-----:|------------|
| A   | 90+   | UTMÄRKT – enastående resultat. |
| B   | 80+   | MYCKET BRA – klart över medelstandard. |
| C   | 70+   | BÄTTRE ÄN BRA – allmänt bra arbete. |
| D   | 60+   | BRA – en fullgod prestation. |
| E   | 55+   | GODKÄNT – resultatet uppfyller minimikriterierna. |
| FX  | 54-   | KOMPLETTERA – mer arbete krävs innan betyg kan sättas. |
| F   | 50-   | OTILLRÄCKLIGT – (avsevärt) mer arbete krävs. |

Japp, då var det bara att koppla ihop betyget via poängen för respektive student.

Till vår hjälp kommer egendefinierade funktioner.

Tanken är att skriva en funktion som kan användas i en SELECT-sats och returnera betyget utifrån antalet poäng. Funktionen skall alltså översätta ett poäng till ett betyg.

Kunde man inte gjort detta med en tabell som innehåller betygstabellen och joinat med ett smart villkor? Jo, det kan man säkert. Men nu använder vi funktioner. I databaser finns ofta olika varianter på lösning.



CREATE FUNCTION {#create}
--------------------------------------

Låt oss börja med en enkel funktion för att lära oss konceptet och hur det används.

Jag skapar en funktion som bara returnerar inkommande parameter. Det är bara för att ha ett skal att komma igång med.

Här är skalet till en sådan funktion.

```sql
--
-- Function for grading an exam.
--
DROP FUNCTION IF EXISTS grade;
DELIMITER ;;

CREATE FUNCTION grade(
    score INTEGER
)
RETURNS INTEGER
DETERMINISTIC
BEGIN
    RETURN score;
END
;;

DELIMITER ;
```

Funktionen tar en parameter och returnerar ett värde. För tillfället returneras samma värde vi skickar in i funktionen.

Som du ser så använder jag nu *delimiter* till att avgränsa koden så att semikolon fungerar som avslutare, inne i funktionens body.

En funktion ser ut som en lagrad procedur, det som skiljer är att funktionen returnerar ett värde via konstruktionen `RETURNS INTEGER`. En lagrad procedur kan inte returnera ett värde på det viset.

Funktionen fungerar och den kan användas så här.

```sql
SELECT 
    *,
    grade(score) AS 'grade'
FROM exam;
```

Kör man mot tabellen så blir utskriften så här.

```sql
mysql> SELECT 
    ->     *,
    ->     grade(score) AS 'grade'
    -> FROM exam;
+---------+-------+-------+
| acronym | score | grade |
+---------+-------+-------+
| adam    |    77 |    77 |
| john    |    63 |    63 |
| june    |    49 |    49 |
| meta    |    97 |    97 |
| siva    |    88 |    88 |
| ubbe    |    52 |    52 |
+---------+-------+-------+
6 rows in set (0.00 sec)
```

Låt oss göra en mer intelligent funktion som kan ge oss betyget enligt betygsskalan.



Funktion för betygsättning {#grade}
--------------------------------------

I en funktion kan vi skriva compund statements. Det låter som vi kan lösa uppgiften med en IF, ELSEIF och END IF-sats som är en variant av de [varianter för kontrollflöden](https://dev.mysql.com/doc/refman/8.0/en/flow-control-statements.html) som erbjuds.

Glöm inte att ändra return-typen till `CHAR(2)` så den matchar det som nu returneras.

```sql
--
-- Function for grading an exam A-F, FX.
--
DROP FUNCTION IF EXISTS grade;
DELIMITER ;;

CREATE FUNCTION grade(
    score INTEGER
)
RETURNS CHAR(2)
DETERMINISTIC
BEGIN
    IF score >= 90 THEN
        RETURN 'A';
    ELSEIF score >= 80 THEN
        RETURN 'B';
    ELSEIF score >= 70 THEN
        RETURN 'C';
    ELSEIF score >= 60 THEN
        RETURN 'D';
    ELSEIF score >= 55 THEN
        RETURN 'E';
    ELSEIF score >= 50 THEN
        RETURN 'FX';
    END IF;
    RETURN 'F';
END
;;

DELIMITER ;
```

Nu är det bara att köra SELECT för att plocka fram betygslistan.

```sql
SELECT 
    *,
    grade(score) AS 'grade'
FROM exam
ORDER BY grade;
```

Så här kan det se ut.

```sql
mysql> SELECT 
    ->     *,
    ->     grade(score) AS 'grade'
    -> FROM exam
    -> ORDER BY grade;
+---------+-------+-------+
| acronym | score | grade |
+---------+-------+-------+
| meta    |    97 | A     |
| siva    |    88 | B     |
| adam    |    77 | C     |
| john    |    63 | D     |
| june    |    49 | F     |
| ubbe    |    52 | FX    |
+---------+-------+-------+
6 rows in set (0.00 sec)
```

Gott. Det fungerar.

Vi har alltså gjort en funktion som vi kan använda tillsammans med en SELECT-sats. Det här kan vara ett bra verktyg.



Skapa ytterligare en funktion {#func2}
--------------------------------------

Läraren Sture har fått problem, tydligen var det en annan betygsskala som några av studenterna skulle använda. En skala som gick mellan 3-5 och U.

Så här ser Stures betygstabell ut numer, en kombination mellan betygen A-F och U,3-5.

| A-F | U,3-5 | Poäng | Definition |
|:---:|:-----:|:-----:|------------|
| A   | 5     | 90+   | UTMÄRKT – enastående resultat. |
| B   | 4     | 80+   | MYCKET BRA – klart över medelstandard. |
| C   | 4     | 70+   | BÄTTRE ÄN BRA – allmänt bra arbete. |
| D   | 3     | 60+   | BRA – en fullgod prestation. |
| E   | 3     | 55+   | GODKÄNT – resultatet uppfyller minimikriterierna. |
| FX  | -     | 54-   | KOMPLETTERA – mer arbete krävs innan betyg kan sättas. |
| F   | U     | 50-   | OTILLRÄCKLIGT – (avsevärt) mer arbete krävs. |

Sture löser det med en ny funktion som ger betyg enligt skalan U, 3-5.

```sql
--
-- Function for grading an exam U, 3-5.
--
DROP FUNCTION IF EXISTS grade2;
DELIMITER ;;

CREATE FUNCTION grade2(
    score INTEGER
)
RETURNS CHAR(1)
DETERMINISTIC
BEGIN
    IF score >= 90 THEN
        RETURN '5';
    ELSEIF score >= 70 THEN
        RETURN '4';
    ELSEIF score >= 55 THEN
        RETURN '3';
    END IF;
    RETURN 'U';
END
;;

DELIMITER ;
```

Egentligen är det samma sak en gång till, nu är det bara andra värden som skall testas och returneras.

Nu kan Sture ta ut sin betygslista så kan studenterna, eller Sture, välja enligt vilket betygsystem de får sitt betyg.

```sql
SELECT 
    *,
    grade(score) AS 'A-F, FX',
    grade2(score) AS 'U, 3-5'
FROM exam
ORDER BY score DESC;
```

Så här kan det se ut.

```text
mysql> SELECT 
    ->     *,
    ->     grade(score) AS 'A-F, FX',
    ->     grade2(score) AS 'U, 3-5'
    -> FROM exam
    -> ORDER BY score DESC;
+---------+-------+---------+--------+
| acronym | score | A-F, FX | U, 3-5 |
+---------+-------+---------+--------+
| meta    |    97 | A       | 5      |
| siva    |    88 | B       | 4      |
| adam    |    77 | C       | 4      |
| john    |    63 | D       | 3      |
| ubbe    |    52 | FX      | U      |
| june    |    49 | F       | U      |
+---------+-------+---------+--------+
6 rows in set (0.50 sec)
```

Vi har fått ett exempel på hur egendefinierade funktioner kan användas för att presentera informationen på olika sätt.



Karaktäristik av en funktion {#karaktar}
--------------------------------------

I de funktioner vi skapat ovan har vi angivit dem med nyckelordet `DETERMINISTIC`. Det innebär en deklaration av funktionen som säger att den alltid returnerar samma svar när en mängd parametrar skickas in.

Motsatsen är `NOT DETERMINISTIC` och för att ta ett exempel så har vi en funktion som returnerar nuvarande tid, resultatet som returneras är alltid beroende av andra omständigheter (klockan) än de parametrar som eventuellt skickas in till funktionen. En annan variant av en NOT DETERMINISTIC funktion vore en funktion som beräknar en ålder utifrån ett födelsedatum, det som returneras är inte enbart beroende av parametern födelsedatum.

```sql
DROP FUNCTION IF EXISTS time_of_the_day;
DELIMITER ;;

CREATE FUNCTION time_of_the_day()
RETURNS DATETIME
NOT DETERMINISTIC NO SQL
BEGIN
    RETURN NOW();
END
;;

DELIMITER ;
```

Så här ser det ut när funktionen används.

```text
mysql> SELECT time_of_the_day();
+---------------------+
| time_of_the_day()   |
+---------------------+
| 2019-02-25 13:36:59 |
+---------------------+
1 row in set (0.00 sec)
```

I definitionen av funktionen `time_of_the_day()` ser du att `NO SQL` anges. Det är en deklaration som säger att funktionen inte använder några SQL-satser. Motsatsen hade varit deklarationen `CONTAINS SQL`.

Det finns även deklarationer för `READS SQL DATA` och `MODIFIES SQL DATA`.

Dessa deklarationer anges av den som skapar funktionen och databasservern kan använda informationen för att optimera körningarna. Om man deklarerar sin funktion på fel sätt så kan det ge upphov till oväntade resultat.



SHOW FUNCTION {#show}
--------------------------------------

När man vill se vilka funktioner som finns i databasen så kan man visa dem.

```sql
SHOW FUNCTION STATUS;
SHOW FUNCTION STATUS LIKE 'grade' \G
SHOW FUNCTION STATUS WHERE Db = 'dbwebb';
```

Med LIKE kan du söka och avgränsa mot funktionens namn.

Med WHERE kan du göra avgränsningar av resultatet och bara visa de funktioner där kolumnvillkoret matchar.

Det kan se ut så här när du använder LIKE.

```text
mysql> SHOW FUNCTION STATUS LIKE 'grade' \G
*************************** 1. row ***************************
                  Db: dbwebb
                Name: grade
                Type: FUNCTION
             Definer: user@%
            Modified: 2019-02-25 13:19:20
             Created: 2019-02-25 13:19:20
       Security_type: DEFINER
             Comment: 
character_set_client: utf8
collation_connection: utf8_general_ci
  Database Collation: utf8mb4_0900_ai_ci
1 row in set (0.00 sec)
```

Det kan se ut så här när du använder WHERE.

```text
mysql> SHOW FUNCTION STATUS WHERE Db = 'dbwebb';
+--------+-----------------+----------+---------+---------------------+---------------------+---------------+---------+----------------------+----------------------+--------------------+
| Db     | Name            | Type     | Definer | Modified            | Created             | Security_type | Comment | character_set_client | collation_connection | Database Collation |
+--------+-----------------+----------+---------+---------------------+---------------------+---------------+---------+----------------------+----------------------+--------------------+
| dbwebb | grade           | FUNCTION | user@%  | 2019-02-25 13:19:20 | 2019-02-25 13:19:20 | DEFINER       |         | utf8                 | utf8_general_ci      | utf8mb4_0900_ai_ci |
| dbwebb | grade2          | FUNCTION | user@%  | 2019-02-25 13:26:58 | 2019-02-25 13:26:58 | DEFINER       |         | utf8                 | utf8_general_ci      | utf8mb4_0900_ai_ci |
| dbwebb | time_of_the_day | FUNCTION | user@%  | 2019-02-25 13:36:31 | 2019-02-25 13:36:31 | DEFINER       |         | utf8                 | utf8_general_ci      | utf8mb4_0900_ai_ci |
+--------+-----------------+----------+---------+---------------------+---------------------+---------------+---------+----------------------+----------------------+--------------------+
3 rows in set (0.00 sec)
```

Svaret blir en lista med alla de funktioner som finns och till vilken databas de är kopplade.

Vill du sedan titta på koden som ligger bakom funktioner så frågar du efter den.

```sql
SHOW CREATE FUNCTION grade \G
```

Fram kommer källkoden för funktionen.

```text
mysql> SHOW CREATE FUNCTION grade \G
*************************** 1. row ***************************
            Function: grade
            sql_mode: ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION
     Create Function: CREATE DEFINER=`user`@`%` FUNCTION `grade`(
    score INTEGER
) RETURNS char(2) CHARSET utf8mb4
    DETERMINISTIC
BEGIN
    IF score >= 90 THEN
        RETURN "A";
    ELSEIF score >= 80 THEN
        RETURN "B";
    ELSEIF score >= 70 THEN
        RETURN "C";
    ELSEIF score >= 60 THEN
        RETURN "D";
    ELSEIF score >= 55 THEN
        RETURN "E";
    ELSEIF score >= 50 THEN
        RETURN "FX";
    END IF;
    RETURN "F";
END
character_set_client: utf8
collation_connection: utf8_general_ci
  Database Collation: utf8mb4_0900_ai_ci
```



Funderingar {#fundering}
--------------------------------------

Finns det inte andra sätt att lösa exemplet? Jo det finns det säkert. Men det är ändå ett rimligt exempel som visar hur du kan ha nytta av funktioner.

Eftersom du kan skriva compund statements i funktions-bodyn så har du stora möjligheter att utföra saker i en funktion. Det kan vara enklare utskrifts/rapportstöd, eller kanske en uppslagning i andra tabeller för att hämta värden liknande en subquery.

Möjligheter är flera. Kanske kunde man löst exemplet med en JOIN mot en tabell som innehöll nivåerna för betygen.

Vi har många verktyg i lådan som används för att lösa uppgiften. Man ska bara välja rätt verktyg i rätt situation, det är lite det som är utmaningen. 



Avslutningsvis {#avslutning}
--------------------------------------

Detta var grunderna i hur funktioner fungerar, hur du skapar och använder dem.

Liksom lagrade procedurer och triggers så erbjuder även funktioner ett sätt att tänka i form av API mot en databas. Funktioner kan användas för att styra upp vilken information som användaren får vid en viss fråga.

Har du [tips, förslag eller frågor om artikeln](t/6294) så finns det en specifik forumtråd för det.
