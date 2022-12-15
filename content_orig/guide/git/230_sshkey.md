---
author: nik
revision:
    "2021-08-11": "(A, nik) Första versionen."
...
SSH-nycklar
==================================

För att verifiera att ni är ni när ni laddar upp till GitHub så behöver ni sätta upp SSH-nycklar. Detta kan lätt gå fel, men när man väl fixat det så är det klart och inget vi behöver tänka mer på.

## Kolla efter existerande nycklar {#existerande}

Vi börjar med att kolla ifall vi redan har någon SSH-nyckel vi kan använda.

```bash
[Aurora](~) $ ls -la ~/.ssh
total 48
drwx------   8 nik  staff   256 28 Aug  2019 .
drwxr-xr-x+ 60 nik  staff  1920 11 Aug 15:06 ..
-rw-r--r--   1 nik  staff    75 28 Aug  2019 config
-rw-------   1 nik  staff  1823 28 Aug  2019 dbwebb
-rw-------   1 nik  staff   396 28 Aug  2019 dbwebb.pub
-rw-------   1 nik  staff  3389 28 Aug  2019 id_rsa
-rw-r--r--   1 nik  staff   748 28 Aug  2019 id_rsa.pub
-rw-r--r--   1 nik  staff  4043 30 Nov  2020 known_hosts
```

Jag har redan min uppsatt och troligen har ni även `dbwebb` och `dbwebb.pub` ifrån när ni satte upp dbwebb-cli. SSH-nycklar består utav två delar, en privat, t.ex `dbwebb` och en publik `dbwebb.pub`. Den privata är den del som ni använder för att säga att ni är ni, se det som en nyckel. Den publika delen, `dbwebb.pub` är den som ni delar med er av till tjänsten ni ska komma åt.

Det vi letar eftar efter är en `id_rsa.pub`/`id_ecdsa.pub`/`id_ed25519.pub`. Troligen har ni ingen sån än, så vi går vidare och skapar det.

## Skapa nyckeln {#skapa-nyckel}

I terminalen så kör vi följande kodrad för att generera en ny nyckel:

```bash
$ ssh-keygen -t ed25519 -C "your_email@example.com"
```

Det borde ge er följande output:

```bash
> Generating public/private ed25519 key pair.
# MacOS
> Enter a file in which to save the key (/Users/you/.ssh/id_ed25519): [Press enter]
# Linux/WSL/Cygwin
> Enter a file in which to save the key (/home/you/.ssh/id_ed25519): [Press enter]
```

Ni kommer även få en promt att sätta lösenord på er nyckel. Här sätter ni ett lösenord om ni vill, jag brukar inte ha ett lösenord för snabba på flödet.

```bash
> Enter passphrase (empty for no passphrase): [Type a passphrase]
> Enter same passphrase again: [Type passphrase again]
```

Nu bör det ha skapats en nyckel, så om vi kör kommandot ifrån innan så kan vi se ifall det dykt upp:

```bash
$ ls -la ~/.ssh
```

## Använd nyckeln {#anvand-nyckeln}

Nu ska vi lägga till så vi kan använda nyckeln. Detta gör vi genom att lägga till nyckeln i vår `ssh-agent` som håller koll på nycklarna åt oss. 

Vi startar ssh-agent så den körs i bakgrunden:

```bash
$ eval "$(ssh-agent -s)"
> Agent pid 59566
```

### Linux/WSL/Cygwin {unix}

I Linux/WSL/Cygwin så behöver vi bara lägga till vår SSH-nyckel till ssh-agent, på följande sätt:

```bash
ssh-add ~/.ssh/id_ed25519
```

### MacOS {#macos}

På MacOS är det lite mer arbete, men det löser vi snabbt. Vi behöver kolla om `~/.ssh/config` finns och om inte, skapa den.

```bash
$ open ~/.ssh/config
> The file /Users/you/.ssh/config does not exist.
```

Om den inte finns, skapa den med följande kommando:

```bash
$ touch ~/.ssh/config
```

[WARNING]
**Notis:** Lägg märke till skillnaden mellan om du kör med eller utan lösenord på din nyckel i nedanstående stycke.
[/WARNING]

Öppna filen med valfri editor (`atom ~/.ssh/config`/`code ~/.ssh/config`) och lägg till följande om du kör **med lösenord**:

```
Host *
  AddKeysToAgent yes
  UseKeychain yes
  IdentityFile ~/.ssh/id_ed25519
```

Eller följande om du kör **utan lösenord**:

```
Host *
  AddKeysToAgent yes
  IdentityFile ~/.ssh/id_ed25519
```

Vi lägger till nyckeln till vår ssh-agent:

```bash
# Om du kör med lösenord på din nyckel
$ ssh-add -K ~/.ssh/id_ed25519
# Om du kör utan lösenord på din nyckel
$ ssh-add ~/.ssh/id_ed25519
```
