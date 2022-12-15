---
author: mos
category: php
updated: "2014-03-05 15:10:26"
created: "2013-06-12 10:20:41"
...
Kom igång med PHP PDO och MySQL
==================================

Guiden hjälper dig att komma i gång med PHP PDO och MySQL genom att bygga upp en webbapplikation kring en filmdatabas. Stegvis skapar du ett gränssnitt som jobbar mot databasen och ställer de vanliga frågorna för utsökning av objekt, skapa nya objekt, radera objekt och uppdatera informationen om ett objekt. När du är klar kan du applicera koden för din filmdatabas mot en annan databas, förfarandet är detsamma och guiden ger dig grunderna till en databasdriven webbplats, oavsett det är en filmdatabas eller webbshop.

<!--more-->

[WARNING]
**Nyare version av artikel rekommenderas**

Det finns en [nyare version av denna artikel](kunskap/kom-igang-med-php-pdo-och-mysql-v2) som rekommenderas istället.
[/WARNING]

Det bästa sättet att gå igenom guiden är att läsa exemplen och sedan pröva dem själv. Skapa dina egna testprogram där du testar olika kod-konstruktioner. Du måste testa själv för att lära dig. **Du måste själv skriva koden, det finns inga genvägar.**

Lyssna på de felmeddelande du får. De kommer från PHP eller från MySQL och de har **alltid** rätt. Lär dig tyda dem och förstå dem, det är som att föra en dialog med programmeringsspråket.

> *Felmeddelandet har alltid rätt.*

Så här kan det se ut när du är klar.

[FIGURE src=/image/snapshot/Visa_filmer_med_sokalternativ_kombinerade___Min_Filmdatabas.jpg?w=w1&q=60 caption="Olika sätt att söka ut informationen ur filmdatabasen."]



Förkunskaper {#forkunskaper}
-----------------------------------------------------------------------------------------------

Guiden förutsätter att du har kunskaper i PHP och webbutveckling. Känner du dig osäker på PHP så bör du först läsa igenom guiden ["Kom i gång med PHP på 20 steg"](kunskap/kom-i-gang-med-php-pa-20-steg).

Det är bra om du är van vid objektorienterad PHP-programmering. Behöver du grunderna så kan du jobba igenom guiden ["Kom i gång med objektorienterad PHP-programmering på 20 steg"](kunskap/kom-i-gang-med-oophp-pa-20-steg).

Du behöver vara bekant med MySQL och dess olika klienter. Guiden "[Kom igång med databasen MySQL och dess klienter](kunskap/kom-igang-med-databasen-mysql-och-dess-klienter)" hjälper dig att komma i gång med det.

Guiden bygger delvis på strukturen som finns i Anax, "[Anax - en hållbar struktur för dina webbapplikationer](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer)". Det kan vara bra att känna till den.



PHP PDO som gränssnitt mot MySQL {#granssnitt}
-----------------------------------------------------------------------------------------------

Det finns olika sätt att via PHP koppla sig mot en MySQL-databas. Om du använder äldre webbapplikationer så används ofta gränsnitten [mysql](http://php.net/manual/en/book.mysql.php) eller [mysqli](http://php.net/manual/en/book.mysqli.php). Det är bra att bekanta sig med dem, men för denna övningen har jag valt interfacet [PHP PDO](http://www.php.net/manual/en/book.pdo.php), eller PHP Data Objects som det kallas. PHP PDO är ett nyare gränssnitt och fungerar mot en mängd olika databaser. Det är alltså *ett* gränsnitt som fungerar mot flera olika databaser. Det är en klar fördel att endast behöva lära sig ett gränssnitt, oavsett vilken databas man jobbar emot, det blir lättare att anpassa koden mot andra databaser, man behöver inte lära sig ett nytt gränssnitt för varje databas. Här finns tid att spara.

Det sägs, av utvecklingsteamet bakom PHP, att när PHP version 6 släpps så skall det enbart finnas PHP PDO, de äldre gränssnitten skall fasas ut.



En övning med PHP PDO och MySQL {#plan}
-----------------------------------------------------------------------------------------------

Så, för att komma i gång och bekanta sig med PHP PDO behövs en liten övning. Jag tänkte att vi bygger en webbplats som skall visa min filmsamling. Jag vill visa alla filmer jag har, i en lista på webbsida. För varje film vill jag visa lite information om själva filmen. Jag vill kunna söka bland filmerna och det skall vara enkelt att navigera kring filmerna för att hitta rätt i filmsamlingen. Det skall också gå att lägga till, ta bort samt redigera informationen om en film. 

Så får det bli.



En databas för filmer {#db}
-----------------------------------------------------------------------------------------------

Först vill jag skapa databasen och det gör jag med ren SQL kod i godtycklig klient.

**SQL-kod för att skapa databasen.**

```sql
CREATE DATABASE IF NOT EXISTS Movie;

USE Movie;

--
-- Create table for my own movie database
--
DROP TABLE IF EXISTS Movie;
CREATE TABLE Movie
(
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  title VARCHAR(100) NOT NULL,
  director VARCHAR(100),
  length INT DEFAULT NULL, -- Length in minutes
  year INT NOT NULL DEFAULT 1900,
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

INSERT INTO Movie (title, year, image) VALUES
  ('Pulp fiction', 1994, 'img/movie/pulp-fiction.jpg'),
  ('American Pie', 1999, 'img/movie/american-pie.jpg'),
  ('Pokémon The Movie 2000', 1999, 'img/movie/pokemon.jpg'),  
  ('Kopps', 2003, 'img/movie/kopps.jpg'),
  ('From Dusk Till Dawn', 1996, 'img/movie/from-dusk-till-dawn.jpg')
;

SELECT * FROM Movie;
```

Så här ser det ut när jag skapar databasen i MySQL WorkBench.

[FIGURE src=/image/snapshot/workbench-movie.jpg?w=w1&q=60 caption="Databasen och tabellen skapas i MySQL med WorkBench."]

Så där, nu har jag en databas. Nu skall jag koppla mitt PHP-skript till databasen och börja koda.



Koppla ett PHP-skript till en MySQL-databas med PDO {#skript}
-----------------------------------------------------------------------------------------------



###Koppla PHP PDO mot MySQL {#koppla}

Först måste jag skapa en koppling mot databasen.

**Koppla upp PHP PDO mot MySQL-databas.**

```php
// Connect to a MySQL database using PHP PDO
$dsn      = 'mysql:host=localhost;dbname=Movie;';
$login    = 'acronym';
$password = 'password';
$options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
$pdo = new PDO($dsn, $login, $password, $options);
```

Jag använder de detaljer som behövs för att koppla upp sig mot databasen, server *host*, databas *dbname*, användare *login* och lösenord *password*. Med hjälp av dem skapar jag ett objekt av klassen [PDO](http://www.php.net/manual/en/class.pdo.php). Kika gärna på [klassens konstruktor](http://www.php.net/manual/en/pdo.construct.php) så ser du hur argumenten kan anges. 

DSN står för *[Data Source Name](http://en.wikipedia.org/wiki/Data_source_name)* och är ett generellt sätt att ange en datakälla på.

Beroende på vilken databas du kopplar upp dig till kan argumenten se lite olika ut. Det finns dokumentation om hur [olika PDO-drivers](http://www.php.net/manual/en/pdo.drivers.php) kan hanteras. En option som jag använder är att skicka med instruktionen för att jag vill använda teckenkodningen UTF8. Det behövs för att bestämma vilken teckenkodning som skall användas på kopplingen mellan PHP och MySQL. Annars fungerar inte UTF8. Du kan läsa mer om [specialinställningar för MySQL](http://www.php.net/manual/en/ref.pdo-mysql.php) i manualen.

Om uppkopplingen går fel så kastas ett exception där felet anges. De vanligaste problemen är att man skriver in fel server, databas, användare, lösenord eller att man missat att sätta UTF8 på överföringen.

[INFO]
**Exception visar användare och lösenord**

När exception kastas så visas alla parametrarna i felutskrifter, även inloggningsdetaljerna som användarnamn och lösenord. Därför är det bäst att göra uppkopplingen inom ramen för en try-catch-sats. 

```php
//$pdo = new PDO($dsn, $login, $password, $options);
try {
  $pdo = new PDO($dsn, $login, $password, $options);
}
catch(Exception $e) {
  //throw $e; // For debug purpose, shows all connection details
  throw new PDOException('Could not connect to database, hiding connection details.'); // Hide connection details.
}
```
[/INFO]


###Hämta data från databasen {#select}

I PHP PDO använder vi [*prepared statements*](http://www.php.net/manual/en/pdo.prepared-statements.php) när vi jobbar mot databasen. Först tar man en SQL-fråga och förbereder den, sedan exekverar man själva frågan och till slut hämtar man resultatet. Så här kan det se ut.

**Ställ fråga med PHP PDO och prepared statements.**

```php
// Do SELECT from a table
$sql = "SELECT * FROM Movie;";
$sth = $pdo->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();
```

Variabeln `$sth` representerar ett objekt av klassen [PDO Statement](http://www.php.net/manual/en/class.pdostatement.php). Man tar alltså en SQL-fråga och skapar ett objekt av klassen PDO Statement utifrån frågan. Sedan exekverar man med metoden `execute()` och resultatet `$res` kommer i form av en 2-dimensionell array.

Du kan nu göra [`dump()`](kunskap/kom-i-gang-med-php-pa-20-steg#dump) på innehållet i `$res`. Som du kan se är det en array som i sin tur innehåller en array för varje rad i tabellen.

**Resultatet från databasfrågan i en 2-dimensionell array.**

```php
Array
(
    [0] => Array
        (
            [id] => 1
            [0] => 1
            [title] => Pulp fiction
            [1] => Pulp fiction
            [director] => 
            [2] => 
            [length] => 
            [3] => 
            [year] => 1994
            [4] => 1994
        )

    [1] => Array
        (
            [id] => 2
            [0] => 2
            [title] => American Pie
            [1] => American Pie
            [director] => 
            [2] => 
            [length] => 
            [3] => 
            [year] => 1999
            [4] => 1999
        )
```

Det finns olika sätt att hämta informationen ur databasen, olika *fetch-styles*, du kan läsa om de olika varianterna i manualsidan för metoden [`fetch()`](http://www.php.net/manual/en/pdostatement.fetch.php). 

Jag brukar föredra att få tillbaka resultatet som ett objekt genom att använda *fetch-style* `PDO::FETCH_OBJ`. Detta är något jag kan ange varje gång jag anropar `fetchAll()` men jag väljer att sätta den som standard för alla mina anrop med hjälp av metoden [`setAttribute()`](http://www.php.net/manual/en/pdo.setattribute.php).

**Ange `PDO::FETCH_OBJ` som standard.**

```php
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
```

Nu ser resultatet istället ut så här:

**Hämta resultatet enligt `PDO::FETCH_OBJ`.**

```php
Array
(
    [0] => stdClass Object
        (
            [id] => 1
            [title] => Pulp fiction
            [director] => 
            [length] => 
            [year] => 1994
        )

    [1] => stdClass Object
        (
            [id] => 2
            [title] => American Pie
            [director] => 
            [length] => 
            [year] => 1999
        )

```

Samma resultat, men olika sätt att nå det. Vilket man använder beror på vad man föredrar och hur resten av koden är skriven. Vi jobbar objektorienterat så objekt-style känns logiskt.

Nu kan jag loopa igenom resultatet `$res` och skapa en html-tabell för att visa upp resultatet.

[FIGURE src=/image/snapshot/Koppla_upp_PHP_PDO_mot_MySQL___oophp_kursmaterial.jpg?w=w1&q=60 caption="Innehållet i tabellen visas i en webbsida."]

Bra, då har vi en start. Innehållet i databastabellen finns nu presenterat och tillgängligt i min webbsida.

Du kan [testa mina exempel](kod-exempel/gor-din-egen-filmdatabas/movie_connect.php), och se källkoden, men glöm inte att du måste skriva koden själv om du verkligen vill lära dig. *Det finns ingen genväg.*



Återställ databasen med ett SQL-skript {#restore}
-----------------------------------------------------------------------------------------------

Som en liten säkerhetsåtgärd, om spammare skulle få tag i min exempelkod, eller om någon skojare lägger dit en liten lustig film, så finns möjligheten att återställa hela databasen via menyvalet "Återställ".

Där körs ett kommando som tar sin input från en fil, [movie.sql](kod-exempel/gor-din-egen-filmdatabas/source.php?path=movie.sql#file), en fil med SQL-kommandon som återställer databasen till sitt ursprungliga skick. Bra att ha i detta fallet och även i andra fall.

**Kommando för att återställa databasen.**

```bash
/usr/local/bin/mysql -hlocalhost -uacronym -ppassword < movie.sql
```

Kommandot exekveras från php på följande sätt.

```php
// Restore the database to its original settings
$sql      = 'movie.sql';
$mysql    = '/usr/local/bin/mysql';
$host     = 'localhost';
$login    = 'acronym';
$password = 'password';
$output = null;

if(isset($_POST['restore']) || isset($_GET['restore'])) {
  $cmd = "$mysql -h{$host} -u{$login} -p{$password} < $sql 2>&1";
  $res = exec($cmd);
  $output = "<p>Databasen är återställd via kommandot<br/><code>{$cmd}</code></p><p>{$res}</p>";
}
```

Det är alltså ett enkelt sätt att skicka en hög med SQL-frågor till databasen via kommandoradsklienten till MySQL. 

Delen men `2>&1` gör så att eventuella felmeddelanden syns på en Unix-maskin. Det är ett sätt att omdirigera stderr till stdout.

[FIGURE src=/image/snapshot/Aterstall_databasen_till_ursprungligt_skick___Min_Filmdatabas.jpg?w=w1&q=60 caption="Återställ databasen till sitt ursprungliga skick."]

Om något händer i guiden framöver så kan du alltid gå hit för att återställa databasen.

Här kan du läsa om hur du gör samma [återställning på en Windows-maskin](t/2110), det är vissa delar som du behöver ändra.



Sök på delsträng i titel {#sok-titel}
-----------------------------------------------------------------------------------------------

Jag vill införa möjligheten att söka ut filmer baserat på delsträngar i filmens titel. Till att börja med behöver jag ett formulär.

**Sökformulär för titel.**

```html
<form>
<fieldset>
<legend>Sök</legend>
<p><label>Titel (delsträng, använd % som *): <input type='search' name='title' value='{$title}'/></label></p>
<p><a href='?'>Visa alla</a></p>
</fieldset>
</form>
```

Första gången man öppnar sidan så visar jag hela resultatet. Men när någon söker så visar jag enbart sökträffarna. Det löser jag med en if-sats.

**Visa hela resultatet eller bara resultatet från sökningen.**

```php
// Get parameters for sorting
$title = isset($_GET['title']) ? $_GET['title'] : null;


// Do SELECT from a table
if($title) {
  // prepare SQL for search
} 
else {
  // prepare SQL to show all
}
```

Vi har nu söksträngen som en variabel `$title` som skall bli en del av where-satsen i SQL-frågan. Detta görs i prepared statement med frågetecken och en parameterlista i form av en array. Så här ser det ut.

**Prepared statements och koppla argument till variabel.**

```php
$sql = "SELECT * FROM Movie WHERE title LIKE ?;";
$sth = $pdo->prepare($sql);

$params = array(
  $title,
);  
$sth->execute($params);

$res = $sth->fetchAll();
```

Du kan läsa om detta sätt, och fler sätt att koppla ihop parametrar med variabler, i manualen om [prepared statemements](http://www.php.net/manual/en/pdo.prepared-statements.php) eller där [metoden `execute()`](http://www.php.net/manual/en/pdostatement.execute.php) beskrivs.

Så här blev mitt resultat.

[FIGURE src=/image/snapshot/Sok_titel_i_filmdatabasen___Min_Filmdatabas.jpg?w=w1&q=60 caption="Sök på delsträng i titel."]

Kom ihåg att alltid kontrollera och använda [`htmlentities()`](http://php.net/manual/en/function.htmlentities.php) på information som du inte har full kontroll över och som skrivs ut i din webbsida. Detta gäller till exempel inkommande parametrar och strängar som byggs upp av dem.

Tänk om någon skickar in följande länk.

> `?title=<script>alert("hej")</script>`

Du vill inte öppna upp för att någon skall kunna exekvera JavaScript eller liknande i din webbsida. Kontrollera att din sida inte har några sådana säkerhetsbrister och åtgärda dem isåfall med anrop till `htmlentities()`.

**Anropa `htmlentities()` på strängar som skrivs ut i webbsidan.**

```php
$title = htmlentities($title);
$paramsPrint = htmlentities(print_r($params, 1));
```

Kika i min källkod om du är osäker på hur det fungerar.



Sök efter året då filmen skapades {#sok-ar}
-----------------------------------------------------------------------------------------------

Jag vill kunna använda året då filmen skapades som en grund för min sökning. Ibland vill jag se alla filmer som är äldre än 1990 och ibland vill jag se de filmer som skapats under första årtiondet av tvåtusentalet (2000 - 2010). Jag gör en ny testsida för att visa hur det kan se ut.

**Formulär för att ange året.**

```html
<form>
<fieldset>
<legend>Sök</legend>
<p><label>Skapad mellan åren: 
    <input type='text' name='year1' value='{$year1}'/>
    - 
    <input type='text' name='year2' value='{$year2}'/>
  </label>
</p>
<p><input type='submit' name='submit' value='Sök'/></p>
<p><a href='?'>Visa alla</a></p>
</fieldset>
</form>
```

När jag läser av värdet av året så kollar jag så att det är satt och inte är tomt.

**Kontrollera att året har ett värde.**

```php
$year1 = isset($_GET['year1']) && !empty($_GET['year1']) ? $_GET['year1'] : null;
$year2 = isset($_GET['year2']) && !empty($_GET['year2']) ? $_GET['year2'] : null;
```

Min tanke är att man enbart skall kunna ange ett av åren. För att lyckas med det så behöver jag i princip tre olika SQL-satser.

**Olika SQL-satser beroende på vilka av årtalen som anges.**

```php
if($year1 && $year2) {
  $sql = "SELECT * FROM Movie WHERE year >= ? AND year <= ?;";
  $params = array(
    $year1,
    $year2,
  );  
} 
elseif($year1) {
  $sql = "SELECT * FROM Movie WHERE year >= ?;";
  $params = array(
    $year1,
  );  
} 
elseif($year2) {
  $sql = "SELECT * FROM Movie WHERE year <= ?;";
  $params = array(
    $year2,
  );  
} 
```

Om man inte anger något av åren så visar jag samtliga filmer, på samma sätt som jag gjorde när man sökte på delsträng i titeln.

[FIGURE src=/image/snapshot/Sok_film_per_ar___Min_Filmdatabas.jpg?w=w1&q=60 caption="Ange mellan vilka år som filmen skapades."]



Kategorisera filmer per genre {#sok-genre}
-----------------------------------------------------------------------------------------------

Jag vill kategorisera mina filmer i olika genrer och jag vill kunna visa alla filmer som finns i en viss genre. 



###Tabeller för att hantera genre {#table-genre}

Först behöver jag uppdatera databasen och lägga in information om vilka genrer som respektive film tillhör.

**SQL för att koppla film till genre.**

```sql
--
-- Add tables for genre
--
DROP TABLE IF EXISTS Genre;
CREATE TABLE Genre
(
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  name CHAR(20) NOT NULL -- crime, svenskt, college, drama, etc
) ENGINE INNODB CHARACTER SET utf8;

INSERT INTO Genre (name) VALUES 
  ('comedy'), ('romance'), ('college'), 
  ('crime'), ('drama'), ('thriller'), 
  ('animation'), ('adventure'), ('family'), 
  ('svenskt'), ('action'), ('horror')
;

DROP TABLE IF EXISTS Movie2Genre;
CREATE TABLE Movie2Genre
(
  idMovie INT NOT NULL,
  idGenre INT NOT NULL,

  FOREIGN KEY (idMovie) REFERENCES Movie (id),
  FOREIGN KEY (idGenre) REFERENCES Genre (id),

  PRIMARY KEY (idMovie, idGenre)
) ENGINE INNODB;


INSERT INTO Movie2Genre (idMovie, idGenre) VALUES
  (1, 1),
  (1, 5),
  (1, 6),
  (2, 1),
  (2, 2),
  (2, 3),
  (3, 7), 
  (3, 8), 
  (3, 9), 
  (4, 11),
  (4, 1),
  (4, 10),
  (4, 9),
  (5, 11),
  (5, 4),
  (5, 12)
;

DROP VIEW IF EXISTS VMovie;

CREATE VIEW VMovie
AS
SELECT 
  M.*,
  GROUP_CONCAT(G.name) AS genre
FROM Movie AS M
  LEFT OUTER JOIN Movie2Genre AS M2G
    ON M.id = M2G.idMovie
  LEFT OUTER JOIN Genre AS G
    ON M2G.idGenre = G.id
GROUP BY M.id
;

SELECT * FROM VMovie;
```

Sådär, nu finns det två nya tabeller, en tabell med alla giltiga genrer (`Genre`) och en tabell (`Movie2Genre`), eller kopplingstabell om man så vill, för att koppla ihop en film till en eller flera genrer.

För att göra det enkelt att jobba med datan så skapar jag en vy där jag joinar alla tre tabeller. När jag sedan jobbar i PHP så räcker det att jobba mot vyn `VMovie` när jag vill visa alla filmer. 

En sak i detta sammanhanget är att använda den MySQL-specifika funktionen [`GROUP_CONCAT()`](http://dev.mysql.com/doc/refman/5.6/en/group-by-functions.html#function_group-concat) för att samla alla genrer i en kolumn. Den slår samman alla genrer för en film och gör det till en sträng som samlas i en kolumn. 

[FIGURE src=/image/snapshot/workbench-genre.jpg?w=w1&q=60 caption="Nu är filmerna kategoriserade enligt genre."]



###Visa filmer som tillhör en viss genre {#visa-genre}

Det första jag tänkte göra är att visa alla genrer som har minst en film. Sedan tänkte jag att användaren kan klicka på en genre och visa de filmer som är klassade enligt den. Först behöver jag alltså ta reda på vilka genrer som är *aktiva*, det vill säga de genrer som är kopplade till en eller flera filmer.

**SQL för att kolla aktiva genrer.**

```sql
SELECT DISTINCT G.name
FROM Genre AS G
  INNER JOIN Movie2Genre AS M2G
    ON G.id = M2G.idGenre
```

Nu har jag en lista på de genrer som används, med hjälp av dem gör jag en klickbar lista. 

När jag sedan vill visa alla filmer per en viss genre så använder jag följande SQL-kod.

**Visa filmer från en viss genre.**

```sql
SELECT 
  M.*,
  G.name AS genre
FROM Movie AS M
  LEFT OUTER JOIN Movie2Genre AS M2G
    ON M.id = M2G.idMovie
  LEFT OUTER JOIN Genre AS G
    ON M2G.idGenre = G.id
WHERE G.name = ?
;
```

Den är rätt lik vyn `VMovie` där alla tre tabellerna joinas, men det är enbart filmer från den valda genren som visas.

[FIGURE src=/image/snapshot/Sok_film_per_genre___Min_Filmdatabas.jpg?w=w1&q=60 caption="Visa alla filmer som hör till en viss genre."]

Bra, nu finns det flera sätt att söka ut filmerna på.



Sortera filmerna på olika kolumner {#sortera}
-----------------------------------------------------------------------------------------------

När min filmsamling blir större så behöver jag stöd för att sortera tabellen. Jag tänkte sortera per kolumn genom att klicka på kolumnrubriken.

Jag behöver skapa en länk för att sortera kolumnen i stigande ordning och en länk för att sortera i sjunkande ordning. Jag väljer att göra en funktion som skapar koden för länkarna.

**Funktion som skapar länkar för sortering.**

```php
/**
 * Function to create links for sorting
 *
 * @param string $column the name of the database column to sort by
 * @return string with links to order by column.
 */
function orderby($column) {
  return "<span class='orderby'><a href='?orderby={$column}&order=asc'>&darr;</i></a><a href='?orderby={$column}&order=desc'>&uarr;</a></span>";
}

// Put results into a HTML-table
$tr = "<tr><th>Rad</th><th>Id " . orderby('id') . "</th><th>Bild</th><th>Titel " . orderby('title') . "</th><th>År " . orderby('year') . "</th><th>Genre</th></tr>";
```

Nu kan jag ta hand om inkommande parametrar och ställa en SQL-fråga som sorterar enligt vald kolumn. Om inget är angivet så sorterar jag på id-kolumnen i stigande ordning.

**Sortera per kolumn enligt inkommande parametrar.**

```php
// Get parameters for sorting
$orderby  = isset($_GET['orderby']) ? strtolower($_GET['orderby']) : 'id';
$order    = isset($_GET['order'])   ? strtolower($_GET['order'])   : 'asc';


// Do SELECT from a table
$sql = "SELECT * FROM VMovie ORDER BY $orderby $order;";
$sth = $pdo->prepare($sql);
$sth->execute(array($orderby, $order));
$res = $sth->fetchAll();
```

Nu har jag dock öppnat upp lite väl mycket för SQL injections. Om jag inte kontrollerar vad inkommande parametrar har för värde så har jag givit användaren en möjlighet att skriva vad han vill i min SQL-sats. Det är **aldrig** bra och fattig kodning. Tänk vad som händer om följande länk hade angivits av användaren.

> `?orderby=id&order=;DROP%20TABLE%20STUDENTS`

Resultatet kunde blivit en SQL-fråga som raderar en tabell. 

> `SELECT * FROM VMovie ORDER BY id ;DROP TABLE STUDENTS;`

I detta fallet hade det inte fungerat eftersom man inte kan ställa flera SQL-satser i ett och samma prepared statement. Men principen gäller, användaren kan påverka SQL-satsen och så kan vi inte ha det. Användaren skall inte ges möjlighet att justera SQL-frågan via parametrarna. Därför behöver jag lägga till en kontroll så att jag vet hur SQL-frågan kommer att se ut. 

**Kontroll för inkommande parametrar.**

```php
// Check that incoming is valid
in_array($orderby, array('id', 'title', 'year')) or die('Check: Not valid column.');
in_array($order, array('asc', 'desc')) or die('Check: Not valid sort order.');
```

Sådär, nu fungerar det bättre och säkrare. Glöm inte.

> *Validera alltid inkommande parametrar.*

Så här ser det ut för mig. Nu kan jag sortera valda kolumner. 

[FIGURE src=/image/snapshot/Sortera_tabellens_innehall___Min_Filmdatabas.jpg?w=w1&q=60 caption="Filmer sorterade per titel i stigande bokstavsordning."]



Dela upp resultatet på flera sidor {#page}
-----------------------------------------------------------------------------------------------



###Principen för paginering {#paginering}

När filmsamlingen växer så blir det svårt att se alla filmer på en sida, jag behöver dela upp visningen i olika sidor, paginering. Det är relativt lätt att göra detta i SQL med klausulen `LIMIT` och `OFFSET`. 

**Visa fem rader och starta på rad 25+1 med `LIMIT`.**

```sql
SELECT * FROM VMovie LIMIT 5 OFFSET 25;
```

Med hjälp av denna enkla SQL-konstruktion kan vi skapa en mer komplex navigering kring filmerna. Dels kan vi bestämma hur många filmer skall visas per sida och dels kan vi navigera mellan sidorna. Så här kan det se ut när det är klart.

[FIGURE src=/image/snapshot/Visa_resultatet_i_flera_sidor___Min_Filmdatabas.jpg?w=w1&q=60 caption="Två filmer visas per sida och sida 2 visas för tillfället."]

Det är en del kluriga saker att lösa för en sådan här webbsida. Dels är det länkningen och dels är det att bestämma vilken information man behöver ha tillgänglig.

För det första, jag måste ha tillgång till ett par variabler.

**Variabler som krävs för paginering.**

```php
$hits // How many rows to display per page.
$page // Which is the current page to display, use this to calculate the offset value
$max  // Max pages in the table: SELECT COUNT(id) AS rows FROM VMovie
$min  // Startpage, usually 0 or 1, what you feel is convienient
```

En länk till att visa sida 2 med 2 rader per sida kan alltså se ut så här.

> `?hits=2&page=2`

Länken bör i sin tur resultera i en SELECT-sats enligt följande.

```php
$sql = "SELECT * FROM VMovie LIMIT $hits OFFSET " . (($page - 1) * $hits);
//SELECT * FROM VMovie LIMIT 2 OFFSET 2
```

Det var principen det.



###Länking genom att modifiera nuvarande QUERY_STRING {#mod-qs}

Det behövs två "menyer" för att navigera i tabellen. En för att bestämma antalet träffar per sida och en för att bestämma vilken sida som skall visas. Den ena menyn justerar värdet på `$hits` medans `$page` är oförändrat, den andra gör tvärtom. Det handlar alltså om att utgå från nuvarande QUERY_STRING och modifiera värdet i en viss parameter. För att göra detta på ett mer generellt sätt skapar jag en funktion `getQueryString()`.

**Använd nuvarande QUERY_STRING som bas och förändra den.**

```php
/**
 * Use the current querystring as base, modify it according to $options and return the modified query string.
 *
 * @param array $options to set/change.
 * @param string $prepend this to the resulting query string
 * @return string with an updated query string.
 */
function getQueryString($options, $prepend='?') {
  // parse query string into array
  $query = array();
  parse_str($_SERVER['QUERY_STRING'], $query);

  // Modify the existing query string with new options
  $query = array_merge($query, $options);

  // Return the modified querystring
  return $prepend . http_build_query($query);
}
```

I mitt fall är detta en funktion jag behöver för att fortsätta och skapa de båda navigeringsmenyerna.



###Navigeringsmeny för att välja antalet träffar {#sel-hits}

[FIGURE src=/image/snapshot/hits-Visa_resultatet_i_flera_sidor___Min_Filmdatabas.jpg?w=w1&q=60 caption="Menyn för att bestämma hur många träffar som visas per sida."]

För att hålla ordning i min kod så skapar jag en ny metod för att generera menyn för antalet träffar. Jag skickar in en array med de alternativ jag vill ha och resultatet blir menyn i form av html-kod. För att skapa menyn används funktionen `getQueryString()`.

**Funktion för att skapa meny för antal träffar.**

```php
/**
 * Create links for hits per page.
 *
 * @param array $hits a list of hits-options to display.
 * @return string as a link to this page.
 */
function getHitsPerPage($hits) {
  $nav = "Träffar per sida: ";
  foreach($hits AS $val) {
    $nav .= "<a href='" . getQueryString(array('hits' => $val)) . "'>$val</a> ";
  }  
  return $nav;
}

echo getHitsPerPage(array(2, 4, 8));
```


###Navigeringemeny för sidor {#sel-page}

[FIGURE src=/image/snapshot/pages-Visa_resultatet_i_flera_sidor___Min_Filmdatabas.jpg?w=w1&q=60 caption="Menyn för att bestämma hur många träffar som visas per sida."]

Jag behöver ytterligare en meny för att bestämma vilken sida som skall visas. Här blir det också snyggare att lägga koden i en funktion och funktionen `getQueryString()` används för att skapa länkarna.

**Funktion för att skapa meny för navigering av sidor.**

```php
/**
 * Create navigation among pages.
 *
 * @param integer $hits per page.
 * @param integer $page current page.
 * @param integer $max number of pages. 
 * @param integer $min is the first page number, usually 0 or 1. 
 * @return string as a link to this page.
 */
function getPageNavigation($hits, $page, $max, $min=1) {
  $nav  = "<a href='" . getQueryString(array('page' => $min)) . "'>&lt;&lt;</a> ";
  $nav .= "<a href='" . getQueryString(array('page' => ($page > $min ? $page - 1 : $min) )) . "'>&lt;</a> ";

  for($i=$min; $i<=$max; $i++) {
    $nav .= "<a href='" . getQueryString(array('page' => $i)) . "'>$i</a> ";
  }

  $nav .= "<a href='" . getQueryString(array('page' => ($page < $max ? $page + 1 : $max) )) . "'>&gt;</a> ";
  $nav .= "<a href='" . getQueryString(array('page' => $max)) . "'>&gt;&gt;</a> ";
  return $nav;
}

echo getPageNavigation($hits, $page, $max);
```

När allt är klart kan det se ut som i mitt [exempel med sidnavigering](kod-exempel/gor-din-egen-filmdatabas/movie_page.php).



En databasklass som modul i Anax {#cdatabase}
-----------------------------------------------------------------------------------------------

Som du märker blir det en hel del upprepning av databaskoden för varje ny sida som vi skapar. Det är onödigt. Ett sätt att komma bort från det är att skapa en klass för databasen, det kan spara ett par rader kod i varje sidkontroller och det är bra.

I detta film-exempel har jag använt webbmallen [Anax](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer) som grund och därför jobbar jag vidare med det och bygger min databasklass som en [Anax-modul](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer#modul).

Tanken är att flytta inloggningsdetaljerna till `config.php`, skapa en klass för databaskoden - `CDatabase`, lägga själva uppkopplingen i konstruktorn och sedan göra en metod för att ställa Select-frågor. Dessutom tänkte jag lägga till lite debugging-möjligheter som kan vara bra att ha när man felsöker.

Låt oss se hur det kan se ut.



###Inloggningsdetaljer till `config.php` {#configphp}


För det första så flyttar jag inloggningsuppgifterna till filen `config.php`. Det räcker ju att ange dem en gång och inte i varje sidkontroller som jag gjort hittills.

**Inloggningsuppgifter till `config.php`.**

```php
/**
 * Settings for the database.
 *
 */
$anax['database']['dsn']            = 'mysql:host=localhost;dbname=Movie;';
$anax['database']['username']       = 'acronym';
$anax['database']['password']       = 'password';
$anax['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
```


###CDatabase, en wrapper om databasen {#klassen}

Jag skapar mallen till min klass `CDatabase`. Jag behöver ett par interna variabler för att ha koll på vad som händer.

**Klassen `CDatabase` med dess interna variabler.**

```php
/**
 * Database wrapper, provides a database API for the framework but hides details of implementation.
 *
 */
class CDatabase {

  /**
   * Members
   */
  private $options;                   // Options used when creating the PDO object
  private $db   = null;               // The PDO object
  private $stmt = null;               // The latest statement used to execute a query
  private static $numQueries = 0;     // Count all queries made
  private static $queries = array();  // Save all queries for debugging purpose
  private static $params = array();   // Save all parameters for debugging purpose

}
```



###Koppla upp mot databasen via konstruktorn {#konstruktor}

All uppkoppling och initiering sker i konstruktorn.

**Konstruktorn skapar ett PDO-objekt.**

```php
  /**
   * Constructor creating a PDO object connecting to a choosen database.
   *
   * @param array $options containing details for connecting to the database.
   *
   */
  public function __construct($options) {
    $default = array(
      'dsn' => null,
      'username' => null,
      'password' => null,
      'driver_options' => null,
      'fetch_style' => PDO::FETCH_OBJ,
    );
    $this->options = array_merge($default, $options);

    try {
      $this->db = new PDO($this->options['dsn'], $this->options['username'], $this->options['password'], $this->options['driver_options']);
    }
    catch(Exception $e) {
      //throw $e; // For debug purpose, shows all connection details
      throw new PDOException('Could not connect to database, hiding connection details.'); // Hide connection details.
    }

    $this->db->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->options['fetch_style']); 
  }
```

I konstruktorn använder jag möjligheten att skicka in en array med all information som behövs för att initiera objektet. Det som inte skickas in får standardvärden. Det är ett vanligt sätt att vara flexibel i att skicka valfritt antal argument till en funktion eller metod och att hantera default-värden. Kanske lite klurigt vid första anblicken men annars är det bra att kunna och mycket smidigt när man lärt sig hantera det.  

Nu med konstruktorn och klassen CDatabase så får jag ändra min kod i sidkontrollern.

**Ändring i sidkontroller för att använda klassen CDatabase.**

```php
// Connect to a MySQL database using PHP PDO
/*
$dsn      = 'mysql:host=localhost;dbname=Movie;';
$login    = 'acronym';
$password = 'password';
$options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
$pdo = new PDO($dsn, $login, $password, $options);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
*/

$db = new CDatabase($anax['database']);
```

Där sparade vi ett par rader. En del som hamnade i `config.php` resten hamnade i konstruktorn. Kvar blir en rad för att skapa ett objekt av klassen `CDatabase` och in skickas argumenten som gör det möjligt att koppla upp sig mot databasen.



###Ställa frågor via metoden `ExecuteSelectAndFetchAll()` {#executesel}

Nu skapar jag en metod för att utföra en Select-sats och returnera en array med svaret. Dessutom lägger jag till lite möjligheter för felsökning.

```php
  /**
   * Execute a select-query with arguments and return the resultset.
   * 
   * @param string $query the SQL query with ?.
   * @param array $params array which contains the argument to replace ?.
   * @param boolean $debug defaults to false, set to true to print out the sql query before executing it.
   * @return array with resultset.
   */
  public function ExecuteSelectQueryAndFetchAll($query, $params=array(), $debug=false) {

    self::$queries[] = $query; 
    self::$params[]  = $params; 
    self::$numQueries++;

    if($debug) {
      echo "<p>Query = <br/><pre>{$query}</pre></p><p>Num query = " . self::$numQueries . "</p><p><pre>".print_r($params, 1)."</pre></p>";
    }

    $this->stmt = $this->db->prepare($query);
    $this->stmt->execute($params);
    return $this->stmt->fetchAll();
  }
```

Nu kan jag uppdatera min sidkontroller och den nya koden blir så här.

**Ändra sidkontroller för att anropa `ExecuteSelectAndFetchAll()`.**

```php
// Get max pages from table, for navigation
/*
$sql = "SELECT COUNT(id) AS rows FROM VMovie";
$sth = $pdo->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();
*/
$sql = "SELECT COUNT(id) AS rows FROM VMovie";
$res = $db->ExecuteSelectQueryAndFetchAll($sql);
```

Fyra rader blev två, det sparade två rader och det tycker jag är bra och en tillräcklig anledning till att skapa en klass som det här. När man har gjort 1000 databasfrågor så innebär det 2000 sparade kodrader. Det är bra det.



###Skapa möjligheter för felsökning {#dbdebug}

En fördel med att lägga all tillgång till databasen i en egen klass är att det ger möjlighet att spara ned, logga, alla sql-frågor som ställs. Det är något jag gör via de statisk medlemsvariablerna `self::$queries`, `self::$params` och `self::$numQueries`. Det som behövs är en metod som skriver ut variablernas innehåll som html.

**Metod för att skriva ut frågeloggen.**

```php
  /**
   * Get a html representation of all queries made, for debugging and analysing purpose.
   * 
   * @return string with html.
   */
  public function Dump() {
    $html  = '<p><i>You have made ' . self::$numQueries . ' database queries.</i></p><pre>';
    foreach(self::$queries as $key => $val) {
      $params = empty(self::$params[$key]) ? null : htmlentities(print_r(self::$params[$key], 1)) . '<br/></br>';
      $html .= $val . '<br/></br>' . $params;
    }
    return $html . '</pre>';
  }
```

**Exempel på utskrift av databasloggen.**

```sql
You have made 3 database queries.

  SELECT DISTINCT G.name
  FROM Genre AS G
    INNER JOIN Movie2Genre AS M2G
      ON G.id = M2G.idGenre


SELECT COUNT(id) AS rows FROM Movie


  SELECT 
    M.*,
    GROUP_CONCAT(G.name) AS genre
  FROM Movie AS M
    LEFT OUTER JOIN Movie2Genre AS M2G
      ON M.id = M2G.idMovie
    INNER JOIN Genre AS G
      ON M2G.idGenre = G.id
 WHERE 1  AND year >= ? AND year <= ? GROUP BY M.id LIMIT 10 OFFSET 0

Array
(
    [0] => 1200
    [1] => 2100
)
```

Detta ger en bra möjlighet att analysera vad som händer, särskilt när koden växer och det börjar bli svårt att ha koll på hur många, och vilka, frågor som ställs mot databasen. Mer än en gång har jag själv använt denna möjlighet och sett, till exempel, att jag felaktigt ställer samma databasfråga flera gånger i en och samma sidkontroller. 



###Kommentar om databasklassen {#kommentar}

Du kan se mitt [modifierade skript](kod-exempel/gor-din-egen-filmdatabas/source.php?path=movie_cdatabase.php#file) hur det numer ser ut när det använder klassen `CDatabase`. 

När ens skript växer så måste man organisera koden. Ibland dyker det upp möjligheter till att skapa en klass för att strukturera och spara kodrader. Då bör man göra det, även om det tar en del tid så är det något man vinner på i längden, både som bra möjlighet för återanvändning till andra projekt och för att skapa bra kod som är översiktlig, lättläst och underhållbar.

Men, det finns aldrig regler utan undantag. Detta är nog ingen regel förresten, det är mer en riktlinje. Nåväl, copy-paste, att kopiera kod, är också en bra återanvändningsteknik och ibland säger omständigheterna att man inte har tid, eller vinner på att skriva väl organiserad kod. Kanske är det ett kundprojekt med knapp budget, en engångsgrej som inte kommer underhållas och storleken på projektet tillåter att man rundar hörnen och tar snabba vägen till resultat. Då kan man göra det. 

Man får ha en känsla för när det är rätt att skriva bra kod och när man måste skriva kod snabbt. Lär dig både och och skaffa en känsla för när det ena eller andra är rätt. Då är du på god väg att bli en bra programmerare.

Nu åter till filmdatabasen.



Inloggning för att skydda filmdatabasen {#login}
-----------------------------------------------------------------------------------------------

I min filmdatabas vill jag ha möjligheten att ändra, ta bort och lägga till filmer via ett webbgränssnitt. Men det är ett gränssnitt som behöver skyddas från spammare och illvilliga förstörare. För att skydda det så lägger jag på ett enkelt lager av inloggning, så att det krävs ett användarid och ett lösenord för att logga in. Endast inloggade användare skall kunna uppdatera filmdatabasen. För att lösa detta så gör jag en tabell i databasen som innehåller användarid och deras lösenord, jag gör en inloggningssida och en sida för att logga ut och information om den inloggade användaren sparar jag undan i sessionen som ett objekt.



###Databastabell med användare och lösenord {#tabell-user}

Jag skapar en databastabell och lägger in ett par användare så att jag kan testa. Jag tar en enkel lösning och skyddar lösenorden med `md5()` och ett salt via `unix_timestamp()`. Det är enkelt men visar principen för hur man gör det. Vill du använda `sha()` istället för `md5()`, eller [någon annan inbyggd krypteringsalgoritm](http://dev.mysql.com/doc/refman/5.6/en/encryption-functions.html), så gör du det.

```sql
--
-- Table for user
--
DROP TABLE IF EXISTS User;

CREATE TABLE User
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  acronym CHAR(12) UNIQUE NOT NULL,
  name VARCHAR(80),
  password CHAR(32),
  salt INT NOT NULL
) ENGINE INNODB CHARACTER SET utf8;

INSERT INTO User (acronym, name, salt) VALUES 
  ('doe', 'John/Jane Doe', unix_timestamp()),
  ('admin', 'Administrator', unix_timestamp())
;

UPDATE User SET password = md5(concat('doe', salt)) WHERE acronym = 'doe';
UPDATE User SET password = md5(concat('admin', salt)) WHERE acronym = 'admin';

SELECT * FROM User;
```

Bra, då är tabellen och ett par testanvändare på plats. Nu kan man testa om en användare och lösenord stämmer genom att skriva en enkel SELECT-sats.

```sql
SELECT acronym, name FROM User WHERE acronym = ? AND password = md5(concat(?, salt))
```



###Logga in {#loggain}

En sida för att sköta inloggningen, det blir ett formulär där användaren kan skriva in användare och lösenord. När användaren har loggat in så sparas informationen om den inloggade användaren i sessionen.

**Testa om användaren är inloggad eller ej.**

```php
// Check if user is authenticated.
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

if($acronym) {
  $output = "Du är inloggad som: $acronym ({$_SESSION['user']->name})";
}
else {
  $output = "Du är INTE inloggad.";
}
```

När användaren vill logga in och postar formuläret så görs en test mot databasen om användaren och lösenordet är korrekt angivna. Det kan se ut så här.

**Verifiera att användare och lösenord stämmer.**

```php
// Check if user and password is okey
if(isset($_POST['login'])) {
  $sql = "SELECT acronym, name FROM User WHERE acronym = ? AND password = md5(concat(?, salt))";
  $sth = $pdo->prepare($sql);
  $sth->execute(array($_POST['acronym'], $_POST['password']));
  $res = $sth->fetchAll();
  if(isset($res[0])) {
    $_SESSION['user'] = $res[0];
  }
  header('Location: movie_login.php');
}
```

Om SELECT-satsen returnerar en rad så finns det en användare med det angivna lösenordet och akronymen, annars inte. 

[INFO]
**Använd CDatabase**

Som du ser så använder exempelkoden ovan inte CDatabase, men det borde den göra, då hade det blivit färre kodrader och lättare att läsa koden. Du använder naturligtvis din variant av CDatabase.
[/INFO]

Så här kan hela sidan se ut när den är klar.

[FIGURE src=/image/snapshot/Login___Min_Filmdatabas.jpg?w=w1&q=60 caption="Inloggning för att skydda databasen."]



###Logga ut {#logout}

Om vi har en login så måste vi ha en logout. För att logga ut så behöver vi ta bort objektet i sessionen, det är ju objektet som säger vilken användare som är inloggad. Så här tar vi bort en variabel i sessionen.

**Gör så att användaren loggar ut.**

```php
// Logout the user
if(isset($_POST['logout'])) {
  unset($_SESSION['user']);
  header('Location: movie_logout.php');
}
```

Så här kan en logout-sida se ut.

[FIGURE src=/image/snapshot/Logout___Min_Filmdatabas.jpg?w=w1&q=60 caption="Klicka på knappen för att logga ut."]

Nu är webbplatsen skyddad och jag kan fortsätta med de sidor som skall uppdatera filmdatabasen.



Uppdatera information om film {#update}
-----------------------------------------------------------------------------------------------

Jag behöver ett enkelt sätt att uppdatera information om mina filmer. Det behövs ett formulär som fylls i med information om filmen och en möjlighet att spara den information som jag ändrar. Så här kan det se ut.

**Visa alla filmer med en "edit-knapp".**

[FIGURE src=/image/snapshot/Valj_och_uppdatera_info_om_film___Min_Filmdatabas.jpg?w=w1&q=60 caption="Lista de filmer som finns och en knapp/länk för att uppdatera informationen."]

När man klickar på "uppdatera-knappen" till en film så hamnar man på en sida där man kan uppdatera detaljer om filmen.

**Sida för att uppdatera information om film.**

[FIGURE src=/image/snapshot/Uppdatera_info_om_film___Min_Filmdatabas.jpg?w=w1&q=60 caption="Formulär för att uppdatera detaljer om en film."]

Så, vad kan man säga om det som krävs för att skapa dessa sidor, eller framförallt uppdatera-sidan?



###Läs från databasen och fyll i formulär {#las}

Först gör jag en SQL-fråga som jag använder för att fylla i formuläret med filmens nuvarande information.

```php
// Select information on the movie 
$sql = 'SELECT * FROM Movie WHERE id = ?';
$params = array($id);
$res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);

if(isset($res[0])) {
  $movie = $res[0];
}
else {
  die('Failed: There is no movie with that id');
}
```

Jag skapar formuläret och fyller i den information som finns lagrad om filmen.

```php
<form method=post>
  <fieldset>
  <legend>Uppdatera info om film</legend>
  <input type='hidden' name='id' value='{$id}'/>
  <p><label>Titel:<br/><input type='text' name='title' value='{$movie->title}'/></label></p>
  <p><label>År:<br/><input type='text' name='year' value='{$movie->year}'/></label></p>
  <p><label>Bild:<br/><input type='text' name='image' value='{$movie->image}'/></label></p>
  <p><input type='submit' name='save' value='Spara'/> <input type='reset' value='Återställ'/></p>
  <output>{$output}</output>
  </fieldset>
</form>
```

Där har vi grundläget. Nu visas den nuvarande informationen om filmen.



###Ta hand om postat formulär och spara värden {#submit-save}

Användaren ändrar i formuläret och postar det. Nu behöver jag ta hand om inkommande formulärparametrar och validera dem.

```php
// Get parameters 
$id     = isset($_POST['id'])    ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
$title  = isset($_POST['title']) ? strip_tags($_POST['title']) : null;
$year   = isset($_POST['year'])  ? strip_tags($_POST['year'])  : null;
$image  = isset($_POST['image']) ? strip_tags($_POST['image']) : null;
$genre  = isset($_POST['genre']) ? $_POST['genre'] : array();
$save   = isset($_POST['save'])  ? true : false;


// Check that incoming parameters are valid
is_numeric($id) or die('Check: Id must be numeric.');
is_array($genre) or die('Check: Genre must be array.');
```

Jag gör de tester jag kan göra och via [`strip_tags()`](http://php.net/manual/en/function.strip-tags.php) rensar jag bort om användaren försöker skicka in HTML-kod. Det finns olika taktiker att hantera formulärvärden som skall sparas i databasen. Man kan spara dem exakt som användaren skriver in dem och sedan hantera med [`htmlentities()`](http://php.net/manual/en/function.htmlentities.php) när de skrivs ut, eller så kan man göra som jag gör nu, att rensa bort eventuell skadlig kod innan man sparar i databasen. Båda två är rätt, det gäller bara att vara konsistent när man valt taktik.

Slutligen så uppdaterar jag databasen med informationen från det postade formuläret.

**UPDATE av en film.**

```php
// Check if form was submitted
$output = null;
if($save) {
  $sql = '
    UPDATE Movie SET
      title = ?,
      year = ?
    WHERE 
      id = ?
  ';
  $params = array($title, $year, $id);
  $db->ExecuteQuery($sql, $params);
  $output = 'Informationen sparades.';
}
```

Som du kan se så har jag utökat klassen CDatabase för att hantera INSERT, UPDATE och DELETE-satser. Det är metoden `ExecuteQuery()` som löser det. Låt oss kika på den.



###Stöd för INSERT, UPDATE, DELETE i CDatabase {#insert-cdatabase}

När man gör INSERT, UPDATE och DELETE så returneras inte ett resultset som i SELECT-fallet. Här returneras ett värde som bara säger om frågan gick bra eller ej. En sådan fråga ser lite annorlunda ut och därför behövs en ny metod i klassen `CDatabase`.

```php
  /**
   * Execute a SQL-query and ignore the resultset.
   *
   * @param string $query the SQL query with ?.
   * @param array $params array which contains the argument to replace ?.
   * @param boolean $debug defaults to false, set to true to print out the sql query before executing it.
   * @return boolean returns TRUE on success or FALSE on failure. 
   */
  public function ExecuteQuery($query, $params = array(), $debug=false) {

    self::$queries[] = $query; 
    self::$params[]  = $params; 
    self::$numQueries++;

    if($debug) {
      echo "<p>Query = <br/><pre>{$query}</pre></p><p>Num query = " . self::$numQueries . "</p><p><pre>".print_r($params, 1)."</pre></p>";
    }

    $this->stmt = $this->db->prepare($query);
    return $this->stmt->execute($params);
  }
```

Nu går det att [uppdatera detaljer om en film i mitt exempel](kod-exempel/gor-din-egen-filmdatabas/movie_edit.php?id=2).



Skapa ny film {#insert}
-----------------------------------------------------------------------------------------------

Jag vill ha möjlighet att skapa nya filmer. Till det så behövs ytterligare ett formulär. Så här kan det se ut.

**Formulär för att lägga till film.**

[FIGURE src=/image/snapshot/Skapa_ny_film___Min_Filmdatabas.jpg?w=w1&q=60 caption="Formulär för att skapa ny film."]

Till detta behövs ett enkelt formulär.

**Formulär för att skapa ny film.**

```html
<form method=post>
  <fieldset>
  <legend>Skapa ny film</legend>
  <p><label>Titel:<br/><input type='text' name='title'/></label></p>
  <p><input type='submit' name='create' value='Skapa'/></p>
  </fieldset>
</form>
```

Sedan behövs en kontroll för att hantera om formuläret är postat. Om så är fallet så lägger vi till en ny film i filmdatabasen.

**SQL-kod för att lägga till en ny film.**

```php
// Check if form was submitted
if($create) {
  $sql = 'INSERT INTO Movie (title) VALUES (?)';
  $db->ExecuteQuery($sql, array($title));
  $db->SaveDebug();
  header('Location: movie_edit.php?id=' . $db->LastInsertId());
  exit;
}
```

Som du kan se så är det två nya metoder i CDatabase som används, `SaveDebug()` samt `LastInsertId()`. Låt oss ta en titt på dem.



###Ny metod `CDatabase::LastInsertId()` {#lastinsertid}

När den nya filmen är tillagd så använder jag en ny metod som jag skrivit i klassen `CDatabase`, nämligen `LastInsertId()` som ger det id som filmen fick, det automatgenererade id:et. Detta är en bra och ofta nödvändig metod när man lägger in nya rader i databasen. När jag hämtar ut id:et så kan jag direkt dirigera sidan till uppdatera-sidan så att användaren kan fortsätta att fylla i detaljer om filmen.

Så här ser metoden ut i CDatabase. Den använder metoden [`PDO::lastInsertId()`](http://php.net/manual/en/pdo.lastinsertid.php).

**Ny metod `CDatabase::LastInsertId()`.**

```php
  /**
   * Return last insert id.
   */
  public function LastInsertId() {
    return $this->db->lastInsertid();
  }
```



Spara debugginformation i sessionen mellan sidanrop {#session}
-----------------------------------------------------------------------------------------------

Som du kunde se i exemplet ovan så användes en ny metod, `CDatabase::SaveDebug()`. Vi tittar på det sammanhang där den används.

```php
$db->ExecuteQuery($sql, array($title));
$db->SaveDebug();
header('Location: movie_edit.php?id=' . $db->LastInsertId());
```

Först exekveras en databasfråga, som vanligt lagras det undan information som sedan kan skrivas ut, men vad händer när man dirigerar sidan till en annan resultatsida med `header()`, då försvinner all information om frågan. Det är synd. 

Lösningen blir att spara undan informationen i sessionen, en mellanlagring, som ett flash-minne. Spara undan genom att anropa `SaveDebug()` och när klassen initieras i nästa sidkontroller så läses informationen in från sessionen. På det viset kan vi ha mer komplexa dirigeringar mellan sidor men ändå behålla debug-information om vad som händer med databasen.

Så här ser koden ut.

**Spara undan i sessionen med `SaveDebug()`.**

```php
  /**
   * Save debug information in session, useful as a flashmemory when redirecting to another page.
   * 
   * @param string $debug enables to save some extra debug information.
   */
  public function SaveDebug($debug=null) {
    if($debug) {
      self::$queries[] = $debug;
      self::$params[] = null;
    }

    self::$queries[] = 'Saved debuginformation to session.';
    self::$params[] = null;

    $_SESSION['CDatabase']['numQueries'] = self::$numQueries;
    $_SESSION['CDatabase']['queries']    = self::$queries;
    $_SESSION['CDatabase']['params']     = self::$params;
  }
```

Med denna metod sparas all information i sessionen. När vi sedan hämtar tillbaka informationen så görs det i konstruktorn.

**Hämta information från sessionen i konstruktorn.**

```php
    // Get debug information from session if any.
    if(isset($_SESSION['CDatabase'])) {
      self::$numQueries = $_SESSION['CDatabase']['numQueries'];
      self::$queries    = $_SESSION['CDatabase']['queries'];
      self::$params     = $_SESSION['CDatabase']['params'];
      unset($_SESSION['CDatabase']);
    }
```

Som vanligt när det gäller sessioner så när du får problem så är det bra att skriva ut innehållet i sessionen för att felsöka på det. 

Nu kan vi jobba vidare med databasen och databasklassen oavsett dirigeringar mellan sidor. Perfekt!



Radera film {#delete}
-----------------------------------------------------------------------------------------------

Det får också finnas med möjligheten att radera en film. Först en översikt av alla filmer med en knapp/länk till en ny sida där filmen kan raderas via ett formulär. Så här kan det se ut.

Först en översikt av alla filmer.

**Visa alla filmer med knapp/länk för att radera dem.**

[FIGURE src=/image/snapshot/Valj_film_att_radera___Min_Filmdatabas.jpg?w=w1&q=60 caption="Välj film att radera."]

Klickar man på en "radera-knapp" så hamnar man på en ny sida där man kan radera filmen.

**Formulär för att verkställa raderingen av film.**

[FIGURE src=/image/snapshot/Radera_film___Min_Filmdatabas.jpg?w=w1&q=60 caption="Klicka för att radera film."]

För att radera filmen i databasen så gör vi ungefär som tidigare.

Märk att vi måste radera filmens rader i tabellen Movie2Genre, innan vi raderar själva filmen. Annars får vi problem med den främmande nyckeln.

**Kod för att radera filmen.**

```php
// Check if form was submitted
$output = null;
if($delete) {

  $sql = 'DELETE FROM Movie2Genre WHERE idMovie = ?';
  $db->ExecuteQuery($sql, array($id));
  $db->SaveDebug("Det raderades " . $db->RowCount() . " rader från databasen.");

  $sql = 'DELETE FROM Movie WHERE id = ? LIMIT 1';
  $db->ExecuteQuery($sql, array($id));
  $db->SaveDebug("Det raderades " . $db->RowCount() . " rader från databasen.");

  header('Location: movie_view_delete.php');
}
```

Det som är värt att notera är användandet av `LIMIT 1` i sammanhanget. Vi vet att det är en film som skall raderas. Att sätta `LIMIT 1` gör det övertydligt men det ger oss också en säkerhet att om vi utvecklar och skriver något litet fel så kommer ändå max en rad att raderas. Utan `LIMIT 1` hade kanske alla rader i tabellen raderats. Så, se det som en liten säkerhetsåtgärd och använd det gärna både till `DELETE` och `UPDATE`. Det kan annars vara en databasprogrammerares mardröm, att oavsiktligt utföra en `DELETE` eller `UPDATE` på en hel tabell i en databas. Det kan ge många timmars extra och onödigt arbete.

Dessutom finns det en ny metod i klassen CDatabase, `RowCount()`. Det är en metod som säger hur många rader som påverkades av föregående `INSERT`, `UPDATE` eller `DELETE`. Metoden använder sig i sin tur av [`PDOStatement::rowCount`](http://www.php.net/manual/en/pdostatement.rowcount.php).

**Databasklassens metod `RowCount()` för att ge antalet påverkade rader.**

```php
  /**
   * Return rows affected of last INSERT, UPDATE, DELETE
   */
  public function RowCount() {
    return is_null($this->stmt) ? $this->stmt : $this->stmt->rowCount();
  }
```

Bra, det var alltsammans nu finns allt på plats, alla saker jag vill göra med filmdatabasen är klara.



Kombinera alla sökalternativ på en sida {#kombinera}
-----------------------------------------------------------------------------------------------

Nu har jag en hel del möjligheter för att presentera och visa min filmdatabas. Visst vore det trevligt om alla dessa möjligheter kunde samlas på en sida? Går det att slå samman alla de olika varianterna på sökning i en sida? Utan att det blir rörig kod?

Jag försöker att lösa det utan att skapa en klass eller liknande, allt in i ett skript. Det är en bra start. I alla fall är det en bra start när jag inte har någon direkt känsla för hur jag ska strukturera min kod, då brukar jag känna mig fram. Först lösa uppgiften och sedan strukturera koden, det får bli devisen.  

Kanske kan det se ut så här [när det är klart](kod-exempel/gor-din-egen-filmdatabas/movie_view.php?genre=college&hits=2&page=1&title=%25a%25&year1=1990&year2=2010&submit=S%C3%B6k)?

[FIGURE src=/image/snapshot/Visa_filmer_med_sokalternativ_kombinerade___Min_Filmdatabas.jpg?w=w1&q=60 caption="Alla sökalternativ inkluderade i en sida."]

Är det en lätt övning att kombinera alla sökalternativ i en och samma sida? Nej, egentligen inte. Det kräver att du har koll på både PHP, SQL och hur länkar och formulär fungerar. Men det är en bra övning -- att göra ett gott försök och se hur långt ens programmeringskunskaper räcker.

Jag gjorde min lösning i ett och samma skript. Det känns som man kan ha nytta av koden även i andra sammanhang, men då behöver man paketera koden bättre, till exempel i en klass. Fundera gärna på hur du borde paketera koden så att den blir lättare att återanvända.

Försök nu själv att lösa så att alla sökalternativ kombineras på en sida, efter bästa förmåga. Kommer du bara en bit framåt så räcker det. Studera min [källkod för hur jag löste det](kod-exempel/gor-din-egen-filmdatabas/source.php?path=movie_view.php#file) om du vill ha tips och ledtrådar.



Avslutningsvis {#sum}
-----------------------------------------------------------------------------------------------

Där har du grunderna i PHP PDO och MySQL och lite till. Detta är egentligen grunderna i de flesta databasdrivna webbapplikationer så desto bättre du lär dig -- och organiserar din kod, desto lättare blir det att återanvända och vidareutveckla det du nu gjort. Bygg det som moduler i ditt eget Anax så blir det enkelt att hålla ordning på.

Lycka till och fråga i forumet om du har några funderingar, kommentarer eller förbättringsförslag.



Revisionshistoria {#revision}
------------------------------

Att göra:

* Lägg till stycke om felhantering, när PDO::execute returnerar FALSE och hämta information om felet via errorCode() och errorInfo(). Skriv om hur man kan tänka när det gäller felhantering mot databasen. 

<span class='revision-history' markdown='1'>
2014-03-05 (D, mos) Gick inte radera, lade till stycke om att radera även Movie2Genre samt återställning på windows.  
2013-11-26 (C, mos) Textstycke om att fånga fel i connection med try-catch, reset.sql och smärre justeringar.  
2013-10-29 (B, mos) Problem med inloggning löses genom att speca teckenkodningen på tabellen User`.  
2013-09-03 (A, mos) Första utgåvan som en del av kursen [oophp](oophp).  
</span>
