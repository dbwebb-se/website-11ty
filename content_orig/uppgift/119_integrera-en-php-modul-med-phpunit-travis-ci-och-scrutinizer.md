---
author: mos
category: php
revision:
  "2014-05-05": (A, mos) Första utgåvan inför version 2 av phpmvc-kursen.
updated: "2014-05-05 23:25:03"
created: "2014-05-05 23:25:01"
...
Integrera en PHP-modul med PHPUnit, Travis CI och Scrutinizer 
==================================

Du bekantar dig med begreppet Continuous integration (CI) genom att införa unittestning av din kod med PHPUnit, du integrerar ditt gitHub repo med CI-tjänsterna Travis CI och Scrutinizer.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utvecklat en PHP-modul som du nu skall enhetstesta med PHPUnit och sedan skall du använda webbtjänsterna Travis CI och Scrutinizer för att automatisera testerna.

I guiden "[Låt Travis CI och Scrutinizer hjälpa dig med att testa din kod](kunskap/lat-travis-ci-och-scrutinizer-hjalpa-dig-med-att-testa-din-kod)" så får du grunden för hur du integrerar GitHub med Travis CI och Scrutinizer.

I guiden "[Börja att skriva testfall med PHPUnit för din PHP-kod](kunskap/borja-att-skriva-testfall-med-phpunit-for-din-php-kod)" lär du dig grunden i hur du skriver enhetstester med PHPUnit.



Krav {#krav}
-----------------------

1. Ta en PHP-modul som du utvecklat (den som du gjorde i kmom05 i phpmvc-v2).

2. Inför enhetstestning med PHPUnit.

3. Mät din Code Coverage och se till att du testar samtliga filer och att du uppnår en skälig Code Coverage.

4. Integrera ditt GitHub repo med Travis CI och låt webbtjänsten checka ut och bygga ditt projekt samt köra testerna.

5. Integrera ditt GitHub repo med Scrutinizer och låt webbtjänsten analysera din kod.

6. Integrera Scrutinizer med Travis CI för att visa upp statistik om code coverage från dina enhetstester.

7. Lägg till tre badges som visar hur bra det går för dig, de skall ligga i README-filen i ditt GitHub repo. De ser ut ungefär så här.

[![Build Status](https://travis-ci.org/mosbth/mumin.svg?branch=master)](https://travis-ci.org/mosbth/mumin)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mosbth/mumin/badges/quality-score.png?s=d21644feafabef69d88645aab4f6f477c4cf7a53)](https://scrutinizer-ci.com/g/mosbth/mumin/)
[![Code Coverage](https://scrutinizer-ci.com/g/mosbth/mumin/badges/coverage.png?s=b166bd5ee057fe14a53b3b3fd10d5668708949b3)](https://scrutinizer-ci.com/g/mosbth/mumin/)



Extrauppgift {#extra}
-----------------------

Nå upp till 100% i Code Coverage och 10 poäng i kodkvalitet?

Nja, det kanske är en utopi, men se hur långt du kan komma och hur långt som känns rimligt.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis.

Tänk till och fundera över vad termen continuous integration kan göra för dina kodningsprojekt.

**Lycka till och hojta till i forumet om du behöver hjälp!**




