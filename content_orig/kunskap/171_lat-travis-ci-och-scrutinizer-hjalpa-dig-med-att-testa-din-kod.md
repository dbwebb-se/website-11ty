---
author: mos
category: php
revision:
  "2014-09-24": (C, mos) Dubbelkollade och gick igenom att guiden fungerade, länkar
    till validering av yaml.
  "2014-08-28": (B, mos) Länkar till Mumin på Travis och Scrutinizr.
  "2014-05-05": (A, mos) Första utgåvan i samband med phpmvc version 2.
updated: "2014-09-24 16:09:43"
created: "2014-05-05 20:23:03"
...
Låt Travis CI och Scrutinizer hjälpa dig med att testa din kod
==================================

Continuous integration är en term som föreslår att du hela tiden skall integrera din programvara, och testa den så fort du har gjort några ändringar. Eller egentligen, varje gång du checkar in nya ändringar till GitHub så skall också hela din programkod testas och sättas ihop för att se om den fungerar.

Det låter som en bra tanke och vi skall ta hjälp av webbtjänsten Travis CI för att automatisera jobbet och vi tar hjälp av webbtjänsten Scrutinizer för att ytterligare testa koden ur kvalitetsaspekter.

<!--more-->



Förutsättning {#forutsatt}
--------------------------------------

Du vet hur PHPUnit fungerar och vad det innebär att testa din programkod med PHPUnit. 

Troligen har du läst artikeln "[Börja att skriva testfall med PHPUnit för din PHP-kod](kunskap/borja-att-skriva-testfall-med-phpunit-for-din-php-kod)".

Du har bekantat dig med webbtjänsten [Travis CI](https://travis-ci.org/), skummat igenom dess [dokumentation](http://docs.travis-ci.com/) och du har skaffat dig ett konto på tjänsten.

Du har också bekantat dig med webbtjänsten [Scrutinizer](https://scrutinizer-ci.com/), skummat igenom dess [dokumentation](https://scrutinizer-ci.com/docs) och du har skaffat dig ett konto på tjänsten.



Ett testprojekt {#test}
--------------------------------------

Tanken är alltså att visa hur vi kan ta hjälp av Travis CI och Scrutinizer för att automatisera tester. Det kräver att vi redan har ett projekt som använder tester.

Nåja, låt oss skapa ett testprojekt, det är lika bra så att vi gör stegen på rätt sätt.

Snabbt och lätt så fixar vi till ett projekt på GitHub och döper det till [Mumin](https://github.com/mosbth/mumin).

[FIGURE src=/image/snap/mumin-github.png?w=w2 caption="Mumin finns nu på GitHub med grunden som är enhetstestad med PHPUnit."]

För att börja leka så tar du och klonar projektet.

```bash
$ git clone https://github.com/mosbth/mumin.git
```

Sen startar du på [tagg v1.0](https://github.com/mosbth/mumin/tree/v1.0), bara så att du har grunden vilket är en kodbas som använder sig av PHPUnit.

```bash
$ cd mumin

$ git checkout v1.0
```

Så, testa nu att köra PHPUnit för att kontrollera att alla tester går igenom.

```bash
$ phpunit --bootstrap test/config.php test
```

Ser bra ut, så här blir det för mig.

<script type="text/javascript" src="https://asciinema.org/a/9339.js" id="asciicast-9339" async></script>



Lägg till Mumin på Travis CI {#add}
--------------------------------------

Nu vill vi att varje gång som jag lägger till saker i mitt Mumin-projekt så skall Travis CI checka ut koden och köra mina testfall. Det blir ett bra test på att jag inte inför några felaktigheter som jag glömt att regressionstesta. Även om det är enkelt att köra alla testfall så händer det att jag missar det i farten.

Jag går till [min profil](https://travis-ci.org/profile) på Travis CI där alla mina GitHub-repon syns.

[FIGURE src=/image/snap/mumin-travis-steg1.png?w=w2 caption="Jag behöver synca Travis CI med GitHub så att mitt nya repo dyker upp i listan."]

När jag väl har synkroniserat Travis CI och GitHub så ser jag mitt nya Mumin och aktiverar det på Travis.

[FIGURE src=/image/snap/mumin-travis-steg2.png?w=w2 caption="Nu är Mumin aktiv på Travis."]

Om jag går in på mitt repo så ser jag att Travis och GitHub har redan pratat sig samman och GitHub låter Travis få veta när jag checkar in nya saker.

[FIGURE src=/image/snap/mumin-github-steg2.png?w=w2 caption="Travis har nu en service hook kopplad till mitt mumin repo."]

Dubbelkolla att det ser ut på liknande sätt för dig.



Lär Travis att bygga Mumin {#bygg}
--------------------------------------

Sådär, det tar en liten stund men snart har Travis checkat ut och försökt bygga ihop Mumin för första gången. Om Travis inte vill bygga så kan du dubbelkolla att service hooken finns där och gör sedan en minimal ändring i README-filen och pusha upp en ny commit till GitHub. Då bör Travis få veta att det finns ny kod att bygga.

Mitt första bygge gick sådär.

[FIGURE src=/image/snap/mumin-travis-fail.png?w=w2 caption="Travis lyckades inte att bygga Mumin."]

Kanske är det som Travis säger:

> *"Could not find .travis.yml, using standard configuration."*

Travis behöver helt enkelt veta lite mer om Mumin och hur man kör testerna.

Så, vi [läser på om grunderna](http://docs.travis-ci.com/user/languages/php/) i vad en fil `.travis.yml` innehåller.

Följande kommer jag fram till.

```text
language: php
php:
    - 5.5
    - 5.4
    - hhvm

script: 
    - phpunit --bootstrap test/config.php test
```

Jag skapar en sådan `.travis.yml` i mitt repo och committar. 

Du kan alltid dubbelkolla att din fil validerar och har rätt syntax. [Travis har en lint-checker för YAML-filer](http://lint.travis-ci.org/) som du kan använda.

Jag ber Travis att starta om ett nytt bygge, jag orkar inte vänta på att det skall ske automatiskt.

Det tar lite tid, Travis lägger mitt bygge i en kö och när tid finns ägnas Mumin uppmärksamhet. Man får inte ha bråttom. Det är bra att vara kaffesugen när man sätter upp en sådan här miljö.

Mitt tredje bygge går fint, det var filen `.travis.yml` som gjorde susen.

[FIGURE src=/image/snap/mumin-travis-success.png?w=w2 caption="Bygge nummer 3 gick bra."]

Jag kan gå in i varje bygge och se detaljer för varje miljö, det är ju tre miljöer som testkörs, PHP 5.4, 5.5 och [HHVM](http://hhvm.com/). Allt ser bra ut.

[FIGURE src=/image/snap/mumin-travis-success-2.png?w=w2 caption="Bygge nummer 3 gick bra på alla miljöer."]

Vill jag se ytterligare detaljer så klickar jag mig in i respektive bygge och kan se loggfilen.

[FIGURE src=/image/snap/mumin-travis-success-3.png?w=w2 caption="För varje bygge finns en loggfil som visar detaljer om bygget."]

Nu har vi bara kört PHPUnit som en del av bygget, men det är en start. Nu har vi automatiserade regressionstester varje gång vi checkar in en uppdatering av Mumin.

Dessutom har vi nu rätten att visa upp en badge om hur bra vi är. Klicka på bilden uppe i högra hörnet i Travis -- bilden som ser ut som en badge -- så får du olika alternativ om hur du kan integrera koden för att visa badgen i, till exempel din README.md i GitHub repot.

[![Build Status](https://travis-ci.org/mosbth/mumin.svg?branch=master)](https://travis-ci.org/mosbth/mumin)

Det här känns bra, nu fungerar mitt repo med Travis, jag lägger till badgen i README-filen och taggar koden som [v2.0](https://github.com/mosbth/mumin/tree/v2.0).

Med lite tur kommer Travis nu att själv checka ut mitt repo och köra alla tester igen. Tur har jag gott tom.

[Så här ser Mumin ut på Travis](https://travis-ci.org/mosbth/mumin).



Lägg till projektet på Scrutinizer {#scrut}
--------------------------------------

Då är det dags att lägga till projektet Mumin på webbtjänsten Scrutinizer.

Jag loggar in och väljer att [lägga till ett nytt repo](https://scrutinizer-ci.com/g/new). Så fort jag är klar börjar Scrutinizer att jobba, det ser trevligt ut.

[FIGURE src=/image/snap/mumin-scrutinizer-jobbar.png?w=w2 caption="Scrutinizer bygger Mumin för första gången."]

Jag får medge att resultatet var strålande. Grönt och topp-poäng -- 10, det kan inte bli bättre.

[FIGURE src=/image/snap/mumin-scrutinizer-klar.png?w=w2 caption="Scrutinizer sätter högsta betyget på Mumin."]

Jag klickar runt och bekantar mig med Scrutinizer och hittar en badge som jag lägger till i min README.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mosbth/mumin/badges/quality-score.png?s=d21644feafabef69d88645aab4f6f477c4cf7a53)](https://scrutinizer-ci.com/g/mosbth/mumin/)

Hmm, jag ser att det finns tester för Code Coverage som inte körs. Det ser ut som jag måste berätta för Scrutinizer hur den skall göra och samtidigt ta lite hjälp av Travis, nåväl, det ska väl fungera.

Jag läser manualen om [Code Coverage på Scrutinizer](https://scrutinizer-ci.com/docs/tools/external-code-coverage/). Jag läser också kapitlet om [default configuration](https://scrutinizer-ci.com/docs/configuration) som jag kan låna av Scrutinizer. Nu vet jag vad som måste göras.

Jag skapar filen `.scrutinizer.yml`.

```text
imports:
    - php

filter:
    excluded_paths: [test/*]

tools:
    external_code_coverage: true
```

Samtidigt måste jag uppdatera `.travis.yml` för att be Travis att skapa information om code coverage och därefter skicka upp den informationen till Scrutinizer.

```text
before_script:
    - wget https://scrutinizer-ci.com/ocular.phar

script:
    #- phpunit --bootstrap test/config.php test
    - phpunit --bootstrap test/config.php --coverage-clover coverage.clover test

after_script:
    - php ocular.phar code-coverage:upload --format=php-clover coverage.clover
```

Är du osäker på om du har skrivit rätt syntax i YAML-filen så dubbelkollar du med [webbverktyget YAML Lint](http://yamllint.com/).

Tanken är alltså att innan skripten körs så laddar jag, eller Travis, hem programmet ocular.phar. När sedan PHPUnit är klart och har genererat en rapport för code coverage, så används ocular.phar för att skicka rapporten till Scrutinizer.

Klart som korvspad. Men det händer alltså en hel del mellan tjänsterna, säkert är det mycket som kan krångla och gå fel, speciellt när man håller på och sätter upp alltihop för första gången. Andra gången går det lättare, det kan jag lova.

Jag committar filen och bläddrar under tiden i manualen på [Scrutinizer](https://scrutinizer-ci.com/docs/), det är en hel del tester som utförs på koden. många kvalitetsaspekter att testa.

Det är lite skoj, först checka in, sedan sitta och titta på Travis när hen jobbar och när Travis är klar så börjar man kika på Scrutinizer och väntar på att hen jobbar klart. Många som jobbar för min skull. Trevligt.

När det är klart kan jag analysera code coverage med hjälp av Scrutinizer.

[FIGURE src=/image/snap/mumin-scrutinizer-codecoverage.png?w=w2 caption="Scrutinizer ger enkel översikt till detaljer om code coverage."]

När allt är klart ser jag även att min badge för code coverage är redo att användas.

[![Code Coverage](https://scrutinizer-ci.com/g/mosbth/mumin/badges/coverage.png?s=b166bd5ee057fe14a53b3b3fd10d5668708949b3)](https://scrutinizer-ci.com/g/mosbth/mumin/)

Jag lägger den till filen README och committar och [taggar v3.0](https://github.com/mosbth/mumin/tree/v3.0).

[Så här ser Mumin ut på Scrutinizr](https://scrutinizer-ci.com/g/mosbth/mumin/).



Kika på statusen på andra projekt {#kika}
--------------------------------------

Medan jag väntar på att min sista commit skall jobba sig igenom Travis och Scrutinizer så tänkte jag visa Anax MVC som finns på både Travis och Scrutinizer. Du kan kika på det projektet, som testas på samma sätt som Mumin, men det är lite större. Det når inte riktigt upp till 10 poäng i kodkvalitet eller 100% i code coverage.

Men någonstans måste man börja.

[Anax MVC på Travis CI](https://travis-ci.org/mosbth/Anax-MVC).

[Anax MVC på Scrutinizer](https://scrutinizer-ci.com/g/mosbth/anax-mvc/).

Nå, vad säger ditt tränade öga om kodkvaliteten i Anax MVC? Finns det något att förbättra?



Avslutningsvis {#avslut}
--------------------------------------

Du har nu fått en introduktion i arbetet med continuous integration och vi har tagit hjälp av Travis CI och Scrutinizer. Det kan vara lite pilligt att komma igång, men detta var grunderna. Nu gäller det att läsa manualerna och se vad du kan lägga till för smått och gott i konfigurationsfilerna. Allt för att dra mer och mer nytta av dina CI-tjänster.

Det finns ett foruminlägg för [Travis CI och Scrutinizer och denna artikel](t/2364) om du vill diskutera, kommentera eller ställa frågor.




