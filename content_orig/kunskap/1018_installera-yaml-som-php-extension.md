---
author: mos
revision:
    2016-10-11: (A, mos) Första utgåvan.
category:
    - labbmiljo
    - php
...
Installera YAML som PHP extension
===================================

[FIGURE src=/image/snapvt16/yaml.png?w=c5&a=0,70,0,0 class="right"]

Vi skall installera YAML som en PHP extension.

YAML Ain't Markup Language, är ett läsbart format på att skriva till exempel konfigurationsfiler till programmeringsspråk och applikationer.



<!--more-->

Det vi behöver är `libyaml`, som implementerar en parser för YAML, samt `php-yaml` som är en PHP-wrapper till biblioteket. Dessa skall installeras och kopplas ihop med vår PHP-installation.



Läs mer {#mer}
-------------------------------

Läs mer om [YAML på deras officiella webbplats](http://yaml.org/).

Läs om [libyaml](http://pyyaml.org/wiki/LibYAML), biblioteket som parsar YAML.

Läs mer på hemsidan om [PHPs YAML extension](http://bd808.com/pecl-file_formats-yaml/).

Läs mer i PHP-manualen om [PHPs YAML extension och vilka funktioner som stöds](http://php.net/manual/en/book.yaml.php).



Förutsättning {#pre}
-------------------------------

Du har [PHP i din path](labbmiljo/php-i-pathen).



Verifiera att YAML fungerar {#test}
-------------------------------

I kursrepot för design-kursen finns ett PHP-skript som hjälper dig att [verifiera att PHP YAML är installerat](https://github.com/dbwebb-se/design/tree/master/example/php-yaml/) och fungerar.

Börja med att köra det skriptet på din lokala maskin för att se om du redan har modulen installerad.

Du kan [provköra skriptet på dbwebb.se](repo/design/example/php-yaml/check-if-php-yaml-is-installed.php) för att se hur det kan se ut när allt är installerat och klart.

Som ett komplement kan du även testa att yaml fungerar direkt i terminalen.

Först kan du kontrollera om yaml finns i nuvarande konfiguration av PHP.

```bash
$ php -i | grep yaml
yaml
yaml.decode_binary => 0 => 0
yaml.decode_php => 1 => 1
yaml.decode_timestamp => 0 => 0
yaml.output_canonical => 0 => 0
yaml.output_indent => 2 => 2
yaml.output_width => 80 => 80
```

Skrivs inget ut så har du inte stöd för yaml.

Därefter kan du testa att använda yaml med PHP.

```bash
$ php -r 'echo yaml_emit(["a" => "b", "c" => "d"]);' 
---
a: b
c: d
...
```

Har du inte stöd för yaml så får du ett felmeddelande.



Installera på Windows och XAMPP {#windows}
-------------------------------

I skriptet som testar om yaml finns installerat skrivs det ut detaljer om ditt system. Använd de detaljerna för att ladda hem det paketet av php-yaml som passar just ditt system.

1. Du väljer (en stabil) version på [nedladdningssidan](http://pecl.php.net/package/yaml) och klickar på länken vid DLL. Välj nu det paket som matchar din PHP-installation.

1. Öppna zip-filen. som laddas ned.

1. Kopiera `yaml.dll` och spara i katalogen `\xampp\php`. Filen behöver ligga i en katalog som ligger i din `$PATH`.

1. Kopiera `php_yaml.dll` och spara i katalogen `\xampp\php\ext`.

1. Lägg följande rad i slutet av din PHP ini-fil.

```
extension=php_yaml.dll
```

Du kan nu dubelkolla att php-yaml fungerar via terminalen. Det skall fungera både via `cmd.exe` och via Cygwin.

Starta om Apache och testa att det fungerar även via Apache.



Installera på Mac OS och XAMPP {#macos}
-------------------------------

Det förutsätts att du har lagt in de kommandon i din PATH som beskrivs i MacOS-delen av dokumentet [Lägg PHP i pathen](kunskap/lagg-php-i-pathen#macos).



###Installera libyaml {#libyaml}

Börja med att installera libyaml med pakethanteraren brew.

```bash
$ brew update
$ brew install libyaml
```

Verifiera att det är installerat med 

```bash
$ brew list
```

Du skall se libyaml i listan.



###Installera php-yaml {#php-yaml}

Installera nu php-yaml med pecl.

```bash
$ sudo pecl install yaml 
```

Om du får problem med en varning så kan du använda `--ignore-errors` för att hantera det.

> WARNING: pecl.php.net/yaml: conflicting files found:
> yaml/LICENSE (pear.symfony-project.com/yaml)

```bash
$ sudo pecl install --ignore-errors yaml 
```

Om du får problem med phpize, som beror på att programmet autoconf saknas, så löser du det med brew.

>Cannot find autoconf ... ERROR: phpize failed

Installera programmet autoconf med brew.

```bash
$ brew install autoconf
```

När pecl är klart så visas troligen följande text i slutet.

> You should add "extension=yaml.so" to php.ini

Då gör vi det.



###Konfigurera php.ini med php-yaml {#phpini}

Du hittar PHPs konfigfil på följande sätt.

```bash
$ php -i | grep Configuration
Configuration File (php.ini) Path => /Applications/XAMPP/xamppfiles/etc
Loaded Configuration File => /Applications/XAMPP/xamppfiles/etc/php.ini
Configuration
```

I mitt exempel är konfigfilen `/Applications/XAMPP/xamppfiles/etc/php.ini`.

Jag kan antingen öppna den filen i min texteditor och lägga till raden längst ned. Gör det om du är osäker.

Eller så gör jag det via kommandoraden.

```bash
$ sudo sh -c 'echo "extension=yaml.so" >> /Applications/XAMPP/xamppfiles/etc/php.ini'
$ tail -1 /Applications/XAMPP/xamppfiles/etc/php.ini
extension=yaml.so
```

Du kan verifiera att php-yaml nu fungerar via terminalen.

Starta om apache och verifiera att det även fungerar där.



Installera på Linux {#linux}
-------------------------------

På min debian installerar jag först libyaml med apt-get.

```bash
$ sudo apt-get install libyaml-dev
```

Sedan installerar jag pecl tillsammans med källkodsfiler för PHP-distributionen.

```bash
$ sudo apt-get install php-pear php5-dev
```

Med pecl installerar jag php-yaml. Jag väljer den versionen som finns tillgänglig och är stabil.

```bash
$ sudo pecl install yaml
```

På min debian har jag två olika konfigfiler för PHP, en för apache-varianten och en för cli. Jag behöver lägga till följande i dem båda.

```text
extension=yaml.so
```

När det är klar så kan jag verifiera att det fungerar i terminalen.

Starta om apache och verifiera att det även fungerar där.



Avslutningsvis {#avslutning}
------------------------------

Det finns en forumtråd som ger tips och ledtrådar till hur man [installerar PHP YAML på olika miljöer](t/5244). Kika där om du får problem.
