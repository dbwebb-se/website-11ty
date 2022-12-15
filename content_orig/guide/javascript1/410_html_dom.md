---
...
HTML DOM
==================================

DOM står för Document Object Model och HTML DOM är en standardiserad modell där en webbsidas alla element representeras som objekt. Det tillåts att manipulera objekten (elementen) och nå dess egenskaper med hjälp av metoder och "events". Webbläsaren skapar en modell när en sida laddas som kan representeras som ett träd av html-element. Roten av trädet, det element som ligger i grunden (eller toppen) är `<html>`. Trädet följer sedan strukturen vi definierat i html-sidan.

[FIGURE src=/image/javascript/guide/htmldom.png?w=w3 caption="Så här kan ett html DOM träd representeras."]



## Förklaring {#forklaring}

Vi känner igen de olika elementen från en html-sida. Elementet `<h1>` har till exempel `<body>` som förälder och innehåller i sin tur lite text. Vi kan med JavaScript manipulera de olika elementen och dess "familj" (föräldrar, barn syskon m.m.). Vi kan fånga elementen på olika sätt och på så sätt nå dess omgivning.
