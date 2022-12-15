---
author: mos
category: php
updated: "2013-05-23 10:52:13"
created: "2013-05-23 10:50:51"
...
Hitta länken till nuvarande sida med en PHP-funktion - getCurrentUrl()
==================================

Ibland vill du ha länken till nuvarande webbsida. Men, det är inte uppenbart hur du kan få fram den. Du kanske vet att svaret finns bland all information i `$_SERVER`, men hur skall man effektivast sätta ihop den informationen för att skapa en länk till nuvarande sida? Låt oss skapa en funktion `getCurrentUrl()` som gör detta.

<!--more-->

För att göra en lång historia kort så visar vi upp facit. En funktion som är bra att ha, baserat på informationen som finns i `$_SERVER` återskapas här länken till nuvarande sida.

Så här ser källkoden ut för funktionen. 

```php
/**
 * Get the url to the current page. 
 *
 * @return string as the url to the current page.
 */
function getCurrentUrl() {
  $url = "http";
  $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
  $url .= "://";
  $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
  $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
  return $url;
}
```

Du kan [testa funktionen via ett exempelprogram](kod-exempel/get_current_url/).

