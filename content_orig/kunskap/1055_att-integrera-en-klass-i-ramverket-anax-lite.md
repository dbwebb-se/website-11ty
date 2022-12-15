---
author:
    - mos
    - lew
category:
    - php
    - kurs oophp
revision:
    "2017-03-24": "(A, mos, lew) Första versionen."
...
Att integrera en klass i ramverket Anax Lite
===================================

[FIGURE src=/image/snapvt17/navbar.png?w=c5&a=0,50,0,0 class="right"]

Vi ska se hur man kan integrera en klass, eller tjänst, i ramverket Anax Lite. Som ett exempel tittar vi närmare på hur en navbar, som styrs utifrån en konfigurationsfil, kan integreras i ramverket. Vi tittar på hur koden kan samverka med det omgivande ramverkets klasser, tjänster och struktur.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du har läst artiklarna artikeln "[Bygg ett eget PHP-ramverk](kunskap/bygg-ett-eget-php-ramverk)" och du har kunskaper motsvarande "[Kom igång med objektorienterad PHP-programmering på 20 steg](kunskap/kom-i-gang-med-oophp-pa-20-steg)".

Du har löst uppgiften "[En navbar till Anax Lite (steg 1)](uppgift/en-navbar-till-anax-lite-steg-1)".



Url som exempel {#intro}
------------------------------

Vi har tidigare sett hur tjänster, till exempel `Url`, har integrerats i ramverkets struktur. Dessa tjänster, likt Url, är en del av `$app` och kan användas via `$app->url`.

Om vi kikar på strukturen kring `Url`, så får vi ett exempel på vilka möjligheter som erbjuds för att skapa egna tjänster, som fungerar som en del av ramverket.

Låt oss ta en titt på koden kring Url.



###Url i frontkontroller {#url-front}

Så här ser Url ut i frontkontrollern.

```php
// Make Url part of $app
$app->url = new \Anax\Url\Url();

// Init the url-object with default values from the request object.
$app->url->setSiteUrl($app->request->getSiteUrl());
$app->url->setBaseUrl($app->request->getBaseUrl());
$app->url->setStaticSiteUrl($app->request->getSiteUrl());
$app->url->setStaticBaseUrl($app->request->getBaseUrl());
$app->url->setScriptName($app->request->getScriptName());

// Update url configuration with values from config file.
$app->url->configure("url.php");
$app->url->setDefaultsFromConfiguration();
```

Det första som sker är bara att Url blir en del av $app.

Url är beroende av hur requesten ser ut, därför ser vi en hel del initiering i andra stycket, där vi populerar Url med information från Request.

Urls ansvar är att skapa länkar som är anpassade till ramverkets konfiguration och den läses upp i tredje stycket och sätter grundbeteendet i Url.

Url är alltså en klass beroende av annan information i ramverket och den läser upp en konfigurationsfil som finns sparad någonstans i ramverket.



Integrera Navbar i ramverket {#intnavbar}
-----------------------------------------

Låt oss nu, på ett liknande sätt, integrera koden för Navbar in i ramverkets struktur.

Vi vill integrera Navbar på följande sätt.

1. En klass i `src/Navbar/Navbar.php` med matchande namespace.
1. Klassen läser en konfigurationsfil `config/navbar.php` som innehåller arrayen med navbarens innehåll.
1. Navbaren populeras med de av ramverkets tjänster den använder.
1. Navbaren används i vyn för att generera HTML.

Då börjar vi.



Klassen Navbar {#klassen}
-----------------------------------------

Klassen Navbar sparar vi i `src/Navbar/Navbar.php` och den kan grovt se ut så här.

```php
<?php

namespace Mos\Navbar;

/**
 * Navbar to generate HTML för a navbar from a configuration array.
 */
class Navbar
{
    /**
     * Get HTML for the navbar.
     *
     * @return string as HTML with the navbar.
     */
    public function getHTML()
    {
        ;
    }
}
```

Du använder naturligtvis ditt eget vendor namn i ditt namespace.

Tanken är att logiken för att generera HTML-koden för navbaren ligger i metoden `getHTML()`. Men det är ju fritt att strukturera och namnge som man vill. Även klassen kan du döpa som du vill.



Konfiguration i config/navbar.php {#php}
-----------------------------------------

Tanken är att navbaren finns representerad i en array, det är grundstrukturen, det som behövs, för att generera navbaren. Vi vill samla all denna typen av konfiguration i katalogen `config/`. Det är enklare att göra all konfiguration på en plats.

Om vi kikar på konfigurationsfilen `config/url.php`, som ett exempel, så ser vi dess innehåll.

```php
<?php
/**
 * Config file for url.
 */
return [
    // Defaults to use when creating urls.
    //"siteUrl"       => null,
    //"baseUrl"       => null,
    //"staticSiteUrl" => null,
    //"staticBaseUrl" => null,
    //"scriptName"    => null,
    "urlType"       => \Anax\Url\Url::URL_CLEAN,
    //"urlType"       => \Anax\Url\Url::URL_APPEND,
];
```

Den returnerar alltså en array med detaljer.

Om vi återanvänder arrayen från navbar-uppgiften så skulle vår konfigurationsfil `config/navbar.php` få följande utseende.

```php
<?php
/**
 * Config file for the navbar.
 */
return [
    "config" => [
        "navbar-class" => "navbar"
    ],
    "items" => [
        "hem" => [
            "text" => "Hem",
            "route" => "",
        ],
        "kurser" => [
            "text" => "Kurser",
            "route" => "kurser",
        ],
        "oophp" => [
            "text" => "Kurs oophp",
            "route" => "kurser/oophp",
        ],
    ]
];
```

Principen är att en konfigurationsfil returnerar en array som innehåller den nödvändiga informationen.



Att läsa in konfigurationsfilen {#readconfig}
-----------------------------------------

När Url läser in sin konfigurationsfil så görs det med följade kod i frontkontrollern, i initieringsfasen av klassen.

```php
// Update url configuration with values from config file.
$app->url->configure("url.php");
$app->url->setDefaultsFromConfiguration();
```

Det är det första anropet till `configure("url.php")` som vi nu vill uppnå att vår Navbar-klass skall klara av. Det andra anropet är specifikt för att sätta upp klassen Url, så det steget behöver vi (troligen) inte utföra.

Men, tittar vi på koden för klassen Url så finns inte metoden `configure()`? Hur fungerar detta?



Implementera interface, använd trait {#implements}
-----------------------------------------

Url-klassen använder sig utav ett [_interface_](http://php.net/manual/en/language.oop5.interfaces.php) `Anax\Common\ConfigureInterface` och ett [_trait_](http://php.net/manual/en/language.oop5.traits.php) `Anax\Common\ConfigureTrait` som återfinns i modulen `anax/common`. Du hittar källkoden för dessa filer i `vendor/anax/common/src/Common`.

I klassfilen för Url ser vi ett exempel på en klass som implementerar ett interface och använder ett trait.

```php
class Url implements \Anax\Common\ConfigureInterface
{
    use \Anax\Common\ConfigureTrait;
```

Låt oss börja med att titta på interfacet.



###Interfacet ConfigureInterface {#configureinterface}

Ett interface definierar en uppsättning metoder som en klass måste implementera. Det är möjligt att implementera flera interfaces.

I detta fallet handlar interfacet om metoden `configure()`, det ser vi om vi tittar på källkoden för interfacet.

```php
namespace Anax\Common;

/**
 * Interface for classes needing access to configuration files.
 */
interface ConfigureInterface
{
    /**
     * Read configuration from file or array, if a file, first check in
     * ANAX_APP_PATH/config and then in ANAX_INSTALL_PATH/config.
     *
     * @param []|string $what is an array with key/value config options
     *                        or a file to be included which returns such
     *                        an array.
     *
     * @throws Exception when argument if not a filer nor an array.
     *
     * @return self for chaining.
     */
    public function configure($what);
}
```

Ett interface definierar ett kontrakt, ett löfte. När en klass väljer att implementera ett interface så säger klassen att man lovar att stödja detta interfacet och erbjuda de tjänster som interfacet specificerar. I detta fallet handlar det alltså om att implementera metoden `configure()` enligt ovan.

När man tittar på klasser kan man alltså genom att läsa klassens definition, till viss del se vilka tjänster klassen erbjuder.



###Navbar implements ConfigurationInterface {#navbarimplements}

Låt då klassen Navbar implementera interfacet.

```php
class Navbar implements \Anax\Common\ConfigureInterface
{
```

Nu säger klassen att den lovar att implementera interfacet.

Då skall vi verkligen implementera interfacet också, via ett trait.



###Traitet ConfigureTrait {#configuretrait}

Ett trait är en återanvändbar del av en klass. I detta fallet låter vi traitet skapa den koddel som behövs för att uppfylla interfacet. Samma koddel är användbar för alla klasser som vill använda konfigurationsfiler.

Låt oss kika på hur traitet `ConfigureTrait` ser ut.

Först tittar vi på den inledande delen.

```php
namespace Anax\Common;

/**
 * Trait implementing reading from config-file and storing options in
 * $this->config.
 */
trait ConfigureTrait
{
    /** @var [] $config store the configuration in this array.   */
    private $config = [];
```

Här ser vi att traitet skapar en privat variabel där den avser spara undan konfigurationen.

Sedan tittar vi på själva implementationen av den metod som interfacet anger.

```php
    /**
     * Read configuration from file or array, if a file, first check in
     * ANAX_APP_PATH/config and then in ANAX_INSTALL_PATH/config.
     *
     * @param []|string $what is an array with key/value config options
     *                        or a file to be included which returns such
     *                        an array.
     *
     * @throws Exception when argument if not a filer nor an array.
     *
     * @return self for chaining.
     */
    public function configure($what)
    {
        $anaxInstallPath = ANAX_INSTALL_PATH . "/config/$what";
        $anaxAppPath = ANAX_APP_PATH . "/config/$what";

        if (is_array($what)) {
            $options = $what;
        } elseif (is_readable($anaxAppPath)) {
            $options = require $anaxAppPath;
        } elseif (is_readable($anaxInstallPath)) {
            $options = require $anaxInstallPath;
        } else {
            throw new ConfigurationException("Configure item '$what' is not an array nor a readable file.");
        }

        $this->config = array_merge($this->config, $options);
        return self;
    }
}
```

Metoden i traitet implementerar det kontraktet som interfacet anger.

Låt oss då använda traitet i Navbar.



###Navbar use ConfigurationTrait {#navbaruses}

Via `use` använder klassen Navbar traitet. En klass kan använda flera traits.

```php
class Navbar implements \Anax\Common\ConfigureInterface
{
    use \Anax\Common\ConfigureTrait;
```

Nu är det klart. Man kan se det som att use-konstruktionen kopierar in koden från traitet in i klassen.

På det viset återanvänds kod, skrivet i ett trait, och flera klasser kan dela koden som implementerar interfacet.



###Sätt navbar som en del av $app {#appnavbar}

Nu kan vi sätta upp klassen Navbar som en del av objektet `$app` i frontkontrollern. Det kan se ut så här.

```php
$app->navbar = new \Mos\Navbar\Navbar();
$app->navbar->configure("navbar.php");
```

Det blir ett smidigt sätt att använda klassen och kraftfullt med tanke på att vi kan återanvända ramverkets struktur för konfigurering.



Att injecta beroende till en klass {#inject}
------------------------------

Navbar är beroende av att kunna skapa länkar och att veta om nuvarande länk. Detta är information som ligger i Request (nuvarande länk) och en tjänst som erbjuds av Url (skapa länkar).

Vilka alternativ har vi för att låta Navbar få del av denna information och tjänster?

Låt oss _injecta_ dessa beroende in i klassen på ett par olika sätt.



Låt $app finnas i Navbar {#app2navbar}
------------------------------

En variant är att injecta hela `$app` in i Navbar, på samma sätt som vi gör i `$app->view`.

```php
$app->view = new \Anax\View\ViewContainer();
$app->view->setApp($app);
```

Koden ovan gör så att `ViewContainer` kan dra nytta av alla tjänster som finns i `$app`.

Om vi kikar på koden i `\Anax\View\ViewContainer`, som vi hittar under `vendor/anax/view/src/View`, så ser vi följande struktur för klassen.

```php
namespace Anax\View;

/**
 * A view container, store all views per region, render at will.
 */
class ViewContainer implements
    \Anax\Common\ConfigureInterface,
    \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\ConfigureTrait,
        \Anax\Common\AppInjectableTrait;
```

Vi ser en klass som både är konfigurerbar och kan injectas med `$app` och uppenbarligen finns det både ett interface och ett trait som löser koden bakom detta. Koden för `AppInjectableInterface` och `AppInjectableTrait` återfinner vi under `vendor/anax/common/src/Common`.

Ett alternativ är alltså att göra som ViewContainer och låta Navbar ta del av $app.



Injecta delarna in i Navbar {#injectdel}
------------------------------

Ett annat alternativ är att enbart injecta de delarna som behövs i Navbar. Det kan vi göra med två metoder i Navbar.



###Injecta nuvarande route {#nuvroute}

Först en metod som tar emot nuvarande route.

```php
/**
 * Sets the current route.
 *
 * @param string $route the current route.
 *
 * @return void
 */
public function setCurrentRoute($route)
{
    ;
}
```

Tanken är är att vi, likt hur Url sätts upp, skickar in nuvarande route in i klassen så den kan ta del av den. Så här.

```php
$app->navbar->setCurrentRoute($app->request->getRoute());
```

Bra, nu vet Navbar om vilken som är den nuvarande routen, den informationen behövs för att skapa HTML till navbaren.



###Injecta url-skaparen {#injurlcre}

Den andra delen är att navbar skall kunna skapa länkar via `$app->url->create()`. Även detta beroende kan vi injecta in i klassen via en metod. Det vi skickar in är en funktion, en [_callable_](http://php.net/manual/en/language.types.callable.php).

```php
/**
 * Sets the callable to use for creating routes.
 *
 * @param callable $urlCreate to create framework urls.
 *
 * @return void
 */
public function setUrlCreator($urlCreate)
{
    ;
}
```

Nu får Navbar tillgång till metoden som kan skapa nya länkar under kontroll av ramverket.

Eftersom metoden behöver anropas tillsammans med sin klass, eller instans av klassen, så lägger man både instansen av klassen och dess metod i en array som tillsammans är en callable i PHP.

Så här kan det se ut när man anropar metoden för att sätta länkskaparen in i Navbar.

```php
$app->navbar->setUrlCreator([$app->url, "create"]);
```

Arrayen `[$app->url, "create"]` är här det som betraktas som en callable.

När man sedan anropar denna callable, så gör man så här.

```php
// Alt 1
$htmlNavbar = call_user_func([$app->url, "create"], "my/route");

// Alt 2
$myCallable = [$app->url, "create"];
$htmlNavbar = call_user_func($myCallable, "my/route");
```

På detta sättet kan du få Navbar att skapa länkar med ramverkets tjänst, genom att injecta en callable till instansen/metoden som erbjuder tjänsten.



Injecta när man genererar menyn? {#injectcreate}
------------------------------

Kan man inte göra på annat sätt? Oja, det finna många alternativ, en variant, istället för att skapa desa setter-metoder, är att helt enkelt injecta de beroenden som finns, i samband med själva anropet till `createHTML()`.

Det skulle kunna se ut så här.

```php
/**
 * Get HTML for the navbar.
 *
 * @param string $route the current route.
 * @param callable $urlCreate to create framework urls.
 *
 * @return string as HTML with the navbar.
 */
public function getHTML($route, $urlCreate)
{
    ;
}
```

Det är en variant som minskar antalet setters (och medlemsvariabler).

Vilken variant föredrar du?



Att sköta allt från vyn {#view}
------------------------------

En variant är att _inte_ lägga `$navbar` som en del av alla tjänsterna i `$app`. Istället kan vi flytta den delen av koden ned till vyn. Man kan argumentera att Navbar endast används i en enda vy och varför skall man då lägga en tjänst i ramverket som endast används i en vy?

Det kan vara ett rimligt argument för att flytta koden från frontkontrollern till vyn.

Det tål att tänka på och är ett alternativ att överväga.

Rätt sak har sin rätta plats under givna förutsättningar och behöver man inte ett objekt så är det onödigt att skapa det.



Generera navbar i routen {#iroute}
------------------------------

En annan aspekt är att generera HTML-koden för navbaren direkt i routens hanterar och bifoga som en variabel till vyn. Det vore också en variant till lösning.

Om man gillar vyer utan kod och logik så är det en bra lösning. en del templatemotorer, som sköter vyerna, gillar inte att man skriver PHP-kod i vyerna. I sådana fall måste anropet till Navbar ske i routen.

Det finns många lösningar på ett problem och delvis styr förutsättningarna och omgivningen vilka möjliga lösningar som finns.

Man får tänka efter vilken struktur man vill ha i sitt ramverk och vilka delar som skall ha vilket ansvar och vilka kopplingar till olika delar av ramverket som du vill exponera och tillåta.

Med nuvarande struktur har vi många olika möjligheter till var vi kan skriva koden. Det gäller att ta rätt beslut och att vara konsekvent.



Skapa länkarna i konfigurationsarrayen? {#createinconf}
------------------------------

Men, tänk om jag vill länka till en resurs via `$app->url->asset()` i menyn?

Ja, då faller vår idé om en enda metod för att skapa länkarna i menyn.

Då hade vi fått tänka om och kanske skapat länkarna direkt i konfigurationsarrayen. Men då behöver konfigurationsarrayen ha tillgång till `$app`. Det går att lösa.

Men den varianten tar vi en annan gång. Det får räcka med alternativa lösningar nu.



Avslutningsvis {#avslutning}
------------------------------

Detta var en genomgång om hur man kan tänka och lösa integrationen av en klass, en tjänst, in i ramverkets struktur. Detta är sättet som ramverkets moduler använder sig av för att koppla in sig i ramverket.

En modul är hälsosam om den inte har beroenden till andra, eller i allafall, få beroenden till andra klasser/moduler. Det gör modulen enklare att underhålla, vidareutveckla och återanvända.

Det är sådana anledningar till varför man väljer att skriva sin kod på olika sätt.

Artikeln har en [egen forumtråd](t/6341) där du kan ställa frågor eller bidra med tips och trix.
