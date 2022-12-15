---
author: mos
category: php
revision:
  "2014-05-05": (A, mos) Första utgåvan i samband med phpmvc version 2.
updated: "2014-05-05 14:59:55"
created: "2014-05-05 14:59:52"
...
Börja att skriva testfall med PHPUnit för din PHP-kod
==================================

Att testa sin kod är grunden i att leverera bra kod. För att underlätta kan man använda testramverk likt PHPUnit. 

Denna artikel visar hur jag använder PHPUnit tillsammans med en av mina PHP-moduler. Jobba igenom artikeln och du lär dig grunden i hur man skapar unittester för PHP kod och i slutet kommer du bli varse vikten av *code coverage*.

<!--more-->



Förutsättning {#forutsatt}
--------------------------------------

Du har redan läst på om grunderna i unittestning och PHPUnit. Du har installerat PHPUnit på din egna maskin i enlighet med artikeln "[Installera PHPUnit för enhetstestning med PHP](kunskap/installera-phpunit-for-enhetstestning-med-php)".



Ett exempel {#exempel}
--------------------------------------

Så, vi behöver ett kodexempel att utgå ifrån. Låt oss ta PHP-paketet `mos/cform` som är beskrivet i artikeln "[CForm - A collection of PHP classes to ease working with HTML forms](opensource/cform)". CForm finns som [paket på Packagist](https://packagist.org/packages/mos/cform) och [källkoden ligger på GitHub](https://github.com/mosbth/cform/tree/v2). Jag jobbar i den branch som heter `v2` och när detta skrivs så är det taggen v1.9.1 som är den senaste uppdateringen.

Jag börjar med att plocka hem en kopia av koden för att se att nuvarande testfall fungerar.

```bash
$ git clone https://github.com/mosbth/cform.git -b v2
```

Vill du vara säker på att du har exakt samma kodbas som jag har i mitt exempel så checkar du ut samma tagg som jag har. Det kan vara en bra idé att göra så.

```bash
$ cd cform

$ git branch

$ git tag

$ git checkout v1.9.1

$ git branch
```

Så här ser det ut när jag checkar ut min testkopia av `mos/cform` och börjar med rätt version.

<script type="text/javascript" src="https://asciinema.org/a/9329.js" id="asciicast-9329" async></script>

Nu är vi redo att börja testa.



Kör befintliga enhetstester {#befint}
--------------------------------------

Modulen har redan ett par testfall i sig, de ligger i katalogen `test`. Låt oss se vad vi hittar där.

```bash
desktop:~/git/cform> ls -lR test/                          
test/:                                                     
total 8                                                    
-rw-r--r-- 1 mos mos   47 May  5 17:28 config.php          
drwxr-xr-x 2 mos mos 4096 May  5 17:28 HTMLForm/           
                                                           
test/HTMLForm:                                             
total 4                                                    
-rw-r--r-- 1 mos mos 832 May  5 17:28 CFormElementTest.php 
```

Katalogen `test` innehåller alltså allt som är relaterat till PHPUnit och enhetstestning av modulen.

Låt oss titta i filen `test/config.php` och se vad den innehåller.

```php
include __DIR__ . "/../autoloader.php"; 
```

Det handlar alltså om den basmiljö som behövs för att testerna skall fungera i sin omgivning. I detta fallet så räcker det alltså med en autoloader så att klassfilerna kan hittas.

Sedan finns det en katalogstruktur som har sin motsvarighet i källkodsträdet och `src`-mappen. En fil, eller katalog, i `src`-mappen, kan ha sin motsvarighet i `test`-mappen. I detta fallet är det en test-klass som ligger där, `test/CForm/CFormElementTest.php`. Det är en klass som är avsedd att testa klassen i `src/CForm/CFormElement.php`.

| Källkod                      | Testklass                         |
|------------------------------|-----------------------------------|
| `src/CForm/CFormElement.php` | `test/CForm/CFormElementTest.php` |

Innan vi kikar in i koden och studerar hur man skriver sin testklass så kan vi testa om nuvarande tester fungerar. Så här använder du phpunit för köra samtliga testfall som finns i katalogen `test`.

```php
$ cd cform

$ phpunit --bootstrap test/config.php test
PHPUnit 4.1.0 by Sebastian Bergmann.   
                                       
..                                     
                                       
Time: 19 ms, Memory: 3.00Mb            
                                       
OK (2 tests, 3 assertions)             
```

Inte så avancerat egentligen. Ett "OK" är allt vi vill ha. Så här ser det ut när jag kör det.

<script type="text/javascript" src="https://asciinema.org/a/9331.js" id="asciicast-9331" async></script>




Vad är ett testfall? {#testfall}
--------------------------------------

Det var alltså ett "OK" vi ville ha, men vad betyder raden:

```
OK (2 tests, 3 assertions)             
```

Två tester och tre *assertions*? En assertion i detta sammanhang är ett påstående i koden, ett anrop som skall returnera ett förväntat värde. Om det förväntade värdet returneras så är påståendet korrekt och koden fungerar. Det är alltså en del i testandet, låt oss kalla det för ett testfall.

Vi kikar på koden i `test/HTMLForm/CFormElementTest.php`, steg för steg.

```php
namespace Mos\HTMLForm;

/**
 * HTML Form elements.
 *
 */
class CFormElementTest extends \PHPUnit_Framework_TestCase
{
```

Den första delen matchar den klassen som vi skall testa. Det är samma namespace och samma klassnamn, bortsett från tillägget av `Test` i klassnamnet.

Sedan kommer det viktiga där klassen ärver från PHPUnits basklass `PHPUnit_Framework_TestCase`.

Därefter kommer testerna i form av metoder som namnges med prefixet `test`.

Det finns två tester i klassen `CFormElementTest`.

```php
/**
 * Test 
 *
 * @return void
 *
 */
public function testCreateElement() 
{
}

/**
 * Test 
 *
 * @expectedException Exception
 *
 * @return void
 *
 */
public function testValidationRuleNotFound() 
{
}
```

Av namnet på metoderna så kan vi anta att den första, `testCreateElement()`, är tänkt att testa skapandet av ett objekt och den andra, `testValidationRuleNotFound()`, tänker testa om en valideringsregel fungerar.

Låt oss titta i detalj i första metoden.

```php
/**
 * Test 
 *
 * @return void
 *
 */
public function testCreateElement() 
{
    $el = new \Mos\HTMLForm\CFormElement('test');

    $res = $el['name'];
    $exp = 'test';
    $this->assertEquals($res, $exp, "Created element name missmatch.");

    $res = $el->characterEncoding;
    $exp = 'UTF-8';
    $this->assertEquals($res, $exp, "Character encoding missmatch.");
}
```

Koden skapar först en instans av klassen som vi tänker testa, `\Mos\HTMLForm\CFormElement`. Därefter utförs två assertions. 

Det första är ett testfall, en assertion, att det nyligen skapade elementet har skapats med rätt namn.

```php
    $res = $el['name'];
    $exp = 'test';
    $this->assertEquals($res, $exp, "Created element name missmatch.");
```

En assertion är ett testfall, i detta fallet testas innehållet i två variabler och resultatet i dem förväntas vara lika. Annars är det något fel. 

Det andra testfallet är ett test på att det nyskapade objektet har UTF-8 som character encoding. Även detta testfall kan utföras med en `assertEquals()`.

```php
    $res = $el->characterEncoding;
    $exp = 'UTF-8';
    $this->assertEquals($res, $exp, "Character encoding missmatch.");
```

Det är alltså dessa små assertions, testfall, som bygger upp testsuiten för hela din kod. Gör många små testfall som testar ett visst beteende, kontrollera att resultatet stämmer med det som är förväntat. Annars fallerar testetfallet.

Låt oss nu kika på det andra testet.

```php
/**
 * Test 
 *
 * @expectedException Exception
 *
 * @return void
 *
 */
public function testValidationRuleNotFound() 
{
    $el = new \Mos\HTMLForm\CFormElement('test');

    $el->validate('no-such-rule');
}
```

Här är tanken att testa att ett viss Exception kastas när ett felaktigt värde skickas in i en funktion. Detta blir ett litet specialfall eftersom ett exception kastas och det finns inget värde som returneras som kan jämföras.

Här används en annotation `@expectedException` för att säga vilket exception som förväntas från testmetoden. PHPUnit lägger ett skal utanpå testmetoderna och i detta fallet fångas alla exception som kastas och kontrolleras om de matchar det förväntade.

Detta var totalt två tester och tre assertions, eller tre testfall om vi så vill.

[Manualen för PHPunit](http://phpunit.de/manual/current/en/index.html) innehåller två appendix, ett om vilka annotations som stöds och ett om vilka funktioner som finns för assertions. Framförallt så är det senare en bra källa till kunskap när man börjar skriva egna testfall.



Utöka med egna tester {#egna}
--------------------------------------

Så, då har vi grunden. Nu handlar det bara att fylla på med testfall för att testa så mycket som möjligt av koden.

Jag visar vägen genom att lägga till två testfall som kollar om formulärelementet har ett förväntat värde. Tanken är så här.

När man skapar ett formulärelement kan man skicka in en parameter som sätter ett värde på elementet. Det finns två sätt att senare plocka ut detta värdet, antingen via array-syntax eller via ett metodanrop. Jag tänker skapa en ny testmetod som gör två testfall, ett för array-syntax och ett för metodanropet.

Så här blir mitt nya test.

```php
/**
 * Test 
 *
 * @return void
 *
 */
public function testGetValue() 
{
    // First create a form element with a value of 42
    $el = new \Mos\HTMLForm\CFormElement('test', ['value' => 42]);

    // Assertion that the array-syntax gets the expected value
    $res = $el['value'];
    $exp = 42;
    $this->assertEquals($res, $exp, "Form element value missmatch, array syntax.");

    // Assertion that the method gets the expected value
    $res = $el->getValue();
    $exp = 42;
    $this->assertEquals($res, $exp, "Form element value missmatch, method.");
}
```

Det blir ett nytt test och två nya assertions. Jag kör mina tester och ser vad som händer.

```bash
desktop:~/git/cform> phpunit --bootstrap test/config.php test/  
PHPUnit 4.1.0 by Sebastian Bergmann.                            
                                                                
...                                                             
                                                                
Time: 20 ms, Memory: 3.00Mb                                     
                                                                
OK (3 tests, 5 assertions)                                      
```

Ser man på, nu har vi tre tester och fem assertions, det tar sig.



Felaktiga testfall {#fel}
--------------------------------------

När det blir fel i ett testfall så kan du vara säker på att PHPUnit kommer att berätta det för dig. Det ser ut så här.

```bash
desktop:~/git/cform> phpunit --bootstrap test/config.php test/   
PHPUnit 4.1.0 by Sebastian Bergmann.                             
                                                                 
...F                                                             
                                                                 
Time: 19 ms, Memory: 3.00Mb                                      
                                                                 
There was 1 failure:                                             
                                                                 
1) Mos\HTMLForm\CFormElementTest::testValidateEmail              
Validation email fails.                                          
Failed asserting that false is true.                             
                                                                 
/home/mos/git/cform/test/HTMLForm/CFormElementTest.php:83        
                                                                 
FAILURES!                                                        
Tests: 4, Assertions: 6, Failures: 1.                            
```

Jag hade lagt till ett testfall för att kontrollera att metoden som validerar värden fungerar. Det är en rätt komplex metod och det är skönt att testa att alla valideringstester verkligen fungerar. Det är inget man vill göra för hand.

Men något gick fel.

Så här ser testmetoden ut.

```php
/**
 * Test 
 *
 * @return void
 *
 */
public function testValidateEmail() 
{
    $el = new \Mos\HTMLForm\CFormElement('test');

    $el['value'] = 'mos@dbwebb.s';

    $res = $el->validate(['email_adress'], null);
    $this->assertTrue($res, "Validation email fails.");
}
```

Själva metoden som testas är `validate(['email_adress'])`, det förväntas att returnera `true` om elementets värde är en giltig mailadress. Nåväl, kikar vi på det värdet som jag använde som mailadress så ser vi att jag skrev fel. `'mos@dbwebb.s'` skall ju vara `'mos@dbwebb.se'`. Om jag ändrar min kod och kör testet igen så blir det bättre.

```bash
OK (4 tests, 6 assertions) 
```

Så där ja. Ytterligare ett testfall är nu bifogat koden. Bra, bra.



Kodtäckning, eller Code Coverage {#coverage}
--------------------------------------

Ibland är helt enkelt de engelska termerna bättre. *Code coverage*. Men låt se vad det handlar om.

För att vi skall vara verkligen nöjda så skall våra testfall täcka alla delar av koden som vi vill testa, vi vill ha en code coverage om 100%. PHPUnit kan hjälpa oss att hålla koll på hur mycket av koden vi täcker med våra testfall. PHPUnit kan sedan leverera en rapport, i olika format, som hjälper oss att se vilka delar av koden som fortfarande är otestad.

Det finns ett eget kapitel i PHPUnit manualen som handlar om *Code Coverage Analysis* med PHPunit. För att generera en rapport av code coverage krävs att du har XDebug installerat. Om du inte lyckas [installera Xdebug](http://xdebug.org/docs/install) på din egen maskin så kan du testköra på studentservern där det finns installerat.

Låt se hur bra jag testar CForm för tillfället.

```bash
phpunit --bootstrap test/config.php --coverage-html ./report test/
```

Så här ser det ut om du inte har Xdebug på din maskin.

```
The Xdebug extension is not loaded. No code coverage will be generated.
```

Naturligtvis hade jag inte det, *suck*, men på min Debian/Linux-maskin är det snabbt åtgärdat.

```bash
$ sudo apt-cache search xdebug
php5-xdebug - Xdebug Module for PHP 5

$ sudo apt-get install php5-xdebug
```

Sen kör vi PHPUnit igen.

```bash
desktop:~/git/cform> phpunit --bootstrap test/config.php --coverage-html ./report test/ 
PHPUnit 4.1.0 by Sebastian Bergmann.                                                    
                                                                                        
....                                                                                    
                                                                                        
Time: 124 ms, Memory: 11.50Mb                                                           
                                                                                        
OK (4 tests, 6 assertions)                                                              
                                                                                        
Generating code coverage report in HTML format ... done                                 
```

Ah, spännande. Då öppnar jag rapporten i min webbläsare.

```bash
$ firefox report/ &  
```

Du kan naturligtvis öppna den på vanligt sätt i din webbläsare, antingen via en webbserver eller lokalt. Jag vill bara *showa-off* lite på kommandoraden, eftersom vi befinner oss mer och mer där.

Så här ser rapporten ut via index.html.

[FIGURE src=/image/snap/phpunit-coverage.png?w=w2 caption="En översikt av mitt code coverage för nuvarande test suite."]

Det ser lite rött ut. Jag tror att det skall vara mer grönt, egentligen.

Kika runt lite i rapporten och se vad som genereras.

Jag börjar kika på autoloadern, den är ju grön. Så här ser rapporten ut för den kodbiten.

[FIGURE src=/image/snap/phpunit-cc-autloader.png?w=w2 caption="Grönt och idel grönt, alla kodrader är exekverade av testerna."]

Så skall det alltså se ut. Alla kodraderna exekverades av de testfall jag har. Även om jag inte har några testfall som direkt riktar sig mot autoloadern, så täcks den ändå av nuvarande tester.

Låt oss kika på klassen `CFormElement`, du hittar den genom att klicka dig fram i `src` och sedan `HTMLForm`.

[FIGURE src=/image/snap/phpunit-cc-formelement.png?w=w2 caption="Grönt, men inte så mycket grönt. Mest rött. Mer grönt vill vi ha."]

Här var det inte lika grönt. Det behövs alltså mer testfall för att täcka större delen av koden. Målet är att nå 100%. Eller egentligen, målet är vältestad kod, och ett högt code coverage kan underlätta. Att nå 100% kodtäckning är lite coolt i sig, men bara ett medel att nå målet.

Men, nu vet du grunderna i hur du kan uppnå 100% kodtäckning och vältestad programvara.

Och glöm inte, har du väl skrivit ett testfall så kommer det att ligga där och jobba för dig, varje gång du kör om din testsuite. Du har investerat i framtiden för din kod och besparar dig själv troligen en hel del tid. Du har automatiserat dina tester.



Avslutningsvis {#avslut}
--------------------------------------

Du har nu fått en introduktion i enhetstestning med PHPUnit och med en krydda av Code Coverage.

Du behöver nu börja använda det här själv. Det är bästa sättet att förstå hur man använder det och i längden kommer det att påverka hur du skriver din kod. Från och med nu kommer du vilja ha kod som är enkel att testa. Du lär dig bäst genom att börja använda grunderna i PHPUnit och sen får du se hur långt det tar dig.

[Manualen i PHPUnit](http://phpunit.de/manual/current/en/index.html) är en utmärkt källa till kunskap.

Det finns ett foruminlägg för [PHPUnit, Code Coverage och denna artikel](t/2363) om du vill diskutera, kommentera eller ställa frågor.

När vi väl har unittester klara kan vi fortsätta med *continuous integration*, men det är en [helt annan historia](kunskap/lat-travis-ci-och-scrutinizer-hjalpa-dig-med-att-testa-din-kod) det.




