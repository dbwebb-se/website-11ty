---
author: mos
category:
    - labbmiljo
    - php
revision:
    "2021-08-25": (E, mos) Omskriven för PHP 80.
    "2018-10-25": (D, mos) PHP 7.2 samt skrev om delar av innehållet.
    "2017-11-07": (C, mos) Not om krav PHP 5.6 eller högre.
    "2017-09-04": (B, mos) Windows 10 Bash likt Linux.
    "2016-10-11": (A, mos) Första revisionen.
...
Lägg PHP 8 i pathen
==================================

[FIGURE src=/image/snapht16/php-in-path.png?w=c5&a=0,70,70,0 class="right"]

Så här gör du för att lägga PHP i sökvägen så att du kan köra det direkt i terminalen.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du har en terminal installerad.



Fungerar det? {#kolla}
-------------------------------

Börja med att kontrollera om du redan har php i din sökväg så att du kan exekvera kommandot. Du kan se vilken version som är installerad genom att skriva `php --version`.

Tecknet `$` i exemplet nedan är prompten, den är inte ett del av kommandot som du skall skriva.

```text
$ php --version
PHP 8.0.9 (cli) (built: Jul 29 2021 17:50:26) ( NTS )
Copyright (c) The PHP Group
Zend Engine v4.0.9, Copyright (c) Zend Technologies
    with Zend OPcache v8.0.9, Copyright (c), by Zend Technologies
```

Versionen visas på första raden och behöver vara 8.0 eller högre.

Om du har en äldre version så behöver du uppdatera den, Kan du inte köra kommandot så behöver du installera det och/eller lägga till det i sökvägen för ditt system, det som kallas din PATH.

Om du hamnar i problem så finns det längst ned i denna artikel ett kapitel om hur man kan [felsöka och ta fram detaljer från systemet](#felsok).

I slutet av artikeln finns även ett kapitel om hur du nu kan [använda php vid terminalen](#anvand).

Här följer nu hur du kan installera PHP i terminalen på olika miljöer.



Installera på Linux {#linux}
-------------------------------

För att installera PHP 8 på en Debian/Ubuntu så är det enklast att följa en guide. Pröva följande guide.

* [How To Install PHP 8.0 on Debian 11/10/9](https://computingforgeeks.com/how-to-install-php-on-debian-linux/)

Enkelt sagt handlar det om att installera PHP med pakethanteraren, ungefär så här.

```
sudo apt install php8.0
```



Installera på Windows 10 WSL/Bash {#WSL}
-------------------------------

När du kör Windows 10 WSL/WSL2 och Debian eller Ubuntu så kör du egentligen en Linux-maskin och du kan då installera PHP 8 på samma sätt som visas ovan för Linux.



Installera på Mac OS {#macos}
-------------------------------

Installera [PHP med pakethanteraren brew](https://formulae.brew.sh/formula/php).

```
brew install php
brew link php
```



Installera på Windows Cygwin {#windows}
-------------------------------

Vi börjar med att leta reda på din `php.exe` som installerats tillsammans med XAMPP. Sedan lägger vi till den i sökvägen och slutligen testar vi att kommandot går att använda från Cygwin. Tanken är alltså att använda din windowsinstallation av php.

Öppna en `cmd.exe`. Om du har installerat XAMPP så ligger troligen den exekverbara PHP-filen i följande katalog. Kontroller att det stämmer.

```text
C:\xampp\php\php.exe --version
```

Starta nu kontrollpanelen för din dator `Control Panel\System and Security\System`.

Du kan starta den direkt från `cmd.exe` på följande sätt.

```text
control system
```

Nedan kan se lite olika ut beroende av vilken version av Windows du har.

Klicka på ändra inställningar för din dator.

[FIGURE src=/image/snapht16/windows-php-path1.png?w=w2 caption="I kontrollpanelen, öppna fönstret för att ändra inställningar i din dator."]

Välj fliken "Advanced" och klicka på "Environment Variables".

[FIGURE src=/image/snapht16/windows-php-path2.png caption="Öppna fönstret för Environment Variabels."]

Välj "Path" i listan och klicka "Edit...".

Redigera så att sökvägen till din exekverbara `php.exe` kommer in i listan. Filens namn ska inte vara en del av sökvägen. Du lägger bara in katalogens namn där den exekverbara filen finns. Med exemplet från ovan ska sökvägen se ut `C:\xampp\php\`.

[FIGURE src=/image/snapht16/windows-php-path3.png caption="Nu ligger sökvägen på plats."]

Starta om `cmd.exe` och testa att det nu fungerar att enbart skriva `php --version`.

Starta en Cygwin-terminal och verifiera att det även fungerar där. Om du redan har en öppen terminal så behöver du starta om den så att dess sökväg uppdateras.



Använd php vid terminalen {#anvand}
-------------------------------

Du behöver php i din sökväg för att kunna köra andra program som bygger på php, till exempel pakethanteraren composer, analysprogrammen phpcs och phpmd eller testverktyget phpunit.

För att pröva php i terminalen så kan man köra hjälpkommandot samt se vilken version man har.

```text
php --version
php --help
```

Du kan nu köra enkla php-konstruktioner eller exekvera en php-fil.

```text
php -r "echo 'Hello World';"
php -r "echo md5('mos@dbwebb.se');"
php -f filnamn.php
```

Det finns också en [inbyggd interpretator](http://www.php.net/manual/en/features.commandline.interactive.php) där du kan definiera variabler, uttryck, loopar och så vidare. Men den kräver att vissa saker finns installerade så den fungerar inte klockrent på alla miljöer. Den kan alltså behöva lite omvårdnad innan den blir riktigt användbar.

```text
php -a
```

Din installation av php i terminalen (cli) är normalt sett en separat installation från din apache-php installation. Den har en egen konfigurationsfil och den kan ha sin egen uppsättning av moduler.

Kontrollera var konfig-filen (`php.ini`) ligger samt kontrollera om en viss modul är laddad i via att "söka igenom" konfig-filen med unix-kommandot `grep`.

```bash
php -i | grep Configuration
php -i | grep sqlite
```

Nu har du grunden i vad du kan göra med php i terminalen.



Felsök {#felsok}
-------------------------------

Om du hamnar i trubbel så kan du behöva felsöka vilken installation av php du använder och detaljer om den. Följande två kommandon hjälper dig att leta reda på var php finns i ditt system, förutsatt att du har php i din sökväg (PATH).

```text
which php
whereis php
```

Du kan kontrollera vilka sökvägar som ligger i din PATH genom att skriva ut miljövariabeln.

```text
echo $PATH
```

Din $PATH behöver innehålla sökvägen till den katalog där den exekverbara PHP ligger.

Detta är grunderna för att se detaljer om din installation. Börja din felsökning med att titta på informationen som ovan kommandon ger.
