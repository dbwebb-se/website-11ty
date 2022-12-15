---
author: mos
revision:
  "2014-08-08": (D, mos) Arkiverade kursmomentet som är ersatt av phpmvc-v2.
  "2013-04-29": (C, mos) Uppdaterad inför campus vt13, strukturerade om texten.
  "2012-11-01": (B, mos) Flyttad till dbwebb.se och Lydia, genomgången inför ht12
    distans.
  "2012-02-01": (A, mos) Första utgåvan, campuskurs vt12.
updated: "2014-08-08 07:09:45"
created: "2012-08-30 09:19:41"
...
Kmom05: Innehåll 
==================================

Skapa och spara webbplatsens innehåll i databasen. Skapa en editor där du kan ändra och spara innehållet. Lagra innehållet i databasen som olika typer, implementera stöd för sidor ("page") och poster ("post"). Välj att visa dem, presentera dem för besökaren, beroende på vilken typ de är sparade som. Visa sidorna som vanliga webbsidor och visa posterna som en del av en blogg. 

[INFO]
Denna kursen är ARKIVERAD.

[Läs mer...](phpmvc-v1)
[/INFO]

Hantera innehållet på ett säkert sätt och pröva olika varianter att formatera och filtrera innehållet, både som ren text, filtrerad html och bbcode.

[FIGURE src=/image/phpmvc/kmom05/editor.jpg?w=w1 caption="Så här kan editorn se ut när ett innehåll uppdateras."]

[FIGURE src=/image/phpmvc/kmom05/bbcode.jpg?w=w1 caption="Innehållet visas som en webbsida och formatteras med bbcode."]

*(Kursmomentet omfattar cirka 20 studietimmar fördelat på läsanvisningar, uppgifter och övningar samt resultat, redovisning och eftertanke.)*



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar, inklusive extra läsning i referenslitteraturen efter eget val)*



###Kurslitteratur  {#kurslitteratur}

Det finns inga läsanvisningar i kurslitteraturen till detta kursmoment.



###Lektionsmaterial  {#lektionsmaterial}

Följande föreläsningsmaterial finns tillgängliga för campus-kursen. Presentationerna kan vara av intresse även för distansstudenter så skumma gärna igenom dem lite snabbt.

* [Lydia och innehåll](phpmvc/lydia-content-vt13.pdf)



###Lästips {#lastips}

1) Läs skriften ["Skriva för webben"](https://www.iis.se/lar-dig-mer/guider/hur-man-skriver-for-webben/). 

Dagens övning handlar om innehåll, men det kan också vara en god idé att kika lite på hur man bör skriva sina texter för webben. Till viss del kan det underlätta när vi skriver vår kod, om vi vet hur texterna bör skrivas och formateras så blir det enklare att erbjuda rätt tekniker.


2) Läs om [Markdown syntax](http://daringfireball.net/projects/markdown/) och om programvaran [PHP Markdown Extra](http://michelf.ca/projects/php-markdown/extra). 

Markdown är (1) en syntax för att skriva för webben i ett läsbart format och (2) ett verktyg för att formattera texten till HTML. Se extrauppgiften för en kodningsövning i Markdown.


3) Läs på hur [The Open Web Application Security Project (OWASP) beskriver säkerhetsrisken med Cross Site Scripting (XSS)](https://www.owasp.org/index.php/Cross-site_Scripting_%28XSS%29). En vanlig risk när man låter användaren skriva innehåll till webbplatsen.

Det finns många fler säkerhetsrisker men det kan vara bra att lära sig terminologin som används hos OWASP. Läs även [checklistan om hur du skyddar dig mot XSS](https://www.owasp.org/index.php/XSS_%28Cross_Site_Scripting%29_Prevention_Cheat_Sheet). Vill du se [olika varianter för att göra XSS](https://www.owasp.org/index.php/XSS_Filter_Evasion_Cheat_Sheet) så finns det också.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-14 studietimmar)*


###Övningar {#ovningar}

Gör följande övningar.

1. [Tutorial Lydia: Bygg ett PHP-baserat MVC-inspirerat CMF](lydia/tutorial)  
  **"Skapa och spara innehåll i databasen som sidor ("page") och poster ("post")"**. Jobba genom de övningar som finns i **fjärde** delen om Lydia.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.


1. Bygg ut ditt ramverk med hantering av innehåll i likhet med Lydia. Länka till ditt ramverk från din me-sida och beskriv hur man kan testa de olika delarna.



###Extra {#extra}

Skapa en egen klass `CTextFilter` som innehåller alla dina funktioner för textformattering och filtrering. Gör klassen så att man kan anropa en funktion och ange vilka filter som skall användas.

```php
$text = CTextFilter::Filter(array('purify', 'clickable', 'markdown'));
```

Lägg till så att din `CTextFilter` stödjer följande:

1. [Skapa automatiskt klickbara länkar](coachen/lat-php-funktion-make-clickable-automatiskt-skapa-klickbara-lankar).

2. [Markdown - Skriv för webben med Markdown och formattera till HTML med PHP](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php).

3. [Typografi med PHP SmartyPants Typography](coachen/forbattra-ditt-skrivande-pa-webben-med-ett-php-bibliotek-for-typografi).

När du är klar så kan du även lägga till hanteringen av HTMLPurify och BBCode. Resultatet blir din egen klass `CTextFilter`, för filtrering och formatering av text. Du kan komma att få mycket nytta av den klassen.



Resultat & Redovisning  {#redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

1. [Skriv redovisningstext](kunskap/att-skriva-en-bra-redovisningstext) på din me-sida. Skriv ett stycke (minst 15 meningar) om kursmomentet. Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc.

2. Se till att följande frågor besvaras i texten:
  * Hur gick det när du byggde ut ramverket med stöd för innehåll? 
  * Läste du materialet om att skriva för webben?
  * Läste du materialet om XSS?
  * Gjorde du extrauppgiften med `CTextFilter` och implementerade extra filter?

3. Kopiera texten och lämna in den på redovisningen [ITs](bth#its) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

4. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i [kursforumet](forum/utbildning/phpmvc). Visa upp vad du gjort och berätta att du är klar. Länka till din me-sida.


**Klart!** Läs gärna dina med-studenters inlämningar och ställ dina frågor i forumet. Se till att du får dina frågor besvarade.
