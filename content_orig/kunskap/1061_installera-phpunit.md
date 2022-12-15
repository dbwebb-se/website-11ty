---
author:
    - mos
category: 
    - labbmiljo
    - php
    - phpunit
revision:
    "2018-04-03": (C, mos) Uppdatera versionen som visas till PHPUnit v6.
    "2017-09-04": (B, mos) Installation i Cygwin får eget stycke.
    "2017-04-27": (A, mos) Första revisionen.
...
Installera PHPUnit
==================================

[FIGURE src=/image/snapvt17/phpunit.png?w=c5&a=0,50,70,0 class="right"]

Så här gör du för att installera PHPUnit i din sökväg.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du har "[PHP i din PATH](kunskap/lagg-php-i-pathen)".




Dubbelkolla om phpunit är installerat {#test}
-------------------------------

Du kan börja med att dubbelkolla om phpunit redan finns i din PATH.

```bash
$ whereis phpunit
$ which phpunit
$ phpunit --version
$ php --version
```

Även om du har en viss version installerad, så kan det tänkas att du vill installera en annan version. Din version av PHP behöver matcha din version av PHPUnit.

[Hemsidan för PHPUnit](https://phpunit.de/) brukar vara tydliga med vilken version av PHPUnit som stödjer vilken version av PHP.



Ladda ned phpunit {#download}
-------------------------------

Programmet phpunit är en PHAR-fil (PHP-arkiv) som du kan ladda ned och spara någonstans i din sökväg.

Säg jag vill ladda hem en godtycklig version av phpunit. Så här gör jag.

```bash
# Ladda ned från hemsidan, via webbläsare eller via curl/wget
wget https://phar.phpunit.de/phpunit-6.phar -Ophpunit.phar
```

Nu kan jag testa att den nedladdade filen fungerar och jag kan placera den i en katalog som ligger i sökvägen.

```bash
$ php phpunit.phar --version
PHPUnit 6.5.7 by Sebastian Bergmann and contributors.
```

När vi sätter exekveringsrättigheter på filen kan vi köra den direkt, utan att ange php framför.

```bash
chmod 755 phpunit.phar
```

```bash
$ ./phpunit.phar --version
PHPUnit 6.5.7 by Sebastian Bergmann and contributors.
```

Bra, då vet vi att den nedladdade filen fungerar.



Installera phpunit i sökvägen {#install}
-------------------------------

Du kan nu kopiera skriptet till en katalog som ligger i din `$PATH` variabel. Du kan lägga den exekverabara filen i godtycklig katalog som du har i din PATH. Jag väljer `/usr/local/bin`.



### Windows Cygwin {#wincygwin}

Så här gör du på Windows Cygwin, för övriga plattformar skrollar du till nästa stycke.

Placera skriptet `phpunit.phar` i en katalog som ligger i sökvägen.

```bash
install -m 0755 phpunit.phar /usr/local/bin/
```

Ladda ned och installera [ett skript](https://gist.github.com/mosbth/ae5437cfe01d14b9707c) som är specifikt för Cygwin och hjälper dig att exekvera `php phpunit.phar` genom att skriva `phpunit`.

```bash
wget -Ophpunit https://gist.githubusercontent.com/mosbth/ae5437cfe01d14b9707c/raw/63b299639ba95fa19c87198d1a8b007525286baf/composer
install -m 0755 phpunit /usr/local/bin
```

Dubbelkolla att det gick bra och rätt version av phpunit används.

```bash
$ which phpunit
/usr/local/bin/phpunit
$ phpunit --version
PHPUnit 6.5.7 by Sebastian Bergmann and contributors.
$ ls -l /usr/local/bin/phpunit*
-rwxr-xr-x 1 mikae mikae     977 Sep  4 10:47 /usr/local/bin/phpunit
-rw-r--r-- 1 mikae mikae 3006816 Jun 21 10:15 /usr/local/bin/phpunit.phar
```

Om det inte fungerar direkt så kan du behöva uppdatera sökvägen med följande kommando. Terminalen behöver veta vilka körbara kommandon som ligger var i sökvägen.

```bash
$ hash -r
```

Pröva sedan att köra kommandot `phpunit` igen. Det bör nu fungera.



### Linux, Mac OS, Windows 10 Bash {#linux}

Så här gör du på Linux, Mac OS, Windows 10 Bash.

Placera skriptet `phpunit.phar` som kommandot `phpunit` i en katalog som ligger i sökvägen.

```bash
install -m 0755 phpunit.phar /usr/local/bin/phpunit
```

Dubbelkolla att det gick bra och rätt version av phpunit används.

```bash
$ which phpunit
/usr/local/bin/phpunit
$ phpunit --version
PHPUnit 6.5.7 by Sebastian Bergmann and contributors.
```

Nu är du klar.



Avslutningsvis {#avslutning}
------------------------------

Det finns en [forumtråd](t/6465) där du kan ställa frågor, eller ge tips och trix, om denna artikel. Kika där om du får problem.

Vill du veta mer om fixen för Cygwin så har den sitt ursprung i [denna forumtråd](f/43414).
