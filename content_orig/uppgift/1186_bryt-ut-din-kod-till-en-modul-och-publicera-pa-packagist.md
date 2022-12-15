---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2018-11-19": "(A, mos) Första utgåvan."
...
Bryt ut din kod till en modul och publicera på Packagist
===================================

Du skall lyfta ut din egna kod som du skrivit för att lösa uppgifterna så här långt i kursen och samla all kod i en egen modul som ligger i ett eget repo som du publicerar till GitHub.

Därefter lägger du ut modulen på Packagist så att den blir enkel att instalelra med composer.

Slutligen integrerar du återigen modulen i din redovisa-sida, men nu installerar du den som en modul med composer.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[En webbtjänst för att visa väderprognos och historiskt väder](uppgift/en-webbtjanst-for-att-visa-vaderprognos-och-historiskt-vader)".



Introduktion och förberedelse {#intro}
-----------------------

Jobba igenom följande för att förbereda dig för uppgiften.



### Stabil bas {#bas}

Innan du börjar, se till att du har en stabil kodbas i din `me/redovisa` som är taggad så du har något att gå tillbaka till om "allt går fel".



### Nytt repo för modulen {#repo}

Du skall bryta ut din egen kod relaterad till uppgiften "En webbtjänst för att visa väderprognos och historiskt väder".

Skapa en ny katalog under `me/module`. Gör ett git-repo av katalogen flytta över de delar som enbart skall ligga i modulen.

Kanske har du filer i någon av följande kataloger som måste flyttas till modulen? Eler kan något ligga kvar i redovisa-installationen?

* `config/modul.php`
* `config/{di,router}`?
* `content/`?
* `src/`
* `test/`
* `view/`

Kopiera över de konfigurationsfiler som du vill använda.

Se till att `make install test` fungerar.

Publicera modulen på GitHub

Tagga en version.



### Modul till Packagist {#packagist}

Publicera din modul till Packagist och se till att Packagist uppdaterar sig automatiskt vid varje ny push till GitHub.



### README för installationen {#installation}

Dokumentera i din `README.md` hur man installerar din modul.

Ett enkelt sätt att installera modulen är att, efter man gjort `composer require`, rsynca över de filer som behövs.

```text
# Stå i rooten av me/redovisa
rsync -av vendor/ditt-vendor-namn/modul/config config/
rsync -av vendor/ditt-vendor-namn/modul/view view/
```

Se till att namnge dina filer så att de inte skriver över andra filer som användaren kan ha installerat i sin `me/redovisa`.

<!--
Tydliggör att alla delar skall flyttas, ipvalidator, geo, väder och så vidare.
src-mappen i me/redovisa blir alltså tom.
-->



Krav {#krav}
-----------------------

1. Flytta all kod relaterad till uppgiften "En webbtjänst för att visa väderprognos och historiskt väder", placera i ett eget repo som du publicerar på GitHub.

1. Se till att din modul täcks av enhetstester och övriga testverktyg i `make test`.

1. Se till att modulen har en `REVISION.md` och en `LICENSE.txt`.

1. Skriv en `README.md` till modulen som berättar hur man via composer installerar och integrerar modulen till en Anax installation likt din redovisa-sida.

1. Tagga en version av repot och publicera det på Packagist.

1. Följ dina egna instruktioner från filen `README.md` och installera modulen i din me-sida.

1. Kör `make test` för att kolla att du inte har några valideringsfel och att testfallen går igenom (både i redovisa och i modulen).

1. Gör en `dbwebb publish redovisa` och kontrollera att redovisa fungerar på studentservern.

1. Committa me/redovisa och tagga 4.0.\*.

1. Modulen me/module taggar du med 1.0.\*.

1. Pusha de båda repona till GitHub, inklusive taggarna. Dubbelkolla att Packagist har senaste versionen av modulen.

<!--
Badge för packagist skall finnas på både modulen och me/redovisa README.

-->



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
