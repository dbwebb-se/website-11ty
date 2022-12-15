---
...
Reguljära uttryck med objektet `RegExp`
==================================

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
