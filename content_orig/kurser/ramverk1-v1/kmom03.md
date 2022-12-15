---
author:
    - mos
revision:
    "2017-09-11": "(C, mos) Eget dokument till uppgiften och förtydligade att man kan påbörja funderingarna kring en databas."
    "2017-09-04": "(B, mos) Bort med skrivuppgift och flytta User CRUD till kmom04."
    "2017-08-11": "(A, mos) Första utgåvan."
...
Kmom03: DI
==================================

Vi skall titta på tekniker som kan sammafattas med Dependency Injection (DI). Dessa tekniker används för att skapa en grundläggande struktur i ramverket avseende hur man lägger till "tjänster" och moduler in i ramverket. Hittills har vi använt `$app` som en kontainer för alla tjänster som finns i ramverket. Nu skall vi introducera `$di`.

Vi skall undersöka hur ramverket ser ut när vi använder Anax DI för att sätta grundstrukturen i ramverket. Vi vill ha en flexibilitet när vi utökar ramverket och lägger till nya moduler. Hittills har vi gjort detta i frontkontrollern `index.php` och i `config/service.php` men kanske kan vi finna ett alternativt sätt som är bättre när antalet moduler växer. Vi skall utvärdera hur DI kontainern eventuellt kan förbättra strukturen.

Vi skall titta på begreppet Dependency Injection och några begrepp som är närliggande, begrepp såsom service locator, service container och lazy loading. Det handlar om designmönster och vanliga sätt att strukturera sin kod enligt det som betraktas som god programmeringssed.

När vi lärt oss grunden i begreppen så använder vi dem för att bygga vår kod. Samtidigt funderar vi på om det är en god kodstruktur vi uppnår, vi vill ha ett modulärt system och vi vill helst att varje modul skall vara oberoende av de andra, eller beroende av så få som möjligt och dess beroenden skall _injectas_ in i respektive modul.

<!--more-->



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*



###Artiklar {#artiklar}

Kika igenom följande artiklar.

1. Artikeln PHP The Right Way innehåller ett stycke om "[Dependency Injection](http://www.phptherightway.com/#dependency_injection)", läs igenom det som en introduktion till begreppet.

1. Bekanta dig med begreppet Dependecy Injection (DI) genom att översiktligt titta på [Wikipedia om DI](https://en.wikipedia.org/wiki/Dependency_injection).

1. Bekanta dig med begreppet Service Locator genom att översiktligt titta på [Wikipedia om Service locator pattern](https://en.wikipedia.org/wiki/Service_locator_pattern).

1. Bekanta dig med begreppet Lazy Loading genom att översiktligt titta på [Wikipedia om Lazy loading](https://en.wikipedia.org/wiki/Lazy_loading).

1. Kika kort och översiktligt på rekommendationen [PSR-11: Container Interface på PHP-FIG](http://www.php-fig.org/psr/psr-11/). Den erbjuder en rekommendation om vilket interface en DI kontainer skall implementera. Tanken är att låta programmeraren själv välja DI kontainer i sitt ramverk.



###Videor {#videor}

Kika på följande videos.

1. Titta på en [kort kort intro till Dependency Injection](https://www.youtube.com/watch?v=IKD2-MAkXyQ) med Anthony Ferrara. Vdeo ger en mycket bra introduktion till begreppet.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Anax med dependency injection](kunskap/anax-med-dependency-injection)" som visar dig hur du använder begreppet DI i Anax. Du sparar koden i `me/kmom03/anax3`.

1. Jobba igenom artikeln "[Att konfigurera routern i Anax](kunskap/att-konfigurera-routern-i-anax)" som bygger vidare på användning av dependency injection genom att förändra hur konfigurering av routern sker. Du sparar koden i `me/kmom03/anaxr`.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Refactoring av din me-sida. Uppdatera din me-sida i `me/anax`, inklusive den REM server du har integrerat. Se till att den använder tekniker för Anax DI och `$di`. Det finns inte längre någon anledning att injecta `$app`, utgå istället från `$di`. Uppdatera även hur du konfigurerar dina routes, så att du gör som i övningen.

1. Utför uppgiften "[Databasmodell för kommentarssystem](uppgift/databasmodell-for-kommentarssystem)" som låter dig bygga vidare på ditt kommentarssystem och förbereda för att lägga till användarhantering genom att fundera igenom en databasmodell. I nästa kmom kommer databas och CRUD, så förebered vad du kan och tänk igenom din struktur. Se till att du använder `$di` och inte `$app` samt använd senaste strukturen av routern. Spara koden under `me/anax`.

1. Pusha och tagga ditt Anax, allt eftersom och sätt en avslutande tagg (3.0.\*) när du är klar med alla uppgifter i kursmomentet.

<!--
1. Skriv gruppvis en artikel om ["Dependency Injection (DI)"](uppgift/skriv-artikel-om-di). Spara artikeln i din me-sida.
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 2-4 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Hur känns det att jobba med begreppen kring dependency injection, service locator och lazy loading?
* Hur känns det att göra dig av med beroendet till `$app`, blir `$di` bättre?
* Hur känns det att återigen göra refaktoring på din me-sida, blir det förbättringar på kodstrukturen, eller bara annorlunda?
* Lyckades du införa begreppen kring DI när du vidareutvecklade ditt kommentarssystem?
* Påbörjade du arbetet (hur gick det) med databasmodellen eller avvaktar du till kommande kmom?
* Allmänna kommentarer kring din me-sida och dess kodstruktur?

Har du frågor eller funderingar så ställer du dem i forumet.
