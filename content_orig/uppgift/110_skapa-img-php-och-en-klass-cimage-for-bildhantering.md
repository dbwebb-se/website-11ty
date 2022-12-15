---
author: mos
category: php
revision:
  "2015-01-14": (B, mos) la till stycke om förberedelser.
  "2013-10-15": (A, mos) Första utgåvan i samband med oophp version 2.
updated: "2015-01-14 10:13:37"
created: "2013-10-15 10:49:48"
...
Skapa img.php och en klass CImage för bildhantering
==================================

Du skall skapa en klass `CImage` som kan förminska bilder, beskära och bearbeta dem. Du skall även skapa en sidkontroller `img.php` som använder sig av klassen `CImage` för att bearbeta bilderna. 

Din kod skall jobba mot PHP Graphics Library, PHP GD, ett bibliotek för bildbearbetning,

<!--more-->

I guiden ["Skapa egen kod för att beskära och förminska bilder med PHP GD"](kunskap/skapa-egen-kod-for-att-beskara-och-forminska-bilder-med-php-gd) så visas hur du bygger upp ett skript `img.php` för bildhantering. Din klass `CImage` skall samla den koden i en klass och `img.php` skall använda den klassen och slutresultatet skall bli samma som i guiden, men objektorienterat.



Förkunskaper {#forkunskaper}
-----------------------

Det är bra om du har kännedom om [Anax och Anax moduler](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).

Det är också bra om du läst igenom artikeln om ["`CImage` and `img.php`"](opensource/cimage).

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["Skapa egen kod för att beskära och förminska bilder med PHP GD"](kunskap/skapa-egen-kod-for-att-beskara-och-forminska-bilder-med-php-gd). Koden som du förväntas utgå ifrån, är den kod som visas i artikeln.



Förberedelser och tips {#forbered}
-----------------------

Du har alltså jobbat igenom artiklarna ovan och du har själv skapat kod som fungerar som `img.php` skall göra. Uppgiften handlar alltså främst om att strukturera din kod, från *fulkod* till *finare kod* i en klass `CImage`.

Koden skall fungera i ditt Anax. Men den skall vara oberoende av din `config.php`. Anledningen är att du startar en session i `config.php` och om cachningen skall fungera för bilderna så får man inte starta en session. Du har alltså inte tillgång till autoloadern utan måste från `img.php` göra en vanlig include på `CImage.php`. Det är en liten skillnad från dina vanliga Anax moduler.



Krav {#krav}
-----------------------

1. Skapa klassen `CImage` så att du kan använda den i ditt Anax. 

2. Flytta koden från `img.php`, som visas i guiden, och bygg upp klassen `CImage`.

3. Resultatet blir en klasss `CImage` och en uppdaterad och slimmad sidkontroller `img.php`.

4. Din lösning skall ha samma funktionalitet som visas i guiden.



Extrauppgift {#extra}
-----------------------

1. Lägg till hantering av transparenta PNG-bilder som beskrivs i tipset ["Uppgradera din img.php till att hantera transparenta bilder med PHP GD"](coachen/uppgradera-din-img-php-till-att-hantera-transparenta-bilder-med-php-gd).

2. Lägg till stöd för GIF-bilder.

3. Lägg till ett filter för att skapa svartvita bilder med [`imagefilter()`](http://php.net/manual/en/function.imagefilter.php).

4. Skapa ditt eget filter för sepia, kika här hur du kan [kombinera filter för att skapa en sepia-effekt](opensource/cimage#combine).



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

**Lycka till och hojta till i forumet om du behöver hjälp!**





