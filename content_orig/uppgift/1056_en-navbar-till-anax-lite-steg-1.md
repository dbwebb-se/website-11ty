---
author: mos
category:
    - kurs oophp
    - php
    - anax-lite
revision:
    "2017-03-16": "(A, mos) Första utgåvan i samband med kursen oophp v3."
...
En navbar till Anax Lite (steg 1)
==================================

Du skall utveckla kod och struktur som hjälper dig att generera HTML-kod för olika typer av navbar och menyer. Tanken är att du konfigurerar dina menyer via en array och du har kod som med hjälp av arrayen kan skapa HTML-kod för navbaren/menyn.

Detta är första steget i övningen och här skriver du din kod i vyn och arrayen konfigurerar du i vyn.

<!--more-->

I uppgift "[En navbar till Anax Lite (steg 2)](uppgift/en-navbar-till-anax-lite-steg-2)" så skall du bygga vidare på lösningen du gör här, men integrera koden som en klass i ramverket Anax Lite.



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artiklen "[Bygg ett eget PHP-ramverk](kunskap/bygg-ett-eget-php-ramverk)" och du kan jobba med klasser i PHP.



Introduktion {#intro}
-----------------------

Följande är grundläggande information som du underlättar för att lyckas med uppgiften.



###Principen bakom generera navbar {#principen}

Principen bakom skapandet av navbaren är enkel och handlar om att strukturera och dela upp kod så att var sak har sin plats.

I grunden handlar det om att generera en navbar som kan se ut ungefär så här i HTML-kod.

```html
<navbar class="navbar">
    <li>
        <li class="current"><a href="https://dbwebb.se/">Hem</a></li>
        <li><a href="https://dbwebb.se/kurser">Kurser</a></li>
        <li><a href="https://dbwebb.se/kurser/oophp">Kurs oophp</a></li>
    </li>
</navbar>
```

Vi vill lyfta ut navbarens innehåll och lagra det i en array. Det kan se ut så här.


```php
<?php
$navbar = [
    "config" => [
        "navbar-class" => "navbar"
    ],
    "items" => [
        "hem" => [
            "text" => "Hem",
            "route" => "",
        ],
        "kurser" => [
            "text" => "Kurser",
            "route" => "kurser",
        ],
        "oophp" => [
            "text" => "Kurs oophp",
            "route" => "kurser/oophp",
        ],
    ]
];
```

Det som nu behövs är kod, en loop kanske, som använder arrayen och skapar HTML-koden.

Därefter kan man med CSS få navbaren att se både snygg ut och fungera i olika variationer av menyer.



###Skapa länkar och inkommande route? {#ink}

Kom ihåg att ramverket innehåller metoder för att generera länkar och för att hämta värdet på nuvarande route.

När du är i vyn så har du tillgång till `$app`.



###Var lägger jag koden? {#var}

Spara alla filerna under ditt `me/anax-lite`.

View-filer lägger du under `view/navbar1/`.



Krav {#krav}
-----------------------

1. Navbaren skall konfigureras från en array. Arrayen kan placeras i vyn.

1. Bygg kod som tar arrayen och genererar HTML-kod för navbaren. Spara koden i vyn.

1. Använd navbaren i din webbplats, för att kontrollera att den fungerar.

1. Lägg till style så att din navbar ser ut som en navbar.



###Klar och taggad {#tag}

1. Kör `make test` för att kolla att du inte har några valideringsfel.

1. Gör en `dbwebb publish anax-lite` för att kolla att allt validerar och fungerar.

1. Committa alla filer och lägg till en ny tagg (1.0.\*).

1. Pusha upp repot till GitHub, inklusive taggarna.



Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

1. Gör en navbar som har stöd för undermenyer.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
