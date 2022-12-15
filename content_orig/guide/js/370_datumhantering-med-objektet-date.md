---
...
Datumhantering med objektet `Date`
==================================

Med objektet [`Date`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Date) får vi en mängd metoder för att jobba med datum och tid.

```javascript
let today = new Date();
/*
* Year, month and day
*/
console.log(today.getFullYear()); // Displays the current year in the format YYYY
console.log(today.getMonth()); // Displays a number-representation of the current month, (0-11)
console.log(today.getDate()); // Displays a number-representation of the current day, (1-31)

/*
* Hours, minutes and seconds
*/
console.log(today.getHours()); // Displays the current hour in your timezone, 24h
console.log(today.getMinutes()); // Displays the current minute
console.log(today.getSeconds()); // Displays the current seconds
```
