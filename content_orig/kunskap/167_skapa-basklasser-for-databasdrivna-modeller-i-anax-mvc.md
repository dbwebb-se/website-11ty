---
author: mos
category: php
revision:
  "2014-11-26": (B, mos) Uppdaterade formatet för datum så att MySQL stöds (inte bara
    SQLite).
  "2014-04-21": (A, mos) Första utgåvan för phpmvc version 2.
updated: "2014-11-26 10:41:10"
created: "2014-04-14 14:49:51"
...
Skapa basklasser för databasdrivna modeller i Anax MVC
==================================

I denna artikel fokuserar vi på modeller som är förberedda för att spara information i databasen. Det är trots allt en av de vanligaste aktiviteterna i ett ramverk för webben, så det finns tid att spara om vi har en bra struktur.

Det handlar om att skriva så lite kod som möjligt i kontroller och modeller. Via basklasser som återanvänds sparar vi tid och kodrader.

<!--more-->



Förkunskaper {#forkunskap}
--------------------------------------

Du behöver vara bekant med [ramverket Anax MVC](kunskap/anax-som-mvc-ramverk) och förstå hur det fungerar.

Du behöver installera paketet `mos/cdatabase` som du kan läsa om i artikeln ["CDatabase - PHP classes för working with SQL queries and databases"](opensource/cdatabase-php-classes-for-working-with-sql-queries-and-databases). 



Introduktion {#intro}
--------------------------------------

Styrkan i ramverk är att de kan göra mer saker med mindre kodrader. I extremfallet kan du till och med automatiskt generera kod för att skapa en enkel blogg. Det är en process som kallas *scaffolding*. Man skapar konfigurationsfiler, eller använder ett utvecklarverktyg, ofta via kommandoraden, för att skapa mallar till klasser som löser vanligt förekommande aktiviteter.

Det handlar alltså om att skriva så lite kod som möjligt, men för att lyckas med det måste vi ha en gedigen grund.

Den kod vi vill undvika att skriva rör aktiviteter som ofta återkommer i ett ramverk. Det kan vara CRUD av användare, grupper, poster, sidor, kategorier, taggar och allt annat som kan sparas i databasen.

När man har gjort en komplett hantering av, låt säga användare, så kan man titta på de klasser och funktioner man skapat. Man ser att de har mycket gemensamt och skall man sedan skapa en hantering för fakturor eller produkter eller kategorier, så ser man att det är liknande funktioner som behövs.

Detta är kod som berör både kontroller, modeller och vyer. Det är formulärhantering och databaser. Det handlar om att lägga till, uppdatera, ta bort, visa och söka efter en viss typ av data som ofta är kopplat till en databastabell (eller flera).

I många ramverk ser vi lösningar som använder ORM, *Object Relational Mapping*. Det är en teknik att mappa objekt mot en relationsdatabas. Tanken är att man gör `user->save()` och resten hanterar ramverkets kod. Det finns egentligen inget behov av att skriva SQL-kod för hand i sådana här enkla fall.

Hur skulle en sådan hantering kunna se ut i Anax MVC? Vi pratar inte om en fullständig ORM, vi pratar mer om en ORM-liknande lösnings där modellerna är förberedda att jobba mot databasen. Det kan finnas basklasser som nya modeller kan ärva ifrån och på det viset återanvända kod. Allt för att vi skall behöva skriva mindre av denna enklare och repetitiva koden. Istället kan vi ägna vår kraft åt andra saker.

Nå, det låter som en bra tanke. Låt se hur vi kan göra detta i Anax MVC.



Installera Anax MVC {#installera}
--------------------------------------

Du behöver installera Anax MVC för att jobba igenom detta exempel. 

Vill du ha en helt ny installation så kan du klona [Anax MVC via GitHub](https://github.com/mosbth/Anax-MVC).

```bash
git clone https://github.com/mosbth/Anax-MVC.git
```

Om du har en fungerande installation av Anax MVC så kan du fortsätta att bygga vidare på den. Se till att du har senaste uppdateringarna.

```bash
cd Anax-MVC
git pull
```



Hämta hem ett paket för databashantering {#databas}
--------------------------------------

Anax MVC har inte med hantering av databaser i utgångsläget. Men det finns ett passande paket på Packagist som vi kan använda för detta syfte. Paketet heter [`mos/cdatabase`](https://packagist.org/packages/mos/cdatabase) och finns även på [GitHub som `cdatabase`](https://github.com/mosbth/cdatabase).

Installera det med hjälp av composer, lägg till följande rad i din `composer.json`.

```javascript
{
    "require": {
        "mos/cdatabase": "dev-master"
    }
}
```

Validera din composer-fil och installera sedan paketet `mos/cdatabase` på följande sätt.

```bash
cd Anax-MVC
composer validate
composer install --no-dev
```

Nu skall filerna från paketet `mos/database` ligga under katalogen `vendor`. Bekanta dig med paketets innehåll så skall vi snart börja använda det.

Du kan även se paketets innehåll via [GitHub](https://github.com/mosbth/cdatabase).

Paketet innehåller en klass `Mos\Database\CDatabaseBasic` som är ett lager ovanför PHP PDO. Paketet innehåller också en *query builder* i form av traitet `Mos\Database\TSQLQueryBuilderBasic`.

I katalogen `webroot` ligger ett antal testfiler som kan köras för att visa hur klasserna fungerar och dessa testfiler fungerar även som dokumentation som visar hur klasserna kan användas.



Ett användarfall som exempel {#usecase}
--------------------------------------

För att visa hur en basklass till en modell kan se ut så behöver jag ett användarfall. Jag väljer *användare*, eller *users*, med fokus på CRUD-relaterade operationer på användare. Följande behövs för en enklare hantering av att skapa, uppdatera, visa och ta bort användare från databasen.

1. Skapa tabell
2. Lägg till
3. Visa alla
4. Visa en
5. Uppdatera
6. Ta bort

Det är alltså vanliga CRUD operationer som behöver utföras.

I artikeln är fokus på att bygga upp en basklass för modellen. Därför tar jag lite genvägar och skapar inga formulär eller validering av fälten. Jag håller det enkelt, bara för att visa vilka metoder som kan finnas i en basklass för modellen.



Gör databasklassen som en tjänst `$di` {#db-service}
--------------------------------------

Vi ska använda en databas och det tänker vi göra via paketet `mos/cdatabase`. Det första vi gör är att lägga till paketet som en tjänst i ramverket.

```php
$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/database_sqlite.php');
    $db->connect();
    return $db;
});
```

Nu kan vi komma åt databasen på samma sätt som alla andra tjänster i ramverket.

I övningen kan du använda dig av SQLite eller MySQL. Det spelar inte någon större roll. Som du ser på min tjänst så använder jag mig av SQLite. 

Lägg dina config-filer i `app/config`, det är en passande plats.



Skapa tabellen och lägg till användare {#create}
--------------------------------------

För att komma igång så gör jag en egen route som skapar tabellen, routen får heta `setup`. Den kan se ut så här.

**Del av routen för `setup`.**

```php
$app->router->add('setup', function() use ($app) {

    //$app->db->setVerbose();

    $app->db->dropTableIfExists('user')->execute();

    $app->db->createTable(
        'user',
        [
            'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
            'acronym' => ['varchar(20)', 'unique', 'not null'],
            'email' => ['varchar(80)'],
            'name' => ['varchar(80)'],
            'password' => ['varchar(255)'],
            'created' => ['datetime'],
            'updated' => ['datetime'],
            'deleted' => ['datetime'],
            'active' => ['datetime'],
        ]
    )->execute();
```

Varje användare har ett unikt id och en unik akronym tillsammans med ett namn och en email-address. 

Jag tänker använda PHP-funktionen [`password_hash()`](http://docs.php.net/manual/en/function.password-hash.php) för att hantera lösenordet. Det innebär att jag inte behöver en särskild kolumn för att lagra saltet.

Jag lägger till created, updated, deleted och active som tidsstämplar när saker händer med användaren. På det viset har jag koll på status på användaren. Är användaren aḱtiv eller raderad? Det syns på tidsstämplarna.

Så här ser det ut när jag lägger till två användare för att ha något i min tabell att leka med.

```php
    $app->db->insert(
        'user',
        ['acronym', 'email', 'name', 'password', 'created', 'active']
    );

    $now = gmdate('Y-m-d H:i:s');

    $app->db->execute([
        'admin',
        'admin@dbwebb.se',
        'Administrator',
        password_hash('admin', PASSWORD_DEFAULT),
        $now,
        $now
    ]);

    $app->db->execute([
        'doe',
        'doe@dbwebb.se',
        'John/Jane Doe',
        password_hash('doe', PASSWORD_DEFAULT),
        $now,
        $now
    ]);
```

Jag lägger till två användare, en som heter *admin* och en som heter *doe*. Båda får datumstämplar för *created* och för *active*.



En modell och en basklass för modeller {#basklass}
--------------------------------------

Jag börjar med att skapa en modell för User, en användare.

```php
namespace Anax\Users;

/**
 * Model for Users.
 *
 */
class User extends \Anax\MVC\CDatabaseModel
{

}
```

Fokus i denna övning är att skapa basklassen för databasmodeller, i detta fallet `\Anax\MVC\CDatabaseModel`. Det är där jag vill placera alla standardmetoder som godtycklig modell kan ha nytta av.

Basklassen ser ut så här till att börja med.

```php
namespace Anax\MVC;

/**
 * Model for Users.
 *
 */
class CDatabaseModel implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

}
```




En kontroller {#kontroller}
--------------------------------------

Det behövs en kontroller. Jag lägger till `UsersController` som en kontroller i Anax MVC.

```php
$di->set('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});
```

Jag skapar också en tom klass för kontrollern.

```php
namespace Anax\Users;

/**
 * A controller for users and admin related events.
 *
 */
class UsersController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

}
```

Här kan vi tänka oss en basklass även för kontrollern. Men jag skippar det eftersom det inte är fokus för denna övning.

Nu är jag redo för min första route i kontrollern.



En route för att visa innehållet i tabellen {#visa-alla}
--------------------------------------

Jag börjar med att visa innehållet i tabellen, det blir en *action* som jag döper till `listAction()`. Routen för att nå denna action blir alltså `users/list`, allt i enlighet med Anax sätt att namnge kontroller och actions.

```php
/**
 * List all users.
 *
 * @return void
 */
public function listAction()
{
    $this->users = new \Anax\Users\User();
    $this->users->setDI($this->di);

    $all = $this->users->findAll();

    $this->theme->setTitle("List all users");
    $this->views->add('users/list-all', [
        'users' => $all,
        'title' => "View all users",
    ]);
}
```

Låt oss titta på koden.

Jag börjar med att skapa ett objekt för modellen och *injectar* `$di` in i objektet.

```php
    $this->users = new \Anax\Users\User();
    $this->users->setDI($this->di);
```

Därefter använder jag en tänkt metod i modellen, `findAll()`, som hämtar in alla users.

```php
    $all = $this->users->findAll();
```

Till slut så lämnar jag över till vyn att skriva ut alla users.

```php
    $this->theme->setTitle("List all users");
    $this->views->add('users/list-all', [
        'users' => $all,
        'title' => "View all users",
    ]);
```

En enkel vy `users/list-all` kan se ut så här.

```html
<h1><?=$title?></h1>

<?php foreach ($users as $user) : ?>

<pre><?=var_dump($user->getProperties())?></pre>

<?php endforeach; ?>

<p><a href='<?=$this->url->create('')?>'>Home</a></p>
```

Jag använder en tänkt metod i modeller, `getProperties()` som är tänkt att hämta ut de properties i objektet user som är relevanta för databashanteringen. Det betyder att properties som `$di` och liknande exkluderas.

Låt oss nu titta på hur modellen kan se ut för att stödja routen `users/list`.



Stöd i modellen för att visa innehållet i tabellen {#visa-allam}
--------------------------------------

Det första vi behöver är metoden `findAll()`. Den skall hitta alla rader i tabellen. Frågan är hur metoden får reda på tabellens namn. Det vore trevligt om det kunna automatgenereras utifrån modellens namn. Så här.

```php
/**
 * Get the table name.
 *
 * @return string with the table name.
 */
public function getSource()
{
    return strtolower(implode('', array_slice(explode('\\', get_class($this)), -1)));
}
```

Detta är en metod som hämtar klassens namn och strippar bort eventuellt namespace. Kvar bli `User` som är modell-klassens namn och namnet på tabellen i databasen. Ser du kopplingen? Modellens namn blir samma som tabellens namn.

I metoden `findAll()` kan vi nu använda `getSource()` för att göra en SELECT *.

```php
/**
 * Find and return all.
 *
 * @return array
 */
public function findAll()
{
    $this->db->select()
             ->from($this->getSource());

    $this->db->execute();
    $this->db->setFetchModeClass(__CLASS__);
    return $this->db->fetchAll();
}
```

Här väljer vi alla rader från tabellen. Vi sätter *fetch mode* till *class* vilket innebär att `fetchAll()` returnerar ett nytt objekt av klassen `__CLASS__` för varje rad som hittas i databasen. I vårt fall blir det en array av objekt av typen `Anax\Users\User`, vår modell för users.

Jag skapar även metoden `getProperties()` som returnerar de properties som har med modellens databastabell att göra.

```php
/**
 * Get object properties.
 *
 * @return array with object properties.
 */
public function getProperties()
{
    $properties = get_object_vars($this);
    unset($properties['di']);
    unset($properties['db']);

    return $properties;
}
```

Jag använder metoden [`get_object_vars()`](http://docs.php.net/manual/en/function.get-object-vars.php) för att hämta objektets properties. Sedan tar jag bort de properties som jag inte vill visa, i detta fallet `$di` och `$db`.

Så, nu kommer frågan, i vilken klass bör dessa metoder ligga? I modellen eller modellens basklass? Testa och se vilket du tycker blir bäst.



En route för att visa en användare {#visa-en}
--------------------------------------

Då gör vi om det, nu med en route `users/id/:number` som visar en specifik användare med id enligt `:number`, till exempel `users/id/1`. 

Först behövs en action `idAction()`, som matchar routen.

```php
/**
 * List user with id.
 *
 * @param int $id of user to display
 *
 * @return void
 */
public function idAction($id = null)
{
    $this->users = new \Anax\Users\User();
    $this->users->setDI($this->di);

    $user = $this->users->find($id);

    $this->theme->setTitle("View user with id");
    $this->views->add('users/view', [
        'user' => $user,
    ]);
}
```

Här använder jag en ny tänkt metod från modellen som hämtar en specifik användare, `find()`.

Den metoden kan se ut så här.

```php
/**
 * Find and return specific.
 *
 * @return this
 */
public function find($id)
{
    $this->db->select()
             ->from($this->getSource())
             ->where("id = ?");

    $this->db->execute([$id]);
    return $this->db->fetchInto($this);
}
```

Här använder jag en metod i databasklassen som heter `fetchInto()` som hämtar en rad och populerar det objektet som skickas in, i detta fallet `$this`. Det som returneras blir alltså ett ifyllt `$this`, eller överskrivet, om det redan innehåll några värden.

Grunderna för `fetchInto()` och `setFetchModeClass()` finns i PHP PDO och är dokumenterat i [`fetch()`](http://docs.php.net/manual/en/pdostatement.fetch.php), [`fetchObject()`](http://docs.php.net/manual/en/pdostatement.fetchobject.php) och [`setFetchMode()`](http://docs.php.net/manual/en/pdostatement.setfetchmode.php).

Nu kan jag visa alla och enskilda användare i databasen. 



En metod för att initialisera kontrollern {#initialize}
--------------------------------------

Som du har sett i de två actions vi skapat så börjar jag att skapa ett objekt för modellen i båda metoderna. Det kan jag göra på ett bättre sätt genom att använda metoden `initialize()` som anropas automatiskt av dispatchern, om den är definierad.

Jag ändrar min kod, lägger till en metod `initialize()` i kontrollern och utför de saker som är gemensamma för alla actions.

```php
/**
 * Initialize the controller.
 *
 * @return void
 */
public function initialize()
{
    $this->users = new \Anax\Users\User();
    $this->users->setDI($this->di);
}
```

Bra, nu fick jag lite bättre struktur och färre kodrader i varje actions metod.



En route för att skapa nya användare {#add}
--------------------------------------

Då gör vi en route för att skapa nya användare. Här används normalt ett formulär men jag förenklar och skapar en route `users/add/:acronym` där `:acronym` är användarens akronym. Till exempel så skapar routen `users/add/doe2` en ny användare med akronym `doe2`.

Jag börjar med en matchande action för routen, `createAction()`.

```php
/**
 * Add new user.
 *
 * @param string $acronym of user to add.
 *
 * @return void
 */
public function addAction($acronym = null)
{
    if (!isset($acronym)) {
        die("Missing acronym");
    }

    $now = gmdate('Y-m-d H:i:s');

    $this->users->save([
        'acronym' => $acronym,
        'email' => $acronym . '@mail.se',
        'name' => 'Mr/Mrs ' . $acronym,
        'password' => password_hash($acronym, PASSWORD_DEFAULT),
        'created' => $now,
        'active' => $now,
    ]);

    $url = $this->url->create('users/id/' . $this->users->id);
    $this->response->redirect($url);
}
```

De två sista raderna gör en *redirect* till en resultatsida som visar innehållet i den nyligen tillagda användaren. Det objekt som används innehåller även det id som den nyligen tillagda raden fick. 

Här används återigen en tänkt metod i modellen, nu `save()`. Tanken med den metoden är att den skall fungera både för nya rader och för befintliga rader. Den döljer alltså anropet till INSERT eller UPDATE, beroende på om raden finns i databasen eller ej.

Så här kan modellens `save()` se ut.

```php
/**
 * Save current object/row.
 *
 * @param array $values key/values to save or empty to use object properties.
 *
 * @return boolean true or false if saving went okey.
 */
public function save($values = [])
{
    $this->setProperties($values);
    $values = $this->getProperties();

    if (isset($values['id'])) {
        return $this->update($values);
    } else {
        return $this->create($values);
    }
}
```

I första delen av metoden så ser jag till att hantera inkommande `$values` och fyller på objektet med dess innehåll. Det ger mig möjligheten att skicka en array med objektets innehåll.

```php
    $this->setProperties($values);
    $values = $this->getProperties();
```

Metoden för `setProperties()`kan se ut så här.

```php
/**
 * Set object properties.
 *
 * @param array $properties with properties to set.
 *
 * @return void
 */
public function setProperties($properties)
{
    // Update object with incoming values, if any
    if (!empty($properties)) {
        foreach ($properties as $key => $val) {
            $this->$key = $val;
        }
    }
}
```

I andra delen av metoden `save()` hanterar jag om detta är en befintlig rad (`$id` finns) eller om det är en ny rad (`$id` finns ej).

```php
    if (isset($values['id'])) {
        return $this->update($values);
    } else {
        return $this->create($values);
    }
```

Då har vi kvar att titta på metoderna för `create()` och `update()`.

```php
/**
 * Create new row.
 *
 * @param array $values key/values to save.
 *
 * @return boolean true or false if saving went okey.
 */
public function create($values)
{
    $keys   = array_keys($values);
    $values = array_values($values);

    $this->db->insert(
        $this->getSource(),
        $keys
    );

    $res = $this->db->execute($values);

    $this->id = $this->db->lastInsertId();

    return $res;
}
```

De två första raderna omvandlar inkommande `$values` till två arrayer, en för `$keys` och en för `$values`. Det är för att anropet till databasen blir enklare med två separata arrayer och vi utnyttjar skyddet för SQL injections via PDOs prepared statement och sätt att skicka in parametrar.

När raden är tillagd så uppdaterar vi objektet och lägger till `$this->id` som det id som genererats som nyckel till senast tillagda rad.

Nästa gång man gör save så blir det alltså en `update()` istället för en `insert()`.

```php
/**
 * Update row.
 *
 * @param array $values key/values to save.
 *
 * @return boolean true or false if saving went okey.
 */
public function update($values)
{
    $keys   = array_keys($values);
    $values = array_values($values);

    // Its update, remove id and use as where-clause
    unset($keys['id']);
    $values[] = $this->id;

    $this->db->update(
        $this->getSource(),
        $keys,
        "id = ?"
    );

    return $this->db->execute($values);
}
```

I UPDATE-satsen plockar vi bort id:et från arrayen och lägger det sist i where-satsen för att bestämma vilken rad som skall uppdateras.

Som du kan se så är ingen metod särskilt stor så här långt. Försök att hålla dina metoder små och tydliga. Det blir enklare i längden.

Än så länge har vi inte skrivit en rad SQL-kod. Är det bra eller inte?

Hur ser det ut så här långt med placeringen av metoderna? Lägger du dem i modellen User eller i den generella basklassen?



En route för att radera användare {#delete}
--------------------------------------

Du börjar se ett mönster för hur vi jobbar? Ska vi ta och lägga till en route för att ta bort en användare? Så här kan den se ut `users/delete/:number`. Det innebär att routen `users/delete/2` tar bort en användare med id 2.

Vi behövern en action `deleteAction()` som matchar routen.

```php
/**
 * Delete user.
 *
 * @param integer $id of user to delete.
 *
 * @return void
 */
public function deleteAction($id = null)
{
    if (!isset($id)) {
        die("Missing id");
    }

    $res = $this->users->delete($id);

    $url = $this->url->create('users');
    $this->response->redirect($url);
}
```

Här blir det en ny tänkt metod i modellen som används för att radera ett objekt.

```php
/**
 * Delete row.
 *
 * @param integer $id to delete.
 *
 * @return boolean true or false if deleting went okey.
 */
public function delete($id)
{
    $this->db->delete(
        $this->getSource(),
        'id = ?'
    );

    return $this->db->execute([$id]);
}
```

Man skulle kunna tänka sig ett alternativ där metoden använder objektets egen `$this->id` för att radera nuvarande objekt. Du kan välja hur du vill göra, eller gör stöd för båda varianterna.



Uppdatera ett objekt {#update}
--------------------------------------

Låt se hur vi kan uppdatera ett objekt. Vi gör detta genom att flytta ett objekt till papperskorgen, *wastebasket*. Det handlar inte om att radera objektet från databasen. Istället sätter jag en tidsstämpel för kolumnen `deleted` och låter det representera en *soft delete*. På detta sättet får jag en typ av papperskorg där en användare kan raderas, soft delete, och sedan plockas tillbaka.

En route för en soft delete kan vara `users/soft-delete/:number`. 

En matchande action blir då `softDeleteaction()`.

```php
/**
 * Delete (soft) user.
 *
 * @param integer $id of user to delete.
 *
 * @return void
 */
public function softDeleteAction($id = null)
{
    if (!isset($id)) {
        die("Missing id");
    }

    $now = gmdate('Y-m-d H:i:s');

    $user = $this->users->find($id);

    $user->deleted = $now;
    $user->save();

    $url = $this->url->create('users/id/' . $id);
    $this->response->redirect($url);
}
```

Principen för en soft delete är en uppdatering av objektet där `$this->deleted` får en tidsstämpel som säger när objektet raderades. Själva uppdateringen sker genom att objektet först hämtas med en `find()`, därefter uppdateras `$this->deleted` och till slut sparas objektet med `save()`.

Kan du själv klura ut hur en route och action skulle se ut för att göra undo på en soft delete?



Lista aktiva och icke raderade användare {#list}
--------------------------------------

Säg att vi vill visa de användare som är aktiverade och inte raderade. Det kan vi göra med tidsstämplarna men det blir en lite mer anpassad fråga. Kan vi lösa det utan att blanda in SQL?

Klart vi kan, vi börjar med routen `users/active` och matchar den med an action `activeAction()`.

```php
/**
 * List all active and not deleted users.
 *
 * @return void
 */
public function activeAction()
{
    $all = $this->users->query()
        ->where('active IS NOT NULL')
        ->andWhere('deleted is NULL')
        ->execute();

    $this->theme->setTitle("Users that are active");
    $this->views->add('users/list-all', [
        'users' => $all,
        'title' => "Users that are active",
    ]);
}
```

Här ser du en variant på den *query buildern* som fanns med i paketet `mos/cdatabase`. Men den mappas i modellen istället. Det betyder att modellen behöver metoder som skuggar de metoder som ligger i databasen.

Modellen behöver alltså metoder för `query()`, `where()`, `andWhere()` och `execute()` för att konstruera frågan.

Först `query()`.

```php
/**
 * Build a select-query.
 *
 * @param string $columns which columns to select.
 *
 * @return $this
 */
public function query($columns = '*')
{
    $this->db->select($columns)
             ->from($this->getSource());

    return $this;
}
```

Metoden förbereder databasens query builder och börjar skapa själva frågan.

Sedan lägger vi till `where()` och `andWhere()`.

```php
/**
 * Build the where part.
 *
 * @param string $condition for building the where part of the query.
 *
 * @return $this
 */
public function where($condition)
{
    $this->db->where($condition);

    return $this;
}
```

```php
/**
 * Build the where part.
 *
 * @param string $condition for building the where part of the query.
 *
 * @return $this
 */
public function andWhere($condition)
{
    $this->db->andWhere($condition);

    return $this;
}
```

Som du ser, modellens metoder är bara ett skal framför databasens query builder.

Till slut så exekverar vi frågan med `execute()` och returnerar svaret i form av en array av objekt av modellens klass.

```php
/**
 * Execute the query built.
 *
 * @param string $query custom query.
 *
 * @return $this
 */
public function execute($params = [])
{
    $this->db->execute($this->db->getSQL(), $params);
    $this->db->setFetchModeClass(__CLASS__);

    return $this->db->fetchAll();
}
```

Behöver du fler konstruktioner, kanske `orderBy()`, så ser du nu hur du kan lägga till dem också.

Nu kan du säkert se hur du kan göra en route och action för att visa alla objekt som ligger i papperskorgen, eller?


Avslutningsvis {#avslutning}
--------------------------------------

Var hamnade dina metoder i modellen? För min del hamnade alla metoder i basklassen. Modellen User är helt tom och återanvänder alla metoder från basklassen.

Du har nu fått en basklass för modeller som lagras i databasen. Nästa modell du kommer att skriva kommer inte att kräva så mycket kod i modellen, eller hur?

Du kan diskutera denna artikel i dess [egna tråd](t/2290) i forumet. 




