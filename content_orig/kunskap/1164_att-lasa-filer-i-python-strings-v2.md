---
author: aar,efo
category: python
revision:
    "2020-08-19": (D, aar) Uppdaterade kopierings instruktioner.
    "2018-06-29": (C, aar) Uppdaterade mappstruktur mot kursrepo.
    "2017-06-21": (B, aar) Skrev om inför python-v2.
    "2017-06-14": (A, efo) Första utgåvan inför kursen python H17.
...
Att läsa filer som strängar i Python
==================================
Fram tills nu har vi bara jobbat med data som ligger i RAM-minnet, vilket betyder att när vi stänger ner programmet försvinner all data vi har skapat i programmet. Ett sätt att kunna spara den data så att den finns tillgänglig när vi startar upp programmet igen senare är att spara datan till en fil. Att kunna jobba med filer gör att vi kan spara data permanent och även inspektera den när programmet är avstängt.

Vi ska i denna övning läsa data från filer, lägga till data och ta bort data från filer.



<!--more-->



Kodexempel från denna övningen finns i kursrepot för [python-kursen](https://github.com/dbwebb-se/python/tree/master/example/file/string) och här på [dbwebb](repo/python/example/file/string).


Introduktion {#intro}
--------------------------------------
Vi gör ett simpelt program för att skapa en inköpslista. Vi har redan tre produkter i filen "items.txt" i exempel mappen som behöver inhandlas, i vårt program ska vi kunna lägga till, ta bort och visa upp innehållet i filen. Vi vill inte ha några tomma rader i filen.

Kopiera "items.txt" från exempel mappen.

```bash
# Ställ dig i kurskatalogen
cp -i example/file/string/items.txt me/kmom06/file
cd me/kmom06/file
```

I programmet ska vi kunna göra val för om vi vill läsa vad filen innehåller, lägga till en produkt i filen, skriva över innehållet i filen och att ta bort en produkt från filen. Vi börjar med en klassisk while-loop med meny och input.

```python
def menu():
    print(
        """
1. Show file content
2. Add item, append
3. Replace content
4. Remove an item
        """
        )
    return int(input("Choice: "))

def choice(inp):
    if inp == 1:
        pass
    elif inp == 2:
        pass
    elif inp == 3:
        pass
    elif inp == 4:
        pass
    else:
        exit()

if __name__ == "__main__":
    while(True):
        choice(menu())
```
Vi har en funktion för skriva ut valen som finns och en för kolla vilket val som är gjort. if-satsen i "choice()" är förbered för det fyra valen som ska gå att göras, senare ersätter vi `pass` med funktionsanrop. Vi går vidare till val 1, att läsa vad som finns i en fil.

Läsa från fil {#lasa}
--------------------------------------
Börjar med att öppna filen `items.txt` och kolla på innehållet. Den innehåller tre produkter, "cookie", "cake" och "tea", en produkt på varje rad. Innehållet i filen är egentligen en sträng, `"cookie\ncake\ntea"`, där din texteditor tolkar "\n" som en ny rad. Vi kommer återkomma till detta senare i övningen.

Vidare till koden, vi börjar med val 1, att läsa filens innehåll. När man jobbar med filer behöver man öppna dem, det görs med funktionen `open("filnamn")` där man skickar sökvägen till filen som argument. Funktionen returnerar ett fil objekt som blir kopplingen till filen. Efter man har jobbat färdig med filen behöver man stänga kopplingen. Vi kommer använda oss av nyckelordet `with` för att stänga kopplingen automatisk så vi inte behöver komma ihåg att göra det manuellt.
Vi kolla på hur koden kan se ut för att läsa en fil.

```python
filename = "items.txt" # global variable for holding filename
def readfile():
    # with - as for reading a file automatically closes it after reading is done
    with open(filename) as filehandle:
        content = filehandle.read()
    return content
    
...
    if inp == 1:
        print(readfile())
...
```
Vi hårdkodar vad filen heter som en global variable i början. I funktionen `readfile()` använder vi "with" för att skapa ett block, vi lägger koden som använder filen inom det blocket. `open(filename) as filehandle` är i princip samma sak som att skriva `filehandle = open(filename)`, med andra ord kommer vi åt kopplingen till filen via variabeln `filehandle`. I blocket skriver vi koden för att jobba med filen och det är inte mycket som krävs för att läsa en fil. `filehandle.read()` läser filens innehåll och returnerar det som en sträng. När all kod som ligger inom blocket har exekverat stängs kopplingen automatiskt. Om vi inte hade använt "with" hade vi behövt lägg till en rad ovanför `return content` där vi stänger kopplingen. I if-satsen för de olika valen uppdaterar vi val 1 till att anropa `readfile()` och skriva ut vad den returnerar. 

Testa kör programmet, jag visar vilket val jag gör med `$x` i exemplet nedanför.

```bash
python3 string-to-file.py
$1
cookie
cake
tea
```
Så här kan det se ut när man läser en fil i Python, vi går vidare till att skriva data till filen så vi kan lägga till nya produkter.



Skriva till fil {#skriva}
--------------------------------------
När man skriver data till en fil kan man välja på att bifoga i slutet av filen eller att ersätta innehållet med nytt. Vi börjar med att kolla på hur man lägger till data sist i filen.



### Bifoga data i fil {#append}

Att skriva till en fil fungerar ungefär som att läsa, vi behöver bara använda funktionen `write()` istället för `read()`. 

```python
def write_to_file(item):
    with open(filename, "a") as filehandle:
        filehandle.write(item)
    
...
    if inp == 2:
        write_to_file(input("Item to add:"))
...
```

Notera att vi i funktionen `write_to_file(item, mode)` skickar med `"a"` som andra argument till `open()` funktionen. Det värdet bestämmer att `write` funktionen ska lägga till värden på slutet av innehållet i filen. `write()` tar en sträng som argument och skriver det värdet till filen som `filehandle` är skapad med. I if-satsen för val 2 anropar vi `write_to_file()` och skickar med en sträng som användaren skriver in med "input" anropet. Vi testar köra programmet och ser hur filen innehåll ser ut om vi lägger till något.

```bash
python3 string-to-file.py
$1
cookie
cake
tea
$2
apple
$1
cookie
cake
teaapple
```

"apple" kom inte på en egen rad utan på samma som "tea". Vi måste ha med "\n" i strängen mellan "tea" och "apple" för att få den på ny rad, som vi skrev om i början av övningen. En snabb lösning är att konkatenera input värdet med "\n". Det är dock ingen komplett lösning, lösningen introducerar tomma rader i filen i vissa situation, t.ex. om vi lägger till ett värde när filen är tom. Vi kommer inte lösa dem här men försök gärna tänk fram en egen lösning.

```python
...
    if inp == 2:
        write_to_file("\n" + input("Item to add:"))
...
```
Nu kommer det nya värde ligga på en egen rad när vi kör programmet igen.

```bash
python3 string-to-file.py
$1
cookie
cake
teaapple
$2
pear
$1
cookie
cake
teaapple
pear
```

### Skriv över data i fil {#write}

Vi har ett fel i filen, "teaapple", så låt oss implementera en funktion för att skriva över all data i filen med ny och på så sätt kan vi rätta till innehållet.

När vi vill skriva över hela filen använder vi också "write()" funktionen men vi behöver öppna filen med argumentet "w" istället för "a". Så vi uppdatera "write_to_file" funktionen så den kan användas för både lägga till och skriva över. För att göra det skickar vi in hur den ska öppnas som ett argument.
```python
def write_to_file(content, mode):
    with open(filename, mode) as filehandle:
        filehandle.write(content)

...
    elif inp == 2:
        write_to_file("\n" + input("Item to add: "), "a")
...
```

Vi går vidare till att skapa en ny funktion där användaren kan skriva in alla nya produkter som ska skrivas till filen. I funktionen behöver vi ta input fram till att användaren skickar in "q" för att markera att den är klar, while-loop, och sen anropa "write_to_file" funktionen.

```python
def replace_content():
    item = ""
    result = ""
    while item != "q":
        result += item
        item = input("Item to add: ")
    write_to_file(result, "w")

...
    elif inp == 3:
        replace_content()
...
```

I funktionen "replace_content" testar vi be om input i en while-loop utan en if-sats för att kolla om användaren skickar in "q". I första iteration är `item` en tom sträng som konkateneras till `result`. Då förblir "result" orörd, sen ber vi om input och nästa iteration börjar. I loopens villkor kollar vi om användaren är klar, om input är "q", annars konkateneras "item" med "result" igen och sen ber vi om input. När användaren är klar skickar vi "result" strängen till "write_to_file" funktionen och skriver den till filen.

```bash
python3 string-to-file.py
$1
cookie
cake
teaapple
pear
$3
meat
potato
banan
q
$1
meatpotatobanan
```

Det här blev inte helt rätt, vi behöver få in newlines igen.

```python
def replace_content():
    item = ""
    result = ""
    while item != "q":
        result += item + "\n"
        item = input("Item to add: ")
    write_to_file(result, "w")
```

Snabb lösning är att bara lägga till "\n" efter varje ny produkt.

```bash
python3 string-to-file.py
$3
kakor
godis
läsk
q
$1

kakor
godis
läsk

```

Det är fortfarande inte korrekt, nu är där en tom rad först och sist i filen (det är lättare att se om ni öppnar filen än bara kolla på utskriften). För att lösa det kan vi använda "strip()" funktionen för att ta bort alla leading och trailing whitespaces, med andra ord newlines som ligger längst fram och längst bak i strängen.

```python
def replace_content():
    item = ""
    result = ""
    while item != "q":
        result += item + "\n"
        item = input("Item to add: ")
    write_to_file(result.strip(), "w")
```

Om ni själva kör programmet igen så bör ni se att filen blir korrekt när ni skriver över innehållet. Nästa steg är att ta bort ett föremål åt gången ur filen.



Radera i fil {#radera}
--------------------------------------

Att radera data från en fil är oftast inte helt trivialt då det inte finns någon inbyggd funktion för det. Det vi behöver göra är att läsa upp filens innehåll och manipulera strängen, ta bort det vi inte vill ha med, och sen skriva den till fil igen. Om vi hade vetat att filen bara kommer innehålla ett fåtal produkter hade vi inte behövt radera utan kunde nöjt oss med skriva över funktionen. Användaren får hela tiden skriva om listan när den ska ta bort något. Vi gör dock inte det antagandet nu utan skriver en ny funktion för det.

I den nya funktionen ska vi börja med att använda "readfile()" för att få innehållet, be användaren om input om vad som ska bort, ta bort den produkten från strängen och sist använda "write_to_file()" för att skriva det uppdaterade innehållet.

```python
def remove_item():
    content = readfile()
    remove = input("What item should be removed: ")

    if remove in content: # check if item to remove exists
        modified_content = content.replace(remove, "")
        write_to_file(modified_content, "w")

...
    elif inp == 4:
        remove_item()
...
```

Vi kollar först att det användaren skriver in faktiskt finns i strängen från filen och sen används funktionen "replace()" på innehållet för att ersätta produkten med en tom sträng. Vi testar det nya menyvalet.

```bash
python3 string-to-file.py
$1
meatloaf
meat
tea
cake
$4
meat
$1
loaf

tea
cake
```

Två fel uppstod när vi körde programmet, raden med "meat" blev en tom rad och "meatloaf" förlorade sin substräng "meat". Vi ska lösa den tomma raden men felet med substrängen lämnar jag till er själva att hitta en lösning på. En snabb lösning på den tomma raden är att lägga till "\n" på substrängen som tas bort. 

```python
def remove_item():
    ...
    if remove in content: # check if item to remove exists
        modified_content = content.replace("\n" + remove, "")
        write_to_file(modified_content, "w")
```
Nu letar "replace" upp vad användaren skriver in plus ett newline tecken framför det och ersätter med inget.

```bash
python3 string-to-file.py
$1
loaf

tea
cake
$4
tea
$1
loaf

cake
$4
loaf
$1
loaf

cake
```

Upptäckte ni det nya felet? "loaf" är kvar i filen. Koden kollade om "\nloaf" fanns i strängen men i och med att det var första värdet finns ingen newline framför. Därför trodde koden att produkten inte fanns i strängen. Vi behöver uppdatera funktionen med att kolla om produkten som ska bort ligger först i strängen och då inte lägga till "\n" i början vid replace.

```python
def remove_item():
    ...
    if remove in content: # check if item to remove exists
        if content.index(remove) == 0: # if the item is the first line in the file
            modified_content = content.replace(remove, "")
        else:
            modified_content = content.replace("\n" + remove, "")
        write_to_file(modified_content, "w")
```

`index()` kollar om produkten finns i content och returnera positionen i strängen där substrängen, produkten, börjar. Om produkten är det första i strängen börjar dess på substräng på position 0.

```bash
python3 string-to-file.py
$1
loaf

cake
$4
cake
$1
loaf

$4
loaf
$1


```

Nu har vi bara tomma rader som ligger kvar, dem blir vid av med lätt genom att än en gång använda oss av "strip()" för att bli av med leading och trailing newlines.

```python
def remove_item():
    ...
    if remove in content: # check if item to remove exists
        if content.index(remove) == 0: # if the item is the first line in the file
            modified_content = content.replace(remove, "")
        else:
            modified_content = content.replace("\n" + remove, "")
        write_to_file(modified_content.strip(), "w")
```

Då så, nu har vi ett någorlunda fungerande program för att jobba med filer.

Tänk själv hur du hade löst fäljande fel:

1. Att inte få med en tom rad när man gör append i en tom fil.
2. När man gör remove och en produkt är substräng till en annan produkt, att bara själva produkten försvinner. T.ex. "meat" och "meatloaf".



Avslutningsvis {#avslutning}
--------------------------------------
Vi har nu sett hur vi kan läsa raderna från en fil via en sträng, hur vi lägger till data och hur vi skriver den ändrade strängen till fil. Filhantering är ett viktigt verktyg för att spara undan data som kan återanvändas vid nästa exekvering av programmet och vi har i denna övning fått en introduktion till hur man gör detta i Python.
