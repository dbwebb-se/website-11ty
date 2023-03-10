---
author: mos
revision:
    "2022-03-22": "(B, mos) Genomgången inför mvc-v2 och vt22."
    "2021-03-17": "(A, mos) Första utgåvan."
...
Installera kursens labbmiljö
==================================

Du behöver installera kursens labbmiljö samt ha tillgång till verktyget `dbwebb` som du installerar i terminalen. När du är klar kan du klona kursrepot där du finner en del av kursens material.



Version av PHP {#phpversion}
----------------------------------

Labbmiljön bygger på att du har tillgång till en webbserver med PHP och att du har PHP tillgängligt i din terminal.

Det rekommenderas att du använder PHP 8.1 till denna kursen. Eventuellt kan det fungera även med PHP 8.0, men rekommendationen är att uppgradera till senaste versionen.

Här kan du se vilken [version som körs på studentservern](http://www.student.bth.se/~mosstud/test/info.php).

Kika gärna vilka som är [aktiva PHP releaser](https://www.php.net/supported-versions.php).



Labbmiljön {#kurslabbmiljo}
----------------------------------

Labbmiljön består av ett antal verktyg som du behöver installera på din dator. I nedan länk för du en översikt av dessa.

1. [Installera labbmiljön](./../labbmiljo) som behövs för kursen.

Det är framförallt följande verktyg som du behöver tillgång till via terminalen och det är eventuellt några som är nya för dig i denna kursen.

Så här ser det ut för mig, utskriften hos dig kan skilja beroende av vilka versioner du har.

```
$ php --version
PHP 8.1.4 (cli) (built: Mar 18 2022 18:10:55) (NTS)

$ composer --version
Composer version 2.2.9 2022-03-15 22:13:37

$ make --version
GNU Make 4.2.1

$ git --version
git version 2.20.1
```

Det är inte nödvändigt att du har exakt samma version av PHP i terminalen som du har i webbservern, men det bör ligga rätt nära för att undvika eventuella bekymmer med att PHP-versionen i terminalen påverkar vilka övriga paket som installeras med pakethanteraren composer.



Klona kursrepot {#kursrepo}
----------------------------------

Du behöver uppdatera ditt [dbwebb-cli](dbwebb-cli) samt klona och initiera kursrepot.

```text
# Gå till din katalog för dbwebb-kurser
dbwebb selfupdate
dbwebb clone mvc
cd mvc
dbwebb init
```
