---
author: mos
revision:
  "2014-08-06": (D, mos) Tog bort 42-testet.
  "2014-04-11": (C, mos) Läsanvisning om Phalcon och sessionener.
  "2014-04-07": (B, mos) Övning för att komma igång med PHP på kommandoraden.
  "2014-04-02": (A, mos) Inför kursen phpmvc version 2.
updated: "2014-08-08 09:26:10"
created: "2013-10-24 15:04:54"
...
Kmom02: Kontroller och modeller
==================================

Vi skall dyka djupare in i ramverket Anax MVC och dess kod för att se hur det hänger ihop. Tidigare har vi sett grunden med frontcontroller, router med enkla hanterare i form av anonyma funktioner och vyer. Nu är det dags att titta lite mer på kontroller och modeller. Vi skall se hur en hel klass kan agera som en kontroller och hur kontrollern kan använda en enkel modell för att lösa en uppgift.

Uppgiften som skall lösas är ett kommentarssystem. Du kommer få grunden till det och senare skall du bygga ut det till en mer färdig applikation. Via det arbetet jobbar du fram en känsla för hur de olika delarna i Anax MVC hänger ihop. Du får fördjupa dig i hanteringen av klasser och hur en klass kan vara en kontroller. Du får lära dig mer om begreppen routing och dispatching och se hur de används i ramverket. Till slut bygger du vidare och skapar ditt egna kommentarssystem och integrerar det i din egen me-sida.

Dessutom får du börja använda pakethantering i PHP med Packagist och Composer. Två verktyg som erbjuder en bra struktur på pakethantering som också är kopplad till Github.

[FIGURE src=/image/snap/anax-mvc-comments.png?w=w2 caption="Ett PHP-paket med kommentarer, från Packagist, nu integrerat i Anax MVC via Composer."]

<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*


###Artiklar {#artiklar}

Läs följande:



1. Läs i Phalcons manual om "[Tutorial 1: Let’s learn by example](http://docs.phalconphp.com/en/latest/reference/tutorial.html)". Den visar ett exempel på hur du bygger en applikation i Phalcon och det blir lite repetition från vad vi gjorde i det första kursmomentet. Tittar du så ser du kopplingarna mellan strukturen i Anax MVC och Phalcon.

2. Läs i Phalcons manual om "[The MVC Architecture](http://docs.phalconphp.com/en/latest/reference/mvc.html)". Det är en väldigt kort översyn av deras hantering av modeller, vyer och kontrollers.

3. Läs i Phalcons manual om "[Using Controllers](http://docs.phalconphp.com/en/latest/reference/controllers.html)". En översikt av hur kontrollers fungerar i Phalcon.

4. Läs i Phalcons manual om "[Routing](http://docs.phalconphp.com/en/latest/reference/routing.html)". Där får du en insyn i hur routingen kan fungera och på vilka sätt du kan länka en route till en handler.

5. Läs i Phalcons manual om "[Dispatching Controllers](http://docs.phalconphp.com/en/latest/reference/dispatching.html)". Det ger en insyn i hur Phalcon hanterar dispatching till kontrollers och hur det kompletterar routing.

6. Läs i Phalcons manual om "[Storing data in Session](http://docs.phalconphp.com/en/latest/reference/session.html)". Det visar hur sessionen ligger som en tjänst i ramverket.

7. Läs *översiktligt* i Phalcons manual om "[Working with Models](http://docs.phalconphp.com/en/latest/reference/models.html)". Läs bara snabbt och översiktligt, skumma igenom den, det är en lång artikel. Vi kommer att återkomma till denna artikel i ett senare kursmoment när vi börjar jobba med databasen. 




###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [PHP Objects, Patterns, Practice](kunskap/boken-php-objects-patterns-and-practice) 
  * Ch5 Object Tools
  * Ch6 Objects and Design
  * *Ch15 Introduction to PEAR and Phyrus (extraläsning, inte nödvändigt)*



###Lektionsmaterial  {#lektionsmaterial}

Föreläsningsmaterial för campus kommer i april 2014.



###Lästips {#lastips}

Har du tid över och vill läsa mer? Här är ett par tips.

1. Phalcons manual innehåller mer matnyttigt. Bläddra gärna lite mer i den.

2. Manualen till ramverket Yii är trevlig läsning. Den heter "[The Definitive Guide to Yii](http://www.yiiframework.com/doc/guide/)". Bläddra gärna igenom den och till detta kursmomentet passar stycket "[Fundamentals](http://www.yiiframework.com/doc/guide/1.1/en/basics.mvc)" som handlar om Yii och MVC.




Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-16 studietimmar)*


###Övningar {#ovningar}


1. Kontrollera att du kan köra [PHP vid kommandoraden](kunskap/anvand-php-pa-kommandoraden).

1. Testa att du kan använda [Composer på studentservern](kunskap/installera-composer-for-pakethantering-med-php). Pröva sedan att installera det på din egen miljö.

1. Jobba igenom övningen "[Utöka Anax MVC med kommentarer och pröva pakethantering med PHP](kunskap/utoka-anax-mvc-med-kommentarer-och-prova-pakethantering-med-php)".



###Uppgifter {#uppgifter}

1. Gör uppgiften "[Skapa ett kommentarssystem i ditt Anax MVC](uppgift/bygg-ett-kommentarssystem-till-anax-mvc)".



###Extra {#extra}

Får du tid över så kanske du kan hitta något som du vill utöka ramverket med? Vad sägs om att byta ut några av mina Basic-klasser mot egna och mer avancerade klasser?



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Hur känns det att jobba med Composer?
  * Vad tror du om de paket som finns i Packagist, är det något du kan tänka dig att använda och hittade du något spännande att inkludera i ditt ramverk?
  * Hur var begreppen att förstå med klasser som kontroller som tjänster som dispatchas, fick du ihop allt? 
  * Hittade du svagheter i koden som följde med `phpmvc/comment`? Kunde du förbättra något?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc-v2). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.




