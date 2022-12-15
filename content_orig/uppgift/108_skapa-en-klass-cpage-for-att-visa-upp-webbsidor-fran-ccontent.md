---
author: mos
category: php
revision:
  "2013-09-30": (A, mos) Första utgåvan i samband med oophp version 2.
updated: "2013-09-30 20:35:10"
created: "2013-09-30 20:34:57"
...
Skapa en klass CPage för att visa upp webbsidor från CContent
==================================

Du skall skapa en klass CPage som kan visa upp innehåll av typen *page* från klassen CContent. Det handlar alltså om innehåll på webbsidor som lagras i databasen. Klassen CPage är endast till för att visa innehållet, det är en klass som kan gör att sidkontrollern `page.php` blir enklare att skriva. Klassen CPage skall inte innehålla någon administration eller hantering av sidor, det sköts redan av din klass för CContent.

<!--more-->

I guiden ["Lagra innehåll i databas för webbsidor och bloggposter"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter) så hanteras innehåll i databasen. I samma guide visas hur sidkontrollern `page.php` fungerar. Du skall renodla sidkontrollern i exemplet och flytta det som går till klassen CPage.



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["Lagra innehåll i databas för webbsidor och bloggposter"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter). 

Du behöver ha kunskap om [Anax och Anax moduler](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).



Krav {#krav}
-----------------------

1. Skapa klassen CPage som en modul i Anax. 

2. Klassen skall ha samma funktionalitet som finns för sidkontrollern `page.php` i nämnda guide. Du kan [utgå från koden som beskrivs i guiden](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter#page).

3. Skapa en sidkontroller `page.php` som använder CPage för att visa upp webbsidor.


Extrauppgift {#extra}
-----------------------

1. Utveckla din navbar så att den kan länka och visa aktuell sida som hanteras av `page.php`.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

* Ibland är det svårt att se om det verkligen behövs en ny klass. Så kan det vara i detta fallet. Även om det känns som du kan lösa allt i sidkontrollern så försöker du finna en bra avvägning av vad som är klassen CPage och vad som är sidkontrollern `page.php`.

**Lycka till och hojta till i forumet om du behöver hjälp!**




