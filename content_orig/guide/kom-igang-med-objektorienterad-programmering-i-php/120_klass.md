---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Klass
==================================

Vi skapar en egen klass och instansierar ett objekt av klassen.

Spara koden du skriver i denna övningen i `index_person1.php`. Klassfilen sparar du i `src/Person1.php`.



En egen klass {#egenklass}
----------------------------------

Vi återskapar samma klass vi hade nyss, men nu i en egen klass som du sparar i filen `src/Person1.php`. Vi använder stora bokstäver på filer som innehåller klasser, det är ett val vi gör för att vara tydliga och en kodstandard vi valt att följa.

```php
class Person1
{
    public $name;
    public $age;

    public function details() {
        return "My name is {$this->name} and I am {$this->age} years old.";
    }
}
```

I vårt main-program `index_person1.php` behöver vi nu inkludera klass-filen. Sedan kan vi skapa ett objekt av klassen, lägga till värden i objektet och anropa metoden `details()`.

Funktioner som ligger som medlemmar i en klass brukar vi omtala som _metoder_.

Properties som ligger i klassen brukar vi även kalla medlemsvariabler.

```php
$object = new Person1();
$object->age = 42;
$object->name = "MegaMic";

echo $object->details();
var_dump($object);
```

Så här kan det se ut när du kör programmet.

[FIGURE src=image/snapvt18/oophp20-person1.png?w=w3 caption="Detaljer om objektet skrivs ut."]



Det egna objektet, $this {#this}
----------------------------------

Variabeln `$this` är en referens till nuvarande objekt och används i klassens metoder för att referera det objekt som anropar metoden.

Utanför objektet så kan en metod anropas så här, det är en kombination av objektet och dess metod.

```php
$object->details();
```

Inuti metoden så används `$this` för att referera till det objekt som anropade metoden, i detta fallet `$object`.

```php
/**
 * Print out details on the person.
 *
 * @returns string with details on person.
 */
public function details() {
    return "My name is {$this->name} and I am {$this->age} years old.";
}
```

Så, i detta fallet så är alltså `$this` samma sak som `$object`. Klassens metoder innehåller generell kod som fungerar för alla objekt av klassen och `$this` är sättet att referera till det anropande objektet, instansen av klassen, och dess specifika medlemsvariabler.

För att komma åt medlemsvariabeln `$age` så skriver du `$this->age` i din metod.

I mitt exempel ovan används `{}` för att omringa variabeln inuti textsträngen, det är för att variabeln skall kunna parsas inom ramen för textsträngen.
