---
author: mos
revision:
    "2018-03-23": "(B, mos) Update type in docblock."
    "2018-03-19": "(A, mos) Första versionen, uppdelad av större dokument."
...
DocBlock kommentarer
==================================

När man skriver kod brukar man använda kommentarsblock för att dokumentera koden.

Uppdatera din befintliga kod i `src/Person1.php` så att den använder docblock kommentarer.

Här ser du koden för klassen Person1 skriven med DocBlocks kommentarer att kommentera koden.

```php
/**
 * Showing off a standard class with methods and properties.
 */
class Person1
{
    /**
     * @var string  $name   The name of the person.
     * @var integer $age    The age of the person.
     */
    public $name;
    public $age;


    /**
     * Print out details on the person.
     *
     * @return string with details on person.
     */
    public function details() {
        return "My name is {$this->name} and I am {$this->age} years old.";
    }
}
```

Koden och dess kommentarer kan sedan parsas av verktyg som [phpDocumentor](https://docs.phpdoc.org/) för att generera dokumentation av koden.

Det finns också statiska kodvalidatorer som parsar docblocken för att finna felaktigheter i kod och dokumentation.

För att lära dig med om Docblock så går du till hemsidan för phpDocumentor, de har en referensmanual för hur man kan skriva sina docblocks.
