---
author: mos
category: artikel
revision:
    2012-08-31: (C, mos) Omskriven och flyttad från WordPress till Lydia.  
    2012-03-28: (B, mos) Flyttad från blogspot till WordPress.  
    2010-09-16: (A, Rickard Gimerstedt) Första utgåvan.  
updated: "2012-09-11 07:56:46"
created: "2012-09-11 07:56:40"
...
Gör så de nya HTML5 elementen fungerar i Internet Explorer
==================================

Äldre webbläsare, såsom IE8 och tidigare, har ingen koll på den nya HTML5 elementen. Med lite hjälp av ett JavaScript som kallas **html5shiv** så kan du dock få dessa äldre läsare att hantera de nya elementen.

<!--more-->




html5shiv {#html5shiv}
--------------------------------------------------------------------

Det är ett litet JavaScript du behöver och det finns att nå via Googles servrar. Du inkluderar det i din webbsida på följande sätt.

```javascript
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
```

Det betyder att för alla webbläsare som är IE och har en version som är mindre än 9 så kommer htmlshiven att inkluderas.

Du kan läsa mer om [html5shiv på Googles projektsida](http://code.google.com/p/html5shiv).



Ge dina HTML5 element en grundstil {#grund}
--------------------------------------------------------------------

I din CSS så kan du lägga till en grundstil för de nya HTML5 elementen. Följande CSS-kod kan hjälpa dig på vägen.

```css
/** --------------------------------------------------------------
 * HTML5 elements.
 *
 */
article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block;}
audio,canvas,video{display:inline-block;}
audio:not([controls]){display:none;}
[hidden]{display:none;}
```

Sådär, nu är du redo att använda de nya HTML5 elementen, även i äldre webbläsare.
