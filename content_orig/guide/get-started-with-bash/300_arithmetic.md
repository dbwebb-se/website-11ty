---
sectionHeader: true
linkable: true
...
Arithmetic
=======================

When we want to perform arithmetic (math) in Bash, we need a little managing for it to work. As always, there are different ways to perform it. Above all, there are two different ways of performing so-called *arithmetic expansion*. Double brackets `(( ))` or with the built-in command *let*. There are also logical operators that help us with condition management.

In many other languages ​​it is straightforward. We only write what we want to add or subtract or whatever it may be:

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

value1=5
value2=10
value3=$value1+$value2

echo "$value3" # Prints 5+10
```

In Bash, however, it is not quite as we thought, as we can see above. Move ahead and we'll take a look at what it might look like.
