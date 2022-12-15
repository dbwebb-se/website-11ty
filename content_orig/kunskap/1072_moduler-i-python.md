---
author: efo, aar
category: python
revision:
  "2018-06-19": (B, aar) Utökad inför python-v2.
  "2017-06-02": (A, efo) Första utgåvan inför kursen python H17.
...
Moduler i Python
==================================

[FIGURE src=image/python/lego.jpg?w=c5 class="right"]

Funktioner i Python gör så att vi kan återanvända kod och att vi har möjlighet att sätta namn på koden som vi vill använda flera gånger. Ibland vill vi dela upp koden ännu mer för att enkelt kunna återanvända flera funktioner i flera olika program, detta kallas ibland kodbibliotek, i python kallas detta moduler. Vi ska i denna övning titta på hur vi kan skapa en modul och samla funktioner i den som vi importerar i en annan Python-fil.



<!--more-->



Vi fortsätter på exemplet från övningen [Funktioner, argument och returvärden](kunskap/funktioner-argument-och-returvarden) så har du inte gjort den övningen rekommenderar vi att du gör den först.



Moduler {#moduler}
--------------------------------------

Moduler skapas oftast av två anledningar. En av anledningarna är att organisera koden, vi samlar funktioner som är relaterade till varandra i en modul. Detta gör att de blir lätt att hitta och jobba med de funktionerna. Den andra anledningen till att skapa moduler är att skapa kodbibliotek. Vi sparar funktioner som vi vill återanvända i andra projekt i en modul. Då slipper vi skapa om funktionerna och istället behöver vi bara importera modulen också har vi tillgång till dem. Den ena anledningen utesluter dock inte den andra.

I slutet av övningen [Funktioner, argument och returvärden](kunskap/funktioner-argument-och-returvarden) ser våra funktioner ut på följande sätt.

```python
# energy_calculation.py
def calculate_energy(time_in_microwave, effect=800):
    """
    Calculates the energy consumption i kWh
    Returns the consumption
    """
    energy = effect * time_in_microwave / 1000
    return energy

def calculate_cost(energy, price_per_kwh=78.04):
    """
    Calculates the cost for a given energy consumption
    Returns the cost in kr
    """
    cost = energy * price_per_kwh / 100
    return cost
```

Dessa två funktioner hänger ihop och har ett sammanhang och som de strukturerade programmerare vi är tänker vi att dessa kan vi ju använda en annan gång. Detta görs lättast i Python genom att skapa en modul. Vi skapar en ny fil `energy_calculation.py` där vi endast lägger ovanstående två funktioner.  

I en annan ny fil `main.py` skriver vi själva programmet. Vi har alltså nu våra funktioner i en fil och själva programmet i en annan. För att vi ska kunna använda våra funktioner från filen `energy_calculation.py` måste vi importera den filen in i `main.py`. Detta gör vi genom att använda `import`. Notera att vi skriver `import energy_calculation` utan filändelse. Vi har nu tillgång till alla funktioner vi har definierat i `energy_calculation.py`. Vi kommer åt funktionerna genom att skriva modulens namn följt av en punkt `.` och sen funktionens namn, `module_name.function_name()`, detta kallas "dot notation".

```python
# main.py

import energy_calculation

emil_time = 2.5 / 60
emil_energy = energy_calculation.calculate_energy(emil_time)
emil_cost = energy_calculation.calculate_cost(emil_energy)

emil_string = "Emil använder {energy:.4f} kWh och detta kostar {cost:.4f} kr".format(
    energy=emil_energy,
    cost=emil_cost
)
print(emil_string)
# Emil använder 0.0333 kWh och detta kostar 0.0260 kr
```

En modul är egentligen bara en python fil med kod i, så alla filer vi har skapat än så länge har varit moduler. Det vi gör nu är egentligen bara att lära oss hur vi kan importera/använda funktioner från andra filer/moduler.

Byta namn på moduler {#as}
---------------------------------

Av olika anledningar vill man ibland använda ett annat namn på modulen i koden, t.ex. det kan vara långt eller det linkar något annat. Då kan man använda nyckelordet `as` för att ändra namnet. Vi kollar på hur det vi gör för att byta namn på "energy_calculation" till "ec".

```python
# main.py

import energy_calculation as ec

emil_time = 2.5 / 60
emil_energy = ec.calculate_energy(emil_time)
emil_cost = ec.calculate_cost(emil_energy)

emil_string = "Emil använder {energy:.4f} kWh och detta kostar {cost:.4f} kr".format(
    energy=emil_energy,
    cost=emil_cost
)
print(emil_string)
# Emil använder 0.0333 kWh och detta kostar 0.0260 kr
```

Det var inte svårare än så, lägg till `as name` i slutet av ditt import statement. Då kan vi använda det nya namnet i koden nedanför för att referera till den importerade modulen.

Inbyggda moduler och importera specifika funktioner {#from}
--------------------------------------------------------------

Python kommer skeppat med ett antal färdiga moduler som innehåller användbara funktioner. T.ex. modulen "math" som innehåller funktioner b.la. för avrundning av tal och mer avancerad aritmetik än plus, minus och delat med. Modulen "random" finns också, den innehåller funktioner som b.la. kan slumpa fram tal, vilket är väldigt bra att ha. Dessa moduler kan innehålla väldigt många olika funktioner och ibland vill vi kanske bara komma åt en specifik, då är det bra att man kan importera specifika funktioner så man inte får alla.  
För att göra det använder man sig av "from", då specificerar vi modulen vi vill hämta från och sen vilken funktionen vi vill ha, `from module_name import function_name`. Vi kollar på ett exempel där vi importera en funktion för att avrunda tal från "math".

```python
from math import floor

print(floor(3.14))
# 3
```

Vi vill även ha funktionen för att avrunda tal uppåt och potens och upphöjt. Vi behöver inte skapa en ny rad för detta utan vi kan lägga till varje funktion vi vill ha efter "floor". Vi kan även här byta namn på funktionerna vi importerar med "as", vi testar byter namn på "floor" till "lower".

```python
from math import floor as lower, ceil, pow

print(lower(3.14))
# 3
print(ceil(3.14))
# 4
print(pow(5,2))
# 25
```



Exekvera moduler som script {#exekvera}
-----------------------------------------------

Som jag nämnde förut är en modul egentligen bara en fil med kod. Detta faktum gör att vi kan exekvera den som ett eget program. Vi fortsätter med energi exemplet och lägger till lite kod som vi tänker oss att vi vill använda för att testa att funktionerna fungerar som de ska.

```python
# energy_calculation.py
def calculate_energy(time_in_microwave, effect=800):
    """
    Calculates the energy consumption i kWh
    Returns the consumption
    """
    energy = effect * time_in_microwave / 1000
    return energy

def calculate_cost(energy, price_per_kwh=78.04):
    """
    Calculates the cost for a given energy consumption
    Returns the cost in kr
    """
    cost = energy * price_per_kwh / 100
    return cost

print("Test av calculate energy:")
print(calculate_energy(800))
```
Vi exekverar filen som vanligt med `python3 energy_calculation.py` och då skriver den ut `"Test av calculate energy: 640"`. Detta vill vi inte ska ske när vi importerar modulen. Då vill vi enbart ha tillgång till funktionerna, inte att någon kod ska exekveras. Testa exekvera "main.py" för att se vad som skrivs ut.

```bash
$python3 main.py
Test av calculate energy:
640.0
Emil använder 0.0333 kWh och detta kostar 0.0260 kr
```

Nu görs utskriften från "energy_calculation.py" först i programmet, det är för att koden i modulen exekveras direkt när den importeras. Så där vill vi inte ha det, vi vill fortfarande bara se "Emil använder..." utskriften. Som tur är kan vi avgöra i koden om filen/modulen exekveras som ett eget program eller om det importeras som en modul. Om filen importeras får variabeln `__name__` värdet av vad filen heter men om filen exekveras som eget program får variabeln värdet `__main__`. Testa att lägga till `print("name: " + __name__)` i slutet av båda filerna och exekvera dem.

```bash
$python3 main.py
Test av calculate energy:
640.0
name: energy_calculation
Emil använder 0.0333 kWh och detta kostar 0.0260 kr
name: __main__

$python3 energy_calculation.py
Test av calculate energy:
640.0
name: __main__
```
När vi kör "main.py" skrivs "name: energy_calculation" ut från modulen och `"name: __main__"` från "main.py". När vi exekverar "energy_calculation.py" skrivs `"name: __main__"` ut. Det vi kan göra med denna kunskapen är att lägga till en if-sats i slutet av "energy_calculation.py" som kollar om `__name__ == "__main__"`. Om det är sant vet vi att filen exekveras som ett eget program och om vi då lägger vår test kod i if-sats blocket kommer den inte exekveras när filen blir importerad.

```python
# energy_calculation.py
def calculate_energy(time_in_microwave, effect=800):
    """
    Calculates the energy consumption i kWh
    Returns the consumption
    """
    energy = effect * time_in_microwave / 1000
    return energy

def calculate_cost(energy, price_per_kwh=78.04):
    """
    Calculates the cost for a given energy consumption
    Returns the cost in kr
    """
    cost = energy * price_per_kwh / 100
    return cost

if __name__ == "__main__":
    print("Test av calculate energy:")
    print(calculate_energy(800))
    print("name: " + __name__)
```

Testa exekvera båda filerna igen och lägg märke till att det inte längre blir några utskrifter från "energy_calculation.py" när du exekverar "main.py".



if __name__ == "__main__" {#name}
------------------------------------

I förra stycket pratar vi om att använda `if __name__ == "__main__"` för att testa moduler. Vi kan också använda det för att kontrollera vad som ska ske om ett program blir importerat eller startat. Även i vår "main.py" fil borde vi använda oss av `if __name__ == "__main__"`, det är en bra vana att ha det i alla python filer man skapar.

I "main.py" vill vi använda det för att bestämma vad som sker när vi startar programmet.


Koden vi redan har i "main.py" lägger vi i en ny funktion och sen anropar vi den i `if __name__ == "__main__"` blocket.

```python
# main.py

import energy_calculation as ec

def main():
    emil_time = 2.5 / 60
    emil_energy = ec.calculate_energy(emil_time)
    emil_cost = ec.calculate_cost(emil_energy)

    emil_string = "Emil använder {energy:.4f} kWh och detta kostar {cost:.4f} kr".format(
        energy=emil_energy,
        cost=emil_cost
    )
    print(emil_string)
    # Emil använder 0.0333 kWh och detta kostar 0.0260 kr

if __name__ == "__main__":
    main()
```

Det här är inte något vi måste göra egentligen men vi tar det som vana att jobba på det sättet. Vi vill undvika att ha "lös" kod, i det globala scopet. Fördelen med den nya strukturen är att vi lätt kan skriva om funktionen så att även den går att återanvända och importeras som module i ett annat program.

Det ända vi behöver göra är att lägga till parametrarna `user` och `time` i funktionen och byta ut `2.5` och `"emil"` med de nya parametrarna. 

```python
# main.py

import energy_calculation as ec

def main(name, time_minutes):
    time = time_minutes / 60
    energy = ec.calculate_energy(time)
    cost = ec.calculate_cost(energy)

    string = "{name} använder {energy:.4f} kWh och detta kostar {cost:.4f} kr".format(
        name=name
        energy=energy,
        cost=cost
    )
    print(string)
    # Emil använder 0.0333 kWh och detta kostar 0.0260 kr

if __name__ == "__main__":
    main("emil", 2.5)
```

Nu fungerar programmet likadant som förut fast det går också att importera det som en modul.



Avslutningsvis {#avslutning}
--------------------------------------
Vi har nu kort introducerat moduler i Python. Moduler är ett sätt att kategorisera och dela upp kod för återanvändning och ett bra arbetssätt när mängden av kod växer eller om du vill använda samma kod i olika projekt. För de som vill veta mer om moduler i Python beskrivs moduler i [Python Tutorial Chapter 6 Modules](https://docs.python.org/3/tutorial/modules.html).

Alla kodexempel från denna övningen finns i kursrepot för [python-kursen](https://github.com/dbwebb-se/python/tree/master/example/functions) och här på [dbwebb](https://dbwebb.se/repo/python/example/functions). Kodexemplet innehåller hela exemplet från tidigare övningar, men uppdelat i modulen `energy_calculation.py` och huvudprogrammet finns i `main.py`.
