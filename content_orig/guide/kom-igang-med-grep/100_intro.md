---
sectionHeader: true
linkable: true
author: lew
revision:
    "2021-04-12": "(A, lew) Första versionen."
...
Vad är grep?
=======================

**Grep** är ett verktyg som låter oss snabbt och relativt enkelt söka i textmassor. Vi använder grep på kommandoraden och det används oftast i slutändan av en "pipe" `|` för att filtrera ett resultat av ett annat kommando.

Syntaxen för grep är:

```
grep [OPTIONS] PATTERN [FILE...]
```

PATTERN är ett reguljärt uttryck som vi ska kika på senare i kursen. För att vända på det kan vi trigga det med:

```
command | grep [OPTIONS] PATTERN
```
