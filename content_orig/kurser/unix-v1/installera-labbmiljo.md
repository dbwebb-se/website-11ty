---
author:
    - efo
    - lew
revision:
    "2019-08-16": (A, efo, lew) Första utgåvan, kopia av linux.
...
Install dbwebb CLI
==================================

*(ca: 2-4 hours)*

You will in this guide install the `dbwebb` **C**ommand **L**ine **I**nterface (CLI).

First we will start by installing Git version control, curl, wget, rsync and ssh other programs which will be used in the background to fetch course material and example code. Open the Terminal program in Debian in VirtualBox and run the following command.

<pre><code>$ su --command "apt-get install sudo; echo '$USER ALL=NOPASSWD: ALL' > '/etc/sudoers.d/$USER'; cat '/etc/sudoers.d/$USER'"</code></pre>

You will be prompted to type the root password. Next step is to install some programs:

<pre><code>$ sudo apt-get install curl rsync wget git openssh-server</code></pre>

Do not copy the `$` it indicates a terminal prompt and that the command should be run inside a terminal.

When the installation has finished continue by installing the `dbwebb` CLI with the following command. It will download and run an installation script.

<pre><code>$ sudo bash -c "$(wget -qO- https://raw.githubusercontent.com/mosbth/dbwebb-cli/master/install.bash)"</code></pre>

To verify that the installation completed successfully run the following command the output the current version of the `dbwebb` command.

<pre><code>$ dbwebb --version</code></pre>

Below the installation process is shown.

[ASCIINEMA src=122841]



Configuring dbwebb {#config}
----------------------------------

Use the command `dbwebb config` to create the configuration file used by the dbwebb CLI.

You will now be asked to enter your student acronym. Which looks something like `goli14` or `mase15`.

To output the content of the configuration file use the following command.

```text
$ cat $HOME/.dbwebb.config
```

The entire flow looks like this.

[ASCIINEMA src=24613]



Clone and initialize the course material {#clone}
----------------------------------

The fast road.

```bash
$ cd ~
$ mkdir dbwebb-courses
$ cd dbwebb-courses
$ dbwebb clone unix
$ cd unix
$ dbwebb init
```



Log in to student server {#login}
----------------------------------

Use the command `dbwebb login` to log in to the student server. You will be prompted to enter your student password. Note that when entering your password does not show in the terminal, but characters are entered. The student server is a Debian machine just like the operating system you installed in VirtualBox.

To close the connection to the student server enter `exit`.

We do not want to enter our password every time we log on to the student server therefore we will use ssh keys instead. Run the following command to create a ssh key and upload the key to the student server.

```bash
$ dbwebb sshkey
```

[ASCIINEMA src=24617]

You can verify that the ssh key works like expected by using `dbwebb login` to log in without entering a password.
