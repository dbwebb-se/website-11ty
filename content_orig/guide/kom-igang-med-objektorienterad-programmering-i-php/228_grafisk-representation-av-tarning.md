---
author: mos
revision:
    "2018-03-27": "(A, mos) Första versionen, uppdelad av större dokument och uppdaterad."
...
Grafisk representation av tärning
==================================

Slutligen kommer vi till den grafiska representationen av tärningen och vi överlåter den helt till användaren i form av HTML och CSS. Vissa saker vill vi gärna undvika att lägga i vår klass.

Du fortsätter att jobba i samma filer som i föregående artikel och du skapar även `style.css` och `dice-faces.jpg`.

<!--
Borde spara i css/ respektive img/
-->



HTML för tärningar {#html}
---------------------------------

I min sidkontroller använder jag klassen för att förbereda utskriften av tärningarna. Jag använder klassnamnet jag får från klassen DiceGraphic och använder HTML elementet `<i>` tillsammans med en wrapper-klass.

Så här ser sidkontrollern ut.

```php
$dice = new DiceGraphic();
$rolls = 6;
$res = [];
$class = [];
for ($i = 0; $i < $rolls; $i++) {
    $res[] = $dice->roll();
    $class[] = $dice->graphic();
}

?><!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<h1>Rolling <?= $rolls ?> graphic dices</h1>

<p class="dice-utf8">
<?php foreach($class as $value) : ?>
    <i class="<?= $value ?>"></i>
<?php endforeach; ?>
</p>
```

Jag sparar undan den grafiska representationen för varje tärningsskast och skriver sedan ut den. Den genererade HTML-koden ser ut så här.

```html
<p class="dice-utf8">
    <i class="dice-1"></i>
    <i class="dice-2"></i>
    <i class="dice-6"></i>
    <i class="dice-6"></i>
    <i class="dice-1"></i>
    <i class="dice-2"></i>
</p>
```



Grafik med UTF-8 {#grafik1}
---------------------------------

Min första ansats blir att skapa grafiken med UTF-8 tecken. Min style för det ser ut så här. Spara din style i `style.css`.

```css
/**
 * Style a dice using UTF-8 characters.
 */
.dice-utf8 .dice-1::after { content: "\2680"; }
.dice-utf8 .dice-2::after { content: "\2681"; }
.dice-utf8 .dice-3::after { content: "\2682"; }
.dice-utf8 .dice-4::after { content: "\2683"; }
.dice-utf8 .dice-5::after { content: "\2684"; }
.dice-utf8 .dice-6::after { content: "\2685"; }

.dice-utf8 {
    font-size: 32px;
}
```

Tärningarna ser ut ungefär så här: <span style="font-size: 24px;">⚀ ⚁ ⚂ ⚃ ⚄ ⚅</span>

När man kör programmet ser det ut så här.

[FIGURE src=image/snapvt18/dice-graphic-utf8.png?w=w3 caption="Tärningar representerade som UTF-8 via CSS."]

Det känns bra att inte krångla in såna här saker in i PHP-klassens kod. Man kan tänka sig varianter av lösningar där man returnerar strängen som inkluderar HTML-elementet, men det känns inte rätt. Den typen av hantering lämnar vi till den som skapar vyn (HTML-delen) och stylen med CSS.




Grafik med CSS-sprite {#grafik2}
---------------------------------

En CSS-sprite är en bild som innehåller flera små bilder där man väljer vilken av bilderna som visas genom CSS positionering. När man levererar många små bilder till en webbplats är det inte ovanligt att man slår samman alla små bilder i en sådan sprite.

Först behöver vi en bild som fungerar som sprite för en tärning. [Denna blir bra](http://commons.wikimedia.org/wiki/File:Dice-faces_32x32.jpg). Ladda ned den och spara som `dice-faces.jpg`.

[FIGURE src=image/dice-faces.jpg caption="En CSS-sprite för en sex-sidig tärning."]

Med en stylesheet kan jag visa rätt bild beroende på vilken tärningssida jag vill se. Det handlar om att hantera bilden som en bakgrundsbild och variera  positioneringen så att rätt tärningssida visas.

Här är en stylesheet som visar olika bakgrundsbilder för tärningen.

```css
/**
 * CSS sprite for a dice with six faces.
 */
.dice-sprite {
    display: inline-block;
    padding: 0;
    margin: 0 4px 0 0;
    width: 32px;
    height: 32px;
    background: url(dice-faces.jpg) no-repeat;
}

.dice-sprite.dice-1 { background-position: -160px 0; }
.dice-sprite.dice-2 { background-position: -128px 0; }
.dice-sprite.dice-3 { background-position: -96px 0; }
.dice-sprite.dice-4 { background-position: -64px 0; }
.dice-sprite.dice-5 { background-position: -32px 0; }
.dice-sprite.dice-6 { background-position: 0 0; }
```

I detta fallet väljer jag att generera lite annorlunda HTML-kod, det blev enklare att styla på det viset.

```html
<p>
    <i class="dice-sprite dice-2"></i>
    <i class="dice-sprite dice-3"></i>
    <i class="dice-sprite dice-6"></i>
    <i class="dice-sprite dice-1"></i>
    <i class="dice-sprite dice-4"></i>
    <i class="dice-sprite dice-4"></i>
</p>```

När jag kombinerar allt i min sidkontroller kan det se ut så här.

[FIGURE src=image/snapvt18/dice-graphic-css-sprite.png?w=w3 caption="Ett antal tärningar representerade med olika grafiska metoder."]

Den översta raden är CSS spriten och den undre är UTF-8 varianten. Kanske är UTF-8 varianten att föredra, om man bara vill ha en enklare tärning. Det mest optimala vore kanske en SVG-tärning. Det finns många varianter.
