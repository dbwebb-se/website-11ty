---
author: lew
revision:
    "2019-08-20": "(A, lew) First edition."
...

Functions and local variables
=======================

When we are in a function, we have a form of scope and may not always want to poke at the global variables, as all variables are by default global in Bash. With the keyword `local` we can create local variables that live solely within their scope.



### Local variables {#locala-variables}

Let us look at an example:

```bash
#!/usr/bin/env bash
#
# An example script on local variables

# A global variable
total=42

function count {
    # create a local variable
    local total
    for value in "$@"
    do
        (( total+=value ))
    done

    echo "$total"
}

echo "$total" # 42
count 1 2 3   # 6
```

Now we are not calling on the global `$ total` when using the function, we are using the local variable.
