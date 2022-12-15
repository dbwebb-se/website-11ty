---
author: lew
revision:
    "2017-02-02": (A, lew) First version.
category:
    - oopython
...
Skapa en bondgårdssdatabas
===================================

[FIGURE src=/image/oopython/kmom04/farmer.png?w=c5 class="right"]

Skapa en SQLite-databas över en simulerad liten bondgård i SQLite Manager.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat dig igenom [artiklarna för kursmomentet](oopython/kmom04#ovningar).



Introduktion {#intro}
-----------------------

Du ska skapa 3 tabeller i SQLite Manager. Tabellerna ska fyllas med data enligt kraven nedan.



Krav {#krav}
-----------------------

Bygg vidare på din me-sida, me/flask.

```bash
# Ställ dig i kurskatalogen
cd me/flask
```

1. Skapa en databasfil med namnet "farm.sqlite". Filen ska ligga i `me/flask/db/`

2. Skapa en tabell med namnet "humans" och kolumnerna:  
    * id (unik, auto-increment)  
    * name (varchar)  
    * occupation (varchar)  
    * age (integer)  

Fyll på _humans_ med en ägare och minst 3 anställda personer.  

3. Skapa en tabell med namnet "animals" och kolumnerna:  
    * id (unik, auto-increment)  
    * species (varchar)  
    * name (varchar)  
    * nr_of_legs (integer)  

Fyll på _animals_ med minst 5 djur.  

4. Skapa en tabell med namnet "vehicles" och kolumnerna:  
    * id (unik, auto-increment)  
    * vehicle_type (varchar)  
    * price (float)  

Fyll på _vehicles_ med minst 3 olika typer av fordon.  

5. Se till så att databasfilen ligger i `me/flask/db`.

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

Du kan testa dina tabeller direkt i SQLite Manager med olika queries.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
