---
author: mos
category: php
revision:
  "2014-08-06": (D, mos) Bytte q mot quality så att kvaliteten fungerar.
  "2013-11-18": (C, mos) Rättade path till img katalogen så att valideringen gick
    bra på både unix och windows.
  "2013-10-15": (B, mos) Buggrättningar för att klara katalogstruktur av bilder.
  "2013-10-14": (A, mos) Första utgåvan i som del i ett kursmoment av kursen oophp.
updated: "2014-08-06 06:07:46"
created: "2013-10-08 07:04:14"
...
Skapa egen kod för att beskära och förminska bilder med PHP GD
==================================

PHP innehåller ett bibliotek för bildbearbetning, *PHP Graphics Library*, PHP GD. Med hjälp av funktionerna i det biblioteket kan du skapa kod som förminskar bilder, beskär dem och förvanskar dem på olika sätt. På detta sätt kan du via PHP hantera bilderna så att de passar in perfekt i din webbplats, du kan ge dem exakta storlekar, skapa miniatyrer och försöka uppnå så liten storlek på filerna som möjligt.

Vi skall skapa skriptet `img.php` som hjälper oss att leverera en bild, perfekt beskuren och sparad med en optimal avvägning mellan bildens kvalitet och filens storlek. Skriptet skall även klara av hantering av en cache så att bilderna kan sparas hos klienten och inte behöver processas varje gång någon visar dem.

<!--more-->


Innan vi startar  {#innan}
---------------------------------

Detta exempel baseras på delar av koden från klassen `CImage` och skriptet `img.php` som du kan läsa om i artikeln ["CImage and img.php for image resize, crop and processing using PHP GD"](opensource/cimage).

Själva [exempelkoden och exemplet hittar du här](kod-exempel/gor-din-egen-img-php/img_test.php). Exempelkoden bygger på Anax som du kan läsa om i artikeln ["Anax - en hållbar struktur för dina webbapplikationer"](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).



Kom igång snabbt {#start}
---------------------------------

Hela tanken är att låta PHP skriptet `img.php` hantera visningen av bilden. Ett HTML element för en bild ser normalt ut så här.

```html
<img src="img/kodim15.png" alt="Flicka, exempelbild från Kodak"/>
```

Och en sådan bild visas normalt upp så här i webbsidan.

[FIGURE src=/image/kodak/kodim15.png?sa=jpg&w=w2 caption="En flicka i en bildserie från Kodak."]

Vi ändrar nu bildlänken till skriptet `img.php`, så här.

```html
<img src="img.php?src=kodim15.png" alt="Flicka, exempelbild från Kodak"/>
```

Det som krävs av `img.php` är att omvandla parametern `src` till sökvägen till bilden, göra lite kontroller för säkerhetens skull och sedan läsa upp bilden och leverera den till webbläsaren. När man håller på med sånt här så är det bra att ha en debugg-variant som ger en hög med utskrifter så att man förstår vad som händer. Det vore bra om `img.php` kunde hantera det, bara för att underlätta felsökning och utveckling i längden.

Nåja, kom igång snabbt sa jag, här är en variant på `img.php`, version 1, som kan läsa upp och visa en bild, med eller utan debugging utskrift. Klicka på länkarna, gå sedan in och studera källkoden och försök förstå vad som händer.

Bilden visas tillsammans med debugging utskrifter: [`img_v1.php?src=kodim15.png&verbose`](kod-exempel/gor-din-egen-img-php/img_v1.php?src=kodim15.png&verbose).

Bilden visas ensam: [`img_v1.php?src=kodim15.png`](kod-exempel/gor-din-egen-img-php/img_v1.php?src=kodim15.png).

[Källkod för version 1 av `img.php`, `img_v1.php`](kod-exempel/gor-din-egen-img-php/source.php?path=img_v1.php#file).

Följande är flödet i `img.php`. Se det som en grov uppdelning av flödet, den mesta av koden är bortplockad. Det som är kvar är själva hanteringen av bilden.

```php
// Ensure error reporting is on

// Define some constant values, append slash
// Use DIRECTORY_SEPARATOR to make it work on both windows and unix.
define('IMG_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR);

// Get the incoming arguments
$src      = isset($_GET['src'])     ? $_GET['src']      : null;
$verbose  = isset($_GET['verbose']) ? true              : null;

$pathToImage = realpath(IMG_PATH . $src);

// Validate incoming arguments

// Start displaying log if verbose mode & create url to current image

// Get information on the image
$imgInfo = list($width, $height, $type, $attr) = getimagesize($pathToImage);
$mime = $imgInfo['mime'];

// Output the resulting image
header('Content-type: ' . $mime);  
readfile($pathToImage);
```

Nu börjar vi bearbeta bilden.



Spara som JPEG {#saveas}
--------------------------------------

Egentligen behöver vi inte spara de bearbetade bilderna på fil, men det blir mycket effektivare i längden och vi kan dessutom använda oss av cachning så att webbläsaren kan cacha bilderna så de inte behöver laddas varje gång sidan öppnas.

Varför vill vi spara som JPEG? Det visar sig, att för denna typen av bilder, foton, så blir filstorleken mindre och kvaliteten tillräckligt bra, om vi använder JPEG som bildformat. JPEG har ett argument som låter oss bestämma vilken kvalitet det skall vara på bilden, genom att använda det kan vi styra bildens storlek mot bildens kvalitet. 100 är högst kvalitet och 1 är sämst kvalitet. Bättre kvalitet ger större filstorlek, sämre kvalitet ger mindre filstorlek.

[FIGURE src=/image/kodak/kodim15.png?sa=jpg&w=w2&quality=10 caption="Bilden sparad som JPEG i kvalitet 10."]

För att lyckas med detta måste vi läsa upp bilden och hantera den med PHP GD, sedan måste vi skapa ett cache-bibliotek där filen kan lagras. Slutligen skriver vi ut den cachade bild-filen. Så här kan det se ut.

Bilden visas tillsammans med debugging utskrifter: [`img_v2.php?src=kodim15.png&save-as=jpg&quality=40&verbose`](kod-exempel/gor-din-egen-img-php/img_v2.php?src=kodim15.png&save-as=jpg&quality=40&verbose).

Bilden visas ensam: [`img_v2.php?src=kodim15.png&save-as=jpg&quality=40`](kod-exempel/gor-din-egen-img-php/img_v2.php?src=kodim15.png&save-as=jpg&quality=40).

[Källkod för version 2 av `img.php`, `img_v2.php`](kod-exempel/gor-din-egen-img-php/source.php?path=img_v2.php#file).

Följande är det uppdaterade flödet i `img.php`.

```php
// Ensure error reporting is on

// Define some constant values, append slash
define('CACHE_PATH', __DIR__ . '/cache/');

// Get the incoming arguments
$saveAs   = isset($_GET['save-as']) ? $_GET['save-as']  : null;
$quality  = isset($_GET['quality']) ? $_GET['quality']  : 60;

// Validate incoming arguments
is_null($saveAs) or in_array($saveAs, array('png', 'jpg', 'jpeg')) or errorMessage('Not a valid extension to save image as');
is_null($quality) or (is_numeric($quality) and $quality > 0 and $quality <= 100) or errorMessage('Quality out of range');

// Start displaying log if verbose mode & create url to current image

// Get information on the image

// Creating a filename for the cache
$parts      = pathinfo($pathToImage);
$saveAs     = is_null($saveAs) ? $fileExtension : $saveAs;
$quality_   = is_null($quality) ? null : "_q{$quality}";
$dirName    = preg_replace('/\//', '-', dirname($src));
$cacheFileName = CACHE_PATH . "-{$dirName}-{$parts['filename']}_{$width}_{$height}{$quality_}.{$saveAs}";
$cacheFileName = preg_replace('/^a-zA-Z0-9\.-_/', '', $cacheFileName);


// Open up the image from file
$fileExtension  = pathinfo($pathToImage, PATHINFO_EXTENSION);
switch($fileExtension) {  
  case 'jpg':
  case 'jpeg': 
    $image = imagecreatefromjpeg($pathToImage);
    break;  
  
  case 'png':  
    $image = imagecreatefrompng($pathToImage); 
    break;  
}


// Save the image
switch($saveAs) {
  case 'jpeg':
  case 'jpg':
    imagejpeg($image, $cacheFileName, $quality);
  break;  

  case 'png':  
    imagepng($image, $cacheFileName);  
  break;  
}


// Output the resulting image
$info = getimagesize($cacheFileName);
$mime = $info['mime'];
header('Content-type: ' . $mime);  
readfile($cacheFileName);
```

Det var en översikt över de delar som skapar ett filnamn, öppnar bilden och spara sedan bilden i cachen. Jag behövde uppdatera hur bilden levereras i slutet av filen, om jag byter filtyp så blir det också en annan mime typ.



Implementera cachning {#cache}
--------------------------------------

Vi har nu en bild i cachen, men varje gång vi ber om bilden så skapas en ny version i cache-katalogen. Låt oss nu implementera en mer korrekt hantering så att webbläsaren kan cacha filerna.

Först så kikar vi i Firebug för att se vilka resurser som cachas och inte, där visas tydligt att våra bilder laddas in varje gång vi laddar om sidan. Det är onödigt. Statuskoden 200 visar att resursen laddas, statuskoden 304 visar att resursen inte har ändrats och ger webbläsaren möjlighet att cacha bilden.

**Testa i `img_v2.php` där bilden inte cachas av webbläsaren.**

[FIGURE src=/image/snapshot/img-php-not-cached.jpg?w=w2&quality=60 caption="Firebug visar vilka resurser som cachas eller ej, bilden är ej cachad."]

Vad vi behöver göra är att kontrollera om den cachade bilden är aktuell och den som efterfrågas, då behöver vi inte göra någon bildbearbetning alls utan kan glatt leverera den cachade bilden.

**Testa i `img_v3.php` där bilden cachas av webbläsaren.**

[FIGURE src=/image/snapshot/img-php-cached.jpg?w=w2&quality=60 caption="Firebug visar vilka resurser som cachas eller ej, nu är bilden cachad."]

Det som krävs är att kontrollera om den cachade bilden är nyare än originalbilden, det är första steget.

**Kontrollera om den cachade versionen är aktuell.**

```php
//
// Get the incoming arguments
//
$ignoreCache = isset($_GET['no-cache']) ? true           : null;

//
// Is there already a valid image in the cache directory, then use it and exit
//
$imageModifiedTime = filemtime($pathToImage);
$cacheModifiedTime = is_file($cacheFileName) ? filemtime($cacheFileName) : null;

// If cached image is valid, output it.
if(!$ignoreCache && is_file($cacheFileName) && $imageModifiedTime < $cacheModifiedTime) {
  if($verbose) { verbose("Cache file is valid, output it."); }
  outputImage($cacheFileName, $verbose);
}

if($verbose) { verbose("Cache is not valid, process image and create a cached version of it."); }
```

Jag lade till en parameter `no-cache` som gör att jag kan ignorera cachens innehåll, även om det är aktuellt. Det är bra när jag testar och vill skriva om den cachade filen hela tiden. Jag slipper radera målbilden från cachen hela tiden.

Jag valde att lägga "utskriften" av bilden i en egen funktion, `outputImage()`. Det är nu upp till den funktionen att leverera bilden tillsammans med headers som säger om den cachade bilden är ändrad sedan senast den laddades ned.

**Leverans av bilden med stöd för *304 Not Modified*.**

```php
/**
 * Output an image together with last modified header.
 *
 * @param string $file as path to the image.
 * @param boolean $verbose if verbose mode is on or off.
 */
function outputImage($file, $verbose) {
  $info = getimagesize($file);
  !empty($info) or errorMessage("The file doesn't seem to be an image.");
  $mime   = $info['mime'];

  $lastModified = filemtime($file);  
  $gmdate = gmdate("D, d M Y H:i:s", $lastModified);

  if($verbose) {
    verbose("Memory peak: " . round(memory_get_peak_usage() /1024/1024) . "M");
    verbose("Memory limit: " . ini_get('memory_limit'));
    verbose("Time is {$gmdate} GMT.");
  }

  if(!$verbose) header('Last-Modified: ' . $gmdate . ' GMT');
  if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $lastModified){
    if($verbose) { verbose("Would send header 304 Not Modified, but its verbose mode."); exit; }
    header('HTTP/1.0 304 Not Modified');
  } else {  
    if($verbose) { verbose("Would send header to deliver image with modified time: {$gmdate} GMT, but its verbose mode."); exit; }
    header('Content-type: ' . $mime);  
    readfile($file);
  }
  exit;
}
```

Det som sker är en förhandling mellan webbläsaren och `img.php`. Webbläsaren säger att den har en bild som inte ändrats sedan `$_SERVER['HTTP_IF_MODIFIED_SINCE']` och `img.php` kan då kontrollera tidstämpeln för när den bilden skapades. Är bilden nyare så leverera bilden, annars leverera en header som säger att bilden inte har ändrats, `HTTP/1.0 304 Not Modified`.

Dubbelkolla alltid i Firebug för att se om dina resurser cachas av webbläsaren. Kika efter 304. Gör vanlig omladdning av sidan (`ctrl-r` eller `cmd-r`) och tvinga sedan sidan att ladda om alla resurser, oavsett om de cachas eller ej (`shift-ctrl-r` eller `shift-cmd-r`). En vanlig omladdning bör ge 304 och en tvingad omladdning bör ge att alla resurser laddas in igen med statuskod 200.

Så här ser det ut i koden.

Bilden visas tillsammans med debugging utskrifter: [`img_v3.php?src=kodim15.png&save-as=jpg&quality=40&verbose`](kod-exempel/gor-din-egen-img-php/img_v3.php?src=kodim15.png&save-as=jpg&quality=40&verbose).

Bilden visas ensam: [`img_v3.php?src=kodim15.png&save-as=jpg&quality=40`](kod-exempel/gor-din-egen-img-php/img_v3.php?src=kodim15.png&save-as=jpg&quality=40).

[Källkod för version 3 av `img.php`, `img_v3.php`](kod-exempel/gor-din-egen-img-php/source.php?path=img_v3.php#file).



Förminska en bild {#forminska}
--------------------------------------

[FIGURE src=/image/kodak/kodim15.png?sa=jpg&w=250 caption="Bilden nu begränsad till en bredd om 250 pixlar." class="right"]

Ofta vill vi ha bilder av en väl känd storlek. Säg till exempel bilden här till höger, jag vill att den skall vara 250 pixlar bred för att passa in i webbsidans layout. Bildens höjd får skala med bilden så att den har rätt bildförhållande.

Min `img.php` behöver alltså stöd för parametrar `width` och `height` som sätter begränsningar på bildens dimension. Jag behöver beräkningar så att användaren har flexibilitet och kan ange bredd, höjd eller både ock.

Om endast en parameter är satt så kommer den andra att räknas ut. När båda parametrarna är satta så tänker jag mig att det är en tänkt ram där varken bildens bredd eller höjd får överstiga samt att bildens förhållande mellan bredd och höjd skall vara det samma.

Så är tanken och så här kan det se ut i kod.

Bilden visas tillsammans med debugging utskrifter: [`img_v4.php?src=kodim15.png&save-as=jpg&width=250&verbose`](kod-exempel/gor-din-egen-img-php/img_v4.php?src=kodim15.png&save-as=jpg&width=250&verbose).

Bilden visas ensam: [`img_v4.php?src=kodim15.png&save-as=jpg&width=250`](kod-exempel/gor-din-egen-img-php/img_v4.php?src=kodim15.png&save-as=jpg&width=250).

[Källkod för version 4 av `img.php`, `img_v4.php`](kod-exempel/gor-din-egen-img-php/source.php?path=img_v4.php#file).

Här är en översikt av de större ändringarna i koden.

```php
// Ensure error reporting is on

// Define some constant values, append slash
$maxWidth = $maxHeight = 2000;

// Get the incoming arguments
$newWidth   = isset($_GET['width'])   ? $_GET['width']    : null;
$newHeight  = isset($_GET['height'])  ? $_GET['height']   : null;

// Validate incoming arguments
is_null($newWidth) or (is_numeric($newWidth) and $newWidth > 0 and $newWidth <= $maxWidth) or errorMessage('Width out of range');
is_null($newHeight) or (is_numeric($newHeight) and $newHeight > 0 and $newHeight <= $maxHeight) or errorMessage('Width out of range');

// Start displaying log if verbose mode & create url to current image

// Get information on the image

// Calculate new width and height for the image

// Creating a filename for the cache
$cacheFileName = CACHE_PATH . "-{$dirName}-{$parts['filename']}_{$newWidth}_{$newHeight}{$quality_}.{$saveAs}";

// Open up the original image from file

// Resize the image if needed

// Save the image

// Output the resulting image
```

Att beräkna bildens bredd och höjd kräver lite matematiska beräkningar som också tar hänsyn till förhållandet mellan bildens bredd och höjd.

**Beräkna ny bredd och höjd.**

```php
//
// Calculate new width and height for the image
//
$aspectRatio = $width / $height;
if($newWidth && !$newHeight) {
  $newHeight = round($newWidth / $aspectRatio);
  if($verbose) { verbose("New width is known {$newWidth}, height is calculated to {$newHeight}."); }
}
else if(!$newWidth && $newHeight) {
  $newWidth = round($newHeight * $aspectRatio);
  if($verbose) { verbose("New height is known {$newHeight}, width is calculated to {$newWidth}."); }
}
else if($newWidth && $newHeight) {
  $ratioWidth  = $width  / $newWidth;
  $ratioHeight = $height / $newHeight;
  $ratio = ($ratioWidth > $ratioHeight) ? $ratioWidth : $ratioHeight;
  $newWidth  = round($width  / $ratio);
  $newHeight = round($height / $ratio);
  if($verbose) { verbose("New width & height is requested, keeping aspect ratio results in {$newWidth}x{$newHeight}."); }
}
else {
  $newWidth = $width;
  $newHeight = $height;
  if($verbose) { verbose("Keeping original width & heigth."); }
}
```

När man nu har den nya bredden och höjden kan bilden skalas om till den nya storleken.

**Skala om en bild till en ny storlek.**

```php
//
// Resize the image if needed
//
if(!($newWidth == $width && $newHeight == $height)) {
  $imageResized = imagecreatetruecolor($newWidth, $newHeight);
  imagecopyresampled($imageResized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
  $image  = $imageResized;
  $width  = $newWidth;
  $height = $newHeight;
}
```

Först skapar man en ny bild mer måldimensionerna, sedan kopieras originalbilden till målbilden och samplas om för att bilden skall behålla sin klarhet.



Crop to fit, beskär bilden {#croptofit}
--------------------------------------

[FIGURE src=/image/kodak/kodim15.png?sa=jpg&w=250&h=250&cf caption="Bilden som thumbnail om 250x250 pixlar. resten av bilden beskärs bort." class="right"]

Ibland vill man att bilden verkligen skall passa in i en tänkt låda. Ta till exempel en profilbild, en *thumbnail*, som är vanlig i forum och sociala nätverk. De bilderna brukar ha en hård dimension på både bredd och höjd och vanligen beskär man bilden så att de delarna som inte passar in tas bort.

För att stödja `crop-to-fit` så behöver vi lite mer beräkningar som plockar ut enbart del delen av originalbilden som får plats i målbildens dimensioner.

Så här kan det se ut i kod.

Bilden visas tillsammans med debugging utskrifter: [`img_v5.php?src=kodim15.png&save-as=jpg&width=250&height=250&crop-to-fit&verbose`](kod-exempel/gor-din-egen-img-php/img_v5.php?src=kodim15.png&save-as=jpg&width=250&height=250&crop-to-fit&verbose).

Bilden visas ensam: [`img_v5.php?src=kodim15.png&save-as=jpg&width=250&height=250&crop-to-fit`](kod-exempel/gor-din-egen-img-php/img_v5.php?src=kodim15.png&save-as=jpg&width=250&height=250&crop-to-fit).

[Källkod för version 5 av `img.php`, `img_v5.php`](kod-exempel/gor-din-egen-img-php/source.php?path=img_v5.php#file).

Här är en översikt av de större ändringarna i koden.

```php
// Ensure error reporting is on

// Define some constant values, append slash

// Get the incoming arguments
$cropToFit  = isset($_GET['crop-to-fit']) ? true : null;

// Validate incoming arguments
is_null($cropToFit) or ($cropToFit and $newWidth and $newHeight) or errorMessage('Crop to fit needs both width and height to work');

// Start displaying log if verbose mode & create url to current image

// Get information on the image

// Calculate new width and height for the image
if($cropToFit && $newWidth && $newHeight) {
  $targetRatio = $newWidth / $newHeight;
  $cropWidth   = $targetRatio > $aspectRatio ? $width : round($height * $targetRatio);
  $cropHeight  = $targetRatio > $aspectRatio ? round($width  / $targetRatio) : $height;
  if($verbose) { verbose("Crop to fit into box of {$newWidth}x{$newHeight}. Cropping dimensions: {$cropWidth}x{$cropHeight}."); }
}

// Creating a filename for the cache
$cropToFit_     = is_null($cropToFit) ? null : "_cf";
$cacheFileName = CACHE_PATH . "-{$dirName}-{$parts['filename']}_{$newWidth}_{$newHeight}{$quality_}{$cropToFit_}.{$saveAs}";

// Open up the original image from file

// Resize the image if needed
if($cropToFit) {
  if($verbose) { verbose("Resizing, crop to fit."); }
  $cropX = round(($width - $cropWidth) / 2);  
  $cropY = round(($height - $cropHeight) / 2);    
  $imageResized = imagecreatetruecolor($newWidth, $newHeight);
  imagecopyresampled($imageResized, $image, 0, 0, $cropX, $cropY, $newWidth, $newHeight, $cropWidth, $cropHeight);
  $image = $imageResized;
  $width = $newWidth;
  $height = $newHeight;
}

// Save the image

// Output the resulting image
```



Sharpen, gör bilden skarpare {#sharpen}
--------------------------------------

När man förminskar bilderna kan de bli lite suddiga, det är förminskningsprocessen som gör att bildens pixlar bearbetas och förändras. Det finns olika algoritmer och tekniker för att hantera förminskningsprocessen, man vill behålla den ursprungliga bilden så gott det går.

Ibland kan den förminskade bilden behöva lite hjälp på traven för att inte bli för suddig, den behöver hjälp av ett filter som gör bilden skarpare. Detta är något vi kan lösa med funktionen [imageconcolution()](http://www.php.net/manual/en/function.imageconvolution.php). Vi bearbetar bildens pixlar med en matris som är uppbyggd så att den gör bilden skarpare.

Så här kan skillnaden se ut om man använder ett filter som gör bilden skarpare eller ej.

[FIGURE src=/image/kodak/kodim15.png?sa=jpg&w=300&h=300&cf caption="Bilden förminskad utan filter." class="left"]

[FIGURE src=/image/kodak/kodim15.png?sa=jpg&w=300&h=300&cf&sharpen caption="Bilden processad med filter som ger en skarpare bild." class="left"]

Resultatet blir en skarpare, mindre suddig bild och detaljerna förhöjs.

Följande kod är tagen från en av [kommentarerna till funktionen](http://www.php.net/manual/en/function.imageconvolution.php#56145). Den visar hur man gör ett *sharpen* filter med *image convolution*. Läs lite kort om [image convolution på Wikipedia](http://en.wikipedia.org/wiki/Kernel_%28image_processing%29).

Så här ser funktionen ut.

**Behandla bilden med *image convolution* för att ge den mer skärpa.**

```php
/**
 * Sharpen image as http://php.net/manual/en/ref.image.php#56144
 * http://loriweb.pair.com/8udf-sharpen.html
 *
 * @param resource $image the image to apply this filter on.
 * @return resource $image as the processed image.
 */
function sharpenImage($image) {
  $matrix = array(
    array(-1,-1,-1,),
    array(-1,16,-1,),
    array(-1,-1,-1,)
  );
  $divisor = 8;
  $offset = 0;
  imageconvolution($image, $matrix, $divisor, $offset);
  return $image;
}
```

För att implementera stöd till detta filtret via parametern `sharpen` i `img.php` så gör jag följande justeringar i strukturen på koden.

```php
// Ensure error reporting is on

// Define some constant values, append slash

// Get the incoming arguments
$sharpen    = isset($_GET['sharpen']) ? true : null;

// Validate incoming arguments

// Start displaying log if verbose mode & create url to current image

// Get information on the image

// Calculate new width and height for the image

// Creating a filename for the cache
$sharpen_       = is_null($sharpen) ? null : "_s";
$cacheFileName = CACHE_PATH . "-{$dirName}-{$parts['filename']}_{$newWidth}_{$newHeight}{$quality_}{$cropToFit_}{$sharpen_}.{$saveAs}";

// Open up the original image from file

// Resize the image if needed

// Apply filters and postprocessing of image
if($sharpen) {
  $image = sharpenImage($image);
}

// Save the image

// Output the resulting image
```

Denna gången behövdes inte så mycket kod. Grunden är på plats och nu kan vi börja bygga ut `img.php` med stöd för fler funktioner, filter och bearbetning av bilden.

Så här blev den resulterande koden, allt som allt.

Bilden visas tillsammans med debugging utskrifter: [`img.php?src=kodim15.png&save-as=jpg&width=300&height=300&sharpen&verbose`](kod-exempel/gor-din-egen-img-php/img.php?src=kodim15.png&save-as=jpg&width=300&height=300&sharpen&verbose).

Bilden visas ensam: [`img.php?src=kodim15.png&save-as=jpg&width=300&height=300&sharpen`](kod-exempel/gor-din-egen-img-php/img.php?src=kodim15.png&save-as=jpg&width=300&height=300&sharpen).

[Källkod för den slutliga versionen `img.php`](kod-exempel/gor-din-egen-img-php/source.php?path=img.php#file).




Stöd för transparenta bilder {#trans}
--------------------------------------

Om du vill hantera transparenta bilder så behöver du berätta för GD hur den skall hantera alpha-kanalen, den kanalen som berättar om det finns transparenta pixlar eller ej. Bildformaten GIF och PNG har stöd för transparenta pixlar.

Kika i detta tipset från Coachen som berättar hur du ["Uppgradera din `img.php` till att hantera transparenta bilder"](coachen/uppgradera-din-img-php-till-att-hantera-transparenta-bilder-med-php-gd).

Ta det som överkurs och en extra uppgift.



Avslutningsvis {#avslutning}
--------------------------------------

[FIGURE src=/image/kodak/kodim15.png?sa=jpg&w=w2&h=200&cf&sharpen&area=15,10,55,20 caption="Tack till Kodak-flickan för hjälpen i exemplet."]

Detta var grunden till din egen bildhantering på serversidan med PHP GD. Nu har du en grund att bygga vidare på. Kanske vill du bygga ut den med fler filter, hantering av transparenta bilder eller stöd för fler bildformat, till exempel GIF.

Guiden baseras på delar av koden från klassen `CImage` och skriptet `img.php` som du kan läsa om i artikeln ["CImage and img.php for image resize, crop and processing using PHP GD"](opensource/cimage).

Vill du läsa mer om bildhantering med PHP, så kan du läsa om tre andra populära programvaror som gör detta, nämligen [timtumb](http://code.google.com/p/timthumb/), [phpTHumb](http://phpthumb.sourceforge.net/) och [ImageMagick](http://www.imagemagick.org/script/index.php).

ImageMagick har riktigt bra dokumentation där du kan läsa på om bildhantering i allmänhet.

I forumet finns en tråd som hanterar detta ämne ["Resiza & beskär bilder on-the-fly på serversidan med PHP"](t/303), där kan du få fler tips.




