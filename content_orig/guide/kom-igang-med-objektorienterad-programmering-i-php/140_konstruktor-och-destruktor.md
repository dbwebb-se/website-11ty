---
author: mos
revision:
    "2019-03-25": "(B, mos) Genomgången inför vt19."
    "2018-03-19": "(A, mos) Första versionen, uppdelad av större dokument."
...
Konstruktor och Destruktor
==================================

Konstruktorn anropas i samband med att objektet skapas, eller instansieras, tillsammans med anropet till `new`.

Destruktorn är det sista som anropas i klassen när den raderas och förstörs. 

Spara koden du skriver i denna övningen i `index_constructor.php` och i `src/Person4.php`.



Skapa en konstruktor {#constructor}
----------------------------------

Vi tar en kopia av klassen `src/Person3.php` och sparar den som `src/Person4.php`.

Lägg till en konstruktor till din klass.

Konstruktorn är en metod `__construct()` som anropas när ett objekt skapas. Den kan se ut så här.

```php
/**
 * Constructor to create a Person.
 *
 * @param string $name The name of the person.
 * @param int    $age  The age of the person.
 */
public function __construct(string $name, int $age)
{
    $this->name = $name;
    $this->age = $age;
}
```

Skapa testprogrammet `index_constructor.php` och skapa ett objekt av klassen.

Det kan se ut så här när du nu skapar ett objekt av klassen.

```php
$object = new Person4("MegaMic", 42);
```



En flexibel konstruktor {#flex}
----------------------------------

Men, säg om jag nu inte har åldern på personen jag vill skapa, kanske har jag inte heller namnet. Hur gör jag en sådan konstruktor som kan vara lite flexibel?

```php
$object = new Person4("MegaMic", 42);
$object = new Person4("MegaMic");
$object = new Person4();
```

I PHP kan vi inte överlagra metoder eller konstruktorn, genom att skapa flera metoder som tar olika varianter av argument. Vi får skapa en metod som kan hantera alla fallen via default argument.

Här är en konstruktor som kan hantera alla fallen av initiering av objektet.

```php
/**
 * Constructor to create a Person.
 *
 * @param null|string $name The name of the person.
 * @param null|int    $age  The age of the person.
 */
public function __construct(string $name = null, int $age = null)
{
    $this->name = $name;
    $this->age = $age;
}
```

När man kör ett sådant exempelprogram så kan det se ut så här.

[FIGURE src=image/snapvt18/oophp-constructor.png?w=w3 caption="En flexibel konstruktor som hanterar olika omständigheter vid initieringen av objektet."]



Konstruktor versus setters {#kons-setter}
----------------------------------

En konstruktor kan alltså sätta värden i ett objekt när det instansieras. Med setters kan man åstakomma liknande, men där skapar man först objektet och sedan sätter man dess värden.

En konstruktor och setters kan komplettera varandra och vilken väg man väljer kan skifta, lite beroende av omständigheter och vilken kod man vill ha.



Destructor {#destructor}
----------------------------------

När ett objekt förstörs så anropas dess destruktor, om den finns. I PHP är det inte nödvändigt med en destruktor till ett objekt, om det inte finns allokerade delar som behöver förstöras för hand. PHP's automatiska _garbage_ hantering tar hand om och förstör det minnet som är kopplat till objektet.

För att testa så skapar vi en destruktor till vår klass och vi skriver ut en textsträng när destruktorn anropas. Referensen `__METHOD__` är en inbyggd variabel i PHP som berättar namnet på den metod som nu exekveras.

```php
/**
 * Destroy a Person.
 */
public function __destruct()
{
    echo __METHOD__;
}
```

Om du nu kör ditt testprogram så kan du se när respektive objekt förstörs, det är då som konstruktorn anropas.

Så här ser det ut för mig.

[FIGURE src=image/snapvt18/oophp-destructor.png caption="Destruktorn anropas varje gång jag skriver över min variabel."]

Utskriften kan se lite udda ut, men det klarnar när man tittar på mitt program och man ser att jag återanvänder variabeln `$object`.

Kan du se när i koden som destruktorn anropas?

```php
$object = new Person4("MegaMic", 42);
echo $object->details();
var_dump($object);

$object = new Person4("MegaMic");
echo $object->details();
var_dump($object);

$object = new Person4();
echo $object->details();
var_dump($object);
```
