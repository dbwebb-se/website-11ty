---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Objekt och sessioner
==================================

Ett objekt kan lagras i sessionen via `$_SESSION`, som vilken variabel som helst. Det kan vara en smidig hantering. Du behöver inte göra någon omvandling utan lagringen sköts automatiskt av PHP, om du gör på rätt sätt. 



###Lagra objekt i sessionen {#objektsess}

Principen bakom lagringen är att objektet serialiseras och kodas om som en ström av tecken för att kunna sparas undan på disk eller i en databas.

Datan i sessionen lagras mellan anropen på disk eller i databas. När det  är dags att läsa upp innehållet i sessionen, vid nästa sidanrop, så görs en baklänges serialisering av objektet, *unserialize*, och det blir till ett objekt igen. Detta sköts alltså automatiskt av PHP. Det enda kravet är att klassfilen finns tillgänglig, att den har inkluderats, eller att man använder en autoloader så som vi gör, innan sessionen startas. Klassens struktur måste vara känd för att det lagrade objektet skall kunna göras `unserialize()` på.

Om du missar att inkludera klassens definition, innan du startar sessionen, så får du ett felmeddelande som kan se ut som följer.

 > *Fatal error: main() [function.main]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;DiceHand&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition in /usr/home/mos/htdocs/dbwebb.se/kod-exempel/oophp20/session/dice.php on line 58*

Det finns två funktioner som används, bakom scenen, för att sköta hanteringen, `serialize()` och `unserialize()`. Du kan läsa mer om [objekt och serialisering](http://php.net/manual/en/language.oop5.serialization.php) i manualen. Du kan manuellt använda dessa funktioner då du vill spara ett objekt i en fil eller i en databas.



###Övning tärning till 21 {#ovning-8}

Gör följande övning.

1. Skapa en klass som har två tärningar och ackumulerar summan av slagen för varje gång tärningshanden slås.

På det viset kan du bygga ett tärningsspel som låter dig komma till 21, eller så nära som möjligt.

Så här blev det för mig.

[FIGURE src=image/snapvt17/oophp20-dicehand-21.png?w=w2 caption="Jag lyckades nå 21 till slut, med tärningshand i sessionen."]

Här är några ledtrådar till hur jag löste uppgiften.

Vidareutveckla din spelhand så att den kan summera alla tärningslag som du gör i en runda. Säg att du har en tärningshand med två tärningar, du skall slå dem valfritt antal gånger för att komma så nära 21 som möjligt, men inte över, för då blir du "tjock". Du skall alltså kasta din tärningshand valfritt antal gånger i din runda. Spara objektet i sessionen så att den "kommer ihåg" summan mellan kasten. Håll det enkelt, du behöver inte göra någon koll om spelaren är över 21, det får spelaren hålla koll på själv.

Jag kan välja att ärva DiceHand till en ny subklass som kunde hantera en spelomgång. Alternativet är att utöka klassen DiceHand med ny funktionalitet. Du kan göra som du tycker är bäst. Går det att utöka klassen utan att påverka dess publika API?
