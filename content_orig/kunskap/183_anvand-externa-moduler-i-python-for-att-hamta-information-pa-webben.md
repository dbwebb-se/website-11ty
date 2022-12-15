---
author: mos
category: python
revision:
  "2017-06-21": (E, aar) Gallring inför HT17.
  "2015-03-31": (D, mos) Felstavat till Soup.
  "2015-03-09": (C, mos) Bort med tidsstämpel i ping-exempel.
  "2015-02-03": (B, mos) Info-ruta om att hoppa över SQLite.
  "2014-10-15": (A, mos) Första utgåvan för python kursen.
updated: "2017-06-21 09:05:03"
created: "2014-09-17 08:28:23"
...
Använd externa moduler i Python för att hämta information på webben
==================================

När man jobbar med webbutveckling, eller utveckling i allmänhet, händer det att man vill hämta information från andra webbservrar, bearbeta informationen och lagra undan på filer eller i en databas.

Sådana aktiviteter stödjer Python via interna moduler, eller via moduler som man kan ladda ned och installera.

Låt oss gå igenom ett par vanligt förekommande sätt att, via Python, hämta och bearbeta information som finns på andra servar. 

<!--more-->

När det refereras till exempelprogram i kursrepot så bör du köra och studera respektive exempelprogram. Titta hur programmen är uppbyggda och vad de gör.



Läsa och skriva JSON-filer {#json}
--------------------------------------

JSON är ett format som är vanligt när man hämtar information från webbservrar via så kallade Web API:er. JSON är ett textbaserat format och tittar du på det så känner du troligen igen strukturen, den är inte så skild från Pythons struktur på en dictionary.

Så här ser en JSON-fil ut.

```javascript
{
    "colorsArray": [
        {
            "colorName": "red",
            "hexValue": "#f00"
        },
        {
            "colorName": "pink",
            "hexValue": "#f9f"
        }
    ]
}
```

I Python finns modulen [`json`](https://docs.python.org/3/library/json.html) som hjälper oss att läsa och skriva innehåll till och från en JSON-fil. Modulen konverterar JSONs format till Pythons interna format för datastrukturer. Vi kan alltså jobba med JSON-strukturer precis som vi gör på vanligt sätt med Pythons egna datastrukturer.

Så här ser ett program ut som läser in en JSON-fil enligt ovan.


```python
import json

# Create a file object
jsonfile = open("json.txt", "r")

# Read from file and decode as json
jsonobject = json.load(jsonfile)


# Print out the content from the dict
for color in jsonobject["colorsArray"]:
    print(color["colorName"], color["hexValue"])
```

Så här kan det se ut när man kör liknande kod för att testa grunderna i Pythons json-modul.

[ASCIINEMA src=12233]

I kursrepot för kursen python finns ett exempelprogram som läser och skriver till en JSON-fil. Du kan kika på [exempelkoden via GitHub](https://github.com/mosbth/python/tree/master/example/json).

Så här ser det ut när man kör exempelprogrammet.

[ASCIINEMA src=12232]



Anropa en webbsida och se om den svarar {#ping}
--------------------------------------

Att *pinga* en webbsida vill man göra för att kontrollera att den är uppe och svarar. Kanske vill du ha en kvalitetskontroll på att din webbplats verkligen fungerar och svarar dygnet runt. 

För att pinga en webbplats behöver du skicka en HTTP-request till webbplatsen och ta hand om svaret. Genom att använda den externa [Python-modulen `requests`](http://docs.python-requests.org/en/latest/) kan vi göra detta via ett par rader av Python-kod.


```python
import requests

url = "http://dbwebb.se/humans.txt"
req = requests.head(url)

print("Request to ", url)
print("Recieved status code: ", req.status_code)
```

Modulen `requests` kan du installera, om den saknas, med [Pythons pakethanterare PIP](kunskap/python-pakethantering-med-pip) med följande kommando.

```bash
pip3 install requests
```

Här ser vi en av styrkorna med Python. Men ytterst lite kod kan vi göra kraftfulla saker. I exemplet hämtar vi webbsidan [dbwebb.se/humans.txt](humans.txt) för att kontrollera att webbplatsen svarar.

Egentligen hämtar vi inte hela webbsidan, vi hämtar bara HEAD-delen. Det är mer effektivt eftersom vi enbart är intresserade av statuskoden som returneras.

Så här ser det ut när man kör koden ovan interaktivt i Python.

[ASCIINEMA src=12235]


I kursrepot för kursen python finns ett exempelprogram som pingar en webbsida. Du kan kika på [exempelkoden via GitHub](https://github.com/mosbth/python/tree/master/example/ping).

Så här ser det ut när man kör exempelprogrammet.

[ASCIINEMA src=12234]


<!--
Jobba mot en filbaserad SQL-databas {#sqlite}
--------------------------------------

[INFO]
**Hoppa över SQLite om du inte kan databaser?**

Om du läser artikeln som en del av [kursmoment 06 i Python](python/kmom06) så har du möjlighet att hoppa över delen med SQLite. Du bör kolla exempelkoden och provköra exempelprogrammet, men du behöver inte lära dig, eller installera, SQLite. 
[/INFO]

SQLite är en filbaserad databas som är byggd i C. Flertalet programmeringsspråk har ett interface mot SQLite, så även Python. Python har inbyggt stöd för SQLite via modulen `sqlite3`. Du kan läsa om [Pythons stöd för SQLite](https://docs.python.org/3/library/sqlite3.html) i manualen.

Det är en vanlig modul som man importerar och det finns funktioner för att öppna databasfilen och ställa frågor via frågespråket SQL. Här är ett par kodutdrag från ett exempelprogram som jobbar mote en databas.

```python
import sqlite3

# Create a connection and a cursor
db = sqlite3.connect(dbFile)
dbc = db.cursor()

# Perform SQL queries
dbc.execute("CREATE TABLE IF NOT EXISTS Pings (url TEXT, time TEXT, response INTEGER)")

aTuple = (url, rTime, code)
dbc.execute("INSERT INTO Pings (url, time, response) VALUES (?, ?, ?)", aTuple)
dbc.execute("SELECT url, time, response FROM Pings")

# Loop through a resultset from a SELECT query
for row in dbc:
    print(row)
```

I kursrepot för kursen python finns ett exempelprogram som pingar en webbsida och lagrar undan resultatet i en SQLite-databas. Du kan kika på [exempelkoden via GitHub](https://github.com/mosbth/python/tree/master/example/sqlite).

Så här ser det ut när man kör exempelprogrammet.

[ASCIINEMA src=12875]

-->

Hämta information från en webbtjänst {#api}
--------------------------------------

Att hämta information från en webbplats, via ett publicerat API, kan innebära en HTTP-förfrågan och ett svar i JSON eller XML. Populära samlingsnamn på liknande tekniker är namn som SOAP, RESTful och *web services*. Man kan säga att webbplatsen publicerar ett gränssnitt, ett API, som berättar vad du kan göra och vilken information du kan hämta.

Många sociala webbtjänster har denna typen av API:er för att utvecklare ska kunna koppla in sina egna applikationer mot webbtjänsterna. Det är också ett vanlig sätt att utbyta information mellan olika system där maskinerna pratar sinsemellan.

Vi har redan använt Python-paketet `requests` för att hämta webbsidor. Vi skall nu använda det för att hämta information från en "publicerad tjänst" som levererar svar som ett JSON-objekt.

Tanken är att visa hur du kan hämta och bearbeta information från en webbtjänst.

Webbtjänsten, i detta fallet, ger oss ett citat från Marvin (en figur i boken Liftarens guide till galaxen). Följande länk representerar webbtjänsten:

* [http://dbwebb.se/javascript/lekplats/get-marvin-quotes-using-ajax/quote.php](http://dbwebb.se/javascript/lekplats/get-marvin-quotes-using-ajax/quote.php).

Ett svar från denna länken ges i form av ett citat, levererat i ett JSON-objekt. Det kan se ut så här:

```javascript
{"quote":"\"What's up?\" [asked Ford.] \"I don't know,\" said Marvin, \"I've never been there.\""}
```

Ett enkelt python-skript som hämtar hem dagens citat och skriver ut det, skulle kunna se ut så här.

```python
url = "http://dbwebb.se/javascript/lekplats/get-marvin-quotes-using-ajax/quote.php"

req = requests.get(url)

print("\nThe response status code is:\n", req.status_code)

print("\nThe response body is:\n", req.text)

json = req.json()
print("\nQuote of today is:\n\"{quote}\"\n".format(quote=json["quote"]))
```

I kursrepot för kursen python finns ett exempelprogram som gör precis detta. Du kan kika på [exempelkoden via GitHub](https://github.com/mosbth/python/tree/master/example/quote).

Så här ser det ut när man kör exempelprogrammet.

[ASCIINEMA src=12934]



Scrapa information från en webbsida {#scrape}
--------------------------------------

Att scrapa information från en webbsida innebär att man laddar hem webbsidan och låter ett program gå igenom innehållet på webbsidan för att hämta ut viss information.

För att ta ett exempel. Förstasidan på dbwebb.se visade (*i en tidigare version*) de tre senaste raderna från chatten. Säg nu att du vill åt den informationen för att använda den i något syfte. Bara som exempel alltså.

Innan vi går vidare så vill jag bara poängtera att det inte alltid är önskvärt att scrapa en webbsidas innehåll. Det är inte heller säkert att det är uppenbart tillåtet att göra en sådan sak. Om du implementerar en dålig lösning kan det innebära att du lastar ned webbplatsen med dina requester. Kanske finns det ett API som du bör använda istället? Kanske är du ute och traskar i en grå area av vad som är tillåtet och inte. Innan du försöker scrapa information från en webbsida bör du dubbelkolla att det verkligen är det du vill göra. Sedan bör du implementera sedvanliga cachnings-algoritmer för att undvika att belasta webbplatsen.

Att scrapa dbwebb.se för att hålla koll på chatten hade definitivt varit oönskat och direkt klumpigt sätt att komma åt den informationen på. Men, vi tar det som exempel ändå, bara för att visa hur det fungerar.

Med det sagt så återgår vi raskt till att se hur man gör.

Det första du behöver göra är att installera [paketet BeautifulSoup](http://www.crummy.com/software/BeautifulSoup/) via pip.

```bash
pip3 install beautifulsoup4
```

Sedan kan du använda paketet `requests` för att hämta hem webbsidan och paketet `BeautifulSoup` för att analysera sidan och plocka ut detaljer från den.

```python
import requests
from bs4 import BeautifulSoup

# Get webpage
url = "http://dbwebb.se/"
req = requests.get(url)

# Get the webpage content as a soup
soup = BeautifulSoup(req.text)

# Get all elements looking like <p class="irclog">
ircLog = soup.find_all("p", class_="irclog")
```

Paketet `BeautifulSoup` bygger upp en intern struktur av webbsidan och erbjuder dig att söka igenom strukturen via vissa funktioner.

I kursrepot för kursen python finns ett exempelprogram som plockar ut irc-loggen från dwbebb.se. Du kan kika på [exempelkoden via GitHub](https://github.com/mosbth/python/tree/master/example/scrape).

Så här ser det ut när man kör exempelprogrammet.

[ASCIINEMA src=12935]


<!--
Ta emot argument på kommandoraden {#cli}
--------------------------------------

När man bygger ihop ett skript som körs via kommandoraden så kan det vara behändigt att skicka in alternativ till hur skriptet skall bete sig, så kallade options. Låt mig visa hur jag menar. Som exempel har jag byggt ett skript jag kallar `mynameis.py`.

För att exemplet skall se så riktigt ut som möjligt så lägger jag till skriptet till min sökväg så jag kan köra det som ett vanligt kommando. 

Först kollar jag vilket shell jag använder.

```bash
$ echo $SHELL
/bin/bash
```

Jag har `bash` som shell och då utökar jag sökvägen, min `$PATH`, så här.

```bash
$ PATH="$PATH:$( pwd )"
$ echo $PATH
```

Om du testar och det blir fel med din sökväg så kan du alltid återställa din ursprungliga `$PATH` med följande kommando.

```bash
$ source ~/.bashrc
```

Jag gör även en symbolisk länk till skriptet `mynameis.py` som jag döper till `mynameis`. På det viset blir jag av med ändelsen `.py`. Det gör att det ser ut mer som ett vanligt kommando.

```bash
$ ln -s mynameis.py mynameis
$ ls -l myname*
lrwxrwxrwx 1 mos mos   11 Oct 15 13:42 mynameis -> mynameis.py*
-rwxr-xr-x 1 mos mos 3735 Oct 15 14:31 mynameis.py*            
```

Om du inte fixar till sökvägen kan du fortfarande köra skriptet precis som vanligt med följande rad.

```bash
$ ./mynameis.py
```

Det går bra det också. Men visst ser det snyggare ut när man lagt skriptet i sökvägen och utan ändelsen `.py`?

I kursrepot för kursen python finns `mynameis` med som exempelprogram. Du kan kika på [exempelkoden via GitHub](https://github.com/mosbth/python/tree/master/example/cli).

Så här ser det ut när jag använder skriptet i kursrepot och förbereder genom att lägga in sökvägen till katalogen skriptet ligger i.

[ASCIINEMA src=12965]

Nu kan vi se vad skriptet, eller kommandot, `mynameis` klarar av.

[ASCIINEMA src=12966]

Som du kan se av källkoden så blir det snabbt ett par rader kod när man vill göra något "riktigt". Men om man alltid använder sig av en sådan struktur så blir det enklare att bygga ut sina skript. Det är trots allt inte mycket som behövs för att göra skriptet till ett mer robust kommando som också blir enklare att bygga ut och underhålla i längden.

Hanteringen av options beskrivs i [manualen för `getopt`](https://docs.python.org/3/library/getopt.html) och i [boken Dive Into Python har ett kapitel](http://www.diveintopython.net/scripts_and_streams/command_line_arguments.html) om detta.

-->


Avslutningsvis {#avslutning}
--------------------------------------

Du har nu fått ett par exempel på hur du kan lägga till moduler till Python och hur du kan bygga ut enkla skript till mer kompletta kommandon. Här har du en av Pythons styrkor som en blandning av riktigt programmeringsspråk och enklare skripthantering.

Fråga gärna, eller kommentera artikeln i forumet. Artikeln har en [egen tråd](t/2973). 
