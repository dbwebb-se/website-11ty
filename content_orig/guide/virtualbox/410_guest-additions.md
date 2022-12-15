---
author: lew
revision:
    "2019-03-14": "(A, lew) Första versionen."
...
Guest Additions
=======================

Följande instruktioner skrivs i terminalen inuti Debian. När man skriver lösenord i terminalen ska det inte synas något. Dollartecknet ska inte skrivas, utan visar bara att det är terminalkommandon. Nu kör vi!
<!-- Det är en inställning och det finns ett foruminlägg som visar "[Virtual Box och copy & paste till hostmaskinen](t/4063)". -->

```bash
# bli root-användaren
$ su
Password: # ange ditt valda root-lösenord
```

Nu kan vi installera program och nödvändiga hjälpmedel. Kör följande kommando för att installera nödvändiga verktyg:

```bash
$ apt-get install build-essential module-assistant dkms
```

Vi förbereder för att bygga en modul:

```bash
$ m-a prepare
```

Nu ska vi montera "Guest Additions CD Image". Det kan bli lite strul här.

```bash
$ ls /media/cdrom
```

Ovan kommando listar vad vi har i cdrom:en. Är det tomt behöver vi sätta i skivan. Det gör du via "Devices->Insert Guest Additions CD Image...". Prova ovan kommando igen och se om det listas filer. Om det gör det är det bara att gå vidare. Finns ingenting där kan du behöva "mounta" cdrom:en först:

```bash
$ mount /media/cdrom
```

När skivan är i och det listas filer kan vi installera Guest Additions:

```bash
# inloggad som root
$ sh /media/cdrom/VBoxLinuxAdditions.run
#
# massa utskrifter och ganska lång väntetid...
#
```

Starta om VM:en:

```bash
$ sudo reboot
```

När det är klart stänger vi av VM:en och går in i VirtualBox "settings". Under "General->Advanced" hittar vi "Shared Clipboard" och "Drag n drop". Sätt båda dem till "Bidirectional" och starta Debian igen.

Här är en video där jag gör stegen ovan:

[YOUTUBE src=PQegEbDBSOU width=630 caption="Kenneth installerar Guest Additions."]

Ibland kan det bli lite krångel. I videon ville inte Desktopen vara med och leka, men det räckte att starta om Debian. Notera att det även går att köra i fullskärm.
