---
author: mos
revision:
    "2019-01-30": "(B, mos) Bortplockad från del 3, för krångligt, ersatt med enklare variant samt länk till forumtrådar."
    "2018-01-15": "(A, mos) Första versionen, uppdelad av större dokument."
...
Select into outfile
==================================

Hur kan vi exportera resultatet från en SELECT och få in det i ett externt verktyg likt Excel?

Att använda formatet CSV är ett sätt. Vi gör helt enkelt en SELECT som skriver sitt resultat till en output fil i CSV-format och filen kan vi sedan importera i Excel, eller i en annan databas.

Spara den SQL-kod du skriver i filen `dml_export_csv.sql`. Du skall exportera till en CSV-filer som du döper till `kurs_export.csv`.

I manualen kan vi läsa om detta i [SELECT..INTO](https://dev.mysql.com/doc/refman/8-0/en/select-into.html). Vi använder varianten SELECT..INTO OUTFILE för att skriva resultatet till en fil.



Rättigheter att exportera {#rattigheter}
----------------------------------

Vi behöver extra rättigheter för att exportera data till en fil. Rättigheten heter FILE och är inte en del av de rättigheter vi hittills givit användaren.

Du behöver logga in som root-antvändaren, för att uppdatera de rättigheter som user-användaren har.

Vi kan se vilka rättigheter som vi har på användaren.

```sql
mysql> SHOW GRANTS FOR user@localhost;
+-------------------------------------------------------------------------------------------------------------+
| Grants for user@localhost                                                                                   |
+-------------------------------------------------------------------------------------------------------------+
| GRANT USAGE ON *.* TO 'user'@'localhost' IDENTIFIED BY PASSWORD '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7' |
| GRANT ALL PRIVILEGES ON `skolan`.* TO 'user'@'localhost'                                                    |
+-------------------------------------------------------------------------------------------------------------+
2 rows in set (0.01 sec)
```

Nu lägger vi till rättigheten FILE på alla databaser via `*.*`. Vi kan inte lägga den rättigheten enbart på en databas. Så funkar det, även om det kan kännas udda.

```sql
GRANT FILE ON *.* TO user@localhost;
```

Så här blev det för mig.

```sql
mysql> GRANT FILE ON *.* TO user@localhost;
Query OK, 0 rows affected (0.00 sec)

mysql> SHOW GRANTS FOR user@localhost;
+------------------------------------------------------------------------------------------------------------+
| Grants for user@localhost                                                                                  |
+------------------------------------------------------------------------------------------------------------+
| GRANT FILE ON *.* TO 'user'@'localhost' IDENTIFIED BY PASSWORD '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7' |
| GRANT ALL PRIVILEGES ON `skolan`.* TO 'user'@'localhost'                                                   |
+------------------------------------------------------------------------------------------------------------+
2 rows in set (0.00 sec)
```

Nu ser vi att vår GRANT är uppdaterat till FILE. Då kan vi använda denna användare till att exportera data till en fil.



Exportera tabellen kurs {#exportkurs}
----------------------------------

Vi kan pröva att spara innehållet i en tabell till en fil. När vi importerade data från CSV så använde vi tabellen kurs. Låt oss nu ta och exportera den till en ny fil `kurs_export.csv` och sedan kan vi jämföra innehållet i filen med orginalet i `kurs.csv`.

SQL-koden för att importera filen såg ut ungefär så här.

```sql
LOAD DATA LOCAL INFILE '/home/mos/skolan/kurs.csv'
INTO TABLE kurs
CHARSET utf8
FIELDS
	TERMINATED BY ','
    ENCLOSED BY '"'
LINES
	TERMINATED BY '\n'
IGNORE 1 LINES
;
```

Låt oss använda samma struktur på filen som vi nu genererar. Du behöver ange en absolut sökväg till filen och filen får inte finnas sedan tidigare, då blir det felmeddelande.

```sql
SELECT
	*
	INTO OUTFILE '/home/mos/skolan/kurs_export.csv'
		CHARSET utf8
		FIELDS
			TERMINATED BY ','
			ENCLOSED BY '"'
		LINES
		TERMINATED BY '\n'
	FROM kurs
;
```

Nu har vi en fil som kan importeras in i ett Excelark.

Notera att du enbart kan exportera om filen inte redan finns. Du behöver alltså manuellt radera filen om du vill göra en ny export av datat till filen.

Om vi vill sortera och filtrera resultatet så kan vi göra det. Vi kan även välja ut vilka kolumner vi vill exportera, eller joina med andra tabeller för att få ut anpassade rapporter.



Exportera rapport med kolumner som rubrik {#rubrik}
----------------------------------

Om du jämför filerna `kurs_export.csv` och `kurs.csv` så ser du att första raden med rubriker saknas i den exporterade filen. Om man vill importera data till Excel så kan det se trevligt ut att även ange rubrikerna för respektive kolumn.

Det enklaste sättet är att hårdkoda namnen på kolumnerna till första raden. Sedan kan man slå ihop resultatet från de två SELECT via en UNION, och skriva ut den resulterande rapporten till fil.

```sql
SELECT 'Kod', 'Namn', 'Poäng', 'Nivå'
UNION ALL
SELECT
	*
	INTO OUTFILE '/home/mos/git/dbwebbse/kurser/databas/.solution/sql/skolan/kurs_export.csv'
		CHARSET utf8
		FIELDS
			TERMINATED BY ','
			ENCLOSED BY '"'
		LINES
		TERMINATED BY '\n'
	FROM kurs
;
```

Se till att du kan generera en fil som har en rubrikrad.



Importera till Excel {#impexc}
----------------------------------

När du öppnar Excel, eller som här, Google Sheets, så får du först upp en import-ruta där du kan hjälpa Excel att förstå ditt format. I mitt exempel väljer jag att låta Excel klura ut formatet själv.

[FIGURE src=image/snapvt18/import-google-sheet.png caption="Jag låter Excel klura ut formatet på filen."]

Sedan importerar jag datat och det ser ut som jag förväntar mig.

[FIGURE src=image/snapvt18/import-google-sheet-2.png caption="Datat är nu importerar, hela vägen från databasen, via CSV, till Excel."]

Det är bra att kunna exportera rapporter på detta viset, vissa användare vill se anpassade och formatterade rapporter, alla är inte som du, en expert på databaser.



Kontrollera filen {#filen}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra samtliga SQL-satser, i en och samma sekvens, i filen du jobbar i. Ta bort din genererade CSV-fil och testa.



Diskussion i forum {#forum}
----------------------------------

Det finns i forumet ett par trådar som är relevanta att kika i.

* "[SELECT INTO OUTFILE Access denied for user](t/7404)"
* "[SELECT INTO OUTFILE --secure-file-priv option](t/7405)"
* "[SELECT INTO OUTFILE den enklare varianten](t/7407)"
