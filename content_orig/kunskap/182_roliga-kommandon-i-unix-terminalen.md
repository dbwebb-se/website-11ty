---
author: mos
category: unix
revision:
  "2014-08-30": (A, mos) Första utgåvan.
updated: "2014-08-30 18:36:31"
created: "2014-08-29 14:27:26"
...
Roliga kommandon i Unix-terminalen
==================================

Så vad kan man då göra med en Unix-terminal som verktyg? Låt oss starta med ett par, kanske inte alltid så nyttiga verktyg men lite roliga. Vem vet, kanske finns det ett användningsområde för kommandon som `cowsay`?

<!--more-->

Är du osäker på hur du använder kommandot så använder du man-sidan. Det finns alltid en man-sida till ett Unix-kommando.

```bash
man cowsay
```

Om du inte förstår man-sidan så finns det en man-sida till man-sidorna.

```bash
man man
```

Ungefär som strippen säger ([läs RTFM-strippen på xckcd](http://xkcd.com/293/))...

[FIGURE src=http://imgs.xkcd.com/comics/rtfm.png caption="Visdomsord -- läs man-sidan."]

Undrar du [vad RTFM betyder](http://www.catb.org/jargon/html/R/RTFM.html)? Läs om mer Unix-slang i [The Jargon File](http://www.catb.org/jargon/html/index.html).

Nu till de "roliga" och "nyttiga" kommandona.



Cowsay {#cowsay}
---------------------------------------------

```bash
# Debian
apt-get install cowsay

# Mac
brew install cowsay
```

Ritar ut en ko -- eller annat trevligt djur -- tillsammans med ett meddelande.

[ASCIINEMA src=11808]



Fortune {#fortune}
---------------------------------------------

```bash
# Debian
apt-get install fortune

# Mac
brew install fortune
```

Visa upp ett citat från känd som okänd person.

[ASCIINEMA src=11809]



Figlet {#figlet}
---------------------------------------------

```bash
# Debian
apt-get install figlet

# Mac
brew install figlet
```

Rita en ASCII banner.

[ASCIINEMA src=11810]



CMatrix {#cmatrix}
---------------------------------------------

```bash
# Debian
apt-get install cmatrix

# Mac
brew install cmatrix
```

Känn dig lite som Nemo och försök se in i *The Matrix*.

[ASCIINEMA src=11813]



Konvertera bild till ASCII med jp2a {#jp2a}
---------------------------------------------

```bash
# Debian
apt-get install jp2a

# Mac
brew install jp2a
```

Ladda ned en bild från nätet och konvertera till ASCII-bild.

[ASCIINEMA src=11817]



Fler förslag? {#fler}
---------------------------------------------

Lägg till ditt eget förslag i forumet i [tråden för roliga terminal-kommandon](t/2596).




