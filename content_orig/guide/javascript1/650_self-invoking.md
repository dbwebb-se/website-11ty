---
...
Self-invoking functions
==================================

En *self-invoking* funktion är egentligen en *function expression* som exekveras automatiskt. För att tala om att det är en function expression behöver vi paranteser runt om och för att det ska exekveras automatiskt lägger vi till `()` i slutet:

```javascript
(function() {
    console.log("Self-invoking, baby!");
})();

// Prints "Self-invoking, baby!" in the console
```

Vi har redan sett en sådan i vår sandbox!

Det kallas även *anonymous self-invoking function*.
