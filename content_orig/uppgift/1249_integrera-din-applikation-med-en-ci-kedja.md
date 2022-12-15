---
author: mos
category:
    - kurs mvc
revision:
    "2021-04-30": "(A, mos) Första utgåvan."
...
Integrera din applikation med en CI kedja
===================================

Du har sedan tidigare byggt en applikation i ett ramverk och du har en väl fungerande testsuite av enhetstester och tillhörande validatorer för din applikationskod.

Nu skall vi automatisera så att dessa tester körs av externa byggsystem varje gång som du checkar upp din kod till GitHub/GitLab.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har sedan tidigare ett PHP-ramverk installerat med en egenutvecklad applikation. Du kan välja kodbas för denna uppgiften, välj en av följande och alla tre fungerar för att utföra denna övningen.

* kmom03
* kmom04
* kmom05

<!-- Nästa år kan man enbart bygga vidare på 04 -->

Lokalt kan du köra dina tester genom att installera en lokal utvecklingsmiljö via `make install` och testerna kör du via `make test`.

<!-- testsuiten skall fungera från kmom04 -->

Din applikation har stöd för följande validatorer.

* phpcs
* phpmd
* phpstan

Din applikation har stöd för en testsuite som köras av phpunit.




<!--
Genomgång {#genom}
------------------------

Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.



### Välj utgångsläge för din kodbas {#kodbas}

Du behöver alltså en kodbas som kan köra alla validatorerna och enhetstesterna via `make install test`.

Du kan välja den kodbasen du vill jobba med, välj kmom03, kmom04 eller kmom05. Ta den kodbasen du är mest bekväm med.

Du kommer få möjlighet att snygga till din kod så att kodkvaliteten ökar. I slutändan kommer du få ett betyg på din kodkvalitet.



### Spara filerna i me och publicera studentservern {#me}

Alla filerna sparar du i ditt kursrepo under `me/ci/` (skapa katalogen om den inte finns).

Börja med att kopiera över samtliga filer från din valda existerande kodbas.

```
# Stå i rooten av kursrepot
rsync -a me/game/      me/ci/  # kmom03
rsync -a me/framework/ me/ci/  # kmom04
rsync -a me/orm/       me/ci/  # kmom05
```

Glöm inte uppdatera din `.htaccess`. Publicera till studentservern och dubbelkolla att det fungerar som tidigare.



### Git och GitHub/GitLab {#git}

Du fortsätter att jobba med den kodbas du valt och den har redan kopplingar mot Git och GitHub/GitLab.



### Travis CI {#travisci}

[Travis CI](https://travis-ci.org/) är en tjänst för "continous integration". Du behöver skapa ett konto på den tjänsten, logga in och där koppla samman tjänsten med ditt repo på GitHub/GitLab.

Följande är en badge som påvisar status för ett repos bygge på Travis.

[![Build Status](https://www.travis-ci.com/canax/router.svg?branch=master)](https://www.travis-ci.com/canax/router)



### Scrutinizer CI {#scrutici}

[Scrutinizer CI](https://scrutinizer-ci.com/) är en tjänst för "continous integration". Du behöver skapa ett konto på den tjänsten, logga in och där koppla samman tjänsten med ditt repo på GitHub/GitLab.

Följande är tre badges som påvisar olika aspekter för status på ett repos bygge på Scrutinizer.

[![Build Status](https://scrutinizer-ci.com/g/canax/database/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/database/build-status/master) [![Code Coverage](https://scrutinizer-ci.com/g/canax/router/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/router/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/database/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/database/?branch=master)



### Integrera badges med ditt repo {#integrera}

Här är en README-sida som visar hur det kan se ut när du integrerat dina badges med ditt repo.

* [anax/database](https://github.com/canax/database#readme)



Krav {#krav}
-----------------------

Kraven är uppdelade i sektioner.



### En fungerande test suite {#make}

1. Du har en fungerande testsuite lokalt som fungerar via `make install test`.

1. Du har en suite av enhetstester som fungerar via `make phpunit`.

1. Du har validatorer som fungerar enligt `make phpcs phpmd phpstan`.



### Integrera med Travis CI {#travis}

1. Integrera ditt repo med Travis CI. Varje gång du checkar in din kod till GitHub/GitLab så skall Travis automatiskt checka ut din kod och bygga den.

1. Visa att det fungerar genom att placera en Travis badge, överst i din README-fil som ligger i ditt repo.

1. Bygget på Travis skall fungera och visa en grön badge.



### Integrera med Scrutinizer CI {#scruti}

1. Integrera ditt repo med Scrutinizer CI. Varje gång du checkar in din kod till GitHub/GitLab så skall Scrutinizer automatiskt checka ut din kod och bygga den.

1. Visa att det fungerar genom att placera Scrutinizer badges för "build status", "code coverage" och "code quality", överst i din README-fil som ligger i ditt repo.

1. Bygget på Scrutinizer skall fungera och visa en grön badge. Öviga badges för kodtäckning och kodkvalitet skall fungera och visa status.

1. Du får gärna förbättra din kod för att göra så att den får bättre värden i kodtäckning och i kodkvalitet.



### Publicera {#publicera}

1. Dubbelkolla att webbplatsen fungerar på studentservern genom att göra en `dbwebb publishpure me` och testköra den.

1. Committa alla filer till ditt repo och lägg till en ny tagg (6.0.\*). Öka versionnumret om du lägger till ändringar (6.0.1, 6.0.2 och så vidare). Rättaren kommer normalt sett att använda din senaste tagg som är >= 6.0.0 och < 7.0.0. **Notera** att det är tagg version 6 som vi använder i detta kmom, oavsett vilka taggar du använt tidigare.

1. Pusha upp repot till GitHub/GitLab, inklusive taggarna.

1. Publicera senaste versionen till studentservern med `dbwebb publishpure me`.



<!--
Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

test

make, validators

21, yatzy

-->



Tips från coachen {#tips}
-----------------------

Använd de manualer och lärresurser som Travis CI och Scrutinizer CI erbjuder.

Lycka till och hojta till i chatt och forum om du behöver hjälp!
