---
author: mos
category:
    - sql
    - sqlite
    - php pdo
revision:
    "2021-10-03": "(D, mos) Omskriven (v2) med ny kod och nya kodexempel inför webtec ht21 samt använder ny databas."
    "2018-09-24": "(C, mos) Genomgång efter ny desktopapplikation av SQLite."
    "2015-10-13": "(B, mos) Stava rätt på filnamn till databasen."
    "2015-06-10": "(A, mos) Första utgåvan för htmlphp version 2 av kursen."
...
Kom igång med SQLite och PHP PDO (v2)
==================================

[FIGURE src=image/webtec/pdo/search-result.png?w=c5&a=0,50,50,0 class="right" caption="PHP PDO och SQLite."]

Att bygga webbplatser innebär ofta kopplingar mot databaser och när det gäller PHP så är det numer gränssnittet PDO som är det som främst används. Detta är en guide för att stegvis komma igång med PHP PDO tillsammans med databasen SQLite.

Guiden hanterar grunderna i hur du använder PHP PDO för att koppla upp dig mot en SQLite-databas. Därefter visas de vanligaste CRUD (Create, Read, Update, Delete) operationerna som du behöver för att skapa en databasdriven webbapplikation med SQLite och PHP PDO.

<!--more-->

Bästa sättet att gå igenom guiden är att genomföra varje övning på egen hand. Gör precis som jag gjort, fast på egen hand. Kopiera eller skriv om kodexemplen, det viktiga är att du återskapar koden i din egna miljö. Läsa är bra men man måste göra själv, "kan själv", för att lära sig.

<!--
Artikeln är stor, eventuellt dela i två delar så den blir enklare att hantera. Första delen kan sluta vid search och andra delen kan fokusera på CRUD. Troligen blir det två bättre artiklar än en stor.

I CRUD kan vi ha koll på om execute gick bra eller inte.

Vi bör även ha koll på felmeddelanden och debugDumpParams() som hjälp till felsökning.
-->



Förkunskaper {#for}
--------------------------------------

Du bör ha förkunskaper om databaser och specifikt SQLite motsvarande de som hanteras i guiden "[Kom igång med SQL och databasen SQLite med terminalklienten sqlite3](kunskap/kom-igang-med-sql-och-databasen-sqlite-med-terminalklienten-sqlite3)".



Exempelkod {#exempelkod}
--------------------------------------

Denna artikel har exempelkod i kursrepot för webtec under [`example/pdo`](https://github.com/dbwebb-se/webtec/tree/main/example/pdo). Men skriv helst din egna kod när du jobbar igenom artikeln. Det brukar löna sig i längden.

Förslagsvis kan du göra en ny katalog under ditt kursrepo i `me/pdo` och spara all kod du skriver där. I resten av artikeln förutsätts att du har en sådan katalog.

Du kan skriva koden som webbsidor, eller i din terminalklient. Båda fungerar men artikeln kommer använda webbsidor.



Kom igång {#komigang}
--------------------------------------

För att vi skall ha en databas att jobba med i artikeln så använder vi en som ligger i kursrepot under [`example/database`](https://github.com/dbwebb-se/webtec/tree/main/example/database). Du kan läsa information om den databasen i README.md.

Du kan kopiera databasen så här.

```text
# Stå i rooten av kursrepot
install -d me/pdo/db
cp -i example/database/db.sqlite me/pdo/db/
```

Så här ser det ut när du är redo.

```text
$ tree me/pdo
me/pdo
└── db
    └── db.sqlite

1 directory, 1 file
```



Om PHP PDO och SQLite {#om}
--------------------------------------

Via PHP kan man komma åt informationen i en SQLite-databas. Det finns olika PHP-interface för att jobba mot SQLite, det finns [sqlite](http://php.net/manual/en/book.sqlite.php), [sqlite3](http://php.net/manual/en/book.sqlite3.php) eller [pdo-sqlite](http://php.net/manual/en/ref.pdo-sqlite.php).

Vi kommer att använda interfacet PDO för att jobba mot SQLite. Databasen SQLite vi använder är i version 3.

Läs den korta [introduktionen om PHP PDO](http://php.net/manual/en/intro.pdo.php).

PHP Data Objects (PDO) är ett generiskt gränssnitt för att jobba mot olika underliggande databaser. Det ger ett gemensamt gränssnitt, oavsett vilken databas man använder. PDO stödjer även databaser som MySQL, PostgreSQL och Microsoft SQL Server.

En PDO driver krävs för att PDO ska kunna prata med den valda databasen. En PDO driver sköter den specifika kommunikationen mellan PDO och databasen. I manualen finns en [lista över de PDO driver som finns](http://php.net/manual/en/pdo.drivers.php).



Finns PDO och PDO SQLite installerat? {#install}
--------------------------------------

Börja med en liten terminalklient?

Med PHP-kod kan du kontrollera om din PHP-installation har stöd för PDO och SQLite.

Lägg följande kod i en PHP-fil `status.php` och kör den på din webbserver för att se om det finns stöd för PDO och SQLite.

```php
if (class_exists('PDO')) {
    echo "<p>PDO exists and the following PDO drivers are loaded.<pre>";
    print_r(PDO::getAvailableDrivers());
}

if (in_array("sqlite", PDO::getAvailableDrivers())) {
    echo "<p style='color:green'>sqlite PDO driver IS enabled";
} else {
    echo "<p style='color:red'>sqlite PDO driver IS NOT enabled";
}
```

Så här kan det se ut när skriptet säger att PHP-installationen har stöd för PDO och SQLite.

[FIGURE src=image/webtec/pdo/pdo-sqlite-exists.png?w=w3 caption="Installationen har stöd för PHP PDO och PDO extension för SQLite finns installerad."]

Du kan testköra skriptet på [studentservern](http://www.student.bth.se/~mosstud/repo/htmlphp/example/pdo-sqlite/check-if-available.php). Det kan se ut ungefär så här.

[FIGURE src=image/snapvt15/pdo-sqlite-studserver.png?w=w3 caption="PDO och SQLite finns på studentservern."]

Använd nu ovanstående PHP-kod för att kontrollera att PHP PDO och SQLite är installerat på din egen maskin.



Koppla ett PHP-skript till en SQLite-databas med PDO {#connect}
--------------------------------------

Vi gör ett minsta möjliga skript som kopplar sig mot en SQLite databas via PHP PDO. Följande skript döper jag till `connect.php`.

```php
// Create a DSN for the database using its filename
$fileName = "db/db.sqlite";
$dsn = "sqlite:$fileName";

// Open the database file and set some attributes on interface
// and catch the exception if it fails.
try {
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Failed to connect to the database using DSN:<br>'$dsn'<br>";
    throw $e;
}

// Print out the success
echo "<p>The database at '$dsn' is now connected.<p>Dumping the database connection:<pre>";
var_dump($db);
```

Det bör se ut ungefär så här när du kör skriptet.

[FIGURE src=image/webtec/pdo/pdo-connect.png?w=w3 capition="Det gick bra att koppla sig mot databasen."]

Databasfilen ligger i underkatalogen `db` och sökvägen dit är alltså `db/db.sqlite`.

En DSN är en sträng som innehåller informationen för att koppla dig till databasen. En DSN ser olika ut för varje databas. I vårt fall består den av strängen `sqlite:` följt av filens sökväg.

Du kan läsa lite om DSN i metoden för att koppla upp sig mot databasen, [PDO::__construct()](http://php.net/manual/en/pdo.construct.php), kika under stycket om *Parameters*. Du kan också kort [läsa om DSN på Wikipedia](https://en.wikipedia.org/wiki/Data_source_name).



Felmeddelande om PDO inte har skrivrättigheter i katalogen {#err-open}
--------------------------------------

Om du skriver fel sökväg till databasen, eller om databasfilen inte finns, så försöker PDO att skapa databasfilen. För att lyckas med det så behöver PDO ha skrivrättigheter i den katalogen där databasfilen skall ligga.

I vårt exempel så har vi redan databasfilen så det bör inte bli ett problem.

Men, om vi till exempel stavar fel på databasfilen eller dess sökväg så kan det se ut så här.

> *"Fatal error: Uncaught exception 'PDOException' with message 'SQLSTATE[HY000] [14] unable to open database file' in /home/mos/git/htmlphp/example/pdo-sqlite/connect.php on line 8"*

[FIGURE src=image/snapvt15/pdo-connect-fail.png?w=w3 caption="Misslyckades med att koppla sig, eller skapa den felstavade databasen."]

Det som skrivs ut är dels vår egen felsökningstext som visar sökvägen/dsn och dels felmeddelandet från PHP om det fel som kastades.

Kom ihåg att det alltid är det översta felet som är intressant, resten av felen är ofta följdfel och fixar man det första så kan de försvinna.

> *"Lös alltid det översta felet först och lös ett fel i taget."*

Om du vill att databasen skall skapas automatiskt så behöver du ge användaren som kör webbservern skrivrättigheter till katalogen. Ett enkelt sätt att göra det är kommandot `chmod`.

```bash
chmod 777 db
```

Notera att ovan problem med rättigheter inte nödvändigtvis inträffar på Windows. Men på Mac OS och Unix-baserade operativsystem så är det desto viktigare. Studentservern kör på Debian/Linux så där är det väldigt viktigt att ha koll på rättigheterna.

När du gör `dbwebb publish` mot studentservern så sätts automatiskt rättighteterna på kataloger som heter `db` och filer som slutar på `.sqlite`. Du bör alltså inte få problem med rättigheter när du publicerar mot studentservern.



Skapa en funktion för att koppla mot databasen {#connect-func}
--------------------------------------

Att koppla sig mot databasen gör man varje gång man vill göra något med databasen. Koden för att koppla sig är alltså bra om man lägger i en funktion, ungefär så här.

```php
/**
 * Exception handler to print out a HTML message with details on the exception,
 * useful to deal with uncaught exceptions.
 *
 * @return object as the database connection object.
 */
function connectToDatabase(string $dsn): object
{
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>'$dsn'<br>";
        throw $e;
    }

    return $db;
}
```

Nu kan vi uppdatera vårt skript så att det använder funktionen. Koden för att inkludera funktionen är inte med, den behöver du lägga till.

```php
// Connect to the database
$dsn = "sqlite:db/db.sqlite";
$db = connectToDatabase($dsn);

// Print out the success
echo "<p>The database at '$dsn' is now connected.<p>Dumping the database connection:<pre>";
var_dump($db);
```



Ställ en fråga till databasen {#stall-fraga}
--------------------------------------

Vi gör nu en databasfråga som vi skall ställa mot databasen. Låt oss ta följande SELECT-sats.

```sql
SELECT
    rowid,
    *
FROM namnlista
WHERE
    namn = 'Mikael'
    OR namn = 'Magnus'
    OR namn = 'Carina'
;
```

Om vi kör den i terminalklienten `sqlite3` kan resutlatet se ut så här.

```text
sqlite> SELECT
   ...>     rowid,
   ...>     *
   ...> FROM namnlista
   ...> WHERE
   ...>     namn = 'Mikael'
   ...>     OR namn = 'Magnus'
   ...>     OR namn = 'Carina'
   ...> ;
rowid       namn        datum       namnlangd
----------  ----------  ----------  ----------
464         Carina      7/5         Ja
876         Magnus      19/8        Ja
1004        Mikael      29/9        Ja
```

Då skall vi köra samma SELECT sats i ett PHP skript med PDO.

Vi behöver göra följande för att det skall fungera.

1. Skapa en DSN.
1. Koppla oss mot databasen via dess DSN.
1. Skapa SQL-satsen.
1. Förbereda SQL-satsen så att den kan köras.
1. Kör SQL-satsen mot databasen.
1. Hämta resultatet, kallas också "resultset", från databasfrågan.
1. Visa innhåller i resultsetet.

Så här kan det översättas i ren kod i skriptet `select.php`. Observera att skriptet förutsätter att du har en aktiv databaskoppling i variabeln `$db`, det är kod du måste lägga till själv.

```php
// Prepare and execute the SQL statement
$sql = <<<EOD
SELECT
    rowid,
    *
FROM namnlista
WHERE
    namn = 'Mikael'
    OR namn = 'Magnus'
    OR namn = 'Carina'
;
EOD;

// Prepare the SQL statement so it can be executed
$stmt = $db->prepare($sql);

// Execute the SQL statement towards the database
$stmt->execute();

// Get the resultset and print it out
$res = $stmt->fetchAll();
echo "<pre>", print_r($res, true), "</pre>";
```

Det kan se ut så här när du kör skriptet.

[FIGURE src=image/webtec/pdo/pdo-select.png?w=w3 capition="Utskrift av resultatet från databasfrågan."]

Svaret kommer som en array, där varje rad i arrayen är en rad från databasen. Det är en array som innehåller arrayer. Man kallar det även för en tvådimensionell array. Du kan använda en `foreach`för att loopa igenom ditt resultset och skriva ut det på ett lite snyggare sätt.



Prepared statements och SQL injections {#sqlinjections}
--------------------------------------

Ovan använde vi något som kallas "Prepared statements" som är en feature som stöds av många databaser. Prepared statements har ett säkert sätt att hantera argument, ett sätt som undviker säkerhetshål som SQL injections.

Läs snabbt det inledande stycket om [prepared statements och studera översiktligt exemplen](http://www.php.net/manual/en/pdo.prepared-statements.php). Där får du en kort introduktion till hur prepared statements fungerar.

Låt oss säga några ord om säkerhetshål och SQL injections innan vi fortsätter.

[FIGURE src=http://imgs.xkcd.com/comics/exploits_of_a_mom.png caption="Strip om SQL injections från [http://xkcd.com/327/](http://xkcd.com/327/)."]

SQL injections är ett sätt för en "cracker" att "bryta sig in" i en webbapplikation genom att via URL:en, eller formulär, modifiera SQL-satserna som körs av webbapplikationen. Ett sådant säkerhetshål kan ge en inbrytare tillgång till alla användare och lösenord i en databas.

Läs lite snabbt (och översiktligt) om [SQL injections på Wikipedia](http://en.wikipedia.org/wiki/SQL_injection).

Låt oss kika på hur vi kan uppdatera vår SQL fråga ovan för att den ska bli helt korrekt som ett prepared statement med argument.



Prepared statement med argument {#prep-argument}
--------------------------------------

När man använder prepared statements använder man `?` för att ersätta det som vi kan kalla "argument" i vår SELECT fråga. Titta på följande exempel och jämför det med din tidigare kod.

```php
// Prepare and execute the SQL statement
$sql = <<<EOD
SELECT
    rowid,
    *
FROM namnlista
WHERE
    namn = ?
    OR namn = ?
    OR namn = ?
;
EOD;

// Prepare the SQL statement so it can be executed
$stmt = $db->prepare($sql);

// Execute the SQL statement towards the database
$args = ['Mikael', 'Magnus', 'Carina'];
$stmt->execute($args);

// Get the resultset and print it out
$res = $stmt->fetchAll();
echo "<pre>", print_r($res, true), "</pre>";
```

Den viktiga delen är följande.

```text
    namn = ?
    OR namn = ?
    OR namn = ?
```

Dessa tre frågetecken är placeholders för argumenten som skickas till execute satsen.

```php
// Execute the SQL statement towards the database
$args = ['Mikael', 'Magnus', 'Carina'];
$stmt->execute($args);
```

När frågan körs kommer varje frågetecken att ersättas med respektive argument, i den ordning de kommer. Internt kommer då PDO att kolla vilken datatyp det är och även escapa eventuellt farliga tecken som skulle kunna öppna upp för SQL injections. Gör man så här är man alltså säker mot SQL injections när det gäller denna biten.



Visa innehållet i en tabell {#tabell}
--------------------------------------

Om vi vill ha en snyggare utskrift av vårt resultset så kan vi skriva ut det i en tabell med en foreach sats. Låt oss kika på hur det kan se ut om vi lägger följande kod i filen `table.sql`. Vi förutsätter att du har exekverat en fråga så att det finns ett resultset att hämta.

```html
// Get the resultset and print it out
$res = $stmt->fetchAll();

?><style>
table, th, td {
    border: 1px solid black;
}
</style>
<table>
    <tr>
        <th>Id</th>
        <th>Namn</th>
        <th>Datum</th>
        <th>Namnlängd</th>
    </tr>

<?php foreach ($res as $row) : ?>
    <tr>
        <td><?= $row['rowid'] ?></td>
        <td><?= $row['namn'] ?></td>
        <td><?= $row['datum'] ?></td>
        <td><?= $row['namnlangd'] ?></td>
    </tr>
<?php endforeach ?>
```

Det kan se ut så här om du kör skriptet.

[FIGURE src=image/webtec/pdo/select-table.png?w=w3 caption="Resultatet från SELECT utskrivet i en HTML-tabell."]

Då har vi koll på hur man ställer en databasfråga med SELECT och hämtar ett resultset och skriver ut det.



Gör ett GET sökformulär med SELECT {#select-form}
--------------------------------------

Låt oss se hur vi kan kombinera ett formulär med en databasfråga och skapa ett sökformulär som låter användaren ställa frågor till databasen. Koden jag skriver sparar jag i `search.php`.

Formulärets struktur är ett "Self submitting form", det submittas alltså till sig själv. Samma skript hanterar två lägen (state), antingen där man besöker sidan utan att söka, och man besöker sidan efter att ha klickat på "Sök"-knappen.

Så här kan det se ut när det är klart.

Först ett formulär där vi skriver in en söksträng. Likt SQL så använder vi här `%` som *wildcard* för att söka på delsträngar.

Eftersom formuläret inte är submittat så visas inget resultset, eller ett tomt resultset.

[FIGURE src="image/webtec/pdo/search.png?w=w3" caption="Skriv in en söksträng, med eller utan `%`."]

Sedan klickar vi på "Sök"-knappen och resultatet visar sig.

[FIGURE src="image/webtec/pdo/search-result.png?w=w3" caption="Resultatet från sökningen presenteras."]



### Skapa en mental bild av flödet {#mental-search}

Nu blandar vi in formulärhantering med en databasfråga. Nu gäller det att ha den mentala bilden av hur skriptet exekveras. Var skall koden för formuläret vara och var kollar vi om formuläret är postat och var skriver vi databasfrågan? Här är ett par viktiga saker i hur exekveringen av PHP-skriptet sker. Övning ger färdighet så bygg upp din mentala bild av hur exekveringen sker.

Så här kan man bygga upp sin mentala bild av flödet.

1. Läs av GET arrayen och spara undan i variabler, detta visar om formuläret är submittat eller ej.
1. Visa sidan, med sökformuläret, detta sker alltid.
1. Kontrollera nu om formuläret var submittat.
    1. Om nej, gå vidare och avsluta skriptet.
    1. Annars, öppna databasen och ställ en fråga mot den, hämta resultsetet.
1. Skriv ut resultsetet. Om du har ett tomt resultset så kan du välja om det skrivs ut som tomt eller inte alls.

Sen behöver man översätta den skissen till kod.



### Kodens flöde bit för bit {#mental-search-kod}

Så här ser koden ut, om vi tar den bit för bit.

Vi börjar med att läsa av GET arrayen för att hämta värden från det submittade formuläret. Om formuläret inte är submittat så får de defaultvärden.

Därefter inkluderas en vy som visar upp sökformuläret. PHP/HTML koden för att visa upp formuläret har jag lagt i en separat fil.

```php
// Get details if the form is posted or not
$doit  = $_GET['doit'] ?? null;
$query = $_GET['query'] ?? null;

// Include the view that shows the search form
require "view/searchForm.php";
```

Sedan kontrollerar vi om formuläret är postat och isåfall gör vi databasfrågan för att hämta hem resultsetet.

Om formuläret inte är postat så exkluderas all databaskod i if-satsen, då finns ingen anledning att skapa en koppling till databasen.

```php
// Do the search query, if the form is submitted or if there is a query
if ($doit || $query) {

    // Connect to the database
    // Prepare and execute the SQL statement
    // Prepare the SQL statement so it can be executed
    // Execute the SQL statement towards the database
    // Get the resultset
}

// Print out the resultset
require "view/table.php";
```

Den databaskoden som inuti if-satsen utför frågan och hämtar resultsetet kan se ut så här.

```php
// Do the search query, if the form is submitted or if there is a query
if ($doit || $query) {

    // Connect to the database
    $dsn = "sqlite:db/db.sqlite";
    $db = connectToDatabase($dsn);

    // Prepare and execute the SQL statement
    $sql = <<<EOD
    SELECT
        rowid,
        *
    FROM namnlista
    WHERE
        namn LIKE ?
        OR datum LIKE ?
        OR namnlangd LIKE ?
        OR rowid = ?
    ;
    EOD;

    // Prepare the SQL statement so it can be executed
    $stmt = $db->prepare($sql);

    // Execute the SQL statement towards the database
    $args = [$query, $query, $query, $query];
    $stmt->execute($args);

    // Get the resultset
    $res = $stmt->fetchAll();
}
```

Det som är lite speciellt med SELECT-satsen är hur man använder den postade söksträngen för att jämföra mot flera olika kolumner i tabellen. I vårt fall har vi tre strängar och en integer och PDO löser så att koden bakom jämför med rätt typer. Vi måste bara ha koll på att LIKE fungerar med strängkolumner och inte med siffror.



### Felmeddelande om antalet parametrar är fler än frågetecknen {#err-param}

Det är vikigt att antalet frågetecken i SQL-frågan matchar antalet parametrar i arrayen. Annars kan du se följande felmeddelande.

> *Fatal error: Uncaught exception 'PDOException' with message 'SQLSTATE[HY000]: General error: 25 bind or column index out of range' in /home/mos/git/htmlphp/example/pdo-sqlite/select-form.php on line 43*

Om felmeddelandet dyker upp så vet du nu att du måste kontrollräkna antalet parametrar mot antalet frågetecken. Du har skickat in fler parametrar än du har frågetecken.

Var uppmärksam på att om du skickar in för få parametrar så ger det inget felmedelande, men ditt resultset kan ju bli inkorrekt jämfört med det som du förväntade dig.



Vanliga felmeddelanden med PHP PDO och SQLite {#fel}
--------------------------------------

Här följer fler vanliga felmeddelande som kan förekomma när du jobbar med PHP PDO och SQLite. Tillsammans med felmeddelandet finner du tips på hur du kan åtgärda felen.

*Felmeddelande "unable to open database file"*

> *Fatal error: Uncaught exception 'PDOException' with message 'SQLSTATE[HY000] [14] unable to open database file' in /home/mos/git/htmlphp/example/pdo-sqlite/init.php on line 14*

Lösning: Katalogen som databas-filen skall ligga i är skrivskyddad och databasen kan inte skapas. Ändra rättigheterna på katalogen till 777.

Lösning: Dubbelkolla att du har rätt sökväg till databasfilen så att den ligger i den katalogen du förväntar dig.

*Felmeddelande "write a readonly database"*

> *Fatal error: Uncaught exception 'PDOException' with message 'SQLSTATE[HY000]: General error: 8 attempt to write a readonly database' in /home/mos/git/htmlphp/example/pdo-sqlite/init.php on line 29*

Lösning: Databas-filen är skrivskyddad. Ändra rättigheterna till 666 så det går att skriva till filen.



Skapa nya rader i tabellen med INSERT {#insert}
--------------------------------------

I en webbapplikation är det ett vanligt förfarande att användaren skall kunna lägga till nya rader i databasen. Låt oss göra ett exempel där användaren fyller i ett formulär för att lägga till en ny rad i tabellen.

När man ändrar i databasen så använder man alltid POST formulär. Det gör att uppdateringen blir säkrare och man kan inte av misstag uppdatera databasen två gånger med samma data. Vi använder en sida för att visa formuläret och en sida för att processa det submittade formuläret.

Exempelkoden finns i `insert.php` och `insert-process.php`.

Flödet är så här.

1. Visa formuläret där användaren kan fylla i värden.
1. Användaren trycker submit knappen och formuläret postas till processingsidan.
1. I processingsidan sker följande:
    1. Ta hand om det inkommande submittade formuläret i arrayen POST.
    1. Avbryt om någon accessat sidan utan att posta formuläret (felhantering).
    1. Koppla till databasen och utför en INSERT och använd det postade formuläret som data.
    1. Gör en redirect med `header()` till en resultatsida.

Du kan debugga din processingsida genom att kommentera bort din redirect. Då kan du skriva ut information och felsöka.



### Formulär för att mata in data {#form-insert}

Till att börja med så skapar vi ett vanligt post formulär med fält som matchar det vi vill mata in i en ny rad i databasen.

Det kan se ut så här.

[FIGURE src="image/webtec/pdo/insert-form.png?w=w3" caption="Ett formulär för att fylla i kolumnernas värde."]

Koden i `insert.php` kan enkelt se ut så här då vi har lagt all formulär kod i en separat fil.

```php
// Include the view that shows the form
require "view/insertForm.php";
```

Om man är osäker på hur ett POST formulär skapas så är all koden för vyn `view/insertForm.php` här. Den innehåller ingen PHP-kod i detta fallet, bara HTML.

```html
<h1>Insert new row to the database</h1>

<form method="post" action="insert-process.php">
    <fieldset>
        <legend>Insert new row</legend>

        <p>
            <label>Name:
                <input type="text" name="name" placeholder="The name">
            </label>
        </p>

        <p>
            <label>Date:
                <input type="text" name="date" placeholder="The date">
            </label>
        </p>

        <p>
            <label>Namnlängd:
                <input type="checkbox" name="nameLength" value="Ja" placeholder="The name">
            </label>
        </p>

        <p>
            <input type="reset" value="Reset">
            <input type="submit" name="doit" value="Add">
        </p>
    </fieldset>
</form>
```

Då fyller vi i formuläret och postar det.



### Processingsida för insert {#process-insert}

När formuläret är ifyllt kan det se ut så här. Nu är formuläret redo att postas till processingsidan.

[FIGURE src="image/webtec/pdo/insert-filled.png?w=w3" caption="Formuläret är ifyllt med värden."]

I processingsidan tar vi hand om värdena från det postade formuläret och sparar undan i variabler.

```php
// Get details from the posted form
$doit = $_POST['doit'] ?? null;
$name = $_POST['name'] ?? null;
$date = $_POST['date'] ?? null;
$nameLength = $_POST['nameLength'] ?? "Nej";

if (!$doit) {
    die("You have accessed this page without a posted form.");
}

// Connect to the database
// Create the SQL statement
// Prepare the SQL statement so it can be executed
// Execute the SQL statement towards the database

// Redirect to a result page
```

Nu kan vi koppla till databasen och göra INSERT på den nya raden. Låt oss kika på den delen av koden.

```php
// Connect to the database
$dsn = "sqlite:db/db.sqlite";
$db = connectToDatabase($dsn);

// Create the SQL statement
$sql = <<<EOD
INSERT INTO namnlista
    (namn, datum, namnlangd)
VALUES
    (?, ?, ?)
;
EOD;

// Prepare the SQL statement so it can be executed
$stmt = $db->prepare($sql);

// Execute the SQL statement towards the database
$args = [$name, $date, $nameLength];
$stmt->execute($args);
```

Vi förbereder en INSERT sats med parametrar och sedan exekverar vi den. En INSERT ger inget resultset tillbaka. Man förutsätter att det gick bra så länge man inte får ett felmedelande.

När allt är klart kan processingsidan göra en redirect till en resultatsida. Här används `search.php` som resultatsidan och det nya namnet skickas med så att det kan visas direkt. Funktionen `urlencode()` löser encodningen så att variabels värde kan användas i querysträngen, även om den innehåller udda tecken.

```php
// Redirect to a result page
header("Location: search.php?query=" . urlencode($name));
```

Nu landar vi på resultatsidan som visar att det nya namnet finns i databasen.

[FIGURE src=image/webtec/pdo/insert-result.png?w=w3 caption="Processingsidan gör redirect till en resultatsida så vi kan kontrollera att raden nu finns i databasen."]

Då kan vi lägga till nya rader i tabellen.



Visa enbart en rad {#single}
--------------------------------------

När vi gör insert så hade det känts bättre att kunna göra en redirect till en resultatsida som enbart visar den nya raden. Att återanvända search är ju en fix som fungerar. Men låt oss skapa en sida `single.php` som enbart visar en rad och löser det genom att dess id skickas in som en query parameter.

Så här är tanken att länken ser ut.

```
# Generic format
single.php?id=<id>

# Specific for a certain row
single.php?id=1385
```

Om man inte anger ett id så ger sidan ett felmeddelande, så här.

[FIGURE src=image/webtec/pdo/single-fail.png?w=w3 caption="Skriptet avslutas med ett felmeddelande när querysträngen inte innehåller rätt parametrar."]

Om man skickar in ett id så är tanken att raden visas.

[FIGURE src=image/webtec/pdo/single.png?w=w3 caption="Raden och dess kolumners värden visas."]

Flödet för hanteringen i `single.php` kan se ut så här.

```php
// Get details from the query string
// Exit the script if the id is missing
// Connect to the database
// Create the SQL statement
// Prepare the SQL statement so it can be executed
// Execute the SQL statement towards the database
// Get the resultset
// Include the view that shows the row
```

Först kollar vi om sidan är rätt anropad med rätt argument i querysträngen.

```php
// Get details from the query string
$id = $_GET['id'] ?? null;

// Exit the script if the id is missing
if (!$id) {
    die("You have accessed this page without entering an is through the query string.");
}
```

Sedan hämtar vi informationen från databasen, med hjälp av det angivna id:et.

```php
// Connect to the database
$dsn = "sqlite:db/db.sqlite";
$db = connectToDatabase($dsn);

// Create the SQL statement
$sql = <<<EOD
SELECT
    rowid,
    *
FROM namnlista
WHERE
    rowid = ?
;
EOD;

// Prepare the SQL statement so it can be executed
$stmt = $db->prepare($sql);

// Execute the SQL statement towards the database
$args = [$id];
$stmt->execute($args);

// Get the resultset
$res = $stmt->fetch();
```

Här använder vi metoden [`fetch()`](https://www.php.net/manual/en/pdostatement.fetch.php) som enbart hämtar en rad. I detta fallet har vi ju ett resultset som bara innehåller en rad och då behöver vi inte använda `fetchAll()`.

Avslutningsvis inkluderar vi den vy som skapar, eller "renderar", själva sidan.

```php
// Include the view that shows the row
require "view/single.php";
```

Själva "utskriften" av resultatet kan göras på många olika sätt, här skrivs informationen ut i ett formulär med ifyllda formulärelement. Som information kan du studera koden som hanterar utskriften.

```html
$id         = htmlentities($res['rowid'] ?? null);
$name       = htmlentities($res['namn'] ?? null);
$date       = htmlentities($res['datum'] ?? null);
$nameLength = htmlentities($res['namnlangd'] ?? null);

$checked = $nameLength === "Ja" ? 'Checked="Checked"' : null;


?><h1>Show specific row from database</h1>

<form>
    <fieldset>
        <legend>Row with id '<?= $id ?>'</legend>

        <p>
            <label>Id:
                <input type="text" name="id" value="<?= $id ?>" readonly="readonly">
            </label>
        </p>

        <p>
            <label>Name:
                <input type="text" name="name" value="<?= $name ?>" readonly="readonly">
            </label>
        </p>

        <p>
            <label>Date:
                <input type="text" name="date" value="<?= $date ?>" readonly="readonly">
            </label>
        </p>

        <p>
            <label>Namnlängd:
                <input type="checkbox" name="nameLength" value="Ja" <?= $checked ?> disabled="disabled">
            </label>
        </p>

        <p>
            <input type="reset" value="Reset">
            <input type="submit" name="doit" value="Add">
        </p>
    </fieldset>
</form>
```

Nu har vi en sida som kan visa innehållet i en rad, om man bifogar dess id.



Insert göra redirect till single {#insert-single}
--------------------------------------

Nu när vi har en sida som visar upp enbart en rad så kan vi uppdatera vår `insert-process.php` och låta den göra en redirect till `single.php?id=<id>`.

En uppdaterad `insert-process.php` skulle kunna se ut så här i slutet där redirecten sker.

```php
// Get the id of the last inserted row
$id = $db->lastInsertId();

// Redirect to a result page
//header("Location: search.php?query=" . urlencode($name));
header("Location: single.php?id=$id");
```

Vi använder den inbyggda funktionen [`lastInsertId()`](https://www.php.net/manual/en/pdo.lastinsertid.php) för att hämta det automatgenererade id som den senaste tillagda raden fick. Det använder vi sedan för att bygga en redirect till `single.php`. Vi kan vara säkra på att det är en siffra så det är inte nödvändigt att göra urlencode på det argumentet i querysträngen.

Vilken resultatsida man vill länka till kan man bestämma själv uifrån hur man tänker sig att applikationen skall fungera för användaren. Man eftersträvar ett flöde som är användarvänligt.



Utskrift i tabell länkar till single {#tabell-single}
--------------------------------------

Vi kan även uppdatera vår tabellutskrift i `search.php` så att den länkar till `single.php` för varje rad som skrivs ut i tabellen. Vi kan då skapa ett flöde att användaren söker, visar de rader som matchar, kan klicka på en specifik rad och enbart se den.

I detta fallet innehåller vårt resultset radens id så för att lösa detta behöver vi bygga en klickbar länk för varje rad. Koden nedan visar den delen i tabellutskriften.

```html
<td><?= $row['rowid'] ?></td>
<td>
    <a href="single.php?id=<?= $row['rowid'] ?>">
        <?= $row['rowid'] ?>
    </a>
</td>
```

Den övre raden visar bara id:et. Den andra raden är uppdaterad och skapar en klickar länk som leder till single-sidan.

Så här kan det se ut när det är implementerat i `table-single.php`.

[FIGURE src=image/webtec/pdo/table-link.png?w=w3 caption="Nu kan man klicka på en rad och komma till sidan där enbart den raden visas."]

Nu har vi byggstenar så att vi kan börja bygga ett flöde i vår applikation.



Uppdatera värden och rader i tabellen med UPDATE {#update}
--------------------------------------

En annan vanlig företeelse i en webbapplikation är möjligheten att uppdatera vissa värden i en viss rad. Vi gör ett nytt skript, `update.php` och `update-process.php`, som ger möjligheten att välja en viss rad och sedan spara dess värden.

En `update.php` har en liknande funktion som `single.php`. Den tar ett id i querysträngen och läser in en rad från databasen och visar i ett formulär som användaren kan redigera och posta.

Flödet i update-processen kan beskrivas så här.

1. Sök ut rader och visa dem i tabellen.
1. Klicka på update-länken till en rad, länken ser ut likt `update.php?id=42`.
1. I `update.php` visas alla värden till den rad som motsvarar id:et.
1. Användaren kan uppdatera fälten i formuläret och kan sedan submitta formuläret till en processingsida.
1. I processingsidan `update-process.php` händer följande.
    1. Ta emot det postade formuläret och spara i variabler.
    1. Skapa en koppling till databasen och förbered UPDATE-satsen.
    1. Exekvera UPDATE-satsen med värden från det postade formuläret.
    1. Gör en redirect till valfri resultatsida.

Jag börjar med att uppdatera tabellen så att den får en länk, för varje rad, till `update.php?id=<id>`. Principen är så här i `table.php`.

```html
<td>
    <a href="update.php?id=<?= $row['rowid'] ?>">
        Update
    </a>
</td>
```

Det kan se ut så här när sidan är uppdaterad.

[FIGURE src=image/webtec/pdo/table-edit.png?w=w3 caption="Nu kan man klicka på varje rad och nå en sida där man kan uppdatera värden i en rad."]

Då bygger vi sidan `update.php` och där kan vi återanvända mycket från `single.php` som har en liknande funktion.

Tanken är att sidan skall se ut så här.

[FIGURE src=image/webtec/pdo/update.png?w=w3 caption="Nu är raden i ett formulär och kan man redigera dess värden."]

Så långt allt väl, Radens id har jag dolt i formuläret som ett "hidden" formulär element, så det visas inte upp men är ändå en del av det formulär som kommer postas. Den delen i formuläret ser ut så här.

```html
<input type="hidden" name="id" value="<?= $id ?>">
```

Då skapar vi `update-process.php` vars ansvar är att ta emot det postade formuläret, spara i databasen och skicka vidare till en resultatsida.

Koden i `update-process.php` kan jämföras med koden i `insert-proces.php`, det är liknande flöde och funktion, att skapa/uppdatera en rad i databasen.

Vi kan kika på koden i den färdiga `update-process.php`, steg för steg.

Vi börjar med att ta emot det postade formuläret och sparar undan i variabler. Vi avslutar skriptet om någon accessar sidan utan att ha postat formuläret.

```php
// Get details from the posted form
$doit = $_POST['doit'] ?? null;
$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? null;
$date = $_POST['date'] ?? null;
$nameLength = $_POST['nameLength'] ?? "Nej";

if (!$doit) {
    die("You have accessed this page without a posted form.");
}
```

Nu skapar vi SQL-frågan och utför den. En UPDATE ger inget resultset så det är inget vi kan hämta.

```php
// Connect to the database
$dsn = "sqlite:db/db.sqlite";
$db = connectToDatabase($dsn);

// Create the SQL statement
$sql = <<<EOD
UPDATE namnlista SET
    namn = ?,
    datum = ?,
    namnlangd = ?
WHERE
    rowid = ?
;
EOD;

// Prepare the SQL statement so it can be executed
$stmt = $db->prepare($sql);

// Execute the SQL statement towards the database
$args = [$name, $date, $nameLength, $id];
$stmt->execute($args);
```

Notera att vi använder en WHERE-del så att det bara är den aktuella raden som uppdateras.

Då avslutar vi med en redirect och här väljer jag att göra en redirect till samma sida, då ser användaren att informationen är uppdaterad.

```php
// Redirect to a result page
header("Location: update.php?id=" . urlencode($id));
```

Man kan säga att vi bygger både funktion och flöde i våra skript. När man sedan sätter ihop allt till en applikation så kan man lägga på ytterligare möjligheter till navigering så att det blir lätt för användaren att klicka runt i applikationen.



Ta bort rader i tabellen med DELETE {#delete}
--------------------------------------

Slutligen skall vi då skapa en hantering för att ta bort en rad ur tabellen.

Vi kan använda samma princip som vi gjorde med update.

1. visa raderna i sökresultatet i tabellen.
1. Klicka på länken "Delete" som leder till `delete.php?id=<id>`.
1. Skapa ett formulär med en knapp där användaren får en fråga om raden verkligen skall raderas.
1. Klickar användaren på knappen, submittas formuläret (POST) till en processingsida `delete-process.php` som tar bort raden från databasen.
1. I processingsidan händer följande:
    1. Ta emot det postade formuläret och spara i variabler.
    1. Skapa en koppling till databasen och förbered DELETE-satsen.
    1. Exekvera DELETE-satsen med värden från det postade formuläret.
    1. Gör en redirect till valfri resultatsida.

Efter en uppdatering av `table.php` kan skriptet se ut så här när det visas.

[FIGURE src="image/webtec/pdo/search-delete.png?w=w3" caption="Välj ett namn att radera."]

Klickar vi på Delete så hamnar vi på sidan `delete.php` där vi visar information om raden som skall raderas och en knapp som kommer att radera raden.

[FIGURE src="image/webtec/pdo/delete.png?w=w3" caption="Nu ser vi information om raden och kan välja att radera den."]

Klickar vi på "Delete" så kommer formuläret att submittas till `delete-process.php` där raden kan raderas från databasen.

Vi kikar på processingskriptet del för del.

Först hämtar vi detaljer från det postade formuläret och sparar i variabler. Som vanligt, om någon försöker accessa skriptet utan att ha gått via vårt formulär så avslutar vi skriptet.

```php
// Get details from the posted form
$doit = $_POST['doit'] ?? null;
$id = $_POST['id'] ?? null;

if (!$doit) {
    die("You have accessed this page without a posted form.");
}
```

Nu skapar vi SQL-frågan och utför den. En DELETE ger inget resultset så det är inget vi kan hämta.

```php
// Connect to the database
$dsn = "sqlite:db/db.sqlite";
$db = connectToDatabase($dsn);

// Create the SQL statement
$sql = <<<EOD
DELETE FROM namnlista
WHERE
    rowid = ?
;
EOD;

// Prepare the SQL statement so it can be executed
$stmt = $db->prepare($sql);

// Execute the SQL statement towards the database
$args = [$id];
$stmt->execute($args);
```

Notera att vi använder en WHERE-del så att det bara är den aktuella raden som raderas.

Då avslutar vi med en redirect och här väljer jag att göra en redirect till söksidan, så att användaren kan börja om.

```php
// Redirect to a result page
header("Location: search.php");
```

Vi kan även kontrollera att raden är borttagen ur databasen.

[FIGURE src="image/webtec/pdo/deleted.png?w=w3" caption="Nu saknas det ett namn i namndatabasen."]

Som du kanske märker så är det inte så mycket som skiljer mellan de olika processingskripten, de är rätt lika i sin kod och struktur, det handlar om varianter av INSERT, UPDATE och DELETE.



CRUD {#crud}
--------------------------------------

Det vi nu gjort är de vanliga CRUD-operationerna som sker i databasapplikationer. Det handlar om avv visa information från databasen (R som i Read), att lägga till rader i databasen (C som i Create), uppdatera kolumnernas värde i en rad (U som i Update) och radera rader (D som i Delete).

CRUD är en benämning på det som vi gör i databasen med SELECT, INSERT, UPDATE, DELETE. Läs mer om begreppet [CRUD i Wikipedia](https://en.wikipedia.org/wiki/Create,_read,_update_and_delete).



Strukturera din kod {#strukturera}
--------------------------------------

Exempelprogrammen innehåller mycket upprepad kod. Det är för att du skall se exakt vilken kod som används i varje steg. Men, nu när allt är på plats så ser du kod som är copy-paste och duplicerad kod. Det är inte DRY (Don't Repeat Yourself).

Ett nästa steg vore att ta koden du nu sett och arrangera den i funktioner så att den blir enklare att återanvända. Lite mer DRY. Men, funktioner vinner du på om det är kod som du kommer anropa flera gånger, skapa bara funktioner om du vinner på det.

Andra saker som är uppenbara kandidater för kodstrukturering är till exempel namnet på databasen, det borde ligga i en konfigurationsfil. Du borde också ha en funktion som kopplar sig till databasen och hanterar eventuella fel relaterat till uppkopplingen (men det har du troligen rean gjort).

Om du jobbar med vyer så har du delvis strukturerat koden så att den mesta PHP-koden sker i skripten och HTML-koden (med utskrift av PHP-variabler) sker i vyerna.

Som du märker så finns det förbättringspotential och det är bäst att strukturera koden så den blir enkelt att återanvända och vidareutveckla. Annars hamnar man snabbt i en sits där koden växer en över huvudet, det blir för stort och för svårt att uppdatera och vidarutveckla.

När koden växer, se alltid till att prioritera ett visst mått av ordning och kodstruktur. Det vinner du på i längden.



Avslutningsvis {#avslutning}
--------------------------------------

Det var en introduktion till PDO tillsammans med SQLite och en genomgång i hur man med PHP-kod löser CRUD-operationer. Som du förstår så är detta grunden i många webbapplikationer.

De manualer du har mest nytta av, i längden, är [PHP manualen för PDO](http://php.net/manual/en/book.pdo.php) och [manualen för SQLite](http://www.sqlite.org/docs.html).

Tänk på att nästa databas du lär dig, till exempel MySQL/MariaDB, också använder sig av PDO. Det blir då enkelt att komma in i hur det skall fungera, eftersom du nu kan grunderna i PHP PDO och i SQL. Att använda ett gemensamt gränsnitt likt PHP PDO kan ha sina fördelar.
