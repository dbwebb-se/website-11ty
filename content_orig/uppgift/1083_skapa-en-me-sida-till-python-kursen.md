---
author:
    - mos
category:
    - webbprogrammering
    - kursen python
    - mesida
revision:
    "2017-06-14": "(A, mos) Kopierad från dbjs, omskriven för python."
...
Skapa en me-sida för Python-kursen
==================================

Skapa en enkel me-sida med HTML och CSS för python-kursen. Me-sidan är till för dina redovisningstexter.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har installerat [kursens labbmiljö](kurser/python/labbmiljo) och initierat ditt kursrepo.



Introduktion {#intr}
-----------------------

Alla dbwebb-kurser har en me-sida där man skriver redovisningstexter. Me-sidan är en webbplats som publiceras på studentservern med hjälp av dbwebb-kommandot.

Redovisningstexterna är en del av underlaget till [bedömning och betygsättning](kurser/faq/bedomning-och-betygsattning) i kursen.

Om du vill och kan så får du gärna ändra stil och layout på din me-sida.



Krav {#krav}
-----------------------

Det finns en mall för redovisningssidan som du kan utgå ifrån. Börja med att kopiera den på följande sätt.

```bash
# Gå till kurskatalogen
cp -ri example/redovisa me
```

Jobba nu vidare i katalogen `me/redovisa`.

1. Uppdatera filen `me.html` så att den innehåller en kort presentation av dig själv, och bifoga en bild eller ASCII-konstverk. Krångla inte till det. Du kan uppdatera sidan under kursens gång, allt eftersom du lär dig mer.

1. Titta igenom filen `redovisning.html` och uppdatera den om du vill. I denna filen skall du skriva dina redovisningstexter i slutet av varje kursmoment.

1. Gör en dbwebb publish för att kolla att allt validerar och fungerar.

```bash
# Gå till kurskatalogen
dbwebb publish redovisa
```

Nu är din me-sida publicerad. Länken ser du i slutet av skriptet och den ser ut ungefär så här.

```text
http://www.student.bth.se/~mosstud/dbwebb-kurser/python/me/redovisa
```

Du kan öppna länken i en webbläsare.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

HTML är inte speciellt svårt, men du kan välja att skriva "bara text" inom `<pre>` element, du behöver inte lära dig HTML.

Lycka till och hojta till i forumet om du behöver hjälp!
