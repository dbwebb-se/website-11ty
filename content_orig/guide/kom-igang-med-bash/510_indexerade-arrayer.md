---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...

Indexerade arrayer
=======================

En indexerad array har ett indexvärde där ett värde finns. Vi känner igen det från nästan vilket språk som helst.



### Deklarera array {#declare-array}

Vi kan deklarera en array på olika sätt beroende på om vi vill ge den något värde initialt eller ej.

```bash
#!/usr/bin/env bash
#
# An example script on declaring arrays

# with keyword declare
declare -a rocky_planets

# or create empty array
rocky_planets=()
```



### Lägga till värde i arrayen {#add-value-array}

Vi kan lägga till elementen direkt eller via index. Vi kan även lägga till element i början, i slutet eller på en bestämd plats:

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



### Ta bort element {#ta-bort}

Nu fick vi ju med ett element för mycket då solen inte är en sten-planet. Vi kan ta bort det första elementet och rätta till indexeringen med lite trolleri:

```bash
#!/usr/bin/env bash
#
# An example script on removing item from array

# Remove first element by extracting (index 0 will be Mercury)
rocky_planets=("${rocky_planets[@]:1}")
```



### Hantera arrayen {#hantera}

Det kan vara lite speciellt att hantera en array. Vi kikar på hur vi kan arbeta med den.

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
Notera att det i vissa fall används `*` istället för `@`. Det fungerar i stort sett likadant, dock så kan man få valideringsfelet:

> *Argument mixes string and array. Use * or separate argument.*

Det handlar om att `@` lagrar alla element separat och `*` lagrar dem som ett argument. Bygger vi på en sträng kan det bli tokigt med `@`.

Vi tittar närmare på det när vi kommer till **funktioner och argument**.
[/INFO]



### Loopa igenom arrayen {#loop-array}

En array är ju en utmärkt struktur för att bli itererad.

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
