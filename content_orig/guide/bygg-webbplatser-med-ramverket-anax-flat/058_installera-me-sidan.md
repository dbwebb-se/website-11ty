---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Installera me-sidan i designkursen
==================================

Vi vet nu att du kan använda `anax`, låt oss då använda det för att skapa din me-sida i kursen, den skall sparas i kursrepot under `me/redovisa`.

Om du får problem med installationsförfarandet så ligger det en färdiginstallerad kopia i ditt kursrepo under `example/redovisa` som du kan använda.



Installera me-sidan {#install}
-----------------------------------

Då fyller vi din katalog `me/redovisa` med en installation av Anax Flat, anpassad för design-kursen.

```text
# Gå till roten av kursrepot
anax -f create me/redovisa design-me
```

Verktyget skriver nu över de filer som ligger i katalogen `me/redovisa`. Det är bra att veta om du kör kommandot två gånger efter varandra.

Du kan nu öppna din webbläsare och peka mot `me/redovisa/htdocs`.



Redigera .htaccess {#htaccess}
-----------------------------------

I katalogen `me/redovisa/htdocs` ligger filen `.htaccess`. Öppna den i din texteditor läs vad det står i kommentaren överst. Du behöver redigera så att din egen studentakronym ersätter `/~mosstud/`.

Filen `.htaccess` innehåller kod som webbservern Apache läser och hjälper dig att få "snygga länkar" i din webbplats. Det är viktigt att du har rätt akronym i filen.

När det är klart så kan du publicera till studentservern med `dbwebb publish` och öppna webbplatsen. Kom ihåg att det går snabbare om du gör en `dbwebb publishpure`.
