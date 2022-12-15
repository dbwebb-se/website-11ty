---
author:
    - mos
revision:
    "2021-05-20": "(PA, mos) Arbete påbörjat för pattern-v1."
...
Kmom03/04: TBD
==================================

[WARNING]

**Arbete pågår**.

[/WARNING]

<!--stop-->


Vi skall titta på tekniker som kan sammafattas med Dependency Injection (DI). Dessa tekniker används för att skapa en grundläggande struktur i ramverket avseende hur man lägger till "tjänster" i ramverket. Det handlar om `$di`.

Vi skall titta på begreppet Dependency Injection och några begrepp som är närliggande, begrepp såsom service locator, service container och lazy loading. Det handlar om designmönster och vanliga sätt att strukturera sin kod enligt det som kan betraktas som god programmeringssed.

I uppgiften jobbar vi vidare med information baserad på geografisk position och vi använder en extern vädertjänst för att hämta och presentera kommande och föregående väder för en viss position. Någon del av din kod lägger du in som en tjänst i ramverket och instansierar via $di.

<!--more-->



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*



### Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Artikeln PHP The Right Way innehåller ett stycke om "[Dependency Injection](http://www.phptherightway.com/#dependency_injection)", läs igenom det som en introduktion till begreppet.

1. Bekanta dig med begreppet Dependecy Injection (DI) genom att översiktligt titta på [Wikipedia om DI](https://en.wikipedia.org/wiki/Dependency_injection).

1. Bekanta dig med begreppet Service Locator genom att översiktligt titta på [Wikipedia om Service locator pattern](https://en.wikipedia.org/wiki/Service_locator_pattern).

1. Bekanta dig med begreppet Lazy Loading genom att översiktligt titta på [Wikipedia om Lazy loading](https://en.wikipedia.org/wiki/Lazy_loading).

1. Kika kort och översiktligt på rekommendationen [PSR-11: Container Interface på PHP-FIG](http://www.php-fig.org/psr/psr-11/). Den erbjuder en rekommendation om vilket interface en DI kontainer skall implementera. Tanken är att låta programmeraren själv välja implementation för DI kontainer i sitt ramverk.

1. Om du verkligen är intresserad av koncepten i kursmomentet så läser du artikeln "[Inversion of Control Containers and the Dependency Injection pattern](https://martinfowler.com/articles/injection.html)", skriven av Martin Fowler 2004. Han diskuterar begreppen och försöker sortera ut vad som är vad.

1. Martin har även en kortare artikeln om "[Inversion of control](https://martinfowler.com/bliki/InversionOfControl.html)" där hans exempel är ett ramverk. Artikeln ger en tydlig förklaring till begreppet som det kan tolkas i vårt sammanhang.



### Anax {#anax}

Kika över modulen `anax/di` som är implementationen bakom `$di` i ramverket för din me/redovisa. Läs igenom README-filen och kolla gärna implementationen av koden. Se om du kan finna hur interfacen för PSR-11 används.

* [Packagist anax/di](https://packagist.org/packages/anax/di).
* [Github anax/di](https://github.com/canax/di).



### Ramverk referenser {#referenser}

Titta i (minst) en av manualerna för att se vad den beskriver om hur ramverket använder (eller inte) en service kontainer likt `$di`.

* [Dokumentationen för Symfony](https://symfony.com/doc/current/).
* [Dokumentationen för Laravel](https://laravel.com/docs/5.7).
* [Dokumentationen för Phalcon](https://docs.phalconphp.com/en/).
* [Dokumentationen för Yii](https://www.yiiframework.com/doc/guide/2.0/en).



### Videor {#videor}

Kika på följande videos.

1. Titta på en [5 minuters förklaring till Dependency Injection](https://www.youtube.com/watch?v=IKD2-MAkXyQ) med Anthony Ferrara. Video ger en mycket bra introduktion till begreppet.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[En webbtjänst för att visa väderprognos och historiskt väder](uppgift/en-webbtjanst-for-att-visa-vaderprognos-och-historiskt-vader)". Spara koden under `me/redovisa`.

1. Pusha och tagga din redovisa, allt eftersom och sätt en avslutande tagg (3.0.\*) när du är klar med kursmomentet.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 2-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i momentet då redovisningstexten är aningen mer omfattande än normalt.

* Hur känns det att jobba med begreppen kring $di?
* Ge din egna korta förklaring, ett kort stycke, om dependency injection, service locator och lazy loading. Berätta gärna vilka källor du använde för att lära dig om begreppen.
* Berätta hur andra ramverk (minst 2) använder sig av koncept som liknar $di. Liknar det "vårt" sätt?
* Berätta lite om hur du löste uppgiften, till exempel vilka klasser du gjorde, om du gjorde refaktoring på äldre klasser och vad du valde att lägga i $di.
* Har du någon reflektion kring hur det är att jobba med externa tjänster (ipvalidering, kartor, väder)?
* Vilken är din TIL för detta kmom?

Har du frågor eller funderingar som du vill ha besvarade så ställer du dem i GitHub issues.
