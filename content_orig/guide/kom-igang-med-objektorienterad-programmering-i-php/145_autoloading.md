---
author: mos
revision:
    "2019-03-25": "(B, mos) Genomgången inför vt19."
    "2018-03-19": "(A, mos) Första versionen, uppdelad av större dokument."
...
Autoloading
==================================

En autoloader sköter så att klassfilerna laddas in automatiskt, när de behövs. Det är en inbyggd konstruktion i PHP. Vi bygger en autoloader så att vi slipper göra include och require på klassfilerna.

Spara koden du skriver i denna övningen i `index_autoload.php` och autoloadern lägger du i `autoload.php`.



Kod för autoloader {#autoload}
----------------------------------

När ett objekt skapas från en klass via `new` så kontrollerar PHP om klassen är känd eller ej. Om klassen inte finns definierad sedan tidigare så anropas de autoloaders som finns.

Man kan lägga till en egen autoloader genom att definiera en funktion och registrera den som en autoloader.

```php
<?php
/**
 * Autoloader for classes.
 *
 * @param string $class the name of the class.
 */
spl_autoload_register(function ($class) {
    //echo "$class<br>";
    $path = "src/{$class}.php";
    if (is_file($path)) {
        include($path);
    }
});
```

Lägg ovanstående kod i filen `autoload.php` och skapa följande testprogram i `index_autoload.php`.

```php
<?php
/**
 * Show off the autoloader.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

$object = new Person4("MegaMic", 42);
echo $object->details();
var_dump($object);
```

Fördelen med en autoloader är att du inte behöver inkludera klassfilerna, det sköts automatiskt, allt eftersom klassfilerna behövs.



Läs mer om autoloader {#lasmer}
----------------------------------

Du kan läsa mer om [autoloading i PHP-manualen](https://www.php.net/manual/en/language.oop5.autoload.php).
