---
author:
    - mos
category:
    - php
    - kurs oophp
    - anax-lite
revision:
    "2017-04-28": "(A, mos) Första utgåvan."
...
Skapa enhetstester till Anax Lite
==================================

Du ska använda dina kunskaper om enhetstestning med phpunit för att börja bygga testfall till klasser i ditt Anax Lite.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du är väl bekant med Anax Lite.

Du har installerat [PHPUnit](labbmiljo/phpunit) och [Xdebug](labbmiljo/xdebug) samt kört igenom [exemplet om phpunit](https://github.com/dbwebb-se/oophp/blob/master/example/phpunit/README.md).



Introduktion {#intro}
-----------------------

Du skall visa att du kan grunderna i att göra testfall och assertions samt att du behärskar grunderna i kodtäckning.

Ditt Anax Lite är förberett för enhetstestning. Du behöver bara skapa katalogen `test`, lägga dit en fil `test/config.php` som inkluderar autoloadern från composer samt lägga dit testfall i form av klasser, förslagsvis i en katalogstruktur som motsvarar den du har under `src`.

Du behöver även en konfigurationsfil `.phpunit.xml` som du kan låna av exemplet `example/phpunit/.phpunit.xml` eller från någon av Anax moduler.

Låt oss hålla det enkelt och enbart testa klasser som är uppenbart testbara och utan externa beroenden. Vi vill inte blanda in mockning av testobjekt, data providers,  eller setup/teardown av databaser. Vi tar mer avancerad enhetestestning i kommande kurser.

Gå gärna in i Anax moduler och exekvera `make install` följt av `make phpunit` eller `make test` för att köra modulens testsuite och generera kodtäckningen. Du kan studera hur bra kodtäckning modulerna har och studera hur deras testfall är uppbyggda i respektive `test` katalog.



Krav {#krav}
-----------------------

1. Utgå från [exemplet om phpunit](https://github.com/dbwebb-se/oophp/blob/master/example/phpunit/README.md) och skapa ett testfall för `Guess::makeGuess()` och uppnå 100% kodtäckning.

1. Se till att du har ett testfall som kontrollerar att rätt typ av Exception kastas i `Guess::makeGuess()`.

1. Kör enhetstesterna för `Guess` via `make test` och din globala installation av PHPUnit kommer att användas.

1. Leta genom din kod i Anax Lite och finn en eller flera klasser som lämpar sig att enhetstesta. Skriv minst en testklass med minst två testfall och relevanta assertions.

1. Kontrollera vilken kodtäckning du lyckades uppnå och se om du med mindre modifikationer av ditt testfall kan öka kodtäckningen.

1. Kör enhetstesterna via `make install` följt av `make phpunit` eller `make test`. Makefilen kommer att installera och använda en lokal installation av PHPUnit som finns i din katalog `anax-lite/.bin`.

1. Validera och publicera.



Extrauppgift {#extra}
-----------------------

Lös extrauppgifterna om du har tid och motivation.

1. Skapa fler testfall och bygg upp din kodtäckning, hur högt kan du nå?



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
