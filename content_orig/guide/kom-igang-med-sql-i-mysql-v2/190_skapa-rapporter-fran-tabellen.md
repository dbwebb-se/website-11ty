---
author: mos
revision:
    "2022-01-03": "(B, mos) Genomgången inför v2 och MariaDB, bort med bash."
    "2017-12-28": "(A, mos) Första versionen, uppdelad av större dokument."
...
Skapa rapporter från tabellen
==================================

Vi vill välja ut och presentera innehållet i tabellen via konstruktionen SELECT.

Spara dina konstruktioner i filen `dml-select.sql`.



Startläget {#start}
----------------------------------

Innehållet i din tabell bör se ut på följande vis.

```text
mysql> SELECT * FROM larare;
+---------+-----------+-----------+------------+------+-------+------------+-----------+
| akronym | avdelning | fornamn   | efternamn  | kon  | lon   | fodd       | kompetens |
+---------+-----------+-----------+------------+------+-------+------------+-----------+
| ala     | DIPT      | Alastor   | Moody      | M    | 27594 | 1943-04-03 |         1 |
| dum     | ADM       | Albus     | Dumbledore | M    | 85000 | 1941-04-01 |         7 |
| fil     | ADM       | Argus     | Filch      | M    | 27594 | 1946-04-06 |         3 |
| gyl     | DIPT      | Gyllenroy | Lockman    | M    | 27594 | 1952-05-02 |         1 |
| hag     | ADM       | Hagrid    | Rubeus     | M    | 30000 | 1956-05-06 |         2 |
| hoc     | DIDD      | Madam     | Hooch      | K    | 37580 | 1948-04-08 |         1 |
| min     | DIDD      | Minerva   | McGonagall | K    | 49880 | 1955-05-05 |         2 |
| sna     | DIPT      | Severus   | Snape      | M    | 45000 | 1951-05-01 |         2 |
+---------+-----------+-----------+------------+------+-------+------------+-----------+
8 rows in set (0.00 sec)
```

Om du inte har exakt samma värden så har du troligen missat något i samband med lönerevisionen som gjordes. Försök åtgärda det.



WHERE {#where}
----------------------------------

Gör följande SELECT-frågor, du kan se ledtrådar till svaren i slutet av stycket.

1. Visa alla rader i tabellen där avdelningen är DIDD.
2. Visa de rader som har en akronym som börjar med bokstaven 'h' (ledtråd `LIKE`).
3. Visa de rader vars lärares förnamn innehåller bokstaven 'o'.
4. Visa de rader där lärarna tjänar mellan 30 000 - 50 000.
5. Visa de rader där lärarens kompetens är mindre än 7 och lönen är större än 40 000.
6. Visa rader som innehåller lärarna sna, dum, min (ledtråd `IN`).
7. Visa de lärare som har lön över 80 000, tillsammans med de lärare som har en kompetens om 2 och jobbar på avdelningen ADM.

Har du gjort frågorna *och* känner dig bekväm kan du gå vidare, annars försöker du skapa några egna frågor tills du känner att du har kontroll och kan välja ut de raderna du vill ur tabellen.

För min egen del får jag följande svar på ovan frågor, du kan använda det som facit:

1. hoc, min
2. hag, hoc
3. ala, gyl
4. hag, hoc, min, sna
5. min, sna
6. sna, dum, min
7. dum, hag



ORDER BY {#orderby}
----------------------------------

Gör följande SELECT-frågor:

1. Skriv endast ut namnen på alla lärare och vad de tjänar.
2. Sortera listan på efternamnet, både i stigande och sjunkande ordning.
3. Sortera listan på lönen, både i stigande och sjunkande ordning. Vem tjänar mest och vem tjänar minst?
4. Välj ut de tre som tjänar mest och visa dem (ledtråd `LIMIT`).

LIMIT är bra att använda om man vill begränsa antalet rader som visas i svaret.



Alias med AS {#as}
----------------------------------

Alias är bra att använda när man jobbar med många tabeller och behöver ändra namn på kolumnerna i SELECT-satsen, eller när man vill ge en kolumn ett alternativt namn, eller när man vill korta ned ett långt kolumnnamn så att SELECT-satsen blir enklare att skriva.

Studera nedanstående exempel och testkör dem.

```sql
--
-- Change namn of a column
--
SELECT
    fornamn AS 'Lärare',
    lon AS 'Lön'
FROM larare;
```

Lägg till kolumnen avdelning i rapporten och kalla den "Avdelning".

Alias kan även användas för att byta namn på tabellerna. Det är bra när man har långa tabellnamn och när man gör en SELECT-sats från flera tabeller.



Kontrollera filen {#filen}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra samtliga SQL-satser, i en och samma sekvens, i filen du jobbar i.
