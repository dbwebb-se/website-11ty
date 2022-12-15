---
author: mos
revision:
  "2015-01-23": (I, mos) Bort uppgift relaterad till Cheatsheet och default style.
  "2014-01-07": (H, mos) Uppdaterade läsanvisningar till Duchett.
  "2013-09-05": (G, mos) Tog bort referens till senaste versionen av source.php.
  "2012-06-29": (F, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-08-26": (E, mos) Genomgång, förändrade uppgiften om CSS3 i me-sidan, gick
    igenom html20 & css20.
  "2011-01-28": (D, mos) Lade till info-ruta om acceptabla felmeddelanden för CSS3-konstruktioner.
  "2011-01-27": (C, mos) Rejäl omarbetning inför VT11.
  "2010-09-04": (B, mos) Genomgången inför premiären.
  "2010-08-23": (A, mos) Första versionen, inklusive granskning av rgi.
updated: "2015-08-03 12:07:16"
created: "2012-06-29 14:18:11"
...
Kmom02: HTML-element och CSS-konstruktioner
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.



HTML-element och CSS-konstruktioner {#html-element-och-css-konstruktion}
--------------------------------------------------------------------

*alternativt "20% av elementen står för 80% av användarfallen"*

Vi fortsätter att bygga ut me-sidan med HTML, CSS och PHP. Detta moment är en vidare genomgång av grunder i HTML och CSS. Efter kursmomentet så har du en me-sida version 2 som innehåller några av de vanligaste konstruktionerna som återfinns i de flesta webbplatser.

Vi fortsätter att använda enkla PHP-konstruktioner för att dra nytta av PHP och dess fördelar.

Det finns en del att läsa i samband med detta kursmoment. Gör det.

Kursmomentet är upplagt kring att utforska och försöka förstå hur jag utvecklat min egen me-sida. Resultatet av dagens övning finns på följande länk.

* <a href='http://dbwebb.se/htmlphp/me/kmom02/me.php'>http://dbwebb.se/htmlphp/me/kmom02/me.php</a>

[FIGURE src=/img/htmlphp/kmom02/image05.png caption="Mikael's me-sida version 2."]

Glöm inte att läsa litteraturen.

Övningens upplägg är enligt följande:

* Läsanvisningar (4-10h)
* Övningar (4-10h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###HTML & CSS: The Complete Reference {#html-css}

*(fifth edition)* 

Läs följande kapitel.

* Part II, Ch 4: Introduction to CSS

Du har sedan tidigare läst följande kapitel.

* Part I, Ch 1: Traditional HTML and XHTML



###Beginning HTML, XHTML, CSS and JavaScript {#beginning-web}

*(1st edition)*

Bläddra igenom (läs översiktligt) följande kapitel.

* Ch 3: Images, Audio and Video
* Ch 4: Tables
* Ch 7: Cascading Style Sheets


Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Structuring Documents for the Web
* Ch 2: Links and Navigation



###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Inga nya läsanvisningar inför detta kursmoment.

Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics


###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

W3C har ett "cheatsheet" som snabbt ger dig information om HTML eller CSS. Testa det. Det kan spara tid.

* <a href='http://www.w3.org/2009/cheatsheet/'>http://www.w3.org/2009/cheatsheet/</a>

W3School har bra siter för HTML, CSS och PHP. De är enkla och bra att använda för referens.

* <a href='http://www.w3schools.com/html'>http://www.w3schools.com/html</a>
* <a href='http://www.w3schools.com/html5'>http://www.w3schools.com/html5</a>
* <a href='http://www.w3schools.com/css'>http://www.w3schools.com/css</a>
* <a href='http://www.w3schools.com/php'>http://www.w3schools.com/php</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.


1. Vad hände i förra kursmomentet och hur går vi vidare? {#vad-hande}
--------------------------------------------------------------------

I förra kursmomentet blev resultatet en me-sida, en sida med en beskrivning om mig själv samt en redovisningssida. En webbplats som fortsättningsvis helt enkelt kallas för me-sidan.

Det blev användning av både HTML, CSS och PHP för att strukturera kod och information. Det var en första provsmakning av dessa tekniker och det gick att se hur de kan samverka för att bilda en webbplats.

* Länk till resultatet av förra kursmomentet  
  <a href='http://dbwebb.se/htmlphp/kmom01/me/me.php'>http://dbwebb.se/htmlphp/kmom01/me/me.php</a>

[FIGURE src=/img/htmlphp/kmom02/image06.png caption="Så här blev resultatet efter föregående kursmoment."]

Hur skall vi då gå vidare?

Vi behöver studera varje teknik lite mer i detalj (och i lugn och ro).

Vi behöver se hur vi kan bygga upp en webbplats med de vanligaste element. Kanske lite kolumner och menyer. Lite mer om navigering. Kanske även hur man med en stylesheet kan ändra hela webbplatsens utseende, utan att ändra någon HTML eller PHP-kod.

Det vore trevligt om vi kan fylla på me-sidan med fler funktioner, fler vanliga funktioner som ofta finns i webbplatser. Det vore riktigt trevligt om det sedan gick att kopiera hela me-siten för att bygga en ny webbplats. Lite som en mall (template) för webbplatser. Ska vi lyckas med detta så behöver vi tänka på struktur, ordning och reda.

HTML5 och CSS3 är ju kommande tekniker som redan fungerar. Låt oss pröva dem för att se vad de kan erbjuda.

Det finns verktyg som kan hjälpa oss vid vår webbutveckling. Det finns också en hel del tips och tricks som kan underlätta utveckling, test och felsökning. Det vore fint om vi kunde bli varse några av dessa tips och tricks. Så många som möjligt.

Allt för att göra det enkelt att bygga webbplatser.

Kursen kommer att omfatta ett projekt. Det är nog en bra idé att ägna dessa första kursmoment åt att förbereda oss inför projektet. När det väl är dax för projekt så borde det gå snabbt att genomföra, bara att kopiera mallen för att skapa en ny webbplats, vips klar! Eller hur? Peppar, peppar...


###1.1 Dagens agenda {#agenda}

Så, detta kursmoment får ta vid där det förra slutade. Vi bygger helt enkelt vidare på me-sidan. Medan vi gör det så försöker vi täcka in så mycket som möjligt av önskningarna från texten ovan. Det blir en bra plan för dagen. Lite som ett smörgåsbord, en kompott av vanliga lösningar och tekniker för att bygga en webbplats.

När vi är klara så har vi en me-sida i version 2.0.

Så här strukturerar vi dagens agenda, i stora drag, detaljer tar vi efter hand.

1. Guider till HTML och CSS  
  Vilka guider och manualer behöver läsas?

2. HTML5  
  Låt oss uppgradera me-sidan till att använda några av de nya HTML5-elementen.

3. CSS och stylesheets  
  Vi tittar in lite djupare in i CSS och Stylesheets.

4. CSS3  
  Kan vi snygga upp me-sidan med lite nya CSS3-konstruktioner?

5. Nya "features" till me-sidan  
  Vi lägger till ett par nya funktioner och features till me-sidan?

Denna agenda ger oss en stabilare bas av framförallt HTML och CSS-kunskap. Lite PHP kommer också hanteras. Då kör vi.


2. Guider till HTML och CSS {#guider}
----------------------------------------------------------------------

För att till fulla förstå och dra nytta av teknikerna HTML, CSS och PHP så krävs övning och kunskap. Kurslitteraturen fyller en del av det teoretiska behovet. Referensmanualer på nätet likaså. Att söka på nätet ger också svar på en del frågor. Framförallt vid felsökning.

I detta kursmoment ägnas tid åt att etablera mer kunnande inom framförallt HTML och CSS. Till detta syfte finns ett par guider, html20 och css20. Dessa guider tar upp vanliga konstruktionerna inom HTML respektive CSS. Det ger oss en grund att stå på.

Dessutom bekantar vi oss med referensmanualerna. De som skall bli våra bästa vänner.

Se till att du läst litteraturen enligt läsanvisningarna innan du fortsätter. Du behöver det som bas, innan du är redo att gå vidare. Ok?

Jag integrerade guiderna i min me-sida (se menyn "Guider") och där kan du läsa dem. I footern stoppade jag dessutom in länkar till referensmanualerna för HTML, CSS och PHP.

* Här kan du se min uppdaterade me-sida v2.0.  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/me.php'>http://dbwebb.se/htmlphp/me/kmom02/me.php</a>

[FIGURE src=/img/htmlphp/kmom02/image08.png caption="Min uppdaterade sida men menyval för Guider och länkar till manualerna i footern."]

Skrolla längst ned för att se footern med länkarna till manualen.

Under denna övning kommer vi studera vad som uppdaterats på me-sidan. Dels för att förstå tankarna bakom dessa uppdateringar och dels för att kunna göra liknande uppdateringar på din egna me-sida.

[UPPGIFT]

Kolla runt och bekanta dig med vad som hänt med min nya me-sida. Ägna ett par minuter åt att klicka runt, kolla in guiderna, manualerna och studera katalogstrukturen och källkoden till den nya me-sidan.

Om du är nybörjare på dessa tekniker så bör du ägna lite mer tid åt guiderna redan nu. Framförallt guiderna html20 och css20. Skumläs dem snabbt (3 minuter per guide) så du vet vad de innehåller. Guiderna kommer användas som referens under resten av kursmomentet.

* Guiden html20  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/guide.php?id=html20'>http://dbwebb.se/htmlphp/me/kmom02/guide.php?id=html20</a>
* Guiden css20  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/guide.php?id=css20'>http://dbwebb.se/htmlphp/me/kmom02/guide.php?id=css20</a>

[UPPGIFT]

Studera min fil `incl/footer.php` och se hur jag har länkat till manualerna. Jag har även lagt till länkar till en ny validator. Inkludera länkarna i footern på din egna me-sida.

* Källkod till min `footer.php`:  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=incl&file=footer.php'>http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=incl&file=footer.php</a>


3. HTML5 {#html5}
----------------------------------------------------------------------

Vi bekantar oss med nya element i HTML5 och lär oss att använda en del av dem.


####3.1 Element i HTML5 {#html5-element}

HTML5 introducerar ett antal nya element. I min me-sida har jag använt ett par av dem.

Flera av elementen ersätter det anonyma `<div>`-elementet och tillför semantisk betydelse. Det finns en mening med elementet. Tex när du använder `<footer>` istället för en `<div>` så betyder det att detta är en del som innehåller en footer till sektionen/sidan/webbplatsen.

De nya elementen är just "nya", och de känns ofta inte igen av webbläsarna. Detta kan åtgärdas genom att definera dem i stylesheeten med en standard style. Följande kod löser det.

```css
/* html5 elements
--------------------------------------------------------
*/
header,footer,nav,article,section,
aside,figure,figcaption{display:block;}
```

* Se hela filen `style/stylesheet.css`:    
  <a href='http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=style&file=stylesheet.css'>http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=style&file=stylesheet.css</a>

<del>[UPPGIFT]</del>

<del>Använd Cheatsheet och slå upp specifikationen för elementen `<div>` och `<article>`. Kan du se vilken standard CSS style som specifikationen rekommenderar för respektive element?</del>

*Cheatsheet är uppdaterad och man kan nu inte se standard style för respektive CSS element (2015-01-23).*

* Cheatsheet:  
  <a href='http://www.w3.org/2009/cheatsheet/'>http://www.w3.org/2009/cheatsheet/</a>


####3.2 Använd HTML5 element i me-sidan {#html5-anvand}

I min nya me-sida har jag bytt ut en del `<div>`-element mot HTML5-element. Öppna min me-sida i webbläsaren och studera källkoden (högerklicka och välj "Visa källkod").

* Öppna länken och välj "Visa källkod"  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/me.php'>http://dbwebb.se/htmlphp/me/kmom02/me.php</a>

[FIGURE src=/img/htmlphp/kmom02/image09.png caption="Källkoden till me-sidan (högerklicka i webbläsaren och välj "Visa källkod") visar användningen av de nya elementen."]

[UPPGIFT]

Uppdatera fritt din egna me-sida med HTML5-element. Använd de som du anser passar. Som du kan se så har jag själv mixat användningen av `<div>` och rena HTML5-element.

Under tiden som du gör detta bör du även läsa igenom del 2 av guiden html20. Där hittar du ledtrådar till hur sidan kan struktureras med varianter av HTML-element.

* Guiden html20, del 2  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/guide.php?id=html20#part-II'>http://dbwebb.se/htmlphp/me/kmom02/guide.php?id=html20#part-II</a>


####3.3 Använd Firebug för att analysera en webbsida {#firebug}

Firebug är ett av flera verktyg som underlättar en webbutvecklares vardag. Firebug är en Firefox addon som går att installera direkt i Firefox.

Med hjälp av Firebug så kan du bland annat analysera HTML- och CSS-kod bakom en webbsida. Det är ett utmärkt verktyg när du skall analysera en webbsida, oavsett om det är för felsökning eller för att "låna" en bra lösning som du hittat.

* Läs på och hämta hem Firebug:  
  <a href='http://getfirebug.com/'>http://getfirebug.com/</a>

[FIGURE src=/img/htmlphp/kmom02/image01.png caption="Ladda ned och installera Firebug från deras hemsida."]

När du installerat Firebug så hittar du en fluga längst ned till höger i Firefox fönster (statusbaren). Klicka på flugan och börja testa verktyget. Du kan ha stor nytta av det.

Så här ser det ut när man använder Firebug för att analysera koden bakom bilden på min me-sida.

[FIGURE src=/img/htmlphp/kmom02/image00.png caption="Analysera bilden på me-sidan med hjälp av Firebug."]

Det går att förändra webbsidan genom att ändra HTML- och CSS-koden direkt i Firebug. Det kan spara en hel del tid vid felsökning och det är ett enkelt sätt att snabbt testa en alternativ CSS-konstruktion.

[UPPGIFT]

Installera Firebug i din Firefox. Ägna 10 minuter åt att testa Firebug genom att klicka runt på min me-sida och studera hur sidan är uppbyggd med HTML-elementen och CSS-konstruktioner.

Kan du göra en enkel ändring och få bilden att hamna till vänster, istället för som nu, till höger? Om du inte lyckas så ställer du en fråga i forumet och ber om lösningen.


####3.4 IE och HTML5 {#ie-html5}

Webbläsaren Internet Explorer kan behöva lite hjälp för att klara av HTML5. Detta löses med hjälp av ett JavaScript som gör så att IE kan hantera de nya elementen.

* Läs om hur du gör i följande artikel.  
  <a href='http://db-o-webb.blogspot.com/2010/09/html5-i-internet-explorer.html'>http://db-o-webb.blogspot.com/2010/09/html5-i-internet-explorer.html</a>
  
[UPPGIFT VALFRI]

Lägg till stöd för IE och HTML5 i din me-sida.


####3.5 Sammanfattningsvis {#sammanfattning-3}

Det var ett par övningar för att komma igång med HTML5. Men, det räcker inte att bara använda elementen, det behövs även style. Låt oss därför raskt gå vidare och titta lite mer på stylesheets och CSS.

Glöm inte bort guiden html20 och CheatSheet. Använd dem för att slå upp element när du har frågor eller funderingar. Specifikationen för elementen innehåller alltid facit.


4. CSS och Stylesheets {#css-stylesheets}
-----------------------------------------------------------------------

I förra kursmomentet användes en extern stylesheet för att styla me-sidan. Låt oss nu ägna lite mer tid åt stylesheets och CSS, dels i form av guiden css20 och dels i form av ett par uppgifter.

####4.1 En stylesheet för debug {#stylesheet-debug}

Firebug är ett bra verktyg att använda vid felsökning av CSS-kod. Likaså är valideringsverktygen.

Ibland vill man ha en snabb visuell översikt av sidans element. Ett sätt att åstakomma detta är att rita en ram kring de element som finns, eller att ge dem en viss bakgrund. Vi kan skapa en egen stylesheet för detta syfte och kalla den för debug, debug.css. Låt oss göra en sådan stylesheet.

[UPPGIFT]

Gör en debug-stylesheet genom att följa nedanstående instruktioner.

#####4.1.1 Dela upp stylesheets i filer med `@import` {#import}

Tanken är att använda den befintliga stylesheeten och endast tillföra ramar och bakgrundsfärger på de element man vill studera. Detta kan vi uppnå genom att göra en ny stylesheet, `debug.css`, och i den inkludera den befintliga `stylesheet.css`.

Gör en ny fil, `style/debug.css`, och lägg in följande kod.

```css
@import url("stylesheet.css"); /* Import all styles from this file */

/* add debug-information to some central elements
--------------------------------------------------------
*/
body {background: beige;}
header#above {background: blueviolet;}
```

* Se hela källkoden till min `style/debug.css`  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=style&file=debug.css'>http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=style&file=debug.css</a>
  
Denna stylesheet omfattar alltså all style som finns i `style/stylesheet.css` och tillför den style som defineras i filen. Det går alltså att omdefinera stylen för ett element. Det som gäller är det som senast definerats.

[INFO]
**Tips.**

Om man definerar en style för ett element på olika ställen, vilken style får då elementet?

Först läses de externa stylesheeten, uppifrån och ned. Det som defineras kan omdefineras längre ned i filen. Det som senast definerats gäller. Det är alltså viktigt i vilken ordning som definitionerna skrivs och i vilken ordning filerna inkluderas.

Därefter läses sidans interna style, den style som finns definerad mellan `<style></style>` taggarna. De definitionerna som anges där skriver över de som gjorts tidigare.

Till slut läggs den style till som definerats i själva HTML-elementet. Detta görs med attributet "style", tex `<div style="background:lime;"></div>`. Denna style skriver då över den style som definerats tidigare.

Principen är att ju närmare elementet som stylen defineras, desto viktigare är den.
[/INFO]

`@import` kan vara ett bra sätt att dela upp sin style i olika filer. Detta kan underlätta vid utveckling av stylesheets.

####4.1.2 Alternativ stylesheet med `<link>` {#alternativ-style}

Ett enkelt sätt att använda debug-stylen är att inkludera den som en alternativ extern stylesheet. Detta kan du göra genom att uppdatera din `incl/header.php`.

```html
<link rel="stylesheet" href="style/stylesheet.css" title="General stylesheet">
<link rel="alternate stylesheet" href="style/debug.css" title="Debug stylesheet">
```

Du kan nu, med Firefox, välja vilken stylesheet du vill använda. Gå till Firefox menyn och välj "Firefox -> View -> Page style", välj sedan den stylesheet du vill använda för att visa sidan.

På detta sätt kan du skifta mellan olika stylesheets. Det kan vara ett enkelt sätt att testa varianter på stylesheets, speciellt i utvecklingsfasen.

Så här blev min debug-style.

[FIGURE src=/img/htmlphp/kmom02/image20.png caption="Min me-sida med stylesheet för debug."]

Lägg till CSS-konstruktioner i din egna variant av debug och välj att styla de element som bygger upp sidans struktur.

[INFO]
**Tips.**

Ser din sida inte ut som den var tänkt? Är något fel?

Felsök stylesheets på följande sätt:

1) Är min stylesheet inkluderad i sidan? Välj att visa HTML-sidans källkod via webbläsaren och klicka dig fram till stylesheeten. Är det rätt stylesheet?

2) Validera stylesheeten.

3) Använd debug-stylesheeten för att visualisera sidans struktur.

4) Använd Firebug för att analysera sidans struktur och dess element samt för att testa variationer på CSS-konstruktioner.
[/INFO]

Nu har du en debug-style. Då går vi vidare.


###4.2 Styla me-sidans olika delar {#style-me-sida}

Låt oss nu ägna lite tid åt att gå igenom me-sidans stylesheet och hur den hjälper till att styla sidans olika delar.

Vi utgår från konstruktionerna i min stylesheet som du finner i sin helhet på följande länk.

* Källkoden för `style/stylesheet.css`.  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=style&file=stylesheet.css'>http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=style&file=stylesheet.css</a>
  
Vi går igenom me-sidans style, del för del. Till vår hjälp har vi verktyget "[style!](/style)". Med detta verktyg är det enkelt att visualisera HTML- och CSS-konstruktioner.

Titta lite på style!, testa det, sedan kör vi igång. Testa gärna att skapa en egen testsida med HTML och CSS i style!.

* Vertyg för att leka med HTML och CSS-konstruktioner:  
  <a href='http://dbwebb.se/style'>http://dbwebb.se/style</a>

[FIGURE src=/img/htmlphp/kmom02/image02.png caption="Med verktyget style! går det att visa och testa exempel på HTML- och CSS-konstruktioner."]

Det finns en speciell kategori med exempel som är gjort för detta moment. Välj menyvalet (högermenyn) "me-sidan steg för steg". Klicka igenom de olika exemplen och se hur me-sidans stylesheet byggs upp.

Då tar vi och går igenom dessa exempel, ett och ett.


####4.2.1  Generella definitioner {#definitioner}

Du kan se exemplet i style! via följande länk.

* <a href='http://dbwebb.se/style/?id=134'>http://dbwebb.se/style/?id=134</a>

[FIGURE src=/img/htmlphp/kmom02/image03.png caption="Den första delen som sätter generella styles på bla html- och body-elementen."]

Dessa konstruktioner har att göra med hela sidan. Dels sätter det marginaler på `body` & `html` till ett definerat värde då dessa kan skilja mellan olika webbläsare. Det sätter bakgrundsfärger och fonter som sedan gäller över hela sidan. Det sätts även standardstil på rubriker samt definerar att det inte skall synas en border på ett `img`-element (bra när man länkar en `img`).


####4.2.2  Sidans grundstruktur {#grundstruktur}

Du kan se exemplet i style! via följande länk.

* <a href='http://dbwebb.se/style/?id=136'>http://dbwebb.se/style/?id=136</a>

[FIGURE src=/img/htmlphp/kmom02/image10.png caption="Sidans grundstruktur defineras med header och footer sektioner."]

Här defineras respektive del för "header", "footer" och "content" samt en del för relaterade länkar.

Tanken med relaterade länkar är att man har en familj av webbplatser och vill länka inom denna familjen. "Headern" och "footern" är inget konstigt och "content" är tänkt att omsluta sidans huvudsakliga innehåll.

På dessa element sätts bredden och sidan centreras. Genom att styla dessa element kan man enkelt ändra webbplatsens grundutseende.


####4.2.3  Länkar {#lankar}

Du kan se exemplet i style! via följande länk.

* <a href='http://dbwebb.se/style/?id=137'>http://dbwebb.se/style/?id=137</a>

[FIGURE src=/img/htmlphp/kmom02/image11.png caption="Utseende och beteende för länkarna defineras."]

Länkarna stylas till att få samma färg som parent-elementet (föräldrar-elementet). När man för musen över en länk så blir den röd och raden under försvinner.


####4.2.4  Navigeringsmeny {#navigeringmeny}

Du kan se exemplet i style! via följande länk.

* <a href='http://dbwebb.se/style/?id=138'>http://dbwebb.se/style/?id=138</a>

[FIGURE src=/img/htmlphp/kmom02/image12.png caption="Stylning av navigeringsmenyn och menyn för relaterade länkar."]

Navigeringsmenyn och navigeringen för relaterade länkar ligger båda inom ett `<nav>`-element. Själva huvudmenyn är ett bra exempel på vad som går att åstakomma med CSS.


####4.2.5  Figure {#figure}

Du kan se exemplet i style! via följande länk.

* <a href='http://dbwebb.se/style/?id=139'>http://dbwebb.se/style/?id=139</a>

[FIGURE src=/img/htmlphp/kmom02/image13.png caption="En bild med bildtext, stylad som figure och figcaption."]

Med HTML-elementet `<figure>` och `<figcaption>` går det att koppla bilder med en bildtext. Det är smidigt och det kan finnas en stor fördel ur sökmotor-perspektiv. Det blir nu lättare för sökmotorerna att koppla en bild till en bildtext vilket i förlängningen gör det enklare att söka efter bilder.

I exemplet är bilden satt att flyta till höger (`float:right`), med denna konstruktion flyttas elementet ur det normala flödet och hamnar så lågt till höger som det går. Texten i dokumentet kommer att omsluta bilden. Vill vi istället ha bilden till vänster så använder vi `float:left`.

Ett vanligt problem vid användadet av `float` är att det element som omsluter det flytande elementet har svårt att veta dess placering och storlek. Sidans utseende blir konstigt, bilden nedanför visar ett sådant exempel.

* Problem med clear fix:  
  <a href='http://dbwebb.se/style/?id=143'>http://dbwebb.se/style/?id=143</a>

[FIGURE src=/img/htmlphp/kmom02/image16.png caption="`div#content` som omsluter bilden har svårt att bedömma hur stor bilden är och omsluter den därför inte."]

Det som behövs för att åtgärda problemet är att lura webbläsaren att rita om sidan, i samband med det så lyckas webbläsaren finna korrekt storlek. En sådan omritning kan påtvingas med den konstruktion som är markerad i bildens CSS-kod.

```css
/* clearer fix */
/* div#content {overflow:auto;} */
```

Som du ser är själva konstruktionen bortkommenterad, ta bort kommentaren i exemplet och klicka på uppdatera. Blev det bättre? Det ska det bli.

Själva konstruktionen kallas "clearer fix" eller "clearfix". Det finns flera sätt att konstruera en sådan fix och detta är en variant. I detta fallet är det alltså det omslutande elementet som skall ha fixen.

Navigeringsmenyn och navigeringen för relaterade länkar ligger båda inom ett `<nav>`-element. Själva huvudmenyn är ett bra exempel på vad som går att skapa med CSS, här en enklare stylning av en nav-meny.


###4.2.6  Byline {#byline}

Du kan se exemplet i style! via följande länk.

* <a href='http://dbwebb.se/style/?id=140'>http://dbwebb.se/style/?id=140</a>

[FIGURE src=/img/htmlphp/kmom02/image17.png caption="En stylad byline, bra att ha i slutet av artiklar och texter."]

Här är ett exempel på hur en footer till en artikel kan stylas i form av en byline med information om författaren.

Ett vanligt problem i samband med flytande element är att avbryta flytandet vid rätt tillfälle. Som du kan se i CSS-koden för exemplet så finns det en definition om `clear:both`. Definitionen innebär att flytandet av element skall sluta och att detta element ej skall flyta tillsammans med de andra.

Vad händer om vi tar bort konstruktionen `clear:both`?

* Problem vid clear float:  
  <a href='http://dbwebb.se/style/?id=144'>http://dbwebb.se/style/?id=144</a>

[FIGURE src=/img/htmlphp/kmom02/image18.png caption="CSS-konstruktionen clear hjälper till att få sidans element på rätt plats."]

Som du kan se i exemplet så är konstruktionen bortkommenterad. Ta bort kommentarer och klicka på "Uppdatera", blir det bättre?


####4.2.7  Summering {#summering-4}

Avslutningsvis så stylas sidans footer och därefter visas ett exempel med en komplett CSS. Vill du testa vad de olika konstruktionerna gör så är det bara att ändra dem och klicka på uppdatera.

* Footer  
  <a href='http://dbwebb.se/style/?id=141'>http://dbwebb.se/style/?id=141</a>
* Komplett CSS  
  <a href='http://dbwebb.se/style/?id=142'>http://dbwebb.se/style/?id=142</a>
  
Använd CheatSheet för att slå upp CSS-konstruktioner. Specifikationen innehåller som vanligt facit för vad som går att göra, kan vara lite svårtillgängligt men ändock ett facit. Lär dig använda det.

[UPPGIFT]

Uppdatera din me-sida så den innehåller följande delar.

* Header med relaterade länkar
* Sidheader med logo
* Navigeringsmeny
* `div#content`
* Byline i egen fil (`incl/byline.php`)
* Sidfooter

Styla dem. Lägg en timme eller två (eller mer om du vill) på att finna en bra style som  du anser passar din me-sida.

Välj att namnge konstruktionerna som jag gjort eller använd din egen namngivningsstandard.

[INFO]
**Tips.**

Har du problem med en CSS-konstruktion och behöver hjälp?

Skapa ett exempel i style! som visar vad du försöker göra och spara det. Ställ din fråga i chat eller forum och bifoga länken till exemplet i style!.

Det gör det enkelt för en kompis och lärare att hjälpa dig.
[/INFO]

[INFO]
**Tips.**

Kom ihåg "clearfix" och `clear:both`. Det är två vanliga problem och ibland kan det vara svårt att veta vilket element som skall innehålla fixen.

Vid felsökning kan både Firebug och din debug-style hjälpa dig. Använd dessa tekniker vid felsökningen.
[/INFO]

Låt oss gå vidare och titta lite på de nya konstruktionerna i CSS3.


5. CSS3 {#css3}
----------------------

CSS3 kommer med flera trevliga varianter på att styla sidan. Låt testa på en handfull av dem, bara för att bekanta oss med CSS3.


###5.1 Runda hörn {#runda-horn}

Med konstruktionen `border-radius` går det att skapa runda hörn på en ram (border). Se följande exempel i style!.

* <a href='http://dbwebb.se/style/?id=39'>http://dbwebb.se/style/?id=39</a>


###5.2 Skugga {#skugga}

Med konstruktionen `box-shadow` går det att skapa en skugg-effekt. Se följande exempel i style!.

* <a href='http://dbwebb.se/style/?id=146'>http://dbwebb.se/style/?id=146</a>


###5.3 Gradient {#gradient}

Med konstruktionen `gradient` går det att skapa en effekt där en färg övergår i en annan. Se följande exempel i style!.

* <a href='http://dbwebb.se/style/?id=147'>http://dbwebb.se/style/?id=147</a>


###5.4 Opaque {#opaque}

Opaque innebär att sätta graden av genomskinlighet på en färg, detta görs genom att sätta ett värde på färgens alpha-kanal. Det går att göra antingen med RGB eller HSL-syntax. 

Se följande exempel i style! där `hsla()` används (a:et i hsla står för alpha). Motsvarigheten för RGB är `rgba()`.

* Exempel med `hsla()`:  
  <a href='http://dbwebb.se/style/?id=148'>http://dbwebb.se/style/?id=148</a>
  
HSL, står för Hue, Saturation och Light och är ett alternativt sätt att ange färger. Många anser att detta sätt underlättar förståendet för färger och är lättare att använda än RGB (Red, Green, Blue).

Testa gärna en av alla dessa färgapplikationer som hjälper till att välja färger till din webbapplikation.

* HSL Color Schemer  
  <a href='http://www.workwithcolor.com/hsl-color-schemer-01.htm'>http://www.workwithcolor.com/hsl-color-schemer-01.htm</a>
* Googla på "color chooser"  
  <a href='http://www.google.se/search?q=color+chooser'>http://www.google.se/search?q=color+chooser</a>

[FIGURE src=/img/htmlphp/kmom02/image19.png caption="HSL Color Schemer väljer dig att välja färgkombinationer till i din webbplats."]


###5.5 Text i kolumner {#text-column}

Med konstruktionen `column-count` går det att flöda text i kolumner, på samma sätt som i en tidning eller tryckt artikel. Se följande exempel i style!.

* <a href='http://dbwebb.se/style/?id=149'>http://dbwebb.se/style/?id=149</a>


###5.6 CSS3-kompabilitet mellan olika webbläsare {#css3-kompabilitet}

Det är inte säkert att en webbläsare stödjer standardkonstruktionen för CSS3. I vissa fall måste man använda webbläsarens egna konstruktion.

I exemplen ovan så visas detta bl.a. i formen av följande konstruktion.

```css
 -webkit-border-radius: 10px;
 -moz-border-radius: 10px;
 border-radius: 10px;
```
 
Konstruktionen `border-radius` är en standard-konstruktionen i CSS3 medan `-moz` och `-webkit` är prefix till konstruktioner specifika för en viss familj av webbläsare.

Följande är de vanliga prefixen: 

* -moz (Firefox)
* -webkit (Safari, Chrome)
* -o (Opera)
* -ms (Internet Explorer)

Internet Explorer har också en del egna konstruktioner som man behöver använda för att uppnå CSS3-kompabilitet mellan webbläsare. En som kan hjälpa till är funktionen `filter()`. Denna funktion kan skapa visuella effekter, bla ändra alpha-kanalen, skapa skuggor eller gradient.

På detta sätt går det redan idag att skapa CSS3-kompatibla webbplatser. Även om CSS3-tekniken är i sin linda. Det gäller att vara försiktig om man siktar på kompabilitet.

[INFO]
**Tips.**

Du får felmeddelande när du validerar CSS3-konstruktioner som är specifika för en webbläsare. Dessa felmeddelanden kan se ut på följande sätt:

`Property -webkit-border-radius doesn't exist : 10px  10px
Property -moz-border-radius doesn't exist : 10px  10px`

Dessa och liknande felmeddelande är fullt acceptabla i denna kursen.
[/INFO]


###5.7 Sammanfattningsvis {#sammanfattning-5}

Det var en introduktion till ett par CSS3-konstruktioner som stylar sidan på ett sätt som tidigare nästan bara var möjligt genom att använda bilder och extra HTML-taggar.

Använd CSS3 specifikationen för att slå upp CSS3-konstruktioner. Specifikationen innehåller facit.

* Specificationen översikt  
  <a href='http://www.w3.org/Style/CSS/specs'>http://www.w3.org/Style/CSS/specs</a>
* Direktlänk till CSS "backgrounds and borders module" (`box-shadow`, `border-radius`)  
  <a href='http://www.w3.org/TR/css3-background/'>http://www.w3.org/TR/css3-background/</a>
* Direktlänk till CSS "image values and replaced content module" (`gradient`)  
  <a href='http://dev.w3.org/csswg/css3-images/'>http://dev.w3.org/csswg/css3-images/</a>
* Direktlänk till CSS "colors module" (`opacity`, `hsla`, `rgba`)  
  <a href='http://www.w3.org/TR/css3-color/'>http://www.w3.org/TR/css3-color/</a>
* Direktlänk till CSS "multi-column layout module" (`column-count`)  
  <a href='http://www.w3.org/TR/css3-multicol/'>http://www.w3.org/TR/css3-multicol/</a>

Var uppmärksam på att saker flyttas mellan specifikationerna. CSS3 är ett rörligt mål. Länkarna till ovanstående specar blir snabbt gamla så lär dig att använda översikten till specifikationen för att hitta rätt.

[UPPGIFT]

Uppdatera din me-sida så den använder två eller fler av ovanstående CSS3-konstruktioner. Det räcker om det fungerar i Firefox.


6. Features till siten {#features}
------------------------------------

Det finns ett par saker, features, som är tillagda i min me-sida. Låt oss ta en snabbtitt på några av dem.


###6.1 Favicon {#favicon}

En favicon är den icon som visas tillsammans med länken till sidan.

[FIGURE src=/img/htmlphp/kmom02/image14.png caption="Faviconen visas i webbläsaren."]

En favicon defineras med en `<link>` i sidans header, inom HTML-elementet `<head>`.

Exempel på favicon.

```html
<link rel="shortcut icon" href="img/favicon.ico">
```

I min me-sida finns tre varianter på favicons, en glider, en bth och en för dbwebb. Du kan titta på dem som bilder via följande länk, (filnamn börjar med `favicon_`). Du kan kopiera och använda dem som din egna favicon.

* Mina favicons:  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=img'>http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=img</a>

[UPPGIFT]

Lägg till en favicon till din me-sida.


###6.2 Alltid visa scrollbar {#visa-scrollbar}

Om en sida är centrerad kan den "flippa" beroende på om scrollbaren visas eller ej. På långa sidor visas scrollbaren men på korta sidor visas den ej. Ett sätt att undvika detta är att alltid visa scrollbaren.

Det kan du göra via stylesheets och ett exempel ser du på följande länk i style!.

* Alltid visa scollbar:  
  <a href='http://dbwebb.se/style/?id=62'>http://dbwebb.se/style/?id=62</a>
  
Du behöver alltså lägga till följande kod i din stylesheet. Då visas alltid scrollbaren, oavsett hur lång sidan är.

```html
html { overflow-y: scroll; }
```

[UPPGIFT VALFRI]

Lägg till definitionen för att alltid visa scrollbaren i din me-sida.


###6.3 Visa menyval för nuvarande sida {#nuvarande-sida}

Navigationsmenyn visar (svengelska: "highlightar") nuvarande menyval. Se den gröna pilen i bilden nedan.

[FIGURE src=/img/htmlphp/kmom02/image15.png caption="Nuvarande menyval visas genom att markera menyvalet för sidan."]

Lösningen innebär att definera ett `id` per sida och använda detta `id` för att styla elementen i stylesheeten, det är en mix av HTML, CSS och PHP.

Så här ser det ut om du studerar den genererade HTML-koden för ovanstående sida (`me.php`):

```html
<!-- The body id helps with highlighting current menu choice -->
<body id='me' >
```

Så här gjorde jag i `me.php`, jag valde ett `id` som hette samma sak som sidan.

**1)** Sätt ett id på HTML-elementet `<body>`. Definera detta `id` i respektive sida som en variabel, `$pageId`, och skriv ut det i `header.php`.

`me.php`:

```php
<?php
$pageId = "me";
?>
```

`header.php`:

```html
<!-- The body id helps with highlighting current menu choice -->
<body<?php if(isset($pageId)) echo " id='$pageId' "; ?>>
```

**2)** Sätt ett `id` på varje menyval så att det blir enkelt att styla ett specifikt menyval.

`header.php`

```html
<!-- Main navigation menu -->
<nav class="navmenu">
 <a id="me-"     href="me.php">Me</a>
 <a id="report-" href="report.php">Redovisning</a>
 <a id="guide-"  href="guide.php">Guider</a>
 <a id="source-" href="viewsource.php">Källkod</a>
</nav>
```

**3)** Definera en style i stylesheeten som gäller när `body#id` och `a#id` stämmer överens.

`stylesheet.css`:

```css
/* highlight current choice in navigation menu
--------------------------------------------------------

*/
body#me a#me-,
body#report a#report-,
body#guide a#guide-,
body#source a#source- {background:#858585;border:2px solid #656565;}
```

Denna lösning fungerar bra för mindre webbplatser. Nackdelen är att det är en hårdkodad lösning, för varje nytt menyval så måste man uppdatera koden. När det blir fler sidor så är det bättre att finna en flexiblare lösning som innefattar mer PHP-kodande. Men det överlåter vi till en senare övning.

[UPPGIFT]

Lägg till stöd i din me-sida så att den visar vilken sida man för tillfället besöker genom att markera detta menyval.


###6.4 Möjlighet att ändra style i enskilda sidor via `$pageStyle` {#page-style}

Ibland vill jag lägga till style som är specifik för endast en sida. Istället för att ändra i stylesheeten så vill jag inkludera stylen i sidan, inom `<style></style>` taggar. Det finns tillfällen då detta är behändigt.

Jag har definerat en PHP-variabel för detta syfte, `$pageStyle`, den fungerar på samma sätt som `$pageTitle` och `$pageId`. Kika på `me2.php` så ser du ett exempel där jag använder den för att styla bilden, `<figure>` elementet.

* `me2.php` med särskild style för `<figure>`:  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/me2.php'>http://dbwebb.se/htmlphp/me/kmom02/me2.php</a>

Följande kod visar hur `$pageStyle` fungerar.

`incl/header.php`:

```html
<!-- Each page can set $pageStyle to create additional style -->
<?php if(isset($pageStyle)) : ?>
 <style type="text/css">
   <?php echo $pageStyle; ?>
 </style>
<?php endif; ?>
```

Ovanstående `if`-sats skriver ut innehållet i `$pageStyle` om den är definerad och har ett värde skilt från `null`. Innehållet i variabeln omringas av elementen  `<style>` och `</style>`. Värdet på variabeln kan sedan defineras i en sida, tex `me2.php`. 

`me2.php`:

```php
// Define style thats specific for this page
$pageStyle = '
figure { 
 -webkit-border-radius: 10px;
 -moz-border-radius: 10px;
 border-radius: 10px;
 border-color:#5C0A0A;
 -moz-box-shadow: 10px 10px 5px #8A0F0F;
 -webkit-box-shadow: 10px 10px 5px #8A0F0F;
 box-shadow: 10px 10px 5px #8A0F0F;
}
';

```

Ovan kod definerar variabeln och lägger till style så att bildens ram får runda hörn och en tredimensionell skugga. Variabeln måste få sitt värde innan `header.php` inkluderas. 

[UPPGIFT] 

Lägg till stöd för `$pageStyle` i din me-sida och använd den för att testa att det fungerar.


###6.5 Inkludera source.php i din webbplats {#source-php}

Den externa koden som används för att visa källkoden, `source.php`, är numer integrerad i min me-sida. Det är sidan `viewsource.php` som inkluderar `source.php` och skriver ut dess innehåll tillsammans med webbplatsens header och footer.

Detta sker genom en kombination av `include()` och användandet av variabler.

* Se källkoden för `viewsource.php`:    
  <a href='http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=&file=viewsource.php'>http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=&file=viewsource.php</a>

[FIGURE src=/img/htmlphp/kmom02/image07.png caption="Sidan för att visa källkoden är nu integrerad med webbplatsens header och footer."]

Källkoden i filen `source.php` är förberedd för detta. Du kan studera källkoden i `viewsource.php` för att se hur integreringen gick till. Du kan också läsa i kommentarerna i källkoden till `source.php`.

* Källkoden till `source.php`:  
  <a href='http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=src&file=source.php'>http://dbwebb.se/htmlphp/me/kmom02/viewsource.php?dir=src&file=source.php</a>
  
Jag valde att lägga filen `source.php` i en egen katalog, `src/`. Min tanke är att lägga externa PHP-komponenter i `src`-katalogen. Det kan ju bli fler liknande lösningar innan kursen är över. Det blir enklare att ha ordning och reda i katalogstrukturen. Du kan använda min katalogstruktur eller skapa din egna variant. 



[UPPGIFT]

Integrera source.php i din me-sida på liknande sätt som jag gjort via viewsource.php.



7. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Detta räcker för idag. Det blev en blandad mix av framförallt HTML och CSS, men det hanterades även lite PHP.

Se till att du gjort alla uppgifterna. Se också till att du verkligen tar dig tid och studerar litteraturen. Du behöver baskunskapen i HTML och CSS och det får du främst via kurslitteraturen.


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.
2. Genomför momentets alla steg.
3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Beskriv hur väl du kan HTML/CSS (nybörjare, erfaren). Vad anser du om guiderna html20 och css20? Saknar du något i dem eller har du en annan syn på hur html/css skall organiseras? Me-sidan börjar bli en liten webbplats, vad tycker du om dess struktur av filer och kataloger, känns det okey eller ovant?
4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.
5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
