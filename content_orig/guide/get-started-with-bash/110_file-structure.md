---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
File structure
=======================

There are many ways to structure files, not only in bash programming, but in most cases. We set a standard here that we use throughout the course.



### File extensions {#filext}

A bash script does not need to have a file extension, but it is only for the user. The two most common ones you see are `.sh` or `.bash`. In the guide and the course we use the file extension `.bash`.



### Shebang {#shebang}

A *shebang* (or hashbang) is a row at the top of the script files that tells you where the interpreter is located to be used to execute the script.

Since different unix systems place Bash in different places, `#!/usr/bin/env bash` is preferred. Then you do not need to know in advance where the interpreter is installed. The shebang makes sure that the first interpreter found in the user's `$PATH` is used, whether it is in `/bin`, `/usr/bin` or `/usr/local/bin`.

We always have the shebang at the top of the file, followed by a comment about what the file contains:

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

```



### Makes the file executable {#executeable}

In order to run the file, we need to make it executable. When we still need to stay at the terminal, we do it with the command *chmod*. We look in the manual: `$ man chmod`.

> chmod -- change file modes or Access Control Lists

If we scroll down we find:

> x       The execute/search bits.

It's about the permission and we can use that with: `chmod +x filename` to make a file executable. If we had used `-x` we would have removed the rights to execute the file.
