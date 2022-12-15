---
author: lew
category:
    - oopython
revision:
    "2017-02-27": (B, lew) Removed documentation requirement.
    "2017-02-22": (A, lew) First version.
...
Kmom10: Projekt och examination
====================================



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

[FIGURE src=/image/oopython/kmom10/classified.jpg?w=c5 class="right"]

Du ska skapa en admin-sida till ett företag, "BlackOps Supplies", som hanterar material till sin personal.  

Administratören ska kunna hyra ut material till personalen via ett gränssnitt där hanteringen sköts. Företaget har en förkärlek till Python och Flask så det måste användas. De påminner dig även om att klasser är ett bra medel för att uppnå struktur och kontroll.  

De vill inte avslöja vad för material eller personal de hanterar, det får du veta privat (välja själv). De gillar också Bootstrap, men inte "out-of-the-box", utan vill ha ett mer unikt utseende - efter din egna förmåga.



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas info i specen så kan du själv välja väg, dokumentera dina val i redovisningstexten.

De tre första kraven är obligatoriska och måste lösas för att få godkänt på uppgiften. De tre sista kraven är optionella krav. Lös de optionella kraven för att samla poäng och därmed nå högre betyg.

Varje krav ger max 10 poäng, totalt är det 60 poäng.

Placera din kod i katalogen `me/kmom10/blackops`. Programmet som startar spelet skall heta `app.py`. Du behöver även ha `app.cgi` så det funkar på studentservern. 

###Krav 1: Presentation och struktur {#k1}

1. Använd Bootstrap men kör på ett annat tema än tidigare. Utgå ifrån det och ändra utseendet efter egen förmåga.  

2. Använd Flask och Jinja2 som gränssnitt för hantering och kontroll.  

3. Spara informationen i JSON eller SQLite. Man ska kunna visa upp all information i Flask på ett överskådligt sätt.  

4. Personal och material ska hanteras i klasser med arv. Det ska finnas minst 5 personer och minst 10 typer av material inlagda i databasen vid inlämning. Personalen ska delas in i klassificeringsnivåer. Viss personal ska kunna hämta viss typ av material. Har man exempelvis den högsta klassificerings-nivån kan man hämta allt. Minst antal nivåer är 3.



###Krav 2: Hantering och distribution {#k2}

Sidan används enbart av en administratör, en admin, som kopplar ihop material med behörig personal.  

1. Admin ska bara kunna dela ut material till behörig personal. En person kan hämta flera olika saker.  

2. Admin ska kunna lägga till/ta bort personal.  

3. Admin ska kunna lägga till/ta bort material. Admin bestämmer hur mycket av materialet som finns i lagret.  

4. Admin ska kunna ge/ändra personalens klassificeringsnivå.  



###Krav 3: Övrig funktionalitet {#k3}  

1. Materialet finns i ett lager. Tar det slut kan man inte hämta ut det innan något av samma typ återlämnats. Lagret ska vara en egen klass.  

2. När programmet startar ska en Controllerklass användas från app.py som läser in data från databasen/JSON-filen och skapar objekten som används.  

3. Hanteringen ska enbart ske med hjälp av klasser. En fil = en klass. Inga lösa funktioner ska användas utan styr allt från Controllerklassen.  



###Krav 4: Login (optionell) {#k4}

Admin måste logga in för att kunna lägga till eller ta bort personal/material.  
Skriv användarnamn och lösenord i din redovisningstext.



###Krav 5: Lista (optionell) {#k5}

Använd din egna lista från kmom05 för att hantera objekten i projektet. Använd listan för att sortera materialet respektive personerna.



###Krav 6: Produktifiera (optionell) {#k6}  

1. Skapa ett eget UML-diagram över strukturen (ej genererat). Döp filen till "uml.png".  

2. <strike>Generera dokumentation för den färdiga koden. Döp filen till "doc.html".</strike>  

3. Skriv ett godtyckligt antal enhetstester för dina klasser. Döp testfilerna till "_klassens namn_-test.py".
