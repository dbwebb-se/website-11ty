---
author: mos
category:
    - javascript
    - nodejs
    - kursen databas
    - kursen dbjs
    - kursen linux
revision:
    "2019-01-28": "(B, mos) Genomgången inför vt19, ny kodstruktur och ny numrering på exempelprogrammen."
    "2018-01-04": "(A, mos) Uppdaterad version 2."
...
Gör en kommandoradsklient i Node.js (v2)
==================================

[FIGURE src=image/snapht15/thinking-of-number.png?w=c5&a=0,70,75,0 class="right"]

Vi skall skapa ett menybaserat terminalprogram, ett _command line interface_ (CLI), med JavaScript i Node.js. I terminalprogrammet läser vi in instruktioner från användaren via tangentbordet och i en kommandoloop låter vi programmet utföra olika funktioner utifrån vad användaren ber om.

Tanken är att ge dig grunden till ett menybaserat terminalprogram med en hyffsat god kodstruktur, en struktur som du kan bygga vidare på och integrera i din specifika miljö för dina egna applikationer.

Ett terminalprogram kan vara en användbar klient, både vid utveckling och när du levererar produkter till kunder.

<!--more-->

Så här kan det se ut när vi är klara.

[FIGURE src=image/snapvt18/guess-my-number-terminal.png?w=w3 caption="En terminalklient som implementerar spelet Gissa talet jag tänker på."]



Förutsättning {#forutsattning}
--------------------------------------

Du har Node.js installerat och kan grunderna i hur man programmerar JavaScript med Node.js.

Ditt kursrepo innehåller exempelprogrammet (linux, databas) under `example/nodejs/cli`.



Upplägg {#spec}
--------------------------------------

Vi skall skriva ett terminalprogram med JavaScript i Node.js. Vi kommer använda en modul i Node.js som heter [`Readline`](https://nodejs.org/dist/latest/docs/api/readline.html) för att göra ett menysystem och en kommandoloop som väntar på instruktioner från användaren och tangentbordet.

Vi skall göra en variant av gissningsleken "Gissa vilket nummer jag tänker på" för att exemplifiera hur programstrukturen kan byggas upp. Spelet går ut på att någon tänker på ett tal, datorn i detta fallet, och man får ett antal gissningar på sig att gissa rätt tal. Den som tänker på talet ger ledtråden om det rätta talet är högre eller lägre än gissningen.

Vi behöver följande.

1. Tillgång till modulen readline och grundläggande förståeöse för hur den används.
1. En main-funktion som startar upp programmet och initierar kommandoloopen.
1. En kommandoloop som läser in gissningar och fortsätter tills användaren gissat rätt eller gissningarna tar slut eller avslutar med `exit`.
1. En modul som löser spelets logik.

För att få en god kodstruktur så delar vi upp programmet i moduler som sparas i varsin fil och knyts samman i main-funktionen.

Rent användarmässigt kan det se ut så här när vi är klara.

[ASCIINEMA src=223879 caption="Vilken tal tänker jag på?"]

Låt då se hur vi bygger upp spelet, del för del.



Modulen readline och grunden {#grund}
--------------------------------------

Jag tänkte att vi bygger upp spelet del för del.

Exempelkoden för denna sektionen ligger i ditt kursrepo under `example/nodejs/cli/parts/1`.

Vi startar med en main-funktion i filen `index.js` som även innehåller en enklare variant av vårt spel. Jag börjar med att se till att modulen readline finns på plats och jag väljer att göra `question()` promosifierad så att jag kan använda async och await.

Inledningen på filen ser ut så här, det är import av modulern realine och promisifieringen av `question()`.

```javascript
/**
 * Guess my number, a sample CLI client.
 */
"use strict";

// Read from commandline
const readline = require("readline");
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

// Promisify rl.question to question
const util = require("util");

rl.question[util.promisify.custom] = (arg) => {
    return new Promise((resolve) => {
        rl.question(arg, resolve);
    });
};
const question = util.promisify(rl.question);
```

Sedan bygger jag en main-funktion som använder sig av await för att låta användaren skriva in ett nummer.

Main-funktionen innehåller även basen för själva gissa-spelet.

```javascript
/**
 * Main function.
 *
 * @async
 * @returns void
 */
(async function() {
    let thinking;
    let message;
    let guess;

    thinking = Math.round(Math.random() * 100 + 1);

    guess = await question("Guess my number: ");
    guess = Number.parseInt(guess);
    message = `I'm thinking of number ${thinking}.\n`
        + `Youre guess is ${guess}.\n`
        + `You guessed right? `
        + (thinking === guess);
    console.info(message);

    rl.close();
})();
```

Så här ser det ut när man kör mitt exempel.

```text
$ node index.js 
Guess my number: 42
I'm thinking of number 100.
Youre guess is 42.
You guessed right? false
```

Eller så här.

[ASCIINEMA src=223853 caption="En första variant av spelet för att gissa nummer, än så länge med endast en gissning."]

Jag hade nu kunnat gå vidare och gjort en loop där jag matade in siffran jag gissar på. Men, jag väljer istället att flytta all spellogik till en egen modul.



En modul för spellogiken {#modul}
--------------------------------------

Exempelkoden för denna sektionen ligger i ditt kursrepo under `example/nodejs/cli/parts/2`.

Jag lyfter ut spellogiken till en egen modul `game.js`. Jag behöver minst två metoder i modulen. Den ena metoden initierar spelet och slumpar fram numret. Den andra metoden kontrollerar om en gissning är rätt. Jag väljer att att bygga spelet som en klass.

Grovt sett ser min modul ut så här.

```javascript
/**
 * A module for game Guess the number I'm thinking of.
 */
"use strict";

class Game {
    /**
     * @constructor
     */
    constructor() {
        this.thinking = -1;
    }

    /**
     * Init the game and guess the number.
     *
     * @returns void
     */
    init() {
        this.thinking = Math.round(Math.random() * 100 + 1);
    }

    /**
     * Check if the guess is correct or not.
     *
     * @param {integer} guess The number being guessed.
     *
     * @returns {boolean} True if guess matches thinking, else false.
     */
    check(guess) {
        return guess === this.thinking;
    }
}

module.exports = Game;
```

Det blev en konstruktor som sätter medlemsvariabeln som kommer ihåg talet som tänks på. Det blev metoden `init()` som slumpar fram ett nytt värde och `check()` för att kontrollera om gissningen är rätt.

Egentligen vore det nog bra om jag kunde tjuvkika på vilket nuvarande tal som gäller via `cheat()` och kanske en metod `compare()` som returnerar om det verkliga talet är högre eller lägre än min gissning. Men jag utelämnar de metoderna för tillfället, du kan säkert klura ut hur de skulle byggas upp. Du hittar koden i kursrepot om du vill tjuvkika.

Modulen implementeras som en klass och klassen exporteras i sista raden i filen.

```javascript
module.exports = Game;
```

Det är export-delen som gör att modulen nu kan importeras i main-funktionen.

Jag uppdaterar min main-funktion så att den använder modulen, följande är de ändringar som främst görs.

Överst i min `index.js` så importerar jag modulen för spelet och instansierar ett objekt av klassen.

```javascript
// Import the game module
const Game = require("./game.js");
const game = new Game();
```

Jag kan sätta objektet `game` som `const`. Det innebär att `game` objektets medlemmar kan ändra sitt _state_, värden på sina medlemsvariabler. Men man kan inte låta variabeln `game` innehålla ett helt annat objekt.

Jag uppdaterar main-funktion så att den använder sig av klassens metoder.

```javascript
/**
 * Main function.
 *
 * @async
 * @returns void
 */
(async function() {
    let thinking;
    let guess;
    let match;
    let message;

    game.init();
    thinking = game.cheat();

    guess = await question("Guess my number: ");
    guess = Number.parseInt(guess);
    match = game.check(guess);
    message = `I'm thinking of number ${thinking}.\n`
        + `Youre guess is ${guess}.\n`
        + `You guessed right? `
        + (match);
    console.info(message);

    rl.close();
})();
```

Jag tjuvkikar efter vilket tal som man skall gissa på, för exemplets skull, via metoden `game.cheat()`. Jag kontrollerar om man gissning är rätt med `game.check(guess)`.

För säkerhetsskull testkör jag spelet, men det bör fungera på samma sätt som tidigare.

```text
$ node index.js 
Guess my number: 42
I'm thinking of number 46.
Youre guess is 42.
You guessed right? false
```

Min tanke med denna strukturen är att separera själva spelet från klienten som hanterar inmatningen och gissningen. Tanken är att spelet går att använda andra sammanhang och i andra klienter. Därför väljer jag att separera koden i två delar och undviker att lägga själva inmatningen i modulen `Game`, jag betraktar inte inmatningen en del som spellogiken.

Låt oss nu loopa igenom gissningarna.



En kommandoloop {#kommando}
--------------------------------------

Exempelkoden för denna sektionen ligger i ditt kursrepo under `example/nodejs/cli/parts/3`.

För att ta oss ett steg närmare ett spel så bygger vi en loop och samtidigt förbereder jag för ett större program genom att dela upp main-funktionen i delar så att gissningen hamnar i en egen funktion.

Mitt uppdaterade main-program ser ut så här.

```javascript
(async function() {
    let guess;
    let match;

    game.init();
    console.log(
        "Lets run a game of 'Guess my number'!\n"
        + "I am guessing of a number between 1 and 100.\n"
        + "Can you find out what number I'm guessing?\n"
    );

    while (!match) {
        guess = await question("Guess my number: ");
        guess = Number.parseInt(guess);
        match = makeGuess(guess);
    }

    console.log("You solved it! Congratulations!");

    exitProgram();
})();
```

Jag lade till lite intro-text och sen gjorde jag en oändlig loop som avslutas när funktionen `makeGuess()` returnerar `true`, vilket sker när gissningen är korrekt.

Jag flyttade logiken och utskriften, för att gissa talet, till funktionen `makeGuess()` som ser ut så här.

```javascript
/**
 * Guess the number and check if its correct.
 *
 * @param {integer} guess The number being guessed.
 *
 * @returns {boolean} true if correct guess, otherwise false.
 */
function makeGuess(guess) {
    let match;
    let message;
    let thinking = game.cheat();

    match = game.check(guess);
    message = `I'm thinking of number (cheating... ${thinking}).\n`
        + `Youre guess is ${guess}.\n`
        + `You guessed right? `
        + match;
    console.info(message);

    return match;
}
```

Den skriver ut lite information och berättar om gissningen gick bra. Den returnerar `true` om gissningen är rätt, annars returneras `false`.

Variabeln `game` är global i den filen vi befinner oss. Det är okey att ha det så.

Jag vill undvika att main-funktionen blir för stor, så jag delar gärna upp dess kod i olika funktioner som jag lägger i samma fil.

Du kan se ytterligare ett exempel på det i funktionen `exitProgram()`. Det är en funktion som avslutar alla processer och stänger programmet med en exit kod som normalt är 0, vilket innebär att programmets exekvering gick bra.

```javascript
/**
 * Close down program and exit with a status code.
 *
 * @param {number} code Exit with this value, defaults to 0.
 *
 * @returns {void}
 */
function exitProgram(code) {
    code = code || 0;

    console.info("Exiting with status code " + code);
    process.exit(code);
}
```

Vill du inte ha utskriften så kan du kommentera bort den när du vet att koden fungerar.

Så här kan det se ut när man nu kör programmet.

[ASCIINEMA src=223863 caption="Nu kan vi loopa igenom spelet och göra flera gissningar."]

Vi skall nu se hur vi kan bygga vidare på vår loop för att hantera fler kommandon, det blir ett embryo till en menybaserad klient.



En kommandoloop {#kommando}
--------------------------------------

Exempelkoden för denna sektionen ligger i ditt kursrepo under `example/nodejs/cli/parts/4`.

Låt oss nu utveckla main-funktionen för att läsa in gissningar tills det blir rätt, eller tills gissningarna tar slut, eller tills användaren avslutar genom att skriva in `exit`.

Vi skall göra detta genom att använda en alternativ inmatning där vi använder `rl.prompt()` för att skriva ut en promt till användaren. När användaren matar in något så anger vi en callback som anropas för att lösa inmatningen, sedan skrivs prompten ut igen.

Det blir en variant av en oändlig inmatningsloop, tills dess att användaren väljer att avsluta med att skriva in `exit`.

Så här ser den uppdaterade main-funktionen ut.

```javascript
/**
 * Main function.
 *
 * @returns void
 */
(function() {
    rl.on("close", exitProgram);
    rl.on("line", handleInput);

    game.init();
    console.log(
        "Lets run a game of 'Guess my number'!\n"
        + "I am guessing of a number between 1 and 100.\n"
        + "Can you find out what number I'm guessing?\n"
    );

    rl.setPrompt("Guess my number: ");
    rl.prompt();
})();
```

Notera att main-funktionen inte behöver definieras som async då vi nu inte använder await inuti den, eller inuti någon av de funktioner som main-funktionen anropar.

Låt oss kika på konstruktionerna i main-funktionen, en och en.

```javascript
rl.on("close", exitProgram);
```

Den första konstruktionen handlar om att lägga en eventhanterare till "close-eventet". Det är till exempel om användaren trycker `ctrol-d` vilket ofta innebär slutet på inmatning. När det eventet fångas så anropas dess eventhanterare, som nu är funktionen `exitProgram` och den funktionen har vi sett tidigare.

```javascript
rl.on("line", handleInput);
```
Den andra konstruktionen definierar den eventhanterare som anropas när eventet "line" sker, det är när användaren har matat in något och tryckt enter. Då anropas eventets callback som är funktionen `handleInput`, låt oss kika på den funktionen.

```javascript
/**
 * Handle input as a command and send it to a function that deals with it.
 *
 * @param {string} line The input from the user.
 *
 * @returns {void}
 */
function handleInput(line) {
    let guess;

    line = line.trim();
    switch (line) {
        case "quit":
        case "exit":
            exitProgram();
            break;
        default:
            guess = Number.parseInt(line);
            makeGuess(guess);
    }

    rl.prompt();
}
```

Funktionen, eller callbacken, har en inkommande parameter som är en sträng som användaren matat in i terminalen. Sedan görs en switch/case där man kontrollerar vilket "kommando" som användaren matat in. Här har vi två kommandon för att avsluta programmet och annars betraktar vi det som matats in som en gissning.

Vill vi ha fler kommandon, som till exempel "menu" för att skriva ut en meny, så lägger vi till ytterligare ett case.

Det sista som sker i funktionen är att prompten skrivs ut igen.

Vi går tillbaka till main-funktionen och ser dess sista konstruktioner.

```javascript
    game.init();
    console.log(
        "Lets run a game of 'Guess my number'!\n"
        + "I am guessing of a number between 1 and 100.\n"
        + "Can you find out what number I'm guessing?\n"
    );

    rl.setPrompt("Guess my number: ");
    rl.prompt();
})();
```

Vi initierar spelet och skriver ut en liten text. Det sista vi gör är att skriva ut prompten och lämna över kontroller till användaren.

Om jag nu spelar spelet så kan det se ut så här.

[ASCIINEMA src=223877 caption="Nu kan vi loopa igenom spelet och göra flera gissningar."]

Du kan använda pil upp och pil ned för att navigera mellan de kommandon du skrivit.



Summering och färdigt spel {#summering}
--------------------------------------

Vi har nu en grund till ett terminalprogram som kan utföra olika saker beroende på vad användaren matar in. Vi har strukturerat vissa delar av koden i funktioner och andra i moduler. Här väljer vi det som vi tycker passar bäst för den kodstruktur vi vill uppnå. När koden växer så kanske vi måste göra andra beslut och bygga kom kodstrukturen.

Men, innan vi slutar. Hur skulle ett färdigt spel se ut?

Hur kan vi bygga ut programmet med en meny som visas om man skriver `help` eller `menu`?

Kan vi lägga till ett menyval som heter `cheat` och skriver ut nuvarande siffra i spelet?

Kan vi lägga till ett menyval som heter `init` som startar om spelet och gissar talet på nytt? Så att man kan fortsätta spela när man gissar rätt?

Vad sägs om att lägga till ett max antal gissningar? Man måste gissa rätt siffra, men man får bara ett begränsat antal gissningar.

Hur skulle du gjort dessa utökningar av programmet? Troligen går det bra att bara bygga vidare på samma struktur du har. Känner du att det blir för mycket kod i `index.js` så har du alltid möjligheten att bryta ut delar av koden till en egen modul/fil.

Jag gjorde min egna lilla uppdatering till spelet som du ser ut så här när man spelar.

[ASCIINEMA src=223879 caption="Spelet är nu klart och likaså är strukturen för en menydriven terminalklient."]

Exempelkoden för denna sektionen ligger i ditt kursrepo under `example/nodejs/cli/parts/5`.



Avslutningsvis {#avslutning}
--------------------------------------

Detta var grunderna i hur man kan sätta ihop ett terminalprogram med JavaScript i Node.js. Du har fått en grundstruktur som du kan bygga vidare på när du vill ha ett enklare terminalprogram.

Har du [tips, förslag eller frågor](t/7193) så finns det en specifik forumtråd för denna artikel.
