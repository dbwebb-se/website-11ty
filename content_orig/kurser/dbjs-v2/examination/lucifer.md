---
author:
    - mos
category:
    - kurs dbjs
    - examination
revision:
    "2017-11-24": "(A, mos) Examinationen november 2017."
...
Examination November 24, 2017
=======================================

Detta är den individuella examinationen som är en del av kmom07-10.

Examinationen pågår 9-14 och uppgifterna skall lösas individuellt och du får inte prata, diskutera eller chatta med någon för att ta hjälp. Fråga läraren om något är oklart med uppgifterna.

Övriga hjälpmedel är tillåtna, inklusive egen dator, access till Internet och tillgång till tidigare kursmoment.

Du behöver samla ihop minst 7 poäng för att få godkänt. Samla fler poäng för att nå ett högre slutbetyg på kursen.

<!--more-->

Spara all kod i `me/kmom10/exam`.

Se till att koden validerar.



Inledning {#inledning}
---------------------------------------

Du har fått i uppdrag av kunden "Lucifer Morningstar" att bygga en webbplats till hans nattklubb Lux. Kunden är verksam inom en bransch av nöjen, begär och bestraffning.



Uppgift 1 10p (obligatorisk) {#u1}
---------------------------------------



###En webbplats med express.js {#webbplats}

Spara all kod i en ny underkatalog `exam/server`.

Servern startas med `node index.js`.

Servern kan ta argument som krävs för att koppla upp sig mot databasen.

Använd express.js och bygg en webbplats till kunden. Stylesheet och JavaScript skall ligga i separata filer.

Alla sidor skall ha en gemensam header, navbar och footer.

Headern skall innehålla en rubrik och en bild som är representativ.

Navbaren innehåller länkar till "Hem" som är förstasidan och till en "Om"-sida.

Förstasidan innehåller en mening säljande text om webbplatsen tillsammans med en representativ bild på hotellet.

Om man klickar på bilden (på förstasidan) så skall den rotera 180 grader (säljarna har sagt att detta skapar intresse för webbplatsen). Klickar man en gång till så roterar bilden tillbaka.

Sidan "Om" innehåller en rad text om kunden tillsammans med en bild.

Footern skall innehålla en text om copyright samt länk till sidan "Cookies".

Sidan "Cookies" innehåller texten "Denna webbplats använder inte cookies.".



###Databas med rum {#dbrum}

All SQL-kod skall sparas i filen `exam/db/db.sql` tillsammans med tydliga kommentarer. Se till att man alltid kan köra kan köra hela filen för att sätta upp, eller skapa om, databasen.

Skapa en databas `dbjsexam` och en ny användare `user` som har alla rättigheter på databasen via lösenordet `pass`.

Bygg en databas för nattklubbens produkter och produktkategorier. Det finns ett antal produkter (namn, beskrivning, kostnad, kategori) och varje produkt tillhör en eller flera kategorier.

Följande produkter skall finnas.

* All-inclusive, "Det finaste Lux kan erbjuda", 100 pengar, kategori: pleasure, punishment, wishful.
* Punishment, "För den som vill bli bestraffad", 50 pengar, kategori: punishment.
* What-do-you-desire, "En enmanshow med Lucifer om dina framtidsplaner", 30 pengar, kategori: wishful.

Skriv SQL DDL för att skapa tabellerna. Skapa tabellerna.

Skriv en SELECT-sats som visar all information från tabellen för kategorierna.

Skapa en lagrad procedur `showit` som visar all information om produkterna (inklusive kategorierna).

Skapa en webbsida "Produkter" som du länkar till från navbaren. Sidan skall visa all information om de produkter som finns.

Rita ett ER-diagram över databasmodellen. Spara som `exam/db/er.png`.



###Terminalklient {#terminalcli}

Spara all kod i en ny underkatalog `exam/client`.

Kunden vill ha ett terminalbaserat gränssnitt för att jobba mot databasen. Du skriver det i Node.js.

Skapa en terminalklient som kan startas med `node index.js`. Klienten kan ta argument som krävs för att koppla upp sig mot databasen.

Klienten skall kunna visa följande.

* Visa information om produkterna (inklusive dess kategorier).
* Visa information om kategorierna.




Uppgift 2 10p {#u2}
---------------------------------------

I terminalprogrammet, lägg till följande funktioner.

* Höj priset på produkt med 10%
* Sänk priset på produkt med 10%

I webbplatsen, lägg till följande funktioner. Sidan skall synas via navbaren.

* Uppdatera priset på en produkt.

Man skall kunna välja en produkt och sätta dess pris. 



Uppgift 3 20p {#u3}
---------------------------------------

Kunden vill att man skall kunna beställa en produkt via webbplatsen.

Skapa en databastabell som håller koll på vilken dag en produkt är bokat.

Skapa en webbsida (lägg i navbaren) där man kan boka en produkt en viss dag.

Skapa en webbsida (lägg i navbaren) som visar alla bokningar (produktens namn och datum då det är bokat).

Lägg till i terminalklienten att man kan avboka en bokning för ett rum ett visst datum samt att man kan visa samtliga bokningar.



Avslutningsvis {#avslutning}
---------------------------------------

Gör dbwebb validate och publish och passera utan fel.

När du är klar, maila mos@bth.se och ange ditt namn och länken till ditt publicerade kursrepo.
