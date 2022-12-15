---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...

Funktioner och argument
=======================

En funktion kan ta emot inkommande argument. När man anropar funktionen så skickar man med argumenten och baserat på dem kan funktionen returnera olika resultat.

Låt oss se hur det går till.



### Argument {#argument}

När man definierar en funktion så kan man även definiera om den skall ta argument. Bash hanterar antalet argument lite annorlunda än vad vi kanske är vana vid. Vi börjar med att skriva om föregående funktion så vi skickar med `$USER` och använder den inuti funktionen:

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

De inskickade argumenten sparas undan i `$1, $2, $3` osv i den ordningen vi skickar in dem. Vi tittar lite på hur vi kan jobba med just dem.



### Hantera flera argument {#flera-argument}

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

Notera att vi även här använder `*` istället för `@` när vi vill ha alla argument. Vi vill ju enbart skriva ut dem här, med andra ord använda dem som en sträng. Vi tittar på skillnaden mellan `*` och `@`:

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

Alla argument sparas som en sträng. `$@` däremot sparar alla argument som individuella strängar:

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

Om vi tar bort citationstecknen runt `$@` och `$*` fungerar de likadant, dock är det inte optimalt.
