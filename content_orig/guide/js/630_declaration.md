---
...
Function declaration
==================================

En *function declaration* eller *function statement* definierar en namngiven funktionsvariabel. Man kan likna det vid att deklarera en vanlig varibel. Istället för `var` använder vi `function`:

```javascript
function taxes() {
    console.log("Taxes are declared.");
}

taxes(); // Prints "Taxes are declared." in the console
```

Vi kan även skicka med argument till funktionen:

```javascript
function taxes(declared) {
    if (declared) {
        console.log("Taxes are declared.");
    } else {
        console.log("Taxes are not declared.");
    }
}

taxes(true); // Prints "Taxes are declared." in the console
```

Kika gärna på videon om declarations:

[YOUTUBE src=_cps7e9sbio width=630 caption="Kenneth visar function declaration."]
