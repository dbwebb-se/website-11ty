---
author: lew
revision:
    "2019-09-16": "(A, lew) Första versionen."
...
Utöka partitionen steg 2 - GParted
=======================

Härligt, nu är vi tillslut inne i programmet. Det tar ett tag och vi ser en liknande bild:

[FIGURE src=/image/vlinux/diskspace4.PNG caption="gparted"]

Vi behöver nu ta bort partitionerna mellan den icke-allokerade partitionen och vår primära partition (sda1). Den ena är swap-disken så den behöver vi fixa till senare.

Börja med att ta bort sda5 och sedan sda2, eller motsvarande i er installation. Du tar bort den med högerklick->delete på respektive partition.

När du har tagit bort dem ser det ut såhär:

[FIGURE src=/image/vlinux/diskspace5.PNG caption="Rensat partitioner"]

Högerklicka nu på /dev/sda1 och välj Resize/Move. Dra utrymmet åt höger och spara ca 4GB (4000 MiB) till swap-disken. Klicka sedan på "Resize/Move".

Sist klickar du på den gröna knappen i toppen, "Apply All Operations".

Stäng av VM:en, ta ut skivan och starta igen. Vi ska nu lägga till swap-disken igen.
