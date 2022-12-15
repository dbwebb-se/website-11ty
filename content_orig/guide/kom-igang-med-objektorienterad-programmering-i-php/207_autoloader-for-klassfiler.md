---
author: mos
revision:
    "2018-03-27": "(A, mos) Första versionen, uppdelad av större dokument och uppdaterad."
...
Autoload PSR-4
==================================

En autoloader är en viktig komponent i PHPs infrastruktur. Det finns en standard som heter [PSR-4](http://www.php-fig.org/psr/psr-4/) som anger hur autoloading skall fungera. Det handlar om hur man anger sitt namespace samt var och hur man lagrar filerna i en katalogstruktur som motsvaras av namespacet.

När vi jobbar med moduler, eller paket, via composer och Packagist, så kan vi bestämma vilken typ av autoloader som skall användas. Det vanligaste för nyskriven kod är att använda autoloading enligt PSR-4.

När vi använder kod som installeras via composer så är det också en bra sak att använda den autoloader som genereras. Composer tittar i alla `composer.json` och med den informationen så genereras automatiskt en autoloader i `vendor/autoload.php`. 

Vår hemmasnickrade autoloader gör sitt jobb i all enkelhet, det räcker så länge vi jobbar i vår egen värld och inte integrerar vår kod med andra moduler. Man kan säga att vår autoloader är kompatibel med den struktur som rekommenderas av PSR-4.
