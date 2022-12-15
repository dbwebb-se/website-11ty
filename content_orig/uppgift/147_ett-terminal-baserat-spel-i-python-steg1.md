---
author: mos
category: python
revision:
  "2015-01-14": (C, mos) Fel länk till förkunskaperna.
  "2014-09-30": (B, mos) Validera game1, inte game2.
  "2014-08-27": (A, mos) Första utgåvan i samband med kursen python.
updated: "2015-01-14 12:27:53"
created: "2014-07-03 08:02:40"
...
Ett terminal-baserat spel i Python - steg1
==================================

Programmering och problemlösning i Python. Lär dig att göra ett "grafiskt" program i terminalen med modulen curses.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Installera en labbmiljö till Python](kunskap/installera-en-labbmiljo-till-python)" och du kan grundläggande konstruktioner i Python samt hantering av listor.

Du har även läst igenom de delar av Python manualen som handlar om Curses-modulen.



Introduktion {#intro}
-----------------------

Du har ett fungerande exempel-program som du kan testa och leka runt med. Börja med det. Du hittar programmet i ditt kursrepo i `example/curses/border.py` och du kan studera [`border.py` på GitHub](https://github.com/mosbth/python/blob/master/example/curses/border.py).



Krav {#krav}
-----------------------

1. Ta en kopia av exempelprogrammet och spara det i `me/kmom04/game1/border.py`.

2. Uppdatera koden så att den kontrollerar att man inte flyttar utanför ramen.

3. Lagra undan "spelplanen" i en två-dimensionell array (eller på annat passande sätt) i koden. Du skall alltså välja en datastruktur som passar för att programmatiskt representera spelplanen.

4. När man trycker 's' skall en kopia av spelplanen sparas ned på filen `border.txt`.

5. När man trycker 'o' skall spelplanen läsas in från `border.txt` och ritas upp.

6. Validera genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Ställ dig i roten av kurskatalogen python
bin/dbwebb validate game1
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar. 




Extrauppgift {#extra}
-----------------------

1. Gör så att olika storlekar på spelplanerna kan fungera. Om den sparade spelplanen är mindre än, eller större än, den nuvarande storleken på fönstret, så skall det ändå fungera.

2. Gör ett spel av det. Placera ut "ätbara" saker på spelplanen, kanske en labyrint, och farliga frukter, ge poäng för ätbara frukter och minuspoäng för farliga frukter och låta spelaren flytta markören genom labyrinten för att nå fram till målet.

3. Utöka 2) med stöd för olika banor som lagras på fil och kan laddas genom någon tangentkombination.



Tips från coachen {#tips}
-----------------------

Du kan debugga genom att skriva ut feltexter till en fil. Det kan vara bra när du jobbar med Curses.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!




