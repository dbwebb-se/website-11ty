---
author: mos
revision:
    "2018-01-20": "(A, mos) Första utgåvan."
...
Spara SQL-kod i filer
==================================

All SQL-kod sparar du i filer, precis som tidigare.



SQL DDL i `program_ddl.sql` {#sqlddl}
----------------------------------

All SQL DDL sparar du i filen `program_ddl.sql`. Där sparar du alla CREATE/DROP satser för tabeller, procedurer, triggers, funktioner och eventuella vyer.

Du kan utgå från filen `example/skolan/ddl.sql` som finns i ditt kursrepo, om du vill. Den ger dig lite att utgå ifrån och kan göra att du kommer igång snabbare.



SQL Insert i `program_insert.sql` {#sqlinsert}
----------------------------------

När du fyller databasen med innehåll, eller uppdaterar dess innehåll, så lägger du all sådan SQL i filen `program_insert.sql`.

Du kan utgå från filen `example/skolan/insert.sql` som finns i ditt kursrepo. Det ör det enklare att komma igång.



SQL Rapporter i `program_dml.sql` {#sqlrapporter}
----------------------------------

När du gör SQL för SELECT och diverse rapporter och frågor, så samlar du dem i filen `program_dml.sql`.



Filer körbara i sekvens {#ekvens}
----------------------------------

Se till att alla kommandon i respektive fil kan köras i en sekvens och att filerna kan köras i sekvens efter varandra.

Ordningen på filerna är `program_ddl.sql`, `program_insert.sql` och `program_dml.sql`.
