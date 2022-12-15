---
author: mos
category:
    - webbprogrammering
    - javascript
    - kurs webgl
revision:
  "2015-10-08": (A, mos) Första utgåvan i samband med kursen webgl.
...
Skapa en me-sida till webgl-kursen
==================================

Du skall bygga en me-sida där du samlar redovisningar och exempel som du gör i kursen webgl.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har laddat ned kursrepot för kursen webgl och du har jobbat igenom övningen "[Kom i gång med HTML, CSS, JavaScript och Canvas](kunskap/kom-i-gang-med-html-css-javascript-och-canvas)".



Introduktion {#intro}
-----------------------

Det finns en mall till me-sidan i katalogen `example/me`. Du kan utgå från den koden för att skapa din personliga me-sida för kursen.

```bash
# Ställ dig i rooten av kursrepot
cp -ri example/me/* me/redovisa/
```

Nu har du en bas du kan utgå ifrån, spara alla dina filer rörande me-sidan i katalogen `me/redovisa`.

I din me-sida kan du länka till dina övriga exempel, det ger dig en samlad plats att utgå ifrån när du vill visa upp vad du gjort i kursen.

Me-sidan är byggd med jQuery Mobile och den är skalbar även för små terminaler. Du kan (överkurs) läsa mer om hur me-sidan är uppbyggd i artikeln "[Kom igång och skapa en mobil webapp med jQuery Mobile](kunskap/kom-igang-och-skapa-en-mobil-webapp-med-jquery-mobile)".

Du kan testa hur me-sidan bör fungera, via [dbwebbs exempel på me-sidan](webgl/repo/example/me).



Krav {#krav}
-----------------------

1. Fyll din me-sida med innehåll på "Me". Presentera dig själv.

1. Fyll din me-sida med innehåll på "Om". Skriv en rad om kursen och dess sammanhang.

1. Ändra footern så den innnehåller ditt eget namn/signatur.

1. Titta på strukturen i "Redovisning". I slutet på varje kursmoment skriver du din redovisningstext här.

1. Se till att länken till Demo/Sandbox öppnar din egen personliga sandbox.

1. Skapa en ny sida/menyval under demo som heter Demo/Points som öppnar din lösning på uppgiften points, på samma sätt som Demo/Sandbox gör.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate redovisa
dbwebb publish redovisa
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Styla gärna din me-sida med en personlig style genom att lägga till konstruktioner i stylesheeten. 



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!
