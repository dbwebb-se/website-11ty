---
author: mos
category: php
revision:
  "2014-12-15": (A, mos) Första utgåvan.
updated: "2014-12-15 11:16:51"
created: "2014-12-15 11:15:35"
...
PHPUnit och testa modul som är beroende av databas 
==================================

Hur gör man om man vill använda PHPUnit för att testa en modul som har ett beroende till en databas? Finns det något enkelt sätt att göra det på? 

Här får du ett exempel på hur du kan enhetstesta en modul som använder sig av en databas. I exemplet används SQLite som databas men taktiken fungerar på godtycklig databas.

<!--more-->

Denna artikel bygger vidare på artikeln "[Använd PHPUnit och Travis för att enhetstesta modul som har externt beroende](kunskap/anvand-phpunit-och-travis-for-att-enhetstesta-modul-som-har-externt-beroende)" och använder samma [källkod som exempelkod](https://github.com/mosbth/mumin).



Innan vi sätter igång {#start}
--------------------------------------

Jag utgår från version [v4.0 av mosbth/mumin](https://github.com/mosbth/mumin/tree/v4.0). Jag utvecklar exemplet i en [branch v5](https://github.com/mosbth/mumin/tree/v5). När jag är klar med detta exempel så taggar jag den färdiga koden som [v5.0](https://github.com/mosbth/mumin/tree/v5.0).

Du kan checka ut din egen kopia så här och växla mellan versionerna.

```bash
$ git clone https://github.com/mosbth/mumin.git
$ git checkout v4.0
$ git checkout v5
$ git checkout v5.0
```

Du ser att du kan växla mellan olika brancher och taggar via `git checkout`.



Modul beroende av databasen {#beroende}
--------------------------------------

Jag tänker mig en modul som är beroende av en databas. I detta fallet skapar jag en ny klass `MumintrolletDatabase` som ärver från `Mos\Database\CDatabaseBasic`. 

```php
class MumintrolletDatabase extends \Mos\Database\CDatabaseBasic
{
```

Jag implementerar en metod som gör en sökning i databasen. Den hämtar kolumnen "name" från raden med id = 1 i tabellen "test".

```php
    /**
    * My name is - from database.
    *
    * @return string
    *
    */
    public function getNameFromDatabase()
    {
        $this->select("name")
           ->from("test")
           ->where("id = ?")
        ;

        $res = $this->executeFetchAll([1]);
        $name = isset($res[0]->name) ? $res[0]->name : false;
        return $name;
    }
```

Metoden förutsätter att objektet (instansen) redan har en koppling till databasen. Det gör jag för att minska detta exemplets omfattning.



Utveckla och testa ny kod i en branch {#fbranch}
--------------------------------------

När jag ändå håller på så tänkte jag att jag skapar en ny branch för att utveckla koden. Det finns ju användare som använder koden på GitHub och de vill jag inte störa. Tanken är alltså att skapa en ny branch, utveckla i den, testa och sen när allt är klart så mergar jag ihop branchen med master och taggar.

Jag visar hur jag gör detta, som en del av artikeln. Det kan vara bra att veta hur man kan jobba på detta sättet.

Jag skapar en ny branch och sätter igång och kodar min nya klass.

```bash
$ git checkout -b v5
```

Här är [klassen när den är klar](https://github.com/mosbth/mumin/blob/v5/src/Mumin/MumintrolletDatabase.php) (i branchen v5).

Läs mer om konceptet [Feature Branch](http://martinfowler.com/bliki/FeatureBranch.html).



Testfall för metod beroende av databasen {#testfall}
--------------------------------------

Då sätter jag igång och kodar testfallen för klassen. Här är den färdiga [koden för testklassen](https://github.com/mosbth/mumin/blob/v5/test/Mumin/MumintrolletDatabaseTest.php) (branch v5).

Det jag först gjorde var att implementera metoden `setUpBeforeClass()`. Det är en metod som anropas en gång, innan alla testfallen utförs.

```php
class MumintrolletDatabaseTest extends \PHPUnit_Framework_TestCase
{
    static private $mumin;
    const NAME =  "Mumintrollet in db";

    /**
     * setUpBeforeClass, called once for all tests in this class.
     *
     * @return void
     *
     */
    public static function setUpBeforeClass()
    {
        self::$mumin = new \Mos\Mumin\MumintrolletDatabase();
        self::$mumin->setOptions(['dsn' => "sqlite:memory::", "verbose" => false]);
        self::$mumin->connect();
        self::$mumin->dropTableIfExists("test");
        self::$mumin->execute();
        self::$mumin->createTable(
            'test',
            [
                'id'    => ['integer', 'auto_increment', 'primary key', 'not null'],
                'name'  => ['varchar(20)'],
            ]
        );
        self::$mumin->execute();
        self::$mumin->insert(
            'test',
            ['name']
        );
        self::$mumin->execute([self::NAME]);

        /*
        self::$mumin->select("*")
            ->from("test")
        ;
        var_dump(self::$mumin->executeFetchAll());
        */
    }
```

Metoden skapar en instans av min klass som jag vill testa. Den använder instansen för att koppla upp sig mot en testdatabas, en testdatabas som jag skapar enbart för testsyftet. Jag vill ju att Travis skall kunna bygga och testa modulen utan att vara beroende till en extern databas. Så, jag skapar en databas speciellt för syftet att testa modulen. 

I metoden så kopplar jag mig mot databasen och skapar en tabell och lägger in en rad. Det räcker för mitt testfall.

Metoden är `static` så jag får hantera instansen som en statisk medlemsvariabel. En statisk metod kan endast nå statiska medlemsvariabler. Men det är inget problem i sig.

Nu kan jag skapa själva testfallet.

```php
    /**
     * Test
     *
     * @return void
     *
     */
    public function testGetNameFromDatabase()
    {
        $res = self::$mumin->getNameFromDatabase();
        $exp = self::NAME;
        $this->assertEquals($res, $exp, "The name does not match name from db.");
    }
```

Nu kan jag köra phpunit på kommandoraden och det ser bra ut.

```text
$ phpunit                                   
PHPUnit 4.1.0 by Sebastian Bergmann.                           
                                                               
Configuration read from /home/mos/git/mumin/phpunit.xml.dist   
                                                               
....                                                           
                                                               
Time: 220 ms, Memory: 13.00Mb                                  
                                                               
OK (4 tests, 4 assertions)                                     
                                                               
Generating code coverage report in Clover XML format ... done  
                                                               
Generating code coverage report in HTML format ... done        
```

Perfekt. Ju fler test, desto bättre känns det när man inför nya funktioner och märker att man testar hela sitt system. 



Travis testar alla branchar {#travisb}
--------------------------------------

Nu vill jag testa min branch så att den fungerar med Travis. Det vill jag göra innan jag mergar min branch med min master. Det går alldeles utmärkt eftersom Travis checkar ut samtliga mina branchar och testar dem. Jag behöver alltså inte göra något särskilt för att min nya branch skall testas. Det är bara att checka in den till GitHub som vanligt och Travis hämtar ut den för att testa.

Travis kunde hantera min SQLite-databas som jag skapade i minnet så det gick utmärkt att utföra testerna. 

Här kan du se hur [Travis jobbade med min branch v5](https://travis-ci.org/mosbth/mumin/builds/44075099).



Merga min branch med master {#merga}
--------------------------------------

Nu tar jag och mergar min branch med master. Du kan läsa mer om hur man branchar och mergar i Gits manual om [Git Branching - Basic Branching and Merging](http://git-scm.com/book/en/v2/Git-Branching-Basic-Branching-and-Merging).

```text
$ git checkout master
Switched to branch 'master'
Your branch is up-to-date with 'origin/master'.

$ git merge v5
Updating 21bacff..b48c3f3
Fast-forward
 .travis.yml                             |  1 +
 src/Mumin/MumintrolletDatabase.php      | 54 +++++++++++
 test/Mumin/MumintrolletDatabaseTest.php | 97 +++++++++++++++++++++++
 3 files changed, 152 insertions(+)
 create mode 100644 src/Mumin/MumintrolletDatabase.php
 create mode 100644 test/Mumin/MumintrolletDatabaseTest.php
```

Sen pushar jag master för att testa att det gick bra. Travis kommer snart att ge mig ett betyg på min insats.

Det gick bra. Här är länken till den [sista builden på Travis](https://travis-ci.org/mosbth/mumin/builds/44078090), så kan du se att det gick bra.

Jag taggar denna versionen av Mumin som [v5.0](https://github.com/mosbth/mumin/tree/v5.0). 

Jag låter branchen [v5](https://github.com/mosbth/mumin/tree/v5) ligga kvar som exempel, egentligen skulle jag tagit bort den när allt är klart -- den har normalt spelat ut sin roll.



Test double {#testdouble}
--------------------------------------

När man testar moduler som har externa beroenden så kan det underlätta att tänka i termer av *test doubles*. I manualen för PHPUnit kan vi läsa om [begreppet test doubles](https://phpunit.de/manual/current/en/test-doubles.html). Det står så här.

> "Sometimes it is just plain hard to test the system under test (SUT) because it depends on other components that cannot be used in the test environment. This could be because they aren't available, they will not return the results needed for the test or because executing them would have undesirable side effects. In other cases, our test strategy requires us to have more control or visibility of the internal behavior of the SUT."

> "When we are writing a test in which we cannot (or chose not to) use a real depended-on component (DOC), we can replace it with a Test Double. The Test Double doesn't have to behave exactly like the real DOC; it merely has to provide the same API as the real one so that the SUT thinks it is the real one!"

[Konceptet Test Double är också omskrivet på Wikipedia](https://en.wikipedia.org/wiki/Test_double). 

Sättet som vi hanterar databasen på, är en variant av test double, vi skapar, så att säga, ett objekt som underlättar att testa modulen.



Mer testning mot databas {#dbphpunit}
--------------------------------------

I manualen för PHPUnit finns ett eget [kapitel för testning mot databasen](https://phpunit.de/manual/current/en/database.html), där läser vi följande.

> "Many beginner and intermediate unit testing examples in any programming language suggest that it is perfectly easy to test your application's logic with simple tests. For database-centric applications this is far away from the reality."

Därefter följer en beskrivning av de delar av PHPUnit som finns för att underlätta testning med databaser. Men, i mitt exempel så valde jag inte den vägen. Jag ville ha något enklare och bedömde att min variant -- `setUpBeforeClass()` och en (SQLite) databas i minnet med innehåll skapat av testfallet -- var tillräckligt för att lösa denna och flera andra typer av enklare testfall.



Avslutningsvis {#avslutningsvis}
--------------------------------------

För att lyckas med enhetstestning så bör man följa den enkla principen att bygga moduler som har få beroenden. Om det finns beroenden så får man göra dem testbara. Att jobba med variationer av test doubles underlättar att testa moduler som har externa beroenden.

Det finns ett foruminlägg för [denna artikel](t/3383) om du vill diskutera eller ställa frågor.




