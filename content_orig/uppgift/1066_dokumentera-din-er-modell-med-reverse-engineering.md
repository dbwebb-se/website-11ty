---
author:
    - mos
category:
    - php
    - kurs oophp
    - anax-lite
    - databasmodellering
revision:
    "2017-04-18": "(A, mos) Första utgåvan."
...
Dokumentera din ER-modell med Reverse Engineering
==================================

Din databas håller på och växer och du vill dokumentera den genom att rita upp en ER-modell med hjälp av MySQL Workbenchs "Reverse Engineering" samt spara ned en kopia av din databas till en SQL-fil.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du kan använda MySQL Workbench sedan tidigare.



Introduktion {#intro}
-----------------------

Se när Mikael gör reverse engineering och skapar en ER-modell av en befintlig databas. Exemplet visas [1 timme in i videon](https://youtu.be/fqC_VQh_E74?t=3629).

Använd kommandot [`mysqldump`](https://dev.mysql.com/doc/refman/5.7/en/mysqldump.html) för att dumpa ut SQL-kod från en databas, som en backup av databasen som kan flyttas till en annan maskin.



Krav {#krav}
-----------------------

1. Gör en ER-modell via MySQL Workbench Reverse Engineering. Spara modellen som en MySQL Workbeng Models och döp till `anax-lite.mwb`.

1. Spara ned SQL-koden för din databas och döp till `anax-lite.sql`.

1. Ta en snapshot av din ER-modell och spara som en PNG-fil döpt till `er.png` (kom ihåg att spara med små bokstäver i filnamnet).

1. Skriv en kort beskrivning av din databas (i Markdown) i filen `anax-lite.md`. Det räcker om du skriver en introduktion och en en-raders kommentar till varje tabell.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
