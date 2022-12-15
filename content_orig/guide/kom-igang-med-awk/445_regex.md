---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...
Regex
=======================

Vi kan även använda reguljära uttryck för att filtrera datan innan vi behandlar den.

<!--more-->

### Matchning {#match}

Vi kör vidare med telefonfilen. Låt säga att vi bara vill skriva ut raderna där strängen `pp` finns med:

```awk
#!/usr/bin/env awk

{
    if ($0 ~ /pp/) {
        print $0
    }
}
```


Villkoret **$0 ~ /pp/** jämför hela raden mot bokstäverna **pp**. Vi hade kunnat vända på det med **$0 !~ /pp/**.

Från kommandoraden hade uttrycket skrivits `$ awk '/pp/' phones.txt`.



### match() {#match}

Det finns en inbyggd funktion som hjälper oss att jobba med regex, `match()`. Vi tittar på ett exempel:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
}
{
    ans = match($2, /[a-z][[:digit:]]/)

    if (ans) {
        print $2
    }
}
```

Här väljer vi ut de telefoner där modellnamnet har en liten bokstav följt av en siffra. Svaret blir:

```
$ awk -f phones.awk phones.txt
Galaxy Note20
```
