---
author: lew
revision:
    "2019-03-08": "(A, lew) Första versionen."
...
Skapa ssh-nycklar {#keys}
=======================

Vi börjar med att skapa en uppsättning ssh-nycklar på din lokala maskin i terminalen.

```bash
ssh-keygen -t rsa
```

Det kan se ut så här.

[ASCIINEMA src=22724]

Jag skapar ett nyckelpar enligt RSA-algoritmen, en privat och en publik del. Jag använder standard filnamn för nyckelparet (trycker `RETURN`) och jag låter bli att ange ett lösenord (trycker `RETURN`).
