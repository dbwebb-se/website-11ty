---
author: mos
category: webbprogrammering
revision:
  "2015-09-09": (C, mos) Förtydligade krav om att undersida som visar detaljer om
    `$_SERVER`.
  "2015-08-24": (B, mos) Bort med uppgift om styling, flyttad till me-sidans uppgift.
  "2015-05-20": (A, mos) Första utgåvan i samband med kursen htmlphp v2.
updated: "2015-09-09 09:12:44"
created: "2015-01-28 15:09:15"
...
Bygg en multisida och testa arrayer
==================================

Låt oss använda PHP för att skapa mer dynamiska sidor. I denna uppgift handlar det om enklare PHP-konstruktioner som `if`, `switch`, `array` och `include` för att skapa *multisidor*, en sida med många undersidor och en *aside*-meny att navigera mellan sidorna.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Bygg en multisida med PHP](kunskap/bygg-en-multisida-med-php)".



Introduktion {#intro}
-----------------------

Du skall göra en multisida likt den som visats i artikeln ovan.

Börja med att ta en kopia från exempelkoden som följer med artikeln.

```bash
# Ställ dig i rooten av kursrepot
cp -ri example/multipage/* me/kmom03/multi/
```

Nu har du din bas du kan utgå ifrån. Spara alla dina filer i katalogen `me/kmom03/multi`.



Krav {#krav}
-----------------------

1. Implementera multisidan med en switch-case-sats.

1. Multisidan skall ha en default-sida som visas om `?page` inte finns eller om `page` saknar ett värde.

1. Använd ternary operator för att hantera `$_GET['page']`.

1. Skriv säker PHP-kod och validera inkommande `$_GET`, innan du använder dem eller skriver ut dem.

1. Se till att din kod är DRY.

1. Gör så att menyvalet i menyn blir aktivt, visa en annorlunda stil för den undersida som är vald.

1. Bygg ut undersidan som skriver ut innehållet i arrayen `$_SERVER`. Lägg till så att den även anger antalet värden som finns i arrayen `$_SERVER`. Till exempel "There are XX entries in the array.".

1. Skapa en ny undersida som innehåller följande. Skriv en `foreach()` loop som räknar ut längden på varje värde i arrayen `$_SERVER`. För varje nyckel i arrayen, skall du ta värdet och räkna ut längden av det med `strlen()`. Skriv ut nyckeln (key), följt av längden (`strlen()`) på dess värde (value). Avsluta med att skriva ut själva innehållet i den key/value som "är längst".

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb publish multi
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

* Bygg fler multisidor och gör fler egna tester.

* Om du anger en felaktig referens på `?page=` så skicka en header för http-koden 404. [Tips om 404-header](kunskap/kom-i-gang-med-php-pa-20-steg#header-func).

* Kommentera bort din switch-sats och lös det med en array och en if-sats (överkurs).



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!




