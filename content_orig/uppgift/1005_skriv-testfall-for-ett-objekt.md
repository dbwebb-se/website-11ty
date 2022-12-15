---
author: lew
revision:
    "2017-01-11": (C, aar) Skrev om krav 2.
    "2016-12-19": (B, lew) Ny uppgift.
    "2016-04-12": (A, lew) Första versionen.
category:
    - oopython
...
Skriv testfall för din kortlek
===================================

Vi ska skapa en fil som går igenom klasserna och unittestar dem.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften "[Skapa objekt efter UML](uppgift/skapa-objekt-efter-uml)" och läst igenom artikeln "[Att skriva unittester](kunskap/att-skriva-unittester)".



Introduktion {#intro}
-----------------------

För att färdigställa produkten behöver den testas. Vi skriver unittester för klasserna med Pythons egna testramverk.



Krav {#krav}
-----------------------

Kopiera din kod från föregående uppgift och utgå från den koden.

```bash
# Ställ dig i kurskatalogen
cd me
cp -ri kmom02/deck/*.py kmom02/test/
cd kmom02/test
touch test_deck.py
```

1. Kopiera in koden från `main.py` där du skapat objekt.

2. Skriv minst fem valfria testfall, minst ett på varje klass.

3. Exekvera alla testfall och se till att alla går igenom.

```bash
# Ställ dig i kurskatalogen
dbwebb validate test
dbwebb publish test
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns inga extrauppgifter


Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
