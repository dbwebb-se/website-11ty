---
author:
    - aar
category:
    - devops
    - labbmiljö
revision:
    "2020-11-05": (A, aar) Första versionen.
...
Installera CircleCi CLI
==================================

Denna artikel visar hur du kommer igång och installerar CircleCi CLI.

<!--more-->

När man jobbar med CircleCi händer det ofta konfigurationsfilen inte är korrekt skriven också får man en mängd med committer där man har försökt att få config filen att vara giltigt. Vi kan minska antalet sådana commits genom att använda CircleCi CLI för att validera config filerna innan vi pushar dem.



Installera CircleCi CLI {#installera}
-------------------------------


### Windows {#windows}

Om du använder WSL kan du följa [linux](#linux) instruktionerna.

Om du använder Cygwin, gå till deras [release sida på GitHub](https://github.com/CircleCI-Public/circleci-cli/releases). 

1. Ladda ner zip filen för windows.

1. Extrahera på valfri plats.

1. Lägg till den nya mappen i PATH.

1. Starta om Cygwin.

Nu ska du kunna använda kommandot `circleci.exe` i terminalen. De andra OS använder `circleci` som kommando och det kommer användas i instruktionerna.



### Linux {#linux}

Använd den [alternativa metoden](https://circleci.com/docs/2.0/local-cli/#alternative-installation-method).



### macOS {#mac}

Använd [brew](https://circleci.com/docs/2.0/local-cli/#install-with-homebrew-macos) eller den [alternativa metoden](https://circleci.com/docs/2.0/local-cli/#alternative-installation-method).



## Konfigurera CLI {#config}

Följ [Configure the CLI](https://circleci.com/docs/2.0/local-cli/#configuring-the-cli).



Validera CircleCi konfigurationer {#validate}
-----------------------------

När verktyget är installera och konfigurerat kan vi använda det för att validera vår CircleCi config för att köra jobb i molnet.

Ställ dig i root mappen för ett repo som innehåller `.circleci/config.yml`. Kör sen:

```
circleci config validate # cygwin, använd circleci.exe

Config file at .circleci/config.yml is valid
```
