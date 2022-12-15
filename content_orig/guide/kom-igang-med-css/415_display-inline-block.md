---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
display, inline och block {#display}
=======================

CSS-konstruktionen `display`, bestämmer hur ett element skall visas, eller ritas upp på skärmen. De vanligaste  sätten att använda `display` är med `block` eller `inline`.

Ett block-element tar upp den fulla tillgängliga bredden och ger en ny rad för nästa element. Ett inline-element tar bara upp så mycket plats som behövs och ger inte en ny rad. Oavsett detta så påverkas både `block` och `inline` som vanligt av `margin`, `border` och `padding`.

Exempel på block-element är: `<div>`, `<h1>`, `<p>`.

Exempel på inline element är: `<img>`, `<a>`, `<strong>`, `<span>`.

Du kan sätta, eller ändra, ett elements `display`. Se följande exempel.

[Ändra ett elements `display`](https://codepen.io/dbwebb/pen/Vdrqre).

Du kan även välja att inte visa ett element genom att sätta `display:none`. Här ser du ett exempel på det.

[Gör ett element osynligt](https://codepen.io/dbwebb/pen/PaOXEj).

[Slå upp display i cheatsheet](http://www.w3.org/2009/cheatsheet/#search,display) och kolla hur konstruktionen beskrivs i cheatsheet och i specifikationen.
