---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Om Bash
=======================

[FIGURE src=img/linux/bashlogo.png alt="Bash logotyp" class="right top"]

Bash är egentligen *shellet*, ett *command-line interface* (CLI) och kan ta kommandon från tangentbordet och skicka vidare instruktionerna till operativsystemet. Allt detta sker i en *terminal emulator* (terminal). Bash står för Bourne-Again SHell, skrivet av Brian Fox för [the GNU Project](https://www.gnu.org/gnu/thegnuproject.html) och är en uppgraderad version av det ursprungliga shellet *sh*, av Steve Bourne. Om vi tittar i manualen, `man bash` så ser vi att det även är följande:

> Bash is an sh-compatible command language interpreter that executes commands read from the standard
       input or from a file.



På studentservern används i skrivande stund ett annat shell, *tcsh*. Vi kan se vilket shell som används med kommandot `echo $0`:

```bash
klwstud@sweet: echo $0
-tcsh
```

*Övriga shell är bland annat: ksh och zsh.*

Allt du kan göra på kommandoraden i terminalen kan du även utföra i ett Bash-script och tvärtom. Vi kan med andra ord samla en uppsättning kommandon i en fil och köra den så exekveras kommandona som om vi skrivit dem direkt i terminalen. Mycket smidigt.
