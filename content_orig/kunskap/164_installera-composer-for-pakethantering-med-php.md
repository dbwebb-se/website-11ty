---
author: mos
category:
    - labbmiljo
    - php
revision:
    "2016-10-13": (B, mos) Obsolete och länk till ersättande artikel.
    "2014-04-07": (A, mos) Första utgåvan i samband med phpmvc version 2.
updated: "2014-04-07 16:37:12"
created: "2014-04-07 15:40:16"
...
Installera Composer för pakethantering med PHP
==================================

Composer är en pakethanterare till PHP, eller en *Dependency manager* som det även kallas. Denna artikel visar hur du installerar composer på din egen maskin.

<!--more-->

[WARNING]
**Uppdaterad artikel finns**

Det finns en uppdaterad artikel som visar hur du [installerar Composer på din egen maskin](kunskap/installera-composer). Det rekommenderas att du läser den artikeln istället.

[/WARNING]



Översikt av Composer {#oversikt}
--------------------------------------

Läs om Composer på [dess webbplats](https://getcomposer.org/). Där finns instruktioner om hur du [kommer igång](https://getcomposer.org/doc/00-intro.md) och mer fylliga manualer som beskriver hur du använder Composer i detalj.

På sidan [Download](https://getcomposer.org/download/) står hur du kommer igång och installerar Composer på din egen maskin. Du använder antingen kommandot `curl` eller så installerar du med hjälp av PHP från kommandoraden.

Så här ser det ut när jag installerar Composer på studentservern.



Composer installeras på studentservern {#studserver}
--------------------------------------

Kommandot `curl` finns installerat på studentservern, men jag väljer att installera via varianten med PHP CLI. Det lär fungera på alla system som kan köra PHP på kommandoraden.

Först hämtar jag hem installationsfilen för Composer.

```bash
php -r "readfile('https://getcomposer.org/installer');" | php
```

Går det bra ser det ut så här.

```bash
$ php -r "readfile('https://getcomposer.org/installer');" | php           
#!/usr/bin/env php                                                                
All settings correct for using Composer                                           
Downloading...                                                                    
                                                                                  
Composer successfully installed to: /home/saxon/teachers/com/mosstud/composer.phar
Use it: php composer.phar                                                         
```

Nu ligger filen `composer.phar` i samma katalog där jag står.

```bash
$ ls -l composer.phar                                
-rwxr-xr-x 1 mosstud 500 1010563 apr  7 18:01 composer.phar* 
```

Jag kan testköra Composer så här.

```bash
$ php composer.phar

   ______ 
  / ____/___  ____ ___  ____  ____  ________  _____ 
 / /   / __ \/ __  __ \/ __ \/ __ \/ ___/ _ \/ ___/ 
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/ 
                    /_/
Composer version 1efa02a7ab43b7fc555dccb7d31294acbc62bbeb 2014-04-07 15:37:10

Usage:
  [options] command [arguments]

Options:
  --help           -h Display this help message.                         
  --quiet          -q Do not output any message.                         
  --verbose        -v|vv|vvv Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug 
  --version        -V Display this application version.           
  --ansi              Force ANSI output.                          
  --no-ansi           Disable ANSI output.
  --no-interaction -n Do not ask any interactive question.     
  --profile           Display timing and memory usage information
  --working-dir    -d If specified, use the given directory as working directory.

Available commands:
  about            Short information about Composer
  archive          Create an archive of this composer package
  config           Set config options 
  create-project   Create new project from a package into given directory.
  depends          Shows which packages depend on the given package
  diagnose         Diagnoses the system to identify common errors.
  dump-autoload    Dumps the autoloader                
  dumpautoload     Dumps the autoloader 
  global           Allows running commands in the global composer dir ($COMPOSER_HOME).
  help             Displays help for a command
  init             Creates a basic composer.json file in current directory.
  install          Installs the project dependencies from the composer.lock file if present, or falls back on the composer.json.
  licenses         Show information about licenses of dependencies
  list             Lists commands                      
  require          Adds required packages to your composer.json and installs them
  run-script       Run the scripts defined in composer.json.
  search           Search for packages                       
  self-update      Updates composer.phar to the latest version.
  selfupdate       Updates composer.phar to the latest version.
  show             Show information about packages        
  status           Show a list of locally modified packages
  update           Updates your dependencies to the latest version according to composer.json, and updates the composer.lock file.
  validate         Validates a composer.json
```

Du får fram en manualsida hur du kan använda Composer och dess olika kommandon.

Egentligen är allt klart så här. Nu har du Composer installerat och det är bara att använda genom att skriva `php composer.phar` i samma katalog som du installerat det. 

Composer kommer i ett [phar-arkiv](http://www.php.net/manual/en/book.phar.php). Det är en paketering av ett antal PHP-filer in i en enda fil. På det viset blir det enkelt att distribuera ett PHP-skript som ett vanligt exekverbart kommando.

För min del tänker jag nu flytta Composer till en plats där alla studenter kan komma åt det. Så att var och en inte behöver installera sin egen version av Composer.

Här är stegen som gör detta.

```bash
$ cp composer.phar /home/saxon/students/phar/bin/composer                     

$ chmod 755 /home/saxon/students/phar/bin/composer                            

$ ls -l /home/saxon/students/phar/bin/composer                                
-rwxr-xr-x 1 mosstud 500 1010563 apr  7 18:16 /home/saxon/students/phar/bin/composer* 
```

Jag döper om `composer.phar` till `composer`, bara för att det skall vara enklare att skriva det. Lite kortare helt enkelt, som vilket annat kommando som helst.

Nu finns Composer installerat för alla på studentserver. Sökvägen till katalogen `/home/saxon/students/phar/bin/` finns med som standard för alla studenter. Du kommer åt kommandot genom att skriva `composer` vid prompten, oavsett i vilken katalog du står.

Pröva nu att logga in på studentservern och skriv följande.

```bash
$ composer

$ which composer
/home/saxon/students/phar/bin/composer 
```

Ser det bra ut? Då är det bara att börja använda det.

Stegen att installera Composer är samma oavsett din miljö. Det bör fungera på Linux, Unix, Mac och Windows. Se bara till att du har PHP 5.4 eller senare.

Det finns ett foruminlägg för [Composer och denna artikel](t/2237) om du vill diskutera, kommentera eller ställa frågor.
