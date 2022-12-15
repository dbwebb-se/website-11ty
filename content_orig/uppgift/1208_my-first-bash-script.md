---
author: lew
category: unix
revision:
  "2019-08-20": (A, lew) First edition from vlinux.
...
My first Bash script
==================================

You will create a number of scripts in Bash that perform certain predefined tasks.

<!--more-->



Prerequisites {#pre}
-----------------------

You have the knowledge corresponding to Chapter 24 "Writing Your First Script" in the book [The Linux Command Line](kunskap/boken-the-linux-command-line) or ["Writing Shell Scripts"](http://linuxcommand.org/lc3_wss0010.php).



Introduction {#intro}
-----------------------

The files you create and use in this task should be saved in your course repo in the directory `me/kmom02/script`. They are used to report the task.

All scripts should be executable, so be sure to set the permissions on the scripts to be executable.



Requirements {#req}
-----------------------

1. Create a script `hello.bash` that prints the text "Hello World\n".

1. Create a script `argument.bash` that prints the passed argument. Ex: "./argument.bash test me" should print "test me".

1. Create a script `if_1.bash` that handles an argument, a number, which checks if the argument is larger than 5 using an if statement. Ex: `./if_1.bash 7` should return "7 is greater than 5" and `./if_1.bash 3` should return "3 is NOT greater than 5".

1. Create a script `if_2.bash` that handles an argument, a number, and prints "Higher!" if the argument is higher than 5, "Lower!" if it is lower and "Same!" if it is the same.

1. Create a script `argument_2.bash` that handles different arguments.

    1. If the argument is "d" then "date" should be printed, ie today's date
    1. If the argument is "n", the script should print all digits from 1 to 20, tip: {1..20}.
    1. If the argument is "a", the next argument should be printed, if two arguments are passed. If the number of arguments passed is lower or higher than 2, the following will be printed: "Missing arguments".

1. Create a script `forloop.bash` that prints the numbers 10 to 20 using a forloop.

1. Create a script `my_function.bash` containing a function, `greet ()`. Call the function to print "Hello $USER".

1. Publish your answers as follows.

```bash
# Stand in the course folder
dbwebb publish script
```

Correct any errors that pop up and publish again. When it looks green you are done.
