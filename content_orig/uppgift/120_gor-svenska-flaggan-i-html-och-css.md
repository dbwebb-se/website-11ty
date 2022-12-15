---
author: mos
category:
    - webbprogrammering
    - kursen javascript1
revision:
    "2017-01-04": (E, mos) Genomgången inför liknande uppgift i dbjs.
    "2015-08-27": (D, mos) Uppgraderad till dbwebb-cli version 2.
    "2014-08-21": (C, mos) Förtydligar att alla flaggor skall vara i samma fil.
    "2014-08-11": (B, mos) Sökväg för kopiering ändrad.
    "2014-06-26": (A, mos) Första utgåvan i samband med kursen javascript1.
...
Gör svenska flaggan i HTML och CSS
==================================

En enklare uppgift för att komma igång med HTML & CSS. Jag visar hur du kan skapa en flaggan i webbläsaren och därefter får du i uppgift att skapa dina egna flaggor.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Denna uppgift ingår i kursen [js](kurser/js).

Du kan grunderna i HTML/CSS.

Du har även skapat din egen [sandbox för exempelprogram](uppgift/sandbox-steg-1) .



Introduktion {#intro}
-----------------------

För att lyckas med uppgiften behöver du ha koll på vad en `div` är och hur du kan styla den med CSS. Du behöver använda måttenheten pixels och en kombination av absolut och relativ positionering och kanske en dos av z-index.

Använd Wikipedia, eller motsvarande, för att hitta information om hur flaggorna skall komponeras, så att du får rätt mått och färger. Här är en lista över [världens alla flaggor](http://sv.wikipedia.org/wiki/Lista_%C3%B6ver_flaggor).

Leta reda på en "colorpicker", det finns som addon till Firefox. Med en "colorpicker" kan du ta reda på vilken färgkod en färg har på en webbsida.

Behöver du hjälp att komma i gång så kan du se hur jag löste första delen av uppgiften.

[YOUTUBE src=2BPXAEBWyys width=630 caption="Mikael gör en flagga."]

Mitt exempelprogram från videon finns i [js-repot](repo/js/example/flag/flag1/).



Krav {#krav}
-----------------------

1. Ta en kopia av din sandbox (från kmom01) och spara alla dess filer och kataloger i din kurskatalog under `me/kmom02/flag1`.

```bash
# Ställ dig i kurskatalogen
cd me
cp -ri kmom01/sandbox/* kmom02/flag1
```

2\. Använd HTML och CSS (ej JavaScript) för att skapa 4 flaggor. En av flaggorna skall vara den svenska flaggan, de andra tre flaggorna är valfria. Alla flaggor skall synas via `index.html`.

3\. När du är klar skall du validera och publicera ditt resultat enligt följande:

```bash
# Ställ dig i kurskatalogen
dbwebb publish flag1
```

Rätta de felen som dyker upp. Sen är du klar. Dubbelkolla att dina flaggor fungerar på studentservern.



Extrauppgift {#extra}
-----------------------

Försök göra en mer avancerad flagga med trianglar, cirklar eller bilder.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis. Det är det viktigaste. Se hur bra dina vingar bär.

Det går att skapa trianglar och cirklar med CSS, men det är lite trixigt. Google på "CSS triangle" eller "CSS circle" för ledtrådar. Men ta det som överkus.

Lycka till och ställ frågor i forumet om du behöver hjälp!
