---
...
Variabler utan värde, `undefined`
==================================

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
