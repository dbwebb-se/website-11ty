---
author:
    - aar
    - efo
    - mos
category: python
revision:
  "2019-06-14": (J, efo) Flyttade till kmom05 istället för kmom04.
  "2019-05-24": (I, efo) Uppdaterade med förtydligande av menyval 12.
  "2017-06-14": (H, lew) Uppdaterade med en asciinema och ett krav.
  "2016-02-29": (G, mos) Uppdaterade länk till IRC-marvin.
  "2016-01-29": (F, mos) Uppdaterade länk till IRC-marvin.
  "2015-08-25": (E, mos) Uppgraderade till dbwebb v2.
  "2015-02-02": (D, mos) Ändrar cd-kommendot så det flyttar till rätt katalog.
  "2014-08-27": (C, mos) Ändrar hur uppgiften kopieras från start och skrev om lite
    text.
  "2014-08-16": (B, Sylvanas) Förtydligande av extrauppgift med länk till github.
  "2014-07-03": (A, mos) Första utgåvan i samband med kursen python.
updated: "2016-02-29 13:52:19"
created: "2014-07-03 07:52:13"
...
Din egen chattbot - Marvin - Citat
==================================

Lär Marvin att prata lite mer slumpmässigt via listor med standardsvar.



<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i Python och stränghantering och du har byggt [Marvin inventarie](uppgift/din-egen-chattbot-marvin-inventarie).



Introduktion {#intro}
-----------------------

Ett steg vidare från våran Marvin med meny är att lära honom kommandon utöver de menyval som finns. Det innebär att lära Marvin att svara på löpande text istället för siffror.

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

Se hur det kan se ut när uppgiften är klar:

[ASCIINEMA src=124661]



Krav {#krav}
-----------------------

Kopiera din Marvin från föregående kursmoment och utgå från den koden. Kopiera även filen med citat.

```bash
# Ställ dig i kurskatalogen
cd me
cp -ri kmom04/marvin3/* kmom05/marvin4/
cp -i ../example/marvin/quotes_lgtg.txt kmom05/marvin4/quotes.txt
cd kmom05/marvin4
```

1. Lär Marvin kommandot "citat". Skapa en ny fil `quote.py` och lägg hanteringen av kommandot "citat" i denna modul. Importera modulen `quote.py` i `main.py`. Presentera ett slumpmässigt citat från boken "Liftarens Guide till Galaxen", som Marvin har tillgång till i filen `quotes.txt`. Kommandot "citat" ska skrivas direkt till Marvin. Det ska **inte** ligga bakom ett menyval som tidigare.

1. Lär Marvin svara på meningar som innehåller orden "hej" och "lunch". Svaren skall slumpas fram och kombineras från de [standardsvar som IRC-Marvin använder på github](https://github.com/mosbth/irc2phpbb/blob/v0.3.1/old/irc2phpbb.py#L179-L193). Skapa ytterligare moduler om du tycker att det behövs.

[ASCIINEMA src=139383]

Förutom att Marvin kan svara med "citat", "hej" och "lunch" lägger vi även till ett menyval:

3. **Menyval 12**: där Marvin i samma sträng skriver ut: dagens datum och nuvarande tid, hur han mår (slumpmässigt humör), ett heltal, samt ett floattal med 3 decimaler. Ge talen ett sammanhang i texten.
Strängen ska hämtas från en textfil som du själv skapar och formateras med ovanstående variabler. Notera att du i programmet inte ska ändra i filen. Kursrepot innehåller ett [exempel på strängformattering med fil](https://github.com/reechani/python/blob/master/example/marvin/format.py) som du kan använda som grund för denna uppgift. Om du tycker det passar in skapa även en egen modul för detta menyval.

4. Validera Marvin genom att göra följande kommandon i kurskatalogen i terminalen.

```bash
# Ställ dig i kurskatalogen
dbwebb validate marvin4
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns inga extra uppgifter.



Tips från coachen {#tips}
-----------------------

Felsöka med debuggern, använd den när du får problem. Komplettera med utskrifter av `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
