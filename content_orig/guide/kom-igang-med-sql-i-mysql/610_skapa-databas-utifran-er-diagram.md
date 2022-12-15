---
author: mos
revision:
    "2018-01-20": "(A, mos) Första utgåvan."
...
Skapa databas utifrån ER diagram
==================================

Denna gången börjar vi med helt nya tabeller, enbart för denna delen av guiden. Det finns ett ER-diagram du kan utgå ifrån när du skapar tabellerna.



ER-modell skolan version 2 {#er}
----------------------------------

Följande är beskrivningen över databasen i version 2, dess entiteter och relationer.

> "Skolan har utbildningsprogram som har antagning varje år. Ett program har alltså ett eller flera programtillfällen då programmet ges. Varje programtillfälle har sin egen uppsättning av kurstillfällen som beställs av den programansvarige. En kurs ges på ett eller flera kurstillfällen. En lärare är kursansvarig i varje kurs och det är en lärare som är programansvarig. Den som är programansvarig beställer kurstillfällen till programmet, rektorn kan sedan godkänna det beställda kurstillfället."

Vi kan lista de entiteter som bör bli tabeller, tvåan lägger vi till så att de nya tabellerna inte krockar med de befintliga.

* kurs2
* kurstillfalle2
* program2
* programtillfalle2
* larare2

När man går igenom vilka attribut som behövs i varje tabell så blir det så här. Föreslagen primärnyckel är understruken och främmande nycklar är kursiva.

* larare2 (<u>akronym</u>, avdelning, fornamn, efternamn, kon, lon, fodd)
* kurs2 (<u>kod</u>, namn, poang, niva)
* kurstillfalle2 (<u>id</u>, _kurskod_, _kursansvarig_, lasperiod, _programtillfalle_, status, created, updated)
* program2 (<u>kod</u>, namn, _ansvarig_)
* programtillfalle2 (<u>kod</u>, antagning, _program_)

Så här kan det bli när man ritar upp modellen i ett diagram och anger datatyper för attributen.

[FIGURE src=image/snapvt18/skolan2-er.png?w=w3 caption="ER-diagram över version 2 av databasen."]

Din uppgift är att skapa tabellerna med primärnycklar och främmande nycklar. 
