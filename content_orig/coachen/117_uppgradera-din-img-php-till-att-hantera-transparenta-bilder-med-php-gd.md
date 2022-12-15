---
author: mos
category: php
updated: "2013-10-15 10:29:50"
created: "2013-10-15 10:29:36"
...
Uppgradera din img.php till att hantera transparenta bilder med PHP GD
==================================

Behöver du stöd för att hantera transparenta bilder? Kanske har du gjort din egen `img.php` som behandlar och beskär dina bilder på serversidan med PHP GD men har svårt att få de transparenta bilderna att fungera? Då har du kommit rätt.

<!--more-->

I artikeln ["Skapa egen kod för att beskära och förminska bilder med PHP GD"](kunskap/skapa-egen-kod-for-att-beskara-och-forminska-bilder-med-php-gd) visas hur du gör ditt eget PHP skript för att beskära, förminska och processa bilder på serversidan med PHP GD.

Skriptet hanterar dock inte transparenta bilder. Uppgradera ditt `img.php` till att klara av transparenta bilder så här.

Först, när du skapar nya bilder så säger du till att information om alpha-kanalen skall hanteras, och inte glömmas bort. De magiska orden är `imagealphablending()` och `imagesavealpha()`.

Skapa en ny funktion för att skapa bilderna.

**Funktionen `createImageKeepTransparency()`.**

```php
/**
 * Create new image and keep transparency
 *
 * @param resource $image the image to apply this filter on.
 * @return resource $image as the processed image.
 */
function createImageKeepTransparency($width, $height) {
    $img = imagecreatetruecolor($width, $height);
    imagealphablending($img, false);
    imagesavealpha($img, true);  
    return $img;
}
```

Anropa den funktionen istället för `imagecreatetruecolor()`.

Sedan måste du säga till att när PNG-bilder sparas till disk så skall även alpha-kanalen sparas. De magiska orden är även här `imagealphablending()` och `imagesavealpha()`.

**Säg till att alpha-kanalen lagras när du sparar PNG-bilder.**

```php
// Save the image
switch($saveAs) {
  case 'png':  
    // Turn off alpha blending and set alpha flag
    imagealphablending($image, false);
    imagesavealpha($image, true);
    imagepng($image, $cacheFileName);  
  break;  
```

Sådär, nu har du ett skript som hanterar även transparenta PNG-bilder.

I artikeln ["Gör ett galleri för att visa upp bilder med PHP"](kunskap/gor-ett-galleri-for-att-visa-upp-bilder-med-php) används ett sådant uppgraderat `img.php` skript.

