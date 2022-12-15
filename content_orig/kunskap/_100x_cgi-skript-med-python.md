---
author:
    - mos
category:
    - python
revision:
    "2017-06-09": "(A, mos) Första versionen"
...
CGI-skript med Python
===============================

[WARNING]
Skriv om denna artikel för att visa hur man skapar ett CGI-skript med Python. Innehållet är taget från en tidigare introartikel till Python-kursen där vi använde CGI-skritp som me-sidor.
[/WARNING]

<!--stop-->


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


Det finns en tråd i forumet där du kan [ställa frågor eller bidra med tips och trix](t/6523) rörande tipset.
