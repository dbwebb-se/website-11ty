---
author: mos
category:
    - javascript
    - kursen javascript1
    - kursen javascript
    - kursen webgl
revision:
    "2016-11-07": (B, mos) Genomgången inför ht16.
    "2015-11-11": (A, mos) Uppdaterad och omskriven i samband med webgl-kursen.
...
Programmering med grunderna i JavaScript
==================================

[FIGURE src=/image/snapht15/js-boulder-dash.png?w=c5&a=60,50,25,20 class="right"]

En programmeringsguide som behandlar grunderna i programmeringsspråket JavaScript. Övningen börjar med grunder som literaler och variabler och tar dig via funktioner, arrayer och objekt till en stabil grundnivå av kunskaper som rör kärnan i JavaScript.

Efter vägen får du bekanta dig med ett par övningsuppgifter där du kan studera kodexempel. Ett bra tips är att kopiera dessa kodexempel till din egen miljö och försöka modifiera dem, bara för att du skall bekanta dig med koden som sådan. Guiden är skriven för dig som redan kan programmera i ett eller flera objektorienterade programmeringsspråk.

<!--more-->


[FIGURE src=/image/snapht15/js-boulder-dash.png?w=w2 caption="Arrayer kan användas till mycket, här för att skapa en spelplan för spelet Boulder Dash."]



Introduktion {#intro}
--------------------------------------------------------

Sätt dig tillrätta och se till att du har ett par timmar tillgodo. Detta dokument innehåller en del text och en del övningar med kodexempel. Försök alltid göra kodexemplet till "ditt eget", kopiera det och kör det i din egen miljö. På det viset lär du dig mer än om du bara läser texten.

När du är klar kan du på det viset ha en hel del kodexempel som du kan gå tillbaka till och "låna" koden av. På det viset bygger du upp din kunskap i JavaScript. 

Använd manualerna flitigt. Lär dig slå upp i dem. Använd Mozilla Developer Network (MDN) som [referens för JavaScript](https://developer.mozilla.org/en-US/docs/JavaScript).

Du finner samtliga exempelprogram på [dbwebb under javascript/core](javascript/core).

Se till att du kan skriva dina egna exempelprogram för att testa olika koncept. För enklare konstruktioner kan du använda webbläsarens console eller en interaktiv session i node. För större exempelprogram kan du spara i en egen fil och köra i webbläsaren. 



Lexikalisk struktur {#lexikalisk}
--------------------------------------------------------



###Allmänt {#allman}

JavaScript gör skillnad på små och stora bokstäver, nyckelordet `while` måste skrivas exakt så och inte `WHILE`. Variablerna `avar` och `aVar` är två skilda variabler.

JS bryr sig inte om blanka tecken som mellanslag och tabb. Du kan använda dem som du vill för att formatera ditt program. När du kör ett program "live" kan du ta bort alla tomma tecken, det är så som "minifiering" [^1] [^2] fungerar när det förminskar ett JavaScript för att snabba upp laddningshastighet av en sida, allt för att ge användaren en bättre upplevelse.

Semikolon avslutar ett "statement", men de är valfria. Därför kan du köra program även om de saknar semikolon. Bäst är att ha koll på sina semikolon och alltid lägga dit dem där de ska vara. Annars kommer interpretatorn att gissa sig fram till om det behövs ett semikolon eller ej. Gissningar kan leda till problem. 

Kommentarer är samma som i PHP och C++. `//` för en-rads kommentarer och `/* */` för kommentarer som spänner över flera rader. Det finns också stöd för DocBlock kommentarer `/** */` och då i samverkan med externa verktyg för automatgenererande dokumentation [^3].



###Literaler {#literal}

När du skriver in ett värde  i JavaScript är det en "literal" som kan tolkas som ett värde och en typ.

Följande visar hur literaler kan tolkas.

```javascript
42              // Talet 42
4.2             // Talet 4.2
"hello world"   // En sträng med text
'hej'           // En sträng till
true            // Ett boolskt värde
false           // Ett annat boolskt värde
null            // Ett null värde
undefined       // Ett odefinierat värde
/javascript/    // Ett reguljärt uttryck
{x:1, y:2}      // Ett objekt med två properties
[1, 2, "three"] // En array med tre värden
```

Pröva att skriva in någon av literalerna för att se hur JavaScript tolkar dem.



###Identifierare {#identifierare}

En identifierare är en sträng som används för att namnge en variabel eller funktion. Reglerna för identifierare liknar andra programmeringsspråk.

> En identifierare börjar med en bokstav `a-z, A-Z`, understreck `_` eller dollartecken `$` och följs därefter av bokstav `a-z, A-Z`, understreck `_`, dollartecken `$` eller siffror `0-9`.

Följande är giltiga identifierare:

```javascript
myVar
moped
$
_
M64
i
```

Pröva att skriva in en identifierare och tilldela den ett värde av en literal.

```javascript
var myValue = [1, 2, "three"];
myValue;
```



###Reserverade ord {#reserved}

Det finns ett antal [reserverade ord i JavaScript](https://developer.mozilla.org/en/JavaScript/Reference/Reserved_Words), dessa kan vara bra att ha lite koll på, kika på dem innan du går vidare. Du kan inte använda reserverade ord som namn på variabler.

Vilka ord som är reserverade kan skifta mellan olika versioner av JavaScript, du gör bäst i att undvika dem, oavsett vilken version du använder.



###Ett litet program {#litet}

Så här kan ett [litet program](javascript/core/basic/basic.js) se ut i JavaScript. Spara undan det i en fil och kör det.

```javascript
/**
 * This is some basics in JavaScript.
 */

// One line comment

var someValue = 42;
var someString = "42";

if (someValue == "42") {
    console.log("Yes, its 42 alright.");
}

if (someString === "42") {
    console.log("Yes, its 42 alright.");
}

// Short syntax for an if statement
var res = someValue === 42 ? 42 : "42";
console.log(res);

var i = 0;
while (i < 42) {
    i++;
}
console.log(i);

for (i = 37; i <= 42; i++) {
    console.log(i);
}

function alpha(x, y) {
    return x + y;
}

console.log(alpha(40, 2));
```

Syntaxen är till stor del likt C/C++/PHP.

Tilldelning är ett `=`, jämförelse av värden är `==` och jämförelse av både typ och värde är `===`. Det rekommenderas att använda `===` för att vara på den säkra sidan.



###Funktion som variabel {#func-exp}

Notera att en funktion kan tilldelas till en variabel. Programmeringsspråk som erbjuder den möjligheten brukar sägas ha stöd för *first-class functions* [^9]. Sådana konstruktioner är vanliga i programmeringsspråk som stödjer programmeringsparadigmen funktionell programmering [^12].

```javascript
var a = function (x) { return x + 1; };
console.log(a(41)); 
```

På det sättet kan en funktion skickas som en parameter till en funktion, eller som en del av en array eller objekt.



###Övning {#uppgift-1}

Gör ett litet program som skriver ut literaler tillsammans med dess typ. Du kan ta fram typen för en literal med hjälp av [operatorn](https://developer.mozilla.org/en/JavaScript/Reference/Operators) [`typeof`](https://developer.mozilla.org/en/JavaScript/Reference/Operators/typeof). Svaret blir en sträng som representerar typen.

Så här blev [resultatet för mig](javascript/core/literals-and-their-type-using-typeof/).

[FIGURE src=/image/snapht15/js-literals.png caption="Literaler och dess typ som det upplevs av JavaScripts `typeof` operator."]

Nu ser vi hur JavaScript upplever typerna för de olika literalerna. De två sifforna är *number* och flera av literalerna upplevdes som *object*.

Låt oss fortsätta studera grunderna så att vi får bättre grepp om typerna som JavaScript erbjuder.



Värden och Datatyper {#datatyper}
--------------------------------------------------------



###Primitiva värden {#primitives}

JavaScript har ett antal primitiva värden.

* Boolska variabler som `true` och `false`.
* Numeriska värden som `42` och `4.2`.
* Strängar som `"mumin"` och `'mumin'`.
* Icke-värden i form av `null` och `undefined`.

De är primitiver, enkla värden.



###Objekt {#objekt}

De literaler som representerar ett icke-primitivt värde representeras som ett objekt.

Alla nedan har samma värde för `typeof()`, alla är `"object"`.

* `[]` array literal.
* `{}` objekt literal.
* `/./` ett reguljärt uttryck.

En funktion har också en upplevd typ i form av `"function"`.

```javascript
> typeof(function(){})
'function'
```

I samtliga fall så är dessa icke-primitiva värden en instans av `Object`, det ursprungliga objektet i en hierarki av JavaScript objekt. 

```javascript
[] instanceof Object
[] instanceof Array
true

/./ instanceof Object
/./ instanceof RegExp
true

> a = {}
{}
> a instanceof Object
true

> a = function(){}
[Function]
> a instanceof Object
true
> a instanceof Function
true
```

Det finns alltså en objekthierarki dit ett värde hör, baserat på dess typ.



###Objektbaserade datatyper {#datatyp}

I JavaScript finns ett antal objektbaserade datatyper. Följande lista ger en översikt. Dessa inbyggda objekt innehåller inbyggda funktioner som kan användas för att jobba med värden av respektive typ.

| Namn       | Syfte                                         |
|------------|-----------------------------------------------|
| [`Number`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Number) | Siffror, tal, nummer |
| [`String`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/String) | Strängar och tecken |
| [`Boolean`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Boolean) | Boolska värden, `sant` eller `falskt` |
| [`Object`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Object) | Moderobjektet, samt en osorterad lista av `key:value` |
| [`Array`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array) | En sorterad lista av numrerade värde |
| [`Function`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Function) | Funktioner som exekverbar kod |
| [`RegExp`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/RegExp) | Reguljära uttryck |

Varje datatyp är representerad som ett objekt med medlemsvariabler och metoder. Dessa används när man jobbar med värden som är av en viss typ. Objektets medlemmar och metoder avgör vad man kan göra med ett värde som är av en viss typ.

Till exempel kan du ta reda på längden av en sträng på följande sätt.

```javascript
> "Mumintrollet".length
12
> "Mumintrollet".charAt(1)
'u'
```

Det som sker är att strängliteralen omvandlas automatiskt till ett String-object och dess property `length` avläses och metoden `String.charAt()` anropas.

På det viset kan man säga att även primitiverna har en koppling till ett objekt som i sin tur bestämmer vad man kan göra med värdet.

En strängliteral blir alltså till ett String-objekt vilket är kopplat till objektet Object. De metoder och properties som finns i `Object` och i `String` kan användas.

Se detta exempel som använder en metod som finns i `Object`.

```javascript
> a = 42
42
> a.toString()
'42'
```

Detta är grunden i hur värden och datatyper byggs upp och vilka metoder som finns tillgängliga.



###Fler objekttyper utan literaler {#fler-typer}

Låt oss titta på två andra objekttyper inte har en egen literal.

| Namn       | Syfte                                         |
|------------|-----------------------------------------------|
| [`Date`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date) | Datum och datumhantering |
| [`Error`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Error) | Felhantering för syntax och fel under körning |

Dessa objekt skapar man med operatorn `new` så här.

```javascript
// Date
> a = new Date()
Mon Nov 07 2016 18:05:33 GMT+0100 (CET)
> a instanceof Object
true
> a instanceof Date
true
> typeof(a)
'object'

// Error
> e = new Error()
[Error]
> e instanceof Object
true
> e instanceof Error
true
> typeof(e)
'object'
```

Här skapar vi alltså en instans av objektet och får därmed tillgång till de metoder som objektet implementerar.



###Sammanfattningsvis om typer och värden {#sammanfatt-typ}

Det är `number`, `string`, `boolean` som är primitiver och resten är specialiserade objekttyper. Typerna `Number`, `String`, `Boolean`, `Function`, `Array`, `Date` och `RegExp` är en variant, en specialisering, av typen `Object`.

Funktionen `typeof()` svarar med en upplevd typ i form an en sträng.

Uttrycket `instanceof` testar om ett objekt/värde/variabel är av en viss Objekt.

Samtliga objekttyper är något som kallas globala objekt, de innehåller metoder och properties som kan användas för att jobba med dem och de värden de representerar.

Till dessa tillkommer `undefined` och `null`.

| Namn       | Syfte                                         |
|------------|-----------------------------------------------|
| [`undefined`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/undefined) | En variabel som inte givits ett värde har värdet undefined som är en egen typ. |
| [`null`](https://developer.mozilla.org/sv-SE/docs/Web/JavaScript/Reference/Global_Objects/null) | Null är avsaknaden av ett värde, men ändå ett medvetet värde som blivit tilldelat till en variabel. Det är en egen typ. |

En variabel som ännu inte blivit tilldelad ett värde sägs ha värdet `undefined`. En funktion som inte returnerar något sägs returnera `undefined`. Ett odefinierat värde, helt enkelt.

Man kan tilldela en variabel ett värde `null` som kan sägas innebära avsaknaden av värde. Vill man undvika `undefined` kan man explicit tilldela en variabel `null`. Internt representeras `null` av ett objekt, iallafall enligt funktionen `typeof()` och det kan kännas lite udda, men det är inget som bör störa oss. 

Vi tar och kikar lite djupare in i var och en av dessa, samtidigt som vi gör lite övningar. Då fortsätter vi.



Nummer och `Number` {#nummer}
--------------------------------------------------------

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

När en matematisk funktion eller en parsning av ett number misslyckas så returneras värdet `NaN` som betyder "Not a number". [Läs mer om Nan](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/NaN). Om man har en större beräkning och en del ger Nan så kommer hela uttrycket att bli Nan. Det kan göra det lite svårt att felsöka en komplex beräkning som ger Nan, men dela upp beräkningen i delar så blir det enklare att felsöka.

När vi jobbar med nummer så stöds de vanliga [aritmetiska operatorer](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Operators) som vi känner igen från andra programmeringsspråk. 

Det finns en samling matematiska funktioner som är samlade i objektet [`Math`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Math). Med dessa kan du utföra vanliga matematiska beräkningar.

```javascript
Math.PI           // Constant value for PI
Math.random()     // Return a random number
Math.tan(2)       // Return tangent of 2
```

Det är objektet [`Number`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Number) som används när du jobbar med nummer. Konvertering av värden sker automatiskt mellan literal och objekt, ofta spelar det ingen roll men det är bra att veta om man vill ha lite extra koll. Kika på objektet Number för att se vilka standardfunktioner som det erbjuder.

Var uppmärksam på Nan och Infinity i dina beräkningar. Se följande exempel.

```javascript
> 1/0
Infinity
> 0/0
NaN
> 0/1
0

> NaN > Infinity
false
> Infinity > NaN
false
> Infinity < (Infinity + 1)
false
> Infinity + 1
Infinity
```


###Övning nummer {#uppgift-2}

Försök skapa ett exempelprogram som återskapar följande bild.

[FIGURE src=/image/snapht15/js-values-number.png caption="Olika varianter att visa upp nummer."]

Så här blev [mitt resultat](javascript/core/datatypes-and-values-using-numbers/).




Strängar och `String` {#stranger}
--------------------------------------------------------

Strängar omsluts med enkelfnutt `'` eller dubbelfnutt `"`, speciella tecken kan escapas med backslash `\` på samma sätt som i andra programmeringsspråk. En tom sträng är `''` eller `""`. Strängar kan även innehålla unicode tecken enligt `\uXXXX` där `XXXX` är fyra hexadecimala siffror. 

Strängkonkatenering sker med operatorn `+` eller `+=`.

Det finns en samling med sträng-funktioner som är samlade i objektet [`String`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/String).

###Typkonvertering {#typkonv}

JavaScript konverterar automatiskt mellan nummer och strängar vid behov. Se följande som ett exempel på hur värden av olika typer kan läggas ihop via automatiks typkonvertering.

```javascript
> 1 + 1
2
> "1" + 1
'11'
> 1 + "1"
'11'
> 1 + true
2
> "1" + true
'1true'
> true + 1
2
> true + 1 + NaN
NaN
```

Försök undvika att värden av olika typer beräknas på detta atuomatiska sätt, det kan bli en potentiell felkälla i din kod.



###Kontrollerad typkonvertering {#typkonv-kontr}

Vill du ha mer kontroll på hur konvertering sker kan du använda funktionerna [`parseInt()`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/parseInt) och [`parseFloat()`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/parseFloat) för att konvertera strängar till nummer och [`toString()`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Number/toString) för att konvertera nummer till strängar. 

Notera att `toString` anropas som en metod på ett objekt, medan `parseInt` och `parseFloat` kan anropas som en funktion.

```javascript
> a = 42
42
> a.toString()
'42'
> parseInt("42 mopeder")
42
```

Vid sidan av alla objekt finns även en uppsättning av [globala funktioner](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects), där `parseInt` och `parseFloat` är två av dem.



###Övning strängar {#uppgift-3}

Skriv ett program som utför följande hantering av strängar.

[FIGURE src=/image/snapht15/js-strings.png caption="Lite strängbearbetning för att förstå hur de fungerar."]

Så här gjorde jag mitt exempel.

Förste delen.

* Skapa och skriv ut strängen: `"Copyright © by XXX"`.
* Konkatenera strängen med strängen `" Mumintrollet "`.
* Konkatenera strängen med siffran `1942`.
* Lägg till en punkt i slutet av strängen.
* Skapa en ny sträng och ta bort `"XXX"` genom att plocka ut de två substrängar som inte innehåller `"XXX"` och slå samman dem till en ny sträng.

I andra delen ville jag se hur JavaScript automatiskt konverterar mellan strängar och nummer. Så jag gjorde fyra exempel som gjorde en tilldelning enligt följande och jag kontrollerade den resulterande typen.

```javascript
"19" + "42"
"19" + 42
19 + 42
19 + "42"
```

Så här blev mitt [testprogam för strängar](javascript/core/datatypes-and-values-using-strings/).




Boolska värden och `Boolean` {#boolean}
--------------------------------------------------------

Det finns ett objekt [`Boolean`](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Boolean) som automatiskt används vid typkonvertering av uttryck till `true` och `false`. Det kan vara bra att veta att det finns ett objekt i bakgrunden men normalt behöver man inte tänka på det utan kan använda `true` och `false` som vanliga literaler. 

Det finns ingen anledning att explicit använda objektet `Boolean` över huvudtaget. Det räcker bra med literalerna `true` och `false`. Eller som det står i MDN manualen:

> *"Do not use a Boolean object in place of a Boolean primitive."*

Följande värden är falska: `false`, 0, den tomma strängen (""), `NaN`, `null`, och `undefined`. Alla andra värden är sanna, `true`.

Ett sätt att omvandla godtyckligt värde till ett boolskt värde är att använda dubbla utropstecken.

```javascript
!42   // false
!!42  // true
```

Vill vi testa att ovanstående stämmer så kan vi skriva följande konstruktion i webbläsarens devtools.

```javascript
!42 === false  // true
!!42 === true  // true
typeof(!42) === "boolean" // true
```

Det är bra att använda devtools för att testa konstruktioner man är fundersam på. Det ger svar direkt.

Att använda två `==` jämför värdet, att använda tre `===` innebär jämförelse även mot datatypen. Det är bra att använda `===` för att undvika bekymmer vid automatisk konvertering av värden.



Funktioner {#funktioner}
--------------------------------------------------------

Funktioner är ett spännande kapitel i JavaScript. Även om allt är objekt så är JavaScript ett funktionsorienterat språk, men mer om det senare. Först tar vi grunderna.

Funktioner kan skapas på olika sätt, jämför följande sätt att använda och skapa en funktion.

```javascript
function square (x) {           // Traditionellt sätt, 
  return x*x;                   // att jämföra med C/C++, PHP.  
}
val = square(x);

var square = function (x) {     // Funktions literal / Funktion expression, 
  return x*x;                   // funktionen tilldelas en variabel
}
val = square(x);

element.onclick = function () {  // Namnlös funktion som används 
  alert('Hello');                // som eventhanterare.
}

element.addEventListener("click", function () {
  alert('Hello');                // Variant på namnlös funktion som
});                              // eventhanterare som skickas som 
                                 // parameter i en funktion.
```

Funktioner har en argumentlista. Om man anropar funktionen med färre argument än listan så får de kvarvarande argumenten värdet `undefined`.

```javascript
function sum(a, b, c) {
  return a + b + c;
}

sum(1, 2, 3); // returnerar 6
sum(1, 2);    // returnerar NaN
```

Man kan ge "default"-värden på ett argument med hjälp av operatorn `||`. Studera följande funktion.

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

Man kan även hantera en variabel argument-lista med identifieraren `arguments` som finns tillgänglig inuti funktionen.

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

Den inbyggda variabeln `arguments` är en array som innehåller samtliga argument som skickats till funktionen.



###Övning tärning med funktioner {#uppgift-tarning}

Gör ett tärningsprogram, där en tärning kastas, snittvärdet beräknas och visas tillsammans med slagserien. Gör så här:

* Skapa en funktion `random(min, max)` som returnerar ett slumptal mellan `min` och `max`.
* Skapa en funktion `rollDice(times)` som kastar tärningen `times` gånger och returnerar en sträng med resultatet av alla slagningar samt medelvärdet av kast.

Så här kan det se ut när du kör ditt program.

[FIGURE src=/image/snapht15/js-dice.png caption="Tärningar uppbyggt av funktioner."]

Så här blev mitt [testprogram för tärningen](javascript/core/throwing-dice-using-functions/).



Objekt {#objekt}
--------------------------------------------------------

Objekt är en samling av namngivna värden som vanligen kallas "properties". För att referera till ett objekts property används punkt. I andra programmeringsspråk kan du se konstruktionen som en 

Man kan skapa ett objekt med objekt-literalen `{}`.

Här är ett exempel på ett objekt `myBall` som innehåller en bild på en boll och en placering av bollen på en tvådimensionell yta.

```javascript
var myBall = {};

myBall.image = 'http://dbwebb.se/img/black_ball_64_64.png';
myBall.position = {x:10, y:10}

console.log(myBall.position.x); // prints out 10
```

Ett objekt behöver inte innehålla någon properties från början, de kan defineras under resans gång, det är både bra och dåligt. Smidigt att inte behöva ha en specifikation på objektet utan att det går att modifiera dynamiskt under körningen, inte så bra när man skriver fel på namnet på en property och tror att man läser en befintlig property men istället definerar man en ny. Detta kallas att JavaScripts objekt är *mutable* [^10].

I nedan exempel har jag stavat fel på propertyn för `x`. Jag *tror* jag flyttar objektet till position 27 men det gör jag inte. Jag definerar en ny property med namnet `X` (skillnad på stor och liten bokstav). Sådant kan vara lurigt att felsöka.

```javascript
myBall.position.X = 27; 

console.log('The x-position of my ball is: ' + myBall.position.x);
```

Nu har vi ett enkelt objekt och kan lägga till metoder. Eller ja, metoder i form av en property som är en funktion. Det är alltså inget speciellt med en metod, bara ytterligare en property som kan innehålla allt som en vanlig variabel kan innehålla.



###Objekt och `this` {#this}

Vad sägs om en metod `draw()` för att rita ut objektet på skärmen? Vi kallar det metoder när funktioner är kopplade till ett objekt.

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

När man exekverar en funktion i ett objekt kan man använda [`this`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Operators/this) för att referera till det objekt som anropade funktionen [^5] [^6].

Låt oss lägga till en eventhanterare för klick på bollen och kolla vad som är `this` i en eventhanterare.

```javascript
myBall.HTMLelement.addEventListener('click', function (event) {
  console.log('Clicked on: ' + event.clientX + ' x ' + event.clientY);
  console.log(this);
});
```

Om du testkör ovanstående kod så kommer du att se att `this` pekar på `myball.HTMLelement`, alltså det objekt/funktion som är ägare till funktionen. Bra, då har vi koll på det. Vi måste dock vara lite uppmärksamma på vilket objekt som verkligen är `this` i olika sammanhang. Men här gick det bra.


<!--
###Urmodern till alla objekt {#urmoder}

Det finns en Object wrapper som är urmodern till alla JavaScript objekt, läs om vilka [metoder den erbjuder](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object). Alla nya objekt skapas med en mall som kallas `Object.prototype`. Därför får alla nya objekt tillgång till de metoder och properties som definieras i [Object.prototype](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/prototype). 

Detta är grunden till JavaScripts prototypbaserade objektmodell. Vi skall inte fördjupa oss i den nu. Men detta är anledningen till att ditt nyskapade objekt kan skrivas ut så här.

```javascript
myObject = {};
print(myObject);    // Ger "[object Object]"
myObject.toString() // Ger "[object Object]"
```

I exemplet ovan ser vi att man kan använda metoden `toString()` på vårt objekt som inte borde innehålla en sådan metod. Det är alltså kopplingen till Object som gör att den finns tillgänglig även för vårt nyskapade objekt.

Om man vill se kopplingen mellan objekt så kan man använda operatorn [`instanceof`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/instanceof) för att testa om en relationen stämmer.

```javascript
myString = new String("hej");
myString instanceof Object // true

myObject = {};
myObject instanceof Object // true
```

Vi lämnar den prototypbaserade objektmodellen tills vidare, vi får ta mer om det en annan dag.

Fint, då har vi lite koll på hur objekt fungerar.

-->



###Övning flytta bollen {#uppgift-bollen}

Du har en boll och du kan klicka på en plats i webbläsaren och bollen flyttar sig dit.

Så här kan exempelprogrammet se ut.

[FIGURE src=/image/snapht15/js-push-ball.png caption="Klicka i rutan och bollen flyttar sig."]

Så här blev koden för [exempelprogrammet för mig](javascript/core/pushing-the-ball/).



Array {#array}
--------------------------------------------------------

En [`array`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array) är en numrerad lista med värden. En array har en längd. Det finns ett antal metoder som hjälper dig att jobba med arrayer.

Det finns inga [associativa arrayer](http://en.wikipedia.org/wiki/Associative_array) i JavaScript (key/value), då använder du ett objekt istället.

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

Du kan utöka arrayen dynamiskt genom att tilldela den fler element i slutet av arrayen eller på en viss position. En position som inte fått ett värde tilldelat har värdet `undefined`. När du sätter längden på en array kan du trunkera den, som i exemplet ovan där det finns ett element på position 9 som försvinner när vi sätter arrayens längd till 4.

Att loopa genom en array kan man göra med for-loopen.

```javascript
for(i = 0; i < course.length; i++) {
    console.log(course[i]);
}
```

Objektet [Array](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array) innehåller en hel del metoder som du kan ha nytta av när du jobbar med arrayer. Kika på manualsidan och se om du känner igen några av metoderna.



###Övning Boulder Dash {#uppgift-boulder}

Låt oss använda arrayer för att göra ett spel influerat av [Boulder Dash](http://sv.wikipedia.org/wiki/Boulder_Dash), eller ja, en spelplan iallafall. Tanken är att testa hur en array kan användas.

När man bygger spel behövs en vacker bakgrund och det kan man skapa med texturer eller [tiles](http://en.wikipedia.org/wiki/Tile). Det finns webbplatser där man kan hitta denna typen av grafik. OpenGameArt, en webbplats med fri grafik till spel, där hittade jag de [tiles jag använde till min spelplan](http://opengameart.org/content/dungeon-crawl-32x32-tiles).

De tiles som jag använde finns [även via följande länk](img/tiles/).

Jag gjorde en spelplan om 24x24 rutor där varje ruta var 32x32 pixlar (samma storlek som tiles). Jag skapade spelplanen i en array och skrev ut den i JavaScript och använde CSS för att hantera bakgrundsbilderna.

Så här blev det för mig.

[FIGURE src=/image/snapht15/js-boulder-dash.png?w=w2 caption="Arrayer kan användas till mycket, här för att skapa en spelplan för spelet Boulder Dash."]

Så här blev koden för [exempelprogrammet för mig](javascript/core/boulder-dash-with-arrays/).

Du kan även titta på detta utökade exempel där min [baddie går runt](javascript/lekplats/boulder-dash-with-arrays/) på spelplanen.



Variabler utan värde, `undefined` {#undefined}
-----------------------------------------------

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



Ett icke-värde, `null` {#null}
-----------------------------------------------

Javascript skiljer på [`null`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/null) som är ett icke-värde och `undefined` som är ett odefinierat värde. Man använder `null` för att ge en variabel värdet `null`, med mening. När värdet `undefined` dyker upp så innebär det oftast att man inte initierat en variabel med ett värde.

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



Datumhantering med objektet `Date` {#date}
-----------------------------------------------

Med objektet [`Date`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Date) får vi en mängd metoder för att jobba med datum och tid.

```javascript
var today = new Date();
console.log(today.getMonth()); // Displays current month.
today.setMonth(2);
console.log(today.getMonth()); // Displays month 2, March that is.
```

Pröva själv att göra ett enkelt exempelprogram med datumhantering.



Reguljära uttryck med objektet `RegExp` {#regexp}
-----------------------------------------------

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



Objekt för felhantering, `Error` {#error}
-----------------------------------------------

JavaScript har en [`try...catch`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Statements/try...catch) och [`throw`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Statements/throw) hantering och det finns ett antal [`Error`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Error) objekt som kan användas i detta sammanhang.

```javascript
function my(i) {
    if (i === undefined) {
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

Låt oss ta en djupare titt på funktioner och hur de kan användas.



###Funktioner och scope {#functioner-scope}

I ett programmeringsspråk innebär "scope" den synlighet och levnadstid som variabler och parameterar har. Det handlar om minneshantering och namnkonflikter. De flesta C-liknande programmeringsspråk har "block"-scope, alla variabler är synliga i det blocket de är definierade och försvinner ur scoopet när man går ur blocket.

JavaScript har inte block-scope, även om det kan se ut så. JavaScript har "function"-scope vilket betyder att variabler som definierats i en funktion är *inte* synliga utanför den funktionen och en variabel i en funktion är synlig inom hela den funktionen, *inklusive* i funktioner som definierats i funktionen.

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

I programmeringsspråk med block-scope säger man att variabler skall definieras så sent som möjligt, precis innan de används eller i det blocket de används. I JavaScript definierar vi variablerna överst i funktionen, helst inom en enda `var`-deklaration separerade med kommatecken.



###Closure {#closure}

I exemplet ovan har den inre funktionen `f2()` tillgång till allt som är definierat i funktionen `f1()`. Detta kallas för "[closure](http://en.wikipedia.org/wiki/Closure_%28computer_science%29)" vilket är ett välkänt begrepp i programmeringspråk som stödjer [funktionell programmering](http://en.wikipedia.org/wiki/Functional_programming), programmeringsspråket [Lisp](http://en.wikipedia.org/wiki/Lisp_%28programming_language%29) är till exempel ett annat sådant språk.

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

I fallet ovan blir `window.accessToInner` samma sak som funktionen `inner()` eftersom en anonyma funktionen exekveras och returnerar funktionen `inner`.

Studera följande kodrader för att se skillnanden.

```javascript
myFunc = function() { console.log("hej"); }
myFunc(); // calls the function

myString = (function() { return "hej"; })()
console.log(myString); // just the string
```

Paranteserna gör att funktionen anropas direkt och är ett designmönster som hjälper att skapa ett closure. Detta sättet att automatiskt exekvera en funktion kallas self-invoking-anonymous-function (siaf), eller immediately-invoked-function-expression (iife/iffy) [^11].

En funktion har det scope som finns när den definieras, oavsett var den anropas. Man kan alltså definiera en funktion i en miljö och sedan förutsätta att funktionen exekveras i samma miljö. Detta ger möjligheter till inkapsling och låter oss undvika globala variabler. Därför är closure viktigt i JavaScript.



###Moduler -- "Module pattern" {#module}

Ett vanligt sätt att använda closure är för att skapa moduler av JavaScript kod. Man lägger en hel modul i en funktion, där finns hela scopet, ett eget closure. I denna funktion definieras allt som behövs i modulen, variabler såsom funktioner. Till sist returneras en objekt-literal där man anger modulens publika interface. Se följande exempel där jag skapat en modul `Mos` som är tänkt att innehålla lite bra-att-ha saker.

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

Funktionen skapar ett closure med två funktioner och en privat variabel. Funktionen returnerar ett objekt som innehåller de två funktionerna. Den anonyma funktionen exekveras direkt eftersom den omsluts av parenteser och returnerar därmed objektet `Mos` som tilldelas `window`.

En poäng med detta är att variabeln `private` som definieras i funktion, är tillgänglig varje gång en metod i objektet `Mos` anropas. Man får alltså en struktur som liknar ett objekt med publikt interface och med privata delar.

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

I båda fallen skapas/returneras ett objekt, *en modul*, med de funktioner som skall vara tillgängliga, och modulen kopplas till window-objektet.

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

Detta är alltså ett *module pattern* som ofta används i JavaScript för att kapsla in data i ett objekt, eller modul.
 


###Callbacks {#callbacks}

En funktion utan namn kallas ibland för [anonym funktion](http://en.wikipedia.org/wiki/Anonymous_function) eller lambda-funktion[^4]. [Lambda](http://en.wikipedia.org/wiki/Lambda_calculus) kommer från matematiken,

Ett vanligt sätt att använda anonyma funktioner är för callbacks, följande exempel visar en event-hanterare, skapad med [`addEventListener()`](https://developer.mozilla.org/en/DOM/element.addEventListener) som tar hand om ett klick på en knapp via en anonym funktion som *callback funktion*.

```javascript
var button = document.getElementById('button');

button.addEventListener('click', function () {
    console.log('Great - you clicked the button!');
});
```

Enda gången som funktionen kommer anropas är i samband med att någon klickar på den specifika knappen. Det finns ingen anledning att spara undan funktionen i en variabel någonstans, eller att definiera funktionen i det globala scopet. Det räcker bra med att definiera funktionen precis där den används, som en anonym funktion.

[INFO]
**Tips**

Har du koll på hur event fungerar? [Event är en del av DOM](https://developer.mozilla.org/en-US/docs/Web/Events), glöm inte att kolla in manualen vid behov.
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
});
```

Principen är att göra en funktion och sätta en timer att anropa funktionen med jämna intervall. I exemplet skapar jag funktionen `animateFunction()` som jag anropar med ett intervall av 0.5s. Processen startar när någon klickar på knappen och upprepas lika många gånger som det finns färger i arrayen `colors`.

Funktioner är både behändigt och kraftfullt i JavaScript, det är en central del i språket.

Här kan du [testa mitt exempel](javascript/core/animate-using-setTimeout/).

[YOUTUBE src=Nb4nU2VsyIE width=630 caption="Exempel på hur man kan animera med `setTimeout()`."]



Prototyper och arv {#prototype}
--------------------------------------------------------

JavaScript består av objekt men det finns inget som heter klasser. JavaScript är inte ett traditionellt objektorienterat språk och förväxla det därför inte med det som du lärt dig i Java, C++ eller PHP.

Programmeringssättet kallas "[Prototype-based programmering](http://en.wikipedia.org/wiki/Prototype-based_programming)" och du kan tjäna på att läsa på om vad som skiljer mellan klass-baserade arv och prototyp-baserad programmering [^7].

Läs gärna Douglas Crockfords artikel om ["Prototypal Inheritance in JavaScript"](http://javascript.crockford.com/prototypal.html).

Men, detta får vara ämnet för en separat artikel. Nu har du i alla fall hört konceptet och du vet att du inte skall förvänta dig att JavaScript är ett klassiskt objektorienterat språk, det är det inte. Glöm inte det.

Försök inte heller anpassa JavaScript till ditt traditionella objektorienterade tankesätt. Släpp det och lär dig istället kärnan i JavaScript. Anamma det funktionella programmeringssättet tills vidare. Så återkommer vi till prototypbaserad programmering lite senare i kursen.

Från och med [JavaScript version 6](https://github.com/lukehoban/es6features/blob/master/README.md), ES6, så kommer klasser att finnas med i språket. ES6 släpps 2015 men det kommer ta något år innan webbläsarna har fullt stöd för ES6. 

Men oavsett nyheterna i JavaScript 6 så kan det vara en bra idé att släppa sitt klassiska objektorienterade tankesätt och omfamna det mer funktionsorienterade programmeringssättet som JavaScript erbjuder. Iallafall när man går in i språket från början, förutsatt att man inte redan är kunnig i den funktionsorienterade programmeringsparadigmen.



Avslutningsvis {#avslutning}
--------------------------------------------------------

Nu har du en start, en introduktion till grunderna i programmeringsspråket JavaScript. Förvalta det väl och glöm inte att skriva egna program för att öva. Använd Firebugs konsol för att snabbt testa konstruktioner som du är osäker på.

[Denna artikel har en forumtråd](t/4810) kopplad till sig. Ställ gärna frågor eller tipsa i den tråden.



Revisionshistoria {#revision}
--------------------------------------------------------

<span class='revision-history' markdown='1'>
2015-11-11 (D, mos) Genomgång och ny struktur på artikel, bort med uppgifter.  
2013-11-12 (C, mos) Genomgång och en del justeringar inför ht13.  
2012-11-15 (B, mos) Justeringar vid genomgång. La till kapitel om Moduler.  
2012-11-03 (A, mos) Första utgåvan.
</span>



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

[^9]: [First-class functions](https://en.wikipedia.org/wiki/First-class_function)

[^10]: [Mutable objects](https://en.wikipedia.org/wiki/Immutable_object)

[^11]: [Self invoking anonymous function (siaf) or immediately invoked function expressen (iife/iffy)](https://en.wikipedia.org/wiki/Immediately-invoked_function_expression)

[^12]: [Functional programming](https://en.wikipedia.org/wiki/Functional_programming)
