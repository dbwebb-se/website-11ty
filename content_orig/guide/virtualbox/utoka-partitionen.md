---
author: lew
revision:
    "2019-09-16": "(A, lew) Första versionen."
...
Utöka partitionen steg 1
=======================

Nu behöver se till så Debian kan använda det nya utrymmet. Vi behöver få tag på en cdrom med ett program som heter "GParted". Vi behöver starta VM:sn med den skivan i så vi inte har systemet igång samtidigt,

* Ladda ner iso-filen: [https://gparted.org/download.php](https://gparted.org/download.php)
* I VirtualBox, klicka på din VM och "settings". Se till så "IDE Secondary Master" är valt och klicka på den lilla blå skivan och sedan "Choose Virtual Optical Disk File...".
* Leta upp filen du laddade ned i steg 1. Klicka på ok.
* Tryck "Enter" vid eventuella förfrågningar. Kör på default.

Om det inte skulle starta - titta i "Settings"->"System" så *optical* ligger före *hard disk*.

[FIGURE src=/image/vlinux/diskspace2.PNG caption="Sätt i den nedladdade skivan"]
