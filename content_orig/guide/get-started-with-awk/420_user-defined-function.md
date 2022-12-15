---
author: lew
revision:
    "2021-06-30": "(A, lew) Translated to english."
...
User defined function
=======================

You can also define your own functions. The syntax is a bit like JavaScript.



### Round the sum {#round}

We continue with the previous example and look at how we can round off the sum correctly with the help of our own function. We create the following function at the top of the file:

```awk
#!/usr/bin/env awk

function roundCorrect(val) {
    val = val + 0.5
    return val
}
...

{
    dollar = int(roundCorrect($3/8.31))
    printf("%d\t%-15s\t%-15s\t%5d\n", NR-1":",$1,$2,dollar)
}
...
```

Run the script:

```
$ awk -f phones.awk phones.txt

---- Phones in stock ----

#       Manufacturer    Model           Price
1       Apple           iPhone X          963
2       Apple           iPhone 11        1203
3       Samsung         Galaxy S20       1143
4       Samsung         Galaxy S21+      1384
5       Samsung         Galaxy Note20     963

---- End of print ----

```

We use a little trick that solves the rounding. Magically. We add a total amount, as we have several pieces in stock.

```awk
#!/usr/bin/env awk

function roundCorrect(val) {
    val = val + 0.5
    return int(val)
}

BEGIN {
    FS=","
    OFS="\t"
    print "\n-------- Phones in stock --------\n"
    printf("%s\t%-15s\t%-15s\t%-10s\t%-10s\t%s\n", "#", "Manufacturer", "Model", "Amount", "Price/unit", "Total price")
    total = 0
}

NR==1 { next }

{
    dollar = int(roundCorrect($3/8.31))
    current = dollar*$4
    total += current
    printf("%d\t%-15s\t%-15s\t%-10s\t%-10s\t%s\n", NR-1":",$1,$2,$4"st","$"dollar,"$"current)
}
END {
    print "\nTotal sum: $"total
    print "\n---- End of print ----\n"
}
```

Here we declare the variable `total` in the BEGIN block so it is available when we load the file. The final result looks something like:

```
$ awk -f phones.awk phones.txt
---- Phones in stock ----

#       Manufacturer    Model           Amount          Price/unit      Total price
1       Apple           iPhone X        3st             $963            $2889
2       Apple           iPhone 11       14st            $1203           $16842
3       Samsung         Galaxy S20      8st             $1143           $9144
4       Samsung         Galaxy S21+     13st            $1384           $17992
5       Samsung         Galaxy Note20   4st             $963            $3852

Total sum: $50719

---- End of print ----

```
