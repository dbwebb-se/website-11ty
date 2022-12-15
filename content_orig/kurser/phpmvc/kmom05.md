---
author: mos
revision:
  "2014-08-06": (B, mos) Tog bort 42-testet.
  "2014-04-25": (A, mos) Första utgåvan för phpmvc version 2.
updated: "2014-08-08 09:27:01"
created: "2013-10-24 15:06:47"
...
Kmom05: Bygg ut ramverket
==================================

Så här långt har vi börjat komma underfund med grunderna i ramverket Anax MVC, och eftersom flera ramverk numer följer liknande upplägg så har vi också fått en god bas för att lära oss ett godtyckligt ramverk. Nåja, ett godtyckligt och väl designat ramverk, enligt SOLID-principerna.

Vi är alltså på god väg att lära oss något som är väldigt nyttigt för en professionell PHP-utvecklare. Nu är vi på en avancerad nivå.

Så, hur tar vi detta vidare? Jag tänkte faktiskt att vi tar det lite lugnare nu. Så att vi får lite tid att reflektera över vad vi sysslar med och hur delarna hänger ihop. Men vi fortsätter på det avancerade spåret.

Jag vill att du nu skall ta ditt egna ramverk och utveckla det med en ny och egenskriven modul, eller paket. Du skall göra en egen modul av kod, som du lägger i ett eget GitHub repo och sedan  publicerar som ett paket på Packagist. Det spelar egentligen inget större roll hur stort ditt paket är, bara det är ett vettigt paket som du vill ha i ditt ramverk. Jag kommer att ge dig några exempel på möjliga moduler som kan bli till paket, men du väljer fritt.

Tanken med detta kursmoment är också att du kan, om du vill, använda andra paket och inkludera dem i ditt egna ramverk. Det kan vara paket du hittar på Packagist, GitHub eller paket som någon av dina med-studenter tillverkar. Dela ut ditt paket och låna någon annans.

Du behöver nu fundera, vad saknar du i ditt ramverk? Välj en lagom modul som du kan utveckla från grunden, eller förädla om du redan har en befintlig kodbas. Så ska jag försöka hjälpa dig att publicera den på Packagist. Tänk på att det kan krångla när du börjar integrera ditt nya GitHub repo till Packagist och när du skall testa och dokumentera. Välj lagom storlek på din modul, men gör den ändå intressant för andra att ta del av.

[FIGURE src=/image/snap/cdatabase-github.png?w=w2 caption="GitHub repo för modulen CDatabase."]

[FIGURE src=/image/snap/cdatabase-packagist.png?w=w2 caption="Koppla Packagist till GitHub report och det blir ett paket som här heter mos/cdatabase."]



<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>




Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*


###Artiklar {#artiklar}

Läs följande som en introduktion till kursmomentet och för att hämta inspiration om vad ett (mikro) ramverk består av.

1. Läs artikeln "[The MicroPHP Manifesto](http://funkatron.com/posts/the-microphp-manifesto.html)". Det ger en introduktion till varför man vill ha ett mikro-ramverk istället för ett stort komplett ramverk. 

2. Läs artikeln "[On Microframeworks](http://mwop.net/blog/2012-08-17-on-microframeworks.html)". Det ger en introduktion till och översikt av ett mikro-ramverk och dess innehåll. 

3. Läs om [Slim, ett PHP Micro-Framework](http://www.slimframework.com/). Läs igenom [dokumentationen för Slim](http://docs.slimframework.com/).

4. Läs om "[Phalcon Micro Frameworks](http://docs.phalconphp.com/en/latest/reference/micro.html)" och se hur Phalcon matchar termen "microframework".

5. Läs om "[Scaling Web Applications with HMVC](http://techportal.inviqa.com/2010/02/22/scaling-web-applications-with-hmvc/)". Det är egentligen det vi gör via `dispatcher->forward()`. Fundera på hur du kan utnyttja det i ditt ramverk när du bygger applikationer.



###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [PHP Objects, Patterns, Practice](kunskap/boken-php-objects-patterns-and-practice) 
  * Ch14 Good (and Bad) Practice
  * Ch15 An introduction to PEAR and Phyrus
  * Ch17 Version Control with Git

Boken tar upp en annan pakethanteringstjänst för PHP. Se den tjänsten som ett komplement till Packagist.



###Lektionsmaterial  {#lektionsmaterial}

Föreläsningsmaterial för campus kommer i april 2014.



###Lästips {#lastips}

Det finns inga övriga lästips.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-16 studietimmar)*


###Övningar {#ovningar}

Övningarna förbereder dig för uppgifterna.

1. Läs igenom artikeln "[Bygg ut ditt Anax MVC med en egen modul och publicera via Packagist](kunskap/bygg-ut-ditt-anax-mvc-med-en-egen-modul-och-publicera-via-packagist)" och hämta inspiration inför ditt val av modul.



###Uppgifter {#uppgifter}

Utför och redovisa följande uppgifter.

1. Gör uppgiften "[Utveckla ett PHP-paket och publicera på Packagist](uppgift/utveckla-ett-php-paket-och-publicera-pa-packagist)".



###Extra {#extra}

1. Använd någon av dina med-studenters moduler och implementera dem i ditt eget ramverk. Eller använd några externa moduler som du fastnat lite extra för, kanske alternativ till PHP som språk i vyerna?



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Var hittade du inspiration till ditt val av modul och var hittade du kodbasen som du använde?
  * Hur gick det att utveckla modulen och integrera i ditt ramverk?
  * Hur gick det att publicera paketet på Packagist? 
  * Hur gick det att skriva dokumentationen och testa att modulen fungerade tillsammans med Anax MVC?
  * Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc-v2). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.




