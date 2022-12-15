---
author: mos
revision:
  "2014-09-15": (G, mos) Ändrade `$res` till `$resFromSave`.
  "2014-01-07": (F, mos) Uppdaterade läsanvisningar till Duchett.
  "2013-09-18": (E, mos) Rättat 404-länk till info om unix och rättigheter på filer.
  "2012-07-02": (D, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-09-20": (C, mos) Genomgången och lade till exempel för stylning av formulär
    och tabeller.
  "2011-03-11": (B, mos) Omarbetad inför VT11, helt ny struktur och innehåll.
  "2010-09-23": (A, mos) Första versionen.
updated: "2015-08-03 12:08:33"
created: "2012-06-29 14:19:35"
...
Kmom 05: HTML-formulär och PHP
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.



HTML-formulär och PHP {#formular-php}
--------------------------------------------------------------------

*alternativt "En webbplats för annonser, med hjälp av PHP och filhantering."*

En övning i att skapa ett HTML-formulär och spara dess innehåll i filer på disk med hjälp av PHP-kod. Nu gäller det att vässa dina PHP-kunskaper.

Vi börjar med att göra ett formulär som låter dig uppdatera stylesheeten via ett formulär. Därefter gör vi en webbplats för annonser, Blokket. Vi ser hur man kan hantera de vanliga sätten att skapa, uppdatera, radera och läsa information.

Detta kursmoment är en fördjupning i formulär och ett exempel av hur informationen kan lagras i filer på disk. I nästa kursmoment gör vi samma sak, fast vi använder en databas istället.

Övningen avslutas med att vi tittar på de olika formulärelement som finns.

När du är klar har du en style-editor och en egen kopia av Blokket. Blokket kan se ut så här:

* <a href='http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=read-all'>http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=read-all</a>

[FIGURE src=/img/htmlphp/kmom05/image02.png caption="Resultatet från kursmomentet blir en annonstjänst som vi döper till Blokket."]

Det blir en hel del PHP-programmering. Lycka till och kämpa väl. Det är som vanligt tillåtet att kopiera koden som finns, men, jag vet att du kommer att försöka på egen hand, in i det längsta. Det är ju så vi lär oss. Kämpa väl.

Övningens upplägg är enligt följande:

* Läsanvisningar (1-4h)
* Övningar (5-15h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.

Glöm inte att läsa litteraturen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###HTML & CSS: The Complete Reference {#html-css}

*(fifth edition)* 

Läs följande kapitel. Fokusera på delen om "HTML5 Form Changes". Du kan hoppa över stycket "Client-Side Graphics with `<canvas>`" samt stycket "HTML5 Metadata Changes".

* Part I, Ch 2: Introducing HTML5

Du har sedan tidigare läst följande kapitel.

* Part I, Ch 1: Traditional HTML and XHTML
* Part II, Ch 4: Introduction to CSS

Använd följande kapitel som referens och uppslagsverk.

* Part I, Ch 3: HTML and XHTML Element Reference
* Part II, Ch 5: CSS Syntax and Property Reference




###Beginning HTML, XHTML, CSS and JavaScript {#beginning-web}

*(1st edition)*

Det finns inga nya läsanvisningar till detta kursmomentet.

Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Structuring Documents for the Web
* Ch 2: Links and Navigation
* Ch 3: Images, Audio and Video
* Ch 4: Tables
* Ch 5: Forms  
* Ch 7: Cascading Style Sheets
* Ch 8: More Cascading Style Sheets
* Ch 9: Page Layout
* Ch 10: Design issues



###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Läs (översiktligt) följande kapitel.

* Ch 10: Working with the File and Operating System

Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics
* Ch 4: Functions
* Ch 5: Arrays
* Ch 13: Forms
* Ch 18: Session Handlers


###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

* Källkoden till exemplen hittar du via min me-sida.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/me.php'>http://dbwebb.se/htmlphp/me/kmom05/me.php</a>

* En sida med exempel på olika HTML-element för formulär.  
  <a href='http://dbwebb.se/forms'>http://dbwebb.se/forms</a>

* Det förekommer en hel del PHP-kod, se till att bli vän med referensmanualen för PHP.  
  <a href='http://php.net/manual/en/'>http://php.net/manual/en/</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.


1. Formulär, spara på disk {#spara-disk}
--------------------------------------------------------------------

###1.1 En stylesheet editor {#stylesheet-editor}

I förra kursmomentet gjorde vi en style-väljare där vi kunde välja mellan olika stylesheets som fanns i en katalog. Det är ett praktiskt sätt att testa olika stylesheets, speciellt om man snabbt vill visa upp något för en potentiell kund.

* Style-väljaren  
  <a href='http://dbwebb.se/htmlphp/me/kmom04/style.php?p=choose-stylesheet'>http://dbwebb.se/htmlphp/me/kmom04/style.php?p=choose-stylesheet</a>

[FIGURE src=/img/htmlphp/kmom05/image06.png caption="Style-väljaren från förra kursmomentet."]

Visst vore det en god idé om man direkt via webbplatsen kunde ändra i en stylesheet? Man skulle slippa editera filer lokalt och ladda upp dem till webbplatsen. Låt oss göra en sådan "Stylesheet editor" och integrera den tillsammans med style-väljaren. 

Så här kan den se ut när den är klar:

* Stylesheet editor  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet'>http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet</a>

[FIGURE src=/img/htmlphp/kmom05/image07.png caption="En stylesheet editor där du kan editera stylesheeten via webbgränssnitt."]

Testa min editor och lek lite. Är du med på hur den fungerar?

[UPPGIFT]

Skapa en stylesheet editor. Gör på egen hand och pröva om vingarna bär, eller följ mina steg.

Så här gjorde jag.


##1.2 Skapa formulär med textarea och knappar {#form-med-textarea}

Jag börjar med att göra ett formulär och utgår från källkoden som användes i style-väljare, därefter lägger jag till en textarea och två knappar, "Spara" och "Ångra". Det blir ett bra första steg.

Alltså:

1. Skapa en ny fil, `incl/style/edit_stylesheet.php`, börja med att kopiera all kod från filen `incl/style/choose_stylesheet.php`.

2. Lägg till filen som ett nytt menyval din multisida `style.php`.

3. Redigera text och formulär så att det syns en textarea och två knappar, "Spara" och "Ångra".

[INFO]
**Info.**

Jag väljer att spara en fil för varje steg i övningen. Jag använder samma filnamn med en siffra efter. Det är för att du skall kunna se hur koden förändras steg för steg. För egen del kan du dock göra ändringarna i en och samma fil, det blir enklare för dig. 
[/INFO]

* Du kan se mitt resultat, så här långt, i följande länk.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet1'>http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet1</a>

[FIGURE src=/img/htmlphp/kmom05/image08.png caption="En kopia av style-väljaren tillsammans med en textarea och två knappar."]

Lek runt och titta i källkoden. Börja med att göra likadant med din egna sida. Ok? Då går vi vidare.


###1.3 Visa stylesheeten i textarean {#visa-style-textarea}

Nu vill vi läsa upp filens innehåll och visa den i textarean. Till det behövs en funktion som kan kontrollera att filen finns, läsa upp den från disk och returnera filens innehåll. Om filen inte finns vill vi se ett felmeddelande. 

En funktion likt följande, `getFileContents()`, kan lösa detta:

```php
function getFileContents($aFilename) {
  if(is_readable($aFilename)) {
        return file_get_contents($aFilename);
  } else {
        return "Filen finns ej.";
  }
}
```

Jag lägger in funktionen i filen `src/common.php`. 

Funktionen anropas från filen `incl/style/edit_stylesheet.php`. Filnamnet skickas med som argument till funktionen. 

Det behövs en extra säkerhetskoll på filnamnet. Följande kod löser det. Innan vi accepterar  sökvägen till filen så kontrollerar vi att den valda filen verkligen finns i arrayen som returneras från `readDirectory()`. Det löser säkerhetsproblematiken då vi definerar att endast befintliga filer i en specifik katalog kan visas. 

```php
$filename = null;
if(isset($_POST['stylesheet']) && in_array($_POST['stylesheet'], $stylesheets))
{
  $filename = $pathToStyles . $_POST['stylesheet'];
}
```

Stylesheetens innehåll hämtas sedan med följande anrop.

```php
<textarea>
<?php if($filename) echo getFileContents($filename); ?>
</textarea>
```

* Se hur steg två fungerar via följande länk.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet2'>http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet2</a>

[FIGURE src=/img/htmlphp/kmom05/image01.png caption="Stylesheetens innehåll visas i textarean."]

Bra, funkar det för dig också? Är PHP krångligt? Ta det lugnt i så fall. Det brukar falla på plats efterhand. Ta en sak i taget så löser det sig.

Då går vi vidare.


###1.4 Spara ändringarna på fil {#spara-filen}

Då ska vi spara de ändringar som görs. Detta gör vi genom att skriva ned textareans innehåll till disk, vi skriver över den befintliga filen. För att lyckas med detta måste filen vara skrivbar (`chmod 666`).

Jag lägger till en ny stylesheet, `style/stylesheet_editable.css`, och sätter rättigheterna till 666.

Jag väljer att göra ett "self-submitting" formulär, ett formulär som submittar (postar) resultatet till sig själv. Jag lägger till ett kodstycke som hanterar om användaren trycker på "Spara"-knappen.

`incl/style/edit_stylesheet3.php`:

```php
if(isset($_POST['doSave'])) {
  $resFromSave = putFileContents($filename, strip_tags($_POST['styleContent']));
}
```

Denna kod kontrollerar om submit-knappen med namnet "doSave" är tryckt (har ett värde), isåfall sparas filen med hjälp av funktionen `putFileContents()`. Funktionen tar filnamnet och innehållet i textarean som argument. Dessutom använder vi `strip_tags()` för att ta bort alla HTML-element och undviker därmed att någon lägger in JavaScript i vår stylesheet. Allt för säkerheten.

Funktionen `putFileContents()` lägger jag i filen `src/common.php`. Funktionen kontrollerar att filen är skrivbar och skriver sedan över den gamla filen med det nya innehållet. Funktionen ser ut så här:

`src/common.php`:

```php
function putFileContents($aFilename, $aContent) {
  if(is_writable($aFilename)) {
        file_put_contents($aFilename, $aContent);
        return "Filen sparades.";
  } else {
        return "Filen är inte skrivbar och kunde inte sparas.";
  }
}
```

Funktionen returnerar en sträng som säger om det gick bra att spara, detta meddelande skriver jag ut för att ge användaren feedback.

`incl/style/edit_stylesheet3.php`:

```php
<?php if(isset($resFromSave)): ?>
<p><output class="success"><?php echo $resFromSave ?></output></p>
<?php endif; ?>
```

* Så här ser det ut för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet3'>http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet3</a>

[FIGURE src=/img/htmlphp/kmom05/image00.png caption="Gjorda ändringar sparas nu i stylesheeten."]

Glöm inte att filen måste vara skrivbar för alla (`chmod 666`) för att dina ändringar skall sparas.

* Forumet har ett inlägg om filrättigheter på studentservern:  
  <a href='http://dbwebb.se/f/319'>http://dbwebb.se/f/319</a>


###1.5 Felkontroller {#felkontroller}

Det vore fint om vi skrev ut om filen var skrivbar, då skulle användaren slippa fundera över varför ändringarna inte sparas. Det kan spara en hel del frågor från slutanvändaren.

Jag lägger till en kontroll om filen är skrivbar eller ej. Jag skriver ut ett meddelande om filen inte är skrivbar, samtidigt avvaktiverar (disable) jag knappen "Spara". Ändringarna görs i filen `incl/style/edit_stylesheet4.php`. 

Försök att leta reda på vilka ändringar jag gjort (extra uppgift / valbar). En ledtråd är att söka i filen efter variabeln `$isWritable`, där hittar du samtliga ändringar som gjordes.

* Här kan du testa min slutliga variant.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet4'>http://dbwebb.se/htmlphp/me/kmom05/style.php?p=edit-stylesheet4</a>

[FIGURE src=/img/htmlphp/kmom05/image03.png caption="Den slutliga varianten för att editera stylesheeten via ett webbinterface, nu med felhantering."]

Gör denna sista del med felkontrollerna som ett litet test på om du klarar av att orientera dig i PHP-koden. Lyckades du? Om du inte klarade det så kan du komma tillbaka hit lite senare, och försöka igen.


###1.6 Sammanfattningsvis {#sammanfattning-1}

Det var ett formulär för att spara fil på disk, det kan vara rätt behändigt ibland. Med samma teknik går det att spara innehåll i en sida, HTML-kod, och visa upp det. Bygger vi vidare på en sådan lösning får vi en variant av ett Content Management System (CMS), ett enkelt sätt att jobba med innehåll på webben.

Visst vore det mer lämpligt att spara informationen i en databas, men det kikar vi på i nästkommande kursmoment. Vi håller oss till disk denna gången.

Då går vi vidare till nästa del.


2. Formulär för att skapa, läsa, uppdatera och radera {#formular-skapa-lasa-uppdatera}
------------------------------------------------------------------------------

###2.1 CRUD och webbplats för annonser {#crud-for-annonser}

CRUD är en förkortning för de 4 grundläggande operationerna av persistent lagring, Create (skapa), Read (läsa), Update (uppdatera), Delete (radera). Ofta används denna term i samband med en databas. 

* Läs kort om CRUD på Wikipedia.  
  <a href='http://en.wikipedia.org/wiki/Create,_read,_update_and_delete'>http://en.wikipedia.org/wiki/Create,_read,_update_and_delete</a>
  
Vi skall göra ett exempel på formulär som lagrar information på disk med CRUD-operationerna. Ett exempel på detta vore en webbplats för annonser. En sådan webbplats behöver funktioner för att skapa annons (Create), läsa annons (Read), uppdatera annonsen (Update) samt för att radera annonsen (Delete).

Låt oss göra detta. Ett exempel där man kan skapa nya objekt, läsa dem, uppdatera dem och radera dem.  Vi tar annonser som exempel och vi bygger vidare på den koden vi gjort i samband med stylesheet-editorn. 

I exemplet med stylesheet-editorn så finns stöd för R och U, nu utökar vi exemplet med C och D, fast som en liten annons-applikation.

Så här kan resultatet se ut när det är klart. Testa och lek för att förstå vad du skall göra.

* Resultatet kan bli så här:  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=read-all'>http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=read-all</a>

[FIGURE src=/img/htmlphp/kmom05/image02.png caption="Blokket, en annonsplats och en övning i CRUD. "]

Ok, då kör vi.

[UPPGIFT]

Skapa Blokket med stöd för att skapa ny annonser, editera befintliga, läsa en eller alla annonser samt radera annonser. 

Gör på egen hand och pröva om vingarna bär, eller följ mig och se hur jag gör, steg för steg.

Så här gjorde jag.


###2.2 Blokket, initiera {#blokket-init}

Jag använder samma princip som för stylesheeten. En katalog med filer, varje fil är en annons. Jag behöver göra katalogen skrivbar, detta för att det skall gå att skapa nya filer och ta bort filer.

Jag börjar med att skapa en ny multisida, `blokket.php`, precis på samma sätt som tidigare. Jag väljer att skapa en egen katalog där alla annonser skall finnas, jag lägger katalogen i `incl/blokket/data`. Jag stoppar dit ett par filer, testannonser, för att komma igång. Jag gör en första testsida som kontrollerar att katalogen är skrivbar samt visar namnen på de filer som finns i katalogen.

* Så här blev det.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=init'>http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=init</a>

[FIGURE src=/img/htmlphp/kmom05/image04.png caption="En testsida för blokket som visar om katalogen är skrivbar och visar de filer som finns i katalogen."]

Inget konstigt så långt va? Katalogen skall ha rättigheter 777 och filerna som ligger i katalogen skall ha rättigheter 666.

* Vill du ha bakgrundsinformation om filrättigheter i Unix så kan du läsa här:  
  <a href='http://db-o-webb.blogspot.se/2011/02/unix-rattigheter-pa-kataloger-och-filer.html'>http://db-o-webb.blogspot.se/2011/02/unix-rattigheter-pa-kataloger-och-filer.html</a>

Då tar vi nästa steg.


###2.3 Blokket, uppdatera och spara annonser {#blokket-spara}

Att uppdatera innehållet i en fil gjorde vi i stylesheet-exemplet. Jag väljer att kopiera hela den filen och utgår från den. Jag ändrar lite variabelnamn för att det skall passa bättre i detta exempel. Men, jag behöver inte ändra mycket för att det skall fungera.

* Så här blev det. Väldigt likt stylesheet-editorn, som du kan se.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=update'>http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=update</a>

[FIGURE src=/img/htmlphp/kmom05/image09.png caption="Nu går det uppdatera annonstexten för varje annons."]

Som du kan se så tillåter jag vissa HTML-element i annonstexten. Detta sker genom att ge funktionen strip_tags() ett argument med de element som är tillåtna. I exemplet hanteras detta i samband med att filen sparas till disk. 

Se följande kod.

```php
if(isset($_POST['doSave'])) {
  $res = putFileContents($filename, strip_tags($_POST['content'], "<b><i><p><img>"));
}
```

För min del så har jag valt att tillåta HTML-elementen `<p><b><i><img>`. Du kan se exempel på användningen av HTML-elementen i mina annonser.

Ok, det var också en lagom utmaning, eftersom det fungerade i stylesheet-exemplet så blev det inte så svårt att överföra hit. Hoppas att det stämmer för dig också.


###2.4 Blokket, lägga till annons {#blokket-laggtill}

Vi jobbar med filer så operationen att lägga till en ny annons innebär att skapa en ny tom fil. Jag gör så att användaren kan välja namn på filen. Det blir lite felhantering om filnamnet är tomt eller om man anger ett filnamn som redan finns. Sen är det som vanligt en säkerhetsaspekt på detta.

Själva PHP-koden för att skapa filen följer. 


```php
if(isset($_POST['doCreate'])) {
  $filename = $path . basename(trim(strip_tags($_POST['filename'])));
  if(empty($_POST['filename']))
  {
        $res = "Filen skapades ej, filnamnet kan ej vara tomt. Välj ett annat filnamn.";
  }
  else if(is_file($filename)) 
  {
        $res = "Filen skapades ej, den finns redan. Välj ett annat filnamn.";
  }
  else 
 {
        file_put_contents($filename, null);
        $res = "Filen skapades.";
        $files = readDirectory($path);
  }
}
```

* Så här blev det för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=create'>http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=create</a>

[FIGURE src=/img/htmlphp/kmom05/image10.png caption="Sida för att skapa ny annons."]

Det är inte mycket kod som behövs, men det är lite trixigt att hantera felfallen. Jag använder funktionen `basename()` för att undvika att användaren försöker skapa en fil som heter `../../moped`. Funktionen tar en sträng och returnerar endast filnamnsdelen, i detta fallet moped. 

Jag använder funktionen `trim()` för att ta bort eventuella mellanslag och jag använder `strip_tags()` för att undvika att filen döps med JavaScript-taggar.

Det är enkla sätt att undvika uppenbara säkerhetshål. Det är alltid viktigt att hantera inkommande variabler. I princip skall man se till att varje inkommande argument endast innehåller det som förväntas.


###2.5 Blokket, ta bort annons {#blokket-tabort}

Funktionen för att ta bort en fil från disk heter `unlink()`. Använd den för att införa funktionen att ta bort en annons. PHP-koden för att utföra detta följer.

```php
if(isset($_POST['doDelete'])) {
  if(isset($_POST['file']) && in_array($_POST['file'], $files))
  {
        $filename = $path . $_POST['file'];
        unlink($filename);
        $files = readDirectory($path);
        $res = "Filen raderades.";
  }
  else
  {
        $res = "Filen finns ej och kunde inte raderas.";
  }
}
```

* Så här blev det när jag integrerade koden i Blokket.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=delete'>http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=delete</a>

[FIGURE src=/img/htmlphp/kmom05/image11.png caption="Funktionen för att radera en annons fungerer nu i blokket."]

Innan jag raderar filen så väljer jag att titta om den finns på disk. Detta görs genom att se filnamnet finns i arrayen. Då kan jag vara säker på att det är en annons och ingen annan fil. Det är lite trixigt det här med att kontrollera inkommande data. Men det är nödvändigt.


###2.6 Blokket, visa annons {#blokket-visa}

Att visa innehållet i en annons är i princip samma sak som vi gjorde i update-fallet. Istället för att visa annonstexten i en textarea så visar vi den i en div. Jag löser fallet för att "Visa annons" genom att ta en kopia av update-koden och göra ett par mindre ändringar.

* Så här blev det för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=read'>http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=read</a>

[FIGURE src=/img/htmlphp/kmom05/image12.png caption="Visa innehållet i en annons."]

Ok, bra, det var inte så svårt va? Hoppas det.

Då tar vi sista delen också.


###2.7 Blokket, visa alla annonser {#blokket-visa-alla}

Sådärja, då finns allt på plats. Vi lägger till ett skript som visar samtliga annonser i form av en tabell (`<table>`). En `foreach`-loop hjälper oss med detta. Koden för detta blir rätt liten, som omväxling.

* Så här ser det ut när det fungerar:  
  <a href='http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=read-all'>http://dbwebb.se/htmlphp/me/kmom05/blokket.php?p=read-all</a>

[FIGURE src=/img/htmlphp/kmom05/image02.png caption="Nu visas samtliga annonser i form av en tabell."]

Nu börjar det likna något. Jag lade till en stylesheet för att styla tabellen, du hittar den i style/table.css. Den importeras i min vanliga stylesheet. På samma sätt som jag gjort med stylesheeten för formulären.

[INFO]
**Tips.**

Stylesheeten för formulär och för tabell kommer ursprungligen från ett ramverk för CSS som kallas Blueprint. 

* Du kan läsa mer om Blueprint på deras webbplats.  
  <a href='http://blueprintcss.org/'>http://blueprintcss.org/</a>
  
* Ett alternativ till Blueprint är ramverket 960gs.  
  <a href='http://960.gs/'>http://960.gs/</a>

För en professionell webbutvecklare är det bra att bekanta sig med denna typen av ramverk. Vi kommer inte prata så mycket mer om detta i denna kursen. Det får bli en annan kurs. Men, lär dig gärna på egen hand och fråga i forumet om du undrar något. 
[/INFO]

Du kan testa och leka runt med tabeller i Style!, här finns två exempel på tabeller och stylning av dem.

* <a href='http://dbwebb.se/style/?id=209'>http://dbwebb.se/style/?id=209</a>
* <a href='http://dbwebb.se/style/?id=210'>http://dbwebb.se/style/?id=210</a>


###2.8 Sammanfattningsvis {#sammanfattning-2}

Sådärja, då har vi har skapat en liten Blokket annonsplats och samtidigt lärt oss hantera CRUD-operationerna. Bra gjort.

Avslutningsvis så tar vi och kikar lite på de olika elementen som finns att tillgå i ett HTML-formulär.


3. Översikt av formulär element {#formular-element}
----------------------------------------------------------------------------

Följande stycke ger en översikt av olika element i formulär. Det hanterar element från HTML4 och HTML5. Dessutom ges exempel på hur väl de olika webbläsarna stödjer formulär element i HTML5.

Det finns inga uppgifter kopplade till denna del.

###3.1 Specifikationer och exempel {#specifikation-exempel}

Formulär och de vanliga elementen är en del av standarden för HTML4. Du kan läsa om elementen i specen. Öppna nedanstående länk och skrolla snabbt igenom dokumentet för att få en känsla för vilken information som finns i det.

* HTML4 standard, Forms  
  <a href='http://www.w3.org/TR/html401/interact/forms.html'>http://www.w3.org/TR/html401/interact/forms.html</a>
HTML5 introducerar en hel del nya element. Det står att läsa om dem i refmanualen men informationen är svårtillgänglig för nybörjaren. 

* HTML5 standard, Forms  
  <a href='http://www.w3.org/TR/html5/forms.html'>http://www.w3.org/TR/html5/forms.html</a>

W3Schools har enklare exempel som är mer anpassade till en nybörjare.

* <a href='http://w3schools.com/html/html5_form_input_types.asp'>http://w3schools.com/html/html5_form_input_types.asp</a>


###3.2 Formulär i HTML4 och HTML5 {#formular-html}

Exempel på de vanligaste formulär-elementen kan du se på följande sida.

* <a href='http://dbwebb.se/forms/?#html4'>http://dbwebb.se/forms/?#html4</a>

[FIGURE src=/img/htmlphp/kmom05/image14.png caption="En översikt av de vanligaste elementen i formulär."]

Bilden visar de element som finns i HTML4. Skrolla längre ned i dokumentet, eller använd länken nedan, så kommer du till de element som är nya för HTML5.

* <a href='http://dbwebb.se/forms/?#html5'>http://dbwebb.se/forms/?#html5</a>

[FIGURE src=/img/htmlphp/kmom05/image15.png caption="En översikt av några av de nya elementen i HTML5 forms, så som de ser ut i Firefox 3.6."]

De flesta webbläsare har ännu inte stöd för alla HTML5-elementen. Som du ser i bilden ovan så har Firefox 3.6 knappt något synligt stöd alls. Men det går snabbt framåt och fler och fler webbläsare stödjer de nya elementen. Man får helt klart vara försiktig med de nyaste elementen. 

Wikipedia har en sida som beskriver vilket stöd de olika webbläsarna har för HTML5. Ta en kort titt på sidan.

* Hur väl stödjer webbläsarna HTML5  
  <a href='http://en.wikipedia.org/wiki/Comparison_of_layout_engines_%28HTML5%29'>http://en.wikipedia.org/wiki/Comparison_of_layout_engines_%28HTML5%29</a>

Det finns ett antal sidor som försöker visa hur det kommer att se ut när HTML5-elementen är klara. De har ofta en kombination av HTML5 och CSS3 för att uppnå lite mer effektfulla formulär. Vill du ha inspiration kan du googla enligt nedan.

* Ge mig inspiration till HTML5 och formulär  
  <a href='https://www.google.se/search?q=html5+form+inspiration'>https://www.google.se/search?q=html5+form+inspiration</a>

Det finns flera försök att kombinera JavaScript och CSS för att skapa HTML5-liknande form-element. Det är inget vi använder i kursen men studera snabbt/översiktligt nedanstående artikel för att få en känsla av hur det kan se ut.

* "Creating Cross Browser HTML5 Forms Now, Using modernizr, webforms2 and html5Widgets"  
  <a href='http://www.useragentman.com/blog/2010/07/27/cross-browser-html5-forms-using-modernizr-webforms2-and-html5widgets/'>http://www.useragentman.com/blog/2010/07/27/cross-browser-html5-forms-using-modernizr-webforms2-and-html5widgets/</a> 


###3.3 Ett test av browserstödet för HTML5 form element {#form-browsersstod}

Vill man se hur de nya elementen kommer att se ut så får man testa dem i olika webbläsare. Enklast är att installera de vanligaste läsarna på sin egen maskin och därefter testa med exempel-sidan (forms!) i respektive läsare.

* Exempelsidan för formulär.  
  <a href='http://dbwebb.se/forms/'>http://dbwebb.se/forms/</a>

De vanligaste webbläsarna är Firefox, Chrome, Safari, Opera och Internet Explorer. När du utvecklar webbplatser så är det en god idé att ha samtliga webbläsare installerade.

Det är inget som krävs i denna kursen men beroende på din ambitionsnivå så kan det vara bra att ha de vanligaste läsarna installerade.

Jag testar de vanligaste läsarna och de som visar sig ha bäst stöd för de nya elementen är Opera och webkit-baserade webbläsare (Safari, Google Chrome, Chromium).

Opera har både en färgväljare och en datum-väljare när jag testade, testa själv senaste versionen för att se vad som hänt sedan mitt test.

[FIGURE src=/img/htmlphp/kmom05/image16.png caption="Form-testsidan i Opera."]

Google Chrome (webkit-baserad) saknar färgväljaren och datumväljaren men har ändå en viss hantering av datum.

[FIGURE src=/img/htmlphp/kmom05/image13.png caption="Form-testsidan i Google Chrome."]

Det kommer att hända en hel del inom detta område inom de närmaste åren, varje ny release av webbläsarna innehåller uppdateringar. Men nya element kommer det att bli ännu roligare att skapa formulär i HTML. 


###3.4 Stylning av formulär {#style-forumular}

Style! innehåller ett par exempel på hur du kan styla formulär. Studera dem på följande länkar.

* Style formulär med CSS:  
  <a href='http://dbwebb.se/style/?id=12'>http://dbwebb.se/style/?id=12</a>  
  <a href='http://dbwebb.se/style/?id=81'>http://dbwebb.se/style/?id=81</a>
  
Det är samma HTML-kod i båda exemplen, endast stylesheeten skiljer dem åt. Testa gärna och lek med egen stylning.

Du kan även se ett exempel på stylning av formulär med hjälp av Blueprints CSS-ramverk. 

* Stylea formulär med BlueprintCSS:  
  <a href='http://dbwebb.se/style/?id=207'>http://dbwebb.se/style/?id=207</a>

Det är samma stylesheet som jag använt i Blokket-exemplet.

Om du vill testa att styla form elementen så kan du utgå från följande exempelsida i Style!, den innehåller de flesta HTML elementen som finns i specen för HTML4.01.

* Exempelsida med HTML form elements:  
  <a href='http://dbwebb.se/style/?id=208'>http://dbwebb.se/style/?id=208</a>
  

4. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Se till att din style-editor och Blokket fungerar. Ladda upp dem på driftsservern.

Testa gärna lite olika formulärelement. I nästa kursmoment fortsätter vi med formulär och använder databasen SQLite för att lagra informationen på disk.


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.
2. Genomför momentets alla steg.
3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Hur känns det med PHP-programmeringen, har du kommit in i det? Är det svårt? Vilka är dina tips till en ovan PHP-programmerare? Har du nytta av guiden php20?
4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.
5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
