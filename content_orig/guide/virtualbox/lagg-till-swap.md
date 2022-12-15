---
author: lew
revision:
    "2019-09-16": "(A, lew) Första versionen."
...
Lägg till swap
=======================

Det kan komma lite tröga felmeddelanden vid uppstart då vi ändrat vilka diskar som ska vara inblandade i systemet. Speciellt "A start job is running for /dev/disk/by-uuid/.....". Vi väntar ut den och startar terminalen.

Väl där så installerar vi gparted. Nu behöver vi det samtidigt som vi kör systemet.

```bash
$ sudo apt-get install gparted
```

Vi startar det sedan från menyn i Desktop Environment. Bör ligga under "menu"->"Administration"->GParted.

Högerklicka på det icke-allokerade utrymmet och välj "New". Under "File System" hittar du "linux-swap". Välj den. Klicka sedan på OK och den gröna bocken igen, "Apply All Operations".

[FIGURE src=/image/vlinux/diskspace6.PNG caption="Skapa partition för swap"]

När det är klart så högerklickar du på den nya partitionen och väljer "Information" längst ner. Kopiera UUID:t.

Starta terminalen och kör som root: `$ nano /etc/fstab`.

Byt ut UUID:t under "swap" mot det du kopierade. Spara filen.

Det sista du behöver göra är att aktivera den nya partitionen inifrån GParted. Högerklicka på partitionen och välj "swapon". Starta sedan om din VM.

Klart.
