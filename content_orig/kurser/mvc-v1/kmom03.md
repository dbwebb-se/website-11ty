---
author:
    - mos
revision:
    "2021-04-13": "(A, mos) Första utgåvan i mvc-v1."
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

<small><i>Detta är instruktionen för kursmomentet och omfattar cirka **20 studietimmar**. Fokus ligger på uppgifter som du skall lösa och redovisa. För att lösa uppgifterna behöver du normalt jobba igenom övningar och läsanvisningar för att skaffa dig rätt kunskap och förståelse av uppgiftens alla delar. Läs igenom hela kursmomentet innan du börjar jobba.</i></small>



Labbmiljö  {#labbmiljo}
---------------------------------

*(ca: 1-2 studietimmar)*

Installera följande som en del av din labbmiljö.

1. Installera [Xdebug](labbmiljo/xdebug) för att kunna köra enhetstester med kodtäckning på din lokala maskin.

    1. Om du är på Mac kan du vara behjälpt av att installera "PHP i terminalen" och "Xdebug" via pakethanterare Brew, för detaljer se "[Installera Xdebug på Mac OS med XAMPP/brew](t/8514)".



Uppgifter & Övningar {#uppgifter_ovningar}
-------------------------------------------

*(ca: 10-14 studietimmar)*

Uppgifter skall utföras och redovisas, övningar är träning inför uppgifterna.



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas.

1. Lös uppgiften "[Enhetstesta dina klasser med PHPUnit](uppgift/enhetstesta-dina-klasser-med-phpunit)".



### Övningar {#ovningar}

<!-- Det finns inga övningar i detta kursmoment. -->

Jobba igenom övningarna, de förbereder dig inför uppgifterna.

1. Det finns en tutorial "[Get going with phpunit](https://github.com/dbwebb-se/mvc/tree/main/example/phpunit)" i ditt kursrepo under `example/phpunit` som hjälper dig att komma igång med phpunit och enhetstestning. Jobba igenom den och försök nå 100% kodtäckning och samtidigt lära dig grunderna i enhetstestning.



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar)*

För att lösa uppgifterna och redovisningen bör du studera enligt följande.



### Föreläsning {#flas}

Titta igenom följande föreläsningar.



#### Introduktion till området "Software Testing" {#f1}

Om "software testing" och ingenjörsprocessen att utföra testning.

Slides till föreläsningen "[Introduktion till området 'Software Testing'](https://dbwebb-se.github.io/mvc/lecture/L03-software-testing/slide.html)".

[YOUTUBE src="OouC3mBVOhU" width=700 caption="Introduktion till området 'Software Testing' (med Mikael)."]



#### Introduktion till området "Software Unit Testing" {#f2}

Fortsättning med objekt och klasser i PHP. Vi studerar konstrukturer för arv, komposition, interface och trait. Vi pratar också om hur man skall tänka när man kodar objektorienterat och vad som är god kodsed och riktlinjer när man designar och implementerar sina klasser.

Slides till föreläsningen "[Introduktion till området 'Software Unit Testing'](https://dbwebb-se.github.io/mvc/lecture/L03-software-unit-testing/slide.html)".

[YOUTUBE src="LgFHTPEu6BI" width=700 caption="Introduktion till området 'Software Unit Testing' (med Mikael)."]



### Litteratur  {#litteratur}

1. I dokumentet [PHP The Right Way](http://www.phptherightway.com/), finns en sektion som berör testning i PHP. Läs igenom den.

    * [PHP The Right Way: Testing](https://phptherightway.com/#testing)

1. Bekanta dig med [PHPUnits dokumentation](https://phpunit.readthedocs.io/). Kika över innehållsförteckningen och skumläs snabbt följande kapitel (för att bekanta dig med manualens struktur och innehåll. Du kommer behöva gå tillbaka till manualen, senare när du skriver dina testprogram. Det är via manualen du kan lära dig allt som du behöver veta om enhetstester med phpunit.

    * 2. Writing Tests for PHPUnit
    * 3. The Command-Line Test Runner
    * 4. Fixtures
    * 5. Organizing Tests
    * 9. Code Coverage Analysis
    * Appendix 1. Assertions



<!--
1. På StackOverflow/StackExchange finns följande funderingar och frågor om enhetstestning besvarade, läs frågorna och de olika svaren för att skapa dig en bild av vad programmerare generellt anser om enhetstestning.
    * "[Is Unit Testing worth the effort?](https://stackoverflow.com/questions/67299/is-unit-testing-worth-the-effort)"
    * "[Why would you write unit-tests for controllers?](https://softwareengineering.stackexchange.com/questions/338420/why-would-you-write-unit-tests-for-controllers)"
-->



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa). Observera att denna kursen skiljer sig från hur du normalt sett lämnar in din redovisningstext.

Se till att följande frågor besvaras i texten i din rapport:

* Berätta hur du upplevde att skriva kod som testar annan kod med PHPUnit och hur du upplever phpunit rent allmänt.

* Hur väl lyckades du med kodtäckningen av din kod, lyckades du nå mer än 90% kodtäckning?

* Upplever du din egen kod som "testbar kod" eller finns det delar i koden som är mer eller mindre testbar och finns det saker som kan göras för att förbättra kodens testbarhet?

* Valde du att skriva om delar av din kod för att förbättra den eller göra den mer testbar, om så berätta lite hur du tänkte.

* Fundera över om du anser att testbar kod är något som kan identifiera "snygg och ren kod".

* Vilken är din TIL för detta kmom?



Resurser bra-att-ha {#resurser}
---------------------------------

Här anges övriga resurser som kan användas för vidare studier i det som kursmomentet omfattar.



### Om Software Testing {#test}

Följande resurser används i olika omfattning i samband med föreläsningen "Introduktion till området "Software Testing"".

För att läsa mer allmänt om test av mjukvara så kan Wikipedia vara en grov startpunkt via följande sidor.

* "[Software testing](https://en.wikipedia.org/wiki/Software_testing)"
* "[Software bug](https://en.wikipedia.org/wiki/Software_bug)"
* "[Software verification and validation](https://en.wikipedia.org/wiki/Software_verification_and_validation)"

Om du fattade intresse för SWEBOK så finns resurserna här.

* Wikipedia om [SWEBOK](https://en.wikipedia.org/wiki/Software_Engineering_Body_of_Knowledge)
* IEEE Computer Society med "[The Guide to the Software Engineering Body of Knowledge (SWEBOK Guide)](https://www.computer.org/education/bodies-of-knowledge/software-engineering)"



### Om Software Unit Testing {#unittest}

Följande resurser används i olika omfattning i samband med föreläsningen "Introduktion till området "Software Unit Testing"".

* Kika på Wikipedia artikeln om "[List of software bugs](https://en.wikipedia.org/wiki/List_of_software_bugs)" för att lära sig om kända buggar och deras konsekvenser.

* Läs om "[Side effect (computer science)](https://en.wikipedia.org/wiki/Side_effect_(computer_science))" och lära sig om referens transparens, idempotens och deterministisk.

    * Läs om den relaterade termen "[Pure function](https://en.wikipedia.org/wiki/Pure_function)".
    * Läs om den relaterade termen "[Deterministic algorithm](https://en.wikipedia.org/wiki/Deterministic_algorithm)".

* Försök få en förståelse för begreppet "[False positives and false negatives](https://en.wikipedia.org/wiki/False_positives_and_false_negatives)" och hur det hänger ihop med enhetstester.



### PHPUnit {#phpunit}

När det gäller phpunit så är bland annat följande resurser intressanta att ha koll på.

* [PHPUnits hemsida](https://phpunit.de/)
* [Manualen](https://phpunit.readthedocs.io) (dubbelkolla så att du läser rätt version av manualen som mappas mot den version av phpunit du använder).
* [PHPUnit och PHP supportade versioner](https://phpunit.de/supported-versions.html), se vilka versioner som är aktiva för tillfället.
* [PHPUnit på GitHub](https://github.com/sebastianbergmann/phpunit), följ utvecklingen och läs om vilka issues som finns.

För att kodtäckningen skall fungera behöver du installera Xdebug.

* [Hemsidan för Xdebug](https://xdebug.org/)



### Arkiv {#arkiv}

En introduktionen till enhetstester och enhetstestning ges i artikeln "[Enhetstestningens roll i test av mjukvara](kunskap/enhetstestningens-roll-i-test-av-mjukvara)". Denna artikeln kan anses ersatt av de båda föreläsningarna om test och ligger med här enbart av kuriosa skäl.



### Git och skriva bra commits {#gitcommit}

Det kan vara en konst att skriva bra commit-meddelande så att man får en bra historik när man tittar på koden via ens commits.

* Läs artikeln "[How to Write a Git Commit Message](https://chris.beams.io/posts/git-commit/)" för att få sju gyllene regler som kan hjälpa dig till bättre commit-meddelanden.

I artikeln ovan refereras till Linux kärnan och repon skrivna av Tim Pope som bra exempel på commit-historik. Följande länkar leder till den typen av exempel.

* StackOverflow "[Git Commit Messages: 50/72 Formatting](https://stackoverflow.com/questions/2290016/git-commit-messages-50-72-formatting)" men ett histogram över längden på commit-meddelanden från Linux kärnan.
* Tim Pope "[A Note About Git Commit Messages](https://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html)" som är en äldra artikel som ofta refereras till i sammanhanget.
