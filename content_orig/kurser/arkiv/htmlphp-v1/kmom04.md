---
author: mos
revision:
  "2014-01-07": (F, mos) Uppdaterade läsanvisningar till Duchett.
  "2012-07-02": (E, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-09-15": (D, mos) Genomgång, mindre uppdateringar och lade till guide PHP20
    (del II) som del av momentet.
  "2011-02-16": (C, mos) Ändrade kursmomentet till inriktning mot CSS med styleväljare
    i PHP.
  "2010-10-25": (B, mos) Flyttade länkar från www.student till dbwebb.se i samband
    med uppdatering av PHP-20.
  "2010-09-20": (A, mos) Första versionen.
published: "2012-07-02"
updated: "2015-08-03 12:08:02"
created: "2012-06-29 14:19:09"
...
Kmom 04: CSS och en style-väljare i PHP
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




CSS och en style-väljare i PHP {#css}
--------------------------------------------------------------------

*alternativt "Styla sidan med CSS: färg, form och presentation"*

Vi tillägnar detta kursmoment åt att gå igenom viktiga grunder i CSS, grunder såsom box modellen, storlekar, display, float, fonter, färger och bakgrund. Inom ramen för övningen finns det tillräckligt med tid för att leka och testa olika konstruktioner. Använd en del av tiden till att testa och leka. Det är ett bra sätt att lära sig.

Avslutningsvis gör vi en programmeringsövning där vi skapar en stylesheetväljare med PHP. Med den kan vi dynamiskt ändra vilken stylesheet som används till webbplatsen. I samband med det så tittar vi på lite fler PHP-konstruktioner.

* Så här kan resultatet se ut efter dagens övning.  
  <a href='http://dbwebb.se/htmlphp/me/kmom04/style.php?p=choose-stylesheet'>http://dbwebb.se/htmlphp/me/kmom04/style.php?p=choose-stylesheet</a>

[FIGURE src=/img/htmlphp/kmom04/image06.png caption="Mikaels style-väljare och en mycket blå-ig style."]

Övningens upplägg är enligt följande:

* Läsanvisningar (1-3h)
* Övningar (5-16h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.

Glöm inte att läsa litteraturen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###HTML & CSS: The Complete Reference {#html-css}

*(fifth edition)* 

Använd följande kapitel som referens och uppslagsverk.

* Part I, Ch 3: HTML and XHTML Element Reference
* Part II, Ch 5: CSS Syntax and Property Reference

Du har sedan tidigare läst följande kapitel. Bläddra igenom dem igen. Repetera.

* Part I, Ch 1: Traditional HTML and XHTML
* Part II, Ch 4: Introduction to CSS




###Beginning HTML, XHTML, CSS and JavaScript {#beginning-web}

*(1st edition)*

Bläddra igenom (läs översiktligt) följande kapitel.

* Ch 8: More Cascading Style Sheets
* Ch 9: Page Layout
* Ch 10: Design issues

Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Structuring Documents for the Web
* Ch 2: Links and Navigation
* Ch 3: Images, Audio and Video
* Ch 4: Tables
* Ch 5: Forms  
* Ch 7: Cascading Style Sheets



###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Bläddra igenom (läs översiktligt) följande kapitel.

* Ch 5: Arrays

Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics
* Ch 4: Functions
* Ch 13: Forms
* Ch 18: Session Handlers


###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

* Verktyget Style! används för att visa exempel på CSS-konstruktioner.  
  <a href='http://dbwebb.se/style'>http://dbwebb.se/style</a>

* Me-sidan innehåller exempelkod.  
  <a href='http://dbwebb.se/htmlphp/me/kmom04/me.php'>http://dbwebb.se/htmlphp/me/kmom04/me.php</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.

	
1. CSS box modell {#box-model}
--------------------------------------------------------------------

Vi tittar på exempel av CSS box modell, collapsing margins och outline.


###1.1 Modellen {#modellen}

CSS har en "Box Model" som definerar hur margin, border, padding och content förhåller sig till varandra. Nedanstående bild exemplifierar.

[FIGURE src=/img/htmlphp/kmom04/image10.png caption="CSS box modell med `margin`, `border`, `padding` och "content"."]

Med hjälp av denna modell kan man placera ut sitt innehåll (content) på önskad plats. Se följande exempel som ritar ut en `div`, stylad med både `margin`, `border` och `padding`.

* Exempel på "box model":  
  <a href='http://dbwebb.se/style/?id=157'>http://dbwebb.se/style/?id=157</a>

Lek runt och ändra exemplets värden på `margin`, `border` och `padding` tills du har klart för dig hur det hänger ihop.

CSS box modell är nödvändig att ha koll på. Det är en av grunderna i CSS.


###1.2 Collapsing margins {#collapsing}

Vad händer när man placerar två objekt bredvid varandra, där båda har marginaler? Låt oss testa ett exempel.

* <a href='http://dbwebb.se/style/?id=158'>http://dbwebb.se/style/?id=158</a>

Marginalerna äter upp varandra, endast en blir kvar. Testa att ändra värden för `margin` och se hur det påverkar.

Det är bra att veta hur marginalerna beteer sig. Det gör det enklare att placera ut elementen på ett önskvärt sätt.


###1.3 Outline {#outline}

Outline ger en möjlighet att rita en ram kring ett element, utan att den ramen tar upp något utrymme. Se följande exempel.

* <a href='http://dbwebb.se/style/?id=159'>http://dbwebb.se/style/?id=159</a>

Ändra storleken på outlinen och se vad som händer. Testa tills du ser du det hänger ihop.
Det är bra att veta att outline finns, ibland ser man en ram kring en länk man tryckt på, eller en knapp, eller en bild, det kan vara outlinen. För egen del brukar jag ofta sätta `outline:0` i stylesheeten, på det viset slipper jag dess default-beteende.


###1.4 Sammanfattningsvis {#sammanfattning-1}

Facit och bakgrund hittar vi i specifikationerna. Följande dokument är relevanta, klicka upp dem och skrolla snabbt igenom dem. Du behöver inte läsa dem i detalj.
 
* Box modell  
  <a href='http://www.w3.org/TR/CSS2/box.html'>http://www.w3.org/TR/CSS2/box.html</a>
* Outline  
  <a href='http://www.w3.org/TR/CSS2/ui.html#propdef-outline'>http://www.w3.org/TR/CSS2/ui.html#propdef-outline</a>

Använd Cheatsheet, eller litteraturen, för att slå upp de enskilda konstruktionerna.


2. CSS och storlekar {#css-storlekar}
-------------------------------------------------------------------------

Det finns olika sätt att ge ett element en storlek. Vi tittar på ett par av de vanliga sätten vilket inkluderar bredd, höjd, overflow och vanliga måttenheter.


###2.1 Hur bred är en div? {#bred-div}

Om man har en `div` med `margin`, `border` och `padding`, hur mycket blir kvar till content och hur stor plats tar diven? 

* Studera följande exempel.  
  <a href='http://dbwebb.se/style/?id=160'>http://dbwebb.se/style/?id=160</a>
  
När vi bestämmer bredden med `width` så gäller det innehållsdelen, därefter läggs på utrymme för `padding`, `border` och `margin`. Det är bra att ha koll på elementens storlek och hur storleken räknas ut.

Ibland kan det vara bra att använda `min-width` och `max-width`. Det kan ge lite flexibilitet i att bestämma ett elements minsta eller största (möjliga) storlek. Använd följande exempel för att testa konstruktioner genom att modifiera min- och max-bredd av ett element.

* <a href='http://dbwebb.se/style/?id=161'>http://dbwebb.se/style/?id=161</a>

Välj att visa hela exemplet i en egen webbläsare (klicka på länken "både och" i Style!) och modifiera webbläsarens storlek för att se effekterna. Du kan även använda följande länk.

* <a href='http://dbwebb.se/style/?id=161&htmlcss'>http://dbwebb.se/style/?id=161&htmlcss</a>

Se till att du har koll på hur `width`, `min-width` och `max-width` fungerar. Det kan vara så att din webbläsare har en egen hård gräns för minsta bredd på ett element. Det märker du om du väljer olika värden på `min-width`.


###2.2 Hur hög är en div? {#hog-div}

En div är så hög som den behöver vara för att omsluta innehållet. Med konstruktionen `height` går det att explicit sätta en höjd på ett element. Det går även att definera `max-height` och `min-height` och kombinera dessa med `height`, allt för att uppnå önskad effekt.

Studera följande exempel och ändra i det för att se hur de olika konstruktionerna beteer sig.

* Exempel med `height`:  
  <a href='http://dbwebb.se/style/?id=162'>http://dbwebb.se/style/?id=162</a>

Det är sällan man definerar höjden, ofta klarar man sig utan det. Men det beror ju på vad man vill uppnå.


###2.3 Overflow {#overflow}

Vad händer med innehållet som inte får plats inom den definerade storleken? Detta är något som går att styra med konstruktionen `overflow`. 

* Studera följande exempel.  
  <a href='http://dbwebb.se/style/?id=164'>http://dbwebb.se/style/?id=164</a>

Ofta går det att använda default-beteendet på `overflow`, men det är bra att veta hur det fungerar, om man vill ändra det.


###2.4 Att ange storlekar {#storlekar}

Det finns olika sätt att ange storlekar i CSS. För en webbutvecklare är tre vanliga mått `%`, `px` och `em`. 

| Enhet | Beskrivning | 
|-------|-------------|
| `em`  | Ett mått på fontstorleken i nuvarande element. Måttet kommer från typografi. `1em` är nuvarande fonts storlek. `2em` är dubbelt så stort. |
| `px`  | Pixel. Storleken är beroende av det fysiska mediet såsom skärmen eller skrivaren. På en datorskärm säger vi enklast att en `px` är en pixel på skärmen. |
| `%`   | Procent. Relativ sitt omgivande (förälder/parent) element. 100% är så stor som parent-elementet är. |

* Följande exempel visar hur elements storlekar kan anges av `em` och `%`.  
  <a href='http://dbwebb.se/style/?id=80'>http://dbwebb.se/style/?id=80</a>

Studera exemplet och modifiera det för att se hur storlekar kan justeras.

Det finns absoluta enheter såsom mm (millimeter), cm (centimeter) och pt (points). Dessa har lite användning i webbområdet där vi oftast använder skärmar för att visa resultatet. Deabsoluta måttenheter blir desto viktigare när det gäller tryckta produkter. När man skriver ut på en skrivare vill man veta exakt hur mycket av papperet man använder. Ett A4 papper är 210 x 297 mm och här passar dessa måttenheter bra.

* Läs lite om vilka måttenheter som rekommenderas:  
<a href='http://www.w3.org/Style/Examples/007/units'>http://www.w3.org/Style/Examples/007/units</a>


###2.5 Sammanfattningsvis {#sammanfattning-2}

Slå upp konstruktionerna i Cheatsheet. Vill du läsa specen om storlekar så finns texter både i CSS2 och i CSS3-specarna (de skiljer sig lite åt). Läs lite snabbt i CSS3-specen om vilka måttenheter som finns.

* CSS3  
  <a href='http://www.w3.org/TR/css3-values/'>http://www.w3.org/TR/css3-values/</a>


3. `display`, `inline` och `block` {#display}
---------------------------------------------------------------------------

CSS-konstruktionen `display`, bestämmer hur ett element skall visas, eller ritas upp på skärmen. De vanligaste  sätten att använda `display` är med `block` eller `inline`.

Ett block-element tar upp den fulla tillgängliga bredden och ger en ny rad för nästa element. Ett inline-element tar bara upp så mycket plats som behövs och ger inte en ny rad. Oavsett detta så påverkas både `block` och `inline` som vanligt av `margin`, `border` och `padding`.

Exempel på block-element är: `<div>`, `<h1>`, `<p>`.

Exempel på inline element är: `<img>`, `<a>`, `<strong>`, `<span>`.

Du kan sätta, eller ändra, ett elements `display`. Se följande exempel.

* Ända ett elements `display`:  
  <a href='http://dbwebb.se/style/?id=165'>http://dbwebb.se/style/?id=165</a>

Du kan även välja att inte visa ett element genom att sätta `display:none`. Här ser du ett exempel på det.

* Gör ett element osynligt:  
  <a href='http://dbwebb.se/style/?id=200'>http://dbwebb.se/style/?id=200</a>

Slå snabbt upp display i cheatsheet och kolla hur konstruktionen beskrivs i cheatsheet och i specifikationen.

* Läs om `display`i cheatsheet:  
  <a href='http://www.w3.org/2009/cheatsheet/#search,display'>http://www.w3.org/2009/cheatsheet/#search,display</a>


4. `float` {#float}
------------------------------------------------------------------

Vi har tidigare pratat om `float` som en möjlighet att låta ett element flyta, istället för att ta sin normala plats i flödet av element som placeras ut. Med `float` går det att justera bilder i förhållande till texter, det har vi sett på me-sidan. Med `float` går det också att skapa en kolumn-layout.

I Style finns ett exempel där en site byggs upp stegvis ("Strukturera en site stegivs"). Där kan du se exempel på 2- och 3-kolumners layout.

* Strukturera en site stegvis:  
  <a href='http://dbwebb.se/style/?id=65'>http://dbwebb.se/style/?id=65</a>

[FIGURE src=/img/htmlphp/kmom04/image07.png caption="Exempel där en webbplats byggs upp stegvis, med exempel på 2- och 3-kolumners layout."]

Lek gärna, testa att modifera siten och kolumnerna.

Här finns ytterligare ett exempel på float, exemplet är gjort för att du skall kunna testa varianter på `float` (`left`, `right`) och `clear` (`left`, `right`, `both`).

* <a href='http://dbwebb.se/style/?id=166'>http://dbwebb.se/style/?id=166</a>

Det är viktigt att ha koll på float, så lek tills du känner att du har koll.


5. Fonter och typografi {#fonter}
----------------------------------------------------------------------

###5.1 Vanliga fonter {#vanliga-fonter}

I webbvärlden brukar vi använda ett fåtal fonter. Det har att göra med kompabilitet mellan plattformar och webbläsare. Via följande exempel kan du se ett par av de vanligaste fonterna.

* <a href='http://dbwebb.se/style/?id=167'>http://dbwebb.se/style/?id=167</a>

Om man kan sin typografi (konsten och hantverket att utforma texter) så kan man tycka att utbudet av fonter är lite "fattigt". Det finns dock möjligheter att utöka sitt utbud av fonter via nedladdningsbara fonter.


###5.2 Nedladdningsbara fonter {#nedladdningsbar-font}

Det finns möjlighet att använda nedladdningsbara fonter med konstruktionen `@font-face`. En av de tjänster som erbjuder gratis fonter är google's font api. Nedan exempel visar hur det fungerar.

* <a href='http://dbwebb.se/style/?id=168'>http://dbwebb.se/style/?id=168</a>

[FIGURE src=/img/htmlphp/kmom04/image08.png caption="Exempel som använder Googles tjänst för nedladdningsbara fonter."]

En annan tjänst som erbjuder fria fonter är www.fontsquirrel.com. De "hostar" inte fonterna själva utan du får ladda ned dem och spara på din egna webbplats. Du kan se ett exempel på Style hur det kan se ut.

* Exempel med font från fontsquirrel:  
  <a href='http://dbwebb.se/style/?id=202'>http://dbwebb.se/style/?id=202</a>

* Vill du läsa mer om fonter så finns specifikationen.  
  <a href='http://www.w3.org/TR/css3-fonts/'>http://www.w3.org/TR/css3-fonts/</a>


6. Färger {#farger}
------------------------------------------------------------------

Färger och komponering av färger. Låt oss titta lite på detta område.


###6.1 Grunderna {#grunderna}

Vi använder ofta hexadecimala värden när vi specificerar färger på HTML-elementen. `#FFF` och `#FFFFFF` är vitt och `#000` eller `#000000` är svart.  En färg kan representeras av en eller två hexadecimala siffror. Själva färgkoden är enligt RGB (Red, Green, Blue) och varje siffra anger hur mycket färg av respektive som skall visas. Visar man ingen färg får man svart, visar man fullt av samtliga färger får man vitt. Detta kallas additiv färgblandning. 

Läs kort och översiktligt de svenska (eller mer kompletta engelska) Wikipediasidor som hanterar additiv färgblandning och RGB.

* Additiv färgblandning (läs översiktligt efter intresse)  
  <a href='http://sv.wikipedia.org/wiki/Additiv_f%C3%A4rgblandning'>http://sv.wikipedia.org/wiki/Additiv_f%C3%A4rgblandning</a>  
  <a href='http://en.wikipedia.org/wiki/Additive_color'>http://en.wikipedia.org/wiki/Additive_color</a>

* Färgskalan RGB (läs översiktligt efter intresse)  
  <a href='http://sv.wikipedia.org/wiki/RGB'>http://sv.wikipedia.org/wiki/RGB</a>  
  <a href='http://en.wikipedia.org/wiki/RGB'>http://en.wikipedia.org/wiki/RGB</a>
  
Försök att gissa vilken färg respektive kod innebär: `#F00`, `#0F0`, `#00F`, `#999`. Facit finns i exemplet lite längre ned.

CSS innehåller ett antal fördefinerade färgnamn, några av de mer "färgglada" är: `dodgerblue`, `darksalmon`, `mistyrose`, `mediumspringgreen`, `burlywood`. Försök att gissa hur färgerna ser ut.

Hur gör man om man vill ha en ljusröd färg, eller mörkröd, kan man klura ut det genom att bara titta på RGB-koden? Fundera lite.

Här kommer facit. Lek runt med färgerna och se om du kan behärska dem.

* <a href='http://dbwebb.se/style/?id=169'>http://dbwebb.se/style/?id=169</a>

[FIGURE src=/img/htmlphp/kmom04/image09.png caption="Ett exempel med varianter på färger."]

* Studera kort CSS3 modulspecen som hanterar färger.  
  <a href='http://www.w3.org/TR/css3-color/'>http://www.w3.org/TR/css3-color/</a>

* Forumet har en tråd om HTML och färgnamn:  
  <a href='http://dbwebb.se/f/433'>http://dbwebb.se/f/433</a>
    
  
###6.2 Ett färgverktyg, Colorzilla {#colorzilla}

Ibland hittar man en cool färg på en webbplats och tänker, "den färgen skulle jag ha på min webbplats". Då vore det bra att få lite hjälp med att finna färgkoden. Du kan använda Firebug till detta, du kan hitta färgkoden i stylesheeten. Ett annat verktyg som kan hjälpa dig är ColorZilla. ColorZilla är en AddOn till Firefox och integreras i din webbläsare. 

* Firefox AddOn Colorzilla:  
  <a href='http://www.colorzilla.com/firefox/'>http://www.colorzilla.com/firefox/</a>

[UPPGIFT]

Installera ColorZilla. Bekanta dig med verktyget genom studera färgkoderna på sidan ovan med hjälp av ColorZilla.


###6.3 HSL, HSLA och genomskinliga färger {#hsla}

Ett alternativt sätt att ange färger är via HSL, Hue, Saturation och Light. Det finns även möjlighet att ange graden av genomskinlighet på en färg, det görs med alpha-kanalen. Funktionerna för att göra detta i CSS heter `hsl()` och `hsla()` (a för alpha).

| Vad        | Beskrivning |
|------------|-------------|
| Hue        | 0-360 grader. Färgen representeras av gradtalet där 0 är röd, 120 är grön, 240 är blå. |
| Saturation | 0-100%. Färgmättnad, hur mycket av färgen skall användas. 0 är ingen färg och 100 är maximalt med färg. 100 är normalvärdet. |
| Light      | 0-100%. Hur ljus skall färgen vara. 0 är ljus och 100 är mörk. Normalvärdet är 50. |
| Alpha      | 0-1. Hur genomskinlig är färgen. 0 är fullt genomskinlig och 1 är ej genomskinlig. |
 
Med ledning av detta kan vi alltså återskapa färgerna röd, grön och blå. Gissningsvis borde det bli `hsl(0, 100%, 50%)`, `hsl(120, 100%, 50%)` samt `hsl(240, 100%, 50%)`. Kan du räkna ut vilken färg som är vilken?

* Här följer ett exempel på olika färger angivna med HSL och HSLA.  
  <a href='http://dbwebb.se/style/?id=170'>http://dbwebb.se/style/?id=170</a>

[FIGURE src=/img/htmlphp/kmom04/image01.png caption="Färgkombinationer med HSL och HSLA."]

För en nybörjare på färger så kan det underlätta att använda HSL/HSLA-sättet för att ange färger. Man kan välja en färg (hue, gradtalet) och därefter justera nyanserna på den genom att ändra saturation eller light. Det kan vara enklare att förstå tillvägagångssättet i HSL än hur man gör motsvarande via RGB-skalan.

Om du är intresserad av HSL så kan du läsa mer på Wikipedia.

* Om HSL (endast vid intresse)  
  <a href='http://en.wikipedia.org/wiki/HSL_and_HSV'>http://en.wikipedia.org/wiki/HSL_and_HSV</a>
  
  
###6.4 Hjälpmedel för att kombinera färger på en webbplats {#hjalpmedel-farger}

Det finns många tips och trix om hur man kan färglägga en webbplats. Det är en vetenskap i sig. Ett av de verktyg jag fastnat för är en applikation där jag kan välja färger enligt både hsl och rgb. Dessutom får jag hjälp med att finna olika färger enligt standardiserade färgscheman. 

* Testa HSL Color Schemer via följande länk:  
  <a href='http://www.workwithcolor.com/hsl-color-schemer-01.htm'>http://www.workwithcolor.com/hsl-color-schemer-01.htm</a>

[FIGURE src=/img/htmlphp/kmom04/image00.png caption="HSL Color Schemer, ett verktyg som hjälper dig att välja färger till din webbplats."]

På samma webbplats finns ett antal artiklar om färgteori och vad man bör tänka på när man väljer färger. Bra att läsa för den som vill fördjupa sig i ämnet.

* Artiklar om färgkunskap:  
  <a href='http://www.workwithcolor.com/'>http://www.workwithcolor.com/</a>

En artikel om färgschema kan du också hitta på Wikipedia, där namnges flera av de vanliga typerna av färgschema, tex monochromatic, analogous, complementary, triadic, tetradic med flera.  

* Färgkunskap på Wikipedia:  
  <a href='http://en.wikipedia.org/wiki/Color_scheme'>http://en.wikipedia.org/wiki/Color_scheme</a>

Enligt den artikeln så kan vi kategorisera min me-sida  som "neutral color scheme".


7. Bakgrundsbilder och texturer {#bakgrundsbild-texturer}
------------------------------------------------------------------------------

Med bilder kan man få sin webbplats att sticka ut. Låt oss kika lite på hur vi kan använda bakgrundsbilder och texturer i CSS.


###7.1 Bakgrundsbilder {#bakgrundsbild}

Genom att använda bakgrundsbilder kan du uppnå effekter som sticker ut. Följande exempel visar hur du kan definera bakgrundsbilder i CSS.

* <a href='http://dbwebb.se/style/?id=171'>http://dbwebb.se/style/?id=171</a>

Bilderna i exemplet är ritade png-bilder men du kan naturligtvis lika gärna använda fotografier som bakgrund. Det fungerar på samma sätt. Exemplets bilder från [Openclipart](http://openclipart.org/) (SVG-bilder) och är redigerade i verktyget [Inkscape](http://inkscape.org/). Du kan läsa mer om det i följande artikel.

* Skapa bilder för din webbplats med SVG:  
  <a href='http://db-o-webb.blogspot.com/2010/10/skapa-bilder-for-din-webbplats-med-svg.html'>http://db-o-webb.blogspot.com/2010/10/skapa-bilder-for-din-webbplats-med-svg.html</a>

* Här följer ett exempel på positionering av en bakgrundsbild.  
  <a href='http://dbwebb.se/style/?id=172'>http://dbwebb.se/style/?id=172</a>
  
Rent designmässigt går det att skapa rejäla effekter med foton (och ritad grafik). Exakt hur man gör, får vara ett ämne i en annan kurs. Här nöjer vi oss med att visa hur vi rent praktiskt placerar ut dessa objekt.


###7.2 Texturer {#texturer}

Texturer kan vara små grafiska objekt som går att upprepa, tex som bakgrundsbild på en webbsida. Följande exempel visar ett sådant användningssätt.

* <a href='http://dbwebb.se/style/?id=173'>http://dbwebb.se/style/?id=173</a>

Rätt använt kan texturer användas för att uppnå önskade effekter och göra att en webbsida sticker ut.


8. En stylesheet-väljare med PHP och sessioner {#php-stylesheet}
------------------------------------------------------------------------------

###8.1 En stylesheet-väljare {#stylesheetvaljare}

Vi har nu gått igenom ett antal konstruktioner som via CSS och stylesheeten kan förändra utseendet på din webbplats. Ibland händer det att man snabbt vill visa och jämföra olika stylesheets, i de fallen är det bra att dynamiskt kunna välja vilken stylesheet som skall användas. Låt oss göra en sådan stylesheet-väljare med PHP.

Hur skall stylesheet väljaren fungera?

> Stylesheetväljaren skall ha ett formulär där man kan välja mellan de stylesheets som finns på webbplatsen. Via formuläret bestämmer man vilken stylesheet som skall användas. Den valda stylesheeten lagras i sessionen. Om man inte valt någon stylesheet så används webbplatsens standard stylesheet.

Hur löser man detta? Pröva min lösning och fundera lite på hur det fungerar.

* <a href='http://dbwebb.se/htmlphp/me/kmom04/style.php?p=choose-stylesheet'>http://dbwebb.se/htmlphp/me/kmom04/style.php?p=choose-stylesheet</a>

[FIGURE src=/img/htmlphp/kmom04/image03.png caption="Mikael's stylesheet väljare, studera hur den fungerar."]

Då är det dags för dig att göra en egen stylesheet-väljare. Du kan följa hur jag gjorde nedan, eller så försöker du på egen hand. Din lösning behöver inte vara exakt som min, har du en alternativ lösning så går det också bra.

[UPPGIFT]

Gör en stylesheet-väljare enligt ovan. Den skall synas i menyn och den skall vara gjord som en multi-sida.

Gör på egen hand eller följ mig. Även om du gör på egen hand så bör du läsa igenom hur jag gjorde, det kommer dyka upp ett par nya tekniker i min lösning.

Så här gjorde jag.


###8.2 Välj vilken stylesheet som används i `header.php` {#valj-stylesheet}

Jag bestämde mig för att lagra filnamnet på stylesheeten i sessionen. I filen `incl/header.php` kollar jag om sessionsvariabeln är satt, isåfall använder jag den för att välja stylesheet, annars behåller jag sidans ursprungliga stylesheet. Följande kod hjälper mig att lösa detta.

`incl/header.php`:

```php
<!-- links to external stylesheets -->
<?php if(isset($_SESSION['stylesheet'])): ?>
 <link rel="stylesheet" href="style/<?php echo $_SESSION['stylesheet']; ?>">        
<?php else: ?>
 <link rel="stylesheet" href="style/stylesheet.css" title="General stylesheet">
 <link rel="alternate stylesheet" href="style/debug.css" title="Debug stylesheet">
<?php endif; ?>
```

* Källkoden:  
  <a href='http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=incl&file=header.php'>http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=incl&file=header.php</a>


###8.3 Gör multisida med switch-case {#multisida-switch}

Jag gör en ny multisida, `style.php`, där tänker jag skapa formuläret som byter stylesheet.

En multisida kan bli stor, speciellt tänker jag då på `if`-satsen som väljer vilken undersida som skall visas. Ett alternativ till `if`-satsen är en `switch-case`-sats. Denna gången väljer jag att använda en sådan istället.

* Läs om kontrollstrukturen `switch` i manualen.  
  <a href='http://php.net/manual/en/control-structures.switch.php'>http://php.net/manual/en/control-structures.switch.php</a>

* Studera `switch`-satsen i min källkod för `style.php`.  
  <a href='http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=&file=style.php#file'>http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=&file=style.php#file</a>

Vilket är bäst, `if` eller `switch`? Det beror på, lär dig både så kommer du märka när den ena eller andra passar bäst.


###8.4  Formulär som visar alla stylesheets {#visa-alla-stylesheets}

I multi-sidan gör jag en sida som visar ett formulär med en `select-option`-lista. I listan visar jag alla filer som ligger under katalogen `style/`, det är de filer som jag betraktar som valbara stylesheets.

Jag använder en ny funktion från `src/common.php`, funktionen heter `readDirectory()` och den läser in alla filer i en katalog och lagrar dem i en array. En array, på samma sätt som `$_GET`, `$_POST` och `$_SESSION` är arrayer.

Jag använder loop-konstruktionen, `foreach()`, för att gå igenom alla värden i arrayen. På det viset kan jag översätta arrayens innehåll till en `select-option`-lista som går att visa i formuläret.

* Källkoden till själva sidan, `incl/style/choose_stylesheet.php`.
  <a href='http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=incl/style&file=choose_stylesheet.php#file'>http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=incl/style&file=choose_stylesheet.php#file</a>
  
* Uppdaterad `src/common.php` med funktionen `readDirectory()`.
  <a href='http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=src&file=common.php#file'>http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=src&file=common.php#file</a>

* Manualsida till `foreach()`.  
  <a href='http://php.net/manual/en/control-structures.foreach.php'>http://php.net/manual/en/control-structures.foreach.php</a>
  
  
###8.5 En processing-sida för formuläret {#form-process}

Jag valde att posta formuläret till en speciell processing-sida, `incl/style/choose_stylesheet_process.php`. Tanken är att ha en sida som enbart fokuserar på att processa resultatet av formuläret. När processingen är klar så görs en redirect tillbaka till formulärsidan. Detta är ett vanligt sätt att hantera processing av formulär.

[FIGURE src=/img/htmlphp/kmom04/image11.png caption="Flödet mellan formuläret och processing av formuläret."]

Själva koden i sidorna som gör det möjligt att skicka mellan dessa sidor är följande rader.

Välj vilken sida som ska processa formuläret i `incl/style/choose_stylesheet.php`: 

```html
<form method="post" action="?p=choose-stylesheet-process">
```

Redirect från processingsidan i `incl/style/choose_stylesheet_process.php`: 

```php
header("Location: <a href='http://$host$uri/$extra'>http://$host$uri/$extra</a>");
```

Studera dessa två sidors källkod för att få kläm på hur det fungerar.

* `incl/style/choose_stylesheet.php`  
  <a href='http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=incl/style&file=choose_stylesheet.php#file'>http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=incl/style&file=choose_stylesheet.php#file</a>
* `incl/style/choose_stylesheet_process.php`  
  <a href='http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=incl/style&file=choose_stylesheet_process.php#file'>http://dbwebb.se/htmlphp/me/kmom04/viewsource.php?dir=incl/style&file=choose_stylesheet_process.php#file</a>

En fördel med att använda processingsidor är att strukturera koden bättre. En annan fördel är att man slipper inforutan som visas när man gör reload på en sida som är ett postat formulär.

[FIGURE src=/img/htmlphp/kmom04/image02.png caption="Inforutan som frågar om du vill posta om formuläret."]


###8.5 Sammanfattningsvis {#sammanfattning-8}

Bra jobbat, då har vi en stylesheetväljare. Då kan vi börja använda den.

[UPPGIFT]

Gör en tom stylesheet, en stylesheet som inte innehåller någon stil. Döp den till `empty.css`. Använd den och se om din webbplats fortfarande är läsbar.

Så här blev min sida, helt okey.

[FIGURE src=/img/htmlphp/kmom04/image04.png caption="Min sida med en tom stylesheet."]

Kanske inte så fin, men läsbar.

[UPPGIFT]

Gör ytterligare en stylesheet. Om du hittills har använt min stylesheet som grund så är det nu dax att pröva om dina vingar bär inom CSS. Gör en egen och personlig stylesheet till din me-sida. Om du redan har en sådan stylesheet så följer här ett par exempel på stylesheet som du kan välja istället.

* En ren stylesheet, knappt någon stylning, vit, grå och svart. Så lite CSS-kod som möjligt. Det blir helt enkelt en stylesheet att utgå ifrån när du bygger nya webbplatser.
* En cool stylesheet, gör en riktigt cool stylesheet. Välj själv vad du tycker är coolt. Riktigt konstnärligt kanske eller tvärtom?
* En färgglad stylesheet i blått/rött/grönt/gult. Välj ett färgtema och håll dig till det.
* "Jag har en bättre idé". Bra, gör då en stylesheet enligt din egna idé.

Se till att din stylesheet fungerar i stylesheet-väljaren.

[UPPGIFT]

Kontrollera att din me-sida validerar.


9. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Fick du tid över? Då kan det vara bra att lägga den tiden på att städa upp i din stylesheets. Rensa, städa och strukturera. Testa och lek med CSS.

Annars nöjer vi oss med detta, för denna gången.


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.
2. Genomför momentets alla steg.
3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Börjar du känna att du bemästrar CSS? Beskriv hur väl du kan CSS (nybörjare, erfaren). Vad tycker du om CSS så här långt in i kursen? Lyckades du med din style-väljare? Hur tänkte du när du gjorde din extra stylesheet och vad blev resultatet? Hur går det med ditt PHP:ande?
4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.
5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
