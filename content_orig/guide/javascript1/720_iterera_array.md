---
...
Iterera arrayer
==================================

Precis som i andra språk kan vi på olika sätt iterera igenom en array och både nå och manipulera dess innehåll.



### For-loop

Att loopa genom en array kan man göra med vanlig for-loop. Variabeln `i` kommer i detta fallet peka på respektive index i arrayen:

```javascript
let animals = ["cow", "chicken", "elephant"];

for(let i = 0; i < animals.length; i++) {
    console.log(animals[i]);
}
```



### Map

Man kan använda `map` om man vill köra en funktion på elementen i en array. Funktionen returnerar en ny array:

```javascript
let firstArray = [3, 4, 5, 6, 7];
let secondArray = firstArray.map(function(item) {
    return item * 5;
});

console.log(secondArray); // prints [15, 20, 25, 30, 35] in the console
```


### Filter

Vill man istället testa innehållet och skapa en ny array av de som klarar testet använder vi `filter`. Även filter() returnerar en ny array:

```javascript
let firstArray = ["apple", "banana", "pear", "kiwi", "orange"];
let secondArray = firstArray.filter(function(item) {
    return item.length === 4;
});

console.log(secondArray); // prints ["pear", "kiwi"] in the console
```



### ForEach

Vi kan även nå varje element med en forEach-loop:

```javascript
let words = ["speaker", "screen", "microphone"];

words.forEach(function(item) {
    console.log(item.toUpperCase()); // prints SPEAKER SCREEN MICROPHONE in the console
});
```
