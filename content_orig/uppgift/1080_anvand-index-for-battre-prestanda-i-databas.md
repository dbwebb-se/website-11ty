---
author:
    - mos
category:
    - sql
    - kurs oophp
    - anax-lite
revision:
    "2017-04-28": "(A, mos) Första utgåvan."
...
Använd index för bättre prestanda i databas
==================================

Du ska använda dina kunskaper om hur index påverkar prestanda i en databas och uppdatera din datamasmodell genom att lägga till ett antal index i ditt Anax Lite.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du är väl bekant med Anax Lite.

Du har jobbat igenom artikeln "[Index och prestanda i MySQL](kunskap/index-och-prestanda-i-mysql)".



Introduktion {#intro}
-----------------------

Du skall visa att du kan grunderna i att skapa index för att förbättra prestandan i en databas.

Jobba med den databasmodellen du har i ditt Anax Lite och välj ut ett par platser där du anser att index är relevanta, kontrollera hur EXPLAIN ser ut och lägg till index och kontrollera resultatet med EXPLAIN.



Krav {#krav}
-----------------------

1. Leta reda på tre mer relevanta platser där du bör använda index. Skriv kort i redovisningstexten om varför du valde respektive plats.

1. Kontrollera nuläget med EXPLAIN. Lägg till det/de index du anser behövs. Kontrollera resultatet med EXPLAIN. Skriv kort om resultatet i redovisningstexten.

1. Se till att dina index nu blir en del av koden i skripten i `me/anax-lite/sql` som skapar databasen.

1. Validera och publicera.



Extrauppgift {#extra}
-----------------------

Lös extrauppgifterna om du har tid och motivation.

1. Lägg till fler index där de behövs och känns relevanta.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
