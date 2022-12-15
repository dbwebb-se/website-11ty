---
author: mos
revision:
  "2014-08-08": (D, mos) Arkiverade kursmomentet som är ersatt av phpmvc-v2.
  "2013-04-15": (C, mos) Genomgången och uppdaterad inför vt13 campus. CodeIgniters
    gästbok blev nu extrauppgift för att renodla kursmomentet.
  "2012-09-13": (B, mos) Flyttad till dbwebb.se och Lydia, genomgången inför ht12
    distans.
  "2012-02-01": (A, mos) Första utgåvan, campuskurs vt12.
updated: "2014-08-08 07:09:29"
created: "2012-08-30 09:10:15"
...
Kmom03: En gästbok i ditt MVC-ramverk 
==================================

För att få en känsla för hur ett "riktigt" MVC-ramverk fungerar så studerar vi hur man bygger en gästbok i MVC-ramverket CodeIgniter. Därefter bygger vi en gästbok i vårt eget ramverk.

[INFO]
Denna kursen är ARKIVERAD.

[Läs mer...](phpmvc-v1)
[/INFO]

Vi, som webbprogrammerare, behöver ha en övergripande orientering om olika typer av ramverk och hur de är uppbyggda. Det finns mycket att lära av de befintliga ramverken. CodeIgniter är ett ramverk med bra dokumentation där vi kan läsa hur de löst vanliga kravställningar i ett ramverk. 

Så, först studera hur en gästbok byggs i CodeIgniter, bara så att vi får en kort bekantskap med det ramverket. Det är nyttigt även om vi inte går in så djupt i ramverket. Därefter bygger vi vidare på vårt eget ramverk och ser hur det växer när vi implementerar en gästbok med controller, model och vyer.

Tjuvkika på [mos' me-sida](phpmvc/me/kmom03/guestbook.php) för att se vad momentet kan resultera i.

[FIGURE src=/image/phpmvc/kmom03/guestbook.jpg&w=w1&q=70 caption="Så här kan resultatet från detta kursmoment se ut, en gästbok helt enkelt."]

*(Kursmomentet omfattar cirka 20 studietimmar fördelat på läsanvisningar, uppgifter och övningar samt resultat, redovisning och eftertanke.)*



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 2-4 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Pro PHP: Patterns, Frameworks, Testing and More](kunskap/boken-pro-php-patterns-frameworks-testing-and-more) 
  * Ch 3 Singleton and Factory Patterns
  * Ch 4 Exceptions



###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial finns tillgängliga för campus-kursen. Presentationerna kan vara av intresse även för distansstudenter så skumma gärna igenom dem lite snabbt.

* [En gästbok i CodeIgniter](phpmvc/codeigniter-gastbok-vt13.pdf)
* [Lydia: Gör en gästbok](phpmvc/phpmvc-lydia-gastbok-vt13.pdf)



###Lästips {#lastips}

Kika gärna på manualerna till ett par kända PHP-ramverk. Det är ofta bra läsning för den som vill fördjupa sig i ramverkskodande, bli riktigt bra på PHP eller bara för att förstå grunderna i ramverkens uppbyggnad.

1. [CodeIgniter](http://codeigniter.com/)
2. [Symphony](http://symfony.com/)
3. [FuelPHP](http://fuelphp.com/)
4. [Laravel](http://laravel.com/)



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-14 studietimmar)*


###Övningar {#ovningar}

Gör följande övningar.

1. ["Kom i gång med CodeIgniter"](kunskap/kom-igang-med-codeigniter)

  Läs igenom tutorialen och se hur du bygger upp en gästbok i MVC-ramverket CodeIgniter.

2. [Tutorial Lydia: Bygg ett PHP-baserat MVC-inspirerat CMF](lydia/tutorial)

  **"Bygg ut ramverket och gör en gästbok"**. Jobba genom de övningar som finns i **andra** stycket om Lydia.

  

###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Bygg en gästbok i ditt egna ramverk. Skapa samtidigt den funktionalitet som krävs. Länka till gästboken från din me-sida.



###Extra {#extra}

####Bygg gästbok i CodeIgniter {#codeigniter}

Följ tutorialen för att komma i gång med CodeIgniter, bygg samtidigt din egen gästbok genom att följa tutorialens steg. Länka till gästboken från din me-sida.



####Lydia vyer {#vyer}

I denna kursen så lagrar Lydia sina vyer i samma katalog som den kontroller som använder vyn. Ett vanligt sätt är dock att lagra vyerna i en egen katalog. Det gör Lydia i nuvarande version. Som en extra uppgift kan du kika på hur Lydia numer hanterar vyerna. Läs READE-sidan och kika på vyerna för att få ett par exempel på hur vyer kan se ut.

* [Läs om Lydias hantering av vyer](https://github.com/mosbth/lydia/tree/master/views), via GitHub och README-filen i `lydia/views`.


###Spam i gästböcker {#spam}

Att få spam i sina gästböcker är ett vanligt problem. Läs i forumet om ett [enkelt sätt att undvika en del av spammet](t/637) som skickas. Det är ingen helsäker metod men enkel att implementera och skyddar en del.



Resultat & Redovisning  {#redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Vilken uppfattning fick du om CodeIgniter?
  * Gjorde du extrauppgiften och byggde din egna gästbok i CodeIgniter, hur kändes det?
  * Har du grepp om MVC-strukturen? Vad tycker du så här långt?
  * Studerade du något annat ramverk och läste dess manualer? Vilket och vad tyckte du om det?
  * Gjorde du extra-uppgiften om Lydias vy-hantering, några reflektioner?
  * Tittade du på extra-uppgiften om spam, några reflektioner?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.
