---
author: mos
category:
    - kurs webtec
revision:
    "2021-09-30": "(B, mos) Felstavade filnamn, skall ha ändelse .sql."
    "2021-09-23": "(A, mos) Första utgåvan."
...
Bygg en databas med SQL
===================================

Du skall bygga upp en databas från grunden med hjälp av SQL i databasen SQLite. Du fyller databasen med innehåll och skriver SELECT för att få ut rapporter.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har grundläggande kunskap om databasen SQLite och SQL.



<!--
Genomgång {#genom}
------------------------

Här är en video som "pratar" dig igenom uppgiftens upplägg och visar hur du kommer igång.

[YOUTUBE src="gKzwQTG9eCI" width=700 caption="Kurs mvc kmom03 tisdagsgenomgång, del 3/3 uppgiften (Zoom med Mikael)."]
-->



Introduktion och förberedelse {#intro}
-----------------------

Du skall jobba i terminalklienten `sqlite3` eller så kan du välja en annan klient om du vill.

Du skall skapa en databas med "gula postit-lappar", en "ToDo"-databas. Du skall ha en tabell och varje rad i tabellen är en "postit-lapp" som anger en aktivitet som skall utföras.



### Utskrifter från sqlite3 {#mode}

När du vill ha fina rapporter i kommandoradsklienten så kan du sätta på tabellutskrift med rubriker.

```text
.headers ON
.mode column
```



Krav {#krav}
-----------------------

Utför följande krav.

1. Spara alla filer i katalogen `me/sqlite`.

1. Spara databasen som `db.sqlite`.

1. När du skriver SQL så kan du använda kommentarer för att dokumentera och visa vad du gör.

1. All SQL DDL skall sparas i `ddl.sql`. Här lägger du all SQL-kod som kan användas för att återskapa databasens schema (tabeller).

1. Skapa en tabell för dina "ToDo"-lappar. Välj vilket namn du vill ha på tabellen. Tabellen skall innehålla minst följande kolumner och du skall välja en relevant datatyp.

    1. En id som primärnyckel som räknas upp för varje ny rad.
    1. Titel på aktiviteten.
    1. Beskrivning av aktiviteten.
    1. Tid för start av aktiviteten.
    1. Tid för slut av aktiviteten.
    1. Prioritering av aktiviteten.

1. I filen `insert.sql` lägger du INSERT-satser som fyller tabellen med innehåll. Du skall ha minst 7 aktiviter i tabellen. Lägg in data så att det blir lätt att testa och prova din databas.

1. Du skall nu kunna återskapa databasen genom att först köra alla kommandon i `ddl.sql` följt av `insert.sql`. Du skall också kunna återfylla databasen genom att enbart köra filen `insert.sql`. Provkör så att återställningen fungerar.

1. I filen `dml.sql` lägger du all SQL som är relaterad till dina rapporter.

1. Skapa en rapport (SELECT) som visar alla dina aktiviteter.

1. Skapa en rapport (SELECT) som visar de aktiviteter som matchar delar av en söksträng (LIKE). Sök i titel, description och prioritet.

1. Skapa en rapport som visar titel och prioritering på aktiviteter, sorterat per prioritet så att den viktigaste kommer först.

1. Skapa en rapport som visar titel och aktivitens start, slut och längd. Längden på en aktivitet kan du beräkna med [inbyggda funktioner för datum och tid](https://www.sqlite.org/lang_datefunc.html). Sortera per längd i sjunkande ordning.

1. Visa att du kan göra en UPDATE-sats genom att ändra prioriteringen för en av dina aktiviteter. Spara koden tillsammans med en kommentar i `dml.sql`.

1. Visa att du kan göra en DELETE-sats genom att radera alla aktiviteter som har lägst/ingen prioritering. Spara koden tillsammans med en kommentar i `dml.sql`.

1. Avsluta med att återskapa databasen med `ddl.sql` och `insert.sql`.



Redovisning {#redovisa}
-----------------------

Besvara följande frågor i din redovisningstext.

* Berätta hur det gick att lösa uppgiften, var något extra svårt, lurigt, krångligt eller flöt det på smidigt?
* Är det något som du är extra nöjd med i ditt resultat från uppgifterna?



Publicera {#publicera}
-----------------------

Avsluta uppgiften så här.

1. Testa ditt resultat så att det passera de automatiska testerna med `dbwebb test sqlite`.

1. När du är klar kan du publicera resultatet med `dbwebb publish sqlite`.
