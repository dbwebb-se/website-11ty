---
author: aar
revision:
    "2020-01-16": "(B, aar) Finputsad inför VT20."
    "2018-11-19": "(A, aar) Första versionen, uppdelad av större dokument."
...
Operatoröverlagring
==================================

Operatorer inom programmering (`+, -, *, /, <, >` med flera), har ett förutbestämt syfte och vi är vana vi att vi kan använda dem på våra värden. Python vet vad det ska göra när vi skriver `3 + 5`. Men när vi skapar egna klasser gömmer vi datan i objekt och då kan vi inte bara addera eller subtrahera två objekt och förväta oss att det ska fungera, t.ex. `volvo + bmw`. Vidare har våra objekt ofta flera attribut med olika värden. Hur ska Python veta vilka av attributen som ska användas vid uträkningrna? Ska Python använda modell strängen eller pris heltalet i operationen?

Här kommer **operatoröverlagring** in i bilden. När vi använder en operator är det en hemlig metod som anropas och exekverar, som med `__init__()`. I våra egenskapade klasser kan vi skriva över dessa metoderna och på så sätt bestämma vad som ska ske när man använder en operatorn.



Addition {#add}
----------------------------------

 Låt säga att vi vill kunna addera två bil objekt och få reda på det sammanlagda priset. Först testar vi rakt av:

```python
>>> bmw = Car("BMW", 100000)
>>> volvo = Car("Volvo", 150000)
>>> print( bmw + volvo )
TypeError: unsupported operand type(s) for +: 'Car' and 'Car'
```

Det gick inte så bra. `+`-operatorn fungerar inte med två instanser av klassen Car, för att den innehåller inte den magiska metoden. Metoden som anropas vid `+` operatorn heter `__add__()`. Vi lägger till en metod som heter `__add__()` i klassen, detta kallas att överlagrar en operatorn, eller operatoröverlagring:

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price

        Car.car_count += 1
        self.car_nr = Car.car_count

    ...

    def __add__(self, other):
        return self.price + other.price
```

Det är en instansmetod så första parametern är `self`, vi lägger även till parametern `other`. När vi skriver `bmw + volvo` utgår vi från objektet till vänster om `+`. Så `self` innehåller "bmw" instansen och `other` innehåller "volvo". Vi testar köra det igen med vår nya metod:

```python
>>> print( bmw + volvo )
250000

>>> print( volvo + bmw )
250000

>>> print(volvo.__add__(bmw))
250000
```

På sista kodraden kan ni se hur Python tolkar `volvo + bmw`. Vad händer om vi adderar ett Car objekt med ett heltal?

```python
>>> print( bmw + 10000)
AttributeError: 'int' object has no attribute 'price'
```

Då kraschar programmet för att i `__add__` försöker vi  använda attributet `price` på `other`, men heltal har inte det attributet. För varje datatyp vi vill operatorn på behöver vi lägga till ett case för det i koden. Det kan vi göra genom att kolla vilken datatyp `other` har och göra olika saker beroende på det.

```python
class Car():
    ...
    
    def __add__(self, other):
        if isinstance(other, Car):
            return self.price + other.price
        if isinstance(other, int):
            return self.price + other
        raise ValueError(f"Car doesn't not support addition with object of type {type(other)}")

>>> print(bmw + volvo)
250000
>>> print(bmw + 100000)
200000
>>> print(bmw + "1000")
ValueError: Car doesn't not support addition with object
```

Nu har vi överlagrat vår första operator. Det är ett programmerat beteende i Python att leta efter en `__add__()` metod och anropa den när man använder `+` operatorn och det finns en specifik metod för varje operator. Även för jämförelse operatorerna som `==, <, > <= >=` m.m, med de metoderna kan vi programmera hur två objekt av klassen Car jämförs t.ex. vilket objekt som räknas som störst eller minst. Vid subtraktion heter den metoden t.ex. `__sub__()` och vid `==` heter den `__eq__()`. Alla går att hitta i [Pythons dokumentation](https://docs.python.org/3/library/operator.html). 

Med operatorer som `+=` och `-=` behöver man tänka på ett annat sätt så vi kollar på hur det ser ut när man överlagrar `+=`. 



Additions tilldelning {#iadd}
----------------------------------

För `+=`, även kallat _additions tilldelnings operatorn_, heter den magiska metoden vi behöver överlagra `__iadd__()`. Innan vi börjar koda den ska vi tänka efter vad det är operatorn betyder och vad den gör.

`x += y` är samma sak som att skriva `x = x + y`. Vår metod behöver göra en vanlig addition och returnera det nya värdet som vi vill ska tilldelas till variabeln `x`. Om vi gör det med variabler som innehåller heltal är det inte så svårt. Då är det bara att addera och returnera summa. Då tilldelas det nya talet till `x`. Om vi däremot använder oss av två variabler som innehåller instanser av en klass, vill vi att `x` efter additions tilldelningen fortfarande ska vara ett objekt men objektet ska ha uppdaterat något värde. Det vi returnerar i `__iadd__()` kommer tilldelas till variabeln `x`. Om vi inte returnerar något kommer variabeln få `None` som värde efter operationen. För vårt exempel med priset på bilar betyder det att `__iadd__()` ska addera priset på två bilar, uppdatera priset i det vänstra objektet till summan och sist returnera instansen så `x` fortsätter referera till samma objekt den gjorde innan operationen. 

Vi lägger till koden för det, men försök gärna själv först. Skapa en ny instansmetod som heter `__iadd__(self, other)` som uppdaterar `price` i `self` med summan av deras priser och returnerar `self`.

[FIGURE src=/image/oopython/guide/car_operat_meth.png class="right" caption="Klassdiagram över Car med operatoröverlagrings metod."]

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price

        Car.car_count += 1
        self.car_nr = Car.car_count

    ...

    def __add__(self, other):
        if isinstance(other, Car):
            return self.price + other.price
        if isinstance(other, int):
            return self.price + other
        raise ValueError("Car doesn't not support addition with object")

    def __iadd__(self, other):
        self.price += other.price
        return self

print(bmw.price)
100000

print(volvo.price)
250000

bmw += volvo
print(bmw.price)
350000

print(volvo.price)
250000

bmw = bmw.__iadd__(volvo)
print(bmw.price)
600000
```

Sist i koden kan ni se hur Python tolkar `bmw += volvo`. Med andra ord tilldelar vi `bmw` variablen samma objekt som den redan hade.

Nu så. Samma koncept gäller för övriga operatorer och kan vara behändigt vid hantering av klasser av olika slag.



Öva själv {#ova}
----------------------------

Lägg till stöd för att kunna göra additionstilldelning med Car objekt och heltal. Överlagra sen operatorn för subtrahering, `__sub__` och subtraheringstilldelning, `__isub__`.
