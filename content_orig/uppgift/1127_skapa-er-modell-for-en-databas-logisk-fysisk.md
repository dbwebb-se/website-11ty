---
author: mos
category:
    - databas
    - er-modellering
    - kursen databas
revision:
    "2022-02-11": "(E, mos) Förtydligande om att enbart SQL DDL skall skapas."
    "2022-02-11": "(D, mos) Lade till tips om reset.sql."
    "2020-01-29": "(C, mos) Stycke om föreläsningen om e-shop."
    "2019-02-08": "(B, mos) Genomgången och mindre justeringar i text."
    "2018-01-05": "(A, mos) Första utgåvan."
...
Skapa ER-modell för en databas (logisk/fysisk)
==================================

Du skall jobba vidare med den databasmodell du tidigare skapat och utfört den konceptuella modelleringsfasen för.

Detta är andra delen av uppgiften och du skall nu utföra den logiska och den fysiska modelleringsfasen.

Du kan lösa uppgiften genom att jobba enskilt eller i grupp om max 3 deltagare. Var och en gör sin egen inlämning, även om man jobbar i grupp.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Kokbok för databasmodellering](kunskap/kokbok-for-databasmodellering)" som ger dig metoden för hur du skall jobba med modelleringen.

Du har löst första delen av uppgiften i "[Skapa ER-modell för en databas (konceptuell)](uppgift/skapa-er-modell-for-en-databas-konceptuell)".

Du har en befintlig modell med konceptuell modellering som du kan jobba vidare på.

Du har eventuellt tittat på [föreläsningen om ER-modellering och implementation av en e-shop](https://youtu.be/fqC_VQh_E74?start=886&end=4065) (längd 53 minuter, startar 15 minuter in och avslutas 1:18). Den föreläsningen ger dig en insikt i hur en e-shop kan modelleras.



Introduktion {#intro}
-----------------------

Du skall jobba vidare på din ER-modell och fortsätta dokumentera vad du gör i ditt ER-dokument.

Du skall nu utföra den logiska modelleringsfasen och den fysiska modelleringsfasen.

Du kan friska upp minnet om vad det stod om [ritverktyg i föregående uppgift](uppgift/skapa-er-modell-for-en-databas-konceptuell#ritverktyg). MySQL Workbench kan vara ett bra alternativ för denna uppgift. Speciellt eftersom du då får stöd i generering av SQL DDL.

Se till att spara SQL DDL i en separat fil så att du kan skapa tabeller i ett senare skede.

I ditt slutliga modelleringsdokument kan du lägga till SQL DDL-koden som appendix, men se isåfall till att formattera koden med rimligt typsnitt.

Varje steg du gör (enligt kokboken) skall du dokumentera i ett dokument som du lämnar in som pdf. När du är klar finns samtliga delsteg dokumenterade i ditt dokument.



Krav {#krav}
-----------------------

Läs igenom samtliga krav innan du börjar jobba.

1. Bygg vidare på din konceptuella modell som du dokumenterat i ett befintligt dokument.

1. Skapa en ny sida med rubrik "Logisk modell" och utför och dokumentera alla delsteg för den logiska modelleringsfasen, enligt kokboken.

1. Skapa en ny sida med rubrik "Fysisk modell" och utför och dokumentera alla delsteg för den fysiska modelleringsfasen. Du skall skapa SQL DDL men du skall inte skapa INSERT, UPDATE, DELETE eller SELECT.

1. Berätta i dokumentet hur du gjorde för att skapa SQL DDL (per hand eller genererade). SQL DDL lägger du som ett Appendix i ditt dokument, för information, använd ett rimligt typsnitt.

1. Din SQL DDL sparar du även som egen fil i `ddl.sql`. Denna filen skall innehålla SQL för att skapa databasens schema.

1. Skapa en fil `setup.sql` som skapar databasen `eshop` (CREATE DATABASE).

1. Försäkra dig om att din SQL DDL (`setup.sql`, `ddl.sql`) fungerar och skapar den databasen och de tabellerna du vill ha. Du behöver inte lägga in någon data i tabellerna, eller provköra databasen, det gör vi senare.

1. Spara ditt orginal dokument i katalogen du jobbar. Generera även en PDF som `er.pdf`.

1. Tips. Skapa även en `reset.sql` så du snabbt och enkelt kan återskapa och återställa din databas.

1. När du är klar så publicerar du ditt kursrepo.

```text
# Ställ dig i kurskatalogen
dbwebb publish me

dbwebb test er2
```



Tips från coachen {#tips}
-----------------------

Lycka till och ställ frågor i forumet om du behöver hjälp!
