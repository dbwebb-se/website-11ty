---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...

Funktioner och lokala varibler
=======================

När vi är inne i en funktion har vi en form av scope och kanske inte alltid vill peta på de globala variablerna, då alla variabler per default är globala i Bash. Vi kan med nyckelordet `local` skapa lokala variabler som enbart lever inuti sitt scope.



### Lokala varibler {#lokala-variabler}

Låt oss kika på ett exempel:

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

Nu petar vi inte på den globala `$total` när vi använder funktionen, utan vi använder den lokala variabeln.
