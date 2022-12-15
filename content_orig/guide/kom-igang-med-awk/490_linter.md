---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...
Linter
=======================

Som en direkt feedback på våra awkscript kan vi använda den inbyggda lintern med flaggan `--lint`. Vi använder GNU veriosnen gawk, vilket gör att vi kommer få varningar ibland. Till exempel på `length(item)`

```
$ awk --lint -f phones.awk phones.txt
awk: phones.awk:31: (FILENAME=phones.txt FNR=6) warning: `length(array)' is a gawk extension
```

Det är helt i sin ordning.
