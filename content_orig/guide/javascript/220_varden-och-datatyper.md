---
...
Värden och Datatyper
==================================



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
