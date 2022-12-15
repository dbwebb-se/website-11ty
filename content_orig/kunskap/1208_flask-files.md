---
author:
    - aar
    - lew
revision:
    "2022-01-24": (A, grm) Flyttat Json hit från flask-get-post.
category:
    - oopython
...
Flask, Json & Filer
===================================

[FIGURE src=/image/oopython/kmom02/topimage-art1.png?w=c5 class="right"]

Vi ska titta närmare på hur man kan spara objekt i session och då behöver vi json.

<!--more-->  

Intro {#intro}
-------------------------------
När vi hämtar en webbsida används HTTP-metoden GET. Det man skickar med hamnar då synligt i adressfältet, t.ex.: `http://localhost:5000?id=2&car=volvo`.

Vill vi däremot inte att datan, eller informationen vi skickar, ska synas, så kan vi använda metoden POST. POST kan bland annat inte bokmärkas, cachas eller sparas i historiken till skillnad från GET-metoden. POST-data skickas i headern, så den är ej synlig i URL:en (adressfältet).  

[Läs mer om POST och GET](http://www.w3schools.com/tags/ref_httpmethods.asp).

Vi ska gå igenom GET och POST och se hur de kan användas tillsammans med Python och Flask. Vill du hänga med och koda själv redan nu kan du skapa filerna som används i artikeln. Använd terminalen och ställ dig i “my_app2”. Om “my_app2” inte finns under din "kmom02" så skapar du den först:

[FIGURE src=/image/oopython/kmom02/tree_flask2.png]

```bash
mkdir my_app2
cd my_app2
mkdir static templates static/styles templates/forms templates/tables
touch app.py employee.py handler.py static/styles/style.css templates/{about.html,company.html,footer.html,header.html,index.html,forms/add_employee.html,tables/show_employees.html}
```

Ett färdigt exempel finns i [example/flask/read_write](https://github.com/dbwebb-se/oopython/tree/master/example/flask/read_write).

Förutsättning {#pre}
-------------------------------

Du har läst delen om GET och POST i guiden "[Php på 20 steg](kunskap/kom-i-gang-med-php-pa-20-steg#globals)" eller vet vad det innebär.  
Du har läst artikeln om "[Flask med Jinja2](kunskap/flask-med-jinja2)".  
<!-- Du har läst artikeln om "[Klassrelationer](kunskap/klass-relationer)".   -->


### Json {#json}

Vi behöver först skapa en ny fil `employees.json` som vi lägger i `static/data` mappen. Efter det så uppdaterar vi även rättigheterna så att vi både kan läsa och skriva till den.
```bash
mkdir static/data
touch static/data/employees.json
chmod 777 static/data/employees.json
```

Json är i princip en vanlig dictionary vilket betyder att om vi vill spara data behöver datan vara av datatypen Dict. Men vår data ligger i Employee objekt vilket inte översätts automatiskt till dictionary så vi kan inte spara datan som den är utan vi behöver [serialisera datan](https://sv.wikipedia.org/wiki/Serialisering). Serialisering är processen att formatera data/objekt till ett format som kan sparas och sedan deserialiseras för att återskapa det tidigare objektet/datan. Vi behöver skapa två nya metoder i Employee klassen för detta. En metod som tar datan från en instans och lägger i en Dict, serialisering, och en som skapar ett nytt Employee objekt av data från en Dict, deserialisering.

```python
class Employee():
    def __init__(self, firstname, lastname, salary, hired, id_number=None):
        self.firstname = firstname
        self.lastname = lastname
        self.salary = salary
        self.hired = hired
        self.id_number = id_number if id_number else random.sample(range(10), 4)

    def to_json(self):
        return {
            "fname": self.firstname,
            "lname": self.lastname,
            "salary": self.salary,
            "hired": self.hired,
            "id": self.id_number,
        }
    # factory method
    @classmethod
    def from_json(cls, json):
        return cls(json["fname"], json["lname"], json["salary"], json["hired"], json["id"])
    ...
```

Inget jätte speciellt i metoderna, `to_json` returnerar en Dict med all data och `from_json` är en klassmetod som skapar en ny instans av klassen, typ som `__init__()`. Klassmetoder som fungerar som `__init__()` brukar kallas "factory methods". Vi lägger även till ett default värde på `id_number` parametern i konstruktorn, så vi kan skicka med id_number när vi skapar objekt från json filen. Då fortsätter vi med att lägga till två metoder i Handler, en för att skriva ner data till filen och en för att läsa data den.

```python
#!/usr/bin/env python3 pylint: disable=broad-except
import json

class Handler():
    filename = "static/data/employees.json"

    def __init__(self):
        self.people = []
        try:
            self.load_data()
        except FileNotFoundError:
            self.add_predefined_employees()
        except Exception:
            self.add_predefined_employees()

    # ...

    def save_data(self):
        data = {}
        data["Employees"] = [e.to_json() for e in self.people]
        # Samma kod fast utan list comprehension
        # people = []
        # for e in self.people:
        #    people.append(e.to_json()
        # data["Employees"] = people

        with open(Handler.filename, 'w') as fh:
            json.dump(data, fh, indent=4)

    def load_data(self):
        with open(Handler.filename, 'r') as fh:
            data = json.load(fh)

        self.people = [Employee.from_json(e) for e in data["Employees"]]
        # Samma kod fast utan list comprehension
        # self.people = []
        # for e in data["Employees"]:
        #    self.people.append(Employee.from_json(e))
    #...
```

Först importerar vi modulen `json` och sätter en klassvariabel med filnamnet. I konstruktorn försöker vi läsa in data från filen men om filen saknas eller är tom, så kastas exception och då använder vi data från `add_predefined_employees()`. I `save_data()` använder vi `to_json()` för att serialisera varje objekt och lägga i en lista. Efter det öppnar vi filen i skrivläge och dumpar den, `indent` är inte nödvändigt, den säger bara hur filen skall formatera sitt innehåll.

I `load_data` läser vi filen och använder `from_json()` för att deserialisera datan från filen. Filen kan vi läsa in redan i konstruktorn, men om vi inte redan har skapat den kommer programmet krascha. Därför lägger vi en try except runt, om vi inte kan läsa in filen lägg til default datan.

Vi behöver fortfarande skriva till anropa `save_date` på rätt ställen i `app.py`.


```python
# app.py
from flask import Flask, render_template, request
from handler import Handler

app = Flask(__name__)
handler = Handler()
...

@app.route("/")
def main():
    """ Main route """

    return render_template("index.html", people=handler.get_people())

@app.route("/company", methods=["POST", "GET"])
def company():
    """ Company route """

    if request.method == "POST":
        handler.add_employee(request.form)
        handler.save_data()

    return render_template("company.html", persons=handler.get_people())
...
```

Vi ser till att alltid läsa från filen när vi ska visa index.html, så vi kan populera tabellen, och vi skriver till jsonfiler efter att vi har lagt till ett nytt Employee objekt. Nu ska vi ha en fungerande webbsida där vi kan lägga till anställda och visa upp dem i en tabell, som även fungerar på studentservern. Publicera övningen och testa. Notera att vi läser från filen innan vi lägger till ett nytt konto. Annars kommer inte programmet ihåg de konto vi redan lagt till.


Avslutningsvis {#avslutning}
------------------------------

Nu har vi kommit fram till slutet, det blev mycket information. Vi har lärt oss POST/GET, for-loop i template, CGI, session, Json och Serialisering bland annat.
