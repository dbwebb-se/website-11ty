---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Arithmetic expansion
=======================

Med *arithmetic expansion* kan vi utföra matematik med heltal i våra script och få det returnerat till en variabel. Likvärdigt med *command substitution* kan vi använda `$(( ))` för att få det uträknade värdet. Om vi enbart använder parenteserna, `(( ))`, utförs bara uträkningen. Vi tittar på skillnaden.



### Dubbla parenteser {#dubbla-parenser}

Först tar vi enbart *evaluation*:

```bash
#!/usr/bin/env bash
#
# An example of arithmetic evaluation

value=4
(( value+=1 ))

echo "$value" # Prints 5
```

Sedan tittar vi på *expansion*:

```bash
#!/usr/bin/env bash
#
# An example of arithmetic expansion

value=4
result=$(( value+=1 ))

echo "$result" # Prints 5
```



### Det inbyggda kommandot *let* {#let}

Det inbyggda kommandot `let` låter oss använda matematiska formler på variabler. Det gör likt `(())` enbart själva uträkningen, en *arithmetic evaluation*.

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
