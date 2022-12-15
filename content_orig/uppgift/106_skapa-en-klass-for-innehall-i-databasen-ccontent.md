---
author: mos
category: php
revision:
  "2013-10-24": (B, mos) Justeringar för att göra uppgiften tydligare, flyttade CUser
    till extrauppgift.
  "2013-09-30": (A, mos) Första utgåvan i samband med oophp version 2.
updated: "2013-09-30 19:44:09"
created: "2013-09-30 19:42:58"
...
Skapa en klass för innehåll i databasen, CContent
==================================

I guiden ["Lagra innehåll i databas för webbsidor och bloggposter"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter) så hanteras innehåll i databasen. Du skall nu skapa en klass *CContent* som kapslar in de funktioner som hanterar själva lagringen av innehållet i databasen.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["Lagra innehåll i databas för webbsidor och bloggposter"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter). 

Du behöver ha kunskap om [Anax och Anax moduler](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).



Krav {#krav}
-----------------------

1. Skapa klassen CContent som en modul i Anax. 

2. Tabellstrukturen i databasen skall ha minst samma funktionalitet som i den nämnda guiden.

3. Klassen skall själv initiera tabellstrukturen i databasen. Låt alltså klassen ha en metod som kan skapa tabellerna.

4. Det skall gå att lägga till, redigera och ta bort innehåll.

5. Bygg de sidkontroller som behövs för att exemplet skall fungera. 




Extrauppgift {#extra}
-----------------------

1. Använd en funktion [`slugify()`](coachen/gor-en-lasbar-url-med-slugify) för att automatiskt skapa en slug utifrån innehållets titel.

2. Varje innehåll skall ha en ägare. Koppla innehållet till en ägare i modulen CUser.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

* Det finns en forumtråd som [förtydligare denna uppgiften](t/1680).

* Tänk att sidkontrollern *använder* klassen CContent. Tänk att CContent har ett bra och lättanvänt gränssnitt utifrån sidkontrollerns perspektiv. Försök att minimera koden i sidkontrollerna.

* Var skall formulären placeras? I klassen CContent eller i sidkontrollerna? Välj själv den vägen som du tycker verkar bäst med tanke på hur ditt Anax fungerar.

* Tänk på att CContent inte är samma sak som `page.php` eller `blog.php` som finns i exemplet. De båda sidkontrollerna *använder* klassen CContent för att skapa sina sidor respektive blogg-sidor. Tänk till hur du separerar din kod.

**Lycka till och hojta till i forumet om du behöver hjälp!**




