---
author: lew
revision:
    "2020-02-12": "(A, lew) Första versionen."
...
Villkor och loopar
=======================

Många delar som arrayer, villkorshantering osv fungerar som vi är vana vid. Det kommer därför bara visas kortfattat om de olika delarna.



### if {#if}

Vi börjar med en ifsats. Vi skriver ut alla telefoner där det finns fler än 10 i lager:

```awk
#!/usr/bin/env awk

BEGIN {
    FS=","
    OFS="\t"
    print "\nMärke\tModell\t\tI lager\n"
}
NR==1 { next }
{
    if ($4 > 10) {
        print $1,$2,$4
    }
}
```

Resultatet blir då:

```
Märke   Modell          I lager

Apple   iPhone 11       14
Samsung Galaxy S21+     13
```

En ifsats är med andra ord inga konstigheter. Skulle vi behöva ett elseblock är syntaxen precis som du tror:

```awk
if (some comparison) {
    # do something
} else {
    # do something else
}
```



### loopar {#loops}

En forloop i awk skrivs på "det vanliga" sättet:

```awk
for (initialization; condition; increment) {
    body
}
```



En whileloop likaså:

```awk
initialization

while (condition) {
  body
  increment
}
```

Det är med andra ord inga konstigheter att använda varken villkorshantering eller loopar i awk.
