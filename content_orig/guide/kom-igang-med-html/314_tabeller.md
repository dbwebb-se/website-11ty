---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
Tabeller {#tabeller}
---------------------------------------------------

### table {#table}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/table'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/table</a>

Tabeller används för att visa upp data i rader och kolumner. Om du är bekant med `table` innan så kanske du vet om vissa attribut som `align` och `width`, men dessa ska inte användas. För att bestämma hur tabellen ser ut så använder man sen CSS.

Tabeller ska inte användas för layout, det är en utdaterad metod som har ersatts med att man använder CSS för att placera element på sidan.



### th, tr, td {#th-tr-td}

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tr'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/tr</a>
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th</a>
<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/td'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/td</a>

Tabeller består av *rader* och *celler*. Överst i tabellen har man en första rad med headers. Rader skapas med `tr` (*table row*), och cellerna för dessa headers skapas med `th` (*table header*). Table headers blir alltså titlarna på kolumnerna.

```html
<table>
	<tr>
		<th>Id</th>
		<th>Titel</th>
		<th>År</th>
	</tr>
</table>
```

Efterföljande rader fyller man sedan på med vanliga data-celler, `td`, i samma ordning som titlarna i `th`:

```html
<table>
	<tr>
		<th>Id</th>
		<th>Titel</th>
		<th>År</th>
	</tr>
	<tr>
		<td>1</td>
		<td>Pulp fiction</td>
		<td>1994</td>
	</tr>
	<tr>
		<td>2</td>
		<td>From Dusk Till Dawn</td>
		<td>1996</td>
	</tr>
</table>
```
