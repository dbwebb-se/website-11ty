---
author: mos
category:
    - kurs/design
    - tema
    - less
    - desinax/figure
revision:
    "2018-12-06": "(B, mos) Lägg till composer update för senaste versionen av Anax moduler."
    "2018-12-03": "(A, mos) Vidare utveckling av uppgiften 'Bygg ut ditt Anax Flat tema med stöd för bilder'."
...
Tema och blogg med stöd för bilder
===================================

Du skall lägga till LESS-moduler som hjälper dig att presentera bilder på olika sätt. För att visa att det fungerar bygger du en blogg "Dagens Bild".

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom uppgiften "[Teman med färger och typografi](uppgift/teman-med-farger-och-typografi)" och har motsvarande tema på plats. Du jobbar vidare på något av de teman du gjorde i den uppgiften.

Du har koll på [verktyget Cimage](kurser/design-v2/kmom05#bildhantering). Se även se din me/redovisa under verktyg/kmom05.

Du vet hur du använder shortcoden FIGURE (se din me/redovisa under verktyg/kmom05).

Du har grundläggande koll på [LESS-modulen @desinax/figure](kurser/design-v2/kmom05#desinax).



Introduktion och förberedelser {#intro}
-----------------------

Jobba igenom följande steg för att förbereda dig för uppgiften.

Använd Cimage för att beskära, skala om och/eller processa bilderna. Din sida skall inte ladda större bilder än vad som är nödvändigt eller rimligt.



### Skapa ett nytt tema {#tema}

Utgå från något av dina tidigare teman, skapa ett tema `kmom05.less`.



### Inkludera @desinax/figure {#figure}

Inkludera och aktivera LESS-modulen [@desinax/figure](https://github.com/desinax/figure) i ditt tema. Utgå från dokumentationen i README-filen och de exempel som medföljer modulen. Det bör ge dig vägledning till hur modulen kan integreras.

Modulen finns installerad i din me/redovisa under `theme/src/@desinax/figure`.

Se till att du använder senaste versionen av modulen.

```text
# Stå i me/redovisa/theme
npm update @desinax/figure
make modules-desinax-install
```



### Bygg en blogg med 3 inlägg {#blogg}

Skapa en blogg genom att kopiera en mall för bloggen från exempel-katalogen. Bloggen som du kopierar är en förenklad kopia av den bloggen som körs på dbwebb.se.

```text
# Stå i kursrepot
rsync -av example/blogg me/redovisa/content
```

Du kan öppna bloggen via webbläsaren och länken `htdocs/blogg`.

Kontrollera vilka filer som nu ligger i `me/redovisa/content/blogg` och uppdatera dem med texter så att de matchar kraven nedan.

Du behöver också se till att du har en uppdaterad installation av ramverket Anax och dess moduler. Gör så här.

```text
# Gå till me/redovisa
composer update
```

Nu har du senaste versionen av Anax moduler.



### Plocka fram kameran {#kameran}

Uppgiften handlar delvis om att visa upp bilder ur olika aspekter. Ge dig gärna ut och ta lite nya bilder för din blogg. Men det funkar naturligtvis med andra bilder som du kanske redan har.

Om du mot förmodan inte har några bilder som du vill använda i bloggen så får du leta reda på några passande bilder.



Krav {#krav}
-----------------------

1. Bygg ett tema `kmom05.less`, sätt det som ditt standardtema när du är klar.

1. I ditt tema, inkludera modulen @desinax/figure.

1. Skapa en blogg under `content/blogg` där bloggens tema är "Dagens Bild". Lägg till länken till bloggen i din navbar.

1. Gå ut och fotografera (minst) 3 foton med din kamera och skapa ett blogginlägg för varje bild. I varje blogginlägg visar du bilden ur olika aspekter, minst fyra olika varianter, och beskriver kort med text om själva bilden och dess omständigheter (hur den togs, varför, med vilken kamera och inställningar). Använd Cimage för att beskära eller förändra bilden. Använd shortcode FIGURE för att visa bilden med bildtext. Håll allt kort och enkelt, det är fokus på att presentera bilderna i olika format. Någon bild skall spänna över hela sidan och någon bild skall ha texten flytande runt sig.

1. Bilderna skall fungera responsivt kontra texten, genom att använda den teknik som @desinax/figure erbjuder för att hantera responsiva bilder i text.

1. Gör en `dbwebb publishpure redovisa` och kontrollera att allt fungerar på studentservern.

1. Committa alla filer, inklusive temats filer och lägg till en (ny) tagg (5.0.\*).

1. Pusha repot till GitHub, inklusive taggarna.



Extrauppgift {#extra}
-----------------------

1. Lägg till olika flash-bilder för att representera bloggen och de olika blogg-inläggen.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
