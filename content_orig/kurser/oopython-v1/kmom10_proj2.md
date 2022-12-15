---
author: aar
category:
    - oopython
revision:
    "2017-02-27": (B, lew) Removed documentation requirement and edited req 6.
    "2017-02-22": (A, aar) Första versionen.
...
Kmom10: Projekt och examination
====================================



Projektidé och upplägg {#upplagg}
--------------------------------------------------------------------

[FIGURE src=/image/oopython/kmom10/classified.jpg?w=c5 class="right"]

Du ska skapa sidan "BlackOps", som är ett högkvarter för superhjälteorganisationen *Martel*.

På hemsidan tar du på dig rollen som *Fick Nury*, Martel's strateg. Ditt jobb är att välja ut vilka hjältar som ska bege sig ut på vilka uppdrag och besegra skurkar.



Projektspecifikation {#projspec}
--------------------------------------------------------------------

Utveckla och leverera projektet enligt följande specifikationen. Saknas info i specen så kan du själv välja väg, dokumentera dina val i redovisningstexten.

De tre första kraven är obligatoriska och måste lösas för att få godkänt på uppgiften. De tre sista kraven är optionella krav. Lös de optionella kraven för att samla poäng och därmed nå högre betyg.

Varje krav ger max 10 poäng, totalt är det 60 poäng.

Placera din kod i katalogen `me/kmom10/blackops`. Programmet som startar spelet skall heta `app.py`. Du behöver även ha `app.cgi` så det funkar på studentservern.

###Krav 1 Innehåll {#k1}

1. Det ska finnas två olika typer av karaktärer. Karaktärerna kan skapas och editeras på hemsidan.

2. Karaktärerna kan skickas ut på uppdrag där deras egenskaper används mot varandra för att utse en vinnare. Du väljer själv vad som ska hända. Skapa en egen algoritm som använder egenskaperna för att utse en vinnare.

3. Uppdragen skapas på hemsidan. När ett uppdrag skapas ska det slumpas fram vilka karaktärer som ska besegras på uppdraget.

4. Det ska finnas en klass för resultatet av avklarade uppdrag. Historiken ska presenteras på hemsidan.

5. `app.py` ska jobba mot en `handler/controller` klass som i sin tur styr resten av klasserna. 

6. Karaktärerna måste ha minst tre variabler som påverkar vem som vinner. Ex. liv, skydd och skada.


###Krav 2 Verktyg {#k2}  

1. Hemsidan ska göras med Flask och Jinja2.

2. Karaktärsklasserna, uppdragsklassen och resultatsklassen ska finnas i en SQLitedatabas. Använd SQLAlchemy för att jobba mot databasen.  
Databasfilen ska heta `blackops.sqlite`.

3. Använd Bootstrap till hemsidan, men använd inte out-of-the-box temat. Gör ett unikt utseende för din sida.



###Krav 3 Övrigt {#k3}  

1. Skapa ett klassdiagram över alla klasser. Ska inte automatgenereras utan göras för hand. Döp filen till "uml.png".

2. Skriv ett godtyckligt antal enhetstester för karaktärsklassen och uppdragsklassen. Döp testfilerna till "_klassens namn_-test.py".

3. <strike>Automatgenerera dokumentation för din kod. Döp filen till "doc.html".</strike>



###Krav 4: Bilder (optionell) {#k4}

1. Varje karaktär ska representeras med en bild.

Tänk på att använda bilder med rätt licens eller skapa egna bilder.



###Krav 5: Extra uppdrag (optionell) {#k5}

Uppdragen har också attribut som påverkar karaktärerna som används. Ex. Stålmannen är svagare om han används på ett uppdrag där det finns kryptonit. 



###Krav 6: Risky business (optionell) {#k6}

Fick Nury kan använda sina besparingar för att satsa på om hjältarna kommer vinna uppdragen. Martel betalar ut 100% av satsningen om han klarar uppdraget. Om pengarna tar slut går Fick Nury i konkurs. 
