---
author: mos
category: php
updated: "2014-09-29 07:59:09"
created: "2014-02-01 17:04:55"
...
Visa felmeddelanden på din PHP-sida
==================================

Har du försökt att felsöka PHP-kod som bara ger en blank sida som svar? Kanske har du missat att *sätta på* så att felen rapporteras -- och skrivs ut? Här är två rader kod som du kan använda för att sätta på felmeddelanden i PHP.

<!--more-->

```php
/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
```

Se till ovan rader körs först i ditt skript, sätt dem överst i första filen, så att du inte missar något felmeddelande.

Och kom ihåg, när ett felmeddelande väl visar sig, har det alltid rätt.

> *"Felmeddelandet har alltid rätt"*

Lös felmeddelandena uppifrån och ned, ta det översta först. Resten kan vara följdfel som löser sig när du rättat det första felet.

Så här ser det ut när jag testar ovanstående.

[YOUTUBE src=wOLpAzyUIuA width=630 caption="Mikael testar att sätta på och slå av visning av felmeddelanden."]
