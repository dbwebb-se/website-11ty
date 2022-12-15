---
author: lew
revision:
    "2018-06-13": "(A, lew) Första versionen."
...
span {#span}
---------------------------------------------------

<a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/span'>https://developer.mozilla.org/en-US/docs/Web/HTML/Element/span</a>

`span` har inget semantiskt syfte som HTML5 har som mål, men det kan vara ett användbart element som man vill gruppera delar av en text, t.ex för att style'a det annorlunda med CSS senare.

```html
<p>Det här är en text, <span>där en del av den är omsluten i en span</span>.</p>
```

[INFO]
**Inline och block**

*Block* anger om elementet breder ut sig så mycket det kan och *inline* om det bara tar upp så mycket plats det behöver och även kan ligga brevid andra element. Läs på om de olika elementen och prova dig fram själv för att se hur olika element beter sig.

T.ex så är `p` ett *blockelement*, medan `span` är ett *inline*.

I HTML5 kallas block för *flow* och inline för *phrasing*, men det finns även fler kategorier. Dokumentationen anger alltid vilka kategorier ett element har, och det går att läsa om dem här: [Content categories](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/Content_categories)
[/INFO]
