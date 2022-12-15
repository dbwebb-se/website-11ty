---
author: mos
category:
    - javascript
    - websocket
    - kurs ramverk2
revision:
    "2017-12-06": (B, mos) Ändrade till DBWEBB_DSN.
    "2017-11-23": (A, mos) Första utgåvan.
...
Skapa en CRUD med MongoDB till din redovisa-sida
==================================

Du skall använda MongoDB för att lagra information. Du skall kunna lägga till, ta bort, redigera och visa innehållet i databasen. Den blir vanlig CRUD hantering (Create, Read, Update, Delete).

Du skall integrera koden in i din redovisa-sida tillsammans med Express.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Kom igång med MongoDB i Nodejs](kunskap/kom-igang-med-mongodb-i-nodejs)".



Introduktion {#intro}
-----------------------

Du bygger vidare på de kunskaper du fick i artikeln och integrera din en enkel CRUD i din redovisa-sida.

Du väljer själv vilken data du vill jobba med.

Organisera koden i egna moduler så den blir enkel att återanvända i andra sammanhang.

Använd Docker för att husera MongoDB i sin egen kontainer.



Krav {#krav}
-----------------------

1. Bygg en enkel CRUD-hantering på din redovisa-sida, välj något enkelt att lagra, till exempel karaktärerna i Mumintrollet. Skapa, redigera, visa och radera. Hantera minst tre värden per objekt, kanske en fin bildlänk?

1. Installera MongoDB via Docker i en egen kontainer.

1. Kör din Express i en annan separat kontainer.

1. Låt de båda kontainrarna prata med varandra för att lösa uppgiften.

1. Använd environmentvariabeln `DBWEBB_DSN` som ett sätt att undvika hårdkodning av den DSN som kopplar upp dig mot databasen MongoDB.

1. Alla tjänster startas via kommandot `docker-compose up`.

1. Committa, tagga (v5.x.x) och pusha relevanta repon samt ladda upp på studentservern.



Extrauppgift {#extra}
-----------------------

Gör följande extrauppgift om du har tid och lust.

1. Lägg till en sökfunktion.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
