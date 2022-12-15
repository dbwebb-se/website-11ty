---
author: mos
revision:
    "2020-08-13": "(D, mos) Uppdelad i flera filer i v2."
    "2018-08-20": "(C, mos) Rätt länk till warning.png."
    "2018-06-20": "(B, mos) Genomgången och uppdaterad."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Visa felmeddelanden från PHP
=======================

Låt oss se hur vi sätter på felmeddelanden så att de visas när de inträffar.


---



En mall för testprogram {#mall}
-----------------------

Skapa en ny fil som du döper till `template.php` och fyll den med följande innehåll.

```php
<pre>
<?php

$sum = 1 + 1;

echo "Hello World\n";
echo "\n";
echo "Sum of 1 + 1 is: $sum\n";

?>
</pre>
```

Om du kör koden ovan så kan din webbsida se ut så här.

[FIGURE src=image/snapht18/template-php.png?w=w3 caption="En mallsida med ett testprogram."]

Tanken med strukturen ovan är att skriva ut allt inom html-elementet `<pre>` som ger förformatterad text och som tar hänsyn till radbrytningen `\n`. Det gör att vi slipper blanda in allt för mycket html-element i vårt kodande.



Sätt på felutskrifter {#felutskrift}
-----------------------

Det första vi gör är att se till att php visar felmeddelande när vi skriver felaktig kod.

Om felmeddelanden skall visas är en inställning i webbserverns konfiguration för php. Vissa delar av den kan vi påverka direkt i vårt skript. På följande sätt kan vi slå på utskrifter av felmeddelanden. Uppdatera din `template.php` så att följande kod finns överst i filen.

```php
<?php
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors
?>
```

Det första raden är en php-funktion som anropas för att göra en inställning om att alla typer av felmeddelande skall visas. Du kan slå upp funktionen [`error_reporting()`](http://php.net/manual/en/function.error-reporting.php) i manualen för att se vad den gör.

Du kommer ihåg att manualen är din bästa vän? Lär dig hantera den. Alla funktioner beskrivs på samma sätt och när du lärt dig uppbyggnaden så ligger hela språket öppet för dig att lära.

Den andra raden anropar en funktion `ini_set()` som ber PHP att skriva ut felmeddelanden och inte dölja dem. I vissa installationer av webbserver och php så är standardinställningen att inte visa felmeddelanden. Det är en bra inställning för system som är i drift, men inte så bra när man utvecklar eller vill lära sig. I produktionssystem vill vi inte att felmeddelanden skall visas, men när vi utvecklar så behöver vi se dem.

Nu bör felmeddelande visas i all sin tydlighet.



Provocera fram ett felmeddelande {#provocera}
-----------------------

Du kan nu tvinga fram ett felmeddelande genom att lägga till en php-rad enligt följande.

```php
echo $unknown;
```

Min kompletta testfil `unknown.php` ser ut så här.

```php
<?php
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors
?>

<pre>
<?php
echo $unknown;
?>
</pre>
```

Koden ovan försöker alltså skriva ut en variabel som inte är definierad, den finns inte. Det skall ge ett felmeddelande, liknade detta.

> _Notice: Undefined variable: unknown in /home/mos/git/dbwebbse/kurser/htmlphp/example/guide-php/01/unknown.php on line 11_

Resultatet blir så här när man kör den i webbläsaren.

[FIGURE src=image/snapht18/unknown.png?w=w3 caption="Felmeddelande som visar när man använder en variabel som inte är definierad."]

Exakt hur felmeddelandet skrivs ut kan skilja beroende på hur din webbläsare är konfigurerad.
