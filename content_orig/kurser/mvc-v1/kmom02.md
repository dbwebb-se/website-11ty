---
author:
    - mos
revision:
    "2021-05-26": "(B, mos) Läsresurs om semantisk versionshantering."
    "2021-04-02": "(A, mos) Första utgåvan i mvc-v1."
...
Kmom02: Controller
==================================

Vi skall introducera C:et i MVC, Controller. Vi bygger om vår befintliga kod så att den använder sig av controllers och sedan bygger vi vidare med fler klasser för att konstruera ett tärningsspel Yatzy.

I samband med att vi börjar med controllers så inkluderar vi ett par externa moduler till vårt miniramverk. Det handlar om en router och klasser för att hantera request och response. Detta blir en insyn i hur man kan bygga upp ett ramverk via standardiserade moduler där varje modul kan vara utbytbar förutsatt att den uppfyller ett visst interface.

Apropå interface så kikar vi mer på objektorienterade konstruktioner i PHP där vi tar upp arv, komposition, interface och trait.

Vi tar också hjälp av allmän problemlösning i form av top-down/bottom-up, pseudokod och flödesdiagram och använder det för att bygga upp och designa flödet i vårt Yatsy-spel.

<small><i>Detta är instruktionen för kursmomentet och omfattar cirka **20 studietimmar**. Fokus ligger på uppgifter som du skall lösa och redovisa. För att lösa uppgifterna behöver du normalt jobba igenom övningar och läsanvisningar för att skaffa dig rätt kunskap och förståelse av uppgiftens alla delar. Läs igenom hela kursmomentet innan du börjar jobba.</i></small>

<!-- more -->



Uppgifter & Övningar {#uppgifter_ovningar}
-------------------------------------------

*(ca: 10-14 studietimmar)*

Uppgifter skall utföras och redovisas, övningar är träning inför uppgifterna.



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas.

1. Lös uppgiften "[Bygg Controller i PHP enligt MVC](uppgift/bygg-controller-i-php-enligt-mvc)".



### Övningar {#ovningar}

Det finns inga övningar i detta kursmoment.

<!-- Jobba igenom övningarna, de förbereder dig inför uppgifterna. -->



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*

För att lösa uppgifterna och redovisningen bör du studera enligt följande.



### Föreläsning {#flas}

Titta igenom följande föreläsningar.



#### Problemlösning och design av algoritmer för programmerare {#f1}

Om modeller och representation av algoritmer samt generellt om problemlösning. Vi tittar på olika metoder för att lösa problem och strukturera algoritmer när vi bygger program och applikationer. Begrepp som hanteras är bland annat Polya problem solving, top-down, bottom-up, flowchart och pseudocode.

Slides till föreläsningen "[Problemlösning och design av algoritmer för programmerare](https://dbwebb-se.github.io/mvc/lecture/L02-algorithms/slide.html)".

[YOUTUBE src="RJ5HKgZZs6w" width=700 caption="Problemlösning och design av algoritmer för programmerare (med Mikael)."]



#### Klasser och objekt i PHP - arv, komposition, interface och trait {#f2}

Fortsättning med objekt och klasser i PHP. Vi studerar konstrukturer för arv, komposition, interface och trait. Vi pratar också om hur man skall tänka när man kodar objektorienterat och vad som är god kodsed och riktlinjer när man designar och implementerar sina klasser.

Slides till föreläsningen "[Classes and Objects (PHP) - Inheritance, composition, interface, trait](https://dbwebb-se.github.io/mvc/lecture/L02-arv-och-komposition/slide.html)".

[YOUTUBE src="n3dC2E4zACM" width=700 caption="Arv, komposition, interface, trait i PHP (med Mikael)."]



### Litteratur  {#litteratur}

1. I detta kursmoment behandlas bland annat följande delar utifrån manualen om "[Classes and Objects](https://www.php.net/manual/en/language.oop5.php)".

    * [Object Inheritance](https://www.php.net/manual/en/language.oop5.inheritance.php)
    * [Object Interfaces](https://www.php.net/manual/en/language.oop5.interfaces.php)
    * [Traits](https://www.php.net/manual/en/language.oop5.traits.php)

1. I guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)" finns följande stycke att studera (du behöver inte görea exempelprogrammen i guiden).

    * [Arv och Komposition](guide/kom-igang-med-objektorienterad-programmering-i-php/arv-och-komposition)
    * [Trait och Interface](guide/kom-igang-med-objektorienterad-programmering-i-php/trait-och-interface)



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa). Observera att denna kursen skiljer sig från hur du normalt sett lämnar in din redovisningstext.

Se till att följande frågor besvaras i texten i din rapport:

* Berätta på vilket sätt du drog nytta, eller inte, av att modellera din lösning med flödesdiagram och psuedokod. Använder du dig av top-down eller bottom-up när du planerar din kod?

* Förklara kort de objektorienterade konstruktionerna arv, komposition, interface och trait och hur de används i PHP.

* Berätta om ditt spel från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd, vilken förbättringspotential ser du i koden/spelet, var uppgiften svårt/enkelt/utmanande, håller din kod god/hög kvalitet?

* Hur känner du för den kodstruktur som växer fram, tycker du det blev snyggare kod med modulerna router och request och hur vi jobbade med controllers eller vad är din syn på det?

* Vilken är din TIL för detta kmom?



Resurser bra-att-ha {#resurser}
---------------------------------

Här anges övriga resurser som kan användas för vidare studier i det som kursmomentet omfattar.



### Om design av algoritmer {#algo}

Via följande resurser kan du fördjupa dig i metoder för problemlösning.

* Artikel "[Polya’s Problem Solving Techniques](https://math.berkeley.edu/~gmelvin/polya.pdf)" om hur man kan tänka när man löser problem.
* Artikel "[Pseudocode Standard](http://users.csc.calpoly.edu/~jdalbey/SWE/pdl_std.html)" om exempel på hur man skriver pseudokod.

Wikipedia har artiklar om följande.

* [Top-down and bottom-up design](https://en.wikipedia.org/wiki/Top-down_and_bottom-up_design)
* [Flowchart](https://en.wikipedia.org/wiki/Flowchart)
* [Pseudocode](https://en.wikipedia.org/wiki/Pseudocode)

Verktyg för att rita flödesdiagram.

* [App.diagrams.net](https://app.diagrams.net/) är ett online ritverktyg där du kan rita flödesscheman utan att installera en applikation.

* [Dia Diagram Editor](http://dia-installer.de/) är en desktopapplikation som kan installeras på din dator. Det är gratis, öppen källkod och plattform.

    * Så här kan [ett flödesschema se ut i Dia](http://dia-installer.de/shapes/Flowchart/index.html.en).



### Standardisering och PHP-FIG {#phpfig}

PHP-FIG är ett standardiseringsorgan för att skapa standarder för PHP och moduler för PHP-baserade ramverk.

I detta kursmoment berör vi moduler som har implementerat följande standarder.

* [PSR-7 HTTP Message Interface](https://www.php-fig.org/psr/psr-7)
* [PSR-15 HTTP Handlers](https://www.php-fig.org/psr/psr-15)
* [PSR-17 HTTP Factories](https://www.php-fig.org/psr/psr-17)



### Router till ramverket {#router}

Vi använder en modul för routern [FastRoute - Fast request router for PHP](https://github.com/nikic/FastRoute).

Det finns en bloggartikel som förklarar hur routern är implementerad, "[Fast request routing using regular expressions](https://www.npopov.com/2014/02/18/Fast-request-routing-using-regular-expressions.html)".



### Request och Response till ramverket {#reqresp}

Vi använder en modul för att hantera response-objektet, "[PSR-7 implementation](https://github.com/Nyholm/psr7)". I den modulen finns även stöd för att hantera ett request-objekt och att skapa länkar.

För att skicka tillbaka response-objektet använder vi en emitter via modulen "[laminas-httphandlerrunner](https://github.com/laminas/laminas-httphandlerrunner)".



### Controller i ramverk {#controller}

Hur controllers implementeras och konfigureras i ramverk kan skilja åt i detaljer men grundprincipen med en controller-klass är densamma.

Här är ett par olika implementationer i PHP ramverk.

* [Symfony Controller](https://symfony.com/doc/current/controller.html)
* [Laravel Controller](https://laravel.com/docs/8.x/controllers)
* [Yii Controller](https://www.yiiframework.com/doc/guide/2.0/en/structure-controllers)
* [Phalcon Controller](https://docs.phalcon.io/4.0/nl-nl/controllers)



<!--
### Model, View, Controller (MVC) {#mvc}

MVC pattern
-->



### Git Workflow {#gitflow}

Att jobba med branches när man utvecklar sin kod kan göra det enklare att jobba många i samma repo och även när man är ensam kan det underlätta att hålla ordning och reda samt att man alltid har fungerande kod i sin mainbranch.

Här kan du läsa om ett par alternativa sätt att jobba med branches för ny kod.

* "[Introduction to GitLab Flow](https://docs.gitlab.com/ee/topics/gitlab_flow.html)"
* "[Understanding the GitHub flow](https://guides.github.com/introduction/flow/)"
* "[Git Feature Branch Workflow](https://www.atlassian.com/git/tutorials/comparing-workflows/feature-branch-workflow)"
* "[Gitflow Workflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow)"



### Semantisk versionshantering {#version}

I dokumentet om "[Semantisk versionshantering 2.0.0](https://semver.org/lang/sv/)" kan man läsa hur man kan tänka när man sätter en viss version med ett versionsnummer på din kod. Dokumentet visar och ger en innebörd till vad de olika siffrorna betyder i ett sammanhang.



<!--
### Modellering och UML {#uml}

När man pratar om objektorienterad programmering så underlättar det om man har en viss bas i objektorienterad modellering. Därför kan du läsa kort om UML, "Unified Modelling Language". En bra plats att starta är någon av följande:
    * Andreas artikel "[Vad är UML?](kunskap/vad-ar-uml)" som är en del av kursen oopython.
    * [Wikipedia om UML](http://en.wikipedia.org/wiki/Unified_Modeling_Language).
-->
