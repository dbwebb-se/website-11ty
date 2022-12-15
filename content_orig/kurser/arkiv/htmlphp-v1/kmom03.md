---
author: mos
revision:
  "2014-01-30": (H, mos) Raderade gamla Duchett.
  "2014-01-07": (G, mos) Uppdaterade läsanvisningar till Duchett.
  "2013-01-30": (F, mos) Länkade till forumet om getCurrentUrl().
  "2012-07-02": (E, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-09-07": (D, mos) Genomgång inför ht11. Smärre justeringar, lade till guiden
    php20.
  "2011-02-08": (C, mos) Ändrade stycket om session destroy pga av felmeddelanden
    med "output started".
  "2011-02-04": (B, mos) Total genomarbetning, bytte fokus från projektstart till
    ren övning i PHP.
  "2010-09-10": (A, mos) Första versionen.
updated: "2015-08-03 12:07:37"
created: "2012-06-29 14:18:43"
...
Kmom 03: Dynamisk webbplats med PHP
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




Dynamisk webbplats med PHP {#dynamisk-webbplats}
--------------------------------------------------------------------

*alternativt "En multi-sida med PHP för inloggning på webbplatsen"*

I kursmomentet gås igenom de inbyggda arrayerna i PHP. Vi tittar på `$_GET`, `$_POST`, `$_SERVER` och `$_SESSION` samt hur de kan användas. Med hjälp av dessa arrayer, och lite mer PHP-kunskaper, gör vi ett flertal små testprogram för att klura ut hur saker och ting fungerar.

Till slut knyter vi ihop det genom att bygga funktionalitet för login/logout och integrera detta i me-sidan. Resultatet blir me-sida version 3.0.

* Me-sida version 3.0:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/test.php'>http://dbwebb.se/htmlphp/me/kmom03/test.php</a>

[FIGURE src=/img/htmlphp/kmom03/image06.png caption="Mikaels me-sida version 3.0."]

Så här kan resultatet från detta kursmoment se ut.

[INFO]
**Tips.**

Är du total nybörjare på PHP och programmering?

Då kan det vara bra att ta det lugnt i detta kursmoment. Ett par av uppgifterna innefattar ändringar i flera filer, med en mix av HTML, CSS och PHP. Det kan bli klurigt att felsöka om något går fel.

En del av uppgifterna är markerade som valbara / optionell / utmanande. Detta innebär att du kan hoppa över dem.

Ibland behöver saker ta lite tid innan det faller på plats. Detta kan vara ett sådant tillfälle.

Använd detta tips som en livlina när det känns mörkt. Förhoppningsvis behöver du inte använda det. Men det kan vara bra att ha, utifall att...
[/INFO]

Övningens upplägg är enligt följande:

* Läsanvisningar (1-8h)
* Övningar (10-19h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.

Glöm inte att läsa litteraturen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###HTML & CSS: The Complete Reference {#html-css}

*(fifth edition)* 

Bläddra igenom följande kapitel. De är utmärkta som uppslagsverk för HTML-element och CSS-konstruktioner. Lär dig hitta informationen i dem.

* Part I, Ch 3: HTML and XHTML Element Reference
* Part II, Ch 5: CSS Syntax and Property Reference

Du har sedan tidigare läst följande kapitel. Bläddra igenom dem igen. Repetera.

* Part I, Ch 1: Traditional HTML and XHTML
* Part II, Ch 4: Introduction to CSS




###Beginning HTML, XHTML, CSS and JavaScript {#beginning-web}

*(1st edition)*

Bläddra igenom (läs översiktligt) följande kapitel.

* Ch 5: Forms  


Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Structuring Documents for the Web
* Ch 2: Links and Navigation
* Ch 3: Images, Audio and Video
* Ch 4: Tables
* Ch 7: Cascading Style Sheets




###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Bläddra igenom (läs översiktligt) följande kapitel.

* Ch 4: Functions
* Ch 13: Working with HTML Forms
* Ch 18: Session Handlers

Du har sedan tidigare (översiktligt) läst följande kapitel.

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics


###Nätet {#natet}

Följande används i olika omfattning under kursmomentet, använd dem som referens.

Lär dig att hitta i referensmanualen för PHP. Den är oumbärlig.

* Innehållsförteckning (vad finns att läsa om?)  
  <a href='http://php.net/manual/en/index.php'>http://php.net/manual/en/index.php</a>
* Language reference (grunderna i språket)  
  <a href='http://php.net/manual/en/langref.php'>http://php.net/manual/en/langref.php</a>
* Function reference (vilka inbyggda funktioner finns?)  
  <a href='http://php.net/manual/en/funcref.php'>http://php.net/manual/en/funcref.php</a>

I kursmomentet används PHP's sessioner. Du kan läsa om sessionshantering i referensmanualen.

* <a href='http://php.net/manual/en/book.session.php'>http://php.net/manual/en/book.session.php</a>

Glöm inte länkarna som finns i footern på me-sidan.

* <a href='http://dbwebb.se/htmlphp/me/kmom03/me.php'>http://dbwebb.se/htmlphp/me/kmom03/me.php</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.


0. Gå igenom guiden php20 {#php20}
--------------------------------------------------------------------

Detta kursmoment handlar en hel del om PHP. För att få en flygande start så skall du nu gå igenom **del 1 av guiden php20**. Det är ren guide som går igenom grunderna i PHP.

Se till att du själv gör exemplen som visas i guiden. På det sättet lär du dig mer.

Börja nu med guiden, innan du fortsätter och genomför själva kursmomentet.

* Guiden php20 (endast del 1, de 10 första stegen)  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/guide.php'>http://dbwebb.se/htmlphp/me/kmom03/guide.php</a>?

Klar? Bra då är du redo att ta dig an kursmomentet.


1. En multi-sida med PHP {#multisida}
--------------------------------------------------------------------

###1.1 Ett exempel på en multi-sida {#exempel-multisida}

En multi-sida är en PHP-sida som kan visa olika HTML-resultat, beroende på vilka argument som skickas till sidan via dess länk (urlen). Multi-sida är en benämning som jag valt för denna kursen. Om ni fortsätter att gå fler av kurserna så kommer samma typ av lösning att kallas för "frontcontroller".

I förra kursmomentet såg vi ett exempel på en multi-sida. Det är guiden som är byggd på det sättet. Testa följande länkar och fundera på hur det fungerar.

* Framsidan  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/guide.php'>http://dbwebb.se/htmlphp/me/kmom03/guide.php</a>
* Guiden html20  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/guide.php?id=html20'>http://dbwebb.se/htmlphp/me/kmom03/guide.php?id=html20</a>
* Guiden css20  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/guide.php?id=css20'>http://dbwebb.se/htmlphp/me/kmom03/guide.php?id=css20</a>

Filnamnet är samma men resultatet är tre helt olika sidor. Det som skiljer är det som jag kallar argument, `id=html20` och `id=css20`.

Utan att tjuvkika på sidans källkod kan vi dra slutsatsen att filen, `guide.php`, innehåller en `if`-sats (eller liknande) som kollar på argumentet `id` och därefter bestämmer vilken sida som skall visas.

Nåja, det kan väl inte skada med en liten tjuvtitt på källkoden för `guide.php`. Långt ned i filen finns en `if`-sats, kan det vara den som kontrollerar flödet? Kolla snabbt in koden, vi kommer att komma tillbaka till den senare.

* Källkoden för `guide.php`:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=&file=guide.php'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=&file=guide.php</a>
  
Detta är en typ av lösningar som är mycket vanliga i webbapplikationer, vare sig man använder PHP eller alternativa lösningar.

Låt oss skapa grunden för en sådan här multi-sida och integrera den i me-sidan. Men för att göra det så behöver vi gå igenom ett par saker först. Vi börjar med att titta på argument via urlen och PHP-arrayen `$_GET`.


2. PHP och `$_GET` {#php-get}
-----------------------------------------------------------------

Variablen `$_GET` innehåller de argument som skickas efter `?`-tecknet i urlen (länken). Via variabeln går det att komma åt dessa argument.


###2.1 Skicka argument till en sida via urlen {#argument-sida}

Låt oss först titta på argumenten. Ett argument kan ha ett värde. Följande är exempel på argument som kan skickas via urlen.

* `id=html20`
* `p=kmom03-get`  
* `debug`

I exemplet ovan har `id` och `p` ett värde, `debug` saknar värde.

Argumenten går att kombinera i urlen på följande sätt.

* ?id=html20
* ?id=html20&debug
* ?id=html20&debug&p=kmom03-get

Alla argument kommer efter `?`-tecknet och de separeras med en `&`-tecken. Om argumenten har ett värde så används `=`-tecknet för att tilldela värdet. Argumentdelen brukar kallas för "querystring".

* Läs mer om urlens struktur (vid intresse).  
  <a href='http://en.wikipedia.org/wiki/Uniform_Resource_Locator'>http://en.wikipedia.org/wiki/Uniform_Resource_Locator</a>
  
Det fanns ett exempel i förra kursmomentet, där vi ändrade style på me-sidan. Jag vidareutvecklade det så att det gick att skicka argument till sidan och på så sätt bestämma vilken style som visas. Jag har gjort en testsida där du kan testa de olika länkarna som ändrar me-sidans utseende.

* Testsida med argument via länk för att ändra intern style:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom02-pagestyle'>http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom02-pagestyle</a>

[FIGURE src=/img/htmlphp/kmom03/image07.png caption="Testsida som använder argument för att visa olika style på me-sidan."]

Studera "querystringen" och se hur den är uppbyggd för de olika exemplen. Studera även källkoden till `me3.php` och se hur `if`-satserna testar innehållet i `$_GET`.

```php
if(isset($_GET['border-radius'])) {
```

* Källkod till `me3.php`.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=&file=me3.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=&file=me3.php#file</a>
  
  
###2.2 Använd argumenten via `$_GET` {#argument-via-get}

[UPPGIFT]

Låt oss testa att använda informationen i variabeln `$_GET`. Gör på följande sätt.

1. Skapa en ny sida, `kmom03_get.php`.
2. Lägg in följande kod.

```html
<h1>Visa innehållet i <code>$_GET</code></h1>
<p>Du anropade sidan med följande querystring:
<code><?php echo $_SERVER['QUERY_STRING']; ?></code></p>
<p><code>$_GET</code> innehåller följande:</p>
<pre><?php print_r($_GET); ?></pre>
```

3\. Testa sidan genom att anropa den på följande vis:

* kmom03_get.php?id=html20
* kmom03_get.php?id=html20&debug
* kmom03_get.php?id=html20&debug&p=kmom03-get

Så här blev det för mig.

* Resultatet:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/kmom03_get.php?id=html20&debug&p=kmom03-get'>http://dbwebb.se/htmlphp/me/kmom03/kmom03_get.php?id=html20&debug&p=kmom03-get</a>

[FIGURE src=/img/htmlphp/kmom03/image08.png caption="Anropa sidan och skriv ut argumenten med hjälp av `$_GET`."]

Om du vill kan du studera sidans källkod, du hittar den via menyvalet "Källkod", leta efter filens namn, `kmom03_get.php`.


###2.3 Validera testsidan {#validera-testsida}

Min testsida validerade inte. Du kan se resultatet av valideringen på nedanstående länk.

* <a href='http://validator.w3.org/unicorn/check?ucn_uri=dbwebb.se%2Fhtmlphp%2Fme%2Fkmom03%2Fkmom03_get.php%3Fid%3Dhtml20%26debug%26p%3Dkmom03-get&ucn_task=conformance'>http://validator.w3.org/unicorn/check?ucn_uri=dbwebb.se%2Fhtmlphp%2Fme%2Fkmom03%2Fkmom03_get.php%3Fid%3Dhtml20%26debug%26p%3Dkmom03-get&ucn_task=conformance</a>#

Det beror på dessa `&`-tecken som hamnar i HTML-koden. Ett sätt att lösa detta är att använda en PHP-funktion som kodar om alla specialtecken till htmlentiteter. Ett `&`-tecken kodas då om till `&amp;` och det gillas av valideringen. Funktionen heter `htmlentities()`. Funktionen kan användas på följande sätt.

```php
<?php echo htmlentities($_SERVER['QUERY_STRING']); ?>
```

Min `kmom03_get2.php` är uppdaterad och validerar. Testa att validera den i Unicorn.

* <a href='http://dbwebb.se/htmlphp/me/kmom03/kmom03_get2.php?id=html20&debug&p=kmom03-get'>http://dbwebb.se/htmlphp/me/kmom03/kmom03_get2.php?id=html20&debug&p=kmom03-get</a>

* Läs om funktionen `htmlentities()` i refmanualen  
  <a href='http://php.net/manual/en/function.htmlentities.php'>http://php.net/manual/en/function.htmlentities.php</a>

[UPPGIFT]

Uppdatera din `kmom03_get.php` och se till att den validerar.


###2.4 Formulär med get-metoden {#forms-med-get}

[UPPGIFT]

Variabeln `$_GET` används ibland tillsammans med HTML-formulär. Låt oss göra ett testfall där vi använder ett formulär och skriver ut dess innehåll. Gör på följande sätt.

1. Skapa en ny sida, `kmom03_getform.php` genom att kopiera din `kmom03_get.php`.

2. Lägg in följande kod som ger ett formulär. Fortsätt att använda den kod som skriver ut innehållet i `$_GET`.

```html
<h1>Formulär och get-metoden</h1>
 <form method="get" action="?">
  <fieldset>
   <legend>Exempel på formulär med get-metoden</legend>
   <p>
    <label for="input1">Användarkonto:</label><br>
    <input id="input1" class="text" type="text" name="account">
   </p>
   <p>
    <label for="input2">Lösenord:</label><br>
    <input id="input2" class="text" type="password" name="password">
   </p>
   <p>
    <input type="submit" name="doLogin" value="Login">
  </p>
 </fieldset>
</form>
```

3\. Testa sidan.

* Så här blev det för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/kmom03_getform.php'>http://dbwebb.se/htmlphp/me/kmom03/kmom03_getform.php</a>

[FIGURE src=/img/htmlphp/kmom03/image09.png caption="Ett formulär som använder sig av get-metoden."]

Som du kan se så skickas formulärets data via urlen och kan därefter hanteras av `$_GET`. Senare i kursen kommer vi att prata mer om formulär och hur man kan processa formulärets data.

Jag använder en speciell stylesheet för att styla formuläret. Du hittar den i `style/forms.css`, den är inkluderad i min vanliga stylesheet, `style/stylesheet.css`, med hjälp av `@import`.

[INFO]
**Notering.**

Den stylesheet jag använder för att styla formulär är tagen från CSS-ramverket Blueprint. Det finns flera CSS-ramverk som innehåller färdiga konstruktioner som kan underlätta hantering av stylesheets och layout. Flera av dessa ramverk hanterar även ett koncept som heter grid layout.

* Tjuvkika på Blueprints hemsida (vid intresse):  
  <a href='http://blueprintcss.org/'>http://blueprintcss.org/</a>
* Ett annat välkänt CSS-ramverk är 960gs (kika om intresse):  
  <a href='http://960.gs/'>http://960.gs/</a>

Detta är inget vi fokuserar på eller kommer använda i denna kursen (mer är stylesheeten för formulär, `style/forms.css`).
[/INFO]

[UPPGIFT]

Kopiera min stylesheet för formuläret, `style/forms.css`, och använd den. Vill du styla formuläret på egen hand så går det naturligtvis bra.

Ledtrådar till lösningen hittar du i följande filer.  

* <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=style&file=forms.css#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=style&file=forms.css#file</a>
* <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=style&file=stylesheet.css#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=style&file=stylesheet.css#file</a>


3. PHP och $_POST {#php-post}
------------------------------------------------------------------------

Som vi såg i föregående exempel så skickades formulärets innehåll via querystringen. Ett alternativt sätt är att använda formulärets post-metod. Då skickas innehållet som en del i HTTP-headern (protokollet som går mellan webbläsare och webbserver) och blir då inte synligt på samma sätt. I PHP kan vi hämta ut formulärets innehåll via variabeln `$_POST`.


###3.1 Formulär med post-metoden och `$_POST` {#forms-post}

 Låt oss göra ett exempel på ett formulär med post-metoden som visar innehållet i `$_POST`.
 
[UPPGIFT]

Gör på följande sätt.

1. Skapa en ny sida, `kmom03_postform.php` genom att kopiera din `kmom03_getform.php`.

2. Ändra den rad i koden som anger formulärets metod. Se exemplet nedan.

```html
<form method="get" action="?">skall ersättas med
<form method="post" action="?">
```

3\. Lägg till en kodrad som skriver ut innehållet i `$_POST`.

```html
<p><code>$_POST</code> innehåller följande:</p>
<pre><?php print_r($_POST); ?></pre>
```

4\. Testa sidan.

* Så här blev det för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/kmom03_postform.php'>http://dbwebb.se/htmlphp/me/kmom03/kmom03_postform.php</a>

[FIGURE src=/img/htmlphp/kmom03/image01.png caption="Ett formulär som använder sig av post-metoden."]

Nu har vi en exempelsida som klarar både `$_GET` och `$_POST` variabler. Webbplatser är ofta uppbyggda på en hantering som mixar dessa metoder.


###3.2 Hantera inkommande `$_GET`/`$_POST` {#inkommande}

Det är viktigt att lära sig att hantera de inkommande variablerna. Som god programmerare bör man alltid kontrollera att de innehåller rimliga värden. Anledningarna är bla att man skall ge bra felmeddelanden till användarna samt att man vill skydda webbapplikationen från illvilliga användare som vill förstöra eller komma åt skyddad information.

Det är många webbplatser som missar att validera sina inkommande variabler. Dessa missar kan användas för att göra intrång i webbplatser. Har du otur så dyker din webbplats upp på nedanstående forum bland webbplatser med säkerhetsbrister.

* <a href='https://www.flashback.org/f16'>https://www.flashback.org/f16</a>

Kolla gärna i forumet och leta reda på trådarna med namnen "Samling av sidor med säkerhetsbrister". Forumet innehåller både ledtrådar till den som vill bryta sig in och till den som vill skydda sig. Bra information, sen hänger ju allt på hur man väljer att använda den.

[UPPGIFT]

Låt oss göra ett testprogram där vi validerar och testar de inkommande variablerna.

1. Skapa en ny sida, `kmom03_validate.php` genom att kopiera din `kmom03_postform.php`.

2. Skriv följande kod för att kontrollera om användarkontot är definerat.

```php
<?php
if(isset($_POST['account'])) {
        echo "<p>Kontot är definerat.</p>";
} else {
        echo "<p>Kontot är EJ definerat.</p>";
}
?>
```

3\. Testa sidan.

* Så här blev det för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/kmom03_validate.php'>http://dbwebb.se/htmlphp/me/kmom03/kmom03_validate.php</a>
  
[UPPGIFT]

Här kommer en liten uppgift där du kan pröva om vingarna bär. Läs uppgiften och titta på bilden nedan, klarar du av att koda ihop det utan att tjuvkika på min kod?

Vidarutveckla din sida, `kmom03_validate.php`, och utöka valideringen genom att använda följande PHP-funktioner.

* `empty()`
* `is_numeric()`
* `strip_tags()`

Leta reda på funktionerna i refmanualen genom att använda sökfunktionen. Läs manualen och se hur det är tänkt att funktionerna skall användas.

* Länk till manualen:  
  <a href='http://php.net/manual/en/funcref.php'>http://php.net/manual/en/funcref.php</a>

Om du är osäker, eller behöver ledtrådar till lösningen, så finner du dem här.

* Ledtrådar till lösningen:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/kmom03_validate2.php'>http://dbwebb.se/htmlphp/me/kmom03/kmom03_validate2.php</a>

[FIGURE src=/img/htmlphp/kmom03/image00.png caption="Exempel program som validerar inkommande variabler."]

På dessa sätt kan man ta hand om inkommande variabler. Ju mer du lär dig, desto bättre känsla kommer du få för vilka tester du behöver göra, och inte. Funktionen `strip_tags()` är bra att lägga på minnet.

Nog om säkerhet. Nu gör vi en multi-sida.


4. Gör en egen multi-sida `test.php` {#multisida-test}
----------------------------------------------------------------------------

Det börjar bli många testprogram, det börjar se lite stökigt ut i katalogstrukturen. Det är bättre om vi kan göra en sida, en multi-sida, `test.php`, och sedan lägger vi alla testprogram i en egen underkatalog, tex `incl/test`.

Principen för sidan `test.php` skall vara följande.

1. Beroende på parametern `?p=sida` skall olika testsidor visas.
2. Om `p` är tomt, eller icke definerad, skall sidan `incl/test/default.php` visas.
3. Visa en aside-meny som gör det enkelt att klicka och komma åt samtliga testfall. Lägg denna koden i en egen fil, `incl/test/aside.php`.
4. Flytta alla testfall till katalogen `incl/test`.
5. Test-sidan skall vara nåbar från navigeringsmenyn.

[UPPGIFT]

Vill du pröva hur bra vingarna bär? Isåfall sätter du igång och gör enligt ovan. Du kan se ett minimalt exempel på en multi-sida på följande adress.

* Multisida:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/test_minimal.php'>http://dbwebb.se/htmlphp/me/kmom03/test_minimal.php</a>
* Källkod  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=&file=test_minimal.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=&file=test_minimal.php#file</a>

Om du behöver hjälp så kan du alltid studera källkoden för sidan. Om det kör ihop sig på riktigt så kan du alltid testa att kopiera källkoden.

Så här ser sidan ut för mig när alla testfall (så här långt) är med.

* Första versionen av testsidan:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/test.php'>http://dbwebb.se/htmlphp/me/kmom03/test.php</a>

[FIGURE src=/img/htmlphp/kmom03/image03.png caption="Första versionen av test-sidan."]

Var det klurigt att få ihop det? Gör så gott du kan. Om du inte lyckas integrera alla tester så är det ändå okey. Låt det vara för nu. Det faller på plats senare i kursen.

[INFO]
**Tips.**

Det behövs en speciallösning för att få exemplet med get-formuläret att hamna på en sida med länken `?p=kmom03-getform`.

```html
<form method="get" action="?">
  <input type="hidden" name="p" value="kmom03-getform">
```
  
Ett input-fält av typen hidden hjälper till. Du kan se hur jag gjorde det i min källkod till `kmom03_getform.php`.

* <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl/test&file=kmom03_getform.php'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl/test&file=kmom03_getform.php</a>

I `kmom03_postform.php` och `kmom03_validate.php` räcker det att ändra action till den nya sidans länk.

```html
<form method="post" action="?p=kmom03-postform">
```

(respektive `action="?p=kmom03-validate"`)

Som du ser så skriver jag endast urlens del från `?`-tecknet, den andra delen fylls på av webbläsaren och kommer vara samma som nuvarande url.
[/INFO]

Var det svårt? Om du är nybörjare på PHP så kan det varit en liten utmaning att få ihop det. Dessutom är det många filer att hålla ordning på. Kämpa på tills du lyckas. Ta en sak i taget. Ta hjälp om det behövs. Låna min källkod. När du lyckats så har du kommit en bra bit på vägen till att förstå grunderna i PHP. Om du ser ut som ett frågetecken så är det inte så farligt, det brukar falla på plats innan kursen är slut. Det kommer finnas tid för repetition.


5. PHP och `$_SERVER` {#php-server-array}
--------------------------------------------------------------------

Låt oss titta på ytterligare en bra-att-ha variabel i PHP. `$_SERVER` innehåller information om själva requesten. Där finns bla information om den som hämtade sidan och vilken länk som efterfrågades.


###5.1 Vad finns i $_SERVER? {#server-array}

[UPPGIFT]

Använd din nya multi-sida och skapa en ny testsida som skriver ut innehållet i `$_SERVER`.

Testa att det funkar. Studera innehållet och se om du känner igen några värden.

* `[HTTP_USER_AGENT]` - Vilken webbläsare användes vid anropet?
* `[SERVER_NAME]` - Vilken server är vi på?
* `[REMOTE_ADDR]` - ip-adress hos den som anropade sidan.
* `[DOCUMENT_ROOT]` - Vilken är webbplatsens root?
* `[SCRIPT_FILENAME]` - Filnamn på det skript som körs.
* `[QUERY_STRING]` - Query-delen av urlen.
* `[PHP_SELF]` - Länken till nuvarande sida.

Vad kan vi ha för nytta av denna informationen? Ett vanligt användningsområde är att återskapa nuvarande länk, den länk som användes för att anropa sidan, en "permalänk" till nuvarande sida.

[INFO]
**Felmeddelande getCurrentUrl() saknas?!**

Får du felmeddelande om att en funktion saknas? Läs mer här:

* <a href='http://dbwebb.se/f/6384'>http://dbwebb.se/f/6384</a>
[/INFO]

###5.2 Skapa länk till nuvarande sida {#lanka-sida}

Vissa saker behöver man inte skriva själv. Om någon annan har en bra lösning så kan man återanvända den, det var så jag gjorde när jag löste problemet med att länka till nuvarande sida. Låt oss nu göra samma sak, genom att kopiera en befintlig lösning.

[UPPGIFT]

I filen `src/common.php` finns en funktion som använder sig av informationen i `$_SERVER` för att återskapa länken till nuvarande sida. Kopiera den koden och använd den för att att skriva ut länken till nuvarande sida.

* Källkoden till `src/common.php`  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=src&file=common.php'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=src&file=common.php</a>

Jag väljer att göra `include()` på `src/common.php` i filen `include/config.php`, på det viset finns funktionen tillgänglig i alla filer och jag behöver bara inkludera den på ett enda ställe.

Så här blev det för mig. Jag gjorde en testsida som både skriver ut innehållet i `$_SERVER` samt visade länken till nuvarande sida.

* Testsida för `$_SERVER`:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom03-server'>http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom03-server</a>

[FIGURE src=/img/htmlphp/kmom03/image02.png caption="Skriver ut länken till nuvarande sida samt innehållet i $_SERVER."]

Bra, vad kan vi då använda denna länk till? Låt oss titta på två valideringsverktyg där vi kan ha nytta av länken till nuvarande sida.


###5.3 Link checker och i18n validator {#link-checker}

Som du kan se i min footer så har jag uppdaterat med två nya validatorer, i18n validatorn samt link checker. Om du studerar källkoden för `incl/footer.php` så ser du att jag använt funktionen `getCurrentUrl()` för att länka till dem.

Validatorn i18n visar information om filens språk och teckenkodning.

Link checker är ett verktyg som går igenom alla länkar som finns på en sida och testar dem så att de pekar på en riktig sida. Detta är ett bra verktyg för att slippa brustna länkar, länkar som inte pekar till en riktig sida.

[UPPGIFT]

Uppdaterad din footer och lägg till dessa två validatorer.

Testa så att det fungerar. Försök åtgärda de eventuella fel som verktygen hittar.
Så här ser det ut när jag använder dessa två verktyg på min me-sida.

[FIGURE src=/img/htmlphp/kmom03/image04.png caption="Me-sidan kontrolleras av i18n validatorn."]

[FIGURE src=/img/htmlphp/kmom03/image10.png caption="Me-sidan kontrolleras av link checkern."]

Fint, lite användning kunde vi alltså ha av informationen i `$_SERVER`. Då går vi vidare.


6. PHP och `$_SESSION?` {#php-session}
----------------------------------------------------------------

Sessioner används för att lagra information mellan sidanrop. Sessioner används för att komma ihåg att du är inloggad eller kommer ihåg din varukorg när du handlar i en webbshop. I PHP finns en array, `$_SESSION`, som används för att jobba med information som lagras i sessionen.


###6.1 Starta en session {#starta-session}

För att kunna använda variabeln `$_SESSION` så måste en session startas. Det gör vi med följande kod i filen `incl/config.php`.

```php
// start a named session
session_name(preg_replace('/[:\.\/-_]/', '', __FILE__));
session_start();
```

Det är bra att alltid starta sessionen det första man gör. Det rekommenderas. Överst i config-filen blir därför bra. Studera min källkod hur jag gjorde.

* Starta sessionen i `config-php`:    
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=config.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=config.php#file</a>

* Läs om `session_start()` i refmanualen
  <a href='http://php.net/manual/en/function.session-start.php'>http://php.net/manual/en/function.session-start.php</a>

[UPPGIFT]

Lägg till kod, för att starta sessionen, i din fil `incl/config.php`.

[INFO]
**Tips.**

Vi använder namngivna sessioner med `session_name()`. Det är för att alla webbplatser på www.student.bth.se skall ha olika sessioner. Hade vi inte använt namngivna sessioner så hade sessionsinformationen delats mellan alla webbplatser på www.student.bth.se.
[/INFO]

[INFO]
**Tips.**

Du måste starta sessionen innan något skrivs ut till webbläsaren. Det gäller även tomma rader och tomma tecken. Om du missar detta så får du ett felmeddelande som liknar detta:

> *Warning: Cannot modify header information - headers already sent by (output started at /home/saxon/teachers/tek/mos/www/test/1.php:2) in /home/saxon/teachers/tek/mos/www/test/2.php on line 4*

Detta är ett vanligt felmeddelande som ibland kan vara klurigt att hitta orsaken till. 

* Läs mer om felmeddelandet i följande artikel, och dess olika anledningar:  
  <a href='http://db-o-webb.blogspot.com/2010/02/warning-cannot-modify-header.html'>http://db-o-webb.blogspot.com/2010/02/warning-cannot-modify-header.html</a>
[/INFO]


###6.2 Förstör en session {#forstor-session}

När man jobbar med sessioner kan det ibland vara bra att kunna förstöra hela sessionen. Det kan underlätta felsökning. Om man får konstiga problem med sessionen så kan det vara bra att testa att förstöra den nuvarande sessionen och starta om.

* Läs om `session_destroy()`:  
  <a href='http://php.net/manual/en/function.session-destroy.php'>http://php.net/manual/en/function.session-destroy.php</a>

I filen `src/common.php` finns en funktion som förstör sessionen, `destroySession()`. Titta på koden, du känner igen den från manualen.

* Kolla in funktionen `destroySession()`:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=src&file=common.php'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=src&file=common.php</a>

[UPPGIFT]

Använd funktionen `destroySession()` från `src/common.php` och gör ett testfall som förstör sessionen. Titta hur jag gjorde och se var jag valde att anropa funktionen.

* Så här blev det för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom03-sessiondestroy'>http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom03-sessiondestroy</a>

[FIGURE src=/img/htmlphp/kmom03/image11.png caption="Testfall för att förstöra sessionen."]

Fint, då kan vi starta och förstöra en session, då kan det vara dax att lära sig hur man sparar information i en session.


###6.3 Sätt och läs värden i sessionen {#satt-sessionsvarde}

Du kan tilldela, och läsa, en sessionsvariabel på följande sätt.

```php
$_SESSION['me'] = "dbwebb.se";
if(isset($_SESSION['counter'])) {
  $_SESSION['counter'] = $_SESSION['counter'] + 1;
}
else
{
  $_SESSION['counter'] = 1;
}
```

`me` tilldelas en vanlig sträng medan `counter` tilldelas värdet 1 (om den inte har ett tidigare värde) eller ökas på med värdet 1 (om den redan har ett värde).

[UPPGIFT]

Gör en testsida som använder ovanstående kod för att visa hur man jobbar med sessionsvariabler.

* Så här blev det för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom03-sessionchange'>http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom03-sessionchange</a>

[FIGURE src=/img/htmlphp/kmom03/image12.png caption="Testsida för att ändra i sessionsvariabeln."]

[UPPGIFT]

Gör en testsida som skriver ut innehållet i sessionsvariabeln `$_SESSION`.

* Så här blev det för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom03-session'>http://dbwebb.se/htmlphp/me/kmom03/test.php?p=kmom03-session</a>

[FIGURE src=/img/htmlphp/kmom03/image13.png caption="Testsida som skriver ut innehållet i sessionen."]

Härligt, nu har vi kontroll över sessionerna också. Ska vi våga oss på att använda sessionen för att göra en enkel inloggning?


7. Login och logout {#login-logout}
----------------------------------------------------------------------

De flesta webbplatser innehåller någon form av authenticering där användaren behöver identifiera sig och logga in. Det är bra att ha möjlighet att skydda webbplatserna med en enkel inloggning. Kanske finns det vissa sidor som bara visas för den som är inloggad eller kanske för webbplatsens administratör?


###7.1 Vad krävs för en minimal login/logout funktionalitet? {#minimal}

Ok, låt oss fundera. Detta är ju något som slår på flera ställen på webbplatsen.

1. Ett formulär för att logga in, kanske något i stil med följande sida.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/login.php?p=login'>http://dbwebb.se/htmlphp/me/kmom03/login.php?p=login</a>

2. En möjlighet att logga ut, ungefär så här.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/login.php?p=logout'>http://dbwebb.se/htmlphp/me/kmom03/login.php?p=logout</a>

3. Kanske en sida som visar om jag är inloggad eller inte.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/login.php'>http://dbwebb.se/htmlphp/me/kmom03/login.php</a>
  
4. Det vore ju riktigt bra med en samling av funktioner som "någon" gjort, och som kan underlätta för mig.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=src&file=login.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=src&file=login.php#file</a>

5. Kanske en meny uppe i högra hörnet som visar olika länkar beroende på om jag är inloggad eller ej?  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=header.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=header.php#file</a>

6. Någonstans behöver jag ha information om användarkonto och lösenord.  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=config.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=config.php#file</a>
  
Hoppla. Det blev en del. Testa att logga in på min me-sida med användarkonto "doe" och lösenord "doe". Lek runt och försök att förstå hur det fungerar och hänger ihop.

* Mitt resultat:  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/login.php?p=login'>http://dbwebb.se/htmlphp/me/kmom03/login.php?p=login</a>

[FIGURE src=/img/htmlphp/kmom03/image14.png caption="Logga in på min me-sida."]

Vågar vi oss på en övning som går ut på att göra en inloggningssida? Nåväl, vi kan göra övningen valbar. Det låter rimligt i mina öron.


###7.2 Skapa multi-sida för login och logout {#multisida-login}

[UPPGIFT VALBAR / OPTIONELL / UTMANANDE ]

Kopiera sidan med funktioner för inloggningen, `src/login.php`.

Skapa en multi-sida, `login.php`, för att hantera inloggningen. Sidan skall använda sig av funktionerna i filen `src/login.php`.

* Källkod till `login.php` (multi-sidan)  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=&file=login.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=&file=login.php#file</a>
* Källkod till `src/login.php` (funktionerna)  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=src&file=login.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=src&file=login.php#file</a>

I stycket ovan har du de ledtrådar som du behöver för att lyckas med uppgiften. De variabler och funktioner som används i login/logout-sammanhang börjar på `user`.

Detta blir en litet test på hur bra dina vingar bär.

Tanken är inte att vi skall kunna skriva all denna kod själva, vi vill bara kunna använda lösningar som någon annan gjort. Det är själva tanken. För att klara av det behöver man veta vilka koddelar som skall kopieras, var de skall placeras i filerna och man behöver kunna felsöka. Det är rejäla utmaningar och klarar man det så kommer man en bra bit med sitt PHP-kunnande.


8. Features till siten {#features}
-------------------------------------------------------------------------

Finns det fler trevliga saker som sidan skulle kunna innehålla tro?


###8.1 Ta tid på PHP {#ta-tid}

Ibland vill man veta hur lång tid det tar att generera en sida. Just tidsåtgången är inte så spännande i vårt fall, det är sällan ett bekymmer, men, kanske när databaser blir inblandade och när webbplatserna blir lite större. Vi fixar en timer för framtida bruk.

[UPPGIFT]

Starta timern i filen `incl/config.php` med följande kod.

```php
// time page generation, display in footer. comment out to disable timing.
$pageTimeGeneration = microtime(true);
```

* Källkoden till `incl/config.php`  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=config.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=config.php#file</a>

Stoppa timern och skriv ut resultatet i footern med följande kod.

```php
<?php if(isset($pageTimeGeneration)) : ?>
<p>Page generated in <?php echo round(microtime(true)-$pageTimeGeneration, 5); ?> seconds</p>
<?php endif; ?>
```

* Källkoden till `incl/footer.php`  
  <a href='http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=footer.php#file'>http://dbwebb.se/htmlphp/me/kmom03/viewsource.php?dir=incl&file=footer.php#file</a>


9. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Ta en paus och se över vad du gjort i detta kursmomentet, klicka runt och kolla att de olika delarna fungerar, testa att validera HTML och CSS.

Du har gjort ett bra jobb. Vi kan nu säga att din me-sida är i version 3.0. Det känns bra.
Vila upp dig till nästa kursmoment. Låt saker falla på plats.


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.
2. Genomför momentets alla steg.
3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Beskriv hur väl du kan PHP (nybörjare, erfaren). Har du programmerat tidigare, i vilka språk? Känner du igen dig i PHP-koden? Vad tycker du om PHP så här långt in i kursen? Fick du hjälp av guiden php20? 
4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.
5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
