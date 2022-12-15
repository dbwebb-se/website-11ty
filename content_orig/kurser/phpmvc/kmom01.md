---
author: mos
revision:
  "2015-08-26": (E, mos) Tog bort lästips om benchmark och motivation till Phalcon
    pga 404.
  "2015-02-06": (D, mos) Blå ruta om krav på PHP 5.4.
  "2014-08-06": (C, mos) Tog bort 42-testet.
  "2014-03-30": (B, mos) Inklusive slides från campus.
  "2014-03-26": (A, mos) Första utgåvan för phpmvc version 2.
updated: "2015-08-26 12:12:58"
created: "2013-10-24 14:55:27"
...
Kmom01: PHP-baserade och MVC-inspirerade ramverk
==================================

Vi bekantar oss med PHP-baserade ramverk och vad begreppet Model, View Controller (MVC) kan innebära i en webbapplikation. Det blir läsande och orientering i avancerad utveckling med PHP och ramverk.

Vi introducerar Anax, nu i formen som Anax-MVC. Anax har fått en uppgradering till ett PHP-baserat MVC-inspirerat MVC-ramverk. 

Du sätter ihop din me-sida som följer dig genom kursen. Du bygger din me-sida på Anax MVC. Efterhand så lägger du själv till kod och klasser i Anax MVC och formar ditt eget ramverk.

För att alla skall komma på banan så finns det möjligheter att repetera sådant som vi tog upp i oophp-kursen. Ta tillvara den möjligheten. Det är ett absolut måste om du hoppar på denna kursen utan att passerat oophp. Dubbelkolla att du har koll på grunderna. 

Känns detta första kursmoment lite tungt? Ja, inte helt omöjligt, men vi behöver en grund att stå på. Se till att läsa det som anges. Annars missar du grunden och resten av kursen blir svår att greppa. Låt det ta den tiden det tar.

Så här kan det se ut när du är klar.

[FIGURE src=/image/snap/phpmvc-me.png?w=w2&sa=jpg caption="En me-sida byggd med Anax-MVC."]

<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>



Repetera och stäm av dina förkunskaper {#forkunskap}
---------------------------------

*(ca: 2-4 studietimmar, mer vid behov)*


Denna kurs bygger vidare på det du lärt dig i de kurserna [htmlphp](htmlphp) och [oophp](oophp). Det förutsätts att du har motsvarande förkunskaper.

Kika på stycket om förkunskaper och [ta hjälp av artiklarna och repetera](phpmvc#forkunskaper) det du känner dig osäker på. Skumläs och stäm av att du har koll på läget.



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*


###Artiklar {#artiklar}

Läs följande, det är underlag för att klara övningar och uppgifter.

1. Läs artikeln "[PHP The Right Way.](http://www.phptherightway.com/)". Artikeln ger dig en översyn av PHP och verktyg som används vid mer avancerad utveckling med PHP. Läs översiktligt, skaffa dig en helhetssyn över vad artikelförfattarna anser vara den *"den rätta vägen med PHP"*.

2. Läs artikeln som introducerar tankar om [principer och filosofier för programmering](kunskap/principer-och-filosofier-for-programmering). Den kan ge dig ett tankesätt och en terminologi för avancerad programmering.

3. Läs artikeln "[Vilka blir de mest populära PHP-ramverken inför 2014?](blogg/vilka-blir-de-mest-populara-php-ramverken-infor-2014)". Där får du en snabb överblick över några av de mest populära PHP-ramverken.

4. Läs artikeln "[PHP-baserade och MVC-inspirerade ramverk, vad betyder det?](kunskap/php-baserade-och-mvc-inspirerade-ramverk-vad-betyder-det)". Den ger dig en insikt i terminologi och kategorisering av PHP-baserade ramverk, tillsammans med en kort introduktion av Model, View, Controller (MVC).

5. Läs om dependency injection och service locator i [ramverket Phalcon](http://docs.phalconphp.com/en/latest/reference/di.html). Det ger dig en introduktion tillsammans med kodexempel att studera.

6. Läs om [PHP-FIG](http://www.php-fig.org/) och deras rekommendationer om kodstandard i [PSR-1](http://www.php-fig.org/psr/psr-1/) och [PSR-2](http://www.php-fig.org/psr/psr-2/).

7. Läs artikeln om ["Objektorienterade konstruktioner för ramverk med PHP"](kunskap/objektorienterade-konstruktioner-for-ramverk-med-php) för att få ett grepp om vilka objektorienterade tekniker som ramverk byggs på.



###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [PHP Objects, Patterns, Practice](kunskap/boken-php-objects-patterns-and-practice) 
  * Ch21 Objects, Patterns, Practice (en kort översikt av bokens innehåll)
  * Ch1 PHP Design and Management
  * *Ch2 Objects, endast om du behöver repetera*
  * *Ch3 Object Basics, endast om du behöver repetera*
  * Ch4 Advanced Features



###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial används på campus.

1. [Kursintro](https://dl.dropboxusercontent.com/u/24315211/phpmvc-v2/phpmvc-intro.pdf)
2. [Kmom 01](https://dl.dropboxusercontent.com/u/24315211/phpmvc-v2/phpmvc-kmom01.pdf)



###Lästips {#lastips}

Om du har tid och lust kan du finna följande läsvärt.

1. Bekanta dig med [PHP-ramverket phalcon](http://phalconphp.com/en/). Kika runt och se vilka delar det består av, skumläs i dokumentationen. Koden i kursen bygger på samma struktur som finns i Phalcon.

1. Läs på översiktligt om konceptet *dependency injection/service location*, som mycket av kursens kod handlar om. Dels finns ett stycke i [manualen från Phalcon](https://docs.phalconphp.com/en/latest/reference/di.html) som handlar om deras approach. Du kan även skumläsa artikeln från Martin Fowler om ["Inversion of Control Containers and the Dependency Injection pattern"](http://martinfowler.com/articles/injection.html). Du kommer få pröva på det under kursens gång så det behöver inte fastna nu.




Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*


###Övningar {#ovningar}

Genomför övningarna för att träna inför uppgifterna.

[INFO]
**Uppgradera till PHP 5.4 eller högre**

Kursen bygger på att du har PHP version 5.4 eller högre.
[/INFO]

1. Kom igång med Anax-MVC, läs igenom artikeln ["Anax som MVC-ramverk"](kunskap/anax-som-mvc-ramverk), installera Anax-MVC och testa de exempel som medföljer.

2. Jobba igenom övningen ["Bygg en me-sida med Anax-MVC"](kunskap/bygg-en-me-sida-med-anax-mvc).



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften ["Gör en me-sida i Anax MVC"](uppgift/gor-en-me-sida-i-anax-mvc). Ladda upp på studentservern.



###Extra {#extra}

1. Lägg upp (klona) ditt Anax-MVC på GitHub, så att du kan jobba vidare med det under kursens gång.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Vilken utvecklingsmiljö använder du?
  * Är du bekant med ramverk sedan tidigare?
  * Är du sedan tidigare bekant med de lite mer avancerade begrepp som introduceras?
  * Din uppfattning om Anax, och speciellt Anax-MVC?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc-v2). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.




