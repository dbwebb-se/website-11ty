---
author: lew
revision:
    2019-08-20: (A, lew) First edition.
...
A Bash script with options, commands and arguments
===================================

You will create a bash script that handles options and arguments.

<!--more-->



Prerequisites {#pre}
-----------------------

You have completed the exercise "[Skapa Bash-skript med options, command och arguments](kunskap/create-bash-script-with-options-commands-and-arguments)".

You have read the course literature and acquired basic knowledge about bash. You've done the task "bash2".



Introduction {#intro}
-----------------------

You will create your own `commands.bash` script that receives options and arguments. The script can use built-in bash functions.


[INFO]
**TIPS.**
Use the [guide](guide/get-started-with-bash) if you get stuck.
Learn to use the manual `man`.
[/INFO]



Requirement {#req}
-----------------------

1. Create a bash script `script/commands.bash` that can receive options and arguments. If your script is called without options or arguments, the script should print that you can get help by using `--help, -h`.

1. Change permissions for the script by using the command `chmod 755 script/commands.bash`

1. Your script should end with the correct exit value.

1. Use a main function to start the program.

1. Structure the code into different functions.

1. The following *options* should work:

| Option                | What should happen |
|-----------------------|-----------------|
| `-h, --help`          | Print a help text on how to use the program. |
| `-v, --version`       | Displays the current version of the program. |

7. The following *arguments* should work:

| Argument&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| Vad skall hända |
|-----------------------|-----------------|
| `cal`          | Print a calendar. |
| `greet`       | Print a greeting phrase to the current user.|
| `loop <min> <max>`| Print the numbers between &lt;min&gt; and &lt;max&gt; using a forloop. |
| `lower <n n n...>`| Print all numbers less than 42. The amount of numbers passed should not matter.|
| `reverse <random sentence>`| Print a sentence backwards (ecnetnes modnar).|
| `all`| Run all functions consecutively. The values ​​you choose yourself. Please work on getting a nice presentation.|




Validate your `commands.bash` script by doing the following commands in the course directory in the terminal.

```bash
# Flytta till kurskatalogen
$ dbwebb validate script
```

Correct any errors that pop up and publish again. When it looks green you are done.  
