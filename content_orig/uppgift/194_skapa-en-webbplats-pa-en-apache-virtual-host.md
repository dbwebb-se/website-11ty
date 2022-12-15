---
author: mos
category: webbprogrammering
revision:
    "2019-04-05": (C, lew) Uppdatering inför HT19.
    "2016-02-18": (B, mos) Förtydliga att configfilen skall sparas i kursrepot.
    "2015-06-29": (A, mos) Första utgåvan i samband med kursen linux.
updated: "2019-04-05 10:03:52"
created: "2015-06-29 10:03:34"
...
Skapa en webbplats på en Apache Virtual Host
==================================

Fixa iordning en webbplats med en Apache Virtual Host. Du får dels konfigurera upp en Named Apache Virtual Host och dels får du använda rsync över ssh för att flytta över filer från din lokala arbetsstation till servern som kör webbplatsen.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom guiden "[Installera webbplatser med Apache Virtual Hosts](kunskap/installera-webbplatser-med-apache-name-based-virtual-hosts)" och guiden "[Kom igång med SSH-nycklar](guide/kom-igang-med-ssh/kom-igang-med-ssh-nycklar)".



Introduktion {#intro}
-----------------------

De filer du skapar och använder i denna uppgiften skall du spara i ditt kursrepo i katalogen `me/kmom02/vhost`. De används för att redovisa uppgiften.

Skapa en fil, `log.txt`, och lägg den i katalogen ovan.

I vissa uppgifter förutsätts att du genomför arbetet på din lokala arbetsstation och använder rsync över ssh för att föra över filerna till servern.



Krav {#krav}
-----------------------

1. Skapa en Apache Virtual Host `me.linux.se`. Spara en kopia av config-filen `me.linux.se.conf` i ditt kursrepo. Kontrollera att du kommer åt webbplatsen med din webbläsare.

1. Använd rsync över ssh för att kopiera din me-sida från `me/redovisa` och lägg den i den virtuella hostens webroot. Skriv kommandot för rsync i din loggfil.

1. Öppna en terminal i din VM, använd `lynx` för att öppna din nyligen skapade webbplats. Skriv kommandot du använder i loggen.

1. Ta en skärmdump på terminalen som visar när du använder `lynx` för att komma åt webbplatsen. Spara den som `dump.png`. Spara bilden i formatet .png och använd små bokstäver i filnamnet.

1. Publicera dina svar enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb publish vhost
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Stressa inte. Kör det ihop sig så är det en bra taktik att börja om från början och göra om. Det går snabbare andra gången, och ännu snabbare tredje gången.

Lycka till och hojta till i forumet om du behöver hjälp!
