---
author:
    - mos
revision:
    "2022-04-12": "(B, mos) Länk till linters och not om problemlösning till kmom03."
    "2022-04-11": "(A, mos) Första utgåvan i mvc-v2."
...
Kmom03: Applikation
==================================

Vi jobbar vidare med klasser och objekt i PHP och bygger en applikation i ramverket Symfony. Detta kursmomentet blir som ett litet miniprojekt där vi problemlöser, designar och implementerar en applikation med objektorienterade konstruktioner enligt MVC.

Vi jobbar med kodstil, kodstrukturer och vi försöker bygga vår kod så bra som möjligt enligt de riktlinjer som finns för snygg kod. Till vår hjälp tar vi ett antal kodlinters som ger oss rekommendationer om hur koden skall skrivas.

<!-- more -->


<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 1-2 studietimmar)*

För att lösa uppgifterna och redovisningen bör du studera enligt följande.



### Föreläsning {#flas}

Titta igenom följande föreläsningar.

1. [Problemlösning och design av algoritmer för programmerare](./../forelasning/problemlosning-och-design-av-algoritmer) som visar på olika arbetssätt i hur man kan jobba med problemlösning innan man sätter igång och programmerar. (Flyttad från kmom02 till kmom03).

1. [Hur tänka kring objektorientering och principer om snygg kod?](./../forelasning/hur-tanka-kring-objectorientering-och-snygg-kod) som visar på designprinciper och terminologi som hjälper oss att tänka kring hur vi skapar bra och snygg kod. Inspelad från veckans tisdags-zoom.

<!--
https://blog.ndepend.com/lack-of-cohesion-methods/
software hierarchy of needs
-->



### Litteratur  {#litteratur}

Läs enligt följande.

1. En resurs som hjälper att förstå vad som menas med "Clean Code" i PHP är "[Clean Code PHP](https://github.com/jupeter/clean-code-php)". Det handlar om riktlinjer som hjälper dig att skapa god kod i PHP.

1. I dokumentet [PHP The Right Way](http://www.phptherightway.com/), finns en sektion som berör konceptet "Dependency Injection". Läs igenom den.

    * [PHP The Right Way: Dependency Injection](https://phptherightway.com/#dependency_injection)



### Git och skriva bra commits {#gitcommit}

Det kan vara en konst att skriva bra commit-meddelande så att man får en bra historik när man tittar på koden via ens commits.

* Läs artikeln "[How to Write a Git Commit Message](https://chris.beams.io/posts/git-commit/)" för att få sju gyllene regler som kan hjälpa dig till bättre commit-meddelanden.

<!--
Flytta till kmom02, nu är artikeln även nämnd i uppgiften till kmom02.
-->



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*

Jobba igenom övningar för att träna. Uppgifterna skall utföras och redovisas.



### Övningar {#ovningar}

Det finns inga övningar.

<!-- Jobba igenom övningarna, de förbereder dig inför uppgifterna. -->



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas.

1. Det finns en tutorial "[Get going with code linters in PHP](https://github.com/dbwebb-se/mvc/tree/main/example/php-linter-and-mess-detection)" i ditt kursrepo under `example/example/php-linter-and-mess-detection` som hjälper dig att komma igång med ett par verktyg för "code linting and mess detection" som ger dig råd om hur du kan städa upp din kod.

1. Lös uppgiften "[Bygg kortspel i PHP och Symfony enligt MVC](uppgift/bygg-kortspel-i-php-och-symfony-enligt-mvc)". Spara dina filer under `me/report` och bygg vidare på den webbplatsen.

<!--
* Cards in 5x5 (Poker square)
* Dice 5x5 (Dice square) (inkl highscore och histogram)

Poker i en 5x1 ish patiens? Mer logik krävs?

Jobba mer med histogram och statistik för att få fler klasser och fler konstruktioner (trait, interface) samt jobba med visuella diagram.
-->


Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i din redovisningstext.

* Berätta hur det kändes att modellera ett kortspel med flödesdiagram och psuedokod. Var det något som du tror stödjer dig i din problemlösning och tankearbete för att strukturera koden kring en applikation?

* Berätta om din implementation från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd, vilken förbättringspotential ser du i din koden, dina klasser och applikationen som helhet?

* Vilken är din känsla för att koda i ett ramverk som Symfony, så här långt in i kursen?

* Vilken är din TIL för detta kmom?
