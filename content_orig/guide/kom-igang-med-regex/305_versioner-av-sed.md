---
author: lew
revision:
    "2019-05-24": "(A, lew) Första versionen."
...
Versioner av sed
=======================

Sed bör vara installerat per default. Det finns dock olika versioner av programmet och den vi ska använda är GNU's version. I skrivande stund utgår guiden från:

```
$ sed --version
sed (GNU sed) 4.8
...
```



### sed på Mac {#sed-on-mac}

Om vi vill använda GNU sed i terminalen på MacOS behöver vi installera appen *gnu-sed*. Som default vill Mac använda `/usr/bin/sed` så vi behöver säga till att vi vill använda en annan som default.

Vi börjar med att installera gnu-sed:
```
$ brew install gnu-sed
```

Vi kan använda pakethanterarens info:
```
$ brew info gnu-sed
...
GNU "sed" has been installed as "gsed".
If you need to use it as "sed", you can add a "gnubin" directory
to your PATH from your bashrc like:
PATH="/usr/local/opt/gnu-sed/libexec/gnubin:$PATH"
...
```

Härligt. Då gör vi väl det.
```
$ export PATH="/usr/local/opt/gnu-sed/libexec/gnubin:$PATH"
$ which sed
/usr/local/opt/gnu-sed/libexec/gnubin/sed
```

Om man vill vara lite extra säker på att terminalen använder den versionen varje gång vi startar så kan vi lägga till export kommandot i filen `~/.bash_profile`. Den läses in när användaren loggar in sätter en viss miljö för användaren, dvs den "sourcar" filen.

Vi kan med fördel separera lite vad som sätts i vilken fil. Börja med att skapa en fil: `.bashrc`:

```
$ touch ~/.bashrc
```

Uppdatera sedan din bash_profile med följande kod:
```
if [ -r ~/.bashrc ]; then
   source ~/.bashrc
fi
```

Det betyder att om filen ~/.bashrc finns och är läsbar så ska vi läsa in den. Lägg sedan din export i bashrc:

```
$ echo "export PATH='/usr/local/opt/gnu-sed/libexec/gnubin:$PATH'" > ~/.bashrc
```

Om du inte vill skapa fler filer kan du även lägga din export i `~/.bash_profile`.



### sed på Windows {#sed-on-win}

Du gör enklast i att köra sed i din VirtualBox. 
