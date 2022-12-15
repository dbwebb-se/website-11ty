---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Konstruktor och destruktor
==================================

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
