---
author:
    - mos
category:
    - me-sida
    - markdown
    - php
    - anax
    - anax/textfilter
revision:
    "2017-12-27": "(A, mos) Första versionen"
...
Använd Markdown till me-sidan
==================================

I dbwebb-kurser används me-sidan som ett sätt att skriva redovisningstexter och samla material kring kursen.

Ibland kan det upplevas enklare att skriva redovisningstexter i Markdown istället för att skriva dem i HTML.

<!--more-->

I detta tipset visas hur du kan uppgradera din me-sida till att använda Markdown som bas för dina redovisningstexter.

Säg att du har en HTML-sida att utgå ifrån, till exempel `redovisning.html` som innehåller en sektion som ser ut så här.

```html
<section>
<h2>Kmom01</h2>
<p>Här är redovisningstexten</p>
</section>
```

Det första vi gör är att skapa en Markdown-fil `kmom01.md` som innehåller redovisningstexten.

```text
Kmom01
--------------------------

Här är redovisningstexten.

```

Nu behöver vi en (PHP) modul som kan läsa Markdown och översätta till HTML. Det finns flera sådana moduler men vi väljer den som används i dbwebb-sammanhang och vi hittar modulen via [Packagist `anax/textfilter`](https://packagist.org/packages/anax/textfilter).

Jag installerar modulen med composer.

```text
composer require anax/textfilter
```

Nu skall vi använda modulen för att läsa in redovisningstexten som är skriven i Markdown och skriva ut i webbsidan.

Jag tar en kopia av orginalfilen och sparar som en PHP-fil.

```text
cp redovisning.html redovisning.php
```

I PHP-filen lägger jag till så att modulen `anax/textfilter` inkluderas via composers autoloader.

```php
<?php
require __DIR__ . "/vendor/autoload.php";
?>
```

Nu kan jag byta ut redovisningstexten för kursmomentet med följande PHP-konstruktion.

```php
<section>
<?php
$filename = __DIR__ . "/kmom01.md";
$text     = file_get_contents($filename);
$filter   = new \Anax\TextFilter\TextFilter();
$parsed   = $filter->parse($text, ["shortcode", "markdown"]);
echo $parsed->text;
?>
</section>
```

Nu kan jag lugnt skriva min redovisningstext i Markdown och överlåta åt PHP att hjälpa mig med formatteringen till HTML.

Har du frågor eller funderingar, eller vill bidra med tips, så finns en [forumtråd för detta tips](t/7185).
