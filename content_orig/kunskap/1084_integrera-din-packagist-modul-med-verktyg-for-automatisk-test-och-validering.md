---
author:
    - mos
category:
    - anax
    - php
    - kursen ramverk1
revision:
    "2018-11-26": "(C, mos) Genomläst inför ht18, valde dock att inte ändra dokumentet."
    "2017-10-03": "(B, mos) Stycke om CodeClimate och om jämförelse mellan tjänsterna."
    "2017-10-02": "(A, mos) Första utgåvan."
...
Integrera din packagist modul med verktyg för automatisk test och validering
==================================

[FIGURE src=image/snapht17/scrutinizer.png?w=c5&cf&a=30,10,25,65 class="right"]

Vi utgår från den modul vi tidigare publicerade på GitHub och Packagist. Modulen innehåller rutiner för enhetstester och kodvalidering. Vi skall nu integrera modulen med externa tjänster som utför dessa tester varje gång vi committar ändringar eller gör pull requests mot repot.

Vi integrerar med en handfull tjänster såsom Travis, CircleCI, Scrutinizer och SensioLab samt knyter in några av dem till en Gitter-kanal för utvecklare av modulen. Vi får ett flöde för automatiserade tester som skapar grunden för begreppet CI, _Continuous Integration_. Varje commit kickar igång ett flöde där vår modul integreras och testas mot beroenden i ett antal miljöer och system.

<!--more-->

Per automatik kan vi följa upp analyser och statistik över vår kod och vi får nyckeltal som ger indikationer om hur hälsosam koden är.

Jag väljer att jobba vidare med min REM server som nu är modulariserad och publicerad på GitHub och Packagist.



Förutsättning {#pre}
--------------------------------------

Du har jobbat igenom artikeln "[Skapa en PHP-modul på Packagist och integrera med Anax](kunskap/skapa-en-php-modul-pa-packagist-och-integrera-med-anax)".



Videoserie {#video}
--------------------------------------

Till denna artikel finns en [videoserie](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-IxTc7j499fXMJ9tMOpTHH) som visar hur jag integrerar mot de olika tjänsterna. Videornas namn börjar på 600 till 610. Kika på videorna parallellt med att du läser artikeln eller börja med att titta på dem innan du går igenom artikeln.

Några av videorna finns länkade till från artikeln, men spellistan innehåller även videos som inte är länkade till från artikeln. Det är ett bra tips att titta igenom spellistan i sin helhet, innan du tar tag i artikeln.



En REM server {#remserver}
--------------------------------------

För att visa hur det fungerar så behöver vi en modul. Jag väljer att jobba med modulen REM server som finns på [GitHub under `canax/remserver`](https://github.com/canax/remserver/) och på [Packagist som `anax/remserver`](https://packagist.org/packages/anax/remserver).

Det vi nu kommer att göra handlar mest om att konfigurera kopplingar mellan GitHub och externa tjänster för automatiserade tester och kodvalidering.

Du kommer behöva skaffa konton på respektive tjänst. Men på de flesta kan du använda ditt konto från GitHub för att logga in.



Automatisera tester {#maketest}
--------------------------------------

Vi pratar om autmatiserade tester och det förutsätter att jag har (någon form av) enhetstester och validering på mitt repo.

Det fungerar nu på följande sätt i mitt repo för modulen.

```text
make install
make check
make test
```

Vid `make install` installeras en lokal utvecklingsmiljö i repot. Du kan se vilken exekverbar som används, var den är installerad och dess version via `make check`. Testerna körs sedan när du gör `make test` och de körs bara om det finns underlag, eller tillgängliga konfigurationsfiler.

Som det är nu så är det bara phpunit som kan göra att `make test` misslyckas. Verktygen phpcs och phpmd körs men även om de hittar fel så avbryts inte testerna. Det är så makefilen är konfigurerad i sitt utgångsläge. Vill man vara hårdare och avbryta testerna när phpcs/phpmd misslyckas så kan man konfigurera om makefilen. I grunden handlar det om att makefilen tolka exit-värdet för en process och om den inte är 0 så säger makefilen att testet gick fel och avbryter vidare exekvering.

Makefilen och installationen av en lokal utvecklingsmiljö och möjligheten att köra hela testsuiten är central för automatiserade tester. Detta innebär att godtyckligt system kan checka ut repot och köra `make install test` för att köra hela testsuiten.

Vill jag se hur bra kodtäckning jag har på mina enhetstester så ligger den informationen under `build/coverage` och kan inspekteras i en webbläsare. Du kan se samma för din egen modul.

När man installerar externa verktyg så kan man välja att göra detta via composer. Det går att sätta upp en separat del i `composer.json` som enbart installeras i en utvecklingsmiljö. Man använder en sektion `require-dev` i filen. Jag valde dock att installera phar-filer via wget, jag fick känslan att det gick snabbare. Kanske är dock installation via composer att föredra i längden då det blir enklare att bestämma exakta versioner av utvecklingsverktygen. Men jag låter det vara osagt. Du är iallafall medveten av dessa två alternativ för att bygga upp sin lokala utvecklingsmiljö.

Då börjar vi integrera modul repot mot externa tjänster.



Travis {#travis}
--------------------------------------

Vi börjar med att integrera mot tjänsten [Travis](https://travis-ci.org/). bekanta dig med webbplatsen och kika kort i dess dokumentation.

Du kan sedan studera [Travis statusen för GitHub organisationen CAnax](https://travis-ci.org/canax) och alla dess moduler som omfattas av automatiserade tester. Klicka dig in på en av modulerna för att se status på dess senaste bygge.

[FIGURE src=image/snapht17/travis.png?w=w3 caption="Travis har koll på hur modulerna i Anax klarar sina automatiserade tester."]

I min modul finns redan en konfigurationsfil `.travis.yml` för Travis och det gör det enkelt för mig att lägga till min nya modul till Travis.

Du kan titta på denna video hur jag går tillväga för att lägga till modulen på Travis.

[YOUTUBE src="KGe6r4B3ZSg" width=630 list="PLKtP9l5q3ce-IxTc7j499fXMJ9tMOpTHH" caption="Mikael visar hur han integrerar med Travis."]

När du är klar får du en badge som visar status för din moduls senaste bygge, integrera den i din moduls README.

[![Build Status](https://travis-ci.org/canax/remserver.svg?branch=master)](https://travis-ci.org/canax/remserver)



CircleCI {#circleci}
--------------------------------------

Nästa tjänst är [CircleCI](https://circleci.com/). Bekanta dig med webbplatsen och logga in.

Likt Travis det en byggtjänst som kan köra automatiserade tester genom att checka ut repon från GitHub. Egentligen räcker det men en tjänst, men vi tar och integrerar vårt repo mot CircleCI också.

Via CircleCI kan du se status för de [senaste byggena för modulen `anax/di`](https://circleci.com/gh/canax/remserver).

[FIGURE src=image/snapht17/circleci.png?w=w3 caption="CircleCI är en byggmiljö likt Travis."]

I mitt modul-repo finns en konfigurationsfil `circle.yml` och med den kan jag lägga upp mitt repo så att CircleCI checkar ut det och kör mina tester.

Så här kan det se ut.

[YOUTUBE src="Bu1Ok5wSoDA" width=630 list="PLKtP9l5q3ce-IxTc7j499fXMJ9tMOpTHH" caption="Mikael visar hur han integrerar med CircleCI."]

När du är klar får du en badge. Lägg den till din README.

[![CircleCI](https://circleci.com/gh/canax/remserver.svg?style=svg)](https://circleci.com/gh/canax/remserver)



Scrutinizer {#scrutinizer}
--------------------------------------

[Scrutinizer](https://scrutinizer-ci.com/) är nästa byggtjänst som även visar kodtäckning och avger ett omdöme om din kodkvalitet. Logga in och bekanta dig med tjänsten.

Du kan se hur detaljer om [modulen `anax/di` presenteras](https://scrutinizer-ci.com/g/canax/di/). Scrutinizer gör sin egen bedömning om kodens kvalitet och utger ett omdöme om modulens delar samt ger bas för förbättringdsförslag för koden. Man ser även hur mycket kodtäckning enhetstesterna har och man kan se vilka delar av koden som är täckta eller ej.

Ett verktyg likt Scrutinizer kan ge dig indikationer på kodens kvalitet.

[FIGURE src=image/snapht17/scrutinizer.png?w=w3 caption="Via Scrutinizer kan du få mer detaljerad information om din kod via statiskt kodanalys."]

I mitt repo finns en konfigurationsfil `.scrutinizer.yml` och med den kan jag integrera mitt repo med Scrutinizer.

Så här kan det se ut när jag lägger till Scrutinizer.

[YOUTUBE src="Xzq28ZbX6tc" width=630 list="PLKtP9l5q3ce-IxTc7j499fXMJ9tMOpTHH" caption="Mikael visar hur han integrerar med Scrutinizer."]

När du är klar får du inte bara en badge, du får tre stycken att lägga till i din README.

[![Build Status](https://scrutinizer-ci.com/g/canax/remserver/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/remserver/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/remserver/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/remserver/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/canax/remserver/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/remserver/?branch=master)



Sensiolabs {#sensiolabs}
--------------------------------------

Tjänsten [SensioLabsInsight](https://insight.sensiolabs.com/) är kopplad till företaget bakom Symfony. Logga in och bekanta dig med tjänsten.

Tjänsten fokuserar på kodens kvalitet och lyfter fram de saker du kan behöva jobba med för att göra koden bättre.

Du kan se status för [senaste bygget för `anax/di`](https://insight.sensiolabs.com/projects/850a0607-ad17-4dcc-924c-ad0bb6ae8d63).

Så här kan det se ut när jag lägger till SensioLabs.

[YOUTUBE src="GikG2qXffoU" width=630 list="PLKtP9l5q3ce-IxTc7j499fXMJ9tMOpTHH" caption="Mikael visar hur han integrerar med SensioLabs."]

När du är klar får du naturligtvis en badge.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/067df5c1-e2f6-4f2e-b479-79cfe511ae7c/mini.png)](https://insight.sensiolabs.com/projects/5c8cab98-b8f2-4cce-8003-a67c307282fd)



CodeClimate {#codeclimate}
--------------------------------------

Tjänsten [CodeClimate](https://codeclimate.com/) är ytterligare ett exempel på en tjänst för kodkvalitet och statisk kodanalys.

Här kan du se rapporten för [CodeClimate och anax/remserver](https://codeclimate.com/github/canax/remserver).

[FIGURE src=image/snapht17/codeclimate.png?w=w3 caption="Via CodeClimate kan du få detaljerad information om din kod via statiskt kodanalys."]

När du integrerar mot CodeClimate får du två eller tre badges.

[![Code Climate](https://codeclimate.com/github/canax/remserver/badges/gpa.svg)](https://codeclimate.com/github/canax/remserver)
[![Issue Count](https://codeclimate.com/github/canax/remserver/badges/issue_count.svg)](https://codeclimate.com/github/canax/remserver)

Den tredje badgen har med kodtäckning att göra. Dock kan CodeClimate inte på egen hand generera en rapport för kodtäckning. Ditt byggsystem som kör testerna, till exempel Travis eller CircleCI, behöver konfigureras så att de skickar en rapport till CodeClimate. Se detta som ett exempel på hur system i din CI kedja kan samverka och bifoga information till varandra.

Konfigurationsfilen för CodeClimate heter `.codeclimate.yml`.



Gitter {#gitter}
--------------------------------------

Via chatt tjänsten Gitter kan du skapa en [egen chattkanal](https://gitter.im/canax/remserver) för ditt repo. Du kan också koppla Git repot till kanalen så att man ser alla commits och taggar mot repot.

Det går också att koppla upp status för när Travis och CircleCI checkar ut och testar din kod. Om någon av dem misslyckas så syns det i chatt-kanalen.

När man jobbar i team om att utveckla mjukvara kan detta vara ett sätt att hålla sig ajour med senaste status för en modul.

Så här kan det se ut när jag skapar Gitter-kanalen och konfigurerar den för att ta emot notifikationer frå de externa tjänster som bygger koden vid varje commit och pull request.

[YOUTUBE src="durqA90yeM4" width=630 list="PLKtP9l5q3ce-IxTc7j499fXMJ9tMOpTHH" caption="Mikael visar hur han integrerar med Gitter."]

När du är klar får du ytterligare en badge som kan pryda README och uttrycka ett _statement_ om din modul och aktiviteter kring den.

[![Join the chat at https://gitter.im/canax/remserver](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/canax/remserver/?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)



Jämför Travis och CircleCI {#bygg}
--------------------------------------

Travis och CircleCI är två byggtjänster, de kan checka ut din kod, installera det som behövs (`make install`) och köra dina tester (`make test`). På en byggtjänst som dessa vill du också ha möjligheten att köra testerna på olika versioner av operativsystem och PHP (eller vilket språk du nu använder).

Tjänster likt dessa kan generera kodtäckning. De kan också initiera ytterligare händelser i din CI kedja, till exempel att bifoga rapport av kodtäckning till ett annat system, eller driftsätta din modul i ett större sammanhang där du kan utföra ytterligare tester som funktionstester eller integrationstester.

Tjänster likt dessa kan alltså vara startpunkten i ditt CI flöde.



Jämför Scrutinizer, SensioLabs och CodeClimate {#kvalitet}
--------------------------------------

Dessa tre tjänster är exempel på tjänster som gör statisk kodanalys, bedömmer kvaliteten på din kod, visar issue som du kan/bör hantera och har möjligheten att visa upp kodtäckning av dina tester.

Se tjänsterna som ett hjälpmedel för att inspektera din egen och andras kod och som en möjlighet att enkelt få en översikt över koden och dess hälsoläge.

Resultatet från dessa tjänster säger inget om hur bra din kod fungerar i verklig drift, men de ger indikationer om hur "bra kod" du har i allmänhet och de försöker påvisa hur enkel din kod är att underhålla och vidareutveckla.

Jobbar man i team kan detta vara bra tjänster att komplettera till vanlig traditionell kodgranskning.



Avslutningsvis {#avslutning}
--------------------------------------

Vi har gått igenom hur man integrerar en fristående modul med externa tjänster och via automatiserade tester skapar man ett flöde om continuous integration, en viktig del i produktion och underhåll av programvara.

Det finns flera andra tjänster du kan integrera mot, eller verktyg för statisk kodanalys som du kan bygga in i din makefil. Men detta är en start.

Denna artikel har en [egen forumtråd](t/6882) som du kan ställa frågor i, eller bidra med tips och trix.
