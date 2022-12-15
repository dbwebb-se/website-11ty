---
author: mos
revision:
    "2018-04-12": "(B, mos) Uppdaterade dockblock kommentarer för DiceHand."
    "2018-03-27": "(A, mos) Första versionen, uppdelad av större dokument och uppdaterad."
...
Komposition med en tärningshand
==================================

Vi skall exemplifiera komposition där en klass består av en annan klass. Vi tänker oss en tärningshand som skall kasta 5 tärningar, ungefär som i tärningsspelet Yatsy.

Spara koden du skriver i denna övningen i `index_dicehand.php`, `src/Dice/Dice.php` och `src/Dice/DiceHand.php`.



Ett exempelprogram för en tärningshand {#dicepage}
----------------------------------

Tanken är att du bygger ett exempelprogram i `index_dicehand.php` som visar hur du kastar en tärningshand, en hand full av tärningar.

Exempelprogrammet skulle kunna se ut så här.

```php
namespace Mos\Dice;

/**
 * Throw a hand of dices.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");

$hand = new DiceHand();
$hand->roll();

?><h1>Rolling a dicehand with five dices</h1>

<p><?= implode(", ", $hand->values()) ?></p>
<p>Sum is: <?= $hand->sum() ?>.</p>
<p>Average is: <?= $hand->average() ?>.</p>
```

När du kör det kan det se ut så här.

[FIGURE src=image/snapvt18/dicehand.png?w=w3 caption="En tärningshand kastar 5 tärningar."]

Du återanvänder din befintliga klass `Dice`. Du kan bygga om eller bygga ut den, om det behövs.

Du skapar en klass för din tärningshand och lägger den i `src/Dice/DiceHand.php`. Se till att klassen använder sig av objekt av klassen `Dice` samt erbjuder ett API för att hämta alla värden på de slagna tärningarna liksom summan och snittet.

Använd ditt eget personliga vendor-prefix. Gör alltid det.

Vill du pröva på egen hand eller vill du se ett utkast till hur en klass för en tärningshand kan se ut?



Ett utkast till en klass tärningshand {#dicehand}
----------------------------------

Så här skulle en tärningshand kunna struktureras. Se det som en variant, du kan implementera din egen klass som du vill.

```php
namespace Mos\Dice;

/**
 * A dicehand, consisting of dices.
 */
class DiceHand
{
    /**
     * @var Dice $dices   Array consisting of dices.
     * @var int  $values  Array consisting of last roll of the dices.
     */
     private $dices;
     private $values;

    /**
     * Constructor to initiate the dicehand with a number of dices.
     *
     * @param int $dices Number of dices to create, defaults to five.
     */
    public function __construct(int $dices = 5)
    {
        $this->dices  = [];
        $this->values = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[]  = new Dice();
            $this->values[] = null;
        }
    }

    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll() {}

    /**
     * Get values of dices from last roll.
     *
     * @return array with values of the last roll.
     */
    public function values() {}

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function sum() {}

    /**
     * Get the average of all dices.
     *
     * @return float as the average of all dices.
     */
    public function average() {}
}
```

Tanken med min variant är att lagra alla tärningar i en array `$dices` och lagra de värden som tärningen visar i en array `$values`. När jag kastar tärningarna via `roll()` så sparas respektive tärnings värde i `$values`. Det kan jag sedan använda när användaren vill hämta värdena och beräkna summan och snittet för den kastade tärningshanden.  



Klassdiagram för komposition/aggregation {#klassdiagram}
-----------------------------

Om vi ritar ett klassdiagram över `DiceHand` och `Dice` så kan det se ut så här.

[FIGURE src=image/snapvt18/uml-dicehand-dice.png caption="En tärningshand består av tärningar."]

Den genomskinliga romben säger att relationen är en variant av komposition som kallas aggregat vilket innebär att tärningarna kan existera som enskilda objekt, även om tärningshanden skulle försvinna.

En romb som är svart hade visat på en relation av komposition där kopplingen mellan objekten hade varit starkare och där objekten inte hade kunnat existera som fristående objekt.



Skillnaden mellan komposition och aggregation {#komp}
-----------------------------

Relationen har-en, _has-a_, kallas "[object composition](http://en.wikipedia.org/wiki/Object_composition)". En variant av objekt komposition är "objekt aggregat" där skillnaden är hur stark kopplingen är mellan objekten. Komposition innebär en stark koppling och aggregat innebär en svagare koppling mellan objekten.

För att ta ett exempel på komposition. Ett Hus har ett Rum och när huset förstörs så förstörs även rummet, det är komposition och ett starkt beroende mellan objekten. Rummet kan inte existera utan Huset.

Aggregat påtalar en lösare koppling som att Huset har en Inneboende. När Huset rivs så flyttar den Inneboende till ett annat Hus, den Inneboende har ett liv, även om Huset förstörs.

[FIGURE src=image/snapvt17/oophp20-uml-composition-aggregate.png caption="Skillnaden mellan aggregation och composition, i ett UML diagram, är om romben är fylld eller ej."]

I båda fallen handlar det om att ett objekt består av andra objekt. I PHP implementeras denna relation på samma sätt inuti klassen, oavsett om det är komposition eller aggregat.
