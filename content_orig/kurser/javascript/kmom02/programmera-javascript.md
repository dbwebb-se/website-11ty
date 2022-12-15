---
author: mos
category: javascript
updated: "2015-11-11 14:55:16"
created: "2012-07-03 12:05:07"
...
Programmering med grunderna i JavaScript
==================================

En programmeringsguide som behandlar grunderna i programmeringsspråket JavaScript. Övningen börjar med grunderna som literaler och variabler och tar dig via funktioner, arrayer och objekt till en förhoppningsvis stabil grundnivå av kunskaper i JavaScript Core, kärnan i programmeringsspråket JavaScript. 

Efter vägen får du pröva dina vingar i att skriva ett par övningsuppgifter. Även om du kan kopiera så är det betydligt smartare att du själv skriver in koden i dina egna exempelprogram. Det är bra om du kan minst ett programmeringsspråk, gärna två, innan du ger dig på denna guide.

<!--more-->

[INFO]
**Uppdaterad version av artikeln**

Om du läser denna artikel utanför kursen javascript så rekommenderas att du läser en nyare version av artikeln.

* ["Programmering med grunderna i JavaScript"](kunskap/programmering-med-grunderna-i-javascript)

[/INFO]


> *"Du måste skriva koden själv."*

Om det går åt pipsvängen så finns alltid kodexempel att kika på.

[FIGURE src=/image/javascript/programmeringslab/boulder-dash-med-array.png?w=w2&sa=jpg&crop=0,850,0,100 caption="En av programmeringsövningarna som du kommer att genomföra innan du är klar."]



Då kör vi {#inledning}
--------------------------------------------------------

Sätt dig tillrätta och se till att du har ett par timmar tillgodo. Detta dokument innehåller en del text och en del övningar. När du stöter på programmeringsövningar så bör du alltid försöka göra dem själv. Det är en stor skillnad att själv lyckas få ett exempel körbart och att bara studera koden och testköra någon annans kod.

När du är klar kommer du ha en hel del kodexempel som du kan gå tillbaka till och "låna" koden av. På det viset bygger du upp din kunskap i JavaScript. 

Använd manualerna flitigt. Lär dig slå upp i dem. Använd Mozilla Developer Network (MDN) som [referens för JavaScript](https://developer.mozilla.org/en-US/docs/JavaScript).



Lexikalisk struktur {#lexikalisk}
--------------------------------------------------------

JavaScript gör skillnad på små och stora bokstäver, nyckelordet `while` måste skrivas exakt så och inte `WHILE`. 

JS bryr sig inte om blanka tecken som mellanslag och tabb. Du kan använda dem som du vill för att formatera ditt program. När du kör ett program "live" kan du ta bort alla tomma tecken, det är så som "minifiering" [^1] [^2] fungerar när det förminskar ett JavaScript för att snabba upp laddningshastighet av en sida, allt för att ge användaren en bättre upplevelse.

Semikolon avslutar ett "statement", men de är valfria. Därför kan du köra program även om de saknar semikolon. Bäst är att ha koll på sina semikolon och alltid lägga dit dem där de ska vara. Annars kommer interpretatorn att gissa sig fram till om det behövs ett semikolon eller ej. Gissningar kan leda till problem. 

Kommentarer är samma som i C++, dvs. `//` för en-rads kommentarer och `/* */` för kommentarer som spänner över flera rader. Det finns också stöd för kommentarer av typen `/** */` och då i samverkan med externa verktyg för dokumentation [^3].

När du skriver in ett värde  i JavaScript är det en "literal" som kan tolkas som ett värde och en typ.

Följande visar hur literaler kan tolkas.

```javascript
42              // Talet 42
4.2             // Talet 4.2
"hello world"   // En sträng med text
'hej'           // En sträng till
true            // Ett boolskt värde
false           // Ett annat boolskt värde
null            // Avsaknaden av ett värde
/javascript/    // Ett reguljärt uttryck
{x:1,y:2}       // Ett objekt
[1,2,3,4,5]     // En array
```

En identifierare är en sträng som används för att namnge en variabel eller funktion. Reglerna för identifierare liknar andra programmeringsspråk.

> En identifierare börjar med en bokstav `a-z, A-Z`, understreck `_` eller dollartecken `$` och följs därefter av bokstav `a-z, A-Z`, understreck `_`, dollartecken `$` eller siffror `0-9`.

Följande är giltiga identifierare:

```javascript
moped
$
_
M64
i
```

Det finns ett antal [reserverade ord i JavaScript](https://developer.mozilla.org/en/JavaScript/Reference/Reserved_Words), dessa kan vara bra att ha lite koll på, kika på dem innan du går vidare.

Bra, då gör vi ett litet testprogram.


###Uppgift {#uppgift-1}

Gör ett litet JavaScript som skriver ut literaler tillsammans med dess typ. Du kan ta fram typen för en literal med hjälp av [operatorn](https://developer.mozilla.org/en/JavaScript/Reference/Operators) [`typeof`](https://developer.mozilla.org/en/JavaScript/Reference/Operators/typeof).

Så här blev [resultatet för mig](javascript/lekplats/literals-and-their-type-using-typeof/).

[FIGURE src=/image/javascript/programmeringslab/01.jpg?w=w2 caption="Literaler och dess typ som det upplevs av JavaScripts `typeof` operator."]

[INFO]
**Får man tjuvkika?**

Självklart, det är ju därför jag skrev exemplet. Men, vänta in i det sista att kika, försök själv först. Det är alla dessa småfel vi lär oss av och de måste man göra själv -- och lösa själv. Försök alltid själv först och kika när du är klar och se hur jag gjorde. Jämför gärna din kod med min och fundera på vilken som är mest tilltalande.

Försök alltid själv, så länge det går. Ta en livlina och kika på min kod, som en sista utväg och som en dubbelkoll när du själv löst uppgiften. Då kommer du att lära dig mest på denna övning.
[/INFO]


Datatyper och värden {#datatyper}
--------------------------------------------------------

I JavaScript finns ett antal objektbaserade datatyper. Följande lista ger en översikt.

| Namn       | Syfte                                         |
|------------|-----------------------------------------------|
| [`Number`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Number) | Siffror, tal, nummer |
| [`String`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/String) | Strängar och tecken |
| [`Boolean`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Boolean) | Boolska värden, `sant` eller `falskt` |
| [`Function`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Function) | Funktioner som exekverbar kod |
| [`Object`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Object) | En osorterad lista av `key:value` |
| [`Array`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array) | En sorterad lista av numrerade värde |
| [`Date`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Date) | Datum och datumhantering |
| [`RegExp`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/RegExp) | Reguljära uttryck |
| [`Error`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Error) | Felhantering för syntax och fel under körning |
| [`Undefined`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/undefined) | En variabel som inte givits ett värde har värdet undefined som är en egen typ. |
| [`Null`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Operators/typeof#null) | Null är avsaknaden av ett värde, men ändå ett medvetet värde som blivit tilldelat till en variabel. Det är en egen typ. |

Varje datatyp är representerad som ett objekt med medlemsvariabler och metoder. Dessa används när man jobbar med värden som är av en viss typ. Objektets medlemmar och metoder avgör vad man kan göra med ett värde som är av en viss typ.

Det är `number`, `string`, `boolean` och `Object` som är grundtyperna i JavaScript. Typerna `Number`, `String`, `Boolean`, `Function`, `Array`, `Date` och `RegExp` är egentligen en variant, en specialisering, av typen `Object`.

Samtliga objekttyper är något som kallas globala objekt, se översikten av det som defineras inom "[Global Objects](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects)" i JavaScript.

Till dessa tillkommer då också `undefined` och `null`.

Vi tar och kikar lite djupare in i var och en av dessa, samtidigt som vi gör lite övningar. Då kör vi.


###Nummer och `Number` {#nummer}

JavaScript hanterar heltal, flyttal och hexadecimala tal som literaler. Vissa implementationer stödjer även oktala tal men det stödjs ej i standarden så vi undviker dem som literaler.

```javascript
2              // Integer
42             // Integer
4.2            // Float
3.14159265     // Float
7.01e11        // Float 701000000000
1.4297E-14     // Float 0.000000000000014297
0xff           // Hexadecimal
0x1a0f         // Hexadecimal
037            // Octal or not? Avoid octal numbers like this. 
               // Never start integer with 0

Math.sqrt(-1)       // Fails and returns NaN, Not a Number, special case.
parseInt('no way')  // Fails and returns NaN.
toInteger('no way') // Succeeds and returns 0.
```

När en matematisk funktion eller en parsning av ett number misslyckas så returneras värdet `NaN` som betyder "Not a number". [Läs mer om Nan](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/NaN).

När vi jobbar med nummer så stöds de vanliga [aritmetiska operatorer](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Operators) som vi känner igen från andra programmeringsspråk. 

Det finns en samling matematiska funktioner som är samlade i objektet [`Math`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Math). Med dessa kan du utföra vanliga matematiska beräkningar.

```javascript
Math.PI           // Constant value for PI
Math.random()     // Return a random number
Math.tan(2)       // Return tangent of 2
```

Det är objektet [`Number`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Number) som används när du jobbar med nummer. Konvertering av värden sker automatiskt mellan literal och objekt, ofta spelar det ingen roll men det är bra att veta om man vill ha lite extra koll. Kika på objektet Number för att se vilka standardfunktioner som det erbjuder.



####Uppgift {#uppgift-2}

Gör ett program som skapar tal av olika typer: integer, float, float med exponent och hexadecimalt. Använd sedan objektet `Math` och objektet `Number` för att utföra följande beräkningar av samtliga tal. 

* Visa talet i sin exponentialform (2e7)
* Visa talet i sin vanliga form med tre decimaler (42.000)
* Avrunda till närmaste heltal.
* Beräkna kvadratroten (avrunda till 5 siffror).
* Beräkna sinus-värdet (avrunda till 5 siffror).

Leta reda på och skriv ut följande värden:

* Eulers konstant E
* PI
* Värdet på det största möjliga talet som kan representeras
* Representationen av positiva oändligheten

Så här blev [mitt resultat](javascript/lekplats/datatypes-and-values-using-numbers/).

[FIGURE src=/image/javascript/programmeringslab/02.jpg?w=w2 caption="Olika varianter att visa upp nummer."]


###Strängar och `String` {#stranger}

Strängar omsluts med enkelfnutt `'` eller dubbelfnutt `"`, speciella tecken kan escapas med backslash `\` på samma sätt som i andra programmeringsspråk. En tom sträng är `''` eller `""`. Strängar kan även innehålla unicode tecken enligt `\uXXXX` där `XXXX` är fyra hexadecimala siffror. 

Strängkonkatenering sker med operatorn `+` eller `+=`.

Det finns en samling med sträng-funktioner som är samlade i objektet [`String`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/String).

JavaScript konverterar automatiskt mellan nummer och strängar vid behov. Vill du ha mer kontroll på hur konvertering sker kan du använda funktionerna [`parseInt()`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/parseInt) och [`parseFloat()`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/parseFloat) för att konvertera strängar till nummer och [`toString()`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Number/toString) för att konvertera nummer till strängar. 



####Uppgift {#uppgift-3}

Skriv ett program som utför följande hantering av strängar.

* Skapa och skriv ut strängen: `"Copyright © by XXX"`, använd unicode siffran för &copy;-tecknet.
* Konkatenera strängen med strängen `" Mumintrollet "`. Skriv ut resultatet.
* Konkatenera strängen med siffran `1942`. Skriv ut resultatet.
* Lägg till en punkt i slutet av strängen. Skriv ut längden av strängen.
* Skapa en ny sträng och ta bort `"XXX"` genom att plocka ut de två substrängar som inte innehåller `"XXX"` och slå samman dem till en ny sträng. Skriv ut den nya strängen och dess längd.

Kontrollera hur typkonvertering sker mellan nummer och strängar. Utför följande beräkningar, lagra i en variabel, skriv ut resultatet tillsammans med värdet på `typeof`.

```javascript
"19" + "42"
"19" + 42
19 + 42
19 + "42"
```

Så här blev mitt [testprogam för strängar](javascript/lekplats/datatypes-and-values-using-strings/).

[FIGURE src=/image/javascript/programmeringslab/03.jpg?w=w2 caption="Lite strängbearbetning för att förstå hur de fungerar."]



###Boolska värden och `Boolean` {#boolean}

Det finns ett objekt [`Boolean`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Boolean) som automatiskt används vid typkonvertering av uttryck till `true` och `false`. Det kan vara bra att veta att det finns ett objekt i bakgrunden men normalt behöver man inte tänka på det utan kan använda `true` och `false` som vanligt. 

Det finns ingen anledning att explicit använda objektet `Boolean` över huvudtaget. Det räcker bra med literalerna `true` och `false`. Eller som det står i MDN manualen:

> *"Do not use a Boolean object in place of a Boolean primitive."*

Följande värden är falska: `false`, 0, den tomma strängen (""), `NaN`, `null`, och `undefined`. Alla andra värden är sanna, `true`.

Ett sätt att omvandla godtyckligt värde till ett boolskt värde är att använda dubbla utropstecken.

```javascript
!(new Number(42))   // false
!!(new Number(42))  // true
```



###Funktioner {#funktioner}

Funktioner är ett spännande kapitel i JavaScript. Även om allt är objekt så är JavaScript ett funktionsorienterat språk, men mer om det senare. Först tar vi grunderna.

Funktioner kan skapas på olika sätt, jämför följande sätt att använda och skapa en funktion.

```javascript
function square (x) {           // Traditionellt sätt, 
  return x*x;                   // att jämföra med C/C++, PHP.  
}
val = square(x)

var square = function (x) {     // Funktions literal, 
  return x*x;                   // funktionen tilldelas en variabel
}
val = square(x);

element.onclick = function () {  // Namnlös funktion som används 
  alert('Hello');                // som eventhanterare.
}
```

Funktioner har en argumentlista. Om man anropar funktionen med färre argument än listan så får de kvarvarande argumenten värdet `undefined`.

```javascript
function sum(a, b, c) {
  return a + b + c;
}

sum(1, 2, 3); // returnerar 6
sum(1, 2);    // returnerar NaN
```

Man kan använda detta för att ge "default"-värden på ett argument med hjälp av operatorn `||`. Studera följande funktion.

```javascript
function sum(a, b, c) {
  a = a || 0;
  b = b || 0;
  c = c || 0;
  return a + b + c;
}

sum(1, 2, 3); // returnerar 6
sum(1, 2);    // returnerar 3
```

Man kan även hantera en variabel argument-lista med identifieraren `arguments` som finns tillgänglig i funktionen.

```javascript
function sum() {
  var i, sum = 0;
  for(i = 0; i < arguments.length; i++) {
    sum += arguments[i];
  }
  return sum;
}

sum(1, 2, 3);           // returnerar 6
sum(1, 2, 3, 4, 5, 6);  // returnerar 21
```



####Uppgift tärning {#uppgift-tarning}

Du skall göra ett litet tärningsprogram, där en tärning kastas, snittvärdet beräknas och visas tillsammans med slagserien. Gör så här:

* Skapa en funktion `random(min, max)` som returnerar ett slumptal mellan `min` och `max`.
* Skapa en funktion `rollDice(times)` som kastar tärningen `times` gånger och returnerar en sträng med resultatet av alla slagningar och medelvärdet.

Så här blev mitt [testprogram för tärningen](javascript/lekplats/throwing-dice-using-functions/).

[FIGURE src=/image/javascript/programmeringslab/04.jpg?w=w2 caption="Tärningar uppbyggt av funktioner."]



###Objekt {#objekt}

Objekt är en samling av namngivna värden som vanligen kallas "properties". För att referera till ett objekts property används punkt. Man skapar enklast ett objekt med objekt-literalen `{}`.

Här är ett exempel på ett objekt `myBall` som innehåller en bild på en boll och en placering av bollen på en tvådimensionell yta.

```javascript
var myBall = {};

myBall.image = 'http://dbwebb.se/img/black_ball_64_64.png';
myBall.position = {x:10, y:10}

console.log(myBall.position.x); // prints out 10
```

Ett objekt innehåller alltså inga properties från början, de kan defineras under resans gång, det är både bra och dåligt. Smidigt att inte behöva ha en spec på objektet utan att det går att modifiera dynamiskt under körningen, inte så bra när man skriver fel på namnet på en property och tror att man läser en befintlig property men istället definerar man en ny.

I nedan exempel har jag stavat fel på propertyn för `x`. Jag tror jag flyttar objektet till position 27 men det gör jag inte. Jag definerar en ny property med namnet `X`. Sådant kan vara lurigt att felsöka.

```javascript
myBall.position.X = 27; 

console.log('The x-position of my ball is: ' + myBall.position.x);
```

Läs om [mutable objekt på Wikipedia](http://en.wikipedia.org/wiki/Immutable_object).

Nu när vi har ett enkelt objekt kan vi lägga till metoder till det, vad sägs om en metod `draw()` för att rita ut objektet på skärmen? Vi kallar det metoder när funktioner är kopplade till ett objekt.

```javascript
myBall.HTMLelement = document.getElementById('ball');

myBall.draw = function () {
  this.HTMLelement.style.backgroundImage = 'url(' + this.image + ')';
  this.HTMLelement.style.top = this.position.y + 'px';
  this.HTMLelement.style.left = this.position.x + 'px';
  console.log('Drawing ball.');
}

myBall.draw();
```

När man exekverar en funktion i ett objekt kan man använda [`this`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Operators/this) för att referera till det objekt (eller funktion) som äger funktionen [^5] [^6].

Låt oss lägga till en eventhanterare för klick på bollen och kolla vad som är `this` i en eventhanterare.

```javascript
myBall.HTMLelement.addEventListener('click', function (event) {
  console.log('Clicked on: ' + event.clientX + ' x ' + event.clientY);
  console.log(this);
});
```

Om du testkör ovanstående kod så kommer du att se att `this` pekar på `myball.HTMLelement`, alltså det objekt/funktion som är ägare till funktionen. Bra, då har vi koll på det. Vi måste dock vara lite uppmärksamma på vilket objekt som verkligen är `this` i olika sammanhang. Men här gick det bra.

Det finns en Object wrapper som är urmodern till alla JavaScript objekt, läs om vilka [metoder den erbjuder](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object). Alla nya objekt skapas med en mall som kallas Object.prototype. Därför får alla nya objekt tillgång till de metoder och properties som definieras i [Object.prototype](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/prototype). 

Fint, då har vi lite koll på hur objekt fungerar. Vi ska kika lite mer på JavaScript och objektorientering lite senare. Nu tar vi en liten kodningsuppgift på detta.


####Uppgift flytta bollen {#uppgift-bollen}

Du har en boll och du kan klicka på den. Gör nu så att du kan putta på bollen med musklick så att bollen flyttar sig varje gång du klickar med musen på den. Om du kan din matematik så kan du låta bollen flytta i olika riktningar beroende på var du klickar på bollen, annars kan du bara låta bollen flytta sig lite random, bestäm själv.

[INFO]
**EXTRAUPPGIFT** 

Kan du göra så att du klickar med musen på bollen, håller nere musknappen och drar den åt ena hållet och släpper. Resultatet skall bli att bollen åker iväg åt motsatt håll med en hastighet som motsvaras av hur långt du drog musen?
[/INFO]

Så här blev [exempelprogrammet för mig](javascript/lekplats/pushing-the-ball/).

[YOUTUBE src=6aEeDZP_MgM width=630 caption="Flytta runt bollen genom att klicka på den."]



###Array {#array}

En [`array`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array) är en numrerad lista med värden. En array har en längd. Det finns ett antal metoder som hjälper dig att jobba med arrayer.

Det finns inga [associativa arrayer](http://en.wikipedia.org/wiki/Associative_array) i JavaScript, då använder du ett objekt istället.

Du kan använda array-literalen för att skapa och jobba med arrayer på följande sätt.

```javascript
var notMuch = [];
var course = ['htmlphp', 'oophp', 'phpmvc', 'javascript'];

console.log(notMuch.length); // 0
console.log(course.length);  // 4
console.log(course[0]);      // 'htmlphp'

course[9] = 'mobile';

console.log(course.length);  // 10
console.log(course[8]);      // undefined
console.log(course[9]);      // 'mobile'

course.length = 4;
console.log(course.length);  // 4
console.log(course[9]);      // undefined
```

Du kan utöka arrayen dynamisk genom att tilldela den fler element på vissa positioner, en position som inte fått ett värde tilldelat har värdet `undefined`. När du sätter längden på en array kan du trunkera den, som i exemplet ovan där det finns ett element på position 9 som försvinner när vi sätter arrayens längd till 4.

Objektet [Array](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array) innehåller en hel del metoder som du kan ha nytta av när du jobbar med arrayer. Kika på manualsidan och se om du känner igen några av metoderna.



####Uppgift Boulder Dash {#uppgift-boulder}

Låt oss använda arrayer för att göra ett spel influerat av [Boulder Dash](http://sv.wikipedia.org/wiki/Boulder_Dash), eller ja, en spelplan iallafall.

När man bygger spel behövs en vacker bakgrund och det kan man skapa med texturer eller [tiles](http://en.wikipedia.org/wiki/Tile). Det finns webbplatser där man kan hitta denna typen av grafik. OpenGameArt, en webbplats med fri grafik till spel, där hittade jag de [tiles jag använde till min spelplan](http://opengameart.org/content/dungeon-crawl-32x32-tiles).

De tiles som jag använde finns [även via följande länk](img/tiles/).

Jag gjorde en spelplan om 24x24 rutor där varje ruta var 32x32 pixlar. Jag skapade spelplanen i en array och skrev ut den i JavaScript och använde LESS för att hantera bakgrundsbilderna.

Så här blev det för mig, du kan flytta runt med piltangenterna men sen händer det inte mycket mer. Kan du göra bättre? Eller prioritera och nöj dig med att rita upp en enklare spelplan som du lagrat i en array.

Kika gärna på [mitt exempel](javascript/lekplats/boulder-dash-with-arrays/) men tänkt först till själv, klara du att lösa det på egen hand?

[FIGURE src=/image/javascript/programmeringslab/boulder-dash-med-array.png?w=w2&sa=jpg&crop=0,850,0,100 caption="En spelplan med lite lådor, utritade från en array."]

[INFO]
**TIPS**

Behöver du hjälp med programmeringskonstruktionern i JavaScript så vänder du dig till manualen. Syntax för loopar och liknande hittar du i delen om [Statements i refmanualen](https://developer.mozilla.org/en-US/docs/JavaScript/Reference#Statements).
[/INFO]



###Variabler utan värde, `undefined` {#undefined}

En variabel som inte har tilldelats ett värde får automatiskt värdet [`undefined`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/undefined). Det är ett odefinerat värde.

```javascript
var i;

if(i === undefined) {
  // Yep, this is true for i
}

if(typeof i === 'undefined') {
  // Yep, this is true for i
}
```



###Ett icke-värde, `null` {#null}

Javascript skiljer på [`null`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/null) som är ett icke-värde och `undefined` som är avsaknaden av ett värde. Man använder `null` för att ge en variabel värdet `null`, med mening. När värdet `undefined` dyker upp så innebär det oftast att man inte initierat en variabel med ett värde.

```javascript
var i;
var j = null;

if(i === j) {
  // Nope, not the same type, they are not equal.
}

if(i == j) {
  // Yep, both evaluates to false so they are equal.
}

if(j === null) {
  // Yep, j is null for sure.
}
```



###Datumhantering med objektet `Date` {#date}

Med objektet [`Date`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Date) får vi en större mängd metoder för att jobba med datum och tid.

```javascript
var today = new Date();
console.log(today.getMonth()); // Displays current month.
today.setMonth(2);
console.log(today.getMonth()); // Displays month 2, March that is.
```

Pröva själv att göra ett enkelt exempelprogram med datumhantering.



###Reguljära uttryck med objektet `RegExp` {#regexp}

Det finns ett särskilt objekt, [`RegExp`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/RegExp), som hjälper oss att jobba med literaler för reguljära uttryck. Säg att vi vill validera om användaren matat in en korrekt mailadress. Så här kan en funktion för det se ut.

```javascript
function validateEmail(email) {
  var re = /^.+@.+\..+$/;
  return re.test(email);
}
```

Själva principen för det reguljära uttrycket är att en mailadress består av minst ett tecken följt av ett `@`, därefter minst ett tecken som följs av en punkt och därefter ytterligare minst ett tecken. 

Så här ser det ut när man testar funktionen i Firebug.

[FIGURE src=/image/javascript/programmeringslab/validate-email.jpg?w=w2 caption="Till slut validerar emailadressen korrekt, precis som den ska."]

Om du vill ha ett mer korrekt reguljärt uttryck för emailadresser så kan du pröva detta: [^8]

```javascript
/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
```

Pröva själv att göra ett enkelt exempelprogram med reguljära uttryck.



###Objekt för felhantering, `Error` {#error}

JavaScript har en [`try...catch`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Statements/try...catch) och [`throw`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Statements/throw) hantering och det finns ett antal [`Error`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Error) objekt som kan användas i detta sammanhang.

```javascript
function my(i) {
  if(i === undefined) {
    throw new TypeError('Value was undefined.');

  } else if(typeof i === 'number' && i < 0) {
    throw new RangeError('Only positive values allowed.')
  }
}

try {
  my(); // Should throw TypeError
}
catch(e) {
  console.log(e.name); 
  console.log(e.message);
}

try {
  my(-1); // Should throw RangeError
}
catch(e) {
  console.log(e.name); 
  console.log(e.message);
}
```

Pröva själv att göra ett enkelt exempelprogram med felhantering.



Funktioner, scope, closure och callbacks {#mer-om-funktioner}
-------------------------------------------------------------

Låt oss ta en djupare titt på funktioner och hur de kan användas. Vi avslutar detta stycke med en lite större programmeringsövning.



###Funktioner och scope {#functioner-scope}

I ett programmeringsspråk innebär "scope" den synlighet och levnadstid som variabler och parameterar har. Det handlar om minneshantering och namnkonflikter. De flesta C-liknande programmeringsspråk har "block"-scope, alla variabler är synliga i det blocket de är definierade och försvinner ur scoopet när man går ur blocket.

JavaScript har inte block-scope, även om det kan se ut så. JavaScript har "function"-scope vilket betyder att variabler som definierats i en funktion är inte synliga utanför den funktionen och en variabel i en funktion är synlig inom hela den funktionen, inklusive i funktioner som definierats i funktionen.

```javascript
function f1 (a) {
  var b = a + 1;

  function f2 (c) {
    var d = c + 1; 
    return a + b + c + d - 2; // a, b, c, d is available
  }

  return f2(b);
}

f1(10); // Returns 42
f2(); // Not callable
```

Många programmeringsspråk säger att variabler skall definieras så sent som möjligt, precis innan de används. I JavaScript definierar vi variablerna överst i funktionen, helst inom en enda `var`-deklaration separerade med kommatecken.



###Closure {#closure}

I exemplet ovan har den inre funktionen `f2()` tillgång till allt som är definierat i funktionen `f1()`. Detta kallas för "[closure](http://en.wikipedia.org/wiki/Closure_%28computer_science%29)" vilket är ett välkänt begrepp i programmeringspråk som stödjer [funktionell programmering](http://en.wikipedia.org/wiki/Functional_programming), programmeringsspråket [Lisp](http://en.wikipedia.org/wiki/Lisp_%28programming_language%29) är ett sådant språk.

Här är ett exempel på en closure där den inre funktionen har tillgång till de icke lokala variabler som fanns när funktionen definierades.

```javascript
// Example on closure where inner function has access to non-local variables
window.accessToInner = (function() {
  var a = 1;

  function inner (b) {
    a += b;
    return a;
  }

  return inner;
})();


accessToInner(1) // returns 2
accessToInner(1) // returns 3
accessToInner(1) // returns 4
accessToInner(1) // returns 5
```

En funktion har det scope som finns när den definieras, oavsett var den exekveras. Man kan alltså definiera en funktion i en miljö och sedan förutsätta att funktionen exekveras i samma miljö. Detta ger möjligheter till inkapsling och låter oss undvika globala variabler.



###Moduler -- "Module pattern" {#module}

Ett vanligt sätt är att använda closure är för att skapa moduler av JavaScript kod. Man lägger en hel modul i en funktion, där finns hela scopet, ett eget closure. I denna funktion definieras allt som behövs i modulen, variabler såsom funktioner. Till sist returneras en objekt-literal där man anger modulens publika interface. Se följande exempel där jag skapat en modul `Mos` som är tänkt att innehålla lite bra-att-ha saker.

```javascript
window.Mos = (function(window, undefined) {
  var private, Mos = {};

  /**
   * Dump own properties of an object
   * @param the object to show
   */
  Mos.dump = function (obj) {
    for (var prop in obj) {
      if (obj.hasOwnProperty(prop)) {
        console.log(prop);
      }
    }
  };
    
  /**
   * Generate a random number.
   * @param min the smallest possible number
   * @param max the largest possible number
   * @returns a random number where min >= number <= max
   */
  Mos.random = function (min, max) {
    return Math.floor(Math.random()*(max+1-min)+min);
  };
    
  // Expose public methods
  return Mos;
})(window);

Mos.random(1, 6);
Mos.dump(window.localStorage);
```

Funktionen definierar ett objekt som innehåller två metoder, funktionen exekveras direkt eftersom den omsluts av parenteser och returnerar därmed objektet `Mos` som tilldelas `window`. En poäng med detta är att variabeln `private` som definieras i funktion, är tillgänglig varje gång en metod i objektet `Mos` anropas. Man får alltså en struktur som liknar ett objekt med publikt interface och med privata delar.

Ta nu och kika på källkoden för JavaScript-biblioteken Modernizr och jQuery, du hittar källkoden via följande länkar:

* [Källkod modernizr](js/modernizr.js)
* [Källkod jQuery](js/jquery.js)

Ser du att de använde closure båda två? Studera hur första raden och sista raden i koden ser ut. Det är alltså en anonym funktion som exekveras, med argument, och returnerar ett objekt med de delar som skall vara publika.

**Closure för Modernizr.**

```javascript
window.Modernizr = (function( window, document, undefined ) {
  // Code

  return Modernizr;

})(this, this.document);
```

**Closure för jQuery.**

```javascript
(function( window, undefined ) {
  // Code

  // Expose jQuery to the global object
  window.jQuery = window.$ = jQuery;

})( window );
```

I båda fallen skapas ett objekt, en modul, med de funktioner som skall vara tillgängliga, och modulen kopplas till window-objektet.

Här är ett mindre exempel på samma tema.

```javascript
window.Mumin = (function (name) {

  return {
    myNameIs: function () {
      return name;
    }
  };

})('Mumintrollet');

Mumin.myNameIs(); // returns 'Mumintrollet'
```

Detta är en viktig sak att förstå i JavaScript, skall man lära sig av de bästa, likt Modernizr och jQuery, så ser vi att detta modul pattern ett bra sätt att kapsla in sin kod på.
 


###Callbacks {#callbacks}

En funktion utan namn kallas ibland för [anonym funktion](http://en.wikipedia.org/wiki/Anonymous_function) eller lambda-funktioner[^4]. [Lambda](http://en.wikipedia.org/wiki/Lambda_calculus) kommer från matematiken,

Ett vanligt sätt att använda anonyma funktioner är för callbacks, följande exempel visar en event-hanterare, skapad med [`addEventListener()`](https://developer.mozilla.org/en/DOM/element.addEventListener) som tar hand om ett klick på en knapp med en anonym funktion.

```javascript
var button = document.getElementById('button');

button.addEventListener('click', function () {
  console.log('Great - you clicked the button!');
}, false);
```

Enda gången som funktionen kommer anropas är i samband med att någon klickar på en knapp. Det finns ingen anledning att spara undan funktionen i en variabel någonstans. Det räcker bra med att definiera funktionen precis där den används.

[INFO]
**Tips**

Har du koll på hur event fungerar? [Event är en del av DOM](https://developer.mozilla.org/en/DOM/event), glöm inte att kolla in manualen vid behov.
[/INFO]

Ett liknande exempel är om man vill animera en händelse med jämna tidsintervall. Då kan man använda en timer i JavaScript, tex [`window.setTimeout()`](https://developer.mozilla.org/en/DOM/window.setTimeout) eller [`window.setInterval()`](https://developer.mozilla.org/en/DOM/window.setInterval). Låt se hur det kan se ut.

```javascript
var button = document.getElementById('button');

button.addEventListener('click', function () {
  var colors = ['green', 'yellow', 'red', 'blue', 'pink'],
    step = 0,
    animateFunction = function () {
      if (step === colors.length) {
        button.style.backgroundColor = '';
      } else {
        button.style.backgroundColor = colors[step];
        step += 1;
        window.setTimeout(animateFunction, 500);
      }
    };
  window.setTimeout(animateFunction, 500);
}, false);
```

Principen är att göra en funktion och sätta en timer att anropa funktionen med jämna intervall. I exemplet skapar jag funktionen `animateFunction()` som jag anropar med ett intervall av 0.5s. Processen startar när någon klickar på knappen och upprepas lika många gånger som det finns färger i arrayen `colors`.

Funktioner är både behändigt och kraftfullt i JavaScript, det är bra att lära sig hantera dem. Fortsätt öva.

Här kan du [testa mitt exempel](javascript/lekplats/animate-using-setTimeout/).

[YOUTUBE src=Nb4nU2VsyIE width=630 caption="Exempel på hur man kan animera med `setTimeout()`."]



###Uppgift roulette {#uppgift-roulette}

Vi har kommit lite mer än halvvägs i denna övning, det är dags för en liten större uppgift. Du skall göra ett Roulette-spel. Lycka till!

Det finns en samling populära spelsystem som kom fram i Frankrike på 1700-talet. De gick under namnet [Martingale](http://en.wikipedia.org/wiki/Martingale_(betting_system)) och de enklaste spelsystemen utgår från spel som liknar singla slant och föreslår en satsningsstrategi som ökar chansen till vinst.

Låt oss testa principen på spelet [Roulette](http://en.wikipedia.org/wiki/Roulette) och simulera spelrundor med JavaScript. 

Roulette-bordet har 37 nummer, 0-36. Hälften av numren är svarta och hälften är röda, nollan är grön. Här följer en array som anger färgen per siffra (0=grön, 1=svart, 2=röd).

```javascript
var colors = ['green', 'black', 'red'],
  table = [0,2,1,2,1,2,1,2,1,2,1,1,2,1,2,1,2,1,2,2,1,2,1,2,1,2,1,2,1,1,2,1,2,1,2,1,2];   
```

För att spela enligt Martingale på Roulettebordet gör du så här:

* Satsa 1 spelmarker på valfri färg.
* Förlorar du så dubblar du insatsen och spelar igen på samma färg.
* Fortsätt till du vinner. Då börjar du om från början igen och byter färg (röd/svart).

Rent teoretiskt fungerar systemet förutsatt att man har tillgång till oändligt antal pengar, och det har man ju inte. Casinona har dessutom max-gränser för insats per runda vilket påverkar systemet mer. Eller som Einstein sa:

> *"You cannot beat a roulette table unless you steal money from it. Albert Einstein"*
 
**Gör nu ett roulette spel** där du kan testa Martingale-systemet. Se till att resultatet blir bra och fungerar väl. Du kan göra minst lika bra som jag gjort. Använd dina kunskaper du lärt dig så här långt och sök i manualerna efter det du saknar. Glöm inte att köra din kod i [JSLint](http://jslint.com/) när du är klar. Vi kan lära oss en hel del av kommentarerna vi får från det verktyget.

Du kan kika på [mitt roulette-spel](javascript/lekplats/gambling-roulette-using-functions/).

[FIGURE src=/image/javascript/programmeringslab/05.jpg?w=w2 caption="Simulera roulette med JavaScript funktioner."]




Prototyper och arv {#prototype}
--------------------------------------------------------

JavaScript består av objekt men det finns inget som heter klasser. JavaScript är inte ett traditionellt objektorienterat språk och förväxla det därför inte med det som du lärt dig i Java, C++ eller PHP. 

Programmeringssättet kallas "[Prototype-based programmering](http://en.wikipedia.org/wiki/Prototype-based_programming)" och du kan tjäna på att läsa på om vad som skiljer mellan klass-baserade arv och prototyp-baserad programmering [^7].

Läs gärna Douglas Crockfords artikel om ["Prototypal Inheritance in JavaScript"](http://javascript.crockford.com/prototypal.html).

Men vi avvaktar till senare i kursen med att kika på detta. Nu har du i alla fall hört konceptet och du vet att du inte skall förvänta dig att JavaScript är ett klassiskt objektorienterat språk, det är det inte. Glöm inte det.

Försök inte heller anpassa JavaScript till ditt traditionella objektorienterade tankesätt. Släpp det och lär dig istället kärnan i JavaScript. Anamma det funktionella programmeringssättet tills vidare. Så återkommer vi till prototypbaserad programmering lite senare i kursen.



Avslutningsvis {#avslutning}
--------------------------------------------------------

Bra jobbat! Nu har du en start i programmeringsspråket JavaScript. Förvalta det väl och glöm inte att skriva egna program för att öva. Använd Firebugs konsol för att snabbt testa konstruktioner som du är osäker på.



Revisionshistoria {#revision}
--------------------------------------------------------

<span class='revision-history' markdown='1'>
2013-11-12 (C, mos) Genomgång och en del justeringar inför ht13.  
2012-11-15 (B, mos) Justeringar vid genomgång. La till kapitel om Moduler.  
2012-11-03 (A, mos) Första utgåvan.
</span>

*Att göra*

1. Eget kapitel om Siaf, self-invoking-anonymous-function, including its parameters. http://stackoverflow.com/questions/6287511/reason-behind-this-self-invoking-anonymous-function-variant  

2. En förklaring om this, that/self. http://stackoverflow.com/questions/4886632/what-does-var-that-this-mean-in-javascript



Referenser {#referenser}
--------------------------------------------------------

Följande är referenser som använts som fotnötter i texten.

[^1]: [A List A Part: Better JavaScript Minification.](http://www.alistapart.com/articles/better-javascript-minification/)

[^2]: [Stackoverflow: Which javascript minification library produces better results?](http://stackoverflow.com/questions/360818/which-javascript-minification-library-produces-better-results)

[^3]: [Stackoverflow: What options are available for documenting your Javascript code?](http://stackoverflow.com/questions/669698/what-options-are-available-for-documenting-your-javascript-code)

[^4]: [Stackoverflow: What is a lambda function?](http://stackoverflow.com/questions/16501/what-is-a-lambda-function)

[^5]: [Quirksmode: The `this` keyword.](http://www.quirksmode.org/js/this.html)

[^6]: [Stackoverflow: What does `that` means i JavaScript.](http://stackoverflow.com/questions/4886632/what-does-var-that-this-mean-in-javascript)

[^7]: [Stackoverflow: Prototype based vs. class based inheritance.](http://stackoverflow.com/questions/816071/prototype-based-vs-class-based-inheritance)

[^8]: [Stackoverflow: Validate email address in Javascript](http://stackoverflow.com/questions/46155/validate-email-address-in-javascript)?
