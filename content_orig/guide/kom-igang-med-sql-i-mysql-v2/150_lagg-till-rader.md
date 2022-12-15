---
author: mos
revision:
    "2022-01-19": "(E, mos) Ta bort 10."
    "2022-01-03": "(D, mos) Genomgången inför v2 och MariaDB."
    "2019-01-11": "(C, mos) Lade till asciinema."
    "2018-03-20": "(B, mos) Indelad i kapitel och varning om safe mode update."
    "2017-12-28": "(A, mos) Första versionen, uppdelad av större dokument."
...
Lägg till rader
==================================

Vi lägger till lärare i tabellen.

Lägg SQL-koden i filen `insert-larare.sql`.



En fil för att lägga till rader {#insert}
----------------------------------

Lägg SQL-koden, som handlar om att lägga in rader i tabellen, i filen och inled filen med en header.

```sql
--
-- Insert values into table larare.
--
```

Skapa ett antal lärare och lägga in dem i tabellen med `INSERT`, använd `SELECT * FROM Larare` för att se  och kontrollera vad tabellen innehåller.

Först lägger vi in ett par lärare med varsin INSERT sats. Vi omringar strängar med enkelfnutt. Även datum hanterar vi här som en sträng, databasen kan översätta strängen till rätt datum.

```sql
--
-- Add teacher staff
--
INSERT INTO larare VALUES ('sna', 'DIPT', 'Severus', 'Snape', 'M', 40000, '1951-05-01');
INSERT INTO larare VALUES ('dum', 'ADM', 'Albus', 'Dumbledore', 'M', 80000, '1941-04-01');
INSERT INTO larare VALUES ('min', 'DIDD', 'Minerva', 'McGonagall', 'K', 40000, '1955-05-05');
```

Vi kan lägga in många rader i en och samma INSERT.

```sql
INSERT INTO larare VALUES
    ('hag', 'ADM', 'Hagrid', 'Rubeus', 'M', 25000, '1956-05-06'),
    ('fil', 'ADM', 'Argus', 'Filch', 'M', 25000, '1946-04-06'),
    ('hoc', 'DIDD', 'Madam', 'Hooch', 'K', 35000, '1948-04-08')
;
```

Vi kan lägga in rader, trots att vi ännu inte har all information, men då behöver vi specificera vilka kolumner som vi lägger in datan i.

```sql
INSERT INTO larare
    (akronym, avdelning, fornamn, efternamn, kon, fodd)
VALUES
    ('gyl', 'DIPT', 'Gyllenroy', 'Lockman', 'M', '1952-05-02'),
    ('ala', 'DIPT', 'Alastor', 'Moody', 'M', '1943-04-03')
;
```

Vi har ännu inte satt lönen för dessa två lärare så vi kan inte ge den ett värde. I vårt fall kommer värdet att bli NULL.

Visst, som du kanske ser så kunde vi angivit NULL för kolumnen `lon`, istället för att explicit ange vilka kolumner vi jobbar mot, se det som två olika varianter på hur data kan läggas till, resultatet blir detsamma.



Säkerställ att tabellen är tom innan INSERT {#del}
------------------------------------

För att säkerställa att du kan köra alla INSERT-kommandon i en sekvens så väljer du att lägga en DELETE-sats överst, så du alltid vet att tabellen är tom, innan du lägger in värden.

```sql
DELETE FROM larare;
```

[INFO]
**MySQL Workbench: Felmeddelande om safe update mode**

Får du felmeddelandet om safe update mode när du försöker radera rader?

> <i>Error Code: 1175. You are using safe update mode and you tried to update a table without a WHERE that uses a KEY column To disable safe mode, toggle the option in Edit -> Preferences -> SQL Editor -- and reconnect.</i>

Gör som det står i felmeddelandet, gå in och klicka bort "Safe updates" under "SQL Editor" i Edit -> Preferences. Reconnecta därefter via "Query" -> "Reconnect to server". Sedan skall det gå. Det är en rimligt säkerhetsinställning som de har satt på i klienten.
[/INFO]



Kör alla kommandon i filen i sekvens {#sekvens}
------------------------------------

Dubbelkolla att allt ligger i din fil och att du kan köra alla kommandon i filen, om och om igen.

Verifiera att innehållet i din databas är detsamma som i min.

```sql
mysql> SELECT akronym, avdelning, fornamn, efternamn, kon, lon, fodd FROM larare;
+---------+-----------+-----------+------------+------+-------+------------+
| akronym | avdelning | fornamn   | efternamn  | kon  | lon   | fodd       |
+---------+-----------+-----------+------------+------+-------+------------+
| ala     | DIPT      | Alastor   | Moody      | M    |  NULL | 1943-04-03 |
| dum     | ADM       | Albus     | Dumbledore | M    | 80000 | 1941-04-01 |
| fil     | ADM       | Argus     | Filch      | M    | 25000 | 1946-04-06 |
| gyl     | DIPT      | Gyllenroy | Lockman    | M    |  NULL | 1952-05-02 |
| hag     | ADM       | Hagrid    | Rubeus     | M    | 25000 | 1956-05-06 |
| hoc     | DIDD      | Madam     | Hooch      | K    | 35000 | 1948-04-08 |
| min     | DIDD      | Minerva   | McGonagall | K    | 40000 | 1955-05-05 |
| sna     | DIPT      | Severus   | Snape      | M    | 40000 | 1951-05-01 |
+---------+-----------+-----------+------------+------+-------+------------+
8 rows in set (0.00 sec)
```

Du behöver ha samma innehåll i din databas som jag har, då kommer du att få samma resultat i kommande uppgifter och du får ett facit att kontrollera mot.

Du bör nu kunna köra alla kommandon i din fil och få samma utfall efter varje körning.

<!--
Så här ser det ut när jag kör skriptet via terminalklienten.

[ASCIINEMA src=220808 caption="Det är smidigt att köra ett SQL-skript via terminalen."]
-->
