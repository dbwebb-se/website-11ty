---
author:
    - mos
category:
    - anax
    - remserver
    - php
    - kursen ramverk1
revision:
    "2017-08-15": "(A, mos) Första utgåvan."
...
Att konfigurera routern i Anax
==================================

[FIGURE src=image/snapht17/anax-route-config.png?w=c5&cf&a=10,50,40,0 class="right"]

Vi skall se om det finns alternativ på hur routern och dess routes kan konfigureras. Nu när vi infört dependency injection så vill vi försöka bli av med beroendet till `$app` och istället införa `$di` som den primärar resursen för ramverkets tjänster. Ett steg på den vägen är att se över hur routerna skapas, de är ju sedan tidigare rätt beroende av just `$app`.

Det blir en övning i refactoring av kod och resultatet blir förhoppningsvis kod som blir enklare att underhålla, vidareutveckla och testa.

<!--more-->

Som vanligt funderar vi och utvärderar efter hand.

Vi fortsätter att använda REM servern som exempelkod.



Förutsättning {#pre}
--------------------------------------

Du har läst artikeln "[Anax med Dependency Injection](kunskap/anax-med-dependency-injection)".



Glöm inte `.htaccess` {#htaccess}
--------------------------------------

Glöm inte att redigera din `.htaccess` när du publicerar till studentservern.



En tom Anax {#initanax}
--------------------------------------

När jag jobbar i denna artikeln vill jag ha en tom webbplats att leka med så jag använder kommandot `anax` för att scaffolda en grundstruktur som bygger på Anax och DI.

```bash
# Gå till kursrepot
cd me/kmom03/
anax create anaxr/ ramverk1-di
cd anaxr
```

Öpnna din webbläsare mot `htdocs` för att kontrollera att webbplatsen fungerar. Kontrollera att routen `htdocs/debug/info` också fungerar.



Ny struktur på router-filer {#route2}
--------------------------------------

Modulen `anax/route` innehåller exempel på hur routerns konfiguration kan skrivas på ett alternativt sätt. Vi kopierar över de filerna till vår installation.

```bash
rsync -av vendor/anax/router/config/{route2.php,route2} config/
```

Nu kan vi öppna filerna `route2*` i vår texteditor och se vilka ändringar som är gjorda.



###Konfigfilen route2.php {#route2.php}

Vi börjar titta i filen `config/route2.php` som är routerns huvudsakliga konfigureringsfil. Där ser vi nu att en array returneras och arrayen ser ut att innehålla samma information som tidigare, men en annorlunda struktur, mer som en "vanlig" Anax konfigurationsfil.

Det ser ut ungefär så här.

```php
/**
 * Configuration file for routes.
 */
return [
    // Load these routefiles in order specified and optionally mount them
    // onto a base route.
    // The mount route should end with a slash.
    "routeFiles" => [
        [
            // These are for internal error handling and exceptions
            "mount" => null,
            "file" => __DIR__ . "/route2/internal.php",
        ],
        [
            // For debugging and development details on Anax
            "mount" => "debug/",
            "file" => __DIR__ . "/route2/debug.php",
        ],
        // ...
    ],
];
```

Vi ser att begreppet "mount" har tillkommit men i övrigt ser vi sökvägen vi är vana vid. Låt oss kika på innehållet i de olika router-filerna som är tänkta att inkluderas.



###En route-fil {#routefil}

När vi tittar i en route-fil, till exempel `config/route2/404.php` så ser vi en array som returneras.

Vi tittar på filens innehåll och funderar på hur det motsvarar den äldre routen som ligger kvar och är bortkommenterad.

```php
/**
 * Default route to create a 404, use if no else route matched.
 */
return [
    "routes" => [
        [
            "info" => "Catch all and send 404.",
            "requestMethod" => null,
            "path" => null,
            "callable" => ["errorController", "page404"],
        ],
    ]
];

/*
$app->router->always(function () use ($app) {
    throw new \Anax\Route\NotFoundException();
});
*/
```

I arrayen ser vi `"path" => null` vilket motsvarar anropet till funktionen `always()` och innebär att routen alltid kommer matchas och anropas.

Tittar vi på `"callable"` ser vi en referens till en ramverkstjänst `errorController` samt en metod `page404` som förväntas ligga i denna tjänst.

Det blev fler rader kod med den nya strukturen så man kan fundera på om det blev bättre eller ej, eller bara annorlunda.

Vi har iallafall fått bort beroendet till `$app` och det var något vi önskar uppnå nu när vi alltmer använder `$di` som vår _service kontainer_.

Fortsätt att titta i filerna `route2/{internal,flat-file-content,debug}.php`, och du ser att ingen kod finns för att hantera själva routerna, det finns bara referenser till ramverkstjänster, controllers, som `errorController`, `flatFileContentController` och `debugController`.

Var finner vi den koden? 



Klasser för att rendera sidorna {#pagerender}
--------------------------------------

I denna nya struktur på routerna har vi möjligheten att flytta koden till klasser, kontroller-klasser. Istället för att lägga koden i anonyma funktioner direkt i routerna så samlar vi koden i kontroller-klasser istället. Strukturen med klasser har fördelen att det är enklare att dela gemensamma kod via metoder och medlemsvariabler. En klass är också enklare att enhetstesta, enklare än en anonym funktion som är definierad som en callback i en router.

Detta är alltså en möjlighet till bättre kodstruktur.

Så, var finner vi grundkoden till `errorController`, `flatFileContentController` och `debugController`?



###Modulen anax/page {#anaxpage}

De finns definierade i modulen `anax/page` som i väljer att inkludera.

```bash
composer require anax/page
```

Du kan nu studera klasserna som ligger i `vendor/anax/page/src/Page` och se hur de löser de olika routerna. Jämför gärna med hur de såg ut tidigare när motsvarande kod fanns definierad direkt i routens callback.



###Aktivera tjänsterna i config/di.php {#aktivera}

Vi behöver nu lägga till tjänsterna i ramverkets `$di` via konfigurationsfilen `config/di.php`.

Först lägger vi till de tre olika kontroller-klasserna som tjänster.

```php
"errorController" => [
    "shared" => true,
    "callback" => function () {
        $obj = new \Anax\Page\ErrorController();
        $obj->setDI($this);
        return $obj;
    }
],
"debugController" => [
    "shared" => true,
    "callback" => function () {
        $obj = new \Anax\Page\DebugController();
        $obj->setDI($this);
        return $obj;
    }
],
"flatFileContentController" => [
    "shared" => true,
    "callback" => function () {
        $obj = new \Anax\Page\FlatFileContentController();
        $obj->setDI($this);
        return $obj;
    }
],
```

Det är dessa tre kontroller-klasser som erbjuder metoder som är "endpoints" för de olika routerna.



###En klass för att rendera en sida {#pagerender}

Sedan behöver vi lägga till tjänsten för sidrenderingen, det är klassen `Anax\Page\PageRender` som är till för att rendera en sida enligt den mallen som vi vill ha. Kontroller-klasserna är beroende av att denna tjänsten finns i ramverket och att tjänsten implementerar ett interface `Anax\Page\PageRenderInterface`. Vi kan alltså använda vilken klass vi vill till detta, men klassen måste implementera vårt interface.

```php
"pageRender" => [
    "shared" => true,
    "callback" => function () {
        $obj = new \Anax\Page\PageRender();
        $obj->setDI($this);
        return $obj;
    }
],
```

Klassen innehåller endast en metod `renderPage()` och den producerar den färdiga webbsidan. Denna metoden fanns tidigare i `$app`, men ju mer vi strukturerar ut i klasser och använder `$di` för att hantera ramverkets tjänster, desto minder är vi beroende av en klass som `$app`. Det nya centrala i vårt ramverk är istället `$di` som samlar alla tjänsterna.



Aktiver de nya routerna {#aktivera}
--------------------------------------

Det sista vi behöver göra är att aktivera så att de nya routerna och dess konfiguration blir aktiv. Vi behöver uppdatera filen `config/di.se` så att tjänsten `router` skapas så att den läser in den nya konfigurationsfilen `config/route2.php`.

```php
"router" => [
    "shared" => true,
    "callback" => function () {
        $router = new \Anax\Route\Router();
        $router->setDI($this);
        $router->configure("route2.php");
        return $router;
    }
],
```

I `htdocs/index.php` låter vi nu bli att inkludera den gamla konfigurationsfilen `config/route.php` genom att kommentera bort den raden.

```php
// Load the routes
//require ANAX_INSTALL_PATH . "/config/route.php";
```

Nu är vi redo att testa om våra ändringar fungerar. Det blev ju en del omstruktureringar av koden.

Pröva så att både routen under `htdocs/` och `htdocs/debug/info` fungerar som tidigare.



Kopiera REM servern till Anax {#copyrem}
--------------------------------------

Som ett test på att strukturen fungerar så tar vi och kopierar över en version av REM servern som bygger på denna nya struktur med routerhanteringen.



###Branchen route {#branchrouter}

Vi fortsätter att jobba med REM servern i katalogen `me/kmom02/remserver`. Vi skall bara se till att använda branchen `route` som är omkodad enligt vår nya struktur.

Det du behöver göra är att vara säker på att branchen `route` är den aktiva branchen.

```bash
# Gå till kursrepot
cd me/kmom02/remserver
git fetch
git checkout route
git branch
composer update
```

Om du öppnar `me/kmom02/remserver/htdocs` i webbläsaren så bör du se manualen för REM server och routen `htdocs/api/users` bör också fungera och visa ett JSON objekt.



###Kopiera REM servern {#kopierarem}

Vi har tidigare sett en snabbvariant för att kopiera över grunderna av REM servern till vår egen anax. Här kommer den igen, aningen modifierad för denna artikel.

```bash
# Gå till kursrepot
cd me/kmom03/anaxr

# Manualen
rsync -av ../../kmom02/remserver/content/ content/remserver/
rsync -av ../../kmom02/remserver/htdocs/css/style.css htdocs/css

# Klasserna
rsync -av ../../kmom02/remserver/src/RemServer src 

# Konfigurationen
rsync -av ../../kmom02/remserver/config/{remserver.php,remserver} config/

# Routes
rsync -av ../../kmom02/remserver/config/route/remserver.php config/route2
```

Du behöver lägga till så att stylesheeten laddas, sist gjorde vi det i `src/App/App.php` men nu är det ansvaret överfört till modulen `anax/page`.

Du behöver editera filen `config/route2.php` för att inkludera REM serverns route fil `config/route2/remserver.php`.

Nu bör din Anax fungera tillsammans med REM servern, precis som tidigare.

Öpnna din webbläsare mot `me/kmom03/anax2/htdocs/api/users` för att kontrollera att REM servern är integrerad och fungerar, du bör se ett JSON-objekt. Om du öppnar `me/kmom02/remserver/htdocs/remserver` i webbläsaren så bör du se manualen för REM server och via routen `htdocs/debug/info` bör du se att ett antal routers är laddade.



Blev det bättre? {#battre}
--------------------------------------

Som vanligt ställer vi oss frågan om den nya strukturen blev bättre eller inte. En stor ändring blev beroendet av `$app` som nu nästan är obefintligt. Visst har vi bara flyttat över ansvaret till `$di` men den kontainern är mer anpassad till att vara en service kontainer. Är det bra eller ej? 

De olika routerna och deras konfiguration är nu mer lik resten av konfigurationsfilerna och koden som hanterar routerna, själva "callbacken", är överflyttade till kontroller-klasser. Det känns som det ger mer möjligheter till godare kodstrukturer och som vi nämnt innan, enklare att enhetstesta.

Backar vi två steg för att få en översikt över koden så känns det som vi blir alltmer objektorienterade och paketerar koden i klasser och moduler. Vi använder oss också mer och mer av `$di` för att hantera ramverkets tjänster.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har återigen gjort en övning i refaktoring av ramverkets kod för att studera olika alternativ till strukturer. Nu var det routern som fick en genomgång och förändring i hur konfigurationen sker.

Denna artikel har en [egen forumtråd](t/6619) som du kan ställa frågor i, eller bidra med tips och trix.
