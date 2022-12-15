---
author: lew
revision:
    "2021-06-30": "(A, lew) Translated to english."
...
Regex
=======================

We can also use regular expressions to filter the data before we process it.

<!--more-->

### Matching {#matching}

We continue to use phones.txt. Let's say that we only want to print the lines where the string `pp` is included:

```awk
#!/usr/bin/env awk

{
    if ($0 ~ /pp/) {
        print $0
    }
}
```


The condition **$0 ~ /pp/** compares the whole line with the letters **pp**. We could have flipped it around with **$0! ~ /pp/**.

From the commandline the expression would have looked like this: `$ awk '/pp/' phones.txt`.



### match() {#match}

There is a built-in function that helps us with regex, `match()`. We have a look at an example:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
}
{
    ans = match($2, /[a-z][[:digit:]]/)

    if (ans) {
        print $2
    }
}
```

Here we select the phones where the model name has a small letter followed by a number. The answer is:

```
$ awk -f phones.awk phones.txt
Galaxy Note20
```
