---
author: mos
category: python
revision:
  "2019-06-14": (I, aar) La till 4 extrauppgifter.
  "2019-05-27": (H, aar) Tog bort brackets extrauppgift.
  "2018-06-12": (G, aar) Bytt ut vissa menyval och definierat vilka siffror valen är.
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

[ASCIINEMA src=360066 caption="Marvin del 1"]



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

<!-- 1. **Menyval 2**: Ålder till sekunder. Marvin ska fråga efter din ålder och sedan skriva ut hur många sekunder du minst har levt. -->

<!-- 1. **Menyval 3**: Vikt på månen. Marvin ska fråga efter en vikt i kg och sedan skriva ut hur mycket den vikten skulle vara på månen. -->

<!-- 1. **Menyval 4**: Minuter till timmar. Marvin ska fråga efter antal minuter och sedan skriva ut hur många timmar och minuter det motsvarar. -->

1. **Menyval 2**: Celcius till Farenheit. Marvin ska fråga efter en temperatur i Celcius och sedan skriva ut motsvarande i Farenheit.

1. **Menyval 3**: Ordmultiplicering. Marvin ska fråga efter ett ord och en siffra och sedan skriva ut det ordet så många gånger.

<!-- 1. **Menyval 3**: Slumpmässiga tal. Marvin ska fråga efter min och max och sedan skriva ut 10 slumpmässiga tal mellan min och max. Dessa ska skrivas ut kommaseparerat på samma rad. Till exempel: `29, 34, 45, 43, 22, 34`. -->

1. **Menyval 4**: Summa och medel: Marvin ska fråga efter tal tills du anser dig vara klar (t.ex skriver "done") och sedan ska Marvin skriva ut summan och medelvärdet för dessa tal.

1. **Menyval 5**: Lägg till så att Marvin frågar efter tal och för varje tal angivet så ska Marvin skriva ut om det talet var större, mindre eller samma som det förra talet som skrev in. Tänk på att vid första talet angivet finns inget att jämföra med. Detta ska göras tills användaren skriver att denne är klar (t.ex “done”).

1. **Menyval 6**: Marvin ska fråga efter en sträng och skriva ut en ny sträng där varje karaktär har ökat med +1 och är separerad med "-". Exempel:
```python
input: "apa"      output: "a-pp-aaa"
input: "kassler"  output: "k-aa-sss-ssss-lllll-eeeeee-rrrrrrr"
```

6. **Menyval 7**: Gör så Marvin kan kolla om ett ord är ett isogram. Ett ord är ett isogram om det inte innehåller några återupprepande bokstäver, både i följd och icke i följd. Det är OK om den är case-sensitive, a != A. Exempel:
```python
input: "apa"      output: "No match"
input: "Dansk"    output: "Match"
```

7. Validera och publicera din kod enligt följande.

<!-- 1. Menyval: Poäng till betyg. Marvin ska fråga efter maxpoäng samt dina poäng och sedan ska Marvin skriva ut vilket betyg dina poäng motsvarade. Kika på övning 3.3 i boken [Python for Informatics](kunskap/boken-python-for-informatics-exploring-information). -->



```bash
# Ställ dig i kurskatalogen
dbwebb validate marvin1
dbwebb publish marvin1
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------
* **Menyval A1**: Gör ett val där Marvin tar emot två strängar och kollar om alla karaktärer i den andra strängen finns i den första. Exempel:
```python
input: "Python", "phno"        output: Match
input: "Programming", "gram"   output: Match
input: "kassler", "kusl"       output: No match
```

* **Menyval A2**: Dubblera tills innehåller alla siffror, gör ett menyval där Marvin räknar ut hur många gånger ett tal behöver multipliceras med två för att talet ska innehålla alla siffror mellan 0 och 9 minst en gång. Menyvalet ska ta två inputs, ett som är talet som ska multipliceras och ett input som är hur många gånger den ska försöka multiplicera innan den ger upp. Om den inte lyckas innan den ska ge upp returnera -1. Exempel:
```python
input: 1, 1000              output: 68  (295147905179352825856)
input: 1234567890, 1000     output: 0
input: 555, 10              output: -1
```

* **Menyval A3**: Ersätt tab med mellanslag, gör ett menyval där Marvin tar emot en sträng som innehåller minst en tab, ersätt varje tab med 3 mellanslag. En tab representeras av `\t`, det räknas som en karaktär, `if letter == \t`. När du skriver in input strängen till programmet använd tab tangenten, skriv inte `\t`. Skriv ut den nya strängen med mellanslag istället för tabbar. Exempel:
```python
input: "Hello\t\tworld" output: "Hello     world"
input: "The \tWheel of\tTime\tturns" output: "The    Wheel of   Time   turns"
```

* **Menyval A4**: Slå ihop namn, gör ett menyval där Marvin tar emot två namn, du kan räkna med att båda namnen bara innehåller små bokstäver. Slå ihop namnen till ett, ex. "brad" och "angelina" blir "brangelina". I det första namnet hitta ska du hitta första vokalen och spara alla konsonanter framför den, ex. "brad" blir "br" och "ben" blir "b". I det andra namnet ta bort alla konsonanter från början till första vokalen, ex. "brad" blir "ad", "angelina blir "angelina" och "sheldon" blir "eldon". Konkatenera sen den sparade delen från det första namnet med den sparade delen från det andra namnet. Vokalerna är `"a e i o u y"`, vi räknar inte med `"å ä ö"`. Exempel:
```python
input: "brad", "angelina"   output: "brangelina"
input: "sheldon", "amy"     output: "shamy"
input: "ross", "rachel"     output: "rachel"
input: "britain", "exit"    output: "brexit"
```

* **Menyval A5**: Räkna poäng, gör ett menyval där Marvin tar emot en input som ska vara en lång sträng med där varannan karaktär är en bokstav och varannan är en siffra, ex `"a2b4A5s3B1"`. En bokstav representerar en spelare och efterföljande siffra är dess poäng. Om bokstaven är liten, får spelaren poäng, om det är en stor bokstav förlorar spelaren poäng. Räkna ut och skriv ut varje spelares totala poäng. Exempel:
```python
input: "a2b4A5s3B1"   output: "a -3, b 3, s 3"
input: "g3l1H5l2G3l1"   output: "g 0, l 4, h -5"
```
Tip, nästla två for-loopar.


Tips från coachen {#tips}
-----------------------

Debugga och felsök med `pdb`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
