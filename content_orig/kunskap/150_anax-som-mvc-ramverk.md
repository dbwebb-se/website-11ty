---
author: mos
category: php
updated: "2014-03-25 22:36:49"
created: "2013-10-24 15:20:12"
...
Anax som MVC-ramverk
==================================

Ramverk och MVC är nyckelord för en mer avancerad PHP-programmerare. I oophp-kursen byggde vi en enklare webbtemplate som skulle hjälpa oss att snabbare bygga webbplatser. Men, efterhand som webbplatserna blir större och mer komplexa så räcker den typen av struktur inte till, då behöver vi mer avancerade strukturer, det är här som ramverk och MVC kommer in.

Vi kan säga att det handlar om PHP-baserade och MVC-inspirerade ramverk och tanken är att uppgradera Anax till att bli ett sådant. Arbetsnamnet är Anax-MVC.

<!--more-->



Anax som webbmall {#anax-base}
------------------------------

I artikeln "[Anax - en hållbar struktur för dina webbapplikationer](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer)" beskrivs grunderna i Anax. Där kallas kodbasen för Anax-base. Det är den strukturen som nu skall uppgraderas till Anax-MVC, allt för att klara av lite större projekt.

I denna artikeln kommer jag att fokusera på ramverks- och MVC-delarna. Det finns saker som jag gick igenom i den första artikeln om Anax, saker som inte hanteras här. Det är en bra idé att snabbt skumma igenom den första artikeln, för att se vad den omfattar. 



Ladda ned och installera Anax-MVC {#anax-mvc}
------------------------------

[Anax-MVC finns på GitHub](https://github.com/mosbth/Anax-MVC). Så här kommer du igång.

```bash
git clone https://github.com/mosbth/Anax-MVC.git
```

Peka din webbläsare på filen som ligger i `webroot/hello.php`. Nu är du igång.

[FIGURE src=/image/snap/anax-mvc-hello.png?w=w2 caption="Så här ser din första bekantskap med Anax MVC ut."]

Det är bra om du har din egen kopia av Anax-MVC, du kan tjuvkika på koden parallellt med att du läser denna artikel.



Filstruktur för ramverket {#filstruktur}
------------------------------

Ett ramverk kan delas in i två delar, *application* och *system*.

**Application** är den del av koden som använder ramverkets kod för att lösa en applikationsspecifik uppgift. Det är själva applikationen, eller själva webbplatsen. Dagens webbplatser blir mer och mer ett mellanting mellan enkel webbplats och mer avancerad webbapplikation. I fortsättningen kallar jag det vi bygger för applikation, app, webbplats eller webbapplikation, det är alla namn på den koden som är applikationsspecifik och hamnar under katalogen *application*, eller bara *app*.

**System** är ramverkets kärna och den delen som är återanvändbar mellan flera applikationer. När det finns en generisk kodbit, eller kodlösning, som kan användas för att lösa flera applikationer, så lägger man den koden i katalogen *system*.

Katalogstrukturen skulle alltså kunna se ut så här till att börja med, och det gör den också i många ramverk.

```text
Anax-MVC/
      └─ app/
      └─ system/
```

Men, för min del så vill jag dela upp det lite annorlunda, jag vill ha en katalogstruktur som visar ramverkets huvuddelar på översta nivån. Jag väljer följande katalogstruktur.

```text
Anax-MVC/
      └─ app/
      └─ src/
      └─ theme/
      └─ webroot/
```

Det här är kataloger vi känner igen från Anax. 

Katalogen `src` innehåller källkod i form av klasser och funktioner. Tanken är att denna katalog innehåller ramverkets källkod. Om det finns applikationsspecifika moduler, klasser, kod -- så skall det ligga under `app`. Numer skiljer jag alltså på vad som är ramverket och applikationen, det är viktigt för att få rätt ordning och struktur.

Katalogen `theme` innehåller presentations och layout-delarna för att skapa de resulterande webbsidorna. Vill man byta utseende på webbplatsen så ändrar man filerna i denna katalog.

Katalogen `webroot` innehåller alla filer som måste vara synliga i webbplatsen, de måste ligga så att webbservern kan komma åt dem och visa dem. Här finns rena webbsidor, sidkontrollers, frontkontrollers, stylesheets, bilder, javascript med mera.

Vi har nu en grov struktur och indelning. Katalogen `system` är *ersatt* med `src`, `theme` och `webroot`. Det är inte rätt att säga att system är samma sak som src, theme och webroot. Src är en del av system, theme brukar inte vara en del av renodlade ramverk och webroot kan återfinnas som en egen katalog, men lika ofta finns den under app-katalogen.

Det är inte lätt med struktur, man vill att var sak skall ha sin plats, men man behöver tänka ut vad varje del har för syfte, behov av synlighet och kopplingar till andra delar av ramverket. När du kommer i kontakt med ett ramverk så är detta dock de vanligaste grundstenarna och på något sätt kommer du att känna igen strukturen. Varje ramverk har sin egen struktur, det ger ramverket en viss själ. När man sätter grundstrukturen sätter man också vissa spelregler för ramverket, hur det kan bete sig och hur dess delar länkas samman till en helhet.



En enkel sidkontroller {#sidkontroller}
------------------------------

I Anax-base var sidkontrollern är kärnpunkt, den hanterade *requesten* och förberedde ett svar. I Anax-MVC ser enklast möjliga sidkontroller ut så här.

```php
// Get environment & autoloader and the $app-object.
require __DIR__.'/config_with_app.php'; 

// Prepare the page content
$app->theme->setVariable('title', "Hello World Pagecontroller")
           ->setVariable('main', "
    <h1>Hello World Pagecontroller</h1>
    <p>This is a sample pagecontroller that shows how to use Anax.</p>
");

// Render the response using theme engine.
$app->theme->render();
```

Det finns en config-fil som sätter upp grunderna för ramverket och skapar en central `$app` variabel som innehåller i stort sett hela ramverket. Det är lite slarvigt uttryckt, men egentligen är det så, `$app` ger dig access till ramverkets funktionalitet.

Principen är alltså, config-filen sätter upp det som behövs, använd `$app` och fyll den med innehåll och lämna  över till temat, `$app->theme`, att rendera sidan.

Resultatet kan se ut så här.

[FIGURE src=/image/snap/phpmvc-hello-world-pagecontroller.png?w=w2&sa=jpg caption="En hello world sidkontroller i Anax-MVC."]

Varför väljer man att strukturera sin kod på ett visst sätt? Bakom Anax MVC ligger tankar om [principer och filosofier för programmering](kunskap/principer-och-filosofier-for-programmering). Bland annat finns de fem principerna som sammanfattas med SOLID [^1]. Det är fem principer för objektorienterad programmering och design. När principerna används tillsammans skall det vara mer sannolikt att koden blir lättare att underhålla och utöka över tiden. 

Det skadar inte att ha lite principer att luta sig mot, det ger en terminologi som kan användas när man diskuterar objektorienterad programmering och design.



Bootstrap {#bootstrap}
------------------------------

Bootstrap, eller bootstrapping [^2], är den fas i ramverket, som ligger dolt i sidkontrollerns första include av filen `config_with_app.php`. Det handlar om de delar som behövs för att ramverket skall vakna till liv och starta upp, boota upp och vara redo att ta hand om requesten.

**`webroot/hello.php`**

```php
// Get environment & autoloader and the $app-object.
require __DIR__.'/config_with_app.php'; 
```

Men vad döljer sig bakom det skriptet och vad är de nödvändiga stegen i bootstrap-fasen? 



###Sökvägar som ramverket är beroende av {#sokvag}

Det finns två viktiga sökvägar som ramverket är beroende av, `ANAX_INSTALL_PATH` och `ANAX_APP_PATH`. Den första är sökvägen till katalogen där Anax-MVC är installerat. Den andra är sökvägen till app-katalogen. Detta är de två grundläggande sökvägar som behövs för att en sidkontroller skall kunna hitta och använda ramverket.

Sökvägarna är definierade i `webroot/config.php` som inkluderas av `webroot/config_with_app.php`.

**`webroot/config.php`**

```php
/**
 * Define essential Anax paths, end with /
 *
 */
define('ANAX_INSTALL_PATH', realpath(__DIR__ . '/../') . '/');
define('ANAX_APP_PATH',     ANAX_INSTALL_PATH . 'app/');
```

Vill man döpa sin app-katalog till `application`, så görs den ändringen här. Vill man dela ramverket så att flera app-kataloger använder samma installation av Anax, så görs det genom att variera dessa sökvägar.



###Autoloader hittar klassfilerna {#autoloader}

Anax är beroende av en autoloader som hittar var klassfilerna ligger. Det är alltså inte en definierad sökväg till klasserna, det är PHPs autoloader-mekanism som visar var klassfilerna ligger. Därför måste en autoloader vara det första som inkluderas.

**`webroot/config.php`**

```php
/**
 * Include autoloader.
 *
 */
include(ANAX_APP_PATH . 'config/autoloader.php'); 
```

Anax-MVC använder en autoloader som är kompatibel med [FIG PSR-4](http://www.php-fig.org/psr/psr-4/).

**`app/config/autoloader.php`**

```php
/**
 * Default Anax autoloader, and the add specifics through a self invoking anonomous function.
 * Add autoloader for namespace Anax and a default directory for unknown vendor namespaces.
 */
require ANAX_INSTALL_PATH . 'src/Loader/CPsr4Autoloader.php';

call_user_func(function() {
    $loader = new \Anax\Loader\CPsr4Autoloader();
    $loader->addNameSpace('Anax', ANAX_INSTALL_PATH . 'src')
           ->addNameSpace('', ANAX_APP_PATH . 'src')
           ->register();
});
```

Jag väljer att lägga autoloader-filen i katalogen `app/config`, jag ser det som ett app-specifikt konfigurationsdirektiv som man kan ändra per app. I appen väljer man vilka namespace man har och var autoloadern skall leta efter klassfilerna.

Resultatet i standard Anax MVC blir att autoloadern letar efter klassfiler i följande kataloger:

* `ANAX_INSTALL_PATH/src`
* `ANAX_APP_PATH/src`

Här kan man alltså konfigurera namn på src-katalogen om man vill byta till system eller något annat passande. Det går också att välja vilka kataloger och namespaces som skall användas.

Konfigurationen av autoloadern blir en central del i hur ramverkets filstruktur hänger ihop. Vill man ha en annan struktur så ändrar man här.



###Skapa `$app` och *injecta* ramverkets tjänster {#dollar-app}

När grunderna finns på plats, så är sista steget att skapa själva $app-objektet, det som ger oss tillgång till ramverkets delar, ramverkets tjänster. Denna delen kan göras i själva sidkontrollern, eller i en config-fil som är gemensam för alla sidkontroller. Jag har valt att lägga koden i en config-fil, jag vill ha så lite kod som möjligt i sidkontrollern. Men det finns inget som hindrar att du väljer att lägga denna biten i sidkontrollern. Det är också passande.

**`webroot/config_with_app.php`**

```php
// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();
$app = new \Anax\Kernel\CAnax($di);
```

Det som händer är en implementation av *dependency injection* [^3][^4] och *service location* [^5]. Ramverkets kärna är `$app` som *injectas* med de tjänster som ligger i `$di`. I utgångsläget har `$di` en standarduppsättning av de vanligaste tjänsterna som krävs för att ramverket skall fungera.

En standarduppsättning av `$di` innehåller bland annat följande tjänster, där varje tjänst är ett objekt:

| Service          | Beskrivning |
|------------------|-------------|
| `$app->response` | Svaret som kan generera en svarssida med specifika `header()` koder.
| `$app->validate` | Validera inkommande variabler så att de innehåller rätt typ av data och värdemängd.
| `$app->log`      | Logga vad som händer, en loggerklass som stödjer [FIG PSR-3](http://www.php-fig.org/psr/psr-3/).
| `$app->request`  | Alla detaljer om nuvarande förfrågan.
| `$app->url`      | Hjälp att skapa länkar.
| `$app->views`    | En samling vyer som temat kan rendera.
| `$app->router`   | Routa förfrågningarna till rätt hanterare eller kontroller.
| `$app->session`  | Hantera sessionsdata.
| `$app->theme`    | Skapa resulterande webbsidor enligt ett enhetligt tema.

Vilka tjänster som finns i ramverket, och hur varje tjänst implementeras, är alltså kopplat till innehållet i `$di`.

Ett bra sätt att fördjupa sig i hur dependency injection och service locator fungerar, är att läsa [ramverket Phalcons förklaring](http://docs.phalconphp.com/en/latest/reference/di.html) av hur de använder `$app` och `$di`.

Tills vidare låter vi det vara, du ser nu vilka tjänster som ramverket kan erbjuda, hur du når dem och du ser det sättet som ramverket fylls med tjänster. Detta är en bra start.



Temat renderar en sida {#theme}
------------------------------

Efter bootstrap-fasen är ramverket initierat och redo att hantera förfrågan. Låt oss skapa en enkel sida som säger det klassiska "Hello World". Så här ser koden ut som gör det.

**`webroot/hello.php`**

```php
// Prepare the page content
$app->theme->setVariable('title', "Hello World Pagecontroller")
           ->setVariable('main', "
    <h1>Hello World Pagecontroller</h1>
    <p>This is a sample pagecontroller that shows how to use Anax.</p>
");

// Render the response using theme engine.
$app->theme->render();
```

Det är tjänsten `$app->theme` som hjälper till att skapa den resulterande webbsidan. Först sätter vi en titel och därefter sidans huvudsakliga innehåll. Båda sätts som en variabel, precis som gamla Anax löste det. Sedan är det temats sak att rendera sidan tillsammans med variablernas innehåll.

Resultatet blir en enkel sida, som vi såg tidigare.

[FIGURE src=/image/snap/phpmvc-hello-world-pagecontroller.png?w=w2&sa=jpg caption="En hello world sidkontroller i Anax-MVC."]



Konfigurera temats gemensamma delar {#conftheme}
------------------------------

En webbplats har ofta en gemensam layout och struktur för alla sidorna, det kan vara en gemensam header och footer, logo och rubrik på webbplatsen, kanske även en slogan. Denna gemensamma del kan konfigureras i en konfig-fil som är en del av applikationen.

Så här ser en förenklad version av standard temat i Anax-MVC.

**`app/config/theme.php`**

```php
return [

    /**
     * Settings for Which theme to use, theme directory is found by path and name.
     *
     * path: where is the base path to the theme directory, end with a slash.
     * name: name of the theme is mapped to a directory right below the path.
     */
    'settings' => [
        'path' => ANAX_INSTALL_PATH . 'theme/',
        'name' => 'anax-base',
    ],

    /** 
     * Add default views.
     */
    'views' => [
        ['region' => 'header', 'template' => 'welcome/header', 'data' => [], 'sort' => -1],
        ['region' => 'footer', 'template' => 'welcome/footer', 'data' => [], 'sort' => -1],
    ],

    /** 
     * Data to extract and send as variables to the main template file.
     */
    'data' => [

        // Language for this page.
        'lang' => 'sv',

        // Append this value to each <title>
        'title_append' => ' | Anax a web template',

        // Stylesheets
        'stylesheets' => ['css/style.css'],

        // Path to modernizr or null to disable
        'modernizr' => 'js/modernizr.js',

        // Path to jquery or null to disable
        'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js',
    ],
];
```

Temats funktion är implementerad i klassen `\Anax\ThemeEngine\CThemeBasic`. Klassen knyter samman informationen från config-filen och det som sidkontrollern lägger till. Med den samlade informationen som grund, är `$app->theme` redo att rendera webbsidan.

Du kan tjuvkika på [källkoden till tema-klassen](https://github.com/mosbth/Anax-MVC/blob/master/src/ThemeEngine/CThemeBasic.php) och se hur den är uppbyggd.



Rendera webbsidan via en template {#theme-templ}
------------------------------

Temats renderingsfunktion är den som skapar den resulterande webbsidan. När den gör detta så utgår den från en template-sida, en mall, som används som grund för att skapa webbsidorna och placera ut innehållet på sidan.

Så här ser en förenklad template-sida ut i temat som kallas anax-base.

**`theme/anax-base/index.tpl.php`**

```html
<!doctype html>
<html class='no-js' lang='<?=$lang?>'>
<head>
<meta charset='utf-8'/>
<title><?=$title . $title_append?></title>
<?php foreach($stylesheets as $stylesheet): ?>
<link rel='stylesheet' type='text/css' href='<?=$this->url->asset($stylesheet)?>'/>
<?php endforeach; ?>
<script src='<?=$this->url->asset($modernizr)?>'></script>
</head>

<body>

<div id='wrapper'>

<div id='header'>
<?php if(isset($header)) echo $header?>
<?php $this->views->render('header')?>
</div>

<div id='main'>
<?php if(isset($main)) echo $main?>
<?php $this->views->render('main')?>
</div>

<div id='footer'>
<?php if(isset($footer)) echo $footer?>
<?php $this->views->render('footer')?>
</div>

</div>

<?php if(isset($jquery)):?><script src='<?=$this->url->asset($jquery)?>'></script><?php endif; ?>

</body>
</html>
```

Template-filen är alltså HTML-kod med insprängda PHP-sekvenser som skriver ut sidans innehåll. Vill man ändra grundlayouten på webbplatsen så skall man alltså ändra denna filen.

I ett ramverk försöker man dela upp så varje sak finns på en plats och att en ändring skall få maximalt genomslag. Det är en konst att dela upp koden på bra sätt.



Vyer för att separera HTML-koden {#view}
------------------------------



###Vyer i sidkontroller {#view-1}

Vyer är V:et i MVC. Men det går bra att tänka i vyer även utanför MVC. En vy är HTML-kod, det är en möjlighet att separera ut HTML-koden från kontrollern. Om vi tar och kikar på sidan `hello.php` så ser vi inga vyer, det är HTML-kod rakt in i sidkontrollern. Det är ingen optimal lösning. Det finns bättre lösningar. 

Här är ett exempel på hur vi bygger om sidkontrollern `hello.php` till att använda vyer istället. Resultatet blir att vi flyttar HTML-koden -- från kontrollern till vyn.

**`webroot/hello.php`**

```php
$app->theme->setVariable('title', "Hello World Pagecontroller")
           ->setVariable('main', "
    <h1>Hello World Pagecontroller</h1>
    <p>This is a sample pagecontroller that shows how to use Anax.</p>
");

$app->theme->render();
```

Ramverket stödjer redan vy-hantering, vi kan använda den på följande vis, för att få en bättre struktur på sidkontrollern.

**`webroot/hello_view.php`**

```php
// Set the title of the page
$app->theme->setVariable('title', "Hello World Pagecontroller");

// Add a view
$app->views->add('welcome/hello_world');

// Render the response using theme engine.
$app->theme->render();
```

Resultatet, när man kör sidan, kan se ut så här.

[FIGURE src=/image/snap/phpmvc-hello-world-pagecontroller-with-view.png?w=w2&sa=jpg caption="En hello world sidkontroller med en vy, klart bättre kodstruktur."]



###En container samlar alla vyer {#view-container}

Tjänsten `$app->views` är en container, en behållare, av vyer. Den lagrar vyer som skall renderas av temat. Tjänsten har metoden `add()` som kan ta flera parametrar. Den ser ut så här.

**`src/View/CViewContainerBasic.php`**

```php
/**
 * Add a view to be included as a template file.
 *
 * @param string $template the name of the template file to include
 * @param array  $data     variables to make available to the view, default is empty
 * @param string $region   which region to place the view in, 'main' is default
 * @param int    $sort     which order to display the views
 *
 * @return class as the added view
 */
public function add($template, $data = [], $region = 'main', $sort = 0) 
```

När du lägger till en vy kan du alltså skicka med en array av variabler, när vyn renderas kommer de variablerna att bli tillgängliga i vyn. Du kan också skicka med den region som vyn skall renderas i. Det är temat som bestämmer vilka regioner som finns. Default-värdet är regionen `main`. Lägger du till flera vyer så kan du prioritera dem så att de blir sorterade i rätt ordning.

I fallet med `hello_view.php` så *lägger vi till vyn* `welcome/hello_world.tpl.php` att renderas i *regionen main* och vi bifogar ingen *data-array* och vi använder *default-värde på sorteringen*.



###Hur ser vyn ut? {#vyn}

Låt oss kika på vyn som vi precis använde. Det är ren HTML-kod i denna vyn.

**`app/view/welcome/hello_world.tpl.php`**

```html
<h1>Hello World Pagecontroller with view</h1>

<p>This is a sample pagecontroller that shows how to use Anax with a view.</p>
```

Enkelt rent och vackert, var sak på sin plats.

I ett första läge, när man börjar använda ramverk, kan det kännas svårt att greppa var allt ligger och i vilken fil man måste ändra och vad man behöver göra för att lägga till nya saker. Men det är en ofrånkomlig tröskel med ramverk. De är komplexa till sin natur, de har delat upp koden och använt olika programmeringstekniker och programmeringsprinciper för att uppnå en god struktur. Det tar sin tid att sätta sig in i ett ramverk. Men när man väl gjort det så har man en bra verktygslåda.

Men, när man väl kan *ett* ramverk, så förstår man de flesta andra.



###Hur vet temat vilka regioner som finns? {#regioner}

Det styrs av temats template-fil, som egentligen är en egen vy i sig. Om vi kikar på temats template-fil igen, så ser vi koden som renderar vyer i olika regioner.

**`theme/anax-base/index.tpl.php`**

```html
<div id='header'>
<?php $this->views->render('header')?>
</div>

<div id='main'>
<?php $this->views->render('main')?>
</div>

<div id='footer'>
<?php $this->views->render('footer')?>
</div>
```

Av koden ser vi att det finns tre regioner i temat. Det går bra att lägga till fler regioner om du vill. Det är bara att lägga dit kod som renderar fler regioner. Sedan fyller dem med innehåll, i form av vyer som du lägger till respektive region i din sidkontroller.



###Skapa egen vy {#egen-vy}

Testa att skapa din egna vy, till exempel, säg att du vill lägga till något i regionen header och i footer, bara för att testa. Så här gör du.

1. Skapa en ny vy i `app/view/test/quote.tpl.php`.

**`app/view/test/quote.tpl.php`**

```html
<h3>Today is <?=$today?></h3>
<blockquote>
<a href="http://dbwebb.se/marvin">Marvin</a> says: "My capacity for happiness," he added, "you could fit into a matchbox without taking out the matches first."
</blockquote>
```

Vyn skriver ut lite text tillsammans med innehållet i variabeln `$today`.



2\. Skapa en ny sidkontroller som lägger till vyn i två olika regioner.

**`webroot/hello_view2.php`**

```php
// Add a view
$app->views->add('welcome/hello_world');
$app->views->add('test/quote', ['today' => date('r')], 'header');
$app->views->add('test/quote', ['today' => date('r')], 'footer');

// Render the response using theme engine.
$app->theme->render();
```

Så här blir resultatet, samma vy läggs till i regionen header och i regionen footer.

[FIGURE src=/image/snap/phpmvc-hello-world-pagecontroller-with-extra-view.png?w=w2&sa=jpg caption="Samma vy tillagd två gånger, en gång i region header och en gång i region footer."]



###Ändra på vyerna i header och footer {#headfoot}

Temat är uppbyggt av vyer, vyerna renderas på sin plats, i den region som anges, i den sorteringsordning som bestämts.

Om du kommer ihåg temats config-fil så fanns det två vyer i den, det är de vyerna som ger innehållet till headern och footer.

**`app/config/theme.php`**

```php
return [

    /** 
     * Add default views.
     */
    'views' => [
        ['region' => 'header', 'template' => 'welcome/header', 'data' => [], 'sort' => -1],
        ['region' => 'footer', 'template' => 'welcome/footer', 'data' => [], 'sort' => -1],
    ],
];
```

Du kan testa att ändra innehållet i de vyer som anges, de ligger i `app/views/welcome`. Eller ännu bättre, skapa nya vyer och lägg dem i en egen katalog. Sedan uppdaterar du temats config-fil så att den pekar på rätt vy.

Nu kan du ändra grundutseendet i webbplatsens header och footer, nu kan du börja skapa din egen profil på webbplatsen. 



Sidkontroller blir frontcontroller {#front}
------------------------------



###Frontcontroller med routes {#routes}

En sidkontroller är till för att skapa *en* webbsida, men en frontkontroller kan skapa *flera* webbsidor. En frontkontroller är en central punkt som kan hantera alla, eller valda, länkar i en webbplats. En frontkontroller tar emot förfrågan och analyserar den för att matcha mot de kontroller, eller hanterare, som finns. När den hittar en träff så överlåter den till kontrollern/hanteraren att utföra jobbet.

Tanken är att man bygger upp webbappen, eller webbplatsen, efter vilka länkar den skall stödja. Varje länk matchas mot en *route*, en väg till en kontroller, eller hanterare. Vi gör ett litet exempel.

Vi har en tärningsklass som ligger i `app/src`, den heter [`\Mos\Dice\CDice`](https://github.com/mosbth/Anax-MVC/blob/master/app/src/Dice/CDice.php) och är lånad från oophp-kursen. Nu vill vi göra en liten webbplats, i form av frontcontrollern `dice_app.php` som kastar en tärning genom att stödja följande *routes*.

| Route         | Länk                     | Förklaring |
|---------------|--------------------------|------------|
| `""`          | `dice_app.php/`          | Hemsidan, förstasida som visas för en tom route. |
| `"dice"`      | `dice_app.php/dice`      | Förstasidan för tärningen, den visas när man inte har kastat något. |
| `"dice/roll"` | `dice_app.php/dice/roll` | Rulla tärningen en gång och visa resultatet. |



###En frontcontroller `dice_app.php` {#front-dice}

Grunderna i en frontcontroller är samma som i en sidkontroller. Så här ser grundstrukturen ut.

**`webroot/dice_app.php`**

```php
// Get environment & autoloader.
require __DIR__.'/config_with_app.php'; 

// Add extra assets
$app->theme->addStylesheet('css/dice.css');

// Add routes

// Route for "", home
// Route for "dice"
// Route for "dice/roll"

// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Render the page
$app->theme->render();
```

Jag lade till en extra stylesheet för att kunna visa tärningen. Det som tillkommer för att bli en frontcontroller är egentligen routerna och själva matchningen av dem, som sker i `$app->router->handle()`.



###Route för framsidan {#route-empty}

När man endast anger en länk med frontcontrollern `die_app.php/`, så är det en tom route, hemma-routen. För att lägga till den så definierar man routen och ger den en hanterare, i detta fallet i form av en [anonym funktion, en *closure*](http://php.net/manual/en/functions.anonymous.php), som anropas när routen matchas.

**Route för `dice_app.php/`.**

```php
// Home route
$app->router->add('', function() use ($app) {

    $app->views->add('welcome/index');
    $app->theme->setTitle("Welcome to Anax");

});
```

När denna route matchas så visas innehållet i vyn `welcome/index` och sidans titel blir "Welcome to Anax".

[FIGURE src=/image/snap/phpmvc-dice-empty.png?w=w2&sa=jpg caption="Hemmasidan för frontcontrollern."]



###Route för tärningssidan, utan kast {#route-dice}

Jag vill ha en sida som visar information om tärningen och ger valen att kasta tärningen, den nås av länken `dice_app.php/dice`.

**Route för `dice_app.php/dice`.**

```php
// Route to show welcome to dice
$app->router->add('dice', function() use ($app) {

    $app->views->add('dice/index');
    $app->theme->setTitle("Roll a dice");

});
```

När denna routen matchas visas en sida med innehåll från vyn `dice/index` och sidan får titeln "Roll a dice".

[FIGURE src=/image/snap/phpmvc-dice-home.png?w=w2&sa=jpg caption="En sida som inbjuder till tärningsskast."]



###Route för tärningssidan, med ett kast {#route-dice-roll}

Nu är det dags att rulla tärningen och visa resultatet, det löser länken `dice_app.php/dice/roll`. Resultatet skall bli att tärningen kastas en gång och resultatet visas upp.

**Route för `dice_app.php/dice/roll`.**

```php
// Route to roll dice and show results
$app->router->add('dice/roll', function() use ($app) {

    // Make roll and prepare reply
    $dice = new \Mos\Dice\CDice();
    $dice->roll(1);

    $app->views->add('dice/index', [
        'roll'      => $dice->getNumOfRolls(),
        'results'   => $dice->getResults(),
        'total'     => $dice->getTotal(),
    ]);

    $app->theme->setTitle("Rolled a dice");

});
```

När denna routen matchas visas en sida med innehåll från vyn `dice/index` och sidan får titeln "Roll a dice".

[FIGURE src=/image/snap/phpmvc-dice-roll.png?w=w2&sa=jpg caption="Tärningssidan med ett kast."]



###Route för tärningssidan, med flera kast {#route-dice-rollx}

Hur gör man då om man vill kasta tärningen många gånger? Ett sätt är att skicka en parameter via query-delen av länken. För att kasta tärningen 99 gånger så skulle länken kunna se ut `dice_app.php/dice/roll?roll=99`.

I routens handler behöver vi ta emot och validera den inkommande parametern, ramverket kan hjälpa oss med det. En uppgraderad route-handler kan se ut så här.

**Route för `dice_app.php/dice/roll`, med möjlighet att lägga till `?roll=99`.**

```php
// Route to roll dice and show results
$app->router->add('dice/roll', function() use ($app) {

    // Check how many rolls to do
    $roll = $app->request->getGet('roll', 1);
    $app->validate->check($roll, ['int', 'range' => [1, 100]])
        or die("Roll out of bounds");

    // Make roll and prepare reply
    $dice = new \Mos\Dice\CDice();
    $dice->roll($roll);

    $app->views->add('dice/index', [
        'roll'      => $dice->getNumOfRolls(),
        'results'   => $dice->getResults(),
        'total'     => $dice->getTotal(),
    ]);

    $app->theme->setTitle("Rolled a dice");

});
```

Här används tjänsten `$app->request` för att hämta ut `$_GET['roll']`. I ett ramverk är det vanligt att bygga klasser som ett lager framför PHPs globala variabler.

När värdet är hämtat så används tjänsten `$app->validate` för att kontrollera att värdet är ett integer och innehåller talet mellan 1 och 100, annars avbryts exekveringen.

[FIGURE src=/image/snap/phpmvc-dice-roll-99.png?w=w2&sa=jpg caption="En tärningssida med 99-kast."]

Nu har vi en frontcontroller som sköter funktionen av att kasta en tärning. Det blir inte mycket kod i frontkontrollern eller i respektive hanterare, eller hur? 

Hur känns det så här långt?



Låt ramverket skapa interna länkar {#url}
------------------------------

En del av appen `dice_app.php` ligger i vyerna. Låt oss titta på den vy som presenterar tärningsresultatet. Vyn `dice/index` används i två routes, `dice` och `dice/roll`.

**`app/view/dice/index.tpl.php`**

```html
<h1>Throw a dice</h1>

<p>This is an example of a app throwing a dice game.</p>

<p>How many rolls do you want to do, <a href='<?=$this->url->create("dice/roll?roll=1")?>'>1 roll</a>, <a href='<?=$this->url->create("dice/roll?roll=3")?>'>3 rolls</a> or <a href='<?=$this->url->create("dice/roll?roll=6")?>'>6 rolls</a>? </p>

<?php if(isset($roll)) : ?>
<p>You made <?=$roll?> roll(s) and you got this serie.</p>

<ul class='dice'>
<?php foreach($results as $val) : ?>
<li class='dice-<?=$val?>'></li>
<?php endforeach; ?>
</ul>

<p>You got <?=$total?> as a total.</p>
<?php endif; ?>
```

Här har vi alltså ren HTML-kod med insprängda PHP-sekvenser. Det finns en if-sats som kontrollerar om det finns några tärningsslag att skriva ut, och en foreach-loop som gör det vid behov.

Men, kika lite extra på konstruktionen `$this->url->create("dice/roll?roll=1")`, den är till för att skapa interna länkar i ramverket. Du kan direkt se likheten med den route, `dice/roll`, som länken är tänkt att matcha.

I ett ramverk måste vi överlämna all kontroll åt ramverket. När det gäller länkarna så måste ramverket ta ansvar för att skapa dem. Det tillåter oss att ändra hur länkarna genereras och gör att vi kan installera webb-appen på valfri plats. Detta är en del i strategin att ha lösa kopplingar mellan ramverkets komponenter.

Det är alltså ramverks-tjänsten `$this->url` som ansvarar för att skapa länkarna. I detta fallet är `$this` tillgängligt i vyerna och den ger tillgång till alla ramverkets tjänster. Den fungerar på samma sätt som `$app`men rent tekniskt är `$this` en instans av klassen som representerar en vy, [`Anax\View\CViewBasic.php`](https://github.com/mosbth/Anax-MVC/blob/master/src/View/CViewBasic.php). Denna klass erbjuder också tillgång till alla tjänster som finns i `$di`, på samma sätt som `$app` gör. Förenklat kan man alltså säga att `$this` -- i en vy -- är samma sak som `$app`.



Ramverkets uppbyggnad och `$app` {#app}
------------------------------

Variablen `$app` är central i ramverket, eller ja, den klassen som `$app` är en instans av, är central. Klassen är [`\Anax\Kernel\CAnax`](https://github.com/mosbth/Anax-MVC/blob/master/src/Kernel/CAnax.php). Studerar man koden för klassen så ser den dock inte ut att innehålla speciellt mycket. Man kan se `$app` som ett objekt som hjälper en att komma åt ramverkets tjänster som alla ligger i objektet som representeras av `$di`.

Du minns hur vi skapade `$app` och `$di`?

```php
// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();
$app = new \Anax\Kernel\CAnax($di);
```

Klassen `\Anax\Kernel\CAnax` använder ett [trait](kunskap/kom-i-gang-med-oophp-pa-20-steg#traits) som heter [`\Anax\DI\TInjectable`](https://github.com/mosbth/Anax-MVC/blob/master/src/DI/TInjectable.php). I det traitet implementeras tillgången till tjänsterna i `$di`.

Tankar bakom implementationen handlar om dependency injection av en service locator som stödjer *lazy initialization* [^6].

I vy-klassen kan vi se ett liknande mönster. I stycket ovan nämnde jag att ramverkets alla tjänster är tillgängliga via `$this` i en vy. Det är för att klassen för en vy, `Anax\View\CViewBasic.php` på samma sätt använder sig av traitet `TInjectable`.

Trait är en objektorienterad konstruktion som låter klasser återanvända kod, utan att ärva.


I koden representeras det av följande konstruktion.

**Del av `\Anax\View\CViewBasic`.**

```php
namespace Anax\View;

class CViewBasic implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;
```

Här ser vi en klassdeklaration som använder sig av både namespace, [interface](kunskap/kom-i-gang-med-oophp-pa-20-steg#interface) och användande av ett trait. Dessa konstruktioner för objektorienterad kod utgör grunden för många av klasserna i Anax-MVC och det är konstruktioner du kommer att känna igen i många andra ramverk (av nyare modell).



Ramverkets standard tjänster och `$di` {#di}
------------------------------

Vi har pratat en del om ramverkets tjänster, men var skapas de? Vi vet att de skapas i följande konstruktion -- den översta raden skapar ett antal standardtjänster som *injectas* i `$app`. 

```php
// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();
$app = new \Anax\Kernel\CAnax($di);
```

I klassen `\Anax\DI\CDIFactoryDefault` hittar vi de "vanliga" tjänsterna som vi pratar om. Här är exempel på några av dem, och hur de skapas.

```php
namespace Anax\DI;

class CDIFactoryDefault extends CDI
{

    public function __construct()
    {
        parent::__construct();

        $this->setShared('response',  '\Anax\Response\CResponseBasic');
        $this->setShared('validate',  '\Anax\Validate\CValidate');

        $this->setShared('log', function () {
            $log = new \Anax\Logger\CLog();
            $log->setContext('development');
            return $log;
        });

        $this->setShared('request', function() {
            $request = new \Anax\Request\CRequestBasic();
            $request->init();
            return $request;
        });

        $this->setShared('url', function() {
            $url = new \Anax\Url\CUrl();
            $url->setSiteUrl($this->request->getSiteUrl());
            $url->setBaseUrl($this->request->getBaseUrl());
            $url->setScriptName($this->request->getScriptName());
            $url->setUrlType($url::URL_APPEND);
            return $url;
        });

        $this->setShared('views', function() {
            $views = new \Anax\View\CViewContainerBasic();
            $views->setFileSuffix('.tpl.php');
            $views->setBasePath(ANAX_APP_PATH . 'view');
            $views->setDI($this);
            return $views;   
        });

        $this->setShared('router', function() {
            
            $router = new \Anax\Route\CRouterBasic();
            $router->setDI($this);

            $router->addNotFound(function() {
                $this->response->setHeader('404');
                $this->theme->setTitle("Not Found");
                $this->views->add('error/404');
            })->setName('404');
            
            return $router;
        });

        $this->setShared('session', function() {
            $session = new \Anax\Session\CSession();
            $session->configure(ANAX_APP_PATH . 'config/session.php');
            $session->name();
            $session->start();
            return $session;
        });

        $this->setShared('theme', function() {
            $themeEngine = new \Anax\ThemeEngine\CThemeBasic();
            $themeEngine->configure(ANAX_APP_PATH . 'config/theme.php');
            $themeEngine->setDI($this);
            return $themeEngine;
        });
    }
}
```

Varje tjänst läggs till "för hand", antingen via ett klassnamn eller via en anonym funktion som initierar ett objekt av en klass för att sedan returnera det. I koden ovan ser vi tjänster för `response`, `validate`, `log`, `request`, `url`, `views`, `router`, `session` och `theme`. Det är alltså en uppsättning av vanliga tjänster som ett ramverk behöver för att klara sin uppgift.

Studera gärna hur varje tjänst initieras. Här kan du bland annat se hur temat kopplas till sin config-fil.

Som du ser är det enkelt att byta ut vilken klass som används för att implementera en viss tjänst, ramverket som sådant är inte knutet till en speciell klass. Ramverkets struktur bygger egentligen på *'interface*. En klass som skall ha en viss uppgift måste implementera ett specifikt *interface* för att kunna fungera i ramverket. Det kallas *design by contract* [^7] och är delvis bokstaven L i SOLID.

Upplägget i Anax MVC innebär en relativt avancerad konstruktion av kod, baserad på flera design- och programmeringsprinciper, utförda med objektorienterade konstruktioner. Därmed är det också svårt att komma in i ett ramverk för första gången, det är en hel del man behöver lära sig. Belöningen är att man snabbare, säkrare och tryggare kan bygga sina applikationer och webbplatser. 

Man måste bara bli bekant med strukturen och ramverkets olika tjänster.



Avslutningsvis {#avslutning}
------------------------------

Mycket av grundstrukturen i Anax-MVC finns att läsa om i [manualen för ramverket Phalcon](http://docs.phalconphp.com/en/latest/index.html) som är implementerat på ett liknande sätt och har fungerat som *mentor* när koden till Anax-MVC skrevs. Phalcons manualer är utmärkt läsande i vacker arkitektur för ramverk. Det är manualer som skall läsas från pärm till pärm, om du är bestämd i din vilja att bemästra PHP, ramverk och avancerade objektorienterade konstruktioner.

Artikeln har inte fokuserat på M:et eller C:et i MVC, det är föremål för närmare granskning i kommande artiklar.

Fråga gärna i forumet, det finns en särskild [tråd för Anax-MVC](t/2198).



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2014-03-25 (A, mos) Första utgåvan som en del av kursen [phpmvc version 2](phpmvc-v2).  
</span>



Referenser {#referenser}
------------------------

Följande är referenser som använts som fotnötter i texten.

[^1]: [Wikipedia: SOLID](http://en.wikipedia.org/wiki/SOLID_(object-oriented_design)).
[^2]: [Wikipedia: Bootstrapping](http://en.wikipedia.org/wiki/Bootstrapping).
[^3]: [PHP The Right Way om dependency injection](http://www.phptherightway.com/#dependency_injection).
[^4]: [Phalcon om dependency injection och service location](http://docs.phalconphp.com/en/latest/reference/di.html).
[^5]: [Wikipedia: Service Location Patter](http://en.wikipedia.org/wiki/Service_locator_pattern).
[^6]: [Wikipedia: Lazy initialization](http://en.wikipedia.org/wiki/Lazy_initialisation).
[^7]: [Wikipedia: Design by contract](http://en.wikipedia.org/wiki/Design_by_contract).
