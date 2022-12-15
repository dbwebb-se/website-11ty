---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...
En scriptfil
=======================

Vi skapar en fil enligt följande:

```
$ touch phones.awk
```

Öppna filen i din editor.



### Startläge {#start}

Vi börjar med att flytta in föregående kommando. Här kan vi hoppa över första raden på följande sätt:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    OFS="="
}
NR==1 { next }
{
    print $2,$1
}
```

Vi säger att om NR är 1 så kör nästa rad med hjälp av nyckelordet *next*. Resultatet blir då samma som tidigare och vi exekverar scriptet med flaggan `-f <filename>`:

```
$ awk -f phones.awk phones.txt
iPhone X=Apple
iPhone 11=Apple
Galaxy S20=Samsung
Galaxy S21+=Samsung
Galaxy Note20=Samsung
```

Utskriften är inte så spännande så vi jobbar lite mer med den:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    print "\n---- Start på rapport ----\n"
}
NR==1 { next }
{
    print NR-1 ": " $1,$2,$3
}
END {
    print "\n---- Slut på rapport ----\n"
}
```

Kör kommandot igen:

```
$ awk -f phones.awk phones.txt

---- Start på rapport ----

1: Apple iPhone X 8000
2: Apple iPhone 11 10000
3: Samsung Galaxy S20 9500
4: Samsung Galaxy S21+ 11500
5: Samsung Galaxy Note20 8000

---- Slut på rapport ----

```

Vi ser att vi jobbade både med BEGIN och med END. Vi använder även den inbyggda variabeln `NR`. Notera att vi även kunde använda aritmetik direkt på variabeln.
