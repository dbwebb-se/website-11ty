---
author:
    - mos
category:
    - php
    - kurs oophp
    - anax
revision:
    "2019-04-01": "(C, mos) Uppdaterad inför vt19 med video och kapitelstruktur."
    "2018-03-20": "(B, mos) Avidentifiera anax-lite."
    "2017-04-21": "(A, mos) Första utgåvan."
...
Dokumentera PHP med phpdoc och phpDocumentor
==================================

[FIGURE src=image/snapvt18/phpdocumentor.png?w=c4 class=right]

Du ska dokumentera ditt projekt med phpdoc och phpDocumenter. Det handlar om att dra nytta av dina docblock kommenterarer när du nu skall automatgenerera din dokumentation.

Du har ett befintligt projekt där din Makefile redan innehåller stöd för att använda phpdoc för att generera dokumentationen.

<!--more-->

Så här kan det se ut när du löst uppgiften.

[FIGURE src=image/snapvt19/phpdoc.png?w=w3 caption="Automatgenererad dokumentation med phpdoc."]



Förkunskaper {#forkunskaper}
-----------------------

Du har tillgång till ett projekt med en Makefile som stödjer att installera phpdoc och generera dokumentation.

Du är bekant med [phpDocumenter, aka phpdoc](https://www.phpdoc.org/).

Du är medveten om behovet av kommentarer strukturerade som docblock, för att få en bra grund till dokumentationen.



Introduktion {#intro}
-----------------------

Det handlar om att använda phpDocumenter via kommandot `phpdoc` för att automatgenerera dokumentation av dina klasser i ditt projekt. Du kommer använda makefilen som i sin tur installerar `make install` och använder sig av phpdoc för att skapa dokumentationen `make doc`.

Du kan se hur jag jobbar igenom stegen i följande video.

[YOUTUBE src="eopAZqNwoL4" width=700 caption="Visar hur man kan automatgenerera dokumentation tillsammans med din me/redovisa sida."]

Här är stegen du behöver jobba igenom.



### Installera utvecklingsmiljön {#installera}

Du kan installera verktyget phpdoc som en del av ditt repo för me/redovisa.

Följande är de make target som du behöver. 

```bash
# Gå till ditt projekt
$ make help
...
install            - Install all tools
doc                - Generate documentation.
...
```

Du behöver nu installera verktygen.

```text
make install
```



### Generera dokumentationen {#generera}

Nu kan du automatgenerera dokumentationen.

```text
mkdir doc
make doc
```

Du behöver en katalog som heter `doc` i ditt projekt, annars genereras inte dokumentationen.

Nu kan du öppna dokumentationen i din webbläsare.

```text
firefox doc
```



### Konfigurera vad som dokumenteras {#konfigurera}

När kommandot phpdoc körs av Makefilen så används konfigurationsfilen `.phpdoc.xml` och den styr vilka kataloger som används som bas för dokumentationen.

Titta i filen och justera vilka kataloger som används som bas, så kan du skapa egen dokumentation för de klasser som installeras via composer.

Du kan till exempel uppdatera din konfigurationsfil så att den även dokumenterar klasserna i Anax, men ignorerar alla klasser som finns under katalogen `test/`.

```text
<files>
    <directory>src</directory>
    <directory>vendor/anax</directory>
    <ignore>test/*</ignore>
</files>
```


### Om makefilen {#makefilen}

Du använder en av funktionerna som redan finns implementerad i Makefilen. Den installerar verktyget phpdoc i `.bin/phpdoc` via `make install`. Sedan kan du generera dokumentationen via `make doc`, förutsatt att du har en konfigurationsfil samt en katalog `doc` där dokumentationen kan sparas.



Krav {#krav}
-----------------------

1. Använd phpdoc, via `make doc` för att skapa dokumentation till ditt projekt.

1. Redigera konfigurationsfilen så att du även kan generera dokumentation för Anax moduler.

1. Uppdatera din `.gitignore` så att du inte checkar in katalogen `doc/` in i ditt repo.

1. Bekanta dig med det som genereras av phpdoc och se om du kan finna det användbart.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
