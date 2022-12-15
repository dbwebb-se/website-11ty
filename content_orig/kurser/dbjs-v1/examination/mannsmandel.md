---
author:
    - mos
category:
    - kurs dbjs
    - examination
revision:
    "2017-04-12": "(A, mos) Examinationen april 2017."
...
Examination April 12, 2017
=======================================

Detta är den individuella examinationen som är en del av kmom07-10.

Examinationen pågår 13-18 och skall lösas individuellt. Hjälpmedel är tillåtna, inklusive egen dator, access till Internet och tillgång till tidigare kursmoment. 

Du behöver samla ihop minst 30 poäng för att få godkänt. Samla fler poäng för att nå ett högre slutbetyg på kursen.

<!--more-->

Spara all kod i `me/kmom10/exam`.

Se till att koden validerar.



Inledning {#inledning}
---------------------------------------

Du har fått i uppdrag av kunden "Mannsmandel" att bygga en webbplats för enhandel och nöje. Kunden är verksam inom ekologisk jord- och skogsbruk med trädgård.



Uppgift 1 10p {#1}
---------------------------------------

Bygg en webbplats med HTML, CSS och JavaScript till kunden. Webbplatsen skall ha tre sidor (hem, butik, om). Varje sida har sin egen rubrik och en paragraf. Det skall gå att navigera mellan sidorna. Webbplatsen skall ha en gemensam header med en passande bild och stor titel som säger "Mannsmandel Gårdsbutik". Headern skall visas på samtliga sidor. Det skall finnas en gemensam footer för alla sidor som säger "Copyright Mannsmandel". När man klickar på titeln skall något hända med sidan, tex byta bakgrundsfärg eller något annat valfritt.



Uppgift 2 10p {#2}
---------------------------------------

All SQL-kod skall sparas i filen `db.sql` tillsammans med tydliga kommentarer. Se till att man alltid kan köra kan köra hela filen för att sätta upp, eller skapa om, databasen.



###Del 1 5p {#2del1}

Kunden vill ha en ebutik till webbplatsen. De skall visa upp och sälja sina ekologiska produkter. Det finns (för tillfället) fyra produkter som är kopplade till en eller flera produktkategorier enligt följande.

1. Murrig Morotssaft, 10 pengar (drickbart, grönsak).
2. Grön Fräsh Gurkkräm, 10 pengar (grönsak).
3. Gigantiskt Pumpa, 20 pengar (grönsak).
4. Låda tomater i blandade färger, 20 pengar (grönsak).

Rita ett ER-diagram över databasmodellen. Spara som `er.png`.

Skapa en databas `dbjsexam` och en ny användare `user` som har alla rättigheter på databasen via lösenordet `pass`.

Skriv SQL DDL för att skapa tabellerna. Skapa tabellerna.

Skriv en SELECT-sats som visar all information från tabellen för produkterna.

Skriv en SELECT-sats som visar all information från tabellen för produktkategorierna.



###Del 2 5p {#2del2}

Skriv en SELECT-sats som visar all information från produkttabellen inklusive namnen på de kategorier en produkt tillhör. En rad per produkt.



Uppgift 3 10p {#3}
---------------------------------------

Kunden har nya önskemål kring databasen.



###Del 1 5p {#3del1}

Skriv SQL DML för att lägga till en ny produktkategori "jäst".

Skriv SQL DML för att lägga till en ny produkt "Mustig Solrosmust, 30 pengar (drickbart, jäst)".

Skriv SQL DML för att höja alla priserna med 10% på de produkter som kostar mindre än 30 pengar.

Skriv SQL DML för att lägga till kategorin "jäst" till den "Murrig Morotssaft".



###Del 2 5p {#3del2}

Kunden kommer på att den vill lagra antalet produkter som finns att sälja. Gör en ALTER TABLE och lägg till den nya kolumnen och enligt inventarielistan finns det 10 stycken av varje jäst produkt och 5 stycken av varje grönsak.

Gör en ny SELECT-fråga som visar all information från produkttabellen, med eller utan namnen på kategorierna.



Uppgift 4 10p {#4}
---------------------------------------

Kunden vill ha ett terminalbaserat gränssnitt för att jobba mot databasen. Du skriver det i Node.js.



###Del 1 5p {#4del1}

Skapa terminalprogrammet `client.js` som kan:

1. Visa alla produkterna.
1. Visa alla produktkategorier.



###Del 2 5p {#4del2}

Lägg till ett menyval i terminalprogrammet så att man kan höja samtliga priser med 10%.

Lägg till ett menyval så att man kan köpa en produkt. Ett köp skall resultera i att antalet tillgängliga produkter minskas med ett.



Uppgift 5 10p {#5}
---------------------------------------

Bygg en webbserver med Express som kopplar sig till databasen.

Inkludera webbsidorna från första kravet in i Express.

Webbservern skall kunna visa alla produkter.

Webbservern skall kunna visa alla produktkategorier.



Uppgift 6 10p {#6}
---------------------------------------

Det går bra för kunden och de har fått ett centralt lager för sina produkter. Skapa en tabell för det centrala lagret och lägg in alla produkter. För tillfället finns det 100 stycken av varje produkt, i det centrala lagret.

Det har kommit en ny leverans av produkter, från centrallagret till gården. Skapa en lagrad procedur som flyttar ett valbart antal produter från centrallagret till gårdens lager. Man skickar in parametrar som säger vilken produtk det gäller och antalet produkter som skall flyttas.

Den lagrade proceduren skall använda sig av en transaktion.

Lägg till i antingen terminalprogrammet eller i webbservern, så att man kan utföra en flytt av 10 stycken produkter för samtliga produkter, via ett menyval/klick.

Skriv en SQL-sats som visar antalet produkter i gårdens lager.

Skriv en SQL-sats som visar antalet produkter i det centrala lagret.



Avslutningsvis {#avslutning}
---------------------------------------

Gör dbwebb validate och publish och passera utan fel.

Visa upp ditt resultat för en lärare innan du lämnar.
