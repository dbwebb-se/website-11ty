---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Kopiera ssh-nyckel till remote host {#copy}
=======================

Den publika delen av nyckelparet skall vi nu kopiera över till vår *remote host*, den som vi vill logga in på. Kommandot ssh är uppbyggt så att den använder nycklarna automatiskt, om de följer en viss namngivning.

Men, först måste vi kopiera den publika nyckel, det gör vi med kommandot `ssh-copy-id`.

```bash
ssh-copy-id -i $HOME/.ssh/id_rsa.pub mos@linux.dbwebb.se -p 2222
```

Kommandot tar den filen vi anger och lägger till dess innehåll på *remote server* i filen `.ssh/authorized_keys`.

Det kan se ut så här när kommandot utförs och verifieras genom att logga in på den andra maskinen, nu utan lösenord, och kontrollera innehållet i filen `authorized_keys`.

[ASCIINEMA src=22731]
