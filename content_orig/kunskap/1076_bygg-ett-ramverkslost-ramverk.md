---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1
revision:
    "2017-08-08": "(B, mos) La till YAML som packagist modul."
    "2017-08-07": "(A, mos) Första utgåvan."
...
Bygg ett ramverkslöst ramverk
==================================

[FIGURE src=image/snapht17/ramverk1-me.png?w=c5&cf&a=0,70,70,0 class="right"]

Vi bygger ihop ett ramverk baserat på Anax, Anax komponenter och eventuellt andra komponenter som vi själva väljer.

Tanken är att fundera igenom om det är modulerna som är viktiga eller det själva sammanhållande ramverket. Måste det finnas ramverk eller räcker det med moduler?

Samtidigt behöver i en kodbas som vi kan använda i kursen, det får bli det som kommer ut när du jobbat igenom denna artikeln.

<!--more-->

Innan vi är klara kommer vi även att introduceras i begreppet _scaffolding_.



Förutsättning {#pre}
--------------------------------------

Du känner till Anax flat och Anax lite. Du har sedan tidigare kurser jobbat igenom artikeln "[Bygg ett eget PHP-ramverk](kunskap/bygg-ett-eget-php-ramverk)" som visar hur du sätter samman ett ramverk från grunden.

Du har också läst artiklarna "[Att integrera en klass i ramverket Anax Lite](kunskap/att-integrera-en-klass-i-ramverket-anax-lite)" och "[Att jobba med vyer i Anax Lite](kunskap/jobba-med-vyer-i-anax-lite)" som visar dig hur du kan jobba med Anax.



En webbplats på fem minuter {#fem}
--------------------------------------

WordPress har en berömd tagline i stil med "famous five minutes install" som är ett enkelt sätt att installera bloggverktyget.

När man jobbar med webbplatser vill man att saker skall vara enkelt och gå snabbt. En stor del av ens vardagliga arbete kan automatiseras och förenklas. Sist vi byggde en webbplats med Anax-lite så var det en del steg vi behövde gå igenom. Om man bygger många platser vill man automatisera och förenkla den processen.

Låt se om vi kan installera vår egen Anax me-webbplats på fem minuter.



Steg för steg {#steg}
--------------------------------------

Vi tar det steg för steg, sen ser vi om vi kan effektivisera processen. Vi vill ju ändå ha koll på vilka stegen är.

Ta detta som en repetition från förra kursen om vilka delar som kan finnas i ett ramverk och en webbplats samt hur de kan sättas ihop.

När vi är klara kan det se ut så här.

[FIGURE src=image/snapht17/ramverk1-me.png caption="Kataloger och filer på plats i grunden till en Anax me-sida för kursen ramverk1."]



En katalog {#katalog}
--------------------------------------

Vi behöver en katalog.

```bash
mkdir anax && cd anax
```

Då fyller vi katalogen med innehåll.



PHP Moduler {#moduler}
--------------------------------------

Vi behöver ett antal PHP moduler som bygger upp det ramverket vi bygger webbplatsen i. Alla PHP moduler finns tillgängliga via Packagist.

```bash
composer require anax/request anax/url anax/router anax/response anax/view anax/session anax/configure anax/textfilter symfony/yaml
```

Nu finns moduler på plats i vendor-katalogen tillsammans med filerna composer.json och composer.lock som hjälper composer att hålla koll på vad som finns installerat och med vilka versioner.

Du kan visa vilka moduler och vilka versioner du har installerat.

```bash
composer show
```

Nu behöver vi knyta samman modulerna till en fungerande webbplats.



Katalogen config {#katalog-config}
--------------------------------------

Alla PHP-modulerna kan konfigureras med en konfigfil. Dessa kan ligga på godtycklig plats men vi väljer att samla dem alla i katalogen `config`. För att ha något att utgå ifrån så kopierar vi de som följer med själva modulen.

```bash
install -d config/route
cp vendor/anax/common/config/error_reporting.php config/
rsync -av vendor/anax/router/config/ config/
cp vendor/anax/session/config/session.php config/
cp vendor/anax/url/config/url.php config/
cp vendor/anax/view/config/view.php config/
```

Det är generella konfigurationsfiler så vi får anpassa dem efterhand, men det är något att utgå ifrån. Det är ännu inte komplett men det är en start.



Katalog src {#katalog-src}
--------------------------------------

Vi kommer att vilja skriva egen kod så vi skapar en katalog `src`. Till att börja med så lägger vi till klassen `Anax\App\App` som är basen för vårt objekt `$app`.

```bash
install -d src/App 
```

Personligen använder jag en delvis modifierad App-klass som jag utgår ifrån. Den ser ut så här med två bra att ha metoder.

```php
<?php

namespace Anax\App;

/**
 * An App class to wrap the resources of the framework.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class App
{
    public function redirect($url)
    {
        $this->response->redirect($this->url->create($url));
        exit;
    }



    /**
     * Render a standard web page using a specific layout.
     */
    public function renderPage($data, $status = 200)
    {
        $data["stylesheets"] = ["css/style.css"];

        // Add common header, navbar and footer
        //$this->view->add("default1/header", [], "header");
        //$this->view->add("default1/navbar", [], "navbar");
        //$this->view->add("default1/footer", [], "footer");

        // Add layout, render it, add to response and send.
        $this->view->add("default1/layout", $data, "layout");
        $body = $this->view->renderBuffered("layout");
        $this->response->setBody($body)
                       ->send($status);
        exit;
    }
}
```

Ta en kopia av den koden och lägg den i `src/App/App.php` så har du något att utgå ifrån.

Du kan även kopiera koden från modulen `anax/common` som har samma kod.

```bash
cp vendor/anax/common/App/App.php src/App/
```



Composer autoloader {#composer autoloader}
--------------------------------------

Nu när vi har ett eget namespace och egna klasser behöver vi hjälp av composers autoloader för att hitta dem.

Jag lägger till följande kod i `composer.json` koden berättar att jag har ett namespace `Anax` och var dess filer kan hittas.

```json
"autoload": {
    "psr-4": {"Anax\\": "src/"}
}
```

Validera din fil `composer.json` så att du vet att den är korrekt.

```bash
composer validate
```

Se till att filen validerar, så slipper du problem framöver.

Nu är du klar och kan generera nya autoloadfiler med composer.

```bash
composer dump-autoload
```

Bra, nu kommer composers autoloader göra så att koden kan hittas.



Katalog htdocs {#katalog-htdocs}
--------------------------------------

Här är katalogen som behöver vara synlig för webbservern. Här lägger vi frontkontroller, bilder, stylesheet och eventuella JavaScript-filer.

```bash
install -d htdocs/{css,img,js}
touch htdocs/css/style.css
```

Nu behöver vi en frontkontroller, du kan använda denna.

```php
<?php
/**
 * Bootstrap the framework and handle the request.
 */

// Were are all the files?
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));
define("ANAX_APP_PATH", ANAX_INSTALL_PATH);

// Include essentials
require ANAX_INSTALL_PATH . "/config/error_reporting.php";

// Get the autoloader by using composers version.
require ANAX_INSTALL_PATH . "/vendor/autoload.php";

// Add all services to $app
$app = require ANAX_INSTALL_PATH . "/config/service.php";

// Load the routes
require ANAX_INSTALL_PATH . "/config/route.php";

// Leave to router to match incoming request to routes
$app->router->handle(
    $app->request->getRoute(),
    $app->request->getMethod()
);
```

Ovan frontkontroller är relativt statisk och använder sig av information som finns i filerna i katalogen `config`. Du bör inte behöva ändra i den, men du behöver veta om dess struktur och i vilken ordning saker händer.

Spara filen som `htdocs/index.php`.

Ännu fungerar det dock inte att öppna filen via webbläsaren.



Ramverkets tjänster {#services}
--------------------------------------

Du behöver nu skapa de tjänsterna som skall finnas i ramverket. Här har jag valt att flytta dem från frontkontrollern till en egen konfigurationsfil i `config/service.php`.

Det handlar om att lägga till tjänsterna i `$app` och returnera objektet. Det kan se ut så här.

```php
<?php
/**
 * Add and configure services and return the $app object.
 */

// Add all resources to $app
$app = new \Anax\App\App();
$app->request    = new \Anax\Request\Request();
$app->response   = new \Anax\Response\Response();
$app->url        = new \Anax\Url\Url();
$app->router     = new \Anax\Route\RouterInjectable();
$app->view       = new \Anax\View\ViewContainer();
$app->textfilter = new \Anax\TextFilter\TextFilter();
$app->session    = new \Anax\Session\SessionConfigurable();

// Configure request
$app->request->init();

// Configure router
$app->router->setApp($app);

// Configure session
$app->session->configure("session.php");

// Configure url
$app->url->setSiteUrl($app->request->getSiteUrl());
$app->url->setBaseUrl($app->request->getBaseUrl());
$app->url->setStaticSiteUrl($app->request->getSiteUrl());
$app->url->setStaticBaseUrl($app->request->getBaseUrl());
$app->url->setScriptName($app->request->getScriptName());
$app->url->configure("url.php");
$app->url->setDefaultsFromConfiguration();

// Configure view
$app->view->setApp($app);
$app->view->configure("view.php");

// Return the populated $app
return $app;
```

Ta ovan innehåll och lägg i en fil `config/service.php`, filen inkluderas i frontcontrollern och returnerar innehållet till objektet `$app` som nu innehåller alla ramverkets "tjänster", det som man kan göra i ramverket.

Nu kan du öppna en webbläsare och peka ut frontkontrollern som bör visa en 404-sida, ännu har du inget innehåll eller route som matchar.

Du bör dock ha en debug-route via `index.php/debug/info`, pröva så att den fungerar. De routes som du fick med dig från början finns i `config/route.php`.

Då skapar vi en förstasida.



Katalog content {#katalog-content}
--------------------------------------

I Anax flat använde vi Markdown för att skapa innehåll till webbplatsen. Det kan vara ett sätt att enkelt skapa innehåll till webbplatsen. Vi skapar en katalog `content` och lägger ett par markdown-filer i den. Tanken är sedan att bygga en route som använder `anax/textfilter` för att göra om Markdown-filen till HTML.

```bash
mkdir content
```

En mall för en sida skapad i Markdown kan se ut så här.

```text
---
title: "Min fina titel"
...
Min me-sida
=========================

Här kommer innehållet till min fin sida.

```

Kopiera sidan ovan och spara som `content/index.md`. Öppna den i webbläsaren genom att peka mot frontkontrollern.

Du bör se sidans innehåll i webbläsare, formatterad som HTML.

Översta delen är en valfri frontmatter, den kan användas för att skicka information till vyerna, i detta fallet skickas värdet på title med till vyerna, på det sättet kan man definiera sidans titel direkt i sidan.

Om du inte använder frontmattern sp blir sidans titel samma som H1:an.

Den route som löser detta är `config/route/flat-file-content.php`, kika på hur den är uppbyggd och hur den använder `anax/textfilter` för att formattera innehållet från Markdown till HTML.

Nu kan du göra ytterligare två sidar, till exempel `content/about.md` och `content/report.md`. Du kommer åt dem via `index.php/about` och `index.php/report`.

Kanske borde vi fixa de snygga länkarna?



Snygga länkar {#htacess}
--------------------------------------

Filer som `.htaccess` är en del av det lim som knyter samman webbplatsen och ramverket. Kanske kan de vara en del av ramverket, eller inte. När vi använder ramverket tillsammans med BTHs miljö så har vi ju en speciell konfiguration för `.htaccess`.

I kursrepot ramverk1 finns dessa filer och du kan kopiera dem till din egen miljö.

```bash
# Du står i kursreport i katalogen me/anax
cp -i ../../example/anax/htdocs/.ht* htdocs
```

Du har nu ett par varianter av `.htaccess`-filer. Jag väljer den som fungerar både lokalt och på studentservern. Jag tar en kopia av den och sparar som `.htdocs`.

```bash
# Du står i me/anax
cp htdocs/.htaccess_wwwstudent htdocs/.htaccess
```

Titta i filen eftersom du kommer behöva uppdatera sökvägen som används på studentservern.

Du kan kontroller att det fungerar först genom att accessa `index.php/about` och sedan accessa `about`. Den första fungerar alltid, den andra fungerar endast om du har en fungerande `.htaccess`.

Ramverket fortsätter dock att generera icke-snygga länkar, du ändrar det i konfigurationsfilen `config/url.php`. Jag ändrar till snygga länkar även i den konfigfilen.



Cimage {#cimage}
--------------------------------------

När vi ändå håller på så kan vi ta och lägga in Cimage, det kan vara bra att ha. Vi installerar med composer och kopierar över det som behövs till `htdocs/cimage`.

```bash
composer require mos/cimage
install -d htdocs/cimage cache/cimage
chmod 777 cache/cimage
cp vendor/mos/cimage/webroot/img.php htdocs/cimage
cp vendor/mos/cimage/webroot/img/car.png htdocs/img/
touch htdocs/cimage/img_config.php
```

I konfigurationsfilen lägger du till följande konfiguration.

```php
<?php
return [
    "mode"         => "development",
    "image_path"   =>  __DIR__ . "/../img/",
    "cache_path"   =>  __DIR__ . "/../../cache/cimage/",
    "autoloader"   =>  __DIR__ . "/../../vendor/autoload.php",
];
```

Du kan nu testa att öppna en bild genom någon av följande länkar.

```text
cimage/img.php?src=car.png&width=700
image/car.png?width=700
```

Båda varianterna bör fungera, den andra kräver en fungerande `.htaccess`.

Det sista du bör göra är att lägga till en fil `.gitignore` i cache-katalogen `cache/cimage`. Spara följande i en fil `cache/cimage/.gitignore`.

```text
# Ignore everything in this directory
*
# Except this file
!.gitignore
```

Du kan se en förklaring på vad filen gör i [svaret på Stackoverflow](https://stackoverflow.com/questions/115983/how-can-i-add-an-empty-directory-to-a-git-repository). Poängen är att man annars riskerar att "tappa bort" tomma kataloger i sitt git repo och vi vill inte riskera att checka in cachade filer.



Makefile {#makefile}
--------------------------------------

En Makefile vill vi gärna ha, det är bra att ha för utveckling och för att göra återkommande saker enklare. Det ligger med en makefil i kursrepot som vi kan kopiera och utgå ifrån, den är anpassad till det vi nu gör.



###Hämta Makefilen {#cpmake}

För att komma igång kan du använda en Makefile som finns med i kursrepot.

```bash
# Gå till kursrepot och me/anax
cp ../../example/anax/Makefile . 
```

Du kan nu köra `make` för att se vilka targets som finns.

```bash
make
```



###Lokal testmiljö {#lokal}

Makefilen är förberedd för att installera en lokal utvecklings och testmiljö. Du kan testa att installera och köra de testprogram som finns med.

```bash
make install
make check
make test
```

En del av testverktygen använder sig av konfigurationsfiler. Du kan kopiera även dem från en av modulerna.

```bash
# Gå till me/anax
cp vendor/anax/view/.php{cs,md}.xml . 
```

Testa att köra `make test` igen för att exekvera testverktygen phpcs och phpmd.



###Make theme {#theme}

Makefilen innehåller ett target `make theme` som går in i katalogen `theme`, om den finns, och där exekverar en Makefile via `make build install`. Det kan vara en möjlighet om du själv vill bygga ett LESS/SASS-tema till ditt ramverk (ungefär som vi gjorde i design-kursen).



Katalog view {#katalog-view}
--------------------------------------

Men, jag har inte skapat några vyer ännu och sidorna verkar fungera?

Om vi kikar i konfigfilen `config/view.php` så ser vi att den väljer att titta i ett antal kataloger efter view-filer. En av dessa kataloger är modulen view's egna katalog som innehåller standardvyer. Titta i konfigfilen så ser du var de ligger.

När vyer eftersöks så söks alltså i flera kataloger och den första matchande vyn används. Du kan alltså skapa egna vyer som används istället för de standardvyer som finns. Enklast är att lägga dem i din egna katalog `view`.

Låt oss skapa en sådan, det är bra att ha.

```bash
install -d view/test/
touch view/test/test.php
```
Där skapade vi en testvy som du kan ladda via dess namn `test/test`. Pröva att göra en ny testroute som laddar vyn. Lägg någon utskrift i vyn för att se att det fungerar som tänkt.
 
Nu är du redo att skapa vyer, kika gärna på de som ligger i katalogen `view` för modulen views, om du behöver inspiration.



Git och GitHub {#git}
--------------------------------------

När du är klar och nöjd så kan du lägga upp ditt Anax som ett repo på GitHub och tagga det.

Det kan vara bra att lägga till en `.gitignore` i stil med följande.

```text
/.bin
/build
/vendor
```



Scaffolding {#scaffolding}
--------------------------------------

Nu är vi klara. Hur gick det med vår plan om fem minuters installation? Nja, som du ser är det en del saker som behöver komma på plats innan man börjar bygga sin webbplats. Men säg att vi vill bygga ytterligare en webbplats, borde vi inte kunna göra det på fem minuter nu när vi vet hur vi gör?

Visst kan vi kopiera undan allt vi gjort och lägga en kopia av det någonstans, sen behöver vi bara komma ihåg var den ligger. Det kan vara en variant av copy/past för att uppnå fem minuters installation.

En aningen mer strukturerad variant är _scaffolding_. I ramverk- och webbsammanhang stöds scaffolding ofta av ett CLI som följer med ramverket. Det man scaffoldar fram är strukturer att utgå ifrån. Tanken är att minska enklare arbeten som kan automatiseras genom att ge en mall man kan utgå ifrån. En mall är ungefär vad vi har så här långt, en mall som fungerar för en me-sida i kursen ramverk1.

Nu är det så bevänt att det finns en CLI till Anax, [anax/anax-cli](https://packagist.org/packages/anax/anax-cli). Via det kan man scaffolda fram exakt det som vi hittills har gjort.

Förutsatt att jag har [installerat kommandot `anax`](anax-cli/kom-igang-och-installera) så kan jag scaffolda fram samma sak som vi nu gjort tillsammans i denna artikel.

[ASCIINEMA src=132473 caption="Att via kommandot anax scaffolda fram grundstrukturen till me-saidn i ramverk1."]

Där fick vi vår fem-minutare.

Det är inte ovanligt att ett ramverk innehåller stöd av cli-verktyg som erbjuder scaffolding för att förenkla och snabba upp utvecklingen.

Lägg begreppet scaffolding på minnet och tänk efter när du tycker du borde kunna spara tid genom att scaffolda fram strukturer.



Ramverk eller ramverkslöst {#ramverk}
--------------------------------------

Nu har vi plockat ihop ett eget "ramverk" utifrån ett antal moduler. Modulerna är tänkta att fungera tillsammans och de behöver ett lim, _glue_, mellan sig för att fungera som tänkt.

Även om modulerna till viss del är utbytbara, så är grundtanken att de skall fungera ihop. Kanske är det så i ramverksvärlden att de moduler som ligger närmast är enklast att utveckla med tanken att de skall användas tillsammans.

När man pratar om ramverkslöst så tänker man att det finns en samling av moduler som är utbytbara men löser en viss funktion, man kan välja godtycklig modul och använda den i sitt system. Kanske är det en utopi att ramverkslöst skall fungera, kanske inte. Det lim som behövs för att saker skall fungera är en viktig bit för att knyta ihop modulerna. Men limmet behöver inte vara så stort och modulerna kan man försöka bygga som fristående moduler utan alltför stort beroende mellan varandra. 

Det arbete som standardiseringsgruppen PHP-FIG utför är en variant att likforma moduler och ramverk och göra dem mer utbytbara. Kanske kan det i längden leda till ett mer ramverkslöst samhälle. Oklart om det är en bra mål eller ej, men att själv kunna välja väg låter som en god idé.



Avslutningsvis {#avslutning}
--------------------------------------

Då har du en mall att utgå ifrån när du skapar din me-webbplats i kursen och det blev en genomgång av dess olika delar.

Denna artikel har en [egen forumtråd](t/6602) som du kan ställa frågor i, eller bidra med tips och trix.
