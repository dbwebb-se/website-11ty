---
author: mos
category: 
    - labbmiljo
    - php
revision:
    "2018-10-25": (D, mos) PHP 7.2 samt skrev om delar av innehållet.
    "2017-11-07": (C, mos) Not om krav PHP 5.6 eller högre.
    "2017-09-04": (B, mos) Windows 10 Bash likt Linux.
    "2016-10-11": (A, mos) Första revisionen.
...
Lägg PHP i pathen
==================================

[FIGURE src=/image/snapht16/php-in-path.png?w=c5&a=0,70,70,0 class="right"]

Så här gör du för att lägga PHP i sökvägen så att du kan köra det direkt i terminalen. 

<!--more-->



Förutsättning {#pre}
-------------------------------

Du har installerat PHP på ditt system.

Din PHP-installation är av version 7.2 eller senare.



Fungerar det? {#kolla}
-------------------------------

Börja med att kontrollera om du redan har php i din sökväg så att du kan exekvera kommandot. Du kan se vilken version som är installerad genom att skriva `php --version`.

Tecknet `$` i exemplet nedan är prompten, den är inte ett del av kommandot som du skall skriva.

```text
$ php --version
PHP 7.2.9 (cli) (built: Aug 21 2018 08:41:39) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
```

Versionen visas på första raden och behöver vara 7.2 eller högre.

Om du inte kan köra kommandot så behöver du installera det, och/eller lägga till det i sökvägen för ditt system, det som kallas din PATH.

Om du hamnar i problem så finns det längst ned i denna artikel ett kapitel om hur man kan [felsöka och ta fram detaljer från systemet](#felsok).

I slutet av artikeln finns även ett kapitel om hur du nu kan [använda php vid terminalen](#anvand).



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

Hamnar du i problem kan du behöva [felsöka](#felsok) och när du är klar så kan du kort lära dig om hur man [använder php i terminalen](#anvand).



Installera på Linux och Windows 10 Bash {#linux}
-------------------------------

Här visas hur man kan göra på Linux (debian) och Windows 10 Bash.

Du kan söka ut vilka versioner som är tillgängliga med `apt-cache search php7.2`. Du bör se ett antal moduler som matchar den versionen.

Pröva en `apt-get update` om du inte ser rätt version. Du kan behöva uppdatera informationen om möjliga paket.

Du installerar med `apt-get` och den exekverbara hamnar i `usr/bin` vilket redan ligger i din path. Allt klart.

```text
apt-get install php7.2
```

Eventuellt behöver du senare installera fler moduler till php, du gör det på samma sätt.

Ovan procedure fungerar på samma sätt om du använder Windows 10 och Bash. Vi använder inte den versionen av php som är installerad i Windows utan vi installerar en ny separat variant i Bash.

Hamnar du i problem kan du behöva [felsöka](#felsok) och när du är klar så kan du kort lära dig om hur man [använder php i terminalen](#anvand).



Installera på Mac OS {#macos}
-------------------------------

Om du har installerat XAMPP så ligger troligen filerna under katalogen `/Applications/XAMPP/bin`. Öppna en terminal och kontroller att du har rätt sökväg.

```bash
$ /Applications/XAMPP/bin/php --version
```

I XAMPPs katalog ligger en stor del exekverbara som delvis krockar med de som Mac OS har installerat. Jag är alltså inte villig att lägga XAMPPs bin-katalog direkt i min sökväg. Så jag gör på ett eget sätt och väljer ut de exekverbara som jag vill använda.

Jag skapar en egen bin-katalog i `$HOME/bin`, som jag lägger till i `$PATH` via startupfilen `.bash_profile`. I bin-katalogen avser jag lägga till de exekverbara som jag vill använda.

```bash
$ cd $HOME
$ mkdir bin
$ echo 'export PATH="$HOME/bin:$PATH"' >> .bash_profile
$ tail -1 .bash_profile 
export PATH="$HOME/bin:$PATH"
```

Du kan nu starta om terminalen och verifera att `$PATH` verkligen innehåller bin-katalogen. Eller så kan du sourca startupfilen så slipper du starta om terminalen.

```bash
$ source .bash_profile
$ echo $PATH
```

Då lägger jag till de kommandon som jag kommer att behöva, in i bin-katalogen. Jag skapar symboliska länkar.

```bash
$ ln -s /Applications/XAMPP/bin/php bin/
$ ls -l bin
total 32
lrwxr-xr-x  1 mikaelroos  staff  27 Oct 11 12:22 php -> /Applications/XAMPP/bin/php
```

Nu är det klart och du kan testa att använda php i din terminal.

Hamnar du i problem kan du behöva [felsöka](#felsok) och när du är klar så kan du kort lära dig om hur man [använder php i terminalen](#anvand).



Använd php vid terminalen {#anvand}
-------------------------------

Du behöver php i din sökväg för att kunna köra andra program som bygger på php, till exempel pakethanteraren composer, analysprogrammen phpcs och phpmd eller testverktyget phpunit.

För att bekanta sig med php i terminalen så kan man köra hjälpkommandot samt se vilken version man har.

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

Detta är grunderna för att se detaljer om din installation. Böra di felsökning med att titta på informationen som ovan kommandon ger.



Avslutningsvis {#avslutning}
------------------------------

Det finns en [forumtråd](t/5775) där du kan ställa frågor, eller ge tips och trix, om denna artikel. Kika där om du får problem.
