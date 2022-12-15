---
...
Anonyma funktioner
==================================

En anonym funktion, *anonymous function*, är en namnlös funktion. Det betyder att den inte har en namngiven identifierare, utan deklareras dynamiskt med funktions-operatorn när programmet körs.

```javascript
let whoAreYou = function() {
    console.log("We are Anonymous!");
}

whoAreYou(); // Prints "We are Anonymous!" in the console
```

**whoAreYou** är en variabel som håller en anonym funktion.

Vi har sett ett användningsområde för en anonym funktion i eventlyssnaren:

```javascript
button.addEventListener("click", function() {
    // Do something
});
```
