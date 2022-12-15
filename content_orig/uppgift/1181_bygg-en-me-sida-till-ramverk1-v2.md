---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2018-11-05": "(B, mos) Publicerad."
    "2018-11-02": "(A, mos) Kopierad från tidigare utgåva."
...
Bygg en me-sida till ramverk1 (v2)
===================================

Du skall sätta samman en me/redovisa-sida för kursen.

Du lägger allt i ett repo och när du är klar så publicerar du och taggar ditt repo på GitHub.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har en labbmiljö motsvarande [kursen ramverk1](kurser/ramverk1-v2/kmom01#labbmiljo).



Introduktion och förberedelse {#intro}
-----------------------

Följande steg hjälper dig att komma igång med uppgiften.



### Utgå från example/redovisa {#redovisa}

Det ligger en exempelkatalog under `example/redovisa`. Använd den för att komma igång.

```text
# Stå i kursrepot
rsync -a example/redovisa me/
cd me/redovisa
composer install
chmod 777 cache/*
```

Peka webbläsaren till `me/redovisa/htdocs` för att se resultatet.

Glöm inte redigera `htdocs/.htaccess` när du publicerar till studentservern.



### Information om ramverket {#info}

När du öppnat redovisa-sidan så finns ett menyval "Verktyg". Under det finns en guide med artiklar som du bör läsa igenom. Det är information som hjälper dig att hantera och navigera ramverkets installation.



<!--
* Förklara hur mycket man måste göra med temat, vad är kravet?
-->



Krav {#krav}
-----------------------

1. Anpassa din installation av `me/redovisa` så att din förstasida handlar om dig och om-sidan handlar om kursen och ditt repo.

1. Välj hur du vill jobba med temat, din style, modifiera den så att den "blir din egen style". Jobba med `theme/` (less) som följer med eller gör din helt egen stylesheet (css, sass, less, bootstrap, annat), eller hårdkoda css-kod direkt in i nuvarande stylesheet och modifiera befintlig style via nya regler.

1. Kör `make install test` för att kolla att du inte har några valideringsfel.

1. Gör en `dbwebb publish redovisa` för att kolla att det fungerar.

1. Committa alla filer och lägg till en tagg (1.0.\*).

1. Pusha upp repot till GitHub, inklusive taggarna.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
