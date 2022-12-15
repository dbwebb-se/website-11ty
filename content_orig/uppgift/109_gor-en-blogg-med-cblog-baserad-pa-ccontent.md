---
author: mos
category: php
revision:
  "2013-10-29": (B, mos) Flyttade krav på koppling till användare till extra uppgift.
  "2013-09-30": (A, mos) Första utgåvan i samband med oophp version 2.
updated: "2013-10-29 08:28:01"
created: "2013-09-30 20:46:52"
...
Gör en blogg med CBlog baserad på CContent
==================================

Du skall skapa en klass CBlog som fungerar som en blogg. Den skall vara kopplad till klassen CContent och hantera innehåll av typen *post*. Klassen CBlog är endast till för att visa innehållet, det är en klass som kan gör att sidkontrollern `blog.php` blir enklare att skriva. Klassen CBlog skall inte innehålla någon administration eller hantering av posterna, det sköts redan av din klass för CContent. Klassens primära syfte är att göra en blogg av innehållet från CContent, det skall se ut och fungera som en blogg.

<!--more-->

I guiden ["Lagra innehåll i databas för webbsidor och bloggposter"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter) så hanteras innehåll i databasen. I samma guide visas hur sidkontrollern `blog.php` fungerar. Du skall renodla sidkontrollern i exemplet och flytta det som går till klassen CBlog.



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["Lagra innehåll i databas för webbsidor och bloggposter"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter). 

Du behöver ha kunskap om [Anax och Anax moduler](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).



Krav {#krav}
-----------------------

1. Skapa klassen CBlog som en modul i Anax. 

2. Klassen skall ha samma funktionalitet som finns för sidkontrollern `blog.php` i nämnda guide. Du kan [utgå från koden som beskrivs i guiden](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter#blog).

3. Skapa en sidkontroller `blog.php` som använder CBlog för att visa upp webbsidor.

4. Visa datum för när bloggposten skrevs.



Extrauppgift {#extra}
-----------------------

1. Visa vem som författade artikeln.

1. Utveckla din navbar så att den kan länka och visa aktuell sida som hanteras av `blog.php`.

1. Lägg till så att CContent kan hantera kategorier, så att du kan kategorisera dina blogginlägg.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

**Lycka till och hojta till i forumet om du behöver hjälp!**




