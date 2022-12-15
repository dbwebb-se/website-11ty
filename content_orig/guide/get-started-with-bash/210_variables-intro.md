---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
Introduction to variables
=======================

Variables in Bash can contain any value, you can see it as a so-called *untyped* language. We assign values to a variable with `=`. Note that there should be no space between the reference and the value. When we want to refer to the variable, we use a dollar sign as prefix: `$variablename`. We can with the keyword *declare* create variables that should be treated as for example an integer.



### A start {#a-start}

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

my_number=42
my_name="Deep Thought"

echo "My name is $my_name and the answer is: $my_number"
```

It is "good practice" to encapsulate the variables in double quotes, `"`. The reason becomes more clear when we come to for-loops, but what happens is that the content is presented as a string, and does not risk being divided, as one may want actual commands to be. It also allows us to use simple quotes inside the duplicate. To demonstrate, we take a look at the following examples:

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

some_text="This contains some    spaces"

echo $some_text     # This contains some spaces
echo "$some_text"   # This contains some    spaces
```



### Constants {#constants}

Constants are written with capital letters:

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

MY_NUMBER=42
my_name="Deep Thought"

echo "My name is $my_name and the answer is: $MY_NUMBER"
```

In the situation above, we can change the constant without breaking anything. To avoid this, we can create a variable with the built-in keywords `declare -r` or `readonly`. Then we prevent them from being changed:

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

declare -r MY_NUMBER=42
# Alternativt
readonly MY_NAME="Deep Thought"

MY_NUMBER=5 # Throws the error message "MY_NUMBER: readonly variable"

echo "My name is $MY_NAME and the answer is: $MY_NUMBER"
```



#Integer {#integer}

When we want the script to treat a variable as an integer, we use `-i`:

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

declare -i value=42
```
