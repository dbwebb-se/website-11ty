---
author: efo
category: webbprogrammering
revision:
  "2017-03-20": (A, efo) Första utgåvan inför kursen webapp v2.
...

Enhetens storlek och orientering
==================================

I denna artikel går vi igenom hur man kan visa upp information om enheten med hjälp av javascript.


<!--more-->

I detta exempel gör vi en HTML-sida som visar om webbsidan för tillfället visas i porträtt eller landskapsläge, samt visar hur stor yta som finns tillgänglig. Källkoden för detta exempel finns i [`example/storlek`](repo/webapp/example/storlek) och på [Github](https://github.com/dbwebb-se/webapp/tree/master/example/storlek).

Jag använder mig av API:et för  [Screen](https://developer.mozilla.org/en-US/docs/Web/API/Screen) och dess  `screen.height` och `screen.width` för att räkna ut hur stor skärmens yta är och vilken orientering den har.

Jag kopplar en eventhanterare till webbläsarens event för omritning, [`window.onresize`](https://developer.mozilla.org/en-US/docs/Web/API/GlobalEventHandlers/onresize). Eventet anropas när man förändrar storleken på webbläsarens fönster, eller som i mitt fall den simulerade skärmen.

Så här kan min HTML-kod se ut.

```html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <title>Enhetens storlek</title>
    </head>
    <body>
        <h1>Är du i landskap eller portätt-läge?</h1>
        <div id="orientationContent"></div>

        <script type="text/javascript" src="main.js"></script>
    </body>
</html>
```

Tanken är att skriva ut detaljer om sidans storlek och orientering och placera informationen i `#orientationContent`.

Funktionen för att göra detta, har jag lagt i `js/main.js` och den ser ut så här.

```javascript
/**
 * Check the orientation and size of the screen.
 *
 * @return void
 */
window.checkSizeAndOrientation = function() {
    var width = window.screen.width,
        height = window.screen.height,
        isPortrait = width < height,
        text = "",
        element = document.getElementById("orientationContent");

    text  = "<p>Skärmens storlek är (w x h):<br>" + width + " x " + height;
    text += "<p>Orienteringen är : " + (isPortrait ? "Porträtt" : "Landskap");

    element.innerHTML = text;
};
```

Du kan se att funktionen använder API:et för Screen för att hämta skärmens yta. Funktionen har ett id till det HTML-element som används för att skriva ut resultatet i form av HTML-kod.

Det som också behövs är en eventhanterare som ritar om sidan när orienteringen ändras -- när användaren skiftar från porträtt till landskaps-läge, och vice versa.

```javascript
/**
 * Add eventhandler for the onresize event.
 */
window.onresize = function() {
    window.checkSizeAndOrientation();
};
```

Jag behöver också anropa funktionen en första gång. Så att sidan får ett innehåll till att börja med.

```javascript
// Call the function one to write out current orientation
window.checkSizeAndOrientation();
```

Så här ser sidan ut när Mikael testar sidan i Google Chrome, Firefox, Firefox OS och Android emulator.

[YOUTUBE src=3QcYLKi74Lo width=630 caption="Storlek och orientering i olika enheter."]
