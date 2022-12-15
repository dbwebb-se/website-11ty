---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...

while-loop
=======================

Även i Bash behöver en while loop ha ett slutmål att jobba sig mot.

```bash
#!/usr/bin/env bash
#
# An example script on while loop

counter=0

while [[ $counter -lt 10 ]]
do
    echo $counter
    (( counter++ ))
    # let counter ++
    # let counter+=1
    # let counter=counter+1
done
```

För att bryta en loop fungerar nyckelordet `break`:

```bash
#!/usr/bin/env bash
#
# An example script on while loop with break

counter=0

while true
do
    echo "$counter"
    (( counter++ ))
    if [[ $counter -gt 5 ]]
    then
        echo "done"
        break
    fi
done
```

För att hoppa till nästa iteration finns `continue`:

```bash
#!/usr/bin/env bash
#
# An example script on while loop with continue

counter=0

while true
do
    (( counter++ ))

    if [[ $counter -eq 5 ]]
    then
        echo "skipping $counter"
        continue
    elif [[ $counter -eq 10 ]]
    then
        echo "done"
        break
    fi

    echo "$counter"
done
```
