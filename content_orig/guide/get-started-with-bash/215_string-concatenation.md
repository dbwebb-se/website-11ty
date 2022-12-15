---
author: lew
revision:
    "2019-08-19": "(A, lew) Första versionen."
...
String concatenation
=======================

As you know, building strings together is called *string concatenation*. In Bash it is relatively straightforward. We use double quotes around the printout and place only the variables where we want them. Thanks to the double quotes, things are going well.

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

first_part="This is the first part."
second_part="And this is the second part."
both_parts="$first_part $second_part"

echo "$both_parts"
```
