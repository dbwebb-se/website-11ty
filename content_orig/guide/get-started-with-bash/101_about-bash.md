---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
About Bash
=======================

[FIGURE src=img/linux/bashlogo.png alt="Bash logotype" class="right top"]

Bash is actually the *shell*, a *command-line interface* (CLI) and can take commands from the keyboard and send the instructions to the operating system. All happens in a *terminal emulator* (terminal). Bash is an abbrevation for Bourne-Again SHell, written by Brian Fox for [the GNU Project](https://www.gnu.org/gnu/thegnuproject.html) and is an upgraded version of the original shell *sh*, by Steve Bourne. If we look in the manual, `man bash` we can see that it is also:

> Bash is an sh-compatible command language interpreter that executes commands read from the standard
       input or from a file.



At the time of writing this, another shell is used on the student server, *tcsh*. We can see which shell is used with the command `echo $0`:

```bash
klwstud@sweet: echo $0
-tcsh
```

*Other shells include: ksh och zsh.*

Everything you can do on the command line in the terminal you can also execute in a Bash script and vice versa. In other words, we can collect a set of commands in a file and execute it so that the commands are executed as if we had written them directly in the terminal. Very smooth.
