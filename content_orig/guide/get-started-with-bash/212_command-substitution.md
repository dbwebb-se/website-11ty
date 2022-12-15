---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
Command substitution
=======================

Before we move on, we look at something called *command substitution*. In some cases we want to use the result of an executed command. It can be done in a number of ways and is provided in a *subshell*. We look at the recommended way.



```bash
#!/usr/bin/env bash
#
# An example script for the linux course

path="$(pwd)" # Saves the result of the command "pwd" in a variable (command substitution)
result=$(ls -al "$path") # Here we use $path (command substitution)

echo "$result" # Prints the result
```

The result of the command `ls -al pwd` is assigned to the variable `result`. The command `pwd` gives the present folder's path. We have thus used *command substitution*.

You can also come across the use of back-ticks `` `command` ``. The result will be the same, but it is easy to run into problems if you want to run nested commands (commands in commands).

Another thing to keep in mid is that commands such as `$(cat file.txt)` can be used in a faster way with `$(< file.txt)`.
