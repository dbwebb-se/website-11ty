---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
title {#title}
=======================
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/title'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/title</a>

Den absoluta grundstrukturen är nu färdig, så vad sägs om att fylla på lite inställningar i den där head-taggen vi pratade om innan? Vi börjar med det som kallas `title`.

`title` anger som namnet antyder en titel åt sidan, men denna titel kommer inte att synas på själva sidan i sig. Istället så anger den vad som syns i fönstrets namn, det man ser i tabben.

Nu kommer vi alltså in på att ange en start-tagg och en slut-tagg med **innehåll mellan**:

```html
<title>Min me-sida</title>
```

`title` ska alltid ligga inom `head`, och såhär ser då den färdiga koden sen ut:

```html
<!doctype html>
<html>
	<head>
		<title>Min me-sida</title>
	</head>
	<body>
	</body>
</html>
```
