---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...

Associative arrays
=======================

An associative array is an array of named keys instead of index values. Multidimensional arrays are not supported, but can be simulated using associative arrays.  


### Declare array {#declare-array}

We declare an associative array with capital A:

```bash
#!/usr/bin/env bash
#
# An example script on associative arrays

# with keyword declare and uppercase A
declare -A all_planets

# Setup content for associative array
rocky_planets=("Mercury" "Venus" "Earth" "Mars")
gas_planets=("Jupiter" "Saturn")
ice_planets=("Uranus" "Neptune")

# Add all arrays as content in associative array (as strings)
all_planets["rocky_planets"]="${rocky_planets[*]}"
all_planets["gas_planets"]="${gas_planets[*]}"
all_planets["ice_planets"]="${ice_planets[*]}"
```

Now, the associative array does not contain any more arrays, but it is counted as strings. However, separated by a space.



### Manage array {#manage}

Managing the associative array is like a regular array:

```bash
#!/usr/bin/env bash
#
# An example script on working with associative arrays

# Get all elements
echo "All elements: ${all_planets[*]}"

# Get element by key
echo "Gas planets: ${all_planets[gas_planets]}"

# Get size
echo "Size of array: ${#all_planets[@]}"

# Get size of element in array (counts characters)
echo "Size of ice_planets: ${#all_planets[ice_planets]}"

# Get indices
echo "Indices: ${!all_planets[*]}"

# Extract part of array content
echo "First 4 chars from given element: ${all_planets[rocky_planets]:0:4}"
```



### Loop through array {#loop-array}

We also look at how we can loop through the array and its contents:

```bash
#!/usr/bin/env bash
#
# An example script on looping associative arrays

declare -A all_planets

rocky_planets=("Mercury" "Venus" "Earth" "Mars")
gas_planets=("Jupiter" "Saturn")
ice_planets=("Uranus" "Neptune")
#
all_planets["rocky_planets"]="${rocky_planets[*]}"
all_planets["gas_planets"]="${gas_planets[*]}"
all_planets["ice_planets"]="${ice_planets[*]}"

# for loop - get items
for planet in "${all_planets[@]}"
do
    echo "$planet"
done

# for loop - work with indices
for index in "${!all_planets[@]}"
do
    echo "$index: ${all_planets[$index]}"
done

# for loop - nested loop
for index in "${!all_planets[@]}"
do
    echo "The $index are:"

    # No quotes here as the point is to use word splitting
    for planet in ${all_planets[$index]}
    do
        echo "$planet"
    done
done
```
