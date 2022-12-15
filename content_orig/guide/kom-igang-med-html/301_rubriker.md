---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Rubriker {#rubriker}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements</a>

Rubriker används precis på samma sätt som när man skriver dokument, och det finns 6 olika storlekar av rubriker. `h1` är störst, och `h6` är minst.

Testa gärna alla 6 rubrikerna för att se hur de ser ut och skillnaderna mellan dem. I min exempelkod så har jag börjat med att lägga till 2 rubriker, en i headern som namnet på min sida, och en i `main` för att ha en rubrik till det texten ska handla om:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
		<meta charset="utf-8">
	</head>
	<body>
		<header>
			<h1>Min me-sida</h1>
		</header>
		<main>
			<h2>Om mig</h2>
		</main>
		<footer>
		</footer>
	</body>
</html>
```
