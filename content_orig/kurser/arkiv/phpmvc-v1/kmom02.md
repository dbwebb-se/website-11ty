---
author: mos
revision:
  "2014-08-08": (E, mos) Arkiverade kursmomentet som är ersatt av phpmvc-v2.
  "2013-11-13": (D, mos) Tog bort länk till MVC video tutorial som gav 404.
  "2013-04-08": (C, mos) Genomarbetad, nya tutorials och föreläsningar inför campus-kursen
    vt 2013.
  "2012-09-04": (B, mos) Flyttad till dbwebb.se och Lydia, genomgången inför ht12
    distans.
  "2012-02-01": (A, mos) Första utgåvan, campuskurs vt12.
updated: "2014-08-08 07:09:17"
created: "2012-08-30 09:09:40"
...
Kmom02: Grunden till ett MVC-ramverk 
==================================

Skaffa dig en grundförståelse för ramverk i allmänhet och ramverk med Model View Controller (MVC) i synnerhet. Koda loss och skapa grunden till ditt egna PHP-baserade och MVC-inspirerade ramverk genom att se hur Mikael bygger upp ramverket Lydia från grunden.

[INFO]
Denna kursen är ARKIVERAD.

[Läs mer...](phpmvc-v1)
[/INFO]

Du följer tutorialen om Lydia och bygger din egen klon av Lydia. Du gör grunden till ramverket i form av en `index.php` som är ingångspunkten till ramverket. Alla sidor skall gå genom denna sidan. vilket du löser med en regel i filen `.htaccess`. Du sätter en grundstruktur för ditt ramverk, du väljer en mappstruktur och en grov struktur hur flödet sker. Du gör en enkel "frontcontroller" och skapar ett embryo till hantering av tema, en "theme engine render". Vidare lär du dig att hantera varianter av inkommande och utgående länkar.

Tjuvkika på [mos' me-sida](phpmvc/me/kmom02/mvcbase.php) för att se vad momentet kan resultera i.

[FIGURE src=/image/skitch/20120305-the-developer-controller.jpg?w=w1&q=70 caption="Så här kan grunden till ett MVC-ramverk se ut som webbsida."]

*(Kursmomentet omfattar cirka 20 studietimmar fördelat på läsanvisningar, uppgifter och övningar samt resultat, redovisning och eftertanke.)*



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Pro PHP: Patterns, Frameworks, Testing and More](kunskap/boken-pro-php-patterns-frameworks-testing-and-more) 
  * Ch 7 Reflection API
  * Ch 14 MVC Architecture
  * Ch 15 Introduction to the Zend Framework (läs översiktligt, skumma)

2. [Tutorial Lydia: Bygg ett PHP-baserat MVC-inspirerat CMF](lydia/tutorial)

  Bekanta dig med Lydia. Läs snabbt översikten av tutorialen för Lydia och se vilka olika delar den innehåller. 

  

###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial finns tillgängliga för campus-kursen. Presentationerna kan vara av intresse även för distansstudenter så skumma gärna igenom dem lite snabbt.

* [Model, View, Controller (MVC) och Ramverk](phpmvc/mvc-och-ramverk-vt13.pdf)
* [Lydia: Grunden i ett MVC-ramverk](phpmvc/lydia-grunden-vt13.pdf)



###Lästips {#lastips}


####Tutorials om MVC-ramverk {#tutorials}

MVC-ramverk kommer i olika smaker och varianter. I denna kursen kommer du att se Lydia som *ett* exempel på hur ett MVC-ramverk kan se ut. Men du behöver också se variationer på hur andra bygger MVC-ramverk. Kika därför på ett par artiklar om MVC-ramverk. Här är ett par förslag, men sök gärna ut något själv, sök till exempel på "PHP MVC tutorial".

Förslag på artiklar för att komma i gång med tänket kring MVC-ramverk.

* [Nettuts+: MVC for Noobs](http://net.tutsplus.com/tutorials/other/mvc-for-noobs/)
* [Tutorial to build a PHP MVC framework](http://www.phpro.org/tutorials/Model-View-Controller-MVC.html)



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-14 studietimmar)*


###Övningar {#ovningar}

Gör följande övning, den behövs för att klara uppgifterna. 

1. [Tutorial Lydia: Bygg ett PHP-baserat MVC-inspirerat CMF](lydia/tutorial)

  **"Grunden i ett MVC ramverk"**. Jobba genom de övningar som finns i **första stycket** i tutorialen om Lydia.
 


###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Följ tutorialen i Lydia och bygg grunden till ditt egna ramverk. Du kan göra avsteg från tutorialen om du vill, men den säkraste vägen genom kursen är att följa tutorialen.
  * Byt namn på ditt egna ramverk från Lydia till något annat (inklusive namnet på `CLydia` och `$ly`). 
  * Länka från din me-sida till en installation av ditt ramverk. 
  * Länka till ditt ramverk på GitHUb.



###Extra {#extra}

Jämför ett par av dina metoder med samma metoder i senaste versionen av Lydia. Ser du likheter, skillnader, något att lära så här långt?

* index.php
* bootstrap.php
* CLydia::FrontControllerRoute()
* CLydia::ThemeEngineRender()

Du hittar [senaste versionen av klassen CLydia på GitHub](https://github.com/mosbth/lydia/blob/master/src/CLydia/CLydia.php), [senaste versionen av index.php](https://github.com/mosbth/lydia/blob/master/index.php) och [bootstrap.php](https://github.com/mosbth/lydia/blob/master/src/bootstrap.php).



Resultat & Redovisning  {#redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Namnge ditt ramverk och ge en förklaring till namnet. 
  * Gjorde du några avsteg från tutorialen om Lydia? Något eget eller annorlunda?
  * Vilken är din uppfattning om grundstrukturen i Lydia?
  * Vad det utmanande att hänga med i tutorialen?
  * Hittade du ytterligare någon MVC-tutorial som du kan rekommendera?
  * Gjorde du extrauppgiften? Några reflektioner?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.
