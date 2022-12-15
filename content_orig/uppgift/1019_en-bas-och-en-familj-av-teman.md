---
author: mos
category:
    - kurs/design
    - tema
    - less
revision:
    "2017-11-17": (D, mos) Genomgång inför ht17.
    "2016-11-14": (C, mos) Förtydligade att även separata stylesheets fungerar.
    "2016-10-26": (B, mos) Ändrade vilket versionsnummer som skall gälla.
    "2016-10-21": (A, mos) Första utgåvan.
...
Bygg en bas och en familj av teman
===================================

Du skall utveckla en familj av teman som fungerar i ditt Anax Flat. När du gör detta så skall du skapa en god struktur med ett bastema som kan specialiseras beroende på vilket tema som önskas. Det handlar om återanvändning av en grundstruktor och jobba med anpassningar av den.

LESS och variabler ger en del av lösningen.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Skapa en familj av teman till Anax Flat](kunskap/skapa-en-familj-av-teman-till-anax-flat)".

Du har läst kurslitteraturen och skaffat dig kunskaper om grundläggande färgteori.

Du har ett typografiskt grid som du kan anpassa.



Introduktion {#intro}
-----------------------

Du har en version av Anax Flat som ligger i katalogen `me/anax-flat`. Det är ett eget repo på GitHub som är taggat i minst version 3.\*.

Du har en version av temat som ligger i katalogen `me/anax-flat/theme`. Det är ett eget repo på GitHub som är taggat i minst version 3.\*.

Du skall nu jobba främst i `me/anax-flat/theme`.

I varje tema kan du använda vitt, svart och nyanser av grått som grund.

När du väljer färger så kan du även lägga till nyanser av en färg, där du jobbat med färgmättnad eller ljusnivå på färgen.

I din tekniska lösning så är du begränsad till den temaväljare som finns med i ditt Anax Flat. Läs om [hur temaväljaren fungerar](anax).

Jobba med LESS moduler, en bra struktur kan spara dig mycket tid. Gör moduler som går att anpassa i respektive tema.

När du jobbar med val av typografi, välj gärna typsnitt från till exempel Googles online typsnitt, [Google Fonts](https://fonts.google.com/).

[INFO]
**TIPS.**

Ett bra sätt att påbörja uppgiften är att ta ditt befintliga tema och bestämma dig för vad som är ditt bastema (`base`) och vad som är en anpassning till bastemat (`default`). Dela upp ditt tema i två delar och två skilda filer.

Sedan jobbar du vidare med varje nytt tema i uppgiften och när du behöver justera bastemat så gör du det, allt för att behålla en bra kodstruktur.

Var inte rädd för att kasta koden och börja om.
[/INFO]



Krav {#krav}
-----------------------



###En familj av teman {#teman}

1. Skapa en ny sida i `content/theme.md` och lägg den i menyn. I sidan beskriver du varje anpassat tema som du nu kommer att skapa. Skriv vad som inspirerade dig och visa den färgpalett du jobbat med samt identifiera eventuell accentfärg.

1. Skapa ett bastema `base` som ger dig grunden för din temafamilj. Det spelar ingen roll om temat inte ser så bra ut. Detta är bara grunden. Tanken är att man måste anpassa det för att det skall se ut som ett mer riktigt tema.

1. Skapa ett tema `light` som ger ett ljust tema med mycket vitt. Det blir en vit och ljus webbplats. Om du vill kan du använda svart och nyanser av grått för att komplettera det ljusa. 

1. Skapa ett tema `color` som bygger vidare på temat `light` och ger en liten och smakfull färgsättning av temat. Välj ett monochromatiskt färgschema. Låt gärna en av nyanserna vara en accentfärg.

1. Skapa ett tema `dark` som inverterar temat `light` och ger en mörk bakgrund och ljus text. Välj sedan ett kompletterande färgschema och låt den ena vara dominerande färg och den andra en accentfärg.

1. Skapa ett tema `colorful`. Du kan använda `light` eller `dark` som bas. Välj sedan ett triadiskt färgschema och skapa ett färgfullt tema.

1. Skapa ett tema `typography` där du främst jobbar med typografin och de typgrafiska element. Välj typsnitt som är smakfulla och kompletterar varandra men välj dem så att de "står ut" så man kan identifiera webbplatsen såsom stylad med typografiska element. Du kan välja vilket färgschema som du vill som bas, eller återanvänd någon av de som du redan gjort.

1. Välj ett av dina teman som ditt standard tema. Eller skapa ett eget personligt tema som du använder som standard tema, det tema som visas när man inte använder temaväljaren.

1. Se till att dina teman fungerar som responsiva teman.



###Klar och taggad {#tag}

1. Se till att ditt tema passerar testerna som körs vid `make test`.

1. Kör `git status`och se till att alla filer, som skall vara en del av dina båda repon `me/anax-flat` och `me/anax-flat/theme`, verkligen är en del av repot.

1. Du committar och taggar de båda repona som version 4.0.0.

1. Pusha upp repona till GitHub, inklusive taggarna.

1. Om du behöver göra fler taggar så gör du enligt 4.0.1, 4.0.2 och så vidare. Om du får komplettering så skall du alltid tagga en ny version när du är klar med kompletteringen samt pusha upp till GitHub.

1. Gör en `dbwebb publish` för att kolla att allt fungerar.

```bash
$ dbwebb publish me
```



Extrauppgift {#extra}
-----------------------

1. När man kommer till din webbplats så möts man av temat med klassen `default`. Se till att det är ditt personliga tema, ditt eget personliga mästerverk bland teman. Lägg extra kraft på detta tema.

1. Jobba med ett extravagant tema via klassen `fun`. Lek och gör ett riktigt udda tema. Här är ett exempel på [udda teman](t/5663). Gör en sida `content/fun` och lägg i menyn. Där kan du skapa innehåll som passar in i detta temat.



Tips från coachen {#tips}
-----------------------

Ta det lugnt och försök förstå hur LESS-koden fungerar. Finn en god struktur. Jobba med moduler som du återanvänder och anpassar.

Var inte rädd för att skriva om din struktur om du behöver det. När kod växer så kommer man alltid till lägen där man behöver omstrukturera sin kod. Så även i sammanhanget stylesheet.

Lycka till och hojta till i forumet om du behöver hjälp!
