---
author: lew
revision:
    "2017-01-11": (D, aar) Tog bort str().
    "2016-12-20": (C, aar) Uppdaterade uppgift.
    "2016-12-19": (B, lew) Ny uppgift.
    "2016-04-12": (A, lew) Första versionen.
category:
    - oopython
...
Skapa objekt efter UML-diagram
===================================

Nu ska du testa vingarna och skapa några objekt efter ett färdigt UML-diagram.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har läst artiklarna: "[Vad är UML?](kunskap/vad-ar-uml)" och "[Kom igång med objekt](kunskap/kom-igang-med-objekt)" samt "[Klass relationer](kunskap/klass-relationer)".



Introduktion {#intro}
-----------------------

Du ska skapa klass-filer för respektive klass i diagrammet. Spara alla filerna i mappen kmom02/deck som ligger i kursrepot. Var noga med att döpa filerna, variablerna och metoderna enligt anvisningarna i diagrammet. Det handlar om att skapa en komplett kortlek.

För filerna använder du namnen:  
1. deck.py  
2. hand.py  
3. card.py    

Använd sedan en fil kallad "main.py" för att skapa objekt och testa koden.  

[FIGURE src=/image/oopython/kmom02/cardDeckUml.png?w=w2 caption="Klicka på bilden för större storlek."]


Krav {#krav}
-----------------------

Starta med att skapa filerna:

```bash
# Ställ dig i kurskatalogen
cd me/kmom02/deck
touch deck.py hand.py card.py main.py
```

1. Namngivning ska ske enligt diagrammet.

2. I *Card* ska `names` vara en statisk lista som innehåller namnen på alla kort, ex. "Ace, 2, 3... Jack, Queen, King". Ett tips är att ha None på index 0, då kan du använda värdet på `value` som index för namnet på kortet.  
`suits` ska också vara en statisk lista som innehåller alla färger ett kort kan ha, "Spades, Hearts, Diamonds, Clubs".  
`value` är en integer för värdet på kortet, 1-13. Kan användas som index för `names`.  
`suit` är index för vilken färg kortet har, 0-3.

3. I *Deck* ska `cards` initieras med 52 kort.  
I metoden `takeCard` ska kortet som tagits returneras och inte längre finnas i `cards` listan.

4. I *Hand* ska `cards` initieras till en tom lista.

5. I varje klass ska det finnas en överlagrad `__str__()`-metod som skriver ut allt om objektet på ett godtyckligt sätt. Relationerna ska stämma med diagrammet ovan.  
    * `Card` ska skriva ut information om sig själv, vilken färg (suit) den har och namn.  
    * `Hand` ska skriva ut information om sig själv och använda `__str__()`-metoden på alla kort i handen.  
    * `Deck` ska skriva ut information om sig själv och använda `__str__()`-metoden på alla kort i kortleken.  

6. I din main.py ska du skapa en kortlek och en hand. Döp din kortlek till `deckOfCards` och din hand till `hand`. Använd din shuffle metod på kortleken och ta sedan 5 kort från `deckOfCards` och lägg i `hand`. Avsluta med: `print(DeckOfCards)` och `print(hand)`.  

```bash
# Ställ dig i kurskatalogen
dbwebb validate deck

dbwebb publish deck
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Gör om så att `Hand` ärver från `Deck`. `Hand` ska inte längre innehålla några metoder men du kan ändra i metoderna i `Deck`. Du kan lägga till fler så länge de är logiska och passar för båda klasserna.



Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
