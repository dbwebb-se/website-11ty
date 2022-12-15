---
author: lew
revision:
    "2021-06-29": "(A, lew) Translated to english."
...
print
=======================

We start by printing text a little easily. We do not have to work with a file but we can use awk to print text.



### print - without file {#print-nofile}

```
$ awk 'BEGIN {print "some text"}'
some text
```

**BEGIN** indicates that the following expression will be executed once and before any file is loaded. The equivalent is END which is executed after all lines are processed. BEGIN and END are called *startup and cleanup actions*.  
**{ }** marks where our expressions should be. We need to encapsulate it within the curly brackets in order for it to be interpreted correctly.  
**print** is the magic keyword that marks the printout.


When we use the expressions on the command line, we need to enclose it with `'`.

So. Now we grab a file instead and see how else we can use `print`.
