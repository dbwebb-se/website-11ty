---
author: mos
revision:
  "2012-08-29": (F, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown. Mindre justeringar.
  "2010-10-26": (E, mos) Justerade text om felmeddelanden som missuppfattats, stycke
    1.2.
  "2010-09-01": (D, mos) Mindre justering i texten om redovisningen.
  "2010-03-04": (C, mos) Numrerade styckena för att underlätta hitta i dokumentet.
  "2009-09-07": (B, mos) Ändrade länkarna till PHP-manualen samt smärre formateringar/justeringar
    av textstycken.
  "2009-09-04": (A, mos) Första utgåvan
published: "2012-08-29"
updated: "2013-08-13 10:28:17"
created: "2012-08-30 08:14:59"
...
Kmom02/03: PHP-programmeringens grunder
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




PHP-programmeringens grunder {#start}
--------------------------------------------------------------------

*alternativt "Mitt eget Hangman i PHP"*

Övningen går ut på att lära sig ett antal grundkonstruktioner i PHP programmering. Vi utgår från exempel-programmet "Hänga gubben" och vi återskaper det, steg för steg.

Efter övningen så kan du grunderna som krävs för att skapa ditt eget hangman-spel eller annat PHP program. Övningen avslutas med en liten tankenöt.

I denna övning så kommer du ägna en hel del tid åt att läsa i PHPs refmanual.

[INFO]
**Notering.**

Övningen spänner över flera delar av grundkonstruktionerna i PHP och HTML. Det är viktigt att du förstår dem. Ta därför god tid på dig när du gör övningen, testa, lek, läs manualen och testa igen. Gör gärna egna exempel program för att testa det som du ännu inte har koll på. Om du är nybörjare på programmering så gäller det att ta det lugnt och ha tungan rätt i mun. Jobba strukturerat. Använd chatten och forumet om det kör ihop sig.
[/INFO]

Glöm inte att läsa litteraturen.

Övningens upplägg är enligt följande:

* Läsanvisningar (4-10h)
* Övningar (8-30h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 40 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Följande kapitel hanteras under detta kursmomentet. Läs dem inför kursmomentet. Du behöver inte ha full koll på alla delar i kapitlen, men se till att du har läst igenom dem.

* Ch 5: Arrays
* Ch 8: Error and Exception Handling (läs endast översiktligt)
* Ch 9: Strings and regular expressions (hoppa över reguljära uttryck)
* Ch 13: Forms


Sedan tidigare har vi läst följande kapitel, gå gärna tillbaka till det vid behov:

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics


###Beginning Web Programming with HTML, XHTML, and CSS {#beginning-web}

*(2nd edition)*

Du bör ha grundläggande kunskaper i HTML och veta hur en enklare webbsida ser ut. Följande kapitel ger dig en bra grund att stå på. Läs efter behov.

* Ch 5: Forms

Du har sedan tidigare läst dessa kapitel, gå tillbaka till dem vid behov.

* Ch 1: Creating Structured Documents
* Ch 2: Links and Navigation
* Ch 3: Images and Objects


###Databasteknik {#Databasteknik}

*(Första utgåvan)*

Det finns inga specifika läsanvisningar som är kopplade till detta kursmoment.


###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

Glöm inte din bästa vän, PHP manualen.

* <a href='http://www.php.net/manual/en/'>http://www.php.net/manual/en/</a>

W3C och dess referensmanualer är oumbärliga. Använd som referens vid behov.

* <a href='http://www.w3.org/TR/html401/interact/forms.html'>http://www.w3.org/TR/html401/interact/forms.html</a>

W3Schools.com är bra att ha tillhanda. Använd som referens vid behov.

* <a href='http://www.w3schools.com/php/'>http://www.w3schools.com/php/</a>
* <a href='http://www.w3schools.com/html/'>http://www.w3schools.com/html/</a>
* <a href='http://www.w3schools.com/html/html_forms.asp'>http://www.w3schools.com/html/html_forms.asp</a>
* <a href='http://www.w3schools.com/html/html_xhtml.asp'>http://www.w3schools.com/html/html_xhtml.asp</a>
* <a href='http://www.w3schools.com/svg/'>http://www.w3schools.com/svg/</a>

Som lite överkurs så kan du läsa om SVG. Men gör bara det om du är intresserad, annars hoppa över det.

* <a href='http://www.w3.org/Graphics/SVG'>http://www.w3.org/Graphics/SVG</a>
* <a href='http://en.wikipedia.org/wiki/SVG'>http://en.wikipedia.org/wiki/SVG</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.


1. En template till spelet hangman {#template}
--------------------------------------------------------------------

###1.1 Titta på det som funkar {#titta}

Kommer du ihåg hangman-spelet? Sugen på att spela lite mer?

* <a href='http://www.student.bth.se/~mos/hangman/PHangman.php'>http://www.student.bth.se/~mos/hangman/PHangman.php</a>

Ok, du vet hur det fungerar va? Källkoden till programmet ser du här.

* <a href='http://www.student.bth.se/~mos/hangman/PListDirectory.php?dir=&file=PHangman.php'>http://www.student.bth.se/~mos/hangman/PListDirectory.php?dir=&file=PHangman.php</a>

Om man gör en skiss över programmets innehåll så kan den se ut så här.

1. Första stycket felhantering och stöd för debugging.

2. Här hanteras inkommande `_GET` variabler. Med hjälp av dessa så håller programmet minnet vilka gissningar som gjorts och vilket ordet är.

3. Här skapas en ordlista i en array.

4. Här är en `for`-loop och en `if`-sats för att kontrollera ordet och byta ut '-' mot den rätt gissade bokstaven.

5. Nästa steg är att räkna antalet misslyckade gissningsförsök.

6. Därefter kollar programmet om alla bokstäver är rätt gissade.

7. För att sen kolla om alla gissningarna är använda.

8. Nu skapas formuläret som används för att gissa en ny bokstav och för att skicka med ordet och de bokstäver som redan gissats.

9. Därefter skapas bilden och ritas beroende på antalet felgissade försök.

10. Det sista som sker är att lägga hela xhtml-sidan i en sträng för att sedan skriva ut den.


###1.2 Koda ditt eget Hangman {#koda}

Ska vi se om vi kan skapa vår egen variant av hangman? Vi tar och utgår från en template-fil som endast innehåller kommentarerna. Därefter försöker vi steg för steg fylla på med funktioner så att vi till slut har det färdiga hangman-spelet.

**Gör så här:**

1. Skapa en ny katalog, `hangman`.

2. Skapa en ny fil, `hangman.php`.

3. Kopiera innehållet från filen `PHangmanTemplate.php` till din egen fil `hangman.php`.
  * <a href='http://www.student.bth.se/~mos/hangman/PListDirectory.php?dir=&file=PHangmanTemplate.php'>http://www.student.bth.se/~mos/hangman/PListDirectory.php?dir=&file=PHangmanTemplate.php</a>

4. Kolla så att din fil `hangman.php` fungerar.

5. Se till så att du även tar med din `common.php` och `source.php` till den nya katalogen.

Så här ser det ut för mig när jag testkör min `hangman.php`. Mina felmeddelanden är avstängda. Om du får felmeddelande så är det helt ok i detta läget.

* <a href='http://www.student.bth.se/~mos/oophp/mom02/hangman1/hangman.php'>http://www.student.bth.se/~mos/oophp/mom02/hangman1/hangman.php</a>

[FIGURE src=/img/oophp/kmom02/image06.png?w=w1 caption="Min egna hangman.php som utgår från `PHangmanTemplate.php`."]

Ok? Då sätter vi igång. Börja med att byt ut "Titel" och "Någon inledande text kanske" mot något eget, Vad sägs om "Hangman" och "Spela det klassiska spelet hangman". Eller något annat...


2. Felhantering och felsökning {#felhantering}
--------------------------------------------------------------------


###2.1 Error handling on/off {#errorhandling}

I ursprungskoden så var detta stycke kodat enligt:

```php
// -----------------------------------------------------------------------
//
// Error handling on/off
//
error_reporting(E_ALL);
$debug = "";
$debugEnable = FALSE;
```

Kopiera in ovanstående kod till din hangman och testkör det. Vi kan förvänta oss att få ett par felmeddelanden.

[FIGURE src=/img/oophp/kmom02/image07.png?w=w1 caption="Samma fil med felmeddelanden efter att vi slagit på error reporting."]

Bara för att det först ser bra ut behöver det inte betyda att det är bra. Labbmiljön har en annan inställning för felmeddelanden. Det är viktigt att vi får se samtliga felmeddelanden när vi utvecklar. Annars försvinner snabbt många timmar i felsökningstid.


###2.2 `error_reporting()` {#errorreporting}

I refmanualen finns det ett stycke om PHP's felhantering och loggning. Kolla igenom det översiktligt och läs sedan igenom manualsidan för `error_reporting()`.

* <a href='http://www.php.net/manual/en/book.errorfunc.php'>http://www.php.net/manual/en/book.errorfunc.php</a>
* <a href='http://www.php.net/manual/en/function.error-reporting.php'>http://www.php.net/manual/en/function.error-reporting.php</a>

**Uppgift:**

I PHP så inkluderas inte alla typer av felmeddelanden i `E_ALL`, kolla vilket som saknas och lägg till så att även det felet rapporteras.

**Uppgift:** 

Ändra din kod så att felmeddelandena i bilden ovan försvinner.


###2.3 Egen debugging med `$debug` och `$debugEnable` {#debugenable}

De två raderna med debug-variabler har jag lagt dit själv. De är tänkta att använda för att underlätta debugging, felsökning och för att kontrollera att programmet fungerar som det ska. Tanken är att man låter variablen `$debug` innehålla information som sedan skrivs ut på sidan, förutsatt att `$debugEnable` är satt till `TRUE`.

**Uppgift:** 

Lägg till lite testinformation till debug-variablen och sätt `$debugEnable` till `TRUE`. Skrivs information ut? Det skall den göra, leta reda på var i filen som den skrivs ut.

Så här ser det ut för mig när jag är klar. Du får gärna ta en "livlina" och tjuvkika på min källkod.

* <a href='http://www.student.bth.se/~mos/oophp/mom02/hangman2/hangman.php'>http://www.student.bth.se/~mos/oophp/mom02/hangman2/hangman.php</a>

[FIGURE src=/img/oophp/kmom02/image08.png?w=w1 caption="Samma fil med felmeddelanden efter att vi slagit på error reporting."]

Så där, nu kan vi hantera felmeddelanden och felsökning lite bättre.


3. Formulär {#formular}
--------------------------------------------------------------------

Följande övning förutsätter att du har koll på formulär i HTML. Läs på enligt läsanvisningarna vid behov.


###3.1 Formulär, form {#form}

Leta reda på den del av filen som skapar själva formuläret, lägg dit följande kodsnutt.

```php
// ------------------------------------------------------------------------
//
// Create a form for managing input.
//
$form = <<< EOD
<form action='hangman.php' method='get'>
 <input type='text' name='char' />
 <button type='submit'>Gissa</button>
</form>
EOD;
```

Detta är ett exempel på ett enkelt formulär. Ett inmatningsfält, en submit-knapp och filen `hangman.php` skall anropas när man klickar på submit-knappen.

Om du är en nybörjare på formulär så kan det vara lämpligt att läsa på lite. Börja gärna med W3Schools och ta sedan en titt i referensmanualen för HTML/Forms. I refmanualen finns som vanligt alla svar. Det gäller bara att hitta dem.

* <a href='http://www.w3schools.com/html/html_forms.asp'>http://www.w3schools.com/html/html_forms.asp</a>
* <a href='http://www.w3.org/TR/html401/interact/forms.html'>http://www.w3.org/TR/html401/interact/forms.html</a>

Testa nu att din fil fungerar, inga felmeddelanden va? Pröva att skriv in lite tecken i fältet och klicka på submit-knappen, vad händer? Inget? Bra, låt oss då gå vidare och hantera resultatet av ett submittat formulär.


###3.2 `$_GET['char']` {#_get}

`$_GET` är en array som innehåller alla parametrar som skickats till skriptet via formuläret.

* <a href='http://php.net/manual/en/reserved.variables.get.php'>http://php.net/manual/en/reserved.variables.get.php</a>

Vi testar att skriva ut innehållet i arrayen (på rätt ställe i filen).

```php
// -------------------------------------------------------------------------
//
// Take care of GET variables
//
print_r($_GET);
```

Funktionen `print_r()` är bra att ha, den kan skriva ut innehållet i en array.

* <a href='http://php.net/manual/en/function.print-r.php'>http://php.net/manual/en/function.print-r.php</a>

Ett vanligt sätt att hantera en `_GET`-parameter är att plocka ut dess värde och lägga i en vanlig variabel. För att undvika felmeddelanden av typen `NOTICE` så bör man dock alltid kolla så att `_GET`-parametern inte är tom. Det kan man göra med funktionen `empty()`. Följande kod visar ett vanligt sätt att göra detta.

```php
// -------------------------------------------------------------------------
//
// Take care of GET variables
//
//print_r($_GET);
$char = (empty($_GET['char']) ? "" : $_GET['char']);
$debug .= "char = {$char}<br />";
```

Du kommer ihåg den här kort-varianten av `if`-sats, eller?

* <a href='http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary'>http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary</a>

Lite klurig att komma igång med men väldigt nyttig.


###3.3 `input type='hidden'` {#input_hiden}

I ett formulär så kan man ha dolda fält, fält som innehåller värden men som inte syns på sidan. Dessa anges som typen `hidden`. Låt oss pröva att lägga till två dolda fält i formuläret, ett som kan innehålla nuvarande ord och ett som kan innehålla alla tecken man gissat på.

```php
// -------------------------------------------------------------------------
//
// Create a form for managing input.
//
$form = <<< EOD
<div>
  <form action='hangman.php' method='get'>
    <input type='hidden' name='word'    value='{$word}' />
    <input type='hidden' name='guessed' value='{$guessed}' />
    <input type='text'   name='char' />
    <button type='submit'>Gissa</button>
  </form>
</div>
EOD;
```

Skapa också kod för att hantera `_GET`-parametrarna när de kommer in till skriptet.

```php
// -------------------------------------------------------------------------
//
// Take care of GET variables
//
//print_r($_GET);
$char    = (empty($_GET['char'])    ? "" : $_GET['char']);
$word    = (empty($_GET['word'])    ? "" : $_GET['word']);
$guessed = (empty($_GET['guessed']) ? "" : $_GET['guessed']);
$debug .= "char = {$char}<br />";
$debug .= "word = {$word}<br />";
$debug .= "guessed = {$guessed}<br />";
```

Testa och provkör, fungerar det? Gör submit och studera webb-länken. Ser du att något har lagts till i slutet av den? Det är på detta sättet som `_GET`-parametrarna skickas till skriptet. Så här ser länken ut hos mig:

* `hangman.php?word=&guessed=&char=a`

Det betyder att parametrarna `word` och `guessed` inte har några tilldelade värden. Parametern `char` har värdet `a`.

GET-sättet att skicka parametrar till ett skript gör det enkelt att via webblänken ändra värdet på parametrarna. Pröva att använda nedanstående länk till ditt eget hangman, fungerar det som man kan förvänta sig?

* `hangman.php?char=a&word=programvaruteknik&guessed=aeo`


###3.4 `$_POST['char']` {#_post}

Ett alternativ sätt att jobba med formulär är POST-metoden. Där skickas formuläret inte via webblänken utan via http-header istället. På det viset så blir formuläret inte synligt för blotta ögat och dess innehåll kommer heller inte loggas i webbserverns transaktionslog. Titta i refmanualen för att se exempel på POST och läsa mer om skillnaderna mellan GET och POST.

* <a href='http://php.net/manual/en/language.variables.external.php'>http://php.net/manual/en/language.variables.external.php</a>
* <a href='http://php.net/manual/en/reserved.variables.post.php'>http://php.net/manual/en/reserved.variables.post.php</a>

Pröva gärna att göra om ditt GET-formulär till ett POST-formulär. Bara för att testa, gå sen tillbaka till GET i denna övningen.

Klarade du av det?
 

###3.5 `$_SERVER['PHP_SELF']` {#_server}

En annan inbyggd variabel som är bra att ha är `_SERVER`. Den innehåller en hel del information som kommer in till skriptet. Låt oss titta vad den innehåller genom att skriva ut den med `print_r()`. HTML-taggen `<pre>` gör så att det ser lite snyggare ut i webbläsaren.

* <a href='http://www.w3.org/TR/html401/struct/text.html#h-9.3.4'>http://www.w3.org/TR/html401/struct/text.html#h-9.3.4</a>
* <a href='http://php.net/manual/en/reserved.variables.server.php'>http://php.net/manual/en/reserved.variables.server.php</a>

```php
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
```

Som du ser så blir det en hel del spännande information som skrivs ut. Letar reda på parametern `PHP_SELF` och se vad det innehåller för värde.

[FIGURE src=/img/oophp/kmom02/image09.png?w=w1 caption="Utskrift av `$_SERVER`."]

`PHP_SELF innehåller en "ren" länk till sidan, utan några parametrar. Låt oss använda den för att "starta om" spelet. Starta om men ett nytt ord och utan gissningar. Uppdatera ditt fomulär så att det ser ut ungefär som följande.

```php
// -------------------------------------------------------------------------
//
// Create a form for managing input.
//
$form = <<< EOD
<div>
  <form action='hangman.php' method='get'>
    <input type='hidden' name='word'    value='{$word}' />
    <input type='hidden' name='guessed' value='{$guessed}' />
    <input type='text' name='char' />
    <button type='submit'>Gissa</button>
  </form>
  <a href='{$_SERVER['PHP_SELF']}'>Starta om</a>
</div>
EOD;
```
Perfekt, då är vi klara med formuläret. Du kan se hur det fungerar hos mig.

* <a href='http://www.student.bth.se/~mos/oophp/mom02/hangman3/hangman.php?word=programvaruteknik&guessed=ae&char=s'>http://www.student.bth.se/~mos/oophp/mom02/hangman3/hangman.php?word=programvaruteknik&guessed=ae&char=s</a>

[FIGURE src=/img/oophp/kmom02/image01.png?w=w1 caption="Hangman med GET-formulär och en "Starta om"-länk."]

Kolla gärna hur min slutliga källkod ser ut. Jämför med din egen.

Låt oss fortsätta.


4. Arrayer {#array}
--------------------------------------------------------------------


###4.1 Om arrayer {#om-arrayer}

Arrayer, är en kraftfull konstruktion i PHP, och mycket användbar. En styrka är också att kunna omvandla mellan arrayer och strängar. Läs mer om arrayer i refmanualen. Kolla framförallt alla funktioner som du kan använda tillsammans med en array.

* <a href='http://php.net/manual/en/book.array.php'>http://php.net/manual/en/book.array.php</a>
* <a href='http://php.net/manual/en/function.implode.php'>http://php.net/manual/en/function.implode.php</a>

Låt oss skapa en liten ordlista med 10 ord i en array.

```php
// --------------------------------------------------------------------------
//
// Create a wordlist and pick the word.
//
$words = Array(
        'pellefant',
        'moped',
        'asket',
        'tant',
        'fotboll',
        'programvaruteknik',
        'webb',
        'databaser',
        'php',
        'xhmtl',
        );
$theWord = $words[1];
$debug .= "Ordlista: " . implode(', ', $words) . "<br />";
$debug .= "Valt ord: '{$theWord}'<br />";
```

Koden ovan skapar en ordlista med 10 ord och väljer ut ett ord, `$theWord`, som nuvarande ord.

Tanken är att låta en av formulärets dolda variablerna välja vilket ord som skall användas.

Det kan vi göra genom att byta ut 1:an mot variablen `$word`. Därefter låter vi `$word` vara en siffra som anger vilket ord som gäller.

Så här kan det se ut.

* <a href='http://www.student.bth.se/~mos/oophp/mom02/hangman4/hangman.php?word=5&guessed=&char=s'>http://www.student.bth.se/~mos/oophp/mom02/hangman4/hangman.php?word=5&guessed=&char=s</a>

[FIGURE src=/img/oophp/kmom02/image00.png?w=w1 caption="Hangman med GET-formulär och en "Starta om"-länk."]

Ändra GET-parametern `word` till en annan siffra och se vad som händer. Pröva även en siffra som är större än antalet ord i ordlistan. Förstå vad händer och fundera på hur man kan hantera det?


###4.2 foreach-loop {#foreach}

Ofta vill man gå igenom alla element i en array och testa dem på något sätt. Loop-konstruktionen foreach är ett bra sätt att göra det. Säg att vi vill beräkna längden på varje ord och skriva ut den tillsammans med ordet. Följande kod löser det åt oss. Testa koden i ditt eget program.

* <a href='http://php.net/manual/en/control-structures.foreach.php'>http://php.net/manual/en/control-structures.foreach.php</a>
* <a href='http://php.net/manual/en/function.strlen.php'>http://php.net/manual/en/function.strlen.php</a>

```php
$debug .= "Ordens respektive längd: ";
foreach($words as $w) {
  $debug .= "{$w} (" . strlen($w) . "), ";
}
$debug .= "<br />";
```


###4.3 Array-funktioner {#arrayfunc}

Det finns mängder med inbyggda array-funktioner. Låt oss pröva några av dem.

1. Sortera ordlistan (`asort()`), skriv ut den.

2. Räkna antalet element i ordlistan (`count()`).

3. Skaka om ordlistan med `shuffle()`, skriv ut den.

4. Plocka ut ett slumpmässigt valt ord ur ordlistan (`array_rand()`).

Manualsidorna hittar du här.

* <a href='http://php.net/manual/en/function.asort.php'>http://php.net/manual/en/function.asort.php</a>
* <a href='http://php.net/manual/en/function.count.php'>http://php.net/manual/en/function.count.php</a>
* <a href='http://php.net/manual/en/function.shuffle.php'>http://php.net/manual/en/function.shuffle.php</a>
* <a href='http://php.net/manual/en/function.array-rand.php'>http://php.net/manual/en/function.array-rand.php</a>

Skriv kod och testa så att det funkar som du vill.


5. Siffror, matematik, slumptal {#siffror}
--------------------------------------------------------------------


###5.1 Slumptal för att välja ord i ordlistan {#slumptal}

Om du klickar på "Starta om" så ser du att du får ett felmeddelande. Kan du lista ut varför?

Jo, du plockar ut ett värde ur arrayen utan att ange ett index. GET-parametern `word` har ju inget värde från början. Tanken är dock att ge den ett slumpmässigt värde från start. Detta kan vi göra med funktioner `rand()`.

* <a href='http://php.net/manual/en/function.rand.php'>http://php.net/manual/en/function.rand.php</a>

Vi använder den variant som tar 2 argument så att vi får ett slumptal som matchar antal ord i ordlistan. Jag väljer att använda funktion i samband med att jag tar emot GET-parametern.

```php
//$word = (empty($_GET['word']) ? "" : $_GET['word']);
$word = (empty($_GET['word']) ? rand(0, 9) : $_GET['word']);
```

Koden betyder att om GET-parametern word ej har ett värde, välj då ett slumpmässigt värde mellan 0 och 9.

Pröva nu att klicka på "Start om" ett antal gånger, byts ordet som det ska? Välj att gissa ett antal bokstäver, behålls det valda ordet som det ska?

Hoppas det funkar för dig, annars är det bara att felsöka. Så här ser det ut för mig.

* <a href='http://www.student.bth.se/~mos/oophp/mom02/hangman5/hangman.php'>http://www.student.bth.se/~mos/oophp/mom02/hangman5/hangman.php</a>

[FIGURE src=/img/oophp/kmom02/image03.png?w=w1 caption="Nu med stöd för att slumpa ut ett ord från ordlistan."]


###5.2 Tärning {#tarning}

Använd dina nyvunna kunskaper i slumptal för att göra en tärning. Skriv ett program med rand  och slå tärningen 6 gånger. Skriv ut varje slag. Beräkna dessutom medelvärdet för alla slagen.

[FIGURE src=/img/oophp/kmom02/image02.png?w=w1 caption="Tärnings-exempel med medelvärde."]


###5.3 Matematiska funktioner {#matematiska}

Det finns inbyggd stöd för matematiska funktioner. Läs med om det i refmanualen.

* <a href='http://php.net/manual/en/ref.math.php'>http://php.net/manual/en/ref.math.php</a>

Testa några av dem. Använd sökfunktionen för att hitta respektive manualsida.

1. Skriv ut värdet av talet pi.
2. Omvandla det hexadecimala talet `1A till decimalt och skriv ut det.
3. Beräkna kvadratroten ur 2, skriv ut.

Här hittar du manualsidorna om nu inte lyckades leta reda på dem.

* <a href='http://php.net/manual/en/function.pi.php'>http://php.net/manual/en/function.pi.php</a>
* <a href='http://php.net/manual/en/function.hexdec.php'>http://php.net/manual/en/function.hexdec.php</a>
* <a href='http://php.net/manual/en/function.sqrt.php'>http://php.net/manual/en/function.sqrt.php</a>


6. Att använda klasser och objekt {#klasser}
--------------------------------------------------------------------


###6.1 Att använda CHangmanSVG {#anvandsvg}

Ritandet av själva gubben finns implementerat i en klass, `CHangmanSVG`. Klassen döljer SVG-koden som ritar ut själva bilden. Klassen innehåller även metoder för att rita ut bilden, del för del. Först kullen, sedan stolpen, sedan snaran, etc.

Låt oss ta en kopia av klassen och spara i vår egen katalog. Gör så här.

1. Skapa en ny fil, `CHangmanSVG.php`.

2. Kopiera källkoden från det ursprungliga hangman-spelet och lägg i `CHangmanSVG.php`.
  * <a href='http://www.student.bth.se/~mos/hangman/PListDirectory.php?dir=&file=CHangmanSVG.php'>http://www.student.bth.se/~mos/hangman/PListDirectory.php?dir=&file=CHangmanSVG.php</a>

3. Testa så att det fungerar genom att skriva in följande kod i din hangman.php.

```php
//---------------------------------------------------------------------
//
// Create html for drawing the hanging man.
//
require_once('CHangmanSVG.php');
$hangman = new CHangmanSVG();
$svgCode = $hangman->DrawPicture();
```

Först inkluderas filen. Därefter skapas ett objekt av klassen `CHangmanSVG`. Därefter anropas metoden `DrawPicture()` och resultatet sparas i variabeln `$svgCode` (som sedan skrivs ut som en sträng).

Så här ser det ut hos mig.

[FIGURE src=/img/oophp/kmom02/image04.png?w=w1 caption="Klassen CHangmanSVG ritar ut hangman."]

Ta nu en liten stund och gå igenom filen `CHangmangSVG.php`. Där kan du se hur en klass är uppbyggd. Kan du hitta fler metoder att anropa? Hittar du metoden `DrawPartsOfPicture()` som endast ritar ut ett visst antal delar av bilden? Titta hur den metoden är implementerad.

Pröva att lägga till någon av följande rader kod. Testa en rad i taget. Vad händer? Logiskt?

```php
$svgCode .= $hangman->DrawPartsOfPicture(9);
$svgCode .= $hangman->DrawPartsOfPicture(5);
$svgCode .= $hangman->DrawPartsOfPicture(2);
```

Du borde få fram 3 nya bilder med olika delar av gubben uppritade. Tanken är att siffran skall spegla antalet misslyckade gissningar.

Här är länken till mitt lilla test.

* <a href='http://www.student.bth.se/~mos/oophp/mom02/hangman6/hangman.php'>http://www.student.bth.se/~mos/oophp/mom02/hangman6/hangman.php</a>


###6.2 Om SVG {#omsvg}

SVG står för Scalable Vector Graphics och är en W3C standard för att hantera XML-grafik på webben. Läs mer om det här.

* <a href='http://www.w3.org/Graphics/SVG'>http://www.w3.org/Graphics/SVG</a>
* <a href='http://en.wikipedia.org/wiki/SVG'>http://en.wikipedia.org/wiki/SVG</a>

Bilden till hangman ritade jag i SVG-editorn Inkscape (open source, stödjer Windows, Mac, Linux).

* <a href='http://www.inkscape.org/'>http://www.inkscape.org/</a>


7. Spellogiken {#spellogik}
--------------------------------------------------------------------

Nu närmar vi oss ett färdigt hangman-spel. Det är egentligen "bara" själva spellogiken kvar. Titta i din `hangman.php` och se vilka stycken vi ännu inte implementerat.

1. Spara antalet gissningar.

2. Visa det valda ordet med _ och bokstäver som är rätt gissade.

3. Beräkna antalet felaktiga gissningar.

4. Rita ut bilden baserat på antalet felaktiga gissningar.

5. Kontrollera om ordet är gissat och skriv ut ett meddelande.

6. Kontrollera om max antal gissningar är gjorda (9) och skriv ut ett meddelande.

I min egen implementation av Hangman så använde jag följande funktioner för att implementera ovanstående. Men det finns ju naturligtvis andra sätt att lösa det på också.
  
* <a href='http://php.net/manual/en/function.count-chars.php'>http://php.net/manual/en/function.count-chars.php</a>
* <a href='http://php.net/manual/en/function.stripos.php'>http://php.net/manual/en/function.stripos.php</a>
* <a href='http://php.net/manual/en/function.str-replace.php'>http://php.net/manual/en/function.str-replace.php</a>

Bygg nu färdigt din egen variant av Hangman-spel. Tjuvkika på min implementation om du behöver ledtrådar. Eller bygg din egen spellogik helt och hållet. Kolla gärna i refmanualen om vilka strängfunktioner som finns att tillgå.

* <a href='http://php.net/manual/en/ref.strings.php'>http://php.net/manual/en/ref.strings.php</a>

Som ett sista lilla bidrag så får du en variant av Hangman där jag sparat antalet gissningar och ritar ut bilden baserat på dem. Följande kodrader stoppade jag in på olika platser i filen. Du kan säkert se var.

```php
...
$guessed .= $char;
...
$failed = strlen($guessed);
...
$svgCode .= $hangman->DrawPartsOfPicture($failed);
```

Och så här ser det ut när jag kör det.

* <a href='http://www.student.bth.se/~mos/oophp/mom02/hangman7/hangman.php?word=9&guessed=qwe&char=r'>http://www.student.bth.se/~mos/oophp/mom02/hangman7/hangman.php?word=9&guessed=qwe&char=r</a>

[FIGURE src=/img/oophp/kmom02/image10.png?w=w1 caption="Ett steg på vägen mot ett färdigt Hangman-spel, nu med antal gissningar och utritad bild."]

Ställ frågor i kursens chat och forum om du stöter på svårigheter och problem.


8. Debug on/off {#debugonoff}
--------------------------------------------------------------------

Som en sista lilla sak innan du är klar så skall du lägga till en GET-parameter som gör att du kan stänga av och sätta på debugging-utskrifter. Det skall funka som nedanstående länkar. Den ena skriver ut debugging information och den andre gör det inte.

* <a href='http://www.student.bth.se/~mos/oophp/mom02/hangman7/hangman.php?output=0'>http://www.student.bth.se/~mos/oophp/mom02/hangman7/hangman.php?output=0</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom02/hangman7/hangman.php?output=1'>http://www.student.bth.se/~mos/oophp/mom02/hangman7/hangman.php?output=1</a>



9. Tankenöt {#tankenot}
--------------------------------------------------------------------

**VALFRI:** 

Skapa en ny metod i klassen `CHangmanSVG` som heter `DrawHuvud()`. Den skall endast rita ut huvudet. Kan du klura ut hur du gör? Berätta hur du löste det.

**VALFRI:**

Gör ett bättre och snyggare Hangman, ange vilka förbättringar du genomfört och argumentera för dem.



10. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Detta räcker för idag. Nu börjar vi komma igång med PHP.

Fixa iordning en ny redovisningssida för detta kursmoment, precis som i förra kursmomentet. Se mitt exempel från första kursmomentet. Lägg även dit en länk till ditt färdiga Hangman-spel.

* <a href='http://www.student.bth.se/~mos/me/redovisning.php'>http://www.student.bth.se/~mos/me/redovisning.php</a>

Se till att du gjort alla uppgifterna. Se också till att du verkligen tar dig tid och studerar litteraturen. Skriv nu en bra redovisningstext på din me-sida och ta en liten paus inför nästa kursmoment, det har du förtjänat.



Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.

2. Genomför momentets alla steg.

3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Besvara gärna följande:
  * Tittade du mycket på den befintliga exempel-koden eller försökte du göra en egen variant? 
  * Gjorde du tankenöten? Beskriv hur du gjorde den.

4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
