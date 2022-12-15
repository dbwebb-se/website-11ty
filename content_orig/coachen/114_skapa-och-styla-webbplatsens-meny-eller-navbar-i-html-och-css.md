---
author: mos
category: webbprogrammering
updated: "2013-09-16 14:16:18"
created: "2013-09-12 15:05:29"
...
Skapa och styla webbplatsens meny, eller navbar, i HTML och CSS
==================================

De flesta webbplatser innehåller en meny, en navigeringsbar, en navbar, med de vanliga länkvalen för webbplatsen. Ett av de vanligaste sätten att skapa en sådan navbar är att använda HTML's listelement `ul` och `li` för själva strukturen och därefter lägga på  CSS-kod för att göra så att det ser ut som en navbar. 

<!--more-->

Rent logiskt så är ju navbaren en lista av länkar och strukturen ger oss goda möjligheter att styla navbaren som vi vill.

**HTML-strukturen för en meny, navbar.**

```html
<nav class=navbar>
  <ul>
    <li><a href=#>Home</a></li>
    <li><a href=# class=selected>Blog</a></li>
    <li><a href=#>Pages</a>
    <li><a href=#>About</a></li>
  </ul>
</nav>
```

Som du kan se ovan, så lägger jag till en class `selected` på det menyval som nu är valt, det ger mig möjlighet att styla hur det valda menyvalet skall visas.

Stylen som vi applicerar skall dels ta bort grundstylen som finns för elementen `ul` och `li`, och dels skall den tillföra style som gör den till en navbar.

**Stylen för en meny, navbar.**

```css
.navbar {}

.navbar ul {
  list-style: none; 
  margin: 0; 
  padding: 0;
}

.navbar li {
  display: inline;
}

.navbar a {
  text-decoration: none;
  border: 1px solid transparent; 
  color: #00f
}

.navbar a:hover {
  color: #666; 
  border-color: #666 transparent;
}

.navbar a.selected {
  color: #222; 
  border-color: #222 transparent;
}
```

Jag gjorde ett exempel i Style! för att visa hur det kan se ut. Där kan du testa att ändra stylen och leka runt.

[FIGURE src=/img/snapshot/style_enkel_navbar.jpg?w=w1&q=60 caption="Ett fungerande exempel på en navbar i Style!."]

Här är länken till [exemplet på navbaren](style/?id=6360).

En god idé är sedan att generera meny med PHP, ungefär som görs i tipset om ["Skapa en dynamisk navbar / meny med PHP"](coachen/skapa-en-dynamisk-navbar-meny-med-php). Men det är en annan historia.
