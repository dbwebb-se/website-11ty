---
author: ceruza
revision:
    2016-12-19: (A, ceruza) Första utgåvan.
category:
    - labbmiljo
    - javascript
    - webpack
...

Installera Webpack
===================================

[FIGURE src=image/snapht16/webpack-logo.png?w=c5 class="right"]

Vi skall installera ett byggverktyg för JavaScript.

Miljön innebär att du kan transpilera olika dialekter av JavaScript, exempelvis ES2015 som i skrivande stund är den senaste versionen av JavaScript, till ES5 så att det kan köras i din webbläsare. 

<!--more-->



Läs mer {#mer}
-------------------------------

Du kan läsa mer om [Webpack på webbplatsen](https://webpack.github.io/).



Förutsättning {#pre}
-------------------------------

Du har installerat de [grundverktyg](labbmiljo) som ligger till grund för samtliga kurser samt labbmiljön [Node och NPM](https://dbwebb.se/kunskap/installera-node-och-npm)



Installera på valfritt Operativsystem {#install}
-------------------------------

Webpack installeras med NPM, och körs på Node, därför ser installationen likadan ut oavsett operativsystem. Flaggan -g innebär att webpack installeras globalt, detta gör att den läggs till i din $PATH och att du kan använda den genom att bara skriva "webpack". Ibland kan du också behöva installera webpack som ett beroende i ditt projekt, men det täcker vi inte här.  
Du måste använda sudo eller liknande för att installera globalt.

```bash
npm install -g webpack
```



Verifiera att Webpack fungerar {#test}
-------------------------------

Fungerar Webpack? Vi kollar:

```bash
webpack --help
```

Om Webpack installerats korrekt kan du se vad du kan göra med Webpack.



Avslutningsvis {#avslutning}
------------------------------

Det finns en [forumtråd om Webpack](t/6048). Ställ frågor där och dela med dig av dina tips och trix.
