---
author: lew
revision:
    "2017-01-18": (A, lew) First version.
category:
    - oopython
...
Autogenerera UML och dokumentation
===================================

[FIGURE src=/image/oopython/kmom03/kmom03_top.png?w=c8 class="right"]

Att kunna autogenerera UML diagram och dokumentation sparar en himla massa tid och kraft. Python och Pylint har en del inbyggda verktyg för just detta. Vi ska titta lite närmare på ett verktyg för att skapa UML-diagram utifrån koden och ett verktyg för att skapa html-sidor med dokumentation.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i Python och du vet vad variabler, typer och funktioner innebär.



Autogenerera UML-diagram {#autogenerera-uml}
------------------------------

Verktyget "[Pyreverse](https://www.logilab.org/blogentry/6883)" är sedan 2008 integrerat med Pylint och tillåter oss att skapa olika diagram utifrån färdig kod. Det är så kallad "[reverse engineering](https://sv.wikipedia.org/wiki/Reverse_engineering)". Man plockar isär något färdigt för att ta reda på hur det är uppbyggt.

Man kan generera olika typer av diagram och i olika format. För att ta reda på vilka format som finns tillgängliga kan man använda:

```bash
$ dot -Tx
Format: "x" not recognized. Use one of: canon cmap cmapx cmapx_np dot eps fig gd gd2 gif gv imap imap_np ismap jpe jpeg jpg pdf pic plain plain-ext png pov ps ps2 svg svgz tk vml vmlz vrml wbmp x11 xdot xdot1.2 xdot1.4 xlib
```

Du kan behöva något extra paket för att få till en .png-fil men Pyreverse säger till vad som behövs om du försöker skapa en.  

Antagligen är det `Graphviz` som fattas och det installerar du med din vanliga pakethanterare.  

Windows/Cygwin:
```bash
apt-cyg install graphviz
```

Mac:
```bash
brew install graphviz
```

Linux:
```bash
apt-get install graphviz
```



Vi utgår ifrån filen car.py:

```python
#!/usr/bin/env python3

class Car():
    wheels = 4
    carCount = 0
    equipment = []

    def __init__(self, model, price):
        self.model = model
        self.price = price
        self.__priv = 4

        Car.carCount += 1

    def printPriv(self):
        print(self.__priv)

    def presentCar(self):
        print("Model: {m}, Price: {p}".format(m=self.model, p=self.price))

    def addEquipment(self, newEquipment):
        self.equipment.append(newEquipment)

    def printEquipment(self):
        for eq in self.equipment:
            print("* " + eq)

    def __add__(self, other):
        return self.price + other.price
```

I samma mapp använder vi Pyreverse:

```bash
$ pyreverse -o png car
```

Nu genereras en .png-fil med ett diagram över klassen Car från car.py. Vi har inte angivit något namn för filen så den heter: "classes_No_Name.png".

[FIGURE src=/image/oopython/kmom03/pyreverse1.png caption="classes_No_Name.png."]

För att sätta ett namn använder man flaggan `-p someName`. För att se en lista på vad man kan åstadkomma skriver man:

```bash
$ pyreverse -h
```



Autogenerera dokumentation {#autogenerera-dokumentation}
------------------------------

Python(3) kommer med verktyget [Pydoc](https://docs.python.org/3.0/library/pydoc.html). Det hjälper oss att utifrån färdig kod, generera dokumentation alternativt se dokumentationen från exempelvis inbyggda moduler och klasser:
(Använder du Cygwin kan du behöva starta med `pydoc3`)
```bash
# Visa dokumentationen från den inbyggda klassen "str"
$ pydoc str
```

Vi testar att kika på dokumentationen över vår klass "Car". Vi ställer oss i mappen som har filen `car.py` och skriver:

```bash
$ pydoc car
```

[FIGURE src=/image/oopython/kmom03/pydoc_car1.png caption="Dokumentation över filen car.py"]



###Skapa html-fil {#skapa-html-fil}

Vi utgår ännu en gång från klassen "Car" och exekverar kommandot `pydoc -w car` för att skapa en .html-fil med den extraherade dokumentationen. Filen kommer hamna i den aktuella mappen.

[FIGURE src=/image/oopython/kmom03/pydoc_html1.png caption="car.html"]



###Serva html-fil {#serva-html-fil}

Pydoc kan även starta en server som tillhandahåller html-filerna för granskning. Då använder man kommandot `pydoc -p 1337` (Startar servern på port 1337). Man får även se dokumentationen över inbyggda moduler funktioner. Det är kanske mer aktuellt att få den dokumentationen om python3 så vi startar servern med `pydoc3 -p 1337`:  

```bash
$ pydoc3 -p 1337
Server ready at http://localhost:1337/
Server commands: [b]rowser, [q]uit
server>
```

Starta en webbläsare och skriv in `http://localhost:1337` i adressfältet:

[FIGURE src=/image/oopython/kmom03/pydoc_html2.png caption="Genererad dokumentation i webbläsaren."]

Som vi ser har vi vår Car-klass i mappen "." vilket representerar mappen vi startade servern från.



Avslutningsvis {#avslutning}
------------------------------

Det finns självklart mycket mer att gå igenom med dessa verktygen. Vill du veta mer kan du kika på:  

1. [Pyreverse](https://www.logilab.org/blogentry/6883)  

2. [Pydoc](https://docs.python.org/3.0/library/pydoc.html)  
