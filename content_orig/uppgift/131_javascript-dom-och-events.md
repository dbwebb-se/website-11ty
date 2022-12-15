---
author: lew
category: javascript
revision:
  "2020-11-25": (A, lew) Genomgång inför ht20.
...
JavaScript, DOM och Events
==================================

En övning för att bekanta sig med JavaScript och DOM. Hur påverkar man elementens utseende, flyttar dem, lägger till nya element, tar bort element och hur fungerar det med eventhantering?

<!--more-->


Förkunskaper {#forkunskaper}
-----------------------

Du kan en del om både JavaScript, HTML, CSS och hur de samverkar. Du kan grunderna i programmering med JavaScript och du har tidigare testat på att skapa objekt på en sida via JavaScript och du har prövat på att skapa event.

Du har skapat din egen [sandbox](uppgift/sandbox-steg-1) för exempelprogram.



Introduktion och tips {#intro}
-----------------------

Använd alltid MDN när du slår upp en funktion för att se vad den gör. Är du osäker så dubbelkollar du. Googla "MDN" följt av funktionens namn, så brukar träffen ligga bland de första.

Använd chatten för att fråga hur du kan lösa en viss uppgift. Du kan visa din kod i kanalen och du kan länka till din sida (om du publicerat den). Fråga om du hamnar i bekymmer.

Gör hela tiden små funktioner som du kan återanvända. Detta är en labb där du kan skapa små funktioner för varje liten del av lösningen. Små funktioner som är enkla att återanvända -- det kan löna sig i längden.

Kör ditt program i två olika webbläsare för bättre felsökning. Ibland händer det att något fungerar bra i Firefox, men inte i Chrome och vice versa. Ett bra tips är att provköra din kod i båda webbläsarna, ibland kan det spara en del felsökningstid.

Validera din kod ofta. Så slipper du en hel hög valideringsfel i slutet av övningen.

Så här kan det se ut (ungefär) när du är klar.

[YOUTUBE src=IZuVMsZzzIM width=630 caption="Exempel på hur det kan se ut när du är klar med labben."]



Uppgift 1. Storlekar och position {#uppgift1}
-----------------------

Använd din sandbox, kopiera den till katalogen `me/kmom05/dom` enligt följande.

```bash
# Ställ dig i kurskatalogen
cp -r me/kmom01/sandbox/* me/kmom05/dom/
```



###1.1 Skapa en tom sida med en grön låda {#11}

Placera ut en grön låda `<div id="box1" class="box center green size200"></div>` i filen `index.html`, positionera ut den med absolut positionering i centrum av webbsidans fönster.

Sätt följande i stylesheeten:

```css
html, body {
    position: relative;
    height: 100%;
    margin: 0;
    padding: 0;
    overflow: hidden;
}
```

Använd CSS-klasser för att ge lådan egenskaper. Här är ett exempel som du kan utgå ifrån.

```css
.box {
    position: absolute;
}

.center {
    top: 50%;
    left: 50%;
}

.green {
    background-color: green;
}

.size200 {
    height: 200px;
    width: 200px;   
}
```

Ta det som ett exempel på hur du kan strukturera dina CSS-klasser i förhållande till HTML-elementet. Du kan välja att göra på annat sätt om du vill.

Avsluta med att skapa en funktion som hjälper dig att skriva ut följande via `console.log()`.

1. Bredd och höjd på webbläsarens fönster.
3. Bredd och höjd på `#box1`-elementet.
4. Positionen på `#box1`-elementet enligt `left, top`.

Tips. Studera exemplet [`example/getSize/` i kursrepot](js/repo/example/getSize).

Tips. Använd följande för att hämta detaljer om ett objekt: `Window.getComputedStyle()`, `parseInt()`.

Tips. Dela upp din kod i små funktioner. Var flitigt med att använda `console.log()` när du hamnar i bekymmer. Eller debugga med Firebugs "Script" flik.



###1.2 Flytta ett objekt {#12}

Använd JavaScript-kod för att positionera `#box1` så exakt som möjligt i mitten av sidan.

Tips. Skapa egna små funktioner för att lösa uppgiften. Dina funktioner kan både utföra det de ska och samtidigt skriva ut debugg-utskrifter med `console.log()`.

Avsluta med att skriva ut positionen och storleken på `#box1`.



Uppgift 2. Eventhantering {#uppgift2}
-----------------------


###2.1 När webbläsarens fönster ändrar storlek {#21}

Fånga eventet för när webbläsarens fönster ändrar storlek. När det händer skall du alltid placera `#box1` i mitten av fönstret.

Tips. Studera exemplet [`example/resizeEvent/` i kursrepot](js/repo/example/resizeEvent).

Tips: `Window.onresize`.



###2.2 Fånga ett klick-event {#22}

Skapa en CSS-klass som definierar en `outline` för ett objekt, kalla CSS-klassen för `selected`.

Gör en eventhanterare för `click` som omväxlande ritar ut eller tar bort en outline från ett klickat objekt.

Koppla eventhanterare till `#box1`.

Om man nu klickar på objektet skall dess outline omväxlande visas och försvinna.

Skriv ut innehållet i eventet (skriv ut hela variabeln med `console.log()`). Studera vad eventet innehåller för detaljer.

Tips. `Element.classlist`, `EventTarget.addEventListener`.



###2.3 Byt form på valt element {#23}

Skapa en CSS-klass som gör ett cirkulärt element. Du kan uppnå denna effekten genom att sätta 50% som värde på `border-radius`. Döp klassen till `circle`.

När man klickar på tangenten `e` så skall alla element som har klassen `selected` växla mellan formen fyrkantig och cirkulär.

Tips: `Document.getElementsByClassName()`, `NodeList`, Använd en for-loop för att loopa runt elementen i `Nodelist`.



###2.4 Fånga ett event från tangentbordet {#24}

Skapa en funktion som tar ett element och förändrar dess storlek men behåller dess centrumposition.

Skapa en eventhanterare för tangentbordsnedtryckningar som förstorar elementet med 10px varje gång som tangenten `q` trycks ned.

Varje gång som tangenten `w` trycks ned skall elementet förminskas med 10px.

Förändringen skall ske om elementet är valt (har klassen `selected` satt). Annars händer inget.

Elementets upplevda centrum-position skall inte ändras. Man skall få känslan att elementet blir större eller mindre, men det skall inte flytta sin centrumposition. Du behöver alltså förändra `left` och `top` för att detta skall fungera.

Skriv ut innehållet i keyboard-eventet (skriv ut hela variabeln med `console.log()`). Studera vad eventet innehåller för detaljer.

Tips: `Window.onkeypress`, `KeyboardEvent`.




###2.5 Byt färg på valt element {#25}

Skapa CSS-klasser som representerar bakgrundsfärgerna gul, blå, röd.

När man klickar på tangenten `r` så skall alla element som har klassen `selected` byta färg enligt följande schema:

* grön -> gul
* gul -> röd
* röd -> blå
* blå -> grön

Gillar du inte färgerna så kan du byta till andra.



Uppgift 3. Lägg till och ta bort element {#uppgift3}
-----------------------



###3.1 Duplicera element {#31}

När man trycker på knappen `t` skall det skapas en kopia av alla element som är `selected`. Kopian skall placeras ut på en slumpmässig position, men hela elementet måste vara placerat innanför nuvarande storlek på fönster. Det nya objektet skall få en `z-index` som är 1 större än orginalet.

Missa inte att lägga till eventhanteraren för att göra select/de-select av ett element.

Skriv ut i `console.log()` hur många element som skapades.

Tips: `Element.cloneNode`, `Node.appendChild`. Använd inte `document.getElementsByClassName` som ger en *live `NodeList`*, använd , `document.querySelectorAll` som ger en *icke live `NodeList`*.



###3.2 Flytta elementet i z-led {#32}

När man trycker på tangenten `a` så skall de valda elementen flyttas ett steg ned i `z-index` (-1). När man trycker `s` skall de valda elementet flyttas ett steg upp i `z-index` (+1).



###3.3 Radera element {#33}

Tryck på knappen `y` för att raderas de element som är valda.

Tips: `document.querySelectorAll`, `Node.removeChild`.



###3.4 Flytta valda element {#34}

Skapa händelser för piltangenterna så att man kan flytta valda element till höger, vänster, upp och ned. Välj själv hur många pixel du vill flytta för varje tangentnedtryckning.



###3.5 Gör element icke valda {#35}

Tryck på knappen `u` för att göra alla valda element till icke valda.



###3.6 Gör samtliga element valda {#36}

Tryck på knappen `i` för att göra alla element till valda.

Skriv ut i `console.log()` hur många element som valdes.



###3.7 Skapa ett nytt slumpmässigt element {#37}

När man trycker på tangenten `p` så skall ett slumpmässigt element skapas. Ta en kopia av `#box1`, men slumpa fram dess position, färg och form.



Uppgift 4. Timers {#uppgift4}
-----------------------



###4.1 Dubbelklicka på element för att det skall försvinna {#41}

Skapa en CSS-klass som använder sig av CSS-transitions för att animera förändringen av ett elements storlek.

```css
.animateSize {
    transition: width 1s, height 1s;
}
```
När du dubbelklickar på ett element skall det "försvinna" enligt följande.

1. Ge elementet klassen `.animateSize`.
2. Sätt elementets `width` och `height` till `2px`.
3. Använd en timer för att radera elementet efter 2 sekunder.

Tips: `transition`, `window.setTimeout`.



###4.2 Animera med timer {#42}

*Varning. Klurig uppgift.*

Skapa en timer som byter utseende (färg, form) och position på ett element 5 gånger under 1 sekund.

Skapa en händelse för tangenten `d` som skall gälla samtliga element som är valda.

Tips. Hoppa över denna uppgift om du tycker den blir för svår -- men skriv isåfall en notis i redovisningstexten om *varför du väljer att hoppa över uppgiften*.



Uppgift 5. Gör en egen händelse {#uppgift5}
-----------------------

Gör en egen valfri händelse. Beskriv din händelse i redovisningstexten och berättar vad du gjort och hur du löste det.

Det kan vara enkelt eller utmanande, välj en rimlig nivå.



Extrauppgift {#extra}
-----------------------

Det finns inga extra uppgifter.



Publicera din kurskatalog {#publicera}
-----------------------

Validera och publicera labben, som en del av din me-sida.

```bash
# Ställ dig i kurskatalogen
dbwebb validate dom
dbwebb publish dom
```

Rätta eventuella fel som dyker upp och publicera igen. När det ser grönt ut så är du klar.

Dubbelkolla att din me-sida innehåller resultatet från uppgiften.



Tips från coachen {#tips}
-----------------------

Lycka till och hojta till i forumet om du behöver hjälp!
