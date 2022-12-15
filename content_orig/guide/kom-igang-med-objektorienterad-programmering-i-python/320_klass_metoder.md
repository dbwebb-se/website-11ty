---
author: aar
revision:
    "2020-01-16": "(B, aar) Finputsad inför VT20."
    "2018-11-18": "(A, aar) Första versionen, uppdelad av större dokument."
...
Klassmetoder
==================================

Nästa typ av metod vi ska kolla på heter [klassmetod](https://docs.python.org/3/library/functions.html#classmethod) och som namnet antyder är det metoder som är kopplade till klassen och inte instansen. I en instansmetod skickas automatiskt en instans som första argument och för en klassmetod skickas automatiskt klassen som första argument. I en klassmetod kan vi inte modifiera instansattribut utan bara statiska attribut.



Lägg till en klassmetod i Car {#klassmetod}
----------------------------------

I Car klassen har vi det statiska attributet (klass attributet) "wheels" så vi skapar en klassmetod som skriver ut ett meddelande om antalet däck en normal bil har.

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self.price = price

        Car.car_count += 1

    def present_car(self):
        return "The model {m} costs {p}$.".format(
            m=self.model, p=self.price
        )

    @classmethod
    def wheel_message(cls):
        print("A car normally have {nr} wheels".format(nr=cls.wheels))

>>> volvo = Car("240", 1)
>>> volvo.wheel_message()
A car normally have 4 wheels
```

Det är vanligt att döpa första parametern i en klassmetod till `cls`. Det fungerade utmärkt att komma åt det statiska värdet. Vi testar komma åt instans metoder och variabler från klassmetoden för att se att det inte fungerar.

```python
...
    def present_car(self):
        return "The model {m} costs {p}$.".format(
            m=self.model, p=self.price
        )
        print(self)

    @classmethod
    def wheel_message(cls):
        print("A car normally have {nr} wheels".format(nr=cls.wheels))
        print(cls)
        print(cls.model)

>>> print(volvo.present_car())
Model: 240, Price: 1
<__main__.Car object at 0x7f1004e2e860>

>>> volvo.wheel_message()
A car normally have 4 wheels
<class '__main__.Car'>
AttributeError: type object 'Car' has no attribute 'model'
```

Jag la även in en `print(self)` i "present_car" så vi kan se vad det är för data typer på self och cls. I `present_car()` är `self` ett Car objekt och i `wheel_message()` är `cls` en Car klass. Så precis vad vi tänkt oss. När vi försöker använda `model` i klassmetoden får vi att `Car` inte har något attribut som hete `model`. Det är också vad vi förväntar oss, `model` är ett instansattribut och då kan vi bara komma åt den via en instans av klassen.



Factory method {#factory}
======================

Ett vanligt användningsområde för klassmetoder är så kallade factory methods. En factory method är en metod som skapar ett objekt, precis som en konstruktor (`__init__()`). I Python kan man bara ha en konstruktor per klass, till skillnad från vissa andra språk där man kan ha flera med olika parameterlistor. Därför är det vanligt att man skapar klassmetoder som alternativa konstruktorer och detta kallas factory methods. Ni kan hitta exempel och mer förklaring [här](https://www.programiz.com/python-programming/methods/built-in/classmethod).

<!-- Det finns också ett design pattern som heter [Factory](https://en.wikipedia.org/wiki/Factory_(object-oriented_programming)) men det syftar oftast på lite större factories där man har klasser och objekt enbart för att skapa objekt av andra klasser. -->

