---
sectionHeader: true
linkable: true
...

Arguments, options och commands
=======================

What are *arguments*, *options* and *commands* really? We try to make it clear. An entire command often follows the structure: `$ <command> [option] [argument]`.


# Commands {#commands}

A *command* tells what to do.

> `$ mkdir foldername`

Here, `mkdir` is the command.



# Argument {#argument}

An argument is passed with a command. In the example:

> `$ mkdir foldername`

`foldername` is the argument, (the name of the folder).



# Option {#option}

An *option* can usually be sent to choose how an argument should be handled by the command.

> `$ mkdir -p foldername/temp`

Here, the flag `-p` is an option that tells the command `mkdir` how the folders (argument) are to be created.

Have a look in the manual to see what options are available for different commands.



# Other structures {#other-structures}

We can sometimes also send arguments to an option, for example:

> `$ ssh username@localhost -p 2222`

Here, `2222` is an argument to the option `-p`. `username@localhost` is an argument to the command `ssh`. Hard to keep track? It will eventually fall into place, but it is good to know about this when you are talking about scripts and their variuos options.
