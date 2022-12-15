---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Logiska operatorer
=======================

Logiska operatorer har en förmåga att returnera true/false, 0/1, ja - sant eller falskt helt enkelt. För att
Innan vi går vidare och tittar på hur vi jobbar med de så kallade logiska operatorerna har vi olika sätt att hantera dem. Nu för tiden behöver vi inte vara lika bakåtkompatibla som tidigare. I alla fall inte i den här kursen.



### Det "gamla" sättet {#gamla}

Med enkel hakparantes (single square bracket, `[ ]`) använder vi samma metoder som återfinns i det inbyggda kommandot *test*. Man kan säga att de är synonymer. `[` (*test*) är en [POSIX](https://sv.wikipedia.org/wiki/POSIX) standard, där diverse shell har sina egna utbyggnader. Vill man ha bakåtkompatibel kod bör man vara försiktig med "utbyggnaderna".

Tips: `$ man test`, alternativt `$ man [`.

```bash
#!/usr/bin/env bash
#
# An example script with the old, more backwards compatible way

val1=5
val2=3

[ "$val1" -gt "$val2" ] && echo "$val1 is bigger than $val2"
```

Nu vet ni att det finns, men bry er inte om `[` förrän ni stöter på det i något script.



### Det "nya" sättet {#nya}

Från och med Bash v2.02 fungerar det uppdaterade sättet, dubbla hakparanteser (double square bracket, `[[ ]]`). En skillnad är att den nya versionen är ett nyckelord, istället för ett inbyggt program (test). Det har inte samma grundkrav på hur det ska bete sig. Till exempel är kravet inte lika hårt att man bör lägga variablerna inom citationstecken: `"$variable"`. Anledningen till det är, snabbt förklarat, att `[[ ]]` automatiskt behåller variabeln som den är och gör ingen *word splitting* på variablerna inuti.

```bash
#!/usr/bin/env bash
#
# An example script with the new, updated way

val1=5
val2=3

[[ $val1 -gt $val2 ]] && echo "$val1 is bigger than $val2"
```

Jag tänker inte gå igenom alla skillnader här, utan vi kör vidare på det nya sättet: `[[ ]]`.
