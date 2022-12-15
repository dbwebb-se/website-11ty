---
author: aar
revision:
    "2022-01-13": "(A, aar) Första versionen."
...
Mer magi
==================================

I förra delen skrev vi om operator-överlagring som använder magiska metoder för att styra funktionalitet, `__<name>__`. De funktionerna kallas också *dunder* metoder och vi har kollat på `__init__()` som är en magisk funktion. Det finns så klart väldigt många fler magiska metoder vi kan implementera för att styra olika beteenden. I kursen kommer vi kolla b.la. kolla på [__iter__()](https://docs.python.org/3/reference/datamodel.html?highlight=__str__#object.__iter__), [__next__()](https://docs.python.org/3/library/stdtypes.html#iterator.__next__) och [__str__()](https://docs.python.org/3/reference/datamodel.html?highlight=__str__#object.__str__). Nu tänkte jag att vi nöjer oss med att kolla på vad `__str__()` gör, så kollar vi på de andra senare i kursen. 



## \_\_str\_\_() {#str}

Om vi läser i [dokumentationen](https://docs.python.org/3/reference/datamodel.html?highlight=__str__#object.__str__) för metoden så ska den:

> compute the “informal” or nicely printable string representation of an object. The return value must be a string object.

Och metoden anropas automatisk i `print()` för att försöka göra om objektet till en sträng för att skrivas ut.

Om vi använder `print()` på ett bilobjekt nu skriver den ut att det är ett bil objekt och en minnesplats. Detta kan vi ändra genom att implementera `__str__()` i Car klassen.

```python
>>> bmw = Car("X2", 10000)
>>> print(bmw)

<__main__.Car object at 0x7f5cb5cc5f10>
```

Låt oss implementera `__str__()` så att print skriver ut datan som finns i objektet istället.

```python
class Car():
    ...

    def __str__(self):
        return f"Car of model {self.model}, costs {self.price}$."

>>> bmw = Car("X2", 10000)
>>> print(bmw)

Car of model X2, costs 10000$.

>>> print(str(bmw))

Car of model X2, costs 10000$.
```

`str()` funktionen anropar också `__str__()` på objekt.
