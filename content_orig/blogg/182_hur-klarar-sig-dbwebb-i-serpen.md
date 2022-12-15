---
author: mos
category: webbprogrammering
published: "2015-06-17 10:36:24"
updated: "2015-06-17 10:36:26"
created: "2015-06-17 10:36:24"
...
Hur klarar sig dbwebb i serpen?
==================================

För att ha lite koll på vilken trafik som kommer till dbwebb och hur dbwebb hanteras i serpen så har jag tagit ett par bilder från Google Analytics, SIS-index och Google Webmaster. Det är alltid spännande att se hur trafiken till ens webbplats ser ut.

<!--more-->



Google Analytics översikt {#ga}
------------------------------------------------

[FIGURE src=/image/snapvt15/ga-overview.png?w=w2 caption="Översikt av trafiken till dbwebb."]

Det är intressant att se besöksflödet och hur väl det stämmer överens med terminerna. Man ser att vi hade extra många studenter nu under hösten 14 och våren 15.

[FIGURE src=/image/snapvt15/ga-country.png?w=w2 caption="Trafiken fördelad per land."]

En svensk webbplats med så gott som enbart svenska besökare. Ett par sidor är på engelska men det sticker inte ut.

[FIGURE src=/image/snapvt15/ga-browser.png?w=w2 caption="Trafiken fördelad per webbläsare."]

Det är främst Google Chrome och Firefox som används. Intressant att fler använder Safari än Internet Explorer.

[FIGURE src=/image/snapvt15/ga-os.png?w=w2 caption="Trafiken fördelad per operativsystem."]

Två tredjedelar är Windows-användare, var femte använder Mac OS och en av sexton använder Linux.

[FIGURE src=/image/snapvt15/ga-provider.png?w=w2 caption="Trafiken fördelad per internetleverantör."]

Mest trafik från Telia och ComHem.

[FIGURE src=/image/snapvt15/ga-mobile-os.png?w=w2 caption="Trafiken fördelad per mobilt OS."]

Nästan lika många iOS-användare som Android. Andelen Windows verkar vara försvinnande liten när det gäller mobila operativsystem.

[FIGURE src=/image/snapvt15/ga-mobile-provider.png?w=w2 caption="Trafiken fördelad per mobil internetleverantör."]

Via mobiler surfat vi mest via Telia och Tre.

[FIGURE src=/image/snapvt15/ga-mobile-screen.png?w=w2 caption="Trafiken fördelad per mobil skärmupplösning."]

Skärmupplösningen är blandad men var fjärde använder 768x1024.



SIS index {#sis}
------------------------------------------------

[FIGURE src=/image/snapvt15/sis-index-v23.png?w=w2 caption="SIS index vecka 23 2015."]

Informationen hämtas från Google Analytics. Webbplatsen dbwebb har platsen 410 i SIS index.

[FIGURE src=/image/snapvt15/sis-besoksstatistik.png?w=w2 caption="Trend senaste året i besöksstatistiken."]

Här ser vi samma flöde som syns i Google Analytics där besökstrafiken stämmer väl överens med mängden studenter och terminernas upplägg.



Google Analytics översikt {#ga}
------------------------------------------------

[FIGURE src=/image/snapvt15/webmaster-search-analysis.png?w=w2 caption="Google Webmaster visar statistik över söktrafiken."]

Dokumentet som ligger i topp är på engelska och berättar hur man gör en dynamisk meny med PHP. Tydligen har den en bra kombination av söktermer som gör att den hävdar sig i serpen. Hit kommer troligen en stor del trafik från internationella besökare.

Det som är extra intressant att följa är hur artikeln om CImage och image.php sköter sig i serpen. Sakta men säkert jobbar den sig uppåt i positionenen. Nu ligger den på tredje sidan. Men gissningsvis kämpar den sig upp till andra sidan under kommande året. Det är inte dåligt med tanke på den internationella konkurrensen på de sökorden. 

[FIGURE src=/image/snapvt15/webmaster-incoming-links.png?w=w2 caption="Inkommande länkar äv viktigt för pagerank."]

Det ser ut som 133 inkommande länkar är nuvarande läge. Det är intressant att följa när dbwebb kommer att hamna i PR4. Än är vi inte där men antalet inkommande länkar ökar hela tiden så förr eller senare så slår vi över från PR3 till PR4. *Peppar*.



Avslutningsvis {#avslut}
------------------------------------------------

Det finns en tråd i forumet som följer [webbplatsen dbwebbs framfart i serpen](t/522). Där finns historik och en del av de åtgärder som gjorts och det finns även äldre statistik samlad.
