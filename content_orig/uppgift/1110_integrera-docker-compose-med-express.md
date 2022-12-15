---
author: mos
category:
    - javascript
    - docker
    - kurs ramverk2
revision:
    "2017-11-13": (C, mos) Lägg till att Express skall köras i godtycklig kontainer.
    "2017-11-01": (B, mos) Förtydliga om att tagga v2.0.0 + en extrauppgift om Dockerfiles.
    "2017-10-20": (A, mos) Första utgåvan.
...
Integrera docker-compose med Express
==================================

Du skall använda Docker för att skapa en miljö för testning som använder flera versioner av Node. Du gör detta genom att skapa en konfiguration för kommandot `docker-compose`.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har installerat Docker och du har jobbat igenom artikeln "[Kom igång med Docker som utvecklingsmiljö](kunskap/kom-igang-med-docker-som-utvecklingsmiljo)".



Introduktion {#intro}
-----------------------

Du skall lägga till kontainrar för test. Kontainrarna skall kunna köra flera versioner av Node (och PHP).



Krav {#krav}
-----------------------

1. Skapa en fil `docker-compose.yml` som startar upp tre olika kontainrar av olika version med PHP och Apache (eller Nginx). Spara filen i `me/kmom02/docker`.

1. Skapa en fil `docker-compose.yml` som startar upp tre olika kontainrar av olika version med Node. Spara filen i `me/redovisa`.

1. Lägg till så man kan starta din redovisa-server i någon av de tre kontainrarna via `make` (alternativt `npm run`) och `make node1`, `make node2` och `make node3`.

1. Tagga och pusha ditt redovisa-repo med v2.0.0. 

1. Gör en dbwebb publish för att kolla att allt validerar och fungerar.

```text
dbwebb publish me
```



Extrauppgift {#extra}
-----------------------

Här är extrauppgifter som du kan försöka lösa för att bli mer vän med Docker.

1. Skapa egna images i form av Dockerfile och lägg dem i ditt redovisa-repo. Låt sedan din `docker-composer.yml` använda sig av dina egna images (vi kommer se exempel på hur detta fungerar i nästa kmom).

1. Se hur Cimage har skapat egna images och publicerat dem i Docker Store. Gör egna images (som bygger på Node) som du publicerar på Docker Store och använder i ditt repo i `me/redovisa`.



Tips från coachen {#tips}
-----------------------

Docker är virtualisering, så det kan troligen krångla beroende på den miljö du har. Ta det lugnt och var envis.

Läs manualen för Docker för att förstå hur det hänger ihop och fungerar.

Lycka till och hojta till i forumet om du behöver hjälp!
