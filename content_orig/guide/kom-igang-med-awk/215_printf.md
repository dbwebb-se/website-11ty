---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...
printf
=======================

Vi kan formattera vår utskrift med *printf* enligt följande struktur. Här använder vi inte OFS, utan en *format string*.

```
$ awk 'BEGIN {printf("%d %s %.3f\n", 42, "lite text", 42)}'
42 lite text 42.000
$ awk 'BEGIN {printf "%d %s %.3f\n", 42, "lite text", 42}'
42 lite text 42.000
```

Parentesen är med andra ord valfri. Vi kan se tre typer av formattering `%d`,`%s` och `%.3f`. De kallas för "Format-Control letters":

* %s (string)
* %d (decimal number, integer)
* %f (floating point notation)

Det finns såklart ännu fler, men de kommer inte tas upp i kursen.

Vill vi styra "padding" kan vi sätta den med positiva eller negativa tal:

```
$ awk 'BEGIN {printf("%10d %s %.3f\n", 42, "lite text", 42)}'
        42 lite text 42.000
$ awk 'BEGIN {printf("%-10d %s %.3f\n", 42, "lite text", 42)}'
42         lite text 42.000
```

Se mer om [control letters](https://www.gnu.org/software/gawk/manual/html_node/Control-Letters.html).
