---
author: aar
revision:
    "2021-01-12": "(B, aar) Uppdaterade med stycke om objekt i verkligheten till programmering."
    "2018-11-16": "(A, aar) Första versionen, kopierade från php guiden och ändrat."
...

Objektorienterad programmering
==================================

Objektorienterad programmering är *en* av många programmeringsparadigmer. Ett programmeringsspråk sorteras vanligen in i en programmeringsparadigm för att beskriva hur man kan koda i det. Många språk stödjer flera programmeringsparadigmer, man kan alltså välja hur man skriver sin kod, enligt en eller flera paradigmer. Ett vanligt sätt att lära sig programmera är "[procedural programmering](https://en.wikipedia.org/wiki/Procedural_programming)". Det är det sättet du har använt dig av i tidigare kurser. Men nu handlar det alltså om den [objektorienterade programmeringsparadigmen](https://en.wikipedia.org/wiki/Object-oriented_programming).



## Vad är ett objekt?

Innan vi kollar på vad ett objekt är inom programmering kan vi kolla på "verkligheten". Vi kan säga att allt som existerar är ett objekt av något slag. En bil, en båt eller en diskmaskin, de är alla olika slags objekt. De har olika funktionaliteter och information (data) kopplat till dem.

Vi föreställer oss en generell bil, vad utgör en bil? Fyra hjul, en nummerplåt, ett model nummer, hur långt den har kört, en motor, kan förflytta sig frammåt och bakåt, spela musik och rulla upp och ner rutor osv. Ett bil objekt utgörs av informationen (data) och funktionaliteten. Informationen är nummerplåten, model numret och antalet hjul. Funktionaliteten är gasa, backa, spela musik och rulla upp och ner fönsterrutan. Vi generaliserar och säger att alla bilar består av dessa sakerna, annars är det inte en bil.

Om vi vill skapa ett eget bil objekt utgår vi från en ritning som specificerar de sakerna som vi beskrev att en bil består av. Om vi bara har en ritning så har vi inte några bilar, då har vi bara definierat vad som ska ingå i en bil. Det är först när vi bygger bilen som vi skapar ett objekt och den får ett nummer till nummerplåten, ett värde på hur långt den har kört, ett model nummer, en motor och funktionaliteten att röra sig framåt och bakåt. Om vi använder ritningen för att skapa 3 bilar så har vi tre bil objekt. Objekten är av modellen bil och varje bil objekt är också en individuell/unik instans av bil ritningen.

Vi tänker oss att du får alla tre bil objekt och för att kunna identifiera dem namnger du dem till "gamle bettan", "röda faran" och "spitfire". Alla tre är bil objekt men också individuella instanser av bilar.

Vad har detta med OO (objektorienterad) programmering att göra? Jo, inom OO försöker vi återskapa konceptet av objekt i verkligheten till kod. Om vi ska programmera ett bilspel behöver vi skapa en ritning som definierar vilken data och funktionalitet en bil består utav. Detta kallar vi en "klass" och den skriver vi i vår kod. Ett objekt däremot är inte kod, vi skapar först ett objekt när vi har startat vårt program och använder klass koden för att skapa ett objekt. Ett objekt lever i minnet på datorn.

I datorn har vi inte metall eller bensin, vi kan inte bygga faktiska bilar utan allt är "konceptuellt". Vi behöver representera informationen och funktionaliteten i en riktig bil med kod och i kod har vi variabler, datatyper och funktioner att jobba med. Klasser och objekt är ett annat sätt att programmera men det är fortfarande variabler, datatyper och funktioner fast skrivet på ett speciellt sätt och med några fler keywords i Python att använda. Detta är vad du ska lära dig i denna guiden, att kunna skriva en klass som definierar konceptet av en bil och sen skapa bil objekt från klassen.



Klass {#klass}
----------------------------------

Ett objekt skapas utifrån en klass. En klass är en mall utifrån vilken man kan skapa nya objekt. När man har skapat ett objekt kallas det en instans av klassen. Att skapa ett objekt kan kallas att [instansiera](http://en.wikipedia.org/wiki/Instance_(computer_science)) klassen till ett objekt, eller att instansiera ett objekt av klassen.

Klassen skrivs i kod och definierar vilka attribut (variabler) och metoder (funktioner) som finns i ett objekt av den klassen.



Objekt {#objekt}
----------------------------------

Ett objekt har instansattribut (properties/variabler) och metoder (funktioner kopplade till ett objekt). Instansattribut används för att lagra ett *state* av ett objekt, ett visst läge som definieras av värdet på dess instansattribut. När man vill ändra ett läge för objektet, eller bara använda objektet för att utföra en uppgift, då använder man dess metoder. Metoderna är en förteckning över vad objektet kan göra. Vi kan kalla det objektets API.

Ett objekt har all sin förmåga samlad i metoder och attribut. Allt som objektet behöver lagra finns i dess instansattribut och allt man kan göra med objektet exponeras via dess metoder. Exakt hur objektet verkställer saker och ting är objektets ansvar. Man kan säga att objektet *kapslar in* detaljerna för implementation och erbjuder endast ett publikt API (gränssnitt) i form av metoderna. Själva implementationen av metoderna är en sak för objektet själv. 



Manualen {#manualen}
----------------------------------

Vår bästa vän är som vanligt manualen som har beskrivningar över [objekt och klasser](https://docs.python.org/3/tutorial/classes.html).

> *Referensmanualen är din bästa vän.*
