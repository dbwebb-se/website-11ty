---
author: mos
revision:
    "2018-01-20": "(A, mos) Första utgåvan."
...
Egna funktioner (UDF) för rapporter
==================================

Rektorn vill ha fina utskrifter och rapporter så han ber dig förbereda datat för att göra det enkelt att producera rapporterna. Du tar hjälp av egendefinierade funktioner, UDF (User Defined Function) för att lösa uppgiften.



Funktion för lärarens namn {#namn}
----------------------------------

Skapa en funktion `larareNamn(akronym, avdelning, fornamn, efternamn)` som ger en fin utskrift av lärarens namn enligt "fornamn efternamn (akronym), avdelning".

När du är klar kan du testa funktionen så här.

```text
mysql> SELECT larareNamn(akronym, avdelning, fornamn, efternamn) AS Lärare
    -> FROM larare2;
+--------------------------------+
| Lärare                         |
+--------------------------------+
| Alastor Moody (ala), DIPT      |
| Albus Dumbledore (dum), ADM    |
| Argus Filch (fil), ADM         |
| Gyllenroy Lockman (gyl), DIPT  |
| Hagrid Rubeus (hag), ADM       |
| Madam Hooch (hoc), DIDD        |
| Minerva McGonagall (min), DIDD |
| Severus Snape (sna), DIPT      |
+--------------------------------+
8 rows in set (0.00 sec)
```

En funktion kan alltså hjälpa dig med återkommande formattering av rapporter.



Funktion för tjänsteplanering {#plan}
----------------------------------

En lärares tjänstgöring per år, beror av hur gammal hen är, enligt följande.

| Ålder | Timmar att tjänstgöra |
|:-----:|:---------------------:|
| <30   | 1750                  |
| <40   | 1725                  |
| >=40  | 1700                  |

Ju äldre en lärare är, desto mindre behöver den jobba. Eller desto mer semester får den. Så funkar det.

Uppdatera din tabell för larare2 och se till att du har 2 lärare som är under 30, 2 som är mellan 30 och 40 och resten kan vara äldre än 40.

Skapa sedan en funktion `arbetstid` som tar lärarens ålder som argument och returnerar hur mycket timmar läraren måste jobba. Rapporten kan användas för vidare planering av kurser.

När du är klar kan din rapport se ut så här.

```text
mysql> SELECT
    ->     larareNamn(akronym, avdelning, fornamn, efternamn) AS Lärare,
    ->     TIMESTAMPDIFF(YEAR, fodd, CURDATE()) AS Ålder,
    ->     arbetstid(fodd) AS Tjänstgöringstid
    -> FROM larare2
    -> ORDER BY Tjänstgöringstid DESC, Ålder ASC;
+--------------------------------+--------+--------------------+
| Lärare                         | Ålder  | Tjänstgöringstid   |
+--------------------------------+--------+--------------------+
| Madam Hooch (hoc), DIDD        |     19 |               1750 |
| Gyllenroy Lockman (gyl), DIPT  |     25 |               1750 |
| Hagrid Rubeus (hag), ADM       |     31 |               1725 |
| Argus Filch (fil), ADM         |     31 |               1725 |
| Minerva McGonagall (min), DIDD |     62 |               1700 |
| Severus Snape (sna), DIPT      |     66 |               1700 |
| Alastor Moody (ala), DIPT      |     74 |               1700 |
| Albus Dumbledore (dum), ADM    |     76 |               1700 |
+--------------------------------+--------+--------------------+
8 rows in set (0.00 sec)
```
 
Det var ytterligare ett exempel på när en funktion kan vara nyttig vid skapande av en rappport.
