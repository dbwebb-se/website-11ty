---
author: mos
category:
    - webbprogrammering
    - databas
    - sqlite
    - php pdo
revision:
    "2018-10-10": "(C, mos) Multisida inte ett krav, rekommenderad lösning med sidkontroller."
    "2018-09-24": "(B, mos) Genomgången i samband med htmlphp v3."
    "2015-08-27": "(A, mos) Första utgåvan i samband med kursen htmlphp v2."
...
Bygg ut din htmlphp me-sida till version 6
==================================

Bygg in funktioner in din me-sida, som löser CRUD, så att man kan lägga till, uppdatera, radera och visa innehåll i databasen.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Bygg ut din htmlphp me-sida till version 5](htmlphp/proj5)".

Du har jobbat igenom artikeln "[Kom igång med SQLite och PHP PDO](kunskap/kom-igang-med-sqlite-och-php-pdo)". Artikeln innehåller kodbasen du behöver.



Introduktion {#intro}
-----------------------

Du skall lägga till en del till din mesida, där du kan jobba mot innehållet i en databas. Du skall kunna skapa nya rader i databasen, uppdatera informationen i befintliga, ta bort rader och visa samtliga rader.



### Börja med att kopiera me-sidan {#copyme}

Börja med att ta en kopia från föregående uppgift `me5`, och bygg vidare på den.

```bash
# Ställ dig i kursrepot
cd me
cp -ri kmom05/me5/* kmom06/me6/
```

Nu har du din bas du kan utgå ifrån. Din resulterande sida skall finnas i katalogen `me/kmom06/me6`.

Du kan jobba vidare på den databasen du använde i föregående kursmoment tillsammans med `search.php`. Databasen innehöll dinosaurier, eller om du hittade på något eget.

Uppgiften är skriven för att implementeras med vanlig sidkontroller (rekommenderas), men du kan välja att implementera uppgiften i en multisida om du så väljer.



Krav {#krav}
-----------------------

1. Skapa en ny sida/sidkontroller och döp den till `admin.php` (A). Lägg till ett menyval i navbaren för sidan.

1. Sidan (A) skall visa en översikt av alla "dinosaurier" i en HTML tabell.

1. Sidan (A) skall länka till en ny sida för "create". Sidan skall innehålla ett formulär där du kan fylla i detaljer om en dinosaurie (eller vad du nu valt) och en knapp för att lägga till en ny dinosaurie till din databas.

1. Via sidan (A) skall man kunna nå en sida "update" där man kan redigera detaljer om en dinosaurie och spara.

1. Via sidan (A) skall man nå en sida "delete" med vilken man kan radera en dinosaurie.

1. Via sidan (A) skall man nå en sida "init" som återskapar din databas från början med helt nytt innehåll i tabellen.

1. Försäkra dig om att din befintliga sida `search.php` nu hittar alla dinosaurier i din databas.

1. Lägg tid på att testa ditt flöde så att man enkelt kan klicka sig vidare mellan sidorna. Tänk att någon skall sitta och underhålla din databas via detta administrativa gränssnitt.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kursrepot
#dbwebb validate me6
dbwebb publish me6
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
