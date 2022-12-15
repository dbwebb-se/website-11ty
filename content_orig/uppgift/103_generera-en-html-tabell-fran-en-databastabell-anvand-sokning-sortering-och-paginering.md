---
author: mos
category: php
revision:
  "2014-11-05": (B, mos) Uppdaterad text, förtydligade krav och mer info i tips.
  "2013-09-09": (A, mos) Första utgåvan i samband med oophp version 2.
updated: "2014-11-05 07:48:51"
created: "2013-09-09 14:47:52"
...
Generera en HTML-tabell från en databastabell, använd sökning, sortering och paginering 
==================================

En grund i många webbapplikationer är att visa innehållet från en databastabell i en HTML tabell och tillföra sökning, sortering och paginering. Det handlar om att visa upp det valda innehållet på ett för användaren flexibelt sätt. Denna uppgift går ut på att du skall försöka samla din kod på ett återanvändbart sätt, så att du kan använda den i olika sammanhang mot olika databastabeller.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["Kom igång med PHP PDO och MySQL"](kunskap/kom-igang-med-php-pdo-och-mysql). 

Du behöver ha kunskap om [Anax och Anax moduler](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer).



Introduktion {#intro}
-----------------------

Så här kan det se ut på en webbsida.

[FIGURE src=/image/snapshot/Visa_filmer_med_sokalternativ_kombinerade___Min_Filmdatabas.jpg?w=w1&q=60 caption="Din egen sökbara filmdatabas kan bli ett resultat av detta kursmoment."]

Sidan visar innehållet från en tabell i databasen - i en HTML tabell. Det är grunden i sidan. Sedan finns ett ytterligare lager om att sortera och filtrera (söka) vilka rader som skall visas och det finns stöd för paginering.

Du skall nu försöka att organisera koden bakom detta, på ett sätt så att koden kan återanvändas mot godtycklig databastabell.



Krav {#krav}
-----------------------

1. Utgå från sidkontrollern ["Filmdatabasen: Kombinera alla sökalternativ på en sida"](kunskap/kom-igang-med-php-pdo-och-mysql#kombinera).  

2. Låt sidkontrollern hantera inkommande GET-variabler samt validera dem.

3. Skapa en klass `CMovieSearch` som döljer koden för att skapa sök-formuläret och för att förbereda den SQL-fråga som ställs mot databasen.

4. Skapa en klass `CHTMLTable` som tar resultatet från en databasfråga och placerar ut i en HTML tabell, inklusive länkar och hantering av paginering och sortering.

5. Du kan använda klassen `CDatabase` i sidkontrollern, eller låta `CDatabase` vara en del av `CMovieSearch`. Välj väg.

6. Du behöver inte hantera kategorier eller genrer. Det räcker om din kod jobbar mot en tabell i databasen.

7. Kan jag strukturera min kod lite annorlunda? Läs tips från coachen.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Poängen med övningen är att dela upp koden i delar som är oberoende av varandra och därmed lättare att återanvända (till exempel i projektet). Mindre oberoende moduler är också - i allmänhet - enklare att testa, underhålla och vidareutveckla.

En lösning med `CMovieSearch`, `CHTMLTable` och att hantera databasen och inkommande GET från sidkontrollern är en lösning som visar hur man kan göra. Har du ett annat förslag?

Borde någon av klasserna `CMovieSearch` eller `CHTMLTable` vara direkt kopplade till `CDatabase`? Som ett alternativ till att hantera den kopplingen via sidkontrollern?

Borde GET-variablerna hanteras av respektive klass istället?

Är koden så beroende av sin helhet att det är bättre att samla allt i en enda klass istället?

Eller, skapa samtliga klasser och gör ytterligare en klass som knyter ihop det. Som ett alternativ till att knyta ihop koden i sidkontrollern.

Det finns flera alternativa sätt att strukturera sin kod, du kan gärna testa alternativ, men glöm inte bort poängen med uppgiften. Om du gör annorlunda så ser du också till att förklara vad du gjort - och varför - i din redovisningstext.

**Lycka till och hojta till i forumet om du behöver hjälp!**




