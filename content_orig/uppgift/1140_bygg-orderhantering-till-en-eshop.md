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
    "2018-02-20": "(D, mos) Slog ihop 6&7."
    "2018-02-17": "(C, mos) Mindre justeringar i text."
    "2018-02-13": "(B, mos) Genomgången, förtydligad."
    "2018-01-11": "(A, mos) Första utgåvan."
...
Bygg orderhantering till en Eshop
==================================

Du har utfört en ER-modellering av en databas för en Eshop och du har skapat en databas som motsvarar modellen. Du har byggt en terminalklient och en webbklient mot databasen.

Du skall nu uppdatera dina klienter för att jobba med CRUD mot ordertabellerna.

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

1. Försäkra dig om att du kan återställa databasen till sitt ursprungsläge, genom att köra SQL-filerna i `sql/eshop`. Du har filen `setup.sql` för att skapa databasen och användaren. Du har `ddl.sql` för att skapa tabeller, vyer, procedurer, triggers, etc. Du har `insert.ddl` för att fylla tabellerna med innehåll.

1. Dina klienter skall klara de krav som fanns i föregående uppgift "[Skapa grunden till en Eshop](uppgift/skapa-grunden-till-en-eshop)". Det är utgångsläget.

1. Bygg din nya databaskod som lagrade procedurer, tänk API mot databasdelen.

1. I din webbklient, skapa CRUD för orderhantering. Via webbinterfacet kan man utföra CRUD på ordrar och dess innehåll. Man skall kunna skapa en ny order, uppdatera den och ta bort den. Man skall kunna se vilka ordrar som finns.

1. Varje order kan innehålla en beställning av 0 eller flera produkter. Vi kallar detta orderrader. Varje produkt kan beställas i ett visst antal. 

1. Man kan lägga till, ta bort, och redigera orderrader i en order.

1. Varje gång en orderrad skapas/raderas/uppdateras så skall det loggas i loggtabellen med relevant information (implementera med trigger).

1. I din terminalklient lägg till ett kommando `order` som visar en översikt över de ordrar som finns.

1. I din terminalklient, lägg till ett kommando `order <id>` som visar detaljer om vald order, inklusive dess orderrader.

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

1. Lägg till CRUD för produkter och kunder.

1. Gör så att webbklienten kan visa innehållet i loggtabellen.

1. I terminal, gör kommandot `log <antal rader>` som ger möjlighet att begränsa hur många rader som skrivs ut från loggtabellen, man vill se de senaste raderna.

1. Jobba på din kodstruktur så att du bli nöjd.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
