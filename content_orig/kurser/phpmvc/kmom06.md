---
author: mos
revision:
  "2015-01-12": (E, mos) La till artikel om testning med Anax MVC och sessioner.
  "2014-12-16": (D, mos) La till artikel om testning med extern modul mot databas.
  "2014-12-08": (C, mos) La till artikel om testning med extern modul.
  "2014-08-06": (B, mos) Tog bort 42-testet.
  "2014-05-06": (A, mos) Första utgåvan för phpmvc version 2.
updated: "2015-01-12 17:03:35"
created: "2013-10-24 15:07:20"
...
Kmom06: Verktyg och CI
==================================

Vi har lärt oss grunderna i ramverk, hur det kan byggas upp av egna och lånade moduler och vi har kikat på eko-systemet för modulhantering. Nu fortsätter vi med att titta på fler delar av det eko-system som omger vårt ramverk och dess moduler. Vi skall nämligen införa enhetstestning, eller för att använda rätt termer så heter det *unit testing*, *code coverage*, *continuous integration*, *automated tests* and *code quality*. 

Det är stora termer som kan kräva en kurs i sig. Men vi nöjer oss med att bekanta oss med termerna för att bättre förstå hur de kan hjälpa oss med kodutvecklandet. Kanske kan vi också se vilken typ av hantering vi kan kräva av de som utvecklar moduler och ramverk, allt för att de skall leverera väl testad och högkvalitativ kod.

För att komma igång så skall vi i detta kursmoment ta modulen vi skapade i föregående moment, och införa unittester i den, sedan skall GitHub-repot kopplas till webbtjänsten Travis CI och sedan till webbtjänsten Scrutinizer. Därefter har vi bättre koll på hur dessa tekniker kan samverka.

[FIGURE src=/image/snap/travis.png?w=w2 caption="Travis checkar ut din kod från GitHub och testar den."]

[FIGURE src=/image/snap/scrutinizr.png?w=w2 caption="Scrutinizer kontrollerar din kodkvalitet och  använder information från Travis för att analysera din code coverage."]

Läs vidare och snart är du medveten om vilket jobb som ligger bakom följande badges.

[![Build Status](https://travis-ci.org/mosbth/mumin.svg?branch=master)](https://travis-ci.org/mosbth/mumin)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mosbth/mumin/badges/quality-score.png?s=d21644feafabef69d88645aab4f6f477c4cf7a53)](https://scrutinizer-ci.com/g/mosbth/mumin/)
[![Code Coverage](https://scrutinizer-ci.com/g/mosbth/mumin/badges/coverage.png?s=b166bd5ee057fe14a53b3b3fd10d5668708949b3)](https://scrutinizer-ci.com/g/mosbth/mumin/)


<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>




Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 3-6 studietimmar)*


###Artiklar {#artiklar}

Läs följande som en introduktion till kursmomentet och för att hämta inspiration om vad termerna *unit testing*, *code coverage*, *continuous integration*, *automated tests* and *code quality* handlar om.

1. Läs inlägget och de första svaren i tråden "[Is Unit Testing worth the effort?](http://stackoverflow.com/questions/67299/is-unit-testing-worth-the-effort)". Det handlar om en hög argument om varför man skall göra unit testning.

2. Kika runt på webbplatsen för [Travis CI](https://travis-ci.org/) och bekanta dig med dess [dokumentation](http://docs.travis-ci.com/). Kika på hur senaste bygget gick för [Anax MVC på Travis CI](https://travis-ci.org/mosbth/Anax-MVC). Skaffa dig ett eget konto på Travis CI.

3. Kika runt på webbplatsen för [Scrutinizer](https://scrutinizer-ci.com/) och bekanta dig med dess [dokumentation](https://scrutinizer-ci.com/docs/). Kika på hur senaste bygget gick för [Anax MVC på Scrutinizer](https://scrutinizer-ci.com/g/mosbth/Anax-MVC/). Skaffa dig ett eget konto på Scrutinizer.

4. Läs om Martin Fowlers reflektion om [UnitTest](http://martinfowler.com/bliki/UnitTest.html).

5. Läs om grundtankarna med [Continuous integration](http://martinfowler.com/articles/continuousIntegration.html) som Martin Fowler beskriver det.



###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [PHP Objects, Patterns, Practice](kunskap/boken-php-objects-patterns-and-practice) 
  * Ch18 Testing with PHPUnit
  * Ch19 Automated Build with Phing
  * Ch20 Continuous Integration

Boken tar upp andra verktyg såsom Phing och Jenkins. Se dem som komplement och alternativ till Travis.



###Lektionsmaterial  {#lektionsmaterial}

Föreläsningsmaterial för campus kommer i maj 2014.



###Lästips {#lastips}

Läs på vad Wikipedia säger om termerna.

* [Unit testing](http://en.wikipedia.org/wiki/Unit_testing)
* [Test-driven development](http://en.wikipedia.org/wiki/Test-driven_development)
* [Code coverage](http://en.wikipedia.org/wiki/Test-Code_coverage)
* [Continuous integration](http://en.wikipedia.org/wiki/Continuous_integration)
* [Test automation](http://en.wikipedia.org/wiki/Test_automation)
* [Analys av kod ur kvalitetsaspekter](http://en.wikipedia.org/wiki/Software_quality#Code-based_analysis) (läs endast stycket om *Code-based analysis*)




Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-16 studietimmar)*


###Övningar {#ovningar}

Övningarna förbereder dig för uppgifterna.

1. Se till att [installera PHPUnit](kunskap/installera-phpunit-for-enhetstestning-med-php) på din lokala maskin och se till att du kan använda det på studentservern.

2. Jobba igenom artikeln "[Börja att skriva testfall med PHPUnit för din PHP-kod](kunskap/borja-att-skriva-testfall-med-phpunit-for-din-php-kod)" och pröva sedan att skriva testfall för din PHP modul som du gjorde i föregående kursmoment.

3. Läs igenom artikeln "[Låt Travis CI och Scrutinizer hjälpa dig med att testa din kod](kunskap/lat-travis-ci-och-scrutinizer-hjalpa-dig-med-att-testa-din-kod)". Ta din modul och integrera den med Travis och Scrutinizer.

4. Om du har en modul som är beroende av en annan modul, så kan det vara klurigt att se hur man skall göra enhetestester. Det enklaste är alltid att enhetstesta en modul som inte har några externa beroenden. Men, ibland är det inte möjligt. Här är en artikel som går igenom hur du kan testa din modul med dess externa beroenden, "[Använd PHPUnit och Travis för att enhetstesta modul som har externt beroende](kunskap/anvand-phpunit-och-travis-for-att-enhetstesta-modul-som-har-externt-beroende)". Här är en påbyggnad på den artikeln som visar hur du testar en modul som har beroenden mot en databas, "[PHPUnit och testa modul som är beroende av databas](kunskap/phpunit-och-testa-modul-som-ar-beroende-av-databas)" och här kommer ytterligare en artikel på samma tema, "[PHPUnit och testa modul som är beroende av Anax MVC](kunskap/phpunit-och-testa-modul-som-ar-beroende-av-anax-mvc)".

*Enklast, för att komma i mål med uppgiften, är att ha en modul som inte har externa beroenden -- eller så undviker du att testa de delar som har externa beroenden.*



###Uppgifter {#uppgifter}

Utför och redovisa följande uppgifter.

1. Gör uppgiften "[Integrera en PHP-modul med PHPUnit, Travis CI och Scrutinizer ](uppgift/integrera-en-php-modul-med-phpunit-travis-ci-och-scrutinizer)".



###Extra {#extra}

1. Integrera hela ditt ramverk (din utökade klon av Anax MVC) med Travis och Scrutinizer. Lägg till testfall för din egen kod och återanvänd testfallen för Anax MVC.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Var du bekant med några av dessa tekniker innan du började med kursmomentet?
  * Hur gick det att göra testfall med PHPUnit?
  * Hur gick det att integrera med Travis? 
  * Hur gick det att integrera med Scrutinizer?
  * Hur känns det att jobba med dessa verktyg, krångligt, bekvämt, tryggt? Kan du tänka dig att fortsätta använda dem?
  * Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc-v2). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.






