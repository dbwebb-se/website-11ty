---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Lösenord med ssh {#losen}
=======================

När man använder ssh så anger man normalt lösenord när man loggar in. Man kan också använda kommandot `rsync` för att kopiera filer mellan maskiner, över ssh. Även då använder man normalt lösenord.

Det kan se ut så här när man använder ssh.

[ASCIINEMA src=22711]

Det kan se ut så här när man använder rsync över ssh. I exemplet för jag över en katalog som heter `demo`, från min lokala maskin till *remote maskinen* som i exemplet är döpt till `linux.dbwebb.se`.

[ASCIINEMA src=22723]

Om du inte har rsync installerat så gör du det via `apt-get`. Du behöver ha kommandot installerat på båda maskinerna.

```bash
sudo apt-get install rsync
```

Låt oss nu göra ssh (och rsync över ssh) möjligt utan att använda lösenord, vi skall istället använda oss av ssh-nycklar.
