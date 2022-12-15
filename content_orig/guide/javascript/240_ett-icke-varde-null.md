---
...
Ett icke-värde, `null`
==================================

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
