---
author: mos
category: python
revision:
  "2016-03-29": (D, mos) Länk till förkunskapsövning fixad.
  "2014-09-26": (C, mos) La till möjligheten med snake och ett nytt exempelprogram
    för `snake.py`.
  "2014-09-15": (B, mos) Lade till exempelprogrammet `move-pad.py`.
  "2014-09-12": (A, mos) Första utgåvan i samband med kursen python.
updated: "2016-03-29 13:09:23"
created: "2014-07-03 08:02:54"
...
Ett terminal-baserat spel i Python - steg2
==================================

Programmering och problemlösning i Python. Lär dig att animera ett enklare "grafiskt" spel i terminalen med modulen curses.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gjort [första övningen med Python och curses](uppgift/ett-terminal-baserat-spel-i-python-steg1).



Introduktion {#intro}
-----------------------

I tidernas begynnelse fanns det spelkonsoler likt denna.

[YOUTUBE src=XNRx5hc4gYc width=630 caption="Världens första Pong-spelare 1969."]

[YOUTUBE src=D-THUXZ1aE4 width=630 caption="Så här spelades squash, fotboll och tennis i slutet av 70-talet på den tidens spelkonsoler."]

Du skall nu göra en klon av ett av dessa spel. Du kan själv välja vilken spelidé du tar. Försök att göra något som är personligt och lite annorlunda. Det är små saker som gör en bra helhet.

Det enklaste spelet är nog squash för en spelare. Ta det om du uppfattar uppgiften som svår. Vill du utmana dig själv så väljer du en mer avancerad spelidé, kanske dubbel i tennis? Det är inte mycket svårare men det blir mer kod och därmed mer utmanande.

Du kan göra än mer avancerade spel än de som visas i videon, men låt spelidén bygga på den typen av spel som visas i videon. Så att vi inte går för långt bort från grundtanken med övningen.

Du har ett par fungerande exempel-program som du kan testa och leka runt med. Kanske är de bra att utgå ifrån. Du hittar dem i ditt kursrepo under katalogen `example/curses`. Titta på exempelprogrammen som heter `bouncing-ball.py` och `move-pad.py`.

Som ett alternativ till ovan spel kan du även göra spelet snake. Du har kod som du kan utgå ifrån i `snake.py`. Om du väljer att utöka spelet snake så skall det finnas frukter som ormen äter och blir större och ormen skall bli större efter ett visst tidsintervall och det skall finnas en bana med hinder, inte bara de yttre väggarna. Kanske kan du använda det du gjorde i `game1` för att rita dina snake-banor?



Krav {#krav}
-----------------------

1. Skapa en fil för ditt spel, döp det till `retro.py` och spara det i katalogen `me/kmom05/game2`.

2. Gör ett retro-spel med din egen personliga *touch*. Baskravet är att det fungerar för en spelare likt squash-spelet i videon ovan, på ungefärligt liknande sätt (alternativt snake enligt ovan).

3. Fördela din kod på funktioner och i filer på ett sätt du anser motsvara uppgiftens art.

4. Validera genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Ställ dig i roten av kurskatalogen python
bin/dbwebb validate game2
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Ja, här kan du låta din kreativitet flöda. Hur coolt spel kan du göra? Med den tiden du har till förfogande?

Eller håll det enkelt, även enkla och små spel har sin charm.



Tips från coachen {#tips}
-----------------------

Du kan debugga genom att skriva ut feltexter till en fil. Det kan vara bra när du jobbar med Curses.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
