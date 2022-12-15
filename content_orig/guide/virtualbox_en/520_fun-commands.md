---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
Fun commands {#fun}
=======================

[FIGURE src=/image/snapht15/linux-what-now.png?w=w2 caption="Linux, and now what?"]

Okay, we have a terminal and a Linux server. What are we going to do now?

So what can you do with a Unix terminal as a tool? Let's start with a few, maybe not always as useful tools but a little fun. Who knows, maybe there is a usecase for commands like `cowsay`?

<!--more-->

If you are not sure how to use the command, use the man page. There is always a man page for a Unix command.

```bash
man cowsay
```

If you do not understand the man-page then there is a man-page to the man-pages.

```bash
man man
```

Much like the strip says ([read the RTFM-strip on xckcd](http://xkcd.com/293/))...

[FIGURE src=http://imgs.xkcd.com/comics/rtfm.png caption="Words of wisdom -- read the man-page."]

If you wonder [what RTFM means](http://www.catb.org/jargon/html/R/RTFM.html)? Read more about Unix-slang in [The Jargon File](http://www.catb.org/jargon/html/index.html).

Now to the "fun" and "useful" commands.



Cowsay {#cowsay}
---------------------------------------------

```bash
# Debian
apt-get install cowsay

# Mac
brew install cowsay
```

Draws a cow -- or other nice animals -- together with a message.

[ASCIINEMA src=11808]



Fortune {#fortune}
---------------------------------------------

```bash
# Debian
apt-get install fortune

# Mac
brew install fortune
```

Display a quote from a known or unknown person.

[ASCIINEMA src=11809]



Figlet {#figlet}
---------------------------------------------

```bash
# Debian
apt-get install figlet

# Mac
brew install figlet
```

Draw an ASCII banner.

[ASCIINEMA src=11810]



CMatrix {#cmatrix}
---------------------------------------------

```bash
# Debian
apt-get install cmatrix

# Mac
brew install cmatrix
```

Feel like Neo and try to look into *The Matrix*.

[ASCIINEMA src=11813]



Convert an image to ASCII with jp2a {#jp2a}
---------------------------------------------

```bash
# Debian
apt-get install jp2a

# Mac
brew install jp2a
```

Download an image from the web and convert it to ASCII-art.

[ASCIINEMA src=11817]



More suggestions? {#more}
---------------------------------------------

Add your own suggestion to the forum in [the thread for fun terminal commands](t/2596).
