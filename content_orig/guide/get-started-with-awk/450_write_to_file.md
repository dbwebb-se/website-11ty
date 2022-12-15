---
author: lew
revision:
    "2021-06-30": "(A, lew) Translated to english."
...

Write to file
=======================

Many times it is not enough to print the result in the terminal, we want to save it to file. It's actually no harder than doing a redirect:

```
$ awk -f regex.awk phones.txt > filename.txt
```



### Create a JSON structure - all rows {#json-all}

Let us find out how we can build a JSON file. You never know when it could be useful. We want the result to be valid JSON and that means we need to fix a little more with the script. Among other things, we may need to submit arguments. We can start by assuming that all data should be written to JSON.

We update the script and capture all lines except the first. We work a bit with our prints and build a JSON structure:

```
#!/usr/bin/env awk

BEGIN {
    FS=","
    print "["
}

NR==1 { next }

{
    print "\t{"
    print "\t\t\"brand\":\t\""$1"\","
    print "\t\t\"model\":\t\""$2"\","
    print "\t\t\"price\":\t\""$3"\","
    print "\t\t\"units\":\t\""$4"\""
    print "\t},"
}

END {
    print "]"
}
```

We control the formatting with tabs, `\t`. Each `print` ends up in a new row. If we run the script we are almost finished:

```
$ awk -f phones.awk phones.txt
...
{
        "brand":        "Samsung",
        "model":        "Galaxy S21+",
        "price":        "11500",
        "units":        "13"
},
{
        "brand":        "Samsung",
        "model":        "Galaxy Note20",
        "price":        "8000",
        "units":        "4"
},
]
```
The result is a JSON array with one object for each item in the warehouse. However, it will not validate as we have a comma too much at the end. This can be solved in several ways, more or less complicated. However, we can not find out how many lines there are in total at the right time inside the script, but we can find out before execution. Now we know we want the whole file except the first line. We start by updating the script:


```
...

    print "\t{"
    print "\t\t\"brand\":\t\""$1"\","
    print "\t\t\"model\":\t\""$2"\","
    print "\t\t\"price\":\t\""$3"\","
    print "\t\t\"units\":\t\""$4"\""

    if (NR == (lines)) {
        print "\t}"
    } else {
        print "\t},"
    }
}
```

We check if the variable `lines` is the same as the current line number and print the comma based on it. Where does that variable come from then? We will pass it when we execute the script:

```
$ awk -v lines=$(wc -l < phones.txt) -f phones.awk phones.txt
...
{
                "brand":        "Samsung",
                "model":        "Galaxy S21+",
                "price":        "11500",
                "units":        "13"
        },
        {
                "brand":        "Samsung",
                "model":        "Galaxy Note20",
                "price":        "8000",
                "units":        "4"
        }
]
```

It is of course the part `-v lines = $(wc -l <phones.txt)`. The flag **-v** indicates that we want to pass a variable. Even if we skip the first inside the script, the last line number will be the same. What do you do if you do not know which line numbers will be in the result?



### Create a JSON structure - chosen rows {#json-some}

We update the script and capture all lines where the phone's model was named something with a capital `S` followed by two digits. We break it down afterwards:

```awk
#!/usr/bin/env awk

function printToJSON(brand, model, price, units) {
    print "\t\t\"brand\":\""brand"\","
    print "\t\t\"model\":\""model"\","
    print "\t\t\"price\":\""price"\","
    print "\t\t\"units\":\""units"\""
}

BEGIN {
    FS=","
    print "["
    counter = 0
}
{
    ans = match($2, /S[0-9]{2}/)

    if (ans) {
        items[counter++]=$0
    }
}

END {
    for (item in items) {
        print "\t{"

        split(items[item], temp, ",")
        printToJSON(temp[1],temp[2],temp[3],temp[4])

        if (item < length(items)-1) {
            print "\t},"
        } else {
            print "\t}"
        }
    }
    print "]"
}
```

Oh, here things are happening. The function is not strange, the printout is just moved up in the script. We look at the other new parts:

```awk
...
if (ans) {
    items[counter++]=$0
}
...
```

If the line matches the regular expression, we add it to an array. The variable *counter* is defined in the BEGIN block.

```awk
...
for (item in items) {
    print "\t{"

    split(items[item], temp, ",")
    printToJSON(temp[1],temp[2],temp[3],temp[4])

    if (item < length(items)-1) {
        print "\t},"
    } else {
        print "\t}"
    }
}
```

We loop through our array and for each `item` in the array we run the following:

**split(items[item], temp, ",")** We use a built-in function that converts a string to an array. The syntax for the function is `split (SOURCE, DESTINATION, DELIMITER)`. As a bonus, the number of elements is returned.  
**printToJSON(temp[1],temp[2],temp[3],temp[4])** We pass the different parts to the print function.  
**if (item < length(items)-1) { ...** We make our check on the last value and skip the comma.

The result is JSON which validates. Finally, we write it to a file: `$ akw -f phones.awk phones.txt > phones.json`.

As a last option we can put a variable in the BEGIN block, eg `filename =" phones.json "`. We can then add `> filename` to all the prints in the script. In the END block, we must then close the stream to the file with `close (filename)`. Then we can execute the script without redirect: `$ akw -f phones.awk phones.txt`.
