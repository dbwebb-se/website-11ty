---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1
revision:
    "2017-09-27": "(B, mos) Förtydligande om  hur jobba composer lokalt."
    "2017-09-25": "(A, mos) Första utgåvan."
...
Skapa en PHP-modul på Packagist och integrera med Anax
==================================

[FIGURE src=image/snapht17/packagist-submitted.png?w=c5&cf&a=10,50,50,0 class="right"]

Vi skall se hur vi kan lyfta ut en kodbas som är integrerad i en Anax installation. Vi tar den kodbasen och lägger i ett eget Git-repo som vi publicerar på GitHub. Vi gör en modul av repot och publicerar det på Packagist.

Därefter kan vi åter installera samma kodbas, nu med verktyget composer, in i en installation av Anax.

För att ha en kodbas att jobba på så använder jag mig av REM-servern och skapar en fristående modul som blir enkel att integrera i en godtycklig Anax installation.

<!--more-->



Förutsättning {#pre}
--------------------------------------

Du har god kunskap i REM servern som används i tidigare artiklar som exempelkod. Senaste artikeln som berörde REM servern var "[Att konfigurera routern i Anax](kunskap/att-konfigurera-routern-i-anax)".



En fungerande REM server {#remserver}
--------------------------------------

Dubbelkolla att du har en fungerande REM server i `kmom02/remserver`. Jag kommer att utgå från branchen `route` när jag nu skall skapa ett eget repo för koden.

Nåväl, REM servern ligger redan i ett eget repo. Men där finns också mer saker som gör att det repot egentligen är en helt egen installation av Anax. På samma sätt som din me-sida är en installation av Anax med tillhörande moduler. Jag vill nu lyfta ut enbart de sakerna som är relevanta för en REM server och placera dem i en egen modul. Tanken är att man installerar Anax och sedan lägger till REM servern som en fristående modul med hjälp av composer. Precis som man gör med alla andra Anax-moduler.

Skillnaden är att vi får en mer fristående modul för REM servern som kan bli enklare att återanvända när man har behovet av en REM server i en godtycklig Anax installation, vare sig det är en me-sida som kräver en REM server eller en installation av en fungerande REM server.

Förhoppningen är också att en fristående modul blir enklare att utveckla, testa och underhålla.

Man kan tycka att det är nästan samma sak som det vi redan har i dag. Men det är det inte riktigt. Det är inte enkelt att använda composer för att idag installera REM servern som en del i en me-sida, en installation av Anax. Men det skall vi lösa nu.

I vilket fall som så behöver jag ett kodexempel nu när jag skall visa hur du kan jobba med Packagist och REM servern passar bra till det.



Skapa repo på GitHub {#github-repo}
--------------------------------------

Det första jag behöver är ett repo på GitHub. Alla Anax-moduler ligger under organisationen CAnax på GitHub och där tänker jag även lägga REM servern, närmare bestämt under [canax/remserver](https://github.com/canax/remserver).



Scaffolda ett repo för moduler {#scaffold-repo}
--------------------------------------

Eftersom det händer att jag skapar moduler till Anax med jämna mellanrum så tröttnade jag på att göra copy&paste och gjorde det möjligt att scaffolda fram en bas för en modul.

```bash
# Gå till katalogen där du vill skapa din modul
anax create remserver ramverk1-module
```

Mallen "[ramverk1-module](https://github.com/canax/scaffold/tree/master/scaffold/ramverk1-module)" ger dig en bas för din modul.

Så här kan det se ut.

[ASCIINEMA src=139461]

Då har vi en basstruktur med vanliga filer som används tillsammans med en godtycklig Anax modul.

```text
$ tree -a .
.
├── .gitignore
├── .phpcs.xml
├── .phpdoc.xml
├── .phpmd.xml
├── .phpunit.xml
├── .scaffold
│   └── ramverk1-module
├── .scrutinizer.yml
├── .travis.yml
├── LICENSE.txt
├── Makefile
├── README.md
├── REVISION.md
├── circle.yml
├── composer.json
├── composer.lock
├── config
│   └── remserver.php
├── src
└── test
    └── config.php

4 directories, 17 files
```

Där är vår grund för modulen. Vi är redo för vår första commit och att pusha upp repot till GitHub.

```bash
git init
git add .
git commit -m "first commit from scaffolding"
git remote add origin git@github.com:canax/remserver.git
git push -u origin master
```

Om du följer övningen och gör som jag gör, ta då en extra titt på de filerna som scaffoldats fram, bara så du bekantar dig med dem och kikar snabbt på vad de innehåller. Kanske finns det saker som inte scaffoldats fram på rätt sätt. Scaffolding är ingen ursäkt för att inte ha full koll på sina filer.

Här ser du [repot `canax/remserver` efter första commit](https://github.com/canax/remserver/tree/9208a91d59a57d0cb5bbd522d4db584b4e00551a).



Lägg till filerna till repot {#files}
--------------------------------------

Nu kan jag lägga till alla filer som hör till REM servern. Här är de stegen jag tog.

1. Kopiera källkoden i `src/RemServer`.
1. Kopiera konfigurationsfilerna i `config/remserver*`.
1. Skapa en bas för `$di` i `config/di.php`.
1. Skapa en bas för routern via `config/{route.php,route/remserver.php}`
1. Kopiera manualsidan i `content/`.
1. Uppdatera `composer.json` med beroenden som är nödvändiga.

När det är klart och filerna är uppdaterade så gör jag en commit och pushar repot. Du kan se [läget på repot efter min commit](https://github.com/canax/remserver/tree/13f14c870ca15e0bee0b2d207f562352391fbf13).



En installation av Anax för utveckling {#develop}
--------------------------------------

Jag är nu redo att börja använda min modul i en installation av Anax. För att modulen skall fungera behövs en fullt fungerande installation av Anax med request, response, router, session och de andra grundläggande delarna.

Jag tar och scaffoldar fram en installation av Anax som lämpar sig för utveckling.

```bash
anax create dev ramverk1-site-develop
cd dev
```

Öppna din webbläsare och kontrollera att routes `""`, `"about"` och `"debug/info"` fungerar som du är van vid. Det du har är alltså en enkel installation av Anax som lämpar sig för utveckling.



Composer för modul under utveckling {#composer-develop}
--------------------------------------

Då skall jag installera min modul `anax/remserver` med composer. Men, ännu har jag inte publicerat mitt paket till Packagist så jag behöver en teknik att installera en utvecklingsversion av modulen.

I manualen för composer kan man läsa om hur man [laddar ett godtyckligt repository](https://getcomposer.org/doc/05-repositories.md#vcs) från till exempel GitHub.

Jag kan använde den versionen av koden som ligger på GitHub, genom att lägga till följande konfiguration i `composer.json`.

```json
{
    "require": {
        "anax/remserver": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/canax/remserver.git"
        }
    ]
}
```

Jag jobbar alltså mot "dev-master" som innehåller de senaste ändringarna som pushats mot GitHub.

Så här kan det se ut när jag uppdaterar min installation med ovanstående och uppdaterar med composer update.

[ASCIINEMA src=139431]

Detta innebär att jag kan uppdatera koden på GitHub och sedan göra composer update och min lokala installation blir uppdaterad genom att senaste koden hämtas från repot på GitHub.

Verktyget composer jobbar nu direkt mot senaste versionen som ligger på GitHub.



###Jobba lokalt med länkar {#link}

När jag själv sitter och jobbar med modulerna så brukar jag undvika att göra commit och push efter varje liten ändring jag gör. Min variant är att jag ersätter `vendor/anax/remserver` med en symbolisk länk till min utvecklingsversion av repot som i mitt fall ligger under `~/git/remserver`.

Så här.

```bash
# Jag står i dev
cd vendor/anax
rm -rf remserver
ln -s ~/git/remserver
```

Det innebär att alla ändringar jag gör lokalt i repot `~/git/remserver` slår direkt igenom i min installation och testmiljö. Jag slipper göra uppdateringar som skall committas och pushas till GitHub och sedan hämtas hem med composer.

När jag sedan är klar, jag har pushat allt till GitHub, så kan jag göra en `composer update` och composer tar då bort länken och ersätter den med en ny katalog med innehållet från Github.

Det blir enkelt att utveckla på det viset.



Integrera REM server med Anax {#integrera}
--------------------------------------

Då är modulen på plats i min installation av Anax. Modulen ligger i sitt eget repo och jag kan börja att integrera den. Följande är stegen jag behöver göra för att integrera modulen.

1. Kopiera konfigurationsfilerna för REM servern.
1. Kopiera API dokumentationen.
1. Kopiera och konfigurera router-filerna.
1. Konfigurera tjänsterna `$di`.

Du kan läsa om [installationen steg för steg i README-filen](https://github.com/canax/remserver/blob/master/README.md), men hoppa över biten med "composer require anax/remserver", den biten är redan löst genom att vi hämtar repot från GitHub (eller via länken till det lokala repot).

Nu kan jag integrera, testa och rätta eventuella fel.

Ett av felen som uppträdde rörde sessionen som startas i `$di` och i min remserver. Jag valde att låta sessionen startas i `$di`.

I övrigt gick integrationen väl. Jag har nu ett modul-repo som fungerar tillsammans med Anax. Då tar jag och taggar repot i en första godkänd version v1.0.0.

```bash
git tag -a v1.0.0
git push && git push --tags
```

Nu är jag redo att publicera repot på Packagist så att jag slutligen kan göra en komplett installation med `composer require anax/remserver`.



Publicera repot på Packagist {#publicera}
--------------------------------------

Jag loggar in på Packagist och submittar ett paket kopplat till mitt repo.

[FIGURE src=image/snapht17/packagist-submit.png?w=w2 caption="Submitta ett paket till Packagist genom att ange dess url till GitHub."]

När paketet är submittat ser det ut så här.

[FIGURE src=image/snapht17/packagist-submitted.png?w=w2 caption="Nu är paketet på plats på Packagist."]

Du kan se att Packagist ser att paketet är i version v1.0.0. Kom ihåg att Packagist normalt alltid ger dig senaste taggade versionen när du installerar via composer.

Då var det nästan klart.



###Uppdatera automatiskt {#update}

Vi behöver konfigurera en GitHub service hook så att Packagist kan ta del av uppdateringarna som pushas till GitHub. Annars måste vi klicka på knappen "Update" varje gång vi pushar till GitHub.

[FIGURE src=image/snapht17/packagist-service-hook.png?w=w2 caption="Vi behöver koppla ihop Packagist och GitHub."]

Jag gör som det står i manualen "GitHub Service Hook" som det länkas till i meddelandet. Den snabba versionen är "GitHub repot -> Settings -> Integrations and Services -> Add service -> Packagist". 

Sedan skriver jag in min User och mitt Token, Domain lämnar jag tom. Mitt token finns i min profil på Packagist.

[FIGURE src=image/snapht17/github-connect-packagist.png?w=w2 caption="Koppla ihop Packagist med GitHub."]

Nästa gång jag pushar till GitHub kommer Packagist att automatiskt uppdatera sig och info-rutan med varningstexten om automatisk uppdatering kommer att försvinna från Packagist.

Kom ihåg att Packagist och Composer främst jobbar mot dina taggar och inte mot koden som ligger i din master-branch ("dev-master").

När jag själv jobbar med moduler så jobbar jag lokalt tills jag är klar för att tagga modulen. Det brukar sedan ta fem minuter innan Packagist har uppdaterat sig och därefter kan jag pröva att ta hem senaste versionen med composer update.



###Composer.json gå mot Packagist {#compospack}

Då kan jag uppdatera min `composer.json` i min Anax installation så att den hämtar paketet `anax/remserver` från Packagist istället från GitHub repot. Jag tar bort denna delen i `composer.json`.

```json
{
    "require": {
        "anax/remserver": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/canax/remserver.git"
        }
    ],
},
```

Sedan gör jag en `composer require anax/remserver`.

```bash
composer require anax/remserver
```

Jag bör se att den nya versionen hämtas hem och ersätter min "dev-master".

Vi är klara och har modulariserat REM servern som nu har en struktur som gör den enklare att vidareutveckla och underhålla samt samexistera med en installation av Anax.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har gått igenom hur man skapar en fristående modul, hur man kan jobba med den och hur man kan publicera den på GitHub och Packagist och hur den kan hanteras med composer.

Denna artikel har en [egen forumtråd](t/6840) som du kan ställa frågor i, eller bidra med tips och trix.
