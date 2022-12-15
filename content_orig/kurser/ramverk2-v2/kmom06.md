---
author:
    - mos
    - efo
revision:
    "2019-02-06": "(B, efo) Uppdaterad för ramverk2 v2."
    "2018-06-08": "(prel, mos) Nytt dokument inför uppdatering av kursen."
    "2017-12-05": "(A, mos) Första utgåvan."
...
Kmom06: Dokumentorienterad databas
==================================

Vi skall se hur vi kan jobba med databasen MongoDB, en dokumentorienterad databas som klassas i NoSQL-gruppen av databaser. För att koppla oss till databasen använder vi klienter i terminalen och kod i Node.js, med och utan Express.

Vi knyter samman alla delar med hjälp av Docker. Vi installerar MongoDB i en kontainer och vi kör Express i en egen kontainer och låter de båda kontainrarna kommunicera, samtidigt som vi kan kommunicera direkt med varje kontainer från terminalen.

<!--more-->

[FIGURE src=image/snapht17/kmom05-summary.png?w=w3 caption="Databasen MongoDB tillsammans med klient, express och samlad i Docker."]

I följande asciinema kan du se flödet hur man jobbar med Docker i olika kontainerar för Express och MongoDB och hur man på olika sätt kan koppla sig mot dem.

[ASCIINEMA src=149154 caption="Ett flöde hur man kan jobba i terminalen i kmom05."]

Tänk dig som vanligt in i rollen som systemarkitekt på ett företag där du är den som gör teknikvalen till nästa projekt. Du skall göra teknikval som hela ditt utvecklargäng sedan skall använda. Tänk så, det blir en bra attityd inför kursmomentet. Undersök och testa, var nyfiken.



<small><i>(Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet. Momentet omfattar cirka **20 studietimmar** inklusive läsning, arbete med övningar och uppgifter, felsökning, problemlösning, redovisning och eftertanke. Läs igenom hela kursmomentet innan du börjar jobba. Om möjligt -- planera och prioritera var du vill lägga tiden.)</i></small>



Läsanvisningar  {#lasanvisningar}
---------------------------------

*(ca: 4-6 studietimmar)*



###Material {#material}

Kika igenom följande material.

1. Bekanta dig översiktligt med [organisationen kring databasen MongoDB](https://www.mongodb.com/). Övningen (längre ned) kommer vidare utgå från informationen på denna webbplatsen.

1. Läs översiktligt igenom [Wikipedia om NoSQL](https://en.wikipedia.org/wiki/NoSQL) för en introduktion till konceptet NoSQL samt en översikt av de olika typer av databaser som ligger under samlingsnamnet. Du kan se att MongoDB är en dokumentorienterad databas.

1. Läs igenom [kapitel 5 Async functions](http://exploringjs.com/es2016-es2017/ch_async-functions.html) i boken "[Exploring ES2016 and ES2017](http://exploringjs.com/es2016-es2017/)". Du behöver förståelse för dessa koncept om asynkron programmering, kommande exempelkod bygger på dessa koncept. Jag kan inte nog poängtera vikten av att förstå grunderna i det som kapitlet hanterar.

1. Bekanta dig översiktligt med dokumentationen för "[MongoDB Node.js driver](http://mongodb.github.io/node-mongodb-native/)" vilken är den driver vi kommer använda för att koppla JavaScript i Node.js till MongoDB. Det handlar både om referens-dokumentationen och API-dokumentationen.

1. Läs igenom inledande tutorials för MongoDB Node.js driver som du hittar i Referensmanualen. Titta främst i "Connect to MongoDB", "Collections", "CRUD Operations" och "Projections". De ger dig snabbt en känsla av hur man jobbar med datan.



Övningar & Uppgifter  {#ovningar_uppgifter}
-------------------------------------------

*(ca: 6-10 studietimmar)*



###Övningar {#ovningar}

Gör följande övningar, de behövs normalt för att klara uppgifterna.

1. Jobba igenom artikeln "[Kom igång med MongoDB i Nodejs](kunskap/kom-igang-med-mongodb-i-nodejs)" för att komma igång med databasen MongoDB tillsammans med Express, Node.js och Docker. Spara dina exempelprogram i `me/kmom05/db`.



###Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas via me-sidan.

1. Gör uppgiften "[Skapa en spara funktion till din chatt](uppgift/skapa-en-spara-funktion-till-din-chatt)". Du skall lägga till databasfunktionalitet i din applikation.



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa).

Lägg extra tid på skrivandet i detta inledande momentet då redovisningstexten är mer omfattande än du är van vid.

Se till att följande frågor besvaras i texten:

* Hur gick det att komma igång med databasen MongoDB?
* Vilken syn har du på databaser inom konceptet NoSQL?
* Reflektera över skillnader och likheter mellan relationsdatabaser (till exempel SQLite3 eller MySQL) och databaser inom NoSQL.
* Vilka är dina tankar om asynkron programmering med JavaScript?
* Hur känner du för Docker och det sättet vi jobbar med tjänster i kontainrar?

Har du frågor eller funderingar så ställer du dem i forumet.
