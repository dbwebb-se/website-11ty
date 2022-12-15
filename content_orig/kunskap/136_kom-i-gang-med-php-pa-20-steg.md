---
author:
    - mos
category:
    - php
revision:
    "2017-08-29": "(C, mos) Bort blå ruta om phps."
    "2015-01-12": "(B, mos) Uppdaterad utgåva."
    "2013-03-25": "(A, mos) Första utgåvan."
...
Kom i gång med PHP på 20 steg
==================================

Denna guide hjälper dig att komma igång med PHP. Via 20 steg får du testa på olika grundläggande konstruktioner i PHP och slutligen kan du pröva om dina vingar bär genom att skriva egna PHP-funktioner. 

Det bästa sättet att gå igenom guiden är att läsa exemplen och sedan pröva dem själv. Skapa en egen exempelsida där du testar olika kod-konstruktioner. Du måste testa själv för att lära dig. **Du måste själv skriva koden, det finns inga genvägar.**

<!--more-->

Funkar det inte som det ska? Får du felmeddelande? Bra, då kan du göra något åt problemet. Ta för vana att alltid läsa felmeddelandet, titta på filens namn och radnumret (och närliggande rader), felmeddelandet har ofta rätt, du måste bara bli duktig på att tyda det.

> *Felmeddelandet har alltid rätt.*



Förkunskaper {#forkunskaper}
-----------------------------------------------------------------------------------------------

Guiden förutsätter att du redan har färdig miljö där PHP fungerar. Här kan du få [hjälp att ladda ned och installera PHP](kunskap/installera-en-egen-webbserver-for-utveckling). Du behöver också ha en texteditor. Här får du hjälp att [komma igång med texteditorn jEdit och teckenkodning](kunskap/installera-en-texteditor-jedit).



1. Om PHP {#om}
-----------------------------------------------------------------------------------------------

[FIGURE src=/img/php-20/php-logo_200px.png alt="PHP logotyp" class="right top"]

PHP är ett skriptspråk som används tillsammans med HTML för att skapa dynamiska webbsidor i webbplatser. PHP körs på serversidan och hjälper till att generera HTML-sidorna, ofta via kopplingar mot en databas. 

PHP skapades 1995 av Rasmus Lerdorf och underhålls numer av "The PHP Group". PHP är fri programvara. PHP stod tidigare för "Personal Home Page", numer står det för
"PHP: Hypertext Preprocessor". [^1] [^2] 

PHP är idag ett av de mest använda språken på webben. Enligt den undersökande webbplatsen W3Techs så fanns [PHP på 78% av de undersökta webbplatserna](http://w3techs.com/technologies/overview/programming_language/all) (mars, 2013). 

PHP är dels ett enkelt skriptspråk som hjälper dig att dela in din webbplats i olika filer. Men det är också ett komplett programmeringsspråk med avancerade objektorienterade konstruktioner som vilket traditionellt programmeringsspråk som helst. PHP har sin grund i C och C++ så känner du igen de språken så känner du igen konstruktionerna i PHP.

Den viktigaste [källan till kunskap kring PHP är referensmanualen](http://php.net/manual/en/). Det finns en sökfunktion uppe i högra hörnet, använd den flitigt.

> *Referensmanualen är din bästa vän. Glöm aldrig det.*

Bekanta dig med manualen innan du går vidare. Ta en titt på den delen av manualen som täcker [grundkonstruktionerna i språket, "language reference"](http://php.net/manual/en/langref.php). Det är främst det som jag avser täcka i denna guiden. En liten del blir det, men ändå tillräckligt för att komma igång och bli varm i kläderna.

Nog pratat. Nu gör vi ett exempelprogram.



2. PHP och HTML {#mall}
-----------------------------------------------------------------------------------------------

###2.1 Först en vanlig html-sida {#html-mall}

Låt oss göra ett exempel. Vi börjar med en vanlig enkel html-sida och vi gör sedan om den till en dynamisk php-sida. Det ger oss en känsla av skillnaden mellan dem. **Jag visar hur jag gör och du gör likadant på din egen server.**

*Kod: En enkel mall-sida för testprogram, mall.html*

```html
<!doctype html>
<html lang="sv"> 
<head>
<meta charset="utf-8"/>
<title>php20</title>
</head>
<body>
<h1>Mallsida i HTML</h1>
<p>Hello World!</p>
<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>
```

Skapa en sida `mall.html` som innehåller koden ovan. Du kan testa min variant av [`mall.html`](kod-exempel/guiden-php-20/2/mall.html). Kolla att den går igenom validatorn.

Klicka sedan på länken källkod och leta reda på sidan `mall.html` och studera dess källkod. Det som du ser är källkoden som den ser ut på server-sidan. Vi kan kalla det för orginal-koden. Här är en [direktlänk till källkoden för `mall.html`](kod-exempel/guiden-php-20/2/source.php?dir=&file=mall.html#file) som den visas med skriptet `source.php`.

[INFO]
**Visa källkod med `source.php`**

Du kan [ladda ned en egen kopia av `source.php`](source). Ta en kopia av koden och lägg i en fil som du döper till `source.php`. Lägg filen i samma katalog som filen `mall.html`.
[/INFO]

Gå tillbaka och visa sidan `mall.html` i din webbläsare. Ta musen och högerklicka på webbsidan, välj menyvalet "Visa källkod". Nu visas den källkod upp som webbläsaren har laddat. 

[FIGURE src=/image/snapshot/guiden-php-20-kallkod-mall-html.png?w=w1 caption="Högerklicka och visa källkod för att se vad webbläsaren ser."]

Det är detta som är källkoden ur webbläsarens perspektiv. När vi nu börjar jobba med PHP så måste vi skilja på hur källkoden ser ut på serversidan och hur den ser ut i webbläsaren. Det är två skilda saker och vid felsökning så har man nytta av båda varianterna.




###2.2 Nu en php-sida {#php-mall}

Bra. Ta nu en kopia av sidan `mall.html` och döp den till `mall.php`, öppna den i din webbläsare och kontrollera att den visar exakt samma resultat som `mall.html`. Det enda jag ändrar så långt är sidans rubrik.

Nu lägger vi till lite PHP-kod i mall-sidan. Vi tar en enkel konstruktion som bara skriver ut "Hello World".

*Kod för att skriva ut "Hello World from PHP".*

```php
<?php echo "<p>Hello World from PHP.</p>"; ?>
```

Se hur min [`mall.php`](kod-exempel/guiden-php-20/2/mall.php) ser ut. Studera källkoden för sidan, dels på serversidan och dels i webbläsaren. Kan du se skillnaden mellan dem? Server-sidan innehåller PHP-konstruktionen och när webbläsaren ser sidan så finns det bara HTML-kod. Det är bra att ha koll på dessa två varianter av källkod, dels på serversidan och dels i webbläsaren.

Skillnaden mellan `mall.html` och `mall.php` är att sidan som slutar på ändelsen `.php` körs genom PHP's preprocessor. När preprocessorn hittar PHP-taggar, det vill säga `<?php` (starttag) och `?>` (sluttag), så tolkas detta som PHP-kod och exekveras. Allt som man då skriver ut i sin PHP-kod hamnar i den slutliga HTML-koden och skickas till webbläsaren.

*PHP starttag och sluttag.*

```php
<?php
// PHP starttag, efter denna så kommer PHPkod.
// Här skriver man sin PHP-kod.
// Nu kommer PHP sluttag.
?>
```

Nu har vi grunderna till ett testprogram för PHP. Då går vi vidare.



3. Utskrift av felmeddelanden från PHP {#fel}
-----------------------------------------------------------------------------------------------

###3.1 Sätt på felutskrifter {#felutskrift}

Innan vi skriver mer PHP-kod så är det bäst att sätta på utskriften av felmeddelanden. Utan felmeddelande blir det svårt att koda PHP. Lägg följande kod överst i din sida `mall.php`.

*Kod för att sätta på visning av felmeddelande.*

```php
<?php
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
?>
```

Det första raden är en PHP-funktion som säger att alla typer av felmeddelande skall visas. Slå upp funktionen [`error_reporting()` i manualen](http://php.net/manual/en/function.error-reporting.php). Du kommer ihåg att manualen är din bästa vän? Lär dig hantera den. Alla funktioner beskrivs på samma sätt och när du lärt dig uppbyggnaden så ligger hela språket öppet för dig att lära.

Den andra raden anropar en funktion som ber PHP att skriva ut felmeddelanden och inte dölja dem. I vissa installationer (MAMP) så är standardinställningen att inte visa felmeddelanden. Det är en bra inställning för system som är i drift, men inte så bra när man utvecklar eller vill lära sig.

Den tredje raden säger till PHP att inte buffra svaret (lagra informationen och skriva ut senare) utan skriva ut delarna av resultatsidan  så fort som möjligt. En del installationer har buffrad utskrivning som på, det kan undvika ett par problem, men, när du kommer till en server som inte buffrar utskriften så dyker dessa problem upp. Det är bättre att alltid ha koll på felen så att de inte dyker upp när du laddar upp ditt program på en annan server.

Du kan pröva min uppdaterade [`mall.php` med stöd för felutskrifter](kod-exempel/guiden-php-20/3/mall.php) och se var jag lade koden genom att studera sidans källkod.



###3.2 Exempelprogram med felutskrifter {#felutskrifter}

Jag gjorde ett exempelprogram för att visa hur felmeddelanden kan se ut. Pröva [mitt testprogram med felmeddelande](kod-exempel/guiden-php-20/3/error.php).

Så här kan det se ut när du kör det.

[FIGURE src=/img/snapshot/guiden-php20-felmeddelande.png caption="Vanliga felmeddelande i PHP av typen NOTICE och WARNING."]

Följande felmeddelande visas, se hur de säger vad felet är och att de hänvisar till raden där felet finns.

 > Notice: Undefined variable: var in /usr/home/mos/htdocs/dbwebb.se/kod-exempel/guiden-php-20/3/error.php on line 18

Felet säger att vi har en odefinerad variabel. I detta fallet är det en variabel som jag läser värdet på, men variabeln har inte tilldelats något värde.

 > Notice: Use of undefined constant I_AM_NOT_DEFINED - assumed 'I_AM_NOT_DEFINED' in /usr/home/mos/htdocs/dbwebb.se/kod-exempel/guiden-php-20/3/error.php on line 22

Felet säger att vi använder en odefinerad konstant, en konstant som inte har definerats.

 > Warning: floor() expects exactly 1 parameter, 0 given in /usr/home/mos/htdocs/dbwebb.se/kod-exempel/guiden-php-20/3/error.php on line 26

Här försöker jag anropa en funktion `floor()` men jag missar att skicka med ett argument, därav varningen.

Öva dig i att läsa felmeddelandena, de innehåller alla ledtrådar du behöver för att rätta till dem, de säger vilken fil och radnummer som du skall börja leta på. Det är en övningssak att rätta felen när de dyker upp, **börja alltid med det översta felet och rätta det först**. Ibland är en del av resterande fel så kallade följdfel, de beror av det första felet och försvinner när du rättat det.
  


4. Instruktioner och kommentarer {#kommentar}
-----------------------------------------------------------------------------------------------



###4.1 PHP starttag och sluttag {#php-taggar}

Man går in i "PHP-läge" med *starttaggen* `<?php`, därefter tolkas allt som PHP-kod. PHP-läget avslutas med en PHP *sluttag* `?>`. Därefter kan man skriva vanlig HTML-kod igen. På detta sätt kan man växla mellan HTML och PHP.

```php
<?php 

// Everything between the PHP tags is considered to be PHP-code.

?>
```


###4.2 Instruktioner och semikolon {#instruktioner}

Det som finns mellan PHP-taggarna är *instruktioner*. Man kan ange flera instruktioner och separera dem med semikolon `;`. Ett annat ord för en instruktion är *uttryck* (på engelska blir det *statement*).

Här är ett exempel på PHP-kod fördelat på instruktioner som skriver ut en textsträng.

```php
<?php 
echo "<p>Hello World!</p>";
echo "<p>Hello PHP!</p>";
echo "<p>My name is Mikael...</p>";
?>
```



###4.3 Kommentarer {#kommentarer}

Du kan ange *kommentarer* i din PHP-kod på ett antal olika sätt. Använd kommentarer för att dokumentera och strukturera din kod. Se följande exempel på ett par varianter för att ange kommentarer i PHP.


```php
 <?php
/* Here is a multi-line comment, just as i CSS or C/C++
second line of comment.
third line.
*/
echo "<p>Hello World!</p>"; // One line comment, comment to end of line
echo "<p>Hello PHP!</p>";
echo "<p>My name is Mikael...</p>"; # Comment as shell-style

// Another one liner comment.
echo "<p>Hello PHP again!</p>";

?>
```

Det finns alltså olika sätt att kommentera sin kod. PHP har också stöd för en kommentarstyp som kan hjälpa dig att bättre dokumentera din kod, denna kommentarstyp brukar kallas [PHPDoc](http://en.wikipedia.org/wiki/PHPDoc). Det är egentligen en variant av kommentaren `/* *` men mcyket mer kraftfull eftersom informationen i kommentaren går att använda för att skapa dokumentation av koden.

```php
 <?php
/** 
 * Here is a PHPDoc comment.
 *
 * @author Mikael Roos <me@mikaelroos.se>
 */
?>
```

Du kan alltså uppnå både struktur av din kod och bättre förståelse för den, genom att kommentera den. Använd kommentarer där det behövs, främst för din egen del. Bra kod är självdokumenterande tillsammans med kommentarerna.



###4.4 Felsök med kommentarer {#felsok-kommentar}

Ett bra sätt att felsöka är att använda kommentarerna `/* */`. Med dem kan du kommentera bort stora delar av koden medans du felsöker. Säg att du får ett felmeddelande som du inte lyckas rätta, då kan du kommentera bort kod tills felmeddelandet försvinner. När det är borta så aktiverar du koden genom att ta bort kommentarerna. Gör du det stegvis så kan du felsöka och avgränsa felet till precis den rad där det inträffar. Det är en bra felsöknings-metod för fel som du inte lyckas rätta med hjälp av felmeddelandet enbart.



###4.5 Testprogram med kommentarer {#test-kommentar}

Här är ett [testprogram med kommentarer i](kod-exempel/guiden-php-20/4/comments.php). Kika och se källkoden för programmet (på serversidan), kika sedan på den källkod som genererats, den som du ser när du högerkligar och visar källkod i webbläsaren. Kan de du skillnaden mellan serversidan och det som hamnar i webbläsaren?


[INFO]
**Ta bort sluttaggen `?>`**

När du har en fil med enbart PHP-kod så skall du inte avsluta den med PHP-sluttag. Du kan, och bör, ignorera sluttaggen. Använder man sluttaggen så måste man se till att det inte finns några tomma rader eller tecken efter den, annars får man problem när man använder sessioner.

Det rekommenderas därför, att inte använda sluttaggen i de filer där du enbart har PHP-kod.
[/INFO]




5. Typer, variabler, strängar och siffror {#type}
-----------------------------------------------------------------------------------------------


###5.1 Deklaration av variabler {#dekl-variabel}

En variabel i PHP föregås av ett dollar-tecken, `$`, som i `$val` eller `$text`. Variabelnamnet startar med en bokstav eller "underscore" `_` och följs sedan av en mix av bokstäver, siffror och `_`. Variabelnamn gör skillnad på stora och små bokstäver, det betyder att `$text` och `$Text` är två olika variabler.

En variabel kan defineras och användas utan att fördeklarera den med ett värde. Det är inget fel i sig, men det kan ställa till problem med odefinerade variabler. Gör det därför till en vana att alltid deklarera ett värde i dina variabler. Gör dem tomma om de skall vara tomma, du kan tilldela dem specialvärdet `NULL` som innebär att variabeln inte har ett värde, den är bara `NULL`.

```php
<?php
// En variabel, deklarerad men den har inget värde, 
// det rekommenderas att alltid ge variabeln ett värde eller null.
$var;

// Heltal som läggs i en variabel.
$heltal1 = 42;
$heltal2 = 1337;

// Flyttal med punkt för decimalerna.
$flyttal1 = 3.141592654;
$flyttal2 = 1.4142;

// Strängvariabeler omsluts av enkelfnutt '' eller dubbelfnutt "".
$text1 = "Jag kan 10 decimaler på pi: "; 
$text2 = "Roten ur 2 är: ";
$text3 = "Svaret på frågan om allting och universum?";
$text4 = "Elit ";

// boolska variabler har värdet true eller false.
$sant = true;
$falskt = false;

// Värdet null är ett specialvärde som innebär null, ingenting.
$inget = null;
?>
```



###5.2 Att använda variablernas värde {#anvand-variabel}

När du har deklarerat variablerna kan du använda dem. Här är ett exempel där värdet på variablerna skrivs ut tillsammans med lite text.

```php
<?php
echo "<p>", $text1, $flyttal1, "</p>";    // Separated by ,
echo "<p>" . $text2 . $flyttal2 . "</p>"; // Concatinated with . 
echo "<p>$text3 $heltal1</p>";            // Print out variables within "
echo "<p>{$text4} {$heltal2}</p>";        // Separate variables within string with {}

// Notice that the values for false and null is not visible on the webpage.
echo "<p>Sant=$sant<br>falskt=$falskt<br>inget=$inget</p>";
?>
```

Som du ser så finns det olika varianter på att skriva ut variabler i en text. 


###5.3 Variabler och typ {#typer}

En variabel är av en typ som bestäms av PHP. Det bestäms av variabelns värde. De enklare typerna som stöds är strängar och siffror (heltal eller flyttal). Det finns också boolska variabler som innehåller värdet sant eller falskt. Dessutom finns värdet `null`.

```php
<?php
echo "<pre>";
var_dump($heltal1);
var_dump($flyttal1);
var_dump($text1);
var_dump($sant);
var_dump($falskt);
var_dump($inget);
echo "</pre>";
?>
```

Funktionen `var_dump()` är en ypperlig funktion för felsökning. Den skriver ut variabelns innehåll och dess typ, så som det uppfattas av PHP.



###5.4 Testsida för variabler och typer {#test}

Jag gjorde en [testsida för variabler och typer](kod-exempel/guiden-php-20/5/variables.php). Det är ett bra arbetssätt att alltid göra små testsidor så fort man får problem eller undrar hur något fungerar. Det är alltid lättare och snabbare att felsöka ett litet testprogram än ett större program, det är också lättare att be om hjälp om man kan referera till ett litet exempelprogram.



6. Inbyggda funktioner {#infunktioner}
-----------------------------------------------------------------------------------------------


###6.1 Inledning {#inledning-6}
PHP har ett stort antal inbyggda funktioner som underlättar livet som PHP-programmerare. Finns det funktioner så använder man dem istället för att skriva egna. Det är viktigt att lära sig hur man slår upp och letar reda på funktioner. Manualens sökfunktionen hjälper dig på vägen.
  
Varje funktion har en egen sida i PHP-manualen, slå upp de två funktioner vi använt så här långt, [`echo()`](http://php.net/manual/en/function.echo.php) och [`var_dump()`](http://php.net/manual/en/function.var_dump.php), läs om dem och studera upplägget för manualsidan. Använda sökfunktionen på manualsidan för att hitta de funktioner du letar efter.
 
Det finns en stor mängd inbyggda funktioner, det finns funktioner för datum och tid, matematiska funktioner, funktioner för stränghantering, kryptering, funktioner för att hämta information från andra webbplatser, för att komma åt databaser och så vidare.



###6.2 Matematiska funktioner {#matte-funktioner}

Vi tittar på den matematiska funktionen som beräknar kvadratroten ur ett tal, [`sqrt()`](http://php.net/manual/en/function.sqrt.php), samt funktionen som skriver ut talet PI, [`pi()`](http://php.net/manual/en/function.pi.php).

Så här kan det se ut när vi använder funktionerna.

```php
<?php
echo "<p>Talet PI är lika med: " . pi() . "</p>";
echo "<p>Kvadratroten ur talet 2 är lika med: " . sqrt(2) . "</p>";
?>
```

Kika på [översikten av de matematiska funktionerna](http://php.net/manual/en/ref.math.php) för att få en känsla för vilka funktioner som finns tillgängliga.
 


###6.2 Funktioner för datum och tid {#datum-funk}

Det finns funktioner för datum och tid. Titta på funktionen [`date()`](http://php.net/manual/en/function.date.php) som hjälper dig att skriva ut dagens datum. Studera även funktionen [`time()`](http://php.net/manual/en/function.time.php) som ger dig antalet sekunder sedan den första januari 1970. 

Så här kan du använda funktionerna.

```php
<?php
echo "<p>Dagens datum och tid är nu " . date('r') . "</p>";
echo "<p>Så här många sekunder har det gått sedan den förste januari 1970: " . time() . "</p>";
?>
```

Kika på [översikten av funktioner för datum och tid](http://php.net/manual/en/ref.datetime.php) för att få en känsla för vilka funktioner som finns tillgängliga.



###6.3 Funktioner för stränghantering {#strang-funk}

Det finns funktioner för bearbetning av strängar, det kan vara jämförelse, modifiera strängar och delsträngar, räkna antalet tecken i en sträng och så vidare.

Ett par av de vanligaste funktionerna är [`strlen()`](http://php.net/manual/en/function.strlen.php) som räknar antalet tecken i en sträng och [`strcmp()`](http://php.net/manual/en/function.strcmp.php) för att jämföra två strängar.

Det finns också funktioner som hjälper dig med kryptering och liknande funktioner. Två sådana funktioner är [`str_rot13()`](http://php.net/manual/en/function.str_rot13.php) och [`md5()`](http://php.net/manual/en/function.md5.php).

Så här kan det se ut när dessa funktioner används.

```php
<?php
echo "<p>Hur många tecken finns det i strängen 'Mumintrollet'? Svar: " . strlen('Mumintrollet') . "</p>";
echo "<p>Är strängen 'Hello' samma som 'hello'? Svar: </p>";
var_dump(strcmp('Hello', 'hello'));

echo "<p>Koda strängen 'moped' enligt ROT13: " . str_rot13('moped') . "</p>";
echo "<p>Hur ser en md5-hash av strängen 'MegaMic' ut? Svar: " . md5('MegaMic') . "</p>";
?>
```

När det gäller strängar så är det viktigt att ha koll på vilket teckenkodning man använder. När man hanterar unicode och UTF-8 så finns det varianter av funktionerna, precis så som jag använde funktionerna `strlen()` och [`mb_strlen()`](http://php.net/manual/en/function.mb_strlen.php), där prefixet `mb_` står för multibyte variant av funktionen. I de svenska tecknen för `åäö` består varje tecken av två byten i UTF-8, därför fungerar inte den vanliga funktionen `behövs det anpassade funktioner då man jobbar med Unicode och UTF-8.
  
Kika på [översikten av funktioner för stränghantering](http://php.net/manual/en/ref.strings.php) för att få en känsla för vilka funktioner som finns tillgängliga. Titta även på [översikten av funktioner för multibyte strängar](http://php.net/manual/en/ref.mbstring.php), det är bra att ha en uppfattning om att multibyte strängar kräver anpassade funktioner. 



###6.4 Exempel för att testa inbyggda funktioner {#test-funk}

Testa mitt [kodexempel där jag använder inbyggda funktioner](kod-exempel/guiden-php-20/6/builtin.php). Pröva gärna ytterligare funktioner som du hittar. Öva dig i att läsa manualen så du kan använda funktionen utifrån som den beskrivs.



7. Dela upp i filer med `include()` och `require()` {#include}
-----------------------------------------------------------------------------------------------

När du börjar skriva mycket PHP-kod så vill du dela in din kod i olika delar. Det är enklare att underhålla mindre väl avgränsade delar än en stor klump av kod. Ett sätt att organisera koden är att dela in den i filer och inkludera filerna när det behövs med [`include()`](http://php.net/manual/en/function.include.php) eller [`require()`](http://php.net/manual/en/function.require.php).



###Inkludera för att strukturera en webbsida {#include-webb}

Ett vanligt användningsområde för `include()` är att dela in webbplatsens sidor i olika delar. Till exempel så används ofta en och samma header och footer på samtliga sidor i en webbplats. Då kan man strukturera sin kod så att man har headern i en egen fil, `header.php`, footern i en egen fil, `footer.php` och sedan inkluderas dessa i varje ny sida som skapas.

**Ett exempel med include av `header.php` och `footer.php` i en `new-page.php`.** 

```php
<?php 
$title = "Titel på min nya sida";
include("header.php"); 
?>
 
<h1>Här är en ny sida</h1>
<p>Lång fin text på min nya sida.</p>
 
<?php include("footer.php"); ?>
```

I detta fallet kan filen `header.php` se ut som följer. Notera hur variabeln `$title` används för att skriva ut sidans titel. Variabeln sätts i den nya sidan, men används i `header.php`. På det sättet kan du definiera variabler på en plats och använda dem i en annan fil. Är du osäker på vad en variabel innehåller så skriver du helt enkelt ut dess innehåll för att dubbelkolla, antingen med `echo` eller med `var_dump()`.

**Innehållet i `header.php`.**

```php
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
</head>
<body>
```

På liknande sätt så innehåller filen `footer.php` avslutningen av sidan.

**Innehållet i `footer.php`.**

```php
<hr>
<footer>Denna sidans footer</footer>
</body>
</html>
```

Du kan testa mitt [exempel för webbsida med `include()`](kod-exempel/guiden-php-20/7/new-page.php).

Om du kör exemplet och sedan högerklickar för att visa sidans källkod så ser du det sammanfogade resultatet.

```html
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Titel på min nya sida</title>
</head>
<body>
 
<h1>Här är en ny sida</h1>
<p>Lång fin text på min nya sida.</p>
 
<hr>
<footer>Denna sidans footer</footer>
</body>
</html>
```



###Include eller require? {#require}

Skillnaden på `include()` och `require()` är felhanteringen. Om filen saknas så *avbryter* `require()` exekveringen med ett felmeddelande medan `include()` ger ett felmeddelande men *fortsätter exekveringen*. Vilket som är bäst att använda beror på sammanhanget och du kan själv välja vilket du tycker passar bäst.

Här kan du se exempel på felmeddelanden där filen som skall inkluderas saknas, först ett [exempel med `include()`](kod-exempel/guiden-php-20/7/include_error.php) och sedan ett [exempel med `require()`](kod-exempel/guiden-php-20/7/require_error.php).

Det finns två varianter som heter [`include_once()`](http://php.net/manual/en/function.include-once.php) och [`require_once()`](http://php.net/manual/en/function.require-once.php). Skillnaden är att de kontrollerar att filen endast inkluderas en gång. 



###Konstanter `__FILE__` och `__DIR__` för absolut sökväg {#sokvag}

När man inkluderar filer så vill man ibland använda absolut sökvägen till filerna. Då har man användning av konstanterna `__FILE__` och `__DIR__`. Dessa konstanter ger sökvägen till den filen som nu exekveras, eller till den katalog som filen finns i. Se följande exempel på hur du använder dessa konstanter tillsammans med `require()`.
  
```php
<?php
echo "<p>Constant __DIR__ (available from PHP 5.3) is: " . __DIR__ . "</p>";
echo "<p>Constant __FILE__ is: " . __FILE__ . "</p>";
echo "<p>Filename-part of __FILE__ is: " . basename(__FILE__) . "</p>";
echo "<p>Directory-part of __FILE__ is: " . dirname(__FILE__) . "</p>";

echo "<p>Lets include a file by using __FILE__ and __DIR__ to create the absolute path.</p>";
include(dirname(__FILE__) . "/empty_file.php");
include(__DIR__ . "/empty_file.php");
?>
```

Här kan du testa mitt [exempel på absolut sökväg](kod-exempel/guiden-php-20/7/constants.php).

Dessa konstanter är exempel på magiska konstanter som är fördefinerade i PHP. Se vilka fler [magiska konstanter som finns i PHP](http://php.net/manual/en/language.constants.predefined.php).



###PHP korta taggar, "short tags" {#short-tags}

Det finns flera varianter på PHP-taggar. Du har kanske noterat att jag mixar två varianter.

```php
<?php $title = "Titel på min nya sida"; ?> <!-- Den "vanliga" PHP-taggen  -->

<?= $title ?>  <!-- Den korta varianten som är samma sak som <?php echo $title; ?> -->
```

Den korta varianten lämpar sig för användning tillsammans med HTML-kod. Det är en kortare variant för att skriva `<?php echo $title; ?>`. Du sparar ett par tecken och koden blir lättare att läsa.




8. Uttryck och operatorer {#operatorer}
-----------------------------------------------------------------------------------------------

Det mesta du skriver i PHP är ett *uttryck*, eller *[expression](http://php.net/manual/en/language.expressions.php)*, konstruktionerna `$a = 5` och `$a++` är exempel på uttryck. Ett uttryck är helt enkelt en liten byggstenar som formar ett större PHP-skript. Ett enkelt sätt att se på ett uttryck är att **ett uttryck har ett värde**.
  
Du kan utföra beräkningar med vanliga *[operatorer](http://php.net/manual/en/language.operators.php)* såsom `+ - / * =`. Detta är operatorer som jobbar med siffror. Det finns också operatorer för att jobba med strängar och mer komplexa variabler. 



###Matematiska operatorer och *operator precedence* {#math-op}

Först ett exempel med [matematiska operatorer](http://php.net/manual/en/language.operators.arithmetic.php), det fungerar precis som i matematiken.

```php
<?php
echo (5 + 37) . "<br>";
echo (43 - 1) . "<br>";
echo (2 * 10 + 27 - 10 / 2) . "<br>";
echo (-42 * -1) . "<br>";
echo (9 % 5) . "<br>";
echo (5 % 3) . "<br>";
```

I vissa exempel kan det vara klurigt att se hur PHP väljer att räkna ut värdet på uttrycket. Men det är samma regler som gäller i matematiken. Det finns en viss förbestämd ordning, *operator precendece*, hur ett uttryck skall beräknas. Är man osäker på ordningen så använder man paranteser. Paranteser är bra för det underlättar också läsbarheten för den som tittar på din kod. Läs mer om [förbestämd ordning på Wikipedia](http://en.wikipedia.org/wiki/Order_of_operations) eller om [operator precedence fungerar i PHP](http://php.net/manual/en/language.operators.precedence.php).

[Testa exemplet här](kod-exempel/guiden-php-20/operatorer/matematiska.php).



###Strängoperator för konkatenering {#strang-op}

I exemplet ovan använder vi punkt som är en strängoperator som adderar strängar, *konkatenerar*. Så här fungerar den.

```php
<?php
echo "<p>Ge mig ett slumpmässigt tal: " . rand() .  "<br><br>Ladda om sidan för att se ett nytt tal</p>";
```

Punkten är alltså en konkateneringsoperator för strängar.

[Testa exemplet här](kod-exempel/guiden-php-20/operatorer/konkatenering.php).



###Tilldelningsoperator {#tilldelning-op}

När du vill använda tilldela ett värde till en variabel så använder du tilldelningsoperatorn `=`. Så här ser det ut.

```php
<?php
$a = 42;     // Tilldela talet 42 till en variabel

$a = $a + 7; // Värdet på variabeln $a + 7 tilldelas $a
$a += 7;     // Samma sak igen fast ett kortare sätt att skriva.

$a = $a - 7; // Värdet på variabeln $a - 7 tilldelas $a
$a -= 7;     // Samma sak igen fast ett kortare sätt att skriva.

$a = "<p>Det magiska talet är: " . $a;
$a .= "</p>";
echo $a;
```

[Testa exemplet här](kod-exempel/guiden-php-20/operatorer/tilldelning.php).



###Operatorer för `++` och `--` {#inkrement-op}

Ibland har man en variabel och vill öka eller minska värdet med 1. Då kan man använda operatorer för inkrementering `++` eller dekrementering `--`. Du kan använda dem före eller efter en variabel. Så här fungerar det.


```php
<?php
$a = 42;

echo $a++ . "<br>";  // Skriv ut värdet på variabeln och öka det sedan med 1

echo --$a . "<br>";  // Skriv ut värdet på variabeln men minska det med 1 innan du tar dess värde.
```

Det är alltså **skillnad** på om du sätter operatorn innan eller efter variabeln. I första fallet så läses variabelns värde av innan den ökas. I det andra fallet så minskas variabelns värde innan det avläses och skrivs ut.

[Testa exemplet här](kod-exempel/guiden-php-20/operatorer/inkrement.php).



###Operatorer för jämförelse {#jamforelse-op}

Operatorer för jämförelse är som i matematiken när du vill jämföra två tal. Du kan jämföra och se om talen är lika med varandra, om det ena talet är större eller mindre än det andra.

```php
<?php
$a = 42;
$b = 1337;

echo "<p>$a == $a<br>";
var_dump($a == $a); 

echo "<p>$a != $a<br>";
var_dump($a != $a); 

echo "<p>$b >= $a<br>";
var_dump($b >= $a);

echo "<p>$b < $a<br>";
var_dump($b <= $a); 
```

I PHP finns ett koncept som kallas *type juggling*. Det är när man jämför värden som enligt PHP är av olika typer. Det går bra att jämföra en sträng med en siffra, men resultatet är inte alltid uppenbart. De regler som ligger bakom går alltså att läsa om i begreppet [type juggling](http://php.net/manual/en/language.types.type-juggling.php). 

Ibland vill man undvika att PHP skall tolka och göra dessa "lösa" jämförelser, då använder man tre `===` istället för två `==`. Då görs en jämförelse både på värdet och på dess typ. Värdena är inte bara lika med varandra, de är identiska och har samma typ. Så här fungerar det.

```php
<?php
$a = 42;
$b = "42";
$c = "1337 små grisar";

echo "<p>$a === $a<br>";
var_dump($a); 
var_dump($a); 
var_dump($a === $a); 

echo "<p>$b !== $a<br>";
var_dump($b); 
var_dump($a); 
var_dump($b !== $a); 

echo "<p>$c > $a<br>";
var_dump($c); 
var_dump($a); 
var_dump($c > $a); 

echo "<p>$a + $b<br>";
var_dump($a); 
var_dump($b); 
var_dump($a + $b); 

echo "<p>$c + $a<br>";
var_dump($c); 
var_dump($a); 
var_dump($c + $a); 
```

[Testa exemplet här](kod-exempel/guiden-php-20/operatorer/jamforelse.php).




9. Strängar och stränghantering {#strangar}
-----------------------------------------------------------------------------------------------


###Enkelfnuttar, dubbelfnuttar och heredoc {#fnuttar}

I PHP blir det en del hantering av [strängar](http://php.net/manual/en/language.types.string.php). Strängar omsluts av [enkelfnuttar](http://php.net/manual/en/language.types.string.php#language.types.string.syntax.single) och [dubbelfnuttar](http://php.net/manual/en/language.types.string.php#language.types.string.syntax.double). Skillnaden mellan de två varianterna är att variabler expanderar när de står inom dubbelfnuttar men *inte* när de finns inom enkelfnuttar. Behöver du escapa ett specialtecken så sätter du en backslash framför tecknet. Du kan ha en sträng som sträcker sig över flera rader och det finns en specialkonstruktion för strängar som kallas [heredoc](http://php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc) där allt betraktas som en sträng tills ett avslutande token. Låt oss se på ett par olika sätt att hantera strängar och skriva ut dem.
  

```php
<?php
$tal = 1337;

// Enkel fnutt
$str01 = '<p>En enkel sträng inom "enkelfnuttar" med en variabel som INTE expanderas till sitt värde $tal.</p>';
$str02 = '<p>En
sträng inom 
enkelfnuttar (\') som sträcker sig över flera rader.
Men variabler såsom \$tal ($tal) expanderas inte till sitt värde.
</p>';

// Dubbel fnutt
$str11 = "<p>En enkel sträng inom 'dubbelfnuttar' med en variabel som expanderas till sitt värde $tal.</p>";
$str12 = "<p>En
sträng inom 
dubbelfnuttar (\") som sträcker sig över flera rader.
Här expanderas variabler såsom \$tal ($tal) till sitt värde.
</p>";

$str21 = <<<EOD
<p>Här kan man skriva text tills slutmarkören EOD dyker upp. Men det är oerhört viktigt att slutmarkören står ensam på raden och att den inte finns tomma tecken, som mellanslag eller tabbar, varken före eller efter slutmarkören. <b>Kom ihåg det!</b> Slutmarkör och tomma tecken ger dig problem.

<p>Variabler expanderar till sitt rätta värde och \$tal = $tal.
EOD;

// Ouput
echo <<<EOD
$str01
$str11
<hr>
<pre>$str02</pre>
$str02
<hr>
<pre>$str12</pre>
$str12
<hr>
<pre>$str21</pre>
$str21;
EOD;
```

[Testa exemplet här](kod-exempel/guiden-php-20/strangar/strangar.php).

Det finns en mängd [funktioner för att jobba med strängar](http://php.net/manual/en/ref.strings.php). Det är bra att ha en god översikt över dem, så du vet var de finns när du behöver dem. Tidigare i denna guiden såg du ett par [exempel på hur man använder strängfunktioner](#strang-funk).



###UTF-8 och multibyte strängar {#multibyte}

När du jobbar med multibyte-strängar, och teckenkodning enligt UTF-8, så finns en speciell del i manualen som beskriver ["Multibyte String"](http://php.net/manual/en/book.mbstring.php) och de funktioner som finns tillgängliga. Ofta föregås dessa funktioner av `mb_`. Det är numer nästan standard att enbart hantera UTF-8 och multibyte men det finns fortfarande många webbplatser och applikationer som inte hanterar UTF-8. Se till att du har läst översikten av tillgängliga [funktioner för multibyte strängar](http://php.net/manual/en/ref.mbstring.php).

Ett enkelt sätt att visa på skillnaden mellan multibyte strängar och icke multibyte, tex ISO-8859-1, är att räkna hur lång strängen "åäö" är. Om teckenkodningen är IS-O8859-1 så är det enkelt, alla ser att strängen innehåller tre tecken och det är också svaret som funktionen `strlen('åäö')` skulle ge. Här är kod så att du kan testa det själv.

```php
<!doctype html>
<html lang="sv"> 
<head>
<meta charset="iso-8859-1"/>
<title>php20</title>
</head>
<body>
<h1>Hur lång är en sträng, strlen('åäö') i ISO-8859-1</h1>

<p>Teckenkodningen på denna filen (1) och på webbsidan (2) är ISO-8859-1.</p>

<p>Längden på strängen 'åäö' är strlen('åäö') = <?=strlen('åäö')?> (skall vara 3).</p>
```

Gör en egen fil, se till att den sparas på disk med teckenkodning enligt ISO-8859-1, öppna den sedan i en webbläsare och resultatet skall bli den korrekta stränglängden på `åäö`.

[Testa exemplet här](kod-exempel/guiden-php-20/strangar/iso88591.php).


Men, när vi pratar UTF-8 och multibyte så blir svaret ett helt annat, `strlen('åäö')` ger svaret 6 när vi använder UTF-8 som teckenkodning. Det är för att det krävs två byten för att lagra dessa tecken. I multibyte strängar så används ett, två eller flera byten för att lagra ett tecken. Därför måste vi använda funktioner som är skräddarsydda till att hantera multibyte strängar. Funktionen `mb_strlen('åäö')` ger oss det förväntade svaret 3. Här är ett exempel som du kan testa och leka med.

```php
<!doctype html>
<html lang="sv"> 
<head>
<meta charset="utf-8"/>
<title>php20</title>
</head>
<body>
<h1>Hur lång är en sträng, strlen('åäö') i UTF-8</h1>

<p>Teckenkodningen på denna filen (1) och på webbsidan (2) är UTF-8. Den interna kodningen för PHP-installationen (3) är <?=mb_internal_encoding()?>.</p>

<p>För att vara säker på att PHP betraktar alla strängar som UTF-8 så sätter jag mb_internal_encoding('utf-8').</p>

<?php mb_internal_encoding('utf-8'); ?>

<p>PHP's interna kodning är nu: <?=mb_internal_encoding()?></p>

<p>Längden på strängen 'åäö' är strlen('åäö') = <?=strlen('åäö')?> (skall vara 6).</p>

<p>Längden på strängen 'åäö' är mb_strlen('åäö') = <?=mb_strlen('åäö')?> (skall vara 3).</p>
```

Lägg koden i en egen fil, spara filen med teckenkodning enligt UTF-8, öppna den i en webbläsare och se vad som händer.

[Testa min variant av exemplet här](kod-exempel/guiden-php-20/strangar/utf8nobom.php).

När det gäller hantering av UTF-8 och multibyte tecken krävs alltså lite mer hantering. Framförallt finns det `mb_` funktioner vi kan använda då det krävs att man tar hänsyn till multibyte-tecken. Men det krävs också att man har koll på vilken default encoding som PHP-installationen har för stränghantering. I exemplet sätter jag den explicit till att vara UTF-8. 

Teckenkodning kan vara jobbigt i början. Men när man fått ordning på det så är det inte så svårt. Det handlar i grund och botten om att datorprogram kan inte upptäcka vilken encoding man har på en sträng. Det går inte att gissa sig till vilken encoding som skall användas. Därför måste vi som programmerare ha koll, i varje programsekvens, att korrekt teckenkodning används. I vårt fall som webbprogrammerare innebär det följande:

1. Vilket format använder texteditorn för att spara filen?
2. Vilken teckenkodning säger webbsidan att den är i (`<meta charset/>`)?
3. Vilken teckenkodning använder PHP-installationen som default?

När vi kopplar in databaser så kan gäller även teckenkodning för databasen, hur data lagras i kolumnen. Det kan också vara vilken teckenkodning som används på kopplingen mellan PHP och databasmotorn. Det är många delar som kan krångla men tar man dem i ordning så brukar det gå bra. 

Övning ger färdighet. Börja med att få dessa båda exempel att fungera ovan, då har du kommit ett steg in i den underbara världen av teckenkodning.



10. Arrayer och arrayhantering {#array}
-----------------------------------------------------------------------------------------------

Arrayer är en kraftfull och användbar PHP-konstruktion. En array är en lista av värden. Varje värde kan ha en nyckel kopplad till sig.


###Skapa, skriv ut och läs en array {#array-skrivut}

Du definierar och läser från en array på array på följande sätt:

```php
// En tom array
$a = array();  

// Läs ett värde från position 1 i arrayen, ger felmeddelande eftersom det inte finns något i position 0
echo "<i>Här kommer ett felmeddelande med flit!<i>";
echo "Position 1 i arrayen innehåller " . $a[1];

// Sätt värden i arrayen
$a[1] = 42;
$a['name'] = "Mumintrollet";


// En array med värden
$a = array("1337", 42, 13.37, true, false, null);

// Läs ett värde från position 1 i arrayen, ger 42
echo "Position 1 i arrayen innehåller " . $a[1];


// array med både värden och nycklar
$a = array(
  'answer'  => 42, 
  'name'    => "Mumintrollet",
  'elite'   => 1337, 
);

// Läs det värde som är kopplat till nyckeln 'name'
echo "Värdet som är kopplat till array-nyckeln 'name' är " . $a['name'];
```

Som du ser så räknas arrayens innehåll med start på 0 när du inte tilldelar en nyckel.

När man jobbar med arrayer så är det ibland bra att skriva ut hela dess innehåll. Man är kanske osäker på dess innehåll, struktur eller nycklar. Följande två sätt är bra för att skriva ut arrayer.

```php
<?php
echo "<pre>" . print_r($a, true) . "</pre>";
echo "<pre>" , var_dump($a) , "</pre>";
```

[Testa exemplet här](kod-exempel/guiden-php-20/array/array.php).

[INFO]
**Vilket språk skall man använda i kommentarer och variabelnamn?**

I guiden mixar jag svenska och engelska på kommentarer och variabelnamn. Normalt använder jag alltid engelska när jag skriver kod. Både i kommentarer och i variabelnamn. Alltid. Utan undantag.
[/INFO]



###Arrayer och funktioner {#array-funktion}

Det finns inbyggda funktioner som gör det enkelt att jobba med arrayer. Här ser du exempel på ett par av dessa funktioner.

```php
<?php
$a = array(
  'answer'  => 42, 
  'name'    => "Mumintrollet",
  'elite'   => 1337, 
);

echo "<hr><p>Arrayen innehåller " . count($a) . " element.</p>";

ksort($a);
echo "<hr><p>Sortera arrayen baserat på nycklarna:<pre>" . print_r($a, true) . "</pre></p>";

shuffle($a);
echo "<hr><p>Kasta om värden i arrayen, ignorera nycklarna:<pre>" . print_r($a, true) . "</pre></p>";
```

[Testa exemplet här](kod-exempel/guiden-php-20/array/funktioner.php).

Läs mer om de [funktioner som finns för arrayer](http://php.net/manual/en/book.array.php). Testa några av dem, du behöver bli kompis med dem. Du kan spara mycket tid på att lära dig vilka funktioner som finns. Genom att använda funktionerna sparar du tid och slipper skriva egen kod.



###Loopa runt alla element i en array {#array-foreach}

Med loop-konstruktionen `foreach()` kan du iterera, loopa, runt alla elementen i en array. Det finns två varianter där du väljer om du vill ta hänsyn till nycklarna eller ej.

```php
<?php
$a = array(
  'answer'  => 42, 
  'name'    => "Mumintrollet",
  'elite'   => 1337, 
);

foreach($a as $value) {
  echo "Arrayen innehåller värdet '$value'.<br>";
}

foreach($a as $key => $value) {
  echo "Värdet på nyckel '$key' är '$value'.<br>";
}
```

[Testa exemplet här](kod-exempel/guiden-php-20/array/foreach.php).

Läs om [loop-konstruktionen `foreach()` i manualen](http://php.net/manual/en/control-structures.foreach.php).



11. Villkorssatser med `if`, `else if` och `else` {#if}
-----------------------------------------------------------------------------------------------

Villkorssatser med `if` är en del av det som kallas [kontrollstrukturer] i PHP. Det är programkonstruktioner som används för att styra exekveringen av ett program. Kika snabbt på översikten av de [kontrollstrukturer som finns i PHP](http://php.net/manual/en/language.control-structures.php).



###`if`-satser {#if-satser}

Villkor och villkorsatser används för att exekvera olika programkod beroende på ett villkor. Villkoret kan vara enkelt som att testa om en variabel innehåller värder 42, eller mer komplext där man testar många olika variablers värden tillsammans med operatorer som AND (`&&`) och OR (`||`).

Låt oss kika på ett exempel med [`if`-satser](http://php.net/manual/en/control-structures.if.php), [`else`](http://php.net/manual/en/control-structures.else.php) och [`else if`](http://php.net/manual/en/control-structures.elseif.php).

```php
<?php

$a = 42;
$b = 1337;

if($a < $b) {
  echo "<p>$a is less than $b</p>";
}

if($a > $b) {
  echo "<p>$a is greater than $b</p>";
} 
else {
  echo "<p>$a is less than (or equal to) $b</p>";
}

if($a > $b) {
  echo "<p>$a is greater than $b</p>";
} 
else if($a == $b) {
  echo "<p>$a is equal to $b</p>";
} 
else {
  echo "<p>$a is indeed less than $b</p>";
}

if($a == 42 && $b == 1337) {
  echo "<p>$a = 42 OCH $b = 1337</p>"
}
else {
  echo "<p>Någon har mixtrat med filen och ändrat värdena i \$a och eller \$b. Bra gjort.";
}
```

Testa själv att skapa ett testprogram med ovan kod, Vad behöver du göra för att följande rad skall skrivas ut av programmet? Testa så att du får det att fungera.

> *Någon har mixtrat med filen och ändrat värdena i $a och eller $b. Bra gjort.*

[Testa mitt exempel här](kod-exempel/guiden-php-20/villkor/if.php).

Man kan skriva en if-sats utan att ha måsvingar runt den, förutsatt att det bara är en kodrad som skall exekveras inom if-satsen. Men det är god sed att alltid använda måsvingar oavsett. Så gör det.

```php
// Gör inte så här
if($a)
  echo "hej";

// Skriv alltid med måsvingar
if($a) {
  echo "hej";
}
```

Vill du läsa mer om hur man bör skriva sin kod så kan du läsa [artikeln om kodningsstandarder för webbprogrammeraren](kunskap/kodstandarder-for-webbprogrammeraren).



###Ternary operator för korta if-satser {#ternary}

Det finns ett kortare sätt att skriva vissa if-satser. Sättet är egentligen en operator som kallas [ternary operator](http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary). Det är en konstruktion som återfinns även i andra programmeringsspråk. Det är inte en konstruktion som ersätter alla if-satser, men i vissa fall är den behändig. Speciellt bra är den när man vill ge en variabel ett värde beroende på ett villkor. 

Så här fungerar principen för ternary operatorn.

```php
(villkor) ? (värde om villkoret är sant) : (värde om villkoret är falskt)
```

Här är ett vanligt exempel där du vill tilldela en variabel ett värde beroende på om en annan variabel är definierad eller ej. I exemplet vill vi tilldela variabeln `$a` värdet `$b + 1`, men bara om `$b` har ett värde, annars skall `$a` bli `null`.

```php
<?php
// Så här gör du med en if-sats
$a = null;
if(isset($b)) {
  $a = $b + 1;
}

// Så här gör du med ternary operatorn
$a = isset($b) ? $b + 1 : null; 
```

Som du ser så blir det mindre kod när du använder ternary operatorn i detta fallet. Det är ett smidigt sätt att tilldela variabler beroende på ett villkor.

Jag gjorde ett lite utökat exempelprogram för att visa hur ternary operatorn fungerar. [Testa mitt exempel här](kod-exempel/guiden-php-20/villkor/ternary.php).



12. Villkorssatser med `switch-case` {#switch}
-----------------------------------------------------------------------------------------------

Villkorssatsen [`switch-case`](http://php.net/manual/en/control-structures.switch.php) kan jämföras med en serie av if-satser. När det blir **många tester på ett och samma villkor** så är detta en konstruktion att föredra framför upprepade satser av `if`, `else if`. Koden blir mer läsbar och det är bra. Låt oss studera ett exempel.
  
```php
<?php
//$a = 42;
//$a = 1337;
$a = "Hello World";

// As if-statements
echo "<p>As if.</p>";
if($a == 42) {
  echo '<p>$a is equal to 42</p>';
} 
else if ($a == 1337) {
  echo '<p>$a is equal to 42</p>';
} 
else if ($a == "Hello World") {
  echo '<p>$a is equal to 42</p>';
} 
else {
  echo '<p>$a is NOT an known value.</p>';
}

// As switch/case
echo "<p>As switch.</p>";
switch($a) {
  case 42:
    echo '<p>$a is equal to 42</p>';
    break;
  
  case 1337:
    echo '<p>$a is equal to 42</p>';
    break;
    
  case "Hello World":
    echo '<p>$a is equal to 42</p>';
    break;
    
  default:
    echo '<p>$a is NOT an known value.</p>';
}
```

[Testa mitt exempel här](kod-exempel/guiden-php-20/villkor/switch.php).

Du är inte begränsad till en rad i varje `case:`, du kan skriva flera rader av kod i varje `case:`. Du kan använda måsvingar för att omsluta kodraderna i varje `case:`, men det är inget krav.




13. Loopar `for()` och `while()` {#loopar}
-----------------------------------------------------------------------------------------------

Det finns flera varianter av loop-konstruktioner i PHP. En loop-konstruktion används för att återupprepa exekveringen av ett och samma kodstycke ett visst antal gånger eller tills ett villkor är uppfyllt. Låt oss titta på loop-konstruktionerna [`while()`](http://php.net/manual/en/control-structures.while.php), [`do-while()`](http://php.net/manual/en/control-structures.do.while.php) och [`for()`](http://php.net/manual/en/control-structures.for.php). 

```php
<?php
echo "<p>Count to ten using a while-loop.</p>";
$i = 0;
while($i <= 10) {
  echo "$i<br>";
  $i++;
}

echo "<p>Count to ten using a do-while-loop.</p>";
$i = 0;
do {
  echo "$i<br>";
  $i++;
} while($i <= 10);

echo "<p>Count to ten using a for-loop.</p>";
for($i = 0; $i <= 10; $i++) {
  echo "$i<br>";
}
```

Du kan alltså göra samma sak med de olika loop-konstruktionerna, vilken du väljer är upp till dig. Efterhand kommer du att märka att de olika loop-konstruktionerna lämpar sig olika väl till olika uppgifter. Loopen `while` testar alltid villkoret innan den kör en runda medans `do-while` alltid gör en runda och testar villkoret i slutet av rundan. I loopen `for` kan du tilldela variabler i själva uttrycket och lämpar sig bra för loopar som skall utföras ett bestämt antal gånger. Lär dig alla tre konstruktionerna så är du på den säkra sidan.

[Testa mitt exempel här](kod-exempel/guiden-php-20/loop/while-for.php).

Det finns ytterligare en loop-konstruktion som heter [`foreach()`](http://php.net/manual/en/control-structures.foreach.php) som används för att loopa runt elementen i en array. Se exempel på denna loopen i [stycket om arrayer](#array-foreach).



14. Alternativ syntax för kontrollstrukturer {#alternativ-struktur}
-----------------------------------------------------------------------------------------------

I ovanstående exempel med villkorssatser och loopar så används den normala syntaxen för kontrollstrukturer där blocken omsluts med måsvingar `{}`. Det är samma syntax som en C eller C++ programmerare är van vid. Det finns också en [alternativ syntax](http://php.net/manual/en/control-structures.alternative-syntax.php) som kan användas. Den alternativa syntaxen kan bibehålla läsbarheten i koden, även när man blandar PHP och HTML. Skriver man ren PHP-kod så finns det ingen anledning att använda den alternativa syntaxen.

**Exempel på alternativ syntax för `if`.**

```php
<?php
$a = 42;
//$a = 1337;
?>

<?php if($a == 42): ?>
  <p>Jag har svaret på frågan om allting.</p>
<?php elseif($a == 1337): ?>
  <p>Jag är ett pro!</p>
<?php endif; ?>
```

Som du kan se så byts måsvingarna ut mot ett kolon `:`. Det är en liten ändring men när man är i en fil som i huvudsak är HTML-kod och vill blanda upp den med lite PHP-sekvenser, då är faktiskt denna alternativa syntax att föredra.

**Exempel på alternativ syntax med `foreach`.**

```php
<?php
$b = array(
  'Namn' => 'Mumitrollet',
  'Bor'  => 'Mumindalen',
);
?>

<p>Nedan tabell visar namn och adressdetaljer.</p>
<table>

<?php foreach($b as $key => $val): ?>
  <tr>
    <th><?=$key?></th>
    <td><?=$val?></td>
  </tr>
<?php endforeach; ?>

</table>
```

[Testa mitt exempel här](kod-exempel/guiden-php-20/alternative/alternative.php). Studera min källkod för exemplet och se vad du anser om kodens struktur och om den alternativa syntaxen gör HTML-delen av koden mer läsbar.

Det är god programmeringssed att försöka separera HTML och PHP så mycket det går. En fil som innehåller en blandning av traditionell PHP-kod, uppblandad med HTML, blir snabbt oöverskådlig. Jag försöker följa ett par enkla regler när jag skriver min kod.

1. Är det bara PHP-kod så skriver jag PHP-kod som vilket programmeringsspråk som helst. I en sådan fil undviker jag HTML-kod och HTML-sekvenser.
2. Är det blandat HTML och PHP så utgår jag från HTML som struktur och använder shorttags och alternativ struktur för att minimera PHP-inslagen. Filen skall vara läsbar som en HTML-kod och innehålla utskrifter av variabler och loopar.
3. Krävs det ett inslag av PHP-kod i den blandade HTML/PHP-filen så lägger jag det stycket överst i filen och lagrar undan information i variabler som sedan skrivs ut längst ned i filen.

På dessa sätt får jag en god grundstruktur som fungerar för mig och som ger läsbar kod.



15. Fördefinierade array variabler `$_SERVER` och `$_GET` {#globals}
-----------------------------------------------------------------------------------------------

PHP har [fördefinierade variabler](http://php.net/manual/en/reserved.variables.php) som innehåller användbar information. Följande lista visar ett par av de vanliga variablerna som du kommer i kontakt med som webbutvecklare.

* `$_SERVER`
* `$_GET`
* `$_POST`
* `$_SESSION`
* `$_COOKIE`

Variablerna är [arrayer](#array), dvs att de innehåller flera värden. Låt oss titta på ett par exempel där vi skriver ut innehållet i respektive variabel. 



###Information om anropet finns i `$_SERVER` {#server}

`$_SERVER` ger information om själva anropet och om den som anropade sida. Det är information som anroparens ip-adress, vilken klient (webbläsare) som användes och vilken url som efterfrågas. 

Följande kod skriver ut anroparens ip-adress och information om användarens klient. 

```php
<?php
echo "<p>IP-adress till den som öppnade denna sidan: " . htmlentities($_SERVER['REMOTE_ADDR']);
echo "<p>I HTTP_USER_AGENT går det att utläsa vilken webbläsare som används: " . htmlentities($_SERVER['HTTP_USER_AGENT']);
echo "<p>Allt innehåll i arrayen \$_SERVER:<br><pre>" . htmlentities(print_r($_SERVER, 1)) . "</pre>";
```

Informationen som kommer i `$_SERVER` är delvis sådan som kommer från den som anropar sidan, det är information som skickas i http-headern, i själva protokollanropet. Det betyder att anroparen kan påverka innehållet i `$_SERVER`. Därför är det viktigt att inte lita på innehållet i `$_SERVER`. Använd alltid funktionen [`htmlentities()`](http://php.net/manual/en/function.htmlentities.php) när du skriver ut innehåll som du inte litar på.

Här kan du [testa exempelprogrammet](kod-exempel/guiden-php-20/predefined/server.php).



###Skicka parametrar till en sida med `$_GET` {#get}


`$_GET` är en array som innehåller de argument som skickas via länken efter ?-tecknet.(*query-delen*). Detta brukar också kallas *querystring*.

```php
<?php
if(empty($_GET)) {
  echo "<p>Du har inte skickat några parametrar till sidan</p>";
}

if(isset($_GET['hej'])) {
  echo "<p>Hej på dej själv!</p>";
}

if(isset($_GET['namn'])) {
  echo "<p>Ah, så ditt namn är '" . htmlentities($_GET['namn']) . "'. Mitt namn är Mumintrollet.</p>";
}

echo "<p>Allt innehåll i arrayen \$_GET:<br><pre>" . htmlentities(print_r($_GET, 1)) . "</pre>";
?>

<p>Pröva att klicka på någon av följande länkar:</p>

<ul>
  <li><a href='?hej'>Säg hej</a></li>
  <li><a href='?namn=Marvin'>Mitt namn är Marvin, vad heter du?</a></li>
  <li><a href='?namn=Marvin&amp;hej'>Säg hej och presentera dig!</a></li>
  <li><a href='?'>Skicka inga parametrar alls.</a></li>
</ul>
```

Man kan använda funktionerna [`empty()`](http://php.net/manual/en/function.empty.php) och [`isset()`](http://php.net/manual/en/function.isset.php) för att kontrollera om det är några specifika argument som skickats med till sidan. På det sättet kan du få en webbsida att bete sig olika beroende på de parametrar som skickas med i länken.

Som du ser i länkarna i koden ovan så kan parametrarna som skickas ha ett värde eller ej. Man separerar parametrarna med `&`-tecknet, eller dess motsvarande HTML-entitet, `&amp;`, när det skrivs i HTML-koden (annars går det inte igenom HTML valideringen). 

Här kan du [testa exempelprogrammet](kod-exempel/guiden-php-20/predefined/get.php).



16. Formulär och `$_POST` {#formular}
-----------------------------------------------------------------------------------------------

När man jobbar med HTML-formulär finns det två sätt att posta informationen, dels via länken och `$_GET`, och dels via http-headern och då hamnar informationen i `$_POST`. Vilken man väljer beror på vad man vill göra. Du kan ha följande två grundregler i huvudet.

1. Använd GET om du vill kunna länka direkt till svarssidan och kunna visa upp resultatet. Det kan till exempel vara ett sökformulär eller ett formulär där man väljer hur en lista skall sorteras.

2. Använd POST så fort som postningen av formuläret resulterar i en ändring i en fil eller databas.

Här kan du se ett exempel på när ett [formulär byggs upp](kod-exempel/business-card-generator/) och exemplet visar också på [skillnaden mellan `$_GET` och `$_POST`](kod-exempel/business-card-generator/index2.php).

I PHP så är `$_POST` en array som innehåller alla värden från det postade formuläret och som vanligt kan det vara vist att skriva ut hela arrayen när man är osäker på dess innehåll.

```php
<?php
echo "<pre>" . htmlentities(print_r($_POST, 1)) . "</pre>";
```

Vill du själv komma igång och jobba med ett eget formulär så kan du utgå från följande exempel. Det är ett enkelt formulär som postar sig själv och skriver ut resultatet. Tekniken att hantera visningen och postningen på samma sida brukar kallas för *self-submitting form*.

```php
<?php
// Alltid validera och sanitera inkommande information innan den används.
$field1 = isset($_POST['field1']) ? htmlentities($_POST['field1']) : null;
$field2 = isset($_POST['field2']) ? htmlentities($_POST['field2']) : null;
?>

<form method=post>
<fieldset>
<legend>Ett formulär att posta</legend>
<p><input type=text name=field1 value='<?=$field1?>'></p>
<p><textarea name=field2><?=$field2?></textarea></p>
<input type=submit value=Skicka>
</fieldset>
</form>

<?="<p>Allt innehåll i arrayen \$_POST:<br><pre>" . htmlentities(print_r($_POST, 1)) . "</pre>"?>
```

Här kan du [testa exempelprogrammet](kod-exempel/guiden-php-20/predefined/post.php).

Vill du själv bygga vidare på formuläret så finns det [fler formulär-element](forms). Vill du bygga mer avancerade formulär så kan du läsa om [formulär och CForm](kunskap/cform-en-php-klass-for-att-skapa-presentera-och-validera-html-formular), en klass för att hantera skapande, validerande och processande av formulär.



17. Sessioner och cookies med `$_SESSION` och `$_COOKIE` {#sessioner}
-----------------------------------------------------------------------------------------------

HTTP-protokollet är ett *stateless* protokoll vilket innebär att varje fråga-svar innehåller all information som krävs. Det finns inga krav på att HTTP-servern skall spara information om anroparen så att ett anrop kan kopplas ihop med efterkommande anrop. Men i våra webbplatser vill vi kunna hantera inloggade användare och personliga inställningar. Till vår hjälp finns sessioner och cookies.



###Kom ihåg saker med sessionen och $_SESSION {#session}

Rent användarmässigt så handlar det om arrayen `$_SESSION`. I den kan vi lagra information som i vilken array som helst, dessutom kommer arrayen att innehålla information som kan minnas mellan sidoanropen. Här är ett enkelt testprogram som visar hur det fungerar.

```php
<?php
session_name('php20guiden');
session_start();

if(isset($_SESSION['count'])) {
  $_SESSION['count']++;
}
else {
  $_SESSION['count'] = 0;
}

if(isset($_GET['reset'])) {
  $_SESSION['count'] = 0;
}

echo "<p>Allt innehåll i arrayen \$_SESSION:<br><pre>" . htmlentities(print_r($_SESSION, 1)) . "</pre>";
?>

<p><a href="?">Ladda om sidan och öka variabeln med ett</a> | <a href="?reset">Nollställ variabeln</a></p>
```

Här kan du [testa exempelprogrammet](kod-exempel/guiden-php-20/predefined/session.php).

När vi loggar in på en webbplats så används sessionen för att minnas vem vi är.

Det finns [funktioner](http://php.net/manual/en/ref.session.php) för den som vill göra lite mer med sessioner. Pröva gärna att bygga ut testprogrammet genom att skriva ut sessions id, namn och tiden för hur länge sessionen lever.

När man vill förstöra en session, tex för att logga ut en användare från en webbplats, så gör man det precis som de gör i exemplet på manualsidan för [destroy_session()](http://php.net/manual/en/function.session-destroy.php).



###Lämna ett spår med cookies och $_COOKIE {#cookie}

[Cookies](http://php.net/manual/en/features.cookies.php) ger en möjlighet att lämna ett litet spår i besökarens webbläsare. Det är en liten fil som lagras hos den som besöker din webbplats och cookien skickas som en del av HTTP headern. Detta innebär att cookien måste sättas innan något skrivs ut till webbläsaren. Det är samma begränsning som gäller för sessionen.

Så här använder du cookie.

```php
<?php
// Set the cookie
$value = 'something from somewhere';

$output = null;
if(isset($_GET['set'])) {
  setcookie("TestCookie1", $value);
  setcookie("TestCookie2", $value, time()+3600);
  $output = "<p>Skapade två cookies med namn TestCookie1 och TestCookie2. <a href='?''>Ladda om sidan för att se dem</a>.</p>";
}
else if(isset($_GET['reset'])) {
  // Set time in past to trigger removal of cookie in browser
  setcookie("TestCookie1", "", time()-3600);
  setcookie("TestCookie2", "", time()-3600); 
  $output = "<p>Raderade två cookies med namn TestCookie1 och TestCookie2. <a href='?'>Ladda om sidan för att se att de inte finns kvar</a>.</p>";
}

echo "<p>Allt innehåll i arrayen \$_COOKIE:<br><pre>" . htmlentities(print_r($_COOKIE, 1)) . "</pre>";
?>

<p><a href="?">Ladda om sidan</a> | <a href="?set">Skapa cookie</a> | <a href="?reset">Ta bort cookie</a></p>
<?=$output?>
```

Här kan du [testa exempelprogrammet](kod-exempel/guiden-php-20/predefined/cookie.php).

Läs mer om olika varianter av cookies med [setcookie()](http://php.net/manual/en/function.setcookie.php).

Läs om hur du använder [cookies på ett säkert sätt](http://stackoverflow.com/questions/7591728/designing-a-secure-auto-login-cookie-system-in-php) för att göra automatisk inloggning för dina användare. 



18. `header()` för skicka vidare, felhantering och nedladdning {#header-func}
-----------------------------------------------------------------------------------------------

HTTP-protokollet, det som används för att visa webbsidor, innehåller en header-del och en body-del. När vi visar en vanligt webbsida så sköter webbservern om att skapa själva headern för svaret. Men om vi vill göra lite mer komplexa saker så behöver vi själva skapa headern för HTTP-protokollet. Detta kan vi göra med PHP-funktionen [`header()`](http://php.net/manual/en/function.header.php).

Med hjälp av `header()` kan vi skicka vidare till en svarssida. Det är ett vanligt sätt att hantera processing av formulär, först processar man själva formuläret och sparar i databasen, sedan skickar man vidare till en ny sida som visar resultatet. Man gör en så kallad "redirect".

På liknande sätt kan vi skicka en statuskod som 404 för att säga att sidan inte finns, eller 403 för att säga att sidan inte har rättigheter att visas. Med hjälp av dessa kan vi skapa egna sidor för felhantering och visa dem istället för webbserverns standardiserade felsidor.

Ett annat sätt att använda `header()`-funktionen är att hantera nedladdning av filer. Ibland vill man inte ge direktlänken till nedladdningsfilen utan man vill sköta nedladdning via ett PHP-skript, det kan du göra genom att skicka rätt HTTP-header.

I följande exempelkod ser du olika varianter på HTTP-headers med `header()` funktionen.

```php
<?php
$do = isset($_GET['do']) ? $_GET['do'] : null;

switch($do) {
  case 'redirect':
    // Redirect to another page, perhaps a resultpage showing the result of a posted form
    header("Location: http://dbwebb.se/style");
    exit;
    break;
    
  case '404':
    // Generate HTTP response code 404 Not Found
    header("HTTP/1.0 404 Not Found");
    echo "This is a generated page with a 404 Not Found HTTP header, you may analyse the headerinformation with your browser to verify it.";
    exit;
    break;
    
  case '403':
    // Generate HTTP response code 403 Forbidden
    header("HTTP/1.0 403 Forbidden");
    echo "This is a generated page with a 403 Forbidden HTTP header, you may analyse the headerinformation with your browser to verify it.";
    exit;
    break;
    
  case 'pdf':
    // Download a pdf-file and name it downloaded.pdf
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="downloaded.pdf"');
    readfile(__DIR__ . '/hello.pdf');
    exit;
    break;
    
  case 'zip':
    // Download a zip-file and name it downloaded.zip
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename="downloaded.zip"');
    readfile(__DIR__ . '/hello.zip');
    exit;
    break;

  default:
    ;
}
```

Kan du nu själv sätta ihop ett exempelprogram som testar funktionen `header()`?

Funktionen `header()` måste anropas innan något har skrivits ut till webbläsaren, annars får du ett felmeddelande som ser ut så här.

>  Warning: Cannot modify header information - headers already sent by (output started at /usr/home/mos/htdocs/dbwebb.se/kod-exempel/guiden-php-20/header/multitest.php:11) in /usr/home/mos/htdocs/dbwebb.se/kod-exempel/guiden-php-20/header/multitest.php on line 12

Det räcker med ett mellanslag eller nyrads-tecken för att felmeddelandet skall uppkomma. Var noga med hur du skriver din kod, då blir det enklare att felsöka denna typen av felmeddelanden.

Här kan du [testa min variant exempelprogrammet](kod-exempel/guiden-php-20/header/multitest.php).



19. Funktioner {#funktioner}
-----------------------------------------------------------------------------------------------

När programmen växer så måste man organisera sin kod. Att dela in koden i filer är ett sätt och att skriva kod i funktioner är ett annat sätt att skapa en organisation kring sin kod. Att duplicera kod är inte önskvärt, det blir svårt att underhålla och vidareutveckla kod som är gjort enligt copy-paste metod. En bra programmerare ser alltid över sin kod och försöker finna en bra struktur som underlättar underhåll och vidareutveckling av koden.



###Funktionen `dump()` {#dump}

Att skapa en funktion är enkelt. Som du kanske märkt så använder jag ofta följande sekvens för att skriva ut innehållet i en array.

```php
echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
```

Kodsekvensen lämpar sig ypperligt för en funktion. Men en funktion så slipper jag skriva den långa raden så fort jag vill debugga en array. Se följande exempel på hur en sådan funktion kan se ut. Funktionen tar ett argument, det är själva arrayen som skall skrivas ut som skickas som ett argument till funktionen.

```php
function dump($array) {
  echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}

// anropa funktionen så här
dump($_SERVER);
```

Istället för den längre sekvensen så räcker det nu att jag skriver funktionens namn och skickar med den array jag vill skriva ut. Jag sparar ett antal knapptryckningar och mitt kodande går snabbare. Detta är precis det som funktioner handlar om.

En funktion skall vara kort och göra en sak, blir den för lång så blir koden oöverskådlig och då bör du bryta ned funktionen i mindre delar. Ett riktvärde kan vara max 30 rader kod per funktion, helst mindre. Men det beror alltid på vad man gör. Mina egna funktioner är ofta mindre än tio rader kod.

Här kan du [testa exempelprogrammet](kod-exempel/guiden-php-20/function/dump.php).



###Funktionen `getCurrentUrl()` {#getcurrenturl}

En bra-att-ha funktion är en funktion som ger dig länken till nuvarande sida. Det är något du kan använda för att skapa en [permalänk](http://sv.wikipedia.org/wiki/Permal%C3%A4nk) till en sida. Informationen som behövs för att återskapa länken finns i `$_SERVER`. Så här kan funktionen se ut.

```php
function getCurrentUrl() {
  $url = "http";
  $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
  $url .= "://";
  $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
  $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
  return $url;
}

// anropa funktionen så här
echo getCurrentUrl();
```

Du kan testa funktionen i inlägget ["Tips från Coachen: Hitta länken till nuvarande sida med en PHP-funktion - getCurrentUrl()"](coachen/hitta-lanken-till-nuvarande-sida-med-en-php-funktion-getcurrenturl).



###Mer om funktioner {#mer-funktioner}

För den som vill koda PHP som ett riktigt programmeringsspråk så är funktioner ett nödvändigt verktyg. Vill du bygga enklare webbplatser så klarar du dig rätt långt med enklare PHP-kod. Om du redan kan ett annat programmeringsspråk så är funktioner säkert inget konstigt för dig. Grunderna i funktioner är samma, oavsett programmeringsspråk.

Oavsett dina förkunskaper och behov av funktioner så finns det ett stycke i PHP-manualen som är lämplig att läsa om du vill veta [mer om funktioner](http://php.net/manual/en/language.functions.php) och få ut maximalt av dem. Där beskrivs framförallt grunderna i hur du skapar [egna funktioner](http://php.net/manual/en/functions.user-defined.php), hanterar [argument](http://php.net/manual/en/functions.arguments.php) och [returvärden](http://php.net/manual/en/functions.returning-values.php).

När du nu börjar med funktioner så behöver du också koll på det som kallas "block-scope" [^3]. Det säger var en variabel är synlig. Läs på om [variablers synlighet](http://php.net/manual/en/language.variables.scope.php) och kika lite extra på sektionen om nyckelordet `global`.

Se till att vara kompis med manualen så har du alltid nära till facit. Svårare är det inte, lär dig läsa och hitta i manualen, där finns det mesta du behöver veta om PHP.

Börja nu med att spara dessa två funktioner i en egen fil, `functions.php`. Låt det bli en fil som du använder för att spara dina egna bra-att-ha funktioner som du hittar, eller bygger själv. Efterhand kommer sådan kod som du sparar och återanvänder göra att du blir snabbare, säkrare och effektivare i din programmerarroll. Så, börja nu, glöm inte att skriva kommentarer som [PHPDoc](#kommentarer) ovanför varje funktion.



20. Mer med PHP {#forms}
-----------------------------------------------------------------------------------------------

Nu har du gått igenom grunderna i PHP, du har fått en bas att stå på. Om du nu har skrivit egna exempelprogram för varje stycke så har du något du kan bygga vidare på. Vi har framförallt behandlat följande delar av PHP-manualen ["Language Reference"](http://php.net/manual/en/langref.php). 

1. [Grundläggande syntax](http://php.net/manual/en/language.basic-syntax.php)
2. [Typer](http://php.net/manual/en/language.types.php)
3. [Variabler](http://php.net/manual/en/language.variables.php)
4. [Konstanter](http://php.net/manual/en/language.constants.php)
5. [Uttryck](http://php.net/manual/en/language.expressions.php)
6. [Operatorer](http://php.net/manual/en/language.operators.php)
7. [Kontrollstrukturer](http://php.net/manual/en/language.control-structures.php)
8. [Funktioner](http://php.net/manual/en/language.functions.php)

En av de viktigast kunskaperna du nu bör ha är att leta dig fram i manualen efter information. Du behöver kunna söka i den och förstå grunderna för hur manualen är skriven. Det som står i manualen är ditt facit. När du väl känner dig bekväm i manualen så ligger en värld av PHP-kod öppen för dig. Google i all ära men vissa tips som du hittar har ingen kvalitetsstämpel eller bäst före datum. Återvänd alltid till manualen för att känna dig säker.

När du känner dig hemma i grunderna i PHP så behöver du bygga en eller annan webbplats, eller i alla fall skriva lite PHP-kod, så att du blir varm i kläderna. När du har gjort det så är nästa steg att skriva väl strukturerad kod. Ett steg på den vägen är att lära dig koda objektorienterat i PHP. Grunderna för detta finns i manualen under stycket [klasser och objekt](http://php.net/manual/en/language.oop5.php).

Koda nu loss och se hur långt det räcker. Kom bara ihåg:

> *1. Felmeddelandet har alltid rätt.*

> *2. Referensmanualen är din bästa vän. Glöm aldrig det.*

> *3. Felsök med `echo` och kommentarer. Identifiera alltid den kodrad som ger dig bekymmer.*



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2015-01-12 (D, mos) Stavfel.  
2014-11-26 (C, mos) Uppdaterade länkar till php.net.  
2013-06-11 (B, mos) Kopia till /kunskap, total genomgång och rejäl uppdatering och omstrukturering.  
2011-09-07 (A, mos) Första utgåvan som en del av kursen [htmlphp](htmlphp).  
</span>



Referenser {#referenser}
------------------------

Följande är referenser som använts som fotnötter i texten.

[^1]: [PHP's hemsida](http://php.net/).

[^2]: [Läs om PHP på Wikipedia](http://en.wikipedia.org/wiki/PHP).

[^3]: [Läs om scope på Wikipedia](http://en.wikipedia.org/wiki/Scope_%28computer_science%29).
