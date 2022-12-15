---
author: mos
category: webbprogrammering
revision:
  "2015-10-15": (A, mos, lew) Första utgåvan i samband med kursen webgl.
updated: "2015-10-15 14:13:41"
created: "2015-10-11 15:59:41"
...
Rita punkter med WebGL
==================================

Kom igång med WebGL genom att skapa en egen sandbox för tester samt använd din nyskapade sandbox för att göra ett testprogram som ritar punkter på en canvas.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Kom igång och rita med WebGL på en Canvas](kunskap/kom-igang-och-rita-med-webgl-pa-en-canvas)".

Du har läst igenom de två första kapitlen i boken "[WebGL Programming Guide](kunskap/boken-webgl-programming-guide)".



Introduktion {#intro}
-----------------------

Om du har jobbat igenom artiklarna ovan så har du en sandbox2 som du kan utgå ifrån. Använd den som grund för att lösa uppgifterna.



Krav {#krav}
-----------------------



###Del 1 En personlig sandbox {#sandbox}

1. Kika igenom koden i din sandbox. Gör den personlig genom att ändra dess style. Det kan vara storlek eller färg eller något textinslag, bara den blir lite mer personlig som din egen sandbox. Du kan till exempel rita något i den eller skriva något i canvasen.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate sandbox2
dbwebb publish sandbox2
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



###Del 2 Rita punkter på canvas {#points}

1. Kopiera alla filerna i din personliga sandbox2 och lägg dem i katalogen `me/kmom01/point`.

1. Utgå ifrån sista övningen i boken i kapitel 2.

1. När du klickar med musen i canvasen så skall du rita ut en ny punkt med en färg som slumpas fram och en storlek som slumpas fram mellan 5-20 pixlar.

1. När du klickar på en punkt (inom ramen för punktstorleken) ska den försvinna och 4 nya punkter ska ritas ut. Positionen för de nya punkterna ska slumpas fram men behålla färg och storlek från den ursprungliga punkten.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate point
dbwebb publish point
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!




