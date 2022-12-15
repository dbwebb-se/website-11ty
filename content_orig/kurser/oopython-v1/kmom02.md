---
author: lew
category:
    - oopython
revision:
    "2016-12-16": (D, lew) Updated flask structure.
    "2016-06-01": (C, lew) Fixade något.
    "2016-05-25": (B, aar) Ändrade något.
    "2016-04-12": (A, lew) Första versionen.
...
Kmom02: UML och unittest
====================================

Kom igång med _UML_ och _unittest_. Det är kraftfulla verktyg som används i "riktig" produktionsmiljö. UML kan användas för att beskriva klassernas relation och unittester (enhetstester) används för att testa delar av koden såsom funktioner och metoder.  

Du kommer även skapa klasser utifrån ett färdigt UML-diagram och skriva unittester på dem.

<!--more-->

[FIGURE src=/image/oopython/kmom02/kmom02_top.jpg?w=w2 caption="UML logotyp."]

<!-- Flytta nedan text till eget dokument/vy/block -->

<small>*(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka 20 studietimmar inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)*</small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 8-10 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

[Python 3 Object-oriented Programming](kunskap/boken-python3-object-oriented-programming)  
    * Ch 3 - When Objects Are Alike  
    * Ch 5 - When to use Object-oriented Programming  
    * Ch 12 - Testing Object-oriented Programs


###Artiklar {#artiklar}

Läs följande:

1. [The art of unit testing](http://artofunittesting.com/definition-of-a-unit-test/)  

2. [UML basics på IBM](http://www.ibm.com/developerworks/rational/library/769.html)  



###Video  {#video}

Titta på följande video:  

1. Video om sequence diagrams: [UML Behavioral Diagrams: Sequence - Georgia Tech - Software Development Process](https://www.youtube.com/watch?v=XIQKt5Bs7II).  

2. Videos 12-22 i spellistan [Software Development Process: Part 2 of 3](https://www.youtube.com/watch?v=pZ9-ujSP_48&index=12&list=PLAwxTw4SYaPm8PAGH7ov2Bj-nG4sXgCtJ)  om class diagrams.

3. Video om unittester: [Python Functions 2: Unit Testing](https://www.youtube.com/watch?v=F7a0iUH6kVA)



###Lästips {#lastips}

Det finns inga extra lästips.  



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 8-10 studietimmar)*



###Övningar {#ovningar}

Genomför följande övning för att träna dig.

1. Läs igenom artikeln om UML-diagram "[Vad är UML?](kunskap/vad-ar-uml)".

2. Läs igenom artikeln som handlar om unittest "[Att skriva unittester](kunskap/att-skriva-unittester)".



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

1. Gör uppgiften "[Python med mer Objekt och klasser](uppgift/python-med-mer-objekt-och-klasser)" (lab 2)

2. Gör uppgiften "[Skapa objekt efter UML](uppgift/skapa-objekt-efter-uml)"

3. Gör uppgiften "[Skriv testfall för ett objekt](uppgift/skriv-testfall-for-ett-objekt)".  

4. Gör uppgiften "[Skapa sequence diagram](uppgift/skapa-sequence-diagram)"  

5. Uppdatera din me-sida till version 2 i me/flask. Fördjupa dig i Bootstrap och Flask. Gör uppdateringar som du själv bestämmer. Du måste även dokumentera vad du gjort i din redovisningstext.  

6. Fyll på redovisning.html med kursmomentets redovisningstext.

```bash
# Ställ dig i kurskatalogen
dbwebb validate flask
dbwebb publish flask
```



###Extra {#extra}

1. Gör uppgiften "[Skapa ett klassdiagram](uppgift/skapa-klassdiagram)".



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Är du bekant med UML sedan tidigare?  
* Är du bekant med unittester sedan tidigare?
* Vad gjorde du för uppdatering på me-sidan?
* Kan du se nyttan med UML och tester inom ramen för ett projekt?
* Gick det bra att komma i gång med kursmomentet, var det lagom, för litet, för stort?
* Gjorde du extrauppgiften?
* Vilken del av kursmaterialet (böcker, artiklar, videor, etc) uppskattade du mest?
