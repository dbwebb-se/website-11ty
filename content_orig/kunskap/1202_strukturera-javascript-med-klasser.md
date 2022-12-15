---
author: efo
category: javascript
revision:
  "2022-01-07": (A, efo) Första utgåvan inför kursen webgl VT-22.
...
Strukturera JavaScript med klasser
==================================

Under de senaste åren har det hänt otroligt mycket med JavaScript, som har gått från att vara ett litet script-språk på webben till att bli ett av de mest använda programmeringsspråken. Vi ska i denna övningen titta på hur vi kan strukturera vår kod med hjälp av klasser.



<!--more-->



Klasser {#klasser}
--------------------------------------

Låt oss börja med att ta en titt på klasser i JavaScript. I kursrepot finns det ett litet exempelprogram [classes](https://github.com/dbwebb-se/webgl/tree/master/example/classes) för att visa upp klasser och webpack. En del av koden redovisas nedan, men det fullständiga programmet finns i kursrepot.

Dessutom är [MDN dokumentationen](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Classes) av klasser ett bra utgångspunkt för att lära sig mer.



### Definiera en klass {definition}

En klass definieras med hjälp av det reserverade ordet `class`. Och vi skapar dessutom en konstruktor med i exemplets fall fyra instansvariabler.

```javascript
// color.js
class Color {
    constructor(red, green, blue, alpha=1) {
        this.red = red;
        this.green = green;
        this.blue = blue;
        this.alpha = alpha;
    }
}

export default Color;
```

För att vi ska kunna använda klassen i andra filer avslutar vi filen med att exportera klassen. I JavaScript kan man exportera flera funktioner, objekt och klasser, med `default` definierar vi att klassen är det enda vi exporterar.

Låt oss testa att använda klassen som den är. Jag skapar filen `main.mjs` för att kunna importera klassen `Color`.

```javascript
import Color from "./color.js";

let color = new Color(1.0, 0.5, 0.5);

console.log(color.red);
```

Först importerar vi klassen `Color` från filen `./color.js`. Vi använder oss av en relativ sökväg till filen och i detta fallet antar vi att de ligger i samma katalog.

Vi kan nu skapa en instans av klassen `Color` genom att använda det reserverade ordet `new` och klassens namn. Vi instansierar detta objekt med tre argument `new Color(1.0, 0.5, 0.5);` då 4:e argumentet har ett default-värde satt i konstruktorn (alpha=1).

JavaScript skapar automatiskt både getter och setter-funktioner för oss vilket gör att vi direkt kan börja använda våra instansvariabler till exempel: `console.log(color.red);` som skriver ut 1 i konsollen.

Om man vill använda sig av private variabler och metoder finns det beskrivit i [referensmanualen](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Classes/Private_class_fields).

Vi kan inte göra så mycket än så länge men låt oss lägga till en instansmetod. I detta fallet vill ni skriva ut hex-koden för den färg vi har i vår instans.

```javascript
class Color {
    constructor(red, green, blue, alpha=1) {
        this.red = red;
        this.green = green;
        this.blue = blue;
        this.alpha = alpha;
    }

    // Methods
    calculateHexCode() {
        const red = Math.ceil(this.red * 255).toString(16);
        const green = Math.ceil(this.green * 255).toString(16);
        const blue = Math.ceil(this.blue * 255).toString(16);

        return `#${red}${green}${blue}`;
    }
}

export default Color;
```

Vi definierar en metod att använda `() { ... }` efter namnet på metoden. I detta fallet räknar vi om siffran från decimal siffra till en hexadecimal siffra för varje färg-kanal.

Vi använder sedan metoden för vår instans på följande sätt: `console.log(color.calculateHexCode());`.

Om du vill använda `static` finns information i [referensmanualen](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Classes/static).
