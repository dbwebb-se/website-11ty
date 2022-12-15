---
author:
    - lew
category:
    - javascript
revision:
    "2021-05-17": (A, lew) Skapad inför HT2021.
...

Kom igång med JavaScript i terminalen {#intro}
=======================================================

Den här artikeln förutsätter att du har node installerat och fungerande. Vi börjar med att dubbelkolla så det fungerar.

```
$ node
Welcome to Node.js v14.17.0.
Type ".help" for more information.
>

```

Markören `>` visar att den så kallade *interpretatorn* är igång. Det verkar ju lovande.



### Interpretatorn {#interpret}

Man brukar se JavaScript som ett *interpreterat* språk och inte ett *kompilerat*. Traditionella språk som C# eller C++ behöver en kompilator som översätter koden till maskinkod så datorn förstår den och kan exekvera den. Även fast tolkningsprocessen till viss del kan liknas vid en kompilering så kallas det som sagt ett interpreterande språk. Oftast kör vi JavaScript i webbläsaren och där tolkar webbläsaren koden rad för rad innan den exekveras. I dagasläget använder webbläsarna en teknik som kallas JIT compilation (Just In Time), som renderar koden direkt vid exekvering (och de kallar faktiskt sin teknik för "kompilering").

Då vi inte börjar med webbläsaren, behöver vi en interpretator för att exekvera vår JavaScriptkod. Till vår hjälp har vi då node. Interpretatorn tolkar koden och översätter den till maskinkod så datorn kan hantera den. Vi kan använda interpretatorn för att snabbt testa olika konstruktioner. Vi testar en kodsnutt:

```
> let myVar = 42
undefined
> myVar
42
>
```

Vi kan se att det returneras *undefined* efter vi deklarerat och definierat variabeln `myVar`. Alla uttryck returnerar undefined om de inte har ett annat värde. När vi till exempel bara kör variabeln så returneras dess värde.

Vi avslutar interpretatorn med `Ctrl+D`.



### JavaScript i fil {#js-i-fil}

Nu vill vi ju spara vår kod så vi kan exekvera den fler gånger utan att behöva ha igång en interpretator. Om vi lägger JavaScriptkoden i en fil så kan vi exekvera filen med `$ node filename.js`, där *filename* då byts ut mot din egna fil.

Skapa filen `variables.js`.

```
$ touch variables.js
```

Öppna den i valfri editor och lägg in följande kod:

```javascript
const value = 25
const text = `lite text`
let newValue = value + 15

newValue += 2

console.log(value)
console.log(text)
console.log(newValue)
```

Vi skapar några variabler vi kan leka med. När vi deklarerar variablerna behöver vi berätta hur de ska bete sig. Vi väljer mellan `let` och `const`. De variabler vi inte ska ändra på skapar vi som konstanter, `const`. Vi skriver ju bara ut dem. Ska vi ändra på dem använder vi `let`.

Nu kan vi köra programmet med `$ node variables.js`:

```
$ node variables.js
25
lite text
42
```



### Vanliga konstruktioner {#vanliga-konstruktioner}

Vi tar och tittar på de vanligaste konstruktionerna och hur de se ut i JavaScript. Ni kan redan koncepten så vi går snabbt igenom syntaxen. Antingen kodar ni med och skapar några exempelfiler eller så hittar ni filerna i mappen kmom01/ under exempelmappen.



#### if/else/else if {#js-if-else}

Vi kontrollerar om variablen `value` är större än, mindre än eller samma som `maxValue`.

```javascript
const value = 42
const maxValue = 40

if (value > maxValue) {
  console.log(`${value} is higher than ${maxValue}`)
} else if (value < maxValue) {
  console.log(`${value} is lower than ${maxValue}`)
} else {
  console.log(`${value} is the same as ${maxValue}`)
}
```



#### forloop {#js-for}

Vi skriver ut värdet på variabeln `i` på lite olika sätt.

```javascript
const value = 42

// Print all values
for (let i = 0; i <= value; i++) {
  console.log(i)
}

// Print every other value
for (let i = 0; i <= value; i += 2) {
  console.log(i)
}

// Print values backwards
for (let i = value; i >= 0; i--) {
  console.log(i)
}
```



#### funktioner {#js-function}

Vi kan såklart även använda funktioner i JavaScript.

```javascript
(function () {
  console.log(`I get executed immediatly`)
}())

function printSomethingNice () {
  console.log(`You look good today!`)
}

function printSomethingNiceArguments (how, when) {
  console.log(`You look ${how} ${when}!`)
}

const arrowFunction = () => console.log(`I am an arrow function!`)
const arrowFunctionArguments = (a, b) => a + b

printSomethingNice()
printSomethingNiceArguments(`good`, `today`)
arrowFunction()

const answer = arrowFunctionArguments(13, 29)

console.log(answer)

```

Läs mer om [LÄNKA TILL FUNKTIONER](#)



Avslutningsvis {#avslutning}
------------------------------

Det var lite kort om de vanligaste konstruktionera i JavaScript och dess syntax.
