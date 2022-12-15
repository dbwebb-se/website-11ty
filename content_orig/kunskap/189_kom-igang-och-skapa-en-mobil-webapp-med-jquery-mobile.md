---
author: mos
category: webbprogrammering
revision:
  "2015-10-26": (B, mos) Ändrade var jquery sparades.
  "2015-09-24": (A, mos) Första utgåvan inför kursen webapp.
updated: "2015-10-26 15:12:51"
created: "2015-01-28 14:34:10"
...
Kom igång och skapa en mobil webapp med jQuery Mobile
==================================

[FIGURE src=/image/snapht15/logo-jquery-mobile.png?w=c5&bgc=00ff00 class="right"]

Mobilen och läsplattan är ett alltmer vanligt verktyg för att komma åt webben. En vanlig traditionell webbplats behöver ett komplement som fungerar på de mobila plattformarna och alternativen är flera.

Låt oss här undersöka ett av de alternativen, en mobil webapp, byggd som en traditionell webbplats men med enbart fokus på de mobila plattformarna.

Vi tar hjälp av ramverket jQuery Mobile för att sätta ihop koden till denna webapp i form av HTML, CSS och JavaScript.

<!--more-->



Om jQuery och jQuery Mobile {#om}
--------------------------------------

JavaScript har traditionellt ett problem med kompabilitet mellan olika webbläsare och det finns konstruktioner i JavaScript som kräver att man skriver mycket kod. Det är sådant som [jQuery](http://jquery.com/) råder bot på. Det löser kompabilitetsproblem och det underlättar när vi skriver JavaScript i webbläsaren.

jQuery har fler projekt som är fokuserade på vissa lösningar. Det finns [jQuery UI](http://jqueryui.com/) som erbjuder ett antal widgets för den som bygger grafiska användargränssnitt och det finns [jQuery Mobile](http://jquerymobile.com/) som fokuserar på mobila plattformar.

För denna övningen tänkte jag använda mig av jQuery Mobile.

jQuery Mobile säger sig vara ett system för HTML-baserade användargränssnitt med fokus på webbplatser för mobila enheter. Deras webbplats har en del exempel och det är en bra startpunkt för att se vad du kan förvänta dig.

Men låt oss hoppa rätt in i hur man gör, så lär vi oss efterhand.



En mobil webbapp för me {#me}
--------------------------------------

Jag tänkte göra en me-app. En app om mig själv. Appen får innehålla en sida som beskriver mig själv, en sida om redovisningarna och en sida om appen.

Det kan se ut så här när vi är klara.

[YOUTUBE src=67biiKAS5BI width=630 caption="Min me-app med fokus på mobilen."]



Ladda ned jQuery och jQuery Mobile {#download}
--------------------------------------

Jag går till [download-delen av jQuery Mobiles webbplats](https://jquerymobile.com/download/) och väljer att ladda ned senaste releasen. När denna artikeln skrivs så är det version 1.4.5. Men du tar den allra senaste versionen.

Jag laddar ned via terminalen och lägger in jquery parallellt med mitt [kursrepo](dbwebb-cli/clone).

```bash
cd dbwebb-kurser
mkdir jquery
cd jquery
wget http://jquerymobile.com/resources/download/jquery.mobile-1.4.5.zip
unzip jquery.mobile-1.4.5.zip
```

Det blev många filer på en gång. En fördel med att ladda hem hela biblioteket är att du nu har tillgång till alla demos direkt i katalogen `demos/`. Du kan öppna dem i en webbläsare genom att dubbelklicka på dem.

Det är alltid intressant att se hur ett libb likt dessa distribueras och vad det består av.

jQuery Mobile är en utbyggnad av jQuery och behöver därför jQuery för att fungera. Jag väljer därför att ladda ned den [senaste versionen av jQuery](http://jquery.com/download/) och sparar den lokalt i samma katalog. jag plockar ned både den komprimerade varianten och den okomprimerade som är bättre när man utvecklar.

```bash
wget http://code.jquery.com/jquery-2.1.4.js
wget http://code.jquery.com/jquery-2.1.4.min.js
```

[WARNING]
**jQuery Mobile stödjer inte allra senaste versionen av jQuery**

De versionerna som jag använder ovan fungerar tillsammans. Men i skrivande stund (2016-11-22) så fungerar jQueryMobile inte med den allra senaste versionen av jQuery. Välj därför de versionerna du ser ovan, eller dubbelkolla vad som gäller för tillfället, eftersom sånt ändrar sig över tiden.

[/WARNING]

<del>Du väljer att plocka ned den allra senaste releasen som finns.</del>

Så, nu har jag alla filer lokalt. Det är bra då jag kan jobba med dem lokalt, utan att vara uppkopplad.



###Spara undan de filer som behövs i me-katalogen {#jquery-me}

När du jobbar med exempelprogrammen i kursen så behöver de tillgång till jquery.js, jquery.mobile.js och jquery.mobile.css. För att allt skall fungera smidigt så samlar du de filerna i en egen katalog under `me/lib/jquery`.

Så här.

```bash
# Gå till roten av kursrepot, 
# katalogen jquery bör ligga parallellt med kursrepot.
# Annars får du justera sökvägen.
cp ../jquery/jquery-2.1.4.js me/lib/jquery
cp ../jquery/jquery.mobile-1.4.5.js me/lib/jquery
cp ../jquery/jquery.mobile-1.4.5.css me/lib/jquery
```

Så här ser det ut för mig i katalogen `me/lib/jquery/`.

```bash
$ tree me/lib/jquery/
me/lib/jquery/
├── jquery-2.1.4.js
├── jquery.mobile-1.4.5.css
└── jquery.mobile-1.4.5.js

0 directories, 3 files
```

Bra, nu tänker jag använde de filerna i mina exempelprogram och de är en del av min me-katalog så de följer med till studentservern när jag publicerar min me-katalog.

Innan jag är helt klar så laddar jag upp samtliga filer i katalogen `lib` till studentservern.

```bash
$ dbwebb publish lib
```

Nu ligger filerna på rätt plats, både lokalt och på studentservern. Låt oss nu göra en sida så vi använder dem.



En webbsida i jQuery Mobile {#sida}
--------------------------------------

Låt oss göra en första sida med jQuery Mobile. 



###En katalogstruktur {#katalog}

Först behöver vi en katalogstruktur och jag tänker skapa den direkt i kursrepot.

```bash
# Gå till kursrepot
cd me/kmom01/meapp
mkdir js css img
touch index.html js/main.js css/style.css
```

Nu har jag en katalogstruktur som ser ut så här.

```bash
$ tree .
.
├── css
│   └── style.css
├── img
├── index.html
└── js
    └── main.js

3 directories, 3 files
```

Det är en vanlig struktur för en webbplats som använder sig av HTML, CSS, JavaScript och bilder.



###En mall för index.html {#mall}

Nu behöver vi en mall till `index.html`, en mall där allt knyts ihop. Du kan utgå från följande.

```html
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Me-appen i webapp</title>

    <link rel="stylesheet" href="../../lib/jquery/jquery.mobile-1.4.5.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <article>
        <h1>Om Mig</h1>

        <p>Hej, jag heter Mikael Roos och är lärare på denna kurs som jag valt att kalla för smeknamnet <i>webapp</i>.</p>
    </article>


    <script src="../../lib/jquery/jquery-2.1.4.js"></script>
    <script src="../../lib/jquery/jquery.mobile-1.4.5.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
```

Som du ser så är det en vanlig HTML-sida där vi inkluderar stylesheet från jQuery Mobile tillsammans med vår egen stylesheet `style.css`. Sedan inkluderar vi JavaScript för jQuery, jQuery Mobile och vårt eget `main.js`.

Använd xampp för att kolla på din fil webbläsaren. Din sida kan se ut så här.

[FIGURE src=/image/snapht15/jquery-mobile-index1.png caption="En första sida i jQuery Mobile."]

En bra start.

Om du vill publicera den till studentservern så kör du följande och klickar på länken som kommer fram sist.

```bash
$ dbwebb publish meapp
```

Pröva nu att bygga vidare på innehållet i me-sidan så det blir ungefär så här. Eller bättre.

[FIGURE src=/image/snapht15/jquery-mobile-index2.png caption="En uppdaterad sida i jQuery Mobile."]

Lägg till innehåll, bild, style och eventuell js, som du själv anser blir bra.

Jobba lokalt eller mot studentservern. Du väljer själv.



Om viewport {#viewport}
--------------------------------------

Det som jag ännu inte förklarat i `index.html` ovan är meta-elementet för *viewport*. Låt oss då göra det.

Följande kontruktion består av två delar, `width` och `inital-scale`.

```html
<meta name="viewport" content="width=device-width, initial-scale=1">
```

Konstruktionen berättar för webbläsaren att använda den mobila enhetens bredd som den verkliga bredden. Det är vanligt att mobila enheter simulerar en bredd som är större än den verkliga fysiska bredden. 

Ta till exempel en iPhone 6 som har en verklig bredd av 375 pixlar. Men när den visar en vanlig webbplats så simulerar den att bredden är 980 pixlar. Resultatet blir att din webbplats skalas om. Det är bra i vissa fall, som när man visar en vanlig webbplats på en mindre terminal. Men när man designar för mobilen först, så vill man använda den verkliga bredden.

Kika på följande video så ska jag visa dig skillnaden mellan att använda viewport och inte.

[YOUTUBE src=wK9GCWe7LvA width=630 caption="Ett exempel med och utan viewport."]

Man kan *pinch-zooma* som det är nu, eller dubbelklicka på ett element för att zooma in det. Men detta beteende går att stänga av med konstruktion `maximum-scale=1`. Det tänker jag göra så att min me-app beteer sig lite mer som en native app.

```html
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
```

Är det bra eller inte att stänga av möjligheten att zooma? Ja, det beror hur du vill att användaren skall kunna använda din app. Du kan göra vilket som.

Bra, då har vi denna biten klar.



En sida {#page}
--------------------------------------

Låt oss bekanta oss med begreppet *pages* så som det fungerar i jQuery Mobile. Gå till demosidan och läs igenom artikeln med rubriken "Pages".

Vi har redan förberett det mesta, utom att wrappa sidan i den konstruktion som krävs för en *page*, här representerad av `data-role="page"`.

```html
<div data-role="page">

	<div data-role="header">
		<h1>Page Title</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
		<p>Page content goes here.</p>
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page -->
```

Jagt uppdaterar min sida med den strukturen.

Så här blev det för mig när jag öppnar sidan via min lokala webbserver. 

[FIGURE src=/image/snapht15/jquery-mobile-index3.png?w=w2 caption="Nu i den av jQuery Mobile önskade strukturen för *pages*."]

Du kan se den tomma *Page Title* överst och likaså finns det en tom *Page Footer* längst ned på sidan. Men det ska vi snart fixa till.



Flera sidor {#multipage}
--------------------------------------

Låt oss skapa fler sidor. En HTML-sida som kan innehålla flera *pages*. En *multi-page*, som jQuery Mobile kallar det.

Det som är viktigt är att ge varje sida ett id, så här.

```html
<div id="me" data-role="page">
    <!-- page content -->
</div>

<div id="report" data-role="page">
    <!-- page content -->
</div>

<div id="about" data-role="page">
    <!-- page content -->
</div>
```

Nu uppdaterar jag min sida så att den innehåller tre pages där varje page har ett eget id. jag fyller på med lite relevant text så att det ser bra ut.



###Navigera mellan sidor {#navigate}

Så, vi har nu en HTML-sida med tre jQuery mobile pages. Hur kan vi navigera mellan dem? Jo, det finns en i jQuery Mobile inbyggd navigering genom att ange sidans id.

Pröva att öppna upp din sida i webbläsaren och lägg därefter till något av följande i slutet på länken.

```text
#me
#report
#about
```

Så här ser det ut för mig med #report och #about.

[FIGURE src=/image/snapht15/jquery-mobile-report.png?w=w2 caption="Här är min redovisnings-sida via länken #report."]

[FIGURE src=/image/snapht15/jquery-mobile-about.png?w=w2 caption="Här är min om-sida via länken #about."]

jQuery Mobile använder alltså id som ett sätt att navigera mellan sidorna. Det är ett inte helt ovanligt sätt att navigera lokalt på klientsidan. Vi kan kalla den en form av routing på klientsidan.



Gemensam header och footer {#toolbar}
--------------------------------------

Vi har nu tre sidor som innehåller var sina headers och footers. Låt oss istället skapa en gemensam header och en gemensam footer. jQuery Mobile har en Toolbar widget som kan hjälpa oss med detta.

Först plockar vi bort de element för header och footer som ligger i respektive sida. 

Sedan lägger vi till två element, direkt under `<body>`, som skall representera den globala headern och footern.

```html
<body>
    <div id="header" data-role="header" data-theme="b">
        <h1>Me-app i webapp</h1>
    </div><!-- /header -->

    <div id="footer" data-role="footer" data-theme="b">
        <h1>Copyright 2015 by Mikael Roos</h1>
    </div><!-- /footer -->
```

Vi måste berätta för dessa två element att de skall agera som en "Toolbar widget". Det löser vi med JavaScript.

I skriptet `js/main.js` lägger vi till följande.

```javascript
(function () {
    'use strict';

    // Add shared header and footer as a toolbar.
    $("#header").toolbar();
    $("#footer").toolbar();
})();
```

Med dessa metodanrop så ser vi till att header och footer finns med på varje sidvisning, som en global header och footer.

Du kan läsa om "Toolbar widget" i manualen på demo sidan.

Du kan också läsa om ["Toolbar widget" på API-sidan](http://api.jquerymobile.com/toolbar/).



Tema {#tema}
--------------------------------------

Som du kan se av HTML-koden i föregående stycke, så har jag lagt till attributet `data-theme="b"` vilket ger ett visst utseende på header och footer. Du kan läsa om Temat i demo sidan och på [API-sidan](http://api.jquerymobile.com/theme/).

jQuery Mobile har något de kallar *ThemeRoller* vilket ger dig möjligheten att skapa ett eget utseende i form av ett tema.

I utgångsläget har du två standardteman att välja på, a och b.



Meny {#meny}
--------------------------------------

Det vore trevligt med en meny för att navigera mellan sidorna. Jag vill ha en meny som lämpar sig i mobila enheter. jQuery Mobile har något de kallar för "Panel" och det är en sådan jag tänker använda.

Läs in dig på vad du kan göra med en Panel, du hittar infon på demo-sidan och på API-sidan. 

Efter lite läsande kommer jag fram till att följande är bra att utgå ifrån.

```html
<div data-role="panel" id="menu" data-theme="b">
    <ul>
        <li><a href="#me">Me</a></li>
        <li><a href="#report">Redovisning</a></li>
        <li><a href="#about">Om</a></li>
    </ul>
</div><!-- /panel -->
```

Jag skapar alltså en panel med en lista av länkar. Jag använder samma tema som tidigare och jag ger strukturen ett id av `#menu`.

Panelen som nu ligger som en extern panel, måste initieras. Det gör jag i `js/main.js`, på samma sätt som med header och footer.

```javascript
// Add shared panel as a panel.
$("#menu").panel();
```

När man klickar på en länk som pekar på `#menu` så kommer jQuery Mobile att automatiskt öppna panelen.

Så, jag behöver en länk att klicka på, en länk som öppnar menyn. Jag väljer att lägga den i headern.

```html
<div id="header" data-role="header" data-theme="b">
    <a href="#menu">Menu</a>
    <h1>Me-app i webapp</h1>
</div><!-- /header -->
```

Så där ja. Låt oss se hur det kan se ut så här långt.

[YOUTUBE src=_6NPEZmSVBk width=630 caption="Hur fungerar panelen i Mikaels me-app."]

Det var grunden. Det är också grunden i hur du lägger till övriga widgetar från jQuery Mobile. Snart är det bara att fortsätta att "klippa och klistra".



###Att styla en knapp {#style-knapp}

En styrka med jQuery Mobile är möjligheten att enkelt justera utseende på de element man lägger till.

För att göra länken "Menu" lite mer stylad, så läser vi på om "Buttons" och "Icons". En kombination av de CSS-klasser som finns för att styla knappar och ikoner leder mig till följande konstruktion.

```html
<a href="#menu" class="ui-btn ui-corner-all ui-shadow ui-icon-bars ui-btn-icon-left ui-btn-b ui-btn-icon-notext ui-shadow-icon">Menu</a>
```

Mycket klasser blir det, varje klass har sitt syfte. Så här blev resultatet.

[FIGURE src=/image/snapht15/jquery-mobile-menu-icon.png?w=w2 caption="Menyvalet blev nu en knapp, utan text men med en icon."]

En knapp blev till en ikon utan text, rundad och skuggad. Lite snyggt blev det allt.



###Att styla en meny {#style-meny}

Menyn i panelen består nu bara av en länklista. Låt oss använda jQuery Mobile för att styla den så menyvalen ser ut lite mer som man förväntar sig av en mobil applikation.

Det känns som widgeten ListView kan vara rätt verktyg. Läs på om den. Det gör jag och kommer fram till att följande kod blir bra.

```html
<ul data-role="listview">
    <li><a href="#me">Me</a></li>
    <li><a href="#report">Redovisning</a></li>
    <li><a href="#about">Om</a></li>
</ul>
```

Om du gör samma, men stilen uppdateras inte, så behöver du ändra i initieringen av panelen. Panelen består nu av ett subelement som också behöver initieras. Om du anropar metoden [`enhanceWithin()`](http://api.jquerymobile.com/enhanceWithin/), enligt nedan, så initieras även subelementet.

```javascript
// Add shared panel as a panel.
//$("#menu").panel();
$("#menu").panel().enhanceWithin();
```

Den stylade menyn ser nu ut så här.

[FIGURE src=/image/snapht15/jquery-mobile-menu-styled.png?w=w2 caption="Menyn stylad som en listvew."]

Ja, det var inte så mycket. För egen del så börjar jag känna mig mer och mer inne i hur jQuery Mobile tänker och fungerar. Nu har vi en grundstruktur på plats, med vanlig HTML, CSS och JavaScript och nu kan man använda sig av enkelheten i jQuery Mobile.



###Ändra beteende på panelen {#style-panel}

När jag läser på on Panel-widgeten så ser jag att den kan få olika beteenden. Jag gillar mest det när panelen lägger sig över sidan. Beteendet "reveal" verkar vara default så jag ändrar till "overlay".

```html
<div data-role="panel" id="menu" data-theme="b" data-display="overlay">
```

Japp, det var inte svårare än så.



Klart {#klar}
--------------------------------------

Då var jag klar med min me-app. Så här ser den ut.

[YOUTUBE src=67biiKAS5BI width=630 caption="Min me-app med fokus på mobilen."]

Det är en grund som ger viss förståelse för hur man främst jobbar med en mobil webapp i jQuery Mobile. Men det ger också viss generell förståelse för hur man i allmänhet kan jobba med mobila appar som bygger på HTML, CSS och JavaScript.



Fördelar och nackdelar {#fordel}
--------------------------------------

Fördelen med ett ramverk, eller libb, likt jQuery Mobile är att det finns många varianter på utseende och färdiga widgetar. När man väl lärt sig använda dem, och när man hittar rätt i manualen, så blir det rätt enkelt att konstruera sin webbapp. På det viset är det kraftfullt. Navigeringen är inbyggd och det finns ett sätt att strukturera sin applikation. Kompabilitet mellan olika teminaler och webbläsare löser libbet, liksom stöd för olika typer av touch event.

Men, behöver man verkligen jQuery Mobile, eller kan man göra det på egen hand? Ja det är klart att man kan plocka ihop saker på egen hand och ibland är det ett rimligt alternativ. 

Min poäng med övningen är att visa hur man jobbar inom ramen för ett färdigt libb och vad man kan åstakomma. Förhoppningsvis ger det också en introduktion i hur det är att utveckla mot mobila terminaler. En liten grund att stå på.

Efterhand som projekten växer så kanske man märker att ett libb likt jQuery mobile är mer hämmande än hjälpande. Då är det dags att se på alternativen, vilket jag tänker göra, i kommande artiklar.

Men för att komma igång och snabbt göra en webapp i klienten, så fungerar jQuery mobile utmärkt.



Avslutningsvis {#avslutning}
--------------------------------------

Har du [tips, förslag eller frågor om artikeln](t/4579) så finns det en specifik forumtråd för det.
 
