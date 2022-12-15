---
author: mos
category: php
updated: "2015-02-04 14:15:34"
created: "2014-03-07 14:57:13"
...
Bygg en me-sida med Anax-MVC
==================================

Hur kan man enklast lära sig ett nytt ramverk? Jo, man bygger en me-sida i det. Eller ja, en me-webbplats är det ju egentligen.

Denna artikel visar hur du använder Anax MVC för att bygga en enklare, icke-databasbaserad webbplats, som kan bli grunden för din me-sida.

<!--more-->

Denna artikel är skriven med fokus på phpmvc-kursen och bygger vidare på artikeln ["Anax som MVC-ramverk"](kunskap/anax-som-mvc-ramverk).

Så här kan det se ut när du är klar.

[FIGURE src=/image/snap/phpmvc-me.png?w=w2&sa=jpg caption="En me-sida byggd med Anax-MVC."]

Nåväl, hur skapa vi då denna me-sida, eller me-webbplats, som är en mer korrekt benämning.



Ladda ned och installera Anax-MVC {#anax-mvc}
------------------------------

Det är lika bra att du gör samma sak som jag gör, börja med en nya kopia av Anax MVC.

[Anax-MVC finns på GitHub](https://github.com/mosbth/Anax-MVC), klona det så här.

```bash
git clone https://github.com/mosbth/Anax-MVC.git
```

Peka din webbläsare på filen som ligger i `webroot/hello.php`. Då kör vi.



Routes för en me-sida {#route}
------------------------------

En me-sida brukar innehålla tre delar från starten, en välkomstsida som presenterar dig, en redovisningssida för alla redovisningstexter och en sida som visar källkoden. Det låter som tre *routes*.

**Routes för me-sidan.**

| Route           | Exempel             | Förklaring |
|-----------------|---------------------|------------|
| `""`            | `me.php`            | Välkomstsidan med presentation av mig själv. |
| `"redovisning"` | `me.php/redovisning`| Redovisningar av kursmomenten. |
| `"source"`      | `me.php/source`     | Visa källkoden. |

Detta ger mig grunden till frontcontrollern för me-sidan, den får heta `me.php`.

**frontcontroller `me.php`.**

```php
require __DIR__.'/config_with_app.php'; 

$app->router->add('', function() use ($app) {

});

$app->router->add('redovisning', function() use ($app) {

});

$app->router->add('source', function() use ($app) {

});

$app->router->handle();
$app->theme->render();
```

Klart. Grundstrukturen är lagd. Ser det bra ut? Överskådligt, enkelt, snabbt att komma igång?



Modifiera temat {#tema}
------------------------------

Vi vill naturligtvis ha ett eget utseende. Låt oss ändra webbplatsens header och footer-delar. För att förstå hur vi gör det måste vi kika på ramverkstjänsten `$app->theme`.



###Temat är en tjänst {#app-theme}

Temat är en tjänst som skapas i [`\Anax\DI\CDIFactoryDefault`](https://github.com/mosbth/Anax-MVC/blob/master/src/DI/CDIFactoryDefault.php).

**Del av `\Anax\DI\CDIFactoryDefault`.**

```php
$this->setShared('theme', function() {
    $themeEngine = new \Anax\ThemeEngine\CThemeBasic();
    $themeEngine->configure(ANAX_APP_PATH . 'config/theme.php');
    $themeEngine->setDI($this);
    return $themeEngine;
});
```

Temat är en delad tjänst, alla som använder den använder samma instans av tjänsten. Det skapas inte nya instanser varje gång som den används. Tjänsten bygger på klassen [`\Anax\ThemeEngine\CThemeBasic`](https://github.com/mosbth/Anax-MVC/blob/master/src/ThemeEngine/CThemeBasic.php) och konfigurationsfilen ligger i [`app/config/theme.php`](https://github.com/mosbth/Anax-MVC/blob/master/app/config/theme.php).



###Skapa min egen config-fil för temat {#theme-config}

För att komma igång snabbt så gör jag en kopia av config-filen och döper den till `theme_me.php`. 

Hur gör jag för att min nya config-fil skall användas av tjänsten? Du kan helt enkelt läsa in den, tjänsten använder alltid den senast inlästa config-filen.

**Läs in ny konfiguration för temat i frontcontrollern.**

```php
$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');
```

Lägg raden högt upp i din frontcontroller, gärna innan du skapar dina routes. Så får du all konfiguration överst i frontcontrollern.



###Använd egna vyer {#theme-view}

Nu kan jag ändra i config-filen och lägga till mina egna vyer för header och footer.

**Ändra till egna vyer för header och footer i `app/config/theme_me.php`.**

```php
'views' => [
    [
        'region'   => 'header', 
        'template' => 'me/header', 
        'data'     => [
            'siteTitle' => "Min me-sida i PHPMVC",
            'siteTagline' => "Här är en tagline som säger nåt vackert",
        ], 
        'sort'     => -1
    ],
    ['region' => 'footer', 'template' => 'me/footer', 'data' => [], 'sort' => -1],
],
```

Jag har två vyer och som du kan se så skickar jag in data i header-vyn. Jag har skapat en vy som är neutral per dess innehåll och jag kan styra webbplatsen titel och tagline via config-filen. Jag tycker om den separationen av vyer och webbplatsens innehåll, *content*. Nu kan jag återanvända den vyn till andra webbplatser. Nåja, jag kanske behöver göra något med logon också, men du förstår principen?

Inte? Kika på vyn nedan så kanske det klarnar.



###Vy för header {#view-header}

Så här ser min vy `me/header` ut.

**`app/view/me/header.tpl.php`**

```php
<img class='sitelogo' src='<?=$this->url->asset("img/anax.png")?>' alt='Anax Logo'/>
<span class='sitetitle'><?=$siteTitle?></span>
<span class='siteslogan'><?=$siteTagline?></span>
```

Vill du ändra något mer i temat så modifierar du bara `theme_me.php`, testa och lek.



En navbar meny {#navbar}
------------------------------

En webbplats behöver en meny och ramverket får hjälpa oss med det. Det finns en tjänst som heter `$app->navigation` som är till för detta.



###Tjänsten navbar {#service-navbar}

Tjänsten skapas som precis som alla andra ramverkstjänster.

**`\Anax\DI\CDIFactoryDefault`**

```php
$this->setShared('navbar', function() {
    $navbar = new \Anax\Navigation\CNavbar();
    $navbar->configure(ANAX_APP_PATH . 'config/navbar.php');
    $navbar->setDI($this);
    return $navbar;
});
```

Tjänsten bygger alltså på klassen [`\Anax\Navigation\CNavbar`](https://github.com/mosbth/Anax-MVC/blob/master/src/Navigation/CNavbar.php) och har sin config-fil i [`app/config/navbar.php`](https://github.com/mosbth/Anax-MVC/blob/master/app/config/navbar.php). 

Det verkar som klassen `\Anax\DI\CDIFactoryDefault` är bra att kika i, där kan man se hur saker hänger ihop.



###Byt config-fil för navbaren {#navbar-config}

Ta en kopia av filen `app/config/navbar.php`, spara den som `app/config/navbar_me.php`. Modifiera den och skapa en egen navbar för din me-sida. Läs in filen i din frontcontroller, på samma sätt som du gjorde med config-filen för temat.

**Läs in ny konfiguration för navbar i frontcontrollern.**

```php
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
```

Raden behöver ligga innan du renderar temat.



###Navbar som vy i temat {#navbar-view}

Nu till det roliga, håll tungan rätt i mun nu.

Tjänsten navbar använder sig av config-filen för att skapa  en ul/li-lista som blir menyn. Det finns en metod i `$app->navbar` som returnerar HTML-kod för navbaren. Callback-metoden exekveras i vy-klassen som har tillgång tillramverkets tjänster, därav används `$this` för att nå dem. 

Detta beteende, att använda en callback-funktion istället för en template-fil, är alltså att betrakta som en vy, eller kanske ett *genererat innehåll* som skall presenteras i en vy. Ramverkets vy-hantering stödjer att en funktion skapar innehållet i en vy. Det kan ses som ett komplement till att ha en vy på fil.

**Lägg till navbar som vy i `theme_me.php`.**
```php
'views' => [

    // View for header

    // View for footer

    [
        'region' => 'navbar', 
        'template' => [
            'callback' => function() {
                return $this->di->navbar->create();
            },
        ], 
        'data' => [], 
        'sort' => -1
    ],
],
```

Vi skapar alltså menyn genom att lägga till den som en vanlig vy i temats config-fil.

Är denna typen av innehåll en vy, eller ett innehåll, *content*? Ja, nånstans mittemellan kanske. Det är en vy i botten (generell HTML-struktur för menyn) och innehåll som initieras i config-filen och genereras av funktionen (webbplats-specifikt), funktionen håller också koll på nuvarande sida så att nuvarande menyval kan markeras. Dessa bitar är hårt sammankopplade i skapandet av menyn och nu ligger allt i en klass med en metod som returnerar resultatet som en form av vy.

Är du intresserad av hur vyn renderas av temat? Kika i [temats template-fil](https://github.com/mosbth/Anax-MVC/blob/master/theme/anax-base/index.tpl.php) för att se var regionen navbar renderas. Som du ser så har standard-temat stöd för *regionen navbar*.



###Lägg till stylesheeten för navbaren {#navbar-style}

Navbaren behöver en stylesheet för att se lite trevligare ut. Det finns en stylesheet bifogad som ligger i `webroot/css/navbar.css`. Du kan lägga till den i temats konfig-fil.

`app/config/theme_me.php`

```php
// Stylesheets
'stylesheets' => ['css/style.css', 'css/navbar.css'],
```





Sidor som vyer {#sida-vy}
------------------------------

Nu börjar det likna en webbplats, då är det bara innehållet kvar. Vi kan lägga till det som vyer. Det är inte så svårt. Så här kan en route se ut som använder en vy för att visa webbplatsen innehåll.

**Route för att visa vy.**

```php
$app->router->add('redovisning', function() use ($app) {

    $app->theme->setTitle("Redovisning");
    $app->views->add('me/redovisning');

});
```

Klart. Testa och se hur det blir.

Men tänk efter också, nu har vi en vy som innehåller *content*, webbplatsspecifikt innehåll. Det är inte optimalt. Vi vill gärna kunna återanvända vyer, en vy får innehålla grundstrukturen för innehållet som skall presenteras, men själva innehållet kan ligga någon annanstans, i en databas eller i en annan fil, en innehållsspecifik fil.



Sidor som innehåll {#sida-content}
------------------------------

Vi har ingen databas, men vad händer om vi lägger innehållet på en fil på disk, som ett alternativ till att spara innehåll i databasen?

För att göra ett exempel så skriver jag min egen me-sida i [Markdown-syntax](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php) och lägger den i filen `app/content/me.md`. Nu har jag en innehållsspecifik fil. 

Nu behövs en vy som kan rendera innehållet.

**Template-fil `app/view/me/page.tpl.php` för vyn `me/page`.**

```html
<article class="article1">

<?=$content?>

<?php if(isset($byline)) : ?>
<footer class="byline">
<?=$byline?>
</footer>
<?php endif; ?>

</article>
```

Mina vyer benämner jag med kortnamnet `me/page` och en sådan vy har en vy-fil, eller template-fil som heter `me/page.tpl.php`. Bara så att vi är med på konventionerna på namngivning.

För att göra en längre historia kort, det finns en ramverkstjänst som heter `$app->fileContent` som läser filer från disk. Genom att använda den kan jag läsa upp filen med innehållet och använda vyn för att presentera det.

**Route som visar innehåll från fil i vy.**

```php
$app->router->add('redovisning', function() use ($app) {

    $app->theme->setTitle("Redovisning");

    $content = $app->fileContent->get('redovisning.md');
    $byline  = $app->fileContent->get('byline.md');

    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);

});
```

Kika i `FactoryDefault` för att se hur tjänsten `$app->fileContent` initieras och se om det kanske finns en config-fil kopplad till tjänsten.

Nu har vi fått en bra separation mellan vyn och webbplatsens innehåll. Var sak på sin plats.



Skriv för webben med Markdown {#markdown}
------------------------------



###Ramverkstjänst för att formattera Markdown {#format-md}

Jag skrev min sida i Markdown-syntax. Det behöver formatteras till HTML-kod och för att göra det använder jag ramverkets tjänst `$app->textFilter`.

**Uppdaterad route som använder `$app->textFilter`.**

```php
$app->router->add('redovisning', function() use ($app) {

    $app->theme->setTitle("Redovisning");

    $content = $app->fileContent->get('redovisning.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');

    $byline = $app->fileContent->get('byline.md');
    $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);

});
```

Vill du kika mer i detalj på hur `$app->textFilter->doFilter()` fungerar? Börja kika i `DIFactoryDefault`, där hittar du tjänstens initiering, vilken klass som gäller. Kika vidare på klassen så ser du vilka möjligheter den ger och hur den är uppbyggd.

Det är lite så man kan ta sig an ett ramverk. Man hittar och letar tills man ser vilken del av koden som används. Det blir en del detektivarbete innan man får koll på läget. Men många ramverk har också utomordentlig dokumentation som underlättar. 



###Mer om Markdown {#om-md}

Markdown hjälper dig att skriva för webben, du kan fokusera på att skriva texten och behöver inte använda HTML-element för att strukturera eller styla texten. Markdown har de mest grundläggande konstruktionerna som underlättar skrivandet. 

Som ett exempel kan du se koden för innehållet `content/redovisning.md` och hur sidan ser ut när den visas i en webbläsare.

**Innehåll för `content/redovisning.md`.**

```text
Redovisning
====================================

Kmom01: XXX
------------------------------------

Fin redovisningstext om kursmoment 01.

Kmom02: XXX
------------------------------------

Fin redovisningstext om kursmoment 02.

Och så vidare...
```

Sidan ser ut så här i webbläsaren.

[FIGURE src=/image/snap/phpmvc-me-redovisning.png?w=w2&sa=jpg caption="Sidan redovisning skrivs i Markdown som formatteras om till HTML."]

Du kan läsa mer om [Markdown, och PHP Markdown](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php), det libb som `$app->textFilter` använder för konverteringen från Markdown till HTML.




CSource med namespace {#csource}
------------------------------

Som vanligt vill vi visa källkoden i vår me-sida. Vi kan använda klassen CSource till det som du kan ladda ned från GitHub.

```bash
git clone https://github.com/mosbth/csource
```

Men, var placerar vi koden så att den fungerar med vår autoloader som bygger på [PSR-4](http://www.php-fig.org/psr/psr-4/) och namespaces? *Hmmm...* 

Man kan ha olika taktiker för att integrera *äldre* klasser i sin nyare namespace-kodbas. Det kan också bero lite på hur koden är skriven.

Men, för att lösa CSource så gör jag om klassen till att befinna sig i namnrymden `\Mos\Source\CSource` så här.

1. Skapa katalogen `app/src/Source/`.
2. Kopiera `CSource.php` till katalogen.
3. Editera klassfilen och lägg följande rad överst i filen, innan klassdeklarationen.

```php
namespace Mos\Source;
```

Klart. Nu kan jag använde den i routen på [vanligt sätt](kunskap/visa-kallkod-med-source-php-och-csource).

**Route för att visa källkoden.**

```php
$app->router->add('source', function() use ($app) {

    $app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle("Källkod");

    $source = new \Mos\Source\CSource([
        'secure_dir' => '..', 
        'base_dir' => '..', 
        'add_ignore' => ['.htaccess'],
    ]);

    $app->views->add('me/source', [
        'content' => $source->View(),
    ]);

});
```

Jag lägger till en stylesheet och skapar objektet för att visa källkoden, sedan skickar jag resultatet till en vy `me/source` som jag skapat.

**Vy för att visa källkoden `app/view/me/source.tpl.php`.**

```html
<h1>Källkod</h1>

<?=$content?>
```

Enkelt och smidigt. Vill man ha ett annat upplägg så kan vyn ändras.

Så här kan sidan se ut när den fungerar.

[FIGURE src=/image/snap/phpmvc-me-source.png?w=w2&sa=jpg caption="Sidan som visar källkod fungerar."]

Nu börjar det bli klart.



Snyggare länkar {#urls}
------------------------------

När man tänker ramverk tänker man också snygga länkar och sökmotorvänliga länkar. Detta löser man med en konstruktion i filen `webroot/.htaccess`. Förutsättningarna är att ramverket kan hantera den typen av länkar.

För att hantera snygga länkar måste ramverket kunna hantera dem som inkommande länkar *och* kunna skapa nya länkar på önskat sätt, det är två aspekter på snygga länkar.

Vi börjar med att samla upp alla länkar och skickar dem till *en* frontcontroller.



###Alla frågor till en fil, frontcontrollern {#urls-htaccess}

Lägg till följande kodstycke i filen `webroot/.htaccess` och kopiera din frontcontroller `webroot/me.php` till `webroot/index.php`.

```text
<IfModule mod_rewrite.c>
  RewriteEngine on

  # Must use RewriteBase on www.student.bth.se, Rewritebase for url /~mos/test is /~mos/test/
  #RewriteBase /change/this/to/site/base/url/if/needed/

  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d

  RewriteRule (.*) index.php/$1 [NC,L]
</IfModule>
```

Stycket säger att -- skicka alla requester som inte pekar på en fil eller katalog direkt till filen `index.php` som är vår frontcontroller. Variabeln `$1` innehåller själva requesten, den delen som är att betrakta som routen.

Testa om det fungerar.

[INFO]
När du jobbar på studentservern måste du använda RewriteBase. RewriteBase för länken `http://www.student.bth.se/~mos/test/mod_rewrite` skall vara `/~mos/test/mod_rewrite`. 

[Se exempel](t/8).
[/INFO]



###Bestäm formatet på utgående länkar {#url-ut}

I ramverket skapas alla utgående länkar av tjänsten `$app->url`. Om du kikar i `CDIFactoryDefault` så initieras tjänsten på följande sätt.

```php
$this->setShared('url', function() {
    $url = new \Anax\Url\CUrl();
    $url->setSiteUrl($this->request->getSiteUrl());
    $url->setBaseUrl($this->request->getBaseUrl());
    $url->setScriptName($this->request->getScriptName());
    $url->setUrlType($url::URL_APPEND);
    return $url;
});
```

Det är det sista anropet vi är intresserade av, det som säger vilken typ av länkar som vi vill generera. Tittar vi i koden för klassen [`\Anax\Url\CUrl`](https://github.com/mosbth/Anax-MVC/blob/master/src/Url/CUrl.php) så ser vi att det finns två olika varianter av länkar.

```php
const URL_CLEAN  = 'clean';  // controller/action/param1/param2
const URL_APPEND = 'append'; // index.php/controller/action/param1/param2
```

För att ändra hur länkarna skapas så sätter vi alltså antingen `'clean'` eller `'append'`, genom att använda konstanterna i klassen. Vi kan göra detta genom att lägga till ett anrop till `setUrlType()` i vår frontcontroller. Lägg till anropet innan routerna hanteras.

```php
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);
```

Nu skall de vackra länkarna framträda nästa gång du laddar om sidan. Håll musen över länkarna så ser du.

Även om det är snyggare länkar nu så fungerar fortfarande det gamla länksättet. Det kan vara bra att veta om du behöver felsöka.



Gör din me-sida personlig {#personlig}
------------------------------

Nu har du din me-sida klar. Nu kan du göra den mer personlig genom att styla den via CSS-kod. Du kan också test att lägga till fler routes, kanske vill du lägga till något som du gjort tidigare? Ett tärningsspel eller en kalender eller något annat trevligt?



Avslutningsvis {#avslutning}
------------------------------

Du har nu grunderna i hur du använder ett ramverk som Anax MVC för att bygga din egen webbplats, testa och lek, undersök ramverket, dess möjligheter och dess uppbyggnad. Var nyfiken.

Fråga gärna i forumet, det finns en särskild [tråd för att bygga me-sidor med Anax-MVC](t/2199).



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2015-02-04 (E, mos) Formulering om var konfigurationen läses in.  
2015-01-19 (D, mos) Fel titel i CSource, "Redovsining" skulle vara "Källkod".  
2015-01-12 (C, mos) Felreferens till theme.php, skulle vara theme_my.php.  
2014-04-03 (B, mos) Vy `welcome/page` blir `me/page`, ändra $url::URL_CLEAN till \Anax\Url\CUrl::URL_CLEAN samt style till navbaren.  
2014-03-25 (A, mos) Första utgåvan som en del av kursen [phpmvc version 2](phpmvc-v2).  
</span>
