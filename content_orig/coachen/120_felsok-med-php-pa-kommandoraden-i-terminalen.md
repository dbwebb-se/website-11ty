---
author: mos
category: php
updated: "2014-03-04 13:00:36"
created: "2014-03-04 13:00:35"
...
Felsök med PHP på kommandoraden i terminalen
==================================

Vanliga felsökningstekniker i PHP omfattar echo, print_r och var_dump och att köra dessa utskrifter via webbläsaren i en webbsida. Men, ibland kan det också vara en möjlighet till felsökning att köra PHP-skriptet direkt kommandoraden i terminalen.

<!--more-->

PHP går att köra på kommandoraden, som vilket kommando som helst. På studentservern ssh.student finns numer PHP installerat så att det går att köra via terminalen.

```bash
seekers~: php -help                                             
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

Behändigt och bra. Nu kan vi felsöka ett program genom att ange switchen `-l`, på detta viset:

```bash
seekers~: php -l ~stud14/www/oophp/kmom01/webroot/me.php
PHP Parse error:  syntax error, unexpected end of file in
/home/saxon/students/20141/stud14/www/oophp/kmom01/webroot/me .php on line 3
Errors parsing /home/saxon/students/20141/stud14/www/oophp/kmom01/webroot/me.php
```

Ibland kan denna felsökningstaktiken komplettera dina echo-satser.

Dagens tips är att bekanta sig med php på kommandoraden, och framförallt med switchen `php -l`.
