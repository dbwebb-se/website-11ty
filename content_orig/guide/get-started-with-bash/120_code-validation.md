---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
Code validation
=======================

Most programming languages uses some kind of standard. We can get help and support from the program [shellcheck](https://github.com/koalaman/shellcheck) which is a static code validation tool and linter.

Using shellcheck is no more difficult than running a script:

`$ shellcheck myscript.bash`



### Installation {#install}

To install shellcheck directly in the terminal:

Debian  
`$ sudo apt-get install shellcheck`

MacOS  
`$ brew install shellcheck`

Windows  
Unfortunately, there is no shellcheck in Cygwin, but if you use Powershell 3 (or later) you can install it through [scoop](https://scoop.sh/): `$ scoop install shellcheck`

Atom  
We can also install shellcheck as a [plugin to linter](https://github.com/AtomLinter/linter-shellcheck) in Atom.
