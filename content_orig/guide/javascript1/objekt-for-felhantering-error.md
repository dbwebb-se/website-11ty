---
...
Objekt för felhantering, `Error`
==================================

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
