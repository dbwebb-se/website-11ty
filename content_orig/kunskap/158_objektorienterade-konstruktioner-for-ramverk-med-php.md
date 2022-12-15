---
author: mos
category: php
updated: "2014-03-08 15:46:39"
created: "2014-03-07 15:49:31"
...
Objektorienterade konstruktioner för ramverk med PHP
==================================

När du har lärt dig grunderna i PHP, och greppat PHP som objektorienterat språk, så kommer nästa steg -- du vill använda ramverk för att bygga dina webbplatser och webbappar. Om du dessutom vill förstå ramverkens uppbyggnad, så behöver du en terminologi och förståelse för konstruktioner som många ramverk bygger på. 

Här är en översikt av några av de mer viktiga konstruktionerna i PHP som du bör ha koll på när du ger dig in i en värld av ramverk.

<!--more-->

Konstruktionerna finns tillgängliga i PHP 5.4 och senare.



Namespace {#namespace}
------------------------------

*Namespace* ger dig möjligheten att skapa en egen namnrymd för dina klasser, funktioner och variabler. Det gör så att din klass, i din modul, kan heta samma sak som en klass i en annan modul. Det underlättar hanteringen av moduler där du kan använda någon annans kod för att integrera i dina projekt. Namnrymder, *namespace*, skyddar din implementation.

Så här skapas en namnrymd för en klass.

```php
namespace Anax\DI;

class CDIFactoryDefault
{
```

Så här skapar man en instans av en klass i ett visst namespace.

```php
// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();
$app = new \Anax\Kernel\CAnax($di);
```

Manualen beskriver [implementationen av namespace](http://php.net/manual/en/language.namespaces.php) och hur den användes. Läs den för att förstå hur namespaces fungerar.



Autoloader PSR-4 {#autoloader}
------------------------------

[PHP-FIG](http://www.php-fig.org/) är en sammanslutning av ramverkstillverkare som försöker enas om kodstandarder, gemensamma interface och komponenter. De skriver rekommendationer där [PSR-0](http://www.php-fig.org/psr/psr-0/) och [PSR-4](http://www.php-fig.org/psr/psr-4/) hanterar namngivning av klasser i samband med namespace, hur de bör lagras i katalogstrukturen och hur de kan autoloadas via [PHPs autoloader-mekanism](kunskap/kom-i-gang-med-oophp-pa-20-steg#autoload).

PHP-FIG har även exempel på [kod till en autoloader](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md) som stödjer både PSR-0 och PSR-4. Det är kod som du kan använda och integrera i dina egna projekt.



Interface {#interface}
------------------------------

Ett *interface* är en mall för en klass. En klass som implementerar ett interface lovar att implementera de funktioner som krävs av interfacet. Ett interface är ett kontrakt och klassen måste uppfylla det kontraktet för att kunna säga att det implementerar ett visst interface.

Guiden ["Kom igång med objektorienterad PHP-programmering på 20 steg"](kunskap/kom-i-gang-med-oophp-pa-20-steg) innehåller ett [stycke om interface](kunskap/kom-i-gang-med-oophp-pa-20-steg#interface).



Abstract class {#abstract}
------------------------------

En abstrakt klass är en klass som inte kan instansieras, det kan inte skapas några objekt av den klassen. En abstrakt klass är till för att subklassas där någon ärver från den, skapar en konkret klass, som i sin tur kan instansieras till ett objekt.

Guiden ["Kom igång med objektorienterad PHP-programmering på 20 steg"](kunskap/kom-i-gang-med-oophp-pa-20-steg) innehåller ett [stycke om abstrakta klasser](kunskap/kom-i-gang-med-oophp-pa-20-steg#abstrakt).



Trait {#trait}
------------------------------

*Traits* är en programmeringskonstruktion för att återanvända kod i programmeringsspråk som är begränsade till en arvshierarki. Det handlar om att lagra kod i en struktur som liknar en klass, men det kallas för trait och kan inkluderas i en eller flera klasser. Kod som lämpar sig i en trait är alltså kod som kan återanvändas mellan flera klasser.

Guiden ["Kom igång med objektorienterad PHP-programmering på 20 steg"](kunskap/kom-i-gang-med-oophp-pa-20-steg) innehåller ett [stycke om traits](kunskap/kom-i-gang-med-oophp-pa-20-steg#traits).



Exception {#exception}
------------------------------

Felhantering med *exceptions* är en vanlig programmeringskonstruktion för felhantering. Så här kastar du ett exception när något går fel.

```php
if (!is_readable($template)) {
    throw new Exception("Could not find template file: " . $template);
}
```

Om du vill fånga de exception som kastas så görs det inom en `try` / `catch` sats.

```php
try {
    callMethodWichMayThrowException();
}
catch ($e) {
    // Exception was thrown, clean up or re-throw a new exception
} 
```

Detta är grunden för hur exceptions fungerar.

Du kan skapa en global hanterare för exceptions, om ett exception inte fångas så kommer det att till slut fångas av den globala exception-hanteraren.

```php
function exceptionHandler($e) {
  echo "Lydia: Uncaught exception: <p>" . $e->getMessage() . "</p><pre>" . $e->getTraceAsString(), "</pre>";
}
set_exception_handler('exceptionHandler');
```

Funktionen `exceptionHandler()` kommer nu att anropas varje gång det händer ett exception som inte fångas. Detta är en bra plats att logga felaktigheter eller skriva ut en snyggare felsida.

I PHP-manualen kan du läsa [om exception](http://php.net/manual/en/language.exceptions.php) och se fler exempel.



Chainable methods {#chainable}
------------------------------

En *chainable method* är en metod som kan kedjas ihop i en sekvens av anrop, en kedja. Så här kan det se ut.

```php
// Prepare the page content
$theme->setVariable('title', "Hello World Pagecontroller")
      ->setVariable('main', "<h1>Hello World Pagecontroller</h1>");
```

Det är alltså ett sätt att skriva sin kod om sparar ett par tecken och som kan leda till lättförståelig kod.

Förutsättningen för att en metod skall bli chainable är att den returnerar `$this`. Så här.

```php
public function setVariable($which, $value)
{
    $this->data[$which] = $value;
    return $this;
}
```

Returnera `$this` så är metoden chainable och kan användas i en anropskedja. Bara för att en metod är chainable så behöver man inte kedja dem, det gå lika bra att skriva koden som vanligt.

```php
$theme->setVariable('title', "Hello World Pagecontroller")
$theme->setVariable('main', "<h1>Hello World Pagecontroller</h1>");
```

Välj själv vilket du tycker ser bäst ut.



Anonymous functions {#anon}
------------------------------

Du kan skriva anonyma funktioner i PHP, det är funktioner som inte behöver finnas definierade som vanliga funktioner. Du kan skicka med dem som argument eller ha dem som callback-funktioner.

Här är ett exempel på en anonym funktion, eller *closure* som det också kallas.

```php
// Home route
$router->add('', function() use ($app) {

    $app->views->add('welcome/index');
    $app->theme->setTitle("Welcome to Anax");

});
```

Det är alltså en funktion som skickas med som ett argument i metoden `$router->add`. När funktionen skall anropas görs det med `call_user_func()`.

```php
// Without arguments
call_user_func($routeHandler);

// With arguments
call_user_func_array($routeHandler, [$param1, $param2]);
```

Här är ett annat exempel om vi vill undvika att skräpa ned i det globala scoopet. Du minns den globala exception-hanteraren ovan, så här ser den ut, omskriven med en anonym funktion.

```php
set_exception_handler( function ($e) {
  echo "Lydia: Uncaught exception: <p>" . $e->getMessage() . "</p><pre>" . $e->getTraceAsString(), "</pre>";
});
```
Snyggt va?

Läs mer om [anonyma funktioner](http://www.php.net/manual/en/functions.anonymous.php) i manualen.



Magic methods {#magic}
------------------------------

I PHP och klasser finns ett antal fördefinierade magiska metoder. De anropas vid speciella tillfällen och genom att implementera dem kan man få klassen att hantera specialfall. En magisk metod börjar med två underscore. Metoderna för konstruktor och destruktor är alltså exempel på två magiska metoder, `__construct()` och `__destruct()`.

Guiden ["Kom igång med objektorienterad PHP-programmering på 20 steg"](kunskap/kom-i-gang-med-oophp-pa-20-steg) innehåller ett [stycke om magiska metoder](kunskap/kom-i-gang-med-oophp-pa-20-steg#magic).



Design patterns {#pattern}
------------------------------

Designmönster är lösningar på vanligt förekommande programmeringsproblem. Vanliga mönster är [*singleton*](kunskap/kom-i-gang-med-oophp-pa-20-steg#singleton) eller *factory*. Det är enklare lösningar som omfattar en eller ett par klasser.

Det finns även större arkitekturella designmönster som omfattar en större lösning i ett helt system. Designmönstret Model, View, Controller (MVC) är ett sådant exempel.

Martin Fowler har en [katalog över ett antal designmönster](http://martinfowler.com/eaaCatalog/). En inflytelserik bok om ["Design Patterns: Elements of Reusable Object-Oriented Software"](http://en.wikipedia.org/wiki/Design_Patterns_(book)) skrevs -96 och blev känd som boken som skrevs av *the gang of four, GoF*. Många designmönster refereras till den boken som GoF mönster.


Principer och filosofier {#princip}
------------------------------

När koden bli allt större och mer avancerad så kan man behöva anamma lite principer, eller filosofier som guidar en i kodandet. 

Läs artikeln ["Principer och filosofier för programmering"](kunskap/principer-och-filosofier-for-programmering) för att få en introduktion i vad det handlar om.



Avslutningsvis {#avslutning}
------------------------------

Nu är du redo att ta dig an ramverkskodande i PHP. Oavsett om du skall skriva ett eget ramverk eller om du tänker använda ett befintligt, nu har du iallafall en grund av de vanliga konstruktioner som används i ett PHP-ramverk.

Fråga gärna i forumet, det finns en särskild [tråd för denna artikel](t/2127).



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2014-03-08 (A, mos) Första utgåvan.  
</span>

