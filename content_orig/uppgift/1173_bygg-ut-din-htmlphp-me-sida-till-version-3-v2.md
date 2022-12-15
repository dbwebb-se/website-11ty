---
author: mos
category:
    - webbprogrammering
    - kurs htmlphp
    - php
    - html
    - css
revision:
    "2018-08-22": "(A, mos) Ny utgåva i samband med htmlphp v3."
...
Bygg ut din htmlphp me-sida till version 3 (v2)
==================================

Integrera och använd en sidkontroller för en multisida i din me-sida. En sidkontroller för en multisida är en sida med flera undersidor och en egen anvigeringsmeny.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Bygg ut din htmlphp me-sida till version 2](uppgift/bygg-ut-din-htmlphp-me-sida-till-version-2)".

Du har utfört uppgiften "[Bygg en multisida och testa arrayer (v2)](uppgift/bygg-en-multisida-och-testa-arrayer-v2)".



Introduktion {#intro}
-----------------------

Du skall uppdatera din me-sida, som du gjorde i förra kursmomentet. Du skall nu integrera din me-sida med en multisida, likt den du gjort i uppgiften "Bygg en multisida och testa arrayer (v2)".



### Börja med att kopiera me-sidan {#copyme}

Börja med att ta en kopia från föregående uppgift `me2`, och bygg vidare på den.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -ri kmom02/me2/* kmom03/me3/
```

Nu har du din bas du kan utgå ifrån. Din resulterande sida skall finnas i katalogen `me/kmom03/me3/`.



### Kopiera din multisida {#reuse}

Tanken är att du nu skall integrera konceptet för multisidor in i din me-sida. Du skall lägga till (kopiera) den multisida du redan gjort i föregående uppgift och integrera den i din me-sida så att den "ser bra ut" och att multisidan känns som en naturlig del av din me-sida.



Krav {#krav}
-----------------------

1. I din me-sida, skapa en ny sida, en multisida `multipage.php`, och ge den ett eget menyval i din navbar.

1. Din `multipage.php` skall ha samma innehåll som du har i `kmom03/multi`.

1. Styla multisidan så att det känns som att den, innehållet och navigeringsmenyn, hänger ihop med resten av din webbplats.

1. När en viss undersida är vald så skall det vara tydligt i navigeringsmenyn så att just det menyvalet har en annan style.

1. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb publish me3
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Jobba med följande extrauppgifter om du anser att du har tid och lust.

* Lägg till en extra multisida i din me-sida och döp den till "test". Skapa ett par undersidor där du testar någon enklare konstruktion i html, css eller php. En sådan multisida kan vara bra att ha om du senare vill göra snabba och enkla testprogram.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
