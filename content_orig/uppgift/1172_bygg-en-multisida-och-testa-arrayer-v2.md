---
author: mos
category:
    - webbprogrammering
    - kurs htmlphp
    - php
    - html
    - css
revision:
    "2020-09-07": "(C, mos) Bort länk till ofrumet om array_key_first/array_key_last."
    "2019-09-26": "(B, mos) Använd ej array_key_first/array_key_last."
    "2018-08-22": "(A, mos) Ny utgåva i samband med htmlphp v3."
...
Bygg en multisida och testa arrayer (v2)
==================================

Låt oss använda PHP för att skapa en dynamisk sida som automatiskt genererar en meny och kan visa undersidor. Vi kallar konstruktion en "sidkontroller för multisidor" och du skall bygga en sådan och fylla den med information.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Bygg en multisida med PHP (v2)](kunskap/bygg-en-multisida-med-php-v2)".



Introduktion {#intro}
-----------------------

Du skall göra en sidkontroller för en multisida likt den som visats i artikeln ovan.

Du får gärna utgå från den exempelkod som finns i artikeln.



Krav {#krav}
-----------------------

1. Implementera den kod som behöves för att göra en sidkontroller för en multisida så att den minst uppfyller samma funktionalitet som visas i artikeln.

1. Multisidan skall ha en default-sida som visas om `?page` inte finns eller om `page` saknar ett värde.

1. Navigeringen till sidan skall genereras automatiskt utifrån en array av giltiga sidor.

1. Gör så att menyvalet i navigeringsmenyn blir aktivt. Du skall visa en annorlunda stil för menyvalet för den undersida som är vald.

1. Skapa en ny undersida som skriver ut detaljer om innehållet i arrayen `$_SERVER`. Sidan skall skriva ut hur många "items" som arrayen innehåller. Till exempel "There are XX entries in the array for $\_SERVER.". Skriv även ut nyckeln och innehållet för det första och det sista värdet i arrayen. Var tydlig så man ser vilket som är det första och vilket som är det sista värdet.

1. Skapa en ny undersida som innehåller följande. Skriv en `foreach()` loop som räknar ut längden på varje värde i arrayen `$_SERVER`. För varje nyckel i arrayen, skall du ta värdet och räkna ut längden av det med `strlen()`. Skriv ut nyckeln (key), följt av längden på dess värde. Avsluta med att skriva ut själva innehållet i den key/value som "är längst".

1. Validera och publicera din kod.

```bash
# Ställ dig i kurskatalogen
dbwebb publish multi
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
