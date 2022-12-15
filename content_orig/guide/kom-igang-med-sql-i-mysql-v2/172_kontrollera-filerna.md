---
author: mos
revision:
    "2022-01-03": "(C, mos) Egen artikel."
    "2018-02-09": "(B, mos) Mer text om hur återskapa."
    "2017-12-28": "(A, mos) Första versionen, uppdelad av större dokument."
...
Kontrollera att filerna fungerar
==================================

Vi skall nu kontrollera att vi kan återställa databasen genom att köra de filerna vi skapat.



Återskapa databasen {#filer}
-----------------------------------

Kontrollera att du att du kan återskapa din struktur genom att åteskapa tabellen och lägga in samtliga lärare och därefter köra kommandona som lägger till kompetensen som fält.

Det är alltså följande åtgärder du skall göra.

1. Skapa tabellen larare med `ddl-larare.sql`.
1. Lägg in rader i tabellen larare med `insert-larare.sql`.
1. Lägg till kolumnen kompetens med `ddl-alter.sql`.

Du skall därefter ha en tabell med samtliga lärare och de skall ha kompetensen 1.

Det är alltså följande kommandon du skall köra.

```text
mariadb --table skolan < ddl-larare.sql
mariadb --table skolan < insert-larare.sql
mariadb --table skolan < ddl-alter.sql
```

Du kan dubbelkolla att du har rätt innehåll genom att summera lönesumman och kompetensen med följande kommando.

```text
SELECT SUM(lon) AS 'Lönesumma', SUM(kompetens) AS Kompetens FROM larare;
```

Du kan köra kommandot direkt i terminalen så här.

```text
mariadb skolan -e "SELECT SUM(lon) AS 'Lönesumma', SUM(kompetens) AS Kompetens FROM larare;"
```

Det kan se ut så här när du kör det.

```text
+------------+-----------+
| Lönesumma  | Kompetens |
+------------+-----------+
|     245000 |         8 |
+------------+-----------+
```

Bra, nu vet du att du kan återställa databasen till detta läget. Det är bra inför nästa steg då du skall börja göra uppdateringar i databasen. Blir något fel kan du alltid backa tillbaka hit.
