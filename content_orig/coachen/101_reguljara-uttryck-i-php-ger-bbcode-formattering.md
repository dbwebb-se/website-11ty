---
author:
    - mos
category:
    - php
    - textfilter
revision:
    "2018-04-30": "(B, mos) Uppdaterat testprogram i kursrepot för oophp."
    "2013-02-25": "(A, mos) Första versionen."
...
Reguljära uttryck i PHP ger BBCode formattering
==================================

BBCode är ett vanligt sätt att låta användaren formattera inlägg och kommentarer. Det ger en bättre säkerhet än om användaren kan använda HTML direkt. Du kan skriva en enkel BBCode formatterare som en PHP-funktion, ett kort reguljärt utryck hjälper dig att ersätta BBCode toknen mot dess HTML ekvivalenter.

<!--more-->

Du kan återfinna BBCode i forum eller kommentarssystem. Läs mer om [BBCode på Wikipedia](http://sv.wikipedia.org/wiki/BBCode).

Så här kan en funktion se ut som använder sig av ett reguljärt uttryck för att formattera text enligt BBCode till HTML.

```php
/**
 * Helper, BBCode formatting converting to HTML.
 *
 * @param string text The text to be converted.
 *
 * @returns string the formatted text.
 */
function bbcode2html($text)
{
    $search = [
        '/\[b\](.*?)\[\/b\]/is',
        '/\[i\](.*?)\[\/i\]/is',
        '/\[u\](.*?)\[\/u\]/is',
        '/\[img\](https?.*?)\[\/img\]/is',
        '/\[url\](https?.*?)\[\/url\]/is',
        '/\[url=(https?.*?)\](.*?)\[\/url\]/is'
    ];

    $replace = [
        '<strong>$1</strong>',
        '<em>$1</em>',
        '<u>$1</u>',
        '<img src="$1" />',
        '<a href="$1">$1</a>',
        '<a href="$1">$2</a>'
    ];

    return preg_replace($search, $replace, $text);
}
```

Det finns ett exempel som du kan testa i kursrepot för [oophp under example/textfilter](https://github.com/dbwebb-se/oophp/tree/master/example/textfilter). Öppna din webbläsare mot filen `htdocs/bbcode.php`.

Det ser ut så här.

[FIGURE src=image/snapvt18/bbcode-formatter.png?w=w3 caption="Kodexempel som visar hur BBCode fungerar."]

Du kan ställa frågor i forumet i inlägget [funktion för BBCode formattering](t/288).
