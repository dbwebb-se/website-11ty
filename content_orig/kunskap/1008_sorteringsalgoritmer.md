---
author: lew
revision:
    "2019-03-01": (B, aar) Tog bort merge sort kod.
    "2017-02-08": (A, lew) First version.
category:
    - oopython
...
Sorteringsalgoritmer
===================================

[FIGURE src=/image/oopython/kmom05/soert_top.png?w=c5 class="right"]

De flesta programmeringsspråk har inbyggda sorteringsfunktioner. De använder antingen en specifik eller en kombination av flera sorteringsalgoritmer. Pythons sort()-metod använder till exempel [Timsort](https://en.wikipedia.org/wiki/Timsort) som är en blandning av "merge sort" och "insertion sort". Vi ska titta närmare på de vanligaste sorteringsalgoritmerna och se hur de är implementerade och vad som kan dölja sig bakom exempelvis `array.sort()`.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i Python och du vet vad variabler, typer och funktioner innebär.



De vanligaste sorteringsalgoritmerna {#de-vanligaste-sorteringsalgoritmerna}
------------------------------

Använd er av [Visualgo](https://visualgo.net/en/sorting) medan ni läser om algoritmerna för att visualisera hur de fungerar. 

###Bubble sort {#bubble-sort}  

Bubble sort är en av de enklaste sorteringsalgoritmerna, både att implementera och att förstå. Det största (eller minsta) värdet "bubblas" upp i listan följt av det näst största värdet. Varje "bubbla" går igenom hela listan en gång. En implementation kan se ut som följer:  

```python
def bubble_sort(items):
    """ Bubble sort """
    for i in range(len(items)):
        for j in range(len(items)-1-i):
            if items[j] > items[j+1]:
                items[j], items[j+1] = items[j+1], items[j]     # Byt plats

    return items
```

Som ni ser så går bubble sort utmärkt att implementera utan rekursiv metod. Här används istället en nästad for-loop.

[Bubble sort dance](https://www.youtube.com/watch?v=Iv3vgjM8Pv4)



###Insertion sort {#insertion-sort}  

Insertion sort använder en osorterad lista och en sorterad lista. Värdet från den osorterade listan sätts in i den sorterade listan på rätt plats. Värdena i den sorterade listan flyttas baserat på det nya värdet som ska placeras på rätt plats. Då båda listorna är lika stora så samma lista representera båda fallen:  

```python
def insertion_sort(items):
    """ Insertion sort """
    for i in range(1, len(items)):
        j = i
        while j > 0 and items[j] < items[j-1]:
            items[j], items[j-1] = items[j-1], items[j]
            j -= 1

    return items
```

[Insertion sort dance](https://www.youtube.com/watch?v=ROalU379l3U)  



###Quicksort {#quick-sort}

Quick sort använder sig utav ett [pivot-värde](https://en.wikipedia.org/wiki/Quicksort#Choice_of_pivot). Efter valet av pivot är gjort så delar man upp listan i två delar. Den ena delen hanterar värdena som är mindre än pivot och den andra delen hanterar värdena som är större än pivot. Quick sort arbetar med fördel rekursivt där varje anrop till funktionen hanterar ett nytt pivot-värde baserat på den nya listan som skickats in. Bas-fallet är när listans längd har nått 1. Till slut så slår man samman de tre delarna.  

```python
def quick_sort(items):
    """ Quicksort """
    if len(items) > 1:
        pivot_index = len(items) // 2
        smaller_items = []
        larger_items = []

        for i, val in enumerate(items):
            if i != pivot_index:
                if val < items[pivot_index]:
                    smaller_items.append(val)
                else:
                    larger_items.append(val)

        quick_sort(smaller_items)
        quick_sort(larger_items)
        items[:] = smaller_items + [items[pivot_index]] + larger_items

    return items
```

Här används `//` för att returnera en integer. (Enkel division `/` kan returnera en float). Vi ser även "enumerate()" som skapar tupler av elementen i listan och möjliggör indexering till exempel (i, val).  

[Quick sort dance](https://www.youtube.com/watch?v=3San3uKKHgg)



###Merge sort {#merge-sort}  

Merge sort fungerar snarlikt quick sort. Den använder också ["divide and conquer"-metoden](https://en.wikipedia.org/wiki/Divide_and_conquer_algorithms) med att dela upp listan till fler och sortera del-listorna separat, baserat på ett pivotvärde. Merge sort använder rekursion för att sortera del-listorna och när listan är nere på en längd av 1 ses den som klar.

<!--
```python
def merge_sort(items):
    """ Merge sort """
    if len(items) > 1:

        mid = len(items) // 2        # Dela vid mitten
        left = items[0:mid]
        right = items[mid:]

        merge_sort(left)            # Sortera den vänstra listan "in-place"
        merge_sort(right)           # Sortera den högra listan "in-place"

        l, r = 0, 0
        for i in range(len(items)):     # Sätt ihop båda listorna

            lval = left[l] if l < len(left) else None
            rval = right[r] if r < len(right) else None

            if (lval is not None and rval is not None and lval < rval) or rval is None:
                items[i] = lval
                l += 1
            elif (lval is not None and rval is not None and lval >= rval) or lval is None:
                items[i] = rval
                r += 1

    return items
```
-->
[Merge sort dance](https://www.youtube.com/watch?v=XaqR3G_NVoo)



Tidskomplexitet {#tidskomplexitet}
------------------------------  

En sak som skiljer de olika algoritmerna åt är deras [tidskomplexitet](https://en.wikipedia.org/wiki/Time_complexity). Tidskomplexitet kan ta ett eget kursmoment att förklara ingående vad det är och hur man räknar på det så artikeln förklarar enbart grunden.  

Tänk dig tre kuber som står på golvet:  
1. Liten: 1x1x1 meter  
2. Mellan: 10x10x10 meter  
3. Stor: 100x100x100 meter  



###Linjär tidskomplexitet {#linjar}  

Tänk dig nu att du ska dra ett streck längs golvet runt kuberna. Tar det 1 minut att rita runt den lilla kuben tar det ca 10 minuter att rita runt den mellanstora och ca 100 minuter att rita ett streck runt den stora. Detta kallas för "linjär tidskomplexitet". När man beskriver tidskomplexitet pratar man om [Ordo](https://sv.wikipedia.org/wiki/Ordo) och [Big O](https://en.wikipedia.org/wiki/Big_O_notation). Linjär tidskomplexitet kan beskrivas med **O(n)**.  



###Kvadratisk tidskomplexitet {#kvadratisk}  

Nu är det dags att måla ena väggen på kuberna. Om det tar 1 minut att måla den lilla, tar det ca 100 minuter att måla den mellanstora och 10000 minuter att måla den stora.  

Detta är för att den mellanstora är 10 gånger så stor som den lilla men ena väggen 10\*10 gånger större. Det stora husets vägg är 100\*100 gånger större. Kvadratisk tidskomplexitet kan beskrivas med **O(n²)**



###Kubisk tidskomplexitet {#kubisk}  

Om vi ska fylla kuberna med vatten. Tar det 1 minut att fylla den lilla kuben, tar det ca 1000 minuter att fylla den mellanstora kuben och ca 1 miljon minuter att fylla den stora.  

Räknar vi på det är den mellanstora kubens volym 10\*10\*10 gånger större än den lilla kubens. Den stora kubens volym blir 100\*100\*100 gånger så stor. Kubisk tidskomplexitet kan beskrivas med **O(n³)**.  



###Konstant tidskomplexitet {#konstant}  

Konstant tidskomplexitet är den tid det tar att till exempel ta ett kort på kuberna. Det är samma tid för alla så det kan beskrivas med **O(1)**.



###Allmänt om tidskomplexitet {#allmant}  

Olika algoritmer har som sagt olika tidskomplexitet, beroende på olika faktorer som påverkar dem. Några exempel på faktorer är:  
* loopar  
* if-satser  
* mängden variabler  
* antal gånger en rekursiv funktion anropar sig själv  

Alla faktorer slås ihop och kan räknas ut så att man får fram tidskomplexiteten. När man räknar på faktorerna använder man oftast **n** med högst värde. Har man med både **O(n²)** och **O(n³)** är det då **O(n³)** som tas med i beräkningen.  

Vi kan titta i tabellen för att se hur tidskomplexiteten snabbt kan påverka tiden för en algoritm:  

|  In-data  |  O(1)  |  O(n)      |  O(n²)    |
|-----------|:-------|:-----------|:----------|
|  1 n        | 17 sek | 1 sekund   | 1 sekund  |
|  10 n       | 17 sek | 10 sekund  | 2 minuter |
|  100 n      | 17 sek | 2 minuter  | 3 timmar  |
|  1000 n     | 17 sek | 17 minuter | 12 dygn   |
|  1 miljon n | 17 sek | 12 dygn    | 30000 år  |

Vi går inte in närmare på detta här utan nu har ni en kännedom om att det finns och används ofta i sorteringsalgoritmer för att se hur de kommer fungera med olika mängder element och vad man förvänta sig.


Avslutningsvis {#avslutning}
------------------------------  

Det här var lite grunder om sorteringsalgoritmer. Hoppas ni har fått en liten förståelse vad som kan dölja sig bakom en `array.sort()` och liknande inbyggda funktioner.
