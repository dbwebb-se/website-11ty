---
author: mos
category: php
updated: "2013-04-29 22:28:21"
created: "2013-04-29 21:44:03"
...
Förbättra ditt skrivande på webben med ett PHP-bibliotek för typografi
==================================

För den som kan sin typografi på sina fem fingrar så kan skrivandet på webben kännas lite fattigt ibland. Men, det finns hjälp att få, dubbelfnuttar kan enkelt bli till typografiskt mer korrekta enkla eller dubbla typografiska citationstecken och det är numer nära till tankestreck istället för det felaktigt använda minustecknet, för att inte tala om uteslutningstecken.

<!--more-->

Den som kan sin typografi vet vad typografisk citationstecken[^1] är och förstår tjusningen med dem. Likaväl är personen säkert allergisk mot användande av minustecken när det borde vara ett tankestreck[^2]. Uteslutningstecken (ellips)[^3] är lika självklart som att inte använda tre punkter. Den här personen kan alltså sin typografi och vet exakt vad ett hårt mellanslag[^4] innebär.

Varför göra detta? För att det är vackert. Så enkelt är det.

Till vår hjälp kommer ett PHP-program, skrivet av Michel Fortin. Programmet heter [PHP SmartyPants Typographer](http://michelf.ca/projects/php-smartypants/typographer/) och det är en PHP port och utökning av den programvara, [SmartyPants](http://daringfireball.net/projects/smartypants/), som ursprungligen skrevs av John Gruber.

Programvaran hjälper till att hantera så att det blir en korrekt typografisk formatering av din text. Gör så här för att komma igång.

```bash
fetch http://littoral.michelf.ca/code/php-smartypants/php-smartypants-typographer-1.0.1.zip
unzip php-smartypants-typographer-1.0.1.zip; 
```

Dubbelkolla alltid på [hemsidan](http://michelf.ca/projects/php-smartypants/) om det kommit en nyare version av programvaran.

För att förenkla din egen kod så kan du samla anropen till PHP SmartyPants Typographer i en funktion. Det ger ett renare API mot koden för PHP SmartyPants Typographer och det blir lättare om den byter sitt gränssnitt.

```php
/**
 * Format text according to PHP SmartyPants Typographer.
 *
 * @param string $text the text that should be formatted.
 * @return string as the formatted html-text.
 */
function smartyPantsTypographer($text) {
  require_once(__DIR__ . '/php-smartypants-typographer/smartypants.php');
  return SmartyPants($text);
}
```

Testa ett exempelprogram som visar hur du kan [jobba med PHP SmartyPants Typographer](kod-exempel/start_using_php_smartypants_typographer/).

Kom i håg, bara för att det blir snyggare!

**Läs mer om några typografiska element:**

[^1]: [Citationstecken](http://sv.wikipedia.org/wiki/Citationstecken)
[^2]: [Tankestreck](http://sv.wikipedia.org/wiki/Tankstreck) och [långt tankestreck](http://sv.wikipedia.org/wiki/L%C3%A5ngt_tankstreck)
[^3]: [Uteslutningstecken (ellips)](http://sv.wikipedia.org/wiki/Uteslutningstecken)
[^4]: [Hårt mellanslag](http://sv.wikipedia.org/wiki/Hårt_mellanslag)


