---
author: efo
category: python
revision:
    "2019-06-17": (C, aar) La till del om readlines.
    "2018-06-29": (B, aar) Uppdaterade mappstruktur mot kursrepo.
    "2017-06-14": (A, efo) Första utgåvan inför kursen python H17.
...
Att läsa filer som listor i Python
==================================
För att kunna spara data mellan två exekveringar av våra program kan filer användas.

Vi ska i denna övning läsa från filer och använda datan som finns i filen och övningen avslutas med att vi skriver till en fil.



<!--more-->



Kodexempel från denna övningen finns i kursrepot för [python-kursen](https://github.com/dbwebb-se/python/tree/master/example/file/list) och här på [dbwebb](repo/python/example/file/list). Där finns även den filen vi läsar data från.



Läsa från fil {#lasa}
--------------------------------------

Kopiera "items.txt" från exempel mappen.

```bash
# Ställ dig i kurskatalogen
cd me
cp -i ../example/file/list/items.txt kmom05/file
cd kmom05/file
```

Vi börjar med att öppna filen `items.txt` med hjälp av konstruktionen `with`, där definerar vi variabeln `filehandle` som innehåller kopplingen till filen. Med `filehandle` kan vi läsa hela filen genom att använda `read()`, men vi väljer att bara läsa en rad med hjälp av funktionen `readline()`.

```python
# the name of the file
filename = "items.txt"

# with - as for reading a file automatically closes it after reading is done
with open(filename) as filehandle:
    line = filehandle.readline()

# print the line read from the file
print(line)

# skriver ut: cookie,cake,tea
```

Vi har i övningen [Kom igång med datatypen lista i Python](kunskap/kom-igang-med-datatypen-lista-i-python) tittat på hur vi kan använda listor och här ser vi ett ypperligt tillfälle att använda oss av en lista. Vi har en komma-separerat sträng med tre delsträngar. Vi vill dela upp den komma-separerade strängen så varje delsträng blir ett element i en lista, detta kan göras med sträng-funktionen `split()`.

```python
# split the line into a list on the comma ","
items_as_list = line.split(",")
# print what the list looks like
print(items_as_list)

# skriver ut: ['cookie', 'cake', 'tea\n']
```

Vi har nu en lista som innehåller tre element som vi har läst in från filen `items.txt`. Notera `\n` i sista elementet, `\n` är en radbrytning och egentligen inget vi vill ha med i listan. Så vi kan använda funktionen `strip()` för att ta bort så kallat whitespace (mellanrum, radbrytning osv.) från änderna av strängen.

```python
# the name of the file
filename = "items.txt"

# with - as for reading a file automatically closes it after reading is done
with open(filename) as filehandle:
    line = filehandle.readline().strip()

# split the line into a list on the comma ","
items_as_list = line.split(",")
# print what the list looks like
print(items_as_list)
```

Vi får nu utskriften `['cookie', 'cake', 'tea']` som vi hade förväntat från första början.



#### readlines() {#readlines}

Istället för att själva dela upp strängen och ta bort sista tomma raden kan vi använda den inbyggda funktionen `readlines()` istället. Som läser upp hela filens innehåll och returnerar den som en lista där alla rader blir ett eget element. 

```python
# the name of the file
filename = "items.txt"

# with - as for reading a file automatically closes it after reading is done
with open(filename) as filehandle:
    line = filehandle.readlines()

# print what the list looks like
print(items_as_list)
```

Vi får igen utskriften `['cookie', 'cake', 'tea']` med färre rader kod.

Vi ska nu titta på hur vi kan lägga till flera element i listan och hur vi skriver listan till fil.



Skriva till fil {#skriva}
--------------------------------------
Vi vill lägga till ett element i slutet av listan och vet sen tidigare att då använder vi `list` funktionen `append()`. Då vi inte vill skriva listan direkt till fil gör vi om den med motsatsen till `split()` som heter `join()`. Precis som `split()` är `join()` en strängfunktion så vi anger först strängen som vi vill använda som 'lim' och sen anger vi listan som vi vill sätta ihop till en sträng. Precis som när vi läste från fil använder vi `with` när vi vill skriva till en fil. Dock måste vi öppna filen med skrivrättigheter och det gör vi genom att använda flaggan `w`.

```python
# add item to the list
items_as_list.append("cup")
# print what the list looks like after change
print(items_as_list)

# join the list into a string with a comma ","" between every item
list_as_str = ",".join(items_as_list)
# show what the string looks like after join
print(list_as_str)

# write the line to the file
with open(filename, "w") as filehandle:
    filehandle.write(list_as_str)
```



Avslutningsvis {#avslutning}
--------------------------------------
Vi har nu sett hur vi kan läsa raderna från en fil via en sträng till en lista, hur vi lägger till element i listan och hur vi skriver den ändrade listan till fil. Filhantering är ett viktigt verktyg för att spara undan data som kan återanvändas vid nästa exekvering av programmet och vi har i denna övning fått en introduktion till hur man gör detta i Python.
