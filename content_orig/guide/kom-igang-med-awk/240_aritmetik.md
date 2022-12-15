---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...
Aritmetik
=======================

Vi kan använda aritmetik på fälten. Awk kan utläsa typer automatiskt. Vi går inte igenom alla matematiska formler vi kan göra utan det räcker med lite enkel matematik. Vi kan även passa på att fixa rubrikerna.



### Exempel {#ex}

Låt säga att vi vill se hur mycket en telefon hade kostat i valutan dollar. I skrivande stund står kursen i 1 dollar = 8.31sek.

Vi ändrar lite på utskriftsraden:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    OFS="\t"
    print "\n---- Mobiltelefoner i lager ----\n"
    print "#\tTillverkare\tModell\tPris\n"
}

NR==1 { next }
{
    print NR-1":",$1,$2,$3/8.31
}

END {
    print "\n---- Slut på utskrift ----\n"
}
```

Om vi exekverar scriptet får vi resultatet:

```
$ awk -f phones.awk phones.txt

---- Mobiltelefoner i lager ----

#       Tillverkare     Modell  Pris

1:      Apple   iPhone X        962.696
2:      Apple   iPhone 11       1203.37
3:      Samsung Galaxy S20      1143.2
4:      Samsung Galaxy S21+     1383.87
5:      Samsung Galaxy Note20   962.696

---- Slut på utskrift ----

```

Vi kunde räkna direkt på fältet med `$3/8.31`. Nästa steg är att formattera datan och avrunda summan.



```
...
print NR-1":",$1,$2,int($3/8.31)
...
```

Resultatet blir då:

```
$ awk -f phones.awk phones.txt

-------- Mobiltelefoner i lager --------

#       Tillverkare     Modell  Pris

1:      Apple   iPhone X        962
2:      Apple   iPhone 11       1203
3:      Samsung Galaxy S20      1143
4:      Samsung Galaxy S21+     1383
5:      Samsung Galaxy Note20   962

---- Slut på utskrift ----

```

Notera att utskriften kan bli lite skev, även om vi satt en OFS. I detta fallet har vi `OFS="\t"` vilket är en tab. Vissa kolumner är bredare än andra och tabben fungerar då inte som tänkt. Vi kan använda printf för att styra upp det.

```awk
BEGIN {
    ...
    printf("%s\t%-15s\t%-15s\t%5s\n", "#", "Tillverkare", "Modell", "Pris")
}
...
{
    printf("%d\t%-15s\t%-15s\t%5d\n", NR-1":",$1,$2,int($3/8.31))
}
...
```

Vi får då lite snyggare utskrift:

```
$ awk -f phones.awk phones.txt

-------- Mobiltelefoner i lager --------

#       Tillverkare     Modell           Pris
1       Apple           iPhone X          962
2       Apple           iPhone 11        1203
3       Samsung         Galaxy S20       1143
4       Samsung         Galaxy S21+      1383
5       Samsung         Galaxy Note20     962

---- Slut på utskrift ----

```

Vi kan se att den inbyggda funktionen `int()` kapar decimalerna rakt av och några av telefonerna borde ju avrundats uppåt istället. Nåja, det löser vi med en egen funktion.

Kika mer på [Numeriska funktioner](https://www.gnu.org/software/gawk/manual/html_node/Numeric-Functions.html)
