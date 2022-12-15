---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...

case
=======================

En case-sats fungerar likt en switch/case som vi sett tidigare.

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

`*)` i detta fallet representerar *default* och träder i kraft om inget annat stämmer. Vi kan även ha med fler alternativ:


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
