---
author: mos
category: webbprogrammering
updated: "2013-05-23 15:31:37"
created: "2013-05-23 14:06:00"
...
Kodstandarder för webbprogrammeraren
==================================

Alla som kodat i grupp, eller läst någon annans kod, förstår vikten av att följa en kodstandard. En kodstandard är regler och riktlinjer som anger specifikt hur man döper variabler, funktioner, klasser och metoder samt var måsvingarna skall finnas och hur man tabbar in koden. Det är budorden som bestämmer hur din kod skall skrivas.

Vikten av att följa en kodstandard går inte underskatta, eller överskatta. Bara gör det.

<!--more-->

Att följa en kodstandard är ett steg som tar dig närmare att skriva den bra koden. Illustration från [xkcd.com/844](http://xkcd.com/844/).

[FIGURE src=http://imgs.xkcd.com/comics/good_code.png caption="Skriv kod snabbt, eller ordentligt, men följ iallafall en kodstandard."]



Några ledande kodstandarder att studera och följa {#kodstandard}
--------------------------------------------------------------------

Olika språk har olika kodstandard, olika företag likaså. Det enda du kan vara säker på är att din egen personliga kodningsstil är underordnad den valda kodstandarden. Tyck vad du vill men gilla läget, annars är du en belastning för arbetsgruppen.

Som webbutvecklare och webbprogrammerare behöver du följa olika kodningsstandarder för HTML, CSS, JavaScript, PHP och SQL. För att få en känsla för hur du bör skriva din kod så kan du studera kodningsstandarder för några av de mest kända opensource-projekten. Börja med att kika på de guidelines som gäller för Wordpress för [HTML](http://make.wordpress.org/core/handbook/coding-standards/html/), [CSS](http://make.wordpress.org/core/handbook/coding-standards/css/), [JavaScript](http://make.wordpress.org/core/handbook/coding-standards/javascript/) och [PHP](http://make.wordpress.org/core/handbook/coding-standards/php/). Fortsätt sedan med [Drupals kodstandard](http://drupal.org/coding-standards). Google har guidelines för [HTML och CSS](http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xml) samt [JavaScript](http://google-styleguide.googlecode.com/svn/trunk/javascriptguide.xml). Det skadar heller inte att studera de kodstandarder som följs av de [PHP klasser som ligger i PEAR-biblioteket](http://pear.php.net/manual/en/standards.php) och de [guidelines som används av Zend](http://framework.zend.com/manual/en/coding-standard.html).



Finns det någon kodstandard som följs i kurserna? {#kurserna}
--------------------------------------------------------------------

Skall jag vara riktigt ärlig så är det en blandning av befintliga standarder som används i kurserna. Det är också så att kodningsstandarden mellan kurserna kan skilja. Det är helt enkelt så att kurserna är utvecklade under en längre period och jag har valt att ändra min egen personliga kodningsstandard under resans gång. Ibland använder jag ett visst sätt att koda för jag anser att det är enklare och i sammanhanget mer pedagogiskt, men i andra fall så kan jag till och med frångå alla kodningsstandarder för jag anser att koden helt enkelt blir vackrare på ett visst sätt. Men, låt oss titta på de vanligaste varianterna som jag använder i min PHP-kod.



Formattering  {#formattering}
--------------------------------------------------------------------

###Hur stor intabbning? {#mellanslag}

Min **tabbstorlek är 2 mellanslag** och jag använder *soft tabs* [^1][^2][^3] vilket innebär att en tab ersätts av min texteditor med valt antal mellanslag. Det gör att min kod ser likadant intabbad ut oavsett vilken editor som visar den. Tabbstorlekten skiljer sig mellan olika editorer och det är också en vanlig inställning som användaren själv ändrar. Vanligast är tabbstorlekar om 2, 4 eller 8 mellanslag.


###Hur formattera med mellanslag och måsvingar? {#masvinge}

På följande sätt skriver jag måsvingarna och formatterar med mellanslag.

```php
function myfunc($a, $b) {

  if($a == 1) {
    ;
  }
  elseif($b == 1) {
    ;
  }

  return null;
}
```

I vissa fall när jag skriver egen kod så kan jag faktiskt skriva hela if-satsen på en rad. Detta är ju annars ett ytterst vanligt sätt att införa problem i sin kod [^4]. Men när jag gör det så är det oftast kontroller som görs överst i en funktion och jag gör det för att spara på antalet rader.

```php
function myfunc($a) {

  if($a == 1) return null;

  return true;
}
```


###Kommentarer {#kommentarer}

Framförallt så försöker jag använda [PHPDoc](http://en.wikipedia.org/wiki/PHPDoc). I övrigt så blandar jag med kommentarsstilarna `//` och `/*  */`.

```php
/**
 * This is a PHPDoc comment.
 *
 */
```


###PHP sluttag används ej {#phpsluttag}

I de fall då filen enbart innehåller PHP-kod så använder jag aldrig sluttagen `?>`. Den behövs inte och ställer enbart till problem genom att den kan införa tomma tecken vilket påbörjar utskriften vilket kan störa sessionen.

Följande felmeddelande är vanligt när man glömmer tomma tecken efter en avslutande PHP-tagg. 

> Warning: Cannot modify header information - headers already sent by (output started at /home/saxon/teachers/tek/mos/www/test/1.php:2) in /home/saxon/teachers/tek/mos/www/test/2.php on line 4

[Läs mer om felmeddelandet](http://db-o-webb.blogspot.se/2010/02/warning-cannot-modify-header.html).



Namngivning  {#namngivning}
--------------------------------------------------------------------

När det gäller namngivning så mixar jag [camelCase](http://en.wikipedia.org/wiki/CamelCase) med CamelCase (PascalCase eller *upper camel case*) med att använda [`_`](http://en.wikipedia.org/wiki/Underscore) för att avgränsa orden. På följande sätt mixar jag varianterna.

| Typ                     | Exempel           | camelCase | PascalCase | Underscore |
|-------------------------|-------------------|:---------:|:----------:|:----------:|
| Functionsnamn           | `getCurrentUrl()` |     x     |            |            |
| Klassnamn               | `CLydia`          |           |     x      |            |
| Interface               | `ISingleton`      |           |     x      |            |
| Controller class        | `CCBlog`          |           |     x      |            | 
| Model class             | `CMBlog`          |           |     x      |            |
| Funktion i template-fil | `render_view()`   |           |            |     x      |
| Variabelnamn            | `$someVariable`   |     x     |            |            |


Klassnamn börjar alltid med stort `C`, interface med stort `I`, kontroller med `CC` och modeller med `CM`. Filnamnen är samma som klassens namn följt av `.php`.

Vyer, eller template-filer, det vill säga filer som i huvudsak innehåller HTML och skrivbaserad PHP-kod som skriver ut innehåll på variabler namnges med `vy-namn.tpl.php`.



Kodgranskning {#kodgranskning}
--------------------------------------------------------------------

Kodgranskning, eller inspektion av kod, är ett vanligt sätt att sitta i grupp och kvalitetsgranska kod. Det är ofta en del av testfasen i ett programutvecklingsprojekt. Aktiviteten genomförs enklast genom att man skriver ut koden på papper, går hem och läser igenom den och kommer till ett möte, väl förberedd, där man tar upp de saker som inte stämmer mot de guidelines man använder. Egentligen är syftet med kodgranskning att tidigt se fel o gränssnitt och prestanda genom att identifiera undermåliga lösningar. I kodgranskningar kan man ofta finna problem som är svåra att testa sig fram till.

Om man väljer att använda verktyg som formatterar ens kod enligt den valda guidelinen så kan kodgranskningen fokusera på brister i koden och man slipper påpeka enkla saker som var måsvingar skall sitta och hur variabler skall namnges. I större projekt så är det nästan oumbärligt att tvinga formattering av kod. Det sparar tid.



Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Oavsett vilken kodstandard du väljer så se till att följa den. Var konsistent. Det är det absolut viktigaste.



###Gör som gruppen {#folj-gruppen}

Glöm inte, när du kodar i grupp så gäller gruppens gemensamma kodningsstandard. Din egen filosofi är oväsentlig så länge den inte är del av den av gruppen accepterade kodstandarden.



###Programmeringsprov allt vanligare som arbetsprov {#arbetsprov}

När du söker nytt jobb så blir det allt vanligare med programmeringsprov som arbetsprov. Det är ett bra sätt att visa upp vad man kan i problemlösning, kodning och att skriva bra kod. I såna fall är det ytterst viktigt att du har en konsistent kodningssätt så se till att redan nu göra ett medvetet val om vilken standard du avser att följa. Följ den sedan och var konsistent.



###Vad anser du? {#diskutera}

Detta om kodstandarder är en fråga som vanligen ger upphov till diskussioner. Vad tycker du?

[Diskutera denna artikel och dess innehåll i forumet](t/1304).



Revisionshistoria {#revision}
------------------------------

<span class='revision-history' markdown='1'>
2013-05-23 (C, mos) Kopierad till dbwebb och utökad från blogspot-versionen.  
2010-10-31 (B, mos) Uppdaterad.  
2009-10-19 (A, mos) [Första utgåvan på db-o-webb.blogspot.com](http://db-o-webb.blogspot.se/2009/10/kodstandard-for-php.html).  
</span>



Referenser {#referenser}
------------------------------

[^1]: [Tabs are evil](http://www.emacswiki.org/emacs/TabsAreEvil).

[^2]: [Never use hard tabs](http://opensourcehacker.com/2012/05/13/never-use-hard-tabs/).

[^3]: [Tabs versus Spaces: An Eternal Holy War](http://www.jwz.org/doc/tabs-vs-spaces.html).

[^4]: [Single statement if block - braces or no?](http://programmers.stackexchange.com/questions/16528/single-statement-if-block-braces-or-no).
