---
author: lew
revision:
    "2017-03-17": (A, lew) First version.
category:
    - oophp
...
Klasser för sessionen och cookies
===================================

<!-- [FIGURE src=/image/oophp/v3/login-top.png?w=c5 class="right"] -->

Vi ska se hur man kan skapa klasser som omsluter och hanterar $\_SESSION och $\_COOKIE, så kallade "wrapper-klasser".

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i php och du vet vad variabler, typer och funktioner innebär.
<!-- Du har kännedom om SQL och databashantering.   -->
Du har gått igenom sessioner och cookies i artikeln "[Kom i gång med PHP på 20 steg](kunskap/kom-i-gang-med-php-pa-20-steg#sessioner)"



En klass för sessionen {#klass-session}
------------------------------

Klassen `Session` ska finurligt nog hantera sessionen. I många lägen klarar man sig med att använda $\_SESSION men det blir trevligt med en klass som hanterar funktionaliteten. En variant är att använda `static`-metoder i klassen. Då behöver den inte instansieras, utan kan användas rakt av:

```php
<?php

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function set($name, $val)
    {
        $_SESSION[$name] = $val;
    }
}

// Use the class
Session::start();
Session::set("name", "John");

```

Smaken är som baken och jag väljer att instansiera min klass.

###__construct() {#construct}

Så, vad behöver vi kunna göra i sessionen? Vi måste såklart kunna starta den, avsluta den, sätta och hämta variabler.
Vi börjar att skapa filen och lägga till en konstruktor. Jag väljer att döpa filen till `Session.php`.

```php
<?php

class Session
{
    private $name;

    /**
     * Constructor
     * @param string $name (optional) The name of the session
     * @return void
     */
    public function __construct($name="MYSESSION")
    {
        $this->name = $name;
    }
}

```

Konstruktorn tar emot ett argument, `$name`, som sätts till "MYSESSION" om inget annat anges. Det är enbart namnet på sessionen. Tanken är att start() ska sparka igång maskineriet. Det är möjligt att man vill hantera fler variabler än sessionens namn i konstruktorn i framtiden.

Nästa steg är att starta sessionen.

###start() {#start}

```php
/**
 * Starts the session if not exists
 * @return void
 */
public function start()
{
    session_name($this->name);

    if (!empty(session_id())) {
        session_destroy();
    }
    session_start();
}
```

Här sätter vi namnet som vi gav sessionen i konstruktorn. Vi kollar sedan om det finns en session startad. I så fall förstör vi den och startar en ny.



###has() {#has}

En annan nyttig metod är has.

```php
/**
 * Check if key exists in session
 * @param $key string The key to check for in session
 * @return bool true if $key exists, otherwise false
 */
public function has($key)
{
    return array_key_exists($key, $_SESSION);
}
```

Den fungerar likt isset() och möjliggör en snabb kontroll om värden finns i sessionen.



###set() {#set}

```php
/**
 * Sets a variable in session
 * @param $key string The key in session
 * @param $val string The value to set to $key
 * @return void
 */
public function set($key, $val)
{
    $_SESSION[$key] = $val;
}
```

Enkelt nog så sätter vi en variabel i sessionen. Och om vi sätter en variabel bör vi kunna hämta den. Vi skapar en "getter".



###get() {#get}

```php
/**
 * Retrieve value if exists in session
 * @param $key string The key to get from session
 * @param $default optional The return value if not found
 * @return string The session variable if present, else $default
 */
public function get($key, $default=false)
{
    return (self::has($key)) ? $_SESSION[$key] : $default;
}
```

Här använder vi först vår egen `has()`-metod för att se om variabeln finns. Gör den inte det returneras `$default`. Vi kan även välja att skicka med ett returvärde. Gör vi inte det sätts den till `false`.

Nästan klart! Vi måste kunna förstöra sessionen med. Låt oss kika på metoden `destroy()`.



###destroy() {#destroy}

```php
/**
 * Destroys the session and sets cookie
 * @return void
 */
public function destroy()
{
    session_destroy();
}
```

Inga konstigheter här inte. Men vi kan använda vår egna metod, vilket känns tryggt.



###delete() {#delete}

Vi vill ju kunna radera enstaka variabler i sessionen. Det gör vi med metoden `delete()`.

```php
/**
 * Deletes variable from session if exists
 * @param $key string The key variable to unset from session
 * @return void
 */
public function delete($key)
{
    if (self::has($key)) {
        unset($_SESSION[$key]);
    }
}
```

Den inbyggda funktionen `unset()` sköter förstörelsen åt oss. Vi behöver bara kontrollera att den finns i sessionen.



###dump() {#dump}

En nyttig metod är att kunna skriva ut hela sessionen. Det kan vi sköta med metoden `dump()`.

```php
/**
 * Dumps the session
 * Good for debugging
 * @return void
 */
public function dump()
{
    var_dump($_SESSION);
}

```

Stiligt. Nu har vi en strålande sessions-wrapper i steg 1.



###Använda klassen {#anvanda-sessionsklassen}

Hur använder vi klassen då? Jo, i detta fallet måste vi instansiera den och starta den.

```php
// Instansisera sessionen
$session = new Session();

// Starta sessionen
$session->start();

// Sätt några variabler
$session->set("firstname", "Steve");
$session->set("lastname", "Urkel");

```

Nu kan vi navigera till en annan sida och använda variablerna. Glöm inte att sessionen måste startas först.

```php
// Instansisera sessionen
$session = new Session();

// Starta sessionen
$session->start();

// Hämta förnamnet från sessionen
echo $session->get("name");             // skriver ut "Steve"

// Har personen ett efternamn sparat?
if ($session->has("lastname")) {
    echo $session->get("lastname");     // Skriver ut "Urkel"
}
```



En klass för cookies {#klass-cookies}
------------------------------

En extra förutsättning (eller rekommendation) är att du har kikat på [kom igång med php på 20 steg, del 17](https://dbwebb.se/kunskap/kom-i-gang-med-php-pa-20-steg#sessioner).

En [cookie](kunskap/kom-i-gang-med-php-pa-20-steg#cookie) fungerar som $\_SESSION på fil som sparas undan. När användaren tex loggar ut, kan en cookie sparas med namn och klockslag. Filen lagras lokalt på datorn i exempelvis 30 dagar och kan då användas när man loggar in igen.

Vi skapar en fil till, `Cookie.php`.

```php
class Cookie
{
    private $expire;

    /**
     * Constructor
     * Sets $expire to 30 days. 86400 = 1 day * 30 = 30 days
     * @return void
     */
    public function __construct($time = 86400*30)
    {
        $this->expire = time() + $time;
    }

    /**
     * Check if key exists in $_COOKIE
     * @param $key string The key to check for in $_COOKIE
     * @return bool true if $key exists, otherwise false
     */
    public function has($key)
    {

    }

    /**
     * Sets a cookie
     * @param $name string The name of the $_COOKIE
     * @param $val string The value of the $_COOKIE
     * @return void
     */
    public function set($key, $val)
    {

    }

    /**
     * Retrieve a cookie
     * @param $key string The key to get from $_COOKIE
     * @param $default optional The return value if not found
     * @return string The cookie if present, else $default
     */
    public function get($key, $default = false)
    {

    }


    /**
     * Dumps the $_COOKIE
     * Good for debugging
     * @return void
     */
    public function dump()
    {

    }

    /**
     * Deletes variable from $_COOKIE if exists
     * @param $key string The key variable to unset from $_COOKIE
     * @return void
     */
    public function delete($key)
    {

    }

    /**
     * Destroys all variables from $_COOKIE if exists
     * @return void
     */
    public function destroy()
    {
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, $value, time()-3600);
        }
    }
}
```

Avslutningsvis {#avslutning}
------------------------------

Nu har vi en klass som kan hantera de grundligaste sakerna i sessions-hantering och en stomme för en klass som hanterar cookies. Vackert, om jag får säga det själv.
