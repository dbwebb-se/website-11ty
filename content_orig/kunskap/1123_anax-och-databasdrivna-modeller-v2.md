---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1
revision:
    "2018-12-10": "(B, mos) Uppdaterad till kursen ramverk1 v2."
    "2017-09-05": "(A, mos) Första utgåvan."
...
Anax och databasdrivna modeller (v2)
==================================

[FIGURE src=image/snapht17/create-user-4.png?w=c5&cf&a=10,60,20,0 class="right"]

Vi bygger vidare på ett exempel med formulärhantering i Anax och integrerar med en extern modul för databashantering.

Vi använder en del av databasmodulen som heter _query builder_ där man bygger SQL-frågan utifrån metodanrop. Den blir basen i vår databasdrivna modell, som är en implementation av designmönstret Active Record.

Vårt mål är att skapa en kodbas som är enkel att återanvända för databasdrivna modeller som använder formulärhantering. Att använda Active Record är en del i att uppfylla målet.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har läst artikeln "[Anax och formulärhantering (v2)](kunskap/anax-och-formularhantering-v2)".

Du har sedan tidigare (kursen oophp) kännedom av modulen `anax/database`.



Bygg vidare på formulärexemplet {#initanax}
--------------------------------------

Vi jobbar vidare i samma katalog där vi gjorde formulärexemplet. Du bör alltså ha tre routes som fungerar, nämligen `user`, `user/login` och `user/create`.

Pröva att öppna din webbläsare mot `htdocs` för att kontrollera att dina routes fungerar.

Tanken är att vi skall implementera så att vi kan skapa en användare och logga in som en användare. Vi vill visa på ett flöde som omfattar delar av formulärhantering och CRUD mot en databas.



Installera modul för databas {#instdb}
--------------------------------------

Vi skall installera en Anax modul som hjälper oss med databashanteringen.

```bash
# Gå till roten av din exempelkatalog
composer require anax/database-active-record
```

Modulen [`anax/database-active-record`](https://github.com/canax/database-active-record) bygger på modulen [`anax/database-query-builder`](https://github.com/canax/database-query-builder) som använder sig av modulen [`anax/database`](https://github.com/canax/database). Det är alltså tre spearata moduler som jobbar tillsammans för att lösa implementationen av Active Record.

Du kan se vilka versioner du har av modulerna.

```text
$ composer show | grep anax/database
anax/database                      v2.2.0 
anax/database-active-record        v2.0.0 
anax/database-query-builder        v2.0.2 
```
Kika gärna i katalogen `vendor/anax/database*` för att se vilka delar som modulerna består av.



En tabell för användare {#tabell}
--------------------------------------

Det första som behövs är en databastabell `User` för användare. Databasmodulen innehåller ett DDL-exempel som underlättar att skapa tabellen. Det finns exempelfiler för SQLite och för MySQL.

Jag börjar med att hämta SQL DDL-koden från modulen och lägger i min egen katalog `sql/`.

```bash
# Stå i roten av ditt exempel
rsync -av vendor/anax/database-active-record/sql .
```

Nu finns exempelfiler för att skapa databastabeller i katalogen `sql/`. Jag tänker använda SQLite och den filen som heter `sql/ddl/user_sqlite.sql`.



### SQLite tabell för User {#sqlitecreate}

Så här skapar jag tabell och databas för SQLite.

Jag börjar att skapa en ny katalog `data` där jag kan spara min databasfil. Katalogen behöver vara skrivbar för att databasen skall fungera och databasfilen behöver vara skrivbar för alla som skall redigera den, inklusive webbservern. Enklast är att sätta `chmod 666` på filen och `chmod 777` på katalogen.

```bash
# Stå i roten
mkdir data
chmod 777 data
sqlite3 data/db.sqlite # gör exit via ctrl-d direkt
chmod 666 data/db.sqlite
```

Nu vill vi inte committa och checka in databasen som en del av Git-repot. Det löser vi genom att lägga till en fil `data/.gitignore`.

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

Nu har vi en databasen och en tabell.



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

[FIGURE src=image/snapht18/form-create-user.png?w=w3 caption="Förbereder mig att skapa en ny användare."]

Klicka på knappen och se att det "gick bra" att skapa användaren.

Då skall vi bara skriva till databasen också.



Databasen som tjänst i ramverket {#dbservice}
--------------------------------------

Vi behöver lägga till databasen som en tjänst i ramverket. Det gör vi genom att kopiera konfigurationen från modulerna.

```text
rsync -av vendor/anax/database/config .
rsync -av vendor/anax/database-query-builder/config .
```

I $di lägger sig nu två tjänster, dels tjänsen för `anax/database` som heter `db` och dels tjänsten för query builder modulen `anax/database-query-builder` som heter `dbqb`. Det är `dbqb` som vi kommer att använda.

Databasklassen läser in sin konfiguration från `config/database.php` och via den filen kan vi bestämma om databasen är MySQL eller SQLite. Den konfigurationsfil du nyss kopierade är skriven för SQLite. Jag behöver redigera filen för att peka ut var min databasfil `data/db.sqlite` ligger.

```php
"dsn" => "sqlite:" . ANAX_INSTALL_PATH . "/data/db.sqlite",
```

Nu har vi alltså en tjänst i ramverket för databasen och vilken databas det är styrs av konfigurationsfilen. Då kan vi börja använda databasen i formuläret.



Spara till databas i formulärmodellen {#savetodb}
--------------------------------------

Nu kan vi använda ramverkstjänsten för databasen för att spara användaren i formulärklassen. Den uppdaterade `callbackSubmit()` kan se ut så här.

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
    $db = $this->di->get("dbqb");
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
$db = $this->di->get("dbqb");
$password = password_hash($password, PASSWORD_DEFAULT);
$db->connect()
   ->insert("User", ["acronym", "password"])
   ->execute([$acronym, $password]);
```

Som du ser skriver vi inte någon SQL-kod utan använder en Query Builder som bygger upp SQL-koden via metoder. Det finns inget som hindrar att du istället väljer att skriva SQL-koden som du är van vid, men jag tänkte använda Query-buildern i mitt exempel så det är bra om även du gör det.

Du kan med dessa ändringar köra formuläret för att skapa användaren och dubbelkolla sedan att användaren verkligen ligger i databasen.

Så här kan det se ut när användaren doe hamnar i databasen.

```text
$ sqlite3 --column --header data/db.sqlite "SELECT * FROM User;"
id          acronym     password                                                      created     updated     deleted     active     
----------  ----------  ------------------------------------------------------------  ----------  ----------  ----------  ---------- 
1           doe         $2y$10$42SmOGZzSiXPFeb.xmyumeGHfEdNErHPDYCdGezGJ/LcOxmyebMAy
```

Då skall vi pröva att använda användaren genom att utföra en inloggning.



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
    $db = $this->di->get("dbqb");
    $db->connect();
    $user = $db->select("password")
               ->from("User")
               ->where("acronym = ?")
               ->execute([$acronym])
               ->fetch();

    // $user is null if user is not found
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

[FIGURE src=image/snapht18/form-login-prepare.png?w=w3 caption="Första försöket, redo att logga in med rätt akronym och rätt lösenord."]

När inloggningen fungerade så ser man följande resultat.

[FIGURE src=image/snapht18/form-login-success.png?w=w3 caption="Inloggningen fungerade."]

Pröva gärna att skriva in fel lösenord och se ett annat svar, det skall inte gå att logga in med felaktigt lösenord eller felaktig användare.

Kodexemplet sparar inte undan i sessionen om inloggningen gick bra eller ej, det behöver det göra för att det skall bli en riktigt inloggning, men för tillfället nöjer vi oss med att fokusera på databasbiten.




En databasdriven modell User {#dbdrivenmodel}
--------------------------------------

Låt oss studera databaskoden vi nu sett. Det vore en tanke att flytta den koden och kapsla in i en klass `User` som ligger i modellagret och har ansvar för alla detaljer om en användare, inklusive vetskapen om hur användarens detaljer kan lagras i databasen.

Vi kan kalla det en modellklass som använder sig av databasen, eller en databasdriven modellklass.

Låt se hur det kan se ut.



### Active Record designmönster {#ardesignmonster}

För att implementera en databasdriven modellklass väljer jag en variant av designmönstret _Active Record_.

När man skriver databaskod enligt Active Record kan det se ut så här.

```php
$book = new Book();
$book->find("id", 7);
$book->price += 10;
$book->save();
```

Koden ovan laddar en bok från en databastabell, ökar priset med 10 och sparar boken till databasen. Active Record ger ett enkelt sätt att låta ett objekt spara sig i databasen. Det ger ett interface och en kodstruktur som blir enhetlig för alla klasser som väljer att jobba enligt designmönstret.

Det finns många olika implementationer av designmönstret Active Record, men principen är densamma, ungefär som i exemplet ovan.



### CreateUserForm och Active Record {#arcreateuserform}

Hur skulle detta kunna se ut i formulärklassen `CreateUserForm`?

Vi tittar på en uppdatering av metoden `callbackSubmit()`. Du kan se dels den tidigare och nu bortkommenterade koden samt den nya koden som jobbar mot klassen `User` som nu använder sig av Active Record.

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
    // $db = $this->di->get("dbqb");
    // $password = password_hash($password, PASSWORD_DEFAULT);
    // $db->connect()
    //    ->insert("User", ["acronym", "password"])
    //    ->execute([$acronym])
    //    ->fetch();
    $user = new User();
    $user->setDb($this->di->get("dbqb"));
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
$user->setDb($this->di->get("dbqb"));
$user->acronym = $acronym;
$user->setPassword($password);
$user->save();
```

Ett objekt skapas och injectas med en databasklass, fält läggs till och objektet sparas till databasen. Klassen `User` har själv full kontroll över detaljer och erbjuder ett snyggt gränssnitt till alla som vill jobba med objekt av klassen.

Glöm inte lägga till att `use VendorName\User\User;` överst i formulärklassen, så den vet vilken implementation av klassen `User` du vill använda. Byt VendorName till det du har valt att använda.

Kanske blir det inte mycket färre rader men vi får en inkapsling och klassen `User` har själv full koll på hur den lagras i databasen. Jag vill nog säga att koden i formulärklassen blev snyggare och bättre inkapslad.

Vi kan inte köra vårt exempel än, vi saknar klassen `User`, men innan vi tar tag i den så ser vi hur en uppdaterad formulärklass för login kan se ut med motsvarande ändringar.



### LoginUserForm och Active Record {#arloginform}

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
    // $db = $this->di->get("dbqb");
    // $db->connect();
    // $user = $db->select("password")
    //            ->from("User")
    //            ->where("acronym = ?")
    //            ->execute([$acronym])
    //            ->fetch();
    //
    // // $user is false if user is not found
    // if (!$user || !password_verify($password, $user->password)) {
    //    $this->form->rememberValues();
    //    $this->form->addOutput("User or password did not match.");
    //    return false;
    // }

    $user = new User();
    $user->setDb($this->di->get("dbqb"));
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

Glöm inte lägga till att `use Anax\User\User;` överst i formulärklassen, så den vet vilken implementation av klassen `User` du vill använda.

Vårt exempel fungerar fortfarande inte då vi behöver implementationen av klassen `User`. Låt oss då titta på den.



### Klassen User och Active Record {#arusermodel}

Jag får säga att det är en trevlig tanke att kapsla in koden i `User` och göra den klassen ansvarig för relevanta delar, inklusive hanteringen mot databasen. Låt oss se hur klassen `User` kan byggas upp.

Börja med att skapa klassfilen i `src/User/User.php` och fyll sedan på med klassens innehåll.

Vi börjar med inledningen av klassen.

```php
namespace Anax\User;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model.
 */
class User extends ActiveRecordModel
{
    
}
```

Vi ser att klassen ärver från `ActiveRecordModel` som finns i modulen `anax/database-active-record`, vi gissar oss till det eftersom namespacet är `\Anax\DatabaseActiveRecord\ActiveRecordModel`.

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

I denna implementationen av Active Record är det viktigt att klassens medlemmar matchar direkt mot databastabellens kolumner. Det är en restriktion som implementationen bygger på.

Vi behöver en metod för att sätta lösenordet. Vi kan inte sätta det direkt via en properties eftersom det behöver hashas.

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

Vi behöver också en metod för att verifiera att lösenordet är korrekt, den används när användaren försöker logga in.

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

Nu är det slut, detta var hela klassen `User`. Det innebär att en hel del kod och metoder ärvs ned från klassen `ActiveRecordModel`. Där finns bland annat metoderna för `find()` och `save()`, de delar som är kärnan i designmönstret Active Record.

Du kan nu provköra och skapa en ny användare och logga in med den. Det bör fungera.

Blir det fel får du felsöka, kom ihåg att vi uppdaterat tre klasser sedan sist.



### Vinsten med Active Record {#arvinst}

Avsluta nu med att kika igenom din kod. Du har en modell-klass User som via ActiveRecord kan lagras i en databas.

Databasen hanteras av tre olika moduler som bygger på varandra.

Du har klasser för formulärhantering som kan interagera i modell-laget med User-klassen.

Fundera på om du ser för- och nackdelar med denna hantering som vi nu sett i artikeln.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har gått igenom hur formulärhantering och databashantering kan byggas ihop till en väl strukturerad kodmassa för modellagret som är väl förberedd för att hantera bland annat CRUD-liknande operationer. Vi väljer att kalla detta för databasdrivna modeller och som en del i vår implementation använde vi oss av designmönstret Active Record.

Denna artikel har en [egen forumtråd](t/6729) som du kan ställa frågor i, eller bidra med tips och trix.
