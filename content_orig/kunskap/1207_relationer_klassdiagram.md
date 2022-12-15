---
author: aar
revision:
    "2022-01-20": (A, aar) Första versionen, kopierad från "vad_ar_uml".
category:
    - oopython
...
Hur vi visar olika relationer mellan klasser i ett klassdiagram
===================================

[FIGURE src=/image/oopython/kmom02/diagrams/arv_diagram.png caption="Arvs-hierarki med Species, Animal, dog och Human."]


UML står för Unified Modeling Language, det är ett visuellt modelleringsspråk för att specificera, konstruera och dokumentera artefakter i ett system.  
Det brukar användas på tre sätt:

1. Som en sketch: Informell och ofta inte fullständig, hand sketch eller på whiteboard. Används för att utforska problem.
2. Som en ritning: Används för: 
    * reverse engineering, för att förstå existerande kod. 
    * För att se hur ny kod ska genereras.
3. Som ett programmeringsspråk: Det finns färdiga verktyg som genererar kod baserat på UML.

Nu ska vi fortsätta med klassdiagram och se hur vi kan göra dem ännu mer detaljerade för att också visa upp relationerna mellan klasserna.

<!--more-->



Förutsättning {#pre}
-------------------------------

Du kan grunderna i objektorienterad programmering, arv, komposition och aggregation.  
<!-- Du hittar exempel kod för de olika UML diagrammen i [example/uml/klass_diagram](https://github.com/dbwebb-se/oopython/tree/master/example/uml) -->



Terminologi {#terminologi}
-------------------------------

* **UML**: Unified modeling language.

* **Struktur diagram**: Structure diagram på engelska. Statisk representation av strukturen i ett system.

* **Beteende diagram**: Behavior diagram på engelska. Dynamisk bild av systemet som visar vad som händer i systemet.

* **Reverse engineering**: Att ta fram detaljerade ritningar och specifikationer på hur en produkt fungerar.

* **Kardinalitet** : Antalet objekt som är involverade i en relation.



##Relationer {#relationer}

Klasser har relationer, t.ex. arv, komposition och aggregation, detta ska visas i diagrammet. För att visa relationer används olika sorters "pilar" mellan klasserna. Tillsammans med de pilarna kan vi även förtydliga antalet objekt av klasserna som är en del av relationen, även kallat kardinalitet. T.ex. om vi har ett Car objekt använder det troligen fyra Tire objekt, det kan vi också specificera. Det gör vi med positiva tal och
asterisks(**\***, betyder oändligt), för att visa antalet instanser av varje klass som kan vara sammankopplade. Antalet visas som en intervall [minimum..maximum].

Innan vi går vidare, bekanta dig med koden som finns i [example/classes/flight](https://github.com/dbwebb-se/oopython/tree/master/example/classes/flight) så ska vi se hur ett klassdiagram för koden kan se ut.

Vi har tre klasser, `FlightController`, `Flight` och `Plane`, som har relationer till varandra. Vi ser att i klassen **Flight** finns variabeln `assigned_plane` som ska innehålla ett **Plane** objekt och **FlightController** finns det en lista som ska innehålla Flight objekt, `flights`, och en lista som ska innehålla Plane objekt, `planes`. Vi börjar med att titta på ett klassdiagram som inte visar vilka relationer som finns utan bara attribut och metoder.

[FIGURE src=/image/oopython/kmom02/diagrams/FlightPlaneAssociation.png caption="Klassdiagram utan relationer för FlightController, Flight och Plane."]
 
Försök matcha ihop bilden med koden, förstå att för varje attribut i koden finns det ett motsvarande på bilden och likadant för metoder. Se bilden som en ritning över klassen. PS, `List<Plane>` betyder att attributet är en List som ska innehålla Plane objekt.

Vi tittar på hur ett klassdiagram ser ut när vi lägger in relationerna som finns mellan klasserna.

[FIGURE src=/image/oopython/kmom02/diagrams/FlightPlaneAssociationModded.png caption="Klassdiagram med relationer för FlightController, Flight och Plane."]

På bilden har vi lagt till diamanter med sträck och siffror mellan klasserna för att visa mellan vilka klasser det är aggregation och komposition.



###Aggregation {#aggregation}

[FIGURE src=/image/oopython/kmom02/diagrams/FlightPlaneAssociationAgg.png caption="Aggregation mellan Flight och Plane."]

Aggregation visas som en linje med en genomskinlig diamant i ena änden mellan två klasser. Diamanten sitter vid den _ägande_ klassen. Flight äger Plane och siffrorna visar att ett Flight objekt kan under sin livstid innehåll antingen noll eller ett Plane objekt. Noll när Flight objektet skapas och ett när ett Plane objekt tilldelats vid schmaläggning. Det är liknande på motsatta hållet, ett plane objekt kan under sin livstid "ägas/tillhöra" noll, när det har skapats, eller ett, när det har blivit schemalagt, Flight objekt. Ett och samma Plane objekt kan inte ligga som värde i attributet `assigned_plane` i flera Flight objekt samtidigt.

Det är en aggregations relation för att instans attributet `assigned_plane` i Flight ska innehålla ett Plane objekt men Plane objektet kan existera utan att vara tilldelad till ett Flight objekt.


###Komposition {#komposition}

[FIGURE src=/image/oopython/kmom02/diagrams/FlightPlaneAssociationModded.png caption="Klassdiagram med relationer för FlightController, Flight och Plane."]

En kompositions relation ser ut som en aggregations relation förutom att det är en svart ifylld diamant istället för en genomskinlig. FlightController "äger" Plane och Flight. I programmet finns det inte något Plane eller Flight objekt utanför ett FlightController objekt, de ligger i listorna, och därför om vi raderar FlightController objektet raderas även Flight och Plane objekten, då är det kompositions förhållanden.  
För både Flight och Plane kan vi se att deras objekt bara alltid tillhör ett FlightController objekt, `1..1`, de skapas inom objektet och är kvar där tills programmet stängs av. FlightController kan innehålla noll till oändligt många Flight och Plane objekt, `o..*`. 



###Arv {#arv}

[FIGURE src=/image/oopython/kmom02/diagrams/arv_diagram.png caption="Arvs-hierarki med Species, Animal, dog och Human."]

Bilden ovan visar pilen för **arvs-relation**. Arv visas med en pil från subklassen till basklassen. Dog ärver av Animal som i sin tur ärver av Species som även Human äver av. Rutorna ska egentligen innehålla attribut och metoder som i de andra diagrammen.

Ett exempel på arv och komposition:

[FIGURE src=/image/oopython/kmom02/diagrams/fullExample_class.png caption="Arv och komposition med Customer och Order"]

Nu har vi ett ordentligt diagram utan någon kod kopplade till det. För att träna, försök föreställ er hur koden för detta diagrammet ser ut. En Customer kan ha noll till oändligt många Orders. En Order kan bara tillhöra en Customer. Order är en basklass för specialOrder och NormalOrder.


####Abstrakta klasser och metoder {#abstrakt}

Att kunna visa om en metod eller klass är abstrakt behöver vi också kunna göra. Det är väldigt simpelt. Klassnamnet och metoderna ska formateras med *italics*. Nedanför kan ni se ett klassdiagram för filtyper. Det finns många olika filtyper på en dator men alla olika typer måste ha viss gemensam funktionalitet. Då passar det utmärkt att ha en abstrakt basklass som definierar vilken funktionalitet en fil måste ha.

[FIGURE src=/image/oopython/kmom02/diagrams/abstract_inherit.png caption="Arvs-hierarki med abstrakt klass för filtyper."]

Klassen `FileType` är abstrakt och har tre abstrakta metoder. De är alla i *italics*. Subklasserna `PNG` och `PDF` är inte abstrakta och de ska implementera metoderna, därför är metoderna inte i *italics* i subklasserna.



##Association vs Aggregation vs Komposition {#Association_vs_Aggregation_vs_Komposition}

[FIGURE src=/image/oopython/kmom02/assAggComp.jpg caption="Association vs Aggregation vs Komposition."]

Det finns en tredje relation som heter *Association* som är väldigt lik aggregation, men vi använder inte den.

När ska man använda vilket? Denna fråga uppstår lätt när man ska välja mellan association och aggregation.  
Aggregation är omtalat inom UML då det är väldigt vagt vad aggregation är jämfört med association.  
Association är den mest generella relation, den visar mängd och riktning mellan klasser.  
Aggregation visar ägande mellan två klasser där den ägda klassen har en egen livscykel och är inte beroende av den ägande. Distinktionen mellan association och aggregation görs på _ägande_ , och vad innebär ägande?  
Komposition visar också ägande relationer men där klasserna måste existera tillsammans. En av klasserna äger den andra och den ägda slutar existera när den ägande gör det. Det får bara finnas ett ägande objekt. Vi tittar på ett exempel.

[FIGURE src=/image/oopython/kmom02/assAggCompEx.png caption="Association vs Aggregation vs Komposition exempel."]

Exemplet visar ett Universitet som har Departments som i sin tur har Professors som har Students. University äger Department, om University slutat existera gör även Department det och Department kan bara tillhöra ett University.
Department äger Professor, ett Department kan ha flera Professor och Professor kan tillhöra flera Department men där finns fortfarande ett slags ägande. En Professor jobbar på ett Department och Department förlorar stor del av sin funktionalitet om det inte finns några Professors. Båda kan dock existera utan varandra.  
Sist ser vi att Professor har flera Student och Student har flera Professor. Båda är medvetna och använder varandra men där är inget ägande i relationen, de bara använder varandra och därför är det association istället för aggregation.

När man ritar klassdiagram för att planera kod är det bra att börja med associations pilar och sedan specificera dem till aggregation eller komposition när man ser att det behövs.



Att planera kod {#planera_kod}
-------------------------------

I exemplet ovanför utgick vi från kod och sen kollade på ett klassdiagram, diagrammet fungerade som dokumentation för vilken kod vi har. Men hur fungerar det om vi går från andra håller? Tänk er att ni jobbar på ett nytt projekt och ska utveckla en ny applikation, det finns en projekt ledare som sköter kontakten med kunden och vad applikationen ska innehålla och en arkitekt som bestämmer hur applikationen ska vara uppbyggd. Ni ska bara implementera vad vad de andra redan har bestämt, om ni då bara får ett eller flera klassdiagram som mall för applikationen är det nästan omöjligt för er att veta hur ni ska implementera de klasserna. Vad ska ske i metoderna som finns i klassdiagrammet? Ni har bara ett metodnamn att utgå från för att gissa vad ni ska skriva för kod där. Hur löser vi det?

Jobba vidare till kmom03 så får ni svaret.



Avslutningsvis {#avslutning}
------------------------------

Det finns bra verktyg online för att rita uml diagram, kolla in [draw.io](https://www.draw.io) och [websequencediagrams](https://www.websequencediagrams.com/).

För att läsa mer om klassdiagram kolla här: [Class diagrams](http://www.uml-diagrams.org/class-diagrams-overview.html).
