---
author:
    - mos
category:
    - javascript
revision:
    "2013-01-29": "(C, mos) Kommentar om att sätta default width & height i paket 4."
    "2012-11-22": "(B, mos) Mindre justering i exempelprogrammet för lightbox efter Bellas kommentarer."
    "2012-11-15": "(A, mos) Första utgåvan."
...
Kom igång med jQuery
==================================

Här är en liten övning för att snabbt få överblick av vad du kan göra med jQuery. Du behöver ha grundläggande kunskaper i JavaScript och det är bra om du vet vad jQuery handlar om. Övningen är skriven som ett kursmaterial till kursen javascript så den gör vissa förutsättningar att du är bekant med den kursen.

Övningen innehåller ett antal kodexempel och förklaringar till dem. Gå igenom varje kodexempel för sig, läs jQuery's manual, studera källkoden och fundera på hur du kan göra det bättre på egen hand. Sen testar du själv. Ungefär så, jobba igenom hela övningen och du får koll på hur du själv kan skapa både lightbox, galleri, slideshow och till slut en egen jQuery plugin.

Vad mer behöver du veta om jQuery :-P ?

<!--more-->

[FIGURE src=/image/kunskap/javascript/nine-small-packages.jpg?w=w1&q=70 caption="En hög med små paket, öppna dem för att komma igång med jQuery."] 





Då kör vi {#inledning}
--------------------------------------------------------

Sätt dig tillrätta och se till att du har ett par timmar tillgodo. Detta dokument innehåller en del text och en del övningar. Vid varje övning får du ledtrådar hur du kan skapa ett exempel själv. När du är klar med ditt exempel så kan du tjuvkika på mitt och även studera min källkod. Jämför alltid din egen lösning med min kod, se vad som skiljer och försök förstå på vsrilket sätt de skiljer sig åt. Lyckas du med det så lär du dig mest.

När du är klar kommer du ha en hel del kodexempel som du kan gå tillbaka till och "låna" koden av.

Du bör ha läst [kursboken om jQuery](kunskap/boken-jquery-novice-to-ninja) innan du ger dig på detta. Eller på annat sätt inhämtat kunskaper om grunderna i jQuery.Annars saknar du den viktiga basen att stå på. Du kan klara övningen ändå men det kommer inte att fastna på samma sätt, och du vill ju att kunskapen skall fastna, eller hur?


Nio små exempel med jQuery {#exempel}
--------------------------------------------------------

###Inkludera jQuery och använd `.ready()` {#inkludera}

I första kursmomentet i kursen javascript började vi använda jQuery. Vi valde att använda funktionen `.ready()` för att exekvera vår JavaScript kod när hela DOM-trädet hade laddats. Du kan läsa om det här:

* [Inkludera jQuery skriptet och använd `.ready()`funktionen](javascript/kmom01/intro#jquery).  

Detta bör innebära att du redan inkluderat jQuery i dina exempelprogram och att du använder funktionen `.ready()`.

Som alla programmeringsspråk så har även jQuery en referensmanual. Det är som vanligt av yttersta vikt att vi blir kompisar med den. Googla hej vilt men vill du ha facit så finns det en plats, den rätta platsen, refmanualen. Ta och bekanta dig med den, redan nu, genom att kika på hur funktionen `.ready()` beskrivs.

* [Referensmanualen för jQuery](http://api.jquery.com/)

* [Slå upp funktionen `.ready()` i jQuerys referensmanual](http://api.jquery.com/ready/)



###Följ övningen genom att göra ditt egna exempel {#ide}

Denna övning består av nio övningar där jag tänker använda olika delar av jQuery. Tanken är att du gör ett exempel åt gången, läs hur jag gjort, studera exemplet och koden. Sedan gör du ditt egna exempel.

Varje exempel ryms inom en liten låda där jag stoppat in lite innehåll i form av rubrik, text och bild. Varje låda ser ut ungefär så här i grundstrukturen.

*`index.php`*

```html
<div id='box1' class='box'>
<img src='/image/mikael-roos/me-1.jpg' alt='' />
<h1>Mitt liv som liten</h1>
<p>Se vad roligt man kan ha när man är liten.</p>  
</div>
```

Sedan har jag gett lådorna lite färg och form och placerat ut dem på webbsidan. Det gör jag med jQuery. Så här ser mina lådor ut och de innehåller all kod för denna övning.

* [javascript/lekplats/nine-small-examples-to-get-started-with-jquery](javascript/lekplats/nine-small-examples-to-get-started-with-jquery)

Men låt oss ta det steg för steg.
 


1. Att välja ut element, hantera event och modifiera element {#ovning1}
---------------------------------------------------

En av jQuery's styrkor är förmågan att välja ut ett eller flera element ur webbsidans DOM-träd. När elementen är utvalda kan man påverka dess style. På detta sätt kan kan man förändra sidans utseende.

En annan av styrkorna är att hantera händelser (events). Genom att koppla kod till ett event kan vi få saker att förändra sig genom att någon klickar runt på webbsidan.

Glöm det där med att bara klicka på länkar eller knappar, här klickar vi på allt möjligt, så länge vi kan fånga eventen.

Gör nu ett eget exempel där du skriver lite text, en rubrik och en bild. När du klickar på något av elementen så skall du fånga eventet och byta bakgrundsfärg på det element du klickat på.

Koden för detta skulle kunna se ut så här: 

```javascript
$(document).ready(function(){

  $('#box1 h1, #box1 p, #box1 img').click(function() {
    $(this).toggleClass('dark');
    console.log("toggle!");
  });
  
});
```

Relevanta funktioner i jQuery äro följande (se till att du kollar in deras sida i manualen):

* [click](http://api.jquery.com/click)
* [toggleClass](http://api.jquery.com/toggleClass)

Kika på mitt exempel, numero uno, nummer ett. Där kan du testa hur min variant fungerar och studera dess källkod. Eller kika på videon.

[YOUTUBE src=9ZEuWi5nDU0 width=613 caption="Första paketet handlar om att välja element och ändra dess style."]

Så, nu har du förstått hur exemplen fungerar, eller hur? Då går vi vidare.



2. Event propagering och att stoppa den {#ovning2}
---------------------------------------------------

Jag vill utforska hanteringen av event och framförallt det som kallas event propagering. 

Jag lägger en eventhanterare på hela lådan och jag lägger ytterligare en på bilden. När man klickar på hela lådan så ändras bakgrundsfärgen. När man klickar på bilden så ändras dess storlek, men, dessutom anropas den eventhanterare som finns för bilden. Det innebär alltså att om man klickar på bilden så är det ett event som först påverkar bilden och därefter lådan. Man kan säga att eventet bubblar upp i DOM trädet.

För att hindra ett sådant beteende kan man använda metoden `event.stopPropagation()`. Det är alltså möjligt att lägga in ett anrop till den funktionen i eventhanteraren för bilden. Gör man det så påverkas inte själva lådan längre.

**Koda loss nu.** 

Skapa ditt egna exempel där du visar hur propagering av event sker, hur du fångar det och hur du stoppar det från att flöda vidare upp i kedjan.

* Läs snabbt om metoden för att [stoppa propagering av eventkedjan](http://api.jquery.com/event.stopPropagation/).

* Skumma även innehållsförteckningen över de [olika funktioner som finns för att hantera events](http://api.jquery.com/category/events/).


[YOUTUBE src=7x92LloKDkY width=613 caption="Så här fungerar event propagering."]



3. Lägga till och ta bort element {#ovning3}
---------------------------------------------------

Med jQuery kan vi skapa nya element och lägga till dem i dokumentet, vi kan även ta bort dem. Principen är enkel, man skapar ett nytt element och väljer var man vill placera det. Man använder samma grundstruktur på anropet som tidigare, skillnaden är att vi här skapar en paragraph istället för att välja ut en.

```javascript
// Select all paragraphs in the document and make them pink.
$('p').addClass('pink');

// Create a new paragraph and add it after the element that has #someId
$('<p>This is a new paragraph</p>').insertAfter('#someId');
```

Ser du skillnanden mellan de två anropen ovan? Likt men ändå två skilda saker, den första väljer ut alla paragrafer i dokumentet och den andra skapar en ny paragraf.

Du kan även ta bort element från dokumentet.

```javascript
// Add an element and add handler to remove the element on click
$('<div></div>')
  .insertAfter('#palette')
  .click(function() {
    $(this).remove();
  });
```

**Koda loss nu.** 

Skapa nu ett exempel där du har en knapp och varje gång du trycker på knappen läggs det till ett element i dokumentet. När du klickar på det nya elementet så tas det bort. Kan du lösa det utan att tjuvkika på min kod? Testa gärna mitt exempel men vänta lite med att tjuvkika på min kod tills du testat själv.

I denna övning är följande funktioner relevanta att slå upp i manualen:

* [insertBefore](http://api.jquery.com/insertBefore/)
* [insertAfter](http://api.jquery.com/insertAfter/)
* [remove](http://api.jquery.com/remove/)
* [keypress](http://api.jquery.com/keypress/)

[YOUTUBE src=4UpSHiyUIyk width=613 caption="Så här lägger vi till och tar bort element ur DOM-trädet."]



4. Läsa och ändra storleken på ett element {#ovning4}
---------------------------------------------------

Att räkna ut bredd och höjd på ett element kan vara lite klurigt, man måste tänka på både marginaler, ramar, padding och själva innehållet. För att hantera detta har jQuery ett par inbyggda funktioner som du kan kika på:

* [width](http://api.jquery.com/width/)
* [height](http://api.jquery.com/height/)

Det kan också vara av intresse att kika på följande funktionern och se hur de skiljer sig mot `width()` och `height()`.

* [outerWidth](http://api.jquery.com/outerWidth/)
* [innerWidth](http://api.jquery.com/innerWidth/)
* [outerHeight](http://api.jquery.com/outerHeight/)
* [innerHeight](http://api.jquery.com/innerHeight/)

Du kan också definera och läsa av ett elements dimensioner med funktionen `css('height')` och som du kan läsa i manualen så skiljer de sig lite åt i sitt beteende. 

* [css](http://api.jquery.com/css/)

[INFO]
**Bra att veta**

Om du läser av en CSS property som inte är satt så kommer du att få ett nollvärde returnerat från `css()`-funktionen. Det kan därför vara säkrare att använda funktionerna för `height()`och `width()`.
[/INFO]

[INFO]
**Sätt default width & height**

Se till att bilden har en default width & height, innan du försöker ändra dess storlek. Om den inte har det så kommer webbläsaren att gissa sig till det som saknas och det blir oväntade effekter. För min del så hårdkodade jag bildens mått i `img` elementet, men det finns fler sätt att uppnå samma resultat. Du kan tex räkna ut bildens nuvarande storlek och sedan sätta den med jQuery. 
[/INFO]


**Koda loss nu.** 

Gör ett exempel där du via knappar kan ändra bredd och höjd på ett element, kika gärna på mitt exempel men vänta med att kika på källkoden tills du är klar (eller mörbultad).

[YOUTUBE src=deXgBTiExgs width=613 caption="Att hantera storleken på ett element kan vara klurigt."]



5. Grundläggande animeringar {#ovning5}
---------------------------------------------------

Visst är det roligt med animeringar? Kanske kommer ni ihåg det gamla HTML-elementet `<blink>` som gav oss blinkande texter? Nåväl, så roligt ska vi inte ha det och där har vi också svårigheten med animering. Lite lagom kan vara bra men blir det för mycket så blir det helt fel.

I jQuery's core finns det ett par enklare animeringar inbyggda. Kika snabbt på följande i manualen.

* [slideToggle](http://api.jquery.com/slideToggle/)
* [fadeToggle](http://api.jquery.com/fadeToggle/)

Du kan även söka i manualen på `fade`eller `slide` så ser du ett par varianter av dessa funktioner.

**Koda loss nu.** 

Gör ett exempel som visar hur du använder `slideToggle()` och `fadeToggle()`, eller dess syskon-funktioner, allt för att leka runt med lite animeringar på din webbsida.

[YOUTUBE src=47RzLDfXgDQ width=613 caption="Mikael animerar sitt lilla exempelprogram."]



6. En lightbox för att visa bilder {#ovning6}
---------------------------------------------------

Ibland vill man visa upp en större version av en bild när någon klickar på den. Man vill visa upp den framför nuvarande webbsida utan att ladda om sidan. Detta brukar kallas lightbox och det finns ett antal färdiga lightbox-pluginer till jQuery. Men, vi skall göra vår egen för att förstå hur de är uppbyggda.

Det vi har lärt oss på de tidigare övningarna kommer att hjälpa oss i mål med uppgiften.

Första steget till en lightbox är att skapa en halvt genomskinlig `div` som täcker hela sidan. Här gäller det att räkna rätt på storleken av sidan så att man får rätt på bredd och höjd.

Steg två är att visa en laddnings-bild som som tyder på att något laddas. En sån där snurrande, animerad bild brukar fungera bra. 

Googla på "[loader png]https://www.google.se/search?q=loader+png)" eller "[animated loader](https://www.google.se/search?q=animated+loader)" så får du hjälp att hitta, eller skapa, din egen `loader.png`.  

När mål-bilden är färdigladdad så visar vi upp den och döljer laddnings-bilden.

När användaren är klar så klickar han på bilden eller vid sidan av bilden och så skall allt återgå till ursprungsläget. Det kan vara bra att lägga till ett liknande event för `esc`-tangenten också.

[Kursboken om jQuery](kunskap/boken-jquery-novice-to-ninja) har ett kapitel om hur man bygger en lightbox och mitt exempel utgår från det kapitlet.

Jag använde ett par nya funktioner när jag gjorde exemplet. Du kan ta en titt på dessa i manualen, du kan behöva dem.

* [scrollTop](http://api.jquery.com/scrollTop/)
* [animate](http://api.jquery.com/animate/)
* [hide](http://api.jquery.com/hide/)
* [attr](http://api.jquery.com/attr/)
* [remove](http://api.jquery.com/remove/)

Så här kan det se ut när det är klart.

[YOUTUBE src=_MjUuqofhyE width=613 caption="En lightbox är bra att ha i sin verktygslåda när man bygger webbplatser."]

**Koda loss nu** och bygg din egna lightbox. Försök själv och se hur långt dina vingar bär dig. Annars tar du hjälp av exempel och källkod. Det är en bra idé att söka lite på "jquery lightbox" och kika på ett par exempel, innan du börjar ditt kodande, kanske kan du hitta lite inspiration?



7. Ett galleri av bilder {#ovning7}
---------------------------------------------------

Att visa upp en samling av bilder, ett galleri, är en vanlig funktion på en webbplats. Det kan låta som en stor uppgift men det kräver inte så mycket kod för att få upp ett enklare  galleri. Skal man använda det i en riktig webbplats bör man ta sig en funderare på om man vill skriva koden själv eller om man vill använda en av de många pluginer som hanterar galleri-funktioner. 

Men här skall vi koda vårt eget galleri, allt för att förstå hur det kan fungera, och vem vet, vi kanske kan bygga nästa världsledande galleri-plugin :-D ?

Jag använde ett par nya funktioner när jag gjorde exemplet. Du kan ta en titt på dessa i manualen eftersom du kan behöva dem.

* [each](http://api.jquery.com/each/)
* [first](http://api.jquery.com/first/)
* [trigger](http://api.jquery.com/trigger/)

Så här ser mitt galleri ut när det blev klart.

[YOUTUBE src=oPZ20VOQ58I width=613 caption="En lightbox är bra att ha i sin verktygslåda när man bygger webbplatser."]

**Koda loss nu** och bygg ditt eget galleri. Försök själv och se hur långt dina vingar bär dig. Annars tar du hjälp av exempel och källkod. Liksom i förra övningen så är det en bra idé att söka lite på "jquery gallery" och kika på ett par exempel, innan du börjar ditt kodande, kanske kan du hitta lite inspiration?



8. En slideshow till framsidan {#ovning8}
---------------------------------------------------

Många webbplatser vill visa ett antal bilder på förstasidan och byta dem med visst intervall, en form av "timad slideshow". Ibland kan även användaren klicka på dessa för att välja bild. En sådan slideshow skall vi nu göra.

Tanken är att välja ut vissa bilder, låt säga fyra stycken. Placera dem i en container och stacka dem ovanpå varandra med hjälp av `z-index`. Vi använder JavaScript-funktionen `setInterval()` för att byta bild med jämna mellanrum.

* JavaScript funktioner för att sätta på och stänga av ett intervall:    
  [window.setInterval](https://developer.mozilla.org/en-US/docs/DOM/window.setInterval)  
  [window.clearInterval](https://developer.mozilla.org/en-US/docs/DOM/window.clearInterval)

Jag använde ett par nya funktioner när jag gjorde exemplet. Du kan ta en titt på dessa i manualen eftersom du kan behöva dem.

* [length](http://api.jquery.com/length/)
* [eq](http://api.jquery.com/eq/)
* [siblings](http://api.jquery.com/siblings/)

Så här ser min slideshow ut när den blev klart.

[YOUTUBE src=ZrV8kBZBErs width=613 caption="En lightbox är bra att ha i sin verktygslåda när man bygger webbplatser."]

**Koda loss nu** och bygg din egen slideshow. Försök själv och se hur långt dina vingar bär dig. Annars tar du hjälp av exempel och källkod. Liksom i förra övningen så är det en bra idé att söka lite på "jquery slideshow" och kika på ett par exempel, innan du börjar ditt kodande, kanske kan du hitta lite inspiration?




9. Gör en egen jQuery plugin {#ovning9}
---------------------------------------------------

När man börjar skriva kod med jQuery så kommer man till en nivå där man vill återanvända sin kod. Då kan det vara dax att paketera koden i en jQuery plugin. Detta är ett sätt att bygga ut jQuery och ett bra sätt att organisera din egen kod. På detta sätt kan det bli lättare att återanvända moduler som du bygger.

Så här kan du skapa en egen plugin till jQuery, se följande kod som en mall för din plugin, men den är också en fungerande plugin, `fadeInOut()` som gör en `fadeOut()` följt av en `fadeIn()` på valda objekt. 

```javascript
(function($) {

  $.fn.fadeInOut = function(options) {
    options = $.extend({}, $.fn.fadeInOut.defaults, options);
    return this.each(function() {
      $(this).fadeOut(options.duration, function() {
        $(this).fadeIn(options.duration)});
    });
  };

  $.fn.fadeInOut.defaults = {
    'duration': 'fast',
  }

}) (jQuery);
```

För att sedan använda pluginen så är det bara att göra som med alla andra funktioner och här kan jag nu ändra de default-värden som finns genom att skicka in ett objekt till funktionen.

```javascript
$('#box9 img.example').click(function() {
  $(this).fadeInOut({'duration':2000});
});
```

Pröva exemplet och studera även följande nya funktioner som använts i exemplet.

* [jQuery.extend](http://api.jquery.com/jQuery.extend/)

Det är en riktigt god idé att även studera jQuery's manual för att skriva en egen plugin.

* [Plugins/Authoring](http://docs.jquery.com/Plugins/Authoring)

**Koda loss nu** och skapa en egen plugin. Försök själv och se hur långt dina vingar bär dig. Annars tar du hjälp av exempel och källkod. Du kan själv välja idé för din plugin. Gör en liten och enkel, det är ett bra sätt att komma igång.

Så här ser mitt exempelprogram ut.

[YOUTUBE src=yjvpHvIzqKc width=613 caption="En lightbox är bra att ha i sin verktygslåda när man bygger webbplatser."]



Avslutningsvis {#avslutning}
--------------------------------------------------------

Bra jobbat! Du har kämpat dig igenom de första stegen för att bemästra jQuery. Du är nu redo för lite större utmaningar. Glöm inte att gå tillbaka hit för att dubbelkolla och låna kod. Det är alltid enklare att ha något att utgå ifrån.
