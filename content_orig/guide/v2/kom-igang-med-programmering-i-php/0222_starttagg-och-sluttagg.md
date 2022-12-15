---
author: mos
revision:
    "2020-08-13": "(C, mos) Uppdelad i flera dokument i v2."
    "2018-06-20": "(B, mos) Bort med kommentarer och lade till uttryck."
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Starttagg och sluttagg
=======================

Hmm, undrar om denna verkligen behövs, kanske hanteras det redan i sidan "php och html".


---


PHP starttag och sluttag {#php-taggar}
-----------------------

Man går in i "php-läge" med starttag `<?php`, därefter tolkas allt som php-kod. Man avslutar med en sluttag `?>`. Därefter kan man skriva vanlig html-kod igen. På detta sätt kan man växla mellan html och php, eller ha en fil med enbart php-kod.

```php
<?php

// Everything between the PHP tags is considered to be PHP-code.

?>
```

Om din fil enbart innehåller php-kod, eller om sluttaggen är det sista tecknet i filen, då (kan) skall du exkludera sluttaggen. Anledningen är att sluttaggen i detta fallet är en potentiell felkälla som kan ge upphov till fel som bland annat är kopplade till sessionen.
