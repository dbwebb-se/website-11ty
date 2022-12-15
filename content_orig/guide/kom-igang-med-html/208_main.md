---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
main {#main}
=======================
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/main'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/main</a>

För att ange sidan huvudsakliga innehåll så använder vi taggen `main`. Denna ska, till skillnad från `header`, helst inte användas mer än en gång per dokument. Om man tänker på syftet för taggen så faller sig det också naturligt - man har inte mer än just ett huvudsaklig innehåll, område, på sidan.

Vi lägger det efter headern:

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
		<main>
		</main>
	</body>
</html>
```


[INFO]
HTML5 handlar mycket om just det logiska i vilka taggar man använder, så som `main`. Det kallas att skapa en *semantisk struktur* där taggarna på ett bra sätt beskriver just vad de innehåller. Har man det i åtanke så blir det lättare att välja vilka taggar man ska använda.
[/INFO]
