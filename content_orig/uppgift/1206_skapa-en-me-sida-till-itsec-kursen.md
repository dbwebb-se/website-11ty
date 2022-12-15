---
author: nik
category:
    - webbprogrammering
    - kursen itsec
revision:
    "2019-04-05": (A, aurora) Första utgåvan.
...
Skapa en me-sida till itsec-kursen
==================================

Skapa en me-sida för redovisningar i kursen itsec.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har installerat kursens labbmiljö samt installerat kommandot `dbwebb` och du har klonat kursrepot.



Introduktion {#intro}
-----------------------

I din me-sida skall du samla redovisningstexter och du länka till de uppgifter du löst. Det ger dig en samlad plats att utgå ifrån när du vill visa upp vad du gjort i kursen.

Du kan testa hur me-sidan bör fungera, genom att öppna din exempel-katalog i kursrepot under `example/redovisa`.

Du kan bygga en mer avancerad me-sida om du vill, det går bra. Mallen finns med för de som vill ha en enkel me-sida.



Krav {#krav}
-----------------------

I din kurskatalog (repot) för kursen, skall du ta en kopia av exempelkatalogen `example/redovisa` och lägga i din me-katalog under `me/redovisa`.

```bash
# Gå till kurskatalogen
cp -ri example/redovisa me
```

1. Du har nu en grund för din me-sida i kursen. Modifiera den så den blir "din egen".

1. Uppdatera sidan `index.html` så att den innehåller en kort presentation av dig själv tillsammans med en bild som får representera dig.

1. Det finns en mapp, `kmom` som innehåller en html-fil för varje kursmoment. Du kan själv välja om du vill behålla det här upplägget eller om du göra något eget.

1. Du kan uppdatera stylesheet som ligger i katalogen `me/style`. Det är inte nödvändigt, gör det om du vill och känner att du har tid.

1. Gör en dbwebb publish för att kolla att allt validerar och fungerar.

```text
dbwebb publish redovisa
```



Extrauppgift {#extra}
-----------------------

Om du har tid och kraft.

1. Bygg en snyggare och mer avancerad me-sida.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
