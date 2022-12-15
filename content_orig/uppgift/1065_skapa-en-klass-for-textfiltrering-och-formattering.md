---
author:
    - mos
category:
    - php
    - kurs oophp
    - anax-lite
revision:
    "2017-04-18": "(A, mos) Första utgåvan."
...
Skapa en klass för textfiltrering och formattering
==================================

Du skall skapa en klass som kan filtrera och formattera rå text till HTML.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Lagra innehåll i databas för webbsidor och bloggposter (v2)](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter-v2)".

Du har kikat igenom följande artiklar om textfiltrering och formattering.

1. ["Reguljära uttryck i PHP ger BBCode formattering"](coachen/reguljara-uttryck-i-php-ger-bbcode-formattering).
1. ["Låt PHP-funktion make_clickable() automatiskt skapa klickbara länkar"](coachen/lat-php-funktion-make-clickable-automatiskt-skapa-klickbara-lankar).
1. ["Skriv för webben med Markdown och formattera till HTML med PHP (v2)"](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php-v2).



Introduktion {#intro}
-----------------------

Samla koden för textfiltrering och formattering i en egen klass som du kan använda i din webbplats för att filtrera/formattera innehåll från databasen.

Du kan välja att lösa uppgiften med din egen kod och klass, eller så återanvänder du modulen [`mos/ctextfilter`](https://packagist.org/packages/mos/ctextfilter) och integrerar den så att den löser uppgiften åt dig. Skriv egen kod eller återanvänd en befintlig modul, välj väg.



Krav {#krav}
-----------------------

1. Din klass skall stödja `nl2br`, `bbcode`, `link` samt `markdown`.

1. Din klass skall innehålla en metod som tar text (sträng) och filter (kommaseparerad sträng) som inparametrar och returnerar den modifierade texten.

1. Din klass skall finnas i Anax Lite. Du väljer själv hur du integrerar klassen och vilka beroenden den skall ha.

1. Gör en testroute som visar hur du formatterar innehåll på de sätt som skall stödjas.

1. Validera och publicera din kod.



Extrauppgift {#extra}
-----------------------

1. Din klass kan stödja filter som `strip` som gör `strip_tags()` samt `esc` som gör `htmlentities` (eller `htmlspecialchars`).



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
