---
author: mos
category: php
updated: "2016-04-07 22:48:28"
created: "2013-12-20 12:31:31"
...
Utöka Anax MVC med kommentarer och pröva pakethantering med PHP
==================================

Det är inte alltid lätt att komma in i ett ramverk och förstå hur det är uppbyggt. Visst är det bra med lättlästa och överskådliga manualer, men vill man gå till botten med hur ett ramverk är uppbyggt så handlar det också om en del detektivarbete. Man behöver följa brödsmulorna som är utlagda -- genom att studera klasserna och se -- vilka *trait* används, vilka *interface* implementeras och hur de *abstrakta basklasserna* utökas.

För att hjälpa dig med detektivarbetet i Anax MVC så kör vi ett exempel där vi skapar ett kommentarssystem.

<!--more--> 

När jag säger *kommentarssystem* så skall du *inte* tänka *"YES! En gästbok igen"*, nej. Du skall tänka som webbtjänsterna Stackoverflow och Disqus. Då blir det rätt. Skaffa dig ett personligt konto på de webbplatserna så du lär dig hur ett kommentarssystem kan se ut.



Förkunskaper {#forkunskaper}
------------------------------

Du behöver ha koll på [Anax MVC](kunskap/anax-som-mvc-ramverk) och [hur man bygger en me-sida i Anax MVC](kunskap/bygg-en-me-sida-med-anax-mvc).

Artikeln ingår i ett kursmoment i kursen phpmvc som också innehåller [fler läsanvisningar](phpmvc-v2/kmom02#lasanvisningar) som är nyttiga för att förstå koncepten i denna artikel.



Skaffa dig en kodbas med Anax MVC {#anax}
------------------------------

Till detta exempel behöver vi en kodbas, kod att utgå ifrån. Det handlar ju ändå om ramverk och att återanvända kod.

Här kan du klona [Anax-MVC](https://github.com/mosbth/Anax-MVC).

```bash
git clone https://github.com/mosbth/Anax-MVC.git
```

Peka din webbläsare på filerna i webrooten, sedan är du igång och kan kika runt.



Kommentarer som ett PHP-paket {#exempel}
------------------------------



###Packagist {#packagist}

Anax MVC innehåller inte någon hantering för kommentarer, men som tur är så finns det ett paket, en modul, som kan hjälpa oss. Detta PHP-paket är publicerat på webbtjänsten [Packagist](https://packagist.org/). Har du inte koll på Packagist så skumläser du sidan som berättar [vad Packagist är](https://packagist.org/about).

Modulen heter `phpmvc/comment` och du kan antingen söka efter den, eller gå direkt till [dess sida](https://packagist.org/packages/phpmvc/comment). Packagist pekar på källkoden som [ligger på GitHub](https://github.com/mosbth/phpmvc-comment/tree/master).

Man kan säga att Packagist erbjuder en strukturerad packeterings- och söktjänst för återanvändbara PHP-paket, eller PHP moduler.



###Composer {#composer}

För att installera paketet så använder jag pakethanteraren -- eller *dependency*-hanteraren -- [composer](https://getcomposer.org/).

Om du inte har composer installerad, så behöver du först [ladda ned och installera den](https://getcomposer.org/download/). Det finns en hel del [dokumentation om composer](https://getcomposer.org/doc/), det kan vara klokt att snabbt läsa igenom hur man [kommer igång med composer](https://getcomposer.org/doc/00-intro.md).



###composer.json {#composerjson}

Anax MVC innehåller en fil `composer.json`. Du behöver uppdatera `composer.json` så att ditt projekt, som nu består av Anax MVC, även blir beroende av paketet `phpmvc/comment`.

[FIGURE src=/image/snap/phpmvc-comment-pkgist.png?w=w2 caption="Lägg till require i composer.json för att hämta hem paketet."]

Editera filen `composer.json` och lägga till ett beroende längst ned. Så här kan slutet av filen se ut.

**Gör ditt projekt beroende av `phpmvc/comment`.**

```javascript
{
    "require": {
        "phpmvc/comment": "dev-master"
    }
}
```

Om det redan finns en *require*, så räcker det om du lägger till raden med `phpmvc/comment` i den.

Nu kan du validera din composer-fil och därefter kan du installera paketet `phpmvc/comment` som ett beroende till ditt projekt.

```bash
cd Anax-MVC
composer validate
composer install --no-dev
```

Alla filer relaterade till `phpmvc/comment` hamnar i en ny katalog -- `vendor`. Där finns även en *autoloader* som Anax MVC kommer att använda sig av för att hitta rätt klassfiler att inkludera.

Jag använder switchen `--no-dev` för att undvika ladda ned de paket som används för den automatiserade test- och bygghanteringen som följer med Anax MVC. Mer om det en annan dag. 

Om jag senare vill kolla att jag har de senaste uppdateringarna installerade så kör jag en *update*.

```bash
composer update --no-dev
```

Nu är grunderna och kodbasen på plats. Låt oss nu knyta ihop det.



Ett flöde enligt MVC {#flode}
------------------------------

Låt oss rita upp ett vanligt flöde i en MVC-applikation som hanterar kommentarer i en databas.

[FIGURE-SVG path=phpmvc/msc/mvc-comment-flow.svg caption="Förenklat sekvensdiagram för användaren som sitter i en webbläsare och öppnar en sidan med kommentarer."]

En frontcontroller som tar emot requesten och *dispatchar* till controllern som använder sig av modellen för att hämta och uppdatera informationen och därefter används vyn för att rendera resultatet till en HTML-sida. Ungefär så funkar ett flöde i godtycklig MVC-applikation.

Men, hur kan detta se ut nu i Anax MVC?



En frontcontroller för kommentarer {#front}
------------------------------

I paketet `phpmvc/comment` finns det en frontcontroller som du kan kopiera till din egen webroot för att testa.

```bash
cd Anax-MVC
cp vendor/phpmvc/comment/webroot/page-with-comments.php webroot
```

Pekar du webbläsaren till frontcontrollern kan du se en sida med lite felmeddelanden.

[FIGURE src=/image/snap/anax-mvc-comments-views-missing.png?w=w2 caption="Felmeddelanden som säger att vyer saknas."]

Vi saknar vyerna. Låt oss kopiera dem också.

```bash
cd Anax-MVC
cp -r vendor/phpmvc/comment/view/comment app/view
```

När vi laddar om ser det bättre ut.

[FIGURE src=/image/snap/anax-mvc-comments.png?w=w2 caption="Ett PHP-paket med kommentarer, nu integrerat i Anax MVC."]

Låt oss då kika på koden och se vad som händer.



Kod för frontcontroller {#frontkod}
------------------------------

Vi känner igen oss i strukturen för en Anax MVC frontcontroller.

`webroot/page-with-comments.php`

```php
// Include the essential settings.
require __DIR__.'/config.php'; 


// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

$di->set('CommentController', function() use ($di) {
    $controller = new Phpmvc\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});

$app = new \Anax\Kernel\CAnax($di);



// Home route
$app->router->add('', function() use ($app) {

    $app->theme->setTitle("Welcome to Anax Guestbook");
    $app->views->add('comment/index');

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
    ]);

    $app->views->add('comment/form', [
        'mail'      => null,
        'web'       => null,
        'name'      => null,
        'content'   => null,
        'output'    => null,
    ]);

});


// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Render the page
$app->theme->render();
```

Det är egentligen två nya saker som sticker ut, som vi inte sett tidigare. Dels är det kontroller-klassen `CommentController` som läggs som en tjänst i `$di` och dels är det ett anrop, i hemma routen, till `$app->dispatcher->forward()`. 

Låt oss kika lite på dessa, de verkar vara de enda sakerna som är relaterade till kommentars-funktionen, bortsett från vyn som lägger till formuläret för kommentaren, `comment/form`.



###Kontroller som tjänster {#dikontroller}

Så här lägger man till en kontroller som en tjänst i `$di`. Kontroller-klassen heter `CommentController` och kommer att mappas mot en route som börjar med `comment/`.

```php
$di->set('CommentController', function() use ($di) {
    $controller = new Phpmvc\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});
```

När man använder en hel klass som kontroller så hämtas den som en tjänst från `$di`. Det betyder att ovanstående är allt som behövs för att koppla in en ny kontroller. 

En sådan här kontroller kan ha hur många *actions*, eller *metoder*, som helst. Det blir alltså ett smidigt sätt att lägga till en hel kontroller-klass som kan utföra många saker.



###*Dispatching* till en metod i en kontroller {#dispatch}

Det finns ingen synlig route som leder fram till denna kontroller-klass. Jag nämnde att att det kommer att ske en mappning från routen `comment/` till tjänsten `CommentController`. Det är en mappning som är en standardhantering i ramverket. En standardhantering som säger att inkommande route mappas mot en struktur om `controller/action/params`.

Om du testar runt lite i sidan med kommentarer, lägger till och tar bort, så är det egentligen två olika routes som används, nämligen följande.

| Route                | Mappas mot                             | Vad gör den? |
|----------------------|----------------------------------------|--------------|
| `comment/add`        | `CommentController::addAction()`       | Lägger till en ny kommentar. |
| `comment/remove-all` | `CommentController::removeAllAction()` | Ta bort alla kommentarer. |

Routerna anropas när du klickar på knapparna i formuläret. 

Själva mappningen av routerna görs i slutet av `$router->handle()`. Det sker alltså först en mappning av alla definierade router och när ingen route kan matchas så överlämnas istället till standardhanteringen och en matchning enligt `controller/action/params`. Kodmässigt ser det ut så här.

Del av [`$app->router->handle()`](https://github.com/mosbth/Anax-MVC/blob/master/src/Route/CRouterBasic.php).

```php
// Default handling route as :controller/:action/:params using the dispatcher
$dispatcher = $this->di->dispatcher;
$dispatcher->setControllerName(isset($parts[0]) ? $parts[0] : 'index');
$dispatcher->setActionName(isset($parts[1]) ? $parts[1] : 'index');

$params = [];
if (isset($parts[2])) {
    $params = $parts;
    array_shift($params);
    array_shift($params);
}
$dispatcher->setParams($params);

if ($dispatcher->isCallable()) {
    return $dispatcher->dispatch();
}
```

Det som sker är att inkommande route, vars delar ligger i arrayen `$parts`, används för att bygga upp en instans av [`Anax/MVC/Dispatcher`](https://github.com/mosbth/Anax-MVC/blob/master/src/MVC/CDispatcherBasic.php) genom att sätta namnet på controller, action och params. När det är gjort, och *om* `$dispatcher` anser att den kan anropa den "gissade" metoden i kontrollern, så sker anropet via `$dispatcher->dispatch()`.

*Dispatch* på ren svenska får bli något i stil med att "skicka vidare".



###En MVC *dispatcher* {#dispatcher}

Vi tar det en gång till.

Det som händer är att namnet på kontrollern, action och eventuella parametrar, sätts i dispatchern. Om de kan matchas mot en metod som är anropsbar, så sker anropet. Denna hantering sker i routern som använder dispatchern.

Kikar vi i [koden för dispatchern](https://github.com/mosbth/Anax-MVC/blob/master/src/MVC/CDispatcherBasic.php) så ser vi att det sker en mappning av delarna av routen, mot ett tänkt namn på kontrollern och på dess metod. Alla - och _ tas bort och små bokstäver ersätts av [CamelCase](http://en.wikipedia.org/wiki/CamelCase). För kontrollerns namn är det *upper camel case* `CommentController` och för metodens namn `removeAllAction` blir det *lower camel case*. Dessutom appendas strängen `'Controller'` till kontrollerns namn och strängen `'Action'` appendas till metodens namn.

Hanteringen är en del av ramverkets namngivningsstruktur.



###Att göra *forward* till en kontroller {#forward}

I hemma-routen fanns ett anrop till dispatchern som såg ut så här.

```php
$app->dispatcher->forward([
    'controller' => 'comment',
    'action'     => 'view',
]);
```

Det är ett anrop som till en kontroller och en metod som kan översättas, i enlighet med ramverkets namngivningsstruktur i dispatchern, till kontroller-klassen `CommentController` och en action, en metod i den klassen, som heter `viewAction`.

Vi kan alltså *forwarda*, skicka vidare, hanteringen i en kontroller till en annan. Detta är exempel på en struktur som kallas [HMVC, eller hierarkisk MVC](http://en.wikipedia.org/wiki/Hierarchical_model%E2%80%93view%E2%80%93controller). En sådan struktur kan underlätta för oss att bygga små enheter, actions, som kan anropas från vilken kontroller som helst. Om du tänker på hur en *sidebar* ser ut så kan du tänka dig att alla delar av en sidebar kan ersättas av varsin *forward* till en specifik kontroller/action.

HMVC och *forward* kan ge oss en bra struktur och uppdelning av koden i ramverket. Vi slipper upprepa kod och kan skapa en instans av kod som löser en uppgift och sedan kan den återanvändas i enlighet med vår traditionella MVC-struktur.



En kontroller-klass `CommentController` {#klasscomment}
---------------------------------------------

Nu har vi gått igenom koden i frontcontrollern, låt oss nu kika på koden för `CommentController` som finns i klassen [`Phpmvc\Comment\CommentController](https://github.com/mosbth/phpmvc-comment/blob/master/src/Comment/CommentController.php). Det handlar om tre metoder.

| Metod             | Vad gör den? |
|-------------------|--------------|
| `viewAction`      | Visa alla kommentarer i vyn `comment/comments`. |
| `addAction`       | Skapa ny kommentar och gör *redirect* till förstasidan igen. |
| `removeAllAction` | Radera alla kommentarer och gör *redirect* till förstasidan igen. |

Så här ser metoden ut som lägger till en ny kommentar.

```php
/**
 * Add a comment.
 *
 * @return void
 */
public function addAction()
{
    $isPosted = $this->request->getPost('doCreate');
    
    if (!$isPosted) {
        $this->response->redirect($this->request->getPost('redirect'));
    }

    $comment = [
        'content'   => $this->request->getPost('content'),
        'name'      => $this->request->getPost('name'),
        'web'       => $this->request->getPost('web'),
        'mail'      => $this->request->getPost('mail'),
        'timestamp' => time(),
        'ip'        => $this->request->getServer('REMOTE_ADDR'),
    ];

    $comments = new \Phpmvc\Comment\CommentsInSession();
    $comments->setDI($this->di);

    $comments->add($comment);

    $this->response->redirect($this->request->getPost('redirect'));
}
```

Kontrollern använder modellen `CommentsInSession` för att hantera lagringen av kommentarerna. Kontrollerns metoder har till uppgift att knyta samman informationen i modellen och visa upp den i vyerna (eller skicka vidare till någon som gör det). En kontroller är en knytpunkt.



En modell-klass `CommentsInSession` {#klasscomments}
---------------------------------------------

Kontrollern använder sig av modellen `CommentsInSession` för att hantera lagringen av kommentarerna. Modellen är implementerad i klassen [`Phpmvc\Comment\CommentsInSession`](https://github.com/mosbth/phpmvc-comment/blob/master/src/Comment/CommentsInSession.php) och har följande metoder.

| Metod       | Vad gör den? |
|-------------|--------------|
| `add`       | Lägg till en ny kommentar och spara undan den i sessionen. |
| `findAll`   | Returnera en array med alla kommentarer. |
| `deleteAll` | Radera alla kommentarer från session. |

Så här ser metoden ut som lägger till en ny kommentar i sessionen.

```php
/**
 * Add a new comment.
 *
 * @param array $comment with all details.
 * 
 * @return void
 */
public function add($comment)
{
    $comments = $this->session->get('comments', []);
    $comments[] = $comment;
    $this->session->set('comments', $comments);
}
```

En modell är ofta en del av gränssnittet mot de fysiska lagringsplatserna. Här används sessionen för att lagra kommentarerna, i nästa skede kan det vara databasen, eller kanske en molntjänst.



Hur laddas klassfilerna? {#loader}
------------------------------------------------

Har du tänkt på att vi inte behövde kopiera klassfilerna? Det behövs inte. Vi använder den struktur som composer har och integrerar composers autoloader in i vårt Anax MVC. Det är en del av vår egen autoloader-hantering som inkluderar composers. Den är synlig i `app/config/autoloader.php`.

`app/config/autoloader.php`

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
           ->addNameSpace('Michelf', ANAX_INSTALL_PATH . '3pp/php-markdown/Michelf')
           ->register();
});



/**
 * Including composer autoloader if available.
 *
 * @link https://getcomposer.org/doc/01-basic-usage.md#autoloading
 */
if(is_file(ANAX_INSTALL_PATH . 'vendor/autoload.php')) {
    include ANAX_INSTALL_PATH . 'vendor/autoload.php';
}
```

Ovan ser du den autoloader som används i Anax MVC. Det är en mappning av flera namespaces mot olika kataloger i filstrukturen. Sista delen i filen inkluderar composers autloader, om den finns tillgänglig.

Autoloader och namespace är kraftfullt, men det kan vara svårt att se hur saker hänger ihop. Gör ditt detektivarbete och följ brödsmulorna.



Vyerna {#vyer}
------------------------------------------------

Det finns tre olika vyer som används, de är inte särskilt stora. Vi kikar på dem.

`comment/index` (visar förstasidan)

```php
<h1>Page with comments</h1>

<p>This is a sample page displaying how comments can interact with a page- or froncontroller.</p>
```

Vy innehåller enbart HTML och välkomstext.


`comment/comments` (visar kommentarerna) 

```php
<hr>

<h2>Comments</h2>

<?php if (is_array($comments)) : ?>
<div class='comments'>
<?php foreach ($comments as $id => $comment) : ?>
<h4>Comment #<?=$id?></h4>
<p><?=dump($comment)?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>
```

Vyn loopar igenom en array av kommentarer och skriver ut innehållet i varje kommentar.


`comment/form` (formuläret med knappar som anropar rätt controller/action)

```php
<div class='comment-form'>
    <form method=post>
        <input type=hidden name="redirect" value="<?=$this->url->create('')?>">
        <fieldset>
        <legend>Leave a comment</legend>
        <p><label>Comment:<br/><textarea name='content'><?=$content?></textarea></label></p>
        <p><label>Name:<br/><input type='text' name='name' value='<?=$name?>'/></label></p>
        <p><label>Homepage:<br/><input type='text' name='web' value='<?=$web?>'/></label></p>
        <p><label>Email:<br/><input type='text' name='mail' value='<?=$mail?>'/></label></p>
        <p class=buttons>
            <input type='submit' name='doCreate' value='Comment' onclick="this.form.action = '<?=$this->url->create('comment/add')?>'"/>
            <input type='reset' value='Reset'/>
            <input type='submit' name='doRemoveAll' value='Remove all' onclick="this.form.action = '<?=$this->url->create('comment/remove-all')?>'"/>
        </p>
        <output><?=$output?></output>
        </fieldset>
    </form>
</div>
```

Vyn visar formuläret för att skapa nya kommentarer. Om du kikar på knapparna, så ser du hur varje knapp styr vilken controller/action som refereras. Beroende på vilken knapp som trycks på så postas formuläret till en särskild route. Koden som löser det är attributet `onclick`.

```php
onclick="this.form.action = '<?=$this->url->create('comment/add')?>'"
```

Det säger att när denna knappen klickas på så uppdateras formulärets attribut `action` och sätt till värdet som returneras av `$this->url->create('comment/add')`.

Det är helt enkelt en taktik för att skicka det postade formuläret till den route man vill skall hantera det.



Avslutningsvis {#avslutning}
---------------------------------

Du har nu en kommentarsfunktion, ett grovt utkast till den, kanske är det dags att själv försöka förädla den? Kanske du kan ta några första stapplande steg mot ditt eget Disqus eller Stackoverflow-liknande kommentarssystem?

Npåja, i vilket fall som så har du fått en genomgång av Packagist, composer, routern, dispatchern och hur man kopplar in en klass som kontroller i Anax MVC.

Låt nu allt falla på plats. Känns det svårt att se hur allt hänger ihop? Detektivarbete, följ spåren och rita en egen bild på papper av hur det är sammanlänkat. Då blir det enklare att förstå och i längden kanske strukturen uppenbarar sig och klarnar. 

Det finns en [forumtråd](t/2225) om du vill fråga eller kommentera denna artikel.



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2014-04-02 (A, mos) Första utgåvan som en del av kursen [phpmvc version 2](phpmvc-v2).  
</span>
