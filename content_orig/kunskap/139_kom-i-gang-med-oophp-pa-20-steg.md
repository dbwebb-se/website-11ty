---
author: mos
category:
    - php
    - kursen oophp
revision:
    "2017-03-22": "(H, mos) Delad i två delar inför oophp-v3 och rejält genomarbetad."
    "2015-04-01": "(G, mos) Länk till exempelprogram rättat i sektion 8."
    "2015-02-01": "(F, mos) Tog bort bildlänk till Dilbert."
    "2014-11-26": "(E, mos) Uppdaterade länkar till php.net."
    "2014-09-13": "(D, mos) Ändrade $name till $method."
    "2014-09-08": "(C, mos) Ändrade __construct till _destruct."
    "2013-11-12": "(B, mos) Uppdatering inför campus-kursen ht13."
    "2013-08-14": "(A, mos) Första utgåvan som en del av kursen oophp, endast del 1-11, del 12-20 kvarstår."
...
Kom igång med objektorienterad PHP-programmering på 20 steg
==================================

Denna guide hjälper dig att komma igång med objektorienterad programmering i PHP. Via 20-talet steg så leds du in i ett objektorienterat tankesätt och du får möjlighet att på egen hand pröva de vanligaste objektorienterade konstruktionerna i PHP. 

Det bästa sättet att gå igenom guiden är att läsa exemplen och sedan pröva dem själv. Skapa en egen exempelsida där du testar olika kod-konstruktioner. Du måste testa själv för att lära dig. 

<!--more-->

> **Du måste själv skriva koden, det finns inga genvägar.**



Förkunskaper {#forkunskaper}
-------------------------------------------------------------------------------

Guiden förutsätter att du har goda kunskaper i PHP, webbutveckling och du kan vissa grunder i objektorientering. Känner du dig osäker på PHP så bör du först läsa igenom guiden ["Kom i gång med PHP på 20 steg"](kunskap/kom-i-gang-med-php-pa-20-steg).



Objektorienterad programmering {#om}
-------------------------------------------------------------------------------

Objektorienterad programmering är *en* programmeringsparadigm [^1] bland flera. Ett programmeringsspråk sorteras vanligen in i en programmeringsparadigm för att beskriva hur man kan koda i det. Fler och fler språk stödjer flera programmeringsparadigmer, man kan alltså välja hur man skriver sin kod. Ett vanligt sätt att lära sig programmera är "procedural programmering" [^2]. Det är på det sättet du programmerar i guiden ["Kom i gång med PHP på 20 steg"](kunskap/kom-i-gang-med-php-pa-20-steg). Men nu handlar det alltså om den objektorienterade programmeringsparadigmen [^3]. 

I objektorientering finns det objekt. Ett objekt har medlemsvariabler (properties) och metoder (jämför med funktioner). Medlemsvariablerna används för att lagra ett *state* av ett objekt, ett visst läge som definieras av värdet på medlemsvariablerna. När man vill ändra ett läge för objektet, eller bara använda objektet för att utföra en uppgift, då använder man dess metoder. Metoderna är en förteckning över vad objektet kan göra.

Ett objekt har all sin förmåga samlad i metoder och properties. Allt som objektet behöver lagra finns i dess medlemsvariabler och allt man kan göra med objektet exponeras via dess metoder. Exakt hur objektet verkställer saker och ting är objektets ansvar. Man kan säga att objektet *kapslar in* detaljerna för implementation och erbjuder endast ett publikt API [^9] i form av metoderna. Själva implementationen av metoderna är en sak för objektet själv. 

Ett objekt skapas utifrån en klass. En klass är en mall utifrån vilken man kan skapa nya objekt. När man skapat ett objekt kallas det en instans av klassen. Att skapa ett objekt kan kallas att instansiera [^10] klassen till ett objekt, eller att instansiera ett objekt av klassen.

PHP stödjer objektorientering via klasser, objekt och de vanliga objektorienterade konstruktionerna som normalt förekommer i objektorienterade programmeringsspråk. Objektmodellen i PHP kom i version 5 av språket, i tidigare versioner fanns en förenklad implementation av objektorientering. 


Vår bästa vän är som vanligt manualen som har beskrivningar över datatypen ["object"](http://php.net/manual/en/language.types.object.php) och en översikt över det som hör till [objekt och klasser](http://php.net/manual/en/oop5.intro.php) i övrigt.

> *Referensmanualen är din bästa vän.*

Låt oss skriva en klass.



Klasser och objekt i PHP {#klasser}
-------------------------------------------------------------------------------

Låt oss kika på grunden i PHP och klasser.



###Visa felutskrifter {#fel}

Innan vi börjar så sätter vi på visning av felutskrifter, vi vill kunna se de fel som händer.

Jag väljer att göra en fil `config.php` där jag lägger sådan generell konfiguration.

```php
<?php
/**
 * Set the error reporting.
 */
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors
```

Bra, det blir enklare om vi kan se felen. Då börjar vi.



###En klass i PHP {#en-klass}

Så här ser en klass enkel klass `Simple` i PHP. Ta koden och spara i filen `Simple.php`.

```php
class Simple
{
    /**
     * Property declaration
     */
    public $var = "A default value ";
    public $val = 0;

    /**
     * A method declaration.
     */
    public function displayVar()
    {
        $this->val++;
        echo $this->var . $this->val;
    }
}
```

Exemplet är taget från stycket ["The Basics"](http://php.net/manual/en/language.oop5.basic.php) i manualen (och lite modifierat). Om du redan kan ett annat objektorienterat språk så är det vara en god idé att läsa igenom manualen. Det ger dig snabbt en känsla av hur PHP fungerar med objektorienterade konstruktioner.



###Använda klassen i ett testprogram {#test-klass}

Nu är det dags att skapa ett testprogram som använder klassen. Jag behöver en testfil där jag kan inkludera klassfilen, skapa ett objekt av klassen och sedan använda objektets metoder och medlemsvariabler.

Så här kan ett enkelt testprogram se ut.

Skapa en ny fil `test_Simple.php` och lägg dit följande kod.

```php
<?php
// Get general settings
require "config.php";

// Get the class file for Simple
require "Simple.php";

// Create an object of the class
$obj = new Simple();

// Use the class
echo "<p>";
$obj->displayVar();
echo "</p>";

// Change the state of the object and use it again
$obj->var = "Hello World (should now be 2) = ";
echo "<p>";
$obj->displayVar();
echo "</p>";
```

Om du kör testprogrammet så kan det se ut som följer.

[FIGURE src=/image/snapvt17/oophp20-1.png?w=w2 caption="Utskrift från testprogrammet."]

Så, där är grunderna. Nu ser du hur du skapar en klass tillsammans med dess medlemsvariabler och metoder. Du ser hur du skapar ett objekt av klassen och hur du använder det genom att anropa metoden och genom att ändra värdet på dess medlemsvariabel.



###Felmeddelanden {#fel}

Innan vi går vidare så dubbelkollar vi att felmeddelanden verkligen visas. Du kan simulera ett fel genom att gå in i klassmetoden `Simple::DisplayVar()` och ta bort ett semikolon.

Din PHP-installation kan visa felen på olika sätt, i min installation ser det ut så här.

[FIGURE src=/image/snapvt17/oophp20-2.png?w=w2 caption="Felmeddelanden visas."]

Bra, då vet vi att felmeddelanden visas.



###Vad är $this? {#this}

Variabeln `$this` är en referens till nuvarande objekt och används i klassens metoder för att referera det objekt som anropar metoden.

En metod anropas med ett objekt, så här:

```php
$obj->displayVar();
```

När anropet befinner sig i metoden så används `$this` för att referera till det objekt som anropade metoden, i detta fallet `$obj`.

```php
    public function displayVar()
    {
        $this->val++;
        echo $this->var . $this->val;
    }
```

Så, i detta fallet så är alltså `$this` samma sak som `$obj`. Klassens metoder innehåller generell kod som fungerar för alla objekt av klassen och `$this` är alltså sättet att referera till den anropande klassen och dess specifika medlemsvariabler.

För att komma åt medlemsvariabeln `$var` så skriver du `$this->var` i din metod.



En klass för en tärning {#oophp}
-------------------------------------------------------------------------------

Man måste koda själv, annars lär man sig föga.

Jag behöver ett exempelprogram och känner för att göra en tärning. Det blir ett bra exempel på hur en klass kan byggas upp. Jag tänkte bygga upp den steg för steg så att den fungerar som ett exempel på olika objektorienterade konstruktioner i PHP.


###En tärningssida med PHP och HTML {#dicepage}

För att simulera en tärning så räcker det gott med följande traditionella kod som rullar en tärning sex gånger och visar upp resultatet.

Jag lägger fölande kod i filen `test_dice1.php`.

```php
<?php
require "config.php";
?><!doctype html>
<meta charset="utf-8">
<title>Tärning</title>
<h1>En tärning</h1>
<p>Tärningen kastas 6 gånger, här är resultatet.</p>

<?php
// To save the outcome of each dice roll
$rolls = [];

// Roll the dice
$times = 6;
for ($i = 0; $i < $times; $i++) {
  $rolls[] = rand(1, 6);
}

// Print out the results
$html = "<ul>";
foreach ($rolls as $val) {
  $html .= "<li>{$val}</li>";
}
$html .= "</ul>";
?>
<?= $html ?>
```

Koden skapar en HTML-sida steg för steg och blandar med PHP-kod som simulerar en tärning.

Om man kör exemplet kan man få följande resultat.

[FIGURE src=image/snapvt17/oophp20-3.png?w=w2 caption="Tärningen slås sex gånger, ladda om sidan för en ny runda."]

Så, det var grunden för en tärning.



###Skapa en tärningsklass {#diceclass}

Låt oss nu göra om delar av koden, till en klass, steg för steg. Vi ser i koden att vi har en array där vi lagrar alla tärningskast och en loop där vi kastar tärningen och slutligen skrivs resultatet ut. Nu är det fritt fram hur du kan organisera din kod för att göra den objektorienterad med klasser och objekt.

Jag gör så här, först en klass som jag döper till `Dice` och sparar i filen `Dice.php`.

```php
<?php
/**
 * A Dice class to play around with a dice.
 */
class Dice
{

  // Here comes properties & methods

}
```

Detta är grunden till klassen.


###Klass med properties och metoder {#diceprop}

Nu kan jag stoppa in arrayen som en medlemsvariabel och koden som kastar tärningen blir en metod. 

Jag uppdaterar min kod.

```php
class Dice
{
    /**
     * Properties
     */
    public $rolls = [];


    /**
     * Roll the dice
     *
     * @param integer $times number of times to roll the dice.
     *
     * @return void
     */
    public function roll($times)
    {
        $this->rolls = [];

        for ($i = 0; $i < $times; $i++) {
            $this->rolls[] = rand(1, 6);
        }
    }
}
```

När du är i en metod och vill peka ut en medlemsvariabel så använder du `$this` som är en referens till nuvarande objekt, det objekt som användes för att anropa metoden. Vi har alltså en medlemsvariabel `$rolls` och för att komma åt den i en metod så använder vi `$this->rolls`. Det är så det funkar.

Du kan läsa om medlemsvariabler, eller [properties](http://php.net/manual/en/language.oop5.properties.php), i manualen.



###Exempelprogram som använder Dice {#usedice}

Så, det får räcka, jag tar en kopia av mitt gamla exempelprogram och skriver om det så att det använder klassen istället. Jag sparar det som `test_Dice2.php`.

Poängen är att skapa ett objekt av klassen och använda det. Så här ser min uppdatering ut.

```php
<?php
require "config.php";
require "Dice.php";
?><!doctype html>
<meta charset="utf-8">
<title>Tärning</title>
<h1>En tärning</h1>
<p>Tärningen kastas 6 gånger, här är resultatet.</p>

<?php
// Create an instance of the class
$dice = new Dice();

// Roll the dice
$times = 6;
$dice->roll($times);
$rolls = $dice->rolls;

// Print out the results
$html = "<ul>";
foreach ($rolls as $val) {
  $html .= "<li>{$val}</li>";
}
$html .= "</ul>";
?>
<?= $html ?>
```

Kärnan i uppdateringen är att skapa ett objekt av klassen och använda det.

```php
// Create an instance of the class
$dice = new Dice();

// Roll the dice
$times = 6;
$dice->roll($times);
$rolls = $dice->rolls;
```

Utskriften av resultatet kunde jag återanvända. Det var bra.



###Summan av tärningsslagen {#dicetotal}

Visst vore det trevligt om tärningen själv kunde räkna ut summan av alla slagen? Det innebär att vi bygger ut klassen med en metod som gör beräkningen. 

Metoden `Dice::getTotal()` kan se ut så här.

```php
    /**
     * Get the total from the last roll(s).
     *
     * @return integer as sum of rolled dices.
     */
    public function getTotal()
    {
        return array_sum($this->rolls);
    }
```

Smidigt med inbyggda funktioner.

Visst kan jag lägga koden utanför klassen, men nu är tanken att tänka objektorienterat och kapsla in all kod som har med tärningen att göra. Jag får all kod som är relaterad till en tärning i en klass. Koden blir enkel att återanvända. Klasser är en bra struktur som underlättar återanvändning av kod.

Du kan nu uppdatera ditt testprogram för att skriva ut summan av alla tärningsskasten.

```php
<p>Summan av alla tärningar är: <?= $dice->getTotal() ?></p>
```

Resultatet kan se ut så här.

[FIGURE src=image/snapvt17/oophp20-4.png?w=w2 caption="Nu summeras alla tärningsslagen."]

Nu kan du grunderna med klasser och objekt och hur de används. Nu är du redo för en övning.



###Övning Dice {#ovning-1}

Fortsätt nu själv att bygga ut din klass. Här är ett par förslag på funktioner som gör exempelprogrammet lite mer avancerat.

1. Skicka in en parameter till sidan, via querystringen `?roll=6`, som säger hur många slag du skall slå.
1. Lägg in en metod i klassen som returnerar antalet slag som slagits.
1. Skriv ut hur många slags som gjordes.
1. Skriv ut summan och medelvärdet (ny metod) av alla tärningsslagen.

Så här kan det se ut.

[FIGURE src=image/snapvt17/oophp20-5.png?w=w2 caption="Tärningar med valfritt antal snittvärdet."]

Bra, nu kan du både skapa en klass, använda den och bygga ut den med nya metoder.



Bygg en klass {#klassfil}
-------------------------------------------------------------------------------

Så där ja, då har vi kommit igång. Vi fortsätter och bygger till ett histogram [^4] till tärningen, ett stapeldiagram som visar hur många kast som blir etta, tvåa och så vidare.

Klassen `Histogram` och klassen `Dice` skall inte vara beroende av varandra, de känner inte till varandra, det som knyter ihop dem är användandet i test-filen.



###Övning Histogram {#ovning-2}

Gör följande.

1. Skapa en klass `Histogram` som kan skriva ut statistik om tärningsserien.

1. Skapa metoden `setSerie()` som tar en array med värden som argument.

1. Skapa metoden `getSerie()` som returnerar en strängrepresentation av alla värden i kastserien.

1. Skapa en metod `getHistogram()` som returnerar en strängrepresentation av ett histogram. Sortera utskriften på tärningarna i stigande ordning.

1. (EXTRA) Gör en variant av metoden `getHistogram()`, som sorterar histogrammet i stigande eller sjunkande ordning baserat på antalet tärningar. Mest tärningar börjar, eller omvänt.

Så här kan det se ut, utan extrauppgiften.

[FIGURE src=/image/snapvt17/oophp20-6.png?w=w2 caption="Ett histogram över tärningskast."]

Det var ytterligare en klass. Bra, bra. Det flyter på.



Autoload för klassfiler {#autoload}
-------------------------------------------------------------------------------

När antalet klasser växer blir det till slut krångligt att inkludera alla klassfilerna, i rätt ordning, där de behövs. Med hjälp av PHP's [automatiska laddning av klassfiler](http://php.net/manual/en/language.oop5.autoload.php) så blir det mycket lättare, och dessutom snyggare kod.



###Om autoload {#omautoload}

Autoload är en funktion som vi själva skriver och som anropas första gången som ett objekt skapas av en klass. Tanken är då att funktionen laddar in klassfilen, så att vi slipper hantera inkluderingen av klassfilerna. Autoload har alltså koll på var klassfilerna finns någonstans och inkluderar dem vid behov.

I PHP finns det en variant där man skapar funktionen [`__autoload()`](http://php.net/manual/en/function.autoload.php), men ett bättre sätt är att använda [`spl_autoload_register()`](http://php.net/manual/en/function.spl-autoload-register.php).

Fördelen med spl_autoload_register är att man kan ha flera funktioner för autoloading, det är bra när man använder någon annans kod som kan ha en annorlunda struktur för att lagra och namnge klassfilerna.



###En autoloader {#enautoloader}

Låt oss skapa en autoladdare för våra klassfiler, implementationen förutsätter att klassfilerna ligger i samma katalog som det anropande skriptet.

Lägg följande kod i filen `autoload.php`.

```php
<?php
/**
 * Autoloader for classes.
 *
 * @param string $class the name of the class.
 */
spl_autoload_register(function ($class) {
    $path = "{$class}.php";
    if (is_file($path)) {
        include($path);
    }
});
```

Konstruktionen är att jag bifogar en funktion som kan hitta den klassfil som efterfrågas, och inkludera den.



###Var inkludera autoloadern? {#includeauto}

I dina skript kan du nu ta bort alla require av klasserna och ersätta den med din autoloader.

Om du vill så kan du anropa autoloadern i din config.php.

Eller så inkluderar du den i varje testskript. Båda varianterna fungerar.



###Övning autoloader {#ovning-3}

Ta en kopia av ditt exempelprogram med histogrammet och skriv om det så att autoloadern används.

1. För att förstå hur autoloadern anropas så kan du lägga till en utskrift i den. Gör en `echo "Autoloading: $class<br>";` för att skriva ut klassens namn, varje gång autoloadern anropas.

Så här kan det se ut.

[FIGURE src=/image/snapvt17/oophp20-7.png?w=w2 caption="Autoloadern skriver ut klassernas namn."]

En autoloader är en väldigt viktig komponent i PHPs infrastruktur. Det finns en standard som heter [PSR-4](http://www.php-fig.org/psr/psr-4/) som anger hur autoloading skall fungera. Men vår hemmasnickrade autoloader gör ju också sitt jobb, i all enkelhet.

På PHP-FIGs hemsida finner du även standarder för hur vi skriver kod, i form av [PSR-1](http://www.php-fig.org/psr/psr-1/) och [PSR-2](http://www.php-fig.org/psr/psr-2/). Det är de kodstandarder som vi normalt använder då vi validerar vår kod med validatorer som phpcs och phpmd.



Konstruktor och destruktor {#construct}
-------------------------------------------------------------------------------

Konstruktorn är en metod `__construct()` som anropas när ett objekt skapas. Destruktorn är en metod `__destruct()` som anropas när ett objekt förstörs. Ett objekt förstörs när programmet avslutas, eller i förtid genom att något gör _delete_ på variabeln som innehåller objektet med hjälp funktionen [`unset()`](http://php.net/manual/en/function.unset.php).



###Använd konstruktor och destruktor {#useconstruct}

Konstruktor anropas när ett objekt skapas. Om metoden finns så anropas den tillsammans med `new`. 

Så här ser en konstruktor ut.

```php
/**
 * Constructor.
 *
 * @return self
 */
public function __construct() 
{
    echo __METHOD__ . "<br>";
}
```

Konstruktorn anropas automatiskt, om den finns, när objektet skapas med `new`. I konstruktorn kan du initiera klassen, du kan ge den en standardinställning, genom att sätta värden på medlemsvariabler.

Konstruktorn gör en implicit return av den nyskapade klassen `self` som noteras i docblocken.

Konstanten `__METHOD__` är en PHP konstant som motsvarar namnet på den metod den befinner sig i.

```php
// Create a object and the constructor is called
$obj = new Dice();
```

På samma sätt fungerar destruktorn.

```php
/**
 * Constructor.
 *
 * @return void
 */
public function __construct() 
{
    echo __METHOD__ . "<br>";
}
```

Destructorn anropas antingen när skriptet är färdigt, eller när man explicit raderar ett objekt med `unset()`.

```php
// Delete the object and the destructor is called
unset($obj);
```

I destruktorn städar du upp, om det behövs. I PHP är det sällan du behöver skriva en destruktor. Ofta sköts uppstädningen i slutet av koden och du behöver inte tänka på minneshantering. Men i vissa fall kan det krävas, till exempel om du har öppnat en fil som du vill stänga eller om du vill logga något i samband med att klassen stängs ned.

[FIGURE src=image/snapvt17/oophp20-constructor-destructor.png?w=w2 caption="Utskrift för när konstruktor och destruktor anropas i klassen `DiceConstruct`."]

Läs gärna snabbt om grunderna för [konstruktorer och destruktorer i manualen](http://php.net/manual/en/language.oop5.decon.php).



###Konstruktor i tärningsklassen {#constrdice}

Ett exempel där en konstruktor är användbar är i tärningsklassen. Säg att vi vill göra det konfigurerbart hur många sidor tärningen har. Då behöver vi en medlemsvariabel som lagrar antalet sidor, `$faces`. Standardvärdet kan vara 6, men genom att skicka in en parameter till konstruktorn så kan detta sättas till en valfri siffra, en tärning med flexibelt antal sidor [^5].

Så här kan det se ut i klassen.

```php
<?php
    /** @var integer The number of faces of the dice. */
    public $faces;


    /**
     * Constructor. 
     *
     * @param int $faces the number of faces to use.
     * 
     * @return self
     */
    public function __construct($faces=6)
    {
        $this->faces = $faces;
    }
```

Konstruktorn tar nu emot ett argument, om du inte skickar med ett argument så får det standard-värdet 6.

För att skapa ett objekt av klassen gör du nu så här.

```php
// Create the objects
$dice1 = new Dice();   // Uses default wich is 6 faces
$dice2 = new Dice(12); // Sets the number of faces to 12
```

Detta var grunden i konstruktor och destruktor.



###Övning tärning många sidor {#ovning-4}

Utöka dina klasser på följande sätt och testa att de fungerar.

1. Lägg till konstruktor och destruktor i Dice och Histogram som skriver ut att den anropas.

2. Gör så att Dice kan ha ett valfritt antal sidor genom argument i konstruktorn.

3. Utöka testprogrammet så att tärningens sidor skickas som en parameter till sidan (`?roll=6&faces=12`).

4. Gör en ny metod i Histogram som visar även de staplar som är tomma, döp den till `getHistogramIncludeEmpty()` och skicka in tärningens antal sidor som ett argument till funktionen.

5. Lägg till en säkerhetskontroll att man inte kan kasta tärningen fler än 999 gånger, så att servern inte lastas ned av någon obehörig.

Så här blev det för mig.

[FIGURE src=image/snapvt17/oophp20-faces.png?w=w2 caption="Ett histogram över en 12-sidig tärning, nu även med tomma värden."]



Rita diagram över dina klasser {#uml}
-------------------------------------------------------------------------------

Vårt exempel växer, än så länge är det bara två klasser och ett fåtal metoder, men det växer. I sista övningen så märkte du hur jag valde att hantera histogrammet och hur jag lät det veta hur många sidor tärningen har. Exakt hur man löser en sak kan man fundera på, det finns många alternativ. När man blir mer varm i kläderna så vet man vilka strukturer som är att föredra, men när man är nybörjare så är det viktigare att lösa problemet. När man väl löst problemet så kan man ta ett steg tillbaka och studera lösningen och kritiskt granska den, blev det tillräckligt bra?



###Klassdiagram med UML {#ritauml}

Ett sätt som kan hjälpa dig att få en översikt över dina klasser, är att rita ett diagram över dem. I objektorienterad modellering används ofta Unified Modelling Language (UML) [^11] som en syntax när man ritar diagram. Det finns många typer av diagram i UML. Ett av de vanligare är klassdiagrammet [^12] som visar klasserna med sina medlemsvariabler och metoder samt hur de olika klasserna hänger ihop.

Så här kan ett klassdiagram se ut för vårt exempelprogram, så här långt.

[FIGURE src=image/snapvt17/oophp20-uml-classdiagram.png caption="Ett klassdiagram i UML för Dice och Histogram."]

De båda klasserna är fristående så de har inget sepciellt som förbinder dem. Man kan lägga in klassernas medlemmar i diagrammet men jag nöjer mig med att rita lådorna för att få en översikt över klasserna.

Ett klass-diagram är ett statiskt diagram som visar strukturen över koden.



###Sekvensdiagram {#sekvensdia}

Det finns diagram som visar dynamiken i systemet när det arbetar, ett sådant diagram, sekevensdiagrammet[^13], visar hur ett anrop går genom systemet och vilka delar av systemet som berörs.

Så här kan man definiera flödet i programmet, som är grunden till ett sekvensdiagram.

Följande är flödet i testprogrammet från övning 4.

```text
title A Dice Sequence Diagram

note left of dice.php:      ?roll=12&faces=12
dice.php->config.php:       include
dice.php->autoloader.php:   include
dice.php->Dice:             new Dice($faces)
dice.php->Histogram:        new Cistogram()
dice.php->Dice:             roll($times)
dice.php->Dice:             $rolls=getRollsAsArray()
dice.php->Histogram:        setSerie($rolls)
dice.php->Histogram:        getHistogramIncludeEmpty()
dice.php->Dice:             getTotal()
dice.php->Dice:             getAverage()
note left of dice.php:      now render the page
```

Sedan kan vi använda webbtjänsten [Web sequence diagrams](https://www.websequencediagrams.com/) för att rita upp diagrammet. Så här kan den resulterande bilden se ut när sekvensdiagrammer ritas ut.

[FIGURE src=image/snapvt17/oophp20-sequence-diagram.png?w=w2 caption="Ett sekvensdiagram över övning 4, visar ordningen av flödet mellan komponenterna."]

Klassdiagram och sekvensdiagram är två enkla men kraftfulla verktyg för att få en översyn av vad som händer i ens system.

Kom i håg att skissa enkla diagram på ett papper, för din egen skull, så fort du behöver en överblick över vad som händer.



Synlighet med public, protected och private {#synlighet}
-------------------------------------------------------------------------------

När du gör en klass så bestämmer du hur medlemsvariabler och metoder skall vara synliga utanför klassen. Det gör du med nyckelorden `public`, `private` och `protected`. 

* **Publik** synlighet innebär att klassens användare kan läsa och uppdatera medlemsvariabler och anropa metoder.
* **Privat** synlighet innebär att klassens användare *inte* kan läsa eller uppdatera medlemsvariabler och *inte* kan anropa metoder.
* **Protected** påverkar synlighet i en arvshierarki och anger om metod/variabel är synlig för subklassen.

Du kan läsa om [synlighet i manualen](http://php.net/manual/en/language.oop5.visibility.php).



###Varför skydda implementationen av en klass? {#inkapsling}

I vår tärning så är alla medlemmar och metoder satta till publika. Det innebär att användaren av objektet kan både läsa och skriva till objektets medlemsvariabler. Normalt vill vi skydda klassens implementation och bara det som verkligen behövs skall vara synligt utåt. Vi vill skapa ett publikt API till klassen. Ett publikt API ger oss möjligheten att skriva vår interna kod inuti klassen som vi vill, utan att påverka användaren av klassen. Detta är en klar fördel och denna så kallade _inkapsling_ hjälper oss att minska beroenden i koden. 

Du kan alltså se det som  att du skapar ett publikt API för den som använder klassen, men den interna representationen av klassen, och hur klassen utför sin logik, behöver ingen utomstående ha koll på, det löser du som du behagar.

Du kan dessutom förändra klassens interna logik över tiden, så länge du inte förändrar klassens publika API så berör det inte användarna av klassen.

Låt oss nu studera tärningen och fundera hur den borde se ut. Det låter rimligt att lägga medlemsvariablerna som skyddade, det vill säga privata. Det innebär att jag måste erbjuda en metod för att hämta ut tärningsslagen och en metod för att ge svaret på hur många sidor tärningen har. Fördelen blir att jag då själv kan bestämma hur jag lagrar information i mina medlemsvariabler. Jag kan byta format och namn på dem utan att det stör den som använder klassen. Jag vill inte att någon skall kunna ändra antalet sidor på tärningen, när den väl är skapad, så den möjligheten behöver jag inte erbjuda som en metod.



###Klass med privata medlemmar {#priv}

Så här ser klassen ut när den är uppdaterad med privata medlemsvariabler.

```php
class Dice
{
    /** 
     * @var []      The number of rolls made.
     * @var integer The number of faces of the dice.
     */
    private $rolls = [];
    private $faces;
```

Skillnaden är endast `private` kontra `public`.



###Metoder ger läsbarhet av privata medlemmar {#readmethod}

Nu vill jag dessutom erbjuda två metoder, en för att säga hur många sidor tärningen har `getFaces()` och en för att ge slagserien som en array `getRollsAsArray()`. De blir en del av mitt tänkta publika API för klassen.

```php
    /**
     * Get the number of faces.
     *
     * @return integer Number of faces.
     */
    public function getFaces()
    {
        return $this->faces;
    }


    /**
     * Get the rolls as an array.
     *
     * @return [] Array with all rolls made.
     */
    public function getRollsAsArray()
    {
        return $this->rolls;
    }
```

På detta viset erbjuder jag läsbarhet av klassens interna medlemmar, utan att exponera dem.

Varken i klassen tärning eller histogram hittade jag någon metod som var kandidat till att bli privat. Men, vi håller ögonen öppna, en privat metod kan inte anropas av klassens användare och den används enbart inuti klassen.


###Övning privata medlemmar {#ovning-5}

Uppdatera din kod enligt följande.

1. Bygg om din klass Dice och Histogram så att alla medlemsvariabler blir privata.

1. Lägg till metoder så att användaren kan läsa av klassens innehåll utan att ha tillgång till de numer privata medlemsvariablerna.

Det blev ingen större ändring, mest en tanke om inkapsling.



Arv {#arv}
-------------------------------------------------------------------------------

Arv [^7] är en vanlig objektorienterad konstruktion. Det handlar om att en klass ärver från en annan klass. Man kan säga att den ärvande klassen utökar, eller specialiserar, basklassen. Basklassen kallas även superklass och den ärvande klassen kallas subklass. Läs om [arv i manualen](http://php.net/manual/en/language.oop5.inheritance.php).

I fallet med tärningen så fick jag precis ett starkt behov av en tärning med en grafisk representation. Låt oss använda det som ett exempel för att visa hur arv fungerar i PHP. Vi skall alltså göra en klass som kan visa en bild på tärningssidan.



###En CSS-sprite för att representera tärningens sidor {#arv-sprite}

Först behöver jag en bild. [Denna blir bra](http://commons.wikimedia.org/wiki/File:Dice-faces_32x32.jpg). Det är en CSS-sprite [^8].

[FIGURE src=img/dice-faces.jpg caption="En CSS-sprite för en sex-sidig tärning."]

Med en stylesheet kan jag visa rätt bild beroende på vilken tärningssida jag vill se. Det handlar om att hantera bilden som en bakgrundsbild och variera  positioneringen så att rätt tärningssida visas.

Här är en stylesheet som visar olika bakgrundsbilder för tärningen.

```css
/**
 * CSS sprite for a dice with six faces.
 */
ul.dice {
    margin: 0;
    padding: 0;
    list-style: none;
}

ul.dice li {
    display: inline-block;
    padding: 0;
    margin: 0 4px 0 0;
    width: 32px;
    height: 32px;
    background: url(img/dice-faces.jpg) no-repeat;
}

ul.dice li.dice-1 { background-position: -160px 0; }
ul.dice li.dice-2 { background-position: -128px 0; }
ul.dice li.dice-3 { background-position:  -96px 0; }
ul.dice li.dice-4 { background-position:  -64px 0; }
ul.dice li.dice-5 { background-position:  -32px 0; }
ul.dice li.dice-6 { background-position:    0   0; }
```

För att rita ut två tärningar i en lista skriver jag följande HTML-kod och matchar med rätt CSS-klass.

```html
<ul class='dice'>
    <li class='dice-1'></li>
    <li class='dice-4'></li>
</ul>
```

Resultatet blir att en etta och en fyra visas. Så funkar det, en mix av HTML, CSS och en bild, en lösning som benämns "CSS-sprite". Fördelen med en CSS-sprite är att alla delar av bilden finns samlade i en enda bild, webbläsaren behöver bara göra en förfrågan för att hämta bilden, alternativet vore sex separata bilder och sex frågor från webbläsaren. CSS-sprite är ett sätt att optimera och snabba upp en webbplats som har många små bilder.



###Ärva klass med `extends` {#extends}

Så, då väljer jag att göra en ny klass `DiceImage` och jag gör det genom att ärva klassen `Dice` med *extends*.

Så här skapar man en ny klass via arv. Det blir en specialiserad klass DiceImage som utökar funktionaliteten i basklassen/superklassen Dice.

```php
/**
 * A Dice class with images.
 */
class DiceImage extends Dice
{
    /**
     * Constructor.
     *
     * @return self
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

I detta läget har klassen DiceImage exakt samma funktioner som dess basklass, bortsett från att den inte erbjuder stöd att använda godtyckligt antal sidor för tärningen. Det ser du genom att konstruktorn inte tar något argument för `$faces`.

Konstruktionen `parent::` är en referens till basklassen. Det är så man kan anropa basklassens konstruktor, det sker inte automatiskt när klassen definierar en egen konstruktor. 

Om jag hade valt att inte definiera en konstruktor så hade klassen ärvt den från basklassen, precis som en vanlig metod.

Nu kan vi börja använda klassen för att testa. Arv kan vara kraftfullt, låt se.



###Konstant för antalet sidor {#arv-konstant}

Det går att definiera konstanter i en klass med nyckelordet `const`. I vår nya klass passar det utmärkt med att ange antalet sidor på tärningen med en konstant. Den grafiska representationen har sex sidor så jag väljer att den nya klassen har ett fast antal sidor, vi kan kalla det en specialisering av basklassens beteende. Jag skickar med antalet sidor i basklassens konstruktor. Det är bra i sig, annars är jag beroende av basklassen, om någon ändrar i basklassens konstruktor, som nu har ett default-argument om sex sidor, så hade även min nya klass förändrats. Det är på gott och ont. Ibland vill man ha ett beroende mellan klasserna, men oftast inte. Nu blir det bättre.

```php
/**
 * A Dice class with images.
 */
class DiceImage extends Dice
{
    /** @var integer FACES Number of faces of the Dice. */
    const FACES = 6;

    /**
     * Constructor.
     *
     * @return self
     */
    public function __construct()
    {
        parent::__construct(self::FACES);
    }
}
```

Jag använder `self::FACES` för att komma åt konstanten. Konstruktionen `self::` är en referens till statiska medlemmar i klassen, det är medlemmar som är tillgängliga för alla instanser av klassen. En konstant har samma värde för alla objekt av klassen, därför använder man `self::` istället för `$this->` som är en referens till ett object, en instans av klassen. 

Läs mer om [konstanter i klasser i manualen](http://php.net/manual/en/language.oop5.constants.php). 

Att skriva konstantens namn med stora bokstäver och eventuellt separerad med underscore, är ett val jag gör, för att följa kodningsstandarden PSR-1.



###Synlighet basklassens medlemsvariabler {#arv-medlem}

Då gör jag en ny metod för att visa upp den grafiska representationen av tärningen, det blir en utökning av basklassens funktionalitet. 

Så här kan metoden se ut.

```php
    /**
     * Get the rolls as a serie of images.
     *
     * @return string A ul/li list of dices.
     */
    public function getRollsAsImageList()
    {
        $html = "<ul class=\"dice\">";
        foreach ($this->rolls as $val) {
            $html .= "<li class=\"dice-{$val}\"></li>";
        }
        $html .= "</ul>";
        return $html;
    }
```

Som du ser så når jag basklassens medlemsvariabel `$rolls` via `$this`, som vanligt, den är som en del av min klass. Men, kommer du ihåg synligheten? Om du gjorde som jag och deklarerade medlemsvariablerna som `private` så blir det problem. Du kommer inte åt den från subklassen. Det är därför det finns en synlighetsnivå som heter `protected`. Den är som privat, med tillägget att ärvande klasser får tillgång och det är precis vad vi vill nu. Den ärvande klassen vill ha tillgång till variabler i basklassen, då passar `protected`. 

Så här kan det se ut när du ändrat synlighetsnivån i Dice.

```php
    /** 
     * @var []      The number of rolls made.
     * @var integer The number of faces of the dice.
     */
    protected $rolls = [];
    private $faces;
```

Jag ändrar endast för `$rolls` eftersom det är den enda variabeln som jag behöver för tillfället. Det är onödigt att öppna upp för mycket, om det inte behövs.

Varför kunde jag inte hämtat `$rolls` via metoden `getRollsAsArray()`? Bra fråga, det kunde jag gjort. Nu ville jag troligen visa ett exempel som krävde protected. Men när jag använde protected och lät subklassen accessa basklassens medlemmar så knöt jag också dessa två klasser närmare varandra i implementation, jag gjorde subklassen känslig för eventuella ändringar i `$this->rolls`. Det är inte alltid önskvärt att göra så, det är klokt att begränsa tillgång till klassers interna data, även när det handlar om arv.



###Arv i UML {#arvuml}

Om man vill rita en bild över arv, enligt UML, så kan det se ut så här.

[FIGURE src=image/snapvt17/oophp20-uml-extends.png caption="Arv i UML representeras av en pil mellan klasserna."]



###Övning tärning med bilder {#ovning-6}

Gör följande övning.

1. Skapa en ny klass DiceImage som ärver från Dice och utökar dess funktionalitet genom att skriva ut en grafisk representation för tärningsslaget.

Så här blev det för mig, visst är det lite roligare när man ser lite bilder?

[FIGURE src=image/snapvt17/oophp20-css-sprite.png?w=w2 caption="Dubbelkolla att du har rätt bild och kolla vilken länken till bilden är."]

[FIGURE src=image/snapvt17/oophp20-dice-image.png?w=w2 caption="En sex-sidig tärning med snygga bilder som sidor."]



###PHP stödjer inte multipelt arv {#arv-mult}

PHP är ett språk som har stöd för ett arv, en klass kan ärva från en annan klass. I vissa objektorienterade programmeringsspråk, till exempel C++, finns stöd för multipelt arv. Där kan en klass ärva från flera andra klasser. Är man van vid programmeringsspråk som stödjer multipelt arv kan man vid första anblicken känna avsaknaden av det. Men, det handlar om strukturering av koden och i programmeringsspråk som PHP, och andra som inte har valt att implementera multipelt arv, får man ta till andra lösningar för att strukturera sin kod. I PHP heter dessa *[interface](#interface)* och *[trait](#traits)*.

Men, vi pratar mer om trait och interface lite senare.



Komposition och aggregat {#is-has}
-------------------------------------------------------------------------------

Arv sägs vara en *is-a* relation, medans composition är *has-a* relation, två olika varianter av hur objekt förhåller sig till varandra när man modellerar eller bygger systemen.



###Objektorienterad terminologi {#ooterm}

I terminologin kring objektorientering används *is-a* och *has-a* för att bestämma vilken relation som finns mellan objekten. Det är inget speciellt för PHP utan mer universiellt när man modellerar en objektorienterad lösning. 

Relationen *is-a* innebär att en *Kolibri* är en *Fågel* eller att ett *Hus* är en *Byggnad*.

Relationen *has-a* innebär att en *Fågel* har *Vingar* eller att ett *Hus* har *Rum*.

Relationen *is-a* implementeras som arv och relationen *has-a* implementeras som en medlemsvariabel.

Vi har tittat på arv så låt oss se hur *has-a* implementeras i PHP. Själva terminologin är alltså vanlig när man modellerar. Relationen *has-a* kallas "[object composition](http://en.wikipedia.org/wiki/Object_composition)" och en variant av den är "object aggregation" där skillnaden mellan de båda är hur stark kopplingen är mellan objekten. 

För att ta ett exempel, ett Hus har ett Rum och när huset förstörs så förstörs även rummet, det är _composition_ och ett starkt beroende. Rummet kan inte existera utan Huset. _Aggregation_ säger en lösare koppling som att Huset har en Inneboende. När Huset rivs så flyttar den Inneboende till ett annat Hus, den Inneboende har ett liv, även om Huset förstörs.

[FIGURE src=image/snapvt17/oophp20-uml-composition-aggregate.png caption="Skillnaden mellan aggregation och composition, i ett UML diagram, är om romben är fylld eller ej."]

Siffran anger hur många, antalet. I bilden ovan så verkar det som det finns 5 rum i huset och att huset har 3 inneboende. Det är väldigt specifikt i detta fallet. Man skull eockså kunna modellera mer löst. Säg att Inneboende kan det finnas i ett hus, men inte säkert, det kan alltså finnas mellan 0 och flera inneboende. Det kan representeras av `0..*` eller bara en `*` i diagrammet. Att sätta siffror på antalet i en relation kallas *multiplicity*.



###En tärningshand består av fem tärningar {#dicehand}

Nåväl, låt oss göra ett exempel. Säg att vi vill spela ett tärningsspel och jag väljer att modellera en tärningshand `DiceHand` som består av så många tärningar som spelaren skall kasta varje runda. Spelar vi [Yatsy](http://sv.wikipedia.org/wiki/Yatzy) så innebär det i praktiken att tärningshanden skall bestå av fem tärningar och man skall kunna kasta tärningarna tre gånger och varje gång väljer man vilka tärningar som skall sparas.

Här har vi ett *has-a* relation där `DiceHand` består av sex stycken `DiceImage`. Rent implementationsmässigt kan man välja att kasta en tärning fem gånger, eller att kasta fem tärningar var sin gång. Jag väljer det senare eftersom det känns mer kopplat till hur verkligheten funkar, det blir (troligen) lättare att ha koll på.

[FIGURE src=image/snapvt17/oophp20-uml-dicehand.png caption="En DiceHand består av (aggregat) fem DiceImage."]

Ibland kan det vara trevligt att rita en bild över sin kod. I mitt exempel så använder jag ett fritt ritverktyg som heter [Dia](https://wiki.gnome.org/Apps/Dia/) och finns till alla plattformar. Ett liknande verktyg bör man ha i sin verktygslåda.



###Att implementera DiceHand {#dicehandimpl}

Vi kan lika gärna sätta ihop koden till DiceHand tillsammans. Vi börjar med en grov mall med medlemsvariabel och några metoder.

Här är lite ledtrådar till hur jag gjorde, du behöver inte göra på samma sätt, bara det fungerar för dig. Dessutom, när man tittar på en klass i designstadiet så är det inte säkert att den ser likadan ut när man äf färdigimplementerad. Kanske finner man bättre lösningar än ens första angreppsätt. Jag gjorde det. Men här var mitt utgångsläge.

```php
/**
 * A hand holding some dices.
 */
class DiceHand
{
    /**
     * @var integer $numDices Number of dices.
     * @var []      $ndices   Array holding the dices.
     * @var integer $sum      Hold the sum of the dices.
     */
    private $numDices;
    private $dices;
    private $sum;


    /**
     * Constructor.
     *
     * @param int $numDices Number of dices in the hand, defaults
     *                      to five dices.
     *
     * @return self
     */
    public function __construct($numDices = 5)
    {
        // create the dices in the $dices array
    }


    /**
     * Roll all dices in the hand.
     *
     * @return void
     */
    public function roll()
    {
        // roll the dices and update the sum
    }


    /**
     * Get the sum of the last roll.
     *
     * @return int Sum of the last roll, or 0 if no roll has been made.
     */
    public function getTotal()
    {
        // just return the sum
    }


    /**
     * Get the rolls as a serie of images.
     *
     * @return string The html representation of the last roll.
     */
    public function getRollsAsImageList()
    {
        // get and return a image representation of the dices thrown
    }
}
```

Känn dig fri att uppdatera dina andra klasser om det behövs. Om du gör det så tänk på det publika API:et, kanske ändrar du något som gör att en tidigare övning inte går att köra längre?

Vill du vara bakåtkompatibel så kan du alltid skapa nya klasser om det behövs. Nya klasser kan du forma som du vill. Det är ju en variant.

Ett tips är också att överväga hur du implementerar inuti klassen. Skapar du fem objekt av Dice? Eller kastar du Dice fem gånger? Vilket blir mest rätt och spelar det någon roll vilken lösning du gör inuti klassen, så länge som användaren uppfattar att han har en tärningshand med fem tärningar?



###Övning, en tärningshand {#ovning-7}

1. Gör en DiceHand som representerar en tärningshand med 5 tärningar.

1. Lägg till så att du kan skapa godtyckligt antal tärningar via querysträngen `?dices=24`.

Så här blev det för mig.

[FIGURE src=image/snapvt17/oophp20-dicehand.png?w=w2 caption="En tärningshand med <strike>fem</strike> 24 tärningar."]



Objekt och sessioner {#session}
-------------------------------------------------------------------------------

Ett objekt kan lagras i sessionen via `$_SESSION`, som vilken variabel som helst. Det kan vara en smidig hantering. Du behöver inte göra någon omvandling utan lagringen sköts automatiskt av PHP, om du gör på rätt sätt. 



###Lagra objekt i sessionen {#objektsess}

Principen bakom lagringen är att objektet serialiseras och kodas om som en ström av tecken för att kunna sparas undan på disk eller i en databas.

Datan i sessionen lagras mellan anropen på disk eller i databas. När det  är dags att läsa upp innehållet i sessionen, vid nästa sidanrop, så görs en baklänges serialisering av objektet, *unserialize*, och det blir till ett objekt igen. Detta sköts alltså automatiskt av PHP. Det enda kravet är att klassfilen finns tillgänglig, att den har inkluderats, eller att man använder en autoloader så som vi gör, innan sessionen startas. Klassens struktur måste vara känd för att det lagrade objektet skall kunna göras `unserialize()` på.

Om du missar att inkludera klassens definition, innan du startar sessionen, så får du ett felmeddelande som kan se ut som följer.

 > *Fatal error: main() [function.main]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;DiceHand&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition in /usr/home/mos/htdocs/dbwebb.se/kod-exempel/oophp20/session/dice.php on line 58*

Det finns två funktioner som används, bakom scenen, för att sköta hanteringen, `serialize()` och `unserialize()`. Du kan läsa mer om [objekt och serialisering](http://php.net/manual/en/language.oop5.serialization.php) i manualen. Du kan manuellt använda dessa funktioner då du vill spara ett objekt i en fil eller i en databas.



###Övning tärning till 21 {#ovning-8}

Gör följande övning.

1. Skapa en klass som har två tärningar och ackumulerar summan av slagen för varje gång tärningshanden slås.

På det viset kan du bygga ett tärningsspel som låter dig komma till 21, eller så nära som möjligt.

Så här blev det för mig.

[FIGURE src=image/snapvt17/oophp20-dicehand-21.png?w=w2 caption="Jag lyckades nå 21 till slut, med tärningshand i sessionen."]

Här är några ledtrådar till hur jag löste uppgiften.

Vidareutveckla din spelhand så att den kan summera alla tärningslag som du gör i en runda. Säg att du har en tärningshand med två tärningar, du skall slå dem valfritt antal gånger för att komma så nära 21 som möjligt, men inte över, för då blir du "tjock". Du skall alltså kasta din tärningshand valfritt antal gånger i din runda. Spara objektet i sessionen så att den "kommer ihåg" summan mellan kasten. Håll det enkelt, du behöver inte göra någon koll om spelaren är över 21, det får spelaren hålla koll på själv.

Jag kan välja att ärva DiceHand till en ny subklass som kunde hantera en spelomgång. Alternativet är att utöka klassen DiceHand med ny funktionalitet. Du kan göra som du tycker är bäst. Går det att utöka klassen utan att påverka dess publika API?



Avslutningsvis {#avslutning}
----------------------------------------------------------------

Du har nu fått en introduktion till objektorientering i PHP med klasser, arv, komposition och klasser som använder varandras värden.

Du kan använda klasser i sessionen och du vet hur autoloading fungerar och du kan rita enkla diagram med UML. 

Detta är en god start på grunderna i OOPHP. Nu behöver du koda lite själv för att bli varmare i kläderna.

Glöm inte att PHP-manualen är en god källa till kunskap. Det finns en egen sektion om de objektorienterade teknikerna i PHP.

Det finns en forumtråd där du kan [ställa frågor om artikeln, eller bidra med tips och trix](t/6331).



<!--

namespace
exceptions
chainable




12. Statiska medlemmar {#static}
-------------------------------------------------------------------------------




###Deklarera metoder och medlemsvariabler som statiska {#declstat}

Både medlemsvariabler och metoder kan defineras som `static` vilket innebär att de är en del av klassen och inte objektet.

En statisk medlemsvariabel finns en per klass och alla objekt av klassen har tillgång till att läsa och skriva värden till den variabeln. En statisk medlemsvariabel är bra om man vill ha en "klass-global" variabel som skall vara samma för alla instanser av klassen.

En statisk metod är en metod som inte ändrar ett objekts läge, eller behöver läsa objektets värde. En statisk metod är alltså en del av klassen, inte objektet. En statisk metod kan därför inte komma åt ett objekts medlemsvariabler, men det kan komma åt alla konstanter och statiska medlemsvariabler.

Detta innebär att man inte kan använda `$this` inuti en metod som är deklarerad som `static`, det finns helt enkelt inte ett objekt att nå. Man kan endast nå andra statiska metoder eller medlemsvariabler.

Du använder `self::` eller `parent::` för att komma åt en medlemsvariabel, eller metod, som är deklarerad som `static`. Användandet av `static` kan kombineras med synligheten som styrs med `public`, `protected`, och `private`.

Du kan läsa mer om [`static` i manualen](http://php.net/manual/en/language.oop5.static.php).



###Exempel på statisk medlemsvariabel {#exstat}

Säg att vi har en klass där vi vill hålla koll på antalet instanser av klassen. Här passar en statisk variabel utmärkt som räknare. Den kan inkrementeras i konstruktorn och dekrementeras i destruktorn. Så här kan det se ut.

Först klassen.

```php
class SomeClass {
  
  public static $counter = 0;

  public function __construct() {
    self::$counter++;
  }

  public function __destruct() {
    self::$counter--;
  }

}
```

Nu kan vi använda klassen för att se att det fungerar.

```php
$obj1 = new SomeClass();
echo SomeClass::$counter;

$obj2 = new SomeClass();
echo SomeClass::$counter;

unset($obj2);
echo SomeClass::$counter;

unset($obj1);
echo SomeClass::$counter;
```

Kör man programmet blir utskriften:

> 1210



13. Designmönster Singleton använder static {#singleton}
-----------------------------------------------------------------------------------------------

Designmönster [^15], eller "designpattern", är lösningar på återkommande problem. Ett vanligt designmönster som man ofta kommer i kontakt med när man lär sig designmönster, är "Singleton". Här är tanken att det bara får finnas ett objekt av klassen, ett enda objekt som alla kan dela på och det kan inte kan skapas i fler versioner via `new`. Detta designmönster använder sig av en statisk medlemsvariabel och en statisk metod för att skapa, eller hämta, en referens till objektet. Så här kan koden se ut för en klass som implementerar designmönstret "Singleton". Det är ett bra exempel på statiska metoder.

**En "singleton"-klass.**

```php
class CSomeClass {
  
  /**
   * Property for the single instance
   */
  private static $instance = null;

  /**
   * Define the constructor as private to avoid creation of new objects.
   */
  private function __construct() { ; }

  /**
   * Singleton pattern. Get the instance of the latest created object or create a new one. 
   *
   * @return self The instance of this class, or newly created.
   */
  public static function Instance() {
    return is_null(self::$instance) ? self::$instance = new self : self::$instance;
  }

}

// Use the class
$someclass = CSomeClass::Instance();
```

Du kan läsa mer om [designmönstret "singleton" på Wikipedia](http://en.wikipedia.org/wiki/Singleton_pattern). Det finns många fler designmönster, men ta det lite senare, när du är varm i dina objektorienterade kläder.



14. Scope Resolution Operator (::) {#scope}
-----------------------------------------------------------------------------------------------

En sak som kan vara lite trixig är hur man kommer åt variabler inuti en klass. När det gäller medlemsvariabler så används `$this->` med en pil, men som du såg så användes `self::` för att komma åt en konstant i klassen. Dubbelkolon `::` är en operator som används för att välja vilket område som skall användas, `self::` innebär den egna klassen och används för konstanter eller statiska medlemmar.

Det finns också en `parent::` som hänvisar till basklassen, den klassen man ärver ifrån. Som du kanske noterat så använder vi det när vi anropar basklassens konstruktor. 

**Anropar basklassens konstruktor med hjälp av `parent::` och kommer åt en konstant med `self::`.**

```php
  public function __construct() {
    parent::__construct(self::FACES);
  }
```

Du kan läsa mer om ["scope-operatorn" i manualen](http://php.net/manual/en/language.oop5.paamayim-nekudotayim.php).

Det finns också fall där man använder `static::` för att nå metoder eller medlemsvariabler. Men det är specialfall där `self::` och `parent::` inte räcker till. Specialfallet kallas "late static binding" och det är inget vi tar upp i denna artikeln, det är överkurs och du kan läsa om ["late static binding" i manualen](http://php.net/manual/en/language.oop5.late-static-bindings.php).



15. Abstrakta klasser {#abstrakt}
-----------------------------------------------------------------------------------------------

En abstrakt klass är en klass som inte kan instansieras, det kan inte skapas några objekt av den klassen. En abstrakt klass är till för att subklassas och att någon ärver från den och skapar en konkret klass som man kan skapa objekt av.

En abstrakt klass erbjuder ofta ett gränssnitt, en mall för en klass som kan sakna viss implementation, en implementation som måste skapas av den konkreta klassen. 

För att ta ett exempel från djurriket, men katter (CCat) och möss (CMouse) utökar den abstrakta basklassen djur (CAnimal).

```php
abstract class CAnimal {
  
  public function Eat() {
    echo "I'm eating<br/>";
  }

  abstract public function Noice();

}

class CMouse extends CAnimal {

  public function Noice() {
    echo "Piip, piip<br/>";
  }

}

class CCat extends CAnimal {

  public function Noice() {
    echo "Mjauuu, mjauuu<br/>";
  }

}

// Use the class
$cat = new CCat();
$mouse = new CMouse();

$mouse->Eat();
$mouse->Noice();

$cat->Eat();
$cat->Noice();
```

Kör man programmet får man utskriften:

```text
I'm eating
Piip, piip
I'm eating
Mjauuu, mjauuu
```



16. Överlagring {#overload}
-----------------------------------------------------------------------------------------------

Överlagring i PHP innebär att dynamiskt skapa nya metoder eller medlemsvariabler. En klass i PHP är inte fast och bestämd, den kan modifieras efterhand. Det går att lägga till både medlemsvariabler och metoder, även om de inte finns med i klassens definition. Det kallas överlagring enligt PHP.

Säg att vi vill lägga till vissa förmågor till musen (CMouse) i exemplet i stycket ovan. Det kan fungera så här.

**Överlagring kan skapa nya medlemmar.**

```php
$mouse = new CMouse();

$mouse->Eat();
$mouse->Noice();
$mouse->speed = 'fast';
$mouse->size = 'small';
$mouse->weight = 0.5;

echo "<pre>";
var_dump($mouse);
echo "</pre>";
```

Varken speed, size eller weight finns med i klassdefinitionen för CMouse(eller CAnimal).

Utskriften från ett sådant testprogram kan se ut så här.

```text
I'm eating
Piip, piip

object(CMouse)#1 (3) {
  ["speed"]=>
  string(4) "fast"
  ["size"]=>
  string(5) "small"
  ["weight"]=>
  float(0.5)
}
```

Överlagring i PHP-klasser handlar alltså om att lägga till medlemmar dynamiskt.





17. Magiska metoder {#magic}
-----------------------------------------------------------------------------------------------

I PHP och klasser finns ett antal fördefinierade *magiska metoder*. De anropas vid speciella tillfällen och genom att implementera dem kan man få klassen att hantera vissa specialfall. En magisk metod börjar med två underscore. Metoderna för konstruktor och destruktor är alltså exempel på två magiska metoder, `__construct()` och `__destruct()`.

Du kan läsa mer om vilka [magiska metoder som finns i manualen](http://php.net/manual/en/language.oop5.magic.php). Men låt oss kika på några som kan vara bra att veta om.



###Magiska metoder `__call()` {#magic-call}

Metoden `__call()` invokeras när du anropar en icke-befintlig metod på ett objekt. Metoden `__callStatic()` invokeras när du anropar en icke-befintlig statisk metod i en klass. Det innebär alltså att du själv kan definiera dessa metoder för att ge ett standardbeteende när användare anropar en icke-befintlig metod på objektet, eller klassen.

Jag bygger vidare på klassen CAnimal och implementerar `__call()` på klassen.

**Definiera en egen `__call()` i CAnimal.**

```php
abstract class CAnimal {
  
  public function __call($method, $arguments) {
    echo "Calling object method '$method' "
         . implode(', ', $arguments). "<br/>";
  }

}

// Use the class
$mouse = new CMouse();

$mouse->Eat();
$mouse->Noice();
$mouse->Jump('high', 'with head first');
$mouse->Swim('fast');
```

Metoden `__call()` får två argument, det första är metodens namn och den andra är en array med argumenten som skickades till metoden.

Utskriften från detta programmet kan se ut som följer:

```text
I'm eating
Piip, piip
Calling object method 'Jump' high, with head first
Calling object method 'Swim' fast
```



###Magiska metoder `__set()` och `__get()` {#magic-set}

När det gäller medlemsvariabler så finns de magiska metoderna `__get()` och `__set()`. De anropas när du försöker läsa från, eller skriva till, en icke-existerande medlemsvariabel i en klass.

Du kan implementera dessa som felkontroller för att hantera om någon använder din klass på ett sätt som du inte tänkt, eller kan du hantera skapande och läsande av medlemsvariabler på ett dynamiskt sätt. Säg att du vill spara undan alla egenskaper hos djuret i en array, du vill slippa att deklarera alla medlemsvariabler i klassen. Jag säger inte att du ska göra så, det är ett exempel som visar hur du kan göra.

**Definiera `__set()` och `__get()`.**

```php
abstract class CAnimal {

  public $abilities = array();
  
  public function __set($name, $value) {
    $this->abilities[$name] = $value;
  }

  public function __get($name) {
    return isset($this->abilities[$name]) ? $this->abilities[$name] : null;
  }  

}

// Use the class
$mouse = new CMouse();

$mouse->Eat();
$mouse->Noice();
$mouse->speed = 'fast';
$mouse->size = 'small';
$mouse->weight = 0.5;

echo "<pre>";
var_dump($mouse->abilities);
echo "</pre>";
```

Utskriften från exemplet kan se ut så här:

```text
I'm eating
Piip, piip

array(3) {
  ["speed"]=>
  string(4) "fast"
  ["size"]=>
  string(5) "small"
  ["weight"]=>
  float(0.5)
}
```


18. Objekt och Interface {#interface}
-----------------------------------------------------------------------------------------------

Som tidigare nämnts så stödjer PHP inte multipelt arv. Att jobba med *interface* kan lösa en del av detta. Ett interface är en mall för en klass. En klass som *implementerar ett interface* lovar att implementera de funktioner som krävs av interfacet. Ett interface är ett kontrakt och klassen måste uppfylla det kontraktet för att kunna säga att det implementerar ett visst interface. 

Ett interface kan ge ett visst beteende, ett beteende som måste lösas på ett bestämt sätt. Den klassen som implementerar interfacet måste alltså implementera de metoder som specificeras av interfacet. Man använder interface för att vara tydlig och visa att en klass har vissa egenskaper.

Säg, för tydlighetens skull, så skapar vi ett interface ISingelton. Tanken är att alla klasser som implementerar designmönstret skall använda sig av interfacet. Det blir tydligt, alla klasser som implementerar designmönstret ser likadana ut och det är tydligt redan i klassens konstruktion vilket beteende och gränssnitt den har.

**Interface för ISingleton.**

```php
interface ISingleton {
  public static function Instance();
}
```

Interfacet säger alltså att den klass som implementerar interfacet måste implementera metoden `Instance()`, men det finns inget krav på hur implementationen skall se ut, bara på gränssnittet.

**Del av klass som implementerar interfacet ISingleton.**

```php
class CMySingleton implements ISingleton {

  private static $instance = null;

  public static function Instance() {
    return is_null(self::$instance) ? self::$instance = new self : self::$instance;
  }

}
```

Att använda interface ger alltså en tydlighet och styr upp de publika gränssnitten mellan klasserna.

Läs mer om [interface i manualen](http://php.net/manual/en/language.oop5.interfaces.php).



19. Traits {#traits}
-----------------------------------------------------------------------------------------------

Traits är en programmeringskonstruktion för att återanvända kod i programmeringsspråk som är begränsade till en arvshierarki. Det handlar om att lagra kod i en struktur som liknar en klass, men det kallas för *trait* och kan inkluderas i en eller flera klasser. Kod som lämpar sig i en trait är alltså kod som kan återanvändas mellan flera klasser.

För att fortsätta med vårt exempel på designmönstret singleton. Säg att vi vill implementera metoden `Instance()` i en trait och sedan återanvända den i alla klasser som implementerar interfacet ISingleton. Det kan se ut så här.

**En trait för singleton.**

```php
trait Singleton {

  private static $instance = null;

  public static function Instance() {
    return is_null(self::$instance) ? self::$instance = new self : self::$instance;
  }

}
```

Så ser alltså definitionen för en trait ut. Nu kan vi använda den i vår klass.

```php
class CMySingleton implements ISingleton {

  use Singleton;

}
```

Traits ger oss alltså en möjlighet att dela implementationen av kod, som återkommer i flera klasser.

Läs mer om [traits i manualen](http://php.net/manual/en/language.oop5.traits.php).



20. Mer OOPHP {#mer}
-----------------------------------------------------------------------------------------------

Detta var grunderna i objektorienterad PHP. Du kommer långt med grunderna. Underlaget till denna artikel är främst från manualen som beskriver de [objektorienterade konstruktionerna i PHP](http://php.net/manual/en/language.oop5.php).

Allt fick inte plats och det finns ett par närliggande konstruktioner som du kan vilka läsa på, bland annat om [Exceptions](http://php.net/manual/en/language.exceptions.php), [Standard PHP Library (SPL)](http://php.net/manual/en/book.spl.php) och [Namespaces](http://php.net/manual/en/language.namespaces.php).

Men någonstans skall man börja sin objektorienterade resa och med denna artikel har du gjort det, trevlig resa!

-->


<!--




###Code refactoring av Histogram {#refactor}

I klassen tärning hittade jag ingen metod som var kandidat till att bli privat. Men om jag kikar i koden för Histogram så ser jag en möjlighet att skriva om och förbättra min kod. Det är sådant som kallas _code refactoring_ [^6] och det innebär att man skriver om sin kod så att den blir bättre, lättare att underhålla och vidareutveckla. Gör om och gör bättre, helt enkelt.

Min lösning innebar att nu innehåller båda metoderna dubbletter av delvis samma kod. Ibland vill man lösa ett problem snabbt och då är det en enkel väg att gå. Man vill minimera duplicerandet av kod. Duplicerar man kod så är man inte DRY [^14], och det vill man försöka att vara.

Det är vad jag nu tänker göra, ett försök att vara DRY och bryta ut delar av den duplicerade koden till en egen metod. Jag tar den del av kod som är samma i båda metoderna och lägger i en egen privat metod. Metoden kan bli privat för det är ingen utanför klassen som skall anropa den.





14. Object iteration {#alternativ-struktur}
-----------------------------------------------------------------------------------------------

16. Final keyword {#formular}
-----------------------------------------------------------------------------------------------

17. Object cloning {#sessioner}
-----------------------------------------------------------------------------------------------

18. Comparing objects {#header-func}
-----------------------------------------------------------------------------------------------

19. Type hinting {#funktioner}
-----------------------------------------------------------------------------------------------

-->




[^1]: [Wikipedia om programmeringsparadigm](https://en.wikipedia.org/wiki/Programming_paradigm).

[^2]: [Wikipedia om "Procedural programmering"](https://en.wikipedia.org/wiki/Procedural_programming).

[^3]: [Wikipedia om objektorienterad programmering](https://en.wikipedia.org/wiki/Object-oriented_programming).

[^4]: [Wikipedia om histogram](http://sv.wikipedia.org/wiki/Histogram).

[^5]: [Wikipedia om tärning](https://sv.wikipedia.org/wiki/T%C3%A4rning).

[^6]: [Wikipedia om "Code Refactoring"](http://en.wikipedia.org/wiki/Code_refactoring).

[^7]: [Wikipedia om arv ("inheritance")](https://en.wikipedia.org/wiki/Inheritance_(computer_science)).

[^8]: [Smashing Magazine om CSS sprites](http://coding.smashingmagazine.com/2009/04/27/the-mystery-of-css-sprites-techniques-tools-and-tutorials/).

[^9]: [Wikipedia om Application Programming interface (API)](http://en.wikipedia.org/wiki/Application_programming_interface).

[^10]: [Wikipedia om att instansiera ett objekt](http://en.wikipedia.org/wiki/Instance_(computer_science)).

[^11]: [Wikipedia Unified Modelling Language (UML)](http://en.wikipedia.org/wiki/Unified_Modeling_Language).

[^12]: [Wikipedia Class diagram](http://en.wikipedia.org/wiki/Class_diagram).

[^13]: [Wikipedia Sequence diagram](http://en.wikipedia.org/wiki/Sequence_diagram).

[^14]: [Wikipedia om Don't Repeat Yourself (DRY)](http://en.wikipedia.org/wiki/Don%27t_repeat_yourself).

[^15]: [Wikipedia om design patterns (designmönster)](http://en.wikipedia.org/wiki/Software_design_pattern).
