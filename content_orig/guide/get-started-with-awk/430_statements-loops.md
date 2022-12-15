---
author: lew
revision:
    "2021-06-30": "(A, lew) Translated to english."
...
Statements and loops
=======================

Many parts such as arrays, conditions etc. work as we are used to. The different parts will therefore only be shown briefly.



### if {#if}

We start with an if statement. We print all phones where there are more than 10 in stock:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    OFS="\t"
    print "\Manufacturer\tModel\t\tIn stock\n"
}
NR==1 { next }
{
    if ($4 > 10) {
        print $1,$2,$4
    }
}
```

That will result in:

```
Manufacturer   Model    In stock

Apple   iPhone 11       14
Samsung Galaxy S21+     13
```

Should we need an else block, the syntax is exactly as you think:

```awk
if (some comparison) {
    # do something
} else {
    # do something else
}
```



### loops {#loops}

A forloop in awk is written "the usual" way:

```awk
for (initialization; condition; increment) {
    body
}
```



As well as a whileloop:

```awk
initialization

while (condition) {
  body
  increment
}
```

In other words, it is no hazzle to use neither condition management nor loops in awk.
