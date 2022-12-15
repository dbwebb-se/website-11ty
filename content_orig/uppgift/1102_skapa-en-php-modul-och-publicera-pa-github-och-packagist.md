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
Skapa en PHP-modul och publicera på GitHub och Packagist
===================================

Du skall skapa en PHP-modul av ditt kommentarssystem och publicera det på GitHub och Packagist.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört en serie av uppgifter rörande ett kommentarssystem, varav den sista hetta "[Kommentarssystem med användare](uppgift/kommentarssystem-med-anvandare)".

Du har också jobbat igenom artikeln "[Skapa en PHP-modul på Packagist och integrera med Anax](kunskap/skapa-en-php-modul-pa-packagist-och-integrera-med-anax)". 



Introduktion {#intro}
-----------------------

Du skall lyfta ut koden för ditt kommentarssystem och placera i en egen modul som blir till sitt egna repo på GitHub. Du publicerar sedan modulen på webbplatsen Packagist så att den går att installera med kommandot composer.



Krav {#krav}
-----------------------

1. All kod kan du placera i `me/comment`.

1. Skapa ett eget repo för din kommentarsmodul. Flytta alla relevanta delar till repot.

1. Lägg upp repot på GitHub.

1. Tagga repot i en version v1.0.0 eller större.

1. Publicera repot på Packagist. Se till att Packagist blir automatiskt uppdaterat med senaste informationen när du pushar till GitHub.

1. Lägg till enhetstester med `phpunit` som testar din modul. Det finns inga krav på omfattningen av enhetstesterna, men det måste finnas tester. Kan du nå kodtäckning om 30%, 50% eller mer?

1. Dokumentera i din `README.md`-fil hur man tar din modul och integrerar med Anax. Det går bra att vara kortfattade och räkna med att läsaren kan sin Anax.

1. När du är klar så lägger du till en ny tagg och pushar.

1. Ditt repo skall vara förberett för att köra tester med `make test`.

1. Kör `make test` för att kolla att du inte har några valideringsfel.

1. Gör en `dbwebb validate comment` för att kolla att allt validerar och fungerar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
