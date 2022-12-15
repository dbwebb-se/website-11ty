---
author: aar
revision:
    "2020-01-16": "(B, aar) Finputsad inför VT20."
    "2018-11-18": "(A, aar) Första versionen, uppdelad av större dokument."
...
Metoder
==================================

En metod är en funktion som är definierad inuti en klass. Det finns tre typer: instans-, statisk- och klassmetod. Vi har redan skapat en instansmetod i form av `__init__()`. Vi börjar med att kolla på instansmetoder.



Instansmetoder {#instansmetoder}
----------------------------------

Instansmetoder identifieras på att den första parametern heter `self`. I instansmetoder använder man sig av instansattributen. Om man vill ha en metod i en klass där man inte använder instansattributen skapar man en statisk metod istället.



### Instansmetod 

Vi skapar en metod som returnerar en formaterad sträng med information om bilen.

[FIGURE src=/image/oopython/guide/car_instans_meth.png? class="right" caption="Klassdiagram över Car med instansmetod."]

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price

        Car.car_count += 1
        self.car_nr = Car.car_count

    def present_car(self):
        return "This car is of model {m}, costs {p}$ and is car number {nr} of {tot}.".format(
            m=self.model, p=self.price, nr=self.car_nr, tot=self.car_count
        )

```

Metoden `present_car()` har enbart `self` som argument. I metoden använder vi bara värden från `self` parametern. Vi kollar på hur vi anropar metoden.

```
>>> volvo = Car("volvo v40", 40000)
>>> bmw = Car("BMW", 50000)

>>> print(volvo.present_car())
This car is of model volvo v40, costs 40000$ and is car number 1 of 2.
>>> print(bmw.present_car())
This car is of model BMW, costs 50000$ and is car number 2 of 2.
```

Notera att vi inte skickade med något argument till metoden i anropet. Detta är vad som utgör en instansmetod, Python skickar automatiskt en referens till instansen via `self` parametern. I koden ovanför när vi kör `volvo.present_car()`, i `present_car(self)` metoden är `self` vårt `volvo` objekt.

Precis som vi såg i förra delen, att vi inte kan komma åt ett instansattribut från klassen kan vi inte komma åt en instansmetod från klassen heller. Man måste anropa metoden på ett objekt av en klass.

```
>>> print(Car.present_car())
    TypeError: unbound method present_car() must be called with Car instance as first argument (got str instance instead)
```

Om ni tycker att felmeddelandet låter konstigt kan ni fråga på föreläsningen varför vi får det felet.

Testa runt själv med klassen, lägg till egna attribut, försöka ändra på dess värden och skriva ut dem. Skapa egna metoder och ändra attribut i dem. Lek med koden och testa era funderingar! T.ex. ska ett attribut för färg och sen en metod där ni kan ändra färgen på ett bil objekt.



Self {#self}
-----------------------------

Self hanteras av Python, det är som sagt inget vi behöver skicka med som argument när vi anropar en instansmetod. Men vi kan egentligen döpa om `self` till vad vi vill, det är bara ett parameternamn. Men i Python är det standard att döpa den till self. I många andra språk kallas det `this` istället. Testa byt namn på `self` i metoden och kör koden igen för att se att den fortfarande fungerar.

Det som sker när vi anropar en instans metod är att python tar instansen som metoden anropas på och skickar som första argumentet. Om vi tar `present_car()`på volvo variabeln som exempel.

```
volvo = Car("volvo v40", 40000)
volvo.present_car()
```

Här skickar vi inget argument men vi har ändå `self` parametern. Det python gör i bakgrunden är att ändra anropet till.

```
volvo.present_car(volvo)
```

Så i metoden är `self` objektet som variabeln `volvo` pekar på.

```
def present_car(volvo):
    return "This car is of model {m}, costs {p}$ and is car number {nr} of {tot}.".format(
        m=volvo.model, p=volvo.price, nr=volvo.car_nr, tot=volvo.car_count
    )
```

Konstruktorn (__init__) är speciell då vi inte redan har ett objekt vi kan skicka in som self. Det är varför vi inte ska anropa konstruktorn manuellt. När vi skapar ett objekt och anropar klassen, då skapar python ett "tomt" objekt, anropar `__init__()`, skickar med det nya objektet som argument till `self` parametern och det är först i konstruktorn som attributen läggs till på objektet och ger dem värden.

Jag hoppas detta förtydligade lite hur instansen kopplas till klassen.
