---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Komposition och aggregat
==================================


21 spel i sessionen, en game-klass.


Arv sägs vara en *is-a* relation, medans composition är *has-a* relation, två olika varianter av hur objekt förhåller sig till varandra när man modellerar eller bygger systemen.



Objektorienterad terminologi {#ooterm}
----------------------------------

I terminologin kring objektorientering används *is-a* och *has-a* för att bestämma vilken relation som finns mellan objekten. Det är inget speciellt för PHP utan mer universiellt när man modellerar en objektorienterad lösning. 

Relationen *is-a* innebär att en *Kolibri* är en *Fågel* eller att ett *Hus* är en *Byggnad*.

Relationen *has-a* innebär att en *Fågel* har *Vingar* eller att ett *Hus* har *Rum*.

Relationen *is-a* implementeras som arv och relationen *has-a* implementeras som en medlemsvariabel.

Vi har tittat på arv så låt oss se hur *has-a* implementeras i PHP. Själva terminologin är alltså vanlig när man modellerar. Relationen *has-a* kallas "[object composition](http://en.wikipedia.org/wiki/Object_composition)" och en variant av den är "object aggregation" där skillnaden mellan de båda är hur stark kopplingen är mellan objekten. 

För att ta ett exempel, ett Hus har ett Rum och när huset förstörs så förstörs även rummet, det är _composition_ och ett starkt beroende. Rummet kan inte existera utan Huset. _Aggregation_ säger en lösare koppling som att Huset har en Inneboende. När Huset rivs så flyttar den Inneboende till ett annat Hus, den Inneboende har ett liv, även om Huset förstörs.

[FIGURE src=image/snapvt17/oophp20-uml-composition-aggregate.png caption="Skillnaden mellan aggregation och composition, i ett UML diagram, är om romben är fylld eller ej."]

Siffran anger hur många, antalet. I bilden ovan så verkar det som det finns 5 rum i huset och att huset har 3 inneboende. Det är väldigt specifikt i detta fallet. Man skull eockså kunna modellera mer löst. Säg att Inneboende kan det finnas i ett hus, men inte säkert, det kan alltså finnas mellan 0 och flera inneboende. Det kan representeras av `0..*` eller bara en `*` i diagrammet. Att sätta siffror på antalet i en relation kallas *multiplicity*.



###En tärningshand består av fem tärningar {#dicehand}

Nåväl, låt oss göra ett exempel. Säg att vi vill spela ett tärningsspel och jag väljer att modellera en tärningshand `DiceHand` som består av så många tärningar som spelaren skall kasta varje runda. Spelar vi [Yatsy](http://sv.wikipedia.org/wiki/Yatzy) så innebär det i praktiken att tärningshanden skall bestå av fem tärningar och man skall kunna kasta tärningarna tre gånger och varje gång väljer man vilka tärningar som skall sparas.

Här har vi ett *has-a* relation där `DiceHand` består av sex stycken `DiceImage`. Rent implementationsmässigt kan man välja att kasta en tärning fem gånger, eller att kasta fem tärningar var sin gång. Jag väljer det senare eftersom det känns mer kopplat till hur verkligheten funkar, det blir (troligen) lättare att ha koll på.

[FIGURE src=image/snapvt17/oophp20-uml-dicehand.png caption="En DiceHand består av (aggregat) fem DiceImage."]

Ibland kan det vara trevligt att rita en bild över sin kod. I mitt exempel så använder jag ett fritt ritverktyg som heter [Dia](https://wiki.gnome.org/Apps/Dia/) och finns till alla plattformar. Ett liknande verktyg bör man ha i sin verktygslåda.



###Att implementera DiceHand {#dicehandimpl}

Vi kan lika gärna sätta ihop koden till DiceHand tillsammans. Vi börjar med en grov mall med medlemsvariabel och några metoder.

Här är lite ledtrådar till hur jag gjorde, du behöver inte göra på samma sätt, bara det fungerar för dig. Dessutom, när man tittar på en klass i designstadiet så är det inte säkert att den ser likadan ut när man äf färdigimplementerad. Kanske finner man bättre lösningar än ens första angreppsätt. Jag gjorde det. Men här var mitt utgångsläge.

```php
/**
 * A hand holding some dices.
 */
class DiceHand
{
    /**
     * @var integer $numDices Number of dices.
     * @var []      $ndices   Array holding the dices.
     * @var integer $sum      Hold the sum of the dices.
     */
    private $numDices;
    private $dices;
    private $sum;


    /**
     * Constructor.
     *
     * @param int $numDices Number of dices in the hand, defaults
     *                      to five dices.
     *
     * @return self
     */
    public function __construct($numDices = 5)
    {
        // create the dices in the $dices array
    }


    /**
     * Roll all dices in the hand.
     *
     * @return void
     */
    public function roll()
    {
        // roll the dices and update the sum
    }


    /**
     * Get the sum of the last roll.
     *
     * @return int Sum of the last roll, or 0 if no roll has been made.
     */
    public function getTotal()
    {
        // just return the sum
    }


    /**
     * Get the rolls as a serie of images.
     *
     * @return string The html representation of the last roll.
     */
    public function getRollsAsImageList()
    {
        // get and return a image representation of the dices thrown
    }
}
```

Känn dig fri att uppdatera dina andra klasser om det behövs. Om du gör det så tänk på det publika API:et, kanske ändrar du något som gör att en tidigare övning inte går att köra längre?

Vill du vara bakåtkompatibel så kan du alltid skapa nya klasser om det behövs. Nya klasser kan du forma som du vill. Det är ju en variant.

Ett tips är också att överväga hur du implementerar inuti klassen. Skapar du fem objekt av Dice? Eller kastar du Dice fem gånger? Vilket blir mest rätt och spelar det någon roll vilken lösning du gör inuti klassen, så länge som användaren uppfattar att han har en tärningshand med fem tärningar?



###Övning, en tärningshand {#ovning-7}

1. Gör en DiceHand som representerar en tärningshand med 5 tärningar.

1. Lägg till så att du kan skapa godtyckligt antal tärningar via querysträngen `?dices=24`.

Så här blev det för mig.

[FIGURE src=image/snapvt17/oophp20-dicehand.png?w=w2 caption="En tärningshand med <strike>fem</strike> 24 tärningar."]
