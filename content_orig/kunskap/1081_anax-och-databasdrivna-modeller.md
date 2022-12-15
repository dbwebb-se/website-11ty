---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1
revision:
    "2017-09-05": "(A, mos) Första utgåvan."
...
Anax och databasdrivna modeller
==================================

[FIGURE src=image/snapht17/create-user-4.png?w=c5&cf&a=10,60,20,0 class="right"]

Vi bygger vidare på ett exempel med formulärhantering i Anax och integrerar med en extern modul för databashantering.

Vi använder en del av databasmodulen som heter _query builder_ där man bygger SQL-frågan utifrån metodanrop. Den blir basen i vår databasdrivna modell, som är en implementation av designmönstret Active Record.

Vårt mål är att skapa en kodbas som är enkel att återanvända för databasdrivna modeller som använder formulärhantering. Att använda Active Record är en del i att uppfylla målet.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har läst artikeln "[Anax och formulärhantering](kunskap/anax-och-formularhantering)".



Glöm inte `.htaccess` {#htaccess}
--------------------------------------

Glöm inte att redigera din `.htaccess` när du publicerar till studentservern.



Bygg vidare på formulärexemplet {#initanax}
--------------------------------------

Vi jobbar vidare i samma katalog `anax4` där vi gjorde formulärexemplet. Du bör alltså ha tre routes som fungerar, nämligen `user`, `user/login` och `user/create`.

Testa även att öppna din webbläsare mot `htdocs` för att kontrollera att index-sidan för webbplatsen fungerar tillsammans med routen `htdocs/debug/info`.

Tanken är att vi skall implementera så att vi kan skapa en användare och logga in som en användare. Vi vill visa på ett flöde som omfattar delar av formulärhantering och CRUD mot en databas.

Om du av någon anledning vill starta på nytt och utgå från koden som fanns i formulärartikeln så kan du scaffolda fram den.

```bash
# Ställ dig i kursrepot me/kmom04
anax create anax4f ramverk1-form
cd anax4f
```

Om du väljer att skapa nytt behöver du kontrollera att de olika routerna fungerar som tänkt.

Oavsett vad så bör vi nu ha en liknande kodbas att utgå ifrån. Jag jobbar vidare i min katalog `anax4`.



Installera modul för databas {#instdb}
--------------------------------------

Vi skall installera en Anax modul som hjälper oss med databashanteringen.

```bash
# Gå till anax4 eller anax4f, vilket du nu valt att jobba i
composer require anax/database
```

Kika gärna i katalogen `vendor/anax/database` för att se vilka delar som modulen består av.



En tabell för användare {#tabell}
--------------------------------------

Det första jag behöver är en databastabell `User` för användare. Databasmodulen innehåller ett DDL-exempel som hjälper mig skapa tabellen. Det finns ett exempel för SQLite och ett för MySQL. Jag tar och använder båda för skoj skull.

Jag börjar med att hämta SQL-koden från modulen och lägger i min egen katalog `sql/`.

```bash
rsync -av vendor/anax/database/sql/ sql/
```

Nu finns exempelfiler för att skapa databastabeller i katalogen `sql/`. Jag tänker använda de som heter `sql/ddl/user_*.sql`.



###SQLite tabell för User {#sqlitecreate}

Så här skapar jag tabell och databas för SQLite.

För det första väljer jag att skapa en ny katalog `data` där jag kan spara min databasfil. Katalogen behöver vara skrivbar för att databasen skall fungera och databasfilen behöver vara skrivbar för alla som skall redigera den, inklusive webbservern. Enklast är att sätta `chmod 666` på filen och `chmod 777` på katalogen.

```bash
# Gå till anax4/anax4f
mkdir data
chmod 777 data
sqlite3 data/db.sqlite # gör exit via ctrl-d direkt
chmod 666 data/db.sqlite
```

Nu vill vi inte committa och checka in databasen som en del av Git-repot. Det löser vi genom att lägga till en fil `data/.gitignore`. Du har sett samma fil tidigare, bland annat i katalogen `cache/cimage`.

```text
# Ignore everything in this directory
*
# Except this file
!.gitignore
```

Filen ser till att katalogen `data` blir en del av Git-repot men exkluderar alla filer som ligger i katalogen. En databas är inget vi (normalt) vill checka in i Git.

Då fyller vi databasen med innehåll.

```bash
sqlite3 data/db.sqlite < sql/ddl/user_sqlite.sql
```

Du kan nu gå in i databasen och se att det finns en tabell som heter `User`. Tabellen är tom än så länge.

```bash
sqlite3 data/db.sqlite
```

Det var SQLite det.



###MySQL tabell för User {#mysqlcreate}

Då skapar vi en tabell `User` i MySQL. Du kan öppna filen `sql/ddl/user_mysql.sql` i Workbench och se vad den innehåller. Du kan köra alla kommandon i Workbench om du vill, men det går lika bra i terminalklienten.

Det första jag behöver göra är att skapa en databas och lägga till en användare till databasen. Jag använder terminalklienten.

```sql
mysql> CREATE DATABASE IF NOT EXISTS anaxdb;
Query OK, 1 row affected, 1 warning (0.00 sec)

mysql> GRANT ALL ON anaxdb.* TO anax@localhost IDENTIFIED BY 'anax';
Query OK, 0 rows affected (0.01 sec)
```

Nu har jag en testdatabas `anaxdb` och en testanvändare `anax` som har lösenordet `anax`. Jag använder dessa för att koppla upp mig mot databasen.

Först startar jag terminalklienten mot min nyskapade databas med min nya användare.

```bash
mysql -uanax -panax anaxdb
```

Sedan kör jag SQL-skriptet via terminalklienten.

```bash
mysql> source sql/ddl/user_mysql.sql
Database changed
Query OK, 0 rows affected (0.00 sec)

Query OK, 0 rows affected (0.04 sec)

Query OK, 0 rows affected (0.05 sec)
```

Nu kan du kontrollera att tabellen `User` finns på plats och att den är tom.

Oavsett hur du går tillväga så handlar det om att skapa en databas och en tabell i MySQL.



Formulär för att skapa användare {#createuserform}
--------------------------------------

Då skall vi använda databasen genom att skapa en användare som vi lägger i databasen.

Jag har från tidigare exempel en modell-klass som heter `Anax\User\HTMLForm\CreateUser`, men den är scaffoldad och är inte perfekt i sin ursprungsform. Jag uppdaterar den och skapar ett formulär som ser ut så här.

```php
$this->form->create(
    [
        "id" => __CLASS__,
        "legend" => "Create user",
    ],
    [
        "acronym" => [
            "type"        => "text",
        ],

        "password" => [
            "type"        => "password",
        ],

        "password-again" => [
            "type"        => "password",
            "validation" => [
                "match" => "password"
            ],
        ],

        "submit" => [
            "type" => "submit",
            "value" => "Create user",
            "callback" => [$this, "callbackSubmit"]
        ],
    ]
);
```

Jag uppdaterar metoden `callbackSubmit()` och för att visa hur det ser ut så plockar jag ut formulärets innehåll och lägger i variabler som jag skriver ut, bara för att visa hur man kan testa sitt forumlär.

Så här ser metoden ut, bortsett från delen med databasen som ännu inte är på plats.

```php
/**
 * Callback for submit-button which should return true if it could
 * carry out its work and false if something failed.
 *
 * @return boolean true if okey, false if something went wrong.
 */
public function callbackSubmit()
{
    // Get values from the submitted form
    $acronym       = $this->form->value("acronym");
    $password      = $this->form->value("password");
    $passwordAgain = $this->form->value("password-again");

    // Check password matches
    if ($password !== $passwordAgain ) {
        $this->form->rememberValues();
        $this->form->addOutput("Password did not match.");
        return false;
    }

    // Save to database

    $this->form->addOutput("User was created.");
    return true;
}
```

Om jag provkör via `user/create` så kan det se ut så här.

[FIGURE src=image/snapht17/create-user-4.png?w=w2 caption="Förbereder mig att skapa en ny användare."]

Det gick "bra" att skapa användaren.

[FIGURE src=image/snapht17/create-user-3.png?w=w2 caption="Användaren skapades."]

Det ser ju ut som det kan fungera. Då skall vi bara skriva till databasen också.



Databasen som tjänst i ramverket {#dbservice}
--------------------------------------

Vi börjar med att lägga till databasen som en tjänst i ramverket. Det gör vi i `config/di.php` tillsammans med ramverkets övriga tjänster.

Koden för att lägga till tjänsten ser ut så här.

```php
"db" => [
    "shared" => true,
    "callback" => function () {
        $obj = new \Anax\Database\DatabaseQueryBuilder();
        $obj->configure("database.php");
        return $obj;
    }
],
```

Databasklassen läser in sin konfiguration från `config/database.php` och via den filen kan vi bestämma om databasen är MySQL eller SQLite. Det finns en exempelfil du kan utgå ifrån som ligger i modulen. Du hittar den i `vendor/anax/database/config/database.php`.

Jag utgår från den och kopierar till min katalog `config`.

```bash
rsync -av vendor/anax/database/config/database.php config/
```

Jag börjar med att sätta upp databasen som en SQLite-databas och pekar ut platsen där databasfilen finns, nämligen `data/db.sqlite`.

Så här blir konfigurationsfilen i det fallet.

```php
<?php
/**
 * Config file for Database.
 *
 * Example for MySQL.
 *  "dsn" => "mysql:host=localhost;dbname=test;",
 *  "username" => "test",
 *  "password" => "test",
 *  "driver_options"  => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
 *
 * Example for SQLite.
 *  "dsn" => "sqlite:memory::",
 */
return [
    "dsn"             => "sqlite:" . ANAX_INSTALL_PATH . "/data/db.sqlite",
    "username"        => null,
    "password"        => null,
    "driver_options"  => null,
    "fetch_mode"      => \PDO::FETCH_OBJ,
    "table_prefix"    => null,
    "session_key"     => "Anax\Database",

    // True to be very verbose during development
    "verbose"         => null,

    // True to be verbose on connection failed
    "debug_connect"   => false,
];
```

Nu har vi alltså en tjänst i ramverket för databasen och vilken databas det är styrs av konfigurationsfilen. Då kan vi börja använda databasen i formuläret.



Spara till databas i formulärmodellen {#savetodb}
--------------------------------------

Då skall vi använda ramverkstjänst för databasen för att spara användaren i formulärklassen. Den uppdaterade `callbackSubmit()` kan se ut så här.

```php
/**
 * Callback for submit-button which should return true if it could
 * carry out its work and false if something failed.
 *
 * @return boolean true if okey, false if something went wrong.
 */
public function callbackSubmit()
{
    // Get values from the submitted form
    $acronym       = $this->form->value("acronym");
    $password      = $this->form->value("password");
    $passwordAgain = $this->form->value("password-again");

    // Check password matches
    if ($password !== $passwordAgain ) {
        $this->form->rememberValues();
        $this->form->addOutput("Password did not match.");
        return false;
    }

    // Save to database
    $db = $this->di->get("db");
    $password = password_hash($password, PASSWORD_DEFAULT);
    $db->connect()
       ->insert("User", ["acronym", "password"])
       ->execute([$acronym, $password]);

    $this->form->addOutput("User was created.");
    return true;
}
```

Den koden som skapar användaren i databasen blir alltså denna.

```php
// Save to database
$db = $this->di->get("db");
$password = password_hash($password, PASSWORD_DEFAULT);
$db->connect()
   ->insert("User", ["acronym", "password"])
   ->execute([$acronym, $password]);
```

Som du ser skriver vi inte någon SQL-kod utan använder en inbyggd _query builder_ som bygger upp SQL-koden via metoder. Det finns inget som hindrar att du istället väljer att skriva SQL-koden som du är van vid, men jag tänkte använda Query-buildern i mitt exempel så det är bra om även du gör det.

Du kan med dessa ändringar köra formuläret för att skapa användaren och dubbelkolla att användaren verkligen ligger i databasen.

Så här kan det se ut när användaren doe hamnar i databasen.

```text
$ sqlite3 --column --header data/db.sqlite "SELECT * FROM User;"
id          acronym     password                                                      created     updated     deleted     active     
----------  ----------  ------------------------------------------------------------  ----------  ----------  ----------  ---------- 
1           doe         $2y$10$42SmOGZzSiXPFeb.xmyumeGHfEdNErHPDYCdGezGJ/LcOxmyebMAy
```

Då skall vi pröva att använda användaren genom att simulera logga in.



Logga in mot databasen {#loginthroughdb}
--------------------------------------

Då tar jag och uppdaterar koden för inloggningen och lägger till databaskod i min formulärklass `Anax\User\HTMLForm\UserLoginForm`. Jag skall kontrollera att användare och lösenord matchar.

Koden i `callbackSubmit()` ser ut som följer och all databashantering finns med för att simulera en inloggning och testa mot innehållet i databasen.

```php
/**
 * Callback for submit-button which should return true if it could
 * carry out its work and false if something failed.
 *
 * @return boolean true if okey, false if something went wrong.
 */
public function callbackSubmit()
{
    // Get values from the submitted form
    $acronym       = $this->form->value("user");
    $password      = $this->form->value("password");

    // Try to login
    $db = $this->di->get("db");
    $db->connect();
    $user = $db->select("password")
               ->from("User")
               ->where("acronym = ?")
               ->executeFetch([$acronym]);

    // $user is false if user is not found
    if (!$user || !password_verify($password, $user->password)) {
       $this->form->rememberValues();
       $this->form->addOutput("User or password did not match.");
       return false;
    }

    $this->form->addOutput("User logged in.");
    return true;
}
```

Om du studerar koden ovan ser du hur informationen plockas ut formuläret, en fråga ställs till databasen för att hämta den användaren som försöker logga in. Därefter kontrolleras lösenordet om det matchar och baserat på det tillåter man att användaren blir inloggade eller ej.

Du kan nu testköra koden via routen `user/login`. Det kan se ut så här.

[FIGURE src=image/snapht17/login-user-1.png?w=w2 caption="Första försöket, redo att logga in med rätt akronym och rätt lösenord."]

När inloggningen fungerade så ser man följande resultat.

[FIGURE src=image/snapht17/login-user-2.png?w=w2 caption="Inloggningen fungerade."]

Pröva gärna att skriva in fel lösenord och se ett annat svar, det skall inte gå att logga in med felaktigt lösenord eller felaktig användare.

Kodexemplet sparar inte undan i sessionen om inloggningen gick bra eller ej, det behöver det göra för att det skall bli en riktigt inloggning, men för tillfället nöjer vi oss med att fokusera på databasbiten.




En databasdriven modell {#dbdrivenmodel}
--------------------------------------

Låt oss studera databaskoden vi nu sett. Det vore en tanke att flytta den koden och kapsla in i en klass `User` som ligger i modellagret och har ansvar för alla detaljer om en användare, inklusive vetskapen om hur användarens detaljer kan lagras i databasen.

Vi kan kalla det en modellklass som använder sig av databasen, eller en databasdriven modellklass.

Låt se hur det kan se ut.



###Active Record designmönster {#ardesignmonster}

För att implementera en databasdriven modellklass väljer jag en variant av designmönstret _Active Record_.

När man skriver databaskod enligt Active Record kan det se ut så här.

```php
$book = new Book();
$book->find("id", 7);
$book->price += 10;
$book->save();
```

Koden ovan laddar en bok från en databastabell, ökar priset med 10 och sparar boken till databasen. Active record ger ett enkelt sätt att låta ett objekt spara sig i databasen. Det ger ett interface och en kodstruktur som blir enhetlig för alla klasser som väljer att jobba enligt designmönstret.

Det finns många olika implementationer av designmönstret Active Record, men principen är densamma, ungefär som i exemplet ovan.



###CreateUserForm och Active Record {#arcreateuserform}

Hur skulle detta kunna se ut i formulärklassen `CreateUserForm`? Vi tittar på en uppdatering av metoden `callbackSubmit()`. Du kan se dels den tidigare och nu bortkommenterade koden samt den nya koden som jobbar mot klassen `User` som nu använder sig av Active Record.

```php
/**
 * Callback for submit-button which should return true if it could
 * carry out its work and false if something failed.
 *
 * @return boolean true if okey, false if something went wrong.
 */
public function callbackSubmit()
{
    // Get values from the submitted form
    $acronym       = $this->form->value("acronym");
    $password      = $this->form->value("password");
    $passwordAgain = $this->form->value("password-again");

    // Check password matches
    if ($password !== $passwordAgain ) {
        $this->form->rememberValues();
        $this->form->addOutput("Password did not match.");
        return false;
    }

    // Save to database
    // $db = $this->di->get("db");
    // $password = password_hash($password, PASSWORD_DEFAULT);
    // $db->connect()
    //    ->insert("User", ["acronym", "password"])
    //    ->execute([$acronym, $password]);
    $user = new User();
    $user->setDb($this->di->get("db"));
    $user->acronym = $acronym;
    $user->setPassword($password);
    $user->save();

    $this->form->addOutput("User was created.");
    return true;
}
```

Det är följande rader som nu skapar användaren.

```php
$user = new User();
$user->setDb($this->di->get("db"));
$user->acronym = $acronym;
$user->setPassword($password);
$user->save();
```

Ett objekt skapas och injectas med en databasklass, fält läggs till och objektet sparas till databasen. Klassen `User` har själv full kontroll över detaljer och erbjuder ett snyggt gränssnitt till alla som vill jobba med objekt av klassen.

Glöm inte lägga till att `use \Anax\User\User;` överst i formulärklassen, så den vet vilken implementation av klassen `User` du vill använda.

Kanske blir det inte mycket färre rader men vi får en inkapsling och klassen `User` har själv full koll på hur den lagras i databasen. Jag vill nog säga att koden i formulärklassen blev snyggare och bättre inkapslad.

Vi kan inte köra vårt exempel än, vi saknar klassen `User`, men innan vi tar tag i den så ser vi hur en uppdaterad formulärklass för login kan se ut med motsvarande ändringar.



###LoginUserForm och Active Record {#arloginform}

Hur ser då formuläret för login ut `UserLoginForm` med motsvarande ändring? Låt oss titta.

```php
/**
 * Callback for submit-button which should return true if it could
 * carry out its work and false if something failed.
 *
 * @return boolean true if okey, false if something went wrong.
 */
public function callbackSubmit()
{
    // Get values from the submitted form
    $acronym       = $this->form->value("user");
    $password      = $this->form->value("password");

    // Try to login
    // $db = $this->di->get("db");
    // $db->connect();
    // $user = $db->select("password")
    //            ->from("User")
    //            ->where("acronym = ?")
    //            ->executeFetch([$acronym]);
    //
    // // $user is false if user is not found
    // if (!$user || !password_verify($password, $user->password)) {
    //    $this->form->rememberValues();
    //    $this->form->addOutput("User or password did not match.");
    //    return false;
    // }

    $user = new User();
    $user->setDb($this->di->get("db"));
    $res = $user->verifyPassword($acronym, $password);

    if (!$res) {
       $this->form->rememberValues();
       $this->form->addOutput("User or password did not match.");
       return false;
    }

    $this->form->addOutput("User " . $user->acronym . " logged in.");
    return true;
}
```

Här är det nu ett par rader kod som stämmer av om akronymen och lösenordet passar, nu via klassen `User`.

```php
$user = new User();
$user->setDb($this->di->get("db"));
$res = $user->verifyPassword($acronym, $password);
```

Om akronymen finns och lösenordet stämmer är objektet `$user` fyllt med detaljer från databasen och dessa kan användas som publika medlemmar i objektet.

Så här med `$user->acronym`.

```php
$this->form->addOutput("User " . $user->acronym . " logged in.");
```

Glöm inte lägga till att `use \Anax\User\User;` överst i formulärklassen, så den vet vilken implementation av klasse `User` du vill använda.

Vårt exempel fungerar fortfarande inte då vi behöver implementationen av klassen `User`. Låt oss då titta på den.



###Klassen User och Active Record {#arusermodel}

Jag får säga att det är en trevlig tanke att kapsla in koden i `User` och göra den klassen ansvarig för relevanta delar, inklusive hanteringen mot databasen. Låt oss titta på klassen `User` och dess olika delar.

Vi börjar med inledningen av klassen.

```php
<?php

namespace Anax\User;

use \Anax\Database\ActiveRecordModel;

/**
 * A database driven model.
 */
class User extends ActiveRecordModel
{
```

Vi ser att klassen ärver från `ActiveRecordModel` som finns i modulen `anax/database`, vi gissar oss till det eftersom namespacet är `\Anax\Database\ActiveRecordModel`.

Sedan följer en referens till databastabellen och de kolumner som finns i tabellen som nu matchas av publika properties i klassen.

```php
/**
 * @var string $tableName name of the database table.
 */
protected $tableName = "User";

/**
 * Columns in the table.
 *
 * @var integer $id primary key auto incremented.
 */
public $id;
public $acronym;
public $password;
public $created;
public $updated;
public $deleted;
public $active;
```

I denna implementationen av Active Record är det viktigt att klassens medlemmar matchar direkt mot databastabellens kolumner. Det är en restriktion som är nödvändig.

Vi fortsätter att titta i klassen och ser en metod för att skapa lösenordet när användaren skapas.

```php
/**
 * Set the password.
 *
 * @param string $password the password to use.
 *
 * @return void
 */
public function setPassword($password)
{
    $this->password = password_hash($password, PASSWORD_DEFAULT);
}
```

Detta gjordes tidigare i formulärklassen men nu är det `User` som är ansvarig gör hur lösenordet skapas.

Det känns rätt om vi fortsätter med nästa metod som verifierar akronym och lösenord när användaren försöker logga in.

```php
/**
 * Verify the acronym and the password, if successful the object contains
 * all details from the database row.
 *
 * @param string $acronym  acronym to check.
 * @param string $password the password to use.
 *
 * @return boolean true if acronym and password matches, else false.
 */
public function verifyPassword($acronym, $password)
{
    $this->find("acronym", $acronym);
    return password_verify($password, $this->password);
}
```

Vi känner igen delar av koden som tidigare låg i formulärklassen för login.

Nu är det slut, detta var hela klassen `User`. Det innebär att en hel del kod och metoder ärvs ned från klassen `ActiveRecordModel`. Där finns bland annat metoderna för `find()` och `save()`.

Du kan nu provköra och skapa en ny användare och logga in med den. Det bör fungera.



###Vinsten med Active Record {#arvinst}

Låt oss ställa frågan om vi kan vinna något med ytterligare ett lager framför databasen, det lager som Active Record tillför.

Vinsten kan vara att dölja databaskoden och jobba enbart mot metoder likt `find()` och `save()`. Implementationen döljs i klassen `ActiveRecordModel` och om vi hade kikat i den hade vi sett tydligt hur den jobbar mot databasen i form av en query builder som erbjuder metoder för att skapa SQL-koden.

En annan vinst är att det blir en tydlig struktur för att jobba mot modellklasser som vill spara sig i databasen.En del av den repetetiva databaskoden ligger nu återanvändbar i `ActiveRecordModel` och varje ny klass som vill jobba mot databasen behöver bara utöka den.

Vi får en kodstruktur som är generell och det kan bli enkelt att scaffolda fram CRUD för en modell-klass.

Kanske kan vi också se att vi abstraherar bort databasen ytterligare ett steg och gör oss mer oberoende av vilken databas vi använder. Vi kan nu skriva modellklasser utan att tänka på om det är MySQL eller SQLite. De eventuella inkompabiliteter som finns mellan databaser har vi nu lager som kan hantera. Det lagret är egentligen konstruktionen av den _query builder_ som databasmodulen erbjuder. När vi använder den så låter vi metoder skapa SQL-koden, vi skapar inte själva SQL-koden och klassen kan då ta hänsyn till de skillnader som finns mellan olika databaser. Detta är något som abstraktionslagret PDO inte tar hänsyn till.

Kanske är detta ett bra sätt att skriva PHP-kod som är mer oberoende av databasen. Men det kan också bli svårare att utnyttja specifika delar i databasen såsom lagrade procedurer och funktioner. Kanske, inte nödvändigtvis dock. Egentligen så är det nog så att vi kan fortfarande skriva specifik databaskod om vi vill, det går bra med lagrade procedurer och funktioner bakom variationer av ett active record mönster. Iallafall om du frågar mig.

Nåväl, åter till saken. Sakll vi avsluta med att kontroller att det går lika bra att köra exemplet mot MySQL?



Byt databas från SQLite till MySQL {#bytmysql}
--------------------------------------

Det enda vi behöver göra är att uppdatera konfigurationsfilen `config/database.php`. Jag sparar undan nuvarande konfiguration som `config/database_sqlite.php` och gör en ny konfiguration i `config/database_mysql.php` som jag till slut kopierar över till `config/database.php`.

```bash
cp config/database.php config/database_sqlite.php
cp config/database.php config/database_mysql.php
```

Jag redigerar konfigfilen `config/database_mysql.php` så att den använder min MySQL-databas.

```php
<?php
/**
 * Config file for Database.
 *
 * Example for MySQL.
 *  "dsn" => "mysql:host=localhost;dbname=test;",
 *  "username" => "test",
 *  "password" => "test",
 *  "driver_options"  => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
 *
 * Example for SQLite.
 *  "dsn" => "sqlite:memory::",
 */
return [
    "dsn"             => "mysql:host=localhost;dbname=anaxdb;",
    "username"        => "anax",
    "password"        => "anax",
    "driver_options"  => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    "fetch_mode"      => \PDO::FETCH_OBJ,
    "table_prefix"    => null,
    "session_key"     => "Anax\Database",

    // True to be very verbose during development
    "verbose"         => null,

    // True to be verbose on connection failed
    "debug_connect"   => false,
];
```

Till slut aktiverar jag så att konfigfilen `config/database.php` är konfigurationen från MySQL.

```bash
cp config/database_mysql.php config/database.php
```

Nu kan jag enkelt hoppa mellan databaserna och testkör du genom att skapa en användare och pröva logga in så skall det fungera.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har gått igenom hur formulärhantering och databashantering kan byggas ihop till en väl strukturerad kodmassa för modellagret som är väl förberedd för att hantera bland annat CRUD-liknande operationer. Vi väljer att kalla detta för databasdrivna modeller och som en del i vår implementation använde vi oss av designmönstret Active Record.

För att få ännu bättre koll på hur detta med databasdrivna modeller fungerar så finns det en artikel som tar ett utökat exempel, fortsätt gärna att läsa artikeln "[Anax med databasdrivna modeller enligt Active Record, ett exempel](kunskap/anax-med-databasdrivna-modeller-enligt-active-record-ett-exempel)".

Denna artikel har en [egen forumtråd](t/6729) som du kan ställa frågor i, eller bidra med tips och trix.
