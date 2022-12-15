---
author: mos
category:
    - anax
    - php
    - kursen oophp
revision:
    "2017-03-22": "(D, mos) Länka till resurser med asset()."
    "2017-03-15": "(C, mos) Stycke om Makefile."
    "2017-03-13": "(B, mos) Förbättrad routing."
    "2017-03-10": "(A, mos) Första utgåvan."
...
Bygg ett eget PHP-ramverk
==================================

[FIGURE src=image/snapvt17/anax-lite.png?w=c5 class="right"]

Låt oss bygga ett PHP ramverk från grunden. Inte för avancerat. Inte för simpelt. Det skall vara ett ramverk som erbjuder de vanliga tjänsterna som vi förväntar oss från ett ramverk, samtidigt skall det vara enkelt och inte fullt med features som inte används.

Frågan är vad som är grunden, kärnan, i ett sådant PHP ramverk, minsta möjliga kod som man känner sig att ha full kontroll över, samtidigt som det är utbyggbart vid behov.

Hur svårt kan det vara?

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har goda kunskaper i HTML, CSS och PHP. Du har använt ramverk så du har en grov känsla av vad du kan förvänta dig för tjänster av ramverket.

Du har tillgång till dbwebb-cli.

Min kod från denna artikeln är sparad i repot [canax/anax-lite](https://github.com/canax/anax-lite).

Viss extra kod kan finnas tillgänglig i kursrepo för oophp-kursen.

När jag jobbar igenom artikeln så utgår jag från kursrepots me-katalog. Min anax-lite ligger alltså i `me/anax-lite`.



Ett repo {#repo}
--------------------------------------

Jag börjar med att skapa ett lokalt repo i Git och laddar upp det på GitHub där jag skapat ett motsvarande repo.

Jag gjorde på följande sätt, men huvudsaken är att du skapar ditt eget repo.

```bash
$ mkdir anax-lite
$ cd anax-lite
$ touch README.md LICENSE.txt REVISION.md
$ git init
$ git add .
$ git commit -a -m "First commit"
$ git remote add origin git@github.com:canax/anax-lite.git
$ git push -u origin master
```

Ditt remote add origin är naturligtvis en länk som går till ditt egna GitHub repo.

Bra, ett repo är alltid en bra start.

Det ser ut ungefär så här nu, [första committen](https://github.com/canax/anax-lite/tree/f377e08c1efc95f5cc562adc0d1e981813999e7f), inte mycket, men mer skall det bli.



###Skapa en .gitignore {#gitignore}

Du vill ha en fil `.gitignore` som berättar vilka filer som inte skall inkluderas i ditt gitrepo.

```bash
# Gå till roten av me/anax-lite
$ touch .gitignore
```

Lägg följande rader i filen.

```text
/.bin
/build
/cache
/vendor
```

Fyll på filen med fler filer vid behov, det du lägger i filen kommer att ignoreras av Git-repot.



En frontcontroller {#frontcontroller}
--------------------------------------

Vi behöver en index-sida som kan byggas ut till en frontcontroller. Tanken är att denna sida tar han om samtliga requester som kommer in. En sida för att fånga alla requester.

```bash
$ cd anax-lite
$ mkdir htdocs
$ echo '<?php echo "I wanna be a frontcontroller!";' > htdocs/index.php
```

Du kan göra en `dbwebb publish` och testa din sida. Testa den även lokalt, via din lokala webbserver. Det känns bra att veta om att det fungerar så här långt.



Alla frågor till frontcontrollern med htaccess {#htaccess}
--------------------------------------

Oavsett vilken route som används, så vill vi att requesten skall hamna `index.php` och det löser vi med en rewrite regel i `.htaccess`.

Normalt kan en sådan .htaccess se ut så här.

```text
RewriteEngine on

# Rewrite to Anax frontcontroller
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule (.*) index.php/$1 [NC,L]
```

I kursrepot finns det två exempel på htaccess-filer. En fungerar lokalt och en fungerar både lokalt och på studentservern.

Du kan kopiera in dem till anax-lite från kursrepots exempelfiler.

```bash
# Du står i me/anax-lite
$ cp ../../example/anax-lite/htdocs/.htaccess* htdocs
```

Du kan använda den som heter `.htaccess_wwwstudent` men missa inte att gå in i filen och byta ut `mosstud` mot din egen studentanvändare.

```bash
$ cd htdocs
$ ln -s .htaccess_wwwstudent .htaccess
$ ls -l .htaccess*
lrwxrwxrwx 1 mos mos   20 Mar  2 16:33 .htaccess -> .htaccess_wwwstudent
-rw-r--r-- 1 mos mos  383 Mar  2 16:32 .htaccess_anax
-rw-r--r-- 1 mos mos 1.2K Mar  2 16:32 .htaccess_wwwstudent
```

Om du sitter på Windows och Cygwin så bör du kopiera filen istället för att skapa en symbolisk länk som jag gör ovan. Annars kan det bli problem lokalt. Men på Mac OS och Linux fungerar det utmärkt med länk.

Gör en `dbwebb publish` och kontrollera att oavsett vilken underlänk du skriver in i webbläsaren, så hamnar du i din frontkontroller.

För min del så testade jag följande länkar och alla ledde mig till samma svar från frontkontrollern.

```text
oophp/me/anax-lite/htdocs/
oophp/me/anax-lite/htdocs/moped
oophp/me/anax-lite/htdocs/mumintrollet/bor/i/muminhuset
```

Då skall vi skapa lite intelligens i frontkontrollern.



En klass för request {#request}
--------------------------------------

En request som kommer till frontkontrollern innehåller information om vilken resurs som efterfrågas. Det är typ av request (HEAD, POST, GET, PUT, mfl), routen som önskas och detaljer om server och port.

Det krävs kod som extraherar informationen från själva requesten. Det är det allra första vi behöver.

Ett ramverk löser ofta detta med en klass `Request` och i vårt fall så rundar vi ett hörn och återanvänder en klass som redan är skriven för detta syfte.

Klassen [anax/request](https://packagist.org/packages/anax/request) finns på Packagist och vi installerar den med pakethanteraren composer. 

```bash
# Ställ dig i me/anax-lite
$ composer require anax/request
```

Modulen installeras under katalogen `vendor/anax/request`. Du kan kika kort på källkoden i modulen, den ligger under src-katalogen och enhetstesterna ligger under test-katalogen.



###Modulen har egna testprogram {#modultest}

Om du vill köra modulens egna tester, så kan du göra det.

```bash
$ cd vendor/anax/request
$ make
$ make install
$ make test
```

Låt mig nu visa hur du använder modulen.



Visa alla felmeddelanden {#visafel}
--------------------------------------

Innan vi använder modulen så sätter vi på så att alla felmeddelanden visas. Det blir enklare att felsöka på det viset.

I kursrepot finns en exempelfil `example/anax-lite/config/error_reporting.php` som visar hur vi sätter på felmeddelanden.

Den ser ut så här.

```php
/**
 * Set the error reporting.
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

/**
 * Default exception handler.
 */
set_exception_handler(function ($e) {
    echo "Anax: Uncaught exception: <p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><pre>"
        . $e->getTraceAsString()
        . "</pre>";
});
```

Du kan ta en kopia av den filen och lägga in i ditt anax-lite under `config/error_reporting.php`.

```bash
# Du står i me/anax-lite
$ mkdir config
$ cp ../../example/anax-lite/config/error_reporting.php config
```

Denna typen av felhantering är bra när vi är i utvecklingsläge, när vi sätter webbplatsen i produktion så kan vi vara mer strikta med vilka felmeddelanden vi visar. Ofta vill man i produktionsläge logga eventuella fel till fil och inte visa något för användaren.

Bra, då är vi redo att börja använda modulen för request.



Använda modulen anax/request {#request}
--------------------------------------

Vi använder modulen i frontkontrollern. Vi låter den bara skriva ut all information som den tagit hand om, bara för att se hur den fungerar.

Uppdatera din frontkontroller med följande kod.

```php
/**
 * Bootstrap the framework.
 */
// Where are all the files? Booth are needed by Anax.
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));
define("ANAX_APP_PATH", ANAX_INSTALL_PATH);

// Include essentials
require ANAX_INSTALL_PATH . "/config/error_reporting.php";

// Get the autoloader by using composers version.
require ANAX_INSTALL_PATH . "/vendor/autoload.php";

// Create and use an object of the request class.
$request = new \Anax\Request\Request();
$request->init();
var_dump($request);

echo "Done";
```

Den första delen *bootstrappar* ramverket med grunden som behövs för att saker skall fungera. Sedan skapas en instans av request-klassen, den initieras och skrivs ut.

Studera informationen som skrivs ut och se vilka delar av requesten som sparas undan.

Nu har vi full koll på inkommande request och vilka delar den består av.

Men hur skall vi använda den informationen?



Skapa länkar med anax/url {#url}
--------------------------------------

Jo, en vanlig problemställning i ett ramverk är hur man skapar länkarna. För att det skall fungera smärtfritt så överlåter man åt ramverkets funktioner hur länkar skapas. Då kan ramverket ta hänsyn till var det finns installerat och skapa länkar som matchar installationen.



###Modulen anax/url {#anaxurl}

Att skapa länkar på "rätt sätt", är inte trivialt så jag väljer att låna en klass som redan löst detta, `anax\url`, en ny modul alltså.

```bash
# Gå till me/anax-lite
$ composer require anax/url
```

Då ligger modulen i vendor katalogen under `vendor/anax/url`, redo att användas. Vi fick även med en extra modul `anax/common` som används av `anax/url`. Det är en modul som återanvänds av flera komponenter i anax.

Det är klokt att gå in och kika kort på de filer och den filstruktur som finns under src- och test-katalogen i respektive modul. Det är bra att veta var man hittar den ultimata referensmanualen, källkoden alltså.



###Konfigurera modulen url {#configurl}

Modulen kan generera länkar på två sätt, antingen `index.php/this/route` eller `this/route`. Det är en konfigurering av klassen som bestämmer vilken typ av länkar som genereras. Den första länken fungerar utan htaccess, medans den andra kräver htaccess.

Url-klassen är beroende av request-klassen, url-klassen behöver initieras med information om själva requesten. Det är för att länkarna skall skapas på rätt sätt och grundinformationen finns i själva requesten.

Vi har redan en katalog `config` så jag väljer att lägga den konfiguration som behövs där.

En konfiguration av url-modulen kan se ut så här.

```php
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
    //"urlType"       => self::URL_CLEAN,
    "urlType"       => self::URL_APPEND,
];
```

Modulen innehåller ett exempel på konfigurationsfilen i `vendor/anax/config/url.php`. Du kan kopiera den till din egna config-katalog.

```bash
# Du står i me/anax-lite
$ cp vendor/anax/url/config/url.php config
```

Tanken är att man lyfter ut saker som kan konfigureras till egna filer och samlar dem på en plats. Det är därför vi bygger upp config-katalogen med det som är "konfigurerbart".



###Initiera modulen url {#initurl}

Då tar vi och uppdaterar frontkontrollern med kod som dels initierar modulen url och dels använder den för att skapa länkar.

Lägg till följande i slutet av din frontkontroller.

```php
// Create and init an instance of url.
$url = new \Anax\Url\Url();

// Set default values from the request object.
$url->setSiteUrl($request->getSiteUrl());
$url->setBaseUrl($request->getBaseUrl());
$url->setStaticSiteUrl($request->getSiteUrl());
$url->setStaticBaseUrl($request->getBaseUrl());
$url->setScriptName($request->getScriptName());

// Update url configuration with values from config file.
$url->configure("url.php");
$url->setDefaultsFromConfiguration();
```

Koden skapar en instans av url-klassen och därefter används informationen från request-objektet för att sätta nödvändig grundinformation i url-objektet.

I slutet läses konfigurationsfilen in, man kan alltså förändra konfigurationen av hur länkar skapas genom att justera konfigfilen. Ett exempel på när det är bra är när man har en alternativ adress där man levererar statiska delar såsom bilder, javascript- och css-filer. Det är inte ovanligt att man har en speciell http-server för de statiska delarna av en webbplats, det gör att man kan optimera den typen av requester.



###Testa modulen url {#testurl}

Nu kan vi testa modulen genom att skapa länkar och se resultatet.

Lägg till följande i slutet av din frontkontroller.

```php
// Create some urls.
$aUrl = $url->create("");
echo "<p><a href='$aUrl'>The index url, home</a> ($aUrl)";

$aUrl = $url->create("some/route");
echo "<p><a href='$aUrl'>Url to some/route</a> ($aUrl)";

$aUrl = $url->create("some/where/some/route");
echo "<p><a href='$aUrl'>Another url to some/where/some/route</a> ($aUrl)";
```

Koden använder modulen url för att skapa länkar. Visa sidan i din webbläsare och klicka på länkarna för att se att alla leder in i frontkontrollern.

Pröva nu att gå in i konfigfilen för url, `config/url.php`, och ändra så att snygga länkar skapas via `URL_CLEAN`.

Du bör se skillnaden i länkarna att skriptnamnet försvinner, de blir lite snyggare.

Klicka på de snygga länkarna och se att de alla leder till frontkontrollern. Detta kräver att din htaccess fungerar som den ska. Om du får problem med snygga länkar så kan du behöva felsöka din htaccess-fil.

Det verkar som modulerna request och url fungerar ihop.

En request- och en url-modul, det är en bra start. Men vad är härnäst, om vi vill bygga en webbapplikation/webbplats med vårt ramverk?

Nästa steg får bli hur vi kan skriva kod för att hantera olika routes.



###Att länka filer och bilder med asset() {#asset}

När du vill skapa en länk till en resurs, en _asset_, i form av bilder, stylesheets, javascript eller andra filer, så använder du metoden `$url->asset()`. Den metoden ignorerar `SCRITP_NAME` när länken skapas.

Kom alltså ihåg att skapa länkar som leder in i frontkontroller och ramverk via `$this->create()` och länkar till resurser skapar du med `$url->asset()`.



En router {#router}
--------------------------------------

En router är en vanlig komponent i ramverk. Den behövs för att vi skall kunna utföra olika svar på respektive inkommande routes.

Det kan se ut så här, när man strukturerar koden med en router med callbacks för respektive route.

```php
$router->add("", function() {
    // Provide a response matching the index url
});

$router->add("about", function() {
    // Provide a response matching about url
});

$router->add("about/me", function() {
    // Provide a response matching about/me url
});
```

En router är beroende av modulen request för att få information om den aktuella routen.

Tanken är att man lagrar undan callbacks till alla de routes som skall hanteras. Lite som en container av routes. Sedan när man vill behandla requesten så kollar man vilka routes som finns och om någon matchar så används dess callback för att leverera själva svaret, responset.



###Modul för router {#modulrouter}

Att bygga en router låter som ett större projekt så jag tar och lånar en modul [anax/router](https://packagist.org/packages/anax/router) som redan finns.

```bash
$ composer require anax/router
```

Bra, då har vi även en router på plats i vendor-katalogen. Kika gärna på dess källkod, både i src- och test-katalogen. Du kan se att det finns en klass för routern (`RouterInjectable`) och en klass för routes (`Route`). Det är främst klassen för routern som vi använder. Den använder i sin tur de andra klasserna.



###Testa routern {#testrouter}

Vi kan nu testa routern. Först skapar vi en fil där vi samlar alla de routes vi vill ha. Filen får ligga i `config/route.php`.

```php
<?php
/**
 * Routes.
 */
$router->add("", function () {
    echo <<<EOD
<!doctype html>
<meta charset="utf-8">
<title>Home</title>
<h1>Home</h1>
<p>This is the homepage.</p>
EOD;
});

$router->add("about", function () {
    echo <<<EOD
<!doctype html>
<meta charset="utf-8">
<title>About</title>
<h1>About</h1>
<p>This is the page about me.</p>
EOD;
});

$router->addInternal("404", function () {
    echo <<<EOD
<!doctype html>
<meta charset="utf-8">
<title>404</title>
<h1>404 Not Found</h1>
<p>The route could not be found!</p>
EOD;
});
```

Det är två routes som returnerar varsin HTML-sida. Den sista routen är en intern route som används för felhantering när en route inte kan hittas. Den interna routen kan inte nås från webbläsaren, den är intern för ramverket.

För att detta nu skall fungera så behöver vi skapa `$router` i vår frontkontroller och därefter inkludera filen med alla routes.

```php
// Create the router
$router = new \Anax\Route\RouterInjectable();

// Load the routes
require ANAX_INSTALL_PATH . "/config/route.php";

// Leave to router to match incoming request to routes
$router->handle($request->getRoute(), $request->getMethod());
```

Det sista vi gör är att överlåta till routern att hantera och matcha inkommande route mot de routes som finns. Routern tar även hänsyn vilken request method som använts.

Nu kan du pröva olika routes mot din frontkontroller och se olika svar. Du har två routes som fungerar, "" och "about", alla andra resulterar i att den interna routen för 404 visas.

Det närmar sig.



###Organisera dina routes {#orgroutes}

Ta mitt tips att redan nu börja organisera dina routes i filer. Dela upp dina nuvarande routes i två filer och lägg dem i `config/route/internal.php` respektive `config/route/base.php`.

Skapa katalogen `config/route` om den inte finns.

I längden kan det samlas en hel del kod i dessa routes och det är en god tanke att dela upp koden i filer.

När du är klar så inkluderar du de routes som du vill använda via `config/route.php`.

```php
/**
 * Routes.
 */
require __DIR__ . "/route/internal.php";
require __DIR__ . "/route/base.php";
```

Det är små saker som gör att man får ordning och struktur.



###Route med parameter {#routepara}

Du kan skapa routes som är dynamiska och skickar med en parameter till routens callback.

En sådan route kan se ut så här.

```php
$app->router->add("search/{string}", function ($string) use ($app) {
    $data = [
        "Searchstring was" => $string
    ];

    $app->response->sendJson($data);
});
```

Du omsluter den delen av routen som skall bli en parameter med måsvingarna `{}`. Det spelar ingen roll vilken text du skriver innanför måsvingarna, eller vilken namngivning du har av parametern i callbacken, det är godtyckligt.



###Route med parameter av viss typ {#routeype}

När man använder parametrar kan man också testa så att parametern är av en viss typ. Kika på följande exempel på fyra routes som har olika hanterare beroende på vilken typ som matchas.

```php
/**
 * Check arguments that matches a specific type.
 */
$callback = function ($value) use ($app) {
    $data = [
        "route"     => $app->request->getRoute(),
        "matched"   => $app->router->getLastRoute(),
        "value"     => $value,
    ];

    $app->response->sendJson($data);
};

$app->router->add("validate/{value:digit}", $callback);
$app->router->add("validate/{value:hex}", $callback);
$app->router->add("validate/{value:alpha}", $callback);
$app->router->add("validate/{value:alphanum}", $callback);
```

Med typer så kan man mer noggrant matcha de routes som stöds.



Ett app-objekt för att samla {#app}
--------------------------------------

Det börjar bli en del kod och det är lika bra att städa lite.

Jag tar bort alla utskrifter från frontkontrollern så att den utskrift som kommer blir från routens hanterare.

Sen ser jag ett behov av att samla alla resurser i ramverket inom ett objekt som kan skickas runt. Till exempel så vill jag skapa länkar i routens hanterare som då behöver känna igen `$url`.

Det få bli ett `$app` som samlar alla ramverkets resurser.



###En egen src-katalog {#src}

Jag tar och skapar en katalog `src/App` och lägger där klassfilen `App.php`.

```bash
# Gå till me/anax-lite
$ install -d src/App
$ touch src/App/App.php
```

I filen `App.php` lägger du in följande innehåll.

```php
<?php 

namespace Anax\App;

/**
 * An App class to wrap the resources of the framework.
 */
class App
{
    
}
```

Den innehåller inte så mycket. Men det gör inget, vi skall snart fylla den med ramverkets resurser, på ett sätt som fungerar eftersom PHP har *mutable* klasser, de kan ändra sitt innehåll efter att de är skapade. 

Notera att det står namespace `Anax\App`, jag tänker byta det till `Mos\App` för att visa att jag (Mos) är den vendor som skapat källkoden under src. Du hittar på ditt eget vendornamn, det får bli ditt eget varumärke som visar att du skrivit koden.



###Autoloader för egen kod {#autoegen}

All kod som ligger i vendor-katalogen sköts av composers autoloader. Det är smidigt och vi vill nu använda composers autoloader till att även göra autoloading av vår egen källkod som vi nu lägger i katalogen `src`.

För tillfället ser den av composer automatgenererade filen `composer.json` ut ungefär så här.

```json
{                                
    "require": {                 
        "anax/request": "^1.0",  
        "anax/url": "^1.0",      
        "anax/router": "^1.0"    
    }                            
}                                
```

Den innehåller alla de moduler som vi hittills installerat.

Uppdatera nu `composer.json` med allmän information samt koppla ditt egen namespace till all källkod som ligger under src-katalogen. Composers autoloader kommer lösa så att dina klassfiler hittas.

Så här.

```json
{
    "name": "mos/anax-lite",
    "description": "A small PHP framework.",
    "license": "MIT",
    "authors": [
            {
                "name": "Mikael Roos",
                "email": "mos@dbwebb.se"
            }
    ],
    "require": {
        "anax/request": "^1.0",
        "anax/url": "^1.0",
        "anax/router": "^1.0"
    },
    "autoload": {
        "psr-4": {"Mos\\": "src/"}
    }
}
```

Som sagt så är Mos mitt vendornamn i mitt namespace och du byter ut det mot ditt eget. Byt även ut allt annat som är kopplat till mos, så att det blir din egna kod. 

När det är klart så låter du composer validera konfig-filen och sen dumpar vi ut den uppdaterade autoloadern.

```bash
$ composer validate
$ composer update
```

Nu kan vi använda composers autoloader för vår egen kod.



###Skapa $app {#createapp}

Källkoden för klassen App ligger nu i `src/App/App.php`, den har ett namespace som är `Mos\App` och du har bytt ut Mos mot din egen valfria vendor-akronym. Via `composer.json` så kopplar composers autoloader mitt namespace till min källkodsfil.
 
I slutet av frontkontrollern kan vi skapa `$app` och fylla den med de resurser som ramverket har tillgång till.

```php
// Add all resources to $app
$app = new \Mos\App\App();
$app->request = $request;
$app->url     = $url;
$app->router  = $router;
```

Bra, lite ordning och reda bland klasserna.



###Städa frontkontrollern {#stada}

Nu har jag en salig blandning av hur jag använder klasserna i frontkontrollern. Jag tänker nu städa upp och enbart använda klasserna utifrån mitt objekt `$app`. 

Efter städningen ser nu min frontkontroller ut så här.

```php
<?php
/**
 * Bootstrap the framework.
 */
// Where are all the files? Booth are needed by Anax.
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));
define("ANAX_APP_PATH", ANAX_INSTALL_PATH);

// Include essentials
require ANAX_INSTALL_PATH . "/config/error_reporting.php";

// Get the autoloader by using composers version.
require ANAX_INSTALL_PATH . "/vendor/autoload.php";

// Add all resources to $app
$app = new \Mos\App\App();
$app->request = new \Anax\Request\Request();
$app->url     = new \Anax\Url\Url();
$app->router  = new \Anax\Route\RouterInjectable();

// Init the object of the request class.
$app->request->init();

// Init the url-object with default values from the request object.
$app->url->setSiteUrl($app->request->getSiteUrl());
$app->url->setBaseUrl($app->request->getBaseUrl());
$app->url->setStaticSiteUrl($app->request->getSiteUrl());
$app->url->setStaticBaseUrl($app->request->getBaseUrl());
$app->url->setScriptName($app->request->getScriptName());

// Update url configuration with values from config file.
$app->url->configure("url.php");
$app->url->setDefaultsFromConfiguration();

// Load the routes
require ANAX_INSTALL_PATH . "/config/route.php";

// Leave to router to match incoming request to routes
$app->router->handle($app->request->getRoute());
```

Du känner igen all kod sedan tidigare, den är bara omstrukturerad.

Jag behöver även gå in i `config/route.php` för att ändra `$router` till `$app->router`.

Nu kan jag testa och mina routes bör fungera. 



Använda Url i Routes {#appurl}
--------------------------------------

Det vore trevligt om jag kunde länka mellan olika sidor, en enklare navbar kanske. Jag har tillgång till allt jag behöver, jag måste bara placera koden på rätt plats.



###Skapa navbaren med länkar {#navbar1}

Sedan tidigare vet jag att länkar skall skapas av ramverket via `$app->url->create("")`. En navbar för min webbplats kan alltså se ut så här.

```php
$urlHome  = $app->url->create("");
$urlAbout = $app->url->create("about");
$navbar = <<<EOD
<navbar>
    <a href="$urlHome">Home</a> | 
    <a href="$urlAbout">About</a>
</navbar>
EOD;
```

Koden för navbaren behöver komma in i varje routehandler där den skall visas.



###Navbar in i route handler {#navbar2}

Om jag modifierar mina routes i `config/route.php`, så kan det se ut så här, för att implementera en navbar.

```php
$app->router->add("", function () use ($app) {
    $urlHome  = $app->url->create("");
    $urlAbout = $app->url->create("about");
    $navbar = <<<EOD
<navbar>
    <a href="$urlHome">Home</a> | 
    <a href="$urlAbout">About</a>
</navbar>
EOD;

    $body = <<<EOD
<!doctype html>
<meta charset="utf-8">
<title>Home</title>
$navbar
<h1>Home</h1>
<p>This is the homepage.</p>
EOD;

    echo $body;
});
```

Notera att callbacken för routen nu använder `function () use ($app)` vilket gör att callbacken får tillgång till variabeln `$app` som innehåller alla ramverkets resurser.

Om jag gör motsvarande uppdatering i de andra routsen, så får jag en navbar som hjälper mig att hoppa mellan sidorna.



Extra debugging i 404 {#debugg}
--------------------------------------

Nu när vi har tillgång till hela ramverket i routens hanterare så kan jag uppdatera min interna route 404 för att skriva ut extra debugging. Det kan vara bra när man sitter och utvecklar i ramverket.

Min uppdaterade 404-route ser ut så här.

```php
$app->router->addInternal("404", function () use ($app) {
    $currentRoute = $app->request->getRoute();
    $routes = "<ul>";
    foreach ($app->router->getAll() as $route) {
        $routes .= "<li>'" . $route->getRule() . "'</li>";
    }
    $routes .= "</ul>";

    $intRoutes = "<ul>";
    foreach ($app->router->getInternal() as $route) {
        $intRoutes .= "<li>'" . $route->getRule() . "'</li>";
    }
    $intRoutes .= "</ul>";

    $body = <<<EOD
<!doctype html>
<meta charset="utf-8">
<title>404</title>
<h1>404 Not Found</h1>
<p>The route '$currentRoute' could not be found!</p>
<h2>Routes loaded</h2>
<p>The following routes are loaded:</p>
$routes
<p>The following internal routes are loaded:</p>
$intRoutes
EOD;

    echo $body;
});
```

Routen skriver ut information om requesten som användes, dess upplevda route, samt de routes som är laddade i ramverket.

Se det som en möjlighet att skriva ut diverse information om vad ramverket innehåller, en möjlighet till debugging. Ännu bättre är kanske att göra en helt egen route som bara visar dig den debugginginfo som du vill ha. Det kan vara ett bra sätt att lära känna ramverket och dess resurser, ett sätt att leka runt.



Skicka svaret med modulen Response {#response}
--------------------------------------

Om vi kikar extra noga på svaret från den interna routen 404, så ger den statuskoden 200 tillbaka. Du kan se vilken statuskod som sidan ger i devtools network-fliken.

Statuskoden borde varit 404.

Nåväl, låt oss hämta hem och använda en response-modul som kan hjälpa oss att bättre hantera svaret som vi ger i routens callback. Det är modulen [anax/response](https://packagist.org/packages/anax/response) som är aktuell.



###Modul för response {#modulresponse}

Det finns alltså en modul som är gjord för att leverera HTTP-svaret, ett response som matchar inkommande request. Vi använder composer för att hämta det.

```bash
$ composer require anax/response
```

Kika gärna på källkoden för response, både i src- och i test-katalogen. Den ligger nu i din vendor-mapp. Kör gärna modulens testprogram.

Tänk på response-modulen som att den skickar HTTP-responset, i form av HTTP headers och HTTP body. När vi tänker på själva HTML-sidan som visas så är den innehållet i HTTP responsets body. 



###Använd response {#anvandresp}

Vi kan nu gå över till att använda response-klassen i routens handler. Men först måste vi lägga till response som en del i ramverket och i `$app`.

I frontkontrollern lägger jag till klassen som en del av `$app`.

```php
// Add all resources to $app
$app = new \Mos\App\App();
$app->request  = new \Anax\Request\Request();
$app->response = new \Anax\Response\Response();
```

Nu är klassen response en del av $app-objeket.

Sedan uppdaterar jag mina routes och ändrar sista delen där saker skrivs ut.

```php
//echo $body;
$app->response->setBody($body)
              ->send();
```

Det är ingen stor ändring, jag överlåter bara till klassen response att sköta utskriften av resultatet, svaret. Klassen response är förberedd för att hantera HTTP headers och det vill jag ha möjligheten att använda.

Som ett exempel så ser vi min route för 404 där jag vill skicka med statuskoden 404, istället för som nu då det blir 200.

Det kan jag göra på följande vis.

```php
$app->response->setBody($body)
              ->send(404);
```

Argumentet som skickas med till `send()` är statuskoden som klassen response omvandlar till ett korrekt anrop med `header("HTTP/1.1 404 Not Found")`. Den typen av hantering kan response lösa åt mig.



###Skicka JSON som response {#jsonresp}

En annan sak som request-klassen kan lösa är att förenkla hanteringen av svar som skall levereras som JSON. Låt oss göra en ny route som skickar med detaljer om servern i ett JSON objekt och inte i en HTML-sida.

```php
$app->router->add("status", function () use ($app) {
    $data = [
        "Server" => php_uname(),
        "PHP version" => phpversion(),
        "Included files" => count(get_included_files()),
        "Memory used" => memory_get_peak_usage(true),
        "Execution time" => microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],
    ];

    $app->response->sendJson($data);
});
```

Nu ser man lite mer av styrkan. Klassen response löser encoding av JSON-datan samt lägger till den `header("Content-Type: application/json; charset=utf8")` som är nödvändig.

Nu har vi ett fungerande response-objekt. Vi närmar oss grunden i ett ramverk, eller iallafall i ett mikroramverk.



Vyer {#vyer}
--------------------------------------

En del mikro-ramverk väljer att inte inkludera vyer i sitt grundpaket. De ser det som en utökning, en addon.

Men vi kommer att behöva skapa innehåll till webbplatsen och utan en struktur av vyer så kladdar vi ned vår övriga kod med en blandning av HTML, PHP och innehållet - sidornas content. Det blir stökig kod.

Så, visst hade det varit skönt att lägga ut det som är vyer till egna filer. Routerna ser ju faktiskt lite stökiga ut nu.

Nåväl, låt oss integrera vyer.



###En modul för vyer {#moduleview}

Som tidigare så tar vi en färdig modul i form av [anax/view](https://packagist.org/packages/anax/view).

```bash
$ composer require anax/view
```

Kika gärna på de klasserna som ingår i modulen. Det handlar om att spara undan view-filer, eller template-filer som de också kan kallas. I dem lägger vi HTML-kod tillsammans med PHP-skripttaggar som skriver ut den `$data` som är tillgänglig i view-filen.

Det finns med ett par exempel på view-filer i modulen. Du hittar dem i `vendor/anax/view/view` och du kan kopiera den katalogen till ditt anax-lite, så har vi några view-filer att utgå ifrån. Det kan vara bra att se hur view filer kan se ut och fungera.

```bash
# Du står i anax-lite
$ rsync -av vendor/anax/view/view .
```

Kika igenom innehållet i katalogen. Det är exempel på view-filer.

Principen bakom view-filer, är att man samlar ihop all data som behövs, sedan *skickar* man datan till view-filen som renderar ett svar, ofta i form av en del av en HTML-sida.



###Aktivera vyerna i $app {#aktiveraview}

Då aktiverar vi vyerna genom att göra view-kontainern som en del av `$app`.

Följande kod löser det i vår frontkontroller.

```php
$app->router   = new \Anax\Route\RouterInjectable();
$app->view     = new \Anax\View\ViewContainer();

// Inject $app into the view container for use in view files.
$app->view->setApp($app);

// Update view configuration with values from config file.
$app->view->configure("view.php");
```
Du ser var jag lade koden, direkt under där `$app->router` skapades.

Jag har en initieringsfas där jag injectar `$app` in till view-kontainern. Det är för att jag i view-filerna vill ha tillgång till ramverkets resurser via `$app`. Det är smidigt och kraftfullt och tillåter att jag har full kontroll i vyerna.

Slutligen laddar jag en konfigurationsfil som innehåller vissa inställningar som view-kontainern behöver.

Du kan låna den konfigurationsfil som bifogas i modulen.

```bash
$ cp vendor/anax/view/config/view.php config
```

Kika i konfigurationsfilen `config/view.php` för att se vad den innehåller. Du behöver inte ändra något.

Fint, då kan vi arrangera om vår kod i routern och börja använda vyerna.



###Skapa vyer av innehållet i routen {#createview}

Till att börja med så kikar vi på en av de routes vi har för tillfället.

```php
$app->router->add("", function () use ($app) {
    $urlHome  = $app->url->create("");
    $urlAbout = $app->url->create("about");
    $navbar = <<<EOD
<navbar>
    <a href="$urlHome">Home</a> | 
    <a href="$urlAbout">About</a>
</navbar>
EOD;

    $body = <<<EOD
<!doctype html>
<meta charset="utf-8">
<title>Home</title>
$navbar
<h1>Home</h1>
<p>This is the homepage.</p>
EOD;

    $app->response->setBody($body)
                  ->send();
});
```

Här ser jag tre möjliga view-filer, template-filer. Som du kan se av nedan filnamn, så väljer jag att spara mina view-filer under `view/take1` och `take1` är bara ett godtyckligt namn som samlar dessa view-filer under en variant av namnrymd.

**`view/take1/header.php`**

```php
<!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
```

**`view/take1/navbar.php`**

```php
<?php
$urlHome  = $app->url->create("");
$urlAbout = $app->url->create("about");

?><navbar>
<a href="<?= $urlHome ?>">Home</a> | 
<a href="<?= $urlAbout ?>">About</a>
</navbar>
```

**`view/take1/home.php`**

```php
<h1>Home</h1>
<p>This is the homepage.</p>
```

Detta skulle kunna vara en första ansats till att dela upp sidans innehåll i view-filer. Låt oss pröva hur det kan fungera.



###Ladda vyerna {#loadviews}

När vi nu har view-filerna klara och vi kan ladda dem i routen. Den uppdaterade routen följer.

```php
$app->router->add("", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("take1/navbar");
    $app->view->add("take1/home");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});
```

Visst blev det snyggare?

Ovan kan du se hur vi lägger till tre vyer till `$app->view`.

I header-vyn så bifogar vi en variabel som nås via `$titel` i view-filen. De andra får inga variabler inskickade.

Det sista vi gör är att skicka metoden `$app->view->render()` till response som en *[callable](http://php.net/manual/en/language.types.callable.php)*. Det är ett sätt att bifoga en funktion som kan anropas vid ett senare tillfälle. Det som sker i responseobjektet är att det känner av om det är en callable som finns i argumentet och isåfall exekveras funktionen och resultatet sätts som responsets body.

Nu kan du själv städa upp de andra routsen så att de blir lika snygg med vyer. När du är klar så har du städat upp vyerna och det finns inte någon HTML-kod kvar i någon route, den är överflyttad till view filer.

Bra med ordning och reda där var sak har sin plats.



Grunden i ett ramverk {#grunden}
--------------------------------------

Du har har nu skapat grunden till ditt eget PHP-ramverk, eller kanske ett mikroramverk, den viktigaste grunden i ett ramverk. Du har sett exempel på de vanligaste modulerna som ingår i grunden i ett ramverk.

Vill du se exempel på andra liknande PHP ramverk så googlar du på "PHP micro frameworks". Om du tittar på ett par av dem, via deras dokumentation, så kommer du att se motsvarande moduler.

För att summera de modulerna vi valt att fylla vårt anax-lite med så listar vi dem i en tabell.

| Modul         | Funktion                       |
|---------------|--------------------------------|
| anax/request  | Samla all information om själva HTTP requesten och förbered grunden för att skapa länkar och sortera ut vilken route som efterfrågas. |
| anax/response | Leverera ett svar i form av ett HTTP resonse med headers och body. |
| anax/url      | Överlåt skapandet av länkar till ramverket. |
| anax/router   | Skapa routes med hanterar för att dela upp koden. |
| anax/view     | Fördela ut HTML-kod (och innehåll) till vy-filer som kan renderas till en HTML-sida. |
| anax/common   | Grundkod som används och delas av flera Anax moduler. |

Där har vi grunden till vårt ramverk. Till det kommer vår frontkontroller, htaccess-filerna och vår tanke bakom `$app` objektet.

Detta får bli en grund som vi bygger vidare på. 



Inkludera Cimage {#cimage}
--------------------------------------

Om du vill använda Cimage för att hantera bilderna så kan du komma igång snabbt på följande sätt. Det handlar om att installera [mos/cimage](https://packagist.org/packages/mos/cimage) med composer, och integrera Cimage i din anax-lite.

```bash
# Gå till me/anax-lite
$ composer require mos/cimage
$ install -d htdocs/{img,cimage} cache/cimage
$ chmod 777 cache/cimage
$ rsync -av vendor/mos/cimage/{icc,webroot/imgd.php} htdocs/cimage
$ rsync -av vendor/mos/cimage/webroot/img/car.png htdocs/img
$ touch htdocs/cimage/imgd_config.php
```

I konfigfilen `htdocs/cimage/imgd_config.php` lägger du följande kod.

```php
<?php
return [
    "mode"         => "development",
    "image_path"   =>  __DIR__ . "/../img/",
    "cache_path"   =>  __DIR__ . "/../../cache/cimage/",
];
```

Nu har du inkluderat ett enkelt sätt att hantera bilder. De htaccess-filer som du använder är förberedda för Cimage. Förutsatt att du använder htaccess-filerna så kan du nu använda Cimage via följande länk-struktur.

> `image/car.png?w=400`



Makefile {#makefile}
--------------------------------------

Du är på gång att skapa ett större projekt och du kan ha nytta av en Makefile där du kan lägga in targets för saker du gör om och om igen.



###Hämta Makefilen {#cpmake}

För att komma igång kan du använda en Makefile som finns med i kursrepot.

```bash
# Gå till me/anax-lite
$ cp ../../example/anax-lite/Makefile . 
```

Du kan nu köra `make` för att se vilka targets som finns.

```bash
$ make
```



###Lokal testmiljö {#lokal}

Makefilen är förberedd för att installera en lokal utvecklings och testmiljö. Du kan testa att installera och köra de testprogram som finns med.

```bash
$ make install
$ make check
$ make test
```

En del av testverktygen använder sig av konfigurationsfiler. Du kan kopiera även dem från modulen.

```bash
# Gå till me/anax-lite
$ cp vendor/anax/view/.php{cs,md}.xml . 
```

Testa att köra `make test` igen för att exekvera testverktygen phpcs och phpmd.

Du kan titta på en rapport från statistikverktyget phploc som ligger under `build/phploc`. Där kan du se statistik över din kod som ligger under `src`. Men än så länge är det inte så mycket att visa statistik över. Vill du se lite mer statistik så kan du köra `.bin/phploc config` så ser du statistik öven den koden som ligger under `config`.



###Make theme {#theme}

Makefilen innehåller ett target `make theme` som går in i katalogen `theme`, om den finns, och där exekverar en Makefile via `make build install`. Det kan vara en möjlighet om du själv vill bygga ett LESS/SASS-tema till ditt ramverk (ungefär som vi gjorde i design-kursen).



Git och GitHub {#git}
--------------------------------------

När du är klar så tar du och committar och pushar upp din kod till GitHub. Gör en tagg också.

Vill du jämföra din version av anax-lite med den som jag gjorde i denna artikeln så hittar du min version undex [canax/anax-lite](https://github.com/canax/anax-lite).



Avslutningsvis {#avslutning}
--------------------------------------

Nu har du ett eget PHP ramverk som du skapat med egna händer, delvis genom att återanvända befintliga moduler. Förhoppningsvis har du fått en grov förståelse för grunden i ett ramverk.

Denna artikel har en [egen forumtråd](t/6308) som du kan ställa frågor i, eller bidra med tips och trix.
