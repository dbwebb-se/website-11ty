---
author: mos
category:
    - webbprogrammering
    - javascript
    - kursen webgl
revision:
  "2015-10-15": (A, mos) Första utgåvan inför webgl hösten 15, en vidarutveckling av samma dokument från kursen javascript1.
...
Kom i gång med HTML, CSS, JavaScript och Canvas
==================================

[FIGURE src=/image/snapht15/webgl-sandbox.png?w=c5&a=0,30,60,0 class="right"]

Kom igång och rita ut saker på en HTML canvas med hjälp av JavaScript (och CSS). Vi tittar på validering av din kod och vi ser var du hittar information som manualer och specifikationer.

Du får en bas att stå på, ett första program i JavaScript, att bygga vidare på. Du får också se hur du bör göra för att få hjälp av andra genom att dela ut din kod och göra en *fiddle* eller en *codepen*.

Till att börja med så håller vi oss till ett kontext av 2D.

<!--more-->

Så här kan en sandbox se ut.

[FIGURE src=/image/snapht15/webgl-sandbox.png?w=w2 caption="Så här ser en standard sandbox ut."]



Förutsättning {#pre}
-------------------------------

Artikeln är en del av kursen webgl och förutsätter att du har en labbmiljö som motsvarar "[Introduktion till labbmiljö i webgl](webgl/labbmiljo)".



Kursmaterial från GitHub {#material}
-------------------------------

I denna kursen jobbar du med exempelprogram och övningar som finns samlade i ett kursrepo, en kurskatalog. Du bör alltså ha ditt kursrepo framför dig nu.

Du kan se allt [innehåll i det så kallade *repositoryt*](https://github.com/mosbth/webgl) via webbplatens GitHub, det innehåller alla övningar, exempelprogram och tips och trix som finns i det som du nu laddat ned. Där finns även en struktur som du skall följa när du gör dina inlämningar, det är det som kallas din me-sida, eller me-katalog. Men, vi tar mer om det när du väl gör uppgifterna.



En sandbox för exempelprogram {#sandbox}
-------------------------------

En [sandbox](http://en.wikipedia.org/wiki/Sandbox_(software_development)) är en avskild testmiljö. Låt oss, som en övning, skapa en sandbox som du kan använda för dina testprogram i kursen.

Kika i kursmaterialet under `example/sandbox`. Där hittar du en struktur på en webbsida där sidans delar är separerade i olika filer.

```bash
$ tree sandbox/
sandbox/                                  
├── index.html                            
├── main.js                               
└── style.css                             
                                          
0 directories, 3 files                    
```

Här är en förklaring av de olika filerna.

| Fil                       | Innehåll         |
|---------------------------|------------------|
| `sandbox/index.html`      | Sidans huvusakliga innehåll och HTML-koden |
| `sandbox/style.css`       | Sidans style och CSS-kod |
| `sandbox/main.js`         | Sidans JavaScript |

Studera filerna och se hur de länkas samman i `index.html` via följande två rader.

```html
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="main.js"></script>
```

Var sak på sin plats är viktigt, det blir lättare att underhålla koden i längden på det viset.

Koden för sandbox-exemplet finns även att studera, och provköra, [i en kopia av repot på dbwebb.se](webgl/repo/example/sandbox).



En egen anpassad sandbox {#egen-sandbox}
-------------------------------

Under kursens gång kommer du göra en del exempelprogram. Ibland för att du ombeds att göra det, men kanske ilka ofta för att du själv vill testa något. Då är det bra att ha några filer att utgå ifrån. Ta nu och kopiera sandbox-exemplet och anpassa det till ditt eget syfte. Så har du en egen mall för dina exempelprogram.

Gå till terminalen och gör följande kommandon.

```bash
# Flytta till kurskatalogen
cp -i example/sandbox/* me/kmom01/sandbox
cd me/kmom01/sandbox
ls
```

Nu kan du gå in och ändra informationen i filerna för att anpassa dem och göra dem "dina", din egen sandbox att utgå ifrån.

Det är viktigt att du lägger koden på rätt plats. Allt som du lägger under katalogen `me/kmom01` kommer att vara en del av din redovisning av kursmoment 01. Det förväntas att du skall ha en katalog som heter `me/kmom01/sandbox`, annars riskerar du komplettering på inlämningen.



HTML5 canvas {#canvas}
-------------------------------

HTML5 elementet `<canvas>` erbjuder ett element att rita grafik via JavaScript kod. Man lägger canvas-elementet i HTML-sidan och styr vad som ritas ut via JavaScript.

Sandboxen innehåller ett exempel som ser ut så här.

Först i HTML-koden.
```html
<canvas id="canvas1" width="800" height="500"></canvas>
```

Sedan i JavaScript-koden.
```javascript
var canvas, ct;

// Get the HTML element to work with
canvas = document.getElementById("canvas1");

// Create a 2D context on the canvas
ct = canvas.getContext("2d");
```

Koden ovan skapar två variablar varav den ena kopplas till HTML-elementet och den andra skapar ett 2D-context som går att använda för att rita ut saker på en canvas.

Ta en sväng till MDN och kika på vad api:et för [HTML Canvas](https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API) erbjuder. Där kan du se kodkonstruktioner som du kan testa själv.



Validera HTML och CSS {#validera}
-------------------------------

W3C är organisationen som standardiserar webben och flera av de tekniker som vi kommer använda. De har [validatorer](http://validator.w3.org/) som hjälper oss skriva bra kod.

Låt oss testa om den koden vi har sett hittills kommer igenom validatorerna för HTML och CSS.

I artikeln om "[Gör din första sida med HTML5](coachen/gor-din-forsta-sida-med-html5)" så visar jag i en video hur jag använder [W3C validator för HTML](http://validator.w3.org/).

Här är videon.

[YOUTUBE src=vveClJEC2m4 width=630 caption="Mikael bygger en HTMLsida och validerar den med W3C HTML validator."]

Ta nu din html-fil i ditt sandbox-exempel och validera den. Rätta till felen om det finns några.

I artikeln om "[Styla din sida med CSS och en extern stylesheet](coachen/styla-din-sida-med-css-och-en-extern-stylesheet)" så visar jag i en video hur jag använder [W3C validator för CSS](http://jigsaw.w3.org/css-validator/).

Här är videon.

[YOUTUBE src=4xQHd6ZSpQ8 width=630 caption="Mikael validerar en stylesheet med W3C CSS validator."]

Ta nu din stylesheet i ditt sandbox-exempel och validera den. Rätta till felen om det finns några.

Kom alltid ihåg att validera dina sidor. Det kommer att spara dig en del tid i felsökning. En sida som inte validerar kan ge upphov till många konstiga och felaktiga beteenden.



Kodkvalitet med JSHint {#kvalitet}
-------------------------------

*Från och med hösten 2017 ersätts jshint av eslint då utveckling har upphört på jshint till förmån för eslint. Webbplatsen för jshint fungerar dock fortfarande bra som exempel.*

Kodkvalitet handlar om att skriva bra kod. Kod som är läsbar och enkel att underhålla, vidarutveckla och felsöka i. Till många programmeringsspråk finns ett verktyg som kallas [Lint](http://en.wikipedia.org/wiki/Lint_(software)). Verktyget varnar för potentiellt dåliga kodkonstruktioner och det är tips som vi gärna lyssnar till.

I JavaScript finns verktyget [JSLint](http://www.jslint.com/) och en utveckling av det som heter [JSHint](http://www.jshint.com/). I denna kursen tänkta jag att vi använder JSHint.

I video-serien "[Kom igång med JavaScript och skriv din första kod](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_11l3iKwIKRM4DFuhtBeNE)" finns med ett avsnitt när jag använder JSHint.

[YOUTUBE src=2QP1a--Hp5s width=630 caption="Mikael använder JSHint."]

Kör alltid igenom din JavaScript-kod igenom JSHint. Det kan spara dig en hel de felsökning. JSHint hjälper dig att hitta potentiella problem i din kod.

Använd JSHint för att kolla att ditt sandbox-exempel går igenom utan felmeddelande och varningar.

I kurserna använder vi en dbwebb-kodstandard som är beskriven på [npm javascript-code-style](https://www.npmjs.com/package/javascript-style-guide). Du kan diskutera [kodstandarden i forumet](t/6327).



Kodvalidering med dbwebb validate {#validate}
-------------------------------

När du jobbar med kursmaterialet så har du kommandot `dbwebb` som utför viss validering åt dig. Du kan testa att validera, och publicera, din `sandbox` på följande vis.

```bash
# Ställ dig någonstans i kurskatalogen
dbwebb validate sandbox
dbwebb publish sandbox
```

Rätta de eventuella fel som dyker upp.

När du publicerar så läggs din kod upp på studentservern och du får en länk som du kan köra mot den publika student-webbservern. Om du hamnar i bekymmer och behöver hjälp så är det en bra länk att dela med sig av.



Hjälp mig online {#hjalp}
-------------------------------

Som ny programmerare i JavaScript kommer du att behöva hjälp. Du kommer behöva hjälp av andra för att felsöka i ditt program. Det finns flera online-verktyg som kan underlätta detta.

Det handlar om att göra det enkelt för den som skall hjälpa dig. Genom att lägga upp ett minimalt exempel på det som är ditt problem så har du enklast att få hjälp. Ett stort exempelprogram är alltid svårt att sätta sig in i och det är svårare att få hjälp med felsökningen. Försök därför alltid avgränsa dina testprogram. Du får snabbare och bättre svar och fler som är villiga att hjälpa dig.

Ta det som dagens tips. Det är så det funkar.



###JSFiddle {#jsfiddle}

Ett av de online-verktyg som kan hjälpa dig är [JSFiddle](http://jsfiddle.net/).

Låt se hur det ser ut när jag lägger upp ett exempel i JSFiddle. Så kan du själv testa att lägga upp din sandbox därefter.

[YOUTUBE src=_31-8HVvMhs width=630 caption="Mikael lägger upp sandbox-exemplet på JSFiddle."]

Här är mitt färdiga exempel som du kan öppna i JSFiddle och testa att ändra.

<iframe width="100%" height="300" src="https://jsfiddle.net/mikael_roos/pK8cc/embedded/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>

Länken till exemplet är [https://jsfiddle.net/mikael_roos/pK8cc/](https://jsfiddle.net/mikael_roos/pK8cc/).

Glöm inte att korta och små fiddlar är enklare att hantera för den som hjälper dig. Göra bara fiddlarna så att de visar på problemet. Ta bort all annan kod. Det exemplet som jag visar är alltså i största laget. Om jag till exempel hade problem med en confirm-popup så skulle jag bara visat den delen av koden.



###CodePen {#codepen}

[CodePen](http://codepen.io/) är ett liknande verktyg där du kan göra samma sak som i JSFiddle. Här ser du samma exempelkod i en CodePen.

<p data-height="292" data-theme-id="0" data-slug-hash="qOPKyq" data-default-tab="result" data-user="mosbth" class='codepen'>See the Pen <a href='http://codepen.io/mosbth/pen/qOPKyq/'>Hello World</a> by Mikael Roos (<a href='http://codepen.io/mosbth'>@mosbth</a>) on <a href='http://codepen.io'>CodePen</a>.</p>
<script async src="//assets.codepen.io/assets/embed/ei.js"></script>

Du kan se [ovan codepen direkt på Codepens webbplats](http://codepen.io/mosbth/pen/qOPKyq).

Att jobba i JSFiddle eller CodePen kan vara en smaksak. För min del så väljer jag att jobba i båda verktygen.



###CodeShare {#codeshare}

En annan resurs som kan udnerlätta felsökning via kollegor, är att dela med sig av koden via en codeshare via webbtjänsten [Codeshare](http://codeshare.io/). När du väl laddat upp din kod så kan du ta hjälp av kollegor som kan se koden i sitt sammanhang och de kan dessutom redigera koden och förslå förändringar.

Tipset är att skaffa sig ett konto på Codeshare.
 


Resurser och manualer {#resurser}
-------------------------------

Här är ett allmänt stycke om de online-resurser med dokumentation, som du främst kommer att använda när du utvecklar JavaScript (i denna kursen).


###Mozilla Developers Network, MDN {#mdn}

Mozilla Developers Network är en bra resurs för JavaScript-programmerare. Där finns manualer, guider och tutorials för många tekniker som vi behöver känna till.

Till att börja med finns det en översikt av resurserna på "[Web technology for developers](https://developer.mozilla.org/en-US/docs/Web)". Därifrån kan du se resurser för HTML, CSS, JavaScript och DOM. Det är de huvudsakliga teknikerna som vi kommer att jobba med.

Källan till mycket av vår kunskap om JavaScript kommer att vara referensmanualen, [JavaScript Reference](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference). Se till att du känner till dess uppbyggnad och hittar i den. När du blir varm i kläderna är det dit du kommer att återvända för *korrekt* information.

Att googla går bra, problemet är att kvaliteten varierar och man behöver ofta säkerställa att svaret är det *korrekta*. Det är inte alltid så lätt att bedöma det. Man lär sig efter hand. Men facit finns ofta i referensmanualen, så glöm inte bort att titta där när du är osäker.

> *Bli kompis med referensmanualen.*

En annan resurs som är bra och ofta ger ledtrådar till korrekta svar är StackOverflow. Är du inte bekant med StackOverflow så kan du bekanta dig med webbplatsen genom att studera de frågor som är [taggade med JavaScript](http://stackoverflow.com/questions/tagged/javascript).



###Can I Use {#caniuse}

[Can I Use](http://caniuse.com) är en webbplats som har koll på kompabilitet mellan olika webbläsare. Eller rättare sagt, den har koll på vilka features som olika webbläsare stödjer.

Här kan du till exempel se vilka versioner av de olika webbläsarna som stödjer att [visa innehållet i *full screen*](http://caniuse.com/#feat=fullscreen).

Se till att du bekantar dig med Can I Use och återvänd hit om du får problem med kompabilitet. Can I Use kan vara ett bra komplement till referensmanualen på MDN.




Avslutningsvis {#avslutning}
------------------------------

Du har nu grunderna som krävs för att sätta igång och utveckla program i webbmiljö med JavaScript.

Om du stöter på problem så kan du alltid [fråga direkt i kursens forum](forum/utbildning/webgl).
