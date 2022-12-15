---
author: mos
category: php
updated: "2013-09-24 13:20:56"
created: "2013-07-02 14:16:54"
...
Skapa en dynamisk navbar / meny med PHP
==================================

Varje webbplats har en meny, en navigeringsbar. Det är behändigt att skapa menyn med PHP och låta koden hålla reda på vilken sidan man besöker. Låt oss snabbt kika på grunderna i hur man med PHP kan generera HTML till en meny som visar nuvarande sida.

<!--more-->

För ett tag sedan skrev jag en tutorial om ["Create a dynamic menu / navigation bar with PHP"](kod-exempel/dynamic_php_menu/). Jag kikade igenom den och samma principer gäller. Är det första gången du skapar en meny med PHP så bör du utgå från tutorialen som tröskar igenom grunderna.

Som en liten programmeringsövning så utgick jag från tutorialen och skapade en lite mer komprimerad variant för min egen del som jag tänker använda i ett projekt. Här ser du resultatet i form av kod och ett kodexempel.

**Definiera menyn i en array.**

```php
/**
 * Define the menu as an array
 */
$menu = array(
  'class' => 'nb-plain',
  'items' => array(
    'home'  => array('text'=>'Home',   'url'=>'index.php',  'title' => 'Some title 1'),
    'test'  => array('text'=>'Test',   'url'=>'test.php',   'title' => 'Some title 2'),
    'test2' => array('text'=>'Test 2', 'url'=>'test2.php',  'title' => 'Some title 3'),
  ),
  ),
  'callback_selected' => function($url) {
    if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
      return true;
    }
  }
);
```

Funktionen för att kolla vilken sida som är nuvarande sida får man modifiera beroende på vilken taktik man har för att visa sidor. I mitt fall visar jag PHP-sidorna direkt så länken är samma som filens namn.

**En funktion för att generera HTML för menyn.**

```php
/**
 * Create a navigation bar / menu for the site.
 *
 * @param string $menu for the navigation bar.
 * @return string as the html for the menu.
 */
function get_navbar($menu) {
  $html = "<nav>\n<ul class='{$menu['class']}'>\n";
  foreach($menu['items'] as $item) {
    $selected = $menu['callback_selected']($item['url']) ? " class='selected' " : null;
    $html .= "<li{$selected}><a href='{$item['url']}' title='{$item['title']}'>{$item['text']}</a></li>\n";
  }
  $html .= "</ul>\n</nav>\n";
  return $html;
}
```

Så där ja, jag skapade ett [litet kodexempel](kod-exempel/dynamic-navbar-menu-with-php-version-2) för att visa hur det ser ut när det fungerar i ett sammanhang tillsammans med en liten stylesheet. Fördelen med en sådan här meny är att den går att konfigurera helt och hållet i arrayen. Det ser jag som smidigt.

Fråga, kommentera eller föreslå förbättringar i forumet där jag skapat [en egen tråd för detta tips](t/1355).
