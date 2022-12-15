---
author:
    - mos
category:
    - php
    - markdown
    - textfilter
revision:
    "2018-04-30": "(C, mos) Uppdaterat testprogram i kursrepot för oophp."
    "2017-04-18": "(B, mos) Uppdaterad med installation via composer."
    "2013-04-29": "(A, mos) Första versionen"
...
Skriv för webben med Markdown och formattera till HTML med PHP (v2)
==================================

Markdown är ett ofta använt sätt för att låta en användare skriva texter som är läsbara i råformat men enkelt kan formatteras till HTML.

<!--more-->

[Syntaxen för Markdown](http://daringfireball.net/projects/markdown/) och dess första konverteringsverktyg (perl) togs fram av John Gruber som också beskriver syntaxen på ursprungssidan för Markdown. Målet var att få texten så läsbar som möjligt i sitt orginalformat.

En av de "Markdown till HTML formatterare" som finns är [Michel Fortin's PHP Markdown](https://michelf.ca/projects/php-markdown/). Michel har även skrivit en [modul SmartyPants](https://michelf.ca/projects/php-smartypants/) för hantering av typografiska element.

Du kan installera PHP Markdown via composer.

```bash
$ composer require michelf/php-markdown
```

Du kan nu lägga till en egen funktion för att formattera din text till Markdown, som jag gör här i form av en vanlig funktion.

```php

use \Michelf\Markdown;

/**
 * Helper, Markdown formatting converting to HTML.
 *
 * @param string text The text to be converted.
 *
 * @return string the formatted text.
 */
function markdown($text)
{
    return Markdown::defaultTransform($text);
}
```

Om du vill testa så har jag en [text i Markdown](https://github.com/dbwebb-se/oophp/tree/master/example/textfilter/text/sample.md) som du kan låna.

Det finns egentligen ett helt exempel som du kan testa i kursrepot för [oophp under example/textfilter](https://github.com/dbwebb-se/oophp/tree/master/example/textfilter). Du behöver göra en `composer install` och sedan kan du öppna din webbläsare mot filen `htdocs/markdown.php`.

Resultatet kan se ut så här.

[FIGURE src=image/snapvt18/markdown-formatter.png?w=w3 caption="Utskriften av testprogrammet för Markdown."]

Nu kan du börja skriva dina texter för webben enligt Markdown syntax. Det blir text som är lätt att läsa i sitt orginalformat, smidig att skriva och skapar bra HTML. Du kan fortsätta skriva HTML-element inuti din Markdown-text om du behöver mer avancerade konstruktioner som inte stöds i Markdown.

Det finns en tråd i forumet där du kan [ställa frågor eller bidra med tips och trix](t/6436) rörande tipset.
