---
author: aar
revision:
    "2022-01-20": "(A, aar) Första versionen."
...
Abstrakta klasser
==================================

Vi har tidigare sagt att klasser är som ritningar för objekt, abstrakta klasser (ABC) är i sin tur som ritningar för andra klasser.

Det går inte att skapa objekt med en abstrakt klass, syftet med dem är att definiera ett publikt gränssnitt (API) som subklasser måste implementera. I den abstrakta klassen definierar vi metoder utan någon implementation (abstrakta metoder). Sen måste subklasserna definiera och implementera dem. På detta sättet kan vi garantera att metoder som vi förväntar oss finns men det är upp till subklasserna att implementera funktionaliteten som är specifik för sin subklass.


Skapa en abstrakt klass {#create}
--------------------------------------------------

Vi skapar klassen med hjälp av `abc` modulen och definierar abstrakta metoder med dekoratorn `@abstractmethod`.

[FIGURE src=/image/oopython/guide/abstract-classes.png caption="Klassdiagram klasserna med arv och abstraktion."]

```python
from abc import ABC, abstractmethod
 
class Polygon(ABC):
 
    @abstractmethod # så här definierar vi att en method måste skapas
    def noofsides(self):
        pass
 
class Triangle(Polygon):
 
    # overriding abstract method
    def noofsides(self):
        print("I have 3 sides")
 
class Pentagon(Polygon):
 
    def noofsides(self):
        print("I have 5 sides")
 
class Hexagon(Polygon):
 
    def noofsides(self):
        print("I have 6 sides")
 
class Quadrilateral(Polygon):
 
    def noofsides(self):
        print("I have 4 sides")
 
>>> t = Triangle()
>>> t.noofsides()
I have 3 sides

>>> q = Quadrilateral()
>>> q.noofsides()
I have 5 sides

>>> p = Pentagon()
>>> p.noofsides()
I have 6 sides

>>> h = Hexagon()
>>> h.noofsides()
I have 4 sides

po = Polygon()
TypeError: Can't instantiate abstract class Polygon with abstract methods noofsides
```

Om vi skapar en till en klass som ärver av `Polygon` men inte implementerar den abstrakta metoden. Då får vi följande fel när vi försöker skapa ett objekt, `TypeError: Can't instantiate abstract class NotShape with abstract methods noofsides`.

I exemplet har vi bara en abstrakt metod men det går så klart att lägga till fler om man vill det.
