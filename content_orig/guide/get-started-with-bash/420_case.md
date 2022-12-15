---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...

case
=======================

A case-statement works like a switch/case as we have seen before.


```bash
#!/usr/bin/env bash
#
# An example script on case

input="42"

case "$input" in
    hello)
        echo "Oh, Hi there $USER"
    ;;
    42)
        echo "Ahh, $input! The meaning of life!"
    ;;
    *)
        echo "I have no idea what you want..."
esac
```

`*)` n this case represents *default* and comes into force if no other match is made. We can also include more options:


```bash
#!/usr/bin/env bash
#
# An example script on case with multiple tests

planet="Neptune"

case "$planet" in
    Mercury \
    | Venus \
    | Earth \
    | Mars)
        echo "Rocky planet"
    ;;
    Jupiter \
    | Saturn)
        echo "Gas planet"
    ;;
    Uranus \
    | Neptune)
        echo "Ice planet"
    ;;
    *)
        echo "$planet is not a planet in our solarsystem."
esac

```
