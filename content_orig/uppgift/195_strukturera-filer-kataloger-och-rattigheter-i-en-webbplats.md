---
author: mos
category: webbprogrammering
revision:
  "2016-03-15": (B, mos) Ändrade sättet att rsynca så filerna hamnar i rätt katalog.
  "2015-06-29": (A, mos) Första utgåvan i samband med kursen linux.
updated: "2016-03-15 15:38:43"
created: "2015-06-29 10:46:29"
...
Strukturera filer, kataloger och rättigheter i en webbplats
==================================

Du skall skapa en Apache Named Virtual Host. Du får en färdig webbplats som har filerna i en icke-korrekt struktur. Din uppgift blir att flytta om filerna så att de ligger i en korrekt katalog- och filstruktur med *rätt* rättigheter.

När du är klar så använder du rsync över ssh för att flytta filerna till servern som kör den virtuella hosten.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du utfört uppgiften "[Skapa en webbplats på en Apache Virtual Host](uppgift/skapa-en-webbplats-pa-en-apache-virtual-host)".



Introduktion {#intro}
-----------------------

De filer du skapar och använder i denna uppgiften skall du spara i ditt kursrepo i katalogen `me/kmom02/mysite`. De används för att redovisa uppgiften.

Skapa en fil, `log.txt`, och lägg den i katalogen ovan. 

I uppgiften förutsätts att du genomför arbetet på din lokala arbetsstation och använder rsync över ssh för att föra över filerna till servern.

I uppgiften så får du en ostrukturerad webbplats. Du kopierar den på följande sätt.

```bash
# Ställ dig i kurskatalogen
rsync -av example/mySite/ me/kmom02/mysite/mySite/
```

Nu ligger dina filer i katalogen `me/kmom02/mysite/mySite`. Du skall nu skapa kataloger, radera och flytta om filer så att strukturen på `mySite` blir enligt den önskade strukturen.



Krav {#krav}
-----------------------

1. Skapa en Apache Virtual Host `mysite.linux.se`. Spara config-filen som `mysite.linux.se.conf`. Kontrollera att du kommer åt webbplatsen med din webbläsare. 

1. Använd rsync över ssh för att föra över webbplatsen i `me/kmom02/mysite/mySite` till den virtuella hosten. Skriv kommandot du använder i loggen.

1. I filen `mySite/correct.txt` finns lösningen på strukturen. Skapa och radera filer och kataloger och flytta runt de filer som finns för att uppnå rätt struktur på katalogen. Du behöver även ändra rättigheter. Alla ändringar gör du lokalt i ditt kursrepo. Varje kommando du gör sparar du i loggen. 

1. Använd rsync över ssh för att flytta över filerna och testköra i din virtuella host. Dubbelkolla att det fungerar genom att använda din webbläsare. Ta en skärmdump som visar när du använder webbläsaren för att komma åt webbplatsen `http://mysite.linux.se/`. Spara den som `dump.png`.

1. Installera kommandot `tree`. Använd det och ta reda på exakt vilka parametrar som används för att skapa filen som ligger i `mySite/correct.txt`. Skriv svaret i din loggfil.

1. Publicera dina svar enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb publish mysite
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Stressa inte. Kör det ihop sig så är det en bra taktik att börja om från början och göra om. Det går snabbare andra gången, och ännu snabbare tredje gången.

Lycka till och hojta till i forumet om du behöver hjälp!




