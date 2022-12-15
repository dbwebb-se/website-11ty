---
author: mos
category: php
updated: "2013-09-12 10:27:48"
created: "2013-09-12 10:27:24"
...
Gör en läsbar url med slugify()
==================================

Slugify brukar det kallas när man tar en vanlig sträng, till exempel en titel på en artikel, och gör den till en del av en url, allt för att få en mer läsbar och sökmotoroptimerings-vänlig url. Detta kan vi göra genom att skapa en funktion i PHP som tar en sträng som inparameter och returnerar en slugifierad sträng som kan användas som en del i en url.

<!--more-->

Just denna varianten av funktionen kommer från en diskussion i chatten som lyftes till en tråd i forumet ["Tips: Skapa en permalänk (Slugify)"](t/328) och sedan dess har jag själv använt samma grund i [mitt lilla ramverk Lydia](https://github.com/mosbth/lydia). Så här ser min variant av funktionen ut.

```php
/**
 * Create a slug of a string, to be used as url.
 *
 * @param string $str the string to format as slug.
 * 
 * @return str the formatted slug.
 */
function slugify($str) {
    $str = mb_strtolower(trim($str));
    $str = str_replace(array('å','ä','ö'), array('a','a','o'), $str);
    $str = preg_replace('/[^a-z0-9-]/', '-', $str);
    $str = trim(preg_replace('/-+/', '-', $str), '-');
    return $str;
}
```

Exempelvis så ser du att denna artikel heter "Gör en läsbar url med slugify()", när den titeln har körts genom funktionen så blir resultatet "gor-en-lasbar-url-med-slugify".

Som synes så kan den hantera åäö, men den kan behöva anpassning för andra multibyte-tecken. Men det är i alla fall en grund att bygga på.
