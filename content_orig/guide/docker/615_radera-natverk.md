---
author: lew
revision:
    "2019-04-30": "(A, lew) Första versionen."
...
Radera nätverket
=======================

När vi vill radera nätverket behöver vi först stoppa containrarna som använder det. Kommandot `$ docker ps` visar vilka aktiva containrar vi har. Använd `$ docker stop <id>` eller `$ docker stop <name>` för att stoppa dem.

Vi kan sedan ta bort nätverket med:

```
$ docker network rm dbwebb
dbwebb
```
