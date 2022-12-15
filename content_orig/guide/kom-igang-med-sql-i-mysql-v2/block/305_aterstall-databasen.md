---
author: mos
revision:
    "2018-01-02": "(A, mos) Första versionen, uppdelad av större dokument."
...
Återställ databasen med Bash
==================================

Innan vi börjar på detta stycket så skapar vi ett Bash-skript som hjälper oss att återställa vår databas till det utgångsläget vi vill ha inför denna övningen.



Filer för att återställa {#filer}
----------------------------------

Vi har ju tidigare samlat på oss ett antal skript för att sätta upp och modifiera och jobba med databasen. De som vi behöver köra för att skapa tabeller och sätta upp databasen är följande.

1. `ddl.sql`
1. `dml_insert.sql`
1. `ddl_migrate.sql`
1. `ddl_copy.sql`
1. `dml_update.sql`
1. `dml_view.sql`

När vi kört dessa filer har vi en uppsättning av databasen som bygger på att man jobbat igenom denna guiden enligt med det som står.



Köra filerna {#kora}
----------------------------------

Vi har tidigare sett två sätt att köra filerna, dels en efter en, så här.

```text
$ mysql -uuser -ppass skolan < ddl.sql
$ mysql -uuser -ppass skolan < dml_insert.sql
$ mysql -uuser -ppass skolan < ddl_migrate.sql
```

Dels såg vi hur filerna kunde köras med hjälp av en loop.

```text
$ for f in ddl dml_insert ddl_migrate; do mysql -uuser -ppass skolan < $f.sql; done
```

Men nu börjar det bli alltfler filer. Vi kunde slått ihop filerna till en fil, men eftersom vi har flera filer så försöker vi finna ett enklare sätt att köra alla på en gång.



Ett Bash-skript {#bash}
----------------------------------

Ett Bash-skript är en textfil som innehåller ett kommando per rad. Vi kan köra ett Bash-skript som ett program och alla rader exekveras. Inuti Bash-skriptet kan vi köra loopen.

Spara ditt Bash-skript som `setup.bash`. Det kan se ut så här.

```bash
#!/usr/bin/env bash

for f in ddl dml_insert ddl_migrate ddl_copy dml_update dml_view
do
    mysql -uuser -ppass skolan < $f.sql > /dev/null
done
```

Vi loopar över alla filnamnen och kör dem via MySQL som SQL-skript. Eftersom skripten normalt ger en massa utskrifter så skickar vi dem till `> /dev/null` så vi slipper se dem.

Du kan exekvera skriptet på följande sätt.

```text
$ bash setup.bash
```

Den översta raden är en _shebang_ som låter dig exekvera skriptet direkt, förutsatt att det har exekveringsrättigheter.

Så här ger du ett skript exekveringsrättigheter i Unix.

```text
$ chmod 755 setup.bash
$ ls -l setup.bash
-rwxr-xr-x 1 mos mos 303 Jan  2 10:02 setup.bash*
```

Det är bokstaven `x` som säger att skriptet ha exekveringsrättigheter. Du kan nu köra skriptet direkt, som vilket exekverbart program som helst.

```text
$ ./setup.bash
```

Du måste ange sökvägen till skriptet för att köra det. Eller så lägger man skriptet i en katalog som ligger i ens PATH. Men det kan få vara överkurs.



Dubbelkolla lönesummorna {#koll}
----------------------------------

Vi kan lägga till två rader som dubbelkollar lönesumman och summan av kompetenser, som en check på att vi har rätt värden. En rad innan vi återställer databasen och en rad efter att databasen är återställd.

En testfråga vi kan ställa är alltså denna.

```text
$ mysql -uuser -ppass skolan -e "SELECT SUM(lon) AS 'Lönesumma', SUM(kompetens) AS 'Tot Kompetens' FROM larare;"
+------------+---------------+
| Lönesumma  | Tot Kompetens |
+------------+---------------+
|     330242 |            19 |
+------------+---------------+
```

Om vi nu lyfter in den i `setup.bash` så kan det uppdaterade skriptet se ut så här.

```bash
#!/usr/bin/env bash

# Save SQL query as variable, split to multilines using backslash
sql="                                   \
SELECT                                  \
    SUM(lon) AS 'Lönesumma',            \
    SUM(kompetens) AS 'Tot Kompetens'   \
FROM larare;                            \
"

# Check status before reset
mysql -uuser -ppass skolan -e "$sql"

# Do a reset of the database
for f in ddl dml_insert ddl_migrate ddl_copy dml_update dml_view
do
    mysql -uuser -ppass skolan < $f.sql > /dev/null
done

# Check status after reset
mysql -uuser -ppass skolan -e "$sql"
echo "Should be 330242 and 19."
```

Fint, nu har vi med hyffsat enkla medel ett kraftfullt sätt att hantera databasen via Bash-skript. Det kan vara användbart ibland.
