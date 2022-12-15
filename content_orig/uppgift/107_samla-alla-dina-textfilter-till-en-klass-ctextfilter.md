---
author: mos
category: php
revision:
  "2013-09-30": (A, mos) Första utgåvan i samband med oophp version 2.
updated: "2013-09-30 20:18:01"
created: "2013-09-30 20:17:34"
...
Samla alla dina textfilter till en klass CTextFilter
==================================

Du skall skapa en klass CTextFilter som kan processa ditt innehåll och filtrera texten du skrivit, innan den visas upp i webbsidan. Din klass CTextFilter skall stödja formattering av text enligt BBCode, det skall kunna hitta länkar i texten och göra dem klickbara, det skall finnas stöd för Markdown syntax och enklare formattering där radbrytningar byts ut mot `<br>`, ett så kallat nl2br-filter.

<!--more-->

I guiden ["Lagra innehåll i databas för webbsidor och bloggposter"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter) så hanteras innehåll i databasen. I samma guide förekommer exempel på hur filtreringen kan fungera. Din klass CTextFilter skall ha stöd för samma filter som finns i guiden.



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["Lagra innehåll i databas för webbsidor och bloggposter"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter). 

Du behöver ha kunskap om [Anax och Anax moduler](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).



Krav {#krav}
-----------------------

1. Skapa klassen CTextFilter som en modul i Anax. 

2. Klassen skall ha samma funktionalitet som finns i nämnda guide. Du kan [utgå från koden som beskrivs i guiden](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter#filter).



Extrauppgift {#extra}
-----------------------

1. Lägg till filtret som beskrivs i tipset ["Förbättra ditt skrivande på webben med ett PHP-bibliotek för typografi"](coachen/forbattra-ditt-skrivande-pa-webben-med-ett-php-bibliotek-for-typografi).

2. Använd [HTMLPurifier som ett filter](t/287) för att filtrera och säkra upp HTML-koden.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

**Lycka till och hojta till i forumet om du behöver hjälp!**




