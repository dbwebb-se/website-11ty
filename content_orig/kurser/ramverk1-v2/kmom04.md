---
author:
    - mos
revision:
    "2020-11-30": "(D, mos) Förtydliga hur taggning skall ske."
    "2018-11-22": "(C, mos) Övning nu klar."
    "2018-11-19": "(B, mos) Tidigare kmom06, nu kmom04 i ramverk1 v2. Övnings saknas."
    "2017-09-11": "(A, mos) Preliminär release, artikel saknas."
...
Kmom04: Modul på Packagist
==================================

Du har hittills jobbat med egen kod inuti en installation av ramverket. Du skall nu skapa en fristående modul av din kod och placera det i ett eget repo på GitHub. Du skall alltså lyfta bort koden från din redovisa-sida och placera allt som modulen behöver i ett eget repo som du publicerar på GitHub.

Du skall sedan publicera repot som en PHP modul på Packagist. När det är klart kan du åter installera modulen i din redovisa-sida med hjälp av composer.

Nu har du en modul med bara din egen kod. Du försöker lösa kodtäckning upp emot 100% av din modul.

När du är klar så har du alltså samma kodbas som från början. Men du har brutit loss en självständig del från din redovisa-sida och gjort den till en egen fristående modul som kan återanvändas även i andra sammanhang. Vi vinner förhoppningsvis en bättre kodstruktur som gör det enklare att jobba med vidareutveckling, underhåll och test av koden.

<!--more-->


Så här ser det ut när vi submittar paketet till Packagist.

[FIGURE src=image/snapht17/packagist-submit.png?w=w3 caption="Submitta ett paket till Packagist genom att ange dess url till GitHub."]

[FIGURE src=image/snapht17/packagist-submitted.png?w=w3 caption="Nu är paketet på plats på Packagist."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*



### Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Artikeln PHP The Right Way innehåller ett kort stycke om "[Dependency Management](http://www.phptherightway.com/#dependency_management)", läs igenom det som en introduktion.

1. Läs om begreppet "[Semantic versioning](http://semver.org/)" som berättar hur du bör hantera versionsnummer på din modul.

1. Bekanta dig med webbplatsen "[Packagist](https://packagist.org/about)" och skaffa dig ett konto så att du kan publicera din modul. Packagist kommunicerar med GitHub och reagerar så fort du uppdaterar kodbasen på GitHub.

1. Det skadar inte att färska upp minnet om "[dokumentationen för composer](https://getcomposer.org/doc/)" vilket kan komma till användning när du skall publicera din modul till Packagist.



### Ramverk referenser {#referenser}

Undersök hur (minst) ett av ramverken jobbar med paketering, moduler och versionshantering. Är ramverken modulariserade eller är de en "klump av sammanhängande kod"? Kanske måste du gå till respektive ramverks repo för att analysera deras composer-filer.

* [Dokumentationen för Symfony](https://symfony.com/doc/current/).
* [Dokumentationen för Laravel](https://laravel.com/docs/5.7).
* [Dokumentationen för Phalcon](https://docs.phalconphp.com/en/).
* [Dokumentationen för Yii](https://www.yiiframework.com/doc/guide/2.0/en).



### Referensmaterial {#referens}

Följande används som referensmaterial i kursmomentet.

1. Du kan se hur REM-servern är uppbyggd som modul och hur den kopplar till Packagist.
    * [REM servern på GitHub](https://github.com/canax/remserver)
    * [REM servern på Packagist](https://packagist.org/packages/anax/remserver)



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*



### Övningar {#ovningar}

Gör följande övning, de förbereder dig inför uppgiften.

1. Läs och/eller jobba igenom artikeln "[Skapa en PHP-modul på Packagist och integrera med Anax (v2)](kunskap/skapa-en-php-modul-pa-packagist-och-integrera-med-anax-v2)" som visar dig hur du kan jobba med en installation av Anax när du bryter ut din modul.



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Bryt ut din kod till en modul och publicera på Packagist](uppgift/bryt-ut-din-kod-till-en-modul-och-publicera-pa-packagist)". Koden för modulen sparar du i `me/module`.

1. Pusha och tagga din me/redovisa, allt eftersom och sätt en avslutande tagg (4.0.\*) när du är klar med kursmomentet.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 2-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i momentet då redovisningstexten är aningen mer omfattande än normalt.

* Hur gick arbetet med att lyfta ut koden ur redovisa-sidan och placera i en egen modul, några svårigheter, utmaningar eller annat värt att nämna?
* Gick det bra att publicera på Packagist och ta emot uppdateringar från GitHub?
* Fungerade det smidigt att åter installera modulen i din redovisa-sida med composer, kunde du följa din egen installationsmanual?
* Hur väl lyckas du enhetstesta din modul och hur mycket kodtäckning fick du med?
* Några reflektioner över skillnaden med och utan modul?
* Vilket ramverk undersökte du och hur hanterar det ramverket paketering, moduler och versionshantering?
* Vilken är din TIL för detta kmom?

PS. Lägg in länken till modulen i din redovisningstext.

Har du frågor eller funderingar som du vill ha besvarade så ställer du dem i GitHub issues.
