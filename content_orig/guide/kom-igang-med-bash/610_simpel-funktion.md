---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...

Simpel funktion
=======================

En funktion i Bash skapas med nyckelordet *function* och syntaxen påminner om den vi är vana vid.


### Skapa funktion {#skapa-funktion}

Så här skapar vi en funktion.

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

Som vi kan se är enda skillnaden från tex php att vi inte behöver parenteser `()`, varken vid skapandet eller användandet av funktionen. I exemplet ovan skriver vi enbart ut den nuvarande användaren, vars namn sparas i den inbyggda variabeln `$USER`.
