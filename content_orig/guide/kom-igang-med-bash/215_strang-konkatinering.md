---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Strängkonkatinering
=======================

Att bygga ihop strängar kallas som bekant *strängkonkatinering*. I Bash är det relativt rakt på sak. Vi använder dubbla citationstecken runt utskriften och placerar bara variablerna där vi vill ha dem. Tack vare de dubbla citationstecknen går det bra.

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

first_part="This is the first part."
second_part="And this is the second part."
both_parts="$first_part $second_part"

echo "$both_parts"
```
