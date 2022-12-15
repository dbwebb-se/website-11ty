---
author:
    - mos
category:
    - php
    - textfilter
revision:
    "2018-10-15": "(C, mos) Ändrade return-satsen som gav fel HTMl-kod."
    "2018-04-30": "(B, mos) Uppdaterat testprogram i kursrepot för oophp."
    "2013-04-29": "(A, mos) Första versionen."
...
Låt PHP-funktion make_clickable() automatiskt skapa klickbara länkar
==================================

Har du texter som innehåller länkar till webbplatser och du vill automatiskt göra dessa till klickbara HTML-länkar? Då kan en funktion som `make_clickable()` hjälpa dig.

<!--more-->

PHP-funktionen `make_clickable()` är en funktion som tar en text som inparameter, `$text`. I funktionen körs texten genom ett reguljärt utryck som letar reda på alla delar i texten som ser ut som en länk, det vill säga att den börjar på *http:* eller *https:*. Dessa delar görs klickbara genom att de omringas med ett anchor-element, HTML-elementet `<a></a>`.

**Orginaltext:**

> Detta är en länk som kan vara klickbar http://dbwebb.se/coachen.

När ovanstående text körs genom funktionen `make_clickable()` så kommer resultatet att bli enligt nedan.

**Modifierad text:**

> Detta är en länk som kan vara klickbar <a href='http://dbwebb.se/coachen'>http://dbwebb.se/coachen</a>.

Så här ser källkoden ut för funktionen. 

```php
/**
 * Make clickable links from URLs in text.
 *
 * @param string $text the text that should be formatted.
 *
 * @return string the formatted text.
 */
function makeClickable($text)
{
    return preg_replace_callback(
        '#\b(?<![href|src]=[\'"])https?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
        function ($matches) {
            return "<a href=\"{$matches[0]}\">{$matches[0]}</a>";
        },
        $text
    );
}
```

Det finns ett exempel som du kan testa i kursrepot för [oophp under example/textfilter](https://github.com/dbwebb-se/oophp/tree/master/example/textfilter). Öppna din webbläsare mot filen `htdocs/clickable.php`.

Det ser ut så här.

[FIGURE src=image/snapvt18/clickable-formatter.png?w=w3 caption="Kodexempel som visar hur funktionen makeClickable fungerar."]

Du kan ställa frågor om funktionen i  [forumtråden där flera bidrog till funktionen `make_clickable()`](t/254) genom att modifiera det reguljära uttrycket som från början hämtades från källkoden i Wordpress.
