---
sectionHeader: true
linkable: true
...
Aritmetik
=======================

När vi vill utföra aritmetik (matte) i Bash behöver vi lite handpåläggning för att det ska fungera. Som alltid finns det olika sätt att hantera det på. Det finns framförallt två olika sätt att utföra så kallad *arithmetic expansion*. Dubbla parenteser `(( ))` eller med det inbyggda kommandot *let*. Det finns även logiska operatorer som hjälper oss med villkorshantering.

I många andra språk är det rakt på sak. Vi skriver bara det vi vill addera eller subtrahera eller vad det nu kan vara:

```bash
#!/usr/bin/env bash
#
# An example script for the linux course

value1=5
value2=10
value3=$value1+$value2

echo "$value3" # Prints 5+10
```

I Bash blir det dock inte riktigt som vi tänkt som vi kan se ovan. Klicka vidare så tar vi en titt på hur det kan se ut.
