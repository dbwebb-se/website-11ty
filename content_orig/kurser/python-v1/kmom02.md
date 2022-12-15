---
author:
    - mos
revision:
  "2017-06-14": (H, efo) Rensade i kurslitteratur och länkade in nytt material.
  "2016-03-15": (G, mos) Tog bort videoserie MonkeyLords och NewBoston.
  "2016-02-22": (F, mos) Lade till videoserien "Lär dig Python".
  "2015-01-30": (E, mos) Länk till läsanvisning appendix 2.
  "2015-01-08": (D, mos) Bort blå ruta med kursutveckling pågår.
  "2014-10-01": (C, mos) Ändrade länken till redovisa-instruktionen.
  "2014-09-03": (B, mos) Första officiella versionen.
  "2014-08-27": (A, mos) Första utgåvan för python kursen.
...
Kmom02: Villkor och loopar
==================================

Vi har bekantat oss med värden, datatyper och variabler och det är nu dags för en introduktion till hur vi kan styra flödet av data i våra program. Först tittar vi på booleska operatorer och hur vi kan använda sant eller falsk för att exekverera olika delar av koden. Efter det introduceras loopar som kan användas för upprepa delar av koden. Till slut är det dags att skriva ditt första lite större program där Marvin skall få lite intelligens när han svarar på frågor.

[FIGURE src=/image/python/py-marvin.png?w=w2 caption="Marvin i Python."]

<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-8 studietimmar)*


###Kurslitteratur  {#kurslitteratur}

Läs följande:

1. [Python for Everybody: Exploring data in Python3](kunskap/boken-python-for-everybody-exploring-data-using-python3)
    * Ch3 Conditional execution
    <!-- * Ch4 Functions -->
    * Ch5 Iteration

<!-- 2. [Invent your games with Python](kunskap/boken-invent-your-own-computer-games-with-python)
    * [Appendix A - Differences Between Python 2 and 3](http://inventwithpython.com/appendixa.html)


Det räcker om du läser ovanstående, men vill du ha lite till och samtidigt lite repetition, så läser du motsvarande kapitel i Think Python.

1. [Think Python: How to Think Like a Computer Scientist](kunskap/boken-think-python-how-to-think-like-a-computer-scientist)
    * Ch3 Functions
    * Ch5 Conditionals and recursion
    * Ch6 Fruitful functions
    * Ch7 Iteration  -->



###Artiklar {#artiklar}

Det finns inga artiklar.



###Video  {#video}

Titta på följande:

1. Videoserien [Lär dig Python](https://www.youtube.com/playlist?list=PLKtP9l5q3ce93pTlN_dnDpsTwGLCXJEpd) är tätt kopplat till kursmaterialet. Kika på de videor som börjar med 2.

2. De videor som följer med och kompletterar kurslitteraturen.

    * [Python for Informatics: Chapter 3 - Conditional execution](https://www.youtube.com/watch?v=VXyRfgnzL2o)
    <!-- * [Python for Informatics: Chapter 4 - Functions](https://www.youtube.com/watch?v=Wdi6lhcrtBU) -->
    * [Python for Informatics: Chapter 5 - Iteration](https://www.youtube.com/watch?v=6KgArgGi6Mk)



###Lästips {#lastips}

Det finns inga lästips.

<!--
1. Bekanta dig kort med verktyget [Pylint](http://www.pylint.org/).

3. Läs de två inledande kapitlen i [Python styleguide](http://legacy.python.org/dev/peps/pep-0008/). Läs så att du får en känsla för vad en styleguide är för ett programmeringsspråk. Använd sedan styleguiden som uppslagsverk.
-->



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 12-16 studietimmar)*


###Övningar {#ovningar}

1. Jobba igenom artikeln/övningen "[Jämförelseoperatorer och booleska värden](kunskap/booleans-och-jamforelseoperatorer)" för att träna på hur värden jämförs i Python. Python-interpretatorn används för att testa koden. Vill du spara någon del av koden så gör du det under `me/kmom02/flow`.

1. Jobba igenom artikeln/övningen "[Villkor och loopar](kunskap/villkor-och-loopar)" för att öva in hur vi kan styra flödet i våra program. De exempelprogram du gör kan du spara i ditt kursrepo under `me/kmom02/flow`.



###Uppgifter {#uppgifter}

Dessa uppgifter skall utföras och redovisas.

<!--
Värden och variabler
Villkor och loopar
Funktioner och strängar
Listor
Dictionaries och Tupler

1. Gör laborationen "[Python med värden och variabler](uppgift/python-med-varden-och-variabler)" för att träna på grunderna i Python. Spara alla filer under `me/kmom02/lab2`.
-->

1. Gör uppgiften "[Python med villkor och loopar](uppgift/python-med-villkor-och-loopar)" för att träna på `if`-satser, `for`- och `while`-loopar. Spara alla filer under `me/kmom02/lab2`.

1. Gör uppgiften "[Din egen chattbot - Marvin - steg 1](uppgift/din-egen-chattbot-marvin-steg-1)", ditt första lite större Pythonprogram där du lär Marvin att svara på frågor. Spara alla filer under `me/kmom02/marvin1`.



###Extra {#extra}

Det finns inga extra uppgifter.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Se till att följande frågor besvaras i redovisningstexten.

* Hur känns syntaxen i Python?
* Är det enkelt att se programmets struktur och vad det gör?
* Har du fått en förståelse för hur loopar och villkor fungerar?
* Hur går det med valideringen av uppgifterna? 
* Är du överens med pylint om eventuella felmeddelanden vid valideringen?
* Hur gick det att utföra uppgifterna, var de enkla eller svåra?
* Gjorde du någon av extrauppgifterna? Berätta om det arbetet isåfall.
