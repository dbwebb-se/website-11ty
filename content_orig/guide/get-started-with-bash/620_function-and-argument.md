---
author: lew
revision:
    "2019-08-20": "(A, lew) First edition."
...

Functions and arguments
=======================

A function can receive incoming arguments. When you call the function you also pass the arguments and based on them the function can return different results.

Let us look at the procedure.



### Argument {#argument}

When defining a function you can also define whether it should take arguments. Bash handles the number of arguments a little differently than we might be used to. We start by rewriting the previous function so we pass the argument `$USER` and use it inside the function:

```bash
#!/usr/bin/env bash
#
# An example script on functions with arguments

# Create function
function presentation {
    echo "Hello $1"
}

# Call function with argument
presentation "$USER"
```

The submitted arguments are stored in `$1, $2, $3`, etc. in the order we pass them. We take a look at how we can work with them.



### Manage multiple arguments {#multiple-arguments}

```bash
#!/usr/bin/env bash
#
# An example script on functions with multiple arguments

function arguments {
    # Get first argument
    echo "First argument: $1"

    # Get second argument
    echo "Second argument: $2"

    # Get all arguments
    echo "All arguments: $*"

    # Get amount of arguments
    echo "Amount of arguments: $#"
}

arguments "I am first!" "I am not third!" 42
```

Note that we also use `*` here instead of `@` when we want all arguments. We only want to print them here, in other words use them as a string. We look at the difference between `*` and `@`:

```bash
#!/usr/bin/env bash
#
# An example script on functions with multiple arguments
# $* saves the arguments as one string

function arguments {
    for arg in "$*"
    do
        echo "$arg"
    done
}

arguments 42 34 3 1

# Prints:
# 42 34 3 1
```

All arguments are saved as a string. `$@`, on the other hand, saves all arguments as individual strings:

```bash
#!/usr/bin/env bash
#
# An example script on functions with multiple arguments
# $@ saves the arguments as separated strings

function arguments {
    for arg in "$@"
    do
        echo "$arg"
    done
}

arguments 42 34 3 1

# Prints:
# 42
# 34
# 3
# 1
```

If we remove the quotes around `$@` and `$*`, they work the same, however, it is not optimal.
