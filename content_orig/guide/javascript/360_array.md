---
...
Array
==================================

En [`array`](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array) är en numrerad lista med värden. En array har en längd. Det finns ett antal metoder som hjälper dig att jobba med arrayer.

Det finns inga [associativa arrayer](http://en.wikipedia.org/wiki/Associative_array) i JavaScript (key/value), då använder du ett objekt istället.

Du kan använda array-literalen för att skapa och jobba med arrayer på följande sätt.

```javascript
var notMuch = [];
var course = ['htmlphp', 'oophp', 'phpmvc', 'javascript'];

console.log(notMuch.length); // 0
console.log(course.length);  // 4
console.log(course[0]);      // 'htmlphp'

course[9] = 'mobile';

console.log(course.length);  // 10
console.log(course[8]);      // undefined
console.log(course[9]);      // 'mobile'

course.length = 4;
console.log(course.length);  // 4
console.log(course[9]);      // undefined
```

Du kan utöka arrayen dynamiskt genom att tilldela den fler element i slutet av arrayen eller på en viss position. En position som inte fått ett värde tilldelat har värdet `undefined`. När du sätter längden på en array kan du trunkera den, som i exemplet ovan där det finns ett element på position 9 som försvinner när vi sätter arrayens längd till 4.

Att loopa genom en array kan man göra med for-loopen.

```javascript
for(i = 0; i < course.length; i++) {
    console.log(course[i]);
}
```

Objektet [Array](https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array) innehåller en hel del metoder som du kan ha nytta av när du jobbar med arrayer. Kika på manualsidan och se om du känner igen några av metoderna.



###Övning Boulder Dash {#uppgift-boulder}

Låt oss använda arrayer för att göra ett spel influerat av [Boulder Dash](http://sv.wikipedia.org/wiki/Boulder_Dash), eller ja, en spelplan iallafall. Tanken är att testa hur en array kan användas.

När man bygger spel behövs en vacker bakgrund och det kan man skapa med texturer eller [tiles](http://en.wikipedia.org/wiki/Tile). Det finns webbplatser där man kan hitta denna typen av grafik. OpenGameArt, en webbplats med fri grafik till spel, där hittade jag de [tiles jag använde till min spelplan](http://opengameart.org/content/dungeon-crawl-32x32-tiles).

De tiles som jag använde finns [även via följande länk](img/tiles/).

Jag gjorde en spelplan om 24x24 rutor där varje ruta var 32x32 pixlar (samma storlek som tiles). Jag skapade spelplanen i en array och skrev ut den i JavaScript och använde CSS för att hantera bakgrundsbilderna.

Så här blev det för mig.

[FIGURE src=/image/snapht15/js-boulder-dash.png?w=w2 caption="Arrayer kan användas till mycket, här för att skapa en spelplan för spelet Boulder Dash."]

Så här blev koden för [exempelprogrammet för mig](javascript/core/boulder-dash-with-arrays/).

Du kan även titta på detta utökade exempel där min [baddie går runt](javascript/lekplats/boulder-dash-with-arrays/) på spelplanen.
