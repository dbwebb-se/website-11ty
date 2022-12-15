---
author: lew
revision:
    "2021-06-29": "(A, lew) Translated to english."
...
printf
=======================

We can format our printout with *printf* according to the following structure. Here we do not use OFS, but *format string*.

```
$ awk 'BEGIN {printf("%d %s %.3f\n", 42, "some text", 42)}'
42 some text 42.000
$ awk 'BEGIN {printf "%d %s %.3f\n", 42, "some text", 42}'
42 some text 42.000
```

In other words, the parentheses are optional. We can see three types of formatting `%d`,`%s` and `%.3f`. The are called "Format-Control letters":

* %s (string)
* %d (decimal number, integer)
* %f (floating point notation)

There are of course even more, but they will not be included in the course.

If we want to control "padding", we can set it with positive or negative numbers:

```
$ awk 'BEGIN {printf("%10d %s %.3f\n", 42, "some text", 42)}'
        42 some text 42.000
$ awk 'BEGIN {printf("%-10d %s %.3f\n", 42, "some text", 42)}'
42         some text 42.000
```

Read more about [control letters](https://www.gnu.org/software/gawk/manual/html_node/Control-Letters.html).
