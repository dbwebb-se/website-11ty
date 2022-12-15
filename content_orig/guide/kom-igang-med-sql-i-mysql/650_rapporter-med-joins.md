---
author: mos
revision:
    "2018-01-20": "(A, mos) Första utgåvan."
...
Rapporter med JOINS
==================================

Rektorn vill ha rapporter för att ge studenterna i en viss programtillfälle. Han har visat dig hur rapporten skall se ut och din uppgift är att skapa SQL-kod för att återskapa rapporten.



Rapporten {#rapport}
----------------------------------

Rapporten visar alla kurstillfällen för varje programtillfälle.

Albus vill att rapporten skall se ut så här och visa kolumnerna Program, År, Kurstillfälle samt Kursansvarig.

```text
+----------------------------------+------+-----------------------------------------------------+-------------------------+
| Program                          | År   | Kurstillfälle                                       | Kursansvarig            |
+----------------------------------+------+-----------------------------------------------------+-------------------------+
| Det snälla trollkarlsprogrammet  | 2028 | Kvastflygning (KVA101) Godkänd i lp 1               | Mikael Roos (mos), DBWE |
| Det snälla trollkarlsprogrammet  | 2028 | Trolldryckslära (DRY101) Godkänd i lp 2             | Mikael Roos (mos), DBWE |
| Det snälla trollkarlsprogrammet  | 2028 | Försvar mot svartkonster (SVT101) Beställd i lp 3   | NULL                    |
| Det snälla trollkarlsprogrammet  | 2028 | Förvandlingskonst (VAN101) Beställd i lp 4          | NULL                    |
+----------------------------------+------+-----------------------------------------------------+-------------------------+
```

Min exempeldatabas innehåller bara 4 kurstillfällen, så rapporten visar allt som finns i min databas. Du bör få fler rader och fler programtillfällen i din rapport.

Försök att återskapa SQL-koden som genererar rapporten ovan. Du behöver jobba med JOIN, men i övrigt är det ingen speciell magi.

Se till att du har kurser som har både status "Godkänd" och "Beställd".
