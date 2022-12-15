---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Citat och exempelkod {#citat-exempel}
---------------------------------------------------

### blockquote {#blockquote}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote</a>

Vill man visa upp ett citat så kan man använda taggen `blockquote`. Texten visas då lite indenterad.

```html
<blockquote>
	<p>I ache, therefore I am.</p>
</blockquote>
```



### pre {#pre}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre</a>

Att visa upp kodexempel i HTML kan vara lite klurigt, hur får man den t.ex att förstå att det är ett exempel och inte faktiskt kod? Till det används `pre` som förstår att det är ett exempel och försöker inte tolka koden, och dessutom visar indenteringar och liknande. Testa själv!

```html
<pre>
&lt;article>
	&lt;h3>Lite exempelkod&lt;/h3>
	&lt;p>Lorem ipsum.&lt;/p>
&lt;/article>
</pre>
```

Notera att jag har skrivit `&lt;` istället för `<` i exempelkod. Detta är för att det på sidan ska visas korrekt. Testa själv vad som händer om du bara skriver `<` i koden, och byt sen ut det mot `&lt;`.

`&lt;` är alltså en speciell kod för HTML och specialtecken som den inte ska tolka som kod eller som man vill visa upp och inte kan skriva vanligt. Dessa kallas *HTML entities*. Copyright-tecknet får du t.ex fram med `&copy;`.
