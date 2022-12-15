---
author: mos
category: webbprogrammering
revision:
  "2015-05-25": (A, mos) Första utgåvan inför htmlphp version 2.
updated: "2015-05-20 15:00:31"
created: "2015-05-20 14:59:57"
...
Vanliga CSS-konstruktioner som är bra att kunna
==================================

[FIGURE src=/image/htmlphp/kmom04/image10.png?w=c4 class="right" caption="CSS box modell".]

För att bemästra CSS så behöver man ha lite kontroll på grundkonstruktionerna. I denna artikeln får du en översikt av vissa grunder i CSS och du får se exempel på hur de fungerar.

Det handlar om CSS box modell, storlekar, olika sätt att visa element, fonter och typografi, färger, bakgrundsbilder och texturer.

<!--more-->



Förutsättningar {#pre}
---------------------------------

Du kan läsa igenom artikeln och pröva övningarna. Du kan också börja skapa en stylesheet vid sidan av och testa konstruktioner i din webbplats.

Troligen kan du redan grunderna och troligen har du läst artikeln "[Skapa en webbsida med HTML, CSS och PHP, steg 2](kunskap/skapa-en-webbsida-med-html-css-och-php-steg-2)" där vi tittade på några CSS-konstruktioner. 

Nu blir det lite repetition och lite nya saker. Artikeln tar upp centrala koncept i CSS och ger dig exempel att pröva och länkar för att läsa mer.



CSS box modell {#box-model}
--------------------------------------------------------------------

Vi tittar på exempel av CSS box modell, collapsing margins och outline.


###Modellen {#modellen}

CSS har en "Box Model" som definerar hur margin, border, padding och content förhåller sig till varandra. Nedanstående bild exemplifierar.

[FIGURE src=/image/htmlphp/kmom04/image10.png?w=w2 caption="CSS box modell med margin, border, padding och content".]

Med hjälp av denna modell kan man placera ut sitt innehåll (content) på önskad plats. Se följande exempel som ritar ut en div, stylad med både margin, border och padding.

[Exempel på "box model"](style/?id=157)

Lek runt och ändra exemplets värden på margin, border och padding tills du har klart för dig hur det hänger ihop.

CSS box modell är nödvändig att ha koll på. Det är en av grunderna i CSS.


###Collapsing margins {#collapsing}

Vad händer när man placerar två objekt bredvid varandra, där båda har marginaler? Låt oss testa ett exempel.

[Marginaler som kollapsar](style/?id=158).

Marginalerna äter upp varandra, endast en blir kvar. Testa att ändra värden för margin och se hur det påverkar.

Det är bra att veta hur marginalerna beteer sig. Det gör det enklare att placera ut elementen på ett önskvärt sätt.


###Outline {#outline}

Outline ger en möjlighet att rita en ram kring ett element, utan att den ramen tar upp något utrymme. Se följande exempel.

[En outline](style/?id=159).

Ändra storleken på outlinen och se vad som händer. Testa tills du ser du det hänger ihop.

Det är bra att veta att outline finns, ibland ser man en ram kring en länk man tryckt på, eller en knapp, eller en bild, det kan vara outlinen. För egen del brukar jag ofta sätta `outline:0` för bilder i stylesheeten, på det viset slipper jag dess default-beteende.



###Sammanfattningsvis {#sammanfattning-1}

Facit och bakgrund hittar vi i specifikationerna. Följande dokument är relevanta, klicka upp dem och skrolla snabbt igenom dem. Du behöver inte läsa dem i detalj.
 
* [Box modell](http://www.w3.org/TR/CSS2/box.html)
* [Outline](http://www.w3.org/TR/CSS2/ui.html#propdef-outline)

Använd Cheatsheet, eller litteraturen, för att slå upp de enskilda konstruktionerna.



CSS och storlekar {#css-storlekar}
-------------------------------------------------------------------------

Det finns olika sätt att ge ett element en storlek. Vi tittar på ett par av de vanliga sätten vilket inkluderar bredd, höjd, overflow och vanliga måttenheter.


###Hur bred är en div? {#bred-div}

Om man har en div med margin, border och padding, hur mycket blir kvar till content och hur stor plats tar diven? 

Studera exemplet om [bredden på en div](style/?id=160).  
  
När vi bestämmer bredden med width så gäller det innehållsdelen, därefter läggs på utrymme för padding, border och margin. Det är bra att ha koll på elementens storlek och hur storleken räknas ut.

Ibland kan det vara bra att använda `min-width` och `max-width`. Det kan ge lite flexibilitet i att bestämma ett elements minsta eller största (möjliga) storlek. 

Använd följande exempel för att [testa konstruktioner genom att modifiera min- och max-bredd av ett element](style/?id=161).

Välj att visa hela exemplet i en egen webbläsare (klicka på länken "både och" i Style!) och modifiera webbläsarens storlek för att se effekterna. Du kan även använda länken [testa min- och max-bredd i webbläsaren](style/?id=161&htmlcss).

Se till att du har koll på hur `width`, `min-width` och `max-width` fungerar. Det kan vara så att din webbläsare har en egen hård gräns för minsta bredd på ett element. Det märker du om du väljer olika värden på `min-width`.



###Hur hög är en div? {#hog-div}

En div är så hög som den behöver vara för att omsluta innehållet. Med konstruktionen `height` går det att explicit sätta en höjd på ett element. Det går även att definera `max-height` och `min-height` och kombinera dessa med `height`, allt för att uppnå önskad effekt.

Studera följande exempel och ändra i det för att se hur de olika konstruktionerna beteer sig.

[Exempel med `height`](style/?id=162)

Det är sällan man definerar höjden, ofta klarar man sig utan det. Men det beror ju på vad man vill uppnå.



###Overflow {#overflow}

Vad händer med innehållet som inte får plats inom den definerade storleken? Detta är något som går att styra med konstruktionen `overflow`. 

[Exemple om overflow](style/?id=164).

Ofta går det att använda default-beteendet på `overflow`, men det är bra att veta hur det fungerar, om man vill ändra det.



###Att ange storlekar {#storlekar}

Det finns olika sätt att ange storlekar i CSS. För en webbutvecklare är tre vanliga mått `%`, `px` och `em`. 

| Enhet | Beskrivning | 
|-------|-------------|
| `em`  | Ett mått på fontstorleken i nuvarande element. Måttet kommer från typografi. `1em` är nuvarande fonts storlek. `2em` är dubbelt så stort. |
| `px`  | Pixel. Storleken är beroende av det fysiska mediet såsom skärmen eller skrivaren. På en datorskärm säger vi enklast att en `px` är en pixel på skärmen. |
| `%`   | Procent. Relativ sitt omgivande (förälder/parent) element. 100% är så stor som parent-elementet är. |

Här är ett exempel visar [hur elements storlekar kan anges av `em` och `%`](style/?id=80).  

Studera exemplet och modifiera det för att se hur storlekar kan justeras.

Det finns absoluta enheter såsom mm (millimeter), cm (centimeter) och pt (points). Dessa har lite användning i webbområdet där vi oftast använder skärmar för att visa resultatet. De absoluta måttenheter blir desto viktigare när det gäller tryckta produkter. När man skriver ut på en skrivare vill man veta exakt hur mycket av papperet man använder. Ett A4 papper är 210 x 297 mm och här passar dessa måttenheter bra.

Läs lite kort om vilka [måttenheter som rekommenderas](http://www.w3.org/Style/Examples/007/units).



###Sammanfattningsvis {#sammanfattning-2}

Slå upp konstruktionerna i Cheatsheet. Vill du läsa specen om storlekar så finns texter både i CSS2 och i CSS3-specarna (de skiljer sig lite åt). 

Läs snabbt i [CSS3-specen om vilka måttenheter som finns](http://www.w3.org/TR/css3-values/).



`display`, `inline` och `block` {#display}
---------------------------------------------------------------------------

CSS-konstruktionen `display`, bestämmer hur ett element skall visas, eller ritas upp på skärmen. De vanligaste  sätten att använda `display` är med `block` eller `inline`.

Ett block-element tar upp den fulla tillgängliga bredden och ger en ny rad för nästa element. Ett inline-element tar bara upp så mycket plats som behövs och ger inte en ny rad. Oavsett detta så påverkas både `block` och `inline` som vanligt av `margin`, `border` och `padding`.

Exempel på block-element är: `<div>`, `<h1>`, `<p>`.

Exempel på inline element är: `<img>`, `<a>`, `<strong>`, `<span>`.

Du kan sätta, eller ändra, ett elements `display`. Se följande exempel.

[Ändra ett elements `display`](style/?id=165).

Du kan även välja att inte visa ett element genom att sätta `display:none`. Här ser du ett exempel på det.

[Gör ett element osynligt](style/?id=200).

[Slå upp display i cheatsheet](http://www.w3.org/2009/cheatsheet/#search,display) och kolla hur konstruktionen beskrivs i cheatsheet och i specifikationen.



`float` {#float}
------------------------------------------------------------------

Vi har tidigare pratat om `float` som en möjlighet att låta ett element flyta, istället för att ta sin normala plats i flödet av element som placeras ut. Med `float` går det att justera bilder i förhållande till texter, det har vi sett på me-sidan. Med `float` går det också att skapa en kolumn-layout.

I Style finns ett exempel där en site byggs upp stegvis ("Strukturera en site stegivs"). Där kan du se exempel på 2- och 3-kolumners layout.

[Strukturera en site stegvis](style/?id=65).

[FIGURE src=/image/htmlphp/kmom04/image07.png?w=w2 caption="Exempel där en webbplats byggs upp stegvis, med exempel på 2- och 3-kolumners layout.""]

Lek gärna, testa att modifera siten och kolumnerna.

Här finns ytterligare ett exempel på float, exemplet är gjort för att du skall kunna testa varianter på `float` (`left`, `right`) och `clear` (`left`, `right`, `both`).

[Exempel lek med float](style/?id=166).

Det är viktigt att ha koll på float, så lek tills du känner att du har koll.



Fonter och typografi {#fonter}
----------------------------------------------------------------------



###Vanliga fonter {#vanliga-fonter}

I webbvärlden brukar vi använda ett fåtal fonter. Det har att göra med kompabilitet mellan plattformar och webbläsare. Via följande exempel kan du se ett par av de vanligaste fonterna.

[Exempel på vanliga fonter](style/?id=167).

Om man kan sin typografi (konsten och hantverket att utforma texter) så kan man tycka att utbudet av fonter är lite "fattigt". Det finns dock möjligheter att utöka sitt utbud av fonter via nedladdningsbara fonter.



###Nedladdningsbara fonter {#nedladdningsbar-font}

Det finns möjlighet att använda nedladdningsbara fonter med konstruktionen `@font-face`. En av de tjänster som erbjuder gratis fonter är google's font api. Nedan exempel visar hur det fungerar.

[Exempel med nedladdningsbara fonter](style/?id=168).

[FIGURE src=/image/htmlphp/kmom04/image08.png?w=w2 caption="Exempel som använder Googles tjänst för nedladdningsbara fonter."]

En annan tjänst som erbjuder fria fonter är www.fontsquirrel.com. De *hostar* inte fonterna själva utan du får ladda ned dem och spara på din egna webbplats. Du kan se ett exempel på Style hur det kan se ut.

[Exempel med font från fontsquirrel](style/?id=202).

Vill du läsa mer om fonter så finns [specifikationen för fonter i CSS3](http://www.w3.org/TR/css3-fonts/).  
  


Färger {#farger}
------------------------------------------------------------------

Färger och komponering av färger. Låt oss titta lite på detta område.



###Grunderna {#grunderna}

Vi använder ofta hexadecimala värden när vi specificerar färger på HTML-elementen. `#FFF` och `#FFFFFF` är vitt och `#000` eller `#000000` är svart.  En färg kan representeras av en eller två hexadecimala siffror. Själva färgkoden är enligt RGB (Red, Green, Blue) och varje siffra anger hur mycket färg av respektive som skall visas. Visar man ingen färg får man svart, visar man fullt av samtliga färger får man vitt. Detta kallas additiv färgblandning. 

Läs kort och översiktligt de svenska (eller mer kompletta engelska) Wikipediasidor som hanterar additiv färgblandning och RGB.

[Additiv färgblandning (läs översiktligt efter intresse)](http://sv.wikipedia.org/wiki/Additiv_f%C3%A4rgblandning) eller [på engelska](http://en.wikipedia.org/wiki/Additive_color).  

[Färgskalan RGB (läs översiktligt efter intresse)](http://sv.wikipedia.org/wiki/RGB) eller [på engelska](http://en.wikipedia.org/wiki/RGB).  
     
Försök att gissa vilken färg respektive kod innebär: `#F00`, `#0F0`, `#00F`, `#999`. Facit finns i exemplet lite längre ned.

CSS innehåller ett antal fördefinerade färgnamn, några av de mer "färgglada" är: `dodgerblue`, `darksalmon`, `mistyrose`, `mediumspringgreen`, `burlywood`. Försök att gissa hur färgerna ser ut.

Hur gör man om man vill ha en ljusröd färg, eller mörkröd, kan man klura ut det genom att bara titta på RGB-koden? Fundera lite.

Här kommer facit. Lek runt med färgerna och se om du kan behärska dem.

[Exempel med färgkoder](style/?id=169).

[FIGURE src=/image/htmlphp/kmom04/image09.png?w=w2 caption="Ett exempel med varianter på färger."]

[Studera kort CSS3 modulspecen som hanterar färger](http://www.w3.org/TR/css3-color/).  

[Forumet har en tråd om HTML och färgnamn](t/115).

    
  
###Ett färgverktyg, Colorzilla {#colorzilla}

Ibland hittar man en cool färg på en webbplats och tänker, "den färgen skulle jag ha på min webbplats". Då vore det bra att få lite hjälp med att finna färgkoden. Du kan använda Firebug till detta, du kan hitta färgkoden i stylesheeten. Ett annat verktyg som kan hjälpa dig är ColorZilla. ColorZilla är en AddOn till Firefox och integreras i din webbläsare. 

[Firefox AddOn Colorzilla](http://www.colorzilla.com/firefox/).



###HSL, HSLA och genomskinliga färger {#hsla}

Ett alternativt sätt att ange färger är via HSL, Hue, Saturation och Light. Det finns även möjlighet att ange graden av genomskinlighet på en färg, det görs med alpha-kanalen. Funktionerna för att göra detta i CSS heter `hsl()` och `hsla()` (a för alpha).

| Vad        | Beskrivning |
|------------|-------------|
| Hue        | 0-360 grader. Färgen representeras av gradtalet där 0 är röd, 120 är grön, 240 är blå. |
| Saturation | 0-100%. Färgmättnad, hur mycket av färgen skall användas. 0 är ingen färg och 100 är maximalt med färg. 100 är normalvärdet. |
| Light      | 0-100%. Hur ljus skall färgen vara. 0 är ljus och 100 är mörk. Normalvärdet är 50. |
| Alpha      | 0-1. Hur genomskinlig är färgen. 0 är fullt genomskinlig och 1 är ej genomskinlig. |
 
Med ledning av detta kan vi alltså återskapa färgerna röd, grön och blå. Gissningsvis borde det bli `hsl(0, 100%, 50%)`, `hsl(120, 100%, 50%)` samt `hsl(240, 100%, 50%)`. Kan du räkna ut vilken färg som är vilken?

Här är ett exempel på olika [färger angivna med HSL och HSLA](style/?id=170).

[FIGURE src=/image/htmlphp/kmom04/image01.png?w=w2 caption="Färgkombinationer med HSL och HSLA."]

För en nybörjare på färger så kan det underlätta att använda HSL/HSLA-sättet för att ange färger. Man kan välja en färg (hue, gradtalet) och därefter justera nyanserna på den genom att ändra saturation eller light. Det kan vara enklare att förstå tillvägagångssättet i HSL än hur man gör motsvarande via RGB-skalan.

Om du är intresserad av [HSL så kan du läsa mer på Wikipedia](http://en.wikipedia.org/wiki/HSL_and_HSV).



###Hjälpmedel för att kombinera färger på en webbplats {#hjalpmedel-farger}

Det finns många tips och trix om hur man kan färglägga en webbplats. Det är en vetenskap i sig. Ett av de verktyg jag fastnat för är en applikation där jag kan [välja färger enligt både hsl och rgb](/repo/htmlphp/example/colors/colorpicker.html). Ett liknande verktyg är bra att ha i en webbprogrammerares verktygslåda.

En artikel om färgschema kan du också hitta på Wikipedia, där namnges flera av de vanliga typerna av färgschema, tex monochromatic, analogous, complementary, triadic, tetradic med flera.  

[Introduktion till färgkunskap på Wikipedia](http://en.wikipedia.org/wiki/Color_scheme).

En fördjupning om att välja färger till en webbplats, och olika tekniker för det, lämnar vi til en framtida kurs med inriktning mot webbdesign.



Bakgrundsbilder och texturer {#bakgrundsbild-texturer}
------------------------------------------------------------------------------

Med bilder kan man få sin webbplats att sticka ut. Låt oss kika lite på hur vi kan använda bakgrundsbilder och texturer i CSS.



###Bakgrundsbilder {#bakgrundsbild}

Genom att använda bakgrundsbilder kan du uppnå effekter som sticker ut. Följande exempel visar hur du kan definera bakgrundsbilder i CSS.

[Bakgrundsbilder i CSS](style/?id=171).

Bilderna i exemplet är ritade png-bilder men du kan naturligtvis lika gärna använda fotografier som bakgrund. Det fungerar på samma sätt. Exemplets bilder från [Openclipart](http://openclipart.org/) (SVG-bilder) och är redigerade i verktyget [Inkscape](http://inkscape.org/). Du kan läsa mer om det i följande artikel.

[Skapa bilder för din webbplats med SVG](coachen/skapa-bilder-for-din-webbplats-med-svg-clipart).


Här följer ett exempel på [positionering av en bakgrundsbild](style/?id=172).  

Rent designmässigt går det att skapa rejäla effekter med foton (och ritad grafik). Exakt hur man gör, får vara ett ämne i en annan kurs. Här nöjer vi oss med att visa hur vi rent praktiskt placerar ut dessa objekt.



###Texturer {#texturer}

Texturer är små grafiska objekt som går att upprepa sida vid sida, tex som bakgrundsbild på en webbsida. Följande exempel visar ett sådant användningssätt.

[Texturer som bakgrund i en webbsida](style/?id=173).

Rätt använt kan texturer användas för att uppnå önskade effekter och göra att en webbsida sticker ut.



Avslutningsvis {#avslutning}
--------------------------------------

Det var en översikt om allmänt behändiga konstruktioner i CSS. Det ger dig lite material att jobba vidare på.

[Fråga i forumet](forum) om du undrar över något eller behöver kompletterande information.
