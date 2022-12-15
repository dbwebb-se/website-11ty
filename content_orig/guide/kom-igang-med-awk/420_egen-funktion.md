---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...
Egendefinierad funktion
=======================

Man kan även definiera egna funktioner. Syntaxen är lite lik JavaScript.



### Avrunda summan {#round}

Vi fortsätter med föregående exempel och tittar på hur vi med hjälp av en egen funktion kan avrunda summan korrekt. Vi skapar följande funktion överst i filen:

```awk
#!/usr/bin/env awk

function roundCorrect(val) {
    val = val + 0.5
    return val
}
...

{
    dollar = int(roundCorrect($3/8.31))
    printf("%d\t%-15s\t%-15s\t%5d\n", NR-1":",$1,$2,dollar)
}
...
```

Kör scriptet.

```
$ awk -f phones.awk phones.txt

---- Mobiltelefoner i lager ----

#       Tillverkare     Modell           Pris
1       Apple           iPhone X          963
2       Apple           iPhone 11        1203
3       Samsung         Galaxy S20       1143
4       Samsung         Galaxy S21+      1384
5       Samsung         Galaxy Note20     963

---- Slut på utskrift ----

```

Vi använder ett litet trick som löser avrundningen. Magiskt. Vi lägger på en totalsumma med, då vi har flera stycken i lager.

```awk
#!/usr/bin/env awk

function roundCorrect(val) {
    val = val + 0.5
    return int(val)
}

BEGIN {
    FS=","
    OFS="\t"
    print "\n-------- Mobiltelefoner i lager --------\n"
    printf("%s\t%-15s\t%-15s\t%-10s\t%-10s\t%s\n", "#", "Tillverkare", "Modell", "Antal", "Pris st", "Totalt pris")
    total = 0
}

NR==1 { next }

{
    dollar = int(roundCorrect($3/8.31))
    current = dollar*$4
    total += current
    printf("%d\t%-15s\t%-15s\t%-10s\t%-10s\t%s\n", NR-1":",$1,$2,$4"st","$"dollar,"$"current)
}
END {
    print "\nTotal summa: $"total
    print "\n---- Slut på utskrift ----\n"
}
```

Här deklarerar vi variabeln `total` i BEGIN blocket så den finns tillgänglig när vi läser in filen. Det slutliga resultatet ser ut något i stil med:

```
$ awk -f phones.awk phones.txt
---- Mobiltelefoner i lager ----

#       Tillverkare     Modell          Antal           Pris st         Totalt pris
1       Apple           iPhone X        3st             $963            $2889
2       Apple           iPhone 11       14st            $1203           $16842
3       Samsung         Galaxy S20      8st             $1143           $9144
4       Samsung         Galaxy S21+     13st            $1384           $17992
5       Samsung         Galaxy Note20   4st             $963            $3852

Total summa: $50719

---- Slut på utskrift ----

```
