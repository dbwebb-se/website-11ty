---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
Logical operators
=======================

Logiska operatorer has the ability to return true/false or 0/1. Before we go further and look at how we work with the so-called logical operators, we have different ways of handling them. Nowadays we do not have to be as backward compatible as before. At least not in this course.



### The "old" way {#old}

With single square bracket (`[]`) we use the same methods found in the built-in command *test*. You could say they are synonyms. `[` (*test*) is a [POSIX](https://sv.wikipedia.org/wiki/POSIX) standard, where various shells has its own extensions. If you want backward compatible code you should be careful about the "extensions".

Tip: `$ man test`, or `$ man [`.

```bash
#!/usr/bin/env bash
#
# An example script with the old, more backwards compatible way

val1=5
val2=3

[ "$val1" -gt "$val2" ] && echo "$val1 is bigger than $val2"
```

Now you know it exists, but don't worry about `[` until you come across it in some script.



### The "new" way {#new}

As of Bash v2.02, the updated way works (double square bracket, `[[ ]]`). One difference is that the new version is a keyword, instead of a built-in program (test). It does not have the same basic requirements for how it should behave. For example, the requirement is not so harsh that one should place the variables in quotation marks: `"$variable"`. The reason for this is, it is quickly explained, that `[[ ]]` automatically retains the variable as it is and does no *word splitting* on the variables inside.

```bash
#!/usr/bin/env bash
#
# An example script with the new, updated way

val1=5
val2=3

[[ $val1 -gt $val2 ]] && echo "$val1 is bigger than $val2"
```

I'm not going to go through all the differences here, but we are using the new way: `[[ ]]`.
