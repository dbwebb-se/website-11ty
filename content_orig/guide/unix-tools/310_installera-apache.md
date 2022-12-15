---
author: lew
revision:
    "2020-03-11": "(A, lew) Första versionen."
...
Installera Apache {#install}
-------------------------------------------

Vi behöver webbservern Apache. Så här installerar du Apache och testar att det fungerar.

```bash
sudo apt-get install apache2
sudo service apache2 status
```

Du kan testa att webbservern är igång och svarar genom att använda en textbaserad webbläsare `lynx`.

```bash
$ sudo apt-get install lynx
$ lynx http://localhost
```

Apache sparar sina loggfiler i `/var/log/apache2`. I filen `access.log` loggas varje *request* till webbplatsen. I filen `error.log` loggas felaktigheter, till exempel om något i en konfigurationsfil gör så att servern inte kan startas.

Du kan starta ett kommando `tail -f` som skriver ut saker som hamnar i slutet av en loggfil. Det kan vara ett bra sätt att kolla om något skrivs till loggen. För att titta i loggfilerna så måste man vara root. Så här man kan skriva för att logga innehåll som skrivs till filen `error.log`.

```bash
sudo tail -f /var/log/apache2/error.log
```

Så här kan det se ut när du gör alltihop i en sekvens.

[ASCIINEMA src=22795]

Nu är både Apache och den terminalbaserade webbläsaren lynx på plats.

I standardinstallationen så lägger Apache sina konfigfiler i `/etc/apache2/` och webrooten ligger i `/var/www/html/`. Om du vill testa att lägga till en ny sida så gör du det. Det är alltid bra att känna att man har kontroll på saker och ting.
