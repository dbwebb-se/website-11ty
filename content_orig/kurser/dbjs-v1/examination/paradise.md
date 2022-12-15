---
author:
    - mos
category:
    - kurs dbjs
    - examination
revision:
    "2017-05-04": "(A, mos) Examinationen maj 2017."
...
Examination Maj 5, 2017
=======================================

Detta är den individuella examinationen som är en del av kmom07-10.

Examinationen pågår 9-14 och uppgifterna skall lösas individuellt. Hjälpmedel är tillåtna, inklusive egen dator, access till Internet och tillgång till tidigare kursmoment. 

Du behöver samla ihop minst 7 poäng för att få godkänt. Samla fler poäng för att nå ett högre slutbetyg på kursen.

<!--more-->

Spara all kod i `me/kmom10/exam`.

Se till att koden validerar.



Inledning {#inledning}
---------------------------------------

Du har fått i uppdrag av kunden "Hotel Paradise" att bygga en webbplats för boende, mat, dryck och nöje. Kunden är verksam inom hotellbranschen.



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

Bygg en databas för hotellets rum och rumskategorier. Det finns ett antal rum (namn, beskrivning, kostnad, kategori) och varje rum tillhör en eller flera kategorier.

* Sviten, "Det finaste hotellet kan erbjuda", 100 pengar, kategori: AA, bubbelpool, dubbelrum.
* Maxat, "För den festlige", 50 pengar, kategori A, bubbelpool, dubbelrum.
* Solo, "I brist på annat", 10 pengar, kategori: B, toalett, enkelrum.

Skriv SQL DDL för att skapa tabellerna. Skapa tabellerna.

Skriv en SELECT-sats som visar all information från tabellen för rumskategorierna.

Skapa en lagrad procedur `show` som visar all information om rummen (inklusive kategorierna).

Skapa en webbsida "Rum" som du länkar till från navbaren. Sidan skall visa all information om de rum som finns.

Rita ett ER-diagram över databasmodellen. Spara som `exam/db/er.png`.



###Terminalklient {#terminalcli}

Spara all kod i en ny underkatalog `exam/client`.

Kunden vill ha ett terminalbaserat gränssnitt för att jobba mot databasen. Du skriver det i Node.js.

Skapa en terminalklient som kan startas med `node index.js`. Klienten kan ta argument som krävs för att koppla upp sig mot databasen.

Klienten skall kunna visa följande.

* Visa information om rummen (inklusive dess kategorier).
* Visa information om kategorierna.




Uppgift 2 10p {#u2}
---------------------------------------

I terminalprogrammet, lägg till följande funktioner.

* Höj priset på hotellrummen med 10%
* Sänk priset på hotellrummen med 10%

I webbplatsen, lägg till följande funktioner. Sidan skall synas via navbaren.

* Uppdatera priset på ett rum.

Man skall kunna välja ett rum och sätta dess pris. 



Uppgift 3 20p {#u3}
---------------------------------------

Kunden vill att man skall kunna boka rum via webbplatsen.

Skapa en databastabell som håller koll på vilken dag ett rum är bokat.

Skapa en webbsida (lägg i navbaren) där man kan boka ett rum en viss dag.

Skapa en webbsida (lägg i navbaren) som visar alla bokningar (rummets namn och datum då det är bokat).

Lägg till i terminalklienten att man kan avboka en bokning för ett rum ett visst datum samt att man kan visa samtliga bokningar.



Avslutningsvis {#avslutning}
---------------------------------------

Gör dbwebb validate och publish och passera utan fel.

När du är klar, maila mos@bth.se och ange ditt namn och länken till ditt publicerade kursrepo.
