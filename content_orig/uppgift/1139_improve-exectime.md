---
author: aar
revision:
  "2018-02-13": (A, aar) Första utgåvan i samband med kursen webapp v3.
category:
    - python
...
Förbättra exekveringstid
===================================

Du ska sätta dig in i koden för en funktion. Ta reda på vad den gör. Sedan ska du förbättra koden så den utför samma uppgift med gör det snabbare.

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du har gjort uppgiften "[Skapa lista](uppgift/skapa-lista)".
Du har läst artikeln "[Klassiska sorteringsalgoritmer](kunskap/sorteringsalgoritmer)".  



Introduktion {#intro}
-----------------------

Du ska kopiera två filer från exempel mappen. `func.py` innehåller funktionen `func`, som du ska jobba med, och funktionen `generate_random`, den kan du ignorera. "generate_random" används bara för att skapa en lista med random siffror.  
`test.py` innehåller enhetstester, du är klar med uppgiften när alla testerna går igenom. Testerna kollar hur lång tid det tar att exekvera funtionen med olika stora listorn.  
När du börjar med uppgiften kör testerna för att få en uppfattning om hur lång tid det tar att exekvera funktionen på olika stora listor. Kolla sen vilken tid du ska ner till för att bli klar.... Stor skillnad? Orora dig inte, små ändringar kan göra väldigt stor skillnad.  

Låt inte uppgiften och koden avskräcka dig. Börja med att analysera `func`s kod för att förstå vad den gör. När du gjort det, fokusera inte på koden du har utan tänk istället hur du kan skriva kod som uppnår samma resultat.  
När du lekt med koden lite och fått ner exekveringstiden ska du ta bort kommentarerna runt testerna `e` och `f`. De ska också gå igenom innan du är klar. Att köra de två testerna med orginal koden tar en evighet och är därför i kommentarer så du slipper vänta på dem i början.

Tiden det tar att exekvera koden kan bero mycket på hur bra din dator är. Så om du fortfarande har väldigt lång exekveringstid när du kör testerna på din dator testa publisera din kod och kör inspect på den. Tiderna i testerna är baserade på studentservern och tillagd marginal.


Krav {#krav}
-----------------------

Kopiera filer från [exempel/improve](https://github.com/dbwebb-se/oopython/tree/master/example/improve).

```bash
# Ställ dig i kurskatalogen
cp example/improve/*.py me/kmom06/improve
cd me/kmom06/improve
```

1. Läs introduktionen.

1. Analysera och förstå koden.

1. Ersätt koden i funktionen `func` med kod som gör samma sak fast snabbare.

1. Alla tester som finns i `test.py` ska gå igenom när du är klar. Även de två som är utkommenterade.


```bash
# Ställ dig i kurskatalogen
dbwebb validate improve
dbwebb publish improve
```

Rätta eventuella fel som dyker upp och validera igen. När det ser grönt ut så är du klar.



Extrauppgift {#extra}
-----------------------

Det finns ingen extrauppgift.



Tips från coachen {#tips}
-----------------------

Validera ofta. Så slipper du en massa valideringsfel i slutet av övningen.

Lycka till och hojta till i forumet om du behöver hjälp!
