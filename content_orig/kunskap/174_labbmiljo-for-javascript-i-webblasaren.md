---
author: mos
category: labbmiljo
revision:
  "2015-08-26": (E, mos) Ersatte detta dokument med två andra dokument och delade
    upp materialet.
  "2014-08-25": (D, mos) Lade till youtube-film om hur man initierar kursrepot.
  "2014-08-18": (C, mos) Mindre justeringar i samband med att pythons-motsvarighet
    uppdaterades.
  "2014-08-11": (B, mos) Uppdaterad och genomgången.
  "2014-06-23": (A, mos) Första utgåvan i samband javascript1-kursen.
updated: "2015-08-26 15:04:34"
created: "2014-06-04 12:16:36"
...
Labbmiljö för JavaScript i webbläsaren
==================================

Låt oss hitta en snabb väg in i en underbar värld av JavaScript. Vad behövs för utvecklingsmiljö? Var hittar jag informationen om hur språket fungerar? Hur kopplar jag ihop JavaScript i en webbsida? Finns det några verktyg som kan underlätta min utveckling?

Du vill alltså lära dig grunden i JavaScript för att komma bort från copy-pastandet av kod som du inte förstår, du vill ha grunderna som du kan stå på för att bli en bättre utvecklare som kan sitt JavaScript. Kanske är detta första gången du kommer i kontakt med ett programmeringsspråk.

<!--more-->

[INFO]
Från och med hösten 2015 så är detta dokument ersatt av följande dokument som innehåller motsvarande information.

* [Introduktion till labbmiljö i javascript1](javascript1/labbmiljo)
* [Kom i gång med HTML, CSS och JavaScript](kunskap/kom-i-gang-med-html-css-och-javascript)

[/INFO]



Installera webbläsare {#install-ff}
-------------------------------

Du behöver en webbläsare. Ett av de vanligaste sätten att köra JavaScript är i en webbläsare.

Se till att du installerar en webbläsare, ta Firefox, Chrome, Safari eller Internet Explorer. För min del så använder jag oftast Firefox så börja du med den också, så slipper vi att hantera inkompatibilitet mellan olika webbläsare, i alla fall till att börja med.

Hur hittar du webbläsaren Firefox? Sök. Eller googla. Det är bara att inse att de flesta av oss googlar när vi inte kan svara på en fråga, så det är lika bra att göra så. Googla "firefox download" och sen är du igång.

Ta även och installera utvecklingsverktyget [Firebug](http://getfirebug.com/downloads), det är en addon till Firefox som hjälper dig att utveckla och felsöka din webbsidas komponenter av HTML, CSS och JavaScript-kod.



Installera en texteditor {#install-edit}
-------------------------------

Du behöver en texteditor. Om du behöver hjälp att installera en så finns det i artikeln "[Installera en texteditor, jEdit](kunskap/installera-en-texteditor-jedit)".

Använd alltid UTF-8 som teckenkodning och Unix-stil på radbrytningar. Är du osäker på vad det betyder? Läs ovan artikel om jEdit. Artikeln innehåller även förslag på alternativa texteditorer.



En terminal {#terminal}
-------------------------------

Du behöver en terminal för att jobba med kursens material. Dessutom behöver du ett par program installerade som du kan köra via terminalen. Det är program som vi installerar via pakethantering.

Läs igenom följande artikel "[Kom i gång med terminalen](kunskap/kom-i-gang-med-terminalen-som-verktyg-for-webbutvecklaren)" och se till att bekanta dig med ett terminalprogram för din miljö. Innan du går vidare behöver du ett fungerande terminalprogram.

Du behöver ha följande paket installerade.

```bash
rsync git wget nano
```

Dubbelkolla att de är installerade genom att köra följande kommando i terminalen.

Cygwin på Windows:

```bash
apt-cyg install rsync git wget nano
```

Mac OS:

```bash
brew install git
brew install wget
```

Linux (debian):

```bash
apt-get install rsync git wget nano
```

Är du osäker på terminalen och Unix-kommandon så kan du jobba igenom artikeln "[20 steg för att komma i gång med Unix och terminalen](kunskap/20-steg-for-att-komma-i-gang-med-unix-och-terminalen)".



Kursmaterial från GitHub {#material}
-------------------------------

I denna kursen jobbar du med exempelprogram och övningar som finns samlade i ett kursrepo, en kurskatalog. Öppna nu din terminal och hämta kursrepot för kursen javascript1.

Är dett första gången du gör detta så behöver du läsa igenom artikeln "[Kurskatalogen, ett kursrepo på Github](kunskap/kurskatalogen-ett-kursrepo-pa-github)".

Enligt artikeln kör du alltså följande kommandon för att ladda hem ditt kursrepo.

```bash
mkdir ~/dbwebb-kurser
cd ~/dbwebb-kurser
git clone https://github.com/mosbth/javascript1.git
cd javascript1
bin/dbwebb init
ls
```

Nu har du allt material i kursrepot framför dig.

Du kan även se allt [innehåll i det så kallade *repositoryt*](https://github.com/mosbth/javascript1) via webbplatens Github, det innehåller alla övningar, exempelprogram och tips och trix som finns i det som du nu laddat ned. Där finns även en struktur som du skall följa när du gör dina inlämningar, det är det som kallas din me-sida, eller me-katalog. Men, vi tar mer om det när du väl gör uppgifterna.

Se hur jag gjorde.

[YOUTUBE src=gbuqrCjnhWc width=630 caption="Mikael kommer i gång med kursrepot för kursen."]



Kom i gång med HTML, CSS och JavaScript {#komigang}
-------------------------------

Det handlar alltså om HTML, CSS och JavaScript. Eller ja, kursen javascript1 handlar främst om programmering med JavaScript. Men, eftersom vi kör JavaScript i en webbmiljö och en webbläsare så behöver vi HTML och CSS för att göra något kul med JavaScript. Dessutom behöver vi ett utvecklarverktyg som hjälper oss, likt Firebug.

Det kan nu vara på sin plats att du går igenom grunderna i dessa delar. Här är fyra introduktions-artiklar, med hänvisning till extra resurser, som hjälper dig att komma igång.

* HTML - [Gör din första sida med HTML5](coachen/gor-din-forsta-sida-med-html5)
* CSS - [Styla din sida med CSS och en extern stylesheet](coachen/styla-din-sida-med-css-och-en-extern-stylesheet)
* Firebug - [Kom i gång och installera Firebug som utvecklarverktyg](coachen/kom-i-gang-och-installera-firebug-som-utvecklarverktyg)
* JavaScript - [Kom igång med JavaScript och skriv din första kod](coachen/kom-igang-med-javascript-och-skriv-din-forsta-kod)

Nu har du grunderna.




En sandbox för exempelprogram {#sandbox}
-------------------------------

En [sandbox](http://en.wikipedia.org/wiki/Sandbox_(software_development)) är en avskild testmiljö. Låt oss, som en övning, skapa en sandbox som du kan använda för dina testprogram i kursen.

Kika i kursmaterialet under `example/sandbox`. Där hittar du en bra struktur på en webbsida där sidans delar är separerade i olika filer.

| Fil                       | Innehåll         |
|---------------------------|------------------|
| `sandbox/index.html`      | Sidans huvusakliga innehåll och HTML-koden |
| `sandbox/style/style.css` | Sidans style och CSS-kod |
| `sandbox/js/main.js`      | Sidans JavaScript |

Studera filerna och se hur de länkas samman i `index.html` via följande två rader.

```html
<link rel="stylesheet" href="style/style.css">
<script type="text/javascript" src="js/main.js"></script>
```

Var sak på sin plats är viktigt, det blir lättare att underhålla koden i längden på det viset.

Koden för sandbox-exemplet finns även att studera, och provköra, [i en kopia av repot på dbwebb.se](javascript1/repo/example/sandbox).



En egen anpassad sandbox {#egen-sandbox}
-------------------------------

Under kursens gång kommer du göra många exempelprogram. Då är det bra att ha några filer att utgå ifrån. Ta nu och kopiera sandbox-exemplet och anpassa det till ditt eget syfte. Så har du en egen mall för dina exempelprogram.

Gå till terminalen och gör följande kommandon.

```bash
cd ~/dbwebb-kurser/javascript1
cp -ri example/sandbox/* me/kmom01/sandbox
cd me/kmom01/sandbox
ls
```

Nu kan du gå in och ändra informationen i filerna för att anpassa dem och göra dem "dina".

Det är viktigt att du lägger koden på rätt plats. Allt som du lägger under katalogen `me/kmom01` kommer att vara en del av din redovisning av kursmoment 01. Det förväntas att du skall ha en katalog som heter `me/kmom01/sandbox`, annars blir det komplettering på inlämningen.

Så här gjorde jag för att anpassa sandboxen. Du kan använda editorn nano istället för vim som jag använder.

<script type="text/javascript" src="https://asciinema.org/a/11693.js" id="asciicast-11693" async></script>

Så här blev resultatet.

[FIGURE src=/image/snap/js1-sandbox-mod.png?w=w2 caption="En aningen gulare sandbox för mina testprogram."]

Nåväl, jag kanske ska ändra tillbaka den gula färgen...



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

Kom alltid ihåg att validera dina sidor. Det kommer att spara dig en del tid i felsökning. En sida som inte validerar kan ge upphov till många konstiga felaktiga beteenden.



Kodkvalitet med JSHint {#kvalitet}
-------------------------------

Kodkvalitet handlar om att skriva bra kod. Kod som är läsbar och enkel att underhålla, vidarutveckla och felsöka i. Till många programmeringsspråk finns ett verktyg som kallas [Lint](http://en.wikipedia.org/wiki/Lint_(software)). Verktyget varnar för potentiellt dåliga kodkonstruktioner och det är tips som vi gärna lyssnar till.

I JavaScript finns verktyget [JSLint](http://www.jslint.com/) och en utveckling av det som heter [JSHint](http://www.jshint.com/). I denna kursen tänkta jag att vi använder JSHint.

I video-serien "[Kom igång med JavaScript och skriv din första kod](https://www.youtube.com/playlist?list=PLKtP9l5q3ce_11l3iKwIKRM4DFuhtBeNE)" finns med ett avsnitt när jag använder JSHint.

[YOUTUBE src=2QP1a--Hp5s width=630 caption="Mikael använder JSHint."]

Kör alltid igenom din JavaScript-kod igenom JSHint. Det kan spara dig en hel de felsökning. JSHint hjälper dig att hitta potentiella problem i din kod.

Använd JSHint för att kolla att ditt sandbox-exempel går igenom utan felmeddelande och varningar.



Hjälp mig online {#hjalp}
-------------------------------

Som ny programmerare i JavaScript kommer du att behöva hjälp. Du kommer behöva hjälp av andra för att felsöka i ditt program. Ett av de online-verktyg som kan hjälpa dig är [JSFiddle](http://jsfiddle.net/).

Det handlar om att göra det enkelt för den som skall hjälpa dig. Genom att lägga upp ett minimalt exempel på det som är ditt problem så har du enklast att få hjälp. Ett stort exempelprogram är alltid svårt att sätta sig in i och det är svårare att få hjälp med felsökningen. Försök därför alltid avgränsa dina testprogram. Du får snabbare och bättre svar och fler som är villiga att hjälpa dig.

Ta det som dagens tips. Det är så det funkar.

Med det sagt, hur använder du då JSFiddle för att till exempel lägga upp exemplet med sandboxen?

Låt se hur det ser ut när jag lägger upp ett exempel i JSFiddle. Så kan du själv testa att lägga upp din sandbox därefter.

[YOUTUBE src=_31-8HVvMhs width=630 caption="Mikael lägger upp sandbox-exemplet på JSFiddle."]

Här är mitt färdiga exempel som du kan öppna i JSFiddle och testa att ändra.

<iframe width="100%" height="300" src="http://jsfiddle.net/mikael_roos/pK8cc/embedded/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>

Länken till exemplet är [http://jsfiddle.net/mikael_roos/pK8cc/](http://jsfiddle.net/mikael_roos/pK8cc/).

Glöm inte att korta och små fiddlar är enklare att hantera för den som hjälper dit. Göra bara fiddlarna så att de visar på problemet. Ta bort all annan kod. Det exemplet som jag visar är alltså i största laget. Om jag till exempel hade problem med en confirm-popup så skulle jag bara visat den delen av koden.




Resurser och manualer {#resurser}
-------------------------------

Här är ett allmänt stycke om de online-resurser med dokumentation, som du främst kommer att använda när du utvecklar JavaScript (i denna kursen).


###Mozilla Developers Network, MDN {#mdn}

Mozilla Developers Network är en bra resurs för JavaScript-programmerare. Där finns manualer, guider och tutorials för många tekniker som vi behöver känna till.

Till att börja med finns det en översikt av resurserna på "[Web technology for developers](https://developer.mozilla.org/en-US/docs/Web)". Därifrån kan du se resurser för HTML, CSS, JavaScript och DOM. Det är de huvudsakliga teknikerna som vi kommer att jobba med.

Källan till mycket av vår kunskap om JavaScript kommer att vara referensmanualen, [JavaScript Reference](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference). Se till att du känner till dess uppbyggnad och hittar i den. När du blir varm i kläderna är det dit du kommer att återvända för *korrekt* information.

Att googla går bra, problemet är att kvaliteten varierar och man behöver ofta säkerställa att svaret är det *korrekta*. Det är inte alltid så lätt att bedöma det. Man lär sig efter hand. Men facit finns ofta i referensmanualen, så glöm inte bort att titta där när du är osäker.

En annan resurs som är bra och ofta ger ledtrådar till korrekta svar är StackOverflow. Är du inte bekant med StackOverflow så kan du bekanta dig med webbplatsen genom att studera de frågor som är [taggade med JavaScript](http://stackoverflow.com/questions/tagged/javascript).



###Can I Use {#caniuse}

[Can I Use](http://caniuse.com) är en webbplats som har koll på kompabilitet mellan olika webbläsare. Eller rättare sagt, den har koll på vilka features som olika webbläsare stödjer.

Här kan du till exempel se vilka versioner av de olika webbläsarna som stödjer att [visa innehållet i *full screen*](http://caniuse.com/#feat=fullscreen).

Se till att du bekantar dig med Can I Use och återvänd hit om du får problem med kompabilitet. Can I Use kan vara ett bra komplement till referensmanualen på MDN.




Avslutningsvis {#avslutning}
------------------------------

Du har nu grunderna som krävs för att sätta igång och utveckla program i webbmiljö med JavaScript.

Har du fler förslag eller tips så tar vi det i forumet som har en [egen tråd](t/2480) för denna artikeln.
