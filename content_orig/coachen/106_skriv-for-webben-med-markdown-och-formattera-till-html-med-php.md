---
author: mos
category: php
updated: "2013-04-29 20:42:13"
created: "2013-04-29 20:40:53"
...
Skriv för webben med Markdown och formattera till HTML med PHP
==================================

Efter att länge sökt efter det ultimata sättet att skriva texter för webben så ramlade jag över Markdown och nu behöver jag inte längre leta. Markdown är en syntax för att skriva text som går att läsa i en vanlig textfil och som via en programvara formateras om till HTML. 

<!--more-->

[WARNING]
**Nyare artikel finns**

Du läser en uppdaterad variant av denna artikel på "[Skriv för webben med Markdown och formattera till HTML med PHP (v2)](coachen/skriv-for-webben-med-markdown-och-formattera-till-html-med-php-v2)".
[/WARNING]

Markdown-syntax och en PHP-parser för att formatera texten till HTML, är nu en del av mitt vardagliga arbetssätt. I stort sett all text på webbplatsen dbwebb.se är skriven enligt syntaxen i Michel Fortin's PHP Markdown Extra.


[Markdown syntax och dess första konverteringsverktyg i perl](http://daringfireball.net/projects/markdown/) togs fram av John Gruber som också beskriver syntaxen på ursprungssidan för Markdown. Målet var att få texten så läsbar som möjligt i sitt orginalformat. Michel Fortin portade konverteringsverktyget till PHP och gjorde lite tillägg med ytterligare formateringsfunktioner och paketerade detta som [PHP Markdown](http://michelf.ca/projects/php-markdown/) och [PHP Markdown Extra](http://michelf.ca/projects/php-markdown/extra/). 

[PHP Markdown och PHP Markdown Extra finns på GitHub](https://github.com/michelf/php-markdown), förpackade i ett och samma repository.

```bash
git clone git://github.com/michelf/php-markdown.git
```

För att förenkla din egen kod så kan du samla anropen till PHP Markdown i en funktion. Det ger ett renare API mot koden för PHP Markdown och det blir lättare om den byter sitt gränssnitt.

```php
use \Michelf\MarkdownExtra;

/**
 * Format text according to Markdown syntax.
 *
 * @param string $text the text that should be formatted.
 * @return string as the formatted html-text.
 */
function markdown($text) {
  require_once(__DIR__ . '/php-markdown/Michelf/Markdown.php');
  require_once(__DIR__ . '/php-markdown/Michelf/MarkdownExtra.php');
  return MarkdownExtra::defaultTransform($text);
}
```

Testa ett exempelprogram som visar hur du kan [jobba med PHP Markdown](kod-exempel/start_using_php_markdown/).

Nu kan du börja skriva dina texter för webben enligt Markdown syntax, inklusive de utökningar som finns i PHP Markdown Extra. Det blir text som är lätt att läsa i sitt orginalformat, smidig att skriva och skapar bra HTML. Du kan inkludera HTML-element om du behöver mer avancerade konstruktioner som inte stöds i Markdown.

Testa och du kommer troligen bli fast likt jag. 

**Dagens tips**, lär dina kollegor att skriva i Markdown och bli av med den skräpiga HTML-kod som ofta genereras av WYSIWYG-editorerna.
