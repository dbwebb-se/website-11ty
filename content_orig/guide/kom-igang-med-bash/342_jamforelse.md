---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Operatorer för jämförelse
=======================

När vi jämför variabler eller värden finns det olika operatorer beroende på om vi vill jämföra heltal eller strängar.


### Jämföra heltal {#heltal}

Vi börjar med att jämföra heltal. Konstruktionerna kommer göra en utskrift om jämförelsen resulterar i `1` (sant).

```bash
#!/usr/bin/env bash
#
# An example script comparison operators on integers

val1=5
val2=3

# -gt (greater than)
[[ $val1 -gt $val2 ]] && echo "$val1 is bigger than $val2"

# -lt (less than)
[[ $val1 -lt $val2 ]] && echo "$val1 is smaller than $val2"

# -eq (equal to)
[[ $val1 -eq $val2 ]] && echo "$val1 is equal to $val2"

# -ne (not equal to)
[[ $val1 -ne $val2 ]] && echo "$val1 is not equal to $val2"

# -ge (greater than or equal to)
[[ $val1 -ge $val2 ]] && echo "$val1 is greater than or equal to $val2"

# -le (less than or equal to)
[[ $val1 -le $val2 ]] && echo "$val1 is less than or equal to $val2"

```



### Jämföra strängar {#strangar}

Nu kör vi strängar. Konstruktionerna kommer göra en utskrift om jämförelsen resulterar i `1` (sant). Den högra delen av jämförelsen med `=` och `!=` är plats för något som kallas *pattern matching* och bör omslutas av citationstecken, `" "`. Det skadar inte att använda citationstecknen på båda sidor. Vi tittar på pattern matching lite senare.

```bash
#!/usr/bin/env bash
#
# An example script comparison operators on strings

string1="a"
string2="b"

# = (equal to)
[[ "$string1" = "$string2" ]] && echo "$string1 and $string2 are the same!"

# != (not equal to)
[[ "$string1" != "$string2" ]] && echo "$string1 and $string2 are not the same!"

# < (less than, according to the ASCII alphabetical order)
[[ "$string1" < "$string2" ]] && echo "$string1 and $string2 are not the same!"

# > (greater than, according to the ASCII alphabetical order)
[[ "$string1" > "$string2" ]] && echo "$string1 and $string2 are not the same!"

# -z (string is null or has zero length)
string1=""
[[ -z "$string1" ]] && echo "String is null or has zero length"

# -n (string is not null)
[[ -n "$string2" ]] && echo "String is not null"
```



### Pattern matching {#pattern-matching}

Vi kan som nämnt ovan även använda oss utav pattern matching, vilket innebär att vi kan jämföra olika delar av till exempel strängarna för att hitta mönster.



```bash
#!/usr/bin/env bash
#
# An example script pattern matching

string1="donald duck"
match="don"

# * (wildcard)
#
# starts with
[[ $string1 = "$match"* ]] && echo "$string1 starts with $match"

# ends with
[[ $string1 != *"$match" ]] && echo "$string1 does not end with $match"

```
