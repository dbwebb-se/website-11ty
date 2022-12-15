---
author:
    - mos
category:
    - python
revision:
    "2016-02-22": (C, mos) Genomgången, bort med onödig info och in med videor.
    "2016-01-20": (B, mos) Uppdaterad asciinema som refererade till bin/dbwebb.
    "2015-08-25": (A, mos) Flyttad från äldre artikel i tidigare utgåva av python.
...
Kom igång med ditt första program i Python
==================================

[FIGURE src=/image/snapht15/python3.png?w=c5&a=0,50,60,0 class="right"]

Denna artikel visar hur du kommer igång med Python och visar hur du skriver ditt första program i Python. Du får även skriva ett CGI-skript som du kör via webbläsaren.

Allt som allt så hjälper dig denna artikel att komma igång med programmeringsspråket Python.

<!--more-->

[WARNING]
Från och med hösten 2017 finns det en [nyare artikel med samma namn](kunskap/kom-igang-med-ditt-forsta-program-i-python-v2) som du skall läsa istället. Den artikeln tar inte med CGI.
[/WARNING]



Förutsättning {#pre}
-------------------------------

Artikeln är en del av kursen python och förutsätter att du har gjort motsvarande "[Installera Python i terminalen](kunskap/installera-python-i-terminalen)".



###Kursmaterial från GitHub {#material}

I denna kursen jobbar du med exempelprogram och övningar som finns samlade i ett kursrepo, en kurskatalog. Du bör alltså ha ditt kursrepo framför dig nu.

Du kan se allt [innehåll i det så kallade *repositoryt*](https://github.com/mosbth/python) via webbplatens GitHub, det innehåller alla övningar, exempelprogram och tips och trix som finns i det som du nu laddat ned.



Ditt första exempelprogram i Python {#forsta}
-------------------------------

Här är ett fungerande Python-program.

```python
#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
Some various ways of saying Hello World in Python
"""

# Define a function
def hello():
    """
    Print out Hello World in a function.
    """
    print("Hello World in a function.")

# Call a function that prints out Hello World
hello()

# Print out Hello World 
print("Just saying Hello World")

# Assign the string Hello World to a variable and print it out
str = "Hello World in a variable"
print(str)
```

Du kan även se [exempelprogrammet i kursrepot på GitHub](https://github.com/mosbth/python/blob/master/example/hello_world/hello.py).

Använd din vanliga texteditor och ta en kopia av ovanstående program och spara det i din me-katalog för kursmoment 01, `python/me/kmom01/hello/hello.py`. 

```bash
# Gå till din kurskatalog/kursrepo för python
$ cd me/kmom01/hello
$ touch hello.py
$ ls -l hello.py
```

När du är klar kan du provköra ditt python-program via terminalen.

```bash
$ python3 hello.py
```

Du kan också exekvera programmet som ett vanligt program vid terminalen. Men först måste du ge det rättigheter att exekveras. Det gör du med `chmod 755 hello.py`.

```bash
$ chmod 755 hello.py
$ ls -l hello.py

total 4
-rwxr-xr-x 1 mos mos 415 Jul  3 13:07 hello.py*
```

Nu kan du köra programmet på följande sätt.

```bash
$ ./hello.py
```

Om du missar att sätta korrekta rättigheter så får du ett felmeddelande.

```bash
$ ./hello.py
./hello.py: Permission denied.
```

Men förhoppningsvis blir det samma resultat som när du körde `python3 hello.py`.

Så här ser det ut när Kenneth kör igenom övningen. 

[YOUTUBE src=7RWf0788uDE width=630 caption="Kenneth kör igenom det första exempelprogrammet med Python och validerar det."]

Du kan nu testa att lägga in lite egen kod i skriptet. Men ta det försiktigt i början. 

Du har nu ett fungerande python-program som ligger i en egen fil och som du kan exekvera genom att "köra" filen. Ditt första python-program i denna kursen, en bra start.



Validera din kod {#validera}
-------------------------------

När du är klar med ditt `hello.py` så kan du validera det. Validering innebär att programmet `dbwebb` används för att göra statisk kodanalys av ditt program. Tanken är att vi tar hjälp av program som analyserar vår kod och berättar om vi skrivit bra kod eller om koden har förbättringspotential. Låt mig visa ett exempel på hur det fungerar.

```bash
# Ställ dig i kurskatalogen
$ dbwebb validate hello
```

Du får troligen ett fel:

```bash
WARNING. pylint failed: /home/mosstud/dbwebb-kurser/python/me/kmom01/hello/hello.py
************* Module hello
W: 19,0: Redefining built-in 'str'
```

Det är på rad 19, om du ändrar `str` till `str1` så kommer det att gå igenom valideringen. Pröva.

Du kan se hur Kenneth löste det i video ovan och så här ser det ut för mig, när jag gör samma sak vid terminalen.

[ASCIINEMA src=34147]

Validera ofta när du skriver din kod, tills du lärt dig hur koden bör skrivas för att undvika valideringsfelen. 



Inspektera Python med python-kod {#inspekt}
-------------------------------

Verktyget [Pylint](http://www.pylint.org/) används för valideringen och klagade på `str` för att det var en inbyggd funktion. Hur kan man då se vad som är inbyggt i Python? Låt oss kika på det lite snabbt, bara som en övning.

Först de reserverade nyckelorden. Python, likt alla programmeringsspråk, innehåller reserverade ord. Låt oss se om `str` finns bland dem.

[ASCIINEMA src=11568]

Jag använde [modulen keyword](https://docs.python.org/3/library/keyword.html?highlight=keyword#module-keyword) som du kan läsa om i manualen.

Men nej, `str` fanns inte som ett inbyggt nyckelord. Låt oss istället titta bland de inbyggda funktionerna. Funktionen [`dir(modulnamn)`](https://docs.python.org/3/library/functions.html?highlight=dir#dir) listar allt innehåll i en modul.

[ASCIINEMA src=11574]

[Modulen `__builtins__`](https://docs.python.org/3/library/builtins.html?highlight=__builtins__) innehåller de inbyggda funktioner som finns i språket och där fanns `str`. Låt oss kika lite till på vad det `str` är för något.

Den inbyggda funktionen [`help(modul/funktion)`](https://docs.python.org/3/library/functions.html?highlight=help#help) visar hjälptexter om objektet. Låt se vad hjälptexten säger om `str`.

[ASCIINEMA src=11570]

Ah, det är en inbyggd modul för stränghantering. Ok. Då är det dumt att använda det som variabelnamn. 

Sånt här kan Pylint hjälpa oss med, att styra upp vårt kodande så att vi gör mer rätt. Det är alltså Pylint som utför valideringen i form av statisk kodanalys.



Pylint styleguide {#styleguide}
-----------------------------------------------------

Vad är Pylint som säger hur jag skall skriva min kod? Vad ligger bakom Pylints resonemang? 

Python har en egen [styleguide](http://legacy.python.org/dev/peps/pep-0008/) för hur man skall skriva sin kod. Kika gärna i den och använd den som referens under kursens gång. En styleguide är alltid en rekommendation, men det är viktigt att följa en styleguide när man kodar. Pylint använder sig av styleguiden när den kontrollerar din kod.

Valideringen kontrollerar att du följer styleguiden och att det inte finns några uppenbara problem eller felaktigheter med din kod.

Gör ditt bästa för att alltid skriva kod som går igenom valideringen. Annars finns risken att du får komplettera dina redovisningar.

Har du [funderingar om Pylint och hur det används i kursen](/t/2565) så finns det en särskild forumtråd där det diskuteras.



Publicera på studentservern {#publicera}
-------------------------------

När du är klar med dina program kan du publicera dem på studentservern så att vissa delar blir tillgängliga via studenternas webbserver. Det är dock bara dina `cgi`-program som går att köra via webbservern. [CGI-skript](http://en.wikipedia.org/wiki/Common_Gateway_Interface) är en äldre teknik som fanns i webbens barndom, men den är enkel och snabb att lära sig.



###Ett första cgi-skript {#cgi}

Det står i Python-manualen hur man [skapar ett cgi-skript](https://docs.python.org/3/howto/webservers.html#common-gateway-interface) av ett godtyckligt Python-program.

Det handlar alltså om att lägga följande kod i ett skript. 

```python
#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
Execute as cgi-skript and send a correct HTTP header.
"""

# To write pagecontent to sys.stdout as bytes instead of string
import sys
import codecs

# Enable debugging of cgi-.scripts
import cgitb
cgitb.enable()

# Send the HTTP header for plain text or for html
print("Content-Type: text/plain;charset=utf-8")
#print("Content-Type: text/html;charset=utf-8")
print("")

# Here comes the content of the webpage 
content = """
Hello The World of Web
"""

# Write page content
sys.stdout = codecs.getwriter("utf-8")(sys.stdout.detach())
sys.stdout.write(content)
```

Gör så här för att testa.

1. Ta koden ovan och lägg i en ny fil `hello-web.cgi` och spara filen i katalogen `me/kmom01/hello`

2. Validera.

```bash
# Ställ dig i kurskatalogen
$ dbwebb validate hello
```

3\. Bra, nu är det dags att publicera cgi-skriptet på webbservern. Gör så här.

```bash
# Ställ dig i kurskatalogen
$ dbwebb publish hello
```

I slutet av skriptet finns en länk till webbservern. Kopiera den till din webbläsare och leta dig fram till filen `hello-web.cgi` och klicka på den i din webbläsare.

Får du problem så är det säkert ett av de [vanliga problemen med Python och cgi-skript](t/2568).

Så här ser det ut när Kenneth löser uppgiften.

[YOUTUBE src=qGp0XZp8EuY width=630 caption="Kenneth gör ett CGI-script och publicerar på studentservern."]



###Katalog med exempel på cgi-skript {#exempel-cgi}

I ditt kursrepo finns en exempel-mapp `example/cgi` som innehåller ett par cgi-script.

Du kan dels studera källkoden för dem.

Dels kan du testa att de fungerar genom att publicera dem.

```bash
# Ställ dig i kurskatalogen
$ dbwebb publish example
```

Följ länken som skrivs ut och leta dig fram till `example/cgi` och testa de två skripten som heter `serve-as-*.cgi`. Titta på källkoden så ser du hur de är uppbyggda.



###Testa att göra din eget cgi-skript {#eget-cgi}

Testa nu att göra ditt eget cgi-skript. Ta din befintliga fil `hello.py` och gör om den till ett cgi-skript som du publicerar. Lägg det i katalogen `me/kmom01/hello`.

Nu kan du alltså även skapa en webbsida med Python. Bra, bra. Vi kommer inte göra så många sådana, det blir ett par stycken, men jag tänkte att det är lite kul att se hur det fungerar. Det är ett sätt man kan använda Python på. Ett av många.



Hjälp mig online {#hjalp}
-------------------------------

När man kodar behöver man hjälp. Ett sätt är att göra en *fiddle*, ett enkelt exempel-program som visar hur man försöker göra en viss sak. En fiddle är liten och visar enbart det man försöker göra, alla annan kod rensar man bort.

Här är en [fiddle](http://pythonfiddle.com/mos-hello-world-demo) som jag gjort på webbtjänsten [Python Fiddle](http://pythonfiddle.com/). 

Denna typen av länkar är utmärkta att dela med sig av via chatt eller forum. Då kan din hjälpare se precis vad du menar och vad du försöker göra. Då blir det alltid enklare att hjälpa dig och alltid enklare att få hjälp.

Hamnar du i bekymmer? Gör en fiddle och dela med dig av den.

Pröva även verktyg som [Code Share](http://codeshare.io/) och [Gist](https://gist.github.com/). De hjälper dig att dela med dig av din kod.

Här kan du se två exempel på när jag använder dessa tjänster.

* [Hello World på Code Share](http://codeshare.io/jql9s)
* [Hello World på Gist](https://gist.github.com/mosbth/b274bd08aab0ed0f9521)

Men kom i håg. Dela bara med dig av den koden som är problematisk, förenkla för den som skall hjälpa dig. Stora exempelprogram är det få som vill hjälpa till med. Förenkla för den som skall hjälpa dig. Då får du snabbare svar.



Avslutningsvis {#avslutning}
------------------------------

Du har nu gjort ditt första (?) program i Python. Då är det bara att köra vidare med större utmaningar.

Har du fler frågor eller funderingar så tar vi det i [forumet för Python-frågor](forum/viewforum.php?f=44). 
