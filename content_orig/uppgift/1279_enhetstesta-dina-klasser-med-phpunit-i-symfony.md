---
author: mos
category:
    - kurs mvc
revision:
    "2022-04-18": "(A, mos) Första utgåvan i mvc-v2."
...
Enhetstesta dina klasser med PHPUnit i Symfony
===================================

Du skall jobba med enhetstestning mot din kod från kortspelet i Symfony. Dina testobjekt är alltså de klasser som du har i kortspelet. Vi kan inledningsvis exkludera controller-klasser och enbart fokusera på modell-klasserna.

Du skall skapa en testsuite av testfall som testar så mycket som möjligt och rimligt i dina testobjekt.

Tanken är att du försöker nå så hög kodtäckning som är möjligt och rimligt

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i enhetstestning med phpunit.

Du har installerat Xdebug och kan mäta kodtäckning med phpunit.



Introduktion och förberedelse {#intro}
-----------------------

Börja med att installera PHPUnit på det viset som Symfony rekommenderar att det görs tillsammans med en Symfony applikation. Du kan se hur man gör i artikeln "[Run unittests with PHPUnit in Symfony](https://github.com/dbwebb-se/mvc/tree/main/example/phpunit-symfony)".



Krav {#krav}
-----------------------

Kraven är uppdelade i sektioner.



### Installera och konfigurera {#phpunit}

1. Installera phpunit och lägg till det som ett skript `composer phpunit`.

1. Gör så att kodtäckningsrapport för HTML genereras till katalogen `build/coverage`.

<!--
Ändra katalog till doc/coverage så man kan använda den för att kolla kodtäckning
-->



### Bygg en test suite {#testsuite}

1. Skapa en test suite för ditt kortspel.

1. Dina modellklasser är dina testobjekt och varje modellklass skall ha minst en testklass med testfall.

1. Varje testfall har minst en assertion.

1. Du har en kodtäckning som överträffar 50% på varje testobjekt.

1. Det är helt okey om du vill uppdatera din källkod för att göra en bättre eller mer testbar.



### Utvecklingsmiljö {#miljo}

<!-- Skall man linta koden i test? -->

1. Fixa till din kod enligt den kodstil du kör genom att köra `composer csfix`. Se till att skriptet även fixar kodstilen i katalogen `tests`.

1. Kolla din kod hur den matchar dina linters genom att köra `composer lint`.

1. Dubbelkolla att dina testfall passerar med `composer phpunit`.

1. Generera documentation av din kod med `composer phpdoc`.



### Publicera {#publicera}

1. Committa alla filer och lägg till en tagg 4.0.0. Om du gör uppdateringar så ökar du taggen till 4.0.1, 4.0.2, 4.1.0 eller liknande.

1. Kör `dbwebb test kmom04` för att kolla att du inte har några fel.

1. Pusha upp repot till GitHub, inklusive taggarna.

1. Gör en `dbwebb publishpure report` och kontrollera att att det fungerar på studentservern.



<!--
Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

-->



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i chatt och forum om du behöver hjälp!
