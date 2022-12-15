---
author: lew
revision:
    "2021-06-30": "(A, lew) Translated to english."
...
Linter
=======================

As a direct feedback on our awkscript, we can use the built-in linter with the flag `--lint`. We use the GNU version gawk, which means we will get alerts from time to time. For example on `length(item)`


```
$ awk --lint -f phones.awk phones.txt
awk: phones.awk:31: (FILENAME=phones.txt FNR=6) warning: `length(array)' is a gawk extension
```

That's all right.
