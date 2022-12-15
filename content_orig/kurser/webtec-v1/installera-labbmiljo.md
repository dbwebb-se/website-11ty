---
author: mos
revision:
    "2020-06-11": "(B, mos) Justerade länk till sektion av dbwebb-cli dokumentation."
    "2018-06-19": "(A, mos) Första utgåvan, kopierad från databas-kursen."
...
Installera kursens labbmiljö
==================================

Du behöver installera kursens labbmiljö samt ha tillgång till verktyget `dbwebb` som du installerar i terminalen. När du är klar kan du klona kursrepot där du finner en del av kursens material.

<!--more-->



Labbmiljön {#kurslabbmiljo}
----------------------------------

Det första du behöver göra är att installera en labbmiljö för kursen. Om detta är din första dbwebb-kurs så kan det innebära en hel del jobb och en del nya tekniker. Se till att du har gott om tid när du gör detta.

1. [Installera labbmiljön](./../labbmiljo) som behövs för kursen.



Installera/uppdatera kommandot dbwebb {#dbwebbcli}
----------------------------------

Kommandot, eller verktyget, dbwebb, är ett terminalprogram, skrivet i Bash, som hjälper dig att ha koll på dina filer i kursen. Det hjälper dig också att lämna in resultatet så att lärarna kan rätta och det hjälper dig att publicera till en webbplats för studenter.

Om du redan har installerat kommandot dbwebb så gör du en selfupdate för att vara säker på att du har senaste versionen. Sedan kan du fortsätta till nästa stycke.

```text
dbwebb selfupdate
```

Annars utför du följande steg för att göra en fräsch installation av kommandot dbwebb.

1. [Installera kommandot `dbwebb`](dbwebb-cli/kom-igang-och-installera). Kommandot används under hela kursen för att jobba med kursmaterialet.

1. När du har installerat kommandot så fortsätter du med sektionen för att [konfigurera kommandot `dbwebb`](dbwebb-cli/konfiguration).

Om du vill ha en introduktion till installationen av dbwebb-kommandot, så kikar du på följande video.

[YOUTUBE src=vlZRW2OZamE width=639 caption="Mikael installerar dbwebb-cli som en del av labbmiljön"]




Klona och initiera kursrepot {#clona}
----------------------------------

Kursrepot innehåller en viss del av kursmaterialet och det ger en struktur där du skriver kod för att lösa övningar och uppgifter i kursen. Du hämtar det med hjälp av kommandot dbwebb. Vi kallar det för att du klonar ditt kursrepo. Klona är ett begrepp som används i versionshanteringssystemet Git och betyder gör en exakt kopia av.

1. Läs sektionen om hur du [laddar ned (klona) och initierar ditt lokala kursrepo](dbwebb-cli/kursrepo) som innehåller kursmaterial för kursen.

Den snabba vägen.

```text
# Gå till din katalog för dbwebb-kurser
dbwebb clone webtec
cd webtec
dbwebb init
```

Kursrepot finns publikt på GitHub. Du kan hitta länken till det genom att skriva följande kommando i din terminal.

```text
dbwebb github webtec
```

Bra, det var grunden som behövs. Nu kan du sätta igång "på riktigt" med det första kursmomentet.
