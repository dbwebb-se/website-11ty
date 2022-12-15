---
author: aar
revision:
    "2020-01-17": "(A, aar) Första versionen."
...
Hantera datan som utgör objekten
==================================

[YOUTUBE src=8vpj4ZtKVYI width=700 caption="Andreas pratar om olika sätt vi kan hantera data istället för att hårdkoda."]



JSON {#json}
----------------------------------

I kursrepot för python kursen i [example/json](https://github.com/dbwebb-se/python/tree/master/example/json) kan ni hitta kod som visar hur vi kan använda modulen [JSON](https://docs.python.org/3/library/json.html) för att läsa data från en fil till en dictionary i vår kod. Lek lite med den koden innan ni fortsätter. Ni kan läsa första halvan av [Working with JSON](https://developer.mozilla.org/en-US/docs/Learn/JavaScript/Objects/JSON) för mer förklaring av vad JSON är.



### Läs JSON från fil i Python {#python}

Vi börjar med att flytta ut datan i en separat fil, `cars.json`.

```python
[
    {"model": "model1", "price": 20099, "driver": "Danica Patrick"},
    {"model": "model2", "price": 100000, "driver": "Bo 'Bandit' Darville"},
    {"model": "model3", "price": 300000, "driver": "Memphis Raines"},
    {"model": "model4", "price": 305000, "driver": "Shirley Muldowney"},
    {"model": "model1", "price": 1305000, "driver": "Tia Norfleet"}
]
```

Nu behöver vi ändra på hur vi skapar objekten med datan.

```python
class RaceTrack():
    ...
    
    def create_cars(self):
        """
        Create four Car objects and add to cars
        """
        json_cars = json.load(open("cars.json"))
        for car in json_cars:
            self.cars.append(Car.create_from_json(car)) 
```

Vi läser upp json datan från filen med `json.load`, den funktionen tar ett file objekt som argument och returnerar datan som en Python datastruktur. I vårt fall blir det en lista med dictionaries som element. Sen använder vi oss av `create_from_json()` i Car klassen, så vi behöver skapa den. Det är en så kallad _factory method_, en class method som bara skapar ett nytt objekt och returnerar det.

Side note, om man har t.ex. `åäö` i filen kan man få följande fel `UnicodeDecodeError: 'ascii' codec can't decode byte 0xc3 in position 120: ordinal not in range(128)`. Python använder då fel encoding när Python ska tolka filens innehåll från byte kod till tecken. Ni behöver då specificera vilken encoding filen har, vilket borde vara `UTF-8`. Det löser vi med `json.load(open("cars.json", encoding='utf-8'))`. För att förstå problemet bättre kan ni läsa [What Every Programmer Absolutely, Positively Needs To Know About Encodings And Character Sets To Work With Text](http://kunststube.net/encoding/) eller [Unicode & Character Encodings in Python: A Painless Guide](https://realpython.com/python-encodings-guide/) om ni vill koppla det mer till Python. De är lite långa men rekommenderar verkligen att läsa i alla fall en av dem, det är något som kommer följa med er resten av er karriär och bra att kunna.

Back to the factory method!



### Factory method {#factory-method}

```python
class Car():
    ...
    @classmethod
    def create_from_json(cls, json_data):
        return cls(json_data["model"], json_data["price"], json_data["driver"])
```

Inte svårare än så, nu kan ni testa köra ert program också borde ni se fem bilar som tävlar istället för fyra.

JSON objektet och dictionaries överlag påminner mycket om objekt och klasser. Båda två fungerar som ett sätt att hålla/spara data som vi kan göra något med. Men att göra en egen klass för datan tar det ett steg längre. Man brukar säga att vi vill jobba objektorienterat när vi vill ge datan beteende, alltså att vi kopplar metoder till datan.
