---
author: mos
category:
    - kurs mvc
revision:
    "2021-04-26": "(A, mos) Första utgåvan."
...
Analysera PHP kod ur kvalitetsaspekter
===================================

Analysera tre repon och jämför med en analys av ditt eget repo, gör en bedömning om kodkvalitet och föreslå förbättringsåtgärder.

Du utgår från det material som Scrutinizer CI erbjuder dig.

<!--more-->



Förkunskaper {#forkunskaper}
-----------------------

Du har sedan tidigare ett PHP-ramverk installerat med en egenutvecklad applikation som är kopplad till Scrutinizer CI.



Föreläsning {#flas}
------------------------

Här är en video som ger dig förutsättningarna till vad kodkvalitet handlar om i den form som visas från statisk kodvalidering och från Scrutinizer CI. Du bör se den innan du tar dig an uppgiften.

Slides till föreläsningen "[Software quality metrics and static code analysis](https://dbwebb-se.github.io/mvc/lecture/L06_static-code-analysis-and-metrics/slide.html)".

[YOUTUBE src="SjIdSbVxvk4" width=700 caption="Software quality metrics and static code analysis (med Mikael)."]



Introduktion och förberedelse {#intro}
-----------------------

Gör följande steg för att förbereda dig för uppgiften.



### Studera rapporter från Scrutinizer CI {#scrut}

Studera rapporterna från Scrutinizer CI om vad de berättar om din egen kod. Försök gärna förbättra din egen kod så att du får bästa möjliga betyg.

Studera nu öven rapporterna från följande tre repon som är PHP moduler/applikationer.

* [Scrutinizer CI för anax/database](https://scrutinizer-ci.com/g/canax/database/)
* [Scrutinizer CI för anax/router](https://scrutinizer-ci.com/g/canax/router/)
* [Scrutinizer CI för mosbth/cimage](https://scrutinizer-ci.com/g/mosbth/cimage/)

Du skall försöka göra en samlad bedömning om vad du kan säga om kvaliteten på dessa tre repon och hur du jämför det med ditt egna repo.

* Vad kan sägas om kodkvalitet för dessa repon?
* Vilka förbättringsförslag kan man ge reponas författare?
* Relatera gärna till begreppen
    * Coverage
    * Complexity
    * Cohesion
    * Coupling



Krav {#krav}
-----------------------

Kraven är uppdelade i sektioner.

1. Du skall göra en analys enligt ovan. Dina slutsatser skall du dokumentera i din rapport för kursen. Skriv cirka enhalv till en sida text i rapporten.

1. Om du uppdaterar din egen kod så taggar du den i en ny tagg och pushar till GitHub/GitLab och till studentservern.





<!--
Extrauppgift {#extra}
-----------------------

Lös följande extrauppgifter om du har tid och lust.

test

make, validators

21, yatzy

-->



Tips från coachen {#tips}
-----------------------

Använd de begrepp som användes i föreläsningen.

Lycka till och hojta till i chatt och forum om du behöver hjälp!
