---
views:
    flash:
        region: flash
        template: default/image
        data:
            src: "img/snapvt19/oophp-kmom03-flash.svg"
author:
    - mos
    - lew
revision:
    "2019-04-12": "(D, mos) Uppdaterad inför v5, mer läsanvisningar och uppdaterade uppgifter."
    "2018-09-10": "(C, mos) Flyttad tärningsspel från kmom02."
    "2018-04-03": "(B, mos) Omarbetad inför oophp v4."
    "2017-04-07": "(A, mos) Första utgåvan."
...
Kmom03: Enhetstestning 
==================================

Vi jobbar vidare med klasser och objekt och denna gången tittar vi på hur klasser kan enhetstestas med verktyget PHPUnit. PHPUnit är ett av de verktyg som vanligen används inom PHP för att utföra enhetstestning av koden.

Vi har tidigare pratat om begreppet inkapsling och att klasserna skall erbjuda ett publikt API, ett gränssnitt för användaren av klassen. Samtidigt vill vi skydda den interna implementationen inuti klassen. Vi vill låta användaren av vår klass ha ett tydligt gränssnitt, men inuti klassen vill vi själva bestämma hur vi implementerar klassens detaljer, utan att påverka/påverkas av det publika gränssnittet.

Liknande begrepp använder vi i enhetstestning. Vi ser varje klass som en enhet som skall testas och vi testar klassen via dess publika gränssnitt vilket är de metoder vi når som användare av klassen, dess publika metoder. När vi testar så är vi fullt medvetna om hur klassen är uppbyggd. Vi kallar det för _white box testing_, vi har tillgång till klassens källkod när vi skriver testfallen och vi vet exakt den källkod vi skall testa. Målet är att testa alla varianter av användning mot klassen, även felfall.

<!-- more -->

[FIGURE src=image/snapvt18/phpunit-terminal.png?w=w3 caption="Enhetstestning med PHPUnit via en Makefile."]

[FIGURE src=image/snapvt18/code-coverage-overview.png?w=w3 caption="Kodtäckning vid enhetstestning, en översikt av enheterna (klasserna)."]

[FIGURE src=image/snapvt18/code-coverage-detail.png?w=w3 caption="Detaljerad kodtäckning rad för rad i en enhet (klass)."]

<!--st op-->

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Labbmiljö {#labbmiljo}
---------------------------------

*(ca: 1-2 studietimmar)*

Installera följande som en del av din labbmiljö. Se till att du installerar PHPUnit version 6.0 eller högre, men välj en version som matchar din version av PHP.

1. Installera [PHPUnit](labbmiljo/phpunit) och [Xdebug](labbmiljo/xdebug) för att kunna köra enhetstester med kodtäckning på din lokala maskin.



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 3-6 studietimmar)*



### Artiklar {#artiklar}

Läs följande.

1. Låt oss se över vilka delar som vi hittills har gått igenom i PHP-manualen om "[Klasser och Objekt](http://php.net/manual/en/oop5.intro.php)". Kika så att du har hyffsad koll på dem. Gör en kort repetition, dessa omfattar den viktiga grunden av objektorienterade konstruktioner i PHP.
    * [Introduction](https://www.php.net/manual/en/oop5.intro.php)
    * [The basics](https://www.php.net/manual/en/language.oop5.basic.php)
    * [Properties](https://www.php.net/manual/en/language.oop5.properties.php)
    * [Class Constants](https://www.php.net/manual/en/language.oop5.constants.php)
    * [Autoloading classes](https://www.php.net/manual/en/language.oop5.autoload.php)
    * [Constructors and destructors](https://www.php.net/manual/en/language.oop5.decon.php)
    * [Visibility (public, protected, private)](https://www.php.net/manual/en/language.oop5.visibility.php)
    * [Object inheritance](https://www.php.net/manual/en/language.oop5.inheritance.php)
    * [Scope resolution operator (::)](https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php)



### Enhetstestning {#test}

Läs följande.

1. Läs introduktionen till enhetstester och enhetstestning i artikeln "[Enhetstestningens roll i test av mjukvara](kunskap/enhetstestningens-roll-i-test-av-mjukvara)".

1. I dokumentet [PHP The Right Way](http://www.phptherightway.com/), finns en sektion som berör testning i PHP.
    * [PHP The Right Way: Testing](https://phptherightway.com/#testing)

1. Gå till hemsidan för [PHPUnit](https://phpunit.de/) och bekanta dig kort och översiktligt med verktyget PHPUnit. Se till att du kollar upp vilka versioner av verktyget som stödjer de olika versionerna av PHP.

1. Kika kort på [PHPUnit på GitHub](https://github.com/sebastianbergmann/phpunit), det är öppen källkod så kolla snabbt hur ett större projekt fungerar på GitHub. Kolla dess commit-historik, hur issues diskuteras, releashanteringen, pull requests och hur källkoden ser ut. Använder de phpdoc och docblock kommentarer?

1. Bekanta dig med [PHPUnits dokumentation](https://phpunit.readthedocs.io/). Kika över innehållsförteckningen och skumläs snabbt följande kapitel (för att bekanta dig med manualens struktur och innehåll. Du kommer behöva gå tillbaka till manualen, senare när du skriver dina testprogram.
    * 2. Writing Tests for PHPUnit
    * 3. The Command-Line Test Runner
    * 4. Fixtures
    * 5. Organizing Tests
    * 9. Code Coverage Analysis
    * Appendix 1. Assertions

1. Bekanta dig kort och översiktligt med [Xdebug för PHP](https://xdebug.org/) och kika snabbt över vilken dokumentation som finns. Se vilka funktioner Xdebug kan tillföra till din utvecklingsmiljö. Vi kommer enbart använda Xdebug tillsammans med PHPUnit för att generera rapporter över kodtäckning.

1. För att läsa mer generellt om testning så är [Wikipedia Software Testing](https://en.wikipedia.org/wiki/Software_testing) en bra utgångspunkt. Kika där och läs mer om du har tid och intresse.



### Ramverk Anax {#anax}

Modulerna i ramverket Anax omfattas av enhetstestning i olika omfattning. Här kan du se de moduler du tidigare använt tillsammans med en _badge_ som berättar hur mycket av modulens kod som är täckt av ett eller flera enhetstester.

1. Ett par Anax moduler och omfattningen av enhetstester (kodtäckning) för respektive modul.
    * [![Code Coverage](https://scrutinizer-ci.com/g/canax/request/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/request/?branch=master) [anax/request](https://github.com/canax/request)
    * [![Code Coverage](https://scrutinizer-ci.com/g/canax/response/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/response/?branch=master) [anax/response](https://github.com/canax/response)
    * [![Code Coverage](https://scrutinizer-ci.com/g/canax/router/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/router/?branch=master) [anax/router](https://github.com/canax/router)
    * [![Code Coverage](https://scrutinizer-ci.com/g/canax/session/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/session/?branch=master) [anax/session](https://github.com/canax/session)
    * [![Code Coverage](https://scrutinizer-ci.com/g/canax/view/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/view/?branch=master) [anax/view](https://github.com/canax/view)

Klickar du på "kodtäckningsbadgen" så kommer du till Scrutinizer som är ett automatiserat byggverktyg som checkar ut och utför enhetstesterna för modulen, varje gång som modulen uppdateras på GitHub.

Varje Anax modul har en katalog `test/` där alla enhetstester är samlade. **Välj ut en av modulerna och inspektera de filerna som ligger i dess test-katalog**. Du kommer snart att bygga en liknande struktur i din me-sida för att testa dina egna klasser.



### Video {#video}

Det finns generellt kursmaterial i video form.

1. Kursen innehåller genomgångar och föreläsningar som spelas in (streamas) och därefter läggs i en spellista. Du kan nå spellistan på "[oophp streams vt19](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-igucRSQ6tFYg9x8to5HiE)".

1. Uppgifter och övningar kan innehålla extra videomaterial i form av spellistor kopplade till respektive artikel. Ofta syns dessa videor i inledningen av artikeln.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



### Uppgifter {#uppgifter}

Gör följande uppgifter.

1. Lös uppgiften "[Kom igång med PHPUnit](uppgift/kom-igang-med-phpunit)" som guidar dig igenom de första stapplande stegen i enhetstestning. Spara all kod i `me/kmom03/phpunit`.

1. Gör uppgiften "[Tärningsspel 100](uppgift/tarningsspel-100)" inuti din me-sida. Spara din kod under `me/redovisa`.

1. Pusha och tagga ditt repo `me/redovisa` allt eftersom och sätt en avslutande tagg (3.0.\*) när du är klar med alla uppgifter och redovisningstext i kursmomentet. Gör även en avslutande `make test` som en sista avstämning, innan du sätter sista taggen.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i texten:

* Har du tidigare erfarenheter av att skriva kod som testar annan kod?
* Hur ser du på begreppen enhetstestning och "att skriva testbar kod"?
* Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
* Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
* Hur väl lyckades du testa tärningsspelet 100?
* Vilken är din TIL för detta kmom?
