---
...
KeyboardEvent
==================================

Vi börjar med att kika på några events från tangentbordet. Ett event kan triggas när man trycker ner en tangent, när man håller nere den eller när man släpper upp tangenten. Det som skiljer dem åt är hur de initieras.



### keydown {#keydown}

```javascript
document.addEventListener("keydown", function(event) {
    console.log(event);
});
```

Vi lägger eventlyssnaren direkt på `document`. Det skickas in två argument, eventnamnet `"keydown"` och en anonym funktion som körs automatiskt när eventet triggas. Argumentet `event` skickas med och innehåller hela eventet som triggas. För att enklare se vad som menas så kikar vi på hur det ser ut i consolen när vi skriver ut det:

[FIGURE src=/image/javascript/guide/arrowUp.png?w=w3 caption="Ett KeyboardEvent i consolen"]

Vi kan se att det är typen `KeyBoardEvent` och en uppsättning egenskaper vi kan använda. Klickar man på den lilla pilen till vänster dyker det upp en hel del fler. Jag tryckte på "uppåt-pilen" på tangentbordet och kan då se egenskapen `key` med värdet `ArrowUp`. Tidigare har webbläsarna använt sig av [ASCII-värden](http://www.asciitable.com/) för att hantera de olika tangenterna. Numera kan vi, i alla fall i Chrome och Firefox, använda oss utav den faktiska bokstaven eller tangenten.

Vi har alltså fångat eventet att en tangent trycks ner. All information hittar vi i `event`. Vi kikar på hur vi kan använda informationen:

```javascript
let myContent = document.getElementById('content');

myContent.innerHTML = "<h3>Press a letter in the word 'dbwebb':</h3>";

document.addEventListener("keydown", function(event) {
    let key = event.key; // Catch the key property

    switch (key) {
        case "d":
        case "b":
        case "w":
        case "e":
            myContent.innerHTML += `<br>Good job, you pressed ${key}`;
            break;
        default:
            myContent.innerHTML += `<br>You pressed: ${key}`;
    }
});
```

Vill du se mer kan du titta på videon som visar onkeydown:

[YOUTUBE src=pLt5tWcMt-s width=630 caption="Kenneth visar onkeydown."]



### Övriga keyboard-events {#ovriga}

Det finns som sagt fler events att fånga upp från tangentbordet. Det skiljer inte så mycket, utan definiera rätt event som argument till eventlyssnaren:

```javascript
document.addEventListener("keypress", function(event) { ... }
document.addEventListener("keyup", function(event) { ... }
// etc
```
