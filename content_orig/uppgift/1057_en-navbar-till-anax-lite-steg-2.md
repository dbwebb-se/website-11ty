---
author: mos
category:
    - kurs oophp
    - php
    - anax-lite
revision:
    "2017-03-17": "(A, mos) Första utgåvan i samband med kursen oophp v3."
...
En navbar till Anax Lite (steg 2)
==================================

Du skall utveckla kod och struktur som hjälper dig att generera HTML-kod för olika typer av navbar och menyer. Tanken är att du konfigurerar dina menyer via en array och du har kod som med hjälp av arrayen kan skapa HTML-kod för navbaren/menyn.

Detta är första steget i övningen och här skriver du din kod i vyn och arrayen konfigurerar du i vyn.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har löst uppgiften "[En navbar till Anax Lite (steg 1)](uppgift/en-navbar-till-anax-lite-steg-1)" och du kan jobba med klasser i PHP motsvarande "[Kom igång med objektorienterad PHP-programmering på 20 steg](kunskap/kom-i-gang-med-oophp-pa-20-steg)".  

Du har även gått igenom artikeln "[Att integrera en klass i ramverket Anax Lite](kunskap/att-integrera-en-klass-i-ramverket-anax-lite)"



Introduktion {#intro}
-----------------------

Följande är grundläggande information som du underlättar för att lyckas med uppgiften.



###Var lägger jag koden? {#var}

Spara alla filerna under ditt `me/anax-lite`.

View-filer lägger du under `view/navbar2/`.

Konfigurationsarrayen lägger du direkt i vyn (enklast), eller under `config/navbar.php` (mer utmanande).

Klassen lägger du i `src/Navbar/Navbar.php` med motsvarande namespace.



Krav {#krav}
-----------------------

1. Skapa en klass för din navbar. Använd rätt namespace.

1. Använd de färdiga konstruktionerna för `interfaces` och `traits`.

1. Se till så navbaren är en del av ramverket.

1. Använd en konfigurationsfil, `navbar.php`, som styr innehållet i menyn.

1. Välj ett sätt att använda navbaren som känns bekvämt.

1. Lägg till style så att din navbar ser ut som en navbar.



###Klar och taggad {#tag}

1. Kör `make test` för att kolla att du inte har några valideringsfel.

1. Gör en `dbwebb publish anax-lite` för att kolla att allt fungerar.

1. Committa alla filer och lägg till en ny tagg (2.\*.\*).

1. Pusha upp repot till GitHub, inklusive taggarna.



Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

1. Gör en navbar som har stöd för undermenyer.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
