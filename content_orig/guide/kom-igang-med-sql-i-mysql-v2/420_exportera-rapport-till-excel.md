---
author: mos
revision:
    "2019-01-30": "(B, mos) Ny enklare artikel, ersätter SELECT INTO OUTFILE."
    "2018-01-15": "(A, mos) Första versionen, uppdelad av större dokument."
...
Exportera rapport till Excel
==================================

Hur kan vi exportera resultatet från en SELECT och få in det i ett externt verktyg likt Excel?

Låt oss se på ett par alternativ och samtidigt skriva kod så att vi exporterar innehållet från en rapport och visar upp i ett excel-ark.

Spara den SQL-kod du skriver, och eventuella kommentarer, i filen `dml_export.sql`. Du skall exportera data till en fil som du döper till `report.xls`.



Exportera till CSV fil {#selectinto}
----------------------------------

Vi kan göra en SELECT som skriver sitt resultat till en output fil i CSV-format (Comma Separated Values). Filen kan vi sedan importera i Excel, eller i en annan databas.

I manualen kan vi läsa om detta i [SELECT..INTO](https://dev.mysql.com/doc/refman/8.0/en/select-into.html), man använder varianten SELECT..INTO OUTFILE för att skriva resultatet till en fil.

Att göra på detta sättet kräver dock en del konfiguration och rättigheter samt vetskap om att filen genereras i filsystemet på den server där databasservern kör, det är alltså inte nödvändigtvis din lokala dator.

Om du är intresserad av hur den biten fungerar så kan du, som extra läsning, se hur man gör i artikeln "[Select into outfile](./../select-into-outfile)".

Men vi går raskt vidare till ett "enklare" sätt.



Använd terminalklienten {#tklient}
----------------------------------

Vi kan använda terminalklienten och formattera dess utskrift och spara i en fil, så att det blir förberett att öppna upp i Excel eller liknande verktyg. Denna lösningen är enbart baserad på terminalklienten och du behöver inte göra någon inställning på din server.

Låt se hur det fungerar.

Se följande som skriver ut en rapport från databasen med terminalklienten.

```text
mysql -uuser -ppass skolan -e "SELECT * FROM larare LIMIT 3;"
```

Det kan se ut så här.

```text
$ mysql -uuser -ppass skolan -e "SELECT * FROM larare LIMIT 3;"
+---------+-----------+---------+------------+------+-------+------------+-----------+
| akronym | avdelning | fornamn | efternamn  | kon  | lon   | fodd       | kompetens |
+---------+-----------+---------+------------+------+-------+------------+-----------+
| ala     | DIPT      | Alastor | Moody      | M    | 27594 | 1943-04-03 |         1 |
| dum     | ADM       | Albus   | Dumbledore | M    | 85000 | 1941-04-01 |         7 |
| fil     | ADM       | Argus   | Filch      | M    | 27594 | 1946-04-06 |         3 |
+---------+-----------+---------+------------+------+-------+------------+-----------+
```

Det finns en option `--batch` till terminalklienten som skriver ut samma sak men tab-separerad, varje fält är separerat av en tabb `\t`.

Du använder den så här.

```text
mysql -uuser -ppass skolan -e "SELECT * FROM larare LIMIT 3;" --batch
```

Det kan se ut så här när du kör kommandot.

```text
$ mysql -uuser -ppass skolan -e "SELECT * FROM larare LIMIT 3;" --batch
akronym avdelning       fornamn efternamn       kon     lon     fodd    kompetens
ala     DIPT    Alastor Moody   M       27594   1943-04-03      1
dum     ADM     Albus   Dumbledore      M       85000   1941-04-01      7
fil     ADM     Argus   Filch   M       27594   1946-04-06      3
```

Du har nu ett tabb-separerat format på utskriften, varje fält är separerat av tecknet `\t`, tecknet är osynligt så du ser bara mellanrummet.

Du kan nu göra redirect till en fil, till exempel `report.xls` vilken sedan kan öppnas i Excel utan några extra formatteringar.

Pröva så här.

```text
mysql -uuser -ppass skolan -e "SELECT * FROM larare LIMIT 3;" --batch > report.xls
```

Så här ser det ut när jag öppnar filen i LibreOffice Calc som är en fri version motsvarande Excel.

[FIGURE src=image/snapvt19/databas-export-excel.png?w=w3 caption="En import-ruta öppnas där jag kan göra inställningar, men jag väljer de som visas per default."]

Så här ser det ut när datat ligger i Excel-arket.

[FIGURE src=image/snapvt19/databas-report-in-excel.png?w=w3 caption="Nu finns datat från SQL-rapporten i Excel och kan vidare bearbetas, eller användas för att skapa grafer med mera."]

Om du har dina SQL-kommandon i en fil, till exempel `dml_export.sql`, så kan du läsa dem från filen, så här.

```text
mysql -uuser -ppass skolan --batch < dml_export.sql > report.xls
```

Kommandot tar sin input från fil via `< dml_export.sql` och skriver resultatet till en ny fil via `> report.xls`. I Unix-termer kallas denna hantering för _input/output redirections_.

Nu har du ett enkelt sätt att exportera innehåll från tabeller som direkt kan öppnas i Excel och liknande applikationer som kan läsa tab-separerade format.

Det är möjligen mer korrekt att spara filen med filändelsen `.txt` istället för `.xls`, men Excel verkar vara duktig på att tolka innehållet och ändå visa upp det direkt. Pröva båda om du får problem.



Kontrollera filen {#filen}
----------------------------------

Innan du är helt klar så kontrollerar du att du kan köra SQL-satserna i din fil och att du kan generera rapportfilen.

Se till att du har en fil `report.xls` som går att öppna i Excel (Libreoffice Calc, Google Sheet, eller motsvarande), innan du fortsätter.
