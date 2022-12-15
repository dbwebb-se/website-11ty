---
author: lew
revision:
    "2016-04-12": (PA, lew) Pre-release.
category:
    - python
...
Terminalprogram med sortering av lista
===================================

Vi ska skapa en egen datastruktur, en "unordered list", samt en klass av sorteringsalgoritmen Bubble sort. Dessa ska sedan användas där listan sorteras med hjälp av den egna implementerade sorteringsalgoritmen.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har läst artikeln "[Klassiska sorteringsalgoritmer](kunskap/sorteringsalgoritmer)".  
Du har läst artikeln "[Datastrukturer](kunskap/datastrukturer)".  



Node-klassen {#node-klassen}
-----------------------  

En del datastrukturer använder noder för att hålla kolla på och hålla kvar elementen. Den fungerar som en bindning av elementen och går att stega igenom. Om man använder en nod i en enkellänkad lista har den två delar, Data och Next. Data håller värdet på det som läggs in i listan och Next håller koll på vilken nod som kommer efter den. Vid listans slut så har Next kopplingen till `null`. I en dubbellänkad lista har noden även en koppling till föregående nod:  

[FIGURE src=/image/oopython/kmom05/noder.png]  

En nod-klass har även metoder för att sätta data, hämta data, hämta noden kopplad till Next och sätta datan i noden kopplad till Next. Klassen finns att studera [här](https://github.com/dbwebb-se/oopython/blob/master/example/unorderedlist/node.py).  


Varje element i listan kommer således bestå av en instans av Node-klassen.  



Unordered list {#unordered-list}
-----------------------  

Vi ska skapa en egen datastruktur, en "Unordered list", som en klass. Unordered list kan liknas vid en vanlig lista i Python. Det ska gå att lagra element i den. En representation av en unordered list kan se ut såhär:  

[FIGURE src=/image/oopython/kmom05/list1.png]  

För att kika på koden till uppgiften, kan du [klicka här](https://github.com/dbwebb-se/oopython/blob/master/example/unorderedlist/unorderedlist.py)  



Krav {#krav}
-----------------------

Kopiera mappen med node-klassen och grunden till unordered list från exempelmappen. Här finns även en test-fil som kopieras över.

```bash
# Ställ dig i kurskatalogen
cd me
cp -i ../example/unorderedlist/*.py kmom05/unorderedlist/
cd kmom05/unorderedlist
```

1. Titta igenom Node-klassen och bekanta dig med strukturen.

2. Skapa en fil, 'main.py' som du kan använda till testning.  

3. Skapa filen 'my_bubblesort.py' och kopiera in Bubblesort från [artikeln](kunskap/sorteringsalgoritmer#bubble-sort).

4. Öppna filen 'unorderedlist.py' och fyll på metoderna med kod för att få den att fungera.  

5. Justera din Bubblesort så den kan sortera din lista.  

6. Testa din lista och sortering i main.py. Listan ska kunna stödja sortering av heltal.  

7. Kör `python3 test_list.py`. Se till så alla tester går igenom. Du ska inte ändra i test-filen.

8. Tänk på att inte byta namn på befintliga metoder och filer!

```bash
# Ställ dig i kurskatalogen
dbwebb validate unorderedlist
dbwebb publish unorderedlist
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

1. Skapa en "ordered list" som automatiskt placerar elementen på rätt plats i listan.



Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
