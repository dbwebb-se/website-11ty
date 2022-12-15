---
author: mos
category: php
revision:
  "2014-10-17": (B, mos) Uppdaterad funktionen mer kommentarer och stöd för klasser
    på meny-element efter förslag av foikila.
  "2013-09-26": (A, mos) Första versionen.
updated: "2014-10-17 18:39:36"
created: "2013-09-24 11:17:35"
...
Skapa en dynamisk navbar / meny, med undermeny, via PHP
==================================

Varje webbplats har en meny, en navigeringsbar, och ibland finns det behov av undermenyer. Det är smidigt att hantera menyn med PHP, att skapa menyn med hjälp av en array i PHP och sedan generera menyn med en PHP-funktion. Dessutom kan PHP användas för att hålla koll på vilket menyval som är aktivt. Men hur ser en sådan här struktur ut?

<!--more-->

Det finns ett tidigare tips från coachen som handlar om att ["Skapa en dynamisk navbar / meny med PHP"](coachen/skapa-en-dynamisk-navbar-meny-med-php), det visar grunderna men stödjer inte undermenyer. Strukturen för en undermeny kan skapas i ren HTML och CSS, det visades i ett tips från coachen som hette ["En navbar med drop-down meny i ren HTML och CSS"](coachen/en-navbar-med-drop-down-meny-i-ren-html-och-css). Det är för att stödja en sådan struktur på undermeny som jag nu vill uppgradera min PHP-funktion `get_navbar()`. Du kan behöva läsa igenom de två tidigare tipsen för att tillgodogöra dig detta tips.

Nu till saken, så här gör jag. Först skapar jag en struktur för menyn som jag lägger i en array, tillsammans med en callback-funktion som används för att identifiera nuvarande menyval.

**Definiera menyn, och undermenyn, i en array.**

```php
/**
 * Define the menu as an array
 */
$menu = array(
  // Use for styling the menu
  'class' => 'navbar',

  // Here comes the menu strcture
  'items' => array(
    // This is a menu item
    'home'  => array(
      'text'  =>'Home',   
      'url'   =>'index.php',  
      'title' => 'Some title 1'
    ),

    // This is a menu item
    'test'  => array(
      'text'  =>'Test with submenu',   
      'url'   =>'test.php',   
      'title' => 'Some title 2',

      // Here we add the submenu, with some menu items, as part of a existing menu item
      'submenu' => array(

        'items' => array(
          // This is a menu item of the submenu
          'item 1'  => array(
            'text'  => 'Item 1',   
            'url'   => 'item1.php',  
            'title' => 'Some item 1'
          ),

          // This is a menu item of the submenu
          'item 2'  => array(
            'text'  => 'Item 2',   
            'url'   => 'item2.php',  
            'title' => 'Some item 2',
            'class' => 'italic'
          ),
        ),
      ),
    ),

    // This is a menu item
    'about' => array(
      'text'  =>'About', 
      'url'   =>'about.php',  
      'title' => 'Some title 3'
    ),
  ),

  // This is the callback tracing the current selected menu item base on scriptname
  'callback' => function($url) {
    if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
      return true;
    }
  }
);
```

Funktionen för att kolla vilken sida som är nuvarande sida får man modifiera beroende på vilken taktik man har för att visa sidor. I mitt fall visar jag PHP-sidorna direkt så länken är samma som filens namn.

Jag vill att arrayen skall innehålla all information om menyn, som du ser så innehåller den även class-attributet, det är för att jag skall kunna styla menyn.

Hur ser då PHP-funktionen ut som jobbar på arrayen?

**En funktion för att generera HTML för menyn och undermenyn.**

```php
/**
 * Create a navigation bar / menu, with submenu.
 *
 * @param string $menu for the navigation bar.
 * @return string as the html for the menu.
 */
function get_navbar($menu)
{
    // Keep default options in an array and merge with incoming options that can override the defaults.
    $default = array(
      'id'          => null,
      'class'       => null,
      'wrapper'     => 'nav',
      'create_url'  => function ($url) {
        return $url;
      },
    );
    $menu = array_replace_recursive($default, $menu);

    // Function to create urls
    $createUrl = $menu['create_url'];

    // Create the ul li menu from the array, use an anonomous recursive function that returns an array of values.
    $createMenu = function ($items, $callback) use (&$createMenu, $createUrl) {
        
        $html = null;
        $hasItemIsSelected = false;

        foreach ($items as $item) {

            // has submenu, call recursivly and keep track on if the submenu has a selected item in it.
            $submenu        = null;
            $selectedParent = null;
        
            if (isset($item['submenu'])) {
                list($submenu, $selectedParent) = $createMenu($item['submenu']['items'], $callback);
                $selectedParent = $selectedParent
                    ? "selected-parent "
                    : null;
            }

            // Check if the current menuitem is selected
            $selected = $callback($item['url'])
                ? "selected "
                : null;
            
            // Is there a class set for this item, then use it
            $class = isset($item['class']) && ! is_null($item['class'])
                ? $item['class']
                : null;

            // Prepare the class-attribute, if used
            $class = ($selected || $selectedParent || $class)
                ? " class='{$selected}{$selectedParent}{$class}' "
                : null;

            // Add the menu item
            $url = $createUrl($item['url']);
            $html .= "\n<li{$class}><a href='{$url}' title='{$item['title']}'>{$item['text']}</a>{$submenu}</li>\n";
            
            // To remember there is selected children when going up the menu hierarchy
            if ($selected) {
                $hasItemIsSelected = true;
            }
        }

        // Return the menu
        return array("\n<ul>$html</ul>\n", $hasItemIsSelected);
    };

    // Call the anonomous function to create the menu, and submenues if any.
    list($html, $ignore) = $createMenu($menu['items'], $menu['callback']);


    // Set the id & class element, only if it exists in the menu-array
    $id      = isset($menu['id'])    ? " id='{$menu['id']}'"       : null;
    $class   = isset($menu['class']) ? " class='{$menu['class']}'" : null;
    $wrapper = $menu['wrapper'];

    return "\n<{$wrapper}{$id}{$class}>{$html}</{$wrapper}>\n";
}
```

Ser funktionen lite stor ut? Jo, det gör den kanske. Men den tar hand om inkommande argument, i form av arrayen `$menu` och slår ihop dem med de standardargument som funktionen har. Det är ett bra sätt att skicka in ett flexibelt antal parametrar till en funktion och samtidigt hantera default-värden på de parametrar som inte skickas in. 

Funktionen använder en [anonym](http://php.net/manual/en/functions.anonymous.php) och rekursiv funktion för att skapa menyn och undermenyerna. 

Den anonyma funktionen returnerar en array som innehåller dels resultatet av menyn, `$html` och dels information om det finns ett valt menyitem i menyn. Returvärdet hanteras med funktionen [`list()`](http://php.net/manual/en/function.list.php) som omvandlar arrayen till variabler. Ett alternativ till det vore att använda ytterligare en parameter som skickas in som referens med &-tecken framför, men jag valde vägen med att returnera flera värden från funktionen.

Så där ja, jag skapade ett [litet kodexempel](kod-exempel/dynamic-navbar-menu-with-submenu-using-php-array-and-recursive-function/) för att visa hur det ser ut när det fungerar i ett sammanhang tillsammans med en [stylesheet](kod-exempel/source.php?dir=dynamic-navbar-menu-with-submenu-using-php-array-and-recursive-function&file=style.css#file). Fördelen med en sådan här meny är att den går att konfigurera helt och hållet i arrayen och PHP-funktionen håller reda vilket menyval som är aktivt, även i undermenyn. Den nödvändiga HTML-strukturen finns på plats, resten är stylning.

I kodexemplet så ser den resulterande HTML-strukturen ut så här, när ett menyval är aktivt i en undermeny.

**HTML-struktur för navbar med undermeny.**

```html
<nav class='navbar'>
  <ul>
    <li><a href='index.php' title='Some title 1'>Home</a></li>

    <li class=' selected-parent' ><a href='test.php' title='Some title 2'>Test with submenu</a>
      <ul>
        <li class='selected' ><a href='item1.php' title='Some item 1'>Item 1</a></li>
        <li class='italic' ><a href='item2.php' title='Some item 2'>Item 2</a></li>
      </ul>
    </li>

    <li><a href='about.php' title='Some title 3'>About</a></li>
  </ul>
</nav>
```

Resten handlar om att applicera style så att strukturen beteer sig som en meny. Det går som sagt att göra endast med CSS, eller med en kombination av CSS och JavaScript. Jag föredrar CSS så långt det går.

Fråga, kommentera eller föreslå förbättringar i forumet där jag skapat [en egen tråd för tips om PHP funktion för att skapa navbar och meny](t/1355). Kan du göra det bättre själv? Klar du kan, lägg in ditt förslag till en bättre funktion i forumet.




