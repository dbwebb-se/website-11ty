---
author: mos
category: php
revision:
  "2014-04-21": (A, mos) Första utgåvan inför version 2 av phpmvc-kursen.
updated: "2014-04-21 21:24:47"
created: "2014-04-21 21:24:28"
...
En databasdriven basmodell och hantering av användare
==================================

Du skapar en basklass för databasdrivna modeller och visar att den fungerar genom att implementera ett antal routrar för att administrera CRUD operationer för en User modell.

Du får grunden till kodbasen från ett befintligt kodexempel som du vidareutvecklar med nya funktioner.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

I guiden "[Skapa basklasser för databasdrivna modeller i Anax MVC](kunskap/skapa-basklasser-for-databasdrivna-modeller-i-anax-mvc)" så visas hur du gör för att skapa grunden till kontroller, modell och basklass för modellen User. Gå igenom guiden så har du grunden för uppgiften.



Krav {#krav}
-----------------------

1. Lägg till CDatabase som en tjänst i ditt ramverk.

2. Lägg till CForm som en tjänst i ditt ramverk.

3. Bygg en basklass för databasdrivna modeller, använd CDatabase och CForm. Visa att det fungerar genom att bygga modellen User och en kontroller som stödjer följande routes.
    1. `setup` för att skapa tabell och ett par användare.
    2. `users/add` för att lägga till användare.
    3. `users/list` för att visa samtliga användare.
    4. `users/id/:number` för att visa detaljer om en användare.
    5. `users/delete` för att radera en användare.
    6. `users/update` för att uppdatera informationen om en användare.

4. Det skall vara riktiga HTML-formulär som används för att hantera User.

5. Gör stöd för soft-delete, undo för soft-delete, visa innehållet i papperskorgen samt verklig delete.

6. Gör stöd för att aktivera en användare och inaktivera en användare. Visa lista över de användare som är inaktiva.

7. Visa lista över alla aktiva och icke-raderade användare.

8. Gör en förstasida som är en meny för alla routes. Det skall vara enkelt att testa dem.



Extrauppgift {#extra}
-----------------------

Det finns inga extra uppgifter.



Tips från coachen {#tips}
-----------------------

Lös uppgiften på ditt eget vis.

Använd tiden för att lära dig uppbyggnaden av modulerna CDatabase och CForm samt skapa en så effektiv basklass för modeller som möjligt. Var nyfiken.

**Lycka till och hojta till i forumet om du behöver hjälp!**




