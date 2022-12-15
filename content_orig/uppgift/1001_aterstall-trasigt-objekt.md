---
author: lew
revision:
    "2016-04-12": (PA, lew) Pre-release.
category:
    - python
...
Din egen chattbot - Marvin - steg 3
===================================

Programmering och problemlösning i Python. Lär Marvin att prata lite mer slumpmässigt via listor med standardsvar.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i Python och stränghantering och du har byggt [andra delen av Marvin](uppgift/din-egen-chattbot-marvin-steg-2).



Introduktion {#intro}
-----------------------

Ett steg vidare från våran Marvin med meny är att lära honom kommandon utöver de menyval som finns. Det innebär  att lära Marvin att svara på löpande text istället för siffror.

Marvin skall kunna svara på frågor som dessa.

```text
Marvin, ge mig ett citat!
Dagens citat, tack?
Citat - för bövelen, ge mig ett!
```

Marvin skall alltså kunna ge ett citat, oavsett hur man ber om det.

Det enkla sättet att göra det är att kolla om texten som skrivs till Marvin innehåller ett visst ord, så som "citat" i detta fallet. Baserat på det skriver sedan Marvin ut ett svar, som exempelvis kan slumpas från en lista.
Du kan kika lite på hur en liknande lösning hanteras av [IRC-Marvin på github](https://github.com/mosbth/irc2phpbb/blob/v0.3.1/old/irc2phpbb.py#L358).

Vi kommer att lära Marvin att ge oss ett citat, där citaten är lagrade på fil.



Krav {#krav}
-----------------------

Kopiera din Marvin från föregående kursmoment och utgå från den koden. Kopiera även filen med citat.

```bash
# Ställ dig i kurskatalogen
cd me
cp -ri kmom03/marvin2/*.py kmom04/marvin3/
cp -i ../example/marvin/quotes_lgtg.txt kmom04/marvin3/quotes.txt
cd kmom04/marvin3
```

1. Lär Marvin kommandot "citat". Presentera ett slumpmässigt citat från boken "Liftarens Guide till Galaxen", som Marvin har tillgång till i filen `quotes.txt`.

2. Validera Marvin genom att göra följande kommandon i kurskatalogen i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb validate marvin3
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

1. Lär Marvin svara på meningar som innehåller orden "hej" och "lunch". Svaren skall slumpas fram och kombineras från de [standardsvar som IRC-Marvin använder på github](https://github.com/mosbth/irc2phpbb/blob/v0.3.1/old/irc2phpbb.py#L179-L193).



Tips från coachen {#tips}
-----------------------

Lär dig felsöka med debuggern, använd den när du får problem. Komplettera med utskrifter av `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
