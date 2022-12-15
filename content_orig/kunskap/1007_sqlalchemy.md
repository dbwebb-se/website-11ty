---
author: lew
revision:
    "2017-01-27": (A, lew) First version.
category:
    - oopython
...
SQLAlchemy
===================================

[FIGURE src=/image/oopython/kmom04/alchemy_top.png?w=c5 class="right"]

SQLAlchemy är en "verktygslåda" för hantering av SQL. Delen vi ska titta närmare på är en så kallad [Object Relational Mapper](https://en.wikipedia.org/wiki/Object-relational_mapping)(ORM). Det hjälper oss att använda den fulla kapaciteten hos SQL på ett objektrelaterat sätt, där vi inte behöver använda oss utav en onödigt många och invecklade SQL satser vid större projekt.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i Python och du vet vad variabler, typer och funktioner innebär.
Du har kännedom om SQL och databashantering.  
Du har gått igenom artikeln "[Kom igång med objekt](kunskap/kom-igang-med-objekt)".



Installera SQLAlchemy {#installera-sqlalchemy}
------------------------------

I terminalen (linux):

```bash
sudo pip3 install sqlalchemy
```

I Cygwin eller cmd (windows), starta som administratör:

```bash
pip3 install sqlalchemy
```



Skapa SQLite-filen {#skapa-sqlite-filen}
-------------------------------

I artikeln används:  
1. cars.sqlite (databasen)  
2. main.py (användingen av SQLAlchemy och klassen Car)  
3. car.py (klassen Car som mappas mot databas-tabellen)  

[FIGURE src=/image/oopython/kmom04/tree_sqlalchemy.png]

cars.sqlite skapas genom Firefox addon "SQLite manager".  

[Instruktion för SQLite manager](kunskap/kom-igang-med-databasen-sqlite).  

Strukturen för tabellen `cars` ser ut som följande:

```sql
CREATE TABLE "cars" ("id" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL  UNIQUE , "model" VARCHAR, "price" FLOAT, "country" VARCHAR, "manufacturer" VARCHAR)
```

Vi ser att tabellen har 5 kolumner:  

* id  
* model  
* price  
* country  
* manufacturer  

Vi fyller på med 3 bilar:  

```sql
INSERT INTO cars (model, price, country, manufacturer) VALUES
    ("Mustang", 400000, "USA", "Ford"),
    ("XC60", 595000, "Sweden", "Volvo"),
    ("E-Class", 745000, "Germany", "Mercedes")

```



Mappa en tabell till en klass {#mappa-tabell-till-en-klass}  
-------------------------------

Tack vare att vi mappar tabellen till en klass kan vi arbeta mer objektorienterat och vi slipper de långa SQL-satserna. Tanken är att skapa en klass utifrån en bas-klass i SQLAlchemy som innehåller färdig information om hur den ska mappas. Vi behöver importera ett par moduler för att få det att fungera.  

car.py:

```python
#!/usr/bin/env python3

""" Mapping of class """

from sqlalchemy import Column, Float, String, Integer
from sqlalchemy.ext.declarative import declarative_base

...
```

Sedan skapar vi vår klass utifrån declarative_base:

```python
...

Base = declarative_base()

class Car(Base):
    __tablename__ = "cars"

    id = Column(Integer, primary_key=True)
    model = Column(String)
    price = Column(Float)
    country = Column(String)
    manufacturer = Column(String)
    
    def __init__(self, model, price, country, manufacturer):
        """ init method """
        self.model = model
        self.price = price
        self.country = country
        self.manufacturer = manufacturer

    def __str__(self):
        return "Model: {m}, Price: {p}, Country: {c}, Manufacturer: {ma}".format(m=self.model, p=self.price, c=self.country, ma=self.manufacturer)
```

Har man fler tabeller man vill mappa använder man samma "Base"-klass.  



Användning av klassen {#anvanda-klassen}
-------------------------------

Nu har vi grunderna för att börja manipulera datan i tabellen. Vi skapar även en `main.py`, där vi kopplar upp oss mot databas-filen och använder den Vi behöver importera bland annat "sessionmaker". Det är i Session som ORM:en hanterar databasen.  
Kopplingen till filen sker i variabeln "engine" och behöver kopplas till Session efter den skapats, alternativt samtidigt:  

main.py:

```python
#!/usr/bin/env python3

""" Test SQLAlchemy """

from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from car import Car

engine = create_engine("sqlite:///db/cars.sqlite")

Session = sessionmaker(bind=engine)
session = Session()
```

Nuså. Beroende på vad man vill göra, behöver man importera olika moduler från "sqlalchemy".



###Lägga till i tabellen {#lagga-till-i-tabellen}

För att lägga till rader i tabellen, skapar vi ett nytt objekt av klassen "Car":

```python
#!/usr/bin/env python3

""" Test SQLAlchemy """

from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from car import Car

engine = create_engine("sqlite:///db/cars.sqlite")

Session = sessionmaker(bind=engine)
session = Session()

# Skapa ett objekt att lägga till utifrån klassen Car
aCar = Car(model="v40", price=150000, country="Sweden", manufacturer="Volvo")

# Lägg till i sessionen
session.add(aCar)

# Slutför med commit()
session.commit()
```

Vill man lägga till flera objekt på en gång, görs det med:

```python
session.add_all([ obj1, obj2, obj3, ... ])
```

Det är inte förrän en `commit()` görs som datan faktiskt läggs in. Med `session.new` kan man se vilka operationer som är avvaktande, "pending":

```bash
>>> bCar = Car(model="Corsa", price=56000, country="Germany", manufacturer="Opel")

>>> session.add(bCar)

>>> print(session.new)

IdentitySet([Model: Corsa, Price: 56000, Country: Germany, Manufacturer: Opel])
```

Vi kan även se att "bCar" inte har fått ett id än:

```bash
>>> print(bCar.id)
None
```

Gör vi en commit() och kollar på id:t igen så ser vi att den är tillagd i tabellen:

```bash
>>> session.commit()
>>> print( bCar.id )
5
```

Så länge frågan ligger i sessionen kan man även göra `session.rollback()` för att återställa sessionen vid eventuella problem.



###Hämta från databasen {#hamta-fran-databasen}

Nu har vi några bilar i tabellen och vi har lärt oss hur man lägger till. För att hämta data använder vi oss utav `session.query()`, där det finns ett flertal alternativ.  

Vill vi hämta allt ställer vi en fråga till "session":

```python
>>>for row in session.query(Car):
...    print(row)

Model: Mustang, Price: 400000.0, Country: USA, Manufacturer: Ford
Model: XC60, Price: 595000.0, Country: Sweden, Manufacturer: Volvo
Model: E-Class, Price: 795000.0, Country: Germany, Manufacturer: Mercedes
Model: v40, Price: 195000.0, Country: Sweden, Manufacturer: Volvo
Model: Corsa, Price: 56000.0, Country: Germany, Manufacturer: Opel

```

Varje rad i tabellen hämtas och `__str__()`-funktionen används på dem. Vill man däremot välja vilka kolumner man vill ha anger man det i frågan:

```python
>>> for model, price in session.query(Car.model, Car.price):
...    print("Model: {mo}, Price: {p}\n".format(mo=model, p=price))

Model: Mustang, Price: 400000.0
Model: XC60, Price: 595000.0
Model: E-Class, Price: 795000.0
Model: v40, Price: 195000.0
Model: Corsa, Price: 56000.0
```

Det finns en funktion, `filter()`, som hjälper oss att filtrera resultatet. Låt säga att vi glömt hur ordet "Volvo" stavas och vill hämta allt, vars kolumn "manufacturer", har med "vo" att göra:

```python
>>> for row in session.query(Car).filter(Car.manufacturer.like("%vo%")):
...     print(row)

Model: XC60, Price: 595000.0, Country: Sweden, Manufacturer: Volvo
Model: v40, Price: 195000.0, Country: Sweden, Manufacturer: Volvo
```

För att använda fler filter lägger vi bara på en `filter()` på filtret. Vi lägger på ett filter som kollar om priset är under 200.000kr:

```python
>>> for row in session.query(Car).filter(Car.manufacturer.like("%vo%")).filter(Car.price < 200000):
...    print(row)

Model: v40, Price: 195000.0, Country: Sweden, Manufacturer: Volvo
```

###Filter operatorer {#filter-operatorer}

Det finns en uppsättning operatorer vi kan tillgå för att förenkla våra databasfrågor, till exempel:  

* and_()  
* or_()  
* in_()  
* med flera.  

and_():
```python
>>> for row in session.query(Car).filter(and_(Car.country == "Germany", Car.manufacturer == "Mercedes")):
...    print(row)

Model: E-Class, Price: 795000.0, Country: Germany, Manufacturer: Mercedes
```

or_():
```python
>>> for row in session.query(Car).filter(or_(Car.country == "Germany", Car.country == "USA")):
...    print(row)

Model: Mustang, Price: 400000.0, Country: USA, Manufacturer: Ford
Model: E-Class, Price: 795000.0, Country: Germany, Manufacturer: Mercedes
Model: Corsa, Price: 56000.0, Country: Germany, Manufacturer: Opel
```

in_():
```python
>>> for row in session.query(Car).filter(Car.model.in_(["v40", "Amazon", "s60", "s40"])):
...    print(row)

Model: v40, Price: 195000.0, Country: Sweden, Manufacturer: Volvo
```

För fler exempel, kika i [SQLAlchemys tutorial](http://docs.sqlalchemy.org/en/latest/orm/tutorial.html#common-filter-operators)  



###Ta bort data från tabellen {#ta-bort-data-fran-tabellen}  

För att ta bort rader ur tabellen använder vi oss utav `.delete()`. Vi tar bort bilen med id 2:

```python
>>> session.query(Car).filter(Car.id == 2).delete()
>>> session.commit()
```



###Resultat som lista {#resultat-som-lista}

Vi kan även få tillbaka resultatet som olika datatyper. För att få det som en lista använder vi oss utav `.all()`:

```python
>>> print(session.query(Car).filter(Car.price > 250000).all())
[Model: Mustang, Price: 400000.0, Country: USA, Manufacturer: Ford, Model: XC60, Price: 595000.0, Country: Sweden, Manufacturer: Volvo, Model: E-Class, Price: 795000.0, Country: Germany, Manufacturer: Mercedes]
```



###Överkurs {#overkurs}

Gå igenom [tutorialen](http://docs.sqlalchemy.org/en/latest/core/tutorial.html) för SQLAlchemy.



Avslutningsvis {#avslutning}
------------------------------

Det här var lite om grunderna i SQLAlchemy och hur man kommer igång med det. Läs gärna på mer om tillfälle ges.
