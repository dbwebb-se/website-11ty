---
author: aar
revision:
    "2021-01-04": (B, moc) Bytte __repr__ till __str__
    "2018-11-28": "(A, aar) Första versionen, uppdelad av större dokument."
...
Komposition och aggregation
==================================

Komposition och aggregation är en annan typ av relation, än arv, mellan klasser. Arv är när klasser har en _is-a_ relation och komposition/aggregation är när klasserna har en _has-a_ relation. T.ex. om klassen Person har ett attribut vars värde är ett objekt av klassen Dog, då är relationen "Person has-a Dog". Man brukar säga att Person objektet äger Dog objektet. 
Relationen kan vara enkelriktad eller dubbelriktade.

* Enkelriktiad: Objekt X har objekt Y, av en annan klass, som attribut. Objekt X är medveten om Y men Y är inte medveten om X.
* Dubbelriktade: Objekt X har objekt Y, av en annan klass, som attribut och objekt Y har objekt X som attribut. Objekt X är medveten om Y och Y är medveten om X.



Komposition och aggregation {#komposition_aggregation}
------------------------------

Det är komposition när klasserna är starkt kopplade. Om _ägar_ klassen slutar existerar slutar även det _ägda_ objektet att existera. T.ex. House (ägare) och Room (ägd), ett Room objekt kan inte existera utan att vara i ett House objekt.

Det är aggregation när klasserna är svagt kopplade. Om _ägar_ klassen slutar existerar då fortsätter det _ägda_ objektet att existera.
I exemplet, Person has-a Dog, så är det aggregation då Dog fortsätter existera om Person slutar existera.

Om det _ägda_ objektet skapas i _ägarens_ konstruktor är det oftast komposition medans om det _ägda_ objektet skickas som ett argument till konstruktorn är det oftast aggregation.

Vi skapar en Person klass och en Date klass. Tanken är att ett Date ska innehålla födelsedatumet för ett Person objekt.

```python
class Date():

    def __init__(self, year, month, day):
        self.year = year
        self.month = month
        self.day = day

    def __str__(self):
        return "{year}-{month}-{day}".format(year=self.year, month=self.month, day=self.day)
        
class Person:

    def __init__(self, name, year, month, day):
        self.name = name
        self.date_of_birth = Date(year, month, day)

    def __str__(self):
        return "My name is {name} and my date of birth is {date}".format(name=self.name, date=self.date_of_birth)


>>> person1 = Person("James", 1993, 5, 14)
>>> print(person1)
My name is James and my date of birth is 1993-5-14
>>> print(person1.date_of_birth)
1993-5-14
>>> person2 = Person("Klara", 2010, 3, 15)
>>> print(person2)
My name is Klara and my date of birth is 2010-3-15
>>> print(person2.date_of_birth)
2010-3-14
```

[FIGURE src=/image/oopython/guide/pers-date-comp.png caption="Klassdiagram över Person och Date med komposition."]

Vilken typ av relation har vi här? Aggregation eller komposition? Tipsen från ovanför var om objektet skapas i konstruktorn eller skickas som argument och om man gör delete på Person objektet kommer Date objektet finnas kvar. I koden ovanför skapas Date objekten i konstruktorn vilket tyder på att det är en kompositions relation mellan Person och Date. Vidare har Date objekten bara en reference i koden och den ligger i Person objekten. Vilket betyder att om person objektet raderas kommer även Date objektet göra det. Date objekten uppfyller ingen funktionalitet utanför ett Person objekt. Av dessa tre anledningarna så är det komposition och inte aggregation.


Jag gissar att du märkte att jag skapade en metod med namnet "[\_\_str\_\_](https://docs.python.org/3/reference/datamodel.html#object.__str__)", det är en magisk metod som används när objektet ska representeras, bl.a. när man gör print på objektet. Jag överskuggade den metoden istället för att skapa en `to_string()` metod. På detta sätte slipper vi göra `str(person1)` eller `person1.to_string()` utan kan bara skicka den direkt som argument. Då anropar print funktionen vår `__str__()` automatiskt. Det samma gäller i `.format()` metoden, när vi använder `self.date_of_birth` som argument till `.format()` i `Person.__str__()` letar den också efter en `__str__` metod i Date objektet.



###Arv mot komposition {#arv_mot_komposition}

Som utvecklare vill vi återanvända så mycket kod som möjligt men samtidigt undvika komplex kod.
Om man har en djup arvskedja med multipla arv blir det jobbigt att håll koll på var metoder och attribut kommer ifrån. För att förstå en klass behöver man gå igenom alla klasser i arvskedjan och då har vi genast komplex kod.
Komposition löser återanvändning av kod med moduler.

När vad som ska användas inte är spikat i sten utan det handlar om vilket du som utvecklare tycker passar bäst och vad du känner dig bekväm med kan ni följa dessa tre guidelines.

1. Försök att undvika multipla arv, det blir snabb komplicerat och det krävs en mycket bra kodbas kunskap för att jobba med koden.
2. Använd komposition när kod används på olika ställen och i olika situationer.
3. Använd arv när det finns en klar _is-a_ relation med återanvändbar kod mellan klasserna.



Avslutningsvis {#avslutning}
------------------------------

Använd arv för att återanvända kod mellan klasser och använd komposition för att paketera kod i moduler som kan återanvändas.
För att se exempel på mer komplicerad arvs herarki och komposition kan ni läsa igenom, [python-textbok](https://python-textbok.readthedocs.org/en/latest/Object_Oriented_Programming.html#)