---
author: mos
category:
    - kurs webtec
revision:
    "2021-06-20": "(A, mos) Första utgåvan."
...
Skapa en "One Page Website"
===================================

Du skall bygga en webbplats om en sida med HTML och CSS för att träna på olika koncept och konstruktioner med HTML och CSS.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har en rapportsida för kursen där du skriver redovisningstexter.

Du har grundläggande förståelse för HTML och CSS.




<!--
Genomgång {#genom}
------------------------

Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

I katalogen `example/onepage` ligger en mall till denna uppgiften. Du kan börja att öppna mallen i din webbläsare och se hur den ser ut.

Du skall kopiera mallen till din me-katalog och sedan är du redo att börja jobba.

Kopiera katalogen med kommandot `rsync`, så här.

```text
# Gå till rooten av ditt kursrepo
rsync -av example/onepage me/
```

Nu kan du öppna katalogen `me/onepage` i din webbläsare och nu är du redoa att börja jobba.



Krav {#krav}
-----------------------

Utför följande krav.

1. Spara alla filerna i ditt kursrepo under `me/onepage`.

1. I filen `onepage.html` finns det instruktioner. Utför dem för att bygga en webbsida med olika konstruktioner och olika style.

<!--
1. Sidan skall validera i Unicorn.
-->

1. Besvara följande frågor i din redovisningstext.

    * Berätta hur det gick att lösa uppgiften, var något extra svårt, lurigt, krångligt eller flöt det på smidigt?
    * Är det något som du är extra nöjd med i ditt resultat från uppgifterna?



Publicera {#publicera}
-----------------------

Avsluta uppgiften så här.

1. Testa ditt resultat så att det passera de automatiska testerna med `dbwebb test onepage`.

1. När du är klar kan du publicera resultatet med `dbwebb publish onepage`.
