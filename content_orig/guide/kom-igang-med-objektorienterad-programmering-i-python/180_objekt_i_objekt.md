---
author: aar
revision:
    "2020-01-16": "(B, aar) Omgjord med ny exempelkod inför VT20."
    "2018-11-19": "(A, aar) Första versionen, uppdelad av större dokument."
...
Objekt i objekt
==================================

Vi går ett steg längre och skapar en till klass vars objekt vi lägger i objekt av en annan klass. Vi ska gå in på det mer i senare delar av guiden men vi börjar med det lite smått här. Det är egentligen inget speciellt, vi har redan gjort det, t.ex. för instans attributet `model`. Strängar är också objekt det är bara det att vi inte skapat klassen för dem själva. Utan klassen finns redan i Python och det skapas ett nytt objekt av den klassen när vi skriver t.ex. `"Jag skapar nu ett nytt str objekt"`, sträng klassen heter `str` i Python. Så egentligen är det inget speciellt vi kollar på nu, det är bara att vi har skapat klassen själva.



Ny klass {#ny_klass}
----------------------------------

Vi ska skapa en bilbana där bilar kan tävla om att köra först i mål, vi lägger också till lite fräsig grafik i terminalen. Till slut kommer det se ut så här.

[ASCIINEMA src=294042]

Målet är att ha två klasser, en klass för bilar och en klass för tävlingsbanan som bilarna kör på.

Vi börjar med att skapa en klass som är tävlingsbanan och ger den ett attribut för att hålla bilarna och skapar en metod som skapar fyra Car objekt.

[FIGURE src=/image/oopython/guide/rt_init.png? class="right" caption="Klassdiagram över RaceTrack. `List<Car>` betyder att `cars` är en lista med Car objekt."]

```python
from car import Car

class RaceTrack():
    def __init__(self):
        self.cars = []
        self.create_cars()
    
    def create_cars(self):
        car1 = Car("model1", 100000)
        car2 = Car("model2", 100000)
        car3 = Car("model3", 100000)
        car4 = Car("model4", 100000)
        self.cars = [car1, car2, car3, car4]

if __name__ == "__main__":
    rt = RaceTrack()
    print(rt.cars[0].present_car())
The model model1 costs 100000$.
```

I RaceTrack skapar vi en lista som fylls med fyra Car objekt. Jag valde att skapa en egen metod för skapandet av bilarna så att det inte är så mycket kod i konstruktorn.

Vi vill ha grafisk representation av bilarna och rita ut dem i terminalen. Jag har hittat fyra fina ascii bilder för bilar vi kan lägga till i Car klassen.

```python
class Car():
    """
    Represent a car
    """
    model1 = """
.-'--`-._
'-O---O--'
"""
    model2 = r"""
   __
 _| =\__
/o____o_\
"""
    model3 = r"""
  ______
 /|_||_\`.__
(   _    _ _\
=`-(_)--(_)-' 
"""
    model4 = """
     .--.
.----'   '--.
'-()-----()-'
"""

    wheels = 4
    car_count = 0

    ...
```

Notera `r"""` för model2 och 3, båda de strängarna innehåller backslashes som python special tolkar vilket gör att bilderna blir fel (och det ger valideringsfel). Med `r` framför strängen gör vi det till en raw string. I raw strings låter python `\` vara en backslash och använder den inte för att escepa andra karaktärer. Vi lägger bilderna som statiska attribut i klassen och sen låter vi värdet i `model` attributet bestämma vilken av dem som varje instans ska använda. Det finns flera olika sätt vi kan lösa detta på, en if-sats som kollar om `model == model1/2/3/4` eller t.ex. lägga dem i en dictionary istället och använda `model` som nyckel för att få ut en bil. Men jag tänkte visa ett tredje sätt istället som använder funktionen [getattr](https://docs.python.org/3.5/library/functions.html#getattr). Med den kan vi jobba mer dynamiskt med klasser, det funkar lite som key/value par i dictionaries.



#### Dynamisk hämta attribut {#dynamiskt}

I RaceTrack klassen när vi skapade bilarna skickade vi med `model1/2/3/4` som modeller, för att slippa ha en if-sats som kollar vilken som ska användas låter vi `getattr` returnera rätt sträng utifrån värdet i `model`.

```python
class Car():
    ...
    
    def get_model(self):
        return getattr(self, self.model)


class RaceTrack():
    ...

    def move_cars(self):
        for car in self.cars:
            print(car.get_model())

if __name__ == "__main__":
    rt = RaceTrack()
    rt.move_cars()

.-'--`-._
'-O---O--'


   __
 _| =\__
/o____o_\


  ______
 /|_||_\`.__
(   _    _ _\
=`-(_)--(_)-' 


     .--.
.----'   '--.
'-()-----()-'
```

Nu borde ni få fyra fina bilar i er terminal. Vi började också på `move_cars` metoden som vi ska använda för att flytta på bilarna när de tävlar. `getattr` tar två argument, det första är ett objekt och det andra är en sträng med namnet på ett attribut som funktionen ska returnera värdet för. `getattr` är en "farlig" funktion, vi gör ingen koll om attributet finns innan vi hämtar det så om man skapar ett Car objekt med en model som inte finns som ett attribut kraschar programmet. Vi kan dessutom skicka med vad som helst som värde så vi kan få ut värdet på alla attribut i ett objekt. `getattr` är en funktion som man väldigt sällan behöver använda och om man kan använda den finns det oftast bättre lösningar. T.ex. if-sats eller dictionary som jag nämnde ovanför. Men det kan vara kul att känna till den.

Nästa steg är att få bilarna att röra sig framåt. Vi ger bilarna en slumpmässig hastighet och en position så vi kan hålla reda på var bilarna befinner sig. Positionen utgår från vänster kant av terminalen och sen ska de röra sig till höger. 



#### Positionering och hastighet {#pos_speed}

För att få variation i bilarna slumpar vi fram ett float tal för deras hastighet när de skapas. Vi gör också attributen till privata för att vi vill inte att de värdena ska ändras utifrån. Det får bara göras via specifika metoder.

```python
import random

class Car():
    ...
    
    def __init__(self, model, price, driver):
        self.model = model
        self.driver = driver
        self._price = price

        self._speed = random.uniform(0.5, 2)
        self._position = 0

    def move(self):
        self._position += random.uniform(0.5, 2.5) + self._speed


    def get_pos(self):
        return self._position
```

Vi har ett till slumpat tal när en bil rör sig framåt så att inte bara bashastigheten avgör vinnaren, skicklighet måste också spela roll och i det här fallet handlar skicklighet om hur bra vän de är med RNGesus. Testa skapa några bilar och kolla att de får olika värden i `_speed`.

Nu kan vi hålla koll på position och ändra den men hur ska vi rita ut det i terminalen?

Jag tänker att vi använder oss av whitespace bakom bilarna. Deras position är hur många space som ska skrivas bakom bilen. I RaceTrack skapar vi en ny metod som utgör ett race.

```python
class RaceTrack():
    ...
    
    def race(self):
        for i in range(5):
            self.move_cars()

    def move_cars(self):
        for car in self.cars:
            car.move()
            print(" " * int(car.get_pos()) +  car.get_model())

if __name__ == "__main__":
    rt = RaceTrack()
    rt.race()
Lång utskrift med alla bilar kvar på samma plats...
```

Hmmm det funkade inte riktigt som vi ville. Bilarna rör sig inte till höger. Felet är att ascii bilderna är på flera rader och med koden vi har nu skrivs ett antal space ut ovanför varje bil och bilarna skrivs ut under. För att lösa detta behöver vi skriva ut X antal space bakom varje rad i bilarna. För att göra detta på ett bra sätt kan vi använda format.

```python
class Car():
    """
    Represent a car
    """
    model1 = """
{pos}.-'--`-._
{pos}'-O---O--'
"""
    model2 = r"""
{pos}   __
{pos} _| =\__
{pos}/o____o_\
"""
    model3 = r"""
{pos}  ______
{pos} /|_||_\`.__
{pos}(   _    _ _\
{pos}=`-(_)--(_)-' 
"""
    model4 = """
{pos}     .--.
{pos}.----'   '--.
{pos}'-()-----()-'
"""

    ...
    
    def get_model(self):
        spaces = " " * round(self._position)
        return getattr(self, self.model).format(pos=spaces)
```

Om ni kör programmet igen borde ni få att bilarna flyttar på sig fem gånger. Vi kan snygga till utskriften clear console raden från marvin, `print(chr(27) + "[2J" + chr(27) + "[;H")`, och en [sov timer](https://docs.python.org/3/library/time.html#time.sleep).

```python
import time
class RaceTrack():

    def __init__(self, sleep):
        self.sleep = sleep

        self.cars = []
        self.create_cars()

    ...

    def race(self):
        for i in range(5):
            self.clear_console()
            self.move_cars()
            time.sleep(self.sleep)

    @staticmethod
    def clear_console():
        print(chr(27) + "[2J" + chr(27) + "[;H")

if __name__ == "__main__":
    rt = RaceTrack(0.5)
    rt.race()
```

Vi gör `clear_console` statisk då den inte behöver använda sig av en instans, den bara gör en hårdkodad utskrift. Vi hade inte behövt göra en egen metod för utskriften, men det blir väldigt mycket tydligare vad den raden gör. Annars måste man veta det själv, nu kan man kolla på metod namnet och få en uppfattning. Sen borde metoden också ha en docstring som gör det ännu tydligare. I asciineman nedanför kan ni se hur det borde se ut.

[ASCIINEMA src=294028]

Vackert!



#### Vem vann? {#vinnare}

Vi måste ju ha någon som vinner också, då behöver vi en mållinje och förare till bilarna.

```python
class RaceTrack():

    def __init__(self, finishline, sleep):
        self.finishline = finishline
        self.sleep = sleep

        self.cars = []
        self.create_cars()

    def race(self):
        for i in range(5):
            self.clear_console()
            self.print_finishline()
            self.move_cars()

            time.sleep(self.sleep)


    def move_cars(self):
        for car in self.cars:
            car.move()
            print(car.get_model())
            self.print_finishline()


    def print_finishline(self):
        print(" " * self.finishline + "|")
    
    ...

if __name__ == "__main__":
    rt = RaceTrack(20, 0.2)
    rt.race()
```

[ASCIINEMA src=294040]

Det blev ju inte riktigt som jag hade tänkt mig. Jag vill att de ska ta slut när någon kommer i mål. Vi lägger in en koll på när någon går i mål och förare i bilarna.

```python
class Car():
    def __init__(self, model, price, driver):
        self.model = model
        self.driver = driver
        self._price = price

        self._speed = random.uniform(0.5, 2)
        self._position = 0

        Car.car_count += 1

    def present_car(self):
        return "{d} with the car {m}. The car costs {p}$.".format(
            m=self.model, p=self._price, d=self.driver
        )
        ...

class RaceTrack():
    ...

    def create_cars(self):
        car1 = Car("model1", 20099, "Danica Patrick")
        car2 = Car("model2", 100000, "Bo 'Bandit' Darville")
        car3 = Car("model3", 300000, "Memphis Raines")
        car4 = Car("model4", 305000, "Shirley Muldowney")
        self.cars = [car1, car2, car3, car4]

    def race(self):
        finished = []
        while not finished:
            self.clear_console()
            self.print_finishline()
            self.move_cars()

            finished = self.get_finished_cars()

            time.sleep(self.sleep)

        self.print_winners(finished)

    def get_finished_cars(self):
        return [car for car in self.cars if car.get_pos() >= self.finishline]

    @staticmethod
    def print_winners(finished):
        print("Winner is!")
        for car in finished:
            msg = "{} finished first out of {} cars!"
            print(msg.format(car.present_car(), Car.car_count))

    ...

if __name__ == "__main__":
    rt = RaceTrack(20, 0.2)
    rt.race()
```

[ASCIINEMA src=294042]

Oj vad fint det blev, värsta Need for speed spelet!

Det blev mycket ändringar i koden, vi börjar överst. I Car gjorde vi inte så mycket, la till `driver` attribut och la till det i `present_car`. I `race` metoden bytte vi till en while-loop som körs så länge listan med bilar som är i mål är tom. `get_finished_cars` använder sig av [list comprehension](https://docs.python.org/3/tutorial/datastructures.html#list-comprehensions) för att kolla om några bilar har kört i mål och returnerar en lista med dem. Ni känner kanske igen list comprehension från python kursen, där visade vi det på några föreläsningar. Vi hade kunnat skriva om den raden till följande kod utan list comprehension:

```python
    def get_finished_cars(self):
        # return [car for car in self.cars if car.get_pos() >= self.finishline]
        finishers = []
        for car in self.cars:
            if car.get_pos() >= self.finishline:
                finishers.append(car)
        return finishers 
```

List comprehension används för att skapa skapa en ny lista utifrån en sekvens. I vårt fall använder vi den för att populera en lista med alla car objekt som har kommit fram till mållinjen.

Det blev en lång artikel men jag hoppas ni tyckte att det var kul med något lite grafiskt och att ni fick bättre förståelse för klasser. Ni kan hitta alla koden i [example/guide/cars](https://github.com/dbwebb-se/oopython/tree/master/example/guide/cars). Nedanför kan ni se ett färdigt klassdiagram för Car och RaceTrack klasserna.

[FIGURE src=/image/oopython/guide/rt_car_full.png? class="right" caption="Färdigt klassdiagram över RaceTrack och car."]
