---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
Default editor
==================================

Det går att ändra sin default editor i Git, något som brukar vara av intresse för de som inte uppskattar VI/VIM.

Jag väljer att sätta den till `nano`, en annan terminalbaserad klient som är lite mer simpel att använda, men det går bra att sätta det till Visual Studio Code eller Atom om man skulle vilja det.

```bash
git config --global core.editor "nano"
```

Med grundläggande nano användande kommer man undan med att bara använda sig av `Ctrl+X`. Om man inte har gjort några ändringar så stänger det filen. Om man har gjort ändringar så frågar den ifall man vill spara, varav det bara är ett trycka Y+Enter för att spara och stänga ner filen.
