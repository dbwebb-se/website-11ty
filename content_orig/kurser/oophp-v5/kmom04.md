---
views:
    flash:
        region: flash
        template: default/image
        data:
            src: "img/snapvt19/oophp-kmom04-flash.svg"
author:
    - mos
revision:
    "2019-04-23": "(D, mos) Genomgång samt uppgift om controller."
    "2018-09-24": "(C, mos) Mindre genomgång."
    "2018-04-16": "(B, mos) Uppdaterad till oophp v4."
    "2017-04-18": "(A, mos) Första utgåvan."
...
Kmom04: Trait och Interface
==================================

Vi fortsätter med kodande, kodningsstrukturer, testbar kod, enhetstester och objektorienterade konstruktioner i PHP.

Med hjälp av ramverkets struktur flyttar vi vårt 100-spel in i en kontroller-klass som bildar ett gränssnitt mellan ramverkets kärna (klienten) och applikationens kod (100-spelet).

Med en kontroller-klass vinner vi en bättre struktur av våra routes och dessutom hamnar de i en klass som är enklare att testa än de routes med callbacks vi haft tidigare.

Vi jobbar mer och mer att integrera oss i de möjligheter som ramverket ger. Vi använder ramverkets klasser för att få tillgång till GET, POST och SESSION. Tanken är att vi inte skall ha tillgång till dessa globala variabler på ett godtyckligt sätt i varje klass, istället knyter vi accessen till dessa globala PHP systemvariabler via ramverkets klasser. En tanke är att göra det enklare att testa koden genom att mocka värden i dessa globala variabler.

Trait och interface är två objektorienterade konstruktioner som kan användas för att strukturera sin kod på ett objektorienterat sätt. Det ger oss två nya verktyg för att tänka när vi implementerar koden. När vi tittar på hur kontroller-klassen är specificerad så ser vi hur ramverket använder sig av dessa konstruktioner.

Erfarenheterna från trait och interface använder vi för att vidareutveckla vårt 100-spel med intelligens när vi spelar mot datorn som spelare.

Vi tittar även kort på objektorienterade konstruktioner såsom abstrakta klasser och generalisering av typer.

När detta är gjort så bygger vi vidare på testsuiten för våra klasser, inklusive kontroller-klassen och vi gör `make test` inuti ramverket.

<!-- more -->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 3-6 studietimmar)*



### Artiklar {#artiklar}

Läs följande.

1. Vi skall fördjupa oss i ett par objektorienterade konstruktioner. Vi kan läsa om dessa i PHP-manualen "[Klasser och Objekt](http://php.net/manual/en/oop5.intro.php)". Börja med att studera dessa i manualen.
    * [Static Keyword](https://www.php.net/manual/en/language.oop5.static.php)
    * [Class Abstraction](https://www.php.net/manual/en/language.oop5.abstract.php)
    * [Object Interfaces](https://www.php.net/manual/en/language.oop5.interfaces.php)
    * [Traits](https://www.php.net/manual/en/language.oop5.traits.php)
    * [Anonymous classes](https://www.php.net/manual/en/language.oop5.anonymous.php#language.oop5.anonymous)



### Enhetstestning {#test}

Läs följande.

1. På StackOverflow/StackExchange finns följande funderingar och frågor om enhetstestning besvarade, läs frågorna och de olika svaren för att skapa dig en bild av vad programmerare generellt anser om enhetstestning.
    * "[Is Unit Testing worth the effort?](https://stackoverflow.com/questions/67299/is-unit-testing-worth-the-effort)"
    * "[Why would you write unit-tests for controllers?](https://softwareengineering.stackexchange.com/questions/338420/why-would-you-write-unit-tests-for-controllers)"



### Objektorientering {#oo}

Läs följande.

1. Läs igenom den korta artikeln "[Martin Fowler: Tell Dont Ask](https://martinfowler.com/bliki/TellDontAsk.html)" som ger en insikt i objektorienterat tänkade och hur man delvis kan tänka när man strukturerar sina objekt och var man väljer att lägga sin kod.



### Ramverk Anax {#anax}

Vi fortsätter att jobba med modulerna i ramverket Anax, du kan några av dem sedan tidigare och i detta kursmomentet tillkommer moduler `anax/commons` och `anax/controller`. Använd respektive moduls README som referensdokumentation.

Modulen `anax/commons` innehåller "limmet" som knyter ihop olika Anax moduler och det finns flera andra Anax moduler som är beroende av denna.

Modulen `anax/controller` ger dig ett par exempel till hur en kontroller-klass kan utformas.

* [anax/commons](https://github.com/canax/commons)
* [anax/controller](https://github.com/canax/controller)
* [anax/request](https://github.com/canax/request)
* [anax/response](https://github.com/canax/response)
* [anax/router](https://github.com/canax/router)
* [anax/session](https://github.com/canax/session)
* [anax/view](https://github.com/canax/view)



### Video {#video}

Det finns generellt kursmaterial i video form.

1. Kursen innehåller genomgångar och föreläsningar som spelas in (streamas) och därefter läggs i en spellista. Du kan nå spellistan på "[oophp streams vt19](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-igucRSQ6tFYg9x8to5HiE)".

1. Uppgifter och övningar kan innehålla extra videomaterial i form av spellistor kopplade till respektive artikel. Ofta syns dessa videor i inledningen av artikeln.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-14 studietimmar)*



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. I guiden "[Kom igång med Objektorienterad programmering i PHP](guide/kom-igang-med-objektorienterad-programmering-i-php)"jobbar du igenom följande del. Spara koden i `me/guide`.
    * [Trait och Interface](guide/kom-igang-med-objektorienterad-programmering-i-php/trait-och-interface)

1. Gör uppgift "[Uppdatera 100-spelet med intelligens och kontroller](uppgift/uppdatera-100-spelet-med-intelligens-och-kontroller)" och spara filerna i `me/redovisa`.

1. Pusha och tagga ditt repo `me/redovisa` allt eftersom och sätt en avslutande tagg (4.0.\*) när du är klar med alla uppgifter och redovisningstext i kursmomentet. Gör även en avslutande `make test` som en sista avstämning, innan du sätter sista taggen.

<!--
Guiden saknar
* magisk metoder
* abstrakt klass
* Generalisering av typer
* static

Howto controller-klassen
README router, controller

Bygg labb där man övar på begreppen?
Eller bygg ut guiden så att övningen finns i guiden?

-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Vilka är dina tankar och funderingar kring trait och interface?
* Är du sedan tidigare bekant med begreppet kontroller eller är det nytt och oavsett vad, hur känner du inför begreppet?
* Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?
* Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?
* Berätta hur väl du lyckades med `make test` inuti ramverket och hur väl du lyckades att testa din kod med enhetstester (med eller utan kontrollerklassen) och vilken kodtäckning du fick.
* Vilken är din TIL för detta kmom?
