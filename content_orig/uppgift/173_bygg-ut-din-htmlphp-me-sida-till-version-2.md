---
author: mos
category:
    - webbprogrammering
    - html
    - css
    - php
    - kurs htmlphp
revision:
    "2018-06-27": (C, mos) Genomgången inför ht18 och htmlphp v3.
    "2015-09-01": (B, mos) Förtydligade extrauppgifterna.
    "2015-05-11": (A, mos) Första utgåvan i samband med kursen htmlphp v2.
...
Bygg ut din htmlphp me-sida till version 2
==================================

Bygg vidare på din me-sida för kursen htmlphp, en me-sida med HTML, CSS och PHP. Nu mer fler vanliga konstruktioner för HTML, CSS och PHP.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Skapa en webbsida med HTML, CSS och PHP, steg 2](kunskap/skapa-en-webbsida-med-html-css-och-php-steg-2)".

Du har utfört uppgiften ["Skapa en me-sida i kursen htmlphp"](uppgift/skapa-en-me-sida-i-kursen-htmlphp).



Introduktion {#intro}
-----------------------

Du skall uppdatera din me-sida, som du gjorde i förra uppgiften, med de konstruktioner som visas i artikeln.

Börja med att ta en kopia från föregående uppgift `me1`, och bygg vidare på den.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -ri kmom01/me1/* kmom02/me2/
```

Nu har du din bas du kan utgå ifrån, spara alla dina filer i katalogen `me/kmom02/me2`.



Krav {#krav}
-----------------------

1. Strukturera sidornas innehåll med elementen `<main>`, `<article>` samt använd `<header>` och `<footer>` i din `<article>`.

2. Skapa länkar till HTML & CSS specifikationer samt Cheatsheet och lägg länkarna i din sidfooter.

3. Din sida skall inte lida av effekter som kan lösas med clear float, clearfix eller "hoppande" sidor på grund av skrollbaren eller minsta höjd.

4. Använd färger för att färglägga din webbplats. Sparsamt är okey, men använd några färger för att liva upp stämningen.

5. Använd CSS-konstruktioner, välj minst två av de som visas i artikeln.

6. Styla dina länkar, enkelt eller avancerat, men styla dem så det syns.

7. Styla din navbar så den visar nuvarande länk och så att dess länkar inte ändrar utseende beroende på om man besökt sidan eller ej.

8. Alla sidor skall ha olika `<title>`, lös det med PHP.

9. Skapa en sidfooter som mäter sidans laddningstid, behov av minne och antal filer som inkluderats.

10. Gör din me-sida responsiv. Det räcker om den innehåller en del som är responsiv.

<!--
Uppdatera till HT21.
11. Se till att din webbplats validerar i Unicorn.
-->

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
#dbwebb validate me2
dbwebb publish me2
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Är du nöjd med resultatet? Om du har extra tid så kan du lägga det till exempel på någon av följande delar.

* Jobba med din style, gör den personlig och ha en tanke bakom din style. Det är okey att leka runt och utmana.
* Jobba med den responsiva delen av webbplatsen, ser den bra ut på alla skärmar eller behöver du anpassa den mer för olika skärmstorlekar?



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
