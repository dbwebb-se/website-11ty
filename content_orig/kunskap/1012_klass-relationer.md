---
author: aar
revision:
    "2017-12-01": (C, aar) Bytte namn från variabel till attribut.
    "2017-12-01": (B, aar) Genomläst och uppdaterad inför V2.
    "2016-04-19": (A, aar) Första versionen.
category:
    - oopython
...
Klass relationer i Python
===================================

[FIGURE src=/image/oopython/kmom01/multipleinheritance.jpg class="right"]

Precis som i naturens värld kan vi inom programmering ärva egenskaper från en "förälder".
En klass kan ärva metoder och attribut från en annan klass, dess objekt kallas ofta för förälder- och barn-objekt. När man kan beskriva relation mellan två klasser som "is-a" är det oftast en arvs relation.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i Python och objektorienterad programmering.



Terminologi {#terminologi}
-------------------------------

* **Klass**: En användardefinierad prototyp för ett objekt som definierar en uppsättning attribut som karaktäriserar alla objekt av klassen. Attributen är klassattribut och instansattribut, som nås via "dot-notation".

* **Klassattribut**: En variabel som delas mellan alla instanser av klassen. Den definieras inuti klassen men utanför klass-metoderna. Ett klassattribut kallas även _statiskt attribut.

* **Instansattribut**: En variabel som är definierad inuti en metod. Den tillhör enbart den instansen av klassen.

* **Instans**: Ett individuellt objekt av en speciell klass.

* **Metod**: En funktion som är definierad inuti en klass.

* **Statisk metod**: En metod i klassen som fungerar oberoende av klassen och _self_.


När kan/ska man använda arv? {#nar-kan-man-anvanda-arv}
------------------------------

Arv används när flera klasser har gemensamma grund och är sedan specialiserade i någon grad. T.ex. så har bilar och motorcyklar likheter och skillnader, båda är fordon men de har olika egenskaper. Då kan man ha en basklass som heter Fordon och en subklass för Bil och en för Motorcykel.  
Vi lägger funktionalitet som fler objekt har gemensamt i basklassen, och sen specialiserar vi de olika egenskaperna i subklasser.

Arv används för att återanvända kod och göra koden mer dynamiskt.



Skapa arv mellan klasser {#arv-mellan-klasser}
------------------------------

Vi börjar med att skapa bas/förälder klassen Parent:  

```python
class Parent():

    def __init__(self, name):
        self.name = name

    def print_parent(self):
        print("My name is %s" % self.name)
```

Nu skapar vi subklassen, Child, och gör så den äver från basklassen, Parent.

```python
class Child(Parent):
```

Nu har vi en arvs relation mellan Child och Parent. Vi skapar en konstruktor i Child:

```python
class Child(Parent):

    def __init__(self, name):
        super(Child, self).__init__(name)
```


Med metoden `super(Child, self)` kommer vi åt basklassen, Parent, och kan då komma åt Parents konstruktor med `.__init__`. Det är denna raden som gör att vi får tillgång till Parents metoder och attribut från Child.

Nu kan vi initiera ett Child objekt och ge de ett namn utan att ha skapat ett namn attribut i Child klassen.  
Vi kan även anropa funktionen `print_parent` både från ett Child och ett Parent objekt.

```python
>>> dad = Parent("Zerny")
>>> son = Child("Andreas")

>>> dad.print_parent()
My name is Zerny

>>> son.print_parent()
My name is Andreas
```


Nu har vi en Bas och en Subklass, men subklassen skiljer sig inte från basklassen än, så det fixar vi:

```python
class Child(Parent):

    def __init__(self, name, nickname):
        super(Child, self).__init__(name)
        self.nickname = nickname

    def print_nickname(self):
        print("My nickname is  %s and name is %s" % (self.nickname, self.name))
```


Child har fått ett nytt attribut, `nickname`, och en ny metod som skriver ut namn och smeknamn. I funktionen `print_nickname` kommer vi åt attributet `name`, som vi ärver, med enkel dot.notation.

```python
>>> son.print_nickname()
My nickname is  Zeldah and name is Andreas
```


I en subklass kommer vi åt alla attribut och metoder som finns i en basklass med ett undantag, som vi kommer gå igenom längre ner. Det går även att ärva i flera steg. T.ex. klassen Grandchild kan ärva från Child som ärver av Parent. Då har vi tillgång till attribut och metoder både från Child och Parent. En klass kan även ärva från flera klasser samtidigt, Child kan t.ex. ärva från Parent och Deity samtidigt. Det kallas för multipelt arv.

Vi fortsätter med vår Parent och Child klass.



Överskuggning av metoder {#overskuggning}
------------------------------

Vi bestämmer oss för att döpa om metoden `print_parent()` i Parent till `print_me()`. Om `print_me` anropas från ett Child objekt vill vi även`nickname` skrivs ut.
Detta löser vi med överskuggning. Överskuggning är att skriva över en metod från en basklass i en subklass. I vårt fall, skapa en metod som heter `print_me` i Child.

```python
class Parent():

    def __init__(self, name):
        self.name = name

    def print_me(self):
        print("My name is %s" % self.name)

class Child(Parent):

    def __init__(self, name, nickname):
        super(Child, self).__init__(name)
        self.nickname = nickname

    def print_me(self):
        print("My name is %s and my nickname is %s" % (self.name, self.nickname))

>>> dad.print_me()
My name is Zerny

>>> son.print_me()
My name is  Andreas and my nickname is Zeldah
```


Som vi ser, när `dad.print_me()` anropas körs metoden `print_me()` i Parent klassen och när `son.print_me()` anropas körs `print_me()` i Child klassen. Detta är effekten av att överskugga en metod i en subklass.

Med `_NotImplementedError_` kan vi tvinga subklasser att överskugga metoder från basklasser.
För att testa detta lägger vi till en metod i Parent klassen men överskuggar inte den i Child:


```python
class Parent():

    ...

    def mustOverride(self):
        raise NotImplementedError("Subclasses should implement this!")


>>> dad.mustOverride()
NotImplementedError: Subclasses should implement this!

>>> son.mustOverride()
NotImplementedError: Subclasses should implement this!
```


Precis som vi förväntade oss får vi `runtimeException` både från dad och son. För att fixa detta behöver vi överskugga `mustOverride()` i Child.
Nackdelen med "NotImplementedError" är att vi inte kan lägga någon funktionalitet i `mustOverride()` metoden i Parent. Den kommer alltid bara slänga `NotImplementedError`.

```python
class Child(Parent):

    def __init__(self, name, nickname):
        self.nickname = nickname
        super(Child, self).__init__(name)

    def print_me(self):
        print("My name is  %s and my nickname is %s" % (self.name, self.nickname))

    def accesParentPrivat(self):
        print("I can access " + self._privat)

    def mustOverride(self):
        print("We did it!")

>>> parent.mustOverride()
NotImplementedError: Subclasses should implement this!

>>> child.mustOverride()
We did it!
```



Privata attribut och metoder {#privatAttributMetoder}
------------------------------

Vill man inte att någon annan än den egna instansen ska komma åt attribut och metoder kan man göra dem _privata_. Det gör man med ett `_` först i attribut/metod namnet.

`_<namn>` Används för att markera att en metod/attribut inte är en del av api:et och den ska inte ändras eller accessas utanför instansen. Det finns dock inget som stoppar från att göra det.
Vi testar att skapa ett privat attribut:

```python
class Parent():

    def __init__(self, name, ssn):
        self.name = name
        self._ssn = ssn # social security number
        
    ...
    
    def get_birthnumber(self): 
        return self._ssn[:7]



>>> dad = Parent("Zerny", "504365-5555")
>>> son = Child("Andreas", "Zeldah", "456843-2222")

>>> dad.get_birthnumber()
504365
>>> dad._ssn
504365-5555

>>> son.get_birthnumber()
456843
>>> son._ssn
456843-2222
```


Som sagt, det går att accessa den både utanför och innanför instansen men jag som har utvecklat koden markerar för andra att den **inte ska** användas utanför instansen. Med andra ord det är OK att göra `self._ssn` men inte `dad._ssn`.



Name mangling {#nameMangling}
------------------------------

Vi går vidare till `__`, även kallat "name mangling". Name mangling är till för att förhindra en subklass från att använda/skriva över en metod/attribut i basklassen. Alltså inte för att göra något privat.  
En metod med `__` i början kan "bara" användas i instansen den skapas i, med `self.__<namn>`. Detta är en egenskap privata attribut/metoder har i många andra programmeringsspråk, men inte i python, och därför är det lätt hänt att `__` används istället för `_`.
Vi testar skapa en `__<namn>` funktion:

```python
class Parent():

    ...

    def __name_mangling(self):
        print("Can't access outside of instance")

    def access_name_mangling(self):
        self.__name_mangling()



>>> dad.__name_mangling()
AttributeError: 'Parent' object has no attribute '__name_mangling'

>>> dad.access_name_mangling()
Can't access outside of instance
```

Som ni ser kan vi komma åt `__name_mangling()` genom metoden `access_name_mangling()` i instancen med `self.__name_mangling()`.  
Vi testar använda `__name_mangling()` i Child, vi behåller samma kod i Parent och fortsätter i Child:


```python
class Child(Parent):

    ...

    def use_name_mangling(self):
        self.__name_mangling()



>>> son.use_name_mangling()
AttributeError: 'Child' object has no attribute '__name_mangling'

>>> son.access_name_mangling() # definerad i Parent
Can't access outside of instance
```



Komposition och aggregation {#komposition_aggregation}
------------------------------

Komposition och aggregation är en annan typ av relation mellan klasser. Arv är när klasser har en _is-a_ relation och komposition/aggregation är när klasserna har en _has-a_ relation. T.ex. om klassen Person har ett attribut vars värde är ett objeket av klassen Dog, då är relationen "Person has-a Dog".  
Relationen kan vara enkelriktad eller dubbelriktade.

* Enkelriktiad: Objekt X har objekt Y, av en annan klass, som attribut. Objekt X är medveten om Y men Y är inte medveten om X.
* Dubbelriktade: Objekt X har objekt Y, av en annan klass, som attribut och objekt Y har objekt X som attribut. Objekt X är medveten om Y och Y är medveten om X.
  


Det är komposition när klasserna är starkt kopplade. Om _ägar_ klassen slutar existerar slutar även det _ägda_ objektet att existera. T.ex. House (ägare) och Room (ägd), ett Room objekt kan inte existera utan ett House objekt.  
Det är aggregation när klasserna är svagt kopplade. Om _ägar_ klassen slutar existerar då fortsätter det _ägda_ objektet att existera.
I exemplet, Person has-a Dog, så är det aggregation då Dog fortsätter existera om Person slutar existera.  
Om det _ägda_ objektet skapas i _ägarens_ konstruktor är det oftast komposition medans om det _ägda_ objektet skickas som ett argument till konstruktorn är det oftast aggregation.

Vi kan skriva om Parent och Child klasserna med en kompositions relation istället.
I och med att vi inte har arv längre rensar vi bland metoderna, vi tar bort arv specifik funktionalitet.

```python
class Parent:

    def __init__(self, name):
        self.name = name
        self._privat = "privat"

    def print_me(self):
        print("My name is %s" % self.name)



class Child:

    def __init__(self, name, nickname):
        self.nickname = nickname
        self.parent = Parent(name)

    def print_me(self):
        print("My name is %s and my nickname is %s" % (self.parent.name, self.nickname))

    def accesParentPrivat(self):
        print("I can access " + self.parent._privat)


>>> parent = Parent("Zerny")
>>> child = Child("Andreas", "Zeldah")

>>> parent.print_me()
My name is Zerny

>>> child.print_me()
My name is  Andreas and my nickname is Zeldah

>>> child.accesParentPrivat()
I can access privat
```

Vi kan uppnå samma funktionalitet med Parent som en modul, komposition, istället för en arvs relation.



###Arv mot komposition {#arv_mot_komposition}

Som utvecklare vill vi återanvända så mycket kod som möjligt men samtidigt undvika komplex kod.
Om man har en djup arvskedja med multipla arv blir det jobbigt att håll koll på var metoder och attribut kommer ifrån. För att förstå en klass behöver man gå igenom alla klasser i arvskedjan och då har vi genast komplex kod.
Komposition löser återanvändning av kod med moduler.

När vad ska användas är inte spikat i sten utan det handlar om vilket du som utvecklare tycker passar bäst och vad du känner dig bekväm med. För att veta när ena är att föredra kan ni följa dessa tre guidelines.

1. Försök att undvika multipla arv, det blir snabb komplicerat och det krävs en mycket bra kodbas kunskap för att jobba med koden.
2. Använd komposition när kod används på olika ställen och i olika situationer.
3. Använd arv när det finns en klar _is-a_ relation med återanvändbar kod mellan klasserna.



Avslutningsvis {#avslutning}
------------------------------

Använd arv för att återanvända kod mellan klasser och använd komposition för att paketera kod i moduler som kan återanvändas.
För att se exempel på mer komplicerad arvs herarki och komposition kan ni läsa igenom, [python-textbok](https://python-textbok.readthedocs.org/en/latest/Object_Oriented_Programming.html#)
