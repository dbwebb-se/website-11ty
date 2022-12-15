---
author: mos
category: javascript
revision:
    2016-10-18: (H, mos) La till saknade länkar, redigerade bildstorlekar.
    2016-08-04: (G, mos) Korrigerade länkar.
    2015-12-02: (F, mos) Länk om jslint och polyfill gav 404, fixat.
    2013-11-26: (E, mos) Nu även i /kunskap.
    2013-01-23: (D, mos) Förtydligade att copy-paste är rekommenderad taktik i exemplen.
    2013-01-22: (C, mos) Ändrade länk till Mickey Mos move around css sprite.
    2012-11-08: (B, mos) Bytte ut Firebug videon mot en där inte mitt ansikte skymmer när jag debuggar.
    2012-10-30: (A, mos) Första utgåvan.
...
JavaScript - argh! - måste jag?
==================================

En lättsam (eller kanske inte...) introduktion till kursen javascript. Artikeln ger en introduktion till JavaScript och omkringliggande tekniker, det blir en bas att stå på, en världsbild där JavaScript är det centrala. Läs på, fundera, testa övningsprogrammen, lär dig felsöka och gör uppgifterna så får du till slut en bra bas att stå på.

<!--more-->

Kolla in Mikael när han är på gång att starta igång utvecklingen av kursen.

[YOUTUBE src=FOorvIkQCEs width=613 caption="Mikael kommer igång med kursen javascript."]



Ja, du måste... {#inledning}
----------------------------

Låt säga att vi har en server-side PHP eller ASP webbprogrammerare som **måste** lära sig JavaScript.  Eller kanske en vanligt programmerare, som är duktig på C, C++, Java eller kanske C# och Visual Basic, och nu skall ta sig an detta vilda [skript-språk](http://en.wikipedia.org/wiki/Scripting_language). Vi kan också tänka oss en webbutvecklare som tröttnat på att kopiera kodsnuttar med JavaScript från härs och tvärs och nu har en brinnande vilja av att veta lite mer om själva kärnan i detta språk som är grunden för webbaserad klient-programmering (och lite till), JavaScript alltså. Alla dessa programmerare har gemensamt att de **vill** och **måste** lära sig att behärska programmeringsspråket JavaScript, med fokus på webbutveckling och webbprogrammering. Hur skall vi hjälpa dem att nå dit? Var skall vi börja? En vägbeskrivning kanske?

Helt klart är att här behövs hjälp. Hjälp från de bästa och de som verkligen kan. Det behövs en hel del arbete också, och programmering och felsökning. Sånt lär man sig på. Att lära sig genom att smutsa ner sig som någon sa, "get your hands dirty" [^9].

Ok, då är det lika bra att starta resan. In i skogen med alla JavaScript-träden -- när vi kommer ut igen så hoppas jag att vi kan checka i boxen framför frågan: 

> *Kan du verkligen koda JavaScript?*

Då kör vi.


"Hello World" i JavaScript {#hello_world}
---------------------------------------


###Först ett litet "Hello World" {#litet_hello}

En kurs utan ett "Hello World" är ingen kurs. Jag startar med lite kod som får bli grunden till ett "Hello World" i JavaScript. Det blir lite längre än ett vanligt "Hello World", men så kan man också göra på många olika sätt i JavaScript och jag vill ha en god grund att stå på inför kommande kodexempel.

**"Hello World" i JavaScript:**

```javascript
<!doctype html>
<html lang='en'>
<head>
<meta charset='utf-8' />
<title>Hello World in JavaScript</title>

<style type='text/css'>
.red{color:red;}
.green{color:green;}
.blue{color:blue;}
.brown{color:brown;}
</style>

<script>
console.log('doing js in head-section');

function helloWorld() {
  console.log('called function helloWorld()');
  alert('Hello World from a JavaScript function showing an alert.');
}

function helloMyNumber() {
  console.log('called function helloMyNumber()');
  var max = 42;
  var yourLuckyNumber = prompt('So, whats your lucky number today (enter a number between 1 and '+max+')?');
  var myLuckyNumber = Math.floor(Math.random()*(max+1));
  var paragraph = document.getElementById('luckynumber');
  paragraph.innerHTML = paragraph.innerHTML + ' Your\'e lucky number is: ' + yourLuckyNumber + '. Mine is: ' + myLuckyNumber + '. They did ' + (yourLuckyNumber == myLuckyNumber ? 'indeed ' : 'NOT ') + 'match!';
}
</script>

</head>

<body>
<p class='red'>Hello World in a HTML paragraph!</p>

<script>
console.log('doing js in body-section');
document.writeln('<p class="green">Hello World from JavaScript within a body-section in HTML!</p>'); 
</script>

<p><a href='javascript:helloWorld()'>Click me to see Hello World in an alert...</a></p> 

<p><a href='javascript:helloMyNumber()'>Click me to see a prompt and enter your lucky number...</a></p> 

<p id='luckynumber' class='brown'>No lucky number yet...</p>

</body>
</html>
```

Studera koden, ta sedan och kopiera den till din texteditor och spara den på disk som `hello.html`. Öppna den sedan i din webbläsare och lek runt, lär känna programmet och hur de olika delarna hänger ihop.

[INFO]
**Info webbläsare.**

I denna kursen använder jag Firefox för att testa alla exempel. Jag använder Firebug för att debugga och få kontroll över JavaScript-koden. Om du inte har Firefox eller Firebug installerat så gör du det innan du går vidare.

Du kan använda andra webbläsare om du vill, t.ex. Chrome som har en motsvarande utvecklardel för JavaScript. Men om du stöter på problem så vill jag att du alltid testkör ditt program i Firefox/Firebug.
[/INFO]

[INFO]
**Info kompatibel kod.**

Ja, vi kommer lära oss att skapa kod som är kompatibel mellan webbläsare, men inte än. Först tar vi grunderna och då kör vi i Firefox, vi vill ha minimalt krångel till att börja med.
[/INFO]


Så här ser det ut för mig.

* [Kodexempel "Hello World"](javascript/lekplats/hello-world/hello.html)

[FIGURE src=/image/javascript/intro/001.jpg?w=w2 caption="Hello World som det ser ut för Mikael."]  

Ta gärna och utöka programmet med dina egna konstruktioner, allt för att testa och leka runt. När du är klar så går vi vidare och bekantar oss med Firebug.


###"Hello World" med Firebug {#firebug}

En av de viktigaste förutsättningarna för utveckling med JavaScript är en bra utvecklingsmiljö. Firebug kommer att vara en del av den under denna kursen så det är lika bra att vi bekantar oss med Firebug och dess olika delar som kan vara till nytta för oss.

Ta en liten koll när Mikael klickar runt i Firebug med "Hello World"-skriptet.

[YOUTUBE src=ZK4PsyNSNs4 width=613 caption="Mikael klickar runt i Firebug med Hello World."]

Bra, då har vi koll även på Firebug. Se till att du känner dig hemma i verktyget, det kan spara dig många timmars felsökning.


###"Hello World" i JSLint {#jslint}

JavaScript är inte ett utmanande språk, det är komplext och kraftfullt, men det är ändå enkelt att komma igång och skriva små skript som fungerar i webbläsaren. Språket JavaScript är flexibelt och det går att lösa uppgiften på flera olika sätt, man kan koda som skript, funktionsorienterat, objektorienterat eller skriva sin kod enligt någon annan programmeringsparadigm.

Så här säger [Wikipedia om JS](http://en.wikipedia.org/wiki/JavaScript):

> "JS is a prototype-based scripting language that is dynamic, weakly typed and has first-class functions. It is a multi-paradigm language, supporting object-oriented, imperative, and functional programming styles."

Vad vi behöver är hjälp och lite insikt i vad som är "best-practices" när det gäller JS. Som en del i detta tar vi hjälp av verktyget [JSLint](http://www.jslint.com/). JSLint är ett verktyg som går igenom din kod och berättar om dess kvalitet, kvalitet enligt "best-practice". Vi kör helt enkelt vår kod genom verktyget och ut kommer varningar när det tycker att vi skriver felaktig kod. Låt oss testa. Ta koden från ditt "Hello World" och kör den i JSLint.

Så här ser första körningen ut för mig... hoppla... då gäller det bara att börja städa upp...

[FIGURE src=/image/javascript/intro/002.jpg?w=w2 caption="Många felmeddelanden blev det i JSLint."]  

Här följer en lista på de uppstädningar jag gjorde i min kod för att göra JSLint glad.

| Fel enligt JSLint | Vad göra för att rätta felet? |
|-------------------|-------------------------------|
| "Missing space between `;` and `}`." | Klicka i `options` "Tolerate messy white space". |
| "`console` was used before it was defined.", "`alert` was used before it was defined.", "`prompt` was used before it was defined." | Klicka i `options` "Assume console, alert, ..." eller lägg till `window.`framför anropet. |
| "Missing `use strict` statement." | Lägg till raden `'use strict'` i min kod. [^1] [^2] [^11]  |
| "Combine this with the previous `var` statement." | Lägg alla variabel-deklarationer i en rad, separerade med kommatecken, [^3] alternativt klicka i `options` "Tolerate many var statements per function". |
| "`document` was used before it was defined." | Klicka i `options` "Assume a browser". |
| "Expected `===` and instead saw `==`." | Använd helst `===` vid jämförelse eftersom `==` gör automatiskt typkonvertering. [^4] |
| "`document.write` can be a form of `eval`." |  `eval` innebär att evaluera JS-kod i runtime vilket ofta betraktas som dålig kod. [^5] Jag ersätter dessa rader med konstruktioner för `innerHTML` istället, alternativt klickar jag i `options` "Tolerate eval". |
| "Expected `<\/` and instead saw `</`." | I mina strängar så escapar jag inte `/`, det behövs inte heller men det kan innebära problem för vissa HTML parsers. |
| "JavaScript URL." | Använd event `onclick` istället för attributet `href` för att anropa en JS-funktion. [^6] Detta ger dock fler problem [^7] och lösningen vore bättre eventhantering, men det får vänta lite. Jag klickar i `options` "Tolerate HTML event handlers" så länge. |

[INFO]
**Läs på om JSLint.** 

För att förstå lite mer hur konstruktörerna bakom JSLint tänkt så läser vi på om [några av de guidelines som styr JSLint](http://www.jslint.com/help.html). Det tar ca 10 minuter att läsa igenom och det är väl spenderade minuter, jag lovar.
[/INFO]

Bra, det där var en hel del viktig information som vi fick av JSLint. Försök alltid leta reda på orsaken till felmeddelandet innan du ändrar din kod, det är ju alltid bra att veta vad som är rätt och fel. I vilket fall som så kan nog JSLint vara ett bra verktyg i denna kursen, och för utveckling av JS-kod i allmänhet.

När jag städat upp koden så har den samma funktion, men ser lite annorlunda ut. Bättre eller sämre? Det känns i alla fall bättre nu när man vet att JSLint och all den kunskap som ligger bakom verktyget, backar upp min kod.

* [Mikael's "Hello World"-kod som passerar JSLint](javascript/lekplats/hello-world/hello_lint.html)

Högerklicka och visa källkoden om du vill se resultatet av mina ändringar. 

Vi går vidare med mer hjälp för debugging och felsökning.


###Få hjälp med felsökning via jsfiddle. {#jsfiddle}

Ibland kör det ihop sig, man behöver hjälp med kodning och felsökning. Då är det smidigt att kunna lägga ut ett litet testprogram, delar av sin kod eller kanske hela koden, på nätet någonstans, kanske på ett verktyg som underlättar felsökning och utveckling i team. Ett sådant verktyg är [JSFiddle](http://jsfiddle.net/).

* [Mikael's "Hello World" i JSFiddle](http://jsfiddle.net/mikael_roos/Vrhk5/)
  
[FIGURE src=/image/javascript/intro/003.jpg?w=w2 caption=""Hello World" i JSFiddle för att underlätta felsökning."]

Tanken är att man lägger upp sin kod, man skapar en "jsfiddle", och skickar länken till sin kollega och ber om hjälp och tips. Ett bra sätt att få hjälp och kollegan kan direkt testköra koden och utföra ändringar och test. När koden är klar kan kollegan skicka tillbaka länken till den nya "jsfiddlen". Ungefär så kan arbetsgången vara.

Testa att skapa din egna "jsfiddel" och testa att modifiera min. Lek runt och bekanta dig med verktyget. Det kan vara en bra resurs vid tillfällen då du behöver hjälp, avgränsa ditt problem och gör ditt lilla testprogram, ställ frågan om varför det inte funkar och skicka länken via forum eller chat.

Kolla in när Mikael klickar runt i Hello World i jsfiddle.

[YOUTUBE src=YF26FdcL_RU width=613 caption="Mikael klickar runt i jsfiddle med Hello World."]

[INFO]
**Tips om jsFiddle.**

Skapa gärna ditt egna konto på jsFiddle, du kan ha stor nytta av jsFiddle under kursens gång och när du ber om hjälp med felsökning så är det inte helt omöjligt att jag ber dig avgränsa problemet i en "jsfiddel".
[/INFO]


En god struktur för testprogram {#struktur}
----------------------------------------------

Det kommer bli en hel del små testprogram i denna kursen. För att underlätta vill jag skapa mig en bra struktur från början. Det är god kodstandard att lägga stylesheet och javascript i separata filer och det vore dessutom behändigt att ha en footer med länkar till de vanligaste validatorerna och testverktygen. 

Låt se vad som kan göras för att underlätta. Det vore trevligt med ett testprogram som ser lite snyggt ut :-).

Om vi går händelserna lite i förväg så kan du ta och kika på min mall för testprogram:

* [javascript/lekplats/mall/](javascript/lekplats/mall)

[FIGURE src=/image/javascript/intro/008.jpg?w=w2 caption="Min mall för testprogram, när den väl är klar."]

Här är en video där jag går igenom min resultat som blev min slutliga mall för testprogram, kika på den innan du fortsätter att läsa.

[YOUTUBE src=vSJBNCjkAAc width=613 caption="Mikael går igenom sin mall för testprogram."]

Häng nu med och se hur mallen växte fram för mig, steg för steg, samtidigt så kan du skapa din egna mall. I slutet av detta stycket har du som uppgift att skapa en egen mall så du kan lika gärna börja på en gång. Du får gärna kopiera och bygga som jag gjort, eller gör enligt din egen tanke och idé. Gör det smidigt så det blir enkelt att skriva ett testprogram.

Då kör vi, en mall för testprogram.


###En katalog per testprogram {#en_mapp}

För min del tänker jag skapa en katalog per testprogram. I varje mapp lägger jag en index-fil som innehåller själva testprogrammet. Jag kommer använda lite PHP-kod så jag döper jag filen till `index.php`. I varje katalog lägger jag även en fil för den externa stylesheeten, `style.css` eller `style.less`, och en fil med min egna externa JS-kod, `main.js`. Jag skall försöka att undvika att lägga JS-kod i index-filen, jag försöker hålla all JS-kod i egna filer.

Så här blir mallen för `index.php`.

```html
<?php $title='Template for testprogram'; include(__DIR__ . '/../mall/header.php'); ?>

<div id='flash'>
<p id='text' class='red'>Hi this text should be replaced when page and DOM is loaded.</p>
</div>

<?php $path=__DIR__; include(__DIR__ . '/../mall/footer.php'); ?>
```

Jag väljer att göra en `header.php` och en `footer.php`. På det viset får jag mindre filer att ändra i.


###Mallen för `header.php` {#header-php}

Mallen för `header.php`:

```html
<!doctype html>
<html lang='en' class='no-js'>
<head>
<meta charset='utf-8' />
<title><?=isset($title) ? $title : 'Template for testprograms in JavaScript'?></title>
<link rel="stylesheet/less" type="text/css" href="style.less">
<script src="/js/less.min.js"></script>
<script src="/js/modernizr.js"></script>
</head>
<body>
```

Jag använder HTML5 som doctype, `<title> `kan sättas från testprogrammet med lite hjälp av PHP. Två JS-libb inkluderas, Modernizr och LESS, mer om det lite senare. Stylesheeten inkluderas i form av `style.less`.


###Länka till validatorer och manualer {#lanka_verktyg}

Jag skapar en `footer.php` med bra-att-ha länkar till validatorer, verktyg och manualer. Det är alltid smidigt att ha tillgång till testverktygen direkt från sin testkod. Följande kan vara en bra footer att utgå ifrån, lägg till dina egna val efterhand. 

Mallen för `footer.php`:

```html
<?php
  $d = explode("/", trim($path, "/"));
  $srcUrl = '../source.php?dir=' . end($d) . '&amp;file=' . basename($_SERVER["PHP_SELF"]) . '#file';
?>

<footer id='footer'>
<p><em>"Hey Luke, use the <a href='<?=$srcUrl?>'>source</a>."</em></p>

<nav>Validatorer: 
  <a href='http://validator.w3.org/check/referer'>HTML5</a>
  <a href='http://jigsaw.w3.org/css-validator/check/referer?profile=css3'>CSS3</a>
  <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a>
  <a href='http://csslint.net/'>CSS-lint</a>
  <a href='http://jslint.com/'>JS-lint</a>
</nav>

<nav>Verktyg: 
  <a href='http://dbwebb.se/forum'>forum</a>
  <a href='http://dbwebb.se/style'>style</a>
  <a href='http://jsfiddle.net/'>jsfiddle</a>
  <a href='http://jsfiddle.net/user/mikael_roos/fiddles/'>fiddles/mos</a>
  <a href='http://pastebin.com/'>pastebin</a>
  <a href='https://gist.github.com/'>gist</a>
  <a href='http://www.quirksmode.org/compatibility.html'>quirksmode</a>
  <a href='http://caniuse.com/'>when can I use</a>
  <a href='http://www.workwithcolor.com/hsl-color-schemer-01.htm'>colors</a>
  <a href='<?=$srcUrl?>'>source</a>
</nav>

<nav>Manualer: 
  <a href='http://www.w3.org/2009/cheatsheet'>Cheatsheet</a>
  <a href='http://www.w3.org/'>W3C</a>
  <a href='http://dev.w3.org/html5/spec/spec.html'>HTML5</a>
  <a href='http://www.w3.org/TR/CSS2'>CSS2</a>
  <a href='http://www.w3.org/Style/CSS/current-work#CSS3'>CSS3</a>
  <a href='https://developer.mozilla.org/en/JavaScript/Reference'>JS Core</a>
  <a href='https://developer.mozilla.org/en/Gecko_DOM_Reference'>JS DOM</a> 
  <a href='https://developer.mozilla.org/en/DOM/DOM_event_reference'>JS DOM Events</a> 
  <a href='http://php.net/manual/en/index.php'>PHP</a>
  <a href='http://api.jquery.com/'>jQuery</a>
  <a href='http://lesscss.org/'>LESS</a>
  <a href='https://developer.mozilla.org/'>Mozilla DN</a>
  <a href='http://developer.apple.com/library/safari/navigation/'>Apple DN</a>  
  <a href='http://www.w3schools.com/'>w3schools</a>
</nav>
</footer>
<script src="/js/jquery.js"></script>
<script src="../mall/mos.js"></script>
<script src="main.js"></script>
</body>
</html>
```

I slutet av `footer.php` länkar jag in jQuery och mitt `main.js` där tanken är att jag skriver min egna JS-kod för varje testprogram. Dessutom länkar jag in ett skript `mos.js` och där tänker jag mig att jag samlar bra-att-ha kod. Det kan vara egna små funktioner som jag samlar på mig efterhand och som är bra för majoriteten av testprogrammen. Det blir mitt egna lilla återanvändbara bibliotek av JavaScript funktioner.

PHP-koden krävs för att direktlänka till källkoden med hjälp av `source.php`.

[INFO]
**Tips om `source.php`** 

`source.php` är ett litet skript som visar källkoden i en katalog och alla underkataloger. Lägg det tillsammans med dina testprogram så blir det enkelt för andra att hjälpa dig. Ofta behöver man kunna se källkoden för att hjälpa till.

I mitt fall ligger källkoden för `source.php` i katalogen ovanför, på det viset slipper jag kopiera ned programmet i varje katalog för varje nytt testprogram. På det hela taget blir det enklast så.

Senaste versionen av `source.php` hittar du på [dbwebb.se/source](source).

[/INFO]

Det var footern det. Då går vi vidare.


###CSS eller LESS? {#less}

Jag funderade ett tag på hur jag skulle göra i denna kursen, skulle jag använda CSS, SCSS eller LESS för stylesheeeten? Efter lite klurande så blev det [LESS](http://lesscss.org/), det är samma som används i kursen [phpmvc](phpmvc) och det kommer göra att CSS-koden blir enklare och mer överskådlig, förutsatt att man anammar syntaxen i LESS. Det finns ett JS-libb som hanterar översättningen av LESS till CSS så all översättning från LESS till CSS sker i webbläsaren.

Jag funderade även på att använda [SASS/SCSS](http://sass-lang.com/) men valet föll på LESS till slut. Anledningen var mest att det fanns ett väl fungerande JS-libb (när jag tittade) och att jag känner mig hemma i LESS, annars betraktar jag dessa två, LESS och SASS/SCSS, som likvärdiga alternativ för att skriva bättre strukturerad CSS-kod. 

För att komma igång med LESS behöver du ladda ned JS-libbet och lägga på en bra plats och länka till det från ditt testprogram. Jag gör ett enkelt test i mina filer så att du kan se hur det fungerar. 

JS-skriptet för LESS laddas i `<head>`.

```html
<link rel="stylesheet/less" type="text/css" href="style.less">
<script src="/js/less.min.js"></script>
</head>
```

Här är ett kort enkelt exempel på LESS-kod.

```css
/** --------------------------------------------------------------
 * CSS3 mixins.
 * 
 */
.border-radius(@radius:5px) {
  -webkit-border-radius: @radius;
     -moz-border-radius: @radius;
          border-radius: @radius;
}

.box-shadow(@shadow:5px 5px 5px 5px @grey) {
  -webkit-box-shadow: @shadow;
     -moz-box-shadow: @shadow;
          box-shadow: @shadow;
}
```

Jag strukturerar min stylesheet-kod så att jag lägger lite blandat bra-att-ha i en fil `base.less`. Sedan gör jag en `style.less` som gör `@import` på `base.less`. På det viset kan jag bygga upp min `base.less` efter hand och spara bra-att-ha konstruktioner i den. En `style.less` finns i varje nytt testprogram och innehåller endast de delar som är specifika för testprogrammet. Bra eller inte, men jag prövar att göra så.

`style.less` i sitt utgångsläge:

```css
/**
 * Import base style
 */
@import "../mall/base.less";

/**
 * Here comes specific style for a certain test program.
 */

```

* [Källkod för `style.less` i mallen](javascript/lekplats/source.php?dir=mall&file=style.less)

* [Källkod för `base.less` i mallen](javascript/lekplats/source.php?dir=mall&file=base.less)

Låter det krångligt? Jo, det är en hel del att få ihop. Men detta är helt enkelt för att jag kommer skriva en hel del testprogram och jag vill gärna ha en bra struktur som inte blir för rörig och jag vill kunna återanvända delar av koden. Jag tror du vinner på en liknande struktur för din egen mall.

[INFO]
**Ändringar i `base.less` ändrar inte stylen?**

När du enbart ändrar i den importerade stylesheeten `base.less` så kommer det *inte* upptäckas av kompilatorn. Se därför till att alltid spara om `style.less` vilket tvingar att hela stylesheeten kompileras om.
[/INFO]


[INFO]
**Serverside LESS med `style.php`** 

I kursen **phpmvc** används LESS tillsammans med `style.php` som sköter kompilering av LESS till CSS-kod på serversidan. Oftast är serverside kompilering att föredra, men i denna kursen kör jag klientside. Du kan [läsa mer om `style.php` i forumet](f/1489).
[/INFO]

[INFO]
**Jag vill INTE LESS** 

Ok, gör det inte då. LESS är inte en central del av kursen, det är en bra-att-kunna teknik som krävs i fler och fler jobbannonser. LESS är ett bättre sätt att skriva CSS-kod. Om du tycker det är tillräckligt utmanande att göra JavaScript så bör du kanske passa på LESS. Vill du använda ren CSS-kod så går det bra, vill du använda SASS/SCSS eller någon ännu nyare teknik så går det också bra. Gör i så fall ett medvetet val. Alla mina testprogram bygger på LESS.
[/INFO]


###Browserkompatibelt eller ej? {#kompabilitet}

JS och kompabilitet mellan olika webbläsare är ett spännande kapitel, eller inte. Numer blir det dessutom mer och mer intressant att även vara kompatibel med olika mobila enheter. En djungel kan det bli, helt enkelt. 

Frågan är om jag ska bry mig om kompabilitet i denna kursen, men svaret blir att jag delvis måste det. Jag måste ha ett sätt att hantera kompabilitet, även om jag bara kör mina testprogram i Firefox så behöver man ha en taktik för hur de kan köras i andra läsare. Oftast är det ju webbläsaren Internet Explorer som kan vara bekymmersam.

Nåväl, jag vänder mig till ett JS-libb som heter [Modernizr](http://modernizr.com/) för hjälp. Till att börja med så ser det till att HTML5-elementen känns igen, på samma sätt som [HTML5 Shiv](http://en.wikipedia.org/wiki/HTML5_Shiv) gör, sedan finns det metoder för att underlätta hanteringen av kompabilitet mellan webbläsare och stöd för de senaste konstruktionerna i tex CSS3. Vi kan ta det efterhand vi behöver det.

Det är enkelt att inkludera Modernizr, ladda ned JS-filen och inkludera den i sektionen `<html><head>`. Lägg sedan till klassen `no-js` till `<html>` elementet. Modernizr kommer ersätta klassen `no-js`, med en lista på de features som fungerar i din webbläsare, förutsatt att JavaScript är på i webbläsaren förstås. Detta underlättar s.k. "[feature-detection](http://stackoverflow.com/questions/1294586/browser-detection-versus-feature-detection)". Beroende på vad som stöds kan jag skriva min stylesheet för att hantera de olika fallen, eller välja att ladda in en [shim](http://en.wikipedia.org/wiki/Shim_%28computing%29), eller [polyfill](https://remysharp.com/2010/10/08/what-is-a-polyfill) [^10], för en specifik feature. 

```html
<html class='no-js'>
...
<script src="/js/modernizr.js"></script>
</head>
```

Så här kan det se ut när skriptet har körts och `<html class='no-js'>` modifierats av Modernizr.

[FIGURE src=/image/javascript/intro/004.jpg?w=w2 caption="Många features stöds i min Firefox, det är bra det."]

Jag har inte för avsikt att testa alla mina program i olika webbläsare, men nu kommer jag i alla fall vara förberedd för att hantera det. Modernizr kan vara en bra resurs, vi får se under kursens gång.

Du kan skapa ditt egna libb på Modernizr och välja de delar som det skall innehålla, eller så kopierar du mitt bibliotek:

* Mikael's Modernizr variant:  
  [js/modernizr.js](js/modernizr.js)



###jQuery och `ready()` {#jquery}

Ofta vill man vänta att exekvera JS-koden tills att dokumentet är laddat och klart. Det är lite klurigt att testa det, i alla fall om man vill att testet skall fungera i alla webbläsare. JS-biblioteket [jQuery](http://jquery.com/) har en behändig [`ready`-funktion](http://api.jquery.com/ready/) som vi kan använda så att vi är säkra på att hela dokumentet är laddat i webbläsaren, innan vi gör något. Den funktionen är kompatibel mellan olika webbläsare.

Vi kommer ju att använda jQuery under kursens gång så det är lika bra att stoppa in det i testmallen från början. Jag laddar ned senaste verionen av jQuery och integrerar i mitt testprogram. Jag laddar jQuery tillsammans med min `main.js` längst ned, strax innan `</body>`.

```html
</footer>
<script src="/js/jquery.js"></script>
<script src="main.js"></script>
</body>
</html>
```

Jag väljer det vanliga skriptet och inte det minifierade, jag tänkte att det kan vara bra att studera koden, man kanske kan lära sig något av det. Du kan själv hämta din version av skriptet, ta den senaste versionen, från [jQuery's webbplats](http://jquery.com/).

Du kan se vilken version jag använder genom att kika på mitt skript.

* [Den version som Mikael använder i kursen](js/jquery.js).


`ready()`-funktion placerar jag i mitt `main.js`.

```javascript
$(document).ready(function(){
   // Your code here
});
```

Min egen kod för test-programmen skriver jag inom denna funktionen, då vet jag att hela sidan och alla dess element är laddad i webbläsaren.


###Lekplats för JavaScript {#lekplats}

Då var vi klara. Jag är redo att skapa min lekplats för JS-kodande. Alla kodexempel får en egen katalog och de filer som jag skapat så här långt lägger jag i katalogen `mall`. Du kan se alltihop via "lekplatsen".

* [Mikael's lekplats för JS-kod](javascript/lekplats/).

* Mallen finns i [katalogen `mall`](javascript/lekplats/mall).

Så här ser det ut när jag kör testmallen (jag kan ha uppdaterat mallen sedan första kursmomentet så om du kör den nu kan bilden se aningen annorlunda ut).

[FIGURE src=/image/javascript/intro/005.jpg?w=w2 caption="Mallen för testprogram är redo. Med Firebug kan du se vilka resurser som laddas."]

* [Källkoden till mallen](javascript/lekplats/source.php?dir=mall).

Varje gång jag startar ett nytt testprogram så ser min katalog ut så här:

* [javascript/lekplats/sample](javascript/lekplats/sample)

Jag lägger även upp en mall i JSFiddle för att snabbt skriva testprogram. 

* [Mikael's mall för testprogram i JSFiddle](http://jsfiddle.net/mikael_roos/bHhAz/).

[FIGURE src=/image/javascript/intro/006.jpg?w=w2 caption="Mallen för testprogram, även i JSFiddle. Vi vet vad som väntar oss, felsökning och åter felsökning."]

Glöm inte att köra din kod i JSLint med jämna mellanrum, kod-kvalitet är bra. Så här ser det ut när jag kör koden från min `main.js`.

[FIGURE src=/image/javascript/intro/007.jpg?w=w2 caption="Koden i `main.js` passerar JSLint, stiligt."]

Kanske är du redan klar, men om inte så får du nu en uppgift, "get your hands dirty".

[INFO]
**UPPGIFT**

Ta nu och sy ihop din egna mall för dina testexempel. Utgå från min mall eller gör din egen. Testa och lek tills du har koll på de olika delarna. Se till att du kan hantera JSFiddle och att ditt testprogram passerar de olika validatorerna.
[/INFO]

Bra, då har du en egen mall, eller hur? Då går vi vidare.



Webbläsare och dess komponenter {#webblasare}
---------------------------------------------

Innan vi går vidare så behöver vi säga något om webbläsare och dess huvudkomponenter. De två komponenterna som är viktigast för oss just nu är webbläsarens renderingsmotor och dess implementation av JavaScript. 


###Renderingsmotorer i webbläsare {#renderingsmotor}

[Gecko](https://developer.mozilla.org/en/Gecko) är Mozillas renderingsmotor som används i Firefox, det är den som ansvarar för att rita upp själva webbsidan utifrån HTML-dokumentet som utgör källan. Olika webbläsare har olika [renderingsmotorer](http://en.wikipedia.org/wiki/Web_browser_engine), se tabellen längre ned för en översikt av webbläsare och dess renderingsmotor.


###Implementationer av JavaScript {#implementationer}

Det finns standalone motorer för JS, såsom [Rhino](https://developer.mozilla.org/en/Rhino) och [node.js](http://nodejs.org/) som låter dig skriva JavaScript-kod på servern som en vanlig applikation. Men denna kursen handlar om att köra JS i en webbläsare. Olika webbläsare har olika implementationer av JS och därmed skiljer också implementationerna åt, på gott och ont. 

Det finns många implementationer av JavaScript, [Wikipedia har en lista](http://en.wikipedia.org/wiki/List_of_ECMAScript_engines). Kika i tabellen längre ned för att se de vanligaste webbläsarna och namnen på deras JavaScript-motor.


###Webbläsare med renderingsmotor och JS-implementation {#webblasare-tabell}

Tabellen nedan visar en översikt av olika webbläsare med renderingsmotor och JavaScript implementation.

| Webbläsare | Renderingsmotor | JavaScript implementation |
|------------|-----------------|---------------------------|
| Firefox    | [Gecko](https://developer.mozilla.org/en/Gecko) | [SpiderMonkey](https://developer.mozilla.org/en/SpiderMonkey) |
| Google Chrome | [Webkit](http://www.webkit.org/) | [V8](http://code.google.com/p/v8/) |
| Safari | [Webkit](http://www.webkit.org/) | [SquirrelFish](http://en.wikipedia.org/wiki/SquirrelFish_%28JavaScript_engine%29#JavaScriptCore) |
| Opera | [Presto](http://en.wikipedia.org/wiki/Presto_%28layout_engine%29) | [Carakan](http://en.wikipedia.org/wiki/Presto_%28layout_engine%29#ECMAScript_engines) |
| Internet Explorer | [Trident](http://en.wikipedia.org/wiki/Trident_%28layout_engine%29) | [Chakra](http://en.wikipedia.org/wiki/Chakra_%28JScript_engine%29) |

Ha denna tabellen i bakhuvudet när vi går vidare. Varje webbläsare är en egen produkt med egen kod och däri ligger också grunden till en del av de kompabilitetsproblem som finns mellan olika webbläsare. Naturligtvis i en kombination med hur W3C's standarder är skrivna. Webbplatsen [quirksmode](http://www.quirksmode.org/compatibility.html) är en bra resurs för att ha koll på hur väl olika webbläsare stödjer olika delar av specifikationerna.

[FIGURE src=/image/javascript/intro/010.jpg?w=w2 caption="Quirksmode med lista över stödet av "DOM events" i webbläsare."]

En liknande webbplats är "[When Can I Use](http://caniuse.com/)" som ger en översikt av stödet i olika webbläsare. I bilden nedan ser du en översikt över stödet för olika delar av JavaScript.

* [caniuse.com/#cats=JS_API](http://caniuse.com/#cats=JS_API)

[FIGURE src=/image/javascript/intro/013.jpg?w=w2 caption="När kan jag använda olika features i en viss webbläsare, bra information."]

Bra, då har vi koll på grunderna i en webbläsare. Det är liksom nödvändigt. Då går vi vidare.


JavaScript och Webbläsaren {#delar}
------------------------------------------------

Låt oss kika runt lite på det som vi kallar JavaScript och vad det egentligen består av.


###JavaScript Core {#core}

Kärnan i JS bestäms av [Ecma International](http://www.ecma-international.org/) i specifikationen [ECMA-262](https://developer.mozilla.org/en/JavaScript/Language_Resources). Detta blir alltså JS Core. Mozilla Developers Network (MDN) har en [referensmanual](https://developer.mozilla.org/en/JavaScript/Reference)  som ger en snabb översikt av innehållet i JS Core. Se till att bekanta dig med den manualen och se till att du känner dig hemma där.


###JavaScript i webbläsaren {#webblasaren}

När JavaScript körs i en webbläsare så finns ytterligare saker utöver JS Core som är nödvändiga. Låt oss kika på DOM, `window`-objektet och event-hantering. Tre viktiga delar i kombinationen JavaScript och webbläsare.


####`window` och det globala scoopet {#window}

I en webbläsare finns JS objektet `window`, det är det globala objektet som allt utgår ifrån. Om vi deklarerar en variabel, utan att ge den en tillhörighet, så hamnar den automatiskt under `window`.

Se följande bild som en illustration till objektet `window` och det globala scoopet.

[FIGURE src=/image/javascript/intro/009.jpgw=w2 caption="I Firebug går det utmärkt att exekvera JS-kod direkt via dess "Console"."]

Som en förklaring till ovanstående så öppnade jag en [tom webbsida](/javascript/lekplats/empty.html), du kan även öppna en tom webbsida genom att skriva `about:blank` i adress-fältet, och sedan skrev jag JS-kod i Firebugs "Console". Jag skapade en ny variabel som hamnade i det globala scoopet, dvs direkt under `window`.

Pröva sjäv att öppna Firebugs Console och skriv följande kodrad:

```javascript
alert('Hello World')
```

Poppar det upp en ruta med texten "Hello World" så gjorde du rätt.
 

####JavaScript Document Object Model (DOM) {#dom}

I webbläsaren finns själva webbsidan representerad i objektet `document`. Det är detta objekt som vi pratar med för att läsa av webbsidans utseende, eller modifiera det. Gränssnittet till objektet `document` styrs av det som kallas DOM. DOM är ett programmerings-gränssnitt till webbsidor, det erbjuder ett sätt att komma åt varje liten del i en webbsida. Läs igenom följande artikel på MDN för att få en snabb översikt om vad det handlar om.

* [MDN: Vad är DOM?](https://developer.mozilla.org/en/Gecko_DOM_Reference/Introduction)

MDN har samlat sitt material om DOM på en plats, gör en snabb koll på webbsidan så att du vet vad som finns där. Det blir en bra referens under kursen.

* [MDN: Allmän referens och material för DOM](https://developer.mozilla.org/en/DOM).

Via Firebug kan du detaljstudera innehållet i objekten `window` och `document` via menyvalet "DOM".

[FIGURE src=/image/javascript/intro/011.jpg?w=w2 caption="En översikt av JavaScript objekt via Firebug menyval "DOM"."]

Öppna en webbsida och välj Firebugs menyval för DOM. Studera vad `document` och `window` innehåller.


####Händelsestyrd programmering, "event-driven" {#event-driven}

När du klickar runt på en webbsida, i en webbläsare, så genereras en massa händelser, så kallade "events". Det kan vara att du rör musen över ett objekt, markerar texten eller klickar på ett objekt. Det finne en typ av programmeringsparadigm som kallas "[event driven programming](http://en.wikipedia.org/wiki/Event-driven_programming)" vilken innebär att man kopplat "callbacks" till dessa "events". I JavaScript kan vi koppla funktioner, "callbacks", till dessa "events"/händelser. MDN har en [referens](https://developer.mozilla.org/en/DOM/DOM_event_reference) över de "DOM event" som finns.

För en JavaScript-programmerare är det viktigt att förstå händelsestyrd programmering och hur man kan använda det. Flera av våra kommande exempelprogram använder sig av denna programmeringsparadigm.


###W3C och DOM {#w3cdom}

I specifikationen för HTML5 finns inkluderat ett DOM-interface för varje HTML element. Du kan enkelt slå upp det via [Cheatsheet](http://www.w3.org/2009/cheatsheet/), sök på `img` för att få fram HTML elementet `<img>`, skrolla ned och klicka på "Specification" och du kommer till specifikationen för elementet, där kan du se dess DOM interface. Detta kan vara ett bra sätt att ta reda på vad du kan göra med ett visst DOM element.

[YOUTUBE src=Kv5GG4UGbb4 width=613 caption="Hitta DOM interface för ett HTML element via Cheatsheet."]


###Referensmanual för JavaScript DOM {#ref-js-dom}

Det finns en referensmanual, Gecko's [DOM Reference](https://developer.mozilla.org/en/Gecko_DOM_Reference), som vi kan luta oss mot när vi vill slå upp information om `window`, `document` och `event`. Det är en manual som visar hur Firefox Gecko implementerar JavaScript DOM. Denna manual får räcka under denna kursens gång, vi är väl medvetna om att varje webbläsare kanske borde ha sin egna manual för detta syftet. Men vi räknar kallt med att det är en standard som skall implementeras och det **bör** vara lika i alla webbläsare. 

Blir vi osäkra på kan vi alltid kika på [quirksmode](http://www.quirksmode.org/compatibility.html) eller [When Can I Use](http://caniuse.com/).



En åter-introduktion till JavaScript {#ater-introduktion}
------------------------------------------------

Det sägs att JavaScript är "[Världens mest missförstådda programspråk](http://javascript.crockford.com/javascript.html)". Vad kan då vara bättre en en rejäl introduktion till språket som vi vill lära oss. Det finns en bra artikel på MDN, som ger oss en översikt av språket och hur man kan och  bör, skriva sin kod. Artikeln ger dig en bas att stå på. Skumläs någorlunda snabbt så du får en känsla för vad artikeln handlar om, det kan vara bra att gå tillbaka till den under kursens gång.

* [En åter-introduktion till JavaScript](https://developer.mozilla.org/en/JavaScript/A_re-introduction_to_JavaScript).

Härligt, nu  är det dax att leka lite, koda lite testprogram, det som vi väntat så länge på :-D.


Låt oss göra ett par testprogram {#testprogram}
------------------------------------------------

Det har blivit en del att läsa, det är bra, och nödvändigt, men låt oss nu koda loss med lite enklare testprogram för att se hur bra koll vi har. 

[INFO]
**Varning...**

Så här långt så har vi ju egentligen inte lärt oss mycket till JavaScript så du får säkert kika en hel del på mina testprogram. Tanken är inte att du själv skall kunna skriva dem i detta läget. Studera dem istället, kopiera dem och försök att varsamt modifiera dem så de gör aningen annorlunda. Det räcker gott och väl för detta första kursmoment. Vi vill mest bekanta oss med miljön så här långt.

Dessutom blandar testprogrammen in en del CSS3 och det finns en tanke med det. Animeringar kan göras i JavaScript, men det kan också göras med CSS3. Varje gång vi väljer en teknik så är det bra om vi vet alternativa lösningar. Så att vi inte stirrar oss blinda på en teknik. Så, lek nu och ha kul. :-D 
[/INFO]


###Ändra storleken på ett element {#resize}

[YOUTUBE src=DRN1qE8uVCg width=613 caption="Ändra storlek på element med JavaScript."]

Jag vill kunna ändra storleken på ett element, i detta fallet en `<div>`. Jag gör ett formulär i `index.php`. Det börjar med att visa elementets nuvarande storlek. Med lite kod så kopplas en eventhanterare till knappen och en funktion ("callback") som anropas när användaren klickar på knappen. Den nuvarande storleken visas, `innerWidth`, och den nya storleken sätts med `element.style.width`.

Här kommer koden som jag lagt i min mall för testprogram.

`index.php`

```html
<div id='flash'>
<form id='size'>
<p>
  <label>Width: <input id='width' type='number' /></label> 
  <label>Height: <input id='height' type='number' /></label> 
  <input id='resize' type='button' value='Resize' />
</p>
</div>
```

`main.js`

```javascript
/**
 * When the submit-button is clicked, resize the div
 */
$(document).ready(function(){
  'use strict';
  var values, target;

  target = document.getElementById('flash');
  values = document.getElementById('size');
  values['width'].value = target.offsetWidth;
  values['height'].value = target.offsetHeight;    

  values['resize'].onclick = (function() {
    var width, height;
    width = values['width'].value;
    height = values['height'].value;    
    console.log('Resize it to ' + width + ' x ' + height + '. Current is: ' + target.offsetWidth + ' x ' + target.offsetHeight);
    target.style.width = width+'px';
    target.style.height = height+'px';
  });
  
  console.log('Current size is ' + target.offsetWidth + ' x ' + target.offsetHeight);
  console.log('Element now has listener on event onclick attached: ' + values['resize'].onclick);
});
```

Testprogrammet skapar ett formulär som visar nuvarande storlek, ändra på värdena och klicka på knappen så kommer elementet att ändra storlek. Exemplet finns att beskåda på nedanstående länk:

* [Ändra storlek på div](javascript/lekplats/resize-element)

[FIGURE src=/image/javascript/intro/012.jpg?w=w2 caption="Ändra storlek på ett element."]

I detta sammanhanget kan det vara bra att fräscha upp minnet och läsa på om ["hur stor är en div"](https://developer.mozilla.org/en/Determining_the_dimensions_of_elements)? 

Apropå storleken, pröva att öppna exemplet och klicka direkt på knappen, nuvarande storlek är alltså inte samma som den som sätts. Kan du klura ut varför det blir så?

[INFO]
**UPPGIFT**

Utgå från min kod och skapa ditt egna exempelprogram som gör samma sak. Det blir en bra övning i att skapa testprogram, och det låter dig testa din mall för testprogram.
[/INFO]


###Flytta en gubbe på skärmen {#gubbe}

[YOUTUBE src=aa_esHJiSwU width=613 caption="Flytta runt en baddie på skärmen."]

Här gör vi ett program som visar hur du kan ta hand om events/händelser från tangentbordet samt hur du kan hantera en [CSS sprite](http://en.wikipedia.org/wiki/Sprite_(computer_graphics)#Sprites_by_CSS) [^8]. Med piltangenterna flyttar du runt en gubbe på skärmen. Gubben finns i en bild, en CSS sprite,  som ser ut så här.

[FIGURE src=/img/sprite_mickey_mos.png caption="Fyra varianter av "Mickey Mos" i en CSS sprite."]

Det är alltså fyra gubbar som är tänkta att visas som en bakgrundsbild i en `div`, olika gubbar visas beroende på vilken riktning som "Mickey" går i. I stylesheeten defineras var respektive gubbe ligger i bilden.

Delar av `style.less` som definerar gubben.

```css
#b1{position:absolute;}

.baddie{width:64px;height:64px;background-image:url(/img/sprite_mickey_mos.png);
  &.up{background-position:64px 0;}
  &.down{background-position:128px 0px;}
  &.left{background-position:192px 0;}
  &.right{background-position:0 0;}
}
```

Jag låter gubben gå omkring i hela webbläsaren, utan några restriktioner, det enda jag gör är att skapa en `<div id='b1'>` (b1 för baddie nummer 1) som skall visa gubben.

Delar av `index.php`:

```html
<div id='flash'>
Hi, I'm a baddie, my name is "Mickey Mos", click to move me or just move me with the keys arrows, space, h, b, f, r. Have fun!
<div id='b1' class='baddie down'></div>
</div>
```

I JS-koden blir utmaningen att hålla koll på event från tangentbordet och flytta gubben beroende på vilken tangent som trycks ned. När gubben flyttas så sätts också rätt bild på gubben, beroende på riktningen.

Delar av `main.js`:

```javascript
moveIt = function(moveLeft, moveTop) {
  target.style.left = (target.offsetLeft + moveLeft) + 'px';
  target.style.top  = (target.offsetTop + moveTop) + 'px';
};
moveIt(0, 0);

document.onkeydown = function(event) {
  var key;
  key = event.key || event.which;
  switch(key) {
    case 37:  // arrow left 
      target.className='baddie left'; 
      moveIt(-step, 0); 
      break;
    case 39:  // arrow right 
      target.className='baddie right'; 
      moveIt(step, 0); 
      break;
    case 38:  // arrow up
      target.className='baddie up';
      moveIt(0, -step); 
      break;
    case 40:  // arrow down
      target.className='baddie down';
      moveIt(0, step); 
      break;
    case 66:  // b = back
      target.style.zIndex = -1;
      break;                   
    case 70:  // f = front 
      target.style.zIndex = 1;
      break;
    case 72:  // h = home 
      moveIt(left-target.offsetLeft, top-target.offsetTop);
      break;
    case 32:  // space = jump
      moveIt(0, -step);
      // What jumps up, must come down, a bit later.
      setTimeout(function(){moveIt(0, step);console.log('Timer!');}, 300);
      break;
    case 82:  // r = random
      moveIt(step*Math.floor(Math.random()*(3)-1), step*Math.floor(Math.random()*(3)-1));
      break;
    default:
      target.className='baddie down';
      break;
  }    
  console.log('Keypress: ' + event + ' key: ' + key + ' new pos: ' + target.offsetLeft + ', ' + target.offsetTop);
};

area.onclick = function(event) {
  moveIt(event.clientX-target.offsetLeft-32, event.clientY-target.offsetTop-32);
  console.log('Clicked area.' + event + ' Moving baddie to mouse pointer position.');
};
```

Jag använder CSS3 transitions för att få mjuka övergångar när gubben rör sig.  

Du kan testa mitt exempel på följande länk.

* "Mickey Mos" vandrar omkring:  
  [javascript/lekplats/move-around-css-sprite-using-css3-transitions](javascript/lekplats/move-around-css-sprite-using-css3-transitions)
  
Studera källkoden för exemplet och bekanta dig med vad som händer.


[INFO]
**UPPGIFT**

Utgå från min källkod i exemplet (inte källkoden i texten ovan) och gör din egna baddie. 

På detta stadiet så är taktiken att kopiera min kod försöka förstå de olika delarnas huvuddrag och varsamt modifiera - om humöret faller på. Exemplet är egentligen lite komplext i sig, men du reder säkert ut det. Jag är glad om du förstår huvuddragen i exemplet, det finns inget krav på att du skulle kunna skriva det själv. Inte så här långt.

Du kan låna min baddie om du inte vill skapa en egen. Att lära sig hantera CSS sprites är dock en bra övning i sig.
[/INFO]


[INFO]
**Skapa din egna gubbe, en egen baddie**

Jag tog originalbilden i SVG format, kopierade och editerade i [Inkscape](http://inkscape.org/) och vips fick jag en egen CSS sprite.

* Sök på "baddie" på [OpenClipart](http://openclipart.org/)   
  [openclipart.org/tags/baddie](http://openclipart.org/tags/baddie)

* Min originalbild i SVG för CSS spriten "Mickey Mos":  
  [img/sprite_mickey_mos.svg](img/sprite_mickey_mos.svg)
  
Vill du veta med om hur man ritar en baddie?

* [Hur du ritar "Pac-Man baddies with Inkscape"](http://howto.nicubunu.ro/inkscape_pacman_baddies/)

[/INFO]



###CSS3 Transitions och 2D Transforms {#transitions-transforms}

[YOUTUBE src=90uDSUiC_2Y width=613 caption="En animerad baddie med hjälp av CSS3 Transforms och Transitions."]

I föregående exempel använde jag något som heter [CSS3 Transitions](http://www.w3.org/TR/css3-transitions/) som inför möjligheten att animera förändringar, övergångar från ett läge till ett annat, i styleheet-kod. Det finns också något som heter [CSS3 Transforms](http://www.w3.org/TR/css3-transforms/) som ger möjlighet att ändra form och flytta ett element med CSS-kod.

Låt mig visa hur detta kan fungera om man använder det på en baddie. Jag gör ett exempelprogram som visar hur ett antal CSS 2D Transforms fungerar tillsammans med CSS3 Transitions. Du kan se exempel på nedanstående länk.

* [javascript/lekplats/css3-2d-transforms-with-transitions](javascript/lekplats/css3-2d-transforms-with-transitions)

[FIGURE src=/image/javascript/intro/014.jpg?w=w2 caption="Så här ser det ut när det börjar."]

[FIGURE src=/image/javascript/intro/015.jpg?w=w2 caption="Här har jag klickat runt och flyttat runt min baddie."]

Så här fungerar det, först källkoden.

Delar av `main.js`:

```javascript
var t1 = document.getElementById('b1'),
  t2 = document.getElementById('b2'),
  t3 = document.getElementById('b3'),
  t4 = document.getElementById('b4'),
  t5 = document.getElementById('b5'),
  t6 = document.getElementById('b6'),
  t7 = document.getElementById('b7'),
  t8 = document.getElementById('b8');

t1.swap = t2.swap = t3.swap = t4.swap = t5.swap = t6.swap = t7.swap = t8.swap = 1;

t1.onclick = (function() { this.className = (this.swap++ % 2) ? 'baddie flip' : 'baddie'; });
t2.onclick = (function() { this.className = (this.swap++ % 2) ? 'baddie flipx2' : 'baddie'; });
t3.onclick = (function() { this.className = (this.swap++ % 2) ? 'baddie size-half' : 'baddie'; });
t4.onclick = (function() { this.className = (this.swap++ % 2) ? 'baddie size-double' : 'baddie'; });
t5.onclick = (function() { this.className = (this.swap++ % 2) ? 'baddie skew-horisontal' : 'baddie'; });
t6.onclick = (function() { this.className = (this.swap++ % 2) ? 'baddie skew-vertical' : 'baddie'; });
t7.onclick = (function() { this.className = (this.swap++ % 2) ? 'baddie move' : 'baddie'; });
t8.onclick = (function() { this.className = (this.swap++ % 2) ? 'baddie move-flip' : 'baddie'; });
```

Delar av `style.less`:

```css
.baddie{cursor:pointer;width:64px;height:64px;background-image:url(/img/sprite_mickey_mos.png);.transition(all,1.5s);
  &.up{background-position:64px 0;}
  &.down{background-position:128px 0px;}
  &.left{background-position:192px 0;}
  &.right{background-position:0 0;}
  &.flip{.rotate(180deg);}
  &.flipx2{.rotate(-540deg);}
  &.size-half{.scale(0.5);}
  &.size-double{.scale(2);}
  &.skew-horisontal{.skew(30deg,0);}
  &.skew-vertical{.skew(0,30deg);}
  &.skew-vertical{.skew(0,30deg);}
  &.move{.translate(100px,100px);}
  &.move-flip{.transform(e('rotate(180deg) translate(100px,100px)'));}
}
```

Vill du se hur respektive LESS mixin är uppbyggd så letar du reda på den i `mall/base.less`.

* [Källkoden till `base.less`](javascript/lekplats/source.php?dir=mall&file=base.less#file)

Poängen med övningen är, förutom att vara ett bra exempel på styrkan i LESS, är att det finns flera tekniker i webbutvecklingen och man kan göra liknande saker i teknikerna. Ta t.ex. animeringar i webbsidan, bör man använda JavaScript eller CSS3 eller kanske SVG-animeringar? Svaret beror på vad man vill göra och i vilken miljö ens program skall fungera. Man bör skaffa sig en känsla för vad som är rätt och fel och vilken teknik som troligen är bäst och kommer vinna i längden.

[INFO]
**UPPGIFT**

Använd din baddie och gör ett enkelt exempel där du använder dig av CSS Transformations.
[/INFO]


[INFO]
**EXTRA UPPGIFT**

Kan du få din baddie att göra en [stående dubbel saltomortal framåt](http://sv.wikipedia.org/wiki/Saltomortal) genom att kombinera de tekniker du lärt dig?
[/INFO]



Avslutningsvis {#avslutning}
------------------------------

Äntligen har vi kommit till slutet av första kursmomentet som ger dig en bas att stå på. Du har fått en utvecklingsmiljö, skrivit ett par testprogram, du vet nu var manualerna finns och du har lite koll på programmeringsspråket JavaScript. Perfekt! Nu kan vi gå vidare. Men vila upp dig lite först. Sen sätter vi tänderna i kmom02 och kärnan i JavaScript, JavaScript Core tillsammans med lite DOM och events.

Bra jobbat så här långt!



Referenser {#referenser}
------------------------

Följande är referenser som använts som fotnötter i texten.

[^1]: [Stackoverflow: JSLint ger felmeddelande om `'strict mode'`](http://stackoverflow.com/questions/1335851/what-does-use-strict-do-in-javascript-and-what-is-the-reasoning-behind-it).

[^2]: [Vad innebär `'strict mode'`](http://ejohn.org/blog/ecmascript-5-strict-mode-json-and-more/)?

[^3]: [Stackoverflow: Deklarera alla variabler i toppen i ett `var`-uttryck](http://stackoverflow.com/questions/7357736/jslint-problems-declaring-variables).

[^4]: [Stackoverflow: Använd helst `===` för jämförelse, `==` gör automatisk konvertering av värdet](http://stackoverflow.com/questions/3735939/jslint-expected-and-instead-saw).

[^5]: [Stackoverflow: `document.write` kan vara en typ av `eval`](http://stackoverflow.com/questions/5488843/jslint-document-write-can-be-a-form-of-eval-how-is-this-so).

[^6]: [Stackoverflow: Hur anropa en Js-funktion via en vanlig länk](http://stackoverflow.com/questions/4072305/how-to-correctly-set-an-url-calling-a-javascript-function)?

[^7]: [Stackoverflow: Varför gillar JSLint inte `onclick` eventhantering i HTML element](http://stackoverflow.com/questions/3840389/why-does-jslint-restrict-the-use-of-html-event-handlers)?

[^8]: [Smashing Magazine: The Mystery of CSS Sprites: Techiniques, tools and tutorials](http://coding.smashingmagazine.com/2009/04/27/the-mystery-of-css-sprites-techniques-tools-and-tutorials/).

[^9]: [Wikipedia: Dirty hands](http://en.wikipedia.org/wiki/Dirty_hands).

[^10]: [HTML5 Cross Browser Polyfills](https://github.com/Modernizr/Modernizr/wiki/HTML5-Cross-Browser-Polyfills).

[^11]: [Mozilla Developers Network: Strict mode](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Functions_and_function_scope/Strict_mode).
