---
author: aar
revision:
    "2022-02-04": (G, aar) Minskade storlek och definierade hur menyn ska fungera.
    "2020-02-04": (F, aar) Minskade storlek för VT20.
    "2019-02-15": (E, aar) Ändrade test kravet, ska testa insert istället för add.
    "2019-02-13": (D, aar) Uppdaterade klassdiagram och metod förklaringar.
    "2019-01-25": (C, aar) Formulerade om test kravet.
    "2018-01-26": (B, aar) Added requirements.
    "2018-01-25": (A, lew) First version.
category:
    - oopython
...
Skapa lista
===================================

Vi ska skapa en egen datastruktur, en "unordered list".

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har läst artikeln "[Exceptions](kunskap/exceptions)".  
Du har läst artikeln "[Datastrukturer](kunskap/datastrukturer)".  
Du har gjort uppgiften "[Skapa kö](uppgift/skapa-queue)".



Unordered list {#unordered-list}
-----------------------  

Vi ska skapa en egen datastruktur, en "Unordered list", som en klass. Unordered list kan liknas vid en vanlig lista i Python. Det ska gå att lagra element i den. En representation av en unordered list kan se ut såhär:

[FIGURE src=/image/oopython/kmom05/list1.png]

<!-- För att kika på koden till uppgiften, kan du [klicka här](https://github.com/dbwebb-se/oopython/blob/master/example/unorderedlist/unorderedlist.py)  -->

Nedanför ser vi ett klassdiagram för en UnorderedList klass. Under diagrammet beskrivs varje metod. Diagrammet ska uppfyllas av er implementation.

[FIGURE src=/image/oopython/kmom04/UnorderedList_klass_v2.png caption="klassdiagram för UnorderedList"]

* `__init__`: Skapa en tom lista.
* `append`: Lägg till nytt element/nod sist i listan.
* `set`: Skriv över element med ny data som finns på index. Om index inte finns lyft `MissingIndex` exception.
* `size`: Returnera antalet element i listan. En tom lista har storleken 0.
* `get`: Returnera värde på index. Om index inte finns lyft `MissingIndex` exception.
* `index_of`: Om data finns i listan returnera dess index. Om värdet inte finns lyft `MissingValue` exception.
* `print_list`: Skriv ut listans innehåll.
* `remove`: Ta bort nod med samma data. Om värdet inte finns lyft `MissingValue` exception. Om det finns flera noder med värdet, ta bara bort första.

**TIPS** skapa `append` och `get` tidigt, de behövs för testerna.


Krav {#krav}
-----------------------

Alla kraven är för de som jobbar i grupp och ensamma. Det är inga specifika krav för de som jobbar i grupp.

Ställ dig i mappen `list/`.

```bash
# Ställ dig i kurskatalogen
cd me/kmom04/list
mkdir src tests
```

1. Skapa en fil med namnet `src/node.py`. Kopiera koden [för en Node](kunskap/datastrukturer#node) och klistra in i node.py filen.

1. Skapa en fil med namnet `src/unorderedlist.py`. Den ska innehålla klassen UnorderedList.

1. UnorderedList klassen ska följa klassdiagrammet ovanför. Minst de metoderna och attributen måste finnas i din implementation. Det är Ok att lägga till mer.

1. Implementera UnorderedList med noder för att bygga listan.

1. Välj själv om listan ska vara cirkulär, dubbellänkad eller enkellänkad.

1. Skapa filen `src/errors.py` i "list" mappen. Den ska innehålla 2 egna exceptions. Använd dig av dem i UnorderedList klassen. Skapa `MissingValue` och `MissingIndex`.

1. Skapa filen `main.py` i "list" mappen. Den ska innehålla en klass med namnet `Handler`, den ska innehålla metoden `main` (tänk marvin i python kursen). Klassens konstruktor ska inte ta några argument (utom `self`), i konstruktorn skapas en tom UnorderedList och tilldelas till instans attributet `self.list`. Menyn i loopen ska ha följande menyval:

    1. Tar ett `input()` värde och använder `append` för att lägga till värdet sist i listan.
    2. Tar ett `input()` värde som index och använder `get()` för att hämta värdet på det index. Skriv ut värdet. Om indexet inte finns ska det skrivas ut `Missing index`.
    3. Skriv ut hur många element som finns i listan, använd `size()`.
    4. Använder ett `input()`anrop för att ta två värden, i formatet `"index, value"`. Använder `set()` för att skriva över ett värde i listan. Om indexet inte finns ska det skrivas ut `Missing index`.
    5. Använd `print_list()` för att skriva ut alla värden i listan.
    6. Tar ett `input()` värde och använder `index_of()` för att hämta och skriva ut index för det inmatade värdet. Om värdet inte finns ska det skrivas ut `Missing value`.
    7. Tar ett `input()` värde och använder `remove()` för att ta bort det värdet från listan. Om värdet inte finns ska det skrivas ut `Missing value`.  
       `q`. Avsluta programmet.


1. Skapa en fil med namnet `test.py` som kör testerna ni lägger i `tests/`. Skriv enhetstester för metoderna i UnorderedList klassen. Det ska finnas tester för metoderna, `get`, `index_of` och `remove`. Kolla på [Testa exceptions](https://youtu.be/ePkZEOHhk-s) för att se hur man fångar exceptions i ett test.



```bash
# Ställ dig i kurskatalogen
#dbwebb validate list
dbwebb publish list
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

<!-- 1. Skapa en "ordered list" som automatiskt placerar elementen på rätt plats i listan. -->

1. Implementera den [magiska metoden __len__](https://docs.python.org/3/reference/datamodel.html#object.__len__) för din UnorderedList. Gör så `len(list)` fungerar.

1. Implementera den [magiska metoden __str__](https://docs.python.org/3/reference/datamodel.html#object.__str__) för din UnorderedList. Gör så `print(list)` och `str(list)` fungerar.

1. Implementera den [magiska metoden __getitem__](https://docs.python.org/3/reference/datamodel.html#object.__getitem__) för din UnorderedList. Gör så `list[0]` fungerar.

1. Implementera den [magiska metoden __setitem__](https://docs.python.org/3/reference/datamodel.html#object.__setitem__) för din UnorderedList. Gör så `list[0] = 4` fungerar.



Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
