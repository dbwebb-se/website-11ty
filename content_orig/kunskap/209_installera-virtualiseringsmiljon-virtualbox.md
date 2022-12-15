---
author: mos
category: labbmiljo
revision:
    "2018-12-17": (B, lew) Update for VT19.
    "2015-06-24": (A, mos) Första utgåvan.
updated: "2018-12-17 10:40:19"
created: "2015-06-24 06:32:00"
...
Installera virtualiseringsmiljön VirtualBox
==================================

[FIGURE src=/image/snapht15/vb-installed.png?w=c5 class="right" caption="VirtualBox."]

VirtualBox är en virtualiseringsmiljö som du kan installera på din egna maskin och därefter installera godtyckligt operativsystem i applikationen VirtualBox.

Jag visar hur du kommer igång och installerar Virtualbox först. Nästa steg blir att installera ett annat operativsystem inuti VirtualBox.

<!--more-->



Att vara medveten om  {#om}
---------------------------------

När jag gör installationen nedan så kör jag i Windows 10. VirtualBox är beroende av din hårdvara så vissa saker kan skilja, men i stort sett är det samma process om du är på en Mac- eller Linux-maskin.

Rekommendationen är att du använder en nyare dator med minst 6GB internminne. Annars är risken att det går lite för långsamt.



Hämta installationsprogrammet  {#download}
---------------------------------

Du kan läsa om [VirtualBox på deras hemsida](https://www.virtualbox.org/).

Det finns en sektion där du kan [ladda ned installationsprogrammet](https://www.virtualbox.org/wiki/Downloads).

Ladda ned "VirtualBox platform package".

"VirtualBox platform package" är själva installationsprogrammet till VirtualBox och allt i det paketet är under licensen GNU.

Det finns även ett paket som heter "VirtualBox Extension Pack". Det innehåller extra drivrutiner och komponenter som inte lyder under licensen GNU. Du kan avvakta att ladda ned det tills senare.



Installera {#install}
--------------------------------------

Leta reda på installationsfilen för "VirtualBox platform package", starta installationsprogrammet.

Använd standardinställnignar som visas i installationsprogrammet.

När det är klart så startar programmet upp av sig självt.

<!-- [FIGURE src=/image/snapht15/vb-installed.png?w=w2 caption="Startbilden för VirtualBox."] -->

Så här ser det ut i sammanfattning när jag installerar VirtualBox på min egen maskin.

[YOUTUBE src=xf3RhqsKEnA width=630 caption="Kenneth installerar VirtualBox på Windows 10."]



Nästa steg? {#nasta}
--------------------------------------

Ett bra nästa steg vore att provinstallera ett operativsystem i VirtualBox, bara för att se hur det fungerar.

Du kan se hur jag installerar Debian/Linux i artikeln "[Installera Debian (på VirtualBox)](kunskap/installera-debian-pa-virtualbox)".



Avslutningsvis {#avslutning}
--------------------------------------

Nu har du kommit igång med första steget i virtualisering och att ha möjligheten att installera flera operativsystem på din egen maskin.

Det finns en egen forumtråd om att [komma igång med VirtualBox](t/4062). Fråga gärna där.
