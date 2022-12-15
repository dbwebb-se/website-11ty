---
author: mos
revision:
  "2015-11-18": (F, mos) Ändrade redovisningstexten.
  "2015-01-13": (E, mos) Bytte uppgift för CDatabase.
  "2013-12-10": (D, mos) Lade till föreläsningsslides från campus.
  "2013-10-25": (C, mos) Ändrade felaktig länk i extrauppgifterna.
  "2013-09-30": (B, mos) Lade till extrauppgifter för drop-down meny.
  "2013-09-09": (A, mos) Första utgåvan.
...
Kmom04: PHP PDO och MySQL
==================================

Så här långt har du lärt dig om objektorienterad PHP och databasen MySQL. Nu skall du koppla ihop dessa till en databasdriven webbapplikation genom att använda PHP's gränssnitt för databaser PHP PDO. Du får jobba igenom en guide där du bygger upp en filmdatabas med ett webbgränssnitt där du kan redigera information om filmer och söka ut dem. När du jobbar i guiden så kommer du att stöta på och lösa de vanliga problemen som en sådan applikation innebär. När du är klar så har du ett fungerande exempel som du kan använda som bas för kommande webbapplikationer. Om du tittar noga så kan du se likheten mellan till exempel en webbshop och din filmdatabas, rent tekniskt är det samma grunder i båda.

[FIGURE src=/image/snapshot/Visa_filmer_med_sokalternativ_kombinerade___Min_Filmdatabas.jpg?w=w1&q=60 caption="Din egen sökbara filmdatabas kan bli ett resultat av detta kursmoment."]

Kursmomentet avslutas med att du kodar ett par moduler till ditt Anax.

*(Kursmomentet omfattar cirka 20 studietimmar fördelat på läsanvisningar, uppgifter och övningar samt resultat, redovisning och eftertanke.)*



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*



###Kurslitteratur  {#kurslitteratur}

Läs följande:

1\. [Beginning PHP and MySQL: From Novice to Professional](kunskap/boken-beginning-php-and-mysql-from-novice-to-professional)

* Chapter 30: Using PHP with MySQL
* Chapter 31: Introducing PDO



2\. [Databasteknik](kunskap/boken-databasteknik) (referenslitteratur)

* Kapitel 18: Databasbaserade webbplatser



###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial användes i samband med campus-kursen höstterminen 2013. Det kan vara av intresse att skumma igen -- även för distanstudenten.

* [Översikt av kursmomentet](https://dl.dropboxusercontent.com/u/24315211/oophp/oophp-kmom04-ht13.pdf).



###Lästips {#lastips}

Ett uppenbart lästips är [manualen om PHP PDO](http://php.net/manual/en/book.pdo.php). Det kan vara lite svårsmält för en nybörjare men där finns en stor del av facit. Dit går vi när vi vill se hur gränssnittet skall fungera.

Glöm ej bort [referensmanualen till MySQL](http://dev.mysql.com/doc/refman/5.6/en/). Du kommer att behöva kika i den, till och från, under detta kursmoment.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*


###Övningar {#ovningar}

Gör följande övning, den förbereder dig inför uppgifterna och löser ett par av dem.

1. Jobba igenom guiden ["Kom igång med PHP PDO och MySQL"](kunskap/kom-igang-med-php-pdo-och-mysql).



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. <strike>Gör uppgiften ["Skapa en klass för din databashantering, CDatabase"](uppgift/skapa-en-klass-for-din-databashantering-cdatabase).</strike>

1. Börja med att skapa din egna klass `CDatabase` och inkludera den i ditt Anax. Du får tag i koden och lär dig använda klassen genom att göra övningen ["Övningar med CDatabase"](uppgift/ovningar-med-cdatabase).

1. Gör uppgiften ["Generera en HTML-tabell från en databastabell, använd sökning, sortering och paginering"](uppgift/generera-en-html-tabell-fran-en-databastabell-anvand-sokning-sortering-och-paginering). 

1. Gör uppgiften ["Skapa en klass för användarhantering, CUser"](uppgift/skapa-en-klass-for-anvandarhantering-cuser).



###Extra {#extra}

1. Läs igenom hur du kan skapa en ["En navbar med drop-down meny i ren HTML och CSS"](coachen/en-navbar-med-drop-down-meny-i-ren-html-och-css).

2. Läs tipset ["Skapa en dynamisk navbar / meny, med undermeny, via PHP"](coachen/skapa-en-dynamisk-navbar-meny-med-undermeny-via-php) och uppgradera din PHP funktion som genererar navbaren till att hantera drop-down menyer.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](kurser/oophp-v2/redovisa).

Se till att följande frågor besvaras i texten:

* Hur kändes det att jobba med PHP PDO?
* Gjorde du guiden med filmdatabasen, hur gick det?
* Du har nu byggt ut ditt Anax med ett par moduler i form av klasser, hur tycker du det konceptet fungerar så här långt, fördelar, nackdelar?
