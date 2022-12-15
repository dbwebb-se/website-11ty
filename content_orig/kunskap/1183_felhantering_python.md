---
author: aar
revision:
    "2021-06-09": (A, aar) First version.
category:
    - python
...
Felhantering i Python
===================================

[FIGURE src=/image/oopython/kmom04/exceptions_top.png?w=c8 class="right"]

Det finns två vanliga fel, eller *errors*, som man kan snubbla över i Python. Det är *syntax errors* och *exceptions*. Vi ska titta närmare på exceptions och hur vi kan jobba med dem.

<!--more-->  

Fel kan alltid uppstå i vår kod, speciellt när vi jobbare med input från en användare. Vi kan inte hindra användaren från att skicka in data som skiljer sig från vad vi vill att de ska skicka in. Detta måste vi hantera, annars kommer vårt program att krascha vilket vi aldrig vill att det ska ske.



Errors {#errors}
-------------------------------

###Syntax Errors {#syntax-errors}

Det vanligaste felet är syntax errors (ibland parsing errors). Det uppstår när syntaxen är fel och programmet inte kan köras. Python förstår inte vad vi har skrivit. Ett exempel är följande kod:

```
>>> if 100 < 5 print("Oj då...")
  File "<stdin>", line 1
    if 100 < 5 print("Oj då...")
                   ^
SyntaxError: invalid syntax
```

Felet visar oss vilken fil det handlar om (i detta fallet interpretatorn). Den lilla pilen pekar på den tidigaste gången felet upptäcktes på raden och vanligen är den felaktiga koden i delen före pilen. Här handlar det om att if-satsen inte startar med `:`.

Syntax fel kan vi inte göra något åt, då de uppstår före vår kod körs och gör att vårt program inte kan starta.



###Built-in/Runtime Exceptions {#built-in-exceptions}

Även om syntaxen är korrekt så finns det fel som bara hittas när programmet exekveras. Då handlar det om exceptions. Det kan handla om att en variabel inte är definierad eller att man adderar en siffra med en sträng. Ett exempel på ImportError:

```
>>> from Nangijala import Skorpan
Traceback (most recent call last):
    File "<stdin>", line 1, in <module>
ImportError: No module named 'Nangijala'

```

Här kastas felet *ImportError* och vi får information om var i filen felet uppstår och ett meddelande: "No module named 'Nangijala'". Hjälpsamt och trivsamt.

Fel kan också uppstå när vi anropar vissa funktioner med felaktig data. T.ex. [index()](https://docs.python.org/3/library/stdtypes.html#str.index) funktionen på strängar, funktionen returnerar index positionen för en del-sträng. Om del-strängen inte finns lyfter funktionen ett `ValueError`.

```python
>>> "python".index("finns inte")
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
ValueError: substring not found
```

Det finns många inbyggda exceptions som hjälper oss att se vad som blivit fel. Några av de vanligaste är:

| Exception     | Meddelande                             |
| ------------- | :--------------------------------      |
| ImportError   |  No module named 'something'           |
| IndexError    |  list index out of range               |
| KeyError      |  *the_key* (tex my_dict["the_key"])    |
| NameError     |  name '*variable name*' is not defined |

Kika i [dokumentationen](https://docs.python.org/3/library/exceptions.html) för fler exceptions.

Det är dessa fel vi kan hantera och jobba med i vår kod.



Hantera fel {#dealwithit}
-------------------------------

Det finns generellt sett två strategier för att hantera fel. Att innan vi gör det som troligen kan ge ett fel, kollar vi först om det är möjligt att göra det, använder if-satser. Den andra strategin är att gasa och hantera fel om de uppstår, om inget fel uppstår går vi vidare. Nu ska vi lära oss strategi nr 2, att hantera fel när de uppstår.

Vi börjar med att kolla på ett fel/exception. När vi försöker göra om en sträng till ett heltal och strängen inte är ett heltal får vi ett `ValueError`.

```python
inp = input("Skriv in ett heltal: ")
as_an_int = int(inp)
print("Nu är programmet klart")

>>> "Skriv in ett heltal: " en sträng

# result 
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
ValueError: invalid literal for int() with base 10: 'en sträng
```

När vi skiver den koden kanske vi tänker, "hmmm vad händer här om användaren inte skriver in ett heltal?". Då händer det som visas i exemplet ovanför, koden kraschar. Vi har ett specifikt ställe i koden där vi är medvetna om att det lätt kan uppstå specifika exception och vi vill inte att det ska krascha programmet.

För att göra detta ska vi använda oss av konstruktionen [try-except](https://wiki.python.org/moin/HandlingExceptions) och lägga koden i ett `try` block.

```python
inp = input("Skriv in ett heltal: ")
try: 
    # try blocket
    as_an_int = int(inp)
    print("Vårt heltal", as_an_int)
except ValueError:
    # except blocket
    print("Det var inte ett heltal")
print("Nu är programmet klart")

#output
>>> Skriv in ett heltal: en sträng
Det var inte ett heltal
Nu är programmet klart
```

När vi jobbar med try-except vill vi vara så specifik som möjligt. Så vi lägger bara raden, som vi vet kan ge oss felet, i try blocket (ibland kan man behöva flera rader i blocket och det är OK men i vårt exempel behövs bara en rad). På `except` raden specificerar vi vilket typ av fel vi vill fånga, `ValueError`. Om koden i `try` blocket genererar ett `ValueError` kommer koden i `except` blocket att exekveras. När den koden har exekverats fortsätter python exekvera koden efter try-except konstruktionen.

I utskriften i exemplet kan vi se att utskriften `print("Vårt heltal", as_an_int)` inte görs. Det är för att koden i `try` avbryts direkt när felet uppstår och då går python vidare till att exekvera koden i `except`. Notera också att den raden ligger inne i `try` blocket även om vi inte förväntar oss att den raden ska lyfta något fel. Men om vi lägger den raden efter try-except koden då kommer programmet krascha för att det inte finns en `as_an_int` variabel. Därför lägger vi även koden, som är beroende av koden som kan lyfta felet, i `try` blocket. 

Att använda try-except för att göra något när ett exceptions uppstår kallas att fånga/catch exceptions. När koden skapar ett/ett exception uppstår exception kallar vi antingen lyfta/raise eller kasta/throw exception.

Vi kollar också på vad som händer om koden inte lyfter ett fel.

```python
inp = input("Skriv in ett heltal: ")
try: 
    # try blocket
    as_an_int = int(inp)
    print("Vårt heltal", as_an_int)
except ValueError:
    # except blocket
    print("Det var inte ett heltal")
print("Nu är programmet klart")

#output
>>> Skriv in ett heltal: 10
Vårt heltal 10
Nu är programmet klart
```

Koden i `except` blocket körs inte. Den koden körs bara om ett `ValueError` lyfts i koden som ligger `try` blocket. Om inget fel lyfts då är det som att try-except koden inte finns.



### Fånga flera exceptions {#multiple}

I koden ovanför såg vi hur vi hantera när ett specifikt exception uppstår, men ibland kan koden lyfta flera olika typer av fel och vi vill fånga alla dem. Vi gör på olika sätt beroende på om vi vill göra samma sak oberoende av vilken typ felet är eller om vi vill göra olika saker beroende på vilket typ exception som lyfts. Vi utgår från följande kod:

```python
inp = input("Skriv in ett heltal: ")
try: 
    # try blocket
    number = int(inp)
    print(f"10/{number} == {10/number}")
except ValueError:
    # except blocket
    print("Det var inte ett heltal")
```

Vi vill hantera fel som uppstår både av att användaren skriver in en icke siffra och om användaren skriver in "0". Det går inte att dividera med noll, då lyfts ett `ZeroDivisionError`. Nu hanterar vi bara att användaren skriver in en icke-siffra.

```bash
# running the code
>>> Skriv in ett heltal: 0

Traceback (most recent call last):
  File "<stdin>", line 4, in <module>
ZeroDivisionError: division by zero
```



#### Kör samma kod för flera fel {#same}

Om vi vill köra samma kod för både `ValueError` och `ZeroDivisionError`, då lägger vi bara till det nya felet på `except` raden.


```python
    ...
except (ValueError, ZeroDivisionError):
    # except blocket
    print("Antingen skrev du inte in en siffra eller så skrev du in 0. Vilket inte är OK!")
```

Nu kan vi hantera båda fel och båda ger samma utskrift.

```bash
# kör programmet för att få ZeroDivisionFel
>>> Skriv in ett heltal: 0
Antingen skrev du inte in en siffra eller så skrev du in 0. Vilket inte är OK!

# kör programmet för att få ValueError
>>> Skriv in ett heltal: hej
Antingen skrev du inte in en siffra eller så skrev du in 0. Vilket inte är OK!

# kör programmet för att få inte få några fel
>>> Skriv in ett heltal: 2
10/2 == 5
```



#### Kör olika kod baserat på fel {#different}

Att ha samma utskrift för olika fel kan bli otydligt för användaren så vi kollar på hur vi kan köra olika kod baserat på felen. För att göra det lägger vi till en till `except` konstruktion efter den vi redan har.

```python
    ...
except ValueError:
    # except blocket
    print("Du skrev inte in ett heltal!")
except ZeroDivisionError:
    # except blocket
    print("Det går inte att dividera med noll!")
```

Nu kan vi hantera båda fel och de ger olika utskrifter.

```bash
# kör programmet för att få ZeroDivisionFel
>>> Skriv in ett heltal: 0
Det går inte att dividera med noll!

# kör programmet för att få ValueError
>>> Skriv in ett heltal: hej
Du skrev inte in ett heltal!

# kör programmet för att få inte få några fel
>>> Skriv in ett heltal: 2
10/2 == 5
```



## Fånga alla fel {#all}

Det går att fånga alla typer av exceptions utan att behöva specificera vilka man vill fånga. Det är vanligt att man ser den lösningen när man letar efter efter hjälp på nätet. Men det är en dålig lösning som inte ska användas. I kursen, när ni ska lösa uppgifter är det inte giltigt med denna lösningen, så vida det inte står i uppgiften. Ni ska specificera vilka fel ni vill fånga.

Vi kollar ändå på hur det ser ut när man fångar alla typer av fel och pratar lite om varför vi vill undvika det.

```python
inp = input("Skriv in ett heltal: ")
try:
    # try blocket
    number = int(inp)
    print(f"10/{number} == {10/number}")
except:
    # except blocket
    print("Något gick fel!")

# kör programmet för att få ZeroDivisionFel
>>> Skriv in ett heltal: 0
Något gick fel!

# kör programmet för att få ValueError
>>> Skriv in ett heltal: hej
Något gick fel!

# kör programmet för att få inte få några fel
>>> Skriv in ett heltal: 2
10/2 == 5
```

Notera att vi inte har skrivit vilka exception vi vill fånga på `except` raden. Det gör att, för alla exceptions som lyfts i `try` blocket kommer `except` koden att köra. Det farliga med detta är att vi inte vet vad som skapar fel utskriften. Nu har vi väldigt lite kod att jobba med så vi får tänka att i `try` blocket ligger det kanske 10 rader istället. Vilket innebär att det finns många ställen där olika typer av kan uppstå och då blir det väldigt jobbigt att hitta vad som går fel om man alltid bara får samma resultat oberoende av vad som går fel. Det blir svår för användaren att veta vad den gjorde fel och hur det ska undvikas och det är svår för utvecklaren att ta reda på felsöka varför felet uppstår, för att utvecklaren får inga exceptions.

Därför ska vi "alltid" fånga specifika fel, för att vi kan aldrig garantera att vår kod funkar exakt som den ska och att den inte innehåller några buggar. Så då ska vi bara dölja/fånga de som vi förväntar oss att de kan kastas.





<!-- 
raise Exception {#raise-exception}
-------------------------------

När man pratar om felhantering stöter man på termer som att *kasta ett exception* (throw exception) och *fånga ett exception* (catch exception). När man kastar ett exception så talar man om att det har blivit ett fel och definierar vilket fel som ska uppbringas. Sedan fångar man felet och agerar därefter. I Python kallas det *raise* exception, och kan med fördel användas i en try/except. Det är då i `try:` man kastar ett exception och fångar det i `except:`.

För att själv tvinga fram det använder vi `raise`:

```
>>> raise Exception("Something happened!")
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
Exception: Something happened!
```

Vi ser ovan att man kan skicka med ett meddelande till Exception som skrivs ut. I följande stycke tar vi reda på hur man kan skapa egna exceptions och använda dem i ett sammanhang.



Nu har vi ett exception för varje fel som vi vill tvinga fram. Notera att i nyare version av Python behöver vi inte ha med `pass` i klassen, det ger valideringsfel (tror det är python3.7 och uppåt).
 
Nu kollar vi på hur vi kan använda de egen definierade felen.

```python
#!/usr/bin/env python3

"""
Main file for testing exceptions
"""
import random
from exceptions import ValueTooLowError
from exceptions import ValueTooHighError


def guess(number, correct):
    if number < correct:
        raise ValueTooLowError
    if number > correct:
        raise ValueTooHighError

def game_loop():
    rand_val = random.randint(1, 10)

    while True:
        try:
            in_val = int(input("Ange siffra: "))
            guess(in_val, rand_val)
            break
        except ValueTooLowError:
            print("För lågt, prova igen!")

        except ValueTooHighError:
            print("För högt, prova igen!")

    print("Siffran {} är rätt!".format(in_val))

if __name__ == "__main__":
    game_loop()

```

Notera att vi inte fångar felen i samma funktion som vi lyfter dem i.
 -->


Avslutningsvis {#avslutning}
------------------------------

Vi kommer att lära oss mer om exceptions i senare kursmoment och i kursen oopython som går efter jul.
