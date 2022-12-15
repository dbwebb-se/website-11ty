---
author: lew
category: python
revision:
  "2017-06-14": (A, lew) Första utgåvan inför kursen python H17.
...
Modulen argparse
==================================

[FIGURE src=image/python/terminal.png?w=c5 class="right"]

Vi har jobbat en del med terminalen och nu är det dags att se hur vi själva kan bygga program som med fördel styrs ifrån en terminal. För att kunna tolka kommandoradsargument kan vi använda modulen *argparse*. Den finns i Python's bibliotek och behöver inte laddas ner och kan hantera inkommande alternativ (options), argument och kommandon i vårt program.

Artikeln går igenom grunderna i argparse.



<!--more-->



Kodexempel från denna övningen finns i kursrepot för [python-kursen](https://github.com/dbwebb-se/python/tree/master/example/argparse) och här på [dbwebb](repo/python/example/argparse). Där finns även ett fristående exempel, *extended.py*, som visar lite mer funktionalitet, dock inte som egen modul.

[ASCIINEMA src=126459]



Options, commands och arguments {#options-commands-arguments}
--------------------------------------
När vi skickar in parametrar till ett script så talar vi om *options*, *commands* och *arguments*. Parametrarna skrivs vanligtvis i ordningen [options] command [arguments].

**options:** Ett option (alternativ) markeras oftast med `--` eller bara `-` som prefix. Det kallas även *optional argument* i Python och är som det låter, valfritt att skicka med.  
**commands:** Man måste skicka med ett kommando till programmet. Det är det som talar om vad programmet ska göra. I Python kallas det för *positional argument*.  
**arguments:** Argument kan ge information eller data till kommandot.  

Ett exempel är:

```
$ python3 main.py --output=humans.txt get https://dbwebb.se/blogg/grillcon-2017-var-i-utokad-version
```

Här är `--output=humans.txt` ett option (alternativ) som talar om för programmet att resultatet ska skrivas till en fil, kallad humans.txt. Kommandot i detta fallet är `get` som talar om för programmet vad som ska utföras, nämligen hämta något. Argumentet `https://dbwebb.se/blogg/grillcon-2017-var-i-utokad-version` talar om var programmet ska hämta något ifrån.



main.py {#main}
--------------------------------------
Vill du testa exempelfilerna kan du kopiera dem från exempelmappen:

```
# Ställ dig i kursrepot
$ cp -ri example/argparse/* me/kmom05/argparse/
```
Vi börjar med filen som startar programmet, `main.py`, och tittar på den:  

```python
import sys
import cli_parser


def main():
    """
    Main function where it all starts.
    """

    cli_parser.parse_options()

    print(cli_parser.options)

    sys.exit()


if __name__ == "__main__":
    main()
```

Vi importerar vår egna cli-modul (command-line-interface) från `cli_parser.py`, och kan då använda den. I detta fallet innehåller den en funktion, `parse_options()` som tar hand om allt vi skickar med in till den här start-filen. Vi skriver ut variablen `options` som innehåller informationen som skickats in och den nås via modulen `cli_parser.options`.

Den sista delen talar om hur filen ska köras. Alla moduler har en definierad `__name__`-variabel och om vi kör filen `python3 main.py` så är det `__main__` som återfinns i `__name__` och exekveras funktionen main(). Filen som körs har alltid `__main__` som namn. Om vi hade importerat den här filen från en annan, till exempel `another_module.py` och kört den: `python3 another_module.py`, så hade inte funktionen main() exekverats då `__name__` inte hade varit `__main__`, utan `main` (filens namn).

En visualisering kan se ut såhär:

```python
if __name__ == '__main__':
	print 'This program is being run by itself'
else:
	print 'I am being imported from another module'
```



Inga konstigheter? Bra. Vi går vidare och tittar i filen `cli_parser.py`.



cli_parser.py {#cli_parser}
--------------------------------------
cli_parser.py är filen, modulen, som importerar och använder `argparse`.

```python
import argparse

VERSION = "v1.0.0 (2017-06-16)"

options = {}

# omitted code in explanation purpose
```

Vi importerar modulen argparse och tilldelar en global variabel, `VERSION`, ett versionsnummer. `options` är variabeln vi ämnar returnera i slutet.

```python
# omitted code in explanation purpose

def parse_options():
    """
    Parse all command line options and arguments and return them as a dictionary.
    """
    parser = argparse.ArgumentParser()
    group = parser.add_mutually_exclusive_group()

# omitted code in explanation purpose

```

Vi skapar en funktion, `parse_options()`, som vi kallade på från main.py. Det första vi gör i funktionen är att skapa en ny variabel, *parser*, utifrån `argparse.ArgumentParser()`. Det är den variabeln som hanterar all information.  

Variabeln `group` blir sedan tilldelad `parser.add_mutually_exclusive_group()` och betyder att alla kommandon eller argument som tilldelas gruppen blir *ömsesidigt uteslutande*. Man kan inte använda fler än ett argument från en grupp samtidigt. Övriga argument petar vi in i `parser` med hjälp av funktionen `add_argument()`. Vi hoppar raskt vidare i koden och ser hur det ser ut.

```python
# omitted code in explanation purpose

    group.add_argument("-v", "--verbose", dest="verbose", help="increase output verbosity", action="store_true")
    group.add_argument("-s", "--silent", dest="silent", help="decrease output verbosity", action="store_true")    

    parser.add_argument("-V", "--version", action="version", version=VERSION)

    subparsers = parser.add_subparsers(title="commands (positional arguments)", help='Available commands', dest="command")
    subparsers.add_parser("command1", help="information on command1")
    subparsers.add_parser("command2", help="information on command2")



# omitted code in explanation purpose

```
Om [silent/verbose](t/6870).

Här ser vi att man ska inte kunna använda --silent samtidigt som --verbose, så `python3 main.py --silent --verbose` kommer resultera i ett felmeddelande. Vi börjar med att lägga till tre stycken *options* (börjar med `-` eller `--`). När vi lägger till options eller argument som ska kännas till finns det en uppsättning parametrar vi kan använda. I fallet ovan har vi: dest, default, help, action och version samt nargs.  
Parametern [*dest*](https://docs.python.org/3.6/library/argparse.html#dest) är namnet på attributet i resultatet. När vi tolkar argumenten sen så returneras ett objekt som innehåller de attributen vi skickat in.  
Parametern [*help*](https://docs.python.org/3.6/library/argparse.html#help) är en kortfattad beskrivning av vad argumentet gör. Den skrivs ut i den automatiskta hjälpen (-h, --help).  
Parametern [*action*](https://docs.python.org/3.6/library/argparse.html#action) talar om vad som ska hända med argumentet. `store_true` talar om att vi vill spara ner värdet som en boolean (True) i objektet om argumentet skickats med. 
Parametern *version* är kopplat till `action="version"` och skriver ut variabeln `VERSION`.  
Parametern [*default*](https://docs.python.org/3.6/library/argparse.html#default) är värdet om argumentet inte skickas med från kommandoraden.  
Parametern [*nargs*](https://docs.python.org/3.6/library/argparse.html#nargs) talar om hur många argument som kommer följa kommandot i resultatet. `?` betyder noll eller ett argument. Vill man specifiera ett okänt antal, använder man `*`. Man kan även sätta siffran direkt.

För att hantera kommandon kan vi använda oss av en *subparser*. Den grupperar kommandon och sparar ner de som är kända, i detta fallet *command1* och *command2* i objektet under namnet *command* som sätts i `dest="command"`. En styrka ser vi om vi tittar på hjälptexten:


```python
$ python3 main.py -h
usage: main.py [-h] [-v | -s] [-V] {command1,command2} ...

optional arguments:
  -h, --help           show this help message and exit
  -v, --verbose        increase output verbosity
  -s, --silent         decrease output verbosity
  -V, --version        show program's version number and exit

commands (positional arguments):
  {command1,command2}  Available commands
    command1           information on command1
    command2           information on command2

```


Vi har inte lagt till `-h, --help` utan de genereras automatiskt.

Nu vill vi kunna använda argumenten vi skickat in så vi tittar på den sista delen i filen `cli_parser.py`:

```python
# omitted code in explanation purpose

    args, unknownargs = parser.parse_known_args()

    options["known_args"] = vars(args)
    options["unknown_args"] = unknownargs

    return options

# omitted code in explanation purpose
```

Med hjälp av `parser.parse_known_args()` får vi tag på alla inskickade argument. De som är kända av programmet returneras i `args` och de argument som vi inte definierat hamnar i `unknownargs`. Variabeln args är av typen `<class 'argparse.Namespace'>`, vilket fungerar som en dictionary. Vi kan använda vars() för att omvandla den till en ren dictionary. Alla okända argument hamnar i en vanlig lista. Det är varabeln options som skrivs ut i startfilen main.py.

Nu kan vi antingen hantera de inskickade parametrarna direkt i `cli_parser.py` eller ifrån vår main-fil. Resultatet ligger i dictionaryn "options" och lägger vi till en rad i main.py: `print(cli_parser.options["known_args"]["command"])` når vi det inskickade kommandot. (tips: kika i options och se hur du kan nå de okända argumenten)



Körbart program {#korbart-program}
--------------------------------------
Här kan du se ett litet program som hanterar `--output=humans.txt`.  

[ASCIINEMA src=138543]

Som du ser så behöver vi inte ändra något för att få `=` att fungera. Det kan däremot bli mer läsbart och överskådligt om man använder `=` vid argument till options.



Avslutningsvis {#avslutning}
--------------------------------------
Vi har nu sett hur modulen argparse fungerar. Eller i alla fall grunderna i den. För den som vill veta mer, finns det både översiktlig information i [pydocs dokumentation](https://docs.python.org/3/library/argparse.html) och ett [API / tutorial](https://docs.python.org/3/howto/argparse.html#id1)
