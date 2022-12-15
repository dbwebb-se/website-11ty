---
author: mos
category: labbmiljo
revision:
  "2014-12-08": (B, mos) Ändrade ordningen i artikeln, installera först.
  "2014-04-07": (A, mos) Första utgåvan i samband med phpmvc version 2.
updated: "2014-12-08 10:13:10"
created: "2014-04-07 14:57:04"
...
Använd PHP på kommandoraden
==================================

PHP går bra att använda på kommandoraden för att testa PHP-kommandon interaktivt, köra bash-liknande skript, testa om ett PHP-skript kan köras utan felmeddelanden eller bara för att man helt enkelt vill ha tillgång till PHP, även via kommandoraden.

Det är en bra-att-ha sak och nödvändig när man går vidare för att jobba med pakethantering i PHP eller enhetstestning. 

<!--more-->


Installera PHP CLI {#installera}
--------------------------------------

Låt nu ser hur vi kan få PHP CLI att fungera på några utvalda miljöer.



###Studentservern {#studserver}

På studentservern kan du köra PHP vid prompten. Det är redan klart och installerat. 

Är du osäker på vilket program som körs och var det är installerat, så kollar du det med kommandot `which`. Det säger var kommandot `php` finns installerat.

På studentservern ser det ut så här.

```bash
$ which php 
/usr/bin/php         

$ php --version                                                           
PHP 5.5.10-1~dotdeb.1 (cli) (built: Mar  6 2014 19:14:45)                  
Copyright (c) 1997-2014 The PHP Group                                      
Zend Engine v2.5.0, Copyright (c) 1998-2014 Zend Technologies              
    with Zend OPcache v7.0.3, Copyright (c) 1999-2014, by Zend Technologies
    with Xdebug v2.2.4, Copyright (c) 2002-2014, by Derick Rethans         
```

Studentservern är inte samma fysiska server som webbservern. Så du kan inte vara säker på att det är samma versionen och inställningar på de båda PHP-installationerna. Det kan vara bra att veta om.



###Linux eller Unix {#linux}

Om du kör på en Linux- eller Unix-maskin så är sannolikheten stor att det bara fungerar rakt av. Jag kör Debian och FreeBSD och på båda maskinerna kommer jag åt PHP vid kommandoraden utan att göra något särskilt.

På min Debian-maskin ser det ut så här.

```bash
$ which php 
/usr/bin/php         
```

På min FreeBSD ser det ut så här.

```bash
$ which php
/usr/local/bin/php
```

Kommandot `php` finns alltså installerat i olika kataloger i de olika systemen. Men eftersom katalogerna ligger i min sökväg så hittas kommandot automatiskt.



###MacOS {#mac}

MacOS har PHP förinstallerat. Det skall alltså fungera även om du inte installerat MAMPServer. Så här ser det ut för mig på MacOS 10.9.

```bash
$ which php
/usr/bin/php

$ php --version
PHP 5.4.24 (cli) (built: Jan 19 2014 21:32:15) 
Copyright (c) 1997-2013 The PHP Group
Zend Engine v2.4.0, Copyright (c) 1998-2013 Zend Technologies
mosmbp:mos mikaelroos$ 
```

Nackdelen med detta kan vara att det är inte samma version av PHP som du kör i MAMPServer. Men, har du bara koll på det så går det säkert bra. Det är i princip samma problemställning som du har på studentservern och student-webbservern.



###Windows med XAMPP {#windows}

På Windows har du troligen installerat PHP tillsammans med WAMPServer, XAMPP eller motsvarande. Då behöver du leta reda på var binärerna till PHP ligger. Sedan modifierar du din systemvariabel PATH till att inkludera den sökvägen.

För min del hittade jag PHP-binären i katalogen `C:\wamp\bin\php\php5.4.3`.

På Windows 7 gör du följande för att uppdatera användarnas sökväg.

1. Gå till Windows-meny, högerklicka på **Computer** och välj **Properties**. 
2. Välj **Advanced system settings** och klicka på **Environment Variables**.
3. Hitta PATH (eller Path) i **System variables**, klicka **Edit** och lägg till sökvägen i slutet. Glöm inte att lägga till ett semikolon först för att separera från de andra sökvägarna, `;C:\wamp\bin\php\php5.4.3`.
4. Spara och starta om `cmd.exe` och test att det fungerar genom att skriva `php --version`.

I detta fallet använder du alltså samma binär som du installerat tillsammans med WAMPServer (eller XAMPP).

Så här blev det för mig.

```bash
C:\Users\mos>where php.exe
C:\wamp\bin\php\php5.4.3\php.exe

C:\Users\mos>php --version
PHP 5.4.3 (cli) (built: May 15 2012 01:01:59)
Copyright (c) 1997-2012 The PHP Group
Zend Engine v2.4.0, Copyright (c) 1998-2012 Zend Technologies
    with Xdebug v2.2.0, Copyright (c) 2002-2012, by Derick Rethans
```

På Windows heter motsvarigheten för `which` just `where`, som du kan se av mitt exempel.



Använd PHP CLI {#oversikt}
--------------------------------------

Det finns en del i manualen som beskriver hur man kan jobba med PHP på kommandoraden, "[Using PHP from the command line](http://www.php.net/manual/en/features.commandline.php)". Där kan du titta för att se exmpel på användningsområden.

Om du är osäker på om det fungerar på din miljö så kan du bara skriva `php --help` för att se vad du kan göra och `php --version` för att se vilken version du kör.

Så här kan det se ut.

`php --version`

```bash
$ php --version                                                           
PHP 5.5.10-1~dotdeb.1 (cli) (built: Mar  6 2014 19:14:45)                  
Copyright (c) 1997-2014 The PHP Group                                      
Zend Engine v2.5.0, Copyright (c) 1998-2014 Zend Technologies              
    with Zend OPcache v7.0.3, Copyright (c) 1999-2014, by Zend Technologies
    with Xdebug v2.2.4, Copyright (c) 2002-2014, by Derick Rethans         
```

`php --help`

```bash
$ php --help                                                           
Usage: php [options] [-f] <file> [--] [args...]                                
   php [options] -r <code> [--] [args...]                                      
   php [options] [-B <begin_code>] -R <code> [-E <end_code>] [--] [args...]    
   php [options] [-B <begin_code>] -F <file> [-E <end_code>] [--] [args...]    
   php [options] -S <addr>:<port> [-t docroot]                                 
   php [options] -- [args...]                                                  
   php [options] -a                                                            
                                                                               
  -a               Run interactively                                           
  -c <path>|<file> Look for php.ini file in this directory                     
  -n               No php.ini file will be used                                
  -d foo[=bar]     Define INI entry foo with value 'bar'                       
  -e               Generate extended information for debugger/profiler         
  -f <file>        Parse and execute <file>.                                   
  -h               This help                                                   
  -i               PHP information                                             
  -l               Syntax check only (lint)                                    
  -m               Show compiled in modules                                    
  -r <code>        Run PHP <code> without using script tags <?..?>             
  -B <begin_code>  Run PHP <begin_code> before processing input lines          
  -R <code>        Run PHP <code> for every input line                         
  -F <file>        Parse and execute <file> for every input line               
  -E <end_code>    Run PHP <end_code> after processing all input lines         
  -H               Hide any passed arguments from external tools.              
  -S <addr>:<port> Run with built-in web server.                               
  -t <docroot>     Specify document root <docroot> for built-in web server.    
  -s               Output HTML syntax highlighted source.                      
  -v               Version number                                              
  -w               Output source with stripped comments and whitespace.        
  -z <file>        Load Zend extension <file>.                                 
                                                                               
  args...          Arguments passed to script. Use -- args when first argument 
                   starts with - or script is read from stdin                  
                                                                               
  --ini            Show configuration file names                               
                                                                               
  --rf <name>      Show information about function <name>.                     
  --rc <name>      Show information about class <name>.                        
  --re <name>      Show information about extension <name>.                    
  --rz <name>      Show information about Zend extension <name>.               
  --ri <name>      Show configuration for extension <name>.                    
```                                                                               




Avslutningsvis {#avslutningsvis}
--------------------------------------

Nu har du tillgång till att köra PHP vid kommandoraden. Ett bra verktyg i din verktygslåda.

Det finns ett foruminlägg för [PHP CLI och denna artikel](t/2235) om du vill diskutera eller ställa frågor.




