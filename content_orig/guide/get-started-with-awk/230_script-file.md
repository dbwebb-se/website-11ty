---
author: lew
revision:
    "2021-06-30": "(A, lew) Translated to english."
...
A script file
=======================

We start by creating a file:

```
$ touch phones.awk
```

Open the file in your editor.



### Start {#start}

We start by moving in the previous command. Here we can skip the first line as follows:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    OFS="="
}
NR==1 { next }
{
    print $2,$1
}
```

We tell the script that if NR is 1 then move on to the next row with the keyword *next*. The result is the same as before and we execute the script with the flag `-f <filename>`:

```
$ awk -f phones.awk phones.txt
iPhone X=Apple
iPhone 11=Apple
Galaxy S20=Samsung
Galaxy S21+=Samsung
Galaxy Note20=Samsung
```

The printout is not that exciting so we give it some more work:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    print "\n---- Start of report ----\n"
}
NR==1 { next }
{
    print NR-1 ": " $1,$2,$3
}
END {
    print "\n---- End of report ----\n"
}
```

Run the command again:

```
$ awk -f phones.awk phones.txt

---- Start of report ----

1: Apple iPhone X 8000
2: Apple iPhone 11 10000
3: Samsung Galaxy S20 9500
4: Samsung Galaxy S21+ 11500
5: Samsung Galaxy Note20 8000

---- End of report ----

```

We see that we worked both with BEGIN and with END. We also use the built-in variable `NR`. Note that we could also use arithmetic directly on the variable.
