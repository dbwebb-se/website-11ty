---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
Koppla oss mot GitHub
==================================

Nu ska vi koppla oss mot GitHub med våra nyskapade nycklar. Vi öppnar den publika nyckeln med `cat` och kopierar från terminalen:

```bash
cat ~/.ssh/id_ed25519.pub
```

Sen så hoppar vi in på GitHub och trycker uppe i högra hörnet och väljer "Settings":

[FIGURE src=image/git-guide/settings.png]

I högerkolumnen så väljer vi "SSH and GPG keys":

[FIGURE src=image/git-guide/sidebar-ssh-keys.png]

Tryck på "New SSH key" så får du upp ett formulär. Vi döper vår nyckel, rimligen till något som kopplar det till vår dator (ex Work Laptop/Desktop). I den nedre rutan klistrar vi in nyckeln som vi kopierade innan. Tryck på "Add SSH key" när du är klar så bör den dyka upp på sidan.

Vi testar om det fungerade som det skulle genom att testa att koppla oss emot GitHub:

```bash
$ ssh -T git@github.com
# Attempts to ssh to GitHub
```

Du kanske ser följande varning:

```
> The authenticity of host 'github.com (IP ADDRESS)' can't be established.
> RSA key fingerprint is SHA256:nThbg6kXUpJWGl7E1IGOCspRomTxdCARLviKw6E5SY8.
> Are you sure you want to continue connecting (yes/no)?
```

Skriv "yes" och kör på, så kommer du förhoppningsvis får följande utskrift:

```
> Hi username! You've successfully authenticated, but GitHub does not provide shell access.
```

Nu har vi satt upp så vi kan jobba med Git och ladda upp våra filer till GitHub.

## Felsökning {#felsok}

Får du problem med SSH-nycklarna så pröva igen, [GitHub själva har en bra stegvis guide](https://docs.github.com/en/github/authenticating-to-github/connecting-to-github-with-ssh) på hur man kan göra.
