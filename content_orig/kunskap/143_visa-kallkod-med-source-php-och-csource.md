---
author: mos
category: php
revision:
  "2013-09-23": (B, mos) Ändrade så att modulen i Anax visar källkoden för .. istället
    för ., så att all källkod visas i Anax.
  "2013-07-04": (A, mos) Första utgåvan i samband med CSource v1.0.0.
updated: "2013-09-23 15:48:42"
created: "2013-07-04 10:32:46"
...
Visa källkod med source.php och CSource
==================================

För att hjälpa varandra med webbprogrammering och felsökning så behöver man ofta tillgång till källkoden på serversidan. Då går felsökningen mycket fortare. För att visa källkoden på serversidan så använder vi ett PHP-skript som heter `source.php`. Det har funnits med ett tag, i olika versioner, och nu har det fått en uppfräschning och ett [eget repository på GitHub](https://github.com/mosbth/csource). 

<!--more-->

Det finns ett par alternativa sätt att komma igång med `source.php` för din egen del. Läs vidare och se vilket sätt som passar dina behov.



Den snabba vägen med source.php {#snabb}
-------------------------------

[Hämta koden](source) och spara som en fil `source.php`. Lägg filen i den katalog där du vill visa din källkod. Peka webbläsaren på filen. Klart.

Du kan nu visa filerna som ligger i samma katalog och alla filer som ligger i underkataloger. Du kan länka direkt till en fil eller till och med till en viss rad i en fil. Kopiera länken och skicka till din kompis och ni har nu samma vy på din källkod på serversidan.

[FIGURE src=/img/snapshot/csource-style-php.png?w=w1 caption="Enkelt och snabbt att komma igång med att visa källkod med `source.php`."]

Här kan du [testa hur det kan se ut](kod-exempel/display-and-browse-files-using-php/source.php).



Inkludera CSource i din egen kod {#inkludera}
-------------------------------

I den nya versionen (från v1.0.0 och framåt) av `source.php`, eller *CSource* som jag numer kallar den, är koden uppdelad i delar. Det finns en klassfil `CSource.php` som innehåller kärnan av koden. Det finns en stylesheet `source.css` och det finns en exempel-fil `example.php` som visar hur det fungerar när man inkluderar allt i en webbsida.

Det finns ett färdigt exempel som du kan [studera och testa hur det kan se ut](kod-exempel/display-and-browse-files-using-php/).

[FIGURE src=/img/snapshot/csource-example.png?w=w1 caption="Ett exempel där CSource är inkluderat i en webbsida."]

All kod finns på [GitHub CSource](https://github.com/mosbth/csource) där du kan kika på det eller klona för att göra din egen förbättrade variant av koden. Skicka mig en [pull-request](https://help.github.com/articles/using-pull-requests) om du gjort någon förbättring som du tycker borde in i koden.



Visa källkod i Anax som modul {#modul}
--------------------------------------

[Anax är en webbmall](kunskap/anax-en-hallbar-struktur-for-dina-webbapplikationer) som vi använder här, låt oss se hur vi kan inkludera CSource som en Anax modul, in i Anax. Jag gör det på en Unix-maskin, men du förstår säkert principen för hur du gör på en Windows-maskin eller motsvarande.

Följ mig.

Jag ställer mig i rooten min Anax-katalog och clonar CSource rakt in i en underkatalog csource. Lite busigt så där. Vill du ladda ned filerna på annat sätt så gör du det via [repositoryt för CSource](https://github.com/mosbth/csource), till exempel som [zip-fil](https://github.com/mosbth/csource/archive/master.zip).

```bash
git clone https://github.com/mosbth/csource.git
```

Jag börjar med att skapa en mapp för Anax modulen `src/CSource` och kopierar in filen `csource/CSource.php` i den mappen. Jag kopierar även in filerna för README och LICENSE, det är god kotym / krav när man använder någon annans programvara och kan tänka sig att återpublicera den på till exempel GitHub så det är lika bra att vi gör rätt från början.

```bash
mkdir src/CSource
cp csource/CSource.php src/CSource/
cp csource/README.md  src/CSource/
cp csource/LICENSE.txt  src/CSource/
```

Nu kopierar jag in stylesheeten `csource/source.css` till `webroot/css`.

```bash
cp csource/source.css webroot/css/
```

Bra, då är det bara exempelsidan kvar. Jag skapar en ny sida i min webbroot och utgår från en av de som jag redan har. Jag modifierar den och lägger in följande kod för att visa källkoden med CSource.

```php
// Add style for csource
$anax['stylesheets'][] = 'css/source.css';

// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));

// Do it and store it all in variables in the Anax container.
$anax['title'] = "Visa källkod";
$anax['main'] = "<h1>Visa källkod</h1>\n" . $source->View();
```

Så här kan det se ut när du är klar.

[FIGURE src=/img/snapshot/csource-anax.png?w=w1 caption="CSource visar källkoden som en integrerad del i Anax."]

Du kan [testa och se källkoden](oophp/me/anax-oophp/webroot/source.php?path=source.php) för att se hur resultatet blev.



Vanliga frågor -- FAQ {#faq}
--------------------------------------

Här följer svar på några av de vanligaste frågorna kring CSource och `source.php`. [Fråga i forumet](t/1357) om du har fler frågor, funderingar eller förbättringsförslag.



###Du saknar stylen {#saknar-style}

Alla radnummer visas och sedan visas själva innehållet i filen. Det beror på att stylen från `source.css` saknas. Kontrollera att du inkluderat den på rätt sätt.

[FIGURE src=/img/snapshot/csource-saknar-style.png?w=w1 caption="Stylesheeten saknas och hindrar CSource från att visas korrekt."]





