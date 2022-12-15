---
author: mos
category: webbprogrammering
updated: "2013-09-24 13:23:02"
created: "2013-09-12 15:49:51"
...
En navbar med drop-down meny i ren HTML och CSS
==================================

Lär dig att göra en navbar med drop-down meny genom att enbart använda HTML och CSS. I tipset ["Skapa och styla webbplatsens meny, eller navbar, i HTML och CSS"](coachen/skapa-och-styla-webbplatsens-meny-eller-navbar-i-html-och-css) lärde vi oss att göra en navbar med `ul` och `li`, vi tar nu och bygger vidare på det exemplet och lägger till möjligheten till en drop-down meny, så att vi får plats med fler menyval, helt enkelt.

<!--more-->

Jag jobbar vidare med menyn som en lista, undermenyn blir sin egen lista. Själva HTML-strukturen för en *meny med undermeny* kan alltså se ut så här.

**HTML-struktur för meny med undermeny.**

```html
<nav class=navbar>
  <ul>
    <li><a href=#>Home</a></li>
    <li><a href=# class=selected>Blog</a></li>
    <li><a href=#>Pages</a>
      <ul>
        <li><a href=#>Page 1</a></li>
        <li><a href=#>Page 2</a>
        <li><a href=#>Page 3</a></li>
      </ul>
    </li>
    <li><a href=#>About</a></li>
  </ul>
</nav>
```

När ett menyval i undermenyn är valt, så väljer jag att ge dels det valda menyvalet klassen `selected`, och dels förälder-elementet klassen `selected-parent`. Det gör det möjligt, och enkelt, att styla respektive element, dels det valda elementet och dels förälder-elementet.

**HTML-struktur för meny med undermeny där element i undermenyn är vald.**

```html
<nav class=navbar>
  <ul>
    <li><a href=#>Home</a></li>
    <li><a href=#>Blog</a></li>
    <li><a href=# class=selected-parent>Pages</a>
      <ul>
        <li><a href=#>Page 1</a></li>
        <li><a href=# class=selected>Page 2</a>
        <li><a href=#>Page 3</a></li>
      </ul>
    </li>
    <li><a href=#>About</a></li>
  </ul>
</nav>
```

Grundstylen är densamma som för [exemplet med menyn utan undermeny](coachen/skapa-och-styla-webbplatsens-meny-eller-navbar-i-html-och-css). Men nu måste jag lägga till stylen för undermenyn, hantera undermenyns placering med absolut positionering, dölja den och visa den på rätt sätt och hantera när ett menyval görs i undermenyn.

Den slutliga stylen kan se ut så här, du kan se på kommentarerna vad som är ny style för undermenyn.

**CSS-kod för meny med submeny.**

```css
.navbar {}
 
.navbar ul {
  list-style: none; 
  margin: 0; 
  padding: 0;
}
 
.navbar li {
  display: inline;
  position: relative; /* New - to place the drop-down menu correctly */
}
 
.navbar a {
  white-space: nowrap; /* New - to make the drop-down menu items stay on one row */
  text-decoration: none;
  border: 1px solid transparent; 
  color: #00f
}
 
.navbar a:hover {
  color: #666; 
  border-color: #666 transparent;
}
 
.navbar li a.selected-parent, /* New - to style the selected parent */
.navbar a.selected {
  color: #222; 
  border-color: #222 transparent;
}


/* New - to style the submenu, start by hiding it using absolute positioning */
.navbar ul ul {
  background-color: #fff; 
  padding: 8px; 
  position: absolute; 
  left: -9999px; 
  z-index: 2;
}

/* Display the submenu when hovering the list element, absolute positioning */
.navbar li:hover ul {
  left: 0;
}

/* New - style items of the submenu when hovering and selected */
.navbar li li a:hover,
.navbar li li a.selected {
  border-color: transparent;
}
```

Jag gjorde ett [exempel i Style!](style/?id=6361) för att visa hur det kan se ut. Där kan du testa menyn och pröva att ändra stylen för att se vilken del som påverkar vad.

[FIGURE src=/img/snapshot/style_meny_med_undermeny.jpg?w=w1&q=60 caption="Ett fungerande exempel på en navbar i Style!."]

**PS.** En drop-down meny på detta sättet är en klassisk del av en navbar. Men var medveten om att det kanske inte är bästa lösningen för touch-skärmar där man inte kan klicka likt en mus. Men för att lösa det så *kanske* vi behöver en annan struktur, men mer om det en annan gång. 