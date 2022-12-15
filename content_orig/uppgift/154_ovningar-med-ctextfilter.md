---
author: sylvanas
category: php
revision:
  "2015-04-13": (C, mos) la till git framför clone på alternativ 1.
  "2015-01-13": (B, mos) Flyttad från textdokument till dbwebb.
  "2014-12-04": (A, jane) Skapad för campus oophp.
updated: "2015-04-13 08:00:03"
created: "2015-01-13 11:08:09"
...
Övningar med CTextFilter
==================================

PHP-klassen CTextFilter är en klass som hjälper dig att skriva texter på ett effektivt sätt för webben. Klassen erbjuder ett antal metoder som du kan använda för att formatera dina texter, även utan att skriva ren HTML-kod.

I denna övning kommer du igång med att använda klassen och du får förståelse för vad formatering av texter innebär och hur det går till.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du bör ha gjort, eller ha förkunskaper som motsvarar, artikeln ["Lagra innehåll i databas för webbsidor och bloggposter"](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter). 

Om du vill ha förklaringar, tips och ledtrådar så finner du dem i nämnda artikel.



Förberedelser {#forbered}
-----------------------

Det finns två sätt att komma igång med `CTextFilter`, läs igenom båda och välj sedan en väg.



###Alternativ 1 {#alt1} 

Ta de olika bitarna och sätt samman.
 
Hämta hem och spara [källkoden till klassen `CTextFilter`](https://github.com/mosbth/Anax-oophp/tree/master/src/CTextFilter
). 
 
Klona PHP-Markdown i samma katalog som du sparade `CTextFilter.php`.

```bash
$ git clone https://github.com/michelf/php-markdown.git
```

Det finns en [sidkontroller som visar hur du använder koden](https://github.com/mosbth/Anax-oophp/blob/master/webroot/textfilter.php). Hämta hem den, spara, modifiera koden till din omgivning och öppna den sedan i en webbläsare för att testköra.


 
###Alternativ 2 {#alt2}

Klona [Anax-oophp](https://github.com/mosbth/Anax-oophp), inklusive submoduler.

```bash
git clone --recursive https://github.com/mosbth/Anax-oophp.git
```

Öppna sedan filen `webroot/textfilter.php` i din webbläsare.



###Testa {#test}

Du kan [testa exempelkoden här](http://www.student.bth.se/~mosstud/kod-exempel/Anax-oophp-sub/webroot/textfilter.php), så ser du hur det skall se ut när det fungerar.



###Integrera med ditt Anax {#integrera}

Integrera `CTextFilter` i din Anax och skapa en sidkontroller `testfilter.php`, för att komma igång snabbt så kan din `testfilter.php` vara en kopia av den `textfilter.php` som du precis testat.

Det finns så kallade doc-comments till varje metod i `CTextFilter`. När du ska läsa på vad en av dessa metoder gör, så läs alltid först och främst denna kommentar till metoden som beskriver vad den gör.

Övningarna kommer inte att gå genom shortCode(), då det inte behövs eller ingår i kursmomentet.



Övningar {#ovning}
-----------------------


###1. `CTextFilter::bbcode2html()` {#o1}

1. Läs på om vad BBCode är och hur man skriver det.

1. Läs på vad metoden `CTextFilter::bbcode2html()` gör. Läsa ut vilka sorters BBCode den kan hantera.

1. I `testfilter.php`, lägg i variablen `$bbcodetest` en text som innehåller minst en typ av BBCode som du vet `CTextFilter` kan hantera.

1. Använd `bbcode2html()` på `$bbcodetest` och lägg till resultatet på mallens main (t.ex `$anax["main"]`).

1. Vad blir resultatet i form av HTML för det textstycke du filtrerade med BBCode? Studera hur respektive BBCode blir till HTML.



###2. `CTextFilter::makeClickable()` {#o2}

1. [Läs om `makeClickable` och dess syfte](http://dbwebb.se/coachen/lat-php-funktion-make-clickable-automatiskt-skapa-klickbara-lankar).

1. Läs kort över vad `CTextFilter::makeClickable()` gör (läs dess doc-kommentar).

1. I `testfilter.php`, lägg i variablen `$linktest` en text som innehåller minst en URL.

1. Använd `makeClickable()` på `$linktest` och lägg till resultatet på mallens main (t.ex `$anax["main"]`).

1. Vad blir resultatet i form av HTML för det textstycke du filtrerade med `makeClickable`? Studera hur respektive sträng blir till en HTML-länk.



###3. `CTextFilter::nl2br()` {#o3}

1. Läs på om vad [`nl2br()`](http://php.net/manual/en/function.nl2br.php) gör i PHP.

1. Läs om vad `CTextFilter::nl2br()` gör.

1. I `testfilter.php`, lägg i variablen `$newlinetest` en text som innehåller minst tre nya rader.

1. Använd `CTextFilter::nl2br()` på `$newlinetest` och lägg till resultatet på mallens main (t.ex `$anax["main"]`).

1. Vad blir resultatet i form av HTML för det textstycke du filtrerade med nl2br? Studera hur HTML-koden skiljer sig från ursprungstexten.



###4. `CTextFilter::markdown()` {#o4}

1. Läs på om vad Markdown är och hur det skrivs.

1. I `testfilter.php`, lägg i variablen `$markdowntest` en text som innehåller två olika headers och en mening med ett ord i fetstil.

1. Använd `CTextFilter::markdown()` på `$markdowntest` och lägg till resultatet på mallens main (t.ex `$anax["main"]`).

1. Vad blir resultatet i form av HTML för det textstycke du filtrerade med markdown? Studera hur HTML-koden skiljer sig från ursprungstexten.

*Not. Denna -- och alla andra artiklar på dbwebb.se -- är skrivna i Markdown.*



###5. `CTextFilter::doFilter()` {#o5}

1. Läs kort över vad `CTextFilter::doFilter()` gör.

1. Vilka filter finns tillgängliga att ange?

1. Använd `CTextFilter::doFilter()` och använd filtret "markdown" på texten i `$markdowntest` och lägg till resultatet på mallens main (t.ex `$anax["main"]`).

1. Vilket filter har alltså applicerats på texten, nu via `doFilter()`?



###6. Multipla filter med `CTextFilter::doFilter()` {#o6}

1. Gå till koden för `CTextFilter::doFilter()`. Hur kan man ange flera filter?

1. I `testfilter.php`, lägg i variabeln `$filtertest` en mening som innehåller både markdown och en URL.

1. Använd `CTextFilter::doFilter()` och använd filtret "markdown,clickable" på texten i `$filtertest` och lägg till resultatet på mallens main (t.ex `$anax["main"]`).

1. Vilka filter har alltså applicerats på texten, via `doFilter()`?



Extrauppgift {#extra}
-----------------------

1. Träna upp din potential som programmerare i öppen källkod genom att leta buggar eller hitta förbättringspotential i klassen `CTextFilter`? Skapa en [issue på repot på GitHub](https://github.com/mosbth/Anax-oophp/issues) och föreslå förbättringar.

2. Kan du genom att studera koden få kläm på hur shortcoden för *figure* fungerar?

3. Bygg ut klassen `CTextFilter` och lägg till filtret som beskrivs i tipset ["Förbättra ditt skrivande på webben med ett PHP-bibliotek för typografi"](coachen/forbattra-ditt-skrivande-pa-webben-med-ett-php-bibliotek-for-typografi).

4. Bygg ut klassen `CTextFilter` och använd [HTMLPurifier som ett filter](http://dbwebb.se/t/287) för att filtrera och säkra upp HTML-koden.



Tips från coachen {#tips}
-----------------------

**Lycka till och hojta till i forumet om du behöver hjälp!**




