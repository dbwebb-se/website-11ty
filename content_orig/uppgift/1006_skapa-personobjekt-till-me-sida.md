---
author: lew
revision:
    "2017-01-18": (A, lew) First version.
category:
    - oopython
...
Skapa ett person-objekt till me-sidan
===================================

Bygg ut din me-sida med information om dig själv.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i Python och stränghantering och du har gått igenom övningen "[Flask och jinja2](kunskap/flask-och-jinja2)".



Introduktion {#intro}
-----------------------

För att kunna styra innehållet i me-sidan på ett smidigt sätt, bygger vi ut den med ett person-objekt som innehåller lite information om dig själv.



Krav {#krav}
-----------------------

Jobba vidare med din me-sida, me/flask.

```bash
# Ställ dig i kurskatalogen
cd me/flask
```
1. Bygg om din sida så du använder Jinja2 och återanvänder din header och footer.  

2. Skapa filen "person.py", vilken ska innehålla din personklass.

3. Fyll på med information som du ska använda på din me-sida:  
    * Förnamn
    * Efternamn
    * Ålder
    * Adress
    * Godtyckliga metoder för att underlätta utskrift.

4. Använd ditt objekt i about.html och presentera dig själv

5. Använd `pyreverse` för att skapa ett klassdiagram. Döp filen till person.png och lägg den i mappen flask/

6. Använd `pydoc` för att skapa en html-sida. Döp filen till person.html. Lägg filen filen i mappen flask/



```bash
# Ställ dig i kurskatalogen
dbwebb validate flask
dbwebb publish flask
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter.



Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
