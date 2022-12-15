---
author: mos
category:
    - webbprogrammering
    - databas
    - sqlite
    - php pdo
revision:
    "2018-10-10": "(D, mos) Förtydligade uppgitens krav och delade in i två delar, jetty och sök."
    "2018-09-24": "(C, mos) Genomgång i samband med uppdatering av databasen för jetty."
    "2015-08-26": "(B, mos) La till krav om att integrera multisidan från `jetty.php`."
    "2015-06-15": "(A, mos) Första utgåvan i samband med kursen htmlphp v2."
...
Bygg ut din htmlphp me-sida till version 5
==================================

Bygg in en sökmotor i din me-sida, en sökmotor som söker i din egen-konstruerade databas.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Bygg ut din htmlphp me-sida till version 4](uppgift/bygg-ut-din-me-sida-till-version-4-v2)".

Du har utfört uppgiften "[Bygg en multisida för att söka i en databas](uppgift/bygg-en-multisida-for-att-soka-i-en-databas)".



Introduktion {#intro}
-----------------------

Du skall uppdatera din me-sida och samtidigt integrera den med kod för att söka i en databas.



### Börja med att kopiera me-sidan {#copyme}

Börja med att ta en kopia från föregående uppgift `me4`, och bygg vidare på den.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -ri kmom04/me4/* kmom05/me5/
```

Nu har du din bas du kan utgå ifrån. Din resulterande sida skall finnas i katalogen `me/kmom05/me5`.

Så här kan det se ut när du är klar med sökdelen.

[YOUTUBE src=0WbqYVGy9nI width=630 caption="En sökmotor för dinosaurier på Mikaels me-sida."]



Krav {#krav}
-----------------------



### Del I Jetty {#del1}

1. Börja med att integegrera (kopiera) multisidan `jetty.php` från föregående övning, in i din me-sida och skapa ett eget menyval för sidan.

1. Skapa katalogen `me/kmom05/me5/db` och lägg databasen i den.

1. Din DSN skall finnas i din fil `config.php`.

1. Dina databas-funktioner skall ligga i `src/functions.php`.



### Del II Sök {#del2}

1. Skapa en ny databas med en tabell i. Tabellen innehåller minst tre rader där varje rad har minst tre kolumner. Om du inte kommer på nåt eget så gör du en tabell för dinosaurier.

1. Lägg till en ny DSN för denna databasen och spara den i din fil `config.php`.

1. Skapa en ny sidkontroller, `search.php`. Lägg den som en del av navbaren och döp till "Sök".

1. I din sida `search.php`, skapa ett formulär som gör att du kan söka i din databas.

1. Återanvänd funktionerna du har i `src/functions.php`. Lägg till nya och/eller modifiera dem vid behov.

1. I sök-sidan, presentera en länk som användaren kan klicka på för att se allt innehåll i databastabellen, presenterat i en HTML-tabell.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kursrepot
#dbwebb validate me5
dbwebb publish me5
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

* Kan du göra så din sökmotor liknar Bing eller Googles sökmotor?



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
