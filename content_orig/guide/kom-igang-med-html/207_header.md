---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
header {#header}
=======================
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/header'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/header</a>

Taggen `header` används för att ange just en header med t.ex logga, meny, sökfält osv som man är van vid att se överst på en sida. `header`-taggen kan sedan även användas för att strukturera upp t.ex titel och introduktion till artiklar och liknande så man är inte begränsad till att bara använda det för just sidans header. Man kan även använda det för delar av sidans innehåll som tjänar på en liknande introducerande struktur.

Men vi fokuserar på just sidans header och lägger till den först inom `body`-taggen så att den hamnar överst:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
		<meta charset="utf-8">
	</head>
	<body>
		<header>
		</header>
	</body>
</html>
```
