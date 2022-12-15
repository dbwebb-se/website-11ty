---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...

Associativa arrayer
=======================

En associativ array är en array med namngivna nycklar istället för indexvärden. Det finns inte stöd för multidimensionella arrayer, men det kan simuleras med hjälp av associativa arrayer.  


### Deklarera array {#declare-array}

Vi deklarerar en associativ array med stort A:

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

Nu innehåller inte den associativa arrayen fler arrayer utan det räknas som strängar. Dock separerade med ett mellanslag.



### Hantera arrayen {#hantera}

Att röra sig med den associativa arrayen är likt en vanlig array:

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



### Loopa igenom arrayen {#loop-array}

Vi tittar även på hur vi kan loopa igenom arrayen och dess innehåll:

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
