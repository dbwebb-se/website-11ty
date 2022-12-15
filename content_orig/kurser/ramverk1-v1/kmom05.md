---
author:
    - mos
revision:
    "2017-09-11": "(A, mos) Preliminär release, artikel saknas."
...
Kmom05: Modul på Packagist
==================================

Du skall skapa en fristående modul av ditt kommentarssystem och placera det i ett eget repo på GitHub. Du skall alltså lyfta bort koden från din me-sida och placera allt som modulen behöver i ett eget repo.

Du skall sedan publicera repot som en PHP modul på Packagist. När det är klart kan du åter installera modulen i din me-sida med hjälp av kommandot composer.

Du börjar införa enhetstestning på din modul.

När du är klar så har du alltså samma kodbas som från början. Men du har brutit loss en självständig del från din me-sida och gjort den till en egen fristående modul. Vi vinner förhoppningsvis en bättre kodstruktur som gör det enklare att jobba med vidareutveckling, underhåll och test.

<!--more-->


Så här ser det ut när vi submittar paketet till Packagist.

[FIGURE src=image/snapht17/packagist-submit.png?w=w2 caption="Submitta ett paket till Packagist genom att ange dess url till GitHub."]

[FIGURE src=image/snapht17/packagist-submitted.png?w=w2 caption="Nu är paketet på plats på Packagist."]



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*



###Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Artikeln PHP The Right Way innehåller ett kort stycke om "[Dependency Management](http://www.phptherightway.com/#dependency_management)", läs igenom det som en introduktion.

1. Läs om begreppet "[Sematic versioning](http://semver.org/)" som berättar hur du bör hantera versionsnummer på dina programvara.

1. Bekanta dig med webbplatsen "[Packagist](https://packagist.org/about)" och skaffa dig ett konto på webbplatsen.

1. Det skadar inte att färska upp minnet om "[dokumentationen för composer](https://getcomposer.org/doc/)" vilket kan komma till användning när du skall publicera din modul till Packagist.



<!--
###Videor {#videor}

Kika på följande videos.

1. Titta på seminariet?
-->



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Skapa en PHP-modul på Packagist och integrera med Anax](kunskap/skapa-en-php-modul-pa-packagist-och-integrera-med-anax)" som visar dig hur du skapar en egen PHP-modul som du kan installera med kommandot `composer`. Du sparar koden i `me/kmom05/anax5`.

<!--
1. Jobba igenom artikeln "[Validera och enhetstesta din modul](kunskap/XXX)" som visar hur du kan införa lokala tester i din modul. 
-->



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Utför uppgiften "[Skapa en PHP-modul och publicera på GitHub och Packagist](uppgift/skapa-en-php-modul-och-publicera-pa-github-och-packagist)". Du kan spara källkoden till din modul i `me/comment`.

1. Gör uppgiften "[Integrera me-sidan med egen kommentarsmodul från Packagist](uppgift/integrera-me-sidan-med-egen-kommentarsmodul-fran-packagist)". Du får använda den modulen som du nyligen publicerat på Packagist och installera den med composer i din me-sida. Koden uppdaterar du i `me/anax`.

1. Pusha och tagga ditt Anax, allt eftersom och sätt en avslutande tagg (5.0.\*) när du är klar med alla uppgifter i kursmomentet.

<!--
1. Skriv gruppvis en artikel om ["Testdriven development (TDD)"](uppgift/skriv-artikel-om-tdd). Spara artikeln i din me-sida.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 2-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Hur gick arbetet med att lyfta ut koden ur me-sidan och placera i en egen modul?
* Flöt det på bra med GitHub och kopplingen till Packagist?
* Hur gick det att åter installera modulen i din me-sida med composer, kunde du följa du din installationsmanual?
* Hur väl lyckas du enhetstesta din modul och hur mycket kodtäckning fick du med?
* Några reflektioner över skillnaden med och utan modul?

Har du frågor eller funderingar så ställer du dem i forumet.
