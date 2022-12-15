---
author:
    - mos
revision:
    "2021-05-04": "(B, mos) Kompletterade med läsanvisningar."
    "2021-04-30": "(A, mos) Första utgåvan."
...
Kmom06: Automatiserad test
==================================

Det handlar nu om att ta vara på de tester vi kör mot vår applikation och automatisera och visualisera dem så att vi har ännu större nytta av dem och det resultat de kan ge oss. När vi pratar tester så innebär det både enhetstester och den statiska kodvalidering som våra validatorer gör åt oss. Statisk kodvalidering innebär i vårt fall både kodstandarder och det som kallas "mess detectors" som upptäcker kod med förbättringspotential.

Vi skall jobba med begrepp som automatiserad testning, automatiserad bygg av projektet samt fundera över vad det är alla validatorer försöker berätta för oss. Detta kommer vi att göra genom att påbörja en kedja av Continous integration (CI) och koppla vårt repo mot byggtjänsterna Travis CI och Scrutinizer CI och låta dem bygga och testa vår kod, varje gång vi pushar en ny committ till GitHub/GitLab.

När vi är klara får vi en badge, en liten grön/röd status-bild av bygget, som berättar om kodbygget gick bra eller inte. Vi kan också få badges som ger oss information om hur vacker vår kod är, vilken upplevd kodkvalitet som vi har producerat.

När vi är klara så kommer vi framförallt att bättre förstå innebörden av vad följande tre badges kan innebära och vi kan även bedöma om de eventuellt berättar något om ordning och reda samt kodkvaliteten i det projekt som de representerar.

[![Build Status](https://www.travis-ci.com/canax/router.svg?branch=master)](https://www.travis-ci.com/canax/router) [![Build Status](https://scrutinizer-ci.com/g/canax/database/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/database/build-status/master) [![Code Coverage](https://scrutinizer-ci.com/g/canax/router/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/router/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/database/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/database/?branch=master)

<!-- more -->

<small><i>Detta är instruktionen för kursmomentet och omfattar cirka **20 studietimmar**. Fokus ligger på uppgifter som du skall lösa och redovisa. För att lösa uppgifterna behöver du normalt jobba igenom övningar och läsanvisningar för att skaffa dig rätt kunskap och förståelse av uppgiftens alla delar. Läs igenom hela kursmomentet innan du börjar jobba.</i></small>



Uppgifter & Övningar {#uppgifter_ovningar}
-------------------------------------------

*(ca: 10-14 studietimmar)*

Uppgifter skall utföras och redovisas, övningar är träning inför uppgifterna.



### Uppgifter {#uppgifter}

Följande uppgifter skall utföras och resultatet skall redovisas.

1. Utför uppgiften "[Integrera din applikation med en CI kedja](uppgift/integrera-din-applikation-med-en-ci-kedja)".

1. Utför uppgiften "[Analysera PHP kod ur kvalitetsaspekter](uppgift/analysera-kodkvalitet-i-tre-php-moduler)"

<!--
Städa så att man jobbar vidare i en och samma katalog samt "färdigställer" sitt Yatzy så det är spelbart.

Om test mot databas använd .env.test
-->



### Övningar {#ovningar}

Följande övningar kan förbereda dig inför uppgiften.

* I kursrepot under [`example/ci`](https://github.com/dbwebb-se/mvc/tree/main/example/ci) ligger ett kort exempel som ger en översikt till de steg som krävs för att integrera med byggtjänsterna Travis CI och Scrutinizer CI. Eventuellt vill du läsa igenom det innan du påbörjar den större övningen som ligger nedan.

* Artikeln "[Integrera din packagist modul med verktyg för automatisk test och validering](kunskap/integrera-din-packagist-modul-med-verktyg-for-automatisk-test-och-validering)" visar hur man kan integrera en PHP modul eller applikation mot ett par externa bygg och kvalitetstjänster, däribland Travis CI och Scrutinizer CI. Artikeln innehåller även videomaterial. Artikeln har ett par år på nacken men användes senaste hösten 2020 i undervisningen i kursen ramverk1. Du behöver inte utföra det som står i artikeln utan den är mer tänkt som exempel för att visa hur det fungerar så det räcker med att lsäa igenom artikeln och fokusera på Travis och Scrutinizer samt se på de videorna vid behov.

<!-- Eventuellt byt ut ovan äldre artikel. Kanske spela in nya videor eller nåt annat... -->

<!-- Lägg till övning om phpmetrics enligt:
https://github.com/dbwebb-se/mvc/issues/38
-->



Läs & Studera  {#lasanvisningar}
---------------------------------

*(ca: 2-8 studietimmar)*



### Föreläsning {#flas}

Titta igenom följande föreläsningar.



#### Software quality metrics and static code analysis {#f1}

När det gäller snygg och ren kod försöker vi förstå om kodkvalitet kan mätas och visualiseras. Vilken typ av mätvärde, "metrics", kan användas och vad säger de om programvaran. Hur ska vi arbeta med valideringsverktyg för att förbättra den upplevda kvaliteten på vår programvara.

Slides till föreläsningen "[Software quality metrics and static code analysis](https://dbwebb-se.github.io/mvc/lecture/L06-static-code-analysis-and-metrics/slide.html)".

[YOUTUBE src="SjIdSbVxvk4" width=700 caption="Software quality metrics and static code analysis (med Mikael)."]



### Litteratur  {#litteratur}

Läsanvisningar finns inom uppgiften, övningen och föreläsningen.

Förlita dig på det material som finns i dokumentationerna för respektive tjänst vi använder.

Om du känner att du behöver en introduktion till "varför vi sysslar med detta" så kan du läsa om följande två begrepp som till viss mån berör problemområdet inom mätning av kvalitet av programvara och allmänt om kodkvalitet.

* [Code smell](https://en.wikipedia.org/wiki/Code_smell)
* [Technical debt](https://en.wikipedia.org/wiki/Technical_debt)



Resultat & Redovisning  {#resultat_redovisning}
-----------------------------------------------

*(ca: 1-2 studietimmar)*

Läs [instruktionen om hur du skall redovisa](./../redovisa). Observera att denna kursen skiljer sig från hur du normalt sett lämnar in din redovisningstext.

Se till att följande frågor besvaras i texten i din rapport:

* I den ena uppgiften ombeds du göra en analys för kodkvalitet kring ett par PHP-moduler samt din egen kod, gör det i rapporten.

* Hur är din egen syn på kodkvalitet? Kan man belysa den i någon viss mån med badges eller har du en annan syn?

* Hur nöjd är du med kodkvaliteten i din egen kod? Gjorde du något under detta kmom för att förbättra den och hur högt lyckades du komma i kodtäckning och kodkvalitet?

* Något annat som du anser är värt att nämna, "För övrigt anser jag att..."?

* Vilken är din TIL för detta kmom?



Resurser bra-att-ha {#resurser}
---------------------------------

Här anges övriga resurser som kan användas för vidare studier i det som kursmomentet omfattar.



### Continous integration (CI) {#ci}

Läsresurser för Continous integration.

[Continuous integration](https://en.wikipedia.org/wiki/Continuous_integration)

I trean i utbildningen Webbprogrammering läser man en [kurs devops](/kurser/devops) som handlar vidare om begreppen bakom CI.



### Travis CI {#travisci}

Läsresurser för Travis CI.

* [Travis CI](https://travis-ci.org/)
* [Travis docs](https://docs.travis-ci.com/)
* [Travis tutorial](https://docs.travis-ci.com/user/tutorial/)
* [Wikipedia om Travis CI](https://en.wikipedia.org/wiki/Travis_CI)

Badges från Travis, klicka på den för att komma till repots statussida.

[![Build Status](https://www.travis-ci.com/canax/router.svg?branch=master)](https://www.travis-ci.com/canax/router)



### Scrutinizer CI {#scrutici}

Läsresurser för Scrutinizer CI.

* [Scrutinizer CI](https://scrutinizer-ci.com/)
* [Scrutinizer docs](https://scrutinizer-ci.com/docs/)

Badges från Scrutinizer, klicka på dem för att komma till respektive repos statussida.

[![Build Status](https://scrutinizer-ci.com/g/canax/database/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/database/build-status/master) [![Code Coverage](https://scrutinizer-ci.com/g/canax/router/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/router/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/database/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/database/?branch=master)



### Software quality metrics {#metrics}

I föreläsningen om "Static code analysis - Software quality metrics of code" förekommer bland annat följande koncept som berör mätning av programvara relaterat till dess kvalitet.

* [Source lines of code](https://en.wikipedia.org/wiki/Source_lines_of_code)
* [Code duplication](https://en.wikipedia.org/wiki/Duplicate_code)
* [Cohesion](https://en.wikipedia.org/wiki/Cohesion_(computer_science))
* [Coupling](https://en.wikipedia.org/wiki/Coupling_(computer_programming))
* [Cyclomatic complexity (McCabe)](https://en.wikipedia.org/wiki/Cyclomatic_complexity)
* [CRAP score](https://www.artima.com/weblogs/viewpost.jsp?thread=215899)
* [Halstead complexity measures](https://en.wikipedia.org/wiki/Halstead_complexity_measures)
* [Maintainability index (Visual Studio)](https://docs.microsoft.com/en-us/visualstudio/code-quality/code-metrics-values?view=vs-2019)



<!--

### PHP validatorer och linters {#linters}

Lista de linters vi jobbar med

och andra som finns.



### PHP och quality metrics {#metrics}

Visa hur man kommer åt metrics i php
phploc/phpmetrics

* Fyra C:n för att komma igång med kodkvalitet.



### Verktyget phpmetrics {#phpmetrics}

* PHP kodkvalitet extra övning verktyg, kanske tips från coachen
https://phpmetrics.org/

https://github.com/dbwebb-se/mvc/issues/38

-->
