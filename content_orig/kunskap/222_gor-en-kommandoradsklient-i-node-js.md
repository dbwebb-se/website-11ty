---
author: mos
category: javascript
revision:
    "2017-02-27": (C, mos) La till moduler variant av exemplet.
    "2017-02-24": (B, mos) Enbart node.
    "2015-09-08": (A, mos) Första utgåvan.
...
Gör en kommandoradsklient i Node.js
==================================

[FIGURE src=/image/snapht15/thinking-of-number.png?w=c5&a=0,70,75,0 class="right"]

Att skriva program för kommandoraden kan vara en trevlig programmeringsövning. Det brukar finnas en del inbyggda funktioner och bibliotek som underlättar för oss att skapa kraftulla kommandoradsprogram, commandline interface (CLI), om vi bara lär oss grunderna.

Så, hur ser då detta ut i Node.js? Hur skapar vi kommandoradsklienter i den asynkrona programmeringsmodell som Node.js förespråkar?

<!--more-->



Förutsättning {#forutsattning}
--------------------------------------

Du har Node.js installerat och kan grunderna i hur man programmerar JavaScript.

Om ditt kursrepo innehåller exempelprogrammet (linux, dbjs) så ligger det under `example/nodejs/guess-my-number-*`.



Gissa mitt nummer {#gissa1}
--------------------------------------

Vi behöver ett exempelprogram så vi tar det "klassiska" gissa vilket nummer jag tänker på.

Programstrukturen för gissningsleken ser ut så här.

```javascript
var min = 1;
var max = 10;
var number = Math.floor((Math.random() * max) + min);

console.log("I am thinking of a number between " + min + " and " + max);
askQuestion("Take a guess");
```

Tanken är att funktionen `askQuestion()` skall läsa in från terminalen och testa om det gissade talet är rätt eller ej.

Det är här vår synkrona tankebana kan spela oss ett spratt i en värld av asynkron programmering som är beroende av event. Hur läser man in något från tangentbordet i en loop i Node.js som är asynkron i grunden?

Jo, låt oss titta på hur Node.js löser det med sin inbyggda modul [readline](https://nodejs.org/api/readline.html).

Först importeras modulen och initialiserar så att den läser och skriver till *stdin* och *stdout*.

```javascript
var readline = require("readline");

var rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});
```

Därefter använder vi metoden `rl.question()` för att ställa en fråga och bifoga en callback som tolkar svaret. Vi lägger den kodbiten i funktionen `askQuestion()` så kan vi anropa den funktionen rekursivt varje gång man gissar fel. Ett rekursivt anrop är alltså en funktion som anropar sig själv.

```javascript
/**
 * Guessing game asking question.
 *
 * @param String question to ask
 */
function askQuestion(question){
    rl.question(question + "\n", (answer) => {
        if (answer < number) {
            askQuestion("Too low, Guess again!");
        } else if (answer > number) {
            askQuestion("Too high, Guess again!");
        } else {
            console.log("Well done! The answer was %s!", answer);
            rl.close();
            process.exit(0);
        }
    });
}
```

Du kan se hela programmet i ett sammanhang på GitHub, det heter [`index-step1.js`](https://github.com/mosbth/linux/blob/master/example/nodejs/guess-my-number-cli/index-step1.js).

Så här ser det ut när jag provkör det.

```bash
$ node index-step1.js
```

[ASCIINEMA src=26098]

Som sagt, om man är van vid synkron och blockande programmering där allt händer efter varandra, så kan den asynkrona programmeringsmodellen se lite udda ut vid första ögonkastet. Men man vänjer sig. Jag lovar.



Skicka parametrar till skripet {#para}
--------------------------------------

Låt oss utvidga skriptet och skicka med parametrar om vilket spann som gäller för siffran som gissas. Det vore också bra om skriptet kunde ge en hjälptext om man ber om det.

Så här skulle hjälptexten kunna se ut, om skriptet som anropas heter `index-step2.js`.

```text
$ index-step2.js -h
Usage: index-step2.js [options] <min> [<max>]

Options:                                    
 -h        Display help text.               
 -v        Display the version.             
```

Tanken är alltså att man kan anropa skriptet på olika sätt för att styra dess exekvering och förutsättningar.

Så här kan det se ut när man kör skriptet.

[ASCIINEMA src=26100]

Skriptet kan du se i sin helhet i filen [`index-step2.js`](https://github.com/mosbth/linux/blob/master/example/nodejs/guess-my-number-cli/index-step2.js). Så, vad har jag gjort?



###En shebang för node {#shebang}

Det första jag gjorde var att lägga till en shebang i början av skriptet.

```javascript
#!/usr/bin/env node
```

Sedan satte jag rättigheterna så skriptet blir körbart.

```bash
$ chmod 755 index-step2.js
```

Nu kan jag köra skriptet utan att ange node framför.

```bash
$ ./index-step2.js
```



###Detaljer om skriptet {#detaljer}

Sedan lade jag till en del detaljer om skriptet. Det jag framförallt vill åt är argumenten som skickas in till skriptet och de finns lagrade i arrayen [`process.argv`](https://nodejs.org/api/process.html).

```javascript
const VERSION = "1.0.0";

var path = require('path');
var scriptName = path.basename(process.argv[1]);
var args = process.argv.slice(2);
```

Om du är osäker på vad argv innehåller så skriver du bara ut den.

```javascript
console.log(process.argv);
```



###Funktioner för usage och version {#funk}

Jag skapar två funktioner för att skriva ut hjälptext och versionsnumret.

```javascript
/**
 * Display helptext about usage of this script.
 */
function usage() {
    console.log('Usage: ${scriptName} [options] <min> <max>

Options:
 -h        Display help text.
 -v        Display the version.');
}

/**
 * Display version.
 */
function version() {
    console.log(VERSION);
}
```

I funktionen `usage()` så använder jag en variant av [template strings](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/template_strings).



###En loop för att gå igenom alla argument {#loop}

Härefter skapar jag en loop som går igenom alla argument som skickas in på kommandoraden. Om jag känner igen ett argument så behandlar jag det. Till att börja med så hanterar jag det som jag kallar *options*, ett argument som börjar med ett minustecken.

```javascript
// Walkthrough all arguments checking for options.
var remaining = [];
args.forEach((arg) => {
    switch (arg) {
        case '-h':
            usage();
            process.exit(0);
            break;

        case '-v':
            version();
            process.exit(0);
            break;

        default:
            remaining.push(arg);
            break;
    }
});
```

Jag sparar undan alla argument som jag inte känner igen. Om det finns något kvar så är det de siffrorna jag skall använda för värdet på *min* och *max*.

```javascript
// Check if there is remaining arguments that should be used for min and max
if (remaining.length >= 2) {
    min = parseInt(remaining[0], 10);
    max = parseInt(remaining[1], 10);
} else if (remaining.length === 1) {
    min = parseInt(remaining[0], 10);
}

number = Math.floor((Math.random() * max) + min);
```

Nu kan vi spela som vanligt igen.

[ASCIINEMA src=26102]

Är det så här man gör ett CLI-skript med Node.js och parsar inkommande argument och options? Ja, det är en variant. Men det finns också paket i npm som man kan använda. Men de tar jag inte upp just nu. Det får vara en annan historia. Det jag visat är grundtekniken som gäller för CLI-skript och den tar dig en lång bit fram.



En mainloop {#mainloop}
--------------------------------------

Låt oss nu titta på en annan variant som är bra att ha i samband med CLI-skript. Vi ska göra en mainloop med en kommandotolk. Här använder vi den inbyggda modulen readline som vi redan använder i `rl.question(string, callback)`.

Tanken är att göra en kommandotolk. Man kan skriva in ett kommando som tolkas av skriptet. Låt mig visa hur man kan göra.

Först lite om koden bakom. Det allra sista jag gör i skriptet är nu att anropa en funktion för att sätta prompten.

```javascript
rl.setPrompt("Guess my number$ ");
rl.prompt();
```

Dessförinnan har jag satt eventhanterare på varje gång som man skriver in en rad vid prompten. Två stycken är det, en för `"line"` och en för `"close"`.

```javascript
rl.on("line", function(line) {
    switch (line.trim()) {
        case "exit":
            console.log("Bye!");
            process.exit(0);
            break;
        case "hello":
            console.log("Hello to you!");
            break;
       case "menu":
           menu();
           break;
       case "version":
           version();
           break;
       case "hint":
           console.log("I was thinking of the number " + number);
           break;
       case "random":
           number = Math.floor((Math.random() * max) + min);
           console.log("I changed the number and is now thinking an another one.");
           break;
       default:
           makeGuess(parseInt(line, 10));
    }
    rl.prompt();
});

rl.on("close", function() {
    console.log("Bye!");
    process.exit(0);
});
```

Även här ser vi en variant av rekursivt anrop till `rl.prompt()`. För varje gång som användaren skriver in en rad så processas dess innehåll i callbacken för eventet `"line"` och där finns en switch-sats som tolkar det som användaren skrivit in och utför respektive åtgärd. I slutet anropas funktionen `rl.prompt()` för att ta hand om nästa rad.

Titta på koden ovan och se nu när jag provkör exemplet, så kan du få en bild av hur det hänger ihop.

[ASCIINEMA src=26103]

Vi har alltså en mainloop som går runt runt tills dess vi avbryter den. Denna variant passar bra för CLI-program som har en egen meny.

Koden för detta exemplet ser du i sin helhet under [`index-step3.js`](https://github.com/mosbth/linux/blob/master/example/nodejs/guess-my-number-cli/index-step3.js).



Dela upp koden i moduler {#moduler}
--------------------------------------

Exemplet är färdigt och fungerar. Men innan vi slutar skall jag visa dig samma exempel men uppdelat i modulär kod. Du kan se exemplet i ditt kursrepo under `example/nodejs/guess-my-number-modules`.

Sådana här små CLI-program kan snabbt växa och det kan bli rörigt att hålla ordning i koden. Ett sätt att skapa en bättre struktur är att redan från början dela in programmet i små moduler.

I exemplet `guess-my-number-modules` byggde jag vidare på samma exempelprogram men valde att dela in koden i ett par moduler enligt följande.

| Module     | Beskrivning  |
|------------|--------------|
| `index.js` | Mainprogrammet som startar upp spelet. Main importerar cli och menu-modulen. |
| `cli.js`   | Modulen cli läser in options och arguments från kommandoraden och lagrar undan informationen i ett objekt så att programmet kan dra nytta av det. |
| `menu.js`  | Modulen menu innehåller gameloopen och menyn och styr vad användaren kan göra. Här importeras själva spelmodulen game. |
| `game.js`  | Modulen game innehåller själva spelet och styrs från menu modulen. |

Tanken är att modularisera för att göra det enklare att underhålla och bygga ut koden, eller att återanvända samma struktur till ett annan program.

Så här ser det ut när man kör det aningen uppdaterade programmet som nu är uppdelat i moduler.

[ASCIINEMA src=104826]

Bygg i moduler så blir programmens delar enklare upp underhålla och återanvända.



Avslutningsvis {#avslutning}
--------------------------------------

Det var grunderna i hur man kan sätta ihop ett kommandoradsprogram i Node.js, tillsammans med olika vägar att läsa in från terminalen.

Har du [tips, förslag eller frågor](t/4503) så finns det en specifik forumtråd för denna artikel.
