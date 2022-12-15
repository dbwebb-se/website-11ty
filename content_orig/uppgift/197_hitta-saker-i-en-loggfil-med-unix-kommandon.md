---
author: lew
category: unix
revision:
  "2016-02-19": (C, mos) Ändrade krav 9 till forum/projekt/htmlphp.
  "2015-08-27": (B, lew) Ändrade krav "April 19th 2015" skall vara "Wed Jun 17".
  "2015-08-05": (A, lew, mos) Första utgåvan i samband med kursen linux.
updated: "2016-02-19 11:39:03"
created: "2015-07-03 14:38:37"
...
Hitta saker i en loggfil med Unix-kommandon
==================================

Du skall använda Unix-kommandon för att analysera och finna svar i en textbaserad loggfil från en irc-kanal.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har kunskaper motsvarande kapitel 6 Redirection i [boken The Linux Command Line](kunskap/boken-the-linux-command-line).



Introduktion {#intro}
-----------------------

De filer du skapar och använder i denna uppgiften skall du spara i ditt kursrepo i katalogen `me/kmom03/irc`. De används för att redovisa uppgiften.

Börja med att kopiera irc-loggen, du hittar den i exempel-katalogen `irc` i ditt kursrepo.

```bash
# Gå till ditt kursrepo
rsync -av example/irc/ me/kmom03/irc/
```

Du har nu irc-loggen `ircLog.txt`. Titta i den och bekanta dig med hur den ser ut. 

Skapa en fil, `log.txt`, och lägg den i samma katalog. Använd loggfilen för att skriva ned de kommandon du testar med. Det är dels för din egen del och dels för att läraren skall se hur du jobbat med övningen.

Skapa en fil som heter `solutions.bash`. Ge den rättigheter så filen blir körbar.

```bash
touch solutions.bash
chmod 755 solutions.bash
```

Varje uppgift nedan kan lösas men en kommandosekvens på en rad. Varje lösning skall finnas på en rad i filen `solutions.bash`.

Låt oss lösa en uppgift tillsammans, bara för att se hur det fungerar.

1. Använd `wc` för att räkna ut hur många rader ircloggen består av. Spara kommandosekvensen i `solutions.bash`. Lägg svaret som kommandot ger i filen `a.txt`. (1 poäng)

Lösningen på frågan är kommandot `wc --lines`. Se manualsidan för `wc` med `man wc`. 

För att lägga svaret, som kommandot ger, i filen `a.txt` så måste jag göra *redirect* på output från kommandot till en fil. När jag sätter samman kommandot på en rad så blir det så här.

```bash
wc --lines ircLog.txt > a.txt
```

Jag tar nu den raden och lägger i filen `solutions.bash`, den filen kan nu se ut så här, inklusive en shebang.

```bash
#!/bin/bash

# Solution to 1.
wc --lines ircLog.txt > a.txt

# Solution to 2.
# Solution to 3. Etc.
```

Använd kommentarer för att visa vilken rad som hänger ihop med vilken uppgift.

Redo? Kom ihåg, varje lösning på kommandosekvensen på en egen rad i `solutions.bash` och varje kommandosekvens gör redirect på sin output till en fil likt `a.txt` (eller `b.txt` och så vidare).

Varje lösning ger poäng. Du är klar när du har *mer än* 10 poäng.

Du kan nu köra följande kommandosekvens för att se dina lösningar.

```bash
./solutions.bash; more ?.txt
```



Krav {#krav}
-----------------------

1. Använd `wc` för att räkna ut hur många rader ircloggen består av. Spara kommandosekvensen i `solutions.bash`. Lägg svaret som kommandot ger i filen `a.txt`. (1 poäng)

1. Hitta raden med "pansars" åsikt om "notepad". (`b.txt` 1 poäng)

1. Använd `wc` för att räkna ut hur många ord, *words*, ircloggen består av. (`c.txt` 1 poäng)

1. Hitta de fyra sista raderna i filen. (`d.txt` 1p).

1. När öppnades ircloggen för första gången? Ledtråd "Log opened". Svara med raden som säger när loggen öppnades för första gången. (`e.txt` 1p)

1. Vad innehåller den tredje raden där wasa säger något? (`f.txt` 1p)

1. Hur många rader är det som är loggade enligt tiden 11:15? (`g.txt` 1p)

1. Hitta de första 10 raderna från dagen "Wed Jun 17 2015". (`h.txt` 3p)

1. Hittade raderna som är inlagda angående "forum" och innehåller detaljer om "projektet" och "htmlphp". (`i.txt` 3p)

1. Vad sa "Bobbzorzen" två rader innan han sa "cewl"? (`j.txt` 3p)

1. Hur många ord är det i den fjärde till nionde raden, under dagen "Mon Jun 08 2015"? (`k.txt` 3p)

1. Hitta den första raden där "pansar" säger något när klockan är 07:48. (`l.txt` 3p)

1. Publicera dina svar enligt följande.

```bash
# Ställ dig i kurskatalogen
dbwebb publish irc
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar. 



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!




