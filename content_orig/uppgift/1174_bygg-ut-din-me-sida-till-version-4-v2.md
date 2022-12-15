---
author: mos
category:
    - kurs htmlphp
    - webbprogrammering
revision:
    "2020-10-04": (F, nik) Klargörande att uppgift ska vara en del av me-sidan.
    "2020-09-04": "(E, mos) Mindre justeringar i kraven, publicerad för htmlphp v4."
    "2018-09-17": (D, mos) Mindre justeringar i kraven, publicerad för htmlphp v3.
    "2018-09-14": (C, mos) Uppdaterad och ny struktur med fler uppgifter i htmlphp v3.
    "2015-08-26": (B, mos) Förtydligade delar av kraven.
    "2015-06-03": (A, mos) Första utgåvan i samband med kursen htmlphp v2.
...
Bygg ut din me-sida till version 4 (v2)
==================================

Du skall visa dina färdigheter i HTML formulär och sessioner och bygga in av hantering av dessa i din webbplats via en multisida.

Som extrauppgift kan du välja att göra en stilväljare och/eller en login-hantering.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Bygg ut din me-sida till version 3 (v2)](uppgift/bygg-ut-din-htmlphp-me-sida-till-version-3-v2)".

Du har jobbat igenom guiden "[Kom igång med programmering i PHP](guide/kom-igang-med-programmering-i-php)" och de exempelprogram som refereras till i följande delar.

* [Egenskapade funktioner](guide/kom-igang-med-programmering-i-php/egenskapade-funktioner)
* [HTML formulär](guide/kom-igang-med-programmering-i-php/html-formular)
* [Sessioner](guide/kom-igang-med-programmering-i-php/sessioner)



Introduktion {#intro}
-----------------------

Du skall uppdatera din me-sida och samtidigt integrera den med formulär och sessioner.


### Multisida eller ej? {#multi}

Du kan lösa uppgiften med en struktur som multisidan erbjöd. Eller så bygger du en alternativ struktur som du anser passa. Du kan själv välja väg för hur du löser uppgiften.



### Börja med att kopiera me-sidan {#copyme}

Börja med att ta en kopia från föregående uppgift `me3`, och bygg vidare på den.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -ri kmom03/me3/* kmom04/me4/
```

Nu har du din bas du kan utgå ifrån. Din resulterande sida skall finnas i katalogen `me/kmom04/me4`.




Krav {#krav}
-----------------------

1. Se till att du har en fil `config.php`, inkludera den överst i alla sidor. Sessionen skall startas överst `config.php`.

1. Se till att du har en fil `src/functions.php` som inkluderas i alla sidor. Där lägger du funktioner som du själv skapar. Skapa en funktion för att förstöra sessionen.

1. Skapa en ny (multi) sida och lägg till i din navbar, döp den till "Session".

1. Skapa en undersida som kan skriva ut sessionens innehåll.

1. Skapa en undersida som kan förstöra sessionen.

1. Skapa en undersida som lagrar en siffra i sessionen och dubblerar dess värde varje gång som sidan laddas. Gör man reload på sidan ser man att siffrans värde ökar.

1. Skapa en ny (multi) sida med ett ett POST-formulär som använder en processingsida och redirectar till en resultatsida. Du kan göra ett valfritt formulär eller ett "kontakta mig" formulär. Sista sidan skriver ut "Tack". Man kan göra reload på "Tack"-sidan utan att formuläret postas om.

1. Gör ytterligare undersida med ett POST formulär där du har ett formulärfält (textarea) där användaren kan skriva ett eget meddelande. Detta meddelande skall du hantera i processingsidan, spara i sessionen, och slutligen visa i resultatsidan (tänk _read once flash message_).

1. Samtliga sidor som visas ska vara en del av din me-sida (sammanhängande design, header, footer etc).

1. Validera och publicera din kod.

```bash
# Ställ dig i roten av kurskatalogen för python
#dbwebb validate me4
dbwebb publish me4
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

* Bygg ut ditt flashmeddelande så att det ser olika ut beroende på typen av meddelande. Använd css för att visualisera om det är en notis, lyckad operation, varning eller felmeddelande.

* Gör en styleväljare (som en undersida, eller inkludera i din webbplats header) och lägg till en eller två stylesheets som användaren kan välja mellan.

* Gör inloggning till din webbplats. Se till att användaren doe:doe och admin:admin kan logga in (user:password). Skapa som ny multisida och/eller integrera i din webbplats.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
