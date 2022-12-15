---
author: mos
category:
    - webbprogrammering
    - kursen javascript1
revision:
    "2017-10-17": (B, mos) Stycke med introduktion.
    "2017-10-09": (A, mos) Ny omarbetead utgåvan.
...
Skapa en me-sida för redovisning i kursen javascript1
==================================

Skapa en me-sida för redovisningar i kursen javascript1.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Skapa din egen Sandbox för JavaScript testprogram](uppgift/skapa-din-egen-sandbox-for-javascript-testprogram)".



Introduktion {#intro}
-----------------------

I din me-sida skall du samla redovisningstexter och du länka till de uppgifter du löst. Det ger dig en samlad plats att utgå ifrån när du vill visa upp vad du gjort i kursen.

Du kan testa hur me-sidan bör fungera, genom att öppna din exempel-katalog i kursrepot under `example/redovisa`.



Krav {#krav}
-----------------------

I din kurskatalog (repot) för kursen, skall du ta en kopia av exempelkatalogen `example/redovisa` och lägga i din me-katalog under `me/redovisa`.

```bash
# Gå till kurskatalogen
cp -ri example/redovisa me
```

1. Du har nu en grund för din me-sida i kursen. Modifiera den så den blir "din egen".

1. Uppdatera sidan `me.html` så att den innehåller en kort presentation av dig själv tillsammans med en bild som får representera dig.

1. I sidan `redovisning.html` skall du skriva dina redovisningstexter. Du kan förbereda redovisningstexten för det första kursmomentet.

1. I sidan `om.html` lägger du till en godtycklig bild som du finner representativ för kursen.

1. Leta reda på kursrepot på GitHub och länka till det från din `om.html`.

1. Du kan uppdatera stylesheet och eventuellt JavaScript i katalogerna `me/style` och `me/js`. Det är inte nödvändigt, gör det om du vill och känner att du har tid.

1. Gör en dbwebb publish för att kolla att allt validerar och fungerar.

```text
dbwebb publish redovisa
```



Extrauppgift {#extra}
-----------------------

Om du har tid och kraft.

1. Lägg extra kraft på style.

1. Lägg till något enkelt JavaScript som snurrar på din bild på me-sidan, när man klickar på den.




Tips från coachen {#tips}
-----------------------

Validera och publicera ofta. Så slipper du en massa validerings- och publiceringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
