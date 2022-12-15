---
author: efo
revision:
    "2021-12-07": (A, efo) Skapad inför VT2022.
...
En Flask App i molnet
==================================

I denna övningen använder vi Flask för att skapa ett eget API som svarar med JSON data. I slutet av övningen driftsätter vi appen i Azure's cloud.


<!--more-->



Förkunskaper {#prereqs}
--------------------------------------

Du har installerat [labbmiljön](../kurser/moln/labbmiljo) för kursen och läst igenom artikeln [Introduktion till molnet](kunskap/introduktion-till-molnet).



Flask {#flask}
--------------------------------------

[Flask](https://flask.palletsprojects.com/en/2.0.x/) beskrivs som ett "micro-framework". Vi vill använda Flask för att skapa ett Application Programming Interface (API). Ett API är ett sätt för olika applikationer att kommunicera med varandra. Det API som vi ska skapa ska svara på olika url'er som vi kallar `endpoints`. Vi vill att vårt API ska svara med JSON.

När vi anropar en server från en webbläsare till exempel om vi skriver `https://dbwebb.se` görs ett GET-anrop. Så när vi skriver ett API definierar vi de olika endpoints för olika url'er där vi vill att vår server/API ska svara med olika data i JSON-formatet.

Låt oss titta på hur det kan se ut. I din katalog som du skapade och använde i kmom01 skapa en ny underkatalog `lager_api`. Vi kommer återanvända denna underkatalogen i inlämningsuppgiften senare i kmomet.

Om du vill titta på ett fullständigt exempel finns ett i [moln/flask_starter](https://github.com/dbwebb-se/moln/tree/main/flask_starter).



Virtual Environment {#venv}
--------------------------------------

För att vi ska kunna installera externa paket som `Flask` och `requests` behöver vi berätta för Python att vi vill ha en virtual environment där vi kan spara dessa moduler.

Följa instruktionerna för ditt operativsystem i Flask's guide för [Virtual environments](https://flask.palletsprojects.com/en/2.0.x/installation/#virtual-environments). Du behöver inte skapa en ny katalog om du har gjort det ovan. Om du använder WSL terminalen eller Cygwin terminalen kan du använda instruktionerna för macOS/Linux. Vi ser även till att aktivera vår virtual environment.

Som ett sista steg i installationen installerar vi Flask med hjälp av Pythons pakethanterare `pip`.

```shell
pip install Flask
```



Vår första route {#firstroute}
--------------------------------------

Nu ska vi se så att allt fungerar så här långt. Vi börjar därför med att skapa en fil `app.py` i den katalog där du har aktiverat din virtual environment. I filen lägger du in följande:

```python
from flask import Flask

app = Flask(__name__)

@app.route("/")
def hello_world():
    return "Hello World!"
```

Vi startar igång Flask servern med följande kommandon i en terminal.

```shell
export FLASK_APP=app
flask run
```

Om du går till `http://localhost:5000` i en webbläsare ska du kunna se Hello World! i webbläsaren.



### Olika routes {#different}

Jag skapar ytterligare två routes i `app.py` så att den filen ser ut på följande sätt. Förutom de nya routes har jag lagt till en modul från Flask `escape` så vi kan städa upp i den data användaren skickar in.

```python
from flask import Flask
from markupsafe import escape

app = Flask(__name__)

@app.route("/")
def hello_world():
    return "Hello World!"

@app.route("/another")
def another():
    return "Another Hello World!"

@app.route("/dynamic/<name>")
def dynamic(name):
    return f"Hello {escape(name)}"
```

Starta om din Flask server i terminalen och vi bör nu kunna gå till `/another` och se "Another Hello World!" och till `/dynamic/emil` och se "Hello emil". Den sista routen är lite speciell då vi utnyttjar variabel reglar. Vi anger `<name>` och kan då ange vad som helst efter den andra / och vi får då in den som en variabel i routen.



### Svara med json {#jsonresponse}

I Flask är det enkelt att vårt API svarar med ett JSON svar. Om vi returnerar en Dictionary görs den per automatik om till JSON med hjälp av funktionen `jsonify()`. Om du vill se mer information om att svara med JSON är [dokumentationen](https://flask.palletsprojects.com/en/2.0.x/quickstart/#apis-with-json) en bra start. En route som svarar med JSON kan alltså se ut på följande sätt:

```python
@app.route("/json/<name>")
def json(name):
    return {
        "data": {
            "name": name
        }
    }
```



Hämta data från ett annat API {#anotherapi}
--------------------------------------

I detta kmom och projektet ska vi använda ett JSON-API. JSON står för JavaScript Object Notation och är ett data format som används i stor utsträckning när man skickar formaterad data mellan en server och en klient. JSON är dokumenterad på deras [webbplats](https://www.json.org/json-en.html).

Nedan är en beskrivning av API:t vi ska använda i kursen och hur du kan hämta data från API:t. API:t används i en annan kurs för webbprogrammering och ett extra API-endpoint (URL där vi kan hämta data) har skapats för denna kursen.

Endpointet för denna kursen finns på: [https://lager.emilfolino.se/v2/products/everything](https://lager.emilfolino.se/v2/products/everything)

Endpointet returnerar ett JSON-textsvar innehållande en lista med ungefär 9000+ element. JSON data kan liknas vid Dictionary datastrukturen i Python. Varje element i listan är en produkt som finns på ett lager. Nedan syns de tre första elementen/objekten i listan.

```json
{ "data": [
    {
      "id": 1,
      "article_number": "1214-RNT",
      "name": "Skruv M14",
      "description": "Skruv M14, värmförsinkad",
      "specifiers": "{\"length\" : \"60mm\", \"width\" : \"14mm\"}",
      "stock": 12,
      "location": "A1B4",
      "price": 10
    },
    {
      "id": 2,
      "article_number": "1212-RNT",
      "name": "Skruv M12",
      "description": "Skruv M12, värmförsinkad",
      "specifiers": "{\"length\" : \"60mm\", \"width\" : \"12mm\"}",
      "stock": 14,
      "location": "A1B5",
      "price": 10
    },
    {
      "id": 3,
      "article_number": "1210-RNT",
      "name": "Skruv M10",
      "description": "Skruv M10, värmförsinkad",
      "specifiers": "{\"length\" : \"60mm\", \"width\" : \"10mm\"}",
      "stock": 20,
      "location": "A1B6",
      "price": 10
    }
]}
```

För att hämta data från API:t med hjälp av Python kan man använda sig av pip-modulen requests (Dokumentation (Länkar till en externa sida.)). Har du inte installerat modulen sen innan kan den installeras med följande kommando i en terminal:

```shell
python3 -m pip install requests
```

Modulen importeras sedan i ett Python script och vi kan använda den inbyggda funktionen GET.

```python
"""
Program that loads a JSON response from a specified URL
Prints first object of the data-list
"""
import requests

URL = 'https://lager.emilfolino.se/v2/products/everything'

# Use requests module to get JSON data
response = requests.get(URL)

# Turns response json object into a Dictionary
products_dict = response.json()

# Prints first object of the data-list
print(products_dict["data"][0])

# Prints name of first object of the data-list
print(products_dict["data"][0]["name"])
```



### Förbereda för driftsättning {#prep}

För att Azures moln ska kunna veta vilka externa moduler vi använder oss och som ska installeras i Azure exporterar vi vår virtual environment med följande kommando i terminalen.

```shell
pip freeze > requirements.txt
```

Vi har nu skapat en fil `requirements.txt` som innehåller de paket vi använder oss av. När vi driftsätter lite senare i denna övningen vet Azures moln om att den ska installera de paket som finns i `requirements.txt`.



Driftsättning i Azures Moln {#cloud}
--------------------------------------

I detta steget ska vi testa att skapa resurser för att köra en web- eller apiapp i Azure, genom att skapa en [Azure App Service](https://docs.microsoft.com/en-gb/azure/app-service/overview) och en [App Service Plan](https://docs.microsoft.com/en-gb/azure/app-service/overview-hosting-plans).

Börja med att logga in på Azures portal - [portal.azure.com](https://portal.azure.com). Här loggar du in med ditt studentkonto.

Längst upp till höger ser du ditt konto, klicka på den och välj den prenumeration som finns tillgänglig för dig: DIDA-{akronym}-DV1615-VT22-LP3



### Skapa en webapp resurs {#webapp}

Det finns flera olika vägar att gå för att skapa upp de resurser vi behöver, enklast är att Klicka på + Skapa resurs.

![Skapa resurs](image/moln/azure_create_resource.png)

Välj sedan att skapa en WebApp:

![Skapa webapp](image/moln/azure_create_webapp.png)

För att kunna skapa resurser i din subscription så behöver du först skapa en resursgrupp att ha dom i, så det är det som definieras först.

Följ övriga inställningar nedan, och välj att skapa upp en ny App Service Plan, och välj Ändra storlek.

Du kommer då till Specifikationsväljaren - välj Dev/Test och prisnivån B1.

Klicka på Använd

Klicka på Granska +  Skapa

![Välj storlek](image/moln/azure_webapp_size.png)

Du får nu upp en summering av dina val och du kan klicka på Skapa.

![Skapa resurs](image/moln/azure_webapp_final.png)



### Koppla Visual Studio Code till Azure {#vscazure}

Vi öppnar upp Visual Studio Code och säkerställer att vi har öppnat den i katalogen med vår Flask app. Klicka på fliken för Azure App Service Extension som vi lade till i det sista steget i uppsättningen av labbmiljön.

Klicka på Sign in to Azure och logga in med ditt studentkonto (xxxx99@student.bth.se).

![Sign in](image/moln/vsc_azure_signin.png)

Du ska nu se texten Select subscription där din prenumeration ska finnas, välj den.

![Sign in](image/moln/vsc_azure_select_sub.png)

Du har nu genom Visual Studio Code tillgång till de Azuretjänster som du har skapat upp i din prenumeration.

Om man av någon anledning valt fel konto eller vill växla mellan konton så används View -> Command Palette -> Azure: Sign Out och sedan gör man om inloggningsförfarandet.

Vi ska nu driftsätta vårt API. Välj den WebApp som du skapat i portalen och högerklicka. Välj sedan Deploy to Web App...

![Deploy](image/moln/vsc_azure_deploy.png)

Välj den folder som appen ligger i lokalt, välj att inte bygga i molnet utan kör det lokalt, och klicka på Deploy.

När Deployment completed visas så kan du klicka på Browse Website och verifiera att det funkar som det ska.

![Completed](image/moln/vsc_azure_completed.png)

I Azure App Service Extension i Visual Studio Code kan man se hur deployment har gått och vilka filer som överförts.

![Content](image/moln/vsc_azure_content.png)

Det går också att använda Kudu genom att lägga till .scm efter namnet på din tjänst.

Så om tjänsten till exempel heter https://dv1615-oce-webapp-lab.azurewebsites.net/ . Så når du Kudu genom https://dv1615-oce-webapp-lab.scm.azurewebsites.net/ .

Eftersom denna PAAS-tjänsten använder Linux i botten så finns BASH för att gå igenom den del i folderstrukturen som finns tillgängligt för oss.



Troubleshooting {#troubls}
--------------------------------------

Ibland vill inte det sig inte med modulen `requests` och då kan nedanstående vara lösningen.

För att få det att funka så kan du behöva låta projektet bygga i Azure istället för lokalt. Det gör du genom att gå in i din webapp i portal.azure.com, välja fliken Configuration -> Application settings -> + New application setting:

Name: SCM_DO_BUILD_DURING_DEPLOYMENT

Value: true

Spara sedan ändringen.

![Build on Azure](image/moln/build_on_azure.png)

Därefter behöver du sannolikt deploya ditt projekt igen. Eftersom bygget nu sker i Azure istället för lokalt så tar det ett tag efter deployment innan bygget är klart och dina ändringar är fullständigt deployade. För mer information se: [Configure a Linux Python app for Azure App Service](https://docs.microsoft.com/en-gb/azure/app-service/configure-language-python).



### Annat namn än app.py {#apppy}

En annan lurig sak som är värt att känna till. Om du döper din apps uppstarts-.py fil till något annat än app.py så behöver du definiera i konfiguration vilken fil som ska köras.Det görs i webappens application settings.

Name: FLASK_APP

Value: {ditt filnamn}.py



Avslutningsvis {#avslut}
--------------------------------------

Vi har i denna övning tittat på hur man använda Flask för att skapa ett API som hämtar data från ett annat API och svarar med JSON. Vi har dessutom tittat på hur vi kan driftsätta API:t i Azures Cloud.
