---
author: mos
category: php
revision:
  "2017-03-17": (D, lew) Ny version för oophp-v3.
  "2015-11-11": (C, mos) Nya länkar till php calendar och datetime.
  "2013-08-16": (B, mos) Bilder på kalendrar och fler extrauppgifter, tog bort valbara
    krav och gjorde dem obligatoriska.
  "2013-08-14": (A, mos) Första utgåvan i samband med oophp version 2.
updated: "2015-11-11 09:39:40"
created: "2013-07-03 14:51:15"
...
Månadskalender
==================================

Detta är en övning i att skapa en månadskalender som en webbsida. Du skall göra en webbsida som visar en månadskalender tillsammans med en bild. 

<!--more-->

Så här kan en månadskalender se ut.

[FIGURE src=/image/snapshot/kalender1.jpg?w=w1&q=70 caption="Två stycken förlagor till en tänkt månadskalender."]

[FIGURE src=/image/snapshot/kalender2.jpg?w=w1&q=70 caption="Översikt av den ena kalendern."]

[FIGURE src=/image/snapshot/kalender3.jpg?w=w1&q=70 caption="Översikt av den andra kalendern."]

Behöver du mer inspiration så googlar du bilder på ["månadskalender"](https://www.google.se/search?q=m%C3%A5nadskalender).

En färdig kalender i Anax-lite kan se ut så här:

[FIGURE src=/image/oophp/v3/calendar1.png?w=w1&q=70 caption="En kalender i Anax."]



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, guiden ["Kom i gång med PHP på 20 steg"](kunskap/kom-i-gang-med-php-pa-20-steg) och guiden ["Kom igång med objektorienterad PHP-programmering på 20 steg"](kunskap/kom-i-gang-med-oophp-pa-20-steg).



Krav {#krav}
-----------------------

1. Månadskalendern skall vara en sida, `calendar.php`, och den skall visa nuvarande månad när man öppnar sidan.

2. Ge möjlighet att navigera mellan månaderna, en länk till nästa månad och en länk till föregående månad.

3. En bild skall visas tillsammans med kalendern. Välj själv vilka bilder du vill ha. Tänk dock på upphovsrätt om du hämtar från internet.

4. Samtliga datum i månaden skall visas.

5. Om dagar/datum visas för närliggande månader så skall de ha en annan style, till exempel en annan färg, så att man klart ser vilka dagar som tillhör nuvarande månad.

6. Visa namnet på veckodagarna.

7. Röd dag skall vara -- röd. Det räcker om söndagar är röda.

8. Gör en objektorienterad lösning.

9. Skapa dina klasser som [moduler till Anax](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer#modul).



Extrauppgift {#extra}
-----------------------

1. Använd olika bilder för olika månader.

2. Visa veckonummer.

3. Visa helgdagar och högtider.

4. Visa när det är fullmåne och halv måne.

5. Visa flaggdagar.

6. Visa namnsdagar.

7. Gör en mindre variant av kalendern som passar i en sidebar (höger eller vänsterkolumn).



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

PHP har många [inbyggda funktioner för datum och tid](kunskap/kom-i-gang-med-php-pa-20-steg#datum-funk).

PHP har [ett bibliotek för kalender-funktioner](http://php.net/manual/en/book.calendar.php).

PHP har både [funktioner och ett klassbibliotek för att jobba med datum](http://php.net/manual/en/book.datetime.php).

Bygg små testprogram så att du märker hur de olika funktionerna fungerar.

En loop kan ha en loop i sig, en nästlad loop.

Kanske är en två dimensionell array ett alternativ för att mellanlagra information.

Det finns många olika sätt att lösa uppgiften på, välj ett som passar dig.

**Lycka till och hojta till i forumet om du behöver hjälp!**




