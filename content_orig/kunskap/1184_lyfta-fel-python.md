---
author: aar
revision:
    "2021-06-15": (A, aar) First version.
category:
    - python
...
Lyfta exceptions i Python
===================================

Tidigare i kursen lärde vi oss hur vi fångar exceptions som uppstår när saker går fel i vår kod, nu ska vi lära oss hur vi själva kan lyfta exceptions i koden.

<!--more-->  



Introduktion {#intro}
-------------------------------

Om vi jämför funktionerna [str.find()](https://docs.python.org/3/library/stdtypes.html#str.find) och [str.index()](https://docs.python.org/3/library/stdtypes.html#str.index) så är den ända skillnaden hur de hanterar fallen där del-strängen saknas, med andra ord vad händer när funktionen inte "lyckas".

Beroende på vilken funktion vi använder behöver vi skriva vår kod på olika sätt för att hantera fel fallen. Om vi använder `find()` skriver vi kod typ så här:

```python
index = a_string.find("a")
if index == -1:
    # do something if substring does not exist
    ...
else:
    # do something if substring exist 
    ...
```

Vi kan se `-1` som en felkod vi får tillbaka från `find()` om del-strängen inte finns. Denna typen av kod kallas "Look before you leap" (LBYL), det är egentligen överkurs och inget ni behöver ha koll på. Vi använder if-satser för att kolla om något gick bra eller dåligt och gör olika saker baserat på det.

Om vi istället använder `index()` funktionen ser vår kod ut typ:

```python
try:
    index = a_string.index("a")
    # do somethings if substring exist
    ...
except ValueError:
    # do something if substring does not exist
    ...
```

Denna typen av kod kallas “It is easier to ask for forgiveness than permission” (EAFP). Vi försöker göra något och om det gick fel hanterar vi det, annars kör vi bara vår kod. Koden utgår från att det ska lyckas.

För att vi ska kunna skriva egna funktioner enlig EAFP behöver vi veta hur vi manuellt lyfter exceptions.



Lyft exception {#raise}
-------------------------------

När man pratar om felhantering stöter man på termer som att *kasta ett exception* (throw exception) och *fånga ett exception* (catch exception). När man kastar ett exception så talar man om att det har blivit ett fel och definierar vilket fel som ska uppbringas. Sedan fångar man felet och agerar därefter. I Python kallas det *raise* exception, och kan med fördel användas i en try/except.

För att själv tvinga fram det använder vi `raise` nyckelordet:

```
def func():
    raise Exception("Something happened!")

func()

Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
Exception: Something happened!
```

Vi ser ovan att man kan skicka med ett meddelande till `Exception` som skrivs ut. `Exception` är [bas-exception](https://docs.python.org/3/library/exceptions.html#base-classes) som man generellt inte ska använda sig utav. På samma sätt som att vi inte ska fånga för generella exception vill vi inte lyfta generella exception. Istället ska vi använda ett mer [specifikt exception](https://docs.python.org/3/library/exceptions.html#concrete-exceptions) som syftar på varför felet har lyfts. Det vanligaste är att använda `ValueError`.



### Exempel {#exempel}

Vi kollar på ett lite exempel. Vi skriver ett gissa-siffra-program. Där vi lyfter ett fel i en funktion om den gissade siffran är fel.

```python
#!/usr/bin/env python3

"""
Main file for testing exceptions
"""
import random


def guess(number, correct):
    if number < correct:
        raise ValueError("Number to small")
    if number > correct:
        raise ValueError("Number to big")

def game_loop():
    rand_val = random.randint(1, 10)

    while True:
        try:
            in_val = int(input("Ange siffra: "))
            guess(in_val, rand_val)
            break
        except ValueError as e:
            print(str(e))

    print("Siffran {} är rätt!".format(in_val))


if __name__ == "__main__":
    game_loop()
```

I `guess()` lyfter vi `ValueError` med olika meddelanden, argumentet, baserat på om det är stort eller litet.

Om Användaren gissar rätt, lyfts inget fel och då körs `break` raden och loopen avslutas. Om användaren gissar fel kör vi `except` blocket och sen kör vi ett till varv i loopen.

På `except` raden lägger vi till `as e` för att lägga till en referens till exception:et som har lyfts, då kan vi referera till det i koden. I blocket gör vi om felet till en sträng, `str(e)`, vilket returnerar meddelande som felet skapades med, "Number to small" eller "Number to big".

Notera att vi inte fångar felen i samma funktion som vi lyfter dem i. Det är ett vanligt fel många gör i början. Om man skriver koden på det sättet finns det ingen poäng med att lyfta felet.

Vad händer i programmet när det ber er skriva in input och ni skriver in något annat än en siffra? Kommer det krascha eller vad får ni för utskrift? Kom fram till en hypotes innan ni testar eller läser vidare.



#### Stranger danger {#danger}

I koden fångar vi alla `ValueError` som lyfts inom try-blocket, för att vi förväntar oss att det lyfts på ett ställe. Men vad händer om en annan del av koden lyfter ett `ValueError` inom try-blocket.

Det är vad som sker om användaren skriver in något annat än en siffra.

```python
>>> Ange siffra: test
invalid literal for int() with base 10: 'test'
>>>Ange siffra:
```

Programmet kraschade inte men vi fick meddelandet från felet. Var vi medvetna om det när vi skrev koden? Troligen inte, en vanlig användare av vårt program hade säkert inte förstått det felmeddelandet. Troligen vill vi ha en egen specifik utskrift för det felet. Jag upptäckte faktiskt detta av en ren slump när jag testade programmet. Så även erfarna programmerare gör detta felet och det kan vara ett farligt fel att göra. koden döljer ett okänt fel. Därför måste man vara försiktig när man fångar exceptions och det är därför vi ska vara så specifika som möjligt med vilket fel vi lyfter eller fångar.

Vi kan skriva om koden så vi får ett specifik meddelande för fel input.

```python
...

    while True:
        try:
            in_val = int(input("Ange siffra: "))
            try:
                guess(in_val, rand_val)
                break
            except ValueError as e:
                print(str(e))
        except ValueError:
            print("Du får bara skriva in siffror!")
    ...
```

eller

```python
...

    while True:
        try:
            in_val = int(input("Ange siffra: "))
        except ValueError:
            print("Du får bara skriva in siffror!")
            continue
        try:
            guess(in_val, rand_val)
            break
        except ValueError as e:
            print(str(e))
    ...
```

Avslutningsvis {#avslutning}
------------------------------

I oopython kursen kommer vi lära oss skapa egna exceptions.
