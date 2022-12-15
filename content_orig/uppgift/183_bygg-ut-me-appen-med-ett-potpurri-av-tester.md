---
author: mos
category: webbprogrammering
revision:
  "2015-11-25": (B, mos) Ny variant då den gamla försvann.
  "2015-10-26": (A, mos) Första utgåvan i samband med kursen webapp.
updated: "2015-11-25 12:41:22"
created: "2015-01-28 15:23:14"
...
Bygg ut me-appen med ett potpurri av tester
==================================

För att vidare bekanta oss med utveckling av webappar för mobila enheter så bygger vi lite blandade testprogram. Allt för att bekanta oss mer med en utvecklingsmiljö för de mobila enheterna.

Vi skapar kod i HTML, CSS och JavaScript tillsammans med jQuery Mobile.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Att göra en mobilapp av en mobil-anpassad webbplats](kunskap/att-gora-en-mobilapp-av-en-mobil-anpassad-webbplats)".



Introduktion {#intro}
-----------------------

Börja med att ta en kopia av din egen kod från föregående uppgift.

```bash
# Ställ dig i rooten av kursrepot
cd me
cp -ri kmom01/me1/* kmom02/me2/
```

Nu har du din bas du kan utgå ifrån, spara alla dina filer i katalogen `me/kmom02/me2`.

Om du vill ha bilder så kan du använda de som ligger i `example/meapp2/img`.

Bygg nu vidare på din meapp och lägg till funktionalitet enligt kraven nedan.



Krav {#krav}
-----------------------

1. Skapa en undermeny för dina testprogram, likt den som visas i artikeln.

1. Gör en undersida som visa detaljer om enheten genom att visa [detaljer från Screen-API:et](https://developer.mozilla.org/en-US/docs/Web/API/Screen). Visa minst detaljer om minst 7 Screen properties, inklusive den informationen som visades i artikeln (width, height, orientering).

1. Skapa en undersida som visar swipe och touch-event. Stöd minst de som visas i artikeln.

1. Skapa en undersida som ritar på en canvas med click och touch-event.

1. Skapa en lista med foton, klickar man på listan visas en ny sida med fotot och informationom fotot, precis som i artikeln. Använd eventet swipeleft för att navigera bakåt. Använd gärna egna bilder och texter.

1. Bygg ytterligare en valfri undersida och testa något valfritt. Skriv på sidan vad du testar.

1. Ta en skärmdump när du kör din meapp i simulatorn från Android. Spara filen som `android.png`.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate me2
dbwebb publish me2
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Lägg lite extra tid på att göra följande extrauppgifter.

* Installera din meapp på hemmaskärmen på din egen mobil och testa hur det fungerar.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




