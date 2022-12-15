---
author: mos
category: webbprogrammering
revision:
  "2015-10-26": (A, mos) Första utgåvan inför kursen webapp.
updated: "2015-10-26 13:17:07"
created: "2015-10-01 15:55:54"
...
Att göra en mobilapp av en mobil-anpassad webbplats
==================================

[FIGURE src=/image/snapht15/webapp-listview-images.png?w=c5&a=0,50,82,0&sharpen class="right"]

Säg att vi har en mobilanpassad webbplats, byggd med jQuery Mobile. Hur kan vi då bygga ut den för att den skall ge en större känsla av att vara en mobilapp? Vilka delar kan vi jobba med för att anpassa applikationen och ge den en stil av att vara en ren mobilapp, trots att den är utvecklad i HTML, CSS och JavaScript?

Finns det saker som man bör tänka på när man utvecklar mot en mobil plattform? Vad är det som skiljer ett fokus mot mobila plattformar kontra traditionella desktop-baserade webbläsare.

<!--more-->

Det är många funderingar men vi bygger vidare på vår me-app och ser vilka hinder vi stöter på under vägen.



Förutsättningar {#forutsattning}
--------------------------------------

Artikeln förutsätter att du är bekväm med [jQuery Mobile (jQM)](http://jquerymobile.com/) och att du hittar bland dess demo och i API-specen. Du behöver använda jQm's webbplats som referens och slå upp det som gås igenom, dels som demo och dels i API-specen.

Artikeln förutsätter att du gör så och kommer inte att i detalj förklara de jQm specifika widgetar som används i artikeln.

När du kopierar kod från demon i jQm så notera att de innehåller [*hårda mellanslag*](https://en.wikipedia.org/wiki/Non-breaking_space) som kan göra att exemplena inte fungerar. Du kan behöva ta bort de hårda mellanslagen och ersätta med vanliga. Det är bra med en texteditor som kan visa dig vilken typ av tomma tecken som finns i din text. I Atom ser jag de hårda mellanslagen, men jag får ta bort dem "för hand".



En mobilanpassad webbplats {#om}
--------------------------------------

I artikeln "[Kom igång och skapa en mobil webapp med jQuery Mobile](kunskap/kom-igang-och-skapa-en-mobil-webapp-med-jquery-mobile)" skapade vi en webbplats som var anpassad för att enbart visas i en mobil enhet. Det finns inget som hindrar att den visas i ett större format, men tanken var enbart mobila enheter.

Här kan du [testa resultatet från den artikeln](webapp/repo/example/meapp/). Det är nu den jag tänker utgå ifrån.

Så här ser den ut när man kör den i responsivt läge i Firefox (`shift-ctrl-M`).

[YOUTUBE src=ZpYY82w4ejc width=630 caption="Så här ser grundmaterialet ut."]

Tanken är att vi nu bygger ut den mobilanpassade webbplatsen och gör den mer mobilanpassad. Det vi gör är en mobil webapp som är tänkt att köras i en webbläsare i en mindre terminal.

Genom att testa olika widgetar i jQm tillsammans med konstruktioner i JavaScript, som är/kan vara specifika för mobila enheter, så lär vi oss mer om vad det kan innebära att bygga webappar.




Navbar i footern {#navbar}
--------------------------------------

Det allra första jag vill ha är en meny i footern, en navbar med ikoner på. Jag läser på om navbar-widgeten i jQm och hittar exempelkod som ger mig en navbar i footern, inklusive ikoner. Det ser trevligt ut.

Jag tar koden från demo-sidan och lägger in i min footer.

```javascript
<div id="footer" data-role="footer" data-theme="b">
    <div data-role="navbar">
        <ul>
            <li><a href="#me" data-icon="grid">Hem</a></li>
            <li><a href="#report" data-icon="star">Report</a></li>
            <li><a href="#about" data-icon="gear">About</a></li>
        </ul>
    </div>
</div>
```

Det är delen med `navbar` som läggs till för att få menyn. Det är en enkel länk-lista som är stylad med tema b och ikoner.

Så här blir det.

[YOUTUBE src=wXBG3tdaODE width=630 caption="En navbar i footern."]

När sidan är större än displayen så försvinner navbaren. Låt oss åtgärda det och testa hur det ser ut med en fixerad footer.



Fixerad header och footer {#fixed}
--------------------------------------

Jag vill nu att header och footer alltid skall visas. Header och footer är implementerade som en toolbar widget så jag läser på om den och hittar en möjlighet att göra den till `data-position="fixed"`. Jag uppdaterar min kod för headern och footern.

```javascript
<div id="header" data-role="header" data-position="fixed"  data-theme="b">
<div id="footer" data-role="footer" data-position="fixed" data-theme="b">
```

Nu stannar både header och footer kvar som synliga element, oavsett hur mycket innehåll som finns på sidan. 

[YOUTUBE src=mJELcdcIASk width=630 caption="header och footer är nu fixerade."]

Är detta bra eller inte? Det låter vi vara osagt, så här kan man göra och låt sammanhanget avgöra om det är bra eller ej. Det handlar ju om vad som är smidigt för användaren av webappen.



Webbläsarens header och footer stjäl utrymme {#nothome}
--------------------------------------

Först tittar vi på två skärmdumpar från min iPhone som visar hur den ser ut för tillfället.

[FIGURE src=/image/snapht15/iphone-webapp-not-installed-portrait.png?w=c8 caption="Man ser webbläsarens menyer som stjäl utrymme, här i porträttläge." ]

[FIGURE src=/image/snapht15/iphone-webapp-not-installed-landscape.png?w=w2 caption="Här samma sak i landksapsläger, det blir inte mycket utrymme kvar till appen." ]

Det blir väldigt lite kvar till själva appen. Låt oss kika på möjligheten att utöka appens utrymme.



Installera på hemmaskärmen {#install}
--------------------------------------

Vissa mobila enheter som iOS och Android tillåter att användaren installerar en webbplats, en länk, eller en webapp, på hemmaskärmen. Poängen med det är att användaren skall kunna starta webappen från hemmaskärmen och få en känsla av att appen körs med som en *native* app.

När webappen startas från hemmaskärmen så visas inte webbläsarens vanliga menyer. Trixet med detta är att det inte finns ett standardiserat sätt att göra det på.

Apple med iOS har sina egna varianter om hur man [konfigurerar webbapplikationer](https://developer.apple.com/library/safari/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html). Det kan se ut så här.

```html
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
```

Den första säger att appen tillåts ta hela utrymmet och den andra döljer även mobilens status bar med en svart genomskinlig färg.

[Chrome för Android stödjer att man installerar på hemmaskärmen](https://developer.chrome.com/multidevice/android/installtohomescreen). För närvarande stöds `apple-mobile-web-app-capable` men de har också introducerat en egen variant.

```html
<meta name="mobile-web-app-capable" content="yes">
```

Men för att testa detta behöver vi simulatorer, emulatorer eller hårdvara. Våra tester blir också specifka mot en viss miljö. Det bästa vore naturligtvis om vi kunde skriva samma kod för alla plattformar. Men, [begreppet installerbar webapp](https://w3c-webmob.github.io/installable-webapps/), är ännu inte standardiserat på det sättet som man skulle önska.

Så, låt oss ducka för detta ett litet tag till och fortsätta att använda sådana konstruktioner som fungerar på "alla" plattformar.



###Testa på mobilen och ladda om cachen {#laddaomcache}

Om du får för dig att testa att installera på din egen mobils hemmaskärm så kan du få lite bekymmer vid uppdateringar eftersom mobilen tenderar att cacha saker. Det innebär att man inte kan se när man gör ändringar i sin webbapp. Om det blir ett bekymmer så finns det ett enkelt trick att lägga till en siffra på länken. Så här.

```text
index.html?1
```

När man sedan gjort en uppdatering som inte syns på mobilen så ändrar man länken, `?1` till `?2`, och sidan laddas om. Det kan vara lite klurigt att göra detta när man installerat på hemmaskärmen så troligen är det enklare att bara fortsätta testa direkt i webbläsaren. Där är det ju trots allt enkelt att ändra länken.

Ett tips är att avvakta med att testa att installera på hemmaskärmen tills du är klar med hela övningen. Så slipper du att hålla på med detta extra "krångel" under tiden som du utvecklar.



Expanderande meny {#collapsible}
--------------------------------------

För att förbereda för fler exempel så skapar jag en expanderande meny och lägger den som en del i min befintliga meny. I jQm kallas denna widget för *Collapsible Widget* och den kan implementeras som en del av widgeten *ListView*.

Jag lägger till ett eget menyval för denna del som kan expandera. Det viktiga är `data-role="collapsible"` som jag här sätter på den `<li>` som i sin tur innehåller en lista med menyval.

```html
<li data-role="collapsible" data-iconpos="right" data-inset="false">
    <h3>Tester</h3>
    <ul data-role="listview" data-theme="a">
        <li><a href="#test1">Test #1</a></li>
        <li><a href="#test2">Test #2</a></li>
    </ul>
</li>
```

Så här ser hela menyn ut.

```html
<!--Shared menu for all pages-->
<div data-role="panel" id="menu" data-theme="b" data-display="overlay">
    <ul data-role="listview">
        <li><a href="#me">Me</a></li>
        <li><a href="#report">Redovisning</a></li>
        <li><a href="#about">Om</a></li>
        <li data-role="collapsible" data-iconpos="right" data-inset="false">
            <h3>Tester</h3>
            <ul data-role="listview" data-theme="a">
                <li><a href="#test1">Test #1</a></li>
                <li><a href="#test2">Test #2</a></li>
            </ul>
        </li>
    </ul>
</div><!-- /panel -->
```

En sådan här *collapsible* har som standard en style som ger den en viss padding. Det tar jag bort med CSS-kod så att den passar in i min befintliga lista. CSS-koden hittar jag i demo-koden för en collapsibla listview.

```css
.ui-li-static.ui-collapsible > .ui-collapsible-heading {
    margin: 0;
}
.ui-li-static.ui-collapsible {
    padding: 0;
}
.ui-li-static.ui-collapsible > .ui-collapsible-heading > .ui-btn {
    border-top-width: 0;
}
.ui-li-static.ui-collapsible > .ui-collapsible-heading.ui-collapsible-heading-collapsed > .ui-btn,
.ui-li-static.ui-collapsible > .ui-collapsible-content {
    border-bottom-width: 0;
}
```

Så här kan det se ut när menyn är på plats.

[FIGURE src=/image/snapht15/jqm-collapsible-menu.png?w=w2 caption="En expanderande meny för kommande exempelprogram."]

Nu är jag redo för att skapa små testprogram. 



Storlek och orientering {#storlek}
--------------------------------------

Som ett första exempel så tänker jag göra en sida som visar om webbsidan för tillfället visas i porträtt eller landskapsläge, samt visar hur stor yta som finns tillgänglig.

Jag använder mig av API:et för  [Screen](https://developer.mozilla.org/en-US/docs/Web/API/Screen) och dess  `screen.height` och `screen.width` för att räkna ut hur stor skärmens yta är och vilken orientering den har.

Jag kopplar en eventhanterare till webbläsarens event för omritning, [`window.onresize`](https://developer.mozilla.org/en-US/docs/Web/API/GlobalEventHandlers/onresize). Eventet anropas när man förändrar storleken på webbläsarens fönster, eller som i mitt fall den simulerade skärmen.

Så här kan min kod se ut. Först den nya sidan  som ligger i HTML-sidan.

```html
<div id="orientation" data-role="page">
    <div role="main" class="ui-content">
        <article>
            <h1>Är du i landskap eller portätt-läge?</h1>
            <div id="orientationContent"></div>
        </article>
    </div>
</div>
```

Tanken är att skriva ut detaljer om sidans storlek och orientering och placera informationen i `#orientationContent`.

Funktionen för att göra detta, har jag lagt i `js/main.js` och den ser ut så här.

```javascript
/**
 * Check the orientation and size of the screen.
 *
 * @return void
 */
window.checkSizeAndOrientation = function() {
    var width = window.screen.width,
        height = window.screen.height,
        isPortrait = width < height,
        text = "",
        element = document.getElementById("orientationContent");
    
    text  = "<p>Skärmens storlek är (w x h):<br>" + width + " x " + height;
    text += "<p>Orienteringen är : " + (isPortrait ? "Porträtt" : "Landskap");

    element.innerHTML = text;
};
```

Du kan se att funktionen använder API:et för Screen för att hämta skärmens yta. Funktionen har ett id till det HTML-element som används för att skriva ut resultatet i form av HTML-kod.

Det som också behövs är en eventhanterare som ritar om sidan när orienteringen ändras -- när användaren skiftar från porträtt till landskaps-läge, och vice versa.

```javascript
/**
 * Add eventhandler for the onresize event.
 */
window.onresize = function() {
    window.checkSizeAndOrientation();
};
```

Jag behöver också anropa funktionen en första gång. Så att sidan får ett innehåll till att börja med.

```javascript
// Call the function one to write out current orientation
window.checkSizeAndOrientation();
```

Så här ser sidan ut när jag testar sidan i Google Chrome, Firefox, Firefox OS och Android emulator.

[YOUTUBE src=3QcYLKi74Lo width=630 caption="Storlek och orientering i olika enheter."]



Swipa {#swipe}
--------------------------------------

På mobila enheter finns det andra typer av styrdon, tangentbord och mus ersätts delvis av touch-screenen vilket erbjuder nya sätt att "prata" med enheten. Om man vill få en känsla av en mobil app så behöver man erbjuda användaren ett gränssnitt som svarar på de "nya" sätten att styra appens beteende.

Låt oss lägga till en [eventhanterare för *swipe*](https://api.jquerymobile.com/swipe/). Jag skapar en ny testsida som ser ut så här.

```html
<div id="swipe" data-role="page">
    <div role="main" class="ui-content">
        <article>
            <h1>Upptäck när event händer</h1>
            <div id="swipeContent"></div>
        </article>
    </div>
</div>
```

Tanken är nu att skapa eventhanterare för swish-event. När eventet händer så tänker jag skriva ut en text till webbsidan. Jag börjar med ett klick-event. Det vet jag hur det borde fungera. Lika bra att börja testa på *säker mark* med saker man hanterat tidigare.

Så här ser eventhanteraren ut för klick-eventet. Notera att jag använder [jQuerys sätt att registrera ett event](https://api.jquery.com/click/) här. Det är för att jag kommer göra på samma sätt när det gäller swish-eventen.

```javascript
/**
 * Add eventhandler for the click event.
 */
$(window).on("click", function(event) {
    var swipeElement = document.getElementById("swipeContent");
    swipeElement.innerHTML += "click, ";
});
```

I API-manualen för jQm kan vi läsa om hur man skapar en [eventhanterare för ett swish-event](https://api.jquerymobile.com/swipe/).

Så här blir koden för mig.

```javascript
/**
 * Add eventhandler for the swipe event.
 */
$(window).on("swipe", function(event) {
    var swipeElement = document.getElementById("swipeContent");
    swipeElement.innerHTML += "swipe, ";
});
```

Jag ser i manualen att jQm har stöd för eventen swipeleft och swiperight så jag lägger till eventhanterare för de båda också.

Enligt manualen finns också stöd för event som tap och taphold, touch-skärmens motsvarighet till musens click-event. Men jag testar på en desktop-dator med mus så de eventen får vara.

Så här ser det ut när jag testar i mina olika testverktyg.

[YOUTUBE src=g0Mqr3dqX90 width=630 caption="Swipe-event fungerar på alla mina testverktyg."]

Dessa swipe-event är en konstruktion i jQm som underlättar. Men det finns också standard event som man kan använda, låt oss kika på dem.



Touch event {#touch}
--------------------------------------

Touch event finns som en generell hantering av event och de finns förklarade i MDNs artikel om "[Touch Events](https://developer.mozilla.org/en-US/docs/Web/API/Touch_events)".

Jag är sugen på att testa de eventen så jag skapar en ny testsida, precis som tidigare, och jag lägger till eventhanterare för de event som beskrivs i artikeln. jag väljer att lägga till eventhanterare för eventen `touchstart` och `touchend`.

Jag skriver liknande kod som för swipe-hanteringen och får fram en testsida skriver ut på skärmen varje gång ett event av typen `touchstart` eller `touchend` sker.

Det finns alltså alla möjligheter att fånga variationer på event som är baserade på touch-tekniker. Med hjälp av detta kan jag finslipa mitt gränsnitt till min webapp.



Rita på canvas med event {#canvas}
--------------------------------------

Låt oss leka med event och rita på en canvas. Det är ett bra sätt att öva sig på event och udnersöka hur de fungerar. Tanken är att göra ett litet ritverktyg.

Jag börjar med en sida med en canvas.

```html
<div id="canvas" data-role="page">
    <div role="main" class="ui-content">
        <article>
            <h1>Rita på canvas</h1>
            <canvas id="draw" width="200" height="200" class="draw"></canvas>
        </article>
    </div>
</div>
```

I JavaScript initierar jag canvasen så jag kan rita på den.

```javascript
var canvas = document.getElementById("draw");
var ctx = canvas.getContext("2d");
```

Nu är jag redo att börja rita. Så här kan man koppla ett click-event till canvasen så det går att rita.

```javascript
/**
 * Add eventhandler for click on canvas.
 */
$('#draw').on("click", function(event) {
    ctx.fillStyle = "#FF0000";
    ctx.fillRect(event.offsetX-5, event.offsetY-5, 10, 10);
});
```

Tanken är alltså att rita en röd rektangel om 10x10 pixlar varje gång användaren gör ett click-event.

Så här kan det se ut när man ritat lite.

[FIGURE src=/image/snapht15/webapp-draw-on-canvas.png caption="En glad gubbe med klickade rektanglar i en canvas."]

Du kan nu tänka dig hur ritverktyget skulle se ut om du hade lagt till fler event, till exempel så att du ritar ett streck om du håller nere musen för ett *touchmove* event.



Rita med touchmove event {#rita-move}
--------------------------------------

Jag är sugen på att lägga till så jag kan rita streck i mitt ritverktyg. Eventet touchmove låter som det skulle kunna hjälpa mig. Så länge jag håller nere musen, eller fingret, så ritas en rektangel ut. Nåja, vi testar och ser om det håller att göra så.

Låt oss ta det stegvis.

Först ett event som bara skriver ut något till console.

```javascript
$('#draw').on("touchmove", function(event) {
    event.preventDefault();

    console.log(event);
});
```

Att göra `event.preventDefault()` hindrar eventet från att utföra sitt *standardevent*. I detta fallet spelar det inte så stor roll, men jag lägger dit det ändå. Eventet ska ju bara rita och inget annat.

Nu behöver jag komma på vilken position som eventet har. Det kan vara lite klurigt. Eventet har en position och det har även elementet. Det är inte säkert att eventets position utgår från elementet. Det kan lika gärna utgå från webbsidans 0x0 position.

I detta fallet så får vi en position från toucheventet som ger positionen relativt webbsidans 0x0, vilket inte är samma som 0x0 relativt vår canvas. Så, för att hitta "rätt" position så kombinerar vi elementets position med eventets position.


```javascript
    var offsetX = canvas.offsetLeft;
    var offsetY = canvas.offsetTop;
    var x = event.originalEvent.changedTouches[0].clientX - offsetX;
    var y = event.originalEvent.changedTouches[0].clientY - offsetY;
    console.log("pos " + x + "x" + y);
```

Nu har vi en position och nu sätter vi samman allt i funktionen och ritar ut rektangeln.

```javascript
$('#draw').on("touchmove", function(event) {
    event.preventDefault();

    //console.log(event);
    var offsetX = canvas.offsetLeft;
    var offsetY = canvas.offsetTop;
    var x = event.originalEvent.changedTouches[0].clientX - offsetX;
    var y = event.originalEvent.changedTouches[0].clientY - offsetY;
    //console.log("pos " + x + "x" + y);

    ctx.fillStyle = "#00FF00";
    ctx.fillRect(x-5, y-5, 10, 10);
});
```

När det är klart så kan vi rita både gröna och röda rektanglar, beroende på vilket event som fångas.

[YOUTUBE src=oXbdTyJ3AIs width=630 caption="Ett ritverktyg med touchmove och canvas."]

Låt oss nu kika på något annat.



Lista med klickbart innehåll {#lista}
--------------------------------------

En vanlig konstruktion i en mobil webapp är en listview som innehåller bild och text, när man klickar på ett alternativ i listan så visas en ny sida. 

Det som jag är ute efter kan se ut så här.

<figure class="wrap">
[FIGURE src=/image/snapht15/webapp-listview-images.png?w=c7 class="left" caption="En listview med alternativ."]

[FIGURE src=/image/snapht15/webapp-listview-image-page.png?w=c7 class="" caption="Ett alternativ i listan valdes och visas upp."]
</figure>

Jag vill alltså ha en listwidget med en bild. Det finns sådana exempel i jQm demo och jag tar och kopierar ett av dem och utgår från det.

```javascript
<div id="list" data-role="page">
    <div role="main" class="ui-content">
        <ul data-role="listview" data-inset="false">
            <li><a href="#birds">
                <img src="img/birds.jpg">
                <h2>Mina husdjur</h2>
                <p>Här är mina husdjur som jag brukar prata med.</p></a>
            </li>
            <li><a href="#countryside">
                <img src="img/countryside.jpg">
                <h2>Mitt nya jobb</h2>
                <p>Jag har valt att flytta ut till landet till min lantgård.</p></a>
            </li>
        </ul>
    </div>
</div>
```

För varje listitem behöver jag en egen sida. En sådan sida kan se ut så här.

```javascript
<div id="birds" data-role="page">
    <div role="main" class="ui-content">
        <article>
            <img src="img/birds.jpg">
            <h2>Mina husdjur</h2>
            <p>Här är mina husdjur som jag brukar prata med.</p>
        </article>
    </div>
</div>
```

Det var allt som behövs. Detta är en vanlig konstruktion som är enkel att skapa och det går att göra kraftfulla webappar med denna enkla teknik.



Navigera med swipeleft {#navswipe}
--------------------------------------

Om vi tittar på exemplet från föregående stycke. När man klickar på en listview kommer en sida fram. Sedan vill man gå tillbaka till listviewn igen och behöver göra en back. Visst vore det då bra om man kunde göra en *swipeleft* för att hamna på listan igen och simulera JavaScript-funktionen [`window.history.back()`](https://developer.mozilla.org/en-US/docs/Web/API/Window/history)?

Visst vore det bra. Låt oss testa att kombinera swipeleft med navigering mellan sidor på det viset.

Det första vi behöver är en eventhanterare som läggs till de sidor som skall stödja swipe-navigeringen.

Ett första försök kan se ut så här.

```javascript
/**
* Add eventhandler for the navigate back event.
 */
$('#birds').on("swipeleft", function(event) {
    window.history.back();
    return false;
});
```

Testa det så ser du att swipeleft kommer att navigera tillbaka. Men endast för sidan med id `#birds`.

Hur kan vi då använda samma eventhanterare på flera sidor? Jo, vi behöver markera sidorna på något sätt så vi kan välja ut dem. Jag väljer att lägga till ett data-attribut för detta.

Så här.

```html
<div id="birds" data-swipeleft="back" data-role="page">
```

Det är  data-attributet `data-swipeleft="back"` som jag valt att använda för att identifiera de sidor som skall stödja navigering till föregående sidan med eventet swipeleft.

Nu kan jag uppdatera selectorn i koden som skapar mitt event så den väljer ut alla element som har ett dataattribut som motsvarar `'[data-swipeleft="back"]'`.

```javascript
$('[data-swipeleft="back"]').on("swipeleft", function(event) {
```

Sådär, stiligt. Jag använder dataattribut på samma sätt som jQm gör för att bestämma hur de olika delarna av webappen skall fungera.

Så här kan det se ut när jag använder min listview och navigerar.

[YOUTUBE src=s4QkWOlX5h8 width=630 caption="Min listview fungerar med swipeback event för navigering."]



Måste man använda jQuery Mobiles widgetar? {#custom}
--------------------------------------

Måste man det? Självklart inte. Om du tittar på vad vi åstakommit hittills så är det kanske inte ett stort arbete att skapa något liknande på egen hand. Det som krävs är främst HTML och CSS-kod. 

Men, för att snabbt få fram något som fungerar, något att visa upp, så är bibliotek liknande jQm bra verktyg som snabbt hjälper dig till resultat. Dessutom får man en visst stöd för kompabilitet mellan olika terminaler. Och förenkling att använda touch event, som vi precis såg.

Det finns andra varianter av widgeter som man kan testa, men vi kör vidare på jQm så håller vi oss till en variant. Du får gärna testa andra typer av widgetar om du vill. Känn dig inte bunden av jQm. jQm är bara ett av flera ramverk som du kan använda för att skapa webappar.

Tänk också att du själv kan lägga till CSS för att styla widgetarna på ditt eget vis. Det kan göra att du gör din webapp mer personlig och mindre lik standardutseendet i jQm.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har fortsatt jobba med jQm och vår mobila webapp. Vi har nu en testarea där vi enkelt kan skapa nya testprogram för att pröva olika konstruktioner. Steg för steg så har vi ytterligare bekantat oss med den mobila plattformen som en miljö för webappar.

Du kan testa det slutliga testprogrammet i kursrepot under [`example/meapp2`](webapp/repo/example/meapp2).

Har du [tips, förslag eller frågor om artikeln](t/4742) så finns det en specifik forumtråd för det.
 



