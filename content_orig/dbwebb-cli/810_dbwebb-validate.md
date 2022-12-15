---
author: mos
category: labbmiljo
revision:
  "2016-01-04": (D, mos) Tester för CRLF och BOM.
  "2015-11-18": (C, mos) Lade till konfigurationsfil.
  "2015-10-13": (B, mos) Lade till JSON validator.
  "2015-03-23": (A, mos) Arbetskopia för dbwebb-validate version 2.
updated: "2015-11-18 09:10:44"
created: "2015-03-09 14:28:39"
...
Kommandot dbwebb-validate
==================================

Kommandot `dbwebb-validate` är en *command line utility* för dbwebb-kurserna. Kommandot används för att validera och publicera koden från övningar och uppgifter. 

Kommandot är ett grundläggande administrativt verktyg för hur både studenter och lärare jobbar med kurserna.


<!--more-->

Denna artikel är dokumentationen för kommandot `dbwebb-validate` och förklarar vilket arbete som kommandot utför.



Installera {#install}
-----------------------------------------------

Normalt behöver du inte själv installera kommandot `dbwebb-validate`. Det finns redan installerat på studentservern och där används det när du kör följande varianter av `dbwebb`.

```text
$ dbwebb validate
$ dbwebb publish
```

Du kan dock, om du känner för det, installera en egen lokal kopia av kommandot på följande sätt.

```text
$ wget https://raw.githubusercontent.com/mosbth/dbwebb-cli/master/dbwebb2-validate -O dbwebb-validate
$ sudo install dbwebb-validate /usr/local/bin/dbwebb-validate
```

Pröva om det gick bra genom att kolla vilken version du har.

```text
$ dbwebb-validate --version
```

Vill du ha hjälp så kan du få fram en lista på vad kommandot kan göra.

```text
$ dbwebb-validate --help
```



Uppdatera {#selfupdate}
-----------------------------------------------

Du kan alltid uppdatera till senaste versionen av `dbwebb-validate` genom att köra följande kommando.

```text
$ dbwebb-validate --selfupdate
```



Kontrollera din omgivning {#check}
-----------------------------------------------

Du kan kontrollera vilka program som `dbwebb-validate` är beroende av, och om de finns på ditt system.

```text
$ dbwebb-validate --check
```



Verktyg för validering {#validate}
-----------------------------------------------

Följande verktyg körs när du gör *validate*.

| Verktyg                                                | Gör vad?                                |
|--------------------------------------------------------|-----------------------------------------|
| [htmlhint](https://www.npmjs.org/package/htmlhint)     | Statisk kodanalys av HTML-kod.          |
| [csslint](https://www.npmjs.org/package/csslint)       | Statisk kodanalys av CSS-kod.           |
| [jshint](https://www.npmjs.org/package/jshint)         | Statisk kodanalys av JavaScript-kod.    |
| [jscs](https://www.npmjs.com/package/jscs)             | Kodstandard för JavaScript. |
| [jsonlint](https://www.npmjs.com/package/jsonlint)     | Validera JSON-filer. |
| [php](http://php.net/manual/en/features.commandline.options.php)                              | Syntax check av PHP-kod.           |
| [pphpmd](http://phpmd.org/)                            | Statisk kodanalys av PHP-kod.           |
| [pphpcs](https://github.com/squizlabs/PHP_CodeSniffer) | Kodstandard för PHP-kod.                |
| [pylint](http://www.pylint.org/)                       | Statisk kodanalys av Python-kod.        |
| [js-yaml](https://www.npmjs.com/package/js-yaml)       | Statisk analys av YAML-filer            |
| [schellcheck](http://www.shellcheck.net/about.html)    | Analys av bash och sh-filer. |
| [file CRLF](http://linuxcommand.org/man_pages/file1.html) | Hitta filer med Windows-style radbrytning. |
| [file BOM](http://linuxcommand.org/man_pages/file1.html) | Hitta filer sparade som UTF-8 BOM. |



Verktyg för publisering {#publish}
-----------------------------------------------

Följande verktyg körs när du gör *publish*.

| Verktyg                                                      | Gör vad?                             |
|--------------------------------------------------------------|--------------------------------------|
| [html-minifier](https://www.npmjs.org/package/html-minifier) | Minifierar HTML-kod.                 |
| [cleancss](https://www.npmjs.org/package/clean-css)          | Minifierar CSS-kod.                  |
| [uglifyjs](https://www.npmjs.org/package/uglify-js)          | Minifierar JavaScript-kod.           |
| [php --strip](http://php.net/manual/en/features.commandline.options.php)                                              | Minifierar PHP-kod.                  |



Konfigurationsfil `.dbwebb-validate.config` {#config}
-----------------------------------------------

Det finns ett par konfigurationsfiler som `dbwebb-validate` läser in. I dessa konfigurationsfiler kan man ställa in vilka valideringsverktyg som är aktiva.

Det finns en global konfigurationsfil som ligger på studentservern. Den läses alltid in. 

Användaren kan lägga en konfigurationsfil i sin `$HOME` eller i kursrepot. Filen skall heta `.dbwebb-validate.config`.

Följande är ett exempel på innehållet i en konfigurationsfil.

```bash
#
# Disable or enable validation tools
#

# Validation tools
#DISABLE_HTMLHINT=true
#DISABLE_CSSLINT=true
#DISABLE_JSHINT=true
#DISABLE_JSCS=true
#DISABLE_JSONLINT=true
#DISABLE_PYLINT=true
#DISABLE_PHP=true
#DISABLE_PHPMD=true
#DISABLE_PHPCS=true
#DISABLE_CHECKBASH=true
#DISABLE_CHECKSH=true
#DISABLE_YAML=true

# Minifying and uglify tools
#DISABLE_HTML_MINIFIER=true
#DISABLE_CLEANCSS=true
#DISABLE_UGLIFYJS=true
#DISABLE_PHPMINIFY=true

# Shortcut to enable all
#ENABLE_ALL=true
```

I filen ovan är alla inställningar bortkommenterade så den påverkar ej.

För att *enabla* ett verktyg kan du skriva så här i filen.

```bash
#DISABLE_HTMLHINT=true
DISABLE_HTMLHINT=
```



Avslutningsvis {#avslutning}
-----------------------------------------------

Om du har [frågor kring kommandot `dbwebb-validate`](/t/4016) så ställer du dem i forumet.
