---
author: mos
category: php
revision:
  "2014-12-08": (A, mos) Första utgåvan.
updated: "2014-12-08 12:51:43"
created: "2014-12-08 12:51:40"
...
Använd PHPUnit och Travis för att enhetstesta modul som har externt beroende
==================================

När man jobbar med enhetstestning så går det bra så länge man har moduler som inte har några beroenden. Men hur gör man om ens modul är beroende av en annan modul? 

Här får du ett exempel på hur du kan jobba med enhetstestning genom att inkludera externa moduler i din testmiljö.

<!--more-->

Denna artikel bygger vidare på artikeln "[Låt Travis CI och Scrutinizer hjälpa dig med att testa din kod](kunskap/lat-travis-ci-och-scrutinizer-hjalpa-dig-med-att-testa-din-kod)" och använder samma [källkod som exempelkod](https://github.com/mosbth/mumin).



Innan vi sätter igång {#start}
--------------------------------------

Jag utgår från version [v3.0 av mosbth/mumin](https://github.com/mosbth/mumin/tree/v3.0). När jag är klar med detta exempel så taggar jag den färdiga koden som [v4.0](https://github.com/mosbth/mumin/tree/v4.0).

Du kan checka ut din egen kopia så här och växla mellan versionerna.

```bash
$ git clone https://github.com/mosbth/mumin.git
$ git checkout v3.0
$ git checkout v4.0
```


Beroende till en extern modul {#ext}
--------------------------------------

Jag tänker göra en uppdatering av modulen Mumin och inför ett beroende till en extern modul. Jag väljer att  använda modulen [`mos/cdatabase`](https://packagist.org/packages/mos/cdatabase), en fristående modul för databashantering. Syftet är enbart att demonstrera hur man enhetstestar när man har ett beroende till en extern modul.

Jag laddar ned `mos/cdatabase` med Composer så jag skapar filen `composer.json` i min moduls GitHub repo.

```javascript
{
    "require": {
        "mos/cdatabase": "dev-master"
    }
}
```

Nu kan jag installera beroendet.

```bash
$ composer install
```



Kod som är beroende av annan kod {#beroende}
--------------------------------------

Jag implementerar klassen `Mumin/MumintrolletSQLBuilder`. Den använder ett trait som finns i `mos/cdatabase`. Det är själva beroendet.

```php
class MumintrolletSQLBuilder
{
    // External dependent on mos/cdatabase
    use \Mos\Database\TSQLQueryBuilderBasic;
```

Jag skapar en ny testklass `test/Mumin/MumintrolletSQLBuilderTest.php` som skall testa `src/Mumin/MumintrolletSQLBuilder.php`.

Tanken är inte att testa den externa modulen, det kan vara viktigt att komma ihåg, det är min egen modul som  skall testas. Den externa modulen har sina egna enhetstester.



Skapa en konfig-fil till phpunit {#phpunitconf}
--------------------------------------

Nu kan jag köra testfallen med kommandot phpunit.

```bash
$ phpunit --bootstrap=test/config.php --coverage-html coverage test
```

Men jag nöjer mig inte med det utan jag fortsätter och skriver en egen konfigurationsfil för phpunit.

`phpunit.xml.dist`

```html
<?xml version="1.0" encoding="UTF-8" ?>
<phpunit
    bootstrap="test/config.php">

    <testsuites>
        <testsuite name="all">
            <directory>test</directory>
        </testsuite>
    </testsuites>

    <logging>
        <log type="coverage-html" target="coverage" charset="UTF-8" highlight="true" lowUpperBound="35" highLowerBound="70" />
   </logging>

</phpunit>
```

Nu blir det enklare att köra phpunit, jag behöver bara skriva phpunit på kommandoraden så läses detaljer från konfig-filen.

```bash
$ phpunit
```

Enklare, snabbare, smidigare. Nu kan jag jobbar bättre, det är det som är grejen, att jag själv ska få så lite som möjligt att göra (skriva).



Inkludera composers autoloader {#autoloader}
--------------------------------------

Ajdå, fel blev det.

```text
$ phpunit

PHPUnit 4.1.0 by Sebastian Bergmann.

Configuration read from /home/mos/git/mumin/phpunit.xml.dist

PHP Fatal error:  Trait 'Mos\Database\TSQLQueryBuilderBasic' 
not found in 
/home/mos/git/mumin/src/Mumin/MumintrolletSQLBuilder.php 
on line 12
```

Jag behöver inkludera autoloadern från composer. Det gör jag i min konfig-fil för testerna.

`test/config.php`

```php
/**
 * Get all configuration details to be able to execute the test suite.
 *
 */
include __DIR__ . "/../autoloader.php";
include __DIR__ . "/../vendor/autoload.php";
```

Nu gick det bättre.

```text
$ phpunit
PHPUnit 4.1.0 by Sebastian Bergmann.                        

Configuration read from /home/mos/git/mumin/phpunit.xml.dist

..                                                          

Time: 114 ms, Memory: 11.50Mb                               

OK (2 tests, 2 assertions)                                  

Generating code coverage report in HTML format ... done     
```

Perfekt. Ett externt beroende till en annan modul och nu kan jag testa min modul genom att inkludera den andra modulen. Nu kan jag välja om jag vill använda modulens kod i mina tester, eller om jag vill använda stubbar som simulerar den externa modulen. Men det är en annan historia. Här tänker jag mig att man tar enklaste vägen och använder den andra modulen i testerna. Man kan säga att mina testar i nu även testar delar av den externa modulen. Det är inte direkt önskvärt när det gäller enhetstestning där man bara vill testa sin egen moduel -- men det är ett enkelt sätt att komma igång med testning när en extern modul krävs.



Hur fungerar detta med Travis? {#travis}
--------------------------------------

Tanken är att börja använda konfigurationsfilen för phpunit, även hos Travis. Det betyder att jag behöver generera kodtäckning i Clover XML-format. Det var något jag tidigare gjorde i konfig-filen för Travis.

Först lägger jag till så att phpunit skapar en rapport för kodtäckning, jag uppdaterar filen `phpunit.xml.dist` så att sektionen för logging ser ut så här.

```html
    <logging>
        <log type="coverage-html" target="coverage" charset="UTF-8" highlight="true" lowUpperBound="35" highLowerBound="70" />
        <log type="coverage-clover" target="coverage.clover" />
   </logging>
```

Sedan testar jag att det fungerar genom att köra phpunit.

```text
$ phpunit                                  
PHPUnit 4.1.0 by Sebastian Bergmann.
...
Generating code coverage report in Clover XML format ... done 
...
```

Ser bra ut. Då uppdaterar jag konfigfilen för Travis, `.travis.yml` så att den använder sig av phpunits nya sätt att jobba. 

```text
script:
    #- phpunit --bootstrap test/config.php test
    #- phpunit --bootstrap test/config.php --coverage-clover coverage.clover test
    - phpunit
```

Sen får jag inte missa att be composer att hämta hem de beroenden som finns.

```text
before_script:
    - wget https://scrutinizer-ci.com/ocular.phar
    - composer install
```

Då checkar jag in till GitHub och ser hur Travis och Scrutinizer hanterar mina uppdateringar. 

> *Lutar mig tillbaka, tar lite kaffe och ser på nät Travis och Scrutinizer jobbar för mig.*

Strålande. Det fungerade precis som tänkt. Jag gick in på Travis som visar detaljer för hur bygget sker och det gick precis som jag hade tänkt mig.

Jag taggar denna versionen av Mumin som [v4.0](https://github.com/mosbth/mumin/tree/v4.0).



Avslutningsvis {#avslutningsvis}
--------------------------------------

Detta var grunden för hur du kan testa din modul som är beroende av en extern modul och hur du kan integrera de testerna i phpunit, Travis och Scrutinizer.

Det finns ett foruminlägg för [denna artikel](t/3347) om du vill diskutera eller ställa frågor.




