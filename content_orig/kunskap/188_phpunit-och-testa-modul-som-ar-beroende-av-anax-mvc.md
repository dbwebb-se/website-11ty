---
author: mos
category: php
revision:
  "2015-01-12": (A, mos) Första utgåvan.
updated: "2015-01-12 13:04:08"
created: "2015-01-12 13:02:15"
...
PHPUnit och testa modul som är beroende av Anax MVC 
==================================

Hur gör man om man vill använda PHPUnit för att testa en modul som har ett beroende till ett ramverk som Anax MVC? Kan man testa modulen men ändå inkludera hela ramverket? Finns det något enkelt sätt att göra det på?  

Här får du ett exempel på hur du kan enhetstesta en modul som använder sig av delar av Anax MVC. I artikeln visas hur modulen kan implementera tester för ett externt beroende till Anax MVC och dessutom visas hur du hanterar dependency injection med `$di` så att modulen får del av ramverkets alla tjänster.

<!--more-->

Denna artikel bygger vidare på artiklarna "[Använd PHPUnit och Travis för att enhetstesta modul som har externt beroende](kunskap/anvand-phpunit-och-travis-for-att-enhetstesta-modul-som-har-externt-beroende)" och "[PHPUnit och testa modul som är beroende av databas](kunskap/phpunit-och-testa-modul-som-ar-beroende-av-databas)". Artiklarna använder samma [källkod som exempelkod](https://github.com/mosbth/mumin) som baskod.



Innan vi sätter igång {#start}
--------------------------------------

Jag utgår från version [v5.0 av mosbth/mumin](https://github.com/mosbth/mumin/tree/v5.0). Jag utvecklar exemplet i en [branch v6](https://github.com/mosbth/mumin/tree/v6). När jag är klar med detta exempel så taggar jag den färdiga koden som [v6.0](https://github.com/mosbth/mumin/tree/v6.0).

Du kan checka ut din egen kopia så här och växla mellan versionerna.

```bash
$ git clone https://github.com/mosbth/mumin.git
$ git checkout v5.0
$ git checkout v6
$ git checkout v6.0
```

Du kan växla mellan olika brancher och taggar via `git checkout`.



Modul beroende av Anax MVC och `$di` {#beroende}
--------------------------------------

Jag tänker mig en modul som är beroende av sessionen och sessionen hanteras av `$di->session` i Anax MVC. Jag gör min modul så att den läser och skriver till sessionen. Min modul behöver alltså tillgång till koden för Anax MVC.

Jag skapar jag en ny klass `MumintrolletSession` som ärver från `Mos\Mumin\Mumintrollet`. 

```php
class MumintrolletSession extends \Mos\Mumin\Mumintrollet implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;
```

Min klass implementerar även interfacet [`\Anax\DI\IInjectionAware`](https://github.com/mosbth/Anax-MVC/blob/master/src/DI/IInjectionAware.php) genom att använda traitet [`\Anax\DI\TInjectable`](https://github.com/mosbth/Anax-MVC/blob/master/src/DI/TInjectable.php). Det betyder att klassen är redo för att ta emot och jobba med ramverkets tjänster via `$di`.

Jag implementerar två metoder som använder sig av `$di->session`.

```php
/**
 * Get name from session.
 *
 * @return string
 *
 */
public function getNameFromSession()
{
    if ($this->session->has('name')) {
        return $this->session->get('name');
    } else {
        return "No name is set in session.";
    }
}



/**
 * Set name in session.
 *
 * @return void
 *
 */
public function setNameInSession($name)
{
    $this->session->set('name', $name);
}
```

Den ena metoden läser från sessionen och den andra skriver till sessionen.

Metoderna förutsätter att klassen har tillgång till `$di` enligt den implementationen som traitet `\Anax\DI\TInjectable` erbjuder.

Så här ser den [färdiga koden ut i sitt sammanhang](https://github.com/mosbth/mumin/blob/master/src/Mumin/MumintrolletSession.php).



Testfall för metoderna {#testfall}
--------------------------------------

Jag skapar en testklass och kodar testfallen för klassen. Jag tänker börja med en liten testmetod och sedan testa mig fram steg för steg tills det fungerar. 

```php
/**
 * Test
 *
 * @return void
 *
 */
public function testGetNameFromSession()
{
    $mumin = new \Mos\Mumin\MumintrolletSession();
    $di    = new \Anax\DI\CDIFactoryDefault();
    $mumin->setDI($di);

    $name = "Snusmumriken";
    $mumin->setNameInSession($name);

    $name2 = $mumin->getNameFromSession();
    $this->assertEquals($name, $name2, "The name does not match.");
}
```

Jag skapar en instans av klassen och injektar `$di`. Sedan skriver jag koden för att testa klassens  metoder.

Låt se, vilka problem får jag nu... jag testar att köra `phpunit`.

```text
$ phpunit                                   
PHPUnit 4.1.0 by Sebastian Bergmann.                           
                                                               
Configuration read from /home/mos/git/mumin/phpunit.xml.dist   
                                                               
...PHP Fatal error:  Interface 'Anax\DI\IInjectionAware' not found in
/home/mos/git/mumin/src/Mumin/MumintrolletSession.php on line 10
```

Hmmm. Okey, det får vi lösa.



Gör require på Anax MVC {#require}
--------------------------------------

Min modul är beroende av klasser i Anax MVC och behöver ha tillgång till dess kod. Detta löser jag på samma sätt som jag gjorde i artikeln "[PHPUnit och testa modul som är beroende av databas](kunskap/phpunit-och-testa-modul-som-ar-beroende-av-databas)". Jag gör helt enkelt *require* på Anax MVC med composer.

I min `composer.json` lägger jag till så att ramverket inkluderas.

```javascript
"require": {
    "anax/mvc": "dev-master"
}
```

Sedan går jag till mitt repo på kommandoraden och uppdaterar med `composer`.

```bash
$ composer update --no-dev
Loading composer repositories with package information
Updating dependencies
  - Installing anax/mvc (dev-master 4194347)
    Cloning 4194347232e130b8d8bbecc59c92365b521a8aab

Writing lock file
Generating autoload files
```

Så där. Nu ligger hela Anax MVC i katalogen `vendor/anax` och autoloadern sköter så att alla filer hittas.

Då testar jag med `phpunit` igen.

```text
$ phpunit                                   
PHPUnit 4.1.0 by Sebastian Bergmann.                           
                                                               
Configuration read from /home/mos/git/mumin/phpunit.xml.dist

...E.

Time: 242 ms, Memory: 13.25Mb

There was 1 error:

1) Mos\Mumin\MumintrolletSessionTest::testGetNameFromSession
Use of undefined constant ANAX_APP_PATH - assumed 'ANAX_APP_PATH'

/home/mos/git/mumin/vendor/anax/mvc/src/DI/CDIFactoryDefault.php:20
/home/mos/git/mumin/test/Mumin/MumintrolletSessionTest.php:21
```

Okey, ett steg framåt. Då tar vi nästa problem.



Anax behöver sin omgivning {#omgivning}
--------------------------------------

Anax MVC behöver två sökvägar för att fungera. Det är `ANAX_INSTALL_PATH` och `ANAX_APP_PATH`.

Jag lägger till följande rader i min `test/config.php`.

```php
/**
 * Define essential Anax paths, end with /
 *
 */
define('ANAX_INSTALL_PATH', realpath(__DIR__ . '/../vendor/anax/mvc') . '/');
define('ANAX_APP_PATH',     ANAX_INSTALL_PATH . 'app/');
```

Då testar jag igen.

```text
PHPUnit 4.1.0 by Sebastian Bergmann.

Configuration read from /home/mos/git/mumin/phpunit.xml.dist

...E.

Time: 248 ms, Memory: 13.25Mb

There was 1 error:

1) Mos\Mumin\MumintrolletSessionTest::testGetNameFromSession
Exception: In trait TInjectable used by class Mos\Mumin\MumintrolletSession.
    You are trying to get a property (service) "session" from $this->di, but 
    the service is not set in $this->di. Did you misspell the service you 
    are trying to reach or did you forget to load it into the $di
    container?CDI could not load service 'session'. Failed in the callback 
    that instantiates the service. session_start(): Cannot send session 
    cookie - headers already sent by (output started
 at phar:///usr/local/bin/phpunit/phpunit/Util/Printer.php:172)

/home/mos/git/mumin/vendor/anax/mvc/src/DI/TInjectable.php:58
/home/mos/git/mumin/src/Mumin/MumintrolletSession.php:40
/home/mos/git/mumin/test/Mumin/MumintrolletSessionTest.php:25
```

Ytterligare ett steg framåt.

Men uppenbarligen kan jag inte starta tjänsten `$di->session`.



Sätt upp sessionen för tester {#sessionen}
--------------------------------------

Nej, man kan inte skapa sessionen när man kör PHP via kommandoraden som vi gör med PHPUnit. Men vi kan fortfarande testa modulen och Anax MVC som om sessionen fanns där. Vi låter bara bli att starta sessionen.

Men för att göra det behöver jag modifiera själva uppstarten av tjänsten -- så som den startas i [`\Anax\DI\CDIFactoryDefault`](https://github.com/mosbth/Anax-MVC/blob/master/src/DI/CDIFactoryDefault.php). Jag löser det genom att omdefiniera hur tjänsten `$di->session` skapas. Jag gör det direkt i mitt testfall så att du kan se koden i ett sammanhang.

Så här ser mitt uppdaterade testfall ut.

```php
/**
 * Test
 *
 * @return void
 *
 */
public function testGetNameFromSession()
{
    $mumin = new \Mos\Mumin\MumintrolletSession();
    $di    = new \Anax\DI\CDIFactoryDefault();
    $mumin->setDI($di);

    $di->setShared('session', function () {
        $session = new \Anax\Session\CSession();
        $session->configure(ANAX_APP_PATH . 'config/session.php');
        $session->name();
        //$session->start();
        return $session;
    });

    $name = "Snusmumriken";
    $mumin->setNameInSession($name);

    $name2 = $mumin->getNameFromSession();
    $this->assertEquals($name, $name2, "The name does not match.");
}
```

Det är alltså precis som tidigare, bortsett från att jag nu kommenterad bort `$session->start()`. Tjänsten `session` fanns sedan tidigare i `$di`, men det går alltså bra att omdefiniera den.

Då kör vi igen.

```text
$ phpunit
PHPUnit 4.1.0 by Sebastian Bergmann.

Configuration read from /home/mos/git/mumin/phpunit.xml.dist

.....

Time: 255 ms, Memory: 13.25Mb

OK (5 tests, 5 assertions)

Generating code coverage report in Clover XML format ... done

Generating code coverage report in HTML format ... done
```

Vips. Så bra det kan gå ibland. Det fungerar.

Här är den färdiga [koden för testklassen](https://github.com/mosbth/mumin/blob/master/test/Mumin/MumintrolletSessionTest.php).



Commit, push och låt Travis jobba {#travis}
--------------------------------------

Så, jag tar och committar mitt arbete, fortfarande är jag i min branch v6. Jag pushar och låter Travis jobba. Förhoppningsvis förstår nu även Travis hur den skall använda `composer` för att göra require på Anax MVC och därefter köra enhetstesterna med `phpunit`.

[Det ser ut som det gick bra](https://travis-ci.org/mosbth/mumin/builds/46733462).

Allt fungerar och jag mergar min branch med min master.

```text
$ git checkout master
$ git merge v6
$ git commit -a -m "phpunit with Anax MVC dependency"
$ git push
```

Det gick bra. Ibland blir man förvånad när -- synbarligen avancerade saker -- bara fungerar. Men det har väl med att göra att man blir bättre och bättre på det man gör.

Jag taggar denna versionen av Mumin som [v6.0](https://github.com/mosbth/mumin/tree/v6.0). 

Här är länken till den [sista builden på Travis](https://travis-ci.org/mosbth/mumin/builds/46734615), så kan du se att det gick bra.



Avslutningsvis {#avslutningsvis}
--------------------------------------

Som du ser så kan ett ramverk vara en modul i sig. Ibland får man fundera på vem som inkluderar vem. Men det blir faktiskt rätt smidigt i längden - det här med moduler, `composer` och packagist. Bara man får ordning på grunderna.

Tekniken som jag använder när jag testar sessionen är att fylla den med de värden som jag kan använda för mina tester. Om jag nu skulle testa en klass som hanterar inloggning så skulle jag göra på samma sätt. Jag behöver bara sätta rätt saker i sessionen inför varje testfall.

Detta är ett bra sätt att testa saker i sessionen. Men taktiken fungerar lika bra när man testar kod som har ett beroende mot `$_GET`, `$_POST` och `$_SERVER` -- som du normalt implementerar via ramverkets tjänster [`$di->request`](https://github.com/mosbth/Anax-MVC/blob/master/src/Request/CRequestBasic.php).


Det finns ett foruminlägg för [denna artikel](t/3477) om du vill diskutera eller ställa frågor.




