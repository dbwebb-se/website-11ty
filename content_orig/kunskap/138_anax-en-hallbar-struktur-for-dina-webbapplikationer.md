---
author: mos
category: webbprogrammering
updated: "2016-03-29 12:20:57"
created: "2013-06-11 14:53:37"
...
Anax - en hållbar struktur för dina webbapplikationer
==================================

När jag ligger vaken om nätterna funderar jag ofta på en optimal katalogstruktur för mina PHP-drivna webbplatser. 

Hur borde jag namnge mina kataloger och hur borde jag strukturera min kod så att den blir lätt att utveckla, enkel att underhålla och främjar återanvändning? Jag vill inte hamna i ett läge där jag bygger ett antal webbplatser till kunder och varje kund får sin egen struktur på webbplatsen och jag får svårt att återanvända kod som jag gjort till en viss kund. Så kan man inte ha det. Det låter inte smart alls. Jag behöver en struktur, en grundstruktur som går att leva med, som går att bygga ut och där jag kan återanvända lösningar mellan olika kunder. Det vill jag ha. En hållbar struktur för webbapplikationer.

<!--more-->

[FIGURE src=/img/snapshot/anax-hello.png caption="En sida i webbmallen Anax som artikeln handlar om."]

Så här kan det se ut i webbläsaren, men hur ser det ut bakom?



Vad vill jag uppnå? {#vision}
------------------------------

Låt mig först sätta lite ramar. Det är inget komplett MVC-ramverk jag vill ha. Jag vill ha en enkel struktur där webbplatsen består av olika PHP-filer som nås direkt. Jag vill inte ha en frontcontroller, krävs det så använder jag en mer avancerad struktur. Vad jag eftersträvar är en enkel och lättförståelig struktur med stöd för att återanvända kod. Fokuset är på att bygga enklare webbplatser eller webbtjänster och det bör finnas med de vanliga filerna som gör en god webbplats. Strukturen får gärna vara bra ur sökmotorperspektiv men det är inget krav. Däremot måste det vara säkert, så gott det går. Jag vill ha fokus på katalogstrukturen och strukturen på PHP-filerna. Jag vill bygga PHP-klasser som kan återanvändas. 

Det jag vill uppnå är en blandning av en [boilerplate](http://en.wikipedia.org/wiki/Boilerplate_code) och ett litet [ramverk](http://en.wikipedia.org/wiki/Web_application_framework) för att snabbt bygga små webbplatser och enkla webbapplikationer. Man skall inte behöva vara PHP-expert för att använda strukturen. Men det bör vara en gedigen struktur så att en PHP-expert känner att strukturen är fullgod. Det skall räcka med att använda vanlig PHP-kod i strukturen, det skall inte finnas några krav på att man måste använda ett stort mått av ramverkskod för att nyttja strukturen, då blir tröskeln för stor då det krävs större inlärningsansats till "ramverket".

Det skall inte finnas något grafiskt användargränssnitt, den som använder detta är händig i PHP-programmeringen och har inga problem att uppdatera konfigurationsfiler och hantera sökväger. Det är en struktur för en PHP-programmerare.



Ditt namn är -- Anax {#anax}
------------------------------

Jag har lite svårt att kategorisera det jag vill ha så jag ger det ett namn istället och sedan fyller jag namnet med innehåll. Namnet får bli *Anax*.

> *Anax -- high kings who exercise overlordship over other, presumably lesser, kings ([Wikipedia om Anax](http://en.wikipedia.org/wiki/Anax_%28Greek%29), en gud i den antika staden [Lydia](http://en.wikipedia.org/wiki/Lydia).).*

Så, Anax -- du mästare över webbplatser, vad skall ditt innehåll bli... låt oss börja från början.



Katalogstrukturen {#kataloger}
------------------------------

En hel del av ordningen och reda ligger i själva katalogstrukturen. Den bör vara självförklarande och inte för djup. Jag gillar inte djupa katalogstrukturer, det gör det svårare att navigera. Så tycker jag. 

```bash
Anax/
  └─ src/
  └─ theme/
  └─ webroot/
      └─ css/
      └─ img/
      └─ js/
```

Så, vad är då tanken bakom katalogstrukturen? Låt oss ta det katalog för katalog och vi börjar underifrån.



###`Anax/webroot/` {#webroot}

Detta är den del som måste finnas tillgänglig via webbserverns webbroot. Det är javascript-filer som behöver laddas ned, det är stylesheets för utseende och det är bilder.

Här läggs också alla webbsidor i form av en egen fil, till exempel `hello.php`. Så fort man vill ha en ny webbsida så skapar man bara en ny PHP-fil. En sådan här fil kallar jag sidkontroller i fortsättningen. Det är en PHP-fil med syfta att skapa en webbsida, en sidkontroller alltså.

Ibland är det svårt att få ihop länkningen till bilder, stylesheets och javascript. Men om man håller denna strukturen så kan man använda relativ sökväg då dessa resurser ligger i underkataloger direkt under webbsidan. Det blir enkelt att hantera och enkelheten är prioriterad.

Resten av Anax, det som inte ligger under webroot, kan i princip installeras var som helst på maskinen. Det behöver inte finnas tillgängligt via webbservern. Det kan vara viktigt med tanke på säkerhetsaspekter.



###`Anax/theme/` {#theme}

Jag vill separera kod som har olika syfte. Att separera kod för logik (PHP-kod) och innehåll (webbsidans innehåll i form av text) från kod som har med presentationen (utseende) att göra låter som en bra idé. Det som har med presentation och genereringen av HTML-sidan lägger jag i denna tema-katalog. Tanken är att sidkontrollern samlar allt innehåll, det som skall presenteras på webbsidan, i en PHP-array. När sidkontrollern är klar så lämnar den över till tema-delen, tema-motorn, som vet hur informationen i arrayen skall presenteras på webbsidan.

Ett tema handlar inte bara om en stylesheet, det behövs en HTML-struktur i form av det jag brukar kalla en template-fil och det kan behövas lite hjälp av PHP-funktioner som är temaspecifika.



###`Anax/src/` {#src}

Här lägger jag all kod som jag tänker återanvända. Det kan vara klasser för formulärhantering, databashantering, textfiltrering eller kanske en hel blogg-klass. Jag tänker mig att varje återanvändbar *modul* läggs i en egen underkatalog och alla filer och kod som hör till modulen hamnar i samma katalog. 

Koden behöver inte just vara klasser, men det är ett bra sätt att organisera sin kod, så det kommer nog att bli en hel del klasser. En modul är mitt begrepp för koden som ligger i en katalog. Det är kod som hör ihop och löser en uppgift. `CBlogg` kan vara en modul som löser en blogg, men koden som finns i modulen kan vara en samling av klasser och annan kod. 



Fyll katalogerna med innehåll {#filer}
------------------------------

Då behöver vi fylla på med innehåll i katalogstrukturen. Vilket är det innehåll som behövs för att den tänkta strukturen skall fungera? Låt oss utgå från själva webbsidan och jobba oss igenom den från första anropet tills resultatet visas upp i webbläsaren.



###`Anax/webroot/hello.php` {#hellophp}

Jag börjar med att skapa en webbsida via filen `hello.php`, en så kallad sidkontroller, eller "page controller". Det är alltså en webbsida, helt enkelt. Så fort jag säger sidkontroller så vet du att det är en fil som ligger i katalogen `Anax/webroot` med syfte att visa upp en webbsida.

Nu är den stora uppgiften att finna en bra struktur för sidan så att det blir enkelt att skapa nya sidor utan alltför mycket merarbete med varje sida. 

Jag vet att jag kommer att ha en konfigurationsfil, `config.php`, som skall innehålla inställningarna för Anax. Den filen måste jag *alltid* inkludera i varje sidkontroller och det gör jag överst.

Därefter kommer koden som gör det som skall göras, det vill säga att förbereda sidans innehåll och lagra undan i variabler för senare utskrift. 

I slutet av filen så skall själva webbsidan genereras och informationen i de olika variablerna skall skrivas ut. Det är här som sidkontrollern lämnar över till temahanteringen.

**En sidkontroller för `hello.php`.**

```php
<?php 
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential config-file which also creates the $anax variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Anax container.
$anax['title'] = "Hello World";

$anax['header'] = <<<EOD
<img class='sitelogo' src='img/anax.png' alt='Anax Logo'/>
<span class='sitetitle'>Anax webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$anax['main'] = <<<EOD
<h1>Hej Världen</h1>
<p>Detta är en exempelsida som visar hur Anax ser ut och fungerar.</p>
EOD;

$anax['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Mikael Roos (me@mikaelroos.se) | <a href='https://github.com/mosbth/Anax-base'>Anax på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;


// Finally, leave it all to the rendering phase of Anax.
include(ANAX_THEME_PATH);
```

Detta är alltså grundstrukturen på varje sida. Först inkluderas konfigurationsfilen och där skapas det viktiga `$anax` objektet. Därefter lägger jag till innehåll i variabeln `$anax` och avslutningsvis lämnas över till temahanteringen för att generera den resulterande HTML-sidan.

[FIGURE src=/img/snapshot/anax-hello.png caption="Så här kan sidan se ut när den visas upp i webbläsaren."]

Låt oss gå vidare och kika på konfigurationsfilen. 



###`Anax/webroot/config.php` {#configphp}

Till varje webbapplikation finns det saker som skall konfigureras, det kan vara sökvägar eller detaljer för att logga in på en databas. Denna fil behöver vara tillgänglig för alla webbsidor (sidkontroller) och måste därför ligga på en känd plats. Konfigurationsfilen inkluderas överst i alla sidkontroller och det blir smidigt att ha den på samma katalognivå, det vill säga i webbrooten.

Vad är då det viktiga som behövs i konfigurationsfilen? Det kan vara hur felrapporteringen skall visas, det kan vara konstanter, inloggning till databas, startande av sessionen och inkludering av nödvändiga funktioner. Så här kan det se ut.

**Grunden till `config.php`.**

```php
<?php
/**
 * Config-file for Anax. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Define Anax paths.
 *
 */
define('ANAX_INSTALL_PATH', __DIR__ . '/..');
define('ANAX_THEME_PATH', ANAX_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(ANAX_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();


/**
 * Create the Anax variable.
 *
 */
$anax = array();


/**
 * Site wide settings.
 *
 */
$anax['lang']         = 'sv';
$anax['title_append'] = ' | Anax en webbtemplate';
```

Detta får utgöra grunden till konfigurationsfilen. Det handlar om att definiera det mest centrala för varje sidkontroller, det som verkligen behövs och det som man inte vill upprepa i andra sidkontroller.



###`Anax/src/bootstrap.php` {#bootstrapphp}

I konfigurationsfilen anropas en fil `bootstrap.php`. Tanken är att den filen innehåller de funktioner som är nödvändiga för att en sidkontroller skall fungera. I mitt fall väljer jag att lägga in en funktion som autoladdar mina klasserfiler, en så kallad ["autoloader"](http://php.net/manual/en/language.oop5.autoload.php). Jag tänker använda exceptions för felhantering så jag lägger också in en funktion som fungerar som uppsamlare för de exceptions som inte fångats.

**Grunden till `bootstrap.php`.**

```php
<?php
/**
 * Bootstrapping functions, essential and needed for Anax to work together with some common helpers. 
 *
 */

/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception) {
  echo "Anax: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');


/**
 * Autoloader for classes.
 *
 */
function myAutoloader($class) {
  $path = ANAX_INSTALL_PATH . "/src/{$class}/{$class}.php";
  if(is_file($path)) {
    include($path);
  }
  else {
    throw new Exception("Classfile '{$class}' does not exists.");
  }
}
spl_autoload_register('myAutoloader');
```

Det var alltså grunderna till `bootstrap.php`. Det är de funktioner som utgör grunden för varje sidanrop och de är nödvändiga för att resten av "ramverket" skall fungera. 



Tema och tema-relaterade filer {#temafiler}
-----------------------------------------------

När en sidkontroller är klar så finns allt innehåll som skall skrivas ut till den resulterande webbsidan i en array. Det är nu som temahanteringen tar vid och hanterar innehållet som skall *renderas*, skrivas ut, inom ramen av temat. Temat består av följande filer.

* `Anax/theme/render.php`
* `Anax/theme/index.tpl.php`
* `Anax/theme/functions.php`
* `Anax/webroot/css/style.css`

Låt oss nu se hur dessa filer ser ut och vad de gör.



###`Anax/theme/render.php` {#renderphp}

Detta är hjärnan i temahanteringen, det är det kodbiten som tar hand om arrayen med innehållet och gör om den till variabler så det blir enkelt för template-filen att skriva ut innehållet. Därefter inkluderas funktionerna och därefter template-filen som skriver ut variablernas på rätt plats i den resulterande HTML-sidan.

**Innehållet i `render.php`.**

```php
<?php
/**
 * Render content to theme.
 *
 */

// Extract the data array to variables for easier access in the template files.
extract($anax);

// Include the template functions.
include(__DIR__ . '/functions.php');

// Include the template file.
include(__DIR__ . '/index.tpl.php');
```

Enkelt och kraftfullt. Men, det är så lite kod, kunde man inte lagt det någon annanstans? Jo, visst kan man det. Men det handlar om vilken struktur man vill ha och att man vill försöka lägga relaterad kod på en plats där den hör hemma. Vad är det som säger var koden hör hemma? Det är kodarens uppfattning om vad som skall göras och hur det bäst organiseras för att kunna underhållas och vidareutvecklas. Det är en känsla som bygger på kunskap och erfarenhet av bäst lämpade lösningar. Någonstans i mitt bakhuvud finns en tanke om att bygga ut temahanteringen och då känner jag att denna strukturen blir bra att utgå ifrån.



###`Anax/theme/index.tpl.php` {#indextplphp}

Detta är template-filen, en mall till hur webbsidan ser ut. Det är en mix av HTML-kod och PHP-taggar som används för att skriva ut innehållet från de variabler som sidkontrollern har definierat.

**Template till en HTML5-sida.**

```html
<!doctype html>
<html lang='<?=$lang?>'>
<head>
<meta charset='utf-8'/>
<title><?=get_title($title)?></title>
<?php if(isset($favicon)): ?><link rel='shortcut icon' href='<?=$favicon?>'/><?php endif; ?>
<link rel='stylesheet' type='text/css' href='<?=$stylesheet?>'/>
</head>
<body>
  <div id='wrapper'>
    <div id='header'><?=$header?></div>
    <div id='main'><?=$main?></div>
    <div id='footer'><?=$footer?></div>
  </div>
</body>
</html>
```

Här använder jag helst PHP shorttags (`<?= ?>`) för att det blir mindre kod och ger en mer läsbar template-sida. I mina template-filer vill jag att koden skall vara läsbar som främst HTML. 



###`Anax/theme/functions.php` {#functionsphp}

Jag vill ha minimalt med PHP-kod i en template-fil. Det kan vara utskrifter av variabler, if-satser och loopar. Men blir det mer PHP-kod så lägger jag hellre den koden i sidkontroller eller i en tema-relaterad fil med funktioner, `functions.php`. Denna filen är tänkt att enbart innehålla template-funktioner, det vill säga funktioner som bara är tänkta att använda i en template-fil.

**Ett exempel på en `functions.php` med en funktion `get_title()`.**

```php
<?php
/**
 * Theme related functions. 
 *
 */

/**
 * Get title for the webpage by concatenating page specific title with site-wide title.
 *
 * @param string $title for this page.
 * @return string/null wether the favicon is defined or not.
 */
function get_title($title) {
  global $anax;
  return $title . (isset($anax['title_append']) ? $anax['title_append'] : null);
}
```

Funktionen `get_title()` hjälper mig att sätta en bra titel på webbsidan. Ofta vill man kombinera titeln där en del är sidspecifik och en del är samma för hela webbplatsn. Det är ett vanligt sätt att definera en sidas titel på. Här har jag lagt till `title_append` som en inställning i `$anax` som ligger i `config.php`. På det viset har jag central plats för viktiga konfigurationsdetaljer som spänner över hela webbplatsen.



###`Anax/webroot/css/style.css` {#stylecss}

Ett tema måste ha en style, en fil med CSS-konstruktioner. Style-filen måste ligga i webbrooten så även om den egentligen är en del av temat så kan den inte ligga i tema-katalogen utan det är bättre och smidigare att ha den i en egen katalog direkt under webbroten. Så här kan en exempel style se ut för Anax.

**Stylesheet `style.css` för Anax.**

```css
/**
 * General elements
 */
body {
  color: #333;
  font-family: arial, sans-serif;
}

/**
 * Layout of the main page elements 
 */
#wrapper {
  margin: 0 auto;
  width: 980px; 
  padding: 10px;
}


/**
 * Layout for header
 */
#header {
  position: relative;
  margin-bottom: 40px;
}

.sitetitle {
  position: absolute;
  top: 6px;
  left: 130px;
  font-size: 48px;
}

.siteslogan {
  position: absolute;
  top: 65px;
  left: 130px;
  font-style: italic;
  color: #666;
}


/**
 * Layout for main
 */
#main {
  min-height: 20em;
}


/**
 * Layout for footer
 */
#footer {
  margin-top: 40px;
  border-top: 1px solid #ccc;
  padding-top: 15px;
}

.sitefooter {
  color: #666;
}
```

Stylesheeten inkluderas i webbsidan via template-sidan `index.tpl.php`.



###Inställningar för temat görs i `config.php` {#temaconfig}

För att temat skall fungera så måste variabeln `$stylesheet` innehålla sökvägen till stylesheeten. Det är samma sökväg som gäller för alla sidor på webbplatsen så i konfigurationsfilen `config.php` känns som ett bra ställa att definiera sökvägen till stylesheeten. Om jag vill ha en favicon så måste sökvägen till bilden ligga i variabeln `$favicon`. Så här kan det se ut i konfigurationsfilen när jag definierar dessa sökvägar.

**Ändring i `config.php` för att sätta sökvägen till stylesheeten.**

```php
/**
 * Theme related settings.
 *
 */
$anax['stylesheet'] = 'css/style.css';
$anax['favicon']    = 'favicon.ico';
```

Alla sökvägar är relativa per katalogen webbroot. 



Bra att ha filer vid webbutveckling {#braattha}
-----------------------------------------------

I Anax tänkte jag lägga in de vanliga bra-att-ha filerna som vanligen finns med i en webbplats. Här följer de som jag valt att ta med.



###`Anax/webroot/favicon.ico` {#faviconico}

En favicon är den bilden som visas i webbläsaren som en ikon för webbplatsen. För att faviconen skall visas så måste den antingen ligga överst i webbplatsens katalogstruktur eller så måste sökvägen anges i HTML-sidans header.

**Ange sökvägen till `favicon.ico`.**

```html
<link rel='shortcut icon' href='favicon.ico'/>
```

[Filformatet ico](https://en.wikipedia.org/wiki/ICO_(file_format)) är ett särskilt filformat som kan innehålla en eller flera varianter av samma bild. Du kan även använda en png-bild till favicon men om du använder ico-formatet så kommer det att [fungera bättre i Windows och Internet Explorer](forum/viewtopic.php?f=9&t=687). 

[FIGURE src=/kod-exempel/anax-base/webroot/favicon.ico caption="Faviconen till Anax som ico-fil."]



###`Anax/webroot/.htaccess` {#htaccess}

I filen `.htaccess` kan du skriva direktiv till webbservern Apache. Det kan vara omdirigeringar eller regler för vilka filtyper som kan visas på webbplatsen. Apache måste vara konfigurerad för att tillåta att användaren skriver direktiv i `.htaccess`. Så är ofta fallet men när det inte är tillåtet så slutar det med ett fel "500 Server error".

För att undvika problem så innehåller Anax en enkel version av `.htaccess`. Så här ser den ut.

**En enkel `.htaccess` med en anpassad sida för felkod 404.**

```bash
# http://httpd.apache.org/docs/current/mod/core.html#errordocument
ErrorDocument 404 "This is a Anax 404. Document is not here."
```

Ett bra ställe att börja lära sig mer om htaccess är via Apaches webbplats och [dokumentationen om htaccess](http://httpd.apache.org/docs/current/howto/htaccess.html).

[FIGURE src=/img/snapshot/Anax-404.png caption="Så här ser ett anpassat 404-felmeddelande ut för Anax."]


Vill du göra en helt anpassad 404-sida så kan du utgå från Anax och skapa en ny sida, `404.php`. Så här skulle den kunna se ut.

**En anpassad `404.php`-sida.**

```php
<?php 
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential config-file which also creates the $anax variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Anax container.
$anax['title'] = "404";
$anax['header'] = "";
$anax['main'] = "This is a Anax 404. Document is not here.";
$anax['footer'] = "";

// Send the 404 header 
header("HTTP/1.0 404 Not Found");


// Finally, leave it all to the rendering phase of Anax.
include(ANAX_THEME_PATH);
```

Det finns mycket man kan göra med en `.htaccess`-fil så det är bra att lära sig grunderna om hur den fungerar.



###`Anax/webroot/sitemap.xml` {#sitemapxml}

En sitemap är en lista över de länkar som en webbplats innehåller. Det är för att underlätta för sökmotorer som spindlar webbplatsen. Sökspindeln vet om att det kan finnas en sitemap och kan leta efter den som ett komplement till att försöka spindla webbsidorna. Formatet på sitemap-filen är ett xml-format.

**Exempel på en `sitemap.xml`.**

```html
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>http://www.example.com/</loc>
    <lastmod>2005-01-01</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
</urlset> 
```

Du kan läsa mer om sitemaps på webbplatsen [sitemaps.org](http://www.sitemaps.org/). 

Den filen som ligger med i Anax måste editeras och du måste skriva in rätt `<loc>` till webbplatsen, glöm inte det. Egentligen hade det kanske varit bättre att exkludera sitemapen i Anax men jag ville ha med den som ett exempel. Sitemapen är en viktig fil att använda när man vill att sökmotorerna Google och Bing skall indexera webbplats.



###`Anax/webroot/robots.txt` {#robotstxt}

I filen `robots.txt` kan du spärra viss trafik till din webbplats och du kan skydda vissa delar av webbplatsen så att de inte dyker upp i en sökmotors resultat. Eller nåja, du kan berätta för de sökmotorer som besöker din webbplats hur de skall behandla den, du ger dem rådgivande information så de kan välja att inte följa den. Det är alltså inget säkert sätt att skydda innehåll. Men de spindlar, robotar, som är korrekta kommer att följa dina råd. Mot elaka spindlar hjälper det dock inte.

**Exempel på `robots.txt` som hindrar alla robotar.**

```bash
# http://robotstxt.org/

User-agent: *
Disallow: /
```

Läs mer om hur [spindlarna använder sig av filen](http://www.robotstxt.org/robotstxt.html) `robots.txt` och besök webbplatsen för [robotstxt.org](http://www.robotstxt.org/) för att lära dig mer.



###`Anax/webroot/humans.txt` {#humanstxt}

I denna fil kan du presentera information om vem som gjort webbplatsen och vilka tekniker som användes. Det är som en signatur över de som skapat webbplatsen. Filen har ingen direkt syntax utan tanken är bara att den skall läsas som en textfil av en människa.

**Exempel på text i `humans.txt`.**

> *Anax is a PHP-boilerplate/framework for small websites. Anax was built by Mikael Roos (me@mikaelroos.se) as part of teaching web programming and published in june 2013 as an article at http://dbwebb.se/kunskap (swedish). It was also published at GitHub: https://github.com/mosbth/Anax-base.*

Du kan läsa mer om tankarna med filen på [webbplatsen för humans.txt](http://humanstxt.org/) och se exempel på hur de föreslår att filen kan struktureras. 

Nu när du vet om att filen finns, gå till någon av de webbplatser du ofta besöker och se om de har en `humans.txt`.



###`Anax/README.md` {#readmemd}

All projekt bör ha en readme-fil som berättar om projektet och hur man kommer igång och använder det. Jag tänkte publicera detta projektet på GitHub och där skrivs readme-filen i Markdown-syntax för att få bättre formattering av texten. Med markdown kan du skriva som en vanlig textfil men om det stöds så kan formatteringen visas upp på ett HTML-liknande sätt. 

Innehållet i README-filen får bli det som behövs för att komma igång med Anax, det blir den dokumentation som kommer finnas tillsammans med koden och kommentarerna. I längden kan jag tänka mig att det vore bra att lägga en `README.md` i varje katalog om det behövs. Det är ju ett smidigt sätt att dokumentera sin programvara och berätta för de som skall använda den hur det är tänkt och ge dem ett par exempel.

**En `README.md` för Anax.**

```html
Anax-base
==================

A boilerplate for smaller websites or webbapplications using PHP.

Built by Mikael Roos

License 
------------------

This software is free software and carries a MIT license.


------------------
 .
..:

Copyright (c) 2013 Mikael Roos

```

GitHub har en egen variant av Markdown och det är bra att [läsa på hur den fungerar](https://help.github.com/articles/github-flavored-markdown). Mannen bakom Markdown heter John Gruber och du kan läsa om [grundsyntaxen för Markdown](http://daringfireball.net/projects/markdown/) på hans webbplats.



###`Anax/LICENSE.txt` {#licensetxt}

Ett projekt måste ha en licens och licensen för Anax får bli enligt [MIT](http://opensource.org/licenses/MIT). Det är en trevlig licens för öppen källkod utan några större restriktioner på användandet av programvaran.

**Licensen MIT.**

```bash
The MIT License (MIT)

Copyright (c) 2013 Mikael Roos (me@mikaelroos.se)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
```

Vill du läsa mer om olika varianter på licenser för öppen källkod så är [Open Source Initiative (OSI)](http://opensource.org/) en bra plats att starta på. De har även en definition på öppen källkod, [Open Source Definition (OSD)](http://opensource.org/docs/osd) vilket kan vara bra att läsa igenom.



###`Anax/.gitignore` {#gitignore}

Filen `.gitignore` innehåller direktiv till vilka filer som kan ignoreras av versionshanteringssystemet Git. Jag lägger dit ett par direktiv för att ignorera databasfiler med SQLite och filer som slutar på filändelsen `.log`. Dessutom lägger jag dit ett antal filer som brukar genereras av operativsystemet.

**Ett exempel på `.gitignore`.**

```bash
# Logs and databases #
######################
*.sqlite
*.log

# OS generated files #
######################
.DS_Store
.DS_Store?
._*
.Spotlight-V100
.Trashes
Icon?
ehthumbs.db
Thumbs.db
```

Du kan läsa mer om filen på [GitHub](https://help.github.com/articles/ignoring-files) eller i manualen om [Git](http://git-scm.com/docs/gitignore).



Anax med JavaScript {#javascript}
------------------------------

JavaScript används på fler än [hälften av alla webbplatser](blogg/vilka-ar-de-mest-populara-teknikerna-pa-webbplatser) så det är lika bra att förbereda Anax på javascript på en gång. När det gäller javascript så är det viktigt var skripten inkluderas, så det är bäst att ha en tanke med strukturen. Följande delar tänker jag plocka med i Anax.

1. Modernizr
2. jQuery
3. Egna filer med JavaScript
4. Stöd för Google Analytics

Låt se hur vi gör detta.


###Modernizr {#modernizr}

[Modernizr](http://modernizr.com/) är ett javascript-bibliotek för "feature-detection". Med det kan man testa om webbläsaren stödjer en viss feature och om inte så kan man ladda en så kallad polyfill, en kodsnutt som löser featuren. Man bygger själv sin distribution för Modernizr och jag plockar endast med det som jag behöver. [Så här såg det ut](http://modernizr.com/download/#-shiv-mq-cssclasses-teststyles-load) när jag byggde min variant.

Jag väljer att inkludera skriptet precis innan slutet av `</head>`. Skriptet innehåller stöd så att äldre IE-läsare klarar av HTML5 samt en test om webbläsaren har javascript påslaget. Dessa tester måste ske i `<head>`.

**Inkludera `modernizr.js` i `index.tpl.php`.**

```html
<!doctype html>
<html class='no-js'> <!-- Modernizr will replace the class 'no-js' with a list of features supported by the browser -->
<head>
<!-- Here is the rest of the <head> code -->
<script src='<?=$modernizr?>'></script>
</head>
```

För att göra det enkelt att ändra så lägger jag till sökvägen till Modernizr i `config.php`.

**Sökväg till `modernizr.js` i `config.php`.**

```php
/**
 * Settings for JavaScript.
 *
 */
$anax['modernizr'] = 'js/modernizr.js';
```

Så där, då var Modernizr inkluderat. Det går att testa att det fungerar genom att öppna en sida och titta på den i Firebug. Innehållet i klass-attributet i elementet `<html>` skall ha ändrat sig från `no-js` till `js` om webbläsaren stödjer javascript.

[FIGURE src=/img/snapshot/anax-modernizr-fungerar.png caption="Så här ser det ut när Modernizr har laddats och testat att webbläsaren klarar JavaScript."]



###jQuery {#jquery}

JavaScript-biblioteket jQuery är ett av de mest använda biblioteken för JavaScript. Det finns i många version och de finns "hostade" på webbtjänster som gör att skripten kan cachas i webbläsaren på ett smidigare sätt än om varje webbplats hade sin egen version. Jag gör en konfigurations-inställning så att jQuery inkluderas från [Googles CDN](https://developers.google.com/speed/libraries/devguide#jquery).

**Inställning för jQuery i `config.php`.**

```php
/**
 * Settings for JavaScript.
 *
 */
$anax['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$anax['jquery'] = null; // To disable jQuery
```

Längst ned i template-filen väljer jag att inkludera jquery.

**Inkludera jQuery i template-filen.**

```html
<?php if(isset($jquery)):?><script src='<?=$jquery?>'></script><?php endif; ?>
</body>
</html>
```

Vill man inte inkludera jQuery så kan man sätta den till `null` i konfigurationsfilen. 



###Egna filer med JavaScript {#egna-js}

Har du egna filer med JavaScript eller kanske externa moduler som kräver att javascript inkluderas? Isåfall är det vanligen bäst att inkludera dem längst ned i sidan. Då påverkar de inte tiden som det tar att visa sidan för användaren och användaren ser sidan snabbare.

Har du många filer så är det ofta bättre att inkludera all kod i en fil, men går det inte så vill du kunna ladda in flera filer. För att göra det möjligt så lägger jag till en array för egna javascript-filer. För varje ny javascript-fil som skall inkluderas så lägger man till den i arrayen.

**En array för egna javascript-filer.**

```php
/**
 * Settings for JavaScript.
 *
 */
$anax['javascript_include'] = array();
//$anax['javascript_include'] = array('js/main.js'); // To add extra javascript files
```

Säg att jag nu vill lägga till en javascript-fil som heter `js/main.js`. Då gör jag antingen det direkt i `config.php` eller i en sidkontroller. Så här ser det ut när jag gör det i en sidkontroller.

**Lägg till en javascript-fil för inkludering i sidkontroller.**

```php
// Add js/main.js for inklusion
$anax['javascript_include'][] = 'js/main.js';
$anax['javascript_include'][] = 'js/other.js';
```

Själva skripten inkluderas längst ned i template-sidan. Via en loop så inkluderas varje skript för sig.

**JavaScript-filerna inkluderas i slutet av `index.tpl.php`.**

```html
<?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
<script src='<?=$val?>'></script>
<?php endforeach; endif; ?>

</body>
</html>
```

Så, då finns det stöd i Anax för att hantera JavaScript. Bra.



###Google Analytics snippet {#ga-snippet}

Ett vanligt skript som ofta inkluderas i webbsidor är en kodsnutt som hjälper till att logga besökare på en webbplats. En sådan teknik är att använda en "snippet" för [Google Analytics](http://www.google.com/analytics/) och den brukar alltid inkluderas i slutet av webbsidan för att inte påverka laddningshastigheten. För att använda en sådan här loggningsmetod så krävs att man har en nyckel som är specifik för webbplatsen som man vill mäta på. Denna nyckel låter jag användaren sätta i `config.php`.

**Sätt nyckeln för GA i `config.php`.**

```php
/**
 * Google analytics.
 *
 */
$anax['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics
```

Längst ned i template-sidan så inkluderas kodsnutten för Google Analytics.

**Google Analytics i `index.tpl.php`.**

```html
<?php if(isset($google_analytics)): ?>
<script>
  var _gaq=[['_setAccount','<?=$google_analytics?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

</body>
</html>
```

Så, då var Anax även förberedd för att logga trafiken via Google Analytics.



###Sammanfattningsvis {#js-sammanfattning}

Så, för att summera, Modernizr inkluderas överst i sidan medans resten av skripten inkluderas i slutet av sidan. När vi är klara så ser slutet av template-filen ut som följer.

**Allt utom Modernizer inkluderas i slutet av template-filen.**

```html
<?php if(isset($jquery)):?><script src='<?=$jquery?>'></script><?php endif; ?>

<?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
<script src='<?=$val?>'></script>
<?php endforeach; endif; ?>

<?php if(isset($google_analytics)): ?>
<script>
  var _gaq=[['_setAccount','<?=$google_analytics?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

</body>
</html>
```

Konfigurationsfilen `config.php` är nu uppdaterad med alla inställningar som är relaterade till javascript-filer.

**Javascript nu i `config.php`.**

```php
/**
 * Settings for JavaScript.
 *
 */
$anax['modernizr'] = 'js/modernizr.js';
$anax['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$anax['jquery'] = null; // To disable jQuery
$anax['javascript_include'] = array();
//$anax['javascript_include'] = array('js/main.js'); // To add extra javascript files

/**
 * Google analytics.
 *
 */
$anax['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics
```

Då ska vi bara testa att det fungerar också.



###Testa JavaScript {#testa-js}

För att testa javascript-strukturen så bygger jag en sidkontroller som gör ett bildspel med javascript. Bildspelet består av bilder, en fil med javascript, html-kod och en stylesheet samt kräver jQuery. Det är en vanlig uppsättning av kod som återkommer när man jobbar med JavaScript-plugins. Jag gör en ny sidkontroller, `slideshow.php`, för att testa att det fungerar som tänkt.

Det börjar bli många filer som inkluderas i webbsidan nu. Ibland märker man inte när någon saknas. Använd Firebug flitigt, eller motsvarande verktyg, för att kontrollera att sidans alla resurser laddas som de ska.

[FIGURE src=/img/snapshot/anax-firebug-net.png caption="Firebug visar att alla delar av sidan laddas som de ska."]

En sak som jag märkte när jag testade med denna javascript-plugin var behovet av att inkludera flera stylesheets. För att göra det smidigt så gjorde jag en array av stylesheets istället för som det var tidigare med endast en stylesheet. Jag ändrade följande saker.

**Ändra i `config.php` så att stylesheet blir stylesheets.**

```php
/**
 * Theme related settings.
 *
 */
//$anax['stylesheet'] = 'css/style.css';
$anax['stylesheets'] = array('css/style.css');
```

**Skriv ut alla stylesheets i `$anax['stylesheets']` i `index.tpl.php`.**

```php
<?php foreach($stylesheets as $val): ?>
<link rel='stylesheet' type='text/css' href='<?=$val?>'/>
<?php endforeach; ?>
```

Den här typen av ändringar får man vara beredd på när man jobbar med ramverk likt Anax är. Man behöver underhålla och vidareutveckla själva ramverket, webbmallen, för att det skall vara smidigt att använda och återanvända. Ibland får man en känsla av att man utvecklar ramverket mer än själva webbplatserna. Så kan det vara och då får man vara uppmärksam på sina prioriteringar, är det ett ramverk som skall utvecklas eller en webbplats som skall sjösättas. Ramverket skall hjälpa, inte stjälpa.

Hur som helst så blev bildspelet klart och så här ser sidan ut.

[FIGURE src=/img/snapshot/anax-bildspel-for-att-testa-javascript.png caption="Bildspel för att testa att javascript fungerar i Anax som det är tänkt."]

[Du kan testa bildspelet här](kod-exempel/anax-base/webroot/slideshow.php) och visst fungerar det som tänkt. Nu finns det stöd för javascript i Anax. Bra.



En modul i Anax {#modul}
------------------------------

Vi börjar bli färdiga, men än så länge finns det ingen modul i `src`-katalogen. Låt oss bygga en enkel modul för att visa hur det är tänkt. Det handlar alltså om klasser som kan återanvändas och som laddas med via autoloadern som ligger i `bootstrap.php`. För att visa så gör jag en klass för en tärning, `CDice.php`, och en sidkontroller, `dice.php`, som använder klassen.

Så här blev det.

[FIGURE src=/img/snapshot/anax-kasta-tarning.png caption="En sidkontroller som visar hur en återanvändbar modul för tärningar fungerar i Anax."]

[Du kan testa tärningarna här](kod-exempel/anax-base/webroot/dice.php) och visst fungerar det som tänkt. Nu finns det stöd för moduler i Anax. Mycket bra.

Vi är klara.



Anax på GitHub {#github}
------------------------------

Jag skapade ett projekt [*Anax-base* på GitHub](https://github.com/mosbth/Anax-base) och lade upp Anax som det ser ut i denna artikeln så att du kan se hur det blev för mig.

Vill du testa så kan du antingen [ladda ned en zip-fil](https://github.com/mosbth/Anax-base/archive/master.zip) från GitHub, eller så klonar du projektet. Vill du lära dig hur Git och GitHub fungerar så läser du guiden ["Kom i gång med Git och GitHub"](kunskap/kom-igang-med-git-och-github).

Så här klonar du projektet.

```bash
git clone git://github.com/mosbth/Anax-base.git
```

Sedan är det bara att peka din webbläsare på filen `Anax/webroot/hello.php` och sen är du igång.



Summering {#summering}
------------------------------

Det var då Anax, ett försök till att skapa en hållbar struktur för att bygga webbplatser och underlätta återanvändning av kod. Nu behöver vi jobba med det för att se om det fungerar så bra som det är tänkt. 

Tankarna kring Anax bygger främst på erfarenheter från kända system som WordPress, Drupal, CodeIgniter och HTML5Boilerplate. Eftersom jag har ett mer avancerat ramverk i form av Lydia så får Anax bli den enklare varianten. Förhoppningsvis kommer du att känna igen vissa delar av Anax när du bekantar dig med mer avancerade ramverk. Det är tanken. Att hjälpa dig att utveckla ditt PHP-kodande och tänkande kring strukturen av en webbapplikation. Olika ramverk har olika strukturer men det finns gemensamma nämnare och har man lärt sig en struktur så går det snabbt att förstå en annan variant på struktur.

Om du har frågor, funderingar eller vill tycka till om Anax så finns det en [forumtråd där vi diskuterar denna artikel om Anax](t/1353).



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2016-03-29 (E, mos) Länk till autoloader i phpmanualen.  
2013-11-22 (D, mos) Ändrade hur sessionens namn gavs, nu hanteras även siffror.  
2013-09-23 (C, mos) Ändring, definiera variabler innan inkludera bootstrap.php, v1.0.2.  
2013-09-19 (B, mos) Ändring, inkludera bootstrap.php innan sessionen startas, i config.php, v1.0.1.  
2013-06-28 (A, mos) Första utgåvan.  
</span>
