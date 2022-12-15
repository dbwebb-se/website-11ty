---
author: aar
revision:
  "2019-05-28": (A, aar) Första revisionen.
...

Debugger i Python
==========================

Vi ska lära oss hur man använder Pythons debugger, det är ett jättebra verktyg för att felsöka sin kod men även bara för att förstå hur ens kod fungerar.

<!--more-->



Vad är en debugger? {#vad}
--------------------------

En debugger är ett program som låter oss undersöka ett programs tillstånd medans det körs. Med debuggern kan vi stega igenom programmet rad för rad (single stepping), se vad variabler har för värden och följa flödet av programmet när det exekveras. Det går även att sätta en *Breakpoint* i koden som gör att debuggern starta först när kodraden med breakpoint:en exekveras. Därifrån kan man då fortsätta att inspektera programmets tillstånd för att felsöka. Debuggern kan hjälpa oss att se om en variabel har fel värde och var i koden variabeln får det felaktiga värdet.

Debugger program finns till nästan alla programmeringsspråk och fungerar oftast likadant, därför är det jättebra att veta hur man använder en debugger. Att du som kodare använder debuggern på din kod innan du frågar efter hjälp anses som grundläggande.

I slutet av artikeln kan ni hitta en lista med debug [kommandon](#kommandon).



Hur använder vi debugger? {#hur}
---------------------------

Med debuggern i Python kan vi inte bara inspektera koden utan även påverka den under exekvering. I Python heter debuggern [pdb](https://docs.python.org/3.5/library/pdb.html), det är ett interaktiv program som körs i terminalen. Det går även att använda debuggers direkt i vissa textredigerare, t.ex Atom och VSCode.

Vi börjar med att använda debuggern bara för att stega igenom ett program för att se vad vi kan göra med debuggern, sen försöker vi använda den för att felsöka kod.

Ett av sätten att köra debuggern på är att starta ens programmet med debuggern i terminalen:

```python
python3 -m pdb file.py
```

`-m pdb` säger till Python att använda den inbyggda modulen pdb för att köra koden som finns i filen `file.py`. Vi går igenom hur man startar debuggern från koden i del 5.



### Introduktion, del 1 {#del1}

I videon nedanför introducerar Andreas hur man kan använda pdb för att stega igenom ett simpelt program. Han använder filen `example/debugger/if.py` som exempel. Följande kommandon används `l(ist), pp, n(ext), exit/quit`.

[YOUTUBE src=LsyGTmG44MQ caption="Andreas introducerar Python debuggern."]



### Fler kommandon, del 2 {#del2}

I denna videon stegar vi igenom ett lite längre program och lär oss lite mer om `l` kommandot men även nya kommandon som `ll(longlist)`, `display` och `undisplay`.

[YOUTUBE src=xXQTuTSk-Zo caption="Andreas visar fler kommandon i debuggern."]



### Breakpoints, del 3 {#del3}

I nästa video kollar vi på breakpoints och hur man kan använda debuggern för att felsöka ett program. Nya kommandon för denna videon är `b(break)`, `c(ontinue)`, `cl(ear)` och `ctrl+d`.

[YOUTUBE src=OL4vFCxuEHg caption="Andreas introducerar breakpoints"]



### Debugger i editorn VSCode {#vscode}

För er som använder editorn VSCode kan det vara intressant att använda debuggern som finns i editorn. Det är lättare att hänga med i koden jämfört med terminalen och är mer visuellt. I videon nedanför visar Andreas hur du kan komma igång med debuggern.

[YOUTUBE src=v0Ix37uWj1Q caption="Andreas visar debuggern i VSCode."]



### Debugger och funktioner, del 4 {#del4}

Vi kollar på kommandon som är användbara när man har funktioner i sin kod. `s(tep)`, `args` och `r(eturn)` samt hur `ll` fungerar i en funktion.

[YOUTUBE src=yn1V82r3R4M caption="Andreas visar hur man jobbar med debuggern och i funktioner."]



### Starta debuggern från koden, del 5 {#del5}

Ibland vill man inte starta debuggern för att sätta ut breakpoints, därför ska vi lära oss hur man kan sätta breakpoints i koden.

[YOUTUBE src=XyLPbw7KKrw caption="Andreas visar hur man startar debuggern från koden."]



Debugger kommandon {#kommandon}
---------------------------

Här kan du se en lista på de kommandon som vi går igenom ovanför.

| Kommando     | Beskrivning |
|--------------|-------------|
| `l(ist)`       | Skriver ut raderna runt den aktiva raden. Använd "l ." för att skriva ut aktiva raden igen efter använt "l" redan. |
| `p(rint)` | Skriver ut värdet för ett uttryck. |
| `pp` | Som print fast försöker göra utskriften finare, med hjälp av modulen [pprint](https://docs.python.org/3.2/library/pprint.html#module-pprint). |
| `n(ext)` | Exekvera kod tills nästa rad i scopet/functionen är nått eller functionen returnerar. |
| `ll(longlist)` | Skriv ut all kodrade i den nuvarande funktion/scopet. |
| `display` | Skriv ut värdet på variabler om de ändras. |
| `undisplay` | ta bort variabler från display. |
| `b(reak)` | Sätter ut en breakpoint på en specifik rad. |
| `c(ontinue)` | Fortsätt exekvera programmet som vanlig, avbryt när stöter på en breakpoint. |
| `ctrl+d`       | Använd tangent kombinationen för att avbryta exekvering efter gjort continue. |
| `cl(ear)` | Ta bort alla eller specifik breakpoint. |
| `s(tep)` | Exekvera nuvarande kodrad och följ med funktionsanrop. |
| `a(rgs)` | Skriv ut argumentlistan till den nuvarande funktionen. |
| `r(eturn)` | Fortsätt exekvera kod tills den nuvarande funktionen returnerar. |
| `q(uit)/exit` | Avsluta debuggern och programmet. |

Det finns fler, men de är mer avancerade och du kommer troligen inte ha användning av dem. Du kan hitta alla i [dokumentationen](https://docs.python.org/3.5/library/pdb.html#debugger-commands).



Avsluta
----------------

Då har vi tittat på debuggern i Python, det är ett jättebra verktyg för att felsöka och förstå sig på kod.
