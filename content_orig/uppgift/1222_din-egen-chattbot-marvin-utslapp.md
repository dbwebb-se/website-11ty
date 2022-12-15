---
author: aar
category: python
revision:
  "2020-09-11": (B, aar) Bytte plats på menyval 12 och 13.
  "2020-08-17": (A, aar) Skapad inför python V3 HT20.
...
Din egen chattbot - Marvin - Utsläpp
==================================

I denna övningen ska vi bygga ut Marvin så att vi kan analysera hur mycket koldioxidutsläpp varje land släpper ut.

<!--more-->

Vi har tillgång till utsläpp data för världens länder för åren 1990, 2005 och 2017. Det finns även data för ländernas antal invånare och yta.



Förkunskaper {#forkunskaper}
-----------------------

Du kan grunderna i funktioner, listor och du har gjort övningen [Dictionaries och tupler i Python](kunskap/dictionaries-och-tupler-i-python).



Introduktion {#intro}
-----------------------

I mappen "[example/emission_data](https://github.com/dbwebb-se/python/tree/master/example/emission_data)" finns modulen `emission_data.py` och innehåller all data om utsläpp och länderna. Modulen innehåller fyra variabler:

`emission_1990`: En dictionary med mängden koldioxid (i megatonnes, multiplicera med 1 000 000) som varje land släppte ut år 1990.
  
`emission_2005`: En dictionary med mängden koldioxid (i megatonnes, multiplicera med 1 000 000) som varje land släppte ut år 2005.
  
`emission_2017`: En dictionary med mängden koldioxid (i megatonnes, multiplicera med 1 000 000) som varje land släppte ut år 2017.

`country_data`: En dictionary med antalet invånare varje land har, landets storlek (i KM2) och ett heltals id som används för att identifiera länderna i ovanstående variabler.

Exampel på `emission_xxxx`:

```python
emission_1990 = {
    0: 2.546,
    1: 6.583,
}
```
Nyckeln är heltals id:et som används för att identifiera landet i `country_data`. Landet med id 0 släppte ut 2.546 megatonnes (2,546,000) koldioxid 1990.

Exampel på `country_data`:

```python
country_data = {
    'Afghanistan': 
    {
        'area': 652864.0,
        'id': 0,
        'population': (12412311, 25654274, 36296111)
    },
    'Albania': 
    {
        'area': 28748.0,
         'id': 1,
         'population': (3286070, 3086810, 2884169)
     },
}
```

Här kan vi se att landet med id 0 är Afganistan. Vi kan också se att nycklarna är ländernas namn och att värdet är en till dictionary, dictionary i dictionaries. Varje land har en egen dictionary med nycklarna `area`, `id` och `population`. Area är landets storlek, id är kopplingen till utsläpp datan och population är en tuple där första elemntet är landets antal invånare för år 1990, andra elementet år 2005 och sista elementet år 2017.

För att få ut Albaniens folkmängd 2005 skriver vi `country_data["Albania"]["population"][1]`. När ni ska räkna ut utsläpp/capita/area behöver ni multiplicera utsläppen med 1,000,000 för att uträkningarna ska bli korrekt.

Notera att alla länder inte har area, population eller utsläpps data. När du stöter på ett land som saknar den datan som behövs kan du ignorera landet. Programmet ska inte krascha. Bara låt bli att ta med det i uträkningen.

Med datan ska du lägga till nya menyval i Marvin som skriver ut hur mycket varje land släpper ut, utsläpp per capita, utsläpp per area och det ska gå att söka på vilka länder som finns i `country_data`.

För att se att dina uträkningar stämmer någorlunda kan du jämföra dina uträkningar för 2017 med de som finns i tabellen "[Fossil CO
2 emissions by country/region](https://en.wikipedia.org/wiki/List_of_countries_by_carbon_dioxide_emissions#Fossil_CO2_emissions_by_country/region)". Det kommer inte stämma 100% den använder andra källor för landytor och befolkningsmängd men det ska vara snarlika resultat.

[ASCIINEMA src=359163]



Krav {#krav}
-----------------------

1. Kopiera din Marvin från föregående kursmoment och utgå från den koden. Kopiera sen utsläpps modulen.

```bash
cd me
cp -ri kmom04/marvin3/* kmom05/marvin4/
cp ../example/emission_data/emission_data.py kmom05/marvin4/

cd kmom05/marvin4
```

2. Skapa en ny modul `emission_functions.py`, i den ska du skriva koden som har med utsläppen att göra.

3. **Menyval 12**: Användaren ska kunna söka efter vilka länder som finns i `country_data`. Sökningen ska vara case insensitive och det ska gå att söka på hela namn och delar av namn. T.ex sökning på "sweden" ska skriva ut "Sweden" och sökning på "we" ger "Zimbabwe", "Western Sahara" och "Sweden". Sökningen ska vara case-insensitive.

4. **Menyval 13**: Skriv ut hur mycket CO2 varje land släpper ut för ett av åren i storleks ordning, mest utsläpp först. Be Användaren om input där användaren skriver in vilket år som ska användas.

5. På föregående menyval, lägg till att användaren även kan skriva in hur många länder som ska skrivas ut i utskriften. T.ex. `1990 10`, då ska bara de 10 länder med mest utsläpp skrivas ut för år 1990. Om användaren enbart skriver in ett år ska alla länder skrivas ut. Ni kan välja själva om ni vill räkna från 0 eller 1.

6. **Menyval 14**: Användaren ska skriva in ett år och få utskriften varje lands utsläpp per capita, sortera i storleksordning. Det ska även gå att skriva in hur många länder som ska skriva ut. Om användaren enbart skriver in ett år ska alla länder skrivas ut.

7. **Menyval 15**: Användaren ska skriva in ett år och få utskriften varje lands utsläpp per landyta, sortera i storleksordning. Det ska även gå att skriva in hur många länder som ska skriva ut. Om användaren enbart skriver in ett år ska alla länder skrivas ut.

8. Validera och publicera Marvin genom att göra följande kommandon i kurskatalogen i terminalen.

```bash
# Flytta till kurskatalogen
dbwebb validate marvin4
dbwebb publish marvin4
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

* För menyval 13, 14 och 15, ska det även gå att skriva in en range på hur många länder som ska skrivas ut. T.ex. med input `2005 21-30`, då ska datan för 2005 användas och skriva ut länderna på plats 21 till och med 30 i det sorterade resultatet.

* För menyval 13, 14 och 15, ska det även gå att skriva in ett land för att endast få ut det landets värde.



Källor {#sources}
------------------------

CO2 utsläpp: [Fossil CO2 emissions by country/region](https://en.wikipedia.org/wiki/List_of_countries_by_carbon_dioxide_emissions#Fossil_CO2_emissions_by_country/region)  
Länders storlek: [List of countries by population in 2015](https://en.wikipedia.org/wiki/List_of_countries_by_population_in_2015)  
Länders folkmängd:  
[Population size per country 1990](https://www.populationpyramid.net/population-size-per-country/1990/)  
[Population size per country 2005](https://www.populationpyramid.net/population-size-per-country/2005/)  
[Population size per country 2017](https://www.populationpyramid.net/population-size-per-country/2017/)  
[Population, total - European Union](https://data.worldbank.org/indicator/SP.POP.TOTL?locations=EU)



Tips från coachen {#tips}
-----------------------

Försök identifiera data som används till flera menyval och skapa en funktion som returnerar den datan i en ny datastruktur. T.ex. en ny lista eller dictionary som bara innehåller den datan som behövs för menyvalen.

Dela upp koden för ett menyval i flera funktioner. Då är det lättare att hitta funktioner som går att använda för flera menyval.

För att se att dina uträkningar stämmer någorlunda kan du jämföra dina uträkningar för 2017 med de som finns i tabellen "[Fossil CO
2 emissions by country/region](https://en.wikipedia.org/wiki/List_of_countries_by_carbon_dioxide_emissions#Fossil_CO2_emissions_by_country/region)". Det kommer inte stämma 100% den använder olika källor för landytor och befolkningsmängd men det ska vara snarlika resultat.


Felsöka med debuggern/Thonny och komplettera med utskrifter av `print()`.

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
