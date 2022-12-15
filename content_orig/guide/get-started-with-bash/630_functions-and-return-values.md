---
author: lew
revision:
    "2019-08-20": "(A, lew) First edition."
...

Functions and return values
=======================

In Bash, a function cannot return any value. We can handle it in different ways. An alternative is that we set a value to a global variable:

```bash
#!/usr/bin/env bash
#
# An example script on return alternatives 1

result=0

function count {
    for value in "$@"
    do
        (( result+=value ))
    done
}

count 29 10 3

echo "$result" # 42
```

Another option is to capture an echo from the function and use *command substitution*:

```bash
#!/usr/bin/env bash
#
# An example script on return alternatives 2

function count {
    total=0

    for value in "$@"
    do
        (( total+=value ))
    done

    echo "$total"
}

result=$(count 15 7 20)

echo "$result" # 42
```
