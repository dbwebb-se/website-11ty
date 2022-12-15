---
author: 
    - aar
    - lew
revision:
    "2020-01-31": (D, aar) Updated asciinema and requirements.
    "2019-01-19": (C, aar) clarified rules and requirements.
    "2018-02-05": (B, aar) clarified two requirements.
    "2017-12-15": (A, lew) First version for v2.
category:
    - oopython
...
Kortspelet War
===================================

[FIGURE src=/image/oopython/kmom03/cards-top.jpg?w=c5 class="right"]

Vi ska skapa ett kortspel som används från terminalen. Kortspelet kallas *War*, eller *Svälta räv* på svenska. Efter implementationen skapar vi några enhetstester och klassdiagram.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gått introduktionskursen i Python.  
Du har gått igenom artikeln "[Att skriva enhetstester](kunskap/unittest-i-python)".  
Du har läst artikeln "[Klass relationer](kunskap/klass-relationer)".  



Introduktion {#intro}
-----------------------    

Vi utgår från två stycken spelare som turas om att lägga ut ett kort framför sig. Är färgen samma, (hjärter, spader, ruter eller klöver), vinner den som har kortet med högst värde. Vinnaren tar då båda spelarnas högar och lägger i botten av sin egna. Om färgen inte är samma, fortsätter spelet och spelarna placerar ut varsitt nytt kort i sin hög framför sig. Spelet tar slut när en av spelarna har slut på kort. Nedan kan du se ett exempel på hur det är tänkt att fungera:

[ASCIINEMA src=297061]

<!-- infoga diagram här -->

Krav {#krav}
-----------------------

Arbeta i mappen war/.

```bash
# Ställ dig i kurskatalogen
$ cd me/kmom03/war
```

1. Spelet ska använda klasserna `Deck`, `Hand`, `War` och `Card`. Spara koden för varje klass i en egen fil, deck.py, hand.py, card.py och war.py.

1. `Deck` ska innehålla 52 stycken unika `Card` objekt, som en riktigt kortlek. Det ska finnas en metod för att blanda korten.

1. `Card` ska innehålla valör och färg. `__repr__` ska överskuggas och returnera en sträng med objekts tillstånd (värden, beskrivning av kortet).

1. `Hand` ska representera en spelare. Vid start av spelet ska två Hand objekt skapas och hälften av Card objekten från Deck ska delas ut till vardera Hand objekt.

1. Spelfunktionaliteten, spel loopen, ska hanteras i klassen `War`. Undvik att lägga all kod i en metod, försök dela upp den i flera. Spelet ska starta med `python3 war.py`.

1. Övriga metoder som behövs får ni bedöma själva. t.ex. ta och ge kort mellan Hand/Deck.

1. Skapa en fil, `test.py`, som ska bestå av enhetstester. Välj ut minst 5 metoder, som inte bara gör `return self.x`, att testa. Gör gärna flera testfall för metoderna och inte bara testfall där allt fungerar, försök få saker att gå sönder och testa förväntat resultat. 

1. Skapa klassdiagram över alla klasser. Gör det till en bild och döp filen till `uml.png`.

```bash
# Ställ dig i kurskatalogen
$ dbwebb validate war
$ dbwebb publish war
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

1. Lägg till stöd för flera spelare, låt spelaren välja antalet vid start.


Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
