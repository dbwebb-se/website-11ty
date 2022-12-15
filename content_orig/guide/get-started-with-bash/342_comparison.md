---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
Operators for comparison
=======================

When we compare variables or values, there are different operators depending on whether we want to compare integers or strings.


### Compare integers {#compare-integers}

We start by comparing integers. The designs will print if the comparison results in `1` (true).

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



### Compare strings {#compare-strings}

The designs will print if the comparison results in `1` (true). The right part of the comparison with `=` and `!=` Is space for something called *pattern matching* and should be enclosed in quotation marks, `" "`. It does not hurt to use the quotes on both sides. We'll look at pattern matching a little later.

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

As mentioned above, we can also use pattern matching, which means that we can compare different parts of the strings, for example, to find patterns.



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
