---
author: mos
revision:
  "2012-09-11": (D, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2010-12-01": (C, mos) Ändrade introduktionen. Förtydligade.
  "2010-03-31": (B, mos) Mindre justeringar i text, felreferenser och ändringar i
    koden efter kommentar från student.
  "2009-09-28": (A, mos) Första utgåvan
published: "2012-09-11"
updated: "2013-08-13 10:31:46"
created: "2012-08-30 08:16:59"
...
Kmom05: Objektorienterad programmering i PHP
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




Spela kort i PHP {#inledning}
--------------------------------------------------------------------

*alternativt "Objektorienterad programmering i PHP"*

Övningen går ut på att utveckla ett antal klasser för kortspel, nämligen klasserna spelkort, kortlek och korthand. Därefter tittar vi på hur vi kan lagra PHP-objekt i sessioner. Övningen avslutas med att vi programmerar kortspelet "High card low card" i form av en klass.
 
Det finns två sätt att genomföra övningen, antingen följer du instruktionerna slaviskt. Detta är bra för nybörjare som vill ha stegvis genomgång och mycket ledtrådar och kodexempel. Eller så säger du "kan själv". Då läser du första delen av varje övning och sedan kodar du själv. Om du stöter på problem så kan du alltid gå tillbaka och tjuvkika efter ledtrådar och kodexempel.

Övningens upplägg är enligt följande:

* Läsanvisningar (4-8h)
* Övningar (8-12h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.

Glöm inte att läsa litteraturen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Följande kapitel hanteras under detta kursmomentet. Läs dem inför kursmomentet.

* Ch 5: Arrays (du har läst detta tidigare)
* Ch 6: Object-Oriented PHP (du har läst detta tidigare)
* Ch 7: Advanced OOP Features (läs översiktligt)
* Ch 18: Session Handlers


Sedan tidigare har vi läst följande kapitel, gå gärna tillbaka till det vid behov:

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics
* Ch 4: Functions
* Ch 5: Arrays
* Ch 6: Object-Oriented PHP
* Ch 8: Error and Exception Handling (läs endast översiktligt)
* Ch 9: Strings and regular expressions (hoppa över reguljära uttryck)
* Ch 13: Forms


###Beginning Web Programming with HTML, XHTML, and CSS {#beginning-web}

*(2nd edition)*

Sedan tidigare har vi hanterat följande kapitel, gå gärna tillbaka till det vid behov:

* Ch 1: Creating Structured Documents
* Ch 2: Links and Navigation
* Ch 3: Images and Objects
* Ch 5: Forms


###Databasteknik {#Databasteknik}

*(Första utgåvan)*

Det finns inga specifika läsanvisningar som är kopplade till detta kursmoment.


###Nätet {#natet}

Dessa används i olika omfattning under kursmomentet, använd dem som referens.

Glöm inte din bästa vän, PHP manualen.

* <a href='http://www.php.net/manual/en/'>http://www.php.net/manual/en/</a>

W3C och dess referensmanualer är oumbärliga. Använd som referens vid behov.

* <a href='http://www.w3.org/MarkUp/'>http://www.w3.org/MarkUp/</a>
* <a href='http://www.w3.org/TR/html401/interact/forms.html'>http://www.w3.org/TR/html401/interact/forms.html</a>

W3Schools.com är bra att ha tillhanda. Använd som referens vid behov.

* <a href='http://www.w3schools.com/php/'>http://www.w3schools.com/php/</a>
* <a href='http://www.w3schools.com/html/'>http://www.w3schools.com/html/</a>
* <a href='http://www.w3schools.com/html/html_forms.asp'>http://www.w3schools.com/html/html_forms.asp</a>
* <a href='http://www.w3schools.com/html/html_xhtml.asp'>http://www.w3schools.com/html/html_xhtml.asp</a>
* <a href='http://www.w3schools.com/svg/'>http://www.w3schools.com/svg/</a>

Som lite överkurs så kan du läsa om SVG. Men gör bara det om du är intresserad, annars hoppa över det.

* <a href='http://www.w3.org/Graphics/SVG'>http://www.w3.org/Graphics/SVG</a>
* <a href='http://en.wikipedia.org/wiki/SVG'>http://en.wikipedia.org/wiki/SVG</a>


###Övrigt {#las-ovrigt}

Övriga läsresurser kommer du behöva studera i samband med kursmomentet.

* Googla på "card game high card low card"  
  <a href='http://www.google.se/search?q=card+game+high+card+low+card'>http://www.google.se/search?q=card+game+high+card+low+card</a>

* Bloggen "Fun card games"  
  <a href='http://fun-card-games.blogspot.com/2008/11/high-card-low-card.html'>http://fun-card-games.blogspot.com/2008/11/high-card-low-card.html</a>


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.

	
1. En klass för ett spelkort {#spelkort}
--------------------------------------------------------------------

Vi börjar med att göra en klass för ett spelkort. Vi gör en webbsida för att testa att spelkortet fungerar.

###1.1 Pröva om vingarna bär {#spelkort-vingar}

**Gör en klass, `CCard` (`CCard.php`), enligt följande.**

Klassen skall representera ett spelkort. Spelkortet kan ha ett värde av 2, 3, 4, 5, 6, 7, 8, 9, 10, Knekt, Dam, Kung och Ess (1) i hjärter, spader, klöver och ruter. Spelkortet kan även vara en joker. Spelkortet skall ha en framsida (värdet visas) och en baksida (inget värde visas). 

Följande publika metoder skall finnas:

| Metod | Förklaring | 
|-------|------------|
| `FlipCard()` | Används för att vända kortet, 1 argument som säger hur kortet skall vändas (up, down eller inverse). Up visar kortets framsida. Down visar kortets baksida. Inverse inverterar nuvarande visningsläge. |
| `GetCardAsId()` | Returnera en sträng som anger vilket id ett kort har, tex "S13 (0)" för spader kung med baksidan upp eller "H2 (1)" för hjärter 2 med framsidan upp. Denna funktion visar alltid kortets värde oavsett om kortets baksida eller framsida är upp. |
| `GetCardAsText()` | Visa en text-baserad representation av kortet. Visa siffran och specialtecken (♠ ♣ ♥ &diams;). Visa Θ för joker. Visa XXX om baksidan är upp. |
| `GetCardAsBox()` | Visar kortet i en div med enkel CSS för att skapa ramar och färger. Använder sig av `GetCardAsText()` för att visa själva kortets värde.|

Gör en webbsida, card.php, som påvisar att spelkortet fungerar enligt ovanstående specifikation. Ta det försiktigt med CSS, tiden försvinner fort när man leker med det. Men om du behärskar CSS så kan du göra ett riktigt snyggt spel :-).

Så här kan det se ut när du är klar.

[FIGURE src=/img/oophp/kmom05/image04.png caption="Visar testresultat för spelkort-klassen."]

Om du vill ha ledtrådar till övningen så fortsätt att läsa steg-för-steg.


###1.2 Steg för steg {#steg-for-steg}

För att kunna spela ett kortspel, tex blackjack, 21 eller poker, så behövs en kortlek. En kortlek består av 52 spelkort. Ibland används även 2 eller flera jokrar beroende på kortspel. Varje kort har en framsida och en baksida. Framsidan visar kortets "värde", tex "hjärter ess" eller "spader två".

Vill du fräscha upp ditt minne om objektorientering i PHP så kan du snabbt läsa igenom refmanualen innan du går vidare.

* <a href='http://www.php.net/manual/en/language.oop5.php'>http://www.php.net/manual/en/language.oop5.php</a>


###1.3 Kom igång {#kom-igang}

Kopiera från föregående kursmoment så att du har en webbsida att jobba i. Gör som vanligt, kopiera  `common.php`, `source.php` och `template.php`. Skapa en fil `card.php` som kan användas för att testa din kort-klass.


###1.4 `CCard.php` (medlemsvariabler) {#ccard}

Skapa en ny fil som innehåller klassen för spelkortet, `CCard.php`. Vi måste nu välja hur vi skall bygga klassen för att representera kortet. Jag väljer att göra på följande sätt. Om du vill göra en alternativ lösning så är det helt ok.

```php
class CCard {  
  // --------------------------------------------------------------------
  //
  // Member variables
  //
  private $iCardPattern;        // S (Spade), H (Hearts),
                                // C (Club), D (Diamond), X (special card)
  private $iCardValue;          // 1-13
  private $iFaceUpOrDown;   // 0 down, 1 up
  
} // End of Class
```

Tanken är att ovanstående variabler skall kunna representera de nödvändiga spelkorten och dessutom kunna säga om de ligger upp eller ned.


###1.5 CCard.php (konstruktor och destruktor) {#ccard-const}

Vi skapar en konstruktor för att initiera objekt av klassen. Läs på om konstruktorer och destruktorer i refmanualen.

* <a href='http://php.net/manual/en/language.oop5.decon.php'>http://php.net/manual/en/language.oop5.decon.php</a>

Jag låter konstruktorn ta argument så att det går att bestämma vilket kort som skapas. Så här gör jag.

```php
class CCard {  
  /* Definition of member variables here */
  // -----------------------------------------------------------------
  //
  // Constructor
  // <a href='http://www.php.net/manual/en/language.oop5.decon.php'>http://www.php.net/manual/en/language.oop5.decon.php</a>
  // Always start with face down if not stated elsewise
  //
  function __construct($aCardPattern='H', $aCardValue=1, $aFaceUpOrDown=0) {
    $this->iCardPattern          = $aCardPattern;
    $this->iCardValue            = $aCardValue;
    $this->iFaceUpOrDown         = $aFaceUpOrDown;
  }
  
} // End of Class
```

Som du ser så använder jag default-värden i argumenten som skickas till konstruktor. Det innebär att jag kan välja om jag vill skicka med argument eller inte.

Låt oss skapa en destruktor. Den kommer inte att göra något men det är mer av hyfs och vett att deklarera den. Om man alltid deklarerar den så vet man vad den gör.

```php
class CCard {  
  /* Definition of member variables here */
  /* Definition of construktor goes here */
  
  // -----------------------------------------------------------------
  //
  // Destructor
  // <a href='http://www.php.net/manual/en/language.oop5.decon.php'>http://www.php.net/manual/en/language.oop5.decon.php</a>
  //
  function __destruct() {
    ;
  }
  
} // End of Class
```

Låt oss skriva lite kod som skapar objekt av klassen. Gör detta i `card.php`. Följande kodsnutt bör fungera.

```php
// ----------------------------------------------------------------------
//
// Create and test the CCard-class
//
require_once('CCard.php');
$c1 = new CCard();
$c2 = new CCard('S', 13);
$c3 = new CCard('S', 13, 1);
```

Testkör, så länge inget felmeddelande visas så är det bra. Visst vore det intressant att se när konstruktorn och destruktorn anropas? Lägg till en `echo` i konstruktorn och en `echo` i destruktorn och kör igen. Du får säkert en varning "Warning: Cannot modify header information - headers already sent by" men det gör inget för tillfället. Du borde nu se, via dina utskrifter, när respektive konstruktor och destruktor anropas (se bild längre ned för exempel på utskrift).


###1.6 `CCard.php` (FlipCard, GetCardId, GetCardAsText, GetCardAsBox) {#ccard-metoder}

Fint, låt oss skapa ett par metoder som skriver ut kortets innehåll förutsatt att framsidan ligger upp. Vi behöver då även en metod som vi kan använda för att vända på kortet.

| Metod             | Förklaring |
|-------------------|------------|
| `FlipCard()`      | Används för att vända kortet, 1 argument som säger hur kortet skall vändas (up, down eller inverse). Up visar kortets framsida. Down visar kortets baksida. Inverse inverterar nuvarande visningsläge. |
| `GetCardAsId()`   | Returnera en sträng som anger vilket id ett kort har, tex "S13 (0)" för spader kung med baksidan upp eller "H2 (1)" för hjärter 2 med framsidan upp. Denna funktion visar alltid samma oavsett om kortets baksida eller framsida är upp. |
| `GetCardAsText()` | Visa en text-baserad representation av kortet. Visa siffran och specialtecken (♠ ♣ ♥ &diams;). Visa Θ för joker. Visa XXX om baksidan är upp. |
| `GetCardAsBox()`  | Visar kortet i en div med enkel CSS för att skapa ramar och färger. Använder sig av `GetCardAsText()` för att visa själva kortet.|

Pröva själv att implementera dessa metoder. Vill du ha ledtrådar och tips så kikar du på min kod. Kopiera om du vill. Så här kan en utskrift från `card.php` se ut när du är klar.

* <a href='http://www.student.bth.se/~mos/oophp/mom05/deckofcards1/card.php'>http://www.student.bth.se/~mos/oophp/mom05/deckofcards1/card.php</a>

[FIGURE src=/img/oophp/kmom05/image05.png caption="Visar testresultat för spelkort-klassen."]

Så kan det alltså se ut. Det spelar inte så stor roll hur korten ser ut. Det är funktionen som är viktig. Du får gärna ta min CSS-kod om du vill. Börjar man pilla med CSS så försvinner tiden oerhört fort.

Städa upp koden innan du går vidare, kommentera bort utskrifterna i konstruktorn och destruktorn.


2. En klass för en kortlek {#klass-kortlek}
--------------------------------------------------------------------

Vi fortsätter att göra en klass för en kortlek. Vi gör en webbsida för att testa att kortleken fungerar.


###2.1 Pröva om vingarna bär {#kortlek-vingar}

**Gör en klass, `CDeck` (`CDeck.php`), enligt följande.**

Kortleken skall innehålla 52 kort + 2 jokrar. Kortlekens syfte är att blanda de 54 korten och erbjuda möjligheten till att plocka översta kortet från kortleken.
Kortleken skall använda sig av klassen Kort. Korten delas alltid ut med baksidan upp. 

Följande publika metoder skall finnas:

| Metod              | Förklaring |
|--------------------|------------|
| `Shuffle()`        | Blandar lekens kort (exklusive de kort som plockats från leken). |
| `InitAndShuffle()` | Initierar leken till att innehålla alla kort och blandar leken. |
| `DealFromTop()`    | Ger ut ett kort överst från kortleken.|

Gör en webbsida, `deck.php`, som påvisar att kortleken fungerar enligt ovanstående specifikation.

Så här kan det se ut när du är klar.

[FIGURE src=/img/oophp/kmom05/image06.png caption="Visar testresultat för kortlek-klassen."]

Om du vill ha ledtrådar till övningen så fortsätt att läsa steg-för-steg.


###2.2 Steg för steg {#kortlek-stegvis}

En kortlek var det ja. Börja med att skapa testprogrammet `deck.php` och klassen `CDeck.php`.


###2.3 `CDeck.php` (medlemsvariabler) {#cdeck-medlem}

Klassens interna representation av kortleken kan göras på många olika sätt. Jag väljer att göra en array och lagra alla korten i den. Dessutom skapar jag en konstant som innehåller antalet kort i leken.

```php
require_once("CCard.php");
class CDeck {  
  // ------------------------------------------------------------------
  //
  // Member variables
  //
  // <a href='http://php.net/manual/en/language.oop5.constants.php'>http://php.net/manual/en/language.oop5.constants.php</a>
  //
  private $iCards;       // All cards in an array
  const cNumCards = 54;  // The amount of cards in this deck
  
  // ------------------------------------------------------------------
  //
  // Constructor
  // <a href='http://www.php.net/manual/en/language.oop5.decon.php'>http://www.php.net/manual/en/language.oop5.decon.php</a>
  //
  function __construct() {
    $this->iCards = Array();
    $this->InitDeckWithCards();
  }

  /* Definition for destructor goes here */
    
} // End of Class
```

Destruktorn definerar jag tom (som i klassen `CCard`). Jag skapar även en metod `InitDeckWithCards()` vars syfte är att initiera arrayen med korten. Jag väljer att definera den utanför konstruktorn eftersom den är användbar även för andra metoder.

Pröva att skriva din egen variant av `InitDeckWithCards()`, uppdatera ditt testprogram `deck.php` och testa att initiera ett objekt av klassen `CDeck`.


###2.4 CDeck.php (metoder) {#cdeck-metoder}

Låt oss skapa ett par metoder som låter oss använda klassen som en vanlig kortlek. 

Följande metoder skall finnas.

| Metod              | Förklaring |
|--------------------|------------|
| `Shuffle()`        | Blandar lekens kort (exklusive de kort som plockats från leken). |
| `InitAndShuffle()` | Initierar leken till att innehålla alla kort och blandar leken. |
| `DealFromTop()`    | Ger ut ett kort överst från kortleken. |

Pröva själv att implementera dessa metoder. Vill du ha ledtrådar och tips så kikar du på min kod. Kopiera om du vill. Så här kan en utskrift från `deck.php` se ut när du är klar.

* <a href='http://www.student.bth.se/~mos/oophp/mom05/deckofcards2/deck.php'>http://www.student.bth.se/~mos/oophp/mom05/deckofcards2/deck.php</a>

[FIGURE src=/img/oophp/kmom05/image06.png caption="Visar testresultat för kortleks-klassen."]

Så kan det alltså se ut. Städa upp i koden innan du går vidare.


3. En klass för en Korthand {#klass-korthand}
--------------------------------------------------------------------

I kortspel talar man om Handen eller Korthanden. Det innebär de kort en spelare för närvarande har på handen. Låt oss snabbt göra en klass (`CCardHand.php`) som implementerar en Korthand enligt följande.

Klassen skall lagra de Kort som hör till Spelhanden. Klassen skall ha koll på den ordning som korten kommit i. 

Följande publika metoder skall finnas:

| Metod             | Förklaring |
|-------------------|------------|
| `AddCard()`       | Lägg till ett nytt kort till handen. Kortet bifogas som argument. |
| `DropAllCards()`  | Släpp samtliga kort som finns på handen. |
| `GetCardsAsBox()` | Visa samtliga kort som finns på handen. Returnera HTML-kod som enkelt skriver ut en HTML-representation av alla kort på handen. |

Gör en webbsida, `hand.php`, som påvisar att klassen fungerar enligt ovanstående specifikation.

Pröva själv att implementera dessa metoder. Vill du ha ledtrådar och tips så kikar du på min kod. Kopiera om du vill. Så här kan det se ut när du är klar.

* <a href='http://www.student.bth.se/~mos/oophp/mom05/deckofcards3/hand.php'>http://www.student.bth.se/~mos/oophp/mom05/deckofcards3/hand.php</a>

[FIGURE src=/img/oophp/kmom05/image01.png caption="Visar testresultat för korthand-klassen."]

Städa upp i koden innan du går vidare.


4. Spara objekt i PHP's sessions variabel `$_SESSION` {#sessions-objekt}
--------------------------------------------------------------------


###4.1 Introduktion {#session-intro}

För att lagra variabler och information mellan sidanrop så används ofta sessions-variablen. I PHP heter den `$_SESSION`. Vi har tidigare sett prov på hur argument kan skickas mellan sidor via `$_GET` variabeln eller via `$_POST` variablen.

Vi ska nu göra ett exempel där vi lagrar objekt i sessions-variabeln. Detta hjälper oss att komma ihåg kortlek och spelhand mellan sidanrop. För att visa att det fungerar så gör vi ett enkelt exempel med en korthand och en kortlek.

Så här ser mitt exempel ut när jag är klar. Pröva det och se hur objekt såsom korthand och kortlek sparas mellan sidanropen. Fortsätt sedan att göra ett eget exempel som fungerar likadant. Du får gärna studera min kod och kopiera från den.

* <a href='http://www.student.bth.se/~mos/oophp/mom05/deckofcards4/session.php'>http://www.student.bth.se/~mos/oophp/mom05/deckofcards4/session.php</a>

[FIGURE src=/img/oophp/kmom05/image00.png caption="Testprogrammet visar hur sessioner fungerar."]

Fortsätt nu att göra ditt eget testprogram för sessioner. Kodexempel finner du nedan. Kolla även snabbt på följande sida för att få en översikt om PHP och sessioner.

* <a href='http://php.net/manual/en/book.session.php'>http://php.net/manual/en/book.session.php</a>


###4.2 Jobba med sessioner {#jobba-session}

Vi måste alltid anropa funktionen `session_start()` innan vi kan jobba med sessions-variabeln. Om vi lagrar objekt i sessions-variablen så måste även klassdefinitionen vara känd. Så här kan du göra.

```php
<?php
// Include class definitions
require_once('CCardHand.php');
require_once('CDeck.php');
// Load class definitions before calling session_start IMPORTANT
session_start();

?>
```


###4.3 Initiera en session {#initiera-session}

Vi initierar en ny session och lagrar variabler i sessions-arrayen enligt följande.

```php
//
// Initiating a session and storing an object in the session variable
//
// <a href='http://php.net/manual/en/function.session-start.php'>http://php.net/manual/en/function.session-start.php</a>
// <a href='http://php.net/manual/en/function.session-regenerate-id.php'>http://php.net/manual/en/function.session-regenerate-id.php</a>
//
session_start();          // Must call again if we destroyed just destroyed
                          // the session.
session_regenerate_id();  // To avoid problems
$_SESSION['hand']   = new CCardHand();
$_SESSION['deck']   = new CDeck();
$_SESSION['rounds'] = 0;
```


###4.4 Avsluta en session {#avsluta-seesion}

Att avsluta en session innebär att man förstör allt som har med sessionen att göra. Det kan ofta bli problem när man utvecklar med sessioner och glömmer att förstöra dem på rätt sätt.

```php
//
// Destroy a session.
//
// <a href='http://php.net/manual/en/function.session-destroy.php'>http://php.net/manual/en/function.session-destroy.php</a>
//
// Unset all of the session variables.
$_SESSION = array();
// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
// Finally, destroy the session.
session_destroy();
```

Det kan vara bra att lägga koden för att radera sessionen i en egen PHP-fil. Då går det enkelt att inkludera koden när den behövs.


###4.5 Ett exempel med en session {#session-example}

Gör en testsida, `session.php`. Sidan skall ta en `$_GET` variabel som säger om sessionen skall initieras eller destroyas. För att vara på den säkra sidan så förstör vi alltid sessionen i samband med att den initieras. Använd ovanstående kod för att jobba med sessioner. 

Se på följande exempel om du behöver ledtrådar.

* <a href='http://www.student.bth.se/~mos/oophp/mom05/deckofcards4/session.php'>http://www.student.bth.se/~mos/oophp/mom05/deckofcards4/session.php</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom05/deckofcards4/session.php?session=init'>http://www.student.bth.se/~mos/oophp/mom05/deckofcards4/session.php?session=init</a>
* <a href='http://www.student.bth.se/~mos/oophp/mom05/deckofcards4/session.php?session=destroy'>http://www.student.bth.se/~mos/oophp/mom05/deckofcards4/session.php?session=destroy</a>

[FIGURE src=/img/oophp/kmom05/image00.png caption="Testprogrammet visar hur sessioner fungerar."]

Bra jobbat, gör som vanligt, städa upp din kod innan du fortsätter. Sessioner kommer du att använda en hel del i din framtida PHP-programmering.


5. "High card low card", en klass för ett kortspel {#high-low}
--------------------------------------------------------------------

Kort, kortlek, korthand och sessioner. Nu har vi vad som behövs för att spela kort. Vi går vidare och skapar en klass som implementerar kortspelet "High card low card". Spelet går ut på att gissa om nästa kort är högre eller lägre än det föregående. Man fortsätter gissa så länge man gissar rätt.

Läs mer om spelet "High card low card" på webben.

* Googla på "card game high card low card"  
  <a href='http://www.google.se/search?q=card+game+high+card+low+card'>http://www.google.se/search?q=card+game+high+card+low+card</a>

* Bloggen "Fun card games"  
  <a href='http://fun-card-games.blogspot.com/2008/11/high-card-low-card.html'>http://fun-card-games.blogspot.com/2008/11/high-card-low-card.html</a>
  
Vi gör en klass som implementerar spelet och vi gör en webbsida för att testa att spelet fungerar.


###5.1 Regler för kortspelet "High card low card" {#regler}

Följande regler skall gälla för vår implementation av "High card low card".

1. Blanda kortleken med 54 kort (inklusive jokrarna).

2. Plocka ett kort, visa det.

3. Gissa om nästa kort är högre eller lägre.

4. Dra nästa kort och visa det. Om gissningen är korrekt så fortsätt, annars är spelet över.

5. När spelet är över, räkna antalet kort. Du får 1 poäng för varje rätt gissning. Det minsta du kan få är 1 poäng.

6. Är korten lika så får du fortsätta. En joker innebär alltid korrekt gissning. Nästa kort efter en joker innebär också alltid rätt oavsett gissning. Ess är högsta kortet (värde 14).


###5.2 Pröva om vingarna bär {#spel-vingar}

Gör en klass, `CHighCardLowCard` (`CHighCardLowCard.php`), enligt följande.

Klassen använder sig av klasserna Kortlek och Korthand för att implementera spelet.

Följande publika metoder skall finnas:

| Metod                | Förklaring |
|----------------------|------------|
| `StartGame()`        | Starta en ny spelrunda. Initiera och blanda leken. Plocka och visa första kortet. |
| `GuessAndPickCard()` | Gissa om nästa kort är högre eller lägre än föregående samt plocka ett nytt kort. Bifoga gissningen i argument. Returnera `TRUE` om gissningen är korrekt, annars returnera `FALSE`. |
| `GetPoints()`        | Returnerar antalet poäng, 1 poäng per korrekt gissade kort. |
| `ShowGameStatus()`   | Returnerar en HTML-version av spelplanen. |

Om du behöver stöd av fler metoder så implementerar du dem. Till exempel kan det vara bra med en metod som kan jämföra värdet på två kort. Överväg isåfall noggrant vilken klass som metoden skall implementeras i.

Gör en webbsida, `highlow.php`, som påvisar att spelet fungerar enligt ovanstående specifikation.

Så här kan det se ut när du är klar.

[FIGURE src=/img/oophp/kmom05/image02.png caption="Visar testresultat för spelet."]

Om du vill ha ledtrådar till övningen så fortsätt att läsa steg-för-steg.


###5.3 Steg för steg {#spel-stegvis}

Börja med att skapa testprogrammet `highlow.php` och klassen `CHighCardLowCard.php`.


###5.4 `CHighCardLowCard.php` (medlemsvariabler) {#spel-medlem}

Klassens interna representation av spelet kan som vanligt göras på ett antal olika sätt. Jag väljer att använda kortleken som finns samt att lagra alla plockade kort i en array.

```php
require_once("CDeck.php");
require_once("CCardHand.php");

class CHighCardLowCard {  

  // -------------------------------------------------------------------
  //
  // Member variables
  //
  //
  private $iDeck;                // An instance of CDeck
  private $iHand;                // An instance of CCardHand

  // -------------------------------------------------------------------
  //
  // Constructor
  // <a href='http://www.php.net/manual/en/language.oop5.decon.php'>http://www.php.net/manual/en/language.oop5.decon.php</a>
  //
  function __construct() {
    $this->iDeck = new CDeck();
    $this->iHand = new CCardHand();
  }
  
  /* Definition for destructor goes here */
  
} // End of Class
```

Destruktorn definerar jag tom (som i tidigare klasser). Uppdatera ditt testprogram och testa att initiera ett objekt av klassen.


###5.5 `CHighCardLowCard.php` (stommen till metoderna) {#spel-metoder}

Låt oss skapa stommen till de metoder som behövs för att spela spelet.

| Metod | Förklaring |
|-------|------------|
| `StartGame()` | Starta en ny spelrunda. Initiera och blanda leken. Plocka och visa första kortet. |
| `GuessAndPickCard()`| Gissa om nästa kort är högre eller lägre än föregående samt plocka ett nytt kort. Bifoga gissningen i argument. Returnera `TRUE` om gissningen är korrekt, annars returnera `FALSE`. |
| `GetPoints()` | Returnerar antalet poäng, 1 poäng per korrekt gissade kort. |
| `ShowGameStatus()` | Returnerar en HTML-version av spelplanen. |

Jag väljer att bygga vidare på exempel-programmet med sessioner. Det verkar ha en struktur som fungerar även för detta spelet.

Jag börjar med att skapa tomma metoder. Det betyder att jag definerar metoderna men jag skriver ännu ingen kod i dem. På det sättet kan jag utveckla mitt testprogram och anropa metoderna, trots att de inte gör något.

När jag har hela strukturen klar så kan jag gå vidare och implementera själva metoderna en och en.


###5.6 `CHighCardLowCard.php`: `StartGame()` {#startgame}

Själva koden för att starta ett spel låter jag se som följer.

**`CHighCardLowCard.php`**

```php
  // -------------------------------------------------------------------
  //
  // Start the game.
  //
  public function StartGame() {
    $this->iDeck->InitAndShuffle();
    $this->iHand->DropAllCards();
    $card = $this->iDeck->DealFromTop();
    $card->FlipCard();
    $this->iHand->AddCard($card);
  }
```

Jag blandar leken och slänger alla kort jag har på handen. Därefter plockar jag ett kort och vänder upp det.

I mitt testprogram används denna koden varje gång som ett nytt spel initieras. Som du ser så har jag lånat koden från testprogrammet med sessioner.


**`highlow.php`**

```php
// -----------------------------------------------------------------------
//
// Take care of GET variables
//
$doGame = (empty($_GET['game']) ? FALSE : $_GET['game']);
$gameOver = FALSE;
switch($doGame) {
  case 'init': { // Destroy and then initiate the session
    require('ISessionDestroy.php');
    //
    // Initiating a session and storing an object in the session variable
    //
    // <a href='http://php.net/manual/en/function.session-start.php'>http://php.net/manual/en/function.session-start.php</a>
    // <a href='http://php.net/manual/en/function.session-regenerate-id.php'>http://php.net/manual/en/function.session-regenerate-id.php</a>
    //
    session_start();          // Must call again if we just destroyed
                              // the session.
    session_regenerate_id();  // To avoid problems
    $_SESSION['game']   = new CHighCardLowCard();
    $_SESSION['game']->StartGame();
    $debug .= 'Game initiated.';
    $debug .= 'Current session id is: ' . session_id() . '<br />';
  }
  break;
```


###5.7 `CHighCardLowCard.php`: `ShowGameStatus()` {#gamestatus}

Här återanvänder jag helt enkelt koden från korthanden som skriver ut hela korthanden.

**`CHighCardLowCard.php`**

```php
  // ------------------------------------------------------------------
  //
  // Show HTML for the current game status.
  //
  //
  public function ShowGameStatus() {
    return $this->iHand->GetCardsAsBox();
  }
```

Bra med återanvändning. Samma gäller för testprogrammet där jag igen återanvänder strukturen från testprogrammet med sessioner.

**`highlow.php`**


```php
// ---------------------------------------------------------------------
//
// Test the CHighCardLowCard-class
//
//
$html .= "<h1>Spela High Card Low Card</h1>";
$html .= "<p>Gissa om nästa kort är högre eller lägre.</p>";
if(isset($_SESSION['game'])) {
  $html .= $_SESSION['game']->ShowGameStatus();
        
  $html .= <<<EOD
<p>
<a href='highlow.php?game=high'>Nästa kort är högre...</a><br/>
<a href='highlow.php?game=low'>Nästa kort är lägre...</a>
</p>
EOD;
}       
```

 
###5.8 `CHighCardLowCard.php`: `GuessAndPickCard()` {#pick-card}

Till att börja med så kan vi se hur jag anropar metoden från testprogrammet. Det görs alltså som en del i switch-case satsen som hanterar `$_GET` variablen `$doGame`. Med hjälp av den så anges om gissningen är "High" eller "Low".

**`highlow.php`**

```php
/* Parts of the switch-case */
  case 'high':
  case 'low':   
  { 
    // Guess next card is high/low card
    if($_SESSION['game']->GuessAndPickCard($doGame) == FALSE) {
      $gameOver = TRUE;
    }
    $debug .= 'Made a guess.';
  }
  break;
```

Nu över till själva implementationen av metoden. Kommer du ihåg beskrivningen av metoden?

| Metod | Förklaring |
|-------|------------|
| `GuessAndPickCard()` | Gissa om nästa kort är högre eller lägre än föregående samt plocka ett nytt kort. Bifoga gissningen i argument. Returnera `TRUE` om gissningen är korrekt, annars returnera `FALSE`. |

Ok, Jag behöver då plocka ett nytt kort och jämföra det värdet på senaste kortet. Jag jämför på två olika sätt beroende på om jag valt "high" eller "low".

**`CHighCardLowCard.php`**

```php
  // ---------------------------------------------------------------------
  //
  // Guess and pick a card. Check if card value is higher or lower.
  // Take argument to check wether new card is to be higher or lower.
  // Check according to argument and return TRUE or FALSE
  //
  public function GuessAndPickCard($aGuess) {
    $card1 = $this->iHand->GetLastCard();
    $card2 = $this->iDeck->DealFromTop();
    $card2->FlipCard();
    $this->iHand->AddCard($card2);
    
    $value1 = $card1->GetValue();
    $value2 = $card2->GetValue();
    
    $success = FALSE;
    switch($aGuess) {
      case 'high': {
        $success = ($value2 >= $value1);
      }
      break;
      
      case 'low': {
        $success = ($value2 <= $value1);
      }
      break;
    }
    
    return $success;
  }
```

Som du ser så behövde jag en metod som plockade fram värdet på korten (`GetValue()`). Jag valde att implementera den metoden i klassen för Spelkort.

Jag behövde även en metod för att plocka fram det sista kortet som spelaren fått (`GetLastCard()`). Jag valde att implementera den metoden i klassen för korthanden.
 
Jag har inte lagt till någon hantering om kortleken tagit slut. Jag väntar lite med det. Du får gärna lägga till den koden själv.

Jag har heller inte lagt till en hantering om jokrarna. Jag valde att jokrarna har värdet 0. Jag måste alltså göra ett specialfall för jokrarna. Gissningen skall ju bli korrekt oavsett vad när man har en joker. Om det nya kortet är en joker så ska gissningen alltid bli rätt. Är det gamla kortet en joker så skall gissningen alltid bli rätt. Skriv dit den koden själv (eller tjuvkika på min kod längre ned).


###5.9 Spela spelet High Card Low Card {#spela}

Mitt "färdiga" spel blev så här. Det fungerar men har en och annan förbättringspotential. Du kan säkert se dem om du letar noggrant.

* <a href='http://www.student.bth.se/~mos/oophp/mom05/deckofcards5/highlow.php'>http://www.student.bth.se/~mos/oophp/mom05/deckofcards5/highlow.php</a>

[FIGURE src=/img/oophp/kmom05/image02.png caption="Så här blev det färdiga kortspelet för High Card Low Card."]

Bra gjort. Städa upp i koden innan du går vidare.



6. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Ingen tankenöt denna gången. Har du extra kraft så lägger du den på spelet och "showar off" lite.


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.

2. Genomför momentets alla steg.

3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Besvara gärna följande:
  * Gick det bra med sessionshanteringen?. 
  * Gjorde du några extra grejer på spelet? Beskriv dem.
  * Har du förslag på alternativ lösning och implementation, eller kanske en annan syn på hur klasserna kan hänga ihop?

4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
