---
author: mos
category: webbprogrammering
revision:
  "2015-08-24": (B, mos) Bort med referenser till `me/redovisa`.
  "2015-05-20": (A, mos) Första utgåvan i samband med kursen htmlphp v2.
updated: "2015-08-24 07:25:55"
created: "2015-01-28 15:07:45"
...
Bygg ut din htmlphp me-sida till version 3
==================================

Bygg in en multisida i din me-sida. En undersida som har sin egen undermeny.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Bygg ut din htmlphp me-sida till version 2](uppgift/bygg-ut-din-htmlphp-me-sida-till-version-2)".

Du har utfört uppgiften "[Bygg en multisida och testa arrayer](uppgift/bygg-en-multisida-och-testa-arrayer)".



Introduktion {#intro}
-----------------------

Du skall uppdatera din me-sida, som du gjorde i förra kursmomentet. Du skall nu integrera din me-sida med en multisida, likt den du gjort i uppgiften "Bygg en multisida och testa arrayer".



###Börja med att kopiera me-sidan {#copyme}

Börja med att ta en kopia från föregående uppgift `me2`, och bygg vidare på den.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -ri kmom02/me2/* kmom03/me3/
```

Nu har du din bas du kan utgå ifrån. Din resulterande sida skall finnas i katalogen `me/kmom03/me3/`.



###Återanvänd innehållet i din multisida {#reuse}

Trixet är att du nu ska skapa en *ny* multisida i din webbplats `me/kmom03/me3/`. För att göra det behöver du skapa en sida `me/kmom03/me3/multipage.php` som innehåller switchsatsen. Kopiera resten av innehållet från katalogen `me/kmom03/multi`.

<!-- Men, du skall **återanvända**, inte kopiera, resten av innehållet från katalogen `me/kmom03/multi`. Du skall låta filerna `aside.php` och katalogen `content` ligga kvar där de ligger. Uppdatera istället sökvägarna i din nya multisida, `multipage.php` så den återanvänder innehållet som redan ligger i `me/kmom03/multi`.

Var sak har sin plats, vi behöver inte kopiera runt filer om det inte behövs. Det är inte DRY. -->



Krav {#krav}
-----------------------

1. Skapa en ny sida `me/kmom03/me3/multipage.php` och ge den ett eget menyval i din navbar.

1. Din `multipage.php` skall ha samma *innehåll* som du har i `kmom03/multi`.

1. Styla din menyn likt din navbar, så det känns som de hänger ihop stilmässigt. Ge den en stil så att det ser lite mer ut som en meny, eller en länklista.

1. Validera och publicera din kod enligt följande.
<!-- 1. Se till att din kod är DRY. Länka till filerna, inte kopiera. Det kan finnas undantag från regeln. Till exempel så hade jag troligen valt att kopiera stylesheeten. -->

```bash
# Ställ dig i kurskatalogen
#dbwebb validate me3
dbwebb publish me3
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

* Lägg extra tid på att styla sidan så den ser bra ut och passar in i din me-sida.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!




