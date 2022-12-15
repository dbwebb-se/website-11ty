---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
article {#article}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/article'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/article</a>

`article`-taggen antyder även den med sitt namn vilken typ av innehåll som den är menad för. En artikel är ju trots allt ofta just en rubrik och en sammanhängande text. T.ex kan detta användas runt varje blogginlägg om man gör en bloggsida. I relation med `section` så kan man ha flera articles i samma `section`.

```html
<main>
	<section>
		<article>
			<h2>Om mig</h2>
		</article>
		<article>
			<h2>Varför jag ville plugga webb</h2>
		</article>
	</section>
</main>
```

[INFO]
Hela dokumentet bygger på olika typer av taggar, där man kan ha taggar inom andra taggar, som t.ex `article` inom `section` som i sin tur är inom `main`. När man bygger upp det på ett sådan sätt så skapas ett så kallat *träd*. Du kan se att det börjar *grena* sig neråt i koden.
[/INFO]
