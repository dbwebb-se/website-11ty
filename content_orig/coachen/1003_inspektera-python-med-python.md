---
author:
    - mos
category:
    - python
revision:
    "2017-06-09": "(A, mos) Första versionen"
...
Inspektera Python med Python
==================================

Verktyget Pylint kan användas för statisk  kodvalideringen av Python. Låt oss ta ett exempel och se hur vi kan använda Python funktioner för att inspektera Pythons kodstruktur och se varför ett felmeddelande från Pylint är skäligt.

<!--more-->

Koden vi har ser ut så här.

```python
str = "Hello"
```

Om vi använder kommandot `pylint` eller `dbwebb validate` så får vi följande felmeddelande som är en varning. Varningen betyder att det är olämplig kod, men det fungerar troligen att exekvera.

```text
WARNING pylint failed: './example/hello/hello-fel.py'
************* Module hello-fel
W:  7, 0: Redefining built-in 'str' (redefined-builtin)
```

Pylint klagar på att vi omdefinierar `str` som redan är definierat som en inbyggd funktion. 

Hur kan man då se vad som är inbyggt i Python? Låt oss kika på det.

Först de reserverade nyckelorden. Python, likt alla programmeringsspråk, innehåller reserverade ord. Låt oss se om `str` finns bland dem.

[ASCIINEMA src=11568]

Jag använde [modulen keyword](https://docs.python.org/3/library/keyword.html?highlight=keyword#module-keyword) som du kan läsa om i manualen.

Men nej, `str` fanns inte som ett inbyggt nyckelord. Låt oss istället titta bland de inbyggda funktionerna. Funktionen [`dir(modulnamn)`](https://docs.python.org/3/library/functions.html?highlight=dir#dir) listar allt innehåll i en modul.

[ASCIINEMA src=11574]

[Modulen `__builtins__`](https://docs.python.org/3/library/builtins.html?highlight=__builtins__) innehåller de inbyggda funktioner som finns i språket och där fanns `str`. Låt oss kika lite till på vad det `str` är för något.

Den inbyggda funktionen [`help(modul/funktion)`](https://docs.python.org/3/library/functions.html?highlight=help#help) visar hjälptexter om objektet. Låt se vad hjälptexten säger om `str`.

[ASCIINEMA src=11570]

Ah, det är en inbyggd modul för stränghantering. Ok. Då är det dumt att använda det som variabelnamn. 

Sånt här kan Pylint hjälpa oss med, att styra upp vårt kodande så att vi gör mer rätt.

Det finns en tråd i forumet där du kan [ställa frågor eller bidra med tips och trix](t/6523) rörande tipset.
