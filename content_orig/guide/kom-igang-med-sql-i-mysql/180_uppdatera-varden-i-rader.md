---
author: mos
revision:
    "2019-01-11": "(E, mos) Lade till asciinema och körning av skriptet."
    "2018-03-27": "(D, mos) Sluttabellen skall inte ha NULL i lön, uppdaterad."
    "2018-03-22": "(C, mos) Delade i två delar och flyttade lönerevision till egen del."
    "2018-02-09": "(B, mos) Flyttade bash-återskapa till eget dokument, utskrift av sum kompetens."
    "2017-12-28": "(A, mos) Första versionen, uppdelad av större dokument."
...
Uppdatera värden i rader
==================================

Vi skall använda `UPDATE` för att uppdatera värden i rader och kolumner. Bekanta dig med refman för UPDATE.

Spara det du nu gör i filen `dml_update.sql`.

Vi skall göra en lönerevision för lärarna och höja deras löner.



Grundlön till alla lärare {#grund}
----------------------------------

Så här kan en UPDATE se ut.

```sql
--
-- Update a column value
--
UPDATE larare SET lon = 30000 WHERE akronym = 'gyl';
```

Börja med att se till så att alla lärare har en lön. De som inte har en lön skall ha 30000 i startlön.

Låt mig visa hur du kan göra det. Ovan ser du hur du uppdaterar en lärares lön. Du kan också uppdatera två lärares lön om du vinklar WHERE-delen på följande sätt.

```sql
UPDATE larare
    SET
        lon = 30000
    WHERE
        akronym = 'gyl'
        OR akronym = 'ala'
;
```

Här är ytterligare en likvärdig konstruktion.

```sql
UPDATE larare
    SET
        lon = 30000
    WHERE
        akronym IN ('gyl', 'ala')
;
```

Ett alternativ hade varit att sätta grundlönen för alla lärare som har NULL i lön.

```sql
UPDATE larare
    SET
        lon = 30000
    WHERE
        lon IS NULL
;
```

Oavsett vad så har nu alla lärare en lön. Du kan dubbelkolla att du har samma värden som jag genom att summera deras lönesumma.

```sql
mysql> SELECT SUM(lon) AS 'Lönesumma', SUM(kompetens) AS Kompetens FROM larare;
+------------+-----------+
| Lönesumma  | Kompetens |
+------------+-----------+
|     305000 |         8 |
+------------+-----------+
1 row in set (0.00 sec)
```

Låt oss även kolla vilka löner lärarna har för tillfället. Det är bra inför nästa övning. Det blir en avstämning på att du har samma värden som jag.

Vi använder följande SELECT.

```sql
SELECT akronym, avdelning, fornamn, kon, lon, kompetens
FROM larare
ORDER BY lon DESC;
```

Så här kan det se ut.

```sql
mysql> SELECT akronym, avdelning, fornamn, kon, lon, kompetens
    -> FROM larare
    -> ORDER BY lon DESC;
+---------+-----------+-----------+------+-------+-----------+
| akronym | avdelning | fornamn   | kon  | lon   | kompetens |
+---------+-----------+-----------+------+-------+-----------+
| dum     | ADM       | Albus     | M    | 80000 |         1 |
| min     | DIDD      | Minerva   | K    | 40000 |         1 |
| sna     | DIPT      | Severus   | M    | 40000 |         1 |
| hoc     | DIDD      | Madam     | K    | 35000 |         1 |
| ala     | DIPT      | Alastor   | M    | 30000 |         1 |
| gyl     | DIPT      | Gyllenroy | M    | 30000 |         1 |
| fil     | ADM       | Argus     | M    | 25000 |         1 |
| hag     | ADM       | Hagrid    | M    | 25000 |         1 |
+---------+-----------+-----------+------+-------+-----------+
8 rows in set (0.00 sec)
```

Dubbelkolla att du kan köra skriptet med samtliga SQL-kommandon.

```text
mysql -uuser -p skolan < dml_update.sql
```

Så här kan det se ut.

[ASCIINEMA src=220811 caption="Alla SQL-kommandon för att uppdatera är samlade i filen."]

Då är vi redo för en övning.
