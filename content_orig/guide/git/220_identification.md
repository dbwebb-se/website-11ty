---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
Sätt vårt användarnamn och mail
==================================

När man ska göra sina första "commits" så behöver man säga vem man är. Vi sätter det nu redan nu så är vi förberedda. Med hjälp utav `git config` så kan vi sätta diverse olika inställningar i Git. Jag testar att köra en `git config --list` för att visa mina inställningar. Det kommer antagligen se ganska tomt ut för er, men såhär kan det se ut på en maskin med något år på nacken.

```bash
[Aurora](~) $ git config --list
credential.helper=osxkeychain
user.email=nhdandersson@gmail.com
user.name=Niklas Aurora Andersson
core.editor=nano -w
alias.hist=log --all --decorate --pretty=format:"%h %ad | %s%d [%an]" --graph --date=short
alias.tree=log --graph --abbrev-commit --decorate --date=relative --format=format:'%C(bold blue)%h%C(reset) - %C(bold green)(%ar)%C(reset) %C(white)%s%C(reset) %C(dim white)- %an%C(reset)%C(auto)%d%C(reset)' --all
```

Vi kan se att jag sitter på en Mac, så jag använder mig utav den inbyggda lösenordshanteraren. Vi kan även se att jag satt `user.email` och `user.name`, det är det ni ska göra själva strax. Sen så kommer lite egna preferenser, inget vi kommer gå in på här med kolla gärna i den [utökade delen av guiden]().

Nu ska ni sätta ert egna användarnamn och mail, vilket vi gör på följande sätt:

```bash
$ git config --global user.name "Ert Namn"
$ git config --global user.email "ertnamn@bth.se"
```

Sen kan ni kolla om det blev rätt

```bash
$ git config --list
```

Ser allt bra ut så kör vi vidare med GitHub.

## Skapa ett GitHub konto {#skapa-konto}

Hoppa över till [Github's hemsida](https://github.com/) och skapa ett konto. När ni är redo så ska vi koppla SSH-nycklar till kontot. 
