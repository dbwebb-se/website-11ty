---
author: mos
revision:
  "2014-01-23": (E, mos) Tog bort länk till allra senaste versionen av source.php,
    den gamla skall användas.
  "2014-01-07": (G, mos) Uppdaterade läsanvisningar till Duchett.
  "2013-01-22": (F, mos) Stycke om katalogstruktur för lagring av resultat från de
    olika kursmomenten.
  "2012-06-29": (E, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2011-08-19": (D, mos) Genomgång inför ht11, endast mindre justeringar.
  "2011-01-18": (C, mos) Total genomgång. Större justeringar av innehåll, text och
    flöde i dokumentet.
  "2010-09-02": (B, mos) Lade till stycken (W3Schools tutorials) för nybörjare på
    HTML, CSS och PHP.
  "2010-08-23": (A, mos) Första versionen, inklusive granskning av rgi.
updated: "2015-08-03 12:06:50"
created: "2012-06-08 09:11:31"
...
Kmom01: Kom igång med HTML, CSS och PHP
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




Kom igång med HTML, CSS och PHP {#kom-igang}
--------------------------------------------------------------------

*alternativt "Börja läsa boken, bekanta dig med labbmiljön och gör en me-sida"*

Kursmomentet visar hur du kommer igång med labbmiljön, dels via en installation på din egen dator och dels genom att publicera resultatet på driftsservern. Du kommer att utveckla din kod lokalt och därefter kopiera över resultatet till en driftsserver.

Du skall gå igenom ett par exempel på kodning i HTML, CSS och PHP och använda lärdomarna för att bygga en me-sida. Me-sidan är en enkel webbplats som innehåller en presentation av dig själv tillsammans med redovisningstexterna för kursmomenten.

Vi bygger webbplatsen tillsammans, steg för steg. Vi försöker bygga en struktur som går att återanvända för att bygga fler webbplatser.

Resultatet av dagens övning skall laddas upp på driftservern och kan se ut som följande länk visar. 

* <a href='http://dbwebb.se/htmlphp/me/kmom01/me.php'>http://dbwebb.se/htmlphp/me/kmom01/me.php</a>

[FIGURE src=/img/htmlphp/kmom01/image06.png caption="En me-sida när den är klar."]

När vi är klara med dagens övning så har du förhoppningsvis fått lite blodad tand på det som kursen handlar om. Tanken med övningen är att du skall bekanta dig med de tekniker (HTML, CSS, PHP) som kursen omfattar och få möjlighet att se hur de samverkar. I kommande kursmoment tittar vi mer ingående på respektive teknik.
Använd tid till att studera kurslitteraturen. Se till att få en översikt av vad de olika böckerna erbjuder.

Övningens upplägg är enligt följande:

1. Läsanvisningar (4-10h)
2. Övningar (4-10h)
3. Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 2-3 timmar per gång kan vara bra. Läs gärna igenom hela kursmomentet innan du börjar.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###HTML & CSS: The Complete Reference {#html-css}

*(fifth edition)* 

Detta är den huvudsakliga kurslitteraturen. Börja med att bläddra igenom boken och se hur den är strukturerad.

Läs följande kapitel.

* Part I, Ch 1: Traditional HTML and XHTML

Bläddra snabbt igenom följande kapitel, se vad kapitlet handlar om.

* Part II, Ch 4: Introduction to CSS



###Beginning HTML, XHTML, CSS and JavaScript {#beginning-web}

*(1st edition)*

Bläddra snabbt igenom följande kapitel. Läs översiktligt. Beroende på dina förkunskaper kan du välja att läsa mer detaljerat.

* Ch 1: Structuring Documents for the Web
* Ch 2: Links and Navigation



###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Läs snabbt och översiktligt följande kapitel:

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics

###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

Wikipedia ger dig en översikt om HTML/HTML5 och CSS/CSS3.

* <a href='http://en.wikipedia.org/wiki/HTML'>http://en.wikipedia.org/wiki/HTML</a>
* <a href='http://en.wikipedia.org/wiki/HTML_5'>http://en.wikipedia.org/wiki/HTML_5</a>
* <a href='http://en.wikipedia.org/wiki/CSS'>http://en.wikipedia.org/wiki/CSS</a>
* <a href='http://en.wikipedia.org/wiki/CSS3#CSS_3'>http://en.wikipedia.org/wiki/CSS3#CSS_3</a>

W3C driver standardiseringsarbetet. Ta en snabb titt på deras hemsida om webbdesign och applikationer.

* <a href='http://www.w3.org/standards/webdesign/'>http://www.w3.org/standards/webdesign/</a>

W3C har referensmanualer. Lär dig att hitta i dem. De är din bästa källa till korrekt information.

* HTML5: <a href='http://dev.w3.org/html5/spec/spec.html'>http://dev.w3.org/html5/spec/spec.html</a>
* CSS2: <a href='http://www.w3.org/TR/CSS2/'>http://www.w3.org/TR/CSS2/</a>
* CSS3: <a href='http://www.w3.org/Style/CSS/current-work#CSS3'>http://www.w3.org/Style/CSS/current-work#CSS3</a>

W3C har ett "cheatsheet" som snabbt ger dig information om HTML och CSS tag. Testa det. Det sparar tid.

* <a href='http://www.w3.org/2009/cheatsheet/'>http://www.w3.org/2009/cheatsheet/</a>

W3C validatorerna är viktiga verktyg för en webbutvecklare.

* HTML validator: <a href='http://validator.w3.org/'>http://validator.w3.org/</a>
* CSS validator: <a href='http://jigsaw.w3.org/css-validator/'>http://jigsaw.w3.org/css-validator/</a>
* HTML & CSS validator kombinerad: <a href='http://validator.w3.org/unicorn/'>http://validator.w3.org/unicorn/</a>

W3School har bra siter för HTML, CSS och PHP. De är enkla och bra att använda för referens, både för nybörjare och proffs.

* <a href='http://www.w3schools.com/html'>http://www.w3schools.com/html</a>
* <a href='http://www.w3schools.com/html5'>http://www.w3schools.com/html5</a>
* <a href='http://www.w3schools.com/css'>http://www.w3schools.com/css</a>
* <a href='http://www.w3schools.com/php/'>http://www.w3schools.com/php/</a>

PHP's referensmanual ger oss all information vi behöver om PHP. Lär dig använda sökfunktionen för att hitta rätt PHP-funktioner.

* PHP-manualen: <a href='http://php.net/manual/en/index.php'>http://php.net/manual/en/index.php</a>
* Kom igång med PHP: <a href='http://php.net/manual/en/getting-started.php'>http://php.net/manual/en/getting-started.php</a>

Wikipedia om PHP

* <a href='http://en.wikipedia.org/wiki/PHP'>http://en.wikipedia.org/wiki/PHP</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.


1. HTML och CSS, PHP-skript och lite SQL  {#html-och-css}
--------------------------------------------------------------------

Denna kursen handlar om HTML och CSS. Kursen handlar också om PHP. PHP på ett skriptsätt. Integrerat i HTML-koden. Kursen handlar även om SQL och databaser. Att lagra viss information i databasen. För att ge webbplatsen mer dynamik. Dessutom handlar det om struktur och ordning och reda. Allt för att bygga välstrukturerade webbplatser. En struktur som går att återanvända. En struktur som går att kopiera och använda som grund när vi skapar nya webbplatser. 

Ordning och reda, SQL, skriptbaserad PHP, och en rejäl genomgång av HTML och CSS. Det är ingredienserna till denna kursen.

Då kör vi. 

Läs hela detta dokument, uppifrån och ned, gör som det beskrivs i dokumentet, stycke för stycke. Så är tanken.
Vissa saker skall du själv koda, dessa benämns [UPPGIFT]. Vissa uppgifter är valbara, då står det [UPPGIFT VALBAR].


2. Utvecklings- och driftmiljö {#labbmiljo}
--------------------------------------------------------------------

Först och främst behöver vi en miljö att jobba i. Låt oss börja med det. I denna kursen tänkte jag mig att vi jobbar mot en lokal miljö på våra egna datorer, när vi är klara så laddar vi upp en kopia till en driftsmiljö (www.student.bth.se). Det är ett vanligt sätt (ett av flera) att jobba med webbplatser.

[UPPGIFT]

Installera din egna lokala utvecklingsmiljö på din egna maskin.

* Installera webbläsare:  
  <a href='http://dbwebb.se/kunskap/installera-webblasare'>http://dbwebb.se/kunskap/installera-webblasare</a>
  
* Installera webbserver:  
  <a href='http://dbwebb.se/kunskap/installera-en-egen-webbserver-for-utveckling'>http://dbwebb.se/kunskap/installera-en-egen-webbserver-for-utveckling</a>

Du behöver inte installera MySQL om du inte vill, i denna kursen kommer vi att använda SQLite som databas. MySQL används i oophp-kursen.

* Installera en texteditor, jEdit:  
  <a href='http://dbwebb.se/kunskap/installera-en-texteditor-jedit'>http://dbwebb.se/kunskap/installera-en-texteditor-jedit</a>
  
* Flytta filer från den lokala utvecklingsmiljön till driftsmiljön med sftp.  
  <a href='http://dbwebb.se/kunskap/flytta-filer-till-driftsmiljon-med-sftp-och-filezilla'>http://dbwebb.se/kunskap/flytta-filer-till-driftsmiljon-med-sftp-och-filezilla</a>
  
Fint, då har vi en miljö för att utveckla och driftsätta webbplatser. Låt oss gå vidare och utveckla en enklare webbplats.

[UPPGIFT VALBAR]

* Skumläs lite mer om BTH's labbmiljö, för dig som vill veta lite mer:  
  <a href='http://dbwebb.se/kunskap/bth-s-labmiljo-for-webbprogrammering'>http://dbwebb.se/kunskap/bth-s-labmiljo-for-webbprogrammering</a>



3. En webbplats om mig själv, min me-sida {#me-sida}
--------------------------------------------------------------------

I kursen används något som kallas för en me-sida. Me-sidan används för att presentera dig själv och för att redovisa kursmomenten. Låt oss börja med att skapa me-sidan, en webbplats om dig själv och för dina redovisningar. 

Vi skall skapa HTML-koden, en extern stylesheet med CSS samt strukturera sidorna med hjälp av PHP. Dessutom vill vi bekanta oss med validatorer som hjälper att kontrollera att HTML- och CSS-koden är korrekt skriven. Vi vill snygga till webbplatsen med en logo och en navigeringsmeny.

En liten plan för dagen blir alltså följande:

1. HTML och validator (`me.php`)
2. CSS och validator (`me.php`, `stylesheet.css`)
3. Header med logo och meny
4. PHP (`header.php`, `footer.php`)
5. En sida för redovisningar (`report.php`)
6. Snygga till och gör färdigt

Jobba med filerna lokalt och för sedan över den till driftsservern. När vi är klara med dagens övning så har du förhoppningsvis fått lite blodad tand på det som kursen handlar om.


4. HTML och validator (`me.php`) {#me-php}
--------------------------------------------------------------------

Då sätter vi tänderna i första punkten på listan.

1. **HTML och validator (`me.php`)**
2. CSS och validator (`me.php`, `stylesheet.css`)
3. Header med logo och meny
4. PHP (`header.php`, `footer.php`)
5. En sida för redovisningar (`report.php`)
6. Snygga till och gör färdigt


###4.1 Grundstruktur med HTML {#grund-html}

[UPPGIFT]

För att underlätta så tjuvstartar vi med en grundstruktur för HTML-koden. Grundstrukturen baseras på HTML5 och vi håller den så enkel det går. Iallafall tills vidare.

Skapa en tom sida, döp den till `me.php`. Fyll den med följande kod.

```html
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Me-sidan</title>
</head>
<body>
  <h1>htmlphp-me</h1>
  <p>Här kommer snart min egen fina me-sida.</p>
  <img src="img/me.jpg" alt="Bild på Mikael Roos">
</body>        
</html>
```

Använd denna grundstruktur när du gör dina sidor. 

Leta reda på en fin bild på dig själv (`me.jpg`) och lägg den i en underkatalog som du döper till `img`.

Så här kan sidan se ut när du är klar.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me01.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me01.php</a>

[FIGURE src=/img/htmlphp/kmom01/image07.png caption="En första variant på me-sida."]

Bra. Då kan vi går vidare. Validerar sidan i validatorn tro?


<div class='info' markdown=1>
**Tips.** 

Dubbelkolla att teckenkodningen för filen är satt till UTF8-NOBOM i din editor. Annars blir det problem med de svenska tecknen.
</div>

<div class='info' markdown=1>
**Tips.**

Svenska eller engelska, eller svengelska?

Normalt använder jag engelska när jag skriver kod, kommentarer, variabelnamn och filnamn. Eftersom me-siten blir på svenska så blir dock en del filnamn på svenska.

Det kan tyckas att jag friskt blandar engelska och svenska. Det gör jag. Jag försöker dock tänka på att undvika svengelska i dokument och instruktioner. Hittar du fel i texten så får du gärna påpeka dem i forumet. Vi rättar dokumenten så fort vi kan. Allt för att hålla en bra nivå.
</div>


###4.2 Validera enligt HTML5 {#validera-html5}

[UPPGIFT]

För att kontrollera att det verkligen är HTML5 så kör vi den genom W3C's HTML validator. Du når validatorn via följande länk.

* <a href='http://validator.w3.org/#validate_by_input'>http://validator.w3.org/#validate_by_input</a>

Kopiera in din HTML-kod, klicka på knappen och se vad som händer. Validerar din sida? 

Ser bra ut hos mig.

[FIGURE src=/img/htmlphp/kmom01/image08.png caption="HTML koden valideras som HTML5."]

Om du fick fel så försöker du rätta till felen. Läs vad varningarna betyder. Det är bra att ha lite koll.


###4.3 Länka till valideringsverktyget {#lanka-validering-html5}

[UPPGIFT]

För att förenkla framtida kontroller så lägger vi till en länk till validatorn, direkt i me-sidan. Det gör att vi hela tiden kan validera dokumentet med ett litet klick.

Skapa en footer till me-sidan och lägg in länken till validatorn där. Följande kod löser det.

```
  <hr>
  <div id="footer">
    <a href="http://validator.w3.org/check/referer">HTML5</a>
  </div>
</body>
```

För att det skall fungera måste din sida ligga på en webbserver som är publikt tillgänglig. Annars kommer validatorn inte åt din sida. Testa genom att ladda upp din me-sida till driftsmiljön.

Så här blev det för mig.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me02.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me02.php</a>

[FIGURE src=/img/htmlphp/kmom01/image09.png caption="Min me-sida, nu uppdaterad med en länk till HTML-validatorn."]

Klicka på länken för att köra sidan i validatorn. Detta är ett mycket bra hjälpmedel. Kolla alltid med validatorn när du får problem. Det hjälper dig att hålla koll på din HTML-kod.

Du kan se källkoden till min me-sida på följande länk.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?file=me02.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?file=me02.php</a>


5. CSS och validator (`me.php`, `stylesheet.css`) {#css-validator}
--------------------------------------------------------------------

Bra, då stryker vi en punkt på listan och tar raskt tag i nästa.

1. <del>HTML och validator (`me.php`)</del>
2. **CSS och validator (`me.php`, `stylesheet.css`)**
3. Header med logo och meny
4. PHP (`header.php`, `footer.php`)
5. En sida för redovisningar (`report.php`)
6. Snygga till och gör färdigt


###5.1 Styla me-sidan med CSS {#styla-med-css}

[UPPGIFT]

Med CSS kan vi ge sidan färg och form. Vi kan styla HTML-elementen och bestämma var de skall visas på sidan och hur de skall se ut. CSS-koden lägger vi i en separat fil och länkar till den från HTML-koden.

Skapa en katalog som heter style och en fil som heter `stylesheet.css`. Lägg följande kod i filen.

```
html {background: #cc6666;}
body {
  margin: 8px auto;
  width: 934px;
  padding: 8px;
  background: #ffffcc;
  border: 1px dashed #000000;
  font-family: Georgia, serif;
  color: #333333;
}
h1 {
  text-transform: uppercase;
  border-bottom: 4px double #333333;
}
div#footer a {
  font: italic 0.8em Arial, Helvetica, sans-serif;
  text-decoration:none;
  color: #999999;
}
div#footer a:link    { }
div#footer a:visited { }
div#footer a:hover   { text-decoration:underline;  color: #333333; }
div#footer a:active  { }
```

Peka ut din stylesheet genom att lägga till följande kod i `<head>`-elementet i HTML-koden (`me.php`).

```
    <link rel="stylesheet" href="style/stylesheet.css">
</head>
```

Testa i din utvecklingsmiljö och ladda sedan upp allt till driftsmiljön. Så här blev det för mig.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me03.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me03.php</a>

[FIGURE src=/img/htmlphp/kmom01/image01.png caption="Min me-sida, nu stylad med extern stylesheet, tveksamt färgval men ändock stylad."]

Visst kan man göra skillnad med en stylesheet och lite CSS-kod? 

Källkoden till min variant av `stylesheet.css` och `me.php` hittar du via följande länkar.

* `me.php`:  
  <a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me03.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me03.php</a>
* `stylesheet.css`:  
  <a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=style&file=stylesheet01.css'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=style&file=stylesheet01.css</a>

Bra, då tittar vi på validering av stylesheeten.


###5.2 Validering av CSS {#validera-css}

[UPPGIFT]

W3C har en validator för CSS. Du når den via följande länk.

* <a href='http://jigsaw.w3.org/css-validator/'>http://jigsaw.w3.org/css-validator/</a>

Ladda upp din sida på driftsserver och validera den genom att ge validatorn länken till din me-sida. Valideras din stylesheet?

Funkar för mig.

[FIGURE src=/img/htmlphp/kmom01/image00.png caption="Me-sidan med stylesheet valideras enligt CSS level 2.1."]

Bra. Om du får fel så försök rätta till det.


###5.3 Länka till valideringsverktyget {#lanka-css-validator}

[UPPGIFT]

För att underlätta validering av sidorna så lägger vi till en direktlänk. På samma sätt som vi gjorde med HTML-validatorn. Lägg till följande länk i din footer.

```
<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
```

Din webbserver behöver vara publik för att det skall fungera. Ladda upp sidorna på driftsservern för att testa validatorlänken.

Så här blev det för mig.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me04.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me04.php</a>

[FIGURE src=/img/htmlphp/kmom01/image03.png caption="Min me-sida, nu med länk till CSS valideringsverktyg i sidans footer."]

Testa att validera sidan genom att klicka på CSS-länken. Glöm nu inte att validera dina sidor med jämna mellanrum. Dessa valideringsverktyg är extra bra att använda för felsökning. Gör det.

<div class='info' markdown=1>
**Tips.** 

Ser din sida inte ut som du förväntar dig? Dubbelkolla med valideringsverktygen att HTML- och CSS-koden validerar.
</div>


###5.4 Unicorn, ett valideringsverktyg "to rule them all" {#unicorn}

[UPPGIFT]

Det finns ett valideringsverktyg som kör både HTML och CSS testerna i en körning. Dessutom kan det köra ytterligare kompletterande tester. Länka även till detta verktyget från din me-sida. Via följande länkar kan du klura ut hur jag gjorde. Gör likadant.

* Länk till validatorn Unicorn: <a href='http://validator.w3.org/unicorn/'>http://validator.w3.org/unicorn/</a>
* Mos me-sida med Unicorn-länk: <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me05.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me05.php</a>
* Källkoden till mos me-sida med Unicorn-länk <a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me05.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me05.php</a>

[FIGURE src=/img/htmlphp/kmom01/image02.png caption="Min me-sida kan nu använda validatorn Unicorn."]

Bra, nu har vi en grundstruktur och enkelt tillgång till valideringsverktygen. Se till att länken till Unicorn fungerar och att sidan validerar.

<div class='info' markdown=1>
**Tips.**

Varför används `&amp;` istället för tecknet `&` när vi länkar till Unicorn? Testa att ändra din kod och enbart skriva `&`. Validera den sedan i Unicorn. Du får ett felmeddelande som säger:

> **`&` did not start a character reference. (`&` probably should have been escaped as `&amp;`.)**

`&` är ett tecken som har en speciell betydelse i HTML, därför ersätts den ofta med `&amp;` i HTML-koden. Annars validerar inte koden. Läs mer genom att googla på ["html entities"](https://www.google.com/?q=html+entities) eller läs i kurslitteraturen (Appendix A Character Entities).
</div>


6. Snygga till med en header, logo och meny {#snygg-header}
--------------------------------------------------------------------

Då stryker vi ytterligare en punkt och går raskt vidare med nästa.

1. <del>HTML och validator (`me.php`)</del>
2. <del>CSS och validator (`me.php`, `stylesheet.css`)</del>
3. **Header med logo och meny**
4. PHP (`header.php`, `footer.php`)
5. En sida för redovisningar (`report.php`)
6. Snygga till och gör färdigt


###6.1 Gör en header till din me-sida {#header-me}

[UPPGIFT]

En webbplats innehåller ofta en header med en logo, titel på siten och en navigeringsmeny. Visst vore det trevligt om vår me-sida även innehåll detta?

Låt oss fixa till en header, innan vi går vidare. Följande kod hjälper oss på vägen.

*HTML-kod*:
```
<!-- Header -->
<div id="top">
    <img src="img/logo.png" alt="htmlphp logo" width=300 height=70>
</div>
<!-- Navigeringsmeny -->
<nav class="navmenu">
    <a href="me.php">Me</a>
    <a href="report.php">Redovisning</a>
</nav>
```

*CSS-kod:*
```
/* header --------------------------------------------------------
 */
div#top {}

/* navigation menu -----------------------------------------------
 */
nav.navmenu {
    display: block;
    padding: 0.2em 1em 0 1em;
    background: #ffcc99;
    border-bottom: 2px solid #999999;
}
nav.navmenu a {
    padding: 0.3em 1em 0 1em;
    color: #555555;
    font-family: Tahoma, Geneva, sans-serif;
    text-decoration:none;
}
nav.navmenu a:link    { }
nav.navmenu a:visited { }
nav.navmenu a:hover   { color: #111111; background: #999999; }
nav.navmenu a:active  { }
```

Du kan ordna en egen logo-bild eller bara låna min så länge. Ladda ned logo-bilden genom att högerklicka på den och välj *"Spara bild som..."*.

Så här blev det för mig.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me06.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me06.php</a>

[FIGURE src=/img/htmlphp/kmom01/image04.png caption="Min me-sida, nu med logo och meny."]

Glöm inte att kolla om sidan validerar. Du hittar min källkod på följande länkar.

* Me-sidan version 06:  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me06.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me06.php</a>
* Stylesheeten version 02:  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=style&file=stylesheet02.css'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=style&file=stylesheet02.css</a>

Bra. Nu börjar det likna något. Då är vi redo att strukturera sidorna med PHP.

<div class='info' markdown=1>
**Tips.**

`<nav>` är ett nytt element i HTML5. Det inför semantisk betydelse som innebär att det ger ledtrådar till vilket syfte elementet har i HTML-dokumentet. `<nav>` innebär att innehållet är navigeringslänkar, antingen inom siten eller till andra siter. Ofta är det en gruppering av länkar. Läs boken för att lära dig mer.
</div>

<div class='info' markdown=1>
**Tips.**

Kommentarer i HTML skrivs på följande sätt:

```
<!-- text som är en vacker kommentar -->
```

Kommentar i CSS skrivs på följande sätt.

```
/* text som är en vacker kommentar */
```

Använd kommentarer för att dokumentera din kod. Framförallt för din egen skull. Använd även kommentarsstycken för att strukturera koden så den blir översiktlig och lättläst.
</div>


7. PHP (`header.php`, `footer.php`) {#php}
--------------------------------------------------------------------

Bra, då stryker vi ytterligare en punkt på listan och tar raskt tag i nästa.

1. <del>HTML och validator (`me.php`)</del>
2. <del>CSS och validator (`me.php`, `stylesheet.css`)</del>
3. <del>Header med logo och meny</del>
4. **PHP (`header.php`, `footer.php`)**
5. En sida för redovisningar (`report.php`)
6. Snygga till och gör färdigt


###7.1 Grundstruktur med PHP {#grund-med-php}

Då har vi en grundstruktur på vår webbsida. Det är snart dax att göra en sida för redovisningstexterna (`report.php`). Men, innan vi gör det så skall vi strukturera lite. Ska vi bara kopiera `me.php` eller finns det ett bättre (och enkelt) sätt? Vissa delar av me-sidan innehåller information som gäller för hela webbplatsen (header och footer) och vissa delar är specifik för respektive sida. Kan vi använda PHP för att få en bra struktur på detta? Vi vill ju bara ändra på ett ställe när vi lägger till ny information? Vi vill verkligen inte sitta och ändra samma sak i flera filer.

Ett vanligt sätt är att lägga viss information i en sida som heter `header.php` och viss information i en sida som döps till `footer.php`. Dessa sidor kan sedan inkluderas när de behövs.

För att komma igång så visar jag hur man kan göra.


###7.2 Dela upp `me.php` i 3 delar {#me-i-tre-del}

En snabb och enkel uppdelning av `me.php`, `header.php` och `footer.php` kan se ut som följer.

* Orginalet: <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me06.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me06.php</a>

Den övre delen av koden från `me.php` flyttas till filen `header.php`, inklusive logo och navigationsmenyn. Den nedre delen av filen `me.php` flyttas till filen `footer.php`. Jag väljer att skapa en ny underkatalog `incl` och lägger både `header.php` och `footer.php` i den katalogen. Det får bli en egen katalog för filer som inkluderas.

Med hjälp av PHP-konstruktionen [`include()`](http://php.net/include) så inkluderas `header.php` och `footer.php` i `me.php`.

```
<?php include("incl/header.php"); ?>
```

`<?php` är starttag för PHP-kod, `?>` är sluttag. Allt mellan taggarna betraktas och hanteras som PHP-kod. Det är webbservern som parsar PHP-koden innan den lämnar ifrån sig den resulterande HTML-sidan.

Resultatet finns att skåda här (källkoden). Kolla källkoden i alla tre sidorna.

* Källkoden till `me.php`  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me07.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me07.php</a>
* Källkoden till `header.php`  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=incl&file=header.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=incl&file=header.php</a>
* Källkoden till `footer.php`  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=incl&file=footer.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=incl&file=footer.php</a>

Tekniskt funkar sidan som tidigare. Resultatet i webbläsaren blir precis som tidigare. Det är bara den bakomliggande strukturen av filer på servern som ändrades. Sidan finns att provköra på följande länk.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me07.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me07.php</a>

[UPPGIFT]

Dela upp din sida på ovanstående sätt. Är du klar? Bra, då kan vi fortsätta.

<div class='info' markdown=1>
**Tips.**

Bekanta dig med PHP-manualen. Det kan bli en av dina bästa vänner. Allt du behöver veta om PHP finns att läsa i manualen. Det gäller bara att bli kompis med manualen.

* Läs lite kort om språket PHP:  
<a href='http://php.net/manual/en/intro-whatis.php'>http://php.net/manual/en/intro-whatis.php</a>
* Slå upp funktionen `include()` och läs lite om den:  
<a href='http://php.net/manual/en/function.include.php'>http://php.net/manual/en/function.include.php</a>
</div>


8. En sida för redovisningar (`report.php`) {#report-php}
--------------------------------------------------------------------

Bra, då stryker vi ytterligare en punkt på listan och tar raskt tag i nästa.

1. <del>HTML och validator (`me.php`)</del>
2. <del>CSS och validator (`me.php`, `stylesheet.css`)</del>
3. <del>Header med logo och meny</del>
4. <del>PHP (`header.php`, `footer.php`)</del>
5. **En sida för redovisningar (`report.php`)**
6. Snygga till och gör färdigt


###8.1 Testa grundstrukturen, fungerar den? {#testa-grund}

[UPPGIFT]

Då gör vi en ny sida genom att kopiera `me.php`. Döp sidan till `report.php`. Det är denna sidan som är till för dina redovisningstexter.

Så här blev det för mig. Klicka på menyvalet *"Redovisning"* så hamnar du på den nya sidan.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/report01.php'>http://dbwebb.se/htmlphp/me/kmom01/try/report01.php</a>

[FIGURE src=/img/htmlphp/kmom01/image10.png caption="Min me-webb, nu med sida för kommande redovisningstexter."]

Det blev bra va? Strukturen av källkoden till me-sidan och till redovisningssidan är densamma. Dubbelkolla genom att titta på källkoden.

* Me-sidan  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me08.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me08.php</a>
* Redovisningssidan  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=report01.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=report01.php</a>

Du glömmer inte att validera sidorna va? Bra, men det finns ett litet bekymmer. Titeln på sidorna är samma. Den titel som visas överst i webbläsarens fönster, den titel som finns i HTML-elementet `<title>` i `header.php`. Det är inte bra. Låt se om det går att hantera med PHP.


###8.2 Variabel i PHP för att byta titel {#byt-titel}

[UPPGIFT]

Varje sida skall ha en egen beskrivande titel. Själva titeln sätts i HTML-elementet `<title>` i `header.php`. Men, det är ju me-sidan eller redovisningssidan som vet vilken titel det skall vara. Detta kan vi lösa med en variabel i PHP. Vi skapar en PHP-variabel `$title` som skall innehålla sidans titel. Vi ger variabeln ett värde i `me.php` respektive `report.php`. Därefter skriver vi ut variabelns värde i filen `header.php`.
Låt mig visa hur man gör. Gör sedan likadant i dina egna filer.

I `me.php` definerar vi en variabel (`$title`) och tilldelar den sidans titel ("Min Me-sida om mig själv"). Alla PHP-uttryck skall avslutas med ett semikolon.

`me.php`

```php
<?php
$title = "Min Me-sida om mig själv";
?>
```

* Källkod:  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me09.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me09.php</a>

Samma sak gör vi i filen `report.php`. Här använder vi en annan titel på sidan.

`report.php`

```php
<?php
$title = "Mina redovisningar av kursmomenten";
?>
```

* Källkod:  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=report02.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=report02.php</a>

I `header.php` skriver vi ut värdet av variabeln `$title` enligt följande.

Byt ut raden som innehåller nuvarande title-taggen mot PHP-kod som skriver ut värdet på variabeln `$title`.

Ursprunglig kod:

```html
  <title>Me-sidan</title>
```

Ny kod:

```html
  <title><?php echo $title; ?></title>
```

* Källkod:  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=incl&file=header02.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=incl&file=header02.php</a>

Du kan testa min lösning på följande länk.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me09.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me09.php</a>

[FIGURE src=/img/htmlphp/kmom01/image11.png caption="Samma utseende som tidigare, det är bara strukturen bakom som ändras, och sidans titeln förstås."]

Bra jobbat. Se till att din egna me-sida klarar av detta och att den validerar. Glöm inte att validera.

<div class='info' markdown=1>
**Tips.**

Du kan läsa mer om variabler i PHP's referensmanual. Läs lite översiktligt och titta på exemplen.

* <a href='http://php.net/manual/en/language.variables.basics.php'>http://php.net/manual/en/language.variables.basics.php</a>

Funktionen echo kan skriva ut värdet av en variabel, läs kort om funktionen i manualen.

* <a href='http://php.net/manual/en/function.echo.php'>http://php.net/manual/en/function.echo.php</a>
</div>


###8.3 Felmeddelande i PHP {#felmeddelanden}

[UPPGIFT]

När webbservern processar PHP-koden kan den hitta fel och då skrivs ett felmeddelande ut. Felmeddelande i PHP kan vara av olika typer och ha olika grad av allvarlighet. Beroende på om det är en utvecklingsserver eller en driftsserver så brukar man konfigurera PHP att visa olika meddelanden. På driftsservern *www.student.bth.se* visas inte felmeddelande av typen `NOTICE`. Det är rätt vanligt att det är så på en driftsserver. Det är alltid bra att ha kontroll över vilka felmeddelanden som skrivs ut. Och framförallt att de verkligen skrivs ut.

Följande bilder visar på två vanliga felmeddelanden. Kan du klura ut vad de beror på? Svaren står i slutet av stycket.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/me10.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me10.php</a>

[FIGURE src=/img/htmlphp/kmom01/image12.png caption="Felmeddelande på me-sidan."]

Kan du hitta felet genom att läsa felmeddelandet och studera källkoden?

* Källkoden:  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me10.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me10.php</a>

Svaret finner du längre ned i stycket. 
 
Här kommer ett felmeddelande till, lite klurigare att se själva felmeddelandet (tips, titta i fliken där sidans titel brukar visas).

* <a href='http://dbwebb.se/htmlphp/me/kmom01/try/report03.php'>http://dbwebb.se/htmlphp/me/kmom01/try/report03.php</a>

[FIGURE src=/img/htmlphp/kmom01/image13.png caption="Felmeddelande på redovisningssidan."]

Kan du hitta felet genom att läsa felmeddelandet och studera källkoden?

* Källkod:  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=report03.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=report03.php</a>

I sista exemplet kan det vara lite svårt att se felmeddelandet. I de fallen kan det vara bra att studera den HTML-kod som genererats. Högerklicka på webbläsaren och välj *"Visa källkod..."*. Kan du se felmeddelandet nu?

[FIGURE src=/img/htmlphp/kmom01/image14.png caption="Felmeddelande som är inbakat i HTML-koden kan vara svåra att hitta. Det är bra att studera källkoden för HTML."]

Hittade du felen? Följande rader var ändrade och gjorde att felet inträffade. Studera raderna och se om felmeddelandet stämde. Kom sedan ihåg. Felmeddelandena stämmer ofta. Ibland är det bara lite klurigt att hitta anledningen till dem.

Felet i `me10.php`. Anledningen är ett försök att inkludera en fil som inte finns.

```php
<?php include("incl/nofooter.php"); ?>
```

Felet i `report03.php`. Anledningen är ett felaktigt variabelnamn, borde varit `$title`.

```php
<?php
$notitle = "Mina redovisningar av kursmomenten";
?>
```

Det kommer att bli fler felmeddelanden innan kursen är slut, tro mig.


###8.4 Ta kontroll över felmeddelanden {#kontroll-felmeddelande}

[UPPGIFT]

Med PHP-funktionen [`error_reporting()`](http://php.net/manual/en/function.error-reporting.php) går att ställa in vilka felmeddelanden som visas, oavsett hur PHP är konfigurerat på servern. Ett bra sätt är att lägga anropet i en egen fil, det blir då enkelt att ändra.

För detta syfte skapar vi en ny fil, `incl/config.php`. Följande PHP-kod stoppar vi in i filen.

```php
<?php
error_reporting(-1);
```

Nu behöver vi inkludera denna fil i me-sidan respektive redovisningssidan. I följande exempel är detta gjort.

* Testkör me-siten.  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/me11.php'>http://dbwebb.se/htmlphp/me/kmom01/try/me11.php</a>
* Källkod till me-sidan (samma ändring är gjord i redovisningssidan)  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me11.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=&file=me11.php</a>
* Källkod till `config.php`  
<a href='http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=incl&file=config.php'>http://dbwebb.se/htmlphp/me/kmom01/try/source.php?dir=incl&file=config.php</a>

Bra, ordning och reda. Felmeddelanden kommer vi ha stor nytta av framöver. Det är ett av de viktigaste verktygen för felsökning.

Vi börjar närma oss slutet för detta kursmoment.

<div class='info' markdown=1>
**Tips.**

Vill du veta mer om funktionen `error_reporting()` så läser du om den i referensmanualen. Gör det till en vana att slå upp saker i referensmanualen.

* <a href='http://php.net/manual/en/function.error-reporting.php'>http://php.net/manual/en/function.error-reporting.php</a>
</div>

<div class='info' markdown=1>
**Tips.**

PHP sluttag `?>` behövs inte alltid anges. Som du kan se i filen `config.php` så använder jag inte sluttaggen. Detta gäller när man enbart har PHP-kod i en fil och det stämmer för config-filen. Om man kan undvika att ange sluttaggen så ska man göra det. När du mixar HTML-kod och PHP-kod så måste du alltid ange sluttaggen. I denna kurs mixar vi nästa uteslutande HTML och PHP så oftast behöver du ange sluttaggen.
</div>


9. Snygga till och gör färdigt {#snygga-till}
--------------------------------------------------------------------

Bra, då stryker vi ytterligare en punkt på listan och tar tag i den sista punkten på listan.

1. <del>HTML och validator (`me.php`)</del>
2. <del>CSS och validator (`me.php`, `stylesheet.css`)</del>
3. <del>Header med logo och meny</del>
4. <del>PHP (`header.php`, `footer.php`)</del>
5. <del>En sida för redovisningar (`report.php`)</del>
6. **Snygga till och gör färdigt**


###9.1 Gör klart me-sidan {#me-sida-klar}

[UPPGIFT]

Nu återstår bara att göra klart din me-site och stoppa in lite information. Skriv en enklare presentationstext om dig själv. Så här blev det för mig.

* <a href='http://dbwebb.se/htmlphp/me/kmom01/me.php'>http://dbwebb.se/htmlphp/me/kmom01/me.php</a>

[FIGURE src=/img/htmlphp/kmom01/image15.png caption="Min uppdaterade me-sida."]

Du behöver inte skriva lika mycket text som jag gjort. Skriv något som gör att lärarna och dina medstudenter kan se vem du är.


###9.2 Gör klart redovisningssidan {#redovisningsida-klar}

[UPPGIFT]

Redovisningssidan skriver du senare. Det är det sista du gör i varje kursmoment.


###9.3 Länka till `source.php` {#source-php}

[UPPGIFT]

I detta kursmomentet har vi använt PHP-filen `source.php` för att visa källkodsexemplen. För att det skall vara enkelt att hjälpa  till med felsökning så är det viktigt att du har en kopia av `source.php` i din katalog. Behöver du hjälp så kommer den som hjälper dig att vilja titta på din källkod.

Du kan hämta kopian av `source.php` via följande länk.

* <a href='https://github.com/mosbth/Utility/blob/master/source.php'>https://github.com/mosbth/Utility/blob/master/source.php</a>

Ta koden och lägg den i en fil som du döper till `source.php`. Lägg `source.php` i samma katalog som du lägger `me.php` och `report.php`. Se till att länka till `source.php` i din footer. Som du kan se så har jag gjort det i min senaste variant av me-sidan.

* htmlphp/me/kmom01/me.php
* htmlphp/me/kmom01/source.php


10. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Det är alltid skönt att stryka den sista punkten på listan.

1. <del>HTML och validator (`me.php`)</del>
2. <del>CSS och validator (`me.php`, `stylesheet.css`)</del>
3. <del>Header med logo och meny</del>
4. <del>PHP (`header.php`, `footer.php`)</del>
5. <del>En sida för redovisningar (`report.php`)</del>
6. <del>Snygga till och gör färdigt</del>

Hoppas att detta gav dig lite mersmak för dessa tekniker och hur de kan samverka när vi bygger webbplatser. I kommande kursmoment får vi mer tid att gå igenom teknikerna lite mer grundligt. I kursen kommer du ha en hel del nytta av kurslitteraturen. Många av svaren på dina frågor finner du där.

Fixa nu till din redovisningssida enligt instruktionen nedan och ladda upp din me-sida till driftsmiljön.

[INFO]
**Gör en katalogstruktur för kursen.**

Se till att spara varje kursmoment i en egen katalog. Då kan du alltid gå vidare med nästa kursmoment, utan risk att skriva över dina gamla filer. Den som rättar och ger feedback behöver ju tillgång till dina gamla filer.

Här är förslag på en katalogstruktur som fungerar bra.

```html
www/htmlphp/kmom01
            kmom02
            kmom03
            kmom04
            kmom05
            kmom06
            kmom10
```

Lycka till med resten av kursen nu! Nu vet du hur det fungerar.
[/INFO]


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.
2. Genomför momentets alla steg.
3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Beskriv vilket operativsystem du sitter på och vilken/vilka webbläsare du normalt använder. Berätta även vilken utvecklingsmiljö du använder (editor, sftp-klient, etc). Om du använder den som rekommenderas så räcker det att säga det.
4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.
5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
