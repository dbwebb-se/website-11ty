---
author: efo
revision:
    "2018-10-17": "(A, efo) Första versionen."
...
Hur kan vi använda CSS?
=======================

När vi vill designa ett element kan vi göra det huvudsakligen 4 olika sätt.

1. Använda `style` direkt på HTML-elementet. Här designas enbart det elementet vi har använt `style` på. Detta är inget bra tillvägagångssätt då vi blandar HTML och CSS i samma dokument, vilket leder till svårigheter vi underhåll.

```html
<h1 style="color: red;">Jag är en röd rubrik</h1>
```

2. Använda ID't för att ge style. Då ID i ett HTML-dokument bör vara unika ger detta bara stil till de unika elementet, men vi har separerat HTML och CSS.

```html
<!-- HTML-dokumentet -->
<h1 id="red-header">Jag är en röd rubrik</h1>
```

```css
/* CSS-filen */
#red-header {
    color: red;
}
```

3. Använda klassen för att ge style. Vi designar nu alla element som har en specifik klass och vi har separerat HTML och CSS. Många designers förespråkar att alltid använda klasser för att designa.

```html
<!-- HTML-dokumentet -->
<h1 class="red-header">Jag är en röd rubrik</h1>


<p class="red-header">Jag är en röd paragraf</h1>
```

```css
/* CSS-filen */
.red-header {
    color: red;
}
```

4. Använda element för att ge style. Vi designar nu alla element av en specifik typ på ett specifikt sätt genom att använda elementet istället för de mer specifika regler ovan.

```html
<!-- HTML-dokumentet -->
<h1>Jag är en röd rubrik</h1>


<p>Jag är bara en vanlig paragraf</h1>
```

```css
/* CSS-filen */
h1 {
    color: red;
}
```
