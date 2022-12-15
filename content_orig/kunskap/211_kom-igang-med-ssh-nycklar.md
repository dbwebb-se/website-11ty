---
author: mos
category: webbprogrammering
revision:
  "2015-06-30": (A, mos) Första utgåvan.
updated: "2015-06-30 14:45:49"
created: "2015-06-29 11:56:22"
...
Kom igång med SSH-nycklar
==================================

[FIGURE src=/image/snapht15/ssh-keygen.png?w=c5&a=47,60,5,0 class="right" caption="Så här kan en SSH-nyckel se ut, eller?"]

När man har många maskiner och servrar som man loggar in på och flyttar filer mellan så blir det enklare, och säkrare, att använda sig av SSH-nycklar för autentisering.

I denna artikel visas hur du skapar SSH-nycklar och hur du kommer igång att börja använda dem för att logga in och överföra filer över ssh med kommandot `rsync`.

<!--more-->



Allmänt om artikeln {#oma}
-------------------------------------------

I de exempel som nu följer så används en virtuell maskin i VirtualBox som är [konfigurerad med port forwarding för nätverk](kunskap/installera-debian-pa-virtualbox#pf). Därför används porten 2222 i exemplen. Men, principen är densamma, oavsett var den andra maskinen finns någonstans.



Allmänt om SSH {#om}
-------------------------------------------

Du kan läsa om [SSH på Debian i deras Wiki](https://wiki.debian.org/SSH). Det är utgångspunkten för det vi skall titta på nu. 

Det förutsätts att du vet hur man normalt loggar in med ssh på en annan maskin, likt följande. 

```bash
ssh acronym@hostname
ssh acronym@hostname -p 2222
```

Switchen `-p 2222` säger att kommandot skall använda port 2222, istället för port 22 som är standard.



Lösenord med ssh {#losen}
-------------------------------------------

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



Skapa ssh-nycklar {#keys}
-------------------------------------------

Vi börjar med att skapa en uppsättning ssh-nycklar på din lokala maskin i terminalen.

```bash
ssh-keygen -t rsa
```

Det kan se ut så här.

[ASCIINEMA src=22724]

Jag skapar ett nyckelpar enligt RSA-algoritmen, en privat och en publik del. Jag använder standard filnamn för nyckelparet (trycker `RETURN`) och jag låter bli att ange ett lösenord (trycker `RETURN`).



Kopiera ssh-nyckel till remote host {#copy}
-------------------------------------------

Den publika delen av nyckelparet skall vi nu kopiera över till vår *remote host*, den som vi vill logga in på. Kommandot ssh är uppbyggt så att den använder nycklarna automatiskt, om de följer en viss namngivning.

Men, först måste vi kopiera den publika nyckel, det gör vi med kommandot `ssh-copy-id`.

```bash
ssh-copy-id -i $HOME/.ssh/id_rsa.pub mos@linux.dbwebb.se -p 2222
```

Kommandot tar den filen vi anger och lägger till dess innehåll på *remote server* i filen `.ssh/authorized_keys`.

Det kan se ut så här när kommandot utförs och verifieras genom att logga in på den andra maskinen, nu utan lösenord, och kontrollera innehållet i filen `authorized_keys`.

[ASCIINEMA src=22731]



Kontrollera att ssh och rsync fungerar utan lösenord {#check}
-------------------------------------------

Nu är allt klart. Inloggning utan lösenord, så mycket smidigare.

Så här kan det se ut. Egentligen inget speciellt, men man sparar knapptryckningar och väntetid för lösenordet.

[ASCIINEMA src=22734]

Allt blir så mycket enklare för den som måste ha koll på olika servrar.



Avslutningsvis {#avslutning}
--------------------------------------

SSH-nycklar är oerhört smidigt, när man väl kommit över den första tröskeln av att sätta upp dem. Men när det är klart så vill man aldrig mer skriva ett lösenord i onödan.

Om du stöter på problem så kan du alltid [fråga i forumet om Unix och Linux](forum/viewforum.php?f=49).




