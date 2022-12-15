---
author: mos
category:
    - webbprogrammering
    - html
    - css
    - php
    - kurs htmlphp
revision:
    "2020-09-15": (F, mos) Förtydligade html-strukturen.
    "2018-06-27": (E, mos) Uppdatering inför ht18 och htmlphp v3.
    "2017-08-28": (D, mos) Bort referens till Firebug.
    "2015-09-17": (C, mos) Stängde article element.
    "2015-09-15": (B, mos) La till semikolon som saknades i exempelkod.
    "2015-05-20": (A, mos) Första utgåvan inför htmlphp version 2.
...
Skapa en webbsida med HTML, CSS och PHP, steg 2
==================================

[FIGURE src=image/snapvt15/me2-res.png?w=c5&a=0,0,30,0 class="right" caption="En me-sida i version 2."]

Att bygga en webbplats innebär att man behöver någorlunda kunskaper i HTML, CSS och PHP. Det blir flera tekniker att ha koll på och det kan vara lite svårt i början. Vi tar därför små steg framåt för att uppgradera vår me-sida till version 2.

Vi blandar lite HTML, lite CSS och lite PHP. Via små enkla trix så får vi vår me-sida att se lite bättre ut. I slutet så prövar vi till och med att göra sidan responsiv för mobila enheter, bara för skojs skull.

<!--more-->



Förutsättningar {#pre}
---------------------------------

Du har en me-sida liknande den från artikeln [Skapa en webbsida med HTML, CSS och PHP](kunskap/skapa-en-webbsida-med-html-css-och-php).

Källkoden som används i artikeln finns inte publicerad, du behöver utgå från din befintliga webbplats och jobba igenom artikeln för att uppnå samma resultat.



<!--
Översikt av artikeln {#video}
---------------------------------

Det finns en videoserie som visar hur jag själv jobbar igenom artikeln. Du kan titta igenom videoserien samtidigt som du själv jobbar igenom artikeln.

Du hittar spellistan för videoserien under "[Skapa en webbsida med HTML, CSS och PHP, steg 2](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-bLnmB4xI9OemcgWq_Kzf_)".

[YOUTUBE src="XXX" list="PLKtP9l5q3ce-bLnmB4xI9OemcgWq_Kzf_" width=700 caption="Videoserie som ger dig en översikt och genomgång av artikeln."]
-->



Resultatet {#resultat}
---------------------------------

Jag är redan klar. Så här blev det för mig.

[FIGURE src=image/snapvt15/me2-res.png?w=w3 caption="Mikaels me-sida version 2."]

Utseendet spelar inte så stor roll, det handlar mer om strukturen bakom sidan.

Så, frågan är vad jag gjort och hur. Låt oss kika på det och gå igenom det, steg för steg.



HTML-element för `<main>` och `<article>` {#artikel}
--------------------------------------

Det handlar om att strukturera sidans innehåll i rätt html-element. Vad som är rätt och inte är inte alltid tydligt, men det finns grundstrukturer som är tydliga. Html-elementen har en *semantisk* mening, de berättar vilken typ av innehåll de har. Det underlättar när man läser sidans källkod, man ser tydligare vilken betydelse de olika elementen har.

Så här gjorde jag. Jag började att tillföra ett element `<main>` som wrappar sidans huvudsakliga innehåll. En sida kan ha diverse mer eller mindre relaterat innehåll, elementet `<main>` burkar samla det som är sidans huvudsakliga fokus.

Jag placerade sedan webbsidans artikel inom en `<article>`. Det är som det heter, en sammanhållande text som kan betraktas som en artikel, av något slag.

Artikeln fick en egen `<header>` och en `<footer>` där bylinen ligger. Strukturen ser ut så här.

```html
<!doctype html>
<head>
    <!-- Olika konstruktioner -->
</head>
<body>

<!-- Olika konstruktioner för sidans header och navbar -->

<main>
    <article>
        <header>
            <h1>Artiklens rubrik</h1>
            <p class="author">Uppdaterad <time datetime="2015-05-06 11:17:43">6:e maj 2015</time> av Mikael Roos</p>    
        </header>

        <p>Artikelns innehåll, bilder och så vidare.</p>

        <footer class="byline">
            <p>Innehåll för min byline, eventuellt en bild.</p>
        </footer>
    </article>
</main>

<!-- Olika konstruktioner för sidans footer -->

</body>
</html>
```

Jag brukar lägga till css-klasser där jag tycker det behövs, det gör det enklare att styla elementen. Det är inget man behöver göra från början, man kan fylla på med css-klasser efter hand, när man känner att det behövs. Som du ser av koden ovan har jag valt klasserna `author` och `byline`, mest för jag tycker det är enklare att styla de html-element som avses.

Som du ser så handlar html mycket om att märka upp innehållet, det är viktigt att man använder en god struktur för uppmärkningen. Men, det finns inget exakt facit för hur man ska göra. Genom att läsa specifikationerna och se hur andra gör - _best practice_, så lär man sig vad som fungerar och inte. Dessutom, om det ser bra ut i webbläsaren, då kan det ju inte vara helt fel, eller hur?



Specifikationer {#specar}
--------------------------------------

Det finns specifikationer för HTML och CSS. Det finns flera. Det finns olika versioner av teknikerna, de senaste omtalas som HTML5 och CSS3, men vi säger bara HTML och CSS som benämning på helheten av teknologien.

Varje version har sin egen specifikation. Det är inte alltid lätt att ha full koll på vilket html-element som hör till vilken specifikation, samma för css-konstruktionerna. Det är heller inte nödvändigt att veta det, iallafall inte i början.

De vanligaste specifikationerna är följande, länkarna leder till senaste versionen av specen.

* [HTML](https://www.w3.org/TR/html/)
* [CSS](https://www.w3.org/TR/CSS/)

När det gäller css så är specifikationerna uppdelade i moduler och det kräver att man är kunnig i vilka moduler som finns och vilka som är relevanta för närvarande. Man kan se en [översikt av alla css specifikationer och moduler](https://www.w3.org/Style/CSS/specs.en.html).

Allt eftersom så kan man behöva sätta sig in i respektive specifikation och ta reda på hur stödet är i webbläsaren för en viss specifikation. Men det låter vi vara till senare.

Så här i början är det inte jätteviktigt vilken spec som innehåller vad, men allt eftersom så kommer du troligen vilja ha bättre och bättre koll på det.



Cheatsheet {#cheatsheet}
--------------------------------------

Ett enkelt sätt, att komma igång med specifikationer över html-element och css-konstruktioner, är att använda verktyget [Cheatsheet](http://www.w3.org/2009/cheatsheet/). Där kan du söka efter element och konstruktioner och snabbt få fram information.

Öppna upp Cheatsheet och sök till exempel på html-elementet `pre`, eller `article`. Sök därefter på css-konstruktionen `color` och `background-color` så ser du lite hur det fungerar.

Du får här en snabbare väg att hitta, slå upp, ett element. Lär dig använda det. Det ger dig en snabb tillgång till information som annars finns i specifikationen.



Float och clear {#float}
--------------------------------------

Om du tittar på min webbsida så ser du att bilden på mig flyter till höger av texten. Det är en css-konstruktion som löser det genom att berätta att html-elementet skall flyttas ur sitt normala flöde och *flyta* till höger, eller vänster.

Float har att göra med sidans layout, hur elementen skall placeras på sidan. Tänk dig att webbläsaren ritar ut element efter element, sedan lägger webbläsaren till style på varje element. Att ändra ett element med stylen float kan förändra hur sidan ser ut.

Så här kan man göra, först i css.

```css
.right {
    float: right;
}
```

Och sen i html.

```html
<figure class="right">
```

Du kan kanske se hur du skulle göra för att skapa förutsättningar för att flyta en bild till vänster?

Om man börjar att flyta element så kan man ibland behöva stänga av flytandet. Man vill sluta att använda layouten för att flyta elementen och man vill att nästkommande element skall placeras "som vanligt". man stänger av flytandet med css-konstruktionen `clear`.

```css
.somediv {
    clear: left;
    clear: right;
    clear: both;
}
```

Man använder någon av left, right eller both för att stänga av flytandet.

Att flyta element är alltså ett enkelt sätt att påverka layouten på de element som ritas ut, *renderas*, i webbläsaren.

I ditt kursrepo har du ett exempelprogram under `example/float/float.html` som visar hur float fungerar.

Det finns även ett exempelprogram i `example/float/float-clear.html` som visar hur clear påverkar flytandet av element.

Se när jag testar exemplet.

[YOUTUBE src=tOjFaCwtSJU width=700 caption="Mikael kör igenom exempelprogrammet för float och clear."]

[YOUTUBE src=_j1XRxKtgEs width=700 caption="Mikael förtydligare när clear behövs."]

Den defekt som videorna påvisar är vanlig när du flyter element, men nu vet du lösningen på problemet.



Clearfix med `overflow:auto` {#clearfix}
--------------------------------------

Det finns likt förra stycket en liknande problematik som heter närlikt, men har en annan problemgrund och löses annorlunda. Det är något som kallas för en [clearfix](http://stackoverflow.com/questions/8554043/what-is-clearfix).

Behovet av en clearfix inträffar eftersom ett flytande element inte påverkar den omslutande kontainerns höjd. Den omslutande kontainern/elementet, som innehåller det flytande elementet, har inte någon koll på hur högt elementet är.

För att visa vad jag menar så finns det ett exempelprogram i ditt kursrepo under `example/clearfix`. Där ligger `clear-no.html` som visar hur sidan ser ut utan en clearfix och sedan `clear.html` som visar hur sidan ser ut efter att clearfixen använts.

Min variant av fix är att använda css-konstruktionen `overflow: auto` för att tvinga en omritning av elementet så att det lär känna sin rätta höjd. Det är en av flera varianter på clearfix som finns. man lägger fixen på det element som behöver ritas om för att känna till höjden av de element det omsluter.

Se när jag testar exemplet.

[YOUTUBE src=BhPxWRkvc74 width=700 caption="Mikael visar hur clearfix med overflow auto fungerar."]

Alltså, clear float och cleafix, två vanliga lösningar på problem som uppträder med layouten när float används.



Alltid visa scrollbar {#alltid}
--------------------------------------

När man har sidor som är olika långa, kan man ibland få en effekt av att webbsidan hoppar till på grund av att den högra scrollbaren omväxlande visas och döljs. Det blir så när en sida är längre än webbläsarens totala höjd (scrollbar visas) och nästa sida är kortare än webbläsarens totala höjd (scrollbaren visas ej).

Det är alltid en irriterande sak att se hoppet, när man besöker en webbplats. Det är enklet att åtgärda problemet genom att säga till webbläsaren, via css, att alltid visa scrollbaren, oavsett sidans höjd.

```css
html {
    overflow-y: scroll;
}
```

Det kan se ut så här.

[YOUTUBE src=SFhSsvuP4Gg width=700 caption="Mikael visar effekten av att alltid visa scrollbaren."]



Minsta höjd på en sida {#hojd}
--------------------------------------

När man har sidor av olika höjd, beroende på att vissa sidor har mer eller mindre innehåll, så är det en god idé att alltid sätta en minsta höjd på en sida. Det ser helt enkelt bättre ut om alla sidor, oavsett innehåll, har en någorlunda höjd och inte en alltför liten höjd.

Detta är enkelt gjort med css och ett sätt att göra det är att sätta `min-height` på det element som innehåller sidans själva huvudinnehåll. Jag har numer valt att lägga allt innehåll i det element som heter `<main>` och därmed så väljer jag en minsta höjd på det elementet.

```css
main {
    min-height: 30em;
}
```

Måttet `em` motsvarar storleken av ett tecken och i utgångsläget är det 16 pixlar stort, men man kan också se på `20em` som 20 teckens bredd.

Det kan se ut så här.

[YOUTUBE src=rFSVZlGNqbU width=700 caption="Mikael visar hur man sätter minsta höjd på en sida."]



CSS box model {#boxmodel}
--------------------------------------

Css har en layoutmodell, *boxmodel*, som hittills varit rådande. I och med CSS3 kommer vi att se en annan modell, *flexible boxes*, eller bara *flexbox*. Men, vi kör väljer att först lära oss den den traditionella boxmodellen.

Så här kan boxmodel visualiseras.

[FIGURE src=image/htmlphp/kmom04/image10.png?w=w3 caption="Css box modell."]

Det handlar alltså om vilka delar en tänkt låda, en box, består av och hur bred den blir när alla dess delar läggs till.

Låt oss titta på ett exempel.

Först html-kod för en enkel `div`.

```html
<div>This is the content.</div>
```

Sen applicerar vi css-kod för att visa hur margin, border, och padding påverkar innehållet i divven.

```css
div {
    width: 400px;
    height: 200px;
    margin: 10px;
    border: 10px solid green;
    padding: 20px;
    outline: 10px dotted blue;
}
```

En `outline` är en ram som inte påverkar layouten hos omgivande dokument, den tar inte upp någon plats, men syns likväl.

Exempelfiler finns i ditt kursrepo under `example/css-layout`.

Så här ser det ut när jag testkör exemplet.

[YOUTUBE src=EIdh6jXpWtI width=700 caption="Mikael visar hur CSS boxmodell fungerar med dess olika konstruktioner."]

Boxmodellen gäller främst block-element såsom `div`, `header`, `main`, `footer`, `h1`, `p`. Det är element som normalt renderas som en fyrkantig "låda". När det gäller textelement, som `span`, `em`, `strong` så renderas de _inline_ inuti ett flöde av text, de är främst inline-element. Inline-element har samma attribut som boxmodellen visar, men beteer sig aningen annorlunda i hur padding och margin påverkar layouten. Boxmodellen är enklast att se i block-element och inte i inline-element som är tänkta i flödande text.

Vi kan fördjupa oss i detta vid ett senare tillfälle, just nu räcker det att du är medveten om konceptet boxmodellen och att det är en modell som används när elementen renderas i förhållande till varandra.



Färger {#farg}
--------------------------------------

Som du kanske har märkt så använder jag olika sätt att ange färger. Mestadels är det hexadecimalt värde om tre siffror, men det kan också anges som 6 siffror och det finns vissa färger som har ett namn. Detta är beskrivet i specifikationen och en av de numer aktuella specifikationerna för detta är modulen för [CSS3 och färger](http://www.w3.org/TR/css3-color/).

[FIGURE src=image/snapvt15/me2-colornames.png caption="Grundläggande färger enligt modulen för CSS3 och färger."]

Du kan också ange färger enligt andra färgmodeller såsom HSL (Hue, Saturation, Lightness) och RGB (Red, Green, Blue). Vill du ha hjälp att välja färger så kan du använda en färgväljare som hjälper dig komponera färger och visar dess färgkoder.

I kursrepot under `example/colors` ligger ett exempel på en färgväljare. Den ser ut så här.

[FIGURE src=image/snapvt15/colorpicker.png?w=w3 caption="En färgväljare hjälper dig att välja och jämföra färger."]

Färger kan även ha inslag av alpha-kanalen, det gör att de uppfattas som mer eller mindre genomskinliga.



CSS3 för fler möjligheter till formgivning {#css3}
--------------------------------------

Utvecklingen med CSS3 har givit oss fler möjligheter att styla våra webbsidor. För att ta ett par enkla exempel så rör det sig om runda hörn, skuggade element, gradient och genomskinliga färger. Du hittar ett par exempelprogram för dessa i ditt kursrepo under `example/css3`.

Webbläsarna har har ibland olika stöd för konstruktioner i css då standarden hela tiden utvecklas. Vill man vara riktigt säker på vilket stöd som finns i olika webbläsare så bör man kolla upp konstruktionen. Webbplatsen "Can I Use" hjälper dig att se om en viss konstruktion stöds i en viss webbläsare. Sök på [gradient på Can i Use](http://caniuse.com/#search=gradients) för att se hur bra stödet är i de olika webbläsarna.



Styla länkar {#link}
--------------------------------------

Länkar är kärnan i html och de kan stylas på olika sätt. En länk har olika lägen, som den normalt visas, *link*, när man håller muspekaren över länken, *hover*, när man klickar på länken, *active* och för länkar som man redan besökt, *visited*.

När det gäller traditionella länkar i textflöde så skall man undvika att styla länkarna så att det normala beteendet ändras. Det är en aspekt av användarvänlighet och användbarhet. Användaren är van vid att webblänkar fungerar på ett visst sätt, det är en förväntning som behöver uppfyllas för att användaren skall känna igen sig.

Låt oss titta på hur de länkar som bygger upp navbaren kan stylas. Navbaren är lite speciell. Där vill man inte att länken ändrar färg beroende av att man besökt den sidan eller inte. En navbar är inte tänkt att fungera så, en navbar har ett litet annat förväntat beteende. Man vill inte ändra färg på länkarna och ibland vill man även tydliggöra vilken sida man för närvarande besöker (kräver mer än bara css).

Ett sätt att styla länkarna i navbaren kan alltså vara att alltid visa samma färg, så här.

```css
.navbar a {
    color: #000;
}
```

Nu blir färgen samma på alla länkar, oavsett vilket läge länken har. Css-regeln gäller alla länkar som ligger under en klass `.navbar`.

Om du vill styla hur länkarna beteer sig vid de olika tillfällena så använder du det som kallas de olika varianterna individuellt så anger du elementet tillsammans med dess _pseudo klass_. En pseudo klass är till exempel `:hover` som enbart stylar länken när någon rör musen över länken.

```css
/* for all values */
a {
    text-decoration: none;
}

/* unvisited link */
a:link {
    color: #f00;
}

/* visited link */
a:visited {
    color: #0f0;
}

/* mouse over link */
a:hover {
    color: #f0f;
    text-decoration: underline;
}

/* selected link */
a:active {
    color: #00f;
}
```

Det är viktigt att du stylar länkarna i ordningen som visas ovan, *active* måste komma efter *hover* som måste komma efter *link* och *visited*.



Styla navbar för nuvarande sida {#current}
--------------------------------------

Det är vanligt att navbaren visar, markerar, valet för nuvarande sida. När man klickat på valet för sidan "Redovisning" så skall det menyvalet vara aktivt, eller valt, och detta visas med en tydlig stylning av menyvalet.

Här finns olika tekniker att jobba med, men låt oss använda php för att hålla koll på vilken nuvarande sida är. Om det är nuvarande sida så sätter vi en css-klass på html-elementet och kan därmed styra dess utseende.

Vi har följande navbar att utgå ifrån.

```html
<nav class="navbar">
    <a href="me.php">Hem</a>
    <a href="report.php">Redovisning</a>
    <a href="about.php">Om</a>
</nav>
```

Tanken är att skapa en struktur som lägger till en klass i menyvalet, om man besöker just denna sidan. Vi vill att det skall se ut så här i html-koden, när man till exempel besöker sidan "Redovisning".

```html
<nav class="navbar">
    <a href="me.php">Hem</a>
    <a class="selected" href="report.php">Redovisning</a>
    <a href="about.php">Om</a>
</nav>
```

Lägger vi nu till css-kod så kan vi styla klassen för att ge just detta menyval ett speciellt utseende.

```css
.navbar .selected {
    background-color: #ccc;
}
```

Vi har precis börjat lära oss php, men att styla nuvarande sidas menyval vill vi ändå göra. Jag skall visa dig hur du kan göra.

Principen är att använda php och det faktum att php vet vilken nuvarande länk är. Sedan är det en programmeringsövning att jämföra nuvarande länk med med respektive menyval för att se om detta menyvalet för närvarande besöks. När så är fallet så tillför vi en css-klass .selected till html-elementet i navbaren, det ger oss möjlighet att styla det elementet.

För att göra en lång historia kortare, så finns det ett exempelprogram i kursrepot som visar på delarna i lösningen under `example/navbar`. Med stöd av det exempelprogrammet så kan du uppdatera din egen meny för att visa nuvarande sida.

Resultatet blir att följande kod används, för varje menyval.

```html
<a class="<?= basename($_SERVER['REQUEST_URI']) == "me.php" ? "selected" : ""; ?>" href="me.php">Hem</a>
```

Ser PHP-koden, i exemplet, lite krånglig ut? Ja, men vi reder ut det efterhand. Låt det bara vara som det är för tillfället. Det blir bättre efter hand. Jag ville bara visa hur man kan markera nuvarande sida och då blev det direkt aningen komplext, eller iallafall komprimerat.

Om du vill se en bättre kodlösning för ovanstående så har guiden "Kom igång med programmering i PHP" en artikel "[Styla nuvarande länk i en navbar](guide/kom-igang-med-programmering-i-php/styla-nuvarande-lank-i-en-navbar)" som specifikt behandlar en bättre kodstruktur för ovan lösning.



Välj namn på sidans titel {#titel}
--------------------------------------

Varje webbsida har en titel i form av html-elementet `<title>`. Det är viktigt att varje sida har sin egen titel eftersom det är en viktig komponent i hur sökmotorer indexerar en webbplats.

Men, i vårt fall ligger `<title>` i filen `incl/header.php` och är samma för alla sidor. Vi vill nu ändra så att varje sida kan ha sin egen titel. Vi löser det med en variabel i php.

Först uppdaterar jag sidan `incl/header.php` att skriva ut en php-variabel som skall innehålla sidans titel.

Så här ser det ut nu.

```php
<title>Me-sidan</title>
```

Det ändrar jag till följande.

```php
<title><?= $title ?></title>
```

Det är alltså php-variabeln `$title` som skrivs ut. Om du är ovan vid konstruktionen `<?= $title ?>` så är det bara en kortare konstruktion för att skriva `<?php echo $title ?>`. Vi kan kalla varianten för _short echo tag_.

Tanken är alltså att variabeln `$title` skall innehålla värdet på sidans titel. Det behöver vi ordna i respektive sida genom att tilldela den ett värde.

Så här ser det ut nu, i `me.php`.

```php
<?php include("incl/header.php"); ?>
```

Det ändrar jag till följande.

```php
<?php
$title = "Min me-sida | htmlphp";
include("incl/header.php");
?>
```

Innan vi inkluderar filen `incl/header.php` så sätter vi värdet på variabeln. När filen inkluderas och dess kod exekveras så kommer variabeln `$title` att ha ett värde som skrivs ut inom html-elementet `<title>`. Vi får en dynamisk header som ändrar innehåll beroende på innehållet i en php-variabel.

Om du gör rätt så kommer du att se sidans titel överst i webbläsaren.

[FIGURE src=image/snapvt15/me2-title.png?w=w3 caption="Sidans titel visas nu i webbläsaren."]

Glöm nu inte att göra ändringen i alla sidor. I alla sidor måste du tilldela variabeln `$title` ett värde. Annars finns risken att du får ett felmeddelande som säger att variabeln `$title` inte är definierad. Det kan då se ut så här.

[FIGURE src=image/snapvt15/me2-title-error.png?w=w3 caption="Variabeln för sidans title är inte definierad, istället visas ett felmeddelande."]

För att se hela felmeddelandet så kan du högerklicka i webbläsarens fönster och visa källkoden för sidan.

[FIGURE src=image/snapvt15/me2-title-error-source.png?w=w3 caption="Högerklicka och visa källkod för att se hela felmeddelandet."]

Detta är ett bra exempel på hur man ibland måste gå tillväga för att felsöka php-koden i sina webbsidor. Php skriver ut ett felmeddelande, men eftersom det skrivs ut inom ramen för html-elementet `<title>` så visas det inte på ett speciellt bra sätt. Men det finns där, och nu vet du hur du hittar det.

Ibland är det lite lurigt att felsöka.



Mät sidans laddningstid, minnesbehov och antal filer som inkluderas {#mat}
--------------------------------------

Ibland kan det vara kul att se hur lång tid det tar för servern att skapa sidan och hur mycket resurser som krävs. Låt oss använda php-funktioner för att mäta tiden det tar att skapa sidan, hur mycket minne som används och hur många filer som inkluderas från disk.

För att lösa detta behöver vi ett par funktioner och en variabel från PHP.

| Funktion / variabel   | Vad gör den    |
|-----------------------|----------------|
| [`microtime(true)`](http://php.net/manual/en/function.microtime.php) | Hämta nuvarande tid som ett tal med precisionen microsekunder. |
| [`$_SERVER['REQUEST_TIME_FLOAT']`](http://php.net/manual/en/reserved.variables.server.php) | Tidsstämpel med microsekunder då webbservern startade PHP-processen. |
| [`get_included_files()`](http://php.net/manual/en/function.get-included-files.php) | Hämta en array med namnen på alla filer som har inkluderats. |
| [`count()`](http://php.net/manual/en/function.count.php) | Räkna antalet fält i en array. |
|  [`memory_get_peak_usage()`](http://php.net/manual/en/function.memory-get-peak-usage.php) | Hämta totalt minne, i bytes, som allokerats av PHP processen. |
| [`round()`](http://php.net/manual/en/function.round.php) | Avrunda ett flyttal till ett heltal, eller ett tal med ett visst antal decimaler. |

Tanken är att skriva ut informationen i slutet av webbsidan, i footern. Så här kan det se ut om man lägger PHP-kod för att hämta värdena från inbyggda funktionerna och lagra dem i variabler.

```php
$numFiles   = count(get_included_files());
$memoryUsed = memory_get_peak_usage(true);
$loadTime   = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
```

Sedan kan man skriva ut dem, så här, till exempel i sidans footer.

```html
<p>Time to load page: <?= $loadTime ?>. Files included: <?= $numFiles ?>. Memory used: <?= $memoryUsed ?>.</p>
```

Kan du använda funktionen `round()` för att avrunda värdena och ge dem lite mer användarvänliga siffror?

Så här kan det se ut.

[FIGURE src=image/snapvt15/me2-footer-details.png caption="En footer med siffror på hur snabbt sidan laddas och vilka resurser som används."]



Responsiv webbplats {#responsiv}
--------------------------------------

En responsiv webbplats ändrar sitt utseende beroende på förutsättningarna. En responsiv webbplats kan ha olika utseende på en mobil, en läsplatta och på en desktop. Det handlar om att visa det viktiga för användaren genom att använda de förutsättningar som erbjuds.

Låt oss se grunden i hur man kan bygga en responsiv webbplats, egentligen handlar det i sin enkelhet om lite html och en del css med _media queries_.

Vi vill förbereda vår webbplats för att bli responsiv. Det första vi gör är att lägga ett meta-element i html-sidans header. Det berättar vi för enheten som besöker vår webbplats att den skall använda sin egen bredd för att visa sidan, den skall inte låtsas att den är större än den verkligen är samt att vi tillåter viss skalning från användaren.

```html
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=2.0;">
</head>
```

Det är den första biten med `width=device-width;` som är viktigast. I annat fall kan en mobil låtsas att ha en mycket större skärm än den egentligen har, för att simulera att den är en desktop-skärm. Det vill vi inte skall ske när vi bygger en responsiv webbplats.

[FIGURE src=image/snapvt15/me2-iphone-portrait.png?w=c6 class="right" caption="Min me-sida i en iPhone porträtt-läge."]

Nästa steg är att lägga till en media-fråga, en _media-query_, för att ändra webbsidans utseende på små skärmar.

```css
/**
 * responsive
 */
@media (max-width: 980px) {
    body {
        width: auto;
        background-color: yellow;
    }
}
```

Media-frågan säger att om bredden på webbläsaren är mindre än 980 pixlar så skall css-konstruktionen som följer gälla. Du kan testa om det fungerar, på din egen webbplats, genom att ändra storleken på webbläsaren. När bredden blir mindre än 980 pixlar så kommer den att få samma bredd som webbläsaren, det är det som `auto` innebär.

Att färgen blir gul är bara för att göra det enklare att se att stylen verkligen ändras.

Så här ser det ut när jag visar min egen webbplats i en iPhone i landskapsläge (och porträttläge).

[FIGURE src=image/snapvt15/me2-iphone-landscape.png?h=c6 caption="Min me-sida i en iPhone landskaps-läge."]

När jag testade webbplatsen på en läsplatta iPad mini så visades webbplatsen utan gul bakgrund i landskapsläge och med gul bakgrund i portättläge.

Att göra bra responsiv design är ett eget kapitel för en kurs, eller kursmoment, så vi nöjer oss med att se hur grundtekniken fungerar.

I kursrepot finns ett exempelprogram `example/responsive` som visar hur en resonsiva layouten fungerar. Pröva det exemplet genom att göra webbläsaren mindre eller större för att ändra utseendet (bakgrundsfärgen blir gul).

När du har grunden så handlar det mest om att lägga till fler media frågor och välja brytpunkter för när webbsidans layout behöver förändras.



Felmeddelanden och felsökning {#felsok}
--------------------------------------

Det blir alltid fel, hur man än gör. Mycket av webutveckling, och programmering rent generellt, handlar om att felsöka och rätta felen.

Så här långt har du ett antal tekniker för att felsöka.

1. Validera enligt HTML och CSS
1. Högerklicka och visa källkod, ser sidan ut som jag tänkte? Har PHP genererat den HTML-kod som jag ville?
1. Devtools, visa HTML-koden och dess tillhörande CSS-konstruktioner. Det som visas i Devtools är inte exakt samma som finns i källkoden. Webbläsaren har tolkat källkoden och lagt till element som den anser saknas.
1. PHP felmeddelande, lös alltid det översta först, resten kan vara följdfel.
1. Googla felet, eller konstruktionen. I din googlingsfråga, lägg alltid tekniken först "html main", "css color" eller "php strlen", så får du bättre träffar.

Ett faktum som du aldrig skall ifrågasätta är.

> *Felmeddelandet har alltid rätt.*

Glöm aldrig det.

När du får felmeddelanden, lös dem alltid uppifrån och ned, ta det första först, ladda om sidan. Kanske har följdfelen försvunnit, annars tar du bara nästa fel i listan.

Det finns alltid en felaktig rad. Hitta den. Det kallas att avgränsa problemområdet och man slipper gissa. Att avgränsa och fokusera på att hitta den raden som är felets upphov, är en viktig förmåga för alla programmerare, webb eller annat. Felmeddelandet ger dig viktiga ledtrådar när du försöker avgränsa problemområdet.



Avslutningsvis {#avslutning}
--------------------------------------

Nu är du redo att själv uppgradera din me-sida till en version 2, med samma features som jag använt.

Exempelkoden finns i [kursrepot för htmlphp-kursen](https://github.com/mosbth/htmlphp/tree/master/example) och kan provköras på dbwebb.se under [repo/htmlphp/example](repo/htmlphp/example).

Det finns en [egen forumtråd för denna artikel](t/7518), fråga där om du stöter på bekymmer, eller bidra med dina egna tips och trix rörande det som artikeln behandlar.
