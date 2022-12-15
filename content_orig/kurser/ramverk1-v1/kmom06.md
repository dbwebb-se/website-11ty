---
author:
    - mos
revision:
    "2017-10-02": "(A, mos) Första utgåvan."
...
Kmom06: CI
==================================

Tanken är att ge en bild av hur automatiserad testning och continuous integration (CI) fungerar mot en PHP modul som ligger publicerad på GitHub och Packagist.

Vi fortsätter jobba mot modulen vi publicerade på GitHub och Packagist i föregående kursmoment. Vi använder de tester som körs via `make install test` för att låta externa verktyg checka ut vår kod och exekvera testerna och analysera koden ur olika aspekter.

Vi bekantar oss med ett antal olika externa verktyg och försöker förstå vad de kan tillföra till en utvecklares vardag.

<!--more-->

[FIGURE src=image/snapht17/travis.png?w=w2 caption="Travis har koll på hur modulerna i Anax klarar sina automatiserade tester."]

[FIGURE src=image/snapht17/circleci.png?w=w2 caption="CircleCI är en byggmiljö likt Travis."]

[FIGURE src=image/snapht17/scrutinizer.png?w=w2 caption="Via Scrutinizer kan du få mer detaljerad information om din kod via statiskt kodanalys."]


<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*



###Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Artikeln PHP The Right Way innehåller ett kort stycke om "[Testing](http://www.phptherightway.com/#testing)", läs igenom det som en introduktion.

1. Bekanta dig med begreppet [Automatiserad testning via Wikipedia](https://en.wikipedia.org/wiki/Test_automation). Läs översiktligt och få ett grepp om de olika termer som används.

1. Bekanta dig med begreppet [Continuous integration (CI) via Wikipedia](https://en.wikipedia.org/wiki/Continuous_integration). Läs igenom så du får en känsla över vilka delar som begreppet handlar om.

1. Dokumentet "[Awesome PHP](https://github.com/ziadoz/awesome-php/blob/master/README.md)" innehåller en sektion för [Continuous integration](https://github.com/ziadoz/awesome-php/blob/master/README.md#continuous-integration) och en sektion för [Code analysis](https://github.com/ziadoz/awesome-php/blob/master/README.md#code-analysis). Kika snabbt på dem och fortsätt studera om något av verktygen faller dig i smaken. Det finns fler verktyg där ute, än de vi valt att använda.



###Videor {#videor}

Kika på följande videor.

1. Titta på [kursens spellista](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-IxTc7j499fXMJ9tMOpTHH) och de videor som börjar med 6, de är kopplade till detta kursmoment.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Integrera din packagist modul med verktyg för automatisk test och validering](kunskap/integrera-din-packagist-modul-med-verktyg-for-automatisk-test-och-validering)" som visar dig hur du använder använder `make test` för att bygga grunden till automatiserade tester och ett CI-flöde med externa verktyg. Du kan jobba mot din egna modul för kommentarshanteringen och spara koden i `me/comment`.

<!--
1. Artikel om BDD, Behat, Mink samt phpunit mink.
-->



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Utför uppgiften "[Integrera din modul med externa byggtjänster](uppgift/integrera-din-modul-med-externa-byggtjanster)". Jobba mot din modul i `me/comment` och när du är klar så gör du `composer update` i din `me/anax`.

1. Pusha och tagga ditt Anax, allt eftersom och sätt en avslutande tagg (6.0.\*) när du är klar med alla uppgifter i kursmomentet.

<!--
1. Utöka testbasen, inklusiva BDD.

1. Generera dokumentation för modulen med phpdoc.

1. Mer kodanalys via fler validatorer?
-->


<!--
1. Skriv gruppvis en artikel om ["Continous Integration (CI)"](uppgift/skriv-artikel-om-ci). Spara artikeln i din me-sida.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 2-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Har du någon erfarenhet av automatiserade testar och CI sedan tidigare?
* Hur ser du på begreppen, bra, onödigt, nödvändigt, tidskrävande?
* HUr stor kodtäckning lyckades du uppnå i din modul?
* Berätta hur det gick att integrera mot de olika externa tjänsterna?
* Vilken extern tjänst uppskattade du mest, eller har du förslag på ytterligare externa tjänster att använda?

Har du frågor eller funderingar så ställer du dem i forumet.
