---
author: lew
revision:
    "2021-06-29": "(A, lew) Translated to english."
...
Install awk (gawk)
=======================

awk comes preinstalled in almost all distributions of Linux/Unix. To find your version run the command:

```
$ awk --version
GNU Awk 5.0.1, API: 2.0 (GNU MPFR 4.0.2, GNU MP 6.2.0)
Copyright (C) 1989, 1991-2019 Free Software Foundation.
...
```

If it does not say `GNU Awk` then you need to update the version:

```
$ sudo apt install -y gawk
```

You should then have the correct version. Test with the command above and double check that it is correct before proceeding.

Good! The tool is in place, then we start.
