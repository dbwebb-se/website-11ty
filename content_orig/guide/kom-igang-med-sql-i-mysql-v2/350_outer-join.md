---
author: mos
revision:
    "2022-01-04": "(C, mos) Genomgången inför v2 och MariaDB."
    "2019-01-30": "(B, mos) Genomgång och mindre förtydliganden."
    "2018-01-03": "(A, mos) Första versionen, uppdelad av större dokument."
...
Outer join, rader som inte matchar
==================================

Vi har joinat tabeller och visat de rader som kan matchas mellan tabellerna. Men hur kan vi se de rader som inte har en matchning. Hur kan vi se de lärare som inte undervisar på kurser och hur kan vi se de kurser som inte har ett kurstillfälle?

Spara den SQL-kod du skriver i filen `dml-outer-join.sql`.

[INFO]
En JOIN, eller INNER JOIN som den också kallas, visar de rader som kan matchas mellan tabellerna, där ON-villkoret kan uppfyllas. Finns det ingen matchning så visas inte raden.

En OUTER JOIN kan visa rader där ON villkoret har en matchning i ena tabellen men inte i den andra tabellen.
[/INFO]



Lärare som inte undervisar {#undervisa}
----------------------------------

Vi vet att det finns lärare som inte undervisar. Men hur kan vi visa dem?

Vi börjar med att vända på frågan så att vi tar reda på de lärare som undervisar.

Vi tittar vilka lärare som ansvarar för minst ett kurstillfälle.

```sql
mysql> SELECT DISTINCT
    ->     akronym AS Akronym,
    ->     CONCAT(fornamn, " ", efternamn) AS Namn
    -> FROM v_planering
    -> ORDER BY akronym
    -> ;
+---------+--------------------+
| Akronym | Namn               |
+---------+--------------------+
| ala     | Alastor Moody      |
| gyl     | Gyllenroy Lockman  |
| hag     | Hagrid Rubeus      |
| hoc     | Madam Hooch        |
| min     | Minerva McGonagall |
| sna     | Severus Snape      |
+---------+--------------------+
6 rows in set (0.00 sec)
```

Vi kan titta i tabellen lärare och se att vi har 8 lärare totalt och 2 saknas alltså. Vi kan snabbt klura ut att det är Dumbeldore och Filch som inte undervisar.

Men hur kan vi skriva en SELECT-fråga som visar det? Låt oss kika på OUTER JOIN.



Icke-matchande rader med OUTER JOIN {#outer}
----------------------------------

Som ett komplement till JOIN (som är samma sak som INNER JOIN), finns en OUTER JOIN som även visar de rader som inte har en matchande rad i den andra tabellen.

[INFO]
`OUTER JOIN` visar resultat för alla rader i en tabell, även om det inte finns en matchande rad i den andra tabellen.
[/INFO]

Tillsammans med OUTER JOIN så anger man LEFT eller RIGHT. Det handlar om vilken tabell man utgår ifrån, den vänstra eller den högra.

Vid OUTER JOIN så utgår uttrycket i någon av tabellerna, den vänstra eller den högra, och kör enligt "för alla rader i tabell A, visa dem oavsett om de matchar någon rad i tabell B".

Så här kan vi ta reda på vilka lärare som inte undervisar, det är de lärare som inte har en matchade rad i tabellen kurstillfälle.

```sql
--
-- Outer join, inkludera lärare utan undervisning
--
SELECT DISTINCT
    l.akronym AS Akronym,
    CONCAT(l.fornamn, " ", l.efternamn) AS Namn,
    l.avdelning AS Avdelning,
    kt.kurskod AS Kurskod
FROM larare AS l
    LEFT OUTER JOIN kurstillfalle AS kt
        ON l.akronym = kt.kursansvarig
;
```

Så här ser svaret ut.

```sql
+---------+--------------------+-----------+---------+
| Akronym | Namn               | Avdelning | Kurskod |
+---------+--------------------+-----------+---------+
| ala     | Alastor Moody      | DIPT      | SVT201  |
| ala     | Alastor Moody      | DIPT      | SVT202  |
| dum     | Albus Dumbledore   | ADM       | NULL    |
| fil     | Argus Filch        | ADM       | NULL    |
| gyl     | Gyllenroy Lockman  | DIPT      | SVT101  |
| hag     | Hagrid Rubeus      | ADM       | DJU101  |
| hoc     | Madam Hooch        | DIDD      | KVA101  |
| min     | Minerva McGonagall | DIDD      | MUG101  |
| sna     | Severus Snape      | DIPT      | SVT401  |
| sna     | Severus Snape      | DIPT      | DRY101  |
| sna     | Severus Snape      | DIPT      | DRY102  |
+---------+--------------------+-----------+---------+
11 rows in set (0.00 sec)
```

Vi ser att Albus och Argus har NULL i kolumnen för Kurskod, det säger att de inte har en matchning. De kolumner som inte kan fyllas i med matchande rader får NULL-värden.

Vad hade hänt om vi här använde RIGHT istället för LEFT?

Först tänker vi vad LEFT innebär i sammanhanget. För varje rad i tabellen lärare, visa alla matchande kurskoder fran tabellen kurstillfälle, eller NULL när ingen matchar.

Vad händer om vi gör samma resonemang men använder RIGHT?

Då utgår resonemanget från den högra tabellen, det vill säga tabellen kurstillfälle. För varje rad i tabellen kurstillfälle, visa alla matchande lärare och NULL när läraren saknas.

Nu saknas ingen lärare och vi kommer få ett resultat som i princip är samma som en INNER JOIN.

Resultatet ser ut så här för en RIGHT OUTER JOIN.

```sql
mysql> SELECT DISTINCT
    ->     l.akronym AS Akronym,
    ->     CONCAT(l.fornamn, " ", l.efternamn) AS Namn,
    ->     l.avdelning AS Avdelning,
    ->     kt.kurskod AS Kurskod
    -> FROM larare AS l
    ->     RIGHT OUTER JOIN kurstillfalle AS kt
    ->         ON l.akronym = kt.kursansvarig
    -> ;
+---------+--------------------+-----------+---------+
| Akronym | Namn               | Avdelning | Kurskod |
+---------+--------------------+-----------+---------+
| gyl     | Gyllenroy Lockman  | DIPT      | SVT101  |
| ala     | Alastor Moody      | DIPT      | SVT201  |
| ala     | Alastor Moody      | DIPT      | SVT202  |
| sna     | Severus Snape      | DIPT      | SVT401  |
| hoc     | Madam Hooch        | DIDD      | KVA101  |
| hag     | Hagrid Rubeus      | ADM       | DJU101  |
| sna     | Severus Snape      | DIPT      | DRY101  |
| sna     | Severus Snape      | DIPT      | DRY102  |
| min     | Minerva McGonagall | DIDD      | MUG101  |
+---------+--------------------+-----------+---------+
9 rows in set (0.00 sec)
```

Som sagt, alla lärare finns så alla rader kan matchas. Det blir alltså viktigt om man väljer LEFT eller RIGHT i sin OUTER JOIN, det är två skilda saker.

Vid en INNER JOIN blir det samma resultat oavsett vilken ordning du lägger tabellerna i, här kan du inte använda LEFT/RIGHT.



Kurser utan kurstillfällen {#kurser}
----------------------------------

Kan vi då göra samma sak för kurser och visa vilka kurser som inte har kurstillfällen?

Gör på egen hand som i föregående exempel och visa enbart de kurser som inte har kurstillfällen.

Ditt svar bör bli så här.

```sql
+---------+--------------------+------------+
| Kurskod | Kursnamn           | Läsperiod  |
+---------+--------------------+------------+
| AST101  | Astronomi          |       NULL |
| VAN101  | Förvandlingskonst  |       NULL |
+---------+--------------------+------------+
2 rows in set (0.00 sec)
```

Det ser ut som det är två kurser som ännu inte har ett inplanerat kurstillfälle.



Summering {#summering}
----------------------------------

För att summera vad vi sagt.

Om INNER JOIN.

> En JOIN, eller INNER JOIN, visar de rader som kan matchas mellan tabellerna. Finns det ingen matchning så visas inte raden.

Om OUTER JOIN.

> OUTER JOIN visar resultat för alla rader i en tabell, även om det inte finns en matchande rad i den andra tabellen.

LEFT/RIGHT bestämmer vilken tabell som OUTER JOIN utgår från.

> För alla rader i den vänstra/högra tabellen, visa samtliga rader i den tabellen inklusive värden från den joinade tabellen. Visa NULL om koppling saknas.

Svårare än så är det inte. Nu behöver du bara träna tills det sitter.



Kontrollera filen {#filen}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra samtliga SQL-satser, i en och samma sekvens, i filen du jobbar i.
