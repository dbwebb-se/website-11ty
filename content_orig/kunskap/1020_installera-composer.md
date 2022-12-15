---
author: mos
category:
    - labbmiljo
    - make
revision:
    "2021-09-14": "(E, mos) Korrigera -m med install och tydliggör att ej använda windows installer."
    "2021-08-25": (D, mos) Uppdaterad i samband med PHP 8.
    "2018-10-25": (C, mos) Genomgång och smärre justeringar.
    "2016-10-28": (B, mos) Ändrade install --mode till -m på Mac.
    "2016-10-13": (A, mos) Första utgåvan.
...
Installera Composer för pakethantering med PHP
===================================

[FIGURE src=/image/snapvt16/logo-composer.png?w=c5 class="right"]

Vi skall installera verktyget Composer som är en pakethanterare för PHP.

Composer är ett kommandoradsprogram som låter dig installera paket och moduler som andra utvecklare har gjort och publicerat. Composer håller koll på vilka versioner som är installerade och att paketen installeras effektivt och kan hållas uppgraderade.


<!--more-->



Förutsättning {#pre}
-------------------------------

Du har [PHP i din path](labbmiljo/php-i-pathen).



Läs mer {#mer}
-------------------------------

Du kan läsa mer om [Composer på webbplatsen](https://getcomposer.org/).

Du kan se vilka [PHP-paket som finns publicerade på Packagist](https://packagist.org/).



Installera på Windows XAMPP {#windows}
-------------------------------

Denna instruktion är för dig som har Cygwin och XAMPP.

Öppna Cygwin. Gå till katalogen där din exekverbara PHP ligger.

```text
cd $( dirname $( which php ))
```

Hämta hem composer enligt de stegen som beskrivs i [Download Composer](https://getcomposer.org/download/). Använd inte den metoden som har ett installationsprogram för Windows.

Kontrollera att du har laddat ned filen.

```text
ls -l composer.phar
```

Provkör composer.

```text
php composer.phar --version
```

Då lägger vi till så att du kan köra composer som ett kommando, utan att behöva ange php framför. Vi gör det via två skript ([`composer`](https://gist.github.com/mosbth/ae5437cfe01d14b9707c) samt [`composer.bat`](https://gist.github.com/mosbth/bba3e71b5f86394a0d44)) som du kan hämta från GitHub.

```text
wget -O composer https://gist.githubusercontent.com/mosbth/ae5437cfe01d14b9707c/raw/
wget -O composer.bat https://gist.githubusercontent.com/mosbth/bba3e71b5f86394a0d44/raw/
chmod 755 composer
```

Kontrollera att filerna ligger på plats och har rätt rättigheter.

```text
$ ls -l composer*
-rwxr-xr-x+ 1 mikae mikae    1008 Oct 13 14:15 composer
-rwxrw-r--+ 1 mikae mikae     384 Oct 13 14:15 composer.bat
-rwxrwx---+ 1 mikae mikae 1704783 Oct 13 13:49 composer.phar
```

Dessa båda skript, som du nu laddat ned, gör så att du kan köra kommandot genom att bara ange kommandot `composer`, oavsett om du är i Cygwin (via `composer`) eller i `cmd.exe` (via `composer.bat`).

De båda filerna `composer` och `composer.bar` exekverar slutligen filen `composer.phar`.

Testa att det fungerar.

```text
composer --version
```



Installera på Mac, Linux och Windows 10 WSL/Bash {#linux}
-------------------------------

Följ instruktionen om hur man [laddar ned och installerar composer](https://getcomposer.org/download/).

När filen är nedladdad, gör följande.

Kontrollera att filen finns på plats.

```text
$ ls -l composer.phar
-rwxr-xr-x 1 mos mos 1.7M Oct 13 14:33 composer.phar*
```

Provkör kommandot.

```text
php composer.phar --version
```

Bra, nu vet du att den nedladdade filen fungerar. Placera den nu i en katalog som ligger i din path.

```text
sudo install -m 0755 composer.phar /usr/local/bin/composer
```

Verifiera att filen ligger på plats och att kommandot går att köra.

```text
ls -l /usr/local/bin/composer
composer --version
```

Om det sista kommandot gick bra och visade nuvarande version för composer så är allt okey.



Verifiera att Composer fungerar {#test}
-------------------------------

Följande två kommandon kan hjälpa dig att dubbelkolla vilken installation av composer som du använder.

```text
whereis composer
which composer
```

Kör följande för att se att composer fungerar.

```text
composer --version
composer
```



Bra att veta om Composer {#bra}
-------------------------------

Ibland får du ett meddelande om att uppdatera `composer`. Du kan hjälpa `composer` att uppdatera sig själv.

```text
composer selfupdate
```

Du kan göra fler saker med `composer`. Använd hjälptexten för att snabbt få en översikt av vad du kan göra.

```text
composer
```
