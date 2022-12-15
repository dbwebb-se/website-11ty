---
author: mos
revision:
    "2020-02-17": "(E, mos) Förtydligande om hur sista tabellen skulle formatteras."
    "2019-02-08": "(D, mos) Länk till forumtråd för mer tips om join med kurser och ålder."
    "2019-02-07": "(C, mos) Förtydligande om uppgift med kurser och ålder."
    "2019-01-29": "(B, mos) Genomgången och bytte namn på vyn."
    "2018-01-03": "(A, mos) Första versionen, uppdelad av större dokument."
...
Joina tabeller
==================================

Nu har vi tre tabeller och möjligheten att koppla ihop dem för att se vilka lärare som ansvarar för vilka kurser och när kurserna är planerade i tiden enligt de kurstillfällen som erbjuds.

Spara den SQL-kod du skriver i filen `dml_join2.sql`.



Joina med WHERE {#where}
----------------------------------

Säg att du vill se alla kurstillfällen tillsammans med kursens namn.

För att lyckas med det så måste du joina informationen från tabellerna kurs och kurstillfälle.

Gör en SELECT där du anger både kurs och kurstillfalle. Pröva med följande kommando. Vad blir resultatet?

```sql
--
-- A crossjoin
--
SELECT * FROM kurs, kurstillfalle; 
```

Du får väldigt många rader. Lika många rader som du har rader i Kurs (11 stycken) multiplicerat med antalet rader i Kurstillfälle (10 stycken). Totalt blir det 110 rader, varje rad i kurs matchas mot alla rader i kurstillfalle.

Du har gjort en join, en cross join vilken säger "för varje rad i ena tabellen, matcha mot samliga rader i den andra tabellen".

När man joinar så brukar man vilja koppla ihop raderna på ett bättre sätt.

Vad är det som länkar ihop dessa två tabeller? Kurskoden. Prova med att lägga till en WHERE-sats för att göra länkningen. Så här:

```sql
--
-- Join using WHERE, use alias AS to shorten the statement
--
SELECT *
FROM kurs AS k, kurstillfalle AS kt
WHERE k.kod = kt.kurskod;
```

Om du testar den så får du en utskrift so är lättare att tyda. Ser rapporten rimligt ut? Du borde se lika många rader som det finns matchande träffar mellan tabellen kurs och kurstillfälle (10 rader).

Så här.

```sql
mysql> SELECT *
    -> FROM kurs AS k, kurstillfalle AS kt
    -> WHERE k.kod = kt.kurskod;
+--------+------------------------------------+-------+------+----+---------+--------------+-----------+
| kod    | namn                               | poang | niva | id | kurskod | kursansvarig | lasperiod |
+--------+------------------------------------+-------+------+----+---------+--------------+-----------+
| SVT101 | Försvar mot svartkonster           |     8 | G1N  | 37 | SVT101  | gyl          |         1 |
| SVT101 | Försvar mot svartkonster           |     8 | G1N  | 38 | SVT101  | gyl          |         3 |
| SVT201 | Försvar mot svartkonster           |     6 | G1F  | 39 | SVT201  | ala          |         1 |
| SVT202 | Försvar mot svartkonster           |     6 | G1F  | 40 | SVT202  | ala          |         2 |
| SVT401 | Försvar mot svartkonster           |     6 | G2F  | 41 | SVT401  | sna          |         1 |
| KVA101 | Kvastflygning                      |     4 | G1N  | 42 | KVA101  | hoc          |         1 |
| DJU101 | Skötsel och vård av magiska djur   |     4 | G1F  | 43 | DJU101  | hag          |         3 |
| DRY101 | Trolldryckslära                    |     6 | G1N  | 44 | DRY101  | sna          |         2 |
| DRY102 | Trolldryckslära                    |     6 | G1F  | 45 | DRY102  | sna          |         3 |
| MUG101 | Mugglarstudier                     |     6 | G1F  | 46 | MUG101  | min          |         4 |
+--------+------------------------------------+-------+------+----+---------+--------------+-----------+
10 rows in set (0.00 sec)
```

Det vi ser är alltså samtliga kurstillfällen tillsammans med all data om kursen.



Joina med JOIN..ON {#joinon}
----------------------------------

Det finns ett annat sätt att skriva samma join, ett tydligare sätt, via konstruktionen JOIN..ON. Det ser ut så här.

```sql
--
-- Join using JOIN..ON
--
SELECT *
FROM kurs AS k
    JOIN kurstillfalle AS kt
        ON k.kod = kt.kurskod;
```

Det ser ut så här.

```text
MySQL [skolan]> SELECT *
    -> FROM kurs AS k
    ->     JOIN kurstillfalle AS kt
    ->         ON k.kod = kt.kurskod;
+--------+------------------------------------+-------+------+----+---------+--------------+-----------+
| kod    | namn                               | poang | niva | id | kurskod | kursansvarig | lasperiod |
+--------+------------------------------------+-------+------+----+---------+--------------+-----------+
| SVT101 | Försvar mot svartkonster           |     8 | G1N  |  1 | SVT101  | gyl          |         1 |
| SVT101 | Försvar mot svartkonster           |     8 | G1N  |  2 | SVT101  | gyl          |         3 |
| SVT201 | Försvar mot svartkonster           |     6 | G1F  |  3 | SVT201  | ala          |         1 |
| SVT202 | Försvar mot svartkonster           |     6 | G1F  |  4 | SVT202  | ala          |         2 |
| SVT401 | Försvar mot svartkonster           |     6 | G2F  |  5 | SVT401  | sna          |         1 |
| KVA101 | Kvastflygning                      |     4 | G1N  |  6 | KVA101  | hoc          |         1 |
| DJU101 | Skötsel och vård av magiska djur   |     4 | G1F  |  7 | DJU101  | hag          |         3 |
| DRY101 | Trolldryckslära                    |     6 | G1N  |  8 | DRY101  | sna          |         2 |
| DRY102 | Trolldryckslära                    |     6 | G1F  |  9 | DRY102  | sna          |         3 |
| MUG101 | Mugglarstudier                     |     6 | G1F  | 10 | MUG101  | min          |         4 |
+--------+------------------------------------+-------+------+----+---------+--------------+-----------+
10 rows in set (0.00 sec)
```

För min del föredrar jag denna varianten, jag tycker den blir tydligare i vad jag gör. Välj alla rader från tabellen kurs, joina med tabellen kurstillfalle där kurskoden matchar.

Låt oss nu bygga vidare och joina information även om den kursansvarige läraren. Vi behöver joina tre tabeller, så här kan det se ut.

```sql
--
-- Join three tables
--
SELECT *
FROM kurs AS k
    JOIN kurstillfalle AS kt
        ON k.kod = kt.kurskod
    JOIN larare AS l
        ON l.akronym = kt.kursansvarig;
```

Vi får fortfarande fram 10 rader men nu inklusive alla kolumner från tabellen lärare. En del kolumner är dubblerade, likt akronymen, men det beror ju på att de finns i flera tabeller och vi valde att välja samtliga kolumner via `*`.

Så här ser det ut, många kolumner är det.

```text
MySQL [skolan]> SELECT *
    -> FROM kurs AS k
    ->         JOIN kurstillfalle AS kt
    ->     ON k.kod = kt.kurskod
    ->     JOIN larare AS l
    ->         ON l.akronym = kt.kursansvarig;
    +--------+------------------------------------+-------+------+----+---------+--------------+-----------+---------+-----------+-----------+------------+------+-------+------------+-----------+
    | kod    | namn                               | poang | niva | id | kurskod | kursansvarig | lasperiod | akronym | avdelning | fornamn   | efternamn  | kon  | lon   | fodd       | kompetens |
    +--------+------------------------------------+-------+------+----+---------+--------------+-----------+---------+-----------+-----------+------------+------+-------+------------+-----------+
    | SVT101 | Försvar mot svartkonster           |     8 | G1N  |  1 | SVT101  | gyl          |         1 | gyl     | DIPT      | Gyllenroy | Lockman    | M    | 27594 | 1952-05-02 |         1 |
    | SVT101 | Försvar mot svartkonster           |     8 | G1N  |  2 | SVT101  | gyl          |         3 | gyl     | DIPT      | Gyllenroy | Lockman    | M    | 27594 | 1952-05-02 |         1 |
    | SVT201 | Försvar mot svartkonster           |     6 | G1F  |  3 | SVT201  | ala          |         1 | ala     | DIPT      | Alastor   | Moody      | M    | 27594 | 1943-04-03 |         1 |
    | SVT202 | Försvar mot svartkonster           |     6 | G1F  |  4 | SVT202  | ala          |         2 | ala     | DIPT      | Alastor   | Moody      | M    | 27594 | 1943-04-03 |         1 |
    | SVT401 | Försvar mot svartkonster           |     6 | G2F  |  5 | SVT401  | sna          |         1 | sna     | DIPT      | Severus   | Snape      | M    | 45000 | 1951-05-01 |         2 |
    | KVA101 | Kvastflygning                      |     4 | G1N  |  6 | KVA101  | hoc          |         1 | hoc     | DIDD      | Madam     | Hooch      | K    | 37580 | 1948-04-08 |         1 |
    | DJU101 | Skötsel och vård av magiska djur   |     4 | G1F  |  7 | DJU101  | hag          |         3 | hag     | ADM       | Hagrid    | Rubeus     | M    | 30000 | 1956-05-06 |         2 |
    | DRY101 | Trolldryckslära                    |     6 | G1N  |  8 | DRY101  | sna          |         2 | sna     | DIPT      | Severus   | Snape      | M    | 45000 | 1951-05-01 |         2 |
    | DRY102 | Trolldryckslära                    |     6 | G1F  |  9 | DRY102  | sna          |         3 | sna     | DIPT      | Severus   | Snape      | M    | 45000 | 1951-05-01 |         2 |
    | MUG101 | Mugglarstudier                     |     6 | G1F  | 10 | MUG101  | min          |         4 | min     | DIDD      | Minerva   | McGonagall | K    | 49880 | 1955-05-05 |         2 |
    +--------+------------------------------------+-------+------+----+---------+--------------+-----------+---------+-----------+-----------+------------+------+-------+------------+-----------+
    10 rows in set (0.00 sec)
```



Vy för att förenkla {#vy}
----------------------------------

Ovanstående trippel join kan du nu använda för att skapa en vy och sedan bygga anpassade rapport.

Döp vyn till `v_planering`.

Det verkar som rapportunderlaget vi använder är bra, låt oss skapa en vy av grundrapporten. Den kanske kan komma tillhanda lite senare. 




Rapporter {#rapporter}
----------------------------------

Nu när vi kan joina alla tabellerna så kan vi definiera ett antal rapporter som kan vara bra att ha för skolan.

Du kan lösa nedan uppgiftern med din trippeljoin ovan, eller via din vy av trippel joinen.



### Lärares arbetsbelastning {#belastning}

Skriv SELECT för att lösa följande.

Skolan har ett arbetsmiljöansvar för lärarna och vill se över deras planering och lista de lärare som undervisar i kurser med antalet kurstillfällen de ansvarar för.

I rapporten visar du lärarens akronym och namn följt av antalet kurstillfällen som hen är kursanvarig för. Sortera per antal tillfällen och därefter per akronym.

Ditt svar bör se ut så här.

```text
+---------+--------------------+------------+
| Akronym | Namn               | Tillfallen |
+---------+--------------------+------------+
| sna     | Severus Snape      |          3 |
| ala     | Alastor Moody      |          2 |
| gyl     | Gyllenroy Lockman  |          2 |
| hag     | Hagrid Rubeus      |          1 |
| hoc     | Madam Hooch        |          1 |
| min     | Minerva McGonagall |          1 |
+---------+--------------------+------------+
6 rows in set (0.00 sec)
```

Det ser ut som Snape är den som jobbar mest med undervisningen.



### Kursansvariges ålder {#age}

Skriv SELECT för att lösa följande.

Skolan är orolig för att lärarna börjar närma sig pensionen och behöver "bytas ut". Skolans ansvariga vill se en rapport över de kurser där den ansvarige läraren är nära pensionen. Skolan begränsar sig till att hantera de tre äldsta lärarna.

Förslagsvis så börjar du att ta reda på vilka lärare som har högst ålder, bara för att kontrollera vilka lärare det skulle kunna handla om.

Kanske ser ditt resultat ut så här. Du vill bara se de äldsta lärarna.

```text
+---------+---------+------------+------------+--------+
| akronym | fornamn | efternamn  | fodd       | Ålder  |
+---------+---------+------------+------------+--------+
| dum     | Albus   | Dumbledore | 1941-04-01 |     77 |
| ala     | Alastor | Moody      | 1943-04-03 |     75 |
| fil     | Argus   | Filch      | 1946-04-06 |     72 |
+---------+---------+------------+------------+--------+
3 rows in set (0.00 sec)
```

Så. Där har du lärarens ålder. Men det hjälper dig inte så mycket, egentligen.

**Du behöver de tre äldsta lärarna som också undervisar på kurser.**

Du har deras planering där du ser vilka kurser de är ansvariga för. Du vet hur gammal lärarna är. Slå samman informationen och finn _de kurser där som har de tre äldsta lärarna som ansvariga_.

Kan du nu joina, sortera och på något sätt begränsa så att du kan få fram följande rapport?

Det bör se ut så här när du svarar, gör en motsvarande rapport som är sorterad på samma sätt och innehåller motsvarande rader.

```sql
+------------------------------------+---------------------+-------+
| Kursnamn                           | Larare              | Alder |
+------------------------------------+---------------------+-------+
| Försvar mot svartkonster (SVT201)  | Alastor Moody (ala) |    75 |
| Försvar mot svartkonster (SVT202)  | Alastor Moody (ala) |    75 |
| Kvastflygning (KVA101)             | Madam Hooch (hoc)   |    70 |
| Försvar mot svartkonster (SVT401)  | Severus Snape (sna) |    67 |
| Trolldryckslära (DRY101)           | Severus Snape (sna) |    67 |
| Trolldryckslära (DRY102)           | Severus Snape (sna) |    67 |
+------------------------------------+---------------------+-------+
6 rows in set (0.00 sec)
```

Nu har ledningen fått hjälp i sin planering inför nyrekrytering av lärare. De kan nu se exakt vilka kurser och kompetensområden som behövs ersättas.

Vill du ha tips och ledning så finns i forumet tråden "[Uppdatering Joina tabeller - Lärares ålder](t/8293)".



Kontrollera filen {#filen}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra samtliga SQL-satser, i en och samma sekvens, i filen du jobbar i.
