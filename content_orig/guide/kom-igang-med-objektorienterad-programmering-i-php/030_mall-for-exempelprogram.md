---
author: mos
revision:
    "2019-03-25": "(C, mos) Genomgången inför vt19."
    "2018-03-26": "(B, mos) More verbose exception handler from Anax."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Mall för exempelprogram
==================================

I denna guiden kommer du att göra en del exempelprogram. Du skall spara dem i en egen katalog och tanken är att dessa små exempelprogram kan vara bra att ha framöver.

Låt oss skapa en struktur för exempelprogrammen.

När vi är klara har vi en grundstruktur som ser ut så här.

```text
$ tree .
.
├── config.php
├── index_error.php
├── index_exception.php
└── index_hello.php

0 directories, 4 files
```



Visa felutskrifter {#fel}
----------------------------------

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

Bra, det blir enklare om vi kan se felen.



Egen felhantering av Exceptions {#exceptions}
----------------------------------

Jag väljer också att skapa en egen hanterare för Exceptions som kastas och inte fångas. Jag bygger ut min `config.php` med följande funktion.

```php
/**
 * Default exception handler.
 */
set_exception_handler(function ($e) {
    echo "<p>Anax: Uncaught exception:</p><p>Line "
        . $e->getLine()
        . " in file "
        . $e->getFile()
        . "</p><p><code>"
        . get_class($e)
        . "</code></p><p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><pre>"
        . $e->getTraceAsString()
        . "</pre>";
});
```



Index-filer för main-programmen {#index}
----------------------------------

För varje program som skall vara körbart så skapar jag en `index_.php`.

Vi kan börja skapa en enkel fil, bara för att visa att det fungerar. Filen kan du köra i din webbläsare, eller direkt i terminalen.



### Sidan index_hello {#hello}

Jag börjar med filen `index_hello.php`.

```php
<?php
/**
 * Just display some nice message to see it all works.
 */
include(__DIR__ . "/config.php");

echo "Hello oophp";
```

Så här ser det ut när jag kör programmet. i webbläsaren.

[FIGURE src=image/snapvt18/oophp20-hello.png?w=w3 caption="Webbläsaren säger hej med PHP."]

Men det går likabra att köra koden i terminalen.

```text
$ php index_hello.php 
Hello oophp
```

Tänk på att webbläsaren och terminalen hanterar radbrytningar på olika sätt.



### Sidan index_error {#error}

Sedan gör jag en likadan i `index_error.php`, men jag tvingar fram ett felmeddelande för att se att de visas. Det är lika bra att vara på den säkra sidan.

```php
<?php
/**
 * Just display some nice message to see it all works.
 */
include(__DIR__ . "/config.php");

echo $hello;
```

Du kan se felet?

[FIGURE src=image/snapvt18/oophp20-error.png?w=w3 caption="Webbläsaren är tydlig att visa felmeddelande."]

Fel visar sig även i terminalen.

```text
$ php index_error.php 
PHP Notice:  Undefined variable: hello in /home/mos/oophp-guide/index_error.php on line 7
PHP Stack trace:
PHP   1. {main}() /home/mos/oophp-guide/index_error.php:0

Notice: Undefined variable: hello in /home/mos/oophp-guide/index_error.php on line 7

Call Stack:
    0.0000     351776   1. {main}() /home/mos/oophp-guide/index_error.php:0
```

Det är bra om du bekantar dig med att köra PHP öven via terminalen, det gör det enklare för dig när vi senare kommer igång med enhetstester.

Att göra små enkla testprogram, i webbläsaren eller via terminalen, är bra sätt att lära sig hur kodkonstruktioner fungerar och det är bra sätt att felsöka på.



### Sidan index_exception {#exception}

Vi bygger även en testsida för att visa att exceptionhanteraren fungerar. För att testa det så behöver vi framkalla ett exception.

```php
<?php
/**
 * Provoke an exception to try out the exception handler.
 */
include(__DIR__ . "/config.php");

throw new Exception("To try out the default exception handler.");
```

När du öppnar sidan i webbläsaren kan det se ut så här.

[FIGURE src=image/snapvt18/oophp20-default-exception.png?w=w3 caption="Nu har vi en default hanterare för de exception som inte fångas."]

Om du vill så kan du modifiera utskriften i din default exceptionhanterare, så det blir enkelt att läsa felmeddelandet.



Mallen klar {#mallklar}
---------------------------------

Du har nu en fungerande mall för dina testprogram, felmeddelanden visas och du har en inbyggd hantering för att visa de exceptions som kastas.
