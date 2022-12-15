---
author:
    - mos
category:
    - php
    - kurs oophp
    - anax
revision:
    "2019-05-06": "(D, mos) Länkar i tips från coachen som hjälp."
    "2018-05-09": "(C, mos) Lade till video som intro."
    "2018-04-30": "(B, mos) Genomgången inför oophp-v4."
    "2017-04-18": "(A, mos) Första utgåvan."
...
Skapa en klass för textfiltrering och formattering (v2)
==================================

Samla koden för textfiltrering och formattering i en egen klass som du kan använda i din webbplats för att filtrera/formattera textbaserat innehåll från databasen.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Lagra innehåll i databas för webbsidor och bloggposter (v2)](kunskap/lagra-innehall-i-databas-for-webbsidor-och-bloggposter-v2)".



Introduktion och förberedelse {#intro}
-----------------------

Gå igenom följande steg för att förbereda dig inför uppgiften.

Du kan se hur jag jobbar igenom stegen i videoserien "[Uppgiften "Skapa en klass för textfiltrering och formattering (v2)" kursen oophp](https://www.youtube.com/playlist?list=PLKtP9l5q3ce8Wj4EwRHrmikydfMJRjh-N)".

[YOUTUBE src="yWOmV60KMfM" list="PLKtP9l5q3ce8Wj4EwRHrmikydfMJRjh-N" width=700 caption="Mikael visar hur du jobbar igenom vissa steg för att komma igång med uppgiften."]

Tanken är att du skall bygga en klass `TextFilter` som kan filtrera/formattera en textmassa.



### Använda klassen TextFilter {#anvanda}

Du kan alltså ta en text som du till exempel har sparat i databasen och låta klassen `TextFilter` parsa texten enligt vissa regler, eller filter, eller formatterar, hur man nu vill benämna det.

Här är en översikt av hur din klass kan se ut, se även kursrepot `example/textfilter`.

Döp din klass till `MyTextFilter` eller något annat, annars riskerar den att krocka med den befintliga klassen `Anax\TextFilter\TextFilter` eftersom autoloadern inte kan skilja dem åt då både vendor Mos och Anax är mappade mot katalogen `src/`.


```php
namespace Mos\TextFilter;

/**
 * Filter and format text content.
 */
class MyTextFilter
{
    /**
     * @var array $filters Supported filters with method names of 
     *                     their respective handler.
     */
    private $filters = [
        "bbcode"    => "bbcode2html",
        "link"      => "makeClickable",
        "markdown"  => "markdown",
        "nl2br"     => "nl2br",
    ];



    /**
     * Call each filter on the text and return the processed text.
     *
     * @param string $text   The text to filter.
     * @param array  $filter Array of filters to use.
     *
     * @return string with the formatted text.
     */
    public function parse($text, $filter) { }



    /**
     * Helper, BBCode formatting converting to HTML.
     *
     * @param string $text The text to be converted.
     *
     * @return string the formatted text.
     */
    public function bbcode2html($text) { }



    /**
     * Make clickable links from URLs in text.
     *
     * @param string $text The text that should be formatted.
     *
     * @return string with formatted anchors.
     */
    public function makeClickable($text) { }



    /**
     * Format text according to Markdown syntax.
     *
     * @param string $text The text that should be formatted.
     *
     * @return string as the formatted html text.
     */
    public function markdown($text) { }



    /**
     * For convenience access to nl2br formatting of text.
     *
     * @param string $text The text that should be formatted.
     *
     * @return string the formatted text.
     */
    public function nl2br($text) { }
}
```

Det var en översikt av hur du kan skapa klassen och dess metoder. Tanken är att det finns en metod `parse($text, $filter)` som anropar respektive filter.

Själva användningen kan se ut så här.

```php
$filter = new \Mos\TextFilter\MyTextFilter();
$text = "En [b]fet[/b] moped.";
$html = $filter->parse($text, ["bbcode"]);
```

Den resulterande texten bör bli `"En <b>fet</b> moped."`.



### Metoden `parse()` {#parse}

Metoden `parse()` är ett API till hela klassen. Tanken är att det är den enda metoden som användaren behöver anropa. Man skickar med texten och en array av filter som skall processas.

```php
/**
 * Call each filter on the text and return the processed text.
 *
 * @param string $text   The text to filter.
 * @param array  $filter Array of filters to use.
 *
 * @return string with the formatted text.
 */
public function parse($text, $filter) { }
```

Internt i klassen så översätts varje filter till ett metodanrop som bearbetar texten.

Du kan uppdatera metodens DocBlock om du hellre vill att argumentet `$filter` skall vara av typen sträng för att hantera en komma-separerad lista av filter.
 


### Metoden `bbcode2html()` {#bbcode}

Metoden `bbcode2html()` matchar filtret `bbcode` och översätter texten till HTML enligt de BBCode regler som stöds.

```php
/**
 * Helper, BBCode formatting converting to HTML.
 *
 * @param string $text The text to be converted.
 *
 * @return string the formatted text.
 */
public function bbcode2html($text) { }
```

Du kan se ett exempel på en sådan här funktion i artikeln "[Reguljära uttryck i PHP ger BBCode formattering](coachen/reguljara-uttryck-i-php-ger-bbcode-formattering)".



### Metoden `makeClickable()` {#makeClickable}

Metoden `makeClickable()` matchar filtret `link` och översätter delar av texten till klickbara länkar. Koden använder sig av ett reguljärt uttryck för att hitta de text-delar som ser ut som en klickbar länk.

```php
/**
 * Make clickable links from URLs in text.
 *
 * @param string $text The text that should be formatted.
 *
 * @return string with formatted anchors.
 */
public function makeClickable($text) { }
```

Du kan se ett exempel på en sådan här funktion i artikeln "[Låt PHP-funktion make_clickable() automatiskt skapa klickbara länkar](coachen/lat-php-funktion-make-clickable-automatiskt-skapa-klickbara-lankar)".



### Metoden `markdown()` {#markdown}

Metoden `markdown()` matchar filtret `markdown` och översätter texten enligt syntaxen Markdown. Funktionen använder sig av en extern modul för att utföra översättningen.

```php
/**
 * Format text according to Markdown syntax.
 *
 * @param string $text The text that should be formatted.
 *
 * @return string as the formatted html text.
 */
public function markdown($text) { }
```

Du kan se ett exempel på en sådan här funktion i artikeln "[Skriv för webben med Markdown och formattera till HTML med PHP (v2)](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php-v2)".



### Metoden `nl2br()` {#nl2br}

Metoden `nl2br()` matchar filtret `nl2br` och lägger till ett HTML-element `<br>` för varje `\n` som finns i texten. Funktionen som är tänkt att användas är en inbyggd PHP-funktion.

```php
/**
 * For convenience access to nl2br formatting of text.
 *
 * @param string $text The text that should be formatted.
 *
 * @return string the formatted text.
 */
public function nl2br($text) { }
```

Läs på hur du använder den [inbyggda PHP-funktionen `nl2br()`](http://php.net/manual/en/function.nl2br.php).



Krav {#krav}
-----------------------

1. Din klass skall stödja filter för `bbcode`, `link`, `markdown`, `nl2br`.

1. Din klass skall innehålla en metod `parse()` som tar text och filter som inparametrar, bearbetar texten enligt angivna filter i sagd ordning och slutligen returnerar den modifierade texten.

1. Gör en (eller flera) test routes på din redovisa sida som visar hur du formatterar innehåll på de sätt som skall stödjas. Lägg en länk i navbaren så man kan nå din testsida.

1. Validera och publicera din kod.



Extrauppgift {#extra}
-----------------------

Om du har tid, lust och energi så kan du bygga vidare på din textfilter-klass, här är ett par förslag.

1. Din klass kan stödja ett filter `strip` som gör `strip_tags()` på texten.

1. Din klass kan stödja ett filter `esc` som gör `htmlentities()` på texten.

<!-- purify -->



Tips från coachen {#tips}
-----------------------

Om du vill kika på en Anax modul som gör ungefär liknande som du gör i denna uppgiften, så kan du titta på [`anax/textfilter`](https://github.com/canax/textfilter).

Se till att du har bytt namn på klassen TextFilter så att den inte krockar med den befintliga klassen `Anax\TextFilter\TextFilter`, se även [forumtråd](t/7792).

Det finns ett foruminlägg som visar hur du löser felmeddelandet "[Avoid using static access to class `\Michelf\MarkdownExtra`](t/7829)".

Lycka till och hojta till i forumet om du behöver hjälp!
