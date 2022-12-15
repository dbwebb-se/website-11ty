---
author: mos
revision:
  "2015-11-18": (F, mos) Ändrade redovisningstexten.
  "2013-12-18": (B, mos) Lade till föreläsning från campus.
  "2013-10-15": (A, mos) Första utgåvan.
...
Kmom06: Bildbearbetning och galleri
==================================

Här handlar det om flexibel hantering av bilder och att låta PHP vara behjälpligt att beskära och processa bilder på serversidan. Du får jobba med det inbyggda grafik-biblioteket PHP GD och med hjälp av det bygger du upp ett skript `img.php` som ger dig en flexibel hantering av bilder.

Därefter tar du hjälp av ditt skript `img.php` och använder det för att skapa ett enkelt galleri som visar bilderna som ligger i en katalogstruktur.

Beskärning av bilder med PHP kan vara ett kraftfullt hjälpmedel för att ge bilderna lite karaktär genom att beskära dem.

[FIGURE src=/image/kodak/kodim15.png?sa=jpg&w=w2&h=200&cf&sharpen&area=15,10,55,20 caption="Tack till Kodak-flickan för hjälpen i exemplet med img.php."]

Med hjälp av `img.php` blir det enklare att skapa ett galleri.

[FIGURE src=/image/snapshot/gallery-start.jpg?w=w2 caption="Så här kan ett galleri se ut när du är klar. Startsidan för galleriet som innehåller både bilder och kataloger."]

Kursmomentet avslutas med att du kodar ett par moduler till ditt Anax.

*(Kursmomentet omfattar cirka 20 studietimmar fördelat på läsanvisningar, uppgifter och övningar samt resultat, redovisning och eftertanke.)*



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*



###Kurslitteratur  {#kurslitteratur}

Läs [artikeln om `CImage` och `img.php`](opensource/cimage).

> *CImage is a PHP class which enables scaling, cropping, filtering effects and processing of images using PHP GD. The script img.php uses CImage to enable server-side image processing together with caching and optimization of the processed images.*



###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial användes i samband med campus-kursen höstterminen 2013. Det kan vara av intresse att skumma igen -- även för distanstudenten.

* [Översikt av kursmomentet](<a href='https://dl.dropboxusercontent.com/u/24315211/oophp/oophp-kmom06-ht13.pdf'>https://dl.dropboxusercontent.com/u/24315211/oophp/oophp-kmom06-ht13.pdf</a>).



###Lästips {#lastips}

Vill du läsa mer om bildhantering med PHP, så kan du läsa om tre andra populära programvaror som gör detta, nämligen [timtumb](<a href='http://code.google.com/p/timthumb/'>http://code.google.com/p/timthumb/</a>), [phpTHumb](<a href='http://phpthumb.sourceforge.net/'>http://phpthumb.sourceforge.net/</a>) och [ImageMagick](<a href='http://www.imagemagick.org/script/index.php'>http://www.imagemagick.org/script/index.php</a>).

Framförallt ImageMagick har riktigt bra manualer om bildhantering i allmänhet. En bra startpunkt för den som vill fördjupa sig i ämnet.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*


###Övningar {#ovningar}

Gör följande övning, den förbereder dig inför uppgifterna och löser dem till stor del.

1. Jobba igenom guiden ["Skapa egen kod för att beskära och förminska bilder med PHP GD"](kunskap/skapa-egen-kod-for-att-beskara-och-forminska-bilder-med-php-gd).

1. Jobba igenom guiden ["Gör ett galleri för att visa upp bilder med PHP"](kunskap/gor-ett-galleri-for-att-visa-upp-bilder-med-php).



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften ["Skapa img.php och en klass CImage för bildhantering"](uppgift/skapa-img-php-och-en-klass-cimage-for-bildhantering). 

1. Gör uppgiften ["Skapa gallery.php och en klass CGallery för ett bildgalleri"](uppgift/skapa-gallery-php-och-en-klass-cgallery-for-ett-bildgalleri).



###Extra {#extra}

1. Uppgradera ditt `img.php` till att hantera transparenta PNG-bilder: ["Uppgradera din img.php till att hantera transparenta bilder med PHP GD"](coachen/uppgradera-din-img-php-till-att-hantera-transparenta-bilder-med-php-gd).

2. Tjuvkika på lite avancerad läsning om cachning med HTTP headers.
  * ["Increasing Application Performance with HTTP Cache Headers"](<a href='https://devcenter.heroku.com/articles/increasing-application-performance-with-http-cache-headers'>https://devcenter.heroku.com/articles/increasing-application-performance-with-http-cache-headers</a>)
  * ["REST Better: HTTP Cache"](<a href='http://odino.org/rest-better-http-cache/'>http://odino.org/rest-better-http-cache/</a>)
  * ["Caching Tutorial for Web Authors and Webmasters"](<a href='http://www.mnot.net/cache_docs/'>http://www.mnot.net/cache_docs/</a>)



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/oophp-v2/redovisa).

Se till att följande frågor besvaras i texten:

* Hade du erfarenheter av bildhantering sedan tidigare?
* Hur känns det att jobba i PHP GD?
* Hur känns det att jobba med `img.php`, ett bra verktyg i din verktygslåda?
* Detta var sista kursmomentet innan projektet, hur ser du på ditt Anax nu, en summering så här långt? 
* Finns det något du saknar så här långt, kanske några moduler som du känner som viktiga i ditt Anax?
