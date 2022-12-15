---
author: aar
revision:
    "2016-05-03": (A, aar) Första versionen.
category:
    - oopython
...
Skapa sequence diagram
===================================

Nu ska du skapa ett sequence diagram utifrån kod.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har läst artiklarna: "[Vad är UML?](kunskap/vad-ar-uml)" och "[Kom igång med objekt](kunskap/kom-igang-med-objekt)".



Introduktion {#intro}
-----------------------

Du ska skapa ett sequnce diagram med valfritt verktyg, jag föreslår <https://www.websequencediagrams.com/> eller <https://www.draw.io/>.



Krav {#krav}
-----------------------

Starta med att kopiera filerna:

```bash
# Ställ dig i kurskatalogen
cp -ri example/uml/*.py me/kmom02/uml/
cd me/kmom02/uml
# Testa att koden funkar
./Controller.py
```

1. Skapa ett sequence diagram av vad som händer efter _controller.main()_ anropas i koden.

2. Skapa en bild av diagrammet och inkludera i mappen. Döp filen till `sequenceDiagram.png`.

```bash
# Ställ dig i kurskatalogen
dbwebb validate uml

dbwebb publish uml
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
