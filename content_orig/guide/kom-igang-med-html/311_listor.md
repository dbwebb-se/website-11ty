---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Listor {#listor}
---------------------------------------------------

### ul, ol {#ul-ol}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ul</a>
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol</a>

Det finns i grunden 2 typer av listor: *ordnade* och *oordnade*. Taggarn för dessa är `ul` (*unordered list*) och `ol` (*ordered list*). Skillnaden mellan dessa är att `ul` blir en punktlista, medan `ol` blir numrerad.

Raderna i listan anges sedan med `li`.



### li {#li}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/li'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/li</a>

När man skapar en lista så anger man *list element* med taggen `li`. Varje sådant element blir sedan en egen punkt i listan man lägger den i.

Ordnad lista:

```html
<ol>
	<li>Htmlphp</li>
	<li>oophp</li>
	<li>phpmvc</li>
</ol>
```

Punktlista:

```html
<ul>
	<li>HTML</li>
	<li>CSS</li>
	<li>PHP</li>
</ul>
```
