---
author: lew
revision:
    "2017-01-18": (A, lew) First version.
category:
    - oopython
...
Skapa ett dataobjekt till me-sidan
===================================

Bygg ut din me-sida med information om applikationen.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i Python och stränghantering och du har gått igenom övningen "[Flask och jinja2](kunskap/flask-och-jinja2)".



Introduktion {#intro}
-----------------------

Vi lägger till ett dataobjekt till me-sidan som innehåller sid-relaterad information.



Krav {#krav}
-----------------------

**(Om du inte gjort föregående övning först, börja med att [göra den övningen](uppgift/skapa-personobjekt-till-me-sida))**  



Färdig? Bra. Då kan vi fortsätta i mappen me/flask:  

1. Skapa filen "data.py", vilken ska innehålla din dataklass.

2. Fyll på information som du kan använda på din me-sida:  
    * Länkar i navbar
    * Sidans titel
    * Bildlänk(ar)

3. Använd ditt objekt i din me-sida, länkarna, titeln och det som är relevant.  

6. Använd `pyreverse` för att skapa ett klassdiagram. Döp filen till data.png. Spara diagrammet i mappen flask/

7. Använd `pydoc` för att skapa en html-sida. Döp filen till data.html. Lägg filen i mappen flask/


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
