---
author:
    - mos
category:
    - php
    - anax
    - kurs ramverk1
revision:
    "2018-12-10": "(B, mos) Genomgånen inför ramverk1 v2."
    "2017-09-11": "(A, mos) Första utgåvan."
...
Integrera Bok-exemplet i din me-sida
===================================

Du skall integrera ett Bok-exempel i din me-sida för att visa att du hanterar scaffolding av ett komplett CRUD-exempel i ditt Anax med moduler för formulärhantering och databasen med designmönstret Active Record.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Anax med databasdrivna modeller enligt Active Record, ett exempel (v2)](kunskap/anax-med-databasdrivna-modeller-enligt-active-record-ett-exempel-v2)" och de som den är beroende av.



Introduktion {#intro}
-----------------------

Du har ett fungerande scaffoldat exempel. Nu skall du integrera det i din me-sida och uppdatera databastabellen (och det andra) så exemplet blir mer boklikt.

Förslagsvis så kör du scaffolding en gång till, nu i din me/redovisa.



Krav {#krav}
-----------------------

1. Gör bok-exemplet till en del i din me-sida.

1. Du kan välja om du vill jobba med SQLite eller MySQL. Det måste fungera på studentservern.

1. Uppdatera databastabellen så den blir mer boklik och har kolumner som "title" och "author". Lägg till en kolumn som visar bilder, länkar till bilder går bra.

1. Det skall vara tydligt hur man når bokexemplet. Förslagsvis gör en landningssida för exemplet och lägger till i navbaren.

1. Kör `make test` för att kolla att du inte har några valideringsfel och att dina testfall går igenom.

1. Gör en `dbwebb publish redovisa` och kontrollera att det fungerar på studentservern.

1. Committa alla filer och lägg till en tagg (6.0.\*).

1. Pusha upp repot till GitHub, inklusive taggarna.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
