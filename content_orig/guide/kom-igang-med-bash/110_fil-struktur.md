---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Filstruktur
=======================

Det finns många olika sätt att strukturera filer, inte bara inom bash-programmering, utan i de flesta fall. Vi sätter här en standard som vi använder oss utav genom kursen.



### Filändelse {#filandelse}

Ett bashscript behöver inte ha någon filändelse, utan det är enbart för användarens skull. De två vanligaste man ser är `.sh` eller `.bash`. I guiden och kursen använder vi filändelsen `.bash`.



### Shebang {#shebang}

En *shebang* (även kallad hashbang) är en rad överst i scriptfilerna som talar om var interpretatorn är lokaliserad som ska användas för att exekvera scriptet.

Då olika unix-system placerar Bash på olika ställen är `#!/usr/bin/env bash` att föredra. Då behöver man inte veta i förväg var interpretatorn är installerad. Shebangen ser till att den första interpretatorn som påträffas i användarens `$PATH` används, oavsett om den ligger i `/bin`, `/usr/bin` eller `/usr/local/bin`.

Vi har alltid shebangen överst i filen, fäljt av en kommentar om vad filen handlar om:
```bash
#!/usr/bin/env bash
#
# An example script for the linux course

```



### Gör filen exekverbar {#exekverbar}

För att kunna köra filen behöver vi göra den exekverbar. När vi ändå ska hålla oss vid terminalen gör vi det med hjälp av kommandot *chmod*. Vi tittar i manualen: `$ man chmod`.

> chmod -- change file modes or Access Control Lists

Scrollar vi ner där så kan vi hitta:

> x       The execute/search bits.

Det handlar om rättighetsbitarna och vi kan använda det med: `chmod +x filnamn` för att göra en fil exekverbar. Hade vi använt `-x` så hade vi tagit bort rättigheterna att exekvera filen.
