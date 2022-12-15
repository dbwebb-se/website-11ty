---
sectionHeader: true
linkable: true
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Kom igång med SSH-nycklar  {#ssh-nycklar}
=======================

[FIGURE src=/image/snapht15/ssh-keygen.png?w=c5&a=47,60,5,0 class="right" caption="Så här kan en SSH-nyckel se ut, eller?"]

När man har många maskiner och servrar som man loggar in på och flyttar filer mellan så blir det enklare, och säkrare, att använda sig av SSH-nycklar för autentisering.

I denna del av guiden visas hur du skapar SSH-nycklar och hur du kommer igång att börja använda dem för att logga in och överföra filer över ssh med kommandot `rsync`.



Allmänt {#allmant}
-------------------------------------------

I de exempel som nu följer så används en virtuell maskin i VirtualBox som är [konfigurerad med port forwarding för nätverk](kunskap/installera-debian-pa-virtualbox#pf). Därför används porten 2222 i exemplen. Men, principen är densamma, oavsett var den andra maskinen finns någonstans.

Du kan läsa om [SSH på Debian i deras Wiki](https://wiki.debian.org/SSH). Det är utgångspunkten för det vi skall titta på nu.

Det förutsätts att du vet hur man normalt loggar in med ssh på en annan maskin, likt följande.

```bash
ssh acronym@hostname
ssh acronym@hostname -p 2222
```

Switchen `-p 2222` säger att kommandot skall använda port 2222, istället för port 22 som är standard.
