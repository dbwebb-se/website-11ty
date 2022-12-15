---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2017-09-11": "(A, mos) Första utgåvan."
...
Integrera me-sidan med egen kommentarsmodul från Packagist
===================================

Du skall använda dig av din kommentarsmodul som du publicerat på Packagist och integrera den i din me-sida genom att installera den med kommandot composer.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Skapa en PHP-modul och publicera på GitHub och Packagist](uppgift/skapa-en-php-modul-och-publicera-pa-github-och-packagist)".



Introduktion {#intro}
-----------------------

Du skall använda dig av din modul från Packagist och installera den i din me-sida med hjälp av composer.

Se till att du kan följa dina egna installationsinstruktioner som du tidigare har skapat i filen `README.md` för modulen.

När du är klar så har du egentligen samma kodbas som inför detta kursmomentet. Du har bara lyft ut koden ur din me-sida, placerat koden in i en modul och åter installerat den i din me-sida. Du har vunnit en mer hållbar kodstruktur.



Krav {#krav}
-----------------------

1. Du jobbar i `me/anax`.

1. Använd kommandot composer för att installera din kommentarsmodul.

1. Följ dina egna instruktioner från filen `README.md` och installera modulen i din me-sida.

1. Verifiera att alla delar verkligen ligger i modulen. Uppdatera modulen vid behov och tagga om.

1. Kör `make test` för att kolla att du inte har några valideringsfel.

1. Gör en `dbwebb validate comment` för att kolla att allt validerar och fungerar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
