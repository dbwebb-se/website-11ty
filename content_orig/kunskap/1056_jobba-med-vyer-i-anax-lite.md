---
author:
    - mos
category:
    - php
    - kurs oophp
revision:
    "2017-03-24": "(A, mos) Första versionen."
...
Att jobba med vyer i Anax Lite
===================================

[FIGURE src=/image/snapvt17/view-layout.png?w=c5&a=10,50,20,0 class="right"]

Vi skall se hur man kan jobba med vyer i Anax Lite. Du har redan bekantat dig med begreppet tidigare, låt oss nu kika lite mer i detalj på hur man kan strukturera sin vy och vilka metoder som finns att tillgå, om man vill skriva mer avancerade vyer, eller om man vill organisera koden i vyerna.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du har läst artiklarna "[Bygg ett eget PHP-ramverk](kunskap/bygg-ett-eget-php-ramverk)" och "[Att integrera en klass i ramverket Anax Lite](kunskap/att-integrera-en-klass-i-ramverket-anax-lite)".



Vy som exempel {#exempel}
------------------------------

När du introducerades i Anax Lite fick du också se en variant på hur man kan kombinera vyer till en webbsida. Vyerna lades till i routen och det såg ut ungefär så här i routen.

```php
$app->router->add("", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("take1/navbar");
    $app->view->add("take1/home");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});
```

Innehållet i de tre vyerna såg ut så här.

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

När man sedan körde mot routen så ser sidan ut så här.

[FIGURE src=image/snapvt17/view-home-route.png?w=w2]

Tittar man på sidans källkod så ser man att HTML-koden från vyerna har slagits ihop, precis som man vill.

[FIGURE src=image/snapvt17/view-view-source.png?w=w2]

Bra så långt. Men kan man göra något mer med Anax vyer?



Grunden i vyn {#grunden}
------------------------------

Grunden i vy-hanteringen är en vykontainer där man samlar alla vyer för att rendera dem i slutet, när svaret skall skapas.

Man kan alltså lägga till vyer till kontainern och de "skrivs ut" i samband med att svaret renderas.

Vyerna läggs till efter varandra, i den ordning man vill att de skall skrivas ut.

```php
$app->view->add("take1/header", ["title" => "Home"]);
$app->view->add("take1/navbar");
$app->view->add("take1/home");
```

Om man vill bifoga variabler från routen in i vyn så gör man det i en array.

```php
$app->view->add("take1/header", ["title" => "Home"]);
```

Ovan skickas arrayen `["title" => "Home"]` in till vyn och inuti vyn kan variabeln `$title` användas.

Så här.

```php
<title><?= $title ?></title>
```

Inuti vyfilen kan du skriva PHP-kod precis som vanligt. Koden ovan visar en kortare syntax för att skriva `<?php echo $title; ?>`. Jag brukar tycka att den formen är trevligare att skriva tillsammans med HTML-kod.

Tittar vi i slutet av routen så ser vi att samtliga vyer renderas till Responsets body för att sedan skickas.

```php
$app->response->setBody([$app->view, "render"])
              ->send();
```

Det var grunden i flödet.



Modulen Anax\View {#modulen}
------------------------------

Låt oss se vilka delar som modulen primärt består av.



###ViewContainer {#viewcontainer}

Den modulen som vi använder, består av kontainern `ViewContainer` som samlar på sig vyerna. Det är den klassen som instansieras i frontkontrollern och blir till en del av ramverket som `$app->view`.

Via `$app->view->add()` så kan man lägga till nya vyer.

Låt oss kika på hur den metoden är definierad i `ViewContainer`.

```php
/**
 * Add (create) a view to be included, pass optional data and put the
 * view in an optional specific region (default region is "main") and
 * pass an optional sort value where the highest value is rendered first.
 * The $template can be a:
 *  filename (string),
 *  callback (array with key callback set to a callable array),
 *  view array (key value array with template, data, region, sort)
 *
 * @param string  $template the name of the template file to include.
 * @param array   $data     variables to make available to the view,
 *                          default is empty.
 * @param string  $region   which region to attach the view, default is
 *                          "main".
 * @param integer $sort     which order to display the views.
 *
 * @return self for chaining.
 */
public function add($template, $data = [], $region = "main", $sort = 0)
```

Du ser att det verkar finnas flera varianter av hur du kan lägga till en ny vy till kontainern.



###View {#view}

Varje gång en ny vy läggs till kontainern så är det i form av en instans av klassen `View`. Det är den instansen som sedan håller reda på all information om hur den skall renderas.

Vill du se detaljer om View så kikar du på metoden `set()`.

```php
/**
 * Set values for the view.
 *
 * @param array|string $template the template file, or array
 * @param array        $data     variables to make available to the
 *                               view, default is empty
 * @param integer      $sort     which order to display the views,
 *                               if suitable
 * @param string       $type     which type of view
 *
 * @return self
 */
public function set($template, $data = [], $sort = 0, $type = "file")
```

Det verkar finnas motsvarande information i View som skickas in till ViewContainer. Vi kan nästan anta att informationen bara bifogas från ViewContainer till View och ViewContainer endast innehåller en array av View-objekt. Men vill vi vara säkra får vi studera källkoden. Det spelar egentligen ingen större roll, bara vi har koll på grunderna, och det har vi.

Klassen View är inget vi normalt behöver använda utifrån routen, det räcker att vi använder vykontainern som internt hanterar objekt av klassen View.

I metoden `render()` så renderas vyn, informationen skrivs ut. Det sker på följande sätt förutsatt att vyn är en fil, en template-fil som den också kan kallas.

```php
$viewRender = new ViewRenderFile();
$viewRender->setApp($app);
$viewRender->render($this->template, $this->templateData);
```

Vi ser att renderingen av vyn här överlåts till klassen `ViewRenderFile` och att variabeln `$app` injectas in i klassen.



###ViewRender {#viewrenderfile}

När vi kikar på klassen `ViewRenderFile` så ser vi först av dess klasskonstruktion att den har tillgång till `$app` eftersom den implementerar interfacet `AppInjectableInterface` och vi ser att den använder sig av ett trait som heter `ViewHelperTrait`.

Själva metoden som slutligen renderar vy-filen är enkel och gör i princip följande.

```php
$data["app"] = $this->app;
extract($data);
include $file;
```

Koden gör så att `$app` samt de från routen bifogade variablerna, här samlade i `$data`, görs tillgängliga för själva vy-filen som sedan görs include på.

Nu är vi i vy-filen.



Vilka variabler finns i vyn {#variabler}
------------------------------

För att skapa ett testprogram så lägger jag till en route `view/test1`. Jag vill gärna se vad jag kan göra i vyn.

```php
$app->router->add("view/test1", function () use ($app) {
    $app->view->add("view/test1", [
        "title" => "Home",
        "message" => "Hello World",
        "answer" => 42
    ]);

    $app->response->setBody([$app->view, "render"])
                  ->send();
});
```

Jag skapar en vy `view/view/test1.php` och lägger till lite debug-kod.

```php
<?php
// Get all available variables
var_dump(get_defined_vars());
```

Resultatet visar de variabler som jag har tillgång till i vyn, dessa kan jag jobba med när jag skapar resultatet i vyn.

[FIGURE src=image/snapvt17/view-data.png?w=w2 caption="Visar alla variabler som finns tillgängliga i vyn."]

Jag uppdaterar min vy och skriver ut variablerna i en lista istället.

```php
<?php
// Get all available variables
//var_dump(get_defined_vars());

?><doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<p><?= $message ?></p>
<p>These variables are defined.</p>
<ul>
<?php foreach (get_defined_vars() as $key => $val) : ?>
    <li><?= $key ?></li>
<?php endforeach; ?>
</ul>
```

Du ser att min vy inleds med en del PHP-kod och sedan går jag över till HTML-läge och skriver ut. När jag är i HTML-läge använder jag gärna den alternativa syntaxen som finns i PHP, jag tycker den kan lämpa sig bättre i kombination med HTML-koden.

Ett alternativ till ovan kod hade varit följande konstruktion.

```php
<?php
$li = "";
foreach (get_defined_vars() as $key => $val) {
    $li .= "<li>$key</li>\n";
}

?><!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<p><?= $message ?></p>
<p>These variables are defined.</p>
<ul>
    <?= $li ?>
</ul>
```

Resultatet blir detsamma, skillnaden är bara hur jag väljer att konstruera HTML-koden. Båda fungerar men jag föredrar ofta den första varianten, jag känner att den ger mig renare kod och hjälper mig att separera HTML till en enda plats.

Så här blir utskriften.

[FIGURE src=image/snapvt17/view-defined-vars-li.png?w=w2 caption="De i vyn definierade variablerna i form av en ul/li-lista."]

Det känns som vi har koll på hur vi kan skicka variabler till vyn och på vilket sätt vi kan skriva koden i vyn. Det är en bra grund.



Hjälpmetoder via ViewHelperTrait {#helpers}
------------------------------

När vi tittade i klassen ViewRenderFile så såg vi ett trait ViewHelperTrait. I det traitet finns ett antal hjälpmetoder som är tillgängliga i själva vyn.

Vi har naturligtvis tillgång till hela `$app` i vy-filen, på gått och ont, men via ViewHelperTrait kan vi skapa metoder som är anpassade för att användas i vyerna och på det sättet minska koden i vy-filerna.

Två av de metoderna som finns definierade är `asset()` och `url()`.

Låt oss kika på dem.

```php
/**
 * Shortcut to create an url for a static asset.
 *
 * @param string $url url to use when creating the url.
 *
 * @return string as resulting url.
 */
public function asset($url = "")
{
    return $this->app->url->asset($url);
}

/**
 * Shortcut to create an url for routing in the framework.
 *
 * @param null|string $url url to use when creating the url.
 *
 * @return string as resulting url.
 */
public function url($url = "")
{
    return $this->app->url->create($url);
}
```

Så här ser det ut om man gör en testsida som använder sig av asset och url för att skapa länkar till olika resurser.

[FIGURE src=image/snapvt17/view-create-asset.png?w=w2 caption="Exempel på länkar med asset och url."]

Kikar man på koden i vyn så ser man hur metoderna används.

```php
<?php

$linkCar = $this->asset("img/car.png");
$linkViewTest1 = $this->url("view/test1");
$linkViewTest2 = $this->url("view/test2");
$linkGoogle = $this->url("https://google.se");

?><!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<p><?= $message ?></p>

<p>Here is a link to a static asset <a href="<?= $linkCar ?>">car.png</a>.</p>

<p>Here is the same car within a paragraph as an image <img src="<?= $linkCar ?>">, the image source is linked as a asset.</p>

<p>Here are two links to the test routes: <a href="<?= $linkViewTest1 ?>">view/test1</a> | <a href="<?= $linkViewTest2 ?>">view/test2</a></p>

<p>Here is a link to another site, like <a href="<?= $linkGoogle ?>">Google</a>.
```

Som du kan se så väljer jag att strukturera vyn med en del PHP-kod överst och därefter utskrift till HTML. Jag finner att det blir renare och mer lättläst kod på det viset.

I koden ovan ser vi att `$this->asset()` och `$this->url()` används som alias där vi lika gärna kunde använt `$app->url->asset()` eller `$app->url->create()`. Så man kan fundera på om view-hjälparna ger så mycket, men lite mindre kod blir det och kanske finns det andra exempel där metoder i vy-hjälparen är mer relevanta. Möjligheten finns ialla fall.



Inkludera en vy i en vy {#include}
------------------------------

Vi vill ha möjligheten att dela upp vyer i olika delar, ett vanligt exempel är att dela in vyerna i header och footer och inkludera dem i en annan vy.



###Skapa vyer för header och footer {#headfooter}

Låt oss skapa en vy `view/view/header.php` och en `view/view/footer.php`.

```php
<!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<body>
<h1>Header</h1>
```

```php
<hr>
<footer>
    <p>Copyright (c) <?= $copyright ?></p>
</footer>
</body>
</html>
```



###Inkluder PHP stil {#includephp}

Låt oss sedan skapa en ny testvy som inkluderar vyerna ovan, först prövar vi med vanlig hederlig PHP include.

```php
<?php include __DIR__ . "/header.php" ?>

<p>This is the test view.</p>

<p><?= $message ?></p>

<?php include __DIR__ . "/footer.php" ?>
```

Sidan kan se ut så här.

[FIGURE src=image/snapvt17/view-include.png?w=w2 caption="Traditionell PHP include i vyerna."]

Det gick ju bra, det handlade egentligen om traditionell PHP programmering med include och samtliga variabler exponeras till de vyer som inkluderas.



###Inkludera via ramverket {#renderview}

Modulen för vyer erbjuder en egen variant till include, en metod som kan rendera en godtycklig view.

Det kan se ut så här.

```php
<?php
//include __DIR__ . "/header.php";
$this->renderView("view/header", [
    "title" => $title,
]);
?>

<p>This is another test view.</p>

<p><?= $message ?></p>

<?php
//include __DIR__ . "/footer.php"
$this->renderView("view/footer", [
    "copyright" => $copyright,
]);
```

Istället för include används här `$this->renderView()` som är en hjälpmetod. Fördelen är att du kan välja vad du bifogar för variabler och att du använder samma konfiguration som för övriga vyer. Ramverket har stöd för att leta efter vy-filer i flera olika kataloger, vilket är en sak du konfigurerar i `config/view`.

Om du inte vill specifiera vilka variabler du skickar vidare till vyn så kan du skicka alla som finns definierade i vyn, så här.

```php
<?php $this->renderView("view/header", $data); ?>

<p>This is another test view.</p>

<p><?= $message ?></p>

<?php $this->renderView("view/footer", $data); ?>
```

Det finns alltså en variabel `$data` som innehåller samtliga variabler som exponerats till vyn.



En layout och rendera vyer i regioner {#layoutrender}
------------------------------

Ett annat sätt att organisera och rendera vyer är via en sammanhållande sida, en layout, som i sin tur väljer var och hur vyer renderas genom att dela in sidan i olika regioner och rendera vyer som är kopplade till en viss region.

Tanken är att man i routen lägger till vyer för att renderas i olika regioner av sidan och den layout man valt har stöd för ett godtyckligt antal regioner.

Låt oss kika på hur det kan se ut.



###En layout {#layout}

Vi tar ett enkelt exempel på hur en layout skulle kunna se ut. Vi kan spara layouten som en vanlig vy-fil i `view/view/layout.php`.

```php
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
</head>
<body>

<h1>A title</h1>

<p><?= $message ?>

<?php if ($this->regionHasContent("flash")) : ?>
<div class="flash-wrap">
    <?php $this->renderRegion("flash") ?>
</div>
<?php endif; ?>

<?php if ($this->regionHasContent("main")) : ?>
<div class="main-wrap">
    <?php $this->renderRegion("main") ?>
</div>
<?php endif; ?>

<?php if ($this->regionHasContent("footer")) : ?>
<div class="footer-wrap">
    <?php $this->renderRegion("footer") ?>
</div>
<?php endif; ?>

</body>
</html>
```

Låt oss nu rendera vyn `view/view/block.php` i respektive region som layouten har skapat åt oss.

Vyn `view/block` ser ut så här.

```php
<p>This is a block in region: <?= $region ?></p>
```

En testroute kan se ut så här. Routen skapar en specifik vy för layouten och renderar endast den. Layout-vyn renderar sedan i sin tur innehåll i respektive region, om det finns.

```php
$app->router->add("view/test5", function () use ($app) {
    // Create default data set to send to the layout
    $data = [
        "title" => "Index",
        "message" => "Hello World"
    ];

    // Add the layout view to its own region
    $app->view->add("view/layout", $data, "layout");

    // Add views to a specific region
    $app->view->add("view/block", ["region" => "flash1"], "flash", 0);
    $app->view->add("view/block", ["region" => "flash2"], "flash", 1);
    $app->view->add("view/block", ["region" => "main1"], "main", 1);
    $app->view->add("view/block", ["region" => "main2"], "main", 0);
    $app->view->add("view/block", ["region" => "footer1"], "footer", 0);
    $app->view->add("view/block", ["region" => "footer2"], "footer", 1);

    // Render the layout view and send the response
    $body = $app->view->renderBuffered("layout");
    $app->response->setBody($body)
                  ->send();
});
```

Vi sätter alltså upp en layout-vy i sin egen region, det är för att vi skall kunna rendera den för sig själv.

Vi lägger till ett antal vyer av `view/block` och lägger dem i de olika regionerna. Varje block får sin egen datamängd. Sista parametern säger i vilken ordning som vyerna skall sorteras vid renderingen. Det gör det flexibelt att bestämma dess ordning, även om man har många vyer och inkluderar dem vid olika tillfällen.

Så här blir resultatet.

[FIGURE src=image/snapvt17/view-layout.png?w=w2 caption="En sida renderad via en layout som innehåller tre olika regioner."]

Du kan se att main-regionen har en sortering som gör att blocken hamnar i omvänd ordning.

Låt oss ta en kort titt på den HTML som skapas.

[FIGURE src=image/snapvt17/view-layout-html.png?w=w2 caption="HTML-källan som layouten skapat."]

Du ser att dina regioner är fyllda av data och nu är det bara CSS som återstår för att placera ut regionerna i förhållande till varandra.



Fler varianter på templatemotor {#templateeng}
------------------------------

Våra vyer kan sägas vara styrda av en PHP templatemotor. Vi skriver PHP i vyerna. Är man programmerare så kan det vara bra att ha tillgång till PHP i vyerna. Men kanske vill man inte erbjuda den möjligheten för alla. Man kan ju inte vara säker på att alla är skolade i god PHP-programmering och att ha tillgång till ett helt programmeringsspråk i vyerna kan vissa uppfatta som en onödig felkälla.

Programmerare och utvecklare har ofta olika syn på var man skall utföra respektive saker och på vilket sätt.

Som ett komplement till PHP som templatemotor kan man använda en mer renodlad templatemotor, som erbjuder egna funktioner och egen syntax, en mer skyddad verksamhet i vyerna, utan kraften av att skriva PHP-kod. Kanske är det en bra miljö för någon som är mer frontend designer än programmerare.

Här är ett par exempel på fristående templatemotorer som används av PHP-communityn (när man inte vill ha ren PHP i vyerna). Med lite arbete kan man integrera dem i sitt ramverk Anax Lite.

* [Smarty](http://www.smarty.net/)
* [Twig](http://twig.sensiolabs.org/)
* [Mustache](https://mustache.github.io/)

Vill du lära dig mer om templatemotorer och varför de finns så är dessa tre ovan, och deras manualer, en god startpunkt.



Avslutningsvis {#avslutning}
------------------------------

Du har nu fått en genomgång av hur vy-filerna fungerar och hur view modulen är implementerad. Du har också sett hur hjälpmetoder kan skapas till vyn och du har sett exempel på hur du kan organisera dina vyer. Med detta har du nu god kontroll över hur dina websidor kan formas.

Artikeln har en [egen forumtråd](t/6365) där du kan ställa frågor eller bidra med tips och trix.
