---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...

Simple function
=======================

A function in Bash is created with the keyword *function* and the syntax is similar to the one we are used to.


### Create function {#create-function}

This is how we create a function.

```bash
#!/usr/bin/env bash
#
# An example script on creating a function

# Create function
function presentation {
    echo "Hello $USER"
}

# Call function
presentation
```

As we can see, the only difference from, for example, php is that we do not need parentheses `()`, neither when creating or using the function. In the example above, we print only the current user, whose name is stored in the built-in variable `$USER`.
