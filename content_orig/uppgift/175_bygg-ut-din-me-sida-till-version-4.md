---
author: mos
category: webbprogrammering
revision:
  "2015-08-26": (B, mos) Förtydligade delar av kraven.
  "2015-06-03": (A, mos) Första utgåvan i samband med kursen htmlphp v2.
updated: "2015-08-26 06:56:16"
created: "2015-01-28 15:12:07"
...
Bygg ut din me-sida till version 4
==================================

Bygg in en styleväljare i din me-sida och pröva olika varianter av CSS-konstruktioner.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Bygg ut din htmlphp me-sida till version 3](uppgift/bygg-ut-din-htmlphp-me-sida-till-version-3)".

Du har utfört uppgiften "[Bygg en styleväljare till din webbplats](uppgift/bygg-en-stylevaljare-till-din-webbplats)".



Introduktion {#intro}
-----------------------

Du skall uppdatera din me-sida och samtidigt integrera den med en styleväljare, likt den som du gjort i den andra uppgiften.



###Börja med att kopiera me-sidan {#copyme}

Börja med att ta en kopia från föregående uppgift `me3`, och bygg vidare på den.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -ri kmom03/me3/* kmom04/me4/
```

Nu har du din bas du kan utgå ifrån. Din resulterande sida skall finnas i katalogen `me/kmom04/me4`.

Så här kan det se ut när du är klar.

[YOUTUBE src=kSlrZk9RoNk width=630 caption="En styleväljare på Mikaels me-sida."]



Krav {#krav}
-----------------------

1. Skapa en sida `config.php`, inkludera den överst i alla sidor. Starta sessionen överst i `config.php`. Nu startas sessionen på enbart en plats. Det är DRY.

1. Integrera en multisida för styleväljaren i din me-sida. Döp den till `stylechooser.php`.

1. Se till att stödja tre olika stylesheets via din multisida.

1. Integrera en anpassad styleväljare i din me-sida, som en del av din header, så att styleväljaren visas på samtliga sidor. Använd varianten med dropdown, POST och processingsida. Koden som pekar ut den aktiva stylesheeten flyttar du till `config.php`, det blir DRY.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i roten av kurskatalogen för python
#dbwebb validate me4
dbwebb publish me4
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

* Lägg extra tid på att leka runt med de olika stylesheetarna. Pröva gärna att kopiera/återskapa style från andra webbplatser.

* Fundera över strukturen på din kod, finns det något som kan samlas i en funktion som du kan placera i filen `config.php`. Kanske koden som visar aktivt val i navbaren? Pröva att skapa en funktion av den koden.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




