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
    "2018-02-16": "(C, mos) Bort krav om produktkategori."
    "2018-02-13": "(B, mos) Bytte fokus från orderhantering till kund/produkt."
    "2018-01-11": "(A, mos) Första utgåvan."
...
Bygg klienter till en Eshop med CRUD mot lagrade procedurer
==================================

Du har utfört en ER-modellering av en databas för en Eshop och du har skapat en databas som motsvarar modellen. Du har byggt en terminalklient och en webbklient mot databasen.

Du skall nu uppdatera dina klienter för att jobba med CRUD mot databasens tabeller. Man skall kunna lägga till, ta bort, redigera och visa raderna.

Du skall uppdatera dina klienter och du skall jobba med lagrade procedurer och triggers.

Du kan utföra denna uppgift enskilt, eller i samma grupp som utförde ER-modelleringen. 

<!--more-->

Alla lämnar in en egen lösning i sitt kursrepo, även om man jobbat i grupp.



Förkunskaper {#forkunskaper}
-----------------------

Du har utfört uppgiften "[Skapa grunden till en Eshop](uppgift/skapa-grunden-till-en-eshop)".

Du har jobbat igenom övningen "[CRUD med Express, MySQL och lagrade procedurer](kunskap/crud-med-express-mysql-och-lagrade-procedurer)".

Du har jobbat igenom "[Triggers i databas](kunskap/triggers-i-databas)".



Introduktion {#intro}
-----------------------

Du skall med Express bygga ett webbaserat CRUD gränssnitt till din databas.

Du skall uppdatera din terminalklient med nya kommandon.

Du skall använda lagrade procedurer och triggers.

Tänk på din kodstruktur, underhåll den, modifiera den om den känns alltför tungarbetad.

Du bygger vidare på den kod du redan skapat.



Krav {#krav}
-----------------------

1. Inloggningsdetaljer till databasen finns i `config/db/eshop.json`.

1. Försäkra dig om att du kan återställa databasen till sitt ursprungsläge, genom att köra SQL-filerna i `sql/eshop`. Du har filen `setup.sql` för att skapa databasen och användaren. Du har `ddl.sql` för att skapa tabeller och `insert.ddl` för att fylla tabellerna med innehåll.

1. När du skapar lagrade procedurer och triggers så lägger du dem i `sql/eshop/ddl.sql`.

1. Dina klienter skall klara de krav som fanns i föregående uppgift "[Skapa grunden till en Eshop](uppgift/skapa-grunden-till-en-eshop)". Det är utgångsläget.

1. Bygg din nya databaskod som lagrade procedurer, tänk API mot databasdelen.

1. Bygg CRUD för kunder och produkter. Via webbinterfacet kan man utföra CRUD på dem och lägga till, redigera och ta bort rader samt visa tabellernas innehåll.

1. Din databas skall innehålla en generell loggtabell där man kan logga viktiga händelser för information.

1. Skapa triggers som loggar till din loggtabell, varje gång en produkt skapas eller raderas.

1. I din terminalklient bygger du kommandon för att visa innehållet i tabellerna för kunder och produkter.

1. I din terminalklient bygger du ett kommando `log` för att visa innehållet i loggtabellen.

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

1. Visa innehållet i loggtabellen i webbklienten.

1. Jobba på din kodstruktur så att du bli nöjd.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
