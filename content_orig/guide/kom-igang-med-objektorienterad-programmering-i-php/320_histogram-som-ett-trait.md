---
author: mos
revision:
    "2018-04-15": "(A, mos) Första versionen."
...
Histogram som ett trait
==================================

Vi skall implementer ett trait som implementerar ett histogram. Detta trait kan sedan användas av våra tärningsklasser för att visa upp ett histogram över tärningens slagserie.

Spara koden du skriver i denna övningen i `index_histogram.php`, `src/Dice/HistogramTrait.php` samt `src/Dice/DiceHistogram.php`.

Låt oss se på hur konstruktionen av ett trait ser ut och hur klassen använder det. Vi har våra tärningar och vi vill att de skall kunna presentera ett histogram som ger en översikt över tärningsslagen.



Histogram för en slagserie {#exempel}
----------------------------------

Här är ett exempel på hur en utskrift av ett histogram kan se ut för en sexsidig tärning med en slagserie `1, 3, 5, 4, 1, 4, 4, 5`.

```text
1: **
2:
3: *
4: ***
5: **
6:
```

Ovan histogram förutsätter att man skriver ut även tomma värden.

En alternativ utskrift hade varit att bara inkludera de värden som verkligen finns med i slagserien.

```text
1: **
3: *
4: ***
5: **
```

Vårt trait skall kunna klara av båda utskrifterna. När vi är klara kan vår testsida se ut så här.

[FIGURE src=image/snapvt18/histogram-index.png?w=w3 caption="Ett histogram utskrivet på olika sätt för en och samma slagserie."]



Ett trait för Histogram {#exempel}
----------------------------------

Man strukturerar ett trait på samma sätt som en klass, men istället för `class` heter det `trait`. Vi sparar koden i `src/Dice/HistogramTrait.php`. Namngivningen av filen låter oss se att det är ett trait och inte en klass.

```php
<?php

namespace Mos\Dice;

/**
 * A trait implementing histogram for integers.
 */
trait HistogramTrait
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
     * Print out the histogram, default is to print out only the numbers
     * in the serie, but when $min and $max is set then print also empty
     * values in the serie, within the range $min, $max.
     *
     * @param int $min The lowest possible integer number.
     * @param int $max The highest possible integer number.
     *
     * @return string representing the histogram.
     */
    public function printHistogram(int $min = null, int $max = null)
    {
    }
}
```

Det var utkastet till vårt trait, komplett bortsett från implementationen av sista metoden. Om du tycker det saknas metoder, kanske för att nollställa slagserien, så kan du lägga till dem om du vill.

Ett trait kan inte leva på egen hand. Man kan inte instansiera ett trait eller skapa ett objekt av det. Vi behöver en klass som använder traitet.



Klass använder trait {#dicewithtrait}
----------------------------------

Jag vill ha en tärning som kan ha egenskapen att spara ett histogram över sina slag. Jag har redan klassen `Dice` så jag väljer att specialisera den klassen till `DiceHistogram`.

```php
<?php

namespace Mos\Dice;

/**
 * A dice which has the ability to show a histogram.
 */
class DiceHistogram extends Dice
{
    use HistogramTrait;



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

Jag har alltså en klass `DiceHistogram` som utökar klassen `Dice` samt använder traitet `HistogramTrait`. Jag har en tärningsklass med egenskapen att kunna producera ett histogram.

I min klass har jag överlagrat metoden `roll()` för att spara undan det senaste slagna tärningsslaget i medlemsvariabeln som kommer från traitet.



Program som skriver ut histogrammet {#indexhisto}
----------------------------------

Då gör vi ett skript `index_histogram.php` som använder tärningsklassen och utför en slagserie som sedan skrivs ut tillsammans med dess histogram på två olika sätt.

Så här blev det för mig.

```php
<?php

namespace Mos\Dice;

/**
 * Show off a histogram.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");


$rolls = $_GET["rolls"] ?? 6;

$dice = new DiceHistogram();

for ($i = 0; $i < $rolls; $i++) {
    $dice->roll();
}

?><h1>Display a histogram</h1>

<p><?= implode(", ", $dice->getHistogramSerie()) ?></p>
<pre><?= $dice->printHistogram() ?></pre>
<pre><?= $dice->printHistogram(1, 6) ?></pre>
```

Mitt index-program ger mig möjligheten att slå större slagserier via GET-variabeln `?rolls=99`, så mitt exempelprogram kan ge följande utskrift.

[FIGURE src=image/snapvt18/histogram-99.png?w=w3 caption="Histogram för en slagserie om 99 tärningsslag."]

Se till att du får en liknande utskrift från ditt testprogram.

Testa även att ditt histogram kan hantera utskriften på två olika sätt, om man anger `$min, $max` eller inte.

[FIGURE src=image/snapvt18/histogram-index.png?w=w3 caption="Ett histogram utskrivet på olika sätt för en och samma slagserie."]

I nästa steg kan vi fundera över hur bra vår kodstruktur blev.
