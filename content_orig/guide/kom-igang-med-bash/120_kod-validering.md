---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Kodvalidering
=======================

De flesta programmeringsspråk följer någon form av standard. Vi kan få hjälp och stöd av programmet [shellcheck](https://github.com/koalaman/shellcheck) som är ett statiskt kod-valideringsverktyg och linter.

Att använda shellcheck är inte svårare än att köra ett script:

`$ shellcheck myscript.bash`



### Installera {#installera}

För att installera shellcheck direkt i terminalen:



Debian  
`$ sudo apt-get install shellcheck`

MacOS  
`$ brew install shellcheck`

Windows  
Det finns dessvärre inte till Cygwin, men om du använder Powershell 3 (eller senare) kan du installera det via [scoop](https://scoop.sh/): `$ scoop install shellcheck`

Atom  
Vi kan även installera shellcheck som ett [plugin till linter](https://github.com/AtomLinter/linter-shellcheck) i Atom.
