---
author: mos
revision:
    "2018-04-15": "(A, mos) Första versionen."
...
Histogram som interface och trait
==================================

Vi tittar på hur vårt histogram kan implementeras när vi använder ett interface och vi tar ett lite annat grepp på hur koden kan struktureras.

Spara koden du skriver i denna övningen i `index_interface.php`, `src/Dice/Histogram.php`, `src/Dice/HistogramInterface.php`, `src/Dice/DiceHistogram2.php` och `src/Dice/HistogramTrait2.php`.



Histogram som en egen klass {#egen}
----------------------------------

Säg att vi implementerar histogrammet som en egen klass. Det blir en specifik klass som kan producera histogram på ett flertal sätt, men klassen är specialiserad på just histogram.

Man vill gärna ha specialiserade klasser som utför ett väl begränsat ansvarsområde.

Låt oss först överföra metoderna från det befintliga histogram-traitet och forma en egen klass. Jag väljer aningen annan namngivning, men du känner igen metoder och medlemsvariabler.

```php
<?php

namespace Mos\Dice;

/**
 * Generating histogram data.
 */
class Histogram
{
    /**
     * @var array $serie  The numbers stored in sequence.
     * @var int   $min    The lowest possible number.
     * @var int   $max    The highest possible number.
     */
    private $serie = [];
    private $min;
    private $max;



    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getSerie()
    {
        return $this->serie;
    }



    /**
     * Return a string with a textual representation of the histogram.
     *
     * @return string representing the histogram.
     */
    public function getAsText()
    {
    }
}
```

Då har vi en grov uppsättning av klassen Histogram. Men hur får den tag i datat, slagserien?



Injecta data med interface {#inject}
----------------------------------

Tanken är att vi skickar in datat till klassen Histogram, vi injectar datat in i klassen.

Vi skulle kunna skicka in arrayen `$serie`, men den ger oss inte `$min, $max`. Vi kan skapa en metod som tar alla tre argumenten. Men, nu tränar vi på interface och då väljer vi att injecta ett objekt som har implementerat ett interface `HistogramInterface` vilket garanterar att klassen `Histogram` kan hämta all data på egen hand.

Vår metod i klassen `Histogram` ser ut så här.

```php
/**
 * Inject the object to use as base for the histogram data.
 *
 * @param HistogramInterface $object The object holding the serie.
 *
 * @return void.
 */
public function injectData(HistogramInterface $object)
{
    $this->serie = $object->getHistogramSerie();
    $this->min   = $object->getHistogramMin();
    $this->max   = $object->getHistogramMax();
}
```

Vi skapar alltså en metod som tar ett objekt som argument. Objektet som skickas in måste ha implementerat interfacet `HistogramInterface`. Det styr vi upp genom att använda [_type declaration_](http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration) av parametern i metoden.

I koden ser vi en förväntan av att det skall finnas tre metoder i objektet. Vi litar på att objektet har implementerat interfacet som nu måste ange ovan tre metoder som nödvändiga.



Interfacet HistogramInterface {#interface}
----------------------------------

Ovan kod förutsätter att vi skapar ett interface `HistogramInterface` som ser ut så här.

```php
<?php

namespace Mos\Dice;

/**
 * A interface for a classes supporting histogram reports.
 */
interface HistogramInterface
{
    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getHistogramSerie();



    /**
     * Get min value for the histogram.
     *
     * @return int with the min value.
     */
    public function getHistogramMin();



    /**
     * Get max value for the histogram.
     *
     * @return int with the max value.
     */
    public function getHistogramMax();
}
```

Du kan se tre metoder som plockar ut det som klassen Histogram behöver för att kunna generera rapporter i form av histogram.

En tärning som implementerar ovan interface lovar alltså att erbjuda dessa metoder.



Tärning som implementerar ett interface {#implements}
----------------------------------

Då skapar vi en ny tärningsklass `DiceHistogram2` som implementerar interfacet `HistogramInterface`.

```php
<?php

namespace Mos\Dice;

/**
 * A dice which has the ability to present data to be used for creating
 * a histogram.
 */
class DiceHistogram2 extends Dice implements HistogramInterface
{
    use HistogramTrait2;



    /**
     * Roll the dice, remember its value in the serie and return
     * its value.
     *
     * @return int the value of the rolled dice.
     */
    public function roll()
    {
        $this->serie[] = parent::roll();
        return $this->getLastRoll();
    }
}
```

Så, klassen `DiceHistogram2` ser nästan ut som sin föregångare `DiceHistogram`, skillnaden är `implements HistogramInterface` och att den använder ett uppdaterat trait `use HistogramTrait2`.



Att lägga implementationen av interface i ett trait {#implements}
----------------------------------

Min plan är att lägga största delen av implementationen av interface i ett trait. Det blir enklare att återanvända ett trait i andra sammanhang, när andra klasser vill implementera samma interface.

Jag kunde lagt all implementation direkt i klassen och jag hade sluppit att använda ett trait. Men i detta fallet ser jag fördelar med att använda ett trait, trots att det innebär en ny fil att hantera.

Olika vägar att gå, alla dessa val.

Det visar sig att en del interface lämpar sig att implementera i trait som återanvändbara moduler, ibland är det en bra plan.

Låt se hur det uppdaterade traitet kan se ut, när det löser interfacet.

```php
<?php

namespace Mos\Dice;

/**
 * A trait implementing HistogramInterface.
 */
trait HistogramTrait2
{
    /**
     * @var array $serie  The numbers stored in sequence.
     */
    private $serie = [];



    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getHistogramSerie()
    {
        return $this->serie;
    }



    /**
     * Get min value for the histogram.
     *
     * @return int with the min value.
     */
    public function getHistogramMin()
    {
        return 1;
    }



    /**
     * Get max value for the histogram.
     *
     * @return int with the max value.
     */
    public function getHistogramMax()
    {
        return max($this->serie);
    }
}
```

Jag lyckas skapa ett trait som innehåller en hyffsat anpassad implementation som kan fungera i flera sammanhang. Det fungerar inte klockrent i vårt fall, det är sista metoden som behöver skicka tärningens maxvärde.



Överlagra en metod från ett trait {#overlagra}
----------------------------------

Jag kan i klassen `DiceHistogram2` överlagra metoden `getHistogramMax()` som kommer från traitet. Det är bara att lägga in metoden med samma namn direkt i klassen.

Den slutliga implementationen av klassen `DiceHistogram2` ser ut så här.

```php
<?php

namespace Mos\Dice;

/**
 * A dice which has the ability to present data to be used for creating
 * a histogram.
 */
class DiceHistogram2 extends Dice implements HistogramInterface
{
    use HistogramTrait2;



    /**
     * Get max value for the histogram.
     *
     * @return int with the max value.
     */
    public function getHistogramMax()
    {
        return $this->sides;
    }



    /**
     * Roll the dice, remember its value in the serie and return
     * its value.
     *
     * @return int the value of the rolled dice.
     */
    public function roll()
    {
        $this->serie[] = parent::roll();
        return $this->getLastRoll();
    }
}
```

I koden ovan använder jag `$this->sides`. I mitt eget kodexempel var den privat i Dice, jag valde att ändra den till protected så att subklassen kan läsa dess värde. Ett alternativ hade varit att implementera en metod `Dice::getSides()`.



Att sätta ihop delarna i index {#index}
----------------------------------

Nu finns alla delar på plats och vi kan sätta samman dem i `index_interface.php` och testköra.

Så här kan `index_interface.php` se ut.

```php
<?php

namespace Mos\Dice;

/**
 * Show off a histogram.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");


$rolls = $_GET["rolls"] ?? 6;

$dice = new DiceHistogram2();

for ($i = 0; $i < $rolls; $i++) {
    $dice->roll();
}

$histogram = new Histogram();
$histogram->injectData($dice);


?><h1>Display a histogram</h1>

<p><?= implode(", ", $histogram->getSerie()) ?></p>
<pre><?= $histogram->getAsText() ?></pre>
```

Koden ovan ser ut ungefär som föregångaren `index_histogram.php`. En skillnad är att index-programmet inte behöver ha koll på min och max-värde. Det kan vara sådana små saker som gör att man väljer att implementera saker på ett eller ett annat sätt. Nu kan index-programmet fokusera på att jobba med objekten och implementationen är överförd till de båda objekten som samverkar då de kan lita på att kontraktet, interfacet, löser villkoren för deras samarbete.

Så här blev mitt exempelprogram när det blev klart.

[FIGURE src=image/snapvt18/histogram2.png?w=w3 caption="Först en slagserie om 6 tärningsslag."]

Även denna gången kan man slå godtyckligt antal tärningsslag.

[FIGURE src=image/snapvt18/histogram2-99.png?w=w3 caption="En större slagserie om 99 tärningsslag."]

Utfallet ser likadant ut som tidigare. Men koden bakom är annorlunda.



Avslutningsvis {#avslutning}
----------------------------------

Det blev flera steg. Men vad vi gjort är en separat klass för `Histogram` och ett interface `HistogramInterface` som alla klasser måste implementera, om de vill använda klassen `Histogram` för att presentera statistik från en tärningsserie.

Jag valde också att lägga större delen av implementationen för interfacet `HistogramInterface` i ett trait `HistogramTrait2`.

Till slut implementerade jag tärningsklassen `DiceHistogram2` som utökade klassen `Dice`, implementerade interfacet `HistogramInterface` och använde traitet `HistogramTrait2`.

Där har du en serie av objektorienterade termer som beskriver de klasser vi nyss gjort. Fundera på det och se vad du anser om det. Låt det smälta in sakta.
