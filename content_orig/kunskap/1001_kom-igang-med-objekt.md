---
author: lew
revision:
    "2017-12-01": (B, aar) Bytte namn från variabel till attribut.
    "2016-04-12": (A, lew) Första versionen.
category:
    - oopython
...
Kom igång med objekt i Python
===================================

[FIGURE src=/image/oopython/kmom01/kom_igang_top.png?w=c5 class="right"]

Allt i Python är på ett eller annat sätt ett objekt. Strängar, integers, listor, moduler - ja, allt. Vi ska titta på är hur man skapar egna klasser och objekt och hur man hanterar dem.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i Python och du vet vad variabler, typer och funktioner innebär.



Terminologi {#terminologi}
-------------------------------

* **Klass**: En användardefinierad prototyp för ett objekt som definierar en uppsättning attribut som karaktäriserar alla objekt av klassen. Attributen är klassattribut och instansattribut, som nås via "dot-notation".

* **Klassattribut**: En variabel som delas mellan alla instanser av klassen. Den definieras inuti klassen men utanför klass-metoderna. Ett klassattribut kallas även _statiskt attribut.

* **Instansattribut**: En variabel som är definierad inuti en klass. Den tillhör enbart den instansen av klassen.

* **Instans**: Ett individuellt objekt av en klass.

* **Objekt**: En instans av en klass.

* **Metod**: En funktion som är definierad inuti en klass.

* **Statisk metod**: En metod i klassen som fungerar oberoende av klassen och _self_.


När kan/ska man använda objekt? {#nar-kan-man-anvanda-objekt}
------------------------------

Objekt kommer väl till pass när ens kod börjar kräva beteenden. Är det ren data man programmerar så kommer man väldigt långt på att hålla dem i exempelvis en lista. Vill man sedan att datan ska hanteras mer än att bara visas, kanske ha egna attribut eller metoder, så skapar man en klass utav det.



Skapa en klass {#skapa-en-klass}
------------------------------

Låt oss gå igenom hur man skapar en bil klass, "Car". För enkelhetens skull hoppar jag över [docstrings](https://en.wikipedia.org/wiki/Docstring) i artikeln. En klass skapas med:  

```python
class Car():
```

Något som "alla" bilar har gemensamt är att de har 4 hjul, så vi skapar ett _statiskt attribut_ som innehåller hur många hjul alla bilar har. Vi lägger även till ett statiskt attribut som vi använder som en räknare för att hålla koll på hur många objekt vi har skapat av klassen. _statiska attribut_ innehåller värden som är gemensamma för alla objekt av klassen till skillnad från _instansattribut_ som är individuella för varje objekt av klassen.

```python
class Car():
    wheels = 4
    car_count = 0
```

Sådär ja, vad fint det blev. Vi går vidare till att lägga till instansattribut som ska innehålla data som vi vill ska vara personlig för varje objekt. De statiska attributen som ligger här ägs av bas-klassen Car. Instans attribut skapar vi i _konstruktorn_; metoden som körs när en ny instans skapas. Alla bilar kommer ha 4 hjul men övriga attribut kan skilja sig mellan objekten. Konstruktormetoden heter `__init__` och den måste ha parametern `self` först i parameterlistan. "self" används för att referera till objektet som konstruktorn ska skapa. Vi fyller på med instansattribut för modell och pris. I och med att `__init__`-metoden används för att skapa nya objekt av vår klass är det ett bra ställe att öka `car_counter` med 1. Då kommer `car_counter` öka med 1 varje gång vi skapar ett nytt Car objekt:

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price

        Car.car_count += 1
```

För att vi ska kunna initiera objekten med individuella värden har vi en parameter för varje instansattribut och tilldelar de argumenten som skickas med till våra instansattribut. I början av konstruktorn kan vi se `self` som ett nytt tomt objekt, det innehåller bara en koppling till att det tillhör klassen Car. Inne i `__init__` konstruerar vi vad objektet ska innehålla och vilken data som ska finns i objektet. Raden `self.model = model` gör att objektet (self) får ett attribut som heter "model" och det attributet tilldelas ett värde som har skickats med, parametern model. Raden under gör samma sak fast med ett attribut som heter "price" istället. Sist i konstruktorn ökar vi det statiska attributet `car_count` som ligger i klass Car med 1. 

Nu har vi ett objekt/en instans av Car klassen som innehåller två attribut med specifika värden. Vi kollar hur det ser ut när vi anropar konstruktorn, skapar objektet och skriver ut dess innehåll.

```python
>>> bmw = Car("BMW", 100000)
```

Nu har vi skapat en instans av klassen Car med 4 hjul, märket BMW och med ett pris på 100.000. Förhoppningsvis la du märke till att vi aldrig anropade `__init__()` och vi skickade bara med två argument medan konstruktorn har 3 parametrar. `__init__()` är en så kallad magisk funktion, vi kommer gå igenom dem mer i nästa kmom. Kort sagt ska vi inte anropa den själva utan Python gör det automatiskt när vi anropar klassen, `Car()`. Vidare till argumenten, vi ska inte själva skicka med något argument för första parametern i konstruktorn, `self`, utan det gör Python automatiskt. Vi behöver bara skicka med värden för de resterande två parametrarna.

Vi skapar ytterligare en instans av Car klassen:

```python
>>> volvo = Car("Volvo", 150000)
```

Vi testar att skriva ut objekten:

```python
>>> print(bmw)
<__main__.Car object at 0x7f824cc7b4e0>

>>> print(volvo)
<__main__.Car object at 0x7f824cc7b4a8>

>>> print("Antal bilar: {antal}".format(antal=Car.car_count))
Antal bilar: 2
```

Det ser ju bra ut. Två instanser av "Car" som inte refererar till samma minnesplats, vilket betyder att det är två separat objekt med olika värden. Vi ser också att räknaren fungerar.



För att komma åt attributen kan vi använda så kallad dot-notation, vi tittar på hur det kan se ut.

```python
>>> print(bmw.wheels)
 4

>>> print(bmw.model)
BMW

>>> print(volvo.model)
Volvo
```
instansattribut
Vi ska dock inte använda oss av dot-notation utanför klasserna i kursen utan i nästa sektion visar vi hur man jobbar med attributen via metoder istället.

"bmw" är en instans av Car, så om vi ändrar attributet `wheels` i efterhand, så ändras den för alla objekt skapade från klassen:

```python
>>> print(Car.wheels)
4
>>> print(volvo.wheels)
4
>>> print(bmw.wheels)
4

>>> Car.wheels = 12

>>> print(Car.wheels)
12
>>> print(volvo.wheels)
12
>>> print(bmw.wheels)
12

>>> bmw.wheels = 1

>>> print(volvo.wheels)
12
>>> print(Car.wheels)
12
>>> print(bmw.wheels)
1
```

Om du var uppmärksam hängde du med på att i sista utskrifterna hade bmw inte samma värde som volvo och Car. Man kan inte tilldela värden till statiska attribut via objekt, `bmw.wheels`. Då lägger man till ett nytt instansattribut i bara det objektet med det nya värdet. Medan klassen, Car, och alla andra instanser, volvo, har kvar det statiska attributet och det värdet. Därför hade inte `bmw` samma utskrift på slutet.



###Metoder {#metoder}

En metod är en funktion som är definierad inuti en klass. Vi har redan skapat en i form av `__init__` men vi tittar närmare på hur en sådan kan se ut.

Som sagt ska vi inte använda dot-notation för att jobba med attributen utan istället ska vi skapa "get" och "set" metoder för varje attribut. En "get" metod för ett attribut brukar oftast enbart returnerar attributets värde. Vi provar skapa get-metoder för våra instansattribut:

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price

        Car.car_count += 1

    def get_model(self):
        return self.model

    def get_price(self):
        return self.price
```

Vi skapade två get metoder, en för varje attribut. I och med att de enbart ska returnera ett attributs värde behövs bara `self` som parameter, så vi kommer åt rätt instans värde.

Vi testar att använda metoderna.

```
>>> print(bmw.get_model())
BMW

>>> print(bmw.get_price())
100000
```


Då tittar vi på "set" och precis som ni gissar så används oftasts "set" metoder för att ändra värdet på attribut. En "set" metod brukar enbart tilldela ett argument till ett attribut.


```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price

        Car.car_count += 1

    def get_model(self):
        return self.model

    def get_price(self):
        return self.price

    def set_model(self, model):
        self.model = model

    def set_price(self, price):
        self.price = price
```

Att skapa set metoder var inte svårare än så. Låt oss testa använda dem också.

```
>>> print(bmw.set_model("BMW X2"))
>>> print(bmw.get_model())
BMW X2

>>> print(bmw.set_price(500000))
>>> print(bmw.get_price())
500000
```


Vi skapar en metod för att skriva ut information om bilen:

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price

        Car.car_count += 1

    def present_car(self):
        print("Model: {m}, Price: {p}".format(m=self.model, p=self.price))
```

Nu kan vi använda den på följande sätt:

```python
>>> bmw.present_car()
Model: BMW X2, Price: 500000

>>> volvo.present_car()
Volvo, Price: 150000
```



###Statiska metoder {#statiska-metoder}

En metod i ett klassobjekt använder oftast parametern _self_ och tillhör därför varje instans. Vill man ha en mer generell metod som inte behöver vara enskilt beroende utav
instanserna kan man använda _statiska metoder_. Det är metoder som används av klassen men utför inget direkt mot dess egna attribut. Vi lägger till en metod som räknar ut priset när man kört ut från bilfirman, samt en metod som använder den:

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price

        Car.car_count += 1

    def present_car(self):
        print("Model: {m}, Price: {p}".format(m=self.model, p=self.price))

    @staticmethod
    def calculate_price_reduction(aPrice):
        return int(aPrice * 0.66)

    def reduce_price(self):
        self.price = self.calculate_price_reduction(self.price)
        return "Priset för {c} är nu {p}".format(c=self.model, p=self.price)
```

Som du ser agerar metoden oberoende av resten av klassen. **@staticmethod** gör att python inte behöver instansiera en bunden metod för varje instans av klassen, samt att det är enkelt att se för andra vad som händer. Vi testar att använda den:

```python
>>> bmw = Car("BMW", 100000)

>>> print( bmw.reduce_price() )
Priset för BMW är nu 66000
```



###En lista som instansattribut {#en-lista-som-attribut}

Vi lägger till en lista som ska innehålla information om övrig utrustning. Vi initierar klassen med en tom lista och en metod som lägger till saker och en utskriftsmetod.

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price
        self.equipment = []

        Car.car_count += 1

    def present_car(self):
        print("Model: {m}, Price: {p}".format(m=self.model, p=self.price))

    @staticmethod
    def calculate_price_reduction(aPrice):
        return int(aPrice * 0.66)

    def reduce_price(self):
        self.price = self.calculate_price_reduction(self.price)
        return "Priset för {c} är nu {p}".format(c=self.model, p=self.price)

    def add_equipment(self, new_equipment):
        self.equipment.append(new_equipment)

    def print_equipment(self):
        for eq in self.equipment:
            print("* " + eq)
```

Nu kan vi lägga till utrustning:

```python
>>> volvo = Car("Volvo", 150000)
>>> volvo.add_equipment("Bluetooth")
>>> volvo.add_equipment("7 inch display")

>>> volvo.print_equipment()
* Bluetooth
* 7 inch display
```



<!-- ###Privata instansattribut {#privata-instansattribut}

För att komma åt ett objekts attribut använder vi **dot-notation**. Vill man däremot inte att någon annan än den egna instansen ska kunna komma åt attributen kan man göra dem _privata_. Det gör man med `_` innan attributet. Låt oss titta på hur det ser ut och fungerar. Vi skapar en klass med ett publik och ett privat instansattribut:

```python
class Test_private():

    def __init__(self):
        self.publicMember = "publik"
        self._privateMember = "privat"

    def printPublic(self):
        print(self.publicMember)

    def printPrivate(self):
        print(self._privateMember)
```

Nu ser du att vi även har två metoder som skriver ut respektive attribut. Det är instansen som äger dem båda, även den privata, och kan således hantera dem:

```python
>>> test = Test_private()

>>> test.printPublic()
publik

>>> test.printPrivate()
privat
```

Om vi testar att nå attributen utanför...

```python
>>> test = Test_private()

>>> print( test.publicMember )
publik

>>> print( test.__privateMember )
AttributeError: 'Test_private' object has no attribute '__privateMember'
```

...så får vi ett felmeddelande som talar om för oss att objektet inte har det attributet. Bra. Att använda privata attribut och metoder kan lämpa sig bra i till exempel en arvskedja eller för att visa andra utvecklare att de inte ska peta på de attribut eller metoderna. -->



###Operatoröverlagring {#operatoroverlagring}

Operatorer inom programmering (`+, -, *, /, <, >` med flera), har ett förutbestämt syfte. Om vi skulle vilja använda dem för något eget syfte istället kan vi använda oss av **operatoröverlagring**. Låt säga att vi vill kunna addera våra bil-objekt och få reda på det sammanlagda priset. Först testar vi rakt av:

```python
>>> print( bmw + volvo )
TypeError: unsupported operand type(s) for +: 'Car' and 'Car'
```

Det gick inte så bra. `+`-operatorn vill ju ha siffror och inte objekt. Vi lägger till en metod som överlagrar operatorn i klassen:

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price
        self.equipment = []

        Car.car_count += 1

    def present_car(self):
        print("Model: {m}, Price: {p}".format(m=self.model, p=self.price))

    @staticmethod
    def calculate_price_reduction(aPrice):
        return int(aPrice * 0.66)

    def reduce_price(self):
        self.price = self.calculate_price_reduction(self.price)
        return "Priset för {c} är nu {p}".format(c=self.model, p=self.price)

    def add_equipment(self, new_equipment):
        self.equipment.append(new_equipment)

    def print_equipment(self):
        for eq in self.equipment:
            print("* " + eq)

    def __add__(self, other):
        return self.price + other.get_price()
```

Vi använder `__` före och efter metoden, `__<method>__`, och skickar in ett annat objekt kallat _other_ som parameter. Vi testar igen:

```python
>>> print( bmw + volvo )
250000
```

Det går även att överlagra `+=`, genom att göra en egen `__iadd__` funktion. Vi kollar på det.

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price
        self.equipment = []

        Car.car_count += 1

    def present_car(self):
        print("Model: {m}, Price: {p}".format(m=self.model, p=self.price))

    @staticmethod
    def calculate_price_reduction(aPrice):
        return int(aPrice * 0.66)

    def reduce_price(self):
        self.price = self.calculate_price_reduction(self.price)
        return "Priset för {c} är nu {p}".format(c=self.model, p=self.price)

    def add_equipment(self, new_equipment):
        self.equipment.append(new_equipment)

    def print_equipment(self):
        for eq in self.equipment:
            print("* " + eq)

    def __add__(self, other):
        return self.price + other.get_price()

    def __iadd__(self, other):
        self.price += other.get_price()
        return self

bmw += volvo
print(bmw.get_price())
250000
```

I `__iadd__` ändrar vi värder på `price` och returnerar `self` istället för värdet. `bmw += volvo` kan även visualiseras som `bmw = bmw.__iadd__(volvo)`. Med andra ord tilldelar vi `bmw` attributet samma objekt som den redan hade.


Nuså. Samma koncept gäller för övriga operatorer och kan vara behändigt vid hantering av objekt av olika slag.



Avslutningsvis {#avslutning}
------------------------------

Det här var en introduktion till hur man skapar egna klasser. Toppen på isberget. Vill du lära dig mer på en gång kan du läsa på lite djupare om objekt och klasser:  

1. [docs.python.org](https://docs.python.org/3.4/tutorial/classes.html#)  
2. [tutorialspoint](http://www.tutorialspoint.com/python/python_classes_objects.htm)
