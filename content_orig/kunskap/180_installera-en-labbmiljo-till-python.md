---
author: mos
category: labbmiljo
revision:
  "2015-08-25": (G, mos) Ersatte artikeln med två andra artiklar, samma information.
  "2015-01-19": (F, mos) Mindre stavfel i en kommentar.
  "2014-08-31": (E, mos) Ändrade innehållet i cgi-exemplets kod, motsvarar kurspepot
    v1.0.1.
  "2014-08-25": (D, mos) La till video om hur jag initierade kursrepot samt länk till
    felsökning cgi.
  "2014-08-21": (C, mos) Uppdaterad med kod för cgi-skript.
  "2014-08-19": (B, mos) Uppdaterad och genomgången inför kursstarten.
  "2014-07-03": (A, mos) Första utgåvan i samband python-kursen.
updated: "2015-08-25 12:30:24"
created: "2014-07-01 12:25:14"
...
Installera en labbmiljö till Python
==================================

Så, du vill lära dig att programmera med Python? Trevligt! 

Låt oss då börja med en labbmiljö samt orientera oss bland de resurser som behövs för att komma i gång.

<!--more-->

[INFO]
Denna artikel är från och med hösten 2015 ersatt av tre artiklar som tar upp samma information.

* [Installera en labbmiljö till python](python/labbmiljo)
* [Installera Python i terminalen](kunskap/installera-python-i-terminalen)
* [Kom igång med ditt första program i Python](kunskap/kom-igang-med-ditt-forsta-program-i-python)

[/INFO]



Installera webbläsaren {#install-ff}
-------------------------------

Du behöver en webbläsare för att öppna labbanvisningar och för att testa vissa av dina program som kommer att publiceras på en webbserver. 

Se till att du installerar en webbläsare, ta Firefox, Chrome, Safari eller Internet Explorer. Du kan ta vilken som. Vi kommer inte att göra något avancerat på webben.

Har du svårt att välja så rekommenderar jag Firefox eller Google Chrome.



Installera en texteditor {#install-edit}
-------------------------------

Du behöver en texteditor. Om du behöver hjälp att installera en så finns det i artikeln "[Installera en texteditor, jEdit](kunskap/installera-en-texteditor-jedit)". 

Använd alltid UTF-8 som teckenkodning och Unix-stil på radbrytningar samt tab-storlek 4 och *soft tabs*. Är du osäker på vad det betyder? Läs ovan artikel om jEdit. Artikeln innehåller även förslag på alternativa texteditorer.



En terminal {#terminal}
-------------------------------

Du behöver en terminal för att jobba med kursens material. Dessutom behöver du ett par program installerade som du kan köra via terminalen. Det är program som vi installerar via pakethantering. 

Läs igenom följande artikel "[Kom i gång med terminalen](kunskap/kom-i-gang-med-terminalen-som-verktyg-for-webbutvecklaren)" och se till att bekanta dig med ett terminalprogram för din miljö. Innan du går vidare behöver du ett fungerande terminalprogram.

Du behöver ha följande paket installerade.

```bash
rsync git wget nano
```

Dubbelkolla att de är installerade, eller installera dem, genom att köra följande kommando i terminalen.

Cygwin på Windows:

```bash
apt-cyg install rsync git wget nano
```

Mac OS:

```bash
brew install git
brew install wget
```

Linux (debian):

```bash
apt-get install rsync git wget nano
```

Är du osäker på terminalen och Unix-kommandon så kan du jobba igenom artikeln "[20 steg för att komma i gång med Unix och terminalen](kunskap/20-steg-for-att-komma-i-gang-med-unix-och-terminalen)".



Installera Python i terminalen {#terminal}
-------------------------------

Ett vanligt sätt att utveckla med Python är att ha det installerat och tillgängligt via terminalen. Det är det alternativet som vi kommer att jobba med under kursens gång.

Installera nu Python version 3 (python3) i din terminal.

Cygwin på Windows:

```bash
apt-cyg install python3
```

Mac OS:

```bash
brew install python3
```

Linux (debian):

```bash
apt-get install python3
```

Testa att det gick bra genom att skriva kommandot `python3` i terminalen. Du är nu i interpretatorn för Python. Det kan se ut så här:

```python
$ python3                                  
Python 3.3.3 (default, Jan  2 2014, 19:09:02)                            
[GCC 4.8.2] on linux                                                     
Type "help", "copyright", "credits" or "license" for more information.   
>>> print("Hello World")                                                 
Hello World                                                              
>>> 40+2
42
>>>                                                                   
```

Tryck CTRL-D för att avsluta programmet och återgå till terminal-prompten. Eller anropa funktionen [`exit()`](https://docs.python.org/3/library/constants.html?highlight=exit#exit). Allt du skriver i interpretatorn tolkas som Python-kod. Skriver du rätt körs koden annars får du ett felmeddelande.

Nu har du Python på din dator.

Kika kort på Robin när han kommer i gång med Python. Bara som en kort intro. Testa att skriva lite python-kod så att du känner dig hemma i terminalen och python.

[YOUTUBE src=ZntSsAWg2ho width=630 caption="Robin kodar runt lite i Python."]



Kursmaterial från GitHub {#material}
-------------------------------

I denna kursen jobbar du med exempelprogram och övningar som finns samlade i ett kursrepo, en kurskatalog. Öppna nu din terminal och hämta kursrepot för kursen python.

Är dett första gången du gör detta så behöver du läsa igenom artikeln "[Kurskatalogen, ett kursrepo på Github](kunskap/kurskatalogen-ett-kursrepo-pa-github)".

Enligt artikeln kör du alltså följande kommandon för att ladda hem ditt kursrepo.

```bash
mkdir ~/dbwebb-kurser
cd ~/dbwebb-kurser
git clone https://github.com/mosbth/python.git
cd python
bin/dbwebb init
ls
```

Nu har du allt material i kursrepot framför dig.

Du kan även se allt [innehåll i det så kallade *repositoryt*](https://github.com/mosbth/python) via webbplatens Github, det innehåller alla övningar, exempelprogram och tips och trix som finns i det som du nu laddat ned. Där finns även en struktur som du skall följa när du gör dina inlämningar, det är det som kallas din me-sida, eller me-katalog. Men, vi tar mer om det när du väl gör uppgifterna.

Se hur jag gjorde.

[YOUTUBE src=EqgidcSZ_74 width=630 caption="Mikael kommer i gång med kursrepot för kursen."]



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
# Gå till rooten för din kurskatalog för python
# Normalt så här:
# cd ~/dbwebb-kurser/python
cd me/kmom01/hello
touch hello.py   # Skapar filen
```

Nu kan du redigera filen med din texteditor, jedit eller vad du valt för texteditor. Eller så prövar du att  använda den terminalbaserade texteditorn *nano*. Det är bra att kunna en terminalbaserad editor, även om det troligen inte är första alternativet för att skriva dina python-program.

```bash
# Editera filen med din texteditor och lägg dit koden ovan
# Eller testa att göra det med terminalen via nano
nano hello.py
```

När du är klar kan du provköra ditt python-program via terminalen.

```bash
python3 hello.py
```

Du kan också exekvera programmet som ett vanligt program vid terminalen. Men först måste du ge det rättigheter att exekveras. Det gör du med `chmod 755 hello.py`.

```bash
chmod 755 hello.py
ls -l hello.py

total 4
-rwxr-xr-x 1 mos mos 415 Jul  3 13:07 hello.py*
```

Nu kan du köra programmet på följande sätt.

```bash
./hello.py
```

Om du missar att sätta korrekta rättigheter så får du ett felmeddelande.

```bash
desktop:~/dbwebb-kurser/python/me/kmom01/hello> ./hello.py
./hello.py: Permission denied.
```

Men förhoppningsvis blir det samma resultat som när du körde `python3 hello.py`.

Så här ser det ut när jag kör igenom övningen.

<script type="text/javascript" src="https://asciinema.org/a/11633.js" id="asciicast-11633" async></script>

Du kan nu testa att lägga in lite egen kod i skriptet. Men ta det försiktigt i början. 

Du har nu ett fungerande python-program som ligger i en egen fil och som du kan exekvera genom att "köra" filen.
 Ditt första python-program i denna kursen.



Validera din kod {#validera}
-------------------------------

När du är klar med ditt `hello.py` så kan du validera det. Validering innebär att programmet `bin/dbwebb` används för att göra statisk kodanalys av ditt program. Tanken är att vi tar hjälp av program som analyserar vår kod och berättar om vi skrivit bra kod eller om koden har förbättringspotential. Låt mig visa ett exempel på hur det fungerar.

```bash
# Ställ dig i rooten av kurskatalogen python
bin/dbwebb validate hello
```

Du får troligen ett fel:

```bash
WARNING. pylint failed: /home/mosstud/dbwebb-kurser/python/me/kmom01/hello/hello.py
************* Module hello
W: 19,0: Redefining built-in 'str'
```

Det är på rad 19, om du ändrar `str` till `str1` så kommer det att gå igenom valideringen. Pröva.

Så här ser det ut för mig.

<script type="text/javascript" src="https://asciinema.org/a/11578.js" id="asciicast-11578" async></script>

Verktyget [Pylint](http://www.pylint.org/) används för valideringen och klagar här på `str` för att det var en inbyggd funktion. Hur kan man då se vad som är inbyggt? Låt oss kika på det lite snabbt, bara som en övning.

Först de reserverade nyckelorden. Python, likt alla programmeringsspråk, innehåller reserverade ord. Låt oss se om `str` finns bland dem.

<script type="text/javascript" src="https://asciinema.org/a/11568.js" id="asciicast-11568" async></script>

Jag använde [modulen keyword](https://docs.python.org/3/library/keyword.html?highlight=keyword#module-keyword) som du kan läsa om i manualen.

Men nej, `str` fanns inte som ett inbyggt nyckelord. Låt oss istället titta bland de inbyggda funktionerna. Funktionen [`dir(modulnamn)`](https://docs.python.org/3/library/functions.html?highlight=dir#dir) listar allt innehåll i en modul.

<script type="text/javascript" src="https://asciinema.org/a/11574.js" id="asciicast-11574" async></script>

[Modulen `__builtins__`](https://docs.python.org/3/library/builtins.html?highlight=__builtins__) innehåller de inbyggda funktioner som finns i språket och där fanns `str`. Låt oss kika lite till på vad det `str` är för något.

Den inbyggda funktionen [`help(modul/funktion)`](https://docs.python.org/3/library/functions.html?highlight=help#help) visar hjälptexter om objektet. Låt se vad hjälptexten säger om `str`.

<script type="text/javascript" src="https://asciinema.org/a/11570.js" id="asciicast-11570" async></script>

Ah, det är en inbyggd modul för stränghantering. Ok. Då är det dumt att använda det som variabelnamn. 

Sånt här kan Pylint hjälpa oss med, att styra upp vårt kodande så att vi gör mer rätt. Det är alltså Pylint som utför valideringen i form av statisk kodanalys.

Python har en egen [styleguide](http://legacy.python.org/dev/peps/pep-0008/) för hur man skall skriva sin kod. Kika gärna i den och använd den som referens under kursens gång. En styleguide är alltid en rekommendation, men det är viktigt att följa en styleguide när man kodar. Pylint använder sig av styleguiden när den kontrollerar din kod.

Valideringen kontrollerar att du följer styleguiden och att det inte finns några uppenbara problem eller felaktigheter med din kod.

Gör ditt bästa för att alltid skriva kod som går igenom valideringen. Annars finns risken att du får komplettera dina redovisningar.

Har du [funderingar om Pylint och hur det används i kursen](/t/2565) så finns det en särskild forumtråd där det diskuteras.



Publicera på studentservern {#publicera}
-------------------------------

När du är klar med dina program kan du publicera dem på studentservern så att vissa delar blir tillgängliga via studenternas webbserver. Det är dock bara dina `cgi`-program som går att köra via webbservern. [CGI-skript](http://en.wikipedia.org/wiki/Common_Gateway_Interface) är en äldre teknik som fanns i webbens barndom, men den är enkel och snabb att lära sig.



###Ett första cgi-skript {#cgi}

Det står i Python-manualen hur man [skapar ett cgi-skript](https://docs.python.org/3/howto/webservers.html#common-gateway-interface) av ett godtyckligt Python-program.

Det handlar alltså om att lägga följande kod överst i ditt skript. 

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
# Ställ dig i rooten av kurskatalogen python
bin/dbwebb validate hello
```

3\. Bra, nu är det dags att publicera cgi-skriptet på webbservern. Gör så här.

```bash
# Ställ dig i roten av kurskatalogen python
bin/dbwebb publish hello
```

I slutet av skriptet finns en länk till webbservern. Kopiera den till din webbläsare och leta dig fram till filen `hello-web.cgi` och klicka på den i din webbläsare.

Får du problem så är det säkert ett av de [vanliga problemen med Python och cgi-skript](t/2568).



###Katalog med exempel på cgi-skript {#exempel-cgi}

I ditt kursrepo finns en exempel-mapp `example/cgi` som innehåller ett par cgi-script.

Du kan dels studera källkoden för dem.

Dels kan du testa att de fungerar genom att publicera dem.

```bash
# Ställ dig i roten av kurskatalogen python
bin/dbwebb publish example
```

Följ länken som skrivs ut och leta dig fram till `example/cgi` och testa de två skripten som heter `serve-as-*.cgi`. Titta på källkoden så ser du hur de är uppbyggda.



###Testa att göra din eget cgi-skript {#eget-cgi}

Testa nu att göra ditt eget cgi-skript. Ta din befintliga fil `hello.py` och gör om den till ett cgi-skript som du publicerar. Lägg det i katalogen `me/kmom01/hello`.

Felsökning i webb-miljön är en historia för sig. Fråga i forumet om du fastnar. Vi ska inte göra så många cgi-skript så det kommer säkert att gå bra.

Nu kan du alltså även skapa en webbsida med Python. Bra, bra. Vi kommer inte göra så många sådana, det blir ett par stycken, men jag tänkte att är lite kul att se hur det fungerar. Det är ett sätt man kan använda Python på. Ett av många.



Python IDE {#ide}
-------------------------------

Vi har redan kommit i gång och skrivit vårt första program i Python och kört det i terminalen. Det är nödvändigt att veta hur man jobbar med Python på terminalnivå.

Det finns också ett IDE, en utvecklingsmiljö, som du får med när du [installerar Python](https://www.python.org/download/) från den officiella webplatsen.

Det är alltså ett alternativt sätt att installera Python på och verktyg att utveckla program i. När du gör kör den installationen får du ett fönsterbaserat IDE, ett enklare utvecklingsverktyg med fönster som öppnas för interpretatorn tillsammans med en enklare editor.

Pröva gärna att ladda hem det och installera på din maskin och se vad du tycker om det. Kanske tycker du att det är enklare att utveckla med grafiska verktyg istället för att använda terminalen?

Här är en introduktionsvideo som visar hur du kommer igång med Python IDLE.

[YOUTUBE src=bOvqYw1SZJg width=630 caption="Video som visar hur du kommer igång och skriver dina program i Python IDLE."]

Pröva gärna båda vägarna, Python IDLE och terminalen, så att du vet hur de fungerar. I kursen använder jag själv terminalen när jag kör mina program. Så det får bli *standard* för kursen. Men det finns inget som hindrar att du prövar andra verktyg, men blir det problem så ser du alltid till att köra programmet i terminalen. Vi behöver en gemensam bas att stå på.



Resurser och manualer {#resurser}
-------------------------------

När det gäller dokumentation så försöker vi hålla oss till [dokumentationen via den officiella webbplatsen](https://www.python.org/doc/) och dess resurser så långt det går. Vi använder framförallt dokumentation av Python 3 som bas.

Bekanta dig med [dokumentationen för Python 3](https://docs.python.org/3/) på webbplatsen. Titta speciellt på följande:

* [The Python Tutorial](https://docs.python.org/3/tutorial/index.html)
* [The Python Standard Library](https://docs.python.org/3/library/index.html)

Pröva att använda sökfunktionen.

Detta är källan till din kunskap i Python. Bli vän med manualen och återvänd dit när du har funderingar.



Python 2 eller Python 3 {#py23}
-------------------------------

Python finns i många versioner men det finns en liten större skillnad mellan Python 2 och Python 3. I de flesta operativsystem är det fortfarande version 2 som används när man skriver `python`. Man behöver explicit skriva `python3` för att använda version 3.

Du kan läsa om [skillnaderna mellan Python 2 och Python 3](https://wiki.python.org/moin/Python2orPython3). I denna kursen använder vi Python 3.

I vissa av böckerna, och resten av kursmaterialet, så kan det finnas kod som gäller för Python 2, men oftast finns det kommentarer som säger hur koden ser i ut i Python 3. Det är inte så stora skillnader. Mest märkbart är hur man skriver `print` och `input`. Men det hanteras alltså i kurslitteraturen.

Som Python-programmerare behöver man kunna använda både version 2 och 3, så det är bara att gilla att läget är sådant här.



Hjälp mig online {#hjalp}
-------------------------------

När man kodar behöver man hjälp. Ett sätt är att göra en *fiddle*, ett enkelt exempel-program som visar hur man försöker göra en viss sak. En fiddle är liten och visar enbart det man försöker göra, alla annan kod rensar man bort.

Här är en [fiddle](http://pythonfiddle.com/mos-hello-world-demo) som jag gjort på webbtjänsten [Python Fiddle](http://pythonfiddle.com/). 

Denna typen av länkar är utmärkta att dela med sig av via chatt eller forum. Då kan din hjälpare se precis vad du menar och vad du försöker göra. Då blir det alltid enklare att hjälpa dig och alltid enklare att få hjälp.

Hamnar du i bekymmer? Gör en fiddle och dela med dig av den.

Pröva även verktyg som [Code Share](http://codeshare.io/) och [Pastebin](http://pastebin.com/). De hjälper dig att dela med dig av din kod.

Här kan du se två exempel på när jag använder dessa tjänster.

* [Hello World på Code Share](http://codeshare.io/jql9s)
* [Hello World på Pastebin](http://pastebin.com/GscwWg5D)

Men kom i håg. Dela bara med dig av den koden som är problematisk, förenkla för den som skall hjälpa dig. Stora exempelprogram är det få som vill hjälpa till med. Förenkla för den som skall hjälpa dig. Då får du snabbare svar.



Avslutningsvis {#avslutning}
------------------------------

Du har nu grunderna som krävs för att sätta igång och programmera med Python.

Har du fler förslag eller tips så tar vi det i forumet som har en [egen tråd](t/2495) för denna artikeln.
