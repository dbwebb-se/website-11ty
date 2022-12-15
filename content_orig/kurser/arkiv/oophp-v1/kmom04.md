---
author: mos
revision:
  "2012-09-06": (G, mos) Flyttad från Google-doc till lydia och dbwebb.se, formatterad
    med markdown.
  "2010-11-23": (F, mos) Små justeringar i text.
  "2010-09-04": (E) Numrerade kapitlen inför HT2010, justerade lite på inlämningstexten.
  "2010-03-30": (D) Justerade kapitlen i läsanvisningarna för Beginning PHP and MySQL,
    ändrade till 3:rd edition.
  "2009-10-12": (C) Justerade textstycke under stycke 7 igen.
  "2009-09-22": (B) Justerade om litet textstycke under stycke 7.
  "2009-09-08": (A) Första utgåvan
published: "2012-09-06"
updated: "2013-08-13 10:30:47"
created: "2012-08-30 08:15:42"
...
Kmom04: Funktioner, klasser och objekt
==================================

Detta är instruktionen för kursmomentet och omfattar det som skall göras inom ramen för kursmomentet.




Tärningsspel med PHP {#start}
--------------------------------------------------------------------

*alternativt "Funktioner, klasser, objekt och arv i PHP"*

Denna övning innehåller kortare programmeringsövningar som introducerar funktioner, klasser, objekt, medlemsvariabler och arv. Övningen avslutas med att du skall programmera ett litet tärningsspel.

Övningens upplägg är enligt följande:

* Läsanvisningar (4-8h)
* Övningar (8-16h)
* Redovisning (1h)

Totalt omfattar kursmomentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar övningen.

Glöm inte att läsa litteraturen.


Läsanvisningar inför kursmomentet {#lasanvisning}
--------------------------------------------------------------------

Se till att du har kurslitteraturen på plats. Varje kursmoment föregås av en läsanvisning.

###Beginning PHP and MySQL 5, From Novice to Professional {#beginning-php}

*(Fourth edition)*

Följande kapitel hanteras under detta kursmomentet. Läs dem inför kursmomentet.

* Ch 4: Functions
* Ch 6: Object-Oriented PHP

Sedan tidigare har vi läst följande kapitel, gå gärna tillbaka till det vid behov:

* Ch 1: Introducing PHP (läs efter intresse)
* Ch 2: Configuring your environment (läs efter intresse)
* Ch 3: PHP Basics
* Ch 5: Arrays
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


Dagens övning startar här {#start}
--------------------------------------------------------------------

Låt oss starta.

	
1. En tärning {#tarning}
--------------------------------------------------------------------

I en tidigare övning så skapade vi en enkel liten tärning. Låt oss nu bygga ut den till en komplett och objektorienterad tärning.

**Gör så här:**

1. Skapa en ny katalog, `dice`. Gå in i katalogen.

2. Skapa en ny fil utifrån din `dice.php`, använd din `template.php` som bas. Glöm inte `common.php` och `source.php`.

3. Kopiera din gamla tärningsskod till `dice.php` så att du kan kasta tärningen.

4. Bygg in ett formulär som anger antalet gånger som du vill kasta tärningen.

5. Beräkna och visa medelvärdet på samtliga tärningskast.

Så här blev det hos mig.

* <a href='http://www.student.bth.se/~mos/oophp/mom04/dice1/dice.php?antal=5'>http://www.student.bth.se/~mos/oophp/mom04/dice1/dice.php?antal=5</a>

[FIGURE src=/img/oophp/kmom04/image03.png caption="En enkel tärning."]

Om du vill tjuvkika på min lösning så vet du hur du gör.


###1.1 Felhantering av input-variabler {#felhantering}

Att hantera inmatning till webbsidor är oerhört viktigt. Varje parameter måste kontrolleras så att den stämmer med det förväntade värdet. Om användaren skriver fel så kan webbapplikationen krascha eller så kan det ge upphov till oväntade säkerhetshål. Inte bra.

Ta och titta på min kod av dice och se hur jag hanterar _GET parametern. Pröva att skriva in ett tecken istället för en siffra.

* Källkod:  
  <a href='http://www.student.bth.se/~mos/oophp/mom04/dice1/source.php?dir=&file=dice.php'>http://www.student.bth.se/~mos/oophp/mom04/dice1/source.php?dir=&file=dice.php</a>

* Kasta tärning:  
  <a href='http://www.student.bth.se/~mos/oophp/mom04/dice1/dice.php'>http://www.student.bth.se/~mos/oophp/mom04/dice1/dice.php</a>

```php
// --------------------------------------------------------------------
//
// Take care of GET variables, and validate them
//
//$antal        = (empty($_GET['antal'])        ? "" : $_GET['antal']);
$antal = filter_input(INPUT_GET, 'antal', FILTER_VALIDATE_INT);
if($antal === FALSE) die("Felaktigt värde.");
```

Läs sedan på om data filtrering i refmanualen.

* <a href='http://php.net/manual/en/intro.filter.php'>http://php.net/manual/en/intro.filter.php</a>
* <a href='http://php.net/manual/en/filter.examples.validation.php'>http://php.net/manual/en/filter.examples.validation.php</a>
* <a href='http://php.net/manual/en/function.filter-input.php'>http://php.net/manual/en/function.filter-input.php</a>

Detta är en enkel, bra och nödvändig hantering för att uppnå säkra PHP-program. Du kan naturligtvis skriva egen kod för att testa dina variabler. Det går "lika" bra att tex använda funktionen `is_int()`. Men det blir lite mer kodrader att skriva så använd gärna de inbyggda funktionerna. (Grön programmering -> spara kodrader)

* <a href='http://php.net/manual/en/function.is-int.php'>http://php.net/manual/en/function.is-int.php</a>


2. Funktioner {#funktioner}
--------------------------------------------------------------------

Låt oss nu vidarutveckla vår tärning och vårt histogram över gjorda tärningsslag. Vi vill kunna använda tärningen i några av de tärningsspel som vi skall utveckla innan övningen är slut.

Ett vanligt sätt att strukturera sina program är att dela upp sin kod i filer och funktioner. En enkel funktion för tärningen skulle kunna se ut så här:

```php
// -------------------------------------------------------------------------
//
// Throw a dice, return the value.
//
function diceThrow() {
        return rand(1,6);
}
```

Refmanual beskriver funktioner här.  

* <a href='http://php.net/manual/en/language.functions.php'>http://php.net/manual/en/language.functions.php</a>


###2.1 Funktioner för Tärning, `FDice.php` {#funk-tarning}

**Gör så här:**

1. Skapa en ny fil, `FDice.php`, implementera funktionen `diceThrow()`.

2. Implementera funktionen `DiceThrowRepeated($aNumber)`. Denna funktion skall kasta tärningen ett antal gånger (`$aNumber`) och returnera en array med resultatet. Arrayen skall innehålla både `key` och `value` där `key` är vilket kast det gäller och `value` är värdet för kastet.
  * <a href='http://php.net/manual/en/language.types.array.php'>http://php.net/manual/en/language.types.array.php</a>

3. Uppdatera `dice.php` så att den använder funktionera i `FDice.php`.


###2.2 Funktioner för Histogram, `FHistogram.php` {#histogram}

**Gör så här:**

1. Skapa en ny fil, `FHistogram.php`.

2. Implementera funktionen `histogramShowValues($anArray)`. Funktionen tar en key-value array som argument och returnerar en sträng med histogrammets innehåll.

3. Implementera funktionen `histogramAverage($anArray)`. Funktionen tar en key-value array som argument och returnerar medelvärdet.

Testa så att din nya `dice.php` fungerar.

Så här ser min ut. Gör som min eller snyggare.

* <a href='http://www.student.bth.se/~mos/oophp/mom04/dice2/dice.php?antal=5'>http://www.student.bth.se/~mos/oophp/mom04/dice2/dice.php?antal=5</a>

[FIGURE src=/img/oophp/kmom04/image04.png caption="Tärning och histogram, nu med funktioner i separata filerna."]

Bra jobbat, funktioner är ett stort steg mot strukturerad kod som är enkel att återanvända.


3. Skriv ut histogrammet {#skriv-ut}
--------------------------------------------------------------------

Ett histogram är en grafisk framställning av hur många 1:or, 2:or 3:or osv som slagits med tärningen. Gör en funktion `histogramPrintGraf($anArray)` som returnerar en sträng som innehåller en sådan grafisk framställning.

Den får gärna se enkel ut, tex så kan nedanstående utskrift representera ett histogram för slagserien (1, 1, 1, 5, 6):

1: ***  
5: *  
6: *  
 
Uppdatera ditt dice-program så att det använder den nya funktionen. Något tips och tricks kan du kanske hitta på nedanstående manualsida.

* <a href='http://php.net/manual/en/array.sorting.php'>http://php.net/manual/en/array.sorting.php</a>

Så här blev det för mig. Du får gärna tjuvkika men försök lösa det själv först. Ibland kan det vara lite klurigt. Gör som jag eller snyggare :).

* <a href='http://www.student.bth.se/~mos/oophp/mom04/dice3/dice.php?antal=9'>http://www.student.bth.se/~mos/oophp/mom04/dice3/dice.php?antal=9</a>

[FIGURE src=/img/oophp/kmom04/image05.png caption="En utskrift av ett enkelt histogram-graf."]

Om du tittar på min kod och hittar ett `@`-tecken så används det för att ta bort felmeddelanden. Testa gärna min funktion med och utan `@`-tecknet. Du kommer se skillnaden. Använd bara denna konstruktion när du vet precis vad du gör. Annars kanske den gör mer skada än nytta.

* <a href='http://php.net/manual/en/language.operators.errorcontrol.php'>http://php.net/manual/en/language.operators.errorcontrol.php</a>


4. Klasser och objekt för tärning och histogram {#klasser-objekt}
--------------------------------------------------------------------

Låt oss koda om tärningen mot en mer objektorienterad variant. Om du ännu inte läst litteraturen så är det läge nu. Du bör även bekanta dig med refmanualens stycke som hanterar klasser och objekt.

* <a href='http://php.net/manual/en/language.oop5.php'>http://php.net/manual/en/language.oop5.php</a>
* <a href='http://php.net/manual/en/language.oop5.basic.php'>http://php.net/manual/en/language.oop5.basic.php</a>

Vi börjar med att göra en klass för histogrammet och fortsätter med en klass för tärningen.


###4.1 En klass för histogrammet, CHistogram {#chistogram}

**Gör så här:**

1\. Skapa en ny fil, `CHistogram.php`.

2\. Kopiera funktionerna från `FHistogram.php` till `CHistogram.php` och omringa dem med följande språkkonstruktion:
```php
class CHistogram { // Start of class

 // Alla funktionerna följer inom klassdefinitionen


} // End of class
```

3\. Läs på om synligheten för variabler och metoder (public, protected, private):  
  * <a href='http://php.net/manual/en/language.oop5.visibility.php'>http://php.net/manual/en/language.oop5.visibility.php</a>
  
  Uppdatera din kod så att rätt deklaration används framför metoderna. Är du osäker så  använd public.

4\. Som en skönhetsgrej så byter vi namn på klassens metoder, vi tar bort 'histogram' ifrån namnet i metoderna. Det ser bättre ut så, nu när det är en klass.

5\. Uppdatera `dice.php` så att det nu använder klassen `CHistogram` istället för funktionerna i i filen `FHistogram.php`. Du kommer säkert få några följdfel av dessa ändringar, felsök och fixa till dem.

```php
// Exempel på kod som är bra att ha i samband med klasser.

// Skapa ett nytt objekt av en klass
$histogram = new CHistogram();

// Anropa en metod i klassen
$graf = $histogram->PrintGraf($slag);
```

Testa så att det fungerar.


###4.2 En klass för tärningen, `CDice` {#cdice}

Gör nu samma sak med tärningen genom att skapa en ny fil `CDice.php` och utföra precis samma saker som för histogrammet.

Du kommer säkert få några följdfel av dessa ändringar, felsök och fixa till dem.

Testa så att det fungerar. "Works for me" som man brukar säga...

* <a href='http://www.student.bth.se/~mos/oophp/mom04/dice4/dice.php?antal=3'>http://www.student.bth.se/~mos/oophp/mom04/dice4/dice.php?antal=3</a>

[FIGURE src=/img/oophp/kmom04/image06.png caption="Nu med klasser och objekt istället för funktioner, men ingen skillnad på utsidan, bara insidan."]

Många förespråkar objektorientering som en bra lösning på strukturerad kodning. Glöm dock inte bort att funktioner också har sin plats i PHP-programmering. Ibland är även `include()` ett tillräckligt bra sätt att strukturera sin kod. Olika problem kan kräva olika lösningar.


5. Medlemsvariabler i klasser och objekt {#medlemsvariabler}
--------------------------------------------------------------------

Vill du läsa på om PHP klasser och objekt så finns manualsidan här.

* <a href='http://php.net/manual/en/language.oop5.basic.php'>http://php.net/manual/en/language.oop5.basic.php</a>


###5.1 Skapa en medlemsvariabel {#skapa}

Det vore bekvämt om klassen `CDice` kunde hålla koll på sin senaste slagna serie. Då kan man fråga ett objekt av klassen och be att få den senaste slagna serien. Kodmässigt skulle det kunna se ut så här i `dice.php`.

```php
// Rulla tärningen
$dice->RollRepeatedly($antal);
// Hämta föregående slagserie
$slag = $dice->iLastThrows;
```

Vi behöver alltså en medlemsvariabel, `$iLastThrows`, som kommer ihåg den senaste slagna serien.

I klassen så lägger vi till följande kod för att definera medlemsvariablen.

```php
  // --------------------------------------------------------------------
  //
  // Member variables
  //
  public $iLastThrows = Array();
```

Uppdatera resten av koden i `CDice` så att medlemsvariabeln används och alltid innehåller rätt värden. Så här gjorde jag men det finns flera olika sätt att lösa detta på.

```php
  // --------------------------------------------------------------------
  //
  // Throw a dice repeatedly, return the value(s).
  //
  public function RollRepeatedly($aNumber) {
    $this->iLastThrows = Array();
    for($i=1; $i<=$aNumber; $i++) {
      $this->iLastThrows[$i] = $this->Roll();
    }        
    return $this->iLastThrows;
  }
```

`$this` är en pekare till det egna/nuvarande objektet. `$this->iLastThrows` pekar på medlemsvariabeln.

Kolla gärna min lösning på.

* <a href='http://www.student.bth.se/~mos/oophp/mom04/dice5/dice.php?antal=5'>http://www.student.bth.se/~mos/oophp/mom04/dice5/dice.php?antal=5</a>


###5.2 Skydda medlemsvariablerna {#skydda}

En av grunderna i objektorientering är att skydda data. Det kallas även inkapsling av data. Medlemsvariabler kan vi skydda genom att ange `protected` eller `private` istället för `public`.

Normalt vill man inte att någon utanför objektet skall kunna ha tillgång till medlemsvariablerna. Normalt brukar man därför skydda dem med `private` (eller `protected`).

Skydda nu din medlemsvariabel genom att ange `private` istället för `public`. Testa och kör programmet, vad händer?

[FIGURE src=/img/oophp/kmom04/image01.png caption="Felmeddelande eftersom medlemsvariabeln nu är skyddad."]

Bra. Se till att dina medlemsvariabel är skyddad. Implementera nu en ny metod, `GetLastThrows()`, som returnerar en kopia av medlemsvariabeln. Uppdatera både `dice.php` och `CDice` så att den nya metoden används.

Fungerar det? Så här blev det för mig.

* <a href='http://www.student.bth.se/~mos/oophp/mom04/dice51/dice.php?antal=5'>http://www.student.bth.se/~mos/oophp/mom04/dice51/dice.php?antal=5</a>

Bra, nu har vi både metoder och variabler i vår klass.


6. Bygg ut en klass genom arv, `CDiceSvg extends CDice` {#extend}
--------------------------------------------------------------------

###6.1 Arv {#arc}

Låt oss bygga ut klassen `CDice` genom arv. Visst vore det trevligt att se en grafisk representation av tärningen? Den nya klassen `CDiceSvg` skall kunna allt som `CDice` kan och dessutom skall den kunna ge en grafisk representation av tärningsslagen.

Arv, eller "inheritance", är en ofta använd konstruktion i objektorienterade språk. Läs på i litteraturen och i refmanualen (sök efter extends).

*  <a href='http://php.net/manual/en/language.oop5.basic.php'>http://php.net/manual/en/language.oop5.basic.php</a>


###6.2 Gör det själv {#gor-det}

Jag föreslår följande arbetsgång, men du får gärna försöka på egen hand. 

Börja med att testa att arv fungerar.

1\. Skapa en ny fil `CDiceSvg.php`. Skapa klassen `CDiveSvg` i filen och låt den ärva från `CDice`.

```php
require_once("CDice.php");

class CDiceSvg extends CDice {  
```

2\. Uppdatera din `Dice.php` och använd klassen `CDiceSvg` istället för `CDice`. Om det funkar så funkar ditt arv. Det är bra att testa små steg i taget.

3\. Utveckla metoder i `CDiceSvg` för att rita en representation av tärningen, börja med en textbaserad representation av tärningen.

Ok, om detta fungerar för dig så har du gjort det viktiga vilket är att implementera ett arv. Nu kan du börja leka med Svg eller annan grafisk representation av tärningar. Eller så kan du helt enkelt kopiera min implementation av `CDiceSvg` (så slipper du hacka Svg).

Innan du lämnar denna övning så måste du ha en fungerande klass som ritar ut en grafisk representation av tärningen. Du behöver dock inte rita ut en Svg-representation, det går bra med en textbaserad variant och du får gärna kopiera min kod. Men pröva gärna hur bra dina egna vingar bär och gör lite på egen hand.


###6.3 Resultatet {#resultat}

Så här ser det ut för mig när jag blev klar.

* Min tärning  
  <a href='http://www.student.bth.se/~mos/oophp/mom04/dice6/dice.php?antal=6'>http://www.student.bth.se/~mos/oophp/mom04/dice6/dice.php?antal=6</a>

* Källkoden till `CDiceSvg`  
  <a href='http://www.student.bth.se/~mos/oophp/mom04/dice6/source.php?dir=&file=CDiceSvg.php'>http://www.student.bth.se/~mos/oophp/mom04/dice6/source.php?dir=&file=CDiceSvg.php</a>

[FIGURE src=/img/oophp/kmom04/image00.png caption="Nu utökad med användning av klassen CDiceSvg."]

Säga vad man vill men visst ser det roligare ut med lite grafik som kompletterar texten?

När jag gjorde `CDiceSvg` så gick jag till Wikimedia Commons och letade reda på tärningar ritade i SVG-grafik. Med lite klipp och klistra gick det bra att få in grafiken i min PHP-klass `CDiceSvg`.

* <a href='http://commons.wikimedia.org/wiki/Dice'>http://commons.wikimedia.org/wiki/Dice</a>


7. Gör ett eget tärningsspel {#tarningsspel}
--------------------------------------------------------------------

Nu har du en trevlig klass för tärning. Då kanske du är redo för utmaningen att utveckla ett litet tärningsspel? Om du vill pröva dina vingar så kan du hämta inspiration från Wikipedias sida för tärningsspel.

* <a href='http://en.wikipedia.org/wiki/Dice_game'>http://en.wikipedia.org/wiki/Dice_game</a>

En rejäl utmaning friskar upp.

Min rekommendation är dock att du nöjer dig med en enklare variant. Välj något av nedanstående förslag. Välj det alternativ som passar dina förkunskaper. Är du osäker så välj 1:an.

1. *(REKOMMENDERAS)* Kasta gris (tärningsspel).

  Kasta en tärning tills du får en 1:a, summera alla tärningskast. Välj att stanna innan du slår en 1:a, annars förlorar du alla poäng. Se hur många poäng du kan få ihop.  
  * <a href='http://en.wikipedia.org/wiki/Pig_(dice)'>http://en.wikipedia.org/wiki/Pig_(dice)</a>

2. *(EXTRA)* En Yatzy runda. 

  Kasta 5 tärningar. Välj vilka tärningar du vill spara, kasta igen. Välj vilka du vill spara, kasta igen.

3. *(EXTRA)* En slotmaskin. 

  Visa 3 x 3 tärningar, som en slotmaskin. Rulla för att visa en ny runda, välj att spara en eller två tärningar. Rulla igen. Vinst på mitten-raden.
  * <a href='http://en.wikipedia.org/wiki/Slot_machine'>http://en.wikipedia.org/wiki/Slot_machine</a>

Använd dig av tekniken du lärde dig i Hangman för att hantera formulär och skicka parametrar mellan sidanrop.

Implementera spelet så att det fungerar. Det är viktigast. Vill du göra det snyggt och stiligt för att "showa off", så är du mer än välkommen.

**Lycka till!**


8. Avslutningsvis {#avslutningsvis}
--------------------------------------------------------------------

Ingen tankenöt denna gången. Har du extra kraft så lägger du den på spelet och "showar off" lite.


Redovisning {#redovisning}
--------------------------------------------------------------------

1. Läs kurslitteraturen inför kursmomentet.

2. Genomför momentets alla steg.

3. Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. Reflektera över svårigheter/problem/lösningar/resultatet, etc. Besvara gärna följande:
  * Kommentera din syn på Objektorientering, funktionsorientering. 
  * Beskriv din egen erfarenhet av objektorienterad programmering. 
  * Beskriv vilket spel du gjorde och hur du gjorde det. Länka till ditt tärningsspel.

4. Kopiera texten och lämna in den på redovisningen (ITs) tillsammans med en länk till din me-sida. Läraren kommer snabbt kolla igenom dem. Betyg är G (godkänd) eller komplettera (komplettera -> gör om -> gör bättre). Betyget baseras på din redovisningstext samt att din me-sida fungerar.

5. Ta ytterligare en kopia av redovisningstexten och gör ett inlägg i forumet. Visa upp vad du gjort och berätta att du är klar. Lämna en länk till din me-sida.
