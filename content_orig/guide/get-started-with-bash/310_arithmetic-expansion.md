---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
Arithmetic expansion
=======================

With *arithmetic expansion* we can perform math with integers in our scripts and get the result returned to a variable. Similar to *command substitution* we can use `$(( ))` to get the calculated value. If we use brackets alone, `(( ))`, only the calculation is performed. Let us look at the difference.



### Double brackets {#double-brackets}

First, we look at *evaluation*:

```bash
#!/usr/bin/env bash
#
# An example of arithmetic evaluation

value=4
(( value+=1 ))

echo "$value" # Prints 5
```

Then we look at *expansion*:

```bash
#!/usr/bin/env bash
#
# An example of arithmetic expansion

value=4
result=$(( value+=1 ))

echo "$result" # Prints 5
```



### The built-in command *let* {#let}

The built-in command `let` lets us use mathematical formulas on variables. Similar to `(())` it only performs the calculation (*arithmetic evaluation*).

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

# With the keyword "let"
value1=5
value2=10
let value3=$value1+$value2

echo "$value3" # Prints 15
```
