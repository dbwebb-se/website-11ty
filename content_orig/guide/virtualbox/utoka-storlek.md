---
author: lew
revision:
    "2019-09-16": "(A, lew) Första versionen."
...
Utöka storlek på disk
=======================

Först behöver vi utöka storleken på den virtuella disken. Stäng av din VM om den är igång.

Starta VirtualBox och:

* Klicka på "Tools".
* Klicka på den aktuella disken.
* Dra i slidern eller skriv in önskad storlek. Ta i ordentligt nu.

[FIGURE src=/image/vlinux/diskspace1.PNG caption="Steg 1, 2 och 3"]



### Verifiera

För att se om det gick bra så startar vi vår VM igen. Öppna sedan en terminal och kör kommandot: `$ lsblk`. Du bör då se den nya storleken under "SIZE" på översta raden.

[FIGURE src=/image/vlinux/diskspace3.PNG caption="lsblk output"]


Om den nya storleken syns kan du skippa den här delen nedan och gå vidare.

Syns det inte behöver vi ändra storleken via Windows CMD istället.

* Starta CMD som administratör.
* Ta dig till VirtualBox mapp. `cd "C:\Program Files\Oracle\VirtualBox"`.
* Kör kommandot `VBoxmanage.exe modifyhd "C:\Users\användarnamn\VirtualBox VMs\gästnamn\gästnamn.vdi" --resize 50000` där sista numret står för den nya storleken. 50000 = 50GB.

Starta sedan din VM igen och kör om kommandot `$ lsblk`.
