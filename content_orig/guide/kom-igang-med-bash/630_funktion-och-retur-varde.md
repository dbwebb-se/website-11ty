---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...

Funktioner och returvärde
=======================

I Bash kan en funktion inte returnera något värde. Vi kan hantera det på olika sätt. Ett alternativ är att vi sätter vi ett värde till en global variabel:

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

Ett annat alternativ är att fånga upp en utskrift från funktionen och använda *command substitution*:

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
