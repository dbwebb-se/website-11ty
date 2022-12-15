---
author: lew
revision:
    "2020-02-10": "(A, lew) Första versionen."
...
print
=======================

Vi börjar lite lätt med att skriva ut text. Vi måste inte jobba med en fil utan vi kan använda awk för att skriva ut text.



### print - utan fil {#print-nofile}

```
$ awk 'BEGIN {print "lite text"}'
lite text
```

**BEGIN** talar om att följande uttryck kommer exekveras en gång och innan en eventuell fil läses in. Motsvarigheten är END som exekveras efter alla rader är processerade. BEGIN och END kallas för *startup and cleanup actions*.  
**{ }** markerar var våra uttryck ska vara. Vi behöver kapsla in det inom måsvingarna för att det ska tolkas på rätt sätt.  
**print** är det magiska nyckelordet som markerar utskriften.

När vi använder uttrycken på kommandoraden behöver vi omsluta det med `'`.

Så. Nu tar vi tag i en fil istället och ser hur vi mer kan använda `print`.
