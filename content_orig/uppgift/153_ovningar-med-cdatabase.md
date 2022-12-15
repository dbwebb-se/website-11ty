---
author: sylvanas
category: php
revision:
  "2015-01-13": (B, mos) Flyttad från textdokument till dbwebb.
  "2014-11-27": (A, jane) Skapad för campus oophp.
updated: "2015-01-13 14:03:07"
created: "2015-01-13 11:07:13"
...
Övningar med CDatabase
==================================

PHP-klassen CDatabase är en klass som hanterar PDO-kopplingen mot en databas. CDatabase erbjuder extra metoder som gör det enklare att jobba mot en databas. I denna övning kommer du igång med att använda klassen och du jobbar med både SQL-satser, databas och diverse metoder för felsökning.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, artikeln ["Kom igång med PHP PDO och MySQL"](kunskap/kom-igang-med-php-pdo-och-mysql). 

Om du vill ha förklaringar, tips och ledtrådar så finner du dem i nämnda artikel.



Förberedelser {#forbered}
-----------------------

1. Börja med att via t.ex PHPMyAdmin eller MySQL Workbench köra följande SQL-fråga mot databasen (BTH's miljö) för att skapa tabell och innehåll att jobba mot:

```sql
--
-- Create table for my own movie database
--
DROP TABLE IF EXISTS Movie;
CREATE TABLE Movie
(
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  title VARCHAR(100) NOT NULL,
  director VARCHAR(100),
  LENGTH INT DEFAULT NULL, -- Length in minutes
  YEAR INT NOT NULL DEFAULT 1900,
  plot TEXT, -- Short intro to the movie
  image VARCHAR(100) DEFAULT NULL, -- Link to an image
  subtext CHAR(3) DEFAULT NULL, -- swe, fin, en, etc
  speech CHAR(3) DEFAULT NULL, -- swe, fin, en, etc
  quality CHAR(3) DEFAULT NULL,
  format CHAR(3) DEFAULT NULL -- mp4, divx, etc
) ENGINE INNODB CHARACTER SET utf8;
 
 
SHOW CHARACTER SET;
SHOW COLLATION LIKE 'utf8%';
 
DELETE FROM Movie;
 
INSERT INTO Movie (title, YEAR, image) VALUES
  ('Pulp fiction', 1994, 'img/movie/pulp-fiction.jpg'),
  ('American Pie', 1999, 'img/movie/american-pie.jpg'),
  ('Pokémon The Movie 2000', 1999, 'img/movie/pokemon.jpg'),  
  ('Kopps', 2003, 'img/movie/kopps.jpg'),
  ('From Dusk Till Dawn', 1996, 'img/movie/from-dusk-till-dawn.jpg')
;
```

2\. [Ladda ner följande fil](https://github.com/mosbth/Anax-oophp/blob/master/src/CDatabase/CDatabase.php) och spara som `CDatabase.php`.

3\. Skapa en fil `config.php` som:

3.1 Startar en namngiven session.

3.2 [Definierar användare och lösen](t/2192).

3.3 Skapar en array med de nycklar som konstruktorn i `CDatabase` förväntar sig (dsn, username, password, driver_options). Ange dina uppkopplingsuppgifter i denna array.

3.4 Deklarerar denna funktion:

```php
function dump($a) {
    echo '<pre>' . print_r($a, 1) . '</pre>';
}
```

4\. Skapa en fil `test.php` som:

4.1 Inkluderar `config.php`

4.2 Inkluderar `CDatabase.php`

Filen `test.php` blir den filen du jobbar i för att testa de olika funktionerna i `CDatabase`.



Övningar {#ovning}
-----------------------

1\. Skapa ett objekt av klassen `CDatabase` som ansluter mot databasen med de inställningar som definierades i `config.php` (använd arrayen du skapade). Vill du se vilken kod som körs? Granska metoden `__construct()` i `CDatabase`.


2\. Läs vad metoden `CDatabase::ExecuteSelectQueryAndFetchAll()` gör. Svara på följande frågor som kommentarer i `test.php`:

2.1 Vad ska innehållet vara i de parametrar som metoden tar emot?

2.2 Vilka parametrar måste vara med och vilka är optionella?

2.3 Vad returnerar metoden för data och vilken typ kommer datan som returneras att ha (boolean, integer, sträng, array, objekt osv)?


3\. Skriv en SQL-query för att hämta alla filmer i tabellen Movie. Spara queryn som en sträng i variabeln `$qry` i `test.php`.

4\. Anropa `ExecuteSelectQueryAndFetchAll()` för att hämta alla filmer (använd `$qry`). Lägg resultatet i variabeln `$res`.

5\. Använd `dump()` för att skriva ut `$res`. Svara på följande frågor som kommentarer i `test.php`:

5.1 Hur många filmer ligger i tabellen Movie?

5.2 Vilket id har filmen på `$res[3]`?

6\. Använd en `foreach` för att skriva ut titel för varje film.

7\. Läs vad metoden `CDatabase::RowCount()` gör.


8\. Anropa `RowCount()` och skriv ut resultatet. Svara på följande frågor som kommentarer i `test.php`:

8.1 Vad returnerade `RowCount()`?

8.2 Vad refererar den siffran till?


9\. Läs vad metoden `CDatabase::ExecuteQuery()` gör. Svara på följande frågor som kommentarer i `test.php`:

9.1 Vad ska innehållet vara i de parametrar som metoden tar emot?

9.2 Vilka parametrar måste vara med och vilka är optionella?

9.3 Vad returnerar metoden för data och vilken typ kommer datan som returneras att ha (boolean, integer, sträng, array, objekt osv)?


10\. Skriv en SQL-query för att lägga till en film i tabellen Movie. Använd placeholders `?` i queryn där värdena för filmen ska in. Spara queryn som en sträng i variabeln `$qry`.


11\. Skapa en array som innehåller de värden för filmen som ska läggas till i databasen (en array med queryns parametrar).


12\. Anropa `ExecuteQuery()` för att lägga in filmen i tabellen (använd `$qry` och arrayen med parametrar). Lägg resultatet i variablen `$res`.


13\. Använd `dump()` samt `var_dump()` för att skriva ut `$res`. Svara på följande frågor som kommentarer i `test.php`:

13.1 Vad returnerades?

13.2 Vad betyder det?


14\. Läs vad `CDatabase::LastInsertId()` returnerar.


15\. Anropa och skriv ut resultatet av `LastInsertId()`. Svara på följande frågor som kommentarer i `test.php`:

15.1 Vilket id fick filmen du lade in i tabellen?


16\. Skriv och exekvera följande query och spara dess resultat i `$res`:

```sql
DELETE FROM movie WHERE year == ?;
```

Notera att du ska skapa och skicka med en array som innehåller den parameter som ska ersätta placeholdern. Använd året på den film du la till tidigare.


17\. Använd `dump()` samt `var_dump()` för att skriva ut `$res`. Svara på följande frågor som kommentarer i `test.php`:

17.1 Vad returnerades?

17.2 Vad betyder det?


18\. Läs vad `CDatabase::ErrorCode()` samt `CDatabase::ErrorInfo()` gör.


19\. Anropa och skriv ut resultatet av `ErrorCode()` och `ErrorInfo()`. Svara på följande frågor som kommentarer i `test.php`:

19.1 Vilken felkod visas?

19.2 Vad betyder felkoden? *Tips: Använd mysql-referensen för att kolla upp error codes.*

19.3 Vad säger felmeddelandet om vad som gick fel?


20\. Åtgärda felen i queryn ovan. Svara på följande frågor som kommentarer i `test.php`:

20.1 Vad/vilka saker i queryn ändrade du på för att den skulle exekverars utan fel?


21\. Läs vad `CDatabase::GetNumQueries()` samt `CDatabase::GetQueries()` gör.


22\. Anropa och skriv ut resultatet av `GetNumQueries()` och `GetQueries()`. Svara på följande frågor som kommentarer i `test.php`:


22.1 Vad visar `GetNumQueries()` (vad refererar värdet till)?

22.2 Vad visar `GetQueries()`?


23\. Läs vad `CDatabase::Dump()` gör.


24\. Anropa och skriv ut resultatet av `Dump()`. Svara på följande frågor som kommentarer i `test.php`:

24.1 Vad visas (vad gör `Dump()`)?


25\. Läs vad `CDatabase::SaveDebug()` gör.


26\. Anropa `SaveDebug()`. Använd din funktion `dump()` (not: inte `CDatabase::Dump()`) för att skriva ut `$_SESSION`. Svara på följande frågor som kommentarer i `test.php`:

26.1 Vad är det för data som sparas i sessionen av `SaveDebug()`?

26.2 Till vilken nyckel i `$_SESSION` sparas datan till?

26.3 Om du laddar om sidan, vad kommer hända med debug-datan som ligger i session (försvinner den helt, nollställs den mellan sidladdningar eller byggs den på med mer debug)? *Tips: Läs vad `__construct()` och `SaveDebug()` gör. Testa ladda om sidan en eller två gånger. Testa att kommentera bort `SaveDebug()` och se vad som händer med sessionens innehåll om du laddar om sidan 1 och 2 gånger.*




Extrauppgift {#extra}
-----------------------

Det finns inga extra uppgifter.



Tips från coachen {#tips}
-----------------------

**Lycka till och hojta till i forumet om du behöver hjälp!**




