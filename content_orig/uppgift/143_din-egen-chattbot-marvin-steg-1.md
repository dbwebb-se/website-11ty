---
author: mos
category: python
revision:
  "2017-06-13": (F, efo) Uppdaterade marvin menyval bort betyg och funktioner.
  "2015-08-25": (E, mos) Uppdaterade till dbwebb v2.
  "2015-01-14": (D, mos) Fel länk till förkunskaperna.
  "2014-08-27": (C, mos) Genomläst och justering hur labben initieras samt mindre
    ändringar i text.
  "2014-08-25": (B, Sylvanas) Förtydligande av sista grundkravet med hänvisning till
    övning.
  "2014-07-03": (A, mos) Första utgåvan i samband med kursen python.
updated: "2015-08-25 12:45:13"
created: "2014-07-03 07:51:23"
...
Din egen chattbot - Marvin - steg 1
==================================

Programmering och problemlösning i Python, du skall bygga en chattbot Marvin som kan svara på "alla" dina frågor.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har jobbat igenom artikeln "[Installera en labbmiljö till Python](kunskap/installera-en-labbmiljo-till-python)" och du kan grunderna i Python.



Introduktion {#intro}
-----------------------

Kopiera grundkoden för din Marvin enligt följande.

```bash
# Ställ dig i kurskatalogen
cp -i example/marvin/marvin.py me/kmom02/marvin1/
```

Gå till katalogen och testkör Marvin.

```bash
cd me/kmom02/marvin1/
./marvin.py
```

Öppna koden i en texteditor och titta igenom hur `marvin.py` fungerar.

Nu kan du börja jobba.



Krav {#krav}
-----------------------

1. Sök på bilder på [Asciiworld](http://www.asciiworld.com/) (eller motsvarande) och hitta din egen bild på "Marvin". Lägg in din bild i programmet och ersätt den med bilden på Marvin.

1. Uppdatera menyvalet för att berätta vad du heter. Byt ut hälsningsfrasen mot en annan. Du kan även byta namnet på din "Marvin", om du vill.

1. Organisera din kod i `if`-satsen inuti `while`-loopen. Samla all kod i filen `marvin.py`.

1. Menyval: Ålder till sekunder. Marvin ska fråga efter din ålder och sedan skriva ut hur många sekunder du minst har levt.

1. Menyval: Vikt på månen. Marvin ska fråga efter en vikt i kg och sedan skriva ut hur mycket den vikten skulle vara på månen.

1. Menyval: Minuter till timmar. Marvin ska fråga efter antal minuter och sedan skriva ut hur många timmar och minuter det motsvarar.

1. Menyval: Celcius till Farenheit. Marvin ska fråga efter en temperatur i Celcius och sedan skriva ut motsvarande i Farenheit.

1. Menyval: Ordmultiplicering. Marvin ska fråga efter ett ord och en siffra och sedan skriva ut det ordet så många gånger.

1. Menyval: Slumpmässiga tal. Marvin ska fråga efter min och max och sedan skriva ut 10 slumpmässiga tal mellan min och max. Dessa ska skrivas ut kommaseparerat på samma rad. Till exempel: `29, 34, 45, 43, 22, 34`.

1. Menyval: Summa och medel: Marvin ska fråga efter tal tills du anser dig vara klar (t.ex skriver "done") och sedan ska Marvin skriva ut summan och medelvärdet för dessa tal.

1. Validera och publicera din kod enligt följande.

<!-- 1. Menyval: Poäng till betyg. Marvin ska fråga efter maxpoäng samt dina poäng och sedan ska Marvin skriva ut vilket betyg dina poäng motsvarade. Kika på övning 3.3 i boken [Python for Informatics](kunskap/boken-python-for-informatics-exploring-information). -->



```bash
# Ställ dig i kurskatalogen
dbwebb validate marvin1
dbwebb publish marvin1
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

* Lägg till så att Marvin kan räkna ut arean på en cirkel, där input från användaren är radien på cirkeln.
* Lägg till så att Marvin kan räkna ut hypotenusan på en triangel där inputen är de rätvinkliga sidorna.
* Lägg till så att Marvin frågar efter tal och för varje tal angivet så ska Marvin skriva ut om det talet var större, mindre eller samma som det förra talet som skrev in. Tänk på att vid första talet angivet finns inget att jämföra med. Detta ska göras tills användaren skriver att denne är klar (t.ex “done”).



Tips från coachen {#tips}
-----------------------

Debugga och felsök genom att skriva ut variablernas olika innehåll med `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
