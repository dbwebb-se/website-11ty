---
author:
    - mos
category:
    - php
    - databas
    - mysql
    - kurs oophp
revision:
    "2018-04-27": "(H, mos) Lade till en video intro."
    "2018-04-17": "(G, mos) Genomgången inför oophp-v4 och ett antal mindre uppdateringar i text och kod."
    "2017-04-11": "(F, mos) Uppdaterade koden för återställa."
    "2017-04-07": "(E, mos) Större genomarbetning inför oophp-v3, flera stycken borttagna."
    "2014-03-05": "(D, mos) Gick inte radera, lade till stycke om att radera även Movie2Genre samt återställning på windows."
    "2013-11-26": "(C, mos) Textstycke om att fånga fel i connection med try-catch, reset.sql och smärre justeringar."
    "2013-10-29": "(B, mos) Problem med inloggning löses genom att speca teckenkodningen på tabellen User."
    "2013-09-03": "(A, mos) Första utgåvan som en del av kursen oophp."
...
Kom igång med PHP PDO och MySQL (v2)
==================================

[FIGURE src=image/snapvt17/movie-paginate-sort.png?w=c5 class="right"]

Denna guide hjälper dig att komma i gång med PHP PDO och MySQL genom att bygga upp en enklare webbplats kring en filmdatabas. Stegvis skapar du ett gränssnitt som jobbar mot databasen och ställer  vanliga CRUD-relaterade frågor för utsökning av objekt, skapa nya objekt, radera objekt och uppdatera informationen om ett objekt. När du är klar kan du applicera koden för din filmdatabas mot en annan databas med annat innehåll, förfarandet är detsamma och guiden ger dig grunderna till en databasdriven webbplats, oavsett det är en filmdatabas eller webbshop.

<!--more-->

Ett bra sätt att gå igenom guiden är att läsa exemplen och sedan pröva dem själv. Skapa dina egna testprogram där du testar olika kod-konstruktioner. Du måste testa själv för att lära dig.

> **Du måste själv skriva koden, det finns inga genvägar.**

Lyssna på de felmeddelande du får. De kommer från PHP eller från MySQL och de har **alltid** rätt. Lär dig tyda dem och förstå dem, det är som att föra en dialog med programmeringsspråket.

> *Felmeddelandet har alltid rätt.*

När du felsöker PHP mot MySQL så kör du alltid SQL-frågorna i en annan klient (Workbench eller terminalklienten) och testar att de fungerar, innan du lägger in dem i PHP-koden. Det hjälper dig att avgränsa i vilket område felet finns.

Så här kan det se ut när du är klar.

[FIGURE src=image/snapvt17/movie-paginate-1.png?w=w3 caption="Första sidan visas med två träffar."]



Förkunskaper {#forkunskaper}
-------------------------------------------------------------------------------

Du behöver ha koll på generell webbutveckling med PHP och det är bra om du kan objektorienterad PHP.

Du behöver även ha koll på MySQL och det underlättar att vara bekant med PHP PDO och begrepp som CRUD.

Källkoden till artikelns exampel finns i kursrepot (oophp) under [`example/php-pdo-mysql`](https://github.com/dbwebb-se/oophp/tree/master/example/php-pdo-mysql).



Video intro {#vintro}
---------------------------------------------------------------------------

Det finns en videoserie "[Artikel: Gör filmdatabas med PHP PDO och MySQL](https://www.youtube.com/playlist?list=PLKtP9l5q3ce8IR_KuONk34FahfWDjaogD)" som ger en introduktion och översikt till artikeln.

[YOUTUBE src="N9bTtWHblsE" list="PLKtP9l5q3ce8IR_KuONk34FahfWDjaogD" width=700 caption="Mikael ger en översikt till artikeln och en snabb kom igång till exempelprogrammet."]



Om exempelkoden {#omex}
---------------------------------------------------------------------------

Det är en bra idé att ha tillgång till exemplets källkod i en texteditor vid sidan om, du vill troligen se hur de olika koddelarna hänger ihop.

Strukturen för exempelkoden ser du här.

```bash
$ tree .
.
|-- css
|   |-- style.css
|-- img
|   |-- american-pie.jpg
|   |-- from-dusk-till-dawn.jpg
|   |-- kopps.jpg
|   |-- noimage.png
|   |-- pokemon.jpg
|   |-- pulp-fiction.jpg
|-- index.php
|-- sql
|   |-- collation.sql
|   |-- setup.sql
|-- src
|   |-- Database.php
|   |-- autoload.php
|   |-- config.php
|   |-- function.php
|-- view
    |-- footer.php
    |-- header.php
    |-- movie-edit.php
    |-- movie-select.php
    |-- reset.php
    |-- search-title.php
    |-- search-year.php
    |-- select.php
    |-- show-all-paginate.php
    |-- show-all-sort.php
    |-- show-all.php

5 directories, 25 files
```

Exemplet utgår från filen `index.php` som innehåller en _frontcontroller_ och en _router_ samt renderar _vyer_. Strukturen är relativt enkel för att göra exempelkoden tydlig.

Databaskoden som går mot PDO är samlad i klassen `src/Database.php`.

Studera gärna koden i din texteditor. Du kommer behöva en databas för att det skall fungera i en webbläsare. Låt oss fixa en databas.



PHP PDO som gränssnitt mot MySQL {#granssnitt}
-------------------------------------------------------------------------------

Det finns olika sätt att via PHP koppla sig mot en MySQL-databas. Om du använder äldre webbapplikationer så används kanske gränsnitten [mysql](http://php.net/manual/en/book.mysql.php) eller [mysqli](http://php.net/manual/en/book.mysqli.php). Det är bra att vara medveten om dem, men för denna övningen har jag valt interfacet [PHP PDO](http://www.php.net/manual/en/book.pdo.php), eller PHP Data Objects som det kallas.

PHP PDO är ett nyare gränssnitt, jämfört med mysql och mysqli, och fungerar mot en mängd olika databaser. Det är alltså *ett* gränsnitt som fungerar mot flera olika databaser. Det är en klar fördel att endast behöva lära sig ett gränssnitt, oavsett vilken databas man jobbar emot, det blir lättare att anpassa koden mot andra databaser, man behöver inte lära sig ett nytt gränssnitt för varje databas. Här finns tid att spara.



En övning med PHP PDO och MySQL {#plan}
-------------------------------------------------------------------------------

Så, för att komma i gång och bekanta sig med PHP PDO behövs en liten övning. Jag tänkte att vi bygger en webbplats som skall visa min filmsamling. Jag vill visa alla filmer jag har, i en lista på webbsida. För varje film vill jag visa lite information om själva filmen. Jag vill kunna söka bland filmerna och det skall vara enkelt att navigera kring filmerna för att hitta rätt i filmsamlingen. Det skall också gå att lägga till, ta bort samt redigera informationen om en film. 

Så får det bli, det är alltså vanliga CRUD-baserade operationer. Create, Read, Update, Delete.



En databas för filmer {#db}
-------------------------------------------------------------------------------

Först skapar jag databasen via ren SQL kod i godtycklig klient.



### Skapa databasen {#createdatabase}

Jag behöver en databas för att testa. Kanske borde jag döpa den till Movie. Men, eftersom du troligen läser denna artikel som en del i en kurs, så kan vi skapa en testdatabas som vi kan ha till diverse saker.

```sql
CREATE DATABASE IF NOT EXISTS oophp;
USE oophp;
```

För att göra saker enklare så väljer jag att dessutom skapa en användare som kan använda sig av databasen, en testanvändare med ett lösenord jag kommer ihåg.

```sql
GRANT ALL ON oophp.* TO user@localhost IDENTIFIED BY "pass";
```

Så här ser det ut när jag skapar databasen och användaren.

```text
mysql> CREATE DATABASE IF NOT EXISTS oophp;
Query OK, 1 row affected, 1 warning (0.00 sec)

mysql> GRANT ALL ON oophp.* TO user@localhost IDENTIFIED BY "pass";
Query OK, 0 rows affected (0.02 sec)
```

Nu är databasen skapad och användaren `user` har tillgång med lösenordet `pass`. Användaren har fulla rättigheter mot databasen och kan koppla sig mot databasen från `localhost` (den lokala datorn).

Nu kan jag starta en klient och hoppa rätt in i databasen.

```bash
$ mysql -uuser -ppass oophp
```

Bra, då vet jag att vi alla har liknande grund för det som nu komma skall.



### Skapa och fyll tabell {#createtable}

Då tar vi och skapar en tabell till vår filmdatabas.

```sql
-- Ensure its UTF8 on the database connection
SET NAMES utf8;

--
-- Create table for my own movie database
--
DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie`
(
    `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `director` VARCHAR(100),
    `length` INT DEFAULT NULL,            -- Length in minutes
    `year` INT NOT NULL DEFAULT 1900,
    `plot` TEXT,                          -- Short intro to the movie
    `image` VARCHAR(100) DEFAULT NULL,    -- Link to an image
    `subtext` CHAR(3) DEFAULT NULL,       -- swe, fin, en, etc
    `speech` CHAR(3) DEFAULT NULL,        -- swe, fin, en, etc
    `quality` CHAR(3) DEFAULT NULL,
    `format` CHAR(3) DEFAULT NULL         -- mp4, divx, etc
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

DELETE FROM `movie`;
INSERT INTO `movie` (`title`, `year`, `image`) VALUES
    ('Pulp fiction', 1994, 'img/pulp-fiction.jpg'),
    ('American Pie', 1999, 'img/american-pie.jpg'),
    ('Pokémon The Movie 2000', 1999, 'img/pokemon.jpg'),  
    ('Kopps', 2003, 'img/kopps.jpg'),
    ('From Dusk Till Dawn', 1996, 'img/from-dusk-till-dawn.jpg')
;

SELECT * FROM `movie`;
```

Om du lägger koden ovan i en fil så kan du skapa tabellen så här via terminalen.

```bash
$ mysql -uuser -ppass oophp < sql/setup.sql
Warning: Using a password on the command line interface can be insecure.
id      title   director        length  year    plot    image   subtext speech  quality format
1       Pulp fiction    NULL    NULL    1994    NULL    img/pulp-fiction.jpg    NULL    NULL    NULL    NULL
2       American Pie    NULL    NULL    1999    NULL    img/american-pie.jpg    NULL    NULL    NULL    NULL
3       Pokémon The Movie 2000  NULL    NULL    1999    NULL    img/pokemon.jpg NULL    NULL    NULL    NULL
4       Kopps   NULL    NULL    2003    NULL    img/kopps.jpg   NULL    NULL    NULL    NULL
5       From Dusk Till Dawn     NULL    NULL    1996    NULL    img/from-dusk-till-dawn.jpg     NULL    NULL    NULL    NULL
```

Det går lika bra att skapa tabellen i MySQL Workbench.

Så där, nu har jag en databas och en tabell med lite data.

Filerna sparar jag på disk och sökvägen till dem sparar jag i databasen. Det är mest effektivt att göra så, det är onödigt att lagra bilder i databasen. Filsystemet är mer effektivt i att hantera bilderna.

```bash
$ tree img
img
|-- american-pie.jpg
|-- from-dusk-till-dawn.jpg
|-- kopps.jpg
|-- noimage.png
|-- pokemon.jpg
|-- pulp-fiction.jpg

0 directories, 6 files
```



### Kör applikationen {#movieapp}

Nu när databasen är på plats så kan jag köra min applikation genom att öppna frontkontrollern `index.php` i en webbläsare.

Resultatet kan se ut så här.

[FIGURE src=image/snapvt18/movie-database.png?w=w3 caption="En fullt fungerande filmdatabas."]

Då tittar vi hur applikationen är uppbyggd. Låt mig först visa hur jag kopplar ett PHP-skript till databasen.



Koppla ett PHP-skript till en MySQL-databas med PDO {#skript}
-------------------------------------------------------------------------------

Vi bygger upp ett skript som kopplar sig mot databasen och visar dess innhehåll i en HTML-tabell. Jag tänker skriva enklast möjliga PHP-kod, det är databasen jag vill testa, tillsammans med PHP.

En vacker dag kan jag ta och överföra principerna för denna koden till ett annat sammanhang, in i ett ramverk till exempel.



### Detaljer för koppling {#kopplaconfig}

Först måste jag skapa en koppling mot databasen. För att skapa en koppling så behöver jag detaljer för att logga in på databasservern.

Jag lägger de detaljerna i en array och sparar i filen `src/config.php`.

```php
//**
 * Details for connecting to the database.
 */
$databaseConfig = [
    "dsn"      => "mysql:host=127.0.0.1;dbname=oophp;",
    "login"    => "user",
    "password" => "pass",
    "options"  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
];
```

Jag använder de detaljer som behövs för att koppla upp sig mot databasen, server *host*, databas *dbname*, användare *login* och lösenord *password*.

Med hjälp av detaljerna ovan skapar jag ett objekt av klassen [PDO](http://www.php.net/manual/en/class.pdo.php). Det är objektet som håller kopplingen mot databasen. Kika gärna på [PDO klassens konstruktor](http://www.php.net/manual/en/pdo.construct.php) så ser du hur argumenten kan anges. 

DSN står för *[Data Source Name](http://en.wikipedia.org/wiki/Data_source_name)* och är ett generellt sätt att ange en datakälla på.

Beroende på vilken databas du kopplar upp dig till kan argumenten se lite olika ut. Det finns dokumentation om hur [olika PDO-drivers](http://www.php.net/manual/en/pdo.drivers.php) kan hanteras.

En option som jag använder är att skicka med instruktionen för att jag vill använda teckenkodningen UTF8. Det behövs för att bestämma vilken teckenkodning som skall användas på kopplingen mellan PHP och MySQL. Annars fungerar inte UTF8. Du kan läsa mer om [specialinställningar för MySQL](http://www.php.net/manual/en/ref.pdo-mysql.php) i manualen.



### Koppla upp {#kopplaupp}

Då initierar vi själva kopplingen genom att skapa ett objekt av typen PDO. Koden återfinns i metoden `connect()` i klassen `src/Database.php`.

```php
/**
 * Create a connection to the database.
 *
 * @param array $config details on how to connect.
 *
 * @return void
 *
 * @SuppressWarnings(PHPMD)
 */
public function connect($config)
{
    try {
        $this->pdo = new PDO(...array_values($config));
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (Exception $e) {
        // Rethrow to hide connection details, through the original
        // exception to view all connection details.
        //throw $e;
        throw new PDOException("Could not connect to database, hiding details.");
    }
}
```

Nu finns vår databaskoppling i `$this->pdo` inuti vår egen PDO wrapper-klass `Database`.

Om uppkopplingen går fel så kastas ett exception där felet anges. De vanligaste problemen är att man skriver in fel server, databas, användare, lösenord eller att man missat att sätta UTF8 på överföringen.

När exception kastas så visas _alla_ parametrarna i felutskrifter, även inloggningsdetaljerna som användarnamn och lösenord. Därför är det bäst att göra uppkopplingen inom ramen för en try-catch-sats så att man inte oavsiktligt riskerar att visa upp användare och lösenord för hela världen.

Om du vill visa all information om felet så kan du kasta den bortkommenterade `throw $e;`.



### En wrapper-klass över PDO {#pdowrap}

I mitt kodexempel har jag valt att implementera ett lager ovan PDO i form av klassen `Database`. Det visar sig att det kan vara en bra struktur. Klassen Database ger en möjlighet att samla bra-att-ha-metoder och göra ett API som är enkelt att använda i applikationens övriga klasser.

Men, tänk gärna kritiskt, varför inte bara använda PDO rätt in i exempelkoden?

Troligen kommer du se att koden blir snyggare, enklare och färre kodrader med en wrapper likt `Database`.

När vi i frontkontrollern `index.php` skapar ett objekt av databasen så ser det ut så här.

```php
$db = new Database();
$db->connect($databaseConfig);
```

Först skapa objektet och sedan göra kopplingen med den givna configurationen.

Vår applikation använder aldrig PDO direkt, all användning av PDO går via klassen Database.



### Hämta data från databasen {#select}

I PHP PDO använder vi [*prepared statements*](http://www.php.net/manual/en/pdo.prepared-statements.php) när vi jobbar mot databasen. Först tar man en SQL-fråga och förbereder den, sedan exekverar man själva frågan och till slut hämtar man resultatet. Så här kan det se ut när man använder PDO.

```php
$sql = "SELECT * FROM movie;";
$sth = $pdo->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();
```

Variabeln `$sth` representerar ett objekt av klassen [PDO Statement](http://www.php.net/manual/en/class.pdostatement.php). Man tar alltså en SQL-fråga och skapar ett objekt av klassen PDO Statement utifrån frågan. Sedan exekverar man med metoden `execute()` och resultatet `$res` kommer i form av en 2-dimensionell array.

I vårt exempel gör vi motsvarande i frontkontrollern `index.php` genom att använda klassen Database.

```php
$sql = "SELECT * FROM movie;";
$resultset = $db->executeFetchAll($sql);
```

Vi har alltså gjort en metod `$db->executeFetchAll($sql)` som utför PDO-sekvensen. Vi kan se hur metoden är implementerad i `src/Database.php`.

```php
/**
 * Do SELECT with optional parameters and return a resultset.
 *
 * @param string $sql   statement to execute
 * @param array  $param to match ? in statement
 *
 * @return array with resultset
 */
public function executeFetchAll($sql, $param = [])
{
    $sth = $this->execute($sql, $param);
    $res = $sth->fetchAll();
    if ($res === false) {
        $this->statementException($sth, $sql, $param);
    }
    return $res;
}
```

Det som vi gör i PDO med prepare och execute är dolt i `Database::execute()`, vi kan kika mer på det lite senare.

Vi kan se att vår wrapper Database även lägger ett lager av felhantering kring PDO. Totalt får vi mindre kod att skriva i frontkontrollern. Även om det bara handlar om ett fåtal rader så blir det viktigt i det stora hela.



### Skriv ut och debugga resultsetet {#outputres}

Du kan nu göra `var_dump()` eller `print_r()` på innehållet i `$res`. Som du kan se är det en array som i sin tur innehåller en array för varje rad i tabellen.

Så här kan resultatet se ut (jag plockade bort ett par värden för att minska utskriften).

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

Resultatarrayen innehåller alla raderna i en array och varje rad innehåller en array med kolumnerna, en variant med positionsargument 0-4 och en variant med kolumnens namn som nyckel.

Man kan alltså nå namnet på den första filmen på två olika sätt.

```php
$name = $resultset[0][1];
$name = $resultset[0]["title"];
```

Man kan delvis styra strukturen på innehållet i `$res` genom att ange vilken _fetchstyle_ som skall användas.



### Olika fetchstyles {#fetchstyle}

Det finns olika sätt att hämta informationen ur databasen, olika *fetch-styles*, du kan läsa om de olika varianterna i manualsidan för metoden [`fetch()`](http://www.php.net/manual/en/pdostatement.fetch.php). 

Jag brukar föredra att få tillbaka resultatet som ett objekt genom att använda *fetch-style* `PDO::FETCH_OBJ`. Detta är något jag kan ange varje gång jag anropar `fetchAll()` men jag väljer att sätta den som standard för alla mina anrop med hjälp av metoden [`setAttribute()`](http://www.php.net/manual/en/pdo.setattribute.php).

```php
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
```

Du kanske noterade den kodraden tidigare i metoden `Database::connect()`.

Nu ser resultatet istället ut så här, arrayen innehåller ett objekt med properties (vissa element är borttagna för att minska urskriften).

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
            [plot] => 
            [image] => img/pulp-fiction.jpg
        )

    [1] => stdClass Object
        (
            [id] => 2
            [title] => American Pie
            [director] => 
            [length] => 
            [year] => 1999
            [plot] => 
            [image] => img/american-pie.jpg
        )
```

Arrayen `$res` innehåller nu objekt.

Man kan nu nå namnet på första filmen med objektnotation.

```php
$name = $resultset[0]->title;
```

Så här kan man loopa genom resultsetet.

```php
foreach ($resultset as $row) {
    echo "Filmens titel är {$row->title}.";
}
```

Nåväl, det finns olika sätt att hämta ut resultsetet. Vilket man använder beror på vad man föredrar och hur resten av koden är skriven. Vi jobbar objektorienterat så objektstilen känns logiskt.

Nu kan jag loopa igenom resultatet och skapa en HTML-tabell för att visa upp resultatet (Show all movies).

[FIGURE src=image/snapvt17/movie-show-all.png?w=w3 caption="Innehållet i databastabellen visas i en webbsida."]

Bra, då har vi en start. Innehållet i databastabellen finns nu presenterat och tillgängligt i min webbsida.

Dessutom gjorde jag en testsida som kan vara bra vid debugging, test och lek (SELECT \*).

[FIGURE src=image/snapvt17/movie-select-all.png?w=w3 caption="Råa utskrifter av SQL-fråga och resultset."]

Testsidan skriver ut det råa innehållet i ett resultset.

Då fortsätter vi leka runt med databasen.



Återställ databasen med ett SQL-skript {#restore}
-------------------------------------------------------------------------------

För att göra det enkelt att testa, så gör jag en sida där jag kan återställa hela databasen från en SQL-fil.

Manuellt gör jag det så här, på samma sätt som när jag initierade databasen från början.

```bash
$ mysql -uuser -ppass oophp < sql/setup.sql
```

Vill jag utföra samma sak från en webbsida, säg när man trycker på en knapp, så är principen följande.

```php
$file   = "sql/setup.sql";
$mysql  = "/usr/bin/mysql";

if (isset($_POST["reset"]) || isset($_GET["reset"])) {
    $command = "$mysql -h{$host} -u{$login} -p{$password} $database < $file 2>&1";
    $output = [];
    $status = null;
    $res = exec($command, $output, $status);
    $output = "<p>The command was: <code>$command</code>.<br>The command exit status was $status."
        . "<br>The output from the command was:</p><pre>"
        . print_r($output, 1);
}
```

Här exekverar jag ett externt kommando via PHPs funktion `exec()`. Det är ett enkelt sätt att skicka en hög med SQL-frågor till databasen via en fil och terminalklienten.

I exempelkoden ligger ovan konstruktion i `view/reset.php`.

Du behöver kontrollera sökvägen till terminalklienten och ändra den för ditt eget systems förutsättningar. Använd en absolut sökväg då du inte riktigt vet vilken PATH som webbservern har tillgång till.

Det är följande rad i `view/reset.php` som anger sökvägen till terminalklienten.

```php
$mysql  = "/usr/bin/mysql";
```

Delen med `2>&1` gör så att eventuella felmeddelanden syns på en Unix-maskin. Det är ett sätt att omdirigera stderr till stdout.

[FIGURE src=image/snapvt17/movie-reset.png?w=w3 caption="Återställ databasen till sitt ursprungliga skick."]

När man testar och leker runt så är det bra att kunna rensa databasen ibland, antingen via terminalen, eller ett skript i Workbench, eller som här, via ett klick i en webbsida.

Det blev lite mycket kod i vyn denna gången. Det var egentligen inte nödvändigt, jag kunde lika gärna skapat en funktion och låtit vyn varit renare. Men jag låter det vara som det är.



Sök på delsträng i titel {#sok-titel}
-------------------------------------------------------------------------------

Jag vill kunna söka ut filmer baserat på delsträng i filmens titel. Det blir bra för att lära känna databasen och vilken typ av kod jag kan skriva för att ställa frågor.

Till att börja med så skapar jag ett sökformulär.



###Sökformulär för titel {#soktitel}

Grunden för ett sökformulär kan se ut så här.

```html
<form method="get">
    <fieldset>
    <legend>Search</legend>
    <input type="hidden" name="route" value="search-title">
    <p>
        <label>Title (use % as wildcard):
            <input type="search" name="searchTitle" value="<?= esc($searchTitle) ?>"/>
        </label>
    </p>
    <p>
        <input type="submit" name="doSearch" value="Search">
    </p>
    <p><a href="?">Show all</a></p>
    </fieldset>
</form>
```

Ovan formulär är från mitt exempelprogram `view/search-title.php` så det är anpassat till exemplet, men i grunden är det hur ett sökformulär kan se ut (Search title).

[FIGURE src=image/snapvt17/movie-search-title.png?w=w3 caption="Exempel på sökformulär för filmens titel."]

Jag väljer ett GET-formulär, som lägger alla parameterar i querysträngen. Det gör att jag kan dela själva länken till en sökning och visa kompisen exakt samma sökresultat. Det hade inte fungerat om jag använt ett POST formulär.



### Hantering av sökningen {#hanterasok}

Koden som utför själva sökningen handlar om att kontrollera om formuläret är postat och isåfall utföra en databasfråga och visa svaret.

Koden som hanterar min sökning i frontkontrollern `index.php`ser ut så här.

```php
case "search-title":
    $title = "SELECT * WHERE title";
    $view[] = "view/search-title.php";
    $view[] = "view/show-all.php";
    $searchTitle = getGet("searchTitle");
    if ($searchTitle) {
        $sql = "SELECT * FROM movie WHERE title LIKE ?;";
        $resultset = $db->executeFetchAll($sql, [$searchTitle]);
    }
    break;
```

Notera att koden bygger på strukturen som finns i exempelprogrammet där funktionen `getGet()` läser av inkommande GET-variabler och `$db->executeFetchAll()` utför själva databasfrågan.

Om formuläret är postat så kommer det att köras en SELECT mot databasen och svaret kommer att visas i en tabell som finns i den andra vyn.

Du kan se att jag använder ett `?` och lägger parametern som skall kopplas i en array via `[$searchTitle]`. Om du kikar vidare på koden bakom `$db->executeFetchAll()` och `execute()` så ser du att det är _prepared statements_ som används via `PDO::prepare` och `PDO::execute`. Det gör att jag skyddar mig mot SQL injections.



### En koll igen på executeFetchAll {#executefetchall}

Låt oss kika snabbt på `Database` och den hantering som ligger bakom `executeFetchAll()`.

```php
/**
 * Do SELECT with optional parameters and return a resultset.
 *
 * @param string $sql   statement to execute
 * @param array  $param to match ? in statement
 *
 * @return array with resultset
 */
public function executeFetchAll($sql, $param = [])
{
    $sth = $this->execute($sql, $param);
    $res = $sth->fetchAll();
    if ($res === false) {
        $this->statementException($sth, $sql, $param);
    }
    return $res;
}



/**
 * Do INSERT/UPDATE/DELETE with optional parameters.
 *
 * @param string $sql   statement to execute
 * @param array  $param to match ? in statement
 *
 * @return PDOStatement
 */
public function execute($sql, $param = [])
{
    $sth = $this->pdo->prepare($sql);
    if (!$sth) {
        $this->statementException($sth, $sql, $param);
    }

    $status = $sth->execute($param);
    if (!$status) {
        $this->statementException($sth, $sql, $param);
    }

    return $sth;
}
```

Här ser vi både `executeFetchAll()` och `execute()`. De två metoderna är ett lager ovan PDO och de tillför en felhantering.

Det är metoden `execute()` som förbereder och exekverar (prepare, execute) databasfrågan. Metoden lämpar sig för INSERT, UPDATE, DELETE där ett resultset inte returneras.

Metoden som heter `executeFetchAll()` använder sig av `execute()` och levererar ett resultset som svar på SQL-frågan. Metoden är tänkt för SELECT där ett resultset alltid returneras.

Du kan läsa om prepared statements, och fler sätt att koppla ihop parametrar med variabler, i manualen om [prepared statemements](http://www.php.net/manual/en/pdo.prepared-statements.php) eller där [PDO metoden `execute()`](http://www.php.net/manual/en/pdostatement.execute.php) beskrivs.

Så här blev mitt resultat när jag gör min sökning.

[FIGURE src=image/snapvt17/movie-search-title-res.png?w=w3 caption="Nu kan jag söka på delsträng a titel."]



XSS och Cross site scripting {#xss}
-------------------------------------------------------------------------------

Det är alltid skoj att kolla om kompisens webbplats har öppningar för XSS, där någon kan stoppa in och köra JavaScript.

> `?searchTitle=<script>alert("hej")</script>`

Eller genom att skriva in samma sak direkt i sökfältet? Trixet för att lyckas med ett XSS angrepp är att studera hur sidans källkod genereras tillsammans med det jag skickar in. Förutsatt att det finns en öppning som kodaren har missat att skydda.

[FIGURE src="image/snapvt17/movie-xss.png?w=w3" caption="Ajdå, jag behöver nog se över så att jag skyddar min sida från XSS."]

Kom ihåg att alltid kontrollera och använda [`htmlentities()`](http://php.net/manual/en/function.htmlentities.php) på information som du inte har full kontroll över och som skrivs ut i din webbsida. Detta gäller till exempel inkommande parametrar och strängar som byggs upp av dem.

Skriv aldrig ut något, i webbsidan, som kommer från en extern part. Det gäller information i såväl GET, POST som SERVER. Det är en bra grundregel.

I mitt fall löser jag det med följande kod.

```html
<label>Title (use % as wildcard):
    <input type="search" name="searchTitle" value="<?= esc($searchTitle) ?>"/>
</label>
```

Det är delen `esc($searchTitle)` där funktionen `esc()` är min egen wrapper till PHPs `htmlentities()`. Jag gjorde en wrapper för att skriva mindre kod i mina vyer.



Sök efter året då filmen skapades {#sok-ar}
-------------------------------------------------------------------------------

Jag vill kunna använda året då filmen skapades som en grund för min sökning. Ibland vill jag se alla filmer som är äldre än 1990 och ibland vill jag se de filmer som skapats under första årtiondet av tvåtusentalet (2000 - 2010). Jag gör en ny testsida (Search year) för att visa hur det kan se ut.

Tanken är något i denna stilen.

[FIGURE src=image/snapvt17/movie-search-year.png?w=w3 caption="Nu kan jag söka på filmer mellan två år."]

Formuläret ger mig två värden som kan användas för att söka ut filmer som är skapade inom en period av år.

Nu löste jag med formuläret så att man alltid skriver in två år. Så egentligen borde jag kunna räkna med att alltid få två år inskickade till mitt skript.

Men, trots det så valde jag en mer flexibel hantering i skriptet som säger att användaren egentligen kunde valt att skicka in bara det ena eller det andra året. Kanske valde jag att inte lita fullt ut på användaren av min sökmotor.

Nåväl, hanteringen av sökningen per år ser ut så här.

```php
case "search-year":
    $title = "SELECT * WHERE year";
    $view[] = "view/search-year.php";
    $view[] = "view/show-all.php";
    $year1 = getGet("year1");
    $year2 = getGet("year2");
    if ($year1 && $year2) {
        $sql = "SELECT * FROM movie WHERE year >= ? AND year <= ?;";
        $resultset = $db->executeFetchAll($sql, [$year1, $year2]);
    } elseif ($year1) {
        $sql = "SELECT * FROM movie WHERE year >= ?;";
        $resultset = $db->executeFetchAll($sql, [$year1]);
    } elseif ($year2) {
        $sql = "SELECT * FROM movie WHERE year <= ?;";
        $resultset = $db->executeFetchAll($sql, [$year2]);
    }
    break;
```

Det är liknande hantering som när man sökte på titeln. Här har jag två inkommande fält att förhålla mig till och jag valde att göra tre varianter av SQL-kod, beroende på vad mitt skript får skickat till sig. Jag hade klarat mig med första SELECT-satsen som söker på båda åren. Men, nu är mitt skript mer motståndskraftigt och kan hantera fler varianter beroende av vad användaren postar till mig.



Uppdatera en film {#update-movie}
-------------------------------------------------------------------------------

Säg att jag vill uppdatera informationen om en film, hur skulle det kunna se ut?

Först behöver jag på något sätt välja ut vilken film jag vill uppdatera, därefter behövs ett formulär för att uppdatera själva filmen och slutligen kan ändringarna sparas i databasen.



### Välj film från en lista {#select-list}

Det finns flera alternativ när man väljer ut filmen som skall redigeras. Det är lite hur man vill koppla ihop olika sidor och hur formulär och länkar skapas.

Jag funderar lite och väljer att göra ett formulär med en SELECT/OPTION som visar samtliga filmer. Jag måste välja en film för att sedan klicka på "Edit" för att komma vidare till ett formulär som visar filmens detaljer.

Här är första formuläret där jag väljer film (Select).

[FIGURE src=image/snapvt17/movie-select.png?w=w3 caption="Välj film för att redigera dess detaljer."]

Koden som hanterar det postade formuläret ser ut så här.

```php
case "movie-select":
    $movieId = getPost("movieId");
    if (getPost("doEdit") && is_numeric($movieId)) {
        header("Location: ?route=movie-edit&movieId=$movieId");
        exit;
    }

    $title = "Select a movie";
    $view[] = "view/movie-select.php";
    $sql = "SELECT id, title FROM movie;";
    $movies = $db->executeFetchAll($sql);
    break;
```

Här gör jag en extra försäkring om att inkommande id verkligen är en siffra. Det är för att skydda mig och inte ge någon möjlighet att skicka in godtycklig kod som hamnar i mitt uttryck i `header()`.

Formuläret använder POST och om knappen, som här representeras av `doEdit`, är klickad, så skickas användaren vidare till formuläret där filmen kan redigeras. Filmens id skickas med som en GET-variabel.

Om formuläret inte är postat så hämtas samtliga filmer från databasen och visas upp i formuläret med en SELECT/OPTION, se filen `view/movie-select.php`.

```php
<form method="post">
    <fieldset>
    <legend>Select Movie</legend>

    <p>
        <label>Movie:<br>
        <select name="movieId">
            <option value="">Select movie...</option>
            <?php foreach ($movies as $movie) : ?>
            <option value="<?= $movie->id ?>"><?= $movie->title ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    </p>

    <p>
        <input type="submit" name="doEdit" value="Edit">
    </p>
    <p><a href="?">Show all</a></p>
    </fieldset>
</form>
```

Notera ovan konstruktion med `foreach()` som skapar en OPTION för varje film.



### Uppdatera information om filmen {#update-details}

Då tittar vi på formuläret där vi kan uppdatera information om respektive film.

[FIGURE src=image/snapvt17/movie-update.png?w=w3  caption="Ett formulär för att redigera detaljer om en film."]

Nu är det bara att fylla i värden och klicka på "Save" för att spara.

Koden som hanterar det postade formuläret ser ut så här.

```php
case "movie-edit":
    $title = "UPDATE movie";
    $view[] = "view/movie-edit.php";

    $movieId    = getPost("movieId") ?: getGet("movieId");
    $movieTitle = getPost("movieTitle");
    $movieYear  = getPost("movieYear");
    $movieImage = getPost("movieImage");

    if (getPost("doSave")) {
        $sql = "UPDATE movie SET title = ?, year = ?, image = ? WHERE id = ?;";
        $db->execute($sql, [$movieTitle, $movieYear, $movieImage, $movieId]);
        header("Location: ?route=movie-edit&movieId=$movieId");
        exit;
    }

    $sql = "SELECT * FROM movie WHERE id = ?;";
    $movie = $db->executeFetchAll($sql, [$movieId]);
    $movie = $movie[0];
    break;
```

Första gången sidan visas så hämtas filmens id från `getPost("movieId")`, eller från `getGet("movieId")`. SELECT-satsen i slutet hämtar information om filmen som sedan presenteras i formuläret (via vyn).

När formuläret är postat hämtas all information från `getPost()` och det görs en SQL UPDATE för att spara värdena. Det följs av en `header()` som redirectar tillbaka till samma sida där informationen om filmen visas igen.

Vi ser ett self submitting formulär framför oss. Samma sida visar formuläret och samma kodstycke hanterar det postade formuläret.



Skapa en ny film {#new-movie}
-------------------------------------------------------------------------------

Låt oss nu se om vi kan vara lite kluriga och skapa en ny film genom att återanvända vårt Edit-formulär.

Jag lägger till en knapp för "Add" i vyn där vi kunde välja filmer.

[FIGURE src=image/snapvt17/movie-add.png?w=w3 caption="Nu kan man klicka för att lägga till nya filmer."]

När man klickar "Add" så händer följande kod.

```php
case "movie-select":
    // more code

    if (getPost("doAdd")) {
        $sql = "INSERT INTO movie (title, year, image) VALUES (?, ?, ?);";
        $db->execute($sql, ["A title", 2017, "img/noimage.png"]);
        $movieId = $db->lastInsertId();
        header("Location: ?route=movie-edit&movieId=$movieId");
        exit;
    }

    // more code
```

Det läggs till en ny film med standardvärden. Metoden `$db->lastInsertId()` tar reda på det id (AUTO_INCREMENT) som blev resultatet av den senaste INSERT-satsen och med hjälp av den informationen så skickas användaren vidare till formuläret där filmens detaljer kan redigeras.

Vi lyckas alltså återanvända flera befinliga delar, befintliga routes och vyer. Vi sparar lite tid.

Så här ser det ut när man klickar på "Add".

[FIGURE src=image/snapvt17/movie-update-new.png?w=w3 caption="Den nya filmen kan direkt redigeras."]

Om man klickar "Save" och sedan visar alla filmer så kan det se ut så här.

[FIGURE src=image/snapvt17/movie-add-view-all.png?w=w3 caption="Den nya filmen visas i översikten."]

Då är det lika bra vi lär oss radera en film.



Radera en ny film {#del-movie}
-------------------------------------------------------------------------------

Det känns som vi kan fotsätta en del med återanvändningen. Jag väljer att lägga en "Delete" knapp på sidan där filmer kan väljas.

[FIGURE src=image/snapvt17/movie-delete.png?w=w3 caption="Ny knapp för att radera en film."]

När man klickar på knappen händer följande kod.

```php
case "movie-select":
    $movieId = getPost("movieId");

    if (getPost("doDelete")) {
        $sql = "DELETE FROM movie WHERE id = ?;";
        $db->execute($sql, [$movieId]);
        header("Location: ?route=movie-select");
        exit;
    }

    // more code
```

Filmen raderas med en DELETE sats och användaren skickas till samma sida igen.

Nu kan vi visa, lägga till, redigera och radera filmer. Det är CRUD i form av Create, Read, Update, Delete.



Sortera filmerna på olika kolumner {#sortera}
-------------------------------------------------------------------------------

När min filmsamling blir större så behöver jag stöd för att sortera tabellen. Jag tänkte sortera per kolumn genom att klicka på kolumnrubriken.

[FIGURE src=image/snapvt17/movie-sortable-menu.png?w=w3 caption="Tabellens header skall vara klickbar för att sorteras."]

Jag behöver skapa en länk för att sortera kolumnen i stigande ordning och en länk för att sortera i sjunkande ordning.



### Sortera med GET {#sortget}

Tanken är att lägga alla parametrar som styr sorteringen i länken så att informationen nås via GET-variablerna.

Själva länken kan se ut så här.

```text
?route=show-all-sort&orderby=title&order=asc
route=show-all-sort&orderby=title&order=desc
```

Det är alltså `orderby` och `order` som styr hur sorteringen sker.



### Funktion för att skriva ut pilarna {#updown}

Eftersom varje kolumn behöver upp- och ner-pilen så väljer jag att lägga den delen av koden i en funktion.

```php
/**
 * Function to create links for sorting.
 *
 * @param string $column the name of the database column to sort by
 * @param string $route  prepend this to the anchor href
 *
 * @return string with links to order by column.
 */
function orderby($column, $route)
{
    return <<<EOD
<span class='orderby'>
<a href="{$route}orderby={$column}&order=asc">&darr;</a>
<a href="{$route}orderby={$column}&order=desc">&uarr;</a>
</span>
EOD;
}
```

Nu kan jag skapa min header till tabellen och använda funktionen för att skapa länkarna för sortering.

```php
<?php
$defaultRoute = "?route=show-all-sort&"
?>
<table>
    <tr class="first">
        <th>Rad</th>
        <th>Id <?= orderby("id", $defaultRoute) ?></th>
        <th>Bild <?= orderby("image", $defaultRoute) ?></th>
        <th>Titel <?= orderby("title", $defaultRoute) ?></th>
        <th>År <?= orderby("year", $defaultRoute) ?></th>
    </tr>
```

Resultatet kan se ut så här.

[FIGURE src=image/snapvt17/movie-sort.png?w=w3 caption="Nu kan man sortera tabellen genom att klicka på pilarna."]

Visar man upp en tabell i en webbsida så är det inte orimligt att användaren kan vilja sortera resultatet i den. Nu har vi löst det i vår filmdatabas.



###Extra koll av säkerheten {#secsort}

Om vi tittar på routens hanterare så kommer vi se att vi har ett läge där prepared statements inte kan hjälpa oss, vi riskerar att öppna upp för SQL injections. Det har med att göra hur vi skapar SQL-satsen för sorteringen.

```php
$sql = "SELECT * FROM movie ORDER BY $orderBy $order;";
```

Här ser du koden i dess sammanhang.

```php
case "show-all-sort":
    $title = "Show and sort all movies";
    $view[] = "view/show-all-sort.php";

    // Only these values are valid
    $columns = ["id", "title", "year", "image"];
    $orders = ["asc", "desc"];

    // Get settings from GET or use defaults
    $orderBy = getGet("orderby") ?: "id";
    $order = getGet("order") ?: "asc";

    // Incoming matches valid value sets
    if (!(in_array($orderBy, $columns) && in_array($order, $orders))) {
        die("Not valid input for sorting.");
    }

    $sql = "SELECT * FROM movie ORDER BY $orderBy $order;";
    $resultset = $db->executeFetchAll($sql);
    break;
```

När vi skapar SQL-satsen för SELECT så gör vi stränkonkatenering av de variabler som säger i vilken ordning som sortering skall ske.

Det är vanskligt, iallafall om vi inte har full koll på vilka värden som ligger i variablerna `$orderBy` och `$order`. Grunden för de variablerna kommer ju från GET. Men, i detta fallet så har jag lagt in arrayer med de värden som jag accepterar, och jag kollar att inkommande verkligen matchar mina accepterade värden. Här har jag mitt på det torra och klarar mig.

Har man bara full koll på vad variablerna kan innehålla för värden, då kan man hantera dem fritt.



Dela upp resultatet på flera sidor {#page}
-------------------------------------------------------------------------------

När filmsamlingen växer så blir det svårt att se alla filmer på en sida, jag behöver dela upp visningen i olika sidor, paginering. Det är relativt lätt att göra detta i SQL med konstruktionen `LIMIT` och `OFFSET`. 

I SQL-satsen nedan väljer jag att visa två rader (LIMIT 2) och börja på den tredje raden genom att hoppa över de två första träffarna (OFFSET 2). Detta skulle representera "sidan 2" i ett sökresultat som visar två träffar per sida.

```sql
SELECT * FROM movie LIMIT 2 OFFSET 2;
```

Med hjälp av denna enkla SQL-konstruktion kan vi skapa en mer komplex navigering kring filmerna. Dels kan vi bestämma hur många filmer skall visas per sida och dels kan vi navigera mellan sidorna.

Det är en del kluriga saker att lösa för en sådan här webbsida. Dels är det länkningen och dels är det att bestämma vilken information man behöver ha tillgänglig.



### Variabler som krävs för paginering {#variabler}

För det första, jag måste ha tillgång till ett par variabler.

```php
$hits // How many rows to display per page.
$page // Current page, use to calculate offset value
$max  // Max pages available: SELECT COUNT(id) AS rows FROM movie
```

En länksekvens till att visa sida 2 med 2 rader per sida kan se ut så här.

> `&page=2&hits=2`

Länken bör i sin tur resultera i en SELECT-sats enligt följande.

```php
$sql = "SELECT * FROM movie LIMIT $hits OFFSET " . (($page - 1) * $hits);
//SELECT * FROM movie LIMIT 2 OFFSET 2
```

Det var principen det.

Om vi kikar rent kodmässigt så kan routens hanterare se ut så här, lite grovt, del för del.

Först gäller det att hantera hur många filmer som skall visas per sida. Här väljer jag ett standardvärde till 4 filmer per sida och jag vill inte tillåta värden högre än 8 träffar per sida.

```php
// Get number of hits per page
$hits = getGet("hits", 4);
if (!(is_numeric($hits) && $hits > 0 && $hits <= 8)) {
    die("Not valid for hits.");
}
```

Sedan behöver jag ha koll på hur många filmer som ligger i tabellen. Det ger mig ett max värde på antalet sidor som kan visas, om jag delar det med önskat antal träffar per sida, avrundat uppåt.

```php
// Get max number of pages
$sql = "SELECT COUNT(id) AS max FROM movie;";
$max = $db->executeFetchAll($sql);
$max = ceil($max[0]->max / $hits);
```

Värdet på nuvarande sida hämtar jag och standardvärde är 1. Nu har jag tillräckligt med information för att räkna fram ett värde på OFFSET.

```php
// Get current page
$page = getGet("page", 1);
if (!(is_numeric($hits) && $page > 0 && $page <= $max)) {
    die("Not valid for page.");
}
$offset = $hits * ($page - 1);
```

Summa summarum kan jag nu komponera en SELECT-sats som ser ut så här.

```php
$sql = "SELECT * FROM movie LIMIT $hits OFFSET $offset;";
$resultset = $db->executeFetchAll($sql);
```

Nu kan jag testa att visa resultatet genom att redigera länken direkt.

Först visar jag första sidan och två träffar per sida.

> `&page=1&hits=2`

[FIGURE src=image/snapvt17/movie-paginate-1.png?w=w3 caption="Första sidan visas med två träffar."]

Nu visar jag sista sidan och två träffar per sida, men det fanns bara en träff kvar.

> `&page=3&hits=2`

[FIGURE src=image/snapvt17/movie-paginate-2.png?w=w3 caption="Sista sidan visas med och där finns bara en träff."]

Då ska vi se om vi kan lösa själva länkandet, på ett bra sätt, det kan vara lite trixigt men lösningen blir generell.



Länking genom att modifiera nuvarande querystring {#mod-qs}
------------------------------------------------------------------------------

Det behövs två "menyer" för att navigera i tabellen. En för att bestämma antalet träffar per sida och en för att bestämma vilken sida som skall visas.

Den ena menyn justerar värdet på `$hits` medans `$page` är oförändrat, den andra gör tvärtom och justerar `$page` medans `$hits` är oförändrat.

För att lyckas med detta så behöver jag lite funktioner.



###Använd nuvarande querystring som bas {#qsbas}

Det handlar om att utgå från nuvarande querystring och modifiera värdet i en viss parameter. Säg att den länken som användes för att nå sidan ser ut så här.

> `&page=1&hits=2`

Den leder till första sidan och två träffar per sida.

När jag nu skall skapa länkarna som anger hur många träffar per sida man vill ha, så måste jag behålla värdet för page och redigera värdet på hits enligt följande där hits är 2, 4 eller 8 per sida.

* 2 - `&page=1&hits=2`
* 4 - `&page=1&hits=4`
* 8 - `&page=1&hits=8`

På motsvarande sätt måste jag ändra värdet på page i de länkar som leder direkt till en sida, men behålla värdet på antalet hits. Nedan är page 1, 2 eller 3.

* 1 - `&page=1&hits=2`
* 2 - `&page=2&hits=2`
* 3 - `&page=3&hits=2`

För att göra lösningen på ett generellt sätt skapar jag en funktion `mergeQueryString()`. Funktionen utgår från nuvarande länk, querystringen, och modifierar delar av den för att skapa anpassade länkar.

```php
/**
 * Use current querystring as base, extract it to an array, merge it
 * with incoming $options and recreate the querystring using the resulting
 * array.
 *
 * @param array  $options to merge into exitins querystring
 * @param string $prepend to the resulting query string
 *
 * @return string as an url with the updated query string.
 */
function mergeQueryString($options, $prepend = "?")
{
    // Parse querystring into array
    $query = [];
    parse_str($_SERVER["QUERY_STRING"], $query);

    // Merge query string with new options
    $query = array_merge($query, $options);

    // Build and return the modified querystring as url
    return $prepend . http_build_query($query);
}
```

I mitt fall är detta en funktion jag behöver för att fortsätta och skapa länkarna i de båda navigeringsmenyerna.



###Navigeringsmeny för att välja antalet träffar {#sel-hits}

I vyn `view/show-all-paginate.php` skriver jag koden som genererar länkarna genom att använde funktionen `mergeQueryString()`.

```php
<?php
$defaultRoute = "?route=show-all-paginate&"
?>

<p>Items per page: 
    <a href="<?= mergeQueryString(["hits" => 2], $defaultRoute) ?>">2</a> |
    <a href="<?= mergeQueryString(["hits" => 4], $defaultRoute) ?>">4</a> |
    <a href="<?= mergeQueryString(["hits" => 8], $defaultRoute) ?>">8</a>
</p>
```

[FIGURE src=image/snapvt17/movie-paginate-change-page.png?w=w3 caption="Menyn för att bestämma hur många träffar som visas per sida."]

Det var första delen, principen är densamma för nästa meny.



###Navigeringemeny för sidor {#sel-page}

Även denna delen av koden lägger jag i vyn och anropar funktionen `mergeQueryString()` för att skapa länkarna.

```php
<p>
    Pages:
    <?php for ($i = 1; $i <= $max; $i++) : ?>
        <a href="<?= mergeQueryString(["hits" => $i], $defaultRoute) ?>"><?= $i ?></a> 
    <?php endfor; ?>
</p>
```

[FIGURE src=image/snapvt17/movie-paginate-pages.png?w=w3 caption="Menyn för att bestämma vilken sida som skall visas."]

Se där, nu kanske vi till och med kan kombinera detta med sorteringen.



Paginering och sortering {#pagi-sort}
-----------------------------------------

Här kan vi nu återanvända metoden `mergeQueryString()` för att även hantera länkarna för sorteringen. Först uppdaterar vi vyn `view/show-all-paginate.php` och förbereder för en ny funktion `orderby2()`.

```php
<table>
    <tr class="first">
        <th>Rad</th>
        <th>Id <?= orderby2("id", $defaultRoute) ?></th>
        <th>Bild <?= orderby2("image", $defaultRoute) ?></th>
        <th>Titel <?= orderby2("title", $defaultRoute) ?></th>
        <th>År <?= orderby2("year", $defaultRoute) ?></th>
    </tr>
```

Du ser att jag anropar en ny funktion i `orderby2()` vilken är min uppdaterade variant som använder sig av `mergeQueryString()`.

Så här ser `orderby2()` ut.

```php
/**
 * Function to create links for sorting and keeping the original querystring.
 *
 * @param string $column the name of the database column to sort by
 * @param string $route  prepend this to the anchor href
 *
 * @return string with links to order by column.
 */
function orderby2($column, $route)
{
    $asc = mergeQueryString(["orderby" => $column, "order" => "asc"], $route);
    $desc = mergeQueryString(["orderby" => $column, "order" => "desc"], $route);
    
    return <<<EOD
<span class="orderby">
<a href="$asc">&darr;</a>
<a href="$desc">&uarr;</a>
</span>
EOD;
}
```

Den fungerar precis som tidigare, enda skillnaden är att den nu använder sig av `mergeQueryString()` för att skapa länkarna.

[FIGURE src=image/snapvt17/movie-paginate-sort.png?w=w3 caption="Nu kan man även sortera, samtidigt med paginering och antal träffar."]

Det känns som vi kan nöja oss nu, vi hann med en hel del.



Avslutningsvis {#sum}
-------------------------------------------------------------------------------

Nu har du grunderna i PHP PDO och MySQL och du har sett hur det tillsammans med lite sedvanlig PHP-programmering kan bygga en konstruktion som är vanlig i webbplatser som vill visa upp ett större resultset.

Du såg även hur en administrativ del kan byggas via ett CRUD-liknande gränssnitt.

Detta är grunderna i de flesta databasdrivna webbapplikationer så desto bättre du lär dig att organisera din kod, desto lättare blir det att återanvända och vidareutveckla det du nu gjort.

Det finns en [forumtråd](t/6411) där du kan ställa frågor eller komma med tips.
