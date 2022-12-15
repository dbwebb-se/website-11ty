---
author: mos
category:
    - javascript
    - nodejs
    - mysql
    - express
    - crud
    - er-modellering
    - kursen dbjs
    - kursen databas
revision:
    "2018-01-11": (A, mos) Första utgåvan.
...
Bygg klienter till en Eshop med CRUD mot lagrade procedurer
==================================

Du har utfört en ER-modellering av en databas för en Eshop och du har skapat en databas som motsvarar modellen. Du har byggt en terminalklient och en webbklient mot databasen.

Du skall nu uppdatera dina klienter för att jobba med CRUD mot ordertabellerna.

Du kan utföra denna uppgift enskilt, eller i samma grupp som utförde ER-modelleringen. 

<!--more-->

Alla lämnar in en egen lösning i sitt kursrepo, även om man jobbat i grupp.



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Skapa en Eshop med två klienter](uppgift/skapa-eshop-med-tva-klienter)".

Du har jobbat igenom övningen "[CRUD med Express, MySQL och lagrade procedurer](kunskap/crud-med-express-mysql-och-lagrade-procedurer)".

Du har jobbat igenom "[Triggers i databas](kunskap/triggers-i-databas)".



Introduktion {#intro}
-----------------------

Du skall bygga ett webbaserat CRUD gränssnitt till din databas.

Du skall även uppdatera din terminalklient med nya kommandon.

Du skall använda lagrade procedurer och triggers.

Tänk på din kodstruktur, underhåll den, modifiera den om den känns alltför tungarbetad.

Du bygger vidare på de klienter du redan skapat. Kopiera koden för dem till den katalog som gäller för denna uppgift.



Krav {#krav}
-----------------------

1. index, undersök, analysera och lägg till index samt försklara vilka, förbättringen.

1. funktionen





1. Inloggningsdetaljer till databasen finns i `config/db/eshop.json`.

1. SQL-filer har du i `sql/eshop`. Du har filen `setup.sql` för att skapa databasen och användaren. Du har `ddl.sql` för att skapa tabeller och `insert.ddl` för att fylla tabellerna med innehåll.

1. När du nu skapar lagrade procedurer och triggers så lägger du dem i `sql/eshop/ddl.sql`.

1. Dina klienter skall klara de krav som fanns i föregående uppgift "[Skapa en Eshop med två klienter](uppgift/skapa-eshop-med-tva-klienter)".

1. Bygg din databaskod som lagrade procedurer, tänk API mot databasdelen.

1. I din webbklient, skapa CRUD för orderhantering. Via webbinterfacet kan man utföra CRUD på ordrar. En order har en kund.

1. I din webbklient, skapa CRUD för de produkter (och antal produkter), som ingår i en order. En order innehåller en eller flera produkter (en order innehåller orderrader).

1. Varje gång en orderrad skapas/raderas/uppdateras så skall det loggas i loggtabellen med relevant information (tänk trigger).

1. I din terminalklient (`cli.js`), lägg till ett kommando `order` som visar en översikt över de ordrar som finns.

1. I din terminalklient, lägg till, eller uppdatera, ett kommando `order <id>` som visar detaljer om vald order, inklusive dess orderrader.

1. I din terminalklient, lägg till ett kommando `log` som visar en utskrift från loggtabellens tio senaste inlagda rader.

1. Ta en uppdaterad backup av databasen med mysqldump och spara i `sql/eshop/backup.sql`.

1. Validera din kod.

```bash
# Flytta till kurskatalogen
dbwebb validate eshop2
```

Rätta eventuella fel som dyker upp och publisera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Gör följande om du har tid och ro.

1. Lägg till CRUD för produkter, produktkategorier och kunder.

1. Jobba på din kodstruktur så att du bli nöjd.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
