---
author: mos
category: webbprogrammering
revision:
    "2016-09-13": (B, mos) $page could be null.
    "2015-05-12": (A, mos) Första utgåvan inför htmlphp version 2.
updated: "2015-05-20 12:49:26"
created: "2015-05-12 09:31:47"
...
Bygg en multisida med PHP
==================================

[FIGURE src=/image/snapvt15/me3-intro.png?w=c5&a=0,0,30,0 class="right" caption="En multisida i PHP."]

En multisida med PHP, vad kan det vara? I min värld är det en PHP-sida som kan visa olika innehåll baserat på en meny i *sidebaren*. En sida som kan visa olika innehåll beroende på ett menyval.

Begreppet multisida är mitt eget, kanske är det en variant av *frontcontroller* som vi gör. Men, det handlar iallafall om enklare PHP-konstruktioner som `if`, `switch`, variabler och `include` som tillsammans åstakommer en webbsida med meny i en kolumn där olika undersidor visas beroende på klickat menyval.

<!--more-->

[WARNING]

Detta dokument är ersatt av en nyare utgåva "[Bygg en multisida med PHP (v2)](kunskap/bygg-en-multisida-med-php-v2)" som gäller från och med hösten 2018.

[/WARNING]



Förutsättningar {#pre}
---------------------------------

Du har en me-sida liknande den från artikeln [Skapa en webbsida med HTML, CSS och PHP, steg 2](kunskap/skapa-en-webbsida-med-html-css-och-php-steg-2).



Exempel på en multisida {#exempel}
--------------------------------------

I kursrepot finns ett [exempel på en multisida](https://github.com/mosbth/htmlphp/tree/master/example/multipage). Du kan testa det i [kursrepot på dbwebb](/repo/htmlphp/example/multipage).

Låt nu se hur denna multisida är uppbyggd.



Grundstrukturen för en multisida {#multisida}
--------------------------------------

Jag vill ha en sida, som visar en meny i vänsterkolumnen, eller högerkolumnen. Jag vill ha en mängd menyval som är olika små testprogram, och jag vill samla dem som en "multisida".

Strukturen på en sådan sida skulle kunna se ut så här i webbläsaren.

[FIGURE src=/image/snapvt15/me3-intro.png?w=w2 caption="En multisida i PHP men meny i vänsterkolumnen."]

Tänk nu att varje del av sidan läggs in en PHP-sida, och allt inkluderas i huvudsidan. Egenligen är det samma tanke som när man delar upp header och footer i olika PHP-sidor med include. Nu är det bara applicerat på ett annat område.

Så här skulle strukturen i HTML/PHP kunna se ut. Låt oss kalla sidan för `multipage.php`

```php
<aside><?php include("aside.php")?></aside>

<main>
    <article>
        
        <?php include("content/intro.php")?>
        
        <footer class="byline"><?php include("footer.php")?></footer>
    </article>
</main>
```

Det finns alltså tre olika delsidor i form av `aside.php`, `footer.php` och `content/intro.php`.

Med CSS-kod får jag sidorna att flyta och placera sig jämte varandra.

```css
main {
    width: 70%;
    float: left;
    background-color: #ddd;
}

aside {
    width: 30%;
    float: left;
    background-color: #ccc;
}
```

Så här långt är det inget annorlunda från vad vi sett tidigare. Men låt oss nu titta på filen `aside.php`.



Att välja sida med menyn {#menyn}
--------------------------------------

I filen `aside.php` finns en meny i form av en HTML-lista. Genom att klicka på respektive menyval är tanken att en ny sida skall visas. Men hur?

Låt oss kika på innehållet i filen `aside.php`.

```html
<nav>
    <ul>
        <li><a href="?page=intro">Intro</a></li>
        <li><a href="?page=print-server">Print $_SERVER</a></li>
        <li><a href="?page=print-get">Print $_GET</a></li>
        <li><a href="?page=get-samples">Examples on $_GET</a></li>
    </ul>
</nav>
```

I länken ser du `?page=intro`. Det innebär att länken till sidan kommer bli `multipage.php?page=intro`. Det som ligger efter frågetecknet i länken kallas *query string*. Det är en möjlighet att skicka in parametrar till en sida. I detta fallet skickas en parameter in som heter `page` och parametern har värdet `intro`.

Detta är något vi kan använda för att låta multisidan växla innehåll. Baserat på vilket värde parametern `page` har så kan vi skriva en if-sats som laddar olika innehåll.

Så här.

```php
<?php
$page = null;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

var_dump($page);
```

Nu har vi alltså parametern, som skickats via query stringen i länken, undansparad i en PHP-variabel. Låt oss skriva en if-sats som laddar olika sidor, baserat på variabelns innehåll.

```php
$dir  = __DIR__ . "/content";
$file = null;

if ($page === "intro") {
    $file = "intro.php";

} elseif ($page === "print-server") {
    $file = "print-server.php"; 
    
} else {
    die("The value of ?page=" . htmlentities($page) . " is not recognized as a valid page.");
}

include("$dir/$file");
```

Variabeln `$dir` är sökvägen till den katalog där jag valt att lägga filerna för respektive sidas huvudsakliga innehåll. `__DIR__` är en PHP-konstant som ger dig sökvägen till nuvarande fil. Variabeln `$file` innehåller namnet på filen, förutsatt att variabeln `$page` har ett innehåll som vi känner igen. 

If-satsen kollar mot olika värden i `$page` och ser om det finns en träff, annars skrivs ett felmeddelande ut.

Om allt är okey så inkluderas filen. Vi har nu multisidans innehåll uppdelat i olika filer.

[INFO]
**Tips om att styla meny.**

[Coachen har ett tips om hur du kan styla en nav-ul-li-meny](coachen/skapa-och-styla-webbplatsens-meny-eller-navbar-i-html-och-css).
[/INFO]



Säker programmering i PHP {#secure}
----------------------------------------------------

Man vill alltid skriva säker kod, som inte har säkerhetshål. Det blir så pinsamt när man inte gör det. Låt oss därför titta på koden ovan och se vilka potentiella hot den innehåller.



###Koda utskriften med htmlentities() {#htmlent}

I följande kodsekvens anropar jag funktionen [`htmlentities()`](http://php.net/htmlentities) för att koda om innehållet i `$page`, innan det skrivs ut på webbsidan.

```php
die("The value of ?page=" . htmlentities($page) . " is not recognized as a valid page.");
```

Det gör så att jag kan skriva ut, även känsliga saker, på webbsidan. Om jag inte hade gjort på det viset så hade jag utsatt min webbplats för en attack som kallas [Cross-site scripting (XSS)](https://en.wikipedia.org/wiki/Cross-site_scripting). Jag hade öppnat upp så att någon hade kunnat köra ett JavaScript via min länk.

En länk likt denna hade varit en möjlighet för XSS.

```text
?page=<script>alert("You got XSS:ed. Got ya.");</script>
```

Med anropet till `htmlentities()` så skrivs texten ut som ren text. Utan anropet så kommer texten att representera kod i JavaScript som körs i webbläsaren hos den som klickat på länken.

Glöm inte följande.

> Om du skriver ut text på din webbsida som kommer från användaren, använd då `htmlentities()` för att skydda dig från XSS-attacker.



###Lita aldrig på inkommande variabler {#inkommande}

Om du tänker koden ovan, med if-sats och allt, så kanske du ser möjligheten att skippa if-satsen och bara skriva så här.

```php
include("$dir/$page.php");
```

Eller till och med så här.

```php
include("$dir/{$_GET['page']}.php");
```

Visst blir koden kortare, men samtidigt gör du det enklaste grundfelet i säker PHP-programmering. Du litar på att användaren skickar in det du färväntar dig. Det är dumt. Du utsätter dig för risken av [*file inclusion vulnerability*](https://en.wikipedia.org/wiki/File_inclusion_vulnerability).

Därav if-satsen. Om du ser den så testar vi alla värden och använder *inte* den variabel som användaren skickat in via länken. Vi bara läser den och testar dess innehåll. 

Glöm inte följande.

> Testa alltid inkommande värden. Lita inte på dem. Översätt dem till dina egna värden. 

Det var lite om säker programmering i PHP. Det finns en [forumtråd som handlar om säker programmering i PHP](t/1702), kika gärna där om du är intresserad av att dyka ner i ämnet.



Byt if-sats till switch-case {#case}
----------------------------------------------------

Så som if-satsen är skriven så passar den egentligen bättre att skriva som en switch-case konstruktion. Titta på detta exemplet och se vilken kod du föredrar.

Först som if-sats.

```php
if ($page === "intro") {
    $file = "intro.php";

} elseif ($page === "print-server") {
    $file = "print-server.php"; 
    
} else {
    die("Error message."");
}
```

Sen skriver vi om den som en [switch-case](http://php.net/manual/en/control-structures.switch.php), så här.

```php
switch($page) {

    case "intro":
        $file = "intro.php";
        break;

    case "print-server":
        $file = "print-server.php";
        break;

    default:
        die("Error message.");
}
```

Vilket är bäst? De löser samma uppgift och blir ungefär lika många rader kod. Jag hade valt switch-case eftersom alla tester utförs mot en och samma variabel. Jag tycker den ger en renare kodstruktur och är tydligare i sitt uppsåt. 

Men i en if-sats kan man ha fler tester, och mer komplexa, och man kan testa mot olika variabler i varje if-sats. Så if-satser och switch-case har delvis olika användningsområden.



Ternary operator, en kortare if-sats {#ternary}
-----------------------------------------------

I PHP finns det en konstruktion som heter [ternary operator](kunskap/kom-i-gang-med-php-pa-20-steg#ternary), det är en kortare variant av en if-sats.

Studera följande kod.

```php
$page = null;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
```

Se när jag skriver om den med kortkonstruktionen `villkor ? om sant : annars`, det som kallas ternary operator.

```php
$page = isset($_GET['page']) ? $_GET['page'] : null;
```

Det blev kortare. Blev det mer komplext? Kanske, men i längden, särskilt om man har många inkommande parametrar i `$_GET`, så är det en klart intressant konstruktion.



Borde man inte testa inkommande variabler? {#testin}
-----------------------------------------------

Det är en bra idé. Det bör man alltid göra. Så här kan man göra det.

```php
// Get all incoming
$page = isset($_GET['page']) ? $_GET['page'] : null;

// Validate all incoming
is_string($page) or is_null($page)
    or die("Incoming value for page must be a string.");

// Continue to do actual work, now a bit more safe
var_dump($page);
```

I vårt fall är det inte nödvändigt att göra så, men det är en god praktik att alltid testa inkommande variabler. Om de inte matchar tänkt värdemängd så kan man lika gärna avbryta skriptet. 

Konstruktionen med `or` innebär att om den första delen returnerar `false`
så körs den andra delen. Om den första delen returnerar `true` så körs inte andra delen. 

Konstrukionen passar sig i ett sådant här sammanhang. Ett antal testar annars ge ett felmeddelande. Kort och koncist, men ändå läsbar kod.



DRY, en sak på en plats, upprepa dig inte {#dry}
--------------------------------------------------

I programmering finns det många programmeringfilosofier som säger hur man bör tänka. Det är många filosofier och det kan underlätta att tänka på dem ibland. 

För att ta ett exempel så finns det en filosofi som heter [*DRY, Don't repeat yourself*](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself) och det handlar om att kod och variabler ska bara ha ett ställe där de kan ändras. Kod ska inte dupliceras. Här är en variant där det kan bli bättre, mer DRY kod.

```php
switch($page) {

    case "intro":
        $file = "intro.php";
        break;

    case "print-server":
        $file = "print-server.php";
        break;

    default:
        die("Error message.");
}
```

Problemet i koden ovan är konstanterna "intro" och "print-server", de finns på två ställen. Dessutom, när jag vill lägga till en ny sida så måste jag skriva samma värde på två rader. Det är lätt att man missar en av raderna som leder till fel och längre tid att felsöka och utveckla koden. 

Så vi skriver om koden så den blir DRY.

```php
switch($page) {

    case "intro":
        $file = "$page.php";
        break;

    case "print-server":
        $file = "$page.php";
        break;

    default:
        die("Error message.");
}
```

Nu finns konstanten bara på en plats och varje ny delsida innebär en ändring, inte två.

Är det inte farligt att använda variabeln `$page` på det viset, är inte det en säkerhetsrisk? 

Nej, det är det inte. I sammanhanget ovan så har vi full kontroll på dess innehåll och då är det helt ok att använda variabeln så här.



Avslutningsvis {#avslutning}
--------------------------------------

Det var lite behändiga konstruktioner i PHP som ger dig en smidig struktur för undersidor som har sina egna menyer. En multisida passar bra för sidor som har ett innehåll som hänger ihop.

Om du stöter på problem så kan du alltid [fråga i forumet](forum).
