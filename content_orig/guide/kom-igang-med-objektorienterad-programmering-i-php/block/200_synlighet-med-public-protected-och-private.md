---
author: mos
revision:
    "2018-03-13": "(A, mos) Första versionen, uppdelad av större dokument."
...
Synlighet med public, protected och private
==================================

När du gör en klass så bestämmer du hur medlemsvariabler och metoder skall vara synliga utanför klassen. Det gör du med nyckelorden `public`, `private` och `protected`. 

* **Publik** synlighet innebär att klassens användare kan läsa och uppdatera medlemsvariabler och anropa metoder.
* **Privat** synlighet innebär att klassens användare *inte* kan läsa eller uppdatera medlemsvariabler och *inte* kan anropa metoder.
* **Protected** påverkar synlighet i en arvshierarki och anger om metod/variabel är synlig för subklassen.

Du kan läsa om [synlighet i manualen](http://php.net/manual/en/language.oop5.visibility.php).



###Varför skydda implementationen av en klass? {#inkapsling}

I vår tärning så är alla medlemmar och metoder satta till publika. Det innebär att användaren av objektet kan både läsa och skriva till objektets medlemsvariabler. Normalt vill vi skydda klassens implementation och bara det som verkligen behövs skall vara synligt utåt. Vi vill skapa ett publikt API till klassen. Ett publikt API ger oss möjligheten att skriva vår interna kod inuti klassen som vi vill, utan att påverka användaren av klassen. Detta är en klar fördel och denna så kallade _inkapsling_ hjälper oss att minska beroenden i koden. 

Du kan alltså se det som  att du skapar ett publikt API för den som använder klassen, men den interna representationen av klassen, och hur klassen utför sin logik, behöver ingen utomstående ha koll på, det löser du som du behagar.

Du kan dessutom förändra klassens interna logik över tiden, så länge du inte förändrar klassens publika API så berör det inte användarna av klassen.

Låt oss nu studera tärningen och fundera hur den borde se ut. Det låter rimligt att lägga medlemsvariablerna som skyddade, det vill säga privata. Det innebär att jag måste erbjuda en metod för att hämta ut tärningsslagen och en metod för att ge svaret på hur många sidor tärningen har. Fördelen blir att jag då själv kan bestämma hur jag lagrar information i mina medlemsvariabler. Jag kan byta format och namn på dem utan att det stör den som använder klassen. Jag vill inte att någon skall kunna ändra antalet sidor på tärningen, när den väl är skapad, så den möjligheten behöver jag inte erbjuda som en metod.



###Klass med privata medlemmar {#priv}

Så här ser klassen ut när den är uppdaterad med privata medlemsvariabler.

```php
class Dice
{
    /** 
     * @var []      The number of rolls made.
     * @var integer The number of faces of the dice.
     */
    private $rolls = [];
    private $faces;
```

Skillnaden är endast `private` kontra `public`.



###Metoder ger läsbarhet av privata medlemmar {#readmethod}

Nu vill jag dessutom erbjuda två metoder, en för att säga hur många sidor tärningen har `getFaces()` och en för att ge slagserien som en array `getRollsAsArray()`. De blir en del av mitt tänkta publika API för klassen.

```php
    /**
     * Get the number of faces.
     *
     * @return integer Number of faces.
     */
    public function getFaces()
    {
        return $this->faces;
    }


    /**
     * Get the rolls as an array.
     *
     * @return [] Array with all rolls made.
     */
    public function getRollsAsArray()
    {
        return $this->rolls;
    }
```

På detta viset erbjuder jag läsbarhet av klassens interna medlemmar, utan att exponera dem.

Varken i klassen tärning eller histogram hittade jag någon metod som var kandidat till att bli privat. Men, vi håller ögonen öppna, en privat metod kan inte anropas av klassens användare och den används enbart inuti klassen.



###Övning privata medlemmar {#ovning-5}

Uppdatera din kod enligt följande.

1. Bygg om din klass Dice och Histogram så att alla medlemsvariabler blir privata.

1. Lägg till metoder så att användaren kan läsa av klassens innehåll utan att ha tillgång till de numer privata medlemsvariablerna.

Det blev ingen större ändring, mest en tanke om inkapsling.
