---
author: mos
category:
    - kursen design
    - anax flat
    - less
revision:
    "2018-11-12": "(B, mos) Först utgåvan."
    "2018-10-15": "(A, mos) Kopia från 'Bygg en ut ditt Anax Flat med eget LESS tema' och omskriven."
...
Bygg ett tema med vertikalt och horisontellt grid
===================================

Du skall bygga ett tema och implementera stöd för ett vertikalt grid och för ett horisontellt grid.

Du bygger temat så att det är responsivt baserat på ditt vertikala grid.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom kmom02 i design-kursen.

Du har läst läsanvisningar och har viss förståelse för vad ett vertikalt grid är.

Du har läst läsanvisningar och har viss förståelse för vad ett horisontellt grid är. Andra ord för samma sak är typografiskt grid, baseline grid och vertikal rytm.



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.

Du kan se hur jag jobbar igenom stegen i videoserien "[Bygg ett tema med vertikalt och horisontellt grid](https://www.youtube.com/playlist?list=PLKtP9l5q3ce9QJnBXk-hLEBZH035xObxS)".

[YOUTUBE src="JkIc26sHqgY" list="PLKtP9l5q3ce9QJnBXk-hLEBZH035xObxS" width=700 caption="Videoserie som ger dig en introduktion till de olika delarna i att lösa uppgiften."]



### Skapa tema för kmom03 {#temakmom03}

Börja med att skapa ett nytt tema för detta kursmomentet, döp det till `kmom03` och spara filen i `theme/src/kmom03.less`. Du kan använda grunden från ditt tidigare tema `kmom02`.



### Implementera ett vertikalt grid {#vgrid}

Så här kan det se ut när du jobbar med gridet.

[FIGURE src=image/snapht18/vgrid_showgrid.png?w=w3 caption="Placera ut webbsidans innehåll som regioner i ett rutnät (grid)."]

Innan du börjar med detta så blir det enklast om du nollställer alla widths, padding, border och positioneringssätt på dina regioner. Allra enklast är troligen att använda en ny tom `layout/layout_vgrid.less` och implementera integrationen av gridet där. 

Du skall använda dig av ett vertikalt grid i form av modulen [desinax/vertical-grid](https://github.com/desinax/vertical-grid/). I README-filen står det hur du integrerar gridet i ditt eget tema.

Modulen finns redan installerad i ditt repo under `theme/src/@desinax/vertical-grid` så du behöver inte installera något.

Se till att man kan göra showgrid på ditt grid genom att lägga till `?vgrid` på länken till godtycklig sida. Ramverket har stöd för att lägga till klassen `.vgrid` i elementet `<html>`, men du behöver implementera så att gridet verkligen visas.



### Implementera ett horisontellt grid {#hgrid}

Så här kan det se ut när du jobbar med gridet.

[FIGURE src=image/snapht18/hgrid_showgrid.png?w=w3 caption="Skapa en grundtypografi som matchar ett horisontellt grid."]

Innan du börjar med detta så blir det enklast om du nollställer all typografi som du lagt till. Börja med "ren" och ostylad typografi, så gått du kan. Du kan lägga till style på typografin när du är klar med att integrera gridet.

Du skall använda dig av ett horisontellt grid i form av modulen [desinax/typographic-grid](https://github.com/desinax/typographic-grid/). I README-filen står det hur du integrerar gridet i ditt eget tema.

Modulen finns redan installerad i ditt repo under `theme/src/@desinax/typographic-grid` så du behöver inte installera något.

Se till att man kan göra showgrid på ditt grid genom att lägga till `?hgrid` på länken till godtycklig sida. Ramverket har stöd för att lägga till klassen `.hgrid` i elementet `<html>`, men du behöver implementera så att gridet verkligen visas.



### Bekanta dig {#bekanta}

Du kan ta hjälp av videoserien för att kolla in hur man gör ovanstående och hur det kan se ut.

* Anpassa din typografi.
* Hur fungerar `?vgrid` och `?hgrid`?
* Styla 1, 2 och 3 kolumners layout med gridet.
* Hur styla med det vertikala gridet för att få en responsiv webbplats.
* Påminn att wrappers, rader, kolumner inte får stylas med margin-left/right och förslagsvis ej heller padding-left/right.



Krav {#krav}
-----------------------

1. Lägg till en stylesheet `theme/src/kmom03.less` (tema för kmom03), återanvänd de less-moduler du utvecklat i samband med kmom02, eller gör nya.

1. I temat för kmom03, lägg till det vertikala gridet och styla regionerna i din webbplats med gridet. Alla regionder som används skall stylas med gridet. Använd `@desinax/vertical-grid`.

1. I temat för kmom03, lägg till det horisontella gridet. Gör ett medvetet val av typsnitt och eventuellt så stylar du din typgrafi lite extra. Använd `@desinax/typografic-grid`.

1. Jobba med det magiska numret så att alla regioner har en margin-bottom som matchar en multipel av det magiska numret.

1. Gör din webbplats responsiv med hjälp av ditt vertikala grid.

1. Kolumnlayout för en, två och/eller tre kolumners layout skall fungera flexibelt enligt gridet.

1. Regionerna i din webbplats skall fungera väl när det gäller responsiviteten.

1. Man skall kunna visa ditt grid med `?vgrid` och `?hgrid` på godtycklig sida.

1. Aktivera din style `kmom03` som default stylesheet i styleväljaren.

1. Gör en `dbwebb publishpure redovisa` och kontrollera att allt fungerar på studentservern.

1. Committa alla filer, inklusive temats filer och lägg till en (ny) tagg (3.0.\*).

1. Pusha repot till GitHub, inklusive taggarna.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
