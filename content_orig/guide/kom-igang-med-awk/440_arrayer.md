---
author: lew
revision:
    "2020-02-12": "(A, lew) Första versionen."
...
Arrayer
=======================

Vi tittar på arrayer.



### Skapa array {#create}

Vi skapar en array på följande sätt:

```awk
#!/usr/bin/env awk

BEGIN {
    arr[0] = "something useful"
    arr["key"] = "value"

    print arr[0]        # something useful
    print arr["key"]    # value
}
```



### Radera från array {#delete}

```awk
#!/usr/bin/env awk

BEGIN {
    arr[0] = "something useful"
    arr["key"] = "value"

    delete arr[0]
}
```



### Loopa igenom array {#loop}

```awk
#!/usr/bin/env awk

BEGIN {
    arr[0] = "something useful"
    arr["key"] = "value"
    for (val in arr) {
        print arr[val]
    }
}
```



Om vi blandar in phones.txt igen så hade vi kunnat använda array på följande vis:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    OFS="\t"
    print "\nMärke\tModell\tPris\n"

    arr["model"] = "Samsung"
    arr["price"] = 8500
}

NR==1 { next }

{
    if (arr["model"] == $1 && $3 < arr["price"]) {
        print $1,$2,$3
    }
}
```



### split() {#split}

Det finns en inbyggd funktion som är nyttig att känna till. Vi kan använda `split()` på en sträng och skapa en array. Syntaxen är `split(string, array, [delimiter])`. Om inte avgränsaren är satt, används FS.

```awk
#!/usr/bin/env awk

{
    inputstring = "This/could/be/a/string"

    split(inputstring, outputarray, "/")

    print outputarray[2]
}
```

Ovan exempel skriver ut `could`.
