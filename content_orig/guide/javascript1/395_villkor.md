---
...
Villkor
==================================

Vi går igenom hur villkorshantering kan se ut i JavaScript.



### If-sats

En traditionell if-sats ser ut på följande sätt:

```javascript
let aNumber = 50;

if (aNumber > 42) {
    console.log("large number!");
}
```



### If/else

Vi kan även lägga till fler villkor med else och elseif:

```javascript
let aNumber = 42;

if (aNumber > 42) {
    console.log("large number!");
} else if (aNumber < 42) {
    console.log("small number!");
} else {
    console.log("The number is perfect!");
}
```


Övriga villkor fungerar med sådom `<`, `>`, `<=`, `>=`, `!=`, `&&` (och), `||` (eller) osv.
