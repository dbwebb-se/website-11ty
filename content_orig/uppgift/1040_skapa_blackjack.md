---
author: lew 
category: oopython
revision:
    "2017-01-25": (A, lew) Första versionen.
created: "2017-01-25"
...
Skapa ett Black Jack spel
==================================
[FIGURE src=/image/oopython/kmom03/blackjack.jpg?w=c5 class="right"]

Skapa ett objektorienterat Black Jack spel i terminalen. 

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artiklarna "[Kom igång med objekt](kunskap/kom-igang-med-objekt)", "[Klass relationer](kunskap/klass-relationer)" och gjort uppgiften [Skapa objekt efter UML-diagram](uppgift/skapa-objekt-efter-uml).



Introduktion {#intro}
-----------------------
Du kan återanvända klasserna från mappen `deck` i kursmoment 2.  
Det är helt enligt reglerna att ändra på klassfilerna så det passar in och det räcker med att använda en kortlek.  
Starta spelet via en fil du döper till `main.py`.


####Regler {#regler}  

1. Ess räknas som 1  

2. Klädda kort räknas som 10  

3. Övriga kort (2-10) har sitt egna värde 

4. Om spelaren får 21 går turen över till nästa spelare

5. Om spelaren får över 21 är spelaren ute och turen går över till nästa spelare

6. Dealern tar kort automatiskt så länge summan är under 17  



```bash
# Ställ dig i kurskatalogen
cd me
cp -r kmom02/deck/* kmom03/blackjack/
```



Krav {#krav}
-----------------------

1. Vid start ska antal spelare väljas

2. Dealern delar ut 2 kort vardera och ett till sig själv som visas för alla

3. Om spelarens första 2 kort är ett ess och 10 eller klätt kort har spelaren Black Jack och turen går över till nästa

4. Spelet går vidare med spelare 1's tur att välja mellan att stanna eller ta kort

5. När alla spelare gjort sina val är det dealerns tur  

6. När dealern är klar presenteras vinnaren (spelaren med högst summa)



```bash
# Flytta till kurskatalogen
dbwebb validate blackjack
dbwebb publish blackjack
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Lägg till fler funktioner till ditt Black Jack.  

1. Ess räknas som 1 eller 11 

2. Lägg till en funktion för att hantera insats  

3. Lägg till funktionalitet för att dubbla och splitta korten  

4. Lägg till en möjlighet att spara och ladda in ett spel 

5. Om instats är implementerat, lägg till en highscore med spelarna som vunnit mest  

6. Skapa en arvsrelation för spelarna och dealern.



Tips från coachen {#tips}
-----------------------

Debugga och felsök genom att skriva ut variablernas olika innehåll med `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!




