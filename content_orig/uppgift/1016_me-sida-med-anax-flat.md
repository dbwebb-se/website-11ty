---
author: mos
category:
    - kurs/design
    - anax-flat
revision:
    "2017-10-18": "(F, mos) Förtydligade om minimal style."
    "2016-11-09": "(E, mos) Förtydligade att byling skall stylas och ha bild."
    "2016-11-01": "(D, mos) Bort referens till temat."
    "2016-10-26": "(C, mos) Omstrukturerad efter feedback."
    "2016-10-07": "(B, mos) Genomgången och testad."
    "2016-06-08": "(A, mos) Första utgåvan."
...
Bygg en me-sida med Anax Flat
===================================

Du skall sätta samman en me-sida med ditt eget Anax Flat.

Allt lägger du ut på GitHub i dina egna repon.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Bygg en me-sida med Anax Flat](kunskap/bygg-me-sida-med-anax-flat)".



Introduktion {#intro}
-----------------------

Spara allt du gör i ditt kursrepo under katalogen `me`.

Din version av Anax Flat skall ligga i katalogen `me/anax-flat` och vara ett eget repo på GitHub som är taggat i minst version 1.0.0.

Tipset är att hålla det enkelt i detta kursmomentet. Det kommer fler kursmoment där du kommer få jobba vidare med stylen. Fokusera på att få alla delar på plats och bekanta dig med verktygen så att de känns naturliga i din utvecklingsprocess. Gör minsta möjliga på din style och CSS.



Krav {#krav}
-----------------------

1. Uppdatera samtliga filer under katalogen `content` så att de speglar att det är din me-sida. Lägg in relevant innehåll för en me-sida i denna kursen.

1. Förstasidan skall innehålla en hälsning/presentation av/om dig tillsammans med minst en bild.

1. Lägg till en byline (bild och text om dig) till förstasidan. Du kan ha samma byline på fler sidor om du vill. Styla din byline med HTML och inline CSS direkt i ditt Markdown-dokument.

1. På about-sidan lägger du in valfri text om kursen tillsammans med en godtycklig bild som du anser kompletterar sidans innehåll.

1. På din about-sida skall du lägga en länk till GitHub-repot för din me-sida.

1. Byt ut den bilden som nu finns med som *flash-bild* på alla sidorna. Lägg dit en egen bild som du tycker passar. Du kan ha olika bilder på olika sidor, om du vill.

1. Fyll i *ett utkast* till din redovisningstext för detta kursmomentet på rätt plats i sidan för redovisningar.

1. Gör begränsat/minimalt med style och CSS. Du får utrymme till det i nästa kursmoment.



###Klar och taggad {#tag}

1. Kör `git status` och se till att alla filer, som skall vara en del av repot `me/anax-flat`, verkligen är en del av repot.

1. Du committar och taggar repot som version 1.1.0.

1. Pusha upp repot till GitHub, inklusive taggarna.

1. Om du behöver göra fler taggar så gör du enligt 1.1.1, 1.1.2 och så vidare. Om du får komplettering så skall du alltid tagga en ny version när du är klar med kompletteringen samt pusha upp till GitHub.

1. Gör en `dbwebb publish` för att kolla att allt fungerar.

```bash
$ dbwebb publish me
```



Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

1. Skapa en testsida för att leka runt med olika konstruktioner av Markdown så du kan testa och se hur Markdown samverkar med HTML när du skriver innehåll.



Tips från coachen {#tips}
-----------------------

Ta det lugnt och försök förstå hur Anax Flat hanterar innehåll.

Glöm inte committa, tagga och push.

Lycka till och hojta till i forumet om du behöver hjälp!
