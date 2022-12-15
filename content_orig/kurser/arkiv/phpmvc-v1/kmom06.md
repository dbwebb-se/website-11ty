---
author: mos
revision:
  "2014-08-08": (D, mos) Arkiverade kursmomentet som är ersatt av phpmvc-v2.
  "2013-05-06": (C, mos) Genomgången inför vt13 campus. Uppdaterad med visst läsmaterial
    och lite omstrukturerad.
  "2012-11-15": (B, mos) Flyttad till dbwebb.se och Lydia, genomgången inför ht12
    distans.
  "2012-02-01": (A, mos) Första utgåvan, campuskurs vt12.
updated: "2014-08-08 07:09:53"
created: "2012-08-30 09:20:18"
...
Kmom06: CSS-ramverk och grid layout 
==================================

Bygg ut ditt ramverk med ett grundtema som baseras på LESS och gridbaserad layout. Du utvecklar både ett horisontellt grid och ett vertikalt grid. Du definiera regioner i temat som du fyller med innehåll och du funderar över termer som som grid-layout, fixed layout, flexible layout, responsive layout och mobile first. 

[INFO]
Denna kursen är ARKIVERAD.

[Läs mer...](phpmvc-v1)
[/INFO]


[FIGURE src=/image/phpmvc/kmom06/tema-regioner-och-grid.jpg?w=w1 caption="Placera ut webbsidans innehåll som regioner i ett rutnät (grid)."]

[FIGURE src=/image/phpmvc/kmom06/tema-och-typografi.jpg?w=w1 caption="Skapa en grundtypografi som matchar ett horisontellt grid."]

*(Kursmomentet omfattar cirka 20 studietimmar fördelat på läsanvisningar, uppgifter och övningar samt resultat, redovisning och eftertanke.)*



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*



###Kurslitteratur  {#kurslitteratur}

Det finns inga läsanvisningar i kurslitteraturen till detta kursmoment.

Läs följande artiklar som handlar om tankar kring layout på en webbsida.

1) Vad innebär ett typografiskt horisontellt rutnät i webblayout? Läs artikeln "[Technical Web Typography: Guidelines and Techniques](http://coding.smashingmagazine.com/2011/03/14/technical-web-typography-guidelines-and-techniques/)".

2) Vad handlar det om med alla varianter på layout av en webbsida? Läs artikeln "[Fixed vs. Fluid vs. Elastic Layout: What’s The Right One For You?](http://coding.smashingmagazine.com/2009/06/02/fixed-vs-fluid-vs-elastic-layout-whats-the-right-one-for-you/)". Det blir förhoppningsvis en inspiration som leder till att du läser på mer i ämnet.


Studera följande webbsidor som handlar om LESS, lessphp och Semantic.gs. Du kommer att använda alla tre i kommande övningar så det är lika bra att du bekantar dig med deras manualsidor.

1) [LESS](http://lesscss.org/), ett bättre sätt att skriva CSS-kod.

2) [lessphp](http://leafo.net/lessphp/), en kompilator för LESS, skriven i PHP.

3) [Semantic.gs](http://semantic.gs/), ett gridbaserat ramverk baserat på LESS.

Det finns en samling av artiklar i ämnet, här är ett par som jag kan rekommendera som startpunkt för att få bättre grepp om hur LESS; lessphp och Sematic.gs kan samverka.

* Smashing Magazine: "[The Semantic Grid System: Page Layout For Tomorrow](http://coding.smashingmagazine.com/2011/08/23/the-semantic-grid-system-page-layout-for-tomorrow/)".
* NetTuts+: "[How to Squeeze the Most out of LESS](http://net.tutsplus.com/tutorials/php/how-to-squeeze-the-most-out-of-less/)" 


###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial finns tillgängliga för campus-kursen. Presentationerna kan vara av intresse även för distansstudenter så skumma gärna igenom dem lite snabbt.

* [LESS och lessphp med style.php](phpmvc/style-php-vt13.pdf)
* [Lydia och tema](phpmvc/lydia-tema-vt13.pdf)



###Lästips {#lastips}

Här är fler kända CSS-ramverk som är bra att ha koll på. Ägna lite tid att ögna igenom deras webbplatser och studera hur dessa CSS-ramverk är uppbyggda.

1) [Bootstrap från Twitter](http://twitter.github.com/bootstrap/).

2) [Blueprint, ett CSS ramverk](http://blueprintcss.org/).

3) [960 gs, ett CSS grid ramverk](http://960.gs/).

4) Kika även på [Normalize.css](http://necolas.github.com/normalize.css/) som är en möjlig ersättare till [Erik Meyers reset.css](http://meyerweb.com/eric/tools/css/reset/) som används i Lydia's tutorial om temat.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-14 studietimmar)*


###Övningar {#ovningar}

1. Gör uppgiften "[Autokompilera LESS med lessphp](forum/viewtopic.php?t=290)". 

2. [Tutorial Lydia: Bygg ett PHP-baserat MVC-inspirerat CMF](lydia/tutorial)  
  **"Lydia: Ett tema med vertikalt och horisontalt grid"**. Jobba genom de övningar som finns i **femte** delen om Lydia.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Bygg ut ditt ramverk med hantering av tema i likhet med Lydia. Länka till ditt ramverk från din me-sida och beskriv hur man kan testa de olika delarna.



###Extra {#extra}

Känner du för en extra utmaning och djupdykning i ett CSS ramverk byggt på LESS?

1) Använd [Bootstrap från Twitter](http://twitter.github.com/bootstrap/) som grund i ditt tema. Du kan ha det i ditt grundtema eller så gör du ytterligare ett tema som baseras på Bootstrap.



Resultat & Redovisning  {#redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Vad tycker du om gridbaserad layout?
  * Vad tycker du om CSS-ramverk i allmänhet och vilka tidigare erfarenheter har du av dem?
  * Vad tycker du om LESS, lessphp och Semantic.gs?
  * Beskriv ditt grundtema, hur tänkte du när du gjorde det, gjorde du några utsvävningar?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.
