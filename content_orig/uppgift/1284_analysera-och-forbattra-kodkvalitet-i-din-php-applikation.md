---
author: mos
category:
    - kurs mvc
revision:
    "2022-05-02": "(A, mos) Första utgåvan."
...
Analysera och förbättra kodkvalitet i din PHP applikation
===================================

Du skall använda ett par verktyg för att analysera kodkvaliteten i ditt PHP projekt. Ett av verktygen (phpmetrics) kan du installera och köra lokalt i din utvecklingsmiljö. Det andra verktyget (Scrutinizer CI) är en extern byggtjänst som kopplar sig mot ditt repo på GitHub/GitLab.

Använd rapporterna från dessa verktyg för att analysera kvaliteten i din kod och gör sedan ett försök att förbättra din kod och se om verktygen uppskattar dina försök genom att ge dig bättre siffror på mättalen.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har en PHP applikation som du kan analysera och du vet hur man installerar phpmetrics och du kan koppla ditt repo till Scrutinizer.



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.

Läs på snabbt så du har koll på de fyra C:na om kodkvalitet (4C).

* Coverage
* Complexity
* Cohesion
* Coupling

Din undersökning om kodkvalitet på din egen kod kan utgå från dem. Men glöm inte bort att det finns fler mättal som kan vara intressanta.

Uppgiften handlar dels om att göra din egen analys av kodkvalitet med hjälp av phpmetrics och Scrutinizer. Därefter skall du välja tre förbättringsmöjligheter och genomföra dem och därefter analysera om och hur det påverkade rapporterna från phpmetrics och Scrutinizer.



Krav {#krav}
-----------------------

Kraven är uppdelade i sektioner.



### Kodkvalitet {#kvalitet}

<!--
Ge process till hur man kan analyser programvaran och komma med förbättringsförslag.

Samla rå mätdata som en deluppgift

Länka till övning som ger förslag på metrics att jobba med

Relatera till övning som visar hur man kan analysera tre exempelprojekt
Jämför ditt egna projekt med exempelprojekten

Fixa så att phpunit kan integreras med phpmetrics

Föreslå tre olika standardsätt att förbättra mätvärden.
    * Fixa issues
    * Öka kodtäckning
    * Fokusera på kvalitetsindex i Scrutinizer
    * Minska komplexiteten i class/metod
-->

1. Skapa en landningssida för din "Metrics" som handlar om kodkvalitet. Placera landningssidan i din navbar. Du skriver din rapport i denna landningssidan.

1. Börja med en rubrik "Introduktion" där du förklarar de fyra C:na och hur de kan påverka kodens kvalitet. Exemplifiera med några mätvärden för de fyra C:na som är kopplade till din egen kod och ge en kort förklaring relaterad till kodkvalitet.

1. Skapa en rubrik "Phpmetrics" och analysera dess rapport för din kod. Använd 4C på utvalda delar av din kod och hitta minst ett ytterligare mätvärde som du väljer att ta upp. Använd mätvärdena för att hitta flaskhalsar och svaga punkter i din kod. Det vill alltså hitta koddelar som du kan uppdatera för att få bättre mätvärden.

1. Skapa en rubrik "Scrutinizer" och analysera dess rapport för din kod. Hitta minst 3 svagheter som kan förbättras. Det kan vara samma som för phpmetrics eller nya. Huvudsaken är att du kan använda rapporten från Scrutinizer som stöd för att det är delar som behöver förbättras. Förutom 4C så skall du även hitta minst ett ytterligare mätvärde som du fann intressant hos Scrutinizer.

1. Skapa en ny rubrik "Förbättringar" där du väljer minst 3 förbättringar som du vill göra med din kod.

    * Börja med att skriva om förbättringarna, vad du tänker göra, varför du väljer dem och hur du tror det kommer påverka mätvärdena för kvalitet.
    * Implementera sedan förbättringarna.
    * Analysera därefter rapporterna från phpmetrics och Scrutinizer och notera de nya mätvärdena.
    * Gör det tydligt hur mätvärdena såg ut innan och efter dina förbättringar.

1. Avsluta med ett stycke "Diskussion" där du diskuterar kort kring det du nyss gjort. Kan man aktivt jobba med kodkvalitet på detta sättet? Finns det fördelar och kanske nackdelar?



### Publicera {#publicera}

1. Committa alla filer och lägg till en tagg 6.0.0. Om du gör uppdateringar så ökar du taggen till 6.0.1, 6.0.2, 6.1.0 eller liknande.

1. Kör `dbwebb test kmom06` för att kolla att du inte har några fel.

1. Pusha upp repot till GitHub, inklusive taggarna.

1. Gör en `dbwebb publishpure report` och kontrollera att att det fungerar på studentservern.



<!--
Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

-->



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i chatt och forum om du behöver hjälp!
