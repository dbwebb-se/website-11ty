---
author: lew
revision:
    "2021-06-30": "(A, lew) Translated to english."
...
Arrays
=======================

We have a look at arrays.



### Create an array {#create}

We create an array the following way:

```awk
#!/usr/bin/env awk

BEGIN {
    arr[0] = "something useful"
    arr["key"] = "value"

    print arr[0]        # something useful
    print arr["key"]    # value
}
```



### Delete from array {#delete}

```awk
#!/usr/bin/env awk

BEGIN {
    arr[0] = "something useful"
    arr["key"] = "value"

    delete arr[0]
}
```



### Loop through array {#loop}

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


If we use the file phones.txt again, we could use an array like this:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    OFS="\t"
    print "\nManufacturer\tModel\tPrice\n"

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

There is a built-in function that is useful. We can use `split ()` on a string and create an array. The syntax is `split (string, array, [delimiter])`. If the delimiter is not set, FS is used.

```awk
#!/usr/bin/env awk

{
    inputstring = "This/could/be/a/string"

    split(inputstring, outputarray, "/")

    print outputarray[2]
}
```

Above example will print `could`.
