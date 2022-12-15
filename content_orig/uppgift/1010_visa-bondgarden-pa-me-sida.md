---
author: lew
revision:
    "2017-02-02": (A, lew) First version.
category:
    - oopython
...
Visa bondgården på me-sidan
===================================

Knyt ihop delarna från kursmomentet och presentera tabellen på me-sidan.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften "[Skapa en bondgårdsdatabas](uppgift/skapa-en-bondgards-databas).



Introduktion {#intro}
-----------------------

Nu är det dags att presentera databasen "farm.sqlite" och dess tabeller på din me-sida, med hjälp av Flask och SQLAlchemy. Du bestämmer själv hur presentationen ska se ut så länge kraven uppfylls.



Krav {#krav}
-----------------------

Du har databasen i `me/flask/db` så fortsätt arbeta med den och din me-sida.

1. Skapa en ny flik i din navbar där presentationen ska visas, tex "Bondgård".

2. Varje databas-tabell ska representeras av respektive klass i SQLAlchemy.

3. Varje tabell i databasen, "farm.sqlite", ska presenteras med all tillgänglig information, förslagsvis i html-tabeller.  

4. Man ska kunna ta bort en rad ur valfri tabell via en länk och metoden GET.  

5. Man ska kunna lägga till en rad i valfri tabell via ett formulär och metoden POST.  

6. Sidan ska uppdatera informationen direkt, dvs ladda om med det nya innehållet. Det är bara den aktuella tabellen som ska uppdateras och läsas in igen.  


```bash
# Ställ dig i kurskatalogen
dbwebb validate flask
dbwebb publish flask
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

1. Lägg till funktionaliteter som att kunna sortera tabellerna, paginering och max antal rader som visas etc. Skriv en rad i din redovisningstext om vad du gjort.



Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
