---
author: mos
revision:
    "2020-08-13": "(D, mos) Uppdelad i flera filer i v2."
    "2018-08-20": "(C, mos) Rätt länk till warning.png."
    "2018-06-20": "(B, mos) Genomgången och uppdaterad."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Typer av felmeddelande
=======================

Det finns olika typer av felmeddelande som säger hur allvarligt felet är. Låt oss titta på ett par av dessa feltyper.

---


Olika feltyper {#feltyper}
-----------------------

Ovan var typen för felmeddelandet en NOTICE. En _notice_ är inte så allvarlig så att exekveringen behöver avbrytas. Exekveringen fortsätter trots felmeddelandet. Det samma gäller för fel av typen WARNING.

Men när felet blir ERROR eller PARSE så blir felet så allvarligt så att exekveringen avbryts.

Det finns också feltyper som DEPRECATED som säger att kodkonstruktioner är obsolete och inte stöds i kommande versioner av språket.

I manulen finns en lista på [olika feltyper](http://php.net/manual/en/errorfunc.constants.php) i språket.

Låt oss titta på ett par exempel av olika fel.



Feltypen WARNING {#warning}
-----------------------

Ett exempel på ett felmeddelande av typen WARNING är när man glömmer att skicka med ett argument till en funktion.

```php
// Correct
floor(2,5);

// Wrong, missing the required argument
floor();
```

Funktionen [`floor()`](http://php.net/manual/en/function.floor.php) kräver ett argument som skall avrundas nedåt till närmaste heltal.

Felmeddelandet säger då följande.

> _Warning: floor() expects exactly 1 parameter, 0 given in /home/mos/git/dbwebbse/kurser/htmlphp/example/guide-php/01/warning.php on line 11_

Det kan se ut så här.

[FIGURE src=image/snapht18/warning.png caption="Ett felmeddelande av typen WARNING."]



Feltypen PARSE {#parse}
-----------------------

Feltypen PARSE säger att PHP inte kan parsa koden, det är en fel i syntaxen som ger reglerna för de konstruktioner som är giltiga i språket.

När du får ett PARSE fel så avbryts exekveringen.

Här är två exempel på PARSE fel.

```php
// Correct
echo "hej";

// Wrong, missing semicolon
echo "hej"

// Correct, rounding the value to two decimals
round(3,1415, 2);

// Wrong, lacking the second argument but has a ending ,
round(3,1415,  );
```

I första fallet får vi ett felmeddelande som påpekar att php-parsern förväntade sig ett `,` eller `;`.

> _Parse error: syntax error, unexpected 'echo' (T_ECHO), expecting ',' or ';' in /home/mos/git/dbwebbse/kurser/htmlphp/example/guide-php/01/warning.php on line 14_

Parsern jobbar enligt språkets syntax och det regelverket säger hur koden skall skrivas för att vara syntaktiskt korrekt.
