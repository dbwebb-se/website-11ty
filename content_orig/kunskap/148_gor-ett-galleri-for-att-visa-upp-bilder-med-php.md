---
author: mos
category: php
revision:
  "2015-05-08": (D, mos) Fungerar på Windows genom att använda realpath på sökvägar.
  "2014-05-27": (C, mos) Fixade så att exemplet länkar utan backslash på windows.
  "2013-11-18": (B, mos) Fixade så att exemplet fungerar på Windows med DIRECTORY_SEPARATOR.
  "2013-10-15": (A, mos) Första utgåvan i samband med oophp-kursen.
updated: "2015-05-08 13:13:39"
created: "2013-10-08 07:05:29"
...
Gör ett galleri för att visa upp bilder med PHP
==================================

Vi skall göra ett enkelt galleri med PHP, `gallery.php`. Galleriet utgår från att dina bilder ligger lagrade i en katalogstruktur i din webbkatalog. Det blir ingen uppladdning av bilder utan handlar mer om ett enkelt sätt att skapa ett galleri på webbplatsen med ett PHP skript som söker igenom dina kataloger efter bilder. När det är klart kan du navigera bland katalogerna och visa upp bilderna, både som en översikt och som en och en.

Du får grunden som du kan bygga vidare på för att skapa ett mer avancerat galleri.

<!--more-->

[FIGURE src=/image/snapshot/gallery-start.jpg?w=w2 caption="Så här kan det se ut när du är klar. Startsidan för galleriet som innehåller både bilder och kataloger."]



Innan vi startar {#innan}
---------------------------------

Detta exempel använder sig av skriptet `img.php` som hjälper dig att beskära bilder på serversidan med PHP GD. Du kan läs mer om `img.php` i antingen ["Skapa egen kod för att beskära och förminska bilder med PHP GD"](kunskap/skapa-egen-kod-for-att-beskara-och-forminska-bilder-med-php-gd) eller i ["CImage and img.php for image resize, crop and processing using PHP GD"](opensource/cimage).

Själva [exempelkoden och exemplet hittar du här](kod-exempel/skapa-ett-galleri-av-dina-bilder-med-php/gallery.php). Exempelkoden bygger på Anax som du kan läsa om i artikeln ["Anax - en hållbar struktur för dina webbapplikationer"](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).



Ett enkelt galleri {#enkelt}
---------------------------------

Tanken är att göra ett enkelt galleri, ett skript som hjälper mig att titta runt i en katalogstruktur som innehåller bilder. 

Det blir *inte* en lösning med databas eller en lösning där katalogstrukturen skannas och lagras undan i en eller flera filer. Ett sådant förfarande är annars normalt när man bygger ett galleri. Det finns flera fördelar med att lagra undan galleriets struktur och innehåll i en datastruktur som är snabb att ladda och enkel att söka i.

Jag vill bara ha ett skript som kan visa mig bilderna, jag behöver inte söka, skriva in och lagra extra information om bilderna, jag har heller inga direkta krav på prestanda eller behov av flexibilitet att visa bilderna på olika sätt.

Så, det sagt så sätter vi igång, ett `gallery.php`, är målet.



En struktur för skriptet {#struktur}
---------------------------------

Om du är van vid [Anax](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer) så vet du numer hur vi bygger upp strukturen i en sidkontroller. Låt oss kika på strukturen för `gallery.php`.



###Grundstrukturen {#grund}

**Strukturen för `gallery.php`.**

```php
// Include the essential config-file which also creates the $anax variable with its defaults.

// Declare functions only used for this page controller

// Define the basedir for the gallery

// Get incoming parameters

// Validate incoming arguments

// Read and present images in the current directory

// Prepare content and store it all in variables in the Anax container.

// Finally, leave it all to the rendering phase of Anax.
```

Så ser grundstrukturen ut. Låt oss fylla på med lite mer specifika saker för galleriet.



###Konstanter {#konst}

Det första vi behöver göra är att definiera ett par bra-att-ha konstanter. De vi behöver är för att säga var katalogen ligger, den katalog vi skall betrakta som galleriet. Dessutom lägger jag till en BASEURL som är bra då bilderna i galleriet ligger i en underkatalog. 

**Sätt konstanter för galleriet.**

```php
// Define the basedir for the gallery
define('GALLERY_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'img');
define('GALLERY_BASEURL', '');
```

Jag tänker mig att galleriets bilder ligger i `img/`-katalogen i webbrooten. Vill man att bilderna skall ligga i `img/gallery/` så kan man definiera `GALLERY_BASEURL` till `gallery/`. 



###Inkommande parametrar {#inkom}

Det är endast en parameter som behövs, `path` som säger nuvarande katalog eller bild som skall visas i galleriet. När man flyttar runt i galleriet så är det `path` som ändras.

**Ta hand om inkommande parametrar.**

```php
// Get incoming parameters
$path = isset($_GET['path']) ? $_GET['path'] : null;
$pathComplete = GALLERY_PATH . DIRECTORY_SEPARATOR . $path;

$pathToGallery = realpath($pathComplete);
$basePath      = realpath(GALLERY_PATH);
```

Parametern `path` används för att ta reda på var filerna ligger på disk. Innan vi kan göra något behöver vi kontrollera att ingen försöker navigera utanför galleriet.



###Validera inkommande argument {#vali}

Det viktigaste är att validera den resulterande sökvägen. Jag väljer att kontrollera att den verkliga sökvägen alltid ligger i filsystemet direkt under `GALLERY_PATH`. Då bör ingen kunna se bilder, eller andra filer, utanför mitt galleri. Man bör vara extra försiktig när man ger användaren en koppling till att visa information som finns på ditt filsystem, det finns alltid en möjlighet att man kodar lite fel och öppnar upp en väg in i sitt system. Men min lilla kontroll *bör* skydda oss, som sagt, man kan aldrig vara säker. 

**Validera inkommande parametrar.**

```php
// Validate incoming arguments
($pathToGallery !== false) or errorMessage("The path to the gallery image seems to be a non existing path.");
($basePath !== false) or errorMessage("The basepath to the gallery, GALLERY_PATH, seems to be a non existing path.");
is_dir(GALLERY_PATH) or errorMessage('The gallery dir "' . GALLERY_PATH . '" is not a valid directory.');
substr_compare($basePath, $pathToGallery, 0, strlen($basePath)) == 0 or errorMessage("Security constraint: Source gallery is not directly below the directory GALLERY_PATH.\n" . $basePath . "\n" . $pathToGallery);
```

Blir något av testerna fel så avbryts skriptet. Får du problem med testerna så kan du alltid kommentera bort dem, eller felsök genom att skriva ut sökvägarna. Kom i håg att dessa tester finns för säkerhetens skull.



###Visa galleriet och enskilda element {#visa}

Så, nu är det dags att visa upp galleriet. Om `path` pekar på en katalog så visar jag innehållet i den katalogen, om `path pekar på en fil så visas information om den filen, förutsatt att det är en fil som kan hanteras av galleriet.

**Visa galleriet och enskilda element.**

```php
// Read and present images in the current directory
if(is_dir($pathToGallery)) {
  $gallery = readAllItemsInDir($pathToGallery);
}
else if(is_file($pathToGallery)) {
  $gallery = readItem($pathToGallery);
}
```

Själva hanteringen av att visa innehållet i en katalog finns i funktionen [`readAllItemsInDir()`](#readall) och funktionaliteten för att visa information om ett element finns i funktionen [`readItem()`](#readitem).

Båda funktionerna returnerar html-kod som visar upp innehållet.



###Presentation och navigering {#pres}

Nu är det klar, så gott som, det som saknas är att skriva ut innehållet på sida och att lägga till en *breadcrumb* för navigering. Läs om [breadcrumb på Wikipedia](http://en.wikipedia.org/wiki/Breadcrumb_%28navigation%29).

**Presentation och navigering med breadcrumb.**

```php
// Prepare content and store it all in variables in the Anax container.
$breadcrumb = createBreadcrumb($pathToGallery);

$anax['title'] = "Ett galleri";
$anax['main'] = <<<EOD
<h1>{$anax['title']}</h1>

$breadcrumb

$gallery

EOD;
```

Breadcrumben skapas i funktionen [`createBreadcrumb()`](#bread).

Detta var grundstrukturen.



Galleriets funktionalitet i funktioner {#funk}
---------------------------------

Låt oss nu kika lite noggrannare på de olika funktionerna, nämligen:

* `readAllItemsInDir()`
* `readItem()`
* `createBreadcrumb()`



###Funktionen `readAllItemsInDir()` {#readall}

Funktionen skall söka igenom en katalog och visa upp dess innehåll som ett galleri. Via funktionen `glob()` får funktionen en array av innehållet i katalogen som sedan loopas igenom. Är det en bild så visas en thumbnail för den, är det en katalog så visas en ikon som representerar en katalog. Allt lagras i en `<ul><li>` lista.

[FIGURE src=/image/snapshot/gallery-start.jpg?w=w2 caption="Startsidan för galleriet som innehåller både bilder och kataloger."]

För att visa bilden används [`img.php`](kunskap/skapa-egen-kod-for-att-beskara-och-forminska-bilder-med-php-gd).

**Funktionen `readAllItemsInDir()`.**

```php
/**
 * Read directory and return all items in a ul/li list.
 *
 * @param string $path to the current gallery directory.
 * @param array $validImages to define extensions on what are considered to be valid images.
 * @return string html with ul/li to display the gallery.
 */
function readAllItemsInDir($path, $validImages = array('png', 'jpg', 'jpeg')) {
  $files = glob($path . '/*'); 
  $gallery = "<ul class='gallery'>\n";
  $len = strlen(GALLERY_PATH);

  foreach($files as $file) {
    $parts = pathinfo($file);
    $href  = str_replace('\\', '/', substr($file, $len + 1));

    // Is this an image or a directory
    if(is_file($file) && in_array($parts['extension'], $validImages)) {
      $item    = "<img src='img.php?src=" 
        . GALLERY_BASEURL 
        . $href 
        . "&amp;width=128&amp;height=128&amp;crop-to-fit' alt=''/>";
      $caption = basename($file); 
    }
    elseif(is_dir($file)) {
      $item    = "<img src='img/folder.png' alt=''/>";
      $caption = basename($file) . '/';
    }
    else {
      continue;
    }

    // Avoid to long captions breaking layout
    $fullCaption = $caption;
    if(strlen($caption) > 18) {
      $caption = substr($caption, 0, 10) . '…' . substr($caption, -5);
    }

    $gallery .= "<li><a href='?path={$href}' title='{$fullCaption}'><figure class='figure overview'>{$item}<figcaption>{$caption}</figcaption></figure></a></li>\n";
  }
  $gallery .= "</ul>\n";

  return $gallery;
}
```

Det behövs två stylesheets för att visningen skall se ut som ett galleri, dessa stylesheets är `gallery.css` och `figure.css`.

Stylesheeten `gallery.css` är till för att visa upp innehållet i en katalog som ett galleri.

**Stylesheet `gallery.css`.**

```css
/** 
 * CSS for gallery.php
 */
ul.gallery {
  list-style: none;
  margin: 0;
  padding: 0;
}

ul.gallery li {
  display: inline-block;
  margin: 0;
  padding: 0;
  margin-right: 8px;
  margin-bottom: 8px;
}

ul.gallery li {
  border: 1px solid #ccc;
  padding: 4px;
}

ul.gallery li figure  {
  margin: 0;
}

ul.gallery li figure figcaption {
  font-size: 0.85em;
  color: #666;
}

ul.gallery li:hover  {
  background-color: #ccc;
}

ul.gallery li:hover figcaption {
  color: #111;
}

ul.gallery li a  {
  text-decoration: none;
}
```

Stylesheeten `figure.css` är till för att visa upp en bild tillsammans med en undertext inom ramen för html-elementet `<figure>` och `<figcaption>`.

**Stylesheet `figure.css`.**

```css
/**
 * CSS for figure and displaying images.
 */
figure.figure {
  display: table;
  padding: 0;
  margin: 16px 16px 22px 16px;
}

/* Chrome shinks images in td */
figure.figure td img {
  max-width: none;
}

figure.figure figcaption {
  display: table-caption;
  caption-side: bottom;
  padding: 0;
  font-style: italic;
}
```

Stylesheeten för `<figure>` är bra att ha när du visar bilder allmänt. Kikar du i [källkoden för stylesheeten](kod-exempel/skapa-ett-galleri-av-dina-bilder-med-php/source.php?path=css/figure.css#file) så ser du även hur du kan göra för att vänster- eller högerjustera en bild, eller centrera en mindre bild.



###Funktionen `readItem()` {#readitem}

Funktionen skall presentera information om ett objekt i galleriet. Om det är ett objekt som stöds av galleriet så visas en version av bilden tillsammans med detaljer om bildfilen. Funktionen returnerar html-kod som används för att presentera informationen.

[FIGURE src=/image/snapshot/gallery-one-item.jpg?w=w2 caption="En bild visas för sig själv med detaljer om bildfilen."]

För att visa bilden används [`img.php`](kunskap/skapa-egen-kod-for-att-beskara-och-forminska-bilder-med-php-gd).

**Funktionen `readItem()`.**

```php
/**
 * Read and return info on choosen item.
 *
 * @param string $path to the current gallery item.
 * @param array $validImages to define extensions on what are considered to be valid images.
 * @return string html to display the gallery item.
 */
function readItem($path, $validImages = array('png', 'jpg', 'jpeg')) {
  $parts = pathinfo($path);
  if(!(is_file($path) && in_array($parts['extension'], $validImages))) {
    return "<p>This is not a valid image for this gallery.";
  }

  // Get info on image
  $imgInfo = list($width, $height, $type, $attr) = getimagesize($path);
  $mime = $imgInfo['mime'];
  $gmdate = gmdate("D, d M Y H:i:s", filemtime($path));
  $filesize = round(filesize($path) / 1024); 

  // Get constraints to display original image
  $displayWidth  = $width > 800 ? "&amp;width=800" : null;
  $displayHeight = $height > 600 ? "&amp;height=600" : null;

  // Display details on image
  $len = strlen(GALLERY_PATH);
  $href = GALLERY_BASEURL . str_replace('\\', '/', substr($path, $len + 1));
  $item = <<<EOD
<p><img src='img.php?src={$href}{$displayWidth}{$displayHeight}' alt=''/></p>
<p>Original image dimensions are {$width}x{$height} pixels. <a href='img.php?src={$href}'>View original image</a>.</p>
<p>File size is {$filesize}KBytes.</p>
<p>Image has mimetype: {$mime}.</p>
<p>Image was last modified: {$gmdate} GMT.</p>
EOD;

  return $item;
}
```

Ser du några möjligheter till förbättringar? Kanske kan du hitta fler funktioner som ger matnyttig information om bildfilen eller kanske kan du integrera bilden med de möjligheter som erbjuds av `img.php`? Nu när vi har grundstrukturen finns alla möjligheter.



###Funktionen `createBreadcrumb()` {#bread}

Funktionen genererar en navigeringsmeny för för galleriet genom att dela upp `path` i dess delar. Resultatet blir en html-lista `<ul><li>` som kan stylas för att bli till en breadcrumb.

[FIGURE src=/image/snapshot/gallery-breadcrumb.jpg?w=w2 caption="Breadcrumben som navigeringsmeny, uppdelad från nuvarande path."]

Så här ser funktionen ut.

**Funktionen `createBreadcrumb()`.**

```php
/**
 * Create a breadcrumb of the gallery query path.
 *
 * @param string $path to the current gallery directory.
 * @return string html with ul/li to display the thumbnail.
 */
function createBreadcrumb($path) {
  $parts = explode('/', trim(substr($path, strlen(GALLERY_PATH) + 1), '/'));
  $breadcrumb = "<ul class='breadcrumb'>\n<li><a href='?'>Hem</a> »</li>\n";

  if(!empty($parts[0])) {
    $combine = null;
    foreach($parts as $part) {
      $combine .= ($combine ? '/' : null) . $part;
      $breadcrumb .= "<li><a href='?path={$combine}'>$part</a> » </li>\n";
    }
  }

  $breadcrumb .= "</ul>\n";
  return $breadcrumb;
}
```

Det finns en stylesheet `breadcrumb.css` som ger navigeringsmenyn dess utseende.

**Stylesheet `breadcrumb.css`.**

```css
/** --------------------------------------------------------------
 * Breadcrumb
 */
ul.breadcrumb {
  list-style-type: none;
  padding: 0;
  margin: 0 0 22px 0;
}

ul.breadcrumb li {
  padding: 0;
  margin: 0;
  display: inline;
}

ul.breadcrumb a {
  font-size: 0.85em;
  text-decoration: none;
  color: #666;
}

ul.breadcrumb a:hover {
  text-decoration: underline;
  color: #333;
}
```



Avslutningsvis {#avslut}
--------------------------------------

Det blev till slut en sidkontroller för `gallery.php` som använder sig av `img.php` för att implementera ett enkelt galleri som använder sig av den befintliga filstrukturen.

Vill du nu ta det ett steg vidare så kan du antingen förbättra användarvänligheten av galleriet, eller implementera det med stöd av databasen.

Men, som ett enkelt bra-att-ha galleri räcker det en bra bit.

För att testa hur väl det fungerar så modifierade jag det lite så att det fungerar för att visa alla bilderna som ligger på `dbwebb.se/img`. Det var ett bra test i sig. Man ser att vissa bilder inte visas på grund av icke tillåtna tecken i filnamnet, det kan man justera i `img.php`. Sedan visas inte alla kataloger eftersom de ligger som symboliska länkar till en annan del av filsystemet, säkerhetsinställningen i `gallery.php` tillåter inte att galleriet följer symboliska länkar. Det kan man koda om, om man så vill.

Så här ser det ut när jag visar upp alla bilder i `dbwebb.se/img` i galleriet som nu heter [`gallery2.php`](kod-exempel/skapa-ett-galleri-av-dina-bilder-med-php/gallery2.php?).

[FIGURE src=/image/snapshot/gallery-dbwebb.jpg?w=w2 caption="Galleriet visar alla bilder på dbwebb.se/img."]

Det är kanske ingen dum idé att ha ett galleri över de bilder man publicerar på webbplatsen. Om inte annat så blir det en bra möjlighet att gå igenom dem och plocka bort de som inte borde vara där.

Klarade det testet, att vara galleri för en katalogstruktur med lite fler bilder? Ja, det tycker jag, med hjälp av `img.php` så fungerar det.

Fråga i forumet eller föreslå bättre implementeringar av galleriet.




