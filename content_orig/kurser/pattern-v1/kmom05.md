---
author:
    - mos
revision:
    "2021-05-20": "(PA, mos) Arbete påbörjat för pattern-v1."
...
Kmom05/06: TBD
==================================

[WARNING]

**Arbete pågår**.

[/WARNING]

<!--stop-->


Tanken är att ge en bild av hur automatiserad testning och continuous integration (CI) kan fungera med en PHP modul som ligger publicerad på GitHub och Packagist.

Vi fortsätter jobba med modulen vi publicerade på GitHub och Packagist i föregående kursmoment. Vi låter externa verktyg checka ut vår kod från GitHub och köra testsuiten via `make install test`. De externa verktygen kan samtidigt analysera koden ur olika kvalitetsaspekter.

Vi bekantar oss med ett antal olika externa verktyg och försöker förstå vad de kan tillföra till en utvecklares vardag.

<!--more-->

[FIGURE src=image/snapht17/travis.png?w=w3 caption="Travis har koll på hur modulerna i Anax klarar sina automatiserade tester."]

[FIGURE src=image/snapht17/circleci.png?w=w3 caption="CircleCI är en byggmiljö likt Travis."]

[FIGURE src=image/snapht17/scrutinizer.png?w=w3 caption="Via Scrutinizer kan du få mer detaljerad information om din kod via statiskt kodanalys."]


<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*



### Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Artikeln PHP The Right Way innehåller ett kort stycke om "[Testing](http://www.phptherightway.com/#testing)", läs igenom det som en introduktion.

1. Bekanta dig med begreppet [Automatiserad testning via Wikipedia](https://en.wikipedia.org/wiki/Test_automation). Läs översiktligt och få ett grepp om de olika termer som används.

1. Bekanta dig med begreppet [Continuous integration (CI) via Wikipedia](https://en.wikipedia.org/wiki/Continuous_integration). Läs igenom så du får en känsla över vilka delar som begreppet handlar om.

1. Dokumentet "[Awesome PHP](https://github.com/ziadoz/awesome-php/blob/master/README.md)" innehåller en sektion för [Continuous integration](https://github.com/ziadoz/awesome-php/blob/master/README.md#continuous-integration) och en sektion för [Code analysis, Code Quality samt Static Analysis](https://github.com/ziadoz/awesome-php/blob/master/README.md#code-analysis). Kika snabbt på dem och fortsätt studera om något av verktygen faller dig i smaken. Det finns fler verktyg där ute, fler än de vi valt att använda i detta kmom.



### Ramverk referenser {#referenser}

Undersök hur (minst) ett av ramverken jobbar med continous integration och huruvuda de visar upp sin kodkvalitet med diverse badges. Kan du se vilken nivå av kodtäckning och kodkvalitet som är vanlig i ramverken och dess moduler?

* [Dokumentationen för Symfony](https://symfony.com/doc/current/).
* [Dokumentationen för Laravel](https://laravel.com/docs/5.7).
* [Dokumentationen för Phalcon](https://docs.phalconphp.com/en/).
* [Dokumentationen för Yii](https://www.yiiframework.com/doc/guide/2.0/en).



### Referensmaterial {#referens}

Följande används som referensmaterial i kursmomentet.

1. Du kan se hur REM-servern är uppbyggd som modul och hur den kopplas till diverse bygg- och kodkvalitetstjänster.
    * [REM servern på GitHub](https://github.com/canax/remserver)
    * [REM servern på Packagist](https://packagist.org/packages/anax/remserver)



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-16 studietimmar)*



### Övningar {#ovningar}

Gör följande övningar, de hjälper dig att förbereda inför uppgiften.

1. Jobba igenom artikeln "[Integrera din packagist modul med verktyg för automatisk test och validering](kunskap/integrera-din-packagist-modul-med-verktyg-for-automatisk-test-och-validering)" som visar dig hur du använder använder `make test` för att bygga grunden till automatiserade tester och ett CI-flöde med externa verktyg. Du kan jobba mot din egna modul för kommentarshanteringen och spara koden i `me/comment`.



### Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Utför uppgiften "[Integrera din modul med externa byggtjänster](uppgift/integrera-din-modul-med-externa-byggtjanster)". Jobba mot din modul och uppdatera din `me/redovisa` när du är klar.

1. Pusha och tagga din redovisa, allt eftersom och sätt en avslutande tagg (5.0.\*) när du är klar med kursmomentet.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 2-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i momentet då redovisningstexten är aningen mer omfattande än normalt.

* Berätta om arbetet med din CI-kedja, vilka verktyg valde du och hur gick det att integrera med dem?
* Vilken extern tjänst uppskattade du mest, eller har du förslag på ytterligare externa tjänster att använda?
* Vilken kodkvalitet säger verktygen i din CI-kedja att du har, håller du med?
* Gjorde du några förbättringar på din modul i detta kmom, isåfall vad?
* Vilket ramverk undersökte du och hur hanterar det ramverket sin CI-kedja, vilka verktyg används?
* Fann du någon nivå på kodtäckning och kodkvalitet för ramverket och dess moduler?
* Vilken är din TIL för detta kmom?

PS. Lägg in länken till modulen i din redovisningstext.

Har du frågor eller funderingar som du vill ha besvarade så ställer du dem i GitHub issues.

<!--
1. Artikel om BDD, Behat, Mink samt phpunit mink.
1. Artikel om prestandastester.
-->
