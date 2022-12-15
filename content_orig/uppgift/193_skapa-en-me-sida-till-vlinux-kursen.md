---
author: lew
category:
    - webbprogrammering
    - kursen vlinux
revision:
    "2022-04-20": (C, lew) Uppdatering inför HT22
    "2020-03-11": (B, lew) Uppdatering inför HT20
    "2019-04-05": (A, lew) Uppdatering inför HT19
...
Skapa en me-sida till vlinux-kursen
==================================

Skapa en me-sida för redovisningar i kursen vlinux.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har installerat kursens labbmiljö samt installerat kommandot `dbwebb` och du har clonat kursrepot.



Introduktion {#intro}
-----------------------

I din me-sida skall du samla redovisningstexter och du länka till de uppgifter du löst. Det ger dig en samlad plats att utgå ifrån när du vill visa upp vad du gjort i kursen.

Du kan testa hur me-sidan bör fungera, genom att öppna din exempel-katalog i kursrepot under `example/redovisa`.

Du kan bygga en mer avancerad me-sida om du vill, det går bra. Mallen finns med för de som vill ha en enkel me-sida.

Det är valfritt hur man vill göra sin me-sida. Det fritt fram att byta språk och strukturera om den.



Krav {#krav}
-----------------------

I din kurskatalog (repot) för kursen, skall du ta en kopia av exempelkatalogen `example/redovisa` och lägga i din me-katalog under `me/redovisa`.

```bash
# Gå till kurskatalogen
cp -ri example/redovisa me/
```

1. Uppdatera sidan `redovisning.html`. Här skall du skriva dina redovisningstexter. De finns då kvar hela kursen igenom och är inte beroende utav Canvas.

1. Gör en dbwebb publish för att kolla att allt validerar och fungerar.

```text
dbwebb publish redovisa
```



Extrauppgift {#extra}
-----------------------

Om du har tid och kraft.

1. Bygg en snyggare och mer avancerad me-sida. Ta tillfället i akt och prova nya tekniker/designer etc.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i Discord om du behöver hjälp!
