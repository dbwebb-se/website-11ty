---
author: mos
category: webbprogrammering
revision:
    "2017-03-10": (B, aar) Tog bort krav om firefox OS.
    "2015-10-26": (A, mos) Första utgåvan i samband med kursen webapp.
updated: "2015-10-26 16:23:09"
created: "2015-01-28 15:22:55"
...
Skapa en me-app till webapp-kursen
==================================

Du skall bygga en me-app, som en me-sida men fokus på mobila enheter. Du använder jQuery mobile.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Kom igång och skapa en mobil webapp med jQuery Mobile](kunskap/kom-igang-och-skapa-en-mobil-webapp-med-jquery-mobile)".



Introduktion {#intro}
-----------------------

Om du har gjort enligt övningen i artikeln ovan så har du i stort sett redan klarat av uppgiften.

Börja med att ta en kopia av koden från artikeln.

```bash
# Ställ dig i rooten av kursrepot
cd me/kmom01
cp -ri meapp/* me1/
```

Nu har du din bas du kan utgå ifrån, spara alla dina filer i katalogen `me/kmom01/me1`.



Krav {#krav}
-----------------------

1. Bygg en me-app i jQuery Mobile.

1. Din me-app skall innehålla tre sidor. Me, Report och About.

1. Fyll sidorna med relevant innehåll. Det skall finnas minst en bild.

1. Det skall finnas en meny i form av en Panel för att navigera mellan sidorna.

1. Meny i panelen skall vara byggd med en Listview.

1. Det skall finnas en gemensam header och footer som visas på varje sida.

1. Gör din me-app personlig, så man ser att det är din me-app.

11. Validera och publicera din kod enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb validate me1
dbwebb publish me1
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Är du nöjd med resultatet? Om du har extra tid så kan du lägga det till exempel på någon av följande delar.

* Vill du lägga till något extra? Gör det. Lek och testa.
* Jobba med din style, gör den personlig genom att lägga till egen stylesheet.
* Gör ett eget tema med ThemeBuildern.



Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

När du gör *publish* så körs även *validate*. Blir det för mycket fel när du kör *publish* så kan det bli enklare att bara göra *validate* till att börja med.

Lycka till och hojta till i forumet om du behöver hjälp!




