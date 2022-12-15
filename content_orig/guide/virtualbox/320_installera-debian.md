---
author: lew
revision:
    "2019-03-14": "(A, lew) Första versionen."
...
Installera Debian
=======================

Sätt upp en virtuell maskin i VirtualBox för Debian {#init}
---------------------------------

Nu skapar vi en virtuell maskin i VirtualBox där vi kan installera Debian.

[INFO]Notera att jag ökar storleken på den virtuella hårddisken. Det är viktigt att den ökas till 25-30Gb.[/INFO]

[YOUTUBE src=02EXUbLy248 width=630 caption="Kenneth skapar en virtuell maskin (VM) i VirtualBox."]

I mitt fall kunde jag installera 64-bitars OS så jag valde den image som hette *amd64*. Om jag bara kunde installera 32-bitars OS så hade jag valt imagen för *i386*.

När man startar den virtuella maskinen så börjar installationsförfarandet för Debian eftersom den bootar från den image som vi lade till.

Var med på att när du klickar i fönstret som kommer upp så låses din mus till det fönstret. För att ta bort låsningen så behöver du klicka på det som kallas *host key* och standard är det den högra `Ctrl`-knappen.

Nu är vi redo att installera Debian.




Installera Debian i en virtuell maskin {#install}
---------------------------------

I följande video så visas proceduren i installationen av Debian. Videon är trimmad så de längsta väntetiderna är bortklippta.

[YOUTUBE src=g4--dWPUubY width=630 caption="Kenneth installerar Debian i en virtuell maskin i VirtualBox."]

Det som du behöver göra är i princip att:

* Välja ditt land, tangentbordslayout och teckenkodning till UTF-8.
* Välj lösenord för root-användaren och skapa en ny användare.
* Välj att bara installera de nödvändiga programvarorna.
* Välj en desktopmiljö

När du är klar kan du logga in på din nya Debian server med antingen root-användaren eller den användaren som du skapade i installationsprocessen. Normalt vill du inte logga in som root-användaren så välj den användare som du skapade. I slutet av videon gör jag en "snapshot" av min installation. Det är som ett bokmärke så skulle något gå sönder kan jag alltid välja att starta Debian i det sparade läget.

Ett bra tips är att gå vidare till att [installera ssh](guide/kom-igang-med-ssh/ssh)
