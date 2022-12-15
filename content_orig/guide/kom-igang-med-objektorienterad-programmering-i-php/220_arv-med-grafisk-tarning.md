---
author: mos
revision:
    "2018-03-27": "(A, mos) Första versionen, uppdelad av större dokument och uppdaterad."
...
Arv med grafisk tärning
==================================

Arv är en av de vanligaste objektorienterade konstruktionerna. Vi skall se hur den implementeras i PHP genom att skapa en grafisk tärning, en tärning som kan visa upp slagen med en grafisk representation. Vi hanterar även besläktade termer som överlagring, parent::, self:: och konstanter i en klass.

Spara koden du skriver i denna övningen i `index_dicegraphic.php`, `src/Dice/Dice.php`, `src/Dice/DiceHand.php` samt i den nya klassfilen `src/Dice/DiceGraphic.php`.



Om arv {#omarv}
---------------------------------

Det handlar om att en klass ärver från en annan klass. Man kan säga att den ärvande klassen utökar, eller specialiserar, basklassen. Basklassen kallas även superklass och den ärvande klassen kallas subklass.

I vårt exempel har vi en tärning, men nu behöver vi en grafisk tärning och tanken är att implementera klassen `DiceGraphic` som en specialiserad klass som kan allt som `Dice` kan, men har ytterligare färdigheter i formen att kunna skriva ut en grafisk representation av tärningen.



DiceGraphic utökar Dice {#utokar}
---------------------------------

I PHP implementeras arv genom nyckelordet `extends`, utökar.

```php
namespace Mos\Dice;

/**
 * A graphic dice.
 */
class DiceGraphic extends Dice
{ }
```

I detta läget har klassen DiceGraphic exakt samma funktioner som dess basklass.

Vi kan göra ett testprogram `index_dicegraphic.php` för att kontrollera.

```php
namespace Mos\Dice;

/**
 * Throw some graphic dices.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");

$dice = new DiceGraphic();
$res = [];
for ($i = 0; $i < 6; $i++) {
    $res[] = $dice->roll();
}

?><h1>Rolling six graphic dices</h1>

<p><?= implode(", ", $res) ?></p>
<p>Sum is: <?= array_sum($res) ?>.</p>
<p>Average is: <?= round(array_sum($res) / 6, 1) ?>.</p>
```

Resultatet kan se ut så här.

[FIGURE src=image/snapvt18/graphic-dice-1.png?w=w3 caption="En specialiserad tärningsklass, ännu utan grafiska förmågor."]

Då bygger vi klart klassen `DiceGraphic`.



Konstruktor och parent:: {#parent}
-------------------------------

I klassen `Dice` tar konstruktorn ett argument där man kan bestämma hur många sidor tärningen skall ha. Konstruktorn ärvs ned till `DiceGraphic` vilket ger att man kan ange godtyckligt antal sidor även för den. Det funkar inte för oss då vi har en begränsad uppsättning av grafik till vår tärning, vår tärning skall ha sex sidor, varken mer eller mindre. Vi kan se det som ytterligare en specialisering av subklassen.

Vi löser detta genom att överlagra konstruktorn och definera en egen i vår klass. Vår variant av konstruktorn tar inget argument och anropar sedan basklassens konstruktor med ett argument som är lika med sex. Det ser ut så här.

```php
class DiceGraphic extends Dice
{
    /**
     * Constructor to initiate the dice with six number of sides.
     */
    public function __construct()
    {
        parent::__construct(6);
    }
```

Det är anropet som inleds med `parent::` som gör anropet till basklassens konstruktorn och skickar med det argument som behövs. Vår konstruktor ser till att initieringen av basklassen blir korrekt. 

Konstruktionen `parent::` är en referens till basklassen, den kan användas för att specifikt kalla på de delar som ligger inuti basklassen, även om man i nuvarande klass har gjort en överlagring på dem, som i detta fallet med konstruktorn.

Måste vi skicka med siffran 6 i konstruktorn, den är ju ändå default argument i Dice? Här kan vi göra vilket vi vill. Jag väljer att skicka med sexan för att vara tydlig, dessutom skyddar jag mig mot att någon skulle ändra det publika API:et för klassen Dice och uppdatera dess konstruktor eller dess default värde på antalet sidor, man kan aldrig veta.

Men ser det inte udda ut att hårdkoda en sexa i anropet? Jo, det gör det.



Konstanter i en klass {#konstant}
-------------------------------

En variant på att vara tydlig är att göra en konstant `DiceGraphic::SIDES` som tydligt definierar antalet sidor som den grafiska klassen har.

```php
class DiceGraphic extends Dice
{
    /**
     * @var integer SIDES Number of sides of the Dice.
     */
    const SIDES = 6;

    /**
     * Constructor to initiate the dice with six number of sides.
     */
    public function __construct()
    {
        parent::__construct(self::SIDES);
    }
}
```

Att skriva konstantens namn med stora bokstäver och eventuellt separerade med underscore, är ett val jag gör, för att följa kodningsstandarden PSR-1.

Synligheten för en konstant i en klass är public, från och med PHP 7.1 kan man även ange private för en konstant.

Du ser hur en klasskonstant definieras med `const SIDES = 6;` och du ser hur den nås via `self::SIDES`. Jämför `self::` med `parent::` så förstår du att den första refererar till den egna klassens medlemmar och den andra refererar till föräldrarklassens medlemmar. Tänk att `self::` och `parent::` refererar till _klassens_ medlemmar, det är inte samma sak som `$this` som refererar till _objektets_ medlemmar. Det är nästan samma sak, men inte riktigt. Vi behöver alltså ha koll på tre olika sätt att nå klassens och objektets medlemmar.

| Hur        | Vad    |
|------------|--------|
| `self::`   | Referera till den egna klassen. | 
| `parent::` | Referera till förälder/super/bas klassen. | 
| `$this->`  | Referera till nuvarande objekt. | 

Kanske blev det övertydligt att byta ut sexan mot en konstant i klassen, men tänk att detta kan ofta vara ett bra sätt att få tydlig kod. Vi gillar inte "slumpmässiga" hårdkodade värden som finns inslängda här och var i vår kod, det gör koden svårläst.



Arv i UML {#arvuml}
---------------------------

Om man vill rita en bild över arv, enligt UML, så kan det se ut så här.

[FIGURE src=image/snapvt18/dice-graphic-uml.png caption="En pil indikerar arv."]

I UML representeras arvet av en pil som menar att den ärvande klassen utökar/extends basklassen.
