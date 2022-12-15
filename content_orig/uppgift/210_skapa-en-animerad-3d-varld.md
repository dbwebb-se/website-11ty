---
author:
  - mos
  - efo
category: javascript
revision:
  "2018-10-05": (B, efo) Uppdaterade kravspec från feedback ht17.
  "2015-11-29": (A, mos) Första utgåvan i samband med kursen webgl.
...
Skapa en animerad 3D-värld
==================================

Skapa en animerad 3D värld av kuber som rör sig och flytta runt i världen genom att styra med tangentbordet.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har läst igenom kapitel 5 och 7 i boken "[WebGL Programming Guide](kunskap/boken-webgl-programming-guide)".

Du har studerat [exempelprogrammen i kursrepot](webgl/repo/example) som heter `example/sandboxWebGL5*/` samt `example/sandboxWebGL7*/`.



Introduktion {#intro}
-----------------------

Börja med att ta en kopia av din senaste sandbox, eller från din senaste uppgift.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -ir kmom02/sandbox3/* kmom03/world/
```

Nu har du grunden för att göra uppgiften.



Krav {#krav}
-----------------------



1. Använd JavaScript objekt för att organisera din kod.

1. Skapa (minst) tre kuber. Kuberna skall skilja i storlek, position och färg.

1. Minst en av kuberna skall ha texturer på sidorna.

1. Använd en VP-matris för att styra scenen.

1. Skapa en kontrollpanel som visualiserar nuvarande inställningar på VP-matrisen.

1. Scenen skall animeras.

1. Varje kub skall röra sig individuellt, via rotering, skalning eller translate, för att visa rörelse i scenen.

1. Kontrollpanelen skall kunna pausa animeringen samt styra hastigheten.

1. Använd en HUD för att visualisera prestandan.

1. Använd tangentbordet och/eller musen/touch-event för att navigera i scenen med hjälp av en kamera.

1. Integrera din canvas med din animerade 3D-värld från denna uppgiften i din portfölj.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate world
dbwebb publish world
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Gör extrauppgifterna om du har tid och vill förkovra dig ytterligare.

1. Gör så att kontrollpanelen kan justera samtliga värden i VP-matrisen.

1. Fördela din JavaScript-kod så att varje objekt ligger i en egen fil.

1. Använd fler bilder som underlag gör texturer.

1. Gör en riktigt snygg navigering i scenen via en kombination av tangenter, mus och touch-event. Kontrollera att navigeringen även fungerar på touch-enheter.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
