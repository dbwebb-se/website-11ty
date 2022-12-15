---
author: lew
category: unix
revision:
    "2019-09-03": (A, lew) First edition.
...
Solve the maze with your mazerunner in bash
==================================

You will get a finished server, written in Node.js, and a RESTful API to the server. The server implements a *maze*. The server is ready and you can test run it via the curl command.

Your task is to build a bash client for the server, according to a requirements specification. Your client should use the server to resolve the maze.

<!--more-->




Prerequisites {#pre}
-----------------------

* You have read the [guide](guide/get-started-with-bash) on programming with Bash.
* You have completed the assignment [Bash script with arguments and options](uppgift/bash-options-command-arguments).



Introduction {#intro}
-----------------------

Read briefly on Wikipedia about what a [*maze*](https://en.wikipedia.org/wiki/Maze) can be.

<!-- This is what it may look like when you solve the maze with your script:

[INFO]Note that the file extension should be **mazerunner.bash**.[/INFO]

[ASCIINEMA src=1voz3ecbgsbu5dytp9sz5n2kb] -->



### About the server maze {#about}

Start by installing node and npm in debian on your virtual machine with the following commands. Node is JavaScript on the server and is used to run the maze server.

```shell
$ sudo apt update
$ sudo apt install curl
$ cd ~
$ curl -sL https://deb.nodesource.com/setup_10.x -o nodesource_setup.sh
$ sudo bash nodesource_setup.sh
$ sudo apt install nodejs
$ nodejs -v
```

You should see a version number starting on 10 after the last command.

The server [maze is in the course repot](https://github.com/dbwebb-se/unix/tree/master/example/maze). There is all the source code and a specification of the [server's API](https://github.com/dbwebb-se/unix/blob/master/example/maze/api.md).

Start by getting acquainted with the server's API.

Here's how to start the server.

```bash
# Go to the course repo
cd example/maze
node index.js
```

You can test the maze server with curl. Like this.

[ASCIINEMA src=243851]

Please study the source code of the maze server. Had you been able to write it yourself?



### Make a copy of Maze {#copy}

First, make a copy of the code in `example/maze/`. Save all your files in the directory `me/kmom04/maze`.

```bash
# Go to the course repo
cp -ri example/maze/{api.md,index.js,maze.js,maps,router.js} me/kmom04/maze/
```

Now you are ready to start your own variant of the maze server.

You start the server with `$ node index.js`.



### To save the game ID to file {#id}

Your client needs to remember the game ID and which room you are in. You save that information easiest in a file. To avoid having to handle JSON with bash, the server has the opportunity to deliver the responses as a comma-separated string.

Try running the following commands against the server and you will see the difference.

```bash
curl localhost:1337/map
curl localhost:1337/map?type=csv
```

It is therefore `?type=csv` that can make it easier for your bash client who will need to parse the content.



Requirements {#req}
-----------------------

The requirements are two-parted. The first set is mandatory to pass the assignment. The second part is an optional assignment if you want to challenge yourself.



### Bash script for solving the maze (part 1) {#part1}

1. Create a script called `mazerunner.bash` in the folder `maze/`. Make the script executable.

1. Use the API to add the following features to the script. The script should always return a response if all went well or not.

| Command                | What should happen? |
|-------------------------|-----------------|
| `./mazerunner.bash init`     | Initiate a game and save the game ID in a file. |
| `./mazerunner.bash maps`     | Show which maps are available to choose from. |
| `./mazerunner.bash select <#map>` | Select a specific map by number. |
| `./mazerunner.bash enter`    | Enter the first room. |
| `./mazerunner.bash info`     | Show information about the room. |
| `./mazerunner.bash go north` | Go to a new room, if the direction is supported. |
| `./mazerunner.bash go south` | Go to a new room, if the direction is supported. |
| `./mazerunner.bash go east`  | Go to a new room, if the direction is supported. |
| `./mazerunner.bash go west`  | Go to a new room, if the direction is supported. |

Here is how it may look when you are done.

[ASCIINEMA src=244037]



### Bashscript in loop (part 2 - optional) {#part2}

1. Extend the functionality of `mazerunner.bash` so that everything happens in a loop when you start the program with `./mazerunner.bash loop`. The script should start by initiating a new game and showing what maps are available. The player can then select a map and the player enters the first room. Then the loop continues and waits for the player to enter the direction north, south, east, west, or help for a help text or quit to finish.

This is what it might look like.

[INFO]
You do not have to start and stop the server from within your script. You can do that manually.
[/INFO]

[ASCIINEMA src=23368]




Validate your `mazerunner.bash` script by doing the following commands in the course directory in the terminal.

```bash
# Go to the course repo
$ dbwebb validate maze
```

Correct any errors that pop up and publish again. When it looks green you are done.
