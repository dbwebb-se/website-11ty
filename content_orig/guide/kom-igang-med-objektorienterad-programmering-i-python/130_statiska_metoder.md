---
author: aar
revision:
    "2020-01-16": "(B, aar) Finputsad inför VT20."
    "2018-11-18": "(A, aar) Första versionen, uppdelad av större dokument."
...
Statiska metoder
==================================

I förra delen lärde vi oss att Python alltid skickar med den egna instansen som argument till metoder i en klass (som vi döper till _self_ i parameterlistan). Detta är för att när man jobbar objektorienterat behöver man oftast använda instansen som en metod anropas på. Men ibland vill man ha metoder som inte använder en instans av en klass i en metod. Detta är oftast "hjälp" funktioner som man vill ha kopplade till en klass.

Om vi bara skapar en vanlig instansmetod fast vi använder inte `self` parametern i metoden skulle det fungera men då kommer valideringen klaga med felet `Method could be a function (no-self-use)`. Här kommer _statiska metoder_ in i bilden. Det är en metod som ligger i en klass där Python inte automatisk skickar med instansen som första argumentet. Till statiska metoder skickas argument till metoden likadant som det fungerar för vanliga funktioner. 



Lägg till en statisk metod i klassen {#statiskmetod}
----------------------------------

Man brukar säga att en bil förlorar 1/3 av sitt värde när man lämnar bilfirman med bilen. Så vi skapar en statisk metod som tar bort 1/3 av ett pris, samt en instansmetod som använder den statiska metoden:

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

    @staticmethod
    def calculate_price_reduction(price):
        return int(price * 0.66)

    def reduce_price(self):
        self.price = self.calculate_price_reduction(self.price)
        return "Priset för {m} är nu {p}.".format(m=self.model, p=self.price)
```

[FIGURE src=/image/oopython/guide/car_statik_meth.png caption="Klassdiagram över Car med statisk metod."]

Du kan troligen gissa vilken av det två nya metoderna som är den statiska. För att skapa en statisk metod behöver man skriva `@staticmethod` på raden ovanför metod definitionen. `@staticmethod` kallas för en **decorator**, det är något som dynamiskt ändrar funktionaliteten på en funktion. I detta fallet gör den så att Python inte skickar med den egna instansen som det första argumentet till metoden. Alltså så att vi inte behöver ha med parametern `self` i parameterlistan. 
Det kan tyckas konstigt att vi sen även skapat en instansmetod som bara anropar den statiska. Men att vi gör så ger oss en slags abstraktion, vi kan använda den statiska metoden utan att vi behöver ha ett Car objekt för att dra av 1/3 av en summa. Men oftast kommer vi vilja använda metoden i samband med ett Car objekt. Därför skapar vi även instansmetoden för att spara några rader kod och göra den mer DRY. 

Vi använder funktionerna.

```python
>>> print( Car.calculate_price_reduction(200000) )
132000

>>> bmw = Car("BMW", 100000)

>>> print( bmw.reduce_price() )
Priset för BMW är nu 66000

>>> print( bmw.calculate_price_reduction(200000) )
132000
```

Som du ser kan vi även använda den statiska metoden direkt från klassen. Vi behöver inte ha skapat något objekt av klassen för att använda metoden.




Self fortsättning {#self}
------------------------

Vi gör ett till försök på att förklara self och förstå det. Nu när vi kan skapa statiska metoden vilket gör att Python inte automatiskt skickar med instansen till self kan vi göra om `present_car()` funktionen till en statisk metod men fortfarande få den att fungera som den ska.

```python
...
    @staticmethod
    def present_car(self):
        return "This car is of model {m}, costs {p}$ and is car number {nr} of {tot}.".format(
            m=self.model, p=self.price, nr=self.car_nr, tot=self.car_count
        )
```

Om vi anropar metoden som vanlig.

```python
>>> bmw = Car("BMW", 100000)
>>> bmw.present_car()
TypeError: present_car() missing 1 required positional argument: 'self'
```

Som vi kan förväntas oss kraschar programmet för att vi inte skickade med något argument. Men om vi manuellt skickar med `bmw` kommer metoden att fungera precis som när den var en instansmetod.

```python
>>> bmw.present_car(bmw)
This car is of model BMW, costs 100000$ and is car number 1 of 1.
```

Så här ska vi inte skriva metoder egentligen med staticmethod och sen skicka in instansen manuellt. Jag gjorde bara detta för att försöka visa på hur det fungerar.
