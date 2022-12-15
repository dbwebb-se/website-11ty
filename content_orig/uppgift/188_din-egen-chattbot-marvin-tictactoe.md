---
author: sylvanas
category: python
revision:
  "2015-08-25": (B, mos) Uppgraderade till dbwebb v2.
  "2015-02-05": (A, sylvanas (mos)) Första utgåvan i samband med uppdatering av kmom05
    i kursen python.
updated: "2015-08-25 14:03:36"
created: "2015-02-03 11:06:37"
...
Din egen chattbot - Marvin - TicTacToe
==================================

Programmering och problemlösning i Python. Lär Marvin lite mer, denna gången listor av listor och ett TiCTacToe-spel.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i Python och listor och du har byggt [fjärde delen av Marvin](uppgift/din-egen-chattbot-marvin-steg-analysera-text-och-ord).



Introduktion {#intro}
-----------------------

Tips: [`example/matrix/do-matrix.py`](https://github.com/mosbth/python/blob/master/example/matrix/do-matrix.py)

Marvin ska nu kunna spela TicTacToe med dig. 

Spelplanen ska sparas i en matris, en lista som består av listor.
När spelet startar så ska spelplanen ritas ut, och den ska vara 3x3 stor:

```text
 _ _ _
|_|_|_|
|_|_|_|
|_|_|_|
```

Spelare markeras med x och o på brädet. Spelare x börjar alltid, och det är alltid du först.
Du ska berätta för Marvin vart du vill sätta ut ditt kryss genom att ange koordinater. T.ex så är första rutan på första raden 0,0. När du anger en koordinat så ska spelet kolla att det inte finns något i den rutan redan, och sedan om den är tom så ska den rita ut din spelmarkör:

```text
 _ _ _
|x|_|_|
|_|_|_|
|_|_|_|
```

När du har spelat din markör så är det Marvins tur. Men Marvin har beslutsångest så du får spela hans markör åt honom. T.ex kan du säga till Marvin att spela ut sin markör på 0,1:

```text
 _ _ _
|x|o|_|
|_|_|_|
|_|_|_|
```

Spelet fortsätter tills att någon får 3 i rad, antingen lodrätt, vågrätt eller diagonalt.

```text
 _ _ _
|x|o|o|
|_|x|_|
|_|_|x|
```

Ibland vill man spara spelet och fortsätta senare. För att kunna göra detta så ska du kunna tala om för Marvin att spara spelet, och då ska spelplanens matris skrivas till en fil, `tictactoe.txt`. Du ska sedan kunna tala om för Marvin att påbörja ett sparat spel, och då ska matrisen för spelet hämtas ur filen, och spelplanen ritas ut. Sedan ska spelet fortsätta som vanligt.



Krav {#krav}
-----------------------

Utgå från din kod i katalogen `me/kmom05/marvin4` och bygg vidare där.

```bash
# Ställ dig i roten av kurskatalogen
cd me/kmom05/marvin4
```

2. Lär Marvin spela TicTacToe enligt introduktionen. Använd datastrukturen lista med listor.

3. Lär Marvin spara en omgång till fil samt att initiera en omgång genom att läsa ställningen från en fil.

3. Marvin skall upptäcka när någon har vunnit och skriva ut vem som vann och sedan avsluta omgången.

4. Validera Marvin genom att göra följande kommando i kurskatalogen i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb validate marvin4
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar. 




Extrauppgift {#extra}
-----------------------

1. Spara till fil med JSON.

2. Uppgradera Marvin (lättare): Uppgradera Marvin så att han istället för att ha beslutsångest spelar ut sin markör på en slumpmässig ruta.

3. Uppgradera Marvin (svårare): Uppgradera Marvin så att han spelar smart enligt en prioriteringslista på bra drag. Om ett drag i listan redan är gjort så ska Marvin försöka med nästa istället. Vill du göra honom extra smart så gör så att han har olika drag beroende på vad du har placerat ut själv.



Tips från coachen {#tips}
-----------------------

Lär dig felsöka med debuggern, använd den när du får problem. Komplettera med utskrifter av `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!




