---
author:
    - mos
category:
    - anax
    - remserver
    - php
    - kursen ramverk1
revision:
    "2017-08-11": "(A, mos) Första utgåvan."
...
Anax med Dependency Injection
==================================

[FIGURE src=image/snapht17/anax-di.png?w=c5 class="right"]

Vi jobbar vidare med Anax och REM Servern och använder oss av begreppen dependency injection och lazy loading i ett försök att förbättra strukturen på vår kod.

Det blir en övning i refactoring av kod och resultatet blir förhoppningsvis kod som blir enklare att underhålla, vidareutveckla och testa.

<!--more-->

Vi har ju sedan tidigare en fungerande REM server integrerad i vår me-sida. Vi fick den koden från en befintlig REM server med koden skriven i routerna och därefter tittade vi på en uppdaterad server där koden var omstrukturerad till att ha koden i kontroller- och modell-klasser.

Vi skall nu titta på samma REM server som nu är uppdaterad att fungera i Anax tillsammans med en DI kontainer.

Förbered dig på refactoring och att strukturera om kod. I slutändan funderar vi på om den nya strukturen blev bättre eller inte.



Förutsättning {#pre}
--------------------------------------

Du har läst artikeln "[En REM Server som Kontroller och Modell](kunskap/en-rem-server-som-kontroller-och-modell)".



Glöm inte `.htaccess` {#htaccess}
--------------------------------------

Glöm inte att redigera din `.htaccess` när du publicerar till studentservern.



En tom Anax {#initanax}
--------------------------------------

När jag jobbar i denna artikeln vill jag ha en tom webbplats att leka med så jag använder kommandot `anax` för att scaffolda en sådan.

```bash
# Gå till kursrepot
cd me/kmom03/
anax create anax3/ ramverk1-me
```

Öpnna din webbläsare mot `me/kmom03/anax3/htdocs` för att kontrollera att webbplatsen fungerar. Kontrollera även att routen `htdocs/debug/info` fungerar.



Anax DI {#anaxdi}
--------------------------------------

Då skall vi konvertera `anax3` till att enbart använda sig av konceptet DI. Vi tar den biten innan vi tittar på REM servern och hur den använder sig av DI konceptet i Anax.



###Modulen anax/di {#instmodulen}

Det allra första vi behöver till `anax3` är modulen [`anax/di`](https://packagist.org/packages/anax/di) och vi installerar den med composer.

```bash
# Gå till kursrepot
cd me/kmom03/anax3
composer require anax/di
```

Nu finns modulen på plats, du kan se hur den är uppbyggt i katalogen `vendor/anax/di`. Katalogstrukturen är som en vanlig modul till Anax.



###Konfigurationen av tjänsterna {#diconfig}

Tidigare satte vi upp ramverkets tjänster i filen `config/service.php`. Nu skall vi göra det på ett nytt sätt via en ny konfigurationsfil `config/di.php`.

Vi kopierar en fil från DI-repot så vi har något att utgå ifrån.

```bash
# Du är i katalogen anax3
cp vendor/anax/di/config/di.php config/
```

Öppna de båda filerna `config/service.php` och `config/di.php` för att jämföra koden i dem. Du kan troligen mappa koderna mellan filerna och se hur den nu är strukturerad.

Sammanfattnings kan vi säga att vi nu definierar alla tjänsterna i en array med deras namn och en callback som kan initiera tjänsten när den behövs.

Inledningen i filen `config/di.php` ser ut så här och det är definitionen av tjänsten `request` och `response` vi ser och den utförs på samma sätt som tidigare, det är bara en liten annan struktur.

```php
/**
 * Configuration file for DI container.
 */
return [
    // Services to add to the container.
    "services" => [
        "request" => [
            "shared" => true,
            "callback" => function () {
                $request = new \Anax\Request\Request();
                $request->init();
                return $request;
            }
        ],
        "response" => [
            "shared" => true,
            "callback" => "\Anax\Response\Response",
        ],
```

Koden ovan ersätter alltså den vi tidigare såg i `config/service.php`.

Så här såg den tidigare varianten ut.

```php
// Add all resources to $app
$app = new \Anax\App\App();
$app->request    = new \Anax\Request\Request();
$app->response   = new \Anax\Response\Response();

// Configure request
$app->request->init();
```

Tjänsterna skapas, men ännu ligger de inte i en `$app`, de är bara förberedda för att läsas in i en DI-kontainer, en `$di`.



###Delad tjänst och inte {#delad}

När en tjänst är delad, "shared", så innebär det att det bara finns en instans av tjänsten i ramverket. Första gången som tjänsten skapas så är det alltid callbacken som anropas. Om någon försöker nå tjänsten igen, via DI-kontainern, så returneras samma instans, samma objekt.

Om tjänsten inte är delad så skapas och returneras en ny instans varje gång man ber om tjänsten via DI-kontainern. Det är skillnaden mellan delade och icke-delade tjänster.

De tjänsterna som vi har sett hittills är alla delade och finns således bara som en instans i ramverket.

Om du är bekant med begreppet och designmönstret Singleton så kan man säga att det är liknande, det finns bara en instans av klassen i hela ramverket. Designmönstret Singleton är en annan variant som uppnår ett liknande upplägg i en applikation.



###Skapa DI-kontainern {#diskapa}

Då skall vi skapa DI-kontainern och fylla den med tjänster från konfigurationsfilen. Detta är något vi gjort på olika platser under olika projekt och kurser. Från början använde vi filen `htdocs/index.php`, sedan flyttade vi koden till `config/service.php` som vi nu inte använder längre.

Det vi gör nu är att åter titta på `htdocs/index.php`, det är där som vi skapar objektet `$app` oavsett var vi lägger till tjänsterna.

Vi uppdaterar `htdocs/index.php` så att vi skapar objektet `$app` via `new`, istället för att inkludera den gamla filen.

```php
// Add all services to $app
//$app = require ANAX_INSTALL_PATH . "/config/service.php";
$app = new \Anax\App\App();
```

Vi vill nu skapa en instans av `$di` och här finns flera alternativ hur vi kan göra. Modulen `anax/di` erbjuder olika varianter av hur vi skapar vår DI-kontainer. Jag tänker använda varianten `Anax\DI\DIFactoryConfig` som läser in tjänsterna från en konfigurationsfil.

```php
// Add all services to $app
//$app = require ANAX_INSTALL_PATH . "/config/service.php";
$di  = new \Anax\DI\DIFactoryConfig("di.php");
$app = new \Anax\App\App();
```

Nu har vi `$di` och `$app` men det vore enklare om vi kan integrera `$di` in i `$app`, ungefär som vi tidigare jobbade med `$app`-objektet. Det är ingentligen inget vi behöver, men det kan vara enklare med tanke på bakåtkompabilitet.



###Injecta $di in i $app {#injectditoapp}

I modulen `anax/di` finns ett interface `\Anax\DI\InjectionAwareInterface` och ett trait `\Anax\DI\InjectionAwareTrait` som implementerar interfacet. Dessa är till för att användas av en klass som är tänkt att injectas med en DI-kontainer såsom `$di`.

Kika på källkoden bakom interfacet och traitet så ser du att det handlar om en protected medlemsvariabel `$di` och en metod `setDI()` som sätter den skyddade medlemsvariabeln.

Genom att implementera interfacet i `$app` så säger jag att denna klassen skall kunna ta emot en `$di` och genom att använda traitet så slipper jag skriva den kodbiten själv.

Jag skulle kunna uppdatera min egen klass i `src/App/App.php` men för exemplets skull så väljer jag att göra en ny subklass för att visa vilken skillnaden är. Sublassen som jag döper till `\Anax\App\AppDI.php` ser ut så här.

```php
<?php

namespace Anax\App;

use Anax\App\App;
use Anax\DI\InjectionAwareInterface;
use Anax\DI\InjectionAwareTrait;

/**
 * An App class to wrap the resources of the framework, prepared to use a
 * DI container.
 */
class AppDI extends App implements InjectionAwareInterface
{
    use InjectionAwareTrait;
}
```

Du finner exempelklassen i modulen `anax/di` och du kan kopiera den så här.

```bash
# Du står i katalogen anax3
cp vendor/anax/di/src/App/AppDI.php src/App
```

Nu kan vi uppdatera `htdocs/index.php` så att vi använder den nya klassen till `$app` som vi kan injecta vår `$di` in i.

Så här blir det.

```php
// Add all resources to $app
//$app = require ANAX_INSTALL_PATH . "/config/service.php";
$di  = new \Anax\DI\DIFactoryConfig("di.php");
//$app = new \Anax\App\App();
$app = new \Anax\App\AppDI();
$app->setDI($di);
```

Nu finns `$di` inuti `$app` men vi kan inte göra en `$app->request` som vi kunde tidigare. Tjänsten ligger nu i `$app->di->get("request")` och `$app->di` är protected. Man kan också komma åt tjänsterna direkt från `$di` via `$di->get("request")`.

Det hade varit bekvämt om vi kunde göra ett liknande anrop som vi gjorde tidigare med `$app->request`, då hade det varit enklare att göra `$app` bakåtkompatibel och lite enklare att gå från icke DI till ren DI i koden.



###En bakåtkompatibel $app {#bakkompatibel}

Låt oss därför introducera de magiska metoderna i PHP, här i form av `__get()` och `__call`.

När man lägger till en metod `__get()` i en klass så kommer den att anropas varje gång man försöker nå en medlemsvariabel i klassen som inte är definierad.

På samma sätt fungerar `__call()` men den gäller anrop till icke existerande metoder.

De båda magiska metoderna är en form av _catch-all_ för läsning av medlemsvariabler respektive anrop av metoder, när dessa medlemsvariabler och metoder är odefinierade i klassen.

Det låter som dessa kan hjälpa oss och lösa vårt önskemål om bakåtkompatibel `$app`.

När vi tittar in i modulen `anax/di` så finner vi ytterligare en klass, `\Anax\App\AppDIMagic` som använder ett trait `\Anax\DI\InjectionMagicTrait` som implementerar `__get()` och `__call()` mot en `$this->di`. Låt oss använda den.

Du finner klassen i modulen `anax/di` och du kan kopiera den så här.

```bash
# Du står i katalogen anax3
cp vendor/anax/di/src/App/AppDIMagic.php src/App
```

Nu kan vi uppdatera `htdocs/index.php` så att vi använder den nya klassen `AppDIMagic`.

Så här blir det.

```php
// Add all resources to $app
//$app = require ANAX_INSTALL_PATH . "/config/service.php";
$di  = new \Anax\DI\DIFactoryConfig("di.php");
//$app = new \Anax\App\App();
//$app = new \Anax\App\AppDI();
$app = new \Anax\App\AppDIMagic();
$app->setDI($di);
```

Nu är vi redo att testa om våra ändringar fungerar. Öppna webbläsaren mot katalogen `htdocs` och du bör se en standardsida och öppnar du `htdocs/debug/info` så bör även den sidan fungera.

Vi har nu uppdaterat vår Anax till att i grunden använda Anax DI och samtidigt är min `$app` bakåtkompatibel.

Stanna gärna upp och fundera vilken kod vi ändrat och vad som skiljer sedan tidigare.



Bakom kulisserna {#kulisser}
--------------------------------------

Om vi studerar tjänsterna i `config/di.php` så kan vi se, om vi tittar noggrant, att klassen för routern och klassen för vy-kontainern är ändrade till nya klassnamn. Det stämmer. De tidigare klasserna använde sig av `$app` som injectades in i dem, de nya klasserna baseras på att `$di` injectas in i dem.

En annan uppdatering är tjänsten `viewRenderFile` som är en ny tjänst som är den som ansvarar för att rendera en view genom att inkludera template-filen och göra data tillgängligt för vyn. Den klassen har egentligen inget med DI-konceptet att göra utan jag tog bara tillfället i akt och exponerade den som en ramverkstjänst. Nu kan man enkelt byta ut den tjänsten mot en egen renderingsklass, så länge renderingsklassen uppfyller interfacet `\App\View\    ViewRenderFileInterface`. Så även om denna tjänsten inte är direkt relevant så är den ändå ett exempel på hur man kan exponera något som sker inuti View-klasserna och erbjuda en egen implementation genom att bara konfigurera tjänsten som skapas i.

Nåväl, en bakåtkompatibel `$app` och en ny arbetshäst i form av `$di`.

Tidigare skickade vi runt en referens till `$app` men nu är tanken att vi skickar runt `$di` istället. Man skulle kunna säga att båda två är variationer av konceptet _Service Container_.

En fördel med `$di` är att den löser lazy loading. Lazy loading innebär att tjänsterna är förskapade men laddas inte förrän de behövs. Det är en bra feature i en DI kontainer.



En REM server {#initrem}
--------------------------------------

I förra artikeln jobbade vi med en klonad version av REM servern i katalogen `me/kmom02/remserver`. Du kan fortsätta att använda den katalogen för källkoden till REM servern.

Det du behöver göra är att vara säker på att branchen `di` är den aktiva branchen.

```bash
# Gå till kursrepot
cd me/kmom02/remserver
git fetch
git checkout di
git branch
composer update
```

Om du öppnar `me/kmom02/remserver/htdocs` i webbläsaren så bör du se manualen för REM server och routen `htdocs/api/users` bör också fungera och visa ett JSON objekt.



Studera ändringarna i REM servern {#copyrem}
--------------------------------------

Låt oss studera och stegvis kopiera över REM servern till vår `anax3`. Det blir en övning i att se hur vi nu använder oss av en modul tillsammans med Anax DI.



###Initiera som ramverkstjänster {#remservice}

REM servern lägger till sig själv via `config/di.php`. Kika längst ned i filen så ser du följande kod.

```php
        "rem" => [
            "shared" => true,
            "callback" => function () {
                $rem = new \Anax\RemServer\RemServer();
                $rem->inject($this->get("session"));
                return $rem;
            }
        ],
        "remController" => [
            "shared" => false,
            "callback" => function () {
                $rem = new \Anax\RemServer\RemServerController();
                $rem->setDI($this);
                return $rem;
            }
        ],
    ],
];
```

Du behöver alltså lägga till den koden till din egen `config/di.php`. Förutsatt att din inte ändrat något i din egen `config/di.php` så kan du kopiera den som ligger i REM servern.

```bash
# Gå till din katalog för anax3
cp ../../kmom02/remserver/config/di.php config/
```

Dubbelkolla att det ser bra ut i filen.



###Ändringar i RemServer {#remchangesrver}

Det var en mindre ändring i hur tjänsten `rem` initieras. Det är metodnamnet och parametern som gjorts någon mindre ändring i, men principen är densamma att klassen vill ha en koppling till ramverkstjänsten för sessionen.

Det var egentligen det enda som uppdaterats. Källkoden i modellklassen `RemServer` är i övrigt densamma som tidigare.

Klassen var ju enbart beroende av sessionen och har således ingen annan koppling till de ändringar vi gjort med DI.



###Ändringar i RemServerController {#remchangecontr}

Kontrollerklassen `RemServerController` fick lite fler uppdateringar men alla rörde sig att byta ut referensen från `$app` till `$di` som nu injectas in i klassen.

När man tittar på de ändringar som gjorts så ser vi följande kodkonstruktioner.

```php
/**
 * Start the session and initiate the REM Server.
 *
 * @return void
 */
public function anyPrepare()
{
    $session = $this->di->get("session");
    $rem     = $this->di->get("rem");

    $session->start();

    if (!$rem->hasDataset()) {
        $rem->init();
    }
}
```

I metoden ovan hämtar man de tjänsterna som behövs för att utföra metodens arbete, de lagras undan i lokala variabler och används därefter.

Vi kan även titta på ett annat exempel.

```php
/**
 * Delete an item from the dataset.
 *
 * @param string $key    for the dataset
 * @param string $itemId for the item to delete
 *
 * @return void
 */
public function deleteItem($key, $itemId)
{
    $this->di->get("rem")->deleteItem($key, $itemId);
    $this->di->get("response")->sendJson(null);
    exit;
}
```

I metoden ovan ser vi att man använder `$di` direkt och hämtar ut tjänsten och använder den.

Vilken av dessa sätt man använder beror på hur man vill se sin kod. Det kan vara enklare att lagra undan i en lokal variabel om man använder samma tjänst flera gånger. Men annars går det bra att hämta den direkt, och använda den, via ett anrop `$this->di->get("the-service-name")`.



Kopiera REM servern till Anax {#copyrem}
--------------------------------------

I förra artikeln gick vi stegvis igenom hur man kopierade över REM servern till en Anax-installation. Här är den snabba versionen av hur du gör kopieringen. Se det som en repetition.

```bash
# Gå till kursrepot
cd me/kmom03/anax3

# Manualen
rsync -av ../../kmom02/remserver/content/ content/remserver/
rsync -av ../../kmom02/remserver/htdocs/css/style.css htdocs/css/remserver.css

# Klasserna
rsync -av ../../kmom02/remserver/src/RemServer src 

# Konfigurationen
rsync -av ../../kmom02/remserver/config/{remserver.php,remserver} config/

# Routes
rsync -av ../../kmom02/remserver/config/route/remserver.php config/route
```

Du behöver lägga till så att stylesheeten laddas, sist gjorde vi det i `src/App/App.php`.

Du behöver editera filen `config/route.php` för att inkludera REM serverns route fil `config/route/remserver.php`.

Nu bör din Anax fungera tillsammans med REM servern, precis som i förra kursmomentet.

Öpnna din webbläsare mot `me/kmom03/anax2/htdocs/api/users` för att kontrollera att REM servern är integrerad och fungerar, du bör se ett JSON-objekt. Om du öppnar `me/kmom02/remserver/htdocs/remserver` i webbläsaren så bör du se manualen för REM server och via routen `htdocs/debug/info` bör du se att ett antal routers är laddade.

Det gäller att hålla tungan rätt i munnen då det är många filer. Men när man vänjer sig så blir man mer och mer bekväm med var filerna finns och det blir enklare att felsöka. Oavsett ramverk så handlar det om att hålla koll på var filerna ligger och vad de gör.



Blev det bättre? {#battre}
--------------------------------------

Nu har du en uppdaterad `anax3` som använder sig av Anax DI och du har integrerat REM servern som också använder sig av DI. Blev det bättre elle rbara annorlunda?

Kanske är det svårt att se, eller greppa, efter så här kort tid. Om man har en service kontainer i form av `$app` eller `$di` kan ju kvitta lika. Men begreppet DI är känt i ramverkssammanhang oavsett språk så det är nog ett gott tips att anamman den.

Vår `$app` som tidigare innehöll all viktig information gör det fortfarande, men vi ser, och kommer fortsätta se, att dess viktighet blir mindre och mindre när vi bygger ut klasser i ramverket. Det blir mer fokus på `$di` och att injecta delar av `$di` in i de klasser som behöver det.

Bara för man har en service kontainer så behöver man inte nödvändigtvis injecta den i alla klasser. Se på RemServer modellen som enbart behövde tillgång till sessionen, där väljer vi att enbart injecta det beroendet. Men i RemServerController så används frekvent de tjänster som ligge i `$di` vilket gör det rimligt att injecta hela `$di`.

Anax DI blir nu ett lim som håller samman modulerna i ramverket. En del av beroendena löses med `$di`. Det innebär också att beroendena till koden som löser DI-delen ökar. Det finns inget som säger att man måste ha just modulen `anax/di` som löser DI funktionen. Det finns ett arbete i [PHP FIG PSR-11](http://www.php-fig.org/psr/psr-11/) där man försöker definiera en generell DI kontainer. Anax DI implementation är gjord enligt de interface som finns i PSR-11 vilket innebär att den kan bytas ut mot godtycklig kontainer som stödjer PSR-11. Se det som ett exempel på hur moduler kan göras mer oberoende av den miljö de arbetar i.



Scaffolding av Anax med DI {#scaffold}
--------------------------------------

Nu när vi gått igenom stegen för att göra en installation av Anax med Anax DI så kan vi lika gärna spara undan den mallen så att den blir enkel att scaffolda i framtiden. Sagt och gjort. Det går nu att scaffolda en grund av Anax DI via mallen `ramverk1-di`.

```bash
anax create di ramverk1-di
```

Mallen innehåller samma som vi gjort i `anax3` i denna artikel, bortsett från integrationen med REM servern.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har gått igenom hur Anax jobbar med konceptet dependency injection och vi har sett en modul som löser DI kontainern enligt PSR-11. Samtidigt har vi sett hur REM serverns kontroller och modell anpassats till DI-konceptet.

Denna artikel har en [egen forumtråd](t/6611) som du kan ställa frågor i, eller bidra med tips och trix.
