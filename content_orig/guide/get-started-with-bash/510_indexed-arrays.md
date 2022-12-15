---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...

Indexed arrays
=======================

An indexed array has an index value where a value exists. We recognize it from almost any language.



### Declare array {#declare-array}

We can declare an array in different ways depending on whether we want to give it some value initially or not.

```bash
#!/usr/bin/env bash
#
# An example script on declaring arrays

# with keyword declare
declare -a rocky_planets

# or create empty array
rocky_planets=()
```



### Add element to the array {#add-element-array}

We can add the elements directly or via index. We can also add elements at the beginning, end or at a specific location:

```bash
#!/usr/bin/env bash
#
# An example script on adding elements to arrays

# in declaration, separated by space
rocky_planets=("Mercury" "Venus")

# or by index
rocky_planets[2]="Earth"

# or by appending
rocky_planets+=("Mars")

# or by prepending
rocky_planets+=("The Sun" "${rocky_planets[@]}")
```



### Remove element from the array {#remove}

Now we got an element too much since the sun is not a rock planet. We can remove the first element and correct the indexing with some magic:

```bash
#!/usr/bin/env bash
#
# An example script on removing item from array

# Remove first element by extracting (index 0 will be Mercury)
rocky_planets=("${rocky_planets[@]:1}")
```



### Manage the array {#manage}

Managing an array can be a bit special. We take a look at how we can work with it.

```bash
#!/usr/bin/env bash
#
# An example script on working with arrays

rocky_planets=("Mercury" "Venus" "Earth" "Mars")

# Get one element by index
echo "First element: ${rocky_planets[0]}"

# Get all elements
echo "All elements: ${rocky_planets[*]}"

# Get size
echo "Size of array: ${#rocky_planets[@]}"

# Get size of element in array
echo "Size of second element: ${#rocky_planets[1]}"

# Get indices
echo "Indices: ${!rocky_planets[*]}"

# Extract part of array
echo "2 elements from index 1: ${rocky_planets[*]:1:2}"

# Extract part of item in array
echo "First 2 characters from third element: ${rocky_planets[2]:0:2}"
```

[INFO]
Note that in some cases it uses `*` instead of `@`. It works pretty much the same, however, you can get the validation error:

> *Argument mixes string and array. Use * or separate argument.*

It is a matter of `@` storing all elements separately and `*` storing them as an argument. If we build on a string, it can be crazy with `@`.

We take a closer look at it when we go through **functions and arguments**.
[/INFO]



### Loop through the array {#loop-array}

An array is an excellent structure for iterating.

```bash
#!/usr/bin/env bash
#
# An example script on looping arrays

rocky_planets=("Mercury" "Venus" "Earth" "Mars")

# for loop - get items
for planet in "${rocky_planets[@]}"
do
    echo "$planet"
done

# for loop - work with indices
for index in "${!rocky_planets[@]}"
do
    echo "Index: $index is ${rocky_planets[$index]}"
done
```
