---
author: mos
category:
    - kursen design
    - LESS
revision:
    "2017-10-27": (C, mos) Mindre formuleringar i text inför ht17, förtydliga om egna moduler.
    "2016-11-01": (B, mos) Nytt krav om att länka till temat på github.
    "2016-10-26": (A, mos) Första utgåvan.
...
Bygg ut ditt Anax Flat med eget LESS tema
===================================

Du skall bygga ut ditt Anax Flat med ett eget tema som bygger på LESS. 

Allt lägger du ut på GitHub i dina egna repon.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Bygg ett tema till Anax Flat](kunskap/bygg-ett-tema-till-anax-flat)".

Du har sedan tidigare en version av Anax Flat skall ligga i katalogen `me/anax-flat` och vara ett eget repo på GitHub som är taggat i minst version 1.1.0.



Introduktion {#intro}
-----------------------

Spara allt du gör i ditt kursrepo under katalogen `me`.

Din version av temat skall ligga i katalogen `me/anax-flat/theme` och vara ett eget repo på GitHub som är taggat i minst version 1.0.0.

Tipset är att hålla det enkelt i detta kursmomentet. Men strukturerat och ordningsamt. Det kommer fler kursmoment där du kommer få jobba vidare med stylen. Fokusera på att få alla delar på plats och bekanta dig med verktygen så att de känns naturliga i din utvecklingsprocess.

Tänk på att det kommer gridbaserad layout i nästa kmom så ligg lågt med att försöka styla hela webbplatsen. Du kanske måste göra om delar av det i nästa kmom. Håll det enkelt.



Krav {#krav}
-----------------------

1. Skapa ett enklare bastema till din webbplats. Du behöver inte styla jättemycket, det kommer fler möjligheter under kursen. Men, det måste vara ett hyffsat gott grundtema. Inget slarv.

1. Header-delen skall vara stylad och se helt okey ut.

1. Den style du gör för din meny/navbar skall vara organiserad som en egen LESS-modul i ditt tema.

1. Menyn skall vara väl fungerande och responsiv. Var noga med att lägga dina mediaqueries i slutet av LESS-koden, ordningen är viktig.

1. Du skall använda två menyer, den "vanliga" (navbarTop) och den som är anpassad för små skärmar (navbarMax).

1. Innehållsdelen och eventuella sidokolumner skall se bra och och fungera responsivt.

1. Footer och footerkolumnerna skall se bra ut och fungera responsivt.

1. På din about-sida skall du lägga en länk till GitHub-repot för ditt tema.

1. Se till att ditt tema passerar testerna som körs vid `make test`.



###Klar och taggad {#tag}

1. Kör `git status` och se till att alla filer, som skall vara en del av dina båda repon `me/anax-flat` och `me/anax-flat/theme`, verkligen är en del av repot.

1. Du committar och taggar de båda repona som version 2.0.0.

1. Pusha upp repona till GitHub, inklusive taggarna.

1. Om du behöver göra fler taggar så gör du enligt 2.0.1, 2.0.2 och så vidare. Om du får komplettering så skall du alltid tagga en ny version när du är klar med kompletteringen samt pusha upp till GitHub.

1. Gör en `dbwebb publish` för att kolla att allt fungerar.

```bash
$ dbwebb publish me
```



Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

1. Tänk på att försöka organisera din LESS-kod i moduler som i längden kan bli återanvändbara till andra teman du bygger.
2. 
1. Man kan importera FontAwesome som en LESS-modul. Men det kan vara lite utmanande. Om man gör det så behöver man även ta hand om en font-katalog och kopiera den från FontAwesome till `htdocs`. Ge dig på detta om du känner dig mogen för en utmaning. Det är så jag själv brukar göra i mina teman.



Tips från coachen {#tips}
-----------------------

Ta det lugnt och försök förstå hur Anax Flat hanterar innehåll.

Kom ihåg att om du förändrar innehåll i temat så kan du även behöva committa och tagga om din version av Anax Flat, eftersom temats filer kopieras dit. Tipset är att tagga båda repona i slutet, när du känner dig klar.

Lycka till och hojta till i forumet om du behöver hjälp!
