---
author: lew
revision:
    "2021-06-30": "(A, lew) Translated to english."
...
Arithmetic
=======================

We can use arithmetic on the fields. Awk can read types automatically. We do not go through all the mathematical formulas we can do, a little simple mathematics is enough. We can also take the opportunity to fix the headlines.



### Example {#ex}

Let's say we want to see how much a phone would have cost in the currency dollars. At the time of writing, the price is at 1 dollar = 8.31sec.

We change the print line a bit:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    OFS="\t"
    print "\n---- Phones in stock ----\n"
    print "#\Manufacturer\tModel\tPrice\n"
}

NR==1 { next }
{
    print NR-1":",$1,$2,$3/8.31
}

END {
    print "\n---- End of print ----\n"
}
```

If we execute the script we get the result:

```
$ awk -f phones.awk phones.txt

---- Phones in stock ----

#       Manufacturer     Model  Price

1:      Apple   iPhone X        962.696
2:      Apple   iPhone 11       1203.37
3:      Samsung Galaxy S20      1143.2
4:      Samsung Galaxy S21+     1383.87
5:      Samsung Galaxy Note20   962.696

---- End of print ----

```

We could calculate directly on the field `$3/8.31`. The next step is to format the data and round off the sum.



```
...
print NR-1":",$1,$2,int($3/8.31)
...
```

The result:

```
$ awk -f phones.awk phones.txt

-------- Phones in stock --------

#       Manufacturer     Model  Price

1:      Apple   iPhone X        962
2:      Apple   iPhone 11       1203
3:      Samsung Galaxy S20      1143
4:      Samsung Galaxy S21+     1383
5:      Samsung Galaxy Note20   962

---- End of print ----

```

Note that the printout may be a little strange, even if we set an OFS. In this case we have `OFS="\t"` which is a tab. Some columns are wider than others and the tab does not work as intended. We can use `printf` to fix that.

```awk
BEGIN {
    ...
    printf("%s\t%-15s\t%-15s\t%5s\n", "#", "Manufacturer", "Model", "Price")
}
...
{
    printf("%d\t%-15s\t%-15s\t%5d\n", NR-1":",$1,$2,int($3/8.31))
}
...
```

The printout will then look a bit nicer:

```
$ awk -f phones.awk phones.txt

-------- Phones in stock --------

#       Manufacturer     Model           Price
1       Apple           iPhone X          962
2       Apple           iPhone 11        1203
3       Samsung         Galaxy S20       1143
4       Samsung         Galaxy S21+      1383
5       Samsung         Galaxy Note20     962

---- End of print ----

```

We can see that the built-in function `int()` cuts the decimals right off and some of the phones should be rounded up. In the next page, we solve that with a function of our own.

Read some about [Numeric functions](https://www.gnu.org/software/gawk/manual/html_node/Numeric-Functions.html)
