---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...

while-loop
=======================

Even in Bash, a while loop needs an end goal to work toward.

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

To break a loop, we use the keyword `break`:

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

To jump to the next iteration, we use the keyword `continue`:

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
