---
...
Hoisting
==================================

JavaScript behandlar variabler och dess deklarationer på ett speciellt sätt som kallas *hoisting*. Det innebär att deklarationerna flyttas högst upp i scopet. Det kan vara bra att ha det i åtanke när man strukturerar sin kod, då koden ibland kanske inte beter sig som man tänkt sig. Det gör sig speciellt tydligt med funktioner.



### Function declarations {#declarations}

Om man deklarerat en funktion på följande sätt:

```javascript
function speak() {
    console.log("Its working!");
}
```

Då kan man anropa den innan den kommer i programmets flöde:

```javascript
speak(); // Prints "Its working!" in the console

function speak() {
    console.log("Its working!");
}
```

Anledningen är att JavaScript flyttar upp alla deklarationer högst upp så hela funktionen hamnar överst. Om vi istället tittar på ett expression:

```javascript
let speak = function() {
    console.log("Its working!");
}
```

Här deklareras inte funktionen förrän programmet körs. Deklarationen som sker är `let speak;` vilket inte innehåller funktionen om man anropar den för tidigt:

```javascript
speak(); // prints "Uncaught TypeError: speak is not a function" in the console

let speak = function() {
    console.log("Its not working!!");
}
```

Det finns ett videoklipp för den nyfikne där jag visar mer om hoisting:

[YOUTUBE src=oj9S7k1B4UM width=630 caption="Kenneth pratar om hoisting."]
