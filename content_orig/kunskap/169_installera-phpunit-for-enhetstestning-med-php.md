---
author: mos
category: labbmiljo
revision:
  "2014-05-05": (A, mos) Första utgåvan i samband med phpmvc version 2.
updated: "2014-05-05 11:03:42"
created: "2014-05-05 11:03:37"
...
Installera PHPUnit för enhetstestning med PHP
==================================

PHPUnit är ett ramverk för testning av PHP-kod. Det är en instans av arkitekturen xUnit för testramverk. Det hjälper dig med enhetstestning av din PHP-kod, så kallade *unit tests*. 

Denna artikel visar hur du hittar PHPUnit på studentservern och hur du installerar det på din egen maskin.

<!--more-->



Översikt av PHPUnit {#oversikt}
--------------------------------------

Läs om PHPUnit på [dess webbplats](http://phpunit.de/). Där finns instruktioner om hur du [kommer igång](http://phpunit.de/getting-started.html) och mer fylliga manualer som beskriver hur du använder PHPUnit i detalj.

Så här ser det ut när jag installerar PHPUnit på diverse miljöer. Du kan följa samma steg för att installera PHPUnit på din egna maskin.



Hämta hem PHPUnit {#download}
--------------------------------------

På sidan som berättar hur du [kommer igång](http://phpunit.de/getting-started.html) står också hur du installerar PHPUnit på din egen maskin. 

Du kan använda kommandont `wget` för att hämta hem den senaste versionen, eller högerklicka på [denna länk](https://phar.phpunit.de/phpunit.phar) och välj att "Spara länk som" och spara filen som `phpunit.phar`.

Dollar-tecknet nedan representerar prompten och är inte en del av kommandot.

```bash
$ wget https://phar.phpunit.de/phpunit.phar

$ php phpunit.phar --version
```

För att underlätta arbetet brukar jag spara filen på en central plats som ligger med i sökvägen, *pathen*. 

```bash
$ chmod +x phpunit.phar

$ mv phpunit.phar /usr/local/bin/phpunit

$ phpunit --version
```

Så här ser det ut när jag installerar PHPUnit på min Debian-maskin hemma (Linux).

<script type="text/javascript" src="https://asciinema.org/a/9319.js" id="asciicast-9319" async></script>

Glöm inte att göra `rehash` (tcsh) eller `hash -r` (bash) för att uppdatera så att nuvarande shell hittar kommandot som du nyss lagt i sökvägen.



PHPUnit installerad på studentservern {#studserver}
--------------------------------------

På studentservern, som också är en Linux/Debian-maskin, gör jag på samma sätt. 

Den enda skillnaden är att jag lägger `phpunit.phar` i en annan katalog där jag har skrivrättigheter. Dessvärre, eller dessbättre, så har jag inte root-befogenheter på studentservern.

Logga in på studentservern för att kolla att du kan köra kommandot phpunit.

```bash
$ phpunit --version

$ which phpunit

$ ls -l /home/saxon/students/phar/bin/phpunit

$ phpunit
```

Så här gjorde jag för att dubbelkolla att det fungerar på studentservern.

<script type="text/javascript" src="https://asciinema.org/a/9320.js" id="asciicast-9320" async></script>



PHPUnit installerad på Mac {#mac}
--------------------------------------

På min Mac hade jag inte kommandot `wget` så det fick bli `curl` istället. Här är den korta versionen av hur du installerar PHPUnit på din Mac.

```bash
$ curl -O https://phar.phpunit.de/phpunit.phar

$ chmod +x phpunit.phar

$ mv phpunit.phar /usr/local/bin/phpunit

$ phpunit --version
```

Så här såg det ut när jag gjorde det på min MacBook Pro.

<script type="text/javascript" src="https://asciinema.org/a/9322.js" id="asciicast-9322" async></script>

Glöm inte att göra `rehash` (tcsh) eller `hash -r` (bash) för att uppdatera så att nuvarande shell hittar kommandot som du nyss lagt i sökvägen.



PHPUnit installerad på Windows {#win}
--------------------------------------

Här tänker jag göra det enkelt för mig. 

Ta och ladda ned filen med din webbläsare och spara den som `C:\phpunit`.

Sedan kan du köra kommandot på följande sätt i ditt `cmd.exe`.

```bash
php \phpunit --version
```

Kanske inte så snyggt eller korrekt, men det fungerar.

Kom gärna med bättre förslag på hur du installerar det på Windows. Det finns en del alternativa vägar.

Eller använd [Cygwin](http://www.cygwin.com/) som terminal så får du en Linux-känsla även på Windows.



Att använda PHPUnit {#phpunit}
--------------------------------------

Låt mig bara kort visa hur du kan testa om din installation av PHPUnit fungerar. Vi tar och använder modulen `mos/cform` som testobjekt. Jag tänkte ladda hem den och använda PHPUnit för att köra alla testfall som ligger i modulen.

Så här gör man.

```bash
$ git clone https://github.com/mosbth/cform.git -b v2

$ cd cform

$ ls -l test

$ phpunit --bootstrap test/config.php test
```

Så här ser det ut när jag gör det.

<script type="text/javascript" src="https://asciinema.org/a/9326.js" id="asciicast-9326" async></script>

Det kanske inte ser så spännande ut vid första anblicken, men jag lovar att ett OK på nedersta raden kommer att göra din dag. Du kommer lära dig att älska det.



Avslutningsvis {#avslut}
--------------------------------------

Stegen att installera PHPUnit är egentligen samma oavsett din miljö. Men som du kunde se av artikeln så är det vissa skillnader i varje miljö. Väl medveten om dem bör du nu kunna få PHPUnit att fungera.

Det finns ett foruminlägg för [PHPUnit och denna artikel](t/2360) om du vill diskutera, kommentera eller ställa frågor.

Sen kommer det spännande, att lära sig att använda PHPUnit. Men det är en [annan historia](kunskap/borja-att-skriva-testfall-med-phpunit-for-din-php-kod).




