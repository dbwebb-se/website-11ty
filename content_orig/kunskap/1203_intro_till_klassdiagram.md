---
author: aar
revision:
    "2022-01-12": (A, aar) Första versionen, utgått från "intro_till_uml".
category:
    - oopython
...
Introduktion till UML och klassdiagram
===================================

[FIGURE src=/image/oopython/kmom02/uml_diagrams.png?w=c5 class="right"]

UML står för Unified Modeling Language, det är ett visuellt modelleringsspråk för att specificera, konstruera och dokumentera artefakter i ett system.  
Det brukar användas på tre sätt:

1. Som en sketch: Informell och ofta inte fullständig, hand sketch eller på whiteboard. Används för att utforska problem.
2. Som en ritning: Används för:
    * reverse engineering, för att förstå existerande kod.
    * För att se hur ny kod ska genereras.
3. Som ett programmeringsspråk: Det finns färdiga verktyg som genererar kod baserat på UML.

Vi kommer fokusera på Klassdiagram.

<!--more-->


Terminologi {#terminologi}
-------------------------------

* **UML**: Unified modeling language.

* **Strukturdiagram**: Structure diagram på engelska. Statisk representation av strukturen i ett system.

* **Klassdiagram**: Statisk representation av den objektorienterade vyn av ett system. Visar vilka klasser systemet består av.



Strukturdiagram {#struktur_diagram}
-------------------------------

Strukturdiagram representerar strukturen, de statiska aspekterna, i ett system och visar upp artefakter som måste existera i systemet och hur de relaterar till varandra.
De statiska delarna representeras av klasser, gränssnitt, komponenter och noder. Det är ett sätt att dokumentera arkitekturen. Med arkitektur menar vi hur koden är uppbyggd.  
Det vanligaste strukturdiagrammet är _Klassdiagram_.


###Klassdiagram {#klass}

Klassdiagram representerar den objektorienterade vyn av ett system. I objektorienterad programmering försöker vi se allt som objekt, det är lätt att göra kopplingar till saker i verkligheten. Vi kan ta ett bankkonto som exempel. Om vi ska definiera vad ett bankkonto är kan vi identifiera information och funktionalitet som finns kopplat till ett bankkonto. Inte helt olikt programmering, vi har information/data i variabler och funktionalitet i funktioner.

Till ett bankkonto kan vi förvänta oss att följande data finns, namnet på ägaren, hur mycket pengar som finns på kontot och vad banken heter som kontot tillhör. Vanlig funktionalitet är att kunna sätta in och ta ut pengar.



#### Simplifierat klassdiagram {#simpel}

Nu kan vi använda UML och klassdiagram för att rita upp/dokumentera denna strukturen. Vi bryr oss inte om faktiska exempel på värden/data, utan vi vill bara dokumentera strukturen och förväntad typ av data. Nedanför kan ni se ett simplifierat klassdiagram över strukturen hos bankkontot som beskrevs ovanför.

Klassdiagrammet består av tre delar. Överst, namnet på vad vi dokumenterar. I mitten har vi vilken typ av data som finns. Längst ner har vi funktionaliteten.

[FIGURE src=/image/oopython/kmom01/bank_account_simpel.png caption="En simplifierat diagram som representerar ett bankkonto."]

Nu har vi en statiskt bild som visar samma sak som texten ovanför. Det som vi kan anse saknas är förklaring av de olika "variablerna" och "funktionerna". Bilden förutsätter att vi förstår vad de olika sakerna innebär. Här är det viktigt med förklarande namn eller att man har andra dokument eller UML diagram som förklarar innehållet. Notera att för funktionaliteten har vi skrivit dem som funktioner med parameterlista för att visa vad för data som behövs för att utföra funktionaliteten. I detta fallet mängden pengar som ska sättas in eller tas ut.



#### Ordentligt klassdiagram {#proper}

Ett riktigt klassdiagram innehåller mer information än det simplifierade. Där visas också datatypen på informationen och returvärdet från funktionerna. De olika informationsnamnen som finns kopplad till saken vi modellerar kallar vi **attribut** och funktionaliteten kallar vi **metoder**. Bankkontot har tre attribut och två metoder.

Vi kan också visa om något i strukturen ska vara dolt från utanför objektet. T.ex. så kan summan pengar som finns på kontot anses vara känsligt och vi vill skydda det, det ska inte gå att ändra eller läsa det värdet hur som helst. Då säger vi att det attributet ska vara **privat**. De andra attributen är **publika**.

Det finns också viss typ av data som vi vill ska vara samma för all konton som finns. T.ex. om vi tänker oss att alla konton vi ska skapa/jobba med tillhör samma bank, då kan vi markera att det värdet som finns i det attributet ska vara samma för alla bankkonton. För ägare och summa vill vi att de ska vara individuella attribut för varje konto, såna attribut kallas **instansattribut**. Attribut som innehåller ett värde som är samma för alla objekt, som bankens namn, kallas **statiska attribut**.

Vi använder följande symboler för att visualisera ovanstående:

* **\+** Betyder publikt attribut/metod.

* **\-** Betyder privat attribut/metod.

* **<u>namn</u>** Understruket namn betyder att attributet/metoden är statiskt.

Nedanför kan ni se ett "ordentligt" klassdiagram över bankkontot.

[FIGURE src=/image/oopython/kmom01/bank_account_class.png caption="En klassdiagram som representerar ett bankkonto."]

Diagrammet visar följande om attributen:

- `owner` är ett publikt instansattribut som innehåller ett sträng värde.
- `balance` är ett privat instansattribut som innehåller ett float värde.
- `bank_name` är ett publikt statiskt attribut som innehåller en sträng.

Diagrammet visar följande om metoderna:

- `deposit` är en publik instansmetod som returnerar ett bool värde och har en parameter som är ett decimaltal.
- `withdraw` är en publik instansmetod som returnerar ett bool värde och har en parameter som är ett decimaltal.

Nedanför kan ni se hur koden för klassdiagrammet ser ut i objektorienterad kod i Python.

```python
class BankAccount:
    """
    En klass som representerar ett bankkonto
    """
    bank_name = "Andreas Bank" # publikt statiskt attribut

    def __init__(self, owner, balance):
        self.owner = owner # publikt instansattribut
        self._balance = balance # privat instansattribut

    def deposit(self, amount): # publik metod
        """
        Vi gör inget i metoden för att vi vet inte vad den ska göra
        bara att den ska finnas.
        """
        pass

    def withdraw(self, amount): # publik metod
        pass
```



Avslutningsvis {#avslutning}
------------------------------

Det finns mer att lära sig om klassdiagram men det kollar vi på i nästa kmom.

Det finns bra verktyg online för att skapa egna uml diagram, kolla in [draw.io](https://www.draw.io).

För att läsa mer om klassdiagram kolla här, [Class diagrams](http://www.uml-diagrams.org/class-diagrams-overview.html).
