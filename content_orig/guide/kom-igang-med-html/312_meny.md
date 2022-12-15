---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Meny {#meny}
---------------------------------------------------

### nav {#nav}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/nav'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/nav</a>

`nav` är en tag som används för omsluta en meny, oavsett som det är huvudmeny, en sidomeny eller någon annan typ av meny. Elementet används alltså för att gruppera länkar och semantiskt i koden markera att det här är navigationslänkar.

```html
<nav>
	<a href="index.html">Start</a>
	<a href="report.html">Redovisningar</a>
</nav>
```

Den här navigationen kan man sätta i `header` eller precis efter.



### Använda listor och länkar för en meny {#listor-menyer}

Ett vanligt sätt att skapa en meny på är med hjälp av en lista som man vanligast sedan stylar för att få det att t.ex lägga sig vågrätt istället för lodrätt med hjälp av CSS. Du kan själv prova på vilket du själv föredrar.

```html
<nav>
	<ul>
		<li><a href="index.html">Start</a></li>
		<li><a href="report.html">Redovisningar</a></li>
	</ul>
</nav>
```
