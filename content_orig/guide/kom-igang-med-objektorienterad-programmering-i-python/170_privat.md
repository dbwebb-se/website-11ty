---
author: aar
revision:
    "2022-01-13": "(C, aar) Tog bort stycke om property decorator."
    "2021-01-13": "(B, aar) Omskriven och la till stycke om property decorator."
    "2020-01-16": "(A, aar) Första versionen, separerade privata attribut från mangling för att få in i kmom01."
...
Information hiding
==================================

Information hiding är när man gömmer intern data, så att den inte kan användas på fel sätt eller utanför den egna instansen. Låt oss säga att vi har en klass som har ett attribut som innehåller någon känslig data. Då vill vi inte att det ska gå att använda den hur som helst. Vi vill kanske kontrollera hur värdet sätts, man måste göra en speciell uträkning för att få ett nytt värde, eller att värdet bara är hemligt och man ska inte komma åt det utanför instansmetoder. Vi vill kunna begränsa tillgången till attribut eller metoder utanför klassdefinitionen.

Det finns tre olika klassificeringar inom klassisk objektorientering, publik, skyddad och privat. Men Python följer inte det till hundra utan här har vi istället publik, skyddad och "manglad" ([name mangling](https://docs.python.org/3.7/tutorial/classes.html#private-variables)). I tabellen nedanför finns en kort sammanfattning av vad de betyder. Här kommer vi gå igenom typen skyddad och vi går igenom manglad i [information hiding del2](guide/kom-igang-med-objektorienterad-programmering-i-python/230_information_hiding_2). Än så länge har alla våra attribut och metoder varit **publika**.

| Implementation | Typ     | Syfte                                                                                 |
|----------------|---------|---------------------------------------------------------------------------------------|
| name           | publik  | Kan användas hur som helst, var som helst och av vem som helst.                       |
| _name          | skyddad | Använd inte om du inte vet vad du gör. Använd på egen risk (utanför klassen).         |
| __name         | manglad | Hindra subklasser från att överskugga metoder och attribut.                           |



Privata attribut och metoder {#privatAttributMetoder}
--------------------------------------------------------


Som jag skrev ovan så finns inte _privat_ på samma sätt i Python som det finns i andra språk. Inom de flesta andra programmeringsspråk, när ett attribut är privat går det inte att använda det attributet i kod som inte ligger i den egna klassen. T.ex. i vår Car klass om vi gör `price` till ett privat attribut skulle vi inte kunna skriva `volvo.price` (om vi har ett Car objekt som ligger i variabeln volvo) men i en metod i klassen skulle vi kunna använda `self.price`.

I python finns bara en överenskommelse att attribut/metoder vars namn börjar med ett `_` ska behandlas som "privata". Vilket innebär att du ska bara använda attributen/metoderna om du verkligen vet vad du gör eller om du måste. Detta uppfyller mer kraven för typen skyddad, men i och med att det inte finns privat används både privat och skyddad för samma sak i Python.

`_<namn>` Används för att markera att en metod/attribut inte är en del av det publika api:et och den ska generellt sätt inte ändras eller användas utanför instansen. Det finns dock inget som stoppar någon från att göra det.

Vi kan ta priset på bilar som exempel. Priset i sig är inte hemligt men vi vill kontrollera hur det kan ändras. Vi vill att datan fortfarande ska vara tillgängligt i det publika API:et, det ska gå att läsa värdet och ändra det, men vi vill begränsa vilket pris som får sättas. T.ex. ska det inte gå att ändra värdet på en bil hur som helst efter att det är satt, man får kanske max sänka priset med en viss procent. Om attributet då är publikt finns det inget som skyddar priset från att ändras utan att det uppfyller priskravet.

Om vi har ett sälj system där säljare kan sänka priset på produkter under black friday, om vi inte använder privata attribut eller metoder kanske någon skriver liknande kod.

```python
class SellSystem():

    ...
    def set_temporary_sale(self, new_price, time, numberplate):
        self.cars[numberplate].price = new_price
        self.sale_end_date = time

```

Metoden sänker priset på en vissa bil under en vissa tid. `self.cars` är en dictionary med bilar där nummerplåtarna är nycklar till Car objekten som är värden. Här är `price` attributet publikt och vilken kod som helst kan ändra värdet och använda det. Om vi tänker oss att vi har en bil som kosta 200,000 och under black friday ska de sänka priset med 10,000 men säljaren är trött och råkar skriva in 100,000 istället, rätt stor skillnad på slutpriset. Om vi gör `price` till ett privat attribut och skapar en metod som måste användas när man ska ändra värdet kan vi lägga in en check som kollar att sänkningen aldrig är mer än 70% t.ex.

Vi uppdaterar Car så att price är privat och skapar en *set* och en *get* metod för attributet. *set* 

[FIGURE src=/image/oopython/guide/car_priv_attr.png? class="right" caption="Klassdiagram över Car med instansmetod."]

```python
class Car():
    wheels = 4
    car_count = 0

    def __init__(self, model, price):
        self.model = model
        self._price = price

        Car.car_count += 1
        self.car_nr = Car.car_count

    def get_price(self):
        return self._price

    def set_price(self, new_price):
        if float(new_price) / float(self._price) > 0.7:
            self._price = new_price
            print(f"New price is {self._price}")
        else:
            raise ValueError("New price is too low. You can max lower it with 30%")
```

Vi bytte namn på `price` till `_price` för att markera det som privat. Användningen av attributet ska kontrolleras av `get_price` och `set_price`. Get och set metoder är klassiskt inom objektorientering, vi använder dem för att kapsla in data i ett objekt och styra hur de kan användas. Man kan tycka att här behöver vi egentligen inte någon get method i och med att den bara returnerar värdet. Men i och med att attributet är privat ska vi ha det ändå. Bara för att förstärka att man inte ska använda attributet direkt.

Vi testar använda den nya koden.

```python
car = Car("volvo v40", 40000)
print(car._price)
40000
print(car.get_price())
40000
car.set_price(35000)
New price is 35000
car.set_price(10000)
ValueError: New price is too low. You can max lower it with 30%

print(car.present_car())
AttributeError: 'self' object has no attribute 'price'
```

Som ni ser kan vi egentligen fortfarande använda `car._price` men vi ska inte och det ger valideringsfel, `Access to a protected member _price of a client class (protected-access)`. Nu får vi fel när vi använder oss av `present_car` och även `__add__` och `__iadd__`. De metoderna använder fortfarande `price`. Vi behöver nu uppdatera de metoderna, bara för att vi i efterhand ändrade price till ett privat attribut. Det finns ett mer pythonic sätt att hantera privat/set/get metoder, vilket vi kommer kolla på längre fram.

Vi kan också göra metoder privata med `_` på samma sätt som attribut. Det görs oftast på metoder som bara används av andra metoder i en klass. T.ex. gör någon speciell uträkning men den kräver ett sammanhang som ges utav att en annan metod körs först. Så då vill vi inte att metoden ska vara tillgänglig som en publik metod. Genom att göra metoden privat visar vi för andra utvecklare att metoden inte ska användas.

Uppdatera metoderna `present_car`, `__add__` och `__iadd__` så de funkar med price som privat attribut.
